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


     <!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/style.css" />



<title>管理员权限添加</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<article class="page-container">
	<form method="<?php echo U('Users/add');?>" onsubmit="return false;" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">模块管理：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<?php if($module['config']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">系统管理</label>
				</div><?php endif; ?>
			<?php if($module['admin']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">管理员管理</label>
				</div><?php endif; ?>
			<?php if($module['video']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">视频管理</label>
				</div><?php endif; ?>
			<?php if($module['picture']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">相册管理</label>
				</div><?php endif; ?>
			<?php if($module['member']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">会员管理</label>
				</div><?php endif; ?>
			<?php if($module['ads']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">广告管理&nbsp;&nbsp;&nbsp;</label>
				</div><?php endif; ?>
			<?php if($module['article']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">文章管理</label>
				</div><?php endif; ?>
			<?php if($module['friends']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">友情管理</label>
				</div><?php endif; ?>
			<?php if($module['product']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">商品管理</label>
				</div><?php endif; ?>
			<?php if($module['message']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">留言管理&nbsp;&nbsp;&nbsp;
					</label>
				</div><?php endif; ?>
			<?php if($module['recruit']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">人才管理</label>
				</div><?php endif; ?>
			<?php if($module['data']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">数据库备份</label>
				</div><?php endif; ?>
			<?php if($module['seo']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">SEO管理</label>
				</div><?php endif; ?>
			<?php if($module['model']): ?><div class="check-box">
					<input type="checkbox" id="checkbox-pinglun" name="" value="">
					<label for="checkbox-pinglun">模型管理</label>
				</div><?php endif; ?>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" id="tjj" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>
<script type="text/javascript">
	$("#tjj").click(function(){
		var name=$("#name").val();
		var pwd=$("#pwd").val();
		var power=$('input[name="power"]:checked ').val();
		if(name=="" || pwd==""){
			layer.msg('用户名和密码不能为空',{icno:1});
			return;
		}
		$.post("<?php echo U('Users/add');?>",{'name':name,'pwd':pwd,'power':power},function(data){
			if(data==1){
			alert("添加管理员成功");
			history.go(0);
			//location.href="<?php echo U('Index/index');?>";
			}else if(data==2){
			alert("此管理员已存在");
			// location.href="<?php echo U('Index/index');?>";
			return false;
			}else{
			alert("添加管理员失败");
			// location.href="<?php echo U('Index/index');?>";
			return false;
			}
		});
	})
</script>>
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
<!--请在下方写此页面业务相关的脚本--> 



<!--/请在上方写此页面业务相关的脚本-->
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