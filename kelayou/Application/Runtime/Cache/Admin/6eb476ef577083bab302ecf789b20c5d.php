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


     
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 背景图管理 <span class="c-gray en">&gt;</span> 背景图列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<form action="<?php echo U('Ads/index');?>" method="post"> 
	<div class="text-c"> 背景图查询：
		<select name="pid" class="input-text" style="width:250px">
		<?php if($pid != null): ?><option value="<?php echo ($pid); ?>"><?php echo (get_adp_name($pid)); ?></option><?php endif; ?>
		<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
		<button class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><!-- <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> --> 
	<!--<?php if($module['ads']['add']): ?><a class="btn btn-primary radius" onclick="picture_add('添加图片','<?php echo U('Ads/add');?>')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加背景图</a><?php endif; ?>-->
	</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="200">背景图名称</th>
					<th width="150">图片</th>
					<th width="200">背景图位置</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($ads)): $i = 0; $__LIST__ = $ads;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td><?php echo ($v["title"]); ?></td>
					<td><img width="100" height="66" src="<?php echo ($v["image"]); ?>"/></td>
					<td><?php echo (get_adp_name($v["pid"])); ?></td>
					<td class="td-manage">
					<a style="text-decoration:none" class="ml-5" onClick="picture_edit('背景图编辑','<?php echo U('Ads/update',array('id'=>$v['id']));?>','<?php echo ($v["id"]); ?>')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> 
					<!--<a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'<?php echo ($v["id"]); ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>-->
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			
		</table>
		<br>
		<div class="paginate" style="float:right;"><?php echo ($page); ?></div>
	</div>
</div>

<script type="text/javascript">
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-编辑*/
function picture_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-删除*/
function picture_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		 $.post( "<?php echo U('Ads/delete');?>",{'id':id},function(data){
			if(data.status==1){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			}else{
				layer.msg('删除失败!',{icon:2,time:1000});
			}
		 })
		
	});
}

//背景图关闭

function guanbi(obj,id){
   
       $.post("<?php echo U('Ads/guanbi');?>",{'id':id},function(data){
                    if(data.status==1){
                        var src="/Public/admin/images/error.png";
                        location.reload()
                        $("#t-"+id).attr('src',src);
                    }
                });
        

}

//背景图开启
function kaiqi(obj,id){
   $.post("<?php echo U('Ads/kaiqi');?>",{'id':id},function(data){
                    if(data.status==1){
                        var src="/Public/admin/images/right.png";
                        location.reload()
                        $("#t-"+id).attr('src',src);
                    }
                });
        

}
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