<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<style>
    .content {
        background: url('<?php echo ($data["index_ads"]["image"]); ?>')
    }
</style>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>克拉玛依</title>
    <link rel="stylesheet" type="text/css" href="/Public/home/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/home/css/index.css"/>
</head>

<body>
<div class="content container">
    <div class="content-bottom">
        <ul>
            <?php if(is_array($data['menus'])): $i = 0; $__LIST__ = $data['menus'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['id'] == 4): ?><li>
                        <a href="<?php echo U('MenuOne/index');?>">
                            <div class="title">
                                <img src="/Public/home/img//icon-img.png"/>
                                <p><?php echo ($vo["value"]); ?></p>
                            </div>
                            <img src="/Public/home/img//hover.png" class="hover"/>
                        </a>
                    </li>
                    <?php elseif($vo['id'] == 5): ?>
                    <li>
                        <a href="<?php echo U('MenuTwo/index');?>">
                            <div class="title">
                                <img src="/Public/home/img//icon-img2.png"/>
                                <p><?php echo ($vo["value"]); ?></p>
                            </div>
                            <img src="/Public/home/img//hover-yellow.png" class="hover"/>
                        </a>
                    </li>
                    <?php elseif($vo['id'] == 6): ?>
                    <li>
                        <a href="<?php echo U('MenuThree/index');?>">
                            <div class="title">
                                <img src="/Public/home/img//icon-img4.png"/>
                                <p><?php echo ($vo["value"]); ?></p>
                            </div>
                            <img src="/Public/home/img//hover-green.png" class="hover"/>
                        </a>
                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="href"><?php echo ($foot["value"]); ?></div>
</div>
</body>

</html>