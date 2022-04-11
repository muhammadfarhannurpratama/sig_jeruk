-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 07:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigjeruk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(20) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_namalengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `foto_user` varchar(256) NOT NULL,
  `admin_status` enum('Administrator','User','Retail') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_user`, `admin_pass`, `admin_namalengkap`, `email`, `foto`, `foto_user`, `admin_status`) VALUES
(1, 'admin', '$2y$10$lGCLUHMRpNQLXc6F2riOROOIKyLX82qXXZWBvedDHbs6yF5EVKyOu', 'Muh Farhan', '', '', '1619160423.png', 'Administrator'),
(20, 'aji', '$2y$10$kPmozOBN6Z/wL1TfjsdBfe/G1wbCPf7IcaJoJbjKkeTHYQxdDcWCG', 'Septiaji', '', '', '', 'Administrator'),
(21, 'dianarof', '$2y$10$JF4cBsKgivl1pIlprjWimO9MqEUYACmZWH/clY1Abu8aOvjYHp.pm', 'diana rofiah hayati', '', '', '', 'Administrator'),
(22, 'dinaalifa', '$2y$10$hj7Zmirgw34reNaOW.rvROwZtn9o6kbIe31lQ8eRHze4BFOEnLs0m', 'dina alifatul', '', '', '1627094679.png', 'User'),
(23, 'budi', '$2y$10$0sxBu/OTti/E0BUQO.RmheqTKzUwVzwY.kY1LeEItNJzJ/DHvT6Ty', 'budi setyo', '', '', '', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_identitas`
--

CREATE TABLE `tb_identitas` (
  `id_identitas` int(5) NOT NULL,
  `nm_website` varchar(100) NOT NULL,
  `email_website` varchar(100) NOT NULL,
  `alamat` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp1` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp2` varchar(20) NOT NULL,
  `url_facebook` varchar(300) NOT NULL,
  `url_twitter` varchar(300) NOT NULL,
  `url_instagram` varchar(300) DEFAULT NULL,
  `meta_deskripsi` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `logo_website` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_identitas`
--

INSERT INTO `tb_identitas` (`id_identitas`, `nm_website`, `email_website`, `alamat`, `no_telp1`, `no_telp2`, `url_facebook`, `url_twitter`, `url_instagram`, `meta_deskripsi`, `meta_keyword`, `latitude`, `longitude`, `logo_website`) VALUES
(1, 'Kabupaten Jember, Jawa Timur', 'mfarhannur80@gmail.com', 'Jl. Cempaka No 13 Tanggul Jember', '085231211807', '085231211807', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', 'Kabupaten Jember, Jawa Timur', 'Kabupaten Jember, Jawa Timur', '-8.1797306', '113.4771044', 'orange.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jeruk`
--

CREATE TABLE `tb_jeruk` (
  `id_jeruk` int(11) NOT NULL,
  `jeruk_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jeruk`
--

INSERT INTO `tb_jeruk` (`id_jeruk`, `jeruk_nama`) VALUES
(7, 'Jeruk Manis'),
(8, 'Kecut'),
(14, 'Manalagi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `kecamatan_id` int(11) NOT NULL,
  `kecamatan_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`kecamatan_id`, `kecamatan_nama`) VALUES
(28, 'Semboro');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `kelurahan_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `kelurahan_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`kelurahan_id`, `kecamatan_id`, `kelurahan_nama`) VALUES
(27, 28, 'Rejoagung'),
(28, 28, 'Pondok Joyo'),
(29, 28, 'sidomekar'),
(30, 28, 'sidomulyo'),
(31, 28, 'pondok dalem');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lahan`
--

CREATE TABLE `tb_lahan` (
  `id_lahan` int(11) NOT NULL,
  `nama_pemilik` varchar(255) DEFAULT NULL,
  `lokasi_lahan` varchar(255) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `foto_lahan` varchar(256) NOT NULL,
  `id_jeruk` int(11) DEFAULT NULL,
  `luas_lahan` varchar(10) NOT NULL,
  `jumlah_panen` varchar(10) NOT NULL,
  `harga_jeruk` varchar(10) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `kelurahan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lahan`
--

INSERT INTO `tb_lahan` (`id_lahan`, `nama_pemilik`, `lokasi_lahan`, `no_hp`, `foto_lahan`, `id_jeruk`, `luas_lahan`, `jumlah_panen`, `harga_jeruk`, `latitude`, `longitude`, `kecamatan_id`, `kelurahan_id`) VALUES
(23, 'pak jo', 'Jl.Semboro pg', '085231453900', '1646879803.jpg', 8, '200', '800', '5000', '-8.194334', '113.448250', 28, 27),
(24, 'puput', 'babatan', '098765432167', '1646880981.png', 8, '1000', '2000', '5000', '-8.192146', '113.440612', 28, 27),
(25, 'sukiman', 'jl. pucukan', '098123786546', '1647096092.PNG', 14, '500', '1200', '5000', '-8.168097', '113.435187', 28, 28),
(26, 'supardi', 'Jl.Baidi', '086123876909', '1647482034.png', 7, '700', '1600', '5000', '-8.170055', '113.423934', 28, 29),
(27, 'mannan', 'Jl.Test', '098765765413', '1647503462.png', 7, '380', '960', '5000', '-8.211969', '113.456314', 28, 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `tb_jeruk`
--
ALTER TABLE `tb_jeruk`
  ADD PRIMARY KEY (`id_jeruk`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`);

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`kelurahan_id`),
  ADD KEY `FK_tb_kelurahan_tb_kecamatan` (`kecamatan_id`);

--
-- Indexes for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  ADD PRIMARY KEY (`id_lahan`),
  ADD KEY `kecamatan_id` (`kecamatan_id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`),
  ADD KEY `id_pisang` (`id_jeruk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jeruk`
--
ALTER TABLE `tb_jeruk`
  MODIFY `id_jeruk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  MODIFY `kelurahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  MODIFY `id_lahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD CONSTRAINT `FK_tb_kelurahan_tb_kecamatan` FOREIGN KEY (`kecamatan_id`) REFERENCES `tb_kecamatan` (`kecamatan_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  ADD CONSTRAINT `FK_tb_lahan_tb_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `tb_kelurahan` (`kelurahan_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_lahan_tb_pisang` FOREIGN KEY (`id_jeruk`) REFERENCES `tb_jeruk` (`id_jeruk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_lahan_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `tb_kecamatan` (`kecamatan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
