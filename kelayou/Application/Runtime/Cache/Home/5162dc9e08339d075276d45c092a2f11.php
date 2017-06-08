<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
    <img src="<?php echo ($data['brand_image']['image']); ?>" alt="<?php echo ($data['brand_image']['title']); ?>">
</div>

<!-- brand 品牌详情-->
<div class="news-box">
    <div class="bra-top">
        <div class="bra-name fl wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
            <img src="<?php echo ($brand['brandInfo']['logo']); ?>" alt="<?php echo ($brand['brandInfo']['name']); ?>">
            <p><?php echo ($brand['brandInfo']['mname']); ?> / <?php echo ($brand['brandInfo']['name']); ?></p>
        </div>
        <div class="bra-text fr wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
            <p><?php echo (htmlspecialchars_decode($brand['brandInfo']['introduce'])); ?></p>

        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- 品牌详情图文介绍 -->
<div class="bra-slide wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
    <div class="swiper-container swiper5">
        <div class="swiper-wrapper">
            <?php if(is_array($brand['imgInfo'])): $i = 0; $__LIST__ = $brand['imgInfo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                <img class="bra-img fl" src="<?php echo ($vo["img"]); ?>" alt="<?php echo ($vo["name"]); ?>" key="i">
                <div class="bra-word fr">
                    <div class="bra-num">0<?php echo ($i); ?></div>
                    <div class="bra-intro">
                        <p class="bra-slog">
                            <span class="bra-eng"><?php echo ($vo["mintroduce"]); ?></span>
                            <span class="bra-ite"><?php echo ($vo["introduce"]); ?></span>	
                        </p>
                        <p class="bra-them"><?php echo ($vo["name"]); ?></p>
                    </div>
                </div>
                <div class="bra-word2">
                    <div class="bra-num">0<?php echo ($i); ?></div>
                    <p class="bra-them"><?php echo ($vo["name"]); ?></p>
                    <p class="bra-slog"><?php echo ($vo["introduce"]); ?></p>
                    <p class="bra-eng"><?php echo ($vo["mintroduce"]); ?></p>
                </div>
                <div class="clearfix"></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="swiper-button-next swiper-button-next5"></div>
        <div class="swiper-button-prev swiper-button-prev5"></div>
    </div>
</div>
<script>
    var swiper5 = new Swiper('.swiper5', {
        nextButton: '.swiper-button-next5',
        prevButton: '.swiper-button-prev5',
        paginationClickable: true,
        loop: true,
        autoplay: 3000
    });
</script>

<!-- 门店 -->
<div class="container">
    <div class="stores">
        <div class="str-tit fl wow fadeIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
            <h3>店鋪<br><span>Store</span></h3>
            <img src="/Public/home/images/right3.png" alt="">
        </div>
        <ul class="stor-list fr wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
            <?php if(is_array($brand['shopInfo'])): $i = 0; $__LIST__ = $brand['shopInfo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <h5><span><?php echo ($i); ?>. </span><?php echo ($vo["name"]); ?></h5>
                <p>地址：<?php echo ($vo["address"]); ?></p>
                <p>电话：<?php echo ($vo["tel"]); ?></p>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="clearfix"></div>
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