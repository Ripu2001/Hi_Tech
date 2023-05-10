-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 05:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hi_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image_path` text NOT NULL,
  `video_id` text NOT NULL,
  `mission_title` varchar(255) NOT NULL,
  `mission_desc` text NOT NULL,
  `vission_title` varchar(255) NOT NULL,
  `vission_desc` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `slug`, `description`, `image_path`, `video_id`, `mission_title`, `mission_desc`, `vission_title`, `vission_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'RMG workers block Sainik Club-Banani road after bus hits fellow', 'rmg-workers-block-sainik-club-banani-road-after-bus-hits-fellow', 'Ansari, who worked for many probe committees formed after fire and blast incidents', '16785361021_1604078483.jpg', 'ddd', 'Ansari, who worked for many probe committees formed after fire and blast incidents', 'Ansari, who worked for many probe committees formed after fire and blast incidents', 'Ansari, who worked for many probe committees formed after fire and blast incidents', 'Ansari, who worked for many probe committees formed after fire and blast incidents', 1, '2023-03-11 05:53:18', '2023-03-11 06:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `slug`, `description`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'What planning process needs?', 'what-planning-process-needs', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '16780227271_1604079615.jpg', 1, '2023-03-05 07:25:27', '2023-03-05 07:25:27'),
(2, 2, 'Announcing me stimulated continuing', 'announcing-me-stimulated-continuing', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '16780574712_1604079646.jpg', 1, '2023-03-05 17:04:31', '2023-03-05 17:04:31'),
(3, 4, 'Least their above going stand', 'least-their-above-going-stand', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '16780575363_1604079678.jpg', 1, '2023-03-05 17:05:36', '2023-03-05 17:05:36'),
(4, 1, 'Our operations worldwide have been neutral.', 'our-operations-worldwide-have-been-neutral', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '16780576264_1604079717.jpg', 1, '2023-03-05 17:07:06', '2023-03-05 17:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Development', 'development', NULL, 1, '2023-03-05 04:53:34', '2023-03-05 04:53:34'),
(2, 'Consulting', 'consulting', NULL, 1, '2023-03-05 04:54:13', '2023-03-05 04:54:13'),
(3, 'Finnace', 'finnace', NULL, 1, '2023-03-05 04:54:29', '2023-03-05 04:54:29'),
(4, 'Branding', 'branding', NULL, 1, '2023-03-05 04:54:43', '2023-03-05 05:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `value` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `title`, `slug`, `description`, `value`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Satisfiet Customers', 'satisfiet-customers', NULL, 233, NULL, 1, '2023-03-07 05:13:02', '2023-03-07 05:13:02'),
(2, 'Professional Agents', 'professional-agents', NULL, 89, NULL, 1, '2023-03-07 05:14:12', '2023-03-07 05:14:12'),
(3, 'Hour Support', 'hour-support', NULL, 49, NULL, 1, '2023-03-07 05:14:33', '2023-03-07 05:14:33'),
(4, 'Project Finished', 'project-finished', NULL, 2348, NULL, 1, '2023-03-07 05:15:08', '2023-03-07 05:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `slug`, `description`, `department`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Data Scientist', 'data-scientist', NULL, 'IT', 1, '2023-03-04 21:45:01', '2023-03-04 21:45:01'),
(3, 'Programmer', 'programmer', NULL, 'IT', 1, '2023-03-04 21:46:00', '2023-03-04 21:46:00'),
(4, 'Ui/Ux Designer', 'uiux-designer', NULL, 'IT', 1, '2023-03-04 21:46:44', '2023-03-04 21:46:44');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `category_id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'How long should a business plan be?', 'how-long-should-a-business-plan-be', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2023-03-09 23:57:59', '2023-03-09 23:57:59'),
(2, 1, 'Where do I start?', 'where-do-i-start', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2023-03-09 23:58:30', '2023-03-09 23:58:30'),
(3, 1, 'Why Would a Successful Entrepreneur Hire a Coach?', 'why-would-a-successful-entrepreneur-hire-a-coach', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2023-03-09 23:58:57', '2023-03-09 23:58:57'),
(4, 1, 'Do you give any offer for premium customer?', 'do-you-give-any-offer-for-premium-customer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, '2023-03-09 23:59:33', '2023-03-10 00:37:15'),
(6, 3, 'Is there a limit to the number of guests should plan in a day?', 'is-there-a-limit-to-the-number-of-guests-should-plan-in-a-day', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2023-03-10 00:00:19', '2023-03-10 00:00:19'),
(7, 4, 'Do I need a business plan?', 'do-i-need-a-business-plan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2023-03-10 00:00:49', '2023-03-10 00:00:49'),
(8, 1, 'Waht makes your financial projects special?', 'waht-makes-your-financial-projects-special', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2023-03-10 00:01:15', '2023-03-10 00:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tecnical', 'tecnical', NULL, 1, '2023-03-09 06:32:16', '2023-03-09 06:32:16'),
(3, 'Sales', 'sales', NULL, 1, '2023-03-09 23:52:50', '2023-03-09 23:52:50'),
(4, 'Marketing', 'marketing', NULL, 1, '2023-03-09 23:53:06', '2023-03-09 23:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `designation_id`, `name`, `slug`, `description`, `image_path`, `facebook`, `twitter`, `instagram`, `linkedin`, `email`, `phone`, `website`, `status`, `created_at`, `updated_at`) VALUES
(14, 2, 'Amir Bubhan', 'amir-bubhan', NULL, '1677998394-8_1604080775.jpg', 'https://www.facebook.com/?_rdc=2&_rdr', 'https://www.google.com/search?client=firefox-b-d&q=twitter', 'https://www.google.com/search?client=firefox-b-d&q=instagram', 'https://www.google.com/search?client=firefox-b-d&q=linkedin', 'example@mail.com', '+0123456789', 'https://www.prothomalo.com/', 1, '2023-03-05 00:39:54', '2023-03-05 00:39:54'),
(16, 3, 'Robick Rona', 'robick-rona', NULL, '1678000843-9_1604080735.jpg', 'https://www.facebook.com/?_rdc=2&_rdr', 'https://www.google.com/search?client=firefox-b-d&q=twitter', 'https://www.google.com/search?client=firefox-b-d&q=instagram', 'https://www.google.com/search?client=firefox-b-d&q=linkedin', 'example@mail.com', '+0123456789', 'https://www.prothomalo.com/', 1, '2023-03-05 01:20:43', '2023-03-05 01:20:43'),
(17, 4, 'Jessica Jones', 'jessica-jones', NULL, '1678000886-6_1604080689.jpg', 'https://www.facebook.com/?_rdc=2&_rdr', 'https://www.google.com/search?client=firefox-b-d&q=twitter', 'https://www.google.com/search?client=firefox-b-d&q=instagram', 'https://www.google.com/search?client=firefox-b-d&q=linkedin', 'ahmedripu1314@gmail.com', '+0123456789', 'https://www.prothomalo.com/', 1, '2023-03-05 01:21:26', '2023-03-05 01:21:26'),
(19, 3, 'Botania Joni', 'botania-joni', NULL, '1678000978-3_1604080603.jpg', 'https://www.facebook.com/?_rdc=2&_rdr', 'https://www.google.com/search?client=firefox-b-d&q=twitter', 'https://www.google.com/search?client=firefox-b-d&q=instagram', 'https://www.google.com/search?client=firefox-b-d&q=linkedin', 'example@mail.com', '+0123456789', 'https://www.prothomalo.com/', 1, '2023-03-05 01:22:58', '2023-03-05 01:22:58');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_04_013315_create_sliders_table', 2),
(7, '2023_03_04_105101_create_members_table', 3),
(8, '2023_03_05_021215_create_designations_table', 4),
(9, '2023_03_05_095929_create_blogs_table', 5),
(10, '2023_03_05_100001_create_blog_categories_table', 6),
(11, '2023_03_06_003255_create_pricings_table', 7),
(12, '2023_03_06_050044_create_services_table', 8),
(13, '2023_03_06_095322_create_portfolios_table', 9),
(14, '2023_03_06_100500_create_portfolio_categories_table', 10),
(15, '2023_03_06_101058_create_portfolio_category_table', 11),
(16, '2023_03_06_142212_create_counters_table', 12),
(17, '2023_03_07_105928_create_counters_table', 13),
(18, '2023_03_09_112342_create_faqs_table', 14),
(19, '2023_03_09_112603_create_faq_categories_table', 14),
(20, '2023_03_10_103450_create_abouts_table', 15),
(21, '2023_03_10_103755_create_why_choose_us_table', 15),
(22, '2023_03_11_021044_create_testimonials_table', 16),
(23, '2023_03_11_054654_create_work_processes_table', 17),
(24, '2023_03_11_065544_create_socials_table', 18),
(25, '2023_03_11_120940_create_settings_table', 19),
(26, '2023_03_12_070146_create_partners_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(500) NOT NULL,
  `link` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `logo`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, '1678607231clients-1_1604081500.png', 'https://www.prothomalo.com/', 1, '2023-03-12 01:47:11', '2023-03-12 01:47:11'),
(3, '1678607308clients-2_1604081536.png', 'https://www.thedailystar.net/', 1, '2023-03-12 01:48:28', '2023-03-12 01:48:28'),
(4, '1678607345clients-3_1604081554.png', 'https://www.kalerkantho.com/', 1, '2023-03-12 01:49:05', '2023-03-12 01:49:05'),
(6, '1678609308clients-4_1604081593.png', 'https://bangla.bdnews24.com/', 1, '2023-03-12 02:21:48', '2023-03-12 02:21:48');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ahmedripu1314@gmail.com', '$2y$10$to780GjVSn38xjQfwM8uI./lV2GMYPNNmybR/hnFrC5DbAjCrJLde', '2023-03-12 19:37:05');

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
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image_path` text NOT NULL,
  `video_id` text NOT NULL,
  `link` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `slug`, `description`, `image_path`, `video_id`, `link`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Data Scientist', 'data-scientist', 'ddd', '16786238895_1604078920.jpg', 'ddd', 'https', 1, '2023-03-12 05:13:02', '2023-03-12 06:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Development', 'development', NULL, 1, '2023-03-07 21:04:32', '2023-03-07 21:04:32'),
