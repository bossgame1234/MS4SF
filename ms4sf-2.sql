-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2016 at 05:11 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ms4sf`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `weather` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pictureDist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `description`, `date`, `time`, `weather`, `pictureDist`, `plant_id`, `created_at`, `updated_at`) VALUES
(79, 'Tilling Ground', '2015-10-22', '16:00:03', 'few clouds', 'temp/tilling.jpg', 187, '2015-10-21 18:27:17', '2015-10-21 18:27:18'),
(80, 'Watering potato and Fertilizing', '2015-10-22', '17:27:49', 'few clouds', 'temp/watering.jpg', 187, '2015-10-21 18:29:34', '2015-10-21 18:29:35'),
(82, 'dd', '2015-10-22', '03:14:18', 'overcast clouds', '', 186, '2015-10-21 20:14:28', '2015-10-21 20:14:28'),
(84, 'havesting', '2015-10-21', '08:00:00', 'Cloud', 'temp/b1.jpg', 201, '2015-10-24 11:19:10', '2015-10-28 06:21:26'),
(88, 'Water Tomoto', '2015-10-21', '10:00:00', 'Cloud', 'temp/watering.jpg', 202, '2015-10-24 14:43:45', '2015-10-28 06:23:06'),
(89, 'Water and pruning Cabbage', '2015-10-27', '16:00:00', 'broken clouds', '', 203, '2015-10-24 14:45:32', '2015-10-24 14:45:32'),
(91, 'dd', '2015-10-27', '00:38:46', 'broken clouds', 'temp/Activity.PNG', 187, '2015-10-26 17:39:04', '2015-10-26 17:39:04'),
(92, '1234', '2015-10-27', '17:36:59', 'overcast clouds', '', 187, '2015-10-27 10:37:12', '2015-10-27 10:37:12'),
(99, 'Testing the sensing device', '2015-09-01', '16:22:00', 'few clouds', 'temp/12179520_1032687036788977_1537576422_n.jpg', 202, '2015-10-27 15:23:57', '2015-10-27 15:23:58'),
(101, 'let it grow ~~~', '2015-10-02', '22:45:47', 'few clouds', 'temp/fertilizeveggie.jpg', 202, '2015-10-27 15:46:55', '2015-10-28 08:49:28'),
(102, 'Yuuu', '2015-10-15', '00:45:06', 'Sky is Clear', 'temp/image.jpg', 186, '2015-10-27 17:48:14', '2015-10-27 17:48:15'),
(103, 'Test', '2015-10-28', '14:02:53', 'few clouds', '', 187, '2015-10-28 07:03:04', '2015-10-28 07:03:04'),
(104, 'กก', '2015-10-28', '14:04:03', 'few clouds', '', 199, '2015-10-28 07:04:14', '2015-10-28 07:04:14'),
(107, 'Test', '2015-10-28', '15:36:00', 'scattered clouds', 'temp/b2.jpg', 203, '2015-10-28 08:37:44', '2015-10-28 08:37:44'),
(109, 'til the land', '2015-01-01', '15:45:28', 'scattered clouds', 'temp/tilling.jpg', 202, '2015-10-28 08:46:45', '2015-10-28 08:46:46'),
(110, 'plant seeds', '2015-02-01', '15:47:51', 'scattered clouds', 'temp/planting seed.jpg', 202, '2015-10-28 08:48:19', '2015-10-28 08:48:21'),
(111, 'เด็กน้อยปลูกผัก', '2015-07-06', '15:50:39', 'scattered clouds', 'temp/planting.jpg', 203, '2015-10-28 08:52:16', '2015-10-28 08:52:18'),
(112, 'อา แค เหราะ มา ฝะ', '2015-10-28', '17:04:29', 'scattered clouds', 'temp/harvestcarrot.jpg', 204, '2015-10-28 10:04:50', '2015-10-28 10:04:51'),
(113, 'Test', '2015-11-08', '15:56:59', 'Test', 'temp/Capture.PNG', 205, '2015-11-08 08:57:21', '2015-11-08 08:57:21'),
(114, 'test', '2015-11-09', '18:28:49', 'few clouds', '', 205, '2015-11-09 11:29:35', '2015-11-09 11:29:35'),
(115, 'Test', '2015-11-09', '18:35:51', 'few clouds', '', 205, '2015-11-09 11:36:20', '2015-11-09 11:36:20'),
(116, 'Testtttttttttttttttttt', '2015-11-09', '18:44:01', 'few clouds', '', 205, '2015-11-09 11:44:46', '2015-11-09 11:44:46'),
(118, '123456', '2015-11-09', '00:00:00', 'find', 'temp/AD4-05-02.jpg', 205, '2015-11-09 12:23:02', '2015-11-09 12:23:03'),
(149, 'Test', '2015-10-05', '00:00:00', 'few cloud', '', 274, '2015-12-15 13:18:58', '2015-12-15 13:18:58'),
(150, 'Test2', '2015-10-05', '00:00:00', 'rain', '', 274, '2015-12-15 13:18:58', '2015-12-15 13:18:58'),
(152, 'Test', '2015-10-05', '00:00:00', 'few cloud', '', 274, '2015-12-15 13:20:16', '2015-12-15 13:20:16'),
(153, 'Test2', '2015-10-05', '00:00:00', 'rain', '', 274, '2015-12-15 13:20:16', '2015-12-15 13:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `activitytype`
--

CREATE TABLE IF NOT EXISTS `activitytype` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitytype`
--

INSERT INTO `activitytype` (`id`, `name`) VALUES
(1, 'tilling'),
(2, 'planting'),
(3, 'pruning'),
(4, 'harvesting'),
(5, 'fertilizing'),
(6, 'watering'),
(7, 'scouting');

-- --------------------------------------------------------

--
-- Table structure for table `activity_activity_type`
--

