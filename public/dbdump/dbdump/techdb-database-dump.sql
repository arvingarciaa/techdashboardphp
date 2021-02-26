-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: techdashboardphp
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adopter_technology`
--

DROP TABLE IF EXISTS `adopter_technology`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adopter_technology` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `technology_id` bigint unsigned NOT NULL,
  `adopter_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adopter_technology_technology_id_foreign` (`technology_id`),
  KEY `adopter_technology_adopter_id_foreign` (`adopter_id`),
  CONSTRAINT `adopter_technology_adopter_id_foreign` FOREIGN KEY (`adopter_id`) REFERENCES `adopters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `adopter_technology_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adopter_technology`
--

LOCK TABLES `adopter_technology` WRITE;
/*!40000 ALTER TABLE `adopter_technology` DISABLE KEYS */;
INSERT INTO `adopter_technology` VALUES (11,NULL,NULL,4,4),(12,NULL,NULL,5,5),(13,NULL,NULL,9,6),(14,NULL,NULL,9,7),(16,NULL,NULL,15,9);
/*!40000 ALTER TABLE `adopter_technology` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adopter_types`
--

DROP TABLE IF EXISTS `adopter_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adopter_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `approved` int NOT NULL DEFAULT '0',
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adopter_types`
--

LOCK TABLES `adopter_types` WRITE;
/*!40000 ALTER TABLE `adopter_types` DISABLE KEYS */;
INSERT INTO `adopter_types` VALUES (1,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,2,'Farmers'),(2,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,2,'Fisherfolks'),(3,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,2,'Manufacturers'),(4,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,2,'Government'),(5,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,2,'Regulatory bodies'),(6,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,2,'Seed companies'),(7,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,2,'Food producers'),(8,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,2,'Feed producers'),(9,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,2,'Others'),(10,'2021-01-20 10:38:56','2021-01-20 10:38:56',3,2,'Private Farm'),(11,'2021-01-20 12:50:39','2021-01-20 12:50:39',3,2,'Spin-off'),(12,'2021-01-22 07:47:28','2021-01-22 07:47:28',3,2,'Entrepreneur');
/*!40000 ALTER TABLE `adopter_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adopters`
--

DROP TABLE IF EXISTS `adopters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adopters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `province` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `municipality` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fax` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approved` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `adopter_type_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adopters_adopter_type_id_foreign` (`adopter_type_id`),
  CONSTRAINT `adopters_adopter_type_id_foreign` FOREIGN KEY (`adopter_type_id`) REFERENCES `adopter_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adopters`
--

LOCK TABLES `adopters` WRITE;
/*!40000 ALTER TABLE `adopters` DISABLE KEYS */;
INSERT INTO `adopters` VALUES (1,'2020-10-12 12:18:25','2020-10-12 12:18:25','Shannon Cabana','Region 4A','Quezon','Unisan','09098765432',NULL,'scabana@gmail.com',2,NULL,1),(2,'2020-10-12 12:18:25','2020-10-12 12:18:25','Leo Gudito','Region 4A','Laguna','Bay','09123456789',NULL,'lgudito@yahoo.com',2,NULL,2),(3,'2020-10-12 12:18:25','2020-10-12 12:18:25','Blaise Fuentes','NCR','Metro Manila',NULL,'09141235678',NULL,'bfuentes@hotmail.com',2,NULL,4),(4,'2021-01-20 10:39:57','2021-01-20 10:39:57','DV Boer Farm','Region 4A','Batangas','Lian','(02) 63 76118',NULL,'lovely@dvboerfarm.com',2,3,10),(5,'2021-01-20 12:52:20','2021-01-25 04:25:47','BD OZ Veterinary Products Trading','Region 6','Capiz','Dumarao','+63917 522 2027',NULL,NULL,2,3,11),(6,'2021-01-21 05:44:18','2021-01-21 05:44:18','HL Trading Company Incorporated','Region 11','Davao del Sur','Davao City','+6382 221 6118',NULL,NULL,2,3,3),(7,'2021-01-21 05:47:37','2021-01-21 05:47:37','Magic Touch Print Shop','Region 6','Iloilo','Iloilo City','+6336 509 7086',NULL,NULL,2,3,3),(8,'2021-01-22 07:55:52','2021-01-22 07:55:52','Sean Cristobal','Region 1','Pangasinan',NULL,NULL,NULL,NULL,2,3,12),(9,'2021-01-25 03:45:01','2021-01-25 03:45:01','Alsons Aquaculture Corporation','Region 12','Sarangani','Alabel','+632 8982 3000',NULL,NULL,2,3,10);
/*!40000 ALTER TABLE `adopters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agencies`
--

DROP TABLE IF EXISTS `agencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `province` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `municipality` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `district` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approved` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `fax` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agencies`
--

LOCK TABLES `agencies` WRITE;
/*!40000 ALTER TABLE `agencies` DISABLE KEYS */;
INSERT INTO `agencies` VALUES (1,'2020-10-12 12:18:25','2020-10-12 12:18:25','DD Agency','Region 4A',NULL,NULL,NULL,'09612345678','dd_agency@gmail.com',2,NULL,'(049) 536-5282'),(2,'2020-10-12 12:18:25','2020-10-12 12:18:25','F. Tale Inc.','Region 4A',NULL,NULL,NULL,'1235','f_tale@gmail.com',2,NULL,'(049) 536-1235'),(3,'2021-01-20 10:27:57','2021-01-25 02:09:26','Isabela State University (ISU)','Region 2','Isabela','Echague','6th District','+6378 305 9013','president@isu.edu.ph',2,NULL,NULL),(4,'2021-01-20 12:23:07','2021-01-25 02:09:43','Capiz State University (CapSU)','Region 6','Capiz','Dumarao','2nd District','+6336 651 0085','admin@capsu.edu.ph',2,NULL,NULL),(5,'2021-01-20 14:17:34','2021-01-25 02:09:53','University of the Philippines Los Baños - National Institute of Molecular Biology and Biotechnology (UPLB-Biotech)','Region 4A','Laguna','Los Baños','2nd District','+6349 536 1620','biotech.uplb@up.edu.ph',2,NULL,NULL),(6,'2021-01-20 14:55:04','2021-01-20 14:55:04','Department of Science and Technology - Metals Industry Research and Development Center (DOST-MIRDC)','NCR','Metro Manila','Taguig City','2nd District','+632 8837 0431',NULL,2,NULL,NULL),(7,'2021-01-21 05:13:03','2021-01-21 05:13:03','Department of Science and Technology - Philippine Nuclear Research Institute (DOST-PNRI)','NCR','Metro Manila','Quezon City','4th District','+632 8929 6010',NULL,2,NULL,'+632 8920 1646'),(8,'2021-01-22 07:16:22','2021-01-22 07:16:22','Central Luzon State University (CLSU)','Region 3','Nueva Ecija','Science City of Muñoz','2nd District','+6344 456 0107','clsu@clsu.edu.ph',2,NULL,'+6344 456 0107'),(9,'2021-01-25 01:18:07','2021-01-25 01:18:07','Cagayan State University (CSU)','Region 2','Cagayan','Tuguegarao City','3rd District','+6378 844 0430','president@csu.edu.ph',2,NULL,NULL),(10,'2021-01-25 03:23:25','2021-01-25 03:34:50','University of Santo Tomas (UST)','NCR','Metro Manila','City of Manila','4th District','+632 3406 1611','cb.online@ust.edu.ph',2,NULL,NULL),(11,'2021-01-25 06:36:08','2021-01-25 06:36:08','Philippine Rice Research Institute (PhilRice)','Region 3','Nueva Ecija','Science City of Muñoz','2nd District','+6344 456 0277','prri.mail@philrice.gov.ph',2,NULL,NULL);
/*!40000 ALTER TABLE `agencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agency_technology`
--

DROP TABLE IF EXISTS `agency_technology`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agency_technology` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `technology_id` bigint unsigned NOT NULL,
  `agency_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_technology_technology_id_foreign` (`technology_id`),
  KEY `agency_technology_agency_id_foreign` (`agency_id`),
  CONSTRAINT `agency_technology_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `agency_technology_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agency_technology`
--

LOCK TABLES `agency_technology` WRITE;
/*!40000 ALTER TABLE `agency_technology` DISABLE KEYS */;
INSERT INTO `agency_technology` VALUES (11,NULL,NULL,4,3),(12,NULL,NULL,5,4),(13,NULL,NULL,7,5),(14,NULL,NULL,8,6),(15,NULL,NULL,9,7),(16,NULL,NULL,10,8),(17,NULL,NULL,11,9),(18,NULL,NULL,14,5),(19,NULL,NULL,15,10),(20,NULL,NULL,16,11);
/*!40000 ALTER TABLE `agency_technology` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicability_industries`
--

DROP TABLE IF EXISTS `applicability_industries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicability_industries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicability_industries`
--

LOCK TABLES `applicability_industries` WRITE;
/*!40000 ALTER TABLE `applicability_industries` DISABLE KEYS */;
INSERT INTO `applicability_industries` VALUES (1,'2020-10-12 12:19:13','2020-10-12 12:19:13',2,1,'chrysanthemum growing areas'),(2,'2020-11-23 03:20:33','2020-11-23 03:20:33',2,1,'Goat Farming Industry'),(3,'2021-01-20 13:13:03','2021-01-20 13:13:03',2,3,'Poultry Production'),(4,'2021-01-20 14:05:04','2021-01-20 14:05:04',2,3,'Sugarcane Industry'),(5,'2021-01-21 05:06:36','2021-01-21 05:06:36',2,3,'Rice Industry'),(6,'2021-01-25 01:14:53','2021-01-25 01:14:53',2,3,'Peanut Industry'),(7,'2021-01-25 03:33:32','2021-01-25 03:33:32',2,3,'Shrimp Farming Industry');
/*!40000 ALTER TABLE `applicability_industries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicability_industry_technology`
--

DROP TABLE IF EXISTS `applicability_industry_technology`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicability_industry_technology` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `technology_id` bigint unsigned NOT NULL,
  `applicability_industry_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `applicability_industry_technology_technology_id_foreign` (`technology_id`),
  KEY `ai_id_foreign` (`applicability_industry_id`),
  CONSTRAINT `ai_id_foreign` FOREIGN KEY (`applicability_industry_id`) REFERENCES `applicability_industries` (`id`),
  CONSTRAINT `applicability_industry_technology_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicability_industry_technology`
--

LOCK TABLES `applicability_industry_technology` WRITE;
/*!40000 ALTER TABLE `applicability_industry_technology` DISABLE KEYS */;
INSERT INTO `applicability_industry_technology` VALUES (1,NULL,NULL,1,1),(2,NULL,NULL,4,2),(3,NULL,NULL,5,3),(4,NULL,NULL,7,4),(5,NULL,NULL,8,1),(6,NULL,NULL,9,5),(7,NULL,NULL,10,2),(8,NULL,NULL,11,6),(9,NULL,NULL,14,3),(10,NULL,NULL,15,7),(11,NULL,NULL,16,5);
/*!40000 ALTER TABLE `applicability_industry_technology` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `approvals`
--

DROP TABLE IF EXISTS `approvals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `approvals` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `approvable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `approvable_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approved` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `approvals_approvable_id_approvable_type_index` (`approvable_id`,`approvable_type`)
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approvals`
--

LOCK TABLES `approvals` WRITE;
/*!40000 ALTER TABLE `approvals` DISABLE KEYS */;
INSERT INTO `approvals` VALUES (1,'App\\Technology',1,1,'banner','5f84ba56d282ebanner2.jpg',1,'2020-10-12 12:19:34','2020-10-12 12:19:34'),(2,'App\\Technology',1,1,'approved','2',1,'2020-10-12 12:19:43','2020-10-12 12:19:43'),(3,'App\\Technology',1,1,'applicability_industry','1',1,'2020-10-12 12:19:56','2020-10-12 12:19:56'),(4,'App\\Technology',1,1,'commercialization_mode','Licensing Agreement',1,'2020-10-12 12:19:56','2020-10-12 12:19:56'),(5,'App\\Technology',1,1,'year_developed','2018',1,'2020-10-12 12:19:56','2020-10-12 12:19:56'),(6,'App\\Technology',2,1,'approved','2',1,'2020-10-12 12:32:11','2020-10-12 12:32:11'),(7,'App\\Technology',2,1,'year_developed','2000',1,'2020-10-12 12:32:37','2020-10-12 12:32:37'),(8,'App\\Technology',2,1,'basic_research_cost','1230000',1,'2020-10-12 12:33:42','2020-10-12 12:33:42'),(9,'App\\Technology',3,1,'approved','2',1,'2020-10-12 12:37:27','2020-10-12 12:37:27'),(10,'App\\Technology',3,1,'basic_research_cost','1500304',1,'2020-10-12 12:37:42','2020-10-12 12:37:42'),(11,'App\\Technology',3,1,'year_developed','2013',1,'2020-10-12 12:38:24','2020-10-12 12:38:24'),(12,'App\\Technology',4,1,'approved','2',1,'2020-10-12 13:52:28','2020-10-12 13:52:28'),(13,'App\\Technology',4,1,'target_users','Chrysantemum Growers',1,'2020-10-12 13:53:56','2020-10-12 13:53:56'),(14,'App\\Technology',4,1,'commercialization_mode','Outright Sale',1,'2020-10-12 13:53:56','2020-10-12 13:53:56'),(15,'App\\Technology',4,1,'year_developed','2016',1,'2020-10-12 13:53:56','2020-10-12 13:53:56'),(16,'App\\TechnologyCategory',1,1,'name','Products',1,'2020-10-12 14:33:06','2020-10-12 14:33:06'),(17,'App\\TechnologyCategory',2,1,'name','Machinery',1,'2020-10-12 14:33:10','2020-10-12 14:33:10'),(18,'App\\Technology',5,1,'approved','2',1,'2020-10-12 14:33:16','2020-10-12 14:33:16'),(19,'App\\Technology',6,1,'commercialization_mode','Outright Sale',1,'2020-10-12 14:49:44','2020-10-12 14:49:44'),(20,'App\\Technology',6,1,'year_developed','2014',1,'2020-10-12 14:49:44','2020-10-12 14:49:44'),(21,'App\\Technology',6,1,'approved','2',1,'2020-10-12 14:50:32','2020-10-12 14:50:32'),(22,'App\\Technology',7,1,'approved','2',1,'2020-10-12 14:51:12','2020-10-12 14:51:12'),(23,'App\\Technology',8,1,'approved','2',1,'2020-10-12 14:51:39','2020-10-12 14:51:39'),(24,'App\\Technology',8,1,'commercialization_mode','Outright Sale',1,'2020-10-19 07:54:32','2020-10-19 07:54:32'),(25,'App\\Technology',8,1,'year_developed','2017',1,'2020-10-19 07:54:32','2020-10-19 07:54:33'),(26,'App\\Technology',5,1,'commercialization_mode','Outright Sale',1,'2020-10-19 07:54:49','2020-10-19 07:54:49'),(27,'App\\Technology',5,1,'year_developed','2011',1,'2020-10-19 07:54:49','2020-10-19 07:54:49'),(28,'App\\Technology',7,1,'commercialization_mode','Joint Venture',1,'2020-10-19 07:55:06','2020-10-19 07:55:06'),(29,'App\\Technology',7,1,'year_developed','2017',1,'2020-10-19 07:55:06','2020-10-19 07:55:06'),(30,'App\\Technology',9,1,'commercialization_mode','Outright Sale',1,'2020-10-19 13:03:00','2020-10-19 13:03:00'),(31,'App\\Technology',9,1,'year_developed','2015',1,'2020-10-19 13:03:00','2020-10-19 13:03:00'),(32,'App\\Technology',9,1,'approved','2',1,'2020-10-19 13:03:06','2020-10-19 13:03:06'),(33,'App\\Technology',10,1,'commercialization_mode','Licensing Agreement',1,'2020-10-19 13:06:34','2020-10-19 13:06:34'),(34,'App\\Technology',10,1,'year_developed','2018',1,'2020-10-19 13:06:34','2020-10-19 13:06:34'),(35,'App\\Technology',10,1,'approved','2',1,'2020-10-19 13:06:41','2020-10-19 13:06:41'),(36,'App\\Technology',11,1,'commercialization_mode','Spin-Off',1,'2020-10-19 13:07:19','2020-10-19 13:07:19'),(37,'App\\Technology',11,1,'year_developed','2003',1,'2020-10-19 13:07:19','2020-10-19 13:07:19'),(38,'App\\Technology',11,1,'approved','2',1,'2020-10-19 18:21:08','2020-10-19 18:21:08'),(39,'App\\Technology',4,1,'description','The semen extender formulation used in processing goat semen is composed of buffer solution, non-penetrating cryoprotectant, and penetrating cryoprotectant. This formulation is used to ensure the viability of the sperm cells to be used in breeding using the artificial insemination technique.',1,'2020-11-23 03:20:47','2020-11-23 03:20:47'),(40,'App\\Technology',4,1,'significance','Improved formulation for processing goat semen',1,'2020-11-23 03:20:47','2020-11-23 03:20:47'),(41,'App\\Technology',4,1,'target_users','Goat Raisers',1,'2020-11-23 03:20:47','2020-11-23 03:20:47'),(42,'App\\Technology',4,1,'applicability_location',NULL,1,'2020-11-23 03:20:47','2020-11-23 03:20:47'),(43,'App\\Technology',4,1,'applicability_industry','2',1,'2020-11-23 03:22:00','2020-11-23 03:22:00'),(44,'App\\Technology',4,1,'commercialization_mode',NULL,1,'2020-11-23 03:35:06','2020-11-23 03:35:06'),(45,'App\\Technology',12,1,'approved','2',1,'2021-01-20 04:19:12','2021-01-20 04:19:12'),(46,'App\\Technology',13,1,'approved','2',1,'2021-01-20 04:19:17','2021-01-20 04:19:17'),(47,'App\\Technology',14,1,'approved','2',1,'2021-01-20 04:19:17','2021-01-20 04:19:17'),(48,'App\\Technology',15,1,'approved','2',1,'2021-01-20 04:19:17','2021-01-20 04:19:17'),(49,'App\\Technology',16,1,'approved','2',1,'2021-01-20 04:19:18','2021-01-20 04:19:18'),(50,'App\\Technology',17,1,'approved','2',1,'2021-01-20 04:19:18','2021-01-20 04:19:18'),(51,'App\\Technology',18,1,'approved','2',1,'2021-01-20 04:19:19','2021-01-20 04:19:19'),(52,'App\\Technology',19,1,'approved','2',1,'2021-01-20 04:19:19','2021-01-20 04:19:19'),(53,'App\\Technology',20,1,'approved','2',1,'2021-01-20 04:19:19','2021-01-20 04:19:19'),(54,'App\\Technology',7,1,'approved','0',1,'2021-01-20 04:19:20','2021-01-20 04:19:20'),(55,'App\\Technology',7,1,'approved','2',1,'2021-01-20 04:19:21','2021-01-20 04:19:21'),(56,'App\\Technology',22,1,'approved','2',1,'2021-01-20 04:19:24','2021-01-20 04:19:24'),(57,'App\\Technology',21,1,'approved','2',1,'2021-01-20 04:19:24','2021-01-20 04:19:24'),(58,'App\\Commodity',3,3,'name','Fruit Crops - Jackfruit',1,'2021-01-20 09:34:36','2021-01-20 09:34:36'),(59,'App\\Commodity',14,3,'name','Pili',1,'2021-01-20 09:38:51','2021-01-20 09:38:51'),(60,'App\\Commodity',10,3,'name','Banana',1,'2021-01-20 09:39:20','2021-01-20 09:39:20'),(61,'App\\Commodity',22,3,'name','Rootcrop - Sweet Potato',1,'2021-01-20 09:41:34','2021-01-20 09:41:34'),(62,'App\\Commodity',3,3,'name','Tropical Fruit - Jackfruit',1,'2021-01-20 09:42:42','2021-01-20 09:42:42'),(63,'App\\Technology',4,3,'applicability_location','Region 2',1,'2021-01-20 10:16:50','2021-01-20 10:16:50'),(64,'App\\Technology',4,3,'user_id','3',1,'2021-01-20 10:16:50','2021-01-20 10:16:50'),(65,'App\\Technology',4,3,'basic_research_title','Project 2. Development of improved goat semen extenders and AI delivery system in Region 2',1,'2021-01-20 10:59:30','2021-01-20 10:59:30'),(66,'App\\Technology',4,3,'basic_research_funding','DOST-PCAARRD',1,'2021-01-20 10:59:30','2021-01-20 10:59:30'),(67,'App\\Technology',4,3,'basic_research_implementing','Isabela State University (ISU)',1,'2021-01-20 10:59:30','2021-01-20 10:59:30'),(68,'App\\Technology',4,3,'title','Goat Semen Processing Using Soy-Bean Lecithin-Based Extender',1,'2021-01-20 11:28:58','2021-01-20 11:28:58'),(69,'App\\Technology',4,3,'banner','600813fa3b2d9semex2.jpg',1,'2021-01-20 11:28:58','2021-01-20 11:28:58'),(70,'App\\Technology',4,3,'commercialization_mode','Licensing Agreement',1,'2021-01-20 11:34:12','2021-01-20 11:34:12'),(71,'App\\Technology',4,3,'description','The semen extender formulation used in processing goat semen is composed of buffer solution, non-penetrating cryoprotectant, and penetrating cryoprotectant. This new formulation is proven effective in lengthening the viability of the goat spermatozoa under refrigerated storage from 48 to 110 hours or in increasing viability of frozen sperm cells from 30 to 70% post-thaw motility.',1,'2021-01-20 11:37:18','2021-01-20 11:37:18'),(72,'App\\Technology',5,3,'user_id','3',1,'2021-01-20 12:09:59','2021-01-20 12:09:59'),(73,'App\\Technology',5,3,'banner','60081d979b5c1bunga dewormer.jpg',1,'2021-01-20 12:09:59','2021-01-20 12:09:59'),(74,'App\\Technology',5,3,'title','Process of Preparing Betel Nut (Areca catechu) Deworming Composition for Chickens',1,'2021-01-20 12:17:09','2021-01-20 12:17:09'),(75,'App\\Technology',5,3,'description','The technology relates to the process for preparing the anthelmintic or deworming composition for chicken comprised of seeds of betel nut (Areca catechu) in powder form. The main component, Areca catechu or betel nut or Bunga is a species of palm grown mainly in Asian countries, like the Philippines for seed crop. The chemical constituents of A. Catechu have been investigated for, among others, anti-nematicidal/helmintic. The seed contains several alkaloids belonging to the pyridine group. The most important of them physiologically is arecoline (Chu, 2001), which is known and used medicinally as anthelmintic. Based on studies, betel nut anthelmintics are comparable to the expensive commercial dewormers in terms of efficacy. It is also cheaper in terms of cost.',1,'2021-01-20 12:17:09','2021-01-20 12:17:09'),(76,'App\\Technology',5,3,'significance','The technology is a simple and effective process for producing an effective anthelmintic against egg and adult parasites, in particular roundworms and tapeworms.',1,'2021-01-20 12:17:09','2021-01-20 12:17:09'),(77,'App\\Technology',5,3,'target_users','Poultry Growers',1,'2021-01-20 12:17:09','2021-01-20 12:17:09'),(78,'App\\Technology',5,3,'applicability_location','Region 6',1,'2021-01-20 12:17:09','2021-01-20 12:17:09'),(79,'App\\TechnologyCategory',5,3,'name','Commodity by-product utilization or waste treatment',1,'2021-01-20 12:18:09','2021-01-20 12:18:09'),(80,'App\\Technology',5,3,'basic_research_title','Botanical Dewormer for Free Range Native Chicken',1,'2021-01-20 12:30:29','2021-01-20 12:30:29'),(81,'App\\Technology',5,3,'basic_research_funding','DOST-GIA',1,'2021-01-20 12:30:29','2021-01-20 12:30:29'),(82,'App\\Technology',5,3,'basic_research_implementing','Capiz State University (CapSU)',1,'2021-01-20 12:30:29','2021-01-20 12:30:29'),(83,'App\\Technology',5,3,'basic_research_cost','2024881.28',1,'2021-01-20 12:30:29','2021-01-20 12:30:30'),(84,'App\\Technology',5,3,'basic_research_start_date','2016-03-01',1,'2021-01-20 12:30:29','2021-01-20 12:30:30'),(85,'App\\Technology',5,3,'basic_research_end_date','2017-05-31',1,'2021-01-20 12:30:29','2021-01-20 12:30:30'),(86,'App\\Technology',5,3,'commercialization_mode',NULL,1,'2021-01-20 12:32:14','2021-01-20 12:32:14'),(87,'App\\Technology',5,3,'commercialization_mode','Spin-Off',1,'2021-01-20 12:47:50','2021-01-20 12:47:50'),(88,'App\\Technology',6,3,'title','Process of Preparing Papaya (Carica papaya L.) Deworming Composition for Chickens',1,'2021-01-20 12:57:10','2021-01-20 12:57:10'),(89,'App\\Technology',6,3,'user_id','3',1,'2021-01-20 12:57:10','2021-01-20 12:57:11'),(90,'App\\Technology',6,3,'significance','The technology is a simple and effective process for producing an anthelmintic from papaya, a commonly found plant in the Philippines and a species investigated and found effective as anti-nematicidallhelmintic against roundworms.',1,'2021-01-20 13:12:41','2021-01-20 13:12:41'),(91,'App\\Technology',6,3,'target_users','Poultry Farmers',1,'2021-01-20 13:12:41','2021-01-20 13:12:41'),(92,'App\\Technology',6,3,'applicability_location','Region 6',1,'2021-01-20 13:12:41','2021-01-20 13:12:41'),(93,'App\\Technology',5,3,'applicability_industry','3',1,'2021-01-20 13:13:27','2021-01-20 13:13:27'),(94,'App\\Technology',5,3,'title','Ethnobotanical Dewormers for Chickens',1,'2021-01-20 13:34:16','2021-01-20 13:34:16'),(95,'App\\Technology',5,3,'description','The technology relates to the process for preparing the anthelmintic or deworming composition for chicken comprised of seeds of papaya (carica papaya), ipil-ipil (Leucaena leucocephala), and betel nut (Areca catechu) seeds in powder form. The technology is an economical and an alternative way to reduce the parasitic burden to tolarable level through a simple and effective process for producing an effective anthelmintic against egg and adult parasites. The anthelmintic produced through this process is a cheap source of anthelmintics to complement the commercially manufactures parasitic drugs against internal parasitism. The control of parasitic diseases will lead to the stable supply of native chickens and alleviate poverty in the countryside.',1,'2021-01-20 13:34:16','2021-01-20 13:34:16'),(96,'App\\Technology',5,3,'year_developed','2014',1,'2021-01-20 13:34:16','2021-01-20 13:34:16'),(97,'App\\Technology',5,3,'banner','6008320e2bcc1dewormer.jpg',1,'2021-01-20 13:37:18','2021-01-20 13:37:18'),(98,'App\\Technology',5,3,'description','The technology relates to the process for preparing the anthelmintic or deworming composition for chicken comprised of seeds of papaya (Carica papaya), ipil-ipil (Leucaena leucocephala), and betel nut (Areca catechu) seeds in powder form. These plants contain constituents that serve as cheap sources of anthelmintics against internal parasitism. Internal parasitism in native chickens can cause severe diarrhea and high mortality. The formulation can be used for the treatment and control of roundworms, including common large roundworms of native chicken (Ascaridia galli), common threadworms (Capillaria specie), the cecal worm (Heterakis gallinarum) and gapeworm (Syngamus trachea). The technology is an economical and an alternative way to reduce the parasitic burden to a tolerable level through a simple and effective process for producing an effective anthelmintic against egg and adult parasites. The anthelmintic produced through this process is a cheap source of anthelmintics to complement the commercially manufactures parasitic drugs against internal parasitism. The control of parasitic diseases will lead to a stable supply of native chickens and alleviate poverty in the countryside. This technology has six approved intellectual property rights, all under the Utility Model classification for the process and composition of dewormer.',1,'2021-01-20 13:49:12','2021-01-20 13:49:12'),(99,'App\\Technology',7,3,'user_id','3',1,'2021-01-20 14:02:16','2021-01-20 14:02:16'),(100,'App\\Technology',7,3,'banner','600837e871496nutrio.jpg',1,'2021-01-20 14:02:16','2021-01-20 14:02:16'),(101,'App\\Technology',7,3,'significance','Nutrio® Biofertilizer is a foliar spray that promotes plant growth of sugarcane. This environment-friendly plant supplement does not only improve the sugarcane but also other food crops such as eggplant and has a potential for increasing yield by 10 to 15%.',1,'2021-01-20 14:04:44','2021-01-20 14:04:44'),(102,'App\\Technology',7,3,'target_users','Sugarcane Farmers',1,'2021-01-20 14:04:44','2021-01-20 14:04:44'),(103,'App\\Technology',7,3,'applicability_location','Region 4A',1,'2021-01-20 14:04:44','2021-01-20 14:04:44'),(104,'App\\Technology',7,3,'applicability_industry','4',1,'2021-01-20 14:05:34','2021-01-20 14:05:34'),(105,'App\\Technology',7,3,'year_developed','2015',1,'2021-01-20 14:05:34','2021-01-20 14:05:34'),(106,'App\\Technology',7,3,'commercialization_mode',NULL,1,'2021-01-20 14:06:26','2021-01-20 14:06:26'),(107,'App\\Technology',7,3,'description','Nutrio® Biofertilizer, a new foliar spray biofertilizer inoculant contains endophytic bacteria (Enterobacter sacchari S18 ), a Nitrogen-fixing organism that has been isolated, screened, and tested for improved growth and yield of sugarcane. Nutrio offers a cheap, sustainable, and organic supplement to reduce the use of chemical fertilizers.',1,'2021-01-20 14:14:48','2021-01-20 14:14:48'),(108,'App\\Agency',3,3,'phone','+63 78 305 9013',1,'2021-01-20 14:18:04','2021-01-20 14:18:04'),(109,'App\\Agency',4,3,'phone','+63 36 651 0085',1,'2021-01-20 14:18:20','2021-01-20 14:18:20'),(110,'App\\Agency',3,3,'district','6th District',1,'2021-01-20 14:18:52','2021-01-20 14:18:52'),(111,'App\\Agency',5,3,'name','University of the Philippines Los Baños - National Institute of Molecular Biology and Biotechnology (UPLB-Biotech)',1,'2021-01-20 14:27:54','2021-01-20 14:27:54'),(112,'App\\Agency',5,3,'phone','+63 49 536 1620',1,'2021-01-20 14:27:54','2021-01-20 14:27:54'),(113,'App\\Agency',5,3,'email','biotech.uplb@up.edu.ph',1,'2021-01-20 14:27:54','2021-01-20 14:27:54'),(114,'App\\Technology',7,3,'basic_research_title','Project 2. Development and Field Testing of Endophytic Bacterial Inoculant as New Biofertilizers for Eggplant (Solanum melongena) and Sugarcane (Saccharum officinarum L.)',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(115,'App\\Technology',7,3,'basic_research_funding','DOST-PCAARRD',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(116,'App\\Technology',7,3,'basic_research_implementing','University of the Philippines Los Baños',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(117,'App\\Technology',7,3,'basic_research_cost','1362600.00',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(118,'App\\Technology',7,3,'basic_research_start_date','2012-06-01',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(119,'App\\Technology',7,3,'basic_research_end_date','2015-05-31',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(120,'App\\Technology',7,3,'applied_research_type','Field testing',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(121,'App\\Technology',7,3,'applied_research_title','Toxicological Study and Pilot Testing of Nutrio™ Biofertilizer for Improved Production of Sugarcane in Regions III and VI',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(122,'App\\Technology',7,3,'applied_research_funding','DOST-PCAARD',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(123,'App\\Technology',7,3,'applied_research_implementing','University of the Philippines Los Baños',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(124,'App\\Technology',7,3,'applied_research_cost','5000000.00',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(125,'App\\Technology',7,3,'applied_research_start_date','2017-11-16',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(126,'App\\Technology',7,3,'applied_research_end_date','2020-05-15',1,'2021-01-20 14:37:18','2021-01-20 14:37:18'),(127,'App\\Technology',7,3,'title','Nutrio Biofertilizer for Eggplant and Sugarcane',1,'2021-01-20 14:40:16','2021-01-20 14:40:16'),(128,'App\\Technology',8,3,'user_id','3',1,'2021-01-20 14:45:22','2021-01-20 14:45:22'),(129,'App\\Technology',8,3,'banner','60084202cc5f8harvester-1.png',1,'2021-01-20 14:45:22','2021-01-20 14:45:22'),(130,'App\\Technology',8,3,'banner','600842b643cc7harvester.jpg',1,'2021-01-20 14:48:22','2021-01-20 14:48:22'),(131,'App\\Technology',8,3,'banner','600842ec07e1charvester.jpg',1,'2021-01-20 14:49:16','2021-01-20 14:49:16'),(132,'App\\Technology',8,3,'significance','This is an assembly of combined harvester and thresher attachments that can easily mounted and removed from a hand tractor.',1,'2021-01-20 14:51:10','2021-01-20 14:51:10'),(133,'App\\Technology',8,3,'applicability_location','NCR',1,'2021-01-20 14:51:10','2021-01-20 14:51:10'),(134,'App\\Technology',8,3,'commercialization_mode',NULL,1,'2021-01-20 14:55:43','2021-01-20 14:55:43'),(135,'App\\Technology',8,3,'basic_research_title','Project 3. Design and development of handtractor attachment (harvester and transplanter)',1,'2021-01-20 15:13:08','2021-01-20 15:13:08'),(136,'App\\Technology',8,3,'basic_research_funding','DOST-PCAARRD',1,'2021-01-20 15:13:08','2021-01-20 15:13:08'),(137,'App\\Technology',8,3,'basic_research_implementing','Department of Science and Technology - Metals Industry Research and Development Center (DOST-MIRDC)',1,'2021-01-20 15:13:08','2021-01-20 15:13:08'),(138,'App\\Technology',8,3,'basic_research_cost','3542653.00',1,'2021-01-20 15:13:08','2021-01-20 15:13:08'),(139,'App\\Technology',8,3,'basic_research_start_date','2013-07-01',1,'2021-01-20 15:13:08','2021-01-20 15:13:08'),(140,'App\\Technology',8,3,'basic_research_end_date','2016-03-31',1,'2021-01-20 15:13:08','2021-01-20 15:13:08'),(141,'App\\Technology',4,3,'banner','6008fd9f4a711semex2.jpg',1,'2021-01-21 04:05:51','2021-01-21 04:05:51'),(142,'App\\Technology',5,3,'banner','6008fdbb42c52dewormer.jpg',1,'2021-01-21 04:06:19','2021-01-21 04:06:19'),(143,'App\\Technology',7,3,'banner','6008fdd6dacf4nutrio.jpg',1,'2021-01-21 04:06:46','2021-01-21 04:06:46'),(144,'App\\Technology',8,3,'banner','6008fdec24747harvester.jpg',1,'2021-01-21 04:07:08','2021-01-21 04:07:08'),(145,'App\\Technology',5,3,'description','The technology relates to the process for preparing the anthelmintic or deworming composition for chicken comprised of seeds of papaya (Carica papaya), ipil-ipil (Leucaena leucocephala), and betel nut (Areca catechu) seeds in powder form. These plants contain constituents that serve as cheap sources of anthelmintics against internal parasitism. Internal parasitism in native chickens can cause severe diarrhea and high mortality. The formulation can be used for the treatment and control of roundworms, including common large roundworms of native chicken (Ascaridia galli), common threadworms (Capillaria specie), the cecal worm (Heterakis gallinarum) and gapeworm (Syngamus trachea). The technology is an economical and an alternative way to reduce the parasitic burden to a tolerable level through a simple and effective process for producing an effective anthelmintic against egg and adult parasites. The anthelmintic produced through this process is a cheap source of anthelmintics to complement the commercially manufactures parasitic drugs against internal parasitism. The control of parasitic diseases will lead to a stable supply of native chickens and alleviate poverty in the countryside. This technology has ten approved intellectual property rights, all under the Utility Model classification for the process and composition of dewormer.',1,'2021-01-21 04:43:24','2021-01-21 04:43:24'),(146,'App\\Technology',7,3,'is_invention','1',1,'2021-01-21 04:44:49','2021-01-21 04:44:49'),(147,'App\\Technology',7,3,'is_invention','0',1,'2021-01-21 04:44:57','2021-01-21 04:44:57'),(148,'App\\Technology',7,3,'is_invention','1',1,'2021-01-21 04:45:46','2021-01-21 04:45:46'),(149,'App\\Technology',8,3,'is_invention','1',1,'2021-01-21 04:47:09','2021-01-21 04:47:09'),(150,'App\\Technology',9,3,'user_id','3',1,'2021-01-21 05:05:14','2021-01-21 05:05:14'),(151,'App\\Technology',9,3,'banner','60090b8ac0511Carrageenan.jpg',1,'2021-01-21 05:05:14','2021-01-21 05:05:14'),(152,'App\\Technology',9,3,'target_users','Rice Farmers',1,'2021-01-21 05:06:08','2021-01-21 05:06:08'),(153,'App\\Commodity',18,3,'name','Plantation Crops - Coffee',1,'2021-01-21 05:09:00','2021-01-21 05:09:00'),(154,'App\\Technology',9,3,'commercialization_mode',NULL,1,'2021-01-21 05:09:16','2021-01-21 05:09:16'),(155,'App\\Technology',9,3,'is_invention','1',1,'2021-01-21 05:50:04','2021-01-21 05:50:04'),(156,'App\\Technology',10,3,'applicability_location','Region 3',1,'2021-01-22 07:05:42','2021-01-22 07:05:42'),(157,'App\\Technology',10,3,'applicability_industry','2',1,'2021-01-22 07:05:42','2021-01-22 07:05:42'),(158,'App\\Technology',10,3,'year_developed','2017',1,'2021-01-22 07:05:42','2021-01-22 07:05:42'),(159,'App\\Technology',10,3,'user_id','3',1,'2021-01-22 07:05:42','2021-01-22 07:05:42'),(160,'App\\Generator',19,3,'name','Dr. Edgar A. Orden',1,'2021-01-22 07:18:37','2021-01-22 07:18:37'),(161,'App\\Generator',19,3,'agency_id','1',1,'2021-01-22 07:18:37','2021-01-22 07:18:37'),(162,'App\\Generator',22,3,'address','Science City of Muñoz, Nueva Ecija',1,'2021-01-22 07:23:55','2021-01-22 07:23:55'),(163,'App\\Generator',22,3,'agency_id','1',1,'2021-01-22 07:23:55','2021-01-22 07:23:55'),(164,'App\\Generator',21,3,'address','Science City of Muñoz, Nueva Ecija',1,'2021-01-22 07:24:06','2021-01-22 07:24:06'),(165,'App\\Generator',21,3,'agency_id','1',1,'2021-01-22 07:24:06','2021-01-22 07:24:06'),(166,'App\\Generator',20,3,'address','Science City of Muñoz, Nueva Ecija',1,'2021-01-22 07:24:15','2021-01-22 07:24:15'),(167,'App\\Generator',20,3,'agency_id','1',1,'2021-01-22 07:24:15','2021-01-22 07:24:15'),(168,'App\\Generator',19,3,'address','Science City of Muñoz, Nueva Ecija',1,'2021-01-22 07:24:26','2021-01-22 07:24:26'),(169,'App\\Generator',19,3,'agency_id','8',1,'2021-01-22 07:24:26','2021-01-22 07:24:26'),(170,'App\\Generator',20,3,'agency_id','8',1,'2021-01-22 07:24:38','2021-01-22 07:24:38'),(171,'App\\Generator',21,3,'agency_id','8',1,'2021-01-22 07:24:52','2021-01-22 07:24:52'),(172,'App\\Generator',22,3,'agency_id','8',1,'2021-01-22 07:25:02','2021-01-22 07:25:02'),(173,'App\\Technology',10,3,'banner','600a7ffcdeaf4portable pellet machine.jpg',1,'2021-01-22 07:34:20','2021-01-22 07:34:20'),(174,'App\\Technology',10,3,'description','A portable pellet mill developed mainly from scrap-materials that is appropriate for on-farm pellet production.  It is used in pelletizing total mixed ration (TMR) for goats.  It has a milling capacity of 130 kg/hr and machine efficiency of 93.30% with fuel consumption of 0.17 liters/hr.',1,'2021-01-22 07:56:09','2021-01-22 07:56:09'),(175,'App\\Technology',11,3,'description','The peanut sheller-sorter is an electric motor powered machine that is used to break peanut pods through centrifugal and impact force action. It separates the freed-up kernels from the peanut shells. Furthermore, it cleans and sorts kernels into two sizes. It has a processing capacity of about 150 kg/hour of peanuts.',1,'2021-01-25 01:14:03','2021-01-25 01:14:03'),(176,'App\\Technology',11,3,'applicability_location','Region 2',1,'2021-01-25 01:14:03','2021-01-25 01:14:03'),(177,'App\\Technology',11,3,'user_id','3',1,'2021-01-25 01:14:03','2021-01-25 01:14:03'),(178,'App\\Agency',3,3,'phone','+6378 305 9013',1,'2021-01-25 02:09:26','2021-01-25 02:09:26'),(179,'App\\Agency',4,3,'phone','+6336 651 0085',1,'2021-01-25 02:09:43','2021-01-25 02:09:43'),(180,'App\\Agency',5,3,'phone','+6349 536 1620',1,'2021-01-25 02:09:53','2021-01-25 02:09:53'),(181,'App\\Technology',11,3,'banner','600e2a59d20efpeanut sheller-sorter.jpg',1,'2021-01-25 02:18:01','2021-01-25 02:18:01'),(182,'App\\Technology',11,3,'applicability_industry','6',1,'2021-01-25 02:21:33','2021-01-25 02:21:33'),(183,'App\\Technology',11,3,'commercialization_mode',NULL,1,'2021-01-25 02:21:33','2021-01-25 02:21:34'),(184,'App\\Technology',11,3,'title','Peanut Sheller-Sorter',1,'2021-01-25 02:35:56','2021-01-25 02:35:56'),(185,'App\\Technology',14,3,'title','Protein Enriched Copra Meal (PECM) as Feed for Swine and Poultry',1,'2021-01-25 02:46:18','2021-01-25 02:46:18'),(186,'App\\Technology',14,3,'significance','The protein-enriched copra meal (PECM) is used as a substrate in the incorporation of multi-stained probiotics to enhance/improve overall animal health. This ensures low cost in feed formulation as supplements are included in the protein ingredient.',1,'2021-01-25 02:46:18','2021-01-25 02:46:18'),(187,'App\\Technology',14,3,'target_users','Swine and Poultry Farmers',1,'2021-01-25 02:46:18','2021-01-25 02:46:18'),(188,'App\\Technology',14,3,'applicability_industry','3',1,'2021-01-25 02:46:18','2021-01-25 02:46:18'),(189,'App\\Technology',14,3,'year_developed','2015',1,'2021-01-25 02:46:18','2021-01-25 02:46:18'),(190,'App\\Technology',14,3,'user_id','3',1,'2021-01-25 02:46:18','2021-01-25 02:46:18'),(191,'App\\Technology',14,3,'banner','600e30fa12d71PECM banner.jpg',1,'2021-01-25 02:46:18','2021-01-25 02:46:18'),(192,'App\\Technology',14,3,'description','Through solid-state fermentation technology, the PECM is enriched with microorganisms that increase the protein content of copra meal, which is normally high in fiber but low in nutrients. PECM is seen to replace 40 to 50 percent of the soybean contained in animal feed. The PECM uses waste products from coconut oil.',1,'2021-01-25 02:52:01','2021-01-25 02:52:01'),(193,'App\\Technology',14,3,'is_invention','1',1,'2021-01-25 02:57:22','2021-01-25 02:57:22'),(194,'App\\Technology',14,3,'basic_research_title','Protein Enrichment of Copra Meal as Feed for Swine and Poultry',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(195,'App\\Technology',14,3,'basic_research_funding','DOST-PCAARRD',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(196,'App\\Technology',14,3,'basic_research_implementing','University of the Philippines Los Baños',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(197,'App\\Technology',14,3,'basic_research_cost','7477285.98',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(198,'App\\Technology',14,3,'basic_research_start_date','2012-06-01',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(199,'App\\Technology',14,3,'basic_research_end_date','2015-05-31',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(200,'App\\Technology',14,3,'applied_research_type','Pilot testing',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(201,'App\\Technology',14,3,'applied_research_title','Pilot testing of protein enriched copra meal (PECM): A valuable protein feed ingredient for swine and poultry',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(202,'App\\Technology',14,3,'applied_research_funding','DOST-PCAARRD',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(203,'App\\Technology',14,3,'applied_research_implementing','University of the Philippines Los Baños',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(204,'App\\Technology',14,3,'applied_research_cost','21586267.00',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(205,'App\\Technology',14,3,'applied_research_start_date','2014-07-01',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(206,'App\\Technology',14,3,'applied_research_end_date','2017-06-30',1,'2021-01-25 03:03:44','2021-01-25 03:03:44'),(207,'App\\Technology',15,3,'description','Loop-Mediated Isothermal Amplification (LAMP) diagnostic kit is a practical alternative to the conventional polymerase chain reaction (PCR) and standard microbiological techniques in the detection of White Spot Syndrome Virus (WSSV). It is 10x more sensitive for the detection of WSSV compared to PCR. It is aided by a heat block apparatus that replaces the expensive thermal cycler. Results can also be obtained within 1 hour. Due to its convenience, simplicity and speed of detection, it can be used on-site. Diagnostic kits utilizing locally fabricated machines will significantly bring down the cost of pathogen detection in the country.\r\n\r\nDiagnostic kits based on LAMP that are being developed for the detection of WSSV will have tremendous and significant commercial application in the culture of shrimps in the Philippines (and eventually to other shrimp producing countries) because of the following reasons: 1) they are easy to use, 2) the manner of detecting the target pathogen is done visually, 3) significantly high number of times a detection can be made during the culture because they are cheap, 4) they are highly sensitive and accurate in detecting the causative agent, 5) they can be within the purchasing capacity of resource-limited localities and 6) new assays based on this concept may be designed for other pathogens. As a result, these kits will have a target market in shrimp farming regions that are located in resource-limited areas, where access to sophisticated equipment in detecting WSSV is a major issue. Considering the number of shrimp farms in the Philippines, the shrimp hatcheries and shrimp health laboratories in the country, the production of this LAMP diagnostic kit will have good market potential.',1,'2021-01-25 03:21:00','2021-01-25 03:21:00'),(208,'App\\Technology',15,3,'significance','A diagnostic system, consisting of a set of premixed solutions for DNA assay and a heating block, which provides a method to detect a target pathogen, e.g., bacteria or viruses, by amplification of a target sequence at isothermal conditions for at least 1 hour.',1,'2021-01-25 03:21:00','2021-01-25 03:21:00'),(209,'App\\Technology',15,3,'user_id','3',1,'2021-01-25 03:21:00','2021-01-25 03:21:00'),(210,'App\\Technology',15,3,'banner','600e3b68e748cJAmp banner.jpg',1,'2021-01-25 03:30:48','2021-01-25 03:30:48'),(211,'App\\Technology',15,3,'target_users','Shrimp Farmers',1,'2021-01-25 03:32:56','2021-01-25 03:32:57'),(212,'App\\Technology',15,3,'applicability_industry','7',1,'2021-01-25 03:34:39','2021-01-25 03:34:39'),(213,'App\\Technology',15,3,'commercialization_mode','Licensing Agreement',1,'2021-01-25 03:34:39','2021-01-25 03:34:39'),(214,'App\\Technology',15,3,'year_developed','2013',1,'2021-01-25 03:34:39','2021-01-25 03:34:39'),(215,'App\\Agency',10,3,'district','4th District',1,'2021-01-25 03:34:39','2021-01-25 03:34:39'),(216,'App\\Agency',10,3,'name','University of Santo Tomas (UST)',1,'2021-01-25 03:34:50','2021-01-25 03:34:50'),(217,'App\\Technology',15,3,'is_invention','1',1,'2021-01-25 03:45:23','2021-01-25 03:45:23'),(218,'App\\Technology',15,3,'basic_research_title','Project 7. Pathology and Development of Molecular Detection Kits for EMS/AHPND causing Bacteria',1,'2021-01-25 03:58:56','2021-01-25 03:58:56'),(219,'App\\Technology',15,3,'basic_research_funding','DOST-PCAARRD',1,'2021-01-25 03:58:56','2021-01-25 03:58:56'),(220,'App\\Technology',15,3,'basic_research_implementing','University of Santo Tomas (UST)',1,'2021-01-25 03:58:56','2021-01-25 03:58:56'),(221,'App\\Technology',15,3,'basic_research_cost','10088184.00',1,'2021-01-25 03:58:56','2021-01-25 03:58:56'),(222,'App\\Technology',15,3,'basic_research_start_date','2015-07-01',1,'2021-01-25 03:58:56','2021-01-25 03:58:56'),(223,'App\\Technology',15,3,'basic_research_end_date','2017-09-30',1,'2021-01-25 03:58:56','2021-01-25 03:58:56'),(224,'App\\Technology',15,3,'applied_research_type','Field testing',1,'2021-01-25 04:01:05','2021-01-25 04:01:05'),(225,'App\\Technology',15,3,'applied_research_title','Field Testing of LAMP Detection Kit for AHPND in Shrimps',1,'2021-01-25 04:01:05','2021-01-25 04:01:05'),(226,'App\\Technology',15,3,'applied_research_funding','DOST-PCAARRD',1,'2021-01-25 04:01:05','2021-01-25 04:01:05'),(227,'App\\Technology',15,3,'applied_research_implementing','University of Santo Tomas (UST)',1,'2021-01-25 04:01:05','2021-01-25 04:01:05'),(228,'App\\Technology',15,3,'applied_research_cost','4999996.00',1,'2021-01-25 04:01:05','2021-01-25 04:01:05'),(229,'App\\Technology',15,3,'applied_research_start_date','2019-05-01',1,'2021-01-25 04:01:05','2021-01-25 04:01:05'),(230,'App\\Technology',15,3,'applied_research_end_date','2021-08-31',1,'2021-01-25 04:01:05','2021-01-25 04:01:05'),(231,'App\\Technology',11,3,'banner','600e450c9ae50peanut sheller-sorter.jpg',1,'2021-01-25 04:11:56','2021-01-25 04:11:56'),(232,'App\\Adopter',5,3,'phone','+63917 522 2027',1,'2021-01-25 04:25:47','2021-01-25 04:25:47'),(233,'App\\Technology',16,3,'significance','Far-Infrared (FIR) Grain Dryer is expected to increase your revenue due to its increased milling recovery which is 5-7%. It also reduces post-harvest loss by 5%.',1,'2021-01-25 06:31:46','2021-01-25 06:31:46'),(234,'App\\Technology',16,3,'target_users','Rice Farmers',1,'2021-01-25 06:31:46','2021-01-25 06:31:46'),(235,'App\\Technology',16,3,'applicability_industry','5',1,'2021-01-25 06:31:46','2021-01-25 06:31:46'),(236,'App\\Technology',16,3,'user_id','3',1,'2021-01-25 06:31:46','2021-01-25 06:31:46'),(237,'App\\Technology',16,3,'banner','600e65d2ded8dFIR grain dryer banner.jpg',1,'2021-01-25 06:31:46','2021-01-25 06:31:46'),(238,'App\\Technology',16,3,'basic_research_title','Project 5. Development and pilot testing of a combined conduction and far infrared radiation paddy dryer',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(239,'App\\Technology',16,3,'basic_research_funding','DOST-PCAARRD',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(240,'App\\Technology',16,3,'basic_research_implementing','Philippine Rice Research Institute (PhilRice)',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(241,'App\\Technology',16,3,'basic_research_cost','5913388.00',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(242,'App\\Technology',16,3,'basic_research_start_date','2013-07-01',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(243,'App\\Technology',16,3,'basic_research_end_date','2016-12-31',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(244,'App\\Technology',16,3,'applied_research_type','Pilot testing',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(245,'App\\Technology',16,3,'applied_research_title','Pilot Testing of Combined Conduction and Far Infrared Radiation Dryer',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(246,'App\\Technology',16,3,'applied_research_funding','DOST-PCAARRD',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(247,'App\\Technology',16,3,'applied_research_implementing','Philippine Rice Research Institute (PhilRice)',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(248,'App\\Technology',16,3,'applied_research_cost','4997557.00',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(249,'App\\Technology',16,3,'applied_research_start_date','2017-10-01',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(250,'App\\Technology',16,3,'applied_research_end_date','2020-12-31',1,'2021-01-25 06:57:58','2021-01-25 06:57:58'),(251,'App\\Technology',1,1,'approved','0',1,'2021-01-26 06:46:21','2021-01-26 06:46:21'),(252,'App\\Technology',12,1,'approved','0',1,'2021-01-26 06:46:24','2021-01-26 06:46:24'),(253,'App\\Technology',13,1,'approved','0',1,'2021-01-26 06:46:29','2021-01-26 06:46:29'),(254,'App\\Technology',17,1,'approved','0',1,'2021-01-26 06:46:32','2021-01-26 06:46:32'),(255,'App\\Technology',18,1,'approved','0',1,'2021-01-26 06:46:39','2021-01-26 06:46:39'),(256,'App\\Technology',19,1,'approved','0',1,'2021-01-26 06:47:28','2021-01-26 06:47:28'),(257,'App\\Technology',20,1,'approved','0',1,'2021-01-26 06:47:29','2021-01-26 06:47:29'),(258,'App\\Technology',21,1,'approved','0',1,'2021-01-26 06:47:30','2021-01-26 06:47:30'),(259,'App\\Technology',22,1,'approved','0',1,'2021-01-26 06:47:33','2021-01-26 06:47:33'),(260,'App\\Technology',22,1,'approved','2',1,'2021-01-26 08:22:23','2021-01-26 08:22:23'),(261,'App\\Technology',21,1,'approved','2',1,'2021-01-26 08:22:29','2021-01-26 08:22:29'),(262,'App\\Technology',20,1,'approved','2',1,'2021-01-26 08:22:34','2021-01-26 08:22:34'),(263,'App\\Technology',19,1,'approved','2',1,'2021-01-26 08:22:37','2021-01-26 08:22:37'),(264,'App\\Technology',18,1,'approved','2',1,'2021-01-26 08:22:41','2021-01-26 08:22:41'),(265,'App\\Technology',17,1,'approved','2',1,'2021-01-26 08:22:43','2021-01-26 08:22:43'),(266,'App\\Technology',13,1,'approved','2',1,'2021-01-26 08:22:46','2021-01-26 08:22:46'),(267,'App\\Technology',12,1,'approved','2',1,'2021-01-26 08:22:48','2021-01-26 08:22:48'),(268,'App\\Technology',1,1,'approved','2',1,'2021-01-26 08:22:51','2021-01-26 08:22:51'),(269,'App\\Technology',22,1,'approved','0',1,'2021-01-26 08:23:01','2021-01-26 08:23:01'),(270,'App\\Technology',22,1,'approved','2',1,'2021-01-26 08:23:06','2021-01-26 08:23:06'),(271,'App\\Technology',22,1,'approved','0',1,'2021-01-26 08:24:51','2021-01-26 08:24:51'),(272,'App\\Technology',22,1,'approved','2',1,'2021-01-26 08:26:52','2021-01-26 08:26:52'),(273,'App\\Technology',1,1,'approved','0',1,'2021-01-27 02:30:02','2021-01-27 02:30:02'),(274,'App\\Technology',12,1,'approved','0',1,'2021-01-27 02:30:03','2021-01-27 02:30:03'),(275,'App\\Technology',13,1,'approved','0',1,'2021-01-27 02:30:03','2021-01-27 02:30:03'),(276,'App\\Technology',17,1,'approved','0',1,'2021-01-27 02:30:04','2021-01-27 02:30:04'),(277,'App\\Technology',21,1,'approved','0',1,'2021-01-27 02:30:07','2021-01-27 02:30:07'),(278,'App\\Technology',20,1,'approved','0',1,'2021-01-27 02:30:07','2021-01-27 02:30:07'),(279,'App\\Technology',19,1,'approved','0',1,'2021-01-27 02:30:08','2021-01-27 02:30:08'),(280,'App\\Technology',18,1,'approved','0',1,'2021-01-27 02:30:08','2021-01-27 02:30:08'),(281,'App\\Technology',22,1,'approved','0',1,'2021-01-27 02:30:12','2021-01-27 02:30:12'),(282,'App\\Technology',1,2,'user_id','2',1,'2021-01-27 02:42:06','2021-01-27 02:42:06'),(283,'App\\Technology',1,2,'approved','2',1,'2021-01-27 02:45:44','2021-01-27 02:45:44'),(284,'App\\Technology',1,2,'significance','This is used to ensure the health standard of planting materials.',1,'2021-01-27 02:51:47','2021-01-27 02:51:47'),(285,'App\\Technology',1,2,'approved','0',1,'2021-01-27 02:52:19','2021-01-27 02:52:19'),(286,'App\\Technology',1,2,'approved','2',1,'2021-01-27 02:52:56','2021-01-27 02:52:56'),(287,'App\\Technology',1,1,'user_id','1',1,'2021-01-27 05:31:51','2021-01-27 05:31:51'),(288,'App\\Technology',1,1,'banner','60112e9fafbf1chrysanthemum.JPG',1,'2021-01-27 09:13:03','2021-01-27 09:13:03'),(289,'App\\Technology',1,2,'applicability_location','CAR',1,'2021-01-28 01:40:47','2021-01-28 01:40:47'),(290,'App\\Technology',1,2,'user_id','2',1,'2021-01-28 01:40:47','2021-01-28 01:40:47'),(291,'App\\Technology',9,3,'applicability_industry','5',1,'2021-01-28 01:54:48','2021-01-28 01:54:48'),(292,'App\\Technology',9,3,'commercialization_mode','Licensing Agreement',1,'2021-01-28 01:54:48','2021-01-28 01:54:48'),(293,'App\\Technology',1,1,'user_id','1',1,'2021-02-04 17:09:04','2021-02-04 17:09:04'),(294,'App\\Technology',4,1,'user_id','1',1,'2021-02-04 17:09:26','2021-02-04 17:09:26'),(295,'App\\Technology',5,1,'user_id','1',1,'2021-02-04 17:09:42','2021-02-04 17:09:42'),(296,'App\\Technology',7,1,'user_id','1',1,'2021-02-04 17:10:19','2021-02-04 17:10:19'),(297,'App\\Technology',8,1,'user_id','1',1,'2021-02-04 17:10:32','2021-02-04 17:10:32'),(298,'App\\Technology',9,1,'user_id','1',1,'2021-02-04 17:10:42','2021-02-04 17:10:42'),(299,'App\\Technology',10,1,'user_id','1',1,'2021-02-04 17:10:58','2021-02-04 17:10:58'),(300,'App\\Technology',11,1,'user_id','1',1,'2021-02-04 17:11:14','2021-02-04 17:11:14'),(301,'App\\Technology',14,1,'user_id','1',1,'2021-02-04 17:11:27','2021-02-04 17:11:27'),(302,'App\\Technology',15,1,'user_id','1',1,'2021-02-04 17:11:47','2021-02-04 17:11:47'),(303,'App\\Technology',16,1,'user_id','1',1,'2021-02-04 17:12:00','2021-02-04 17:12:00');
/*!40000 ALTER TABLE `approvals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carousel_items`
--

DROP TABLE IF EXISTS `carousel_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carousel_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `subtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `button_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `position` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carousel_items`
--

LOCK TABLES `carousel_items` WRITE;
/*!40000 ALTER TABLE `carousel_items` DISABLE KEYS */;
INSERT INTO `carousel_items` VALUES (1,'2020-10-12 12:18:26','2020-10-12 12:18:26','DOST-PCAARRD program distributes duck eggs; supplements duck farmers\' livelihood','Addressing the impact of COVID-19 pandemic in the country, the Philippine Council for Agriculture, Aquatic and Natural Resources Research and Development of the Department of Science and Technology (DOST-PCAARRD) launches its initiative on “Manok at Itlog sa Pamayanan,” which is one of the subcomponents of “Pagkain at Kabuhayan” under the GALING-PCAARRD Kontra Covid-19 program.','5f62b0dd1b673IP-Kayumanggi1.jpg','http://www.pcaarrd.dost.gov.ph/home/portal/index.php/quick-information-dispatch/3661-dost-pcaarrd-program-distributes-duck-eggs-supplements-duck-farmers-livelihood',1);
/*!40000 ALTER TABLE `carousel_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commodities`
--

DROP TABLE IF EXISTS `commodities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commodities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_id` bigint unsigned NOT NULL,
  `user_id` int DEFAULT NULL,
  `approved` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `commodities_sector_id_foreign` (`sector_id`),
  CONSTRAINT `commodities_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commodities`
--

LOCK TABLES `commodities` WRITE;
/*!40000 ALTER TABLE `commodities` DISABLE KEYS */;
INSERT INTO `commodities` VALUES (1,'2020-10-12 12:18:25','2020-10-12 12:18:25','Abaca',1,NULL,2),(2,'2020-10-12 12:18:25','2020-10-12 12:18:25','Goat',2,NULL,2),(3,'2020-10-12 12:18:25','2021-01-20 09:42:42','Tropical Fruit - Jackfruit',1,NULL,2),(4,'2020-10-12 12:18:25','2020-10-12 12:18:25','Swine',2,NULL,2),(5,'2020-10-12 14:48:58','2020-10-12 14:48:58','Native Chicken',2,1,2),(6,'2020-10-12 14:50:25','2020-10-12 14:50:25','Vegetables',1,1,2),(7,'2021-01-20 09:33:31','2021-01-20 09:33:31','Coconut',1,3,2),(8,'2021-01-20 09:33:44','2021-01-20 09:33:44','Corn and other grains',1,3,2),(9,'2021-01-20 09:34:01','2021-01-20 09:34:01','Fruit Crops - Mango',1,3,2),(10,'2021-01-20 09:34:20','2021-01-20 09:39:20','Banana',1,3,2),(11,'2021-01-20 09:35:00','2021-01-20 09:35:00','Fruit Crops - Other tropical fruits',1,3,2),(12,'2021-01-20 09:35:18','2021-01-20 09:35:18','Legumes',1,3,2),(13,'2021-01-20 09:35:46','2021-01-20 09:35:46','Natural Sources of Dye',1,3,2),(14,'2021-01-20 09:36:01','2021-01-20 09:38:51','Pili',1,3,2),(15,'2021-01-20 09:36:14','2021-01-20 09:36:14','Ornamentals',1,3,2),(16,'2021-01-20 09:36:32','2021-01-20 09:36:32','Medicinal Plants',1,3,2),(17,'2021-01-20 09:37:09','2021-01-20 09:37:09','Plantation Crops - Cacao',1,3,2),(18,'2021-01-20 09:37:38','2021-01-21 05:09:00','Plantation Crops - Coffee',1,3,2),(19,'2021-01-20 09:37:53','2021-01-20 09:37:53','Plantation Crops - Oil Palm',1,3,2),(20,'2021-01-20 09:39:49','2021-01-20 09:39:49','Rice',1,3,2),(21,'2021-01-20 09:40:18','2021-01-20 09:40:18','Rootcrop - Purple Yam',1,3,2),(22,'2021-01-20 09:40:57','2021-01-20 09:41:34','Rootcrop - Sweet Potato',1,3,2),(23,'2021-01-20 09:41:17','2021-01-20 09:41:17','Rootcrop - White Potato',1,3,2),(24,'2021-01-20 09:41:52','2021-01-20 09:41:52','Sugarcane',1,3,2),(25,'2021-01-20 09:42:06','2021-01-20 09:42:06','Tropical Fruit - Citrus',1,3,2),(26,'2021-01-20 09:42:21','2021-01-20 09:42:21','Tropical Fruit - Durian',1,3,2),(27,'2021-01-20 09:43:52','2021-01-20 09:43:52','Tropical Fruit - Papaya',1,3,2),(28,'2021-01-20 09:44:17','2021-01-20 09:44:17','Tropical Fruit - Pineapple',1,3,2),(29,'2021-01-20 09:44:32','2021-01-20 09:44:32','Tropical Fruit - Pummelo',1,3,2),(30,'2021-01-20 09:44:59','2021-01-20 09:44:59','Vegetable',1,3,2),(31,'2021-01-20 09:45:13','2021-01-20 09:45:13','Vegetable - Eggplant',1,3,2),(32,'2021-01-20 09:45:24','2021-01-20 09:45:24','Vegetable - Garlic',1,3,2),(33,'2021-01-20 09:45:37','2021-01-20 09:45:37','Vegetable - Potato',1,3,2),(34,'2021-01-20 09:45:51','2021-01-20 09:45:51','Vegetable - Tomato',1,3,2),(35,'2021-01-20 09:47:05','2021-01-20 09:47:05','Cross-cutting',8,3,2),(36,'2021-01-20 09:47:52','2021-01-20 09:47:52','Bamboo',6,3,2),(37,'2021-01-20 09:48:02','2021-01-20 09:48:02','Cacao',6,3,2),(38,'2021-01-20 09:48:21','2021-01-20 09:48:21','Industrial Tree Plantation',6,3,2),(39,'2021-01-20 09:49:14','2021-01-20 09:49:14','Inland Environmental Services (IES) - Biodiversity',7,3,2),(40,'2021-01-20 09:49:42','2021-01-20 09:49:42','Inland Environmental Services (IES) - Climate Change',7,3,2),(41,'2021-01-20 09:51:19','2021-01-20 09:51:19','Inland Environmental Services (IES) - Mangrove',7,3,2),(42,'2021-01-20 09:51:30','2021-01-20 09:51:30','Inland Environmental Services (IES) - Watershed',7,3,2),(43,'2021-01-20 09:51:36','2021-01-20 09:51:36','Inland Environmental Services (IES) - Watershed',7,3,2),(44,'2021-01-20 09:52:03','2021-01-20 09:52:03','Non-Timber Forest Products (NTFP)',6,3,2),(45,'2021-01-20 09:52:19','2021-01-20 09:52:19','Sago',6,3,2),(46,'2021-01-20 09:52:37','2021-01-20 09:52:37','Feed Resources - Aquafeeds',4,3,2),(47,'2021-01-20 09:52:52','2021-01-20 09:52:52','Mangrove Crab - Mudcrab',4,3,2),(48,'2021-01-20 09:53:05','2021-01-20 09:53:05','Milkfish',4,3,2),(49,'2021-01-20 09:53:38','2021-01-20 09:53:38','Mussel',4,3,2),(50,'2021-01-20 09:55:28','2021-01-20 09:55:28','Shrimp',4,3,2),(51,'2021-01-20 09:55:39','2021-01-20 09:55:39','Tilapia',4,3,2),(52,'2021-01-20 09:55:54','2021-01-20 09:55:54','Dairy Buffalo',2,3,2),(53,'2021-01-20 09:56:11','2021-01-20 09:56:11','Dairy Cattle',2,3,2),(54,'2021-01-20 09:56:39','2021-01-20 09:56:39','Dairy Goat',2,3,2),(55,'2021-01-20 09:56:47','2021-01-20 09:56:47','Duck',2,3,2),(56,'2021-01-20 09:57:10','2021-01-20 09:57:10','Feed Resources',2,3,2),(57,'2021-01-20 09:57:29','2021-01-20 09:57:29','Native Chicken',2,3,2),(58,'2021-01-20 09:57:44','2021-01-20 09:57:44','Slaughter Goat',2,3,2),(59,'2021-01-20 09:58:45','2021-01-20 09:58:45','Swine',2,3,2),(60,'2021-01-20 09:59:10','2021-01-20 09:59:10','Abalone',5,3,2),(61,'2021-01-20 09:59:25','2021-01-20 09:59:25','Blue Swimming Crab',5,3,2),(62,'2021-01-20 10:03:02','2021-01-20 10:03:02','Ocean Environmental Services (OES) - Bathymetry',9,3,2),(63,'2021-01-20 10:03:15','2021-01-20 10:03:15','Ocean Environmental Services (OES) - Corals',9,3,2),(64,'2021-01-20 10:03:50','2021-01-20 10:03:50','Ocean Environmental Services (OES) - Fishing Maps',9,3,2),(65,'2021-01-20 10:04:12','2021-01-20 10:04:12','Ocean Environmental Services (OES) - Harmful Algal Blooms',9,3,2),(66,'2021-01-20 10:04:27','2021-01-20 10:04:27','Oyster',5,3,2),(67,'2021-01-20 10:04:37','2021-01-20 10:04:37','Sardines',5,3,2),(68,'2021-01-20 10:04:50','2021-01-20 10:04:50','Sea Cucumber',5,3,2),(69,'2021-01-20 10:05:02','2021-01-20 10:05:02','Seaweeds',5,3,2),(70,'2021-01-20 10:05:13','2021-01-20 10:05:13','Tuna',5,3,2),(71,'2021-01-20 10:05:45','2021-01-20 10:05:45','Smart Farming',1,3,2);
/*!40000 ALTER TABLE `commodities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commodity_technology`
--

DROP TABLE IF EXISTS `commodity_technology`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commodity_technology` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `technology_id` bigint unsigned NOT NULL,
  `commodity_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commodity_technology_technology_id_foreign` (`technology_id`),
  KEY `commodity_technology_commodity_id_foreign` (`commodity_id`),
  CONSTRAINT `commodity_technology_commodity_id_foreign` FOREIGN KEY (`commodity_id`) REFERENCES `commodities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `commodity_technology_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commodity_technology`
--

LOCK TABLES `commodity_technology` WRITE;
/*!40000 ALTER TABLE `commodity_technology` DISABLE KEYS */;
INSERT INTO `commodity_technology` VALUES (4,NULL,NULL,4,2),(12,NULL,NULL,12,1),(13,NULL,NULL,13,5),(14,NULL,NULL,14,4),(15,NULL,NULL,14,5),(18,NULL,NULL,17,6),(19,NULL,NULL,18,6),(20,NULL,NULL,19,6),(21,NULL,NULL,20,6),(22,NULL,NULL,21,6),(23,NULL,NULL,22,2),(24,NULL,NULL,5,5),(25,NULL,NULL,7,24),(26,NULL,NULL,7,31),(27,NULL,NULL,8,20),(28,NULL,NULL,9,12),(29,NULL,NULL,9,20),(30,NULL,NULL,10,2),(31,NULL,NULL,11,12),(32,NULL,NULL,15,50),(33,NULL,NULL,16,20),(34,NULL,NULL,1,15);
/*!40000 ALTER TABLE `commodity_technology` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `copyrights`
--

DROP TABLE IF EXISTS `copyrights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `copyrights` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owners` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `publishers` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_of_creation` date DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `date_of_issuance` date DEFAULT NULL,
  `classes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `registration_number` text COLLATE utf8mb4_unicode_ci,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `technology_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `copyrights_technology_id_foreign` (`technology_id`),
  CONSTRAINT `copyrights_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `copyrights`
--

LOCK TABLES `copyrights` WRITE;
/*!40000 ALTER TABLE `copyrights` DISABLE KEYS */;
/*!40000 ALTER TABLE `copyrights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `filesize` int DEFAULT NULL,
  `filetype` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `technology_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `files_technology_id_foreign` (`technology_id`),
  CONSTRAINT `files_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generator_technology`
--

DROP TABLE IF EXISTS `generator_technology`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generator_technology` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `technology_id` bigint unsigned NOT NULL,
  `generator_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `generator_technology_technology_id_foreign` (`technology_id`),
  KEY `generator_technology_generator_id_foreign` (`generator_id`),
  CONSTRAINT `generator_technology_generator_id_foreign` FOREIGN KEY (`generator_id`) REFERENCES `generators` (`id`) ON DELETE CASCADE,
  CONSTRAINT `generator_technology_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generator_technology`
--

LOCK TABLES `generator_technology` WRITE;
/*!40000 ALTER TABLE `generator_technology` DISABLE KEYS */;
INSERT INTO `generator_technology` VALUES (11,NULL,NULL,4,2),(12,NULL,NULL,4,3),(13,NULL,NULL,4,4),(14,NULL,NULL,4,5),(15,NULL,NULL,4,6),(16,NULL,NULL,5,7),(17,NULL,NULL,5,8),(18,NULL,NULL,5,9),(19,NULL,NULL,7,10),(20,NULL,NULL,8,11),(21,NULL,NULL,8,12),(22,NULL,NULL,8,13),(23,NULL,NULL,8,14),(24,NULL,NULL,8,15),(25,NULL,NULL,9,16),(26,NULL,NULL,9,17),(27,NULL,NULL,9,18),(28,NULL,NULL,10,19),(29,NULL,NULL,10,20),(30,NULL,NULL,10,21),(31,NULL,NULL,10,22),(32,NULL,NULL,11,23),(33,NULL,NULL,14,24),(34,NULL,NULL,15,25),(35,NULL,NULL,15,26),(36,NULL,NULL,15,27),(37,NULL,NULL,15,28),(38,NULL,NULL,16,29),(39,NULL,NULL,16,30);
/*!40000 ALTER TABLE `generator_technology` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generators`
--

DROP TABLE IF EXISTS `generators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generators` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fax` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `agency_id` bigint unsigned NOT NULL,
  `approved` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `generators_agency_id_foreign` (`agency_id`),
  CONSTRAINT `generators_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generators`
--

LOCK TABLES `generators` WRITE;
/*!40000 ALTER TABLE `generators` DISABLE KEYS */;
INSERT INTO `generators` VALUES (1,'2020-10-12 12:18:25','2020-10-12 12:18:25','Generator','Bay, Laguna','0915353462','508-1523','generator@gmail.com',1,2,NULL),(2,'2021-01-20 10:30:48','2021-01-20 10:30:48','Jonathan N. Nayga','Echague, Isabela',NULL,NULL,'jnn_060369@yahoo.com',3,2,3),(3,'2021-01-20 10:33:12','2021-01-20 10:33:12','Aubrey Joy M. Balbin','Echague, Isabela',NULL,NULL,NULL,3,2,3),(4,'2021-01-20 10:34:13','2021-01-20 10:34:13','Olivia M. Gaffud','Echague, Isabela',NULL,NULL,NULL,3,2,3),(5,'2021-01-20 10:34:37','2021-01-20 10:34:37','Mark Joker L. Marcos','Echague, Isabela',NULL,NULL,NULL,3,2,3),(6,'2021-01-20 10:34:59','2021-01-20 10:34:59','Demetrio B. Gumiran','Echague, Isabela',NULL,NULL,NULL,3,2,3),(7,'2021-01-20 12:24:16','2021-01-20 12:24:16','Bede P. Ozaraga','Dumarao, Capiz','(036) 651 0085',NULL,'bede_ozaraga04@yahoo.com',4,2,3),(8,'2021-01-20 12:24:54','2021-01-20 12:24:54','Ma. Sylvia I. Ozaraga','Dumarao, Capiz',NULL,NULL,NULL,4,2,3),(9,'2021-01-20 12:25:12','2021-01-20 12:25:12','Maryneth B. Barrios','Dumarao, Capiz',NULL,NULL,NULL,4,2,3),(10,'2021-01-20 14:22:08','2021-01-20 14:22:08','Dr. Virginia M. Padilla','Los Baños, Laguna',NULL,NULL,NULL,5,2,3),(11,'2021-01-20 14:57:21','2021-01-20 14:57:21','Engr. Isidro D. Milo','Taguig City, Metro Manila',NULL,NULL,NULL,6,2,3),(12,'2021-01-20 14:57:52','2021-01-20 14:57:52','Engr. Ronie S. Alamon','Taguig City, Metro Manila',NULL,NULL,NULL,6,2,3),(13,'2021-01-20 14:58:53','2021-01-20 14:58:53','Emerito V. Banal','Taguig City, Metro Manila',NULL,NULL,NULL,6,2,3),(14,'2021-01-20 14:59:17','2021-01-20 14:59:17','Raymond S. De Ocampo','Taguig City, Metro Manila',NULL,NULL,NULL,6,2,3),(15,'2021-01-20 14:59:44','2021-01-20 14:59:44','Laureano L. Dalay','Taguig City, Metro Manila',NULL,NULL,NULL,6,2,3),(16,'2021-01-21 05:39:06','2021-01-21 05:39:06','Dr. Lucille V. Abad','Diliman, Quezon City',NULL,NULL,NULL,7,2,3),(17,'2021-01-21 05:40:08','2021-01-21 05:40:08','Giuseppe Filam O. Dean','Diliman, Quezon City',NULL,NULL,NULL,7,2,3),(18,'2021-01-21 05:41:07','2021-01-21 05:41:07','Luvimina G. Lanuza','Diliman, Quezon City',NULL,NULL,NULL,7,2,3),(19,'2021-01-22 07:18:15','2021-01-22 07:24:26','Dr. Edgar A. Orden','Science City of Muñoz, Nueva Ecija',NULL,NULL,NULL,8,2,3),(20,'2021-01-22 07:19:29','2021-01-22 07:24:38','Dr. Armando N. Espino, Jr.','Science City of Muñoz, Nueva Ecija',NULL,NULL,NULL,8,2,3),(21,'2021-01-22 07:20:30','2021-01-22 07:24:52','Dr. Maria Excelsis M. Orden','Science City of Muñoz, Nueva Ecija',NULL,NULL,NULL,8,2,3),(22,'2021-01-22 07:21:16','2021-01-22 07:25:02','Neal A. Del Rosario','Science City of Muñoz, Nueva Ecija',NULL,NULL,NULL,8,2,3),(23,'2021-01-25 02:17:46','2021-01-25 02:17:46','Dr. Jose D. Guzman','Tuguegarao City, Cagayan',NULL,NULL,NULL,9,2,3),(24,'2021-01-25 02:53:25','2021-01-25 02:53:25','Dr. Laura J. Pham','Los Baños, Laguna',NULL,NULL,NULL,5,2,3),(25,'2021-01-25 03:35:47','2021-01-25 03:35:47','Dr. Mary Beth A. Maningas','Sampaloc, City of Manila',NULL,NULL,NULL,10,2,3),(26,'2021-01-25 03:37:12','2021-01-25 03:37:12','Dr. Christopher Marlowe A. Caipang','Iloilo City, Iloilo',NULL,NULL,NULL,10,2,3),(27,'2021-01-25 03:38:50','2021-01-25 03:38:50','Dr. Benedict A. Maralit','Rosario, Batangas',NULL,NULL,NULL,10,2,3),(28,'2021-01-25 03:39:53','2021-01-25 03:39:53','Amalea Dulcene D. Nicolasora','Calbayog City, Samar',NULL,NULL,NULL,10,2,3),(29,'2021-01-25 06:44:16','2021-01-25 06:44:16','Dr. Manuel Jose C. Regalado','Science City of Muñoz, Nueva Ecija',NULL,NULL,NULL,11,2,3),(30,'2021-01-25 06:44:56','2021-01-25 06:44:56','Engr. Alexis T. Belonio','Science City of Muñoz, Nueva Ecija',NULL,NULL,NULL,11,2,3);
/*!40000 ALTER TABLE `generators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `header_links`
--

DROP TABLE IF EXISTS `header_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `header_links` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `default` int DEFAULT NULL,
  `position` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_links`
--

LOCK TABLES `header_links` WRITE;
/*!40000 ALTER TABLE `header_links` DISABLE KEYS */;
INSERT INTO `header_links` VALUES (1,'2020-10-12 12:18:26','2020-10-12 12:18:26','Home','http://aanr.ph/en/',1,1),(2,'2020-10-12 12:18:26','2020-10-12 12:18:26','FIESTA','http://167.71.210.45/',1,2),(3,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology','http://167.71.210.45:8081/',1,3),(4,'2020-10-12 12:18:26','2020-10-12 12:18:26','Community','http://167.71.210.45:8080/',1,4),(5,'2020-10-12 12:18:26','2020-10-12 12:18:26','eLib','https://elibrary.pcaarrd.dost.gov.ph/slims/Main',1,5);
/*!40000 ALTER TABLE `header_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industrial_designs`
--

DROP TABLE IF EXISTS `industrial_designs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `industrial_designs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `application_number` text COLLATE utf8mb4_unicode_ci,
  `registration_number` text COLLATE utf8mb4_unicode_ci,
  `date_of_filing` date DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `technology_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `industrial_designs_technology_id_foreign` (`technology_id`),
  CONSTRAINT `industrial_designs_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industrial_designs`
--

LOCK TABLES `industrial_designs` WRITE;
/*!40000 ALTER TABLE `industrial_designs` DISABLE KEYS */;
INSERT INTO `industrial_designs` VALUES (1,'2021-01-21 04:50:08','2021-01-21 04:50:08','PH /3/2020/050170','-','2020-05-14',NULL,'Published',8),(2,'2021-01-22 07:35:13','2021-01-22 07:35:13','PH /3/2017/050189','2017050189','2017-10-29','2019-03-06','Published',10),(3,'2021-01-25 02:20:54','2021-01-25 02:20:54','PH /3/2018/050171','2018050171','2018-07-13','2019-12-03','Published',11);
/*!40000 ALTER TABLE `industrial_designs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industries`
--

DROP TABLE IF EXISTS `industries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `industries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `approved` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industries`
--

LOCK TABLES `industries` WRITE;
/*!40000 ALTER TABLE `industries` DISABLE KEYS */;
INSERT INTO `industries` VALUES (1,2,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,'Agriculture','5dea015236480aanr_crops.jpg'),(2,2,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,'Aquatic Resources','aanr_aquatic.jpg'),(3,2,'2020-10-12 12:18:25','2020-10-12 12:18:25',1,'Natural Resources','aanr_forestenvi.jpg');
/*!40000 ALTER TABLE `industries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `landing_pages`
--

DROP TABLE IF EXISTS `landing_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `landing_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `footer_about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `landing_page_item_carousel` int NOT NULL DEFAULT '1',
  `landing_page_item_social_media_button` int NOT NULL DEFAULT '1',
  `landing_page_item_technology_counter` int NOT NULL DEFAULT '1',
  `landing_page_item_technology_grid_view` int NOT NULL DEFAULT '1',
  `landing_page_item_technology_table_view` int NOT NULL DEFAULT '1',
  `landing_page_item_technology_dashboard_view` int NOT NULL DEFAULT '1',
  `landing_page_item_technology_commodity_view` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `landing_pages`
--

LOCK TABLES `landing_pages` WRITE;
/*!40000 ALTER TABLE `landing_pages` DISABLE KEYS */;
INSERT INTO `landing_pages` VALUES (1,'2020-10-12 12:18:26','2020-10-29 17:20:31','The Technology Transfer and Promotion Division (TTPD) facilitates the transfer of the developed technologies to end users of agriculture, forestry, aquatic and natural resources, as well as the conduct of information dissemination, advocacy and promotion of the same.',1,1,1,1,1,1,1);
/*!40000 ALTER TABLE `landing_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_level` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `IP_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=321 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'2020-10-12 12:19:03','2020-10-12 12:19:03','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(2,'2020-10-12 12:19:13','2020-10-12 12:19:13','1','superadmin','Added \'chrysanthemum growing areas\'','5','127.0.0.1','Technology Applicability - Industry'),(3,'2020-10-12 12:19:34','2020-10-12 12:19:34','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(4,'2020-10-12 12:19:56','2020-10-12 12:19:56','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(5,'2020-10-12 12:26:54','2020-10-12 12:26:54','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(6,'2020-10-12 12:31:58','2020-10-12 12:31:58','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(7,'2020-10-12 12:32:37','2020-10-12 12:32:37','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(8,'2020-10-12 12:33:32','2020-10-12 12:33:32','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(9,'2020-10-12 12:33:42','2020-10-12 12:33:42','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(10,'2020-10-12 12:36:21','2020-10-12 12:36:21','1','superadmin','Removed  from Technologies','5','127.0.0.1','Technologies'),(11,'2020-10-12 12:36:58','2020-10-12 12:36:58','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(12,'2020-10-12 12:37:42','2020-10-12 12:37:42','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(13,'2020-10-12 12:38:24','2020-10-12 12:38:24','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(14,'2020-10-12 12:43:34','2020-10-12 12:43:34','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(15,'2020-10-12 13:52:23','2020-10-12 13:52:23','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(16,'2020-10-12 13:53:56','2020-10-12 13:53:56','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(17,'2020-10-12 14:32:55','2020-10-12 14:32:55','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(18,'2020-10-12 14:33:06','2020-10-12 14:33:06','1','superadmin','Changed \'Products\' details','5','127.0.0.1','Technology Categories'),(19,'2020-10-12 14:33:10','2020-10-12 14:33:10','1','superadmin','Changed \'Machinery\' details','5','127.0.0.1','Technology Categories'),(20,'2020-10-12 14:48:58','2020-10-12 14:48:58','1','superadmin','Added \'Native Chicken\'','5','127.0.0.1','Commodities'),(21,'2020-10-12 14:49:30','2020-10-12 14:49:30','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(22,'2020-10-12 14:49:44','2020-10-12 14:49:44','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(23,'2020-10-12 14:50:25','2020-10-12 14:50:25','1','superadmin','Added \'Vegetables\'','5','127.0.0.1','Commodities'),(24,'2020-10-12 14:51:05','2020-10-12 14:51:05','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(25,'2020-10-12 14:51:32','2020-10-12 14:51:32','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(26,'2020-10-19 07:54:33','2020-10-19 07:54:33','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(27,'2020-10-19 07:54:49','2020-10-19 07:54:49','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(28,'2020-10-19 07:55:06','2020-10-19 07:55:06','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(29,'2020-10-19 13:02:49','2020-10-19 13:02:49','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(30,'2020-10-19 13:03:00','2020-10-19 13:03:00','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(31,'2020-10-19 13:06:22','2020-10-19 13:06:22','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(32,'2020-10-19 13:06:34','2020-10-19 13:06:34','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(33,'2020-10-19 13:07:08','2020-10-19 13:07:08','1','superadmin','Added a new technology','5','127.0.0.1','Technologies'),(34,'2020-10-19 13:07:19','2020-10-19 13:07:19','1','superadmin','Changed \'\' details','5','127.0.0.1','Technologies'),(35,'2020-11-03 21:23:00','2020-11-03 21:23:00','1','superadmin','Added \'123\'','5','127.0.0.1','Industries'),(36,'2020-11-03 21:23:03','2020-11-03 21:23:03','1','superadmin','Removed 123 from Industries','5','127.0.0.1','Industries'),(37,'2020-11-23 03:17:25','2020-11-23 03:17:25','1','superadmin','Removed  from Technologies','5','49.149.148.28','Technologies'),(38,'2020-11-23 03:20:33','2020-11-23 03:20:33','1','superadmin','Added \'Goat Farming Industry\'','5','49.149.148.28','Technology Applicability - Industry'),(39,'2020-11-23 03:20:47','2020-11-23 03:20:47','1','superadmin','Changed \'\' details','5','49.149.148.28','Technologies'),(40,'2020-11-23 03:21:52','2020-11-23 03:21:52','1','superadmin','Added \'Products - Chemical Formulation\'','5','49.149.148.28','Technology Categories'),(41,'2020-11-23 03:22:00','2020-11-23 03:22:00','1','superadmin','Changed \'\' details','5','49.149.148.28','Technologies'),(42,'2020-11-23 03:35:06','2020-11-23 03:35:06','1','superadmin','Changed \'\' details','5','49.149.148.28','Technologies'),(43,'2020-12-05 13:32:51','2020-12-05 13:32:51','1','superadmin','Changed \'\' details','5','49.144.173.96','Technologies'),(44,'2021-01-20 04:07:02','2021-01-20 04:07:02','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(45,'2021-01-20 04:08:48','2021-01-20 04:08:48','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(46,'2021-01-20 04:10:10','2021-01-20 04:10:10','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(47,'2021-01-20 04:11:08','2021-01-20 04:11:08','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(48,'2021-01-20 04:11:50','2021-01-20 04:11:50','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(49,'2021-01-20 04:12:41','2021-01-20 04:12:41','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(50,'2021-01-20 04:13:31','2021-01-20 04:13:31','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(51,'2021-01-20 04:14:11','2021-01-20 04:14:11','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(52,'2021-01-20 04:14:43','2021-01-20 04:14:43','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(53,'2021-01-20 04:15:39','2021-01-20 04:15:39','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(54,'2021-01-20 04:16:20','2021-01-20 04:16:20','1','superadmin','Added a new technology','5','49.147.87.25','Technologies'),(55,'2021-01-20 09:33:31','2021-01-20 09:33:31','3','Alexander Borja','Added \'Coconut\'','5','103.66.223.4','Commodities'),(56,'2021-01-20 09:33:44','2021-01-20 09:33:44','3','Alexander Borja','Added \'Corn and other grains\'','5','103.66.223.4','Commodities'),(57,'2021-01-20 09:34:01','2021-01-20 09:34:01','3','Alexander Borja','Added \'Fruit Crops - Mango\'','5','103.66.223.4','Commodities'),(58,'2021-01-20 09:34:20','2021-01-20 09:34:20','3','Alexander Borja','Added \'Fruit Crops - Banana\'','5','103.66.223.4','Commodities'),(59,'2021-01-20 09:34:36','2021-01-20 09:34:36','3','Alexander Borja','Changed \'Fruit Crops - Jackfruit\' details','5','103.66.223.4','Commodities'),(60,'2021-01-20 09:35:00','2021-01-20 09:35:00','3','Alexander Borja','Added \'Fruit Crops - Other tropical fruits\'','5','103.66.223.4','Commodities'),(61,'2021-01-20 09:35:18','2021-01-20 09:35:18','3','Alexander Borja','Added \'Legumes\'','5','103.66.223.4','Commodities'),(62,'2021-01-20 09:35:46','2021-01-20 09:35:46','3','Alexander Borja','Added \'Natural Sources of Dye\'','5','103.66.223.4','Commodities'),(63,'2021-01-20 09:36:01','2021-01-20 09:36:01','3','Alexander Borja','Added \'Pili and Cashew\'','5','103.66.223.4','Commodities'),(64,'2021-01-20 09:36:14','2021-01-20 09:36:14','3','Alexander Borja','Added \'Ornamentals\'','5','103.66.223.4','Commodities'),(65,'2021-01-20 09:36:32','2021-01-20 09:36:32','3','Alexander Borja','Added \'Medicinal Plants\'','5','103.66.223.4','Commodities'),(66,'2021-01-20 09:37:09','2021-01-20 09:37:09','3','Alexander Borja','Added \'Plantation Crops - Cacao\'','5','103.66.223.4','Commodities'),(67,'2021-01-20 09:37:38','2021-01-20 09:37:38','3','Alexander Borja','Added \'Plantattion Crops - Coffee\'','5','103.66.223.4','Commodities'),(68,'2021-01-20 09:37:53','2021-01-20 09:37:53','3','Alexander Borja','Added \'Plantation Crops - Oil Palm\'','5','103.66.223.4','Commodities'),(69,'2021-01-20 09:38:51','2021-01-20 09:38:51','3','Alexander Borja','Changed \'Pili\' details','5','103.66.223.4','Commodities'),(70,'2021-01-20 09:39:20','2021-01-20 09:39:20','3','Alexander Borja','Changed \'Banana\' details','5','103.66.223.4','Commodities'),(71,'2021-01-20 09:39:49','2021-01-20 09:39:49','3','Alexander Borja','Added \'Rice\'','5','103.66.223.4','Commodities'),(72,'2021-01-20 09:40:18','2021-01-20 09:40:18','3','Alexander Borja','Added \'Rootcrop - Purple Yam\'','5','103.66.223.4','Commodities'),(73,'2021-01-20 09:40:57','2021-01-20 09:40:57','3','Alexander Borja','Added \'Rootcrop: Sweet Potato\'','5','103.66.223.4','Commodities'),(74,'2021-01-20 09:41:17','2021-01-20 09:41:17','3','Alexander Borja','Added \'Rootcrop - White Potato\'','5','103.66.223.4','Commodities'),(75,'2021-01-20 09:41:34','2021-01-20 09:41:34','3','Alexander Borja','Changed \'Rootcrop - Sweet Potato\' details','5','103.66.223.4','Commodities'),(76,'2021-01-20 09:41:52','2021-01-20 09:41:52','3','Alexander Borja','Added \'Sugarcane\'','5','103.66.223.4','Commodities'),(77,'2021-01-20 09:42:06','2021-01-20 09:42:06','3','Alexander Borja','Added \'Tropical Fruit - Citrus\'','5','103.66.223.4','Commodities'),(78,'2021-01-20 09:42:21','2021-01-20 09:42:21','3','Alexander Borja','Added \'Tropical Fruit - Durian\'','5','103.66.223.4','Commodities'),(79,'2021-01-20 09:42:42','2021-01-20 09:42:42','3','Alexander Borja','Changed \'Tropical Fruit - Jackfruit\' details','5','103.66.223.4','Commodities'),(80,'2021-01-20 09:43:52','2021-01-20 09:43:52','3','Alexander Borja','Added \'Tropical Fruit - Papaya\'','5','103.66.223.4','Commodities'),(81,'2021-01-20 09:44:17','2021-01-20 09:44:17','3','Alexander Borja','Added \'Tropical Fruit - Pineapple\'','5','103.66.223.4','Commodities'),(82,'2021-01-20 09:44:32','2021-01-20 09:44:32','3','Alexander Borja','Added \'Tropical Fruit - Pummelo\'','5','103.66.223.4','Commodities'),(83,'2021-01-20 09:44:59','2021-01-20 09:44:59','3','Alexander Borja','Added \'Vegetable\'','5','103.66.223.4','Commodities'),(84,'2021-01-20 09:45:13','2021-01-20 09:45:13','3','Alexander Borja','Added \'Vegetable - Eggplant\'','5','103.66.223.4','Commodities'),(85,'2021-01-20 09:45:24','2021-01-20 09:45:24','3','Alexander Borja','Added \'Vegetable - Garlic\'','5','103.66.223.4','Commodities'),(86,'2021-01-20 09:45:37','2021-01-20 09:45:37','3','Alexander Borja','Added \'Vegetable - Potato\'','5','103.66.223.4','Commodities'),(87,'2021-01-20 09:45:51','2021-01-20 09:45:51','3','Alexander Borja','Added \'Vegetable - Tomato\'','5','103.66.223.4','Commodities'),(88,'2021-01-20 09:46:44','2021-01-20 09:46:44','3','Alexander Borja','Added \'Cross-cutting\'','5','103.66.223.4','Sectors'),(89,'2021-01-20 09:47:05','2021-01-20 09:47:05','3','Alexander Borja','Added \'Cross-cutting\'','5','103.66.223.4','Commodities'),(90,'2021-01-20 09:47:52','2021-01-20 09:47:52','3','Alexander Borja','Added \'Bamboo\'','5','103.66.223.4','Commodities'),(91,'2021-01-20 09:48:02','2021-01-20 09:48:02','3','Alexander Borja','Added \'Cacao\'','5','103.66.223.4','Commodities'),(92,'2021-01-20 09:48:21','2021-01-20 09:48:21','3','Alexander Borja','Added \'Industrial Tree Plantation\'','5','103.66.223.4','Commodities'),(93,'2021-01-20 09:49:14','2021-01-20 09:49:14','3','Alexander Borja','Added \'Inland Environmental Services (IES) - Biodiversity\'','5','103.66.223.4','Commodities'),(94,'2021-01-20 09:49:42','2021-01-20 09:49:42','3','Alexander Borja','Added \'Inland Environmental Services (IES) - Climate Change\'','5','103.66.223.4','Commodities'),(95,'2021-01-20 09:51:19','2021-01-20 09:51:19','3','Alexander Borja','Added \'Inland Environmental Services (IES) - Mangrove\'','5','103.66.223.4','Commodities'),(96,'2021-01-20 09:51:30','2021-01-20 09:51:30','3','Alexander Borja','Added \'Inland Environmental Services (IES) - Watershed\'','5','103.66.223.4','Commodities'),(97,'2021-01-20 09:51:36','2021-01-20 09:51:36','3','Alexander Borja','Added \'Inland Environmental Services (IES) - Watershed\'','5','103.66.223.4','Commodities'),(98,'2021-01-20 09:52:03','2021-01-20 09:52:03','3','Alexander Borja','Added \'Non-Timber Forest Products (NTFP)\'','5','103.66.223.4','Commodities'),(99,'2021-01-20 09:52:19','2021-01-20 09:52:19','3','Alexander Borja','Added \'Sago\'','5','103.66.223.4','Commodities'),(100,'2021-01-20 09:52:37','2021-01-20 09:52:37','3','Alexander Borja','Added \'Feed Resources - Aquafeeds\'','5','103.66.223.4','Commodities'),(101,'2021-01-20 09:52:52','2021-01-20 09:52:52','3','Alexander Borja','Added \'Mangrove Crab - Mudcrab\'','5','103.66.223.4','Commodities'),(102,'2021-01-20 09:53:05','2021-01-20 09:53:05','3','Alexander Borja','Added \'Milkfish\'','5','103.66.223.4','Commodities'),(103,'2021-01-20 09:53:38','2021-01-20 09:53:38','3','Alexander Borja','Added \'Mussel\'','5','103.66.223.4','Commodities'),(104,'2021-01-20 09:55:28','2021-01-20 09:55:28','3','Alexander Borja','Added \'Shrimp\'','5','103.66.223.4','Commodities'),(105,'2021-01-20 09:55:39','2021-01-20 09:55:39','3','Alexander Borja','Added \'Tilapia\'','5','103.66.223.4','Commodities'),(106,'2021-01-20 09:55:54','2021-01-20 09:55:54','3','Alexander Borja','Added \'Dairy Buffalo\'','5','103.66.223.4','Commodities'),(107,'2021-01-20 09:56:11','2021-01-20 09:56:11','3','Alexander Borja','Added \'Dairy Cattle\'','5','103.66.223.4','Commodities'),(108,'2021-01-20 09:56:39','2021-01-20 09:56:39','3','Alexander Borja','Added \'Dairy Goat\'','5','103.66.223.4','Commodities'),(109,'2021-01-20 09:56:47','2021-01-20 09:56:47','3','Alexander Borja','Added \'Duck\'','5','103.66.223.4','Commodities'),(110,'2021-01-20 09:57:10','2021-01-20 09:57:10','3','Alexander Borja','Added \'Feed Resources\'','5','103.66.223.4','Commodities'),(111,'2021-01-20 09:57:29','2021-01-20 09:57:29','3','Alexander Borja','Added \'Native Chicken\'','5','103.66.223.4','Commodities'),(112,'2021-01-20 09:57:44','2021-01-20 09:57:44','3','Alexander Borja','Added \'Slaughter Goat\'','5','103.66.223.4','Commodities'),(113,'2021-01-20 09:58:45','2021-01-20 09:58:45','3','Alexander Borja','Added \'Swine\'','5','103.66.223.4','Commodities'),(114,'2021-01-20 09:59:10','2021-01-20 09:59:10','3','Alexander Borja','Added \'Abalone\'','5','103.66.223.4','Commodities'),(115,'2021-01-20 09:59:25','2021-01-20 09:59:25','3','Alexander Borja','Added \'Blue Swimming Crab\'','5','103.66.223.4','Commodities'),(116,'2021-01-20 10:02:06','2021-01-20 10:02:06','3','Alexander Borja','Added \'Environmental Services\'','5','103.66.223.4','Sectors'),(117,'2021-01-20 10:03:02','2021-01-20 10:03:02','3','Alexander Borja','Added \'Ocean Environmental Services (OES) - Bathymetry\'','5','103.66.223.4','Commodities'),(118,'2021-01-20 10:03:15','2021-01-20 10:03:15','3','Alexander Borja','Added \'Ocean Environmental Services (OES) - Corals\'','5','103.66.223.4','Commodities'),(119,'2021-01-20 10:03:50','2021-01-20 10:03:50','3','Alexander Borja','Added \'Ocean Environmental Services (OES) - Fishing Maps\'','5','103.66.223.4','Commodities'),(120,'2021-01-20 10:04:12','2021-01-20 10:04:12','3','Alexander Borja','Added \'Ocean Environmental Services (OES) - Harmful Algal Blooms\'','5','103.66.223.4','Commodities'),(121,'2021-01-20 10:04:27','2021-01-20 10:04:27','3','Alexander Borja','Added \'Oyster\'','5','103.66.223.4','Commodities'),(122,'2021-01-20 10:04:37','2021-01-20 10:04:37','3','Alexander Borja','Added \'Sardines\'','5','103.66.223.4','Commodities'),(123,'2021-01-20 10:04:50','2021-01-20 10:04:50','3','Alexander Borja','Added \'Sea Cucumber\'','5','103.66.223.4','Commodities'),(124,'2021-01-20 10:05:02','2021-01-20 10:05:02','3','Alexander Borja','Added \'Seaweeds\'','5','103.66.223.4','Commodities'),(125,'2021-01-20 10:05:13','2021-01-20 10:05:13','3','Alexander Borja','Added \'Tuna\'','5','103.66.223.4','Commodities'),(126,'2021-01-20 10:05:45','2021-01-20 10:05:45','3','Alexander Borja','Added \'Smart Farming\'','5','103.66.223.4','Commodities'),(127,'2021-01-20 10:15:58','2021-01-20 10:15:58','3','Alexander Borja','Added \'Products - Artificial Insemination (AI)\'','5','103.66.223.4','Technology Categories'),(128,'2021-01-20 10:16:50','2021-01-20 10:16:50','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(129,'2021-01-20 10:27:57','2021-01-20 10:27:57','3','Alexander Borja','Added \'Isabela State University (ISU)\'','5','103.66.223.4','Agencies'),(130,'2021-01-20 10:30:48','2021-01-20 10:30:48','3','Alexander Borja','Added \'Jonathan N. Nayga\'','5','103.66.223.4','Generators'),(131,'2021-01-20 10:33:12','2021-01-20 10:33:12','3','Alexander Borja','Added \'Aubrey Joy M. Balbin\'','5','103.66.223.4','Generators'),(132,'2021-01-20 10:34:13','2021-01-20 10:34:13','3','Alexander Borja','Added \'Olivia M. Gaffud\'','5','103.66.223.4','Generators'),(133,'2021-01-20 10:34:37','2021-01-20 10:34:37','3','Alexander Borja','Added \'Mark Joker L. Marcos\'','5','103.66.223.4','Generators'),(134,'2021-01-20 10:34:59','2021-01-20 10:34:59','3','Alexander Borja','Added \'Demetrio B. Gumiran\'','5','103.66.223.4','Generators'),(135,'2021-01-20 10:36:33','2021-01-20 10:36:33','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(136,'2021-01-20 10:38:56','2021-01-20 10:38:56','3','Alexander Borja','Added \'Private Farm\'','5','103.66.223.4','Adopter Types'),(137,'2021-01-20 10:39:57','2021-01-20 10:39:57','3','Alexander Borja','Added \'DV Boer Farm\'','5','103.66.223.4','Adopters'),(138,'2021-01-20 10:40:31','2021-01-20 10:40:31','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(139,'2021-01-20 10:40:52','2021-01-20 10:40:52','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(140,'2021-01-20 10:59:30','2021-01-20 10:59:30','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(141,'2021-01-20 11:21:01','2021-01-20 11:21:01','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(142,'2021-01-20 11:28:58','2021-01-20 11:28:58','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(143,'2021-01-20 11:34:12','2021-01-20 11:34:12','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(144,'2021-01-20 11:37:18','2021-01-20 11:37:18','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(145,'2021-01-20 12:09:59','2021-01-20 12:09:59','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(146,'2021-01-20 12:17:09','2021-01-20 12:17:09','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(147,'2021-01-20 12:18:09','2021-01-20 12:18:09','3','Alexander Borja','Changed \'Commodity by-product utilization or waste treatment\' details','5','103.66.223.4','Technology Categories'),(148,'2021-01-20 12:19:30','2021-01-20 12:19:30','3','Alexander Borja','Added \'Process\'','5','103.66.223.4','Technology Categories'),(149,'2021-01-20 12:19:56','2021-01-20 12:19:56','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(150,'2021-01-20 12:23:07','2021-01-20 12:23:07','3','Alexander Borja','Added \'Capiz State University (CapSU)\'','5','103.66.223.4','Agencies'),(151,'2021-01-20 12:24:16','2021-01-20 12:24:16','3','Alexander Borja','Added \'Bede P. Ozaraga\'','5','103.66.223.4','Generators'),(152,'2021-01-20 12:24:54','2021-01-20 12:24:54','3','Alexander Borja','Added \'Ma. Sylvia I. Ozaraga\'','5','103.66.223.4','Generators'),(153,'2021-01-20 12:25:12','2021-01-20 12:25:12','3','Alexander Borja','Added \'Maryneth B. Barrios\'','5','103.66.223.4','Generators'),(154,'2021-01-20 12:26:56','2021-01-20 12:26:56','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(155,'2021-01-20 12:30:30','2021-01-20 12:30:30','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(156,'2021-01-20 12:31:59','2021-01-20 12:31:59','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(157,'2021-01-20 12:32:14','2021-01-20 12:32:14','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(158,'2021-01-20 12:41:01','2021-01-20 12:41:01','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(159,'2021-01-20 12:42:39','2021-01-20 12:42:39','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(160,'2021-01-20 12:47:50','2021-01-20 12:47:50','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(161,'2021-01-20 12:50:39','2021-01-20 12:50:39','3','Alexander Borja','Added \'Spin-off\'','5','103.66.223.4','Adopter Types'),(162,'2021-01-20 12:52:20','2021-01-20 12:52:20','3','Alexander Borja','Added \'BD OZ Veterinary Products Trading\'','5','103.66.223.4','Adopters'),(163,'2021-01-20 12:52:49','2021-01-20 12:52:49','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(164,'2021-01-20 12:57:11','2021-01-20 12:57:11','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(165,'2021-01-20 13:12:41','2021-01-20 13:12:41','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(166,'2021-01-20 13:13:03','2021-01-20 13:13:03','3','Alexander Borja','Added \'Poultry Production\'','5','103.66.223.4','Technology Applicability - Industry'),(167,'2021-01-20 13:13:27','2021-01-20 13:13:27','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(168,'2021-01-20 13:25:34','2021-01-20 13:25:34','3','Alexander Borja','Removed  from Technologies','5','103.66.223.4','Technologies'),(169,'2021-01-20 13:34:16','2021-01-20 13:34:16','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(170,'2021-01-20 13:37:18','2021-01-20 13:37:18','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(171,'2021-01-20 13:49:12','2021-01-20 13:49:12','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(172,'2021-01-20 14:02:16','2021-01-20 14:02:16','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(173,'2021-01-20 14:04:44','2021-01-20 14:04:44','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(174,'2021-01-20 14:05:04','2021-01-20 14:05:04','3','Alexander Borja','Added \'Sugarcane Industry\'','5','103.66.223.4','Technology Applicability - Industry'),(175,'2021-01-20 14:05:34','2021-01-20 14:05:34','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(176,'2021-01-20 14:06:26','2021-01-20 14:06:26','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(177,'2021-01-20 14:06:50','2021-01-20 14:06:50','3','Alexander Borja','Added \'Product - Biofertilizer\'','5','103.66.223.4','Technology Categories'),(178,'2021-01-20 14:14:48','2021-01-20 14:14:48','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(179,'2021-01-20 14:17:34','2021-01-20 14:17:34','3','Alexander Borja','Added \'University of the Philippines Los Baños\'','5','103.66.223.4','Agencies'),(180,'2021-01-20 14:18:04','2021-01-20 14:18:04','3','Alexander Borja','Changed \'Isabela State University (ISU)\' details','5','103.66.223.4','Agencies'),(181,'2021-01-20 14:18:20','2021-01-20 14:18:20','3','Alexander Borja','Changed \'Capiz State University (CapSU)\' details','5','103.66.223.4','Agencies'),(182,'2021-01-20 14:18:42','2021-01-20 14:18:42','3','Alexander Borja','Changed \'Capiz State University (CapSU)\' details','5','103.66.223.4','Agencies'),(183,'2021-01-20 14:18:52','2021-01-20 14:18:52','3','Alexander Borja','Changed \'Isabela State University (ISU)\' details','5','103.66.223.4','Agencies'),(184,'2021-01-20 14:22:08','2021-01-20 14:22:08','3','Alexander Borja','Added \'Dr. Virginia M. Padilla\'','5','103.66.223.4','Generators'),(185,'2021-01-20 14:22:26','2021-01-20 14:22:26','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(186,'2021-01-20 14:27:54','2021-01-20 14:27:54','3','Alexander Borja','Changed \'University of the Philippines Los Baños - National Institute of Molecular Biology and Biotechnology (UPLB-Biotech)\' details','5','103.66.223.4','Agencies'),(187,'2021-01-20 14:28:24','2021-01-20 14:28:24','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(188,'2021-01-20 14:37:18','2021-01-20 14:37:18','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(189,'2021-01-20 14:40:16','2021-01-20 14:40:16','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(190,'2021-01-20 14:45:22','2021-01-20 14:45:22','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(191,'2021-01-20 14:48:22','2021-01-20 14:48:22','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(192,'2021-01-20 14:49:16','2021-01-20 14:49:16','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(193,'2021-01-20 14:51:10','2021-01-20 14:51:10','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(194,'2021-01-20 14:55:04','2021-01-20 14:55:04','3','Alexander Borja','Added \'Department of Science and Technology - Metals Industry Research and Development Center (DOST-MIRDC)\'','5','103.66.223.4','Agencies'),(195,'2021-01-20 14:55:43','2021-01-20 14:55:43','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(196,'2021-01-20 14:55:55','2021-01-20 14:55:55','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(197,'2021-01-20 14:57:21','2021-01-20 14:57:21','3','Alexander Borja','Added \'Engr. Isidro D. Milo\'','5','103.66.223.4','Generators'),(198,'2021-01-20 14:57:52','2021-01-20 14:57:52','3','Alexander Borja','Added \'Engr. Ronie S. Alamon\'','5','103.66.223.4','Generators'),(199,'2021-01-20 14:58:53','2021-01-20 14:58:53','3','Alexander Borja','Added \'Emerito V. Banal\'','5','103.66.223.4','Generators'),(200,'2021-01-20 14:59:17','2021-01-20 14:59:17','3','Alexander Borja','Added \'Raymond S. De Ocampo\'','5','103.66.223.4','Generators'),(201,'2021-01-20 14:59:44','2021-01-20 14:59:44','3','Alexander Borja','Added \'Laureano L. Dalay\'','5','103.66.223.4','Generators'),(202,'2021-01-20 14:59:58','2021-01-20 14:59:58','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(203,'2021-01-20 15:00:26','2021-01-20 15:00:26','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(204,'2021-01-20 15:13:08','2021-01-20 15:13:08','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(205,'2021-01-21 00:36:52','2021-01-21 00:36:52','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(206,'2021-01-21 00:36:56','2021-01-21 00:36:56','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(207,'2021-01-21 00:37:01','2021-01-21 00:37:01','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(208,'2021-01-21 04:05:51','2021-01-21 04:05:51','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(209,'2021-01-21 04:06:19','2021-01-21 04:06:19','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(210,'2021-01-21 04:06:46','2021-01-21 04:06:46','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(211,'2021-01-21 04:07:08','2021-01-21 04:07:08','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(212,'2021-01-21 04:25:43','2021-01-21 04:25:43','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(213,'2021-01-21 04:43:24','2021-01-21 04:43:24','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(214,'2021-01-21 04:44:49','2021-01-21 04:44:49','3','Alexander Borja','Toggle Invention fromNutrio Biofertilizer for Eggplant and Sugarcane','5','103.66.223.4','Technologies'),(215,'2021-01-21 04:44:57','2021-01-21 04:44:57','3','Alexander Borja','Toggle Invention fromNutrio Biofertilizer for Eggplant and Sugarcane','5','103.66.223.4','Technologies'),(216,'2021-01-21 04:45:46','2021-01-21 04:45:46','3','Alexander Borja','Toggle Invention fromNutrio Biofertilizer for Eggplant and Sugarcane','5','103.66.223.4','Technologies'),(217,'2021-01-21 04:47:09','2021-01-21 04:47:09','3','Alexander Borja','Toggle Invention fromRice Harvester Attachment (System of Assembling a Combined Harvester and Thresher attachment to Hand Tractor and the Apparatus Therefrom)','5','103.66.223.4','Technologies'),(218,'2021-01-21 04:50:22','2021-01-21 04:50:22','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(219,'2021-01-21 05:05:14','2021-01-21 05:05:14','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(220,'2021-01-21 05:06:08','2021-01-21 05:06:08','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(221,'2021-01-21 05:06:36','2021-01-21 05:06:36','3','Alexander Borja','Added \'Rice Industry\'','5','103.66.223.4','Technology Applicability - Industry'),(222,'2021-01-21 05:07:43','2021-01-21 05:07:43','3','Alexander Borja','Added \'Product - Plant Growth Formulation\'','5','103.66.223.4','Technology Categories'),(223,'2021-01-21 05:08:44','2021-01-21 05:08:44','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(224,'2021-01-21 05:09:00','2021-01-21 05:09:00','3','Alexander Borja','Changed \'Plantation Crops - Coffee\' details','5','103.66.223.4','Commodities'),(225,'2021-01-21 05:09:16','2021-01-21 05:09:16','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(226,'2021-01-21 05:13:03','2021-01-21 05:13:03','3','Alexander Borja','Added \'Department of Science and Technology - Philippine Nuclear Research Institute (DOST-PNRI)\'','5','103.66.223.4','Agencies'),(227,'2021-01-21 05:13:26','2021-01-21 05:13:26','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(228,'2021-01-21 05:39:06','2021-01-21 05:39:06','3','Alexander Borja','Added \'Dr. Lucille V. Abad\'','5','103.66.223.4','Generators'),(229,'2021-01-21 05:40:08','2021-01-21 05:40:08','3','Alexander Borja','Added \'Giuseppe Filam O. Dean\'','5','103.66.223.4','Generators'),(230,'2021-01-21 05:41:07','2021-01-21 05:41:07','3','Alexander Borja','Added \'Luvimina G. Lanuza\'','5','103.66.223.4','Generators'),(231,'2021-01-21 05:41:29','2021-01-21 05:41:29','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(232,'2021-01-21 05:44:18','2021-01-21 05:44:18','3','Alexander Borja','Added \'HL Trading Company Incorporated\'','5','103.66.223.4','Adopters'),(233,'2021-01-21 05:47:37','2021-01-21 05:47:37','3','Alexander Borja','Added \'Magic Touch Print Shop\'','5','103.66.223.4','Adopters'),(234,'2021-01-21 05:48:14','2021-01-21 05:48:14','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(235,'2021-01-21 05:50:04','2021-01-21 05:50:04','3','Alexander Borja','Toggle Invention fromCarrageenan Plant Growth Promoter','5','103.66.223.4','Technologies'),(236,'2021-01-21 05:53:01','2021-01-21 05:53:01','3','Alexander Borja','Changed \'\' details','5','103.66.223.4','Technologies'),(237,'2021-01-22 07:05:42','2021-01-22 07:05:42','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(238,'2021-01-22 07:16:22','2021-01-22 07:16:22','3','Alexander Borja','Added \'Central Luzon State University (CLSU)\'','5','202.90.129.17','Agencies'),(239,'2021-01-22 07:18:15','2021-01-22 07:18:15','3','Alexander Borja','Added \'Edgar A. Ordern\'','5','202.90.129.17','Generators'),(240,'2021-01-22 07:18:37','2021-01-22 07:18:37','3','Alexander Borja','Changed \'Dr. Edgar A. Orden\' details','5','202.90.129.17','Generators'),(241,'2021-01-22 07:19:29','2021-01-22 07:19:29','3','Alexander Borja','Added \'Dr. Armando N. Espino, Jr.\'','5','202.90.129.17','Generators'),(242,'2021-01-22 07:20:30','2021-01-22 07:20:30','3','Alexander Borja','Added \'Dr. Maria Excelsis M. Orden\'','5','202.90.129.17','Generators'),(243,'2021-01-22 07:21:16','2021-01-22 07:21:16','3','Alexander Borja','Added \'Neal A. Del Rosario\'','5','202.90.129.17','Generators'),(244,'2021-01-22 07:23:55','2021-01-22 07:23:55','3','Alexander Borja','Changed \'Neal A. Del Rosario\' details','5','202.90.129.17','Generators'),(245,'2021-01-22 07:24:06','2021-01-22 07:24:06','3','Alexander Borja','Changed \'Dr. Maria Excelsis M. Orden\' details','5','202.90.129.17','Generators'),(246,'2021-01-22 07:24:15','2021-01-22 07:24:15','3','Alexander Borja','Changed \'Dr. Armando N. Espino, Jr.\' details','5','202.90.129.17','Generators'),(247,'2021-01-22 07:24:26','2021-01-22 07:24:26','3','Alexander Borja','Changed \'Dr. Edgar A. Orden\' details','5','202.90.129.17','Generators'),(248,'2021-01-22 07:24:38','2021-01-22 07:24:38','3','Alexander Borja','Changed \'Dr. Armando N. Espino, Jr.\' details','5','202.90.129.17','Generators'),(249,'2021-01-22 07:24:52','2021-01-22 07:24:52','3','Alexander Borja','Changed \'Dr. Maria Excelsis M. Orden\' details','5','202.90.129.17','Generators'),(250,'2021-01-22 07:25:02','2021-01-22 07:25:02','3','Alexander Borja','Changed \'Neal A. Del Rosario\' details','5','202.90.129.17','Generators'),(251,'2021-01-22 07:25:59','2021-01-22 07:25:59','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(252,'2021-01-22 07:34:20','2021-01-22 07:34:20','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(253,'2021-01-22 07:47:28','2021-01-22 07:47:28','3','Alexander Borja','Added \'Entrepreneur\'','5','202.90.129.17','Adopter Types'),(254,'2021-01-22 07:55:52','2021-01-22 07:55:52','3','Alexander Borja','Added \'Sean Cristobal\'','5','202.90.129.17','Adopters'),(255,'2021-01-22 07:56:09','2021-01-22 07:56:09','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(256,'2021-01-22 08:41:09','2021-01-22 08:41:09','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(257,'2021-01-25 01:14:03','2021-01-25 01:14:03','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(258,'2021-01-25 01:14:53','2021-01-25 01:14:53','3','Alexander Borja','Added \'Peanut Industry\'','5','202.90.129.17','Technology Applicability - Industry'),(259,'2021-01-25 01:18:07','2021-01-25 01:18:07','3','Alexander Borja','Added \'Cagayan State University (CSU)\'','5','202.90.129.17','Agencies'),(260,'2021-01-25 02:09:26','2021-01-25 02:09:26','3','Alexander Borja','Changed \'Isabela State University (ISU)\' details','5','202.90.129.17','Agencies'),(261,'2021-01-25 02:09:43','2021-01-25 02:09:43','3','Alexander Borja','Changed \'Capiz State University (CapSU)\' details','5','202.90.129.17','Agencies'),(262,'2021-01-25 02:09:53','2021-01-25 02:09:53','3','Alexander Borja','Changed \'University of the Philippines Los Baños - National Institute of Molecular Biology and Biotechnology (UPLB-Biotech)\' details','5','202.90.129.17','Agencies'),(263,'2021-01-25 02:17:46','2021-01-25 02:17:46','3','Alexander Borja','Added \'Dr. Jose D. Guzman\'','5','202.90.129.17','Generators'),(264,'2021-01-25 02:18:01','2021-01-25 02:18:01','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(265,'2021-01-25 02:21:34','2021-01-25 02:21:34','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(266,'2021-01-25 02:30:18','2021-01-25 02:30:18','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(267,'2021-01-25 02:35:56','2021-01-25 02:35:56','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(268,'2021-01-25 02:46:18','2021-01-25 02:46:18','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(269,'2021-01-25 02:52:01','2021-01-25 02:52:01','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(270,'2021-01-25 02:53:25','2021-01-25 02:53:25','3','Alexander Borja','Added \'Dr. Laura J. Pham\'','5','202.90.129.17','Generators'),(271,'2021-01-25 02:53:51','2021-01-25 02:53:51','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(272,'2021-01-25 02:57:22','2021-01-25 02:57:22','3','Alexander Borja','Toggle Invention fromProtein Enriched Copra Meal (PECM) as Feed for Swine and Poultry','5','202.90.129.17','Technologies'),(273,'2021-01-25 03:03:44','2021-01-25 03:03:44','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(274,'2021-01-25 03:21:00','2021-01-25 03:21:00','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(275,'2021-01-25 03:23:25','2021-01-25 03:23:25','3','Alexander Borja','Added \'University of Santo Tomas\'','5','202.90.129.17','Agencies'),(276,'2021-01-25 03:30:48','2021-01-25 03:30:48','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(277,'2021-01-25 03:32:57','2021-01-25 03:32:57','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(278,'2021-01-25 03:33:32','2021-01-25 03:33:32','3','Alexander Borja','Added \'Shrimp Farming Industry\'','5','202.90.129.17','Technology Applicability - Industry'),(279,'2021-01-25 03:34:39','2021-01-25 03:34:39','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(280,'2021-01-25 03:34:39','2021-01-25 03:34:39','3','Alexander Borja','Changed \'University of Santo Tomas\' details','5','202.90.129.17','Agencies'),(281,'2021-01-25 03:34:50','2021-01-25 03:34:50','3','Alexander Borja','Changed \'University of Santo Tomas (UST)\' details','5','202.90.129.17','Agencies'),(282,'2021-01-25 03:35:47','2021-01-25 03:35:47','3','Alexander Borja','Added \'Dr. Mary Beth A. Maningas\'','5','202.90.129.17','Generators'),(283,'2021-01-25 03:37:12','2021-01-25 03:37:12','3','Alexander Borja','Added \'Dr. Christopher Marlowe A. Caipang\'','5','202.90.129.17','Generators'),(284,'2021-01-25 03:38:50','2021-01-25 03:38:50','3','Alexander Borja','Added \'Dr. Benedict A. Maralit\'','5','202.90.129.17','Generators'),(285,'2021-01-25 03:39:53','2021-01-25 03:39:53','3','Alexander Borja','Added \'Amalea Dulcene D. Nicolasora\'','5','202.90.129.17','Generators'),(286,'2021-01-25 03:40:32','2021-01-25 03:40:32','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(287,'2021-01-25 03:45:01','2021-01-25 03:45:01','3','Alexander Borja','Added \'Alsons Aquaculture Corporation\'','5','202.90.129.17','Adopters'),(288,'2021-01-25 03:45:23','2021-01-25 03:45:23','3','Alexander Borja','Toggle Invention fromJAmp© Juan Amplification WSSV Detection Kit (Old name: LAMP Kit for Shrimp Pathogens)','5','202.90.129.17','Technologies'),(289,'2021-01-25 03:57:29','2021-01-25 03:57:29','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(290,'2021-01-25 03:58:56','2021-01-25 03:58:56','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(291,'2021-01-25 04:01:05','2021-01-25 04:01:05','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(292,'2021-01-25 04:11:56','2021-01-25 04:11:56','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(293,'2021-01-25 04:25:47','2021-01-25 04:25:47','3','Alexander Borja','Changed \'BD OZ Veterinary Products Trading\' details','5','202.90.129.17','Adopters'),(294,'2021-01-25 06:31:46','2021-01-25 06:31:46','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(295,'2021-01-25 06:36:08','2021-01-25 06:36:08','3','Alexander Borja','Added \'Philippine Rice Research Institute (PhilRice)\'','5','202.90.129.17','Agencies'),(296,'2021-01-25 06:41:15','2021-01-25 06:41:15','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(297,'2021-01-25 06:41:25','2021-01-25 06:41:25','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(298,'2021-01-25 06:44:16','2021-01-25 06:44:16','3','Alexander Borja','Added \'Dr. Manuel Jose C. Regalado\'','5','202.90.129.17','Generators'),(299,'2021-01-25 06:44:56','2021-01-25 06:44:56','3','Alexander Borja','Added \'Engr. Alexis T. Belonio\'','5','202.90.129.17','Generators'),(300,'2021-01-25 06:46:26','2021-01-25 06:46:26','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(301,'2021-01-25 06:57:58','2021-01-25 06:57:58','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(302,'2021-01-27 02:42:06','2021-01-27 02:42:06','2','Alexandra Cabrera','Changed \'\' details','5','202.90.129.17','Technologies'),(303,'2021-01-27 02:48:27','2021-01-27 02:48:27','2','Alexandra Cabrera','Changed \'\' details','5','202.90.129.17','Technologies'),(304,'2021-01-27 02:51:47','2021-01-27 02:51:47','2','Alexandra Cabrera','Changed \'\' details','5','202.90.129.17','Technologies'),(305,'2021-01-27 02:52:44','2021-01-27 02:52:44','2','Alexandra Cabrera','Changed \'\' details','5','202.90.129.17','Technologies'),(306,'2021-01-27 05:31:51','2021-01-27 05:31:51','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(307,'2021-01-27 09:13:03','2021-01-27 09:13:03','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(308,'2021-01-28 01:40:47','2021-01-28 01:40:47','2','Alexandra Cabrera','Changed \'\' details','5','202.90.129.17','Technologies'),(309,'2021-01-28 01:54:48','2021-01-28 01:54:48','3','Alexander Borja','Changed \'\' details','5','202.90.129.17','Technologies'),(310,'2021-02-04 17:09:04','2021-02-04 17:09:04','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(311,'2021-02-04 17:09:26','2021-02-04 17:09:26','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(312,'2021-02-04 17:09:42','2021-02-04 17:09:42','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(313,'2021-02-04 17:10:19','2021-02-04 17:10:19','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(314,'2021-02-04 17:10:32','2021-02-04 17:10:32','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(315,'2021-02-04 17:10:42','2021-02-04 17:10:42','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(316,'2021-02-04 17:10:58','2021-02-04 17:10:58','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(317,'2021-02-04 17:11:14','2021-02-04 17:11:14','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(318,'2021-02-04 17:11:27','2021-02-04 17:11:27','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(319,'2021-02-04 17:11:47','2021-02-04 17:11:47','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies'),(320,'2021-02-04 17:12:00','2021-02-04 17:12:00','1','superadmin','Changed \'\' details','5','49.147.3.25','Technologies');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_10_20_123244_create_technologies_table',1),(5,'2019_10_21_090528_create_industries_table',1),(6,'2019_10_21_091350_create_sectors_table',1),(7,'2019_10_21_091528_create_commodities_table',1),(8,'2019_10_21_091552_create_commodity_technology_table',1),(9,'2019_10_21_185055_create_adopter_types_table',1),(10,'2019_10_21_185915_create_adopters_table',1),(11,'2019_10_28_113814_create_technology_categories_table',1),(12,'2019_10_28_172915_create_technology_technology_category_table',1),(13,'2019_12_12_061808_create_agencies_table',1),(14,'2019_12_12_082717_create_generators_table',1),(15,'2020_06_20_155321_create_patents_table',1),(16,'2020_07_06_120832_create_utility_models_table',1),(17,'2020_07_06_122409_create_industrial_designs_table',1),(18,'2020_07_06_122424_create_copyrights_table',1),(19,'2020_07_06_122436_create_plant_variety_protections_table',1),(20,'2020_07_06_164025_create_agency_technology_table',1),(21,'2020_07_06_164031_create_generator_technology_table',1),(22,'2020_07_06_170555_create_adopter_technology_table',1),(23,'2020_07_13_102600_create_landing_page_table',1),(24,'2020_07_13_120452_create_carousel_items_table',1),(25,'2020_08_06_173217_create_header_links_table',1),(26,'2020_08_12_163610_create_tech_fields_table',1),(27,'2020_08_23_122236_create_applicability_industries_table',1),(28,'2020_08_23_193357_create_logs_table',1),(29,'2020_08_30_234424_create_approvals_table',1),(30,'2020_09_10_022612_create_trademarks_table',1),(31,'2020_09_10_061636_create_files_table',1),(32,'2020_09_15_054222_create_r_d_results_table',1),(33,'2020_09_21_182755_create_user_messages_table',1),(34,'2021_01_21_004122_change_protection_type_application_and_registration_number_to_string',2),(35,'2021_02_02_142518_create_applicability_industry_technology_table',3),(36,'2021_02_02_142711_remove_appicability_industry_id_from_technologies_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `patents`
--

DROP TABLE IF EXISTS `patents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `application_number` text COLLATE utf8mb4_unicode_ci,
  `patent_number` text COLLATE utf8mb4_unicode_ci,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_of_filing` date DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `technology_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patents_technology_id_foreign` (`technology_id`),
  CONSTRAINT `patents_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patents`
--

LOCK TABLES `patents` WRITE;
/*!40000 ALTER TABLE `patents` DISABLE KEYS */;
/*!40000 ALTER TABLE `patents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plant_variety_protections`
--

DROP TABLE IF EXISTS `plant_variety_protections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plant_variety_protections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `application_number` text COLLATE utf8mb4_unicode_ci,
  `applicant` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `crop` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `denomination` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_of_variety` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `certificate_number` text COLLATE utf8mb4_unicode_ci,
  `date_of_issuance` date DEFAULT NULL,
  `duration_of_protection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `technology_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plant_variety_protections_technology_id_foreign` (`technology_id`),
  CONSTRAINT `plant_variety_protections_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plant_variety_protections`
--

LOCK TABLES `plant_variety_protections` WRITE;
/*!40000 ALTER TABLE `plant_variety_protections` DISABLE KEYS */;
/*!40000 ALTER TABLE `plant_variety_protections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_d_results`
--

DROP TABLE IF EXISTS `r_d_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `r_d_results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `utilization` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `funding` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `implementing` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cost` decimal(12,2) NOT NULL DEFAULT '0.00',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `beneficiary_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `beneficiary_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `beneficiary_region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `beneficiary_province` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `beneficiary_municipality` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `technology_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `r_d_results_technology_id_foreign` (`technology_id`),
  CONSTRAINT `r_d_results_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_d_results`
--

LOCK TABLES `r_d_results` WRITE;
/*!40000 ALTER TABLE `r_d_results` DISABLE KEYS */;
INSERT INTO `r_d_results` VALUES (1,'Pre-Commercialization IP','Science and Technology Community-Based Farm (STCBF) on Spray Chrysanthemum Production','DOST-PCAARRD','Dr. Carlito P. Laurean/BSU',2657962.51,'2020-10-15','2020-10-14','Individual',NULL,'Region 4A','Laguna','Calamba',1,'2020-10-12 12:21:10','2020-10-12 12:21:10'),(2,'Pre-Commercialization IP','Pre-Commercialization Services of Rice Transplanter Attachment (RTA) and Rice Harvester Attachment (RHA) for Hand Tractor','DOST-PCAARRD','Department of Science and Technology - Metals Industry Research and Development Center (DOST-MIRDC)',3554328.00,'2017-06-01','2021-12-31',NULL,NULL,NULL,NULL,NULL,8,'2021-01-20 15:22:47','2021-01-20 15:22:47');
/*!40000 ALTER TABLE `r_d_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sectors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `approved` int NOT NULL DEFAULT '0',
  `industry_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sectors_industry_id_foreign` (`industry_id`),
  CONSTRAINT `sectors_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sectors`
--

LOCK TABLES `sectors` WRITE;
/*!40000 ALTER TABLE `sectors` DISABLE KEYS */;
INSERT INTO `sectors` VALUES (1,'2020-10-12 12:18:25','2020-10-12 12:18:25','Crops',NULL,2,1),(2,'2020-10-12 12:18:25','2020-10-12 12:18:25','Livestock',NULL,2,1),(3,'2020-10-12 12:18:25','2020-10-12 12:18:25','Feeds',NULL,2,1),(4,'2020-10-12 12:18:25','2020-10-12 12:18:25','Inland Fisheries',NULL,2,2),(5,'2020-10-12 12:18:25','2020-10-12 12:18:25','Marine Resources',NULL,2,2),(6,'2020-10-12 12:18:25','2020-10-12 12:18:25','Forestry',NULL,2,3),(7,'2020-10-12 12:18:25','2020-10-12 12:18:25','Environmental Services',NULL,2,3),(8,'2021-01-20 09:46:44','2021-01-20 09:46:44','Cross-cutting',3,2,1),(9,'2021-01-20 10:02:06','2021-01-20 10:02:06','Environmental Services',3,2,2);
/*!40000 ALTER TABLE `sectors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tech_fields`
--

DROP TABLE IF EXISTS `tech_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tech_fields` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tech_fields`
--

LOCK TABLES `tech_fields` WRITE;
/*!40000 ALTER TABLE `tech_fields` DISABLE KEYS */;
INSERT INTO `tech_fields` VALUES (1,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Title','title',1),(2,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Description','description',1),(3,'2020-10-12 12:18:26','2020-10-12 12:18:26','Significance of the Technology','significance',1),(4,'2020-10-12 12:18:26','2020-10-12 12:18:26','Target Users','target_users',1),(5,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Applicability - Region','region',1),(6,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Applicability - Industry','applicability_industry',1),(7,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Category','category',1),(8,'2020-10-12 12:18:26','2020-10-12 12:18:26','Industry','industry',1),(9,'2020-10-12 12:18:26','2020-10-12 12:18:26','Sector','sector',1),(10,'2020-10-12 12:18:26','2020-10-12 12:18:26','Commodity','commodity',1),(11,'2020-10-12 12:18:26','2020-10-12 12:18:26','Year Developed','year_developed',2),(12,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Owner','owner',2),(13,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Owner - Region','owner_region',2),(14,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Owner - Province','owner_province',2),(15,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Owner - City/Municipality','owner_municipality',2),(16,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Owner - District','owner_district',2),(17,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Owner - Phone','owner_phone',2),(18,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Generator','generator',2),(19,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Generator - Affiliation','generator_affiliation',2),(20,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Generator - Address','generator_address',4),(21,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Generator - Phone','generator_phone',4),(22,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Generator - Fax','generator_fax',4),(23,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Generator - Email','generator_email',4),(24,'2020-10-12 12:18:26','2020-10-12 12:18:26','Commercialization','commercialization',2),(25,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Adopter','adopter',2),(26,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Adopter - Type','adopter_type',2),(27,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Adopter - Region','adopter_region',2),(28,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Adopter - Province','adopter_province',2),(29,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Adopter - City','adopter_city',2),(30,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Adopter - Phone','adopter_phone',4),(31,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Adopter - Fax','adopter_fax',4),(32,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Adopter - Email','adopter_email',4),(33,'2020-10-12 12:18:26','2020-10-12 12:18:26','Protection Type','protection_type',2),(34,'2020-10-12 12:18:26','2020-10-12 12:18:26','Patent Application No.','patent_application',2),(35,'2020-10-12 12:18:26','2020-10-12 12:18:26','Patent Date of Filing','patent_date',2),(36,'2020-10-12 12:18:26','2020-10-12 12:18:26','Patent No.','patent_no',2),(37,'2020-10-12 12:18:26','2020-10-12 12:18:26','Patent Registration Date','patent_registration',2),(38,'2020-10-12 12:18:26','2020-10-12 12:18:26','Patent Status','patent_status',2),(39,'2020-10-12 12:18:26','2020-10-12 12:18:26','Utility Model Application No.','um_application',2),(40,'2020-10-12 12:18:26','2020-10-12 12:18:26','Utility Model Date of Filing','um_date',2),(41,'2020-10-12 12:18:26','2020-10-12 12:18:26','Utility Model No.','um_no',2),(42,'2020-10-12 12:18:26','2020-10-12 12:18:26','Utility Model Registration Date','um_registration',2),(43,'2020-10-12 12:18:26','2020-10-12 12:18:26','Utility Model Status','um_status',2),(44,'2020-10-12 12:18:26','2020-10-12 12:18:26','Industrial Design Application No.','industrial_application',2),(45,'2020-10-12 12:18:26','2020-10-12 12:18:26','Industrial Design Date of Filing','industrial_filing_date',2),(46,'2020-10-12 12:18:26','2020-10-12 12:18:26','Industrial Design Registration No.','industrial_registration_no',2),(47,'2020-10-12 12:18:26','2020-10-12 12:18:26','Industrial Design Registration Date','industrial_registration_date',2),(48,'2020-10-12 12:18:26','2020-10-12 12:18:26','Industrial Design Status','industrial_status',2),(49,'2020-10-12 12:18:26','2020-10-12 12:18:26','Trademark Application No.','trademark_appllication',2),(50,'2020-10-12 12:18:26','2020-10-12 12:18:26','Trademark Date of Filing','trademark_filing_date',2),(51,'2020-10-12 12:18:26','2020-10-12 12:18:26','Trademark Registration No.','trademark_registration_no',2),(52,'2020-10-12 12:18:26','2020-10-12 12:18:26','Trademark Registration Date','trademark_registration_date',2),(53,'2020-10-12 12:18:26','2020-10-12 12:18:26','Trademark Expiration Date','trademark_expiration_date',2),(54,'2020-10-12 12:18:26','2020-10-12 12:18:26','Trademark Status','trademark_status',2),(55,'2020-10-12 12:18:26','2020-10-12 12:18:26','Copyright Owner','copyright_owner',2),(56,'2020-10-12 12:18:26','2020-10-12 12:18:26','Copyright Publisher','copyright_publisher',2),(57,'2020-10-12 12:18:26','2020-10-12 12:18:26','Copyright - Date of Creation','copyright_creation',2),(58,'2020-10-12 12:18:26','2020-10-12 12:18:26','Copyright - Date Registered','copyright_registration_date',2),(59,'2020-10-12 12:18:26','2020-10-12 12:18:26','Copyright - Classes','copyright_classes',2),(60,'2020-10-12 12:18:26','2020-10-12 12:18:26','Copyright - Registration No.','copyright_registration_no',2),(61,'2020-10-12 12:18:26','2020-10-12 12:18:26','Copyright - Date of Issuance','copyright_date',2),(62,'2020-10-12 12:18:26','2020-10-12 12:18:26','PVP - Application No.','pvp_application_no',2),(63,'2020-10-12 12:18:26','2020-10-12 12:18:26','PVP - Applicant','pvp_applicant',2),(64,'2020-10-12 12:18:26','2020-10-12 12:18:26','PVP - Crop','pvp_crop',2),(65,'2020-10-12 12:18:26','2020-10-12 12:18:26','PVP - Proposed Denomination','pvp_denomination',2),(66,'2020-10-12 12:18:26','2020-10-12 12:18:26','PVP - Description of Variety','pvp_variety',2),(67,'2020-10-12 12:18:26','2020-10-12 12:18:26','PVP - Certificate of PVP No.','pvp_certificate',2),(68,'2020-10-12 12:18:26','2020-10-12 12:18:26','CPVP - Date of Issuance','cpvp_date',2),(69,'2020-10-12 12:18:26','2020-10-12 12:18:26','CPVP - Duration of Protection','cpvp_duration',2),(70,'2020-10-12 12:18:26','2020-10-12 12:18:26','Basic Research - Project Title','basic_title',3),(71,'2020-10-12 12:18:26','2020-10-12 12:18:26','Basic Research - Funding Agency','basic_funding_agency',3),(72,'2020-10-12 12:18:26','2020-10-12 12:18:26','Basic Research - Implementing Agency','basic_implementing_agency',3),(73,'2020-10-12 12:18:26','2020-10-12 12:18:26','Basic Research - Project Cost','basic_cost',3),(74,'2020-10-12 12:18:26','2020-10-12 12:18:26','Basic Research - Start Date','basic_start_date',3),(75,'2020-10-12 12:18:26','2020-10-12 12:18:26','Basic Research - End Date','basic_end_date',3),(76,'2020-10-12 12:18:26','2020-10-12 12:18:26','Applied Research','applied_research',3),(77,'2020-10-12 12:18:26','2020-10-12 12:18:26','Applied Research - Project Title','applied_title',3),(78,'2020-10-12 12:18:26','2020-10-12 12:18:26','Applied Research - Funding Agency','applied_funding_agency',3),(79,'2020-10-12 12:18:26','2020-10-12 12:18:26','Applied Research - Implementing Agency','applied_implementing_agency',3),(80,'2020-10-12 12:18:26','2020-10-12 12:18:26','Applied Research - Project Cost','applied_cost',3),(81,'2020-10-12 12:18:26','2020-10-12 12:18:26','Applied Research - Start Date','applied_start_date',3),(82,'2020-10-12 12:18:26','2020-10-12 12:18:26','Applied Research - End Date','applied_end_date',3),(83,'2020-10-12 12:18:26','2020-10-12 12:18:26','RDRU Utilization','rdru_utilization',3),(84,'2020-10-12 12:18:26','2020-10-12 12:18:26','RDRU Project Title','rdru_title',3),(85,'2020-10-12 12:18:26','2020-10-12 12:18:26','RDRU Funding Agency','rdru_funding_agency',3),(86,'2020-10-12 12:18:26','2020-10-12 12:18:26','RDRU Implementing Agency','rdru_implementing',3),(87,'2020-10-12 12:18:26','2020-10-12 12:18:26','RDRU Project Cost','rdru_implementing',3),(88,'2020-10-12 12:18:26','2020-10-12 12:18:26','RDRU Start Date','rdru_start_date',3),(89,'2020-10-12 12:18:26','2020-10-12 12:18:26','RDRU End Date','rdru_end_date',3),(90,'2020-10-12 12:18:26','2020-10-12 12:18:26','Beneficiary Type','beneficiary_type',4),(91,'2020-10-12 12:18:26','2020-10-12 12:18:26','Beneficiary Name','beneficiary_name',4),(92,'2020-10-12 12:18:26','2020-10-12 12:18:26','Beneficiary Region','beneficiary_region',4),(93,'2020-10-12 12:18:26','2020-10-12 12:18:26','Beneficiary Province','beneficiary_province',4),(94,'2020-10-12 12:18:26','2020-10-12 12:18:26','Beneficiary City','beneficiary_city',4),(95,'2020-10-12 12:18:26','2020-10-12 12:18:26','Application of Technology','tech_application',2),(96,'2020-10-12 12:18:26','2020-10-12 12:18:26','Limitation of Technology','tech_limitation',2),(97,'2020-10-12 12:18:26','2020-10-12 12:18:26','Market Study Summary','market_study',4),(98,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Valuation Summary','valuation_summary',4),(99,'2020-10-12 12:18:26','2020-10-12 12:18:26','Freedom to Operate Summary','operate_summary',4),(100,'2020-10-12 12:18:26','2020-10-12 12:18:26','Proposed Term Sheet','term_sheet',4),(101,'2020-10-12 12:18:26','2020-10-12 12:18:26','Fairness Opinion Report','opinion_report',4),(102,'2020-10-12 12:18:26','2020-10-12 12:18:26','Video Clips','video_clips',4),(103,'2020-10-12 12:18:26','2020-10-12 12:18:26','Technology Banner','tech_banner',1),(104,'2020-10-12 12:18:26','2020-10-12 12:18:26','Images','images',4),(105,'2020-10-12 12:18:26','2020-10-12 12:18:26','Process Flow','process_flow',4),(106,'2020-10-12 12:18:26','2020-10-12 12:18:26','Materials/Equipment','materials',4);
/*!40000 ALTER TABLE `tech_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technologies`
--

DROP TABLE IF EXISTS `technologies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `technologies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `significance` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `target_users` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `applicability_location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `commercialization_mode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `year_developed` year DEFAULT NULL,
  `is_trade_secret` int NOT NULL DEFAULT '0',
  `is_invention` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `approved` int NOT NULL DEFAULT '0',
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `basic_research_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `basic_research_funding` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `basic_research_implementing` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `basic_research_cost` decimal(12,2) NOT NULL DEFAULT '0.00',
  `basic_research_start_date` date DEFAULT NULL,
  `basic_research_end_date` date DEFAULT NULL,
  `applied_research_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `applied_research_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `applied_research_funding` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `applied_research_implementing` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `applied_research_cost` decimal(12,2) NOT NULL DEFAULT '0.00',
  `applied_research_start_date` date DEFAULT NULL,
  `applied_research_end_date` date DEFAULT NULL,
  `application_of_technology` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `limitation_of_technology` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technologies`
--

LOCK TABLES `technologies` WRITE;
/*!40000 ALTER TABLE `technologies` DISABLE KEYS */;
INSERT INTO `technologies` VALUES (1,'2020-10-12 12:19:03','2021-02-04 17:09:04','Use of tissue-cultured planting materials for chrysanthemum','This is used to ensure the health standard off planting materials. The shoot-tips are cut from the apical shoots of a healthy chrysanthemum plants and inoculated in sterilized bottles containing the culture media. When shoots have developed into plantlets, these are taken out from the laboratory into the greenhouse for acclimatization and hardening, to increase rate of survival and reduce mortality before transplanting.','This is used to ensure the health standard of planting materials.','Chrysanthemum growers','CAR','Licensing Agreement',2018,0,0,1,2,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,'60112e9fafbf1chrysanthemum.JPG'),(4,'2020-10-12 13:52:23','2021-02-04 17:09:26','Goat Semen Processing Using Soy-Bean Lecithin-Based Extender','The semen extender formulation used in processing goat semen is composed of buffer solution, non-penetrating cryoprotectant, and penetrating cryoprotectant. This new formulation is proven effective in lengthening the viability of the goat spermatozoa under refrigerated storage from 48 to 110 hours or in increasing viability of frozen sperm cells from 30 to 70% post-thaw motility.','Improved formulation for processing goat semen','Goat Raisers','Region 2','Licensing Agreement',2016,0,0,1,2,NULL,'Project 2. Development of improved goat semen extenders and AI delivery system in Region 2','DOST-PCAARRD','Isabela State University (ISU)',0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,'6008fd9f4a711semex2.jpg'),(5,'2020-10-12 14:32:55','2021-02-04 17:09:42','Ethnobotanical Dewormers for Chickens','The technology relates to the process for preparing the anthelmintic or deworming composition for chicken comprised of seeds of papaya (Carica papaya), ipil-ipil (Leucaena leucocephala), and betel nut (Areca catechu) seeds in powder form. These plants contain constituents that serve as cheap sources of anthelmintics against internal parasitism. Internal parasitism in native chickens can cause severe diarrhea and high mortality. The formulation can be used for the treatment and control of roundworms, including common large roundworms of native chicken (Ascaridia galli), common threadworms (Capillaria specie), the cecal worm (Heterakis gallinarum) and gapeworm (Syngamus trachea). The technology is an economical and an alternative way to reduce the parasitic burden to a tolerable level through a simple and effective process for producing an effective anthelmintic against egg and adult parasites. The anthelmintic produced through this process is a cheap source of anthelmintics to complement the commercially manufactures parasitic drugs against internal parasitism. The control of parasitic diseases will lead to a stable supply of native chickens and alleviate poverty in the countryside. This technology has ten approved intellectual property rights, all under the Utility Model classification for the process and composition of dewormer.','The technology is a simple and effective process for producing an effective anthelmintic against egg and adult parasites, in particular roundworms and tapeworms.','Poultry Growers','Region 6','Spin-Off',2014,0,0,1,2,NULL,'Botanical Dewormer for Free Range Native Chicken','DOST-GIA','Capiz State University (CapSU)',2024881.28,'2016-03-01','2017-05-31',NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,'6008fdbb42c52dewormer.jpg'),(7,'2020-10-12 14:51:05','2021-02-04 17:10:19','Nutrio Biofertilizer for Eggplant and Sugarcane','Nutrio® Biofertilizer, a new foliar spray biofertilizer inoculant contains endophytic bacteria (Enterobacter sacchari S18 ), a Nitrogen-fixing organism that has been isolated, screened, and tested for improved growth and yield of sugarcane. Nutrio offers a cheap, sustainable, and organic supplement to reduce the use of chemical fertilizers.','Nutrio® Biofertilizer is a foliar spray that promotes plant growth of sugarcane. This environment-friendly plant supplement does not only improve the sugarcane but also other food crops such as eggplant and has a potential for increasing yield by 10 to 15%.','Sugarcane Farmers','Region 4A',NULL,2015,0,1,1,2,NULL,'Project 2. Development and Field Testing of Endophytic Bacterial Inoculant as New Biofertilizers for Eggplant (Solanum melongena) and Sugarcane (Saccharum officinarum L.)','DOST-PCAARRD','University of the Philippines Los Baños',1362600.00,'2012-06-01','2015-05-31','Field testing','Toxicological Study and Pilot Testing of Nutrio™ Biofertilizer for Improved Production of Sugarcane in Regions III and VI','DOST-PCAARD','University of the Philippines Los Baños',5000000.00,'2017-11-16','2020-05-15',NULL,NULL,'6008fdd6dacf4nutrio.jpg'),(8,'2020-10-12 14:51:32','2021-02-04 17:10:32','Rice Harvester Attachment (System of Assembling a Combined Harvester and Thresher attachment to Hand Tractor and the Apparatus Therefrom)','An efficient rice harvesting implement that can be readily mounted to and dismounted  from the hand tractor unit thus, increasing the utilization of handtractor and helps reduce labor cost. It has an estimated capacity of 0.5 ha/day for an eight-hour operation.','This is an assembly of combined harvester and thresher attachments that can easily mounted and removed from a hand tractor.','Rice farmers','NCR',NULL,2017,0,1,1,2,NULL,'Project 3. Design and development of handtractor attachment (harvester and transplanter)','DOST-PCAARRD','Department of Science and Technology - Metals Industry Research and Development Center (DOST-MIRDC)',3542653.00,'2013-07-01','2016-03-31',NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,'6008fdec24747harvester.jpg'),(9,'2020-10-19 13:02:49','2021-02-04 17:10:42','Carrageenan Plant Growth Promoter','Carrageenan is an indigestible polysaccharide (carbohydrates) extracted from edible seaweeds.  Polysaccharide, when subjected to modified irradiation technology, can be an effective plant growth supplement. At a very small dose, this supplement makes an effective organic fertilizer.  It has been found to increase rice yield by 15-30%. The application of three and six bags of chemical fertilizer per ha, combined with 20 ml/L of carrageenan yields higher grain weight (450g and 455 g/10 hills, respectively) than the farmers\' practice of applying nine bags of chemical fertilizer/ha.  Carrageenan enhances the crop vigor of rice. Productive tillers and panicle length (length of inflorescence) are significantly higher in Carrageenan-treated plants. Productive tillers are the rice stems that bear panicles (rice inflorescence) with fertilized grains, while longer rice panicle is associated with producing more grains.','Carrageenan is an indigestible polysaccharide (carbohydrates) extracted from edible seaweeds.  Polysaccharide, when subjected to modified irradiation technology, can be an effective plant growth supplement. At a very small dose, this supplement makes an effective organic fertilizer.  It has been found to increase rice yield by 15-30%.','Rice Farmers','NCR','Licensing Agreement',2015,0,1,1,2,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,'60090b8ac0511Carrageenan.jpg'),(10,'2020-10-19 13:06:22','2021-02-04 17:10:58','Pelletizing Machine for Goat Feeds (Forage-Based Pellets for Dairy Goat)','A portable pellet mill developed mainly from scrap-materials that is appropriate for on-farm pellet production.  It is used in pelletizing total mixed ration (TMR) for goats.  It has a milling capacity of 130 kg/hr and machine efficiency of 93.30% with fuel consumption of 0.17 liters/hr.','A portable pellet mill developed mainly from scrap-materials that is appropriate for on-farm pellet production.','Goat farmers','Region 3','Licensing Agreement',2017,0,0,1,2,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,'600a7ffcdeaf4portable pellet machine.jpg'),(11,'2020-10-19 13:07:08','2021-02-04 17:11:14','Peanut Sheller-Sorter','The peanut sheller-sorter is an electric motor powered machine that is used to break peanut pods through centrifugal and impact force action. It separates the freed-up kernels from the peanut shells. Furthermore, it cleans and sorts kernels into two sizes. It has a processing capacity of about 150 kg/hour of peanuts.','A peanut sheller with sorter machine to separate the peanut kernel from pods and sort the kernels into three sizes.','Peanut farmers','Region 2',NULL,2003,0,0,1,2,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,'600e450c9ae50peanut sheller-sorter.jpg'),(12,'2021-01-20 04:07:02','2021-01-27 02:30:03','SPATHOGLOTTIS KARYOTYPING OF MITOTIC CHROMOSOMES (PROCESS FOR KARYOTYPING MITOTIC CHROMOSOMES OF SPATHOGLOTTIS SPP. AND OTHER ORCHIDS)','THE PRESENT UTILITY MODEL RELATES TO AN HERBAL DEWORMER COMPOSITION FOR SMALL RUMINANTS, SUCH AS GOATS, THAT CAN CONTROL PARASITIC INFECTION CAUSED BY STRONGYLE WORM (HAEMONCHUS CONTORTUS). THE COMPOSITION IS A MIXTURE OF CRUDE ETHANOLIC EXTRACTS (CEES) FROM MAKABUHAY (TINOSPORA RUMPHII), CAIMITO (CHRYSOPHYLLUM CAINITO), AND MAKAHIYA (MIMOSA PUDICA).',NULL,NULL,'NCR',NULL,NULL,0,0,1,0,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL),(13,'2021-01-20 04:08:48','2021-01-27 02:30:03','ETHNOBOTANICAL ANTHELMINTIC FOR FREE RANGE NATIVE CHICKEN ( ETHNOBOTANICAL DEWORMER COMPOSITION FOR NATIVE CHICKEN)','This model presents a composition for an ethnobotanical dewormer for native chicken using the powder forms of mature seeds of betel nut (Areca catechu) and ipil-ipil (Leucaena lecocephala) as main ingredients. These plants contain constituents that serve as cheap sources of anthelmintics against internal parasitism. Internal parasitism in native chicken can cause severe diarrhea and high mortality. The formulation can be used for the treatment and control of roundworms, including common large roundworms of native chicken (Ascaridia galli), common thread worms (Capillaria specie), and the cecal worm (Heterakis gallinarum) and gape worm (Syngamus trachea).',NULL,NULL,'Region 6',NULL,NULL,0,0,1,0,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL),(14,'2021-01-20 04:10:10','2021-02-04 17:11:27','Protein Enriched Copra Meal (PECM) as Feed for Swine and Poultry','Through solid-state fermentation technology, the PECM is enriched with microorganisms that increase the protein content of copra meal, which is normally high in fiber but low in nutrients. PECM is seen to replace 40 to 50 percent of the soybean contained in animal feed. The PECM uses waste products from coconut oil.','The protein-enriched copra meal (PECM) is used as a substrate in the incorporation of multi-stained probiotics to enhance/improve overall animal health. This ensures low cost in feed formulation as supplements are included in the protein ingredient.','Swine and Poultry Farmers','Region 4A',NULL,2015,0,1,1,2,NULL,'Protein Enrichment of Copra Meal as Feed for Swine and Poultry','DOST-PCAARRD','University of the Philippines Los Baños',7477285.98,'2012-06-01','2015-05-31','Pilot testing','Pilot testing of protein enriched copra meal (PECM): A valuable protein feed ingredient for swine and poultry','DOST-PCAARRD','University of the Philippines Los Baños',21586267.00,'2014-07-01','2017-06-30',NULL,NULL,'600e30fa12d71PECM banner.jpg'),(15,'2021-01-20 04:11:08','2021-02-04 17:11:47','JAmp© Juan Amplification WSSV Detection Kit (Old name: LAMP Kit for Shrimp Pathogens)','Loop-Mediated Isothermal Amplification (LAMP) diagnostic kit is a practical alternative to the conventional polymerase chain reaction (PCR) and standard microbiological techniques in the detection of White Spot Syndrome Virus (WSSV). It is 10x more sensitive for the detection of WSSV compared to PCR. It is aided by a heat block apparatus that replaces the expensive thermal cycler. Results can also be obtained within 1 hour. Due to its convenience, simplicity and speed of detection, it can be used on-site. Diagnostic kits utilizing locally fabricated machines will significantly bring down the cost of pathogen detection in the country.\r\n\r\nDiagnostic kits based on LAMP that are being developed for the detection of WSSV will have tremendous and significant commercial application in the culture of shrimps in the Philippines (and eventually to other shrimp producing countries) because of the following reasons: 1) they are easy to use, 2) the manner of detecting the target pathogen is done visually, 3) significantly high number of times a detection can be made during the culture because they are cheap, 4) they are highly sensitive and accurate in detecting the causative agent, 5) they can be within the purchasing capacity of resource-limited localities and 6) new assays based on this concept may be designed for other pathogens. As a result, these kits will have a target market in shrimp farming regions that are located in resource-limited areas, where access to sophisticated equipment in detecting WSSV is a major issue. Considering the number of shrimp farms in the Philippines, the shrimp hatcheries and shrimp health laboratories in the country, the production of this LAMP diagnostic kit will have good market potential.','A diagnostic system, consisting of a set of premixed solutions for DNA assay and a heating block, which provides a method to detect a target pathogen, e.g., bacteria or viruses, by amplification of a target sequence at isothermal conditions for at least 1 hour.','Shrimp Farmers','NCR','Licensing Agreement',2013,0,1,1,2,NULL,'Project 7. Pathology and Development of Molecular Detection Kits for EMS/AHPND causing Bacteria','DOST-PCAARRD','University of Santo Tomas (UST)',10088184.00,'2015-07-01','2017-09-30','Field testing','Field Testing of LAMP Detection Kit for AHPND in Shrimps','DOST-PCAARRD','University of Santo Tomas (UST)',4999996.00,'2019-05-01','2021-08-31',NULL,NULL,'600e3b68e748cJAmp banner.jpg'),(16,'2021-01-20 04:11:50','2021-02-04 17:12:00','Far-Infrared Grain Dryer','A far-infrared radiation dryer comprising a grain elevator, a paddy hopper adapted to provide grains to said grain elevator, a far-infrared radiation slab disposed on top of said grain elevator, a rice husk gasifier adapted to provide hot flue gas to said far-infrared radiation slab wherein said far-infrared radiation slab is made of lahar cement, said grain elevator is provided with a suction blower and said grain elevator is also provided with an oscillating tray.','Far-Infrared (FIR) Grain Dryer is expected to increase your revenue due to its increased milling recovery which is 5-7%. It also reduces post-harvest loss by 5%.','Rice Farmers','Region 3',NULL,NULL,0,0,1,2,NULL,'Project 5. Development and pilot testing of a combined conduction and far infrared radiation paddy dryer','DOST-PCAARRD','Philippine Rice Research Institute (PhilRice)',5913388.00,'2013-07-01','2016-12-31','Pilot testing','Pilot Testing of Combined Conduction and Far Infrared Radiation Dryer','DOST-PCAARRD','Philippine Rice Research Institute (PhilRice)',4997557.00,'2017-10-01','2020-12-31',NULL,NULL,'600e65d2ded8dFIR grain dryer banner.jpg'),(17,'2021-01-20 04:12:41','2021-01-27 02:30:04','Local Riding-type Rice Transplanter','Suitable for transplanting inbred and hybrid rice. It can transplant 2 to 6 seedlings per hill at a planting depth of 2-6 cm, hill spacing of 12-18 cm, and row spacing of 30 cm. Helps minimize labor cost compared to manual transplanting, which requires 20-25 persons/day/ha and takes only two persons to complete transplanting activities and has a planting capacity of 2 ha/day with 24 hills/m2 planting density.',NULL,NULL,'Region 3',NULL,NULL,0,0,1,0,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL),(18,'2021-01-20 04:13:31','2021-01-27 02:30:08','Hi-Yeast Biocontrol Agent for Fruits and Vegetables','Hi YEAST is a yeast-based biocontrol agent  that prevents fruit and vegetable decay caused by pathogens during postharvest handling. The technology is designed as an alternative and/or supplement to reduce the use of chemicals in nature. Consequently, it will reduce human health and environmental risks that comes with the use of existing synthetic control agents. It is applicable to fruits and vegetables, specifically, to banana, tomato, calamansi, mango, garlic, nuts and onion.',NULL,NULL,'Region 4A',NULL,NULL,0,0,1,0,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL),(19,'2021-01-20 04:14:11','2021-01-27 02:30:08','Aerated Bulk Storage System for Peanut','The automated aerated bulk storage system for peanut pods can operate independently without being attended to by a microcontroller programmed to respond intelligently through a customized computer program. It maintains temperature and moisture levels of bulk store and preserves the viability of the peanuts, and keeps the moulds infestation low over time.',NULL,NULL,'Region 2',NULL,NULL,0,0,1,0,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL),(20,'2021-01-20 04:14:43','2021-01-27 02:30:07','Ride-on Precision Seeder for Wet Direct Seeding (Old name: Riding-type, self propelled rice seeder)','The machine is a local 8-row riding-type precision seeder that can have a seeding rate of 15kg/ha to 30 kg/ha and at least 2 ha/day field capacity and suitable both for hybrid and inbred rice production.',NULL,NULL,'Region 3',NULL,NULL,0,0,1,0,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL),(21,'2021-01-20 04:15:39','2021-01-27 02:30:07','FertigroeTM Controlled-Release Fertilizer','Controlled-release nitrogen fertilizer (CRNF) aims to replace conventional fertilizer and to reduce the cost of farming. The technology utilized the inherent properties of nanofertilizer, such as controlled release of nitrogen and greater surface area for higher absorption rate. Since CRNF can fully replace conventional fertilizers, the input cost of farming can be minimized. Reduced amount in comparison with conventional fertilizers (up to 50% reduction) will be needed to acquire targeted plant development when CRNF is used.',NULL,NULL,'Region 4A',NULL,NULL,0,0,1,0,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL),(22,'2021-01-20 04:16:20','2021-01-27 02:30:12','Chevon Valley Canned Products (Kalderetang Kambing)','Canned chevon products comes in three different recipes namely, Kalderetang Kambing, Adobong Kambing and Kilawing Kambing. Canning of local delicacies is a way of promoting native dishes and consequently, capturing the bigger market for chevon. It also ensures longer storage and stability of the product and easy transport.',NULL,NULL,'Region 2',NULL,NULL,0,0,1,0,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `technologies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technology_categories`
--

DROP TABLE IF EXISTS `technology_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `technology_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technology_categories`
--

LOCK TABLES `technology_categories` WRITE;
/*!40000 ALTER TABLE `technology_categories` DISABLE KEYS */;
INSERT INTO `technology_categories` VALUES (1,'2020-10-12 12:18:25','2020-10-12 14:33:06','Products',2,NULL),(2,'2020-10-12 12:18:25','2020-10-12 14:33:10','Machinery',2,NULL),(3,'2020-10-12 12:18:25','2020-10-12 12:18:25','Commodity processing, its fractions & derivatives',2,NULL),(4,'2020-10-12 12:18:25','2020-10-12 12:18:25','Commodity growth promotion & protection, Genetic Engineering',2,NULL),(5,'2020-10-12 12:18:25','2021-01-20 12:18:09','Commodity by-product utilization or waste treatment',2,NULL),(6,'2020-10-12 12:18:25','2020-10-12 12:18:25','Support to Environmental Management',2,NULL),(7,'2020-11-23 03:21:52','2020-11-23 03:21:52','Products - Chemical Formulation',2,1),(8,'2021-01-20 10:15:58','2021-01-20 10:15:58','Products - Artificial Insemination (AI)',2,3),(9,'2021-01-20 12:19:30','2021-01-20 12:19:30','Process',2,3),(10,'2021-01-20 14:06:50','2021-01-20 14:06:50','Product - Biofertilizer',2,3),(11,'2021-01-21 05:07:43','2021-01-21 05:07:43','Product - Plant Growth Formulation',2,3);
/*!40000 ALTER TABLE `technology_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technology_technology_category`
--

DROP TABLE IF EXISTS `technology_technology_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `technology_technology_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `technology_id` bigint unsigned NOT NULL,
  `technology_category_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `technology_technology_category_technology_id_foreign` (`technology_id`),
  KEY `technology_technology_category_technology_category_id_foreign` (`technology_category_id`),
  CONSTRAINT `technology_technology_category_technology_category_id_foreign` FOREIGN KEY (`technology_category_id`) REFERENCES `technology_categories` (`id`),
  CONSTRAINT `technology_technology_category_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technology_technology_category`
--

LOCK TABLES `technology_technology_category` WRITE;
/*!40000 ALTER TABLE `technology_technology_category` DISABLE KEYS */;
INSERT INTO `technology_technology_category` VALUES (1,NULL,NULL,1,1),(5,NULL,NULL,5,1),(8,NULL,NULL,8,2),(12,NULL,NULL,12,4),(13,NULL,NULL,13,1),(15,NULL,NULL,15,4),(16,NULL,NULL,16,2),(17,NULL,NULL,17,2),(18,NULL,NULL,18,3),(19,NULL,NULL,19,3),(20,NULL,NULL,20,2),(21,NULL,NULL,21,5),(22,NULL,NULL,21,6),(23,NULL,NULL,22,1),(24,NULL,NULL,4,8),(25,NULL,NULL,5,9),(26,NULL,NULL,7,10),(27,NULL,NULL,9,11),(28,NULL,NULL,10,2),(29,NULL,NULL,11,2),(30,NULL,NULL,14,1);
/*!40000 ALTER TABLE `technology_technology_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trademarks`
--

DROP TABLE IF EXISTS `trademarks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trademarks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `application_number` text COLLATE utf8mb4_unicode_ci,
  `registration_number` text COLLATE utf8mb4_unicode_ci,
  `date_of_filing` date DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `technology_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trademarks_technology_id_foreign` (`technology_id`),
  CONSTRAINT `trademarks_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trademarks`
--

LOCK TABLES `trademarks` WRITE;
/*!40000 ALTER TABLE `trademarks` DISABLE KEYS */;
INSERT INTO `trademarks` VALUES (1,'2021-01-20 11:03:19','2021-01-20 11:03:19','42017502933','502933','2017-07-28','2017-11-02','2027-11-02','Granted',4),(2,'2021-01-20 14:30:46','2021-01-20 14:30:46','42014013730','13730','2014-11-05','2015-03-05','2025-03-05','Published',7),(3,'2021-01-25 02:59:56','2021-01-25 02:59:56','42015003282','3282','2015-03-26','2016-05-19','2026-05-19','Published',14);
/*!40000 ALTER TABLE `trademarks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_messages`
--

DROP TABLE IF EXISTS `user_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `concern` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_messages`
--

LOCK TABLES `user_messages` WRITE;
/*!40000 ALTER TABLE `user_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_level` int NOT NULL DEFAULT '2',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'superadmin','superadmin@gmail.com',NULL,'$2y$10$cTrw5k4y5aBhWW0YdmiFUerZnVGDbX65D4Pw8xuw2XcSNpZi9pIQ6',5,NULL,'2020-10-12 12:18:25','2020-10-12 12:18:25'),(2,'Alexandra Cabrera','a.cabrera@pcaarrd.dost.gov.ph',NULL,'$2y$10$LxpNsfBI8L9AMJLwfj/nces.M9BgaARwaeag0XZplSwiKKwYjjiHu',5,'ipw8VAeDoV0Uz2Lt3SJLMpcEToOOHUe7G86QRVqPONiW1ghYlZK2x7PXUDRR','2020-11-17 03:29:39','2020-11-17 03:29:39'),(3,'Alexander Borja','a.borja@pcaarrd.dost.gov.ph',NULL,'$2y$10$aMlKHN8emzimzwjvyrd0HOHGkdV8ybWbTZHOsqo8nV41qdLwjScP6',5,NULL,'2021-01-20 07:53:37','2021-01-20 07:53:37'),(4,'Alex Batalon','alexanderbatalon@gmail.com',NULL,'$2y$10$FDDgavy262XqRggD8.nZ/OzX9Yf1k9D.kWbqxePnalJa8uyBelpcS',5,NULL,'2021-01-21 06:01:28','2021-01-21 06:01:28'),(6,'Diana Rose P. Cabello','d.cabello@pcaarrd.dost.gov.ph',NULL,'$2y$10$UiJH4lpOUyWRsVD6CUc07uPkj1u8Q5jh2EyyzVtzpLjgOoHLrnyFe',5,NULL,'2021-01-25 02:33:31','2021-01-25 02:33:31'),(7,'Ma. Alexie DS. Lizaba','a.lizaba@pcaarrd.dost.gov.ph',NULL,'$2y$10$F4.quZ8N4XRDG8ls1hC4UurMMD20g1i0qVXUxwi0Ijyw80Zj0ruve',4,NULL,'2021-01-25 06:12:24','2021-01-25 06:12:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utility_models`
--

DROP TABLE IF EXISTS `utility_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utility_models` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `application_number` text COLLATE utf8mb4_unicode_ci,
  `um_number` text COLLATE utf8mb4_unicode_ci,
  `date_of_filing` date DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `technology_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utility_models_technology_id_foreign` (`technology_id`),
  CONSTRAINT `utility_models_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utility_models`
--

LOCK TABLES `utility_models` WRITE;
/*!40000 ALTER TABLE `utility_models` DISABLE KEYS */;
INSERT INTO `utility_models` VALUES (1,'2021-01-21 04:17:19','2021-01-21 04:17:19','PH 2/2012/000054','2012000054','2012-02-02','2016-01-04','Expired',4),(2,'2021-01-21 04:25:32','2021-01-21 04:25:32','PH 2/2017/050210','2017050210','2017-07-28','2019-07-29','Published',4),(3,'2021-01-21 04:29:39','2021-01-21 04:29:39','PH 2/2012/000524','2012000524','2012-09-21','2013-06-05','Expired',5),(4,'2021-01-21 04:30:47','2021-01-21 04:30:47','PH 2/2015/000496','2015000496','2015-09-04','2015-12-23','Published',5),(5,'2021-01-21 04:32:04','2021-01-21 04:32:04','PH 2/2015/000499','2015000499','2015-09-04','2016-01-06','Published',5),(6,'2021-01-21 04:34:23','2021-01-21 04:34:23','PH 2/2015/000491','2015000491','2015-09-04','2015-12-23','Published',5),(7,'2021-01-21 04:35:25','2021-01-21 04:35:25','PH 2/2015/000492','2015000492','2015-09-04','2015-12-23','Published',5),(8,'2021-01-21 04:36:26','2021-01-21 04:36:26','PH 2/2015/000493','2015000493','2015-09-04','2015-12-23','Published',5),(9,'2021-01-21 04:37:31','2021-01-21 04:37:31','PH 2/2015/000495','2015000495','2015-09-04','2015-12-23','Published',5),(10,'2021-01-21 04:39:06','2021-01-21 04:39:06','PH 2/2015/000494','2015000494','2015-09-04','2015-12-23','Published',5),(11,'2021-01-21 04:40:08','2021-01-21 04:40:08','PH 2/2015/000497','2015000497','2015-09-04','2015-12-23','Published',5),(12,'2021-01-21 04:41:34','2021-01-21 04:41:34','PH 2/2015/000498','2015000498','2015-09-04','2015-12-23','Published',5),(13,'2021-01-21 04:42:34','2021-01-21 04:42:34','PH 2/2015/000500','2015000500','2015-09-04','2015-12-23','Published',5),(14,'2021-01-25 06:46:06','2021-01-25 06:46:06','PH 2/2017/000725','2017000725','2017-09-20','2018-09-28','Published',16);
/*!40000 ALTER TABLE `utility_models` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-25 16:38:24
