-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: boc_db
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `associated__sports`
--

DROP TABLE IF EXISTS `associated__sports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `associated__sports` (
  `sport_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sport_org_id` int(11) NOT NULL,
  `sport_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `sport_description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sport_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associated__sports`
--

LOCK TABLES `associated__sports` WRITE;
/*!40000 ALTER TABLE `associated__sports` DISABLE KEYS */;
INSERT INTO `associated__sports` VALUES (7,1,'football','play football',3,'2017-04-05 00:00:33','2017-04-05 00:00:33');
INSERT INTO `associated__sports` VALUES (8,2,'Basketball','play basket',3,'2017-04-05 00:16:14','2017-04-05 00:16:14');
/*!40000 ALTER TABLE `associated__sports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `athelete_training_attendances`
--

DROP TABLE IF EXISTS `athelete_training_attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `athelete_training_attendances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `athlete_id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `athelete_training_attendances`
--

LOCK TABLES `athelete_training_attendances` WRITE;
/*!40000 ALTER TABLE `athelete_training_attendances` DISABLE KEYS */;
INSERT INTO `athelete_training_attendances` VALUES (5,9,15,'2017-04-06 11:35:54','2017-04-06 11:35:54');
INSERT INTO `athelete_training_attendances` VALUES (6,10,15,'2017-04-06 11:35:54','2017-04-06 11:35:54');
INSERT INTO `athelete_training_attendances` VALUES (7,10,16,'2017-04-06 11:36:07','2017-04-06 11:36:07');
INSERT INTO `athelete_training_attendances` VALUES (8,10,17,'2017-04-06 11:36:17','2017-04-06 11:36:17');
/*!40000 ALTER TABLE `athelete_training_attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `athlete_addresses`
--

DROP TABLE IF EXISTS `athlete_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `athlete_addresses` (
  `address_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `athlete_id` int(11) NOT NULL,
  `Paddress_dzongkhag` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Paddress_dungkhag` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Paddress_gewog` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Paddress_village` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Caddress_dzongkhag` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Caddress_dungkhag` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Caddress_email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Caddress_phone` int(11) NOT NULL,
  `Caddress_mobile` int(11) NOT NULL,
  `Caddress_contactAddress` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `athlete_addresses`
--

LOCK TABLES `athlete_addresses` WRITE;
/*!40000 ALTER TABLE `athlete_addresses` DISABLE KEYS */;
INSERT INTO `athlete_addresses` VALUES (3,9,'2','1','6','samling','2','1','pema@gmail.com',123456,1233,'Wangdue',3,'2017-04-05 00:19:13','2017-04-05 00:19:13');
INSERT INTO `athlete_addresses` VALUES (4,10,'3','2','17','dorokha','15','13','sangay@gmail.com',123456,1233,'thimphu',3,'2017-04-05 00:28:57','2017-04-05 00:28:57');
/*!40000 ALTER TABLE `athlete_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `athlete_bioinformations`
--

DROP TABLE IF EXISTS `athlete_bioinformations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `athlete_bioinformations` (
  `athlete_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `athlete_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `athlete_fname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `athlete_mname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `athlete_lname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `athlete_occupation` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `athlete_dob` date NOT NULL,
  `athlete_pob` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `athlete_gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `athlete_height` decimal(10,3) NOT NULL,
  `athlete_weight` decimal(5,3) NOT NULL,
  `athlete_fathername` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `athlete_passportNo` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `athlete_cid` bigint(50) NOT NULL,
  `athlete_associatedSport` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `athlete_photo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`athlete_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `athlete_bioinformations`
--

LOCK TABLES `athlete_bioinformations` WRITE;
/*!40000 ALTER TABLE `athlete_bioinformations` DISABLE KEYS */;
INSERT INTO `athlete_bioinformations` VALUES (9,'Ms.','pema','-','dema','1','2017-04-22','wangdue','2',153.000,56.000,'tshering','we124454',12332434,'7','IMG_9877.JPG',3,'2017-04-05 00:17:26','2017-04-05 00:17:26');
INSERT INTO `athlete_bioinformations` VALUES (10,'Mr.','sangay','-','phuentsho','1','2017-04-29','thimphu','1',156.000,45.000,'dorji','gh12332',23456,'8','IMG_9571.JPG',3,'2017-04-05 00:28:21','2017-04-05 00:28:21');
/*!40000 ALTER TABLE `athlete_bioinformations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `athlete_occupations`
--

DROP TABLE IF EXISTS `athlete_occupations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `athlete_occupations` (
  `occupation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `occupation_name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `occupation_description` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`occupation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `athlete_occupations`
--

LOCK TABLES `athlete_occupations` WRITE;
/*!40000 ALTER TABLE `athlete_occupations` DISABLE KEYS */;
INSERT INTO `athlete_occupations` VALUES (1,'Student','learning',4,NULL,NULL);
/*!40000 ALTER TABLE `athlete_occupations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `athlete_qualifications`
--

DROP TABLE IF EXISTS `athlete_qualifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `athlete_qualifications` (
  `qualification_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `athlete_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `qualification_level_id` int(11) NOT NULL,
  `qualification_description` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `qualification_year` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `qualification_institute` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`qualification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `athlete_qualifications`
--

LOCK TABLES `athlete_qualifications` WRITE;
/*!40000 ALTER TABLE `athlete_qualifications` DISABLE KEYS */;
INSERT INTO `athlete_qualifications` VALUES (1,9,9,1,'master in information tehcnology',2015,17,'Rama University',3,'2017-04-05 00:27:05','2017-04-05 00:27:05');
INSERT INTO `athlete_qualifications` VALUES (2,10,10,2,'Bachelor in Computer Science',2011,8,'College of Science and Technology',3,'2017-04-05 00:29:39','2017-04-05 00:29:39');
/*!40000 ALTER TABLE `athlete_qualifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `athlete_training_schedules`
--

DROP TABLE IF EXISTS `athlete_training_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `athlete_training_schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `training_id` int(11) NOT NULL,
  `athlete_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `athlete_training_schedules`
--

LOCK TABLES `athlete_training_schedules` WRITE;
/*!40000 ALTER TABLE `athlete_training_schedules` DISABLE KEYS */;
INSERT INTO `athlete_training_schedules` VALUES (12,15,9,'2017-04-05 00:57:14','2017-04-05 00:57:14');
INSERT INTO `athlete_training_schedules` VALUES (13,15,10,'2017-04-05 00:57:14','2017-04-05 00:57:14');
INSERT INTO `athlete_training_schedules` VALUES (14,16,10,'2017-04-05 00:59:05','2017-04-05 00:59:05');
INSERT INTO `athlete_training_schedules` VALUES (15,17,10,'2017-04-05 22:00:17','2017-04-05 22:00:17');
/*!40000 ALTER TABLE `athlete_training_schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coach_seperations`
--

DROP TABLE IF EXISTS `coach_seperations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coach_seperations` (
  `seperation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coach_id` int(11) NOT NULL,
  `seperation_date` date NOT NULL,
  `seperation_comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`seperation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coach_seperations`
--

LOCK TABLES `coach_seperations` WRITE;
/*!40000 ALTER TABLE `coach_seperations` DISABLE KEYS */;
INSERT INTO `coach_seperations` VALUES (5,2,'2017-04-15','nmlkl',3,'2017-04-06 12:04:24','2017-04-06 12:04:24');
INSERT INTO `coach_seperations` VALUES (6,1,'2017-04-21','completed contract',3,'2017-04-06 21:33:26','2017-04-06 21:33:26');
/*!40000 ALTER TABLE `coach_seperations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dungkhags`
--

DROP TABLE IF EXISTS `dungkhags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dungkhags` (
  `dungkhag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dzongkhag_id` int(11) NOT NULL,
  `dungkhag_name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dungkhag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dungkhags`
--

LOCK TABLES `dungkhags` WRITE;
/*!40000 ALTER TABLE `dungkhags` DISABLE KEYS */;
INSERT INTO `dungkhags` VALUES (1,2,'phuentsholing',1,0,'2017-03-27 00:48:27','2017-03-27 00:48:27');
INSERT INTO `dungkhags` VALUES (2,3,'Dagapela',1,0,'2017-04-03 03:24:35','2017-04-03 03:24:35');
INSERT INTO `dungkhags` VALUES (3,3,'Lhamoy Zingkha',1,0,'2017-04-03 03:25:10','2017-04-03 03:25:10');
INSERT INTO `dungkhags` VALUES (4,9,'Nganglam',1,0,'2017-04-03 03:25:24','2017-04-03 03:25:24');
INSERT INTO `dungkhags` VALUES (5,11,'Bhangtar',1,0,'2017-04-03 03:25:36','2017-04-03 03:25:36');
INSERT INTO `dungkhags` VALUES (6,11,'Jomotsangkha',1,0,'2017-04-03 03:25:51','2017-04-03 03:25:51');
INSERT INTO `dungkhags` VALUES (7,11,'Samdrup Choling',1,0,'2017-04-03 03:26:47','2017-04-03 03:26:47');
INSERT INTO `dungkhags` VALUES (8,12,'Chengmari',1,0,'2017-04-03 03:27:02','2017-04-03 03:27:02');
INSERT INTO `dungkhags` VALUES (9,12,'Dorokha',1,0,'2017-04-03 03:27:13','2017-04-03 03:27:13');
INSERT INTO `dungkhags` VALUES (10,12,'Sipsu',1,0,'2017-04-03 03:27:24','2017-04-03 03:27:24');
INSERT INTO `dungkhags` VALUES (11,13,'Gelephu',1,0,'2017-04-03 03:27:38','2017-04-03 03:27:38');
INSERT INTO `dungkhags` VALUES (12,14,'Lingzhi',1,0,'2017-04-03 03:27:50','2017-04-03 03:27:50');
INSERT INTO `dungkhags` VALUES (13,15,'Sakteng',1,0,'2017-04-03 03:28:03','2017-04-03 03:28:03');
INSERT INTO `dungkhags` VALUES (14,15,'Thrimshing',1,0,'2017-04-03 03:28:16','2017-04-03 03:28:16');
INSERT INTO `dungkhags` VALUES (15,15,'Wamrong',1,0,'2017-04-03 03:28:26','2017-04-03 03:28:26');
INSERT INTO `dungkhags` VALUES (16,20,'Panbang',1,0,'2017-04-03 03:28:48','2017-04-03 03:28:48');
/*!40000 ALTER TABLE `dungkhags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum__game_types`
--

DROP TABLE IF EXISTS `enum__game_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum__game_types` (
  `gametype_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gametype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum__game_types`
--

LOCK TABLES `enum__game_types` WRITE;
/*!40000 ALTER TABLE `enum__game_types` DISABLE KEYS */;
INSERT INTO `enum__game_types` VALUES (1,'National',NULL,NULL);
INSERT INTO `enum__game_types` VALUES (2,'Regional',NULL,NULL);
INSERT INTO `enum__game_types` VALUES (3,'International',NULL,NULL);
/*!40000 ALTER TABLE `enum__game_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum__medals`
--

DROP TABLE IF EXISTS `enum__medals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum__medals` (
  `medal_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`medal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum__medals`
--

LOCK TABLES `enum__medals` WRITE;
/*!40000 ALTER TABLE `enum__medals` DISABLE KEYS */;
INSERT INTO `enum__medals` VALUES (1,'Gold',0,NULL,NULL);
INSERT INTO `enum__medals` VALUES (2,'Silver',0,NULL,NULL);
INSERT INTO `enum__medals` VALUES (3,'Bronze',0,NULL,NULL);
/*!40000 ALTER TABLE `enum__medals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_daytables`
--

DROP TABLE IF EXISTS `enum_daytables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_daytables` (
  `day_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_daytables`
--

LOCK TABLES `enum_daytables` WRITE;
/*!40000 ALTER TABLE `enum_daytables` DISABLE KEYS */;
INSERT INTO `enum_daytables` VALUES (1,'Monday',NULL,NULL);
INSERT INTO `enum_daytables` VALUES (2,'Tuesday',NULL,NULL);
INSERT INTO `enum_daytables` VALUES (3,'Wednesday',NULL,NULL);
INSERT INTO `enum_daytables` VALUES (4,'Thursday',NULL,NULL);
INSERT INTO `enum_daytables` VALUES (5,'Friday',NULL,NULL);
INSERT INTO `enum_daytables` VALUES (6,'Saturday',NULL,NULL);
INSERT INTO `enum_daytables` VALUES (7,'Sunday',NULL,NULL);
/*!40000 ALTER TABLE `enum_daytables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_five_year_plans`
--

DROP TABLE IF EXISTS `enum_five_year_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_five_year_plans` (
  `five_yr_plan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`five_yr_plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_five_year_plans`
--

LOCK TABLES `enum_five_year_plans` WRITE;
/*!40000 ALTER TABLE `enum_five_year_plans` DISABLE KEYS */;
INSERT INTO `enum_five_year_plans` VALUES (1,'12th five year plan',NULL,NULL);
INSERT INTO `enum_five_year_plans` VALUES (2,'13th five year plan',NULL,NULL);
INSERT INTO `enum_five_year_plans` VALUES (3,'11th five year plan',NULL,NULL);
INSERT INTO `enum_five_year_plans` VALUES (4,'10th five year plan',NULL,NULL);
INSERT INTO `enum_five_year_plans` VALUES (5,'14th five year plan',NULL,NULL);
INSERT INTO `enum_five_year_plans` VALUES (6,'15th five year plan',NULL,NULL);
/*!40000 ALTER TABLE `enum_five_year_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_genders`
--

DROP TABLE IF EXISTS `enum_genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_genders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_genders`
--

LOCK TABLES `enum_genders` WRITE;
/*!40000 ALTER TABLE `enum_genders` DISABLE KEYS */;
INSERT INTO `enum_genders` VALUES (1,'Male',NULL,NULL);
INSERT INTO `enum_genders` VALUES (2,'Female',NULL,NULL);
/*!40000 ALTER TABLE `enum_genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_qualification_levels`
--

DROP TABLE IF EXISTS `enum_qualification_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_qualification_levels` (
  `qualification_level_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qualification_level` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`qualification_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_qualification_levels`
--

LOCK TABLES `enum_qualification_levels` WRITE;
/*!40000 ALTER TABLE `enum_qualification_levels` DISABLE KEYS */;
INSERT INTO `enum_qualification_levels` VALUES (1,'Master',NULL,NULL);
INSERT INTO `enum_qualification_levels` VALUES (2,'Degree',NULL,NULL);
/*!40000 ALTER TABLE `enum_qualification_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_quarters`
--

DROP TABLE IF EXISTS `enum_quarters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_quarters` (
  `quarter_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quarter_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`quarter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_quarters`
--

LOCK TABLES `enum_quarters` WRITE;
/*!40000 ALTER TABLE `enum_quarters` DISABLE KEYS */;
INSERT INTO `enum_quarters` VALUES (1,'Jul-Sep',NULL,NULL);
INSERT INTO `enum_quarters` VALUES (2,'Oct-Dec',NULL,NULL);
INSERT INTO `enum_quarters` VALUES (3,'Jan-Mar',NULL,NULL);
INSERT INTO `enum_quarters` VALUES (4,'Apr-June',NULL,NULL);
/*!40000 ALTER TABLE `enum_quarters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_session_types`
--

DROP TABLE IF EXISTS `enum_session_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_session_types` (
  `session_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`session_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_session_types`
--

LOCK TABLES `enum_session_types` WRITE;
/*!40000 ALTER TABLE `enum_session_types` DISABLE KEYS */;
INSERT INTO `enum_session_types` VALUES (1,'Ex-country',NULL,NULL);
INSERT INTO `enum_session_types` VALUES (2,'In-country',NULL,NULL);
INSERT INTO `enum_session_types` VALUES (3,'Practice',NULL,NULL);
/*!40000 ALTER TABLE `enum_session_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_sport_orgs`
--

DROP TABLE IF EXISTS `enum_sport_orgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_sport_orgs` (
  `sport_org_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sport_org_type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sport_org_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_sport_orgs`
--

LOCK TABLES `enum_sport_orgs` WRITE;
/*!40000 ALTER TABLE `enum_sport_orgs` DISABLE KEYS */;
INSERT INTO `enum_sport_orgs` VALUES (1,'National',NULL,NULL);
INSERT INTO `enum_sport_orgs` VALUES (2,'Federation',NULL,NULL);
INSERT INTO `enum_sport_orgs` VALUES (3,'Association',NULL,NULL);
INSERT INTO `enum_sport_orgs` VALUES (4,'Club',NULL,NULL);
/*!40000 ALTER TABLE `enum_sport_orgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gewogs`
--

DROP TABLE IF EXISTS `gewogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gewogs` (
  `gewog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dzongkhag_id` int(11) NOT NULL,
  `gewog_name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gewog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gewogs`
--

LOCK TABLES `gewogs` WRITE;
/*!40000 ALTER TABLE `gewogs` DISABLE KEYS */;
INSERT INTO `gewogs` VALUES (1,6,'gangzor',1,'2017-03-29 03:37:29','2017-03-29 03:37:29');
INSERT INTO `gewogs` VALUES (2,1,'Chhoekhor',1,'2017-04-03 03:37:45','2017-04-03 03:37:45');
INSERT INTO `gewogs` VALUES (3,1,'Chhume',1,'2017-04-03 03:37:58','2017-04-03 03:37:58');
INSERT INTO `gewogs` VALUES (4,1,'Tang',1,'2017-04-03 03:38:06','2017-04-03 03:38:06');
INSERT INTO `gewogs` VALUES (5,1,'Ura',1,'2017-04-03 03:38:13','2017-04-03 03:38:13');
INSERT INTO `gewogs` VALUES (6,2,'Bjachho',1,'2017-04-03 03:38:25','2017-04-03 03:38:25');
INSERT INTO `gewogs` VALUES (7,2,'Bongo',1,'2017-04-03 03:38:35','2017-04-03 03:38:35');
INSERT INTO `gewogs` VALUES (8,2,'Chapcha',1,'2017-04-03 03:38:44','2017-04-03 03:38:44');
INSERT INTO `gewogs` VALUES (9,2,'Darla',1,'2017-04-03 03:38:54','2017-04-03 03:38:54');
INSERT INTO `gewogs` VALUES (10,2,'Dungna',1,'2017-04-03 03:39:04','2017-04-03 03:39:04');
INSERT INTO `gewogs` VALUES (11,2,'Geling',1,'2017-04-03 03:39:17','2017-04-03 03:39:17');
INSERT INTO `gewogs` VALUES (12,2,'Getana',1,'2017-04-03 03:39:33','2017-04-03 03:39:33');
INSERT INTO `gewogs` VALUES (13,2,'Lokchina',1,'2017-04-03 03:39:43','2017-04-03 03:39:43');
INSERT INTO `gewogs` VALUES (14,2,'Metakha',1,'2017-04-03 03:39:52','2017-04-03 03:39:52');
INSERT INTO `gewogs` VALUES (15,2,'Phuentsholing',1,'2017-04-03 03:40:08','2017-04-03 03:40:08');
INSERT INTO `gewogs` VALUES (16,2,'Sampheling',1,'2017-04-03 03:40:19','2017-04-03 03:40:19');
INSERT INTO `gewogs` VALUES (17,3,'Dorokha',1,'2017-04-03 03:40:32','2017-04-03 03:40:32');
INSERT INTO `gewogs` VALUES (18,3,'Drujegang',1,'2017-04-03 03:40:44','2017-04-03 03:40:44');
INSERT INTO `gewogs` VALUES (19,3,'Gesarling',1,'2017-04-03 03:40:57','2017-04-03 03:40:57');
INSERT INTO `gewogs` VALUES (20,3,'Goshi',1,'2017-04-03 03:41:14','2017-04-03 03:41:14');
INSERT INTO `gewogs` VALUES (21,3,'Kana',1,'2017-04-03 03:41:26','2017-04-03 03:41:26');
INSERT INTO `gewogs` VALUES (22,3,'Karmaling',1,'2017-04-03 03:41:35','2017-04-03 03:41:35');
INSERT INTO `gewogs` VALUES (23,3,'Khebisa',1,'2017-04-03 03:41:45','2017-04-03 03:41:45');
INSERT INTO `gewogs` VALUES (24,3,'Lajab',1,'2017-04-03 03:41:57','2017-04-03 03:41:57');
INSERT INTO `gewogs` VALUES (25,3,'Lhamoi Zingkha',1,'2017-04-03 03:42:10','2017-04-03 03:42:10');
INSERT INTO `gewogs` VALUES (26,3,'Nichula',1,'2017-04-03 03:42:19','2017-04-03 03:42:19');
INSERT INTO `gewogs` VALUES (27,3,'Trashiding',1,'2017-04-03 03:42:38','2017-04-03 03:42:38');
INSERT INTO `gewogs` VALUES (28,3,'Tsangkha',1,'2017-04-03 03:42:47','2017-04-03 03:42:47');
INSERT INTO `gewogs` VALUES (29,3,'Tsendagang',1,'2017-04-03 03:42:57','2017-04-03 03:42:57');
INSERT INTO `gewogs` VALUES (30,3,'Tseza',1,'2017-04-03 03:43:06','2017-04-03 03:43:06');
INSERT INTO `gewogs` VALUES (31,4,'Khamaed',1,'2017-04-03 03:43:20','2017-04-03 03:43:20');
INSERT INTO `gewogs` VALUES (32,4,'Khatoe',1,'2017-04-03 03:43:30','2017-04-03 03:43:30');
INSERT INTO `gewogs` VALUES (33,4,'Laya',1,'2017-04-03 03:43:38','2017-04-03 03:43:38');
INSERT INTO `gewogs` VALUES (34,4,'Lunana',1,'2017-04-03 03:43:46','2017-04-03 03:43:46');
INSERT INTO `gewogs` VALUES (35,5,'Bji',1,'2017-04-03 03:44:02','2017-04-03 03:44:02');
INSERT INTO `gewogs` VALUES (36,5,'Gakiling',1,'2017-04-03 03:44:13','2017-04-03 03:44:13');
INSERT INTO `gewogs` VALUES (37,5,'Katsho',1,'2017-04-03 03:44:26','2017-04-03 03:44:26');
INSERT INTO `gewogs` VALUES (38,5,'Samar',1,'2017-04-03 03:44:35','2017-04-03 03:44:35');
INSERT INTO `gewogs` VALUES (39,5,'Sangbay',1,'2017-04-03 03:44:46','2017-04-03 03:44:46');
INSERT INTO `gewogs` VALUES (40,5,'Uesu',1,'2017-04-03 03:44:54','2017-04-03 03:44:54');
INSERT INTO `gewogs` VALUES (41,6,'Khoma',1,'2017-04-03 03:45:12','2017-04-03 03:45:12');
INSERT INTO `gewogs` VALUES (42,6,'Jarey',1,'2017-04-03 03:45:21','2017-04-03 03:45:21');
INSERT INTO `gewogs` VALUES (43,6,'Kurtoed',1,'2017-04-03 03:45:30','2017-04-03 03:45:30');
INSERT INTO `gewogs` VALUES (44,6,'Menbi',1,'2017-04-03 03:45:37','2017-04-03 03:45:37');
INSERT INTO `gewogs` VALUES (45,6,'Minjay',1,'2017-04-03 03:45:46','2017-04-03 03:45:46');
INSERT INTO `gewogs` VALUES (46,6,'Tsenkhar',1,'2017-04-03 03:45:56','2017-04-03 03:45:56');
INSERT INTO `gewogs` VALUES (47,7,'Balam',1,'2017-04-03 03:46:12','2017-04-03 03:46:12');
INSERT INTO `gewogs` VALUES (48,7,'Chali',1,'2017-04-03 03:46:20','2017-04-03 03:46:20');
INSERT INTO `gewogs` VALUES (49,7,'Chaskhar',1,'2017-04-03 03:46:31','2017-04-03 03:46:31');
INSERT INTO `gewogs` VALUES (50,7,'Drametse',1,'2017-04-03 03:46:42','2017-04-03 03:46:42');
INSERT INTO `gewogs` VALUES (51,7,'Drepong',1,'2017-04-03 03:46:52','2017-04-03 03:46:52');
INSERT INTO `gewogs` VALUES (52,6,'Gongdue',1,'2017-04-03 03:47:02','2017-04-03 03:47:02');
INSERT INTO `gewogs` VALUES (53,7,'Jurmey',1,'2017-04-03 03:47:14','2017-04-03 03:47:14');
INSERT INTO `gewogs` VALUES (54,7,'Kengkhar',1,'2017-04-03 03:47:24','2017-04-03 03:47:24');
INSERT INTO `gewogs` VALUES (55,7,'Mongar',1,'2017-04-03 03:47:33','2017-04-03 03:47:33');
INSERT INTO `gewogs` VALUES (56,7,'Narang',1,'2017-04-03 03:47:43','2017-04-03 03:47:43');
INSERT INTO `gewogs` VALUES (57,7,'Ngatshang',1,'2017-04-03 03:47:58','2017-04-03 03:47:58');
INSERT INTO `gewogs` VALUES (58,7,'Saling',1,'2017-04-03 03:48:08','2017-04-03 03:48:08');
INSERT INTO `gewogs` VALUES (59,7,'Shermuhoong',1,'2017-04-03 03:48:28','2017-04-03 03:48:28');
INSERT INTO `gewogs` VALUES (60,7,'Silambi',1,'2017-04-03 03:48:36','2017-04-03 03:48:36');
INSERT INTO `gewogs` VALUES (61,7,'Thangrong',1,'2017-04-03 03:48:48','2017-04-03 03:48:48');
INSERT INTO `gewogs` VALUES (62,7,'Tsakaling',1,'2017-04-03 03:48:59','2017-04-03 03:48:59');
INSERT INTO `gewogs` VALUES (63,7,'Tsamang',1,'2017-04-03 03:49:07','2017-04-03 03:49:07');
INSERT INTO `gewogs` VALUES (64,8,'Dokar',1,'2017-04-03 03:49:17','2017-04-03 03:49:17');
INSERT INTO `gewogs` VALUES (65,8,'Dopshari',1,'2017-04-03 03:49:27','2017-04-03 03:49:27');
INSERT INTO `gewogs` VALUES (66,8,'Doteng',1,'2017-04-03 03:49:36','2017-04-03 03:49:36');
INSERT INTO `gewogs` VALUES (67,8,'Hungrel',1,'2017-04-03 03:49:45','2017-04-03 03:49:45');
INSERT INTO `gewogs` VALUES (68,8,'Lamgong',1,'2017-04-03 03:49:56','2017-04-03 03:49:56');
INSERT INTO `gewogs` VALUES (69,8,'Lungnyi',1,'2017-04-03 03:50:07','2017-04-03 03:50:07');
INSERT INTO `gewogs` VALUES (70,8,'Naja',1,'2017-04-03 03:50:16','2017-04-03 03:50:16');
INSERT INTO `gewogs` VALUES (71,8,'Shapa',1,'2017-04-03 03:50:26','2017-04-03 03:50:26');
INSERT INTO `gewogs` VALUES (72,8,'Tsento',1,'2017-04-03 03:50:36','2017-04-03 03:50:36');
INSERT INTO `gewogs` VALUES (73,8,'Wangchang',1,'2017-04-03 03:50:48','2017-04-03 03:50:48');
INSERT INTO `gewogs` VALUES (74,9,'Chimoong',1,'2017-04-03 03:51:01','2017-04-03 03:51:01');
INSERT INTO `gewogs` VALUES (75,8,'Chokhorling',1,'2017-04-03 03:51:16','2017-04-03 03:51:16');
INSERT INTO `gewogs` VALUES (76,9,'Chongshing',1,'2017-04-03 03:51:29','2017-04-03 03:51:29');
INSERT INTO `gewogs` VALUES (77,9,'Dechheling',1,'2017-04-03 03:51:41','2017-04-03 03:51:41');
INSERT INTO `gewogs` VALUES (78,9,'Dungmaed',1,'2017-04-03 03:51:52','2017-04-03 03:51:52');
INSERT INTO `gewogs` VALUES (79,9,'Khar',1,'2017-04-03 03:51:59','2017-04-03 03:51:59');
INSERT INTO `gewogs` VALUES (80,9,'Nanong',1,'2017-04-03 03:52:07','2017-04-03 03:52:07');
INSERT INTO `gewogs` VALUES (81,9,'Norbugang',1,'2017-04-03 03:52:16','2017-04-03 03:52:16');
INSERT INTO `gewogs` VALUES (82,9,'Shumar',1,'2017-04-03 03:52:26','2017-04-03 03:52:26');
INSERT INTO `gewogs` VALUES (83,9,'Yurung',1,'2017-04-03 03:52:34','2017-04-03 03:52:34');
INSERT INTO `gewogs` VALUES (84,9,'Zobel',1,'2017-04-03 03:52:43','2017-04-03 03:52:43');
INSERT INTO `gewogs` VALUES (85,10,'Barp',1,'2017-04-03 03:52:56','2017-04-03 03:52:56');
INSERT INTO `gewogs` VALUES (86,10,'Chhubug',1,'2017-04-03 03:53:07','2017-04-03 03:53:07');
INSERT INTO `gewogs` VALUES (87,10,'Dzomi',1,'2017-04-03 03:53:17','2017-04-03 03:53:17');
INSERT INTO `gewogs` VALUES (88,10,'Goenshari',1,'2017-04-03 04:03:40','2017-04-03 04:03:40');
INSERT INTO `gewogs` VALUES (89,10,'Guma',1,'2017-04-03 04:04:00','2017-04-03 04:04:00');
INSERT INTO `gewogs` VALUES (90,10,'Kabisa',1,'2017-04-03 04:04:10','2017-04-03 04:04:10');
INSERT INTO `gewogs` VALUES (91,10,'Lingmukha',1,'2017-04-03 04:09:37','2017-04-03 04:09:37');
INSERT INTO `gewogs` VALUES (92,10,'Shenga Bjemi',1,'2017-04-03 04:09:57','2017-04-03 04:09:57');
INSERT INTO `gewogs` VALUES (93,10,'Talo',1,'2017-04-03 04:10:09','2017-04-03 04:10:09');
INSERT INTO `gewogs` VALUES (94,10,'Toepisa',1,'2017-04-03 04:10:22','2017-04-03 04:10:22');
INSERT INTO `gewogs` VALUES (95,10,'Toewang',1,'2017-04-03 04:10:33','2017-04-03 04:10:33');
INSERT INTO `gewogs` VALUES (96,11,'Dewathang',1,'2017-04-03 04:10:52','2017-04-03 04:10:52');
INSERT INTO `gewogs` VALUES (97,11,'Gomdar',1,'2017-04-03 04:11:03','2017-04-03 04:11:03');
INSERT INTO `gewogs` VALUES (98,11,'Langchenphu',1,'2017-04-03 04:11:18','2017-04-03 04:11:18');
INSERT INTO `gewogs` VALUES (99,11,'Lauri',1,'2017-04-03 04:11:33','2017-04-03 04:11:33');
INSERT INTO `gewogs` VALUES (100,11,'Martshala',1,'2017-04-03 04:11:45','2017-04-03 04:11:45');
INSERT INTO `gewogs` VALUES (101,11,'Orong',1,'2017-04-03 04:11:53','2017-04-03 04:11:53');
INSERT INTO `gewogs` VALUES (102,11,'Pemathang',1,'2017-04-03 04:12:03','2017-04-03 04:12:03');
INSERT INTO `gewogs` VALUES (103,11,'Phuntshothang',1,'2017-04-03 04:13:32','2017-04-03 04:13:32');
INSERT INTO `gewogs` VALUES (104,11,'Samrang',1,'2017-04-03 04:13:41','2017-04-03 04:13:41');
INSERT INTO `gewogs` VALUES (105,11,'Serthi',1,'2017-04-03 04:13:51','2017-04-03 04:13:51');
INSERT INTO `gewogs` VALUES (106,11,'Wangphu',1,'2017-04-03 04:14:00','2017-04-03 04:14:00');
INSERT INTO `gewogs` VALUES (107,12,'Dungtoe',1,'2017-04-03 04:14:13','2017-04-03 04:14:13');
INSERT INTO `gewogs` VALUES (108,12,'Dophoogchen',1,'2017-04-03 04:14:26','2017-04-03 04:14:26');
INSERT INTO `gewogs` VALUES (109,12,'Duenchukha',1,'2017-04-03 04:14:40','2017-04-03 04:14:40');
INSERT INTO `gewogs` VALUES (110,12,'Namgaychhoeling',1,'2017-04-03 04:15:01','2017-04-03 04:15:01');
INSERT INTO `gewogs` VALUES (111,12,'Norbugang',1,'2017-04-03 04:15:10','2017-04-03 04:15:10');
INSERT INTO `gewogs` VALUES (112,12,'Norgaygang',1,'2017-04-03 04:15:28','2017-04-03 04:15:28');
INSERT INTO `gewogs` VALUES (113,11,'Pemaling',1,'2017-04-03 04:15:38','2017-04-03 04:15:38');
INSERT INTO `gewogs` VALUES (114,12,'Phuentshopelri',1,'2017-04-03 04:15:52','2017-04-03 04:15:52');
INSERT INTO `gewogs` VALUES (115,12,'Samtse',1,'2017-04-03 04:16:01','2017-04-03 04:16:01');
INSERT INTO `gewogs` VALUES (116,12,'Sangngangchhoeling',1,'2017-04-03 04:16:26','2017-04-03 04:16:26');
INSERT INTO `gewogs` VALUES (117,12,'Tading',1,'2017-04-03 04:16:34','2017-04-03 04:16:34');
INSERT INTO `gewogs` VALUES (118,12,'Tashicholing',1,'2017-04-03 04:16:47','2017-04-03 04:16:47');
INSERT INTO `gewogs` VALUES (119,12,'Tendruk',1,'2017-04-03 04:16:59','2017-04-03 04:16:59');
INSERT INTO `gewogs` VALUES (120,12,'Ugentse',1,'2017-04-03 04:17:11','2017-04-03 04:17:11');
INSERT INTO `gewogs` VALUES (121,12,'Yoeseltse',1,'2017-04-03 04:17:24','2017-04-03 04:17:24');
INSERT INTO `gewogs` VALUES (122,13,'Chhuzagang',1,'2017-04-03 04:17:41','2017-04-03 04:17:41');
INSERT INTO `gewogs` VALUES (123,13,'Chhudzom',1,'2017-04-03 04:17:53','2017-04-03 04:17:53');
INSERT INTO `gewogs` VALUES (124,13,'Dekiling',1,'2017-04-03 04:18:03','2017-04-03 04:18:03');
INSERT INTO `gewogs` VALUES (125,13,'Gakiling',1,'2017-04-03 04:18:16','2017-04-03 04:18:16');
INSERT INTO `gewogs` VALUES (126,12,'Gelephu',1,'2017-04-03 04:18:26','2017-04-03 04:18:26');
INSERT INTO `gewogs` VALUES (127,13,'Jigmechholing',1,'2017-04-03 04:18:40','2017-04-03 04:18:40');
INSERT INTO `gewogs` VALUES (128,13,'Samtenling',1,'2017-04-03 04:18:50','2017-04-03 04:18:50');
INSERT INTO `gewogs` VALUES (129,13,'Senggey',1,'2017-04-03 04:19:07','2017-04-03 04:19:07');
INSERT INTO `gewogs` VALUES (130,13,'Sherzhong',1,'2017-04-03 04:19:24','2017-04-03 04:19:24');
INSERT INTO `gewogs` VALUES (131,13,'Shompangkha',1,'2017-04-03 04:19:39','2017-04-03 04:19:39');
INSERT INTO `gewogs` VALUES (132,13,'Tareythang',1,'2017-04-03 04:19:56','2017-04-03 04:19:56');
INSERT INTO `gewogs` VALUES (133,13,'Umling',1,'2017-04-03 04:20:05','2017-04-03 04:20:05');
INSERT INTO `gewogs` VALUES (134,14,'Chang',1,'2017-04-03 04:20:18','2017-04-03 04:20:18');
INSERT INTO `gewogs` VALUES (135,14,'Darkala',1,'2017-04-03 04:20:35','2017-04-03 04:20:35');
INSERT INTO `gewogs` VALUES (136,14,'Genye',1,'2017-04-03 04:20:46','2017-04-03 04:20:46');
INSERT INTO `gewogs` VALUES (137,14,'Kawang',1,'2017-04-03 04:20:58','2017-04-03 04:20:58');
INSERT INTO `gewogs` VALUES (138,14,'Lingzhi',1,'2017-04-03 04:21:08','2017-04-03 04:21:08');
INSERT INTO `gewogs` VALUES (139,14,'Mewang',1,'2017-04-03 04:21:18','2017-04-03 04:21:18');
INSERT INTO `gewogs` VALUES (140,14,'Naro',1,'2017-04-03 04:21:27','2017-04-03 04:21:27');
INSERT INTO `gewogs` VALUES (141,14,'Soe',1,'2017-04-03 04:21:35','2017-04-03 04:21:35');
INSERT INTO `gewogs` VALUES (142,15,'Bartsham',1,'2017-04-03 04:21:50','2017-04-03 04:21:50');
INSERT INTO `gewogs` VALUES (143,15,'Bidung',1,'2017-04-03 04:22:00','2017-04-03 04:22:00');
INSERT INTO `gewogs` VALUES (144,15,'Kanglung',1,'2017-04-03 04:22:09','2017-04-03 04:22:09');
INSERT INTO `gewogs` VALUES (145,15,'Kamgpur',1,'2017-04-03 04:22:22','2017-04-03 04:22:22');
INSERT INTO `gewogs` VALUES (146,15,'Khaling',1,'2017-04-03 04:22:38','2017-04-03 04:22:38');
INSERT INTO `gewogs` VALUES (147,15,'Lumang',1,'2017-04-03 04:22:51','2017-04-03 04:22:51');
INSERT INTO `gewogs` VALUES (148,15,'Merak',1,'2017-04-03 04:22:59','2017-04-03 04:22:59');
INSERT INTO `gewogs` VALUES (149,15,'Phongmed',1,'2017-04-03 04:23:10','2017-04-03 04:23:10');
INSERT INTO `gewogs` VALUES (150,15,'Radi',1,'2017-04-03 04:23:17','2017-04-03 04:23:17');
INSERT INTO `gewogs` VALUES (151,15,'Sagteng',1,'2017-04-03 04:23:28','2017-04-03 04:23:28');
INSERT INTO `gewogs` VALUES (152,15,'Samkhar',1,'2017-04-03 04:23:45','2017-04-03 04:23:45');
INSERT INTO `gewogs` VALUES (153,15,'Thrimshing',1,'2017-04-03 04:23:57','2017-04-03 04:23:57');
INSERT INTO `gewogs` VALUES (154,15,'Uzorong',1,'2017-04-03 04:24:07','2017-04-03 04:24:07');
INSERT INTO `gewogs` VALUES (155,15,'Yangnyer',1,'2017-04-03 04:24:19','2017-04-03 04:24:19');
INSERT INTO `gewogs` VALUES (156,16,'Bumdeling',1,'2017-04-03 04:24:40','2017-04-03 04:24:40');
INSERT INTO `gewogs` VALUES (157,16,'Jamkhar',1,'2017-04-03 04:24:50','2017-04-03 04:24:50');
INSERT INTO `gewogs` VALUES (158,16,'Khamdang',1,'2017-04-03 04:25:02','2017-04-03 04:25:02');
INSERT INTO `gewogs` VALUES (159,16,'Ramjar',1,'2017-04-03 04:25:11','2017-04-03 04:25:11');
INSERT INTO `gewogs` VALUES (160,16,'Toetsho',1,'2017-04-03 04:25:23','2017-04-03 04:25:23');
INSERT INTO `gewogs` VALUES (161,16,'Tomzhang',1,'2017-04-03 04:25:35','2017-04-03 04:25:35');
INSERT INTO `gewogs` VALUES (162,16,'Yalang',1,'2017-04-03 04:25:45','2017-04-03 04:25:45');
INSERT INTO `gewogs` VALUES (163,16,'Yangtse',1,'2017-04-03 04:25:53','2017-04-03 04:25:53');
INSERT INTO `gewogs` VALUES (164,17,'Dragteng',1,'2017-04-03 04:26:06','2017-04-03 04:26:06');
INSERT INTO `gewogs` VALUES (165,17,'Korphoog',1,'2017-04-03 04:26:17','2017-04-03 04:26:17');
INSERT INTO `gewogs` VALUES (166,17,'Langthil',1,'2017-04-03 04:27:26','2017-04-03 04:27:26');
INSERT INTO `gewogs` VALUES (167,17,'Nubi',1,'2017-04-03 04:27:36','2017-04-03 04:27:36');
INSERT INTO `gewogs` VALUES (168,17,'Tangsibji',1,'2017-04-03 04:27:51','2017-04-03 04:27:51');
INSERT INTO `gewogs` VALUES (169,18,'Barshong',1,'2017-04-03 04:28:04','2017-04-03 04:28:04');
INSERT INTO `gewogs` VALUES (170,18,'Dunglegang',1,'2017-04-03 04:28:29','2017-04-03 04:28:29');
INSERT INTO `gewogs` VALUES (171,18,'Gosarling',1,'2017-04-03 04:29:40','2017-04-03 04:29:40');
INSERT INTO `gewogs` VALUES (172,18,'Kikhorthang',1,'2017-04-03 04:29:54','2017-04-03 04:29:54');
INSERT INTO `gewogs` VALUES (173,18,'Mendrelgang',1,'2017-04-03 04:30:06','2017-04-03 04:30:06');
INSERT INTO `gewogs` VALUES (174,18,'Patshaling',1,'2017-04-03 04:30:22','2017-04-03 04:30:22');
INSERT INTO `gewogs` VALUES (175,18,'Phuntenchu',1,'2017-04-03 04:30:37','2017-04-03 04:30:37');
INSERT INTO `gewogs` VALUES (176,18,'Rangthangling',1,'2017-04-03 04:30:51','2017-04-03 04:30:51');
INSERT INTO `gewogs` VALUES (177,18,'Semjong',1,'2017-04-03 04:31:02','2017-04-03 04:31:02');
INSERT INTO `gewogs` VALUES (178,18,'Sergithang',1,'2017-04-03 04:31:16','2017-04-03 04:31:16');
INSERT INTO `gewogs` VALUES (179,18,'Tsirangtoe',1,'2017-04-03 04:31:29','2017-04-03 04:31:29');
INSERT INTO `gewogs` VALUES (180,19,'Athang',1,'2017-04-03 04:31:43','2017-04-03 04:31:43');
INSERT INTO `gewogs` VALUES (181,19,'Bjendag',1,'2017-04-03 04:31:58','2017-04-03 04:31:58');
INSERT INTO `gewogs` VALUES (182,19,'Darkar',1,'2017-04-03 04:32:07','2017-04-03 04:32:07');
INSERT INTO `gewogs` VALUES (183,19,'Dangchu',1,'2017-04-03 04:32:16','2017-04-03 04:32:16');
INSERT INTO `gewogs` VALUES (184,19,'Gangteng',1,'2017-04-03 04:32:26','2017-04-03 04:32:26');
INSERT INTO `gewogs` VALUES (185,19,'Gasetsho Gom',1,'2017-04-03 04:32:41','2017-04-03 04:32:41');
INSERT INTO `gewogs` VALUES (186,19,'Gasetsho Wom',1,'2017-04-03 04:32:56','2017-04-03 04:32:56');
INSERT INTO `gewogs` VALUES (187,19,'Kazhi',1,'2017-04-03 04:33:07','2017-04-03 04:33:07');
INSERT INTO `gewogs` VALUES (188,19,'Nahi',1,'2017-04-03 04:33:14','2017-04-03 04:33:14');
INSERT INTO `gewogs` VALUES (189,19,'Nyisho',1,'2017-04-03 04:33:24','2017-04-03 04:33:24');
INSERT INTO `gewogs` VALUES (190,19,'Phangyul',1,'2017-04-03 04:33:33','2017-04-03 04:33:33');
INSERT INTO `gewogs` VALUES (191,19,'Phobji',1,'2017-04-03 04:33:43','2017-04-03 04:33:43');
INSERT INTO `gewogs` VALUES (192,19,'Ruepisa',1,'2017-04-03 04:33:56','2017-04-03 04:33:56');
INSERT INTO `gewogs` VALUES (193,19,'Sephu',1,'2017-04-03 04:34:05','2017-04-03 04:34:05');
INSERT INTO `gewogs` VALUES (194,19,'Thedtsho',1,'2017-04-03 04:34:22','2017-04-03 04:34:22');
INSERT INTO `gewogs` VALUES (195,20,'Bardo',1,'2017-04-03 04:34:35','2017-04-03 04:34:35');
INSERT INTO `gewogs` VALUES (196,20,'Bjoka',1,'2017-04-03 04:34:46','2017-04-03 04:34:46');
INSERT INTO `gewogs` VALUES (197,20,'Goshing',1,'2017-04-03 04:34:56','2017-04-03 04:34:56');
INSERT INTO `gewogs` VALUES (198,20,'Nangkor',1,'2017-04-03 04:35:07','2017-04-03 04:35:07');
INSERT INTO `gewogs` VALUES (199,20,'Ngangla',1,'2017-04-03 04:35:20','2017-04-03 04:35:20');
INSERT INTO `gewogs` VALUES (200,20,'Phangkhar',1,'2017-04-03 04:35:52','2017-04-03 04:35:52');
INSERT INTO `gewogs` VALUES (201,20,'Shingkhar',1,'2017-04-03 04:36:03','2017-04-03 04:36:03');
INSERT INTO `gewogs` VALUES (202,20,'Trong',1,'2017-04-03 04:36:14','2017-04-03 04:36:14');
/*!40000 ALTER TABLE `gewogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (88,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` VALUES (89,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` VALUES (90,'2017_03_10_095128_create_mst_countries_table',1);
INSERT INTO `migrations` VALUES (91,'2017_03_13_055224_create_mst_dzongkhags_table',1);
INSERT INTO `migrations` VALUES (92,'2017_03_13_073400_create_sport__organizations_table',1);
INSERT INTO `migrations` VALUES (93,'2017_03_13_081253_create_enum_sport_orgs_table',1);
INSERT INTO `migrations` VALUES (94,'2017_03_13_082959_create_tbl_sport_org_contact_people_table',1);
INSERT INTO `migrations` VALUES (95,'2017_03_13_085826_create_tbl_sport_org_managements_table',1);
INSERT INTO `migrations` VALUES (96,'2017_03_13_093545_create_tbl_sport_org_advisories_table',1);
INSERT INTO `migrations` VALUES (97,'2017_03_13_103333_create_tbl__s_k_r_as_table',1);
INSERT INTO `migrations` VALUES (98,'2017_03_14_045436_create_tbl__s_k_r_a_activities_table',1);
INSERT INTO `migrations` VALUES (99,'2017_03_17_070407_create_roles_table',1);
INSERT INTO `migrations` VALUES (100,'2017_03_19_153632_create_training_infos_table',1);
INSERT INTO `migrations` VALUES (101,'2017_03_20_040440_create_tbl_sport_org_activities_table',1);
INSERT INTO `migrations` VALUES (102,'2017_03_20_040755_create_athlete_informations_table',1);
INSERT INTO `migrations` VALUES (103,'2017_03_20_163911_create_tbl_sport_org_activities_approveds_table',1);
INSERT INTO `migrations` VALUES (104,'2017_03_21_085210_create_tbl_achievements_table',1);
INSERT INTO `migrations` VALUES (105,'2017_03_25_060014_create_athlete_bioinformations_table',2);
INSERT INTO `migrations` VALUES (106,'2017_03_25_062316_create_athlete_occupations_table',2);
INSERT INTO `migrations` VALUES (107,'2017_03_25_063556_create_associated__sports_table',2);
INSERT INTO `migrations` VALUES (108,'2017_03_26_080607_create_athlete_addresses_table',2);
INSERT INTO `migrations` VALUES (109,'2017_03_26_151347_create_athlete_qualifications_table',2);
INSERT INTO `migrations` VALUES (110,'2017_03_27_060052_create_dungkhags_table',2);
INSERT INTO `migrations` VALUES (111,'2017_03_29_055935_create_gewogs_table',3);
INSERT INTO `migrations` VALUES (112,'2017_04_04_050710_create_checkboxes_table',4);
INSERT INTO `migrations` VALUES (113,'2017_04_04_083554_create_training_schedules_table',5);
INSERT INTO `migrations` VALUES (114,'2017_04_04_083933_create_enum_daytables_table',5);
INSERT INTO `migrations` VALUES (115,'2017_04_04_085503_create_enum_session_types_table',6);
INSERT INTO `migrations` VALUES (116,'2017_04_04_103007_create_athlete_training_schedules_table',7);
INSERT INTO `migrations` VALUES (117,'2017_04_04_035925_create_enum_genders_table',8);
INSERT INTO `migrations` VALUES (118,'2017_04_04_061033_create_enum_qualification_levels_table',8);
INSERT INTO `migrations` VALUES (119,'2017_04_04_080509_create_tbl__coaches_table',8);
INSERT INTO `migrations` VALUES (120,'2017_04_06_035017_create_athelete_training_attendances_table',9);
INSERT INTO `migrations` VALUES (121,'2017_04_05_053714_create_coach_seperations_table',10);
INSERT INTO `migrations` VALUES (122,'2017_04_06_042754_create_tbl_game_details_table',10);
INSERT INTO `migrations` VALUES (123,'2017_04_06_043653_create_enum__game_types_table',10);
INSERT INTO `migrations` VALUES (124,'2017_04_06_045047_create_tbl_sport_coaches_table',10);
INSERT INTO `migrations` VALUES (125,'2017_04_06_064004_create_tbl_team_members_table',10);
INSERT INTO `migrations` VALUES (126,'2017_04_07_045033_create_tbl_athlete_disciplinaries_table',11);
INSERT INTO `migrations` VALUES (127,'2017_04_07_075314_create_tbl_athlete_achievements_table',11);
INSERT INTO `migrations` VALUES (128,'2017_04_07_083121_create_enum__medals_table',11);
INSERT INTO `migrations` VALUES (129,'2017_04_07_103950_create_enum_five_year_plans_table',12);
INSERT INTO `migrations` VALUES (130,'2017_04_10_045400_create_tbl__update_sport_activities_table',13);
INSERT INTO `migrations` VALUES (131,'2017_04_10_082924_create_tbl_proposed_sport_org_activities_table',14);
INSERT INTO `migrations` VALUES (132,'2017_04_10_090547_create_enum_quarters_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_countries`
--

DROP TABLE IF EXISTS `mst_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_countries` (
  `country_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `country_nationality` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_countries`
--

LOCK TABLES `mst_countries` WRITE;
/*!40000 ALTER TABLE `mst_countries` DISABLE KEYS */;
INSERT INTO `mst_countries` VALUES (1,'Afghanistan','','AFG',0,'2017-03-24 23:05:21','2017-03-24 23:05:21',1);
INSERT INTO `mst_countries` VALUES (2,'Albania','','ALB',0,'2017-03-24 23:05:54','2017-03-24 23:05:54',1);
INSERT INTO `mst_countries` VALUES (3,'Argentina','','ARG',0,'2017-03-24 23:06:21','2017-03-24 23:06:21',1);
INSERT INTO `mst_countries` VALUES (4,'Australia','','AUS',0,'2017-03-24 23:06:54','2017-03-24 23:06:54',1);
INSERT INTO `mst_countries` VALUES (5,'Austria','','AUT',0,'2017-03-24 23:07:18','2017-03-24 23:07:18',1);
INSERT INTO `mst_countries` VALUES (6,'Bangladesh','','BGD',0,'2017-03-24 23:07:42','2017-03-24 23:07:42',1);
INSERT INTO `mst_countries` VALUES (7,'Belgium','','BEL',0,'2017-03-24 23:10:04','2017-03-24 23:10:04',1);
INSERT INTO `mst_countries` VALUES (8,'Bhutan','Bhutanese','BTN',0,'2017-03-24 23:10:56','2017-04-04 23:29:25',1);
INSERT INTO `mst_countries` VALUES (9,'Brazil','','BRA',0,'2017-03-24 23:11:10','2017-03-24 23:11:10',1);
INSERT INTO `mst_countries` VALUES (10,'Cameroon','','CMR',1,'2017-03-24 23:12:11','2017-03-30 02:32:15',1);
INSERT INTO `mst_countries` VALUES (11,'Canada','Canadian','CAN',0,'2017-03-24 23:12:33','2017-04-04 23:29:52',1);
INSERT INTO `mst_countries` VALUES (12,'Chile','','CHL',0,'2017-03-24 23:12:50','2017-03-24 23:12:50',1);
INSERT INTO `mst_countries` VALUES (13,'China','','CHN',0,'2017-03-24 23:13:04','2017-03-24 23:13:04',1);
INSERT INTO `mst_countries` VALUES (14,'Colombia','','COL',0,'2017-03-24 23:13:27','2017-03-24 23:13:27',1);
INSERT INTO `mst_countries` VALUES (15,'France','','FRA',0,'2017-03-24 23:13:52','2017-03-24 23:13:52',1);
INSERT INTO `mst_countries` VALUES (16,'Germany','','DEU',0,'2017-03-24 23:14:20','2017-03-24 23:14:20',1);
INSERT INTO `mst_countries` VALUES (17,'India','Indian','IND',0,'2017-03-24 23:14:42','2017-04-04 23:29:41',1);
INSERT INTO `mst_countries` VALUES (18,'Indonesia','','IDN',0,'2017-03-24 23:15:06','2017-03-24 23:15:06',1);
INSERT INTO `mst_countries` VALUES (19,'Italy','','ITA',0,'2017-03-24 23:15:33','2017-03-24 23:15:33',1);
INSERT INTO `mst_countries` VALUES (20,'Japan','','JPN',0,'2017-03-24 23:15:48','2017-03-24 23:15:48',1);
/*!40000 ALTER TABLE `mst_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_dzongkhags`
--

DROP TABLE IF EXISTS `mst_dzongkhags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_dzongkhags` (
  `dzongkhag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `dzongkhag_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dzongkhag_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`dzongkhag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_dzongkhags`
--

LOCK TABLES `mst_dzongkhags` WRITE;
/*!40000 ALTER TABLE `mst_dzongkhags` DISABLE KEYS */;
INSERT INTO `mst_dzongkhags` VALUES (1,8,'Bumthang','BU',0,'2017-03-24 23:39:15','2017-03-24 23:40:36',1);
INSERT INTO `mst_dzongkhags` VALUES (2,8,'Chhukha','CH',0,'2017-03-24 23:39:33','2017-03-24 23:40:41',1);
INSERT INTO `mst_dzongkhags` VALUES (3,8,'Dagana','DA',0,'2017-03-24 23:40:05','2017-03-24 23:40:47',1);
INSERT INTO `mst_dzongkhags` VALUES (4,8,'Gasa','GA',0,'2017-03-24 23:40:23','2017-03-24 23:40:53',1);
INSERT INTO `mst_dzongkhags` VALUES (5,8,'Haa','HA',0,'2017-03-24 23:41:09','2017-03-24 23:41:09',1);
INSERT INTO `mst_dzongkhags` VALUES (6,8,'Lhuentse','LH',0,'2017-03-24 23:41:26','2017-03-24 23:41:26',1);
INSERT INTO `mst_dzongkhags` VALUES (7,8,'Mongar','MO',0,'2017-03-24 23:41:44','2017-03-24 23:41:44',1);
INSERT INTO `mst_dzongkhags` VALUES (8,8,'Paro','PA',0,'2017-03-24 23:42:00','2017-03-24 23:42:00',1);
INSERT INTO `mst_dzongkhags` VALUES (9,8,'PemaGatshel','PG',0,'2017-03-24 23:42:19','2017-03-24 23:42:19',1);
INSERT INTO `mst_dzongkhags` VALUES (10,3,'Punakha','PU',0,'2017-03-24 23:42:44','2017-03-30 02:34:02',1);
INSERT INTO `mst_dzongkhags` VALUES (11,8,'Samdrup Jongkhar','SJ',0,'2017-03-24 23:43:08','2017-03-24 23:43:08',1);
INSERT INTO `mst_dzongkhags` VALUES (12,8,'Samtse','SA',0,'2017-03-24 23:43:38','2017-03-24 23:43:38',1);
INSERT INTO `mst_dzongkhags` VALUES (13,8,'Sarpang','SP',0,'2017-03-24 23:44:05','2017-03-24 23:44:05',1);
INSERT INTO `mst_dzongkhags` VALUES (14,8,'Thimphu','TH',0,'2017-03-24 23:44:28','2017-03-24 23:44:28',1);
INSERT INTO `mst_dzongkhags` VALUES (15,8,'Trashigang','TG',0,'2017-03-24 23:44:46','2017-03-24 23:44:46',1);
INSERT INTO `mst_dzongkhags` VALUES (16,8,'Trashigang','TG',0,'2017-03-24 23:45:04','2017-03-24 23:45:04',1);
INSERT INTO `mst_dzongkhags` VALUES (17,8,'Trongsa','TR',0,'2017-03-24 23:45:21','2017-03-24 23:45:21',1);
INSERT INTO `mst_dzongkhags` VALUES (18,8,'Tsirang','TS',0,'2017-03-24 23:45:52','2017-03-24 23:45:52',1);
INSERT INTO `mst_dzongkhags` VALUES (19,8,'Wangdue Phodrang','WP',0,'2017-03-24 23:46:12','2017-03-24 23:46:49',1);
INSERT INTO `mst_dzongkhags` VALUES (20,8,'Zhemgang','ZH',0,'2017-03-24 23:46:27','2017-03-24 23:46:27',1);
/*!40000 ALTER TABLE `mst_dzongkhags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','System Administration','2017-03-24 23:02:48','2017-03-24 23:02:48');
INSERT INTO `roles` VALUES (2,'boc','Manages all the activity of Federations','2017-03-24 23:03:05','2017-03-24 23:03:05');
INSERT INTO `roles` VALUES (3,'coach','Maintains detail of each elite athelete','2017-03-24 23:03:29','2017-03-24 23:03:29');
INSERT INTO `roles` VALUES (4,'federation','Manages activity of each federations','2017-03-24 23:04:01','2017-03-24 23:04:01');
INSERT INTO `roles` VALUES (5,'guest','By default user are registered as Guest','2017-03-24 23:04:56','2017-03-24 23:04:56');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sport__organizations`
--

DROP TABLE IF EXISTS `sport__organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sport__organizations` (
  `sport_org_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sport_org_type_id` int(11) NOT NULL,
  `sport_org_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sport_org_abbreviation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sport_org_webaddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sport_org_logo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sport_org_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sport_org_phone` int(11) NOT NULL,
  `sport_org_fax` int(11) NOT NULL,
  `sport_org_office_address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`sport_org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sport__organizations`
--

LOCK TABLES `sport__organizations` WRITE;
/*!40000 ALTER TABLE `sport__organizations` DISABLE KEYS */;
INSERT INTO `sport__organizations` VALUES (1,1,'Bhutan Football Federation','BFF','www.football.com','15590331_1152468634869620_148121968511231600_n.jpg','bff@gmail.com',1234567,1231,'Changlimithang,\r\nThimphu',0,'2017-03-24 23:57:56','2017-03-24 23:57:56',1);
INSERT INTO `sport__organizations` VALUES (2,2,'Bhutan Basketball','bbb','bhutanbasketball.com','country.txt','sdf@fg.com',1234,123,'thimphu',0,'2017-03-28 03:47:59','2017-03-28 03:47:59',1);
INSERT INTO `sport__organizations` VALUES (3,2,'Tabble Tanis Federation','ttf','tabletanis.com','IMG_0013.JPG','ttf@gmail.com',123456,1234,'thimphu,BHutan',0,'2017-04-07 21:31:46','2017-04-07 21:31:46',2);
/*!40000 ALTER TABLE `sport__organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl__coaches`
--

DROP TABLE IF EXISTS `tbl__coaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl__coaches` (
  `coach_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coach_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `coach_fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `coach_mname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `coach_lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `coach_dob` date NOT NULL,
  `country_id` int(11) NOT NULL,
  `coach_phone` int(11) NOT NULL,
  `coach_mobile` int(11) NOT NULL,
  `coach_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `coach_passport` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `coach_appointmentDate` date NOT NULL,
  `coach_expiryDate` date NOT NULL,
  `coach_contactAddress` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `coach_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`coach_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl__coaches`
--

LOCK TABLES `tbl__coaches` WRITE;
/*!40000 ALTER TABLE `tbl__coaches` DISABLE KEYS */;
INSERT INTO `tbl__coaches` VALUES (1,'Ms.','Sonam','d','dema','2017-04-28',8,17572345,12343345,'pema@gmail.com','sddf456','2017-04-08','2017-04-07','wangdue','Volunteer',1,3,'2017-04-04 23:32:21','2017-04-06 21:33:26');
INSERT INTO `tbl__coaches` VALUES (2,'Mr.','Pema','d','Dorji','2017-04-14',8,17572345,12343345,'pema@gmail.com','sdfg5678','2017-04-21','2017-04-14','thimphu','Paid',1,3,'2017-04-04 23:32:59','2017-04-06 12:04:24');
INSERT INTO `tbl__coaches` VALUES (3,'Mrs.','Sonam','dorji','Wangmo','2017-04-15',8,1234355,124456,'dorji@gmail.com','123453gjhk','2017-04-15','2017-04-21','fghgjg','Volunteer',0,3,'2017-04-06 12:05:34','2017-04-06 12:05:34');
INSERT INTO `tbl__coaches` VALUES (4,'Mr.','karma','s','Dorji','2017-04-21',8,1234355,123356657,'karma@gmail.com','123dfdfg','2017-04-14','2017-04-08','thimphu','Paid',0,3,'2017-04-06 21:33:03','2017-04-06 21:33:03');
/*!40000 ALTER TABLE `tbl__coaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl__s_k_r_a_activities`
--

DROP TABLE IF EXISTS `tbl__s_k_r_a_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl__s_k_r_a_activities` (
  `skra_activity_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `five_yr_plan_id` int(11) NOT NULL,
  `sport_org_id` int(11) NOT NULL,
  `skra_id` int(11) NOT NULL,
  `SKRA_activity` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `SKRA_description` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`skra_activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl__s_k_r_a_activities`
--

LOCK TABLES `tbl__s_k_r_a_activities` WRITE;
/*!40000 ALTER TABLE `tbl__s_k_r_a_activities` DISABLE KEYS */;
INSERT INTO `tbl__s_k_r_a_activities` VALUES (3,1,1,4,'Youth Football Development Program','Youth Football Development program implemented','2017-04-07 21:38:36','2017-04-07 21:38:36',2);
INSERT INTO `tbl__s_k_r_a_activities` VALUES (4,1,2,4,'Youth Basketball Development Program','Youth Football Development program implemented','2017-04-07 21:47:53','2017-04-07 22:30:06',2);
INSERT INTO `tbl__s_k_r_a_activities` VALUES (5,2,3,5,'Table Tanis tournament ','Table Tanis tournament both single and double','2017-04-07 22:40:23','2017-04-07 22:40:23',2);
/*!40000 ALTER TABLE `tbl__s_k_r_a_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl__s_k_r_as`
--

DROP TABLE IF EXISTS `tbl__s_k_r_as`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl__s_k_r_as` (
  `skra_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `five_yr_plan_id` int(11) NOT NULL,
  `SKRA_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `SKRA_description` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`skra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl__s_k_r_as`
--

LOCK TABLES `tbl__s_k_r_as` WRITE;
/*!40000 ALTER TABLE `tbl__s_k_r_as` DISABLE KEYS */;
INSERT INTO `tbl__s_k_r_as` VALUES (4,1,'Grassroot programs implemented','Grassroot programs implemented in the dzongkhag','2017-04-07 04:56:06','2017-04-07 04:58:28',2);
INSERT INTO `tbl__s_k_r_as` VALUES (5,2,'Under 12 girls programs ','Under 12 girls programs implemented','2017-04-07 21:49:35','2017-04-07 21:49:35',2);
INSERT INTO `tbl__s_k_r_as` VALUES (6,1,'Winter basket tournament','WInter basket tournament implemented to keep youth engaged','2017-04-07 21:50:47','2017-04-07 21:50:47',2);
INSERT INTO `tbl__s_k_r_as` VALUES (7,1,'summer football programs','summer football programs implemented for under 12','2017-04-07 21:51:40','2017-04-07 21:51:40',2);
INSERT INTO `tbl__s_k_r_as` VALUES (8,2,'under 18 volleyball program','under 18 volleyball program implemented to enhance volleyball skills','2017-04-07 21:52:45','2017-04-07 21:52:45',2);
INSERT INTO `tbl__s_k_r_as` VALUES (9,3,'kjh','uhkj','2017-04-09 22:28:50','2017-04-09 22:28:50',3);
/*!40000 ALTER TABLE `tbl__s_k_r_as` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl__update_sport_activities`
--

DROP TABLE IF EXISTS `tbl__update_sport_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl__update_sport_activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `five_yr_plan_id` int(11) NOT NULL,
  `skra_id` int(11) NOT NULL,
  `skra_activity_id` int(11) NOT NULL,
  `wieghtage` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl__update_sport_activities`
--

LOCK TABLES `tbl__update_sport_activities` WRITE;
/*!40000 ALTER TABLE `tbl__update_sport_activities` DISABLE KEYS */;
INSERT INTO `tbl__update_sport_activities` VALUES (1,1,4,3,70,3,3,'2017-04-10 01:03:37','2017-04-10 01:03:37');
INSERT INTO `tbl__update_sport_activities` VALUES (2,1,5,4,90,3,3,'2017-04-10 03:16:36','2017-04-10 03:16:36');
INSERT INTO `tbl__update_sport_activities` VALUES (3,1,6,4,40,3,3,'2017-04-10 03:30:53','2017-04-10 03:30:53');
/*!40000 ALTER TABLE `tbl__update_sport_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_achievements`
--

DROP TABLE IF EXISTS `tbl_achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_achievements` (
  `achievements_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `actual_timeline` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `actual_capital_expenses` decimal(8,2) NOT NULL,
  `actual_recurring_expenses` decimal(8,2) NOT NULL,
  `actual_achievements` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`achievements_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_achievements`
--

LOCK TABLES `tbl_achievements` WRITE;
/*!40000 ALTER TABLE `tbl_achievements` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_athlete_achievements`
--

DROP TABLE IF EXISTS `tbl_athlete_achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_athlete_achievements` (
  `athlete_achievement_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `athlete_id` int(11) NOT NULL,
  `medal_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `achievement` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`athlete_achievement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_athlete_achievements`
--

LOCK TABLES `tbl_athlete_achievements` WRITE;
/*!40000 ALTER TABLE `tbl_athlete_achievements` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_athlete_achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_athlete_disciplinaries`
--

DROP TABLE IF EXISTS `tbl_athlete_disciplinaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_athlete_disciplinaries` (
  `disciplinary_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `athlete_id` int(11) NOT NULL,
  `date_of_action` date NOT NULL,
  `action_end_date` date NOT NULL,
  `reason` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`disciplinary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_athlete_disciplinaries`
--

LOCK TABLES `tbl_athlete_disciplinaries` WRITE;
/*!40000 ALTER TABLE `tbl_athlete_disciplinaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_athlete_disciplinaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_game_details`
--

DROP TABLE IF EXISTS `tbl_game_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_game_details` (
  `gamesdetail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `venue` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `comments` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gamesdetail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_game_details`
--

LOCK TABLES `tbl_game_details` WRITE;
/*!40000 ALTER TABLE `tbl_game_details` DISABLE KEYS */;
INSERT INTO `tbl_game_details` VALUES (10,2014,2,'football match',8,'changbangdu','2017-04-14','2017-04-21','football friendly match',2,2,'2017-04-07 01:14:59','2017-04-07 01:14:59');
INSERT INTO `tbl_game_details` VALUES (11,2013,2,'basketball',8,'changlingmithang','2017-04-15','2017-04-22','under 12 match',2,2,'2017-04-07 01:16:24','2017-04-07 01:16:24');
INSERT INTO `tbl_game_details` VALUES (12,1967,2,'tenis',8,'changjiji','2017-04-04','2017-04-20','xgfgfjhj',2,2,'2017-04-07 01:44:14','2017-04-07 01:44:14');
/*!40000 ALTER TABLE `tbl_game_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_proposed_sport_org_activities`
--

DROP TABLE IF EXISTS `tbl_proposed_sport_org_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_proposed_sport_org_activities` (
  `activity_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weightage_id` int(11) NOT NULL,
  `activity_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `activity_venue` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `quarter_timeline` int(11) NOT NULL,
  `actual_timeline` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `rgob_budget` decimal(8,2) NOT NULL,
  `external_budget` decimal(8,2) NOT NULL,
  `external_source` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `collaborating_agency` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_proposed_sport_org_activities`
--

LOCK TABLES `tbl_proposed_sport_org_activities` WRITE;
/*!40000 ALTER TABLE `tbl_proposed_sport_org_activities` DISABLE KEYS */;
INSERT INTO `tbl_proposed_sport_org_activities` VALUES (2,2,'under 12 basketball compitition(girls)','changlingmithang',3,'Nov 23-Dec 2,2017',42000.00,20000.00,'DYS','Ministry of education',3,'2017-04-10 03:18:19','2017-04-10 05:02:11');
INSERT INTO `tbl_proposed_sport_org_activities` VALUES (3,3,'Under 18 basket compitition','punakha',4,'april 23-may 5,2017',45000.00,23000.00,'BOB','YDF',3,'2017-04-10 03:32:17','2017-04-10 03:32:17');
/*!40000 ALTER TABLE `tbl_proposed_sport_org_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sport_coaches`
--

DROP TABLE IF EXISTS `tbl_sport_coaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sport_coaches` (
  `sc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gamesdetail_id` int(11) NOT NULL,
  `federation` int(11) NOT NULL,
  `sport` int(11) NOT NULL,
  `coach` int(11) NOT NULL,
  `comments` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sport_coaches`
--

LOCK TABLES `tbl_sport_coaches` WRITE;
/*!40000 ALTER TABLE `tbl_sport_coaches` DISABLE KEYS */;
INSERT INTO `tbl_sport_coaches` VALUES (6,10,1,7,1,'freindly match ',2,2,0,'2017-04-07 01:15:16','2017-04-07 01:15:16');
INSERT INTO `tbl_sport_coaches` VALUES (7,11,2,8,3,'under 12 match',2,2,0,'2017-04-07 01:16:39','2017-04-07 01:16:39');
INSERT INTO `tbl_sport_coaches` VALUES (8,12,2,8,4,'ertryew',2,2,0,'2017-04-07 01:44:32','2017-04-07 01:44:32');
/*!40000 ALTER TABLE `tbl_sport_coaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sport_org_activities_approveds`
--

DROP TABLE IF EXISTS `tbl_sport_org_activities_approveds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sport_org_activities_approveds` (
  `activity_approval_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `approved_activity_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `approved_activity_baseline` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `approved_activity_target` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `approved_activity_venue` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `approved_activity_timeline` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `approved_capital_budget` decimal(8,2) NOT NULL,
  `approved_recurring_budget` decimal(8,2) NOT NULL,
  `remarks` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`activity_approval_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sport_org_activities_approveds`
--

LOCK TABLES `tbl_sport_org_activities_approveds` WRITE;
/*!40000 ALTER TABLE `tbl_sport_org_activities_approveds` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_sport_org_activities_approveds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sport_org_advisories`
--

DROP TABLE IF EXISTS `tbl_sport_org_advisories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sport_org_advisories` (
  `ad_member_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sport_org_id` int(11) NOT NULL,
  `ad_member_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ad_member_designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mg_member_phone` int(11) NOT NULL,
  `mg_member_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mg_member_mobile` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`ad_member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sport_org_advisories`
--

LOCK TABLES `tbl_sport_org_advisories` WRITE;
/*!40000 ALTER TABLE `tbl_sport_org_advisories` DISABLE KEYS */;
INSERT INTO `tbl_sport_org_advisories` VALUES (1,1,'Kelzang','Director',2412414,'kelzang@gmail.com',12312341,'2017-03-25',0,'2017-03-25 00:01:04','2017-03-25 00:01:04',1);
/*!40000 ALTER TABLE `tbl_sport_org_advisories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sport_org_contact_people`
--

DROP TABLE IF EXISTS `tbl_sport_org_contact_people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sport_org_contact_people` (
  `sport_org_contact_person_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sport_org_id` int(11) NOT NULL,
  `contact_person_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_designation` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_phone` int(11) NOT NULL,
  `contact_person_fax` int(11) NOT NULL,
  `contact_person_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_mobile` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`sport_org_contact_person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sport_org_contact_people`
--

LOCK TABLES `tbl_sport_org_contact_people` WRITE;
/*!40000 ALTER TABLE `tbl_sport_org_contact_people` DISABLE KEYS */;
INSERT INTO `tbl_sport_org_contact_people` VALUES (1,1,'Karma','Chairperson',12314121,12431421,'karma@gmail.com',12345678,'2017-03-24 23:59:38','2017-03-24 23:59:38',1);
INSERT INTO `tbl_sport_org_contact_people` VALUES (2,2,'yangzom','manager',123456,123456,'yangzom@gmail.com',1234523,'2017-03-28 03:48:27','2017-03-28 03:48:27',1);
INSERT INTO `tbl_sport_org_contact_people` VALUES (3,3,'Dorji Lham','manager',12345546,12345,'dorjilham@gmail.com',123435,'2017-04-07 21:32:21','2017-04-07 21:32:21',2);
/*!40000 ALTER TABLE `tbl_sport_org_contact_people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sport_org_managements`
--

DROP TABLE IF EXISTS `tbl_sport_org_managements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sport_org_managements` (
  `mg_member_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sport_org_id` int(11) NOT NULL,
  `mg_member_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mg_member_designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mg_member_phone` int(11) NOT NULL,
  `mg_member_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mg_member_mobile` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`mg_member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sport_org_managements`
--

LOCK TABLES `tbl_sport_org_managements` WRITE;
/*!40000 ALTER TABLE `tbl_sport_org_managements` DISABLE KEYS */;
INSERT INTO `tbl_sport_org_managements` VALUES (1,1,'pema','coach',432431,'pema@gmail.com',12342345,'2017-03-07',0,'2017-03-25 00:00:19','2017-03-25 00:00:19',1);
/*!40000 ALTER TABLE `tbl_sport_org_managements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_team_members`
--

DROP TABLE IF EXISTS `tbl_team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_team_members` (
  `team_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `athlete_id` int(11) NOT NULL,
  `gamesdetail_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_team_members`
--

LOCK TABLES `tbl_team_members` WRITE;
/*!40000 ALTER TABLE `tbl_team_members` DISABLE KEYS */;
INSERT INTO `tbl_team_members` VALUES (5,10,11,2,2,'2017-04-07 01:16:47','2017-04-07 01:16:47');
INSERT INTO `tbl_team_members` VALUES (6,9,12,2,2,'2017-04-07 01:44:55','2017-04-07 01:44:55');
/*!40000 ALTER TABLE `tbl_team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_infos`
--

DROP TABLE IF EXISTS `training_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training_infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_infos`
--

LOCK TABLES `training_infos` WRITE;
/*!40000 ALTER TABLE `training_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `training_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_schedules`
--

DROP TABLE IF EXISTS `training_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training_schedules` (
  `training_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `session_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `venue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coach_id` int(11) NOT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`training_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_schedules`
--

LOCK TABLES `training_schedules` WRITE;
/*!40000 ALTER TABLE `training_schedules` DISABLE KEYS */;
INSERT INTO `training_schedules` VALUES (15,3,'2017-04-05','Football match','3','09:00:00','18:00:00','changlingmithang',1,'Practice football',3,'2017-04-05 00:57:14','2017-04-05 00:57:14');
INSERT INTO `training_schedules` VALUES (16,4,'2017-04-06','Basket match','2','05:00:00','17:00:00','changbangdu',2,'Basketball match',3,'2017-04-05 00:59:05','2017-04-05 00:59:05');
INSERT INTO `training_schedules` VALUES (17,3,'2017-04-12','volleyball practice','3','07:00:00','17:00:00','changjiji',2,'practice volleyball mandatory',3,'2017-04-05 22:00:17','2017-04-05 22:00:17');
/*!40000 ALTER TABLE `training_schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '5',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com','$2y$10$mk3JcPIXVK4hKILLytDVFepTOl2zqoU5H2mwx.infhaHw.msrWHpO',1,'fdiHAAZOYOsfwAqNpUmKwY57Q40nl7pO8zVXu4NO241e5MGNioeeudAbE3WN','2017-03-24 23:02:03','2017-04-07 04:14:23');
INSERT INTO `users` VALUES (2,'kelzang','boc@gov.bt','$2y$10$AJCU3eg1CqZ6BYu1JFc7t.3RQfVEmyTmZGH1FTJJMUxPQs7k3RyCm',2,'yQyT6UCJNOqwRI1KmY40UIOO2PxyFhjMTSqmkjOV507OL7XbEBh5ftdunhGJ','2017-03-26 21:36:29','2017-04-08 00:42:29');
INSERT INTO `users` VALUES (3,'sangay','sangay@gmail.com','$2y$10$rz0uTnhSRek806H0HZQe8u9PMkILlThwZCd7evyednneiMQryjHEW',4,'QG0yOfbQuJgIygEvD7CtNfxuxGsLNPbOhooyErWXrs3YPkizB7C9bvTUgjnn','2017-03-27 22:43:38','2017-04-07 04:18:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-10 17:03:37
