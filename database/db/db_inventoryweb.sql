/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - db_inventoryweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_inventoryweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_inventoryweb`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2019_08_19_000000_create_failed_jobs_table',1),
(2,'2019_12_14_000001_create_personal_access_tokens_table',1),
(3,'2022_10_31_061811_create_menu_table',1),
(4,'2022_11_01_041110_create_table_role',1),
(5,'2022_11_01_083314_create_table_user',1),
(6,'2022_11_03_023905_create_table_submenu',1),
(7,'2022_11_03_064417_create_tbl_akses',1),
(8,'2022_11_08_024215_create_tbl_web',1),
(9,'2022_11_15_131148_create_tbl_jenisbarang',2),
(10,'2022_11_15_173700_create_tbl_satuan',3),
(11,'2022_11_15_180434_create_tbl_merk',4),
(12,'2022_11_16_120018_create_tbl_appreance',5),
(13,'2022_11_25_141731_create_tbl_barang',6),
(14,'2022_11_26_011349_create_tbl_customer',7),
(16,'2022_11_28_151108_create_tbl_barangmasuk',8),
(17,'2022_11_30_115904_create_tbl_barangkeluar',9);

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `tbl_akses` */

DROP TABLE IF EXISTS `tbl_akses`;

CREATE TABLE `tbl_akses` (
  `akses_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(255) DEFAULT NULL,
  `submenu_id` varchar(255) DEFAULT NULL,
  `othermenu_id` varchar(255) DEFAULT NULL,
  `role_id` varchar(255) NOT NULL,
  `akses_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`akses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=754 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_akses` */

insert  into `tbl_akses`(`akses_id`,`menu_id`,`submenu_id`,`othermenu_id`,`role_id`,`akses_type`,`created_at`,`updated_at`) values 
(368,'1667444041',NULL,NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(369,'1667444041',NULL,NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(370,'1667444041',NULL,NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(371,'1667444041',NULL,NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(372,'1668509889',NULL,NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(373,'1668509889',NULL,NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(374,'1668509889',NULL,NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(375,'1668509889',NULL,NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(377,'1668510437',NULL,NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(378,'1668510437',NULL,NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(379,'1668510437',NULL,NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(381,'1668510568',NULL,NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(382,'1668510568',NULL,NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(383,'1668510568',NULL,NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(384,NULL,'9',NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(385,NULL,'9',NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(386,NULL,'9',NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(387,NULL,'9',NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(396,NULL,'10',NULL,'3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(397,NULL,'10',NULL,'3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(398,NULL,'10',NULL,'3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(399,NULL,'10',NULL,'3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(417,NULL,NULL,'2','3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(418,NULL,NULL,'3','3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(419,NULL,NULL,'4','3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(420,NULL,NULL,'5','3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(421,NULL,NULL,'6','3','view','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(422,NULL,NULL,'1','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(423,NULL,NULL,'2','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(424,NULL,NULL,'3','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(425,NULL,NULL,'4','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(426,NULL,NULL,'5','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(427,NULL,NULL,'6','3','create','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(428,NULL,NULL,'1','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(429,NULL,NULL,'2','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(430,NULL,NULL,'3','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(431,NULL,NULL,'4','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(432,NULL,NULL,'5','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(433,NULL,NULL,'6','3','update','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(434,NULL,NULL,'1','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(435,NULL,NULL,'2','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(436,NULL,NULL,'3','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(437,NULL,NULL,'4','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(438,NULL,NULL,'5','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(439,NULL,NULL,'6','3','delete','2022-11-24 13:08:11','2022-11-24 13:08:11'),
(476,NULL,'21',NULL,'3','view','2022-11-30 12:59:47','2022-11-30 12:59:47'),
(477,NULL,'22',NULL,'3','view','2022-11-30 12:59:48','2022-11-30 12:59:48'),
(478,NULL,'23',NULL,'3','view','2022-11-30 12:59:48','2022-11-30 12:59:48'),
(479,NULL,'21',NULL,'3','create','2022-11-30 13:00:24','2022-11-30 13:00:24'),
(480,NULL,'21',NULL,'3','update','2022-11-30 13:00:25','2022-11-30 13:00:25'),
(481,NULL,'21',NULL,'3','delete','2022-11-30 13:00:26','2022-11-30 13:00:26'),
(482,NULL,'22',NULL,'3','delete','2022-11-30 13:00:27','2022-11-30 13:00:27'),
(483,NULL,'22',NULL,'3','update','2022-11-30 13:00:28','2022-11-30 13:00:28'),
(484,NULL,'22',NULL,'3','create','2022-11-30 13:00:29','2022-11-30 13:00:29'),
(485,NULL,'23',NULL,'3','create','2022-11-30 13:00:30','2022-11-30 13:00:30'),
(486,NULL,'23',NULL,'3','update','2022-11-30 13:00:30','2022-11-30 13:00:30'),
(487,NULL,'23',NULL,'3','delete','2022-11-30 13:00:31','2022-11-30 13:00:31'),
(488,'1667444041',NULL,NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(489,'1667444041',NULL,NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(490,'1667444041',NULL,NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(491,'1667444041',NULL,NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(493,'1668509889',NULL,NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(494,'1668509889',NULL,NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(495,'1668509889',NULL,NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(501,'1668510437',NULL,NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(502,'1668510437',NULL,NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(503,'1668510437',NULL,NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(505,'1668510568',NULL,NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(506,'1668510568',NULL,NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(507,'1668510568',NULL,NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(508,NULL,'9',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(509,NULL,'9',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(510,NULL,'9',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(511,NULL,'9',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(516,NULL,'21',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(517,NULL,'21',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(518,NULL,'21',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(519,NULL,'21',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(520,NULL,'10',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(521,NULL,'10',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(522,NULL,'10',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(523,NULL,'10',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(528,NULL,'22',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(529,NULL,'22',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(530,NULL,'22',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(531,NULL,'22',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(536,NULL,'23',NULL,'4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(537,NULL,'23',NULL,'4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(538,NULL,'23',NULL,'4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(539,NULL,'23',NULL,'4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(545,NULL,NULL,'2','4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(546,NULL,NULL,'3','4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(547,NULL,NULL,'4','4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(548,NULL,NULL,'5','4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(549,NULL,NULL,'6','4','view','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(550,NULL,NULL,'1','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(551,NULL,NULL,'2','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(552,NULL,NULL,'3','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(553,NULL,NULL,'4','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(554,NULL,NULL,'5','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(555,NULL,NULL,'6','4','create','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(556,NULL,NULL,'1','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(557,NULL,NULL,'2','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(558,NULL,NULL,'3','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(559,NULL,NULL,'4','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(560,NULL,NULL,'5','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(561,NULL,NULL,'6','4','update','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(562,NULL,NULL,'1','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(563,NULL,NULL,'2','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(564,NULL,NULL,'3','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(565,NULL,NULL,'4','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(566,NULL,NULL,'5','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(567,NULL,NULL,'6','4','delete','2022-12-06 09:34:31','2022-12-06 09:34:31'),
(570,'1667444041',NULL,NULL,'1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(571,'1667444041',NULL,NULL,'1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(572,'1667444041',NULL,NULL,'1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(573,'1667444041',NULL,NULL,'1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(574,'1668509889',NULL,NULL,'1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(575,'1668509889',NULL,NULL,'1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(576,'1668509889',NULL,NULL,'1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(577,'1668509889',NULL,NULL,'1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(579,'1668510437',NULL,NULL,'1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(580,'1668510437',NULL,NULL,'1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(581,'1668510437',NULL,NULL,'1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(583,'1668510568',NULL,NULL,'1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(584,'1668510568',NULL,NULL,'1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(585,'1668510568',NULL,NULL,'1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(586,NULL,'9',NULL,'1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(587,NULL,'9',NULL,'1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(588,NULL,'9',NULL,'1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(589,NULL,'9',NULL,'1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(590,NULL,'21',NULL,'1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(591,NULL,'21',NULL,'1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(592,NULL,'21',NULL,'1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(593,NULL,'21',NULL,'1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(598,NULL,'10',NULL,'1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(599,NULL,'10',NULL,'1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(600,NULL,'10',NULL,'1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(601,NULL,'10',NULL,'1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(602,NULL,'22',NULL,'1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(603,NULL,'22',NULL,'1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(604,NULL,'22',NULL,'1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(605,NULL,'22',NULL,'1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(606,NULL,'23',NULL,'1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(607,NULL,'23',NULL,'1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(608,NULL,'23',NULL,'1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(609,NULL,'23',NULL,'1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(610,NULL,NULL,'1','1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(611,NULL,NULL,'2','1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(612,NULL,NULL,'3','1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(613,NULL,NULL,'4','1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(614,NULL,NULL,'5','1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(615,NULL,NULL,'6','1','view','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(616,NULL,NULL,'1','1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(617,NULL,NULL,'2','1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(618,NULL,NULL,'3','1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(619,NULL,NULL,'4','1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(620,NULL,NULL,'5','1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(621,NULL,NULL,'6','1','create','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(622,NULL,NULL,'1','1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(623,NULL,NULL,'2','1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(624,NULL,NULL,'3','1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(625,NULL,NULL,'4','1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(626,NULL,NULL,'5','1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(627,NULL,NULL,'6','1','update','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(628,NULL,NULL,'1','1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(629,NULL,NULL,'2','1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(630,NULL,NULL,'3','1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(631,NULL,NULL,'4','1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(632,NULL,NULL,'5','1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(633,NULL,NULL,'6','1','delete','2023-10-04 14:59:09','2023-10-04 14:59:09'),
(634,'1668509889',NULL,NULL,'4','view','2023-10-04 14:59:14','2023-10-04 14:59:14'),
(639,'1667444041',NULL,NULL,'2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(640,'1667444041',NULL,NULL,'2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(641,'1667444041',NULL,NULL,'2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(642,'1667444041',NULL,NULL,'2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(643,'1668509889',NULL,NULL,'2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(644,'1668509889',NULL,NULL,'2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(645,'1668509889',NULL,NULL,'2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(646,'1668509889',NULL,NULL,'2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(648,'1668510437',NULL,NULL,'2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(649,'1668510437',NULL,NULL,'2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(650,'1668510437',NULL,NULL,'2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(652,'1668510568',NULL,NULL,'2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(653,'1668510568',NULL,NULL,'2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(654,'1668510568',NULL,NULL,'2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(655,NULL,'9',NULL,'2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(656,NULL,'9',NULL,'2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(657,NULL,'9',NULL,'2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(658,NULL,'9',NULL,'2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(659,NULL,'21',NULL,'2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(660,NULL,'21',NULL,'2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(661,NULL,'21',NULL,'2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(662,NULL,'21',NULL,'2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(667,NULL,'10',NULL,'2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(668,NULL,'10',NULL,'2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(669,NULL,'10',NULL,'2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(670,NULL,'10',NULL,'2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(671,NULL,'22',NULL,'2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(672,NULL,'22',NULL,'2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(673,NULL,'22',NULL,'2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(674,NULL,'22',NULL,'2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(675,NULL,'23',NULL,'2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(676,NULL,'23',NULL,'2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(677,NULL,'23',NULL,'2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(678,NULL,'23',NULL,'2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(679,NULL,NULL,'1','2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(680,NULL,NULL,'2','2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(681,NULL,NULL,'3','2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(682,NULL,NULL,'4','2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(684,NULL,NULL,'6','2','view','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(685,NULL,NULL,'1','2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(686,NULL,NULL,'2','2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(687,NULL,NULL,'3','2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(688,NULL,NULL,'4','2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(689,NULL,NULL,'5','2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(690,NULL,NULL,'6','2','create','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(691,NULL,NULL,'1','2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(692,NULL,NULL,'2','2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(693,NULL,NULL,'3','2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(694,NULL,NULL,'4','2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(695,NULL,NULL,'5','2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(696,NULL,NULL,'6','2','update','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(697,NULL,NULL,'1','2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(698,NULL,NULL,'2','2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(699,NULL,NULL,'3','2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(700,NULL,NULL,'4','2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(701,NULL,NULL,'5','2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(702,NULL,NULL,'6','2','delete','2023-10-04 14:59:27','2023-10-04 14:59:27'),
(704,'1696435485',NULL,NULL,'1','view','2023-10-04 16:04:52','2023-10-04 16:04:52'),
(705,'1696435485',NULL,NULL,'1','create','2023-10-04 16:04:54','2023-10-04 16:04:54'),
(706,'1696435485',NULL,NULL,'1','update','2023-10-04 16:04:54','2023-10-04 16:04:54'),
(707,'1696435485',NULL,NULL,'1','delete','2023-10-04 16:04:55','2023-10-04 16:04:55'),
(708,'1696435485',NULL,NULL,'4','view','2023-10-04 16:04:59','2023-10-04 16:04:59'),
(709,'1696435485',NULL,NULL,'4','create','2023-10-04 16:05:00','2023-10-04 16:05:00'),
(710,'1696435485',NULL,NULL,'4','update','2023-10-04 16:05:02','2023-10-04 16:05:02'),
(711,'1696435485',NULL,NULL,'4','delete','2023-10-04 16:05:02','2023-10-04 16:05:02'),
(712,'1696435485',NULL,NULL,'2','view','2023-10-04 16:05:06','2023-10-04 16:05:06'),
(713,'1696435485',NULL,NULL,'2','update','2023-10-04 16:05:08','2023-10-04 16:05:08'),
(714,'1696435485',NULL,NULL,'2','delete','2023-10-04 16:05:08','2023-10-04 16:05:08'),
(715,'1696435485',NULL,NULL,'2','create','2023-10-04 16:05:10','2023-10-04 16:05:10'),
(716,'1696435485',NULL,NULL,'3','view','2023-10-04 16:05:14','2023-10-04 16:05:14'),
(717,'1696435485',NULL,NULL,'3','update','2023-10-04 16:05:16','2023-10-04 16:05:16'),
(718,'1696435485',NULL,NULL,'3','delete','2023-10-04 16:05:16','2023-10-04 16:05:16'),
(719,'1696435485',NULL,NULL,'3','create','2023-10-04 16:05:18','2023-10-04 16:05:18'),
(720,'1696481527',NULL,NULL,'4','view','2023-10-05 04:52:44','2023-10-05 04:52:44'),
(721,'1696481527',NULL,NULL,'4','create','2023-10-05 04:52:46','2023-10-05 04:52:46'),
(722,'1696481527',NULL,NULL,'4','update','2023-10-05 04:52:48','2023-10-05 04:52:48'),
(723,'1696481527',NULL,NULL,'4','delete','2023-10-05 04:52:48','2023-10-05 04:52:48'),
(724,'1696481527',NULL,NULL,'1','view','2023-10-05 04:52:53','2023-10-05 04:52:53'),
(725,'1696481527',NULL,NULL,'1','create','2023-10-05 04:52:55','2023-10-05 04:52:55'),
(726,'1696481527',NULL,NULL,'1','update','2023-10-05 04:52:55','2023-10-05 04:52:55'),
(727,'1696481527',NULL,NULL,'1','delete','2023-10-05 04:52:56','2023-10-05 04:52:56'),
(728,'1696481527',NULL,NULL,'2','view','2023-10-05 04:53:01','2023-10-05 04:53:01'),
(729,'1696481527',NULL,NULL,'2','create','2023-10-05 04:53:03','2023-10-05 04:53:03'),
(730,'1696481527',NULL,NULL,'2','update','2023-10-05 04:53:03','2023-10-05 04:53:03'),
(731,'1696481527',NULL,NULL,'2','delete','2023-10-05 04:53:03','2023-10-05 04:53:03'),
(732,'1696481527',NULL,NULL,'3','view','2023-10-05 04:53:07','2023-10-05 04:53:07'),
(733,'1696481527',NULL,NULL,'3','create','2023-10-05 04:53:09','2023-10-05 04:53:09'),
(734,'1696481527',NULL,NULL,'3','update','2023-10-05 04:53:09','2023-10-05 04:53:09'),
(735,'1696481527',NULL,NULL,'3','delete','2023-10-05 04:53:11','2023-10-05 04:53:11'),
(736,NULL,'25',NULL,'4','view','2023-10-05 13:12:15','2023-10-05 13:12:15'),
(737,NULL,'26',NULL,'4','view','2023-10-05 13:12:17','2023-10-05 13:12:17'),
(738,NULL,'25',NULL,'4','create','2023-10-05 13:12:19','2023-10-05 13:12:19'),
(739,NULL,'26',NULL,'4','create','2023-10-05 13:12:19','2023-10-05 13:12:19'),
(740,NULL,'25',NULL,'4','update','2023-10-05 13:12:21','2023-10-05 13:12:21'),
(741,NULL,'26',NULL,'4','update','2023-10-05 13:12:23','2023-10-05 13:12:23'),
(742,NULL,'25',NULL,'4','delete','2023-10-05 13:12:25','2023-10-05 13:12:25'),
(743,NULL,'26',NULL,'4','delete','2023-10-05 13:12:27','2023-10-05 13:12:27'),
(744,NULL,'25',NULL,'1','view','2023-10-05 13:12:44','2023-10-05 13:12:44'),
(745,NULL,'26',NULL,'1','view','2023-10-05 13:12:45','2023-10-05 13:12:45'),
(746,NULL,'25',NULL,'1','create','2023-10-05 13:12:47','2023-10-05 13:12:47'),
(747,NULL,'26',NULL,'1','create','2023-10-05 13:12:48','2023-10-05 13:12:48'),
(748,NULL,'25',NULL,'1','update','2023-10-05 13:12:50','2023-10-05 13:12:50'),
(749,NULL,'26',NULL,'1','update','2023-10-05 13:12:50','2023-10-05 13:12:50'),
(750,NULL,'25',NULL,'1','delete','2023-10-05 13:12:53','2023-10-05 13:12:53'),
(751,NULL,'26',NULL,'1','delete','2023-10-05 13:12:55','2023-10-05 13:12:55'),
(752,NULL,'26',NULL,'3','view','2023-10-05 13:13:11','2023-10-05 13:13:11'),
(753,NULL,'25',NULL,'3','view','2023-10-05 13:13:13','2023-10-05 13:13:13');

/*Table structure for table `tbl_appreance` */

DROP TABLE IF EXISTS `tbl_appreance`;

CREATE TABLE `tbl_appreance` (
  `appreance_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `appreance_layout` varchar(255) DEFAULT NULL,
  `appreance_theme` varchar(255) DEFAULT NULL,
  `appreance_menu` varchar(255) DEFAULT NULL,
  `appreance_header` varchar(255) DEFAULT NULL,
  `appreance_sidestyle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`appreance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_appreance` */

insert  into `tbl_appreance`(`appreance_id`,`user_id`,`appreance_layout`,`appreance_theme`,`appreance_menu`,`appreance_header`,`appreance_sidestyle`,`created_at`,`updated_at`) values 
(2,'1','sidebar-mini','light-mode','light-menu','header-light','default-menu','2022-11-22 09:45:47','2022-11-24 13:00:20');

/*Table structure for table `tbl_barang` */

DROP TABLE IF EXISTS `tbl_barang`;

CREATE TABLE `tbl_barang` (
  `barang_id` int(255) NOT NULL AUTO_INCREMENT,
  `lokasi_id` varchar(255) DEFAULT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_slug` varchar(255) DEFAULT NULL,
  `barang_jenis` enum('Elektronik','Non Elektronik') DEFAULT NULL,
  `barang_kondisi` enum('Rusak','Baik') DEFAULT NULL,
  `barang_status` enum('Dipinjam','Tersedia') DEFAULT NULL,
  `barang_qr` varchar(255) DEFAULT NULL,
  `barang_ket` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tbl_barang` */

insert  into `tbl_barang`(`barang_id`,`lokasi_id`,`barang_kode`,`barang_nama`,`barang_slug`,`barang_jenis`,`barang_kondisi`,`barang_status`,`barang_qr`,`barang_ket`,`created_at`,`updated_at`) values 
(15,'1','BRG-1696513170691','Barang 1','barang-1','Elektronik','Baik','Dipinjam','qr-1696513182.png','-','2023-10-05 13:39:43','2023-10-07 12:28:55'),
(16,'1','BRG-1696513188040','Barang 2','barang-2','Elektronik','Baik','Dipinjam','qr-1696513196.png','-','2023-10-05 13:39:57','2023-10-07 12:29:06');

/*Table structure for table `tbl_barangkeluar` */

DROP TABLE IF EXISTS `tbl_barangkeluar`;

CREATE TABLE `tbl_barangkeluar` (
  `bk_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bk_kode` varchar(255) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `bk_tanggal` varchar(255) NOT NULL,
  `bk_tujuan` varchar(255) DEFAULT NULL,
  `bk_jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_barangkeluar` */

/*Table structure for table `tbl_barangmasuk` */

DROP TABLE IF EXISTS `tbl_barangmasuk`;

CREATE TABLE `tbl_barangmasuk` (
  `bm_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bm_kode` varchar(255) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `bm_tanggal` varchar(255) NOT NULL,
  `bm_jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_barangmasuk` */

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_nama` varchar(255) NOT NULL,
  `customer_slug` varchar(255) NOT NULL,
  `customer_alamat` text DEFAULT NULL,
  `customer_notelp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`customer_id`,`customer_nama`,`customer_slug`,`customer_alamat`,`customer_notelp`,`created_at`,`updated_at`) values 
(2,'Radhian Sobarna','radhian-sobarna','Sumedang','087817379229','2022-11-26 01:36:34','2022-11-26 01:43:58');

/*Table structure for table `tbl_jenisbarang` */

DROP TABLE IF EXISTS `tbl_jenisbarang`;

CREATE TABLE `tbl_jenisbarang` (
  `jenisbarang_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `jenisbarang_nama` varchar(255) NOT NULL,
  `jenisbarang_slug` varchar(255) NOT NULL,
  `jenisbarang_ket` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jenisbarang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_jenisbarang` */

insert  into `tbl_jenisbarang`(`jenisbarang_id`,`jenisbarang_nama`,`jenisbarang_slug`,`jenisbarang_ket`,`created_at`,`updated_at`) values 
(11,'Elektronik','elektronik',NULL,'2022-11-25 15:24:18','2022-11-25 15:25:39'),
(12,'Perangkat Komputer','perangkat-komputer',NULL,'2022-11-25 15:26:15','2022-11-25 15:27:16'),
(13,'Besi','besi',NULL,'2022-11-25 15:27:33','2022-11-25 15:27:33');

/*Table structure for table `tbl_lokasi` */

DROP TABLE IF EXISTS `tbl_lokasi`;

CREATE TABLE `tbl_lokasi` (
  `lokasi_id` int(255) NOT NULL AUTO_INCREMENT,
  `lokasi_nama` varchar(255) DEFAULT NULL,
  `lokasi_ket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`lokasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_lokasi` */

