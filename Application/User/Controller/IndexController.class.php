<?php

namespace User\Controller;

use Think\Controller;
//宁鲁华  2016/5/21   管理员登录
class IndexController extends Controller {
		
		/*public function __construct(){
			is_login();
		}*/
    public function index1() {
		$this->display();
    }
	
	 public function index() {
		$this->display();
    }
    
//验证码
	public function verify($code=''){
		ob_clean();//销毁缓冲区
		$code=I('code');
		if(!$code){
			$verify = new \Think\Verify();
			$verify->entry(2);
		}else{
			$verify = new \Think\Verify();
			$verify1= $verify->check($code, 2);
			$verify2=$verify1?1:2;
			if ($verify2==1) {
				$check=$this->do_login();
				echo $check;
				 // echo  $verify2;
			}else{
				echo 2;//验证码错误
			}
		}
	}


    public function do_login(){
		$name=$_POST['name'];
		$pwd=md5($_POST['pwd']);
		$con=array(
			'name'=>$name,
			'pwd'=>$pwd,
			'_logic'=>'and'
		);
		$arr=M("admin")->where($con)->find();
		if ($arr) {
			if ($pwd==$arr['pwd']) {
				$_SESSION['admin_id']=$arr['id'];
				$_SESSION['admin_time']=time();
				$dat['admin_id']=$_SESSION['admin_id'];//登录记录
				$dat['last_login']=$_SESSION['admin_time'];
				$dat['ip']=get_client_ip();
				M('record')->add($dat);
				$data=1;//成功
			}else{
				$data=-1;//用户名或密码错误
			}
		}else{
			$data=-1;//用户名或密码错误
		}
		
		return $data;
	}

	


	
}
