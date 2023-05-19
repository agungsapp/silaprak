-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 08:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silaprak`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'super-admin', 'super admin'),
(2, 'dosen', 'dosen'),
(3, 'mahasiswa', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 6),
(2, 3),
(2, 8),
(2, 9),
(3, 1),
(3, 10),
(3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'banding', NULL, '2022-12-28 08:38:27', 0),
(2, '::1', 'banding', NULL, '2022-12-28 08:38:38', 0),
(3, '::1', 'agungsapp', NULL, '2022-12-28 08:38:50', 0),
(4, '::1', 'agung.dni19@gmail.com', 1, '2022-12-28 08:43:57', 1),
(5, '::1', 'dosen@mail.com', 2, '2022-12-28 11:10:02', 1),
(6, '::1', 'dosen@mail.com', 3, '2022-12-28 11:11:35', 1),
(7, '::1', 'agung.dni19@gmail.com', 1, '2022-12-28 23:14:39', 1),
(8, '::1', 'dosen@mail.com', 3, '2022-12-29 00:34:30', 1),
(9, '::1', 'agung.dni19@gmail.com', 1, '2022-12-29 07:45:11', 1),
(10, '::1', 'agung.dni19@gmail.com', 1, '2022-12-29 09:29:42', 1),
(11, '::1', 'agung.dni19@gmail.com', 1, '2022-12-29 09:42:40', 1),
(12, '::1', 'agung.dni19@gmail.com', 1, '2022-12-30 08:41:55', 1),
(13, '::1', 'agung.dni19@gmail.com', 1, '2022-12-31 18:23:56', 1),
(14, '::1', 'dosen@mail.com', 3, '2022-12-31 21:06:31', 1),
(15, '::1', 'agung.dni19@gmail.com', 1, '2023-01-01 01:19:19', 1),
(16, '::1', 'dosen', NULL, '2023-01-01 01:27:19', 0),
(17, '::1', 'dosen', NULL, '2023-01-01 01:27:25', 0),
(18, '::1', 'dosen@mail.com', 3, '2023-01-01 01:27:30', 1),
(19, '::1', 'fauzan', NULL, '2023-01-01 11:46:43', 0),
(20, '::1', 'dosen@mail.com', 3, '2023-01-01 11:47:13', 1),
(21, '::1', 'superadmin@mail.com', 5, '2023-01-01 11:57:24', 1),
(22, '::1', 'agung.dni19@gmail.com', 1, '2023-01-03 08:37:13', 1),
(23, '::1', 'agung.dni19@gmail.com', 1, '2023-01-03 08:44:00', 1),
(24, '::1', 'dosen@mail.com', 3, '2023-01-03 08:44:44', 1),
(25, '::1', 'dosen@mail.com', 3, '2023-01-03 19:26:09', 1),
(26, '::1', 'dosen@mail.com', 3, '2023-01-03 21:16:15', 1),
(27, '::1', 'dosen@mail.com', 3, '2023-01-03 21:16:54', 1),
(28, '::1', 'dosen@mail.com', 3, '2023-01-03 21:17:56', 1),
(29, '::1', 'dosen@mail.com', 3, '2023-01-03 21:19:38', 1),
(30, '::1', 'dosen@mail.com', 3, '2023-01-03 21:20:21', 1),
(31, '::1', 'agung.dni19@gmail.com', 1, '2023-01-03 21:27:46', 1),
(32, '::1', 'agung.dni19@gmail.com', 1, '2023-01-03 21:28:32', 1),
(33, '::1', 'super', NULL, '2023-01-03 21:29:39', 0),
(34, '::1', 'super', NULL, '2023-01-03 21:29:51', 0),
(35, '::1', 'superadmin@mail.com', 5, '2023-01-03 21:34:55', 1),
(36, '::1', 'dosen@mail.com', 3, '2023-01-03 21:41:23', 1),
(37, '::1', 'dosen@mail.com', 3, '2023-01-04 10:35:40', 1),
(38, '::1', 'dosen@mail.com', 3, '2023-01-04 19:14:11', 1),
(39, '::1', 'dosen@mail.com', 3, '2023-01-05 00:24:29', 1),
(40, '::1', 'fauzan', NULL, '2023-01-05 03:08:53', 0),
(41, '::1', 'dosen@mail.com', 3, '2023-01-05 03:08:58', 1),
(42, '::1', 'dosen@mail.com', 3, '2023-01-05 09:21:56', 1),
(43, '::1', 'fauzan', NULL, '2023-01-13 07:24:33', 0),
(44, '::1', 'dosen@mail.com', 3, '2023-01-13 07:24:39', 1),
(45, '::1', 'super', NULL, '2023-01-13 08:11:32', 0),
(46, '::1', 'super', NULL, '2023-01-13 08:15:42', 0),
(47, '::1', 'super', NULL, '2023-01-13 08:29:53', 0),
(48, '::1', 'superadmin@mail.com', 6, '2023-01-13 08:30:01', 1),
(49, '::1', 'agung.dni19@gmail.com', 1, '2023-01-13 08:30:57', 1),
(50, '::1', 'dosen@mail.com', 3, '2023-01-13 08:31:10', 1),
(51, '::1', 'dosen@mail.com', 3, '2023-01-13 11:39:15', 1),
(52, '::1', 'agung.dni19@gmail.com', 1, '2023-01-13 12:33:26', 1),
(53, '::1', 'agung.dni19@gmail.com', 1, '2023-01-13 16:56:39', 1),
(54, '::1', 'agung.dni19@gmail.com', 1, '2023-01-13 17:00:24', 1),
(55, '::1', 'dosen@mail.com', 3, '2023-01-13 22:42:36', 1),
(56, '::1', 'agung.dni19@gmail.com', 1, '2023-01-13 22:47:39', 1),
(57, '::1', 'dosen@mail.com', 3, '2023-01-13 23:17:14', 1),
(58, '::1', 'dosen@mail.com', 3, '2023-01-13 23:26:23', 1),
(59, '::1', 'agung.dni19@gmail.com', 1, '2023-01-13 23:26:30', 1),
(60, '::1', 'agung.dni19@gmail.com', 1, '2023-01-13 23:57:34', 1),
(61, '::1', 'agung.dni19@gmail.com', 1, '2023-01-13 23:58:44', 1),
(62, '::1', 'dosen@mail.com', 3, '2023-01-14 00:26:23', 1),
(63, '::1', 'dosen@mail.com', 3, '2023-01-14 00:27:55', 1),
(64, '::1', 'agung.dni19@gmail.com', 1, '2023-01-14 00:30:11', 1),
(65, '::1', 'fauzan', NULL, '2023-01-14 00:33:57', 0),
(66, '::1', 'dosen@mail.com', 3, '2023-01-14 00:34:01', 1),
(67, '::1', 'agung.dni19@gmail.com', 1, '2023-01-14 00:34:28', 1),
(68, '::1', 'agung.dni19@gmail.com', 1, '2023-01-15 01:12:04', 1),
(69, '::1', 'dosen@mail.com', 3, '2023-01-15 02:12:47', 1),
(70, '::1', 'dosen2@mail.com', 7, '2023-01-15 02:51:03', 1),
(71, '::1', 'dosen2@mail.com', 8, '2023-01-15 02:53:54', 1),
(72, '::1', 'mahasiswa@mail.com', 10, '2023-01-15 02:56:42', 1),
(73, '::1', 'dosen3@mail.com', 9, '2023-01-15 02:57:28', 1),
(74, '::1', 'mahasiswa@mail.com', 10, '2023-01-15 02:59:16', 1),
(75, '::1', 'fauzan', NULL, '2023-01-15 02:59:44', 0),
(76, '::1', 'dosen@mail.com', 3, '2023-01-15 02:59:47', 1),
(77, '::1', 'agung.dni19@gmail.com', 1, '2023-01-15 03:02:59', 1),
(78, '::1', 'dosen2@mail.com', 8, '2023-01-15 03:03:17', 1),
(79, '::1', 'mahasiswa@mail.com', 10, '2023-01-15 03:04:24', 1),
(80, '192.168.1.7', 'agung.dni19@gmail.com', 1, '2023-01-15 12:26:04', 1),
(81, '192.168.1.6', 'agung.dni19@gmail.com', 1, '2023-01-15 12:26:09', 1),
(82, '192.168.1.6', 'agung.sapp', NULL, '2023-01-19 01:19:37', 0),
(83, '192.168.1.6', 'agungsapp', NULL, '2023-01-19 01:19:58', 0),
(84, '192.168.1.6', 'agung.dni19@gmail.com', 1, '2023-01-19 01:20:08', 1),
(85, '192.168.1.6', 'rahmalia', NULL, '2023-01-19 01:22:17', 0),
(86, '192.168.1.6', 'dosen3@mail.com', 9, '2023-01-19 01:22:23', 1),
(87, '::1', 'dosen@mail.com', 3, '2023-01-19 01:36:53', 1),
(88, '::1', 'dosen@mail.com', 3, '2023-01-20 06:57:58', 1),
(89, '::1', 'ramalia', NULL, '2023-01-20 15:05:16', 0),
(90, '::1', 'ramalia', NULL, '2023-01-20 15:05:23', 0),
(91, '::1', 'dosen3@mail.com', 9, '2023-01-20 15:05:28', 1),
(92, '::1', 'dosen3@mail.com', 9, '2023-01-20 15:11:56', 1),
(93, '::1', 'agung.dni19@gmail.com', 1, '2023-01-21 04:15:06', 1),
(94, '::1', 'putriintanutami14@gmail.com', 11, '2023-01-21 05:16:28', 1),
(95, '::1', 'mahasiswa@mail.com', 10, '2023-01-24 01:32:50', 1),
(96, '::1', 'dosen@mail.com', 3, '2023-01-24 02:26:03', 1),
(97, '::1', 'dosen@mail.com', 3, '2023-01-24 11:59:26', 1),
(98, '::1', 'agung.dni19@gmail.com', 1, '2023-01-24 14:19:31', 1),
(99, '::1', 'dosen@mail.com', 3, '2023-01-24 14:24:16', 1),
(100, '::1', 'agungsapp', NULL, '2023-01-24 15:47:04', 0),
(101, '::1', 'agung.dni19@gmail.com', 1, '2023-01-24 15:47:08', 1),
(102, '::1', 'dosen@mail.com', 3, '2023-01-24 16:14:06', 1),
(103, '::1', 'agung.dni19@gmail.com', 1, '2023-01-24 16:25:34', 1),
(104, '192.168.1.3', 'agung.dni19@gmail.com', 1, '2023-01-24 17:14:13', 1),
(105, '192.168.1.3', 'dosen@mail.com', 3, '2023-01-24 17:19:45', 1),
(106, '::1', 'agung.dni19@gmail.com', 1, '2023-01-27 05:08:01', 1),
(107, '::1', 'dosen@mail.com', 3, '2023-01-30 08:21:20', 1),
(108, '::1', 'dosen@mail.com', 3, '2023-01-30 13:22:23', 1),
(109, '::1', 'dosen@mail.com', 3, '2023-01-31 05:19:02', 1),
(110, '::1', 'agung.dni19@gmail.com', 1, '2023-01-31 05:20:29', 1),
(111, '::1', 'sample', NULL, '2023-01-31 05:25:07', 0),
(112, '::1', 'sample', NULL, '2023-01-31 05:25:12', 0),
(113, '::1', 'dosen@mail.com', 3, '2023-01-31 05:25:16', 1),
(114, '::1', 'agung.dni19@gmail.com', 1, '2023-01-31 05:26:47', 1),
(115, '::1', 'dosen@mail.com', 3, '2023-01-31 05:34:38', 1),
(116, '::1', 'agung.dni19@gmail.com', 1, '2023-01-31 06:26:03', 1),
(117, '::1', 'dosen@mail.com', 3, '2023-01-31 06:27:00', 1),
(118, '::1', 'agung.dni19@gmail.com', 1, '2023-01-31 06:28:27', 1),
(119, '::1', 'dosen@mail.com', 3, '2023-01-31 06:38:09', 1),
(120, '::1', 'dosen@mail.com', 3, '2023-02-01 01:49:59', 1),
(121, '::1', 'agung.dni19@gmail.com', 1, '2023-02-01 02:01:15', 1),
(122, '::1', 'agung.dni19@gmail.com', 1, '2023-02-01 02:02:44', 1),
(123, '::1', 'dosen@mail.com', 3, '2023-02-01 02:02:50', 1),
(124, '::1', 'agung.dni19@gmail.com', 1, '2023-02-01 08:54:04', 1),
(125, '::1', 'agung.dni19@gmail.com', 1, '2023-02-01 22:07:24', 1),
(126, '::1', 'agung.dni19@gmail.com', 1, '2023-02-02 02:45:54', 1),
(127, '::1', 'agung.dni19@gmail.com', 1, '2023-02-02 05:30:06', 1),
(128, '::1', 'agung.dni19@gmail.com', 1, '2023-02-02 09:15:23', 1),
(129, '::1', 'agung.dni19@gmail.com', 1, '2023-02-02 12:41:30', 1),
(130, '::1', 'agung.dni19@gmail.com', 1, '2023-02-02 14:48:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-profile', 'manajemen profile'),
(2, 'manage-dosen', 'manajemen data dosen'),
(3, 'manage-student', 'manajemen data mahasiswa'),
(4, 'manage-class', 'manajemen data kelas'),
(5, 'manage-score', 'manajemen data nilai');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pertemuan`
--

