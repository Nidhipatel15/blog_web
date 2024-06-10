-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 05:38 PM
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
-- Database: `blog_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `password`, `gender`) VALUES
(21, 'PATEL NIDHI RAJESHBHAI ', 'np15@gmail.com', '$2y$10$qDv5xumy6MRW8zXu0MevIOfg32rRpO1CKFfuUmZ.4doL.AF0FMnza', 'Female'),
(22, 'Nidhi  Patel', 'nidhipatel1502@gmail.com', '$2y$10$s6gcCPJDeXzRuA2PIYwHk.spXWOn8TmAboexLUfWkY.kzVc7NmiFC', 'Female'),
(23, 'PATEL NIDHI RAJESHBHAI ', 'nidhi12@gmail.com', '$2y$10$jP742z1pdyDVvW6UKH8Vg.PWcqtnl7QURBn.HVQrYZarQQVmqHmXW', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `published_at` timestamp NULL DEFAULT NULL,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `excerpt` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `author_id`, `created_at`, `updated_at`, `published_at`, `status`, `excerpt`, `featured_image`, `meta_title`, `meta_description`) VALUES
(1, 'Sample Title', 'This is the content of the post.', 1, '2024-06-01 06:30:00', '2024-06-05 12:15:36', '2024-06-01 06:30:00', 'published', 'This is an excerpt of the post.', 'C:\\xampp\\htdocs\\bloging_web\\blog1.png', 'Sample Meta Title', 'Sample meta description for the post.'),
(2, 'Sample Blog Post', 'This is the content of the blog post.', 14, '2024-06-05 12:11:25', '2024-06-05 16:42:42', NULL, 'published', 'This is a sample excerpt.', 'https://toppng.com/uploads/preview/circled-user-female-skin-type-4-icon-pro-icon-115534084504dcnr2bmdl.png', 'Sample Meta Title', 'Sample meta description for SEO purposes.'),
(3, 'Sample Blog Post', 'This is the content of the blog post.', 17, '2024-06-05 12:17:39', '2024-06-10 15:35:16', NULL, 'published', 'This is a sample excerpt.', '/blog1.png', 'Sample Meta Title', 'Sample meta description for SEO purposes.'),
(4, 'Sample Blog Post', 'This is the content of the blog post.', 22, '2024-06-06 12:07:08', '2024-06-06 12:07:08', NULL, 'published', 'This is a sample excerpt.', 'C:/xampp/htdocs/bloging_web/blog1.png', 'Sample Meta Title', 'Sample meta description for SEO purposes.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
