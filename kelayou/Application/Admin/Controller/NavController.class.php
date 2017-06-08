<?php
/**
/* 
 * Author:王岩
 * 导航
 * time: 2016.05.20
 */
namespace Admin\Controller;

use Think\Controller;

class NavController extends PublicController {
	
	//导航列表
	public function nav_list(){
		$arr=$this->recursion();
        $data=$this->getNav($arr);
        $this->data=$data;
		$this->assign('module',$this->module);
        $this->display();
	}

	//添加导航
	public function nav_add(){
		if($_POST){
			if($_POST['nav_name']==""||$_POST['nav_sort']==""){
				$this->success('名称和排序不能为空',U('Nav/nav_add'));
			}else{
				$result=M('nav')->add($_POST);
				if($result){
					$this->success('添加成功',U('Nav/nav_list'));
				}else{
					$this->error('添加失败');
				}
			}
		}else{
			$nav=M('nav')->where("pid=0")->order('nav_id asc')->field("nav_id,nav_name")->select();
			$select_value[]=array("value"=>0,"option_name"=>'|--顶级分类');
			foreach($nav as $k=>$v){
				$select_value[]=array("value"=>$v['nav_id'],"option_name"=>'|--'.$v['nav_name']);
				$this->getChild($v['nav_id'],$select_value);
			}
			$select['info']=$select_value;
			$select['select_value']='';
			//dump($select);exit;
            $info=array(
            getHtml('nav_name','text','名称','',''),
            getHtml('nav_sort','text','排序','',''),
			getHtml('pid','select','分类栏目',$select,''),
        );
        $this->info=$info;
        $this->action_url=U('nav_add');
        $this->display('Public/add');
		}
	}
	
	//编辑导航
	function nav_edit(){
        $id=$_GET['id'];
        if($_POST){
			//dump($_POST);exit;
			if($_POST['nav_name']==""||$_POST['nav_sort']==""){
				$this->success('名称和排序不能为空',U('Nav/nav_list'));
			}else{
				$nid=I('post.nav_id');
				$result=M('nav')->where("nav_id = '$nid'")->save($_POST);
				if($result){
					$this->success('修改成功',U('Nav/nav_list'));
				}else{
					$this->error('修改失败');
				}
			}
        }else{
            $res=M('nav')->where("nav_id='$id'")->find();
          	$nav=M('nav')->where("pid=0")->order('nav_id asc')->field("nav_id,nav_name")->select();
			$select_value[]=array("value"=>0,"option_name"=>'|--顶级分类');
			foreach($nav as $k=>$v){
				$select_value[]=array("value"=>$v['nav_id'],"option_name"=>'|--'.$v['nav_name']);
				$this->getChild($v['nav_id'],$select_value);
			}
			$select['info']=$select_value;
			$select['select_value']=$res['pid'];
			
            $info=array(
            getHtml('nav_name','text','名称',$res['nav_name'],''),
            getHtml('nav_sort','text','排序',$res['nav_sort'],''),
			getHtml('pid','select','分类栏目',$select,''),
			getHtml('nav_id','hidden','id',$res['nav_id'],''),
        );
        $this->info=$info;
        $this->action_url=U('nav_edit');
        $this->display('Public/add');
        }
    }
	
	//删除导航
	public function nav_del(){
		$id=I('post.id');
		//1.开启事务
		$model=M();
		$model->startTrans();
		//2.执行sql语句
		try{
			M('nav')->where("nav_id = '$id'")->delete();
			$res=M('nav')->where("pid = '$id'")->find();
			if($res){
				M('nav')->where("pid = '$id'")->delete();
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
	public function delall(){
			$table=M('nav');
			$ids=I('post.ids');
			$key="nav_id";
			$res=del_all($table,$ids,1,$key);
			if($res){
				$data['status']=1;
			}else{
				$data['status']=0;
			}
			$this->ajaxReturn($data);
    }

	/**前台展示的一维数组
     * @param $data
     * @param $show
     * @return array 前台展示的一维数组
     */
	 
	 
    function getNav($data,&$show){
        foreach ($data as $k=>$v){
            $show[]=array('nav_name'=>str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']-1).'|--'.$v['nav_name'].'<br/>','nav_id'=>$v['nav_id'],'nav_sort'=>$v['nav_sort']);
            if(count($v['child'])>0){
                $this->getNav($v['child'],$show);
            }
        }
        return $show;
    }
	
	 function getChild($pid,&$array,&$i=1){
        $value=M("nav")->where("pid=$pid")->field("nav_id,nav_name")->select();
        foreach($value as $k=>$v){
            $array[]=array("value"=>$v['nav_id'],"option_name"=>str_repeat("&nbsp",4*$i).'|--'.$v['nav_name']);
            $this->getChild($v['nav_id'],$array,++$i);
            --$i;
        }
        return $array;
    }

    /**递归无限分类
     * @param int $id
     * @param int $level
     * @return mixed array 无限分类数组
     */
    function recursion($id=0,$level=1){
        $res=M('nav')->field('nav_id,nav_name,nav_sort')->where("pid='$id'")->order('nav_sort')->select();
            foreach ($res as $k=>$v){
                $res[$k]['level']=$level;
                $res[$k]['child']=$this->recursion($v['nav_id'],++$level);
                --$level;
            }
        return $res;
    }
	
	
	
}
 
 
 
 
 
 
 
 
 
 
 
 
 
