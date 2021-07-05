-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 05:34 PM
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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `firebase_id`, `name`, `image`, `email`, `Address`, `Phone`, `email_verified_at`, `password`, `type`, `isApproved`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'Hussein', NULL, 'hossamhassan@gmail.com', 'haram-giza', '01111111111', NULL, '$2y$10$Bdz/MiTTTWobdkXun/3x7eUjcgd8TSvKvvAHqq0LD/2XT.t2FX/BK', 0, 1, NULL, NULL, NULL),
(2, '', 'mai', NULL, 'maiqady@gmail.com', NULL, NULL, NULL, '$2y$10$OqgpSha9/nFcgAB/FuHbbuQdaQKSJ6hZDedLrukAKwWrSr66YiSTq', 0, 1, NULL, '2021-02-25 15:10:21', '2021-02-25 15:10:21'),
(5, '', 'dummy', NULL, 'test2@test.com', NULL, NULL, NULL, 'dummy', 0, 1, NULL, '2021-05-20 16:58:35', '2021-05-20 16:58:35'),
(6, '', 'test4', NULL, 'test4@test.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-06-04 14:36:40', '2021-06-04 14:36:40'),
(10, 'b85ab56958cb416f89da', 'test4', NULL, 'test4@test.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-06-06 14:47:49', '2021-06-06 14:47:49'),
(11, 'b85ab56958cb416f89da', 'test4admin', NULL, 'test4@test.com', NULL, NULL, NULL, '123456', 0, 1, NULL, '2021-06-06 22:11:32', '2021-06-06 22:11:32'),
(12, 'b85ab56958cb416f89da', 'test4admin', NULL, 'test4@test.com', NULL, NULL, NULL, '123456', 0, 1, NULL, '2021-06-07 08:41:41', '2021-06-07 08:41:41'),
(13, 'b85ab56958cb416f89da', 'test4admin', NULL, 'test4@test.com', NULL, NULL, NULL, '123456', 0, 1, NULL, '2021-06-07 09:29:09', '2021-06-07 09:29:09'),
(14, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-06-11 15:36:39', '2021-06-11 15:36:39'),
(15, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-01 12:46:24', '2021-07-01 12:46:24'),
(16, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-02 21:29:32', '2021-07-02 21:29:32'),
(17, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-02 22:45:32', '2021-07-02 22:45:32'),
(18, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-02 22:56:04', '2021-07-02 22:56:04'),
(19, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-02 22:57:52', '2021-07-02 22:57:52'),
(20, '4c447ce03fc644919d52', 'qwe', NULL, 'test4@test.com', NULL, NULL, NULL, '123', 0, 1, NULL, '2021-07-02 22:58:28', '2021-07-02 22:58:28'),
(21, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-03 10:29:09', '2021-07-03 10:29:09'),
(22, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-03 14:41:30', '2021-07-03 14:41:30'),
(23, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-04 17:16:54', '2021-07-04 17:16:54'),
(24, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-05 08:31:45', '2021-07-05 08:31:45'),
(25, '7bf423704dfd442ca445', 'omneya', NULL, 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-05 11:06:39', '2021-07-05 11:06:39'),
(26, '7bf423704dfd442ca445', 'omneya', '7bf423704dfd442ca445.jpg', 'omneya@gmail.com', NULL, NULL, NULL, '123456789', 0, 1, NULL, '2021-07-05 11:15:10', '2021-07-05 11:15:10');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
