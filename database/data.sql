-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: institute
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `action_items`
--

DROP TABLE IF EXISTS `action_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_items` (
  `id` int(11) NOT NULL DEFAULT '0',
  `action` text,
  `strategy_id` int(11) DEFAULT NULL,
  `scorecard_id` int(11) DEFAULT NULL,
  `who` int(11) DEFAULT NULL,
  `when` date DEFAULT NULL,
  `status_type` int(11) DEFAULT NULL,
  `comments` text,
  `category_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `strategy_id_idx` (`strategy_id`),
  KEY `scorecard_id_idx` (`scorecard_id`),
  KEY `who_idxfk` (`who`),
  KEY `status_type_idxfk` (`status_type`),
  KEY `category_id_idx` (`category_id`),
  CONSTRAINT `action_items_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`),
  CONSTRAINT `action_items_ibfk_2` FOREIGN KEY (`scorecard_id`) REFERENCES `scorecard` (`id`),
  CONSTRAINT `action_items_ibfk_3` FOREIGN KEY (`who`) REFERENCES `user` (`id`),
  CONSTRAINT `action_items_ibfk_4` FOREIGN KEY (`status_type`) REFERENCES `status_type` (`id`),
  CONSTRAINT `action_items_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_items`
--

LOCK TABLES `action_items` WRITE;
/*!40000 ALTER TABLE `action_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address_1` text,
  `city` text,
  `state` text,
  `zip_code` text,
  `country` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (2,'15545 Quickert Rd','Saratoga','California','95070','USA'),(3,'2481 Leghorn St','Mountain View','California','94043','USA');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_type`
--

DROP TABLE IF EXISTS `category_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_type` (
  `id` int(11) NOT NULL DEFAULT '0',
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `value` (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_type`
--

LOCK TABLES `category_type` WRITE;
/*!40000 ALTER TABLE `category_type` DISABLE KEYS */;
INSERT INTO `category_type` VALUES (5,'Partnering'),(7,'People'),(8,'Place'),(9,'Planning'),(3,'Positioning'),(4,'Presence'),(6,'Process'),(2,'Product'),(10,'Profit'),(1,'Purpose');
/*!40000 ALTER TABLE `category_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `address_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `address_id_idxfk` (`address_id`),
  CONSTRAINT `company_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (2,'The Institute For Innovation, Integration and Impact',2),(3,'Abundant Life Christian Fellowship',3);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_industry_assn`
--

DROP TABLE IF EXISTS `company_industry_assn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_industry_assn` (
  `company_id` int(11) NOT NULL,
  `industry_id` int(11) NOT NULL,
  KEY `company_id_idxfk` (`company_id`),
  KEY `industry_id_idxfk` (`industry_id`),
  CONSTRAINT `company_industry_assn_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `company_industry_assn_ibfk_2` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_industry_assn`
--

LOCK TABLES `company_industry_assn` WRITE;
/*!40000 ALTER TABLE `company_industry_assn` DISABLE KEYS */;
INSERT INTO `company_industry_assn` VALUES (2,7),(2,15),(3,7),(3,18),(3,7),(3,18);
/*!40000 ALTER TABLE `company_industry_assn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_user_assn`
--

DROP TABLE IF EXISTS `company_user_assn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_user_assn` (
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `company_id_idxfk_2` (`company_id`),
  KEY `user_id_idxfk_2` (`user_id`),
  CONSTRAINT `company_user_assn_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `company_user_assn_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_user_assn`
--

LOCK TABLES `company_user_assn` WRITE;
/*!40000 ALTER TABLE `company_user_assn` DISABLE KEYS */;
INSERT INTO `company_user_assn` VALUES (2,1),(2,2),(3,1);
/*!40000 ALTER TABLE `company_user_assn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giants`
--

DROP TABLE IF EXISTS `giants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `giants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `giant` text,
  `country` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giants`
--

LOCK TABLES `giants` WRITE;
/*!40000 ALTER TABLE `giants` DISABLE KEYS */;
/*!40000 ALTER TABLE `giants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industry`
--

DROP TABLE IF EXISTS `industry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(514) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industry`
--

LOCK TABLES `industry` WRITE;
/*!40000 ALTER TABLE `industry` DISABLE KEYS */;
INSERT INTO `industry` VALUES (1,'Agriculture'),(2,'forestry and fishing'),(3,'Arts'),(4,'sports and recreation'),(5,'Catering and accommodation'),(6,'Construction'),(7,'Education'),(8,'Health and social care services'),(9,'IT and telecommunications services'),(10,'Manufacturing'),(11,'Media and creative services'),(12,'Mining'),(13,'energy and utilities'),(14,'Personal services'),(15,'Professional and business services'),(16,'Retail'),(17,'Wholesale'),(18,'Human Resources');
/*!40000 ALTER TABLE `industry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kingdom_business_assessment`
--

DROP TABLE IF EXISTS `kingdom_business_assessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kingdom_business_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `resource_status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `company_id_idxfk_4` (`company_id`),
  KEY `resource_id_idxfk_3` (`resource_id`),
  KEY `user_id_idxfk_4` (`user_id`),
  KEY `resource_status_id_idxfk_1` (`resource_status_id`),
  CONSTRAINT `kingdom_business_assessment_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `kingdom_business_assessment_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`),
  CONSTRAINT `kingdom_business_assessment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `kingdom_business_assessment_ibfk_4` FOREIGN KEY (`resource_status_id`) REFERENCES `resource_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kingdom_business_assessment`
--

LOCK TABLES `kingdom_business_assessment` WRITE;
/*!40000 ALTER TABLE `kingdom_business_assessment` DISABLE KEYS */;
INSERT INTO `kingdom_business_assessment` VALUES (1,2,4,1,2),(2,NULL,4,3,1),(5,2,4,2,1),(6,NULL,4,5,1),(7,NULL,4,4,1);
/*!40000 ALTER TABLE `kingdom_business_assessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kingdom_business_questions`
--

DROP TABLE IF EXISTS `kingdom_business_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kingdom_business_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) DEFAULT NULL,
  `text` varchar(514) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `category_id_idxfk_2` (`category_id`),
  CONSTRAINT `kingdom_business_questions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kingdom_business_questions`
--

LOCK TABLES `kingdom_business_questions` WRITE;
/*!40000 ALTER TABLE `kingdom_business_questions` DISABLE KEYS */;
INSERT INTO `kingdom_business_questions` VALUES (1,1,'The purpose of our business leads to the expansion of the Kingdom of God.',1),(2,2,'We have invited God to be the CEO.',1),(3,3,'We are conscious of the fact that we are in God\'s business (vs. God being in our business).',1),(4,4,'We view ourselves as being owned by God.',1),(5,5,'Our products/services address needs that God cares about.',2),(6,6,'We invite God into our product/service development processes.',2),(7,7,'We have products/services in our portfolio that have been inspired by God.',2),(8,8,'We prune our products and services to remove those that do not bear eternal /lasting fruit.',2),(9,9,'Our leaders are secure in their positioning in Christ.',3),(10,10,'We have positioned the company/organization for God\'s blessing.',3),(11,11,'We have discovered our unique corporate calling.',3),(12,12,'Our positioning reinforces our unique corporate calling.',3),(13,13,'We have made the connection between God\'s presence and marketing.',4),(14,14,'Our marketing is redemptive, appealing to the best in our target audience.',4),(15,15,'God\'s presence in our business is positively impacting our stakeholders.',4),(16,16,'Our business experiences miracles.',4),(17,17,'We invite God\'s counsel before selecting our partners.',5),(18,18,'We are discipling our partners.',5),(19,19,'We are partnering honorably--keeping our word, contracts.',5),(20,20,'Our foundational partnerships--between spouses, and us and God--are healthy.',5),(21,21,'Our processes reflect the order of God.',6),(22,22,'We deliberately include God in our decision-making.',6),(23,23,'Our processes do not exploit others, including the poor or disadvantaged.',6),(24,24,'Our process leave room for faith.',6),(25,25,'Our business operates as a Biblical household.',7),(26,26,'People are discovering their callings in our place of work.',7),(27,27,'Our staff are experiencing Convergence at work.',7),(28,28,'We have a team (plurality) of honor-giving servant leaders.',7),(29,29,'We treat every inch of our place as God\'s.',8),(30,30,'We have designed Place as the first expression of God\'s character that our stakeholders see.',8),(31,31,'We practice Biblical hospitality in our place(s) of work.',8),(32,32,'Our Place reveals a deliberate attempt to reflect our Purpose.',8),(33,33,'We plan for each facet of the business based on Biblical concepts.',9),(34,34,'We value obedience to God over following through on our plans',9),(35,35,'We integrate realism and faith by building \"faith gaps\" into our business plans that only God can fill..',9),(36,36,'We evaluate risks to determine whether they are God-given or man-induced.',9),(37,37,'We delineate the management of capital and working capital.',10),(38,38,'We measure success in terms of what we make and what we flow through.',10),(39,39,'We are attempting to \"store up treasure in heaven\" through our making and stewardship of resources.',10),(40,40,'We have a culture of generosity that outstrips tithing.',10);
/*!40000 ALTER TABLE `kingdom_business_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kingdom_business_results`
--

DROP TABLE IF EXISTS `kingdom_business_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kingdom_business_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `assessment_id` int(11) DEFAULT NULL,
  `performance` int(11) DEFAULT NULL,
  `importance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `question_id_idxfk_1` (`question_id`),
  KEY `assessment_id_idxfk_1` (`assessment_id`),
  CONSTRAINT `kingdom_business_results_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `kingdom_business_questions` (`id`),
  CONSTRAINT `kingdom_business_results_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `kingdom_business_assessment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kingdom_business_results`
--

LOCK TABLES `kingdom_business_results` WRITE;
/*!40000 ALTER TABLE `kingdom_business_results` DISABLE KEYS */;
INSERT INTO `kingdom_business_results` VALUES (202,1,1,6,7),(203,2,1,5,7),(204,3,1,3,7),(205,4,1,5,7),(206,5,1,5,7),(207,6,1,3,4),(208,7,1,2,1),(209,8,1,6,4),(210,9,1,6,6),(211,10,1,3,3),(212,11,1,5,3),(213,12,1,1,1),(214,13,1,3,5),(215,14,1,1,3),(216,15,1,5,5),(217,16,1,5,5),(218,17,1,5,3),(219,18,1,3,5),(220,19,1,2,5),(221,20,1,1,2),(222,21,1,1,3),(223,22,1,1,3),(224,23,1,1,5),(225,24,1,5,6),(226,25,1,4,6),(227,26,1,3,4),(228,27,1,2,2),(229,28,1,4,1),(230,29,1,6,5),(231,30,1,6,6),(232,31,1,5,6),(233,32,1,4,4),(234,33,1,4,4),(235,34,1,3,3),(236,35,1,5,1),(237,36,1,3,3),(238,37,1,1,4),(239,38,1,1,4),(240,39,1,1,1),(241,40,1,1,1);
/*!40000 ALTER TABLE `kingdom_business_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kpis`
--

DROP TABLE IF EXISTS `kpis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kpis` (
  `id` int(11) NOT NULL DEFAULT '0',
  `strategy_id` int(11) DEFAULT NULL,
  `scorecard_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `kpi` text,
  PRIMARY KEY (`id`),
  KEY `strategy_id_idxfk_2` (`strategy_id`),
  KEY `scorecard_id_idxfk_1` (`scorecard_id`),
  CONSTRAINT `kpis_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`),
  CONSTRAINT `kpis_ibfk_2` FOREIGN KEY (`scorecard_id`) REFERENCES `scorecard` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kpis`
--

LOCK TABLES `kpis` WRITE;
/*!40000 ALTER TABLE `kpis` DISABLE KEYS */;
/*!40000 ALTER TABLE `kpis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `username` text,
  `password` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `role_id_idxfk` (`role_id`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('gseeto','gseeto',1,1),('lwidjaja','lwidjaja',2,2),('bjohnson','bjohnson',3,1),('lwidjaja','lwidjaja',4,2),('lwidjaja','lwidjaja',5,2),('linhly','linhly',6,4),('dandrews','dandrews',7,2),('ljohnson','ljohnson',8,4);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource`
--

DROP TABLE IF EXISTS `resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource`
--

LOCK TABLES `resource` WRITE;
/*!40000 ALTER TABLE `resource` DISABLE KEYS */;
INSERT INTO `resource` VALUES (1,'Scorecard'),(2,'10-P Assessment'),(3,'10-F Assessment'),(4,'Kingdom Business Assessment');
/*!40000 ALTER TABLE `resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource_status`
--

DROP TABLE IF EXISTS `resource_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource_status`
--

LOCK TABLES `resource_status` WRITE;
/*!40000 ALTER TABLE `resource_status` DISABLE KEYS */;
INSERT INTO `resource_status` VALUES (1,'Untouched'),(2,'Touched'),(3,'Disabled');
/*!40000 ALTER TABLE `resource_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource_user_assn`
--

DROP TABLE IF EXISTS `resource_user_assn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource_user_assn` (
  `resource_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `resource_id_idxfk_1` (`resource_id`),
  KEY `user_id_idxfk_1` (`user_id`),
  CONSTRAINT `resource_user_assn_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`),
  CONSTRAINT `resource_user_assn_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource_user_assn`
--

LOCK TABLES `resource_user_assn` WRITE;
/*!40000 ALTER TABLE `resource_user_assn` DISABLE KEYS */;
INSERT INTO `resource_user_assn` VALUES (4,1),(4,3),(4,2),(4,2),(2,1),(2,1),(2,2),(2,4),(2,5),(4,5),(4,4),(2,3);
/*!40000 ALTER TABLE `resource_user_assn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Administrator'),(2,'Manager'),(3,'Company Manager'),(4,'User');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scorecard`
--

DROP TABLE IF EXISTS `scorecard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scorecard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `name` text,
  `resource_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `company_id_idxfk_1` (`company_id`),
  KEY `resource_id_idxfk` (`resource_id`),
  CONSTRAINT `scorecard_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `scorecard_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scorecard`
--

LOCK TABLES `scorecard` WRITE;
/*!40000 ALTER TABLE `scorecard` DISABLE KEYS */;
/*!40000 ALTER TABLE `scorecard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scorecard_user_assn`
--

DROP TABLE IF EXISTS `scorecard_user_assn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scorecard_user_assn` (
  `user_id` int(11) NOT NULL,
  `scorecard_id` int(11) NOT NULL,
  KEY `user_id_idxfk` (`user_id`),
  KEY `scorecard_id_idxfk_3` (`scorecard_id`),
  CONSTRAINT `scorecard_user_assn_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `scorecard_user_assn_ibfk_2` FOREIGN KEY (`scorecard_id`) REFERENCES `scorecard` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scorecard_user_assn`
--

LOCK TABLES `scorecard_user_assn` WRITE;
/*!40000 ALTER TABLE `scorecard_user_assn` DISABLE KEYS */;
/*!40000 ALTER TABLE `scorecard_user_assn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spheres`
--

DROP TABLE IF EXISTS `spheres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spheres` (
  `id` int(11) NOT NULL DEFAULT '0',
  `sphere` text,
  `country` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spheres`
--

LOCK TABLES `spheres` WRITE;
/*!40000 ALTER TABLE `spheres` DISABLE KEYS */;
/*!40000 ALTER TABLE `spheres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_type`
--

DROP TABLE IF EXISTS `status_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_type` (
  `id` int(11) NOT NULL DEFAULT '0',
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `value` (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_type`
--

LOCK TABLES `status_type` WRITE;
/*!40000 ALTER TABLE `status_type` DISABLE KEYS */;
INSERT INTO `status_type` VALUES (1,'0% - Not Started'),(5,'100% - Completed'),(2,'25% - In Progress'),(3,'50% - Half Done'),(4,'75% - Almost Completed'),(6,'Ongoing/Recurring');
/*!40000 ALTER TABLE `status_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strategy`
--

DROP TABLE IF EXISTS `strategy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `strategy` (
  `id` int(11) NOT NULL DEFAULT '0',
  `strategy` text,
  `priority` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `scorecard_id` int(11) DEFAULT NULL,
  `category_type_id` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `priority_idx` (`priority`),
  KEY `scorecard_id_idxfk` (`scorecard_id`),
  KEY `category_type_id_idx` (`category_type_id`),
  KEY `modified_by_idxfk` (`modified_by`),
  CONSTRAINT `strategy_ibfk_1` FOREIGN KEY (`scorecard_id`) REFERENCES `scorecard` (`id`),
  CONSTRAINT `strategy_ibfk_2` FOREIGN KEY (`category_type_id`) REFERENCES `category_type` (`id`),
  CONSTRAINT `strategy_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategy`
--

LOCK TABLES `strategy` WRITE;
/*!40000 ALTER TABLE `strategy` DISABLE KEYS */;
/*!40000 ALTER TABLE `strategy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strategy_giant_assn`
--

DROP TABLE IF EXISTS `strategy_giant_assn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `strategy_giant_assn` (
  `strategy_id` int(11) NOT NULL,
  `giant_id` int(11) NOT NULL,
  KEY `strategy_id_idxfk` (`strategy_id`),
  KEY `giant_id_idxfk` (`giant_id`),
  CONSTRAINT `strategy_giant_assn_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`),
  CONSTRAINT `strategy_giant_assn_ibfk_2` FOREIGN KEY (`giant_id`) REFERENCES `giants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategy_giant_assn`
--

LOCK TABLES `strategy_giant_assn` WRITE;
/*!40000 ALTER TABLE `strategy_giant_assn` DISABLE KEYS */;
/*!40000 ALTER TABLE `strategy_giant_assn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strategy_sphere_assn`
--

DROP TABLE IF EXISTS `strategy_sphere_assn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `strategy_sphere_assn` (
  `strategy_id` int(11) NOT NULL,
  `sphere_id` int(11) NOT NULL,
  KEY `strategy_id_idxfk_1` (`strategy_id`),
  KEY `sphere_id_idxfk` (`sphere_id`),
  CONSTRAINT `strategy_sphere_assn_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`),
  CONSTRAINT `strategy_sphere_assn_ibfk_2` FOREIGN KEY (`sphere_id`) REFERENCES `spheres` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strategy_sphere_assn`
--

LOCK TABLES `strategy_sphere_assn` WRITE;
/*!40000 ALTER TABLE `strategy_sphere_assn` DISABLE KEYS */;
/*!40000 ALTER TABLE `strategy_sphere_assn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ten_p_assessment`
--

DROP TABLE IF EXISTS `ten_p_assessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ten_p_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_status_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `resource_status_id_idxfk` (`resource_status_id`),
  KEY `company_id_idxfk_3` (`company_id`),
  KEY `resource_id_idxfk_2` (`resource_id`),
  KEY `user_id_idxfk_3` (`user_id`),
  CONSTRAINT `ten_p_assessment_ibfk_1` FOREIGN KEY (`resource_status_id`) REFERENCES `resource_status` (`id`),
  CONSTRAINT `ten_p_assessment_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `ten_p_assessment_ibfk_3` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`),
  CONSTRAINT `ten_p_assessment_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ten_p_assessment`
--

LOCK TABLES `ten_p_assessment` WRITE;
/*!40000 ALTER TABLE `ten_p_assessment` DISABLE KEYS */;
INSERT INTO `ten_p_assessment` VALUES (1,2,2,2,1),(2,1,2,2,2),(3,1,NULL,2,4),(4,1,NULL,2,5),(5,1,NULL,2,3);
/*!40000 ALTER TABLE `ten_p_assessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ten_p_questions`
--

DROP TABLE IF EXISTS `ten_p_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ten_p_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) DEFAULT NULL,
  `text` varchar(514) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `count` (`count`),
  KEY `category_id_idxfk_1` (`category_id`),
  CONSTRAINT `ten_p_questions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ten_p_questions`
--

LOCK TABLES `ten_p_questions` WRITE;
/*!40000 ALTER TABLE `ten_p_questions` DISABLE KEYS */;
INSERT INTO `ten_p_questions` VALUES (1,1,'My organization\'s primary Purpose is well understood.',1),(2,2,'My organization\'s Purpose is consistent with its core business.',1),(3,3,'There is alignment in the Purpose of the organization.',1),(4,4,'Buy-in to purpose is expanded beyond the founders of the organization.',1),(5,5,'Our Products reflect the Purpose of the organization.',2),(6,6,'There is a systematic approach to developing our Products.',2),(7,7,'The impact of our Products on customers is measured.',2),(8,8,'Our customers look to the corporation primarily for its products.',2),(9,9,'My organization\'s distinctive Positioning relative to its competitors is well understood inside the company.',3),(10,10,'My organization\'s Positioning relative to its competitors is well understood outside the company.',3),(11,11,'My organization\'s Positioning - how we stack up against others - is effective.',3),(12,12,'Our Positioning has attracted potential Partners.',3),(13,13,'My organization has a clear Presence in the marketplace.',4),(14,14,'My organization\'s Presence in the marketplace is inspiring.',4),(15,15,'My organization has a defined marketing strategy.',4),(16,16,'Our strategy for building Presence is measurable.',4),(17,17,'My organization has a well-articulated Partnering strategy.',5),(18,18,'The existing Partnering relationships are working as designed.',5),(19,19,'My organization leverages its Partners optimally.',5),(20,20,'My organization\'s existing partnerships fit its strategic needs.',5),(21,21,'Business Processes are well defined.',6),(22,22,'Cross-functional (inter-departmental) Processes are well defined.',6),(23,23,'Processes are aligned/consistent with the organization\'s Purpose.',6),(24,24,'Communication processes are well defined and implemented.',6),(25,25,'My organization values its people.',7),(26,26,'People are able to have impact in the organization.',7),(27,27,'How we are organized is consistent with our Purpose.',7),(28,28,'Compensation structures are consistent with Purpose and Profit models.',7),(29,29,'Location is optimal with regard to key infrastructure components.',8),(30,30,'Proximity to network/Partners is well thought through and leads to conscious decisions on where work should take place.',8),(31,31,'We leverage the strengths of physical and virtual Place to create impact.',8),(32,32,'Our Place reveals a deliberate attempt to capture our ethos and corporate story.',8),(33,33,'There is a clear Planning framework.',9),(34,34,'Planning involves people from all levels of the organization (with their buy-in).',9),(35,35,'Customer feedback is fed into the Planning process.',9),(36,36,'Planning covers all drivers of Impact (all 10-Ps).',9),(37,37,'My organization\'s economic (Profit) objectives are consistent with its core values.',10),(38,38,'My organization\'s Profit objectives and economic model are known internally.',10),(39,39,'My organization\'s theoretical economic model translates to day-to-day operations.',10),(40,40,'My organization\'s Profit model is in alignment with the strategic objectives.',10);
/*!40000 ALTER TABLE `ten_p_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ten_p_results`
--

DROP TABLE IF EXISTS `ten_p_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ten_p_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `assessment_id` int(11) DEFAULT NULL,
  `performance` int(11) DEFAULT NULL,
  `importance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `question_id_idx` (`question_id`),
  KEY `assessment_id_idx` (`assessment_id`),
  CONSTRAINT `ten_p_results_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `ten_p_questions` (`id`),
  CONSTRAINT `ten_p_results_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `ten_p_assessment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ten_p_results`
--

LOCK TABLES `ten_p_results` WRITE;
/*!40000 ALTER TABLE `ten_p_results` DISABLE KEYS */;
INSERT INTO `ten_p_results` VALUES (1,1,1,5,6),(2,2,1,5,7),(3,3,1,4,7),(4,4,1,6,7),(5,5,1,2,7),(6,6,1,2,6),(7,7,1,7,6),(8,8,1,4,5),(9,9,1,3,4),(10,10,1,1,1),(11,11,1,1,1),(12,12,1,2,2),(13,13,1,4,3),(14,14,1,3,4),(15,15,1,4,4),(16,16,1,2,3),(17,17,1,2,2),(18,18,1,4,2),(19,19,1,2,4),(20,20,1,2,2),(21,21,1,4,4),(22,22,1,2,4),(23,23,1,1,2),(24,24,1,4,4),(25,25,1,4,5),(26,26,1,5,5),(27,27,1,5,5),(28,28,1,6,6),(29,29,1,6,6),(30,30,1,1,6),(31,31,1,7,7),(32,32,1,6,6),(33,33,1,1,5),(34,34,1,5,5),(35,35,1,1,4),(36,36,1,1,3),(37,37,1,7,2),(38,38,1,7,5),(39,39,1,7,4),(40,40,1,7,5);
/*!40000 ALTER TABLE `ten_p_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `first_name` text,
  `last_name` text,
  `email` text,
  `gender` tinyint(1) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tenure` int(11) DEFAULT NULL,
  `career_length` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `login_id_idxfk` (`login_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'Gareth','Seeto','gareth.seeto@gmail.com',1,'USA','','',NULL,NULL),(2,3,'Brett','Johnson','brettj@inst.net',1,NULL,NULL,NULL,NULL,NULL),(3,5,'Linda','Widjaja','lwidjaja@inst.net',0,'USA',NULL,NULL,NULL,NULL),(4,6,'Linh','Ly','linhl@inst.net',0,'USA',NULL,NULL,NULL,NULL),(5,7,'Dena','Andrews','denaa@inst.net',0,'',NULL,NULL,NULL,NULL),(6,8,'Lyn','Johnson','lynj@inst.net',0,'USA',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-12 13:23:22
