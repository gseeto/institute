-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2012 at 11:22 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE IF NOT EXISTS `industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(514) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`id`, `name`) VALUES
(1, 'Scorecard'),
(2, '10-P Assessment'),
(3, '10-F Assessment'),
(4, 'Kingdom Business Assessment'),
(5, 'LEMON Assessment');

-- --------------------------------------------------------

--
-- Table structure for table `resource_status`
--

CREATE TABLE IF NOT EXISTS `resource_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_status`
--

INSERT INTO `resource_status` (`id`, `value`) VALUES
(1, 'Untouched'),
(2, 'Touched'),
(3, 'Disabled');

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'Company Manager'),
(4, 'User');
--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
  UNIQUE KEY `id` (`id`),
  KEY `login_id_idxfk` (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` text,
  `password` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `role_id_idxfk` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `id`, `role_id`) VALUES
('gseeto', 'gseeto', 1, 1),
('lwidjaja', 'lwidjaja', 2, 2),
('bjohnson', 'bjohnson', 3, 1),
('lwidjaja', 'lwidjaja', 4, 2),
('lwidjaja', 'lwidjaja', 5, 2),
('linhly', 'linhly', 6, 4),
('dandrews', 'dandrews', 7, 2),
('ljohnson', 'ljohnson', 8, 4),
('kwilson', 'kwilson', 9, 1);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login_id`, `first_name`, `last_name`, `email`, `gender`, `country`, `department`, `title`, `tenure`, `career_length`) VALUES
(1, 1, 'Gareth', 'Seeto', 'gareth.seeto@gmail.com', 1, 'USA', 'IT', 'Software Engineer', 5, 18),
(2, 3, 'Brett', 'Johnson', 'brettj@inst.net', 1, 'USA', NULL, NULL, NULL, NULL),
(3, 5, 'Linda', 'Widjaja', 'lwidjaja@inst.net', 0, 'USA', NULL, NULL, NULL, NULL),
(4, 6, 'Linh', 'Ly', 'linhl@inst.net', 0, 'USA', NULL, NULL, NULL, NULL),
(5, 7, 'Dena', 'Andrews', 'denaa@inst.net', 0, '', NULL, NULL, NULL, NULL),
(6, 8, 'Lyn', 'Johnson', 'lynj@inst.net', 0, 'USA', NULL, NULL, NULL, NULL),
(7, 9, 'Kim', 'Wilson', 'kimw@inst.net', 0, 'USA', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address_1` text,
  `city` text,
  `state` text,
  `zip_code` text,
  `country` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address_1`, `city`, `state`, `zip_code`, `country`) VALUES
(2, '145545 Quickert Rd', 'Saratoga', 'California', '', 'USA'),
(3, '2581 Leghorn St', 'Mountain View', 'California', NULL, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `category_type`
--

CREATE TABLE IF NOT EXISTS `category_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `value` (`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_type`
--

INSERT INTO `category_type` (`id`, `value`) VALUES
(5, 'Partnering'),
(7, 'People'),
(8, 'Place'),
(9, 'Planning'),
(3, 'Positioning'),
(4, 'Presence'),
(6, 'Process'),
(2, 'Product'),
(10, 'Profit'),
(1, 'Purpose');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `address_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `address_id_idxfk` (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address_id`) VALUES
(2, 'The Institute For Innovation, Integration and Impact', 2),
(3, 'Abundant Life Christian Fellowship', 3);

-- --------------------------------------------------------

--
-- Table structure for table `company_industry_assn`
--

