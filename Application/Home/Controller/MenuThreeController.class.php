<?php

namespace Home\Controller;

use Think\Controller;

class MenuThreeController extends BaseController
{

    public function index()
    {

        $data['list'] = M('vip')->order('sort asc')->select();

        $this->assign('data', $data);
        $this->display();
    }

    public function paihang()
    {
        $count = M('shop')->count();
        $Page = new \Think\Page($count, 10, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $list = M('join_shop')->order("sort asc")->limit($Page->firstRow . ',' . $Page->listRows)->order('count desc')->select();

        $this->assign('list', $list);
        $this->display('MenuOne/list');
    }

    public function reren()
    {
        $list = M('users')
            ->where('count <> 0')
            ->order("count desc")
            ->limit(0,10)
            ->select();

        $this->assign('list', $list);
        $this->display();
    }

    public function hudong(){
        if(I('post.')){
            $data = I('post.');
            $data['user_id'] = session('id');
            $data['c_time'] = time();
            $data['flg'] = 1;
            if(empty($data['content'])){
                $this->ajaxReturn(-2);
            }else{
                $data['p_content'] = $data['content'];
                unset($data['content']);
            }
            if(M('comment')->add($data)){
                $this->ajaxReturn(1);
            }
            $this->ajaxReturn(-1);

        }
        $this->display();
    }

}
