/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.13-MariaDB : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `test`;

/*Table structure for table `car` */

DROP TABLE IF EXISTS `car`;

CREATE TABLE `car` (
  `id` varchar(100) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `jianJie` varchar(60) DEFAULT NULL,
  `img` varchar(20) DEFAULT NULL,
  `userId` varchar(66) DEFAULT NULL,
  `p_class` varchar(20) DEFAULT NULL,
  `p_color` varchar(11) DEFAULT '宝石蓝',
  `p_version` varchar(12) DEFAULT '全网通6GB+64GB',
  `p_num` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `car` */

insert  into `car`(`id`,`name`,`price`,`jianJie`,`img`,`userId`,`p_class`,`p_color`,`p_version`,`p_num`) values ('c20459ca-2978-443f-b','荣耀畅玩8A','799','6.09英寸珍珠全面屏 震撼大音量 标配版 ','cw8A.png','7065e571-2e16-2bfd-06c5-eff1c155130d','30','香槟金','全网通6GB+128GB',3),('247563e3-ab6e-fe51-a','荣耀10','2156','限时优惠500','rexiaodanping.png','7065e571-2e16-2bfd-06c5-eff1c155130d','10','宝石蓝','全网通6GB+64GB',2),('4fb439ab-bb4e-d818-d','HUAWEI nova 3','2799','6GB+128GB 全网通版（亮黑色）','nova3.png','00b06059-95a1-1462-9e56-ef523d9eb8cf','50','幻影紫','全网通6GB+64GB',10),('f6ddb4d5-3a12-e99a-9','荣耀8X Max','1499','64GB版限时优惠100 ','ry8x.png','66f7985c-650c-01d6-c850-987ddf2a7292','10','宝石蓝','全网通6GB+64GB',1),('73608d3a-bc0a-704f-0','HUAWEI Mate ','3999','6GB+64GB 全网通版','HUAWEIMate20.png','66f7985c-650c-01d6-c850-987ddf2a7292','40','香槟金','全网通6GB+64GB',1),('025d13bf-5323-80b2-5','荣耀V20','2999','购机享多重权益，稀缺现货，欲购从速 麒麟98','ryv20.png','66f7985c-650c-01d6-c850-987ddf2a7292','10','幻影紫','全网通6GB+64GB',3),('4fb439ab-bb4e-d818-d','HUAWEI nova 3','2799','6GB+64GB 全网通版','nova3.png','f67ce978-e1c9-e83c-ce31-8696149fe118','50','幻影紫','全网通6GB+64GB',2),('c20459ca-2978-443f-b','荣耀畅玩8A','799','6.09英寸珍珠全面屏 震撼大音量 ','cw8A.png','admin','30','宝石蓝','全网通6GB+64GB',2),('c20459ca-2978-443f-b','荣耀畅玩8A','799','6.09英寸珍珠全面屏 震撼大音量 ','cw8A.png','e84f0d72-2ff3-7cae-542c-f11f98d1062f','30','宝石蓝','全网通6GB+64GB',1);

/*Table structure for table `gonggao` */

DROP TABLE IF EXISTS `gonggao`;

CREATE TABLE `gonggao` (
  `g_title` varchar(100) DEFAULT NULL,
  `g_detail` varchar(3000) DEFAULT NULL,
  `g_id` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `gonggao` */

insert  into `gonggao`(`g_title`,`g_detail`,`g_id`) values ('购荣耀旗舰机赢手机大奖 中奖名单公布','附活动规则：\n\n【购荣耀旗舰机赢手机大奖】\n\n1、活动时间：2019年1月17日-2月15日\n\n2、参与方式：活动期间在华为商城购买荣耀旗舰系列机型（荣耀Magic2、荣耀V20、\n荣耀10、荣耀NOTE 10）任意一款， 且发表有效评价，均有机会赢荣耀手机大奖；\n有效评价要求如下：需上传真实有效的评论文字（不少于15个字），且上传1-3张图片，内容可以是您喜欢荣耀品牌产品的理由，购买或使用感受、产品性能评价等；\n\n3、奖品设置：\n一等奖（1名）：荣耀10手机 1台\n二等奖（1名）：荣耀Play手机 1台\n三等奖（1名）：荣耀9i 手机 1台\n四等奖（3名）：荣耀9青春版手机 1台\n总计6台\n\n4、奖品抽取与发放：\n在符合活动要求的用户中由系统随机抽取中奖用户，实物中奖名单将在活动结束后15-20个工作日内于华为商城公告中公布；奖品将于中奖名单公布后15-20个工作日内按默认收货地址寄出。温馨提示：如果您未及时设置默认地址，造成奖品不能发放，将视为您自动放弃获奖资格； 请实物中奖用户保证填写的默认地址准确无误且联系电话保持畅通， 如因用户原因导致奖品发放失败的视为自动放弃奖品。','0864aee3-f0dd-5329-3c23-12fd1rd0g'),('购荣耀10青春版 瓜分2400W开学大礼包','1、活动时间：2019年3月2日-3月12日\n\n2、参与方式：\n\n1）支付抽奖：\n\n成功下单并支付荣耀10青春版，根据系统提示参与抽奖，每人每天3次抽奖机会，分享可增加1次抽奖机会。（如一个订单购买多个商品也是3次抽奖机会），中奖用户取消订单，奖品不予发放，如中奖会有站内信（活动消息）提示。\n\n幸运奖（若干名）：屈臣氏等第三方兑换券 数量有限，赠完即止！\n\n2）晒单抽奖：\n\n评价需要有文字+图片，评价后根据系统提示参与抽奖，可抽奖1次。如中奖会有站内信（活动消息）提示。\n\n温馨提示：支付抽奖活动每人每天最多可抽奖4次（当天支付多个订单不叠加抽奖次数）；支付抽奖和晒单抽奖若在系统提示后手动关闭视为自动放弃抽奖资格，后续无法补抽。\n\n奖品设置：\n\n一等奖（1名）：荣耀10青春版 手机一台\n\n二等奖（5名）：晨光定制礼盒 一个\n\n三等奖（20名）：晨光开学礼包*一份','1864aee3-f0dd-hjf9-3c23-12fdb1d05'),('荣耀畅玩8A 购机赠豪华礼包','1、活动时间：2019年3月1日11:30-3月31日\n\n2、参与方式： 活动期间购荣耀畅玩8A，下单即赠价值268元澳洲红酒兑换码+畅读书城价值50元书券，付款15-20分钟后，PC端请在消息中心-站内信中查看，手机端请在消息中心—活动消息中查看， 如因系统原因导致未收到兑换码，可联系商城客服补发。数量有限，赠完即止！ \n酒仙网兑换码使用规则：\n\n产品名称：澳大利亚丁戈树红标经典红葡萄酒750ml\n\n产品介绍：\n澳大利亚丁戈树红标经典红葡萄酒，一款适合中国人口感的葡萄酒。由成立于1853年的誉嘉集团酿造，东南澳产区多样的气候成就了独特的风格，明亮的深红色酒体，黑莓、黑李子以及新鲜的红色浆果香气，扑鼻而来，单宁成熟细腻，酒体平衡，回味中长。\n\n产品零售价：268元/瓶\n\n1、下载注册酒仙网APP--我的酒仙--商品兑换--去兑换--输入兑换码--兑换；\n\n2、兑换后葡萄酒自动加入购物车，在购物车提交订单填写收货信息，支付19元运费结算，省运费小妙招—再买包邮区任意酒水，立省邮费；\n\n3、每个ID限使用一次，同一收货地址、收货手机号、收货人姓名，默认为同一客户； \n\n4、兑换码有效期至2019年5月31日；\n\n5、因黑龙江、辽宁、吉林、内蒙古、新疆、西藏、甘肃、宁夏温度降低，部分地区葡萄酒暂停发货，如您在使用中，有问题咨询酒仙网客服400-617-9999。\n\n畅读书城价值50元礼券兑换码：\n\n【兑换步骤】打开畅读书城APP→点击左上角头像进入→账户中心→福利兑换→输入兑换码\n\n【注意事项】\n\n1、一个设备一个账号仅能激活一次；\n\n2、兑换后的礼券有效期为7天，请尽快使用；\n\n3、“书券”等同于“礼券”，请知悉；\n\n4、本活动的最终解释权归畅读书城所有。\n\n【客服中心】客服热线：4000-323-881','0864aee3-f0dd-5gh9-3c13-12fhb1d0b'),('购荣耀10青春版 限量赠开学神器','【活动一：购荣耀10青春版赢定制礼盒*】\n\n1、活动时间：2019年2月26日-3月6日\n\n2、参与方式：活动期间在华为商城购买荣耀10青春版且无退换货用户，均有机会赢晨光定制礼盒；\n\n3、奖品设置：\n晨光定制礼盒（30份）：生旦净末丑版（随机赠），请以收到实物为准！\n\n4、奖品抽取与发放：\n在符合活动要求的用户中由系统随机抽取中奖用户，实物中奖名单将在活动结束后15-20个工作日内于华为商城公告中公布；奖品将于中奖名单公布后15-20个工作日内按订单收货地址寄出。','0864bee3-f0dd-3229-3c23-12fdb1d0b');

/*Table structure for table `jifen` */

DROP TABLE IF EXISTS `jifen`;

CREATE TABLE `jifen` (
  `userId` varchar(50) DEFAULT NULL,
  `num` varchar(40) DEFAULT NULL,
  `aaww` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jifen` */

insert  into `jifen`(`userId`,`num`,`aaww`) values (NULL,NULL,'312');

/*Table structure for table `my_order` */

DROP TABLE IF EXISTS `my_order`;

CREATE TABLE `my_order` (
  `id` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `p_name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `jianJie` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `img` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `userId` varchar(50) DEFAULT NULL,
  `my_address` varchar(50) DEFAULT NULL,
  `p_class` varchar(20) DEFAULT NULL,
  `user_name` varchar(11) DEFAULT NULL,
  `user_mobile` varchar(11) DEFAULT NULL,
  `p_color` varchar(11) DEFAULT '宝石蓝',
  `p_version` varchar(20) DEFAULT '全网通6GB+64GB',
  `orderDate` varchar(20) DEFAULT NULL,
  `orderCode` varchar(20) DEFAULT NULL,
  `shifu` varchar(11) DEFAULT NULL,
  `userName` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `my_order` */

insert  into `my_order`(`id`,`p_name`,`price`,`jianJie`,`img`,`userId`,`my_address`,`p_class`,`user_name`,`user_mobile`,`p_color`,`p_version`,`orderDate`,`orderCode`,`shifu`,`userName`) values ('73608d3a-bc0a-704f-0','HUAWEI Mate ','3999','6GB+64GB 全网通版','HUAWEIMate20.png','66f7985c-650c-01d6-c850-987ddf2a7292','河南省郑州市二七区','40','张一','18437892308','香槟金','全网通6GB+64GB','2019-4-22 22:14','1555942446000','3999','hcw123'),('73608d3a-bc0a-704f-0','HUAWEI Mate ','3999','6GB+64GB 全网通版','HUAWEIMate20.png','c9ceaa28-e3ac-e74f-4820-ee0d2f0bf3df','河南省郑州市二七区','40','qq','qq','宝石蓝','全网通6GB+64GB','2019-4-23 12:35','1555994150000','3999','qqqqqq'),('4fb439ab-bb4e-d818-d','HUAWEI nova 3','2799','6GB+64GB 全网通版','nova3.png','f67ce978-e1c9-e83c-ce31-8696149fe118','河南省郑州市二七区','50','霍臣威','18437931129','幻影紫','全网通6GB+64GB','2019-5-2 21:6','1556802360000','5598','hcwhcw'),('73608d3a-bc0a-704f-0','HUAWEI Mate ','3999','6GB+64GB 全网通版','HUAWEIMate20.png','e84f0d72-2ff3-7cae-542c-f11f98d1062f','河南省郑州市二七区','40','lpd','13521598547','宝石蓝','全网通6GB+64GB','2019-5-26 21:19','1558876780000','3999','aaaaaa');

/*Table structure for table `pingjia` */

DROP TABLE IF EXISTS `pingjia`;

CREATE TABLE `pingjia` (
  `userName` varchar(20) DEFAULT NULL,
  `productId` varchar(22) DEFAULT NULL,
  `pingJiaDate` varchar(50) DEFAULT NULL,
  `pingJiaText` varchar(300) DEFAULT NULL,
  `p_id` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pingjia` */

insert  into `pingjia`(`userName`,`productId`,`pingJiaDate`,`pingJiaText`,`p_id`) values ('hcw123','4fb439ab-bb4e-d818-d','Tue Apr 23 2019 09:23:42 GMT+0800 (中国标准时间)','haha','192d2493-07e3-2ba8-hna1-b9750d9adf'),('hcw123','4fb439ab-bb4e-d818-d','Tue Apr 23 2019 09:24:06 GMT+0800 (中国标准时间)','你好啊','192d2493-07e3-dca8-05a1-b9750d9adf'),('hcw123','247563e3-ab6e-fe51-a','Tue Apr 23 2019 11:06:11 GMT+0800 (中国标准时间)','hah','192dhn93-07e3-2ba8-05a1-b9750d9adf'),('qqqqqq','247563e3-ab6e-fe51-a','Tue Apr 23 2019 11:08:26 GMT+0800 (中国标准时间)','qq','192d2493-07e3-2ba8-05a1-b9750d9ahf'),('hcw123','abc081d8-060c-5d3a-6','Thu May 02 2019 21:04:38 GMT+0800 (中国标准时间)','嗨','192d2493-07e3-2ba8-05a1-b9750d9adf'),('aaaaaa','c20459ca-2978-443f-b','Sun May 26 2019 21:18:18 GMT+0800 (中国标准时间)','hao','559f7cc8-04f8-b4a7-5f01-6c4f5b916c');

/*Table structure for table `productlist` */

DROP TABLE IF EXISTS `productlist`;

CREATE TABLE `productlist` (
  `id` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `price` int(12) DEFAULT NULL,
  `jianJie` varchar(50) DEFAULT NULL,
  `img` varchar(33) CHARACTER SET latin1 DEFAULT NULL,
  `p_class` varchar(20) DEFAULT NULL,
  `sales` varchar(500) DEFAULT '0',
  `p_gn` varchar(1000) DEFAULT NULL,
  `kucun` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `productlist` */

insert  into `productlist`(`id`,`name`,`price`,`jianJie`,`img`,`p_class`,`sales`,`p_gn`,`kucun`) values ('247563e3-ab6e-fe51-a','荣耀10',2151,'限时优惠600','rexiaodanping.png','10','9','<img src=\"static/gnImage/201807201627089172057.jpg\" alt=\"\"><img src=\"static/gnImage/201807161541384931006.jpg\" alt=\"\">',0),('5b9d8a68-0c3c-7bfa-0','HUAWEI nova ',2500,'赠保护壳  ','HUAWEInova3.png','50','1','<img src=\"static/gnImage/201810240950266957164.jpg\" alt=\"\"><img src=\"static/gnImage/20181018193448544595.jpg\" alt=\"\">',5423),('f6ddb4d5-3a12-e99a-9','荣耀8X Max',1499,'64GB版限时优惠100 ','ry8x.png','10','2','<img src=\"static/gnImage/201903051903364282126.jpg\" alt=\"\"><img src=\"static/gnImage/201903051903364283176.jpg\" alt=\"\">',42132),('025d13bf-5323-80b2-5','荣耀V20',2999,'购机享多重权益，稀缺现货，欲购从速 麒麟98','ryv20.png','10','1','<img src=\"static/gnImage/201812270946063698573.jpg\" alt=\"\"><img src=\"static/gnImage/201901020852465595292.jpg\" alt=\"\">',5334),('847fa95c-6119-e709-e','HUAWEI P20',4988,'【华为智慧生活节】①下单减100 ②赠超值全','HUAWEIP20.png','20','1','<img src=\"static/gnImage/201807041516058788086.jpg\" alt=\"\"><img src=\"static/gnImage/20180704151605906661.jpg\" alt=\"\">',4324),('c20459ca-2978-443f-b','荣耀畅玩8A',799,'6.09英寸珍珠全面屏 震撼大音量 ','cw8A.png','30','6','<img src=\"static/gnImage/20190110085752619278.jpg\" alt=\"\"><img src=\"static/gnImage/20190110085752596028.jpg\" alt=\"\">',6),('73608d3a-bc0a-704f-0','HUAWEI Mate ',3999,'6GB+64GB 全网通版','HUAWEIMate20.png','40','4','<img src=\"static/gnImage/201810232126067793754.png\" alt=\"\"><img src=\"static/gnImage/201901031257507708644.jpg\" alt=\"\">',5120),('f02b6799-1e3b-2f86-f','荣耀8X',1399,'千元屏霸 高屏占比 2000万AI双摄 ','ry8x.png','10','0','<img src=\"static/gnImage/201809290949024449251.png\" alt=\"\"><img src=\"static/gnImage/20190315210749603174.jpg\" alt=\"\">',52432),('abc081d8-060c-5d3a-6','HUAWEI P20 Pro',4988,'6GB+64GB 全网通版','HUAWEIP20pro.png','20','0','<img src=\"static/gnImage/20180704150807705980.jpg\" alt=\"\"><img src=\"static/gnImage/201807041508095731840.jpg\" alt=\"\">',54343),('4fb439ab-bb4e-d818-d','HUAWEI nova 3',2799,'6GB+64GB 全网通版','nova3.png','50','2','<img src=\"static/gnImage/201810181934489599178.jpg\" alt=\"\"><img src=\"static/gnImage/20181018193449075186.jpg\" alt=\"\">',4232),('219129f3-6419-a3bf-e','荣耀Note10',2699,'全网通 6GB+64GB 幻影蓝 AMOLE','note10.png','10','0','<img src=\"static/gnImage/201812101528044939784.jpg\" alt=\"\"><img src=\"static/gnImage/201812101528042818205.jpg\" alt=\"\">',234432);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userId` varchar(333) NOT NULL,
  `userName` varchar(12) DEFAULT NULL,
  `password` varchar(18) DEFAULT NULL,
  `userImg` varchar(33) DEFAULT NULL,
  `jifen` varchar(22) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`userId`,`userName`,`password`,`userImg`,`jifen`) values ('66f7985c-650c-01d6-c850-987ddf2a7292','hcw123','123456',NULL,'0'),('e84f0d72-2ff3-7cae-542c-f11f98d1062f','aaaaaa','111111',NULL,'0'),('c9ceaa28-e3ac-e74f-4820-ee0d2f0bf3df','qqqqqq','111111',NULL,'0'),('admin','lpd','123456',NULL,'0'),('f67ce978-e1c9-e83c-ce31-8696149fe118','hcwhcw','123456',NULL,'0');

/*Table structure for table `useraddress` */

DROP TABLE IF EXISTS `useraddress`;

CREATE TABLE `useraddress` (
  `userId` varchar(50) DEFAULT NULL,
  `userAddress` varchar(50) DEFAULT '河南省郑州市二七区',
  `userName` varchar(20) DEFAULT NULL,
  `userPhone` varchar(11) DEFAULT NULL,
  `getUserName` varchar(11) DEFAULT NULL,
  `dataid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `useraddress` */

insert  into `useraddress`(`userId`,`userAddress`,`userName`,`userPhone`,`getUserName`,`dataid`) values ('7065e571-2e16-2bfd-06c5-eff1c155130d','北京',NULL,'18437931093','lpd','1555226574000'),('7065e571-2e16-2bfd-06c5-eff1c155130d','11',NULL,'11','12','1555251142000');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
