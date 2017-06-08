<?php

namespace Admin\Controller;

use Think\Controller;

class BrandController extends PublicController {

    public $db;
    public $dbname = 'Brand';

    function __construct() {
        parent::__construct();
        //检查admin权限
        $this->db = M($this->dbname);
    }

    function index() {
        $where = array();
        $count = $this->db->where($where)->count();
        $Page = new \Think\Page($count, 15, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $data['List'] = $this->db->where($where)->order("sort asc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $Page->show());
        $this->assign('data', $data);
        $this->display();
    }

    function addBrand() {
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
            if (!$info ) {
                $this->error($upload->getError());
            }
                $data = I('post.');
                $id = I('post.id');
                $data['logo'] = "/Uploads/" . $info['logo1']['savepath'] . $info['logo1']['savename'];
//                $data['logo2'] = "/Uploads/" . $info['logo2']['savepath'] . $info['logo2']['savename'];
                $tmp = $this->db->add($data);
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

    function editBrand() {
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
            if (!$info && $upload->getError()!='没有文件被上传！' ) {
                    $this->error($upload->getError());
                } 
                $data = I('post.');
                $id = I('post.id');
                $data['logo'] = "/Uploads/" . $info['logo1']['savepath'] . $info['logo1']['savename'];
//                $data['logo2'] = "/Uploads/" . $info['logo2']['savepath'] . $info['logo2']['savename'];
                foreach($data as $k=>$v ){
                      unset($data[array_search('/Uploads/' , $data)]);  
                    }
                $tmp = M('Brand')->where('id=' . $id)->save($data);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('index'), 1);
                } else {
                    $this->error('编辑失败', U('index'), 1);
                }
            
        } else {
            $data = $this->db->where('id=' . $id)->find();
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

    function delBrand() {
        $id = I('id');
        $tmp = $this->db->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->success('删除成功！', U('index'), 1);
        } else {
            $this->error('删除失败！', U('index'), 1);
        }
    }

    function addImg() {
        if (!empty(I('post.'))) {
            $post = I('post.');
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
                //dump($post);exit;
                $tmp = M('bimg')->add($post);
                if ($tmp >= 0) {
                    $this->success('添加成功！', U('img'), 1);
                } else {
                    $this->error('添加失败', U('img'), 1);
                }
            } else {
                $this->error('请添加图片！');
            }
        } else {
            $brandlist = $this->db->order('sort desc')->field("id,name")->select();
            foreach ($brandlist as $k => $v) {
                $select_value[] = array("value" => $v['id'], "option_name" => $v['name']);
            }
            $select['info'] = $select_value;
            $select['select_value'] = '';
            //组建数组
            $info = array(
                getHtml('brand_id', 'select', '品牌名称', $select, ''),
                getHtml('name', 'text', '图片名称', '', ''),
                getHtml('introduce', 'text', '图片简介', '', ''),
                getHtml('mintroduce', 'text', '图片英文简介', '', ''),
                getHtml('sort', 'text', '排序', '', ''),
                getHtml('img', 'file', '品牌图片', '', ''),
            );
            $this->info = $info;
            $this->action_url = U('addImg');
            $this->display('Public/add');
        }
    }

