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


     <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add" action="<?php echo U('Sys/save');?>" method="post" enctype="multipart/form-data">
	<?php if($module['config']['add']): ?><!--<div class="cl pd-5 bg-1 bk-gray mt-20">
	<span class="l">
	<a href="javascript:;" class="btn btn-primary radius" onclick="add()"><i class="Hui-iconfont">&#xe600;</i> 添加配置</a>
	</span>
	</div>--><?php endif; ?>
	<br>
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl"><span>基本设置</span></div>
			<!-- <span>安全设置</span><span>邮件设置</span><span>其他设置</span> <span class="c-red">*</span> -->
			
<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="10%">ID</th>
					<th width="15%">配置名称</th>
					<th>内容</th>
					<th width="10%">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($sys)): $i = 0; $__LIST__ = $sys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td><?php echo ($vo["id"]); ?></td>
					<td>
					<?php echo ($vo["remark"]); ?>
					</td>
					<td>
					<?php if($vo['type'] == 1): echo ($vo["value"]); ?>
					<?php elseif($vo['type'] == 2): ?>
					<?php echo ($vo["value"]); ?>
					<?php elseif($vo["type"] == 3): ?>
					<?php $content=strip_tags($vo['value']); echo mb_substr($content,0,95,'utf-8'); ?>
					<?php elseif($vo['type'] == 30): ?>
					<img style="width: 180px;height: 120px;" id="preview_<?php echo ($vo["id"]); ?>" src="<?php echo ($vo["value"]); ?>"><?php endif; ?>
					</td>
	
					<td class="td-manage">
					
					<a href="<?php echo U('Admin/Sys/edit',array('id'=>$vo['id']));?>" class="btn btn-secondary btn-sm btn-icon icon-left">编辑</a>

					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				
			</tbody>
		</table>
	<br>
	<div class="paginate" style="float:right;"><?php echo ($page); ?></div>
</div>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/Public/admin/lib/bootstrap-modal/2.2.4/bootstrap-modal.js"></script>
<script type="text/javascript" src="/Public/admin/lib/bootstrap-modal/2.2.4/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="/Public/admin/lib/bootbox/bootbox.min.js"></script>

<script type="text/javascript">
    $(function(){
        $('.table-sorts tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                //table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    });
    /*添加*/
    function add(){

        bootbox.dialog({
            message: '配置名称:<input type="text"  id="c_name"  class="input-text"/><br/><br/>类型效果:<br/><input type="radio" name="type" value="1"  class="radio-box"/>文本框&nbsp;&nbsp;<input type="radio" name="type" value="2"  class="radio-box"/>多文本框&nbsp;&nbsp;<input type="radio" name="type" value="30"  class="radio-box"/>图片&nbsp;&nbsp;<input type="radio" name="type" value="3"  class="radio-box"/>编辑器&nbsp;&nbsp;',
            title: "添加：",
            buttons: {
                success: {
                    label: "确认",
                    className: "btn-success",
                    callback: function() {
                        remark=$('#c_name').val();
                        type=$("input[name='type']:checked").val()
                        if(remark==''||type==''){
                            layer.msg('输入不能为空');
                            return ;
                        }
                        $.ajax({
                            'type':'post',
                            data:{remark:remark,type:type},
                            'url':"<?php echo U('Sys/addsys');?>",
                            'success':function(dat){
							if(dat.status==1){
								layer.alert('添加成功',{icon:1});
								location.replace(location.href);
							}else{
								layer.alert('添加失败',{icon:2});
							}
                                
                            
                            }
                        });

                    }
                },
                danger: {
                    label: "取消",
                    className: "btn-danger",
                    callback: function() {

                    }
                }
            }
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