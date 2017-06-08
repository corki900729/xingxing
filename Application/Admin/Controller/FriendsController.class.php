<?php

namespace Admin\Controller;

use Think\Controller;

class FriendsController extends PublicController
{
	private $model;
	function __construct()
	{
		parent::__construct();
		$this->model=M('friends');
	}
//友情链接列表
	public function index(){
		$page = I('page')? : 1;
		$count = $this->model->count();
		$rpage = Page($count, 10, $page);
		$rpage1 = $rpage['page_l'];
		$rpage2 = $rpage['page_r'];
		$friends=$this->model->order('id desc')->limit($rpage1,$rpage2)->select();
		$this->assign('friends',$friends);
		$this->assign('page',$rpage['page']);
		$this->assign('module',$this->module);
		$this->display();
	}
	
	//友情链接删除
	public function delete(){
		$id=I('post.id');
		$model=D('friends');
		$res=$model->del($id);
		if($res){
			$dat['status']=1;
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}
	
	//友情链接添加
	public function add(){
		if(I('post.')){
			
			if($_FILES['image']['error']==0);
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     31457280 ;// 设置附件上传大小
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
				$upload->savePath  =     'admin/'.CONTROLLER_NAME.'/'; // 设置附件上传（子）目录
				$upload->saveName  =array('uniqid',time().'_'.mt_rand());
				$info   =   $upload->upload();

				if(!$info){
					$this->error($upload->getError());
				}else{
					$data=I('post.');
					$data['ptime']=time();
					$data['image']="/Uploads/".$info['image']['savepath'].$info['image']['savename'];
					$result=$this->model->add($data);
					if($result){
						$this->redirect('Friends/index');
					}
				}
							
		}else{
		//组建数组
			$info=array(
				getHtml('title','text','链接标题','',''),
				getHtml('image','file','图片上传','',''),
				getHtml('link_url','text','链接地址','',''),
				getHtml('sort','text','排序值','',''),
			);
			$this->info=$info;
			$this->action_url=U('update');
			$this->display('Public/add');
		}
	}
	
	//友情链接编辑
	public function update(){
		$id=I('get.id');
		if(I('post.')){
				if($_FILES['image']['error']==4){
					$data=I('post.');
					$id=I('post.id');
					$res=$this->model->where("id='$id'")->save($data);
					if($res){
						$this->redirect('Friends/index');
					}
				}else{
				if($_FILES['image']['error']==0);
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     31457280 ;// 设置附件上传大小
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
				$upload->savePath  =     'admin/'.CONTROLLER_NAME.'/'; // 设置附件上传（子）目录
				$upload->saveName  =array('uniqid',time().'_'.mt_rand());
				$info   =   $upload->upload();

				if(!$info){
					$this->error($upload->getError());
				}else{
					$data=I('post.');
					$id=I('post.id');
					$data['image']="/Uploads/".$info['image']['savepath'].$info['image']['savename'];
					$result=$this->model->where("id='$id'")->save($data);
					if($result){
						$this->redirect('Friends/index');
					}
				}
				}
		}else{
			$friends=M('friends')->where("id='$id'")->find();
			
			$info=array(
				getHtml('title','text','链接标题',$friends['title'],''),
				getHtml('image','file','图片上传',$friends['image'],''),
				getHtml('link_url','text','链接地址',$friends['link_url'],''),
				getHtml('sort','text','排序值',$friends['sort'],''),
				getHtml('id','hidden','ID',$friends['id'],''),
			);
			$this->info=$info;
			$this->action_url=U('update');
			$this->display('Public/add');
		}
	}


	//链接的关闭
	public function guanbi(){
		$id=I('post.id');
		$res=M('friends')->where("id='$id'")->setField('status',1);
		if($res){
			$dat['status']=1;
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}

	//链接的开启
	public function kaiqi(){
		$id=I('post.id');
		$res=M('friends')->where("id='$id'")->setField('status',0);
		if($res){
			$dat['status']=1;
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}
	
	
	
}