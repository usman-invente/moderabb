-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 10:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_price` double(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `certificate_price` double(8,2) NOT NULL,
  `course_image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `course_id`, `course_title`, `course_price`, `start_date`, `certificate_price`, `course_image`, `ip_address`, `created_at`, `updated_at`) VALUES
(3, 5, 'Et nisi tempore acc', 964.00, '1976-01-16', 698.00, '1626456172.jpg', '127.0.0.1', '2021-07-21 09:31:28', '2021-07-21 09:31:28');

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
(2, 1, '?????????????? ?????????????????? ????????????????', '1625316455.jpg', '2021-07-03 07:47:35', '2021-07-03 07:47:35'),
(3, 1, '?????????? ?????????? ?????????? ?????????????? ???????? ???????????????? ??????', '1625316479.jpg', '2021-07-03 07:47:59', '2021-07-03 07:47:59'),
(4, 1, '?????????? ???????????????? ????????????', '1625316510.jpg', '2021-07-03 07:48:30', '2021-07-03 07:48:30'),
(5, 1, '?????????????? ??????????????????', '1625316535.jpg', '2021-07-03 07:48:55', '2021-07-03 07:48:55'),
(6, 1, '?????????????? ????????????????', '1625316563.jpg', '2021-07-03 07:49:23', '2021-07-03 07:49:23'),
(7, 1, '?????????????? ??????????????', '1625316586.jpg', '2021-07-03 07:49:46', '2021-07-03 07:49:46'),
(8, 1, '?????????? ????????????????', '1625317312.jpg', '2021-07-03 08:01:52', '2021-07-03 08:01:52');

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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 11, '14', '16', '7', '1', 'Explicabo Omnis ist', 'Et at animi volupta', 'Aliquip adipisci err', '268', NULL, '588', NULL, '2011-11-09', '1971-10-16', 'Animi et vel ea dol', 'Recusandae Ratione', 'Dolorem ut quia exce', 'Sed amet doloribus', NULL, '1', '0', '0', '1', '0', '1', 'Tenetur occaecat und.dd', 'Quis ipsa, similique.dd', 'Deserunt proident, m.d', 'Nam irure tempora co.dd', 'Quae error adipisici.d', 'embed', 'dssd', NULL, 'Corrupti commodods op', 'Voluptas sunt qui e', 'Ex unde optio volup', '2021-07-13 12:36:40', '2021-07-13 12:36:40'),
(4, 11, '15', '16', '7', '1', 'Ab dolorem ut repreh', 'Fugiat dignissimos i', 'Commodo anim esse ac', '82', '1626199538.png', '145', '1626199538.jpg', '2008-08-25', '1980-09-30', 'Deserunt proident q', 'Laudantium est sit', 'Nostrud placeat con', 'Voluptatibus dolor a', NULL, '1', '1', '1', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, 'upload', NULL, 'D:\\xampp\\tmp\\php902.tmp', 'Deserunt ipsum nemo', 'Pariatur Consequunt', 'Ut at similique est', '2021-07-13 13:05:38', '2021-07-13 13:05:38'),
(5, 11, '15', '16', '7', 'Sync', 'Et nisi tempore acc', 'et-nisi-tempore-acc', 'Quisquam enim nulla', '964', '1626456172.jpg', '698', '1626456172.jpg', '1976-01-16', '1980-01-29', 'Est aliquid volupta', 'Sunt enim in nemo eu', 'Cupiditate animi vo', 'Vel odio sed sint il', NULL, '1', '1', '1', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, 'upload', NULL, 'D:\\xampp\\tmp\\php648F.tmp', 'Velit iusto similiqu', 'Natus est facere pla', 'Tempor commodi aliqu', '2021-07-16 12:22:52', '2021-07-16 12:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `course_reviews`
--

CREATE TABLE `course_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `check_list` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_reviews`
--

INSERT INTO `course_reviews` (`id`, `course_id`, `user_id`, `check_list`, `review`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 5, 0, '3', 'ee', 'wewe', 'ewewe@gmail.com', '2021-07-24 07:04:32', '2021-07-24 07:04:32'),
(2, 5, 11, '2', 'erere', 'rerere', 'usman.traximtech@gmail.com', '2021-07-24 08:55:50', '2021-07-24 08:55:50'),
(3, 5, 11, '2', 'erere', 'rerere', 'usman.traximtech@gmail.com', '2021-07-24 08:55:50', '2021-07-24 08:55:50');

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
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `downloadable_files` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_audio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(18, '2021_07_17_185902_create_carts_table', 7),
(19, '2021_07_11_174606_create_schedules_table', 8),
(20, '2021_07_13_060315_create_tests_table', 8),
(21, '2021_07_13_080846_create_taxes_table', 8),
(22, '2021_07_14_054847_create_coupons_table', 8),
(23, '2021_07_15_101828_create_quesstions_table', 8),
(24, '2021_01_24_205114_create_paytabs_invoices_table', 9),
(25, '2021_07_24_111455_create_course_reviews_table', 10);

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
-- Table structure for table `paytabs_invoices`
--

CREATE TABLE `paytabs_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_code` int(10) UNSIGNED NOT NULL,
  `pt_invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` int(10) UNSIGNED DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_first_six_digits` int(10) UNSIGNED DEFAULT NULL,
  `card_last_four_digits` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quesstions`
--

CREATE TABLE `quesstions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainee_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '1', 'test', '8', 'test', 'test', 'test', '2021-07-03 10:27:58', '2021-07-03 11:15:30');

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
  `roll_id` int(11) DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_academic_degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ibn_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `title`, `c_person`, `telephone`, `dob`, `sex`, `country`, `email`, `avatar_location`, `academic_rank`, `nationality`, `country_of_residence`, `facbook`, `twitter`, `linkedin`, `roll_id`, `instagram`, `passport`, `photo_academic_degree`, `cv`, `bank_name`, `bank_country`, `ibn_number`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Caleb', NULL, 'Dorsey', '+1 (608) 462-2783', NULL, NULL, NULL, 'bubezaro@mailinator.com', '1625341018.jpg', NULL, NULL, 'Qui dolore asperiores quis autem', 'Laboriosam temporibus ipsum veniam sint quam porro', 'Sed soluta aute ex officiis molestias qui proident eum nisi qui nisi magna consequatur iure officiis', 'Maiores pariatur Ullamco velit voluptatem praesentium magni at sed autem sunt aut nemo labore eius', NULL, 'Eum fugiat et quae consectetur id ut consequatur nemo quia quaerat', NULL, NULL, NULL, 'Iona Shaw', 'Optio magni eius libero ex consequuntur molestias provident quia tempora', '927', 1, NULL, '$2y$10$cJoCzEe6uDJ6wUXP1K5WzOKHIZDyBlRigc4y8g.jgnPhPLvmVwcJ2', NULL, '2021-07-03 14:10:38', '2021-07-03 14:40:08'),
(11, 'Muhammad Usmna', 'Muhammad Usmna', NULL, '+1', '2021-07-18', 'male', 'PK', 'usman.traximtech@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$ukp7OTZwoa4Vis/BZks8XetJ0HapSeEg0Z71EeqMs.n.pcEG32WFG', NULL, '2021-07-05 13:02:38', '2021-07-05 13:02:38'),
(14, 'Eden', 'Marshall', NULL, '+1 (298) 749-1701', NULL, 'male', NULL, 'buzajiz@mailinator.com', '', 'b', 'Illum harum ipsam molestiae ex ea mollit dolore qui reprehenderit officia', 'Culpa dicta iure qui commodi ab', 'Itaque cupiditate pariatur Velit optio quod voluptas', 'Eaque nihil distinctio Sed perferendis sit non', 'Quae non est rerum provident placeat', 2, 'Voluptates id eaque non ea qui facilis vel ipsam mollit cum fugiat obcaecati', '1626021793.png', '1626021793.png', '1626021793.pdf', 'Robin Conley', 'Est reprehenderit voluptates laudantium officiis est ex quam velit ut similique qui impedit', '25', 1, NULL, '$2y$10$8FnaBNlf2dWOMsH2sZJQb.CvG9YyCj1MOjlHYKcm/dIMktp4/.5re', NULL, '2021-07-11 11:43:14', '2021-07-11 11:43:14'),
(15, 'Amir', 'Harvey', NULL, '+1 (701) 577-8017', NULL, 'male', NULL, 'poxigyx@mailinator.com', '', 'm', 'Obcaecati enim facilis dolores ut optio adipisci debitis sint', 'Consectetur illum in itaque eos nostrum assumenda id proident quod vel sint quaerat dolor voluptates cupidatat', 'Proident repudiandae nesciunt adipisicing enim rem officia enim', 'Sit sed at voluptatem numquam', 'Velit et amet corporis praesentium necessitatibus aliqua Explicabo Sint delectus impedit', 2, 'Vel voluptates sunt ad consectetur porro perspiciatis rerum', '1626021888.png', '1626021888.png', '1626021888.pdf', 'Evan Burt', 'Itaque doloribus tempora quis eum laboriosam alias aute adipisci aliqua', '873', 1, NULL, '$2y$10$cH595UvbmFL4YMqaVlHA3eqLb6yDqrM5gO39WDSTq2.1EZUrysZH.', NULL, '2021-07-11 11:44:48', '2021-07-11 11:44:48'),
(16, 'Quail', NULL, 'Hickman', '+1 (595) 826-4946', NULL, NULL, NULL, 'poso@mailinator.com', NULL, NULL, NULL, '144', 'Voluptate aut quisquam ipsum molestiae molestiae repudiandae', 'In aute eos ipsam quo corporis natus quia qui sit itaque suscipit eum odit repudiandae qui quia ea quo dolorum', 'Exercitation cillum architecto sed doloremque corrupti amet quaerat', 3, 'Ea asperiores dicta eum alias aut deserunt reiciendis ea dolorum ducimus', NULL, NULL, NULL, 'Geraldine Maldonado', 'Ex fugit enim culpa eiusmod minima corrupti ea officiis aliquid ut tempor labore reiciendis qui voluptatem', '195', 1, NULL, '$2y$10$K6LdG7exlQoI1LV3gyDs.OwSw76gs.ech30.KiMLxZIde8pT6Zl0m', NULL, '2021-07-13 12:34:47', '2021-07-13 12:34:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `course_reviews`
--
ALTER TABLE `course_reviews`
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
-- Indexes for table `paytabs_invoices`
--
ALTER TABLE `paytabs_invoices`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_reviews`
--
ALTER TABLE `course_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paytabs_invoices`
--
ALTER TABLE `paytabs_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quesstions`
--
ALTER TABLE `quesstions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_needs`
--
ALTER TABLE `training_needs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
