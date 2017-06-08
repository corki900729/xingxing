<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>克拉玛依</title>
		<link rel="stylesheet" type="text/css" href="/Public/home/css/base.css" />
		<link rel="stylesheet" type="text/css" href="/Public/home/css/whd.css" />
	</head>

	<body>
		<div class="container rrph">
			<ul class="rrph-content">
				<?php if(empty($list)): ?><li style="align: center"><div style="align: center">暂无排行</div></li>

					<?php else: ?>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<div class="num">
								<?php if($i == 1): ?><img src="/Public/home/img/one.png"/>

									<?php elseif($i == 2): ?>
									<img src="/Public/home/img/two.png"/>

									<?php elseif($i == 3): ?>
									<img src="/Public/home/img/three.png"/>

									<?php else: ?>
									<?php echo ($i); endif; ?>

							</div>
							<div class="info">
								<img src="<?php echo ($vo["headurl"]); ?>" class="icon"/>
								<p class="name"><?php echo ($vo["nickname"]); ?><span>共答对<?php echo ($vo["count"]); ?>道题</span></p>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; endif; ?>



			</ul>
		</div>

	</body>

</html>