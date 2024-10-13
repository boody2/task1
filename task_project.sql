-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 08:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'c1', 'c1@c.com', '+201033953634', 1, '2024-10-10 09:51:46', '2024-10-10 09:51:46'),
(2, 'c2', 'test@gmail.com', '01033953634', 1, '2024-10-10 15:06:54', '2024-10-10 15:06:54'),
(3, 'c30', 'test@test1.com', '01033953634', 0, '2024-10-10 19:14:51', '2024-10-13 10:38:42'),
(5, 'Abde Talaat', 'talatb524@gmail.com', '01033953634', 0, '2024-10-10 19:19:13', '2024-10-11 10:24:59'),
(6, 'Abde Talaat 1', 'talatb5ww4@gmail.com', '01033953634', 0, '2024-10-10 19:20:09', '2024-10-11 10:24:57'),
(7, 'test api', 'test@test.com', '01033953634', 1, '2024-10-13 10:32:30', '2024-10-13 10:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `user_id`, `invoice_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Create new invoice.', '2024-10-10 12:42:36', '2024-10-10 12:42:36'),
(2, 2, 2, 'Create new invoice.', '2024-10-10 13:40:17', '2024-10-10 13:40:17'),
(3, 2, 3, 'Create new invoice.', '2024-10-10 13:53:58', '2024-10-10 13:53:58'),
(4, 2, 4, 'Create new invoice.', '2024-10-10 14:02:22', '2024-10-10 14:02:22'),
(5, 2, 5, 'Create new invoice.', '2024-10-10 14:05:33', '2024-10-10 14:05:33'),
(6, 2, 5, 'Update invoice.', '2024-10-10 17:12:35', '2024-10-10 17:12:35'),
(7, 2, 5, 'Update invoice.', '2024-10-10 17:12:47', '2024-10-10 17:12:47'),
(8, 2, 5, 'Update invoice.', '2024-10-10 17:13:01', '2024-10-10 17:13:01'),
(9, 2, 5, 'Update invoice.', '2024-10-10 17:13:20', '2024-10-10 17:13:20'),
(10, 2, 6, 'Create new invoice.', '2024-10-10 20:06:24', '2024-10-10 20:06:24'),
(11, 2, 7, 'Create new invoice.', '2024-10-10 20:07:46', '2024-10-10 20:07:46'),
(12, 2, 6, 'Update invoice.', '2024-10-10 20:08:05', '2024-10-10 20:08:05'),
(13, 2, 6, 'Delete invoice.', '2024-10-11 10:10:28', '2024-10-11 10:10:28'),
(14, 2, 6, 'Delete invoice.', '2024-10-11 10:11:19', '2024-10-11 10:11:19'),
(15, 2, 7, 'Delete invoice.', '2024-10-12 08:05:37', '2024-10-12 08:05:37'),
(16, 2, 5, 'Delete invoice.', '2024-10-12 08:06:54', '2024-10-12 08:06:54'),
(17, 2, 4, 'Delete invoice.', '2024-10-12 08:07:06', '2024-10-12 08:07:06'),
(18, 2, 23, 'Create new invoice.', '2024-10-12 09:46:54', '2024-10-12 09:46:54'),
(19, 2, 24, 'Create new invoice.', '2024-10-12 09:51:00', '2024-10-12 09:51:00'),
(20, 2, 24, 'Delete invoice.', '2024-10-12 09:53:27', '2024-10-12 09:53:27'),
(21, 2, 23, 'Delete invoice.', '2024-10-12 09:54:52', '2024-10-12 09:54:52'),
(22, 2, 22, 'Delete invoice.', '2024-10-12 09:58:29', '2024-10-12 09:58:29'),
(23, 2, 12, 'Delete invoice.', '2024-10-12 10:01:20', '2024-10-12 10:01:20'),
(24, 2, 12, 'Delete invoice.', '2024-10-12 10:01:31', '2024-10-12 10:01:31'),
(25, 2, 11, 'Delete invoice.', '2024-10-12 10:06:52', '2024-10-12 10:06:52'),
(26, 2, 34, 'Create new invoice.', '2024-10-13 10:11:55', '2024-10-13 10:11:55'),
(27, 2, 35, 'Create new invoice.', '2024-10-13 10:12:51', '2024-10-13 10:12:51'),
(28, 2, 35, 'Update invoice.', '2024-10-13 10:24:37', '2024-10-13 10:24:37'),
(29, 2, 35, 'Update invoice.', '2024-10-13 10:24:59', '2024-10-13 10:24:59'),
(30, 2, 35, 'Delete invoice.', '2024-10-13 10:26:04', '2024-10-13 10:26:04'),
(31, 2, 35, 'Delete invoice.', '2024-10-13 10:26:58', '2024-10-13 10:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `invoice_date` date NOT NULL,
  `Paid` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `client_id`, `total`, `discount`, `tax`, `grand_total`, `description`, `invoice_date`, `Paid`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 523.00, 30.00, 14.00, 417.35, 'tgrtr', '2024-01-10', 'Paid', 1, '2024-10-10 12:42:36', '2024-10-10 12:42:36'),
