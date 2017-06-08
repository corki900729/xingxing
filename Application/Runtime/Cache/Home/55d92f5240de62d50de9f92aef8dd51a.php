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
<div class="container kpjd-detail">
    <div class="title"><?php echo ($dati['title']); ?></div>
    <?php if(!empty($dati['content'])): ?><div style="font-size: 16px;margin-left: 8px;"><?php echo (htmlspecialchars_decode($dati['content'])); ?></div><?php endif; ?>
    <div></div>
    <div class="from">
        <?php if(empty($$dati['nickname'])): ?><div style="margin-left: -10px"><span>系统管理员</span><span><?php echo (date('Y-m-d',$dati['time'])); ?></span></div>
            <?php else: ?>
            <div><img src="<?php echo ($dati['headurl']); ?>"/><span><?php echo ($dati['nicename']); ?></span><span><?php echo (date('Y-m-d',$dati['time'])); ?></span></div>
            <div class="visited">
                <p>回答:<span><?php echo ($dati['sum']); ?></span></p>
                <p><img src="/Public/home/img/see.png"/><span><?php echo ($dati['count']); ?></span></p>
            </div><?php endif; ?>
    </div>
    <div class="answer-list">
        <p class="sum">共有<?php echo ($count); ?>个回答</p>
        <ul>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <div class="user">
                    <img src="<?php echo ($vo["headurl"]); ?>"/><?php echo ($vo["nickname"]); ?>
                </div>
                <div class="answer">
                    <?php echo ($vo["daan"]); ?>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <a href="<?php echo U('huida',array('id'=>$dati['id']));?>" class="answer-btn">我要回答</p>
</div>
</body>

</html>