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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name_kh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name_en`, `display_name_kh`, `guard_name`, `module_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dashboard-view', 'View', 'មើល', 'web', 1, 1, '2022-11-05 11:24:18', '2022-11-05 11:24:18'),
(2, 'slide-view', 'View', '', 'web', 2, 0, NULL, NULL),
(3, 'slide-create', 'Create', '', 'web', 2, 0, NULL, NULL),
(4, 'slide-update', 'Edit', '', 'web', 2, 0, NULL, NULL),
(5, 'slide-delete', 'Delete', '', 'web', 2, 0, NULL, NULL),
(6, 'type-view', 'View', '', 'web', 3, 0, NULL, NULL),
(7, 'type-create', 'Create', '', 'web', 3, 0, NULL, NULL),
(8, 'type-update', 'Edit', '', 'web', 3, 0, NULL, NULL),
(9, 'category-view', 'View', '', 'web', 4, 0, NULL, NULL),
(10, 'category-create', 'Create', '', 'web', 4, 0, NULL, NULL),
(11, 'category-update', 'Edit', '', 'web', 4, 0, NULL, NULL),
(12, 'proverb-view', 'View', '', 'web', 5, 0, NULL, NULL),
(13, 'proverb-create', 'Create', '', 'web', 5, 0, NULL, NULL),
(14, 'proverb-update', 'Edit', '', 'web', 5, 0, NULL, NULL),
(15, 'proverb-delete', 'Delete', '', 'web', 5, 0, NULL, NULL),
(16, 'package-view', 'View', '', 'web', 6, 0, NULL, NULL),
(17, 'package-create', 'Create', '', 'web', 6, 0, NULL, NULL),
(18, 'package-update', 'Edit', '', 'web', 6, 0, NULL, NULL),
(19, 'buyer-view', 'View', '', 'web', 7, 0, NULL, NULL),
(20, 'customer-view', 'View', '', 'web', 8, 0, NULL, NULL),
(21, 'customer-create', 'Change Password', '', 'web', 8, 0, NULL, NULL),
(22, 'customer-update', 'Update Status', '', 'web', 8, 0, NULL, NULL),
(23, 'support-view', 'View', '', 'web', 9, 0, NULL, NULL),
(24, 'support-create', 'Create', '', 'web', 9, 0, NULL, NULL),
(25, 'support-update', 'Edit', '', 'web', 9, 0, NULL, NULL),
(26, 'support-delete', 'Delete', '', 'web', 9, 0, NULL, NULL),
(27, 'notification-view', 'View', '', 'web', 10, 0, NULL, NULL),
(28, 'notification-create', 'Create', '', 'web', 10, 0, NULL, NULL),
(29, 'notification-update', 'Edit', '', 'web', 10, 0, NULL, NULL),
(30, 'notification-delete', 'Delete', '', 'web', 10, 0, NULL, NULL),
(31, 'page-view', 'View', '', 'web', 11, 0, NULL, NULL),
(32, 'page-update', 'Edit', '', 'web', 11, 0, NULL, NULL),
(33, 'user-view', 'View', 'មើល', 'web', 12, 1, NULL, NULL),
(34, 'user-create', 'Create', 'បង្កើត', 'web', 12, 1, NULL, NULL),
(35, 'user-update', 'Edit', 'កែប្រែ', 'web', 12, 1, NULL, NULL),
(36, 'user-set-permission', 'Set Permission', 'កំណត់ការអនុញ្ញាត', 'web', 12, 1, '2023-07-13 16:44:28', '2023-07-13 16:44:28'),
(37, 'user-delete', 'Delete', 'លុប', 'web', 12, 1, '2023-07-14 08:56:18', '2023-07-14 08:56:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
