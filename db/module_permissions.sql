-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2023 at 07:59 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estatecambodia`
--

-- --------------------------------------------------------

--
-- Table structure for table `module_permissions`
--

DROP TABLE IF EXISTS `module_permissions`;
CREATE TABLE IF NOT EXISTS `module_permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_no` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_permissions`
--

INSERT INTO `module_permissions` (`id`, `parent_name`, `parent_id`, `name_en`, `name_kh`, `sort_no`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Dashboard', 'ទំព័រដើម', 1, 1, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(2, NULL, 2, 'Slide', '', 2, 0, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(3, NULL, 3, 'Proverb Type', '', 3, 0, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(4, NULL, 4, 'Proverb Sub Type', '', 4, 0, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(5, NULL, 5, 'Proverb', '', 5, 0, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(6, NULL, 6, 'Package', '', 6, 0, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(7, NULL, 7, 'Subscriber', '', 7, 0, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(8, NULL, 8, 'Customer', 'អតិថិជន', 8, 0, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(9, NULL, 9, 'Support', '', 9, 0, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(10, NULL, 12, 'Notification', '', 12, 0, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(11, NULL, 10, 'Product', '', 10, 0, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(12, NULL, 11, 'User', 'អ្នកប្រើប្រាស់', 11, 1, '2022-11-05 11:24:18', '2022-11-05 11:24:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
