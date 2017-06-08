<?php

namespace Admin\Controller;

use Think\Controller;

class VipController extends PublicController {

    public function index()
    {
        $list = M('vip')->order("sort asc")->select();
        $this->assign('data', $list);
        $this->display();
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
            $tmp = M('vip')->where('id=' . $id)->save($data);
            if ($tmp >= 0) {
                $this->success('编辑成功！', U('index'), 1);
            } else {
                $this->error('编辑失败', U('index'), 1);
            }

        } else {
            $data = M('vip')->where('id=' . $id)->find();
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
}
