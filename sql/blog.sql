-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 08:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `link` varchar(225) DEFAULT NULL,
  `start` varchar(225) DEFAULT NULL,
  `end` varchar(225) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `owner_name`, `photo`, `link`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'amy moe', 'https://channelmyanmar.org/wp-content/uploads/2023/06/vipclubmm.gif', 'https://www.facebook.com/vipclubmm', '2024-02-01', '2024-02-28', '2024-02-15 06:26:29.242600', '2024-02-15 06:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `ordering` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `ordering`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'cele', 0, '5', '2024-02-15 06:12:15', '2024-02-15 06:12:15'),
(2, 'sport', 1, '5', '2024-02-15 07:06:34', '2024-02-15 07:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `category_id` varchar(225) DEFAULT NULL,
  `user_id` int(225) DEFAULT NULL,
  `created_at` varchar(225) NOT NULL DEFAULT current_timestamp(),
  `updated_at` int(225) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet', '&lt;p&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet con', '1', 5, '2024-02-15 12:55:32', 2147483647),
(2, 'urna, penatibus molestie etiam felis velit vehicu', '&lt;p&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Source Sans Pro&amp;quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet con', '2', 5, '2024-02-15 13:54:29', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `transitions`
--

CREATE TABLE `transitions` (
  `id` int(50) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transitions`
--

INSERT INTO `transitions` (`id`, `from_user`, `to_user`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 5, 4, 10, 'test', '2024-02-15 06:09:02', '2024-02-15 06:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(225) DEFAULT NULL,
  `money` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(225) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(225) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `money`, `created_at`, `updated_at`) VALUES
(1, 'Amy Moe', 'amymoe2321@gmail.com', 'password', '0', 0, '2024-02-15 11:09:19', '2024-02-15 11:09:19'),
(2, 'aaa', 'admin@gmail.com', '11111', '0', 0, '2024-02-15 11:11:20', '2024-02-15 11:11:20'),
(3, 'bfderg', 'aaaa@gmail.com', '$2y$10$wSa2XI0RxTsMi', '0', 0, '2024-02-15 11:41:51', '2024-02-15 11:41:51'),
(4, 'applicant01', 'aa@gmail.com', '$2y$10$YDuaPZ1R30eHG', '0', 10, '2024-02-15 11:59:28', '2024-02-15 11:59:28'),
(5, 'bbb', 'bb@gmail.com', '$2y$10$rIlHc.E.CQ7Eav7tskv8LOF5iodq9PxusAfj3mcGd3WckciJThkkW', '0', 90, '2024-02-15 12:01:24', '2024-02-15 12:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `viewers`
--

CREATE TABLE `viewers` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `post_id` int(50) NOT NULL,
  `device` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `viewers`
--

INSERT INTO `viewers` (`id`, `user_id`, `post_id`, `device`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-15 06:25:52', '2024-02-15 06:25:52'),
(2, 5, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', '2024-02-15 07:26:45', '2024-02-15 07:26:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transitions`
--
ALTER TABLE `transitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewers`
--
ALTER TABLE `viewers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transitions`
--
ALTER TABLE `transitions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `viewers`
--
ALTER TABLE `viewers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
