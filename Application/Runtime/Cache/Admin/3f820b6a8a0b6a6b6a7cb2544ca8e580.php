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


     <script type="text/javascript">
 function quandel(obj,cName){
    var checkall=document.getElementsByName(cName);
	for(var $i=0;$i<checkall.length;$i++){
	      checkall[$i].checked=obj.checked;
	}
 }
   
</script>
<div class="panel panel-default">
				<div class="panel-heading" style="padding:0px;">
				<h3 class="panel-title" style="color:#7c38bc;font-weight:bold;"> <a href="<?php echo U('Admin/article/arcadd');?>"> SEO关键字设置</a></h3>
<div class="row" style="margin-left:90%;">
	
			</div>
				</div>
				<!--<a class="btn btn-secondary btn-sm btn-icon icon-left" href="<?php echo U('Seo/editrule');?>">新增</a>  <button class="btn btn-secondary btn-sm btn-icon icon-left" type="button" id="del">删除</button>-->  <button class="btn btn-secondary btn-sm btn-icon icon-left" type="buton" id="open">开启</button> <button class="btn btn-secondary btn-sm btn-icon icon-left" type="button" id="ban">禁用</button>
				<form id="form1" onsubmit="return false">
				<div class="panel-body">
			
					<table class="table table-bordered table-striped" id="example-2">
						<thead>
							<tr>
								<th><input type="checkbox">ID</th>
								<th style="width:10%">标题</th>
								<th style="width:10%">模块</th>
								<th style="width:10%">控制器</th>
								<th style="width:10%">方法</th>
								<th style="width:10%">SEO标题</th>
								<th style="width:10%">SEO关键字</th>
								<th style="width:10%">SEO描述</th>
								<th style="width:7%">状态</th>
								<th style="width:18%">操作</th> 
							</tr>
						</thead>
						
						<tbody class="middle-align">		
				
							<?php if(is_array($ruleList)): $i = 0; $__LIST__ = $ruleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
							<td><input type="checkbox" name="ids" value="<?php echo ($v["id"]); ?>"></td>
							<td><?php echo ($v["title"]); ?></td> 
							<td><?php echo ($v["app"]); ?></td>
							<td><?php echo ($v["controller"]); ?></td>
							<td><?php echo ($v["action"]); ?></td>
							<td><?php echo ($v["seo_title"]); ?></td>
							<td><?php echo ($v["seo_keywords"]); ?></td>
							<td><?php echo ($v["seo_description"]); ?></td>
							<td><?php if($v['status'] == 1): ?>开启<?php elseif($v['status'] == 0): ?>禁止<?php endif; ?></td>
							
								<td>
									
									<a href="<?php echo U('Admin/Seo/editrule',array('id'=>$v['id']));?>" class="btn btn-secondary btn-sm btn-icon icon-left">
										修改
									</a>
									
									
								</td> 
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
				<div class="pagination"><?php echo ($show); ?></div>
				</div>
				
	    <!--  <button class="btn btn-danger" type="submit" name="submit" onclick="delmores()">批量删除</button> -->
		</form>
			</div>

<script type="text/javascript">
    
				
				
					
					$("#del").click(function(){
					
					var ids =[]; 
				$('input[name="ids"]:checked').each(function(){ 
				ids.push($(this).val()); 
				});
					
					
					
					$.ajax({
								type:'post',
								url:"<?php echo U('Seo/setRuleStatus');?>",
								data:{ids:ids,status:-1},
								success:function(msg){
							
									if(msg.status==1){
										layer.msg('操作成功！', {icon:1});
									 setTimeout(function () {
                        window.location.href = "/index.php/Admin/Seo/index.html";
                    }, 1500);
									}else{
										layer.msg('操作失败！', {icon:2});
										
									}
								}
							});
					
					
					})	
			
				$("#open").click(function(){
					
					var ids =[]; 
				$('input[name="ids"]:checked').each(function(){ 
				ids.push($(this).val()); 
				});
					
					
					
					$.ajax({
								type:'post',
								url:"<?php echo U('Seo/setRuleStatus');?>",
								data:{ids:ids,status:1},
								success:function(msg){
							
									if(msg.status==1){
										layer.msg('操作成功！', {icon:1});
									 setTimeout(function () {
                        window.location.href = "/index.php/Admin/Seo/index.html";
                    }, 1500);
									}else{
										layer.msg('操作失败！', {icon:2});
										
									}
								}
							});
					
					
					})	
					
					$("#ban").click(function(){
					
					var ids =[]; 
				$('input[name="ids"]:checked').each(function(){ 
				ids.push($(this).val()); 
				});
					
					
					
					$.ajax({
								type:'post',
								url:"<?php echo U('Seo/setRuleStatus');?>",
								data:{ids:ids,status:0},
								success:function(msg){
							
									if(msg.status==1){
										layer.msg('操作成功！', {icon:1});
									 setTimeout(function () {
                        window.location.href = "/index.php/Admin/Seo/index.html";
                    }, 1500);
									}else{
										layer.msg('操作失败！', {icon:2});
										
									}
								}
							});
					
					
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