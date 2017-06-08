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

<body>
<div class="container rwph" style="background: #EEEEEE;">
    <ul class="rwph-content">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('MenuTwo/info',array('id'=>$vo['id']));?>">
                <li>
                    <div class="left">
                        <img src="<?php echo ($vo["img"]); ?>"/>
                        <span></span>
                    </div>
                    <div class="info">
                        <div class="title"><?php echo ($vo["name"]); ?></div>
                        <div class="other">
                            <p><img src="/Public/home/img/see.png"/><?php echo ($vo["count"]); ?></p>
                            <?php if($vo['brand_id'] == 1): ?><p><img src="/Public/home/img/wtx-time.png"/><span><?php echo (mb_substr($vo["starttime"],0,10,'utf-8')); ?></span></p>
                                <?php elseif($vo['brand_id'] == 3): ?>
                                <p><img src="/Public/home/img/wtx-time.png"/><span><?php echo (date('Y-m-d',$vo["time"])); ?></span></p><?php endif; ?>

                        </div>
                    </div>
                </li>
            </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
</body>

</html>