(2, 'Consulting', 'consulting', NULL, 1, '2023-03-07 21:04:51', '2023-03-07 21:04:51'),
(3, 'Finance', 'finance', NULL, 1, '2023-03-07 21:05:05', '2023-03-07 21:05:05'),
(4, 'Branding', 'branding', NULL, 1, '2023-03-07 21:05:24', '2023-03-07 21:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_category`
--

CREATE TABLE `portfolio_category` (
  `portfolio_id` int(11) NOT NULL,
  `portfolio_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricings`
--

CREATE TABLE `pricings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `old_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `duration` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricings`
--

INSERT INTO `pricings` (`id`, `title`, `slug`, `description`, `price`, `old_price`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 'basic', '[\"Demo file\",\"Update\",\"File compressed\",\"Commercial use\",\"Support\",\"2 database\",\"Documetation\"]', '12.00', '0.00', 'Year', 1, '2023-03-05 20:36:59', '2023-03-05 20:36:59'),
(2, 'Regular', 'regular', '[\"Demo file\",\"5 database\",\"Documetation\",\"Commercial use\",\"Support\",\"Update\"]', '29.00', '0.00', 'Year', 1, '2023-03-05 20:38:47', '2023-03-05 20:38:47'),
(4, 'Extended', 'extended', '[\"Commercial use\",\"Demo file\",\"Support\",\"Documetation\",\"12 database\",\"File compressed\"]', '79.00', '0.00', 'Year', 1, '2023-03-05 21:22:13', '2023-03-05 21:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Investment Planning Investment Planning', 'investment-planning-investment-planning', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1678083959-1_1604082987.jpg', 1, '2023-03-06 00:25:59', '2023-03-06 00:25:59'),
(2, 'Mutual Funds Mutual Funds', 'mutual-funds-mutual-funds', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1678084020-2_1604082936.jpg', 1, '2023-03-06 00:27:00', '2023-03-06 00:27:00'),
(3, 'Markets Research Markets Research', 'markets-research-markets-research', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1678084071-5_1604078517.jpg', 1, '2023-03-06 00:27:51', '2023-03-06 00:27:51'),
(4, 'Report Analysis Report Analysis', 'report-analysis-report-analysis', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1678084133-1_1604078483.jpg', 1, '2023-03-06 00:28:53', '2023-03-06 00:28:53'),
(5, 'Research Managment', 'research-managment', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1678084222-4_1604083036.jpg', 1, '2023-03-06 00:30:22', '2023-03-06 00:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `logo_path` text DEFAULT NULL,
  `favicon_path` text DEFAULT NULL,
  `phone_one` varchar(50) DEFAULT NULL,
  `phone_two` varchar(50) DEFAULT NULL,
  `email_one` varchar(255) DEFAULT NULL,
  `email_two` varchar(255) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL,
  `contact_mail` varchar(255) DEFAULT NULL,
  `office_hours` varchar(255) DEFAULT NULL,
  `google_map` varchar(255) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `custom_css` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `logo_path`, `favicon_path`, `phone_one`, `phone_two`, `email_one`, `email_two`, `contact_address`, `contact_mail`, `office_hours`, `google_map`, `footer_text`, `custom_css`, `status`, `created_at`, `updated_at`) VALUES
(1, 'RMG workers block Sainik Club-Banani road after bus hits fellow', 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.', '1678591566logo_1636317292.png', '1678591539favicon_1636317292.png', '+880123123123', '+880123456789', 'example@mail.com', 'example@mail.com', 'Mirpur, Dhaka', 'ahmedripu1314@gmail.com', 'Monday to Friday 9:00am - 6:00pm', 'https://goo.gl/maps/m6kHFhxY17TnxFUq5', NULL, '.subscribe-section h2 {\r\n  position: relative;\r\n  color: #fff;\r\n  font-size: 24px;\r\n  font-weight: 700;\r\n  line-height: 1.2em;\r\n}', 1, '2023-03-11 20:35:07', '2023-03-11 23:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `btn_link` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `slug`, `description`, `image_path`, `btn_link`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Multipurpose business solution', 'multipurpose-business-solution', 'We are Providing Best Business Service. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1677916851_17_1604077844.jpg', 'http://127.0.0.1:8000/admin/slider/create', 1, '2023-03-04 02:00:51', '2023-03-04 02:00:51'),
(8, 'Include more sales', 'include-more-sales', 'make unique planning for your business. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nContact Us Read More\r\nMore convenient than others\r\n\r\nFind Value And Build confidence. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nContact Us\r\nMultipurpose business solution\r\n\r\nWe are Providing Best Business Service. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nContact Us Read More\r\nInclude more sales\r\n\r\nmake unique planning for your business. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nContact Us Read More', '1677916917_16_1604077919.jpg', 'http://127.0.0.1:8000/admin/slider/create', 1, '2023-03-04 02:01:57', '2023-03-04 02:01:57'),
(9, 'More convenient than others', 'more-convenient-than-others', 'e are Providing Best Business Service. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nContact Us Read More\r\nInclude more sales\r\n\r\nmake unique planning for your business. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nContact Us Read More\r\nMore convenient than others\r\n\r\nFind Value And Build confidence. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nContact Us\r\nMultipurpose business solution\r\n\r\nWe are Providing Best Business Service. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nContact Us Read More\r\nInclude more sales\r\n\r\nmake unique planning for your business. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nContact Us Read More', '1677916967_6_1604077959.jpg', 'http://127.0.0.1:8000/admin/slider/create', 1, '2023-03-04 02:02:47', '2023-03-04 02:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `pinterest` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `instagram`, `linkedin`, `skype`, `whatsapp`, `youtube`, `pinterest`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', 'https://www.linkedin.com', 'https://www.skype.com', '01640383662', 'https://www.youtube.com', 'https://www.pinterest.com', '2023-03-11 04:31:10', '2023-03-11 04:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `image_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `slug`, `designation`, `organization`, `description`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Nathan Junior', 'nathan-junior', 'CEO', 'HI-tech Parks', 'After every fire and blast incidents, all fingers are pointed at the building and factory owners. Experts, however, say the government agencies responsible for looking after the safety of establishments should be held equally accountable for their failure to monitor those.\r\n\r\nThey say that holding government officials responsible for such incidents is crucial to improving the situation.', '1678513159-5_1604081941.jpg', 1, '2023-03-10 23:02:22', '2023-03-10 23:39:19'),
(4, 'Jonathon Abhi', 'jonathon-abhi', 'devloper', 'HI-tech Parks', 'There are 54 agencies under 11 ministries to ensure governance in the capital, and if they do not carry out their duties properly, the city would remain vulnerable to such disasters, experts warned.\r\n\r\n\"After an incident, we only blame the owners of a building or a factory. But the government agencies must be held responsible,\" Mehedi Ahmed Ansari, professor of civil engineering at Bangladesh University of Engineering and Technology, told The Daily Star yesterday.\r\n\r\nAnsari, who worked for many probe committees formed after fire and blast incidents, said he didn\'t see a single incident of a government agency being held responsible.', '1678513405-7_1604082015.jpg', 1, '2023-03-10 23:42:49', '2023-03-10 23:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ripu', 'ahmedripu1314@gmail.com', NULL, '$2y$10$hW8yh1/JhPP.bmUp5MKqj.g0BC9zqMpsEIMExRDYOdjCJsnMrtIAG', NULL, '2023-03-03 00:45:51', '2023-03-12 19:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `title`, `slug`, `description`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Audit & Assurance', 'audit-assurance', NULL, NULL, 1, '2023-03-10 05:27:53', '2023-03-10 05:27:53'),
(2, 'Best Advisors', 'best-advisors', NULL, NULL, 1, '2023-03-10 05:28:39', '2023-03-10 05:28:39'),
(3, '24/7 Supports', '247-supports', NULL, NULL, 1, '2023-03-10 05:28:53', '2023-03-10 05:28:53'),
(4, 'Dedicated Team', 'dedicated-team', NULL, NULL, 1, '2023-03-10 05:29:08', '2023-03-10 05:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `work_processes`
--

CREATE TABLE `work_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_processes`
--

INSERT INTO `work_processes` (`id`, `title`, `slug`, `description`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Analize', 'analize', 'We utilizes creative and customized methods that tailor our work to the client environment to maximize results.', NULL, 1, '2023-03-11 00:31:38', '2023-03-11 00:31:38'),
(2, 'Advise', 'advise', 'Find out when where business needs to go and how to get there – real progress is made.', NULL, 1, '2023-03-11 00:32:05', '2023-03-11 00:32:05'),
(3, 'Strategy', 'strategy', 'We deliver business results via hands-on execution and leading teams through complex change.', NULL, 1, '2023-03-11 00:32:33', '2023-03-11 00:32:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `abouts_title_unique` (`title`),
  ADD UNIQUE KEY `abouts_slug_unique` (`slug`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_title_unique` (`title`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_title_unique` (`title`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `counters_title_unique` (`title`),
  ADD UNIQUE KEY `counters_slug_unique` (`slug`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_title_unique` (`title`),
  ADD UNIQUE KEY `designations_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_title_unique` (`title`),
  ADD UNIQUE KEY `faqs_slug_unique` (`slug`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faq_categories_title_unique` (`title`),
  ADD UNIQUE KEY `faq_categories_slug_unique` (`slug`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portfolios_title_unique` (`title`),
  ADD UNIQUE KEY `portfolios_slug_unique` (`slug`);

--
-- Indexes for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portfolio_categories_title_unique` (`title`),
  ADD UNIQUE KEY `portfolio_categories_slug_unique` (`slug`);

--
-- Indexes for table `pricings`
--
ALTER TABLE `pricings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pricings_title_unique` (`title`),
  ADD UNIQUE KEY `pricings_slug_unique` (`slug`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_title_unique` (`title`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_title_unique` (`title`),
  ADD UNIQUE KEY `sliders_slug_unique` (`slug`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testimonials_title_unique` (`title`),
  ADD UNIQUE KEY `testimonials_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `why_choose_us_title_unique` (`title`),
  ADD UNIQUE KEY `why_choose_us_slug_unique` (`slug`);

--
-- Indexes for table `work_processes`
--
ALTER TABLE `work_processes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `work_processes_title_unique` (`title`),
  ADD UNIQUE KEY `work_processes_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pricings`
--
ALTER TABLE `pricings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_processes`
--
ALTER TABLE `work_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
