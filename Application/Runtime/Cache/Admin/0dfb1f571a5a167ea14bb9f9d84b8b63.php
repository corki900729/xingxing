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


     
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-member-add">
		<?php echo (htmlspecialchars_decode($con["p_content"])); ?>
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" value="<?php echo ($con["username"]); ?>" placeholder="" id="username" name="username" disabled="disabled">-->
				<!--<input type="hidden" name="id"  value="<?php echo ($con["id"]); ?>" />-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-3">内容：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<?php echo (htmlspecialchars_decode($con["p_content"])); ?>-->
				<!--&lt;!&ndash; <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p> &ndash;&gt;-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>电话：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" value="<?php echo ($con["phone"]); ?>" placeholder="" id="phone" name="phone" disabled="disabled">-->
				<!--<input type="hidden" name="id"  value="<?php echo ($con["id"]); ?>" />-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9 skin-minimal">-->
				<!--<div class="radio-box">-->
				<!--<?php if($con["status"] == 0): ?>-->
					<!--<input name="status" type="radio" id="sex-1" value="0" checked>-->
					<!--<?php else: ?>-->
					<!--<input name="status" type="radio" id="sex-1" value="0" >-->
					<!--<?php endif; ?>-->
					<!--<label for="sex-1">未读</label>-->
				<!--</div>-->
				<!--<div class="radio-box">-->
				<!--<?php if($con["status"] == 1): ?>-->
					<!--<input type="radio" id="sex-2" value="1" name="status" checked>-->
					<!--<?php else: ?>-->
					<!--<input type="radio" id="sex-2" value="1" name="status">-->
					<!--<?php endif; ?>-->
					<!--<label for="sex-2">已读</label>-->
				<!--</div>-->
				<!---->
			<!--</div>-->
		<!--</div>-->


		<!--<div class="row cl">-->
			<!--<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">-->
				<!--<input class="btn btn-primary radius" id="tj" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">-->
			<!--</div>-->
		<!--</div>-->
	</form>
</article>
<script type="text/javascript">
	$(function(){
		
		$("#tj").click(function(){
			var id=$("input[name=id]").val();

			var status=$("input[name='status']:checked").val();

			$.post("<?php echo U('Comment/edit');?>",{id:id,status:status},function(sb){
				if(sb.status==1){
					layer.msg(sb.info);
					parent.location.reload();
				}
				if(sb.status==0){
					layer.msg(sb.info);
					layer.msg("修改失败");return false;
				}
			})
		})
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