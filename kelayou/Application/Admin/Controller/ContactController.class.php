<?php

namespace Admin\Controller;

use Think\Controller;

class ContactController extends PublicController {

    public $db;
    public $dbname = 'contact';

    function __construct() {
        parent::__construct();
        //检查admin权限
        $this->db = M($this->dbname);
    }

    function editContact() {
        if (!empty($_POST)) {
            $post = $_POST;
            $tmp = $this->db->where('id= 1')->save($post);
            if ($tmp >= 0) {
                $this->success('编辑成功！', U('editContact'), 1);
            } else {
                $this->error('编辑失败', U('editContact'), 1);
            }
        } else {
            $data = $this->db->where('id= 1')->find();
            //组建数组
            $info = array(
                getHtml('tel', 'text', '电话', $data['tel'], ''),
                getHtml('fax', 'text', '传真', $data['fax'], ''),
                getHtml('address', 'text', '地址', $data['address'], ''),
                getHtml('post', 'text', '邮编', $data['post'], ''),
                getHtml('x', 'text', '地图横坐标', $data['x'], ''),
                getHtml('y', 'text', '地图纵坐标', $data['y'], ''),
                getHtml('content', 'editor', '简介', $data['content'], ''),
            );
            $this->info = $info;
            $this->action_url = U('editContact');
            $this->display('Public/add');
        }
    }
}
