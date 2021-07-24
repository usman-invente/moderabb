-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 07:55 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modareb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(255) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, 'الكتابة الإعلامية والصحفية', '1625316455.jpg', '2021-07-03 07:47:35', '2021-07-03 07:47:35'),
(3, 1, 'تدريب معلمي اللغة العربية لغير الناطقين بها', '1625316479.jpg', '2021-07-03 07:47:59', '2021-07-03 07:47:59'),
(4, 1, 'الأدب والبلاغة والنقد', '1625316510.jpg', '2021-07-03 07:48:30', '2021-07-03 07:48:30'),
(5, 1, 'الكتابة الإبداعية', '1625316535.jpg', '2021-07-03 07:48:55', '2021-07-03 07:48:55'),
(6, 1, 'الكتابة الوظيفية', '1625316563.jpg', '2021-07-03 07:49:23', '2021-07-03 07:49:23'),
(7, 1, 'أساسيات الكتابة', '1625316586.jpg', '2021-07-03 07:49:46', '2021-07-03 07:49:46'),
(8, 1, 'اللغة والتقنية', '1625317312.jpg', '2021-07-03 08:01:52', '2021-07-03 08:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Vladimir Marquez', 'cyxenoleci@mailinator.com', 'nymynamewu@mailinator.com', 'In ipsa dolores ut', '2021-07-03 15:27:48', '2021-07-03 15:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `advert_perce` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advert_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_user_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `name`, `description`, `code`, `type`, `amount`, `advert_perce`, `advert_name`, `expires_at`, `min_price`, `per_user_limit`, `status`, `created_at`, `updated_at`) VALUES
(1, '12', 'test', 'testtest', 'mdr1', '1', '1500', '10', 'tax', '2021-11-02', '2000', '10', '1', '2021-07-14 01:24:38', '2021-07-14 01:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(255) NOT NULL,
  `teachers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eccbody_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bag_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voltage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recording_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_purchase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goals` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outputs` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_group` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `teachers`, `eccbody_id`, `category_id`, `bag_type`, `title`, `slug`, `description`, `price`, `course_image`, `price_certificate`, `certificate`, `start_date`, `end_date`, `level`, `voltage`, `duration`, `recording_url`, `email`, `published`, `featured`, `trending`, `popular`, `free`, `c_purchase`, `goals`, `requirements`, `outputs`, `target_group`, `sponsor_name`, `media_type`, `video`, `video_file`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(3, 11, 'a:1:{i:0;s:2:\"11\";}', '11', '3', '2', 'Suscipit at aliquip', 'Dolor nesciunt nihi', 'Distinctio Rem enim\"\"\"\"\"\"\"', '27', NULL, '788', NULL, '1993-05-17', '1980-09-18', 'Odio sit in volupta', 'Provident aliquip e', 'Omnis ipsa itaque a', 'Fugiat itaque eius', NULL, '1', '1', '1', '0', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, 'Do culpa similique', NULL, 'Illo mollit in excep', 'Eum veritatis delect', 'Ut natus eiusmod ear', '2021-07-05 15:12:39', '2021-07-06 02:20:49'),
(4, 12, 'a:1:{i:0;s:2:\"12\";}', '11', '2', '1', 'test', 'test', 'test', '12', NULL, '12', NULL, '2021-07-06', '2021-07-06', 'pro', 'test123', 'test123', 'test123', NULL, '1', '1', '0', '0', '0', '0', 'vvvv', '<p>vvvv</p>', '<p><b>vvvv</b></p>', '<p><font color=\"#000000\" style=\"background-color: rgb(0, 0, 0);\">sss</font></p>', '<p>xx</p>', 'youtube', 'Porro saepe praesent', NULL, 'test', '33333', '333', '2021-07-06 02:20:36', '2021-07-06 02:20:36'),
(5, 12, 'a:1:{i:0;s:2:\"12\";}', '12', '2', '1', 'test', 'test', 'rt', '5', NULL, '5', NULL, '2021-07-08', '2021-07-23', 'test', 'test', 'test', 'https://www.google.com', NULL, '1', '0', '0', '0', '0', '0', '<p>test</p>', '<p>test</p>', '<p>test</p>', '<p>test</p>', '<p>test</p>', 'upload', NULL, 'C:\\xampp\\tmp\\phpFB83.tmp', 'test', 'tr', 're', '2021-07-08 00:49:54', '2021-07-18 09:06:23'),
(6, 12, 'a:1:{i:0;s:2:\"11\";}', '19', '2', '1', 'test', 'test', 'show_courses_accreditation_bodies', '3', NULL, '4', NULL, '2021-07-08', '2021-07-08', 'pro', 'test', 'test123', 'test123', NULL, '1', '0', '0', '0', '0', '0', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: #ce9178;\">show</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: #ce9178;\">courses</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: #ce9178;\">accreditation</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: #ce9178;\">bodies</span></div>', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><div style=\"line-height: 19px;\"><span style=\"color: rgb(206, 145, 120);\">show</span></div><div style=\"line-height: 19px;\"><span style=\"color: rgb(206, 145, 120);\">courses</span></div><div style=\"line-height: 19px;\"><span style=\"color: rgb(206, 145, 120);\">accreditation</span></div><div style=\"line-height: 19px;\"><span style=\"color: rgb(206, 145, 120);\">bodies</span></div></div>', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">show</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">courses</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">accreditation</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">bodies</span></div>', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">show</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">courses</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">accreditation</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">bodies</span></div>', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">show</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">courses</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">accreditation</span></div><div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><span style=\"color: rgb(206, 145, 120);\">bodies</span></div>', 'youtube', 'Porro saepe praesent', NULL, 'test', 'test', 'test', '2021-07-08 01:07:05', '2021-07-08 01:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `diplomas`
--

CREATE TABLE `diplomas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(255) NOT NULL,
  `courses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eccbody_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bag_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voltage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recording_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trending` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goals` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `outputs` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_group` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diplomas`
--

INSERT INTO `diplomas` (`id`, `user_id`, `courses`, `eccbody_id`, `category_id`, `bag_type`, `title`, `slug`, `description`, `price`, `course_image`, `price_certificate`, `certificate`, `start_date`, `end_date`, `level`, `voltage`, `duration`, `recording_url`, `published`, `featured`, `trending`, `popular`, `free`, `c_purchase`, `goals`, `requirements`, `outputs`, `target_group`, `sponsor_name`, `media_type`, `video`, `video_file`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'a:1:{i:0;s:1:\"1\";}', '4', '3', '1', 'test', 'Sunt in doloribus q', 'Ex dolor enim ex ess\"', '655', NULL, '149', NULL, '1973-08-21', '2017-09-10', 'Tempora perferendis', 'Nihil iusto aliquam', 'Odio omnis est duis', 'In ea laborum Sunt', '1', '0', '0', '0', '0', '0', '<p>test</p>', '<p><span style=\"color: rgb(35, 40, 44); font-family: Tajawal, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Tajawal, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, Tajawal, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14px; font-weight: 700;\">courses</span></p>', '<p><span style=\"color: rgb(35, 40, 44); font-family: Tajawal, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Tajawal, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, Tajawal, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14px; font-weight: 700;\">courses</span></p>', '<p><span style=\"color: rgb(35, 40, 44); font-family: Tajawal, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Tajawal, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, Tajawal, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14px; font-weight: 700;\">courses</span></p>', '<p><span style=\"color: rgb(35, 40, 44); font-family: Tajawal, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Tajawal, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, Tajawal, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14px; font-weight: 700;\">courses</span></p>', NULL, NULL, NULL, 'Ex obcaecati incourses erro', 'Quae dignissimos coursesoff', 'Fuga Nostrud except', '2021-07-05 06:57:20', '2021-07-05 07:13:58');

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
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(255) DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_lesson` tinyint(3) NOT NULL DEFAULT 0,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `downloadable_files` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_audio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `user_id`, `course_id`, `title`, `live_lesson`, `url`, `short_text`, `full_text`, `downloadable_files`, `add_audio`, `add_pdf`, `media_type`, `video`, `video_file`, `published`, `created_at`, `updated_at`) VALUES
(1, 12, '3', 'Nesciunt iure quas', 0, 'Reiciendis do occaec', 'Nesciunt iure quas', 'Nesciunt iure quas', NULL, NULL, NULL, NULL, 'test', NULL, '1', '2021-07-08 03:23:42', '2021-07-12 05:16:06'),
(2, 12, '3', 'Rerum eius sit ex vo', 0, 'Cupiditate minim sed', 'Rerum eius sit ex vo', 'Rerum eius sit ex vo', NULL, NULL, NULL, NULL, 'dd', NULL, '1', '2021-07-09 01:46:53', '2021-07-09 03:10:23'),
(3, 12, '3', 'Quos sunt ea quibus', 0, 'Nisi voluptatem id', 'Voluptatibus ratione', NULL, NULL, NULL, NULL, 'vimeo', 'test', NULL, '1', '2021-07-09 02:41:17', '2021-07-09 02:41:17'),
(5, 12, '3', 'Rerum eius sit ex vo', 0, 'Cupiditate minim sed', 'Rerum eius sit ex vo', 'Rerum eius sit ex vo', NULL, NULL, NULL, NULL, 'dd', NULL, '1', '2021-07-09 03:09:54', '2021-07-09 03:09:54'),
(6, 12, '3', 'test', 1, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-11 12:24:36', '2021-07-11 12:24:59'),
(7, 12, '6', 'test', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2021-07-13 01:10:27', '2021-07-13 01:10:27'),
(8, 12, '4', 'Qui laborum Aliquid', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2021-07-13 01:14:36', '2021-07-13 01:14:36');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2021_06_29_211247_create_newsletters_table', 1),
(12, '2021_07_03_115157_create_categories_table', 2),
(13, '2021_07_03_135020_create_training_needs_table', 3),
(14, '2021_07_03_202402_create_contacts_table', 4),
(15, '2021_07_05_052556_create_courses_table', 5),
(16, '2021_07_05_113459_create_diplomas_table', 6),
(17, '2021_07_08_075604_create_lessons_table', 7),
(18, '2021_07_11_174606_create_schedules_table', 8),
(19, '2021_07_13_060315_create_tests_table', 9),
(20, '2021_07_13_080846_create_taxes_table', 10),
(21, '2021_07_14_054847_create_coupons_table', 11),
(22, '2021_07_15_101828_create_quesstions_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'fahad@arco.com', '2021-06-30 05:54:56', '2021-06-30 05:54:56'),
(3, 'mabubakar9231@gmail.com', '2021-06-30 05:56:31', '2021-06-30 05:56:31'),
(4, 'lomydoze@mailinator.com', '2021-07-02 04:20:43', '2021-07-02 04:20:43');

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
-- Table structure for table `quesstions`
--

CREATE TABLE `quesstions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tests` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_text_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `explanation_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_text_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `explanation_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_text_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `explanation_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_text_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `explanation_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quesstions`
--

INSERT INTO `quesstions` (`id`, `user_id`, `question`, `question_image`, `score`, `course_id`, `lesson_id`, `tests`, `option_text_1`, `explanation_1`, `correct_1`, `option_text_2`, `explanation_2`, `correct_2`, `option_text_3`, `explanation_3`, `correct_3`, `option_text_4`, `explanation_4`, `correct_4`, `created_at`, `updated_at`) VALUES
(2, '12', 'Laudantium impedit', NULL, '875', '3', '1', 'a:1:{i:0;s:1:\"1\";}', 'Ut labore eum explic', 'Non quis repellendus', '0', 'Aspernatur necessita', 'Officia id libero qu', '0', 'Pariatur Totam proi', 'Placeat enim ex sol', '1', 'Minus labore consect', 'Adipisci labore reru', '1', '2021-07-17 14:35:33', '2021-07-17 14:35:33'),
(3, '12', 'testest', '1626554160.png', '1486', '3', '1', 'a:1:{i:0;s:1:\"1\";}', 'testest', 'testest', '1', 'testest', 'testest', '1', 'testest', 'testest', '1', 'testest', 'testest', '1', '2021-07-17 14:57:46', '2021-07-17 15:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainee_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `user_id`, `lesson_id`, `title`, `short_text`, `date`, `duration`, `password`, `trainee_limit`, `created_at`, `updated_at`) VALUES
(8, '12', '6', 'test123', 'test', '2021-07-13', '120', '$2y$10$W0T19L4PPqJCcd3svKFsrOFykRDhFPXeDbQi0Y1FXM7k3QDLCGbBm', '500', '2021-07-13 00:17:49', '2021-07-13 00:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `user_id`, `name`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, '12', 'test123', '10', '1', '2021-07-13 03:22:01', '2021-07-14 00:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeat_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `lesson_id`, `course_id`, `title`, `repeat_count`, `description`, `published`, `created_at`, `updated_at`) VALUES
(1, '12', '1', '4', 'Est laborum quia ad', 'Est laborum quia ad', 'Quia id in deserunt', '1', '2021-07-13 02:32:43', '2021-07-13 02:32:43'),
(2, '12', '8', '6', 'test', 'test', 'test', '1', '2021-07-13 02:48:35', '2021-07-13 02:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `training_needs`
--

CREATE TABLE `training_needs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `axes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `idea` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_needs`
--

INSERT INTO `training_needs` (`id`, `user_id`, `title`, `categorie_id`, `course_field`, `axes`, `idea`, `created_at`, `updated_at`) VALUES
(2, '1', 'test123', '6', 'test123', 'test123', 'test123', '2021-07-03 10:27:58', '2021-07-18 12:23:11'),
(3, '22', 'test', '5', 'test', 'test', 'test', '2021-07-18 12:26:40', '2021-07-18 12:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_rank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_of_residence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facbook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_academic_degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ibn_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0,
  `roll_id` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `title`, `c_person`, `telephone`, `dob`, `sex`, `country`, `email`, `avatar_location`, `academic_rank`, `nationality`, `country_of_residence`, `facbook`, `twitter`, `linkedin`, `instagram`, `passport`, `photo_academic_degree`, `cv`, `bank_name`, `bank_country`, `ibn_number`, `status`, `roll_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Caleb', NULL, 'Dorsey', '+1 (608) 462-2783', NULL, NULL, NULL, 'bubezaro@mailinator.com', '1625341018.jpg', NULL, NULL, 'Qui dolore asperiores quis autem', 'Laboriosam temporibus ipsum veniam sint quam porro', 'Sed soluta aute ex officiis molestias qui proident eum nisi qui nisi magna consequatur iure officiis', 'Maiores pariatur Ullamco velit voluptatem praesentium magni at sed autem sunt aut nemo labore eius', 'Eum fugiat et quae consectetur id ut consequatur nemo quia quaerat', NULL, NULL, NULL, 'Iona Shaw', 'Optio magni eius libero ex consequuntur molestias provident quia tempora', '927', 1, 4, NULL, '$2y$10$cJoCzEe6uDJ6wUXP1K5WzOKHIZDyBlRigc4y8g.jgnPhPLvmVwcJ2', NULL, '2021-07-03 14:10:38', '2021-07-03 14:40:08'),
(11, 'Adele Murphy', 'Sequi totam fuga No', NULL, '+1 (738) 344-7852', '1997-05-01', 'male', 'Sed porro ullam ut u', 'gyvoconi@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, NULL, '$2y$10$6UGhR2ou5d/O/fogxmHjPuvablzUUzV07GJiUO.89OdObr2mM5HyG', NULL, '2021-07-05 13:15:30', '2021-07-05 13:15:30'),
(12, 'Muhammad', 'Abu Bakar', NULL, '+923029231486', '2021-07-06', 'male', 'pk', 'mabubakar9231@gmail.com', '1626248221.png', 'b', 'pakistan', 'pakistan', 'facebook', 'twitter', 'linkedin', 'instagram', '1626248306.png', '1626248221.png', '1626248221.pdf', 'HMBL', 'pakistan', '1486', 0, 1, NULL, '$2y$10$.QXbE68/l00qB1IEj.JCvuf.boghAll95Z6DHJlGG4W3JmSBzlfj.', NULL, '2021-07-06 02:13:32', '2021-07-14 02:39:47'),
(13, 'Shellie Clark', 'Vitae assumenda erro', NULL, NULL, NULL, 'male', NULL, 'nymufefym@mailinator.com', '', 'm', 'Ea veniam ullam qui', 'Perferendis nihil ut', 'Sit do omnis est ess', 'Qui et ratione rerum', 'Voluptas temporibus', 'Quae voluptas sit u', '', '', '', 'Sonya Copeland', 'Esse ipsa neque vo', '94', 0, 4, NULL, '$2y$10$.dE4WJO/SnCovfoOfVzbdecH0MJUXmW8CjThwaKAKvxE685fRzB8u', NULL, '2021-07-07 04:53:28', '2021-07-07 04:53:28'),
(14, 'Chantale Albert', 'Ut nihil labore sit', NULL, NULL, NULL, 'female', NULL, 'sanu@mailinator.com', '', 'b', 'Et deleniti aut aut', 'Neque aliqua Atque', 'Id veritatis deserun', 'Voluptates et ea eum', 'Aute alias delectus', 'Tempora laudantium', '', '', '', 'Pandora Barber', 'Est fuga Consequat', '367', 0, 4, NULL, '$2y$10$e4k19Q/8S23PjOzeWnMXsewsMs972jIevTe5Ocm2mlImyzAAOpnsG', NULL, '2021-07-07 04:59:08', '2021-07-07 04:59:08'),
(15, 'Brenna Roach', 'Maxime magni magna a', NULL, NULL, NULL, 'female', NULL, 'zakigybu@mailinator.com', '', 'b', 'Sequi quos fugiat qu', 'Officia omnis harum', 'Cillum proident nem', 'Qui ad doloribus cul', 'Ut quaerat perspicia', 'Fugiat natus blandi', '', '', '', 'Chaim Sosa', 'Irure fugiat aut con', '192', 0, 4, NULL, '$2y$10$4xRVL3e4zTexP4QW/MSHNObj.evkiMvGHyM1DlQ98n77sqQQTAOZ.', NULL, '2021-07-07 05:00:00', '2021-07-07 05:00:00'),
(16, 'Gavin Mullen', 'Libero facilis dolor', NULL, NULL, NULL, 'male', NULL, 'ryviwisula@mailinator.com', '', 'cd', 'Nihil minima et mole', 'Voluptatem Perspici', 'Alias beatae et mole', 'Enim rerum sint per', 'Iste lorem est quo s', 'Id rem cupidatat fug', '', '', '', 'Stone Hendricks', 'Quasi aut laborum I', '479', 0, 4, NULL, '$2y$10$xLHvUnMKV.PBH7AOdhAvvuUcL9sGLkouq5YO9.2SPXtcK.xobixoO', NULL, '2021-07-07 05:01:36', '2021-07-07 05:01:36'),
(17, 'Hayden Fulton', 'Voluptates ut et eiu', NULL, NULL, NULL, 'male', NULL, 'naqabosery@mailinator.com', '', 'b', 'Doloremque repudiand', 'Rerum non mollit vol', 'Ea obcaecati quibusd', 'Laudantium et nostr', 'Est quo ad molestia', 'Illum magni molesti', '', '', '', 'Yoko Kramer', 'Voluptas qui ratione', '725', 0, 4, NULL, '$2y$10$0NuDgzwKRTrJgmtwRUUEoeJ86bUl7h6m6klEKDuEK/e4JCKKp/VMa', NULL, '2021-07-07 05:04:12', '2021-07-07 05:04:12'),
(18, 'Autumn Donaldson', 'Corrupti quo molest', NULL, NULL, NULL, 'female', NULL, 'helu@mailinator.com', '1625341018.jpg', 'b', 'Tempora nihil nisi i', 'Omnis ad commodo par', 'Esse voluptatem fa', 'Enim at cupidatat el', 'Aperiam atque a maio', 'Dolorem laudantium', '1625341018.jpg', '1625341018.jpg', '1625341018.jpg', 'Berk Mccoy', 'Do a dolorem eligend', '699', 0, 2, NULL, '$2y$10$XsKKfIXRfHQ5Xj3hTwFECOVdg9ofQZ7L9HtECqVpMb9ZvqOW2FMhS', NULL, '2021-07-07 05:06:28', '2021-07-07 05:06:28'),
(19, 'Hoyt Morrow', 'Sit dolorum veniam', 'test', '3456789', NULL, 'female', NULL, 'timaq@mailinator.com', NULL, 'cp', 'Atque quia aspernatu', 'Occaecat non proiden', 'Molestiae facilis qu', 'Architecto magna sap', 'Eveniet dolorem est', 'Dolores est accusan', NULL, NULL, NULL, 'Slade Monroe', 'Aut ea voluptatem A', '697', 0, 3, NULL, '$2y$10$pTyJC8074SOtl0FYAgvty.sTiN5u.sihDAbgyhVRwShtFr6YlunRa', NULL, '2021-07-07 05:22:37', '2021-07-09 01:27:59'),
(20, 'tranier', 'tranier', NULL, '0000', NULL, 'male', NULL, 'usman@arco.com', '', 'cd', 'Quibusdam id sed mod', 'Libero maxime debiti', 'Laboris omnis minima', 'Omnis vel maiores qu', 'Sint elit aut mole', 'Minim consequatur si', '', '', '', 'Micah Mckay', 'Aute voluptas accusa', '430', 0, 2, NULL, '$2y$10$lSJEAhSk8n2G3NrOa62phu7CBPAZlkWQmdXPHIlSPwRCGmtTupVam', NULL, '2021-07-07 05:31:47', '2021-07-18 08:22:57'),
(21, 'Jennifer Holden', 'Optio excepteur tot', 'test', '12345678', NULL, 'female', NULL, 'abdulrazak@arco.com', NULL, 'cd', 'Nulla est harum offi', 'Libero quia aliquip', 'Quisquam in fuga In', 'Sed impedit delectu', 'Cupidatat mollit nos', 'Non et dolor consect', NULL, NULL, NULL, 'Odessa Moody', 'Minus eos omnis nequ', '561', 0, 3, NULL, '$2y$10$Clul5oO06.92.9270GHkX.Vqt8hpgL9fb2BPB2a6Xnv5iXVlXiCMy', NULL, '2021-07-07 05:32:54', '2021-07-09 01:28:24'),
(22, 'Diana Colon', 'Reprehenderit omnis', NULL, '+1 (873) 616-8245', '1985-10-16', 'male', 'Voluptates nesciunt', 'xymebyqyle@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '$2y$10$aYLDAM0QH7lmX1cKH.lbO.9VVrg89VBw4rlcjDQDZsBGb2Rfqrb4q', NULL, '2021-07-18 12:18:28', '2021-07-18 12:18:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diplomas`
--
ALTER TABLE `diplomas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `quesstions`
--
ALTER TABLE `quesstions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_needs`
--
ALTER TABLE `training_needs`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diplomas`
--
ALTER TABLE `diplomas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quesstions`
--
ALTER TABLE `quesstions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training_needs`
--
ALTER TABLE `training_needs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
