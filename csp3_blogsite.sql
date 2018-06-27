-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2018 at 12:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csp3_blogsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_statuses`
--

CREATE TABLE `accounts_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts_statuses`
--

INSERT INTO `accounts_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'active', '2018-06-17 18:41:47', '2018-06-17 18:41:47'),
(2, 'inactive', '2018-06-17 18:47:04', '2018-06-17 18:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `status_id`, `author_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'Great', 1, 1, 2, '2018-06-19 19:27:37', '2018-06-19 19:27:37'),
(2, 'Great', 1, 1, 2, '2018-06-19 19:28:34', '2018-06-19 19:28:34'),
(3, 'Amazing', 1, 1, 2, '2018-06-19 20:28:31', '2018-06-19 20:28:31'),
(4, 'Amazing', 1, 1, 2, '2018-06-19 20:29:19', '2018-06-19 20:29:19'),
(5, 'Amazing', 1, 1, 2, '2018-06-19 20:30:23', '2018-06-19 20:30:23'),
(6, 'Amazing', 1, 1, 2, '2018-06-19 20:32:22', '2018-06-19 20:32:22'),
(7, 'Amazing', 1, 1, 2, '2018-06-19 20:39:41', '2018-06-19 20:39:41'),
(8, 'Hi', 1, 1, 2, '2018-06-19 20:47:32', '2018-06-19 20:47:32'),
(9, 'Nice', 1, 1, 2, '2018-06-19 20:51:16', '2018-06-19 20:51:16'),
(10, 'Hey', 1, 1, 2, '2018-06-19 21:08:02', '2018-06-19 21:08:02'),
(11, 'Hey', 1, 1, 2, '2018-06-19 21:22:30', '2018-06-19 21:22:30'),
(12, 'Hey', 1, 1, 2, '2018-06-19 21:24:26', '2018-06-19 21:24:26'),
(13, 'ghjkl', 1, 1, 2, '2018-06-19 21:37:47', '2018-06-19 21:37:47'),
(14, 'ghjkl', 1, 1, 2, '2018-06-19 21:42:28', '2018-06-19 21:42:28'),
(15, 'Naks', 1, 1, 2, '2018-06-19 21:44:09', '2018-06-20 08:55:23'),
(16, 'kmjs17', 1, 1, 2, '2018-06-19 21:44:27', '2018-06-20 06:41:40'),
(17, 'Good As New', 1, 1, 2, '2018-06-19 21:47:15', '2018-06-19 21:47:15'),
(18, 'Petmalu', 1, 1, 2, '2018-06-19 22:25:35', '2018-06-19 22:25:35'),
(19, 'Bonggang Bongga', 1, 1, 3, '2018-06-19 23:05:33', '2018-06-19 23:05:33'),
(20, 'Hoist', 1, 1, 2, '2018-06-20 06:52:23', '2018-06-20 08:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `comment_statuses`
--

CREATE TABLE `comment_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_statuses`
--

INSERT INTO `comment_statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'published', '2018-06-17 18:57:49', '2018-06-17 18:57:49'),
(2, 'deleted', '2018-06-17 19:08:36', '2018-06-17 19:08:36');

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
(1, '2014_10_10_013922_create_accounts_statuses_table', 1),
(2, '2014_10_11_011154_create_roles_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_06_06_032136_create_posts_statuses_table', 4),
(6, '2018_06_06_033640_create_posts_categories_table', 4),
(7, '2014_06_06_032136_create_posts_statuses_table', 4),
(8, '2014_06_06_033640_create_posts_categories_table', 4),
(13, '2014_10_14_045441_create_comment_statuses_table', 5),
(14, '2014_10_15_044403_create_comments_table', 5),
(15, '2014_10_17_032136_create_posts_statuses_table', 5),
(16, '2014_10_17_033640_create_posts_categories_table', 5),
(17, '2014_10_18_031018_create_posts_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `post_status_id`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Console During The 90s', 'Awesome It Is', 1, 3, 'img/post/1529417916.jpg', '2018-06-18 23:26:56', '2018-06-19 06:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts_categories`
--

CREATE TABLE `posts_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_categories`
--

INSERT INTO `posts_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Foods', '2018-06-17 20:52:08', '2018-06-17 20:52:08'),
(2, 'Games', '2018-06-17 20:53:03', '2018-06-17 20:53:03'),
(3, 'TV', '2018-06-17 20:54:44', '2018-06-17 20:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `posts_statuses`
--

CREATE TABLE `posts_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_statuses`
--

INSERT INTO `posts_statuses` (`id`, `status_type`, `created_at`, `updated_at`) VALUES
(1, 'posted', '2018-06-17 20:57:09', '2018-06-17 20:57:09'),
(2, 'deleted', '2018-06-17 20:57:50', '2018-06-17 20:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_title`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-06-17 17:50:58', '2018-06-17 17:50:58'),
(2, 'user', '2018-06-17 17:55:58', '2018-06-17 17:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `address`, `email`, `date_of_birth`, `first_name`, `last_name`, `contact_number`, `gender`, `role_id`, `status_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'johntest', '$2y$10$JwMy9EicDAnf9T5uzK0Yi.9nifl0la5F0JADndE8fEtYudFz0suRq', 'Makati City', 'johntest2018@aol.com', '09/11/2001', 'John', 'Test', '09154321434', 'Male', 2, 1, 'ZWqdbJ27fZvsF7sgCPKdoHLQJzzAz85DqpC5101b8JBkD907TwFZLaL6ReG9', '2018-06-17 23:11:19', '2018-06-17 23:11:19'),
(2, 'testuser', '$2y$10$1Typ7kPYGbudHZFl2QDmYeA6mk5pQp89mv25ffCQgH1XCERAqTEPq', 'Ayala Alabang', 'testuser@hotmail.com', '12/01/2001', 'Test', 'User', '09951112222', 'Male', 1, 1, 'lLDTPEUW3aRDoIuXa5JkbNJAHq6hSI8npvevCZnoANYT59gP7vonPzMbunx3', '2018-06-19 23:27:14', '2018-06-19 23:27:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_statuses`
--
ALTER TABLE `accounts_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_status_id_foreign` (`status_id`),
  ADD KEY `comments_author_id_foreign` (`author_id`);

--
-- Indexes for table `comment_statuses`
--
ALTER TABLE `comment_statuses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_post_status_id_foreign` (`post_status_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_statuses`
--
ALTER TABLE `posts_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_status_id_foreign` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_statuses`
--
ALTER TABLE `accounts_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comment_statuses`
--
ALTER TABLE `comment_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts_categories`
--
ALTER TABLE `posts_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts_statuses`
--
ALTER TABLE `posts_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `comment_statuses` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `posts_categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_post_status_id_foreign` FOREIGN KEY (`post_status_id`) REFERENCES `posts_statuses` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `accounts_statuses` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
