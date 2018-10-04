-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 03:01 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
(1, 1, 1, 'a', 1, '2018-10-01 18:29:47', '2018-10-01 18:29:47'),
(2, 1, 2, 'a', 1, '2018-10-01 18:29:47', '2018-10-01 18:29:47'),
(3, 1, 3, 'a', 1, '2018-10-01 18:29:47', '2018-10-01 18:29:47'),
(4, 2, 1, 'a', 1, '2018-10-01 18:29:53', '2018-10-01 18:29:53'),
(5, 2, 2, 'a', 1, '2018-10-01 18:29:53', '2018-10-01 18:29:53'),
(6, 2, 3, 'a', 1, '2018-10-01 18:29:53', '2018-10-01 18:29:53'),
(7, 3, 1, 'v', 1, '2018-10-01 18:29:57', '2018-10-01 18:29:57'),
(8, 3, 2, 'v', 1, '2018-10-01 18:29:57', '2018-10-01 18:29:57'),
(9, 3, 3, 'v', 1, '2018-10-01 18:29:57', '2018-10-01 18:29:57'),
(10, 1, 4, 'a', 1, '2018-10-02 02:59:54', '2018-10-02 02:59:54'),
(11, 2, 4, 'a', 1, '2018-10-02 02:59:57', '2018-10-02 02:59:57'),
(12, 3, 4, 'v', 1, '2018-10-02 03:00:00', '2018-10-02 03:00:00'),
(13, 1, 5, 'a', 1, '2018-10-02 06:29:09', '2018-10-02 06:29:09'),
(14, 2, 5, 'a', 1, '2018-10-02 06:29:13', '2018-10-02 06:29:13'),
(15, 3, 5, 'v', 1, '2018-10-02 06:29:17', '2018-10-02 06:29:17');

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
(1, 'Payung', 1, 5, '2018-10-02 07:07:04', '2018-10-02 07:10:28', 1),
(2, 'Motor', 1, 3, '2018-10-02 07:10:37', '2018-10-02 07:10:37', 1),
(3, 'Mobil', 1, 1, '2018-10-02 07:10:43', '2018-10-02 07:10:43', 1);

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
(0, 'noprofileimage', 'png', 'img/noprofileimage.png', '1159', 1, '2017-05-29 19:56:03', '2017-05-29 19:56:03'),
(1, 'logo-php', 'png', 'upload/img/logo-php.png', '17585', 1, '2018-10-02 06:14:36', '2018-10-02 06:14:36');

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
  `photo` int(11) DEFAULT NULL,
  `gender` enum('pria','wanita') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_undangan` text,
  `active` int(1) NOT NULL DEFAULT '1',
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `hadir` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `NIK`, `nama`, `alamat`, `photo`, `gender`, `tgl_lahir`, `no_undangan`, `active`, `phone`, `email`, `created_at`, `updated_at`, `user_modified`, `hadir`) VALUES
(1, '100001', 'Donny Winarto', 'Jl Ngagel Madya VI / 21\r\nSurabaya', 0, 'pria', '1986-07-25', '000001', 1, '083837777297', 'oeidonny.winarto@gmail.com', '2018-10-02 04:36:41', '2018-10-02 09:22:40', 1, 1),
(2, '100002', 'Donny Winarta', 'Jl Madura 11 A\r\nMalang', 1, 'pria', '1983-05-25', '000002', 1, '085806876397', 'oeidonny.winarto@yahoo.com', '2018-10-02 06:11:08', '2018-10-02 06:15:16', 1, 0);

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
(1, 1, 'Super', 'Admin', 0, 'superadmin@admin.com', 'Jl Madura xxxxxxx', '08383xxxxxxx', 'male', '1986-07-25', 'superadmin', '$2y$10$TkX/dDYrtvIEXidPOag5T.V8qbyluUHJg5ssBjKe6WlVqpItuN8uy', 1, 1, '2018-10-02 01:41:32', '2017-03-13 20:51:35', '2018-10-02 01:41:32'),
(2, 2, 'Admin', 'Admin', 0, 'admin@admin.com', NULL, NULL, 'male', '1983-05-25', 'admin', '$2y$10$PQaUY4b0YsSo5qAuK8Cc.OB.WeEJHrJJ0FDgk6YE9xhXboVRou3We', 1, 1, '2018-10-02 02:01:12', '2017-04-19 14:29:01', '2018-10-02 01:40:04');

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
(3, 'User', 1, 1, '2018-06-03 04:19:49', '2018-06-03 04:19:49');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hadiah`
--
ALTER TABLE `hadiah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media_library`
--
ALTER TABLE `media_library`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;