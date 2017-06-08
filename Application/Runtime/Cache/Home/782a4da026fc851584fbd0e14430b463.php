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
		<div class="container kpjd" style="background: #F0F0F0;">
			<ul>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('MenuTwo/dati_info',array('id'=>$vo['id']));?>">
						<li>
							<p class="title"><?php echo ($vo["title"]); ?></p>
							<div class="dtph">
								<div class="dtph-lead">
									<p style="width: 15%;">排行</p>
									<p style="width: 35%;">参赛者</p>
									<p style="width: 25%;">成绩</p>
									<!--<p style="width: 25%;">用时</p>-->
								</div>
								<table border="0" cellspacing="" cellpadding="" bgcolor="#f0f0f0">
									<?php if(empty($vo['daan'])): ?><tr>
											<td colspan="3">还没有人答对，赶快去答题吧！</td>
										</tr>
										<?php else: ?>
										<?php if(is_array($vo['daan'])): $i = 0; $__LIST__ = array_slice($vo['daan'],0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><tr>
												<td width="15%"><?php echo ($i); ?></td>
												<td width="30%"><?php echo ($voo['nickname']); ?></td>
												<td width="25%">答对<?php echo ($voo['dui_count']); ?>题</td>
												<!--<td width="25%">2'30''</td>-->
											</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>


								</table>
							</div>
							<div class="answer">
								<p>回答：<span><?php echo ($vo["sum"]); ?></span></p>
								<p><img src="/Public/home/img/see.png" /><span><?php echo ($vo["count"]); ?></span></p>
							</div>
						</li>
					</a><?php endforeach; endif; else: echo "" ;endif; ?>

			</ul>
			<a href="hd-wyct.html" class="question">+我要出题</p>
		</div>
		<div class="paginate" style="font-size:16px;text-align: center;"><?php echo ($page); ?></div>
	</body>

</html>