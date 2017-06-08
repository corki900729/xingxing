<?php

namespace Admin\Controller;

use Think\Controller;

class AboutController extends PublicController {

    public $db;
    public $dbname = 'about';

    function __construct() {
        parent::__construct();
        //检查admin权限
        $this->db = M($this->dbname);
    }

    function index() {
        $data['oneList'] = $this->db->where(array('id' => 1))->find();
        $data['List'] = $this->db->where('id <> 1')->order("sort desc")->select();
        $this->assign('data', $data);
        $this->display();
    }

    function addAbout() {
        if (!empty(I('post.'))) {
            $post = I('post.');
            if ($_FILES['image']['error'] == 0) {
                //上传图片
                $upload = new \Think\Upload();
                $upload->maxSize = 0;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->savePath = $this->dbname . '_img/';
                $info = $upload->uploadOne($_FILES['image']);
                if (!$info) {
                    $this->error($upload->getError());
                }
                $post['image'] = '/Uploads/' . $info['savepath'] . $info['savename'];
                //dump($post);exit;
                $tmp = $this->db->add($post);
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
                getHtml('name', 'text', '文章标题', '', ''),
                getHtml('mname', 'text', '文章英文标题', '', ''),
                getHtml('sort', 'text', '排序', '', ''),
                getHtml('image', 'file', '文章图片', '', ''),
                getHtml('introduce', 'textarea', '文章内容', '', ''),
                getHtml('mintroduce', 'textarea', '文章英文内容', '', ''),
            );
            $this->info = $info;
            $this->action_url = U('addAbout');
            $this->display('Public/add');
        }
    }

    function editAbout() {
        $id = I("id");
        if (!empty($_POST)) {
            $post = $_POST;
            if ($_FILES['image']['error'] == 0) {
                //上传图片
                $upload = new \Think\Upload();
                $upload->maxSize = 0;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->savePath = $this->dbname . '_img/';
                $info = $upload->uploadOne($_FILES['image']);
                if (!$info) {
                    $this->error($upload->getError());
                }
                $post['image'] = '/Uploads/' . $info['savepath'] . $info['savename'];
                $tmp = $this->db->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('index'), 1);
                } else {
                    $this->error('编辑失败', U('index'), 1);
                }
            } else {
                unset($post['image']);
                $tmp = M('about')->where('id=' . $id)->save($post);
                if ($tmp >= 0) {
                    $this->success('编辑成功！', U('index'), 1);
                } else {
                    $this->error('编辑失败', U('index'), 1);
                }
            }
        } else {
            $data = $this->db->where('id=' . $id)->find();
            if ($id != 1) {
                $getHtml_sort = getHtml('sort', 'text', '排序', $data['sort'], '');
                $getHtml_introduce = getHtml('introduce', 'textarea', '文章描述', htmlspecialchars_decode($data['introduce']), '');
                $getHtml_mintroduce = getHtml('mintroduce', 'textarea', '文章英文内容', $data['mintroduce'], '');
            } else {
                $getHtml_introduce = getHtml('introduce', 'editor', '文章描述', htmlspecialchars_decode($data['introduce']), '');
            }
            //组建数组
            $info = array(
                getHtml('id', 'hidden', 'id', $data['id'], ''),
                getHtml('name', 'text', '文章名字', $data['name'], ''),
                getHtml('mname', 'text', '文章英文名字', $data['mname'], ''),
                $getHtml_sort,
                getHtml('image', 'file', '文章图片', $data['image'], ''),
                $getHtml_introduce,
                $getHtml_mintroduce,
            );
            $this->info = $info;
            $this->action_url = U('editAbout');
            $this->display('Public/add');
        }
    }

    function delAbout() {
        $id = I('id');
        $tmp = $this->db->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->success('删除成功！', U('index'), 1);
        } else {
            $this->error('删除失败！', U('index'), 1);
        }
    }

    function licheng() {
        $data['List'] = M('aboutlc')->order("year desc")->select();
        $this->assign('data', $data);
        $this->display();
    }

    function addLicheng() {
        if (!empty(I('post.'))) {
            $post = I('post.');
            $post['year'] = I('post.YYYY');
            $tmp = M('aboutlc')->add($post);
            if ($tmp >= 0) {
                $this->success('添加成功！', U('licheng'), 1);
            } else {
                $this->error('添加失败', U('licheng'), 1);
            }
        } else {
            //组建数组
            $info = array(
                getHtml('year', 'year', '历程年份', '', ''),
                getHtml('title', 'text', '历程标题', '', ''),
                getHtml('content', 'text', '历程内容', '', ''),
            );
            $this->info = $info;
            $this->action_url = U('addLicheng');
            $this->display('Public/add');
        }
    }

    function editLicheng() {
        $id = I("id");
        if (!empty($_POST)) {
            $post = $_POST;
            $post['year'] = I('post.YYYY');
            $tmp = M('aboutlc')->where('id=' . $id)->save($post);
            if ($tmp >= 0) {
                $this->success('编辑成功！', U('licheng'), 1);
            } else {
                $this->error('编辑失败', U('licheng'), 1);
            }
        } else {
            $data = M('aboutlc')->where('id=' . $id)->find();
            //组建数组
            $info = array(
                getHtml('id', 'hidden', 'id', $data['id'], ''),
                getHtml('year', 'year', '历程年份', $data['year'], ''),
                getHtml('title', 'text', '历程标题', $data['title'], ''),
                getHtml('content', 'text', '历程内容', $data['content'], ''),
            );
            $this->info = $info;
            $this->action_url = U('editLicheng');
            $this->display('Public/add');
        }
    }

    function delLicheng() {
        $id = I('id');
        $tmp = M('aboutlc')->where('id=' . $id)->delete();
        if ($tmp == 1) {
            $this->success('删除成功！', U('licheng'), 1);
        } else {
            $this->error('删除失败！', U('licheng'), 1);
        }
    }

}
