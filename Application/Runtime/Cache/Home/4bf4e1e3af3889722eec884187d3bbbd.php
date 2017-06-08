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
    <img src="<?php echo ($about_image[0]['image']); ?>" alt="<?php echo ($about_image[0]['title']); ?>">
</div>
<!-- about -->
<div class="ab-info" >
    <div class="ab-top wow fadeInDown animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
        <img class="ab-tit fl" src="/Public/home/images/tit2.png" alt="">
        <p class="ab-tit2 fl"><?php echo ($data['oneList']["name"]); ?><br><?php echo ($data['oneList']["mname"]); ?></p>
        <img class="ab-pic fl" src="<?php echo ($data['oneList']["image"]); ?>" alt="">
    </div>
    <div class="clearfix"></div>
    <div class="ab-text wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
        <p><?php echo (htmlspecialchars_decode($data['oneList']["introduce"])); ?></p>
    </div>
</div>
<!-- ab-mind 理念 -->
<div class="ab-box">
    <div class="ab-slide wow bounceIn animated" data-wow-delay="0.8s" style="visibility: visible; -webkit-animation-delay: 0.8s;">
        <ul class="ab-mind">
            <?php if(is_array($data['List'])): $i = 0; $__LIST__ = $data['List'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <div class="ab-word fl">
                    <div class="ab-left fl"><h2><?php echo ($vo["name"]); ?><span>|</span><span><?php echo ($vo["mname"]); ?></span><b>|</b></h2></div>
                    <div class="ab-right fl">
                        <h3><?php echo (htmlspecialchars_decode($vo["introduce"])); ?></h3>
                        <p><?php echo (htmlspecialchars_decode($vo["mintroduce"])); ?></p>
                    </div>
                    <div clearfix></div>
                </div>
                <img class="am-pic fr" src="<?php echo ($vo["image"]); ?>" alt="<?php echo ($vo["name"]); ?>">
                <div class="clearfix"></div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <ul class="ab-btn">
            <?php if(is_array($data['List'])): $i = 0; $__LIST__ = $data['List'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
    jQuery(".ab-slide").slide({titCell: ".ab-btn li", mainCell: ".ab-mind", titOnClassName: "on", autoPage: false, effect: "top", autoPlay: true, vis: 1, trigger: "click"});
</script>
<!--ab-his 品牌历史 -->
<div class="ab-his">
    <ul class="his-list">
        <?php if(is_array($data['lichengList'])): $i = 0; $__LIST__ = $data['lichengList'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($mod) == "0"): ?><li class="fl wow fadeInDown animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
            <p><i><?php echo ($vo["year"]); ?></i><?php echo ($vo["title"]); ?><br>
                <?php echo ($vo["content"]); ?></p>
            <span></span>
        </li><?php endif; ?>
        <?php if(($mod) == "1"): ?><li class="fr wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
            <p><i><?php echo ($vo["year"]); ?></i><?php echo ($vo["title"]); ?><br>
                <?php echo ($vo["content"]); ?></p>
            <span></span>
        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        
       
        
    </ul>
    <div class="clearfix"></div>
</div>
<!-- 图片 -->
<div class="ab-ban2 wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
    <img src="<?php echo ($about_image[1]['image']); ?>" alt="<?php echo ($about_image[1]['title']); ?>">
</div>
    <!-- footer -->
    <div class="footer wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
		<p><?php echo ($company_info[2]['value']); ?></p>
		<p><a href="http://www.leasom.com/">技术支持：灵秀网络科技</a></p>
    </div>
</body>
</html>