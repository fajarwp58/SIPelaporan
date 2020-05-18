-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 11:37 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpelaporan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_laporan`
--

CREATE TABLE `detail_laporan` (
  `detail_laporan_id` int(11) NOT NULL,
  `laporan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `detail_laporan_ket` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_laporan`
--

INSERT INTO `detail_laporan` (`detail_laporan_id`, `laporan_id`, `jenis_id`, `nama_pemilik`, `detail_laporan_ket`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 'Dewi Engrayeni', 'Kartu BPJS', '2020-04-08 08:06:06', '2020-04-08 08:06:06'),
(2, 2, 5, 'Erfitri Anif', 'Buku Tabungan Bank Mandiri', '2019-04-08 08:15:31', '2019-04-08 08:15:31'),
(3, 3, 12, 'Fajar S', 'Kartu BPJS Ketenagakerjaan', '2020-04-08 08:30:08', '2020-04-08 08:30:08'),
(4, 4, 13, 'Sherlly Aksari', 'KTP', '2020-04-08 08:41:24', '2020-04-08 08:41:24'),
(5, 5, 13, 'Cut Desi Anik', 'KTP', '2020-04-08 08:45:18', '2020-04-08 08:45:18'),
(6, 6, 14, 'Desril Arteti S.Kom', 'Surat Keterangan Ahli Waris', '2020-04-08 08:51:17', '2020-04-08 08:51:17'),
(7, 6, 14, 'Desril Arteti S.Kom', 'Surat Kematian', '2020-04-08 08:51:17', '2020-04-08 08:51:17'),
(8, 7, 14, 'Ernes', 'PKH', '2020-04-08 08:59:41', '2020-04-08 08:59:41'),
(9, 8, 4, 'Tri Murti', 'ATM BRI', '2019-04-08 09:09:21', '2019-04-08 09:09:21'),
(10, 9, 13, 'Zaharti', 'KTP', '2020-04-08 09:15:37', '2020-04-08 09:15:37'),
(11, 10, 13, 'Agita Diana Putri', 'KTP', '2020-04-08 09:18:22', '2020-04-08 09:18:22'),
(12, 11, 14, 'Fadilah Rahma Putri', 'KTM Mahasiswa', '2020-04-08 09:23:39', '2020-04-08 09:23:39'),
(13, 12, 13, 'Dio Oktafiani', 'KTP', '2020-04-08 09:28:45', '2020-04-08 09:28:45'),
(14, 12, 14, 'Dio Oktafiani', 'Kartu Pegadaian', '2020-04-08 09:28:45', '2020-04-08 09:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `doc_pendukung`
--

CREATE TABLE `doc_pendukung` (
  `doc_pendukung_id` int(11) NOT NULL,
  `laporan_id` int(11) NOT NULL,
  `doc_pendukung_file` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_pendukung`
--

