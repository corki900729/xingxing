<?php

namespace Home\Controller;

use Think\Controller;

class MenuTwoController extends BaseController
{

    public function index()
    {

        $data['list'] = M('join')->order('sort asc')->select();

        $this->assign('data', $data);
        $this->display();
    }

    public function list()
    {
        $bid = I('id', 0,int);
        $list = M('join_shop')->where('brand_id = ' . $bid)->order('sort asc')->select();

        $this->assign('list', $list);
        $this->display();
    }

    public function info()
    {
        $id = I('id', 0,int);
        $info = M('join_shop')->where('id = ' . $id)->find();
        M('join_shop')->where('id = ' . $id)->setInc('count');
        $this->assign('info', $info);
        $this->display();
    }

    public function zan()
    {
        if ($id = I('id', 0,int)) {
            if (M('join_shop')->where('id = ' . (int)$id)->setInc('zan')) {
                $this->ajaxReturn(M('join_shop')->getFieldById($id, 'zan'));
            };
            $this->ajaxReturn(-1);
        }
        $this->ajaxReturn(-1);
    }

    function dati_list()
    {
        $count = M('dati')->where('flg = 1')->count();
        $Page = new \Think\Page($count, 15, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $list = M('dati')->where('flg = 1')->order("time desc")->limit($Page->firstRow . ',' . $Page->listRows)->select();

        foreach ($list as &$v) {
            $daan = M('daan')
                ->field('lx_daan.*, lx_users.headurl,lx_users.nickname')
                ->join('lx_users ON lx_daan.user_id = lx_users.id')
                ->where('dati_id = ' . $v['id'] . ' and flg = 1')
                ->order('time desc')
                ->select();
            foreach ($daan as &$vv) {
                $vv['dui_count'] = M('daan')->where('user_id = ' . $vv['user_id'] . ' and flg = 1')->count();
            }

            $sort = array(
                'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
                'field' => 'dui_count',       //排序字段
            );
            $arrSort = array();
            foreach ($daan AS $uniqid => $row) {
                foreach ($row AS $key => $value) {
                    $arrSort[$key][$uniqid] = $value;
                }
            }
            if ($sort['direction']) {
                array_multisort($arrSort[$sort['field']], constant($sort['direction']), $daan);
            }

            $v['daan'] = $daan;
        }

        $this->assign('list', $list);
        $this->assign('page', $Page->show());
        $this->display();
    }

    function dati_info()
    {
        $id = I('id', 0,int);
        $where['lx_daan.dati_id'] = $id;
        $count = M('daan')->where($where)->count();
        $Page = new \Think\Page($count, 15, $parameter);
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false; //最后一页不显示为总页数
        $list = M('daan')
            ->field('lx_daan.*, lx_users.headurl,lx_users.nickname')
            ->join('lx_users ON lx_daan.user_id = lx_users.id')
            ->where($where)
            ->order("lx_daan.time desc")
            ->limit($Page->firstRow . ',' . $Page->listRows)
            ->select();

        $dati = M('dati')
            ->join('lx_users ON lx_dati.user_id = lx_users.id', 'left')
            ->where('lx_dati.id = ' . $id)
            ->field('lx_dati.*,lx_users.headurl,lx_users.nickname')
            ->find();

        M('dati')->where('id = ' . $id)->setInc('count');

        $this->assign('list', $list);
        $this->assign('dati', $dati);
        $this->assign('page', $Page->show());
        $this->assign('count', $count);
        $this->display();
    }

    function huida()
    {
        $id = I('id', 0,int);
        $info = M('dati')->find($id);

        $this->assign('info', $info);
        $this->display();
    }

    function huida_tijiao()
    {
        if ($data = I('post.')) {
            $data['user_id'] = session('id');
            $data['time'] = time();
            if (M('daan')->where(['user_id' => $data['user_id'], 'dati_id' => $data['dati_id']])->find()) {
                $this->ajaxReturn(-2);
            }
            if (M('daan')->add($data)) {
                M('dati')->where('id = ' . $data['dati_id'])->setInc('sum');
                $this->ajaxReturn($data['dati_id']);
            } else {
                $this->ajaxReturn(-1);
            }
        }
    }

    function canjia()
    {
        $id = I('id',0,int);
        if ($data = I('post.')) {
            $data['user_id'] = session('id');
            $data['c_time'] = time();
            if(M('comment')->where(['pid'=>$data['pid'],'user_id' =>$data['user_id'] ])->find()){
                $this->ajaxReturn(-2);
            }
            if(M('comment')->add($data)){
                M('join_shop')->where('id = '.$data['pid'])->setInc('renshu');
                $this->ajaxReturn(1);
            }
            $this->ajaxReturn(-1);
        }

        $this->id = $id;
        $this->display();
    }
}
