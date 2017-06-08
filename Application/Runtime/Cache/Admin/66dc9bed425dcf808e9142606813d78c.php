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


     <!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,member-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="lib/html5.js"></script>
    <script type="text/javascript" src="lib/respond.min.js"></script>
    <script type="text/javascript" src="lib/PIE_IE678.js"></script>
    <![endif]-->
    <link href="/Public/Admin/css/H-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/Admin/css/H-ui.admin.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/Admin/lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>文章管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 文章管理 <a
        class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px"
        href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
    <!--	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="member_add('添加系部','add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加系部</a></span>  </div>-->
    <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a
            href="<?php echo U('addAbout');?>" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加文章</a></if></span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="100">标题</th>
                <th width="100">英文标题</th>
                <th width="150">简介</th>
                <th width="150">图片</th>
                <th width="150">排序</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
                <tr class="text-c" style="  background-color:#C8F1FF; ">
                    <td><?php echo ($data['oneList']["name"]); ?></td>
                    <td><?php echo ($data['oneList']["mname"]); ?></td>
                    <td><?php echo (mb_substr(strip_tags(htmlspecialchars_decode($data['oneList']["introduce"])),0,200,'utf-8')); ?></td>
                    <td><img width="130" height="80" src="<?php echo ($data['oneList']["image"]); ?>"/></td>
                    <td>×</td>
                    <td class="td-manage">
                        <a title="编辑" href="<?php echo U('editAbout',array('id'=>$data['oneList']['id']));?>" class="ml-5"
                           style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                    </td>
                </tr>
            <?php if(is_array($data['List'])): $i = 0; $__LIST__ = $data['List'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["mname"]); ?></td>
                    <td><?php echo (mb_substr(htmlspecialchars_decode($vo["introduce"]),0,200,'utf-8')); ?></td>
                    <td><img width="130" height="80" src="<?php echo ($vo["image"]); ?>"/></td>
                    <td><?php echo ($vo["sort"]); ?></td>
                    <td class="td-manage">
                        <a title="编辑" href="<?php echo U('editAbout',array('id'=>$vo['id']));?>" class="ml-5"
                           style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                        <a title="删除" href="<?php echo U('delAbout',array('id'=>$vo['id']));?>" class="ml-5"
                           style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <br>

        <div class="paginate" style="float:right;"><?php echo ($page); ?></div>

    </div>
</div>
<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.table-sort tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    });
</script>
</body>
</html> 
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