CREATE TABLE IF NOT EXISTS `company_industry_assn` (
  `company_id` int(11) NOT NULL,
  `industry_id` int(11) NOT NULL,
  KEY `company_id_idxfk` (`company_id`),
  KEY `industry_id_idxfk` (`industry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_industry_assn`
--

INSERT INTO `company_industry_assn` (`company_id`, `industry_id`) VALUES
(2, 7),
(2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `company_user_assn`
--

CREATE TABLE IF NOT EXISTS `company_user_assn` (
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `company_id_idxfk_2` (`company_id`),
  KEY `user_id_idxfk_2` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_user_assn`
--

INSERT INTO `company_user_assn` (`company_id`, `user_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `giants`
--

CREATE TABLE IF NOT EXISTS `giants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `giant` text,
  `country` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `giants`
--

INSERT INTO `giants` (`id`, `giant`, `country`) VALUES
(1, 'Isolationism', 'USA'),
(2, 'Dichotomy', 'USA'),
(3, 'Unemployment', 'USA'),
(4, 'Poverty', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `scorecard`
--

CREATE TABLE IF NOT EXISTS `scorecard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `name` text,
  `resource_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `company_id_idxfk_1` (`company_id`),
  KEY `resource_id_idxfk` (`resource_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scorecard`
--

INSERT INTO `scorecard` (`id`, `company_id`, `name`, `resource_id`) VALUES
(1, 2, 'institute', 1),
(2, 3, 'alcf', 1);

--
-- Table structure for table `strategy`
--

CREATE TABLE IF NOT EXISTS `strategy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strategy` text,
  `priority` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `scorecard_id` int(11) DEFAULT NULL,
  `category_type_id` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `priority_idx` (`priority`),
  KEY `scorecard_id_idxfk` (`scorecard_id`),
  KEY `category_type_id_idx` (`category_type_id`),
  KEY `modified_by_idxfk` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strategy`
--

INSERT INTO `strategy` (`id`, `strategy`, `priority`, `count`, `scorecard_id`, `category_type_id`, `modified_by`, `modified`) VALUES
(1, 'The new purpose strategy is something else and see if this works and once again make a change', 2, 1, 1, 1, 1, '2012-11-24 22:47:08'),
(2, 'Product Strategy', 1, 1, 1, 2, 1, '2012-11-22 18:02:23'),
(3, 'Presence needs to be built so that more people hear about work/life integration', 2, 1, 1, 4, 1, '2012-11-22 18:00:58'),
(4, 'Create process for getting people onto the scorecard', 3, 1, 1, 6, 1, '2012-11-22 18:01:02');

-- --------------------------------------------------------
--
-- Table structure for table `status_type`
--

CREATE TABLE IF NOT EXISTS `status_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `value` (`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_type`
--

INSERT INTO `status_type` (`id`, `value`) VALUES
(1, '0%'),
(5, '100%'),
(2, '25%'),
(3, '50%'),
(4, '75%'),
(6, 'Recurring');


--
-- Table structure for table `kingdom_business_assessment`
--

CREATE TABLE IF NOT EXISTS `kingdom_business_assessment` (
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
  KEY `resource_status_id_idxfk_1` (`resource_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kingdom_business_assessment`
--

INSERT INTO `kingdom_business_assessment` (`id`, `company_id`, `resource_id`, `user_id`, `resource_status_id`) VALUES
(1, 2, 4, 1, 2),
(2, NULL, 4, 3, 1),
(5, 2, 4, 2, 1),
(6, NULL, 4, 5, 1),
(7, NULL, 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kingdom_business_questions`
--

CREATE TABLE IF NOT EXISTS `kingdom_business_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) DEFAULT NULL,
  `text` varchar(514) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `category_id_idxfk_2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kingdom_business_questions`
--

INSERT INTO `kingdom_business_questions` (`id`, `count`, `text`, `category_id`) VALUES
(1, 1, 'The purpose of our business leads to the expansion of the Kingdom of God.', 1),
(2, 2, 'We have invited God to be the CEO.', 1),
(3, 3, 'We are conscious of the fact that we are in God''s business (vs. God being in our business).', 1),
(4, 4, 'We view ourselves as being owned by God.', 1),
(5, 5, 'Our products/services address needs that God cares about.', 2),
(6, 6, 'We invite God into our product/service development processes.', 2),
(7, 7, 'We have products/services in our portfolio that have been inspired by God.', 2),
(8, 8, 'We prune our products and services to remove those that do not bear eternal /lasting fruit.', 2),
(9, 9, 'Our leaders are secure in their positioning in Christ.', 3),
(10, 10, 'We have positioned the company/organization for God''s blessing.', 3),
(11, 11, 'We have discovered our unique corporate calling.', 3),
(12, 12, 'Our positioning reinforces our unique corporate calling.', 3),
(13, 13, 'We have made the connection between God''s presence and marketing.', 4),
(14, 14, 'Our marketing is redemptive, appealing to the best in our target audience.', 4),
(15, 15, 'God''s presence in our business is positively impacting our stakeholders.', 4),
(16, 16, 'Our business experiences miracles.', 4),
(17, 17, 'We invite God''s counsel before selecting our partners.', 5),
(18, 18, 'We are discipling our partners.', 5),
(19, 19, 'We are partnering honorably--keeping our word, contracts.', 5),
(20, 20, 'Our foundational partnerships--between spouses, and us and God--are healthy.', 5),
(21, 21, 'Our processes reflect the order of God.', 6),
(22, 22, 'We deliberately include God in our decision-making.', 6),
(23, 23, 'Our processes do not exploit others, including the poor or disadvantaged.', 6),
(24, 24, 'Our process leave room for faith.', 6),
(25, 25, 'Our business operates as a Biblical household.', 7),
(26, 26, 'People are discovering their callings in our place of work.', 7),
(27, 27, 'Our staff are experiencing Convergence at work.', 7),
(28, 28, 'We have a team (plurality) of honor-giving servant leaders.', 7),
(29, 29, 'We treat every inch of our place as God''s.', 8),
(30, 30, 'We have designed Place as the first expression of God''s character that our stakeholders see.', 8),
(31, 31, 'We practice Biblical hospitality in our place(s) of work.', 8),
(32, 32, 'Our Place reveals a deliberate attempt to reflect our Purpose.', 8),
(33, 33, 'We plan for each facet of the business based on Biblical concepts.', 9),
(34, 34, 'We value obedience to God over following through on our plans', 9),
(35, 35, 'We integrate realism and faith by building "faith gaps" into our business plans that only God can fill..', 9),
(36, 36, 'We evaluate risks to determine whether they are God-given or man-induced.', 9),
(37, 37, 'We delineate the management of capital and working capital.', 10),
(38, 38, 'We measure success in terms of what we make and what we flow through.', 10),
(39, 39, 'We are attempting to "store up treasure in heaven" through our making and stewardship of resources.', 10),
(40, 40, 'We have a culture of generosity that outstrips tithing.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kingdom_business_results`
--

CREATE TABLE IF NOT EXISTS `kingdom_business_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `assessment_id` int(11) DEFAULT NULL,
  `performance` int(11) DEFAULT NULL,
  `importance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `question_id_idxfk_1` (`question_id`),
  KEY `assessment_id_idxfk_1` (`assessment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kingdom_business_results`
--

INSERT INTO `kingdom_business_results` (`id`, `question_id`, `assessment_id`, `performance`, `importance`) VALUES
(202, 1, 1, 6, 7),
(203, 2, 1, 5, 7),
(204, 3, 1, 3, 7),
(205, 4, 1, 5, 7),
(206, 5, 1, 5, 7),
(207, 6, 1, 3, 4),
(208, 7, 1, 2, 1),
(209, 8, 1, 6, 4),
(210, 9, 1, 6, 6),
(211, 10, 1, 3, 3),
(212, 11, 1, 5, 3),
(213, 12, 1, 1, 1),
(214, 13, 1, 3, 5),
(215, 14, 1, 1, 3),
(216, 15, 1, 5, 5),
(217, 16, 1, 5, 5),
(218, 17, 1, 5, 3),
(219, 18, 1, 3, 5),
(220, 19, 1, 2, 5),
(221, 20, 1, 1, 2),
(222, 21, 1, 1, 3),
(223, 22, 1, 1, 3),
(224, 23, 1, 1, 5),
(225, 24, 1, 5, 6),
(226, 25, 1, 4, 6),
(227, 26, 1, 3, 4),
(228, 27, 1, 2, 2),
(229, 28, 1, 4, 1),
(230, 29, 1, 6, 5),
(231, 30, 1, 6, 6),
(232, 31, 1, 5, 6),
(233, 32, 1, 4, 4),
(234, 33, 1, 4, 4),
(235, 34, 1, 3, 3),
(236, 35, 1, 5, 1),
(237, 36, 1, 3, 3),
(238, 37, 1, 1, 4),
(239, 38, 1, 1, 4),
(240, 39, 1, 1, 1),
(241, 40, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kpis`
--

CREATE TABLE IF NOT EXISTS `kpis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strategy_id` int(11) DEFAULT NULL,
  `scorecard_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `kpi` text,
  `count` int(11) DEFAULT NULL,
  `comments` text,
  `modified_by` int(11) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `strategy_id_idxfk_2` (`strategy_id`),
  KEY `scorecard_id_idxfk_1` (`scorecard_id`),
  KEY `modified_by_idxfk_1` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kpis`
--

INSERT INTO `kpis` (`id`, `strategy_id`, `scorecard_id`, `rating`, `kpi`, `count`, `comments`, `modified_by`, `modified`) VALUES
(1, 1, 1, 3, 'Measure how well we''re doing and that we can change things', 1, 'put a height in', 1, '2012-11-24 23:26:09'),
(2, 1, 1, 5, 'And a final second measure,,,', 2, 'hidden secret and then some make some changes', 1, '2012-11-24 23:26:18'),
(3, 2, 1, 2, 'Put something worthwhile in here', 1, ' ', 1, '2012-11-23 05:13:29'),
(4, 3, 1, 3, 'More book orders and online inquiries', 1, ' ', 1, '2012-11-23 05:13:33'),
(5, 4, 1, 1, 'Product gets uptake of over 100 in the next year', 1, NULL, 1, '2012-11-21 16:42:06'),
(6, 3, 1, 4, 'New Presence KPI', 2, NULL, 1, '2012-11-22 22:18:59'),
(7, 3, 1, 5, 'And yet another measurement', 3, NULL, 1, '2012-11-22 22:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `action_items`
--

CREATE TABLE IF NOT EXISTS `action_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` text,
  `strategy_id` int(11) DEFAULT NULL,
  `scorecard_id` int(11) DEFAULT NULL,
  `who` int(11) DEFAULT NULL,
  `when` date DEFAULT NULL,
  `status_type` int(11) DEFAULT NULL,
  `comments` text,
  `category_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `strategy_id_idx` (`strategy_id`),
  KEY `scorecard_id_idx` (`scorecard_id`),
  KEY `who_idxfk` (`who`),
  KEY `status_type_idxfk` (`status_type`),
  KEY `category_id_idx` (`category_id`),
  KEY `modified_by_idxfk_2` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_items`
--

INSERT INTO `action_items` (`id`, `action`, `strategy_id`, `scorecard_id`, `who`, `when`, `status_type`, `comments`, `category_id`, `count`, `modified_by`, `modified`) VALUES
(1, 'Add an action item to the purpose strategy and be sure the changes take effect.dhfgsfg', 1, 1, 2, '2012-11-27', 4, 'add some comments', 1, 1, 1, '2012-11-28 17:39:23'),
(2, 'New action item and another one\nTry with carriage return', 1, 1, 1, NULL, 3, 'add something here too\nand be sure it works', 1, 2, 1, '2012-11-24 23:01:37'),
(3, 'Finally a third one and this will be updated', 1, 1, 3, NULL, 3, ' ', 1, 3, 1, '2012-11-24 23:07:52'),
(4, 'Add a couple of action items', 2, 1, 5, '0000-00-00', NULL, NULL, 2, 1, 1, '2012-11-22 21:14:15'),
(5, 'A second product action item put something in here', 2, 1, 1, NULL, NULL, ' ', 2, 2, 1, '2012-11-22 21:36:01'),
(6, 'Maintain existing Social Media', 3, 1, 2, NULL, NULL, ' ', 4, 1, 1, '2012-11-22 21:30:22'),
(7, 'New action item bla blah', 3, 1, 4, NULL, 3, NULL, 4, 2, 1, '2012-11-21 16:43:15'),
(8, 'Redo the web site', 3, 1, 1, NULL, 2, '', 4, 3, 1, '2012-11-22 21:36:29'),
(9, 'Set a regular Social Media Calendar up and down', 3, 1, 1, '2012-11-13', 4, ' ', 4, 4, 1, '2012-11-22 21:36:38'),
(10, 'put something up on the web site regarding purpose', 1, 1, 1, NULL, NULL, ' ', 1, 4, 1, '2012-11-22 21:36:26'),
(11, 'Create the scorecard', 4, 1, 1, NULL, 3, '', 6, 1, 1, '2012-11-22 21:36:07'),
(12, 'Perform quality control testing on the new product', 4, 1, 1, NULL, 4, ' ', 6, 2, 1, '2012-11-22 22:26:24'),
(13, 'Prototype it with Home Office Team', 4, 1, 1, NULL, 3, ' ', 6, 3, 1, '2012-11-22 22:26:23'),
(14, 'Feedback suggestions to improve the product', 4, 1, 1, NULL, 2, '', 6, 4, 1, '2012-11-22 21:36:22');

-- --------------------------------------------------------
--
-- Table structure for table `lemon_type`
--

CREATE TABLE IF NOT EXISTS `lemon_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lemon_type`
--

INSERT INTO `lemon_type` (`id`, `name`) VALUES
(2, 'Entrepreneur'),
(1, 'Luminary'),
(3, 'Manager'),
(5, 'Networker'),
(4, 'Organizer');

-- --------------------------------------------------------

--
-- Table structure for table `lemon_assessment`
--

CREATE TABLE IF NOT EXISTS `lemon_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `resource_status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_5` (`user_id`),
  KEY `company_id_idxfk_5` (`company_id`),
  KEY `resource_id_idxfk_4` (`resource_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lemon_assessment`
--

INSERT INTO `lemon_assessment` (`id`, `user_id`, `company_id`, `resource_id`, `resource_status_id`) VALUES
(5, 1, 2, 2, 2),
(6, 2, 2, 5, 1),
(7, 6, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lemon_assessment_questions`
--

CREATE TABLE IF NOT EXISTS `lemon_assessment_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) DEFAULT NULL,
  `text` varchar(514) DEFAULT NULL,
  `lemon_type_id` int(11) DEFAULT NULL,
  `inverse` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `count` (`count`),
  KEY `lemon_type_id_idxfk` (`lemon_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lemon_assessment_questions`
--

INSERT INTO `lemon_assessment_questions` (`id`, `count`, `text`, `lemon_type_id`, `inverse`) VALUES
(1, 1, 'I am a long range thinker - I think in decades and even centuries', 1, 0),
(2, 2, 'I am a long term thinker - I think in years and decades rather than months', 3, 0),
(3, 3, 'I am able to plan and organize things efficiently and effectively', 3, 0),
(4, 4, 'I am action orientated', 4, 0),
(5, 5, 'I am aware of relational capital', 5, 0),
(6, 6, 'I am deliberate in my actions', 3, 0),
(7, 7, 'I am good at identifying issues', 4, 0),
(8, 8, 'I am known as an encourager', 5, 0),
(9, 9, 'I seldom get offended or take things personally', 3, 0),
(10, 10, 'I find it difficult to administer discipline', 5, 0),
(11, 11, 'I am protective of opportunities', 2, 0),
(12, 12, 'I am viewed as steady/stable', 3, 0),
(13, 13, 'I am willing to do anything it takes to get something moving', 2, 0),
(14, 14, 'I believe that ideas precede activities', 1, 0),
(15, 15, 'I believe that opportunities (more than ideas) lead to activities', 2, 0),
(16, 16, 'I build conceptual frameworks', 1, 0),
(17, 17, 'I can ''read'' people', 5, 0),
(18, 18, 'I can articulate ideas clearly', 1, 0),
(19, 19, 'I can easily see the long term implications of today''s thinking', 1, 0),
(20, 20, 'I can exhaust those around me with too many ideas', 1, 0),
(21, 21, 'I can make things happen ''out of nothing''', 2, 0),
(22, 22, 'I can move quickly from one opportunity to the next', 2, 0),
(23, 23, 'I can stay focused on a dream for a LONG time', 1, 0),
(24, 24, 'I care a lot about ''Why'' and less about ''How, When, How much''', 1, 0),
(25, 25, 'I care more about connecting people - the ''Who''', 5, 0),
(26, 26, 'I deflect responsibility for practical tasks', 5, 0),
(27, 27, 'I do not fail, I just have lots of ''learning experiences''', 2, 0),
(28, 28, 'I do not relish conflict in a relationship', 5, 0),
(29, 29, 'I do the tasks that get a quick result', 4, 0),
(30, 30, 'I easily pick the things that must be done', 4, 0),
(31, 31, 'I find out people''s stories', 5, 0),
(32, 32, 'I generally sense what people want', 5, 0),
(33, 33, 'I have a very high risk tolerance', 2, 0),
(34, 34, 'I have an intuitive sense of the needs of others', 4, 0),
(35, 35, 'I have an intuitive sense of the viability of opportunities', 2, 0),
(36, 36, 'I have lots of new ideas', 1, 0),
(37, 37, 'I instinctively build networks', 5, 0),
(38, 38, 'I intuitively understand what is out in the future', 1, 0),
(39, 39, 'I know what is really happening in the organization', 4, 0),
(40, 40, 'I like to be complimented for efficiency', 3, 0),
(41, 41, 'I like to be complimented for my ideas', 1, 0),
(42, 42, 'I like to be complimented for my loyal performance', 4, 0),
(43, 43, 'I love to bring people together', 5, 0),
(44, 44, 'I love to bring things to a close', 4, 0),
(45, 45, 'I make others feel at ease in my presence', 5, 0),
(46, 46, 'I often see opportunities that others do not see', 2, 0),
(47, 47, 'I protect my ideas', 1, 0),
(48, 48, 'I quickly get to what needs to be done', 4, 0),
(49, 49, 'I readily do practical tasks', 4, 0),
(50, 50, 'I remember people', 5, 0),
(51, 51, 'I take pride in being able to get things accomplished', 3, 0),
(52, 52, 'I think more about the next quarter or year than the next decade', 2, 0),
(53, 53, 'I think that proper planning precedes activities', 3, 0),
(54, 54, 'I translate ideas into opportunities', 2, 0),
(55, 55, 'I understand things like processes, procedures, policies and planning', 3, 0),
(56, 56, 'I value concepts, ideas, and fresh thinking', 1, 0),
(57, 57, 'I value those who spot opportunities and take action to make them happen', 2, 0),
(58, 58, 'I view failure as lack of planning', 3, 0),
(59, 59, 'I work wherever there is work to do', 4, 0),
(60, 60, 'I would rather build a team to get something done than just do it myself', 3, 0),
(61, 61, 'I would rather do things myself than delegate them', 4, 0),
(62, 62, 'If given a bad situation, I am able to shape it to make it viable', 3, 0),
(63, 63, 'My energy and enthusiasm draw people to me', 2, 0),
(64, 64, 'My ideas are inspiring to others', 1, 0),
(65, 65, 'My motto is: Get on board or get out of the way', 2, 0),
(66, 66, 'My motto is: I have thought it all through.', 1, 0),
(67, 67, 'My motto is: Let''s stop talking about it and do it!', 4, 0),
(68, 68, 'My motto is: If it is not broken do not touch it!', 3, 0),
(69, 69, 'My motto is: Let''s get together', 5, 0),
(70, 70, 'My performance is characterized by consistency', 3, 0),
(71, 71, 'My work is completing tasks', 4, 0),
(72, 72, 'My work is connecting people', 5, 0),
(73, 73, 'My work is establishing infrastructure', 3, 0),
(74, 74, 'My work is launching new things', 2, 0),
(75, 75, 'Others do not realize how much I do', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lemon_assessment_results`
--

CREATE TABLE IF NOT EXISTS `lemon_assessment_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `assessment_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `question_id_idxfk_2` (`question_id`),
  KEY `assessment_id_idxfk_2` (`assessment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lemon_assessment_results`
--

INSERT INTO `lemon_assessment_results` (`id`, `question_id`, `assessment_id`, `value`) VALUES
(1, 1, 5, 4),
(2, 2, 5, 5),
(3, 3, 5, 6),
(4, 4, 5, 7),
(5, 5, 5, 5),
(6, 6, 5, 5),
(7, 7, 5, 6),
(8, 8, 5, 6),
(9, 9, 5, 7),
(10, 10, 5, 6),
(11, 11, 5, 3),
(12, 12, 5, 7),
(13, 13, 5, 5),
(14, 14, 5, 6),
(15, 15, 5, 3),
(16, 16, 5, 5),
(17, 17, 5, 6),
(18, 18, 5, 7),
(19, 19, 5, 6),
(20, 20, 5, 2),
(21, 21, 5, 3),
(22, 22, 5, 2),
(23, 23, 5, 5),
(24, 24, 5, 3),
(25, 25, 5, 3),
(26, 26, 5, 1),
(27, 27, 5, 3),
(28, 28, 5, 7),
(29, 29, 5, 6),
(30, 30, 5, 5),
(31, 31, 5, 3),
(32, 32, 5, 6),
(33, 33, 5, 4),
(34, 34, 5, 7),
(35, 35, 5, 3),
(36, 36, 5, 4),
(37, 37, 5, 2),
(38, 38, 5, 2),
(39, 39, 5, 5),
(40, 40, 5, 5),
(41, 41, 5, 6),
(42, 42, 5, 6),
(43, 43, 5, 3),
(44, 44, 5, 7),
(45, 45, 5, 6),
(46, 46, 5, 4),
(47, 47, 5, 2),
(48, 48, 5, 6),
(49, 49, 5, 6),
(50, 50, 5, 2),
(51, 51, 5, 6),
(52, 52, 5, 3),
(53, 53, 5, 5),
(54, 54, 5, 3),
(55, 55, 5, 5),
(56, 56, 5, 6),
(57, 57, 5, 3),
(58, 58, 5, 3),
(59, 59, 5, 6),
(60, 60, 5, 3),
(61, 61, 5, 5),
(62, 62, 5, 4),
(63, 63, 5, 2),
(64, 64, 5, 3),
(65, 65, 5, 2),
(66, 66, 5, 3),
(67, 67, 5, 6),
(68, 68, 5, 3),
(69, 69, 5, 2),
(70, 70, 5, 6),
(71, 71, 5, 6),
(72, 72, 5, 2),
(73, 73, 5, 5),
(74, 74, 5, 3),
(75, 75, 5, 5);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `resource_user_assn`
--

CREATE TABLE IF NOT EXISTS `resource_user_assn` (
  `resource_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `resource_id_idxfk_1` (`resource_id`),
  KEY `user_id_idxfk_1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_user_assn`
--

INSERT INTO `resource_user_assn` (`resource_id`, `user_id`) VALUES
(4, 1),
(4, 3),
(4, 2),
(4, 2),
(2, 1),
(2, 1),
(2, 2),
(2, 4),
(2, 5),
(4, 5),
(4, 4),
(2, 3),
(5, 1),
(5, 4),
(5, 6),
(5, 1),
(5, 1),
(5, 2),
(5, 6);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `scorecard_user_assn`
--

CREATE TABLE IF NOT EXISTS `scorecard_user_assn` (
  `user_id` int(11) NOT NULL,
  `scorecard_id` int(11) NOT NULL,
  KEY `user_id_idxfk` (`user_id`),
  KEY `scorecard_id_idxfk_3` (`scorecard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scorecard_user_assn`
--

INSERT INTO `scorecard_user_assn` (`user_id`, `scorecard_id`) VALUES
(1, 1),
(2, 1),
(5, 1),
(1, 2),
(3, 1),
(4, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `spheres`
--

CREATE TABLE IF NOT EXISTS `spheres` (
  `id` int(11) NOT NULL DEFAULT '0',
  `sphere` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spheres`
--

INSERT INTO `spheres` (`id`, `sphere`) VALUES
(1, 'Business'),
(2, 'Education'),
(3, 'Government'),
(4, 'Media'),
(5, 'NGO'),
(6, 'Law'),
(7, 'Healthcare'),
(8, 'Capital'),
(9, 'Religion'),
(10, 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `statement`
--

CREATE TABLE IF NOT EXISTS `statement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(1024) DEFAULT NULL,
  `scorecard_id` int(11) DEFAULT NULL,
  `is_purpose` tinyint(1) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `scorecard_id_idxfk_4` (`scorecard_id`),
  KEY `modified_by_idxfk_3` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statement`
--

INSERT INTO `statement` (`id`, `value`, `scorecard_id`, `is_purpose`, `modified_by`, `modified`) VALUES
(2, 'Put a purpose Statement in here make a change', 1, 1, 1, '2012-11-21 01:20:23'),
(3, 'Add my purpose for working at ALCF.\nTo Bridge the gap between the spheres of Religion and Business.', 2, 1, 1, '2012-11-21 06:24:42'),
(4, 'Position myself uniquely between two sectors of society, cross polinating ideas and methodologies.', 2, 0, 1, '2012-11-21 06:25:41');

-- --------------------------------------------------------


-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `strategy_giant_assn`
--

CREATE TABLE IF NOT EXISTS `strategy_giant_assn` (
  `strategy_id` int(11) NOT NULL,
  `giant_id` int(11) NOT NULL,
  KEY `strategy_id_idxfk` (`strategy_id`),
  KEY `giant_id_idxfk` (`giant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strategy_giant_assn`
--

INSERT INTO `strategy_giant_assn` (`strategy_id`, `giant_id`) VALUES
(1, 1),
(2, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `strategy_sphere_assn`
--

CREATE TABLE IF NOT EXISTS `strategy_sphere_assn` (
  `strategy_id` int(11) NOT NULL,
  `sphere_id` int(11) NOT NULL,
  KEY `strategy_id_idxfk_1` (`strategy_id`),
  KEY `sphere_id_idxfk` (`sphere_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strategy_sphere_assn`
--

INSERT INTO `strategy_sphere_assn` (`strategy_id`, `sphere_id`) VALUES
(2, 1),
(2, 2),
(3, 1),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ten_p_assessment`
--

CREATE TABLE IF NOT EXISTS `ten_p_assessment` (
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
  KEY `user_id_idxfk_3` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ten_p_assessment`
--

INSERT INTO `ten_p_assessment` (`id`, `resource_status_id`, `company_id`, `resource_id`, `user_id`) VALUES
(1, 2, 2, 2, 1),
(2, 1, 2, 2, 2),
(3, 1, NULL, 2, 4),
(4, 1, NULL, 2, 5),
(5, 1, NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ten_p_questions`
--

CREATE TABLE IF NOT EXISTS `ten_p_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) DEFAULT NULL,
  `text` varchar(514) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `count` (`count`),
  KEY `category_id_idxfk_1` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ten_p_questions`
--

INSERT INTO `ten_p_questions` (`id`, `count`, `text`, `category_id`) VALUES
(1, 1, 'My organization''s primary Purpose is well understood.', 1),
(2, 2, 'My organization''s Purpose is consistent with its core business.', 1),
(3, 3, 'There is alignment in the Purpose of the organization.', 1),
(4, 4, 'Buy-in to purpose is expanded beyond the founders of the organization.', 1),
(5, 5, 'Our Products reflect the Purpose of the organization.', 2),
(6, 6, 'There is a systematic approach to developing our Products.', 2),
(7, 7, 'The impact of our Products on customers is measured.', 2),
(8, 8, 'Our customers look to the corporation primarily for its products.', 2),
(9, 9, 'My organization''s distinctive Positioning relative to its competitors is well understood inside the company.', 3),
(10, 10, 'My organization''s Positioning relative to its competitors is well understood outside the company.', 3),
(11, 11, 'My organization''s Positioning - how we stack up against others - is effective.', 3),
(12, 12, 'Our Positioning has attracted potential Partners.', 3),
(13, 13, 'My organization has a clear Presence in the marketplace.', 4),
(14, 14, 'My organization''s Presence in the marketplace is inspiring.', 4),
(15, 15, 'My organization has a defined marketing strategy.', 4),
(16, 16, 'Our strategy for building Presence is measurable.', 4),
(17, 17, 'My organization has a well-articulated Partnering strategy.', 5),
(18, 18, 'The existing Partnering relationships are working as designed.', 5),
(19, 19, 'My organization leverages its Partners optimally.', 5),
(20, 20, 'My organization''s existing partnerships fit its strategic needs.', 5),
(21, 21, 'Business Processes are well defined.', 6),
(22, 22, 'Cross-functional (inter-departmental) Processes are well defined.', 6),
(23, 23, 'Processes are aligned/consistent with the organization''s Purpose.', 6),
(24, 24, 'Communication processes are well defined and implemented.', 6),
(25, 25, 'My organization values its people.', 7),
(26, 26, 'People are able to have impact in the organization.', 7),
(27, 27, 'How we are organized is consistent with our Purpose.', 7),
(28, 28, 'Compensation structures are consistent with Purpose and Profit models.', 7),
(29, 29, 'Location is optimal with regard to key infrastructure components.', 8),
(30, 30, 'Proximity to network/Partners is well thought through and leads to conscious decisions on where work should take place.', 8),
(31, 31, 'We leverage the strengths of physical and virtual Place to create impact.', 8),
(32, 32, 'Our Place reveals a deliberate attempt to capture our ethos and corporate story.', 8),
(33, 33, 'There is a clear Planning framework.', 9),
(34, 34, 'Planning involves people from all levels of the organization (with their buy-in).', 9),
(35, 35, 'Customer feedback is fed into the Planning process.', 9),
(36, 36, 'Planning covers all drivers of Impact (all 10-Ps).', 9),
(37, 37, 'My organization''s economic (Profit) objectives are consistent with its core values.', 10),
(38, 38, 'My organization''s Profit objectives and economic model are known internally.', 10),
(39, 39, 'My organization''s theoretical economic model translates to day-to-day operations.', 10),
(40, 40, 'My organization''s Profit model is in alignment with the strategic objectives.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ten_p_results`
--

CREATE TABLE IF NOT EXISTS `ten_p_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `assessment_id` int(11) DEFAULT NULL,
  `performance` int(11) DEFAULT NULL,
  `importance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `question_id_idx` (`question_id`),
  KEY `assessment_id_idx` (`assessment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ten_p_results`
--

INSERT INTO `ten_p_results` (`id`, `question_id`, `assessment_id`, `performance`, `importance`) VALUES
(1, 1, 1, 5, 6),
(2, 2, 1, 5, 7),
(3, 3, 1, 4, 7),
(4, 4, 1, 6, 7),
(5, 5, 1, 2, 7),
(6, 6, 1, 2, 6),
(7, 7, 1, 7, 6),
(8, 8, 1, 4, 5),
(9, 9, 1, 3, 4),
(10, 10, 1, 1, 1),
(11, 11, 1, 1, 1),
(12, 12, 1, 2, 2),
(13, 13, 1, 4, 3),
(14, 14, 1, 3, 4),
(15, 15, 1, 4, 4),
(16, 16, 1, 2, 3),
(17, 17, 1, 2, 2),
(18, 18, 1, 4, 2),
(19, 19, 1, 2, 4),
(20, 20, 1, 2, 2),
(21, 21, 1, 4, 4),
(22, 22, 1, 2, 4),
(23, 23, 1, 1, 2),
(24, 24, 1, 4, 4),
(25, 25, 1, 4, 5),
(26, 26, 1, 5, 5),
(27, 27, 1, 5, 5),
(28, 28, 1, 6, 6),
(29, 29, 1, 6, 6),
(30, 30, 1, 1, 6),
(31, 31, 1, 7, 7),
(32, 32, 1, 6, 6),
(33, 33, 1, 1, 5),
(34, 34, 1, 5, 5),
(35, 35, 1, 1, 4),
(36, 36, 1, 1, 3),
(37, 37, 1, 7, 2),
(38, 38, 1, 7, 5),
(39, 39, 1, 7, 4),
(40, 40, 1, 7, 5);

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
