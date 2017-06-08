<?php
/* 
 * Author:杨浩青
 * 广告管理
 * time: 2016.06.18
 */
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends PublicController {
	//商品添加
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
					$data=$_POST;
					$data['ptime']=time();
					$data['image']="/Uploads/".$info['image']['savepath'].$info['image']['savename'];
					$result=M('goods')->add($data);
					if($result){
						$this->redirect('Goods/gattr',array('id' =>$result));
					}
					
				}
			
		}else{
			$gtype=M('gtype')->where("pid=0")->order('id asc')->field("id,gtype")->select();
			foreach($gtype as $k=>$v){
				$select_value[]=array("value"=>$v['id'],"option_name"=>'|--'.$v['gtype']);
				$this->getChild($v['id'],$select_value);
			}
			$select['info']=$select_value;
			$select['select_value']='';
			$info=array(
            getHtml('title','text','商品名称','',''),
			getHtml('gtype','select','商品分类',$select,''),
            getHtml('describe','textarea','商品描述','',''),
			getHtml('image','file','商品图片','',''),
			getHtml('sort','text','商品排序','',''),
			getHtml('keywords','text','关键字','',''),
			getHtml('description','textarea','关键词描述','',''),
			getHtml('content','editor','商品详情','',''),
			);
			$this->info=$info;
			$this->action_url=U('add');
			$this->display('Public/add');
		}
		
	}
	
	//商品列表
	public function glist(){
		if(I('post.title')){
		$title=I('post.title');	
		}
		if(I('get.title')){
		$title=I('post.title');		
		}
		if($title){
			$where['title']=array('like', '%title%');
		}
		
		if(I('post.gtype')){
		$gtype=I('post.gtype');	
		}
		if(I('get.gtype')){
		$gtype=I('post.gtype');	
		}
		if($gtype){
			$where['gtype']=$gtype;
		}
		$com=M('goods');
		$page = I('page')? : 1;
        $count = $com->where($where)->count();
        $page_size=10;
        $page_count = ceil($count/ $page_size);
        $rpage = Page2($count, $page_size, $page,$page_count,$gtype,$title);
        $rpage1 = $rpage['page_l'];
        $rpage2 = $rpage['page_r'];
        $data = $com->where($where)->order("id desc")->limit("$rpage1,$rpage2")->select();
		foreach($data as $k=>$v){
			$gtid=$v['gtype'];
			$type=$this->gettype($gtid);
			$tcount=count($type)-1;
			for($i=$tcount;$i>=0;$i--){
				$types.=$type[$i].'->';
			}
			$data[$k]['types']=substr($types,0,-2);
			$types='';
		}
        $this->assign('goods', $data);
		//dump($data);
		$arr=$this->recursion();
        $gtype=$this->getNav($arr);
        $this->gtype=$gtype;
        $this->assign('page',$rpage['page']);
		$this->assign('module',$this->module);
		$this->display();
	}
	
	//循环查询分类
	public function gettype($pid,&$arr){
		$gtype=M('gtype')->where("id='$pid'")->find();
		$arr[]=$gtype['gtype'];
		$pids=$gtype['pid'];
		if($pids!=0){
			$this->gettype($pids,$arr);
		}
			return $arr;
		
	}
	
	//商品编辑
	public function edit(){
		if(I('post.')){
			 if ($_FILES['image']['error'] == 4) {
                $data = $_POST;
                $id = I('post.id');
                $re = M("goods")->where("id='$id'")->save($data);
                if ($re) {
                    $this->redirect('Goods/glist');
                } else {
                    $this->error("修改失败");
                }
            } else {
                if ($_FILES['image']['error'] == 0) ;
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 31457280;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Uploads/'; // 设置附件上传根目录
                $upload->savePath = 'admin/' . CONTROLLER_NAME . '/'; // 设置附件上传（子）目录
                $upload->saveName = array('uniqid', time() . '_' . mt_rand());
                $info = $upload->upload();
                if (!$info) {
                    $this->error($upload->getError());
                } else {
                    $data = $_POST;
                    $id = I('post.id');
                    $data['image'] = "/Uploads/" . $info['image']['savepath'] . $info['image']['savename'];
                    $re = M("goods")->where("id='$id'")->save($data);
                    if ($re) {
                        $this->redirect('Goods/glist');
                    } else {
                        $this->error("修改失败");
                    }
                }
            }
			
		}else{
			$id=I('get.id');
			$goods=M('goods')->where("id='$id'")->find();
			$gtype=M('gtype')->where("pid=0")->order('id asc')->field("id,gtype")->select();
			foreach($gtype as $k=>$v){
				$select_value[]=array("value"=>$v['id'],"option_name"=>'|--'.$v['gtype']);
				$this->getChild($v['id'],$select_value);
			}
			$select['info']=$select_value;
			$select['select_value']=$goods['gtype'];
			$info=array(
            getHtml('title','text','商品名称',$goods['title'],''),
			getHtml('gtype','select','商品分类',$select,''),
            getHtml('describe','textarea','商品描述',$goods['describe'],''),
			getHtml('image','file','商品图片',$goods['image'],''),
			getHtml('sort','text','商品排序',$goods['sort'],''),
			getHtml('keywords','text','关键字',$goods['keywords'],''),
			getHtml('description','textarea','关键词描述',$goods['description'],''),
			getHtml('content','editor','商品详情',$goods['content'],''),
			getHtml('id','hidden','id',$goods['id'],''),
			);
			$this->info=$info;
			$this->action_url=U('edit');
			$this->display('Public/add');
		}
	}
	
	//属性添加和编辑
	public function attr(){
		$model=M("attr_tag");
        if($post=I("post.")){
            $type=$post['type'];

            switch ($type){
                case "add":
					$post['ptime']=time();
                    $res=$model->add($post);
                    if($res){
						$dat['status']=1;
                        	
                    }else{
						$dat['status']=0;
                     
                    }
					$this->ajaxReturn($dat);
                break;
                case "edit":
					$id=I('post.id');
                    $res=$model->where("id='$id'")->save($post);
                    if($res){
						$dat['status']=1;
                    }else{
                        $dat['status']=0;
                    }
					$this->ajaxReturn($dat);
                break;
                default:
                    break;
            }
        }else{
            $data=$model->order("id asc")->select();
			$this->assign('data',$data);
            $this->display();
        }
	}
	
	//删除属性标签
	public function delattr(){
		$id=I('post.id');
		$res=M('attr_tag')->where("id='$id'")->delete();
		if($res){
			$dat['status']=1;                	
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}
	
	//添加商品属性值
	public function gattr(){
		if(I('get.id')){
			$gid=I('get.id');
		}
		$this->assign('gid',$gid);
		if(I('post.')){
			$data=I('post.');
			$gid=I('post.gid');
			$data['gid']=$gid;
			$data['ptime']=time();
			$res=M('goods_attr')->add($data);
			if($res){
				$this->redirect('Goods/gattr',array('id'=>$gid));
			}else{
				$this->error('添加失败');
			}
			
		}else{
			$attr=M('attr_tag')->order('id asc')->select();
			$this->assign('attr',$attr);
			$gattr=M('goods_attr')->where("gid='$gid'")->order('sort asc')->select();
			$this->assign('gattr',$gattr);
			$this->display();
		}
		
	}
	
	//商品属性编辑
	public function attr_edit(){
		$id=I('post.id');
		$data=I('post.');
		$res=M('goods_attr')->where("id='$id'")->save($data);
		if($res){
			$dat['status']=1;                	
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}
	
	//商品属性编辑
	public function attr_del(){
		$id=I('post.id');
		$res=M('goods_attr')->where("id='$id'")->delete();
		if($res){
			$dat['status']=1;                	
		}else{
			$dat['status']=0;
		}
		$this->ajaxReturn($dat);
	}
	
	//商品分类列表
	public function gtype(){
		$arr=$this->recursion();
        $data=$this->getNav($arr);
        $this->data=$data;
		$this->assign('module',$this->module);
        $this->display();
	}
	
	//商品分类删除
	//删除
	public function gtype_del(){
		$id=I('post.id');
		//1.开启事务
		$model=M();
		$model->startTrans();
		//2.执行sql语句
		try{
			M('gtype')->where("id = '$id'")->delete();
			$res=M('gtype')->where("pid = '$id'")->find();
			if($res){
				M('gtype')->where("pid = '$id'")->delete();
			}
			$model->commit();
			$data['status']=1;
		}catch (Exception $e){
			$model->rollback();
			$data['status']=0;
		}
		$this->ajaxReturn($data);
	}
	
	//批量删除
	public function gtype_delall(){
			$table=M('gtype');
			$ids=I('post.ids');
			$key="id";
			$res=del_all($table,$ids,1,$key);
			if($res){
				$data['status']=1;
			}else{
				$data['status']=0;
			}
			$this->ajaxReturn($data);
    }
	
	
	//添加导航
	public function gtype_add(){
		if($_POST){
			if($_POST['gtype']==""||$_POST['sort']==""){
				$this->success('名称和排序不能为空',U('Goods/gtype_add'));
			}else{
				$result=M('gtype')->add($_POST);
				if($result){
					$this->success('添加成功',U('Goods/gtype'));
				}else{
					$this->error('添加失败');
				}
			}
		}else{
			$gtype=M('gtype')->where("pid=0")->order('id asc')->field("id,gtype")->select();
			$select_value[]=array("value"=>0,"option_name"=>'|--顶级分类');
			foreach($gtype as $k=>$v){
				$select_value[]=array("value"=>$v['id'],"option_name"=>'|--'.$v['gtype']);
				$this->getChild($v['id'],$select_value);
			}
			$select['info']=$select_value;
			$select['select_value']='';
			//dump($select);exit;
            $info=array(
            getHtml('gtype','text','分类名称','',''),
            getHtml('sort','text','排序','',''),
			getHtml('pid','select','分类栏目',$select,''),
        );
        $this->info=$info;
        $this->action_url=U('gtype_add');
        $this->display('Public/add');
		}
	}
	
	//编辑导航
	function gtype_edit(){
        $id=$_GET['id'];
        if($_POST){
			//dump($_POST);exit;
			if($_POST['gtype']==""||$_POST['sort']==""){
				$this->success('名称和排序不能为空',U('Goods/gtype'));
			}else{
				$gid=I('post.id');
				$result=M('gtype')->where("id = '$gid'")->save($_POST);
				if($result){
					$this->success('修改成功',U('Goods/gtype'));
				}else{
					$this->error('修改失败');
				}
			}
        }else{
            $res=M('gtype')->where("id='$id'")->find();
          	$gtype=M('gtype')->where("pid=0")->order('id asc')->field("id,gtype")->select();
			$select_value[]=array("value"=>0,"option_name"=>'|--顶级分类');
			foreach($gtype as $k=>$v){
				$select_value[]=array("value"=>$v['id'],"option_name"=>'|--'.$v['gtype']);
				$this->getChild($v['id'],$select_value);
			}
			$select['info']=$select_value;
			$select['select_value']=$res['pid'];
			
            $info=array(
            getHtml('gtype','text','分类名称',$res['gtype'],''),
            getHtml('sort','text','排序',$res['sort'],''),
			getHtml('pid','select','分类栏目',$select,''),
			getHtml('id','hidden','id',$res['id'],''),
        );
        $this->info=$info;
        $this->action_url=U('Goods/gtype_edit');
        $this->display('Public/add');
        }
    }
	
	
	function getChild($pid,&$array,&$i=1){
        $value=M("gtype")->where("pid=$pid")->field("id,gtype")->select();
        foreach($value as $k=>$v){
            $array[]=array("value"=>$v['id'],"option_name"=>str_repeat("&nbsp",4*$i).'|--'.$v['gtype']);
            $this->getChild($v['id'],$array,++$i);
            --$i;
        }
        return $array;
    }
	
	
	
	 function getNav($data,&$show){
        foreach ($data as $k=>$v){
            $show[]=array('gtype'=>str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']-1).'|--'.$v['gtype'].'<br/>','id'=>$v['id'],'sort'=>$v['sort']);
            if(count($v['child'])>0){
                $this->getNav($v['child'],$show);
            }
        }
        return $show;
    }
	
	/**递归无限分类
     * @param int $id
     * @param int $level
     * @return mixed array 无限分类数组
     */
    function recursion($id=0,$level=1){
        $res=M('gtype')->field('id,gtype,sort')->where("pid='$id'")->order('sort')->select();
            foreach ($res as $k=>$v){
                $res[$k]['level']=$level;
                $res[$k]['child']=$this->recursion($v['id'],++$level);
                --$level;
            }
        return $res;
    }
	
	
	
}