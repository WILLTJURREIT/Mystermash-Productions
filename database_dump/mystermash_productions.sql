-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2025 at 03:23 AM
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
-- Database: `mystermash_productions`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `media` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `media`, `created_at`) VALUES
(3, 2, 'testing', '1233', NULL, '2025-12-18 05:41:52'),
(4, 2, 'testing-again33', '123433', NULL, '2025-12-18 05:43:02'),
(6, 1, 'hello', 'testing 12345', NULL, '2025-12-21 01:01:16'),
(7, 1, 'Be Kind', 'we should all do one kind deed per day!', NULL, '2025-12-21 03:45:27'),
(8, 1, 'I will test another post here right now', 'testing 1234567 well see if this works.', NULL, '2025-12-21 04:33:00'),
(9, 1, 'Coding', 'Test the POST to be sure we land back on the correct dashboard. now that I have altered the design i am fixing the links.', NULL, '2025-12-21 04:41:34'),
(10, 4, 'Hi my name is Brent', 'I am posting here for the first time to test out the functionality.', NULL, '2025-12-21 06:35:43'),
(11, 1, 'Hi I am making another post', 'Dummy data, to show my websites functionality', NULL, '2025-12-21 06:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `quote_text` text NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote_text`, `author`, `created_at`, `is_active`) VALUES
(1, 'It is what it is!', 'Mystermash', '2025-12-21 03:33:22', 0),
(2, 'When the Homework is tough, but it has to get done, Never give up!', 'Mystermash', '2025-12-21 05:54:26', 1),
(3, 'Every day is a sunny day!', 'me', '2025-12-21 06:42:53', 0),
(4, 'Never take advice from a rock!', NULL, '2025-12-23 02:21:03', 0),
(5, 'never take advice from a rock!!!', 'Mystermash', '2025-12-23 02:21:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `title`, `description`, `video_url`, `created_at`) VALUES
(2, 'MYSTERMASH YOUTUBE VIDEO TEST 1', 'Testing 1', 'https://youtube.com/embed/RdwNqm1My3U', '2025-12-19 21:27:00'),
(3, 'TEST 2', 'BLAH', 'https://youtube.com/embed/RdwNqm1My3U', '2025-12-20 00:11:22'),
(4, 'TEST 3', 'BLAH', 'https://www.youtube.com/embed/X_XstF8WbsI', '2025-12-20 00:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `created_at`) VALUES
(1, 'Admin', 'admin@example.com', '$2y$10$JgQrMBjncwms/lF0DEDQgOcUk.NaOC/qTMCBMOpHAu9EIZuTD/uk6', 'admin', 'active', '2025-11-26 23:16:36'),
(2, 'john', 'bing@example.ca', '$2y$10$3Y8faFeI3wjm9nVOlJHXW.mQeajq6zYrFwJjqkIUX7fdC4mI2A61i', 'user', 'active', '2025-12-17 16:52:55'),
(4, 'Brent', 'brent@example.com', '$2y$10$u29tcIdi4CykgiaEisS2juPI8ZK8HwncDFrRom4wIUsrYNLjN9rAG', 'user', 'active', '2025-12-21 06:34:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_user` (`user_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
