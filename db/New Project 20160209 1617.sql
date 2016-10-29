-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.25-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema hrd
--

CREATE DATABASE IF NOT EXISTS hrd;
USE hrd;

--
-- Definition of table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration`
--

/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`,`apply_time`) VALUES 
 ('m000000_000000_base',1455003031),
 ('m130524_201442_init',1455003043);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


--
-- Definition of table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสบุคลากร',
  `person_cid` varchar(17) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสบัตรประชาชน',
  `person_pname` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำนำหน้า',
  `person_fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `person_lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `person_oname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'นามสกุลเดิม',
  `person_birthday` datetime DEFAULT NULL COMMENT 'วันเกิด',
  `person_age` int(2) DEFAULT NULL COMMENT 'อายุ',
  `person_sex` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เพศ',
  `person_address` text COLLATE utf8_unicode_ci COMMENT 'ที่อยู่',
  `person_status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานะภาพ',
  `person_blod` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมู่เลือด',
  `person_phon` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'โทรศัพท์',
  `person_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Email',
  `person_worked` datetime DEFAULT NULL COMMENT 'วันที่บรรจุ',
  `person_workin` datetime DEFAULT NULL COMMENT 'วันที่เข้าทำงาน',
  `person_may` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อคู่สมรส',
  `person_dad` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อบิดา',
  `person_mum` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อมารดา',
  `person_department` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประจำแผนก',
  `person_status_now` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานะปัจจุบัน',
  `person_position` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ตำแหน่ง',
  `person_license_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขที่ใบประกอบ',
  `person_education` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วุฒิการศึกษา',
  `person_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประเภท',
  `person_salary` int(11) DEFAULT NULL COMMENT 'อัตราเงินเดือน',
  `person_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รูปภาพ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person`
--

/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`id`,`person_id`,`person_cid`,`person_pname`,`person_fname`,`person_lname`,`person_oname`,`person_birthday`,`person_age`,`person_sex`,`person_address`,`person_status`,`person_blod`,`person_phon`,`person_email`,`person_worked`,`person_workin`,`person_may`,`person_dad`,`person_mum`,`person_department`,`person_status_now`,`person_position`,`person_license_number`,`person_education`,`person_type`,`person_salary`,`person_photo`) VALUES 
 (1,'001','1-4203-00053-16-3','1','ดนัย','สอนไสย','','1988-04-16 05:00:00',28,'1','52/8 หมู่ 2 ซอย 21','2','2','084-7931944','Lifegoon_2006@hotmail.com','2011-08-17 08:30:00','2011-08-17 08:30:00','กรรณิการ์ พิลากอง','นัฐวัฒิ สอนไสย','พนมยงค์ สอนไสย','20','1','30','12345678','3','3',12000,'2e60c87d68ff035884c1c2d3c6d7f77b.jpg');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;


--
-- Definition of table `training`
--

DROP TABLE IF EXISTS `training`;
CREATE TABLE `training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_year` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ปีงบประมาณ',
  `training_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หลักสูตรอบรม',
  `training_date` date NOT NULL COMMENT 'วันที่อบรม',
  `training_budget` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'งบประมาณ',
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_training_person_idx` (`person_id`),
  CONSTRAINT `fk_training_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `training`
--

/*!40000 ALTER TABLE `training` DISABLE KEYS */;
/*!40000 ALTER TABLE `training` ENABLE KEYS */;


--
-- Definition of table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`role`) VALUES 
 (1,'Danai','S0FVAxvaub3rdUTZwiV1PRvh0dC5Z_Zd','$2y$13$QyCGHWo66OUN6Dfe8jLsnuBYeN72KAmWkn8np3lJEHVGYpi8tAlnq',NULL,'lifegoon_2006@hotmail.com',10,1455003260,1455005301,30);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
