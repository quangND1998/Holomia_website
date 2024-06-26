-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 25, 2024 lúc 10:48 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `holomia_website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_contents`
--

CREATE TABLE `category_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_priority` int(11) DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_holo360`
--

CREATE TABLE `category_holo360` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_priority` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_holo360`
--

INSERT INTO `category_holo360` (`id`, `name`, `slug`, `image`, `content`, `id_priority`, `created_at`, `updated_at`) VALUES
(1, 'Tour 360', 'tour-360', 'images/contents/1686365414-1677120911gqqicxdyecpng.png', 'Holomia is a virtual reality platform for entertainment and education. Users will be immersed in the virtual world with unique and impressive experiences.\r\nour story', NULL, '2023-06-09 02:56:51', '2023-06-09 19:50:42'),
(2, 'Tour VR', 'tour-vr', 'images/contents/1686365420-336522407-1210246092881630-4007925521119132651-npng.png', 'Holomia connects people in the virtual space. You will easily organize workshops, classes or product exhibitions in a virtual environment that is no longer limited in space and time.', NULL, '2023-06-09 02:57:11', '2023-06-09 19:50:20'),
(3, 'Expo', 'expo', 'images/contents/1686365405-imagepng.png', 'Holomia connects people in the virtual space. You will easily organize workshops, classes or product exhibitions in a virtual environment that is no longer limited in space and time.', NULL, '2023-06-09 02:57:28', '2023-06-09 19:50:05'),
(4, 'OutSource', 'outsource', 'images/contents/1686365396-thumbjpg.jpg', 'Saas', NULL, '2023-06-09 19:39:58', '2023-06-09 19:49:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_news`
--

CREATE TABLE `category_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_news`
--

INSERT INTO `category_news` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'tin tuc', 'tin-tuc', '2024-04-17 00:42:05', '2024-04-17 00:42:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `consulations`
--

CREATE TABLE `consulations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courses_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_priority` int(11) DEFAULT NULL,
  `contentable_id` int(11) NOT NULL,
  `contentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contents`
--

