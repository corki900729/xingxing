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


     
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 商品分类管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<?php if($module['product']['del']): ?><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a><?php endif; ?>
			<?php if($module['product']['add']): ?><a href="<?php echo U('Goods/gtype_add');?>" class="btn btn-primary radius"><i class="Hui-iconfont"></i> 添加分类</a><?php endif; ?>
		</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">名称</th>
					<th width="80">排序</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td class="hidden-xs" id="<?php echo ($v["id"]); ?>"><input type="checkbox" name="" value=""></td>
					<td><?php echo ($v["id"]); ?></td>
					<td class="text-l"><?php echo ($v["gtype"]); ?></td>
					<td><?php echo ($v["sort"]); ?></td>
					<td class="f-14">
					<?php if($module['product']['edit']): ?><a href="<?php echo U('Goods/gtype_edit',array('id'=>$v['id']));?>" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a><?php endif; ?>
					<?php if($module['product']['del']): ?><a href="javascript:;" onclick="gtype_del(this,<?php echo ($v["id"]); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
/*系统-栏目-删除*/
function gtype_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.post("<?php echo U('Goods/gtype_del');?>",{'id':id},function(data){
			if(data.status==1){
				//$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
				window.location.reload();
			}
		});
		
	});
}

//批量删除
	 function datadel() {
        var ids = "";
        $(".hidden-xs").each(function () {
            var p = $(this);
            if (p.children().is(":checked")) {
                ids += p.attr('id') + ',';
            }
        });
		if (ids == "") {
            layer.msg("您什么都没有选择呢",{icon:2});
            return false
        };
		layer.confirm("你确定要全部删除吗？", {
            btn: ['确定','取消'] //按钮
        }, function(){
		$.post('<?php echo U("Goods/gtype_delall");?>',{'ids':ids},function(data){
			if(data.status==1){
			layer.msg('删除成功！',{icon:1});
			setTimeout(function () {
							location.reload();
				$(".hidden-xs").children().attr("checked",false);
						}, 2000);
			}else{
			layer.msg('删除失败！',{icon:2});
			}
			
			})
		})
       
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