-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 12:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_db`
--

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
(4, '2021_02_21_205015_create_users_table', 1),
(5, '2021_02_21_205649_create_users_table', 2),
(6, '2014_10_12_000000_create_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firebase_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `isApproved` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firebase_id`, `name`, `email`, `Address`, `Phone`, `email_verified_at`, `password`, `type`, `isApproved`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'Hussein', 'hossamhassan@gmail.com', 'haram-giza', '01111111111', NULL, '$2y$10$Bdz/MiTTTWobdkXun/3x7eUjcgd8TSvKvvAHqq0LD/2XT.t2FX/BK', 0, 1, NULL, NULL, NULL),
(2, '', 'mai', 'maiqady@gmail.com', NULL, NULL, NULL, '$2y$10$OqgpSha9/nFcgAB/FuHbbuQdaQKSJ6hZDedLrukAKwWrSr66YiSTq', 0, 1, NULL, '2021-02-25 15:10:21', '2021-02-25 15:10:21'),
(5, '', 'dummy', 'test2@test.com', NULL, NULL, NULL, 'dummy', 0, 1, NULL, '2021-05-20 16:58:35', '2021-05-20 16:58:35'),
(6, '', 'test4', 'test4@test.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-06-04 14:36:40', '2021-06-04 14:36:40'),
(10, 'b85ab56958cb416f89da', 'test4', 'test4@test.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-06-06 14:47:49', '2021-06-06 14:47:49'),
(11, 'b85ab56958cb416f89da', 'test4admin', 'test4@test.com', NULL, NULL, NULL, '123456', 0, 1, NULL, '2021-06-06 22:11:32', '2021-06-06 22:11:32'),
(12, 'b85ab56958cb416f89da', 'test4admin', 'test4@test.com', NULL, NULL, NULL, '123456', 0, 1, NULL, '2021-06-07 08:41:41', '2021-06-07 08:41:41'),
(13, 'b85ab56958cb416f89da', 'test4admin', 'test4@test.com', NULL, NULL, NULL, '123456', 0, 1, NULL, '2021-06-07 09:29:09', '2021-06-07 09:29:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
