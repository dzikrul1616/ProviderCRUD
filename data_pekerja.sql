-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 09:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_pekerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_05_04_073240_create_pekerjaans_table', 1),
(16, '2023_05_08_061044_pendidikan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaans`
--

CREATE TABLE `pekerjaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pekerjaans`
--

INSERT INTO `pekerjaans` (`id`, `pekerjaan`, `user_id`, `waktu`, `created_at`, `updated_at`) VALUES
(9, 'Pekerjaan 2', 3, 2, '2023-05-04 01:45:23', '2023-05-04 01:45:23'),
(18, 'Pekerjaan 1', 5, 1, '2023-05-04 01:59:44', '2023-05-04 01:59:44'),
(19, 'Pekerjaan 2', 5, 2, '2023-05-04 01:59:44', '2023-05-04 01:59:44'),
(20, 'sdasdas', 18, 1, '2023-05-07 01:46:00', '2023-05-07 01:46:00'),
(21, 'asdas', 18, 1, '2023-05-07 01:46:00', '2023-05-07 01:46:00'),
(22, 'fdsfsdfsdf', 19, 1, '2023-05-07 02:35:11', '2023-05-07 02:35:11'),
(23, 'fsdfwf24', 20, 1, '2023-05-07 02:36:12', '2023-05-07 02:36:12'),
(33, 'fsdfsd', 23, 1, '2023-05-07 04:33:00', '2023-05-07 04:33:00'),
(34, 'sdfsfsdf', 23, 1, '2023-05-07 04:33:00', '2023-05-07 04:33:00'),
(35, 'sdfdsf', 24, 1, '2023-05-07 05:47:54', '2023-05-07 05:47:54'),
(36, 'fsddfs', 24, 4, '2023-05-07 05:47:54', '2023-05-07 05:47:54'),
(39, 'gregergreg', 26, 1, '2023-05-07 07:24:40', '2023-05-07 07:24:40'),
(40, 'ergergre', 26, 1, '2023-05-07 07:24:40', '2023-05-07 07:24:40'),
(41, 'regerg', 26, 1, '2023-05-07 07:24:40', '2023-05-07 07:24:40'),
(42, 'dassad', 28, 1, '2023-05-07 08:34:02', '2023-05-07 08:34:02'),
(43, 'asdasda', 28, 1, '2023-05-07 08:34:02', '2023-05-07 08:34:02'),
(44, 'dfgdfg', 31, 1, '2023-05-07 19:56:13', '2023-05-07 19:56:13'),
(45, 'dfgdfgdfg', 31, 1, '2023-05-07 19:56:13', '2023-05-07 19:56:13'),
(68, 'asdas', 34, 1, '2023-05-07 21:00:12', '2023-05-07 21:00:12'),
(69, 'adada', 34, 1, '2023-05-07 21:00:12', '2023-05-07 21:00:12'),
(140, 'Pekerjaan 1', 49, 1, '2023-05-08 00:02:57', '2023-05-08 00:02:57'),
(141, 'dsfsdfs', 49, 3, '2023-05-08 00:02:57', '2023-05-08 00:02:57'),
(142, 'sdfdsf', 50, 1, '2023-05-08 00:03:07', '2023-05-08 00:03:07'),
(143, 'sdfsdf', 50, 1, '2023-05-08 00:03:07', '2023-05-08 00:03:07'),
(144, 'sdfds', 50, 1, '2023-05-08 00:03:07', '2023-05-08 00:03:07'),
(145, 'Pekerjaan 1', 51, 1, '2023-05-08 00:06:00', '2023-05-08 00:06:00'),
(146, 'Pekerjaan 2', 51, 2, '2023-05-08 00:06:00', '2023-05-08 00:06:00'),
(147, 'Pekerjaan 1', 51, 1, '2023-05-08 00:06:00', '2023-05-08 00:06:00'),
(148, 'Pekerjaan 1', 51, 1, '2023-05-08 00:06:00', '2023-05-08 00:06:00'),
(149, 'Pekerjaan 1', 51, 1, '2023-05-08 00:06:00', '2023-05-08 00:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikans`
--

CREATE TABLE `pendidikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikans`
--

INSERT INTO `pendidikans` (`id`, `pendidikan`) VALUES
(9, 'SD'),
(10, 'SMP'),
(11, 'SMA'),
(12, 'SMK'),
(13, 'D1'),
(14, 'D2'),
(15, 'D3'),
(16, 'D4'),
(17, 'S1'),
(18, 'S2'),
(19, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `pendidikan`, `phone`, `created_at`, `updated_at`) VALUES
(49, 'John Doe', 'Jalan Contoh No. 123', 'd3', '1234567890', '2023-05-07 23:57:40', '2023-05-07 23:59:12'),
(50, 'sdadasd', 'sdffsdf', 'd2', '32242', '2023-05-08 00:03:07', '2023-05-08 00:03:07'),
(51, 'John Dzikk', 'Jalan Contoh No. 123', 's1', '1234567890', '2023-05-08 00:06:00', '2023-05-08 00:06:00');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `pendidikans`
--
ALTER TABLE `pendidikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
