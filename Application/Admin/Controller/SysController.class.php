<?php
namespace Admin\Controller;
use Think\Controller;
class SysController extends PublicController{

//显示基本设置信息
	public function system_base(){
		$sys=M('system')->where("is_show=1")->select();

		// var_dump($sys);

		$this->assign("sys",$sys);
		$this->display();
	}

//更改基本设置信息
	public function save(){
		$data=$_POST;
		//dump($data);exit;
 		// 
		foreach ($data as $key => $value) {
			//dump($_FILES['image'.$key]);exit;

			$res=M('system')->where("id='".$key."'")->find();
			// dump($res);
			if($res['type'] == 30 ){
				if($_FILES['image'.$key]['error']!==4){
					
				
				if($_FILES['image'.$key]['error']==0);
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
					$value="/Uploads/".$info['image'.$key]['savepath'].$info['image'.$key]['savename'];
					$result=M('system')->where("id='".$key."'")->save(array('value'=>$value));
				}
				}

			}else{
				$result=M('system')->where("id='".$key."'")->save(array('value'=>$value));
			}
			
			
		}

		$this->redirect('Sys/system_base');
	}
	
//系统配置
	public function index(){
		$com=M('system');
		$page = I('page')? : 1;
        $count = $com->count();
        $page_size=10;
        $page_count = ceil($count/ $page_size);
        $rpage = Page($count, $page_size, $page,$page_count);
        $rpage1 = $rpage['page_l'];
        $rpage2 = $rpage['page_r'];
        $data = $com->order("id desc")->limit("$rpage1,$rpage2")->select();
        $this->assign('sys', $data);
        $this->assign('page',$rpage['page']);
		$this->assign('module',$this->module);
		$this->display();
	}
	
//添加配置
	public function addsys(){
		$dat=I('post.');
		$dat['is_show']=1;
		$res=M('system')->add($dat);
		if($res){
			$dat['status']=1;
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}

	
// 系统编辑
	public function edit(){
		if(I('post.')){
			$id=I('post.id');
			$dat['remark']=I('post.remark');
			$type=$sys=M('system')->where("id='$id'")->getField('type');
			if($type==30){
				if($_FILES['value']['error']==0){
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
						$value="/Uploads/".$info['value']['savepath'].$info['value']['savename'];
						$dat['value']=$value;
					}
					}else{
						$dat['value']=$value;
					}	
			}else{
					$dat['value']=$_POST['value'];	
			}
			
			$res=M('system')->where("id='$id'")->save($dat);
			if($res){
				$this->redirect('Sys/index');
			}else{
				$this->error('修改失败');
			}
			
		}else{
			$id=I('get.id');
			$sys=M('system')->where("id='$id'")->find();
			$type=$sys['type'];
			if($type==1){
				$info=array(
					getHtml('remark','text','名称',$sys['remark'],''),
					getHtml('value','text','配置内容',$sys['value'],''),
					getHtml('id','hidden','id',$sys['id'],''),
				);
				}else if($type==2){
					$info=array(
					getHtml('remark','text','名称',$sys['remark'],''),
					getHtml('value','textarea','配置内容',$sys['value'],''),
					getHtml('id','hidden','id',$sys['id'],''),
					);
				}else if($type==3){
					$info=array(
					getHtml('remark','text','名称',$sys['remark'],''),
					getHtml('value','editor','配置内容',$sys['value'],''),
					getHtml('id','hidden','id',$sys['id'],''),
					);
				}else if($type==30){
					$info=array(
					getHtml('remark','text','名称',$sys['remark'],''),
					getHtml('value','file','配置内容',$sys['value'],''),
					getHtml('id','hidden','id',$sys['id'],''),
					);
			}
           
			
			$this->info=$info;
			$this->action_url=U('edit');
			$this->display('Public/add');
			}
		}
		
	



}