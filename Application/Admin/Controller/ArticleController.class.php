<?php

namespace Admin\Controller;

use Think\Controller;

class ArticleController extends PublicController {

    /**
     * 分类列表
     * data 2016/5/20
     * author SHAN
     */
    public function artlist() {
        $arr = $this->recursion();
        $data = $this->getNav($arr);
        $str = '<select id="pid"><option value="0">顶级分类</option>';
        $dat = $data;
        foreach ($dat as $k => $v) {
            $str .= '<option value="' . $v['type_id'] . '">' . $v['type_name'] . '</option>';
        }
        $str .= '</select>';
        $this->assign('str', $str);
        $this->assign('arclist', $data);

        $this->display();
    }

    /**
     * 添加分类
     * data 2016/5/20
     * author SHAN
     */
    public function addcate() {
        $art_cate = M("Arctype");
        $_POST['type_name'] = I("post.type_name");
        $_POST['sort'] = I("post.sort");
        $_POST['pid'] = I("post.pid");
        $result = $art_cate->add($_POST);
        if ($result) {
            $data = "添加成功";
        } else {
            $data = "添加失败";
        }
        echo $data;
    }

    /**
     * 分类删除操作
     * @param string $ids 多个id
     * data 2016/5/20
     * author SHAN
     */
    public function arc_del() {
        $table = M('Arctype');
        $ids = I('post.ids');
        $key = "type_id";
        $res = del_all($table, $ids, 1, $key);
        if ($res) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        $this->ajaxReturn($data);
    }

    //单个删除

    public function arcdelete() {
        $id = I('post.id');
        $res = M('Arctype')->where("type_id='$id'")->delete();
        if ($res) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        $this->ajaxReturn($data);
    }

    /**
     * 删除分类，和其下的所有子分类。
     * @param int $nid 分类ID
     * @return int
     * data 2016/5/20
     * author SHAN
     */
    public function drop_nodes($nid) {
        $childs = M("Arctype")->where("pid='$nid'")->select();
        $result = M("Arctype")->where("type_id='$nid'")->delete();
        if (is_array($childs) && !empty($childs)) {
            foreach ($childs as $key => $child) {
                $this->drop_nodes($child['type_id']);
            }
        }
        return $result;
    }

    /**
     * 分类编辑操作
     * data 2016/5/20
     * author SHAN
     */
    public function editcate() {
        $art_cate = M("Arctype");
        $id = $_POST['id'];
        $art_cate->type_id = $id;
        $art_cate->type_name = $_POST['name'];
        $art_cate->sort = $_POST['sort'];
        $result = $art_cate->save();
        if ($result) {
            $data = "编辑成功";
        } else {
            $data = "编辑失败";
        }
        echo $data;
    }

    /**
     * 新闻列表
     * data 2016/5/20
     * author SHAN
     */
    public function article() {
        $art_cate = M("article");
        $page = I('page') ? : 1;
        $count = $art_cate->where("status=1")->count();
        $page_size = 10;
        $rpage = Page($count, $page_size, $page);
        $rpage1 = $rpage['page_l'];
        $rpage2 = $rpage['page_r'];
        $data = $art_cate->where("status=1")->order("arc_id desc")->limit("$rpage1,$rpage2")->select();
        foreach ($data as $k => $v) {
            $data[$k]['type_id'] = M("arctype")->where("type_id='{$v['type_id']}'")->getField("type_name");
            $data[$k]['c_time'] = date('Y-m-d H:i:s', $v['c_time']);
        }
        $this->assign('arclist', $data);
        $this->assign('count', $count);
        $this->assign('page', $rpage['page']);
        $this->assign('module', $this->module);
        $this->display();
    }

    /**
     * @param $pid 父类id
     * @param $array
     * @param int $i
     * @return array
     * 遍历新闻分类子类
     */
    function getChild($pid, &$array, &$i = 1) {
        $value = M("arctype")->where("pid=$pid")->field("type_id,type_name")->select();
        foreach ($value as $k => $v) {
            $array[] = array("value" => $v['type_id'], "option_name" => str_repeat("&nbsp", 4 * $i) . '|--' . $v['type_name']);
            $this->getChild($v['type_id'], $array,  ++$i);
            --$i;
        }
        return $array;
    }

    /**
     * 新增新闻页面
     * data 2016/5/20
     * author SHAN
     */
    public function add_art() {
        //组建数组
        $info = array(
            getHtml('title', 'text', '新闻标题', '', ''),
            getHtml('description', 'textarea', '新闻摘要', '', ''),
            getHtml('image', 'file', '封面上传', '', ''),
            getHtml('content', 'editor', '新闻内容', '', ''),
        );
        $this->info = $info;
        $this->action_url = U('art_add');
        $this->display('Public/add');
    }

    /**
     * 添加新闻操作
     * data 2016/5/20
     * author SHAN
     */
    public function art_add() {
        if ($_POST) {
            $data=I('post.');
            if ($_FILES['image']['error'] == 0)
                ;
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 31457280; // 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'admin/' . CONTROLLER_NAME . '/'; // 设置附件上传（子）目录
            $upload->saveName = array('uniqid', time() . '_' . mt_rand());
            $info = $upload->upload();
            if (!$info) {
                $this->error($upload->getError());
            } else {
                $data = $_POST;
                $data['c_time'] = time();
                $data['arc_pic'] = "/Uploads/" . $info['image']['savepath'] . $info['image']['savename'];
                $re = M("article")->add($data);
                if ($re) {
                    $this->success("添加成功", "article");
                } else {
                    $this->error("添加失败", "add_art");
                }
            }
        } else {
            $this->error("添加失败", "Article/add_art");
        }
    }

