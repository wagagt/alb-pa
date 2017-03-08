-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: c9
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,38,'Logged in','10.240.0.208','2016-09-23 05:25:18','2016-09-23 05:25:18'),(2,38,'Logged in','10.240.1.15','2016-09-23 05:25:37','2016-09-23 05:25:37'),(3,38,'Logged in','10.240.0.208','2016-09-23 05:25:57','2016-09-23 05:25:57'),(4,38,'Logged in','10.240.0.187','2016-10-09 10:52:58','2016-10-09 10:52:58'),(5,38,'Logged in','10.240.1.32','2016-10-09 11:00:52','2016-10-09 11:00:52'),(6,38,'Logged in','10.240.0.206','2016-10-09 11:05:20','2016-10-09 11:05:20'),(7,38,'Logged in','10.240.0.207','2016-10-09 11:09:29','2016-10-09 11:09:29');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos`
--

DROP TABLE IF EXISTS `apartamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_banios` int(11) NOT NULL,
  `metros_cuadrados` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ambientes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dormitorios` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `torre_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apartamentos_torre_id_foreign` (`torre_id`),
  KEY `apartamentos_user_id_foreign` (`user_id`),
  CONSTRAINT `apartamentos_torre_id_foreign` FOREIGN KEY (`torre_id`) REFERENCES `torres` (`id`),
  CONSTRAINT `apartamentos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos`
--

