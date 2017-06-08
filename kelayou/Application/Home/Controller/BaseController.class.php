<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function __construct() {
        parent::__construct();
//        session('id',3);
        if(!session('id')){
            $wechat = new WechatController();
            $url = str_replace('/', '_', chop($_SERVER['REQUEST_URI'], '.html'));
            $wechat->auth($url);
        }

        $foot = get_sys(3);

        $this->assign('foot', $foot);
    }
}  