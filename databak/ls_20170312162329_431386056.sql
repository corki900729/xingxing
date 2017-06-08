/* This file is created by MySQLReback 2017-03-12 16:23:29 */
 /* 创建表结构 `lx_about` */
 DROP TABLE IF EXISTS `lx_about`;/* MySQLReback Separation */ CREATE TABLE `lx_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `introduce` text,
  `mintroduce` text,
  `image` varchar(255) DEFAULT NULL,
  `sort` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_about` */
 INSERT INTO `lx_about` VALUES ('1','关于','about','<p><strong>郑州满江红服饰有限公司成立于2000年，经过10余年的经营，现已代理经营国内知名</strong></p><p><strong>品牌15支,在河南和湖北省设立了70多家直营店。</strong></p><p><strong>作为专业的品牌管理公司，多年来潜心致力于做好零售终端的经营管理。对于市场，我们具备真正出色的资源-团队！我们团队的成员善于学习、勇于面对现实，相互信任、团结高效。正是这些优秀的团队成员，使得公司一直在健康、良性的轨道上茁壮成长</strong>。</p><p><br/></p>','1','/Uploads/about_img/2016-08-02/579ffd50e0289.jpg','0'),('2','经营宗旨',' Management tenet','让更多的人更自信！','Let more people more confident！','/Uploads/about_img/2016-08-11/57ac47b384312.png','3'),('4','经营中倡导',' Advocacy','专业化，规范化！','Professional and standardization！','/Uploads/about_img/2016-08-11/57ac47f7e055e.png','2'),('5','价值观','value','健康透明；创新务实；协作竞争；简单与追求卓越！','Transparent and healthy; innovative and practical; collaborative competition; simplicity and the pursuit of excellence!','/Uploads/about_img/2016-08-11/57ac459ca71e1.jpg','1');/* MySQLReback Separation */
 /* 创建表结构 `lx_aboutlc` */
 DROP TABLE IF EXISTS `lx_aboutlc`;/* MySQLReback Separation */ CREATE TABLE `lx_aboutlc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_aboutlc` */
 INSERT INTO `lx_aboutlc` VALUES ('2','2007','高净值个人投资者','VERO MODA、播、PPT、EIN、ZUCZUG/、安娜丽丝、碧瑞芙、简、JETEZO、JNBY'),('3','2008','年经营品牌','VERO MODA、播、PPT、EIN、ZUCZUG/、安娜丽丝、碧瑞芙、简、JETEZO、JNBY'),('4','2009','公开资本市场投资-业务简介','VERO MODA、播、PPT、EIN、ZUCZUG/、安娜丽丝、碧瑞芙、简、JETEZO、JNBY'),('5','2016','0满江红VIP办理规则及持卡礼遇','222');/* MySQLReback Separation */
 /* 创建表结构 `lx_access_token` */
 DROP TABLE IF EXISTS `lx_access_token`;/* MySQLReback Separation */ CREATE TABLE `lx_access_token` (
  `id` int(1) NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;/* MySQLReback Separation */
 /* 插入数据 `lx_access_token` */
 INSERT INTO `lx_access_token` VALUES ('1','yeg4l17CL-tt2RINk62GVg3NPrySWRHJZGXgAy9hviZBmYl6T0OeaGUsBjvSczYn7uGdjJWvegx43iot58nH-X-AeOr2JgOD1zTv5GM8150NYNdACAFQF','1489302883');/* MySQLReback Separation */
 /* 创建表结构 `lx_admin` */
 DROP TABLE IF EXISTS `lx_admin`;/* MySQLReback Separation */ CREATE TABLE `lx_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `regist` varchar(255) DEFAULT NULL COMMENT '注册时间',
  `power` int(11) DEFAULT NULL COMMENT '权限1超级2普通',
  `test` varchar(1) DEFAULT '1' COMMENT 'test',
  `powers` varchar(255) DEFAULT NULL COMMENT '后台注册人员的权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='管理员表';/* MySQLReback Separation */
 /* 插入数据 `lx_admin` */
 INSERT INTO `lx_admin` VALUES ('1','admin','96e79218965eb72c92a549dd5a330112','1463711001','1','1','1,5,7,9,11,13,17,21,23,28,30,32,34,38,'),('19','lf','e10adc3949ba59abbe56e057f20f883e','1488982107','2','1','');/* MySQLReback Separation */
 /* 创建表结构 `lx_adposition` */
 DROP TABLE IF EXISTS `lx_adposition`;/* MySQLReback Separation */ CREATE TABLE `lx_adposition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告位置表id',
  `name` varchar(255) NOT NULL COMMENT '广告位置',
  `size` varchar(255) NOT NULL COMMENT '广告图片的尺寸',
  `ptime` int(11) NOT NULL COMMENT '广告发布时间',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '状态  0：开启  1关闭',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='广告位表';/* MySQLReback Separation */
 /* 插入数据 `lx_adposition` */
 INSERT INTO `lx_adposition` VALUES ('5','菜单3背景图','1920*444','0','0'),('6','菜单2背景图','1920*444','0','0'),('7','菜单1背景图','1920*444','0','0'),('8','首页背景图','1920*444','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lx_ads` */
 DROP TABLE IF EXISTS `lx_ads`;/* MySQLReback Separation */ CREATE TABLE `lx_ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告表ID',
  `title` varchar(255) NOT NULL COMMENT '广告名称',
  `pid` tinyint(4) NOT NULL COMMENT '广告所属位置',
  `ptime` int(11) NOT NULL COMMENT '发布时间',
  `image` varchar(255) NOT NULL COMMENT '广告图片',
  `click` varchar(255) NOT NULL COMMENT '广告点击量',
  `url` varchar(255) NOT NULL COMMENT '广告链接',
  `sort` varchar(255) NOT NULL COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态 0：开启  1：关闭',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='广告表';/* MySQLReback Separation */
 /* 插入数据 `lx_ads` */
 INSERT INTO `lx_ads` VALUES ('23','菜单3','5','1488982681','/Uploads/admin/Ads/2017-03-08/1488982681_442434558c01299a375d.png','','','','0'),('22','菜单2','6','1488982659','/Uploads/admin/Ads/2017-03-08/1488982659_54686967358c0128384c22.png','','','','0'),('21','菜单1','7','1488982621','/Uploads/admin/Ads/2017-03-08/1488982621_88991828958c0125d853fe.png','','','','0'),('20','首页','8','1488982549','/Uploads/admin/Ads/2017-03-08/1488982549_61835606958c0121567b65.jpg','','','','0');/* MySQLReback Separation */
 /* 创建表结构 `lx_arctype` */
 DROP TABLE IF EXISTS `lx_arctype`;/* MySQLReback Separation */ CREATE TABLE `lx_arctype` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `pid` int(11) DEFAULT '0' COMMENT '父级分类ID',
  `type_name` varchar(255) DEFAULT NULL COMMENT '分类名',
  `sort` tinyint(3) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='文章分类表';/* MySQLReback Separation */
 /* 插入数据 `lx_arctype` */
 INSERT INTO `lx_arctype` VALUES ('31','30','4','4'),('2','0','军事','3'),('34','28','3','3'),('29','0','3','3'),('26','25','rrrr','1'),('28','27','2','2'),('18','0','新闻','1'),('27','24','1','1'),('24','0','关于我们','1'),('33','32','4','4'),('35','34','4','4'),('36','18','1','1');/* MySQLReback Separation */
 /* 创建表结构 `lx_article` */
 DROP TABLE IF EXISTS `lx_article`;/* MySQLReback Separation */ CREATE TABLE `lx_article` (
  `arc_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `type_id` int(11) DEFAULT NULL COMMENT '分类ID',
  `title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `arc_pic` varchar(255) DEFAULT NULL COMMENT '文章展示图',
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  `from` varchar(255) DEFAULT NULL COMMENT '来源',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '文章摘要',
  `click` int(11) DEFAULT '0' COMMENT '点击量',
  `content` text NOT NULL COMMENT '内容',
  `pubtime` varchar(255) DEFAULT NULL,
  `c_time` int(11) NOT NULL COMMENT '创建时间',
  `status` tinyint(2) DEFAULT '1' COMMENT '文章状态：0：删除；1展示；',
  `hot` tinyint(2) DEFAULT '0' COMMENT '1 热门 0 not',
  `tuijian` tinyint(2) DEFAULT '0' COMMENT '1 推荐 0 not',
  `jiajing` tinyint(2) DEFAULT '0' COMMENT '1 加精 0 not',
  PRIMARY KEY (`arc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='文章列表';/* MySQLReback Separation */
 /* 插入数据 `lx_article` */
 INSERT INTO `lx_article` VALUES ('16','18','11111','99','/Uploads/admin/Article/2016-06-18/1466232820_833251515764eff403693.jpg','1','1','111','111','2','&lt;p&gt;111111111111111&lt;/p&gt;','','1466232820','0','0','1','1'),('17','18','【满江红·CRZ】Fashion |：新品推荐#雨露均沾#','99','/Uploads/admin/Article/2016-08-04/1470280511_104221367757a2b33f091c0.jpg','','','','自从CRZ新款出了，就独得粉丝恩宠，我告诉粉丝，一定要雨露均沾啊，可你们就是不听呢，就爱我~就爱我~就爱我~
你们爱我也爱你们，带全新系列新品来见，想要去的举手！','4','&lt;p&gt;&lt;a href=&quot;file:///C:/Users/ADMINI~1/AppData/Local/Temp/Rar$EXa0.014/%E9%A1%B9%E7%9B%AE332%EF%BC%9A%E6%BB%A1%E6%B1%9F%E7%BA%A2%20%E4%BB%A3%E7%A0%81/new_detail.html&quot; style=&quot;padding: 0px; margin: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; text-decoration: none; outline: none; display: inline-block; width: 1200px; font-size: medium; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; box-sizing: border-box; border: 0px; font-size: 14px; color: rgb(153, 153, 153); line-height: 26px;&quot;&gt;自从CRZ新款出了，就独得粉丝恩宠，我告诉粉丝，一定要雨露均沾啊，可你们就是不听呢，就爱我~就爱我~就爱我~&lt;br/&gt;你们爱我也爱你们，带全新系列新品来见，想要去的举手！&lt;/p&gt;&lt;/a&gt;&lt;/p&gt;','','1470280511','1','1','1','1');/* MySQLReback Separation */
 /* 插入数据 `lx_article` */
 INSERT INTO `lx_article` VALUES ('21','2','【满江红·CRZ】携手大商新玛特总店回馈力MAX','4','/Uploads/admin/Article/2016-08-02/1470108155_37041583457a011fb35675.jpg','4','4','4','各位，夏天要来了~YONT君羡慕妒忌海底总动员那群主角们可以在海底避暑。陆地生活的我们，暂时以减少衣服与皮肤的接触，从而达到最佳降温效果。
夏季全新系列由年轻新晋华裔设计师Steven Tai 的条纹设计为主笔。条纹褶皱与干净的留白.....','21','&lt;p style=&quot;padding: 0px; margin-top: 10px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; text-indent: 32px; font-size: medium; color: rgb(51, 51, 51); line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;1大廓型的飘逸与醇厚；&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;小廓形的精致与细腻；&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;箱形，四方剪裁呈现的洒脱与自由。&lt;/p&gt;&lt;h5 style=&quot;padding: 0px; margin: 30px 0px 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;自由的“型状”——有“型”的两一种可能&lt;/h5&gt;&lt;p style=&quot;padding: 0px; margin-top: 10px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; text-indent: 32px; font-size: medium; color: rgb(51, 51, 51); line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;相比较精致干练的衬衫，和宽松舒适的T恤，箱形上衣兼具优雅职业与清新舒适，不同类型的版型、印花与材质，晶型不同的服装搭配，效果尤为惊喜。&lt;/p&gt;&lt;h5 style=&quot;padding: 0px; margin: 30px 0px 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;箱形上衣+短裙/裤&lt;/h5&gt;&lt;p style=&quot;padding: 0px; margin-top: 10px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; text-indent: 32px; font-size: medium; color: rgb(51, 51, 51); line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;适合多种场合的箱形上衣和短裙/裤搭配，可精致干练也可清新文艺，凸显放松与舒适。职场中，印花艺术更显夺目光彩；放松时，各种独特的轮廓设计也别出心裁，自由潇洒。&lt;/p&gt;&lt;p&gt;&lt;img class=&quot;nes-pic wow fadeInUp animated animated&quot; data-wow-delay=&quot;0.4s&quot; src=&quot;http://02.com/Public/admin/lib/ueditor/1.4.3/themes/default/images/spacer.gif&quot; style=&quot;background:url(http://02.com/Public/admin/lib/ueditor/1.4.3/lang/zh-cn/images/localimage.png) no-repeat center center;border:1px solid #ddd&quot; word_img=&quot;file:///C:/Users/lx/Desktop/%E9%A1%B9%E7%9B%AE332%EF%BC%9A%E6%BB%A1%E6%B1%9F%E7%BA%A2%20%E4%BB%A3%E7%A0%81/images/pic20.jpg&quot;/&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160802/1470108141103745.jpg&quot; title=&quot;1470108141103745.jpg&quot; alt=&quot;pic22.jpg&quot;/&gt;&lt;/p&gt;&lt;h5 style=&quot;padding: 0px; margin: 30px 0px 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;箱形上衣+长裤&lt;/h5&gt;&lt;p style=&quot;padding: 0px; margin-top: 10px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; text-indent: 32px; font-size: medium; color: rgb(51, 51, 51); line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;裤装的棱角严谨拘束，加上箱形上衣就不一样了，或慵懒，或活泼，裤装也能搭配出百变风格。&lt;/p&gt;&lt;h5 style=&quot;padding: 0px; margin: 30px 0px 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;箱形上衣+牛仔&lt;/h5&gt;&lt;p style=&quot;padding: 0px; margin-top: 10px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; text-indent: 32px; font-size: medium; color: rgb(51, 51, 51); line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;牛仔下装搭配箱形上衣近乎完美。牛仔是“帅气”“明朗”“青春”的代名词，箱形上衣温柔的棱角抹平牛仔的不驯，将“随心”带到更多场合。&lt;/p&gt;&lt;h5 style=&quot;padding: 0px; margin: 30px 0px 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; font-size: 16px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;箱形上衣+裙装&lt;/h5&gt;&lt;p style=&quot;padding: 0px; margin-top: 10px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; text-indent: 32px; font-size: medium; color: rgb(51, 51, 51); line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;以箱形轮廓作为上衣，和裙装相搭配，行走间的飘逸与灵动如春风拂柳，层次感修饰平凡身形，穿出不凡姿态。&lt;/p&gt;&lt;p&gt;&lt;img class=&quot;nes-pic wow fadeInRight animated animated&quot; data-wow-delay=&quot;0.4s&quot; src=&quot;http://02.com/Public/admin/lib/ueditor/1.4.3/themes/default/images/spacer.gif&quot; style=&quot;background:url(http://02.com/Public/admin/lib/ueditor/1.4.3/lang/zh-cn/images/localimage.png) no-repeat center center;border:1px solid #ddd&quot; word_img=&quot;file:///C:/Users/lx/Desktop/%E9%A1%B9%E7%9B%AE332%EF%BC%9A%E6%BB%A1%E6%B1%9F%E7%BA%A2%20%E4%BB%A3%E7%A0%81/images/pic21.jpg&quot;/&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160802/1470108152855730.jpg&quot; title=&quot;1470108152855730.jpg&quot; alt=&quot;pic15.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;padding: 0px; margin-top: 10px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; text-indent: 32px; font-size: medium; color: rgb(51, 51, 51); line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;骄傲的姿态，是每一个细节都彰显自我，生性洒脱，也要活得漂亮，爱上自由，就要有自由的“型状”。有型的另一种可能，就要自己搭配出属于自己的“型”状。每一个骄傲的个体，都能发光发亮。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','2013-06-18 16:31:43','1470280611','1','0','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lx_article_sys` */
 DROP TABLE IF EXISTS `lx_article_sys`;/* MySQLReback Separation */ CREATE TABLE `lx_article_sys` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_article_sys` */
 INSERT INTO `lx_article_sys` VALUES ('1','联系我们','联系我们123','','1467792147','1468285576');/* MySQLReback Separation */
 /* 创建表结构 `lx_attr_tag` */
 DROP TABLE IF EXISTS `lx_attr_tag`;/* MySQLReback Separation */ CREATE TABLE `lx_attr_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr` varchar(255) NOT NULL,
  `ptime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='属性表';/* MySQLReback Separation */
 /* 插入数据 `lx_attr_tag` */
 INSERT INTO `lx_attr_tag` VALUES ('2','颜色','1466222944'),('3','尺寸','1466223486');/* MySQLReback Separation */
 /* 创建表结构 `lx_bimg` */
 DROP TABLE IF EXISTS `lx_bimg`;/* MySQLReback Separation */ CREATE TABLE `lx_bimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `introduce` varchar(255) DEFAULT NULL,
  `mintroduce` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `sort` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_bimg` */
 INSERT INTO `lx_bimg` VALUES ('1','腾讯云技术大讲堂-保驾全民直播时代（教育专场）','李飞','lifei','2','1','/Uploads/Brand_img/2016-08-01/579f1c073eeae.jpg'),('2','李飞','李飞','lifei','1','2','/Uploads/Brand_img/2016-08-01/579f1731efbb6.jpg'),('3','123','123','123','3','123','/Uploads/Brand_img/2016-08-03/57a18ee043172.png'),('4','是对方的身份撒','萨芬萨芬暗示法啊舒服撒发发撒地方萨芬','萨芬萨芬暗示法撒发生','6','1','/Uploads/Brand_img/2016-08-04/57a2a6e3e9719.jpg');/* MySQLReback Separation */
 /* 创建表结构 `lx_brand` */
 DROP TABLE IF EXISTS `lx_brand`;/* MySQLReback Separation */ CREATE TABLE `lx_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `sort` varchar(255) DEFAULT NULL,
  `introduce` varchar(255) DEFAULT NULL,
  `logo2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_brand` */
 INSERT INTO `lx_brand` VALUES ('1','科学生活','snma','/Uploads/admin/Brand/2017-03-09/1489063608_53571033258c14eb900092.png','3','&lt;p&gt;romaxxi一如既往遵循自然环保、服务社会理念，严格挑选符合人体健康与环保材 质的面料与精益求精的品质管理，全力打造一个有爱、有责、有享的时尚企业 。我们乐于与尽责又喜欢美好事业的加盟商共同发展，致力打造全国一类城市销售网络，使romaxxi品牌成为一流商圈绩效显著的知名品牌。&lt;/p&gt;&lt;p&gt;我们的使命：你美、我美、世界美！romaxxi与中国的同行一道，努力打造中国设计时尚品牌，希望设计展示女性帅气与个性魅力的衣服。&lt;/p&gt;&lt;p&gt;&lt;','/Uploads/admin/Brand/2016-08-03/1470190081_80256085257a152017417d.jpg'),('2','焦点科普','meite','/Uploads/admin/Brand/2017-03-09/1489063587_142597067558c14ea3723d4.png','2','&lt;p&gt;romaxxi一如既往遵循自然环保、服务社会理念，严格挑选符合人体健康与环保材 质的面料与精益求精的品质管理，全力打造一个有爱、有责、有享的时尚企业 。我们乐于与尽责又喜欢美好事业的加盟商共同发展，致力打造全国一类城市销售网络，使romaxxi品牌成为一流商圈绩效显著的知名品牌。&lt;/p&gt;&lt;p&gt;我们的使命：你美、我美、世界美！romaxxi与中国的同行一道，努力打造中国设计时尚品牌，希望设计展示女性帅气与个性魅力的衣服。&lt;/p&gt;&lt;p&gt;&lt;','/Uploads/admin/Brand/2016-08-03/1470190099_169866390857a152133692c.jpg'),('3','前沿科技','pp','/Uploads/admin/Brand/2017-03-09/1489063530_122879023158c14e6abe746.png','1','&lt;p&gt;romaxxi一如既往遵循自然环保、服务社会理念，严格挑选符合人体健康与环保材 质的面料与精益求精的品质管理，全力打造一个有爱、有责、有享的时尚企业 。我们乐于与尽责又喜欢美好事业的加盟商共同发展，致力打造全国一类城市销售网络，使romaxxi品牌成为一流商圈绩效显著的知名品牌。&lt;/p&gt;&lt;p&gt;我们的使命：你美、我美、世界美！romaxxi与中国的同行一道，努力打造中国设计时尚品牌，希望设计展示女性帅气与个性魅力的衣服。&lt;/p&gt;&lt;p&gt;&lt;','/Uploads/admin/Brand/2016-08-03/1470190135_16409423357a152379fd18.jpg');/* MySQLReback Separation */
 /* 创建表结构 `lx_canjia` */
 DROP TABLE IF EXISTS `lx_canjia`;/* MySQLReback Separation */ CREATE TABLE `lx_canjia` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `address` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shop2_id` int(11) DEFAULT NULL,
  `tel` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;/* MySQLReback Separation */
 /* 创建表结构 `lx_comment` */
 DROP TABLE IF EXISTS `lx_comment`;/* MySQLReback Separation */ CREATE TABLE `lx_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '评论用户',
  `p_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '评论内容',
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0' COMMENT '是否已读；0：未读；1：已读；',
  `c_time` int(11) DEFAULT NULL COMMENT '评论时间',
  `user_id` int(11) DEFAULT '0',
  `pid` int(11) DEFAULT '0',
  `sex` tinyint(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `flg` tinyint(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='留言表';/* MySQLReback Separation */
 /* 插入数据 `lx_comment` */
 INSERT INTO `lx_comment` VALUES ('35','吧KTV','开始测试的信息，','','15738896272','0','1489305622','3','4','1','郑州','2'),('32','互动','&lt;p&gt;互动&lt;/p&gt;','','','1','1489302765','3','0','','','1'),('33','测试','开始测试','','15738896272','0','1489302855','3','5','2','郑州','2'),('34','开始','开始参加活动','','15738896272','0','1489305535','3','7','2','郑州','2');/* MySQLReback Separation */
 /* 创建表结构 `lx_contact` */
 DROP TABLE IF EXISTS `lx_contact`;/* MySQLReback Separation */ CREATE TABLE `lx_contact` (
  `id` int(11) NOT NULL,
  `content` text,
  `tel` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `x` varchar(255) DEFAULT NULL,
  `y` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_contact` */
 INSERT INTO `lx_contact` VALUES ('1','<h3 class=\"wow fadeInDown animated animated\" data-wow-delay=\"0.4s\" style=\"padding: 0px; margin: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; font-weight: normal; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeInDown; font-size: 14px; color: rgb(102, 102, 102); line-height: 30px; white-space: normal; visibility: visible; animation-delay: 0.4s;\">郑州满江红服饰有限公司成立于2000年，经过10余年的经营，现已代理经营国内知名品牌15支,在河南和湖北省设立了70多家直营店。</h3><h3 class=\"wow fadeInDown animated animated\" data-wow-delay=\"0.4s\" style=\"padding: 0px; margin: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; font-weight: normal; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeInDown; font-size: 14px; color: rgb(102, 102, 102); line-height: 30px; white-space: normal; visibility: visible; animation-delay: 0.4s;\">作为专业的品牌管理公司，多年来潜心致力于做好零售终端的经营管理。对于市场，我们具备真正出色的资源-团队！</h3>','66241286  66241060','66222869','省郑州市商都路5号附5号建业五栋大楼B','450000','113.67311','34.760377');/* MySQLReback Separation */
 /* 创建表结构 `lx_daan` */
 DROP TABLE IF EXISTS `lx_daan`;/* MySQLReback Separation */ CREATE TABLE `lx_daan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dati_id` int(11) NOT NULL,
  `daan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flg` tinyint(1) DEFAULT '-1',
  `user_id` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;/* MySQLReback Separation */
 /* 插入数据 `lx_daan` */
 INSERT INTO `lx_daan` VALUES ('2','2','duia ','1','3','1489292474'),('3','4','这是我的答案','-1','3','1489302395');/* MySQLReback Separation */
 /* 创建表结构 `lx_dati` */
 DROP TABLE IF EXISTS `lx_dati`;/* MySQLReback Separation */ CREATE TABLE `lx_dati` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `sum` int(11) NOT NULL DEFAULT '0',
  `content` text COLLATE utf8_unicode_ci,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flg` tinyint(1) DEFAULT '1',
  `dui` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;/* MySQLReback Separation */
 /* 插入数据 `lx_dati` */
 INSERT INTO `lx_dati` VALUES ('4','新增加的题目','2','1','&lt;p&gt;新增加的题目新增加的题目新增加的题目新增加的题目&lt;/p&gt;&lt;p&gt;新增加的题目新增加的题目新增加的题目新增加的题目新增加的题目&lt;/p&gt;&lt;p&gt;新增加的题目新增加的题目新增加的题目&lt;/p&gt;','1489302355','1','0','0'),('2','这个说法对吗？光合作用是植物把二氧化碳转化为氧气的过程。','14','2','&lt;p&gt;这个说法对吗？光合作用是植物把二氧化碳转化为氧气的过程。这个说法对吗？光合作用是植物把二氧化碳转化为氧气的过程。这个说法对吗？光合作用是植物把二氧化碳转化为氧气的过程。&lt;/p&gt;','1489222067','1','1','0');/* MySQLReback Separation */
 /* 创建表结构 `lx_friends` */
 DROP TABLE IF EXISTS `lx_friends`;/* MySQLReback Separation */ CREATE TABLE `lx_friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `click` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `ptime` int(11) NOT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: 开启   1：关闭',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='友情链接表';/* MySQLReback Separation */
 /* 插入数据 `lx_friends` */
 INSERT INTO `lx_friends` VALUES ('1','百度','/Uploads/admin/Friends/2016-07-07/1467853844_1917693764577dac140ee97.jpg','','https://www.baidu.com/','1467789302','1','0');/* MySQLReback Separation */
 /* 创建表结构 `lx_fuze` */
 DROP TABLE IF EXISTS `lx_fuze`;/* MySQLReback Separation */ CREATE TABLE `lx_fuze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_fuze` */
 INSERT INTO `lx_fuze` VALUES ('1','雒虹','加盟经理','15890070983'),('3','袁玉芹','飞鸟和新酒/avvn、romaxxi','15937134579'),('4','李强','Lily、ENO','15890070983'),('5','王坤','Lily、ENO','186385502117'),('9','邢娟','CRZ、broadcast：播','18603819965'),('10','董子辉','Pancoat（湖北市场）','15378783725');/* MySQLReback Separation */
 /* 创建表结构 `lx_goods` */
 DROP TABLE IF EXISTS `lx_goods`;/* MySQLReback Separation */ CREATE TABLE `lx_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `gtype` tinyint(4) NOT NULL COMMENT '商品分类',
  `describe` varchar(255) NOT NULL COMMENT '描述',
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `ptime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='商品表';/* MySQLReback Separation */
 /* 插入数据 `lx_goods` */
 INSERT INTO `lx_goods` VALUES ('1','翡翠吊坠','1','精品玛瑙翡翠','/Uploads/admin/Goods/2016-06-18/1466232373_16466213445764ee352fca8.jpg','<p>大撒旦撒旦撒打算的阿萨德撒打算打算打算的</p><p>阿斯达斯大撒旦撒打算大</p><p>阿斯打算打算打算</p><p style=\"text-align: center;\"><img alt=\"cang03_03.jpg\" src=\"/ueditor/php/upload/image/20160618/1466232363126960.jpg\" title=\"1466232363126960.jpg\"/></p>','1','','','1466232373'),('2','玉佛','2','打算打算打算打算c','/Uploads/admin/Goods/2016-06-18/1466233457_15644185935764f2712f5d2.jpg','<p>大撒旦撒打算的的sad啊打算打算</p><p>阿斯打算打算大</p><p>阿斯打算大<br/></p>','2','','','1466233457'),('3','11111111111','4','111111111111111','/Uploads/admin/Goods/2016-07-08/1467945890_749816611577f13a22f76f.jpg','<p>111111111111111111<br/></p>','1','','','1467945890'),('4','衣服','4','女士精品衣服！！！','/Uploads/admin/Goods/2016-07-08/1467951341_813126689577f28ed350e1.jpg','<p>三大三大四大撒旦撒打算的</p><p>阿斯打扫大撒旦<br/></p>','1','sdsadasd ','asdsadasdasdas啊三大三萨达','1467951341'),('5','连衣裙','3','1111111111111111','/Uploads/admin/Goods/2016-07-08/1467957930_643127129577f42aa3a62f.jpg','<p>1111111111111111111111<br/></p>','1','','','1467957930');/* MySQLReback Separation */
 /* 创建表结构 `lx_goods_attr` */
 DROP TABLE IF EXISTS `lx_goods_attr`;/* MySQLReback Separation */ CREATE TABLE `lx_goods_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_id` int(11) NOT NULL COMMENT '属性标签id',
  `value` varchar(255) NOT NULL,
  `gid` int(11) NOT NULL COMMENT '商品id',
  `sort` tinyint(4) NOT NULL,
  `ptime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='商品属性表';/* MySQLReback Separation */
 /* 插入数据 `lx_goods_attr` */
 INSERT INTO `lx_goods_attr` VALUES ('1','2','绿色','1','2','0'),('2','2','10寸','2','2','0'),('3','2','绿色','2','1','0'),('5','3','5寸','1','1','1466241054'),('8','2','黑色','1','1','1466392112'),('9','3','6寸','1','2','1466392165'),('10','2','白色','3','14','1467945906'),('11','2','纯白','4','1','1467951356'),('12','2','红色12','5','1','1467957938'),('13','2','白色','5','2','1467969924'),('14','3','X','5','1','1469086101');/* MySQLReback Separation */
 /* 创建表结构 `lx_gtype` */
 DROP TABLE IF EXISTS `lx_gtype`;/* MySQLReback Separation */ CREATE TABLE `lx_gtype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gtype` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_gtype` */
 INSERT INTO `lx_gtype` VALUES ('1','鞋子','0','1'),('2','衣服','0','2'),('3','男鞋','1','1'),('4','女士','2','1');/* MySQLReback Separation */
 /* 创建表结构 `lx_hudong` */
 DROP TABLE IF EXISTS `lx_hudong`;/* MySQLReback Separation */ CREATE TABLE `lx_hudong` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;/* MySQLReback Separation */
 /* 插入数据 `lx_hudong` */
 INSERT INTO `lx_hudong` VALUES ('3','sdf','&lt;p&gt;sdf&lt;/p&gt;','1'),('4','123','&lt;p&gt;123&lt;/p&gt;','3');/* MySQLReback Separation */
 /* 创建表结构 `lx_job` */
 DROP TABLE IF EXISTS `lx_job`;/* MySQLReback Separation */ CREATE TABLE `lx_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job` text,
  `zhize` text,
  `zige` text,
  `image` varchar(255) DEFAULT NULL,
  `flg` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_job` */
 INSERT INTO `lx_job` VALUES ('1','<p><img src=\"/ueditor/php/upload/image/20160802/1470120882806544.png\" title=\"1470120882806544.png\" alt=\"job1.png\"/></p>','<p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">1、以上岗位不限年龄，不限男女;</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">2、只要你热爱服装与时尚，学习能力及抗压性强，就可以申请加入！</p><p><br/></p>','<p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">1、根据店面任务分配，完成个人销售任务；</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">2、做好VIP管理，为各类客户提供最优质的终端服务，提高顾客回购率；</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">3、做好店面形象维护，为顾客提供一个轻松愉悦的购物环境；</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">4、共同营造良好的团队氛围，提升团队合作意识。</p><p><br/></p>','/Uploads/join_img/2016-08-02/57a043cb0f681.jpg','1');/* MySQLReback Separation */
 /* 插入数据 `lx_job` */
 INSERT INTO `lx_job` VALUES ('2','<p><img src=\"/ueditor/php/upload/image/20160802/1470121411938523.png\" title=\"1470121411938523.png\" alt=\"job2.png\"/></p>','<p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">1、根据店面任务分配，完成个人销售任务；</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">2、做好VIP管理，为各类客户提供最优质的终端服务，提高顾客回购率；</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">3、做好店面形象维护，为顾客提供一个轻松愉悦的购物环境；</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">4、共同营造良好的团队氛围，提升团队合作意识。</p><p><br/></p>','<p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">1、18-35岁，高中及以上学历，男女不限；</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">2、热爱服装行业，对时尚有一定的敏感度和认知度；</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &#39;Microsoft YaHei&#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);\">3、有服装商场销售经验者优先考虑，条件优秀者可适当放宽招聘要求。</p><p><br/></p>','/Uploads/join_img/2016-08-02/57a045d3d8486.jpg','2');/* MySQLReback Separation */
 /* 插入数据 `lx_job` */
 INSERT INTO `lx_job` VALUES ('4','&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160802/1470121545573398.png&quot; title=&quot;1470121545573398.png&quot; alt=&quot;job4.png&quot;/&gt;&lt;/p&gt;','&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;1、管理所辖品牌加盟客户的年度订货指标及销售业绩，确保各项目标达成；&lt;/p&gt;&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;2、客户店铺形象指导、监督、维护，确保品牌终端形象符合品牌和公司要求；&lt;/p&gt;&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;3、跟进客户货品结构，结合销售做好分析，及时调整各项政策，确保销售最大、库存最小；&lt;/p&gt;&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;4、关注并提高客户在货品、陈列、人员、技能等方面的专业度，增强竞争优势,确保销售达成；&lt;/p&gt;&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;5、关注客户各项成本、费用，核算盈亏平衡点，提高客户利润；&lt;/p&gt;&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;6、结合公司发展目标，协助市场部经理进行所辖品牌市场拓展工作，完成公司开关店指标。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;1、大专及以上学历，至少一年以上终端零售及管理经验；&lt;/p&gt;&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;2、熟悉终端店铺经营管理，具备色彩搭配、陈列、销售技巧、人员激励管理等技能；&lt;/p&gt;&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style: none; font-family: &amp;#39;Microsoft YaHei&amp;#39;, verdana, Arial, Helvetica, sans-serif; box-sizing: border-box; border: 0px; line-height: 26px; font-size: 14px; color: rgb(102, 102, 102); white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;3、积极主动、讲求效率、乐于接受挑战、能适应快节奏的工作和不定时出差&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','/Uploads/join_img/2016-08-02/57a0465b015f6.jpg','2');/* MySQLReback Separation */
 /* 创建表结构 `lx_join` */
 DROP TABLE IF EXISTS `lx_join`;/* MySQLReback Separation */ CREATE TABLE `lx_join` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `sort` varchar(255) DEFAULT NULL,
  `introduce` varchar(255) DEFAULT NULL,
  `logo2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_join` */
 INSERT INTO `lx_join` VALUES ('1','活动资讯','snma','/Uploads/admin/Join/2017-03-11/1489208979_195450146958c386936e950.png','3','&lt;p&gt;romaxxi一如既往遵循自然环保、服务社会理念，严格挑选符合人体健康与环保材 质的面料与精益求精的品质管理，全力打造一个有爱、有责、有享的时尚企业 。我们乐于与尽责又喜欢美好事业的加盟商共同发展，致力打造全国一类城市销售网络，使romaxxi品牌成为一流商圈绩效显著的知名品牌。&lt;/p&gt;&lt;p&gt;我们的使命：你美、我美、世界美！romaxxi与中国的同行一道，努力打造中国设计时尚品牌，希望设计展示女性帅气与个性魅力的衣服。&lt;/p&gt;&lt;p&gt;&lt;','/Uploads/admin/Brand/2016-08-03/1470190081_80256085257a152017417d.jpg'),('2','科普竞答','meite','/Uploads/admin/Join/2017-03-11/1489208942_154950354258c3866e9bfff.png','2','&lt;p&gt;romaxxi一如既往遵循自然环保、服务社会理念，严格挑选符合人体健康与环保材 质的面料与精益求精的品质管理，全力打造一个有爱、有责、有享的时尚企业 。我们乐于与尽责又喜欢美好事业的加盟商共同发展，致力打造全国一类城市销售网络，使romaxxi品牌成为一流商圈绩效显著的知名品牌。&lt;/p&gt;&lt;p&gt;我们的使命：你美、我美、世界美！romaxxi与中国的同行一道，努力打造中国设计时尚品牌，希望设计展示女性帅气与个性魅力的衣服。&lt;/p&gt;&lt;p&gt;&lt;','/Uploads/admin/Brand/2016-08-03/1470190099_169866390857a152133692c.jpg'),('3','科学文艺','pp','/Uploads/admin/Join/2017-03-11/1489208904_207588549958c386481e13d.png','1','&lt;p&gt;romaxxi一如既往遵循自然环保、服务社会理念，严格挑选符合人体健康与环保材 质的面料与精益求精的品质管理，全力打造一个有爱、有责、有享的时尚企业 。我们乐于与尽责又喜欢美好事业的加盟商共同发展，致力打造全国一类城市销售网络，使romaxxi品牌成为一流商圈绩效显著的知名品牌。&lt;/p&gt;&lt;p&gt;我们的使命：你美、我美、世界美！romaxxi与中国的同行一道，努力打造中国设计时尚品牌，希望设计展示女性帅气与个性魅力的衣服。&lt;/p&gt;&lt;p&gt;&lt;','/Uploads/admin/Brand/2016-08-03/1470190135_16409423357a152379fd18.jpg');/* MySQLReback Separation */
 /* 创建表结构 `lx_join_shop` */
 DROP TABLE IF EXISTS `lx_join_shop`;/* MySQLReback Separation */ CREATE TABLE `lx_join_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `sort` varchar(255) DEFAULT NULL,
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `zan` int(11) DEFAULT '0',
  `time` varchar(255) DEFAULT NULL,
  `starttime` varchar(255) DEFAULT NULL,
  `dizhi` varchar(255) DEFAULT NULL,
  `renshu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_join_shop` */
 INSERT INTO `lx_join_shop` VALUES ('1','2腾讯云技术大讲堂-保驾全民直播时代（教育专场）','2腾讯云技术大讲堂-保驾全民直播时代','2腾讯云技术','2','1','<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; font-size: 30px; white-space: normal; color: rgb(231, 82, 82);\">参与方式：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\">组织动员全区科技、教育等领域的科技工作者、科普志愿者积极行动起来，深入村、社区、学校、幼儿园等，面向广大群众，运用讲座、报告、展示、咨询等形式开展丰富多彩的活动。充分利用井口通讯、广播、电视等媒体开展有关宣传活动。</p><p><br style=\"margin: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; font-size: 30px; white-space: normal; color: rgb(231, 82, 82);\">参与方式：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\">组织动员全区科技、教育等领域的科技工作者、科普志愿者积极行动起来，深入村、社区、学校、幼儿园等，面向广大群众，运用讲座、报告、展示、咨询等形式开展丰富多彩的活动。充分利用井口通讯、广播、电视等媒体开展有关宣传活动。</p><p><br/></p>','/Uploads/Brand_img/2017-03-09/58c162b2d954d.png','','3','0','','','','0'),('3','2腾讯云技术大讲堂-保驾全民直播时代（教育专场','2腾讯云技术大讲堂','2腾讯云技术大讲堂','3','1','<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; font-size: 30px; white-space: normal; color: rgb(231, 82, 82);\">参与方式：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\">组织动员全区科技、教育等领域的科技工作者、科普志愿者积极行动起来，深入村、社区、学校、幼儿园等，面向广大群众，运用讲座、报告、展示、咨询等形式开展丰富多彩的活动。充分利用井口通讯、广播、电视等媒体开展有关宣传活动。</p><p><br style=\"margin: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; font-size: 30px; white-space: normal; color: rgb(231, 82, 82);\">参与方式：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\">组织动员全区科技、教育等领域的科技工作者、科普志愿者积极行动起来，深入村、社区、学校、幼儿园等，面向广大群众，运用讲座、报告、展示、咨询等形式开展丰富多彩的活动。充分利用井口通讯、广播、电视等媒体开展有关宣传活动。</p><p><br/></p>','/Uploads/Brand_img/2017-03-09/58c162ddc4251.jpg','','12','2','','','','0'),('4','2腾讯云技术大讲堂-保驾全民直播时代（教育专场）','2腾讯云技术大讲堂','2腾讯云技术大讲堂','1','1','<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; font-size: 30px; white-space: normal; color: rgb(231, 82, 82);\">参与方式：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\">组织动员全区科技、教育等领域的科技工作者、科普志愿者积极行动起来，深入村、社区、学校、幼儿园等，面向广大群众，运用讲座、报告、展示、咨询等形式开展丰富多彩的活动。充分利用井口通讯、广播、电视等媒体开展有关宣传活动。</p><p><br style=\"margin: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; font-size: 30px; white-space: normal; color: rgb(231, 82, 82);\">参与方式：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\">组织动员全区科技、教育等领域的科技工作者、科普志愿者积极行动起来，深入村、社区、学校、幼儿园等，面向广大群众，运用讲座、报告、展示、咨询等形式开展丰富多彩的活动。充分利用井口通讯、广播、电视等媒体开展有关宣传活动。</p><p><br/></p>','/Uploads/Brand_img/2017-03-09/58c16257e97e6.png','','12','0','','2017-03-11 18:05:27','郑州','1');/* MySQLReback Separation */
 /* 插入数据 `lx_join_shop` */
 INSERT INTO `lx_join_shop` VALUES ('5','组织动员全区科技','组织动员全区科技','组织动员全区科技','1','2','<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; font-size: 30px; white-space: normal; color: rgb(231, 82, 82);\">参与方式：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\">组织动员全区科技、教育等领域的科技工作者、科普志愿者积极行动起来，深入村、社区、学校、幼儿园等，面向广大群众，运用讲座、报告、展示、咨询等形式开展丰富多彩的活动。充分利用井口通讯、广播、电视等媒体开展有关宣传活动。</p><p><br style=\"margin: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; font-size: 30px; white-space: normal; color: rgb(231, 82, 82);\">参与方式：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: PFSCL; color: rgb(102, 102, 102); font-size: 30px; white-space: normal;\">组织动员全区科技、教育等领域的科技工作者、科普志愿者积极行动起来，深入村、社区、学校、幼儿园等，面向广大群众，运用讲座、报告、展示、咨询等形式开展丰富多彩的活动。充分利用井口通讯、广播、电视等媒体开展有关宣传活动。</p><p><br/></p>','/Uploads/_img/2017-03-11/58c3cc2ecbd04.png','','2','0','1489226798','2017-03-11 18:08:34','组织动员全区科技','1');/* MySQLReback Separation */
 /* 插入数据 `lx_join_shop` */
 INSERT INTO `lx_join_shop` VALUES ('6','科学文艺','新闻用来测试','郑州瑞之雪','3','1','&lt;p&gt;测试信息&lt;/p&gt;&lt;p&gt;测试信息&lt;/p&gt;&lt;p&gt;测试信息测试信息测试信息测试信息&lt;/p&gt;&lt;p&gt;测试信息测试信息测试信息测试信息&lt;/p&gt;&lt;p&gt;测试信息测试信息测试信息测试信息测试信息&lt;/p&gt;&lt;p&gt;测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息&lt;/p&gt;&lt;p&gt;测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息&lt;/p&gt;&lt;p&gt;测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息&lt;/p&gt;&lt;p&gt;测试信息测试信息测试信息测试信息测试信息测试信息&lt;/p&gt;&lt;p&gt;测试信息测试信息测试信息测试信息测试信息测试信息测试信息测试信息&lt;/p&gt;','/Uploads/_img/2017-03-12/58c4f2f048cab.png','','3','0','1489302256','','','0'),('7','哈哈哈哈或','新增加的题目','新增加的题目','1','3','&lt;p&gt;新增加的题目&lt;/p&gt;&lt;p&gt;新增加的题目&lt;/p&gt;&lt;p&gt;新增加的题目&lt;/p&gt;&lt;p&gt;新增加的题目&lt;/p&gt;','/Uploads/_img/2017-03-12/58c4f452d124f.png','','2','0','1489302610','2017-03-30 15:09:42','新增加的题目','1');/* MySQLReback Separation */
 /* 创建表结构 `lx_menu` */
 DROP TABLE IF EXISTS `lx_menu`;/* MySQLReback Separation */ CREATE TABLE `lx_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `isshow` int(11) DEFAULT '1' COMMENT '0 不显示  1显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lx_module` */
 DROP TABLE IF EXISTS `lx_module`;/* MySQLReback Separation */ CREATE TABLE `lx_module` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '模块名称',
  `pid` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '父类id',
  `sort` mediumint(6) unsigned NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='模块表';/* MySQLReback Separation */
 /* 插入数据 `lx_module` */
 INSERT INTO `lx_module` VALUES ('1','系统管理','0','1','config','','&#xe62e;'),('2','系统设置','1','1','','Sys/index',''),('3','导航管理','1','1','','Nav/nav_list',''),('4','系统日志','1','1','','Users/admin_log',''),('5','管理员管理','0','2','admin','','&#xe62d;'),('6','管理员列表','5','2','','Users/admin_list',''),('7','视频管理','0','3','video','','&#xe6a4;'),('8','视频列表','7','3','','Video/index',''),('9','相册管理','0','4','picture','','&#xe613;'),('10','相册列表','9','4','','picture/index',''),('11','会员管理','0','5','member','','&#xe60d;'),('12','会员列表','11','5','','Member/member_list',''),('13','广告管理','0','6','ads','','&#xe620;'),('14','广告位置','13','6','','Ads/position',''),('15','广告添加','13','6','','Ads/add',''),('16','广告列表','13','6','','Ads/index',''),('17','文章管理','0','7','article','','&#xe692;'),('18','文章分类','17','7','','Article/artlist',''),('19','文章列表','17','7','','Article/article',''),('20','系统文章','17','7','','Article/sys',''),('21','友情链接管理','0','8','friends','','&#xe692;'),('22','友情链接列表','21','8','','Friends/index',''),('23','商品管理','0','9','product','','&#xe672;'),('24','商品列表','23','9','','Goods/glist',''),('25','商品添加','23','9','','Goods/add',''),('26','属性标签','23','9','','Goods/attr',''),('27','商品分类','23','9','','Goods/gtype',''),('28','留言管理','0','10','message','','&#xe622;'),('29','留言列表','28','10','','Comment/feedback_list',''),('30','招聘管理','0','11','recruit','','&#xe625;'),('31','招聘列表','30','11','','Recruit/index',''),('32','SEO管理','0','12','seo','','&#xe683;'),('33','SEO列表','32','12','','Seo/index',''),('34','模型管理','0','13','model','','&#xe68c;'),('35','模型列表','34','13','','Model/index',''),('36','模块管理','0','14','module','','&#xe68c;'),('37','模块列表','36','14','','',''),('38','数据库备份','0','15','data','','&#xe68c;'),('39','数据库列表','38','0','','Dat/index','');/* MySQLReback Separation */
 /* 创建表结构 `lx_nav` */
 DROP TABLE IF EXISTS `lx_nav`;/* MySQLReback Separation */ CREATE TABLE `lx_nav` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_name` varchar(255) DEFAULT NULL COMMENT '导航名称',
  `pid` int(11) DEFAULT NULL COMMENT '上级id',
  `nav_sort` tinyint(2) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='导航表';/* MySQLReback Separation */
 /* 插入数据 `lx_nav` */
 INSERT INTO `lx_nav` VALUES ('7','22','6','33'),('6','111','0','1');/* MySQLReback Separation */
 /* 创建表结构 `lx_picture` */
 DROP TABLE IF EXISTS `lx_picture`;/* MySQLReback Separation */ CREATE TABLE `lx_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort` int(10) unsigned DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `ctime` int(12) DEFAULT NULL COMMENT '创建时间',
  `description` varchar(255) DEFAULT '',
  `path` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `course_id` (`sort`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='图片表';/* MySQLReback Separation */
 /* 插入数据 `lx_picture` */
 INSERT INTO `lx_picture` VALUES ('6','2','六','0','haha','/Uploads/picture_img/2016-08-05/57a3ebf7f1824.jpg'),('9','4','五','0','111','/Uploads/picture_img/2016-08-05/57a3ebc8c378a.jpg'),('10','3','四','0','222222222223333','/Uploads/picture_img/2016-08-05/57a3ebb228d95.jpg'),('11','5','三','0','','/Uploads/picture_img/2016-08-05/57a3eba8368db.jpg'),('12','6','二','0','','/Uploads/picture_img/2016-08-05/57a3eb8cc140e.jpg'),('13','1','一','0','','/Uploads/picture_img/2016-08-05/57a3eb79b8cd0.jpg');/* MySQLReback Separation */
 /* 创建表结构 `lx_record` */
 DROP TABLE IF EXISTS `lx_record`;/* MySQLReback Separation */ CREATE TABLE `lx_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL COMMENT '用户id',
  `last_login` int(11) DEFAULT NULL COMMENT '登录时间',
  `out_login` int(11) DEFAULT NULL COMMENT '退出时间',
  `ip` varchar(255) DEFAULT NULL COMMENT '登录ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=276 DEFAULT CHARSET=utf8 COMMENT='用户登录退出记录';/* MySQLReback Separation */
 /* 插入数据 `lx_record` */
 INSERT INTO `lx_record` VALUES ('268','1','1488982158','','127.0.0.1'),('267','19','','1488982152','127.0.0.1'),('266','19','1488982124','','127.0.0.1'),('265','1','','1488982113','127.0.0.1'),('264','1','1488982096','','127.0.0.1'),('263','18','','1488982090','127.0.0.1'),('262','18','1488981978','','127.0.0.1'),('261','1','','1488981960','127.0.0.1'),('260','1','1488981474','','127.0.0.1'),('259','17','','1488981398','127.0.0.1'),('258','17','1488981018','','127.0.0.1'),('257','1','','1488981004','127.0.0.1'),('269','1','1489198933','','127.0.0.1'),('270','1','1489288527','','127.0.0.1'),('271','1','','1489299715','127.0.0.1'),('272','','','1489299725','127.0.0.1'),('273','1','1489300893','','127.0.0.1'),('274','1','1489301197','','127.0.0.1'),('275','1','1489304471','','127.0.0.1');/* MySQLReback Separation */
 /* 创建表结构 `lx_recruit` */
 DROP TABLE IF EXISTS `lx_recruit`;/* MySQLReback Separation */ CREATE TABLE `lx_recruit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `posts` varchar(255) NOT NULL COMMENT '岗位',
  `number` int(11) NOT NULL COMMENT '需求人数',
  `money` varchar(255) NOT NULL COMMENT '薪资',
  `phone` varchar(255) NOT NULL COMMENT '联系电话',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `description` text NOT NULL COMMENT '岗位描述',
  `sort` tinyint(4) NOT NULL,
  `ptime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='人才招聘表';/* MySQLReback Separation */
 /* 插入数据 `lx_recruit` */
 INSERT INTO `lx_recruit` VALUES ('2','程序员22','11','3000-5000','13854885488','河南省郑州市郑东新区','<p>职位要求：</p><ol class=\" list-paddingleft-2\" style=\"list-style-type: decimal;\"><li><p>有经验<br/></p></li><li><p>有能力，踏实勤干<br/></p></li></ol>','1','1467861660');/* MySQLReback Separation */
 /* 创建表结构 `lx_seo_rule` */
 DROP TABLE IF EXISTS `lx_seo_rule`;/* MySQLReback Separation */ CREATE TABLE `lx_seo_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `app` varchar(40) NOT NULL,
  `controller` varchar(40) NOT NULL,
  `action` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `seo_keywords` text NOT NULL,
  `seo_description` text NOT NULL,
  `seo_title` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_seo_rule` */
 INSERT INTO `lx_seo_rule` VALUES ('4','模板','Home','Index','index','1','主页','主页','主页','7'),('6','论坛版块页','forum','index','forum','-1','{$forum.title} ','{$forum.title} ','{$forum.title} —— OpenSNS论坛','2'),('7','微博首页','Weibo','Index','index','-1','微博','微博首页','OpenSNS轻量化社交框架','5'),('8','微博详情页','Weibo','Index','weiboDetail','-1','{$weibo.title|op_t},OpenSNS,ox,微博','{$weibo.content|op_t}
','{$weibo.content|op_t}——OpenSNS微博','6'),('9','用户中心','usercenter','index','index','-1','{$user_info.nickname|op_t},OpenSNS','{$user_info.username|op_t}的个人主页','{$user_info.nickname|op_t}的个人主页','3'),('10','会员页面','people','index','index','-1','会员','会员','会员','4'),('11','论坛帖子详情页','forum','index','detail','-1','{$post.title|op_t},论坛,opensns','{$post.title|op_t}','{$post.title|op_t} —— OpenSNS论坛','1'),('12','在线招聘','Home','Join','join','1','在线招聘','在线招聘','在线招聘','0'),('13','商城商品详情页','shop','index','goodsdetail','-1','{$content.goods_name|op_t},商城','{$content.goods_name|op_t}','{$content.goods_name|op_t}——OpenSNS商城','0'),('14','资讯首页','blog','index','index','-1','资讯首页','资讯首页
','资讯——OpenSNS1','0'),('15','资讯列表页','blog','article','lists','-1','{$category.title|op_t}','{$category.title|op_t}','{$category.title|op_t}','0'),('16','资讯文章页','blog','article','detail','-1','{$info.title|op_t}','{$info.title|op_t}','{$info.title|op_t}——OpenSNS2','0'),('17','活动首页','event','index','index','-1','活动','活动首页','活动首页——OpenSNS3','0'),('18','活动详情页','event','index','detail','-1','{$content.title|op_t}','{$content.title|op_t}','{$content.title|op_t}——OpenSNS4','0'),('19','专辑首页','issue','index','index','-1','专辑','专辑首页','专辑首页——OpenSNS5','0'),('20','专辑详情页','issue','index','issuecontentdetail','-1','{$content.title|op_t}','{$content.title|op_t}','{$content.title|op_t}——OpenSNS6','0'),('21','Vip','Home','Vip','vip','1','Vip','Vip','Vip','0'),('22','品牌中心','Home','Brand','brand','1','品牌中心','品牌中心','品牌中心','0'),('23','新闻资讯','Home','News','news','1','新闻资讯','新闻资讯','新闻资讯','0'),('24','关于我们','Home','About','about','1','关于我们','关于我们','关于我们','0'),('25','好吧','好吧','没有','没有','-1','没有','没有','好吧','0'),('26','招商加盟','home','Zhao','zhao','1','招商加盟2','招商加盟3','招商加盟1','0'),('27','联系我们','home','Contact','contact','1','联系我们','联系我们','联系我们','0');/* MySQLReback Separation */
 /* 创建表结构 `lx_shop` */
 DROP TABLE IF EXISTS `lx_shop`;/* MySQLReback Separation */ CREATE TABLE `lx_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `sort` varchar(255) DEFAULT NULL,
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `zan` int(11) DEFAULT '0',
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_shop` */
 INSERT INTO `lx_shop` VALUES ('6','前沿客户','前沿客户','前沿客户','3','1','<p>前沿客户</p>','/Uploads/Brand_img/2017-03-12/58c4f0dcb3295.png','','2','2','1489301836'),('7','测试信息','测试信息','测试信息','1','2','<p>测试信息</p><p>测试信息</p><p>测试信息</p><p>测试信息</p><p>测试信息</p><p>测试信息</p><p>测试信息</p><p>测试信息</p>','/Uploads/Brand_img/2017-03-12/58c4f2088152d.png','','1','0','1489302048'),('10','科普焦点新闻','这是科普焦点的新闻介绍','郑州瑞之雪网络科技有限公司','2','1','&lt;p&gt;郑州瑞之雪网络科技有限公司&lt;/p&gt;&lt;p&gt;郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司&lt;/p&gt;&lt;p&gt;郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司&lt;/p&gt;&lt;p&gt;郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司&lt;/p&gt;&lt;p&gt;郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司&lt;/p&gt;&lt;p&gt;郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司郑州瑞之雪网络科技有限公司&lt;/p&gt;','/Uploads/Brand_img/2017-03-12/58c4fbff6c6bf.png','','0','0','1489304575'),('11','测试文章','测试文章','测试文章','1','2','&lt;p&gt;测试文章测试文章测试文章测试文章&lt;/p&gt;','/Uploads/Brand_img/2017-03-12/58c4fc575ed50.png','','0','0','1489304663');/* MySQLReback Separation */
 /* 创建表结构 `lx_system` */
 DROP TABLE IF EXISTS `lx_system`;/* MySQLReback Separation */ CREATE TABLE `lx_system` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '显示名称',
  `value` text NOT NULL COMMENT '显示内容',
  `type` int(11) DEFAULT NULL COMMENT '类型;1:input;2:text;3:文本编辑框；30：图片',
  `is_show` tinyint(2) DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='系统设置表';/* MySQLReback Separation */
 /* 插入数据 `lx_system` */
 INSERT INTO `lx_system` VALUES ('2','网站名称','克拉玛依油城','1','1'),('1','LOGO','/Uploads/admin/Sys/2017-03-08/1488980456_196584442858c009e8c98c7.png','30','1'),('3','网站底部','克拉玛依油城数据有限公司技术支持','1','1'),('4','菜单1','微专栏','1','1'),('5','菜单2','微活动','1','1'),('6','菜单3','微互动','1','1');/* MySQLReback Separation */
 /* 创建表结构 `lx_user` */
 DROP TABLE IF EXISTS `lx_user`;/* MySQLReback Separation */ CREATE TABLE `lx_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户名',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `add_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `add_ip` varchar(255) DEFAULT NULL COMMENT '注册IP',
  `last_time` int(11) DEFAULT NULL COMMENT '最后登录时间',
  `last_ip` varchar(255) DEFAULT NULL COMMENT '最后登录IP',
  `status` int(1) DEFAULT '1' COMMENT '状态 1正常 2封停',
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='用户表';/* MySQLReback Separation */
 /* 插入数据 `lx_user` */
 INSERT INTO `lx_user` VALUES ('8','123','d0970714757783e6cf17b26fb8e2298f','1467881922','','','','1',''),('10','','','','','','','1',''),('11','','','','','','','1','');/* MySQLReback Separation */
 /* 创建表结构 `lx_user_info` */
 DROP TABLE IF EXISTS `lx_user_info`;/* MySQLReback Separation */ CREATE TABLE `lx_user_info` (
  `uid` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `sex` int(11) DEFAULT '1' COMMENT '性别 1男  2 女 3 保密',
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `litpic` varchar(255) DEFAULT NULL COMMENT '头像',
  `qianming` varchar(255) DEFAULT NULL COMMENT '签名',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户详情表';/* MySQLReback Separation */
 /* 插入数据 `lx_user_info` */
 INSERT INTO `lx_user_info` VALUES ('8','15890052556','123@qq.com','1','','','');/* MySQLReback Separation */
 /* 创建表结构 `lx_users` */
 DROP TABLE IF EXISTS `lx_users`;/* MySQLReback Separation */ CREATE TABLE `lx_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `headurl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;/* MySQLReback Separation */
 /* 插入数据 `lx_users` */
 INSERT INTO `lx_users` VALUES ('3','李飞  ','http://wx.qlogo.cn/mmopen/vA5cuOsQI5QPQj0G5q76AExJMSIibAkjG5CtevNNxRTvagr6O9tFziajibeBKDYUold2ehZpFm4AcTYgLedLprMyREg65ibcq8VU/0','1','oDdE1wN3nyk-N0Cafd8qu35Ci-2Y');/* MySQLReback Separation */
 /* 创建表结构 `lx_video` */
 DROP TABLE IF EXISTS `lx_video`;/* MySQLReback Separation */ CREATE TABLE `lx_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL DEFAULT '',
  `ctime` int(12) NOT NULL COMMENT '创建时间',
  `description` varchar(64) NOT NULL DEFAULT '',
  `path` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `course_id` (`sort`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='视频表';/* MySQLReback Separation */
 /* 插入数据 `lx_video` */
 INSERT INTO `lx_video` VALUES ('7','11','123','1467614955','1111111111111111111111','/Uploads/video_img/2016-07-04/577a06f6abf68.mp4'),('6','12','感受感受','1465271549','车道或实地','/Uploads/video_img/2016-06-18/5764c6a8a4ecf.mp4');/* MySQLReback Separation */
 /* 创建表结构 `lx_vip` */
 DROP TABLE IF EXISTS `lx_vip`;/* MySQLReback Separation */ CREATE TABLE `lx_vip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `sort` varchar(255) DEFAULT NULL,
  `introduce` varchar(255) DEFAULT NULL,
  `logo2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_vip` */
 INSERT INTO `lx_vip` VALUES ('1','热人排行','snma','/Uploads/admin/Vip/2017-03-11/1489229268_21155141858c3d5d487bea.png','3','&lt;p&gt;romaxxi一如既往遵循自然环保、服务社会理念，严格挑选符合人体健康与环保材 质的面料与精益求精的品质管理，全力打造一个有爱、有责、有享的时尚企业 。我们乐于与尽责又喜欢美好事业的加盟商共同发展，致力打造全国一类城市销售网络，使romaxxi品牌成为一流商圈绩效显著的知名品牌。&lt;/p&gt;&lt;p&gt;我们的使命：你美、我美、世界美！romaxxi与中国的同行一道，努力打造中国设计时尚品牌，希望设计展示女性帅气与个性魅力的衣服。&lt;/p&gt;&lt;p&gt;&lt;','/Uploads/admin/Brand/2016-08-03/1470190081_80256085257a152017417d.jpg'),('2','有奖互动','meite','/Uploads/admin/Vip/2017-03-11/1489229236_46311352258c3d5b43456a.png','2','&lt;p&gt;romaxxi一如既往遵循自然环保、服务社会理念，严格挑选符合人体健康与环保材 质的面料与精益求精的品质管理，全力打造一个有爱、有责、有享的时尚企业 。我们乐于与尽责又喜欢美好事业的加盟商共同发展，致力打造全国一类城市销售网络，使romaxxi品牌成为一流商圈绩效显著的知名品牌。&lt;/p&gt;&lt;p&gt;我们的使命：你美、我美、世界美！romaxxi与中国的同行一道，努力打造中国设计时尚品牌，希望设计展示女性帅气与个性魅力的衣服。&lt;/p&gt;&lt;p&gt;&lt;','/Uploads/admin/Brand/2016-08-03/1470190099_169866390857a152133692c.jpg'),('3','热文排行','pp','/Uploads/admin/Vip/2017-03-11/1489229200_57170365058c3d5908ce40.png','1','&lt;p&gt;romaxxi一如既往遵循自然环保、服务社会理念，严格挑选符合人体健康与环保材 质的面料与精益求精的品质管理，全力打造一个有爱、有责、有享的时尚企业 。我们乐于与尽责又喜欢美好事业的加盟商共同发展，致力打造全国一类城市销售网络，使romaxxi品牌成为一流商圈绩效显著的知名品牌。&lt;/p&gt;&lt;p&gt;我们的使命：你美、我美、世界美！romaxxi与中国的同行一道，努力打造中国设计时尚品牌，希望设计展示女性帅气与个性魅力的衣服。&lt;/p&gt;&lt;p&gt;&lt;','/Uploads/admin/Brand/2016-08-03/1470190135_16409423357a152379fd18.jpg');/* MySQLReback Separation */
 /* 创建表结构 `lx_zhao` */
 DROP TABLE IF EXISTS `lx_zhao`;/* MySQLReback Separation */ CREATE TABLE `lx_zhao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titley` varchar(255) DEFAULT NULL,
  `contenty` text,
  `titlet` varchar(255) DEFAULT NULL,
  `contentt` text,
  `titlez` varchar(255) DEFAULT NULL,
  `contentz` text,
  `titleq` varchar(255) DEFAULT NULL,
  `contentq` text,
  `titled` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lx_zhao` */
 INSERT INTO `lx_zhao` VALUES ('1','加盟优势','<p>加盟部团队拥有丰富的终端销售和管理经验，善于学习，勇于挑战，不断创新，以顾客和市场为导向，用真诚的态度、专业的技术协助加盟客户做好店铺营运管理！</p>','加盟条件','<p><span style=\"font-size: 12px; white-space: pre-wrap; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(89, 89, 89);\">1.热爱服装行业，并将服装零售行业作为自己的事业，</span></p><p><span style=\"color: rgb(89, 89, 89);\"><span style=\"color: rgb(34, 34, 34); font-size: 12px; white-space: pre-wrap; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">全身心的投入经营，</span><span style=\"color: rgb(34, 34, 34); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 12px; white-space: pre-wrap;\">并且拥有正确的经营理念和价值观，</span></span></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 12px; white-space: pre-wrap; color: rgb(89, 89, 89);\">能与时俱进，适应市场及顾客的变化。</span></p><p><span style=\"font-size: 12px; white-space: pre-wrap; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; color: rgb(89, 89, 89);\">2 .在当地一流商圈、核心位置（商场边厅、专卖店一流位置），</span></p><p><span style=\"color: rgb(89, 89, 89);\"><span style=\"color: rgb(34, 34, 34); font-size: 12px; white-space: pre-wrap; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;\">实际营业面积80平以上，</span><span style=\"color: rgb(34, 34, 34); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 12px; white-space: pre-wrap;\">开设正规专卖店，形象和运营上</span></span></p><p><span style=\"font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 12px; white-space: pre-wrap; color: rgb(89, 89, 89);\">和公司保持一致，并接受公司统一指导和监督。</span></p><p><br/></p>','服务支持','<p>开业前的指导（位置选择、成本核算、运营建议等等）；</p><p>根据实际情况做专业的指导：货品组合、人员培训、陈列指导；</p><p>日常跟踪：关注日常店铺营运情况，对店、货、人做及时的跟进指导；</p><p><br/></p>','服务支持','<p>目前可加盟的品牌：</p><p>Lily、broadcas：播、ENO、CRZ、飞鸟和新酒/avvn、romaxxi诺玛西、</p><p>Pancoat盼酷（仅限湖北市场）</p><p><br/></p>','河南省所有地级空白市场招商中','0371-66241060-8026/8028');/* MySQLReback Separation */