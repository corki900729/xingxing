<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>克拉玛依</title>
    <link rel="stylesheet" type="text/css" href="/Public/home/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/Public/home/css/whd.css" />
</head>

<body>
<div class="container qykj" style="background: #EEEEEE;">
    <ul>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <a href="<?php echo U('MenuOne/info',array('id'=>$vo['id']));?>">
                    <div class="img">
                        <img src="<?php echo ($vo["img"]); ?>"/>
                        <span></span>
                    </div>
                    <div class="title">
                        <p><?php echo ($vo["name"]); ?></p>
                        <p><?php echo ($vo["address"]); ?></p>
                    </div>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
</body>

</html>