LOCK TABLES `apartamentos` WRITE;
/*!40000 ALTER TABLE `apartamentos` DISABLE KEYS */;
INSERT INTO `apartamentos` VALUES (1,'06A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,1),(2,'06B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,2),(3,'06C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,3),(4,'06D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,4),(5,'07A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,5),(6,'07B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,6),(7,'07C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,7),(8,'07D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,8),(9,'08A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,9),(10,'08B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,10),(11,'08C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,11),(12,'08D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,12),(13,'09A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,13),(14,'09B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,14),(15,'09C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,15),(16,'09D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,16),(17,'10A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,17),(18,'10B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,18),(19,'10C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,19),(20,'10D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,20),(21,'11A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,21),(22,'11B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,22),(23,'11C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,23),(24,'11D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,24),(25,'12A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,25),(26,'12B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,26),(27,'12C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,27),(28,'12D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,28),(29,'13A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,29),(30,'13B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,30),(31,'13C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,31),(32,'13D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,32),(33,'14A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,33),(34,'14B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,34),(35,'14C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,35),(36,'14D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,36),(37,'15A','',0,'129.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,37),(38,'15B','',0,'129.93','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,38),(39,'15C','',0,'109.77','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,39),(40,'15D','',0,'109.04','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,40),(41,'16A','',0,'129.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,41),(42,'16B','',0,'129.93','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,42),(43,'16C','',0,'109.77','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,43),(44,'16D','',0,'109.04','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,44),(45,'17A','',0,'129.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,45),(46,'17B','',0,'129.93','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,46),(47,'17C','',0,'109.77','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,47),(48,'17D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,48),(49,'18A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,49),(50,'18B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,50),(51,'18C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,51),(52,'18D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,52),(53,'19A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,53),(54,'19B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,54),(55,'19C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,55),(56,'19D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,56),(57,'20A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,57),(58,'20B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,58),(59,'20C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,59),(60,'20D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,60),(61,'21A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,61),(62,'21B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,62),(63,'21C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,63),(64,'21D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,64),(65,'22A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,65),(66,'22B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,66),(67,'22C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,67),(68,'22D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,68),(69,'23A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,69),(70,'23B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,70),(71,'23C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,71),(72,'23D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,72),(73,'24A','',0,'129.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,73),(74,'24B','',0,'129.93','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,74),(75,'24C','',0,'102.18','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,75),(76,'24D','',0,'111.63','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,76),(77,'25A','',0,'129.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,77),(78,'25B','',0,'129.93','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,78),(79,'25C','',0,'102.18','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,79),(80,'25D','',0,'111.63','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,80),(81,'26A','',0,'129.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,81),(82,'26B','',0,'129.93','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,82),(83,'26C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,83),(84,'26D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,84),(85,'27A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,85),(86,'27B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,86),(87,'27C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,87),(88,'27D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,88),(89,'28A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,89),(90,'28B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,90),(91,'28C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,91),(92,'28D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,92),(93,'29A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,93),(94,'29B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,94),(95,'29C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,95),(96,'29D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,96),(97,'30A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,97),(98,'30B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,98),(99,'30C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,99),(100,'30D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,100),(101,'31A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,101),(102,'31B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,102),(103,'31C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,103),(104,'31D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,104),(105,'32A','',0,'125.39','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,105),(106,'32B','',0,'125.84','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,106),(107,'32C','',0,'102.69','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,107),(108,'32D','',0,'97.05','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,108),(109,'33A','',0,'125.39','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,109),(110,'33B','',0,'125.84','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,110),(111,'33C','',0,'102.69','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,111),(112,'33D','',0,'97.05','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,112),(113,'34A','',0,'125.39','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,113),(114,'34B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,114),(115,'34C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,115),(116,'34D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,116),(117,'35A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,117),(118,'35B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,118),(119,'35C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,119),(120,'35D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,120),(121,'36A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,121),(122,'36B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,122),(123,'36C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,123),(124,'36D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,124),(125,'37A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,125),(126,'37B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,126),(127,'37C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,127),(128,'37D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,128),(129,'38A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,129),(130,'38B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,130),(131,'38C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,131),(132,'38D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,132),(133,'39A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,133),(134,'39B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,134),(135,'39C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,135),(136,'39D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,136),(137,'40A','',0,'125.11','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,137),(138,'40B','',0,'125.48','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,138),(139,'40C','',0,'100.35','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,139),(140,'40D','',0,'100.56','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,140),(141,'41A','',0,'123.64','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,141),(142,'41B','',0,'103.15','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,142),(143,'42A','',0,'137.23','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,143),(144,'42B','',0,'112.65','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,144),(145,'43A','',0,'137.23','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,145),(146,'43B','',0,'112.65','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,146),(147,'44A','',0,'137.23','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,147),(148,'44B','',0,'112.65','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,148),(149,'45A','',0,'137.23','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,149),(150,'45B','',0,'112.65','','',' $1.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,150),(151,'L1','',0,'140.61','','',' $2.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,151),(152,'L2','',0,'136.74','','',' $2.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,152),(153,'L3','',0,'136.74','','',' $2.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,153),(154,'L4','',0,'136.74','','',' $2.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,154),(155,'L5','',0,'136.74','','',' $2.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,155),(156,'L6','',0,'136.74','','',' $2.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,156),(157,'L7','',0,'110.94','','',' $2.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,157),(158,'L8','',0,'110.94','','',' $2.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,158),(159,'L9','',0,'133.71','','',' $2.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,159),(160,'L10','',0,'148.07','','',' $2.50 ',NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00',1,160);
/*!40000 ALTER TABLE `apartamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivos_documentos`
--

DROP TABLE IF EXISTS `archivos_documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivos_documentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `documentos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos_documentos`
--

LOCK TABLES `archivos_documentos` WRITE;
/*!40000 ALTER TABLE `archivos_documentos` DISABLE KEYS */;
INSERT INTO `archivos_documentos` VALUES (1,'Estado Financiero','2',1,1),(2,'borrego-web.jpg','jpg',1,22);
/*!40000 ALTER TABLE `archivos_documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `automoviles_aptos`
--

DROP TABLE IF EXISTS `automoviles_aptos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `automoviles_aptos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modelo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `placa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `apto_id` int(10) unsigned NOT NULL,
  `marca_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `automoviles_aptos_apto_id_foreign` (`apto_id`),
  KEY `automoviles_aptos_marca_id_foreign` (`marca_id`),
  CONSTRAINT `automoviles_aptos_apto_id_foreign` FOREIGN KEY (`apto_id`) REFERENCES `apartamentos` (`id`),
  CONSTRAINT `automoviles_aptos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marca_vehiculos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automoviles_aptos`
--

LOCK TABLES `automoviles_aptos` WRITE;
/*!40000 ALTER TABLE `automoviles_aptos` DISABLE KEYS */;
/*!40000 ALTER TABLE `automoviles_aptos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_docts`
--

DROP TABLE IF EXISTS `chat_docts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_docts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `texto` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `documento_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `user_send_id` int(10) unsigned NOT NULL,
  `user_recibe_id` int(10) unsigned NOT NULL,
  `mensaje_tipo` enum('message','link') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'message',
  PRIMARY KEY (`id`),
  KEY `chat_docts_documento_id_foreign` (`documento_id`),
  KEY `chat_docts_status_id_foreign` (`status_id`),
  KEY `chat_docts_user_send_id_foreign` (`user_send_id`),
  KEY `chat_docts_user_recibe_id_foreign` (`user_recibe_id`),
  CONSTRAINT `chat_docts_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`),
  CONSTRAINT `chat_docts_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_coments` (`id`),
  CONSTRAINT `chat_docts_user_recibe_id_foreign` FOREIGN KEY (`user_recibe_id`) REFERENCES `users` (`id`),
  CONSTRAINT `chat_docts_user_send_id_foreign` FOREIGN KEY (`user_send_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_docts`
--

LOCK TABLES `chat_docts` WRITE;
/*!40000 ALTER TABLE `chat_docts` DISABLE KEYS */;
INSERT INTO `chat_docts` VALUES (112,'primer mensaje','2016-10-22 12:38:21','2016-10-22 12:38:34',NULL,22,2,5,161,'message'),(113,'primer respuesta activechat','2016-10-22 12:38:43','2016-10-22 12:38:45',NULL,22,2,161,5,'message'),(114,'respuesta','2016-10-22 12:38:58','2016-10-22 12:38:59',NULL,22,2,5,161,'message'),(115,'ya podria funcionar asi.','2016-10-22 12:39:15','2016-10-22 12:39:18',NULL,22,2,161,5,'message'),(116,'va de nuevo inicio de conversacion','2016-10-22 12:42:11','2016-10-22 12:42:17',NULL,22,2,5,161,'message'),(117,'respuesta a 5','2016-10-22 12:42:31','2016-10-22 12:42:31',NULL,22,2,161,5,'message'),(118,'ahora no se arruino !','2016-10-22 12:42:41','2016-10-22 12:42:42',NULL,22,2,5,161,'message'),(119,'primer mensaje a 106A firefox','2016-10-22 12:44:16','2016-10-22 12:44:24',NULL,22,2,161,1,'message'),(120,'respuesta inmediata','2016-10-22 12:44:32','2016-10-22 12:44:33',NULL,22,2,1,161,'message'),(121,'ya la hicimos con el chat! basico','2016-10-22 12:44:42','2016-10-22 12:44:42',NULL,22,2,161,1,'message'),(122,'mensaje uno','2016-10-22 12:45:34','2016-10-22 12:46:47',NULL,22,2,161,1,'message'),(123,'mensaje dos','2016-10-22 12:45:38','2016-10-22 12:46:47',NULL,22,2,161,1,'message'),(124,'RESPUESTA AL CHILAZO !','2016-10-22 12:46:56','2016-10-22 12:46:57',NULL,22,2,1,161,'message'),(125,'ENVIO A 161\n','2016-10-22 12:47:37','2016-10-22 12:47:39',NULL,22,2,5,161,'message'),(126,'ENVIO A 161','2016-10-22 12:47:52','2016-10-22 13:01:31',NULL,22,2,1,161,'message'),(127,'MENSAJE PENDIENTE 2','2016-10-22 12:48:08','2016-10-22 13:02:12',NULL,22,2,5,161,'message'),(128,'MENSAJE PENDIENTE 2','2016-10-22 12:48:12','2016-10-22 13:01:31',NULL,22,2,1,161,'message'),(129,'MENSAJE PENDIENTE 3','2016-10-22 12:48:18','2016-10-22 13:01:31',NULL,22,2,1,161,'message'),(130,'dicen luna y ladra','2016-10-22 13:00:59','2016-10-22 13:01:31',NULL,22,2,1,161,'message'),(131,'con este van 5 mensajes nuevos y sin leer','2016-10-22 13:01:26','2016-10-22 13:01:31',NULL,22,2,1,161,'message'),(132,'respuesta','2016-10-22 13:02:04','2016-10-22 13:02:07',NULL,22,2,161,1,'message'),(133,'respuesta al mensaje pendiente','2016-10-22 13:02:26','2016-10-22 13:02:28',NULL,22,2,161,5,'message'),(134,'hechos','2016-10-22 13:02:33','2016-10-22 13:02:34',NULL,22,2,5,161,'message'),(135,'enviar a !!! propietarios! uno','2016-10-22 14:36:31','2016-10-22 14:36:32',NULL,22,2,161,1,'message'),(136,'bien va la respuesta inmediata','2016-10-22 14:36:42','2016-10-22 14:36:42',NULL,22,2,1,161,'message'),(137,'ahora comienzo yo!','2016-10-22 14:37:29','2016-10-22 14:37:35',NULL,22,2,161,1,'message'),(138,'primer mensaje','2016-10-22 14:38:51','2016-10-22 14:39:17',NULL,22,2,162,1,'message'),(139,'enviar primer respuesta','2016-10-22 14:39:13','2016-10-22 14:39:15',NULL,22,2,1,161,'message'),(140,'primer respuesta','2016-10-22 14:39:22','2016-10-22 14:39:26',NULL,22,2,1,162,'message'),(141,'respuesta inmediata','2016-10-22 14:39:32','2016-10-22 14:39:34',NULL,22,2,162,1,'message'),(142,'soy waga hacei a propietario 1','2016-10-22 14:40:51','2016-10-22 14:41:37',NULL,22,2,161,1,'message'),(143,'sarcenio en directo','2016-10-22 14:41:05','2016-10-22 14:41:07',NULL,22,2,162,1,'message'),(144,'respuesta en directo','2016-10-22 14:41:14','2016-10-22 14:41:17',NULL,22,2,1,162,'message'),(145,'respuesta en  notirifacion\n','2016-10-22 14:41:30','2016-10-22 14:41:36',NULL,22,2,1,162,'message'),(146,'pregunta en notificacion','2016-10-22 14:41:45','2016-10-22 14:41:49',NULL,22,2,162,1,'message'),(147,'pregunta waga on notify','2016-10-22 14:42:03','2016-10-22 14:42:08',NULL,22,2,1,161,'message'),(148,'respuesta directa','2016-10-22 14:42:12','2016-10-22 14:42:13',NULL,22,2,161,1,'message'),(149,'respuesta en notify','2016-10-22 14:42:21','2016-10-22 14:42:24',NULL,22,2,161,1,'message'),(150,'pregunta en notify','2016-10-22 14:42:43','2016-10-22 22:26:39',NULL,22,2,161,1,'message'),(151,'notify 1','2016-10-22 14:42:47','2016-10-22 22:26:37',NULL,22,2,162,1,'message'),(152,'notify 2','2016-10-22 14:42:52','2016-10-22 22:26:37',NULL,22,2,162,1,'message'),(153,'test uno de envío de mensajes','2016-10-22 16:48:28','2016-10-22 16:48:37',NULL,24,2,38,161,'message'),(154,'test recibido','2016-10-22 16:48:50','2016-10-22 16:48:54',NULL,24,2,161,38,'message'),(155,'el test funcina bien por el momento','2016-10-22 16:49:28','2016-10-22 16:49:30',NULL,24,2,38,161,'message'),(156,'testsss','2016-10-22 16:49:45','2016-10-22 16:49:52',NULL,24,2,38,161,'message'),(157,'comunicación activa','2016-10-22 16:50:06','2016-10-22 16:50:09',NULL,24,2,161,38,'message'),(158,'getAllChatsMessages()  ???','2016-10-22 16:50:37','2016-10-22 16:50:39',NULL,24,2,38,161,'message'),(159,'testsssss','2016-10-22 11:53:34','2017-01-22 21:56:24',NULL,24,2,161,38,'message'),(160,'testttsss','2016-10-22 11:53:48','2017-01-22 21:56:24',NULL,24,2,161,38,'message'),(161,'mensaje solo a axcel\n','2016-10-22 22:29:51','2016-10-22 22:29:58',NULL,22,2,2,162,'message'),(162,'respuesta','2016-10-22 22:30:02','2016-10-22 22:30:05',NULL,22,2,162,2,'message'),(163,'ahora si tiene mensaje','2016-10-22 23:26:33','2016-10-22 23:26:33',NULL,22,1,161,3,'message'),(164,'MENSAJE NUEVO','2016-10-23 15:16:12','2016-10-23 15:18:07',NULL,22,2,161,2,'message'),(165,'MENSAJE NUEVO','2016-10-23 15:16:33','2016-10-23 15:18:07',NULL,22,2,161,2,'message'),(166,'test de otro mensaje','2016-10-23 16:35:01','2016-11-06 08:32:50',NULL,22,2,2,162,'message'),(167,'y mas mensajes','2016-10-23 16:35:05','2016-11-06 08:32:50',NULL,22,2,2,162,'message'),(168,'y mas y mas  y mas mensajes','2016-10-23 16:35:12','2016-11-06 08:32:50',NULL,22,2,2,162,'message'),(169,'enviar mensajecon imagen','2016-10-27 04:33:40','2016-10-27 04:33:48',NULL,22,2,161,1,'message'),(170,'? como llega el mensaje con imagen ? ','2016-10-27 04:34:20','2016-10-27 04:34:21',NULL,22,2,161,1,'message'),(171,'nuevo para 0106','2016-10-27 04:37:26','2016-10-27 04:37:40',NULL,22,2,161,1,'message'),(172,'mensaje nuevo','2016-11-03 00:12:25','2016-11-03 00:12:31',NULL,22,2,161,1,'message'),(173,'respuesta','2016-11-03 00:12:35','2016-11-03 00:12:37',NULL,22,2,1,161,'message'),(174,'/uploads/files/transferencia-procesada-para-el-18-10-2016-1050-saldo.PNG','2016-11-06 08:32:45','2016-11-06 08:32:53',NULL,22,2,161,1,'link'),(175,'/uploads/files/bienchavo.jpg','2016-11-06 14:07:52','2016-11-06 14:07:57',NULL,22,2,161,1,'link'),(176,'/uploads/files/rc-2.jpg','2016-11-06 14:13:13','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(177,'/uploads/files/meninblack.jpg','2016-11-06 14:15:06','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(178,'/uploads/files/Screen Shot 2016-09-03 at 5.51.48 AM.png','2016-11-09 00:05:41','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(179,'Documento: <a href=\"uploads/files_chat/\">Screen Shot 2016-09-10 at 5.33.31 PM.png</a>','2016-11-09 00:13:18','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(180,'Documento: <a href=\"uploads/files_chat/bienchavo.jpg\">bienchavo.jpg</a>','2016-11-09 00:14:46','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(181,'Documento: <a href=\"/uploads/files_chat/rc-3.jpg\" target=\"_blank\">rc-3.jpg</a>','2016-11-09 00:16:00','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(182,'Documento: <a href=\"/uploads/files_chat/meninblack.jpg\" target=\"_blank\">meninblack.jpg</a>','2016-11-09 00:23:46','2016-11-09 00:23:46',NULL,22,1,161,3,'link'),(183,'Documento: <a href=\"/uploads/files_chat/rc-3.jpg\" target=\"_blank\">rc-3.jpg</a>','2016-11-09 00:27:03','2016-11-09 00:27:03',NULL,22,1,161,3,'link'),(184,'Documento: <a href=\"/uploads/files_chat/quiero-estos.jpg\" target=\"_blank\">quiero-estos.jpg</a>','2016-11-09 00:27:25','2016-11-09 00:27:25',NULL,22,1,161,4,'link'),(185,'<i class=\"fa fa-paperclip\" aria-hidden=\"true\"></i><a href=\"/uploads/files_chat/bienchavo.jpg\" target=\"_blank\">bienchavo.jpg</a>','2016-11-09 00:29:39','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(186,'<i class=\"fa fa-paperclip fa-3\" aria-hidden=\"true\"></i> -> <a href=\"/uploads/files_chat/final.jpg\" target=\"_blank\">final.jpg</a>','2016-11-09 00:31:55','2016-11-10 13:13:27',NULL,22,2,161,5,'link'),(187,'<img src=\"/images/clip.png\"> -> <a href=\"/uploads/files_chat/rc-1.jpg\" target=\"_blank\">rc-1.jpg</a>','2016-11-09 00:35:59','2016-11-09 00:35:59',NULL,22,1,161,4,'link'),(188,'<img src=\"ui/images/clip.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/quiero-estos.jpg\" target=\"_blank\">quiero-estos.jpg</a>','2016-11-09 00:38:32','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(189,'<img src=\"/ui/images/clip.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/meninblack.jpg\" target=\"_blank\">meninblack.jpg</a>','2016-11-09 00:38:53','2016-11-09 00:38:53',NULL,22,1,161,2,'link'),(190,'<img src=\"/ui/images/icon_clip.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon.otro\" target=\"_blank\">icon.otro</a>','2016-11-09 00:54:35','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(191,'<img src=\"/ui/images/icon_clip.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon.pdf\" target=\"_blank\">icon.pdf</a>','2016-11-09 00:54:53','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(192,'<img src=\"/ui/images/icon_clip.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon.doc\" target=\"_blank\">icon.doc</a>','2016-11-09 00:57:19','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(193,'<img src=\"/ui/images/icon_image.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon.jpg\" target=\"_blank\">icon.jpg</a>','2016-11-09 01:01:02','2016-11-09 01:01:02',NULL,22,1,161,6,'link'),(194,'<img src=\"/ui/images/icon_pdf.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon.pdf\" target=\"_blank\">icon.pdf</a>','2016-11-09 01:01:17','2016-11-09 01:01:17',NULL,22,1,161,6,'link'),(195,'<img src=\"/ui/images/icon_xls.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon.xls\" target=\"_blank\">icon.xls</a>','2016-11-09 01:01:30','2016-11-09 01:01:30',NULL,22,1,161,6,'link'),(196,'<img src=\"/ui/images/icon_doc.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon.doc\" target=\"_blank\">icon.doc</a>','2016-11-09 02:31:40','2016-11-09 02:31:40',NULL,22,1,161,7,'link'),(197,'<img src=\"/ui/images/icon_clip.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon.otro\" target=\"_blank\">icon.otro</a>','2016-11-09 03:07:55','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(198,'<img src=\"/ui/images/icon_doc.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon.doc\" target=\"_blank\">icon.doc</a>','2016-11-09 03:08:09','2016-11-10 13:11:26',NULL,22,2,161,1,'link'),(199,'<img src=\"/ui/images/icon_image.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon_word.png\" target=\"_blank\">icon_word.png</a>','2016-11-09 03:09:15','2016-11-09 03:09:15',NULL,22,1,161,8,'link'),(200,'otro mensaje','2016-11-09 03:09:39','2016-11-09 03:09:39',NULL,22,1,161,8,'message'),(201,'<img src=\"/ui/images/icon_xls.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/icon.xls\" target=\"_blank\">icon.xls</a>','2016-11-09 03:22:17','2016-11-09 03:22:17',NULL,22,1,161,14,'link'),(202,'<img src=\"/ui/images/icon_image.png\" height=\"40\" width=\"40\"> -> <a href=\"/uploads/files_chat/Screen Shot 2016-10-27 at 12.24.49 AM.png\" target=\"_blank\">Screen Shot 2016-10-27 at 12.24.49 AM.png</a>','2016-11-09 03:22:34','2016-11-09 03:22:34',NULL,22,1,161,2,'link'),(203,'mensaje nuevo para wagagt.','2016-11-08 13:12:01','2016-11-10 13:12:01',NULL,24,1,1,161,'message'),(204,'mensaje nuevo 2','2016-11-10 13:12:06','2016-11-10 13:12:06',NULL,24,1,1,161,'message'),(205,'mensaje nuevo 3\n','2016-11-10 13:12:15','2016-11-10 13:12:15',NULL,22,1,1,161,'message'),(206,'mensaje nuevo 1','2016-11-30 13:13:38','2017-01-19 22:23:23',NULL,22,2,5,161,'message'),(207,'mensaje nuevo 2','2016-11-10 13:13:49','2016-11-10 13:13:49',NULL,23,1,5,161,'message'),(208,'primer y unico mensaje','2016-11-10 13:14:58','2016-11-10 13:14:59',NULL,22,2,150,161,'message'),(209,'este si es .... primer mensaje SIN LEER','2016-11-10 13:15:15','2016-11-10 13:15:15',NULL,23,1,150,161,'message'),(210,'respuesta.','2016-11-21 06:00:30','2016-11-21 06:00:30',NULL,22,1,161,4,'message'),(211,'queria enviar imagen. mensaje nuevo de texto...no pude enviar imagen','2017-01-22 21:57:12','2017-01-22 22:04:50',NULL,24,2,38,161,'message'),(212,'otro mas ( probando que tan rapido actualiza )','2017-01-22 21:57:46','2017-01-22 22:04:50',NULL,24,2,38,161,'message'),(213,'ultima prueba (timer 1000)','2017-01-22 22:01:57','2017-01-22 22:04:50',NULL,24,2,38,161,'message'),(214,'ultima prueba (timer 1000)','2017-01-22 22:01:57','2017-01-22 22:04:50',NULL,24,2,38,161,'message'),(215,'solo enviar 1  vez','2017-01-22 22:02:18','2017-01-22 22:04:50',NULL,24,2,38,161,'message'),(216,'respuesta','2017-01-22 22:05:12','2017-01-22 22:05:12',NULL,24,2,161,38,'message'),(217,'respuesta otravez','2017-01-22 22:05:34','2017-01-22 22:05:35',NULL,24,2,38,161,'message'),(218,'uno mas nuevo(!!!)','2017-01-22 22:06:01','2017-01-22 22:06:01',NULL,24,1,38,161,'message'),(219,'ni vi cuando lo regenero!','2017-01-22 22:06:36','2017-01-22 22:06:36',NULL,24,1,38,161,'message');
/*!40000 ALTER TABLE `chat_docts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_documentos_id` int(10) unsigned NOT NULL,
  `fecha_del` date NOT NULL,
  `fecha_al` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `torre_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `documentos_tipo_documentos_id_foreign` (`tipo_documentos_id`),
  KEY `documentos_torre_id_foreign` (`torre_id`),
  CONSTRAINT `documentos_tipo_documentos_id_foreign` FOREIGN KEY (`tipo_documentos_id`) REFERENCES `tipo_documentos` (`id`),
  CONSTRAINT `documentos_torre_id_foreign` FOREIGN KEY (`torre_id`) REFERENCES `torres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (1,'Estado Financiero 1-2016',1,'2016-01-01','2016-01-30',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(2,'Estado Financiero 2-2016',1,'2016-02-01','2016-02-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(3,'Estado Financiero 3-2016',5,'2016-03-01','2016-03-30',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(4,'Estado Financiero 4-2016',1,'2016-04-01','2016-04-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(5,'Estado Financiero 5-2016',1,'2016-05-01','2016-05-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(6,'Estado Financiero 6-2016',5,'2016-06-01','2016-06-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(7,'Estado Financiero 7-2016',1,'2016-07-01','2016-07-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(8,'Cuentas x pagar 1-2016',1,'2016-01-01','2016-01-30',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(9,'Cuentas x pagar 2-2016',1,'2016-02-01','2016-02-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(10,'Cuentas x pagar 3-2016',5,'2016-03-01','2016-03-30',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(11,'Cuentas x pagar 4-2016',1,'2016-04-01','2016-04-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(12,'Cuentas x pagar 5-2016',1,'2016-05-01','2016-05-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(13,'Cuentas x pagar 6-2016',5,'2016-06-01','2016-06-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(14,'Cuentas x pagar 7-2016',1,'2016-07-01','2016-07-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(15,'Cuentas x cobrar 1-2016',1,'2016-01-01','2016-01-30',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(16,'Cuentas x cobrar 2-2016',1,'2016-02-01','2016-02-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(17,'Cuentas x cobrar 3-2016',5,'2016-03-01','2016-03-30',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(18,'Cuentas x cobrar 4-2016',1,'2016-04-01','2016-04-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(19,'Cuentas x cobrar 5-2016',1,'2016-05-01','2016-05-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(20,'Cuentas x cobrar 6-2016',5,'2016-06-01','2016-06-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(21,'Cuentas x cobrar 7-2016',1,'2016-07-01','2016-07-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(22,'Bancos 1-2016',1,'2016-01-01','2016-01-30',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(23,'Bancos 2-2016',1,'2016-02-01','2016-02-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(24,'Bancos 3-2016',5,'2016-03-01','2016-03-30',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(25,'Bancos 4-2016',1,'2016-04-01','2016-04-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(26,'Bancos 5-2016',1,'2016-05-01','2016-05-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(27,'Bancos 6-2016',5,'2016-06-01','2016-06-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(28,'Bancos 7-2016',1,'2016-07-01','2016-07-28',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1);
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos_chats`
--

DROP TABLE IF EXISTS `documentos_chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos_chats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `archivo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `doc_id` int(10) unsigned NOT NULL,
  `chat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `documentos_chats_doc_id_foreign` (`doc_id`),
  KEY `documentos_chats_chat_id_foreign` (`chat_id`),
  CONSTRAINT `documentos_chats_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chat_docts` (`id`),
  CONSTRAINT `documentos_chats_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `documentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos_chats`
--

LOCK TABLES `documentos_chats` WRITE;
/*!40000 ALTER TABLE `documentos_chats` DISABLE KEYS */;
INSERT INTO `documentos_chats` VALUES (1,'transferencia-procesada-para-el-18-10-2016-1050-saldo.PNG','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/transferencia-procesada-para-el-18-10-2016-1050-sal','2016-11-06 08:32:45','2016-11-06 08:32:45',NULL,22,174),(2,'bienchavo.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/bienchavo.jpg','2016-11-06 14:07:52','2016-11-06 14:07:52',NULL,22,175),(3,'rc-2.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/rc-2.jpg','2016-11-06 14:13:13','2016-11-06 14:13:13',NULL,22,176),(4,'meninblack.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/meninblack.jpg','2016-11-06 14:15:06','2016-11-06 14:15:06',NULL,22,177),(5,'Screen Shot 2016-09-03 at 5.51.48 AM.png','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/Screen Shot 2016-09-03 at 5.51.48 AM.png','2016-11-09 00:05:41','2016-11-09 00:05:41',NULL,22,178),(6,'Screen Shot 2016-09-10 at 5.33.31 PM.png','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/Screen Shot 2016-09-10 at 5.33.31 PM.png','2016-11-09 00:13:18','2016-11-09 00:13:18',NULL,22,179),(7,'bienchavo.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/bienchavo.jpg','2016-11-09 00:14:46','2016-11-09 00:14:46',NULL,22,180),(8,'rc-3.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/rc-3.jpg','2016-11-09 00:16:00','2016-11-09 00:16:00',NULL,22,181),(9,'meninblack.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/meninblack.jpg','2016-11-09 00:23:46','2016-11-09 00:23:46',NULL,22,182),(10,'rc-3.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/rc-3.jpg','2016-11-09 00:27:03','2016-11-09 00:27:03',NULL,22,183),(11,'quiero-estos.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/quiero-estos.jpg','2016-11-09 00:27:25','2016-11-09 00:27:25',NULL,22,184),(12,'bienchavo.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/bienchavo.jpg','2016-11-09 00:29:39','2016-11-09 00:29:39',NULL,22,185),(13,'final.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/final.jpg','2016-11-09 00:31:55','2016-11-09 00:31:55',NULL,22,186),(14,'rc-1.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/rc-1.jpg','2016-11-09 00:35:59','2016-11-09 00:35:59',NULL,22,187),(15,'quiero-estos.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/quiero-estos.jpg','2016-11-09 00:38:32','2016-11-09 00:38:32',NULL,22,188),(16,'meninblack.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/meninblack.jpg','2016-11-09 00:38:53','2016-11-09 00:38:53',NULL,22,189),(17,'icon.otro','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon.otro','2016-11-09 00:54:35','2016-11-09 00:54:35',NULL,22,190),(18,'icon.pdf','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon.pdf','2016-11-09 00:54:53','2016-11-09 00:54:53',NULL,22,191),(19,'icon.doc','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon.doc','2016-11-09 00:57:19','2016-11-09 00:57:19',NULL,22,192),(20,'icon.jpg','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon.jpg','2016-11-09 01:01:02','2016-11-09 01:01:02',NULL,22,193),(21,'icon.pdf','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon.pdf','2016-11-09 01:01:17','2016-11-09 01:01:17',NULL,22,194),(22,'icon.xls','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon.xls','2016-11-09 01:01:30','2016-11-09 01:01:30',NULL,22,195),(23,'icon.doc','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon.doc','2016-11-09 02:31:41','2016-11-09 02:31:41',NULL,22,196),(24,'icon.otro','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon.otro','2016-11-09 03:07:55','2016-11-09 03:07:55',NULL,22,197),(25,'icon.doc','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon.doc','2016-11-09 03:08:09','2016-11-09 03:08:09',NULL,22,198),(26,'icon_word.png','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon_word.png','2016-11-09 03:09:15','2016-11-09 03:09:15',NULL,22,199),(27,'icon.xls','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/icon.xls','2016-11-09 03:22:17','2016-11-09 03:22:17',NULL,22,201),(28,'Screen Shot 2016-10-27 at 12.24.49 AM.png','/home/ubuntu/workspace/public/uploads/files_chat/','/home/ubuntu/workspace/public/uploads/files_chat/Screen Shot 2016-10-27 at 12.24.49 AM.png','2016-11-09 03:22:34','2016-11-09 03:22:34',NULL,22,202);
/*!40000 ALTER TABLE `documentos_chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca_vehiculos`
--

DROP TABLE IF EXISTS `marca_vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca_vehiculos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca_vehiculos`
--

LOCK TABLES `marca_vehiculos` WRITE;
/*!40000 ALTER TABLE `marca_vehiculos` DISABLE KEYS */;
INSERT INTO `marca_vehiculos` VALUES (1,'Abarth',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(2,'Alfa Romeo',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(3,'Aston Martin',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(4,'Audi',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(5,'Bentley',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(6,'BMW',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(7,'Cadillac',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(8,'Caterham',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(9,'Chevrolet',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(10,'Citroen',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(11,'Dacia',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(12,'Ferrari',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(13,'Fiat',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(14,'Ford',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(15,'Honda',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(16,'Hyundai',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(17,'Infiniti',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(18,'Isuzu',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(19,'Iveco',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(20,'Jaguar',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(21,'Jeep',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(22,'Kia',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(23,'KTM',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(24,'Lada',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(25,'Lamborghini',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(26,'Lancia',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(27,'Land Rover',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(28,'Lexus',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(29,'Lotus',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(30,'Maserati',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(31,'Mazda',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(32,'McLaren',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(33,'Mercedes-Benz',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(34,'Mini',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(35,'Mitsubishi',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(36,'Morgan',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(37,'Nissan',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(38,'Opel',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(39,'Peugeot',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(40,'Piaggio',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(41,'Porsche',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(42,'Renault',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(43,'Rolls-Royce',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(44,'Seat',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(45,'Skoda',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(46,'Smart',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(47,'SsangYong',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(48,'Subaru',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(49,'Suzuki',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(50,'Tata',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(51,'Tesla',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(52,'Toyota',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(53,'Volkswagen',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14'),(54,'Volvo',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14');
/*!40000 ALTER TABLE `marca_vehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_10_31_162633_scaffoldinterfaces',1),('2016_03_02_072451_paises',1),('2016_03_02_074959_oficinas',1),('2016_03_02_080248_torres',1),('2016_03_02_081148_apartamentos',1),('2016_03_12_012424_tipo_documentos',1),('2016_03_12_060448_documentos',1),('2016_04_02_063707_marca_vehiculos',1),('2016_04_02_075739_parqueos',1),('2016_04_03_031617_automoviles_aptos',1),('2016_04_09_114836_archivos_documentos',1),('2016_05_03_052519_create_status_coments_table',1),('2016_05_03_060518_create_chat_docts_table',1),('2016_05_06_045033_create_notificaiones_chats_table',1),('2016_05_06_045438_create_documentos_chats_table',1),('2016_05_26_043211_create_activity_log_table',1),('2017_01_25_232739_add_torreid_to_tipo_documento',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaiones_chats`
--

DROP TABLE IF EXISTS `notificaiones_chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaiones_chats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `texto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `documento_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `user_send_id` int(10) unsigned NOT NULL,
  `user_recibe_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `notificaiones_chats_documento_id_foreign` (`documento_id`),
  KEY `notificaiones_chats_status_id_foreign` (`status_id`),
  KEY `notificaiones_chats_user_send_id_foreign` (`user_send_id`),
  KEY `notificaiones_chats_user_recibe_id_foreign` (`user_recibe_id`),
  CONSTRAINT `notificaiones_chats_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`),
  CONSTRAINT `notificaiones_chats_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_coments` (`id`),
  CONSTRAINT `notificaiones_chats_user_recibe_id_foreign` FOREIGN KEY (`user_recibe_id`) REFERENCES `users` (`id`),
  CONSTRAINT `notificaiones_chats_user_send_id_foreign` FOREIGN KEY (`user_send_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaiones_chats`
--

LOCK TABLES `notificaiones_chats` WRITE;
/*!40000 ALTER TABLE `notificaiones_chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificaiones_chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oficinas`
--

DROP TABLE IF EXISTS `oficinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oficinas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pais_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `oficinas_pais_id_foreign` (`pais_id`),
  CONSTRAINT `oficinas_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oficinas`
--

LOCK TABLES `oficinas` WRITE;
/*!40000 ALTER TABLE `oficinas` DISABLE KEYS */;
INSERT INTO `oficinas` VALUES (1,'Oficina Panameña ALB',' 65921354','21calle Edif. Vivaldi Of. 12-01',NULL,'2016-09-23 04:52:13','2016-09-23 04:52:13',1),(2,'Oficina Panameña No.2 ALB','65465488','12av Edif. Reforma Of. 12-01',NULL,'2016-09-23 04:52:13','2016-09-23 04:52:13',1),(3,'Oficina Chile',' 98798755','12c. 12-98 z. 22, Valparaiso',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',3);
/*!40000 ALTER TABLE `oficinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (1,'Panamá','Panamá',NULL,'2016-09-23 04:52:13','2016-09-23 04:52:13'),(2,'Guatemala','Guatemala',NULL,'2016-09-23 04:52:13','2016-09-23 04:52:13'),(3,'Chile','Valparaiso',NULL,'2016-09-23 04:52:13','2016-09-23 04:52:13');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parqueos`
--

DROP TABLE IF EXISTS `parqueos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parqueos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apto_id` int(10) unsigned NOT NULL,
  `asignado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parqueos_apto_id_foreign` (`apto_id`),
  CONSTRAINT `parqueos_apto_id_foreign` FOREIGN KEY (`apto_id`) REFERENCES `apartamentos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parqueos`
--

LOCK TABLES `parqueos` WRITE;
/*!40000 ALTER TABLE `parqueos` DISABLE KEYS */;
/*!40000 ALTER TABLE `parqueos` ENABLE KEYS */;
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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('creativo.hosannaweb@gmail.com','bc058448f0db085754aa343dfbc69e2e1cdf7f00ffd0740f4a701a027a523d5e','2016-10-17 15:37:27');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scaffoldinterfaces`
--

DROP TABLE IF EXISTS `scaffoldinterfaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scaffoldinterfaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tablename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scaffoldinterfaces`
--

LOCK TABLES `scaffoldinterfaces` WRITE;
/*!40000 ALTER TABLE `scaffoldinterfaces` DISABLE KEYS */;
/*!40000 ALTER TABLE `scaffoldinterfaces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_coments`
--

DROP TABLE IF EXISTS `status_coments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_coments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_coments`
--

LOCK TABLES `status_coments` WRITE;
/*!40000 ALTER TABLE `status_coments` DISABLE KEYS */;
INSERT INTO `status_coments` VALUES (1,'Enviado','2016-09-23 04:52:14','2016-09-23 04:52:14',NULL),(2,'Recibido','2016-09-23 04:52:14','2016-09-23 04:52:14',NULL),(3,'Eliminado','2016-09-23 04:52:14','2016-09-23 04:52:14',NULL);
/*!40000 ALTER TABLE `status_coments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documentos`
--

DROP TABLE IF EXISTS `tipo_documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_documentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `torre_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_documentos_torre_id_foreign` (`torre_id`),
  CONSTRAINT `tipo_documentos_torre_id_foreign` FOREIGN KEY (`torre_id`) REFERENCES `torres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documentos`
--

LOCK TABLES `tipo_documentos` WRITE;
/*!40000 ALTER TABLE `tipo_documentos` DISABLE KEYS */;
INSERT INTO `tipo_documentos` VALUES (1,'Cuentas por cobrar',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(2,'Conciliación bancaria',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(3,'Balance general',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(4,'Cuentas por Pagar',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(5,'Estado de resultados',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(6,'Boletines',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(7,'Proyectos de mejoras',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',1),(8,'documento-1-para-edificio-2',NULL,'2017-01-30 23:53:24','2017-01-31 00:27:58',3);
/*!40000 ALTER TABLE `tipo_documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `torres`
--

DROP TABLE IF EXISTS `torres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `torres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `niveles` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `torre_numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `oficina_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `torres_oficina_id_foreign` (`oficina_id`),
  CONSTRAINT `torres_oficina_id_foreign` FOREIGN KEY (`oficina_id`) REFERENCES `oficinas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torres`
--

LOCK TABLES `torres` WRITE;
/*!40000 ALTER TABLE `torres` DISABLE KEYS */;
INSERT INTO `torres` VALUES (1,'SEAWAVES','Calle 52 Ciudad de Panamá','45','',NULL,'2016-09-23 04:52:14','2016-09-23 04:52:14',2),(2,'torre-test-2','direccion 2','2','2','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(3,'edificio dos (test)','direccion torre 2','80','edif-2',NULL,'2017-01-30 23:52:49','2017-01-30 23:52:49',1);
/*!40000 ALTER TABLE `torres` ENABLE KEYS */;
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
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pasaporte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('propietario','admin','super_admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'propietario',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `observaciones` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'HORI LAL PAL','0106A','0106A@mail.com','390390930','wagagt','seawaves.png','$2y$10$zGWs8JNoXC86c6ch8yvfMuaI3QiizKFUA0H2arGfNIYiviylmCQRW','propietario',1,' $187.67 ',NULL,'AA8Z55YbKFHWQdSkZSuCVcw0c1ybUE9P1p7lWfDNodOzmzDIZRd0QfZOgX3y','2016-05-18 11:00:00','2016-11-10 13:12:25'),(2,'FERNANDO CARLOS VELIZ FERNANDEZ, MARIA MARGARITA MARTIN DE VELIZ','0106B','0106B@mail.com','39309490','w90390940','seawaves.png','$2y$10$O2.TuMc4vz27KTfPnaQ/suVdbGZbgj7.PU7VsrjMzKuqFC4pR7sIa','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-10-22 22:28:51'),(3,'SEAWAVES 6C, S.A.','0106C','0106C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(4,'PROMOTORA CARIBE,S.A.','0106D','0106D@mail.com','399840','a02oiaijd0','seawaves.png','$2y$10$ot8nDwXdHxI3yyDGZzuoK./QcyoghadJPyIlCSNH8RtQr7cXGnl3.','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-10-17 23:23:41'),(5,'RODOLFO ENRIQUE CORONA SALAS ','0107A','0107A@mail.com','987987987','87987987','seawaves.png','$2y$10$lfxAj/9VlMDHLfT8d5mDu.HR2aGxdTyQtE20fzX4tUDTaYQ9w81Wi','propietario',1,' $187.67 ',NULL,'ySVV2LqXdXIRBdrIbrfRGyxv3fqXXjFydx5A6y3d4YoRR8rJiXTuTBxTHhVE','2016-05-18 11:00:00','2016-11-10 13:14:39'),(6,'ALEJANDRA PALACIOS GINNARI','0107B','0107B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,'BrGIzJRYTBkbQwbP8YXTXutf0sURMvuaSEeDiOlhFs04rcj2cVkWt65XTDcz','2016-05-18 11:00:00','2016-10-22 16:51:36'),(7,'OSCAR LAHUERTA ALMAZAN, CELIA LAHUERTA ALMAZAN','0107C','0107C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(8,'JAMES GABRIEL SULTAN','0107D','0107D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(9,'BRIAN ROBERT TECLAW','0108A','0108A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(10,'IMPELARA,S.A.','0108B','0108B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(11,'MARTA GUILLEN DE ROIG, RAMON ORLANDO ROIG DUMONT','0108C','0108C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(12,'HECTOR GALASO','0108D','0108D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(13,'ROBERTO JACINTO CHOCKEE LOPEZ','0109A','0109A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(14,'OSCAR LAHUERTA ALMAZAN','0109B','0109B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(15,'GAETANO CURIA','0109C','0109C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(16,'GAETANO CURIA','0109D','0109D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(17,'RAMSES FRANCIS VEGA MURILLO, FATIMA LISSET BEITIA ARAUZ','0110A','0110A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(18,'MARIANELLA JOSEFINA BETANCOURT DE RUIZ ','0110B','0110B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(19,'LUIS ALFREDO NAVAS GARCIA','0110C','0110C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(20,'VICTORIA KOUZNETSOVA','0110D','0110D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(21,'EDUARDO ALBERTO HUN TAM','0111A','0111A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(22,'KENTEL PATEL','0111B','0111B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(23,'CELIA LAHUERTA ALMAZAN','0111C','0111C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(24,'JAMES GABRIEL SULTAN','0111D','0111D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(25,'ALFONSO VICTORIA GOMEZ','0112A','0112A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(26,'BENJAMIN FRANKLIN BONFANTI','0112B','0112B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(27,'SEAWAVES PANAMA, CORP.','0112C','0112C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(28,'ALEXEY FIMANOV','0112D','0112D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(29,'CAMILO ANDRES PINILLA DAZA, DILSA LORENA CRUZ SAAVEDRA','0113A','0113A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(30,'SW RENTAL, S.A.','0113B','0113B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(31,'SEAWEAVES 13C, S.A.','0113C','0113C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(32,'CCB TRUST CORP','0113D','0113D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(33,'SW RENTALS, S.A.','0114A','0114A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(34,'RAUL CHANG RIVAS','0114B','0114B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(35,'SILCRIS,S.A.','0114C','0114C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(36,'SEAWAVES 14D, S.A.,','0114D','0114D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(37,'ARCOS DE AGUA S.A.','0115A','0115A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(38,'16 WAVES ,S.A.','0115B','creativo.hosannaweb@gmail.com','090939983','wagagt','seawaves.png','$2y$10$ahMHGQ0LSFduZaEGrzvKtu.aT6gv7a3wAHV1aTF3xxE8mIUWdiXHy','propietario',1,' $194.90 ',NULL,'np5R9QFUM8zgR7muLd4Zqp5ZwywTlHkQTiPFNde79xFh5zqYYpvrvbXfvwVL','2016-05-18 11:00:00','2017-01-30 23:03:51'),(39,'INVERSIONES EL ANCLA PANAMA, S.A.','0115C','0115C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $164.66 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(40,'JORGE LUIS LOPEZ PEREZ','0115D','0115D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $163.56 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(41,'PROMOTORA CARIBE, S.A.','0116A','0116A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(42,'CHEN PROPERTY, INC.,','0116B','0116B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.90 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(43,'SEAWAVES 16C,S.A.','0116C','0116C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $164.66 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(44,'GABRIELA ANGELINA ULLOA VALDES','0116D','0116D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $163.56 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(45,'MEITNER GONZALEZ CAZORLA','0117A','0117A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(46,'OSCAR LAHUERTA ALMAZAN, CELIA LAHUERTA ALMANZAN','0117B','0117B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.90 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(47,'VALERIA ROSALES PADILLA','0117C','0117C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $164.66 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(48,'ENRICO GUIDI','0117D','0117D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(49,'OSCAR LAHUERTA ALMAZAN, CELIA LAHUERTA ALMAZAN','0118A','0118A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(50,'SHI LU CHEN, KATIA CHEN ZHENG','0118B','0118B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(51,'DESIREE DE LA ESPIRELLA','0118C','0118C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(52,'INDIRA ODILIA RICHARDS RUIZ, VERNE GILMORE RICHARDS HEWITT','0118D','0118D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(53,'THE SEAWAVES 19A CORP.','0119A','0119A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(54,'THE SEAWAVES 19.B CORP.','0119B','0119B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(55,'SIMA SW,S.A','0119C','0119C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(56,'FUNDACION LOS CANEYES','0119D','0119D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(57,'VALDIR ALFONSO MONTUFAR BARRERA','0120A','0120A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(58,'MARIA DE LA LUZ LEAL QUINTANILLA, ROLANDO GABRIEL ABREGO BAL','0120B','0120B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(59,'EDWIN ABDIEL CEDEÑO VILLARREAL','0120C','0120C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(60,'ANA MAE DELGADO ALVARADO','0120D','0120D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(61,'WAVES 21,A., S.A.','0121A','0121A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(62,'JOSE ANTONIO LORENZO PALMA, GABRIELA ELISA APARICIO OSES','0121B','0121B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(63,'SINAN OKUR','0121C','0121C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(64,'QIN HONG SUN, MEIXIAN ZHANG','0121D','0121D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(65,'FUNDACION TORRIMAE','0122A','0122A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(66,'THE SEAWAVES 22B CORP.','0122B','0122B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(67,'PROMOTORA CARIBE,S.A.','0122C','0122C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(68,'RAFAEL GUARISMA AGUILAR','0122D','0122D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(69,'ROFUER FOUNDATION.','0123A','0123A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(70,'PROMOTORA CARIBE, S.A.','0123B','0123B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(71,'ESTEBAN SEBASTIAN GARCIA., MARINA PAULA JUANES','0123C','0123C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(72,'MARCO ANTONIO BARREIRO CONTIN','0123D','0123D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(73,'GILDA MIRELLA MARTINEZ DE DE LA GUARDIA','0124A','0124A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(74,'SW RENTAL, S.A.','0124B','0124B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.90 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(75,'ROBERTO BENI AYERBE, LAURA ESTEBAN AGUDO','0124C','0124C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $153.27 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(76,'ANDREA DE RISI','0124D','0124D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $167.45 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(77,'GERMAN IGNACIO TORRES, ZORAIDA RODRIGUEZ DE TORRES','0125A','0125A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(78,'HENRICUS PETRUS JOHANNES MARIA LEIJTEN, GLADYS HURTADO MUÑOZ','0125B','0125B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.90 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(79,'OLAS 25 C, S.A.','0125C','0125C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $153.27 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(80,'THE SEAWAVES 25D,S.A','0125D','0125D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $167.45 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(81,'MARICEL GARRIDO DE VARGAS, PASCUAL BARBARO VARGAS VILLAR','0126A','0126A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(82,'GABRIELA ALEGRE PANAY','0126B','0126B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $194.90 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(83,'PANSEA, INC.','0126C','0126C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(84,'DANIEL ESTEBAN MENDOZA, JOHANNA MARIA HERRERA MARINO','0126D','0126D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(85,'OSCAR RONALDO LEON OLIVA','0127A','0127A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(86,'LADY BIVIANA EUSSE TANGARIFE','0127B','0127B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(87,'PATEL MOHANBHAI JERAM, AMAR MOHANBHAI PATEL','0127C','0127C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(88,'FUNDACION MIGFRE2009','0127D','0127D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(89,'MARIA LUCIA AMEGLIO VELASQUEZ','0128A','0128A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(90,'BETSY CRITINA VAN PRAAG BRACHO','0128B','0128B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(91,'AGUSTIN LISANDRO LOPEZ TORRES','0128C','0128C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(92,'OMAIRA MICHELLE RODRIGUEZ DORATI, ROBERTO GONZALEZ JIMENEZ','0128D','0128D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(93,'EDGARDO GALARZA ALTAMIRANDA, LUCIA MARGARITA RUSSO DE GALARZA','0129A','0129A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(94,'DIPAKKUMAR RAMANLAL PATEL','0129B','0129B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(95,'JONATHAN JONES','0129C','0129C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(96,'ASIANATLANTIC INVESTMENTS, CORP.','0129D','0129D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(97,'FUNDACION LAXMI NARAYANA','0130A','0130A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(98,'ECO CORPORATION.','0130B','0130B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(99,'BLANCA NIEVES FLAMMIA','0130C','0130C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(100,'FUNDACION EL NIÑO SANTO DE MAHOU','0130D','0130D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(101,'SEAWAVES 31A,S.A.','0131A','0131A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(102,'SW RENTAL, S.A.','0131B','0131B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(103,'KRYZA III, CORP.','0131C','0131C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(104,'ANDIN CORP.,','0131D','0131D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(105,'OSCAR LAHUERTA ALMAZAN, CELIA LAHUERTA ALMAZAN','0132A','0132A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.09 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(106,'THE SEAWAVES 32B, CORP.','0132B','0132B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.76 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(107,'YAZMINA ELVIRA ESCOBAR DAVID','0132C','0132C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $154.04 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(108,'ALICIA HAYDEE NAVEYRA','0132D','0132D@mail.com','654646884','4654646546','seawaves.png','$2y$10$aDPhwv5vlQB3ZqjEi1ix5.cJI0.kAuDJKF8hpzbrRML8r3tMTcaRi','propietario',1,' $145.58 ',NULL,'fXo5hWUe5JQgkMfNn1PztMWwGwgRKgO3VCygjSIHvuyWtFKsZjU5ziHHMukA','2016-05-18 11:00:00','2016-10-17 16:06:02'),(109,'MANUEL HABDUL APOLAYO ALVARENGA','0133A','0133A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.09 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(110,'EDGAR SANTIAGO PUJOL, CARMEN CECILIA FUENTES MONTENEGRO DE SANTIAGO','0133B','0133B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.76 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(111,'KARINA GONZALEZ CAMAÑO','0133C','0133C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $154.04 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(112,'ALEJANDRO DE LA ROSA OCAÑA','0133D','0133D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $145.58 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(113,'CCB TRUST CORP','0134A','0134A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.09 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(114,'SEAWAVES, 34 B, S.A.','0134B','0134B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(115,'LASIKO INTERNATIONAL S.A.','0134C','0134C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(116,'OLAS 34D, S.A.','0134D','0134D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(117,'SEAWAVES 35A, S.A.','0135A','0135A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(118,'SEAWAVES 35B,S.A.','0135B','0135B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(119,'EH INTERNATIONAL FOUNDATION.','0135C','0135C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(120,'SW SEABIRD, S.A.','0135D','0135D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(121,'SEAWAVES 36A,S.A.','0136A','0136A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(122,'SEAWAVES 36B,S.A.','0136B','0136B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(123,'ANDREA MENEGATI., GLOBAL VILLAGE FOUNDATION','0136C','0136C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(124,'OLAS 36 D,S.A.','0136D','0136D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(125,'SEAWAVES 37A,S.A.','0137A','0137A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(126,'LORNA ELIZABETH JENKINS SANCHEZ','0137B','0137B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(127,'SW SEAMOON, S.A.','0137C','0137C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(128,'SW SEARAY, S.A.','0137D','0137D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(129,'GLOBAL FINANCIAL FUNDS CORP.','0138A','0138A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(130,'MARCO ANTONIO BATISTA FERNANDEZ, MARIA JOSE LEAL DE BATISTA','0138B','0138B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(131,'INVERSIONES CATEVE S.A.','0138C','0138C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(132,'FUNDACION CAMINO DE CRUCES','0138D','0138D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(133,'PROMOTORA CARIBE, S.A.','0139A','0139A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(134,'RAFAEL GONZALEZ FERNANDEZ PACHECO','0139B','0139B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(135,'HABITACULOS ,DISEÑO & ARQUITECTURA,S.A.','0139C','0139C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(136,'JONATHAN JONES','0139D','0139D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(137,'THE SEAWAVES 40A,CORP.','0140A','0140A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $187.67 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(138,'PRAVIN RAMBHAI PATEL','0140B','0140B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $188.22 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(139,'HAYDEE CASTRO VALDES','0140C','0140C@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(140,'OSCAR LAHUERTA ALMANZAN, CELIA LAHUERTA ALMANZAN','0140D','0140D@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $150.84 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(141,'PROMOTORA CARIBE,S.A.','0141A','0141A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $185.46 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(142,'VINCENZO MAZZONE','0141B','0141B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $154.73 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(143,'CARLOS ALBERTO SUAREZ PULIDO, MARTHA LUCIA MARTAN ESTRADA','0142A','0142A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $205.85 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(144,'PANAMA RICA, S.A.','0142B','0142B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $168.98 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(145,'CAPITAL TRUST & FINANCE, INC.','0143A','0143A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $205.85 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(146,'ARTURO ROGELIO HENDRICKS CHAVANNES','0143B','0143B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $168.98 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(147,'CELLARIS INTERNATIONAL.','0144A','0144A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $205.85 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(148,'JOSEPH KOCEVAR','0144B','0144B@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $168.98 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(149,'FRANCESCO RAGONA','0145A','0145A@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $205.85 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(150,'HEDY SANDRA GRIMALDO ARENAS, LUIS FERNANDO ESPARZA GRIMALDO','0145B','0145B@mail.com','654654651651','654651651651','seawaves.png','$2y$10$HLHp/D9oBl.RxQaCv6LfveZSewwXsWoKyuIgstQdw69UNfdzib4e.','propietario',1,' $168.98 ',NULL,NULL,'2016-05-18 11:00:00','2016-11-10 13:14:28'),(151,'none','01L1','01L1@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $351.53 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(152,'none','01L2','01L2@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $341.85 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(153,'none','01L3','01L3@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $341.85 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(154,'none','01L4','01L4@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $341.85 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(155,'none','01L5','01L5@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $341.85 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(156,'none','01L6','01L6@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $341.85 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(157,'none','01L7','01L7@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $277.35 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(158,'none','01L8','01L8@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $277.35 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(159,'none','01L9','01L9@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $334.28 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(160,'none','01L10','01L10@mail.com','','','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,' $370.18 ',NULL,NULL,'2016-05-18 11:00:00','2016-05-18 11:00:00'),(161,'Wilver Gonzalez','wagagt','wagagt@gmail.com','2757 70419 0101','a-1 881712','default.jpg','$2y$10$i4kN0m/AzIVZfjHrm.jyUOjmKDBSpLd4q3l..8DhiLR2CgreiDWru','admin',1,'',NULL,'2fXcWQK1HM1heoDn0oGd2u0Vf6dsgGBmLPokCkuXf3c5vnzOKmLgXOYv8IfB','0000-00-00 00:00:00','2017-02-28 00:48:18'),(162,'Axel Sarceño','axelsarce','axel.sarceno@hosannaweb.com','2546 09139 0101','a-1 1024861','default.jpg','$2y$10$L4KgKq8ePJOypL3k9ioIyutrSnKZMwBnQwIkJXXw7Q1uni8i.Loqm','admin',1,'',NULL,'6BKJx0B7ZdgxIR13ivl6qJRqbRQXcJRMAFDQMI3QHaFbwuaE9OE43If8XhsY','0000-00-00 00:00:00','2016-10-22 22:25:35'),(163,'Adolfo Arreaga','wagagt2','wagagt@hotmail.com','2546 09139 0101','a-1 1024861','seawaves.png','$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi','propietario',1,'',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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

-- Dump completed on 2017-03-08  3:28:19
