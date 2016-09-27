-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2016 at 12:09 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `danaye`
--

-- --------------------------------------------------------

--
-- Table structure for table `addposting`
--

CREATE TABLE IF NOT EXISTS `addposting` (
  `addpost_id` int(11) NOT NULL AUTO_INCREMENT,
  `maincountry_id` int(11) NOT NULL,
  `subcountry_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `post_image` varchar(1000) NOT NULL,
  `contact_address` varchar(50) NOT NULL,
  `mobile_num` int(10) NOT NULL,
  `working_hours` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  PRIMARY KEY (`addpost_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `addposting`
--


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`, `time`) VALUES
(14, 'Personals', 'Active', '2015-09-19'),
(13, 'For Sale', 'Active', '2015-09-19'),
(12, 'Jobs', 'Active', '2015-09-19'),
(10, 'Community', 'Active', '2015-09-19'),
(11, 'Housing', 'Active', '2015-09-19');

--
-- Triggers `categories`
--
DROP TRIGGER IF EXISTS `allsubcat_trg`;
DELIMITER //
CREATE TRIGGER `allsubcat_trg` AFTER DELETE ON `categories`
 FOR EACH ROW delete from sub_categories where categories_id=old.category_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `modifydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--


-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `maincountry_id` int(50) NOT NULL,
  `subcountry_id` int(20) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `modifydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cities`
--


-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(250) NOT NULL,
  `country_id` int(10) NOT NULL,
  `territory_id` int(10) NOT NULL,
  `continent_id` int(10) NOT NULL,
  `status` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=307 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `country_id`, `territory_id`, `continent_id`, `status`, `time`) VALUES
