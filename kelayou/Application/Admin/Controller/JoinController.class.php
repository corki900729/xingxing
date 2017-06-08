<?php

namespace Admin\Controller;

use Think\Controller;

class JoinController extends PublicController
{

    public function index()
    {
        $list = M('join')->order("sort asc")->select();
        $this->assign('data', $list);
        $this->display();
    }

    function addBrand()
    {
        if (!empty(I('post.'))) {
            if ($_FILES['image']['error'] == 0) {
                $upload = new \Think\Upload(); // 实例化上传类
                $upload->maxSize = 31457280; // 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
                $upload->rootPath = './Uploads/'; // 设置附件上传根目录
                $upload->savePath = 'admin/' . CONTROLLER_NAME . '/'; // 设置附件上传（子）目录
                $upload->saveName = array('uniqid', time() . '_' . mt_rand());
                $upload->autoSub = true;
                $info = $upload->upload();
                if (!$info) {
                    $this->error($upload->getError());
                }
                $data = I('post.');
                $id = I('post.id');
                $data['logo'] = "/Uploads/" . $info['logo1']['savepath'] . $info['logo1']['savename'];
//                $data['logo2'] = "/Uploads/" . $info['logo2']['savepath'] . $info['logo2']['savename'];
                $tmp = M('join')->add($data);
                if ($tmp >= 0) {
                    $this->success('添加成功！', U('index'), 1);
                } else {
                    $this->error('添加失败', U('index'), 1);
                }
            } else {
                $this->error('请添加图片！');
            }
        } else {
            //组建数组
            $info = array(
                getHtml('name', 'text', '前沿科技', '', ''),
                getHtml('mname', 'text', '焦点科普', '', ''),
                getHtml('introduce', 'text', '科学生活', '', ''),
                getHtml('sort', 'text', '排序', '', ''),
                getHtml('logo1', 'file', '品牌LOGO1', '', ''),
            );
            $this->info = $info;
            $this->action_url = U('addBrand');
            $this->display('Public/add');
        }
    }

    function editBrand()
    {
        $id = I("id");
        if (!empty($_POST)) {
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 31457280; // 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'admin/' . CONTROLLER_NAME . '/'; // 设置附件上传（子）目录
            $upload->saveName = array('uniqid', time() . '_' . mt_rand());
            $upload->autoSub = true;
            $info = $upload->upload();
            if (!$info && $upload->getError() != '没有文件被上传！') {
                $this->error($upload->getError());
            }
            $data = I('post.');
            $id = I('post.id');
            $data['logo'] = "/Uploads/" . $info['logo1']['savepath'] . $info['logo1']['savename'];
//                $data['logo2'] = "/Uploads/" . $info['logo2']['savepath'] . $info['logo2']['savename'];
            foreach ($data as $k => $v) {
                unset($data[array_search('/Uploads/', $data)]);
            }
            $tmp = M('join')->where('id=' . $id)->save($data);
            if ($tmp >= 0) {
                $this->success('编辑成功！', U('index'), 1);
            } else {
                $this->error('编辑失败', U('index'), 1);
            }

        } else {
            $data = M('join')->where('id=' . $id)->find();
            //组建数组
            $info = array(
                getHtml('id', 'hidden', 'id', $data['id'], ''),
                getHtml('name', 'text', '标题', $data['name'], ''),
                getHtml('sort', 'text', '排序', $data['sort'], ''),
                getHtml('logo1', 'file', '图标', $data['logo'], ''),
            );
            $this->info = $info;
            $this->action_url = U('editBrand');
            $this->display('Public/add');
        }
    }

