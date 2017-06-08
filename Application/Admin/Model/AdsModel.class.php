<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/4
 * Time: 14:16
 */

namespace Admin\Model;


use Think\Model;

class AdsModel extends Model
{
    function del($id){
        $res=M("ads")->delete($id);
        return $res; 
    }
}