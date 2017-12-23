/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.5.47 : Database - bnb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `channels` */

CREATE TABLE `channels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `house_id` int(11) NOT NULL COMMENT '房间id',
  `channel` varchar(1000) DEFAULT NULL COMMENT '渠道',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Data for the table `channels` */

insert  into `channels`(`id`,`house_id`,`channel`) values (32,2,'58同城');
insert  into `channels`(`id`,`house_id`,`channel`) values (33,2,'yoke');
insert  into `channels`(`id`,`house_id`,`channel`) values (34,1,'110');
insert  into `channels`(`id`,`house_id`,`channel`) values (35,1,'103');

/*Table structure for table `colors` */

CREATE TABLE `colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `state` tinyint(4) NOT NULL COMMENT '1红色，2橙色，3黄色....',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `colors` */

insert  into `colors`(`id`,`user_id`,`state`,`remark`) values (1,1,1,'啊吳大維');

/*Table structure for table `houses` */

CREATE TABLE `houses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `type_id` int(11) NOT NULL COMMENT '房间类型id',
  `num` varchar(20) DEFAULT NULL COMMENT '房间号',
  `name` varchar(255) DEFAULT NULL COMMENT '房间名称',
  `address` varchar(2000) DEFAULT NULL COMMENT '房间详细地址',
  `status` tinyint(4) DEFAULT '1' COMMENT '1正常，2删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

/*Data for the table `houses` */

insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (1,1,3,'233','测试','成都高新区',1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (2,1,3,'302','阿瓦蒂','阿瓦蒂',1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (3,1,1,'1530','阿瓦蒂','阿瓦蒂',2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (4,1,2,'103','null','高薪',1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (5,1,2,'2',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (6,1,3,'3',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (7,1,1,'444',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (8,1,15,'333',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (9,1,16,'102',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (10,1,16,'103',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (11,1,17,'1133',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (12,1,17,'111',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (13,1,1,'444',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (14,1,16,'103',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (15,1,17,'160',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (16,1,16,'103',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (17,1,16,'102',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (18,1,1,'444',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (19,1,1,'445',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (20,1,1,'446',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (21,1,1,'447',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (22,1,1,'448',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (23,1,1,'445',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (24,1,1,'445',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (25,1,1,'446',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (26,1,1,'447',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (27,1,1,'448',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (28,1,1,'445',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (29,1,1,'446',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (30,1,1,'447',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (31,1,1,'448',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (32,1,1,'447',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (33,1,1,'448',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (34,1,1,'445',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (35,1,1,'446',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (36,1,16,'160',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (37,1,16,'130',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (38,1,15,'223',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (39,1,15,'225',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (40,1,15,'444',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (41,1,18,'1',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (42,1,18,'2',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (43,1,18,'3',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (44,1,19,'1',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (45,1,19,'2',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (46,1,19,'1001','null','高薪',1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (47,1,20,'1',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (48,1,20,'2',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (49,1,20,'3',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (50,1,21,'102',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (51,1,21,'103',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (52,1,21,'106',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (53,1,22,'102',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (54,1,22,'103',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (55,1,22,'150',NULL,NULL,2);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (56,1,23,'102',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (57,1,23,'103',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (58,1,23,'108',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (59,1,21,'102',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (60,1,21,'103',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (61,1,21,'110',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (62,1,24,'106',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (63,1,24,'112',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (64,1,24,'113',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (65,1,25,'105',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (66,1,25,'123',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (67,1,26,'110',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (68,1,26,'120',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (69,1,26,'1103',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (70,1,26,'150',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (71,1,26,'140',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (72,1,26,'160',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (73,1,27,'',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (74,1,27,'',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (75,1,27,'',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (76,1,27,'',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (77,1,27,'',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (78,1,27,'',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (79,1,27,'160',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (80,1,27,'150',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (81,1,27,'120',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (82,1,27,'130',NULL,NULL,1);
insert  into `houses`(`id`,`user_id`,`type_id`,`num`,`name`,`address`,`status`) values (83,1,27,'102',NULL,NULL,1);

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2017_12_06_104229_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'2017_12_07_031331_create_channels_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2017_12_07_032215_create_colors_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2017_12_07_032657_create_houses_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (6,'2017_12_07_033016_create_orders_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (7,'2017_12_07_034319_create_sources_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (8,'2017_12_07_034555_create_types_table',3);
insert  into `migrations`(`id`,`migration`,`batch`) values (10,'2017_12_11_084755_create_statistics_table',4);
insert  into `migrations`(`id`,`migration`,`batch`) values (11,'2017_12_18_063426_create_reg_table',5);
insert  into `migrations`(`id`,`migration`,`batch`) values (12,'2016_06_01_000001_create_oauth_auth_codes_table',6);
insert  into `migrations`(`id`,`migration`,`batch`) values (13,'2016_06_01_000002_create_oauth_access_tokens_table',6);
insert  into `migrations`(`id`,`migration`,`batch`) values (14,'2016_06_01_000003_create_oauth_refresh_tokens_table',6);
insert  into `migrations`(`id`,`migration`,`batch`) values (15,'2016_06_01_000004_create_oauth_clients_table',6);
insert  into `migrations`(`id`,`migration`,`batch`) values (16,'2016_06_01_000005_create_oauth_personal_access_clients_table',6);

/*Table structure for table `oauth_access_tokens` */

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('af027eafc3929d72b32fdb9fbf7519e4d2560ca8c7ea048a73326c85f98ebe73305baf448bade727',NULL,1,'Token Name','[]',0,'2017-12-22 08:12:03','2017-12-22 08:12:03','2018-12-22 08:12:03');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('19fc04e78c4824244761d75b7e083d2b68f3df221848d969cf7d69cc47f58e919b0e4923d9091ced',NULL,1,'Token Name','[]',0,'2017-12-22 08:14:02','2017-12-22 08:14:02','2018-12-22 08:14:02');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('d53feeb17c865d3c1c84b2d0354635b744614583f0a656bbfbc71d2d5348cae3d11c2bb995912928',NULL,1,'Token Name','[]',0,'2017-12-22 08:14:08','2017-12-22 08:14:08','2018-12-22 08:14:08');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('d1e878e81fa422a02ce915a4fffa3fdaa8648de437d9bcf6abdc34fc2b219b45fb11cf17e371ec3c',NULL,1,'Token Name','[]',0,'2017-12-22 08:19:58','2017-12-22 08:19:58','2018-12-22 08:19:58');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('9bb7534569919bd0598c5af12800112ac4f03b7cf79a76bfb9be5f696d487d2441aad7751e782d2a',NULL,1,'Token Name','[]',0,'2017-12-22 08:29:49','2017-12-22 08:29:49','2018-12-22 08:29:49');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('3329608aa86b3260eeddb03785d8476600c862b26fefa64a1b1aa34d85fdabff16e5efce1da91bf0',NULL,1,'Token Name','[]',0,'2017-12-22 08:30:39','2017-12-22 08:30:39','2018-12-22 08:30:39');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('87bcd97344f9281950aa503245ae9846db9e39e04b0a761cac91b439fe3b948bc38ad65a8689d5e9',NULL,1,'Token Name','[]',0,'2017-12-22 09:00:57','2017-12-22 09:00:57','2018-12-22 09:00:57');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('b876c6e17d072f90d000d638cce86164aa3de6d05208007cbb409c83be7a1c8d27b7450c124ca870',NULL,1,'Token secret','[]',0,'2017-12-22 09:04:27','2017-12-22 09:04:27','2018-12-22 09:04:27');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('9d587b6fd12842c2f1b0500b64fb0e57edb560861fd1710ac5b51d42223aa14ba8c93c0e10fa5e67',NULL,1,'Token Name','[]',0,'2017-12-22 09:06:06','2017-12-22 09:06:06','2018-12-22 09:06:06');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('76f53d41064e4a28f7e42c4b17746bd83011c00e45a26b67c129f874b4d54936867dd30331ee8b72',NULL,1,'Token Name','[]',0,'2017-12-22 09:06:29','2017-12-22 09:06:29','2018-12-22 09:06:29');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('f4a452c1657bd2539aaf30e1d30a9f3f9d8579add21b276e69381265099c48573f3a4bb45e020093',NULL,1,'Token Name','[]',0,'2017-12-22 09:08:38','2017-12-22 09:08:38','2018-12-22 09:08:38');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('bc4d2901ddcb7e2eec42e0d29188a0d40dc4f0b4712e12d9a46e75a98c63200f3e68bdf115334128',NULL,1,'Token Name','[]',0,'2017-12-22 09:08:52','2017-12-22 09:08:52','2018-12-22 09:08:52');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('9e500568b93c3766907d87c648d8761065b0df19d32220e1db58defe7245ddc91782713659552b50',NULL,1,'Token Name','[]',0,'2017-12-22 09:54:09','2017-12-22 09:54:09','2018-12-22 09:54:09');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('61704bba9cc65b28f320cf4ad73689e325deb92bf4d4032c2f5ae95d1f81820e5af08fb6e6ed5220',NULL,1,'Token Name','[]',0,'2017-12-22 10:05:29','2017-12-22 10:05:29','2018-12-22 10:05:29');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('0ce32c328c81e88b7f344d43d65d58cd605e719666d021743ac1d0aa01efbf0c6cc9899e3469af1b',NULL,1,'Token Name','[]',0,'2017-12-22 10:12:51','2017-12-22 10:12:51','2018-12-22 10:12:51');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('18b1cce8419e3f70438881830a6f13f708d265cb641ec8873bc0d80616b9b81e9e345d122c2c8cc1',NULL,1,'aa','[]',0,'2017-12-22 10:21:02','2017-12-22 10:21:02','2018-12-22 10:21:02');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('8e42dc41206b6713ce9a2e6924139e6e93816a2d98007640bdefae6b1face1fb5a2cb9268f5e5ddd',NULL,1,'Token Bearer','[]',0,'2017-12-22 10:26:57','2017-12-22 10:26:57','2018-12-22 10:26:57');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('b3c1bbd356a833c2a2be7693edf571e4c179676a509d4b6f476eb17ea2d8a32b5286b874aa43ae3d',NULL,1,'Bearer','[]',0,'2017-12-22 10:27:59','2017-12-22 10:27:59','2018-12-22 10:27:59');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('ec1415f7786b3007296878bc02e2304c3de1c53cf79c8b73fe0508d1bc0ca2debd40631b88bf70e7',NULL,1,'Bearer','[]',0,'2017-12-22 10:28:02','2017-12-22 10:28:02','2018-12-22 10:28:02');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('b70059c7038f9250de02736a6c4e00000b6331b9bfe2dfd55db773d66296258f72ff937f2d91e763',NULL,1,'Bearer','[]',0,'2017-12-22 10:28:03','2017-12-22 10:28:03','2018-12-22 10:28:03');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('184df2874cac1e5b3b78842a774a3ee03d2a496182829e696a38892b53b32ead46f5d2b8efca5545',NULL,1,'Bearer','[]',0,'2017-12-22 10:28:04','2017-12-22 10:28:04','2018-12-22 10:28:04');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('586bb788a6f64d18ed141fd6127b32498106341a3be06cb1ad276a996a07fa5e6c6226af0aa00681',1,1,'Bearer','[]',0,'2017-12-22 10:32:26','2017-12-22 10:32:26','2018-12-22 10:32:26');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('1068aaffc081ef8c548db4be003fdb41ec1a666f5a302945cf4685ed532aa899d941cda3f36f8b45',NULL,1,'Bearer','[]',0,'2017-12-22 10:34:19','2017-12-22 10:34:19','2018-12-22 10:34:19');

/*Table structure for table `oauth_auth_codes` */

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (1,NULL,'Laravel Personal Access Client','sF5JiXqdiuaEHM4v0zIYl3HPYEnxK5UPO8Rmx3uf','http://localhost',1,0,0,'2017-12-22 06:17:58','2017-12-22 06:17:58');
insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (2,NULL,'Laravel Password Grant Client','s3WOPTJKTjnHbo4HFti4nG29AHgrbswlix7GQlNh','http://localhost',0,1,0,'2017-12-22 06:17:58','2017-12-22 06:17:58');

/*Table structure for table `oauth_personal_access_clients` */

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values (1,1,'2017-12-22 06:17:58','2017-12-22 06:17:58');

/*Table structure for table `oauth_refresh_tokens` */

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `orders` */

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL COMMENT '房型id',
  `house_id` int(11) NOT NULL COMMENT '房间id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `status` tinyint(4) NOT NULL COMMENT '1预定，2屏蔽，3取消订单，4取消屏蔽',
  `source_id` int(11) NOT NULL COMMENT '来源id',
  `revenue` decimal(10,2) DEFAULT '0.00' COMMENT '收入',
  `name` varchar(255) DEFAULT NULL COMMENT '入住姓名',
  `phone` varchar(20) DEFAULT NULL COMMENT '入住电话',
  `wx` varchar(20) DEFAULT NULL COMMENT '微信号',
  `remark` varchar(1000) DEFAULT NULL COMMENT '备注',
  `color_id` int(11) NOT NULL COMMENT '颜色id',
  `sta_time` varchar(24) DEFAULT NULL COMMENT '入住时间',
  `com_time` varchar(24) DEFAULT NULL COMMENT '结束时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`id`,`type_id`,`house_id`,`user_id`,`status`,`source_id`,`revenue`,`name`,`phone`,`wx`,`remark`,`color_id`,`sta_time`,`com_time`) values (1,1,1,1,1,1,'100.00',NULL,NULL,NULL,NULL,1,'1513222804','1513353600');
insert  into `orders`(`id`,`type_id`,`house_id`,`user_id`,`status`,`source_id`,`revenue`,`name`,`phone`,`wx`,`remark`,`color_id`,`sta_time`,`com_time`) values (2,1,2,1,1,2,'0.00','测试','18308416565',NULL,NULL,2,'1513222804','1513353600');
insert  into `orders`(`id`,`type_id`,`house_id`,`user_id`,`status`,`source_id`,`revenue`,`name`,`phone`,`wx`,`remark`,`color_id`,`sta_time`,`com_time`) values (3,1,3,1,1,3,'0.00','测试','18308416565',NULL,NULL,3,'1513222804','1513353600');
insert  into `orders`(`id`,`type_id`,`house_id`,`user_id`,`status`,`source_id`,`revenue`,`name`,`phone`,`wx`,`remark`,`color_id`,`sta_time`,`com_time`) values (4,1,4,1,1,4,'0.00','测试','18308416565',NULL,NULL,4,'1513222804','1513353600');
insert  into `orders`(`id`,`type_id`,`house_id`,`user_id`,`status`,`source_id`,`revenue`,`name`,`phone`,`wx`,`remark`,`color_id`,`sta_time`,`com_time`) values (6,1,1,1,1,1,'100.00','awd','18308416590','awdawd','wdawd',1,'1513568404','1513741204');
insert  into `orders`(`id`,`type_id`,`house_id`,`user_id`,`status`,`source_id`,`revenue`,`name`,`phone`,`wx`,`remark`,`color_id`,`sta_time`,`com_time`) values (7,1,2,1,1,1,'100.00','awd','18308416590','awdawd','wdawd',1,'1513568404','1513741204');
insert  into `orders`(`id`,`type_id`,`house_id`,`user_id`,`status`,`source_id`,`revenue`,`name`,`phone`,`wx`,`remark`,`color_id`,`sta_time`,`com_time`) values (8,1,3,1,1,1,'100.00','awd','18308416590','awdawd','wdawd',1,'1513568404','1513734004');
insert  into `orders`(`id`,`type_id`,`house_id`,`user_id`,`status`,`source_id`,`revenue`,`name`,`phone`,`wx`,`remark`,`color_id`,`sta_time`,`com_time`) values (9,1,4,1,1,1,'100.00','awd','18308416590','awdawd','wdawd',1,'1513568404','1513734004');
insert  into `orders`(`id`,`type_id`,`house_id`,`user_id`,`status`,`source_id`,`revenue`,`name`,`phone`,`wx`,`remark`,`color_id`,`sta_time`,`com_time`) values (11,1,1,1,1,1,'100.00','awd','18308416590','awdawd','wdawd',1,'500','600');

/*Table structure for table `reg` */

CREATE TABLE `reg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(24) DEFAULT NULL COMMENT '电话',
  `code` varchar(24) DEFAULT NULL COMMENT '验证码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