    /**
     * 删除新闻操作
     * @param string $ids 新闻id字符串
     * data 2016/5/20
     * author SHAN
     */
    //批量删除
    public function art_del() {


        $ids = I('post.ids');
        $aOb = M("article");
        $ids = explode(',', $ids, -1);
        foreach ($ids as $m) {
            $re = $aOb->where("arc_id='$m'")->delete();
        }
        if ($re) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        $this->ajaxReturn($data);
    }

    //单个删除

    public function adelete() {
        $id = I('post.id');
        $res = M('article')->where("arc_id='$id'")->delete();
        if ($res) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        $this->ajaxReturn($data);
    }

    /**
     * 新闻编辑页面
     * @param $id 新闻ID
     * data 2016/5/20
     * author SHAN
     */
    public function edit_art($id) {
        $arr = M("article")->where("arc_id='$id'")->find();
        //组建数组
        $info = array(
            getHtml('title', 'text', '新闻标题', $arr['title'], ''),
            getHtml('description', 'textarea', '新闻摘要', $arr['description'], ''),
            getHtml('image', 'file', '封面上传', $arr['arc_pic'], ''),
            getHtml('content', 'editor', '新闻内容', htmlspecialchars_decode($arr['content']), ''),
            getHtml('arc_id', 'hidden', 'id', $id, ''),
        );
        $this->info = $info;
        $this->action_url = U('art_edit');
        $this->display('Public/add');
    }

    /**
     * 新闻编辑操作
     * data 2016/5/20
     * author SHAN
     */
    public function art_edit() {
        if ($_POST) {
            if ($_FILES['image']['error'] == 4) {
                $data = I('post.');
                $id = I('post.arc_id');
                $data['c_time'] = time();
                $re = M("article")->where("arc_id='$id'")->save($data);
                if ($re>=0) {
                    $this->redirect('Article/article');
                } else {
                    $this->error("修改失败");
                }
            } else {
                if ($_FILES['image']['error'] == 0)
                    ;
                $upload = new \Think\Upload(); // 实例化上传类
                $upload->maxSize = 31457280; // 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
                $upload->rootPath = './Uploads/'; // 设置附件上传根目录
                $upload->savePath = 'admin/' . CONTROLLER_NAME . '/'; // 设置附件上传（子）目录
                $upload->saveName = array('uniqid', time() . '_' . mt_rand());
                $info = $upload->upload();
                if (!$info) {
                    $this->error($upload->getError());
                } else {
                    $data = I('post.');
                    $id = I('post.arc_id');
                    $data['c_time'] = time();
                    $data['arc_pic'] = "/Uploads/" . $info['image']['savepath'] . $info['image']['savename'];
                    $re = M("article")->where("arc_id='$id'")->save($data);
                    if ($re>=0) {
                        $this->redirect('Article/article');
                    } else {
                        $this->error("修改失败");
                    }
                }
            }
        } else {
            $this->redirect('Article/article');
        }
    }

    /**
     * 前台展示的一维数组
     * @param  array $data 带分层的数组
     * @param  array $show 结果集数组
     * @return array 结果集数组
     * data 2016/5/20
     * author Shan
     */
    function getNav($data, &$show) {
        foreach ($data as $k => $v) {
            $show[] = array('type_name' => str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $v['level'] - 1) . '|--' . $v['type_name'] . '<br/>', 'type_id' => $v['type_id'], 'sort' => $v['sort'], 'is_final' => 0);
            if (count($v['child']) > 0) {
                $this->getNav($v['child'], $show);
            } else {
                $cbd = array_pop($show);
                $cbd['is_final'] = 1;
                $show[] = $cbd;
                $cbd = null;
            }
        }
        return $show;
    }

    /*     * 递归无限分类
     * @param int $id 分类id
     * @param int $level 分类所属层级
     * @return mixed array 无限分类数组
     * data 2016/5/20
     * author Shan
     * */

    function recursion($id = 0, $level = 1) {
        $res = M('arctype')->field('type_id,type_name,sort')->where("pid='$id'")->order('sort')->select();
        foreach ($res as $k => $v) {
            $res[$k]['level'] = $level;
            $res[$k]['child'] = $this->recursion($v['type_id'], ++$level);
            --$level;
        }
        return $res;
    }

    function sys() {
        $article = M("article_sys")->order("update_time desc")->select();
        $this->article = $article;
        $this->assign('module', $this->module);
        $this->display();
    }

    function edit_sys() {
        if ($post = I("post.")) {
            $post['update_time'] = time();
            $data = M("article_sys")->save($post);
            if ($data) {
                $this->success("编辑成功", U('sys'));
            } else {
                $this->error("编辑失败");
            }
        } else {
            $id = I("get.id");
            $data = M("article_sys")->where("id=$id")->find();
            //组建数组
            $info = array(
                getHtml('id', 'hidden', 'id', $id, ''),
                getHtml('type', 'text', '新闻类型', $data['type'], ''),
                getHtml('title', 'text', '新闻标题', $data['title'], ''),
                getHtml('desc', 'editor', '新闻内容', htmlspecialchars_decode($data['desc']), ''),
            );
            $this->info = $info;
            $this->action_url = U('edit_sys');
            $this->display("Public/add");
        }
    }

    function add_sys() {
        if ($post = I("post.")) {
            $post['create_time'] = time();
            $post['update_time'] = time();
            $res = M("article_sys")->add($post);
            if ($res) {
                $this->success("添加成功", U('sys'));
            } else {
                $this->error("添加失败");
            }
        } else {
            //组建数组
            $info = array(
                getHtml('type', 'text', '新闻类型', '', ''),
                getHtml('title', 'text', '新闻标题', '', ''),
                getHtml('desc', 'editor', '新闻内容', '', ''),
            );
            $this->info = $info;
            $this->action_url = U('add_sys');
            $this->display("Public/add");
        }
    }

}
