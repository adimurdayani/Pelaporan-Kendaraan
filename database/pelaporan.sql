-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 08:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelaporan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(123) NOT NULL,
  `created_at` varchar(123) NOT NULL,
  `updated_at` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kecamatan`, `created_at`, `updated_at`) VALUES
(1, 'Bara', '16 Jul 2021 15:40', '16 Jul 2021 15:40'),
(2, 'Mungkajang', '16 Jul 2021 15:40', '16 Jul 2021 15:40'),
(3, 'Sendana', '16 Jul 2021 15:41', '16 Jul 2021 15:41'),
(4, 'Tellu Wanua', '16 Jul 2021 15:41', '16 Jul 2021 15:41'),
(5, 'Wara', '16 Jul 2021 15:41', '16 Jul 2021 15:41'),
(6, 'Wara Barat', '16 Jul 2021 15:41', '16 Jul 2021 15:41'),
(7, 'Wara Selatan', '16 Jul 2021 15:41', '16 Jul 2021 15:41'),
(8, 'Wara Timur', '16 Jul 2021 15:42', '16 Jul 2021 15:42'),
(9, 'Wara Utara', '16 Jul 2021 15:42', '16 Jul 2021 15:42');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(123) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `created_at` varchar(123) NOT NULL,
  `updated_at` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `kelurahan`, `id_kecamatan`, `created_at`, `updated_at`) VALUES
(1, 'Rampoang', 1, '16 Jul 2021 15:43', '16 Jul 2021 15:43'),
(2, 'Balandai', 1, '16 Jul 2021 15:43', '16 Jul 2021 15:43'),
(3, 'Temalebba', 1, '16 Jul 2021 15:43', '16 Jul 2021 15:43'),
(4, 'To\'bulung', 1, '16 Jul 2021 15:44', '16 Jul 2021 15:44'),
(5, 'Buntu Datu', 1, '16 Jul 2021 15:44', '16 Jul 2021 15:44'),
(6, 'Mungkajang', 2, '16 Jul 2021 15:48', '16 Jul 2021 15:48'),
(7, 'Murante', 2, '16 Jul 2021 15:48', '16 Jul 2021 15:48'),
(8, 'Latuppa', 2, '16 Jul 2021 15:48', '16 Jul 2021 15:48'),
(9, 'Kambo', 2, '16 Jul 2021 15:48', '16 Jul 2021 15:48'),
(10, 'Purangi', 3, '16 Jul 2021 15:48', '16 Jul 2021 15:48'),
(11, 'Mawa', 3, '16 Jul 2021 15:48', '16 Jul 2021 15:48'),
(12, 'Peta', 3, '16 Jul 2021 15:49', '16 Jul 2021 15:49'),
(13, 'Sendana', 3, '16 Jul 2021 15:49', '16 Jul 2021 15:49'),
(14, 'Batu Walenrang', 4, '16 Jul 2021 15:49', '16 Jul 2021 15:49'),
(15, 'Mancani', 4, '16 Jul 2021 15:49', '16 Jul 2021 15:49'),
(16, 'Maroangin', 4, '16 Jul 2021 15:49', '16 Jul 2021 15:49'),
(17, 'Jaya', 4, '16 Jul 2021 15:49', '16 Jul 2021 15:49'),
(18, 'Salubattang', 4, '16 Jul 2021 15:49', '16 Jul 2021 15:49'),
(19, 'Sumarambu', 4, '16 Jul 2021 15:49', '16 Jul 2021 15:49'),
(20, 'Pentojangan', 4, '16 Jul 2021 15:50', '16 Jul 2021 15:50'),
(21, 'Amasangan', 5, '16 Jul 2021 15:50', '16 Jul 2021 15:50'),
(22, 'Botting', 5, '16 Jul 2021 15:50', '16 Jul 2021 15:50'),
(23, 'Tompottika', 5, '16 Jul 2021 15:50', '16 Jul 2021 15:50'),
(24, 'Lagaligo', 5, '16 Jul 2021 15:50', '16 Jul 2021 15:50'),
(25, 'Dangerakko', 5, '16 Jul 2021 15:51', '16 Jul 2021 15:51'),
(26, 'Pajalesang', 5, '16 Jul 2021 15:51', '16 Jul 2021 15:51'),
(27, 'Battang', 6, '16 Jul 2021 15:51', '16 Jul 2021 15:51'),
(28, 'Battang Barat', 6, '16 Jul 2021 15:51', '16 Jul 2021 15:51'),
(29, 'Lebang', 6, '16 Jul 2021 15:51', '16 Jul 2021 15:51'),
(30, 'Padang Lambe', 6, '16 Jul 2021 15:51', '16 Jul 2021 15:51'),
(31, 'Tomarundung', 6, '16 Jul 2021 15:52', '16 Jul 2021 15:52'),
(32, 'Binturu', 7, '16 Jul 2021 15:52', '16 Jul 2021 15:52'),
(33, 'Sampoddo', 7, '16 Jul 2021 15:52', '16 Jul 2021 15:52'),
(34, 'Songka', 7, '16 Jul 2021 15:52', '16 Jul 2021 15:52'),
(35, 'Takkalala', 7, '16 Jul 2021 15:52', '16 Jul 2021 15:52'),
(36, 'Benteng', 8, '16 Jul 2021 15:52', '16 Jul 2021 15:52'),
(37, 'Surutanga', 8, '16 Jul 2021 15:52', '16 Jul 2021 15:52'),
(38, 'Pontap', 8, '16 Jul 2021 15:52', '16 Jul 2021 15:52'),
(39, 'Malatunrung', 8, '16 Jul 2021 15:53', '16 Jul 2021 15:53'),
(40, 'Salekoe', 8, '16 Jul 2021 15:53', '16 Jul 2021 15:53'),
(41, 'Salotellue', 8, '16 Jul 2021 15:53', '16 Jul 2021 15:53'),
(42, 'Ponjalae', 8, '16 Jul 2021 15:53', '16 Jul 2021 15:53'),
(43, 'Batupasi', 9, '16 Jul 2021 15:53', '16 Jul 2021 15:53'),
(44, 'Penggoli', 9, '16 Jul 2021 15:53', '16 Jul 2021 15:53'),
(45, 'Sabamparu', 9, '16 Jul 2021 15:54', '16 Jul 2021 15:54'),
(46, 'Luminda', 9, '16 Jul 2021 15:54', '16 Jul 2021 15:54'),
(47, 'Salobulo', 9, '16 Jul 2021 15:54', '16 Jul 2021 15:54'),
(48, 'Patte\'ne', 9, '16 Jul 2021 15:54', '16 Jul 2021 15:54');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'admin123', 1, 0, 0, NULL, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `nama_pelapor` int(11) NOT NULL,
  `kelamin` varchar(123) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `no_ktp` int(20) NOT NULL,
  `no_kk` int(20) NOT NULL,
  `no_ken` int(20) NOT NULL,
  `stnk` varchar(255) NOT NULL,
  `bpkb` varchar(255) NOT NULL,
  `latitude` varchar(123) NOT NULL,
  `longitude` varchar(123) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` varchar(123) NOT NULL,
  `updated_at` varchar(123) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `nama_pelapor`, `kelamin`, `id_kelurahan`, `id_kecamatan`, `no_ktp`, `no_kk`, `no_ken`, `stnk`, `bpkb`, `latitude`, `longitude`, `keterangan`, `created_at`, `updated_at`, `status`) VALUES
