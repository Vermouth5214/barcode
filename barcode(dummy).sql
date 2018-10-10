-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 04:23 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_control`
--

CREATE TABLE `access_control` (
  `id` int(11) NOT NULL,
  `user_level_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `content` text,
  `user_modified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`id`, `user_level_id`, `module_id`, `content`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'a', 1, '2018-10-04 09:00:27', '2018-10-04 09:00:27'),
(2, 1, 2, 'a', 1, '2018-10-04 09:00:27', '2018-10-04 09:00:27'),
(3, 1, 3, 'a', 1, '2018-10-04 09:00:27', '2018-10-04 09:00:27'),
(4, 1, 4, 'a', 1, '2018-10-04 09:00:27', '2018-10-04 09:00:27'),
(5, 1, 5, 'a', 1, '2018-10-04 09:00:27', '2018-10-04 09:00:27'),
(6, 2, 1, 'a', 1, '2018-10-04 09:00:35', '2018-10-04 09:00:35'),
(7, 2, 2, 'a', 1, '2018-10-04 09:00:35', '2018-10-04 09:00:35'),
(8, 2, 3, 'a', 1, '2018-10-04 09:00:35', '2018-10-04 09:00:35'),
(9, 2, 4, 'a', 1, '2018-10-04 09:00:35', '2018-10-04 09:00:35'),
(10, 2, 5, 'a', 1, '2018-10-04 09:00:35', '2018-10-04 09:00:35'),
(11, 3, 1, 'v', 1, '2018-10-04 09:00:50', '2018-10-04 09:00:50'),
(12, 3, 2, 'v', 1, '2018-10-04 09:00:50', '2018-10-04 09:00:50'),
(13, 3, 3, 'v', 1, '2018-10-04 09:00:50', '2018-10-04 09:00:50'),
(14, 3, 4, 'v', 1, '2018-10-04 09:00:50', '2018-10-04 09:00:50'),
(15, 3, 5, 'v', 1, '2018-10-04 09:00:50', '2018-10-04 09:00:50'),
(16, 4, 1, 'v', 1, '2018-10-04 09:00:56', '2018-10-04 09:00:56'),
(17, 4, 2, 'v', 1, '2018-10-04 09:00:56', '2018-10-04 09:00:56'),
(18, 4, 3, 'v', 1, '2018-10-04 09:00:56', '2018-10-04 09:00:56'),
(19, 4, 4, 'v', 1, '2018-10-04 09:00:56', '2018-10-04 09:00:56'),
(20, 4, 5, 'v', 1, '2018-10-04 09:00:56', '2018-10-04 09:00:56'),
(21, 5, 1, 'v', 1, '2018-10-04 09:01:02', '2018-10-04 09:01:02'),
(22, 5, 2, 'v', 1, '2018-10-04 09:01:02', '2018-10-04 09:01:02'),
(23, 5, 3, 'v', 1, '2018-10-04 09:01:02', '2018-10-04 09:01:02'),
(24, 5, 4, 'v', 1, '2018-10-04 09:01:02', '2018-10-04 09:01:02'),
(25, 5, 5, 'v', 1, '2018-10-04 09:01:02', '2018-10-04 09:01:02'),
(26, 6, 1, 'a', 1, '2018-10-04 09:01:11', '2018-10-04 09:01:11'),
(27, 6, 2, 'a', 1, '2018-10-04 09:01:11', '2018-10-04 09:01:11'),
(28, 6, 3, 'a', 1, '2018-10-04 09:01:11', '2018-10-04 09:01:11'),
(29, 6, 4, 'a', 1, '2018-10-04 09:01:11', '2018-10-04 09:01:11'),
(30, 6, 5, 'a', 1, '2018-10-04 09:01:11', '2018-10-04 09:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `hadiah`
--

CREATE TABLE `hadiah` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `jumlah` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hadiah`
--

INSERT INTO `hadiah` (`id`, `nama`, `active`, `jumlah`, `created_at`, `updated_at`, `user_modified`) VALUES
(1, 'Payung', 1, 10, '2018-10-09 03:55:51', '2018-10-09 03:55:51', 2),
(2, 'Motor', 1, 5, '2018-10-09 03:56:00', '2018-10-09 03:56:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `media_library`
--

CREATE TABLE `media_library` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_library`
--

INSERT INTO `media_library` (`id`, `name`, `type`, `url`, `size`, `user_created`, `created_at`, `updated_at`) VALUES
(0, 'noprofileimage', 'png', 'img/noprofileimage.png', '1159', 1, '2017-05-29 19:56:03', '2017-05-29 19:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(20) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `slug`, `active`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, 'Master User Level', 'users-level', 1, 1, '2017-10-17 07:07:07', '2017-10-17 07:43:43'),
(2, 'Master User', 'users-user', 1, 1, '2017-10-17 07:16:51', '2017-10-17 07:49:30'),
(3, 'Media Library', 'media-library', 1, 1, '2017-10-17 07:19:28', '2018-06-03 05:40:18'),
(4, 'Daftar Peserta', 'daftar-peserta', 1, 1, '2018-10-02 02:59:48', '2018-10-02 02:59:48'),
(5, 'Daftar Hadiah', 'daftar-hadiah', 1, 1, '2018-10-02 06:29:01', '2018-10-02 06:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `NIK` varchar(45) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` text,
  `no_undangan` text,
  `active` int(1) NOT NULL DEFAULT '1',
  `phone` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `hadir` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `NIK`, `nama`, `alamat`, `no_undangan`, `active`, `phone`, `created_at`, `updated_at`, `user_modified`, `hadir`) VALUES
