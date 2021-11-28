-- MySQL dump 10.19  Distrib 10.3.31-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: crt-symfony-2
-- ------------------------------------------------------
-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animal_classes`
--

DROP TABLE IF EXISTS `animal_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animal_classes` (
                                  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                                  `name` mediumtext NOT NULL COMMENT 'название класса животных',
                                  `can_flying` tinyint(1) DEFAULT '0' COMMENT 'признак — бывают ли среди них те, кто может летать',
                                  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal_classes`
--

LOCK TABLES `animal_classes` WRITE;
/*!40000 ALTER TABLE `animal_classes` DISABLE KEYS */;
INSERT INTO `animal_classes` VALUES (1,'рыбы',0),(2,'земноводные',0),(3,'птицы',1),(4,'рептилии',0),(5,'млекопитающие',0);
/*!40000 ALTER TABLE `animal_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animals` (
                           `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                           `name` mediumtext NOT NULL COMMENT 'название животного',
                           `can_flying` tinyint(1) DEFAULT '0' COMMENT 'признак — умеют ли летать',
                           `legs_count` int(2) unsigned DEFAULT NULL COMMENT 'количество лап',
                           `class_id` int(10) unsigned DEFAULT NULL COMMENT 'ID класса животного',
                           PRIMARY KEY (`id`),
                           KEY `animals_animal_classes_id_fk` (`class_id`),
                           CONSTRAINT `animals_animal_classes_id_fk` FOREIGN KEY (`class_id`) REFERENCES `animal_classes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` VALUES (1,'грач',1,2,3),(2,'кобра',0,0,4),(3,'осетр',0,0,1),(4,'медведь',0,4,5);
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
                          `id` int(10) NOT NULL AUTO_INCREMENT,
                          `name` varchar(255) NOT NULL COMMENT 'название города',
                          `founded_at` datetime DEFAULT NULL COMMENT 'дата основания города',
                          `country_id` int(10) NOT NULL COMMENT 'ID страны, в  которой находится этот город',
                          PRIMARY KEY (`id`),
                          KEY `cities_countries_id_fk` (`country_id`),
                          CONSTRAINT `cities_countries_id_fk` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Москва','1147-11-27 18:11:34',1),(2,'Минск',NULL,2),(3,'Хельсинки','1550-06-12 18:13:50',3);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
                             `id` int(10) NOT NULL AUTO_INCREMENT,
                             `name` mediumtext NOT NULL COMMENT 'название страны',
                             `code` varchar(3) NOT NULL COMMENT 'символьный код страны ISO 3166-1',
                             PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Россия','RUS'),(2,'Белоруссия','BLR'),(3,'Финляндия','FIN');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
