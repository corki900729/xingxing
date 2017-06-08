<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/js/page.css" />
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<!--[if IE 6]>
<![endif]-->
<title>后台管理系统</title>
<meta name="keywords" content="后台管理系统">
<meta name="description" content="后台管理系统">
</head>
<body>


     <header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"><a class="logo navbar-logo f-l mr-10 hidden-xs" href="<?php echo U('Index/index');?>">后台管理系统</a><a
                aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav class="nav navbar-nav">
                <?php if($module['admin']['add']): ?><ul class="cl">
                        <li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i
                                class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
                            <ul class="dropDown-menu menu radius box-shadow">
                                <!-- <li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
                                <li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
                                <li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li> -->
                                <li><a href="javascript:;"
                                       onclick="member_add('添加管理员', '<?php echo U('Index/member_add');?>', '', '510')"><i
                                        class="Hui-iconfont">&#xe60d;</i>管理员</a></li>
                            </ul>
                        </li>
                    </ul><?php endif; ?>
            </nav>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">

                    <li>
                        <?php if($admin_info['power'] == 1): ?>超级管理员
                            <?php else: ?>
                            普通管理员<?php endif; ?>
                    </li>
                    <li class="dropDown dropDown_hover"><a href="#" class="dropDown_A"><?php echo ($admin_info["name"]); ?> <i
                            class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <!-- <li><a href="#">个人信息</a></li>
                            <li><a href="#">切换账户</a></li> -->
                            <li><a href="<?php echo U('Users/out');?>">退出</a></li>
                        </ul>
                    </li>
                    <?php if(array_key_exists('message',$module)): ?><li id="Hui-msg"><a href="<?php echo U('Comment/feedback_list');?>" title="消息">
                            <?php if($comment_num): ?><span class="badge badge-danger"><?php echo ($comment_num); ?></span><?php endif; ?>
                            <i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a></li><?php endif; ?>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"><a href="javascript:;" class="dropDown_A"
                                                                               title="换肤"><i class="Hui-iconfont"
                                                                                             style="font-size:18px">
                        &#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<aside class="Hui-aside">
    <input runat="server" id="divScrollValue" type="hidden" value=""/>
    <div class="menu_dropdown bk_2">
        <?php if(array_key_exists('config',$module)): ?><dl id="menu-system">
                <dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
                </dt>
                <dd>
                    <ul>
                        <li><a _href="<?php echo U('Sys/index');?>" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
                        <li><a _href="<?php echo U('/Home/Wechat/creatMenus');?>" data-title="更新微信菜单" href="javascript:void(0)">更新微信菜单</a></li>
                        <li><a _href="<?php echo U('Users/admin_log');?>" data-title="系统日志" href="javascript:void(0)">系统日志</a></li>
                    </ul>
                </dd>
            </dl><?php endif; ?>
        <?php if(array_key_exists('admin',$module)): ?><dl id="menu-admin">
                <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
                </dt>
                <dd>
                    <ul>
                        <li><a _href="<?php echo U('Users/admin_list');?>" data-title="管理员列表" href="javascript:void(0)">管理员列表</a>
                        </li>
                    </ul>
                </dd>
            </dl>
            <if>
                <if condition="array_key_exists('ads',$module)">
                    <dl id="menu-product">
                        <dt><i class="Hui-iconfont">&#xe620;</i> 背景图管理<i class="Hui-iconfont menu_dropdown-arrow">
                            &#xe6d5;</i></dt>
                        <dd>
                            <ul>
                                <li><a _href="<?php echo U('Ads/position');?>" data-title="背景图位置"
                                       href="javascript:void(0)">背景图位置</a></li>
                                <!--<li><a _href="<?php echo U('Ads/add');?>" data-title="背景图添加" href="javascript:void(0)">背景图添加</a></li>-->
                                <li><a _href="<?php echo U('Ads/index');?>" data-title="背景图列表" href="javascript:void(0)">背景图列表</a>
                                </li>
                            </ul>
                        </dd>
                    </dl><?php endif; ?>


                <dl id="menu-admin">
                    <dt><i class="Hui-iconfont">&#xe613;</i> <?php echo ($data['menus1']['value']); ?>管理<i
                            class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                    <dd>
                        <ul>
                            <li><a _href="<?php echo U('Brand/index');?>" data-title="菜单列表" href="javascript:void(0)">菜单列表</a>
                            </li>
                            <li><a _href="<?php echo U('Brand/shop');?>" data-title="文章管理" href="javascript:void(0)">文章管理</a>
                            </li>
                        </ul>
                    </dd>
                </dl>

                <dl id="menu-admin">
                    <dt><i class="Hui-iconfont">&#xe613;</i> <?php echo ($data['menus2']['value']); ?>管理<i
                            class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                    <dd>
                        <ul>
                            <li><a _href="<?php echo U('Join/index');?>" data-title="菜单列表" href="javascript:void(0)">菜单列表</a></li>
                            <li><a _href="<?php echo U('Join/shop');?>" data-title="文章管理" href="javascript:void(0)">科学文艺文章</a></li>
                            <li><a _href="<?php echo U('Join/dati');?>" data-title="答题管理" href="javascript:void(0)">答题管理</a></li>
                            <li><a _href="<?php echo U('Join/shop2');?>" data-title="答题管理" href="javascript:void(0)">活动资讯管理</a></li>
                        </ul>
                    </dd>
                </dl>

                <dl id="menu-admin">
                    <dt><i class="Hui-iconfont">&#xe613;</i> <?php echo ($data['menus3']['value']); ?>管理<i
                            class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                    <dd>
                        <ul>
                            <li><a _href="<?php echo U('vip/index');?>" data-title="菜单列表" href="javascript:void(0)">菜单列表</a></li>
                        </ul>
                    </dd>
                </dl>

                <?php if(array_key_exists('message',$module)): ?><dl id="menu-comments">
                        <dt><i class="Hui-iconfont">&#xe622;</i> 报名管理<i class="Hui-iconfont menu_dropdown-arrow">
                            &#xe6d5;</i></dt>
                        <dd>
                            <ul>
                                <li><a _href="<?php echo U('Comment/feedback_list');?>" data-title="报名列表"
                                       href="javascript:void(0)">报名列表</a></li>
                                <li><a _href="<?php echo U('Comment/feedback_list2');?>" data-title="互动列表"
                                       href="javascript:void(0)">互动列表</a></li>
                            </ul>
                        </dd>
                    </dl><?php endif; ?>

                    <dl id="menu-tongji">
                        <dt><i class="Hui-iconfont">&#xe61a;</i> 数据库备份<i class="Hui-iconfont menu_dropdown-arrow">
                            &#xe6d5;</i></dt>
                        <dd>
                            <ul>
                                <li><a _href="<?php echo U('Dat/index');?>" data-title="数据库列表" href="javascript:void(0)">数据库列表</a>
                                </li>
                            </ul>
                        </dd>
                    </dl>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active"><span title="我的桌面" data-href="<?php echo U('Index/welcome');?>">我的桌面</span><em></em></li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S"
                                                  href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a
                id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">
            &#xe6d7;</i></a></div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe scrolling="yes" frameborder="0" src="<?php echo U('Index/welcome');?>"></iframe>
        </div>
    </div>
</section>

<script type="text/javascript">
    /*资讯-添加*/
    function article_add(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*图片-添加*/
    function picture_add(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*产品-添加*/
    function product_add(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*用户-添加*/
    function member_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }
    /*function member_add(){
     location.href="<?php echo U('Index/add');?>";
     }*/


</script>
<script type="text/javascript">
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s)
    })();
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
 
<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>

<!--/_footer /作为公共模版分离出去--> 

<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>