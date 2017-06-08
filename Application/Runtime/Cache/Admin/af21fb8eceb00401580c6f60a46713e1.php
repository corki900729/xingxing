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


     
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 系统日志 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
				<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
			</a>
		</span>
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span>
	</div>
	
<table class="table table-border table-bordered table-bg table-hover table-sort">
    <thead>
      <tr class="text-c">
		<th width="25"><input type="checkbox" name="" value=""></th>
        <th width="80">ID</th>
        <th width="17%">内容</th>
        <th width="17%">用户名</th>
        <th width="120">客户端IP</th>
        <th width="120">时间</th>
        <th width="70">操作</th>
      </tr>
    </thead>
    <tbody>
	<?php if(is_array($log)): $i = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
		<td class="one" id="<?php echo ($v["id"]); ?>"><input type="checkbox" value="" name=""></td>
        <td><?php echo ($v["id"]); ?></td>
        <td><?php if($v['last_login']): ?>登录成功!<?php elseif($v['out_login']): ?>退出成功!<?php endif; ?></td>
        <td><?php echo (get_admin_name($v["admin_id"])); ?></td>
        <td><?php echo ($v["ip"]); ?></td>
        <td><?php if($v['last_login']): echo (date("Y-m-d H:i:s",$v["last_login"])); elseif($v['out_login']): echo (date("Y-m-d H:i:s",$v["out_login"])); endif; ?></td>
        <td><a title="删除" href="javascript:;" onclick="log_del(this,'<?php echo ($v["id"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
	  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
	
</table>
	<br>
	<?php
 if($count>10){ ?>
	<div class="paginate" style="float:right;"><?php echo ($page); ?></div>
	<?php
 } ?>
</div>
<script>
	//批量删除
	function datadel(){
		var ids="";
		$(".one").each(function(){
			var p =$(this);
			if(p.children().is(":checked")){
				ids+=p.attr('id')+',';
			}
		});
		if(ids==""){
			layer.msg("您什么都没有选择呢",{icon:2});
			return false;
		}
		var r=confirm("确认删除吗");
		if(r==true){
		}else{
			return false;
		}
		$.post("<?php echo U('Users/del_all');?>",{'ids':ids},function(data){
			if(data.status==1){
				layer.msg("删除成功",{icon:1});
				window.location.reload();
			}else{
				layer.msg("删除失败",{icon:2});
			}
		});
	}

	function log_del(obj,id){
		layer.confirm('确认要删除吗？',function(index){
			$.post("<?php echo U('Users/log_del');?>",{'id':id},function(data){
				if(data.status==1){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}else if(data.status==2){
					layer.msg('您是普通会员没有删除权限!',{icon:2,time:1000});
				}
			});
			
		});
	}
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