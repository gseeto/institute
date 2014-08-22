-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2013 at 11:03 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET FOREIGN_KEY_CHECKS=0;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=554 ;

--
-- Dumping data for table `action_items`
--

INSERT INTO `action_items` (`id`, `action`, `strategy_id`, `scorecard_id`, `who`, `when`, `status_type`, `comments`, `category_id`, `count`, `modified_by`, `modified`) VALUES
(34, ' Determine whether purpose statement needs to be refined', 7, 1, 2, '2011-06-08', 3, ' ', 1, 1, 1, '2013-01-25 00:04:01'),
(35, ' Refine positioning statement based on ramifications of refined purpose', 7, 1, 2, '2012-01-09', NULL, ' ', 1, 2, 1, '2013-01-31 06:31:52'),
(36, ' ', 7, 1, NULL, NULL, NULL, ' ', 1, 3, 1, '2013-01-24 23:38:17'),
(37, ' ', 7, 1, NULL, NULL, NULL, ' ', 1, 4, 1, '2013-01-24 23:38:18'),
(38, 'Update Who We Are Booklets to ensure they reflect our latest thinking and direction.', 8, 1, NULL, '2012-06-17', NULL, 'Don''t print more booklets until done, please. Thanks', 1, 1, NULL, '2012-12-10 04:41:16'),
(39, 'Add evaluations for Values and Foundational Principles to Home Office staff annual review template.', 8, 1, NULL, '2012-06-01', NULL, 'completed - can this be removed?<br />\nBJ: reviews not yet implemented. Leave in.', 1, 2, NULL, '2012-12-10 04:41:16'),
(40, 'Include evaluations for Values and Foundational Principles in leadership readiness evaluation.', 8, 1, NULL, '2012-05-24', NULL, 'I think we need a re-emphasis on leadership development in 2012. This will come up again as a tool in this process. (bj)', 1, 3, NULL, '2012-12-10 04:41:16'),
(41, ' Utilize Scorecard robustly to ensure that we implement our strategies consistent with Purpose.', 8, 1, NULL, '2012-01-30', NULL, 'We will be checking the scorecard each week, adding functionality, and seeing how it impacts our behavior.', 1, 4, NULL, '2012-12-10 04:41:16'),
(42, 'Enlist a team to design and develop governance principles', 9, 1, NULL, '2012-06-14', NULL, NULL, 1, 1, NULL, '2012-12-10 04:41:16'),
(43, 'Test with a group of potential people who could be involved in our long term governance.', 9, 1, NULL, '2012-06-11', NULL, 'Commetors / Reviewers:<br />\nGreg Yu, Charlie, Vase, Smith (Vine)<br />\nLaura Kent, Louis R, Jasper & Jari, Jodene (i4)<br />\nPossibles to use / share:<br />\nSandy Pollard, Gene & Karen Strite, Vince Siciliano,  Jonathan Campbell', 1, 2, NULL, '2012-12-10 04:41:16'),
(44, 'Report out to key governance stakeholders based on matrix on a quarterly basis.', 9, 1, NULL, '2012-07-31', NULL, 'Vine ongoing', 1, 3, NULL, '2012-12-10 04:41:16'),
(45, 'Put acting/probationary governance groups in place in key entities that comprise the household.', 9, 1, NULL, '2012-12-28', NULL, 'We have for Vine. We have some candidates identified for The Institute.<br />\nLaura Kent, Louis R, Jasper & Jari, Jodene (i4)<br />\nPossibles: Sandy Pollard, Gene & Karen Strite, Vince Siciliano, Caleb & Song ', 1, 4, NULL, '2012-12-10 04:41:16'),
(46, 'Discuss with HOT in which areas the Governance board can weigh in on decisions - within the context of understanding \\"I believe\\", \n\\"Elders and Deacons\\"', 9, 1, NULL, '2012-01-04', NULL, 'At annual planning.', 1, 5, NULL, '2012-12-10 04:41:16'),
(47, ' ', 9, 1, NULL, NULL, NULL, NULL, 1, 6, NULL, '2012-12-10 04:41:16'),
(48, 'HOT - take time to listen to God in prayer as a community.', 10, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, '2012-12-10 04:41:16'),
(49, 'Intercession team prays for all requests and gathers to pray for org.', 10, 1, NULL, NULL, NULL, NULL, 1, 2, NULL, '2012-12-10 04:41:16'),
(50, 'Integrate worship into our community activities.  ', 10, 1, NULL, '2012-12-24', NULL, NULL, 1, 3, NULL, '2012-12-10 04:41:16'),
(51, 'Publish a "where to find" document for all product resources.', 10, 1, NULL, '2011-12-14', NULL, '''Assisted by Kim Wilson<br />\nDA I don''t think I should be the primary.  GS handles the documents on Google and KW is product development. I feel I would just add to the chaos.', 1, 4, NULL, '2012-12-10 04:41:16'),
(52, 'Consider whether we should fast corporately. If so, determine schedule / initiatives. ', 10, 1, NULL, '2013-01-18', NULL, NULL, 1, 5, NULL, '2012-12-10 04:41:16'),
(53, 'Review Transforming Society to find the indicators of the manifest presence of God that apply to The Institute (brainstorming, workshop).', 10, 1, NULL, '2013-01-16', NULL, 'DA to schedule workshop, session', 1, 6, NULL, '2012-12-10 04:41:16'),
(54, 'Integrate those interested in intercession - make our needs known via prayer updates, twice monthly meetings, at training events and TBW.', 10, 1, NULL, NULL, NULL, 'Intercession updates - via iContact<br />\nTwice monthly prayer meetings<br />\nTraining coverage - delegated<br />\nTBW - delegated', 1, 7, NULL, '2012-12-10 04:41:16'),
(55, 'As an exercise, <br />\n1)define each value personally, <br />\n2)then get together and construct definitions that encompass each persons thoughts that everyone agrees to. Scripture being the deciding factor in any disagreement in definition.<br />\n3)Lay down misconceptions contrary to the definitions.', 11, 1, NULL, '2012-02-28', NULL, 'Values of an organization is an important driver of impact. More importantly for the purpose of the organization.<br />\nUnderstanding<br />\nCo-ownership of the values<br />\nEffective flow through to the community in innovative and creative ways to educate.<br />\nPractical application', 1, 1, NULL, '2012-12-10 04:41:16'),
(56, 'Document the values definitions.', 11, 1, NULL, '2012-02-28', NULL, 'Some of these values are:<br />\nService<br />\nExcellence<br />\nIntegration<br />\nTrust<br />\nHospitality<br />\nRelationship<br />\nFaith ', 1, 2, NULL, '2012-12-10 04:41:16'),
(57, 'Update the website accordingly ', 11, 1, NULL, '2012-03-15', NULL, 'If the values are the same as The Institute, then this is already done.', 1, 3, NULL, '2012-12-10 04:41:16'),
(58, 'Come up with practical, innovative ways in which to walk out the values in community, that draws others into walking out these values themselves. ', 11, 1, NULL, '2012-03-31', NULL, NULL, 1, 4, NULL, '2012-12-10 04:41:16'),
(59, 'Develop follow-up process and assessment to ensure products are resulting in desired impact.', 12, 1, NULL, '2012-04-01', NULL, 'Assessment stage.<br />\nForms completed. Need to add to SOP for Convergence & LEMON Accreditation Courses as well as rep training, etc. However, implementation is sporadic. And, I''d like to do a six month follow-up for Inst engagements, training, etc.<br />\nWill complete as needed.', 2, 1, NULL, '2012-12-10 04:41:16'),
(60, 'Define, simplify and publish housing locations for each product resource.', 12, 1, NULL, '2012-06-30', NULL, 'Looks like iLearning will make the most sense, but I don''t have all of the structures up yet...', 2, 2, NULL, '2012-12-10 04:41:16'),
(61, 'Update Product Abstracts to ensure:\n- all five senses are being incorporated into product offerings\n- each product has a strong on-line delivery mechanism to expand reach\n- ensure we are facilitating and not teaching so students really learn\n- look for multi-sensory ways to be available 24x7 for people who want to find us\n- include question for field requests ', 12, 1, NULL, '2012-12-31', NULL, 'Seemingly low corporate priority. Tackle on an on-going basis as we make product changes. Need to reiterate and reincorporate this into the product abstracts / meetings if we deem it as important.', 2, 3, NULL, '2012-12-10 04:41:16'),
(62, 'Refine product prioritization process to include on-going product improvement initiatives and account for effort against existing product execution.', 12, 1, NULL, NULL, NULL, 'Have been included in Product Prioritization List. Need to check in periodically to ensure we''re delivering against priorities. Scorecard should manage daily going forward. ', 2, 4, NULL, '2012-12-10 04:41:16'),
(63, 'Gain better understanding of resource allocation/what we have bandwidth for ', 12, 1, NULL, '2011-08-01', NULL, 'Took best guess - we shall see...', 2, 5, NULL, '2012-12-10 04:41:16'),
(64, 'Develop into replicable format intercessory products - Prayer as a Corporate Competence, Praying through P''s, etc.', 12, 1, NULL, NULL, NULL, 'I am not sure this is a good use of time since it isn''t a demanded product at this time - and we haven''t been charging for this initiative so it isn''t profitable.', 2, 6, NULL, '2012-12-10 04:41:16'),
(65, 'Plan Book Launch events for Cycles, Repurposing Capital and Transforming Society when they are complete. ', 14, 1, NULL, '2012-07-04', NULL, ' Can we do a book launch when we don''t have books? [bj]', 2, 1, NULL, '2012-12-10 04:41:16'),
(66, 'Identify additional on-line distribution points for our books. ', 14, 1, NULL, '2012-09-14', NULL, 'Now considering using online magazines as vehicle.', 2, 2, NULL, '2012-12-10 04:41:16'),
(67, 'Develop a plan to develop most popular books into podcasts or audiobooks (particularly for nations such as Indonesia and Nigeria who are less likely to read). ', 14, 1, NULL, '2012-09-14', NULL, 'Have estimate from Bali firm; seems very well priced, btw (esp if we take out custom music.)<br />\nBJ: Wondering about linking to this from zines.', 2, 3, NULL, '2012-12-10 04:41:16'),
(68, 'Ensure all completed publications are available in eBooks for quick and cheaper distribution.\n(eg. Kindle, Nook)', 14, 1, NULL, '2012-01-31', NULL, 'assisted by DAndrews, Gareth', 2, 4, NULL, '2012-12-10 04:41:16'),
(69, 'Develop PR campaign for book releases?\n(Did Jennifer Beale have insight into  this?) ', 14, 1, NULL, '2012-02-27', NULL, NULL, 2, 5, NULL, '2012-12-10 04:41:16'),
(70, ' Figure out how to have books for sale at events we do. Not having physical books hurts sales, it seems.', 14, 1, NULL, '2012-06-15', NULL, 'Use special codes for "Sale" on e-books during the course of a conference.', 2, 6, NULL, '2012-12-10 04:41:16'),
(71, 'Calendaring and presenting recruiting nights', 15, 1, NULL, '2013-02-02', NULL, 'Such as the Convergence nights', 2, 1, NULL, '2012-12-10 04:41:16'),
(72, 'Galvanizing alumni connecters to assist in recruiting', 15, 1, NULL, '2013-02-02', NULL, 'Ongoing', 2, 2, NULL, '2012-12-10 04:41:16'),
(73, 'Engaging potential new markets for recruits', 15, 1, NULL, '2012-12-31', NULL, 'eg. Bettenbough Homes, Olivette', 2, 3, NULL, '2012-12-10 04:41:16'),
(74, 'Speaking opportunities at churches, non profits, missions org, conferences, etc.', 15, 1, NULL, '2013-02-02', NULL, NULL, 2, 4, NULL, '2012-12-10 04:41:16'),
(75, 'Setting up websites with the appropriate information/messaging', 15, 1, NULL, '2011-12-01', NULL, NULL, 2, 5, NULL, '2012-12-10 04:41:16'),
(76, 'Collecting training deposits and reviewing applications', 15, 1, NULL, '2012-07-28', NULL, NULL, 2, 6, NULL, '2012-12-10 04:41:16'),
(77, 'Entering new trainees into Salesforce', 15, 1, NULL, '2012-08-11', NULL, NULL, 2, 7, NULL, '2012-12-10 04:41:16'),
(78, 'Scheduling the training lessons, assignments (i-learning or other outside assignments) and assigning facilitators', 15, 1, NULL, '2013-01-31', NULL, 'weekly in-person and remote training', 2, 8, NULL, '2012-12-10 04:41:16'),
(79, 'Organizing hospitality team (meal prep, setup, parking, childcare, cleanup crew)', 15, 1, NULL, '2012-10-13', NULL, NULL, 2, 9, NULL, '2012-12-10 04:41:17'),
(80, 'Presenting/facilitating the lessons ', 15, 1, NULL, '2013-01-31', NULL, NULL, 2, 10, NULL, '2012-12-10 04:41:17'),
(81, 'Organizing events outside of training to build community. ', 15, 1, NULL, '2012-12-31', NULL, NULL, 2, 11, NULL, '2012-12-10 04:41:17'),
(82, 'Forums used as a recruiting tool ', 15, 1, NULL, '2012-10-13', NULL, NULL, 2, 12, NULL, '2012-12-10 04:41:17'),
(83, 'Organizing and implementing TBW', 15, 1, NULL, '2012-09-16', NULL, 'working with Dena Andrews', 2, 13, NULL, '2012-12-10 04:41:17'),
(84, 'Marking homework and providing feedback to trainees.', 15, 1, NULL, '2013-01-31', NULL, 'working with remote trainers and coaches', 2, 14, NULL, '2012-12-10 04:41:17'),
(85, 'Informing trainees of potential next steps post training.', 15, 1, NULL, '2012-12-31', NULL, 'Secondary products such as Influence Through Integration, Ventures, etc.<br />\nLL: ongoing community is key, how best to continue engaging them? ', 2, 15, NULL, '2012-12-10 04:41:17'),
(86, 'Implement online exit assessment (10F assessment) at the end of training and six months later', 15, 1, NULL, '2012-10-31', NULL, 'No one has availed themselves of it yet, but we need to make the follow on calls. (BJ)<br />\n<br />\n', 2, 16, NULL, '2012-12-10 04:41:17'),
(87, 'Creating Classes and lessons in i-Learning and maintaining from an Administration perspective, as well as providing Help Desk style Support. ', 15, 1, NULL, '2012-02-06', NULL, NULL, 2, 17, NULL, '2012-12-10 04:41:17'),
(88, 'Review and commenting of student scorecards to help them develop their skill.', 15, 1, NULL, '2012-02-16', NULL, NULL, 2, 18, NULL, '2012-12-10 04:41:17'),
(89, ' Communication to trainees on homework, announcement pre- and post- weekly lessons', 15, 1, NULL, '2013-01-31', NULL, NULL, 2, 19, NULL, '2012-12-10 04:41:17'),
(90, 'Training coaches to support their triplet ', 15, 1, NULL, '2013-01-31', NULL, NULL, 2, 20, NULL, '2012-12-10 04:41:17'),
(91, ' Coaching trainees to encourage, support and hold them accountable', 15, 1, NULL, '2013-01-31', NULL, NULL, 2, 21, NULL, '2012-12-10 04:41:17'),
(92, ' Preparing next cycle training agenda', 15, 1, NULL, '2013-03-31', NULL, NULL, 2, 22, NULL, '2012-12-10 04:41:17'),
(93, ' Coordinating during the day of training (timing, working with trainers, working with hospitality team, etc) both remote and in-person', 15, 1, NULL, '2013-01-23', NULL, NULL, 2, 23, NULL, '2012-12-10 04:41:17'),
(94, 'Influence through Integration: Preparing 2nd pilot cycle.  Recruiting alumni participants, agenda, etc.', 15, 1, NULL, '2013-01-31', NULL, NULL, 2, 24, NULL, '2012-12-10 04:41:17'),
(95, 'Fix bugs that are found in the online scorecard ', 16, 1, NULL, '2012-01-31', NULL, '- Fixed IE display issue in Resource Management.<br />\n- Fix calendar issue.<br />\n- Fix Issue: when associating misc action items I need to do a recount.', 2, 1, NULL, '2012-12-10 04:41:17'),
(96, 'Add historical task completion analysis in Resource Management.', 16, 1, NULL, '2012-01-31', NULL, NULL, 2, 2, NULL, '2012-12-10 04:41:17'),
(97, 'Apply usability design (interaction and look and feel) to the online scorecard.', 16, 1, NULL, '2012-01-31', NULL, NULL, 2, 3, NULL, '2012-12-10 04:41:17'),
(98, 'Implement the usability design suggestions.', 16, 1, NULL, '2012-02-08', NULL, 'Moved the design as it stands to the production scorecard.', 2, 4, NULL, '2012-12-10 04:41:17'),
(99, 'Solicit feedback from users for scorecard improvement.', 16, 1, NULL, '2012-03-29', NULL, 'changed this to ongoing.', 2, 5, NULL, '2012-12-10 04:41:17'),
(100, 'Add archive facility to scorecard to allow snap shot of scorecard and "elimination" of completed strategies.', 16, 1, NULL, '2012-08-15', NULL, NULL, 2, 6, NULL, '2012-12-10 04:41:17'),
(101, 'Use scorecard on a weekly basis to track performance and tasks.', 16, 1, NULL, '2012-01-16', NULL, NULL, 2, 7, NULL, '2012-12-10 04:41:17'),
(102, 'Add additional option under "status" to allow the specification of ongoing action items.', 16, 1, NULL, '2012-01-10', NULL, NULL, 2, 8, NULL, '2012-12-10 04:41:17'),
(103, 'Under individual resource management, add table of tasks per person modified in the last week.', 16, 1, NULL, '2012-01-10', NULL, NULL, 2, 9, NULL, '2012-12-10 04:41:17'),
(104, 'Allow people to opt-out of automated email reminders.', 16, 1, NULL, '2012-01-31', NULL, 'Looks like it''s working', 2, 10, NULL, '2012-12-10 04:41:17'),
(105, 'Add links under tables generated by "Tactical Dashboard" and "Resource Management" that will take you to the correct page and strategy to give you context for the action item mentioned.', 16, 1, NULL, '2012-01-30', NULL, NULL, 2, 11, NULL, '2012-12-10 04:41:17'),
(106, 'Add expanded description of action items covered in the Individual Statistics under Resource Management. ', 16, 1, NULL, '2012-01-30', NULL, NULL, 2, 12, NULL, '2012-12-10 04:41:17'),
(107, 'Add a "miscellaneous" tab where people can add tasks that are unassociated with any particular strategy? ', 16, 1, NULL, '2012-01-31', NULL, 'Added it, along with the ability to associate to an existing strategy if required.', 2, 13, NULL, '2012-12-10 04:41:17'),
(108, 'Fix issue where "no priority" results in a broken link. ', 16, 1, NULL, '2012-01-31', NULL, NULL, 2, 14, NULL, '2012-12-10 04:41:17'),
(109, 'Add miscellaneous action items to Resource Management Graphs.<br />\nEnsure that individual graphs do not display completed items.', 16, 1, NULL, '2012-02-01', NULL, NULL, 2, 15, NULL, '2012-12-10 04:41:17'),
(110, 'Ensure that miscellaneous action items get displayed in the Tactical Dashboard "By Owner" tables', 16, 1, NULL, '2012-01-31', NULL, NULL, 2, 16, NULL, '2012-12-10 04:41:17'),
(111, 'Add functionality to allow deleting of strategies ', 16, 1, NULL, '2012-02-15', NULL, NULL, 2, 17, NULL, '2012-12-10 04:41:17'),
(112, 'Add priority legend to score card as a popup', 16, 1, NULL, '2012-03-08', NULL, NULL, 2, 18, NULL, '2012-12-10 04:41:17'),
(113, 'Change action item status to percentage instead of graphic status button.', 16, 1, NULL, '2012-03-08', NULL, NULL, 2, 19, NULL, '2012-12-10 04:41:17'),
(114, 'When creating a new action item, strategy or KPI, move to location of new object.', 16, 1, NULL, '2012-09-04', NULL, 'There''s a bug to track here.', 2, 20, NULL, '2012-12-10 04:41:17'),
(115, 'Redo the summary page to use relative positioning.', 16, 1, NULL, '2012-03-09', NULL, NULL, 2, 21, NULL, '2012-12-10 04:41:17'),
(116, 'When creating a strategy, fill it in with an initial instruction: <put new strategy here>', 16, 1, NULL, '2012-03-16', NULL, NULL, 2, 22, NULL, '2012-12-10 04:41:17'),
(117, 'Reduce action item reminders 1 week out to one reminder 7 days in advance and then no more reminders until the due date.', 16, 1, NULL, '2012-03-16', NULL, 'Implemented. Wait for daily reminders to verify. Behaviour is now: 1 email a week from the due date, then regular emails once the due date has passed and there''s been no movement.', 2, 23, NULL, '2012-12-10 04:41:17'),
(118, 'Provide more information in the overdue section in Resource Management and links as well.', 16, 1, NULL, '2012-03-31', NULL, NULL, 2, 24, NULL, '2012-12-10 04:41:17'),
(119, 'Add an additional row in the timeline snapshot to include recurring action items.', 16, 1, NULL, '2012-04-02', NULL, NULL, 2, 25, NULL, '2012-12-10 04:41:17'),
(120, 'Move the legend to each strategy so it''s closer at hand.', 16, 1, NULL, '2012-04-02', NULL, NULL, 2, 26, NULL, '2012-12-10 04:41:17'),
(121, 'Fix the following in the scorecard:<br />\n- changing the email in the user profile has a problem when there''s the same user across different organizations.<br />\n- Remove Legend from Summary and empty P''s', 16, 1, NULL, '2012-03-30', NULL, 'Just verify that the cron job sends to the right email.', 2, 27, NULL, '2012-12-10 04:41:17'),
(122, 'Add functionality under the User Profile. <br />\nChange ''User Profile'' to ''My View''<br />\nAdd a "My top 5" which picks the top 5 action items based on priority and due date. ', 16, 1, NULL, '2012-03-30', NULL, NULL, 2, 28, NULL, '2012-12-10 04:41:17'),
(123, ' From within the Resource Mngmt tab statistics, provide the ability to edit/change completion, priority, etc. (based on context)', 16, 1, NULL, '2012-04-27', NULL, 'Thanks, G! (This allows us to whack down our lists, like good O''s)<br />\nDone with some limitations:<br />\n1) I only allowed changing status for most.<br />\n2) For overdue items I allowed the additional changing of ''when''<br />\n3) Can''t allow changing of priority - since it''s on a per strategy basis, not on each action item.', 2, 29, NULL, '2012-12-10 04:41:17'),
(124, 'Add Priority Legend to Resource Management/Task Completion section ', 16, 1, NULL, '2012-04-16', NULL, NULL, 2, 30, NULL, '2012-12-10 04:41:17'),
(125, 'Redo the dialogs that pop up for Transforming Society page.<br />\nAttempt to use jquery''s dialogs for greater usability. ', 16, 1, NULL, '2012-05-10', NULL, NULL, 2, 31, NULL, '2012-12-10 04:41:17'),
(126, 'Refresh just the graphs for societal transformation when user makes an association with strategy ', 16, 1, NULL, '2012-05-23', NULL, NULL, 2, 32, NULL, '2012-12-10 04:41:17'),
(127, 'On-board people onto the Online scorecard and walk them through how to use.', 16, 1, NULL, '2012-05-16', NULL, 'Laura Kent, Sarah Lin, the Egypt folk, the Intensive people, etc..', 2, 33, NULL, '2012-12-10 04:41:17'),
(128, 'Investigate rewriting scorecard with different technology so that it''s more robust and attractive. ', 16, 1, NULL, '2012-08-30', NULL, 'Sencha, qcodo', 2, 34, NULL, '2012-12-10 04:41:17'),
(129, 'Convert the daily reminders to a digest form that is a combination of the "My View" and "Resource Management".', 16, 1, NULL, '2012-07-30', NULL, NULL, 2, 35, NULL, '2012-12-10 04:41:17'),
(130, 'Remove the "Opt out" of weekly report option in the My View section.', 16, 1, NULL, '2012-08-27', NULL, NULL, 2, 36, NULL, '2012-12-10 04:41:17'),
(131, 'Automatic notification when someone else assigns an action to you', 16, 1, NULL, '2012-08-27', NULL, NULL, 2, 37, NULL, '2012-12-10 04:41:17'),
(132, 'Under "Resource Management" Add a Forecast section.<br />\n10 - Day forecast. Pull by due date all action items due in next 10 days. ', 16, 1, NULL, '2012-09-03', NULL, NULL, 2, 38, NULL, '2012-12-10 04:41:17'),
(133, 'Under "Resource Management" Add a Forecast section.<br />\n30 - Day forecast. Pull by due date all action items due in next 30 days. ', 16, 1, NULL, '2012-09-03', NULL, NULL, 2, 39, NULL, '2012-12-10 04:41:17'),
(134, 'Add a Stale Report under Resource Management that lists all items untouched for over 30 days.', 16, 1, NULL, '2012-09-10', NULL, NULL, 2, 40, NULL, '2012-12-10 04:41:18'),
(135, 'Order Stale reports by "last modified", and Forecasts by "when".', 16, 1, NULL, '2012-08-28', NULL, NULL, 2, 41, NULL, '2012-12-10 04:41:18'),
(136, 'Add a field for Recurring, so we can specify daily, weekly or monthly.', 16, 1, NULL, '2012-08-28', NULL, NULL, 2, 42, NULL, '2012-12-10 04:41:18'),
(137, 'Discuss with Brett and obtain a full listing of available Institute products - both the ones we''re familiar with, and those not as often used. ', 17, 1, NULL, '2012-01-30', NULL, 'In particular, the additional modules of LEMON', 2, 1, NULL, '2012-12-10 04:41:18'),
(138, 'Compare existing list of products with feedback of pain points and blocking issues expressed by potential clients. ', 17, 1, NULL, '2012-01-30', NULL, NULL, 2, 2, NULL, '2012-12-10 04:41:18'),
(139, 'Market research to determine pricing for products (that will meet country specific needs) to the Indian market. ', 17, 1, NULL, '2012-02-28', NULL, NULL, 2, 3, NULL, '2012-12-10 04:41:18'),
(140, 'Develop collateral (brochures, etc) that can be used to sell/market the products.', 17, 1, NULL, '2012-02-28', NULL, 'If a graphic designer is required, perhaps consider an exchange of services... or use Home Office resources', 2, 4, NULL, '2012-12-10 04:41:18'),
(141, 'Determine the process of new product development and begin to initiate the process.<br />\nThe process will involve product filter, pricing, and product architecture.', 18, 1, NULL, '2012-03-30', NULL, 'Obtain process from Kim. In particular the product filter', 2, 1, NULL, '2012-12-10 04:41:18'),
(142, 'Develop content and curriculum based on HR best practices and fresh revelation from God regarding the "body being many parts" ', 18, 1, NULL, '2012-03-30', NULL, NULL, 2, 2, NULL, '2012-12-10 04:41:18'),
(143, ' Contact Hector regarding video footage and promotional material ', 19, 1, NULL, '2012-07-02', NULL, NULL, 2, 1, NULL, '2012-12-10 04:41:18'),
(144, ' Update Salesforce with latest contacts  being added to the campaign. ', 19, 1, NULL, '2012-07-06', NULL, 'With Lyn helping', 2, 2, NULL, '2012-12-10 04:41:18'),
(145, ' Decide on the date and begin recruiting', 19, 1, NULL, '2012-08-24', NULL, NULL, 2, 3, NULL, '2012-12-10 04:41:18'),
(146, ' Work with Vine Associates to build Scholarship Fund', 19, 1, NULL, '2012-11-30', NULL, NULL, 2, 4, NULL, '2012-12-10 04:41:18'),
(147, ' Recruit hospitali helpers', 19, 1, NULL, NULL, NULL, NULL, 2, 5, NULL, '2012-12-10 04:41:18'),
(148, ' Review the teaching materials and line up speakers', 19, 1, NULL, '2012-09-27', NULL, NULL, 2, 6, NULL, '2012-12-10 04:41:18'),
(149, 'Post Intensive, email then and assist in on-boarding scorecard for all those that request it.', 19, 1, NULL, NULL, NULL, NULL, 2, 7, NULL, '2012-12-10 04:41:18'),
(150, 'Brett to create assessment questionnaire for Transforming Society', 20, 1, NULL, '2012-07-04', NULL, 'GS: Need to prioritize this Strategy.<br />\n', 2, 1, NULL, '2012-12-10 04:41:18'),
(151, 'Discuss and identify effective graphical charts to convey relevant information on the data gathered ', 20, 1, NULL, '2012-07-20', NULL, 'Gareth to be part of the conversation - since he''ll be trying to implement<br />\nGS: Want to prioritze and set a date?<br />\nIn the interim I''m pushing all my task dates out further... :)', 2, 2, NULL, '2012-12-10 04:41:18'),
(152, 'Design Assessment layout - Assessment form, report generation, and administrative view of information.', 20, 1, NULL, '2012-11-20', NULL, NULL, 2, 3, NULL, '2012-12-10 04:41:18'),
(153, 'Implementation of the online Assessments', 20, 1, NULL, '2012-11-22', NULL, 'We may need to use in Saipan as a test. Not sure of date... August, perhaps.', 2, 4, NULL, '2012-12-10 04:41:18'),
(154, 'QA and testing of the Online Assessments by Home Office Team. Sign off on approval by Kim. ', 20, 1, NULL, '2012-11-27', NULL, 'May have to be sooner.', 2, 5, NULL, '2012-12-10 04:41:18'),
(155, 'Development of marketing blurb/product information for this new product offering, and pricing decided upon.', 20, 1, NULL, '2012-11-28', NULL, NULL, 2, 6, NULL, '2012-12-10 04:41:18'),
(156, 'Creation of web pages on inst.net advertising new product offering.', 20, 1, NULL, '2012-11-30', NULL, NULL, 2, 7, NULL, '2012-12-10 04:41:18'),
(157, 'action is what gets put here', 21, 1, NULL, '2013-01-15', NULL, 'comments', 3, 1, 1, '2013-01-25 01:04:41'),
(158, 'Update all Institute communications to reflect new positioning (not a consulting organization, but an Institute.)', 22, 1, NULL, NULL, NULL, 'Develop as needed - assisted by Huey.', 3, 1, NULL, '2012-12-10 04:41:18'),
(159, 'Develop clear and simple communication about our Financial Structure and how the various entitites interact. ', 22, 1, NULL, '2012-05-31', NULL, 'Assisted by Kim Wilson. Thought - What if Vine didn''t exist? (similar to - what if God had only your BUSINESS to reach the rest of the world - how would you do it?)', 3, 2, NULL, '2012-12-10 04:41:18'),
(160, 'Protect Tagline through Trademark in targeted nations.', 22, 1, NULL, '2012-06-29', NULL, 'Have to revisit: $7,000 to redo all of them by Jan 15th', 3, 3, NULL, '2012-12-10 04:41:18'),
(161, 'Connect on-line assessments to inst.net and make them available for on-line purchase. ', 23, 1, NULL, '2011-09-21', NULL, 'DONE', 4, 1, NULL, '2012-12-10 04:41:18'),
(162, 'Develop a landing site for each publication ', 23, 1, 5, '2011-03-21', NULL, 'DONE<br />\nAlthough still need to update for new publications', 4, 2, 1, '2013-01-25 00:07:49'),
(163, 'Create vehicles for pushing updates/new content from website. E.g., people subscribing to blog changes via RSS feeds ', 23, 1, NULL, '2011-09-15', NULL, 'might only make sense for repurposing.biz. <br />\nInst.net shouldn''t change that regularly.<br />\nThere is currently an rss page now on repurposing.biz that allows users to subscribe to rss feeds for certain pages in repurposing.biz', 4, 3, 1, '2013-01-25 00:05:10'),
(164, 'Migrate links for training from repurposing.biz site to inst.net ', 23, 1, NULL, '2011-05-10', NULL, NULL, 4, 4, NULL, '2012-12-10 04:41:18'),
(165, 'Build inst.net landing pages for India, Indonesia and South Africa ', 23, 1, NULL, '2011-06-20', NULL, 'India already built. Just needs to be made public. Others not necessary yet.', 4, 5, NULL, '2012-12-10 04:41:18'),
(166, 'Post partnerships and overview of partners on our websites. ', 23, 1, NULL, '2012-01-18', NULL, 'with help from Gareth', 4, 6, NULL, '2012-12-10 04:41:18'),
(167, 'Contact and purchase domain names (eg. www.repurposing.com)so that we can reserve for the future as we generate content in all the repurposing spheres', 23, 1, NULL, '2011-10-31', NULL, 'Just renewed again.', 4, 7, NULL, '2012-12-10 04:41:18'),
(168, 'Construct a matrix of possible organizations we could cross hatch with from a web site perspective.', 23, 1, NULL, '2012-02-29', NULL, 'Vicki Norris, Power Character, Positive Impact, Heavenly Touch Ministries, GMO, Gene Strite, Olivet, the Greeks and Germans, Unashamedly Ethical', 4, 8, NULL, '2012-12-10 04:41:18'),
(169, 'Add additional page for new Repurposing Business product (Repurposing Business Executive Intensive)onto inst.net', 23, 1, NULL, '2012-02-29', NULL, NULL, 4, 9, NULL, '2012-12-10 04:41:18'),
(170, 'Modify repurposing.biz to remove dates from training and point to inst.net for more information.<br />\nAlso update the Venture pages.', 23, 1, NULL, '2012-04-02', NULL, NULL, 4, 10, NULL, '2012-12-10 04:41:18'),
(171, 'Adding additional page for Infuence Through Integration onto inst.net under training', 23, 1, NULL, '2012-08-10', NULL, NULL, 4, 11, NULL, '2012-12-10 04:41:18'),
(172, 'Repurposing.biz Navigation Bar - change Font (larger and different color) to enhance usability', 23, 1, NULL, '2012-09-11', NULL, NULL, 4, 12, NULL, '2012-12-10 04:41:18'),
(173, 'Repurposing.biz Add bigger links to social media sites (icons) on the home page', 23, 1, NULL, NULL, NULL, NULL, 4, 13, NULL, '2012-12-10 04:41:18'),
(174, 'On Repurposing.biz - Have a link on the front page that directs people to inst.net and training ', 23, 1, NULL, NULL, NULL, 'GS - Passing to you first Kim to Ok it and perhaps to provide a small blurb (one sentence) and maybe a pretty picture. Do you want The Institute''s logo included? After the decision and the requested resources, you can assign to me to implement.', 4, 14, NULL, '2012-12-10 04:41:18'),
(175, 'On inst.net Highlight Training on the Front page - since it''s not prominent enough given our emphasis on it.', 23, 1, NULL, NULL, NULL, 'GS - Passing to you first Kim. :) Same resource required as for repurposing.biz (a simple sentence and some catchy pic).<br />\nThen pass on to me to implement.', 4, 15, NULL, '2012-12-10 04:41:18'),
(176, 'Change the inst.net navigation order to reflect order of importance.(most important to the Left ? Tomorrow?s challenges, Training, Services, Publications,Events,News)', 23, 1, NULL, '2012-09-11', NULL, NULL, 4, 16, NULL, '2012-12-10 04:41:18'),
(177, 'Add search functionality to inst.net. ', 23, 1, NULL, '2012-09-13', NULL, 'Google provides some sort of service. Investigate and implement on inst.net.<br />\nIf it''s easy/possible, also do one for repurposing.biz<br />\nDetails can be found on "Google site Search" - http://www.google.com/enterprise/search/products_gss.html<br />\nAdded to the front page', 4, 17, NULL, '2012-12-10 04:41:18'),
(178, 'Create an on-going process for capturing and sharing client testimonies. (See process strategy #4.)', 24, 1, NULL, '2012-10-13', NULL, 'This is recurring, but can we get some stats on this? Can you report each month? Thanks. [bj]', 4, 1, NULL, '2012-12-10 04:41:18'),
(179, 'Cross-link with web-based partners who appeal to our target audiences. <br />\n(BAM Match, Inside Work, Marketplace Leaders, BAM Networks)', 24, 1, NULL, '2011-06-30', NULL, 'Brett, Jackson, Brett to liase.<br />\nGS - I''ve made moves on this already. Only got 2 bites. Ball''s currently in their court. Moving this to done for now.', 4, 2, NULL, '2012-12-10 04:41:18'),
(180, 'Optimize opportunities to advertise on related websites and add links to their sites on ours. <br />\n(e.g. Post articles written by rep staff & alumni as well as Brett''s devotionals on "Inside Work" website (Dan Wooldridge), etc.)', 24, 1, NULL, '2011-03-01', NULL, 'in progress', 4, 3, NULL, '2012-12-10 04:41:18'),
(181, 'Understand how to more effectively use FB or mobile apps to help us go viral. (Key off Transforming Society)', 24, 1, NULL, '2012-12-20', NULL, 'Will require research into mobile apps?<br />\nGS: Perhaps a web application is the better approach. Investigate sencha for thick client javascript implementation', 4, 4, NULL, '2012-12-10 04:41:18'),
(182, 'Optimize use of YouTube opportunities to push our rep promotion videos.', 24, 1, NULL, '2011-12-15', NULL, 'This needs more concrete action items from Linda Fong <br />\n- Optimizing = uploading videos and strategy for dissemination', 4, 5, NULL, '2012-12-10 04:41:18'),
(183, 'Construct a Do''s & Don''t Guide on Social Media, Blogging, and Audience communication (You can''t offer specials on FB - just as a note - prizes are illegal)', 24, 1, NULL, '2011-12-15', NULL, 'http://www.toprankblog.com/2011/12/20-social-media-dos-donts/', 4, 6, NULL, '2012-12-10 04:41:18'),
(184, 'Deploy country-appropriate communication tools for non-US locations.', 24, 1, NULL, '2012-12-14', NULL, 'Thomas, please evaluate for India. (text etc.) See free SMS service for India from GOOGLE<br />\nWe will need to look at SA and Indo.', 4, 7, NULL, '2012-12-10 04:41:18'),
(185, ' Streamline Social Media outlets and processes', 24, 1, NULL, '2012-05-25', NULL, 'Work with Jackson - find social media aggregator', 4, 8, NULL, '2012-12-10 04:41:18'),
(186, ' Test alternate ways to distribute e-books. (Besides the PDF, do we have kindle and other formats?)', 25, 1, NULL, '2012-01-31', NULL, NULL, 4, 1, NULL, '2012-12-10 04:41:18'),
(187, 'Create podcast platform that provides the framework to deseminate information in a new way ', 25, 1, NULL, '2012-01-11', NULL, 'The beginnings of a framework in place on repurposing.biz<br />\nIs there anything more I need to do here?<br />\nGive me content and I will put it up.', 4, 2, NULL, '2012-12-10 04:41:18'),
(188, 'Upload and publish relevant podcasts categorized by topic and product.', 25, 1, NULL, '2012-01-31', NULL, 'Clarifying with GS how to podcast/upload', 4, 3, NULL, '2012-12-10 04:41:18'),
(189, 'Establish a process for Inventorying of existing audio resources and new resources as they occur', 25, 1, NULL, NULL, NULL, 'Dena to follow up. JN filed on server but no back up documetatation of what is where - so I reduced the status to 25%.  This is a great intern project.', 4, 4, NULL, '2012-12-10 04:41:18'),
(190, 'Creation of new or missing audio resources for podcasting.', 25, 1, NULL, '2012-02-15', NULL, 'Will do once Gareth has mechanism :)', 4, 5, NULL, '2012-12-10 04:41:18'),
(191, 'Advertise e-book specials off the inst.net home page to provide greater visibility', 25, 1, NULL, '2012-01-11', NULL, NULL, 4, 6, NULL, '2012-12-10 04:41:18'),
(192, 'Investigate how to automatically generate password protected PDFs in order to automate sale of eBooks', 25, 1, NULL, '2012-02-14', NULL, NULL, 4, 7, NULL, '2012-12-10 04:41:18'),
(193, 'Add soft copy electronic version of Convergence onto the website.', 25, 1, NULL, '2012-02-28', NULL, NULL, 4, 8, NULL, '2012-12-10 04:41:18'),
(194, 'Enable complete automated purchase of assessments. Upon purchase, and account is automatically created and an email is sent to them.', 25, 1, NULL, '2012-05-18', NULL, 'Done for the LEMON and Convergence Assessments<br />\nGS: Still need to do for the 10-Ps?', 4, 9, NULL, '2012-12-10 04:41:18'),
(195, 'Either redo the inst.net home page or create a new specific Assessment landing page where all the assessments are available or accessible from the one page. ', 25, 1, NULL, '2012-05-16', NULL, 'Talk to Huey', 4, 10, NULL, '2012-12-10 04:41:18'),
(196, 'Leverage existing resources - specifically the Partnering Assessment by putting a version up online.', 25, 1, NULL, '2012-04-04', NULL, 'Need some clarification on what sort of reports we want to generate.', 4, 11, NULL, '2012-12-10 04:41:18'),
(197, 'Consolidate assessments under one common directory.<br />\nThis will mean moving the 10-P, Convergence, LEMON all under the same sub-directory.', 25, 1, NULL, '2012-04-16', NULL, NULL, 4, 12, NULL, '2012-12-10 04:41:18'),
(198, 'Update the Partnering Assessment with changes suggested by Brett ', 25, 1, NULL, '2012-04-13', NULL, NULL, 4, 13, NULL, '2012-12-10 04:41:18'),
(199, 'Collect additional sub-group question to provide future data to slice by.', 25, 1, NULL, '2012-04-04', NULL, 'subgroups (PR/Sales/Marketing, HR/Training, Finance, Prod Dev/Engineering, Executives, administration, other)', 4, 14, NULL, '2012-12-10 04:41:18'),
(200, 'Add Partnering reports, viewable by Administrator.', 25, 1, NULL, '2012-04-09', NULL, '7 reports:<br />\nIndividual Company spider charts (2),<br />\nComparison spider charts for Desire and Ability,<br />\nSpinal chart for each individual company<br />\nSpinal chart aggregated for the company<br />\n<br />\nTables:<br />\nfor each Company, values and gaps for each P<br />\nTop 3 Ps for each company based on results.', 4, 15, NULL, '2012-12-10 04:41:18'),
(201, 'Fix bug to allow bulk purchase of eBooks.', 25, 1, NULL, '2012-04-13', NULL, NULL, 4, 16, NULL, '2012-12-10 04:41:18'),
(202, 'Update Brett''s video to repurposing.biz', 25, 1, NULL, '2012-01-31', NULL, NULL, 4, 17, NULL, '2012-12-10 04:41:18'),
(203, 'Add Lemon ebook to inst.net', 25, 1, NULL, '2012-09-18', NULL, NULL, 4, 18, NULL, '2012-12-10 04:41:18'),
(204, 'Cross-refer partners on our websites (and us on theirs).\n(Bethel, Apostles in the Marketplace, Os Hilman, Power Character, Call to All, Unashamedly Ethical) ', 26, 1, NULL, '2012-01-31', NULL, 'Mike Frank has requested a link; spoke with Robbie (1.12.12) and Amber, their daughter, will contact us.<br />\n<br />\nGS: Same as Presence strategy2, AI 2.<br />\nAlthough If Brett has time to sort something with Unashamedly Ethical etc we can do this again.', 4, 1, NULL, '2012-12-10 04:41:19'),
(205, 'Determine how to get maximum marketing exposure through our existing complementors.', 26, 1, NULL, '2012-05-31', NULL, 'Vicki Norris, Power Character, Positive Impact, Heavenly Touch Ministries, GMO, Gene Strite, Olivet, the Greeks and Germans, Unashamedly Ethical<br />\nGS: Can I close this AI? A bit too vague and I don''t know how to move on it. Also very similar to Presence Strategy 4, AI 1 and Presence Strategy 2, AI 2.', 4, 2, NULL, '2012-12-10 04:41:19'),
(206, 'Plan and deliver against a regular partners communication strategy ', 26, 1, NULL, '2012-12-31', NULL, NULL, 4, 3, NULL, '2012-12-10 04:41:19'),
(207, 'Create and communicate incentives for partners to share message(s). \n(R&R not necessarily monetary. E.g., Referrer of the Week, Recruiter of the Month)', 26, 1, NULL, '2012-12-31', NULL, NULL, 4, 4, NULL, '2012-12-10 04:41:19'),
(208, 'Create a "culture of continuous calling/recruiting" among so that we get Critical Mass & Households of Peace. (e.g., give alumni a quota of # of presentations that they should make at other companies each year.) <br />\n<br />\n(Corporate Recruiting Strategy: Host topical talks in corporates, Brown Bag Briefings (BBBs), target specific people groups in corporates, systematic approach to BBBs with videos, B/S series, develop new products to reach larger populations of believers in cor', 26, 1, NULL, '2012-02-27', NULL, NULL, 4, 5, NULL, '2012-12-10 04:41:19'),
(209, 'Inspire alumni to target key individuals / groups in their households.\n(Affiliated groups in alumni networks other than churches (well-developed) - corporates, growth groups, WCC small groups, etc.)', 26, 1, NULL, NULL, NULL, 'Ellie has churches<br />\n- Will the ''Alumni outreach-ers'' help with this?<br />\n- Isn''t this recurring?', 4, 6, NULL, '2012-12-10 04:41:19'),
(210, ' Determine what media types work best in various host nations. <br />\n(Indo: radio - talk show, blackberry messaging system, FB, events/ forums, personal call, text msg<br />\nSA: FB, SMS, events/ forums<br />\nIndia: events (although danger of over evented), FB, very similar to India)', 26, 1, NULL, '2012-12-20', NULL, NULL, 4, 7, NULL, '2012-12-10 04:41:19'),
(211, ' Sort leads in Salesforce by area code - then target key area Alumni to reach out to them, invite to events, meet over coffee, etc.', 26, 1, NULL, '2013-01-11', NULL, 'We have not used it for targeted events yet.', 4, 8, NULL, '2012-12-10 04:41:19'),
(212, 'Take & Go recruiting basket - recruiting collateral totally available ', 27, 1, NULL, '2012-12-31', NULL, NULL, 4, 1, NULL, '2012-12-10 04:41:19'),
(213, 'Ensure books and materials are available for sale and/or given as gifts / door prizes. ', 27, 1, NULL, '2012-01-10', NULL, NULL, 4, 2, NULL, '2012-12-10 04:41:19'),
(214, 'Train staff to track events in SF using campaigns. Develop appropriate dashboards and reports to show where we''re gaining traction.', 27, 1, NULL, '2012-09-01', NULL, 'Installation Done. Most campaigns rebuilt. Just need to do dashboards once we have DATA. ;)', 4, 3, NULL, '2012-12-10 04:41:19'),
(215, 'Revise response card content ', 27, 1, NULL, '2012-06-01', NULL, '[bj] Okay... but I have not seen these at events such as Intensive? Hello?', 4, 4, NULL, '2012-12-10 04:41:19'),
(216, 'Create auto-responders in iContact based off the revised response card content.', 27, 1, NULL, '2012-01-25', NULL, 'Jackson - waiting for the "ok" from Kim', 4, 5, NULL, '2012-12-10 04:41:19'),
(217, 'Pete to work with Jackson on e-mail prospecting strategy ', 27, 1, NULL, '2012-12-12', NULL, 'Work with Jackson', 4, 6, NULL, '2012-12-10 04:41:19'),
(218, ' Develop ongoing recruiting matrix/campaign to ensure continuous contact with leads, keeping them fresh.', 27, 1, NULL, '2012-02-22', NULL, 'Work with LLy on this.', 4, 7, NULL, '2012-12-10 04:41:19'),
(219, 'Add an option/checkbox within the checkout process of each online transaction by The Institute that will allow people to indicate if they want to get put on our mailing list.', 27, 1, NULL, '2012-02-23', NULL, NULL, 4, 8, NULL, '2012-12-10 04:41:19'),
(220, ' Establish ''7 Touches'' to keep in contact with hot leads, and new ones as they come in.', 27, 1, NULL, '2012-03-07', NULL, 'Run by Kim, Brett, Linh <br />\n[bj] This is not complete because it is not working.', 4, 9, NULL, '2012-12-10 04:41:19'),
(221, ' Print response cards and make available during events', 27, 1, NULL, NULL, NULL, 'Just print a ton, and re-print as needed', 4, 10, NULL, '2012-12-10 04:41:19'),
(222, 'Reach out to Alumni connectors to invite people to events', 28, 1, NULL, '2012-01-23', NULL, 'Randy, Megan, Julie, Sophey, etc<br />\nHow often? With what result? [bj]', 4, 1, NULL, '2012-12-10 04:41:19'),
(223, 'Follow up with leads after events', 28, 1, NULL, '2012-01-23', NULL, 'LLY can delegate, but is the point person for this!', 4, 2, NULL, '2012-12-10 04:41:19'),
(224, 'Post events on social media outlets (fb, twitter, etc) and send out separate iContact invites (?)', 28, 1, NULL, '2012-01-23', NULL, 'JN will continue until Oct. ', 4, 3, NULL, '2012-12-10 04:41:19'),
(225, 'Establish a process for requesting website changes (to Gareth) as social media and other events happen. ', 28, 1, NULL, '2012-12-21', NULL, NULL, 4, 4, NULL, '2012-12-10 04:41:19'),
(226, 'Mass email to alumni to solicit their help in identifying potential clients.', 29, 1, NULL, '2012-02-28', NULL, 'Thomas - not sure a mass e-mail will accomplish your goal. I''m guessing individual calls and meetings will be more effective? (KW)', 4, 1, NULL, '2012-12-10 04:41:19'),
(227, 'Investigate churches/ngos/business<br />\n  - compile a list of potential churches/ngos/businesses<br />\n  - research them<br />\n  - speak with decision maker<br />\n  - identify pain points<br />\n  - identify complementary aspects', 29, 1, NULL, '2012-03-30', NULL, NULL, 4, 2, NULL, '2012-12-10 04:41:19'),
(228, 'networks/fellowships as possible streams<br />\n  - compile a list of potential networks/fellowships<br />\n  - research them<br />\n  - speak with decision maker<br />\n  - identify pain points', 29, 1, NULL, '2012-03-30', NULL, NULL, 4, 3, NULL, '2012-12-10 04:41:19'),
(229, 'Meeting in person with interested parties', 29, 1, NULL, '2012-04-15', NULL, NULL, 4, 4, NULL, '2012-12-10 04:41:19'),
(230, 'Record potential client list from all the different streams.', 29, 1, NULL, '2012-04-30', NULL, NULL, 4, 5, NULL, '2012-12-10 04:41:19'),
(231, 'Follow up with email and free short assessments to pique interest. Notify them of the more in depth product available, as well as additional follow on products.', 29, 1, NULL, '2012-05-15', NULL, NULL, 4, 6, NULL, '2012-12-10 04:41:19'),
(232, 'Advertise upcoming events to potential client list we''ve created. Encourage them to invite friends.', 29, 1, NULL, '2012-02-15', NULL, NULL, 4, 7, NULL, '2012-12-10 04:41:19'),
(233, 'Identify sources of database. ', 30, 1, NULL, '2012-02-15', NULL, NULL, 4, 1, NULL, '2012-12-10 04:41:19'),
(234, 'Email and call potential businesses and organizations to set up appointments.', 30, 1, NULL, '2012-02-28', NULL, NULL, 4, 2, NULL, '2012-12-10 04:41:19'),
(235, 'Introduction of Institute and its products to these businesses and organizations via presentations. ', 30, 1, NULL, '2012-02-03', NULL, NULL, 4, 3, NULL, '2012-12-10 04:41:19'),
(236, 'Identify pain points and matching Institute products.', 30, 1, NULL, '2012-03-30', NULL, NULL, 4, 4, NULL, '2012-12-10 04:41:19'),
(237, 'Record company details into Salesforce. ', 30, 1, NULL, '2012-03-30', NULL, NULL, 4, 5, NULL, '2012-12-10 04:41:19'),
(238, 'Maintain relationship by sending newsletters and emails about upcoming events. ', 30, 1, NULL, '2012-01-31', NULL, NULL, 4, 6, NULL, '2012-12-10 04:41:19'),
(239, 'Begin design of Testimony entry, which will use the Marketplace Miracle Form as a template. ', 31, 1, NULL, '2012-06-20', NULL, 'GS: Can we prioritize this strategy?<br />\nWould be a bit of work - a whole new project.<br />\nOr for a less customized version we could use wordpress.<br />\nDecision?', 4, 1, NULL, '2012-12-10 04:41:19'),
(240, 'Consider using qcodo as the framework for implementing the model.', 31, 1, NULL, '2012-12-11', NULL, NULL, 4, 2, NULL, '2012-12-10 04:41:19'),
(241, 'Design the Miracle viewing interface. Allow for searching by category, date, country, etc. ', 31, 1, NULL, '2012-12-18', NULL, NULL, 4, 3, NULL, '2012-12-10 04:41:19'),
(242, 'Add administration section that will allow vetting of input testimonies, tagging of keywords, etc.', 31, 1, NULL, '2012-12-18', NULL, NULL, 4, 4, NULL, '2012-12-10 04:41:19'),
(243, 'Talk to Jackson about where testimonials used for newsletters are stored anywhere. ', 31, 1, NULL, '2012-12-18', NULL, NULL, 4, 5, NULL, '2012-12-10 04:41:19'),
(244, 'Identify through relationship, prayer and interaction potential HOPs in various cities and nations. Work with Pete Stofle to zero  in on ONE city that is open.<br />\n', 32, 1, NULL, '2012-04-17', NULL, 'Portland (Christian Chamber, Vicki Norris)<br />\nGig Harbor (John Anderson)', 5, 1, NULL, '2012-12-10 04:41:19'),
(245, 'Work with key leaders in the target city to develop a shared vision of transformation in their city.', 32, 1, NULL, '2012-05-25', NULL, 'We should do this once we have traction on Transforming Society. (Tom Webb; Neil Johnson - conversations happening)<br />\nBJ: 7/12 - Saipan might become the right opportunity.', 5, 2, NULL, '2012-12-10 04:41:19'),
(246, 'Develop list (or white paper) of specific competencies needed to transform society.\n', 32, 1, NULL, '2012-10-05', NULL, 'Done. In Transforming Society book. \nTie into book launch.', 5, 3, NULL, '2012-12-10 04:41:19'),
(247, 'Fill out Competencies Matrix for selected cities. Determine whether we have a role, and whether we are invited into and welcomed in the city to play our part.<br />\n', 32, 1, NULL, '2012-06-29', NULL, 'Nigeria: Apostles in the Marketplace<br />\nKorea: Heavenly Touch Ministries<br />\nIndo: Power Character<br />\nCPT: ECI, OWS, First Nations, YPO<br />\nIndia: Covenant Consulting?', 5, 4, NULL, '2012-12-10 04:41:19'),
(248, 'Seek specific confirmation from God before proceeding, or partnering. ', 32, 1, NULL, '2012-05-01', NULL, 'Pete Stofle, and the HOT, using Partnering Methodology', 5, 5, NULL, '2012-12-10 04:41:19'),
(249, 'Develop next steps with key organizations about what the outworkings need to be in their organizations for them to be an effective part of transformation in their city.', 32, 1, NULL, '2012-04-27', NULL, ' Power Character, BAM Match, Apostles in the Marketplace, Olivet, Tahoma Group', 5, 6, NULL, '2012-12-10 04:41:19'),
(250, 'Add the heart quadrant leadership test to the partnering filter. ', 32, 1, NULL, '2012-04-27', NULL, NULL, 5, 7, NULL, '2012-12-10 04:41:19'),
(251, 'Consider how Universities, Churches and other NGOs fit into the mix.', 32, 1, NULL, '2012-11-30', NULL, 'Talking to Olivet, Northwest, AGTS, Cornerstone (CPT), Regent (BC), Compassion International', 5, 8, NULL, '2012-12-10 04:41:19'),
(252, ' Take HOT and selected alumni through training in our Partnering Methodology; revise as needed', 32, 1, NULL, '2012-04-25', NULL, NULL, 5, 9, NULL, '2012-12-10 04:41:19'),
(253, 'Continue to deepen partner intercessory relationships - Bethel Church, Elijah House, House of Hope Healing Center', 32, 1, NULL, NULL, NULL, NULL, 5, 10, NULL, '2012-12-10 04:41:19'),
(254, 'Work with intercessory leads in our community to ready them to lead intercession locally as well as internationally.', 32, 1, NULL, NULL, NULL, 'EH training<br />\ntwice monthly prayer meetings<br />\nSaturday trainings', 5, 11, NULL, '2012-12-10 04:41:19'),
(255, 'Outline resource allocation expectations at progressive levels of partnership. \n<br>\n(what we would expect at different stages from them and for us) ', 33, 1, NULL, '2012-04-25', NULL, NULL, 5, 1, NULL, '2012-12-10 04:41:19'),
(256, 'Assess expectations of current partnerships and how to progress. Make success stories of the ones we have.<br />\n', 33, 1, NULL, '2012-04-27', NULL, '(Cornerstone University, Apostles in the Marketplace, Unashamedly Ethical, Heavenly Touch) ', 5, 2, NULL, '2012-12-10 04:41:19');
INSERT INTO `action_items` (`id`, `action`, `strategy_id`, `scorecard_id`, `who`, `when`, `status_type`, `comments`, `category_id`, `count`, `modified_by`, `modified`) VALUES
(257, 'Work on getting the top 10-25 people from Power Character through Convergence Accreditation. LW - set milestones and metrics with PC.', 33, 1, NULL, '2013-01-31', NULL, 'With Brett<br />\n<br />\nLW - other than setting milesones and metrics with PC, is the first part of the action item still applicable?', 5, 3, NULL, '2012-12-10 04:41:19'),
(258, 'Develop criteria for defining Tier 1 and Tier 2 partnerships.<br />\n', 33, 1, NULL, '2012-04-27', NULL, 'Expand our reach.<br />\nTransforming Society is important.<br />\nComplementary<br />\nSee if Partnering filter needs revision', 5, 4, NULL, '2012-12-10 04:41:20'),
(259, 'Having identified "tier1/tier2" partners, allocate individuals to manage the respective relationships.<br />\nProvide relevant contact information (phone #, email) and background. ', 33, 1, NULL, '2012-04-27', NULL, 'Possible Tier 1: Olivet, K-CBMC, Frank Consulting, Covenant Consulting, Vicki Norris<br />\nPoss Tier 2: Power Character (cos revenue low), BAM Match, Call2Business, GMO, Positive Impact, Portland Christian Chamber, Bruce Cook, Barnabas, ', 5, 5, NULL, '2012-12-10 04:41:20'),
(260, 'Determine what would be required from potential "clients" if they were to receive consulting from trainees.<br />\nConstruct a document and integrate with the upcoming training cycle.', 34, 1, NULL, '2012-04-03', NULL, 'pass by Brett and Linda after drafting something<br />\nReview Brett''s comments', 5, 1, NULL, '2012-12-10 04:41:20'),
(261, 'Determine the wording, explanation for the trainees of this new alternative scorecard ''project'' endeavour.', 34, 1, NULL, '2012-03-30', NULL, 'Send out a feeler email once the business owners have been identified<br />\nGive to Linda. She''ll probably be the point person.', 5, 2, NULL, '2012-12-10 04:41:20'),
(262, 'Identify business owners in Salesforce. ', 34, 1, NULL, '2012-03-20', NULL, 'FUSA, Olive, Yencho, Abandare, Kavod (Gwyn), Dyball, Dang, Awender, Oates?, Ben Patterson, Hector media, <br />\nI''ve done an iteration. Closing this out.', 5, 3, NULL, '2012-12-10 04:41:20'),
(263, 'Do client/consultant mapping of trainees and alumni.', 34, 1, NULL, '2012-07-24', NULL, 'We may need to do a seminar/some teaching on Societal Transformation before they "get it"', 5, 4, NULL, '2012-12-10 04:41:20'),
(264, 'Ensure that clients are engaged in actively using the online scorecard.', 34, 1, NULL, '2012-09-18', NULL, NULL, 5, 5, NULL, '2012-12-10 04:41:20'),
(265, 'Identify possible partners and engage in initial discussion ', 35, 1, NULL, '2012-02-10', NULL, NULL, 5, 1, NULL, '2012-12-10 04:41:20'),
(266, 'Write up a synopsis of the discussion with sufficient information to apply the filter to and to bring before the team for discussion. ', 35, 1, NULL, '2012-02-15', NULL, 'Get from Brett', 5, 2, NULL, '2012-12-10 04:41:20'),
(267, 'Run through the Partnering Assessment filter', 35, 1, NULL, '2012-02-15', NULL, NULL, 5, 3, NULL, '2012-12-10 04:41:20'),
(268, 'Discuss as a team the pros/cons, and the SWOT of the partnering opportunity. (including economic viability)', 35, 1, NULL, '2012-02-20', NULL, NULL, 5, 4, NULL, '2012-12-10 04:41:20'),
(269, 'If there is consensus with the team, develop proposal of partnership.', 35, 1, NULL, '2012-02-28', NULL, 'Consideration of redemptive partnering?How has the partner improved as a result of their association with us?', 5, 5, NULL, '2012-12-10 04:41:20'),
(270, 'Develop and maintain a mindmap of Responsibilities and people.', 36, 1, NULL, '2012-08-02', NULL, 'KIm; we need to jump back on Roles & Responsibilities', 7, 1, NULL, '2012-12-10 04:41:20'),
(271, 'Write job descriptions according to responsibilities and needs.  ', 36, 1, NULL, '2012-03-20', NULL, 'HOT to complete for themselves via Mind Map.<br />\nBJ - Drafted, under review by KW', 7, 2, NULL, '2012-12-10 04:41:20'),
(272, 'Identify and publish functions and responsibilities that can be redeployed from the HOT to alumni...Identify the functions that must be handled by non-traveling staff/people, such as finances, admin, reporting, IT, phones.', 36, 1, NULL, NULL, NULL, 'same as S1 A5', 7, 3, NULL, '2012-12-10 04:41:20'),
(273, 'Identify staff members to recruit & oversee volunteers for each unfilled responsibility - ensure responsibilities are tied in with the volunteers growth path and calling ', 36, 1, NULL, '2012-02-29', NULL, 'and the HOT', 7, 4, NULL, '2012-12-10 04:41:20'),
(274, 'Continuously pray in people to fill gaps.', 36, 1, NULL, NULL, NULL, 'and HOT.<br />\nDuring Wednesday prayer meetings<br />\nreoccuring', 7, 5, NULL, '2012-12-10 04:41:20'),
(275, 'Conduct Home Office Team Annual Reviews', 36, 1, NULL, '2012-06-29', NULL, 'Kim can assist with logistics.', 7, 6, NULL, '2012-12-10 04:41:20'),
(276, 'Establish process for assessing "staff health" (CSF).', 36, 1, NULL, '2012-06-30', NULL, NULL, 7, 7, NULL, '2012-12-10 04:41:20'),
(277, 'Define needs for a tech intern.', 37, 1, NULL, '2011-10-08', NULL, '-Amy Fritz - De Anza college students looking for intern project.  <br />\n-Business impact networks could be an interesting project.<br />\nFirst suggestion got rejected. Called to inquire about more specific needs. Doesn''t look like we''re a suitable candidate. :(', 7, 1, NULL, '2012-12-10 04:41:20'),
(278, 'Make specific intern projects known to those in training cycle. ', 37, 1, NULL, '2012-07-31', NULL, 'Dependent upon definite list.<br />\nWork with LL/alumni relations', 7, 2, NULL, '2012-12-10 04:41:20'),
(279, 'Define list of current intern projects and \\"managers\\" for each project. ', 37, 1, NULL, '2012-12-31', NULL, '-Look at bucket list, see items that pertain to each HOT.<br />\n-Gareth - put a brief description for each item in bucket list', 7, 3, NULL, '2012-12-10 04:41:20'),
(280, 'Develop a list of alumni housing available to interns for a given period of time. ', 37, 1, NULL, '2011-07-15', NULL, 'For interns as opposed to visiting remote trainees?', 7, 4, NULL, '2012-12-10 04:41:20'),
(281, 'Define needs / projects for media intern. ', 37, 1, NULL, '2012-05-31', NULL, NULL, 7, 5, NULL, '2012-12-10 04:41:20'),
(282, 'Define needs / projects for testimony intern. Have this defined in terms of social media needs and repository. Much we can do with a little extra planning with existing events and trainings. Issue now is on-going implementation, sharing and categorizing.', 37, 1, NULL, '2012-01-30', NULL, 'and Jackson N.<br />\nDate will move-up if we get a testimony intern (or leads for one).<br />\nTestimonies currently housed on google docs.', 7, 6, NULL, '2012-12-10 04:41:20'),
(283, 'Work with Linda Fong to further develop social networking infrastructure. Provide resources and information in a timely manner.', 37, 1, NULL, '2012-08-20', NULL, NULL, 7, 7, NULL, '2012-12-10 04:41:20'),
(284, 'Consider character-based vs. operational leadership track. ', 38, 1, NULL, '2011-10-31', NULL, NULL, 7, 1, NULL, '2012-12-10 04:41:20'),
(285, 'Develop a process for capturing and updating alumnae calling and provide opportunities for them to connect in their calling at organizational level.', 38, 1, NULL, '2012-10-13', NULL, NULL, 7, 2, NULL, '2012-12-10 04:41:20'),
(286, 'Develop a list of assessments to take each trainee through to get to know them. ', 38, 1, NULL, '2012-10-13', NULL, ' ', 7, 3, NULL, '2012-12-10 04:41:20'),
(287, ' Determine Purpose, then how often, format, timing. (e.g., is it about starting businesses, transforming society, etc.)', 39, 1, NULL, '2012-06-29', NULL, 'For example, a Household Meeting after the planning meeting.', 7, 1, NULL, '2012-12-10 04:41:20'),
(288, ' Open to all: opt in.', 39, 1, NULL, '2012-03-30', NULL, '[bj] Not sure what this means... looks more like a comment', 7, 2, NULL, '2012-12-10 04:41:20'),
(289, ' "Grow" coordinators in each key city.', 39, 1, NULL, '2012-03-30', NULL, 'Key: give them the onus for getting people together in each city', 7, 3, NULL, '2012-12-10 04:41:20'),
(290, ' Develop a schedule for trips to key cities. Prioritize and get to key cities in 2012 (or pilot in the Bay Area).', 39, 1, NULL, '2012-05-30', NULL, NULL, 7, 4, NULL, '2012-12-10 04:41:20'),
(291, ' Consider whether this group would pick up thing such as singles, Convergence for Couples, entrepreneur and other events.', 39, 1, NULL, '2012-02-29', NULL, NULL, 7, 5, NULL, '2012-12-10 04:41:20'),
(292, 'Praying for discernment, patience and wisdom in identifying, discipling and nurturing people in the community in a way that glorifies God and furthers his kingdom. ', 40, 1, NULL, '2012-05-31', NULL, NULL, 7, 1, NULL, '2012-12-10 04:41:20'),
(293, 'Newsletter sent as an ongoing activity. (devotionals, events, free assessments, articles etc)', 40, 1, NULL, NULL, NULL, 'We can set-up a campaign and easily use the newsletter we do here with whatever tweaks you want to make (KW)', 7, 2, NULL, '2012-12-10 04:41:20'),
(294, 'Identify how we can help the alumni. Where are their points of pain?', 40, 1, NULL, NULL, NULL, NULL, 7, 3, NULL, '2012-12-10 04:41:20'),
(295, 'Refine Convergence 2-hr and 1-Day accreditation process', 41, 1, NULL, '2012-12-10', NULL, 'Still need to complete overhaul of 1-day PPT', 7, 1, NULL, '2012-12-10 04:41:20'),
(296, 'Complete LEMON Leadership Accreditation Course, including Accreditation exam to ensure accredited trainers understand and can effectively communicate all key concepts. ', 41, 1, NULL, '2012-08-03', NULL, 'Significant input from Brett required for accreditation exam.', 7, 2, NULL, '2012-12-10 04:41:20'),
(297, 'Develop Convergence Accreditation "School" for local alumni to assist with key country partnership development in foreign languages (Bahasa Indonesian, Korean, Vietnamese, Mandarin, Cantonese...)', 41, 1, NULL, '2012-06-30', NULL, NULL, 7, 3, NULL, '2012-12-10 04:41:20'),
(298, 'Use 10-P Post Venture assessment as a template to create Post Training 10-P and 10-F assessments ', 42, 1, NULL, '2012-05-24', NULL, 'Can find one on my desktop. <br />\nWork with Linda to come up with trainee centric questions', 7, 1, NULL, '2012-12-10 04:41:20'),
(299, 'Develop a list of questions for the 10-Ps that are specific to the trainees situation.', 42, 1, NULL, '2012-07-31', NULL, 'Gareth to assist', 7, 2, NULL, '2012-12-10 04:41:20'),
(300, 'Develop a list of questions for the 10-Fs that are specific to the trainees situation. ', 42, 1, NULL, '2012-07-31', NULL, 'Gareth to assist', 7, 3, NULL, '2012-12-10 04:41:20'),
(301, 'Prototype/trial the assessments with past trainees and gather feedback.', 42, 1, NULL, '2012-05-30', NULL, 'eg Manuel, Melissa, etc.', 7, 4, NULL, '2012-12-10 04:41:20'),
(302, 'Modify assessments according to feedback ', 42, 1, NULL, '2012-06-13', NULL, NULL, 7, 5, NULL, '2012-12-10 04:41:20'),
(303, 'Develop online assessments with the created assessments ', 42, 1, NULL, '2012-06-30', NULL, 'GS: What''s the status of this strategy? We still want to do it and have it ready by end of upcoming cycle?<br />\nThere is a Post Training Assessment google Doc with the beginnings of a draft if we''d like to proceed.', 7, 6, NULL, '2012-12-10 04:41:20'),
(304, 'Host a brainstorm for including soft processes on training', 43, 1, NULL, '2011-07-30', NULL, 'Ron, Tish, Jodene, Kim D., Gareth', 6, 1, NULL, '2012-12-10 04:41:20'),
(305, 'Train the trainers on new soft processes.', 43, 1, NULL, '2011-07-30', NULL, 'undefined', 6, 2, NULL, '2012-12-10 04:41:20'),
(306, 'Look at ways to get quicker wins in finishing books.  Note: Document the process of our workstreams.', 44, 1, NULL, '2012-01-31', NULL, 'Looking at iBooks for Mac', 6, 1, NULL, '2012-12-10 04:41:20'),
(307, 'Find out the relationship between e-books and hard copy books. ', 44, 1, NULL, '2012-02-15', NULL, 'Does it cheapen us if we don''t have hard copy books?<br />\nBJ 12/12: We need both. I like designing for eBooks first, but we need hard copy backup, especially in Developing Nations.', 6, 2, NULL, '2012-12-10 04:41:20'),
(308, 'Determine how to crowd-source content for upcoming Repurposing Series. ', 44, 1, NULL, '2012-06-29', NULL, 'BJ: Don''t think this will work, not until i have the book done and send it out for review.', 6, 3, NULL, '2012-12-10 04:41:20'),
(309, 'Expense Reporting, Reimbursement and Receipting process', 45, 1, NULL, '2012-09-25', NULL, 'completed - can this be removed', 6, 1, NULL, '2012-12-10 04:41:20'),
(310, 'Consultant recruiting pipeline reporting and follow-on activities done routinely out of Sales Force.', 45, 1, NULL, '2012-12-31', NULL, 'and Kim W.<br />\nbj - needs to be more visible, and ELECTRONIC<br />\n- need to separate recruiting and clients', 6, 2, NULL, '2012-12-10 04:41:20'),
(311, 'Financial Reporting to be defined and tightened. ; post in Processes folder in Google docs.', 45, 1, NULL, '2012-08-02', NULL, 'BJ, DA and Annie G.', 6, 3, NULL, '2012-12-10 04:41:20'),
(312, 'Book Sales process & book fulfillment to be documented and shared (for backup when DA away); post in Processes folder in Google docs.', 45, 1, NULL, '2012-01-24', NULL, 'completed - can this be removed?', 6, 4, NULL, '2012-12-10 04:41:20'),
(313, 'Estimate required book materials for upcoming training cycle and update googledocs under process folder.', 45, 1, NULL, '2012-08-31', NULL, 'This is Training materials<br />\nDone<br />\nLW - only responsible for training materials/books', 6, 5, NULL, '2012-12-10 04:41:20'),
(314, 'Update Venture Ops Manual', 45, 1, NULL, '2012-08-31', NULL, '[bj} I recommend Linda take a first pass at this since (a) she has training, (b) she has been on 2 Ventures, (c) she should know what follows training, (d) she will point out gaps because she is not too close to drafting the manual. (and KimW)', 6, 6, NULL, '2012-12-10 04:41:20'),
(315, 'Visual Identity: Look at freshening the website (not structure, just look and feel); share with HOT, etc.', 45, 1, NULL, '2012-02-14', NULL, 'and Jessica H<br />\n(sorta done. Certainly decided upon the web visual identity, and everything else is keying off that)', 6, 7, NULL, '2012-12-10 04:41:20'),
(316, 'Tracking Tactical activity to strategic endeavor (Quad)-- check each week in Q1 "who is working on stuff not on the scorecard"?', 45, 1, NULL, '2012-03-30', NULL, 'and Kim W<br />\nThis online scorecard is an attempt to bridge that gap... so sorta DONE.', 6, 8, NULL, '2012-12-10 04:41:21'),
(317, 'Scorecarding: begin utilizing the dashboards at weekly Scrums.', 45, 1, NULL, '2011-01-17', NULL, 'Ongoing, but since the essential framework is out there... DONE', 6, 9, NULL, '2012-12-10 04:41:21'),
(318, 'Set up a Software licensing register in Google Docs. (Larry Lam also has some info)', 45, 1, NULL, '2011-02-01', NULL, 'Done. <br />\nJust needs to be regularly updated', 6, 10, NULL, '2012-12-10 04:41:21'),
(319, 'Develop high level reporting process and timeline (with necessary back end reporting structures) for finances, recruiting, sales, communications and on-line media.', 45, 1, NULL, '2012-07-30', NULL, 'Yikes! Lost track of this one...', 6, 11, NULL, '2012-12-10 04:41:21'),
(320, 'Develop plan to measure and report on Critical Success Factors - Trainee implementation of what they learn', 45, 1, NULL, '2012-07-14', NULL, NULL, 6, 12, NULL, '2012-12-10 04:41:21'),
(321, 'Develop plan to measure and report on Critical Success Factors - Societal Impact of Households of Peace', 45, 1, NULL, '2012-10-01', NULL, NULL, 6, 13, NULL, '2012-12-10 04:41:21'),
(322, 'Materials Inventory Management ; post in Processes folder in Google docs.', 45, 1, NULL, '2012-05-31', NULL, NULL, 6, 14, NULL, '2012-12-10 04:41:21'),
(323, 'Planning/Calendaring of Webinars', 46, 1, NULL, '2013-01-31', NULL, NULL, 6, 1, NULL, '2012-12-10 04:41:21'),
(324, 'Solidify content and type of webinars', 46, 1, NULL, '2013-01-31', NULL, 'In conjunction with the people who will be presenting.<br />\nShould KimW also be involved since she manages much of our marketing collateral?', 6, 2, NULL, '2012-12-10 04:41:21'),
(325, 'Update Flyers for the webinar/seminar', 46, 1, NULL, '2012-12-31', NULL, 'Done in collaboration with KimW who monitors our marketing collateral', 6, 3, NULL, '2012-12-10 04:41:21'),
(326, 'Update Website with webinar/seminar information ', 46, 1, NULL, '2012-02-21', NULL, '3 weeks before event', 6, 4, NULL, '2012-12-10 04:41:21'),
(327, 'Set up Assessment codes (if there are associated assessments). Notify Training Co-ordinator.', 46, 1, NULL, '2012-02-21', NULL, '3 weeks before event', 6, 5, NULL, '2012-12-10 04:41:21'),
(328, 'Set up webinar - ensure details are correct', 46, 1, NULL, '2013-01-31', NULL, '3 weeks before event', 6, 6, NULL, '2012-12-10 04:41:21'),
(329, 'Create eventbrite event with promotional and notify training-coordinator of the appropriate links.', 46, 1, NULL, '2012-02-21', NULL, '3 weeks before event', 6, 7, NULL, '2012-12-10 04:41:21'),
(330, 'Update facebook, linked In, twitter, etc', 46, 1, NULL, '2012-02-21', NULL, '3 weeks before event<br />\nWill pass to GS and LF eventually', 6, 8, NULL, '2012-12-10 04:41:21'),
(331, 'Send email out to Alumni (with flyer and promotional) Consolidate information in a bi-monthly newsletter.', 46, 1, NULL, '2012-02-21', NULL, '3 weeks before event<br />\n- May pass to KW soon', 6, 9, NULL, '2012-12-10 04:41:21'),
(332, 'Send email out about event to potentials list. ', 46, 1, NULL, '2012-02-21', NULL, '2 weeks before event<br />\n- In Newsletter. May pass to KW', 6, 10, NULL, '2012-12-10 04:41:21'),
(333, 'Send email out to Trainees (including online LEMON link and details about promotional for their friends)', 46, 1, NULL, '2013-01-31', NULL, '1 week before event', 6, 11, NULL, '2012-12-10 04:41:21'),
(334, 'Training Co-ordinator to send to social Media person the Assessment Code and Webinar link information. ', 46, 1, NULL, '2013-01-31', NULL, '1 week before event', 6, 12, NULL, '2012-12-10 04:41:21'),
(335, 'Set up coupon code for attendees to buy the related book', 46, 1, NULL, '2012-02-27', NULL, '1 week before event', 6, 13, NULL, '2012-12-10 04:41:21'),
(336, 'Tech to send coupon code to webinar presenter prior to event. So they can advertise it during the presentation.', 46, 1, NULL, '2012-03-26', NULL, 'days before event', 6, 14, NULL, '2012-12-10 04:41:21'),
(337, 'Monitor eventbrite for new attendees and send LEMON Assessment and webinar information emails to new registrants', 46, 1, NULL, '2012-02-15', NULL, 'ongoing', 6, 15, NULL, '2012-12-10 04:41:21'),
(338, 'Presenter to set up appropriate Applied Learning polls in the webinar', 46, 1, NULL, '2013-01-31', NULL, 'Whoever the presenter is... Brett by default', 6, 16, NULL, '2012-12-10 04:41:21'),
(339, 'Get aggregated list of attendees (trainees +registrants) to Presenter and Hospitality co-ordinator', 46, 1, NULL, '2012-03-28', NULL, 'With the training co-ordinator to include the list of trainees.<br />\nJust before the event.', 6, 17, NULL, '2012-12-10 04:41:21'),
(340, 'Add new registrants to Salesforce', 46, 1, NULL, '2012-03-29', NULL, 'day after event<br />\nGiven to LLy, but is everyone''s job (depends on who they meet)', 6, 18, NULL, '2012-12-10 04:41:21'),
(341, 'Uncheck "e-mail opt-out" in Salesforce for those registrants who opt-in', 46, 1, NULL, '2012-03-29', NULL, 'day after event', 6, 19, NULL, '2012-12-10 04:41:21'),
(342, 'Remove event from web site after completion', 46, 1, NULL, '2012-03-29', NULL, 'day after event', 6, 20, NULL, '2012-12-10 04:41:21'),
(343, 'Send thank you emails to new registrants and inform them of additional products via a series of communications', 46, 1, NULL, '2012-03-29', NULL, 'day after event', 6, 21, NULL, '2012-12-10 04:41:21'),
(344, ' Post Convergence & LEMON Forums on Susan Landry''s email list and LinkedIn groups (Christians Business groups, BAM groups)', 46, 1, NULL, '2012-10-13', NULL, NULL, 6, 22, NULL, '2012-12-10 04:41:21'),
(345, ' Set up in-person meetings with potential leads from events', 46, 1, NULL, '2013-02-02', NULL, NULL, 6, 23, NULL, '2012-12-10 04:41:21'),
(346, 'Update Salesforce with details of the last Venture Client Engagement.<br />\n(Chennai rep Venture 7 2011 Q4)', 47, 1, NULL, '2012-01-11', NULL, NULL, 6, 1, NULL, '2012-12-10 04:41:21'),
(347, 'Investigate webinar technology required in future for our remote training. ', 47, 1, NULL, '2012-12-14', NULL, 'Investigated Webex.<br />\nasked Brian for input. He''ll be getting back to me.', 6, 2, NULL, '2012-12-10 04:41:21'),
(348, 'Modify/Maintain repurposing.biz', 47, 1, NULL, '2012-02-10', NULL, NULL, 6, 3, NULL, '2012-12-10 04:41:21'),
(349, ' Build a ''7 Touches'' template to use to keep in touch with leads and tap into their interests', 48, 1, NULL, '2012-03-16', NULL, 'Revisit to see how we can get the errant man in the corner office to follow up on his people.', 6, 1, NULL, '2012-12-10 04:41:21'),
(350, ' Transfer Rebecca''s leads in Salesforce to those appropriate - those who know or have been in touch with them', 48, 1, NULL, '2012-05-11', NULL, NULL, 6, 2, NULL, '2012-12-10 04:41:21'),
(351, ' Hold a meeting with HOT and other Alumni who are attending the event to specify what roles they will take in speaking to new attendees', 48, 1, NULL, '2012-05-04', NULL, NULL, 6, 3, NULL, '2012-12-10 04:41:21'),
(352, ' Follow up with leads! Hot/Warm first.', 48, 1, NULL, '2012-07-28', NULL, NULL, 6, 4, NULL, '2012-12-10 04:41:21'),
(353, 'Pray in couples/individuals who want to do/share hospitality. ', 49, 1, NULL, '2012-10-13', NULL, NULL, 8, 1, NULL, '2012-12-10 04:41:21'),
(354, 'Raise up men/women to do hospitality where they are.', 49, 1, NULL, '2012-06-30', NULL, 'Have them enroll in Linh''s and Lyn''s hospitality course?', 8, 2, NULL, '2012-12-10 04:41:21'),
(355, 'Look for possible sites', 50, 1, NULL, '2011-12-15', NULL, 'Los Gatos 21 acres looks good!', 8, 1, NULL, '2012-12-10 04:41:21'),
(356, 'Develop estimate of financial requirements ', 50, 1, NULL, '2012-01-31', NULL, '$10m', 8, 2, NULL, '2012-12-10 04:41:21'),
(357, 'Share with key stakeholders', 50, 1, NULL, '2012-06-29', NULL, 'Things God has said around place are recorded, our story is documented, space requirements and uses are documented, design ideas are collected.', 8, 3, NULL, '2012-12-10 04:41:21'),
(358, 'Work with Teju on a Nigeria strategy that leverages Convergence and has a rapid growth, highly contagious element to it. ', 51, 1, NULL, '2012-05-31', NULL, 'Teju met with Ben and John Enehlama 1/10/12. She has now moved to Lagos. Working on October Kingdom Economics plan.', 8, 1, NULL, '2012-12-10 04:41:21'),
(359, ' Get sign off from AiMP with agreed milestones.', 51, 1, NULL, '2012-06-29', NULL, 'This may not be AiMP. It may be Pascal at Jeff O''Brien, etc. They want to do LEMON first. Targeting Sept.', 8, 2, NULL, '2012-12-10 04:41:21'),
(360, ' Get meetings on the calendar for Febr 2012 and beyond to begin implementation and rollout of Convergence in Nigeria.', 51, 1, NULL, '2012-06-29', NULL, NULL, 8, 3, NULL, '2012-12-10 04:41:21'),
(361, 'Communicate plans to relevant stakeholders. ', 52, 1, NULL, '2012-01-31', NULL, 'and BrettJ', 9, 1, NULL, '2012-12-10 04:41:21'),
(362, 'Collaborate with Power Character and key alumni (Benjamin Bambang maybe?) to develop Indonesia-specific plans. ', 52, 1, NULL, '2013-01-31', NULL, 'Waiting for Brett''s instruction<br />\n', 9, 2, NULL, '2012-12-10 04:41:21'),
(363, 'Collaborate with Louis and Doug for SA specific plans ', 52, 1, NULL, '2012-03-12', NULL, 'and RebeM', 9, 3, NULL, '2012-12-10 04:41:21'),
(364, 'Schedule monthly team calls with each nation in which conducting training / ventures. ', 52, 1, NULL, NULL, NULL, 'with KimW and RebeM - this has been on the scorecard for 3 years, with me booking the calls and them not being attended by the foreign hosts, can we please remove this action item or make it different?', 9, 4, NULL, '2012-12-10 04:41:21'),
(365, 'Monitor, report and refresh plans monthly. ', 52, 1, NULL, NULL, NULL, 'with KimW<br />\nwhat plans? Scrum? Calendar? Who is the audience?', 9, 5, NULL, '2012-12-10 04:41:21'),
(366, ' Planning for Indonesia trip in June with Power Character, Jakarta alumni and Bali connections', 52, 1, NULL, '2012-06-06', NULL, 'with Brett', 9, 6, NULL, '2012-12-10 04:41:21'),
(367, 'Visual graphic to show flow of how it all works together ', 53, 1, NULL, '2012-04-30', NULL, 'BJ, KW, PS ', 9, 1, NULL, '2012-12-10 04:41:21'),
(368, 'Leverage existing resources. eg 45 minute Google LEMON link on DVD w/ business card, Book purchase, webinar', 53, 1, NULL, '2012-06-30', NULL, 'Speak w Jennifer Beale on these action items. Get updated plan from her, or draft from Dena', 9, 2, NULL, '2012-12-10 04:41:21'),
(369, 'Leverage existing contacts to generate publicity. <br />\neg. ship books to bloggers before you release them, so you generate buzz', 53, 1, NULL, '2012-12-31', NULL, 'Fay: I have told you if you put together the quotes, etc, my buddy Chris Abraham can push it out to thousands of bloggers to get others talking about your book and your work', 9, 3, NULL, '2012-12-10 04:41:21'),
(370, 'Determine which line items and what types of activites will fall under Vine Associates.  ', 54, 1, NULL, '2011-12-01', NULL, NULL, 10, 1, NULL, '2012-12-10 04:41:21'),
(371, 'Develop annual budget for desired Vine Associates activities. ', 54, 1, NULL, '2011-12-01', NULL, 'and HOT', 10, 2, NULL, '2012-12-10 04:41:21'),
(372, 'Develop simple, clean and clear alumni communication around finances and on-going Vine Associates support. ', 54, 1, NULL, '2011-02-21', NULL, 'and KimW', 10, 3, NULL, '2012-12-10 04:41:21'),
(373, 'Develop simple, fun and informative reporting process for keeping needs in front of alumni. ', 54, 1, NULL, '2012-02-20', NULL, 'and KimW', 10, 4, NULL, '2012-12-10 04:41:21'),
(374, 'Tax prep and filing', 54, 1, NULL, '2012-04-15', NULL, 'w/ Brett J and accountant', 10, 5, NULL, '2012-12-10 04:41:21'),
(375, ' Tax prep and filing - Vine Associates', 54, 1, NULL, '2012-05-31', NULL, NULL, 10, 6, NULL, '2012-12-10 04:41:21'),
(376, 'Develop a Vine Associates Sponsorship Application Form that people requesting a sponsorship can fill in online.', 54, 1, NULL, '2012-06-12', NULL, 'Put on Vine Associates web site.<br />\nNeed to investigate possible WordPress options.', 10, 7, NULL, '2012-12-10 04:41:21'),
(377, 'Assess 10-A methodology and adapt it for our environments', 55, 1, NULL, '2012-03-30', NULL, 'Link to SF w Kim W<br />\nNOTE: The methodology is on the server at this address: smb://file-server/Data/Ops and HR Manuals/I4 Operations Manual/Partnering, Vol. X (This contains the core methodology dated 05-30-01) The rest of the docs are tools.', 10, 1, NULL, '2012-12-10 04:41:21'),
(378, 'Implement a sales strategy ', 55, 1, NULL, '2012-02-24', NULL, 'W Pete Stofle', 10, 2, NULL, '2012-12-10 04:41:21'),
(379, 'Identify key resources for sales. Pray in salesperson. ', 55, 1, NULL, '2012-02-24', NULL, 'Pete S?', 10, 3, NULL, '2012-12-10 04:41:21'),
(380, 'Leverage alumni in influential positions - develop a progression of connection points ', 55, 1, NULL, '2012-01-21', NULL, 'and Pete Stofle', 10, 4, NULL, '2012-12-10 04:41:21'),
(381, 'Develop commission structure for people likely to sell.  Approach likely candidates. ', 55, 1, NULL, '2012-03-31', NULL, NULL, 10, 5, NULL, '2012-12-10 04:41:21'),
(382, 'Pray more intentionally for pipeline - all of it has come through God. ', 55, 1, NULL, NULL, NULL, NULL, 10, 6, NULL, '2012-12-10 04:41:21'),
(383, 'Report Financials quarterly ', 55, 1, NULL, '2012-12-31', NULL, NULL, 10, 7, NULL, '2012-12-10 04:41:21'),
(384, 'Define Repurposing Business Training Sales Process, define roles, train associates and align systems for tracking and measurement.', 55, 1, NULL, '2012-02-06', NULL, 'Inputs from Pete Stofle', 10, 8, NULL, '2012-12-10 04:41:21'),
(385, 'Develop Dashboards in Salesforce to report on health of pipeline. Train staff on Salesforce usage.', 55, 1, NULL, '2012-02-10', NULL, NULL, 10, 9, NULL, '2012-12-10 04:41:21'),
(386, 'Map likely points of engagement and target markets for each of our product streams.', 55, 1, NULL, '2012-07-15', NULL, 'Inputs and verification from Pete Stofle', 10, 10, NULL, '2012-12-10 04:41:21'),
(387, 'Define sales goals and objectives for the year. Map out action plan to achieve.', 55, 1, NULL, '2012-02-29', NULL, 'Brett primary input into goals & objectives, Kim to assist with action plan.', 10, 11, NULL, '2012-12-10 04:41:21'),
(388, ' Develop product & revenue forecasts based on various pricing scenarios.', 56, 1, NULL, '2012-01-30', NULL, NULL, 10, 1, NULL, '2012-12-10 04:41:21'),
(389, 'Brainstorm possible options with low overhead and good profitability. ', 57, 1, NULL, '2012-03-31', NULL, 'What networks can we leverage? (particularly if pricing is an issue ion Chennai, but not in other cities, what conclusions can we draw from this?)', 10, 1, NULL, '2012-12-10 04:41:22'),
(390, 'Leverage networks in places other than Chennai and plan events there. Try to ensure low overhead. ', 57, 1, NULL, '2012-05-31', NULL, '(eg Convergence and LEMON)', 10, 2, NULL, '2012-12-10 04:41:22'),
(391, 'Develop training. Consider Remote. Explore different options/packaging of training. Use what the HOT has learned about training.', 57, 1, NULL, '2012-04-30', NULL, NULL, 10, 3, NULL, '2012-12-10 04:41:22'),
(392, 'Accreditation of Alumni in Convergence. Ensure business model is in place and clear with regards to initial cost and royalties.', 57, 1, NULL, '2012-06-30', NULL, NULL, 10, 4, NULL, '2012-12-10 04:41:22'),
(393, 'Take advantage of standard consulting opportunities with churches and businesses.<br />\n  - brain storm different approaches.<br />\n  - take advantage of HOT or Brett visits with big organized events.<br />\n  - Ensure there''s always follow up about additional products.<br />\n  - Obtaining testimonies from satisfied clients.', 57, 1, NULL, NULL, NULL, NULL, 10, 5, NULL, '2012-12-10 04:41:22'),
(394, 'Advertising events on social media and web site.', 57, 1, NULL, '2012-04-30', NULL, 'Get Natchi''s help', 10, 6, NULL, '2012-12-10 04:41:22'),
(395, 'Being involved with partnering relationships with Institute Inc. outside the country. ', 57, 1, NULL, '2012-04-30', NULL, NULL, 10, 7, NULL, '2012-12-10 04:41:22'),
(396, 'Leveraging subject matter expertise. (eg Thomas HR)', 57, 1, NULL, NULL, NULL, NULL, 10, 8, NULL, '2012-12-10 04:41:22'),
(397, 'Remove duplicate addresses from the database. Create a CLI program that when run will attempt to reconcile and remove redundant/duplicate addresses from database objects Person and Households.', 58, 2, NULL, '2012-03-16', NULL, NULL, 2, 1, NULL, '2012-12-10 04:41:34'),
(398, 'Add "authenticated sender" functionality to Groups to allow additional people to post to the groups. ', 58, 2, NULL, '2012-03-16', NULL, NULL, 2, 2, NULL, '2012-12-10 04:41:34'),
(399, 'Generate the report statements by zip code? If we out source mailing the statements, we can get bulk price mailing if its already sort by zip code.', 58, 2, NULL, '2012-05-08', NULL, 'Talk to Oom about this.<br />\nThe reports are generated PDFs found under: Stewardship - Generated Bulk Receipts', 2, 3, NULL, '2012-12-10 04:41:34'),
(400, 'Add excel export functionality to email list', 58, 2, NULL, '2012-03-23', NULL, NULL, 2, 4, NULL, '2012-12-10 04:41:34'),
(401, 'Add excel export functionality to smart group', 58, 2, NULL, '2012-03-23', NULL, 'It''s there in regular group already.', 2, 5, NULL, '2012-12-10 04:41:34'),
(402, 'How does one indicate a temporary address?<br />\nCase: member is separated from family and living at another address, with the hopes of reuniting. The family address is current. They are not legally separated and there is no need to split the households. The temporary address applies to the head-of-house only.<br />\n8/3/11<br />\n', 58, 2, NULL, '2012-07-24', NULL, NULL, 2, 6, NULL, '2012-12-10 04:41:34'),
(403, 'If the DO NOT MAIL is on, will Stewardship be able to mail a giving report?', 58, 2, NULL, '2012-08-21', NULL, 'Is this something to ask Oom?', 2, 7, NULL, '2012-12-10 04:41:34'),
(404, 'Can we fix the phone number search to take digits regardless of format? If I type in 6509611914 (my home number) no records show. If I type 650-961-1914 then my record comes up. ', 58, 2, NULL, '2012-05-08', NULL, NULL, 2, 8, NULL, '2012-12-10 04:41:34'),
(405, 'The way that Worship Arts is using the groups, I think for usability we might need to add a feature request to make the categories expandable from a UI perspective.  Otherwise, the list is going to get very long.', 58, 2, NULL, '2012-09-19', NULL, NULL, 2, 9, NULL, '2012-12-10 04:41:34'),
(406, 'the best practice for handling email bouncebacks off of a group list?  Since every group member is a record in NOAH, I''m assuming we''d look up the email in NOAH and delete/inactivate the email, since it gave a bounceback?  I suppose if we had a contact phone #, we could also call and see if there was a new email to use?', 58, 2, NULL, '2012-07-17', NULL, 'The majority of this task could be handled in noah. Contacting via phone is a process that would have to be set in place.', 2, 10, NULL, '2012-12-10 04:41:34'),
(407, 'should always have an up-to-date report of all my.alcf registrations that ended up creating a new person even though the email address already existed elsewhere -- should be available for Ooom and Christina', 58, 2, NULL, '2012-08-09', NULL, 'WHO SHOULD BE RESPONSIBLE? NEED A REPORT OF PEOPLE REGISTERED AND WHICH SIMILAR RECORDS THERE ARE. <br />\nPUBLIC_LOGIN TABLE.<br />\nSEE STEWARDSHIP FOR EXAMPLE REPORTS. MAKE INTERACTIVE DATAGRID WITH LINKS<br />\nMAYBE ADD FLAG TO CHECK_DUPS', 2, 11, NULL, '2012-12-10 04:41:34'),
(408, 'Fix existing problem of Multiple First Names (eg Mike and Lani)', 58, 2, NULL, '2012-04-26', NULL, 'IMPLEMENTED. BUT NEED TO FIND INSTANCES IN EXISTING DB THAT NEED TO BE UPDATED.<br />\n<br />\nMaybe a cli script?', 2, 12, NULL, '2012-12-10 04:41:34'),
(409, 'Contributions (Giving) and Deceased:<br />\n	* mailing label should NOT show deceased name<br />\n	* stewardship tool should indicate if someone is deceased ', 58, 2, NULL, '2012-09-25', NULL, NULL, 2, 13, NULL, '2012-12-10 04:41:34'),
(410, 'Add ability to "move" contributions from a deceased to the surviving spouse (see Oom''s email from 10/20)', 58, 2, NULL, '2012-09-25', NULL, NULL, 2, 14, NULL, '2012-12-10 04:41:34'),
(411, 'Smart suggestions displayed in text fields.<br />\neg: "Purpose of Gift" in textbox for giving, <br />\nSame thing with City / State / Zip on Registration as well as maybe all the other textboxes there?', 58, 2, NULL, '2012-09-25', NULL, 'Is this a QCodo functionality thing?', 2, 15, NULL, '2012-12-10 04:41:34'),
(412, 'Fix GrowthGroups external page layout/design', 58, 2, NULL, '2012-05-08', NULL, 'SEE GROWTHGROUPS.ALCF.NET <br />\n(LOOK/FEEL STUFF)<br />\n', 2, 16, NULL, '2012-12-10 04:41:34'),
(413, 'Add not-yet-reconciled items (PP CC Donations) to donation receipt', 58, 2, NULL, '2012-06-19', NULL, 'MAYBE GRAB UNRECONCILED FROM ONLINE_DONATION AND ADD "PENDING"  TO DONATION RECEIPT. <br />\nRECEIPTS GENERATED FROM STEWARDSHIP_CONTRIBUTION TABLE.', 2, 17, NULL, '2012-12-10 04:41:34'),
(414, 'Update Merge Logic<br />\n- allow "merge" permission to delete account not chms admin', 58, 2, NULL, '2012-12-18', NULL, 'MORE PERMISSIONING. GIVE PEOPLE WHO CAN MERGE ABILITY TO DELETE.<br />\nDo we need to expose the ability to delete?', 2, 18, NULL, '2012-12-10 04:41:34'),
(415, 'Additional report for "One Time Donation" created users ', 58, 2, NULL, '2012-06-19', NULL, 'SAME AS FOR MY.ALCF DUPE RECORDS, EXCEPT FOR ONE TIME DONATIONS.', 2, 19, NULL, '2012-12-10 04:41:34'),
(416, 'Email Functionality to "Registered" Status People on a Event', 58, 2, NULL, '2012-06-12', NULL, 'SEE GROUP FOR AN EXAMPLE. NICE TO HAVE.', 2, 20, NULL, '2012-12-10 04:41:34'),
(417, 'Implement "Register on behalf of Other"', 58, 2, NULL, '2012-06-22', NULL, 'PARTICULARLY FOR PARENT/CHILD RELATIONSHIPS. NEED TO CREATE A CHILD PERSON.<br />\n', 2, 21, NULL, '2012-12-10 04:41:34'),
(418, 'Divorce vs. Historical Household Record stuff on divorcees (stewardship)', 58, 2, NULL, '2012-09-18', NULL, 'MAYBE EASIEST APPROACH IS TO CREATE AN ADD-ON TO ALLOW USER TO SPECIFY COMBINING SEPARATE INDIVIDUALS FOR A SET NUMBER OF YEARS.<br />\n', 2, 22, NULL, '2012-12-10 04:41:34'),
(419, 'IBS Improvements.', 58, 2, NULL, '2012-06-12', NULL, 'MOSTLY DONE, BUT TALK TO ANDREA AND FIGURE OUT WHAT STILL NEEDS TO BE DONE.<br />\nDiscussed with Andrea.<br />\nWill add the requested functionality into another strategy specifically for classes.', 2, 23, NULL, '2012-12-10 04:41:34'),
(420, 'Groups: Report to sender if exceeds limit or if any other error for that matter.', 58, 2, NULL, '2012-07-25', NULL, 'SEND A NICE NOTIFICATION TO SENDER ', 2, 24, NULL, '2012-12-10 04:41:34'),
(421, 'ASAP - TEST does NOT send to PAST members for Emails ', 58, 2, NULL, '2012-04-24', NULL, 'The email lists do not appear to send to past members.', 2, 25, NULL, '2012-12-10 04:41:34'),
(422, 'Smart Group: Add ability to say "Parent of anyone who has a child in GX" ', 58, 2, NULL, '2012-09-18', NULL, NULL, 2, 26, NULL, '2012-12-10 04:41:34'),
(423, 'Groups: In membership list, show nickname (if available) ', 58, 2, NULL, '2012-04-24', NULL, 'CHECK IF THIS IS DONE ALREADY. Nope, not done yet.', 2, 27, NULL, '2012-12-10 04:41:34'),
(424, 'When adding a person who shares an email with another person, it''s tough when the system selects the wrong person<br />\n-- this definitely applies to email lists -- it *may* apply to Groups as well. ', 58, 2, NULL, '2012-08-21', NULL, 'MOSTLY A UI TO MINIMIZE ERRORS.', 2, 28, NULL, '2012-12-10 04:41:34'),
(425, 'In Add Participant to group Module: Make search result link clickable in AddPersonControl. ', 58, 2, NULL, '2012-06-29', NULL, 'MORE UI. ALLOW USER TO CLICK INTO PERSON FOR MORE DETAIL', 2, 29, NULL, '2012-12-10 04:41:34'),
(426, 'Email List:<br />\n  - Some sort of "Add API" for an external form to add in<br />\n  - Bulk Add Functionality', 58, 2, NULL, '2012-06-19', NULL, 'THEY WANT FORM ON MYALCF. OR BULK COPY OF CSV FILE', 2, 30, NULL, '2012-12-10 04:41:34'),
(427, 'People<br />\n  -Search LIKE for Email and for both email/phone/address allow for non-primary search as well. ', 58, 2, NULL, '2012-08-22', NULL, 'CURRENTLY ONLY SEARCHES PRIMARY.', 2, 31, NULL, '2012-12-10 04:41:34'),
(428, 'People: Upload photo from URL instead', 58, 2, NULL, '2012-07-27', NULL, 'How important is this?<br />\nLooks like a lot of work for little return.', 2, 32, NULL, '2012-12-10 04:41:34'),
(429, '"Prior" Last Name(s) should be "Alternative" Last Name(s) ', 58, 2, NULL, '2012-04-02', NULL, NULL, 2, 33, NULL, '2012-12-10 04:41:34'),
(430, 'Add a "warning" to the Email Broadcast Type dropdown. ', 58, 2, NULL, '2012-04-02', NULL, 'MORE EXPLANATION OF THE EMAIL LIST TYPES.<br />\nAdded help functionality for future use.', 2, 34, NULL, '2012-12-10 04:41:34'),
(431, 'Add "Unlisted" Option for addresses. ', 58, 2, NULL, '2013-06-02', NULL, 'IMPORTANT. THE EXCEL SHOULDN''T DISPLAY ADDRESS OF THE UNLISTED.<br />\n(Is this on an individual basis?)<br />\nCheck with Melissa. She might have been the one to request this. Not urgent. Might even possibly delete this request. Setting to way in the future.', 2, 35, NULL, '2012-12-10 04:41:34'),
(432, 'Check Permissions.', 58, 2, NULL, '2012-06-19', NULL, 'PROPOGATE PERMISSION CHECKING ACROSS ALL PAGES FOR CAN_EDIT, SO THAT VOLUNTEERS CAN BE ADDED IN FUTURE', 2, 36, NULL, '2012-12-10 04:41:34'),
(433, 'Membership: add "Method of Joining" field<br />\n* Previous Church, previous city, etc. ', 58, 2, NULL, '2012-06-12', NULL, 'STORED AS ATTRIBUTES ALREADY. MAYBE EXPOSE ATTRIBUTE AT MEMBERSHIP CREATION AND LET USER SET ACCORDINGLY.', 2, 37, NULL, '2012-12-10 04:41:34'),
(434, 'Search/Browse Individuals: add a DISTINCT clause to limit duplicate in search results<br />\n(e.g. Russ in fuzzy, and "Yee" in Exact Last)', 58, 2, NULL, '2012-07-26', NULL, NULL, 2, 38, NULL, '2012-12-10 04:41:34'),
(435, 'Implement Race/Ethnicity ADD AS ATTRIBUTE', 58, 2, NULL, '2012-04-12', NULL, 'Think this is already in there as an attribute.', 2, 39, NULL, '2012-12-10 04:41:34'),
(436, 'Edit Attributes<br />\n- Change from multiselect to checkbox<br />\n- "Add attribute" should be a datagrid maybe?<br />\n- "Add attribute" should allow you to go back to an existing attribute maybe?<br />\n', 58, 2, NULL, '2012-06-12', NULL, NULL, 2, 40, NULL, '2012-12-10 04:41:34'),
(437, 'When displaying membership status, allow for a "deceased" option rather than just non-member.', 58, 2, NULL, '2012-06-22', NULL, 'Needed to add an additional ''deceased'' option in the membership_status_type table as well as code changes.<br />\nAs a result, needed to codegen.', 2, 41, NULL, '2012-12-10 04:41:34'),
(438, 'Provide the ability to easily subscribe and unsubscribe people from email lists (in groups?) ', 58, 2, NULL, '2012-07-02', NULL, NULL, 2, 42, NULL, '2012-12-10 04:41:34'),
(439, 'Hook up "opt out - Mens Fellowship" so it actually doesn''t get sent.', 58, 2, NULL, '2012-07-10', NULL, NULL, 2, 43, NULL, '2012-12-10 04:41:34'),
(440, 'Educate staff on what and when to use ARK to improve efficiency and collaboration overall.', 59, 2, NULL, '2012-03-28', NULL, NULL, 2, 1, NULL, '2012-12-10 04:41:34'),
(441, 'Add a field where people can edit their work schedule under their personal profile and have it display in the staff directory ', 59, 2, NULL, '2012-07-13', NULL, NULL, 2, 2, NULL, '2012-12-10 04:41:35'),
(442, 'errors are showing up -- shouldn''t they be logged and showing friendly? ', 60, 2, NULL, '2012-12-11', NULL, 'NICE, BUT MAYBE NOT NECESSARY. HELPS TO HAVE THE STACK DUMP ANYWAYS.', 2, 1, NULL, '2012-12-10 04:41:35'),
(443, 'control doesn''t exist error , to replicate: <br />\n		Merge households , do a search for a household to merge with<br />\n		Type in first name, hit tab<br />\n		Type in last name, do **NOT** hit tab but click on radio button and then click on "merge"<br />\n		error should appear ', 60, 2, NULL, '2012-09-25', NULL, 'TRY REPLICATE AND TRACK DOWN.', 2, 2, NULL, '2012-12-10 04:41:35'),
(444, 'Updates from Email Woes:<br />\nDoes service fail gracefully for invalid emails?', 60, 2, NULL, '2012-09-25', NULL, 'MAYBE PASS RATHER THAN THROWING ERROR, since that stops the sending to others down the list.', 2, 3, NULL, '2012-12-10 04:41:35'),
(445, 'Email: Does service fail gracefully on other random errors?', 60, 2, NULL, '2012-09-25', NULL, 'MAKE SURE WE DON''T KEEP TRYING THE SAME ERROR PRONE EMAIL AND BLOCK THE QUEUE', 2, 4, NULL, '2012-12-10 04:41:35'),
(446, 'Email: Does service recycle gracefully if hung?', 60, 2, NULL, '2012-09-25', NULL, 'PS AUX ERROR WHEN PROCESS HANGS. AT THE MOMENT, MONITOR AND KILL PROCESSES WHEN NECESSARY', 2, 5, NULL, '2012-12-10 04:41:35'),
(447, 'Group: GroupCategory still not calculating properly (also includes past members when it shouldn''t)<br />\nEnsure Group Category is prcoessing right for emails as well ', 60, 2, NULL, '2012-08-29', NULL, 'TEST THIS (GROUPCATEGORY IS "GROUP OF GROUPS")', 2, 6, NULL, '2012-12-10 04:41:35'),
(448, 'IE Testing (no specific issues)', 60, 2, NULL, '2012-12-18', NULL, 'CHECK IE8 AND IE9', 2, 7, NULL, '2012-12-10 04:41:35'),
(449, 'Export to Excel isn''t working on IE ?', 60, 2, NULL, '2012-12-18', NULL, 'SEE IF CAN REPLICATE', 2, 8, NULL, '2012-12-10 04:41:35'),
(450, 'Fix Multiple Membership date validation issue.', 60, 2, NULL, '2012-12-17', NULL, 'THERE''S A BUG IN THE DATE VALIDATION', 2, 9, NULL, '2012-12-10 04:41:35'),
(451, 'Report for multiple/duplicate names?', 61, 2, NULL, '2012-07-05', NULL, NULL, 2, 1, NULL, '2012-12-10 04:41:35'),
(452, 'Report for "New Members for 2011"', 61, 2, NULL, '2012-07-15', NULL, NULL, 2, 2, NULL, '2012-12-10 04:41:35'),
(453, 'Report for "New Members for 2012"', 61, 2, NULL, '2012-06-12', NULL, NULL, 2, 3, NULL, '2012-12-10 04:41:35'),
(454, 'Report for counts of activities', 61, 2, NULL, '2012-07-11', NULL, NULL, 2, 4, NULL, '2012-12-10 04:41:35'),
(455, 'Report of different person attributes. eg ethnicity', 61, 2, NULL, '2012-09-12', NULL, NULL, 2, 5, NULL, '2012-12-10 04:41:35'),
(456, 'Report for "Exiting Members" over given time periods.', 61, 2, NULL, '2012-08-02', NULL, NULL, 2, 6, NULL, '2012-12-10 04:41:35'),
(457, 'Create a report to provide statistical information on giving trends for the year.', 61, 2, NULL, '2012-08-02', NULL, NULL, 2, 7, NULL, '2012-12-10 04:41:35'),
(458, 'Could you please fix the fund number, where if I want to look it by number order I can? (i.e. 1,2,3,4,etc)  Right now its showing 1, 10,100,101. ', 62, 2, NULL, '2012-06-22', NULL, NULL, 2, 1, NULL, '2012-12-10 04:41:35'),
(459, 'Fix Age/Birthdate update and refresh on household participation (child/adult) ', 62, 2, NULL, '2012-07-19', NULL, NULL, 2, 2, NULL, '2012-12-10 04:41:35'),
(460, 'When changing CC Auth # on item, post report doesn''t reflect the update', 62, 2, NULL, '2012-07-20', NULL, NULL, 2, 3, NULL, '2012-12-10 04:41:35'),
(461, 'SHouldn''t be able to edit "Post Date" for a specific transaction -- it should always just use the "Post Date" for the batch itself ', 62, 2, NULL, '2012-06-07', NULL, 'DIRECTIONS TO REPLICATE: create a batch, then edit.<br />\nEditing the post date should change it for every entry in the batch.<br />\nAlso then don''t need to be able to edit the post date on an individual transaction', 2, 4, NULL, '2012-12-10 04:41:35'),
(462, 'show totals on the screen for when viewing an individual''s record', 62, 2, NULL, '2012-07-25', NULL, NULL, 2, 5, NULL, '2012-12-10 04:41:35'),
(463, 'Could you have the check image pop up when we scan the check?  It will show us how the check looks when it''s scan.', 62, 2, NULL, '2012-07-25', NULL, NULL, 2, 6, NULL, '2012-12-10 04:41:35'),
(464, 'Fix individual Stewardship Report so that the columns don''t run into each other.', 62, 2, NULL, '2012-05-22', NULL, NULL, 2, 7, NULL, '2012-12-10 04:41:35'),
(465, 'Fix a bug with the totalling of contributions. ', 62, 2, NULL, '2012-05-22', NULL, NULL, 2, 8, NULL, '2012-12-10 04:41:35'),
(466, 'Show previous groups (eg. Mike Ho Record)', 63, 2, NULL, '2012-10-18', NULL, 'ADD THE FUNCTIONALITY - IN GROUP AND PERSON', 2, 1, NULL, '2012-12-10 04:41:35'),
(467, 'Implement GG Region Editor', 63, 2, NULL, '2012-09-26', NULL, 'ALLOW UI TO MODIFY/EDIT REGIONS', 2, 2, NULL, '2012-12-10 04:41:35'),
(468, 'show all vs. show active', 63, 2, NULL, '2012-09-19', NULL, NULL, 2, 3, NULL, '2012-12-10 04:41:35'),
(469, 'Unsubscribe by Ministry', 63, 2, NULL, '2012-06-19', NULL, NULL, 2, 4, NULL, '2012-12-10 04:41:35'),
(470, 'Clean up Group/Role into one column ', 63, 2, NULL, '2012-06-20', NULL, NULL, 2, 5, NULL, '2012-12-10 04:41:35'),
(471, 'Remove "No Current Roles" -- not really needed -- add a checkbox', 63, 2, NULL, '2012-06-20', NULL, NULL, 2, 6, NULL, '2012-12-10 04:41:35'),
(472, 'Be able to search by name (for add to person as well as browse)', 63, 2, NULL, '2012-08-30', NULL, NULL, 2, 7, NULL, '2012-12-10 04:41:35'),
(473, 'IE7 add group with email broadcast type, checkbox label is off ', 63, 2, NULL, '2012-12-13', NULL, NULL, 2, 8, NULL, '2012-12-10 04:41:35'),
(474, 'Add help describing different types of products available when creating events.', 63, 2, NULL, '2012-05-15', NULL, NULL, 2, 9, NULL, '2012-12-10 04:41:35'),
(475, 'On the side bar navigation and elsewhere, change the terminology from IBS to ''Classes''. ', 64, 2, NULL, '2012-03-29', NULL, NULL, 2, 1, NULL, '2012-12-10 04:41:35'),
(476, 'There is an issue with tracking attendance when creating/signing up directly from Noah.<br />\nThe Contact Information fields aren''t correctly populated and an exception is thrown. ', 64, 2, NULL, '2012-07-19', NULL, 'might be rendered obsolete if workflow changes.', 2, 2, NULL, '2012-12-10 04:41:35'),
(477, 'Create a separate Attendance page (link from form page) that gives a listing of attendees of the class and allows for attendance tracking directly from here.', 64, 2, NULL, '2012-04-03', NULL, 'done!', 2, 3, NULL, '2012-12-10 04:41:35'),
(478, 'When importing information to excel, see if we can format and space nicely.<br />\n14pt for headers, 12pt for text. (Currently it''s 10pt).<br />\nAnd space the columns reasonably also.', 64, 2, NULL, '2012-04-19', NULL, 'Not possible with csv files.<br />\nThere is a quick workaround - see Andrea and show her.', 2, 4, NULL, '2012-12-10 04:41:35'),
(479, 'Add additional payment options (''Pay Later'')which allows you to specify a Cost, but not specify a deposit.<br />\nAlso ensure that the payment workflow doesn''t prompt for Credit Card. ', 64, 2, NULL, '2012-08-23', NULL, NULL, 2, 5, NULL, '2012-12-10 04:41:35'),
(480, 'Identify which ministries are not using Noah to manage their communications with their volunteers.', 65, 2, NULL, '2012-08-14', NULL, NULL, 4, 1, NULL, '2012-12-10 04:41:35'),
(481, 'Begin discussions with them in an effort to migrate them across', 65, 2, NULL, '2012-08-16', NULL, NULL, 4, 2, NULL, '2012-12-10 04:41:35'),
(482, 'Assist in making the migration process as painless as possible', 65, 2, NULL, '2012-08-17', NULL, NULL, 4, 3, NULL, '2012-12-10 04:41:35'),
(483, 'Keep a response time to IT mail within a day, even if we cannot address the issue.', 66, 2, NULL, '2012-03-21', NULL, NULL, 7, 1, NULL, '2012-12-10 04:41:35'),
(484, 'Monitor and regularly triage requests so that they''re handled in a timely fashion without overwhelming individual IT staff', 66, 2, NULL, '2012-03-21', NULL, NULL, 7, 2, NULL, '2012-12-10 04:41:35'),
(485, 'Whenever possible, educate staff on standard, simple IT issues so that the number of requests are reduced.', 66, 2, NULL, '2012-03-21', NULL, NULL, 7, 3, NULL, '2012-12-10 04:41:35'),
(486, 'Gain access to the ACS control panel for administrative purposes.', 67, 2, NULL, '2012-03-15', NULL, NULL, 7, 1, NULL, '2012-12-10 04:41:35'),
(487, 'Update the list of modules we use in order to minimize cost.', 67, 2, NULL, '2012-03-15', NULL, 'Remove: attendence, Connections, Church Report, Volunteer, Report Designer, Payroll<br />\nSent Request.', 7, 2, NULL, '2012-12-10 04:41:35');
INSERT INTO `action_items` (`id`, `action`, `strategy_id`, `scorecard_id`, `who`, `when`, `status_type`, `comments`, `category_id`, `count`, `modified_by`, `modified`) VALUES
(488, 'Renew Symantec endpoint license.', 67, 2, NULL, '2012-04-06', NULL, NULL, 7, 3, NULL, '2012-12-10 04:41:35'),
(489, 'Begin reviewing candidate resumes', 68, 2, NULL, '2012-06-07', NULL, NULL, 7, 1, NULL, '2012-12-10 04:41:35'),
(490, 'Perform phone interview to verify fit ', 68, 2, NULL, '2012-06-07', NULL, NULL, 7, 2, NULL, '2012-12-10 04:41:35'),
(491, 'Conduct interviews to ascertain technical competence, communication skills and fit.', 68, 2, NULL, '2012-06-14', NULL, NULL, 7, 3, NULL, '2012-12-10 04:41:35'),
(492, 'Decide upon candidate and make a job offer.', 68, 2, NULL, '2012-06-29', NULL, NULL, 7, 4, NULL, '2012-12-10 04:41:35'),
(493, 'Orientation and ramp up to ensure the new hire is fully equipped and empowered to do their job. ', 68, 2, NULL, '2012-07-13', NULL, NULL, 7, 5, NULL, '2012-12-10 04:41:35'),
(494, 'Fix DC4: Reassign an IP address in the correct range', 69, 2, NULL, '2012-03-01', NULL, NULL, 6, 1, NULL, '2012-12-10 04:41:35'),
(495, 'Fix DC4: Ensure it?s the primary DNS server', 69, 2, NULL, '2012-03-01', NULL, NULL, 6, 2, NULL, '2012-12-10 04:41:35'),
(496, 'Fix DC4: Assign the DHCP role to it. ', 69, 2, NULL, '2012-03-01', NULL, NULL, 6, 3, NULL, '2012-12-10 04:41:35'),
(497, 'Fix DC4: Clean up/reserve the necessary IP addresses on the new DHCP server', 69, 2, NULL, '2012-03-01', NULL, NULL, 6, 4, NULL, '2012-12-10 04:41:35'),
(498, 'Fix DC1: Ensure DC1 is no longer managing the DHCP role, and is also no longer the primary DNS. ', 69, 2, NULL, '2012-03-01', NULL, NULL, 6, 5, NULL, '2012-12-10 04:41:35'),
(499, 'Clean up monitor switching device so we can easily add to the remaining slots. Label them for future ease of use', 69, 2, NULL, '2012-03-01', NULL, 'done to a manageable degree', 6, 6, NULL, '2012-12-10 04:41:35'),
(500, 'Build DC6 win2008 and promote it to secondary Domain Controller role. Give it backup DNS and AD roles.', 69, 2, NULL, '2012-03-01', NULL, 'done. need to verify replication process though', 6, 7, NULL, '2012-12-10 04:41:35'),
(501, 'Migrate VPN from DC1 to virtualized machine on squaw. (alcf-utilities)', 69, 2, NULL, '2012-03-02', NULL, NULL, 6, 8, NULL, '2012-12-10 04:41:35'),
(502, 'Rebuild DC5 into win2008 and set up as additional secondary Domain Controller', 69, 2, NULL, '2012-03-02', NULL, 'done. need to verify replication process though', 6, 9, NULL, '2012-12-10 04:41:35'),
(503, 'Mammoth: Build Mammoth into new FileServer with Win 2008', 69, 2, NULL, '2012-03-20', NULL, NULL, 6, 10, NULL, '2012-12-10 04:41:35'),
(504, 'Mammoth: Check about the possibility of quotas', 69, 2, NULL, '2012-03-20', NULL, 'Researching File Resource Manager', 6, 11, NULL, '2012-12-10 04:41:35'),
(505, 'Mammoth: migrate all data from fileserv2 across', 69, 2, NULL, '2012-07-11', NULL, 'Getting Eskender to look into this first.<br />\nDelaying as a result.', 6, 12, NULL, '2012-12-10 04:41:35'),
(506, 'Mammoth: migrate data from heavenly', 69, 2, NULL, '2012-07-18', NULL, NULL, 6, 13, NULL, '2012-12-10 04:41:35'),
(507, 'Mammoth: Institute a backup system. ', 69, 2, NULL, '2012-07-10', NULL, NULL, 6, 14, NULL, '2012-12-10 04:41:35'),
(508, 'Modify the Active Directory Logon scripts to connect to Mammoth instead of Fileserv2', 69, 2, NULL, '2012-07-18', NULL, NULL, 6, 15, NULL, '2012-12-10 04:41:35'),
(509, 'Mammoth: Decommission virtualized backup server once mammoth backup is working', 69, 2, NULL, '2012-09-26', NULL, NULL, 6, 16, NULL, '2012-12-10 04:41:35'),
(510, 'Decommission DC1', 69, 2, NULL, '2012-05-22', NULL, 'Think DC1 has been down and effectively decommissioned for a while.', 6, 17, NULL, '2012-12-10 04:41:35'),
(511, 'Modify Juniper firewall to ensure VPN still works now that the VPN server has been moved to a virtualized machine  ', 69, 2, NULL, '2012-03-20', NULL, 'Had to tweak the configuration file to make the change and point the internal ip address to the right server.<br />\nFound in: Configuration->Update->Config File', 6, 18, NULL, '2012-12-10 04:41:36'),
(512, 'Speak to possible volunteer with expertise in IT Administration.', 69, 2, NULL, '2012-03-23', NULL, 'Eskender - works at Stanford.', 6, 19, NULL, '2012-12-10 04:41:36'),
(513, 'Upgrade DC3 to Windows 2008 and get the DHCP server that manages the church subnet working again.', 69, 2, NULL, '2012-04-05', NULL, 'Added DC6 to domain to manage DHCP.<br />\nRe-installed DC3 as 2008. It is now called DC7. <br />\nNeed to clean up remnants of DC3 eventually too.', 6, 20, NULL, '2012-12-10 04:41:36'),
(514, 'Get printers at the office working (accessible) again.', 69, 2, NULL, '2012-04-12', NULL, NULL, 6, 21, NULL, '2012-12-10 04:41:36'),
(515, 'Initiate regular imaging of key computers.<br />\nThis includes all Financial and IT computers ', 70, 2, NULL, '2012-03-20', NULL, NULL, 6, 1, NULL, '2012-12-10 04:41:36'),
(516, 'Set up a regular backup of data (\\\\fileserv2) process, and monitor.', 70, 2, NULL, '2012-06-19', NULL, NULL, 6, 2, NULL, '2012-12-10 04:41:36'),
(517, 'At regular intervals - once a month. Obtain complete data backup on external disks to be stored offsite.', 70, 2, NULL, '2012-07-30', NULL, NULL, 6, 3, NULL, '2012-12-10 04:41:36'),
(518, 'Monitor the regular backup of database and source code of both ARK and NOAH onto DreamHost.', 70, 2, NULL, '2012-03-20', NULL, NULL, 6, 4, NULL, '2012-12-10 04:41:36'),
(519, 're-image IT Manager''s on a monthly basis to ensure easy restoration in case of catastrophy.', 70, 2, NULL, '2012-06-07', NULL, NULL, 6, 5, NULL, '2012-12-10 04:41:36'),
(520, 're-image Finance''s computers (Elinor,Tamara) on a monthly basis to ensure easy restoration in case of catastrophy.', 70, 2, NULL, '2012-06-22', NULL, NULL, 6, 6, NULL, '2012-12-10 04:41:36'),
(521, 'Update IT google document tracking inventory of machines.', 71, 2, NULL, '2012-05-03', NULL, 'Start when I get back from Egypt. <br />\nNeed to add new donated hardware, and update from people leaving.', 6, 1, NULL, '2012-12-10 04:41:36'),
(522, 'Update and maintain Adobe software google document', 71, 2, NULL, '2012-04-19', NULL, 'Completed a first pass with Monique', 6, 2, NULL, '2012-12-10 04:41:36'),
(523, ' ', 71, 2, NULL, NULL, NULL, NULL, 6, 3, NULL, '2012-12-10 04:41:36'),
(542, 'Survey customers to identify what functionality they need. ', 74, 3, NULL, NULL, NULL, NULL, 2, 1, NULL, '2013-01-31 06:41:16'),
(543, 'Take stock of company assets, expertise and resources.', 74, 3, NULL, NULL, NULL, NULL, 2, 2, NULL, '2013-01-31 06:41:16'),
(544, 'Gather managers and sales people to brainstorm and discuss possible intersects between customer needs and company resources.', 74, 3, NULL, NULL, NULL, NULL, 2, 3, NULL, '2013-01-31 06:41:16'),
(545, 'Encourage innovative thinking beyond just meeting customer expectations. Inquire of God in the process.', 74, 3, NULL, NULL, NULL, NULL, 2, 4, NULL, '2013-01-31 06:41:16'),
(546, 'Construct a list of possible future products.', 74, 3, NULL, NULL, NULL, NULL, 2, 5, NULL, '2013-01-31 06:41:16'),
(547, 'Take each product through a "Product" filter, ensuring that new products are aligned to Purpose, fit well into our existing product architecture, and can have sufficient resources allocated to them.', 74, 3, NULL, NULL, NULL, NULL, 2, 6, NULL, '2013-01-31 06:41:16'),
(548, 'Allocate people and resources to begin product development.', 74, 3, NULL, NULL, NULL, NULL, 2, 7, NULL, '2013-01-31 06:41:16'),
(549, 'Project manager to oversee project development through to completion. ', 74, 3, NULL, NULL, NULL, NULL, 2, 8, NULL, '2013-01-31 06:41:16'),
(550, 'Sales people to be informed in advance of upcoming products so they can begin generating demand in the market, and possibly obtain alpha testers for the products. ', 74, 3, NULL, NULL, NULL, NULL, 2, 9, NULL, '2013-01-31 06:41:16'),
(551, 'People who are content and productive ', 75, 3, NULL, NULL, NULL, NULL, 7, 1, NULL, '2013-01-31 06:41:16'),
(552, 'Personal plans prepared by staff ', 75, 3, NULL, NULL, NULL, NULL, 7, 2, NULL, '2013-01-31 06:41:16'),
(553, 'Personal plans linked to 10-P plans ', 75, 3, NULL, NULL, NULL, NULL, 7, 3, NULL, '2013-01-31 06:41:16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address_1`, `city`, `state`, `zip_code`, `country`) VALUES
(2, '145545 Quickert Rd', 'Saratoga', 'California', '', 'USA'),
(3, '2581 Leghorn St', 'Mountain View', 'California', NULL, 'USA'),
(4, '1418 Main Entrance Drive', 'San Jose', 'CA', '95131', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_manager_assn`
--

CREATE TABLE IF NOT EXISTS `assessment_manager_assn` (
  `user_id` int(11) NOT NULL,
  `group_assessment_id` int(11) NOT NULL,
  KEY `user_id_idxfk_7` (`user_id`),
  KEY `group_assessment_id_idxfk` (`group_assessment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_manager_assn`
--

INSERT INTO `assessment_manager_assn` (`user_id`, `group_assessment_id`) VALUES
(11, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `canned_action_item`
--

CREATE TABLE IF NOT EXISTS `canned_action_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` text,
  `strategy_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `strategy_id_idxfk_2` (`strategy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `canned_action_item`
--

INSERT INTO `canned_action_item` (`id`, `action`, `strategy_id`) VALUES
(4, 'Gather key stakeholders to discuss the purpose of company', 2),
(5, ' Document the agreed upon Purpose Statement', 2),
(6, 'Meet with managers of respective departments to inform them of the Purpose statement', 2),
(7, 'Survey customers to identify what functionality they need. ', 3),
(8, 'Take stock of company assets, expertise and resources.', 3),
(9, ' Identify one or two key differentiators we wish to focus on in our website.', 4),
(10, 'Ensure that our messaging on our website aligns and highlights those key differentiators', 4),
(11, 'Gather managers and sales people to brainstorm and discuss possible intersects between customer needs and company resources.', 3),
(12, 'Discuss with managers the practical applications and implications in their respective departments', 2),
(13, 'Managers to convey the Purpose statement to their teams. ', 2),
(14, 'Display Purpose Statement on websites and common areas around the work environment', 2),
(15, ' Incorporate Purpose Statement into orientation package for new employees ', 2),
(16, ' Incorporate into the yearly reviews a way to ascertain if employees know the Purpose of the company and are motivated by it. ', 2),
(17, 'Encourage innovative thinking beyond just meeting customer expectations. Inquire of God in the process.', 3),
(18, 'Construct a list of possible future products.', 3),
(19, 'Take each product through a "Product" filter, ensuring that new products are aligned to Purpose, fit well into our existing product architecture, and can have sufficient resources allocated to them.', 3),
(20, 'Allocate people and resources to begin product development.', 3),
(21, 'Project manager to oversee project development through to completion. ', 3),
(22, 'Sales people to be informed in advance of upcoming products so they can begin generating demand in the market, and possibly obtain alpha testers for the products. ', 3),
(23, 'Implement SEO strategies (keywords, cross links) to ensure the website has higher search ranking on relevant subjects', 4),
(24, 'Ensure that there''s some "Call To Action" on the website to encourage client interaction.', 4),
(25, 'Utilize social media in marketing. Facebook, LinkedIn, etc. ', 4),
(26, 'Put some web analytics in place to ensure we can track website performance and make changes accordingly. ', 4),
(27, 'Publish announcements on PRWeb and other such sites, pointing back to our website.', 4),
(28, 'Re-stated Purpose statement', 5),
(29, 'Restatement of corporate objectives across 10-Ps', 5),
(30, 'Have key leaders define their call', 6),
(31, 'Develop needs analysis (products God cares about)', 7),
(32, 'Mapping of product needs (1) to our competencies', 7),
(33, 'Secondary product analysis ', 8),
(34, 'Positioning statement that is scriptural and realistic', 9),
(35, 'Update staff ', 9),
(36, 'Customer and Marketing survey mechanisms developed', 10),
(37, 'Customer and Marketing survey mechanisms implemented', 10),
(38, 'Draft and implement a communications plan ', 10),
(39, 'Develop communications plan', 11),
(40, 'Develop relationship building activities ', 11),
(41, 'Develop a formal partnering plan', 12),
(42, 'Develop Monthly Partnering scorecard ', 12),
(43, 'Two-way Partnerships (generate profit)', 13),
(44, 'Host at 1 Partnering Consultation / indaba ', 13),
(45, 'People who are content and productive ', 14),
(46, 'Personal plans prepared by staff ', 14),
(47, 'Personal plans linked to 10-P plans ', 14),
(48, 'Transform business around 10-Ps', 15),
(49, 'Seek out new employees to further strategies ', 15),
(50, 'One-page process flows for each department', 16),
(51, 'Teaching on / documentation of KP for processes ', 16),
(52, 'Revisions to ensure all 10 volumes of OM remain current', 16),
(53, 'A clearly defined explanation of Place and its relationship to the 10-Ps ', 17),
(54, 'Our values on Place are implemented at current locations ', 17),
(55, 'Suitable, welcoming working environment', 18),
(56, 'Evaluation of what our current place says about who we are', 18),
(57, 'Evaluation of how our current place reinforces our Purpose', 18),
(58, '10-P Scorecard continually updated ', 19),
(59, 'Each week at scrum - completely review a page from the 10-P Scorecard ', 19),
(60, 'Personal plans in place ', 20),
(61, 'Reports on progress each month ', 20),
(62, 'Monthly Budgets & Analysis: Project, Product, Forum, Consultations, company - Profitablity', 21),
(63, 'Monthly: P&L, Cash Flow, BS, Utilization Reports', 21),
(64, 'Define & Implement creative models for charging non-profit work', 22);

-- --------------------------------------------------------

--
-- Table structure for table `canned_kpi`
--

CREATE TABLE IF NOT EXISTS `canned_kpi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strategy_id` int(11) DEFAULT NULL,
  `kpi` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `strategy_id_idxfk_3` (`strategy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `canned_kpi`
--

INSERT INTO `canned_kpi` (`id`, `strategy_id`, `kpi`) VALUES
(1, 2, '100% of employees know the Purpose statement of the company '),
(2, 2, 'Yearly assessments indicate 20% increase in employee motivation'),
(3, 3, 'We create 2 products within the calendar year'),
(4, 3, 'Created products has positive uptake from the market, evidenced by sales. ROI within 1 year'),
(5, 4, 'Web analytics indicate that web hits increase by 50% over the year.'),
(6, 4, 'Potential clients contacting us through the web improve by 40% over the year.'),
(7, 2, 'Employee survey indicates at least 80% alignment in company practive and Purpose Statement'),
(8, 5, 'We pray and discern God''s will together '),
(9, 5, 'Level  of leaders'' buy-in to Purpose'),
(10, 6, 'Leaders can explain the integration of their Career and Call'),
(11, 6, 'Key people are able to share the Dream'),
(12, 7, 'Products meet the needs God cares about'),
(13, 7, 'Products use resources wisely (stewardship)'),
(14, 8, 'Secondary products are being developed'),
(15, 8, 'Secondary products meet needs'),
(16, 9, 'Position is consistent with Kingdom principles '),
(17, 9, 'Level of buy-in to position from staff'),
(18, 10, 'Staff understands positioning '),
(19, 10, 'Clients understand positioning '),
(20, 11, 'Presence-building presentations'),
(21, 11, 'Quantity and quality of relatioinships have increased '),
(22, 12, 'Working catalog of partners '),
(23, 12, 'Monthly scorecard'),
(24, 13, 'Working relationships w/2 Partners '),
(25, 13, 'Held Partnering Consultation'),
(26, 14, 'Measurable evidence of security and growth throughout the staff  '),
(27, 15, 'Hire ''right'' people - values+skills =billings '),
(28, 15, 'New staff hiring targets met'),
(29, 16, 'Process improvements in selected departments are on targetnew KPI '),
(30, 16, 'Processes are aligned with kingdom principles '),
(31, 17, 'People sense God''s presence - something special - in our place'),
(32, 17, 'Place guidelines and standards set for all locations'),
(33, 18, 'People feel welcomed in our place '),
(34, 18, 'We use hospitality at work to bridge the gap between work and home'),
(35, 19, '10-P Scorecard updated and used to guide work'),
(36, 20, 'Personal plans on file for every associate/staff'),
(37, 20, '10-P Team Leaders to keep their pages current '),
(38, 20, 'new KPI '),
(39, 21, 'Revenue vs. Target is positive'),
(40, 21, 'Project Managers take active role in Profitability Models on clients '),
(41, 21, ' '),
(42, 22, 'Standard engagement letter for non-profit client '),
(43, 22, 'ThoughtPiece for working w/non-profits ');

-- --------------------------------------------------------

--
-- Table structure for table `canned_strategy`
--

CREATE TABLE IF NOT EXISTS `canned_strategy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strategy` varchar(1024) DEFAULT NULL,
  `category_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `category_type_id_idxfk` (`category_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `canned_strategy`
--

INSERT INTO `canned_strategy` (`id`, `strategy`, `category_type_id`) VALUES
(2, 'Create a Purpose Statement for the company that embodies what we do, so that everyone knows the direction and vision of the company modify this.', 1),
(3, 'Develop a systematic approach to product development so that we develop useful products that are aligned with our purpose.', 2),
(4, 'Develop a clear online presence so that we can broaden our target audience and open new markets.', 4),
(5, 'Align corporate objectives with God''s broader business objective', 1),
(6, 'Ensure that the calling of key leaders is consistent with the purpose of the organization', 1),
(7, 'Identify the human and societal needs that God cares about as they pertain to our industry or company', 2),
(8, 'Look for yeast / mustard seed /"net on the other side" opportunities in the product portfolio; secondary products', 2),
(9, 'Reposition our company first "in Christ Jesus" (Col 3)', 3),
(10, 'Ascertain whether our business / company and products need to be repositioned', 3),
(11, 'Build relationships with our target audience', 4),
(12, 'Establishing a dialogue that identifies the key issues (strategic imperatives) at each point in our Impact Network', 5),
(13, 'Build partnerships.  Seek partners that will fill out our INW (Impact Network) and create greater Impact', 5),
(14, 'Mentoring / discipling of current employees', 7),
(15, 'Provide climate for new staff to become assimilated, feel welcomed and valued', 7),
(16, 'Implement way to continually improve core processes', 6),
(17, 'Making our business "a house of prayer" in some way that is fitting for us', 8),
(18, 'Finding practical ways to "practice hospitality" at our place of business', 8),
(19, 'Focus on Integration of P plans', 9),
(20, 'Link plans to individual performance and development plans', 9),
(21, 'Create enough financial margin to build own capital fund for future growth', 10),
(22, 'Determine where we should be making strategic investments, consistent with our corporate call', 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address_id`) VALUES
(2, 'The Institute For Innovation, Integration and Impact', 2),
(3, 'Abundant Life Christian Fellowship', 3),
(4, 'GJS Gadgets Inc', 4);

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
(2, 15),
(4, 9),
(4, 14),
(4, 9),
(4, 14);

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
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `conditional_type`
--

CREATE TABLE IF NOT EXISTS `conditional_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `country_list`
--

CREATE TABLE IF NOT EXISTS `country_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

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
(58, 'Ethiopia');

-- --------------------------------------------------------

--
-- Table structure for table `f_category_type`
--

CREATE TABLE IF NOT EXISTS `f_category_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `value` (`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `giants`
--

CREATE TABLE IF NOT EXISTS `giants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `giant` text,
  `country` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `giants`
--

INSERT INTO `giants` (`id`, `giant`, `country`) VALUES
(1, 'Isolationism', 'USA'),
(2, 'Dichotomy', 'USA'),
(3, 'Unemployment', 'USA'),
(4, 'Poverty', 'USA'),
(5, 'Mediocrity', 'USA'),
(6, 'Poverty', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `group_assessment_list`
--

CREATE TABLE IF NOT EXISTS `group_assessment_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_keys` int(11) DEFAULT NULL,
  `keys_left` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `key_code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `key_code` (`key_code`),
  KEY `resource_id_idxfk_1` (`resource_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group_assessment_list`
--

INSERT INTO `group_assessment_list` (`id`, `total_keys`, `keys_left`, `resource_id`, `key_code`, `description`) VALUES
(1, 50, 44, 5, 'lemon', 'Test the lemon group assessments'),
(2, 20, 20, 5, 'extraTest', 'adding an additional lemon group'),
(3, 20, 17, 2, 'TenPTest', 'Testing the 10-P group assessments');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE IF NOT EXISTS `industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(514) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

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
-- Table structure for table `kingdom_business_assessment`
--

CREATE TABLE IF NOT EXISTS `kingdom_business_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `resource_status_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `company_id_idxfk_4` (`company_id`),
  KEY `resource_id_idxfk_4` (`resource_id`),
  KEY `user_id_idxfk_4` (`user_id`),
  KEY `resource_status_id_idxfk_1` (`resource_status_id`),
  KEY `group_id_idxfk_1` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kingdom_business_assessment`
--

INSERT INTO `kingdom_business_assessment` (`id`, `company_id`, `resource_id`, `user_id`, `resource_status_id`, `group_id`) VALUES
(1, 2, 4, 1, 2, NULL),
(2, NULL, 4, 3, 1, NULL),
(5, 2, 4, 2, 1, NULL),
(6, NULL, 4, 5, 1, NULL),
(7, NULL, 4, 4, 1, NULL);

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
  KEY `category_id_idxfk_1` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

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
  KEY `question_id_idxfk_2` (`question_id`),
  KEY `assessment_id_idxfk_1` (`assessment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=242 ;

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
  KEY `strategy_id_idxfk_5` (`strategy_id`),
  KEY `scorecard_id_idxfk_1` (`scorecard_id`),
  KEY `modified_by_idxfk_1` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `kpis`
--

INSERT INTO `kpis` (`id`, `strategy_id`, `scorecard_id`, `rating`, `kpi`, `count`, `comments`, `modified_by`, `modified`) VALUES
(1, NULL, 1, 3, 'Measure how well we''re doing and that we can change things', 1, 'put a height in', 1, '2012-12-10 04:39:15'),
(2, NULL, 1, 5, 'And a final second measure,,,', 2, 'hidden secret and then some make some changes', 1, '2012-12-10 04:39:15'),
(3, NULL, 1, 2, 'Put something worthwhile in here', 1, ' ', 1, '2012-12-10 04:39:32'),
(4, NULL, 1, 3, 'More book orders and online inquiries', 1, ' ', 1, '2012-12-10 04:39:47'),
(5, NULL, 1, 1, 'Product gets uptake of over 100 in the next year', 1, NULL, 1, '2012-12-10 04:40:12'),
(6, NULL, 1, 4, 'New Presence KPI', 2, NULL, 1, '2012-12-10 04:39:47'),
(7, NULL, 1, 5, 'And yet another measurement', 3, NULL, 1, '2012-12-10 04:39:47'),
(8, NULL, 1, 0, 'New KPI', 1, NULL, 1, '2012-12-10 04:39:57'),
(9, 7, 1, 3, '100% of existing activity and new initiatives reinforce purpose.', NULL, NULL, 1, '2013-01-24 23:57:55'),
(10, 7, 1, 4, ' All of our home office staff (including remotes) can state and explain our Purpose.', NULL, 'Given that things spring from a spoken word, I have added this as a KPI.', NULL, '2012-12-10 04:41:16'),
(11, 8, 1, 3, 'Values conflicts are identified and resolved quickly', NULL, NULL, NULL, '2012-12-10 04:41:16'),
(12, 8, 1, 1, ' We are utilizing the scorecard as a weekly management tool', NULL, NULL, NULL, '2012-12-10 04:41:16'),
(13, 9, 1, 1, 'Each governance group is achieving 100% of stated accountability objectives.', NULL, NULL, NULL, '2012-12-10 04:41:16'),
(14, 9, 1, 0, 'Each governanace group is achieving 100% of stated growth objectives.', NULL, NULL, NULL, '2012-12-10 04:41:16'),
(15, 9, 1, 1, '100% of governance issues raised by people or organizations are satisfactorily resolved within 30 days. ', NULL, NULL, NULL, '2012-12-10 04:41:16'),
(16, 10, 1, 2, 'People routinely comment on the presence of God being in our place.', NULL, NULL, NULL, '2012-12-10 04:41:16'),
(17, 10, 1, 4, 'We hear from him collectively and have unity on all decisions. ', NULL, NULL, NULL, '2012-12-10 04:41:16'),
(18, 11, 1, 0, ' ', NULL, 'Once the values have been established, we''ll put kpis in place that specifically measure the practical impact of each value in the community.<br />\neg Hospitality - more rep alumni hosting social activities and events.', NULL, '2012-12-10 04:41:16'),
(19, 12, 1, 0, 'Increasing portion of The Institute revenues come from people other than Brett delivering products.', NULL, 'Will need to establish baseline for this. Not sure what current % is.', 1, '2013-01-25 19:23:58'),
(20, 14, 1, 2, 'Average monthly book revenue increases by 100% over 2011.', NULL, 'product 3, 1<br />\n', NULL, '2012-12-10 04:41:16'),
(21, 15, 1, 3, '100+ people attend/complete training in this Calendar year.', NULL, '60 people in 2012 between US and India', NULL, '2012-12-10 04:41:17'),
(22, 15, 1, 2, '80% of the people stay engaged through attending community events, volunteering, etc.', NULL, 'Do they need to stay engaged with Inst or just generally in the community?', NULL, '2012-12-10 04:41:17'),
(23, 15, 1, 1, '80% of trainees go on a venture within a year of training.', NULL, '22% of 2011 Trainees traveled on a Venture on 2011 or 2012<br />\n10% of 2012 Trainees traveled on a Venture.', NULL, '2012-12-10 04:41:17'),
(24, 15, 1, 0, '5+ stories of transformational change in the workplace as a result of applying foundational truths. (The equivalent Marketplace Miracle Form for trainees) That we can record. ', NULL, 'None from 2012 Trainees.', NULL, '2012-12-10 04:41:17'),
(25, 16, 1, 2, 'Scorecard is being regularly used by Home Office team and improves our efficiency', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(26, 16, 1, 3, '10 additional businesses express interest in using the scorecard, are on boarded and begin using it.', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(27, 17, 1, 0, '4 deals made within the quarter involving these new products.', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(28, 18, 1, 0, 'Upon completion of product development, at least 2 clients engaged in new product offering in the 1st Quarter.', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(29, 19, 1, 3, ' 10 International and local leaders attend Intensive', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(30, 19, 1, 5, ' Household impact exceeds 5000 people ', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(31, 19, 1, 2, ' Attendees become part of the rep family and contribute and partner so that we are all more effective. ', NULL, 'KW - Who is measuring this and how?', NULL, '2012-12-10 04:41:18'),
(32, 20, 1, 0, ' We have 5 customers of the new product offering, indicating uptake and demand.', NULL, '5 seems random... why not a revenue target, for example? (bj)', NULL, '2012-12-10 04:41:18'),
(33, 20, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(34, 22, 1, 1, 'Alumni referrals increases by 25% year on year. Add a sentence', NULL, 'Add something in here', 1, '2013-01-25 19:52:45'),
(35, 22, 1, 0, '50% of alumni referrals convert within first year.', NULL, 'put something here too', 1, '2013-01-25 19:54:01'),
(36, 23, 1, 2, 'Average Monthly Product Sales through Inst.net increase by 50% over 2010', NULL, 'Book sales, online payments, training', NULL, '2012-12-10 04:41:18'),
(37, 23, 1, 1, 'Web/ social networking leads account for 20% of total leads overall. ', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(38, 23, 1, 2, 'Enrollment for existing training and forums increases by 50% vs. last cycle.', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(39, 24, 1, 3, '75% of our Alumni are connected to our social media.', NULL, 'So, what does "3" mean as a %??', NULL, '2012-12-10 04:41:18'),
(40, 24, 1, 1, 'Globally 25% of our alumni overseas are connected to our social media', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(41, 25, 1, 4, 'ebooks selling like hotcakes', NULL, 'cold cakes', NULL, '2012-12-10 04:41:18'),
(42, 25, 1, 0, 'podcast page generates traffic to the site (20+ people per day on the specific page) ', NULL, NULL, NULL, '2012-12-10 04:41:18'),
(43, 25, 1, 4, 'Greater uptake of online assessments. Since there''s no baseline yet... 5 assessments purchased online.', NULL, 'LEMON Assessments purchased online: 19<br />\n(31 individual)<br />\nConvergence Assessments purchased online: 2', NULL, '2012-12-10 04:41:18'),
(44, 26, 1, 0, '25% of referrals are coming from complementors in each location. ', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(45, 27, 1, 2, 'Our events result in 50 additions to Salesforce each quarter', NULL, 'Linh', NULL, '2012-12-10 04:41:19'),
(46, 27, 1, 0, 'Our community database is increased by 10% annually ', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(47, 27, 1, 1, 'Our number of Repurposing business Trainees increases to 145 annually', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(48, 27, 1, 0, 'There has been positive movement on 30% of the people already in the pipeline.', NULL, 'Linh', NULL, '2012-12-10 04:41:19'),
(49, 28, 1, 0, ' Each connector gets at least 3 new people to the events', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(50, 28, 1, 0, 'Increase our "opens" from Salesforce by 10%', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(51, 28, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(52, 29, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(53, 29, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(54, 29, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(55, 30, 1, 0, '30 businesses added to Salesforce.', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(56, 30, 1, 0, 'Of those 30 businesses, 10% attend an event held by us within 6 months of initial appointment. ', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(57, 31, 1, 0, 'Increased faith resulting in increased miracles. The rate of miracle entries increases to 4 a month. ', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(58, 31, 1, 0, 'The analytics show 500+ hits each month of people reading and being encouraged.', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(59, 31, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(60, 32, 1, 1, 'Our partnerships are providing positive ROI<br />\n', NULL, '(Bethel is driving book sales & informal PR.)', NULL, '2012-12-10 04:41:19'),
(61, 32, 1, 2, '25% of referrals are coming from complementors in each location. ', NULL, 'A good amount of client work comes from alumni in US. <br />\n', NULL, '2012-12-10 04:41:19'),
(62, 32, 1, 0, ' We have relationship managers in place for all key partnerships', NULL, NULL, NULL, '2012-12-10 04:41:19'),
(63, 33, 1, 3, 'Our partnerships are providing positive ROI', NULL, 'AIMP (--> Nigeria work)<br />\nPC --> royalty (but still net outflow)', NULL, '2012-12-10 04:41:20'),
(64, 33, 1, 1, ' Our partnerships are helping in Transforming Society', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(65, 33, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(66, 34, 1, 1, 'Identified and engaged all of the rep-run businesses in the Bay Area.', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(67, 34, 1, 1, 'Both client and consultant experience life transformation and a practical implementation of foundational principles in their lives and businesses.', NULL, 'FUSA, Dyball, Oates, Awender, Dang', NULL, '2012-12-10 04:41:20'),
(68, 34, 1, 0, ' A number of businesses are actively using the scorecard and attempting to transform their spheres.', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(69, 35, 1, 0, '30% increase in Indian DB over the 1st Quarter ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(70, 35, 1, 0, '30% increase in client engagements directly due to partnership ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(71, 35, 1, 0, 'Has the partner improved because of their association with us? Get a rating off them?', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(72, 36, 1, 4, 'Staff are meeting expectations on core responsibilities', NULL, 'to be evaluated weekly during Scrum\nAnnually during Performance Reviews', NULL, '2012-12-10 04:41:20'),
(73, 36, 1, 3, 'The right people are approaching us to join at the right time.', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(74, 36, 1, 2, 'Staff are completing scorecard related tasks.', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(75, 37, 1, 0, 'Our interns are providing positive ROI', NULL, 'By Manager', NULL, '2012-12-10 04:41:20'),
(76, 38, 1, 0, 'Base of active alumni is growing by 5% each cycle.', NULL, 'Active Alumni can be tracked in SF.\n', NULL, '2012-12-10 04:41:20'),
(77, 38, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(78, 38, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(79, 39, 1, 1, ' A targeted percentage of our alumni are connected to us.', NULL, '10% = 1<br />\n20% = 2<br />\n40 = 3<br />\n60 = 4<br />\n80% = 5', NULL, '2012-12-10 04:41:20'),
(80, 39, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(81, 39, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(82, 40, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(83, 40, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(84, 40, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(85, 41, 1, 0, 'Revenue from accreditation royalties and related product sales doubles vs. 2011.', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(86, 41, 1, 0, 'Non-HOT accredited trainers reach 1,000 people outside of our network in 2012.', NULL, 'Not sure if this is in the ballpark based on Power Character or not.', NULL, '2012-12-10 04:41:20'),
(87, 41, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(88, 42, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(89, 42, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(90, 42, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(91, 43, 1, 2, '50% of Trainees stay involved in volunteer capacity immediately after training cycle.', NULL, 'Each cycle.<br />\nCaptured in Salesforce client engagements', NULL, '2012-12-10 04:41:20'),
(92, 43, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(93, 43, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(94, 44, 1, 0, 'Time to market for new book from first draft is X', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(95, 44, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(96, 44, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:20'),
(97, 45, 1, 1, 'HOT know where to find all process instructions and can easily follow without human intervention.', NULL, 'Each Process owner responsible.<br />\nEach will need to be measured individually.', NULL, '2012-12-10 04:41:21'),
(98, 45, 1, 2, ' Recruiting leads are processed in a timely manner', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(99, 45, 1, 1, ' People stop asking, "By the way, where the heck is...?"', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(100, 45, 1, 1, ' We use the scorecard each week as a management tool.', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(101, 46, 1, 1, 'No registrants complaining about lack of service or not getting webinar information or assessment codes', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(102, 46, 1, 1, '10+ new registrants attending the event ', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(103, 46, 1, 1, ' The social network is posting, tweeting, forwarding, linking the event', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(104, 47, 1, 0, 'The Office is running efficiently and there is less stress. ', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(105, 47, 1, 1, 'Accurate data is being tracked and allowing us to make sound business decisions off real data. ', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(106, 47, 1, 2, 'Technology is being well utilized to improve process at Home Office. ', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(107, 48, 1, 0, ' Increase our trainee count by 20%', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(108, 48, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(109, 48, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(110, 49, 1, 1, '1/2 of all overnight guests are hosted outside of Saratoga property', NULL, 'Lyn J to measure?', NULL, '2012-12-10 04:41:21'),
(111, 49, 1, 1, '1/3 of all community events are hosted by alumni', NULL, 'JH', NULL, '2012-12-10 04:41:21'),
(112, 50, 1, 4, 'A framework has been designed that is consistent with our purposes', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(113, 50, 1, 2, 'Our place needs are being shared with interested parties ', NULL, 'Betenbough, Strite, Esterhuizen', NULL, '2012-12-10 04:41:21'),
(114, 52, 1, 2, 'Home Office plans are understood in each nation where we are active.', NULL, 'SA - 3<br />\nIndonesia - 2<br />\nIndia - 2<br />\nNigeria - 1.5<br />\n<br />\nhow is this measured? Are we asking questions? Same question each nation? Who is asking?<br />\n', NULL, '2012-12-10 04:41:21'),
(115, 52, 1, 5, 'Plans were distributed to key stakeholders.', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(116, 53, 1, 2, 'Community database increased by 20% annually. ', NULL, 'Look at Salesforce for more accurate figures.', NULL, '2012-12-10 04:41:21'),
(117, 53, 1, 1, 'Conversion rate from new contacts to trainee increases by 10%', NULL, NULL, NULL, '2012-12-10 04:41:21'),
(118, 54, 1, 5, 'All budgeted Vine Associates needs are met on a monthly basis.', NULL, 'AG', NULL, '2012-12-10 04:41:21'),
(119, 55, 1, 2, 'Institute Revenues reach $450,000 in 2012.', NULL, 'BJ<br />\n', NULL, '2012-12-10 04:41:21'),
(120, 55, 1, 4, '100% satisfaction from all clients on feedback forms.', NULL, 'KW<br />\n', NULL, '2012-12-10 04:41:21'),
(121, 55, 1, 1, 'Employees and Associates are being paid market related fees. ', NULL, 'BJ', NULL, '2012-12-10 04:41:21'),
(122, 56, 1, 4, ' We are meeting profitability targets for Ventures such that they become sustainable.', NULL, NULL, NULL, '2012-12-10 04:41:22'),
(123, 56, 1, 4, ' Local partners understand and buy into pricing and profitability model.', NULL, NULL, NULL, '2012-12-10 04:41:22'),
(124, 57, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:22'),
(125, 57, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:22'),
(126, 57, 1, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:22'),
(127, 58, 2, 3, '100% of ministries use noah', NULL, NULL, NULL, '2012-12-10 04:41:34'),
(128, 58, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:34'),
(129, 58, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:34'),
(130, 59, 2, 0, 'There are fewer requests to IT specifically to do with information that can be found in ARK. ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(131, 59, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(132, 59, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(133, 60, 2, 0, 'Rate of issues reported on Noah is down to about 1 a month', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(134, 60, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(135, 60, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(136, 61, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(137, 61, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(138, 61, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(139, 62, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(140, 62, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(141, 62, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(142, 63, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(143, 63, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(144, 63, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(145, 64, 2, 0, 'Greater uptake of Classes by other ministries.', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(146, 64, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(147, 64, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(148, 65, 2, 2, '100% of ministries are using Noah and recording information. ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(149, 65, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(150, 65, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(151, 66, 2, 3, 'The number of complaints or tech requests is 2 a week. ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(152, 66, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(153, 66, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(154, 67, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(155, 67, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(156, 67, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(157, 68, 2, 0, 'New person hired and successfully performing their duties', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(158, 68, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(159, 68, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:35'),
(160, 69, 2, 3, 'Internal infrastructure is holding without breakage.', NULL, NULL, NULL, '2012-12-10 04:41:36'),
(161, 69, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:36'),
(162, 69, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:36'),
(163, 70, 2, 1, 'Recovery from catastrophic events reduced to a day and a half', NULL, NULL, NULL, '2012-12-10 04:41:36'),
(164, 70, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:36'),
(165, 70, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:36'),
(166, 71, 2, 0, 'We have a logical working planned rollout of new equipment.', NULL, NULL, NULL, '2012-12-10 04:41:36'),
(167, 71, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:36'),
(168, 71, 2, 0, ' ', NULL, NULL, NULL, '2012-12-10 04:41:36'),
(169, NULL, 3, NULL, 'We create 2 products within the calendar year', 1, NULL, NULL, '2012-12-17 00:30:12'),
(170, NULL, 3, NULL, 'Created products has positive uptake from the market, evidenced by sales. ROI within 1 year', 2, NULL, NULL, '2012-12-17 00:30:12'),
(171, NULL, 3, NULL, 'We create 2 products within the calendar year', 1, NULL, NULL, '2013-01-31 06:36:11'),
(172, NULL, 3, NULL, 'Created products has positive uptake from the market, evidenced by sales. ROI within 1 year', 2, NULL, NULL, '2013-01-31 06:36:11'),
(173, 74, 3, NULL, 'We create 2 products within the calendar year', 1, NULL, NULL, '2013-01-31 06:41:16'),
(174, 74, 3, NULL, 'Created products has positive uptake from the market, evidenced by sales. ROI within 1 year', 2, NULL, NULL, '2013-01-31 06:41:16'),
(175, 75, 3, NULL, 'Measurable evidence of security and growth throughout the staff  ', 1, NULL, NULL, '2013-01-31 06:41:16');

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
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id_idxfk_5` (`user_id`),
  KEY `company_id_idxfk_5` (`company_id`),
  KEY `resource_id_idxfk_5` (`resource_id`),
  KEY `group_id_idxfk_2` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `lemon_assessment`
--

INSERT INTO `lemon_assessment` (`id`, `user_id`, `company_id`, `resource_id`, `resource_status_id`, `group_id`) VALUES
(5, 2, 1, 2, 2, NULL),
(6, 5, 2, 2, 1, NULL),
(7, 5, 6, 2, 1, NULL),
(8, 8, NULL, 5, 2, NULL),
(9, 1, NULL, 5, 1, 1),
(10, 9, NULL, 5, 2, 1),
(11, 10, NULL, 5, 2, 1),
(12, 3, NULL, 5, 2, 1),
(13, 12, NULL, 5, 2, 1),
(14, 13, NULL, 5, 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

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
  KEY `question_id_idxfk_3` (`question_id`),
  KEY `assessment_id_idxfk_2` (`assessment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=601 ;

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
(75, 75, 5, 5),
(76, 1, 8, 3),
(77, 2, 8, 5),
(78, 3, 8, 5),
(79, 4, 8, 5),
(80, 5, 8, 4),
(81, 6, 8, 3),
(82, 7, 8, 5),
(83, 8, 8, 7),
(84, 9, 8, 3),
(85, 10, 8, 2),
(86, 11, 8, 4),
(87, 12, 8, 2),
(88, 13, 8, 1),
(89, 14, 8, 6),
(90, 15, 8, 7),
(91, 16, 8, 4),
(92, 17, 8, 4),
(93, 18, 8, 3),
(94, 19, 8, 1),
(95, 20, 8, 6),
(96, 21, 8, 1),
(97, 22, 8, 3),
(98, 23, 8, 1),
(99, 24, 8, 3),
(100, 25, 8, 5),
(101, 26, 8, 1),
(102, 27, 8, 6),
(103, 28, 8, 1),
(104, 29, 8, 2),
(105, 30, 8, 1),
(106, 31, 8, 3),
(107, 32, 8, 5),
(108, 33, 8, 6),
(109, 34, 8, 7),
(110, 35, 8, 5),
(111, 36, 8, 6),
(112, 37, 8, 3),
(113, 38, 8, 1),
(114, 39, 8, 6),
(115, 40, 8, 3),
(116, 41, 8, 1),
(117, 42, 8, 2),
(118, 43, 8, 1),
(119, 44, 8, 1),
(120, 45, 8, 4),
(121, 46, 8, 5),
(122, 47, 8, 2),
(123, 48, 8, 6),
(124, 49, 8, 7),
(125, 50, 8, 7),
(126, 51, 8, 1),
(127, 52, 8, 4),
(128, 53, 8, 6),
(129, 54, 8, 6),
(130, 55, 8, 1),
(131, 56, 8, 4),
(132, 57, 8, 5),
(133, 58, 8, 1),
(134, 59, 8, 4),
(135, 60, 8, 1),
(136, 61, 8, 7),
(137, 62, 8, 1),
(138, 63, 8, 3),
(139, 64, 8, 1),
(140, 65, 8, 5),
(141, 66, 8, 1),
(142, 67, 8, 7),
(143, 68, 8, 1),
(144, 69, 8, 5),
(145, 70, 8, 1),
(146, 71, 8, 4),
(147, 72, 8, 3),
(148, 73, 8, 3),
(149, 74, 8, 4),
(150, 75, 8, 5),
(151, 1, 9, 6),
(152, 2, 9, 1),
(153, 3, 9, 5),
(154, 4, 9, 4),
(155, 5, 9, 6),
(156, 6, 9, 7),
(157, 7, 9, 5),
(158, 8, 9, 5),
(159, 9, 9, 5),
(160, 10, 9, 6),
(161, 11, 9, 1),
(162, 12, 9, 5),
(163, 13, 9, 4),
(164, 14, 9, 5),
(165, 15, 9, 5),
(166, 16, 9, 6),
(167, 17, 9, 6),
(168, 18, 9, 3),
(169, 19, 9, 6),
(170, 20, 9, 6),
(171, 21, 9, 3),
(172, 22, 9, 3),
(173, 23, 9, 2),
(174, 24, 9, 2),
(175, 25, 9, 1),
(176, 26, 9, 4),
(177, 27, 9, 5),
(178, 28, 9, 4),
(179, 29, 9, 3),
(180, 30, 9, 3),
(181, 31, 9, 1),
(182, 32, 9, 3),
(183, 33, 9, 3),
(184, 34, 9, 3),
(185, 35, 9, 1),
(186, 36, 9, 3),
(187, 37, 9, 3),
(188, 38, 9, 4),
(189, 39, 9, 5),
(190, 40, 9, 5),
(191, 41, 9, 5),
(192, 42, 9, 2),
(193, 43, 9, 5),
(194, 44, 9, 5),
(195, 45, 9, 5),
(196, 46, 9, 5),
(197, 47, 9, 5),
(198, 48, 9, 6),
(199, 49, 9, 7),
(200, 50, 9, 7),
(201, 51, 9, 4),
(202, 52, 9, 2),
(203, 53, 9, 2),
(204, 54, 9, 2),
(205, 55, 9, 2),
(206, 56, 9, 4),
(207, 57, 9, 4),
(208, 58, 9, 5),
(209, 59, 9, 4),
(210, 60, 9, 3),
(211, 61, 9, 2),
(212, 62, 9, 2),
(213, 63, 9, 5),
(214, 64, 9, 5),
(215, 65, 9, 6),
(216, 66, 9, 7),
(217, 67, 9, 7),
(218, 68, 9, 6),
(219, 69, 9, 5),
(220, 70, 9, 4),
(221, 71, 9, 4),
(222, 72, 9, 3),
(223, 73, 9, 3),
(224, 74, 9, 1),
(225, 75, 9, 7),
(226, 1, 10, 1),
(227, 2, 10, 4),
(228, 3, 10, 3),
(229, 4, 10, 6),
(230, 5, 10, 5),
(231, 6, 10, 4),
(232, 7, 10, 3),
(233, 8, 10, 2),
(234, 9, 10, 1),
(235, 10, 10, 2),
(236, 11, 10, 3),
(237, 12, 10, 4),
(238, 13, 10, 5),
(239, 14, 10, 6),
(240, 15, 10, 7),
(241, 16, 10, 6),
(242, 17, 10, 5),
(243, 18, 10, 4),
(244, 19, 10, 3),
(245, 20, 10, 2),
(246, 21, 10, 1),
(247, 22, 10, 1),
(248, 23, 10, 2),
(249, 24, 10, 3),
(250, 25, 10, 4),
(251, 26, 10, 4),
(252, 27, 10, 5),
(253, 28, 10, 6),
(254, 29, 10, 7),
(255, 30, 10, 6),
(256, 31, 10, 5),
(257, 32, 10, 4),
(258, 33, 10, 3),
(259, 34, 10, 2),
(260, 35, 10, 1),
(261, 36, 10, 2),
(262, 37, 10, 3),
(263, 38, 10, 4),
(264, 39, 10, 5),
(265, 40, 10, 6),
(266, 41, 10, 7),
(267, 42, 10, 6),
(268, 43, 10, 5),
(269, 44, 10, 4),
(270, 45, 10, 3),
(271, 46, 10, 2),
(272, 47, 10, 2),
(273, 48, 10, 4),
(274, 49, 10, 3),
(275, 50, 10, 2),
(276, 51, 10, 1),
(277, 52, 10, 1),
(278, 53, 10, 5),
(279, 54, 10, 6),
(280, 55, 10, 7),
(281, 56, 10, 6),
(282, 57, 10, 4),
(283, 58, 10, 4),
(284, 59, 10, 3),
(285, 60, 10, 2),
(286, 61, 10, 1),
(287, 62, 10, 4),
(288, 63, 10, 3),
(289, 64, 10, 6),
(290, 65, 10, 6),
(291, 66, 10, 6),
(292, 67, 10, 7),
(293, 68, 10, 4),
(294, 69, 10, 5),
(295, 70, 10, 3),
(296, 71, 10, 6),
(297, 72, 10, 5),
(298, 73, 10, 5),
(299, 74, 10, 4),
(300, 75, 10, 3),
(301, 1, 11, 1),
(302, 2, 11, 3),
(303, 3, 11, 6),
(304, 4, 11, 7),
(305, 5, 11, 5),
(306, 6, 11, 4),
(307, 7, 11, 3),
(308, 8, 11, 2),
(309, 9, 11, 1),
(310, 10, 11, 1),
(311, 11, 11, 1),
(312, 12, 11, 2),
(313, 13, 11, 3),
(314, 14, 11, 3),
(315, 15, 11, 3),
(316, 16, 11, 4),
(317, 17, 11, 4),
(318, 18, 11, 4),
(319, 19, 11, 5),
(320, 20, 11, 5),
(321, 21, 11, 5),
(322, 22, 11, 6),
(323, 23, 11, 6),
(324, 24, 11, 6),
(325, 25, 11, 7),
(326, 26, 11, 7),
(327, 27, 11, 6),
(328, 28, 11, 6),
(329, 29, 11, 6),
(330, 30, 11, 5),
(331, 31, 11, 5),
(332, 32, 11, 5),
(333, 33, 11, 4),
(334, 34, 11, 4),
(335, 35, 11, 4),
(336, 36, 11, 4),
(337, 37, 11, 4),
(338, 38, 11, 3),
(339, 39, 11, 3),
(340, 40, 11, 3),
(341, 41, 11, 4),
(342, 42, 11, 4),
(343, 43, 11, 4),
(344, 44, 11, 3),
(345, 45, 11, 3),
(346, 46, 11, 3),
(347, 47, 11, 3),
(348, 48, 11, 3),
(349, 49, 11, 3),
(350, 50, 11, 3),
(351, 51, 11, 4),
(352, 52, 11, 4),
(353, 53, 11, 4),
(354, 54, 11, 5),
(355, 55, 11, 5),
(356, 56, 11, 4),
(357, 57, 11, 1),
(358, 58, 11, 3),
(359, 59, 11, 2),
(360, 60, 11, 2),
(361, 61, 11, 1),
(362, 62, 11, 1),
(363, 63, 11, 2),
(364, 64, 11, 3),
(365, 65, 11, 3),
(366, 66, 11, 4),
(367, 67, 11, 5),
(368, 68, 11, 6),
(369, 69, 11, 6),
(370, 70, 11, 7),
(371, 71, 11, 7),
(372, 72, 11, 7),
(373, 73, 11, 7),
(374, 74, 11, 7),
(375, 75, 11, 7),
(376, 1, 12, 3),
(377, 2, 12, 5),
(378, 3, 12, 4),
(379, 4, 12, 3),
(380, 5, 12, 2),
(381, 6, 12, 1),
(382, 7, 12, 3),
(383, 8, 12, 4),
(384, 9, 12, 5),
(385, 10, 12, 6),
(386, 11, 12, 7),
(387, 12, 12, 6),
(388, 13, 12, 5),
(389, 14, 12, 5),
(390, 15, 12, 4),
(391, 16, 12, 1),
(392, 17, 12, 6),
(393, 18, 12, 7),
(394, 19, 12, 7),
(395, 20, 12, 6),
(396, 21, 12, 5),
(397, 22, 12, 4),
(398, 23, 12, 3),
(399, 24, 12, 2),
(400, 25, 12, 1),
(401, 26, 12, 1),
(402, 27, 12, 2),
(403, 28, 12, 2),
(404, 29, 12, 2),
(405, 30, 12, 2),
(406, 31, 12, 3),
(407, 32, 12, 3),
(408, 33, 12, 3),
(409, 34, 12, 4),
(410, 35, 12, 4),
(411, 36, 12, 4),
(412, 37, 12, 5),
(413, 38, 12, 5),
(414, 39, 12, 5),
(415, 40, 12, 6),
(416, 41, 12, 6),
(417, 42, 12, 6),
(418, 43, 12, 7),
(419, 44, 12, 7),
(420, 45, 12, 7),
(421, 46, 12, 6),
(422, 47, 12, 5),
(423, 48, 12, 4),
(424, 49, 12, 3),
(425, 50, 12, 2),
(426, 51, 12, 1),
(427, 52, 12, 1),
(428, 53, 12, 1),
(429, 54, 12, 2),
(430, 55, 12, 2),
(431, 56, 12, 3),
(432, 57, 12, 3),
(433, 58, 12, 3),
(434, 59, 12, 3),
(435, 60, 12, 3),
(436, 61, 12, 4),
(437, 62, 12, 2),
(438, 63, 12, 1),
(439, 64, 12, 1),
(440, 65, 12, 1),
(441, 66, 12, 1),
(442, 67, 12, 2),
(443, 68, 12, 2),
(444, 69, 12, 1),
(445, 70, 12, 3),
(446, 71, 12, 4),
(447, 72, 12, 4),
(448, 73, 12, 7),
(449, 74, 12, 4),
(450, 75, 12, 2),
(451, 1, 13, 1),
(452, 2, 13, 5),
(453, 3, 13, 7),
(454, 4, 13, 6),
(455, 5, 13, 5),
(456, 6, 13, 4),
(457, 7, 13, 4),
(458, 8, 13, 4),
(459, 9, 13, 2),
(460, 10, 13, 3),
(461, 11, 13, 3),
(462, 12, 13, 2),
(463, 13, 13, 2),
(464, 14, 13, 2),
(465, 15, 13, 1),
(466, 16, 13, 1),
(467, 17, 13, 1),
(468, 18, 13, 1),
(469, 19, 13, 1),
(470, 20, 13, 1),
(471, 21, 13, 1),
(472, 22, 13, 1),
(473, 23, 13, 1),
(474, 24, 13, 1),
(475, 25, 13, 1),
(476, 26, 13, 1),
(477, 27, 13, 1),
(478, 28, 13, 1),
(479, 29, 13, 1),
(480, 30, 13, 1),
(481, 31, 13, 1),
(482, 32, 13, 1),
(483, 33, 13, 1),
(484, 34, 13, 1),
(485, 35, 13, 1),
(486, 36, 13, 1),
(487, 37, 13, 1),
(488, 38, 13, 1),
(489, 39, 13, 1),
(490, 40, 13, 1),
(491, 41, 13, 1),
(492, 42, 13, 1),
(493, 43, 13, 1),
(494, 44, 13, 1),
(495, 45, 13, 1),
(496, 46, 13, 1),
(497, 47, 13, 1),
(498, 48, 13, 1),
(499, 49, 13, 1),
(500, 50, 13, 1),
(501, 51, 13, 1),
(502, 52, 13, 1),
(503, 53, 13, 1),
(504, 54, 13, 1),
(505, 55, 13, 1),
(506, 56, 13, 1),
(507, 57, 13, 1),
(508, 58, 13, 1),
(509, 59, 13, 1),
(510, 60, 13, 1),
(511, 61, 13, 1),
(512, 62, 13, 1),
(513, 63, 13, 1),
(514, 64, 13, 1),
(515, 65, 13, 7),
(516, 66, 13, 5),
(517, 67, 13, 4),
(518, 68, 13, 3),
(519, 69, 13, 1),
(520, 70, 13, 1),
(521, 71, 13, 1),
(522, 72, 13, 2),
(523, 73, 13, 3),
(524, 74, 13, 3),
(525, 75, 13, 4),
(526, 1, 14, 1),
(527, 2, 14, 1),
(528, 3, 14, 1),
(529, 4, 14, 6),
(530, 5, 14, 5),
(531, 6, 14, 5),
(532, 7, 14, 4),
(533, 8, 14, 3),
(534, 9, 14, 1),
(535, 10, 14, 2),
(536, 11, 14, 4),
(537, 12, 14, 5),
(538, 13, 14, 5),
(539, 14, 14, 6),
(540, 15, 14, 6),
(541, 16, 14, 6),
(542, 17, 14, 1),
(543, 18, 14, 5),
(544, 19, 14, 5),
(545, 20, 14, 5),
(546, 21, 14, 5),
(547, 22, 14, 5),
(548, 23, 14, 5),
(549, 24, 14, 4),
(550, 25, 14, 4),
(551, 26, 14, 4),
(552, 27, 14, 4),
(553, 28, 14, 6),
(554, 29, 14, 5),
(555, 30, 14, 5),
(556, 31, 14, 3),
(557, 32, 14, 4),
(558, 33, 14, 1),
(559, 34, 14, 3),
(560, 35, 14, 2),
(561, 36, 14, 3),
(562, 37, 14, 2),
(563, 38, 14, 1),
(564, 39, 14, 3),
(565, 40, 14, 3),
(566, 41, 14, 3),
(567, 42, 14, 3),
(568, 43, 14, 3),
(569, 44, 14, 1),
(570, 45, 14, 1),
(571, 46, 14, 2),
(572, 47, 14, 5),
(573, 48, 14, 5),
(574, 49, 14, 6),
(575, 50, 14, 1),
(576, 51, 14, 6),
(577, 52, 14, 6),
(578, 53, 14, 4),
(579, 54, 14, 5),
(580, 55, 14, 3),
(581, 56, 14, 2),
(582, 57, 14, 2),
(583, 58, 14, 2),
(584, 59, 14, 1),
(585, 60, 14, 1),
(586, 61, 14, 1),
(587, 62, 14, 1),
(588, 63, 14, 1),
(589, 64, 14, 1),
(590, 65, 14, 1),
(591, 66, 14, 1),
(592, 67, 14, 1),
(593, 68, 14, 1),
(594, 69, 14, 1),
(595, 70, 14, 1),
(596, 71, 14, 1),
(597, 72, 14, 1),
(598, 73, 14, 1),
(599, 74, 14, 1),
(600, 75, 14, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `id`, `role_id`) VALUES
('gseeto', 'gseeto', 1, 1),
('bjohnson', 'bjohnson', 3, 1),
('lwidjaja', 'lwidjaja', 5, 2),
('linhly', 'linhly', 6, 4),
('dandrews', 'dandrews', 7, 2),
('ljohnson', 'ljohnson', 8, 4),
('kwilson', 'kwilson', 9, 1),
('batman', 'gotham', 10, 4),
('superman', 'kryptonite', 11, 4),
('wonderwoman', 'lasso', 12, 4),
('mcheves', 'mcheves', 13, 3),
('bkenny', 'bkenny', 14, 4),
('bbright', 'bbright', 15, 4),
('bclinton', 'bclinton', 16, 4),
('rregean', 'rregean', 17, 4),
('bobama', 'bobama', 18, 4),
('gbush', 'gbush', 19, 4);

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `resource_status`
--

INSERT INTO `resource_status` (`id`, `value`) VALUES
(1, 'Untouched'),
(2, 'Touched'),
(3, 'Disabled');

-- --------------------------------------------------------

--
-- Table structure for table `resource_user_assn`
--

CREATE TABLE IF NOT EXISTS `resource_user_assn` (
  `resource_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `resource_id_idxfk_2` (`resource_id`),
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
(5, 6),
(3, 1),
(3, 3),
(5, 8),
(5, 1),
(5, 9),
(5, 10),
(5, 3),
(5, 12),
(5, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'Company Manager'),
(4, 'User');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `scorecard`
--

INSERT INTO `scorecard` (`id`, `company_id`, `name`, `resource_id`) VALUES
(1, 2, 'institute', 1),
(2, 3, 'alcf', 1),
(3, 4, 'Gadgets Inc', 1);

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
(6, 1),
(7, 1),
(2, 2),
(3, 2),
(7, 2),
(1, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `statement`
--

INSERT INTO `statement` (`id`, `value`, `scorecard_id`, `is_purpose`, `modified_by`, `modified`) VALUES
(2, 'Put a purpose Statement in here and make a change.\nSee if this works  ', 1, 1, 1, '2013-01-31 06:31:06'),
(3, 'Add my purpose for working at ALCF.\nTo Bridge the gap between the spheres of Religion and Business.', 2, 1, 1, '2012-11-21 06:24:42'),
(4, 'Position myself uniquely between two sectors of society, cross polinating ideas and methodologies.', 2, 0, 1, '2012-11-21 06:25:41'),
(5, 'put something in here\n', 1, 0, 1, '2013-01-25 00:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `status_type`
--

CREATE TABLE IF NOT EXISTS `status_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `value` (`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

-- --------------------------------------------------------

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `strategy`
--

INSERT INTO `strategy` (`id`, `strategy`, `priority`, `count`, `scorecard_id`, `category_type_id`, `modified_by`, `modified`) VALUES
(7, 'I stuffed that one up a bit..', 1, 1, 1, 1, 1, '2013-01-31 06:31:31'),
(8, 'Integrate all we do consistent with our Values and Foundational Principles so that we live out our Vision.', NULL, 2, 1, 1, NULL, '2012-12-10 04:41:16'),
(9, 'Explore the right governance structure for the various organizations in our household so that accountability is effective, growth is not impeded, and integrity is beyond question.', NULL, 3, 1, 1, NULL, '2012-12-10 04:41:16'),
(10, 'Create an atmosphere and environment where we constantly seek and invite God''s presence so his purposes in each life we touch can be accomplished. ', NULL, 4, 1, 1, NULL, '2012-12-10 04:41:16'),
(11, 'India: Clarifying and documenting the Institute''s values, then propagating them to the community through discipleship so that the Institute remains true to their purpose and foundational values even as they expand. ', NULL, 5, 1, 1, NULL, '2012-12-10 04:41:16'),
(12, 'Focus on trunk health by "bedding-down" our core products and preparing them for multiplication and expansion.<br />\n', NULL, 1, 1, 2, NULL, '2012-12-10 04:41:16'),
(13, 'Increase communication and understanding with new and past clients so they can  engage across and within product streams.<br />\n', NULL, 2, 1, 2, NULL, '2012-12-10 04:41:16'),
(14, 'Improve existing book distribution to increase impact and income.  ', NULL, 3, 1, 2, NULL, '2012-12-10 04:41:16'),
(15, 'Conduct "Repurposing Business Training" twice a year so that more people have an opportunity to explore foundational truths pertaining to their work as ministry and to walk it out in a practical way in the context of community.', NULL, 4, 1, 2, NULL, '2012-12-10 04:41:16'),
(16, 'Develop and improve the online scorecard so that we can utilize it as a useful tool to ensure we implement our strategies to the fullest, and provide it to others to help with their implementation.', NULL, 5, 1, 2, NULL, '2012-12-10 04:41:17'),
(17, 'India: Reassess existing Institute products and their applicability in the Indian market so that we are seen as innovative, competitive and appealing.', NULL, 6, 1, 2, NULL, '2012-12-10 04:41:18'),
(18, 'India: Investigate and create new Institute products such as HR specific product line that can complement the existing product architecture so that we have a greater depth of offerings to meet customer needs. ', NULL, 7, 1, 2, NULL, '2012-12-10 04:41:18'),
(19, 'Host Intensive to impact international Executives and Leaders in week long training so that their businesses are repurposed and their societies impacted through the content and on-going relationship with the rep community.  ', NULL, 8, 1, 2, NULL, '2012-12-10 04:41:18'),
(20, 'Create additional online Assessments for Transforming Society so that we can fill the gaps in our Product Architecture and offer a more comprehensive, effective service to clients. KW - this "so that" is inwardly focused. What do we want to help our clients achieve?', NULL, 9, 1, 2, NULL, '2012-12-10 04:41:18'),
(21, 'must have been cancelled or something', NULL, 1, 1, 3, 1, '2013-01-25 00:09:16'),
(22, 'Execute a Positioning Campaign with Alumni and Stakeholders to ensure that they are effective Brand Ambassadors.', 3, 2, 1, 3, 1, '2013-01-25 19:55:16'),
(23, 'Improve and streamline our web presence to increase web-generated leads and sales for our products.', NULL, 1, 1, 4, NULL, '2012-12-10 04:41:18'),
(24, 'Improve our use of social networking to continue to build and connect our worldwide community.', NULL, 2, 1, 4, NULL, '2012-12-10 04:41:18'),
(25, 'Improve existing product distribution to increase impact and income. <br />\n', NULL, 3, 1, 4, NULL, '2012-12-10 04:41:18'),
(26, 'Identify and equip "complementors" in each location who can build awareness of us, and create demand for our products. ', NULL, 4, 1, 4, NULL, '2012-12-10 04:41:18'),
(27, 'Develop a more intentional strategy about progressing and converting leads at in-person events and other community building funnels so that we have a broader reach overall. ', NULL, 5, 1, 4, NULL, '2012-12-10 04:41:19'),
(28, ' To streamline and optimize our process of preparing for recruiting events so that we can leverage them more efficiently as a marketing tool and provide consistent and excellent service.', NULL, 6, 1, 4, NULL, '2012-12-10 04:41:19'),
(29, 'India: Develop a process by which to approach Client Recruitment so that we expand our presence in a measurable and methodical manner.', NULL, 7, 1, 4, NULL, '2012-12-10 04:41:19'),
(30, 'India: Create a database of potential corporate and education businesses and organizations so that the Institute can build relationship and presence in those sectors.', NULL, 8, 1, 4, NULL, '2012-12-10 04:41:19'),
(31, 'Create a testimonial capture page that will allow the community to enter client/consultant testimonies and to view a database of existing ones so that people will be encouraged and strengthened in their faith.', NULL, 9, 1, 4, NULL, '2012-12-10 04:41:19'),
(32, 'Expand our current partnering relationships to include additional HOPs that will further the purpose of Transforming Society.', NULL, 1, 1, 5, NULL, '2012-12-10 04:41:19'),
(33, 'Develop a core competence in Partnering for HOT and selected alumni so that we can capitalize on the large number of looming partnering opportunities.', NULL, 2, 1, 5, NULL, '2012-12-10 04:41:19'),
(34, 'Encourage US-based rep business owners to transform their spheres of influence and build community.', NULL, 3, 1, 5, NULL, '2012-12-10 04:41:20'),
(35, 'India: Identify, assess and initiate partnerships that are mutually beneficial, aligned with the Institute''s purpose and result in greater impact and presence in the marketplace. ', NULL, 4, 1, 5, NULL, '2012-12-10 04:41:20'),
(36, 'Ensure that we have the right staff and renumeration in place to handle the core functions needed to support the level of field activity (US and abroad). ', NULL, 1, 1, 7, NULL, '2012-12-10 04:41:20'),
(37, 'Develop an on-going list of intern projects for those who would like to volunteer for a set period of time. ', NULL, 2, 1, 7, NULL, '2012-12-10 04:41:20'),
(38, 'Revisit Leadership Track / Broader Alumni Relations Strategy to better deploy and support our community. <br />\nNote: Is this the right strategy?', NULL, 3, 1, 7, NULL, '2012-12-10 04:41:20'),
(39, ' Develop a way for committed community to be more connected to us.', NULL, 4, 1, 7, NULL, '2012-12-10 04:41:20'),
(40, 'India: Involve the existing rep alumni and draw them into both community and ministry together.', NULL, 5, 1, 7, NULL, '2012-12-10 04:41:20'),
(41, 'Refine and implement accreditation process for our product streams to increase global impact and provide incremental revenue.', NULL, 6, 1, 7, NULL, '2012-12-10 04:41:20'),
(42, 'Develop post training 10-P and 10-F assessments for trainees so that they have a way of systematically measuring the impact of training on their lives and can clearly communicate the benefits to their friends and family, whilst giving the Institute quantifiable feedback measures to improve future training.', NULL, 7, 1, 7, NULL, '2012-12-10 04:41:20'),
(43, 'Improve our soft processes to grow our community and release leaders to walk out their callings.', NULL, 1, 1, 6, NULL, '2012-12-10 04:41:20'),
(44, 'Determine what it means to do e-publishing first, and then complement with hard copy.<br />\n', NULL, 2, 1, 6, NULL, '2012-12-10 04:41:20'),
(45, 'Focus on trunk-health by bedding-down our core processes and removing pain points to prepare us for multiplication and expansion.  ', NULL, 3, 1, 6, NULL, '2012-12-10 04:41:20'),
(46, 'Streamline and optimize our process of preparing for webinar/seminars/events so that we can leverage them more efficiently as a marketing tool and provide consistent and excellent service. ', NULL, 4, 1, 6, NULL, '2012-12-10 04:41:21'),
(47, 'Ensure that every day miscellaneous tasks are completed in timely fashion to ensure the Office runs smoothly and effectively.', NULL, 5, 1, 6, NULL, '2012-12-10 04:41:21'),
(48, ' Improve our process of keeping in contact with leads (after events) so that we know how and when to approach them for potential training', NULL, 6, 1, 6, NULL, '2012-12-10 04:41:21'),
(49, 'Expand community building opportunities by identifying additional places to share and teach hospitality.', NULL, 1, 1, 8, NULL, '2012-12-10 04:41:21'),
(50, 'Develop a framework for Place and future campus so that our needs are clearly articulated.', NULL, 2, 1, 8, NULL, '2012-12-10 04:41:21'),
(51, 'Develop the "go to nation" strategy for new countries.', NULL, 3, 1, 8, NULL, '2012-12-10 04:41:21'),
(52, 'Issue planning summary communications so that stakeholders can actively align with our strategies and initiatives.', NULL, 1, 1, 9, NULL, '2012-12-10 04:41:21'),
(53, 'Construct and document a comprehensive and cohesive sales and marketing plan so that resources can be allocated, targets can be met, and The Institute can have greater impact, both wide and deep. ', NULL, 2, 1, 9, NULL, '2012-12-10 04:41:21'),
(54, 'Develop more intentional Vine Associates fundraising model for community expenses.', NULL, 1, 1, 10, NULL, '2012-12-10 04:41:21'),
(55, 'Develop and implement our Sales Methodology to convert a greater percentage of leads and contacts into revenue-producing work. ', NULL, 2, 1, 10, NULL, '2012-12-10 04:41:21'),
(56, ' Re-examine pricing of products to ensure profitability.', NULL, 3, 1, 10, NULL, '2012-12-10 04:41:21'),
(57, 'India: Develop strong, steady revenue streams so that we ensure sustainability and increase impact.', NULL, 4, 1, 10, NULL, '2012-12-10 04:41:22'),
(58, 'Maintain and add functionality to the Church Management System (noah) so that Admin Office staff are fully enabled to do their jobs and the church is better served as a result.', NULL, 1, 2, 2, NULL, '2012-12-10 04:41:34'),
(59, 'Maintain and add functionality to the Church Intranet (ark) so that Admin Office staff are fully enabled to do their jobs and the church is better served as a result. ', NULL, 2, 2, 2, NULL, '2012-12-10 04:41:34'),
(60, 'Deal with errors and bugs found in Noah so that the system is robust and with fewer errors.', NULL, 3, 2, 2, NULL, '2012-12-10 04:41:35'),
(61, 'Construct Reporting module for Noah so that we can more efficiently data mine the DB for useful information', NULL, 4, 2, 2, NULL, '2012-12-10 04:41:35'),
(62, 'Maintain and add functionality to the Stewardship Module of NOAH so that Finance staff are fully enabled to do their jobs in an efficient and productive manner.', NULL, 5, 2, 2, NULL, '2012-12-10 04:41:35'),
(63, 'Maintain and add functionality to the Groups Module of NOAH so that specific Ministry staff are fully enabled to do their jobs in an efficient and productive manner.', NULL, 6, 2, 2, NULL, '2012-12-10 04:41:35'),
(64, 'Maintain and add functionality to the Classes Module of NOAH so that all ministries with training classes can begin to use and we can store class information in a single repository.', NULL, 7, 2, 2, NULL, '2012-12-10 04:41:35'),
(65, 'Inform, educate and encourage ministries to begin using Noah so that we manage the information and begin reporting, tracking and monitoring in an optimal manner.', NULL, 1, 2, 4, NULL, '2012-12-10 04:41:35'),
(66, 'Maintain a prompt response time and helpful attitude for IT requests so that the relationship between the IT department and office staff is positive.', NULL, 1, 2, 7, NULL, '2012-12-10 04:41:35'),
(67, 'Keep good relations with third party vendors so that we receive prompt and efficient service. ', NULL, 2, 2, 7, NULL, '2012-12-10 04:41:35'),
(68, 'Hire a good quality Help Desk administrator so that the services to the ALCF Church Administration staff continue in an efficient and timely manner, with full support coverage.', NULL, 3, 2, 7, NULL, '2012-12-10 04:41:35'),
(69, 'Create and maintain a stable and operable IT infrastructure framework so that ALCF administrative staff have an environment in which they can remain productive.  ', NULL, 1, 2, 6, NULL, '2012-12-10 04:41:35'),
(70, 'Institute and maintain a process for backing up key machines and data so that in case of catastrophic disasters we have a process in place to ensure recovery with a minimum loss of time and data ', NULL, 2, 2, 6, NULL, '2012-12-10 04:41:36'),
(71, 'Maintain Inventory of hardware and software so we can have a baseline around which to develop new hardware rollout strategies', NULL, 3, 2, 6, NULL, '2012-12-10 04:41:36'),
(74, 'Develop a systematic approach to product development so that we develop useful products that are aligned with our purpose.', NULL, 1, 3, 2, NULL, '2013-01-31 06:41:16'),
(75, 'Mentoring / discipling of current employees', NULL, 1, 3, 7, NULL, '2013-01-31 06:41:16');

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
(13, 2),
(15, 2),
(15, 1),
(23, 2),
(27, 2),
(27, 1),
(16, 3),
(16, 1),
(14, 2),
(24, 1),
(25, 4),
(34, 2),
(34, 1),
(7, 2),
(8, 2),
(19, 2),
(9, 4),
(9, 5),
(29, 5),
(30, 6),
(26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `strategy_question_conditional`
--

CREATE TABLE IF NOT EXISTS `strategy_question_conditional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `strategy_id` int(11) DEFAULT NULL,
  `conditional_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `question_id_idxfk` (`question_id`),
  KEY `strategy_id_idxfk_4` (`strategy_id`),
  KEY `conditional_type_idxfk` (`conditional_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `strategy_question_conditional`
--

INSERT INTO `strategy_question_conditional` (`id`, `question_id`, `strategy_id`, `conditional_type`) VALUES
(1, 1, 2, 3),
(2, 6, 3, 2),
(3, 13, 4, 7),
(4, 25, 14, 5);

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
(7, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(23, 1),
(23, 2),
(32, 1),
(32, 2),
(32, 9),
(34, 1),
(16, 1),
(25, 1),
(25, 2),
(27, 1),
(27, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tenure_list`
--

CREATE TABLE IF NOT EXISTS `tenure_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `range` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tenure_list`
--

INSERT INTO `tenure_list` (`id`, `range`) VALUES
(1, '0-3 Years'),
(2, '4-7 Years'),
(3, '> 7 Years');

-- --------------------------------------------------------

--
-- Table structure for table `ten_f_assessment`
--

CREATE TABLE IF NOT EXISTS `ten_f_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_status_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `resource_status_id_idxfk_2` (`resource_status_id`),
  KEY `resource_id_idxfk_6` (`resource_id`),
  KEY `user_id_idxfk_6` (`user_id`),
  KEY `group_id_idxfk_3` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ten_f_assessment`
--

INSERT INTO `ten_f_assessment` (`id`, `resource_status_id`, `resource_id`, `user_id`, `group_id`) VALUES
(1, 2, 3, 1, NULL),
(2, 1, 3, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ten_f_questions`
--

CREATE TABLE IF NOT EXISTS `ten_f_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) DEFAULT NULL,
  `text` varchar(514) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `count` (`count`),
  KEY `category_id_idxfk_2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `ten_f_questions`
--

INSERT INTO `ten_f_questions` (`id`, `count`, `text`, `category_id`) VALUES
(1, 1, 'I am joyful.', 1),
(2, 2, 'I have a healthy assessment of myself.', 1),
(3, 3, 'I see my heart as a positive thing.', 1),
(4, 4, 'I have good self-esteem.', 1),
(5, 5, 'I understand the source of my good ideas.', 2),
(6, 6, 'I have aquaintances who stimulate my thinking.', 2),
(7, 7, 'I apply fresh thinking to my personal life.', 2),
(8, 8, 'I am regularly challenged by the truths revealed in scripture.', 2),
(9, 9, 'I am a good friend.', 3),
(10, 10, 'I have good friends.', 3),
(11, 11, 'I have people to turn to when I am in need.', 3),
(12, 12, 'I feel affirmed by a group of people who know me well.', 3),
(13, 13, 'My work matches my gifts.', 4),
(14, 14, 'My calling and career are aligned.', 4),
(15, 15, 'My work is helping me discover my purpose.', 4),
(16, 16, 'I feel I am accomplishing things of eternal consequence with my work.', 4),
(17, 17, 'I know myself well enough to take on a focused role in society.', 5),
(18, 18, 'My work contributes towards that role.', 5),
(19, 19, 'I have a vision to see my society changed.', 5),
(20, 20, 'I am shaping my community with my biblical world view.', 5),
(21, 21, 'I have fun.', 6),
(22, 22, 'I am a fun person to be around.', 6),
(23, 23, 'I use humor appropriately to accomplish Impact.', 6),
(24, 24, 'I do not deflect using humor.', 6),
(25, 25, 'My family relationships are healthy.', 7),
(26, 26, 'My family understands my work.', 7),
(27, 27, 'My family sees my work as a calling.', 7),
(28, 28, 'My family has a "collective" calling.', 7),
(29, 29, 'I regularly assess the state of my health.', 8),
(30, 30, 'My current health allows me to do all the things I feel God desires me to do.', 8),
(31, 31, 'I regularly investigate/enact ways to live a healthier lifestyle.', 8),
(32, 32, 'I spend sufficient time each week engaging in physical activities that cause me to grow in strength/ability.', 8),
(33, 33, 'I am free from the love of money.', 9),
(34, 34, 'My possessions do not erode my margin.', 9),
(35, 35, 'I give generously.', 9),
(36, 36, 'I am content with my finances.', 9),
(37, 37, 'I know why I believe what I believe.', 10),
(38, 38, 'My faith is growing.', 10),
(39, 39, 'My faith reaches to all areas of my life.', 10),
(40, 40, 'I am free from false guilt.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ten_f_results`
--

CREATE TABLE IF NOT EXISTS `ten_f_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `assessment_id` int(11) DEFAULT NULL,
  `performance` int(11) DEFAULT NULL,
  `importance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `question_id_idxfk_4` (`question_id`),
  KEY `assessment_id_idxfk_3` (`assessment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `ten_f_results`
--

INSERT INTO `ten_f_results` (`id`, `question_id`, `assessment_id`, `performance`, `importance`) VALUES
(1, 1, 1, 5, 6),
(2, 2, 1, 5, 7),
(3, 3, 1, 5, 6),
(4, 4, 1, 4, 7),
(5, 5, 1, 4, 6),
(6, 6, 1, 3, 5),
(7, 7, 1, 4, 6),
(8, 8, 1, 3, 6),
(9, 9, 1, 5, 7),
(10, 10, 1, 3, 7),
(11, 11, 1, 4, 6),
(12, 12, 1, 3, 6),
(13, 13, 1, 5, 7),
(14, 14, 1, 6, 7),
(15, 15, 1, 4, 5),
(16, 16, 1, 5, 7),
(17, 17, 1, 5, 6),
(18, 18, 1, 3, 6),
(19, 19, 1, 5, 7),
(20, 20, 1, 3, 6),
(21, 21, 1, 3, 6),
(22, 22, 1, 3, 5),
(23, 23, 1, 4, 5),
(24, 24, 1, 2, 5),
(25, 25, 1, 6, 7),
(26, 26, 1, 4, 6),
(27, 27, 1, 5, 6),
(28, 28, 1, 2, 6),
(29, 29, 1, 5, 6),
(30, 30, 1, 6, 6),
(31, 31, 1, 4, 5),
(32, 32, 1, 3, 6),
(33, 33, 1, 4, 7),
(34, 34, 1, 5, 6),
(35, 35, 1, 5, 7),
(36, 36, 1, 3, 6),
(37, 37, 1, 6, 7),
(38, 38, 1, 3, 6),
(39, 39, 1, 6, 7),
(40, 40, 1, 3, 7);

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
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `resource_status_id_idxfk` (`resource_status_id`),
  KEY `company_id_idxfk_3` (`company_id`),
  KEY `resource_id_idxfk_3` (`resource_id`),
  KEY `user_id_idxfk_3` (`user_id`),
  KEY `group_id_idxfk` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ten_p_assessment`
--

INSERT INTO `ten_p_assessment` (`id`, `resource_status_id`, `company_id`, `resource_id`, `user_id`, `group_id`) VALUES
(1, 2, 2, 2, 1, NULL),
(2, 1, 2, 2, 2, NULL),
(3, 1, NULL, 2, 4, NULL),
(4, 1, NULL, 2, 5, NULL),
(5, 2, NULL, 2, 3, NULL),
(6, 2, NULL, 2, 14, 3),
(7, 2, NULL, 2, 15, 3),
(8, 2, NULL, 2, 16, 3),
(9, 2, NULL, 2, 17, 3);

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
  KEY `category_id_idxfk` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

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
(37, 37, 1, 6, 2),
(38, 38, 1, 7, 2),
(39, 39, 1, 6, 2),
(40, 40, 1, 7, 3),
(41, 1, 5, 2, 7),
(42, 2, 5, 4, 3),
(43, 3, 5, 4, 5),
(44, 4, 5, 4, 7),
(45, 5, 5, 3, 6),
(46, 6, 5, 4, 5),
(47, 7, 5, 3, 7),
(48, 8, 5, 3, 7),
(49, 9, 5, 3, 5),
(50, 10, 5, 6, 7),
(51, 11, 5, 4, 6),
(52, 12, 5, 3, 5),
(53, 13, 5, 1, 5),
(54, 14, 5, 7, 6),
(55, 15, 5, 4, 7),
(56, 16, 5, 4, 5),
(57, 17, 5, 3, 4),
(58, 18, 5, 3, 4),
(59, 19, 5, 5, 6),
(60, 20, 5, 5, 6),
(61, 21, 5, 3, 5),
(62, 22, 5, 4, 5),
(63, 23, 5, 3, 7),
(64, 24, 5, 5, 7),
(65, 25, 5, 4, 5),
(66, 26, 5, 1, 5),
(67, 27, 5, 4, 6),
(68, 28, 5, 1, 4),
(69, 29, 5, 3, 6),
(70, 30, 5, 7, 7),
(71, 31, 5, 3, 7),
(72, 32, 5, 6, 6),
(73, 33, 5, 3, 6),
(74, 34, 5, 3, 6),
(75, 35, 5, 4, 5),
(76, 36, 5, 6, 7),
(77, 37, 5, 4, 4),
(78, 38, 5, 6, 5),
(79, 39, 5, 4, 6),
(80, 40, 5, 2, 6),
(81, 1, 6, 3, 5),
(82, 2, 6, 4, 6),
(83, 3, 6, 5, 7),
(84, 4, 6, 3, 4),
(85, 5, 6, 3, 6),
(86, 6, 6, 5, 3),
(87, 7, 6, 2, 7),
(88, 8, 6, 4, 5),
(89, 9, 6, 3, 4),
(90, 10, 6, 2, 4),
(91, 11, 6, 4, 5),
(92, 12, 6, 3, 5),
(93, 13, 6, 3, 4),
(94, 14, 6, 4, 6),
(95, 15, 6, 6, 6),
(96, 16, 6, 3, 7),
(97, 17, 6, 1, 6),
(98, 18, 6, 4, 6),
(99, 19, 6, 4, 7),
(100, 20, 6, 1, 6),
(101, 21, 6, 5, 7),
(102, 22, 6, 1, 3),
(103, 23, 6, 4, 2),
(104, 24, 6, 5, 4),
(105, 25, 6, 1, 4),
(106, 26, 6, 2, 1),
(107, 27, 6, 3, 7),
(108, 28, 6, 3, 7),
(109, 29, 6, 1, 5),
(110, 30, 6, 6, 4),
(111, 31, 6, 3, 5),
(112, 32, 6, 1, 2),
(113, 33, 6, 6, 7),
(114, 34, 6, 4, 4),
(115, 35, 6, 3, 7),
(116, 36, 6, 2, 5),
(117, 37, 6, 3, 6),
(118, 38, 6, 3, 4),
(119, 39, 6, 1, 7),
(120, 40, 6, 5, 6),
(121, 1, 7, 4, 5),
(122, 2, 7, 3, 5),
(123, 3, 7, 1, 5),
(124, 4, 7, 2, 4),
(125, 5, 7, 1, 7),
(126, 6, 7, 3, 7),
(127, 7, 7, 3, 5),
(128, 8, 7, 4, 7),
(129, 9, 7, 4, 6),
(130, 10, 7, 4, 3),
(131, 11, 7, 3, 6),
(132, 12, 7, 1, 6),
(133, 13, 7, 3, 6),
(134, 14, 7, 4, 4),
(135, 15, 7, 3, 5),
(136, 16, 7, 3, 5),
(137, 17, 7, 3, 4),
(138, 18, 7, 1, 4),
(139, 19, 7, 1, 3),
(140, 20, 7, 4, 6),
(141, 21, 7, 3, 4),
(142, 22, 7, 2, 5),
(143, 23, 7, 1, 6),
(144, 24, 7, 1, 4),
(145, 25, 7, 1, 1),
(146, 26, 7, 3, 7),
(147, 27, 7, 7, 6),
(148, 28, 7, 3, 7),
(149, 29, 7, 5, 6),
(150, 30, 7, 3, 4),
(151, 31, 7, 5, 6),
(152, 32, 7, 1, 7),
(153, 33, 7, 6, 1),
(154, 34, 7, 1, 6),
(155, 35, 7, 2, 4),
(156, 36, 7, 3, 5),
(157, 37, 7, 2, 5),
(158, 38, 7, 3, 6),
(159, 39, 7, 3, 5),
(160, 40, 7, 4, 7),
(161, 1, 8, 3, 7),
(162, 2, 8, 3, 5),
(163, 3, 8, 1, 5),
(164, 4, 8, 4, 7),
(165, 5, 8, 1, 7),
(166, 6, 8, 6, 1),
(167, 7, 8, 1, 5),
(168, 8, 8, 3, 7),
(169, 9, 8, 5, 6),
(170, 10, 8, 3, 6),
(171, 11, 8, 1, 7),
(172, 12, 8, 4, 7),
(173, 13, 8, 1, 5),
(174, 14, 8, 1, 1),
(175, 15, 8, 5, 5),
(176, 16, 8, 3, 1),
(177, 17, 8, 1, 1),
(178, 18, 8, 6, 6),
(179, 19, 8, 4, 6),
(180, 20, 8, 5, 7),
(181, 21, 8, 1, 5),
(182, 22, 8, 5, 7),
(183, 23, 8, 2, 5),
(184, 24, 8, 5, 6),
(185, 25, 8, 1, 3),
(186, 26, 8, 3, 7),
(187, 27, 8, 1, 7),
(188, 28, 8, 6, 3),
(189, 29, 8, 4, 5),
(190, 30, 8, 4, 5),
(191, 31, 8, 4, 7),
(192, 32, 8, 3, 2),
(193, 33, 8, 1, 1),
(194, 34, 8, 1, 1),
(195, 35, 8, 1, 1),
(196, 36, 8, 1, 1),
(197, 37, 8, 1, 7),
(198, 38, 8, 4, 1),
(199, 39, 8, 3, 4),
(200, 40, 8, 4, 6),
(201, 1, 9, 1, 6),
(202, 2, 9, 2, 3),
(203, 3, 9, 3, 6),
(204, 4, 9, 5, 7),
(205, 5, 9, 1, 5),
(206, 6, 9, 3, 1),
(207, 7, 9, 3, 7),
(208, 8, 9, 6, 4),
(209, 9, 9, 4, 7),
(210, 10, 9, 3, 4),
(211, 11, 9, 5, 4),
(212, 12, 9, 1, 1),
(213, 13, 9, 1, 4),
(214, 14, 9, 1, 7),
(215, 15, 9, 6, 6),
(216, 16, 9, 3, 6),
(217, 17, 9, 2, 5),
(218, 18, 9, 3, 5),
(219, 19, 9, 6, 4),
(220, 20, 9, 4, 6),
(221, 21, 9, 1, 7),
(222, 22, 9, 4, 6),
(223, 23, 9, 4, 6),
(224, 24, 9, 1, 6),
(225, 25, 9, 7, 6),
(226, 26, 9, 3, 5),
(227, 27, 9, 4, 3),
(228, 28, 9, 1, 5),
(229, 29, 9, 1, 7),
(230, 30, 9, 3, 1),
(231, 31, 9, 4, 7),
(232, 32, 9, 6, 4),
(233, 33, 9, 1, 5),
(234, 34, 9, 2, 7),
(235, 35, 9, 5, 7),
(236, 36, 9, 4, 6),
(237, 37, 9, 1, 4),
(238, 38, 9, 4, 1),
(239, 39, 9, 1, 6),
(240, 40, 9, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `title_list`
--

CREATE TABLE IF NOT EXISTS `title_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `title_list`
--

INSERT INTO `title_list` (`id`, `name`) VALUES
(1, 'Executive'),
(2, 'Manager'),
(3, 'Other');

-- --------------------------------------------------------

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
  `country_id` int(11) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `title_id` int(11) DEFAULT NULL,
  `tenure_id` int(11) DEFAULT NULL,
  `career_length` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `login_id_idxfk` (`login_id`),
  KEY `country_id_idxfk` (`country_id`),
  KEY `title_id_idxfk` (`title_id`),
  KEY `tenure_id_idxfk` (`tenure_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login_id`, `first_name`, `last_name`, `email`, `gender`, `country_id`, `department`, `title_id`, `tenure_id`, `career_length`) VALUES
(1, 1, 'Gareth', 'Seeto', 'gareth.seeto@gmail.com', 1, 9, 'IT', 3, 1, 18),
(2, 3, 'Brett', 'Johnson', 'brettj@inst.net', 1, NULL, NULL, NULL, NULL, NULL),
(3, 5, 'Linda', 'Widjaja', 'lwidjaja@inst.net', 0, NULL, NULL, NULL, NULL, NULL),
(4, 6, 'Linh', 'Ly', 'linhl@inst.net', 0, NULL, NULL, NULL, NULL, NULL),
(5, 7, 'Dena', 'Andrews', 'denaa@inst.net', 0, 0, NULL, NULL, NULL, NULL),
(6, 8, 'Lyn', 'Johnson', 'lynj@inst.net', 0, NULL, NULL, NULL, NULL, NULL),
(7, 9, 'Kim', 'Wilson', 'kimw@inst.net', 0, NULL, NULL, NULL, NULL, NULL),
(8, 10, 'Bruce', 'Wayne', 'batman@gmail.com', 1, NULL, NULL, NULL, NULL, NULL),
(9, 11, 'Clark', 'Kent', 'superman@gmail.com', 1, NULL, NULL, NULL, NULL, NULL),
(10, 12, 'Diana', 'Prince', 'wonderwoman@yahoo.com', 0, NULL, NULL, NULL, NULL, NULL),
(11, 13, 'Mike', 'Cheves', '', 1, 0, NULL, NULL, NULL, NULL),
(12, 14, 'Brett', 'Kenny', 'kenny@gmail.com', 1, NULL, NULL, NULL, NULL, NULL),
(13, 15, 'Bill', 'Bright', 'bright@gmail.com', 1, NULL, NULL, NULL, NULL, NULL),
(14, 16, 'Bill', 'Clinton', 'exprez@gmail.com', 1, 1, '', 1, 2, 7),
(15, 17, 'Ronald', 'Reagan', 'reagan@yahoo.com', 1, 9, '', 2, 2, NULL),
(16, 18, 'Barak', 'Obama', 'bobama@gmail.com', 1, 1, '', 1, 1, NULL),
(17, 19, 'George', 'Bush', 'bush@hotmail.com', 1, 37, '', 3, 2, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action_items`
--
ALTER TABLE `action_items`
  ADD CONSTRAINT `action_items_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`),
  ADD CONSTRAINT `action_items_ibfk_2` FOREIGN KEY (`scorecard_id`) REFERENCES `scorecard` (`id`),
  ADD CONSTRAINT `action_items_ibfk_3` FOREIGN KEY (`who`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `action_items_ibfk_4` FOREIGN KEY (`status_type`) REFERENCES `status_type` (`id`),
  ADD CONSTRAINT `action_items_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category_type` (`id`),
  ADD CONSTRAINT `action_items_ibfk_6` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `assessment_manager_assn`
--
ALTER TABLE `assessment_manager_assn`
  ADD CONSTRAINT `assessment_manager_assn_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `assessment_manager_assn_ibfk_2` FOREIGN KEY (`group_assessment_id`) REFERENCES `group_assessment_list` (`id`);

--
-- Constraints for table `canned_action_item`
--
ALTER TABLE `canned_action_item`
  ADD CONSTRAINT `canned_action_item_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `canned_strategy` (`id`);

--
-- Constraints for table `canned_kpi`
--
ALTER TABLE `canned_kpi`
  ADD CONSTRAINT `canned_kpi_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `canned_strategy` (`id`);

--
-- Constraints for table `canned_strategy`
--
ALTER TABLE `canned_strategy`
  ADD CONSTRAINT `canned_strategy_ibfk_1` FOREIGN KEY (`category_type_id`) REFERENCES `category_type` (`id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `company_industry_assn`
--
ALTER TABLE `company_industry_assn`
  ADD CONSTRAINT `company_industry_assn_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `company_industry_assn_ibfk_2` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`);

--
-- Constraints for table `company_user_assn`
--
ALTER TABLE `company_user_assn`
  ADD CONSTRAINT `company_user_assn_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `company_user_assn_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `group_assessment_list`
--
ALTER TABLE `group_assessment_list`
  ADD CONSTRAINT `group_assessment_list_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`);

--
-- Constraints for table `kingdom_business_assessment`
--
ALTER TABLE `kingdom_business_assessment`
  ADD CONSTRAINT `kingdom_business_assessment_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `kingdom_business_assessment_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`),
  ADD CONSTRAINT `kingdom_business_assessment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `kingdom_business_assessment_ibfk_4` FOREIGN KEY (`resource_status_id`) REFERENCES `resource_status` (`id`),
  ADD CONSTRAINT `kingdom_business_assessment_ibfk_5` FOREIGN KEY (`group_id`) REFERENCES `group_assessment_list` (`id`);

--
-- Constraints for table `kingdom_business_questions`
--
ALTER TABLE `kingdom_business_questions`
  ADD CONSTRAINT `kingdom_business_questions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_type` (`id`);

--
-- Constraints for table `kingdom_business_results`
--
ALTER TABLE `kingdom_business_results`
  ADD CONSTRAINT `kingdom_business_results_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `kingdom_business_questions` (`id`),
  ADD CONSTRAINT `kingdom_business_results_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `kingdom_business_assessment` (`id`);

--
-- Constraints for table `kpis`
--
ALTER TABLE `kpis`
  ADD CONSTRAINT `kpis_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`),
  ADD CONSTRAINT `kpis_ibfk_2` FOREIGN KEY (`scorecard_id`) REFERENCES `scorecard` (`id`),
  ADD CONSTRAINT `kpis_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `lemon_assessment`
--
ALTER TABLE `lemon_assessment`
  ADD CONSTRAINT `lemon_assessment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `lemon_assessment_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `lemon_assessment_ibfk_3` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`),
  ADD CONSTRAINT `lemon_assessment_ibfk_4` FOREIGN KEY (`group_id`) REFERENCES `group_assessment_list` (`id`);

--
-- Constraints for table `lemon_assessment_questions`
--
ALTER TABLE `lemon_assessment_questions`
  ADD CONSTRAINT `lemon_assessment_questions_ibfk_1` FOREIGN KEY (`lemon_type_id`) REFERENCES `lemon_type` (`id`);

--
-- Constraints for table `lemon_assessment_results`
--
ALTER TABLE `lemon_assessment_results`
  ADD CONSTRAINT `lemon_assessment_results_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `lemon_assessment_questions` (`id`),
  ADD CONSTRAINT `lemon_assessment_results_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `lemon_assessment` (`id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `resource_user_assn`
--
ALTER TABLE `resource_user_assn`
  ADD CONSTRAINT `resource_user_assn_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`),
  ADD CONSTRAINT `resource_user_assn_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `scorecard`
--
ALTER TABLE `scorecard`
  ADD CONSTRAINT `scorecard_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `scorecard_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`);

--
-- Constraints for table `scorecard_user_assn`
--
ALTER TABLE `scorecard_user_assn`
  ADD CONSTRAINT `scorecard_user_assn_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `scorecard_user_assn_ibfk_2` FOREIGN KEY (`scorecard_id`) REFERENCES `scorecard` (`id`);

--
-- Constraints for table `statement`
--
ALTER TABLE `statement`
  ADD CONSTRAINT `statement_ibfk_1` FOREIGN KEY (`scorecard_id`) REFERENCES `scorecard` (`id`),
  ADD CONSTRAINT `statement_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `strategy`
--
ALTER TABLE `strategy`
  ADD CONSTRAINT `strategy_ibfk_1` FOREIGN KEY (`scorecard_id`) REFERENCES `scorecard` (`id`),
  ADD CONSTRAINT `strategy_ibfk_2` FOREIGN KEY (`category_type_id`) REFERENCES `category_type` (`id`),
  ADD CONSTRAINT `strategy_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `strategy_giant_assn`
--
ALTER TABLE `strategy_giant_assn`
  ADD CONSTRAINT `strategy_giant_assn_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`),
  ADD CONSTRAINT `strategy_giant_assn_ibfk_2` FOREIGN KEY (`giant_id`) REFERENCES `giants` (`id`);

--
-- Constraints for table `strategy_question_conditional`
--
ALTER TABLE `strategy_question_conditional`
  ADD CONSTRAINT `strategy_question_conditional_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `ten_p_questions` (`id`),
  ADD CONSTRAINT `strategy_question_conditional_ibfk_2` FOREIGN KEY (`strategy_id`) REFERENCES `canned_strategy` (`id`),
  ADD CONSTRAINT `strategy_question_conditional_ibfk_3` FOREIGN KEY (`conditional_type`) REFERENCES `conditional_type` (`id`);

--
-- Constraints for table `strategy_sphere_assn`
--
ALTER TABLE `strategy_sphere_assn`
  ADD CONSTRAINT `strategy_sphere_assn_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`),
  ADD CONSTRAINT `strategy_sphere_assn_ibfk_2` FOREIGN KEY (`sphere_id`) REFERENCES `spheres` (`id`);

--
-- Constraints for table `ten_f_assessment`
--
ALTER TABLE `ten_f_assessment`
  ADD CONSTRAINT `ten_f_assessment_ibfk_1` FOREIGN KEY (`resource_status_id`) REFERENCES `resource_status` (`id`),
  ADD CONSTRAINT `ten_f_assessment_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`),
  ADD CONSTRAINT `ten_f_assessment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `ten_f_assessment_ibfk_4` FOREIGN KEY (`group_id`) REFERENCES `group_assessment_list` (`id`);

--
-- Constraints for table `ten_f_questions`
--
ALTER TABLE `ten_f_questions`
  ADD CONSTRAINT `ten_f_questions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `f_category_type` (`id`);

--
-- Constraints for table `ten_f_results`
--
ALTER TABLE `ten_f_results`
  ADD CONSTRAINT `ten_f_results_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `ten_f_questions` (`id`),
  ADD CONSTRAINT `ten_f_results_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `ten_f_assessment` (`id`);

--
-- Constraints for table `ten_p_assessment`
--
ALTER TABLE `ten_p_assessment`
  ADD CONSTRAINT `ten_p_assessment_ibfk_1` FOREIGN KEY (`resource_status_id`) REFERENCES `resource_status` (`id`),
  ADD CONSTRAINT `ten_p_assessment_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `ten_p_assessment_ibfk_3` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`id`),
  ADD CONSTRAINT `ten_p_assessment_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `ten_p_assessment_ibfk_5` FOREIGN KEY (`group_id`) REFERENCES `group_assessment_list` (`id`);

--
-- Constraints for table `ten_p_questions`
--
ALTER TABLE `ten_p_questions`
  ADD CONSTRAINT `ten_p_questions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_type` (`id`);

--
-- Constraints for table `ten_p_results`
--
ALTER TABLE `ten_p_results`
  ADD CONSTRAINT `ten_p_results_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `ten_p_questions` (`id`),
  ADD CONSTRAINT `ten_p_results_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `ten_p_assessment` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country_list` (`id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`title_id`) REFERENCES `title_list` (`id`),
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`tenure_id`) REFERENCES `tenure_list` (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
