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


     
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 背景图管理 <span class="c-gray en">&gt;</span> 背景图位列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
    <!--<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" class="btn btn-primary radius" onclick="add()"><i class="Hui-iconfont">&#xe600;</i> 添加背景图位</a></span>  </div>-->
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sorts">
            <thead>
            <tr class="text-c">
                <th width="80">背景图位描述</th>
                <!--<th width="100">尺寸大小</th>-->

                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
                    <td>
                        <?php echo ($v["name"]); ?>
                    </td>

                    <!--<td><?php echo ($v["size"]); ?></td>-->
                    <td class="td-manage">
                        <a style="text-decoration:none" href="javascript:;" onclick="edit(<?php echo ($v["id"]); ?>,this)" attr="<?php echo ($v["name"]); ?>">编辑</a>
                        <!--<a title="删除" href="javascript:;" onclick="member_del(this,<?php echo ($v["id"]); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>-->
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
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
            message: '背景图位名称:<input type="text"  id="c_name"  class="input-text"/><br/><br/>尺寸大小:<input type="text" id="s_name"  class="input-text"/>',
            title: "添加：",
            buttons: {
                success: {
                    label: "确认",
                    className: "btn-success",
                    callback: function() {
                        name=$('#c_name').val();
                        sort=$("#s_name").val();
                        if(name==''||sort==''){
                            bootbox.alert('输入不能为空');
                            return ;
                        }
                        $.ajax({
                            'type':'post',
                            data:{name:name,size:sort,type:"add"},
                            'url':"<?php echo U('Ads/position');?>",
                            'success':function(dat){
                                layer.alert(dat);
                                location.replace(location.href);
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
    /*-编辑*/
    function edit(id,v){
        var name=$(v).attr("attr");
        bootbox.dialog({
            message: '背景图位名称:<input type="text"  id="c_name"  class="input-text" value="'+name+'"/>',
            title: "编辑：",
            buttons: {
                success: {
                    label: "确认",
                    className: "btn-success",
                    callback: function() {
                        name=$('#c_name').val();
                        if(name==''){
                            bootbox.alert('输入不能为空');
                            return ;
                        }
                        $.ajax({
                            'type':'post',
                            data:{name:name,id:id,type:"edit"},
                            'url':"<?php echo U('Ads/position');?>",
                            'success':function(dat){
                                layer.alert(dat);
                                location.replace(location.href);
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