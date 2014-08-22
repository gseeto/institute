-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: institute
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.04.2

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
-- Dumping data for table `category_type`
--

LOCK TABLES `category_type` WRITE;
/*!40000 ALTER TABLE `category_type` DISABLE KEYS */;
INSERT INTO `category_type` VALUES (5,'Partnering'),(7,'People'),(8,'Place'),(9,'Planning'),(3,'Positioning'),(4,'Presence'),(6,'Process'),(2,'Product'),(10,'Profit'),(1,'Purpose');
/*!40000 ALTER TABLE `category_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `conditional_type`
--

INSERT INTO `conditional_type` (`id`, `token`) VALUES
(10, 'Importance < 2'),
(11, 'Importance < 3'),
(12, 'Importance < 4'),
(13, 'Importance < 5'),
(14, 'Importance < 6'),
(6, 'Importance/Performance Gap > 2'),
(7, 'Importance/Performance Gap > 3'),
(8, 'Importance/Performance Gap > 4'),
(9, 'Importance/Performance Gap > 5'),
(1, 'Performance < 2'),
(2, 'Performance < 3'),
(3, 'Performance < 4'),
(4, 'Performance < 5'),
(5, 'Performance < 6');

--
-- Dumping data for table `f_category_type`
--

INSERT INTO `f_category_type` (`id`, `value`) VALUES
(10, 'Faith'),
(7, 'Family'),
(1, 'Feelings'),
(9, 'Finances'),
(8, 'Fitness'),
(2, 'Fresh Thinking'),
(3, 'Friendship'),
(4, 'Fulfillment At Work'),
(6, 'Fun'),
(5, 'Function In Society');

INSERT INTO `integration_category_type` (`id`, `value`) VALUES
(1, 'Identity'),
(2, 'Integration'),
(3, 'Work'),
(4, 'Ministry'),
(5, 'Purpose'),
(6, 'Worldview'),
(7, 'Money');

INSERT INTO `seasonal_category_type` (`id`, `value`) VALUES
(1, 'Discovering your Gifts'),
(2, 'Faith'),
(3, 'Hearing and Fearing God'),
(4, 'Skills Building'),
(5, 'Internal Integrity'),
(6, '(re)choosing your spouse'),
(7, 'University of the Desert');

--
-- Dumping data for table `country_list`
--
LOCK TABLES `country_list` WRITE;
--
-- Dumping data for table `country_list`
--
INSERT INTO `country_list` (`id`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antigua and Barbuda'),
(7, 'Argentina'),
(8, 'Armenia'),
(9, 'Australia'),
(10, 'Austria'),
(11, 'Azerbaijan'),
(12, 'Bahamas'),
(13, 'Bahrain'),
(14, 'Bangladesh'),
(15, 'Barbados'),
(16, 'Belarus'),
(17, 'Belgium'),
(18, 'Belize'),
(19, 'Benin'),
(20, 'Bhutan'),
(21, 'Bolivia'),
(22, 'Bosnia and Herzegovina'),
(23, 'Botswana'),
(24, 'Brazil'),
(25, 'Brunei'),
(26, 'Bulgaria'),
(27, 'Burkina Faso'),
(28, 'Burma'),
(29, 'Burundi'),
(30, 'Cambodia'),
(31, 'Cameroon'),
(32, 'Canada'),
(33, 'Cape Verde'),
(34, 'Central African Republic'),
(35, 'Chad'),
(36, 'Chile'),
(37, 'China'),
(38, 'Colombia'),
(39, 'Comoros'),
(40, 'Congo'),
(41, 'Costa Rica'),
(42, 'Cote d''Ivoire'),
(43, 'Croatia'),
(44, 'Cuba'),
(45, 'Cyprus'),
(46, 'Czech Republic'),
(47, 'Denmark'),
(48, 'Djibouti'),
(49, 'Dominica'),
(50, 'Dominican Republic'),
(51, 'East Timor'),
(52, 'Ecuador'),
(53, 'Egypt'),
(54, 'El Salvador'),
(55, 'Equatorial Guinea'),
(56, 'Eritrea'),
(57, 'Estonia'),
(58, 'Ethiopia'),
(92, 'Fiji'),
(93, 'Finland'),
(94, 'France'),
(95, 'Gabon'),
(96, 'Gambia, The'),
(97, 'Georgia'),
(98, 'Germany'),
(99, 'Ghana'),
(100, 'Greece'),
(101, 'Grenada'),
(102, 'Guatemala'),
(103, 'Guinea'),
(104, 'Guinea-Bissau'),
(105, 'Guyana'),
(106, 'Haiti'),
(107, 'Holy See'),
(108, 'Honduras'),
(109, 'Hong Kong'),
(110, 'Hungary'),
(111, 'Iceland'),
(112, 'India'),
(113, 'Indonesia'),
(114, 'Iran'),
(115, 'Iraq'),
(116, 'Ireland'),
(117, 'Israel'),
(118, 'Italy'),
(119, 'Jamaica'),
(120, 'Japan'),
(121, 'Jordan'),
(122, 'Kazakhstan'),
(123, 'Kenya'),
(124, 'Kiribati'),
(125, 'Korea, North'),
(126, 'Korea, South'),
(127, 'Kosovo'),
(128, 'Kuwait'),
(129, 'Kyrgyzstan'),
(130, 'Laos'),
(131, 'Latvia'),
(132, 'Lebanon'),
(133, 'Lesotho'),
(134, 'Liberia'),
(135, 'Libya'),
(136, 'Liechtenstein'),
(137, 'Lithuania'),
(138, 'Luxembourg'),
(139, 'Macau'),
(140, 'Macedonia'),
(141, 'Madagascar'),
(142, 'Malawi'),
(143, 'Malaysia'),
(144, 'Maldives'),
(145, 'Mali'),
(146, 'Malta'),
(147, 'Marshall Islands'),
(148, 'Mauritania'),
(149, 'Mauritius'),
(150, 'Mexico'),
(151, 'Micronesia'),
(152, 'Moldova'),
(153, 'Monaco'),
(154, 'Mongolia'),
(155, 'Montenegro'),
(156, 'Morocco'),
(157, 'Mozambique'),
(158, 'Namibia'),
(159, 'Nauru'),
(160, 'Nepal'),
(161, 'Netherlands'),
(162, 'Netherlands Antilles'),
(163, 'New Zealand'),
(164, 'Nicaragua'),
(165, 'Niger'),
(166, 'Nigeria'),
(167, 'North Korea'),
(168, 'Norway'),
(169, 'Oman'),
(170, 'Pakistan'),
(171, 'Palau'),
(172, 'Palestinian Territories'),
(173, 'Panama'),
(174, 'Papua New Guinea'),
(175, 'Paraguay'),
(176, 'Peru'),
(177, 'Philippines'),
(178, 'Poland'),
(179, 'Portugal'),
(180, 'Qatar'),
(181, 'Romania'),
(182, 'Russia'),
(183, 'Rwanda'),
(184, 'Saint Kitts and Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Vincent and the Grenadines'),
(187, 'Samoa '),
(188, 'San Marino'),
(189, 'Sao Tome and Principe'),
(190, 'Saudi Arabia'),
(191, 'Senegal'),
(192, 'Serbia'),
(193, 'Seychelles'),
(194, 'Sierra Leone'),
(195, 'Singapore'),
(196, 'Slovakia'),
(197, 'Slovenia'),
(198, 'Solomon Islands'),
(199, 'Somalia'),
(200, 'South Africa'),
(201, 'South Korea'),
(202, 'South Sudan'),
(203, 'Spain'),
(204, 'Sri Lanka'),
(205, 'Sudan'),
(206, 'Suriname'),
(207, 'Swaziland'),
(208, 'Sweden'),
(209, 'Switzerland'),
(210, 'Syria'),
(211, 'Taiwan'),
(212, 'Tajikistan'),
(213, 'Tanzania'),
(214, 'Thailand '),
(215, 'Timor-Leste'),
(216, 'Togo'),
(217, 'Tonga'),
(218, 'Trinidad and Tobago'),
(219, 'Tunisia'),
(220, 'Turkey'),
(221, 'Turkmenistan'),
(222, 'Tuvalu'),
(223, 'Uganda'),
(224, 'Ukraine'),
(225, 'United Arab Emirates'),
(226, 'United Kingdom'),
(227, 'United States Of America'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Vanuatu'),
(231, 'Venezuela'),
(232, 'Vietnam'),
(233, 'Yemen'),
(234, 'Zambia'),
(235, 'Zimbabwe');

UNLOCK TABLES;

--
-- Dumping data for table `giants`
--

LOCK TABLES `giants` WRITE;
/*!40000 ALTER TABLE `giants` DISABLE KEYS */;
INSERT INTO `giants` (`id`, `giant`, `country`) VALUES
(1, 'Isolationism', 'USA'),
(2, 'Dichotomy', 'USA'),
(3, 'Unemployment', 'USA'),
(4, 'Poverty', 'USA'),
(5, 'Mediocrity', 'USA'),
(6, 'Poverty', 'India');
/*!40000 ALTER TABLE `giants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `industry`
--

LOCK TABLES `industry` WRITE;
/*!40000 ALTER TABLE `industry` DISABLE KEYS */;
INSERT INTO `industry` (`id`, `value`) VALUES
(1, 'Agriculture'),
(2, 'forestry and fishing'),
(3, 'Arts'),
(4, 'sports and recreation'),
(5, 'Catering and accommodation'),
(6, 'Construction'),
(7, 'Education'),
(8, 'Health and social care services'),
(9, 'IT and telecommunications services'),
(10, 'Manufacturing'),
(11, 'Media and creative services'),
(12, 'Mining'),
(13, 'energy and utilities'),
(14, 'Personal services'),
(15, 'Professional and business services'),
(16, 'Retail'),
(17, 'Wholesale'),
(18, 'Human Resources');
/*!40000 ALTER TABLE `industry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `kingdom_business_assessment`
--

--
-- Dumping data for table `kingdom_business_questions`
--

LOCK TABLES `kingdom_business_questions` WRITE;
/*!40000 ALTER TABLE `kingdom_business_questions` DISABLE KEYS */;
INSERT INTO `kingdom_business_questions` VALUES (1,1,'The purpose of our business leads to the expansion of the Kingdom of God.',1),(2,2,'We have invited God to be the CEO.',1),(3,3,'We are conscious of the fact that we are in God\'s business (vs. God being in our business).',1),(4,4,'We view ourselves as being owned by God.',1),(5,5,'Our products/services address needs that God cares about.',2),(6,6,'We invite God into our product/service development processes.',2),(7,7,'We have products/services in our portfolio that have been inspired by God.',2),(8,8,'We prune our products and services to remove those that do not bear eternal /lasting fruit.',2),(9,9,'Our leaders are secure in their positioning in Christ.',3),(10,10,'We have positioned the company/organization for God\'s blessing.',3),(11,11,'We have discovered our unique corporate calling.',3),(12,12,'Our positioning reinforces our unique corporate calling.',3),(13,13,'We have made the connection between God\'s presence and marketing.',4),(14,14,'Our marketing is redemptive, appealing to the best in our target audience.',4),(15,15,'God\'s presence in our business is positively impacting our stakeholders.',4),(16,16,'Our business experiences miracles.',4),(17,17,'We invite God\'s counsel before selecting our partners.',5),(18,18,'We are discipling our partners.',5),(19,19,'We are partnering honorably--keeping our word, contracts.',5),(20,20,'Our foundational partnerships--between spouses, and us and God--are healthy.',5),(21,21,'Our processes reflect the order of God.',6),(22,22,'We deliberately include God in our decision-making.',6),(23,23,'Our processes do not exploit others, including the poor or disadvantaged.',6),(24,24,'Our process leave room for faith.',6),(25,25,'Our business operates as a Biblical household.',7),(26,26,'People are discovering their callings in our place of work.',7),(27,27,'Our staff are experiencing Convergence at work.',7),(28,28,'We have a team (plurality) of honor-giving servant leaders.',7),(29,29,'We treat every inch of our place as God\'s.',8),(30,30,'We have designed Place as the first expression of God\'s character that our stakeholders see.',8),(31,31,'We practice Biblical hospitality in our place(s) of work.',8),(32,32,'Our Place reveals a deliberate attempt to reflect our Purpose.',8),(33,33,'We plan for each facet of the business based on Biblical concepts.',9),(34,34,'We value obedience to God over following through on our plans',9),(35,35,'We integrate realism and faith by building \"faith gaps\" into our business plans that only God can fill..',9),(36,36,'We evaluate risks to determine whether they are God-given or man-induced.',9),(37,37,'We delineate the management of capital and working capital.',10),(38,38,'We measure success in terms of what we make and what we flow through.',10),(39,39,'We are attempting to \"store up treasure in heaven\" through our making and stewardship of resources.',10),(40,40,'We have a culture of generosity that outstrips tithing.',10);
/*!40000 ALTER TABLE `kingdom_business_questions` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Dumping data for table `lemon_type`
--

LOCK TABLES `lemon_type` WRITE;
/*!40000 ALTER TABLE `lemon_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `lemon_type` ENABLE KEYS */;
INSERT INTO `lemon_type` (`id`, `name`) VALUES
(2, 'Entrepreneur'),
(1, 'Luminary'),
(3, 'Manager'),
(5, 'Networker'),
(4, 'Organizer');

