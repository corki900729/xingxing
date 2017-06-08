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


     ﻿<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
	<?php if($module['article']['del']): ?><a href="javascript:;" onclick="del_all()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a><?php endif; ?>
	<?php if($module['article']['add']): ?><a class="btn btn-primary radius" data-title="添加资讯" href="<?php echo U('Article/add_art');?>"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a><?php endif; ?>
	</span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="80">序号</th>
                <th width="150">标题</th>
                <th width="150">摘要</th>
                <th width="150">封面</th>
                <th width="120">更新时间</th>
                <th width="80">点击量</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($arclist)): $i = 0; $__LIST__ = $arclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
                <td class="hidden-xs" aid="<?php echo ($v["arc_id"]); ?>"><input type="checkbox" aid="<?php echo ($v["arc_id"]); ?>"></td>
                <td><?php echo ($i); ?></td>
                <td class="text-l"><?php echo ($v["title"]); ?></td>
                <td class="text-l"><?php echo ($v["description"]); ?></td>
                <td ><img src="<?php echo ($v["arc_pic"]); ?>"  height="80px" width="100" /></td>
                <td><?php echo ($v["c_time"]); ?></td>
                <td><?php echo ($v["click"]); ?></td>
                <td class="f-14 td-manage">
				<?php if($module['article']['edit']): ?><a style="text-decoration:none" class="ml-5"  href="<?php echo U('Article/edit_art',array('id'=>$v['arc_id']));?>" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a><?php endif; ?>
				<?php if($module['article']['del']): ?><a style="text-decoration:none" class="ml-5 del"  href="javascript:;" title="删除" aid="<?php echo ($v["arc_id"]); ?>"><i class="Hui-iconfont">&#xe6e2;</i></a><?php endif; ?>
				</td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <br>
    <div class="paginate" style="float:right;"><?php echo ($page); ?></div>
</div>
<script type="text/javascript">

</script>

<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>

<script type="text/javascript">
    /* 批量删除*/
    function del_all() {
        var ids = "";
        $(".hidden-xs").each(function () {
            var p = $(this);
            if (p.children().is(":checked")) {
                ids += p.attr('aid') + ',';
            }
        });
		if (ids == "") {
            layer.msg("您什么都没有选择呢",{icon:2});
            return false
        };
		layer.confirm("你确定要全部删除吗？", {
            btn: ['确定','取消'] //按钮
        }, function(){
		$.post('<?php echo U("Article/art_del");?>',{'ids':ids},function(data){
			if(data.status==1){
			layer.msg('删除成功！',{icon:1});
                $(".hidden-xs").children().attr("checked",false);
			setTimeout(function () {
							location.reload();
						}, 2000);
			}else{
			layer.msg('删除失败！',{icon:2});
			}
			
			})
		})
       
    }
    $(".del").click(function() {
		var id = $(this).attr("aid");
		//alert(id);
       layer.confirm("你确定要删除吗？", {
            btn: ['确定','取消'] //按钮
        }, function(){
		$.post('<?php echo U("Article/adelete");?>',{'id':id},function(data){
			if(data.status==1){
			layer.msg('删除成功！',{icon:1});

			setTimeout(function () {
							location.reload();
						}, 2000);
			}else{
			layer.msg('删除失败！',{icon:2});
			}
			
			})
		})
    });
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