CREATE TABLE `detail_pertemuan` (
  `id` int(20) NOT NULL,
  `kode_mk` varchar(11) NOT NULL,
  `kode_dosen` int(11) NOT NULL,
  `kode_pertemuan` int(11) NOT NULL,
  `kode_tugas` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pertemuan`
--

INSERT INTO `detail_pertemuan` (`id`, `kode_mk`, `kode_dosen`, `kode_pertemuan`, `kode_tugas`, `created_at`, `updated_at`) VALUES
(1, 'TI-2001', 3, 1, 1, NULL, NULL),
(2, 'TI-2001', 3, 2, 2, '2023-01-05 00:46:14', '2023-01-05 00:46:14'),
(3, 'TI-2001', 3, 3, 3, '2023-01-05 00:46:23', '2023-01-05 00:46:23'),
(9, 'TI-2005', 9, 1, 0, '2023-01-15 02:58:40', '2023-01-15 02:58:40'),
(10, 'TI-2005', 9, 2, NULL, '2023-01-15 02:58:43', '2023-01-15 02:58:43'),
(11, 'TI-2005', 9, 3, NULL, '2023-01-15 02:58:51', '2023-01-15 02:58:51'),
(12, 'TI-2005', 9, 4, NULL, '2023-01-15 02:58:54', '2023-01-15 02:58:54'),
(13, 'TI-2005', 9, 5, NULL, '2023-01-15 02:58:57', '2023-01-15 02:58:57'),
(14, 'TI-2007', 3, 1, 0, '2023-01-24 14:37:57', '2023-01-24 14:37:57'),
(15, 'TI-2011', 3, 1, 13, '2023-01-31 05:19:31', '2023-01-31 05:19:31'),
(16, 'TI-2011', 3, 2, 12, '2023-01-31 05:19:35', '2023-01-31 05:19:35'),
(17, 'TI-2011', 3, 3, NULL, '2023-01-31 05:19:37', '2023-01-31 05:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `first_name`, `last_name`, `username`, `email`, `nip`) VALUES
(3, 'Sample', 'Dosen S.kom,. M.T.i', 'sample', 'dosen@mail.com', '1010101010'),
(8, 'sulyono', 'S.kom, . M.T.i', 'sulyono', 'dosen2@mail.com', ''),
(9, 'rahmalia', 'syahputri, S.kom, M.Eng', 'rahmalia', 'dosen3@mail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mahasiswa`
--

CREATE TABLE `kelas_mahasiswa` (
  `id_kelas` int(11) NOT NULL,
  `kode_mk` varchar(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_mahasiswa`
--

INSERT INTO `kelas_mahasiswa` (`id_kelas`, `kode_mk`, `id_dosen`, `id_mahasiswa`, `created_at`, `updated_at`) VALUES
(4, 'TI-2005', 9, 1, '2023-01-15 12:27:20', '2023-01-15 12:27:20'),
(5, 'TI-2001', 3, 1, '2023-01-19 01:21:15', '2023-01-19 01:21:15'),
(6, 'TI-2001', 3, 11, '2023-01-21 05:16:55', '2023-01-21 05:16:55'),
(7, 'TI-2005', 9, 10, '2023-01-24 01:33:06', '2023-01-24 01:33:06'),
(8, 'TI-2011', 3, 1, '2023-01-31 05:20:47', '2023-01-31 05:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_praktikum`
--

CREATE TABLE `laporan_praktikum` (
  `id_laporan` int(11) NOT NULL,
  `kode_mk` varchar(11) NOT NULL,
  `kode_pertemuan` int(11) NOT NULL,
  `kode_tugas` int(11) NOT NULL,
  `laporan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `npm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `first_name`, `last_name`, `username`, `email`, `npm`) VALUES
(1, 'agung', 'saputra', 'agungsapp', 'agung.dni19@gmail.com', '1811010153'),
(10, 'putri', 'intan ', 'putri', 'mahasiswa@mail.com', '1811010178'),
(11, '', 'utami', 'putriintanutami123', 'putriintanutami14@gmail.com', '21320016');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` varchar(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `mata_kuliah` varchar(50) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `sks` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mk`, `id_dosen`, `mata_kuliah`, `hari`, `sks`, `jam`, `created_at`, `updated_at`) VALUES
('TI-2001', 3, 'Struktur Data', 'senin', '4', '07.10-08.40', '2022-12-28 11:57:00', '2022-12-28 11:57:00'),
('TI-2005', 9, 'keamanan komputer dan jaringan', 'senin', '4', '07.10-08.40', '2023-01-15 02:57:48', '2023-01-15 02:57:48'),
('TI-2006', 9, 'mobile security', 'senin', '4', '10.30-12.00', '2023-01-15 02:58:16', '2023-01-15 02:58:16'),
('TI-2007', 3, 'Database technology', 'rabu', '4', '10.30-14.30', '2023-01-15 03:02:39', '2023-01-15 03:02:39'),
('TI-2008', 8, 'Pemrograman menengah', 'selasa', '4', '13.00-16.10', '2023-01-15 03:03:40', '2023-01-15 03:03:40'),
('TI-2009', 8, 'Pemrograman Dasar', 'rabu', '4', '13.00-16.10', '2023-01-15 03:03:53', '2023-01-15 03:03:53'),
('TI-2010', 8, 'Pemrograman Lanjut', 'rabu', '4', '13.00-14.30', '2023-01-15 03:04:13', '2023-01-15 03:04:13'),
('TI-2011', 3, 'kelas baru', 'senin', '2', '07.10-08.40', '2023-01-31 05:19:25', '2023-01-31 05:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1672238228, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(20) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `huruf_mutu` varchar(20) NOT NULL,
  `nilai_angka` int(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`id`, `nama`) VALUES
(1, 'pertemuan 1'),
(2, 'pertemuan 2'),
(3, 'pertemuan 3'),
(4, 'pertemuan 4'),
(5, 'pertemuan 5'),
(6, 'pertemuan 6'),
(7, 'pertemuan 7'),
(8, 'pertemuan 8'),
(9, 'pertemuan 9'),
(10, 'pertemuan 10'),
(11, 'pertemuan 11'),
(12, 'pertemuan 12'),
(13, 'pertemuan 13'),
(14, 'pertemuan 14');

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan_mahasiswa`
--

CREATE TABLE `pertemuan_mahasiswa` (
  `id_pertemuan_mhs` int(11) NOT NULL,
  `id_pertemuan` int(11) NOT NULL,
  `kode_mk` varchar(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_tugas` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `kode_mk` varchar(11) NOT NULL,
  `id_pertemuan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `file_instruksi` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `kode_mk`, `id_pertemuan`, `judul`, `deskripsi`, `deadline`, `file_instruksi`, `created_at`, `updated_at`) VALUES
(1, 'TI-2001', 1, 'pertama', 'pertama', '0000-00-00 00:00:00', 'adminojs,+Journal+manager,+22-99Z_Article+Text-96-1-11-20170413_6.pdf', '2023-01-24 15:23:46', '2023-01-24 15:23:46'),
(2, 'TI-2001', 2, 'kedua', 'kedua', '0000-00-00 00:00:00', 'cover new_2.pdf', '2023-01-24 15:24:35', '2023-01-24 15:24:35'),
(3, 'TI-2001', 3, 'Ketiga', 'Deskripsi ketiga', '0000-00-00 00:00:00', 'KRS.pdf', '2023-01-24 17:33:52', '2023-01-24 17:33:52'),
(4, 'TI-2011', 15, 'inner join', 'buatlah bla bla bla ', '2023-02-04 01:00:00', 'hukum nun mati dan tanwin.pdf', '2023-01-31 05:20:18', '2023-01-31 05:20:18'),
(5, 'TI-2011', 15, 'esdfsdfs', 'sdfsdf', '2023-01-31 23:00:00', 'Skripsi_Yudhistira Satriatama_1811010114.pdf', '2023-01-31 05:25:49', '2023-01-31 05:25:49'),
(6, 'TI-2011', 16, 'qqrfsadfsd', 'sdfsdfsdf', '0000-00-00 00:00:00', 'Agung Saputra.docx', '2023-01-31 05:26:39', '2023-01-31 05:26:39'),
(7, 'TI-2011', 15, 'sasda', 'asdasd', '0000-00-00 00:00:00', 'Agung Saputra_1.docx', '2023-01-31 05:40:53', '2023-01-31 05:40:53'),
(8, 'TI-2011', 15, 'sasda', 'asdasd', '0000-00-00 00:00:00', 'Agung Saputra_2.docx', '2023-01-31 05:41:30', '2023-01-31 05:41:30'),
(9, 'TI-2011', 15, 'asdasdas', 'asdasda', '0000-00-00 00:00:00', 'Agung Saputra_4.docx', '2023-01-31 05:41:44', '2023-01-31 05:42:07'),
(10, 'TI-2011', 15, 'kelas baru', 'deksripsi kelas baru', '0000-00-00 00:00:00', 'Agung Saputra_5.docx', '2023-01-31 06:02:24', '2023-01-31 06:02:24'),
(11, 'TI-2011', 15, 'baru lagi', 'baru lagi', '0000-00-00 00:00:00', 'Agung Saputra_6.docx', '2023-01-31 06:04:48', '2023-01-31 06:04:48'),
(12, 'TI-2011', 16, 'tugas pertemuan dua kelas baru ', 'tugas pertemuan dua kelas baru ', '0000-00-00 00:00:00', 'Yudhistira Satriatama - CV_1.pdf', '2023-01-31 06:27:31', '2023-01-31 06:28:11'),
(13, 'TI-2011', 1, 'update pertemuan 1 matkul kelas baru ', 'update pertemuan 1 matkul kelas baru ', '0000-00-00 00:00:00', 'Agung Saputra_7.docx', '2023-01-31 06:43:18', '2023-01-31 06:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `npm` varchar(50) DEFAULT NULL,
  `userImage` varchar(255) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `firstName`, `lastName`, `npm`, `userImage`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'agung.dni19@gmail.com', 'agungsapp', 'agung', 'saputra', '1811010153', 'default.png', '$2y$10$ZgQFt5APbvUYwEiwFUOlL.QApzqPkb3U44v3HGafGLrynIeN./aIO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-12-28 08:43:33', '2023-01-14 00:42:21', NULL),
(3, 'dosen@mail.com', 'sample', 'Sample', 'Dosen S.kom,. M.T.i', '1010101010', 'default.png', '$2y$10$bX5U8xLcz2hVNApRypOovekJrtO6OLDbUMemh7oNkbKfiwjqw.lLi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-12-28 11:11:27', '2023-01-30 13:24:36', NULL),
(6, 'superadmin@mail.com', 'super', 'super', 'admin', '00000000000', 'default.png', '$2y$10$M9u9gHuy2MfzpPFqKOFYSuHLtcrQ505qVbZhOsUXuA68jb2E0Caw6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-13 08:29:42', '2023-01-13 08:29:42', NULL),
(8, 'dosen2@mail.com', 'sulyono', 'sulyono', 'S.kom, . M.T.i', '1010101010', 'default.png', '$2y$10$x4Q.3t9XJem104Nw.KGZmeZL6Mhhyr95U8VAGMUj3vaO6f8d1BWe6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-15 02:53:45', '2023-01-15 02:53:45', NULL),
(9, 'dosen3@mail.com', 'rahmalia', 'rahmalia', 'syahputri, S.kom, M.Eng', '1010101010', 'default.png', '$2y$10$wJevF0tsPYZuxpF4.w8pyeFJY4GzsD3oNHcTtRA8ICTZdgCCcDoj.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-15 02:54:54', '2023-01-15 02:54:54', NULL),
(10, 'mahasiswa@mail.com', 'putri', 'putri', 'intan ', '1811010178', 'default.png', '$2y$10$3K66dQeDzV3evcRhb55n7.1m4Xg7CNYBWLn1NwxaZLbRmhVOt813W', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-15 02:55:50', '2023-01-15 02:55:50', NULL),
(11, 'putriintanutami14@gmail.com', 'putriintanutami123', '', 'utami', '21320016', 'default.png', '$2y$10$8395F6tYsU9NFVK0vlt1wu2PMReoTibtQyBn2Wi3HI5VBchHXuWG.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-01-21 05:15:47', '2023-01-21 05:15:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `detail_pertemuan`
--
ALTER TABLE `detail_pertemuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `kode_pertemuan` (`kode_pertemuan`),
  ADD KEY `kode_dosen` (`kode_dosen`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `laporan_praktikum`
--
ALTER TABLE `laporan_praktikum`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertemuan_mahasiswa`
--
ALTER TABLE `pertemuan_mahasiswa`
  ADD PRIMARY KEY (`id_pertemuan_mhs`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pertemuan`
--
ALTER TABLE `detail_pertemuan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laporan_praktikum`
--
ALTER TABLE `laporan_praktikum`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pertemuan_mahasiswa`
--
ALTER TABLE `pertemuan_mahasiswa`
  MODIFY `id_pertemuan_mhs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_pertemuan`
--
ALTER TABLE `detail_pertemuan`
  ADD CONSTRAINT `detail_pertemuan_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
  ADD CONSTRAINT `kelas_mahasiswa_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_mahasiswa_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_mahasiswa_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertemuan_mahasiswa`
--
ALTER TABLE `pertemuan_mahasiswa`
  ADD CONSTRAINT `pertemuan_mahasiswa_ibfk_1` FOREIGN KEY (`id_pertemuan`) REFERENCES `detail_pertemuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
