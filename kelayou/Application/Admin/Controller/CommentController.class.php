<?php
namespace Admin\Controller;

use Think\Controller;

class CommentController extends PublicController
{


    //展示留言内容
    public function feedback_list()
    {
        $com = M('comment');
        $page = I('page') ?: 1;
        $count = $com->count();
        $page_size = 10;
        $page_count = ceil($count / $page_size);
        $rpage = Page($count, $page_size, $page, $page_count);
        $rpage1 = $rpage['page_l'];
        $rpage2 = $rpage['page_r'];
        $data = $com
            ->join('lx_users ON lx_comment.user_id = lx_users.id','left')
            ->order("lx_comment.id desc")
            ->limit("$rpage1,$rpage2")
            ->field('lx_comment.*, lx_users.headurl,lx_users.nickname')
            ->where('lx_comment.flg = 2')
            ->select();

        foreach ($data as &$v) {
            $v['name'] = M('join_shop')->getFieldById($v['pid'],'name');
        }
        $this->assign('comment', $data);
        $this->assign('count', $count);
        $this->assign('page', $rpage['page']);

        $this->assign('module', $this->module);

        $this->display();
    }

    //展示留言内容
    public function feedback_list2()
    {
        $com = M('comment');
        $page = I('page') ?: 1;
        $count = $com->count();
        $page_size = 10;
        $page_count = ceil($count / $page_size);
        $rpage = Page($count, $page_size, $page, $page_count);
        $rpage1 = $rpage['page_l'];
        $rpage2 = $rpage['page_r'];
        $data = $com
            ->join('lx_users ON lx_comment.user_id = lx_users.id','left')
            ->order("lx_comment.id desc")
            ->limit("$rpage1,$rpage2")
            ->field('lx_comment.*, lx_users.headurl,lx_users.nickname')
            ->where('lx_comment.flg = 1')
            ->select();

        $this->assign('comment', $data);
        $this->assign('count', $count);
        $this->assign('page', $rpage['page']);

        $this->assign('module', $this->module);

        $this->display();
    }

//单删除
    public function delete()
    {

        $id = I('get.id');
        $result = M('comment')->where("id='" . $id . "'")->delete();
        if ($result) {
            $this->redirect("Comment/feedback_list");
        } else {
            $this->error("删除失败");
        }


    }

//全删除
    public function deleteall()
    {
        $ids = I('post.ids');
        $aOb = M("comment");
        $ids = explode(',', $ids, -1);
        foreach ($ids as $m) {
            $re = $aOb->where("id='$m'")->delete();
        }
        if ($re) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        $this->ajaxReturn($data);

    }


//编辑
    public function shenhe()
    {
        $id = I("get.id");

        $con = M('comment')->where("id='$id'")->find();
        if ($con['status'] != 1) {
            $result = M('comment')->where("id='$id'")->save(array("status" => 1));
        }

        $this->assign("con", $con);

        $this->display();
    }

////更新状态
//public function edit(){
//	$id=I("post.id");
//	$data=$_POST;
//	// dump($data);
//	unset($data['id']);
//	$result=M('comment')->where("id='$id'")->save($data);
//	if($result >= 0){
//		$msg['status']=1;
//		$msg['info']="修改成功";
//	}else{
//			$msg['status']=0;
//			$msg['info']="修改失败";
//	}
//	$this->ajaxReturn($msg);
//}


}

		






