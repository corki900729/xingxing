<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php $header=M('SeoRule')->where('status="1"')->select(); foreach($header as $k=>$v){ if($v['controller']==ACTION_NAME || $v['controller']==CONTROLLER_NAME){ $a = $v['seo_description']; $b = $v['seo_keywords']; $c = $v['seo_title']; } } $a = isset($a)?$a:"Free Web tutorials"; $b = isset($b)?$b:"HTML,CSS,JavaScript"; $c = isset($c)?$c:"满江红"; ;?>
        <meta name="description" content="<?php echo ($a); ?>">
        <meta name="keywords" content="<?php echo ($b); ?>">
        <title><?php echo ($c); ?>-<?php if(is_array($company_info)): $i = 0; $__LIST__ = array_slice($company_info,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["value"]); endforeach; endif; else: echo "" ;endif; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="renderer" content="webkit">

        <link rel="stylesheet" type="text/css" href="/Public/home/css/base.css">
        <link rel="stylesheet" type="text/css" href="/Public/home/css/style.css">
    <?php if(CONTROLLER_NAME == Index ): ?><link rel="stylesheet" type="text/css" href="/Public/home/css/index.css"><?php endif; ?>
    <link rel="stylesheet" href="/Public/home/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/home/css/animate.css">
    <script type="text/javascript" src="/Public/home/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/Public/home/js/jquery.js"></script>
    <script src="/Public/home/js/swiper.min.js"></script>
    <script src="/Public/home/js/wow.min.js"></script>
    <script type="text/javascript" src="/Public/home/js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="/Public/home/js/wow.min.js"></script>
    <script type="text/javascript">
        new WOW().init();
        $(function() {
            $(".menu").click(function() {
                $(".nav-drop").slideToggle(500);
            });
            $(".close").click(function() {
                $(".nav-drop").slideUp(300);
            });
        });
    </script>
</head>
<body>
    <!-- 顶部 -->
    <div class="top-box">
        <div class="top">
            <a class="logo fl" href="<?php echo U('Index/index');?>"><img src="<?php echo ($company_info[1]['value']); ?>" alt="<?php echo ($company_info[0]['value']); ?>"></a>
            <!-- 导航nav -->
            <ul class="nav fl">
                <li><a class="<?php if(CONTROLLER_NAME == Index ): ?>on<?php endif; ?>" href="<?php echo U('Index/index');?>">首页</a></li>
                <li><a class="<?php if(CONTROLLER_NAME == About ): ?>on<?php endif; ?>" href="<?php echo U('About/about');?>">关于我们</a></li>
                <li><a class="<?php if(CONTROLLER_NAME == News ): ?>on<?php endif; ?>" href="<?php echo U('News/news');?>">新闻资讯</a></li>
                <li><a class="<?php if(CONTROLLER_NAME == Brand ): ?>on<?php endif; ?>" href="<?php echo U('Brand/brand');?>">品牌中心</a></li>
                <li><a class="<?php if(CONTROLLER_NAME == Vip ): ?>on<?php endif; ?>" href="<?php echo U('Vip/vip');?>">VIP尊享</a></li>
                <li><a class="<?php if(CONTROLLER_NAME == Join ): ?>on<?php endif; ?>" href="<?php echo U('Join/join');?>">在线招聘</a></li>
                <li><a class="<?php if(CONTROLLER_NAME == Zhao ): ?>on<?php endif; ?>" href="<?php echo U('Zhao/zhao');?>">招商加盟</a></li>
                <li><a class="<?php if(CONTROLLER_NAME == Contact ): ?>on<?php endif; ?>" href="<?php echo U('Contact/contact');?>">联系我们</a></li>
            </ul>
            <form action="" mothod="post">
                <label class="search fr">
                    <input type="text" id="key" required="required">
                    <a class="menu" href="javascript:;" onclick="serch()"></a>
                    <script>
                        function serch(){
                            var key=$('#key').val();
                            location.href="/Home/Brand/brandInfo/key/"+key;
                        }
                    </script>
                </label>
            </form>
            <div class="clearfix"></div>
            <img class="menu" src="/Public/home/images/menu.png" alt="">
        </div>
    </div>
	<!-- banner -->
	<div class="ab-ban">
		<img src="<?php echo ($data['zhao_image']['image']); ?>" alt="<?php echo ($data['zhao_image']['title']); ?>">
	</div>
	<!-- 加盟优势 strength-->
    <div class="jon-box">
    	<div class="jo-str">
			<h1 class="wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">招商加盟<br><span>JOIN US</span></h1>
			<ul class="str-list">
				<li class="wow fadeInDown animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h3><?php echo ($attr['List']['titley']); ?></h3>
					<p><?php echo ($attr['List']['contenty']); ?></p>
				</li>
				<li class="wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h3><?php echo ($attr['List']['titlet']); ?></h3>
					<p><?php echo ($attr['List']['contentt']); ?></p>
				</li>
				<li class="wow fadeInDown animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h3><?php echo ($attr['List']['titlez']); ?></h3>
					<p><?php echo ($attr['List']['contentz']); ?></p>
				</li>
				<li class="wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h3><?php echo ($attr['List']['titleq']); ?></h3>
					<p><?php echo ($attr['List']['contentq']); ?></p>
				</li>
			</ul>
			<div class="clearfix"></div>
			<div class="jo-bg">
				<img class="jo-cub jo-cub1 wow fade animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" src="/Public/home/images/bg6.png" alt="">
				<img class="jo-cub jo-cub2 wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" src="/Public/home/images/bg6.png" alt="">
				<img class="jo-cub jo-cub3 wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" src="/Public/home/images/bg7.png" alt="">
				<img class="jo-cub jo-cub4 wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" src="/Public/home/images/bg7.png" alt="">
			</div>
    	</div>
    	<div class="jo-att wow fadeInDown animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
			<p><?php echo ($attr['List']['titled']); ?></p>
			<p>加盟热线：<span><?php echo ($attr['List']['tel']); ?></span></p>
		</div>
    </div>
    <!-- 负责人 -->
    <div class="jo-peo">
    	<div class="container">
			<h2 class="wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">品牌负责人<b>|</b><br><span>Brand person in charge</span></h2>
			<div class="peo-list wow fadeInDown animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				<?php if(is_array($attr['zhao'])): $i = 0; $__LIST__ = $attr['zhao'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
					<dt>负责人：<?php echo ($vo["name"]); ?></dt>
					<dd>职位：<?php echo ($vo["position"]); ?></dd>
					<dd>联系电话：<?php echo ($vo["tel"]); ?></dd>
				
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
    </div>
    <!-- footer -->
    <!-- footer -->
    <div class="footer wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
		<p><?php echo ($company_info[2]['value']); ?></p>
		<p><a href="http://www.leasom.com/">技术支持：灵秀网络科技</a></p>
    </div>
</body>
</html>