-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: simultra
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `base_company`
--

DROP TABLE IF EXISTS `base_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `base_company` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `zipcode` int(11) DEFAULT NULL,
  `country` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_currency` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `manager` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legal_form` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profid1` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profid2` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profid3` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profid4` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object` longtext COLLATE utf8mb4_unicode_ci,
  `fiscalmonthstart` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_in_use` tinyint(1) DEFAULT NULL,
  `localtax1_in_use` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localtax2_in_use` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `base_company`
--

LOCK TABLES `base_company` WRITE;
/*!40000 ALTER TABLE `base_company` DISABLE KEYS */;
/*!40000 ALTER TABLE `base_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_location` int(11) DEFAULT NULL,
  `location_type` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `localization_x` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localization_y` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localization_z` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_information` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_barcode` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `warehouse_fk` int(11) NOT NULL DEFAULT '1',
  `location_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1100',1,1,1,'1','0','0','.','CONV1-100',0,1,1),(2,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1101',1,1,1,'1','0','1','.','CONV1-101',0,1,1),(3,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1102',1,1,1,'1','0','2','.','CONV1-102',0,1,1),(4,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1110',1,1,1,'1','1','0','.','CONV1-110',0,1,1),(5,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1111',1,1,1,'1','1','1','.','CONV1-111',0,1,1),(6,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1112',1,1,1,'1','1','2','.','CONV1-112',0,1,1),(7,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1120',1,1,1,'1','2','0','.','CONV1-120',0,1,1),(8,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1121',1,1,1,'1','2','1','.','CONV1-121',0,1,1),(9,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1122',1,1,1,'1','2','2','.','CONV1-122',0,1,1),(10,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1130',1,1,1,'1','3','0','.','CONV1-130',0,1,1),(11,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1131',1,1,1,'1','3','1','.','CONV1-131',0,1,1),(12,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV1132',1,1,1,'1','3','2','.','CONV1-132',0,1,1),(13,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2100',13,1,1,'2','0','0','.','CONV2-100',0,1,1),(14,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2101',13,1,1,'2','0','1','.','CONV2-101',0,1,1),(15,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2102',13,1,1,'2','0','2','.','CONV2-102',0,1,1),(16,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2110',13,1,1,'2','1','0','.','CONV2-110',0,1,1),(17,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2111',13,1,1,'2','1','1','.','CONV2-111',0,1,1),(18,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2112',13,1,1,'2','1','2','.','CONV2-112',0,1,1),(19,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2120',13,1,1,'2','2','0','.','CONV2-120',0,1,1),(20,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2121',13,1,1,'2','2','1','.','CONV2-121',0,1,1),(21,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2122',13,1,1,'2','2','2','.','CONV2-122',0,1,1),(22,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2130',13,1,1,'2','3','0','.','CONV2-130',0,1,1),(23,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2131',13,1,1,'2','3','1','.','CONV2-131',0,1,1),(24,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV2132',13,1,1,'2','3','2','.','CONV2-132',0,1,1),(25,'2019-09-10 22:00:00','2019-09-18 05:15:35','CANTIL1300',25,1,1,'3','0','0','.','CANTIL1-300',0,1,2),(26,'2019-09-10 22:00:00','2019-09-10 22:00:00','CANTIL1301',25,1,1,'3','0','1','.','CANTIL1-301',0,1,2),(27,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3400',27,1,1,'4','0','0','.','CONV3-400',0,2,1),(28,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3401',27,1,1,'4','0','1','.','CONV3-401',0,2,1),(29,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3402',27,1,1,'4','0','2','.','CONV3-402',0,2,1),(30,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3410',27,1,1,'4','1','0','.','CONV3-410',0,2,1),(31,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3411',27,1,1,'4','1','1','.','CONV3-411',0,2,1),(32,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3412',27,1,1,'4','1','2','.','CONV3-412',0,2,1),(33,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3420',27,1,1,'4','2','0','.','CONV3-420',0,2,1),(34,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3421',27,1,1,'4','2','1','.','CONV3-421',0,2,1),(35,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3422',27,1,1,'4','2','2','.','CONV3-422',0,2,1),(36,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3430',27,1,1,'4','3','0','.','CONV3-430',0,2,1),(37,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3431',27,1,1,'4','3','1','.','CONV3-431',0,2,1),(38,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3432',27,1,1,'4','3','2','.','CONV3-432',0,2,1),(39,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3440',27,1,1,'4','4','0','.','CONV3-440',0,2,1),(40,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3441',27,1,1,'4','4','1','.','CONV3-441',0,2,1),(41,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3442',27,1,1,'4','4','2','.','CONV3-442',0,2,1),(42,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3450',27,1,1,'4','5','0','.','CONV3-450',0,2,1),(43,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3451',27,1,1,'4','5','1','.','CONV3-451',0,2,1),(44,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3452',27,1,1,'4','5','2','.','CONV3-452',0,2,1),(45,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3460',27,1,1,'4','6','0','.','CONV3-460',0,2,1),(46,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3461',27,1,1,'4','6','1','.','CONV3-461',0,2,1),(47,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3462',27,1,1,'4','6','2','.','CONV3-462',0,2,1),(48,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3470',27,1,1,'4','7','0','.','CONV3-470',0,2,1),(49,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3471',27,1,1,'4','7','1','.','CONV3-471',0,2,1),(50,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV3472',27,1,1,'4','7','2','.','CONV3-472',0,2,1),(51,'2019-09-10 22:00:00','2019-09-10 22:00:00','COMPACT1480',51,1,1,'4','8','0','Each shelf can contain three packages.','COMPACT1-480',0,2,NULL),(52,'2019-09-10 22:00:00','2019-09-10 22:00:00','COMPACT1481',51,1,1,'4','8','1','Each shelf can contain three packages.','COMPACT1-481',0,2,NULL),(53,'2019-09-10 22:00:00','2019-09-10 22:00:00','COMPACT1490',51,1,1,'4','9','0','Each shelf can contain three packages.','COMPACT1-490',0,2,NULL),(54,'2019-09-10 22:00:00','2019-09-10 22:00:00','COMPACT1491',51,1,1,'4','9','1','Each shelf can contain three packages.','COMPACT1-491',0,2,NULL),(55,'2019-09-10 22:00:00','2019-09-10 22:00:00','GRAV1500',55,1,1,'5','0','0','Each shelf can contain four packages.','COMPACT1-500',0,2,3),(56,'2019-09-10 22:00:00','2019-09-10 22:00:00','GRAV1501',55,1,1,'5','0','1','Each shelf can contain four packages.','COMPACT1-501',0,2,3),(57,'2019-09-10 22:00:00','2019-09-10 22:00:00','GRAV1510',55,1,1,'5','1','0','Each shelf can contain four packages.','COMPACT1-510',0,2,3),(58,'2019-09-10 22:00:00','2019-09-10 22:00:00','GRAV1511',55,1,1,'5','1','1','Each shelf can contain four packages.','COMPACT1-511',0,2,3),(59,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4600',59,1,1,'6','0','0','.','CONV4-600',0,3,1),(60,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4601',59,1,1,'6','0','1','.','CONV4-601',0,3,1),(61,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4602',59,1,1,'6','0','2','.','CONV4-602',0,3,1),(62,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4610',59,1,1,'6','1','0','.','CONV4-610',0,3,1),(63,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4611',59,1,1,'6','1','1','.','CONV4-611',0,3,1),(64,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4612',59,1,1,'6','1','2','.','CONV4-612',0,3,1),(65,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4620',59,1,1,'6','2','0','.','CONV4-620',0,3,1),(66,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4621',59,1,1,'6','2','1','.','CONV4-621',0,3,1),(67,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4622',59,1,1,'6','2','2','.','CONV4-622',0,3,1),(68,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4630',59,1,1,'6','3','0','.','CONV4-630',0,3,1),(69,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4631',59,1,1,'6','3','1','.','CONV4-631',0,3,1),(70,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4632',59,1,1,'6','3','2','.','CONV4-632',0,3,1),(71,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4640',59,1,1,'6','4','0','.','CONV4-640',0,3,1),(72,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4641',59,1,1,'6','4','1','.','CONV4-641',0,3,1),(73,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4642',59,1,1,'6','4','2','.','CONV4-642',0,3,1),(74,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4650',59,1,1,'6','5','0','.','CONV4-650',0,3,1),(75,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4651',59,1,1,'6','5','1','.','CONV4-651',0,3,1),(76,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4652',59,1,1,'6','5','2','.','CONV4-652',0,3,1),(77,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4660',59,1,1,'6','6','0','.','CONV4-660',0,3,1),(78,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4661',59,1,1,'6','6','1','.','CONV4-661',0,3,1),(79,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4662',59,1,1,'6','6','2','.','CONV4-662',0,3,1),(80,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4670',59,1,1,'6','7','0','.','CONV4-670',0,3,1),(81,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4671',59,1,1,'6','7','1','.','CONV4-671',0,3,1),(82,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV4672',59,1,1,'6','7','2','.','CONV4-672',0,3,1),(83,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV5680',83,1,1,'6','8','0','.','CONV5-680',0,3,1),(84,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV5681',83,1,1,'6','8','1','.','CONV5-681',0,3,1),(85,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV5682',83,1,1,'6','8','2','.','CONV5-682',0,3,1),(86,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV5690',83,1,1,'6','9','0','.','CONV5-690',0,3,1),(87,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV5691',83,1,1,'6','9','1','.','CONV5-691',0,3,1),(88,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV5692',83,1,1,'6','9','2','.','CONV5-692',0,3,1),(89,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56100',83,1,1,'6','10','0','.','CONV5-6100',0,3,1),(90,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56101',83,1,1,'6','10','1','.','CONV5-6101',0,3,1),(91,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56102',83,1,1,'6','10','2','.','CONV5-6102',0,3,1),(92,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56110',83,1,1,'6','11','0','.','CONV5-6110',0,3,1),(93,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56111',83,1,1,'6','11','1','.','CONV5-6111',0,3,1),(94,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56112',83,1,1,'6','11','2','.','CONV5-6112',0,3,1),(95,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56120',83,1,1,'6','12','0','.','CONV5-6120',0,3,1),(96,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56121',83,1,1,'6','12','1','.','CONV5-6121',0,3,1),(97,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56122',83,1,1,'6','12','2','.','CONV5-6122',0,3,1),(98,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56130',83,1,1,'6','13','0','.','CONV5-6130',0,3,1),(99,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56131',83,1,1,'6','13','1','.','CONV5-6131',0,3,1),(100,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56132',83,1,1,'6','13','2','.','CONV5-6132',0,3,1),(101,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56140',83,1,1,'6','14','0','.','CONV5-6140',0,3,1),(102,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56141',83,1,1,'6','14','1','.','CONV5-6141',0,3,1),(103,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56142',83,1,1,'6','14','2','.','CONV5-6142',0,3,1),(104,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56150',83,1,1,'6','15','0','.','CONV5-6150',0,3,1),(105,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56151',83,1,1,'6','15','1','.','CONV5-6151',0,3,1),(106,'2019-09-10 22:00:00','2019-09-10 22:00:00','CONV56152',83,1,1,'6','15','2','.','CONV5-6152',0,3,1),(109,'2019-09-18 06:29:58','2019-09-18 06:30:24','RECEIPTS',NULL,1,1,'0','0','0','Muelle de recepción','RECEPITS000',0,1,1),(110,'2019-09-18 06:31:17','2019-09-18 06:31:25','EXPEDITIONS',NULL,1,1,'0','0','0','Muelle de expedición.','EXPEDITIONS000',0,1,1);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails`
--

DROP TABLE IF EXISTS `mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `attachments` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails`
--

LOCK TABLES `mails` WRITE;
/*!40000 ALTER TABLE `mails` DISABLE KEYS */;
INSERT INTO `mails` VALUES (1,'2019-06-11 23:39:45','2019-09-19 05:04:09','[P.1] New products','management@simultra.com','you','<p>Hola usuario,</p><p>Debes dar de alta en el sistema tres productos nuevos, los cuales te adjunto en el presente correo.</p><p>Saludos</p>','[{\"name\":\"delivery_note.pdf\", \"date\":\"2019-06-12 01:39:45\", \"url\":\"vendor/novadevs/simultra/docs/es/delivery_note_p1_es.pdf\"}]',0),(2,'2019-06-12 00:41:26','2019-09-19 05:04:14','[P.2] New receipt','adam.smith@supplier.com','you','<p>Hola usuario,</p><p>Creemos que has recibido un envío nuestro, ¿Puedes comprobarlo?</p><p>Saludos</p>','[{\"name\":\"packaging_slip.pdf\", \"date\":\"2019-06-12 01:39:45\", \"url\":\"vendor/novadevs/simultra/docs/es/packaging_slip_p2.pdf\"}]',0),(3,'2019-06-12 01:59:01','2019-09-19 05:04:27','[P.3] New warehouse','management@simultra.com','you','<p>Hola usuario,</p><p>Debes dar de alta en el sistema un nuevo almacén llamado Warehouse 4 (WH4), te adjunto el plano en el presente correo.</p><p>Saludos</p>','[{\"name\":\"wh4-map.png\", \"date\":\"2019-06-12 01:39:45\", \"url\":\"vendor/novadevs/simultra/whtools-simultra/wh4.png\"}]',0),(4,'2019-06-12 02:16:31','2019-09-19 05:04:33','[P.4] New stock move','magement@simultra.com','you','<p>Hola usuario,</p><p>En las localizaciones CONV1100, CONV1101 y CONV1102 hay almacenados 3 pallets perecederos con distintas caducidades, es necesario cambiar su localización a una más conveniente. Debes hacer 3 movimientos de stock, uno para cada localización</p><p>Saludos</p>',NULL,0),(5,'2019-06-12 02:59:24','2019-09-19 05:04:38','[P.5] Stock break!','magement@simultra.com','you','<p>Hola usuario,</p><p>Se ha producido una ruptura de stock del producto con la referencia PRD003, debemos solucionar el problema. El sistema ha detectado el problema y se ha creado el pedido T213, debes aprobarlo y direccionar los productos.</p><p>Saludos</p>',NULL,0),(6,'2019-06-12 03:38:57','2019-09-19 05:04:46','[P.6] New order','sales@simultra.com','you','<p>Hola usuario,</p><p>Necesitamos 5 unidades del producto PRD001 para mañana.</p><p>Saludos</p>',NULL,0),(7,'2019-07-10 04:54:59','2019-09-18 00:02:29','[P.7] Inventory','management@simultra.com','you','<p>Hola usuario,</p><p>Ha llegado el momento del inventario, necesitamos que realices inventario de los almacenes 1, 2 y 3 para mañana.</p><p>Saludos</p>','[{\"name\":\"inventory_sheet.pdf\", \"date\":\"2019-06-12 01:39:45\", \"url\":\"vendor/novadevs/simultra/docs/es/inventory_model_p7_es.pdf\"}]',0);
/*!40000 ALTER TABLE `mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_04_02_154215_create_modules_table',1),(4,'2019_04_19_032612_create_base_company_table',1),(5,'2019_05_15_1713_create_products_table',2),(7,'2019_05_15_173022_create_locations_table',4),(8,'2019_05_12_042601_create_mails_table',5),(9,'2019_05_14_173022_create_wh_tools_table',6),(10,'2019_05_15_173022_create_stock_moves_table',7),(12,'2019_05_15_173022_create_transfers_table',8),(13,'2019_05_17_173022_create_partners_table',9),(16,'2019_05_15_1713_create_warehouses_table',10),(17,'2019_05_23_044754_create_product_location',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depends_of` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `version` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'2019-07-08 08:27:40','2019-07-08 08:27:40','base',NULL,0,'0.0.1+1');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'2019-05-17 04:03:45','2019-09-18 01:12:51','Gobain components S.L.','supplier','Poligono Los Navarros Nave 5, 50269, Tudela  25698',1),(2,'2019-05-17 06:09:47','2019-09-18 01:13:57','Rafael Navarro Gonzalez - CIFPA','customer','Calle Castillo de Capua 2, Zaragoza, 50197',2);
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_location`
--

DROP TABLE IF EXISTS `product_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_location` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `location_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_location_product_id_foreign` (`product_id`),
  KEY `product_location_location_id_foreign` (`location_id`),
  CONSTRAINT `product_location_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  CONSTRAINT `product_location_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_location`
--

LOCK TABLES `product_location` WRITE;
/*!40000 ALTER TABLE `product_location` DISABLE KEYS */;
INSERT INTO `product_location` VALUES (1,'2019-09-18 00:56:08','2019-09-18 00:56:08',30,2,1),(2,'2019-09-18 00:56:08','2019-09-18 00:56:08',30,3,2),(3,'2019-09-18 00:56:08','2019-09-18 00:56:08',30,4,3),(4,'2019-09-18 00:56:08','2019-09-18 00:56:08',20,1,109),(5,'2019-09-18 00:56:08','2019-09-18 00:56:08',1,5,25),(6,'2019-09-18 00:56:08','2019-09-18 00:56:08',30,1,9);
/*!40000 ALTER TABLE `product_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_sale` tinyint(1) NOT NULL,
  `product_type` int(11) DEFAULT NULL,
  `product_category` int(11) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `ean13` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internal_reference` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price` double(10,2) DEFAULT NULL,
  `qty_on_hand` int(11) DEFAULT NULL,
  `qty_incommig` int(11) DEFAULT NULL,
  `qty_forecasted` int(11) DEFAULT NULL,
  `product_status` int(11) DEFAULT NULL,
  `weight_volume` double(10,3) DEFAULT NULL,
  `weight_gross_weight` double(10,2) DEFAULT NULL,
  `weight_net_weight` double(10,2) DEFAULT NULL,
  `perishable` tinyint(1) DEFAULT NULL,
  `date_of_expiry` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'2019-05-16 06:47:47','2019-09-18 00:56:08','HP DESKJET 2630 WIFI',1,NULL,NULL,50.50,1,'0190780931790','V1N03B',NULL,30,NULL,50,NULL,475.000,191.00,354.00,0,NULL),(2,'2019-07-05 06:03:21','2019-09-18 02:07:12','PLÁTANO DE CANARIAS',1,NULL,NULL,1.00,1,'2980010008693','PRD002-1',NULL,30,NULL,30,NULL,250.000,252.00,249.00,1,'2019-09-21 06:03:21'),(3,'2019-09-21 06:03:21','2019-09-21 06:03:21','PLÁTANO DE CANARIAS',1,NULL,NULL,1.00,1,'2980010008693','PRD002-2',NULL,30,NULL,30,NULL,250.000,252.00,249.00,1,'2019-09-22 06:03:21'),(4,'2019-09-21 06:03:21','2019-09-21 06:03:21','PLÁTANO DE CANARIAS',1,NULL,NULL,1.00,1,'2980010008693','PRD002-3',NULL,30,NULL,30,NULL,250.000,252.00,249.00,1,'2019-09-23 06:03:21'),(5,'2019-07-05 06:13:39','2019-07-05 06:13:39','BARRA DE ACERO',0,NULL,NULL,12.00,0,NULL,'PRD003',NULL,1,NULL,2,NULL,NULL,NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_moves`
--

DROP TABLE IF EXISTS `stock_moves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_moves` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `qty` double(10,3) DEFAULT NULL,
  `description` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_location` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_location` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picking_type` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `expected_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_moves`
--

LOCK TABLES `stock_moves` WRITE;
/*!40000 ALTER TABLE `stock_moves` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_moves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `partner` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `qty` double(10,3) DEFAULT NULL,
  `destination_location` int(11) NOT NULL,
  `source_location` int(11) NOT NULL,
  `description` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `source_document` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheduled_date` date DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `reference` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfers`
--

LOCK TABLES `transfers` WRITE;
/*!40000 ALTER TABLE `transfers` DISABLE KEYS */;
INSERT INTO `transfers` VALUES (5,'2019-05-16 06:12:48','2019-09-18 00:56:08',1,1,20.000,109,109,'HP DESKJET 2630 WIFI',NULL,'vendor/novadevs/simultra/docs/es/packaging_slip_p2.pdf','2019-08-28',NULL,'T212',0),(7,'2019-05-28 08:48:02','2019-05-28 08:50:15',1,5,3.000,109,109,'BARRAS DE ACERO',NULL,'','2019-05-28',NULL,'T213',0);
/*!40000 ALTER TABLE `transfers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortname` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouses`
--

LOCK TABLES `warehouses` WRITE;
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
INSERT INTO `warehouses` VALUES (1,'2019-06-11 13:12:23','2019-06-11 13:12:23','Warehouse 1','WH1','Address 1'),(2,'2019-06-11 13:12:39','2019-06-11 13:12:39','Warehouse 2','WH2','Address 2'),(3,'2019-06-11 13:12:56','2019-06-11 13:12:56','Warehouse 3','WH3','Address 3');
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wh_tools`
--

DROP TABLE IF EXISTS `wh_tools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wh_tools` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifier` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_use` tinyint(1) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `image` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wh_tools`
--

LOCK TABLES `wh_tools` WRITE;
/*!40000 ALTER TABLE `wh_tools` DISABLE KEYS */;
INSERT INTO `wh_tools` VALUES (1,'2019-05-23 00:42:37','2019-09-18 06:27:48','Forklift','RE001',NULL,0,1,'vendor/novadevs/simultra/whtools-simultra/forklift.png'),(2,'2019-06-11 13:17:50','2019-09-11 10:25:23','Electric trolley','RE002',NULL,0,1,'vendor/novadevs/simultra/whtools-simultra/electricTrolley.png'),(3,'2019-06-11 13:18:27','2019-06-11 13:18:27','Retractable forklift','RE003',NULL,0,NULL,''),(4,'2019-09-10 13:12:25','2019-09-11 10:23:59','Handcart','RE004',NULL,0,1,'vendor/novadevs/simultra/whtools-simultra/handcart.png');
/*!40000 ALTER TABLE `wh_tools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'simultra'
--

--
-- Dumping routines for database 'simultra'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-19  9:35:08
