<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * UCenter客户端配置文件
 * 注意：该配置文件请使用常量方式定义
 */

// define('UC_APP_ID', 1); //应用ID
// define('UC_API_TYPE', 'Model'); //可选值 Model / Service
// define('UC_AUTH_KEY', '6U0bt!/aF7?WxdZ%nO1SpJ(^.2v9lVKD`*XwrI&h'); //加密KEY
// define('UC_DB_DSN', 'mysqli://root:root@127.0.0.1:3306/lx_hzl'); // 数据库连接，使用Model方式调用API必须配置此项
// define('UC_TABLE_PREFIX', 'lx_'); // 数据表前缀，使用Model方式调用API必须配置此项
return array(
   'AUTH_CONFIG'=> array(
    'AUTH_ON'=> true, //认证开关
    'AUTH_TYPE'=> 2, // 认证方式，1为时时认证；2为登录认证。
   ),
);
