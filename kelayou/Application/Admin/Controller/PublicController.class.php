<?php

namespace Admin\Controller;

use Think\Controller;

class PublicController extends Controller {

    function __construct() {
        parent::__construct();
        is_login();
        $id=$_SESSION['uid'];
        $user=M("admin")->where("id='$id'")->getfield("name");
        // print_r($user);
        $this->assign("use",$user);
    }
    /**
     * 多图上传
     */
    function uploadImages()
    {

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     31457280 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     'admin/'.CONTROLLER_NAME.'/'; // 设置附件上传（子）目录
        $upload->saveName  =array('uniqid',time().'_'.mt_rand());
        $info   =   $upload->upload();
        if(!$info){
            $this->ajaxReturn($upload->getError());
        }else {
            $path = "/Uploads/" . $info['file']['savepath'] . $info['file']['savename'];
            $this->ajaxReturn(array("path"=>$path));
        }
    }

}