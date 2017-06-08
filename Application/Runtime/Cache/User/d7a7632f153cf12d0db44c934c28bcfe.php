<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>这是什么系统的后台</title>
<link rel="shortcut icon" type="image/x-icon" href="/Public/user/images/ico.ico" media="screen" />
<link rel="stylesheet" type="text/css" href="/Public/user/css/base.css">
<script src="/Public/user/js/jquery-1.7.2.min.js"></script>
<script src="/Public/user/js/base.js"></script>
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
</head>

<body>
<!--Background by-->
<div class="wrap wrap-index"> 
  <!-- slider-->
  <div class="slider">
    <div class="jquery-reslider">
      <div class="slider-block" data-url="/Public/user/images/bj.jpg"></div>
      <div class="slider-block" data-url="/Public/user/images/bj1.jpg"></div>
      <div class="slider-block" data-url="/Public/user/images/bj2.jpg"></div>
    </div>
  </div>
</div>
<!-- jQuery --> 
<script src="/Public/user/js/jquery.reslider.js"></script> 
<script>
	$(function(){
		$('.jquery-reslider').reSlider({
			speed:1000,//设置轮播的高度
			delay:5000,//设置轮播的延迟时间
			imgCount:3,//设置轮播的图片数
			dots:true,//设置轮播的序号点
			autoPlay:true//设置轮播是否自动播放
		});
	});
	
	
	
</script> 
<!--Input box-->
<div class="box">
  <h1>管理员登录</h1>
  <div class="for">
      <p>
        <input class="ico1" type="text" placeholder="用户名">
      </p>
      <p>
        <input class="ico2" type="password" placeholder="密码">
      </p>
      <p>
        <input class="ico3 yzm" type="text" placeholder="验证码">
		<a><img src="/User/Index/verify" onClick="this.src=this.src+'?'+Math.random()" alt=""></a>
	  </p>
      <p>
        <input class="login" type="submit" value="登录">
        <input class="cancel" type="reset" value="取消">
      </p>
  </div>
</div>
<!--copyright-->
</body>
</html>
	<script>
		$(document).keypress(function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				$(".login").click();
			}
		});
		$(".login").click(function(){
		var name=$(".ico1").val();
		var pwd=$(".ico2").val();
		var code=$(".ico3").val();
		if(name==""){layer.msg('用户名不能为空',{icon:2});return;}
		if(pwd==""){layer.msg('密码不能为空',{icon:2});return;}
		$.post("<?php echo U('Index/verify');?>",{code:code,name:name,pwd:pwd},function(data){
			  if(data==1){
				  layer.msg('登录成功！',{icon: 6,time:2000});
				  location.href="/index.php/Admin/Index/index";
			  }
			  if(data==2) {
				  layer.msg('验证码错误！',{icon: 5,time:2000});
				  $(".ico3").next("a").find("img").click();
			  }
			  if(data==-1) {
				  layer.msg('用户名或密码错误！',{icon: 5,time:2000});
				  $(".ico3").next("a").find("img").click();
			  }
		})
	})
	</script>