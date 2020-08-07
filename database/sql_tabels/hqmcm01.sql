-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2020 at 08:52 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hqmcm01`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mosque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hqmcm_id` int(11) NOT NULL,
  `number_of_mosques` int(11) DEFAULT NULL,
  `number_of_teachers` int(11) DEFAULT NULL,
  `number_of_students` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `hqmcm_id`, `number_of_mosques`, `number_of_teachers`, `number_of_students`, `created_at`, `updated_at`) VALUES
(1, 'الشجاعية', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `area_admins`
--

CREATE TABLE `area_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hqmcm_id` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_admins`
--

INSERT INTO `area_admins` (`id`, `hqmcm_id`, `firstName`, `secondName`, `familyName`, `id_number`, `email`, `email_verified_at`, `password`, `phoneNumber`, `area`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 101, 'مشرف', 'منطقة', 'منطقة', 123456789, '1@1', NULL, '$2y$10$TjKOBcQx9dj.JnW52YKFxOKW7yfxQp2oi7JN2XoZYOxQEcjtfmhe2', 592231497, 'الشجاعية', NULL, '2020-08-02 09:03:20', '2020-08-02 09:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `daily_record`
--

CREATE TABLE `daily_record` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_hqmcm_id` int(11) NOT NULL,
  `attendance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `daily_recitations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_record`
--

INSERT INTO `daily_record` (`id`, `student_hqmcm_id`, `attendance`, `date`, `daily_recitations`, `created_at`, `updated_at`) VALUES
(1, 1010101, 'غائب', '2020-08-03', NULL, '2020-08-03 20:20:43', '2020-08-03 20:20:43'),
(2, 1010102, 'حاضر', '2020-08-03', '5<-1الفاتحة', '2020-08-03 20:22:25', '2020-08-03 20:22:25'),
(3, 1010101, 'حاضر', '2020-08-04', '20<-12القصص', '2020-08-03 21:02:30', '2020-08-03 21:02:30'),
(4, 1010101, 'لم يسمع', '2020-08-04', NULL, '2020-08-03 21:02:43', '2020-08-03 21:02:43'),
(5, 1010102, 'حاضر', '2020-08-04', '2<-3يوسف', '2020-08-03 22:18:11', '2020-08-03 22:18:11'),
(6, 1010103, 'حاضر', '2020-08-04', '12<-6الرعد', '2020-08-03 22:26:31', '2020-08-03 22:26:31'),
(7, 1010103, 'حاضر', '2020-08-04', '12<-6الحجر', '2020-08-03 22:26:47', '2020-08-03 22:26:47'),
(8, 1010101, 'حاضر', '2020-08-04', '50<-21الرعد', '2020-08-04 11:05:57', '2020-08-04 11:05:57'),
(9, 1010103, 'حاضر', '2020-08-04', '15<-12إبراهيم', '2020-08-04 11:08:35', '2020-08-04 11:08:35'),
(10, 1010103, 'حاضر', '2020-08-04', '100<-55النحل', '2020-08-04 11:10:57', '2020-08-04 11:10:57'),
(11, 1010102, 'حاضر', '2020-08-04', '30<-12التوبة', '2020-08-04 11:11:09', '2020-08-04 11:11:09'),
(12, 1010101, 'لم يسمع', '2020-08-04', NULL, '2020-08-04 11:11:14', '2020-08-04 11:11:14'),
(13, 1010103, 'حاضر', '2020-08-04', '48<-14إبراهيم', '2020-08-04 11:23:24', '2020-08-04 11:23:24'),
(14, 1010101, 'حاضر', '2020-08-04', '222<-15الحجر', '2020-08-04 11:23:37', '2020-08-04 11:23:37'),
(15, 1010104, 'غائب', '2020-08-04', NULL, '2020-08-04 11:25:46', '2020-08-04 11:25:46'),
(16, 1010105, 'حاضر', '2020-08-04', '30<-2إبراهيم', '2020-08-04 11:26:04', '2020-08-04 11:26:04'),
(17, 1010104, 'حاضر', '2020-08-04', '30<-5النساء', '2020-08-04 11:26:17', '2020-08-04 11:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hqmcm_id` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mosque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher` int(11) DEFAULT NULL,
  `number_of_students` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `hqmcm_id`, `area`, `mosque`, `teacher`, `number_of_students`, `created_at`, `updated_at`) VALUES
(1, 10101, 'الشجاعية', 'المحكمة', 10102, 6, NULL, '2020-08-02 10:39:09');

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
(147, '2014_10_12_000000_create_users_table', 1),
(148, '2014_10_12_100000_create_password_resets_table', 1),
(149, '2019_08_19_000000_create_failed_jobs_table', 1),
(150, '2020_07_17_183619_create_students_table', 1),
(151, '2020_07_17_183708_create_teachers_table', 1),
(152, '2020_07_17_183828_create_area_admins_table', 1),
(153, '2020_07_17_183911_create_mosque_admins_table', 1),
(154, '2020_07_19_000910_create_mosques_table', 1),
(155, '2020_07_19_000929_create_areas_table', 1),
(156, '2020_07_20_223038_create_admins_table', 1),
(158, '2020_07_26_144012_create_groups_table', 2),
(162, '2020_08_02_143344_create_users_daily_record', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mosques`
--

CREATE TABLE `mosques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hqmcm_id` int(11) NOT NULL,
  `mosque_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_teachers` int(11) DEFAULT NULL,
  `number_of_students` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mosques`
--

INSERT INTO `mosques` (`id`, `name`, `area`, `hqmcm_id`, `mosque_admin`, `number_of_teachers`, `number_of_students`, `created_at`, `updated_at`) VALUES
(1, 'المحكمة', 'الشجاعية', 101, 'محمد', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mosque_admins`
--

CREATE TABLE `mosque_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hqmcm_id` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mosque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mosque_admins`
--

INSERT INTO `mosque_admins` (`id`, `hqmcm_id`, `firstName`, `secondName`, `familyName`, `id_number`, `email`, `email_verified_at`, `password`, `phoneNumber`, `area`, `mosque`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 10101, 'مشرف', 'مشرف', 'مسجد', 12345678, '2@2', NULL, '$2y$10$oHhknHS2fGAHf1KweOTML.qc0fUlCxO8wsXfwSQg5zdiazylQbs82', 59614174, 'الشجاعية', 'المحكمة', NULL, '2020-08-02 09:05:02', '2020-08-02 09:05:02');

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hqmcm_id` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mosque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `hqmcm_id`, `firstName`, `secondName`, `familyName`, `id_number`, `email`, `email_verified_at`, `password`, `phoneNumber`, `area`, `mosque`, `group`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1010101, 'طالب', 'طالب', 'طالب', 2198441, '4@4', NULL, '$2y$10$8VeFs6knOykcEJPisU4s5OPKb8s6iiyCkmW/VxK9fKAJlckkXX4lS', 21365487, 'الشجاعية', 'المحكمة', '10101', NULL, '2020-08-02 09:09:08', '2020-08-02 09:09:08'),
(2, 1010102, 'طالب2', 'طالب2', 'طالب2', 6543218, '5@5', NULL, '$2y$10$0C33hcqAyjs3gMlo1QGXgeUDVw2t5tUsx6J.kwSrQ.CIfvVVBDlIG', 213654, 'الشجاعية', 'المحكمة', '10101', NULL, '2020-08-02 10:28:57', '2020-08-02 10:28:57'),
(3, 1010103, 'طالب3', 'طالب3', 'طالب3', 2165843, '6@6', NULL, '$2y$10$.GHtYo8/0XOQhteG.laX9.zVKMsPIKdSWQ5jqrGZrOCt5fCQBHUWW', 5884645, 'الشجاعية', 'المحكمة', '10101', NULL, '2020-08-02 10:36:00', '2020-08-02 10:36:00'),
(5, 1010104, 'طالب4', 'طالب3', 'طالب4', 216843, '7@7', NULL, '$2y$10$29G0XObIZz0/YXPNLtMp9ekpu2VJV6Am6EqSZVhO0FbY5yMR7HE/6', 5884645, 'الشجاعية', 'المحكمة', '10101', NULL, '2020-08-02 10:38:06', '2020-08-02 10:38:06'),
(7, 1010105, 'طالب5', 'طالب3', 'طالب5', 21683, '8@8', NULL, '$2y$10$wwvrx6edHLSCHqcI7OtqPeWpXGSg.yghaER/lDtrsRZQApE9nn4Yq', 5884645, 'الشجاعية', 'المحكمة', '10101', NULL, '2020-08-02 10:39:09', '2020-08-02 10:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hqmcm_id` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mosque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `hqmcm_id`, `firstName`, `secondName`, `familyName`, `id_number`, `email`, `email_verified_at`, `password`, `phoneNumber`, `area`, `mosque`, `group`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 10102, 'محفظ', 'محفظ', 'محفظ', 2531648, '3@3', NULL, '$2y$10$kHi8Xv4gmc1U/IkflWmVlOSOogA2GeOYnc3/K2rG5u4EKJ5cANvRy', 3148769, 'الشجاعية', 'المحكمة', '10101', NULL, '2020-08-02 09:06:30', '2020-08-02 09:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `hqmcm_id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mosque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `hqmcm_id`, `firstName`, `secondName`, `familyName`, `id_number`, `email`, `email_verified_at`, `password`, `phoneNumber`, `area`, `mosque`, `group`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 101, 'مشرف', 'منطقة', 'منطقة', 123456789, '1@1', NULL, '$2y$10$HYQHTwQW3Sgnkc3eio8zLOM8jFtgcj7uYkuBL6u2uQuB3y5Jrtrue', 592231497, 'الشجاعية', NULL, NULL, 'area_admin', NULL, '2020-08-02 09:03:20', '2020-08-02 09:03:20'),
(2, 10101, 'مشرف', 'مشرف', 'مسجد', 12345678, '2@2', NULL, '$2y$10$mXkQ27SO7AVAKUUkIAm32u6HzPG3ebB2AJCprAYnr5v.VOAH1Muba', 59614174, 'الشجاعية', 'المحكمة', NULL, 'mosque_admin', NULL, '2020-08-02 09:05:02', '2020-08-02 09:05:02'),
(3, 10102, 'محفظ', 'محفظ', 'محفظ', 2531648, '3@3', NULL, '$2y$10$38.iyxcVkF41/nlcX/YNu.W7vSfT.rmodze/4RRmnGThHrua9qmbG', 3148769, 'الشجاعية', 'المحكمة', '10101', 'teacher', NULL, '2020-08-02 09:06:30', '2020-08-02 09:06:30'),
(4, 1010101, 'طالب', 'طالب', 'طالب', 2198441, '4@4', NULL, '$2y$10$cm8tt3WbrcVFXfKZQ3IK9.4pQZUzJmHGJXurT0cnPmuNsdqJZtHYG', 21365487, 'الشجاعية', 'المحكمة', 'معاذ', 'student', NULL, '2020-08-02 09:09:09', '2020-08-02 09:09:09'),
(5, 1010102, 'طالب2', 'طالب2', 'طالب2', 6543218, '5@5', NULL, '$2y$10$Fd//iol1Yga/ODBPTqvNhemal1DDVa.nLX/XBBVSXEX7/1.Bzkivm', 213654, 'الشجاعية', 'المحكمة', '10101', 'student', NULL, '2020-08-02 10:28:57', '2020-08-02 10:28:57'),
(6, 1010105, 'طالب3', 'طالب3', 'طالب3', 21683, '8@8', NULL, '$2y$10$dAyzw829XySR2teH9Ofbc.80mL3Ub.mmr2UmcynjfpP9EXcNaaB1O', 5884645, 'الشجاعية', 'المحكمة', '10101', 'student', NULL, '2020-08-02 10:39:09', '2020-08-02 10:39:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_hqmcm_id_unique` (`hqmcm_id`);

--
-- Indexes for table `area_admins`
--
ALTER TABLE `area_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `area_admins_hqmcm_id_unique` (`hqmcm_id`),
  ADD UNIQUE KEY `area_admins_id_number_unique` (`id_number`);

--
-- Indexes for table `daily_record`
--
ALTER TABLE `daily_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_hqmcm_id_unique` (`hqmcm_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mosques`
--
ALTER TABLE `mosques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mosques_hqmcm_id_unique` (`hqmcm_id`);

--
-- Indexes for table `mosque_admins`
--
ALTER TABLE `mosque_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mosque_admins_hqmcm_id_unique` (`hqmcm_id`),
  ADD UNIQUE KEY `mosque_admins_id_number_unique` (`id_number`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_hqmcm_id_unique` (`hqmcm_id`),
  ADD UNIQUE KEY `students_id_number_unique` (`id_number`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_hqmcm_id_unique` (`hqmcm_id`),
  ADD UNIQUE KEY `teachers_id_number_unique` (`id_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id_number_unique` (`id_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area_admins`
--
ALTER TABLE `area_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daily_record`
--
ALTER TABLE `daily_record`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `mosques`
--
ALTER TABLE `mosques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mosque_admins`
--
ALTER TABLE `mosque_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
