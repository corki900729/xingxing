<?php
//宁鲁华  2016/5/21 管理员管理
namespace Admin\Controller;
use Think\Controller;
class UsersController extends PublicController {
	public function add(){//管理员添加
	  	$_POST['regist']=time();
	  	$_POST['pwd']=md5($_POST['pwd']);
 		$name=$_POST['name'];
		if ($_POST) {
		   $arr=M("admin")->where("name='$name'")->find();
				   if ($arr) {
				   	$data = 2;
					  //管理员已存在
				   }else{
					 $result = M("admin")->add($_POST);
					 if ($result) {
						$data = 1;//成功
					 }else{
					  $data = 0;//添加失败  注册失败
					 }
				   }
			
		  }else{
			 $data = -1;//无数据进入
		  }
		  echo json_encode($data);
		
	}

	public function admin_list(){//     管理员列表
		$id=$_SESSION['admin_id'];

		$us=M("admin")->where("id='$id'")->find();
        $power=$us['power']; 
		if($power=='1'){
			$arr=M("admin")->select();
		}else{
			
			$arr=M("admin")->where("id='$id'")->select();
		}
		foreach($arr as $k=>&$v){
			$v['regist']=date('Y-m-d', $v['regist']);
		}
		unset($v);
		// print_r($_SESSION);
		$this->assign("users",$arr);
		$this->assign('module',$this->module);
		$this->display();
	}

	public function admin_edit(){//     修改管理员
		$id=$_SESSION['admin_id'];
		$us=M("admin")->where("id='$id'")->find();
        $power=$us['power'];
		if($power=='1'){
			$this->assign("qxx",1);//此时登录的是超级管理员
		}else{
			
			$this->assign("qxx",2);
		}
		$id1=I("get.id");
		$arr=M("admin")->where("id='$id1'")->find();
		// dump($arr);
		$this->assign("uu",$arr);
		$this->display();
	}

	public function edit(){
		$id=I("get.id");
		$arr=M("admin")->where("id='$id'")->find();
		$o_pwd=$arr['pwd'];//加密后的
		if ($_POST) { 
			$j_pwd=md5($_POST['pwd']);
			if($o_pwd==$j_pwd){
				if($o_pwd==md5(I('post.pwd1'))){
					$data= -4;//修改密码跟原始密码一致
				}else{
					$data['name']=I('post.name');
					$data['power']=I('post.power');
					$data['pwd']=md5($_POST['pwd1']);
					$address1=M('admin')->where("id='$id'")->save($data);
					if($address1){
						$data = 1;//修改成功
					}else{
						$data = -2;
					}	
				}
			}else{
				$data = -1;//原密码错误
			}
	  	}else{
			$data = -3;//无数据进入
		}
			  echo json_encode($data);
	}

	//后台用户退出
	public function out(){
		$data['admin_id']=session('admin_id');
		$data['out_login']=time();
		$data['ip']=get_client_ip();
		$res=M('record')->add($data);
		if($res){
			unset($_SESSION['admin_id']);
			unset($_SESSION['admin_time']);
			header("location:/index.php/User/Index/index");
		}
	}

	//管理员登录退出日志
	public function admin_log(){
		$page = I('page')? : 1;
		$count =M('record')->count();
		$rpage = Page($count, 10, $page);
		$rpage1 = $rpage['page_l'];
		$rpage2 = $rpage['page_r'];
		$log=M('record')->order('id desc')->limit($rpage1,$rpage2)->select();
		$this->assign('log',$log);
		$this->assign('page',$rpage['page']);
		$this->assign('count',$count);
		$this->display();
	}

	//删除登录日志
	public function log_del(){
		$id=I('post.id');
		$admin_id=session('admin_id');
		$power=M('admin')->where("id = '$admin_id'")->getField('power');
		if($power==1){
			$res=M('record')->where("id = '$id'")->delete();
			if($res){
				$return['status']=1;
			}else{
				$return['status']=0;
			}
		}else{
			$return['status']=2;
		}
		
		$this->ajaxReturn($return);
	}
	
	public function del_all(){
		$ids=I('post.ids');
		$ids=explode(',',$ids,-1);
		foreach($ids as $v){
			$result=M('record')->where("id='".$v."'")->delete();
		}
		if($result){
			$return['status']=1;
		}else{
			$return['status']=0;
		}
		$this->ajaxReturn($return);
	}

	public function del(){
        $id=I('post.id');
        if($id==session('admin_id')){
            $this->ajaxReturn(-2);
        }
        $date=M('admin')->where("id='$id'")->delete();
        if($date){
        	$return =1;//删除成功
        }else{
        	$return =-1;//删除失败
        }
        $this->ajaxReturn($return);
    }
	
}