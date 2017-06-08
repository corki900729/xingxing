<?php
/* 
 * Author:杨浩青
 * 广告管理
 * time: 2016.05.20
 */
namespace Admin\Controller;
use Think\Controller;
class AdsController extends PublicController {
	private $model;
	function __construct()
	{
		parent::__construct();
		$this->model=M('ads');
	}

	//广告位置添加
    public function position(){
		
		$model=M("adposition");
        if($post=I("post.")){
            $type=$post['type'];

            switch ($type){
                case "add":
                    $res=$model->add($post);
                    if($res){
                        $this->ajaxReturn("添加成功");	
                    }else{
                        $this->ajaxReturn("添加失败");
                    }
                break;
                case "edit":
                    $res=$model->save($post);
                    if($res){
                        $this->ajaxReturn("修改成功");
                    }else{
                        $this->ajaxReturn("修改失败");
                    }
                break;
                default:
                    break;
            }
        }else{
            $this->data=$model->order("id desc")->select();
            $this->display();
        }
	}
	
	
	//广告添加
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
						$this->redirect('Ads/index');
					}
				}	
		}else{
			$nav=M('adposition')->order('id asc')->select();
			foreach($nav as $k=>$v){
				$nav[$k]['value']=$v['id'];
				$nav[$k]['option_name']=$v['name'];
			}
			$select['info']=$nav;
			$select['select_value']='';
			//组建数组
			$info=array(
				getHtml('title','text','图片标题1','',''),
				getHtml('pid','select','广告位置',$select,''),
				getHtml('image','file','图片上传','',''),
//				getHtml('images','images','多图上传','',''),
			);
			$this->info=$info;
			$this->action_url=U('add');
			$this->display('Public/add');
		}
		
	}
	//广告列表 杨
	public function index(){
		if(I('post.')){
			$pid=I('post.pid');
			$where['pid']=$pid;
			$page = I('page')? : 1;
			$count = $this->model->where($where)->count();
			$rpage = Page($count, 10, $page);
			$rpage1 = $rpage['page_l'];
			$rpage2 = $rpage['page_r'];
			$ads=$this->model->where($where)->order('id desc')->limit($rpage1,$rpage2)->select();
			$this->assign('ads',$ads);
			$this->assign('page',$rpage['page']);
			$nav=M('adposition')->order('id asc')->select();
			$this->assign('pid',$pid);
			$this->assign('nav',$nav);
			$this->display();
			
		}else{
			$page = I('page')? : 1;
			$count = $this->model->count();
			$rpage = Page($count, 10, $page);
			$rpage1 = $rpage['page_l'];
			$rpage2 = $rpage['page_r'];
			$ads=getSelect($this->model,'select','id desc',$rpage1.','.$rpage2);
			$this->assign('ads',$ads);
			$this->assign('page',$rpage['page']);
			$nav=M('adposition')->order('id asc')->select();
			$this->assign('nav',$nav);
			$this->assign('module',$this->module);
			$this->display();
		}
	}
	
	//广告编辑
	public function update(){
		if(I('post.')){
			//dump($_FILES['image']);exit;
				if($_FILES['image']['error']==4){
					$data=I('post.');
					$id=I('post.id');
					$res=$this->model->where("id='$id'")->save($data);
					if($res){
						$this->redirect('Ads/index');
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
						$this->redirect('Ads/index');
					}
				}
				}
		}else{
			$id=I('get.id');
			$ads=$this->model->where("id='$id'")->find();
			$this->assign('ads',$ads);
			$nav=M('adposition')->order('id asc')->select();
			foreach($nav as $k=>$v){
				$nav[$k]['value']=$v['id'];
				$nav[$k]['option_name']=$v['name'].'         (尺寸：'.$v['size'].')';
			}
			$select['info']=$nav;
			$select['select_value']=$ads['pid'];
			//组建数组
			$info=array(
				getHtml('title','text','图片标题',$ads['title'],''),
				getHtml('pid','select','广告位置',$select,''),
				getHtml('image','file','图片上传',$ads['image'],''),
				getHtml('id','hidden','id',$id,''),
			);
			$this->info=$info;
			$this->action_url=U('update');
			$this->display('Public/add');
		}
		
	}
	
	//广告删除
	public function delete(){
		$id=I('post.id');
		$model=D('ads');
		$res=$model->del($id);
		if($res){
			$dat['status']=1;
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}
	
	//广告的关闭
	public function guanbi(){
		$id=I('post.id');
		$res=M('ads')->where("id='$id'")->setField('status',1);
		if($res){
			$dat['status']=1;
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}
	
	//广告的开启
	public function kaiqi(){
		$id=I('post.id');
		$res=M('ads')->where("id='$id'")->setField('status',0);
		if($res){
			$dat['status']=1;
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}
	
}