CREATE TABLE IF NOT EXISTS `activity_activity_type` (
  `id` int(11) NOT NULL,
  `activity_type_id` int(10) NOT NULL,
  `activity_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_activity_type`
--

INSERT INTO `activity_activity_type` (`id`, `activity_type_id`, `activity_id`) VALUES
(1, 1, 79),
(16, 6, 82),
(17, 7, 82),
(43, 3, 89),
(46, 6, 89),
(62, 4, 90),
(63, 1, 91),
(64, 2, 91),
(65, 1, 92),
(66, 2, 92),
(67, 3, 92),
(68, 4, 92),
(69, 5, 92),
(70, 6, 92),
(71, 7, 92),
(83, 5, 80),
(84, 6, 80),
(95, 0, 99),
(96, 0, 99),
(97, 7, 99),
(105, 1, 102),
(106, 2, 102),
(107, 0, 102),
(108, 4, 102),
(109, 5, 102),
(122, 0, 88),
(123, 0, 88),
(124, 0, 88),
(125, 0, 88),
(126, 0, 88),
(127, 6, 88),
(128, 1, 84),
(129, 0, 84),
(130, 0, 84),
(131, 4, 84),
(132, 0, 105),
(133, 0, 105),
(134, 0, 105),
(135, 4, 105),
(136, 0, 106),
(137, 0, 106),
(138, 0, 106),
(139, 0, 106),
(140, 5, 106),
(141, 1, 107),
(142, 2, 107),
(147, 1, 109),
(148, 0, 109),
(149, 0, 109),
(150, 0, 109),
(151, 0, 110),
(152, 2, 110),
(153, 0, 101),
(154, 0, 101),
(155, 0, 101),
(156, 0, 101),
(157, 5, 101),
(158, 0, 111),
(159, 2, 111),
(160, 0, 111),
(161, 0, 111),
(162, 0, 111),
(163, 0, 112),
(164, 0, 112),
(165, 0, 112),
(166, 4, 112),
(167, 1, 113),
(168, 2, 113),
(169, 3, 113),
(170, 4, 113),
(171, 5, 113),
(172, 6, 113),
(173, 7, 113),
(174, 1, 114),
(175, 2, 114),
(176, 3, 114),
(177, 0, 115),
(178, 0, 115),
(179, 0, 115),
(180, 0, 115),
(181, 0, 115),
(182, 0, 115),
(183, 7, 115),
(184, 1, 116),
(185, 2, 116),
(186, 0, 116),
(187, 0, 116),
(188, 0, 116),
(189, 6, 116),
(190, 7, 116),
(198, 0, 118),
(199, 2, 118),
(200, 0, 118),
(201, 0, 118),
(202, 0, 118),
(203, 6, 118);

-- --------------------------------------------------------

--
-- Table structure for table `activity_type_task_list`
--

CREATE TABLE IF NOT EXISTS `activity_type_task_list` (
  `id` int(11) NOT NULL,
  `activity_type_id` int(11) NOT NULL,
  `task_list_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_type_task_list`
--

INSERT INTO `activity_type_task_list` (`id`, `activity_type_id`, `task_list_id`) VALUES
(1, 1, 8),
(207, 1, 103),
(208, 2, 103),
(209, 3, 103),
(216, 1, 104),
(217, 2, 104),
(218, 3, 104);

-- --------------------------------------------------------

--
-- Table structure for table `activity_user`
--

CREATE TABLE IF NOT EXISTS `activity_user` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `activity_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_user`
--

INSERT INTO `activity_user` (`id`, `user_id`, `activity_id`) VALUES
(1, 11, 79),
(2, 11, 80),
(4, 10, 82),
(6, 12, 84),
(10, 12, 88),
(11, 12, 89),
(12, 11, 90),
(13, 10, 91),
(14, 10, 92),
(16, 11, 99),
(18, 17, 101),
(19, 10, 102),
(20, 11, 103),
(21, 10, 104),
(23, 11, 106),
(24, 12, 107),
(26, 17, 109),
(27, 17, 110),
(28, 10, 111),
(29, 11, 112),
(30, 10, 113),
(31, 10, 114),
(32, 10, 115),
(33, 10, 116),
(35, 10, 118);

-- --------------------------------------------------------

--
-- Table structure for table `airhumidity`
--

CREATE TABLE IF NOT EXISTS `airhumidity` (
  `id` int(10) unsigned NOT NULL,
  `humidityPercentage` double(5,2) NOT NULL,
  `sensor_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=742 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airhumidity`
--

INSERT INTO `airhumidity` (`id`, `humidityPercentage`, `sensor_id`, `created_at`, `updated_at`) VALUES
(37, 999.99, 2, '2015-12-14 16:57:15', '2015-12-14 16:57:15'),
(740, 67.90, 3, '2016-02-13 07:31:08', '2016-02-13 07:31:08'),
(741, 67.90, 3, '2016-02-13 07:31:19', '2016-02-13 07:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE IF NOT EXISTS `daily` (
  `id` int(10) unsigned NOT NULL,
  `avgTemperature` double(6,2) NOT NULL,
  `minTemperature` double(6,2) NOT NULL,
  `maxTemperature` double(6,2) NOT NULL,
  `avgAirHumidity` double(6,2) NOT NULL,
  `minAirHumidity` double(6,2) NOT NULL,
  `maxAirHumidity` double(6,2) NOT NULL,
  `avgLight` double(7,2) NOT NULL,
  `minLight` double(7,2) NOT NULL,
  `maxLight` double(7,2) NOT NULL,
  `avgSoilMoisture` double(6,2) NOT NULL,
  `minSoilMoisture` double(6,2) NOT NULL,
  `maxSoilMoisture` double(6,2) NOT NULL,
  `sensor_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daily`
--

INSERT INTO `daily` (`id`, `avgTemperature`, `minTemperature`, `maxTemperature`, `avgAirHumidity`, `minAirHumidity`, `maxAirHumidity`, `avgLight`, `minLight`, `maxLight`, `avgSoilMoisture`, `minSoilMoisture`, `maxSoilMoisture`, `sensor_id`, `created_at`, `updated_at`) VALUES
(1, 25.00, 25.00, 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2, '2015-11-16 19:46:47', '2015-11-16 19:46:47'),
(2, 25.00, 25.00, 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2, '2015-11-16 19:49:16', '2015-11-16 19:49:16'),
(3, 25.00, 25.00, 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2, '2015-11-16 19:49:42', '2015-11-16 19:49:42'),
(4, 25.00, 25.00, 25.00, 999.99, 999.99, 999.99, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2, '2015-11-16 19:56:52', '2015-11-16 19:56:52'),
(5, 69.17, 25.00, 90.00, 208.33, 50.00, 999.99, 41.67, 0.00, 50.00, 41.67, 0.00, 50.00, 2, '2015-12-08 11:32:53', '2015-12-08 11:32:53'),
(6, 545.00, 90.00, 999.99, 525.00, 50.00, 999.99, 525.00, 50.00, 1000.00, 525.00, 50.00, 1000.00, 2, '2015-12-14 16:57:14', '2015-12-14 16:57:14'),
(103, 29.02, 28.89, 29.10, 67.25, 66.69, 67.40, 0.00, 0.00, 0.00, 306.33, 295.00, 321.00, 3, '2016-02-13 07:08:08', '2016-02-13 07:08:08'),
(104, 29.03, 29.00, 29.10, 67.26, 67.19, 67.30, 0.00, 0.00, 0.00, 304.67, 296.00, 312.00, 3, '2016-02-13 07:09:19', '2016-02-13 07:09:19'),
(105, 28.98, 28.89, 29.10, 66.97, 66.50, 67.19, 0.00, 0.00, 0.00, 305.00, 295.00, 314.00, 3, '2016-02-13 07:10:29', '2016-02-13 07:10:29'),
(106, 29.08, 29.00, 29.10, 67.19, 67.19, 67.19, 0.00, 0.00, 0.00, 306.33, 300.00, 311.00, 3, '2016-02-13 07:11:39', '2016-02-13 07:11:39'),
(107, 29.02, 28.89, 29.10, 67.55, 66.50, 67.90, 0.00, 0.00, 0.00, 308.50, 302.00, 320.00, 3, '2016-02-13 07:12:48', '2016-02-13 07:12:48'),
(108, 28.98, 28.89, 29.00, 67.41, 66.40, 67.90, 0.00, 0.00, 0.00, 310.00, 304.00, 319.00, 3, '2016-02-13 07:13:56', '2016-02-13 07:13:56'),
(109, 29.02, 29.00, 29.10, 67.63, 67.00, 67.90, 0.00, 0.00, 0.00, 303.33, 297.00, 310.00, 3, '2016-02-13 07:15:04', '2016-02-13 07:15:04'),
(110, 29.05, 29.00, 29.20, 67.12, 66.90, 67.90, 0.00, 0.00, 0.00, 305.50, 303.00, 311.00, 3, '2016-02-13 07:16:13', '2016-02-13 07:16:13'),
(111, 29.08, 29.00, 29.20, 66.93, 66.90, 67.00, 0.00, 0.00, 0.00, 304.50, 296.00, 317.00, 3, '2016-02-13 07:17:22', '2016-02-13 07:17:22'),
(112, 29.07, 29.00, 29.10, 66.85, 66.80, 66.90, 0.00, 0.00, 0.00, 309.67, 301.00, 324.00, 3, '2016-02-13 07:18:31', '2016-02-13 07:18:31'),
(113, 29.07, 29.00, 29.10, 66.90, 66.90, 66.90, 0.00, 0.00, 0.00, 304.50, 296.00, 318.00, 3, '2016-02-13 07:19:40', '2016-02-13 07:19:40'),
(114, 29.05, 29.00, 29.10, 66.92, 66.90, 67.00, 0.00, 0.00, 0.00, 307.33, 305.00, 311.00, 3, '2016-02-13 07:20:48', '2016-02-13 07:20:48'),
(115, 29.03, 29.00, 29.10, 67.45, 67.00, 67.90, 0.00, 0.00, 0.00, 305.00, 298.00, 311.00, 3, '2016-02-13 07:21:57', '2016-02-13 07:21:57'),
(116, 29.03, 29.00, 29.10, 67.78, 67.19, 67.90, 0.00, 0.00, 0.00, 306.33, 298.00, 310.00, 3, '2016-02-13 07:23:06', '2016-02-13 07:23:06'),
(117, 29.02, 29.00, 29.10, 67.55, 67.19, 67.90, 0.00, 0.00, 0.00, 307.33, 300.00, 314.00, 3, '2016-02-13 07:24:15', '2016-02-13 07:24:15'),
(118, 29.07, 29.00, 29.10, 67.19, 67.19, 67.19, 0.00, 0.00, 0.00, 303.67, 297.00, 312.00, 3, '2016-02-13 07:25:24', '2016-02-13 07:25:24'),
(119, 29.07, 29.00, 29.10, 67.21, 67.19, 67.30, 0.00, 0.00, 0.00, 307.33, 299.00, 314.00, 3, '2016-02-13 07:26:32', '2016-02-13 07:26:32'),
(120, 29.03, 29.00, 29.10, 67.26, 67.19, 67.30, 0.00, 0.00, 0.00, 308.17, 305.00, 311.00, 3, '2016-02-13 07:27:41', '2016-02-13 07:27:41'),
(121, 29.03, 28.89, 29.10, 67.13, 66.50, 67.30, 0.00, 0.00, 0.00, 306.00, 299.00, 312.00, 3, '2016-02-13 07:28:50', '2016-02-13 07:28:50'),
(122, 29.07, 29.00, 29.10, 67.30, 67.19, 67.40, 0.00, 0.00, 0.00, 306.67, 306.00, 308.00, 3, '2016-02-13 07:29:59', '2016-02-13 07:29:59'),
(123, 29.08, 29.00, 29.10, 67.31, 67.19, 67.90, 0.00, 0.00, 0.00, 304.50, 299.00, 313.00, 3, '2016-02-13 07:31:08', '2016-02-13 07:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE IF NOT EXISTS `farm` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double(9,6) NOT NULL,
  `longitude` double(9,6) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=418 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`id`, `name`, `latitude`, `longitude`, `address`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(235, 'd', -1.625758, 21.533203, '', '', '2015-10-21 12:46:57', '2015-10-28 08:22:40', '2015-10-28 08:22:40'),
(236, '44155615615156151561555555555555555555555555555555', 18.145852, 99.492188, '', '', '2015-10-21 13:22:37', '2015-10-28 08:50:17', '2015-10-28 08:50:17'),
(237, 'Farm', 15.798200, 100.566788, '', '', '2015-10-21 15:22:58', '2015-11-04 05:28:49', '2015-11-04 05:28:49'),
(238, 'Tenny''s Farm', 18.800474, 98.950507, '239 Huaykaew Rd., Suthep, Muang, Chiang Mai 50200', 'This is for testing the farm', '2015-10-24 10:23:33', '2015-11-05 11:08:57', NULL),
(239, 'Tennny’s Farm', 0.000000, 0.000000, '', '', '2015-10-24 10:23:58', '2015-10-28 08:28:32', NULL),
(244, 's', 0.000000, 0.000000, 'sdsd', 'dsdsd', '2015-11-05 11:11:03', '2015-11-05 11:11:12', '2015-11-05 11:11:12'),
(245, 'd', 17.662169, 97.976074, 'dsds', 'sdsds', '2015-11-05 11:12:31', '2015-11-05 11:12:40', '2015-11-05 11:12:40'),
(246, 'd', 18.965867, 98.833007, 'dd', 'dd', '2015-11-05 11:15:35', '2015-11-14 15:49:30', NULL),
(247, 'x', 0.000000, 0.000000, 'zx', 'x', '2015-11-06 11:03:55', '2015-11-06 11:04:07', '2015-11-06 11:04:07'),
(248, 'dcc', 0.000000, 0.000000, 'cscscscscsc', 'ccccsssssssssssssssssss', '2015-11-07 08:18:40', '2015-11-07 18:33:03', '2015-11-07 18:33:03'),
(249, '232', 999.999999, 999.999999, '32323', '323232', '2015-11-07 18:34:52', '2015-11-07 18:37:48', '2015-11-07 18:37:48'),
(250, 'ewew', 0.000000, 0.000000, 'wewe', 'ewe', '2015-11-07 18:36:11', '2015-11-07 18:36:22', '2015-11-07 18:36:22'),
(251, '12323', 0.000000, 0.000000, '', '', '2015-11-07 18:38:27', '2015-11-07 18:38:32', '2015-11-07 18:38:32'),
(252, '6', 0.000000, 0.000000, '', '', '2015-11-07 18:42:03', '2015-11-07 18:42:08', '2015-11-07 18:42:08'),
(253, '123', 0.000000, 0.000000, '', '', '2015-11-07 18:42:31', '2015-11-07 18:42:36', '2015-11-07 18:42:36'),
(254, '5323', 0.000000, 0.000000, '', '', '2015-11-07 18:44:19', '2015-11-07 18:44:23', '2015-11-07 18:44:23'),
(255, '32323', 0.000000, 0.000000, '', '', '2015-11-07 18:45:17', '2015-11-07 18:45:21', '2015-11-07 18:45:21'),
(256, 'est', 0.000000, 0.000000, '', '', '2015-11-07 18:45:49', '2015-11-07 18:45:53', '2015-11-07 18:45:53'),
(257, '123', 0.000000, 0.000000, '', '', '2015-11-07 18:49:23', '2015-11-07 18:49:29', '2015-11-07 18:49:29'),
(258, '12323', 0.000000, 0.000000, '23213', '232132', '2015-11-07 18:50:29', '2015-11-07 18:50:34', '2015-11-07 18:50:34'),
(259, '21321214', 0.000000, 0.000000, '', '', '2015-11-07 18:51:05', '2015-11-07 18:51:09', '2015-11-07 18:51:09'),
(260, '12323', 0.000000, 0.000000, '', '', '2015-11-07 18:53:27', '2015-11-07 18:53:31', '2015-11-07 18:53:31'),
(261, '123213213', 0.000000, 0.000000, '', '', '2015-11-07 18:54:07', '2015-11-07 18:54:12', '2015-11-07 18:54:12'),
(262, '2123', 0.000000, 0.000000, '', '', '2015-11-07 18:57:33', '2015-11-07 18:57:37', '2015-11-07 18:57:37'),
(263, '1232134', 0.000000, 0.000000, '', '', '2015-11-07 18:59:40', '2015-11-07 18:59:43', '2015-11-07 18:59:43'),
(332, 'TestActivityFarm', 18.800474, 98.950507, 'CAMT', 'TestActivityFarm', '2015-12-15 13:12:56', '2015-12-15 13:12:56', NULL),
(333, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:12:56', '2015-12-15 13:12:56', '2015-12-15 13:12:56'),
(334, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:18:59', '2015-12-15 13:18:59', '2015-12-15 13:18:59'),
(335, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:20:16', '2015-12-15 13:20:16', '2015-12-15 13:20:16'),
(336, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:20:26', '2015-12-15 13:20:26', '2015-12-15 13:20:26'),
(337, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:22:20', '2015-12-15 13:22:20', '2015-12-15 13:22:20'),
(338, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:22:47', '2015-12-15 13:22:47', '2015-12-15 13:22:47'),
(339, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:22:59', '2015-12-15 13:22:59', '2015-12-15 13:22:59'),
(340, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:23:24', '2015-12-15 13:23:24', '2015-12-15 13:23:24'),
(341, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:24:31', '2015-12-15 13:24:31', '2015-12-15 13:24:31'),
(342, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:26:04', '2015-12-15 13:26:04', '2015-12-15 13:26:04'),
(343, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:27:11', '2015-12-15 13:27:11', '2015-12-15 13:27:11'),
(344, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:29:38', '2015-12-15 13:29:38', '2015-12-15 13:29:38'),
(345, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:31:15', '2015-12-15 13:31:15', '2015-12-15 13:31:15'),
(346, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:31:38', '2015-12-15 13:31:38', '2015-12-15 13:31:38'),
(347, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:32:05', '2015-12-15 13:32:05', '2015-12-15 13:32:05'),
(348, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:39:44', '2015-12-15 13:39:44', '2015-12-15 13:39:44'),
(349, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:41:42', '2015-12-15 13:41:42', '2015-12-15 13:41:42'),
(350, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:42:40', '2015-12-15 13:42:40', '2015-12-15 13:42:40'),
(351, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:45:12', '2015-12-15 13:45:12', '2015-12-15 13:45:12'),
(352, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:45:35', '2015-12-15 13:45:35', '2015-12-15 13:45:35'),
(353, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:47:38', '2015-12-15 13:47:39', '2015-12-15 13:47:39'),
(354, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:49:14', '2015-12-15 13:49:14', '2015-12-15 13:49:14'),
(355, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 13:49:53', '2015-12-15 13:49:53', '2015-12-15 13:49:53'),
(356, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:00:38', '2015-12-15 14:00:38', '2015-12-15 14:00:38'),
(357, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:02:12', '2015-12-15 14:02:12', '2015-12-15 14:02:12'),
(358, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:03:03', '2015-12-15 14:03:04', '2015-12-15 14:03:04'),
(359, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:04:09', '2015-12-15 14:04:09', '2015-12-15 14:04:09'),
(360, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:05:28', '2015-12-15 14:05:28', '2015-12-15 14:05:28'),
(361, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:07:36', '2015-12-15 14:07:36', '2015-12-15 14:07:36'),
(362, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:08:33', '2015-12-15 14:08:33', '2015-12-15 14:08:33'),
(363, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:15:22', '2015-12-15 14:15:22', '2015-12-15 14:15:22'),
(364, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:16:59', '2015-12-15 14:16:59', '2015-12-15 14:16:59'),
(365, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:17:30', '2015-12-15 14:17:30', '2015-12-15 14:17:30'),
(366, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:18:23', '2015-12-15 14:18:24', '2015-12-15 14:18:24'),
(367, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:18:36', '2015-12-15 14:18:36', '2015-12-15 14:18:36'),
(368, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:18:48', '2015-12-15 14:18:48', '2015-12-15 14:18:48'),
(369, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:19:52', '2015-12-15 14:19:52', '2015-12-15 14:19:52'),
(370, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 14:21:33', '2015-12-15 14:21:33', '2015-12-15 14:21:33'),
(371, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:21:44', '2015-12-15 15:21:44', '2015-12-15 15:21:44'),
(372, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:24:10', '2015-12-15 15:24:10', '2015-12-15 15:24:10'),
(373, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:25:38', '2015-12-15 15:25:38', '2015-12-15 15:25:38'),
(374, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:26:54', '2015-12-15 15:26:54', '2015-12-15 15:26:54'),
(375, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:27:25', '2015-12-15 15:27:25', '2015-12-15 15:27:25'),
(376, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:35:11', '2015-12-15 15:35:11', '2015-12-15 15:35:11'),
(377, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:51:16', '2015-12-15 15:51:16', '2015-12-15 15:51:16'),
(378, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:52:24', '2015-12-15 15:52:24', '2015-12-15 15:52:24'),
(379, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:56:34', '2015-12-15 15:56:34', '2015-12-15 15:56:34'),
(380, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:57:51', '2015-12-15 15:57:51', '2015-12-15 15:57:51'),
(381, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 15:58:33', '2015-12-15 15:58:33', '2015-12-15 15:58:33'),
(382, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:02:02', '2015-12-15 16:02:03', '2015-12-15 16:02:03'),
(383, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:06:38', '2015-12-15 16:06:38', '2015-12-15 16:06:38'),
(384, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:08:17', '2015-12-15 16:08:17', '2015-12-15 16:08:17'),
(385, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:12:23', '2015-12-15 16:12:23', '2015-12-15 16:12:23'),
(386, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:17:31', '2015-12-15 16:17:31', '2015-12-15 16:17:31'),
(387, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:19:14', '2015-12-15 16:19:14', '2015-12-15 16:19:14'),
(388, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:19:37', '2015-12-15 16:19:37', '2015-12-15 16:19:37'),
(389, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:30:50', '2015-12-15 16:30:50', '2015-12-15 16:30:50'),
(390, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:37:43', '2015-12-15 16:37:43', '2015-12-15 16:37:43'),
(391, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:38:40', '2015-12-15 16:38:40', '2015-12-15 16:38:40'),
(392, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:39:19', '2015-12-15 16:39:19', '2015-12-15 16:39:19'),
(393, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:40:55', '2015-12-15 16:40:56', '2015-12-15 16:40:56'),
(394, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:41:34', '2015-12-15 16:41:34', '2015-12-15 16:41:34'),
(395, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:42:35', '2015-12-15 16:42:35', '2015-12-15 16:42:35'),
(396, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:43:18', '2015-12-15 16:43:19', '2015-12-15 16:43:19'),
(397, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:45:12', '2015-12-15 16:45:12', '2015-12-15 16:45:12'),
(398, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:46:36', '2015-12-15 16:46:36', '2015-12-15 16:46:36'),
(399, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:51:11', '2015-12-15 16:51:11', '2015-12-15 16:51:11'),
(400, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:53:36', '2015-12-15 16:53:36', '2015-12-15 16:53:36'),
(401, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:54:25', '2015-12-15 16:54:26', '2015-12-15 16:54:26'),
(402, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:56:27', '2015-12-15 16:56:27', '2015-12-15 16:56:27'),
(403, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:56:54', '2015-12-15 16:56:55', '2015-12-15 16:56:55'),
(404, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:57:22', '2015-12-15 16:57:23', '2015-12-15 16:57:23'),
(405, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 16:57:50', '2015-12-15 16:57:50', '2015-12-15 16:57:50'),
(406, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:00:06', '2015-12-15 17:00:07', '2015-12-15 17:00:07'),
(407, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:00:50', '2015-12-15 17:00:51', '2015-12-15 17:00:51'),
(408, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:01:10', '2015-12-15 17:01:10', '2015-12-15 17:01:10'),
(409, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:01:32', '2015-12-15 17:01:32', '2015-12-15 17:01:32'),
(410, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:03:29', '2015-12-15 17:03:29', '2015-12-15 17:03:29'),
(411, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:04:42', '2015-12-15 17:04:42', '2015-12-15 17:04:42'),
(412, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:08:24', '2015-12-15 17:08:24', '2015-12-15 17:08:24'),
(413, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:08:52', '2015-12-15 17:08:52', '2015-12-15 17:08:52'),
(414, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:09:12', '2015-12-15 17:09:12', '2015-12-15 17:09:12'),
(415, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:10:01', '2015-12-15 17:10:01', '2015-12-15 17:10:01'),
(416, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:10:38', '2015-12-15 17:10:38', '2015-12-15 17:10:38'),
(417, 'test', 18.800474, 98.950507, 'CAMT update', 'Test update farm', '2015-12-15 17:11:16', '2015-12-15 17:11:16', '2015-12-15 17:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `farm_user`
--

CREATE TABLE IF NOT EXISTS `farm_user` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `farm_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farm_user`
--

INSERT INTO `farm_user` (`id`, `user_id`, `farm_id`) VALUES
(1, 6, 232),
(4, 11, 237),
(6, 12, 238),
(8, 14, 238),
(9, 11, 238),
(11, 17, 238),
(17, 10, 246);

-- --------------------------------------------------------

--
-- Table structure for table `light`
--

CREATE TABLE IF NOT EXISTS `light` (
  `id` int(10) unsigned NOT NULL,
  `luxValue` double(7,2) NOT NULL,
  `sensor_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=742 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `light`
--

INSERT INTO `light` (`id`, `luxValue`, `sensor_id`, `created_at`, `updated_at`) VALUES
(37, 1000.00, 2, '2015-12-14 16:57:15', '2015-12-14 16:57:15'),
(740, 0.00, 3, '2016-02-13 07:31:08', '2016-02-13 07:31:08'),
(741, 0.00, 3, '2016-02-13 07:31:19', '2016-02-13 07:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_07_14_131217_create_farm_table', 1),
('2015_07_14_131256_create_plot_table', 1),
('2015_07_14_131317_create_plant_table', 1),
('2015_07_14_131416_create_sensingDevice_table', 1),
('2015_07_14_131433_create_sensor_table', 1),
('2015_07_15_224013_create_light_table', 1),
('2015_07_15_224040_create_humidity_table', 1),
('2015_07_15_230829_create_soilMoisture_table', 1),
('2015_07_15_230925_create_temperature_table', 1),
('2015_07_16_225823_create_Weekly_table', 1),
('2015_07_16_225913_create_Daily_table', 1),
('2015_07_16_225933_create_WeeklyHistory_table', 1),
('2015_09_17_235832_createUsersTable', 1),
('2015_10_15_194242_create_table_activity', 1),
('2015_10_15_195932_create_table_activityType', 1),
('2015_11_09_010355_minMaxMonitor_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `minmaxmonitor`
--

CREATE TABLE IF NOT EXISTS `minmaxmonitor` (
  `id` int(10) unsigned NOT NULL,
  `minHumidityPercentage` double(5,2) NOT NULL,
  `maxHumidityPercentage` double(5,2) NOT NULL,
  `minCelsius` double(5,2) NOT NULL,
  `maxCelsius` double(5,2) NOT NULL,
  `minSoilMoisture` double(6,2) NOT NULL,
  `maxSoilMoisture` double(6,2) NOT NULL,
  `minLux` double(7,2) NOT NULL,
  `maxLux` double(7,2) NOT NULL,
  `sensor_id` int(10) unsigned NOT NULL,
  `plant_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `minmaxmonitor`
--

INSERT INTO `minmaxmonitor` (`id`, `minHumidityPercentage`, `maxHumidityPercentage`, `minCelsius`, `maxCelsius`, `minSoilMoisture`, `maxSoilMoisture`, `minLux`, `maxLux`, `sensor_id`, `plant_id`, `created_at`, `updated_at`) VALUES
(14, 10.00, 30.00, 15.00, 30.00, 500.00, 1024.00, 50.00, 10000.00, 6, 274, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `min_max_monitor_user`
--

CREATE TABLE IF NOT EXISTS `min_max_monitor_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `min_max_monitor_id` int(11) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `min_max_monitor_user`
--

INSERT INTO `min_max_monitor_user` (`id`, `user_id`, `min_max_monitor_id`, `status`) VALUES
(24, 66, 14, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE IF NOT EXISTS `plant` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `harvestDay` int(11) NOT NULL,
  `plot_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=275 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`id`, `name`, `type`, `DOB`, `harvestDay`, `plot_id`, `created_at`, `updated_at`) VALUES
(186, 'dddddddddddddddddddd', '', '2015-12-04', 230, 189, '2015-10-21 13:23:33', '2015-10-21 13:23:33'),
(187, 'Potato', 'Vegetable', '2015-10-09', 30, 190, '2015-10-21 15:25:50', '2015-10-21 15:25:50'),
(199, 'มะเขือเทศ', 'Vegetable', '2015-09-08', 45, 190, '2015-10-21 15:40:45', '2015-10-21 15:40:45'),
(200, 'f', '', '2015-12-04', 2, 191, '2015-10-21 21:43:35', '2015-10-21 21:43:35'),
(201, 'Banana', 'Fruit', '2014-11-29', 270, 192, '2015-10-24 10:25:48', '2015-10-24 10:25:48'),
(202, 'Tomato', 'Vegetable', '2014-08-27', 60, 193, '2015-10-24 10:26:26', '2015-10-24 10:26:26'),
(203, 'Cabbage', 'Vegetable', '2015-10-20', 70, 194, '2015-10-24 10:26:59', '2015-10-24 10:26:59'),
(204, 'Carrot', 'Vegetable', '2015-01-31', 60, 195, '2015-10-28 08:23:56', '2015-10-28 08:23:56'),
(205, 'Test', 'Flower', '2015-10-09', 20, 196, '2015-11-08 07:33:49', '2015-11-08 07:33:49'),
(274, 'TestActivityPlant', 'Vegetable', '2015-01-01', 30, 265, '2015-12-15 13:12:56', '2015-12-15 13:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `plot`
--

CREATE TABLE IF NOT EXISTS `plot` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `farm_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plot`
--

INSERT INTO `plot` (`id`, `name`, `description`, `DOB`, `farm_id`, `created_at`, `updated_at`) VALUES
(189, 'dddddddddddddddddddd', '', '0000-00-00', 236, '2015-10-21 13:22:49', '2015-10-21 13:22:49'),
(190, 'Potato Plot', '', '0000-00-00', 237, '2015-10-21 15:23:52', '2015-10-21 15:23:52'),
(191, 'f', 'f', '2015-07-07', 235, '2015-10-21 21:43:14', '2015-10-21 21:43:14'),
(192, 'Banana Plantation', '', '2014-10-31', 238, '2015-10-24 10:24:30', '2015-10-24 10:24:30'),
(193, 'Tomato Plot', '', '2014-07-31', 238, '2015-10-24 10:24:47', '2015-10-24 10:24:47'),
(194, 'Cabbage Plot', '', '2015-09-30', 238, '2015-10-24 10:25:06', '2015-10-24 10:25:06'),
(195, 'Carrot Plot', '', '2014-12-31', 238, '2015-10-28 08:22:48', '2015-10-28 08:23:16'),
(196, 'sdsd', 'dsdsd', '2015-09-30', 246, '2015-11-05 14:06:24', '2015-11-05 14:06:24'),
(265, 'TestActivityPlot', 'Test plot', '2015-01-01', 332, '2015-12-15 13:12:56', '2015-12-15 13:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `sensingdevice`
--

CREATE TABLE IF NOT EXISTS `sensingdevice` (
  `id` int(10) unsigned NOT NULL,
  `device_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `plot_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sensingdevice`
--

INSERT INTO `sensingdevice` (`id`, `device_id`, `plot_id`, `created_at`, `updated_at`) VALUES
(1, 'd1f50b5dbc', 196, '2015-10-27 11:22:34', '2015-11-08 08:02:20'),
(2, 'f8d7412720', 192, '2015-11-05 12:49:49', '2015-11-05 12:50:09'),
(3, 'ms4sfms4sf', 192, '2015-11-18 02:34:15', '2015-11-18 02:34:22'),
(8, 'test10test', 265, '2015-12-15 13:12:56', '2015-12-15 13:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE IF NOT EXISTS `sensor` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sensingDevice_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `name`, `sensingDevice_id`, `created_at`, `updated_at`) VALUES
(1, 'basic package', 1, '2015-10-27 11:22:35', '2015-10-27 11:22:35'),
(2, 'basic package', 2, '2015-11-05 12:49:49', '2015-11-05 12:49:49'),
(3, 'basic package', 3, '2015-11-18 02:34:15', '2015-11-18 02:34:15'),
(6, 'basic package', 8, '2015-12-15 13:12:56', '2015-12-15 13:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `soilmoisture`
--

CREATE TABLE IF NOT EXISTS `soilmoisture` (
  `id` int(10) unsigned NOT NULL,
  `soilValue` double(6,2) NOT NULL,
  `soilState` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sensor_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=742 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `soilmoisture`
--

INSERT INTO `soilmoisture` (`id`, `soilValue`, `soilState`, `sensor_id`, `created_at`, `updated_at`) VALUES
(37, 1000.00, '', 2, '2015-12-14 16:57:14', '2015-12-14 16:57:14'),
(740, 307.00, '', 3, '2016-02-13 07:31:08', '2016-02-13 07:31:08'),
(741, 307.00, '', 3, '2016-02-13 07:31:19', '2016-02-13 07:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `tasklist`
--

CREATE TABLE IF NOT EXISTS `tasklist` (
  `id` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pictureLocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `plant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_list_user`
--

CREATE TABLE IF NOT EXISTS `task_list_user` (
  `id` int(11) NOT NULL,
  `task_list_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temperature`
--

CREATE TABLE IF NOT EXISTS `temperature` (
  `id` int(10) unsigned NOT NULL,
  `celsiusValue` double(5,2) NOT NULL,
  `sensor_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=742 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `temperature`
--

INSERT INTO `temperature` (`id`, `celsiusValue`, `sensor_id`, `created_at`, `updated_at`) VALUES
(37, 999.99, 2, '2015-12-14 16:57:14', '2015-12-14 16:57:14'),
(740, 29.10, 3, '2016-02-13 07:31:08', '2016-02-13 07:31:08'),
(741, 29.10, 3, '2016-02-13 07:31:19', '2016-02-13 07:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pictureDist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `device_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `task_status` enum('on','off','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'off',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `lastname`, `pictureDist`, `email`, `password`, `role`, `phoneNumber`, `device_token`, `task_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'testReg', 'Reg2', 'Reg2', '', 'reg2@reg.com', '$2y$10$mbQjMpz/M3eOwc9V4Dkiw.KZYL2Z9FGyt6ux4dY79Hn61xaNLvwi.', 'test', '083111111', NULL, 'off', NULL, '2015-10-21 11:23:24', '2015-12-15 17:11:18'),
(6, 'testReg2', 'Reg', 'Reg', '', 'reg@reg.com', '$2y$10$ACwKEx1ziTvgGKDorfnInOkJbl5bm.MeaBuJ80hd13uOVdTlhHpIW', 'test', '083000000', NULL, 'off', NULL, '2015-10-21 11:23:24', '2015-10-21 11:23:24'),
(7, 'ten2', 'Pattadon', 'Prapin', 'temp/profilePicture.jpg', 'pattadon@gmail.com', '$2y$10$1hQ4O.7s1RewmVv1zfMjA.7Vqm6Qu.lVfy0lfKcHKLLWT2h3.8du6', 'farmer', '0818847707', NULL, 'off', NULL, '2015-10-21 11:52:18', '2015-10-21 11:52:18'),
(8, 'snoopy2', 'Charlie', 'Brown', '', NULL, '$2y$10$pA0sCEFBpwPVDDn2RXFw5OaAumuHxMEuncYUR.K0GELDMVS..pWoK', 'farmer', '0811111111', NULL, 'off', NULL, '2015-10-21 11:54:11', '2015-10-21 11:54:11'),
(9, 'snoopy3', 'ชาร์ลี', 'บราวน์', '', NULL, '$2y$10$IayoWs/d6DWxXyEDAfFpvuB5.515kU7TLy6lU/uPLffG2uvBbE4qy', 'farmer', '0811111111', NULL, 'off', NULL, '2015-10-21 11:55:34', '2015-10-21 11:55:34'),
(10, 'bossgame1234', 'Sornkom', 'Yoohat', 'temp/bossTest.jpg', 'sornkom123@hotmail.com', '$2y$10$vOS1arSH4vhUm7VktuvpO.IwbFV/kAmZLd71q56pKzVDz0WCzNw82', 'farmer', '0838652755', 'DEV-84f8e9bb-92ff-4953-912f-10c7b41c4a1b', 'off', NULL, '2015-10-21 12:36:21', '2015-11-17 10:37:18'),
(11, 'praewaa', 'Praewaa', 'Thritara', 'temp/10915248_861937927197223_1250847516401186377_n.jpg', 'praewaa.t@gmail.com', '$2y$10$xw5vWJJzz2ufKOoRwEqJe.mW266FmL8K5fWXkTJcy8IKqggHnguCW', 'farm worker', '0897004676', 'DEV-af3591b9-0527-4b94-8acd-2e179a282b0f', 'on', NULL, '2015-10-21 13:50:39', '2015-12-08 14:28:58'),
(12, 'ten', 'Pattadon', 'Prapin', 'temp/ten.jpg', 'pattadon@gmail.com', '$2y$10$TyKzr2mLWTf/8aJCjwoJl.5Lt9rNh60MtWXwuytNdFXosxi8U8w4O', 'farmer', '0897004676', 'undefined', 'on', NULL, '2015-10-22 06:51:27', '2016-02-14 18:38:08'),
(13, 'admin', 'Ad', 'min', '', 'admin@gmail.com', '$2y$10$HslkfAgkybOn8xm9fZxIsu8OEl1GWRZ5erapX3qJPKPkZp3mBCogK', 'admin', '0897004676', NULL, 'off', NULL, '2015-10-24 10:21:40', '2015-10-24 10:21:40'),
(14, 'charlie', 'Charlie', 'Brown', 'temp/profile2.jpg', 'charlie@gmail.com', '$2y$10$1UUHdB1c3dENNLlL.Ruotuq.QJJUAQlLT6lNz/ezRITw47MeXb7ey', 'farm worker', '0811111111', NULL, 'off', NULL, '2015-10-24 10:57:29', '2015-10-24 10:57:30'),
(15, 'คนขี้เหงา', 'เหงา', 'เหงา', '', NULL, '$2y$10$QfDvbuD3lLiE4CkChXurke3g5pCzlAj9nSqEhIpgIiL7sHLew3H0u', 'farmer', '0838652755', NULL, 'off', NULL, '2015-10-24 11:58:05', '2015-10-24 11:58:05'),
(16, 'bossgame123', 'Sorn', 'Yoohat', 'temp/Activity.PNG', NULL, '$2y$10$10k2Y2kpqGqKwvtPTBXY5e.uArK5PU3NmHLjczzyCSl0bgCaHaUCy', 'farmer', '0888888888', NULL, 'off', NULL, '2015-10-27 09:30:27', '2015-10-27 09:30:27'),
(17, 'mon', 'Tortrakul', 'Chathep', 'temp/12179294_1032695226788158_1070912317_n.jpg', 'nammon@gmail.com', '$2y$10$wJK7.vROhJinnxlMeAZHgeS7jNFMi0xT69YH9lqlHQnvyi08AigwW', 'farm worker', '0817243234', NULL, 'off', NULL, '2015-10-27 15:35:42', '2015-10-27 15:45:23'),
(20, 'ds', 'dsdsd', 'sdsadasdsd', '', NULL, '$2y$10$YQ/BL60hO49OF9eEULa91eua97xPJasFL.1PqxOk1CyA9x9h5nhcC', 'farmer', '0888888888', NULL, 'off', NULL, '2015-11-02 19:42:45', '2015-11-02 19:42:45'),
(21, '213', '3213213', '3213213213123', '', 'sornkom123@hotmail.com', '$2y$10$p8IJAAEdSJS19GIkeL/TKeWNIkx4p7L8hU/z/l/1pFNLU1xXi3OIW', 'farmer', '0838652755', NULL, 'off', NULL, '2015-11-14 12:08:00', '2015-11-14 12:08:00'),
(66, 'testAuth', 'Auth', 'Auth', '', 'auth@test.com', '$2y$10$AJmqUis8sUr0CVcAtLcupeXTn7xQZdHv34WbnmkAL/Ut/X5t1ht4K', 'test', '054000000', NULL, 'off', NULL, '2015-12-15 13:12:56', '2015-12-15 17:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `weekly`
--

CREATE TABLE IF NOT EXISTS `weekly` (
  `id` int(10) unsigned NOT NULL,
  `avgTemperature` double(6,2) NOT NULL,
  `minTemperature` double(6,2) NOT NULL,
  `maxTemperature` double(6,2) NOT NULL,
  `avgAirHumidity` double(6,2) NOT NULL,
  `minAirHumidity` double(6,2) NOT NULL,
  `maxAirHumidity` double(6,2) NOT NULL,
  `avgLight` double(7,2) NOT NULL,
  `minLight` double(7,2) NOT NULL,
  `maxLight` double(7,2) NOT NULL,
  `avgSoilMoisture` double(6,2) NOT NULL,
  `minSoilMoisture` double(6,2) NOT NULL,
  `maxSoilMoisture` double(6,2) NOT NULL,
  `sensor_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `weekly`
--

INSERT INTO `weekly` (`id`, `avgTemperature`, `minTemperature`, `maxTemperature`, `avgAirHumidity`, `minAirHumidity`, `maxAirHumidity`, `avgLight`, `minLight`, `maxLight`, `avgSoilMoisture`, `minSoilMoisture`, `maxSoilMoisture`, `sensor_id`, `created_at`, `updated_at`) VALUES
(1, 20.99, 0.00, 29.20, 48.87, 0.00, 68.90, 0.00, 0.00, 0.00, 307.75, 294.00, 449.00, 3, '2016-02-13 06:26:43', '2016-02-13 06:26:43'),
(2, 29.03, 28.89, 29.50, 67.66, 66.80, 68.90, 0.00, 0.00, 0.00, 305.79, 295.00, 317.00, 3, '2016-02-13 06:33:39', '2016-02-13 06:33:39'),
(3, 2.42, 0.00, 29.10, 5.62, 0.00, 67.59, 0.00, 0.00, 0.00, 305.31, 294.00, 317.00, 3, '2016-02-13 06:40:45', '2016-02-13 06:40:45'),
(4, 14.93, 0.00, 29.20, 34.67, 0.00, 67.59, 0.00, 0.00, 0.00, 306.37, 294.00, 324.00, 3, '2016-02-13 07:06:59', '2016-02-13 07:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `weeklyhistory`
--

CREATE TABLE IF NOT EXISTS `weeklyhistory` (
  `id` int(10) unsigned NOT NULL,
  `avgTemperature` double(6,2) NOT NULL,
  `minTemperature` double(6,2) NOT NULL,
  `maxTemperature` double(6,2) NOT NULL,
  `avgAirHumidity` double(6,2) NOT NULL,
  `minAirHumidity` double(6,2) NOT NULL,
  `maxAirHumidity` double(6,2) NOT NULL,
  `avgLight` double(7,2) NOT NULL,
  `minLight` double(7,2) NOT NULL,
  `maxLight` double(7,2) NOT NULL,
  `avgSoilMoisture` double(6,2) NOT NULL,
  `minSoilMoisture` double(6,2) NOT NULL,
  `maxSoilMoisture` double(6,2) NOT NULL,
  `sensor_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`), ADD KEY `activity_plant_id_foreign` (`plant_id`);

--
-- Indexes for table `activitytype`
--
ALTER TABLE `activitytype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_activity_type`
--
ALTER TABLE `activity_activity_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_type_task_list`
--
ALTER TABLE `activity_type_task_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_user`
--
ALTER TABLE `activity_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airhumidity`
--
ALTER TABLE `airhumidity`
  ADD PRIMARY KEY (`id`), ADD KEY `airhumidity_sensor_id_foreign` (`sensor_id`);

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`), ADD KEY `daily_sensor_id_foreign` (`sensor_id`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_user`
--
ALTER TABLE `farm_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `light`
--
ALTER TABLE `light`
  ADD PRIMARY KEY (`id`), ADD KEY `light_sensor_id_foreign` (`sensor_id`);

--
-- Indexes for table `minmaxmonitor`
--
ALTER TABLE `minmaxmonitor`
  ADD PRIMARY KEY (`id`), ADD KEY `minmaxmonitor_sensor_id_foreign` (`sensor_id`);

--
-- Indexes for table `min_max_monitor_user`
--
ALTER TABLE `min_max_monitor_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`id`), ADD KEY `plant_plot_id_foreign` (`plot_id`);

--
-- Indexes for table `plot`
--
ALTER TABLE `plot`
  ADD PRIMARY KEY (`id`), ADD KEY `plot_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `sensingdevice`
--
ALTER TABLE `sensingdevice`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `device_id` (`device_id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`), ADD KEY `sensor_sensingdevice_id_foreign` (`sensingDevice_id`);

--
-- Indexes for table `soilmoisture`
--
ALTER TABLE `soilmoisture`
  ADD PRIMARY KEY (`id`), ADD KEY `soilmoisture_sensor_id_foreign` (`sensor_id`);

--
-- Indexes for table `tasklist`
--
ALTER TABLE `tasklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_list_user`
--
ALTER TABLE `task_list_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`id`), ADD KEY `temperature_sensor_id_foreign` (`sensor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `weekly`
--
ALTER TABLE `weekly`
  ADD PRIMARY KEY (`id`), ADD KEY `weekly_sensor_id_foreign` (`sensor_id`);

--
-- Indexes for table `weeklyhistory`
--
ALTER TABLE `weeklyhistory`
  ADD PRIMARY KEY (`id`), ADD KEY `weeklyhistory_sensor_id_foreign` (`sensor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `activitytype`
--
ALTER TABLE `activitytype`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `activity_activity_type`
--
ALTER TABLE `activity_activity_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT for table `activity_type_task_list`
--
ALTER TABLE `activity_type_task_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table `activity_user`
--
ALTER TABLE `activity_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `airhumidity`
--
ALTER TABLE `airhumidity`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=742;
--
-- AUTO_INCREMENT for table `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=418;
--
-- AUTO_INCREMENT for table `farm_user`
--
ALTER TABLE `farm_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `light`
--
ALTER TABLE `light`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=742;
--
-- AUTO_INCREMENT for table `minmaxmonitor`
--
ALTER TABLE `minmaxmonitor`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `min_max_monitor_user`
--
ALTER TABLE `min_max_monitor_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=275;
--
-- AUTO_INCREMENT for table `plot`
--
ALTER TABLE `plot`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=266;
--
-- AUTO_INCREMENT for table `sensingdevice`
--
ALTER TABLE `sensingdevice`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `soilmoisture`
--
ALTER TABLE `soilmoisture`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=742;
--
-- AUTO_INCREMENT for table `tasklist`
--
ALTER TABLE `tasklist`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_list_user`
--
ALTER TABLE `task_list_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temperature`
--
ALTER TABLE `temperature`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=742;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `weekly`
--
ALTER TABLE `weekly`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `weeklyhistory`
--
ALTER TABLE `weeklyhistory`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
ADD CONSTRAINT `activity_plant_id_foreign` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `airhumidity`
--
ALTER TABLE `airhumidity`
ADD CONSTRAINT `airhumidity_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `daily`
--
ALTER TABLE `daily`
ADD CONSTRAINT `daily_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `light`
--
ALTER TABLE `light`
ADD CONSTRAINT `light_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `minmaxmonitor`
--
ALTER TABLE `minmaxmonitor`
ADD CONSTRAINT `minmaxmonitor_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plant`
--
ALTER TABLE `plant`
ADD CONSTRAINT `plant_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plot` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plot`
--
ALTER TABLE `plot`
ADD CONSTRAINT `plot_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sensor`
--
ALTER TABLE `sensor`
ADD CONSTRAINT `sensor_sensingdevice_id_foreign` FOREIGN KEY (`sensingDevice_id`) REFERENCES `sensingdevice` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `soilmoisture`
--
ALTER TABLE `soilmoisture`
ADD CONSTRAINT `soilmoisture_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `temperature`
--
ALTER TABLE `temperature`
ADD CONSTRAINT `temperature_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `weekly`
--
ALTER TABLE `weekly`
ADD CONSTRAINT `weekly_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `weeklyhistory`
--
ALTER TABLE `weeklyhistory`
ADD CONSTRAINT `weeklyhistory_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