(4, 1, 'L', 1, 1, 1241231, 241231, 21423123, '3074dbf38ddd7b8031c72d9fabb0f6b3.png', 'ad6f399521fd387c362aeb3ddf5a4213.png', '89687600', '98798700', 'hilang', '15 Jul 2021 21:58', '15 Jul 2021 21:58', 'DIPROSES'),
(10, 46, 'Laki-Laki', 1, 1, 2147483647, 2147483647, 19273, '39d3e360531c4715c77c6ad830cb4ec4.png', '', '-2.846668481826777', '120.23279571533203', 'Hilang kendali', '05 Dec 2021 15:22', '05 Dec 2021 15:22', 'SELESAI');

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:api/laporan/index:get', 3, 1625846596, 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(11) NOT NULL,
  `tipe_user` varchar(123) NOT NULL,
  `created_at` varchar(123) NOT NULL,
  `updated_at` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `tipe_user`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '28 Jun 2021 05:56', '28 Jun 2021 05:56'),
(2, 'User', '28 Jun 2021 05:56', '28 Jun 2021 05:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `username` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_active` int(1) NOT NULL,
  `remember` varchar(255) NOT NULL,
  `created_at` varchar(123) NOT NULL,
  `updated_at` varchar(123) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `user_id`, `user_active`, `remember`, `created_at`, `updated_at`, `token`) VALUES
(1, 'Adi Murdayani', 'admin', 'adimurdayani@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, 1, '', '10 Jul 2021 20:48', '10 Jul 2021 20:48', ''),
(46, 'Adi Murdayani', 'adimurdayani', 'adimurdayani@gmail.com', '74e92d137df14c2f05a571ebf2dfc75145a69045', 2, 1, '', '05 Dec 2021 15:12', '05 Dec 2021 15:12', 'eQ8QJQ0PCvc:APA91bHp1ZCYcbZOhSxbFgME0Q_STUezW9hest1MgUY6PLZX4So7DHb9LWCmsks5ARcOJd6lXTZ4zCEYULTUrXffZrTFpGto7MxjG5Rw48667-YnOZH-t88OVzXAQ7jLzGm8K8orNJDf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `role_user` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
