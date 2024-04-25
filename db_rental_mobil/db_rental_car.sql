-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 06:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_23_135820_create_table_user', 1),
(5, '2024_04_23_142932_edit_table_user', 1),
(6, '2024_04_23_163044_create_table_car', 1),
(7, '2024_04_23_164525_add_owner_kolom', 2),
(8, '2024_04_25_045638_add_table_transaksi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Flx0R1PHhyNdpFVtS01HUy7Ko6xNRG5RfO2pY9ac', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNjVqcTZiRG9yRkZOUlpldDJZSGloS1FPMEhWZWZkbU1wTjVOY21LOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1714033962),
('OE4LNd0j7NOVlN2Cq5WQJYVMgGbMUFu5ZVhCUeZX', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWlV2a1ZaNjJId0tYeWE0amUyUWdHdnRIVXBVUHJrVTBCcWFrek0yYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1714034312);

-- --------------------------------------------------------

--
-- Table structure for table `table_car`
--

CREATE TABLE `table_car` (
  `id_car` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `transmisi` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `bahan_bakar` varchar(255) NOT NULL,
  `no_plat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tarif` int(11) NOT NULL,
  `tersedia` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_owner` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_car`
--

INSERT INTO `table_car` (`id_car`, `model`, `merek`, `transmisi`, `jenis`, `tahun`, `bahan_bakar`, `no_plat`, `foto`, `tarif`, `tersedia`, `created_at`, `updated_at`, `id_owner`) VALUES
(1, 'inova', 'toyota', 'manual', 'mpv', '2015', 'bensin', 'N1254NN', '1714033739fotogambar-mobil-png-8.png', 100000, 1, '2024-04-23 10:10:50', '2024-04-23 10:10:50', 1),
(2, 'avanza', 'daihatsu', 'matic', 'SUV', '2020', 'bensin', 'N 4587 AAA', '1714033739fotogambar-mobil-png-8.png', 120000, 1, '2024-04-24 08:25:05', '2024-04-24 08:25:05', 1),
(3, 'jimmy', 'suzuki', 'manual', 'SUV', '2021', 'bensin', 'N 1254 MM', '1714033739fotogambar-mobil-png-8.png', 150000, 1, '2024-04-24 21:03:51', '2024-04-24 21:03:51', 2),
(4, 'xenia', 'daihatsu', 'manual', 'mpv', '2018', 'bensin', 'B 3456 XYZ', '1714033739fotogambar-mobil-png-8.png', 90000, 1, '2024-04-25 10:00:00', '2024-04-25 10:00:00', 3),
(5, 'fortuner', 'toyota', 'matic', 'SUV', '2019', 'bensin', 'B 7890 ABC', '1714033739fotogambar-mobil-png-8.png', 200000, 1, '2024-04-25 22:06:30', '2024-04-25 22:06:30', 3),
(6, 'xtrail', 'nissan', 'matic', 'SUV', '2020', 'bensin', 'B 1234 XYZ', '1714033739fotogambar-mobil-png-8.png', 180000, 1, '2024-04-27 10:47:00', '2024-04-27 10:47:00', 1),
(7, 'veloz', 'toyota', 'manual', 'mpv', '2017', 'bensin', 'B 6543 ZYX', '1714033739fotogambar-mobil-png-8.png', 95000, 1, '2024-04-28 01:56:30', '2024-04-28 01:56:30', 2),
(8, 'livina', 'nissan', 'manual', 'mpv', '2016', 'bensin', 'B 7890 QWE', '1714033739fotogambar-mobil-png-8.png', 85000, 1, '2024-04-29 05:10:30', '2024-04-29 05:10:30', 3),
(9, 'ertiga', 'suzuki', 'matic', 'mpv', '2019', 'bensin', 'B 2345 WER', '1714033739fotogambar-mobil-png-8.png', 120000, 1, '2024-04-30 07:31:30', '2024-04-30 07:31:30', 2),
(10, 'expander', 'mitsubishi', 'manual', 'mpv', '2019', 'bensin', 'B 5432 RFG', '1714033739fotogambar-mobil-png-8.png', 110000, 1, '2024-05-01 09:44:30', '2024-05-01 09:44:30', 2),
(11, 'rush', 'toyota', 'matic', 'SUV', '2020', 'bensin', 'B 6543 YUI', '1714033739fotogambar-mobil-png-8.png', 150000, 1, '2024-05-02 11:00:30', '2024-05-02 11:00:30', 3),
(12, 'innova', 'toyota', 'manual', 'mpv', '2015', 'bensin', 'B 7890 TYU', '1714033739fotogambar-mobil-png-8.png', 100000, 1, '2024-05-03 13:15:30', '2024-05-03 13:15:30', 1),
(13, 'xenia', 'daihatsu', 'matic', 'mpv', '2018', 'bensin', 'B 2345 ASD', '1714033739fotogambar-mobil-png-8.png', 95000, 1, '2024-05-04 15:31:30', '2024-05-04 15:31:30', 2),
(14, 'rush', 'toyota', 'manual', 'SUV', '2019', 'bensin', 'B 4567 DFG', '1714033739fotogambar-mobil-png-8.png', 135000, 1, '2024-05-04 17:45:30', '2024-05-04 17:45:30', 3),
(15, 'jimny', 'suzuki', 'manual', 'SUV', '2020', 'bensin', 'B 5678 JKL', '1714033739fotogambar-mobil-png-8.png', 170000, 1, '2024-05-05 19:59:30', '2024-05-05 19:59:30', 1),
(16, 'expander', 'mitsubishi', 'matic', 'mpv', '2019', 'bensin', 'B 6789 IOP', '1714033739fotogambar-mobil-png-8.png', 125000, 1, '2024-05-06 22:15:30', '2024-05-06 22:15:30', 1),
(17, 'avanza', 'daihatsu', 'manual', 'mpv', '2017', 'bensin', 'B 7890 FGH', '1714033739fotogambar-mobil-png-8.png', 85000, 1, '2024-05-08 00:30:30', '2024-05-08 00:30:30', 2),
(18, 'livina', 'nissan', 'matic', 'mpv', '2018', 'bensin', 'B 8901 KJH', '1714033739fotogambar-mobil-png-8.png', 95000, 1, '2024-05-09 02:45:30', '2024-05-09 02:45:30', 2),
(19, 'xtrail', 'nissan', 'manual', 'SUV', '2019', 'bensin', 'B 9012 SDF', '1714033739fotogambar-mobil-png-8.png', 160000, 1, '2024-05-10 05:00:30', '2024-05-10 05:00:30', 1),
(20, 'sedan', 'suzuki', 'manual', 'SUV', '2021', 'bensin', 'N 1124 MM', '1714033739fotogambar-mobil-png-8.png', 200000, 1, '2024-04-25 01:28:59', '2024-04-25 01:28:59', 1),
(21, 'rubicon', 'jeep', 'manual', 'SUV', '2021', 'bensin', 'N 1224 MM', '1714034142fotogambar-mobil-png-8.png', 700000, 1, '2024-04-25 01:35:42', '2024-04-25 01:35:42', 4);

-- --------------------------------------------------------

--
-- Table structure for table `table_transaksi`
--

CREATE TABLE `table_transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_car` bigint(20) NOT NULL,
  `mulai_pinjam` varchar(255) NOT NULL,
  `selesai_pinjam` varchar(255) NOT NULL,
  `tarif_per_hari` varchar(255) NOT NULL,
  `total_tarif` varchar(255) NOT NULL,
  `id_owner` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_transaksi`
--

INSERT INTO `table_transaksi` (`id_transaksi`, `id_car`, `mulai_pinjam`, `selesai_pinjam`, `tarif_per_hari`, `total_tarif`, `id_owner`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(33, 1, '04/26/2024', '04/30/2024', '100000', '400000', 1, 2, 'done', '2024-04-24 23:27:31', '2024-04-25 01:01:22'),
(55, 2, '04/24/2024', '04/26/2024', '120000', '240000', 1, 2, 'done', '2024-04-24 23:46:53', '2024-04-25 00:56:14'),
(56, 3, '04/22/2024', '04/30/2024', '150000', '1200000', 2, 1, 'done', '2024-04-25 00:45:40', '2024-04-25 01:01:34'),
(57, 1, '04/25/2024', '04/29/2024', '100000', '400000', 1, 2, 'ongoing', '2024-04-25 00:50:14', '2024-04-25 00:50:26'),
(58, 2, '04/29/2024', '04/30/2024', '120000', '120000', 1, 2, 'cancel', '2024-04-25 00:50:46', '2024-04-25 00:50:57'),
(59, 3, '04/30/2024', '05/01/2024', '150000', '150000', 2, 1, 'done', '2024-04-25 01:01:57', '2024-04-25 01:02:16'),
(60, 4, '04/22/2024', '04/30/2024', '90000', '720000', 3, 1, 'done', '2024-04-25 01:32:13', '2024-04-25 01:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `no_SIM` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_login` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id_user`, `name`, `email`, `password`, `address`, `no_hp`, `no_SIM`, `created_at`, `updated_at`, `status_login`) VALUES
(1, 'user', 'user@mail.com', '$2y$12$OnzeFRThZP7EwVTaNzAJQ.Mny.fTXqoL3ZLCA02UVVeF1G5GQgAG2', 'jl. raya no 2', '05985478214', '1258746932', '2024-04-23 09:43:03', '2024-04-25 01:31:36', 0),
(2, 'user2', 'user2@mail.com', '$2y$12$CCYVtepIKeMnesgRbFvnd.Qk8E03oJ8qzG8iSbx2HMHksDgZWIjuG', 'jl. merak dsn. sonotengah', '089612571617', '12589632147', '2024-04-24 09:04:16', '2024-04-24 20:07:42', 1),
(3, 'user3', 'user3@mail.com', '$2y$12$LqLdqTLGCPGEKOtwwL3IDeHJhOMvt9Zk8VZYPd4zSUgh9hude5PWS', 'jalan raya no4', '055487878787', '211687654654', '2024-04-25 01:16:33', '2024-04-25 01:33:52', 0),
(4, 'user4', 'user4@mail.com', '$2y$12$jKr2hvt8ecA8m8Z74QSdu.n7iNAo/8wODAGFrnn97sS5RbIs.5ugK', 'jalan raya no5', '21345679854', '21545878745', '2024-04-25 01:34:55', '2024-04-25 01:35:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `table_car`
--
ALTER TABLE `table_car`
  ADD PRIMARY KEY (`id_car`);

--
-- Indexes for table `table_transaksi`
--
ALTER TABLE `table_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id_user`);

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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_car`
--
ALTER TABLE `table_car`
  MODIFY `id_car` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `table_transaksi`
--
ALTER TABLE `table_transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
