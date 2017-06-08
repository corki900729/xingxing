<?php
/**
/* 
 * Author:王岩
 * 导航
 * time: 2016.05.20
 */
namespace Admin\Controller;

use Think\Controller;

class MemberController extends PublicController {
	
	//会员列表
	public function member_list(){
		if(I('post.f_name')){
			$fname=I('post.f_name');
			if(preg_match("/^1[34578]\d{9}$/", $fname)){
				$where['phone']=$fname;
			}else{
				$where['username']=$fname;
			}
			$this->assign('fname',$fname);
		}
		$page = I('page')? : 1;
		$count = M('user')->where($where)->count();
		$rpage = Page($count, 10, $page);
		$rpage1 = $rpage['page_l'];
		$rpage2 = $rpage['page_r'];
		$user_info=M('user')->where($where)->order('add_time desc')->limit($rpage1,$rpage2)->select();
		foreach($user_info as $key => $val){
			$uid=$val['id'];
			$res=M('user_info')->where("uid = '$uid'")->find();
			$user_info[$key]['name']=$res['name'];
			$user_info[$key]['phone']=$res['phone'];
			$user_info[$key]['email']=$res['email'];
			$user_info[$key]['sex']=$res['sex'];
		}
		$this->assign('page',$rpage['page']);
		$this->assign('user_info',$user_info);
		$this->assign('module',$this->module);
		$this->display();
	}
	
	//会员封停
	public function member_stop(){
		$id=I('post.id');
		$res=M('user')->where("id = '$id'")->setField('status',2);
		if($res){
			$return['status']=1;
		}else{
			$return['status']=0;
		}
		$this->ajaxReturn($return);
	}
	
	//会员启用
	public function member_start(){
		$id=I('post.id');
		$res=M('user')->where("id = '$id'")->setField('status',1);
		if($res){
			$return['status']=1;
		}else{
			$return['status']=0;
		}
		$this->ajaxReturn($return);
	}
	
	//会员删除
	public function member_del(){
		$id=I('post.id');
		$res=M('user')->where("id = '$id'")->delete();
		if($res){
			M('user_info')->where("uid = '$id'")->delete();
			$return['status']=1;
		}else{
			$return['status']=0;
		}
		$this->ajaxReturn($return);
	}	
	
	//批量删除
	public function delall(){
			$ids=I('post.ids');			
            $ids = explode(',', $ids, -1);
            foreach ($ids as $v) {
                $re=M('user')->where("id = '$v'")->delete();
				$res=M('user_info')->where("uid = '$v'")->delete();
            }
			if ($re && $res) {
				$return['status']=1;
			}else{
				$return['status']=0;
			}
			$this->ajaxReturn($return);
    }
	
	//会员添加
	public function member_add(){
		if(I('post.')){
			$username=I('post.username');
			$res=M('user')->where("username = '$username'")->find();
			if($res){
				$return['status']=2;
			}else{
				$data['username']=I('post.username');
				$data['password']=md5(I('post.password'));
				$data['add_time']=time();
				$result=M('user')->add($data);
				if($result){
					$dat['uid']=$result;
					$dat['phone']=I('post.phone');
					$dat['email']=I('post.email');
					M('user_info')->add($dat);
					$return['status']=1;
				}else{
					$return['status']=0;
				}
			}
			$this->ajaxReturn($return);
		}else{
			$this->display();
		}
	}
	
	//修改密码
	public function change_password(){
		if(I('post.')){
			$id=I('post.id');
			$password=md5(I('post.newpassword'));
			$res=M('user')->where("id = '$id'")->setField('password',$password);
			if($res){
				$return['status']=1;
			}else{
				$return['status']=0;
			}
			$this->ajaxReturn($return);
		}else{
			$id=I('get.id');
			$user_info=M('user')->where("id = '$id'")->find();
			$this->assign('user_info',$user_info);
			$this->display();
		}
	}
	
	//会员资料
	public function member_show(){
		$id=I('get.id');
		$user_info=M('user_info')->where("uid = '$id'")->find();
		$user_info['add_time']=M('user')->where("id = '$id'")->getField('add_time');
		$this->assign('user_info',$user_info);
		$this->display();
	}

}