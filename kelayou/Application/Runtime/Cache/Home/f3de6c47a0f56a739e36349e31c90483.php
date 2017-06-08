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
<body>
<form id="form" action="<?php echo U('huida_tijiao');?>" method="post">
    <div class="container kpjd wyct wycj tjda">
        <p class="title">
            <?php echo ($info["title"]); ?>
        </p>
        <input id="dati_id" type="hidden" name="dati_id" value="<?php echo ($info["id"]); ?>">
        <textarea id="daan" name="daan" rows="" cols="" placeholder="请输入你的答案"></textarea>
        <p onclick="tijiao()" class="question">提交答案</p>
    </div>
</form>
</body>
<script>
    function tijiao() {
        if ($('#daan').val() == "" || $('#daan').val() == null) {
            alert('答案不能为空');
            return false;
        }
        $.ajax({
            type: 'post',
            data: {daan: $('#daan').val(), dati_id: $('#dati_id').val()},
            url: "<?php echo U('huida_tijiao');?>",
            success: function (data) {
                if (data == -2) {
                    alert('已经提交过答案了，不要重复提交！');
                } else if (data == -1) {
                    alert('提交失败！');
                } else {
                    alert('提交成功，等待管理员审核！');
                    var url = "/Home/MenuTwo/dati_info/id/"+data;
                    window.location.href = url;
                }
            }
        });
    }
</script>
</html>