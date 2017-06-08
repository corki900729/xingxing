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


     <style>
	.td1{
		width:10%;
	}
	.td2{
		width:40%;
	}
	.int{
		display:none;
	}

</style>
<div class="page-container" <!-- style="height:700px;" -->
	<p class="f-20 text-success">欢迎使用XXX后台模版！</p>
	<p>登录次数：<?php echo ($log_num); ?> </p>
	<p>上次登录IP：<?php echo ($admin_record["ip"]); ?>  上次登录时间：<?php echo (date("Y-m-d H:i:s",$admin_record["last_login"])); ?></p>
	<?php if($module['init']): ?><form action="<?php echo U('welcome');?>" method="post" >
		<table class="table table-border table-bordered table-bg mt-20" style="width:30%;">
			<thead>
				<tr><td>用户名</td><td><?php echo ($aname); ?></td></tr>
				<tr><td>原密码</td><td><input type="password" name="oldpwd"></td></tr>
				<tr><td>新密码</td><td><input type="password" name="password"></td></tr>
				<tr><td>确认密码</td><td><input type="password" name="repwd"></td></tr>
				<tr><td>修改密码</td><td><input type="submit" value="修改"></td></tr>
			</thead>

		</table>
		</form>
		<?php else: ?>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th scope="col">模块选择</th>
				<th colspan="3" scope="col">全选：<input type="checkbox" class="checkAll" name="all"></th>
			</tr>
		</thead>
		<tbody>
		<form action="<?php echo U('Index/init');?>" id="from" method="post" >
			<tr>
				<td class="td1">系统设置：<input type="checkbox" name="module[]" value="config"></td>
				<td class="td2">
					增加：<input type="checkbox"
					name="config[]" value="1">
					删除：<input type="checkbox" name="config[]" value="2">
					修改：<input type="checkbox" name="config[]" value="3">
					<input type="checkbox" class="int" name="config[]" value="4" checked="ture">
				</td>
				<td class="td1">导航管理：<input type="checkbox" name="module[]" value="nav"></td>
				<td class="td2">
					增加：<input type="checkbox" name="nav[]" value="1">
					删除：<input type="checkbox" name="nav[]" value="2">
					修改：<input type="checkbox" name="nav[]" value="3">
					<input type="checkbox" class="int" name="nav[]" value="4" checked="ture">
				</td>
			</tr>
			<tr>
				<td class="td1">管理员管理：<input type="checkbox" name="module[]" value="admin"></td>
				<td class="td2">
					增加：<input type="checkbox" name="admin[]" value="1">
					删除：<input type="checkbox" name="admin[]" value="2">
					修改：<input type="checkbox" name="admin[]" value="3">
					<input type="checkbox" class="int" name="admin[]" value="4" checked="ture">
				</td>
				<td class="td1">会员管理：<input type="checkbox" name="module[]" value="member"></td>
				<td class="td2">
					增加：<input type="checkbox" name="member[]" value="1">
					删除：<input type="checkbox" name="member[]" value="2">
					修改：<input type="checkbox" name="member[]" value="3">
					<input type="checkbox" class="int" name="member[]" value="4" checked="ture">
				</td>
			</tr>
			<tr>
				<td class="td1">图集管理：<input type="checkbox" name="module[]" value="picture"></td>
				<td class="td2">
					增加：<input type="checkbox" name="picture[]" value="1">
					删除：<input type="checkbox" name="picture[]" value="2">
					修改：<input type="checkbox" name="picture[]" value="3">
					<input type="checkbox" class="int" name="picture[]" value="4" checked="ture">
				</td>
				<td class="td1">广告管理：<input type="checkbox" name="module[]" value="ads"></td>
				<td class="td2">
					增加：<input type="checkbox" name="ads[]" value="1">
					删除：<input type="checkbox" name="ads[]" value="2">
					修改：<input type="checkbox" name="ads[]" value="3">
					<input type="checkbox" class="int" name="ads[]" value="4" checked="ture">
				</td>
			</tr>
			<tr>
				<td class="td1">文章管理：<input type="checkbox" name="module[]" value="article"></td>
				<td class="td2">
					增加：<input type="checkbox" name="article[]" value="1">
					删除：<input type="checkbox" name="article[]" value="2">
					修改：<input type="checkbox" name="article[]" value="3">
					<input type="checkbox" class="int" name="article[]" value="4" checked="ture">
				</td>
				<td class="td1">商品管理：<input type="checkbox" name="module[]" value="product"></td>
				<td class="td2">
					增加：<input type="checkbox" name="product[]" value="1">
					删除：<input type="checkbox" name="product[]" value="2">
					修改：<input type="checkbox" name="product[]" value="3">
					<input type="checkbox" class="int" name="product[]" value="4" checked="ture">
				</td>
			</tr>
			<tr >
				<td class="td1">留言管理：<input type="checkbox" name="module[]" value="message"></td>
				<td class="td2">
					增加：<input type="checkbox" name="message[]" value="1">
					删除：<input type="checkbox" name="message[]" value="2">
					修改：<input type="checkbox" name="message[]" value="3">
					<input type="checkbox" class="int" name="message[]" value="4" checked="ture">
				</td>
				<td class="td1">视频管理：<input type="checkbox" name="module[]" value="video"></td>
				<td class="td2">
					增加：<input type="checkbox" name="video[]" value="1">
					删除：<input type="checkbox" name="video[]" value="2">
					修改：<input type="checkbox" name="video[]" value="3">
					<input type="checkbox" class="int" name="video[]" value="4" checked="ture">
				</td>
			</tr>
			<tr>
				<td class="td1">友情链接管理：<input type="checkbox" name="module[]" value="friends"></td>
				<td class="td2">
					增加：<input type="checkbox" name="friends[]" value="1">
					删除：<input type="checkbox" name="friends[]" value="2">
					修改：<input type="checkbox" name="friends[]" value="3">
					<input type="checkbox" class="int" name="friends[]" value="4" checked="ture">
				</td>
				<td class="td1">人才管理：<input type="checkbox" name="module[]" value="recruit"></td>
				<td class="td2">
					增加：<input type="checkbox" name="recruit[]" value="1">
					删除：<input type="checkbox" name="recruit[]" value="2">
					修改：<input type="checkbox" name="recruit[]" value="3">
					<input type="checkbox" class="int" name="recruit[]" value="4" checked="ture">
				</td>
			</tr>
			<tr>
				<td class="td1">模型管理：<input type="checkbox" name="module[]" value="model"></td>
				<td class="td2">

					修改：<input type="checkbox" name="model[]" value="3">
					<input type="checkbox" class="int" name="model[]" value="4" checked="ture">
				</td>
				<td class="td1">SEO管理：<input type="checkbox" name="module[]" value="seo"></td>
				<td class="td2">
					增加：<input type="checkbox" name="seo[]" value="1">
					删除：<input type="checkbox" name="seo[]" value="2">
					修改：<input type="checkbox" name="seo[]" value="3">
					<input type="checkbox" class="int" name="seo[]" value="4" checked="ture">
				</td>
			</tr>
			<tr

				<td class="td1">数据库备份：<input type="checkbox" name="module[]" value="data"></td>
				<td class="td2" colspan="3"><input type="checkbox" class="int" name="data[]" value="4" checked="ture"></td>
			</tr>
			<tr>
				<th colspan="4" scope="col"><input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;"></th>
			</tr>
			</form>
		</tbody>
	</table><?php endif; ?>
	
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>豫ICP备14008333号-2 Copyright © 河南灵秀网络科技有限公司 All Rights Reserved 版权<br>
			本后台系统由<a href="http://www.cccuu.com" target="_blank" title="河南灵秀网络科技有限公司">河南灵秀网络科技有限公司</a>提供技术支持</p>
	</div>
</footer>
	<script>
		(function(){
			// 全选
			$(".checkAll").click(function(){
				//重新选中
				if($(this).prop('checked')){
					$("td input").prop('checked',true);
					//checkcart();
				}else{
					$("td input").prop('checked',false)
				}
			});
		})();
		$(":input[name='module[]']").click(function () {
			if($(this).prop("checked")){
				$(this).parent().next("td").find("input").prop("checked",true);
			}else{
				$(this).parent().next("td").find("input").prop("checked",false);
			}

		})
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