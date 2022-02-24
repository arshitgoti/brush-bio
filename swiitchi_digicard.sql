-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2021 at 12:23 PM
-- Server version: 10.3.31-MariaDB-cll-lve
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swiitchi_digicard`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_13_180322_create_user_portfolio_urls_table', 1),
(5, '2021_08_13_191728_create_user_calls_table', 1),
(6, '2021_08_13_193548_create_user_whatsapps_table', 1),
(7, '2021_08_13_200514_create_user_sms_table', 1),
(8, '2021_08_13_203407_create_user_emails_table', 1),
(9, '2021_08_16_081215_create_user_social_urls_table', 1),
(10, '2021_08_16_085317_create_user_bios_table', 1),
(11, '2021_08_28_080322_create_user_galleries_table', 1),
(12, '2021_08_28_082151_create_user_exhibitions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kevin.mobileapps2019@gmail.con', '$2y$10$RmoL8/Ve139DKBYpYW0QZu2fG6urLpHI/gAmT9vlHqxeJT8dNgE4y', '2021-10-01 14:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_artist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_work` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `profile_pic`, `cv`, `dob`, `phone_number`, `website`, `instagram`, `type_of_artist`, `address_work`, `country`, `password`, `slug`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Keyur', 'Patel', 'k@k.com', 'user_profile_pics/2/photo-1535713875002-d1d0cf377fde.jpg', 'user_cvs/2/sample-1.pdf', '2021-10-13', '+354123456790', NULL, NULL, 'Calligraphers', 'Work:;;;;;6035 AK;', NULL, '$2y$10$v.2O9jSBt/ThOVjhLpIwhe33v738avfeYsWZiB9E4ENP/h8h6S/ne', '101', NULL, NULL, '2021-10-01 13:18:19', '2021-10-16 11:14:04', NULL),
(3, 'K', 'P', 'kevin.mobileapps2019@gmail.con', NULL, '', NULL, 'Cndnkdjd', NULL, NULL, 'Painter', '', '', '$2y$10$neZm2wL3nU/0KtOr.zGdBe1G1tapfUiNk3sw1srxB1j6itegWlGxy', '102', NULL, NULL, '2021-10-01 14:07:14', '2021-10-01 14:23:27', NULL),
(4, 'divyang', 'dodiya', 'divyangkumardodiya@gmail.com', NULL, '', NULL, '+919724593798', NULL, NULL, 'Painter', '', '', '$2y$10$ImFslIfBQ4QWuZozNgB4jOorIHCVKXK9ThAr/3ViM.vI4lrKUto5.', 'divyang-dodiya', NULL, NULL, '2021-10-01 15:42:20', '2021-10-01 17:10:22', NULL),
(5, '', '', 'hellohello@digivcardnewuser.com', NULL, '', NULL, '', '', '', '', '', '', '', 'hellohello', NULL, NULL, '2021-10-01 17:03:24', '2021-10-01 17:03:24', NULL),
(6, '', '', 'hellohello1@digivcardnewuser.com', NULL, '', NULL, '', '', '', '', '', '', '', 'hellohello1', NULL, NULL, '2021-10-01 17:03:47', '2021-10-01 17:03:47', NULL),
(7, 'K', 'P', 'k1@k.com', NULL, '', NULL, '9924769236', NULL, NULL, 'Painter', '', '', '$2y$10$C2bRTRkDkriZTsP4xb4CcOJtoZ7p/P.ejpDSVtCIksuH6AUj8jkhm', '152', NULL, NULL, '2021-10-01 17:24:17', '2021-10-01 17:25:24', NULL),
(8, '', '', 'paulpretzer@digivcardnewuser.com', NULL, '', NULL, '', '', '', '', '', '', '', 'paulpretzer', NULL, NULL, '2021-10-02 17:52:11', '2021-10-02 17:52:11', NULL),
(9, '', '', 'paul@digivcardnewuser.com', NULL, '', NULL, '', '', '', '', '', '', '', 'paul', NULL, NULL, '2021-10-02 18:31:32', '2021-10-02 18:31:32', NULL),
(10, 'Paul', 'Pretzer', 'paulpretzerstudio@gmail.com', NULL, '', '1981-11-05', '+4917670776575', 'www.paulpretzer.com', 'paulpretzer', 'Painter', '', '', '$2y$10$fU1Xy4slVbr5NoivCw0GN.g5YO1FxSL2moc0T9i0X6YN5MAdpV1Ku', 'royockers', NULL, NULL, '2021-10-02 18:41:46', '2021-10-03 12:56:34', NULL),
(11, '', '', 'mohit1234@digivcardnewuser.com', NULL, '', NULL, '', '', '', '', '', '', '', 'mohit1234', NULL, NULL, '2021-10-04 10:00:29', '2021-10-04 10:00:29', NULL),
(12, 'Roy', 'Ockers', 'ro@dndjdjd.nl', 'user_profile_pics/12/383ca64e-24cc-4eb8-9e05-0f1ddbe081f1.jpeg', '', '2014-10-04', '+31626940950', 'Www.nu.nl', '@royockers', 'Painter', 'Work:;;Lemmenhoek 16;Ospel;Limburg;6035ak;The Netherlands', 'The Netherlands', '$2y$10$AWgCDnvpRnToU4jICMNSzuyWr3ACYYgT9606KCDR8aKUmS3m9x0tm', 'roytest', NULL, NULL, '2021-10-04 14:32:43', '2021-10-04 14:56:48', NULL),
(13, '', '', '1215@digivcardnewuser.com', NULL, '', NULL, '', '', '', '', '', '', '', '1215', NULL, NULL, '2021-10-04 14:51:40', '2021-10-04 14:51:40', NULL),
(14, '', '', 'james@digivcardnewuser.com', NULL, '', NULL, '', '', '', '', '', '', '', 'james', NULL, NULL, '2021-10-04 19:42:12', '2021-10-04 19:42:12', NULL),
(15, '', '', 'jamesroy@digivcardnewuser.com', NULL, '', NULL, '', '', '', '', '', '', '', 'jamesroy', NULL, NULL, '2021-10-04 19:42:30', '2021-10-04 19:42:30', NULL),
(16, 'Frans', 'Smit', 'info@artistcloseup.com', 'user_profile_pics/16/c408f552-8234-4043-a43a-9c8c87a15b60.webp', '', '1985-12-05', '0626940950', 'Www.franssmitart.com', 'Franssmitart', 'Painter', 'Work:;;;;;;', NULL, '$2y$10$wonC11wNQTs./To63IsSkez1sbeq7VwWnuztjALUo5oLL3HbpWA4C', 'franssmit', NULL, NULL, '2021-10-05 12:06:48', '2021-10-05 12:18:55', NULL),
(17, '1001', '1001', '1001@gmail.com', NULL, '', NULL, '+911122344556', NULL, 'test1001', 'Painter', '', '', '$2y$10$CjEF8Mx9gHqk.5HSW9N.yuwnMkieR6GHQhS8U3zYCnvnDDjO2rXGW', '1001', NULL, NULL, '2021-10-14 23:59:59', '2021-10-15 00:04:25', NULL),
(18, '1002', '1002', '1002@gmail.com', NULL, '', NULL, '+911002210022', NULL, 'test1002', 'Painter', '', '', '$2y$10$b99.LjrVmcHQgzorbwMVIeKFoKiWQUPAJ.i.Xbqq8M8cnqyWZHsxe', '1002', NULL, NULL, '2021-10-15 00:14:38', '2021-10-15 00:16:50', NULL),
(19, '1003', '1003', '1003@gmail.com', NULL, '', NULL, '+911003310033', NULL, '1003', 'Painter', '', '', '$2y$10$zUKDd1dyX/vfzOx9FH8XvuEQ261Dvz1IbV7Xcs2TIROxeNEQsr7qO', '1003', NULL, NULL, '2021-10-15 00:17:17', '2021-10-15 00:28:35', NULL),
(20, '1004', '1004', '1004@gmail.com', NULL, '', NULL, '+911004410044', NULL, 'test1004', 'Painter', '', '', '$2y$10$JzhQgO9ClC3DIwyhO4VXQ.jBmuMQ9x9QZTEY3Clk0ewP5Tk3dJMCy', '1004', NULL, NULL, '2021-10-15 00:32:09', '2021-10-15 00:33:49', NULL),
(21, 'test', '1005', '1005@gmail.com', NULL, '', NULL, '+911005510055', NULL, 'test1005', 'Painter', '', '', '$2y$10$aGF8z6xemULAXc0W/2bL9eQ/YSdm7k6NZCnjR6xLtp3G7.EnA5L1q', '1005', NULL, NULL, '2021-10-15 00:37:00', '2021-10-15 00:37:40', NULL),
(22, 'Keyur', 'Patel', 'k1@k1.com', NULL, '', NULL, '099247 69236', NULL, 'abcinsta', 'Painter', '', '', '$2y$10$Drt6lvXiskELq8Tq5bPAKu.lS4JGTTUfN6pu5B2JXAvAdwk11J6fW', '105', NULL, NULL, '2021-10-16 11:19:09', '2021-10-16 11:25:02', NULL),
(23, '1006', '1006', '1006@gmail.com', NULL, '', NULL, '+911006610066', NULL, '1006', 'Painter', 'Work:;;;;;;Andorra', 'Andorra', '$2y$10$TFZX171WNGMZG8HkfiI8Ae9dsrZfkpZVO.QFYwwCUOFkkWS7wHV.G', '1006', NULL, NULL, '2021-10-16 15:34:41', '2021-10-16 19:59:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_bios`
--

CREATE TABLE `user_bios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `bio_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_bios`
--

INSERT INTO `user_bios` (`id`, `user_id`, `bio_content`, `created_at`, `updated_at`) VALUES
(2, 12, 'Hallo nu name is rou \r\n\r\nDjdjdjdjddj\r\nDjdjdjdjdjddjdjdjdjdjdk\r\n\r\nDjdjdjd', '2021-10-04 14:40:08', '2021-10-04 14:40:08'),
(3, 2, '12354\r\n\r\ns', '2021-10-04 14:46:49', '2021-10-11 12:42:00'),
(4, 4, 'Test', '2021-10-04 14:54:10', '2021-10-04 14:54:10'),
(5, 16, 'The captivating paintings of South African born artist Frans Smit reimagine the Old Masters and bring them back to life by boldly contrasting them with modern techniques. This carefully balanced meeting of current and traditional media on the canvas allows the artist to formulate a new visual language that reaches both into the past and the future.', '2021-10-05 12:18:27', '2021-10-05 12:18:27'),
(6, 22, 'testtsett', '2021-10-16 11:25:48', '2021-10-16 11:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_calls`
--

CREATE TABLE `user_calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `call` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_emails`
--

CREATE TABLE `user_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_exhibitions`
--

CREATE TABLE `user_exhibitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `exhibition_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'upcoming, past',
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_exhibitions`
--

INSERT INTO `user_exhibitions` (`id`, `user_id`, `start_date`, `end_date`, `exhibition_name`, `gallery_name`, `website`, `type`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-10-01', '2021-10-03', NULL, 'ABC Gallery', 'https://google.com', 'upcoming', 'dfdfdfdfdfdaddress', '2021-10-01 13:33:36', '2021-10-11 13:04:30'),
(3, 2, '2021-10-03', '2021-10-06', 'Exe2', 'AB Gallery', 'https://google.com', 'upcoming', 'dfvfsddf', '2021-10-01 13:34:07', '2021-10-01 13:34:07'),
(4, 2, '2021-10-07', '2021-10-09', 'Exe1', 'Gal1', 'http://www.abc.com', 'past', '11 Ahm', '2021-10-01 13:34:34', '2021-10-11 13:14:51'),
(5, 2, '2021-10-29', '2021-10-31', 'past2', 'My Gallery', 'https://google.com', 'past', 'dfdfd', '2021-10-01 13:34:50', '2021-10-01 13:34:50'),
(6, 2, '2021-09-30', '2021-10-28', 'curr exe', 'AB Gallery', 'http://www.abc.com', 'current', 'ddfdfd', '2021-10-01 13:35:45', '2021-10-01 13:35:45'),
(7, 2, '2021-10-01', '2021-10-13', 'current exe1', 'apapdf', 'http://www.abc.com', 'current', 'sdfsd', '2021-10-01 13:36:02', '2021-10-01 13:36:02'),
(8, 16, '2021-10-12', '2021-10-05', 'Spedalone', 'Artsit', 'http://nu.com', 'upcoming', 'Lemmenhoek 16\r\n53049\r\nMontefollonico', '2021-10-05 12:26:47', '2021-10-05 12:30:02'),
(9, 2, '2021-10-13', '2021-10-13', 'test', 'gaql', NULL, 'upcoming', NULL, '2021-10-11 11:59:54', '2021-10-11 12:00:52'),
(10, 2, NULL, NULL, NULL, NULL, NULL, 'upcoming', NULL, '2021-10-11 13:01:28', '2021-10-11 13:01:28'),
(11, 2, NULL, NULL, NULL, NULL, NULL, 'upcoming', NULL, '2021-10-11 13:03:53', '2021-10-11 13:03:53'),
(12, 2, NULL, NULL, NULL, NULL, NULL, 'upcoming', NULL, '2021-10-11 13:04:08', '2021-10-11 13:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_galleries`
--

CREATE TABLE `user_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_galleries`
--

INSERT INTO `user_galleries` (`id`, `user_id`, `name`, `link`, `address`, `postal_code`, `city`, `country`, `email`, `phone`, `website`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test gallery', '', 'admin', '123', 'test', 'test', 'test@test.com', '+911234512345', 'https://exampl.eomc', NULL, '2021-09-29 08:20:03', '2021-09-29 08:38:41'),
(2, 2, '121 gallery', '', '12', 'aaa', 'Ahmedabad', 'India', 'k@k.com', '+919898989898', 'google.com', 'abc', '2021-10-01 13:25:59', '2021-10-11 13:25:02'),
(3, 2, 'Gallery2', '', '2', '380070', 'Surat', 'India', 'gallery2@test.com', '+919898989989', 'www.abccc.com', '232', '2021-10-01 13:28:57', '2021-10-01 13:28:57'),
(5, 2, 'gallery3', '', 'east', '380060', 'Rajkot', 'India', 'test@test.com', '+109924769236', 'www.abccc.com', 'instauser', '2021-10-01 17:13:21', '2021-10-01 17:13:21'),
(6, 2, 'New Gallery', '', 'fddfd', '380060', 'Ahmedabad', 'India', 'test@test.com', '+121312158465465', 'http://www.abc.com', 'df', '2021-10-01 17:21:53', '2021-10-01 17:21:53'),
(7, 16, 'Recollection gallery', '', 'Via del Pianello 33', '53049', 'Montefollonico', 'Italy', 'roy@thedge.nl', '+10626940950', 'Http://Www.gallery.com', 'Royockers', '2021-10-05 12:24:07', '2021-10-05 12:24:07'),
(8, 16, 'Gallery 2', '', 'Lemmenhoek', '6035', 'Ospel', 'The Netherlands', 'info@gallery.com', '+10626940950', 'Www.nu.nl', 'Strvenb', '2021-10-05 12:25:53', '2021-10-05 12:25:53'),
(9, 2, 'dfdd', '', NULL, 'dfd', 'dfd', 'dfd', '2434@DDFDFD.COM', '+1343434', '111', NULL, '2021-10-11 12:53:30', '2021-10-11 12:53:30'),
(10, 2, 'TEST', '', NULL, '131313', 'DFDFD', 'IN', 'ETRE@FGDF.COM', '+11123132132', 'GOOGLE.COM', NULL, '2021-10-11 12:54:53', '2021-10-11 12:54:53'),
(11, 2, 'My Gallery', '', '12 iSquare Corporate\r\nAhmedabad\r\nGujarat', '380058', 'Ahmedabd', 'India', 'fdfd@dfdfc.com', '+132323', NULL, NULL, '2021-10-11 13:28:34', '2021-10-11 13:30:18'),
(12, 4, 'Test gallery', '', 'testing gallery', '123456', 'test', 'test', 'test@test.com', '+919724593798', 'test.com', 'test', '2021-10-14 21:22:58', '2021-10-14 21:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_portfolio_urls`
--

CREATE TABLE `user_portfolio_urls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_portfolio_urls`
--

INSERT INTO `user_portfolio_urls` (`id`, `user_id`, `title`, `url`, `created_at`, `updated_at`) VALUES
(2, 2, 'Portfolio1', 'https://google.com', '2021-10-01 13:28:05', '2021-10-01 13:28:05'),
(3, 2, 'Portfolio2', 'https://google.com', '2021-10-01 13:28:05', '2021-10-01 13:28:05'),
(4, 12, 'Website', 'http://www.nu.nl', '2021-10-04 15:25:57', '2021-10-04 15:25:57'),
(5, 12, 'Newsletter djdjdjdjdjdjdjddjfjdjdjf', 'http://www.nu.com', '2021-10-04 15:25:57', '2021-10-04 15:25:57'),
(6, 22, 'ffdfdfd', 'https://www.dff.com', '2021-10-16 11:31:11', '2021-10-16 11:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_sms`
--

CREATE TABLE `user_sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `sms` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_social_urls`
--

CREATE TABLE `user_social_urls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_is_featured` tinyint(1) DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `linkedin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `snapchat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat_is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `youtube` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `behance` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behance_is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `whatsapp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `skype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype_is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_social_urls`
--

INSERT INTO `user_social_urls` (`id`, `user_id`, `facebook`, `facebook_is_featured`, `twitter`, `twitter_is_featured`, `linkedin`, `linkedin_is_featured`, `instagram`, `instagram_is_featured`, `snapchat`, `snapchat_is_featured`, `youtube`, `youtube_is_featured`, `behance`, `behance_is_featured`, `whatsapp`, `whatsapp_is_featured`, `skype`, `skype_is_featured`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, NULL, 1, NULL, 0, NULL, 1, NULL, 0, NULL, 0, NULL, 0, 'divyangdodiya', 1, 'divyangdodiya', 0, '2021-09-29 07:52:29', '2021-09-29 08:10:51'),
(2, 2, '101', 1, '101', 1, 'keyur-koradiya', 0, '101', 1, NULL, 0, '101', 0, '101', 0, '101', 1, '101', 0, '2021-10-01 13:27:24', '2021-10-06 17:13:46'),
(3, 12, 'Royockers', 1, 'Royockers', 1, 'Royockers', 0, NULL, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 1, NULL, 0, '2021-10-04 15:00:13', '2021-10-04 15:00:13'),
(4, 12, 'Royockers', 1, NULL, 1, NULL, 0, 'Royockers', 1, NULL, 0, NULL, 0, NULL, 0, '0626940950', 1, NULL, 0, '2021-10-04 15:21:44', '2021-10-04 15:21:44'),
(5, 4, NULL, 1, NULL, 1, NULL, 0, NULL, 1, NULL, 0, NULL, 0, NULL, 0, '+919724512345', 1, NULL, 0, '2021-10-14 22:13:20', '2021-10-14 22:18:27'),
(6, 20, NULL, NULL, NULL, 0, NULL, 0, NULL, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2021-10-15 00:33:49', '2021-10-15 00:33:49'),
(7, 21, NULL, NULL, NULL, 0, NULL, 0, 'test1005', 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2021-10-15 00:37:40', '2021-10-15 00:37:40'),
(8, 22, NULL, NULL, NULL, 0, NULL, 0, 'abcinsta', 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2021-10-16 11:25:02', '2021-10-16 11:25:02'),
(9, 23, NULL, NULL, NULL, 0, NULL, 0, '1006', 1, NULL, 0, NULL, 0, NULL, 0, '+911006610066', 1, NULL, 0, '2021-10-16 15:41:00', '2021-10-16 15:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_whatsapps`
--

CREATE TABLE `user_whatsapps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `whatsapp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user_bios`
--
ALTER TABLE `user_bios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_calls`
--
ALTER TABLE `user_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_emails`
--
ALTER TABLE `user_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_exhibitions`
--
ALTER TABLE `user_exhibitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_galleries`
--
ALTER TABLE `user_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_portfolio_urls`
--
ALTER TABLE `user_portfolio_urls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sms`
--
ALTER TABLE `user_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_social_urls`
--
ALTER TABLE `user_social_urls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_whatsapps`
--
ALTER TABLE `user_whatsapps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_bios`
--
ALTER TABLE `user_bios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_calls`
--
ALTER TABLE `user_calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_emails`
--
ALTER TABLE `user_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_exhibitions`
--
ALTER TABLE `user_exhibitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_galleries`
--
ALTER TABLE `user_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_portfolio_urls`
--
ALTER TABLE `user_portfolio_urls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sms`
--
ALTER TABLE `user_sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_social_urls`
--
ALTER TABLE `user_social_urls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_whatsapps`
--
ALTER TABLE `user_whatsapps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