    function shop()
    {
//        if (I('post.')) {
//            $brand_id = I('brand_id');
            $where['brand_id'] = 3;
//            $brandinfo = M('join')->where(array('id' => $brand_id))->field("id,name")->find();
//            $this->assign('brandinfo', $brandinfo);
//        }
//        $where=null;
        $count = M('join_shop')->where($where)->count();
        $Page = new \Think\Page($count, 8, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $data['List'] = M('join_shop')->where($where)->order("sort asc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
//        $data['brandlist'] = M('join')->order('sort desc')->field("id,name")->select();
        $this->assign('page', $Page->show());
        $this->assign('data', $data);
        $this->display();
    }

    function addShop()
    {
        if (!empty(I('post.'))) {
            if ($_FILES['img']['error'] == 0) {
                $post=I('post.');
                //上传图片
                $upload = new \Think\Upload();
                $upload->maxSize = 0;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->savePath = $this->dbname . '_img/';
                $info = $upload->uploadOne($_FILES['img']);
                if (!$info) {
                    $this->error($upload->getError());
                }
                $post['img'] = '/Uploads/' . $info['savepath'] . $info['savename'];
                $post['time'] = time();
                //dump($post);exit;
                $tmp = M('join_shop')->add($post);
                if ($tmp >= 0) {
                    $this->success('添加成功！', U('shop'), 1);
                } else {
                    $this->error('添加失败', U('shop'), 1);
                }
            } else {
                $this->error('请添加图片！');
            }
        } else {
            $brandlist = M('join')->order('sort desc')->field("id,name")->select();
            foreach ($brandlist as $k => $v) {
                if($v['id'] == 3){
                    $select_value[] = array("value" => $v['id'], "option_name" => $v['name']);
                }
            }
            $select['info'] = $select_value;
            $select['select_value'] = '';
            //组建数组
            $info = array(
                getHtml('brand_id', 'select', '类别', $select, ''),
                getHtml('name', 'text', '标题', '', ''),
                getHtml('address', 'text', '简介', '', ''),
                getHtml('tel', 'text', '来源', '', ''),
                getHtml('sort', 'text', '排序', '', ''),
                getHtml('img', 'file', '图片', '', ''),
                getHtml('content', 'editor', '内容', '', ''),
            );
            $this->info = $info;
            $this->action_url = U('addShop');
            $this->display('Public/add');
        }
    }

    function editShop()
    {
        $id = I("id");
        if (!empty($_POST)) {
            $post = $_POST;

            if ($_FILES['img']['error'] == 0) {
                //上传图片
                $upload = new \Think\Upload();
                $upload->maxSize = 0;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->savePath = $this->dbname . '_img/';
                $info = $upload->uploadOne($_FILES['img']);
                if (!$info) {
                    $this->error($upload->getError());
                }
                $post['img'] = '/Uploads/' . $info['savepath'] . $info['savename'];
                $post['time'] = time();
                $tmp = M('join_shop')->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('shop'), 1);
                } else {
                    $this->error('编辑失败');
                }
            } else {
                unset($post['img']);
                $tmp = M('join_shop')->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('shop'), 1);
                } else {
                    $this->error('编辑失败', U('shop'), 1);
                }
            }
        } else {
            $data = M('join_shop')->where('id=' . $id)->find();
            $brandlist = M('join')->order('sort desc')->field("id,name")->select();
            foreach ($brandlist as $k => $v) {
                if($v['id'] == 3) {
                    $select_value[] = array("value" => $v['id'], "option_name" => $v['name']);
                }
            }
            $select['info'] = $select_value;
            $select['select_value'] = $data['brand_id'];
            //组建数组
            $info = array(
                getHtml('id', 'hidden', 'id', $data['id'], ''),
                getHtml('brand_id', 'select', '类别', $select, ''),
                getHtml('name', 'text', '标题', $data['name'], ''),
                getHtml('address', 'text', '简介', $data['address'], ''),
                getHtml('tel', 'text', '来源', $data['tel'], ''),
                getHtml('sort', 'text', '排序', $data['sort'], ''),
                getHtml('img', 'file', '图片', $data['img'], ''),
                getHtml('content', 'editor', '内容', htmlspecialchars_decode($data['content']), ''),
            );
            $this->info = $info;
            $this->action_url = U('editShop');
            $this->display('Public/add');
        }
    }

    function delShop()
    {
        $id = I('id');
        $tmp = M('join_shop')->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->success('删除成功！', U('shop'), 1);
        } else {
            $this->error('删除失败！', U('shop'), 1);
        }
    }

    function dati()
    {
        if ($flg = I('flg')) {
            $where['flg'] = $flg;
        }
        $count = M('dati')->where($where)->count();
        $Page = new \Think\Page($count, 8, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $list = M('dati')->where($where)->order("time desc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $Page->show());
        $this->assign('data', $list);
        $this->assign('flg', $flg);
        $this->display();
    }

    function add_dati()
    {
        if (!empty(I('post.'))) {
            $post = I('post.');
            $post['time'] = time();
            $tmp = M('dati')->add($post);
            if ($tmp >= 0) {
                $this->success('添加成功！', U('dati'), 1);
            } else {
                $this->error('添加失败', U('dati'), 1);
            }

        } else {
            $brandlist = M('join')->order('sort desc')->field("id,name")->select();
            foreach ($brandlist as $k => $v) {
                $select_value[] = array("value" => $v['id'], "option_name" => $v['name']);
            }
            $select['info'] = $select_value;
            $select['select_value'] = '';
            //组建数组
            $info = array(
                getHtml('title', 'text', '标题', '', ''),
                getHtml('content', 'editor', '内容', '', ''),
            );
            $this->info = $info;
            $this->action_url = U('add_dati');
            $this->display('Public/add');
        }
    }

    function edit_dati()
    {
        $id = I("id");
        if (!empty($_POST)) {
            $post = $_POST;
            $post['time'] = time();
            $tmp = M('dati')->where('id=' . $id)->save($post);
            if ($tmp >= 0) {
                $this->success('编辑成功！', U('dati'), 1);
            } else {
                $this->error('编辑失败');
            }
        } else {
            $data = M('dati')->where('id=' . $id)->find();
            //组建数组
            $info = array(
                getHtml('id', 'hidden', 'id', $data['id'], ''),
                getHtml('title', 'text', '标题', $data['title'], ''),
                getHtml('content', 'editor', '内容', htmlspecialchars_decode($data['content']), ''),
            );
            $this->info = $info;
            $this->action_url = U('edit_dati');
            $this->display('Public/add');
        }
    }

    function shenhe()
    {
        if ($id = I('id', int, 0)) {
            $data['flg'] = 1;
            if (M('join_shop')->where('id = ' . (int)$id)->save($data)) {
                $this->ajaxReturn(1);
            };
            $this->ajaxReturn(-1);
        }
        $this->ajaxReturn(-1);
    }

    function daan(){
        $id = I('id');
        if ($flg = I('flg')) {
            $where['flg'] = $flg;
        }
        $count = M('daan')->where($where)->count();
        $Page = new \Think\Page($count, 15, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $list = M('daan')
            ->join('lx_users ON lx_users.id = lx_daan.user_id','left')
            ->field('lx_daan.*,lx_users.nickname,lx_users.headurl')
            ->where($where)
            ->order("time desc")
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->select();
        $this->assign('page', $Page->show());
        $this->assign('data', $list);
        $this->assign('flg', $flg);
        $this->display();
    }

    function daan_shenhe(){
        if (I('id', int, 0) && I('flg')) {
            $id = I('id', int, 0);
            $flg = I('flg');
            $data['flg']=$flg;
            if(!M('daan')->where('id = ' . (int)$id)->save($data)){
                $this->ajaxReturn(-1);
            }
            if($flg == 1){
                $info = M('daan')->find($id);
                M('dati')->where('id = ' . $info['dati_id'])->setInc('sum');
                M('dati')->where('id = ' . $info['dati_id'])->setInc('dui');
                M('users')->where('id = ' . $info['user_id'])->setInc('count');
                $this->ajaxReturn(1);
            }
            $this->ajaxReturn(1);
        }
        $this->ajaxReturn(-1);
    }

    //活动
    function shop2()
    {
//        if (I('post.')) {
//            $brand_id = I('brand_id');
        $where['brand_id'] = 1;
//            $brandinfo = M('join')->where(array('id' => $brand_id))->field("id,name")->find();
//            $this->assign('brandinfo', $brandinfo);
//        }
//        $where=null;
        $count = M('join_shop')->where($where)->count();
        $Page = new \Think\Page($count, 8, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $data['List'] = M('join_shop')->where($where)->order("sort asc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
//        $data['brandlist'] = M('join')->order('sort desc')->field("id,name")->select();
        $this->assign('page', $Page->show());
        $this->assign('data', $data);
        $this->display();
    }

    function addShop2()
    {
        if (!empty(I('post.'))) {
            $post=I('post.');
            if ($_FILES['img']['error'] == 0) {
                //上传图片
                $upload = new \Think\Upload();
                $upload->maxSize = 0;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->savePath = $this->dbname . '_img/';
                $info = $upload->uploadOne($_FILES['img']);
                if (!$info) {
                    $this->error($upload->getError());
                }
                $post['img'] = '/Uploads/' . $info['savepath'] . $info['savename'];
                $post['time'] = time();
                //dump($post);exit;
                $tmp = M('join_shop')->add($post);
                if ($tmp >= 0) {
                    $this->success('添加成功！', U('shop2'), 1);
                } else {
                    $this->error('添加失败', U('shop2'), 1);
                }
            } else {
                $this->error('请添加图片！');
            }
        } else {
            $brandlist = M('join')->order('sort desc')->field("id,name")->select();
            foreach ($brandlist as $k => $v) {
                if($v['id'] == 1){
                    $select_value[] = array("value" => $v['id'], "option_name" => $v['name']);
                }
            }
            $select['info'] = $select_value;
            $select['select_value'] = '';
            //组建数组
            $info = array(
                getHtml('brand_id', 'select', '类别', $select, ''),
                getHtml('name', 'text', '标题', '', ''),
                getHtml('address', 'text', '简介', '', ''),
                getHtml('tel', 'text', '来源', '', ''),
                getHtml('sort', 'text', '排序', '', ''),
                getHtml('dizhi', 'text', '活动地点', '', ''),
                getHtml('starttime', 'time', '活动时间', '', ''),
                getHtml('img', 'file', '图片', '', ''),
                getHtml('content', 'editor', '内容', '', ''),
            );
            $this->info = $info;
            $this->action_url = U('addShop2');
            $this->display('Public/add');
        }
    }

    function editShop2()
    {
        $id = I("id");
        if (!empty($_POST)) {
            $post = $_POST;

            if ($_FILES['img']['error'] == 0) {
                //上传图片
                $upload = new \Think\Upload();
                $upload->maxSize = 0;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->savePath = $this->dbname . '_img/';
                $info = $upload->uploadOne($_FILES['img']);
                if (!$info) {
                    $this->error($upload->getError());
                }
                $post['img'] = '/Uploads/' . $info['savepath'] . $info['savename'];
                $post['time'] = time();
                $tmp = M('join_shop')->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('shop2'), 1);
                } else {
                    $this->error('编辑失败');
                }
            } else {
                unset($post['img']);
                $tmp = M('join_shop')->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('shop2'), 1);
                } else {
                    $this->error('编辑失败', U('shop2'), 1);
                }
            }
        } else {
            $data = M('join_shop')->where('id=' . $id)->find();
            $brandlist = M('join')->order('sort desc')->field("id,name")->select();
            foreach ($brandlist as $k => $v) {
                if($v['id'] == 1) {
                    $select_value[] = array("value" => $v['id'], "option_name" => $v['name']);
                }
            }
            $select['info'] = $select_value;
            $select['select_value'] = $data['brand_id'];
            //组建数组
            $info = array(
                getHtml('id', 'hidden', 'id', $data['id'], ''),
                getHtml('brand_id', 'select', '类别', $select, ''),
                getHtml('name', 'text', '标题', $data['name'], ''),
                getHtml('address', 'text', '简介', $data['address'], ''),
                getHtml('tel', 'text', '来源', $data['tel'], ''),
                getHtml('sort', 'text', '排序', $data['sort'], ''),
                getHtml('dizhi', 'text', '活动地点', $data['dizhi'], ''),
                getHtml('starttime', 'time', '活动时间', $data['starttime'], ''),
                getHtml('img', 'file', '图片', $data['img'], ''),
                getHtml('content', 'editor', '内容', htmlspecialchars_decode($data['content']), ''),
            );
            $this->info = $info;
            $this->action_url = U('editShop2');
            $this->display('Public/add');
        }
    }

    function delShop2()
    {
        $id = I('id');
        $tmp = M('join_shop')->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->success('删除成功！', U('shop2'), 1);
        } else {
            $this->error('删除失败！', U('shop2'), 1);
        }
    }
    function seeren(){
        $id = I('id');
        $where['shop2_id']=$id;
        $count = M('canjia')->where($where)->count();
        $Page = new \Think\Page($count, 8, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $data['List'] = M('canjia')
            ->join('lx_users ON lx_canjia.user_id = lx_users.id')
            ->where($where)
            ->order("time desc")
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->field('lx_canjia.*,lx_users.nickname,lx_users.headurl')
            ->select();
        $this->assign('page', $Page->show());
        $this->assign('data', $data);
        $this->display();
    }

    function delren()
    {
        $id = I('id');
        $tmp = M('canjia')->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->success('删除成功！', U('seeren'), 1);
        } else {
            $this->error('删除失败！', U('seeren'), 1);
        }
    }
    function del_dati()
    {
        $id = I('id');
        $tmp = M('dati')->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->success('删除成功！', U('dati'), 1);
        } else {
            $this->error('删除失败！', U('dati'), 1);
        }
    }

    function del_daan()
    {
        $id = I('id');
        $tmp = M('daan')->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->error('删除成功！', U('daan'), 1);
        } else {
            $this->error('删除失败！', U('daan'), 1);
        }
    }
}
