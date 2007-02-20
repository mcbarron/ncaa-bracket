-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 11, 2007 at 01:07 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.0
-- 
-- Database: `ncaa_bracket_pool`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `bracket`
-- 

DROP TABLE IF EXISTS `bracket`;
CREATE TABLE `bracket` (
  `team_id` int(11) NOT NULL default '0',
  `wins` int(11) default '0',
  `losses` int(11) default '0',
  `year` char(4) NOT NULL default '',
  `seed` int(11) NOT NULL default '0',
  `region_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`region_id`,`seed`,`year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `bracket`
-- 

INSERT INTO `bracket` (`team_id`, `wins`, `losses`, `year`, `seed`, `region_id`) VALUES 
(356, 0, 0, '2005', 1, 1),
(96, 0, 0, '2003', 1, 1),
(85, 0, 0, '2003', 16, 1),
(2483, 0, 0, '2003', 8, 1),
(254, 0, 0, '2003', 9, 1),
(275, 0, 0, '2003', 5, 1),
(2692, 0, 0, '2003', 12, 1),
(2168, 0, 0, '2003', 4, 1),
(202, 0, 0, '2003', 13, 1),
(142, 0, 0, '2003', 6, 1),
(79, 0, 0, '2003', 11, 1),
(269, 0, 0, '2003', 3, 1),
(107, 0, 0, '2003', 14, 1),
(84, 0, 0, '2003', 7, 1),
(333, 0, 0, '2003', 10, 1),
(221, 0, 0, '2003', 2, 1),
(2681, 0, 0, '2003', 15, 1),
(12, 0, 0, '2003', 1, 2),
(261, 0, 0, '2003', 16, 2),
(2132, 0, 0, '2003', 8, 2),
(2250, 0, 0, '2003', 9, 2),
(87, 0, 0, '2003', 5, 2),
(270, 0, 0, '2003', 12, 2),
(356, 0, 0, '2003', 4, 2),
(98, 0, 0, '2003', 13, 2),
(156, 0, 0, '2003', 6, 2),
(2117, 0, 0, '2003', 11, 2),
(150, 0, 0, '2003', 3, 2),
(36, 0, 0, '2003', 14, 2),
(235, 0, 0, '2003', 7, 2),
(9, 0, 0, '2003', 10, 2),
(2305, 0, 0, '2003', 2, 2),
(328, 0, 0, '2003', 15, 2),
(251, 0, 0, '2003', 1, 3),
(2427, 0, 0, '2003', 16, 3),
(99, 0, 0, '2003', 8, 3),
(2509, 0, 0, '2003', 9, 3),
(41, 0, 0, '2003', 5, 3),
(252, 0, 0, '2003', 12, 3),
(24, 0, 0, '2003', 4, 3),
(301, 0, 0, '2003', 13, 3),
(120, 0, 0, '2003', 6, 3),
(350, 0, 0, '2003', 11, 3),
(2752, 0, 0, '2003', 3, 3),
(2653, 0, 0, '2003', 14, 3),
(127, 0, 0, '2003', 7, 3),
(38, 0, 0, '2003', 10, 3),
(57, 0, 0, '2003', 2, 3),
(2534, 0, 0, '2003', 15, 3),
(201, 0, 0, '2003', 1, 4),
(2569, 0, 0, '2003', 16, 4),
(25, 0, 0, '2003', 8, 4),
(152, 0, 0, '2003', 9, 4),
(344, 0, 0, '2003', 5, 4),
(2086, 0, 0, '2003', 12, 4),
(97, 0, 0, '2003', 4, 4),
(2046, 0, 0, '2003', 13, 4),
(197, 0, 0, '2003', 6, 4),
(219, 0, 0, '2003', 11, 4),
(183, 0, 0, '2003', 3, 4),
(2363, 0, 0, '2003', 14, 4),
(2603, 0, 0, '2003', 7, 4),
(2, 0, 0, '2003', 10, 4),
(154, 0, 0, '2003', 2, 4),
(2193, 0, 0, '2003', 15, 4),
(161, 0, 0, '2005', 16, 1),
(251, 0, 0, '2005', 8, 1),
(2440, 0, 0, '2005', 9, 1),
(333, 0, 0, '2005', 5, 1),
(270, 0, 0, '2005', 12, 1),
(103, 0, 0, '2005', 4, 1),
(219, 0, 0, '2005', 13, 1),
(99, 0, 0, '2005', 6, 1),
(5, 0, 0, '2005', 11, 1),
(12, 0, 0, '2005', 3, 1),
(328, 0, 0, '2005', 14, 1),
(79, 0, 0, '2005', 7, 1),
(2608, 0, 0, '2005', 10, 1),
(197, 0, 0, '2005', 2, 1),
(2545, 0, 0, '2005', 15, 1),
(264, 0, 0, '2005', 1, 2),
(149, 0, 0, '2005', 16, 2),
(279, 0, 0, '2005', 8, 2),
(221, 0, 0, '2005', 9, 2),
(59, 0, 0, '2005', 5, 2),
(45, 0, 0, '2005', 12, 2),
(97, 0, 0, '2005', 4, 2),
(322, 0, 0, '2005', 13, 2),
(2641, 0, 0, '2005', 6, 2),
(26, 0, 0, '2005', 11, 2),
(2250, 0, 0, '2005', 3, 2),
(2737, 0, 0, '2005', 14, 2),
(277, 0, 0, '2005', 7, 2),
(156, 0, 0, '2005', 10, 2),
(154, 0, 0, '2005', 2, 2),
(236, 0, 0, '2005', 15, 2),
(153, 0, 0, '2005', 1, 3),
(2473, 0, 0, '2005', 16, 3),
(135, 0, 0, '2005', 8, 3),
(66, 0, 0, '2005', 9, 3),
(222, 0, 0, '2005', 5, 3),
(167, 0, 0, '2005', 12, 3),
(57, 0, 0, '2005', 4, 3),
(195, 0, 0, '2005', 13, 3),
(275, 0, 0, '2005', 6, 3),
(2460, 0, 0, '2005', 11, 3),
(2305, 0, 0, '2005', 3, 3),
(2083, 0, 0, '2005', 14, 3),
(2429, 0, 0, '2005', 7, 3),
(152, 0, 0, '2005', 10, 3),
(41, 0, 0, '2005', 2, 3),
(2116, 0, 0, '2005', 15, 3),
(150, 0, 0, '2005', 1, 4),
(2169, 0, 0, '2005', 16, 4),
(24, 0, 0, '2005', 8, 4),
(344, 0, 0, '2005', 9, 4),
(127, 0, 0, '2005', 5, 4),
(295, 0, 0, '2005', 12, 4),
(183, 0, 0, '2005', 4, 4),
(261, 0, 0, '2005', 13, 4),
(254, 0, 0, '2005', 6, 4),
(2638, 0, 0, '2005', 11, 4),
(201, 0, 0, '2005', 3, 4),
(315, 0, 0, '2005', 14, 4),
(2132, 0, 0, '2005', 7, 4),
(2294, 0, 0, '2005', 10, 4),
(96, 0, 0, '2005', 2, 4),
(2198, 0, 0, '2005', 15, 4);

-- --------------------------------------------------------

-- 
-- Table structure for table `bracket_results`
-- 

DROP TABLE IF EXISTS `bracket_results`;
CREATE TABLE `bracket_results` (
  `game_id` int(11) NOT NULL default '0',
  `year` char(4) NOT NULL default '',
  `winning_team_id` int(11) NOT NULL default '0',
  `losing_team_id` int(11) NOT NULL default '0',
  `winning_score` int(11) NOT NULL default '0',
  `losing_score` int(11) NOT NULL default '0',
  PRIMARY KEY  (`game_id`,`year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `bracket_results`
-- 

INSERT INTO `bracket_results` (`game_id`, `year`, `winning_team_id`, `losing_team_id`, `winning_score`, `losing_score`) VALUES 
(65, '2003', 96, 85, 95, 64),
(66, '2003', 254, 2483, 60, 58),
(67, '2003', 275, 2692, 81, 74),
(68, '2003', 202, 2168, 84, 71),
(69, '2003', 142, 79, 72, 71),
(70, '2003', 269, 107, 72, 68),
(71, '2003', 84, 333, 67, 62),
(72, '2003', 221, 2681, 87, 61),
(73, '2003', 12, 261, 80, 51),
(74, '2003', 2250, 2153, 74, 69),
(75, '2003', 87, 270, 70, 69),
(76, '2003', 356, 98, 65, 60),
(77, '2003', 2117, 156, 79, 73),
(78, '2003', 150, 36, 67, 57),
(79, '2003', 9, 235, 84, 71),
(80, '2003', 2305, 328, 64, 61),
(81, '2003', 251, 2427, 82, 61),
(82, '2003', 2509, 99, 80, 56),
(83, '2003', 41, 252, 58, 53),
(84, '2003', 24, 301, 77, 69),
(85, '2003', 120, 350, 75, 73),
(86, '2003', 2752, 2653, 71, 59),
(87, '2003', 127, 38, 79, 64),
(88, '2003', 57, 2534, 85, 55),
(89, '2003', 201, 2569, 71, 54),
(90, '2003', 25, 152, 76, 74),
(91, '2003', 2086, 344, 47, 46),
(92, '2003', 97, 2046, 86, 64),
(93, '2003', 197, 219, 77, 63),
(94, '2003', 183, 2363, 76, 65),
(95, '2003', 2, 2603, 65, 63),
(96, '2003', 154, 2193, 76, 73),
(98, '2003', 275, 202, 61, 60),
(99, '2003', 269, 142, 101, 92),
(101, '2003', 12, 2250, 96, 95),
(102, '2003', 87, 357, 68, 60),
(106, '2003', 41, 24, 85, 74),
(109, '2003', 201, 25, 74, 65);

-- --------------------------------------------------------

-- 
-- Table structure for table `conference`
-- 

DROP TABLE IF EXISTS `conference`;
CREATE TABLE `conference` (
  `id` int(11) NOT NULL default '0',
  `name` char(20) NOT NULL default '',
  `full_name` char(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `conference`
-- 

INSERT INTO `conference` (`id`, `name`, `full_name`) VALUES 
(1, 'Am. East', NULL),
(3, 'A 10', NULL),
(2, 'ACC', NULL),
(46, 'A-Sun', NULL),
(8, 'Big 12', NULL),
(4, 'Big East', NULL),
(5, 'Big Sky', NULL),
(6, 'B. South', NULL),
(7, 'Big Ten', NULL),
(9, 'B. West', NULL),
(10, 'CAA', NULL),
(11, 'CUSA', NULL),
(43, 'Indep.', NULL),
(45, 'Horizon', NULL),
(12, 'Ivy', NULL),
(13, 'MAAC', NULL),
(15, 'Mid-Con', NULL),
(14, 'MAC', NULL),
(16, 'MEAC', NULL),
(18, 'MVC', NULL),
(44, 'MWC', NULL),
(19, 'NEC', NULL),
(20, 'OVC', NULL),
(21, 'Pac-10', NULL),
(22, 'Patriot', NULL),
(23, 'SEC', NULL),
(24, 'Southern', NULL),
(25, 'Southland', NULL),
(26, 'SWAC', NULL),
(27, 'S. Belt', NULL),
(29, 'WCC', NULL),
(30, 'WAC', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `division`
-- 

DROP TABLE IF EXISTS `division`;
CREATE TABLE `division` (
  `id` int(11) NOT NULL default '0',
  `name` char(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `division`
-- 

INSERT INTO `division` (`id`, `name`) VALUES 
(3, 'East'),
(1, 'North'),
(2, 'South'),
(4, 'West'),
(5, 'American'),
(6, 'National');

-- --------------------------------------------------------

-- 
-- Table structure for table `game_flow`
-- 

DROP TABLE IF EXISTS `game_flow`;
CREATE TABLE `game_flow` (
  `game_id` int(11) NOT NULL default '0',
  `next_game_id` int(11) default NULL,
  PRIMARY KEY  (`game_id`),
  UNIQUE KEY `game_id` (`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `game_flow`
-- 

INSERT INTO `game_flow` (`game_id`, `next_game_id`) VALUES 
(1, 65),
(2, 65),
(3, 66),
(4, 66),
(5, 67),
(6, 67),
(7, 68),
(8, 68),
(9, 69),
(10, 69),
(11, 70),
(12, 70),
(13, 71),
(14, 71),
(15, 72),
(16, 72),
(17, 73),
(18, 73),
(19, 74),
(20, 74),
(21, 75),
(22, 75),
(23, 76),
(24, 76),
(25, 77),
(26, 77),
(27, 78),
(28, 78),
(29, 79),
(30, 79),
(31, 80),
(32, 80),
(33, 81),
(34, 81),
(35, 82),
(36, 82),
(37, 83),
(38, 83),
(39, 84),
(40, 84),
(41, 85),
(42, 85),
(43, 86),
(44, 86),
(45, 87),
(46, 87),
(47, 88),
(48, 88),
(49, 89),
(50, 89),
(51, 90),
(52, 90),
(53, 91),
(54, 91),
(55, 92),
(56, 92),
(57, 93),
(58, 93),
(59, 94),
(60, 94),
(61, 95),
(62, 95),
(63, 96),
(64, 96),
(65, 97),
(66, 97),
(67, 98),
(68, 98),
(69, 99),
(70, 99),
(71, 100),
(72, 100),
(73, 101),
(74, 101),
(75, 102),
(76, 102),
(77, 103),
(78, 103),
(79, 104),
(80, 104),
(81, 105),
(82, 105),
(83, 106),
(84, 106),
(85, 107),
(86, 107),
(87, 108),
(88, 108),
(89, 109),
(90, 109),
(91, 110),
(92, 110),
(93, 111),
(94, 111),
(95, 112),
(96, 112),
(97, 113),
(98, 113),
(99, 114),
(100, 114),
(101, 115),
(102, 115),
(103, 116),
(104, 116),
(105, 117),
(106, 117),
(107, 118),
(108, 118),
(109, 119),
(110, 119),
(111, 120),
(112, 120),
(113, 121),
(114, 121),
(115, 122),
(116, 122),
(117, 123),
(118, 123),
(119, 124),
(120, 124),
(121, 125),
(122, 125),
(123, 126),
(124, 126),
(125, 127),
(126, 127);

-- --------------------------------------------------------

-- 
-- Table structure for table `player_results`
-- 

DROP TABLE IF EXISTS `player_results`;
CREATE TABLE `player_results` (
  `year` varchar(4) NOT NULL default '',
  `user_id` varchar(40) NOT NULL default '',
  `game_id` int(11) NOT NULL default '0',
  `winning_team_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`year`,`user_id`,`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `player_results`
-- 

INSERT INTO `player_results` (`year`, `user_id`, `game_id`, `winning_team_id`) VALUES 
('2003', 'tim@iuhoops.com', 1, 96),
('2003', 'tim@iuhoops.com', 2, 2382),
('2003', 'tim@iuhoops.com', 3, 2382),
('2003', 'tim@iuhoops.com', 4, 202),
('2003', 'tim@iuhoops.com', 5, 142),
('2003', 'tim@iuhoops.com', 6, 269),
('2003', 'tim@iuhoops.com', 7, 84),
('2003', 'tim@iuhoops.com', 8, 221),
('2003', 'tim@iuhoops.com', 9, 12),
('2003', 'tim@iuhoops.com', 10, 2),
('2003', 'tim@iuhoops.com', 11, 87),
('2003', 'tim@iuhoops.com', 12, 356),
('2003', 'tim@iuhoops.com', 13, 2),
('2003', 'tim@iuhoops.com', 14, 150),
('2003', 'tim@iuhoops.com', 15, 9),
('2003', 'tim@iuhoops.com', 16, 2),
('2003', 'tim@iuhoops.com', 17, 251),
('2003', 'tim@iuhoops.com', 18, 2),
('2003', 'tim@iuhoops.com', 19, 41),
('2003', 'tim@iuhoops.com', 20, 24),
('2003', 'tim@iuhoops.com', 21, 120),
('2003', 'tim@iuhoops.com', 22, 2),
('2003', 'tim@iuhoops.com', 23, 127),
('2003', 'tim@iuhoops.com', 24, 57),
('2003', 'tim@iuhoops.com', 25, 201),
('2003', 'tim@iuhoops.com', 26, 25),
('2003', 'tim@iuhoops.com', 27, 2),
('2003', 'tim@iuhoops.com', 28, 97),
('2003', 'tim@iuhoops.com', 29, 197),
('2003', 'tim@iuhoops.com', 30, 183),
('2003', 'tim@iuhoops.com', 31, 2),
('2003', 'tim@iuhoops.com', 32, 154),
('2003', 'tim@iuhoops.com', 34, 275),
('2003', 'tim@iuhoops.com', 35, 269),
('2003', 'tim@iuhoops.com', 37, 12),
('2003', 'tim@iuhoops.com', 38, 87),
('2003', 'tim@iuhoops.com', 42, 41),
('2003', 'tim@iuhoops.com', 45, 201),
('2003', 'tim@iuhoops.com', 33, 96);

-- --------------------------------------------------------

-- 
-- Table structure for table `region`
-- 

DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
  `id` int(11) NOT NULL default '0',
  `name` char(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `region`
-- 

INSERT INTO `region` (`id`, `name`) VALUES 
(4, 'East'),
(1, 'Midwest'),
(3, 'South'),
(2, 'West');

-- --------------------------------------------------------

-- 
-- Table structure for table `sys___datatypes`
-- 

DROP TABLE IF EXISTS `sys___datatypes`;
CREATE TABLE `sys___datatypes` (
  `Name` varchar(64) NOT NULL default '',
  `DataType` enum('bigint','blob','char','date','datetime','decimal','double','enum','float','int','integer','longblob','longtext','mediumblob','mediumint','mediumtext','numeric','real','set','smallint','text','time','timestamp','tinyblob','tinyint','tinytext','varchar') NOT NULL default 'int',
  `Length` int(11) unsigned NOT NULL default '0',
  `Decimals` int(11) unsigned NOT NULL default '0',
  `AutoIncrement` enum('N','Y') NOT NULL default 'N',
  `Unsigned` enum('N','Y') NOT NULL default 'N',
  `Zerofill` enum('N','Y') NOT NULL default 'N',
  `Binary` enum('N','Y') NOT NULL default 'N',
  `NotNull` enum('N','Y') NOT NULL default 'N',
  `PrimaryKey` enum('N','Y') NOT NULL default 'N',
  `Unique` enum('N','Y') NOT NULL default 'N',
  `StartValue` int(11) NOT NULL default '0',
  `Default` tinytext,
  `Items` tinytext,
  `creator` varchar(64) NOT NULL default '',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(64) NOT NULL default '',
  `edit_date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- 
-- Dumping data for table `sys___datatypes`
-- 

INSERT INTO `sys___datatypes` (`Name`, `DataType`, `Length`, `Decimals`, `AutoIncrement`, `Unsigned`, `Zerofill`, `Binary`, `NotNull`, `PrimaryKey`, `Unique`, `StartValue`, `Default`, `Items`, `creator`, `create_date`, `editor`, `edit_date`) VALUES 
('Boolean', 'enum', 0, 0, 'N', 'N', 'N', 'N', 'Y', 'N', 'N', 0, 'N', '''N'',''Y''', 'root@localhost', '2003-03-18 20:54:08', 'root@localhost', '2003-03-18 20:54:08'),
('AutoNumber', 'int', 11, 0, 'Y', 'N', 'N', 'N', 'Y', 'Y', 'N', 0, NULL, NULL, 'root@localhost', '2003-03-18 20:54:08', 'root@localhost', '2003-03-18 20:54:08');

-- --------------------------------------------------------

-- 
-- Table structure for table `sys___diagrams`
-- 

DROP TABLE IF EXISTS `sys___diagrams`;
CREATE TABLE `sys___diagrams` (
  `ID` int(11) NOT NULL auto_increment,
  `name` char(64) NOT NULL default '',
  `creator` char(64) NOT NULL default '',
  `create_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` char(64) NOT NULL default '',
  `edit_date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `SYS___DIAGRAMS_NAME` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `sys___diagrams`
-- 

INSERT INTO `sys___diagrams` (`ID`, `name`, `creator`, `create_date`, `editor`, `edit_date`) VALUES 
(1, 'bracket schema', 'root@localhost', '2003-03-18 20:54:16', 'root@localhost', '2003-03-18 20:54:16');

-- --------------------------------------------------------

-- 
-- Table structure for table `sys___options`
-- 

DROP TABLE IF EXISTS `sys___options`;
CREATE TABLE `sys___options` (
  `version` int(11) NOT NULL default '0',
  PRIMARY KEY  (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- 
-- Dumping data for table `sys___options`
-- 

INSERT INTO `sys___options` (`version`) VALUES 
(2);

-- --------------------------------------------------------

-- 
-- Table structure for table `sys___tables`
-- 

DROP TABLE IF EXISTS `sys___tables`;
CREATE TABLE `sys___tables` (
  `name` char(64) NOT NULL default '',
  `DiagramID` int(11) NOT NULL default '0',
  `r_top` int(11) NOT NULL default '0',
  `r_left` int(11) NOT NULL default '0',
  `r_width` int(11) NOT NULL default '0',
  `r_height` int(11) NOT NULL default '0',
  `visible` tinyint(4) NOT NULL default '0',
  `options` int(11) NOT NULL default '0',
  PRIMARY KEY  (`name`,`DiagramID`),
  KEY `sys___tables_name` (`name`),
  KEY `sys_tables_diagram` (`DiagramID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- 
-- Dumping data for table `sys___tables`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `team`
-- 

DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `id` int(11) NOT NULL default '0',
  `name` char(30) NOT NULL default '',
  `conference_id` int(11) NOT NULL default '0',
  `division_id` int(11) default NULL,
  PRIMARY KEY  (`id`,`conference_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `team`
-- 

INSERT INTO `team` (`id`, `name`, `conference_id`, `division_id`) VALUES 
(104, 'Boston U.', 1, NULL),
(261, 'Vermont', 1, NULL),
(42, 'Hartford', 1, NULL),
(2066, 'Binghamton', 1, NULL),
(111, 'Northeastern', 1, NULL),
(311, 'Maine', 1, NULL),
(2619, 'Stony Brook', 1, NULL),
(399, 'Albany', 1, NULL),
(160, 'New Hampshire', 1, NULL),
(154, 'Wake Forest', 2, NULL),
(150, 'Duke', 2, NULL),
(120, 'Maryland', 2, NULL),
(152, 'N.C. State', 2, NULL),
(59, 'Georgia Tech', 2, NULL),
(153, 'North Carolina', 2, NULL),
(258, 'Virginia', 2, NULL),
(228, 'Clemson', 2, NULL),
(52, 'Florida State', 2, NULL),
(2603, 'St. Joseph''s', 3, 3),
(227, 'Rhode Island', 3, 3),
(218, 'Temple', 3, 3),
(113, 'Massachusetts', 3, 3),
(2230, 'Fordham', 3, 3),
(179, 'St. Bonaventure', 3, 3),
(2752, 'Xavier', 3, 4),
(2168, 'Dayton', 3, 4),
(257, 'Richmond', 3, 4),
(2325, 'La Salle', 3, 4),
(45, 'Geo Washington', 3, 4),
(2184, 'Duquesne', 3, 4),
(2653, 'Troy State', 46, NULL),
(2382, 'Mercer', 46, NULL),
(2057, 'Belmont', 46, NULL),
(2116, 'Central Florida', 46, NULL),
(55, 'Jacksonville St.', 46, NULL),
(2535, 'Samford', 46, NULL),
(2247, 'Georgia St', 46, NULL),
(294, 'Jacksonville', 46, NULL),
(56, 'Stetson', 46, NULL),
(2226, 'Fla Atlantic', 46, NULL),
(2241, 'Gardner Webb', 46, NULL),
(2097, 'Campbell', 46, NULL),
(2305, 'Kansas', 8, NULL),
(251, 'Texas', 8, NULL),
(201, 'Oklahoma', 8, NULL),
(197, 'Oklahoma State', 8, NULL),
(142, 'Missouri', 8, NULL),
(38, 'Colorado', 8, NULL),
(2641, 'Texas Tech', 8, NULL),
(245, 'Texas A&M', 8, NULL),
(66, 'Iowa State', 8, NULL),
(239, 'Baylor', 8, NULL),
(2306, 'Kansas State', 8, NULL),
(158, 'Nebraska', 8, NULL),
(41, 'Connecticut', 4, 3),
(103, 'Boston College', 4, 3),
(2507, 'Providence', 4, 3),
(222, 'Villanova', 4, 3),
(2599, 'St. John''s', 4, 3),
(2390, 'Miami', 4, 3),
(259, 'Virginia Tech', 4, 3),
(221, 'Pittsburgh', 4, 4),
(183, 'Syracuse', 4, 4),
(87, 'Notre Dame', 4, 4),
(2550, 'Seton Hall', 4, 4),
(46, 'Georgetown', 4, 4),
(277, 'West Virginia', 4, 4),
(164, 'Rutgers', 4, 4),
(2692, 'Weber State', 5, NULL),
(331, 'Eastern Wash.', 5, NULL),
(304, 'Idaho State', 5, NULL),
(149, 'Montana', 5, NULL),
(2464, 'Northern Arizona', 5, NULL),
(16, 'Sacramento State', 5, NULL),
(147, 'Montana State', 5, NULL),
(2502, 'Portland State', 5, NULL),
(2737, 'Winthrop', 6, NULL),
(2127, 'Char. Southern', 6, NULL),
(2335, 'Liberty', 6, NULL),
(2210, 'Elon University', 6, NULL),
(2427, 'NC Asheville', 6, NULL),
(2515, 'Radford', 6, NULL),
(324, 'Coast Carolina', 6, NULL),
(2272, 'High Point', 6, NULL),
(3, 'Birmingham Sou', 6, NULL),
(275, 'Wisconsin', 7, NULL),
(356, 'Illinois', 7, NULL),
(2509, 'Purdue', 7, NULL),
(127, 'Michigan State', 7, NULL),
(130, 'Michigan', 7, NULL),
(84, 'Indiana', 7, NULL),
(135, 'Minnesota', 7, NULL),
(194, 'Ohio State', 7, NULL),
(2294, 'Iowa', 7, NULL),
(77, 'Northwestern', 7, NULL),
(213, 'Penn State', 7, NULL),
(2540, 'Santa Barbara', 9, NULL),
(300, 'UC Irvine', 9, NULL),
(328, 'Utah State', 9, NULL),
(13, 'Cal Poly', 9, NULL),
(70, 'Idaho', 9, NULL),
(2463, 'CS-Northridge', 9, NULL),
(2239, 'Fullerton State', 9, NULL),
(279, 'U of the Pacific', 9, NULL),
(27, 'UC Riverside', 9, NULL),
(299, 'Long Beach State', 9, NULL),
(350, 'NC Wilmington', 10, NULL),
(2670, 'VA Commonwealth', 10, NULL),
(2182, 'Drexel', 10, NULL),
(2244, 'George Mason', 10, NULL),
(48, 'Delaware', 10, NULL),
(295, 'Old Dominion', 10, NULL),
(256, 'James Madison', 10, NULL),
(2729, 'William & Mary', 10, NULL),
(2275, 'Hofstra', 10, NULL),
(119, 'Towson', 10, NULL),
(278, 'Fresno State', 30, NULL),
(202, 'Tulsa', 30, NULL),
(242, 'Rice', 30, NULL),
(2440, 'Nevada', 30, NULL),
(2567, 'SMU', 30, NULL),
(62, 'Hawaii', 30, NULL),
(2348, 'Louisiana Tech', 30, NULL),
(68, 'Boise State', 30, NULL),
(23, 'San Jose State', 30, NULL),
(2638, 'UTEP', 30, NULL),
(269, 'Marquette', 11, 5),
(97, 'Louisville', 11, 5),
(2132, 'Cincinnati', 11, 5),
(139, 'St. Louis', 11, 5),
(305, 'DePaul', 11, 5),
(2429, 'Charlotte', 11, 5),
(151, 'East Carolina', 11, 5),
(235, 'Memphis', 11, 6),
(5, 'UAB', 11, 6),
(2655, 'Tulane', 11, 6),
(58, 'South Florida', 11, 6),
(248, 'Houston', 11, 6),
(2572, 'Southern Miss', 11, 6),
(2628, 'TCU', 11, 6),
(2113, 'Centenary', 43, NULL),
(357, 'TX A&M Corp Chris', 43, NULL),
(292, 'Tx Pan American', 43, NULL),
(2870, 'IPFW', 43, NULL),
(288, 'David Lipscomb', 43, NULL),
(2417, 'Morris Brown', 43, NULL),
(2086, 'Butler', 45, NULL),
(270, 'Wisc. Milwaukee', 45, NULL),
(82, 'Illinois (Chi.)', 45, NULL),
(2174, 'Detroit', 45, NULL),
(2350, 'Loyola Chi', 45, NULL),
(2750, 'Wright St', 45, NULL),
(2739, 'Wisc. Green Bay', 45, NULL),
(2754, 'Youngstown State', 45, NULL),
(325, 'Cleveland St.', 45, NULL),
(2542, 'Savannah State', 43, NULL),
(219, 'Pennsylvania', 12, NULL),
(225, 'Brown', 12, NULL),
(163, 'Princeton', 12, NULL),
(43, 'Yale', 12, NULL),
(108, 'Harvard', 12, NULL),
(172, 'Cornell', 12, NULL),
(159, 'Dartmouth', 12, NULL),
(171, 'Columbia', 12, NULL),
(2363, 'Manhattan', 13, NULL),
(2217, 'Fairfield', 13, NULL),
(2561, 'Siena', 13, NULL),
(315, 'Niagara', 13, NULL),
(314, 'Iona', 13, NULL),
(2368, 'Marist', 13, NULL),
(2520, 'Rider', 13, NULL),
(2099, 'Canisius', 13, NULL),
(2612, 'St. Peter''s', 13, NULL),
(2352, 'Loyola MD', 13, NULL),
(2309, 'Kent State', 14, 3),
(193, 'Miami (OHIO)', 14, 3),
(2006, 'Akron', 14, 3),
(276, 'Marshall', 14, 3),
(195, 'Ohio', 14, 3),
(2084, 'Buffalo', 14, 3),
(2117, 'Central Michigan', 14, 4),
(2459, 'Northern Illinois', 14, 4),
(2711, 'Western Michigan', 14, 4),
(2199, 'Eastern Michigan', 14, 4),
(189, 'Bowling Green', 14, 4),
(2050, 'Ball State', 14, 4),
(2649, 'Toledo', 14, 4),
(79, 'Southern Illinois', 18, NULL),
(156, 'Creighton', 18, NULL),
(2724, 'Wichita State', 18, NULL),
(2623, 'SMS', 18, NULL),
(339, 'Evansville', 18, NULL),
(71, 'Bradley', 18, NULL),
(2460, 'Northern Iowa', 18, NULL),
(2181, 'Drake', 18, NULL),
(2287, 'Illinois State', 18, NULL),
(282, 'Indiana State', 18, NULL),
(2681, 'Wagner', 19, NULL),
(2405, 'Monmouth (N.J.)', 19, NULL),
(2115, 'Central Conn.', 19, NULL),
(2514, 'Quinnipiac', 19, NULL),
(2598, 'St. Francis (PA)', 19, NULL),
(161, 'Fair Dickinson', 19, NULL),
(2597, 'St. Francis (NY)', 19, NULL),
(2523, 'Robert Morris', 19, NULL),
(2341, 'LIU Brooklyn', 19, NULL),
(116, 'Mt. St. Marys', 19, NULL),
(2529, 'Sacred Heart', 19, NULL),
(2378, 'MD Baltimore Co', 19, NULL),
(2046, 'Austin Peay', 20, NULL),
(2413, 'Morehead State', 20, NULL),
(2635, 'Tennessee Tech', 20, NULL),
(93, 'Murray State', 20, NULL),
(2197, 'Eastern Illinois', 20, NULL),
(2630, 'Tenn. Martin', 20, NULL),
(2198, 'Eastern Kentucky', 20, NULL),
(2546, 'SE Missouri State', 20, NULL),
(2634, 'Tennessee State', 20, NULL),
(12, 'Arizona', 21, NULL),
(24, 'Stanford', 21, NULL),
(25, 'California', 21, NULL),
(9, 'Arizona State', 21, NULL),
(2483, 'Oregon', 21, NULL),
(204, 'Oregon State', 21, NULL),
(30, 'USC', 21, NULL),
(26, 'UCLA', 21, NULL),
(264, 'Washington', 21, NULL),
(265, 'Washington State', 21, NULL),
(107, 'Holy Cross', 22, NULL),
(44, 'American', 22, NULL),
(2142, 'Colgate', 22, NULL),
(2329, 'Lehigh', 22, NULL),
(2083, 'Bucknell', 22, NULL),
(322, 'Lafayette', 22, NULL),
(2426, 'Navy', 22, NULL),
(349, 'Army', 22, NULL),
(96, 'Kentucky', 23, 3),
(57, 'Florida', 23, 3),
(61, 'Georgia', 23, 3),
(2633, 'Tennessee', 23, 3),
(2579, 'South Carolina', 23, 3),
(238, 'Vanderbilt', 23, 3),
(344, 'Mississippi St.', 23, 4),
(99, 'LSU', 23, 4),
(2, 'Auburn', 23, 4),
(333, 'Alabama', 23, 4),
(145, 'Mississippi', 23, 4),
(8, 'Arkansas', 23, 4),
(2193, 'East Tenn. St.', 24, 1),
(2026, 'Appalachian St.', 24, 1),
(2166, 'Davidson', 24, 1),
(2717, 'Western Carolina', 24, 1),
(2678, 'VMI', 24, 1),
(2430, 'NC Greensboro', 24, 1),
(232, 'Coll Of Charltn', 24, 2),
(236, 'UT-Chattanooga', 24, 2),
(290, 'Georgia Southern', 24, 2),
(2747, 'Wofford', 24, 2),
(231, 'Furman', 24, 2),
(2643, 'The Citadel', 24, 2),
(2534, 'Sam Houston St.', 25, NULL),
(2617, 'Stephen F. Austin', 25, NULL),
(250, 'Texas Arlington', 25, NULL),
(326, 'SW Texas State', 25, NULL),
(2377, 'McNeese State', 25, NULL),
(2320, 'Lamar', 25, NULL),
(2433, 'Louisiana Monroe', 25, NULL),
(2545, 'SE Louisiana', 25, NULL),
(2636, 'Tex San Antonio', 25, NULL),
(2466, 'Northwestern St.', 25, NULL),
(2447, 'Nicholls State', 25, NULL),
(2504, 'Prairie View', 26, NULL),
(2400, 'Miss. Valley St.', 26, NULL),
(2640, 'Texas Southern', 26, NULL),
(2011, 'Alabama State', 26, NULL),
(2016, 'Alcorn State', 26, NULL),
(2755, 'Grambling', 26, NULL),
(2296, 'Jackson State', 26, NULL),
(2582, 'Southern', 26, NULL),
(2010, 'Alabama A&M', 26, NULL),
(2029, 'Ark Pine Bluff', 26, NULL),
(98, 'Western Kentucky', 27, 3),
(2393, 'Middle Tenn. St.', 27, 3),
(2031, 'Arkansas LR', 27, 3),
(2032, 'Arkansas State', 27, 3),
(2229, 'Florida Intl', 27, 3),
(309, 'La Lafayette', 27, 4),
(166, 'New Mexico State', 27, 4),
(2172, 'Denver', 27, 4),
(2443, 'New Orleans', 27, 4),
(6, 'South Alabama', 27, 4),
(249, 'North Texas', 27, 4),
(2250, 'Gonzaga', 29, NULL),
(301, 'San Diego', 29, NULL),
(2539, 'San Francisco', 29, NULL),
(2492, 'Pepperdine', 29, NULL),
(2608, 'St. Mary''s (CA)', 29, NULL),
(2541, 'Santa Clara', 29, NULL),
(2501, 'Portland', 29, NULL),
(2351, 'Loyola Marymnt', 29, NULL),
(2674, 'Valparaiso', 15, NULL),
(2473, 'Oakland', 15, NULL),
(85, 'IUPUI', 15, NULL),
(198, 'Oral Roberts', 15, NULL),
(140, 'UMKC', 15, NULL),
(253, 'Southern Utah', 15, NULL),
(2710, 'Western Illinois', 15, NULL),
(2130, 'Chicago St', 15, NULL),
(254, 'Utah', 44, NULL),
(252, 'BYU', 44, NULL),
(2439, 'UNLV', 44, NULL),
(2751, 'Wyoming', 44, NULL),
(21, 'San Diego State', 44, NULL),
(36, 'Colorado State', 44, NULL),
(167, 'New Mexico', 44, NULL),
(2005, 'Air Force', 44, NULL),
(2569, 'South Carolina St', 16, NULL),
(2261, 'Hampton', 16, NULL),
(2169, 'Delaware State', 16, NULL),
(50, 'Florida A&M', 16, NULL),
(2154, 'Coppin St', 16, NULL),
(2450, 'Norfolk State', 16, NULL),
(47, 'Howard', 16, NULL),
(2415, 'Morgan State', 16, NULL),
(2065, 'Bethune Cookman', 16, NULL),
(2379, 'MD Eastern Shore', 16, NULL),
(2448, 'N. Carolina A&T', 16, NULL);