(1, '01100002', 'AAA', 'AAA', '01100002', 1, '08580687639', '2018-10-05 01:41:56', '2018-10-05 01:51:19', 2, 1),
(2, '01100004', 'BBB', 'BBB', '01100004', 1, '08383777729', '2018-10-05 01:42:16', '2018-10-10 01:01:37', 3, 0),
(3, '01200024', 'CCC', 'CCC', '01200024', 1, '08383777729', '2018-10-05 01:43:39', '2018-10-05 01:49:15', 2, 1),
(4, '01200040', 'DDD', 'DDD', '01200040', 1, '08383777729', '2018-10-05 01:43:56', '2018-10-05 01:43:56', 2, 0),
(5, '01202001', 'EEE', 'EEE', '01202001', 1, '08383777729', '2018-10-05 01:44:17', '2018-10-05 01:51:53', 2, 1),
(6, '01203011', 'FFF', 'FFF', '01203011', 1, '08383777729', '2018-10-05 01:44:34', '2018-10-05 01:50:07', 2, 1),
(7, '01204001', 'GGG', 'GGG', '01204001', 1, '08383777729', '2018-10-05 01:44:57', '2018-10-05 01:44:57', 2, 0),
(8, '01204019', 'HHH', 'HHH', '01204019', 1, '08383777729', '2018-10-05 01:45:11', '2018-10-05 01:45:11', 2, 0),
(9, '01206001', 'JJJ', 'JJJ', '01206001', 1, '08383777729', '2018-10-05 01:45:26', '2018-10-05 01:45:26', 2, 0),
(10, '01206006', 'KKK', 'KKK', '01206006', 1, '08383777729', '2018-10-05 01:45:42', '2018-10-05 01:52:01', 2, 1),
(11, '01207001', 'LLL', 'LLL', '01207001', 1, '08383777729', '2018-10-05 01:45:55', '2018-10-10 00:53:18', 2, 1),
(12, '01207002', 'MMM', 'MMM', '01207002', 1, '08383777729', '2018-10-05 01:46:13', '2018-10-05 01:50:16', 2, 1),
(13, '01207007', 'NNN', 'NNN', '01207007', 1, '08383777729', '2018-10-05 01:46:32', '2018-10-05 01:46:32', 2, 0),
(14, '01207008', 'OOO', 'OOO', '01207008', 1, '08383777729', '2018-10-05 01:46:48', '2018-10-05 01:46:48', 2, 0),
(15, '01208001', 'PPP', 'PPP', '01208001', 1, '08383777729', '2018-10-05 01:47:03', '2018-10-05 01:47:03', 2, 0),
(16, '01208004', 'QQQ', 'QQQ', '01208004', 1, '08383777729', '2018-10-05 01:47:22', '2018-10-05 01:47:22', 2, 0),
(17, '01209002', 'RRR', 'RRR', '01209002', 1, '08383777729', '2018-10-05 01:47:38', '2018-10-05 01:47:38', 2, 0),
(18, '01210007', 'SSS', 'SSS', '01210007', 1, '08383777729', '2018-10-05 01:47:51', '2018-10-05 01:51:41', 2, 1),
(19, '01210008', 'TTT', 'TTT', '01210008', 1, '08383777729', '2018-10-05 01:48:04', '2018-10-05 01:48:04', 2, 0),
(20, '01211004', 'UUU', 'UUU', '01211004', 1, '08383777729', '2018-10-05 01:48:24', '2018-10-05 01:48:24', 2, 0),
(21, '01212005', 'VVV', 'VVV', '01212005', 1, '08383777729', '2018-10-05 01:48:41', '2018-10-05 01:49:54', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `value` text,
  `user_modified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, 'web_title', 'ODWin Panel', 1, '2017-06-13 00:27:16', '2018-06-03 05:57:27'),
(2, 'logo', 'img/logo.png', 1, '2017-06-13 00:27:16', '2018-10-02 08:51:47'),
(3, 'email_admin', 'admin@admin.com', 1, '2017-06-13 00:27:16', '2018-06-03 05:58:52'),
(4, 'web_description', 'Website Description', 1, '2017-07-23 23:56:28', '2018-06-03 05:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `undian`
--

CREATE TABLE `undian` (
  `id` int(11) NOT NULL,
  `id_hadiah` int(11) DEFAULT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `undian`
--

INSERT INTO `undian` (`id`, `id_hadiah`, `id_peserta`, `status`, `keterangan`, `created_at`, `updated_at`, `user_modified`) VALUES
(1, 1, 21, 0, NULL, '2018-10-09 03:57:10', '2018-10-09 03:57:10', 2),
(2, 1, 1, 0, NULL, '2018-10-10 01:04:37', '2018-10-10 01:04:37', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_level_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `avatar_id` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` text,
  `phone` text,
  `gender` enum('male','female','other') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_level_id`, `firstname`, `lastname`, `avatar_id`, `email`, `address`, `phone`, `gender`, `birthdate`, `username`, `password`, `active`, `user_modified`, `last_activity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super', 'Admin', 0, 'superadmin@admin.com', 'Jl Madura xxxxxxx', '08383xxxxxxx', 'male', '1986-07-25', 'superadmin', '$2y$10$TkX/dDYrtvIEXidPOag5T.V8qbyluUHJg5ssBjKe6WlVqpItuN8uy', 1, 1, '2018-10-04 09:00:09', '2017-03-13 20:51:35', '2018-10-04 09:00:09'),
(2, 2, 'Admin', 'Admin', 0, 'admin@admin.com', NULL, NULL, 'male', '1983-05-25', 'admin', '$2y$10$PQaUY4b0YsSo5qAuK8Cc.OB.WeEJHrJJ0FDgk6YE9xhXboVRou3We', 1, 1, '2018-10-10 02:22:47', '2017-04-19 14:29:01', '2018-10-10 02:22:47'),
(3, 3, '-', '-', 0, 'usher@test1', NULL, NULL, 'male', '2018-10-09', 'usher1', '$2y$10$o5rc7dqjjm5b6fk4Ig8oveOQguM801jRDFjN6xAjNrMQHQWX1MaQ6', 1, 2, '2018-10-10 00:59:58', '2018-10-09 04:09:31', '2018-10-10 00:59:58'),
(4, 4, '-', '-', 0, 'pengundi1@test.com', NULL, NULL, 'male', '2018-10-09', 'pengundi1', '$2y$10$3.oIgpTqOGaBOQ2X5X1IxejMsqojve09EeFhUqTN/HDNPdTD1C8Ba', 1, 2, '2018-10-10 01:04:03', '2018-10-09 04:10:05', '2018-10-10 01:04:03'),
(5, 5, '-', '-', 0, 'verifikator1@test.com', NULL, NULL, 'male', '2018-10-09', 'verifikator1', '$2y$10$TOY6RMFmJD/tS103FwinuuqYX/DJ.KgNswJdFvvgSt60XXLIT5cEq', 1, 2, '2018-10-09 04:12:32', '2018-10-09 04:11:15', '2018-10-09 04:12:32'),
(6, 6, '-', '-', 0, 'ketua@test.com', NULL, NULL, 'male', '2018-10-09', 'ketua', '$2y$10$q.ii3mXceDda35wEdGSsM.twyZhU1UlPm6Kt0iTEH/cMkZUnlrB56', 1, 2, '2018-10-09 04:12:08', '2018-10-09 04:11:45', '2018-10-09 04:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `active` int(1) DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id`, `name`, `active`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, 1, '2017-06-28 06:18:17', '2017-06-28 06:18:17'),
(2, 'Admin', 1, 1, '2018-06-02 15:59:51', '2018-06-02 15:59:51'),
(3, 'Usher', 1, 1, '2018-10-04 08:38:25', '2018-10-04 08:38:25'),
(4, 'Pengundi', 1, 1, '2018-10-04 08:38:45', '2018-10-04 08:38:45'),
(5, 'Verifikator', 1, 1, '2018-10-04 08:38:51', '2018-10-04 08:38:51'),
(6, 'Ketua Panitia', 1, 1, '2018-10-04 08:40:31', '2018-10-04 08:40:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_control`
--
ALTER TABLE `access_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hadiah`
--
ALTER TABLE `hadiah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_library`
--
ALTER TABLE `media_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undian`
--
ALTER TABLE `undian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_control`
--
ALTER TABLE `access_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hadiah`
--
ALTER TABLE `hadiah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media_library`
--
ALTER TABLE `media_library`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `undian`
--
ALTER TABLE `undian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
