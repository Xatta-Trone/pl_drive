-- MySQL dump 10.13  Distrib 5.6.38, for Linux (x86_64)
--
-- Host: localhost    Database: shoptors_xt
-- ------------------------------------------------------
-- Server version 5.6.38

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
-- Table structure for table `table_activity`
--

DROP TABLE IF EXISTS `table_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `activity` int(11) NOT NULL,
  `pdfId` int(11) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_activity`
--

LOCK TABLES `table_activity` WRITE;
/*!40000 ALTER TABLE `table_activity` DISABLE KEYS */;
INSERT INTO `table_activity` (`id`, `userId`, `activity`, `pdfId`, `dateTime`) VALUES (1,2,1,1,'2017-11-18 12:53:00'),(2,2,2,1,'2017-11-18 12:53:20'),(3,3,1,4,'2017-11-18 12:56:30'),(4,3,1,1,'2017-11-18 12:57:36'),(5,3,1,4,'2017-11-18 13:00:43'),(6,3,1,4,'2017-11-18 13:00:54'),(7,3,1,4,'2017-11-18 13:02:21'),(8,0,1,1,'2017-11-18 13:13:20'),(9,0,1,1,'2017-11-18 13:13:48'),(10,4,1,2,'2017-11-18 13:15:57'),(11,4,2,2,'2017-11-18 13:16:14'),(12,4,3,2,'2017-11-18 13:16:20'),(13,4,4,2,'2017-11-18 13:16:24'),(14,4,3,2,'2017-11-18 13:16:27'),(15,4,5,2,'2017-11-18 13:16:35'),(16,4,4,2,'2017-11-18 13:16:38'),(17,4,3,2,'2017-11-18 13:16:41'),(18,4,4,2,'2017-11-18 13:16:49'),(19,4,3,2,'2017-11-18 13:16:55'),(20,4,4,2,'2017-11-18 13:17:02'),(21,3,1,1,'2017-11-18 13:19:12'),(22,3,3,1,'2017-11-18 13:19:17'),(23,0,1,1,'2017-11-18 13:21:20'),(24,0,1,2,'2017-11-18 13:25:42'),(25,0,1,3,'2017-11-18 13:25:43'),(26,2,1,2,'2017-11-18 13:32:32'),(27,5,1,3,'2017-11-18 13:33:41'),(28,5,2,3,'2017-11-18 13:33:54'),(29,2,1,4,'2017-11-18 13:37:06');
/*!40000 ALTER TABLE `table_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_contact`
--

DROP TABLE IF EXISTS `table_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_contact`
--

LOCK TABLES `table_contact` WRITE;
/*!40000 ALTER TABLE `table_contact` DISABLE KEYS */;
INSERT INTO `table_contact` (`id`, `name`, `email`, `message`, `seen`, `time`) VALUES (1,'XattaTrrone','xatta.trrone@gmail.com','scascascscscd','1','2017-11-18 12:44:22');
/*!40000 ALTER TABLE `table_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_dislike`
--

DROP TABLE IF EXISTS `table_dislike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_dislike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdfId` int(111) NOT NULL,
  `userId` int(111) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_dislike`
--

LOCK TABLES `table_dislike` WRITE;
/*!40000 ALTER TABLE `table_dislike` DISABLE KEYS */;
INSERT INTO `table_dislike` (`id`, `pdfId`, `userId`, `time`) VALUES (4,2,4,'2017-11-18 13:17:02');
/*!40000 ALTER TABLE `table_dislike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_download`
--

DROP TABLE IF EXISTS `table_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdfId` int(111) NOT NULL,
  `userId` int(111) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_download`
--

LOCK TABLES `table_download` WRITE;
/*!40000 ALTER TABLE `table_download` DISABLE KEYS */;
INSERT INTO `table_download` (`id`, `pdfId`, `userId`, `time`) VALUES (1,1,2,'2017-11-18 12:53:20'),(2,2,4,'2017-11-18 13:16:14'),(3,3,5,'2017-11-18 13:33:54');
/*!40000 ALTER TABLE `table_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_like`
--

DROP TABLE IF EXISTS `table_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdfId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_like`
--

LOCK TABLES `table_like` WRITE;
/*!40000 ALTER TABLE `table_like` DISABLE KEYS */;
INSERT INTO `table_like` (`id`, `pdfId`, `userId`, `time`) VALUES (5,1,3,'2017-11-18 13:19:17');
/*!40000 ALTER TABLE `table_like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_love`
--

DROP TABLE IF EXISTS `table_love`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_love` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdfId` int(111) NOT NULL,
  `userId` int(111) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_love`
--

LOCK TABLES `table_love` WRITE;
/*!40000 ALTER TABLE `table_love` DISABLE KEYS */;
INSERT INTO `table_love` (`id`, `pdfId`, `userId`, `time`) VALUES (1,2,4,'2017-11-18 13:16:35');
/*!40000 ALTER TABLE `table_love` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_newsletter`
--

DROP TABLE IF EXISTS `table_newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_newsletter`
--

LOCK TABLES `table_newsletter` WRITE;
/*!40000 ALTER TABLE `table_newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_pdf`
--

DROP TABLE IF EXISTS `table_pdf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdfName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdfCategory` int(11) NOT NULL,
  `pdfImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdfDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploader` int(10) NOT NULL,
  `uploadTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `download` int(100) NOT NULL DEFAULT '0',
  `view` int(111) DEFAULT '0',
  `likes` int(111) NOT NULL DEFAULT '0',
  `dislikes` int(111) DEFAULT '0',
  `love` int(111) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_pdf`
--

LOCK TABLES `table_pdf` WRITE;
/*!40000 ALTER TABLE `table_pdf` DISABLE KEYS */;
INSERT INTO `table_pdf` (`id`, `pdfName`, `pdfCategory`, `pdfImage`, `pdfDescription`, `uploader`, `uploadTime`, `download`, `view`, `likes`, `dislikes`, `love`) VALUES (1,'pdf 1',1,'03dd680c23.jpg','PDF Description',2,'2017-11-18 12:52:51',1,6,1,0,0),(2,'pdf 2',2,'86db8c14c3.jpg','PDF description',2,'2017-11-18 12:53:51',1,3,0,1,1),(3,'pdf 3',3,'b1112214d3.jpg','pdf 3',2,'2017-11-18 12:54:15',1,2,0,0,0),(4,'pdf4',3,'20aa35aeb6.jpg','pdf 4',2,'2017-11-18 12:55:11',0,5,0,0,0);
/*!40000 ALTER TABLE `table_pdf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_subject`
--

DROP TABLE IF EXISTS `table_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subCode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_subject`
--

LOCK TABLES `table_subject` WRITE;
/*!40000 ALTER TABLE `table_subject` DISABLE KEYS */;
INSERT INTO `table_subject` (`id`, `subName`, `subCode`) VALUES (1,'Subject 1','S01'),(2,'Subject 2','S02'),(3,'Subject 3','S03'),(4,'Subject 4','s04');
/*!40000 ALTER TABLE `table_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_viewedby`
--

DROP TABLE IF EXISTS `table_viewedby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_viewedby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `pdfId` int(11) NOT NULL,
  `viewTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_viewedby`
--

LOCK TABLES `table_viewedby` WRITE;
/*!40000 ALTER TABLE `table_viewedby` DISABLE KEYS */;
INSERT INTO `table_viewedby` (`id`, `userId`, `pdfId`, `viewTime`) VALUES (1,2,1,'2017-11-18 12:53:00'),(2,3,4,'2017-11-18 12:56:31'),(3,3,1,'2017-11-18 12:57:36'),(4,3,4,'2017-11-18 13:00:43'),(5,3,4,'2017-11-18 13:00:54'),(6,3,4,'2017-11-18 13:02:21'),(7,0,1,'2017-11-18 13:13:20'),(8,0,1,'2017-11-18 13:13:48'),(9,4,2,'2017-11-18 13:15:57'),(10,3,1,'2017-11-18 13:19:12'),(11,0,1,'2017-11-18 13:21:20'),(12,0,2,'2017-11-18 13:25:42'),(13,0,3,'2017-11-18 13:25:43'),(14,2,2,'2017-11-18 13:32:32'),(15,5,3,'2017-11-18 13:33:41'),(16,2,4,'2017-11-18 13:37:06');
/*!40000 ALTER TABLE `table_viewedby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_list`
--

DROP TABLE IF EXISTS `user_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(7) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_list`
--

LOCK TABLES `user_list` WRITE;
/*!40000 ALTER TABLE `user_list` DISABLE KEYS */;
INSERT INTO `user_list` (`id`, `studentId`, `name`, `email`, `password`, `isAdmin`, `joinDate`) VALUES (1,1404000,'admin','admin@admin.com','21232f297a57a5a743894a0e4a801fc3',1,'2017-11-18 12:38:26'),(2,1404143,'Hasibul rahman','hasibr@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',1,'2017-11-18 12:42:15'),(3,1404131,'AB','ab@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',0,'2017-11-18 12:56:15'),(4,1404140,'Mehedi','mehedi@gmail.com','a7fb67869ea1cde2f0a813198dac8ae2',0,'2017-11-18 13:15:11'),(5,1404200,'sabina','sabina@gmail.com','2f4158193931d49422753a02c9a7a56e',0,'2017-11-18 13:31:58');
/*!40000 ALTER TABLE `user_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'shoptors_xt'
--

--
-- Dumping routines for database 'shoptors_xt'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-18 13:47:52
