-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2025 at 03:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dukcapil_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_pengaduan`
--

CREATE TABLE `tb_kategori_pengaduan` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kategori_pengaduan`
--

INSERT INTO `tb_kategori_pengaduan` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Persyaratan'),
(2, 'Verifikasi Data'),
(3, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level_petugas`
--

CREATE TABLE `tb_level_petugas` (
  `id_level` int NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_level_petugas`
--

INSERT INTO `tb_level_petugas` (`id_level`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `nik_penduduk` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto_profil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`nik_penduduk`, `nama`, `username`, `password`, `email`, `no_telp`, `alamat`, `foto_profil`, `created_at`) VALUES
('1122334455667788', 'Penduduk', 'penduduk', '$2y$10$kVio8IhsPCMBdep1QRS9numBTv/aYR5tJmHvLN86rdD5Zhlj.K5ei', 'penduduk@penduduk', '08123456789', 'Jombang', 'default.jpg', '2025-01-10 16:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int NOT NULL,
  `pesan` text NOT NULL,
  `file` text NOT NULL,
  `status` enum('proses','selesai') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nik_penduduk` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_kategori` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `pesan`, `file`, `status`, `created_at`, `nik_penduduk`, `id_kategori`) VALUES
(6, 'tes', '1736568533_confirm.png', 'proses', '2025-01-11 04:08:53', '1122334455667788', 3),
(8, 'tes2', '', 'selesai', '2025-01-11 04:11:44', '1122334455667788', 3),
(10, 'Apa syarat memperbarui KK', '', 'proses', '2025-01-11 06:15:43', '1122334455667788', 1),
(11, 'Blangko KTP sudah ada?', '', 'selesai', '2025-01-11 06:16:00', '1122334455667788', 3),
(12, 'Syarat membuat KIA', '', 'proses', '2025-01-11 06:16:14', '1122334455667788', 1),
(13, 'halo', '', 'selesai', '2025-01-11 15:46:15', '1122334455667788', 3),
(14, 'Verifikasi data ini ya..', '1736664220_gcloud-logo.jpg', 'proses', '2025-01-12 06:43:40', '1122334455667788', 2),
(15, 'Verifikasi data ini', '1736664267_gcloud-logo.jpg', 'proses', '2025-01-12 06:44:27', '1122334455667788', 2),
(16, 'Selamat siang', '', 'selesai', '2025-01-12 06:48:24', '1122334455667788', 3),
(17, 'Tes tes tes', '', 'proses', '2025-01-12 06:49:33', '1122334455667788', 3),
(18, 'bisa kah?', '', 'proses', '2025-01-12 06:57:04', '1122334455667788', 3),
(19, 'Tes', '', 'proses', '2025-01-13 15:09:26', '1122334455667788', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `nik_petugas` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto_profil` text NOT NULL,
  `id_level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`nik_petugas`, `nama`, `username`, `password`, `email`, `no_telp`, `alamat`, `created_at`, `foto_profil`, `id_level`) VALUES
('0000000000000000', 'Administrator', 'admin', '$2y$10$ReWhnaKE2KI3R.IzhXmZPOefKxLcO.LjbkJgmm3bT6kR8c4tT5yVC', 'admin@admin', '0000', '-', '2025-01-13 10:35:54', 'default.jpg', 1),
('1111111111111111', 'Operator 1', 'operator1', '$2y$10$0fqDyh/L4dcTeZ4iOpKvRuMN4i06tN9yRj.HMwI0gC/YywlZR7Je2', 'operator1@operator', '08123456789', 'Jombang', '2025-01-13 10:40:41', 'default.jpg', 2),
('2222222222222222', 'Operator 2', 'operator2', '$2y$10$DAxONu.cnH7tSM/8Na4J..IaH31KxEgMqUOkdhyCTge3lqSt0s0rK', 'operator2@operator', '08987654321', 'Jombang', '2025-01-13 10:41:10', 'default.jpg', 2),
('3333333333333333', 'Operator 3', 'operator3', '$2y$10$n.cXjKsI9r1TRkPD7TMiWOus5/17F9bpDwK0TNLqRJ.7uf3JPARW6', 'operator3@operator', '000', 'Mojokerto', '2025-01-13 15:08:13', 'default.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanggapan`
--

CREATE TABLE `tb_tanggapan` (
  `id_tanggapan` int NOT NULL,
  `tanggapan` text NOT NULL,
  `file_tanggapan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pengaduan` int NOT NULL,
  `nik_petugas` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tanggapan`
--

INSERT INTO `tb_tanggapan` (`id_tanggapan`, `tanggapan`, `file_tanggapan`, `created_at`, `id_pengaduan`, `nik_petugas`) VALUES
(2, 'Halo juga', '', '2025-01-13 14:52:46', 13, '0000000000000000'),
(3, 'Selamat malam', '', '2025-01-13 14:57:25', 16, '0000000000000000'),
(4, 'ya', '', '2025-01-13 15:04:45', 8, '0000000000000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori_pengaduan`
--
ALTER TABLE `tb_kategori_pengaduan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_level_petugas`
--
ALTER TABLE `tb_level_petugas`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`nik_penduduk`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_kategori` (`id_kategori`) USING BTREE,
  ADD KEY `nik_penduduk` (`nik_penduduk`) USING BTREE;

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`nik_petugas`),
  ADD KEY `id_level` (`id_level`) USING BTREE;

--
-- Indexes for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`) USING BTREE,
  ADD KEY `nik_petugas` (`nik_petugas`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori_pengaduan`
--
ALTER TABLE `tb_kategori_pengaduan`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_level_petugas`
--
ALTER TABLE `tb_level_petugas`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  MODIFY `id_tanggapan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD CONSTRAINT `tb_pengaduan_ibfk_1` FOREIGN KEY (`nik_penduduk`) REFERENCES `tb_penduduk` (`nik_penduduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengaduan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori_pengaduan` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level_petugas` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD CONSTRAINT `tb_tanggapan_ibfk_1` FOREIGN KEY (`nik_petugas`) REFERENCES `tb_petugas` (`nik_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tanggapan_ibfk_2` FOREIGN KEY (`id_pengaduan`) REFERENCES `tb_pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
