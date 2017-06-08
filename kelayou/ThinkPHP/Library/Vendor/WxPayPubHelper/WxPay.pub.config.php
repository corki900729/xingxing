<?php

/**
 * 	配置账号信息
 */
class WxPayConf_pub {

    //=======【基本信息设置】=====================================
    //微信公众号身份的唯一标识。审核通过后，在微信发送的邮件中查看
    const APPID = 'wx03e916a50533fd0c';
    //受理商ID，身份标识
    const MCHID = '1406889202'; //测试
    //商户支付密钥Key。审核通过后，在微信发送的邮件中查看
    const KEY = 'd0c1cbbfbr6f9a8g91b23c079b509512';
    //JSAPI接口中获取openid，审核后在公众平台开启开发模式后可查看
    const APPSECRET = 'd0c1cbb0dbe6d9a8f91b26c079b50951';
    //=======【JSAPI路径设置】===================================
    //获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
    const JS_API_CALL_URL = 'http://wxy.leasom.com/Home/Order/pay_type';
    //=======【证书路径设置】=====================================
    //证书路径,注意应该填写绝对路径
    const SSLCERT_PATH = '';
    const SSLKEY_PATH = '';
    const SSLCA_PATH = '';
    //=======【异步通知url设置】===================================
    //异步通知url，商户根据实际开发过程设定
    //const NOTIFY_URL = 'http://weixin.7dao.cc/Home/Wxpay/notify';
    //=======【curl超时设置】===================================
    //本例程通过curl使用HTTP POST方法，此处可修改其超时时间，默认为30秒
    const CURL_TIMEOUT = 30;

}

?>
