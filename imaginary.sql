-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 02:09 PM
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
-- Database: `imaginary`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `description`, `cover_image`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Abstract', 'High Quality Abstract Pictures', '3d_geometric_triangles_4k-1920x1080_1557659602.jpg', '2019-05-12 04:13:23', '2019-05-12 04:13:23', 17),
(2, 'Nature', 'The Most Outstanding Views of Nature', 'lake-zurich-1920x1080-forest-sky-mountains-4k-17798_1557659870.jpg', '2019-05-12 04:17:23', '2019-05-12 04:17:50', 17),
(3, 'Food', 'Close-up Food Photos', 'cream_background_ice_cream_77905_1920x1080_1557660495.jpg', '2019-05-12 04:28:15', '2019-05-12 04:28:15', 17),
(4, 'Fantasy', 'The Wildest Dream You Had', 'alien-1920x1080-cosmic-7k-19394_1557660768.jpg', '2019-05-12 04:32:48', '2019-05-12 04:32:48', 17),
(5, 'Characters', 'Iconic Characters of All Time', 'scarlet_spider_4k_2-1920x1080_1557661087.jpg', '2019-05-12 04:38:07', '2019-05-12 04:38:07', 18),
(6, 'Cars', 'Collections of Future Cars', 'volkswagen-i-d-buggy-1920x1080-geneva-motor-show-2019-4k-21297_1557661597.jpeg', '2019-05-12 04:46:37', '2019-05-12 04:46:37', 18),
(7, 'Places', 'Great Places Around The World', 'moscow_kremlin_red_square_russia_capital_59491_1920x1080_1557661924.jpg', '2019-05-12 04:52:04', '2019-05-12 04:52:04', 18),
(8, 'Animals', 'Wildlife Animals', 'underwater-1920x1080-whale-4k-18612_1557662651.jpg', '2019-05-12 05:04:11', '2019-05-12 05:04:11', 18),
(9, 'New Album', 'Album', 'flight_balloon_sky_86980_1920x1080_1557809218.jpg', '2019-05-13 21:46:59', '2019-05-13 21:46:59', 18);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_14_120046_create_posts_table', 1),
(4, '2019_04_15_133911_create_albums_table', 2),
(5, '2019_04_15_134120_create_photos_table', 2),
(7, '2019_04_19_121739_add_userid_to_albums', 3),
(8, '2019_05_07_065614_add_profileimage_to_users', 4);

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `album_id` int(11) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `album_id`, `photo`, `title`, `size`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '3d_geometric_triangles_4k-1920x1080_1557659637.jpg', 'Geometric', '357988', NULL, '2019-05-12 04:13:58', '2019-05-12 04:13:58'),
(2, 1, 'abstract-1920x1080-3d-colorful-8k-21246_1557659674.jpg', 'Colorful', '249029', NULL, '2019-05-12 04:14:34', '2019-05-12 04:14:34'),
(3, 1, 'texture_patterns_graphics_118422_1920x1080_1557659698.jpg', 'Patterns', '987476', NULL, '2019-05-12 04:14:59', '2019-05-12 04:14:59'),
(4, 1, 'digital-1920x1080-cube-3d-glass-5k-18924_1557659716.jpg', 'Glass', '446728', NULL, '2019-05-12 04:15:16', '2019-05-12 04:15:16'),
(5, 2, 'lake-zurich-1920x1080-forest-sky-mountains-4k-17798_1557659917.jpg', 'Zurich Lake', '562323', NULL, '2019-05-12 04:18:37', '2019-05-12 04:18:37'),
(6, 2, 'mountains_lake_tops_top_view_119133_1920x1080_1557659941.jpg', 'Mountains Lake', '996263', NULL, '2019-05-12 04:19:01', '2019-05-12 04:19:01'),
(7, 2, 'waves-1920x1080-water-ocean-blue-5k-20270_1557659963.jpg', 'Ocean Wave', '686670', NULL, '2019-05-12 04:19:24', '2019-05-12 04:19:24'),
(8, 2, 'forest_passage_4k-1920x1080_1557660265.jpg', 'Forest Passage', '487901', NULL, '2019-05-12 04:24:25', '2019-05-12 04:24:25'),
(9, 3, 'cream_background_ice_cream_77905_1920x1080_1557660514.jpg', 'Ice Cream', '1527055', NULL, '2019-05-12 04:28:35', '2019-05-12 04:28:35'),
(10, 3, 'blueberry-1920x1080-berries-4k-17817_1557660540.jpg', 'Blueberry', '296911', NULL, '2019-05-12 04:29:00', '2019-05-12 04:29:00'),
(11, 3, 'spices-1920x1080-pepper-4k-16049_1557660605.jpg', 'Spices', '649501', NULL, '2019-05-12 04:30:06', '2019-05-12 04:30:06'),
(12, 4, 'alien-1920x1080-cosmic-7k-19394_1557660816.jpg', 'Alien & Children', '233490', NULL, '2019-05-12 04:33:37', '2019-05-12 04:33:37'),
(13, 4, 'night_rider_2-1920x1080_1557660833.jpg', 'Night Rider', '370909', NULL, '2019-05-12 04:33:54', '2019-05-12 04:33:54'),
(14, 4, 'tree-1920x1080-light-4k-19554_1557660871.jpg', 'Tree Light', '602972', NULL, '2019-05-12 04:34:32', '2019-05-12 04:34:32'),
(15, 4, 'flight_balloon_sky_86980_1920x1080_1557660907.jpg', 'Flight Balloon', '699473', NULL, '2019-05-12 04:35:08', '2019-05-12 04:35:08'),
(16, 5, 'scarlet_spider_4k_2-1920x1080_1557661104.jpg', 'Scalet Spiderman', '393491', NULL, '2019-05-12 04:38:25', '2019-05-12 04:38:25'),
(17, 5, 'mortal-kombat-11-1920x1080-screenshot-4k-21013_1557661406.jpg', 'Raiden', '301435', NULL, '2019-05-12 04:43:27', '2019-05-12 04:43:27'),
(18, 5, 'mortal_kombat_x_scorpio_ninja_pose_96758_1920x1080_1557661453.jpg', 'Scorpion', '586240', NULL, '2019-05-12 04:44:13', '2019-05-12 04:44:13'),
(19, 5, 'destiny-2-forsaken-1920x1080-e3-2018-screenshot-4k-19357_1557661471.jpg', 'Destiny 2', '357509', NULL, '2019-05-12 04:44:31', '2019-05-12 04:44:31'),
(20, 6, 'volkswagen-i-d-buggy-1920x1080-geneva-motor-show-2019-4k-21297_1557661622.jpeg', 'Volkswagen', '754008', NULL, '2019-05-12 04:47:03', '2019-05-12 04:47:03'),
(21, 6, 'auto_red_style_87167_1920x1080_1557661644.jpg', 'Red Car', '882175', NULL, '2019-05-12 04:47:25', '2019-05-12 04:47:25'),
(22, 6, 'ford-mustang-bullitt-kona-blue-1920x1080-2019-cars-5k-20172_1557661674.jpg', 'Mustang Kobra', '592964', NULL, '2019-05-12 04:47:54', '2019-05-12 04:47:54'),
(23, 6, 'lamborghini_sc18_2019_4k-1920x1080_1557661700.jpg', 'Lamborghini', '134226', NULL, '2019-05-12 04:48:21', '2019-05-12 04:48:21'),
(24, 7, 'moscow_kremlin_red_square_russia_capital_59491_1920x1080_1557661995.jpg', 'Moscow Kremlin', '1006042', NULL, '2019-05-12 04:53:16', '2019-05-12 04:53:16'),
(25, 7, 'eiffel-tower-1920x1080-france-paris-4k-5k-18568_1557662478.jpg', 'Eiffel Tower', '304265', NULL, '2019-05-12 05:01:18', '2019-05-12 05:01:18'),
(26, 7, 'taipei_cityscape_5k-1920x1080_1557662508.jpg', 'Taipei Cityscape', '491469', NULL, '2019-05-12 05:01:49', '2019-05-12 05:01:49'),
(27, 7, 'stanford-memorial-church-1920x1080-colorful-5k-19564_1557662540.jpg', 'Stanford Church', '778632', NULL, '2019-05-12 05:02:20', '2019-05-12 05:02:20'),
(28, 8, 'underwater-1920x1080-whale-4k-18612_1557662666.jpg', 'Underwater Whale', '264830', NULL, '2019-05-12 05:04:27', '2019-05-12 05:04:27'),
(29, 8, 'macaw_hd_5k-1920x1080_1557662694.jpg', 'Macaw', '317670', NULL, '2019-05-12 05:04:55', '2019-05-12 05:04:55'),
(30, 8, 'orangutan-1920x1080-brown-4k-19456_1557662709.jpg', 'Orangutan', '628264', NULL, '2019-05-12 05:05:10', '2019-05-12 05:05:10'),
(31, 8, 'leopard_muzzle_eyes_predator_92043_1920x1080_1557662742.jpg', 'Leopard', '813863', NULL, '2019-05-12 05:05:43', '2019-05-12 05:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_image`) VALUES
(17, 'Ricky', 'rickyas1998@gmail.com', NULL, '$2y$10$BnlbUPwVSVr85K/5669DoO.5uE8cQF7Xyjh1wdOg/cSsjf2XSk2I.', NULL, '2019-05-12 04:03:52', '2019-05-12 04:03:52', NULL),
(18, 'Austin', 'austin@gmail.com', NULL, '$2y$10$fYUS2ElgCJYWjpstnvWVCeOsZo6qbXP/lPyy2u8RMZr8PXyZJ85qS', NULL, '2019-05-12 04:37:26', '2019-05-13 21:48:10', 'flight_balloon_sky_86980_1920x1080_1557809289.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
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
-- Indexes for table `photos`
--
ALTER TABLE `photos`
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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
