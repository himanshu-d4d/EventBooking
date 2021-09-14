-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2021 at 07:08 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-26+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `creator_name` varchar(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `eaddress` varchar(255) NOT NULL,
  `eprice` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `eimage` varchar(255) NOT NULL,
  `is_attend` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `creator_name`, `ename`, `eaddress`, `eprice`, `description`, `date`, `eimage`, `is_attend`, `created_at`, `updated_at`) VALUES
(14, 1, 'Rohit singh', 'saminarrrr', 'delhi', 299, 'its is study seminar', '2021-01-20', '1631186119.jpg', 0, '2021-09-09', '2021-09-09'),
(22, 1, 'Rohit singh', 'saminar', 'delhi', 299, 'its a study event', '2021-11-19', '1631182699.jpg', 1, '2021-09-09', '2021-09-09'),
(23, 1, 'Rohit singh', 'saminar', 'delhi', 299, 'its a study event', '2020-11-19', '1631185806.jpg', 1, '2021-09-09', '2021-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `events_booking`
--

CREATE TABLE `events_booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events_booking`
--

INSERT INTO `events_booking` (`id`, `guest_id`, `event_id`, `status`, `created_at`, `updated_at`) VALUES
(152, 2, 14, 2, '2021-09-13 06:21:59', '2021-09-13 06:21:59'),
(153, 2, 14, 1, '2021-09-13 06:29:34', '2021-09-13 06:29:34'),
(154, 2, 14, 2, '2021-09-13 06:32:16', '2021-09-13 06:32:16'),
(155, 2, 14, 2, '2021-09-13 22:55:38', '2021-09-13 22:55:38'),
(156, 2, 14, 2, '2021-09-13 22:56:15', '2021-09-13 22:56:15'),
(157, 2, 14, 2, '2021-09-13 22:56:36', '2021-09-13 22:56:36'),
(158, 2, 14, 2, '2021-09-13 23:15:58', '2021-09-13 23:15:58'),
(159, 2, 14, 2, '2021-09-13 23:16:15', '2021-09-13 23:16:15'),
(160, 2, 14, 2, '2021-09-13 23:16:37', '2021-09-13 23:16:37'),
(161, 2, 14, 2, '2021-09-13 23:17:07', '2021-09-13 23:17:07'),
(162, 2, 14, 2, '2021-09-13 23:20:46', '2021-09-13 23:20:46'),
(163, 2, 14, 2, '2021-09-13 23:20:47', '2021-09-13 23:20:47'),
(164, 2, 14, 2, '2021-09-13 23:21:17', '2021-09-13 23:21:17'),
(165, 2, 14, 2, '2021-09-13 23:21:31', '2021-09-13 23:21:31'),
(166, 2, 14, 2, '2021-09-13 23:22:37', '2021-09-13 23:22:37'),
(167, 2, 14, 2, '2021-09-13 23:22:50', '2021-09-13 23:22:50'),
(168, 2, 14, 2, '2021-09-13 23:23:05', '2021-09-13 23:23:05'),
(169, 2, 14, 2, '2021-09-13 23:24:04', '2021-09-13 23:24:04'),
(170, 2, 14, 2, '2021-09-13 23:27:14', '2021-09-13 23:27:14'),
(171, 2, 14, 2, '2021-09-13 23:27:16', '2021-09-13 23:27:16'),
(172, 2, 14, 2, '2021-09-13 23:28:36', '2021-09-13 23:28:36'),
(173, 2, 14, 2, '2021-09-13 23:29:03', '2021-09-13 23:29:03'),
(174, 2, 14, 2, '2021-09-13 23:29:26', '2021-09-13 23:29:26'),
(175, 2, 14, 2, '2021-09-13 23:38:31', '2021-09-13 23:38:31'),
(176, 2, 14, 2, '2021-09-13 23:38:53', '2021-09-13 23:38:53'),
(177, 2, 14, 2, '2021-09-13 23:39:17', '2021-09-13 23:39:17'),
(178, 2, 14, 2, '2021-09-13 23:39:41', '2021-09-13 23:39:41'),
(179, 2, 14, 2, '2021-09-13 23:39:44', '2021-09-13 23:39:44'),
(180, 2, 14, 2, '2021-09-13 23:40:19', '2021-09-13 23:40:19'),
(181, 2, 14, 2, '2021-09-13 23:40:22', '2021-09-13 23:40:22'),
(182, 2, 14, 2, '2021-09-13 23:41:13', '2021-09-13 23:41:13'),
(183, 2, 14, 2, '2021-09-13 23:41:30', '2021-09-13 23:41:30'),
(184, 2, 14, 2, '2021-09-13 23:43:19', '2021-09-13 23:43:19'),
(185, 2, 14, 2, '2021-09-13 23:44:29', '2021-09-13 23:44:29'),
(186, 2, 14, 2, '2021-09-13 23:45:10', '2021-09-13 23:45:10'),
(187, 2, 14, 2, '2021-09-13 23:45:21', '2021-09-13 23:45:21'),
(188, 2, 14, 2, '2021-09-13 23:45:40', '2021-09-13 23:45:40'),
(189, 2, 14, 2, '2021-09-13 23:45:50', '2021-09-13 23:45:50'),
(190, 2, 14, 2, '2021-09-13 23:45:59', '2021-09-13 23:45:59'),
(191, 2, 14, 2, '2021-09-13 23:46:14', '2021-09-13 23:46:14'),
(192, 2, 14, 2, '2021-09-13 23:50:04', '2021-09-13 23:50:04'),
(193, 2, 14, 2, '2021-09-13 23:50:27', '2021-09-13 23:50:27'),
(194, 2, 14, 2, '2021-09-13 23:51:11', '2021-09-13 23:51:11'),
(195, 2, 14, 2, '2021-09-13 23:51:43', '2021-09-13 23:51:43'),
(196, 2, 14, 2, '2021-09-13 23:51:45', '2021-09-13 23:51:45'),
(197, 2, 14, 2, '2021-09-13 23:52:00', '2021-09-13 23:52:00'),
(198, 2, 14, 2, '2021-09-13 23:52:37', '2021-09-13 23:52:37'),
(199, 2, 14, 2, '2021-09-13 23:52:54', '2021-09-13 23:52:54'),
(200, 2, 14, 2, '2021-09-13 23:54:01', '2021-09-13 23:54:01'),
(201, 2, 14, 2, '2021-09-13 23:55:06', '2021-09-13 23:55:06'),
(202, 2, 14, 2, '2021-09-13 23:55:30', '2021-09-13 23:55:30'),
(203, 2, 14, 2, '2021-09-13 23:57:40', '2021-09-13 23:57:40'),
(204, 2, 14, 2, '2021-09-13 23:58:11', '2021-09-13 23:58:11'),
(205, 2, 14, 2, '2021-09-14 00:05:33', '2021-09-14 00:05:33'),
(206, 2, 14, 2, '2021-09-14 00:08:36', '2021-09-14 00:08:36'),
(207, 2, 14, 2, '2021-09-14 00:09:23', '2021-09-14 00:09:23'),
(208, 2, 14, 2, '2021-09-14 00:46:41', '2021-09-14 00:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(29, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(30, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(31, '2016_06_01_000004_create_oauth_clients_table', 1),
(32, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2021_09_06_143954_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
('73f55d95-7c2c-4c9f-84ca-07fc794e1674', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 2, '{"message":"Rohit singh invited you to his event    saminarrrr","user_data":{"user_name":"Rohit singh","user_image":"1631018514.jpg"},"notification_type":"not_attend","user_attend_status":"USER_EVENT_GUEST_ADD"}', NULL, '2021-09-14 00:09:23', '2021-09-14 00:09:23', NULL),
('f439777f-a320-4fde-97be-7816086ed0ab', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 2, '{"message":"Rohit singh invited you to his event    saminarrrr","user_data":{"user_name":"Rohit singh","user_image":"1631018514.jpg"},"notification_type":"USER_EVENT_GUEST_ADD","user_attend_status":"not_attend"}', NULL, '2021-09-14 00:46:41', '2021-09-14 00:46:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('17e2ec4456602ed883debb24701d910c3e6e5e0879deaa8d2060b47a821cc47d9f27685b37282979', 1, 1, 'myapp', '[]', 0, '2021-09-07 08:50:34', '2021-09-07 08:50:34', '2022-09-07 14:20:34'),
('18be1e5b3e56320d6e6ba3d329527760f69e0a2d496542ed1632bf4ad1c8430ba2fb21fcfb402293', 1, 1, 'myapp', '[]', 0, '2021-09-06 22:21:46', '2021-09-06 22:21:46', '2022-09-07 03:51:46'),
('1c68d0fa630c423109c348f6f6667f178422ef1452a316c3bd7d99b7c685b0424e988a7f2f22a5f2', 1, 1, 'myapp', '[]', 0, '2021-09-09 22:15:12', '2021-09-09 22:15:12', '2022-09-10 03:45:12'),
('295581bbfaf2b5164a764d7e1463e921d12728ba6483616fd3b35c878307cefd2ab5579babf157d5', 5, 1, 'myapp', '[]', 0, '2021-09-06 05:21:00', '2021-09-06 05:21:00', '2022-09-06 10:51:00'),
('38ab7b787562e2563c1e7ec43dbbfb7a3c6052e851a736ed8d714caaec65b7d37fe84beac9272b7d', 2, 1, 'myapp', '[]', 0, '2021-09-09 00:04:27', '2021-09-09 00:04:27', '2022-09-09 05:34:27'),
('53e752eaf5396c48adae6c66a9432be936219252a444aa17c5a28bd400719bc54511e0540ba47cb2', 6, 1, 'myapp', '[]', 0, '2021-09-07 07:04:54', '2021-09-07 07:04:54', '2022-09-07 12:34:54'),
('5a217224987fcd79283273b8ab46bf1381b8f984ac77a4a9d49ce28de2c08f8c0642e088d2bc507a', 2, 1, 'myapp', '[]', 0, '2021-09-07 08:21:57', '2021-09-07 08:21:57', '2022-09-07 13:51:57'),
('724bc631134fdcd7aede22bd59d64febc54625a6fa1665ca8c868c5177f67772991a16d7931840d6', 1, 1, 'myapp', '[]', 0, '2021-09-08 22:08:26', '2021-09-08 22:08:26', '2022-09-09 03:38:26'),
('78ae843ab46640a7b82a158a4f4f8dfeb1cb4a428811894bfe5d7f14180158bb36380cf7409ec263', 1, 1, 'myapp', '[]', 0, '2021-09-09 06:48:26', '2021-09-09 06:48:26', '2022-09-09 12:18:26'),
('78b660d84cd9991a35ba4dc89c84f89bb8243dbee483a2287a4afd3fc6d08e1aba5bf7f34585b8f5', 1, 1, 'myapp', '[]', 0, '2021-09-13 22:55:14', '2021-09-13 22:55:14', '2022-09-14 04:25:14'),
('806289ce5d8c8f6396ec1d103d2d6d8a094f674b311f8474364edd02e8225ab47e7c33108f70f6da', 1, 1, 'myapp', '[]', 0, '2021-09-07 22:51:40', '2021-09-07 22:51:40', '2022-09-08 04:21:40'),
('85a363550f998f7686711d86fd1da832250974fc868cb2a4987cf3f4f3f4d4b162033f4a769efdd8', 1, 1, 'myapp', '[]', 0, '2021-09-09 04:36:55', '2021-09-09 04:36:55', '2022-09-09 10:06:55'),
('8bfd6fc5d6afccc2995e179589a770ccf6a80a79c3e2a1ab22a9d9f9a25ea419b18883d5772936fa', 2, 1, 'myapp', '[]', 0, '2021-09-07 08:10:41', '2021-09-07 08:10:41', '2022-09-07 13:40:41'),
('8efbcb344e983eac4d07f5dfc31b608d43c660859aa44c717ccde7f2df290b050b0b09525c5b75ab', 1, 1, 'myapp', '[]', 0, '2021-09-07 08:21:19', '2021-09-07 08:21:19', '2022-09-07 13:51:19'),
('9e3cd9269272a91d6a6723dc5168917df489f025e1e4821d41b63bcc9fb3b6875752b6e405138482', 1, 1, 'myapp', '[]', 0, '2021-09-06 09:35:09', '2021-09-06 09:35:09', '2022-09-06 15:05:09'),
('a5d4a9fc66692004a5e0472fc47c302610ec6a6c09b6153ce6e97effa1cccbef21238bd10e10f6b8', 1, 1, 'myapp', '[]', 0, '2021-09-07 08:10:01', '2021-09-07 08:10:01', '2022-09-07 13:40:01'),
('bea43fd9fafbe65bced343d6352662fd1d17961d59873cb8d4d55f388279a05fcbc14ea588289685', 1, 1, 'myapp', '[]', 0, '2021-09-07 07:18:48', '2021-09-07 07:18:48', '2022-09-07 12:48:48'),
('c67bf01cf4ccf095ab7c9467109c7bc905df7e529a9df593fdf5fbc0158dbc6a2cc2629785864644', 2, 1, 'myapp', '[]', 0, '2021-09-07 08:28:43', '2021-09-07 08:28:43', '2022-09-07 13:58:43'),
('d1449c63ea2316885394973842a22997968f2b091edfcd52c4650af8ac9baaa8a420fdf2ebadf637', 2, 1, 'myapp', '[]', 0, '2021-09-07 07:59:21', '2021-09-07 07:59:21', '2022-09-07 13:29:21'),
('d1969f6a742ed8eefe0a3a9758ed21bd4a9da09072e8d42f10369b850d4a8e123f5c44218282e9fe', 1, 1, 'myapp', '[]', 0, '2021-09-13 05:59:42', '2021-09-13 05:59:42', '2022-09-13 11:29:42'),
('d3f4894a513e541b57c60188464798649c200cd969589c0955f847d81cc32c907f6ea39b201774af', 1, 1, 'myapp', '[]', 1, '2021-09-07 07:05:40', '2021-09-07 07:05:40', '2022-09-07 12:35:40'),
('df75f765b68531502e71a6ea9d4687632a8eeda3f982ca7eee0bff7d06a8157f51e34f67d8cfc389', 1, 1, 'myapp', '[]', 0, '2021-09-07 08:26:31', '2021-09-07 08:26:31', '2022-09-07 13:56:31'),
('f096f45f23b4b79690423de523ac43e79f88c9be656bda9da56d97e21263acc283498f7f18aa6c76', 3, 1, 'myapp', '[]', 0, '2021-09-06 05:21:46', '2021-09-06 05:21:46', '2022-09-06 10:51:46'),
('f2bafff093b7b41c03a911b86e0a75d5891e6545ebb1b87d7d777a8baeb46c7a24159b365214489c', 1, 1, 'myapp', '[]', 0, '2021-09-08 08:41:31', '2021-09-08 08:41:31', '2022-09-08 14:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'y', 'vMAVKyarG379lXjoEioOak7w7FbDny6WqeQLSZze', NULL, 'http://localhost', 1, 0, 0, '2021-09-06 05:20:36', '2021-09-06 05:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-09-06 05:20:36', '2021-09-06 05:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `image`, `reset_token`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rohit singh', 'sonu-123', 'sonu1@gmail.com', '1631018514.jpg', NULL, NULL, '$2y$10$vttQy9e0U8yJ7gENy3sB2OroEq.fGC8rZ4hTZWd5LiO7vJWUIyCi6', NULL, '2021-09-06 05:12:14', '2021-09-07 07:11:54'),
(2, 'Abhishek', 'sonu-1232', 'sonu12@gmail.com', '1630924998.jpg', NULL, NULL, '$2y$10$PBS/AQSZhI4JfJEk0tYXwOt4fNq7V/UtlWJn0hb6U4AxqErOGT1LK', NULL, '2021-09-06 05:13:18', '2021-09-06 05:13:18'),
(3, 'rahul', 'sonu-12', 'sonu123@gmail.com', '1630925083.jpg', NULL, NULL, '$2y$10$qH.ZgXwqnQ4doszBsHFBAe5mkhbXTRdZSdOabD7ItbwkOjZIDvYdy', NULL, '2021-09-06 05:14:43', '2021-09-06 05:14:43'),
(4, 'Sonu', 'sonu-1222', 'sonu1232@gmail.com', '1630925332.jpg', NULL, NULL, '$2y$10$UvwlnaXztVNHiqqvArPumOkFbfRZXpksJuYkQ96W0HI5yNTEiUwYK', NULL, '2021-09-06 05:18:52', '2021-09-06 05:18:52'),
(5, 'Monu', 'sonu-12221', 'sonu12312@gmail.com', '1630925460.jpg', NULL, NULL, '$2y$10$U/kY2eZ1ldU8I4FdBYMUc.FXTJ5qvVs75RlHQWa6JEj0FBXpMHsbu', NULL, '2021-09-06 05:21:00', '2021-09-06 05:21:00'),
(6, 'aditya', 'sonu-122', 'sonu1231@gmail.com', '1631018094.jpg', NULL, NULL, '$2y$10$sammszGwac5c/rj6qXSaEOnY.WmLzwCNWYfsxst72k.sTn3K76reu', NULL, '2021-09-07 07:04:54', '2021-09-07 07:04:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_booking`
--
ALTER TABLE `events_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `events_booking`
--
ALTER TABLE `events_booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