insert  into `tbl_lokasi`(`lokasi_id`,`lokasi_nama`,`lokasi_ket`,`created_at`,`updated_at`) values 
(1,'Lokasi 1','-','2023-10-05 13:24:35','2023-10-05 13:24:35'),
(2,'Lokasi 2','-','2023-10-05 13:24:42','2023-10-05 13:25:09'),
(3,'Lokasi 3','-','2023-10-05 13:25:15','2023-10-05 13:25:15'),
(4,'Lokasi 4','-','2023-10-05 13:25:21','2023-10-05 13:25:21'),
(5,'Lokasi 5','-','2023-10-05 13:25:27','2023-10-05 13:25:27');

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_judul` varchar(255) NOT NULL,
  `menu_slug` varchar(255) NOT NULL,
  `menu_icon` varchar(255) NOT NULL,
  `menu_redirect` varchar(255) NOT NULL,
  `menu_sort` varchar(255) NOT NULL,
  `menu_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1696481528 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`menu_id`,`menu_judul`,`menu_slug`,`menu_icon`,`menu_redirect`,`menu_sort`,`menu_type`,`created_at`,`updated_at`) values 
(1667444041,'Dashboard','dashboard','home','/dashboard','1','1','2022-11-15 10:51:04','2023-10-04 14:58:52'),
(1668509889,'Master Barang','master-barang','package','-','2','2','2022-11-15 10:58:09','2023-10-04 14:58:52'),
(1668510437,'Transaksi','transaksi','repeat','-','5','2','2022-11-15 11:07:17','2023-10-05 04:52:32'),
(1668510568,'Laporan','laporan','printer','-','6','2','2022-11-15 11:09:28','2023-10-05 04:52:23'),
(1696435485,'Peminjaman','peminjaman','clipboard','/peminjaman','4','1','2023-10-04 16:04:45','2023-10-05 04:52:32'),
(1696481527,'Scan QR','scan-qr','airplay','/scanqr','3','1','2023-10-05 04:52:07','2023-10-05 04:52:28');

