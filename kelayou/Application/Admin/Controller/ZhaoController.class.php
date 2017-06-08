<?php

namespace Admin\Controller;

use Think\Controller;

class ZhaoController extends PublicController {

    public $db;
    public $dbname = 'zhao';

    function __construct() {
        parent::__construct();
        //检查admin权限
        $this->db = M($this->dbname);
    }

    function fuze() {
        $data['List'] = M('fuze')->select();
        $this->assign('data', $data);
        $this->display();
    }

    function addFuze() {
        if (!empty(I('post.'))) {
            $post = I('post.');
                $tmp = M('fuze')->add($post);
                if ($tmp >= 0) {
                    $this->success('添加成功！', U('fuze'), 1);
                } else {
                    $this->error('添加失败', U('fuze'), 1);
                }
            
        } else {
            //组建数组
            $info = array(
                getHtml('name', 'text', '负责人', '', ''),
                getHtml('position', 'text', '职位', '', ''),
                getHtml('tel', 'text', '电话', '', ''),
            );
            $this->info = $info;
            $this->action_url = U('addFuze');
            $this->display('Public/add');
        }
    }

    function editFuze() {
        $id = I("id");
        if (!empty($_POST)) {
            $post = $_POST;
                $tmp = M('fuze')->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('fuze'), 1);
                } else {
                    $this->error('编辑失败', U('fuze'), 1);
                }
        } else {
            $data = M('fuze')->where('id=' . $id)->find();
            //组建数组
            $info = array(
                getHtml('id', 'hidden', 'id', $data['id'], ''),
                getHtml('name', 'text', '负责人', $data['name'], ''),
                getHtml('position', 'text', '职位', $data['position'], ''),
                getHtml('tel', 'text', '电话', $data['tel'], ''),
            );
            $this->info = $info;
            $this->action_url = U('editFuze');
            $this->display('Public/add');
        }
    }

    function editZhao() {
        if (!empty($_POST)) {
            $post = $_POST;
            $tmp = $this->db->where('id= 1')->save($post);
            if ($tmp >= 0) {
                $this->success('编辑成功！', U('editZhao'), 1);
            } else {
                $this->error('编辑失败', U('editZhao'), 1);
            }
        } else {
            $data = $this->db->where('id= 1')->find();
            //组建数组
            $info = array(
                getHtml('titley', 'text', '名称1', $data['titley'], ''),
                getHtml('contenty', 'editor', '内容1', $data['contenty'], ''),
                getHtml('titlet', 'text', '名称2', $data['titlet'], ''),
                getHtml('contentt', 'editor', '内容2', $data['contentt'], ''),
                getHtml('titlez', 'text', '名称3', $data['titlez'], ''),
                getHtml('contentz', 'editor', '内容3', $data['contentz'], ''),
                getHtml('titleq', 'text', '名称4', $data['titleq'], ''),
                getHtml('contentq', 'editor', '内容4', $data['contentq'], ''),
                getHtml('titled', 'text', '底部标题', $data['titled'], ''),
                getHtml('tel', 'text', '加盟热线', $data['tel'], ''),
            );
            $this->info = $info;
            $this->action_url = U('editZhao');
            $this->display('Public/add');
        }
    }

    function delFuze() {
        $id = I('id');
        $tmp = M('fuze')->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->success('删除成功！', U('fuze'), 1);
        } else {
            $this->error('删除失败！', U('fuze'), 1);
        }
    }
}