(2, 2, 10.00, 10.00, 20.00, 10.80, NULL, '2024-10-10', 'Unpaid', 1, '2024-10-10 13:40:17', '2024-10-10 13:40:17'),
(3, 1, 150.00, 10.00, 10.00, 148.50, NULL, '2024-09-10', 'Paid', 1, '2024-10-10 13:53:58', '2024-10-10 13:53:58'),
(4, 2, 150.00, 0.00, 6.00, 159.00, NULL, '2024-11-09', 'Paid', 0, '2024-10-10 14:02:22', '2024-10-12 08:07:06'),
(5, 1, 1720.00, 0.00, 5.00, 1806.00, 'asfxgfg', '2024-10-28', 'Paid', 0, '2024-10-10 14:05:33', '2024-10-12 08:06:54'),
(6, 6, 1500.00, 0.00, 0.00, 1500.00, NULL, '2024-10-11', 'Paid', 0, '2024-10-10 20:06:24', '2024-10-11 10:10:28'),
(7, 6, 1500.00, 0.00, 0.00, 1500.00, NULL, '2024-10-01', 'Unpaid', 0, '2024-10-10 20:07:46', '2024-10-12 08:05:37'),
(8, 3, 15150.00, 10.00, 15.00, 15680.25, NULL, '2024-10-10', 'Unpaid', 1, '2024-10-12 09:23:10', '2024-10-12 09:23:10'),
(9, 3, 15150.00, 10.00, 15.00, 15680.25, NULL, '2024-10-10', 'Unpaid', 1, '2024-10-12 09:24:45', '2024-10-12 09:24:45'),
(10, 3, 15150.00, 10.00, 15.00, 15680.25, NULL, '2024-10-10', 'Unpaid', 1, '2024-10-12 09:24:52', '2024-10-12 09:24:52'),
(11, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 0, '2024-10-12 09:25:22', '2024-10-12 10:06:52'),
(12, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 0, '2024-10-12 09:33:47', '2024-10-12 10:01:20'),
(13, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 1, '2024-10-12 09:34:42', '2024-10-12 09:34:42'),
(14, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 1, '2024-10-12 09:35:04', '2024-10-12 09:35:04'),
(15, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 1, '2024-10-12 09:35:41', '2024-10-12 09:35:41'),
(16, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 1, '2024-10-12 09:37:38', '2024-10-12 09:37:38'),
(17, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 1, '2024-10-12 09:37:41', '2024-10-12 09:37:41'),
(18, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 1, '2024-10-12 09:37:42', '2024-10-12 09:37:42'),
(19, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 1, '2024-10-12 09:40:02', '2024-10-12 09:40:02'),
(20, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 1, '2024-10-12 09:40:14', '2024-10-12 09:40:14'),
(21, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 1, '2024-10-12 09:41:37', '2024-10-12 09:41:37'),
(22, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 0, '2024-10-12 09:43:00', '2024-10-12 09:58:29'),
(23, 3, 100.00, 10.00, 0.00, 90.00, NULL, '2024-10-14', 'Unpaid', 0, '2024-10-12 09:46:51', '2024-10-12 09:54:52'),
(24, 3, 500.00, 0.00, 0.00, 500.00, NULL, '2024-10-28', 'Unpaid', 0, '2024-10-12 09:50:58', '2024-10-12 09:53:27'),
(25, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-13', 'Unpaid', 1, '2024-10-13 10:08:13', '2024-10-13 10:08:13'),
(26, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-13', 'Unpaid', 1, '2024-10-13 10:08:57', '2024-10-13 10:08:57'),
(27, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-13', 'Unpaid', 1, '2024-10-13 10:09:00', '2024-10-13 10:09:00'),
(28, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-13', 'Unpaid', 1, '2024-10-13 10:09:09', '2024-10-13 10:09:09'),
(29, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-13', 'Unpaid', 1, '2024-10-13 10:09:31', '2024-10-13 10:09:31'),
(30, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-13', 'Unpaid', 1, '2024-10-13 10:09:43', '2024-10-13 10:09:43'),
(31, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-13', 'Unpaid', 1, '2024-10-13 10:10:05', '2024-10-13 10:10:05'),
(32, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-13', 'Unpaid', 1, '2024-10-13 10:10:06', '2024-10-13 10:10:06'),
(33, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-13', 'Unpaid', 1, '2024-10-13 10:10:36', '2024-10-13 10:10:36'),
(34, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-13', 'Unpaid', 1, '2024-10-13 10:11:53', '2024-10-13 10:11:53'),
(35, 3, 100.00, 0.00, 0.00, 100.00, 'desc', '2024-10-10', 'Unpaid', 0, '2024-10-13 10:12:49', '2024-10-13 10:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `invoice__items`
--

CREATE TABLE `invoice__items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice__items`
--

INSERT INTO `invoice__items` (`id`, `invoice_id`, `name`, `price`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ss', 5.00, 10, 1, '2024-10-10 12:42:36', '2024-10-10 12:42:36'),
(2, 1, 'll', 6.00, 52, 1, '2024-10-10 12:42:36', '2024-10-10 12:42:36'),
(3, 1, 'qq', 7.00, 23, 1, '2024-10-10 12:42:36', '2024-10-10 12:42:36'),
(4, 2, 'ss', 2.00, 5, 1, '2024-10-10 13:40:17', '2024-10-10 13:40:17'),
(5, 3, 'ss', 20.00, 5, 1, '2024-10-10 13:53:58', '2024-10-10 13:53:58'),
(6, 3, 'ww', 10.00, 5, 1, '2024-10-10 13:53:58', '2024-10-10 13:53:58'),
(7, 4, 'AA', 5.00, 30, 1, '2024-10-10 14:02:22', '2024-10-10 14:02:22'),
(13, 5, 'SS', 20.00, 6, 1, '2024-10-10 17:13:20', '2024-10-10 17:13:20'),
(14, 5, 'sad', 30.00, 50, 1, '2024-10-10 17:13:20', '2024-10-10 17:13:20'),
(15, 5, 'aws', 20.00, 5, 1, '2024-10-10 17:13:20', '2024-10-10 17:13:20'),
(17, 7, 'ui', 30.00, 50, 1, '2024-10-10 20:07:46', '2024-10-10 20:07:46'),
(18, 6, 'SS', 30.00, 50, 1, '2024-10-10 20:08:05', '2024-10-10 20:08:05'),
(19, 8, 'aaa', 50.00, 3, 1, '2024-10-12 09:23:10', '2024-10-12 09:23:10'),
(20, 8, 'aaasd', 500.00, 30, 1, '2024-10-12 09:23:10', '2024-10-12 09:23:10'),
(21, 9, 'aaa', 50.00, 3, 1, '2024-10-12 09:24:45', '2024-10-12 09:24:45'),
(22, 9, 'aaasd', 500.00, 30, 1, '2024-10-12 09:24:45', '2024-10-12 09:24:45'),
(23, 10, 'aaa', 50.00, 3, 1, '2024-10-12 09:24:52', '2024-10-12 09:24:52'),
(24, 10, 'aaasd', 500.00, 30, 1, '2024-10-12 09:24:52', '2024-10-12 09:24:52'),
(25, 11, 'ret', 20.00, 5, 1, '2024-10-12 09:25:22', '2024-10-12 09:25:22'),
(26, 12, 'ret', 20.00, 5, 1, '2024-10-12 09:33:47', '2024-10-12 09:33:47'),
(27, 13, 'ret', 20.00, 5, 1, '2024-10-12 09:34:42', '2024-10-12 09:34:42'),
(28, 14, 'ret', 20.00, 5, 1, '2024-10-12 09:35:04', '2024-10-12 09:35:04'),
(29, 15, 'ret', 20.00, 5, 1, '2024-10-12 09:35:41', '2024-10-12 09:35:41'),
(30, 16, 'ret', 20.00, 5, 1, '2024-10-12 09:37:38', '2024-10-12 09:37:38'),
(31, 17, 'ret', 20.00, 5, 1, '2024-10-12 09:37:41', '2024-10-12 09:37:41'),
(32, 18, 'ret', 20.00, 5, 1, '2024-10-12 09:37:42', '2024-10-12 09:37:42'),
(33, 19, 'ret', 20.00, 5, 1, '2024-10-12 09:40:02', '2024-10-12 09:40:02'),
(34, 20, 'ret', 20.00, 5, 1, '2024-10-12 09:40:14', '2024-10-12 09:40:14'),
(35, 21, 'ret', 20.00, 5, 1, '2024-10-12 09:41:37', '2024-10-12 09:41:37'),
(36, 22, 'ret', 20.00, 5, 1, '2024-10-12 09:43:00', '2024-10-12 09:43:00'),
(37, 23, 'ret', 20.00, 5, 1, '2024-10-12 09:46:51', '2024-10-12 09:46:51'),
(38, 24, 'aa', 10.00, 50, 1, '2024-10-12 09:50:58', '2024-10-12 09:50:58'),
(39, 34, 'pro1', 20.00, 2, 1, '2024-10-13 10:11:53', '2024-10-13 10:11:53'),
(40, 34, 'pro2', 30.00, 3, 1, '2024-10-13 10:11:53', '2024-10-13 10:11:53'),
(45, 35, 'pro1', 20.00, 2, 1, '2024-10-13 10:24:57', '2024-10-13 10:24:57'),
(46, 35, 'pro2', 30.00, 3, 1, '2024-10-13 10:24:57', '2024-10-13 10:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_09_212059_create_clients_table', 1),
(6, '2024_10_09_212220_create_invoices_table', 1),
(7, '2024_10_09_212245_create_invoice__items_table', 1),
(8, '2024_10_09_212347_create_histories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('Admin','Employee') NOT NULL DEFAULT 'Employee',
  `status` enum('Active','Blocked') NOT NULL DEFAULT 'Active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `photo`, `email`, `email_verified_at`, `password`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'test 2', 'employee/9AleX53075jGWA85YojPwJ0IuuXd4p7SBeZphF5e.jpg', 'test@test.com', NULL, '$2y$10$jp.0MWf8hhEkgrxSnWeF.uQXeddD85NIgP6ovzohQ2gMTTi1CfQS2', 'Admin', 'Active', NULL, '2024-10-10 11:57:21', '2024-10-11 10:32:40'),
(3, 'test edit', NULL, 'talatb54@gmail.com', NULL, '$2y$10$WWxToCkun2I.5VzsHIqXI.VcF9i2mctxpkW.ooUyU4OQrGWCRS9.q', 'Employee', 'Active', NULL, '2024-10-11 07:48:14', '2024-10-11 10:32:43'),
(4, 'Abde Talaat', NULL, 'tt@test.com', NULL, '$2y$10$TwsVBte0l.LJWcdl2AO2H.Q.CtCMNVVtVDKhZOsquEMkV94oIXfsm', 'Employee', 'Active', NULL, '2024-10-11 07:49:05', '2024-10-11 10:32:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_user_id_foreign` (`user_id`),
  ADD KEY `histories_invoices_id_foreign` (`invoice_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_client_id_foreign` (`client_id`);

--
-- Indexes for table `invoice__items`
--
ALTER TABLE `invoice__items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice__items_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `invoice__items`
--
ALTER TABLE `invoice__items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_invoices_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice__items`
--
ALTER TABLE `invoice__items`
  ADD CONSTRAINT `invoice__items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