/*Table structure for table `tbl_merk` */

DROP TABLE IF EXISTS `tbl_merk`;

CREATE TABLE `tbl_merk` (
  `merk_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `merk_nama` varchar(255) NOT NULL,
  `merk_slug` varchar(255) NOT NULL,
  `merk_keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`merk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_merk` */

insert  into `tbl_merk`(`merk_id`,`merk_nama`,`merk_slug`,`merk_keterangan`,`created_at`,`updated_at`) values 
(1,'Huawei','huawei',NULL,'2022-11-15 18:14:09','2022-11-15 18:14:09'),
(2,'Lenovo','lenovo',NULL,'2022-11-15 18:14:33','2022-11-15 18:14:45'),
(7,'Steel','steel',NULL,'2022-11-25 15:29:27','2022-11-25 15:29:27');

/*Table structure for table `tbl_peminjam` */

DROP TABLE IF EXISTS `tbl_peminjam`;

CREATE TABLE `tbl_peminjam` (
  `peminjam_id` int(255) NOT NULL AUTO_INCREMENT,
  `barang_kode` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `peminjam_tglpinjam` date NOT NULL,
  `peminjam_tglkembali` date DEFAULT NULL,
  `peminjam_nama` varchar(255) NOT NULL,
  `peminjam_ket` text DEFAULT NULL,
  `peminjam_status` enum('Diterima','Ditolak','Dikembalikan','Pending') DEFAULT 'Pending',
  `peminjam_kondisi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`peminjam_id`,`peminjam_nama`,`barang_kode`,`peminjam_tglpinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_peminjam` */

insert  into `tbl_peminjam`(`peminjam_id`,`barang_kode`,`user_id`,`peminjam_tglpinjam`,`peminjam_tglkembali`,`peminjam_nama`,`peminjam_ket`,`peminjam_status`,`peminjam_kondisi`,`created_at`,`updated_at`) values 
(14,'BRG-1696513170691','3','2023-10-01','2023-10-08','Peminjam 1','-','Ditolak',NULL,'2023-10-07 12:27:39','2023-10-07 12:28:27'),
(15,'BRG-1696513188040','3','2023-10-02','2023-10-08','Peminjam 2','-','Dikembalikan','Baik','2023-10-07 12:27:57','2023-10-07 12:28:31'),
(16,'BRG-1696513170691','3','2023-10-09','2023-10-10','Peminjam 3','-','Pending',NULL,'2023-10-07 12:28:55','2023-10-07 12:28:55'),
(17,'BRG-1696513188040','3','2023-10-11','2023-10-15','Peminjam 4','-','Pending',NULL,'2023-10-07 12:29:06','2023-10-07 12:29:06');

/*Table structure for table `tbl_role` */

DROP TABLE IF EXISTS `tbl_role`;

CREATE TABLE `tbl_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_title` varchar(255) NOT NULL,
  `role_slug` varchar(255) NOT NULL,
  `role_desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_role` */

insert  into `tbl_role`(`role_id`,`role_title`,`role_slug`,`role_desc`,`created_at`,`updated_at`) values 
(1,'Super Admin','super-admin','-','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(2,'Admin','admin','-','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(3,'User','user','-','2022-11-15 10:51:04','2023-10-05 08:24:32'),
(4,'Manajer','manajer',NULL,'2022-12-06 09:33:27','2022-12-06 09:33:27');

/*Table structure for table `tbl_satuan` */

DROP TABLE IF EXISTS `tbl_satuan`;

CREATE TABLE `tbl_satuan` (
  `satuan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `satuan_nama` varchar(255) NOT NULL,
  `satuan_slug` varchar(255) NOT NULL,
  `satuan_keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`satuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_satuan` */

insert  into `tbl_satuan`(`satuan_id`,`satuan_nama`,`satuan_slug`,`satuan_keterangan`,`created_at`,`updated_at`) values 
(1,'Kg','kg',NULL,'2022-11-15 17:50:38','2022-11-24 12:39:04'),
(5,'Pcs','pcs',NULL,'2022-11-24 12:39:15','2022-11-24 12:39:21'),
(7,'Qty','qty',NULL,'2022-11-24 12:39:59','2022-11-24 12:39:59');

/*Table structure for table `tbl_submenu` */

DROP TABLE IF EXISTS `tbl_submenu`;

CREATE TABLE `tbl_submenu` (
  `submenu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(255) NOT NULL,
  `submenu_judul` varchar(255) NOT NULL,
  `submenu_slug` varchar(255) NOT NULL,
  `submenu_redirect` varchar(255) NOT NULL,
  `submenu_sort` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`submenu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_submenu` */

insert  into `tbl_submenu`(`submenu_id`,`menu_id`,`submenu_judul`,`submenu_slug`,`submenu_redirect`,`submenu_sort`,`created_at`,`updated_at`) values 
(9,'1668510437','Barang Masuk','barang-masuk','/barang-masuk','1','2022-11-15 11:08:19','2022-11-15 11:08:19'),
(10,'1668510437','Barang Keluar','barang-keluar','/barang-keluar','2','2022-11-15 11:08:19','2022-11-15 11:08:19'),
(21,'1668510568','Lap Barang Masuk','lap-barang-masuk','/lap-barang-masuk','1','2022-11-30 12:56:24','2022-11-30 12:56:24'),
(22,'1668510568','Lap Barang Keluar','lap-barang-keluar','/lap-barang-keluar','2','2022-11-30 12:56:24','2022-11-30 12:56:24'),
(23,'1668510568','Lap Stok Barang','lap-stok-barang','/lap-stok-barang','3','2022-11-30 12:56:24','2022-11-30 12:56:24'),
(25,'1668509889','Lokasi','lokasi','/lokasi','1','2023-10-05 13:12:05','2023-10-05 13:12:05'),
(26,'1668509889','Barang','barang','/barang','2','2023-10-05 13:12:05','2023-10-05 13:12:05');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` varchar(255) NOT NULL,
  `user_nmlengkap` varchar(255) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_foto` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`user_id`,`role_id`,`user_nmlengkap`,`user_nama`,`user_email`,`user_foto`,`user_password`,`created_at`,`updated_at`) values 
(1,'1','Super Administrator','superadmin','superadmin@gmail.com','undraw_profile.svg','25d55ad283aa400af464c76d713c07ad','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(2,'2','Administrator','admin','admin@gmail.com','undraw_profile.svg','25d55ad283aa400af464c76d713c07ad','2022-11-15 10:51:04','2022-11-15 10:51:04'),
(3,'3','User','user','user@gmail.com','undraw_profile.svg','25d55ad283aa400af464c76d713c07ad','2022-11-15 10:51:04','2023-10-05 08:24:49'),
(4,'4','Manajer','manajer','manajer@gmail.com','undraw_profile.svg','25d55ad283aa400af464c76d713c07ad','2022-12-06 09:33:54','2022-12-06 09:33:54'),
(5,'3','User 2','user2','user2@mail.com','undraw_profile.svg','25d55ad283aa400af464c76d713c07ad','2023-10-05 14:33:40','2023-10-05 14:33:40');

/*Table structure for table `tbl_web` */

DROP TABLE IF EXISTS `tbl_web`;

CREATE TABLE `tbl_web` (
  `web_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `web_nama` varchar(255) NOT NULL,
  `web_logo` varchar(255) NOT NULL,
  `web_deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`web_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_web` */

insert  into `tbl_web`(`web_id`,`web_nama`,`web_logo`,`web_deskripsi`,`created_at`,`updated_at`) values 
(1,'Inventoryweb','default.png','Mengelola Data Barang Masuk & Barang Keluar','2022-11-15 10:51:04','2022-11-22 09:41:39');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