UNLOCK TABLES;


-- Dumping data for table `resource`
--

LOCK TABLES `resource` WRITE;
/*!40000 ALTER TABLE `resource` DISABLE KEYS */;
INSERT INTO `resource` VALUES (1,'Scorecard'),(2,'10-P Assessment'),(3,'10-F Assessment'),(4,'Kingdom Business Assessment'),(5,'LEMON Assessment'),(6,'Integration Assessment'),(7,'Seasonal Assessment'),(8,'Where Does The Time Go Assessment'),(9,'Leadership Readiness Assessment');
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
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Administrator'),(2,'Manager'),(3,'Company Manager'),(4,'User');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `spheres`
--

LOCK TABLES `spheres` WRITE;
/*!40000 ALTER TABLE `spheres` DISABLE KEYS */;
INSERT INTO `spheres` VALUES (1,'Business'),(2,'Education'),(3,'Government'),(4,'Media'),(5,'NGO'),(6,'Law'),(7,'Healthcare'),(8,'Capital'),(9,'Religion'),(10,'Family');
/*!40000 ALTER TABLE `spheres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `status_type`
--

LOCK TABLES `status_type` WRITE;
/*!40000 ALTER TABLE `status_type` DISABLE KEYS */;
INSERT INTO `status_type` VALUES (1,'0%'),(5,'100%'),(2,'25%'),(3,'50%'),(4,'75%'),(6,'Recurring');
/*!40000 ALTER TABLE `status_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tenure_list`
--

INSERT INTO `tenure_list` (`id`, `range`) VALUES
(1, '0-3 Years'),
(2, '4-7 Years'),
(3, '> 7 Years');
--
-- Dumping data for table `title_list`
--
LOCK TABLES `title_list` WRITE;
INSERT INTO `title_list` (`id`, `name`) VALUES
(1, 'Executive'),
(2, 'Manager'),
(3, 'Other');
UNLOCK TABLES;

--
-- Dumping data for table `f_category_type`
--

INSERT INTO `lra_category_type` (`id`, `value`) VALUES
(1, 'Purpose'),
(2, 'Product'),
(3, 'Positioning'),
(4, 'Presence'),
(5, 'Partnering'),
(6, 'Profit'),
(7, 'Process'),
(8, 'People'),
(9, 'Planning'),
(10, 'Place'),
(11, 'Fresh Thinking'),
(12, 'Friendships'),
(13, 'Feelings'),
(14, 'Family'),
(15, 'Faith'),
(16, 'Fun'),
(17, 'Fitness'),
(18, 'Finances'),
(19, 'Fulfilment At Work'),
(20, 'Function In Society');


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-19 16:48:57