INSERT INTO `doc_pendukung` (`doc_pendukung_id`, `laporan_id`, `doc_pendukung_file`, `created_at`, `updated_at`) VALUES
(1, 1, 'ktp.jpg', '2020-04-08 08:06:05', NULL),
(2, 2, 'ktp.jpg', '2020-04-08 08:15:31', NULL),
(3, 3, 'ktp.jpg', '2020-04-08 08:30:07', NULL),
(4, 4, 'Gambar Mewarnai Ikan Paus.JPG', '2020-04-08 08:41:24', NULL),
(5, 5, 'Gambar Mewarnai Ikan Paus.JPG', '2020-04-08 08:45:18', NULL),
(6, 6, 'ktp.jpg', '2020-04-08 08:51:17', NULL),
(7, 7, 'ktp.jpg', '2020-04-08 08:59:41', NULL),
(8, 8, 'ktp.jpg', '2020-04-08 09:09:21', NULL),
(9, 9, 'Gambar Mewarnai Ikan Paus.JPG', '2020-04-08 09:15:37', NULL),
(10, 10, 'Gambar Mewarnai Ikan Paus.JPG', '2020-04-08 09:18:22', NULL),
(11, 11, 'ktp.jpg', '2020-04-08 09:23:39', NULL),
(12, 12, 'Gambar Mewarnai Ikan Paus.JPG', '2020-04-08 09:28:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jenis_id` int(11) NOT NULL,
  `jenis_nama` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenis_id`, `jenis_nama`, `created_at`, `updated_at`) VALUES
(1, 'STNK', NULL, NULL),
(2, 'SIM', NULL, NULL),
(3, 'KK', NULL, NULL),
(4, 'ATM', NULL, NULL),
(5, 'Buku Tabungan', NULL, NULL),
(6, 'Paspor', NULL, NULL),
(7, 'Sertifikat', NULL, NULL),
(8, 'Surat Nikah', NULL, NULL),
(12, 'BPJS', '2020-04-08 08:04:38', '2020-04-08 08:04:38'),
(13, 'KTP', '2020-04-08 08:40:11', '2020-04-08 08:40:11'),
(14, 'Surat Lain Lain', '2020-04-08 08:51:39', '2020-04-08 08:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `user_nrp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelapor_nik` varchar(30) NOT NULL,
  `laporan_no` varchar(50) NOT NULL,
  `laporan_tgllapor` timestamp NOT NULL DEFAULT current_timestamp(),
  `laporan_tglhilang` timestamp NULL DEFAULT NULL,
  `laporan_lokasi` varchar(50) NOT NULL,
  `laporan_keterangan` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `user_nrp`, `pelapor_nik`, `laporan_no`, `laporan_tgllapor`, `laporan_tglhilang`, `laporan_lokasi`, `laporan_keterangan`, `created_at`, `updated_at`) VALUES
(1, '1611521021', '1371095658172123', 'LP/014/I/2019', '2019-01-06 08:06:05', '2018-12-19 17:00:00', 'Unand', 'Hilang', '2020-04-08 08:06:05', '2020-04-08 08:06:05'),
(2, '1611521021', '1367827182182781', 'LP/015/I/2019', '2019-01-07 08:15:31', '2019-01-03 17:00:00', 'Kec. Pauh', 'Hilang', '2019-04-08 08:14:31', '2019-04-08 08:15:25'),
(3, '1611521021', '1381726126127612', 'LP/016/I/2019', '2019-01-07 08:30:07', '2019-01-05 17:00:00', 'Pasar Baru', 'Hilang', '2019-04-08 08:30:07', '2019-04-08 08:30:07'),
(4, '1611521021', '1371983264823732', 'LP/017/I/2019', '2019-01-08 08:41:24', '2019-01-06 17:00:00', 'Unand', 'Hilang', '2020-04-08 08:41:24', '2020-04-08 08:41:24'),
(5, '1611521021', '1371829355366272', 'LP/018/I/2019', '2019-01-09 08:45:18', '2018-09-30 17:00:00', 'Belimbing', 'Hilang', '2020-04-08 08:45:18', '2020-04-08 08:45:18'),
(6, '1611521021', '1471289821982232', 'LP/019/I/2019', '2019-01-09 08:51:17', '2019-01-31 17:00:00', 'Bank Nagari Pasar Raya', 'Hilang perjalanan dari rumah ke bank', '2020-04-08 08:51:17', '2020-04-08 08:51:17'),
(7, '1611521021', '1318152636782898', 'LP/020/I/2019', '2019-01-09 08:59:41', '2018-12-11 17:00:00', 'Binuang', 'Hilang sekitar binuang', '2020-04-08 08:59:41', '2020-04-08 08:59:41'),
(8, '1611521021', '1312766721671267', 'LP/021/I/2019', '2019-01-09 09:09:21', '2018-12-29 17:00:00', 'Pasar Baru', 'Hilang', '2020-04-08 09:09:21', '2020-04-08 09:09:21'),
(9, '1611521021', '1371283738162676', 'LP/022/I/2019', '2019-01-09 09:15:37', '2019-01-07 17:00:00', 'SPH', 'Di sekitar rumah sakit', '2020-04-08 09:15:37', '2020-04-08 09:15:37'),
(10, '1611521021', '1371047746366372', 'LP/023/I/2019', '2019-01-09 09:18:22', '2019-01-01 17:00:00', 'Kuranji', 'Hilang', '2020-04-08 09:18:22', '2020-04-08 09:18:22'),
(11, '1611521021', '1371823553628999', 'LP/024/I/2019', '2019-01-09 09:23:39', '2018-10-31 17:00:00', 'Binuang Kp Dalam', 'Hilang', '2020-04-08 09:23:39', '2020-04-08 09:23:39'),
(12, '1611521021', '1371289478367267', 'LP/025/I/2019', '2020-04-08 09:28:45', '2018-12-18 17:00:00', 'Limau Manis', 'Hilang', '2020-04-08 09:28:45', '2020-04-08 09:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `pangkat_id` varchar(6) COLLATE utf8mb4_swedish_ci NOT NULL,
  `pangkat_name` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`pangkat_id`, `pangkat_name`) VALUES
('AJ11', 'AIPTU'),
('AJ12', 'AIPDA'),
('AJB1', 'AKBP'),
('AK11', 'AKP'),
('B111', 'BRIPKA'),
('B112', 'BRIGADIR'),
('B113', 'BRIPTU'),
('B114', 'BRIPDA'),
('BR11', 'JENDRAL'),
('BR12', 'KOMJEN'),
('BR13', 'IRJEN'),
('BR14', 'BRIGJEN'),
('IP11', 'IPTU'),
('IP12', 'IPDA'),
('KB11', 'KOMBES'),
('KM11', 'KOMPOL');

-- --------------------------------------------------------

--
-- Table structure for table `pelapor`
--

CREATE TABLE `pelapor` (
  `pelapor_nik` varchar(30) NOT NULL,
  `pelapor_nama` varchar(30) NOT NULL,
  `pelapor_tgl_lahir` date NOT NULL DEFAULT '0000-00-00',
  `pelapor_jekel` varchar(15) NOT NULL,
  `pelapor_alamat` varchar(90) NOT NULL,
  `pelapor_pekerjaan` varchar(50) NOT NULL,
  `pelapor_notelp` varchar(20) DEFAULT NULL,
  `pelapor_suku` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelapor`
--

INSERT INTO `pelapor` (`pelapor_nik`, `pelapor_nama`, `pelapor_tgl_lahir`, `pelapor_jekel`, `pelapor_alamat`, `pelapor_pekerjaan`, `pelapor_notelp`, `pelapor_suku`, `created_at`, `updated_at`) VALUES
('1312766721671267', 'Tri Murti', '1994-08-11', 'Perempuan', 'Pariaman', 'Dan lain-lain', '082289407555', 'minang', '2020-04-08 09:08:03', '2020-04-08 09:08:03'),
('1318152636782898', 'Ernes', '1975-08-11', 'Laki-Laki', 'Binuang Kp Dalam', 'Wiraswasta', '082289407555', 'minang', '2020-04-08 08:57:46', '2020-04-08 08:57:46'),
('1367827182182781', 'Erfitri Anif', '1984-07-18', 'Perempuan', 'Perumahan Villa Gading Kuranji', 'PNS', '089321872555', 'minang', '2020-04-08 08:12:42', '2020-04-08 08:12:42'),
('1371047746366372', 'Agita Diana Putri', '1995-07-01', 'Perempuan', 'Batu Busuak RT01 RW03', 'Dan lain-lain', '081262726712', 'minang', '2020-04-08 09:17:01', '2020-04-08 09:17:01'),
('1371095658172123', 'Dewi Engrayeni', '1984-06-27', 'Perempuan', 'Perumahan Inserni C.3 Kuranji', 'Dan lain-lain', '081263676361', 'minang', '2020-04-08 08:01:17', '2020-04-08 08:38:02'),
('1371283738162676', 'Zaharti', '1974-04-12', 'Perempuan', 'Batu Busuak RT01 RW03', 'Dan lain-lain', '081262726712', 'minang', '2020-04-08 09:14:06', '2020-04-08 09:14:06'),
('1371289478367267', 'Dio Oktafiani', '1999-09-26', 'Perempuan', 'Limau Manis', 'Dan lain-lain', '082289898989', 'minang', '2020-04-08 09:26:45', '2020-04-08 09:26:45'),
('1371823553628999', 'Fadilah Rahma Putri', '1998-02-12', 'Perempuan', 'Binuang Kp Dalam', 'Dan lain-lain', '082289407555', 'minang', '2020-04-08 09:21:56', '2020-04-08 09:21:56'),
('1371829355366272', 'Cut Desi Anik', '1986-08-13', 'Perempuan', 'Jl. Rawa Gadut RT01 RW02', 'PNS', '081262726712', 'minang', '2020-04-08 08:43:35', '2020-04-08 08:43:43'),
('1371983264823732', 'Sherlly Aksari', '1990-08-24', 'Perempuan', 'Parupuk tabing', 'Dan lain-lain', '082166261521', 'minang', '2020-04-08 08:37:51', '2020-04-08 08:37:51'),
('1381726126127612', 'Fajar S', '1983-11-08', 'Laki-Laki', 'Padang Besi RT05/01', 'Wiraswasta', '082289407555', 'minang', '2020-04-08 08:25:15', '2020-04-08 08:25:15'),
('1471289821982232', 'Desril Arteti S.Kom', '1970-11-17', 'Perempuan', 'Jl. Pepaya No 19 RT02 RW04 PSR Ambacang', 'Dan lain-lain', '082126626573', 'minang', '2020-04-08 08:48:23', '2020-04-08 08:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'superadmin'),
(2, 'spkt'),
(3, 'sabara');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_nrp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat_id` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_nrp`, `user_nama`, `password`, `pangkat_id`, `role_id`, `created_at`, `updated_at`) VALUES
('1611521001', 'PEBRI', '$2y$10$EK.upvxClEAkPrqlgQE5U.ohttZ/un2dpDiuY1LLEREfh7sN5hvHm', 'B111', 3, '2020-02-22 13:55:37', '2020-02-23 13:21:45'),
('1611521021', 'IJAYA', '$2y$10$QEm9hJ0DhxQAxdCky.DtxOj0ZCw8NB3NV1wf0K3MXBmCOcHKPxBVG', 'BR11', 2, '2020-02-01 05:35:45', '2020-02-01 05:35:45'),
('1711523001', 'RISKHAN.M', '$2y$10$JlT2mPruo21PbIfYxbIS1uZLMJ9wW7kjpcqSYPcBlEUDEMFRLfDFe', 'AJ12', 1, '2020-02-20 09:59:43', '2020-02-20 09:59:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  ADD PRIMARY KEY (`detail_laporan_id`),
  ADD KEY `jenis_id` (`jenis_id`),
  ADD KEY `laporan_id` (`laporan_id`);

--
-- Indexes for table `doc_pendukung`
--
ALTER TABLE `doc_pendukung`
  ADD PRIMARY KEY (`doc_pendukung_id`),
  ADD KEY `laporan_id` (`laporan_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_nrp` (`user_nrp`),
  ADD KEY `pelapor_nik` (`pelapor_nik`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`pangkat_id`);

--
-- Indexes for table `pelapor`
--
ALTER TABLE `pelapor`
  ADD PRIMARY KEY (`pelapor_nik`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_nrp`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `pangkat_id` (`pangkat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  MODIFY `detail_laporan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doc_pendukung`
--
ALTER TABLE `doc_pendukung`
  MODIFY `doc_pendukung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  ADD CONSTRAINT `detail_laporan_ibfk_1` FOREIGN KEY (`laporan_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_laporan_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`jenis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doc_pendukung`
--
ALTER TABLE `doc_pendukung`
  ADD CONSTRAINT `c_doc_laporan` FOREIGN KEY (`laporan_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`user_nrp`) REFERENCES `user` (`user_nrp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`pelapor_nik`) REFERENCES `pelapor` (`pelapor_nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `pangkat_ibfk_1` FOREIGN KEY (`pangkat_id`) REFERENCES `pangkat` (`pangkat_id`),
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
