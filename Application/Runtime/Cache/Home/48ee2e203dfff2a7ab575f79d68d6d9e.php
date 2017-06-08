<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>克拉玛依</title>
		<link rel="stylesheet" type="text/css" href="/Public/home/css/base.css" />
		<link rel="stylesheet" type="text/css" href="/Public/home/css/whd.css" />
	</head>
	<style>
		background: url('<?php echo ($data["menu1_ads"]["image"]); ?>');
	</style>
	<body>
		<div class="container wzl-content">
			<ul class="whd-content">
				<?php if(is_array($data['list'])): $i = 0; $__LIST__ = $data['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<?php if($vo['id'] == 3): ?><a href="<?php echo U('MenuThree/paihang');?>">

							<?php elseif($vo['id'] == 2): ?>
							<a href="<?php echo U('MenuThree/hudong');?>">

							<?php elseif($vo['id'] == 1): ?>
							<a href="<?php echo U('MenuThree/reren');?>"><?php endif; ?>
						<div class="title">
							<img src="<?php echo ($vo["logo"]); ?>" />
							<p><?php echo ($vo["name"]); ?></p>
						</div>
						<?php if($vo['id'] == 1): ?><img src="/Public/home/img/blue.png" class="hover" />

							<?php elseif($vo['id'] == 2): ?>
							<img src="/Public/home/img/yellow.png" class="hover" />

							<?php elseif($vo['id'] == 3): ?>
							<img src="/Public/home/img/orgle.png" class="hover" /><?php endif; ?>

					</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<div class="href"><?php echo ($foot["value"]); ?></div>
		</div>

	</body>

</html>