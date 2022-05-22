-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 05:50 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

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
-- Table structure for table `detail_transaksipengguna`
--

CREATE TABLE `detail_transaksipengguna` (
  `kode_detailtransaksi` int(11) NOT NULL,
  `kode_transaksipengguna` varchar(255) NOT NULL,
  `id_retail` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksipengguna`
--

INSERT INTO `detail_transaksipengguna` (`kode_detailtransaksi`, `kode_transaksipengguna`, `id_retail`, `harga`, `qty`) VALUES
(4, '20220521QMNKD3HD', '2', '2000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_retail`
--

CREATE TABLE `keranjang_retail` (
  `kode_keranjangretail` varchar(110) NOT NULL,
  `id_lahan` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang_retail`
--

INSERT INTO `keranjang_retail` (`kode_keranjangretail`, `id_lahan`, `harga`, `qty`, `subtotal`) VALUES
('1705221652782458', '25', '5000', 10, '50000'),
('2205221653188934', '25', '5000', 2, '5000');

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
  `kelurahan_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lahan`
--

INSERT INTO `tb_lahan` (`id_lahan`, `nama_pemilik`, `lokasi_lahan`, `no_hp`, `foto_lahan`, `id_jeruk`, `luas_lahan`, `jumlah_panen`, `harga_jeruk`, `latitude`, `longitude`, `kecamatan_id`, `kelurahan_id`, `user_id`) VALUES
(24, 'puput', 'babatan', '098765432167', '1646880981.png', 8, '1000', '2000', '5000', '-8.192146', '113.440612', 28, 27, 0),
(25, 'sukiman', 'jl. pucukan', '098123786546', '1647096092.PNG', 14, '500', '1180', '5000', '-8.168097', '113.435187', 28, 28, 3),
(26, 'supardi', 'Jl.Baidi', '086123876909', '1647482034.png', 7, '700', '1600', '5000', '-8.170055', '113.423934', 28, 29, 0),
(27, 'mannan', 'Jl.Test', '098765765413', '1647503462.png', 7, '380', '960', '5000', '-8.211969', '113.456314', 28, 27, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(15) NOT NULL,
  `no_rekening` varchar(32) NOT NULL,
  `atas_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekening`
--

INSERT INTO `tb_rekening` (`id_rekening`, `nama_bank`, `no_rekening`, `atas_nama`) VALUES
(1, 'BRI', '1323-4516-2314-3342', 'Farhan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_retail`
--

CREATE TABLE `tb_retail` (
  `id_retail` int(11) NOT NULL,
  `nama_retail` varchar(55) NOT NULL,
  `lokasi_retail` varchar(55) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto_retail` varchar(55) NOT NULL,
  `id_jeruk` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `limitstok` int(11) DEFAULT NULL,
  `harga_jual` varchar(55) NOT NULL,
  `harga_beli` varchar(55) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_retail`
--

INSERT INTO `tb_retail` (`id_retail`, `nama_retail`, `lokasi_retail`, `no_hp`, `foto_retail`, `id_jeruk`, `stok`, `berat`, `limitstok`, `harga_jual`, `harga_beli`, `latitude`, `longitude`, `kecamatan_id`, `kelurahan_id`, `user_id`) VALUES
(2, 'retail 1', 'semboro lor', '082226151251', '1650442937.png', 7, 220, 1, 100, '2000', '1000', '-8.194334', '113.448250', 28, 28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` varchar(255) DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`id_konfigurasi`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telpon`) VALUES
(1, 'toko toko', 160, 'jalanku', '0821647164');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_namalengkap` varchar(100) NOT NULL,
  `foto_user` varchar(256) DEFAULT NULL,
  `user_status` enum('Administrator','Petani','Pengguna','Retail') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_username`, `user_pass`, `user_namalengkap`, `foto_user`, `user_status`) VALUES
(1, 'admin', '$2y$10$lGCLUHMRpNQLXc6F2riOROOIKyLX82qXXZWBvedDHbs6yF5EVKyOu', 'Muh Farhan', '1619160423.png', 'Administrator'),
(2, 'aji', '$2y$10$lGCLUHMRpNQLXc6F2riOROOIKyLX82qXXZWBvedDHbs6yF5EVKyOu', 'Septiaji', '1650963391.png', 'Retail'),
(3, 'dianarof', '$2y$10$lGCLUHMRpNQLXc6F2riOROOIKyLX82qXXZWBvedDHbs6yF5EVKyOu', 'diana rofiah hayati', '1653188140.jpg', 'Petani'),
(34, 'deni', '$2y$10$ClTVF5ir/Y7TXYNPwKWs5.YyXVetw2ApO7iZmtMFi8F.GqJuyksu.', 'deni', '1650963391.png', 'Pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pengguna`
--

CREATE TABLE `transaksi_pengguna` (
  `kode_transaksipengguna` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `batas_bayar` datetime NOT NULL,
  `nama_pelanggan` varchar(30) DEFAULT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `provinsi` tinytext DEFAULT NULL,
  `kota` tinytext DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(8) DEFAULT NULL,
  `expedisi` varchar(15) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `estimasi` varchar(50) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pengguna`
--

INSERT INTO `transaksi_pengguna` (`kode_transaksipengguna`, `user_id`, `tgl_transaksi`, `batas_bayar`, `nama_pelanggan`, `no_telepon`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `no_rek`, `nama_bank`, `status_order`, `no_resi`) VALUES
('20220521QMNKD3HD', 34, '2022-05-21 14:12:13', '2022-05-22 14:12:13', 'deni', '082244338251', 'Jawa Timur', 'Bondowoso', 'Jember', '68156', 'jne', 'OKE', '2-3', 5000, 2, 4000, 9000, 1, 'bukti_1605221652667613.jpeg', 'deni', '351513531412', 'bri', 3, '123');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_retail`
--

CREATE TABLE `transaksi_retail` (
  `kode_transaksiretail` varchar(255) NOT NULL,
  `kode_keranjangretail` varchar(110) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `nama_retail` varchar(110) NOT NULL,
  `alamat_pengiriman` varchar(255) NOT NULL,
  `jumlah_bayar` varchar(100) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status_pesanan` varchar(11) NOT NULL DEFAULT 't',
  `id_retail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_retail`
--

INSERT INTO `transaksi_retail` (`kode_transaksiretail`, `kode_keranjangretail`, `tanggal_beli`, `nama_retail`, `alamat_pengiriman`, `jumlah_bayar`, `bukti_pembayaran`, `status_pesanan`, `id_retail`) VALUES
('1705221652782458', '1705221652782458', '2022-05-17', 'retail', 'semboro', '50000', 'bukti_1605221652667613.jpeg', 'y', 2),
('2205221653188934', '2205221653188934', '2022-05-22', 'retail', 'dasdasf', '10000', '20220522DABYMLWX.jpg', 't', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksipengguna`
--
ALTER TABLE `detail_transaksipengguna`
  ADD PRIMARY KEY (`kode_detailtransaksi`);

--
-- Indexes for table `keranjang_retail`
--
ALTER TABLE `keranjang_retail`
  ADD PRIMARY KEY (`kode_keranjangretail`);

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
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tb_retail`
--
ALTER TABLE `tb_retail`
  ADD PRIMARY KEY (`id_retail`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `transaksi_pengguna`
--
ALTER TABLE `transaksi_pengguna`
  ADD PRIMARY KEY (`kode_transaksipengguna`);

--
-- Indexes for table `transaksi_retail`
--
ALTER TABLE `transaksi_retail`
  ADD PRIMARY KEY (`kode_transaksiretail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksipengguna`
--
ALTER TABLE `detail_transaksipengguna`
  MODIFY `kode_detailtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_retail`
--
ALTER TABLE `tb_retail`
  MODIFY `id_retail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
