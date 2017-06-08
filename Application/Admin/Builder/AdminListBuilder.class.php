<?php
/**
 * Created by PhpStorm.
 * User: caipeichao
 * Date: 14-3-12
 * Time: AM10:08
 */

namespace Admin\Builder;

use Think\Controller;
class AdminListBuilder extends Controller
{
 
    public function doSetStatus($model, $ids, $status)
    {
        $ids = is_array($ids) ? $ids : explode(',', $ids);
       $result=M($model)->where(array('id' => array('in', $ids)))->save(array('status' => $status));
       if($result){
		   $msg['info']="设置成功";
		   $msg['status']=1;
	   }else{
		   $msg['info']="设置失败";
		   $msg['status']=0;
	   }
	   $this->ajaxReturn($msg);
    } 
	
	
	public function doSetStatus1($model, $ids, $status)
    {
        $ids = is_array($ids) ? $ids : explode(',', $ids);
       $result=M($model)->where(array('id' => array('in', $ids)))->save(array('pin_status' => $status));
       if($result){
		   $msg['info']="设置成功";
		   $msg['status']=1;
	   }else{
		   $msg['info']="设置失败";
		   $msg['status']=0;
	   }
	   $this->ajaxReturn($msg);
    } 

}