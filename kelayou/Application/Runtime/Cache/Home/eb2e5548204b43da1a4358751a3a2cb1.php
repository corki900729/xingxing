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
    <img src="<?php echo ($data['contact_image']['image']); ?>" alt="<?php echo ($data['contact_image']['title']); ?>">
</div>
<!-- 联系我们 详情-->
<div class="news-box">
    <h1 class="wow fadeInDown animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">联系我们<br><span>CONTACT US</span></h1>
    <img class="con-line wow fadeIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" src="/Public/home/images/line4.png" alt="">
    <div class="con-main">
        <div class="con-fill fl wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
            <form  id="form"  mothod="post" onsubmit="return but()">
                <label><input type="text" required="required" name="username" placeholder="您的姓名"></label>
                <label><input type="text" required="required" pattern="1[0-9]{10}" name="phone" placeholder="请输入11位有效数字"></label>
                <label><input type="email" name="email" placeholder="您的邮箱"></label>
                <label class="con-mes"><textarea name="p_content" required="required" rows="5" placeholder="留言内容"></textarea></label>
                <input type="submit"  value="提交"  class="con-btn"/>
            </form>
            <script>
                function but() {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo U('Contact/comment');?>",
                        data: $('#form').serialize(), // 要提交的表单 
                        success: function(msg) {
                            alert(msg);
                            //console.log(msg);
                        }
                    });
                    location.reload();
                    return false;
                }

            </script>
        </div>
        <div class="com-info fr">
            <h3 class="wow fadeInDown animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;"><?php echo (htmlspecialchars_decode($contact["content"])); ?></h3>
            <p class="co-phone wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">电话：<span><?php echo ($contact["tel"]); ?></span></p>
            <p class="co-chuan wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">传真：<?php echo ($contact["fax"]); ?></p>
            <p class="co-adres wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">地址：<?php echo ($contact["address"]); ?></p>
            <p class="co-post wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">邮编：<?php echo ($contact["post"]); ?></p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="con-map wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
    <!--引用百度地图API-->
    <style type="text/css">
        .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
        .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
    <!--百度地图容器-->
    <div style="width:100%;height:350px;border:#ccc solid 1px;" id="dituContent"></div>
    <script type="text/javascript">
                //创建和初始化地图函数：
                function initMap() {
                    createMap();//创建地图
                    setMapEvent();//设置地图事件
                    addMapControl();//向地图添加控件
                    addMarker();//向地图中添加marker
                }

                //创建地图函数：
                function createMap() {
                    var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
                    var point = new BMap.Point(113.67298, 34.760258);//定义一个中心点坐标
                    map.centerAndZoom(point, 18);//设定地图的中心点和坐标并将地图显示在地图容器中
                    window.map = map;//将map变量存储在全局
                }

                //地图事件设置函数：
                function setMapEvent() {
                    map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
                    map.enableScrollWheelZoom();//启用地图滚轮放大缩小
                    map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
                    map.enableKeyboard();//启用键盘上下左右键移动地图
                }

                //地图控件添加函数：
                function addMapControl() {
                    //向地图中添加缩放控件
                    var ctrl_nav = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_LEFT, type: BMAP_NAVIGATION_CONTROL_LARGE});
                    map.addControl(ctrl_nav);
                    //向地图中添加缩略图控件
                    var ctrl_ove = new BMap.OverviewMapControl({anchor: BMAP_ANCHOR_BOTTOM_RIGHT, isOpen: 1});
                    map.addControl(ctrl_ove);
                    //向地图中添加比例尺控件
                    var ctrl_sca = new BMap.ScaleControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT});
                    map.addControl(ctrl_sca);
                }

                //标注点数组
                var markerArr = [{title: "<?php echo $company_info[0]['value']; ?>", content: "<?php echo $contact['address']; ?>，电话：<?php echo $contact['tel']; ?>", point: "<?php echo $contact['x']; ?>|<?php echo $contact['y']; ?>", isOpen: 1, icon: {w: 21, h: 21, l: 0, t: 0, x: 6, lb: 5}}
                ];
                //创建marker
                function addMarker() {
                    for (var i = 0; i < markerArr.length; i++) {
                        var json = markerArr[i];
                        var p0 = json.point.split("|")[0];
                        var p1 = json.point.split("|")[1];
                        var point = new BMap.Point(p0, p1);
                        var iconImg = createIcon(json.icon);
                        var marker = new BMap.Marker(point, {icon: iconImg});
                        var iw = createInfoWindow(i);
                        var label = new BMap.Label(json.title, {"offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20)});
                        marker.setLabel(label);
                        map.addOverlay(marker);
                        label.setStyle({
                            borderColor: "#808080",
                            color: "#333",
                            cursor: "pointer"
                        });

                        (function() {
                            var index = i;
                            var _iw = createInfoWindow(i);
                            var _marker = marker;
                            _marker.addEventListener("click", function() {
                                this.openInfoWindow(_iw);
                            });
                            _iw.addEventListener("open", function() {
                                _marker.getLabel().hide();
                            })
                            _iw.addEventListener("close", function() {
                                _marker.getLabel().show();
                            })
                            label.addEventListener("click", function() {
                                _marker.openInfoWindow(_iw);
                            })
                            if (!!json.isOpen) {
                                label.hide();
                                _marker.openInfoWindow(_iw);
                            }
                        })()
                    }
                }
                //创建InfoWindow
                function createInfoWindow(i) {
                    var json = markerArr[i];
                    var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>" + json.content + "</div>");
                    return iw;
                }
                //创建一个Icon
                function createIcon(json) {
                    var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w, json.h), {imageOffset: new BMap.Size(-json.l, -json.t), infoWindowOffset: new BMap.Size(json.lb + 5, 1), offset: new BMap.Size(json.x, json.h)})
                    return icon;
                }

                initMap();//创建和初始化地图
    </script>
</div>
<!-- footer -->
    <!-- footer -->
    <div class="footer wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
		<p><?php echo ($company_info[2]['value']); ?></p>
		<p><a href="http://www.leasom.com/">技术支持：灵秀网络科技</a></p>
    </div>
</body>
</html>l>