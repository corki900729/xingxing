<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title>克拉玛依</title>
    <link rel="stylesheet" type="text/css" href="/Public/home/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/home/css/whd.css"/>
    <script src="/Public/home/js/jquery.min.js"></script>
</head>

<body>
<div class="container kphd-detail">
    <div class="img">
        <img style="width: 100%" src="<?php echo ($info["img"]); ?>"/>
    </div>
    <?php if($info["brand_id"] == 1): ?><div class="info">
            <div class="left">
                <ul>
                    <li>
                        活动时间：<?php echo ($info["starttime"]); ?>
                    </li>
                    <li>
                        活动地点：<?php echo ($info["dizhi"]); ?>
                    </li>
                    <li>
                        报名人数：已报名<span><?php echo ($info["renshu"]); ?></span>人
                    </li>
                </ul>
            </div>
            <div class="right">
                <a href="<?php echo U('canjia',array('id'=>$info['id']));?>">我要参加</a>
            </div>
            <div class="clearfix"></div>
        </div><?php endif; ?>
    <div class="news">
        <p class="title"><?php echo ($info["name"]); ?></p>
        <br/>
        <p style="color: #6684a9;font-size: 16px"><?php echo ($info["tel"]); ?></p>
        <div style="font-size: 16px" class="share-visited">
            <div class="visited">
                <p><img src="/Public/home/img/see.png"/><span><?php echo ((isset($info["count"]) && ($info["count"] !== ""))?($info["count"]):0); ?></span></p>
                <p onclick="zan()"><img src="/Public/home/img/zan.png" /><span id="zan"><?php echo ((isset($info["zan"]) && ($info["zan"] !== ""))?($info["zan"]):0); ?></span></p>
            </div>
            <div class="share">
                <h5 style="font-size: 16px">分享到：</h5>
                <div class="bdsharebuttonbox">
                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                </div>
            </div>
        </div>
        <div class="content">
            <?php echo (htmlspecialchars_decode($info["content"])); ?>
        </div>
        <!--<div class="message">-->
            <!--写留言 <img src="/Public/home/img/message-icon.png"/>-->
        <!--</div>-->
    </div>
</div>
</body>
<script>
    window._bd_share_config = {
        "common": {
            "bdSnsKey": {},
            "bdText": "",
            "bdMini": "2",
            "bdMiniList": false,
            "bdPic": "",
            "bdStyle": "1",
            "bdSize": "24"
        },
        "share": {}
    };
    with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
</script>
<script>
    function zan() {
        var id = "<?php echo ($info["id"]); ?>";
        if(id == "" || id == null){
            return false;
        }
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo U('MenuTwo/zan');?>",
            success: function (data) {
                if (data != -1) {
                    $('#zan').html(data)
                } else {
                    alert('点赞失败！');
                }
            }
        });
    }
</script>
</html>