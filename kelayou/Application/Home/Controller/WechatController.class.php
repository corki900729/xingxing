<?php

/**
 * 微信公众号开发
 * Author: 李飞    
 */

namespace Home\Controller;

use Think\Controller;

class WechatController extends Controller {

    protected $weObj;
    protected $weConfig; //微信相关配置
    protected $userInfo;

    public function __construct() {
        parent::__construct();
        $weConfig = C('WEIXIN_CONFIG');
        $options = array(
            'token' => $weConfig['token'], //填写你设定的key
            'encodingaeskey' => $weConfig['encodingaeskey'], //填写加密用的EncodingAESKey
            'appid' => $weConfig['appId'], //填写高级调用功能的app id
            'appsecret' => $weConfig['appSecret']  //填写高级调用功能的密钥
        );
        $weObj = new \Org\Util\Wechat($options);
        $this->weObj = $weObj;
        $this->weConfig = $weConfig;
    }

    public function index() {
        if (!isset($_GET['echostr'])) {
            $this->responseMsg();
        } else {
            $this->weObj->valid();
        }
    }

    /**
     * 自动回复消息
     */
    protected function responseMsg() {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)) {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            echo $this->transmitText($postObj, '网站正在维护中...敬请期待！');return;
            $RX_TYPE = trim($postObj->MsgType);
            //用户发送的消息类型判断
            switch ($RX_TYPE) {
                case "text":    //文本消息
                    $result = $this->transmitText($postObj, '123');
                    break;
                case "event":   //事件
                    $result = $this->receiveEvent($postObj);
                    break;
                default:
                    $result = "unknow msg type: " . $RX_TYPE;
                    break;
            }
            echo $result;
        } else {
            exit('');
        }
    }

    /**
     * 事件处理逻辑
     */
    protected function receiveEvent($postObj) {
        $event = $postObj->Event;
        switch ($event) {
            case 'subscribe':
                $this->guanzhu($postObj);
                break;
            case 'CLICK':
                $this->receiveClick($postObj);
                break;
            case 'SCAN':
                $this->fromQrcode($postObj);
                break;
            default:
                break;
        }
    }

    /**
     * 下单成功生成二维码
     */
    public function saveQRCode($user_id) {
        $userInfo = M('user')->find($user_id);
        if (!$userInfo['qrcode']) {//本地没有上传二维码
            if (!$userInfo['xiaofei_time']) {
                return false;
            }
            $res = $this->weObj->getQRCode($userInfo['id'], 1);
            $Qurl = $this->weObj->getQRUrl($res['ticket']);
            $path = $this->downLoadQr($Qurl, $userInfo['id']);
            $data['qrcode'] = $path;
            $data['id'] = (int) $userInfo['id'];
            if (!($res = M('User')->save($data))) {
               return false;
            }
            $userInfo['qrcode'] = $path;
        }
        if (!$userInfo['media_id']) {//微信没有上传二维码
            $media_id = $this->uploadImage($object, $userInfo['qrcode']);
            $data2['media_id'] = $media_id;
            $data2['id'] = (int) $userInfo['id'];
            if (!($res = M('User')->save($data2))) {
                return false;
            }
            return true;
        }
    }

    /**
     * click事件处理逻辑
     */
    protected function receiveClick($object) {
        switch ($object->EventKey) {
            case "QRCode"://生成二维码链接
                $userInfo = $this->getUserinfo($object);
                if (!$userInfo['qrcode'] || (time() - $userInfo['medid_time']) > 252000) {//本地没有上传二维码
                    if (!$userInfo['xiaofei_time']) {
//                        session('userInfo',null);
                        echo $this->transmitText($object, '您必须消费一次，有完整的订单流程才能推广！');
                        return;
                    }
                    if ($userInfo['is_kefu']) {//客服消息
                        $this->weObj->sendCustomMessage(array('touser' => $userInfo['openid'], 'msgtype' => 'text', 'text' => array('content' => '您的专属二维码正在努力生成中，请等待.....若生成失败，请重新点击即可!')));
                        $dat['id'] = $userInfo['id'];
                        $dat['is_kefu'] = 0;
                        M('User')->save($dat);
                    }
                    $res = $this->weObj->getQRCode($userInfo['id'], 1);
                    $Qurl = $this->weObj->getQRUrl($res['ticket']);
                    $path = $this->downLoadQr($Qurl, $userInfo['id']);
                    $data['qrcode'] = $path;
                    $data['id'] = (int) $userInfo['id'];
                    if (!($res = M('User')->save($data))) {
                        echo $this->transmitText($object, '上传二维码到项目服务器失败！');
                    }
                    $userInfo['qrcode'] = $path;
                }
                if (!$userInfo['media_id']  || (time() - $userInfo['medid_time']) > 252000) {//微信没有上传二维码
                    $media_id = $this->uploadImage($object, $userInfo['qrcode']);
                    $data2['media_id'] = $media_id;
                    $data2['medid_time'] = time();
                    $data2['is_kefu'] = 1;
                    $data2['id'] = (int) $userInfo['id'];
                    if (!($res = M('User')->save($data2))) {
                        echo $this->transmitText($object, '上传二维码到微信服务器失败！');
                    }
                    $userInfo['media_id'] = $media_id;
                }
                $qrcode = $this->transmitImage($object, array('MediaId' => $userInfo['media_id']));
                break;
            case "meimei";
                $text = "亲爱的胜者团粉/可爱，您好，欢迎进入胜者无限客服系统，直接编辑您所遇到的问题编辑发送就可以了哦，云妹妹已做好充分准备，时刻为你答疑解惑/示爱，谢谢您的参与和支持/示爱。工作时间周日到周五：9:00-21:30，周六：9:00-18:00，请在工作时间内咨询问题哦";
                echo $this->transmitText($object, $text);
                return;
                break;
        }
        echo $qrcode;
        return;
    }

    //下载二维码到微信服务器
    protected function uploadImage($object, $image) {
        if (class_exists('\CURLFile')) {
            $field = array('media' => new \CURLFile(realpath('.' . $image)));
        } else {
            $field = array('media' => '@' . realpath('.' . $image));
        }
//        $res = $this->weObj->uploadForeverMedia($field, 'image');//永久
        $res = $this->weObj->uploadMedia($field, 'image');//临时
        $media_id = $res['media_id'];
        return $media_id;
    }
    
    //下载二维码到项目服务器
    protected function downLoadQr($url, $filestring) {
        if ($url == "") {
            return false;
        }
        $filename = $filestring . '.jpg';
        ob_start();
        readfile($url);
        $img = ob_get_contents();
        ob_end_clean();
        $size = strlen($img);
        $fp2 = fopen('./Uploads/qrcode/' . $filename, "a");
        if (fwrite($fp2, $img) === false) {
            return '下载用户推广二维码失败: 无法写入图片';
        }
        fclose($fp2);
        $qrcode = '/Uploads/qrcode/' . $filename;
        $header = $this->downHeader($filestring);
        return $this->mergeImage($qrcode,$header,$filestring);
    }
    
    //下载t头像到项目服务器
    protected function downHeader($filestring) {
        $url = M('user')->getFieldById($filestring,'headimgurl');
        if ($url == "") {
            return false;
        }
        $filename = $filestring . '.jpg';
        ob_start();
        readfile($url);
        $img = ob_get_contents();
        ob_end_clean();
        unlink('./Uploads/header/' . $filename);
        $fp2 = fopen('./Uploads/header/' . $filename, "a");
        if (fwrite($fp2, $img) === false) {
            return '下载用户推广二维码失败: 无法写入图片';
        }
        fclose($fp2);
        $header = '/Uploads/header/' . $filename;
        return $header;
    }
    
    //二维码与背景图合并
    public function mergeImage($qrcode = "/Uploads/qrcode/83.jpg",$header = null,$filestring = '2.jpg') {
        //二维码合成
        //背景图
        $bg_img = 'http://'.$_SERVER['HTTP_HOST'].'/Public/Home/images/gzwx.jpg';
        $filename = 'http://'.$_SERVER['HTTP_HOST'].$qrcode;
        //缩放比例
        $per = 0.30;
        //原始宽高
        list($width, $height) = getimagesize($filename);
        //缩放后宽高
        $n_w = $width * $per;
        $n_h = $height * $per;
        //缩放后二维码
        $new = imagecreatetruecolor($n_w, $n_h);
        $img = imagecreatefromjpeg($filename);
        //copy部分图像并调整 
        imagecopyresized($new, $img, 0, 0, 0, 0, $n_w, $n_h, $width, $height);

        $im1 = imagecreatefromjpeg($bg_img);
        //合并
        imagecopymerge($im1, $new, 144, 240, 0, 0, imagesx($new), imagesy($new), 100);
        //文字合成
        $str = M('user')->getFieldById($filestring,'nickname');
        $im = imagecreate(200, 200);
        $white = imagecolorallocate($im, 255, 255, 255);
        imagecolortransparent($im, $white);  //imagecolortransparent() 设置具体某种颜色为透明色，若注释
        $black = imagecolorallocate($im, 255, 255, 255);
        imagettftext($im, 14, 0, 5, 40,$black,'./Uploads/qrcode/simkai.ttf',$str); //字体设置部分linux和windows的路径可能不同
        //合并
        imagecopymerge($im1, $im, 3, 185, 0, 0, imagesx($im), imagesy($im), 100);
        //头像合并
        $filename = $filename = 'http://'.$_SERVER['HTTP_HOST'].$header;
        $per = 0.13;
        list($width, $height) = getimagesize($filename);
        if($width > 650 || $height > 650){
            $per = 0.07;
        }
        $n_w = $width * $per;
        $n_h = $height * $per;
        $new = imagecreatetruecolor($n_w, $n_h);
        $img = imagecreatefromjpeg($filename);
        //copy部分图像并调整 
        imagecopyresized($new, $img, 0, 0, 0, 0, $n_w, $n_h, $width, $height);
        //合并
        imagecopymerge($im1, $new, 5, 120, 0, 0, imagesx($new), imagesy($new), 100);
        //保存
        unlink('./Uploads/merge/' . $filestring . '.jpg');
        imagejpeg($im1, './Uploads/merge/' . $filestring . '.jpg');
        //路径
        $path = '/Uploads/merge/' . $filestring . '.jpg';
        return $path;
    }

    /**
     * 关注后操作
     * @return [type] [description]
     */
    protected function guanzhu($postObj) {
        $openid = $postObj->FromUserName;
        $userinfo = M('user')->where("openid = '$openid'")->find();
        if ($userinfo) {
            $reply_text = $userinfo['nickname'] . '欢迎回来！';
        } else {
            $userinfo = $this->getUserinfo($postObj);
            $reply_text = "感谢您关注胜者无限！";
        }
        session('uid', $userinfo['id']);
        session('user_info', $userinfo);
        if ($userinfo['pid']) {
            $nickname = M('user')->getFieldById($userinfo['pid'], 'nickname');
            $reply_text.='您的推广人为：' . $nickname;
        } else {
            $this->fromQrcode($postObj, 'guanzhu');
        }
        echo $this->transmitText($postObj, $reply_text);
    }

    //获取个人信息
    protected function getUserinfo($postObj = null, $openid = null) {
        if ($postObj) {
            $openid = $postObj->FromUserName;
        }
        $userInfo = M('users')->where("openid = '$openid'")->find();
        $user_info = $userInfo;
        $medid_time = !empty($userInfo['medid_time']) ? $userInfo['medid_time'] : 0;
        if (!$userInfo || (time() - $medid_time) > 252000) {
            //获取用户信息
            if ($this->weConfig['giveAuth'] == '2') {
                $access_token = $this->weObj->checkAuth();
                $userInfo = $this->weObj->getUiUserInfo($access_token, $openid);
            } else {
                $userInfo = $this->weObj->getOauthUserinfo($access_token, $openid);
            }

            $userInfo['headurl'] = $userInfo['headimgurl'];
            $userInfo['nickname'] = $this->filterEmoji($userInfo['nickname']);
            $userInfo['register_time'] = time();
            if ($user_info) {
                //更新
                $userInfo['id'] = $user_info['id'];
                M('users')->save($userInfo);
            } else {
                //注册添加
                if (!($uid = M('users')->add($userInfo))) {
                    $this->error('error');
                }
                $userInfo['id'] = $uid;
            }
        }
        $userInfo = M('users')->find($userInfo['id']);
        $this->userInfo = $userInfo;
        session('id', $userInfo['id']);
        session('user_info', $userInfo);
        return $userInfo;
    }

    /**
     * 扫描二维码进入
     */
    protected function fromQrcode($postObj, $flg = NULL) {
        $eventKey = $postObj->EventKey;
        /*         * 如果不为空的话..说明是从带参数的二维码扫描进入的
         * 
         * 事件类型， Event:subscribe 未关注时返回数据格式 arrar('event'=>'subscribe', 'key'=>'qrscene_2')  (qrscene_2: qrscene是前缀，2是参数值)
         * 事件类型，Event:SCAN 关注时返回数据格式 arrar('event'=>'subscribe', 'key'=>'2')  (2是参数值)
         */
        $event = $postObj->Event;
        if ($event == 'subscribe') {
            $pid = explode('qrscene_', $eventKey);
            $pid = $pid[1];
        } else {
            $pid = $eventKey;
        }
        if ($pid == 0) {
            echo $this->transmitText($postObj, "感谢您关注胜者无限！");
            return;
        }
        $userinfo = $this->getUserinfo($postObj);
        //确定上级
        if ($userinfo['id'] == $pid) {
            echo $this->transmitText($postObj, '不能对自己的二维码进行操作！');
            return false;
        }
        if (!$userinfo['pid']) {
            $data['pid'] = (int) $pid;
            $data['id'] = (int) $userinfo['id'];
            $data['tuiguang_time'] = time();
            if ($res = M('User')->save($data)) {
                $nickname = M('user')->getFieldById($pid, 'nickname');
                echo $this->transmitText($postObj, '您的推广人为：' . $nickname);
            };
        }
        $nickname = M('user')->getFieldById($userinfo['pid'], 'nickname');
        echo $this->transmitText($postObj, '您的推广人为：' . $nickname);
        return false;
    }

    /**
     * 接受文本处理
     */
    private function transmitText($object, $content) {
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
        $result = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content);
        return $result;
    }

    /*
     * 回复图片消息
     */

    private function transmitImage($object, $imageArray) {
        $itemTpl = "<Image>
    <MediaId><![CDATA[%s]]></MediaId>
</Image>";
        $item_str = sprintf($itemTpl, $imageArray['MediaId']);
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
$item_str
</xml>";
        $result = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }

    /**
     * 创建菜单
     * 
     */
    public function creatMenus() {
        $menu1 = get_sys(4);
        $menu2 = get_sys(5);
        $menu3 = get_sys(6);
        $data = array(
            'button' => array(
                0 => array(
                    'type' => 'view',
                    'name' => $menu1['value'],
                    'url' => 'http://' . $_SERVER['HTTP_HOST'] . U('MenuOne/index'),
                ),
                1 => array(
                    'type' => 'view',
                    'name' => $menu2['value'],
                    'url' => 'http://' . $_SERVER['HTTP_HOST'] . U('MenuTwo/index'),
                ),
                2 => array(
                    'type' => 'view',
                    'name' => $menu3['value'],
                    'url' => 'http://' . $_SERVER['HTTP_HOST'] . U('MenuThree/index'),
                ),
            ),
        );
        if ($this->weObj->createMenu($data)) {
            echo"<script>alert('success');</script>";
        } else {
            echo"<script>alert('false')</script>";
        }
    }

    /**
     * 发送模板消息 
     * @param type $openid
     * @param type $order_id
     * @param type $status 3:发货;2：给上级发送,1：购买成功,0：下单成功,-1:订单取消成功
     */
    public function sendTemplateMessage($openid, $order_id, $status) {
        $goods_order_info = M('GoodsShopOrder shop_order');
        $result = $goods_order_info
                ->join('lx_goods_order_info order_info ON order_info.order_id = shop_order.id', 'left')
                ->field('shop_order.*, order_info.id order_info_id, order_info.price, order_info.num, order_info.goods_title, order_info.goods_thumb, order_info.goods_attr_values, order_info.goods_attr_id, order_info.market_price, order_info.price oneprice')
                ->where('shop_order.id = ' . $order_id)
                ->find();
        $price = $result['price'];
        $url = $_SERVER['HTTP_HOST'].U('Order/detail', array('id' => base64_encode(serialize($order_id))));
        if ($status == 1 || $status == 2) {
            if ($status == 1) {
                $first = "您的订单已支付成功！";
                $product = $result['goods_title'] . '(' . $result['goods_attr_values'] . ')(数量：' . $result['num'] . ',单价：' . $result['oneprice'] . ')';
                $remark = "感谢您购买我们的产品,我们将尽快配送~~";
            } elseif ($status == 2) {
                $url = "";
                $nickname = M('user')->getFieldById($result['user_id'],'nickname');
                $first = "您的胜者团粉：".$nickname.'购买了商品,在他的订单关闭之后,您就可以获取推广费了';
                $product = $result['goods_title'] . '(' . $result['goods_attr_values'] . ')(数量：' . $result['num'] . ',单价：' . $result['oneprice'] . ')';
                $remark = "请努力发展您的胜者团粉,奖励多多哦！";
            }
            $template_id = "TgDZ9YNeW2gsVhi7JzfysgzrauCgf6KAhQtH0kQRiZw";
            
            $time = date('Y-m-d H:i:s', $result['pay_time']);
            
            //构建模板
            $data = array(
                "touser" => "$openid",
                "template_id" => "$template_id",
                "url" => "$url",
                "topcolor" => "#FF0000",
                'data' => array(
                    "first" => array(
                        "value" => "$first",
                        "color" => "#173177"
                    ),
                    "product" => array(
                        "value" => "$product",
                        "color" => "#173177"
                    ),
                    "price" => array(
                        "value" => "$price",
                        "color" => "#173177"
                    ),
                    "time" => array(
                        "value" => $time,
                        "color" => "#173177"
                    ),
                    "remark" => array(
                        "value" => $remark,
                        "color" => "#173177"
                    ),
                )
            );
            
        } else if ($status == 0) {
            $template_id = "yBMZk0r5_xSCbHEyfeXvNrA40hLOBDYllDA09DHuo_Q";
            $first = "您好，您已下单成功！";
            $keyword1 = "胜者无限";
            $product = $result['goods_title'] . '(' . $result['goods_attr_values'] . ')(数量：' . $result['num'] . ',单价：' . $result['oneprice'] . ')';
            $time = date('Y-m-d H:i:s', $result['add_time']);
            $price = $result['num']*$result['oneprice'].'元';
            $remark = "您的订单我们已经收到,支付后我们将尽快配送~~";
            //构建模板
            $data = array(
                "touser" => "$openid",
                "template_id" => "$template_id",
                "url" => "$url",
                "topcolor" => "#FF0000",
                'data' => array(
                    "first" => array(
                        "value" => "$first",
                        "color" => "#173177"
                    ),
                    "keyword1" => array(
                        "value" => "$keyword1",
                        "color" => "#173177"
                    ),
                    "keyword2" => array(
                        "value" => "$time",
                        "color" => "#173177"
                    ),
                    "keyword3" => array(
                        "value" => "$product",
                        "color" => "#173177"
                    ),
                    "keyword4" => array(
                        "value" => "$price",
                        "color" => "#173177"
                    ),
                    "remark" => array(
                        "value" => $remark,
                        "color" => "#173177"
                    ),
                )
            );
        } else if ($status == -1) {
            $template_id = "pScka4ejepht40CRdPw3XRy3Lz6Iye9r4evvdNB0ODA";
            $first = "您的订单已取消！";
            $product = $result['order_sn'] . '商品详情：' . $result['goods_title'] . '(' . $result['goods_attr_values'] . ')(数量：' . $result['num'] . ',单价：' . $result['oneprice'] . ')';
            $price = $result['num']*$result['oneprice'].'元';
            $remark = "【胜者无限】 欢迎您的再次购物！";
            //构建模板
            $data = array(
                "touser" => "$openid",
                "template_id" => "$template_id",
                "url" => "$url",
                "topcolor" => "#FF0000",
                'data' => array(
                    "first" => array(
                        "value" => "$first",
                        "color" => "#173177"
                    ),
                    "keyword1" => array(
                        "value" => "$product",
                        "color" => "#173177"
                    ),
                    "keyword2" => array(
                        "value" => "$price",
                        "color" => "#173177"
                    ),
                    "remark" => array(
                        "value" => $remark,
                        "color" => "#173177"
                    ),
                )
            );
        } else if ($status == 3) {
            $template_id = "KRgG3xOEgGafTbfu0urGDcCCJTmfjrP3scRXUEsjXoY";
            $first = "您的订单已经发货了！";
            $order_sn = $result['order_sn'];
            $wuliu = M('wuliu')->getFieldById($result['wuliu_gongsi'],'name');
            $num = $result['wuliu_num'];
            $url = $_SERVER['HTTP_HOST'].U('Home/Order/detail', array('id' => base64_encode(serialize($order_id))));
            $remark = "【胜者无限】 欢迎您的再次购物！";
            //构建模板
            $data = array(
                "touser" => "$openid",
                "template_id" => "$template_id",
                "url" => "$url",
                "topcolor" => "#FF0000",
                'data' => array(
                    "first" => array(
                        "value" => "$first",
                        "color" => "#173177"
                    ),
                    "keyword1" => array(
                        "value" => "$order_sn",
                        "color" => "#173177"
                    ),
                    "keyword2" => array(
                        "value" => "$wuliu",
                        "color" => "#173177"
                    ),
                    "keyword3" => array(
                        "value" => "$num",
                        "color" => "#173177"
                    ),
                    "remark" => array(
                        "value" => $remark,
                        "color" => "#173177"
                    ),
                )
            );
        }
        $this->weObj->sendTemplateMessage($data);
    }

    /**
     * 用户授权,默认获取详细信息
     */
    public function auth($url) {
        if ($this->weConfig['giveAuth'] == '2') {
            $scope = 'snsapi_base';
        } else {
            $scope = 'snsapi_userinfo';
        }
//        echo 'http://' . $_SERVER['HTTP_HOST'] .'/Home'. U('Wechat/openid_returnUrl/url/' . $url);exit;
        $url = $this->weObj->getOauthRedirect(urlencode('http://' . $_SERVER['HTTP_HOST'] .'/Home'. U('Wechat/openid_returnUrl/url/' . $url)), 'lf', $scope);
//        echo $url;exit;
        header("Location:$url");
    }

    /**
     * 用户授权回调地址
     */
    public function openid_returnUrl($url) {
        $res = $this->weObj->getOauthAccessToken();
        $userinfo = $this->getUserinfo('', $res['openid']);
        if (!$userinfo) {
            $this->error('获取信息失败');
        }
        $url = str_replace('_', '/', $url);
        redirect($url);
    }

    /**
     * 获取JsApi使用签名
     */
    public function getJsSign() {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $signPackage = $this->weObj->getJsSign($url, '12345678901', 'asdfghjkl');
        return $signPackage['signature'];
    }

    // 过滤掉emoji表情
    public function filterEmoji($nickname) {
        $nickname = preg_replace_callback('/[\xf0-\xf7].{3}/', function ($r) {
            return '@E' . base64_encode($r[0]);
        }, $nickname);

        $countt = substr_count($nickname, "@");
        for ($i = 0; $i < $countt; $i++) {
            $c = stripos($nickname, "@");
            $nickname = substr($nickname, 0, $c) . substr($nickname, $c + 10, strlen($nickname) - 1);
        }
        $nickname = preg_replace_callback('/@E(.{6}==)/', function ($r) {
            return base64_decode($r[1]);
        }, $nickname);
        return $nickname;
    }

}
