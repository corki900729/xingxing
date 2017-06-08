<?php
/**
/* 
 * Author:杨浩青
 * SEO管理
 * time: 2016.05.20
 */

namespace Admin\Controller;
use Admin\Builder\AdminListBuilder;
use Think\Controller;
class SeoController extends PublicController
{
    public function index($page = 1, $r = 20)
    {
        //读取规则列表
        $map = array('status' => array('EGT', 0));
        $model = M('SeoRule');
        $ruleList = $model->where($map)->page($page, $r)->order('sort asc')->select();
        $totalCount = $model->where($map)->count();

        $this->assign("ruleList",$ruleList);
		
        $this->display();
    }

    public function ruleTrash($page = 1, $r = 20)
    {
        //读取规则列表
        $map = array('status' => -1);
        $model = M('SeoRule');
        $ruleList = $model->where($map)->page($page, $r)->order('sort asc')->select();
        $totalCount = $model->where($map)->count();

        //显示页面
        $builder = new AdminListBuilder();
        $builder->title('SEO规则回收站')
            ->setStatusUrl(U('setRuleStatus'))->buttonRestore()
            ->keyId()->keyTitle()->keyText('app', '模块')->keyText('controller', '控制器')->keyText('action', '方法')
            ->keyText('seo_title', 'SEO标题')->keyText('seo_keywords', 'SEO关键字')->keyText('seo_description', 'SEO描述')
            ->data($ruleList)
            ->pagination($totalCount, $r)
            ->display();
    }

    public function setRuleStatus($ids, $status)
    {

        $builder = new AdminListBuilder();
        $builder->doSetStatus('SeoRule', $ids, $status);
    }

    public function sortRule()
    {
        //读取规则列表
        $list = M('SeoRule')->where(array('status' => array('EGT', 0)))->order('sort asc')->select();

        //显示页面
        $builder = new AdminSortBuilder();
        $builder->title('排序SEO规则')
            ->data($list)
            ->buttonSubmit(U('doSortRule'))
            ->buttonBack()
            ->display();
    }

    public function doSortRule($ids)
    {
        $builder = new AdminSortBuilder();
        $builder->doSort('SeoRule', $ids);
    }

    public function editRule($id = null)
    {
        //判断是否为编辑模式
        $isEdit = $id ? true : false;

        //读取规则内容
        if ($isEdit) {
            $rule = M('SeoRule')->where(array('id' => $id))->find();
        } else {
            $rule = array('status' => 1);
        }

			$this->assign("rule",$rule);
            $this->display();
    }

    public function doEditRule($id = null, $title, $app, $controller, $action2, $seo_title, $seo_keywords, $seo_description, $status)
    {
		
	
        //判断是否为编辑模式
        $isEdit = $id ? true : false;
		

        //写入数据库
        $data = array('title' => $title, 'app' => $app, 'controller' => $controller, 'action' => $action2, 'seo_title' => $seo_title, 'seo_keywords' => $seo_keywords, 'seo_description' => $seo_description, 'status' => $status);
        $model = M('SeoRule');
        if ($isEdit) {
            $result = $model->where(array('id' => $id))->save($data);
        } else {
            $result = $model->add($data);
        }

        clean_all_cache();
        //如果失败的话，显示失败消息
        if ($result) {
           $msg['status']=1;
		   $msg['info']="操作成功";
        }else{
			$msg['status']=0;
			$msg['info']="操作失败";
		}
       $this->ajaxReturn($msg);

    }
}