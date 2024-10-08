-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 08, 2024 at 12:04 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `family-tree`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_members`
--

CREATE TABLE `family_members` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_id` bigint UNSIGNED DEFAULT NULL,
  `mother_id` bigint UNSIGNED DEFAULT NULL,
  `spouse_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_members`
--

INSERT INTO `family_members` (`id`, `user_id`, `name`, `gender`, `image`, `father_id`, `mother_id`, `spouse_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'PP Yadav', 'male', NULL, NULL, NULL, 2, '2024-09-03 00:29:52', '2024-09-03 00:29:52'),
(2, 1, 'Sundrawati Devi', 'female', NULL, NULL, NULL, 1, '2024-09-03 00:31:14', '2024-09-03 00:31:14'),
(3, 1, 'Ramesh Yadav', 'male', NULL, 1, 2, 4, '2024-09-03 00:31:41', '2024-09-03 00:31:41'),
(4, 1, 'Meena Yadav', 'female', NULL, NULL, NULL, 3, '2024-09-03 00:32:15', '2024-09-03 00:32:15'),
(5, 1, 'Krishna Yadav', 'male', NULL, 1, 2, 6, '2024-09-03 00:32:32', '2024-09-03 00:32:32'),
(6, 1, 'Savitri Devi', 'female', NULL, NULL, NULL, 5, '2024-09-03 00:32:58', '2024-09-04 01:35:05'),
(7, 1, 'Riya Yadav', 'female', NULL, 3, 4, NULL, '2024-09-03 00:33:21', '2024-09-03 00:33:21'),
(8, 1, 'Rishi Raj', 'male', NULL, 3, 4, NULL, '2024-09-03 00:33:38', '2024-09-03 00:33:38'),
(9, 1, 'Kunal Yadav', 'male', NULL, 5, 6, NULL, '2024-09-03 00:33:56', '2024-09-03 00:33:56'),
(10, 1, 'Aradhya Yadav', 'female', NULL, 5, 6, NULL, '2024-09-03 00:34:16', '2024-09-03 00:34:16'),
(12, 2, 'Forrest Tyson', 'male', NULL, NULL, NULL, 13, '2024-09-04 04:07:06', '2024-09-04 04:10:37'),
(13, 2, 'Elijah Fuller', 'female', NULL, NULL, NULL, 12, '2024-09-04 04:07:55', '2024-09-04 04:07:55'),
(14, 2, 'Mohammad Anderson', 'male', NULL, 12, 13, 16, '2024-09-04 04:16:51', '2024-09-04 04:27:28'),
(16, 2, 'Leah Nicholson', 'female', NULL, NULL, NULL, 14, '2024-09-04 04:26:32', '2024-09-04 04:26:32'),
(17, 2, 'Norman Mckay', 'male', NULL, 12, 13, NULL, '2024-09-04 04:28:08', '2024-09-04 04:32:44'),
(18, 2, 'Miriam Kidd', 'female', NULL, 17, NULL, NULL, '2024-09-04 04:29:52', '2024-09-04 04:32:37'),
(19, 3, 'Naranbhai', 'male', NULL, NULL, NULL, 20, '2024-09-04 04:36:19', '2024-09-04 04:37:50'),
(20, 3, 'Kankuben', 'female', NULL, NULL, NULL, 19, '2024-09-04 04:36:43', '2024-09-04 04:38:55'),
(21, 3, 'Navinbhai', 'male', NULL, 19, 20, 22, '2024-09-04 04:38:38', '2024-09-04 04:39:53'),
(22, 3, 'Madhuben', 'female', NULL, NULL, NULL, 21, '2024-09-04 04:39:22', '2024-09-04 04:39:22'),
(23, 3, 'Paresh', 'male', NULL, 21, 22, 24, '2024-09-04 04:40:34', '2024-09-04 04:40:58'),
(24, 3, 'Harsha', 'female', NULL, NULL, NULL, 23, '2024-09-04 04:40:50', '2024-09-04 04:40:50'),
(25, 3, 'Viransh', 'male', NULL, 23, 24, NULL, '2024-09-04 04:41:25', '2024-09-04 04:41:25'),
(26, 3, 'Gautam', 'male', NULL, 21, 22, 27, '2024-09-04 04:41:52', '2024-09-04 04:42:23'),
(27, 3, 'Banshi', 'female', NULL, NULL, NULL, 26, '2024-09-04 04:42:15', '2024-09-04 04:42:15'),
(28, 3, 'Aksha', 'female', NULL, 26, 27, NULL, '2024-09-04 04:42:39', '2024-09-04 04:42:39'),
(29, 4, 'Dada ji', 'male', NULL, NULL, NULL, 30, '2024-09-04 05:06:23', '2024-09-04 05:07:32'),
(30, 4, 'Dadi', 'female', NULL, NULL, NULL, 29, '2024-09-04 05:06:36', '2024-09-04 05:06:59'),
(31, 4, 'Father', 'male', NULL, 29, 30, 32, '2024-09-04 05:07:21', '2024-09-04 05:08:35'),
(32, 4, 'Mother', 'female', NULL, NULL, NULL, 31, '2024-09-04 05:08:03', '2024-09-04 05:08:03'),
(33, 4, 'Nikhil', 'male', NULL, 31, 32, NULL, '2024-09-04 05:08:20', '2024-09-04 05:08:20'),
(36, 1, 'Brynne Good', 'female', 'family_images/user_1/1726470141.jpeg', 5, 6, NULL, '2024-09-16 01:18:02', '2024-09-16 01:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2024_09_03_055008_create_family_members_table', 3);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ramesh Yadav', 'ramesh.yadav@sweetdisp.com', NULL, '$2y$12$uuwZUeqRbMYDdR/ZfXxInu9MVSZGWGKmLZXR9bCd6mT/DBa4wAA0u', NULL, '2024-09-02 05:23:30', '2024-09-02 05:23:30'),
(2, 'Dakota Mitchell', 'huvuresak@mailinator.com', NULL, '$2y$12$iJ5a21lOleC2kmGWP7Nf7eLDYCynf3emBHsUqGebYovbDAn6Ckq.u', NULL, '2024-09-03 07:01:01', '2024-09-03 07:01:01'),
(3, 'Paresh', 'pareshdharajiya@gmail.com', NULL, '$2y$12$TooU2pj7m13VRnPgsQcnWeYd3HP/QXkapP9KE1TeXveLBq/Wu2RxC', NULL, '2024-09-04 04:35:30', '2024-09-04 04:35:30'),
(4, 'Nikhil', 'marketing@canpac.in', NULL, '$2y$12$.x2XfCT10PbFTdmBxd.eYeoOk7PqjTOtD43A/pNev.NSaciV7NONq', NULL, '2024-09-04 05:05:59', '2024-09-04 05:05:59');

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
-- Indexes for table `family_members`
--
ALTER TABLE `family_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_members_father_id_foreign` (`father_id`),
  ADD KEY `family_members_mother_id_foreign` (`mother_id`),
  ADD KEY `family_members_spouse_id_foreign` (`spouse_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_members`
--
ALTER TABLE `family_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `family_members`
--
ALTER TABLE `family_members`
  ADD CONSTRAINT `family_members_father_id_foreign` FOREIGN KEY (`father_id`) REFERENCES `family_members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `family_members_mother_id_foreign` FOREIGN KEY (`mother_id`) REFERENCES `family_members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `family_members_spouse_id_foreign` FOREIGN KEY (`spouse_id`) REFERENCES `family_members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