(306, ' Bouar', 17, 9, 1, 'Active', '2015-11-16 10:17:39'),
(305, ' Harare', 17, 9, 1, 'Active', '2015-11-16 10:15:53'),
(304, ' Bouar', 17, 9, 1, 'Active', '2015-11-16 10:15:33'),
(303, ' Bangui', 17, 9, 1, 'Active', '2015-11-16 10:15:18'),
(302, 'cape town', 17, 9, 1, 'Active', '2015-11-14 14:53:26'),
(52, 'Benguela', 1, 1, 1, 'Active', '2015-09-23 21:58:29'),
(53, 'Huambo', 1, 1, 1, 'Active', '2015-09-23 21:58:45'),
(54, 'Kuito', 1, 1, 1, 'Active', '2015-09-23 21:59:12'),
(55, 'N''dalatando', 1, 1, 1, 'Active', '2015-09-23 21:59:18'),
(56, 'Lobito', 1, 1, 1, 'Active', '2015-09-23 21:59:31'),
(57, 'Malanje', 1, 1, 1, 'Active', '2015-09-23 22:02:14'),
(58, 'Cabinda', 1, 1, 1, 'Active', '2015-09-23 22:02:28'),
(59, 'Saurimo', 1, 1, 1, 'Active', '2015-09-23 22:02:48'),
(60, 'Soyo', 1, 1, 1, 'Active', '2015-09-23 22:02:56'),
(143, 'Harare', 10, 1, 1, 'Active', '2015-09-23 22:56:33'),
(144, 'Bulawayo', 10, 1, 1, 'Active', '2015-09-23 22:56:45'),
(145, 'Gweru', 10, 1, 1, 'Active', '2015-09-23 22:56:57'),
(146, 'Chinhoyi', 10, 1, 1, 'Active', '2015-09-23 22:57:09'),
(147, 'Beitbridge', 10, 1, 1, 'Active', '2015-09-23 22:57:22'),
(148, 'Chitungwiza', 10, 1, 1, 'Active', '2015-09-23 22:57:41'),
(149, 'Zvishavane', 10, 1, 1, 'Active', '2015-09-23 22:57:50'),
(150, 'Chivhu', 10, 1, 1, 'Active', '2015-09-23 22:58:00'),
(208, 'Khartoum', 19, 2, 1, 'Active', '2015-09-23 23:14:11'),
(209, 'Omdurman', 19, 2, 1, 'Active', '2015-09-23 23:14:23'),
(210, 'Kassala', 19, 2, 1, 'Active', '2015-09-23 23:14:33'),
(211, 'Wad Madani', 19, 2, 1, 'Active', '2015-09-23 23:14:44'),
(212, 'Khartoum North', 19, 2, 1, 'Active', '2015-09-23 23:14:56'),
(213, 'Rabak', 19, 2, 1, 'Active', '2015-09-23 23:15:07'),
(214, 'Dongola', 19, 2, 1, 'Active', '2015-09-23 23:15:24'),
(261, 'Cairo', 26, 3, 1, 'Active', '2015-09-24 20:28:30'),
(262, 'Luxor', 26, 3, 1, 'Active', '2015-09-24 20:28:42'),
(263, 'Giza', 26, 3, 1, 'Active', '2015-09-24 20:28:53'),
(264, 'Asyut', 26, 3, 1, 'Active', '2015-09-24 20:29:41'),
(265, 'Baris', 26, 3, 1, 'Active', '2015-09-24 20:30:34'),
(266, 'Aswan', 26, 3, 1, 'Active', '2015-09-24 20:30:47'),
(267, 'Edfu', 26, 3, 1, 'Active', '2015-09-24 20:31:10'),
(268, 'Esna', 26, 3, 1, 'Active', '2015-09-24 20:31:28'),
(277, 'Midelt', 28, 3, 1, 'Active', '2015-09-24 20:40:17'),
(278, 'Zagora', 28, 3, 1, 'Active', '2015-09-24 20:40:33'),
(279, 'Erfoud', 28, 3, 1, 'Active', '2015-09-24 20:40:47'),
(280, 'Rabat', 28, 3, 1, 'Active', '2015-09-24 20:41:14'),
(281, 'Fes', 28, 3, 1, 'Active', '2015-09-24 20:41:25'),
(282, 'Marrakesh', 28, 3, 1, 'Active', '2015-09-24 20:41:40'),
(283, 'Safi', 28, 3, 1, 'Active', '2015-09-24 20:42:25'),
(291, 'Gafsa', 30, 3, 1, 'Active', '2015-09-24 20:51:10'),
(292, 'Gabes', 30, 3, 1, 'Active', '2015-09-24 20:55:17'),
(293, 'Sfax', 30, 3, 1, 'Active', '2015-09-24 20:55:44'),
(294, 'Douz', 30, 3, 1, 'Active', '2015-09-24 20:56:03'),
(295, 'El Kef', 30, 3, 1, 'Active', '2015-09-24 20:56:31'),
(296, 'Tunis', 30, 3, 1, 'Active', '2015-09-24 20:56:44'),
(297, 'Bizerte', 30, 3, 1, 'Active', '2015-09-24 20:57:00'),
(298, 'Tantan', 28, 3, 1, 'Active', '2015-09-24 20:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

CREATE TABLE IF NOT EXISTS `continent` (
  `continent_id` int(10) NOT NULL AUTO_INCREMENT,
  `continent_name` varchar(250) NOT NULL,
  PRIMARY KEY (`continent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`continent_id`, `continent_name`) VALUES
(1, 'Africa');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(250) NOT NULL,
  `continent_id` int(10) NOT NULL,
  `territory_id` int(10) NOT NULL,
  `status` varchar(250) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `continent_id`, `territory_id`, `status`, `time`) VALUES
(1, 'Angola', 1, 1, 'Active', '15:56:49'),
(10, 'Botswana', 1, 1, 'Active', '15:16:45'),
(17, 'Centrafrique ', 1, 9, 'Active', '14:52:44');

--
-- Triggers `country`
--
DROP TRIGGER IF EXISTS `user_tgr`;
DELIMITER //
CREATE TRIGGER `user_tgr` AFTER DELETE ON `country`
 FOR EACH ROW delete from city where country_id=old.country_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(50) NOT NULL,
  `modifydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `languages`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_country`
--

CREATE TABLE IF NOT EXISTS `main_country` (
  `maincountry_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) NOT NULL,
  `modifydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`maincountry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_country`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(10) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(250) NOT NULL,
  `page_content` text NOT NULL,
  `itemorder` int(10) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_content`, `itemorder`) VALUES
(3, ' Help', '<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 4),
(4, 'Safety', '<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 3),
(5, 'Feedback', '<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 2),
(6, ' Privacy', '<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 1),
(7, 'Terms', '<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 5);

-- --------------------------------------------------------

--
-- Table structure for table `postings`
--

CREATE TABLE IF NOT EXISTS `postings` (
  `posting_id` int(10) NOT NULL AUTO_INCREMENT,
  `contactname` varchar(250) NOT NULL,
  `posting_title` varchar(300) NOT NULL,
  `posting_description` text NOT NULL,
  `specific_location` varchar(250) NOT NULL,
  `compensation` varchar(250) NOT NULL,
  `disabilities` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `login_user` varchar(250) NOT NULL,
  `continent_id` int(10) NOT NULL,
  `territory_id` int(10) NOT NULL,
  `country_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `categories_id` int(10) NOT NULL,
  `sub_categories_id` varchar(50) NOT NULL,
  `superadmin_id` int(10) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `posting_status` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_status` int(11) NOT NULL COMMENT '0 : No 1 : Yes',
  PRIMARY KEY (`posting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=184 ;

--
-- Dumping data for table `postings`
--

INSERT INTO `postings` (`posting_id`, `contactname`, `posting_title`, `posting_description`, `specific_location`, `compensation`, `disabilities`, `phone`, `login_user`, `continent_id`, `territory_id`, `country_id`, `city_id`, `categories_id`, `sub_categories_id`, `superadmin_id`, `payment_status`, `posting_status`, `time`, `image_status`) VALUES
(1, 'Hemambari', 'Telesales Representatives', 'FOR IMMEDIATE HIRING\r\nTelesales Vacancy is available\r\nCHPâ„¢ is an international travel agency specialized in offering\r\ntravel services to companies across the US,\r\nCanada & Europe.\r\nJob Title: International Sales Representative (Full Time)\r\nBasic Salary: For inexperienced candidates we start at 2,500 + commission and bonus.\r\nFor telesales experienced candidates 3,500 + commission and bonus.\r\nJob Requirements:\r\n1) English Fluency is a MUST!!\r\n2) Excellent communication and negotiation skills.\r\n3) Telesales EXPERIENCE IS PREFERRED.\r\n4) We are located in Nasr City.\r\nWorking hours:\r\n-Afternoon shift: 3:00 PM to 12:00 AM (including\r\n1 hour break), Saturday & Sunday off.\r\nIn order to apply please send your resume and put "Telesales\r\nVacancy" in the subject. ', 'Nasr City', '40, 000', '', '1234567890', 'hemambari@gmail.com', 1, 2, 1, 52, 12, '4', 1, 'Pending', 'Pending', '2015-11-09 11:05:12', 0),
(2, 'Hemambari', 'Online Job Offer', 'Dear all\r\nif u need to maximize yr profit from online jobs, Follow this link http://news-zonal.com/p175 Read the news and earn from $5 up to $9 for every read piece of news. You can read about 35 fresh news on our site every day. So you can get minimum $250 a day and $2000 a week!\r\nBR', 'All over world', '25, 000', '', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Active', '2015-11-09 11:04:51', 1),
(3, 'Hemambari', 'Accepting all school position', 'Now Hiring\r\nWe now accepting for all school positions. ( Principal, Principal assistant, Elementary teachers, PE teacher, IT , Administration, accounting , Psychologist, and teacher assistant .\r\ncall to schedule an interview 01000761049 ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Active', '2015-12-10 12:28:44', 0),
(4, 'Hemambari', 'Accepting all school position ', 'Now Hiring\r\nWe now accepting for all school positions. ( Principal, Principal assistant, Elementary teachers, PE teacher, IT , Administration, accounting , Psychologist, and teacher assistant .\r\ncall to schedule an interview 01000761049 ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(5, 'Hemambari', 'Accepting all school position', 'Now Hiring\r\nWe now accepting for all school positions. ( Principal, Principal assistant, Elementary teachers, PE teacher, IT , Administration, accounting , Psychologist, and teacher assistant .\r\ncall to schedule an interview 01000761049 ', '', '40, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(6, 'Hemambari', 'Experienced Financial Consultant ', 'A boutique financial brokerage working in China; South East Asia and Africa are looking for an experienced, self motivated financial adviser/consultant to bring real value to our company.\r\n\r\nIn return we will provide a salary and excellent commission package.\r\n\r\nAll interest parties should reply to careers@gifp-ltd.com with your CV. ', 'Ghana', '40, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(7, 'Hemambari', 'Chief Financial Officer', 'PULENG DEVELOPMENTS\r\nPulling Developments is a startup property development, domiciled in the capital city of Botswana, Southern Africa. Puleng Developments is looking for dynamic executives to join our team of visionaries.\r\nAs a key member of the Executive Management team, the Chief Financial Officer will report to the President and assume a strategic role in the overall management of the company. The CFO will have primary day-to-day responsibility for planning, implementing, managing and controlling all financial-related activities of the company. This will include direct responsibility for accounting, finance, forecasting, strategic planning, job costing, legal, property management, deal analysis and negotiations, investor relationships and partnership compliance and private and institutional financing.\r\n\r\nResponsibilities:\r\nï‚§ Provides leadership in the development for the continuous evaluation of short and long-term strategic financial objectives.\r\nï‚§ Ensure credibility of Finance group by providing timely and accurate analysis of budgets, financial trends and forecasts.\r\nï‚§ Take hands-on lead position of developing, implementing, and maintaining a comprehensive job cost system.\r\nï‚§ Direct and oversee all aspects of the Finance & Accounting functions of the organization.\r\nï‚§ Evaluates and advises on the impact of long range planning, introduction of new programs/ strategies and regulatory action.\r\nï‚§ Establish and maintain strong relationships with senior executives so as to identify their needs and seek full range of business solutions.\r\nï‚§ Provide executive management with advice on the financial implications of business activities.\r\nï‚§ Manage processes for financial forecasting, budgets and consolidation and reporting to the Company\r\nï‚§ Provide recommendations to strategically enhance financial performance and business opportunities.\r\n\r\nQualifications and Requirements:\r\nBS in Accounting or Finance, MBA and/or CPA highly desirable\r\n10+ years in progressively responsible financial leadership roles, preferably in real estate development, property management, and/ or construction industry.\r\n\r\nPersonal Attributes:\r\nStrong interpersonal skills, ability to communicate and manage well at all levels of the organization and with staff at remote locations essential.\r\nStrong problem solving and creative skills and the ability to exercise sound judgment and make decisions based on accurate and timely analyses.\r\nHigh level of integrity and dependability with a strong sense of urgency and results-orientation.', 'Gaborone, Botswana', '40, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(8, 'Hemambari', 'Alternative to Accounting - Time to Be Own Boss!', 'Make Money from Home in Personal Development Industry. Are you a big thinker looking for complete career change?\r\n\r\nSimple 3 Step System\r\nFull Training & Live Support\r\nOpportunity for the "Big Thinker"\r\nMake up to $5,000 per sale\r\nA global online business opportunity\r\n\r\nApply Now:\r\n\r\nwww.lifestyle-change.info (right click to open in new tab)\r\n\r\nFREE INFO - I will contact you! Cheers, Sharon', 'Adelaide', '40, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(9, 'Hemambari', ' Accountant ', 'Accountant\r\nHansen & Company -- Calgary, AB\r\n\r\nOur law firm seeks a highly motivated career minded candidate with preferably with experience in a professional services firm.\r\n\r\nQualifications include but not limited to:\r\n\r\nâ€¢ Self motivated, have a strong work ethic and a high integrity level\r\nâ€¢ Excellent communication skills required\r\nâ€¢ Research and problem solving skills with the ability to exercise judgement to resolve technical issues.\r\nâ€¢ Able to multi-task, attention to detail, organized and time management skills along with the ability to balance daily work.\r\nâ€¢ Positive attitude, patience and resilience.\r\nâ€¢ Abides by Firm policies and handles confidential materials and documents.\r\nâ€¢ Experience with PCLaw and Microsoft programs including excel worksheets, access & Word are required.\r\n\r\nMajor Responsibilities and Duties:\r\n\r\nâ€¢ Monthly reconciliation of trust and general accounts per law society rules\r\nâ€¢ Maintenance of accounting records per law society rules\r\nâ€¢ Minimum 50% of time devoted to accounts receivable\r\nâ€¢ Monitors staff efficiency and takes remedial action as required.\r\nâ€¢ Monitors and enforces law firm policies and procedures\r\n\r\nTerms of Employment: Permanent, Full Time, Weekend, Day\r\n\r\nSalary: $30,000.00 to $60,000.00 Yearly, 44.00 Hours per week, Commission, Medical Benefits,\r\nDental Benefits, Group Insurance Benefits\r\n\r\nLanguages: Speak English, Read English, Write English\r\n\r\nBusiness Equipment and Computer Applications: Word processing, Spreadsheet, Database management, Legal software applications\r\n\r\nType of Establishment Experience: Legal firm\r\n\r\nSecurity and Safety: Police clearance\r\n\r\nWork Conditions and Physical Capabilities: Fast-paced environment, Work under pressure, Tight deadlines, Attention to detail, Large caseload, Large workload\r\n\r\nWork Site Environment: Non-smoking, Air conditioned\r\n\r\nTransportation/Travel Information: Own transportation\r\n\r\nEssential Skills: Reading text, Document use, Numeracy, Writing, Oral communication, Working with others, Problem solving, Decision making, Critical thinking, Job task planning and organizing, Significant use of memory, Finding information, Computer use, Continuous learning\r\n\r\nOther Information: work every other Saturday, Discretionary bonus, medical benefits, Strong work ethic, computer & client relation skills\r\n\r\nPlease reply with cover letter, resume & employment references ', 'Calgary', '40, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(10, 'Hemambari', 'A/R-Billing Clerk', '\r\nMarietta printer has opening for a part-time Accounts Receivable/Billing Clerk. Must have experience with billing, posting payments, preparing bank deposits and making collection calls. Hours are 7:30 a.m. to 11:30 a.m., M-W-F and 8:30 a.m. to Noon, Tuesday & Thursday. ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(11, 'Hemambari', 'Staff Accountant', 'STAFF ACCOUNTANT needed due to an internal promotion.\r\nOrganization looking for a motivated, detailed-oriented staff accountant who wants to progress within the Accounting/Finance group. This position will be responsible for specific general ledger accounts, both accounting and analytical tasks. Will use excel daily and will communicate with all levels in the organization, including the CFO.\r\n\r\nMust have an Accounting degree plus 2 years of professional experience in corporate or public accounting, including experience with analytical tasks. Excellent written and verbal communication skills required. Salary plus bonus as well as full benefits: 20 days PTO and insurance benefits on first day of employment.\r\n\r\nPlease apply by sending a resume as an attachment. ', '', '40, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(12, 'Hemambari', 'Moving to Vancouver? CFA/CIM Required', 'Looking for CFA/CIM designated financial professionals who might be moving to Vancouver, Canada. You have lots of experience selling to the end investor. CFA or CIM is a requirement for registration. A must...This is more"sales" role, not a portfolio manager.\r\n\r\nSubstantial base salary. Total comp is about $250k.\r\nWork from home\r\nLeads provided\r\nNo book of business needed\r\nNo servicing clients- just SELL !\r\nRelationship managers in the US manage everthing ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(13, 'Hemambari', 'Business Development - Calgary - Accounting', 'I am a Canadian accountant with a business processing unit in the Philippines. I support Canadian companies with their accounting needs.\r\n\r\nI am looking for motivated sales agent willing to build trust with clients and let us do all the work.\r\n\r\nI pay commission on all work brought in plus offer you a wholesale price on the work we do if you wish to maintain the client relationship and set your own rates.\r\n\r\nI offer very attractive packages for new business owners.\r\n\r\nPlease contact me if interested. ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(14, 'Hemambari', 'Hiring Accountants in Calgary', 'Hiring accountants and qualified business managers in Calgary, Alberta?\r\n\r\nAre you qualified? Looking for candidates with high quality university education, work experience, and aspiration to succeed.\r\n\r\nFind out more about available openings for accounting positions here:\r\nhttp://www.calgaryhires.ca/find-a-job/finance/ ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(15, 'Hemambari', 'Bookkeeper wanted for Silverwing', 'Title: Bookkeeper ( NOC: 1231 )\r\n\r\nTerms of Employment: Permanent, Full Time, Day\r\n\r\nSalary: $25.00 Hourly, for 40.00 Hours per week\r\n\r\nAnticipated Start Date (at the latest in 3 months): As soon as possible\r\n\r\nLocation: Calgary North East, Alberta ( 1 vacancy )\r\n\r\nSkill Requirements:\r\n\r\nEducation: Completion of university\r\n\r\nExperience: 2 years to less than 3 years\r\n\r\nLanguages: English\r\n\r\nBusiness Equipment and Computer Applications: Windows, General office equipment, Electronic mail, Word processing software, Spreadsheet software, Excel, Great Plains, Internet browser\r\n\r\nSpecific Skills: Maintain general ledgers and financial statements, Post journal entries, Prepare trial balance of books, Reconcile accounts, Calculate and prepare cheques for payroll, Prepare other statistical, financial and accounting reports, Control inventory, Calculate fixed assets and depreciation, Prepare tax returns\r\n\r\nSecurity and Safety: Bondable\r\n\r\nTransportation/Travel Information: Own vehicle\r\n\r\nWork Location Information: Urban area\r\n\r\nWork Conditions and Physical Capabilities: Fast-paced environment, Tight deadlines\r\n\r\nEssential Skills: Reading text, Document use, Numeracy, Writing, Communication, Working with others, Problem solving, Decision making, Critical thinking, Job task planning and organizing, Computer use\r\n\r\nOther: Experience with Total E Golf Management software is an asset.\r\n\r\nEmployer: Silverwing Links Golf Course Limited Partnership\r\n\r\nHow to Apply:\r\nBy Mail: 3434 48th Ave NE, Calgary, Alberta, T3J 0L1 ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(16, 'Hemambari', 'Accounting Assistant', 'Service based company in calgary looking for accounting and human resource assistant with experience and proficient in Quick Books, accounts payable, account reconciliation, and new hiring processing.\r\n\r\nPrimary Duties and Responsibilities\r\n\r\nAccounting:\r\nâ€¢ Performs timely and accurate processing of all accounts payable transactions and assures compliance with company policies, procedures, and Chart of Accounts.\r\nâ€¢ Reconcile vendor statements and resolving discrepancies\r\nâ€¢ Assists with bank and credit card account reconciliations.\r\nâ€¢ Assists in the monthly preparation and distribution of financial reporting packages\r\nâ€¢ All other duties as assigned\r\n\r\nHuman Resource Responsibilities\r\nâ€¢ Maintain personnel files\r\nâ€¢ Process state reporting requirements for new hires\r\nâ€¢ Obtain clearances for all employees\r\nâ€¢ Prepare new hire packets and ensure completeness\r\nâ€¢ Handling unemployment and workers compensation claims.\r\nâ€¢ Manage health insurance and Cobra procedures\r\nâ€¢\r\n\r\nQualifications\r\nAssociates degree with a concentration in accounting or equivalent experience\r\nMinimum of three years of accounting experience is preferred.\r\n\r\nEssential Skills and Abilities\r\nâ€¢ Excellent written and oral communication skills\r\nâ€¢ Proficiency with Microsoft Office products and Quickbooks\r\nâ€¢ Excellent organizational, planning, and follow-through capabilities; attention to detail is essential\r\nâ€¢ Ability to multi-task and manage several projects simultaneously\r\nâ€¢ Ability to develop and maintain positive working relationships with co-workers and vendors\r\nâ€¢ Flexibility and adaptability to changing daily activities and schedules\r\nâ€¢ Fluent in English and Spanish preferred\r\nâ€¢ Able to work overtime as required', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(17, 'Hemambari', 'Accounting Clerk', '\r\nHair Visions International, based in Calgary has been a world leader in the hair replacement industry for the past 40 years.\r\n\r\nWe are currently seeking a Part-Time (approximately 24 hours a week) entry level Accounting Clerk to process returns, credit memos, invoicing, cash receipts and other general clerical duties.\r\n\r\nSAP Business One experience is helpful.\r\n\r\nWe offer competitive compensation based on experience. ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(18, 'Hemambari', 'Become a part of our friendly and highly-professional team.', 'Rapidly developing European company SafeTrade GmbH is expanding its activities in the US and Canada and offers new opening of Customer Service Agent. We are engaged in escrow service since 2007 and offer part-time job from home with stable basic salary of $2.800 a month plus bonuses for good performance. Become a part of our friendly and highly-professional team soon and get free training and opportunity to start career with international company!\r\n\r\nOur requirements:\r\n- PC knowledge, MS Office, e-mail, Internet;\r\n- Previous working experience in customer care or management is preferred, but not required;\r\n- Friendly attitude, communication skills, responsibility, attention to details;\r\n- Educated student/High school diploma;\r\n- USA citizenship.\r\n\r\nWe offer:\r\n- Base salary of $2.800 a month plus bonuses;\r\n- Free training;\r\n- Full support of personal supervisor during the first month at the company;\r\n- Social benefits and insurance;\r\n- Career growth prospects;\r\n- Opportunity to move to the full-time office position after the trial period.\r\n\r\nResponsibilities:\r\n- Interaction with customers and giving them full information about the services;\r\n- Organising deals between the Buyers and the Sellers;\r\n- Keeping control of transactions between the Buyers and the Sellers;\r\n- Making weekly reports on the fulfilled tasks.\r\n\r\nPotential candidate should be available 3-4 hours a day Mon-Fri mostly before noon. If you got interested, feel free to contact us at any time and our HR specialists will get back to you within 48 hours for further details. ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(19, 'Hemambari', 'part time bookkeeper/admin person needed', 'Jelly modern doughnuts is looking for a junior bookkeeper/admin person. Shifts would be 4 to 5 days a week for approx 3 to 4 hours per day. Candidates must have excellent communication and computer skills, experience working with Quickbooks, as well as willingness to work in a fast paced, sometimes hectic working environment.\r\n\r\n**Note: Only successful candidates will be contacted. Incentives to right person. ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(20, 'Hemambari', 'Career Fair - 36th Street NW (36th Street NW)', 'Please Join Us for Our Career Fair:\r\n\r\n\r\n\r\n\r\n\r\nWednesday August 19th, 2015\r\n\r\nTime: 11:00a.m. to 5:00p.m.\r\n\r\n\r\n\r\nWhere: easyfinancial\r\n\r\n920 36th Street N.E.\r\n\r\nUnit 124\r\n\r\nCalgary, AB\r\n\r\n\r\n\r\n\r\n\r\nJob Opportunities include:\r\n\r\n\r\n\r\nFinancial Services Representative (sales)\r\nBranch Manager In Training\r\n\r\nFor more information on us please visit:\r\n\r\n\r\n\r\nhttp://www.easyfinancialcareers.ca/jobs/search\r\n\r\n\r\n\r\nFor registration please send your resume to Lyn Glanville: show contact info\r\n\r\n\r\n\r\nPlease bring two pieces of identification with you when attending the career fair\r\n\r\n\r\n\r\nLook forward to meeting you there. ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(21, 'Hemambari', 'Experienced Bookkeeper', 'Job description:\r\nComplete payroll services from assisting with new employee paperwork, to scheduled payroll preparation, preparation of quarterly payroll reports, processing of payroll tax payments, completing year end payroll reports and W-2s.\r\nAdditional payroll responsibilities would include assisting with workers compensation reporting and compliance, internal review of payroll reports and processing Forms 1099 and 1096 for one or more clients.\r\nOther accounting responsibilities for a client could include:\r\nPosting and reconciling daily, monthly and/or quarterly revenue and expense data, bank reconciliations as well as providing timely, accurate financial reports such as a profit and loss statement with a balance sheet.\r\nThis position will cover reception duties for approximately one hour each day.\r\n\r\nExperience required: 3+ years or AA degree with ability, combination of degree w/ some experience preferred.\r\nEquipment used: Computers, Outlook QuickBooks accounting software including payroll service.\r\n\r\n\r\nFor more information regarding position call Express @ 406-257-2255.\r\n\r\nApply on-line at: http://www.expresspros.com/kalispellmt/job-openings.aspx or at 4 Sunset Plaza Suite #101 Kalispell.\r\n\r\n4 Sunset Plaza, Suite 101, Kalispell, MT 59901\r\nOffice: (406) 257-2255 Fax: (406) 257-2432\r\nVisit our website at: www.expresspros.com', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Active', '2015-12-10 12:28:36', 0),
(22, 'Hemambari', 'Consumer Loan Processor', 'Consumer Loan Processor needed for financial institution. Will be responsible for offering clerical and customer service support while assisting Consumer Lending Department staff and Member Business Lending Department. Will serve as the primary liaison for customer questions about loan rates and terms and available loans; pull credit reports and bank history for loan officers; order appraisals and title reports; print new loan documents; assist with restructures; generate and mail balloon letters; fill out Verification of Deposit and Verification of Mortgage requests; assist with creating and moving document imaging; looking into credit rating disputes and making necessary corrections in credit rating database; accumulate information for loans (payoffs); and other duties as assigned.\r\n\r\nSeeking someone who can successfully multi-task and prioritize work tasks and projects. Must be organized to ensure maximum work flow between departments and work in a timely and accurate manner. Must be an effective communicator verbally and in writing to internal and external customers, able to follow oral and written instructions, have strong problem solving, analytical and organizational skills, able to work independently and as a team, and able to work with a variety of office equipment and software systems.\r\n\r\nPosition is full-time. Wage: DOE. 1-2 years professional experience with accounting or lending procedures.\r\n\r\n\r\nFor more information regarding position call Express @ 257-2255\r\n\r\nApply on-line at http://kalispellmt.expresspros.com or at 4 Sunset Plaza Suite #101 Kalispell.\r\n\r\n4 Sunset Plaza, Suite 101, Kalispell, MT 59901\r\nOffice: (406) 257-2255 Fax: (406) 257-2432\r\nVisit our website at: http://kalispellmt.expresspros.com', 'Kalispell', '40, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(23, 'Hemambari', 'Bookkeeper ( NOC: 1231 )', 'Title:\r\n\r\nBookkeeper ( NOC: 1231 )\r\nJob Types\r\n\r\nRegular job\r\nTerms of Employment:\r\n\r\nPermanent, Full Time, Shift, Weekend, Day, Evening\r\nSalary:\r\n\r\n$21.50 Hourly, for 40.00 Hours per week\r\nAnticipated Start Date (at the latest in 3 months):\r\n\r\nAs soon as possible\r\nLocation:\r\n\r\nEdmonton South, Alberta ( 1 vacancy )\r\nSkill Requirements:\r\n\r\nEducation:\r\n\r\nCompletion of high school, Completion of college/CEGEP/vocational or technical training\r\n\r\nExperience:\r\n\r\n1 year to less than 2 years\r\n\r\nLanguages:\r\n\r\nEnglish\r\n\r\nWork Setting:\r\n\r\nPrivate sector\r\n\r\nBusiness Equipment and Computer Applications:\r\n\r\nElectronic mail, Spreadsheet software, Excel, Accounting software, Quick Books, Database software\r\n\r\nType of Bookkeeping:\r\n\r\nComputerized\r\n\r\nSpecific Skills:\r\n\r\nMaintain general ledgers and financial statements, Post journal entries, Prepare trial balance of books, Reconcile accounts, Calculate and prepare cheques for payroll, Prepare other statistical, financial and accounting reports, Prepare tax returns\r\n\r\nEssential Skills:\r\n\r\nReading text, Document use, Numeracy, Problem solving, Job task planning and organizing\r\n\r\nOther:\r\n\r\nBUSINESS ADDRESS:202,9612 51 AVENUE NW,EDMONTON, Alberta,T6E5A6\r\n\r\nEmployer:\r\n\r\nENGRITY INSPECTION SERVICES INC.\r\nHow to Apply:\r\n\r\n202,9612 51 AVENUE NW\r\nEDMONTON, Alberta\r\nT6E 5A6', 'Alberta', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(24, 'Hemambari', 'Looking for qualified accountants ', 'Are you a qualified accountant looking to make a higher salary?\r\n\r\nJobs are available in Calgary, Alberta\r\n\r\nIf you are a skilled worker, looking for a change we have positions that may be right for you\r\n\r\nDo not reply to this listing. Serious applicants go to www.calgaryhires.ca to view specific job details and apply for the position. ', 'Calgary', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(25, 'Hemambari', ' Bookkeeper Wanted', 'Are you good at keeping books and financial records? Do you want to work in a family owned, friendly environment? Do you have a high personal standard, care about your work and want to work with others who do as well?\r\n\r\nWe are a clean and friendly, family owned and operated full service automotive repair facility in Kalispell. We have been in business for 30 years in the valley and operate during a Monday through Friday workweek. Find out more about us at LorensAuto.com.\r\n\r\nWe currently have a part-time bookkeeping position available. Some of the job functions and responsibilities are as follows:\r\n\r\nAccounts Payable -- Inputting and reconciling vendor invoices, printing and preparing checks, keeping reports updated and accurate.\r\n\r\nAccounts Receivable -- Preparing monthly statements for commercial accounts.\r\n\r\nPayroll -- Inputting payroll, preparing checks, and transmitting payroll.\r\n\r\nGovernment Reports -- Preparing monthly, quarterly and annual payroll reports.\r\n\r\nBank Reconciliation -- Reconcile bank accounts weekly.\r\n\r\nFinancial Reporting -- Assist with preparing the monthly financial statement by reviewing and reconciling various accounts, by making journal entries and communicating reports to owners and CPA.\r\n\r\nRecords Management - Keeping all records accurate, up to date, organized and filed.\r\n\r\nInventory -- Assist with counting basic inventory items.\r\n\r\nSoftware - Must be proficient with QuickBooks, Microsoft Word and Excel.\r\n\r\nOther Duties - May need to help with some basic customer service functions such as answering phones, taking messages, routing communications through the proper channels, etc.\r\n\r\nOther Requirements - Must have excellent written and verbal communication skills as well as the ability to learn other software systems.\r\n\r\nPosition is a part time (W-2 position) and is expected to be approximately two days per week (typically Monday and Tuesday). Compensation will be based on experience and ability.\r\n\r\nPlease reply to this post with a copy of your resume. Interviews will be set up accordingly.', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(26, 'Hemambari', ' STAY AT HOME PARENT?! ACCOUNTING BACKGROUND?! WE WANT YOU!!!!! ', 'Accountant/Bookkeeper Needed (FULL time and PART time)\r\n\r\nDo you wish you could have the luxury of working from home? Do you have T1 and T2 filing experience? Do you have experience with Quickbooks or Simply Accounting software? Then look no further as we have the perfect opportunity for you!\r\n\r\nWe are currently seeking an experienced bookkeeper to join our team. We provide accounting services for our clients who may include but are not limited to professionals, realtors, engineers, and architects. The selected applicant would be hired as a "contractor" and would work remotely from home. Therefore individuals who apply should be comfortable following procedures and working with little or no day to day supervision. We are in search of an individual that shows integrity and has an objective of delivering a high level of accuracy.\r\n\r\nDuties include:\r\nâ€¢Data entry\r\nâ€¢Bank reconciliation\r\nâ€¢Payroll\r\nâ€¢Remittance\r\nâ€¢Reporting\r\nâ€¢Filing\r\nâ€¢GST tax return preparation; T1 and T2 tax return preparation;\r\nâ€¢Ensuring application of sound accounting principles/practices\r\nâ€¢Other duties as assigned\r\n\r\nDesired Skills and Experience:\r\nâ€¢Completion of a professional accounting designation is an asset\r\nâ€¢Minimum of 2 years of relevant work experience in full-cycle accounting\r\nâ€¢Solid understanding of current accounting principles, procedures and standards\r\nâ€¢Proficient in preparing T1 individual tax returns and T2 corporate tax returns\r\nâ€¢Must be proficient with QuickBooks and/or Simply Accounting\r\nâ€¢Proven prioritization, time management and project management skills\r\nâ€¢Computer literate with advanced proficiency using Excel\r\nâ€¢Excellent verbal and written communication skills\r\nâ€¢Ability to follow procedures and work with little or no day to day supervision.\r\nâ€¢Meticulous attention to detail\r\n\r\nTo apply for this role please forward your resume and cover letter addressed to Suzy. We appreciate all applications; however, only short-listed candidates will be contacted for an interview.', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(27, 'Hemambari', 'Debit Card Operations and System Administrator (26447JN)', 'Overall Functions:\r\n \r\nAdministrate the Card and ATM programs for a local bank and its divisions. Analyze program profitability and periodically report to management. Provide general direction and support to include systems, fraud trends and prevention methods; advise divisions in fraud prevention and risk management. Coordinate activities at the division level to ensure compliance of the card and ATM programs with all applicable policies, laws and regulations. Serve as the lead contact with outside vendors and organizations relation to card and ATM programs and support.\r\nDesired Minimum Qualifications:\r\nEducation and Experience:\r\n- Minimum 3-5 years of banking experience desired.\r\n- Experience in one or more of the following areas preferred: Card Services, ATM Services or Bank Operations.\r\n \r\nKnowledge, Skills and Abilities:\r\n- Advanced administrative and analytical skills.\r\n- Thorough knowledge of and ability to learn various office software. Working knowledge of Microsoft Word, PowerPoint, Internet Explorer, Email and Calendaring.\r\n- Professional\r\n \r\nPlease apply online at www.lcstaffing.com if you are interested in this position. The process is simple and free. ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(28, 'Hemambari', '1 Bookkeeper', '1390135 Alberta Ltd. o/a Canadas Best Value Inn needs 1 Full-Time bookkeeper\r\nto help with our accounts and financial activities\r\n\r\nWe are looking for people who can work 30-36 hr / week, 5 days / week\r\nWe offer wage $22/hr with 10 days paid vacation (Part time is also welcome)\r\n\r\nAt least High school graduated. Completion of program in accounting filed or\r\ncourse in bookkeeping combines with 1-2 years work related experience\r\nWe welcome applications from Aboriginal, New immigrants\r\nThe successful candidates will perform duties:\r\nâ€¢ Record cash receipts and make bank deposits\r\nâ€¢ Pay all invoices in a timely manner\r\nâ€¢ Pay any debt as it comes due for payment\r\nâ€¢ Ensure that receivables are collected promptly\r\nâ€¢ Calculate and issue financial analysis of the financial statements\r\nâ€¢ Process payroll in a timely manner\r\nâ€¢ Comply with federal government reporting requirements\r\nâ€¢ Conduct periodic reconciliations of all accounts to ensure their\r\naccuracy\r\nâ€¢ Maintain the annual budget\r\nOthers: We welcome applications from Aboriginal, New immigrants.\r\nCandidates legally entitled to work in Canada can apply\r\n\r\n1390135 Alberta Ltd. o/a Canadas Best Value Inn\r\nIf you are interested in:\r\nResume to --\r\nMail to -PO Box 900 3415 Caxton St, Whitecourt, AB. T7S 1N8\r\nEnd Date: 2015.10.20', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(29, 'Hemambari', 'Office helper , Qbooks data entry', 'Hello, i am looking for someone to help me with data entry from my crews time cards one or two times a week, organize office and emails, pick up the mail, make deposits and enter deposits. must have experience with Qbooks! please email or fax (862-9355) resume or generic job application.\r\nThank you. ', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(30, 'Hemambari', 'Intermediate Accountant', 'Intermediate Accountant - AC&D Insurance (Part of the InsureBC group)\r\n\r\nEmployment Type: Full-Time\r\nLocation: Quesnel, British Columbia\r\n\r\nJOB DESCRIPTION\r\nWe are seeking an enthusiastic individual with a proactive attitude to join our accounting team. The Intermediate Accountant will report to the Accounting Supervisor located in our Vancouver head office. Occasional travel to the Vancouver office will be required.\r\n\r\nPRIMARY RESPONSIBILITIES:\r\nï¶ Payables -- Insurance companies and vendors\r\nï¶ Receivables -- Deposits, client & insurance company reconciliations\r\nï¶ Resolve accounting discrepancies\r\nï¶ Maintain vendor files\r\nï¶ Prepare payments for signature\r\nï¶ General ledger, bank and various monthly reconciliations\r\nï¶ Compile and analyze financial information to prepare financial statements for month ends\r\nï¶ Ensure accurate and timely monthly, quarterly and year end close processes\r\n\r\nQUALIFICATIONS:\r\n\r\nï¶ Mid level CGA\r\nï¶ Attention to detail and accuracy\r\nï¶ Must be able to work independently with limited need for direction or supervision\r\nï¶ Above average communications skills required (both written & verbal)\r\nï¶ Excellent organizational skills, ability to multi-task\r\nï¶ Proficiency with Word and Excel\r\nï¶ Office experience an asset\r\nï¶ Type at least 40 wpm\r\n\r\nOnly those candidates selected for an interview will be contacted.\r\n\r\nFor company information please visit www.acdinsurance.com and/or www.insurebc.ca.', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 1),
(31, 'Hemambari', 'Tax Preparer - Seasonal Part time', 'Experienced Tax Preparer to work part-time during the late January to April 30 period.\r\nExcellent command of written and spoken English.\r\nProven customer service skills in person, by telephone and on email.\r\nAbility to work under pressure.\r\nAvailable days, evenings and/or weekends.\r\nAbility to work well in a team environment.\r\nComputer skills required: MS Word, Excel, Outlook, DT Max\r\nHave passed Fundamentals of Income Tax I and II or equivalent.\r\nPlease send detailed resume.', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Pending', '2015-10-14 17:45:02', 0),
(32, 'Hemambari', 'Critter Get Ritter', 'Critter Get Ritter - We are "Sustainably Focused on YOUR Environment."\r\n\r\nPest &Wildlife Control, Trapping and Extermination;\r\nChimney/Duct Cleaning, Firewood, Fireplace Sales, Service and Inspection;\r\nTree falling, Branch Triming and Chipping;\r\nEmergency Services, and Roof Snow Shoveling; and,\r\nDiatom Earth Sales.\r\n\r\nWe require someone with customer service aptitude, outgoing positive attitude, that is fair-weathered and committed with our Whistler and Sea to Sky Corridor. Ie. You must be able to carry a complicated conversation with Vancouverites, Whistlerites, Squamishonians, Pembernites and those involved with our magnificent and beautiful communities.\r\nSkiing, hiking, biking, camping are a must. Our clients are the best in Canada and the World. Really there are too many perks doing this job. Look us up crittergetritter dot com\r\n\r\nDrivers licence necessary; drive and computer (accounting) experience required for greater earnings. Training is about 2 months. Contact more for wage/benefit information but $15-20/hour is fair to start depending on experience. University, College is an asset but please not cigarette smoking and preferences given first to locals with a drivers license, positive attitude, sense of humour and spirit.', '', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Active', '2015-10-31 16:08:39', 1),
(33, 'Hemambari', 'Bookkeeper, Entry Level', 'Our office is looking for an individual with some experience in spreadsheets and bookkeeping. Speed is secondary to accuracy and the individual must be comfortable working in a multi-company environment. There is lots of variety and this is a great learning experience for the right individual. We are flexible in the hours and they could be different from week to week. ', 'Gibsons', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Active', '2015-10-31 16:08:41', 0),
(34, 'Hemambari', 'Position is filled*** accountant to join our public practice team', 'This position has been filled. Thank you all for your interest.\r\n\r\nSmall public practice firm in Courtenay is looking to hire an accountant to join our team!\r\n\r\nThe job involves working with our clients to prepare;\r\n\r\nâ€¢ working paper files for private corporations including;\r\n* journal entries and analysis\r\n* reconciliations\r\nâ€¢ financial statements,\r\nâ€¢ corporate, personal and trust tax returns and filing\r\nâ€¢ GST returns and filing\r\nâ€¢ Payroll and bookkeeping where required\r\n\r\n\r\nDo you have some practical experience in accounting?\r\nDo you have time management/organizational skills?\r\nAre you a great communicator?\r\nAre you a team player?\r\nAre you able to work well under the pressures of deadlines?\r\nDo you have a "can do" attitude\r\nAre you working toward an accounting designation, or recently received one?\r\n\r\nThen we want to hear from you!\r\n\r\n\r\n\r\n\r\nTo apply for this position, please send a cover letter and resume via email.\r\n\r\nWe thank all applicants for their interest, but only those selected for interviews will be contacted.\r\n\r\nOur office hours are Monday through Thursday 8:30 to 4:30.\r\nBased on a 4 day work week, hours would be 28 hours per week with additional hours available during peak times. ', 'Courtenay', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Active', '2015-10-31 16:08:33', 1),
(35, 'Hemambari', ' Accountant/Office Manager', 'Nelson Roofing & Sheet Metal Ltd., the leading roofing contractor for Northern Vancouver Island and the Sunshine Coast, is looking for a permanent full time Accountant/Office Manager in their Comox Valley Location. The successful candidate will oversee the accounting department including operations in 5 locations (Cumberland, Campbell River, Powell River, Sechelt and the Lower Mainland), supervise an internal accounting team of 8 and have an opportunity to make the role their own. This position is part of the management team and reports directly to president.\r\n\r\nThis position includes:\r\nâ€¢ Oversight of the accounting department, which is centralized in the Cumberland location:\r\n- Accounts receivable -- invoice preparation and collections\r\n- Accounts payable\r\n- Payroll -- complex union payroll, worksafe, labour standards\r\n- Bank and credit card reconciliations\r\n- Year-end preparation\r\n- Internal reporting\r\nâ€¢ Administration of office including maintenance of building and office equipment, supply purchases, company advertising, managing a fleet of 60 vehicles, and other matters as they arise.\r\nâ€¢ Human Resources including supervision of accounting and office team\r\nâ€¢ Base level IT.\r\n\r\nPreference will be given to applicants who can demonstrate:\r\nâ€¢ 5 years of experience in accounting and office management\r\nâ€¢ Advanced proficiency with Sage 50 Accounting Software, including project costing\r\nâ€¢ Advanced knowledge of Microsoft Office and Outlook\r\nâ€¢ Experience working in a supervisory capacity\r\nâ€¢ Proficiency in the preparation of year end records for external accountants\r\nâ€¢ Proficiency in preparing internal reporting\r\nâ€¢ Strength as a team player\r\nâ€¢ Knowledge of the construction industry\r\nâ€¢ Experience dealing with bonding companies\r\nâ€¢ A strong payroll knowledge in a unionized environment\r\nâ€¢ A degree or diploma in Business administration, Finance or Accounting\r\n\r\nA strong compensation package will be offered that is commensurate with qualifications.\r\nOnly those applicants who are chosen to interview will be contacted.\r\nClosing date October 5, 2015\r\nPlease respond with references to Kelly.Chopty@mnp.ca with "Nelson Roofing" in the subject line.', 'Comox Valley', '65, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Active', '2015-10-31 16:08:29', 0),
(36, 'Hemambari', 'Restaurant looking for bookkeeper', 'Established downtown restaurant is seeking an experienced bookkeeper. Must be proficient in Squirrel POS and Excel.\r\nOnly qualified candidates will be contacted. Please email with resume and cover letter. ', 'Victoria', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Active', '2015-10-27 17:25:31', 1),
(37, 'Hemambari', 'Sub Prime Auto Sales', 'SUB PRIME BUSINESS OFFICE SALES PERSON REQUIRED TO WORK WITH\r\n" DREAMCATCHER " OVERFLOW UP TO $100K + PER YEAR FOR THE RIGHT INDIVIDUAL - MUST HAVE DEALER TRACK & ADP EXPERIENCE & ABILITY TO CLOSE BY PHONE. SERIOUS ENQUIRIES FROM SEASONED AUTO SALES ONLY APPLY.\r\n5 LEADS PER DAY + YOUR OWN CLIENTS ', 'coquitlam', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Active', '2015-10-26 11:55:31', 0),
(38, 'Hemambari', 'Accounts Receivable Clerk', 'Duties will include..\r\nAll Accounts Receivable functions (in-house accounting system)\r\nPost customer payments (EFT, credit card, cash, cheques)\r\nPrepare bank deposits\r\nCredit management / account monitoring\r\nCollection calls\r\nAccount reconciliations\r\n\r\nQualifications..\r\nExcellent telephone/communication skills in English\r\nMinimum 1 year A/R and collection experience\r\nProficient with Excel/Word\r\nHighly organized, detail focused, and deadline oriented\r\nAbility to self start, multi-task, and work with minimal supervision\r\n\r\nFull time Monday to Friday from 6:30am to 3:00pm\r\nAvailable to start Monday October 19th, 2015. ', 'Richmond', '25, 000', 'Job opening for persons with disabilities', '1234567890', 'hemambari@gmail.com', 1, 2, 16, 52, 12, '4', 1, 'Pending', 'Active', '2015-10-26 11:55:28', 1),
(182, 'new ine', 'this is new', '', '', '', '', '91778454242', 'hemambari@gmail.com', 1, 1, 1, 52, 12, '', 1, 'Pending', 'Active', '2015-11-24 17:47:26', 0),
(183, 'new ine', 'this is new', '', '', '', '', '91778454242', 'hemambari@gmail.com', 1, 1, 1, 52, 12, '', 1, 'Pending', 'Active', '2015-11-24 17:47:26', 0),
(181, '', 'this is new', 'ehfe', '', '', '', '9177894617', 'hemambari@gmail.com', 1, 1, 1, 59, 12, '', 1, 'Pending', 'Active', '2015-11-24 17:42:23', 0),
(180, '', 'this is new', 'ehfe', '', '', '', '9177894617', 'hemambari@gmail.com', 1, 1, 1, 59, 12, '', 1, 'Pending', 'Active', '2015-11-24 17:42:23', 0),
(171, '', 'Testing', '', '', '', '', '', 'hemambari@gmail.com', 1, 9, 17, 306, 10, '69', 1, 'Pending', 'Active', '2015-11-17 11:16:00', 0),
(176, 'ishak', 'please', '', 'kakinasa', '', '', '9059170879', 'hemambari@gmail.com', 1, 1, 1, 57, 10, '68', 1, 'Pending', 'Active', '2015-11-17 11:23:21', 0),
(173, 'ishak', 'Testing', '', 'vizag', '', '', '', 'hemambari@gmail.com', 1, 9, 10, 144, 10, '68', 1, 'Pending', 'Active', '2015-11-17 11:18:56', 0),
(179, 'ishak', 'grsg', '', 'vizag', '2000', '', '9059170879', 'hemambari@gmail.com', 1, 9, 17, 305, 10, '69', 1, 'Pending', 'Active', '2015-11-17 18:21:30', 0),
(177, 'ishak', 'please', '', 'kakinasa', '', '', '9059170879', 'hemambari@gmail.com', 1, 1, 1, 57, 10, '68', 1, 'Pending', 'Active', '2015-11-17 11:23:21', 0),
(178, 'ishak', 'grsg', '', 'vizag', '2000', '', '9059170879', 'hemambari@gmail.com', 1, 9, 17, 305, 10, '69', 1, 'Pending', 'Active', '2015-11-17 18:21:30', 1),
(159, 'ishak', 'jobs', 'hii helo', 'kakinada', '2000', '', '9177894617', 'hemambari@gmail.com', 1, 1, 1, 52, 12, '5', 1, 'Pending', 'Active', '2015-11-13 17:24:27', 0),
(160, 'ishak', 'jobs', 'hii helo', 'kakinada', '2000', '', '9177894617', 'hemambari@gmail.com', 1, 1, 1, 52, 12, '9', 1, 'Pending', 'Active', '2015-11-13 17:24:27', 1),
(164, 'testing', 'testing', 'tyth', 'kakinasa', '', '', '9059170879', 'hemambari@gmail.com', 1, 1, 1, 52, 10, '68', 1, 'Pending', 'Active', '2015-11-14 12:08:09', 0),
(162, 'sumi', 'Testing', 'Testing', 'kakinada', '2000', '', '9059170879', 'hemambari@gmail.com', 1, 1, 1, 53, 12, '14', 1, 'Pending', 'Active', '2015-11-14 09:57:10', 0),
(163, 'sumi', 'Testing', 'Testing', 'kakinada', '2000', '', '9059170879', 'hemambari@gmail.com', 1, 1, 1, 53, 12, '18', 1, 'Pending', 'Active', '2015-11-14 09:57:10', 1),
(165, 'testing', 'testing', 'tyth', 'kakinasa', '', '', '9059170879', 'hemambari@gmail.com', 1, 1, 1, 52, 10, '69', 1, 'Pending', 'Active', '2015-11-14 12:08:09', 0),
(166, 'sumi', 'matches', 'hi this is ishak for ', 'USA', '2,000', '', '9177894617', 'hemambari@gmail.com', 1, 9, 17, 306, 14, '50', 1, 'Pending', 'Active', '2015-11-16 15:23:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `postings_images`
--

CREATE TABLE IF NOT EXISTS `postings_images` (
  `images_id` int(10) NOT NULL AUTO_INCREMENT,
  `posting_id` int(10) NOT NULL,
  `posting_paths` varchar(500) NOT NULL,
  PRIMARY KEY (`images_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `postings_images`
--

INSERT INTO `postings_images` (`images_id`, `posting_id`, `posting_paths`) VALUES
(1, 1, '97c983e351b465731653c3c00a9917fb.jpg'),
(2, 1, '6b29d7749f9ee16286869c900ea96121.jpg'),
(3, 2, 'cbfd48b40d202e587cbbae503d60d374.jpg'),
(4, 2, 'b6e000b38dde1880c9b0681510958ffd.jpg'),
(5, 3, '258b9d393aef096899de839e862d482a.jpg'),
(6, 3, 'ca4edb80e1bfbdc0e5ceede80e8c7dbb.jpg'),
(7, 4, 'e5e7e9ab62bef38205729b2ad6ef3892.jpg'),
(8, 4, '712ec2d511e2f0ca819b48a38098b476.jpg'),
(9, 5, '2e1e3396ed63692887d414f4afa12058.jpg'),
(10, 5, '98b313266f627c1d62179af5dab2cee3.jpg'),
(11, 6, '3b1b2b1be8fdaac68e8b9af565998a11.jpg'),
(12, 6, '7e40096ae8c99a82dadb4966f92997d4.jpg'),
(13, 7, '084586a28254d419fa8932c73e2616ec.jpg'),
(14, 7, 'df15f927421bb498781ba94e09bdd581.jpg'),
(15, 8, 'a38cf6c9759ff94e40c19424ea5cb460.jpg'),
(16, 8, '44b129001318f25c84d9b5ec189ce2d4.jpg'),
(17, 9, '32175c1e1d5fdc5c12b0e4e665cf3ca4.jpg'),
(18, 9, '4d85f9545b00fd3a0bdf96247b1c0e42.jpg'),
(19, 10, '53a728810220303e795072b4236c84b4.jpg'),
(20, 10, '60e2a1805e6c2e65472264e1f2d0fe83.jpg'),
(21, 11, '56169ea12697c793afd7f2310d4be8dd.jpg'),
(22, 11, '54008033fefe277d08a8cd3e76919b2e.jpg'),
(23, 12, 'a939aa2f8a55876d869b00ed283f91ed.jpg'),
(24, 12, 'd9783527d46681bdac11da860e58357d.jpg'),
(25, 13, '494075ea5966c004c7cf3656d0a29ce0.jpg'),
(26, 13, '634e8cb0a94ede190244453d6411ff9d.jpg'),
(27, 14, '7524d92a39d55c54b1a55f0fa75abbf2.jpg'),
(28, 14, 'fe4eb7f430a0c2df0a9d3969f6294928.jpg'),
(29, 15, '9e6ea1ae54631cf1deee96c0876cfe9f.jpg'),
(30, 15, 'd15d54c53e2371b0bf388f49c5455903.jpg'),
(31, 16, '4bdb8ed534aad68d678b8ea23dacc717.jpg'),
(32, 16, '238e59eeb8d76856997519e1341a98e7.jpg'),
(33, 17, '246f196ca4b3ec17716fee5b95e232b3.jpg'),
(34, 17, '1dfbdb90d152c82c62c56f0650bcedaa.jpg'),
(35, 18, '719337ee36654176d1f14762e488c533.jpg'),
(36, 18, 'b1965672a2c84de294e1f734e069faec.jpg'),
(37, 19, 'f63a66e9d9f6e1d66609d4249b875bca.jpg'),
(38, 19, '3bfcd9fc3d1fb64b773099da56457d30.jpg'),
(39, 20, 'b835250a8424937c24923d61c2cface2.jpg'),
(40, 20, 'c4e81d762f16426698244063ef08a122.jpg'),
(41, 21, 'dc3f17fda291b92342bfd39c3ea50697.jpg'),
(42, 21, '01893fb327fc2128d2580bc6f8d29165.jpg'),
(43, 22, '33fb15b9bd13bfa4797ceafea95ce341.jpg'),
(44, 22, '197fc03eaa67096744cece2ce94fe0e7.jpg'),
(45, 23, 'e5cabec923359df3e1422ec2912dd405.jpg'),
(46, 23, 'bbfe10bb7391799bec2eaa1b0f031f22.jpg'),
(47, 24, 'a4049e445653dc14ede83ef717ab80d6.jpg'),
(48, 24, 'd95a4f48661f623095ed3dddb4e5cd22.jpg'),
(49, 25, 'e8d03c0a2bf55c7f05c6490ffad4807e.jpg'),
(50, 25, 'e5051f0560b15c967ac5891a3557ee7e.jpg'),
(51, 26, '59dfb36d52bf2dce9c8febd57ab7f2bc.jpg'),
(52, 26, '1d08aaf6aba62eb96d9d1366956e0965.jpg'),
(53, 27, '2d34de729ba0c96e52dfbe761cebbb94.jpg'),
(54, 27, '39770a9e0a094236672a257611e422f0.jpg'),
(55, 28, '642ba9b7575126f7045ef75e1825adc9.jpg'),
(56, 28, 'f4b484bc34bb192d5d4ebdf501849586.jpg'),
(57, 29, 'a8c4f6a274de3afddb820f2580de3cd9.jpg'),
(58, 29, '81086d798f0e2286df2eb49b0150ce75.jpg'),
(59, 30, '36df04fdbb6bcc2ffe550241bd10bd07.jpg'),
(60, 30, '294cfcfc5e84504a83f0571d73aa6d21.jpg'),
(61, 31, '40a6d0f77ddf773c994df5b37e13a407.jpg'),
(62, 31, 'd313f2aea0cc21da269cfb778d5eee73.jpg'),
(63, 32, '020bd786586a42e59a8c068a960bc98e.jpg'),
(64, 32, '2d113b07809ba4efeaa2c312637a34dd.jpg'),
(65, 33, '4c34e4a69b9e882f1aa6ff297d77f185.jpg'),
(66, 33, 'ad78d49e97c2756ec0c8d10ab922f812.jpg'),
(67, 34, 'ee4c5c419ff67b3c39631b7b1d80bb36.jpg'),
(68, 34, 'da03d10cf63871e9706792c8a8af13f7.jpg'),
(69, 35, 'fbdf494877bdc3f4898a12b47733919e.jpg'),
(70, 35, 'f4b4836821708223e0098d5685c71b1f.jpg'),
(71, 36, 'cc9add876abefa87625341549f73f62b.jpg'),
(72, 36, 'ee0e240714d6b1d368e9d97cb603eab7.jpg'),
(73, 37, '39ad8f7bf00d210c967cc1ef03dc37c7.jpg'),
(74, 37, '1eea9968f0d41e85105a5a2063aa0eba.jpg'),
(75, 38, 'd1923445ce0f21f24cbbf2fcd49223cf.jpg'),
(76, 38, '0e7e913a873a99858441b2f0fac017d6.jpg'),
(77, 39, '0dbe6b1c0e39592725af6b0695fe5ac5.jpg'),
(78, 39, 'b8d62ee66deb6d6e7f134d6e5a1efe4a.jpg'),
(79, 40, 'f765e056c4a382a9a3a98a91a0662148.jpg'),
(80, 40, '2936cc476241871c913c233220d36b6b.jpg'),
(81, 41, 'ac2bf0f09726ccbbb3a45ca8b6c0434b.jpg'),
(82, 41, 'a282930071eab57884ccbaa720c3260d.jpg'),
(83, 43, '20af9ab3c2e87e8be5f57b27f3ec40f9.jpg'),
(84, 45, '3b189d127151e948a5b2befc4f619172.jpg'),
(85, 45, 'a02a2697d45dbdfda6d293458ae0ab5c.jpg'),
(86, 46, '535587b6246b420f8955a207635e2ce5.jpg'),
(87, 49, '51475321a1a585006018376708e225d3.jpg'),
(88, 52, 'd5bd6410b07b0c13616e1cce54a5149d.jpg'),
(89, 53, '2fdae5ca0119f203d0d9b0f0e9d3a52f.jpg'),
(90, 54, 'b3c3aef22afcee78e6dfa4e3045c5f96.jpg'),
(91, 55, 'da08e59a1b77776bb2cd308a131663cd.jpg'),
(92, 56, 'ccf9e7379098ae0a44fb819fee56daa7.jpg'),
(93, 58, '34de7c2f36f054843a91a9c47d97d30f.jpg'),
(94, 59, '03f20f67163f0c9be322b0c621203581.jpg'),
(95, 60, 'dfde1f75da0fc2d577a4875de22ddd16.png'),
(96, 61, '2cb896a84276afe41b7f299d56aaebe7.png'),
(97, 63, '0b2a68103fcbf70744cf81ea949e0304.jpg'),
(98, 64, 'ab22bc9a2550f832ad78075b0d1a2750.jpg'),
(99, 65, '1595b984b5f22215e7e3d3b396faa665.jpg'),
(100, 66, 'c617f75e702bf1948891d0852f043e14.jpg'),
(101, 67, 'e20938e8a675932220590b0bee5bb0e9.jpg'),
(102, 68, '85eaf86d82bfc0204d859fab4f9eeb15.jpg'),
(103, 69, '7a986185edb731cbfd34762ff46133e5.jpg'),
(104, 74, 'c8c1a3788784f8a2b93bf7d03f0f7b98.jpg'),
(105, 75, 'ddc3526ced28afac13ca5be38d10d878.jpg'),
(106, 76, '61f725f0922db1c80684765bee479000.jpg'),
(107, 77, 'c74bea183ef49816a9955245d2011bff.jpg'),
(108, 78, '5cbcd973f8e95c34db01bf59ffe62ecf.jpg'),
(109, 79, 'e52bea1f578047af8fe242d785d57796.jpg'),
(110, 87, 'c6a6dbe494586765675ed891ed5700ec.jpg'),
(111, 89, '39c32d3126e96b9434921f120cbfc89f.jpg'),
(112, 103, 'eb8a2411407ed09cda587a79756fafbc.jpg'),
(113, 104, 'd32661b7c50005aacd1e467bc4b0f49c.jpg'),
(114, 105, 'b98b2d66d9ce12b319e10bf01eab6059.jpg'),
(115, 106, 'c3c3833bf0610dfedb2b4d15a3bc2782.jpg'),
(116, 107, '03dfd035183904c08abde86f9a06320c.jpg'),
(117, 108, 'c5fe621b5e54f5cb629cc936bcfffcb6.jpg'),
(118, 109, '88230e6aa54895eda26352b68b7e15ce.jpg'),
(119, 112, '8f6fe1a435aa0a95cd874d9e5df79c32.jpg'),
(120, 113, 'd05491d651d50b572cd97f329527d169.jpg'),
(121, 125, '95637de59324d52d238225a7b9795ddb.jpg'),
(122, 128, 'ed61ca36e7f6e69bc1806cb617bcb7c6.png'),
(123, 160, 'a5755da76f11013d2cfbc8e7c63f83d6.jpg'),
(124, 163, '181d56efe060a1c43ef771047664631f.jpg'),
(125, 167, '0880ca4d3b034821d575267b94444aa2.jpg'),
(126, 0, '5d55211058d179e3bac980d7c3156181.jpg'),
(127, 174, '429a395da752ef8f59432a5c9dfbcc51.jpg'),
(128, 178, '1faf51ba9fbda2942188f44eb535c259.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `price_id` int(10) NOT NULL AUTO_INCREMENT,
  `continent_id` int(10) NOT NULL,
  `territory_id` int(10) NOT NULL,
  `country_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `sub_category_id` int(10) NOT NULL,
  `price` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`price_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`price_id`, `continent_id`, `territory_id`, `country_id`, `city_id`, `category_id`, `sub_category_id`, `price`, `status`, `time`) VALUES
(70, 1, 1, 1, 52, 11, 83, '22', 'Active', '2015-11-14 10:48:12'),
(69, 1, 1, 1, 52, 11, 82, '22', 'Active', '2015-11-14 10:48:12'),
(68, 1, 1, 1, 52, 11, 81, '22', 'Active', '2015-11-14 10:48:12'),
(67, 1, 1, 1, 52, 11, 80, '22', 'Active', '2015-11-14 10:48:12'),
(66, 1, 1, 1, 52, 11, 79, '22', 'Active', '2015-11-14 10:48:12'),
(20, 1, 1, 11, 48, 12, 5, '15', 'Active', '2015-11-07 15:23:44'),
(21, 1, 1, 11, 48, 12, 6, '15', 'Active', '2015-11-07 15:23:44'),
(22, 1, 1, 11, 48, 12, 7, '15', 'Active', '2015-11-07 15:23:44'),
(23, 1, 1, 11, 48, 12, 8, '15', 'Active', '2015-11-07 15:23:44'),
(24, 1, 1, 11, 48, 12, 9, '15', 'Active', '2015-11-07 15:23:44'),
(25, 1, 1, 11, 48, 12, 10, '15', 'Active', '2015-11-07 15:23:44'),
(26, 1, 1, 11, 48, 12, 12, '15', 'Active', '2015-11-07 15:23:44'),
(27, 1, 1, 11, 48, 12, 13, '15', 'Active', '2015-11-07 15:23:44'),
(28, 1, 1, 11, 48, 12, 14, '15', 'Active', '2015-11-07 15:23:44'),
(29, 1, 1, 11, 48, 12, 15, '15', 'Active', '2015-11-07 15:23:44'),
(30, 1, 1, 11, 48, 12, 16, '15', 'Active', '2015-11-07 15:23:44'),
(31, 1, 1, 11, 48, 12, 17, '15', 'Active', '2015-11-07 15:23:44'),
(32, 1, 1, 11, 48, 12, 18, '15', 'Active', '2015-11-07 15:23:44'),
(33, 1, 1, 11, 48, 12, 19, '15', 'Active', '2015-11-07 15:23:44'),
(34, 1, 1, 11, 48, 12, 20, '15', 'Active', '2015-11-07 15:23:44'),
(35, 1, 1, 11, 48, 12, 21, '15', 'Active', '2015-11-07 15:23:44'),
(36, 1, 1, 11, 48, 12, 22, '15', 'Active', '2015-11-07 15:23:44'),
(37, 1, 1, 11, 48, 12, 23, '15', 'Active', '2015-11-07 15:23:44'),
(38, 1, 1, 11, 48, 12, 24, '15', 'Active', '2015-11-07 15:23:44'),
(39, 1, 1, 11, 48, 12, 25, '15', 'Active', '2015-11-07 15:23:44'),
(40, 1, 1, 11, 48, 12, 26, '15', 'Active', '2015-11-07 15:23:44'),
(41, 1, 1, 11, 48, 12, 27, '15', 'Active', '2015-11-07 15:23:44'),
(42, 1, 1, 11, 48, 12, 28, '15', 'Active', '2015-11-07 15:23:44'),
(43, 1, 1, 11, 48, 12, 29, '15', 'Active', '2015-11-07 15:23:44'),
(44, 1, 1, 11, 48, 12, 30, '15', 'Active', '2015-11-07 15:23:44'),
(45, 1, 1, 11, 48, 12, 31, '15', 'Active', '2015-11-07 15:23:44'),
(46, 1, 1, 11, 48, 12, 32, '15', 'Active', '2015-11-07 15:23:44'),
(47, 1, 1, 11, 48, 12, 33, '15', 'Active', '2015-11-07 15:23:44'),
(48, 1, 1, 11, 48, 12, 34, '15', 'Active', '2015-11-07 15:23:44'),
(49, 1, 1, 11, 48, 12, 37, '15', 'Active', '2015-11-07 15:23:44'),
(50, 1, 1, 11, 48, 12, 35, '15', 'Active', '2015-11-07 15:23:44'),
(65, 1, 1, 1, 52, 11, 78, '22', 'Active', '2015-11-14 10:48:12'),
(64, 1, 1, 1, 52, 11, 77, '22', 'Active', '2015-11-14 10:48:12'),
(63, 1, 1, 1, 52, 11, 76, '22', 'Active', '2015-11-14 10:48:12'),
(54, 1, 1, 1, 58, 14, 54, '2.5', 'Active', '2015-11-07 15:30:20'),
(55, 1, 1, 1, 58, 14, 56, '2.5', 'Active', '2015-11-07 15:30:20'),
(56, 1, 1, 1, 58, 14, 57, '2.5', 'Active', '2015-11-07 15:30:20'),
(57, 1, 1, 1, 58, 14, 49, '2.5', 'Active', '2015-11-07 15:30:20'),
(58, 1, 1, 1, 58, 14, 50, '2.5', 'Active', '2015-11-07 15:30:20'),
(59, 1, 1, 1, 58, 14, 51, '2.5', 'Active', '2015-11-07 15:30:20'),
(71, 1, 1, 1, 52, 11, 84, '22', 'Active', '2015-11-14 10:48:12'),
(72, 1, 1, 1, 52, 11, 85, '22', 'Active', '2015-11-14 10:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `registration_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` int(10) NOT NULL,
  `password` varchar(250) NOT NULL,
  `activation` varchar(500) NOT NULL,
  `user_type` varchar(250) NOT NULL,
  `payment_type` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`registration_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `name`, `email`, `contact`, `password`, `activation`, `user_type`, `payment_type`, `status`, `date`) VALUES
(2, 'Ganapathi', 'dasireddyganapathid@gmail.com', 2147483647, 'admin', '', 'user', 'FREE', 'Active', '2015-09-28 16:10:36'),
(11, 'hemambari', 'hemambari@gmail.com', 1234567890, '1234', '', 'user', 'FREE', 'Active', '2015-10-26 15:00:36'),
(31, 'Santosh', 'santosh0775@gmail.com', 2147483647, 'admin', 'f5e624d1db1f8ed1a92a74ad8945e9b3', 'user', 'FREE', 'Active', '2015-10-27 15:23:26'),
(32, 'suma', 'suma1991t@gmail.com', 2147483647, 'admin', '7824f8eed9b8e162d06c52f8fae226fb', 'user', 'FREE', 'Active', '2015-10-27 15:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `reply_messages`
--

CREATE TABLE IF NOT EXISTS `reply_messages` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT,
  `post_owner` varchar(250) NOT NULL,
  `link` text NOT NULL,
  `message` varchar(600) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reply_messages`
--

INSERT INTO `reply_messages` (`message_id`, `post_owner`, `link`, `message`, `name`, `email`, `subject`, `status`, `date`) VALUES
(1, 'none', 'http://www.bestinciti.com/clients/danaye/category-description.php?city_id=189&categoty_id=12&sub_categories_id=4&posting_id=21', 'ljklllkfdlkffdsfdsfsdfdsfsdfsdfdd', 'Ganapatphi', '', 'Test message ', 'Pending', '2015-09-29 15:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `posting_id` bigint(20) DEFAULT NULL,
  `report_text` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `posting_id`, `report_text`, `date`) VALUES
(14, 32, 'You Have Report', '2015-11-03 16:33:56'),
(15, 36, 'You Recieve Report', '2015-11-07 10:15:24'),
(16, 38, 'You Recieve Report', '2015-12-01 15:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(50) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `modifydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subcategory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subcategory`
--


-- --------------------------------------------------------

--
-- Table structure for table `subct`
--

CREATE TABLE IF NOT EXISTS `subct` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_categories_id` int(10) NOT NULL,
  `posting_id` int(10) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subct`
--

INSERT INTO `subct` (`sub_id`, `sub_categories_id`, `posting_id`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `sub_categories_id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_categories_name` varchar(250) NOT NULL,
  `categories_id` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`sub_categories_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_categories_id`, `sub_categories_name`, `categories_id`, `status`, `time`) VALUES
(4, 'accounting', 12, 'Active', '2015-09-23'),
(5, 'admin', 12, 'Active', '2015-09-23'),
(6, 'arch', 12, 'Active', '2015-09-23'),
(7, 'art', 12, 'Active', '2015-09-23'),
(8, 'biotech', 12, 'Active', '2015-09-23'),
(9, 'Business', 12, 'Active', '2015-09-23'),
(10, 'customer service', 12, 'Active', '2015-09-23'),
(11, 'education', 0, 'Active', '2015-09-23'),
(12, 'Food/bev/hosp', 12, 'Active', '2015-09-23'),
(13, 'general labor', 12, 'Active', '2015-09-23'),
(14, 'government', 12, 'Active', '2015-09-23'),
(15, 'human resources', 12, 'Active', '2015-09-23'),
(16, 'internet engineers', 12, 'Active', '2015-09-23'),
(17, 'legal / paralegal', 12, 'Active', '2015-09-23'),
(18, 'manufacturing', 12, 'Active', '2015-09-23'),
(19, 'marketing / pr / ad', 12, 'Active', '2015-09-23'),
(20, 'medical / health', 12, 'Active', '2015-09-23'),
(21, 'nonprofit sector', 12, 'Active', '2015-09-23'),
(22, 'real estate', 12, 'Active', '2015-09-23'),
(23, 'retail / wholesale', 12, 'Active', '2015-09-23'),
(24, 'sales / biz dev', 12, 'Active', '2015-09-23'),
(25, 'salon / spa / fitness', 12, 'Active', '2015-09-23'),
(26, 'security', 12, 'Active', '2015-09-23'),
(27, 'skilled trade / craft', 12, 'Active', '2015-09-23'),
(28, 'software / qa / dba', 12, 'Active', '2015-09-23'),
(29, 'systems / network', 12, 'Active', '2015-09-23'),
(30, 'technical support', 12, 'Active', '2015-09-23'),
(31, 'transport', 12, 'Active', '2015-09-23'),
(32, 'tv / film / video', 12, 'Active', '2015-09-23'),
(33, 'web / info design', 12, 'Active', '2015-09-23'),
(34, 'writing / editing', 12, 'Active', '2015-09-23'),
(35, '[ETC]', 12, 'Active', '2015-09-23'),
(37, '[ part-time ]', 12, 'Active', '2015-09-23'),
(49, 'strictly platonic', 14, 'Active', '2015-09-23'),
(50, 'women seek women', 14, 'Active', '2015-09-23'),
(51, 'women seeking men', 14, 'Active', '2015-09-23'),
(52, 'men seeking women', 14, 'Active', '2015-09-23'),
(53, 'men seeking men', 14, 'Active', '2015-09-23'),
(54, 'misc romance', 14, 'Active', '2015-09-23'),
(55, 'casual encounters', 14, 'Active', '2015-09-23'),
(56, 'missed connections', 14, 'Active', '2015-09-23'),
(57, 'rants and raves', 14, 'Active', '2015-09-23'),
(58, 'antiques', 13, 'Active', '2015-09-23'),
(59, 'appliances', 13, 'Active', '2015-09-23'),
(60, 'arts+crafts', 13, 'Active', '2015-09-23'),
(61, 'atv/utv/sno', 13, 'Active', '2015-09-23'),
(62, 'auto parts', 13, 'Active', '2015-09-23'),
(63, 'baby+kid', 13, 'Active', '2015-09-23'),
(64, 'barter', 13, 'Active', '2015-09-23'),
(65, 'beauty+hlth', 13, 'Active', '2015-09-23'),
(66, 'bikes', 13, 'Active', '2015-09-23'),
(67, 'activities', 10, 'Active', '2015-09-23'),
(68, 'artists', 10, 'Active', '2015-09-23'),
(69, 'childcare', 10, 'Active', '2015-09-23'),
(70, 'classes', 10, 'Active', '2015-09-23'),
(71, 'events', 10, 'Active', '2015-09-23'),
(72, 'general', 10, 'Active', '2015-09-23'),
(73, 'groups', 10, 'Active', '2015-09-23'),
(74, 'musicians', 10, 'Active', '2015-09-23'),
(75, 'politics', 10, 'Active', '2015-09-23'),
(76, 'apts / housing', 11, 'Active', '2015-09-23'),
(77, 'housing swap', 11, 'Active', '2015-09-23'),
(78, 'housing wanted', 11, 'Active', '2015-09-23'),
(79, 'office / commercial', 11, 'Active', '2015-09-23'),
(80, 'parking / storage', 11, 'Active', '2015-09-23'),
(81, 'real estate for sale', 11, 'Active', '2015-09-23'),
(82, 'rooms / shared', 11, 'Active', '2015-09-23'),
(83, 'rooms wanted', 11, 'Active', '2015-09-23'),
(84, 'sublets / temporary', 11, 'Active', '2015-09-23'),
(85, 'vacation rentals', 11, 'Active', '2015-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `sub_country`
--

CREATE TABLE IF NOT EXISTS `sub_country` (
  `subcountry_id` int(11) NOT NULL AUTO_INCREMENT,
  `maincountry_id` int(10) NOT NULL,
  `subcountry_name` varchar(50) NOT NULL,
  `modifydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subcountry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sub_country`
--


-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE IF NOT EXISTS `super_admin` (
  `super_admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `super_admin_email` varchar(250) NOT NULL,
  PRIMARY KEY (`super_admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`super_admin_id`, `name`, `username`, `password`, `super_admin_email`) VALUES
(1, 'Administrator', 'admin', 'admin', 'dasireddyganapathi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `territory`
--

CREATE TABLE IF NOT EXISTS `territory` (
  `territory_id` int(10) NOT NULL AUTO_INCREMENT,
  `territory_name` varchar(250) NOT NULL,
  `continent_id` int(10) NOT NULL,
  `status` varchar(250) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`territory_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `territory`
--

INSERT INTO `territory` (`territory_id`, `territory_name`, `continent_id`, `status`, `time`) VALUES
(1, 'South Africa', 1, 'Active', '00:00:00'),
(9, 'Afrique Centrale', 1, 'Active', '14:51:35');

--
-- Triggers `territory`
--
DROP TRIGGER IF EXISTS `terydel_tgr`;
DELIMITER //
CREATE TRIGGER `terydel_tgr` AFTER DELETE ON `territory`
 FOR EACH ROW delete from country where territory_id_fkey = old.territory_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(10) NOT NULL,
  `sub_category` varchar(50) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transaction`
--

