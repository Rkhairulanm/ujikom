-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 10:59 AM
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
-- Database: `ujikom`
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
-- Table structure for table `detailpenjualans`
--

CREATE TABLE `detailpenjualans` (
  `detail_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `penjualan_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailpenjualans`
--

INSERT INTO `detailpenjualans` (`detail_id`, `jumlah`, `sub_total`, `created_at`, `updated_at`, `penjualan_id`, `produk_id`) VALUES
(10, 1, 123.00, '2024-04-04 01:45:33', '2024-04-04 01:45:33', 14, 4),
(11, 1, 30000.00, '2024-04-04 01:45:33', '2024-04-04 01:45:33', 15, 5),
(12, 2, 246.00, '2024-04-04 02:15:46', '2024-04-04 02:15:46', 16, 4),
(13, 1, 30000.00, '2024-04-04 02:15:46', '2024-04-04 02:15:46', 17, 5),
(14, 2, 246.00, '2024-04-04 02:25:21', '2024-04-04 02:25:21', 18, 4),
(15, 1, 30000.00, '2024-04-04 02:25:21', '2024-04-04 02:25:21', 19, 5),
(16, 1, 123.00, '2024-04-04 02:26:15', '2024-04-04 02:26:15', 20, 4),
(17, 1, 30000.00, '2024-04-04 02:26:15', '2024-04-04 02:26:15', 21, 5),
(18, 1, 123.00, '2024-04-04 02:27:39', '2024-04-04 02:27:39', 22, 7),
(19, 1, 123.00, '2024-04-04 02:27:39', '2024-04-04 02:27:39', 23, 169),
(20, 1, 123.00, '2024-04-04 02:28:39', '2024-04-04 02:28:39', 24, 4),
(21, 1, 30000.00, '2024-04-04 02:28:39', '2024-04-04 02:28:39', 25, 5),
(22, 1, 123.00, '2024-04-04 02:28:39', '2024-04-04 02:28:39', 26, 7),
(23, 10, 1230.00, '2024-04-04 02:29:43', '2024-04-04 02:29:43', 27, 4),
(24, 2, 246.00, '2024-04-04 06:16:32', '2024-04-04 06:16:32', 28, 4),
(25, 3, 90000.00, '2024-04-04 06:16:32', '2024-04-04 06:16:32', 29, 5),
(26, 8, 984.00, '2024-04-04 06:16:32', '2024-04-04 06:16:32', 30, 7),
(27, 4, 492.00, '2024-04-04 06:16:32', '2024-04-04 06:16:32', 31, 169),
(28, 13, 1599.00, '2024-04-04 06:16:32', '2024-04-04 06:16:32', 32, 170),
(29, 54, 6642.00, '2024-04-06 20:33:12', '2024-04-06 20:33:12', 33, 4),
(30, 1, 123.00, '2024-04-06 20:33:48', '2024-04-06 20:33:48', 34, 4),
(31, 1, 30000.00, '2024-04-06 20:33:48', '2024-04-06 20:33:48', 35, 5),
(32, 1, 123.00, '2024-04-06 20:33:48', '2024-04-06 20:33:48', 36, 7),
(33, 1, 123.00, '2024-04-06 20:33:48', '2024-04-06 20:33:48', 37, 169),
(34, 1, 123.00, '2024-04-06 20:33:48', '2024-04-06 20:33:48', 38, 170),
(35, 1, 123.00, '2024-04-06 20:36:31', '2024-04-06 20:36:31', 39, 4),
(36, 4, 492.00, '2024-04-06 23:14:47', '2024-04-06 23:14:47', 1, 4),
(37, 3, 90000.00, '2024-04-06 23:14:47', '2024-04-06 23:14:47', 2, 5),
(38, 1, 123.00, '2024-04-06 23:14:47', '2024-04-06 23:14:47', 3, 7),
(39, 1, 123.00, '2024-04-06 23:14:47', '2024-04-06 23:14:47', 4, 169),
(40, 1, 123.00, '2024-04-06 23:38:00', '2024-04-06 23:38:00', 5, 7),
(41, 1, 123.00, '2024-04-06 23:38:55', '2024-04-06 23:38:55', 6, 4),
(42, 1, 30000.00, '2024-04-06 23:38:55', '2024-04-06 23:38:55', 7, 5),
(43, 1, 123.00, '2024-04-06 23:39:49', '2024-04-06 23:39:49', 8, 4),
(44, 1, 123.00, '2024-04-07 00:14:17', '2024-04-07 00:14:17', 9, 4),
(45, 1, 123.00, '2024-04-07 00:15:23', '2024-04-07 00:15:23', 10, 4),
(46, 1, 123.00, '2024-04-07 00:16:08', '2024-04-07 00:16:08', 11, 4),
(47, 1, 30000.00, '2024-04-07 00:16:08', '2024-04-07 00:16:08', 12, 5),
(48, 1, 123.00, '2024-04-07 00:16:53', '2024-04-07 00:16:53', 13, 4),
(49, 1, 30000.00, '2024-04-07 00:16:53', '2024-04-07 00:16:53', 14, 5),
(50, 1, 123.00, '2024-04-07 00:33:08', '2024-04-07 00:33:08', 15, 4),
(51, 1, 123.00, '2024-04-07 00:34:36', '2024-04-07 00:34:36', 16, 4),
(52, 1, 30000.00, '2024-04-07 00:34:36', '2024-04-07 00:34:36', 17, 5),
(53, 1, 123.00, '2024-04-07 00:35:14', '2024-04-07 00:35:14', 18, 4),
(54, 1, 30000.00, '2024-04-07 00:35:14', '2024-04-07 00:35:14', 19, 5),
(55, 1, 123.00, '2024-04-07 00:35:59', '2024-04-07 00:35:59', 20, 4),
(56, 1, 30000.00, '2024-04-07 00:35:59', '2024-04-07 00:35:59', 21, 5),
(57, 1, 123.00, '2024-04-07 00:36:27', '2024-04-07 00:36:27', 22, 4),
(58, 1, 123.00, '2024-04-07 00:49:30', '2024-04-07 00:49:30', 23, 4),
(59, 1, 123.00, '2024-04-07 00:52:07', '2024-04-07 00:52:07', 24, 4),
(60, 1, 30000.00, '2024-04-07 00:52:07', '2024-04-07 00:52:07', 25, 5),
(61, 1, 123.00, '2024-04-07 01:07:18', '2024-04-07 01:07:18', 26, 4),
(62, 1, 123.00, '2024-04-07 01:17:43', '2024-04-07 01:17:43', 27, 4),
(63, 1, 30000.00, '2024-04-07 01:17:43', '2024-04-07 01:17:43', 28, 5),
(64, 1, 123.00, '2024-04-07 01:17:55', '2024-04-07 01:17:55', 29, 4),
(65, 1, 30000.00, '2024-04-07 01:17:55', '2024-04-07 01:17:55', 30, 5),
(66, 1, 123.00, '2024-04-07 01:18:36', '2024-04-07 01:18:36', 31, 4),
(67, 1, 30000.00, '2024-04-07 01:18:36', '2024-04-07 01:18:36', 32, 5),
(68, 1, 123.00, '2024-04-07 01:19:14', '2024-04-07 01:19:14', 33, 4),
(69, 1, 30000.00, '2024-04-07 01:19:14', '2024-04-07 01:19:14', 34, 5),
(70, 1, 123.00, '2024-04-07 01:20:17', '2024-04-07 01:20:17', 35, 4),
(71, 1, 30000.00, '2024-04-07 01:20:17', '2024-04-07 01:20:17', 36, 5),
(72, 1, 123.00, '2024-04-07 01:20:33', '2024-04-07 01:20:33', 37, 4),
(73, 1, 30000.00, '2024-04-07 01:20:33', '2024-04-07 01:20:33', 38, 5),
(74, 1, 123.00, '2024-04-07 01:20:46', '2024-04-07 01:20:46', 39, 4),
(75, 1, 30000.00, '2024-04-07 01:20:46', '2024-04-07 01:20:46', 40, 5),
(76, 1, 123.00, '2024-04-07 01:21:14', '2024-04-07 01:21:14', 41, 4),
(77, 1, 30000.00, '2024-04-07 01:21:14', '2024-04-07 01:21:14', 42, 5),
(78, 1, 123.00, '2024-04-07 01:55:33', '2024-04-07 01:55:33', 43, 4),
(79, 1, 30000.00, '2024-04-07 01:55:33', '2024-04-07 01:55:33', 44, 5);

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
(46, '2024_03_27_094643_create_produk_logs_table', 2),
(47, '2024_03_27_104340_add_waktu_column_to_produk_logs_table', 3),
(60, '0001_01_01_000000_create_users_table', 4),
(61, '0001_01_01_000001_create_cache_table', 4),
(62, '0001_01_01_000002_create_jobs_table', 4),
(63, '2024_03_27_055335_create_produks_table', 4),
(64, '2024_03_27_075900_create_detailpenjualans_table', 4),
(65, '2024_03_27_075914_create_pelanggans_table', 4),
(66, '2024_03_27_075922_create_penjualans_table', 4),
(67, '2024_03_27_081414_add_unique_rule_to_detailpenjualans_table', 4),
(68, '2024_03_27_081458_add_unique_rule_to_penjualans_table', 4),
(69, '2024_03_27_221656_add_some_column_to_penjualans_table', 4),
(70, '2024_03_27_222521_add_nama_produk_column_to_penjualans_table', 4),
(71, '2024_03_27_222539_add_stok_column_to_penjualans_table', 4),
(72, '2024_03_27_230637_change_gender_attributs_in_penjualans_table', 4),
(74, '2024_03_28_045820_add_image_column_to_produks_table', 5),
(94, '2024_04_03_154947_change_nama_pelanggan_column_in_pembelians_table', 6),
(111, '2024_03_29_073728_create_produk_logs_table', 7),
(112, '2024_03_29_073742_create_pembelians_table', 7),
(113, '2024_03_29_074130_change_atributs_rule_in_pelanggans_table', 7),
(116, '2024_04_07_072453_create_struks_table', 8),
(117, '2024_04_07_072801_add_struk_column_to_struks_table', 9),
(118, '2024_04_07_074638_add_timestamp_column_to_struks_table', 10),
(119, '2024_04_07_080316_add_pebayaran_column_to_pembelians_table', 11);

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
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telpon` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`pelanggan_id`, `nama_pelanggan`, `alamat`, `telpon`, `created_at`, `updated_at`) VALUES
(3, 'samsul', '31212', 1331, '2024-04-07 00:52:07', '2024-04-07 00:52:07'),
(4, 'samsul', NULL, NULL, '2024-04-07 01:06:48', '2024-04-07 01:06:48'),
(5, 'samsul', NULL, NULL, '2024-04-07 01:07:18', '2024-04-07 01:07:18'),
(6, 'samsul', NULL, NULL, '2024-04-07 01:17:43', '2024-04-07 01:17:43'),
(7, 'samsul', NULL, NULL, '2024-04-07 01:17:55', '2024-04-07 01:17:55'),
(8, 'samsul', NULL, NULL, '2024-04-07 01:18:36', '2024-04-07 01:18:36'),
(9, 'samsul', NULL, NULL, '2024-04-07 01:19:14', '2024-04-07 01:19:14'),
(10, 'samsul', NULL, NULL, '2024-04-07 01:20:17', '2024-04-07 01:20:17'),
(11, 'samsul', NULL, NULL, '2024-04-07 01:20:33', '2024-04-07 01:20:33'),
(12, 'samsul', NULL, NULL, '2024-04-07 01:20:46', '2024-04-07 01:20:46'),
(13, 'samsul', NULL, NULL, '2024-04-07 01:21:14', '2024-04-07 01:21:14'),
(14, 'samsul', 'jl sukamenak no 5', 132312, '2024-04-07 01:55:33', '2024-04-07 01:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `pembelian_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`pembelian_id`, `produk_id`, `pelanggan_id`, `jumlah`, `total`, `pembayaran`, `keterangan`, `created_at`, `updated_at`) VALUES
(11, 4, 24, 1, 123.00, 0, 'asdas--2024-04-07 07:45:31', '2024-04-07 00:45:31', '2024-04-07 00:45:31'),
(12, 4, 25, 1, 123.00, 0, 'asdas--2024-04-07 07:45:52', '2024-04-07 00:45:52', '2024-04-07 00:45:52'),
(13, 4, 26, 1, 123.00, 0, 'asdas--2024-04-07 07:47:38', '2024-04-07 00:47:38', '2024-04-07 00:47:38'),
(14, 4, 27, 1, 123.00, 0, 'asdas--2024-04-07 07:47:48', '2024-04-07 00:47:48', '2024-04-07 00:47:48'),
(15, 4, 28, 1, 123.00, 0, 'asdas--2024-04-07 07:49:08', '2024-04-07 00:49:08', '2024-04-07 00:49:08'),
(16, 4, 29, 1, 123.00, 0, 'asdas--2024-04-07 07:49:30', '2024-04-07 00:49:30', '2024-04-07 00:49:30'),
(17, 4, 3, 1, 123.00, 0, 'samsul-1331-2024-04-07 07:52:07', '2024-04-07 00:52:07', '2024-04-07 00:52:07'),
(18, 5, 3, 1, 30000.00, 0, 'samsul-1331-2024-04-07 07:52:07', '2024-04-07 00:52:07', '2024-04-07 00:52:07'),
(19, 4, 5, 1, 123.00, 12000, 'samsul--2024-04-07 08:07:18', '2024-04-07 01:07:18', '2024-04-07 01:07:18'),
(20, 4, 6, 1, 123.00, 12222, 'samsul--2024-04-07 08:17:43', '2024-04-07 01:17:43', '2024-04-07 01:17:43'),
(21, 5, 6, 1, 30000.00, 12222, 'samsul--2024-04-07 08:17:43', '2024-04-07 01:17:43', '2024-04-07 01:17:43'),
(22, 4, 7, 1, 123.00, 12222, 'samsul--2024-04-07 08:17:55', '2024-04-07 01:17:55', '2024-04-07 01:17:55'),
(23, 5, 7, 1, 30000.00, 12222, 'samsul--2024-04-07 08:17:55', '2024-04-07 01:17:55', '2024-04-07 01:17:55'),
(24, 4, 8, 1, 123.00, 12222, 'samsul--2024-04-07 08:18:36', '2024-04-07 01:18:36', '2024-04-07 01:18:36'),
(25, 5, 8, 1, 30000.00, 12222, 'samsul--2024-04-07 08:18:36', '2024-04-07 01:18:36', '2024-04-07 01:18:36'),
(26, 4, 9, 1, 123.00, 12222, 'samsul--2024-04-07 08:19:14', '2024-04-07 01:19:14', '2024-04-07 01:19:14'),
(27, 5, 9, 1, 30000.00, 12222, 'samsul--2024-04-07 08:19:14', '2024-04-07 01:19:14', '2024-04-07 01:19:14'),
(28, 4, 10, 1, 123.00, 12222, 'samsul--2024-04-07 08:20:17', '2024-04-07 01:20:17', '2024-04-07 01:20:17'),
(29, 5, 10, 1, 30000.00, 12222, 'samsul--2024-04-07 08:20:17', '2024-04-07 01:20:17', '2024-04-07 01:20:17'),
(30, 4, 11, 1, 123.00, 12222, 'samsul--2024-04-07 08:20:33', '2024-04-07 01:20:33', '2024-04-07 01:20:33'),
(31, 5, 11, 1, 30000.00, 12222, 'samsul--2024-04-07 08:20:33', '2024-04-07 01:20:33', '2024-04-07 01:20:33'),
(32, 4, 12, 1, 123.00, 12222, 'samsul--2024-04-07 08:20:46', '2024-04-07 01:20:46', '2024-04-07 01:20:46'),
(33, 5, 12, 1, 30000.00, 12222, 'samsul--2024-04-07 08:20:46', '2024-04-07 01:20:46', '2024-04-07 01:20:46'),
(34, 4, 13, 1, 123.00, 12222, 'samsul--2024-04-07 08:21:14', '2024-04-07 01:21:14', '2024-04-07 01:21:14'),
(35, 5, 13, 1, 30000.00, 12222, 'samsul--2024-04-07 08:21:14', '2024-04-07 01:21:14', '2024-04-07 01:21:14'),
(36, 4, 14, 1, 123.00, 30000, 'samsul-132312-2024-04-07 08:55:33', '2024-04-07 01:55:33', '2024-04-07 01:55:33'),
(37, 5, 14, 1, 30000.00, 30000, 'samsul-132312-2024-04-07 08:55:33', '2024-04-07 01:55:33', '2024-04-07 01:55:33');

--
-- Triggers `pembelians`
--
DELIMITER $$
CREATE TRIGGER `trigger_update_stok_produk` AFTER INSERT ON `pembelians` FOR EACH ROW BEGIN
    UPDATE produks SET stok=stok-NEW.jumlah
    WHERE produk_id=NEW.produk_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_update_stok_produk_hapus` AFTER DELETE ON `pembelians` FOR EACH ROW BEGIN
    UPDATE produks SET stok=stok+old.Jumlah
    WHERE produk_id=old.produk_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_update_stok_produk_ubah` AFTER UPDATE ON `pembelians` FOR EACH ROW BEGIN 
    UPDATE produks SET stok=(stok+old.jumlah)-NEW.jumlah 
    WHERE produk_id=NEW.produk_id; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualans`
--

CREATE TABLE `penjualans` (
  `penjualan_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `pelanggan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `produk_id` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualans`
--

INSERT INTO `penjualans` (`penjualan_id`, `keterangan`, `pelanggan_id`, `produk_id`, `stok`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 'Ditambahkan oleh samsul,  pada 2024-04-07 06:14:47', 10, 4, 4, 492.00, '2024-04-06 23:14:47', '2024-04-06 23:14:47'),
(2, 'Ditambahkan oleh samsul,  pada 2024-04-07 06:14:47', 10, 5, 3, 90000.00, '2024-04-06 23:14:47', '2024-04-06 23:14:47'),
(3, 'Ditambahkan oleh samsul,  pada 2024-04-07 06:14:47', 10, 7, 1, 123.00, '2024-04-06 23:14:47', '2024-04-06 23:14:47'),
(4, 'Ditambahkan oleh samsul,  pada 2024-04-07 06:14:47', 10, 169, 1, 123.00, '2024-04-06 23:14:47', '2024-04-06 23:14:47'),
(5, 'Ditambahkan oleh samsul,  pada 2024-04-07 06:38:00', 11, 7, 1, 123.00, '2024-04-06 23:38:00', '2024-04-06 23:38:00'),
(6, 'Ditambahkan oleh samsul,  pada 2024-04-07 06:38:55', 12, 4, 1, 123.00, '2024-04-06 23:38:55', '2024-04-06 23:38:55'),
(7, 'Ditambahkan oleh samsul,  pada 2024-04-07 06:38:55', 12, 5, 1, 30000.00, '2024-04-06 23:38:55', '2024-04-06 23:38:55'),
(8, 'Ditambahkan oleh wqe,  pada 2024-04-07 06:39:49', 13, 4, 1, 123.00, '2024-04-06 23:39:49', '2024-04-06 23:39:49'),
(9, 'Ditambahkan oleh samsul,  pada 2024-04-07 07:14:17', 15, 4, 1, 123.00, '2024-04-07 00:14:17', '2024-04-07 00:14:17'),
(10, 'Ditambahkan oleh 123,  pada 2024-04-07 07:15:23', 16, 4, 1, 123.00, '2024-04-07 00:15:23', '2024-04-07 00:15:23'),
(11, 'Ditambahkan oleh samsul,  pada 2024-04-07 07:16:08', 17, 4, 1, 123.00, '2024-04-07 00:16:08', '2024-04-07 00:16:08'),
(12, 'Ditambahkan oleh samsul,  pada 2024-04-07 07:16:08', 17, 5, 1, 30000.00, '2024-04-07 00:16:08', '2024-04-07 00:16:08'),
(13, 'Ditambahkan oleh samsul12312,  pada 2024-04-07 07:16:53', 18, 4, 1, 123.00, '2024-04-07 00:16:53', '2024-04-07 00:16:53'),
(14, 'Ditambahkan oleh samsul12312,  pada 2024-04-07 07:16:53', 18, 5, 1, 30000.00, '2024-04-07 00:16:53', '2024-04-07 00:16:53'),
(15, 'Ditambahkan oleh asdasd,  pada 2024-04-07 07:33:08', 19, 4, 1, 123.00, '2024-04-07 00:33:08', '2024-04-07 00:33:08'),
(16, 'Ditambahkan oleh asdads,  pada 2024-04-07 07:34:36', 20, 4, 1, 123.00, '2024-04-07 00:34:36', '2024-04-07 00:34:36'),
(17, 'Ditambahkan oleh asdads,  pada 2024-04-07 07:34:36', 20, 5, 1, 30000.00, '2024-04-07 00:34:36', '2024-04-07 00:34:36'),
(18, 'Ditambahkan oleh asdads,  pada 2024-04-07 07:35:14', 21, 4, 1, 123.00, '2024-04-07 00:35:14', '2024-04-07 00:35:14'),
(19, 'Ditambahkan oleh asdads,  pada 2024-04-07 07:35:14', 21, 5, 1, 30000.00, '2024-04-07 00:35:14', '2024-04-07 00:35:14'),
(20, 'Ditambahkan oleh asdads,  pada 2024-04-07 07:35:59', 22, 4, 1, 123.00, '2024-04-07 00:35:59', '2024-04-07 00:35:59'),
(21, 'Ditambahkan oleh asdads,  pada 2024-04-07 07:35:59', 22, 5, 1, 30000.00, '2024-04-07 00:35:59', '2024-04-07 00:35:59'),
(22, 'Ditambahkan oleh samsul,  pada 2024-04-07 07:36:27', 23, 4, 1, 123.00, '2024-04-07 00:36:27', '2024-04-07 00:36:27'),
(23, 'Ditambahkan oleh asdas,  pada 2024-04-07 07:49:30', 29, 4, 1, 123.00, '2024-04-07 00:49:30', '2024-04-07 00:49:30'),
(24, 'Ditambahkan oleh samsul,  pada 2024-04-07 07:52:07', 3, 4, 1, 123.00, '2024-04-07 00:52:07', '2024-04-07 00:52:07'),
(25, 'Ditambahkan oleh samsul,  pada 2024-04-07 07:52:07', 3, 5, 1, 30000.00, '2024-04-07 00:52:07', '2024-04-07 00:52:07'),
(26, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:07:18', 5, 4, 1, 123.00, '2024-04-07 01:07:18', '2024-04-07 01:07:18'),
(27, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:17:43', 6, 4, 1, 123.00, '2024-04-07 01:17:43', '2024-04-07 01:17:43'),
(28, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:17:43', 6, 5, 1, 30000.00, '2024-04-07 01:17:43', '2024-04-07 01:17:43'),
(29, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:17:55', 7, 4, 1, 123.00, '2024-04-07 01:17:55', '2024-04-07 01:17:55'),
(30, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:17:55', 7, 5, 1, 30000.00, '2024-04-07 01:17:55', '2024-04-07 01:17:55'),
(31, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:18:36', 8, 4, 1, 123.00, '2024-04-07 01:18:36', '2024-04-07 01:18:36'),
(32, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:18:36', 8, 5, 1, 30000.00, '2024-04-07 01:18:36', '2024-04-07 01:18:36'),
(33, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:19:14', 9, 4, 1, 123.00, '2024-04-07 01:19:14', '2024-04-07 01:19:14'),
(34, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:19:14', 9, 5, 1, 30000.00, '2024-04-07 01:19:14', '2024-04-07 01:19:14'),
(35, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:20:17', 10, 4, 1, 123.00, '2024-04-07 01:20:17', '2024-04-07 01:20:17'),
(36, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:20:17', 10, 5, 1, 30000.00, '2024-04-07 01:20:17', '2024-04-07 01:20:17'),
(37, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:20:33', 11, 4, 1, 123.00, '2024-04-07 01:20:33', '2024-04-07 01:20:33'),
(38, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:20:33', 11, 5, 1, 30000.00, '2024-04-07 01:20:33', '2024-04-07 01:20:33'),
(39, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:20:46', 12, 4, 1, 123.00, '2024-04-07 01:20:46', '2024-04-07 01:20:46'),
(40, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:20:46', 12, 5, 1, 30000.00, '2024-04-07 01:20:46', '2024-04-07 01:20:46'),
(41, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:21:14', 13, 4, 1, 123.00, '2024-04-07 01:21:14', '2024-04-07 01:21:14'),
(42, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:21:14', 13, 5, 1, 30000.00, '2024-04-07 01:21:14', '2024-04-07 01:21:14'),
(43, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:55:33', 14, 4, 1, 123.00, '2024-04-07 01:55:33', '2024-04-07 01:55:33'),
(44, 'Ditambahkan oleh samsul,  pada 2024-04-07 08:55:33', 14, 5, 1, 30000.00, '2024-04-07 01:55:33', '2024-04-07 01:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`produk_id`, `nama_produk`, `image`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(4, 'margarin', 'margarin-1711604078.jpg', 123.00, 34, '2024-03-27 22:34:38', '2024-04-07 01:55:33'),
(5, 'kue blueberry', 'kue blueberry-1711605340.jpg', 30000.00, 43, '2024-03-27 22:55:40', '2024-04-07 01:55:33'),
(7, '123', '123-1711605360.jpg', 123.00, 153, '2024-03-27 22:56:00', '2024-04-06 23:38:00'),
(169, 'keju', 'keju-1712139256.jpg', 123.00, 119, '2024-04-03 03:14:16', '2024-04-06 23:14:47'),
(170, 'salad', 'salad-1712139298.jpg', 123.00, 123, '2024-04-03 03:14:58', '2024-04-06 20:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `produk_logs`
--

CREATE TABLE `produk_logs` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('ch7ulQsjlwRt2VwF627XdO31vNcZeGoGzmmEiu5I', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia2RTQUJrQlZKZkQ4N2IySXRMZldPY2Y4UGRCczJXWDd0RVY5cTlheiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW1iZWxpYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImRhdGEiO2E6Mjp7czo2OiJfdG9rZW4iO3M6NDA6ImtkU0FCa0JWSmZEODdiMkl0TGZXT2NmOFBkQnMyV1g3dEVWOXE5YXoiO3M6NjoicHJvZHVrIjthOjI6e2k6NDthOjI6e3M6NzoiY2hlY2tlZCI7czoxOiI0IjtzOjY6Imp1bWxhaCI7czoxOiIxIjt9aTo1O2E6Mjp7czo3OiJjaGVja2VkIjtzOjE6IjUiO3M6NjoianVtbGFoIjtzOjE6IjEiO319fXM6MTE6InRvdGFsX2hhcmdhIjtkOjMwMTIzO30=', 1712480157);

-- --------------------------------------------------------

--
-- Table structure for table `struks`
--

CREATE TABLE `struks` (
  `struk_id` bigint(20) UNSIGNED NOT NULL,
  `pembelian_id` bigint(20) UNSIGNED NOT NULL,
  `struk` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struks`
--

INSERT INTO `struks` (`struk_id`, `pembelian_id`, `struk`, `created_at`, `updated_at`) VALUES
(1, 36, 'INV-2024-0001', '2024-04-07 01:55:33', '2024-04-07 01:55:33'),
(2, 37, 'INV-2024-0037', '2024-04-07 01:55:33', '2024-04-07 01:55:33');

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
-- Indexes for table `detailpenjualans`
--
ALTER TABLE `detailpenjualans`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `detailpenjualans_penjualan_id_foreign` (`penjualan_id`),
  ADD KEY `detailpenjualans_produk_id_foreign` (`produk_id`);

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
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`pembelian_id`),
  ADD KEY `pembelians_produk_id_foreign` (`produk_id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD KEY `penjualans_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `produk_logs`
--
ALTER TABLE `produk_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `struks`
--
ALTER TABLE `struks`
  ADD PRIMARY KEY (`struk_id`),
  ADD KEY `struks_pembelian_id_foreign` (`pembelian_id`);

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
-- AUTO_INCREMENT for table `detailpenjualans`
--
ALTER TABLE `detailpenjualans`
  MODIFY `detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `pelanggan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `pembelian_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `penjualan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `produk_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `produk_logs`
--
ALTER TABLE `produk_logs`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `struks`
--
ALTER TABLE `struks`
  MODIFY `struk_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailpenjualans`
--
ALTER TABLE `detailpenjualans`
  ADD CONSTRAINT `detailpenjualans_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualans` (`penjualan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detailpenjualans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`produk_id`);

--
-- Constraints for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD CONSTRAINT `pembelians_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`pelanggan_id`),
  ADD CONSTRAINT `pembelians_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`produk_id`);

--
-- Constraints for table `penjualans`
--
ALTER TABLE `penjualans`
  ADD CONSTRAINT `penjualans_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`pelanggan_id`);

--
-- Constraints for table `struks`
--
ALTER TABLE `struks`
  ADD CONSTRAINT `struks_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelians` (`pembelian_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
