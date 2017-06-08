<?php
return array(
    //'配置项'=>'配置值'
    //'配置项'=>'配置值'
    'MODULE_ALLOW_LIST' => array('Home', 'Admin', 'User'),    // 允许访问的模块列表
    'DEFAULT_MODULE' => 'Home',

    'SESSION_AUTO_START' => true, //是否开启session
    //数据库
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'ls', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'root', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_CHARSET' => 'utf8', // 字符集
    'DB_PREFIX' => 'lx_', // 数据库表前缀
    'SHOW_PAGE_TRACE' => true,
    'TMPL_CACHE_ON' => true,
    'DB_FIELDS_CACHE' => true, //数据库字段缓存
    'URL_MODEL' => 2,
    'TMPL_PARSE_STRING' => array(
        '__ADMIN__' => __ROOT__ . '/Public/Admin',
        '__HOME__' => __ROOT__ . '/Public/Home',
        '__IMG__' => __ROOT__ . '/UpLoad/Img',
        '__CKPLAYER__' => __ROOT__ . '/Public/ckplayer',
    ),
    'URL_ROUTER_ON' => true, //开启路由
    'URL_ROUTE_RULES' => array(
        //定义路由规则
        'abcd/:id\d' => 'Ads/abc',
        'new/:name' => 'News/read',
        'new/:year\d/:month\d' => 'News/archive',
    ),
    //微信配置
    'WEIXIN_CONFIG' => array(
        'token' => 'weixin',
        'encodingaeskey' => 'MP8Af8WSgXwqCaJ5DdmHN3uURx3q077ovOKkAwD1rEB',
        'appId' => 'wx807a17738bda1928',
        'appSecret' => '6826ff4697fb6a51995831a188cb34c9',
        'giveAuth' => 2, //1:snsapi_userinfo,2:snsapi_base
    ),
);