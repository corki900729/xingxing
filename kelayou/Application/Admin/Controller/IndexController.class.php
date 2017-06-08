<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends PublicController {
	//后台主页
    public function index(){
		$admin_id=session('admin_id');

        $data['menus1'] = get_sys(4);
        $data['menus2'] = get_sys(5);
        $data['menus3'] = get_sys(6);

		//登录管理员信息
		$admin_info=M('admin')->where("id = '$admin_id'")->find();
		$this->assign('admin_info',$admin_info);
		
		//未读消息
		$comment_num=M('comment')->where("status=0")->count();
		$this->assign('comment_num',$comment_num);
		$this->assign('module',$this->module);
		$this->assign('data',$data);
		$this->display();
		
	}

	public function welcome(){
		$admin_id=session('admin_id');
		if($post=I("post.")){
			preg_match_all("/^[0-9a-zA-Z]{6,20}$/",$post['password'],$matchs);
//			var_dump($matchs);exit;
			if(empty($matchs[0])){
				$this->error("请输入由数字字母组成的6-20位的密码");
			}
			$pwd=M("admin")->where("id=$admin_id")->getField("pwd");
			if(md5($post['oldpwd'])!=$pwd){  
				$this->error("输入的原密码不正确！");
			}else{
				if($post['password']!=$post['repwd']){ 
					$this->error("确认密码输入不一致!");
				}else{
					$res=M("admin")->where("id=$admin_id")->save(array('pwd'=>md5(trim($post['password']))));
					if($res){
						$this->success("密码修改成功");
					}else{
						$this->error("你的密码未做任何修改");
					}
				}
			}
		}else{
			$this->aname=M('admin')->where("id = '$admin_id'")->getField("name");
			//登录次数
			$log_num=M('record')->where("admin_id = '$admin_id' && last_login > 0")->count();
			$this->assign('log_num',$log_num);

			$admin_record=M('record')->order('id desc')->limit('1')->where("admin_id = '$admin_id' && last_login>1")->find();
			$this->assign('admin_record',$admin_record);
			$this->assign('module',$this->module);
			$this->display();
		}


	}

	public function init(){
		$module=$_POST['module'];
		foreach ($module as $k=>$v){
			foreach ($_POST[$v] as $k1=>$v1){
				switch ($v1){
					case 1:
						$option[$v]['add']=true;
						break;
					case 2:
						$option[$v]['del']=true;
						break;
					case 3:
						$option[$v]['edit']=true;
						break;
					case 4:
						$option[$v]['show']=true;
						break;
				}
			}
		}
		$option['init']='true';
		$rootPath = $_SERVER['DOCUMENT_ROOT'];
		$resource=fopen($rootPath.'/config.php','wb+');
		fwrite($resource,"<?php \r\n return ".var_export($option,true).';');
		$this->success('初始化完成',U('index/welcome'),1);
	}
}