INSERT INTO `contents` (`id`, `title`, `sub_title`, `description`, `video`, `image`, `link`, `id_priority`, `contentable_id`, `contentable_type`, `created_at`, `updated_at`) VALUES
(2, 'title1713174291', 'sub_title1713174291', 'description1713174291', NULL, NULL, NULL, NULL, 1, 'App\\Models\\Section', '2024-04-15 02:44:51', '2024-04-15 02:44:51'),
(3, 'title1713770856', 'sub_title1713770856', 'description1713770856', NULL, NULL, NULL, NULL, 2, 'App\\Models\\Section', '2024-04-22 00:27:36', '2024-04-22 00:27:36'),
(4, 'title1713771065', 'sub_title1713771065', 'description1713771065', NULL, NULL, NULL, NULL, 2, 'App\\Models\\Section', '2024-04-22 00:31:05', '2024-04-22 00:31:05'),
(5, 'title1713771105', 'sub_title1713771105', 'description1713771105', NULL, NULL, NULL, NULL, 2, 'App\\Models\\Section', '2024-04-22 00:31:45', '2024-04-22 00:31:45'),
(6, 'title1713771181', 'sub_title1713771181', 'description1713771181', NULL, NULL, NULL, NULL, 2, 'App\\Models\\Section', '2024-04-22 00:33:01', '2024-04-22 00:33:01'),
(7, 'title1713772932', 'sub_title1713772932', 'description1713772932', NULL, NULL, NULL, NULL, 3, 'App\\Models\\Section', '2024-04-22 01:02:12', '2024-04-22 01:02:12'),
(8, 'title1713773089', 'sub_title1713773089', 'description1713773089', NULL, NULL, NULL, NULL, 3, 'App\\Models\\Section', '2024-04-22 01:04:49', '2024-04-22 01:04:49'),
(9, 'title1713773116', 'sub_title1713773116', 'description1713773116', NULL, NULL, NULL, NULL, 3, 'App\\Models\\Section', '2024-04-22 01:05:16', '2024-04-22 01:05:16'),
(10, 'title1713773146', 'sub_title1713773146', 'description1713773146', NULL, NULL, NULL, NULL, 3, 'App\\Models\\Section', '2024-04-22 01:05:46', '2024-04-22 01:05:46'),
(11, 'title1713773174', 'sub_title1713773174', 'description1713773174', NULL, NULL, NULL, NULL, 3, 'App\\Models\\Section', '2024-04-22 01:06:14', '2024-04-22 01:06:14'),
(12, 'title1713777366', 'sub_title1713777366', 'description1713777366', NULL, NULL, NULL, NULL, 4, 'App\\Models\\Section', '2024-04-22 02:16:06', '2024-04-22 02:16:06'),
(13, 'title1713852816', 'sub_title1713852816', 'description1713852816', NULL, NULL, NULL, NULL, 5, 'App\\Models\\Section', '2024-04-22 23:13:36', '2024-04-22 23:13:36'),
(14, 'title1713852880', 'sub_title1713852880', 'description1713852880', NULL, NULL, NULL, NULL, 5, 'App\\Models\\Section', '2024-04-22 23:14:40', '2024-04-22 23:14:40'),
(15, 'title1713852978', 'sub_title1713852978', 'description1713852978', NULL, NULL, NULL, NULL, 5, 'App\\Models\\Section', '2024-04-22 23:16:18', '2024-04-22 23:16:18'),
(16, 'title1713853020', 'sub_title1713853020', 'description1713853020', NULL, NULL, NULL, NULL, 5, 'App\\Models\\Section', '2024-04-22 23:17:00', '2024-04-22 23:17:00'),
(17, 'title1713857999', 'sub_title1713857999', 'description1713857999', NULL, NULL, NULL, NULL, 8, 'App\\Models\\Section', '2024-04-23 00:39:59', '2024-04-23 00:39:59'),
(18, 'title1713858009', 'sub_title1713858009', 'description1713858009', NULL, NULL, NULL, NULL, 8, 'App\\Models\\Section', '2024-04-23 00:40:09', '2024-04-23 00:40:09'),
(19, 'title1713858019', 'sub_title1713858019', 'description1713858019', NULL, NULL, NULL, NULL, 8, 'App\\Models\\Section', '2024-04-23 00:40:19', '2024-04-23 00:40:19'),
(20, 'title1713858033', 'sub_title1713858033', 'description1713858033', NULL, NULL, NULL, NULL, 8, 'App\\Models\\Section', '2024-04-23 00:40:33', '2024-04-23 00:40:33'),
(21, 'title1713858047', 'sub_title1713858047', 'description1713858047', NULL, NULL, NULL, NULL, 8, 'App\\Models\\Section', '2024-04-23 00:40:47', '2024-04-23 00:40:47'),
(22, 'title1713858060', 'sub_title1713858060', 'description1713858060', NULL, NULL, NULL, NULL, 8, 'App\\Models\\Section', '2024-04-23 00:41:00', '2024-04-23 00:41:00'),
(23, 'title1713858075', 'sub_title1713858075', 'description1713858075', NULL, NULL, NULL, NULL, 8, 'App\\Models\\Section', '2024-04-23 00:41:15', '2024-04-23 00:41:15'),
(24, 'title1713858088', 'sub_title1713858088', 'description1713858088', NULL, NULL, NULL, NULL, 8, 'App\\Models\\Section', '2024-04-23 00:41:28', '2024-04-23 00:41:28'),
(25, 'title1713858098', 'sub_title1713858098', 'description1713858098', NULL, NULL, NULL, NULL, 8, 'App\\Models\\Section', '2024-04-23 00:41:38', '2024-04-23 00:41:38'),
(26, 'title1713858550', 'sub_title1713858550', 'description1713858550', NULL, NULL, NULL, NULL, 9, 'App\\Models\\Section', '2024-04-23 00:49:10', '2024-04-23 00:49:10'),
(27, 'title1713858562', 'sub_title1713858562', 'description1713858562', NULL, NULL, NULL, NULL, 9, 'App\\Models\\Section', '2024-04-23 00:49:22', '2024-04-23 00:49:22'),
(28, 'title1713858574', 'sub_title1713858574', 'description1713858574', NULL, NULL, NULL, NULL, 9, 'App\\Models\\Section', '2024-04-23 00:49:34', '2024-04-23 00:49:34'),
(29, 'title1713860719', 'sub_title1713860719', 'description1713860719', NULL, NULL, NULL, NULL, 10, 'App\\Models\\Section', '2024-04-23 01:25:19', '2024-04-23 01:25:19'),
(30, 'title1713863205', 'sub_title1713863205', 'description1713863205', NULL, NULL, NULL, NULL, 11, 'App\\Models\\Section', '2024-04-23 02:06:45', '2024-04-23 02:06:45'),
(31, 'title1713863233', 'sub_title1713863233', 'description1713863233', NULL, NULL, NULL, NULL, 11, 'App\\Models\\Section', '2024-04-23 02:07:13', '2024-04-23 02:07:13'),
(32, 'title1713863254', 'sub_title1713863254', 'description1713863254', NULL, NULL, NULL, NULL, 11, 'App\\Models\\Section', '2024-04-23 02:07:34', '2024-04-23 02:07:34'),
(33, 'title1713866803', 'sub_title1713866803', 'description1713866803', NULL, NULL, NULL, NULL, 11, 'App\\Models\\Section', '2024-04-23 03:06:43', '2024-04-23 03:06:43'),
(34, 'title1713867494', 'sub_title1713867494', 'description1713867494', NULL, NULL, NULL, NULL, 12, 'App\\Models\\Section', '2024-04-23 03:18:14', '2024-04-23 03:18:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `number_student` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roadmap` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_schedule` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `title`, `sub_title`, `time`, `number_student`, `price`, `info`, `roadmap`, `open_schedule`, `image`, `created_at`, `updated_at`) VALUES
(6, 'title1713842684', 'sub_title1713842684', 8, 30, 10000000, 'info1713842684', 'roadmap1713842684', 'open_schedule1713842684', 'images/course/17138426841_a910c231116f56eb5b555432c6affad5png.png', '2024-04-22 20:24:44', '2024-04-22 20:24:44'),
(7, 'title1713845018', 'sub_title1713845018', 3, 3, 20000, 'info1713845018', 'roadmap1713845018', 'open_schedule1713845018', 'images/course/17138450181_2a4bfc791cf18bc235673b1665a13adcjpg.jpg', '2024-04-22 21:03:38', '2024-04-22 21:03:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `holo360_project`
--

CREATE TABLE `holo360_project` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_priority` int(11) DEFAULT NULL,
  `category_holo360_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `holo360_project`
--

INSERT INTO `holo360_project` (`id`, `title`, `slug`, `link`, `image`, `id_priority`, `category_holo360_id`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Tour VR Tràng An - Bái Đính', 'tour-vr-trang-an-bai-dinh', 'https://360.holomia.com/tour/29L4EHYO3VIIvad1M', 'images/projects/16863047701_thumbjpg.jpg', NULL, 1, '2023-06-09 02:59:30', '2023-06-09 02:59:30', NULL),
(2, 'Tour VR Tam Chúc', 'tour-vr-tam-chuc', 'https://360.holomia.com/tour/11oJsUdLCaSBCczwF', 'images/projects/16863048541_thumb-1jpg.jpg', NULL, 1, '2023-06-09 03:00:54', '2023-06-09 03:00:54', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `element` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_priority` int(11) DEFAULT NULL,
  `content_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`, `image`, `element`, `embed`, `id_priority`, `content_id`, `created_at`, `updated_at`) VALUES
(2, '5ab177b6bdec13b24afd.jpg', 'images/contents/17131742911_5ab177b6bdec13b24afdjpg.jpg', NULL, NULL, NULL, 2, '2024-04-15 02:44:51', '2024-04-15 02:44:51'),
(3, 'banner.jpg', 'images/contents/1713772111-sectionjpg.jpg', NULL, NULL, NULL, 3, '2024-04-22 00:27:36', '2024-04-22 00:48:31'),
(4, '2.jpg', 'images/contents/17137710651_2jpg.jpg', NULL, NULL, NULL, 4, '2024-04-22 00:31:05', '2024-04-22 00:31:05'),
(5, '1.jpg', 'images/contents/17137711051_1jpg.jpg', NULL, NULL, NULL, 5, '2024-04-22 00:31:45', '2024-04-22 00:31:45'),
(6, '2.jpg', 'images/contents/17137711821_2jpg.jpg', NULL, NULL, NULL, 6, '2024-04-22 00:33:02', '2024-04-22 00:33:02'),
(7, '1711617098-sondoong-thumbjpgjpg.jpg', 'images/contents/1713775772-2a4bfc791cf18bc235673b1665a13adcjpg.jpg', NULL, NULL, NULL, 7, '2024-04-22 01:02:12', '2024-04-22 01:49:32'),
(8, 'light-bulb.png', 'images/contents/17137730891_light-bulbpng.png', NULL, NULL, NULL, 8, '2024-04-22 01:04:49', '2024-04-22 01:04:49'),
(9, 'mission.png', 'images/contents/17137731161_missionpng.png', NULL, NULL, NULL, 9, '2024-04-22 01:05:16', '2024-04-22 01:05:16'),
(10, 'diamond.png', 'images/contents/17137731461_diamondpng.png', NULL, NULL, NULL, 10, '2024-04-22 01:05:46', '2024-04-22 01:05:46'),
(11, 'road.png', 'images/contents/17137731741_roadpng.png', NULL, NULL, NULL, 11, '2024-04-22 01:06:14', '2024-04-22 01:06:14'),
(12, 'a910c231116f56eb5b555432c6affad5.png', 'images/contents/17137773661_a910c231116f56eb5b555432c6affad5png.png', NULL, NULL, NULL, 12, '2024-04-22 02:16:06', '2024-04-22 02:16:06'),
(13, 'camket.png', 'images/contents/17138528161_camketpng.png', NULL, NULL, NULL, 13, '2024-04-22 23:13:36', '2024-04-22 23:13:36'),
(14, 'doingu.png', 'images/contents/17138528801_doingupng.png', NULL, NULL, NULL, 14, '2024-04-22 23:14:40', '2024-04-22 23:14:40'),
(15, 'giaotrinh.png', 'images/contents/17138529781_giaotrinhpng.png', NULL, NULL, NULL, 15, '2024-04-22 23:16:18', '2024-04-22 23:16:18'),
(16, 'doingu.png', 'images/contents/17138530201_doingupng.png', NULL, NULL, NULL, 16, '2024-04-22 23:17:00', '2024-04-22 23:17:00'),
(17, 'Cambridge Education Group.png', 'images/contents/17138579991_cambridge-education-grouppng.png', NULL, NULL, NULL, 17, '2024-04-23 00:39:59', '2024-04-23 00:39:59'),
(18, 'Chichester College.png', 'images/contents/17138580091_chichester-collegepng.png', NULL, NULL, NULL, 18, '2024-04-23 00:40:09', '2024-04-23 00:40:09'),
(19, 'Coventry University.png', 'images/contents/17138580191_coventry-universitypng.png', NULL, NULL, NULL, 19, '2024-04-23 00:40:19', '2024-04-23 00:40:19'),
(20, 'London South Bank University.png', 'images/contents/17138580331_london-south-bank-universitypng.png', NULL, NULL, NULL, 20, '2024-04-23 00:40:33', '2024-04-23 00:40:33'),
(21, 'Queen Mary.png', 'images/contents/17138580471_queen-marypng.png', NULL, NULL, NULL, 21, '2024-04-23 00:40:47', '2024-04-23 00:40:47'),
(22, 'The University of Melbourne.png', 'images/contents/17138580601_the-university-of-melbournepng.png', NULL, NULL, NULL, 22, '2024-04-23 00:41:00', '2024-04-23 00:41:00'),
(23, 'The university of sydney.png', 'images/contents/17138580751_the-university-of-sydneypng.png', NULL, NULL, NULL, 23, '2024-04-23 00:41:15', '2024-04-23 00:41:15'),
(24, 'University of Central Lancashire.png', 'images/contents/17138580881_university-of-central-lancashirepng.png', NULL, NULL, NULL, 24, '2024-04-23 00:41:28', '2024-04-23 00:41:28'),
(25, 'University of Toronto.png', 'images/contents/17138580981_university-of-torontopng.png', NULL, NULL, NULL, 25, '2024-04-23 00:41:38', '2024-04-23 00:41:38'),
(26, '60309e78553dcc86f72f8eda4d60a4cf.png', 'images/contents/17138585501_60309e78553dcc86f72f8eda4d60a4cfpng.png', NULL, NULL, NULL, 26, '2024-04-23 00:49:10', '2024-04-23 00:49:10'),
(27, 'cb87804cc78a145b6c7a43f5b58ddf78.png', 'images/contents/17138585621_cb87804cc78a145b6c7a43f5b58ddf78png.png', NULL, NULL, NULL, 27, '2024-04-23 00:49:22', '2024-04-23 00:49:22'),
(28, 'f8321d4ff59ec90989f7b0ebd1804c70.png', 'images/contents/17138585741_f8321d4ff59ec90989f7b0ebd1804c70png.png', NULL, NULL, NULL, 28, '2024-04-23 00:49:34', '2024-04-23 00:49:34'),
(29, '354047729_720264493442250_4792352852519296313_n.jpg', 'images/contents/1713862627-sectionjpg.jpg', NULL, NULL, NULL, 29, '2024-04-23 01:25:19', '2024-04-23 01:57:07'),
(30, '843601ffcd9f9d37863aebfad6401b67.png', 'images/contents/1713864254-806f6c5f11858f7507e960506abf1130png.png', NULL, NULL, NULL, 30, '2024-04-23 02:06:45', '2024-04-23 02:24:14'),
(31, '843601ffcd9f9d37863aebfad6401b67.png', 'images/contents/17138674941_843601ffcd9f9d37863aebfad6401b67png.png', NULL, NULL, NULL, 34, '2024-04-23 03:18:14', '2024-04-23 03:18:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(255) NOT NULL DEFAULT 0,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `items`
--

INSERT INTO `items` (`id`, `name`, `slug`, `link`, `thumb`, `view`, `project_id`, `created_at`, `updated_at`, `id_priority`) VALUES
(1, 'Fortuna - Suite Room', NULL, 'https://360.holomia.com/scan/kfOqm9HdqSuvoFt', 'Project/1/item/16885265051_m11jpg.JPG', 10, 1, '2023-07-04 20:08:25', '2023-09-05 01:42:31', 3),
(2, 'Fortuna-Victoria', NULL, 'https://360.holomia.com/scan/xVvUXDnGNA2i2ZI', 'Project/1/item/16885265161_m2jpg.JPG', 4, 1, '2023-07-04 20:08:36', '2023-09-05 01:42:31', 0),
(3, 'Fortuna - Spa de Palace', NULL, 'https://360.holomia.com/scan/SGIFqsYI9SH6rO5', 'Project/1/item/16885265321_m3jpg.JPG', 3, 1, '2023-07-04 20:08:52', '2023-09-05 01:42:31', 1),
(4, 'Fortuna- Premier Room', NULL, 'https://360.holomia.com/scan/hYYiBvN6zwvaNOn', 'Project/1/item/16885265461_m4jpg.JPG', 2, 1, '2023-07-04 20:09:06', '2023-09-05 01:42:31', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languageable_id` int(11) DEFAULT NULL,
  `languageable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `languages`
--

INSERT INTO `languages` (`id`, `key`, `en`, `vn`, `languageable_id`, `languageable_type`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Home', 'Trang chủ', 5, 'App\\Models\\Page', '2024-04-14 21:20:05', '2024-04-14 21:20:05'),
(2, 'description1713154805', ' ', ' ', 5, 'App\\Models\\Page', '2024-04-14 21:20:05', '2024-04-14 21:20:05'),
(3, 'title1713164905', 'RES ENGLISH', 'RES ENGLISH', 2, 'App\\Models\\Section', '2024-04-15 00:08:25', '2024-04-15 00:08:25'),
(4, 'description1713164905', '<p>Are you ready to conquer English with Cambridge IEC?<br />\nStart your path to success today by signing up for the class that&#39;s right for you!</p>', '<p>Bạn sẵn s&agrave;ng chinh phục Tiếng Anh c&ugrave;ng Cambridge IEC chưa?<br />\nH&atilde;y bắt đầu con đường dẫn đến th&agrave;nh c&ocirc;ng ngay h&ocirc;m nay bằng c&aacute;ch đăng k&yacute; lớp học ph&ugrave; hợp với m&igrave;nh n&agrave;o!</p>', 2, 'App\\Models\\Section', '2024-04-15 00:08:25', '2024-04-22 00:16:35'),
(5, 'sub_title1713164905', 'Cambridge IEC', 'Cambridge IEC', 2, 'App\\Models\\Section', '2024-04-15 00:08:25', '2024-04-22 00:16:35'),
(9, 'Trang chủ', 'TITLE 1', 'TITLE 2', 1, 'App\\Models\\Section', '2024-04-15 02:34:37', '2024-04-22 00:09:29'),
(10, 'trangchu', '<p>Are you ready to conquer English with Cambridge IEC?<br />\nStart your path to success today by signing up for the class that&#39;s right for you!</p>', '<p>Bạn sẵn s&agrave;ng chinh phục Tiếng Anh c&ugrave;ng Cambridge IEC chưa?<br />\nH&atilde;y bắt đầu con đường dẫn đến th&agrave;nh c&ocirc;ng ngay h&ocirc;m nay bằng c&aacute;ch đăng k&yacute; lớp học ph&ugrave; hợp với m&igrave;nh n&agrave;o!</p>', 1, 'App\\Models\\Section', '2024-04-15 02:34:37', '2024-04-22 00:15:29'),
(11, 'title1713174291', 'home', 'trang chủ', 2, 'App\\Models\\Content', '2024-04-15 02:44:51', '2024-04-15 02:44:51'),
(12, 'description1713174291', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>123&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 2, 'App\\Models\\Content', '2024-04-15 02:44:51', '2024-04-15 02:44:51'),
(13, 'sub_title1713174291', ' ', ' ', 2, 'App\\Models\\Content', '2024-04-15 02:44:51', '2024-04-15 02:44:51'),
(14, 'dangkytuvan', 'Sign up for consultation', 'Đăng ký tư vấn', NULL, NULL, '2024-04-15 02:57:36', '2024-04-15 02:57:36'),
(15, 'kiemtratrinhdo', 'Level test', 'Kiểm tra trình độ', NULL, NULL, '2024-04-15 02:58:43', '2024-04-15 02:58:43'),
(16, 'create_Course', 'Create Course', 'Tạo mới khóa học', NULL, NULL, '2024-04-16 18:52:10', '2024-04-16 18:52:10'),
(17, 'update_Course', 'Update Course', 'Chỉnh sửa khóa học', NULL, NULL, '2024-04-16 18:52:35', '2024-04-16 18:52:35'),
(18, 'sub_title', 'Subtitle', 'Phụ đề', NULL, NULL, '2024-04-16 18:54:57', '2024-04-16 18:54:57'),
(19, 'title1713325973', 'khóa en 1', 'khóa 1', 4, 'App\\Models\\Course', '2024-04-16 20:52:53', '2024-04-16 20:52:53'),
(20, 'sub_title1713325973', 'sub en 1', 'sub 1', 4, 'App\\Models\\Course', '2024-04-16 20:52:53', '2024-04-16 20:52:53'),
(21, 'title1713324041', ' ', ' ', 1, 'App\\Models\\Course', '2024-04-16 21:23:59', '2024-04-22 19:54:06'),
(22, 'sub_title1713324041', ' ', ' ', 1, 'App\\Models\\Course', '2024-04-16 21:23:59', '2024-04-16 21:23:59'),
(23, NULL, ' ', ' ', 1, 'App\\Models\\Course', '2024-04-17 00:30:19', '2024-04-22 20:21:56'),
(24, 'title1713339475', 'khoa 2', 'khóa 2', 5, 'App\\Models\\Course', '2024-04-17 00:37:55', '2024-04-17 00:37:55'),
(25, 'sub_title1713339475', 'sub 2', 'tieu de 2', 5, 'App\\Models\\Course', '2024-04-17 00:37:55', '2024-04-17 00:37:55'),
(26, 'info1713339475', '<p>1</p>', '<p>1</p>', 5, 'App\\Models\\Course', '2024-04-17 00:37:55', '2024-04-17 00:37:55'),
(27, 'roadmap1713339475', '<table cellspacing=\"0\" style=\"border-collapse:collapse\">\n	<tbody>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; width:208px\">\n			<p><strong>Khối</strong></p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; width:208px\">\n			<p><strong>Cấp độ</strong></p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; width:208px\">\n			<p><strong>Thời gian</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan=\"4\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; width:208px\">\n			<p>Trung học</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>A2 n&acirc;ng cao</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>9 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>B1 cơ bản</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>9 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>B1 n&acirc;ng cao</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>10 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>B1+</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>10 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan=\"4\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; width:208px\">\n			<p>IELTS</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>Foundation</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>6 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>4.5 &ndash; 5.5</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>10 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>5.5 &ndash; 6.5</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>10 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>6.5 &ndash; 7.5</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>10 th&aacute;ng</p>\n			</td>\n		</tr>\n	</tbody>\n</table>', '<table cellspacing=\"0\" style=\"border-collapse:collapse\">\n	<tbody>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; width:208px\">\n			<p><strong>Khối</strong></p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; width:208px\">\n			<p><strong>Cấp độ</strong></p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; width:208px\">\n			<p><strong>Thời gian</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan=\"4\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; width:208px\">\n			<p>Trung học</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>A2 n&acirc;ng cao</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>9 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>B1 cơ bản</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>9 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>B1 n&acirc;ng cao</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>10 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>B1+</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>10 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan=\"4\" style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; width:208px\">\n			<p>IELTS</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>Foundation</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>6 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>4.5 &ndash; 5.5</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>10 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>5.5 &ndash; 6.5</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>10 th&aacute;ng</p>\n			</td>\n		</tr>\n		<tr>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>6.5 &ndash; 7.5</p>\n			</td>\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; width:208px\">\n			<p>10 th&aacute;ng</p>\n			</td>\n		</tr>\n	</tbody>\n</table>', 5, 'App\\Models\\Course', '2024-04-17 00:37:55', '2024-04-17 00:37:55'),
(28, 'open_schedule1713339475', '<p>344</p>', '<p>3333</p>', 5, 'App\\Models\\Course', '2024-04-17 00:37:55', '2024-04-17 00:37:55'),
(29, 'title1713339752', 'nga1', 'nga11', 1, 'App\\Models\\News', '2024-04-17 00:42:32', '2024-04-17 00:42:32'),
(30, 'content1713339752', '<p>123</p>', '<p>456</p>', 1, 'App\\Models\\News', '2024-04-17 00:42:32', '2024-04-17 00:42:33'),
(31, 'slug1713339752', 'nga1', 'nga11', 1, 'App\\Models\\News', '2024-04-17 00:42:33', '2024-04-17 00:42:33'),
(32, 'description1713345993', 'Kĩ sư', 'Kĩ sư', 1, 'App\\Models\\Persons', '2024-04-17 02:26:33', '2024-04-23 00:01:26'),
(33, 'tutingiaotiep', 'Confident communication', 'Tự tin giao tiếp', NULL, NULL, '2024-04-18 19:53:28', '2024-04-18 19:53:28'),
(34, 'namvungkienthuc', 'Master knowledge', 'Nắm vững kiến thức', NULL, NULL, '2024-04-18 19:55:29', '2024-04-18 19:55:29'),
(35, 'morongtrithuc', 'Expand knowledge', 'Mở rộng tri thức', NULL, NULL, '2024-04-18 19:56:08', '2024-04-18 19:56:08'),
(36, 'camket', 'Commit', 'Cam kết', NULL, NULL, '2024-04-18 20:28:27', '2024-04-18 20:28:27'),
(37, 'ketquadaura', 'Build many practical benefits', 'Xây dựng nhiều lợi ích thiết thực', NULL, NULL, '2024-04-18 20:28:58', '2024-04-23 00:02:48'),
(38, 'giaotrinh', 'Curriculum', 'Giáo trình', NULL, NULL, '2024-04-18 20:29:24', '2024-04-18 20:29:24'),
(39, 'chuanquocte', 'International standard', 'Chuẩn quốc tế', NULL, NULL, '2024-04-18 20:29:46', '2024-04-18 20:29:46'),
(40, 'doingu', 'Team', 'Đội ngũ', NULL, NULL, '2024-04-18 20:30:12', '2024-04-18 20:30:12'),
(41, 'chuyenmon', 'Teachers are highly specialized', 'Giáo viên có chuyên môn cao', NULL, NULL, '2024-04-18 20:30:42', '2024-04-18 20:30:42'),
(42, 'more', 'More', 'Tìm hiểu thêm', NULL, NULL, '2024-04-18 23:18:06', '2024-04-18 23:18:06'),
(43, 'tamnhin', 'Vision', 'Tầm nhìn', NULL, NULL, '2024-04-18 23:43:30', '2024-04-18 23:43:30'),
(44, 'text_tamnhin', 'Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.', 'Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.', NULL, NULL, '2024-04-18 23:43:47', '2024-04-18 23:43:47'),
(45, 'sumenh', 'Mission', 'Sứ mệnh', NULL, NULL, '2024-04-18 23:44:23', '2024-04-18 23:44:23'),
(46, 'giatri', 'Core values', 'Giá trị cốt lõi', NULL, NULL, '2024-04-18 23:44:48', '2024-04-18 23:44:48'),
(47, 'road', 'The journey has passed', 'Chặng đường đã đi qua', NULL, NULL, '2024-04-18 23:45:15', '2024-04-18 23:45:15'),
(48, 'title1713770856', 'Learn English together', 'Học Tiếng Anh cùng', 3, 'App\\Models\\Content', '2024-04-22 00:27:36', '2024-04-22 00:43:11'),
(49, 'description1713770856', '<p>Are you ready to conquer English with Cambridge IEC?<br />\nStart your path to success today by signing up for the class that&#39;s right for you!</p>', '<p>Bạn sẵn s&agrave;ng chinh phục Tiếng Anh c&ugrave;ng Cambridge IEC chưa?<br />\nH&atilde;y bắt đầu con đường dẫn đến th&agrave;nh c&ocirc;ng ngay h&ocirc;m nay bằng c&aacute;ch đăng k&yacute; lớp học ph&ugrave; hợp với m&igrave;nh n&agrave;o!</p>', 3, 'App\\Models\\Content', '2024-04-22 00:27:36', '2024-04-22 00:43:11'),
(50, 'sub_title1713770856', 'Cambridge IEC', 'Cambridge IEC', 3, 'App\\Models\\Content', '2024-04-22 00:27:36', '2024-04-22 00:43:11'),
(51, 'title1713771065', 'tab1', 'tab1', 4, 'App\\Models\\Content', '2024-04-22 00:31:05', '2024-04-22 00:31:05'),
(52, 'description1713771065', '<p>Students studying</p>', '<p>Học vi&ecirc;n theo học</p>', 4, 'App\\Models\\Content', '2024-04-22 00:31:05', '2024-04-22 00:31:05'),
(53, 'sub_title1713771065', '25K +', '25K +', 4, 'App\\Models\\Content', '2024-04-22 00:31:05', '2024-04-22 00:31:05'),
(54, 'title1713771105', 'tab2', 'tab2', 5, 'App\\Models\\Content', '2024-04-22 00:31:45', '2024-04-22 00:31:45'),
(55, 'description1713771105', '<p>Teachers are highly specialized</p>', '<p>Teachers are highly specialized</p>', 5, 'App\\Models\\Content', '2024-04-22 00:31:45', '2024-04-22 00:32:16'),
(56, 'sub_title1713771105', '600+', '600+', 5, 'App\\Models\\Content', '2024-04-22 00:31:45', '2024-04-22 00:32:16'),
(57, 'title1713771181', 'tab3', 'tab3', 6, 'App\\Models\\Content', '2024-04-22 00:33:02', '2024-04-22 00:33:02'),
(58, 'description1713771181', '<p>Students achieve high IELTS scores</p>', '<p>Học vi&ecirc;n đạt điểm IELTS cao</p>', 6, 'App\\Models\\Content', '2024-04-22 00:33:02', '2024-04-22 00:33:02'),
(59, 'sub_title1713771181', '18K+', '18K+', 6, 'App\\Models\\Content', '2024-04-22 00:33:02', '2024-04-22 00:33:02'),
(60, 'title1713772803', 'About Us', 'Về chúng tôi', 3, 'App\\Models\\Section', '2024-04-22 01:00:03', '2024-04-22 01:00:03'),
(61, 'description1713772803', ' ', ' ', 3, 'App\\Models\\Section', '2024-04-22 01:00:03', '2024-04-22 01:01:55'),
(62, 'sub_title1713772803', ' ', ' ', 3, 'App\\Models\\Section', '2024-04-22 01:00:03', '2024-04-22 01:01:55'),
(63, 'title1713772932', 'About Us', 'Về chúng tôi', 7, 'App\\Models\\Content', '2024-04-22 01:02:12', '2024-04-22 01:02:12'),
(64, 'description1713772932', '<p>Established in 2009, English training center for Preschool - Primary - Secondary - IELTS levels. Cambridge IEC is proud to be an official partner of IDP and the British Council since 2010. Over the years, Cambridge IEC has become a reliable address to help you register for the IELTS test nationwide, especially in the region. Hanoi.</p>', '<p>Th&agrave;nh lập từ năm 2009, Trung t&acirc;m đ&agrave;o tạo Tiếng Anh c&aacute;c cấp độ Mầm non - Tiểu học - Trung học - IELTS. Cambridge IEC tự h&agrave;o khi l&agrave; đối t&aacute;c ch&iacute;nh thức của IDP v&agrave; Hội Đồng Anh từ 2010. Trong những năm qua, Cambridge IEC đ&atilde; trở th&agrave;nh địa chỉ đ&aacute;ng tin cậy gi&uacute;p c&aacute;c bạn đăng k&yacute; thi IELTS tr&ecirc;n to&agrave;n quốc, đặc biệt l&agrave; khu vực H&agrave; Nội.</p>', 7, 'App\\Models\\Content', '2024-04-22 01:02:12', '2024-04-22 01:02:12'),
(65, 'sub_title1713772932', 'CAMBRIDGE IEC ENGLISH CENTRE', 'CAMBRIDGE IEC ENGLISH CENTRE', 7, 'App\\Models\\Content', '2024-04-22 01:02:12', '2024-04-22 01:02:12'),
(66, 'title1713773089', 'See', 'Tầm nhìn', 8, 'App\\Models\\Content', '2024-04-22 01:04:49', '2024-04-22 01:04:49'),
(67, 'description1713773089', ' ', ' ', 8, 'App\\Models\\Content', '2024-04-22 01:04:49', '2024-04-22 01:04:49'),
(68, 'sub_title1713773089', 'Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.', 'Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.', 8, 'App\\Models\\Content', '2024-04-22 01:04:49', '2024-04-22 01:04:49'),
(69, 'title1713773116', 'Mission', 'sứ mệnh', 9, 'App\\Models\\Content', '2024-04-22 01:05:16', '2024-04-22 01:05:16'),
(70, 'description1713773116', ' ', ' ', 9, 'App\\Models\\Content', '2024-04-22 01:05:16', '2024-04-22 01:05:16'),
(71, 'sub_title1713773116', 'Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.', 'Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.', 9, 'App\\Models\\Content', '2024-04-22 01:05:16', '2024-04-22 01:05:16'),
(72, 'title1713773146', 'Core Value', 'Giá trị cốt lõi', 10, 'App\\Models\\Content', '2024-04-22 01:05:46', '2024-04-22 01:05:46'),
(73, 'description1713773146', ' ', ' ', 10, 'App\\Models\\Content', '2024-04-22 01:05:46', '2024-04-22 01:05:46'),
(74, 'sub_title1713773146', 'Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.', 'Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.', 10, 'App\\Models\\Content', '2024-04-22 01:05:46', '2024-04-22 01:05:47'),
(75, 'title1713773174', 'The journey has gone', 'Chặng đường đã đi', 11, 'App\\Models\\Content', '2024-04-22 01:06:14', '2024-04-22 01:06:14'),
(76, 'description1713773174', ' ', ' ', 11, 'App\\Models\\Content', '2024-04-22 01:06:14', '2024-04-22 01:06:14'),
(77, 'sub_title1713773174', 'Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.', 'Egestas elit dui scelerisque ut eu purus aliquam vitae habitasse.', 11, 'App\\Models\\Content', '2024-04-22 01:06:14', '2024-04-22 01:06:14'),
(78, 'title1713777212', 'Discover', 'Khám phá', 4, 'App\\Models\\Section', '2024-04-22 02:13:32', '2024-04-22 02:15:02'),
(79, 'description1713777212', '<p>C&aacute;c kho&aacute; học thực chiến, lộ tr&igrave;nh b&agrave;i bản cung cấp kiến thức v&agrave; kỹ năng đ&aacute;p ứng nhu cầu của thị trường</p>', '<p>C&aacute;c kho&aacute; học thực chiến, lộ tr&igrave;nh b&agrave;i bản cung cấp kiến thức v&agrave; kỹ năng đ&aacute;p ứng nhu cầu của thị trường</p>', 4, 'App\\Models\\Section', '2024-04-22 02:13:32', '2024-04-22 02:15:02'),
(80, 'sub_title1713777212', 'Course', 'Khóa học', 4, 'App\\Models\\Section', '2024-04-22 02:13:32', '2024-04-22 02:15:02'),
(81, 'title1713777366', 'Trung học', 'Trung học', 12, 'App\\Models\\Content', '2024-04-22 02:16:06', '2024-04-22 02:16:06'),
(82, 'description1713777366', '<p>Tham gia kh&oacute;a học tiếng anh A2 n&acirc;ng cao của Cambridge IEC, học vi&ecirc;n sẽ được...</p>', '<p>Tham gia kh&oacute;a học tiếng anh A2 n&acirc;ng cao của Cambridge IEC, học vi&ecirc;n sẽ được...</p>', 12, 'App\\Models\\Content', '2024-04-22 02:16:06', '2024-04-22 02:16:06'),
(83, 'sub_title1713777366', 'Course A2', 'Khóa học A2 nâng cao', 12, 'App\\Models\\Content', '2024-04-22 02:16:06', '2024-04-22 02:16:06'),
(84, 'xemthemkhoahoc', 'More course', 'Xem thêm khóa học', NULL, NULL, '2024-04-22 03:36:19', '2024-04-22 03:36:19'),
(85, 'title1713324145', 'Luyện Thi IELTS', 'Luyện Thi IELTS', 2, 'App\\Models\\Course', '2024-04-22 19:10:04', '2024-04-22 20:20:01'),
(86, 'sub_title1713324145', 'Tương tác cao giữa học viên và giáo viên giúp học viên đảm bảo chắc chắn hiểu bài giảng mà còn giúp tăng tốc sự tiến bộ của từng học viên.', 'Tương tác cao giữa học viên và giáo viên giúp học viên đảm bảo chắc chắn hiểu bài giảng mà còn giúp tăng tốc sự tiến bộ của từng học viên.', 2, 'App\\Models\\Course', '2024-04-22 19:10:04', '2024-04-22 20:20:01'),
(87, 'title1713324171', ' ', ' ', 3, 'App\\Models\\Course', '2024-04-22 19:10:52', '2024-04-22 19:10:52'),
(88, 'sub_title1713324171', ' ', ' ', 3, 'App\\Models\\Course', '2024-04-22 19:10:52', '2024-04-22 19:10:52'),
(89, 'title1713842684', 'Tiếng anh THCS', 'Tiếng anh THCS', 6, 'App\\Models\\Course', '2024-04-22 20:24:44', '2024-04-22 20:24:45'),
(90, 'sub_title1713842684', 'Luyện thi IELTS', 'Luyện thi IELTS', 6, 'App\\Models\\Course', '2024-04-22 20:24:45', '2024-04-22 20:24:45'),
(91, 'info1713842684', '<p>Chương tr&igrave;nh gồm 4 cấp độ, tương ứng với c&aacute;c tr&igrave;nh độ IELTS Foundation, 4.0 &ndash; 5.0 IELTS, 5.0 &ndash; 6.0 IELTS, 6.0 &ndash; 7.0+ IELTS</p>\r\n\r\n<p><strong>Kỹ năng Đọc</strong><strong>:</strong></p>\r\n\r\n<p>- Nhận biết v&agrave; l&agrave;m quen với c&aacute;c dạng b&agrave;i đọc.</p>\r\n\r\n<p>- Nhận biết v&agrave; l&agrave;m quen với 13 dạng c&acirc;u hỏi.</p>\r\n\r\n<p>- Học, luyện tập c&aacute;ch l&agrave;m b&agrave;i cụ thể với từng dạng c&acirc;u hỏi.</p>\r\n\r\n<p>- Luyện tập th&agrave;nh thạo tất cả c&aacute;c dạng b&agrave;i trong thời gian đ&uacute;ng quy định.</p>\r\n\r\n<p><strong>Kỹ năng Nghe</strong><strong>:</strong></p>\r\n\r\n<p>- Nhận biết v&agrave; l&agrave;m quen với 4 phần của b&agrave;i nghe.</p>\r\n\r\n<p>- Nhận biết v&agrave; l&agrave;m quen với 6 dạng c&acirc;u hỏi.</p>\r\n\r\n<p>- Học, luyện tập c&aacute;ch l&agrave;m b&agrave;i cụ thể với từng dạng c&acirc;u hỏi.</p>\r\n\r\n<p>- Luyện tập th&agrave;nh thạo tất cả c&aacute;c dạng b&agrave;i trong thời gian đ&uacute;ng quy định.</p>\r\n\r\n<p><strong>Kỹ năng Viết</strong><strong>:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Học bố cục 2 dạng đề (Biểu đồ + Văn nghị luận)</p>\r\n\r\n<p>- Sử dụng từ vựng, mẫu c&acirc;u để tập viết c&aacute;c phần trong mỗi dạng đề.</p>\r\n\r\n<p>- Sử dụng từ vựng, mẫu c&acirc;u để gh&eacute;p c&aacute;c phần th&agrave;nh b&agrave;i văn ho&agrave;n chỉnh</p>\r\n\r\n<p>- Luyện tập viết trong đ&uacute;ng thời gian quy định.</p>\r\n\r\n<p><strong>Kỹ năng N&oacute;i:</strong></p>\r\n\r\n<p>- L&agrave;m quen với dạng c&acirc;u hỏi trong 3 phần của b&agrave;i thi.</p>\r\n\r\n<p>- Luyện tập n&oacute;i trong đ&uacute;ng thời gian quy định.</p>', '<p>Chương tr&igrave;nh gồm 4 cấp độ, tương ứng với c&aacute;c tr&igrave;nh độ IELTS Foundation, 4.0 &ndash; 5.0 IELTS, 5.0 &ndash; 6.0 IELTS, 6.0 &ndash; 7.0+ IELTS</p>\r\n\r\n<p><strong>Kỹ năng Đọc</strong><strong>:</strong></p>\r\n\r\n<p>- Nhận biết v&agrave; l&agrave;m quen với c&aacute;c dạng b&agrave;i đọc.</p>\r\n\r\n<p>- Nhận biết v&agrave; l&agrave;m quen với 13 dạng c&acirc;u hỏi.</p>\r\n\r\n<p>- Học, luyện tập c&aacute;ch l&agrave;m b&agrave;i cụ thể với từng dạng c&acirc;u hỏi.</p>\r\n\r\n<p>- Luyện tập th&agrave;nh thạo tất cả c&aacute;c dạng b&agrave;i trong thời gian đ&uacute;ng quy định.</p>\r\n\r\n<p><strong>Kỹ năng Nghe</strong><strong>:</strong></p>\r\n\r\n<p>- Nhận biết v&agrave; l&agrave;m quen với 4 phần của b&agrave;i nghe.</p>\r\n\r\n<p>- Nhận biết v&agrave; l&agrave;m quen với 6 dạng c&acirc;u hỏi.</p>\r\n\r\n<p>- Học, luyện tập c&aacute;ch l&agrave;m b&agrave;i cụ thể với từng dạng c&acirc;u hỏi.</p>\r\n\r\n<p>- Luyện tập th&agrave;nh thạo tất cả c&aacute;c dạng b&agrave;i trong thời gian đ&uacute;ng quy định.</p>\r\n\r\n<p><strong>Kỹ năng Viết</strong><strong>:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Học bố cục 2 dạng đề (Biểu đồ + Văn nghị luận)</p>\r\n\r\n<p>- Sử dụng từ vựng, mẫu c&acirc;u để tập viết c&aacute;c phần trong mỗi dạng đề.</p>\r\n\r\n<p>- Sử dụng từ vựng, mẫu c&acirc;u để gh&eacute;p c&aacute;c phần th&agrave;nh b&agrave;i văn ho&agrave;n chỉnh</p>\r\n\r\n<p>- Luyện tập viết trong đ&uacute;ng thời gian quy định.</p>\r\n\r\n<p><strong>Kỹ năng N&oacute;i:</strong></p>\r\n\r\n<p>- L&agrave;m quen với dạng c&acirc;u hỏi trong 3 phần của b&agrave;i thi.</p>\r\n\r\n<p>- Luyện tập n&oacute;i trong đ&uacute;ng thời gian quy định.</p>', 6, 'App\\Models\\Course', '2024-04-22 20:24:45', '2024-04-22 20:24:45'),
(92, 'roadmap1713842684', ' ', ' ', 6, 'App\\Models\\Course', '2024-04-22 20:24:45', '2024-04-22 20:24:45'),
(93, 'open_schedule1713842684', ' ', ' ', 6, 'App\\Models\\Course', '2024-04-22 20:24:45', '2024-04-22 20:24:45'),
(94, 'title1713845018', 'TIẾNG ANH MẦM NON', 'TIẾNG ANH MẦM NON', 7, 'App\\Models\\Course', '2024-04-22 21:03:38', '2024-04-22 21:03:39'),
(95, 'sub_title1713845018', 'lứa tuổi Mầm Non', 'lứa tuổi Mầm Non', 7, 'App\\Models\\Course', '2024-04-22 21:03:39', '2024-04-22 21:10:53'),
(96, 'info1713845018', ' ', ' ', 7, 'App\\Models\\Course', '2024-04-22 21:03:39', '2024-04-22 21:03:39'),
(97, 'roadmap1713845018', ' ', ' ', 7, 'App\\Models\\Course', '2024-04-22 21:03:39', '2024-04-22 21:03:39'),
(98, 'open_schedule1713845018', ' ', ' ', 7, 'App\\Models\\Course', '2024-04-22 21:03:39', '2024-04-22 21:03:39'),
(99, 'title1713852685', 'Reason', 'Lý do', 5, 'App\\Models\\Section', '2024-04-22 23:11:25', '2024-04-22 23:11:25'),
(100, 'description1713852685', ' ', ' ', 5, 'App\\Models\\Section', '2024-04-22 23:11:25', '2024-04-22 23:11:25'),
(101, 'sub_title1713852685', 'HỌC VIÊN CHỌN CAMBRIDGE IEC', 'HỌC VIÊN CHỌN CAMBRIDGE IEC', 5, 'App\\Models\\Section', '2024-04-22 23:11:25', '2024-04-22 23:11:25'),
(102, 'title1713852816', 'Commit', 'Cam kết', 13, 'App\\Models\\Content', '2024-04-22 23:13:36', '2024-04-22 23:13:36'),
(103, 'description1713852816', ' ', ' ', 13, 'App\\Models\\Content', '2024-04-22 23:13:36', '2024-04-22 23:13:36'),
(104, 'sub_title1713852816', 'Malesuada facilisi libero, nam eu. Quis pellentesque tortor a elementum ut blandit sed pellentesque arcu. Malesuada in faucibus risus velit diam. Non, massa ut a arcu, fermentum.', 'Malesuada facilisi libero, nam eu. Quis pellentesque tortor a elementum ut blandit sed pellentesque arcu. Malesuada in faucibus risus velit diam. Non, massa ut a arcu, fermentum.', 13, 'App\\Models\\Content', '2024-04-22 23:13:36', '2024-04-22 23:13:36'),
(105, 'title1713852880', 'Teachers', 'Đội ngũ giáo viên', 14, 'App\\Models\\Content', '2024-04-22 23:14:40', '2024-04-22 23:14:40'),
(106, 'description1713852880', ' ', ' ', 14, 'App\\Models\\Content', '2024-04-22 23:14:40', '2024-04-22 23:14:40'),
(107, 'sub_title1713852880', 'Malesuada facilisi libero, nam eu. Quis pellentesque tortor a elementum ut blandit sed pellentesque arcu. Malesuada in faucibus risus velit diam. Non, massa ut a arcu, fermentum.', 'Malesuada facilisi libero, nam eu. Quis pellentesque tortor a elementum ut blandit sed pellentesque arcu. Malesuada in faucibus risus velit diam. Non, massa ut a arcu, fermentum.', 14, 'App\\Models\\Content', '2024-04-22 23:14:40', '2024-04-22 23:14:40'),
(108, 'title1713852978', 'curriculum', 'Giáo trình', 15, 'App\\Models\\Content', '2024-04-22 23:16:18', '2024-04-22 23:16:18'),
(109, 'description1713852978', '<p>Malesuada facilisi libero, nam eu. Quis pellentesque tortor a elementum ut blandit sed pellentesque arcu. Malesuada in faucibus risus velit diam. Non, massa ut a arcu, fermentum.</p>', '<p>Malesuada facilisi libero, nam eu. Quis pellentesque tortor a elementum ut blandit sed pellentesque arcu. Malesuada in faucibus risus velit diam. Non, massa ut a arcu, fermentum.</p>', 15, 'App\\Models\\Content', '2024-04-22 23:16:18', '2024-04-22 23:16:18'),
(110, 'sub_title1713852978', ' ', ' ', 15, 'App\\Models\\Content', '2024-04-22 23:16:18', '2024-04-22 23:16:18'),
(111, 'title1713853020', 'test', 'test', 16, 'App\\Models\\Content', '2024-04-22 23:17:00', '2024-04-22 23:17:00'),
(112, 'description1713853020', ' ', ' ', 16, 'App\\Models\\Content', '2024-04-22 23:17:00', '2024-04-22 23:17:00'),
(113, 'sub_title1713853020', 'Malesuada facilisi libero, nam eu. Quis pellentesque tortor a elementum ut blandit sed pellentesque arcu. Malesuada in faucibus risus velit diam. Non, massa ut a arcu, fermentum.', 'Malesuada facilisi libero, nam eu. Quis pellentesque tortor a elementum ut blandit sed pellentesque arcu. Malesuada in faucibus risus velit diam. Non, massa ut a arcu, fermentum.', 16, 'App\\Models\\Content', '2024-04-22 23:17:00', '2024-04-22 23:17:00'),
(114, 'description1713853865', 'Thạc sĩ', 'Thạc sĩ', 2, 'App\\Models\\Persons', '2024-04-22 23:31:05', '2024-04-23 00:05:54'),
(115, 'description1713854313', 'Thạc sĩ', 'Thạc sĩ', 3, 'App\\Models\\Persons', '2024-04-22 23:38:33', '2024-04-23 00:06:07'),
(116, 'title1713854518', 'Team', 'Đội ngũ', 6, 'App\\Models\\Section', '2024-04-22 23:41:58', '2024-04-22 23:41:58'),
(117, 'description1713854518', ' ', ' ', 6, 'App\\Models\\Section', '2024-04-22 23:41:58', '2024-04-22 23:41:58'),
(118, 'sub_title1713854518', 'GIÁO VIÊN CAMBRIDGE IEC', 'GIÁO VIÊN CAMBRIDGE IEC', 6, 'App\\Models\\Section', '2024-04-22 23:41:58', '2024-04-22 23:41:58'),
(119, 'description1713856007', 'Thạc sĩ ANh Quốc', 'Thạc sĩ ANh Quốc', 4, 'App\\Models\\Persons', '2024-04-23 00:06:47', '2024-04-23 00:06:47'),
(120, 'description1713856083', 'Lớp 11 THPT Tân Lập', 'Lớp 11 THPT Tân Lập', 5, 'App\\Models\\Persons', '2024-04-23 00:08:03', '2024-04-23 00:08:03'),
(121, 'description1713856429', 'Kĩ sư', 'Kĩ sư', 6, 'App\\Models\\Persons', '2024-04-23 00:13:49', '2024-04-23 00:13:49'),
(122, 'description1713856888', 'THPT Bắc Ninh', 'THPT Bắc Ninh', 7, 'App\\Models\\Persons', '2024-04-23 00:21:28', '2024-04-23 00:21:28'),
(123, 'title1713857031', 'Student', 'Học viên', 7, 'App\\Models\\Section', '2024-04-23 00:23:51', '2024-04-23 00:23:51'),
(124, 'description1713857031', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate</p>', 7, 'App\\Models\\Section', '2024-04-23 00:23:51', '2024-04-23 00:23:51'),
(125, 'sub_title1713857031', 'HỌC VIÊN XUẤT SẮC', 'HỌC VIÊN XUẤT SẮC', 7, 'App\\Models\\Section', '2024-04-23 00:23:51', '2024-04-23 00:23:51'),
(126, 'description1713857428', 'Vượt cấp từ Stage 3 lên stage 5', 'Vượt cấp từ Stage 3 lên stage 5', 8, 'App\\Models\\Persons', '2024-04-23 00:30:28', '2024-04-23 00:30:28'),
(127, 'description1713857550', 'Hoàn thành xuất sắc kì thi tuyển sinh vào lớp 6 với nhiều thành tích đáng kể', 'Hoàn thành xuất sắc kì thi tuyển sinh vào lớp 6 với nhiều thành tích đáng kể', 9, 'App\\Models\\Persons', '2024-04-23 00:32:30', '2024-04-23 00:32:30'),
(128, 'description1713857622', 'Thí sinh Việt Nam thứ 2 đỗ London School of Economics & Political Science', 'Thí sinh Việt Nam thứ 2 đỗ London School of Economics & Political Science', 10, 'App\\Models\\Persons', '2024-04-23 00:33:42', '2024-04-23 00:33:42'),
(129, 'title1713857807', 'Partner', 'Đối tác', 8, 'App\\Models\\Section', '2024-04-23 00:36:47', '2024-04-23 00:36:47'),
(130, 'description1713857807', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 8, 'App\\Models\\Section', '2024-04-23 00:36:47', '2024-04-23 00:36:47'),
(131, 'sub_title1713857807', 'ĐỐI TÁC CỦA CAMBRIDGE', 'ĐỐI TÁC CỦA CAMBRIDGE', 8, 'App\\Models\\Section', '2024-04-23 00:36:47', '2024-04-23 00:36:47'),
(132, 'title1713857852', 'Activity', 'Hoạt động', 9, 'App\\Models\\Section', '2024-04-23 00:37:32', '2024-04-23 00:37:32'),
(133, 'description1713857852', '<p>Tại Cambridge IEC kh&ocirc;ng chỉ đầu tư v&agrave;o chất lượng của mỗi buổi học tại lớp m&agrave; c&aacute;c hoạt động ngoại kh&oacute;a cũng được ch&uacute;ng t&ocirc;i đặc biệt ch&uacute; trọng</p>', '<p>Tại Cambridge IEC kh&ocirc;ng chỉ đầu tư v&agrave;o chất lượng của mỗi buổi học tại lớp m&agrave; c&aacute;c hoạt động ngoại kh&oacute;a cũng được ch&uacute;ng t&ocirc;i đặc biệt ch&uacute; trọng</p>', 9, 'App\\Models\\Section', '2024-04-23 00:37:32', '2024-04-23 00:37:32'),
(134, 'sub_title1713857852', 'GIÁO DỤC TRẢI NGHIỆM', 'GIÁO DỤC TRẢI NGHIỆM', 9, 'App\\Models\\Section', '2024-04-23 00:37:32', '2024-04-23 00:37:32'),
(135, 'title1713857999', 'p1', 'p1', 17, 'App\\Models\\Content', '2024-04-23 00:39:59', '2024-04-23 00:39:59'),
(136, 'description1713857999', ' ', ' ', 17, 'App\\Models\\Content', '2024-04-23 00:39:59', '2024-04-23 00:39:59'),
(137, 'sub_title1713857999', ' ', ' ', 17, 'App\\Models\\Content', '2024-04-23 00:39:59', '2024-04-23 00:39:59'),
(138, 'title1713858009', 'p2', 'p2', 18, 'App\\Models\\Content', '2024-04-23 00:40:09', '2024-04-23 00:40:09'),
(139, 'description1713858009', ' ', ' ', 18, 'App\\Models\\Content', '2024-04-23 00:40:09', '2024-04-23 00:40:09'),
(140, 'sub_title1713858009', ' ', ' ', 18, 'App\\Models\\Content', '2024-04-23 00:40:09', '2024-04-23 00:40:09'),
(141, 'title1713858019', 'p3', 'p3', 19, 'App\\Models\\Content', '2024-04-23 00:40:19', '2024-04-23 00:40:19'),
(142, 'description1713858019', ' ', ' ', 19, 'App\\Models\\Content', '2024-04-23 00:40:19', '2024-04-23 00:40:19'),
(143, 'sub_title1713858019', ' ', ' ', 19, 'App\\Models\\Content', '2024-04-23 00:40:19', '2024-04-23 00:40:19'),
(144, 'title1713858033', 'p4', 'p4', 20, 'App\\Models\\Content', '2024-04-23 00:40:33', '2024-04-23 00:40:33'),
(145, 'description1713858033', ' ', ' ', 20, 'App\\Models\\Content', '2024-04-23 00:40:33', '2024-04-23 00:40:33'),
(146, 'sub_title1713858033', ' ', ' ', 20, 'App\\Models\\Content', '2024-04-23 00:40:33', '2024-04-23 00:40:33'),
(147, 'title1713858047', 'p5', 'p5', 21, 'App\\Models\\Content', '2024-04-23 00:40:47', '2024-04-23 00:40:47'),
(148, 'description1713858047', ' ', ' ', 21, 'App\\Models\\Content', '2024-04-23 00:40:47', '2024-04-23 00:40:47'),
(149, 'sub_title1713858047', ' ', ' ', 21, 'App\\Models\\Content', '2024-04-23 00:40:47', '2024-04-23 00:40:47'),
(150, 'title1713858060', 'p6', 'p6', 22, 'App\\Models\\Content', '2024-04-23 00:41:00', '2024-04-23 00:41:00'),
(151, 'description1713858060', ' ', ' ', 22, 'App\\Models\\Content', '2024-04-23 00:41:00', '2024-04-23 00:41:00'),
(152, 'sub_title1713858060', ' ', ' ', 22, 'App\\Models\\Content', '2024-04-23 00:41:00', '2024-04-23 00:41:00'),
(153, 'title1713858075', 'p7', 'p7', 23, 'App\\Models\\Content', '2024-04-23 00:41:15', '2024-04-23 00:41:15'),
(154, 'description1713858075', ' ', ' ', 23, 'App\\Models\\Content', '2024-04-23 00:41:15', '2024-04-23 00:41:15'),
(155, 'sub_title1713858075', ' ', ' ', 23, 'App\\Models\\Content', '2024-04-23 00:41:15', '2024-04-23 00:41:15'),
(156, 'title1713858088', 'p8', 'p8', 24, 'App\\Models\\Content', '2024-04-23 00:41:28', '2024-04-23 00:41:28'),
(157, 'description1713858088', ' ', ' ', 24, 'App\\Models\\Content', '2024-04-23 00:41:28', '2024-04-23 00:41:28'),
(158, 'sub_title1713858088', ' ', ' ', 24, 'App\\Models\\Content', '2024-04-23 00:41:28', '2024-04-23 00:41:28'),
(159, 'title1713858098', 'p9', 'p9', 25, 'App\\Models\\Content', '2024-04-23 00:41:38', '2024-04-23 00:41:38'),
(160, 'description1713858098', ' ', ' ', 25, 'App\\Models\\Content', '2024-04-23 00:41:38', '2024-04-23 00:41:38'),
(161, 'sub_title1713858098', ' ', ' ', 25, 'App\\Models\\Content', '2024-04-23 00:41:38', '2024-04-23 00:41:38'),
(162, 'title1713858550', 'camp1', 'camp1', 26, 'App\\Models\\Content', '2024-04-23 00:49:10', '2024-04-23 00:49:10'),
(163, 'description1713858550', ' ', ' ', 26, 'App\\Models\\Content', '2024-04-23 00:49:10', '2024-04-23 00:49:10'),
(164, 'sub_title1713858550', ' ', ' ', 26, 'App\\Models\\Content', '2024-04-23 00:49:10', '2024-04-23 00:49:10'),
(165, 'title1713858562', 'camp2', 'camp2', 27, 'App\\Models\\Content', '2024-04-23 00:49:22', '2024-04-23 00:49:22'),
(166, 'description1713858562', ' ', ' ', 27, 'App\\Models\\Content', '2024-04-23 00:49:22', '2024-04-23 00:49:22'),
(167, 'sub_title1713858562', ' ', ' ', 27, 'App\\Models\\Content', '2024-04-23 00:49:22', '2024-04-23 00:49:22'),
(168, 'title1713858574', 'camp3', 'camp3', 28, 'App\\Models\\Content', '2024-04-23 00:49:34', '2024-04-23 00:49:34'),
(169, 'description1713858574', ' ', ' ', 28, 'App\\Models\\Content', '2024-04-23 00:49:34', '2024-04-23 00:49:34'),
(170, 'sub_title1713858574', ' ', ' ', 28, 'App\\Models\\Content', '2024-04-23 00:49:34', '2024-04-23 00:49:34'),
(171, 'introduce', 'about Cabridge', 'về Cabridge', 6, 'App\\Models\\Page', '2024-04-23 01:19:09', '2024-04-23 01:19:09'),
(172, 'description1713860349', ' ', ' ', 6, 'App\\Models\\Page', '2024-04-23 01:19:09', '2024-04-23 01:19:09'),
(173, 'title1713860670', 'home', 'home', 10, 'App\\Models\\Section', '2024-04-23 01:24:30', '2024-04-23 01:24:30'),
(174, 'description1713860670', ' ', ' ', 10, 'App\\Models\\Section', '2024-04-23 01:24:30', '2024-04-23 01:24:30'),
(175, 'sub_title1713860670', ' ', ' ', 10, 'App\\Models\\Section', '2024-04-23 01:24:30', '2024-04-23 01:24:30'),
(176, 'title1713860719', 'Learn English together', 'Học Tiếng Anh cùng', 29, 'App\\Models\\Content', '2024-04-23 01:25:19', '2024-04-23 01:25:19'),
(177, 'description1713860719', '<p>Are you ready to conquer English with Cambridge IEC?<br />\r\nStart your path to success today by signing up for the class that&#39;s right for you!</p>', '<p>Bạn sẵn s&agrave;ng chinh phục Tiếng Anh c&ugrave;ng Cambridge IEC chưa?<br />\r\nH&atilde;y bắt đầu con đường dẫn đến th&agrave;nh c&ocirc;ng ngay h&ocirc;m nay bằng c&aacute;ch đăng k&yacute; lớp học ph&ugrave; hợp với m&igrave;nh n&agrave;o!</p>', 29, 'App\\Models\\Content', '2024-04-23 01:25:19', '2024-04-23 01:25:19'),
(178, 'sub_title1713860719', 'Cambridge IEC', 'Cambridge IEC', 29, 'App\\Models\\Content', '2024-04-23 01:25:19', '2024-04-23 01:25:19'),
(179, 'title1713863102', 'Share', 'Chia sẻ', 11, 'App\\Models\\Section', '2024-04-23 02:05:02', '2024-04-23 02:05:02'),
(180, 'description1713863102', '<p>Let&#39;s listen to what parents and students feel about the training program at Cambridge IEC</p>', '<p>C&ugrave;ng lắng nghe cảm nhận của phụ huynh v&agrave; học vi&ecirc;n về chương tr&igrave;nh đạo tạo tại Cambridge IEC</p>', 11, 'App\\Models\\Section', '2024-04-23 02:05:02', '2024-04-23 02:05:02'),
(181, 'sub_title1713863102', 'PERCEPTIONS OF PARENTS/STUDENTS', 'CẢM NHẬN CỦA PHỤ HUYNH/ HỌC VIÊN', 11, 'App\\Models\\Section', '2024-04-23 02:05:02', '2024-04-23 02:05:02'),
(182, 'title1713863205', 'Chị Nguyễn Ngọc Phương Khuyên', 'Chị Nguyễn Ngọc Phương Khuyên', 30, 'App\\Models\\Content', '2024-04-23 02:06:46', '2024-04-23 02:06:46'),
(183, 'description1713863205', '<p>Đ&acirc;y l&agrave; lần đầu ti&ecirc;n Khang học tiếng Anh, tuy vậy ch&aacute;u rất h&agrave;o hứng v&agrave; th&iacute;ch th&uacute;. Ch&aacute;u cũng bắt đầu bi b&ocirc; n&oacute;i những từ tiếng Anh ở nh&agrave; khi gặp những đồ vật m&agrave; ch&aacute;u đ&atilde; được học ở tr&ecirc;n lớp v&agrave; li&ecirc;n tục hỏi bố mẹ c&aacute;i n&agrave;y, c&aacute;i kia tiếng Anh l&agrave; g&igrave;. Kh&aacute;nh lu&ocirc;n mong đến ng&agrave;y thứ bảy để được đi học tiếng Anh tại Cambridge IEC. Gia đ&igrave;nh ch&uacute;ng t&ocirc;i cũng rất vui với sự hứng th&uacute; học của ch&aacute;u.</p>', '<p>Đ&acirc;y l&agrave; lần đầu ti&ecirc;n Khang học tiếng Anh, tuy vậy ch&aacute;u rất h&agrave;o hứng v&agrave; th&iacute;ch th&uacute;. Ch&aacute;u cũng bắt đầu bi b&ocirc; n&oacute;i những từ tiếng Anh ở nh&agrave; khi gặp những đồ vật m&agrave; ch&aacute;u đ&atilde; được học ở tr&ecirc;n lớp v&agrave; li&ecirc;n tục hỏi bố mẹ c&aacute;i n&agrave;y, c&aacute;i kia tiếng Anh l&agrave; g&igrave;. Kh&aacute;nh lu&ocirc;n mong đến ng&agrave;y thứ bảy để được đi học tiếng Anh tại Cambridge IEC. Gia đ&igrave;nh ch&uacute;ng t&ocirc;i cũng rất vui với sự hứng th&uacute; học của ch&aacute;u.</p>', 30, 'App\\Models\\Content', '2024-04-23 02:06:46', '2024-04-23 02:06:46'),
(184, 'sub_title1713863205', 'Phụ huynh cháu Phạm Quốc Khang (5 tuổi) – học viên lớp Tiếng Anh Mẫu Giáo Pre Starter 1 tại Cambridge IEC', 'Phụ huynh cháu Phạm Quốc Khang (5 tuổi) – học viên lớp Tiếng Anh Mẫu Giáo Pre Starter 1 tại Cambridge IEC', 30, 'App\\Models\\Content', '2024-04-23 02:06:46', '2024-04-23 02:06:46'),
(185, 'title1713863233', 'Anh Nguyễn Trung Bình', 'Anh Nguyễn Trung Bình', 31, 'App\\Models\\Content', '2024-04-23 02:07:13', '2024-04-23 02:07:13'),
(186, 'description1713863233', '<p>Khi mới đưa con đi học tiếng Anh tại Cambridge IEC, t&ocirc;i cũng c&ograve;n hơi lo lắng v&igrave; ch&aacute;u chưa học với gi&aacute;o vi&ecirc;n nước ngo&agrave;i bao giờ. Tuy nhi&ecirc;n thấy lớp học rất vui vẻ, h&agrave;o hứng, t&ocirc;i cũng thấy y&ecirc;n t&acirc;m hơn. Hết nửa kh&oacute;a học, t&ocirc;i ngạc nhi&ecirc;n v&igrave; sự tiến bộ của ch&acirc;u. Giờ đ&acirc;y con đ&atilde; h&aacute;t được rất nhiều b&agrave;i h&aacute;t tiếng Anh v&agrave; c&ograve;n dạy cả tiếng Anh cho bố mẹ.</p>', '<p>Khi mới đưa con đi học tiếng Anh tại Cambridge IEC, t&ocirc;i cũng c&ograve;n hơi lo lắng v&igrave; ch&aacute;u chưa học với gi&aacute;o vi&ecirc;n nước ngo&agrave;i bao giờ. Tuy nhi&ecirc;n thấy lớp học rất vui vẻ, h&agrave;o hứng, t&ocirc;i cũng thấy y&ecirc;n t&acirc;m hơn. Hết nửa kh&oacute;a học, t&ocirc;i ngạc nhi&ecirc;n v&igrave; sự tiến bộ của ch&acirc;u. Giờ đ&acirc;y con đ&atilde; h&aacute;t được rất nhiều b&agrave;i h&aacute;t tiếng Anh v&agrave; c&ograve;n dạy cả tiếng Anh cho bố mẹ.</p>', 31, 'App\\Models\\Content', '2024-04-23 02:07:13', '2024-04-23 02:07:13'),
(187, 'sub_title1713863233', 'Phụ huynh cháu Nguyễn Trung Nam Khánh (7 tuổi) – học viên lớp Tiếng Anh Mẫu Giáo Starter 1 tại Cambridge IEC.', 'Phụ huynh cháu Nguyễn Trung Nam Khánh (7 tuổi) – học viên lớp Tiếng Anh Mẫu Giáo Starter 1 tại Cambridge IEC.', 31, 'App\\Models\\Content', '2024-04-23 02:07:13', '2024-04-23 02:07:13'),
(188, 'title1713863254', 'Cao Mỹ Duyên', 'Cao Mỹ Duyên', 32, 'App\\Models\\Content', '2024-04-23 02:07:34', '2024-04-23 02:07:34'),
(189, 'description1713863254', '<p>Con đ&atilde; học tiếng Anh ở Cambridge IEC được hơn một năm. Con được học thầy Alex v&agrave; c&ocirc; Li&ecirc;n, thầy c&ocirc; n&agrave;o con học cũng thấy th&iacute;ch v&agrave; hay. C&aacute;c thầy c&ocirc; rất nhiệt t&igrave;nh, h&agrave;i hước v&agrave; rất quan t&acirc;m học sinh. C&aacute;c thầy c&ocirc; c&ograve;n gi&uacute;p con hiểu được c&aacute;ch &rdquo;chơi m&agrave; học&rdquo;, khiến con kh&ocirc;ng cảm thấy &rdquo;sợ&rdquo; học, m&agrave; c&ograve;n &ldquo;th&iacute;ch&rdquo; l&agrave; kh&aacute;c. Con muốn được học tiếng Anh suốt</p>', '<p>Con đ&atilde; học tiếng Anh ở Cambridge IEC được hơn một năm. Con được học thầy Alex v&agrave; c&ocirc; Li&ecirc;n, thầy c&ocirc; n&agrave;o con học cũng thấy th&iacute;ch v&agrave; hay. C&aacute;c thầy c&ocirc; rất nhiệt t&igrave;nh, h&agrave;i hước v&agrave; rất quan t&acirc;m học sinh. C&aacute;c thầy c&ocirc; c&ograve;n gi&uacute;p con hiểu được c&aacute;ch &rdquo;chơi m&agrave; học&rdquo;, khiến con kh&ocirc;ng cảm thấy &rdquo;sợ&rdquo; học, m&agrave; c&ograve;n &ldquo;th&iacute;ch&rdquo; l&agrave; kh&aacute;c. Con muốn được học tiếng Anh suốt</p>', 32, 'App\\Models\\Content', '2024-04-23 02:07:34', '2024-04-23 02:07:34'),
(190, 'sub_title1713863254', 'Học sinh lớp 3 trường Lý Thái Tổ, đang học lớp Tiếng Anh Tiểu Học A1 tại Cambridge IEC.', 'Học sinh lớp 3 trường Lý Thái Tổ, đang học lớp Tiếng Anh Tiểu Học A1 tại Cambridge IEC.', 32, 'App\\Models\\Content', '2024-04-23 02:07:34', '2024-04-23 02:07:34'),
(191, 'title1713866803', 'Cao Mỹ Duyên', 'Cao Mỹ Duyên', 33, 'App\\Models\\Content', '2024-04-23 03:06:43', '2024-04-23 03:06:43'),
(192, 'description1713866803', '<p>Khi mới đưa con đi học tiếng Anh tại Cambridge IEC, t&ocirc;i cũng c&ograve;n hơi lo lắng v&igrave; ch&aacute;u chưa học với gi&aacute;o vi&ecirc;n nước ngo&agrave;i bao giờ. Tuy nhi&ecirc;n thấy lớp học rất vui vẻ, h&agrave;o hứng, t&ocirc;i cũng thấy y&ecirc;n t&acirc;m hơn. Hết nửa kh&oacute;a học, t&ocirc;i ngạc nhi&ecirc;n v&igrave; sự tiến bộ của ch&acirc;u. Giờ đ&acirc;y con đ&atilde; h&aacute;t được rất nhiều b&agrave;i h&aacute;t tiếng Anh v&agrave; c&ograve;n dạy cả tiếng Anh cho bố mẹ.</p>', '<p>Khi mới đưa con đi học tiếng Anh tại Cambridge IEC, t&ocirc;i cũng c&ograve;n hơi lo lắng v&igrave; ch&aacute;u chưa học với gi&aacute;o vi&ecirc;n nước ngo&agrave;i bao giờ. Tuy nhi&ecirc;n thấy lớp học rất vui vẻ, h&agrave;o hứng, t&ocirc;i cũng thấy y&ecirc;n t&acirc;m hơn. Hết nửa kh&oacute;a học, t&ocirc;i ngạc nhi&ecirc;n v&igrave; sự tiến bộ của ch&acirc;u. Giờ đ&acirc;y con đ&atilde; h&aacute;t được rất nhiều b&agrave;i h&aacute;t tiếng Anh v&agrave; c&ograve;n dạy cả tiếng Anh cho bố mẹ.</p>', 33, 'App\\Models\\Content', '2024-04-23 03:06:43', '2024-04-23 03:06:43'),
(193, 'sub_title1713866803', 'Phụ huynh cháu Nguyễn Trung Nam Khánh (7 tuổi) – học viên lớp Tiếng Anh Mẫu Giáo Starter 1 tại Cambridge IEC.', 'Phụ huynh cháu Nguyễn Trung Nam Khánh (7 tuổi) – học viên lớp Tiếng Anh Mẫu Giáo Starter 1 tại Cambridge IEC.', 33, 'App\\Models\\Content', '2024-04-23 03:06:43', '2024-04-23 03:06:43'),
(194, 'title1713867298', 'FREE CONSULTATION AND INSPECTION', 'TƯ VẤN VÀ KIỂM TRA MIỄN PHÍ', 12, 'App\\Models\\Section', '2024-04-23 03:14:58', '2024-04-23 03:17:47'),
(195, 'description1713867298', '<p>Do you still have questions and concerns about courses at Cambridge IEC? Receive free direct advice from the Cambridge IEC team about the suitable study path for yourself today by filling in your information in the form below.</p>', '<p>Bạn c&ograve;n thắc mắc v&agrave; băn khoăn về c&aacute;c kh&oacute;a học tại Cambridge IEC? Nhận tư vấn trực tiếp miễn ph&iacute; từ đội ngũ của Cambridge IEC về&nbsp;lộ tr&igrave;nh học&nbsp;ph&ugrave; hợp cho bản th&acirc;n m&igrave;nh ngay trong h&ocirc;m nay bằng c&aacute;ch điền th&ocirc;ng tin của bạn v&agrave;o form b&ecirc;n dưới.</p>', 12, 'App\\Models\\Section', '2024-04-23 03:14:58', '2024-04-23 03:17:47'),
(196, 'sub_title1713867298', ' ', ' ', 12, 'App\\Models\\Section', '2024-04-23 03:14:58', '2024-04-23 03:14:58'),
(197, 'title1713867494', 'anh1', 'anh1', 34, 'App\\Models\\Content', '2024-04-23 03:18:14', '2024-04-23 03:18:14'),
(198, 'description1713867494', ' ', ' ', 34, 'App\\Models\\Content', '2024-04-23 03:18:14', '2024-04-23 03:18:14'),
(199, 'sub_title1713867494', ' ', ' ', 34, 'App\\Models\\Content', '2024-04-23 03:18:14', '2024-04-23 03:18:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mails`
--

CREATE TABLE `mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_15_040214_create_permission_tables', 1),
(6, '2022_07_08_022600_create_pages_table', 1),
(7, '2022_07_08_022623_create_themes_table', 1),
(8, '2022_07_08_022811_create_sections_table', 1),
(9, '2022_07_08_023317_create_contents_table', 1),
(10, '2022_07_08_023337_create_images_table', 1),
(11, '2022_07_08_023453_create_category_news_table', 1),
(12, '2022_07_08_023734_create_news_table', 1),
(13, '2022_07_08_023744_create_tags_table', 1),
(14, '2022_07_08_023756_create_contacts_table', 1),
(15, '2022_07_08_024521_create_tag_new_table', 1),
(16, '2022_07_08_025923_create_languages_table', 1),
(17, '2022_07_11_093134_create_category_contents_table', 1),
(18, '2022_07_16_040042_create_mails_table', 1),
(19, '2022_08_04_081239_create_projects_table', 1),
(20, '2022_08_04_081303_create_items_table', 1),
(21, '2023_06_07_020054_create_category_holo360_table', 1),
(22, '2023_06_07_020343_create_holo360_project_table', 1),
(23, '2023_06_13_013013_add_type_to_holo360_project_table', 2),
(24, '2023_09_05_063802_edit_items_table', 2),
(25, '2023_09_05_071334_edit_projects_table', 2),
(26, '2023_09_15_033327_add_type_to_project', 3),
(27, '2024_04_15_035349_create_sessions_table', 4),
(28, '2024_04_16_035628_create_settings_table', 5),
(29, '2024_04_16_035641_create_courses_table', 5),
(30, '2024_04_16_035654_create_reviews_table', 5),
(31, '2024_04_16_035710_create_persons_table', 5),
(32, '2024_04_16_040407_create_consulations_table', 5),
(33, '2024_04_22_072111_create_jobs_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outstanding` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `content`, `image`, `outstanding`, `view`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'title1713339752', 'slug1713339752', 'content1713339752', 'images/tintuc/17133397521_00a46be7a1bd0fe356acjpg.jpg', 0, 0, 1, '2024-04-17 00:42:32', '2024-04-17 00:42:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_priority` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `id_priority`, `title`, `description`, `sub_title`, `created_at`, `updated_at`) VALUES
(5, NULL, 'Home', 'description1713154805', NULL, '2024-04-14 21:20:05', '2024-04-14 21:20:05'),
(6, NULL, 'about_cammbridge', 'description1713860349', NULL, '2024-04-23 01:19:09', '2024-04-23 01:19:09'),
(8, NULL, 'project', NULL, NULL, '2024-04-23 01:44:16', '2024-04-23 01:44:16'),
(9, NULL, 'immersive', NULL, NULL, '2024-04-23 01:44:16', '2024-04-23 01:44:16'),
(10, NULL, 'contact', NULL, NULL, '2024-04-23 01:44:16', '2024-04-23 01:44:16'),
(12, NULL, 'teacher_cammbridge', NULL, NULL, '2024-04-23 01:44:16', '2024-04-23 01:44:16'),
(13, NULL, 'student', NULL, NULL, '2024-04-23 01:44:16', '2024-04-23 01:44:16'),
(14, NULL, 'activity', NULL, NULL, '2024-04-23 01:44:16', '2024-04-23 01:44:16'),
(15, NULL, 'course', NULL, NULL, '2024-04-23 01:44:16', '2024-04-23 01:44:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users_manage', 'web', '2023-06-09 02:53:46', '2023-06-09 02:53:46'),
(2, 'create_project', 'web', '2023-06-09 02:53:46', '2023-06-09 02:53:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `persons`
--

CREATE TABLE `persons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `persons`
--

INSERT INTO `persons` (`id`, `name`, `description`, `type`, `image`, `score`, `created_at`, `updated_at`) VALUES
(1, 'Nga', 'description1713345993', 'teacher', 'images/persons/17133459931_5ab177b6bdec13b24afdjpg.jpg', NULL, '2024-04-17 02:26:33', '2024-04-17 02:26:33'),
(2, 'Trang', 'description1713853865', 'teacher', 'images/persons/17138538651_teacherjpg.jpg', NULL, '2024-04-22 23:31:05', '2024-04-22 23:31:05'),
(3, 'Quân Kun', 'description1713854313', 'teacher', 'images/persons/17138543131_imgjpg.jpg', NULL, '2024-04-22 23:38:33', '2024-04-23 00:19:52'),
(4, 'Hà Linh', 'description1713856007', 'teacher', 'images/persons/17138560071_teacherjpg.jpg', NULL, '2024-04-23 00:06:47', '2024-04-23 00:06:47'),
(5, 'Nga', 'description1713856083', 'student', 'images/persons/17138560831_1jpg.jpg', '9', '2024-04-23 00:08:03', '2024-04-23 00:15:33'),
(7, 'Bùi Minh Phương', 'description1713856888', 'student', 'images/persons/17138568881_843601ffcd9f9d37863aebfad6401b67png.png', '7', '2024-04-23 00:21:28', '2024-04-23 00:21:28'),
(8, 'Trịnh Kim Ngân', 'description1713857428', 'student', 'images/persons/17138574281_351111479-643934881107743-5350731413814885205-njpg.jpg', NULL, '2024-04-23 00:30:28', '2024-04-23 00:30:28'),
(9, 'Nguyễn Khánh Ngân', 'description1713857550', 'student', 'images/persons/17138575501_353009236-721295046672528-2387320293050259170-njpg.jpg', NULL, '2024-04-23 00:32:30', '2024-04-23 00:32:30'),
(10, 'Hà Trang', 'description1713857622', 'student', 'images/persons/17138576221_843601ffcd9f9d37863aebfad6401b67png.png', NULL, '2024-04-23 00:33:42', '2024-04-23 00:33:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_priority` int(11) DEFAULT NULL,
  `type` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `projects`
--

INSERT INTO `projects` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`, `id_priority`, `type`) VALUES
(1, 'Holo360 Fortuna Hotel Hanoi', 'holo360-fortuna-hotel-hanoi', 'Project/1/16884625881_1200x800-3jpg.jpg', '2023-07-04 02:23:08', '2023-09-14 20:47:24', NULL, 'not_header'),
(2, 'NganT', 'ngant', 'Project/2/16947496371_holomiapng.png', '2023-09-14 20:47:17', '2023-09-14 20:47:17', NULL, 'header');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2023-06-09 02:53:46', '2023-06-09 02:53:46'),
(2, 'create_project', 'web', '2023-06-09 02:53:46', '2023-06-09 02:53:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_priority` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `theme_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sections`
--

INSERT INTO `sections` (`id`, `title`, `sub_title`, `description`, `id_priority`, `active`, `page_id`, `theme_id`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', 'trangchu', 'trangchu', 8, 0, 5, 14, NULL, '2024-04-23 03:15:18'),
(2, 'title1713164905', 'sub_title1713164905', 'description1713164905', 0, 1, 5, 14, '2024-04-15 00:08:25', '2024-04-22 01:00:12'),
(3, 'title1713772803', 'sub_title1713772803', 'description1713772803', 1, 1, 5, 15, '2024-04-22 01:00:03', '2024-04-22 01:01:02'),
(4, 'title1713777212', 'sub_title1713777212', 'description1713777212', 3, 1, 5, 17, '2024-04-22 02:13:32', '2024-04-22 23:11:30'),
(5, 'title1713852685', 'sub_title1713852685', 'description1713852685', 2, 1, 5, 16, '2024-04-22 23:11:25', '2024-04-22 23:11:30'),
(6, 'title1713854518', 'sub_title1713854518', 'description1713854518', 4, 1, 5, 18, '2024-04-22 23:41:58', '2024-04-22 23:42:15'),
(7, 'title1713857031', 'sub_title1713857031', 'description1713857031', 5, 1, 5, 19, '2024-04-23 00:23:51', '2024-04-23 02:05:09'),
(8, 'title1713857807', 'sub_title1713857807', 'description1713857807', 6, 1, 5, 20, '2024-04-23 00:36:47', '2024-04-23 02:05:09'),
(9, 'title1713857852', 'sub_title1713857852', 'description1713857852', 7, 1, 5, 21, '2024-04-23 00:37:32', '2024-04-23 03:15:18'),
(10, 'title1713860670', 'sub_title1713860670', 'description1713860670', NULL, 1, 6, 22, '2024-04-23 01:24:30', '2024-04-23 01:24:30'),
(11, 'title1713863102', 'sub_title1713863102', 'description1713863102', 9, 1, 5, 24, '2024-04-23 02:05:02', '2024-04-23 03:15:18'),
(12, 'title1713867298', 'sub_title1713867298', 'description1713867298', 10, 1, 5, 25, '2024-04-23 03:14:58', '2024-04-23 03:15:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('x8m7CtegVXE4PsAW2KxIW5F8WwcXGfrjMUy6zGN6', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVThhYjExZWh5ckJXTm03QjBBZERRQmRtR1ZQUHQxUk4zREpNZ1V4RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo2OiJsb2NhbGUiO3M6MjoiZW4iO30=', 1713868961);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `phone`, `email`, `address`, `time`, `created_at`, `updated_at`) VALUES
(1, '0336555879', 'ngantgmal.com', 'Số 21, ngõ 12, Đào Tấn, Ba Đình, Hà Nội', '08:00 - 21:00', NULL, '2024-04-16 01:27:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'news', 'news', '2024-04-17 00:41:52', '2024-04-17 00:41:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag_new`
--

CREATE TABLE `tag_new` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `new_id` int(10) UNSIGNED DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag_new`
--

INSERT INTO `tag_new` (`id`, `new_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `themes`
--

CREATE TABLE `themes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `themes`
--

INSERT INTO `themes` (`id`, `title`, `image_template`, `link_code`, `type`, `created_at`, `updated_at`) VALUES
(1, 'video intro', 'images/theme/16575304261_video-intropng.PNG', 'template.video-intro', 0, '2023-06-09 02:53:46', NULL),
(2, 'intro', 'images/theme/16575304851_intropng.PNG', 'template.intro', 0, '2023-06-09 02:53:46', NULL),
(3, 'Holomia Overview', 'images/theme/16575305521_holomia-overviewpng.PNG', 'template.overview', 0, '2023-06-09 02:53:46', NULL),
(4, 'View project', 'images/theme/16575306151_view-projectpng.PNG', 'template.view-project', 0, '2023-06-09 02:53:46', NULL),
(5, 'Last News', 'images/theme/16575307301_last-newpng.PNG', 'template.last-new', 0, '2023-06-09 02:53:46', NULL),
(6, 'Vison', 'images/theme/16575307661_visionpng.PNG', 'template.vision-holomia', 0, '2023-06-09 02:53:46', NULL),
(7, 'Our Team', 'images/theme/16575307991_our-teampng.PNG', 'template.our-team', 0, '2023-06-09 02:53:46', NULL),
(8, 'imersive_about', 'images/theme/16576006781_imersive-aboutpng.PNG', 'template.imersive_about', 0, '2023-06-09 02:53:46', NULL),
(9, 'holomia event', 'images/theme/16576007131_holmia-eventpng.PNG', 'template.holomia_event', 0, '2023-06-09 02:53:46', NULL),
(10, 'about us', 'images/theme/16576837001_about-uspng.PNG', 'template.about_us', 0, '2023-06-09 02:53:46', NULL),
(11, 'contact_detail', 'images/theme/16576837711_contact-detailpng.PNG', 'template.contact_detail', 0, '2023-06-09 02:53:46', NULL),
(12, 'contact-form', 'images/theme/16581128031_contact-formpng.PNG', 'template.contact-form', 0, '2023-06-09 02:53:46', NULL),
(13, 'holomia news', 'images/theme/16581131731_holomia-newspng.PNG', 'template.holomia-news', 0, '2023-06-09 02:53:46', NULL),
(14, 'Cambride Banner', 'images/theme/17137670091_sectionpng.png', 'template.camb.camb_banner', 0, '2024-04-21 23:23:29', '2024-04-22 18:57:50'),
(15, 'camb_about', 'images/theme/17137726041_aboutjpg.JPG', 'template.camb.camb_about', 0, '2024-04-22 00:56:44', '2024-04-22 18:58:02'),
(16, 'Lý do', 'images/theme/17137771441_lydojpg.JPG', 'template.camb.camb_reason', 0, '2024-04-22 02:12:24', '2024-04-22 18:58:13'),
(17, 'Khoa hoc', 'images/theme/17137771681_khoahocjpg.JPG', 'template.camb.camb_course', 0, '2024-04-22 02:12:48', '2024-04-22 18:58:25'),
(18, 'teacher', 'images/theme/17138038581_doingupng.png', 'template.camb.camb_teacher', 0, '2024-04-22 02:37:38', '2024-04-22 02:38:50'),
(19, 'student', 'images/theme/17138052231_studentpng.png', 'template.camb.camb_student', 0, '2024-04-22 03:00:23', '2024-04-22 03:00:23'),
(20, 'camb_partner', 'images/theme/17138059421_partnerpng.png', 'template.camb.camb_partner', 0, '2024-04-22 03:12:22', '2024-04-22 03:12:22'),
(21, 'Hoạt động', 'images/theme/17138078561_activitypng.png', 'template.camb.camb_activity', 0, '2024-04-22 03:44:16', '2024-04-22 03:44:16'),
(22, 'Banner Origin', 'images/theme/17138605961_banner-originjpg.JPG', 'template.camb.camb_banner_origin', 0, '2024-04-23 01:23:16', '2024-04-23 01:23:16'),
(23, 'introduce', 'images/theme/17138628071_introducejpg.JPG', 'template.camb.camb_introduce', 0, '2024-04-23 02:00:07', '2024-04-23 02:00:07'),
(24, 'Cảm nhận', 'images/theme/17138630061_camnhanjpg.JPG', 'template.camb.camb_camnhan', 0, '2024-04-23 02:03:26', '2024-04-23 02:03:26'),
(25, 'Tư vấn', 'images/theme/17138669871_form-tuvanjpg.JPG', 'template.camb.camb_form', 0, '2024-04-23 03:09:47', '2024-04-23 03:09:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@holomia.com', NULL, '$2y$10$wdPA2GvdxN5OUOdlaPVzqu3BjDpodnzxPLhg2dn8BLu6IR1hDbGaa', NULL, '2023-06-09 02:53:46', '2023-06-09 02:53:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_contents`
--
ALTER TABLE `category_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_contents_section_id_foreign` (`section_id`);

--
-- Chỉ mục cho bảng `category_holo360`
--
ALTER TABLE `category_holo360`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `consulations`
--
ALTER TABLE `consulations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `holo360_project`
--
ALTER TABLE `holo360_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holo360_project_category_holo360_id_foreign` (`category_holo360_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_content_id_foreign` (`content_id`);

--
-- Chỉ mục cho bảng `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_project_id_foreign` (`project_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_page_id_foreign` (`page_id`),
  ADD KEY `sections_theme_id_foreign` (`theme_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tag_new`
--
ALTER TABLE `tag_new`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_new_new_id_foreign` (`new_id`),
  ADD KEY `tag_new_tag_id_foreign` (`tag_id`);

--
-- Chỉ mục cho bảng `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `themes_title_unique` (`title`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_contents`
--
ALTER TABLE `category_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category_holo360`
--
ALTER TABLE `category_holo360`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `consulations`
--
ALTER TABLE `consulations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `holo360_project`
--
ALTER TABLE `holo360_project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT cho bảng `mails`
--
ALTER TABLE `mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `persons`
--
ALTER TABLE `persons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tag_new`
--
ALTER TABLE `tag_new`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category_contents`
--
ALTER TABLE `category_contents`
  ADD CONSTRAINT `category_contents_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `holo360_project`
--
ALTER TABLE `holo360_project`
  ADD CONSTRAINT `holo360_project_category_holo360_id_foreign` FOREIGN KEY (`category_holo360_id`) REFERENCES `category_holo360` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_news` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sections_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tag_new`
--
ALTER TABLE `tag_new`
  ADD CONSTRAINT `tag_new_new_id_foreign` FOREIGN KEY (`new_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_new_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
