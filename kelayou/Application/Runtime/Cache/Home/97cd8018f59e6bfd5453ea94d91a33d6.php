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
<div class="container wycj">
    <form id="form" onsubmit="return tj()">
    <label for=""><span>姓名</span>
        <input type="text" required name="username" id="" value=""/>
        <input type="hidden" required name="pid" id="" value="<?php echo ($id); ?>"/>
    </label>
    <label for="" class="sex"><span>性别</span>
        <div class="select-sex">
            <input type="radio" name="sex" id="" value="1" checked/>男
            <input type="radio" name="sex" id="" value="2" style="margin-left: 50px;"/>女
        </div>

    </label>
    <label for=""><span>现居住地</span><input required type="text" name="address" id="" value=""/></label>
    <label for="">
        <span>联系电话</span><input required type="text" name="phone" id="phone" value=""/>
    </label>
    <label for="" class="info">
        <span>备注</span>
        <textarea name="p_content" rows="" cols=""></textarea>
    </label>
    <button >提交</button>
    </form>
</div>
</body>
<script>
    function tj() {
        if($("#phone").val() == ""){
            return false;
        }
        if (!checkTel($("#phone").val())) {
            alert('电话格式不正确！');
            return false;
        }

        $.ajax({
            type: 'post',
            data: $("#form").serialize(),
            url: "<?php echo U('MenuTwo/canjia');?>",
            success: function (data) {
                if (data == -1) {
                    alert('提交失败');
                }else if(data == -2){
                    alert('已经提交成功，请不要重复提交，稍后管理员将会跟您联系！');
                } else {
                    alert('提交成功，稍后管理员将会跟您联系！');
                }
            }
        });
        return false;
    }

    function checkTel(phone)
    {
        var mobile = /^1[3|5|8]\d{9}$/, phones = /^0\d{2,3}-?\d{7,8}$/;
        return mobile.test(phone) || phones.test(phone);
    }
</script>
</html>