/*Data for the table `reg` */

insert  into `reg`(`id`,`phone`,`code`) values (40,'18308416590','zgvh2');

/*Table structure for table `sources` */

CREATE TABLE `sources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `source` varchar(255) DEFAULT NULL COMMENT '来源',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `sources` */

insert  into `sources`(`id`,`user_id`,`source`) values (1,1,'编辑来源');
insert  into `sources`(`id`,`user_id`,`source`) values (2,1,'来源');
insert  into `sources`(`id`,`user_id`,`source`) values (3,1,'来源');
insert  into `sources`(`id`,`user_id`,`source`) values (4,1,'来源');
insert  into `sources`(`id`,`user_id`,`source`) values (5,1,'来源');
insert  into `sources`(`id`,`user_id`,`source`) values (6,1,'来源');

/*Table structure for table `statistics` */

CREATE TABLE `statistics` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `firstday` varchar(24) NOT NULL COMMENT '月',
  `thismonth_come` int(11) NOT NULL DEFAULT '0' COMMENT '本月入住',
  `lastmonth_come` int(11) NOT NULL DEFAULT '0' COMMENT '上月入住',
  `thismonth_revenue` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '本月收入',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `statistics` */

insert  into `statistics`(`id`,`user_id`,`firstday`,`thismonth_come`,`lastmonth_come`,`thismonth_revenue`) values (3,1,'1512057600',2,0,'200.00');
insert  into `statistics`(`id`,`user_id`,`firstday`,`thismonth_come`,`lastmonth_come`,`thismonth_revenue`) values (4,1,'1517414400',2,0,'200.00');
insert  into `statistics`(`id`,`user_id`,`firstday`,`thismonth_come`,`lastmonth_come`,`thismonth_revenue`) values (5,1,'-28800',2,0,'200.00');

/*Table structure for table `types` */

CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(255) DEFAULT NULL COMMENT '房型名称',
  `abbre` varchar(10) DEFAULT NULL COMMENT '简称',
  `status` tinyint(4) DEFAULT '1' COMMENT '1正常，2删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `types` */

insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (1,1,'adw','awd',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (2,1,'套二','套二',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (3,1,'套三','套三',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (13,1,'名字','简介',2);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (14,1,'精装房型','精装',2);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (15,1,'精装房型6666','精装66',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (16,1,'二等分','嗯嗯',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (17,1,'房间12','1231',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (18,1,'名字','简介',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (19,1,'名字1','简介',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (20,1,'名字','简介',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (21,1,'测试二','测试',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (22,1,'测试二','测试',2);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (23,1,'测试二','测试',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (24,1,'测试三','三',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (25,1,'测试四','四',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (26,1,'测试无','五',1);
insert  into `types`(`id`,`user_id`,`name`,`abbre`,`status`) values (27,1,'测试六','六',1);

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL COMMENT '用户标识',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `phone` varchar(20) NOT NULL COMMENT '电话',
  `password` varchar(64) NOT NULL COMMENT '密码',
  `img` varchar(1000) DEFAULT NULL COMMENT '头像',
  `income` decimal(10,2) DEFAULT '0.00' COMMENT '总收入',
  `spending` decimal(10,2) DEFAULT '0.00' COMMENT '总支出',
  `addtime` varchar(24) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`key`,`name`,`phone`,`password`,`img`,`income`,`spending`,`addtime`) values (1,'123456',NULL,'18308416599','e3d912bbe088f77fe562717e6c293ab4',NULL,'0.00','0.00',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