    function img() {
        if (I('post.')) {
            $brand_id = I('brand_id');
            $where['brand_id'] = $brand_id;
            $brandinfo = $this->db->where(array('id' => $brand_id))->field("id,name")->find();
            $this->assign('brandinfo', $brandinfo);
        }
        $count = M('bimg')->where($where)->count();
        $Page = new \Think\Page($count, 8, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $data['List'] = M('bimg')->where($where)->order("sort desc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $data['brandlist'] = $this->db->order('sort desc')->field("id,name")->select();
        $this->assign('page', $Page->show());
        $this->assign('data', $data);
        $this->display();
    }

    function editImg() {
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
                //dump($post);exit;
                $tmp = M('bimg')->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('img'), 1);
                } else {
                    $this->error('编辑失败', U('img'), 1);
                }
            } else {
                unset($post['img']);
                $tmp = M('bimg')->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('img'), 1);
                } else {
                    $this->error('编辑失败', U('img'), 1);
                }
            }
        } else {
            $data = M('bimg')->where('id=' . $id)->find();
            //$brandname = M('bimg')->where(array('brand_id'=>$data['brand_id']))->field("id,name")->find();
            $brandlist = $this->db->order('sort desc')->field("id,name")->select();
            foreach ($brandlist as $k => $v) {
                $select_value[] = array("value" => $v['id'], "option_name" => $v['name']);
            }
            $select['info'] = $select_value;
            $select['select_value'] = $data['brand_id'];
            //组建数组
            $info = array(
                getHtml('id', 'hidden', 'id', $data['id'], ''),
                getHtml('brand_id', 'select', '品牌名称', $select, ''),
                getHtml('name', 'text', '图片名称', $data['name'], ''),
                getHtml('introduce', 'text', '图片简介', $data['introduce'], ''),
                getHtml('mintroduce', 'text', '图片英文简介', $data['mintroduce'], ''),
                getHtml('sort', 'text', '排序', $data['sort'], ''),
                getHtml('img', 'file', '品牌图片', $data['img'], ''),
            );
            $this->info = $info;
            $this->action_url = U('editImg');
            $this->display('Public/add');
        }
    }

    function delImg() {
        $id = I('id');
        $tmp = M('bimg')->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->success('删除成功！', U('img'), 1);
        } else {
            $this->error('删除失败！', U('img'), 1);
        }
    }

    function shop() {
        if (I('post.')) {
            $brand_id = I('brand_id');
            $where['brand_id'] = $brand_id;
            $brandinfo = $this->db->where(array('id' => $brand_id))->field("id,name")->find();
            $this->assign('brandinfo', $brandinfo);
        }
        $count = M('shop')->where($where)->count();
        $Page = new \Think\Page($count, 8, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $data['List'] = M('shop')->where($where)->order("sort asc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $data['brandlist'] = $this->db->order('sort desc')->field("id,name")->select();
        $this->assign('page', $Page->show());
        $this->assign('data', $data);
        $this->display();
    }

    function addShop() {
        if (!empty(I('post.'))) {
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
                $post = I('post.');
                $post['img'] = '/Uploads/' . $info['savepath'] . $info['savename'];
                $post['time'] = time();
                //dump($post);exit;
                $tmp = M('shop')->add($post);
                if ($tmp >= 0) {
                    $this->success('添加成功！', U('shop'), 1);
                } else {
                    $this->error('添加失败', U('shop'), 1);
                }
            } else {
                $this->error('请添加图片！');
            }
        } else {
            $brandlist = $this->db->order('sort desc')->field("id,name")->select();
            foreach ($brandlist as $k => $v) {
                $select_value[] = array("value" => $v['id'], "option_name" => $v['name']);
            }
            $select['info'] = $select_value;
            $select['select_value'] = '';
            //组建数组
            $info = array(
                getHtml('brand_id', 'select', '类别', $select, ''),
                getHtml('name', 'text', '标题', '', ''),
                getHtml('address', 'text', '简介', '', ''),
                getHtml('tel', 'text', '来源', '', ''),
//                getHtml('address', 'text', '店铺地址', '', ''),
//                getHtml('tel', 'text', '电话', '', ''),
                getHtml('sort', 'text', '排序', '', ''),
//                getHtml('img', 'file', '封面', '', ''),
                getHtml('img', 'file', '图片', '', ''),
                getHtml('content', 'editor', '内容', '', ''),
            );
            $this->info = $info;
            $this->action_url = U('addShop');
            $this->display('Public/add');
        }
    }

    function editShop() {
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
                $tmp = M('shop')->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('shop'), 1);
                } else {
                    $this->error('编辑失败');
                }
            } else {
                unset($post['img']);
                $post['time'] = time();
                $tmp = M('shop')->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('shop'), 1);
                } else {
                    $this->error('编辑失败', U('shop'), 1);
                }
            }
        } else {
            $data = M('shop')->where('id=' . $id)->find();
            $brandlist = $this->db->order('sort desc')->field("id,name")->select();
            foreach ($brandlist as $k => $v) {
                $select_value[] = array("value" => $v['id'], "option_name" => $v['name']);
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
//                getHtml('img', 'file', '封面', '', ''),
                getHtml('img', 'file', '图片', $data['img'], ''),
                getHtml('content', 'editor', '内容', htmlspecialchars_decode($data['content']), ''),
            );
            $this->info = $info;
            $this->action_url = U('editShop');
            $this->display('Public/add');
        }
    }

    function delShop() {
        $id = I('id');
        $tmp = M('shop')->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->success('删除成功！', U('shop'), 1);
        } else {
            $this->error('删除失败！', U('shop'), 1);
        }
    }

}
