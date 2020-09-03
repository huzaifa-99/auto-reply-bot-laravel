-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 12:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_reply_bot`
--

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asked_by` int(10) UNSIGNED NOT NULL,
  `subject` int(10) UNSIGNED NOT NULL,
  `releated_to` int(11) DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `replied_at` timestamp NULL DEFAULT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `question`, `asked_by`, `subject`, `releated_to`, `answer`, `created_at`, `updated_at`, `replied_at`, `read`) VALUES
(224, 'I need Help regarding C++', 5, 4, NULL, 'We dont have an answer to this question now,but we will soon reply you.', '2020-09-01 17:21:31', '2020-09-01 17:21:53', NULL, 1),
(225, NULL, 5, 4, NULL, 'In Regards To Your Question \" I need Help regarding C++ \" Posted Earlier On 2020-09-01 10:21:30 ,we have a reply for you \" Yes, How may we help you? \".', '2020-09-01 17:22:38', '2020-09-01 17:22:38', NULL, 0);

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
(70, '2014_10_12_000000_create_users_table', 1),
(71, '2014_10_12_100000_create_password_resets_table', 1),
(72, '2019_08_19_000000_create_failed_jobs_table', 1),
(73, '2020_02_12_050404_add_title_to_users_table', 1),
(74, '2020_02_12_051441_create_messages_table', 1),
(75, '2020_02_23_054504_add_read_to_messages', 1),
(76, '2020_02_25_151632_create_subjects_table', 1),
(77, '2020_02_27_072114_create_questions_table', 1),
(78, '2020_03_01_113429_create_newquestions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newquestions`
--

CREATE TABLE `newquestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asked_by_userId` int(10) UNSIGNED NOT NULL,
  `asked_by_userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('testuser010@gmail.com', '$2y$10$fh6mX0mDZQf98Hi9f7Kc5O5EQKJuOEXysYiz6r7iQ0TJTtqAQMvwK', '2020-09-01 17:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `uploaded_by_admin` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject`, `question`, `answer`, `is_active`, `uploaded_by_admin`, `created_at`, `updated_at`) VALUES
(67, 4, 'I need Help regarding C++', 'Yes, How may we help you?', 1, 7, '2020-09-01 17:22:38', '2020-09-01 17:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `registered_by_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://via.placeholder.com/150'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `is_active`, `registered_by_admin`, `created_at`, `updated_at`, `profile_image`) VALUES
(1, 'Physics', 1, 'Cleo Feest', '2020-02-27 03:01:22', '2020-03-02 12:31:04', 'http://via.placeholder.com/150'),
(2, 'Biology', 1, 'Amelia Wisoky III', '2020-02-27 03:01:22', '2020-03-02 00:43:05', 'http://via.placeholder.com/150'),
(3, 'Chemistry', 1, 'Jacynthe Predovic DDS', '2020-02-27 03:01:22', '2020-03-02 00:43:08', 'http://via.placeholder.com/150'),
(4, 'C++', 1, 'Oma Kilback', '2020-02-27 03:01:22', '2020-02-27 11:13:53', 'http://via.placeholder.com/150'),
(5, 'Java', 1, 'Ottilie Yundt', '2020-02-27 03:01:22', '2020-02-27 03:01:22', 'http://via.placeholder.com/150'),
(6, 'Python', 1, 'Belle Farrell I', '2020-02-27 03:01:22', '2020-02-27 03:01:22', 'http://via.placeholder.com/150'),
(7, 'Php', 1, 'Prof. Dakota Schultz PhD', '2020-02-27 03:01:22', '2020-02-27 03:01:22', 'http://via.placeholder.com/150'),
(8, 'C', 1, 'Lulu Bode', '2020-02-27 03:01:22', '2020-02-27 03:01:22', 'http://via.placeholder.com/150'),
(9, 'C#', 1, 'Marcos Bergstrom', '2020-02-27 03:01:22', '2020-02-27 03:01:22', 'http://via.placeholder.com/150'),
(10, 'Javacript', 1, 'Camryn Fisher', '2020-02-27 03:01:23', '2020-02-27 03:01:23', 'http://via.placeholder.com/150'),
(11, 'Data science', 1, 'huzaifa99', '2020-03-02 00:36:59', '2020-03-02 00:42:27', 'http://via.placeholder.com/150'),
(12, 'Artifical Intelligence', 1, 'huzaifa99', '2020-03-02 01:09:14', '2020-03-02 01:09:14', 'http://via.placeholder.com/150'),
(13, 'Data Analysis', 1, 'huzaifa99', '2020-03-02 12:31:17', '2020-03-02 12:31:17', 'http://via.placeholder.com/150');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `profile_image`, `is_admin`, `is_active`) VALUES
(8, 'testuser010', 'testuser010@gmail.com', NULL, '$2y$10$Ws6hlxOpSJNnEoIaNcLT9OTVRCgAF/0GtAFcCz9Su0IUEVYa3ylxm', NULL, '2020-09-01 17:28:57', '2020-09-01 17:28:57', NULL, NULL, 0, 1),
(9, 'testuser100', 'testuser100@gmail.com', NULL, '$2y$10$bL1MGsw6AD6Bt9RoHhGBEOHDIfl6grvevXfUuZLzg8hmyNmuwCxvu', NULL, '2020-09-01 17:29:26', '2020-09-01 17:29:26', NULL, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newquestions`
--
ALTER TABLE `newquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `newquestions`
--
ALTER TABLE `newquestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
