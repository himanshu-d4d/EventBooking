-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 03:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `image`, `reset_token`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abhishek', 'sonu-1232', 'Himanshu.d4d@gmail.com', '1633004068.jpg', NULL, NULL, '$2y$10$vWGNIdTtGt0L3b4uvt8nqe0pJZA.vUOYWIN7lMINEyPkvX8LHNOYS', NULL, '2021-09-06 05:13:18', '2021-10-01 07:34:48');

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
  `eimage` varchar(255) DEFAULT NULL,
  `is_attend` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `creator_name`, `ename`, `eaddress`, `eprice`, `description`, `date`, `eimage`, `is_attend`, `created_at`, `updated_at`) VALUES
(25, 1, 'Rohit singh', 'saminar', 'delhi', 299, 'its a study event', '2021-09-17', NULL, 1, '2021-09-15', '2021-09-15'),
(26, 2, 'Abhishek', 'saminar', 'delhi', 299, 'its a study event', '2020-11-19', NULL, 1, '2021-09-15', '2021-09-15'),
(27, 2, 'Abhishek', 'saminar', 'delhi', 299, 'its a study event', '2020-11-19', NULL, 1, '2021-09-15', '2021-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `events_booking`
--

CREATE TABLE `events_booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2,
  `reminder_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events_booking`
--

INSERT INTO `events_booking` (`id`, `guest_id`, `event_id`, `status`, `reminder_date`, `created_at`, `updated_at`) VALUES
(1, 2, 25, 1, NULL, '2021-09-15 19:36:54', '2021-09-15 19:36:54'),
(2, 3, 25, 1, '2021-09-19 12:20:00', '2021-09-15 19:36:54', '2021-09-17 03:47:23'),
(3, 4, 25, 1, '0000-00-00 00:00:00', '2021-09-15 19:36:54', '2021-09-17 07:22:15'),
(4, 5, 25, 1, '2021-09-18 23:57:00', '2021-09-15 19:36:54', '2021-09-19 10:08:23'),
(5, 6, 25, 1, '2021-09-19 12:36:00', '2021-09-15 19:37:30', '2021-09-15 19:37:30'),
(6, 7, 25, 1, '2021-09-19 12:36:00', '2021-09-15 19:37:30', '2021-09-15 19:37:30'),
(7, 8, 25, 1, '2021-09-19 09:28:44', '2021-09-15 19:37:30', '2021-09-15 19:37:30'),
(8, 9, 25, 1, '2021-09-19 09:27:14', '2021-09-15 19:37:30', '2021-09-15 19:37:30'),
(9, 10, 25, 1, '2021-09-19 09:28:00', '2021-09-15 19:37:52', '2021-09-15 19:37:52'),
(10, 11, 25, 1, '2021-09-19 09:29:00', '2021-09-15 19:37:52', '2021-09-15 19:37:52'),
(11, 10, 26, 2, '2021-09-19 09:29:26', '2021-09-15 21:16:49', '2021-09-15 21:16:49'),
(12, 11, 26, 2, NULL, '2021-09-15 21:16:49', '2021-09-15 21:16:49'),
(13, 8, 26, 1, NULL, '2021-09-15 21:16:49', '2021-09-15 21:16:49'),
(14, 9, 26, 2, NULL, '2021-09-15 21:16:49', '2021-09-15 21:16:49');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
('0cd5cc7c-2184-4f6c-88f3-f584bb3e4026', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 3, '{\"message\":\"rahul your reminder start\",\"user_data\":{\"user_name\":\"rahul\",\"user_image\":\"1630925083.jpg\"},\"notification_type\":\"USER_SET_EVENT_REMINDER\"}', NULL, '2021-09-19 12:36:00', '2021-09-19 12:36:00', NULL),
('25b16c5e-696c-4c0d-aca0-f1cec1c7ff2f', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 1, '{\"message\":\"Abhishek commented on your event saminar\",\"user_data\":{\"guest_name\":\"Abhishek\",\"guest_image\":\"1630924998.jpg\"},\"notification_type\":\"USER_EVENT_COMMENT\"}', NULL, '2021-09-22 06:14:57', '2021-09-22 06:14:57', NULL),
('499584dc-e5ed-409f-b789-3664936da9d8', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 1, '{\"message\":\"Rohit singh commented on your event saminar\",\"user_data\":{\"guest_name\":\"Rohit singh\",\"guest_image\":\"1631018514.jpg\"},\"notification_type\":\"USER_EVENT_COMMENT\"}', NULL, '2021-09-22 06:10:44', '2021-09-22 06:10:44', NULL),
('4fe4e3e1-99fc-4032-a931-640858069c0f', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 6, '{\"message\":\"aditya your reminder start\",\"user_data\":{\"user_name\":\"aditya\",\"user_image\":\"1631018094.jpg\"},\"notification_type\":\"USER_SET_EVENT_REMINDER\"}', NULL, '2021-09-19 12:36:00', '2021-09-19 12:36:00', NULL),
('50c2f17f-4975-45e3-8f4b-19bdc174bfa3', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 2, '{\"message\":\"Rohit singh liked on your event saminar\",\"user_data\":{\"guest_name\":\"Rohit singh\",\"guest_image\":\"1631018514.jpg\"},\"notification_type\":\"USER_EVENT_COMMENT\"}', NULL, '2021-09-22 06:18:58', '2021-09-22 06:18:58', NULL),
('6f4c29a1-6723-40cd-929b-dd46d5eb8d93', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 1, '{\"message\":\"Abhishek commented on your event saminar\",\"user_data\":{\"guest_name\":\"Abhishek\",\"guest_image\":\"1630924998.jpg\"},\"notification_type\":\"USER_EVENT_COMMENT\"}', NULL, '2021-09-23 01:58:14', '2021-09-23 01:58:14', NULL),
('9c1fe6ed-d257-4b90-9a06-efbc4658ba63', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 1, '{\"message\":\"Abhishek commented on your event saminar\",\"user_data\":{\"guest_name\":\"Abhishek\",\"guest_image\":\"1630924998.jpg\"},\"notification_type\":\"USER_EVENT_COMMENT\"}', NULL, '2021-09-23 03:41:56', '2021-09-23 03:41:56', NULL),
('ad9a0e5a-48b3-430d-bfe2-5faf706514dc', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 1, '{\"message\":\"Rohit singh commented on your event saminar\",\"user_data\":{\"guest_name\":\"Rohit singh\",\"guest_image\":\"1631018514.jpg\"},\"notification_type\":\"USER_EVENT_COMMENT\"}', NULL, '2021-09-22 06:18:24', '2021-09-22 06:18:24', NULL),
('dfa009b5-a84a-4ef6-ae1c-261eaf91d965', 'App\\Notifications\\Eventnotification', 'App\\Models\\User', 7, '{\"message\":\"deep your reminder start\",\"user_data\":{\"user_name\":\"deep\",\"user_image\":null},\"notification_type\":\"USER_SET_EVENT_REMINDER\"}', NULL, '2021-09-19 12:36:00', '2021-09-19 12:36:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01efcccbb53d1a8e3a58485484291b8f00de9249c9c70a370230b9c63badf5b8e559bdc23f65eaf5', 1, 1, 'myapp', '[]', 0, '2021-09-16 05:18:50', '2021-09-16 05:18:50', '2022-09-16 10:48:50'),
('0467d400aef9351f5cc26eb6db442aa971d07ee8b5ff508b6e808529f9354c66a8c6d28fc2c1db1b', 1, 1, 'myapp', '[]', 0, '2021-09-16 08:09:14', '2021-09-16 08:09:14', '2022-09-16 13:39:14'),
('1132830b29836efbadf4cb8be1a349d16821b76b1bb3002650f76b07f69c6f1b3caaa6bd48e7498a', 1, 1, 'myapp', '[]', 0, '2021-09-16 07:47:37', '2021-09-16 07:47:37', '2022-09-16 13:17:37'),
('17e2ec4456602ed883debb24701d910c3e6e5e0879deaa8d2060b47a821cc47d9f27685b37282979', 1, 1, 'myapp', '[]', 0, '2021-09-07 08:50:34', '2021-09-07 08:50:34', '2022-09-07 14:20:34'),
('18be1e5b3e56320d6e6ba3d329527760f69e0a2d496542ed1632bf4ad1c8430ba2fb21fcfb402293', 1, 1, 'myapp', '[]', 0, '2021-09-06 22:21:46', '2021-09-06 22:21:46', '2022-09-07 03:51:46'),
('1c68d0fa630c423109c348f6f6667f178422ef1452a316c3bd7d99b7c685b0424e988a7f2f22a5f2', 1, 1, 'myapp', '[]', 0, '2021-09-09 22:15:12', '2021-09-09 22:15:12', '2022-09-10 03:45:12'),
('295581bbfaf2b5164a764d7e1463e921d12728ba6483616fd3b35c878307cefd2ab5579babf157d5', 5, 1, 'myapp', '[]', 0, '2021-09-06 05:21:00', '2021-09-06 05:21:00', '2022-09-06 10:51:00'),
('2c2c55e3fd1522e219e7daeb86649ff66b87ad2bc3c8252458a5e2d138af7e1cb29badd8d4e1fa31', 9, 1, 'myapp', '[]', 0, '2021-09-15 19:16:37', '2021-09-15 19:16:37', '2022-09-15 12:16:37'),
('34e1375278dde6679ca6d69b7836c36111125c77a3b83f298beddc713fa3398bc9446f0712563604', 1, 1, 'myapp', '[]', 0, '2021-09-22 03:37:31', '2021-09-22 03:37:31', '2022-09-22 09:07:31'),
('35a108699e1d181f70068d99dfb657e7f1918b44501d105613f68dc1c0670fb0c7cafc3b2a81befa', 1, 1, 'myapp', '[]', 0, '2021-09-16 07:48:50', '2021-09-16 07:48:50', '2022-09-16 13:18:50'),
('38ab7b787562e2563c1e7ec43dbbfb7a3c6052e851a736ed8d714caaec65b7d37fe84beac9272b7d', 2, 1, 'myapp', '[]', 0, '2021-09-09 00:04:27', '2021-09-09 00:04:27', '2022-09-09 05:34:27'),
('3bb3991dac6e94863d2d6efb6ac03f64d0fb044d85c20294454e6a903351ec13e28a7e0eeaf4b1ca', 7, 1, 'myapp', '[]', 0, '2021-09-15 19:15:25', '2021-09-15 19:15:25', '2022-09-15 12:15:25'),
('53e752eaf5396c48adae6c66a9432be936219252a444aa17c5a28bd400719bc54511e0540ba47cb2', 6, 1, 'myapp', '[]', 0, '2021-09-07 07:04:54', '2021-09-07 07:04:54', '2022-09-07 12:34:54'),
('5a217224987fcd79283273b8ab46bf1381b8f984ac77a4a9d49ce28de2c08f8c0642e088d2bc507a', 2, 1, 'myapp', '[]', 0, '2021-09-07 08:21:57', '2021-09-07 08:21:57', '2022-09-07 13:51:57'),
('61268f28f1808b874d8585ea8e9295fb3a28b70f67135f44ab277b332e0726b006b5495c67071181', 1, 1, 'myapp', '[]', 0, '2021-09-23 05:43:47', '2021-09-23 05:43:47', '2022-09-23 11:13:47'),
('62d3d716305c99906fc60b9a9053a6e06a784cb5a0de3d8c57baf7b8b1a414cb1922e0b60e0b041d', 2, 1, 'myapp', '[]', 0, '2021-09-15 19:26:31', '2021-09-15 19:26:31', '2022-09-15 12:26:31'),
('6a78591393f3555a8f2409414cd94bb8b9a8b79af9c65091c5fa5f004073c5f70df12b124874fcb0', 10, 1, 'myapp', '[]', 0, '2021-09-15 19:16:59', '2021-09-15 19:16:59', '2022-09-15 12:16:59'),
('6f5a2b874700e0cae1603b2a6d17626d0a9e970a57808b5ab378d281c3f21a3d474aa65311d0dd5c', 2, 1, 'myapp', '[]', 0, '2021-09-22 06:14:37', '2021-09-22 06:14:37', '2022-09-22 11:44:37'),
('724bc631134fdcd7aede22bd59d64febc54625a6fa1665ca8c868c5177f67772991a16d7931840d6', 1, 1, 'myapp', '[]', 0, '2021-09-08 22:08:26', '2021-09-08 22:08:26', '2022-09-09 03:38:26'),
('750a07e31a7698ed101affd73e39315cf5d64fe559d5ea1dff272df3cfd906918ecf4eee0834dcf8', 1, 1, 'myapp', '[]', 0, '2021-09-17 01:36:53', '2021-09-17 01:36:53', '2022-09-17 07:06:53'),
('78ae843ab46640a7b82a158a4f4f8dfeb1cb4a428811894bfe5d7f14180158bb36380cf7409ec263', 1, 1, 'myapp', '[]', 0, '2021-09-09 06:48:26', '2021-09-09 06:48:26', '2022-09-09 12:18:26'),
('78b660d84cd9991a35ba4dc89c84f89bb8243dbee483a2287a4afd3fc6d08e1aba5bf7f34585b8f5', 1, 1, 'myapp', '[]', 0, '2021-09-13 22:55:14', '2021-09-13 22:55:14', '2022-09-14 04:25:14'),
('7da820374f006a1cd5e3abdc67e6775c4e8f74dfafffaca8802e0cd7b23423e03ca4b46a458caa0c', 8, 1, 'myapp', '[]', 0, '2021-09-15 19:15:58', '2021-09-15 19:15:58', '2022-09-15 12:15:58'),
('805486d135cc80a50b0e55864171c0ce0c41290408d9a83322c7f6a9affbc4e817046848b290060c', 1, 1, 'myapp', '[]', 0, '2021-09-15 14:55:28', '2021-09-15 14:55:28', '2022-09-15 07:55:28'),
('806289ce5d8c8f6396ec1d103d2d6d8a094f674b311f8474364edd02e8225ab47e7c33108f70f6da', 1, 1, 'myapp', '[]', 0, '2021-09-07 22:51:40', '2021-09-07 22:51:40', '2022-09-08 04:21:40'),
('85a363550f998f7686711d86fd1da832250974fc868cb2a4987cf3f4f3f4d4b162033f4a769efdd8', 1, 1, 'myapp', '[]', 0, '2021-09-09 04:36:55', '2021-09-09 04:36:55', '2022-09-09 10:06:55'),
('8bfd6fc5d6afccc2995e179589a770ccf6a80a79c3e2a1ab22a9d9f9a25ea419b18883d5772936fa', 2, 1, 'myapp', '[]', 0, '2021-09-07 08:10:41', '2021-09-07 08:10:41', '2022-09-07 13:40:41'),
('8ca3f1d3575f74dc237c5315e49141e8c35305c1565c1393d29213b6f6bf1c50c6755ae2eb658669', 1, 1, 'myapp', '[]', 0, '2021-09-23 05:40:37', '2021-09-23 05:40:37', '2022-09-23 11:10:37'),
('8efbcb344e983eac4d07f5dfc31b608d43c660859aa44c717ccde7f2df290b050b0b09525c5b75ab', 1, 1, 'myapp', '[]', 0, '2021-09-07 08:21:19', '2021-09-07 08:21:19', '2022-09-07 13:51:19'),
('972f5900af9905267889a2c1e275df978e703a40dd70f90c971676c1e69bdb73b3b84354cf2734fc', 1, 1, 'myapp', '[]', 0, '2021-09-16 05:21:10', '2021-09-16 05:21:10', '2022-09-16 10:51:10'),
('9e3cd9269272a91d6a6723dc5168917df489f025e1e4821d41b63bcc9fb3b6875752b6e405138482', 1, 1, 'myapp', '[]', 0, '2021-09-06 09:35:09', '2021-09-06 09:35:09', '2022-09-06 15:05:09'),
('a29e7833a2a7a512e144707cfccb8e0b7c95fcd5bd41940175940c39ff987f16958bf2fca1a4ae56', 2, 1, 'myapp', '[]', 0, '2021-09-15 22:40:09', '2021-09-15 22:40:09', '2022-09-16 04:10:09'),
('a5d4a9fc66692004a5e0472fc47c302610ec6a6c09b6153ce6e97effa1cccbef21238bd10e10f6b8', 1, 1, 'myapp', '[]', 0, '2021-09-07 08:10:01', '2021-09-07 08:10:01', '2022-09-07 13:40:01'),
('b633e76ce54f1d29c1f455edbc3c655b621f0912b91ad9e8b4027f18d6198c338a9b03b357c3bdf5', 1, 1, 'myapp', '[]', 0, '2021-09-23 05:46:40', '2021-09-23 05:46:40', '2022-09-23 11:16:40'),
('ba7c5df13597ba2431ec976148f408084a70201433c5bfcf419e0e2667f9e2c20cee6ab366be57e1', 2, 1, 'myapp', '[]', 0, '2021-09-17 02:24:02', '2021-09-17 02:24:02', '2022-09-17 07:54:02'),
('bea43fd9fafbe65bced343d6352662fd1d17961d59873cb8d4d55f388279a05fcbc14ea588289685', 1, 1, 'myapp', '[]', 0, '2021-09-07 07:18:48', '2021-09-07 07:18:48', '2022-09-07 12:48:48'),
('c31aa81cfa2459e10426d9d628cd024e10dfef7f85385c267116fde0d3fdc8e868780c4b698d74c8', 2, 1, 'myapp', '[]', 0, '2021-09-17 07:21:28', '2021-09-17 07:21:28', '2022-09-17 12:51:28'),
('c31eb2707eb6e059c162b7e2398ff88d5777a3e95443bd7d25ea88199a20a0f7556486e07c7b053c', 11, 1, 'myapp', '[]', 0, '2021-09-15 19:17:32', '2021-09-15 19:17:32', '2022-09-15 12:17:32'),
('c3c1eed79f066d93935507b3ca62c9d9f5e510d1b32b16df289e116d040c3418100afe551e9aae96', 2, 1, 'myapp', '[]', 0, '2021-09-23 01:57:02', '2021-09-23 01:57:02', '2022-09-23 07:27:02'),
('c67bf01cf4ccf095ab7c9467109c7bc905df7e529a9df593fdf5fbc0158dbc6a2cc2629785864644', 2, 1, 'myapp', '[]', 0, '2021-09-07 08:28:43', '2021-09-07 08:28:43', '2022-09-07 13:58:43'),
('c968296f72662178509c9a7b0c2e290b808b1b26f4d79566e0b53be8aef3ae0fae75e77345b6312e', 2, 1, 'myapp', '[]', 0, '2021-09-23 05:45:05', '2021-09-23 05:45:05', '2022-09-23 11:15:05'),
('d1449c63ea2316885394973842a22997968f2b091edfcd52c4650af8ac9baaa8a420fdf2ebadf637', 2, 1, 'myapp', '[]', 0, '2021-09-07 07:59:21', '2021-09-07 07:59:21', '2022-09-07 13:29:21'),
('d1969f6a742ed8eefe0a3a9758ed21bd4a9da09072e8d42f10369b850d4a8e123f5c44218282e9fe', 1, 1, 'myapp', '[]', 0, '2021-09-13 05:59:42', '2021-09-13 05:59:42', '2022-09-13 11:29:42'),
('d3f4894a513e541b57c60188464798649c200cd969589c0955f847d81cc32c907f6ea39b201774af', 1, 1, 'myapp', '[]', 1, '2021-09-07 07:05:40', '2021-09-07 07:05:40', '2022-09-07 12:35:40'),
('df75f765b68531502e71a6ea9d4687632a8eeda3f982ca7eee0bff7d06a8157f51e34f67d8cfc389', 1, 1, 'myapp', '[]', 0, '2021-09-07 08:26:31', '2021-09-07 08:26:31', '2022-09-07 13:56:31'),
('eac1005b29e1466ed5d89dcaef56f47150156a54cd5b4329cf3081aa7994970b4b7efa45e88315bc', 1, 1, 'myapp', '[]', 0, '2021-09-16 06:09:17', '2021-09-16 06:09:17', '2022-09-16 11:39:17'),
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
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'Himanshu', 'sonu-123', 'sonu@gmail.com', '1631018514.jpg', NULL, NULL, '$2y$10$vttQy9e0U8yJ7gENy3sB2OroEq.fGC8rZ4hTZWd5LiO7vJWUIyCi6', NULL, '2021-09-06 05:12:14', '2021-10-01 05:00:07'),
(3, 'rahul', 'sonu-12', 'sonu123@gmail.com', '1630925083.jpg', NULL, NULL, '$2y$10$qH.ZgXwqnQ4doszBsHFBAe5mkhbXTRdZSdOabD7ItbwkOjZIDvYdy', NULL, '2021-09-06 05:14:43', '2021-09-06 05:14:43'),
(4, 'Sonu', 'sonu-1222', 'sonu1232@gmail.com', '1630925332.jpg', NULL, NULL, '$2y$10$UvwlnaXztVNHiqqvArPumOkFbfRZXpksJuYkQ96W0HI5yNTEiUwYK', NULL, '2021-09-06 05:18:52', '2021-09-06 05:18:52'),
(5, 'Monu', 'sonu-12221', 'sonu12312@gmail.com', '1630925460.jpg', NULL, NULL, '$2y$10$U/kY2eZ1ldU8I4FdBYMUc.FXTJ5qvVs75RlHQWa6JEj0FBXpMHsbu', NULL, '2021-09-06 05:21:00', '2021-09-06 05:21:00'),
(6, 'aditya', 'sonu-122', 'sonu1231@gmail.com', '1631018094.jpg', NULL, NULL, '$2y$10$sammszGwac5c/rj6qXSaEOnY.WmLzwCNWYfsxst72k.sTn3K76reu', NULL, '2021-09-07 07:04:54', '2021-09-07 07:04:54'),
(7, 'deep', 'deep-123', 'deep@gmail.com', NULL, NULL, NULL, '$2y$10$1iBTdiQew28v4qVKNDAIGOENdBrLax0/WB.7UzLY35yohL1YIFB5K', NULL, '2021-09-15 19:15:25', '2021-09-15 19:15:25'),
(8, 'deepak', 'deepak-123', 'deepak@gmail.com', NULL, NULL, NULL, '$2y$10$c9D5UpvfDt0C4z.XWOqssuaNHf4MX31umPHG/T8rKaeEvfS.a32Ou', NULL, '2021-09-15 19:15:58', '2021-09-15 19:15:58'),
(9, 'raj', 'raj-123', 'raj@gmail.com', NULL, NULL, NULL, '$2y$10$4VDB/sGxGe4VND3GaaEK4uFRCEcdiMdIf7.N9/vvsSPUZb8Klt.LG', NULL, '2021-09-15 19:16:37', '2021-09-15 19:16:37'),
(10, 'shivam', 'shivam-123', 'shivam@gmail.com', NULL, NULL, NULL, '$2y$10$BAc/nqgW0lOfEYrR3xHg3O1oSLuCB.9qdvRjEVZejrSMDW4fk9a4i', NULL, '2021-09-15 19:16:59', '2021-09-15 19:16:59'),
(11, 'deependra', 'deependra-123', 'deependra@gmail.com', NULL, NULL, NULL, '$2y$10$dWoQM1IawLlobOj3dktvHeCwfgY5/RxvoiW6G1k/jQdP0Z.c8KGpe', NULL, '2021-09-15 19:17:32', '2021-09-15 19:17:32'),
(12, 'Himanshu', 'Himanshu.d4d', 'Himanshu.d4d@gmail.com', 'tiger.jpg', NULL, NULL, '$2y$10$Ux8rAZxChvVcmpH02Mly4esfAwREJCpsSVCtB5KobS/IVA/ml17GS', NULL, '2021-10-01 05:46:31', '2021-10-01 05:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_comment`
--

CREATE TABLE `user_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_comment`
--

INSERT INTO `user_comment` (`id`, `event_id`, `guest_id`, `comment`, `created_at`, `updated_at`) VALUES
(2, 25, 1, 'this is very helpful event and its very creative event i have joind tha event i like its', '2021-09-22 05:50:20', '2021-09-22 05:50:20'),
(3, 25, 1, 'this is very helpful event and its very creative event i have joind tha event i like its', '2021-09-22 05:51:21', '2021-09-22 05:51:21'),
(4, 25, 1, 'this is very helpful event and its very creative event i have joind tha event i like its', '2021-09-22 06:10:44', '2021-09-22 06:10:44'),
(5, 25, 2, 'this is very helpful event and its very creative event i have joind tha event i like its', '2021-09-22 06:14:57', '2021-09-22 06:14:57'),
(6, 25, 2, 'this is a very helpful event', '2021-09-23 01:58:13', '2021-09-23 01:58:13'),
(7, 25, 2, 'this is a very helpful event', '2021-09-23 03:41:56', '2021-09-23 03:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `like_flag` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`id`, `event_id`, `guest_id`, `like_flag`, `created_at`, `updated_at`) VALUES
(25, 25, 1, 1, '2021-09-22 06:18:24', '2021-09-23 01:59:00'),
(26, 26, 1, 1, '2021-09-22 06:18:58', '2021-09-22 06:18:58'),
(27, 25, 2, 1, '2021-09-22 06:18:24', '2021-09-23 01:59:00'),
(28, 25, 3, 1, '2021-09-22 06:18:24', '2021-09-23 01:59:00'),
(29, 26, 1, 1, '2021-09-22 06:18:58', '2021-09-22 06:18:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- Indexes for table `user_comment`
--
ALTER TABLE `user_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `events_booking`
--
ALTER TABLE `events_booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_comment`
--
ALTER TABLE `user_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_likes`
--
ALTER TABLE `user_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
