<?php
namespace Admin\Controller;
use Think\Controller;
//视频控制器
class VideoController extends PublicController{
        public $db;
        public $dbname='video';
    function __construct() {
        parent::__construct();
        //检查admin权限
        $this->db=M($this->dbname);
    }
    
    function video(){
        $id=I('get.id');
        $data=  $this->db->find($id);
        //bug($data);
        $this->assign('data', $data);
        $this->display();
    }
            
    function add(){
        if(!empty($_POST)){
            $post=I('post.');
            $post['ctime']=strtotime(I('post.ctime'));
            if($_FILES['path']['error']==0){
                //上传图片
                    $upload=new \Think\Upload();
                    $upload->maxSize    =   0;
                    $upload->exts       =   array('mp4');
                    $upload->savePath   =   $this->dbname.'_img/';
                    $info=$upload->uploadOne($_FILES['path']);
                    if(!$info){
                        $this->error($upload->getError());
                    }  
                        //上传成功
                    $post['path']='/Uploads/'.$info['savepath'].$info['savename'];
                    //入库
                    $tmp=$this->db->add($post);
                    if($tmp){
                        $this->success('添加成功！', U('index'), 1);
                    }  else {
                        $this->error('添加失败', U('index'), 1);
                    }
            }  else {
                        $this->error('请添加视频！');
            }
        }else {
            //组建数组
            $info=array(
                getHtml('name','text','视频名称','',''),
                getHtml('ctime','time','发布时间','',''),
                getHtml('sort','text','排序值','',''),
                getHtml('path','video','选择视频文件','',''),
                getHtml('description','textarea','简介','',''),
            );
            $this->info=$info;
            $this->action_url=U('add');
            $this->display('Public/add');
        }
    }
    
    function edit(){
        $id=I('get.id')?:I("post.id");
        if(!empty($_POST)){
            $post=$_POST;
            $post['ctime']=strtotime(I('post.ctime'));
            if($_FILES['path']['error']==0){
                //上传图片
                    $upload=new \Think\Upload();
                    $upload->maxSize    =   0;
                    $upload->exts       =   array('mp4');
                    $upload->savePath   =   $this->dbname.'_img/';
                    $info=$upload->uploadOne($_FILES['path']);
                    if(!$info){
                        $this->error($upload->getError());
                    }  
                        //上传成功
                    $post['path']='/Uploads/'.$info['savepath'].$info['savename'];
                    //入库
                    $tmp=$this->db->add($post);
                    if($tmp){
                        $this->success('编辑成功！', U('index'), 1);
                    }  else {
                        $this->error('编辑失败', U('index'), 1);
                    }
            } else {
                unset($post['path']);
                $tmp=$this->db->add($post);
                if($tmp){
                    $this->success('编辑成功！', U('index'), 1);
                }  else {
                    $this->error('编辑失败', U('index'), 1);
                }
            }
        }else {
            $data=$this->db->find($id);
//            $this->assign('data', $data);
            //组建数组
            $info=array(
                getHtml('name','text','视频名称',$data['name'],''),
                getHtml('ctime','time','发布时间',date('Y-m-d H:i:s',$data['ctime']),''),
                getHtml('sort','text','排序值',$data['sort'],''),
                getHtml('path','video','选择视频文件','',''),
                getHtml('description','textarea','简介',$data['description'],''),
            );
            $this->info=$info;
            $this->action_url=U('add');
            $this->display('Public/add');
//            $this->display();
        }
    }
    
    function del(){
        $id=I('id');
        $tmp=$this->db->delete($id);
        if($tmp==1){
            $this->success('删除成功！', U('index'), 1);
        }else{
            $this->error('删除失败！', U('index'), 1);
        }
    }
    
    function index(){
        $page = I('page')? : 1;
        $count = $this->db->count();
        $rpage = Page($count, 10, $page);
        $rpage1 = $rpage['page_l'];
        $rpage2 = $rpage['page_r'];
        $data=$this->db->order('sort')->limit($rpage1,$rpage2)->select();
        foreach ($data as $k=>$v){
            $data[$k]['ctime']=date('Y-m-d H:i:s',$v['ctime']);
        }
        $this->assign('data', $data);
        $this->assign('module',$this->module);
        $this->assign('page',$rpage['page']);
        $this->display();
    }
}



