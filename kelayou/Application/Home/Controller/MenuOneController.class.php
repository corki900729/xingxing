<?php

namespace Home\Controller;

use Think\Controller;

class MenuOneController extends BaseController
{

    public function index()
    {
        $data['list'] = M('brand')->order('sort asc')->select();

        $this->assign('data', $data);
        $this->display();
    }

    public function list()
    {
        $bid = I('id',int,0);
        $list = M('shop')->where('brand_id = '.$bid)->order('sort asc')->select();

        $this->assign('list', $list);
        $this->display();
    }

    public function info()
    {
        $id = I('id',int,0);
        $info = M('shop')->where('id = '.$id)->find();
        M('shop')->where('id = '.$id)->setInc('count');
        $this->assign('info', $info);
        $this->display();
    }

    public function zan()
    {
        if($id = I('id',int,0)){
            if(M('shop')->where('id = '.(int)$id)->setInc('zan')){
                $this->ajaxReturn(M('shop')->getFieldById($id,'zan')) ;
            };
            $this->ajaxReturn(-1) ;
        }
        $this->ajaxReturn(-1) ;
    }
}
