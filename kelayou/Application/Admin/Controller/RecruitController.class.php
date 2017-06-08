<?php

namespace Admin\Controller;

use Think\Controller;

class RecruitController extends PublicController
{
	private $model;
	function __construct()
	{
		parent::__construct();
		$this->model=M('recruit');
	}
	//职位列表
	public function index(){
		$page = I('page')? : 1;
		$count = $this->model->count();
		$rpage = Page($count, 10, $page);
		$rpage1 = $rpage['page_l'];
		$rpage2 = $rpage['page_r'];
		$recruit=$this->model->order('id desc')->limit($rpage1,$rpage2)->select();
		$this->assign('recruit',$recruit);
		$this->assign('page',$rpage['page']);
		$this->assign('module',$this->module);
		$this->display();
	}
	
	//职位删除
	public function delete(){
		$id=I('post.id');
		$res=$this->model->where("id='$id'")->delete();
		if($res){
			$dat['status']=1;
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}
	
	//招聘职位添加
	public function add(){
		if(I('post.')){
			$data=$_POST;
			$data['ptime']=time();
			$res=M('recruit')->add($data);
			if($res){
				$this->redirect('Recruit/index');
			}else{
				$this->error('添加职位失败');
			}					
		}else{
		//组建数组
			$info=array(
				getHtml('posts','text','招聘职位','',''),
				getHtml('number','text','招聘人数','',''),
				getHtml('money','text','薪资待遇','',''),
				getHtml('phone','text','联系电话','',''),
				getHtml('address','text','联系地址','',''),
				getHtml('description','editor','职位描述','',''),
				getHtml('sort','text','排序','',''),
			);
			$this->info=$info;
			$this->action_url=U('add');
			$this->display('Public/add');
		}
	}
	
	//招聘职位编辑
	
	public function update(){
		$id=I('get.id');
		if(I('post.')){
			$id=I('post.id');
			$data=$_POST;
			$res=M('recruit')->where("id='$id'")->save($data);
			if($res){
				$this->redirect('Recruit/index');
			}else{
				$this->error('编辑职位失败');
			}					
		}else{
			$rec=$this->model->where("id='$id'")->find();
			
		//组建数组
			$info=array(
				getHtml('posts','text','招聘职位',$rec['posts'],''),
				getHtml('number','text','招聘人数',$rec['number'],''),
				getHtml('money','text','薪资待遇',$rec['money'],''),
				getHtml('phone','text','联系电话',$rec['phone'],''),
				getHtml('address','text','联系地址',$rec['address'],''),
				getHtml('description','editor','职位描述',$rec['description'],''),
				getHtml('sort','text','排序',$rec['sort'],''),
				getHtml('id','hidden','ID',$rec['id'],''),
			);
			$this->info=$info;
			$this->action_url=U('update');
			$this->display('Public/add');
		}
	}
	
	
}