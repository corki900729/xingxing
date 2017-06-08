<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends BaseController {

    public function index() {
        $data['index_ads'] = get_ads(8);

        $data['menus'] = M('system')->where('id >=4 and id<=6 ')->select();

        $this->assign('data', $data);
        $this->display();
    }

}
