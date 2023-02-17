-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2023 at 06:35 AM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mellobridge2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `mb_cms`
--

CREATE TABLE `mb_cms` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` enum('A','I') NOT NULL COMMENT 'A=Active , I=Inactive',
  `slug` varchar(255) NOT NULL,
  `updated_by` bigint NOT NULL,
  `created_by` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('N','Y') NOT NULL DEFAULT 'N',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mb_cms`
--

INSERT INTO `mb_cms` (`id`, `name`, `description`, `status`, `slug`, `updated_by`, `created_by`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`, `deleted_by`) VALUES
(2, 'Location', '<h2 data-v-27c59c24=\"\" style=\"padding: 0px 0px 15px; margin-right: 0px; margin-left: 0px; -webkit-font-smoothing: antialiased; background-repeat: no-repeat; color: rgb(31, 25, 32); font-family: Roboto, sans-serif; background-color: rgb(247, 247, 247);\"><p style=\"font-size: medium; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; list-style-type: none; line-height: 22px; color: rgb(0, 0, 0); font-family: Inter, sans-serif; background-color: rgb(255, 255, 255);\">Lorem ipsumm dolor sit amet, consectetur adipiscing elit. Purus, aenean sapien pharetra 1234567890</p><p style=\"font-size: medium; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; list-style-type: none; line-height: 22px; color: rgb(0, 0, 0); font-family: Inter, sans-serif; background-color: rgb(255, 255, 255);\"><strong>in interdum quis proin cras</strong><br>Nisl convallis amet, amet a, euismod pulvinar integer adipiscing. Urna tincidunt consectetur 1234567890</p><p style=\"font-size: medium; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; list-style-type: none; line-height: 22px; color: rgb(0, 0, 0); font-family: Inter, sans-serif; background-color: rgb(255, 255, 255);\"><strong>Lorem ipsum dolor sit amet,</strong><br>consectetur adipiscing elit. Purus, aenean sapien pharetra 1234567890</p><p style=\"font-size: medium; padding: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; list-style-type: none; line-height: 22px; color: rgb(0, 0, 0); font-family: Inter, sans-serif; background-color: rgb(255, 255, 255);\">Mi in interdum quis proin cras Nisl convallis amet, amet a, euismod pulvinar integer adipiscing. Urna tincidunt consectetur 123457890</p></h2><p><br></p>', 'A', 'location', 1, 1, '2020-08-10 08:37:50', '2022-08-23 06:55:00', 'N', NULL, NULL),
(17, 'About-us', '<p><span style=\"font-family: Inter, sans-serif; font-size: 16px;\">Loremm ipsumm dolor sit amet, consectetur adipiscing elit. Malesuada eget quis malesuada varius. Dictumst justo, a massa quis lacus nisl, felis pharetra. Volutpat ultricies imperdiet magna penatibus neque, id. Non iaculis imperdiet lorem tincidunt est vel. Sollicitudin sollicitudin purus eu pellentesque. Ut posuere netus vitae nisl aliquam ridiculus eget vitae. Turpis odio tincidunt placerat ultrices. Justo ornare vulputate vel aenean viverra pellentesque ante. Lorem scelerisque amet semper lectus sit feugiat purus. At egestas ut tincidunt elit. Gravida tempus, ornare nunc non eget curabitur auctor nibh. Tempor eu massa convallis tincidunt justo, egestas eget sed. Integer tortor tincidunt vitae a bibendum scelerisque. Ac purus, nisl eleifend adipiscing nullam donec facilisis pellentesque turpis. Vel tincidunt eu, fermentum, pretium sed cursus at.</span><br></p>', 'A', 'about-us', 1, 1, '2022-08-09 11:38:26', '2022-08-09 11:55:46', 'N', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mb_country`
--

CREATE TABLE `mb_country` (
  `id` int NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_code` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_country`
--

INSERT INTO `mb_country` (`id`, `country_name`, `country_code`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'USA', 'US', 0, '2022-05-12 00:00:00', '2022-05-12 00:00:00'),
(2, 'Canada', 'CA', 0, '2022-05-13 05:39:15', '2022-05-13 05:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `mb_migrations`
--

CREATE TABLE `mb_migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mb_modules`
--

CREATE TABLE `mb_modules` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `module_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('A','I','D') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'A-active, I-Inactive, D-Delete',
  `is_deleted` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'Y-yes, N-no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint NOT NULL,
  `updated_by` bigint NOT NULL DEFAULT '0',
  `deleted_by` bigint NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mb_modules`
--

INSERT INTO `mb_modules` (`id`, `parent_id`, `module_name`, `module_description`, `slug`, `status`, `is_deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 0, 'Setting Management', 'Access Control Description', 'setting.management', 'A', 'N', '2020-07-31 00:39:15', '2020-07-31 09:30:39', 1, 1, 0, NULL),
(2, 0, 'Staff Management', 'User Management List', 'user.management', 'A', 'N', '2020-07-31 00:51:48', '2020-07-31 00:51:48', 1, 1, 0, NULL),
(3, 0, 'Support Management', 'Support Management Details', 'support.management', 'A', 'N', '2022-05-22 18:30:00', NULL, 1, 0, 0, NULL),
(4, 0, 'Coupon Management', 'Coupon management details', '', 'A', 'N', '2022-06-06 18:30:00', '2022-06-06 18:30:00', 1, 0, 0, NULL),
(5, 0, 'Shipment Mnagement', 'Shipment management details', '', 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(6, 0, 'Front User Management', '', '', 'A', 'N', NULL, NULL, 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mb_module_functionalities`
--

CREATE TABLE `mb_module_functionalities` (
  `id` bigint UNSIGNED NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `function_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `function_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '1',
  `status` enum('A','I','D') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'A-active,I-inactive,D-delete',
  `is_deleted` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'Y-yes,N-no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint NOT NULL,
  `updated_by` bigint NOT NULL DEFAULT '0',
  `deleted_by` bigint NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mb_module_functionalities`
--

INSERT INTO `mb_module_functionalities` (`id`, `module_id`, `function_name`, `function_description`, `slug`, `sort_order`, `status`, `is_deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 'Setting List Access', 'Module List Access Description', 'insurance-price.list', 1, 'A', 'N', '2020-07-31 00:42:10', '2020-07-31 00:42:10', 1, 1, 0, NULL),
(2, 1, 'Setting Update', 'Price Update Description', 'price.edit', 1, 'A', 'N', '2020-07-31 00:44:15', '2020-07-31 00:44:15', 1, 1, 0, NULL),
(5, 2, 'Staff List Access', 'User List Access Description.', 'user-management.user.list', 1, 'A', 'N', '2020-07-31 00:53:04', '2020-07-31 00:53:04', 1, 1, 0, NULL),
(9, 2, 'Staff Create', 'User Create Description', 'user-management.user.add', 1, 'A', 'N', '2020-07-31 01:57:04', '2020-07-31 01:57:04', 1, 1, 0, NULL),
(10, 2, 'Staff Update', 'User Update Description', 'user-management.user-edit', 1, 'A', 'N', '2020-07-31 01:59:58', '2020-07-31 01:59:58', 1, 1, 0, NULL),
(17, 2, 'Staff Delete', 'User Delete Description', 'user-management.user-delete', 1, 'A', 'N', '2020-08-02 23:33:37', '2020-08-02 23:33:37', 1, 1, 0, NULL),
(18, 2, 'Staff Status', 'User Status Description', 'user-management.reset-user-status', 1, 'A', 'N', '2020-08-02 23:35:28', '2020-08-02 23:35:28', 1, 1, 0, NULL),
(19, 3, 'Support List Access', 'Support list access description', 'support.list', 1, 'A', 'N', '2022-05-22 18:30:00', NULL, 1, 0, 0, NULL),
(20, 3, 'Support Delete', 'Support delete description', 'support.delete', 1, 'A', 'N', '2022-05-22 18:30:00', NULL, 1, 0, 0, NULL),
(21, 4, 'Coupon List Access', '', 'coupon.list', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(22, 4, 'Coupon Add', '', 'coupon-add', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(23, 4, 'Coupon Edit', '', 'coupon.edit', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(24, 4, 'Coupon delete', '', 'coupon-delete', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(25, 5, 'Shipment List Access', '', 'shipment.list', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(26, 5, 'Shipment Edit', '', 'shipment.edit', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(27, 5, 'Shipment Details', '', 'shipment.detail', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(28, 5, 'Shipment Delete', '', 'shipment.delete', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(29, 5, 'Shipment Tracking', '', 'shipment.tracking-detail', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(30, 6, 'User List Access', '', 'user-management.front-user.list', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(31, 6, 'User Add', '', 'user-management.front-user.add', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(32, 6, 'User Edit', '', 'user-management.front-user-edit', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(33, 6, 'User Delete', '', 'user-management.front-user-delete', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL),
(34, 6, 'User Status', '', 'user-management.front-reset-user-status', 1, 'A', 'N', NULL, NULL, 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mb_notification`
--

CREATE TABLE `mb_notification` (
  `id` int NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_notification`
--

INSERT INTO `mb_notification` (`id`, `message`, `is_deleted`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 'welcome to Mello bridge2', 'Y', 1, 1, '2022-07-21 00:00:00', '2022-07-21 11:19:38', '2022-07-21 11:19:38', 1),
(2, 'Hello..welcome to Mello bridge', 'Y', 1, NULL, '2022-07-21 12:56:56', '2022-07-21 13:05:36', '2022-07-21 13:05:36', 1),
(3, 'testing message', 'Y', 1, NULL, '2022-07-21 12:59:30', '2022-07-21 13:02:17', '2022-07-21 13:02:17', 1),
(4, 'Hello', 'Y', 1, NULL, '2022-07-21 13:05:51', '2022-07-21 13:09:03', '2022-07-21 13:09:03', 1),
(5, 'hELLO', 'Y', 1, NULL, '2022-07-21 13:09:22', '2022-07-21 13:11:21', '2022-07-21 13:11:21', 1),
(6, 'Hello All..welcome to Mello bridge', 'Y', 1, 1, '2022-07-21 13:11:47', '2022-08-14 00:08:38', '2022-08-14 00:08:38', 1),
(7, 'If you are a high volume user, please contact us to get your volume discount', 'Y', 1, NULL, '2022-08-14 00:09:30', '2022-08-14 00:10:36', '2022-08-14 00:10:36', 1),
(8, 'Mello Bridge will open a new location next month', 'Y', 1, NULL, '2022-08-14 00:10:05', '2022-08-14 00:10:40', '2022-08-14 00:10:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mb_profit_margin`
--

CREATE TABLE `mb_profit_margin` (
  `id` int NOT NULL,
  `start_weight` varchar(100) NOT NULL,
  `end_weight` varchar(100) NOT NULL,
  `package_type` varchar(150) DEFAULT NULL,
  `packtype` tinyint(1) DEFAULT NULL,
  `unit` varchar(100) NOT NULL,
  `unit_type` tinyint(1) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_profit_margin`
--

INSERT INTO `mb_profit_margin` (`id`, `start_weight`, `end_weight`, `package_type`, `packtype`, `unit`, `unit_type`, `price`, `created_at`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, '1', '100.99', 'Parcel', 1, 'gram', 1, '2.00', '2022-02-21', '2022-08-29', 1, 'N'),
(2, '101', '250.99', 'Parcel', 1, 'gram', 1, '12.00', '2022-07-21', '2022-08-19', 1, 'N'),
(3, '251', '452.99', 'Parcel', 1, 'gram', 1, '13.00', '2022-07-21', '2022-08-19', 1, 'N'),
(4, '453', '999.99', 'Parcel', 1, 'gram', 1, '14.00', '2022-07-21', '2022-08-19', 1, 'N'),
(5, '1000', 'Up', 'Parcel', 1, 'gram', 1, '15.00', '2022-07-21', '2022-08-19', 1, 'N'),
(6, '1', '3.52', 'Parcel', 1, 'oz', 2, '0.30', '2022-07-21', '2022-08-21', 1, 'N'),
(7, '3.53', '8.84', 'Parcel', 1, 'oz', 2, '17.00', '2022-07-21', '2022-08-19', 1, 'N'),
(8, '8.85', '15.97', 'Parcel', 1, 'oz', 2, '18.00', '2022-07-21', '2022-08-19', 1, 'N'),
(9, '15.98', '35.27', 'Parcel', 1, 'oz', 2, '19.00', '2022-07-21', '2022-08-19', 1, 'N'),
(10, '35.28', 'Up', 'Parcel', 1, 'oz', 2, '20.00', '2022-07-21', '2022-08-19', 1, 'N'),
(11, '1', '100.99', 'FlatRateEnvelope', 2, 'gram', 1, '21.00', '2022-02-21', '2022-08-19', 1, 'N'),
(12, '101', '250.99', 'FlatRateEnvelope', 2, 'gram', 1, '22.00', '2022-07-21', '2022-08-19', 1, 'N'),
(13, '251', '452.99', 'FlatRateEnvelope', 2, 'gram', 1, '23.00', '2022-07-21', '2022-08-19', 1, 'N'),
(14, '453', '999.99', 'FlatRateEnvelope', 2, 'gram', 1, '24.00', '2022-07-21', '2022-08-19', 1, 'N'),
(15, '1000', 'Up', 'FlatRateEnvelope', 2, 'gram', 1, '25.00', '2022-07-21', '2022-08-19', 1, 'N'),
(16, '1', '3.52', 'FlatRateEnvelope', 2, 'oz', 2, '26.00', '2022-07-21', '2022-08-19', 1, 'N'),
(17, '3.53', '8.84', 'FlatRateEnvelope', 2, 'oz', 2, '27.00', '2022-07-21', '2022-08-19', 1, 'N'),
(18, '8.85', '15.97', 'FlatRateEnvelope', 2, 'oz', 2, '28.00', '2022-07-21', '2022-08-19', 1, 'N'),
(19, '15.98', '35.27', 'FlatRateEnvelope', 2, 'oz', 2, '29.00', '2022-07-21', '2022-08-19', 1, 'N'),
(20, '35.28', 'Up', 'FlatRateEnvelope', 2, 'oz', 2, '30.00', '2022-07-21', '2022-08-19', 1, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mb_roles`
--

CREATE TABLE `mb_roles` (
  `id` bigint NOT NULL,
  `role_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('A','I','D') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'A-active,I-inactive,D-delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint NOT NULL,
  `updated_by` bigint NOT NULL,
  `is_deleted` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'Y-yes,N-no',
  `deleted_by` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mb_roles`
--

INSERT INTO `mb_roles` (`id`, `role_name`, `role_description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_deleted`, `deleted_by`, `deleted_at`) VALUES
(1, 'Super Admin', 'Super Admin DEscription', 'A', '2022-05-19 18:30:00', '2022-05-19 18:30:00', 1, 1, 'N', NULL, NULL),
(2, 'Frontend User', 'Frontend user description', 'A', '2022-05-19 18:30:00', '2022-05-19 18:30:00', 1, 1, 'N', NULL, NULL),
(3, 'Staff', 'Staff description', 'A', '2022-05-19 18:30:00', '2022-05-19 18:30:00', 1, 1, 'N', NULL, NULL),
(4, 'Frontend User', 'Frontend User Description', 'A', NULL, NULL, 1, 1, 'N', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mb_role_permissions`
--

CREATE TABLE `mb_role_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `module_functionality_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('A','I','D') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'A-active,I-inactive,D-delete',
  `is_deleted` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'Y-yes,N-no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint NOT NULL,
  `updated_by` bigint NOT NULL DEFAULT '0',
  `deleted_by` bigint NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mb_role_permissions`
--

INSERT INTO `mb_role_permissions` (`id`, `role_id`, `module_id`, `module_functionality_id`, `status`, `is_deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`) VALUES
(1, 3, 1, 1, 'A', 'N', '2020-07-31 05:08:44', '2020-07-31 05:10:08', 1, 1, 0, NULL),
(2, 3, 1, 2, 'I', 'N', '2020-07-31 05:08:44', '2020-07-31 05:10:09', 1, 1, 0, NULL),
(5, 3, 2, 5, 'A', 'N', '2020-07-31 05:08:45', '2022-05-19 05:43:30', 1, 1, 0, NULL),
(9, 3, 2, 9, 'I', 'N', '2020-07-31 05:08:45', '2022-05-19 05:43:30', 1, 1, 0, NULL),
(10, 3, 2, 10, 'A', 'N', '2020-07-31 05:08:45', '2020-07-31 10:16:02', 1, 1, 0, NULL),
(33, 3, 2, 17, 'A', 'N', '2022-05-18 18:30:00', '2022-05-19 05:43:30', 1, 1, 0, NULL),
(34, 3, 3, 19, 'A', 'N', '2022-05-22 18:30:00', '2022-05-23 02:54:23', 1, 1, 0, NULL),
(35, 3, 3, 20, 'I', 'N', '2022-05-22 18:30:00', '2022-05-23 02:54:23', 1, 1, 0, NULL),
(36, 3, 4, 21, 'I', 'N', NULL, '2022-06-15 06:25:31', 1, 1, 0, NULL),
(37, 3, 4, 22, 'I', 'N', NULL, '2022-06-07 01:24:44', 1, 1, 0, NULL),
(38, 3, 4, 23, 'I', 'N', NULL, '2022-06-07 01:24:44', 1, 1, 0, NULL),
(39, 3, 4, 24, 'A', 'N', NULL, '2022-06-07 01:24:44', 1, 1, 0, NULL),
(40, 3, 5, 25, 'A', 'N', NULL, '2022-06-07 02:15:31', 1, 1, 0, NULL),
(41, 3, 5, 26, 'A', 'N', NULL, '2022-06-07 02:15:31', 1, 1, 0, NULL),
(42, 3, 5, 27, 'A', 'N', NULL, '2022-06-07 02:15:31', 1, 1, 0, NULL),
(43, 3, 5, 28, 'A', 'N', NULL, '2022-06-07 02:15:31', 1, 1, 0, NULL),
(44, 3, 5, 29, 'A', 'N', NULL, '2022-06-07 02:15:31', 1, 1, 0, NULL),
(45, 3, 6, 30, 'A', 'N', NULL, '2022-06-07 02:15:31', 1, 1, 0, NULL),
(46, 3, 6, 31, 'A', 'N', NULL, '2022-06-07 02:15:32', 1, 1, 0, NULL),
(47, 3, 6, 32, 'A', 'N', NULL, '2022-06-07 02:15:32', 1, 1, 0, NULL),
(48, 3, 6, 33, 'I', 'N', NULL, '2022-06-07 02:15:32', 1, 1, 0, NULL),
(49, 3, 2, 18, 'A', 'N', NULL, '2022-06-07 02:15:32', 1, 1, 0, NULL),
(50, 3, 6, 34, 'I', 'N', NULL, '2022-06-07 02:15:32', 1, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mb_settings`
--

CREATE TABLE `mb_settings` (
  `id` int NOT NULL,
  `insurance_price` int NOT NULL,
  `lable_price` decimal(10,2) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `logo` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_settings`
--

INSERT INTO `mb_settings` (`id`, `insurance_price`, `lable_price`, `company_name`, `admin_email`, `logo`, `phone`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3, '0.00', 'test', 'admin@gmail.com', '1654251157.svg', '8981260153', 0, '2022-05-17 00:00:00', '2022-08-25 08:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `mb_shipments`
--

CREATE TABLE `mb_shipments` (
  `id` int NOT NULL,
  `request_id` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `state_id` int NOT NULL DEFAULT '0',
  `state_name` varchar(150) DEFAULT NULL,
  `is_signature_confirm` enum('Yes','No') NOT NULL DEFAULT 'No',
  `user_id` int DEFAULT NULL,
  `is_import` enum('Y','N') NOT NULL DEFAULT 'N',
  `from_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `to_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `weight` decimal(10,2) DEFAULT NULL,
  `weight_unit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `reference` text,
  `postmark_date` datetime DEFAULT NULL,
  `status_code` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `postage_amount` decimal(10,2) DEFAULT NULL,
  `package_content` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `discounted_amount` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `estimated_delivery_days` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tracking_numbers` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `pricing` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `mail_class` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `is_coupon_applied` enum('Y','N') NOT NULL DEFAULT 'N',
  `shape` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `width` decimal(10,2) DEFAULT NULL,
  `height` decimal(10,2) DEFAULT NULL,
  `length` decimal(10,2) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '1',
  `is_pending` enum('Y','N') NOT NULL DEFAULT 'Y',
  `is_refund_request` enum('Y','N') NOT NULL DEFAULT 'N',
  `shape_unit` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `reatil_value` varchar(100) DEFAULT NULL,
  `fees_amount` decimal(10,2) DEFAULT NULL,
  `is_insurance` enum('Yes','No') NOT NULL DEFAULT 'No',
  `parcel_description` text,
  `client_profit_price` decimal(10,2) DEFAULT NULL,
  `insurance_price` decimal(10,2) DEFAULT NULL,
  `totalpay` decimal(10,2) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `credit_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `shiping_date` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `refund_detail` text,
  `shipping_status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_shipments`
--

INSERT INTO `mb_shipments` (`id`, `request_id`, `order_id`, `first_name`, `last_name`, `country_name`, `state_id`, `state_name`, `is_signature_confirm`, `user_id`, `is_import`, `from_address`, `to_address`, `weight`, `weight_unit`, `reference`, `postmark_date`, `status_code`, `status`, `postage_amount`, `package_content`, `discounted_amount`, `total_amount`, `estimated_delivery_days`, `tracking_numbers`, `pricing`, `mail_class`, `is_coupon_applied`, `shape`, `width`, `height`, `length`, `is_paid`, `is_pending`, `is_refund_request`, `shape_unit`, `reatil_value`, `fees_amount`, `is_insurance`, `parcel_description`, `client_profit_price`, `insurance_price`, `totalpay`, `phone_number`, `transaction_id`, `credit_amount`, `shiping_date`, `refund_detail`, `shipping_status`, `created_at`, `updated_by`, `updated_at`, `is_deleted`, `deleted_at`, `deleted_by`) VALUES
(28, NULL, NULL, 'sumit', 'das', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"8981260153\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', 'be9813b1-376d-4663-91e8-dd36d48d28b3', '2022-07-28 00:00:00', NULL, 'created', '3.48', NULL, '0.00', '3.48', '2', '9200190221582743041477', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 1, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-07-28', NULL, NULL, '2022-07-27 07:38:33', NULL, '2022-07-27 07:38:33', 'N', NULL, NULL),
(30, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-28 07:11:36', NULL, '2022-07-28 07:11:36', 'N', NULL, NULL),
(31, NULL, NULL, 'r', 'r', NULL, 0, NULL, 'Yes', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r\",\"middle_name\":null,\"last_name\":\"r\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1212121221\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1999.00', 'g', '61440e9c-2315-4a27-a53f-0bc9a88e9786', '2022-07-29 00:00:00', NULL, 'created', '12.71', NULL, '0.00', '15.81', '2', '9210800000000000007553', 'Commercial Base', 'Priority', 'N', 'Parcel', '19.00', '20.00', '40.00', 1, 'Y', 'Y', 'cm', NULL, '3.10', 'Yes', NULL, '30.00', '3.66', '49.47', NULL, NULL, '0', '2022-07-30', NULL, NULL, '2022-07-28 11:17:18', NULL, '2022-07-28 11:17:18', 'N', NULL, NULL),
(32, NULL, NULL, 'r', 'r', NULL, 0, NULL, 'Yes', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r\",\"middle_name\":null,\"last_name\":\"r\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1212121221\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1999.00', 'g', 'a33704b2-4687-468e-b2f9-bb52ef621756', '2022-07-29 00:00:00', NULL, 'created', '12.71', NULL, '0.00', '15.81', '2', '9210800000000000007577', 'Commercial Base', 'Priority', 'N', 'Parcel', '19.00', '20.00', '40.00', 1, 'Y', 'N', 'cm', NULL, '3.10', 'Yes', NULL, '30.00', '3.66', '49.47', NULL, NULL, '0', '2022-07-30', NULL, NULL, '2022-07-28 11:17:20', NULL, '2022-07-28 11:17:20', 'N', NULL, NULL),
(33, NULL, NULL, 'r', 'r', NULL, 0, NULL, 'Yes', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r\",\"middle_name\":null,\"last_name\":\"r\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1212121221\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1999.00', 'g', 'df0438e3-f189-4b39-bbe8-038f7c1fc863', '2022-07-29 00:00:00', NULL, 'created', '12.71', NULL, '0.00', '15.81', '2', '9210800000000000007560', 'Commercial Base', 'Priority', 'N', 'Parcel', '19.00', '20.00', '40.00', 1, 'Y', 'N', 'cm', NULL, '3.10', 'Yes', NULL, '30.00', '3.66', '49.47', NULL, NULL, '0', '2022-07-30', NULL, NULL, '2022-07-28 11:17:21', NULL, '2022-07-28 11:17:21', 'N', NULL, NULL),
(34, NULL, NULL, 'r', 'r', NULL, 0, NULL, 'Yes', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r\",\"middle_name\":null,\"last_name\":\"r\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1212121221\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1999.00', 'g', '9782a722-517b-4fcb-bd74-c5cb71515f4d', '2022-07-29 00:00:00', NULL, 'created', '12.71', NULL, '0.00', '15.81', '2', '9210800000000000007584', 'Commercial Base', 'Priority', 'N', 'Parcel', '19.00', '20.00', '40.00', 1, 'Y', 'N', 'cm', NULL, '3.10', 'Yes', NULL, '30.00', '3.66', '49.47', NULL, NULL, '0', '2022-07-30', NULL, NULL, '2022-07-28 11:17:21', NULL, '2022-07-28 11:17:21', 'N', NULL, NULL),
(35, NULL, NULL, 'r', 'r', NULL, 0, NULL, 'Yes', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r\",\"middle_name\":null,\"last_name\":\"r\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1212121221\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1999.00', 'g', 'b746c919-f2fa-43ca-99f0-a539164450ed', '2022-07-29 00:00:00', NULL, 'created', '12.71', NULL, '0.00', '15.81', '2', '9210800000000000007607', 'Commercial Base', 'Priority', 'N', 'Parcel', '19.00', '20.00', '40.00', 1, 'Y', 'N', 'cm', NULL, '3.10', 'Yes', NULL, '30.00', '3.66', '49.47', NULL, NULL, '0', '2022-07-30', NULL, NULL, '2022-07-28 11:17:22', NULL, '2022-07-28 11:17:22', 'N', NULL, NULL),
(36, NULL, NULL, 'r', 'r', NULL, 0, NULL, 'Yes', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r\",\"middle_name\":null,\"last_name\":\"r\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1212121221\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1999.00', 'g', '554a62b5-b64e-4a90-bba7-8ed785d28f3a', '2022-07-29 00:00:00', NULL, 'created', '12.71', NULL, '0.00', '15.81', '2', '9210800000000000007591', 'Commercial Base', 'Priority', 'N', 'Parcel', '19.00', '20.00', '40.00', 1, 'Y', 'N', 'cm', NULL, '3.10', 'Yes', NULL, '30.00', '3.66', '49.47', NULL, NULL, '0', '2022-07-30', NULL, NULL, '2022-07-28 11:17:22', NULL, '2022-07-28 11:17:22', 'N', NULL, NULL),
(37, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-28 11:33:24', NULL, '2022-07-28 11:33:24', 'Y', NULL, NULL),
(38, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-28 11:33:36', NULL, '2022-07-28 11:33:36', 'N', NULL, NULL),
(39, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-28 11:33:38', NULL, '2022-07-28 11:33:38', 'N', NULL, NULL),
(40, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-28 11:33:38', NULL, '2022-07-28 11:33:38', 'N', NULL, NULL),
(41, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 47, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-28 11:33:39', NULL, '2022-07-28 11:33:39', 'N', NULL, NULL),
(42, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-28 12:20:49', NULL, '2022-07-28 12:20:49', 'N', NULL, NULL),
(43, NULL, NULL, 'sumit', 'das', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"8981260153\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', '4b640417-4944-47a7-9f3b-f891f65567cb', '2022-07-29 00:00:00', NULL, 'created', '3.48', NULL, '0.00', '3.48', '2', '9200190221582743041477', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 1, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-07-29', NULL, NULL, '2022-07-28 13:33:17', NULL, '2022-07-28 13:33:17', 'N', NULL, NULL),
(44, NULL, NULL, 'test', 'test', NULL, 0, NULL, 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"test test\",\"middle_name\":null,\"last_name\":\"test test\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"8981260153\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1999.00', 'g', '3fafe4f9-d762-4fd6-aafb-e6dbd254cc90', '2022-07-30 00:00:00', NULL, 'created', '12.71', NULL, '0.00', '15.81', '2', '9210800000000000007614', 'Commercial Base', 'Priority', 'N', 'Parcel', '20.00', '19.00', '40.00', 1, 'Y', 'N', 'cm', NULL, '3.10', 'Yes', NULL, '24.00', '3.18', '42.99', NULL, NULL, '0', '2022-07-30', NULL, NULL, '2022-07-29 10:17:38', NULL, '2022-07-29 10:17:38', 'N', NULL, NULL),
(45, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:03', NULL, '2022-07-29 11:27:03', 'N', NULL, NULL),
(46, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:08', NULL, '2022-07-29 11:27:08', 'N', NULL, NULL),
(47, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:10', NULL, '2022-07-29 11:27:10', 'N', NULL, NULL),
(48, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:12', NULL, '2022-07-29 11:27:12', 'N', NULL, NULL),
(49, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:14', NULL, '2022-07-29 11:27:14', 'N', NULL, NULL),
(50, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:16', NULL, '2022-07-29 11:27:16', 'N', NULL, NULL),
(51, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:18', NULL, '2022-07-29 11:27:18', 'N', NULL, NULL),
(52, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:19', NULL, '2022-07-29 11:27:19', 'N', NULL, NULL),
(53, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:21', NULL, '2022-07-29 11:27:21', 'N', NULL, NULL),
(54, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:23', NULL, '2022-07-29 11:27:23', 'N', NULL, NULL),
(55, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:24', NULL, '2022-07-29 11:27:24', 'N', NULL, NULL),
(56, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:26', NULL, '2022-07-29 11:27:26', 'N', NULL, NULL),
(57, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:51', NULL, '2022-07-29 11:27:51', 'N', NULL, NULL),
(58, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:54', NULL, '2022-07-29 11:27:54', 'N', NULL, NULL),
(59, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:56', NULL, '2022-07-29 11:27:56', 'N', NULL, NULL),
(60, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:58', NULL, '2022-07-29 11:27:58', 'N', NULL, NULL),
(61, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:27:59', NULL, '2022-07-29 11:27:59', 'N', NULL, NULL),
(62, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 1, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:28:01', NULL, '2022-07-29 11:28:01', 'N', NULL, NULL),
(63, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:28:03', NULL, '2022-07-29 11:28:03', 'N', NULL, NULL),
(64, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 1, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-07-29 11:28:05', NULL, '2022-07-29 11:28:05', 'N', NULL, NULL),
(65, NULL, NULL, 'mounir', 'mounir', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":null,\"middle_name\":null,\"last_name\":null,\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"mounir\",\"middle_name\":null,\"last_name\":\"mounir\",\"company_name\":null,\"line1\":\"1696 Ala Moana boulevard\",\"line2\":null,\"line3\":null,\"city\":\"HONOLULU\",\"state_province\":\"HI\",\"postal_code\":\"96815\",\"phone_number\":\"7786838211\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '20.00', 'g', '37540f3a-7d20-4b5e-8d57-59c197d3541c', '2022-07-30 00:00:00', '81', 'In Transit', '3.86', NULL, '0.00', '3.86', '2', '9200100000000001173596', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '10.00', '2.00', '10.00', 1, 'N', 'N', 'cm', NULL, '0.00', 'No', NULL, '6.00', '0.00', '9.86', NULL, NULL, '0', '2022-08-02', NULL, NULL, '2022-07-29 18:58:33', 1, '2022-08-22 07:18:25', 'N', NULL, NULL),
(66, NULL, NULL, 'mounir', 'mounir', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"mounir\",\"middle_name\":null,\"last_name\":\"mounir\",\"company_name\":\"\",\"line1\":\"862 Peace Portal Dr\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"8981260153\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '12.00', 'g', '7fb14fb3-34a1-4530-bf33-57b7f117ee85', '2022-07-31 00:00:00', NULL, 'created', '3.37', NULL, '0.00', '3.37', '2', '9200100000000001173718', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '2.00', '13.00', 1, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '6.00', '0.00', '9.37', NULL, NULL, '0', '2022-07-30', NULL, NULL, '2022-07-30 02:23:03', NULL, '2022-07-30 02:23:03', 'N', NULL, NULL),
(67, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', '9ed5a4b1-7226-42d5-8542-7fe5e029fc0a', '2022-08-02 00:00:00', NULL, 'created', '3.48', NULL, '0.00', '6.58', '2', '9202100000000000000921', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', NULL, '3.10', 'No', NULL, '12.00', '0.00', '18.58', NULL, NULL, '0', '2022-08-02', NULL, NULL, '2022-08-01 14:12:54', NULL, '2022-08-01 14:12:54', 'N', NULL, NULL),
(68, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', 'e061fc7a-c134-45ea-8ee1-4693e6c29277', '2022-08-03 00:00:00', NULL, 'created', '3.48', NULL, '0.00', '3.48', '2', '9200100000000001181331', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 1, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-06', NULL, NULL, '2022-08-02 12:05:39', NULL, '2022-08-02 12:05:39', 'N', NULL, NULL),
(69, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 36, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'Y', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LSKtQLVtcUCLVBc1ozoBUHL', '20', NULL, NULL, NULL, '2022-08-02 13:12:17', NULL, '2022-08-18 12:20:07', 'Y', '2022-08-18 12:20:07', 1),
(70, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', 'a65a8188-c910-4e21-8c45-14ca96f82987', '2022-08-04 00:00:00', '81', 'In Transit', '3.48', NULL, '0.00', '3.48', '2', '9200100000000001183090', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 1, 'N', 'N', 'cm', NULL, '0.00', 'No', NULL, '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-06', NULL, NULL, '2022-08-03 13:25:02', NULL, '2022-08-21 01:58:25', 'N', NULL, NULL),
(71, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', '07647a11-18ad-47d0-9476-38435ad0ffbf', '2022-08-04 00:00:00', NULL, 'created', '3.48', NULL, '0.00', '3.48', '2', '9200100000000001183106', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '10.00', '8.00', 1, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-06', NULL, NULL, '2022-08-03 13:31:18', NULL, '2022-08-03 13:31:18', 'N', NULL, NULL),
(72, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', '3f066ed7-4329-45fa-94e5-6540592034e0', '2022-08-04 00:00:00', NULL, 'created', '3.48', NULL, '0.00', '3.48', '2', '9200100000000001183113', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 1, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-06', NULL, NULL, '2022-08-03 13:35:37', NULL, '2022-08-03 13:35:37', 'N', NULL, NULL),
(73, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '5.00', 'oz', 'a3ec3adf-1926-4bec-aeb0-438f3a6a05fe', '2022-08-04 00:00:00', NULL, 'created', '3.87', NULL, '0.00', '3.87', '2', '9200100000000001183120', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '3.00', '8.00', 1, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '14.00', '0.00', '17.87', NULL, NULL, '0', '2022-08-06', NULL, NULL, '2022-08-03 13:39:34', NULL, '2022-08-03 13:39:34', 'N', NULL, NULL),
(74, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-04 07:49:12', NULL, '2022-08-04 07:49:12', 'N', NULL, NULL),
(75, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-04 07:49:21', NULL, '2022-08-04 07:49:21', 'N', NULL, NULL);
INSERT INTO `mb_shipments` (`id`, `request_id`, `order_id`, `first_name`, `last_name`, `country_name`, `state_id`, `state_name`, `is_signature_confirm`, `user_id`, `is_import`, `from_address`, `to_address`, `weight`, `weight_unit`, `reference`, `postmark_date`, `status_code`, `status`, `postage_amount`, `package_content`, `discounted_amount`, `total_amount`, `estimated_delivery_days`, `tracking_numbers`, `pricing`, `mail_class`, `is_coupon_applied`, `shape`, `width`, `height`, `length`, `is_paid`, `is_pending`, `is_refund_request`, `shape_unit`, `reatil_value`, `fees_amount`, `is_insurance`, `parcel_description`, `client_profit_price`, `insurance_price`, `totalpay`, `phone_number`, `transaction_id`, `credit_amount`, `shiping_date`, `refund_detail`, `shipping_status`, `created_at`, `updated_by`, `updated_at`, `is_deleted`, `deleted_at`, `deleted_by`) VALUES
(76, NULL, NULL, 'R', 's', 'USA', 0, NULL, 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"R s\",\"middle_name\":null,\"last_name\":\"R s\",\"company_name\":\"\",\"line1\":\"862 Peace Portal Dr E ST\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '10.10', 'g', 'e66965ec-90b2-43c1-b865-526bd4013883', '2022-08-05 00:00:00', NULL, 'created', '3.37', NULL, '0.00', '6.47', '2', '9202100000000000000938', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '19.00', '19.00', '19.00', 1, 'Y', 'N', 'cm', NULL, '3.10', 'No', NULL, '0.00', '0.00', '6.47', NULL, NULL, '0', '2022-08-26', NULL, NULL, '2022-08-04 11:37:06', NULL, '2022-08-04 11:37:06', 'N', NULL, NULL),
(77, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', '85db8119-5591-4d77-846e-8e532821e38a', '2022-08-05 00:00:00', NULL, 'created', '3.48', NULL, '0.00', '3.48', '2', '9200100000000001185667', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 1, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-05', NULL, NULL, '2022-08-04 11:42:48', NULL, '2022-08-04 11:42:48', 'N', NULL, NULL),
(78, NULL, NULL, 'rs', 'rs', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"rs\",\"middle_name\":null,\"last_name\":\"rs\",\"company_name\":\"\",\"line1\":\"862 Peace Portal Dr\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '1a02fde5-4b76-4efb-93e3-dd34e757223c', '2022-08-05 00:00:00', NULL, 'created', '4.34', NULL, '0.00', '4.34', '2', '9200100000000001185674', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '11.00', '11.00', '11.00', 0, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '6.00', '0.00', '10.34', NULL, NULL, '0', '2022-08-09', NULL, NULL, '2022-08-04 12:04:28', NULL, '2022-08-04 12:04:28', 'N', NULL, NULL),
(79, NULL, NULL, 'r', 's', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r s\",\"middle_name\":null,\"last_name\":\"r s\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '4b6f543a-2e2f-4338-bf5a-6acd98afacef', '2022-08-05 00:00:00', NULL, 'created', '4.50', NULL, '0.00', '4.50', '2', '9200100000000001185681', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '11.00', '11.00', '11.00', 1, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '6.00', '0.00', '10.50', NULL, NULL, '0', '2022-08-18', NULL, NULL, '2022-08-04 12:07:01', NULL, '2022-08-04 12:07:01', 'N', NULL, NULL),
(80, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', 'f6d34d1f-959a-41bc-b8e3-98825cc9c22a', '2022-08-05 00:00:00', NULL, 'created', '3.48', NULL, '0.00', '3.48', '2', '9200100000000001185698', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 1, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-06', NULL, NULL, '2022-08-04 13:22:22', NULL, '2022-08-04 13:22:22', 'N', NULL, NULL),
(81, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', '542fd159-c79d-40db-aeff-dae9759f26d6', '2022-08-05 00:00:00', NULL, 'created', '3.48', NULL, '0.00', '3.48', '2', '9200100000000001185704', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 0, 'Y', 'N', 'cm', NULL, '0.00', 'No', NULL, '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-06', NULL, NULL, '2022-08-04 14:15:57', NULL, '2022-08-04 14:15:57', 'N', NULL, NULL),
(82, NULL, NULL, 'mounir', 'mounir', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"mounir\",\"middle_name\":null,\"last_name\":\"mounir\",\"company_name\":\"\",\"line1\":\"862 Peace Portal Dr\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"7786838211\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '55.00', 'g', 'f20522b8-7539-44e2-9817-15eaa6fa934c', '2022-08-05 00:00:00', NULL, 'created', '3.37', NULL, '0.00', '3.37', '2', '9200100000000001185728', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '2.00', '13.00', 0, 'Y', 'Y', 'cm', NULL, '0.00', 'No', NULL, '14.00', '0.00', '17.37', NULL, NULL, '0', '2022-08-10', NULL, NULL, '2022-08-04 20:14:37', NULL, '2022-08-04 20:14:37', 'N', NULL, NULL),
(83, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-05 03:40:17', NULL, '2022-08-05 03:40:17', 'N', NULL, NULL),
(84, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-05 03:40:37', NULL, '2022-08-05 03:40:37', 'N', NULL, NULL),
(85, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-05 03:40:44', NULL, '2022-08-05 03:40:44', 'N', NULL, NULL),
(86, NULL, NULL, 'Annie', 'Chan', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Annie\",\"middle_name\":null,\"last_name\":\"Chan\",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, '81', 'In Transit', '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'N', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-05 03:43:57', NULL, '2022-08-21 01:59:08', 'N', NULL, NULL),
(87, NULL, NULL, 'Annie', 'Chan', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Annie\",\"middle_name\":null,\"last_name\":\"Chan\",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-05 03:57:47', NULL, '2022-08-05 03:57:47', 'N', NULL, NULL),
(88, NULL, NULL, 'Annie', 'Chan', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Annie\",\"middle_name\":null,\"last_name\":\"Chan\",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-05 03:59:44', NULL, '2022-08-05 03:59:44', 'N', NULL, NULL),
(89, NULL, NULL, 'Annie', 'Chan', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Annie\",\"middle_name\":null,\"last_name\":\"Chan\",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-05 04:00:03', NULL, '2022-08-05 04:00:03', 'N', NULL, NULL),
(90, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '5.00', 'oz', 'c20f1a26-9900-44ad-931b-d4d518a0ab2b', '2022-08-09 00:00:00', NULL, 'created', '3.87', 'Documents', '0.00', '3.87', '2', '9200100000000001195239', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '40.00', '8.00', 1, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '14.00', '0.00', '17.87', NULL, NULL, '0', '2022-08-13', NULL, NULL, '2022-08-08 07:28:34', NULL, '2022-08-08 07:28:34', 'N', NULL, NULL),
(91, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-08 07:37:53', NULL, '2022-08-08 07:37:53', 'N', NULL, NULL),
(92, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '6.00', 'g', '0f48b743-95b5-476a-b311-b7127ed79786', '2022-08-09 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '3.48', '2', '9200100000000001196069', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 1, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '14.00', '0.00', '17.48', NULL, NULL, '0', '2022-08-13', NULL, NULL, '2022-08-08 09:43:28', NULL, '2022-08-08 09:43:28', 'N', NULL, NULL),
(93, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '5.00', 'g', 'de944687-74b4-4c50-80a4-f6af93e7b530', '2022-08-09 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '3.48', '2', '9200100000000001196090', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '14.00', '0.00', '17.48', NULL, NULL, '0', '2022-08-13', NULL, NULL, '2022-08-08 10:35:09', NULL, '2022-08-08 10:35:09', 'N', NULL, NULL),
(94, NULL, NULL, 'rs', 'rs', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"rs\",\"middle_name\":null,\"last_name\":\"rs\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '2c7b4a14-dced-4e30-8280-0d4153868c9d', '2022-08-09 00:00:00', NULL, 'created', '4.50', 'Documents', '0.00', '4.50', '2', '9200100000000001196113', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '11.00', '11.00', '11.00', 0, 'Y', 'N', 'cm', '1', '0.00', 'No', '3 Cotton Shirts', '6.00', '0.00', '10.50', NULL, NULL, '0', '2022-08-18', NULL, NULL, '2022-08-08 13:54:54', NULL, '2022-08-08 13:54:54', 'N', NULL, NULL),
(95, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-08 14:31:15', NULL, '2022-08-08 14:31:15', 'N', NULL, NULL),
(96, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-08 14:32:14', NULL, '2022-08-08 14:32:14', 'N', NULL, NULL),
(97, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '10.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test1', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-08 14:34:07', NULL, '2022-08-08 14:34:07', 'N', NULL, NULL),
(98, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '10.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test1', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-08 14:35:11', NULL, '2022-08-08 14:35:11', 'N', NULL, NULL),
(99, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '10.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test2', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-08 14:36:33', NULL, '2022-08-08 14:36:33', 'N', NULL, NULL),
(100, NULL, NULL, 'John', 'Due ', NULL, 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '10.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test2', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-08 14:37:32', NULL, '2022-08-08 14:37:32', 'N', NULL, NULL),
(101, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-09 06:36:21', NULL, '2022-08-09 06:36:21', 'N', NULL, NULL),
(102, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-09 06:45:01', NULL, '2022-08-09 06:45:01', 'N', NULL, NULL),
(103, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-09 06:47:29', NULL, '2022-08-09 06:47:29', 'N', NULL, NULL),
(104, NULL, NULL, 'John1', 'Due2 ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John1\",\"middle_name\":null,\"last_name\":\"Due2 \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984568\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '5.00', '3.00', '4.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test1', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-09 06:47:30', NULL, '2022-08-09 06:47:30', 'N', NULL, NULL),
(105, NULL, NULL, 'John2', 'Due 3', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John2\",\"middle_name\":null,\"last_name\":\"Due 3\",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984569\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '6.00', '4.00', '5.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test2', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-09 06:47:31', NULL, '2022-08-09 06:47:31', 'N', NULL, NULL),
(106, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', 'f267d436-dbf4-4d98-9ac9-60b78d9f948b', '2022-08-10 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '3.48', '2', '9200100000000001199015', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 1, 'Y', 'N', 'cm', '15', '0.00', 'No', '3 SHIRTS', '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-13', NULL, NULL, '2022-08-09 08:04:10', NULL, '2022-08-09 08:04:10', 'N', NULL, NULL),
(107, NULL, NULL, 'sumit', 'das', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'oz', 'd2146119-27b6-4234-a08d-df8288487019', '2022-08-10 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '3.48', '2', '9200100000000001199572', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '10.00', '8.00', 0, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-13', NULL, NULL, '2022-08-09 12:41:58', NULL, '2022-08-09 12:41:58', 'N', NULL, NULL),
(108, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-09 12:51:01', NULL, '2022-08-09 12:51:01', 'N', NULL, NULL),
(109, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-09 17:07:57', NULL, '2022-08-09 17:07:57', 'N', NULL, NULL),
(110, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 09:35:24', NULL, '2022-08-10 09:35:24', 'N', NULL, NULL),
(111, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 52, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'Y', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LVBiOLVtcUCLVBc1CbObu54', '11', NULL, NULL, NULL, '2022-08-10 10:00:41', NULL, '2022-08-18 12:20:17', 'Y', '2022-08-18 12:20:17', 1),
(112, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 36, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'Y', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LVBqtLVtcUCLVBc1ZUnK0BQ', '10', NULL, NULL, NULL, '2022-08-10 10:09:28', NULL, '2022-08-18 12:20:32', 'Y', '2022-08-18 12:20:32', 1),
(113, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 1, 'Y', 'Y', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:32:05', NULL, '2022-08-10 10:32:05', 'Y', NULL, NULL),
(114, NULL, NULL, 'a', 'f', NULL, 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"a\",\"middle_name\":null,\"last_name\":\"f\",\"company_name\":\"RedBrick247\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94307\",\"phone_number\":\"77984568\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '3.00', '3.00', '4.00', 1, 'Y', 'Y', 'cm', NULL, NULL, 'No', 'test1', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:32:07', NULL, '2022-08-10 10:32:07', 'Y', NULL, NULL),
(115, NULL, NULL, 's', 'g', NULL, 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"s\",\"middle_name\":null,\"last_name\":\"g\",\"company_name\":\"RedBrick247\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94308\",\"phone_number\":\"77984569\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '4.00', '4.00', '5.00', 1, 'Y', 'Y', 'cm', NULL, NULL, 'No', 'test2', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:32:08', NULL, '2022-08-10 10:32:08', 'N', NULL, NULL),
(116, NULL, NULL, 'd', 'h', NULL, 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"d\",\"middle_name\":null,\"last_name\":\"h\",\"company_name\":\"RedBrick247\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94309\",\"phone_number\":\"77984570\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '5.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '5.00', '5.00', '6.00', 1, 'Y', 'Y', 'cm', NULL, NULL, 'No', 'test3', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:32:10', NULL, '2022-08-10 10:32:10', 'N', NULL, NULL),
(117, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:35:25', NULL, '2022-08-10 10:35:25', 'N', NULL, NULL),
(118, NULL, NULL, 'a', 'f', NULL, 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"a\",\"middle_name\":null,\"last_name\":\"f\",\"company_name\":\"RedBrick247\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94307\",\"phone_number\":\"77984568\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '3.00', '3.00', '4.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test1', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:35:27', NULL, '2022-08-10 10:35:27', 'N', NULL, NULL),
(119, NULL, NULL, 's', 'g', NULL, 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"s\",\"middle_name\":null,\"last_name\":\"g\",\"company_name\":\"RedBrick247\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94308\",\"phone_number\":\"77984569\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '4.00', '4.00', '5.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test2', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:35:28', NULL, '2022-08-10 10:35:28', 'N', NULL, NULL),
(120, NULL, NULL, 'd', 'h', NULL, 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"d\",\"middle_name\":null,\"last_name\":\"h\",\"company_name\":\"RedBrick247\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94309\",\"phone_number\":\"77984570\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '5.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '5.00', '5.00', '6.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test3', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:35:30', NULL, '2022-08-10 10:35:30', 'N', NULL, NULL),
(121, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 52, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'Y', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LVCKCLVtcUCLVBc1a5eas3j', '13', NULL, NULL, NULL, '2022-08-10 10:39:45', NULL, '2022-08-18 12:20:10', 'Y', '2022-08-18 12:20:10', 1),
(122, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 52, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'Y', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LVCM1LVtcUCLVBc1bvW4oSG', '24', NULL, NULL, NULL, '2022-08-10 10:41:38', NULL, '2022-08-18 12:20:39', 'Y', '2022-08-18 12:20:39', 1),
(123, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:46:28', NULL, '2022-08-10 10:46:28', 'N', NULL, NULL),
(124, NULL, NULL, 'd1', 'h', NULL, 0, NULL, 'No', 52, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"d1\",\"middle_name\":null,\"last_name\":\"h\",\"company_name\":\"RedBrick247\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94309\",\"phone_number\":\"77984570\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '5.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '5.00', '5.00', '6.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test3', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:46:30', NULL, '2022-08-10 10:46:30', 'N', NULL, NULL),
(125, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 52, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:46:50', NULL, '2022-08-10 10:46:50', 'N', NULL, NULL);
INSERT INTO `mb_shipments` (`id`, `request_id`, `order_id`, `first_name`, `last_name`, `country_name`, `state_id`, `state_name`, `is_signature_confirm`, `user_id`, `is_import`, `from_address`, `to_address`, `weight`, `weight_unit`, `reference`, `postmark_date`, `status_code`, `status`, `postage_amount`, `package_content`, `discounted_amount`, `total_amount`, `estimated_delivery_days`, `tracking_numbers`, `pricing`, `mail_class`, `is_coupon_applied`, `shape`, `width`, `height`, `length`, `is_paid`, `is_pending`, `is_refund_request`, `shape_unit`, `reatil_value`, `fees_amount`, `is_insurance`, `parcel_description`, `client_profit_price`, `insurance_price`, `totalpay`, `phone_number`, `transaction_id`, `credit_amount`, `shiping_date`, `refund_detail`, `shipping_status`, `created_at`, `updated_by`, `updated_at`, `is_deleted`, `deleted_at`, `deleted_by`) VALUES
(126, NULL, NULL, 'd1', 'h', NULL, 0, NULL, 'No', 52, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"d1\",\"middle_name\":null,\"last_name\":\"h\",\"company_name\":\"RedBrick247\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94309\",\"phone_number\":\"77984570\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '5.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '5.00', '5.00', '6.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test3', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 10:46:52', NULL, '2022-08-10 10:46:52', 'N', NULL, NULL),
(127, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 11:02:11', NULL, '2022-08-10 11:02:11', 'N', NULL, NULL),
(128, NULL, NULL, 'John1', 'Due2 ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John1\",\"middle_name\":null,\"last_name\":\"Due2 \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984568\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '5.00', '3.00', '4.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test1', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 11:02:13', NULL, '2022-08-10 11:02:13', 'N', NULL, NULL),
(129, NULL, NULL, 'John2', 'Due 3', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John2\",\"middle_name\":null,\"last_name\":\"Due 3\",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984569\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '6.00', '4.00', '5.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test2', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-10 11:02:14', NULL, '2022-08-10 11:02:14', 'Y', NULL, NULL),
(130, NULL, NULL, 'Rohit', 'Santra', 'USA', 0, NULL, 'Yes', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1111111111\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1.00', 'oz', '776e9198-641c-4f26-b839-c61bb6667b64', '2022-08-11 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '6.58', '2', '9202100000000000000945', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '3.00', '4.00', '2.00', 0, 'Y', 'N', 'cm', '11', '3.10', 'No', '3 Cotton Candy', '6.00', '0.00', '12.58', NULL, NULL, '0', '2022-08-11', NULL, NULL, '2022-08-10 11:12:12', NULL, '2022-08-10 11:12:12', 'N', NULL, NULL),
(131, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 52, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'Y', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LVCqFLVtcUCLVBc0cUm4vyR', '11', NULL, NULL, NULL, '2022-08-10 11:12:52', NULL, '2022-08-18 12:20:04', 'Y', '2022-08-18 12:20:04', 1),
(132, NULL, NULL, 'Rohit', 'Santra', 'USA', 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1111111111\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1.00', 'oz', 'ca8a5601-1351-41fe-86bf-867d268d997d', '2022-08-11 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '3.48', '2', '9200100000000001201701', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '3.00', '4.00', '2.00', 1, 'Y', 'N', 'cm', '1', '0.00', 'No', '3 Cotton Candy', '6.00', '0.00', '9.48', NULL, NULL, '0', '2022-08-18', NULL, NULL, '2022-08-10 11:13:57', NULL, '2022-08-10 11:13:57', 'N', NULL, NULL),
(133, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 52, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'Y', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LVCzxLVtcUCLVBc1hpiR3Rt', '30', NULL, NULL, NULL, '2022-08-10 11:22:54', NULL, '2022-08-18 12:20:14', 'Y', '2022-08-18 12:20:14', 1),
(134, NULL, NULL, 'Rohit', 'Santra', 'USA', 0, NULL, 'No', 52, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '12.00', 'oz', '0eed6dcd-17a1-4701-9837-600cdf98706d', '2022-08-11 00:00:00', NULL, 'created', '4.50', 'Documents', '0.00', '4.50', '2', '9200100000000001201725', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '14.00', '15.00', '13.00', 0, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '12.00', '0.00', '16.50', NULL, NULL, '0', '2022-08-18', NULL, NULL, '2022-08-10 11:29:28', NULL, '2022-08-10 11:29:28', 'N', NULL, NULL),
(136, NULL, NULL, 'sumit', 'das', 'USA', 20, 'California', 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das sumit das\",\"middle_name\":null,\"last_name\":\"sumit das sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '5.00', 'oz', 'b5a8c399-d780-4ad7-8a15-6ce50866055a', '2022-08-12 00:00:00', NULL, 'created', '3.87', 'Merchandise', '0.00', '6.97', '2', '9202100000000000001065', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '5.00', '5.00', '5.00', 0, 'Y', 'N', 'cm', '10', '3.10', 'No', '3 SHIRTS', '14.00', '0.00', '20.97', NULL, NULL, '0', '2022-11-09', NULL, NULL, '2022-08-10 13:43:29', NULL, '2022-08-11 11:34:21', 'N', NULL, NULL),
(137, NULL, NULL, 'r', 's', 'USA', 20, 'California', 'No', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r s\",\"middle_name\":null,\"last_name\":\"r s\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '54137c89-b352-44b3-aee0-0153408f07a3', '2022-08-12 00:00:00', NULL, 'created', '4.50', 'Merchandise', '0.00', '4.50', '2', '9200100000000001203378', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '11.00', '11.00', '11.00', 0, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Shirts', '12.00', '0.00', '16.50', NULL, NULL, '0', '2022-08-26', NULL, NULL, '2022-08-11 08:09:50', NULL, '2022-08-11 08:09:50', 'N', NULL, NULL),
(138, NULL, NULL, 'r', 's', 'USA', 20, 'California', 'No', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r s\",\"middle_name\":null,\"last_name\":\"r s\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '205c1a20-4f43-4e59-98fa-a3f14aa70448', '2022-08-12 00:00:00', NULL, 'created', '4.50', 'Merchandise', '0.00', '4.50', '2', '9200100000000001203385', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '11.00', '11.00', '11.00', 0, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Shirts', '12.00', '0.00', '16.50', NULL, NULL, '0', '2022-08-26', NULL, NULL, '2022-08-11 08:09:53', NULL, '2022-08-11 08:09:53', 'N', NULL, NULL),
(139, NULL, NULL, 'r', 's', 'USA', 20, 'California', 'No', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r s\",\"middle_name\":null,\"last_name\":\"r s\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '98186011-3be9-4f22-8800-790328ce7e21', '2022-08-12 00:00:00', NULL, 'created', '4.50', 'Merchandise', '0.00', '4.50', '2', '9200100000000001203392', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '11.00', '11.00', '11.00', 0, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Shirts', '12.00', '0.00', '16.50', NULL, NULL, '0', '2022-08-26', NULL, NULL, '2022-08-11 08:09:58', NULL, '2022-08-11 08:09:58', 'N', NULL, NULL),
(140, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-11 08:11:18', NULL, '2022-08-11 08:11:18', 'N', NULL, NULL),
(141, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 51, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, '81', 'In Transit', '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'N', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-11 08:11:52', NULL, '2022-08-22 07:18:13', 'N', NULL, NULL),
(142, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 51, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-11 08:11:57', NULL, '2022-08-11 08:11:57', 'N', NULL, NULL),
(143, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-11 08:12:11', NULL, '2022-08-11 08:12:11', 'N', NULL, NULL),
(144, NULL, NULL, 'John1', 'Due2 ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John1\",\"middle_name\":null,\"last_name\":\"Due2 \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984568\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '5.00', '3.00', '4.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test1', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-11 08:12:13', NULL, '2022-08-11 08:12:13', 'N', NULL, NULL),
(145, NULL, NULL, 'John2', 'Due 3', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John2\",\"middle_name\":null,\"last_name\":\"Due 3\",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984569\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '6.00', '4.00', '5.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test2', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-11 08:12:14', NULL, '2022-08-11 08:12:14', 'N', NULL, NULL),
(146, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-11 08:16:00', NULL, '2022-08-11 08:16:00', 'N', NULL, NULL),
(147, NULL, NULL, 'John1', 'Due2 ', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John1\",\"middle_name\":null,\"last_name\":\"Due2 \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984568\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '5.00', '3.00', '4.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test1', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-11 08:16:02', NULL, '2022-08-11 08:16:02', 'N', NULL, NULL),
(148, NULL, NULL, 'John2', 'Due 3', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John2\",\"middle_name\":null,\"last_name\":\"Due 3\",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984569\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '6.00', '4.00', '5.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test2', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-11 08:16:03', NULL, '2022-08-11 08:16:03', 'N', NULL, NULL),
(149, NULL, NULL, 'rcpt1', 'rcpt1', 'USA', 20, 'California', 'Yes', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"rcpt1\",\"middle_name\":null,\"last_name\":\"rcpt1\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', 'c3ef49c7-7c74-4293-96f9-e46d6cfa3df0', '2022-08-12 00:00:00', NULL, 'created', '4.50', 'Gift and other', '0.00', '7.60', '2', '9202100000000000000952', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '11.00', '11.00', '11.00', 0, 'Y', 'N', 'cm', '400', '3.10', 'No', '3 Cotton Shirts', '12.00', '0.00', '19.60', NULL, NULL, '0', '2022-08-26', NULL, NULL, '2022-08-11 08:44:26', NULL, '2022-08-11 08:44:26', 'N', NULL, NULL),
(150, NULL, NULL, 'rcpt1', 'rcpt1', 'USA', 20, 'California', 'Yes', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"rcpt1\",\"middle_name\":null,\"last_name\":\"rcpt1\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '8e9a0b0f-c0e2-44fa-9880-bd8e6be854da', '2022-08-12 00:00:00', NULL, 'created', '4.50', 'Gift and other', '0.00', '7.60', '2', '9202100000000000000969', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '11.00', '11.00', '11.00', 0, 'Y', 'N', 'cm', '400', '3.10', 'No', '3 Cotton Shirts', '12.00', '0.00', '19.60', NULL, NULL, '0', '2022-08-26', NULL, NULL, '2022-08-11 08:44:33', NULL, '2022-08-11 08:44:33', 'N', NULL, NULL),
(151, NULL, NULL, 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', '66a2cd6a-a160-49a2-81c8-50bba8e5c14e', '2022-08-12 00:00:00', NULL, 'created', '3.48', 'Merchandise', '0.00', '3.48', '2', '9200100000000001203460', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 1, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-13', NULL, NULL, '2022-08-11 08:44:47', NULL, '2022-08-11 08:44:47', 'N', NULL, NULL),
(152, NULL, NULL, 'RECIPIENT', 'NAME', 'USA', 20, 'California', 'Yes', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"RECIPIENT NAME\",\"middle_name\":null,\"last_name\":\"RECIPIENT NAME\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '03b9015e-8179-434c-b2f4-f6e3fe3ed767', '2022-08-12 00:00:00', NULL, 'created', '4.50', 'Gift and other', '0.00', '7.60', '2', '9202100000000000000976', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '13.00', '13.00', '12.00', 0, 'Y', 'N', 'cm', '400', '3.10', 'Yes', '3 Cotton Shirts', '12.00', '1.57', '21.17', NULL, NULL, '0', '2022-08-31', NULL, NULL, '2022-08-11 08:48:53', NULL, '2022-08-11 08:48:53', 'N', NULL, NULL),
(153, NULL, NULL, 'RECIPIENT', 'NAME', 'USA', 20, 'California', 'No', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"RECIPIENT NAME\",\"middle_name\":null,\"last_name\":\"RECIPIENT NAME\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '8ea67bd1-d893-4a61-9829-cb56b9d836b9', '2022-08-12 00:00:00', NULL, 'created', '4.50', 'Gift and other', '0.00', '4.50', '2', '9200100000000001203477', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '13.00', '13.00', '12.00', 0, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Shirts', '12.00', '0.00', '16.50', NULL, NULL, '0', '2022-08-30', NULL, NULL, '2022-08-11 08:49:54', NULL, '2022-08-11 08:49:54', 'N', NULL, NULL),
(154, NULL, NULL, 'rohit', 'rohit', 'USA', 20, 'California', 'Yes', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"rohit\",\"middle_name\":null,\"last_name\":\"rohit\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '57cb15d8-2ede-4243-bfc7-8bc6f183158b', '2022-08-12 00:00:00', NULL, 'created', '7.75', 'Gift and other', '0.00', '10.85', '2', '9210800000000000007669', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '13.00', '14.00', '12.00', 0, 'Y', 'N', 'cm', '400', '3.10', 'Yes', '3 Cotton Shirts', '12.00', '1.83', '24.68', NULL, NULL, '0', '2022-11-09', NULL, NULL, '2022-08-11 12:48:39', NULL, '2022-08-11 12:48:39', 'N', NULL, NULL),
(155, NULL, NULL, 'r', 's', 'USA', 20, 'California', 'No', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"r s\",\"middle_name\":null,\"last_name\":\"r s\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', '52bc527c-f615-486a-8b9f-943026ef02b2', '2022-08-12 00:00:00', NULL, 'created', '7.75', 'Sample', '0.00', '7.75', '2', '9205500000000001352550', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '13.00', '14.00', '12.00', 0, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Shirts', '12.00', '0.00', '19.75', NULL, NULL, '0', '2022-08-05', NULL, NULL, '2022-08-11 12:53:25', NULL, '2022-08-11 12:53:25', 'N', NULL, NULL),
(156, NULL, NULL, 'Sumit', 'das', 'USA', 20, 'California', 'Yes', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Sumit das\",\"middle_name\":null,\"last_name\":\"Sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '11.00', 'oz', 'f47db16f-a4de-45c9-8800-fc1b415b047c', '2022-08-12 00:00:00', NULL, 'created', '7.75', 'Sample', '0.00', '10.85', '2', '9210800000000000007676', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '19.00', '19.00', '40.00', 0, 'Y', 'N', 'cm', '400', '3.10', 'Yes', '3 Cotton Shirts', '12.00', '1.83', '24.68', NULL, NULL, '0', '2022-08-23', NULL, NULL, '2022-08-11 13:00:09', NULL, '2022-08-11 13:00:09', 'N', NULL, NULL),
(157, NULL, NULL, 'Sumit', 'das', 'USA', 20, 'California', 'No', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Sumit das Sumit das\",\"middle_name\":null,\"last_name\":\"Sumit das Sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'oz', '473abd25-09d7-48d0-9add-93c81449bb93', '2022-08-12 00:00:00', NULL, 'created', '7.75', 'Sample', '0.00', '7.75', '2', '9205500000000001352574', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 0, 'Y', 'N', 'cm', '400', '0.00', 'Yes', '3 Cotton Shirts', '12.00', '1.58', '21.33', NULL, NULL, '0', '2022-08-30', NULL, NULL, '2022-08-11 13:00:16', NULL, '2022-08-11 13:04:32', 'N', NULL, NULL),
(158, NULL, '1234', 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"salat lake\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'oz', 'f7a09345-6fa1-407f-a15f-130cc56974f0', '2022-08-12 00:00:00', NULL, 'created', '3.48', 'Merchandise', '0.00', '3.48', '2', '9200100000000001204023', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '10.00', '8.00', 0, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-13', NULL, NULL, '2022-08-11 13:53:22', NULL, '2022-08-11 13:53:22', 'N', NULL, NULL),
(159, NULL, NULL, 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"salat lake\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', 'c96d9f90-11d6-4753-925e-e66483bbb23b', '2022-08-12 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '3.48', '2', '9200100000000001204054', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 0, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-12', NULL, NULL, '2022-08-11 14:12:13', NULL, '2022-08-11 14:12:13', 'N', NULL, NULL),
(160, NULL, '12346', 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"salat lake\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'g', '0f98c06a-2fb9-4498-bae9-24448c07a78c', '2022-08-12 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '3.48', '2', '9200100000000001204061', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '5.00', '3.00', '4.00', 0, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '12.00', '0.00', '15.48', '9038234479', NULL, '0', '2022-08-12', NULL, NULL, '2022-08-11 14:14:06', NULL, '2022-08-11 14:14:06', 'N', NULL, NULL),
(161, NULL, '123', 'eight', 'pm', 'USA', 20, 'California', 'Yes', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"eight pm test\",\"middle_name\":null,\"last_name\":\"eight pm test\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"4100 Orme St 2\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '13.00', 'oz', '4a510a45-8bb8-4096-a8b6-12739b8cef5d', '2022-08-12 00:00:00', '81', 'In Transit', '7.75', 'Gift and other', '0.00', '10.85', '2', '9210800000000000007690', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '15.00', '16.00', '14.00', 0, 'N', 'N', 'cm', '1', '3.10', 'Yes', '3 Cotton Shirts', '12.00', '1.83', '24.68', '1231231232', NULL, '0', '2022-11-09', NULL, NULL, '2022-08-11 14:23:32', NULL, '2022-08-22 07:18:57', 'N', NULL, NULL),
(162, NULL, '1234', 'eight', 'pm', 'USA', 20, 'California', 'No', 51, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"eight pm test eight pm test\",\"middle_name\":null,\"last_name\":\"eight pm test eight pm test\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"4100 Orme St 2\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1231231232\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '13.11', 'oz', 'cc329408-518e-478f-8190-afb0088b7548', '2022-08-12 00:00:00', NULL, 'created', '5.72', 'Documents', '0.00', '5.72', '2', '9200100000000001204078', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '15.13', '16.14', '14.12', 0, 'Y', 'N', 'cm', '12', '0.00', 'No', '3 Cotton Shirts', '12.00', '0.00', '17.72', '1231231232', NULL, '0', '2022-08-31', NULL, NULL, '2022-08-11 14:25:44', NULL, '2022-08-11 14:25:44', 'N', NULL, NULL),
(163, NULL, '12346', 'sumit', 'das', 'USA', 20, 'California', 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"salat lake\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'oz', 'b0a77726-ca9e-4a41-9e9d-3dba394746c5', '2022-08-12 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '6.58', '2', '9202100000000000001096', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '5.00', '3.00', '4.00', 1, 'Y', 'N', 'cm', '10', '3.10', 'No', '3 SHIRTS', '12.00', '0.00', '18.58', '9038234479', NULL, '0', '2022-08-11', NULL, NULL, '2022-08-11 14:30:56', NULL, '2022-08-11 14:30:56', 'N', NULL, NULL),
(164, NULL, '12346', 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"salat lake\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'oz', '9a4cbdde-7dcf-4890-9d61-da7b4a14e727', '2022-08-13 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '3.48', '2', '9200100000000001205389', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '5.00', '3.00', '4.00', 1, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 shoes', '12.00', '0.00', '15.48', '9038234479', NULL, '0', '2022-08-12', NULL, NULL, '2022-08-11 14:31:46', NULL, '2022-08-12 08:59:39', 'N', NULL, NULL),
(165, NULL, NULL, 'sumit', 'das', 'USA', 20, 'California', 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', '54835ede-c98d-4693-b412-5ecc83b6474e', '2022-08-13 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '6.58', '2', '9202100000000000001102', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '3.00', '5.00', '3.00', 1, 'Y', 'N', 'cm', '10', '3.10', 'No', '3 shirts', '12.00', '0.00', '18.58', NULL, NULL, '0', '2022-08-13', NULL, NULL, '2022-08-12 06:28:39', NULL, '2022-08-12 06:28:39', 'N', NULL, NULL),
(166, NULL, NULL, 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das sumit das\",\"middle_name\":null,\"last_name\":\"sumit das sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9038234479\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '15.00', 'oz', '8d8f8db4-6dd8-4436-8b47-6a8f9d6064c1', '2022-08-13 00:00:00', NULL, 'created', '5.72', 'Merchandise', '0.00', '5.72', '2', '9200100000000001205372', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '10.00', '2.00', 0, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 shoes', '6.00', '0.00', '11.72', '9038234479', NULL, '0', '2022-08-12', NULL, NULL, '2022-08-12 08:56:25', NULL, '2022-08-12 08:56:25', 'N', NULL, NULL),
(167, NULL, '123', 'Rohit', 'Satra', 'Canada', 9, 'Ontario', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Satra sourav kundu\",\"middle_name\":null,\"last_name\":\"Rohit Satra sourav kundu\",\"company_name\":\"\",\"line1\":\"stesalit tower kolkata delhi mumbai\",\"line2\":\"saltlake city\",\"line3\":null,\"city\":\"Chennai\",\"state_province\":\"ON\",\"postal_code\":\"L0G 0A0\",\"phone_number\":\"6543212345\",\"email\":null,\"sms\":null,\"iso_country_code\":\"CA\"}', '2.00', 'oz', '08079e49-817c-4acf-858f-60f0071ae38d', '2022-08-13 00:00:00', NULL, 'created', '14.11', 'Gift and other', '0.00', '14.11', '15', 'LB300364560US', 'Commercial Base', 'FirstClassInternational', 'N', 'Parcel', '20.00', '10.00', '40.00', 1, 'Y', 'N', 'cm', '200', '0.00', 'Yes', '4shoes', '6.00', '3.48', '46.95', '6543212345', NULL, '0', '2022-08-19', NULL, NULL, '2022-08-12 09:17:42', NULL, '2022-08-12 09:17:42', 'N', NULL, NULL),
(168, NULL, '1992', 'Moupiya', 'Mukherjee', 'Canada', 9, 'Ontario', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Moupiya Mukherjee\",\"middle_name\":null,\"last_name\":\"Moupiya Mukherjee\",\"company_name\":\"\",\"line1\":\"stesalit tower kolkata delhi mumbai kandi\",\"line2\":\"saltlake city\",\"line3\":null,\"city\":\"Kolkata\",\"state_province\":\"ON\",\"postal_code\":\"L0G\",\"phone_number\":\"6543212345\",\"email\":null,\"sms\":null,\"iso_country_code\":\"CA\"}', '2.00', 'g', '27d788f2-d0ea-4e08-a829-ef877fd46d72', '2022-08-13 00:00:00', NULL, 'created', '14.11', 'Documents', '0.00', '14.11', '15', 'LB300364595US', 'Commercial Base', 'FirstClassInternational', 'N', 'Parcel', '20.00', '20.00', '20.00', 1, 'Y', 'N', 'cm', '200', '0.00', 'No', '4baby cloths and dipers', '6.00', '0.00', '43.47', '6543212345', NULL, '0', '2022-08-19', NULL, NULL, '2022-08-12 09:26:00', NULL, '2022-08-12 09:28:20', 'N', NULL, NULL),
(169, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-12 09:49:49', NULL, '2022-08-12 09:49:49', 'N', NULL, NULL),
(170, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-12 10:04:33', NULL, '2022-08-12 10:04:33', 'N', NULL, NULL),
(171, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 36, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'Y', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LVuo3LVtcUCLVBc0spVBq4w', '1111', NULL, NULL, NULL, '2022-08-12 10:09:32', NULL, '2022-08-18 12:20:28', 'Y', '2022-08-18 12:20:28', 1),
(172, NULL, '1932', 'Sumit', 'Das', 'Canada', 9, 'Ontario', 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Sumit Das Testing\",\"middle_name\":null,\"last_name\":\"Sumit Das Testing\",\"company_name\":\"\",\"line1\":\"stesalit tower kolkata delhi mumbai kandi\",\"line2\":\"saltlake city AA 29 prafulla kanan 2nd floor\",\"line3\":null,\"city\":\"Chennai\",\"state_province\":\"ON\",\"postal_code\":\"L0G 0A0\",\"phone_number\":\"6543212335\",\"email\":null,\"sms\":null,\"iso_country_code\":\"CA\"}', '2.00', 'oz', 'd227776c-1ce4-419b-b82f-bad88279fae5', '2022-08-13 00:00:00', NULL, 'created', '14.11', 'Gift and other', '0.00', '14.11', '15', 'LB300364600US', 'Commercial Base', 'FirstClassInternational', 'N', 'Parcel', '10.00', '10.00', '50.00', 1, 'Y', 'N', 'cm', '200', '0.00', 'Yes', '4baby cloths and dipers,food,baloons', '6.00', '3.48', '46.95', '6543212335', NULL, '0', '2022-08-20', NULL, NULL, '2022-08-12 10:42:53', NULL, '2022-08-12 10:42:53', 'N', NULL, NULL);
INSERT INTO `mb_shipments` (`id`, `request_id`, `order_id`, `first_name`, `last_name`, `country_name`, `state_id`, `state_name`, `is_signature_confirm`, `user_id`, `is_import`, `from_address`, `to_address`, `weight`, `weight_unit`, `reference`, `postmark_date`, `status_code`, `status`, `postage_amount`, `package_content`, `discounted_amount`, `total_amount`, `estimated_delivery_days`, `tracking_numbers`, `pricing`, `mail_class`, `is_coupon_applied`, `shape`, `width`, `height`, `length`, `is_paid`, `is_pending`, `is_refund_request`, `shape_unit`, `reatil_value`, `fees_amount`, `is_insurance`, `parcel_description`, `client_profit_price`, `insurance_price`, `totalpay`, `phone_number`, `transaction_id`, `credit_amount`, `shiping_date`, `refund_detail`, `shipping_status`, `created_at`, `updated_by`, `updated_at`, `is_deleted`, `deleted_at`, `deleted_by`) VALUES
(173, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '11.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-12 11:12:10', NULL, '2022-08-12 11:12:10', 'N', NULL, NULL),
(174, NULL, NULL, 'mounir', 'mounir', 'USA', 62, 'Washington', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"mounir\",\"middle_name\":null,\"last_name\":\"mounir\",\"company_name\":\"\",\"line1\":\"862 Peace Portal Dr\",\"line2\":\"PMB Number: 6142\",\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '55.00', 'g', '821f58c0-bbd2-4733-832a-d402f5bb32fb', '2022-08-14 00:00:00', NULL, 'created', '3.37', 'Merchandise', '0.00', '3.37', '2', '9200100000000001205945', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '7.00', '3.00', '12.00', 1, 'Y', 'N', 'in', '44', '0.00', 'No', 'silk', '14.00', '0.00', '17.37', NULL, NULL, '0', '2022-08-19', NULL, NULL, '2022-08-13 01:10:19', NULL, '2022-08-13 01:10:19', 'N', NULL, NULL),
(175, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, '81', 'In Transit', '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'N', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '6.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-14 08:37:20', NULL, '2022-08-14 20:33:54', 'N', NULL, NULL),
(176, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 36, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'Y', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LXMgvLVtcUCLVBc10ZTzNgN', '100', NULL, NULL, NULL, '2022-08-16 10:08:10', NULL, '2022-08-18 12:20:21', 'Y', '2022-08-18 12:20:21', 1),
(177, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '6.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-16 10:56:02', NULL, '2022-08-16 10:56:02', 'N', NULL, NULL),
(178, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '6.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-16 12:32:22', NULL, '2022-08-16 12:32:22', 'N', NULL, NULL),
(179, NULL, NULL, 'John1', 'Due2 ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John1\",\"middle_name\":null,\"last_name\":\"Due2 \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984568\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '5.00', '3.00', '4.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test1', NULL, NULL, '6.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-16 12:32:23', NULL, '2022-08-16 12:32:23', 'N', NULL, NULL),
(180, NULL, NULL, 'John2', 'Due 3', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John2\",\"middle_name\":null,\"last_name\":\"Due 3\",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984569\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '6.00', '4.00', '5.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test2', NULL, NULL, '6.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-16 12:32:24', NULL, '2022-08-16 12:32:24', 'N', NULL, NULL),
(181, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 1, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '6.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-17 08:46:27', NULL, '2022-08-17 08:46:27', 'N', NULL, NULL),
(182, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '6.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-17 13:33:03', NULL, '2022-08-17 13:33:03', 'N', NULL, NULL),
(183, NULL, '1234567', 'Moupiya', 'Mukherjee', 'Canada', 9, 'Ontario', 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Moupiya Mukherjee\",\"middle_name\":null,\"last_name\":\"Moupiya Mukherjee\",\"company_name\":\"\",\"line1\":\"Stesalit tower\",\"line2\":\"Salt lake city\",\"line3\":null,\"city\":\"Spring Valley\",\"state_province\":\"ON\",\"postal_code\":\"N0A 0C0\",\"phone_number\":\"9876546520\",\"email\":null,\"sms\":null,\"iso_country_code\":\"CA\"}', '22.00', 'g', 'a185a3a5-e3ea-41ea-82b3-27fcb51adc86', '2022-08-19 00:00:00', NULL, 'created', '14.11', 'Gift and other', '0.00', '14.11', '15', 'LB300364689US', 'Commercial Base', 'FirstClassInternational', 'N', 'Parcel', '20.00', '10.00', '20.00', 1, 'Y', 'N', 'cm', '200', '0.00', 'Yes', '4baby shoes', '0.99', '3.08', '41.54', '9876546520', NULL, '0', '2022-08-19', NULL, NULL, '2022-08-18 05:48:55', NULL, '2022-08-18 05:48:55', 'N', NULL, NULL),
(184, NULL, '1234567', 'Moupiya', 'Mukherjee', 'Canada', 9, 'Ontario', 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Moupiya Mukherjee\",\"middle_name\":null,\"last_name\":\"Moupiya Mukherjee\",\"company_name\":\"\",\"line1\":\"Stesalit tower\",\"line2\":\"Salt lake city\",\"line3\":null,\"city\":\"Spring Valley\",\"state_province\":\"ON\",\"postal_code\":\"N0A 0C0\",\"phone_number\":\"9876546520\",\"email\":null,\"sms\":null,\"iso_country_code\":\"CA\"}', '22.00', 'g', '0c169d56-da9a-4af5-af81-1f04241353ab', '2022-08-19 00:00:00', '81', 'In Transit', '14.11', 'Gift and other', '0.00', '14.11', '15', 'LB300364692US', 'Commercial Base', 'FirstClassInternational', 'N', 'Parcel', '20.00', '10.00', '20.00', 1, 'N', 'N', 'cm', '200', '0.00', 'Yes', '4baby shoes', '0.99', '3.08', '41.54', '9876546520', NULL, '0', '2022-08-19', NULL, NULL, '2022-08-18 05:49:00', NULL, '2022-08-22 07:18:40', 'N', NULL, NULL),
(185, NULL, '987456', 'Rohit', 'Santra', 'USA', 20, 'California', 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St  PALO ALTO\",\"line2\":\"Salt lake city\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9876546520\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '22.00', 'g', 'ca6c4464-f83c-4440-a8ab-f0c488097903', '2022-08-19 00:00:00', NULL, 'created', '3.48', 'Gift and other', '0.00', '6.58', '2', '9202100000000000001126', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '20.00', '10.00', '20.00', 1, 'Y', 'N', 'cm', '200', '3.10', 'No', '4baby shoes', '0.99', '0.00', '7.57', '9876546520', NULL, '0', '2022-08-26', NULL, NULL, '2022-08-18 06:03:49', NULL, '2022-08-18 06:03:49', 'N', NULL, NULL),
(186, NULL, '987456', 'Rohit', 'Santra', 'USA', 20, 'California', 'Yes', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St  PALO ALTO\",\"line2\":\"Salt lake city\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9876546520\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '22.00', 'g', '75bd0d8e-3e8d-4c1e-9dac-4d86873519d4', '2022-08-19 00:00:00', NULL, 'created', '3.48', 'Gift and other', '0.00', '6.58', '2', '9202100000000000001133', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '20.00', '10.00', '20.00', 1, 'Y', 'Y', 'cm', '200', '3.10', 'No', '4baby shoes', '0.99', '0.00', '7.57', '9876546520', NULL, '0', '2022-08-26', NULL, NULL, '2022-08-18 06:03:53', NULL, '2022-08-18 06:03:53', 'N', NULL, NULL),
(187, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '6.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-18 06:44:11', NULL, '2022-08-18 06:44:11', 'N', NULL, NULL),
(188, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '6.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-18 07:14:17', NULL, '2022-08-18 07:14:17', 'N', NULL, NULL),
(189, NULL, NULL, 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', 'ed4db74a-46bc-40f4-886c-fa5d7b4aa14a', '2022-08-19 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '3.48', '2', '9200100000000001232712', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '2.00', '8.00', 1, 'Y', 'N', 'cm', '100', '0.00', 'Yes', 'hghg', '4.00', '8.00', '15.48', NULL, NULL, '0', '2022-08-18', NULL, NULL, '2022-08-18 11:56:05', NULL, '2022-08-18 11:56:05', 'N', NULL, NULL),
(190, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '9.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-18 11:56:43', NULL, '2022-08-18 11:56:43', 'N', NULL, NULL),
(191, NULL, NULL, 'John1', 'Due2 ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John1\",\"middle_name\":null,\"last_name\":\"Due2 \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984568\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '5.00', '3.00', '4.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test1', NULL, NULL, '9.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-18 11:56:45', NULL, '2022-08-18 11:56:45', 'Y', NULL, NULL),
(192, NULL, NULL, 'John2', 'Due 3', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John2\",\"middle_name\":null,\"last_name\":\"Due 3\",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984569\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '4.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '6.00', '4.00', '5.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test2', NULL, NULL, '9.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-18 11:56:46', NULL, '2022-08-18 11:56:46', 'Y', NULL, NULL),
(193, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 1, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '9.91', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-18 12:49:27', NULL, '2022-08-18 12:49:27', 'N', NULL, NULL),
(194, NULL, '654', 'Moupiya', 'Mukherjee', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Moupiya Mukherjee\",\"middle_name\":null,\"last_name\":\"Moupiya Mukherjee\",\"company_name\":\"\",\"line1\":\"4100 Orme St  PALO ALTO\",\"line2\":\"Salt lake city\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9876546520\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '23.00', 'g', '439eb4fa-3d84-43d6-b71c-a35ae1040b8e', '2022-08-19 00:00:00', NULL, 'created', '3.48', 'Gift and other', '0.00', '3.48', '2', '9200100000000001232729', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '30.00', '10.00', '30.00', 1, 'Y', 'N', 'cm', '100', '0.00', 'No', '4baby shoes and dresses', '4.00', '0.00', '7.48', '9876546520', NULL, '0', '2022-08-19', NULL, NULL, '2022-08-18 12:54:57', NULL, '2022-08-18 12:54:57', 'N', NULL, NULL),
(195, NULL, '654', 'Moupiya', 'Mukherjee', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Moupiya Mukherjee\",\"middle_name\":null,\"last_name\":\"Moupiya Mukherjee\",\"company_name\":\"\",\"line1\":\"4100 Orme St  PALO ALTO\",\"line2\":\"Salt lake city\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9876546520\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '23.00', 'g', 'd690067f-93b9-4e5d-b8e3-2069ae0e7eb1', '2022-08-19 00:00:00', NULL, 'created', '3.48', 'Gift and other', '0.00', '3.48', '2', '9200100000000001232736', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '30.00', '10.00', '30.00', 1, 'Y', 'N', 'cm', '100', '0.00', 'No', '4baby shoes and dresses', '4.00', '0.00', '7.48', '9876546520', NULL, '0', '2022-08-19', NULL, NULL, '2022-08-18 12:55:02', NULL, '2022-08-18 12:55:02', 'N', NULL, NULL),
(196, NULL, '987456', 'Moupiya', 'MukherjeeTest', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Moupiya MukherjeeTest\",\"middle_name\":null,\"last_name\":\"Moupiya MukherjeeTest\",\"company_name\":\"\",\"line1\":\"4100 Orme St  PALO ALTO\",\"line2\":\"Salt lake city\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"9874563210\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '23.00', 'g', '58d62150-867e-4460-9e15-6e290621916b', '2022-08-19 00:00:00', NULL, 'created', '7.75', 'Gift and other', '0.00', '7.75', '2', '9205500000000001362740', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '12.00', '12.00', '12.00', 1, 'Y', 'N', 'cm', '100', '0.00', 'No', '4baby shoes and dresses', '1.00', '0.00', '8.75', '9874563210', NULL, '0', '2022-08-19', NULL, NULL, '2022-08-18 13:26:42', NULL, '2022-08-18 13:26:42', 'N', NULL, NULL),
(197, NULL, '987456', 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St  PALO ALTO\",\"line2\":\"Salt lake city\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '12.00', 'g', '6cfb419d-de8e-459e-9960-60d9ff7a5662', '2022-08-19 00:00:00', NULL, 'created', '7.75', 'Gift and other', '0.00', '7.75', '2', '9205500000000001362757', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '20.00', '10.00', '20.00', 1, 'Y', 'N', 'cm', '100', '0.00', 'No', '4baby shoes and dresses', '10.00', '0.00', '17.75', NULL, NULL, '0', '2022-08-19', NULL, NULL, '2022-08-18 13:47:10', NULL, '2022-08-18 13:47:10', 'N', NULL, NULL),
(198, NULL, NULL, 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'oz', '4374920a-3953-46ff-855c-691e23de2509', '2022-08-20 00:00:00', NULL, 'created', '3.48', 'Documents', '0.00', '3.48', '2', '9200100000000001234341', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 0, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '2.00', '0.00', '5.48', NULL, NULL, '0', '2022-08-19', NULL, NULL, '2022-08-19 05:28:21', NULL, '2022-08-19 05:28:21', 'N', NULL, NULL),
(199, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 54, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'Y', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LYOkoLVtcUCLVBc0pCOeK6f', '4999', NULL, NULL, NULL, '2022-08-19 06:32:27', NULL, '2022-08-19 06:32:27', 'N', NULL, NULL),
(200, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'Yes', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1.00', 'g', '3f0f0230-e920-4400-85fe-2c4a47ad1eb5', '2022-08-20 00:00:00', NULL, 'created', '3.48', 'Gift and other', '0.00', '6.58', '2', '9202100000000000001140', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '3.10', 'Yes', '3 Cotton Candy', '11.00', '1.41', '18.99', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 06:33:44', NULL, '2022-08-19 06:33:44', 'N', NULL, NULL),
(201, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1.00', 'g', '8871bf75-0689-47f7-9094-626e4c50e1e9', '2022-08-20 00:00:00', NULL, 'created', '3.48', 'Gift and other', '0.00', '3.48', '2', '9200100000000001234563', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '11.00', '0.00', '14.48', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 06:40:00', NULL, '2022-08-19 06:40:00', 'N', NULL, NULL),
(202, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '100.99', 'g', '43b8fa1b-e343-4990-b029-9ecbfeb09286', '2022-08-20 00:00:00', NULL, 'created', '3.48', 'Gift and other', '0.00', '3.48', '2', '9200100000000001234570', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '11.00', '0.00', '14.48', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 06:42:20', NULL, '2022-08-19 06:42:20', 'N', NULL, NULL),
(203, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '101.00', 'g', '15535656-acc0-47a4-a865-013004d2c101', '2022-08-20 00:00:00', NULL, 'created', '3.48', 'Sample', '0.00', '3.48', '2', '9200100000000001234587', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '12.00', '0.00', '15.48', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 06:43:49', NULL, '2022-08-19 06:43:49', 'N', NULL, NULL),
(204, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '249.00', 'g', 'a88f5cdb-c7e9-4364-9e29-6516f22378e7', '2022-08-20 00:00:00', NULL, 'created', '4.50', 'Gift and other', '0.00', '4.50', '2', '9200100000000001234754', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '12.00', '0.00', '16.50', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 07:30:54', NULL, '2022-08-19 07:30:54', 'N', NULL, NULL),
(205, NULL, NULL, 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '249.00', 'g', '83a98a2d-4d98-42e6-9689-27e244b77cec', '2022-08-20 00:00:00', NULL, 'created', '4.50', 'Documents', '0.00', '4.50', '2', '9200100000000001234761', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '8.00', '8.00', '8.00', 1, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '12.00', '0.00', '16.50', NULL, NULL, '0', '2022-08-19', NULL, NULL, '2022-08-19 07:35:48', NULL, '2022-08-19 07:35:48', 'N', NULL, NULL),
(206, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '249.99', 'g', 'ee71efbe-cfed-4bcb-9bec-e87e236bb143', '2022-08-20 00:00:00', NULL, 'created', '4.50', 'Sample', '0.00', '4.50', '2', '9200100000000001234778', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '12.00', '0.00', '16.50', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 07:37:35', NULL, '2022-08-19 07:37:35', 'N', NULL, NULL),
(207, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '250.99', 'g', 'eea25eeb-e095-400b-ba9e-68cfe18b8368', '2022-08-20 00:00:00', NULL, 'created', '4.50', 'Documents', '0.00', '4.50', '2', '9200100000000001234785', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '12.00', '0.00', '16.50', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 07:39:04', NULL, '2022-08-19 07:39:04', 'N', NULL, NULL),
(208, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '251.00', 'g', 'e6931fdd-6cdb-425d-9e7d-4be3126ce970', '2022-08-20 00:00:00', NULL, 'created', '4.50', 'Documents', '0.00', '4.50', '2', '9200100000000001234792', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '13.00', '0.00', '17.50', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 07:40:07', NULL, '2022-08-19 07:40:07', 'N', NULL, NULL),
(209, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '452.99', 'g', '4ea9ea3a-cbf8-4d36-9bf3-55f7b07d1001', '2022-08-20 00:00:00', NULL, 'created', '8.12', 'Documents', '0.00', '8.12', '2', '9205500000000001363310', 'Commercial Base', 'Priority', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '13.00', '0.00', '21.12', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 07:41:35', NULL, '2022-08-19 07:41:35', 'N', NULL, NULL),
(210, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '453.00', 'g', '09a97bac-5985-4604-a4a8-e6169e10ded9', '2022-08-20 00:00:00', NULL, 'created', '8.12', 'Sample', '0.00', '8.12', '2', '9205500000000001363341', 'Commercial Base', 'Priority', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '14.00', '0.00', '22.12', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 07:45:13', NULL, '2022-08-19 07:45:13', 'N', NULL, NULL),
(211, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '999.99', 'g', 'b15a77c5-63eb-42a7-820b-c21d005695a2', '2022-08-20 00:00:00', NULL, 'created', '9.93', 'Sample', '0.00', '9.93', '2', '9205500000000001363372', 'Commercial Base', 'Priority', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '14.00', '0.00', '23.93', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 07:46:33', NULL, '2022-08-19 07:46:33', 'N', NULL, NULL),
(212, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1000.00', 'g', '18f1b69d-2d91-4c32-bf57-0b737373c5d1', '2022-08-20 00:00:00', NULL, 'created', '9.93', 'Sample', '0.00', '9.93', '2', '9205500000000001363389', 'Commercial Base', 'Priority', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '15.00', '0.00', '24.93', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 07:48:52', NULL, '2022-08-19 07:48:52', 'N', NULL, NULL),
(213, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1.00', 'oz', '305fe085-9206-4f0a-84b3-551f957f23b5', '2022-08-20 00:00:00', NULL, 'created', '3.48', 'Sample', '0.00', '3.48', '2', '9200100000000001234907', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '16.00', '0.00', '19.48', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:23:44', NULL, '2022-08-19 08:23:44', 'N', NULL, NULL),
(214, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.52', 'oz', 'c5f2e42f-fbff-4d8e-b71a-40a63f23316f', '2022-08-20 00:00:00', NULL, 'created', '3.48', 'Sample', '0.00', '3.48', '2', '9200100000000001234914', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '16.00', '0.00', '19.48', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:25:09', NULL, '2022-08-19 08:25:09', 'N', NULL, NULL),
(215, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.53', 'oz', '86d7af8e-7de8-4150-8b93-fa3a2e873cd6', '2022-08-20 00:00:00', NULL, 'created', '3.48', 'Sample', '0.00', '3.48', '2', '9200100000000001234921', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '17.00', '0.00', '20.48', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:26:24', NULL, '2022-08-19 08:26:24', 'N', NULL, NULL),
(216, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '8.84', 'oz', '2c2cb3b5-af6e-4c37-ab26-d35bca3eab07', '2022-08-20 00:00:00', NULL, 'created', '4.50', 'Sample', '0.00', '4.50', '2', '9200100000000001234938', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '17.00', '0.00', '21.50', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:28:04', NULL, '2022-08-19 08:28:04', 'N', NULL, NULL),
(217, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '8.85', 'oz', 'e429172c-76b9-4ca6-b1dd-19414165eac3', '2022-08-20 00:00:00', NULL, 'created', '4.50', 'Sample', '0.00', '4.50', '2', '9200100000000001234983', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '18.00', '0.00', '22.50', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:31:06', NULL, '2022-08-19 08:31:06', 'N', NULL, NULL);
INSERT INTO `mb_shipments` (`id`, `request_id`, `order_id`, `first_name`, `last_name`, `country_name`, `state_id`, `state_name`, `is_signature_confirm`, `user_id`, `is_import`, `from_address`, `to_address`, `weight`, `weight_unit`, `reference`, `postmark_date`, `status_code`, `status`, `postage_amount`, `package_content`, `discounted_amount`, `total_amount`, `estimated_delivery_days`, `tracking_numbers`, `pricing`, `mail_class`, `is_coupon_applied`, `shape`, `width`, `height`, `length`, `is_paid`, `is_pending`, `is_refund_request`, `shape_unit`, `reatil_value`, `fees_amount`, `is_insurance`, `parcel_description`, `client_profit_price`, `insurance_price`, `totalpay`, `phone_number`, `transaction_id`, `credit_amount`, `shiping_date`, `refund_detail`, `shipping_status`, `created_at`, `updated_by`, `updated_at`, `is_deleted`, `deleted_at`, `deleted_by`) VALUES
(218, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '15.97', 'oz', 'aa054eb5-6fa4-4d07-9060-08d0f85383c9', '2022-08-20 00:00:00', NULL, 'created', '8.12', 'Sample', '0.00', '8.12', '2', '9205500000000001363396', 'Commercial Base', 'Priority', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '18.00', '0.00', '26.12', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:32:34', NULL, '2022-08-19 08:32:34', 'N', NULL, NULL),
(219, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '15.98', 'oz', 'f8705fa2-b4bf-45b7-9cc0-bec25bd45f7b', '2022-08-20 00:00:00', NULL, 'created', '8.12', 'Sample', '0.00', '8.12', '2', '9205500000000001363402', 'Commercial Base', 'Priority', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '19.00', '0.00', '27.12', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:34:32', NULL, '2022-08-19 08:34:32', 'N', NULL, NULL),
(220, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '35.97', 'oz', 'ab79f8a5-bd37-4d8c-9c43-216dc0891241', '2022-08-20 00:00:00', NULL, 'created', '9.93', 'Sample', '0.00', '9.93', '2', '9205500000000001363457', 'Commercial Base', 'Priority', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '20.00', '0.00', '29.93', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:37:16', NULL, '2022-08-19 08:37:16', 'N', NULL, NULL),
(221, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '35.27', 'oz', '3530acd1-16fe-4e38-8aa5-244c530a7fba', '2022-08-20 00:00:00', NULL, 'created', '9.93', 'Sample', '0.00', '9.93', '2', '9205500000000001363464', 'Commercial Base', 'Priority', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '19.00', '0.00', '28.93', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:39:16', NULL, '2022-08-19 08:39:16', 'N', NULL, NULL),
(222, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '35.28', 'oz', 'a2db1ddb-bfe8-4857-b0db-9223ccd9602a', '2022-08-20 00:00:00', NULL, 'created', '9.93', 'Documents', '0.00', '9.93', '2', '9205500000000001363532', 'Commercial Base', 'Priority', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '20.00', '0.00', '29.93', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:41:12', NULL, '2022-08-19 08:41:12', 'N', NULL, NULL),
(223, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1.00', 'g', '909d98e0-6520-4b75-a1b7-3bfa3599edd2', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Sample', '0.00', '7.75', '2', '9205500000000001363549', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '21.00', '0.00', '28.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:46:55', NULL, '2022-08-19 08:46:55', 'N', NULL, NULL),
(224, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '100.99', 'g', '6fe66b6b-6599-40a8-91c0-4ab434f32238', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363556', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '21.00', '0.00', '28.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:49:10', NULL, '2022-08-19 08:49:10', 'N', NULL, NULL),
(225, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '101.00', 'g', 'f6b66981-9fd8-4142-958e-029abc854af9', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Sample', '0.00', '7.75', '2', '9205500000000001363563', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '22.00', '0.00', '29.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:51:16', NULL, '2022-08-19 08:51:16', 'N', NULL, NULL),
(226, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '250.99', 'g', 'b16fc88c-cdff-4b55-99a9-142fabfabdf0', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Sample', '0.00', '7.75', '2', '9205500000000001363570', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '22.00', '0.00', '29.75', NULL, NULL, '0', '2022-08-27', NULL, NULL, '2022-08-19 08:52:50', NULL, '2022-08-19 08:52:50', 'N', NULL, NULL),
(227, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '251.00', 'g', 'c26ff1d4-1da1-4b8e-8e1e-1525573afe5f', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Sample', '0.00', '7.75', '2', '9205500000000001363587', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '23.00', '0.00', '30.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:55:21', NULL, '2022-08-19 08:55:21', 'N', NULL, NULL),
(228, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '452.99', 'g', '048f6df8-905b-4749-9542-e73d0dbb82d1', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363594', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '23.00', '0.00', '30.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:56:55', NULL, '2022-08-19 08:56:55', 'N', NULL, NULL),
(229, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '453.00', 'g', 'b2bfe786-1803-4631-9b0a-f8bbdce34702', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Sample', '0.00', '7.75', '2', '9205500000000001363600', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '24.00', '0.00', '31.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:58:49', NULL, '2022-08-19 08:58:49', 'N', NULL, NULL),
(230, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '999.99', 'g', '063964b5-bfff-4e57-8699-ba701ce869fa', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363617', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '24.00', '0.00', '31.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 08:59:59', NULL, '2022-08-19 08:59:59', 'N', NULL, NULL),
(231, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1000.00', 'g', 'd4634397-3222-4d8f-b874-36592aba29cb', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363624', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'in', '400', '0.00', 'No', '3 Cotton Candy', '25.00', '0.00', '32.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:00:55', NULL, '2022-08-19 09:00:55', 'N', NULL, NULL),
(232, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '1.00', 'oz', '3fbab64b-a1c9-4373-958d-0fb4171e533c', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363631', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '26.00', '0.00', '33.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:02:48', NULL, '2022-08-19 09:02:48', 'N', NULL, NULL),
(233, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.52', 'oz', 'c99b4c51-c37f-4394-9a7f-042ea3055ad9', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363648', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '26.00', '0.00', '33.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:04:04', NULL, '2022-08-19 09:04:04', 'N', NULL, NULL),
(234, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.53', 'oz', 'f4038155-aa4b-4694-b14a-cb52d157147a', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363655', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '27.00', '0.00', '34.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:05:25', NULL, '2022-08-19 09:05:25', 'N', NULL, NULL),
(235, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '8.84', 'oz', '1b19e434-3117-4562-bfb4-d99835561e1e', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363662', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '27.00', '0.00', '34.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:06:33', NULL, '2022-08-19 09:06:33', 'N', NULL, NULL),
(236, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '8.85', 'oz', '976bbf54-88e0-419f-a67d-ea78b47e6010', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363679', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '28.00', '0.00', '35.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:07:31', NULL, '2022-08-19 09:07:31', 'N', NULL, NULL),
(237, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '15.97', 'oz', '53861186-be6b-4aa1-a63e-46a24e92d738', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363686', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '28.00', '0.00', '35.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:08:36', NULL, '2022-08-19 09:08:36', 'N', NULL, NULL),
(238, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '15.98', 'oz', '2f638426-7bdd-4992-a469-aa6afd8ffb95', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363693', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '29.00', '0.00', '36.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:10:38', NULL, '2022-08-19 09:10:38', 'N', NULL, NULL),
(239, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '35.27', 'oz', '4ab76dba-42b1-438a-ad32-43be25b6eec3', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Merchandise', '0.00', '7.75', '2', '9205500000000001363709', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '29.00', '0.00', '36.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:11:52', NULL, '2022-08-19 09:11:52', 'N', NULL, NULL),
(240, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '35.28', 'oz', '2cece34a-fd47-4e2f-9e27-98634bb59872', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Documents', '0.00', '7.75', '2', '9205500000000001363716', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '2.00', '2.00', '2.00', 1, 'Y', 'N', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '30.00', '0.00', '37.75', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:13:06', NULL, '2022-08-19 09:13:06', 'N', NULL, NULL),
(241, NULL, NULL, 'Rohit', 'Santra', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit Santra\",\"middle_name\":null,\"last_name\":\"Rohit Santra\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '70.55', 'oz', '7d33a6b1-b334-4eec-94f9-01936efc8abe', '2022-08-20 00:00:00', NULL, 'created', '12.71', 'Merchandise', '0.00', '12.71', '2', '9205500000000001363723', 'Commercial Base', 'Priority', 'N', 'Parcel', '2.00', '2.00', '2.00', 1, 'Y', 'Y', 'cm', '400', '0.00', 'No', '3 Cotton Candy', '20.00', '0.00', '32.71', NULL, NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:15:14', NULL, '2022-08-19 09:15:14', 'N', NULL, NULL),
(242, NULL, NULL, 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'oz', '0608ec80-bde4-4091-9cea-4b6b010e2acf', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Gift and other', '0.00', '7.75', '2', '9205500000000001363952', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '5.00', '8.00', '4.00', 1, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '26.00', '0.00', '33.75', NULL, NULL, '0', '2022-08-19', NULL, NULL, '2022-08-19 09:19:15', NULL, '2022-08-19 11:03:04', 'N', NULL, NULL),
(243, NULL, '71112', 'Rohit', 'SantraRohit', 'USA', 20, 'California', 'No', 54, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"Rohit SantraRohit\",\"middle_name\":null,\"last_name\":\"Rohit SantraRohit\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH\",\"line2\":\"Maidan 21\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"1111111112\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', 'a07bb900-2038-4737-b0b1-78c91d24b62a', '2022-08-20 00:00:00', NULL, 'created', '7.75', 'Gift and other', '0.00', '7.75', '2', '9205500000000001363976', 'Commercial Base', 'Priority', 'N', 'FlatRateEnvelope', '3.00', '4.00', '3.00', 0, 'Y', 'N', 'in', '44', '0.00', 'No', '3 Cotton Candys', '21.00', '0.00', '28.75', '1111111112', NULL, '0', '2022-08-20', NULL, NULL, '2022-08-19 09:45:44', NULL, '2022-08-19 11:06:26', 'N', NULL, NULL),
(244, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'No', 36, 'N', NULL, NULL, NULL, NULL, NULL, NULL, '81', 'In Transit', NULL, NULL, NULL, '0.00', NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, 1, 'N', 'N', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, 'txn_3LYUDELVtcUCLVBc1OPpQ7nn', '300', NULL, NULL, NULL, '2022-08-19 12:22:09', NULL, '2022-08-21 01:58:36', 'N', NULL, NULL),
(245, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '6.21', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-21 02:56:40', NULL, '2022-08-21 02:56:40', 'Y', NULL, NULL),
(246, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '6.21', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-21 02:56:46', NULL, '2022-08-21 02:56:46', 'Y', NULL, NULL),
(247, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '5.91', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '6.21', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-21 03:00:34', NULL, '2022-08-21 03:00:34', 'Y', NULL, NULL),
(248, NULL, NULL, 'sumit', 'das', 'USA', 20, 'California', 'No', 36, 'N', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"sumit das\",\"middle_name\":null,\"last_name\":\"sumit das\",\"company_name\":\"\",\"line1\":\"4100 Orme St SOUTH CT\",\"line2\":\"\",\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.34', 'g', '1aff2948-03dd-4121-bb82-ac510448c901', '2022-08-23 00:00:00', NULL, 'created', '3.48', 'Merchandise', '0.00', '3.48', '2', '9200100000000001238967', 'Commercial Base', 'FirstClass', 'N', 'Parcel', '4.45', '3.00', '2.23', 1, 'Y', 'N', 'cm', '10', '0.00', 'No', '3 SHIRTS', '0.30', '0.00', '3.78', NULL, NULL, '0', '2022-08-22', NULL, NULL, '2022-08-22 06:47:57', NULL, '2022-08-22 06:47:57', 'N', NULL, NULL),
(249, NULL, NULL, 'John', 'Due ', 'USA', 0, NULL, 'No', 36, 'Y', '{\"first_name\":\"\",\"middle_name\":null,\"last_name\":\"\",\"company_name\":\"Mello Bridge\",\"line1\":\"701 Harrison Ave\",\"line2\":null,\"line3\":null,\"city\":\"BLAINE\",\"state_province\":\"WA\",\"postal_code\":\"98230\",\"phone_number\":\"\",\"email\":\"\",\"sms\":\"\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Due \",\"company_name\":\"RedBrick247\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"77984567\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '2.00', 'g', NULL, NULL, NULL, NULL, '3.48', NULL, NULL, '3.58', NULL, NULL, NULL, 'FirstClass', 'N', 'Parcel', '2.00', '2.00', '3.00', 0, 'Y', 'N', 'cm', NULL, NULL, 'No', 'test', NULL, NULL, '3.88', NULL, NULL, '0', NULL, NULL, NULL, '2022-08-25 13:21:55', NULL, '2022-08-25 13:21:55', 'N', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mb_shipments_bkp24jun2022`
--

CREATE TABLE `mb_shipments_bkp24jun2022` (
  `id` int NOT NULL,
  `request_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `order_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `is_signature_confirm` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `from_address` text NOT NULL,
  `to_address` text NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `weight_unit` varchar(255) NOT NULL,
  `reference` text NOT NULL,
  `postmark_date` datetime NOT NULL,
  `status_code` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `postage_amount` decimal(10,2) NOT NULL,
  `discounted_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `estimated_delivery_days` varchar(255) NOT NULL,
  `tracking_numbers` text NOT NULL,
  `pricing` text NOT NULL,
  `mail_class` varchar(255) NOT NULL,
  `shape` varchar(255) NOT NULL,
  `width` decimal(10,2) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `length` decimal(10,2) NOT NULL,
  `shape_unit` varchar(100) NOT NULL,
  `parcel_description` text NOT NULL,
  `fees_amount` decimal(10,2) NOT NULL,
  `is_insurance_bkp` tinyint(1) NOT NULL DEFAULT '0',
  `client_profit_price` decimal(10,2) NOT NULL,
  `insurance_price` decimal(10,2) NOT NULL,
  `totalpay` decimal(10,2) NOT NULL,
  `shiping_date` varchar(255) NOT NULL,
  `refund_detail` text,
  `shipping_status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_shipments_bkp24jun2022`
--

INSERT INTO `mb_shipments_bkp24jun2022` (`id`, `request_id`, `order_id`, `first_name`, `last_name`, `is_signature_confirm`, `user_id`, `from_address`, `to_address`, `weight`, `weight_unit`, `reference`, `postmark_date`, `status_code`, `status`, `postage_amount`, `discounted_amount`, `total_amount`, `estimated_delivery_days`, `tracking_numbers`, `pricing`, `mail_class`, `shape`, `width`, `height`, `length`, `shape_unit`, `parcel_description`, `fees_amount`, `is_insurance_bkp`, `client_profit_price`, `insurance_price`, `totalpay`, `shiping_date`, `refund_detail`, `shipping_status`, `created_at`, `updated_by`, `updated_at`, `is_deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 'XHA829122', '', '', '', 2, 5, '{\"first_name\":\"sumit\",\"middle_name\":null,\"last_name\":\"Wilson\",\"company_name\":\"Redbrick247\",\"line1\":\"247 High St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94301\",\"phone_number\":\"6503915169\",\"email\":\"harry@redbrick247.com\",\"sms\":\"SMS4440404\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Doeeeeee\",\"company_name\":\"RedBrick2475su\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTOo\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"8884445554\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'lb', '07baddb3-fcd1-45c7-ac61-d023d99ed1f3', '2022-05-24 00:00:00', '', 'created', '7.37', '0.00', '7.37', '2.0', '9205500000000001064835', 'Commercial Base', 'First Class', '', '0.00', '0.00', '0.00', '', 'test description\r\n', '0.00', 0, '0.00', '0.00', '0.00', '', NULL, NULL, '2022-05-24 00:00:00', 1, '2022-05-27 08:33:24', 'N', '2022-05-24 09:04:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mb_shipments_bkp24jun2022.1`
--

CREATE TABLE `mb_shipments_bkp24jun2022.1` (
  `id` int NOT NULL,
  `request_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `order_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `is_signature_confirm` enum('Yes','No') NOT NULL DEFAULT 'No',
  `user_id` int DEFAULT NULL,
  `from_address` text NOT NULL,
  `to_address` text NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `weight_unit` varchar(255) NOT NULL,
  `reference` text NOT NULL,
  `postmark_date` datetime NOT NULL,
  `status_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `postage_amount` decimal(10,2) NOT NULL,
  `discounted_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `estimated_delivery_days` varchar(255) NOT NULL,
  `tracking_numbers` text NOT NULL,
  `pricing` text NOT NULL,
  `mail_class` varchar(255) NOT NULL,
  `shape` varchar(255) NOT NULL,
  `width` decimal(10,2) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `length` decimal(10,2) NOT NULL,
  `shape_unit` varchar(100) NOT NULL,
  `parcel_description` text NOT NULL,
  `fees_amount` decimal(10,2) NOT NULL,
  `is_insurance` enum('Yes','No') NOT NULL DEFAULT 'No',
  `client_profit_price` decimal(10,2) NOT NULL,
  `insurance_price` decimal(10,2) NOT NULL,
  `totalpay` decimal(10,2) NOT NULL,
  `shiping_date` varchar(255) NOT NULL,
  `refund_detail` text,
  `shipping_status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_shipments_bkp24jun2022.1`
--

INSERT INTO `mb_shipments_bkp24jun2022.1` (`id`, `request_id`, `order_id`, `first_name`, `last_name`, `is_signature_confirm`, `user_id`, `from_address`, `to_address`, `weight`, `weight_unit`, `reference`, `postmark_date`, `status_code`, `status`, `postage_amount`, `discounted_amount`, `total_amount`, `estimated_delivery_days`, `tracking_numbers`, `pricing`, `mail_class`, `shape`, `width`, `height`, `length`, `shape_unit`, `parcel_description`, `fees_amount`, `is_insurance`, `client_profit_price`, `insurance_price`, `totalpay`, `shiping_date`, `refund_detail`, `shipping_status`, `created_at`, `updated_by`, `updated_at`, `is_deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 'XHA829122', '', '', '', 'No', 5, '{\"first_name\":\"sumit\",\"middle_name\":null,\"last_name\":\"Wilson\",\"company_name\":\"Redbrick247\",\"line1\":\"247 High St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTO\",\"state_province\":\"CA\",\"postal_code\":\"94301\",\"phone_number\":\"6503915169\",\"email\":\"harry@redbrick247.com\",\"sms\":\"SMS4440404\",\"iso_country_code\":\"US\"}', '{\"first_name\":\"John\",\"middle_name\":null,\"last_name\":\"Doeeeeee\",\"company_name\":\"RedBrick2475su\",\"line1\":\"4100 Orme St\",\"line2\":null,\"line3\":null,\"city\":\"PALO ALTOo\",\"state_province\":\"CA\",\"postal_code\":\"94306\",\"phone_number\":\"8884445554\",\"email\":null,\"sms\":null,\"iso_country_code\":\"US\"}', '3.00', 'lb', '07baddb3-fcd1-45c7-ac61-d023d99ed1f3', '2022-05-24 00:00:00', '', 'created', '7.37', '0.00', '7.37', '2.0', '9205500000000001064835', 'Commercial Base', 'First Class', '', '0.00', '0.00', '0.00', '', 'test description\r\n', '0.00', '', '0.00', '0.00', '0.00', '', NULL, NULL, '2022-05-24 00:00:00', 1, '2022-05-27 08:33:24', 'N', '2022-05-24 09:04:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mb_shipment_tracking`
--

CREATE TABLE `mb_shipment_tracking` (
  `id` int NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `tracking_details` text NOT NULL,
  `tracking_by` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_shipment_tracking`
--

INSERT INTO `mb_shipment_tracking` (`id`, `tracking_number`, `tracking_details`, `tracking_by`, `created_at`, `updated_at`) VALUES
(43, '9205500000000001064835', '{\"code\":\"A0001\",\"error\":\"You need to sign in or sign up before continuing.\"}', 1, '2022-06-21 11:12:42', '2022-06-21 11:12:42'),
(44, '9200100000000001018033', '{\"code\":\"A0001\",\"error\":\"You need to sign in or sign up before continuing.\"}', 1, '2022-07-25 01:31:47', '2022-07-25 01:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `mb_states`
--

CREATE TABLE `mb_states` (
  `id` int NOT NULL,
  `country_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `state_code` varchar(100) NOT NULL,
  `status` enum('A','I','D') NOT NULL DEFAULT 'A',
  `created_at` datetime DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_states`
--

INSERT INTO `mb_states` (`id`, `country_id`, `name`, `state_code`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'Sumit3', '', 'A', '2022-06-06 09:41:42', 1, '2022-06-06 11:03:32', 1, 'Y', '2022-06-06 11:03:32', 1),
(3, 1, 'Los Angles', 'LA', 'A', '2022-06-07 06:00:20', 1, '2022-06-22 10:52:23', NULL, 'Y', '2022-06-22 10:52:23', 1),
(4, 2, 'Los vegas', 'La', 'A', '2022-06-16 11:53:42', 1, '2022-06-22 10:52:17', NULL, 'Y', '2022-06-22 10:52:17', 1),
(5, 1, 'Washington', 'WA', 'A', '2022-06-17 13:14:44', 1, '2022-06-17 13:14:51', NULL, 'Y', '2022-06-17 13:14:51', 1),
(6, 1, 'Alabama', 'AL', 'A', '2022-06-22 10:52:36', 1, '2022-06-22 10:52:36', NULL, 'N', NULL, NULL),
(7, 1, 'Alaska', 'AK', 'A', '2022-06-22 10:54:13', 1, '2022-06-22 10:54:13', NULL, 'N', NULL, NULL),
(8, 1, 'Arkansas', 'AR', 'A', '2022-06-22 10:54:41', 1, '2022-06-22 10:54:41', NULL, 'N', NULL, NULL),
(9, 2, 'Ontario', 'ON', 'A', '2022-06-22 11:01:32', 1, '2022-06-22 11:01:32', NULL, 'N', NULL, NULL),
(10, 2, 'Quebec', 'QC', 'A', '2022-06-22 11:01:50', 1, '2022-06-22 11:01:50', NULL, 'N', NULL, NULL),
(11, 2, 'Nova Scotia', 'NS', 'A', '2022-06-22 11:02:15', 1, '2022-06-22 11:02:15', NULL, 'N', NULL, NULL),
(12, 2, 'New Brunswick', 'NB', 'A', '2022-06-22 11:03:05', 1, '2022-06-22 11:03:05', NULL, 'N', NULL, NULL),
(13, 2, 'Manitoba', 'MB', 'A', '2022-06-22 11:03:22', 1, '2022-06-22 11:03:22', NULL, 'N', NULL, NULL),
(14, 2, 'British Columbia', 'BC', 'A', '2022-06-22 11:04:43', 1, '2022-06-22 11:04:43', NULL, 'N', NULL, NULL),
(15, 2, 'Prince Edward Island', 'PE', 'A', '2022-06-22 11:04:59', 1, '2022-06-22 11:04:59', NULL, 'N', NULL, NULL),
(16, 2, 'Saskatchewan', 'SK', 'A', '2022-06-22 11:05:18', 1, '2022-06-22 11:05:18', NULL, 'N', NULL, NULL),
(17, 2, 'Alberta', 'AB', 'A', '2022-06-22 11:05:37', 1, '2022-06-22 11:05:37', NULL, 'N', NULL, NULL),
(18, 2, 'Newfoundland and Labrador', 'NL', 'A', '2022-06-22 11:05:55', 1, '2022-06-22 11:05:55', NULL, 'N', NULL, NULL),
(19, 1, 'Arizona', 'AZ', 'A', '2022-06-22 11:11:30', 1, '2022-06-22 11:11:30', NULL, 'N', NULL, NULL),
(20, 1, 'California', 'CA', 'A', '2022-06-22 11:11:51', 1, '2022-06-22 11:11:51', NULL, 'N', NULL, NULL),
(21, 1, 'Colorado', 'CO', 'A', '2022-06-22 11:12:21', 1, '2022-06-22 11:12:21', NULL, 'N', NULL, NULL),
(22, 1, 'Connecticut', 'CT', 'A', '2022-06-22 11:12:36', 1, '2022-06-22 11:12:36', NULL, 'N', NULL, NULL),
(23, 1, 'Delaware', 'DE', 'A', '2022-06-22 11:14:35', 1, '2022-06-22 11:14:35', NULL, 'N', NULL, NULL),
(24, 1, 'Florida', 'FL', 'A', '2022-06-22 11:14:51', 1, '2022-06-22 11:14:51', NULL, 'N', NULL, NULL),
(25, 1, 'Georgia', 'GA', 'A', '2022-06-22 11:15:13', 1, '2022-06-22 11:15:13', NULL, 'N', NULL, NULL),
(26, 1, 'Hawaii', 'HI', 'A', '2022-06-22 11:15:28', 1, '2022-06-22 11:15:28', NULL, 'N', NULL, NULL),
(27, 1, 'Idaho', 'ID', 'A', '2022-06-22 11:15:42', 1, '2022-06-22 11:15:42', NULL, 'N', NULL, NULL),
(28, 1, 'Illinois', 'IL', 'A', '2022-06-22 11:15:57', 1, '2022-06-22 11:15:57', NULL, 'N', NULL, NULL),
(29, 1, 'Indiana', 'IN', 'A', '2022-06-22 11:16:12', 1, '2022-06-22 11:16:12', NULL, 'N', NULL, NULL),
(30, 1, 'Iowa', 'IA', 'A', '2022-06-22 11:16:34', 1, '2022-06-22 11:16:34', NULL, 'N', NULL, NULL),
(31, 1, 'Kansas', 'KS', 'A', '2022-06-22 11:17:08', 1, '2022-06-22 11:17:08', NULL, 'N', NULL, NULL),
(32, 1, 'Kentucky', 'KY', 'A', '2022-06-22 11:17:25', 1, '2022-06-22 11:17:25', NULL, 'N', NULL, NULL),
(33, 1, 'Louisiana', 'LA', 'A', '2022-06-22 11:18:17', 1, '2022-06-22 11:18:17', NULL, 'N', NULL, NULL),
(34, 1, 'Maine', 'ME', 'A', '2022-06-22 11:18:59', 1, '2022-06-22 11:18:59', NULL, 'N', NULL, NULL),
(35, 1, 'Maryland', 'MD', 'A', '2022-06-22 11:19:16', 1, '2022-06-22 11:19:16', NULL, 'N', NULL, NULL),
(36, 1, 'Massachusetts', 'MA', 'A', '2022-06-22 11:21:09', 1, '2022-06-22 11:21:09', NULL, 'N', NULL, NULL),
(37, 1, 'Michigan', 'MI', 'A', '2022-06-22 11:21:24', 1, '2022-06-22 11:21:24', NULL, 'N', NULL, NULL),
(38, 1, 'Minnesota', 'MN', 'A', '2022-06-22 11:21:42', 1, '2022-06-22 11:21:42', NULL, 'N', NULL, NULL),
(39, 1, 'Mississippi', 'MS', 'A', '2022-06-22 11:21:57', 1, '2022-06-22 11:21:57', NULL, 'N', NULL, NULL),
(40, 1, 'Missouri', 'MO', 'A', '2022-06-22 11:22:11', 1, '2022-06-22 11:22:11', NULL, 'N', NULL, NULL),
(41, 1, 'Montana', 'MT', 'A', '2022-06-22 11:22:26', 1, '2022-06-22 11:22:26', NULL, 'N', NULL, NULL),
(42, 1, 'Nebraska', 'NE', 'A', '2022-06-22 11:23:30', 1, '2022-06-22 11:23:30', NULL, 'N', NULL, NULL),
(43, 1, 'Nevada', 'NV', 'A', '2022-06-22 11:23:50', 1, '2022-06-22 11:23:50', NULL, 'N', NULL, NULL),
(44, 1, 'New Hampshire', 'NH', 'A', '2022-06-22 11:24:05', 1, '2022-06-22 11:24:05', NULL, 'N', NULL, NULL),
(45, 1, 'New Jersey', 'NJ', 'A', '2022-06-22 11:24:21', 1, '2022-06-22 11:24:21', NULL, 'N', NULL, NULL),
(46, 1, 'New Mexico', 'NM', 'A', '2022-06-22 11:24:36', 1, '2022-06-22 11:24:36', NULL, 'N', NULL, NULL),
(47, 1, 'New York', 'NY', 'A', '2022-06-22 11:24:50', 1, '2022-06-22 11:24:50', NULL, 'N', NULL, NULL),
(48, 1, 'North Carolina', 'NC', 'A', '2022-06-22 11:25:23', 1, '2022-06-22 11:25:23', NULL, 'N', NULL, NULL),
(49, 1, 'North Dakota', 'ND', 'A', '2022-06-22 11:25:43', 1, '2022-06-22 11:25:43', NULL, 'N', NULL, NULL),
(50, 1, 'Ohio', 'OH', 'A', '2022-06-22 11:26:00', 1, '2022-06-22 11:26:00', NULL, 'N', NULL, NULL),
(51, 1, 'Oklahoma', 'OK', 'A', '2022-06-22 11:26:17', 1, '2022-06-22 11:26:17', NULL, 'N', NULL, NULL),
(52, 1, 'Oregon', 'OR', 'A', '2022-06-22 11:26:32', 1, '2022-06-22 11:26:32', NULL, 'N', NULL, NULL),
(53, 1, 'Pennsylvania', 'PA', 'A', '2022-06-22 11:26:50', 1, '2022-06-22 11:26:50', NULL, 'N', NULL, NULL),
(54, 1, 'Rhode Island', 'RI', 'A', '2022-06-22 11:27:06', 1, '2022-06-22 11:27:06', NULL, 'N', NULL, NULL),
(55, 1, 'South Carolina', 'SC', 'A', '2022-06-22 11:27:21', 1, '2022-06-22 11:27:21', NULL, 'N', NULL, NULL),
(56, 1, 'South Dakota', 'SD', 'A', '2022-06-22 11:27:37', 1, '2022-06-22 11:27:37', NULL, 'N', NULL, NULL),
(57, 1, 'Tennessee', 'TN', 'A', '2022-06-22 11:27:51', 1, '2022-06-22 11:27:51', NULL, 'N', NULL, NULL),
(58, 1, 'Texas', 'TX', 'A', '2022-06-22 11:28:10', 1, '2022-06-22 11:28:10', NULL, 'N', NULL, NULL),
(59, 1, 'Utah', 'UT', 'A', '2022-06-22 11:28:23', 1, '2022-06-22 11:28:23', NULL, 'N', NULL, NULL),
(60, 1, 'Vermont', 'VT', 'A', '2022-06-22 11:28:35', 1, '2022-06-22 11:28:35', NULL, 'N', NULL, NULL),
(61, 1, 'Virginia', 'VA', 'A', '2022-06-22 11:28:55', 1, '2022-06-22 11:28:55', NULL, 'N', NULL, NULL),
(62, 1, 'Washington', 'WA', 'A', '2022-06-22 11:29:28', 1, '2022-06-22 11:29:28', NULL, 'N', NULL, NULL),
(63, 1, 'West Virginia', 'WV', 'A', '2022-06-22 11:29:44', 1, '2022-06-22 11:29:44', NULL, 'N', NULL, NULL),
(64, 1, 'Wisconsin', 'WI', 'A', '2022-06-22 11:30:00', 1, '2022-06-22 11:30:00', NULL, 'N', NULL, NULL),
(65, 1, 'Wyoming', 'WY', 'A', '2022-06-22 11:30:13', 1, '2022-06-22 11:30:13', NULL, 'N', NULL, NULL),
(66, 2, 'Yukon', 'YT', 'A', '2022-07-06 13:03:35', 1, '2022-07-06 13:03:35', NULL, 'N', NULL, NULL),
(67, 2, 'Northwest Territories', 'NT', 'A', '2022-07-06 13:04:05', 1, '2022-07-06 13:04:05', NULL, 'N', NULL, NULL),
(68, 2, 'Nunavut', 'NU', 'A', '2022-07-06 13:04:23', 1, '2022-07-06 13:04:23', NULL, 'N', NULL, NULL),
(69, 1, 'Puerto Rico', 'PR', 'A', '2022-08-17 06:28:33', 1, '2022-08-17 06:28:33', NULL, 'N', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mb_support`
--

CREATE TABLE `mb_support` (
  `id` bigint NOT NULL,
  `name` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `query` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `mb_support`
--

INSERT INTO `mb_support` (`id`, `name`, `email`, `query`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 'sumit', 'sumit@gmail.com', 'testing\r\n', '2022-05-22 18:30:00', '2022-05-23 02:34:12', 'N', '2022-05-23 02:34:12', 1),
(2, 'sumittest', 'sumit@gmail.com', 'd', '2022-07-29 08:24:02', '2022-07-29 08:24:02', 'N', NULL, NULL),
(3, '1', 'test@yopmail.com', 's', '2022-07-29 09:52:38', '2022-07-29 09:52:38', 'N', NULL, NULL),
(4, '1', 'test@yopmail.com', 's', '2022-07-29 09:52:40', '2022-07-29 09:52:40', 'N', NULL, NULL),
(6, 'Rohit SantraSourav kundu', 'rohit@yopmail.com', 'helloooo  testing testing', '2022-08-09 12:24:31', '2022-08-09 12:24:31', 'N', NULL, NULL),
(7, 'Rohit SantraSourav kundu', 'rohit@yopmail.com', 'helloooo  testing testing', '2022-08-09 12:24:33', '2022-08-09 12:24:33', 'N', NULL, NULL),
(8, 'S', 's@s.com', 'SADSAD', '2022-08-11 06:40:24', '2022-08-11 06:40:24', 'N', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mb_timezones`
--

CREATE TABLE `mb_timezones` (
  `id` int NOT NULL,
  `country_id` int DEFAULT NULL COMMENT 'Id of country table',
  `tz_name` varchar(255) DEFAULT NULL,
  `current_utc_offset` varchar(150) DEFAULT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A' COMMENT 'A => Active,  I => Inactive',
  `priority` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_timezones`
--

INSERT INTO `mb_timezones` (`id`, `country_id`, `tz_name`, `current_utc_offset`, `status`, `priority`, `created_at`, `updated_at`) VALUES
(1, 1, 'Asia/Kabul', '+04:30', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 12:07:10'),
(2, 2, 'Europe/Tirane', '+01:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:17'),
(3, 3, 'Africa/Algiers', '+01:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:17'),
(4, 4, 'Pacific/Pago_Pago', '-11:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:17'),
(5, 5, 'Europe/Andorra', '+01:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:17'),
(6, 6, 'Africa/Luanda', '+01:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(7, 7, 'America/Anguilla', '-04:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(8, 8, 'Antarctica/Casey', '+08:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(9, 8, 'Antarctica/Davis', '+07:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(10, 8, 'Antarctica/DumontDUrville', '+10:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(11, 8, 'Antarctica/Mawson', '+05:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(12, 8, 'Antarctica/McMurdo', '+13:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(13, 8, 'Antarctica/Palmer', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(14, 8, 'Antarctica/Rothera', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(15, 8, 'Antarctica/Syowa', '+03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(16, 8, 'Antarctica/Troll', 'UTC', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(17, 8, 'Antarctica/Vostok', '+06:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(18, 9, 'America/Antigua', '-04:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(19, 10, 'America/Argentina/Buenos_Aires', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(20, 10, 'America/Argentina/Catamarca', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(21, 10, 'America/Argentina/Cordoba', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(22, 10, 'America/Argentina/Jujuy', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(23, 10, 'America/Argentina/La_Rioja', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:18'),
(24, 10, 'America/Argentina/Mendoza', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:19'),
(25, 10, 'America/Argentina/Rio_Gallegos', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:19'),
(26, 10, 'America/Argentina/Salta', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:19'),
(27, 10, 'America/Argentina/San_Juan', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:19'),
(28, 10, 'America/Argentina/San_Luis', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:19'),
(29, 10, 'America/Argentina/Tucuman', '-03:00', 'A', 1, '2019-12-26 15:37:58', '2019-12-27 11:46:19'),
(30, 10, 'America/Argentina/Ushuaia', '-03:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(31, 11, 'Asia/Yerevan', '+04:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(32, 12, 'America/Aruba', '-04:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(33, 13, 'Antarctica/Macquarie', '+11:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(34, 13, 'Australia/Adelaide', '+10:30', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(35, 13, 'Australia/Brisbane', '+10:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(36, 13, 'Australia/Broken_Hill', '+10:30', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(37, 13, 'Australia/Currie', '+11:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(38, 13, 'Australia/Darwin', '+09:30', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(39, 13, 'Australia/Eucla', '+08:45', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(40, 13, 'Australia/Hobart', '+11:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:19'),
(41, 13, 'Australia/Lindeman', '+10:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(42, 13, 'Australia/Lord_Howe', '+11:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(43, 13, 'Australia/Melbourne', '+11:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(44, 13, 'Australia/Perth', '+08:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(45, 13, 'Australia/Sydney', '+11:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(46, 14, 'Europe/Vienna', '+01:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(47, 15, 'Asia/Baku', '+04:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(48, 16, 'America/Nassau', '-05:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(49, 17, 'Asia/Bahrain', '+03:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(50, 18, 'Asia/Dhaka', '+06:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(51, 19, 'America/Barbados', '-04:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(52, 20, 'Europe/Minsk', '+03:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(53, 21, 'Europe/Brussels', '+01:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(54, 22, 'America/Belize', '-06:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(55, 23, 'Africa/Porto-Novo', '+01:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(56, 24, 'Atlantic/Bermuda', '-04:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:20'),
(57, 25, 'Asia/Thimphu', '+06:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:21'),
(58, 26, 'America/La_Paz', '-04:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:46:21'),
(60, 27, 'Europe/Sarajevo', '+01:00', 'A', 1, '2019-12-26 15:54:22', '2019-12-27 11:47:59'),
(61, 28, 'Africa/Gaborone', '+02:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:47:59'),
(62, 30, 'America/Araguaina', '-03:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:47:59'),
(63, 30, 'America/Bahia', '-03:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:47:59'),
(64, 30, 'America/Belem', '-03:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:47:59'),
(65, 30, 'America/Boa_Vista', '-04:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:47:59'),
(66, 30, 'America/Campo_Grande', '-04:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:47:59'),
(67, 30, 'America/Cuiaba', '-04:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(68, 30, 'America/Eirunepe', '-05:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(69, 30, 'America/Fortaleza', '-03:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(70, 30, 'America/Maceio', '-03:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(71, 30, 'America/Manaus', '-04:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(72, 30, 'America/Noronha', '-02:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(73, 30, 'America/Porto_Velho', '-04:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(74, 30, 'America/Recife', '-03:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(75, 30, 'America/Rio_Branco', '-05:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(76, 30, 'America/Santarem', '-03:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(77, 30, 'America/Sao_Paulo', '-03:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(78, 31, 'Indian/Chagos', '+06:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(79, 32, 'Asia/Brunei', '+08:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(80, 33, 'Europe/Sofia', '+02:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(81, 34, 'Africa/Ouagadougou', 'UTC', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(82, 35, 'Africa/Bujumbura', '+02:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(83, 36, 'Asia/Phnom_Penh', '+07:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:00'),
(84, 37, 'Africa/Douala', '+01:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(85, 38, 'America/Atikokan', '-05:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(86, 38, 'America/Blanc-Sablon', '-04:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(87, 38, 'America/Cambridge_Bay', '-07:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(88, 38, 'America/Creston', '-07:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(89, 38, 'America/Dawson', '-08:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(90, 38, 'America/Dawson_Creek', '-07:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(91, 38, 'America/Edmonton', '-07:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(92, 38, 'America/Fort_Nelson', '-07:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(93, 38, 'America/Glace_Bay', '-04:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(94, 38, 'America/Goose_Bay', '-04:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(95, 38, 'America/Halifax', '-04:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(96, 38, 'America/Inuvik', '-07:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(97, 38, 'America/Iqaluit', '-05:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(98, 38, 'America/Moncton', '-04:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(99, 38, 'America/Nipigon', '-05:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:01'),
(100, 38, 'America/Pangnirtung', '-05:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(101, 38, 'America/Rainy_River', '-06:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(102, 38, 'America/Rankin_Inlet', '-06:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(103, 38, 'America/Regina', '-06:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(104, 38, 'America/Resolute', '-06:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(105, 38, 'America/St_Johns', '-03:30', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(106, 38, 'America/Swift_Current', '-06:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(107, 38, 'America/Thunder_Bay', '-05:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(108, 38, 'America/Toronto', '-05:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(109, 38, 'America/Vancouver', '-08:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(110, 38, 'America/Whitehorse', '-08:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(111, 38, 'America/Winnipeg', '-06:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(112, 38, 'America/Yellowknife', '-07:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(113, 39, 'Atlantic/Cape_Verde', '-01:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(114, 40, 'America/Cayman', '-05:00', 'A', 1, '2019-12-27 12:18:13', '2019-12-27 11:48:02'),
(115, 41, 'Africa/Bangui', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:02'),
(116, 42, 'Africa/Ndjamena', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:02'),
(117, 43, 'America/Punta_Arenas', '-03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:02'),
(118, 43, 'America/Santiago', '-03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(119, 43, 'Pacific/Easter', '-05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(120, 44, 'Asia/Shanghai', '+08:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(121, 44, 'Asia/Urumqi', '+06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(122, 45, 'Indian/Christmas', '+07:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(123, 46, 'Indian/Cocos', '+06:30', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(124, 47, 'America/Bogota', '-05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(125, 48, 'Indian/Comoro', '+03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(126, 49, 'Africa/Brazzaville', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(127, 50, 'Africa/Kinshasa', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(128, 50, 'Africa/Lubumbashi', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(129, 51, 'Pacific/Rarotonga', '-10:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(130, 52, 'America/Costa_Rica', '-06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(131, 54, 'Europe/Zagreb', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(132, 55, 'America/Havana', '-05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(134, 56, 'Asia/Famagusta', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(135, 56, 'Asia/Nicosia', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:03'),
(136, 57, 'Europe/Prague', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(137, 53, 'Africa/Abidjan', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(138, 58, 'Europe/Copenhagen', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(139, 59, 'Africa/Djibouti', '+03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(140, 60, 'America/Dominica', '-04:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(141, 61, 'America/Santo_Domingo', '-04:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(142, 63, 'America/Guayaquil', '-05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(143, 63, 'Pacific/Galapagos', '-06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(144, 64, 'Africa/Cairo', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(145, 65, 'America/El_Salvador', '-06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(146, 66, 'Africa/Malabo', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(147, 67, 'Africa/Asmara', '+03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(148, 68, 'Europe/Tallinn', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(149, 69, 'Africa/Addis_Ababa', '+03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(150, 71, 'Atlantic/Stanley', '-03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(151, 72, 'Atlantic/Faroe', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(152, 73, 'Pacific/Fiji', '+13:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(153, 74, 'Europe/Helsinki', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:04'),
(154, 75, 'Europe/Paris', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(155, 76, 'America/Cayenne', '-03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(156, 77, 'Pacific/Gambier', '-09:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(157, 77, 'Pacific/Marquesas', '-09:30', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(158, 77, 'Pacific/Tahiti', '-10:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(159, 78, 'Indian/Kerguelen', '+05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(160, 79, 'Africa/Libreville', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(161, 80, 'Africa/Banjul', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(162, 81, 'Asia/Tbilisi', '+04:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(163, 82, 'Europe/Berlin', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(164, 82, 'Europe/Busingen', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(165, 83, 'Africa/Accra', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(166, 84, 'Europe/Gibraltar', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(167, 85, 'Europe/Athens', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(168, 86, 'America/Danmarkshavn', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(169, 86, 'America/Godthab', '-03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(170, 86, 'America/Scoresbysund', '-01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(171, 86, 'America/Thule', '-04:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:05'),
(172, 87, 'America/Grenada', '-04:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(173, 88, 'America/Guadeloupe', '-04:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(174, 89, 'Pacific/Guam', '+10:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(175, 90, 'America/Guatemala', '-06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(177, 92, 'Africa/Conakry', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(178, 93, 'Africa/Bissau', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(179, 94, 'America/Guyana', '-04:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(180, 95, 'America/Port-au-Prince', '-05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(181, 236, 'Europe/Vatican', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(182, 97, 'America/Tegucigalpa', '-06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(183, 98, 'Asia/Hong_Kong', '+08:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(184, 99, 'Europe/Budapest', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(185, 100, 'Atlantic/Reykjavik', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(186, 101, 'Asia/Kolkata', '+05:30', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(187, 102, 'Asia/Jakarta', '+07:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(188, 102, 'Asia/Jayapura', '+09:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(189, 102, 'Asia/Makassar', '+08:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(190, 102, 'Asia/Pontianak', '+07:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:06'),
(191, 103, 'Asia/Tehran', '+03:30', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(192, 104, 'Asia/Baghdad', '+03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(193, 105, 'Europe/Dublin', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(195, 106, 'Asia/Jerusalem', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(196, 107, 'Europe/Rome', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(197, 108, 'America/Jamaica', '-05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(198, 109, 'Asia/Tokyo', '+09:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(200, 111, 'Asia/Amman', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(201, 112, 'Asia/Almaty', '+06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(202, 112, 'Asia/Aqtau', '+05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(203, 112, 'Asia/Aqtobe', '+05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(204, 112, 'Asia/Atyrau', '+05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(205, 112, 'Asia/Oral', '+05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(206, 112, 'Asia/Qostanay', '+06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(207, 112, 'Asia/Qyzylorda', '+05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(208, 113, 'Africa/Nairobi', '+03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(209, 114, 'Pacific/Enderbury', '+13:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:07'),
(210, 114, 'Pacific/Kiritimati', '+14:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(211, 114, 'Pacific/Tarawa', '+12:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(212, 115, 'Asia/Pyongyang', '+09:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(213, 116, 'Asia/Seoul', '+09:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(214, 117, 'Asia/Kuwait', '+03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(215, 118, 'Asia/Bishkek', '+06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(216, 119, 'Asia/Vientiane', '+07:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(217, 120, 'Europe/Riga', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(218, 121, 'Asia/Beirut', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(219, 122, 'Africa/Maseru', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(220, 123, 'Africa/Monrovia', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(221, 124, 'Africa/Tripoli', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(222, 125, 'Europe/Vaduz', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(223, 126, 'Europe/Vilnius', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(224, 127, 'Europe/Luxembourg', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(225, 128, 'Asia/Macau', '+08:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(226, 129, 'Europe/Skopje', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:08'),
(227, 130, 'Indian/Antananarivo', '+03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(228, 131, 'Africa/Blantyre', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(229, 132, 'Asia/Kuala_Lumpur', '+08:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(230, 132, 'Asia/Kuching', '+08:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(231, 133, 'Indian/Maldives', '+05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(232, 134, 'Africa/Bamako', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(233, 135, 'Europe/Malta', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(234, 137, 'Pacific/Kwajalein', '+12:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(235, 137, 'Pacific/Majuro', '+12:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(236, 138, 'America/Martinique', '-04:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(237, 139, 'Africa/Nouakchott', 'UTC', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(238, 140, 'Indian/Mauritius', '+04:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(239, 141, 'Indian/Mayotte', '+03:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(240, 142, 'America/Bahia_Banderas', '-06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(241, 142, 'America/Cancun', '-05:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(242, 142, 'America/Chihuahua', '-07:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(243, 142, 'America/Hermosillo', '-07:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(244, 142, 'America/Matamoros', '-06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(245, 142, 'America/Mazatlan', '-07:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:09'),
(246, 142, 'America/Merida', '-06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(247, 142, 'America/Mexico_City', '-06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(248, 142, 'America/Monterrey', '-06:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(249, 142, 'America/Ojinaga', '-07:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(250, 142, 'America/Tijuana', '-08:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(251, 143, 'Pacific/Chuuk', '+10:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(252, 143, 'Pacific/Kosrae', '+11:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(253, 143, 'Pacific/Pohnpei', '+11:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(254, 144, 'Europe/Chisinau', '+02:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(255, 145, 'Europe/Monaco', '+01:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(256, 146, 'Asia/Choibalsan', '+08:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(257, 146, 'Asia/Hovd', '+07:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10'),
(258, 146, 'Asia/Ulaanbaatar', '+08:00', 'A', 1, '2019-12-27 14:56:38', '2019-12-27 11:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `mb_tracking_update`
--

CREATE TABLE `mb_tracking_update` (
  `id` int NOT NULL,
  `shipment_id` int NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `tracking_code` varchar(100) NOT NULL,
  `tracking_status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mb_transaction`
--

CREATE TABLE `mb_transaction` (
  `id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_id` text,
  `card_id` text NOT NULL,
  `user_id` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_transaction`
--

INSERT INTO `mb_transaction` (`id`, `amount`, `transaction_id`, `card_id`, `user_id`, `created_at`, `updated_at`, `is_deleted`) VALUES
(8, '6.00', 'txn_3LOGACLVtcUCLVBc0kTtkue6', 'card_1LOGA7LVtcUCLVBcPdET60N2', 36, '2022-07-22', '2022-07-22', 'N'),
(9, '300.00', 'txn_3LQ4n8LVtcUCLVBc06iTFXkg', 'card_1LQ4n3LVtcUCLVBcUdVYtS8y', 36, '2022-07-27', '2022-07-27', 'N'),
(10, '500.00', 'txn_3LQUHALVtcUCLVBc0O2mKuMe', 'card_1LQUH5LVtcUCLVBcTF6uLm4N', 47, '2022-07-28', '2022-07-28', 'N'),
(11, '11.00', 'txn_3LQXMiLVtcUCLVBc1uycoQah', 'card_1LQXMdLVtcUCLVBcslT16QEo', 36, '2022-07-28', '2022-07-28', 'N'),
(12, '22.86', 'txn_3LR43yLVtcUCLVBc0D353DrL', 'card_1LR43tLVtcUCLVBc2A4yCRMh', 36, '2022-07-30', '2022-07-30', 'N'),
(13, '20.00', 'txn_3LSKsELVtcUCLVBc0Aviawrn', 'card_1LSKs9LVtcUCLVBcVCGT104Q', 36, '2022-08-02', '2022-08-02', 'N'),
(14, '20.00', 'txn_3LSKtQLVtcUCLVBc1ozoBUHL', 'card_1LSKtLLVtcUCLVBcbyEdFImV', 36, '2022-08-02', '2022-08-02', 'N'),
(15, '11.00', 'txn_3LVBiOLVtcUCLVBc1CbObu54', 'card_1LVBiJLVtcUCLVBcmqGoxgxx', 52, '2022-08-10', '2022-08-10', 'N'),
(16, '10.00', 'txn_3LVBqtLVtcUCLVBc1ZUnK0BQ', 'card_1LVBqpLVtcUCLVBcfDj0SPwX', 36, '2022-08-10', '2022-08-10', 'N'),
(17, '13.00', 'txn_3LVCKCLVtcUCLVBc1a5eas3j', 'card_1LVCK7LVtcUCLVBc7wtqhhTG', 52, '2022-08-10', '2022-08-10', 'N'),
(18, '24.00', 'txn_3LVCM1LVtcUCLVBc1bvW4oSG', 'card_1LVCLwLVtcUCLVBc7t7of2W1', 52, '2022-08-10', '2022-08-10', 'N'),
(19, '11.00', 'txn_3LVCqFLVtcUCLVBc0cUm4vyR', 'card_1LVCqBLVtcUCLVBcxdUvDTb2', 52, '2022-08-10', '2022-08-10', 'N'),
(20, '30.00', 'txn_3LVCzxLVtcUCLVBc1hpiR3Rt', 'card_1LVCztLVtcUCLVBcL12cq8F1', 52, '2022-08-10', '2022-08-10', 'N'),
(21, '1111.00', 'txn_3LVuo3LVtcUCLVBc0spVBq4w', 'card_1LVunyLVtcUCLVBcTfnwV0tt', 36, '2022-08-12', '2022-08-12', 'N'),
(22, '100.00', 'txn_3LXMgvLVtcUCLVBc10ZTzNgN', 'card_1LXMgqLVtcUCLVBcu9ghy32N', 36, '2022-08-16', '2022-08-16', 'N'),
(23, '4999.00', 'txn_3LYOkoLVtcUCLVBc0pCOeK6f', 'card_1LYOkjLVtcUCLVBcxWAFyBQt', 54, '2022-08-19', '2022-08-19', 'N'),
(24, '300.00', 'txn_3LYUDELVtcUCLVBc1OPpQ7nn', 'card_1LYUD9LVtcUCLVBckR7qpAjm', 36, '2022-08-19', '2022-08-19', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mb_transactions`
--

CREATE TABLE `mb_transactions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `transaction_id` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_transactions`
--

INSERT INTO `mb_transactions` (`id`, `user_id`, `transaction_id`, `amount`, `transaction_date`, `created_by`, `updated_at`, `created_at`, `is_deleted`) VALUES
(1, 36, 'Axbcdddddddd', '10.00', '2022-06-08 00:00:00', 1, NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mb_users`
--

CREATE TABLE `mb_users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `userkey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` enum('S','SA','FU') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'S=Superadmin SA=SubAdmin FU=Frontend User',
  `company_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `profile_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('A','I','D') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'A-active, I-Inactive, D-Delete',
  `is_reset` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `setting_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_from` enum('B','F') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'B= Backend , F = Frontednd',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `updated_by` bigint NOT NULL DEFAULT '0',
  `is_deleted` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'Y- Yes, N-No',
  `deleted_by` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mb_users`
--

INSERT INTO `mb_users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `role_id`, `userkey`, `usertype`, `company_name`, `profile_pic`, `password`, `wallet_amount`, `status`, `is_reset`, `setting_json`, `remember_token`, `api_token`, `created_from`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_deleted`, `deleted_by`, `deleted_at`) VALUES
(1, 'Super Admin', 'admin@yopmail.com', '2019-06-11 17:02:21', '7872503102', 1, NULL, 'S', '', '1597210206.jpg', '$2y$10$vOXHRB8I0aEVEkhXAWsYjOyxQ4nn9YnFKWSBBEq86TZ15x/0.P0Pe', '0.00', 'A', 'N', '{\"timezone\":\"Asia\\/Bahrain\",\"date_format\":\"d-M-Y\",\"time_format\":\"g:i A\",\"vat_value_for_pr_copywrite\":\"10\",\"vat_value_for_press_release\":\"10\",\"facebook_link\":\"https:\\/\\/www.facebook.com\\/\",\"twitter_link\":\"https:\\/\\/twitter.com\\/\",\"youtube_link\":\"https:\\/\\/www.youtube.com\\/\",\"instagram_link\":\"https:\\/\\/www.instagram.com\\/login\",\"vimeo_link\":\"https:\\/\\/www.vimeo.com\\/login\",\"maximum_pr_copyright\":\"4\",\"return_request\":\"yes\",\"limitation_count\":\"4\",\"currency_symbol\":\"$\",\"currency_code\":\"USD\"}', 'sdxofBFeUc0bfJN1qMl9TyGQp8htWzJLCGZpKuJ4Ep2FOG9qpG4IXMMFSAf1', 'ocTm0geq4gAfVKY67D9M3GHe0BkXOsxvg3fK2h3T0rDalJfAnCVux4SIOejN', NULL, '2022-05-18 17:02:21', '2022-07-05 09:01:08', 0, 1, 'N', NULL, NULL),
(2, 'Sumit DAS', 'sumit@gmail.com', NULL, '8981612321', 3, NULL, 'SA', '', NULL, '$2y$10$WNMMH78eT8KvNQYaEvde0OA7yLtTcj.9PNqQHKYtnMI0HEVUFh9v6', '0.00', 'A', 'N', '{\"facebook_url\":null,\"twitter_url\":null,\"linkedin_url\":null,\"additional_info\":null}', NULL, NULL, NULL, '2022-05-18 03:45:35', '2022-05-18 04:16:12', 1, 1, 'N', NULL, NULL),
(3, 'Sumit', 'sumit@yopmail.com', NULL, '8981612300', 3, NULL, NULL, '', NULL, '$2y$10$RHaCTRUXtahPwCmkBQRUl.L35Vp7bQnpAbwqHOYQ0.DYLEjkqS4Hy', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-18 06:21:52', '2022-05-18 06:23:23', 1, 1, 'N', NULL, NULL),
(4, 'Sumit2', 'sumit2@yopmail.com', NULL, '8981612321', 3, NULL, 'SA', '', NULL, '$2y$10$ZFc8Fb0q314tWtinjFJV4u4ftpfq59PG.x7d26Qzqu/4aXqvw363G', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-18 06:26:37', '2022-05-18 22:50:33', 1, 1, 'Y', 1, '2022-05-18 22:50:33'),
(5, 'Sumit4', 'sumitfront@gmail.com', NULL, '8981260153', 2, NULL, 'FU', 'test2', NULL, '$2y$10$//BtjQJAkD2yOvXGf3qJBuX0TJSZLpoabO0X2IvfmhlkymBcuRwne', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-20 05:04:38', '2022-05-23 00:33:29', 1, 1, 'N', NULL, NULL),
(6, 'sumit', 'test@gmail.com', NULL, '8981260153', 4, NULL, 'FU', 'test', NULL, '$2y$10$AOI0YEUPG9ep94N8zGT2bOHvB1uhXTQifpWZGOMmPvKBiiwxL5nP.', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-31 00:32:09', '2022-05-31 00:32:09', 1, 1, 'N', NULL, NULL),
(7, 'sumit', 'test2@yopmail.com', NULL, '8981260153', 4, NULL, 'FU', 'test', NULL, '$2y$10$zQLvB0AkfsCjZ1C48121Y.BadoYO8OcTPFNi3t8QRd3i2Ey57Q44u', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-31 00:38:05', '2022-05-31 00:38:05', 1, 1, 'N', NULL, NULL),
(8, 'sumit', 'sumittest@yopmail.com', NULL, '8981260153', 4, NULL, 'FU', 'test', NULL, '$2y$10$7ENix6euUJeRejFmT9SQeOAbi/uQWghShx.dF/ogdpo2sfovldmb.', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-31 01:32:51', '2022-05-31 01:32:51', 1, 1, 'N', NULL, NULL),
(9, 'sumit', 'sumi2@yopmail.com', NULL, '8981260153', 4, NULL, 'FU', 'test', NULL, '$2y$10$xq8jxl4XKc2D7c1ImryeeubobpBznG4wgztdXb9M4n2cVoF3ekfGu', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-31 01:43:10', '2022-05-31 01:43:10', 1, 1, 'N', NULL, NULL),
(10, 'sumit', 'sumit23@yopmail.com', NULL, '8981260153', 4, NULL, 'FU', 'test', NULL, '$2y$10$8ScjfxeuPoyTRMaooBwTC.tGwOC7UBMO4MRNdgtgKhoUfeY6Hq9F2', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-31 01:44:02', '2022-05-31 01:44:02', 1, 1, 'N', NULL, NULL),
(11, 'Sumit4', 'sumi25@yopmail.com', NULL, '8981260153', 4, NULL, 'FU', 'test', NULL, '$2y$10$C3Jz0F.KZLZkX8v30nNXUeuaTatFSS7IZT/43mcj4b0iafd5h.0QW', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-31 01:50:22', '2022-05-31 01:50:22', 1, 1, 'N', NULL, NULL),
(12, 'sumit', 'sumi28@yopmail.com', NULL, '8981260153', 4, NULL, 'FU', 'test', NULL, '$2y$10$evyIUZeAkmScwKERTCmnTeyhPLR8KuNCmKlQxS94vEK4NC9WoQwzW', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-31 01:57:06', '2022-05-31 01:57:06', 1, 1, 'N', NULL, NULL),
(13, 'sumit', 'sum34@yopmail.com', NULL, '8981260153', 4, NULL, 'FU', 'test', NULL, '$2y$10$eJhFokSbcwIp7/rKWk.5d.JrOV8P/vacHleTZ2JfAoX2wEBz2ctla', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-31 02:02:35', '2022-05-31 02:02:35', 1, 1, 'N', NULL, NULL),
(16, 'sumit', 'creativesumitdas@gmail.com', NULL, '8981260153', 4, NULL, 'FU', 'test', NULL, '$2y$10$R1a3hOmwa3.nOF3rsoYoYeUxXDXjGqXqtxexhi3KMiCEBaD8om59W', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-31 02:44:43', '2022-05-31 02:44:43', 1, 1, 'N', NULL, NULL),
(30, 'sumit', 'sumitdas2@matrixnmedia.com', NULL, '8981260153', 4, NULL, 'FU', 'test', NULL, '$2y$10$uWUqmXQFLtR8dlUP2RJlEeI7rgvCUE1FK/vtOKyAg8t9Uy/kBKe0e', '0.00', 'I', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-05-31 05:19:55', '2022-05-31 05:19:55', 1, 1, 'N', NULL, NULL),
(36, 'sumit', 'sumitdas@matrixnmedia.com', NULL, '9876543210', 4, NULL, 'FU', 'Sumit12345', NULL, '$2y$10$Y4V5MZXrEYl80uiJIecUX.d0HmR9kqAVUV7Xdu2dghrWpCvHewQAG', '1102.38', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', 'px5QLmBw6U3rDnH2gU52Gldy57PBHPZJeYej4HC6X9kXTujgwjrMlaAlt5Jt', NULL, NULL, '2022-05-31 07:45:19', '2022-08-17 07:37:20', 1, 1, 'N', NULL, NULL),
(37, 'sumit', 'sumit22@yopmail.com', '2022-06-15 05:14:45', '9038234479', 4, NULL, 'FU', 'test', NULL, '$2y$10$Y0Z90IeJ0JVP.lUwy1pnAujCHyLn5iPi9d/WH2nRQkWpfUy/RE99y', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-06-15 05:14:18', '2022-06-15 05:14:45', 1, 1, 'N', NULL, NULL),
(38, 'Sumit', 'sumit43@yopmail.com', '2022-06-15 06:23:10', '8981260153', 4, NULL, 'FU', 'test2', NULL, '$2y$10$oWs99ptc5GEsmkj1Ptr.r./WP9L6kaMSv5MgCyVtOAjilKpQcuVLG', '0.00', 'A', 'N', '{\"timezone\":\"Asia/Kolkata\",\"date_format\":\"Y-m-d\"}', NULL, NULL, NULL, '2022-06-15 06:21:57', '2022-06-15 06:24:04', 1, 1, 'N', NULL, NULL),
(39, 'sumit das', 'sumit453@yopmail.com', '2022-06-15 06:34:54', '8981260152', 4, NULL, 'FU', 'testcompany', NULL, '$2y$10$TrM8j0m.Yf9sw3A8gHAwXepiYopNVHFKpYGeuxxE4rqtq/.hNpspm', '0.00', 'A', 'N', NULL, NULL, NULL, NULL, '2022-06-15 06:34:15', '2022-06-15 06:34:54', NULL, 0, 'N', NULL, NULL),
(40, 'r s', 'rohit@yopmail.com', NULL, '1111111111', 4, 'OM7Fmcw09uTjOEOcq10V4rAVNqYtvnJ2QeYnMtIQEQVgcjLThrbhnch4GmzO', 'FU', 'b', NULL, '$2y$10$Rnj/xEXRLWFM2pi1H.VsF.p261oJ1dDJIFz.eqrJc.Yf1UciB.A.i', '0.00', 'I', 'N', NULL, NULL, NULL, NULL, '2022-07-04 09:18:50', '2022-07-04 09:18:50', NULL, 0, 'N', NULL, NULL),
(41, 'r s', 'rohit1@yopmail.com', '2022-07-04 09:20:41', '1111111112', 4, NULL, 'FU', 'b', NULL, '$2y$10$JfUFo0CUqNG/KrkM.e6vb.sFRQIcye44owHyiWFx7/3tMC4iy.aJm', '0.00', 'A', 'N', NULL, 'Hczl3lpfVioHcaP2M5c9eAyf12oa55Zv18IMAdHrOOqeDeKq3c9XlGOLxhQH', NULL, NULL, '2022-07-04 09:19:40', '2022-07-04 09:20:41', NULL, 0, 'N', NULL, NULL),
(42, 'Rohit Santra', 'rohit2@yopmail.com', NULL, '1122112211', 4, 'RugRYVSBXZaJiOkf0ADxx70B9qDrL4gYPYShihatjW1EPFuOn2x0CuxeTXzB', 'FU', 'Matrix', NULL, '$2y$10$JnevGKP1aIx.R/RHqcaAN.uh0IEIPVwiULQK3xhmPQ585.rKmdj8.', '0.00', 'I', 'N', NULL, NULL, NULL, NULL, '2022-07-04 09:26:11', '2022-07-04 09:26:11', NULL, 0, 'N', NULL, NULL),
(43, 'rohit santra', 'rohit3@yopmail.com', NULL, '6321312784', 4, 'tRLkxsd3Tiz6HOhQFPVp7ijq2ha7OypQqi4h6D8Ql9VIyr2VQC2OnsAfHd29', 'FU', 'matrix', NULL, '$2y$10$J5JajdlyKK/6ToHc/HjA/uGHhTOkX9RAyBNFkSzIwj9s1jO9DEUze', '0.00', 'I', 'N', NULL, NULL, NULL, NULL, '2022-07-04 09:43:12', '2022-07-05 07:31:40', NULL, 0, 'Y', 1, '2022-07-05 07:31:40'),
(44, 'q a', 'rohittest41@yopmail.com', NULL, '1111111113', 4, 'IbGQoNGwXHnk4UCUcFH35oGoTU8AL9Flap4vdMbjhan2NEQEDMe3o73WaCi9', 'FU', 'qa', NULL, '$2y$10$kvvJIuih4UhgTUX6b2MXse7z4i6OIZBbXcAuxT9k.lW0Rj0QbE9RS', '0.00', 'A', 'N', NULL, NULL, NULL, NULL, '2022-07-21 14:29:48', '2022-07-22 09:03:39', NULL, 1, 'N', NULL, NULL),
(45, 'q a', 'rohittest42@yopmail.com', NULL, '1111111114', 4, 'cvTvLDMKeLVxotv7hGXvNrn72mLwvYaMx4y5260XE1zBXApAE0kQHSjnZghb', 'FU', 'qa', NULL, '$2y$10$vUa8UJsNq5Exr7TFqmbz2eKlEsnGGqtCcIMwMXgecXddSJcSMjWyO', '0.00', 'I', 'N', NULL, NULL, NULL, NULL, '2022-07-21 14:33:31', '2022-07-21 14:33:31', NULL, 0, 'N', NULL, NULL),
(46, 'rohit test', 'rohittest43@yopmail.com', '2022-07-22 08:51:12', '1212212122', 4, NULL, 'FU', 'rohittest', NULL, '$2y$10$2jUcnjGSTxqmwsRf7yEYYuTPXzWWYi11LwAZivV2LvvfbspSe.FDK', '0.00', 'A', 'N', NULL, '2iG6LdCLc31yPcp6BCvv8PtqOPPiqelVWatxYjAvhyaipP1D9McRCQaUFqD9', NULL, NULL, '2022-07-22 08:50:40', '2022-07-22 08:51:12', NULL, 0, 'N', NULL, NULL),
(47, 'rohit 28july', '28july@yopmail.com', '2022-07-28 08:26:54', '1212121221', 4, NULL, 'FU', 'july 28', NULL, '$2y$10$Q/7UawEjUqkb3ROvioV0yOUq6ESNFCJkCeU8mAsF97wcWcoNv/oZq', '203.18', 'A', 'Y', NULL, 'eACPO0L0tFADCDru4bwscGbcaYKj6pXAVLXWj09DAuKyNSlGBEUsABLhetgv', NULL, NULL, '2022-07-28 08:24:54', '2022-07-29 09:57:52', NULL, 0, 'Y', NULL, NULL),
(48, '28july 28july', '28july1@yopmail.com', '2022-07-28 08:52:00', '1111112233', 4, NULL, 'FU', '28 jult', NULL, '$2y$10$qvGkNJ.m.gIFxQVCVWYNqedz3PcnyJJUTKziegbSZCUCa1OxYJvqa', '0.00', 'A', 'N', NULL, NULL, NULL, NULL, '2022-07-28 08:51:08', '2022-07-28 08:55:41', NULL, 0, 'N', NULL, NULL),
(49, '29 july', '29july@yopmail.com', NULL, '1231231212', 4, 'MAJiTaOsETWeeWFjoVuHfwdV2GwXinQCmaUPgsDgoHV0GNdgaGalY8pujptx', 'FU', '29 kjuly', NULL, '$2y$10$FPMP6/QwjyLwfrdT.5Uu0ebJ5vKLNnBytzEQgOa57NizUltDf/e0O', '0.00', 'I', 'N', NULL, NULL, NULL, NULL, '2022-07-29 09:55:32', '2022-07-29 09:55:32', NULL, 0, 'N', NULL, NULL),
(50, 'R S', 'rs1@yopmail.com', '2022-08-04 11:38:32', '1233212323', 4, NULL, 'FU', 'rs', NULL, '$2y$10$7fOzETGt82Zy1uq7z9OfhOgh/UitWt.dG03D7OLQ0yt8SpoHIQTWO', '0.00', 'A', 'N', NULL, NULL, NULL, NULL, '2022-08-04 11:38:09', '2022-08-04 11:38:32', NULL, 0, 'N', NULL, NULL),
(51, 'test test', '8thaug@yopmail.com', '2022-08-08 14:48:07', '12312321311', 4, NULL, 'FU', NULL, NULL, '$2y$10$rp3gjIfIDQRPEYeYGEqlIu7tc3GGV8SAorFHbZ2khdvJOOxJQUsBq', '0.00', 'A', 'N', NULL, '0JhvnvZaDY6l01Obhg8RfuFg3FVJoQibQTg4a7xIt7wPFYpsCMaKBPHXgcaO', NULL, NULL, '2022-08-08 14:47:17', '2022-08-11 12:32:12', NULL, 0, 'N', NULL, NULL),
(52, 'ds dsaf', '101thaug@yopmail.com', '2022-08-09 12:25:41', '21323423431', 4, NULL, 'FU', 'testing', NULL, '$2y$10$8FOdtxKz7DTc5cjjEgWdb.SkVbF7EmcpNzgn3zSIJJ65vvOZAlnlC', '31.88', 'A', 'N', NULL, 'y9C3n3RZm0lBhG4KT8anMAS4BHKTACKQVsq4U45Kq1LDf1kgkjb6CPhPoJxR', NULL, NULL, '2022-08-09 12:20:01', '2022-08-10 09:25:54', NULL, 0, 'N', NULL, NULL),
(53, 'd d', 'testing123@yopmail', NULL, '2131231231', 4, 'QPtTuttHKBBdbmHg01hYP1Z7B6qsyoYtTYIKpXQBUbjOxKRaaCQJnLZekjjQ', 'FU', 'd', NULL, '$2y$10$Lz9L2MhdqIH4Q/PTdXwu7e1LRap2PQh2X.zJPoJC5OgarTwztym82', '0.00', 'I', 'N', NULL, NULL, NULL, NULL, '2022-08-09 12:21:06', '2022-08-09 12:21:06', NULL, 0, 'N', NULL, NULL),
(54, 'Nineteenth August', 'profitcheck@yopmail.com', '2022-08-19 06:16:40', '9163400631', 4, NULL, 'FU', 'Nineteenth August', NULL, '$2y$10$UnauGnvTcbD3s2oi4WcuTu2Fh6yUCUedJRRUc8dmxxzYSe/c3dsKa', '3903.79', 'A', 'N', NULL, 'ptV9eBRIzx8U5ghUMalyFlrdrnLaAv84KdgPPCz5QhfDKp1mBhNcMTb8P2Qu', NULL, NULL, '2022-08-19 06:16:25', '2022-08-19 06:16:40', NULL, 0, 'N', NULL, NULL),
(55, 'Raju Samanta', 'prasun@matrixnmedia.com', '2023-02-15 12:21:32', '8777845350', 4, NULL, 'FU', 'Alibaba', NULL, '$2y$10$rzTEjSpVV5uHofeKW/DhBOqZz13BVFZbc6zHDvWjcSUvT.zGDzAyW', '0.00', 'A', 'N', NULL, NULL, NULL, NULL, '2023-02-15 12:21:07', '2023-02-15 12:21:32', NULL, 0, 'N', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mb_user_coupon`
--

CREATE TABLE `mb_user_coupon` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `coupon_code` varchar(150) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_upto` date NOT NULL,
  `created_at` datetime NOT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_user_coupon`
--

INSERT INTO `mb_user_coupon` (`id`, `user_id`, `coupon_code`, `discount_amount`, `valid_from`, `valid_upto`, `created_at`, `is_deleted`, `created_by`, `deleted_by`, `deleted_at`, `updated_by`, `updated_at`) VALUES
(1, 36, 'MB-82474', '4.00', '2022-06-03 00:00:00', '2022-06-30', '2022-06-03 04:55:48', 'Y', 1, 1, '2022-06-03 08:51:34', 1, '2022-06-03 08:51:34'),
(2, 36, 'MB-42766', '0.01', '2022-06-03 00:00:00', '2022-06-30', '2022-06-03 11:15:03', 'Y', 1, 1, '2022-08-18 08:52:44', 1, '2022-08-18 08:52:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mb_cms`
--
ALTER TABLE `mb_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_country`
--
ALTER TABLE `mb_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_migrations`
--
ALTER TABLE `mb_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_modules`
--
ALTER TABLE `mb_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_module_functionalities`
--
ALTER TABLE `mb_module_functionalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_functionalities_module_id_foreign` (`module_id`);

--
-- Indexes for table `mb_notification`
--
ALTER TABLE `mb_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_profit_margin`
--
ALTER TABLE `mb_profit_margin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_roles`
--
ALTER TABLE `mb_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_role_permissions`
--
ALTER TABLE `mb_role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_module_id_foreign` (`module_id`),
  ADD KEY `role_permissions_module_functionality_id_foreign` (`module_functionality_id`);

--
-- Indexes for table `mb_settings`
--
ALTER TABLE `mb_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_shipments`
--
ALTER TABLE `mb_shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_shipments_bkp24jun2022`
--
ALTER TABLE `mb_shipments_bkp24jun2022`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_shipments_bkp24jun2022.1`
--
ALTER TABLE `mb_shipments_bkp24jun2022.1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_shipment_tracking`
--
ALTER TABLE `mb_shipment_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_states`
--
ALTER TABLE `mb_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_support`
--
ALTER TABLE `mb_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_timezones`
--
ALTER TABLE `mb_timezones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_tracking_update`
--
ALTER TABLE `mb_tracking_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_transaction`
--
ALTER TABLE `mb_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_transactions`
--
ALTER TABLE `mb_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mb_users`
--
ALTER TABLE `mb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `mb_user_coupon`
--
ALTER TABLE `mb_user_coupon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mb_cms`
--
ALTER TABLE `mb_cms`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mb_country`
--
ALTER TABLE `mb_country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mb_migrations`
--
ALTER TABLE `mb_migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mb_modules`
--
ALTER TABLE `mb_modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mb_module_functionalities`
--
ALTER TABLE `mb_module_functionalities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mb_notification`
--
ALTER TABLE `mb_notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mb_profit_margin`
--
ALTER TABLE `mb_profit_margin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mb_roles`
--
ALTER TABLE `mb_roles`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mb_role_permissions`
--
ALTER TABLE `mb_role_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `mb_settings`
--
ALTER TABLE `mb_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mb_shipments`
--
ALTER TABLE `mb_shipments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `mb_shipments_bkp24jun2022`
--
ALTER TABLE `mb_shipments_bkp24jun2022`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mb_shipments_bkp24jun2022.1`
--
ALTER TABLE `mb_shipments_bkp24jun2022.1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mb_shipment_tracking`
--
ALTER TABLE `mb_shipment_tracking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `mb_states`
--
ALTER TABLE `mb_states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `mb_support`
--
ALTER TABLE `mb_support`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mb_timezones`
--
ALTER TABLE `mb_timezones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `mb_transaction`
--
ALTER TABLE `mb_transaction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mb_transactions`
--
ALTER TABLE `mb_transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mb_users`
--
ALTER TABLE `mb_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `mb_user_coupon`
--
ALTER TABLE `mb_user_coupon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
