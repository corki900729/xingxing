<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>克拉玛依</title>
    <link rel="stylesheet" type="text/css" href="/Public/home/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/home/css/whd.css"/>
</head>
<script src="/Public/home/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/admin/lib/ueditor/1.4.3/ueditor.all.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<body>
<div class="container wycj">
    <form onsubmit="return sendd()" id="form" method="post" action="<?php echo U('MenuThree/hudong');?>">

    <label for="">
        <span>标题</span><input type="text" name="username" required id="" value=""/>
    </label>
    <script id="content" type="text/plain" style="width:100%;height:300px;" name="content"></script>
    <script>
        var ue = UE.getEditor('content');
    </script>
    <!--<div><img src="/Public/home/img/upload-img.png"/><img src="/Public/home/img/upload-flsh.png"/></div>-->
    <button class="send" >发送</button>
    </form>
</div>
<script>
    function sendd() {
        $.ajax({
            type: 'post',
            data: $('#form').serialize(),
            url: "<?php echo U('MenuThree/hudong');?>",
            success: function (data) {
                if (data == 1) {
                    alert('已提交');
                    setTimeout(function () {
                        location=location;
                    },'2000');
                }else if(data == -2){
                    alert('请认真填写内容！');
                } else {
                    alert('提交失败！');
                }
            }
        });
        return false;
    }
</script>
</body>

</html>