-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2024 at 05:32 AM
-- Server version: 8.0.34
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slmyid_skripsi_tina`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_alternatif`
--

CREATE TABLE `master_alternatif` (
  `id_alternatif` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_alternatif`
--

INSERT INTO `master_alternatif` (`id_alternatif`, `nama`, `created_by`) VALUES
(3, 'Wardah', 1),
(4, 'MS. Glow', 1),
(5, 'The Originote', 1),
(6, 'Skintific', 1),
(7, 'Npure', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Nami Asima Siahaan');

-- --------------------------------------------------------

--
-- Table structure for table `pm_aspek`
--

CREATE TABLE `pm_aspek` (
  `id_aspek` int NOT NULL,
  `aspek` varchar(50) NOT NULL,
  `prosentase` int NOT NULL,
  `bobot_core` int NOT NULL,
  `bobot_secondary` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pm_aspek`
--

INSERT INTO `pm_aspek` (`id_aspek`, `aspek`, `prosentase`, `bobot_core`, `bobot_secondary`) VALUES
(1, 'Kandungan Produk', 20, 60, 40),
(2, 'Reputasi', 30, 60, 40),
(3, 'Harga', 50, 60, 40);

-- --------------------------------------------------------

--
-- Table structure for table `pm_bobot`
--

CREATE TABLE `pm_bobot` (
  `selisih` int NOT NULL,
  `bobot` float NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pm_bobot`
--

INSERT INTO `pm_bobot` (`selisih`, `bobot`, `keterangan`) VALUES
(-4, 1, 'Kompetensi individu kekurangan 4 tingkat'),
(-3, 2, 'Kompetensi individu  kekurangan 3 tingkat'),
(-2, 3, 'Kompetensi individu kekurangan 2 tingkat'),
(-1, 4, 'Kompetensi individu kekurangan 1 tingkat'),
(0, 5, 'Tidak ada selisih (kompetensi sesuai dgn yg dibutuhkan)'),
(1, 4.5, 'Kompetensi individu kelebihan 1 tingkat'),
(2, 3.5, 'Kompetensi individu kelebihan 2 tingkat'),
(3, 2.5, 'Kompetensi individu  kelebihan 3 tingkat'),
(4, 1.5, 'Kompetensi individu kelebihan 4 tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `pm_faktor`
--

CREATE TABLE `pm_faktor` (
  `id_faktor` int NOT NULL,
  `id_aspek` int NOT NULL,
  `faktor` varchar(100) NOT NULL,
  `target` int NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pm_faktor`
--

INSERT INTO `pm_faktor` (`id_faktor`, `id_aspek`, `faktor`, `target`, `type`) VALUES
(1, 1, 'Glycdic Acid', 3, 'core'),
(2, 1, 'Aloevera', 7, 'core'),
(3, 1, 'Salicylic Acid', 13, 'core'),
(4, 1, 'Niacinamide', 18, 'secondary'),
(5, 1, 'Hyaluronic Acid', 24, 'core'),
(6, 1, 'Panthenol', 27, 'core'),
(7, 1, 'Amino Acid', 33, 'secondary'),
(8, 2, 'Rating Produk', 38, 'secondary'),
(9, 2, 'Testimoni', 42, 'core'),
(10, 2, 'Kualitas', 48, 'core'),
(11, 3, 'Terjangkau', 54, 'core'),
(12, 3, 'Menengah', 58, 'core'),
(13, 3, 'Premium', 62, 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `pm_faktor_nilai`
--

CREATE TABLE `pm_faktor_nilai` (
  `id_faktor_nilai` int NOT NULL,
  `id_faktor` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pm_faktor_nilai`
--

INSERT INTO `pm_faktor_nilai` (`id_faktor_nilai`, `id_faktor`, `nama`, `nilai`) VALUES
(1, 1, 'Sangat Kurang Sreg', 1),
(2, 1, 'Kurang', 2),
(3, 1, 'Cukup', 3),
(4, 1, 'Bagus', 4),
(5, 1, 'Sangat Bagus', 5),
(6, 2, 'Sangat Kurang', 1),
(7, 2, 'Kurang', 2),
(8, 2, 'Cukup', 3),
(9, 2, 'Bagus', 4),
(10, 2, 'Sangat Bagus', 5),
(11, 3, 'Sangat Kurang', 1),
(12, 3, 'Kurang', 2),
(13, 3, 'Cukup', 3),
(14, 3, 'Bagus', 4),
(15, 3, 'Sangat Bagus', 5),
(16, 4, 'Sangat Kurang', 1),
(17, 4, 'Kurang', 2),
(18, 4, 'Cukup', 3),
(19, 4, 'Bagus', 4),
(20, 4, 'Sangat Bagus', 5),
(21, 5, 'Sangat Kurang', 1),
(22, 5, 'Kurang', 2),
(23, 5, 'Cukup', 3),
(24, 5, 'Bagus', 4),
(25, 5, 'Sangat Bagus', 5),
(26, 6, 'Sangat Kurang', 1),
(27, 6, 'Kurang', 2),
(28, 6, 'Cukup', 3),
(29, 6, 'Bagus', 4),
(30, 6, 'Sangat Bagus', 5),
(31, 7, 'Sangat Kurang', 1),
(32, 7, 'Kurang', 2),
(33, 7, 'Cukup', 3),
(34, 7, 'Bagus', 4),
(35, 7, 'Sangat Bagus', 5),
(36, 8, 'Sangat Kurang', 1),
(37, 8, 'Kurang', 2),
(38, 8, 'Cukup', 3),
(39, 8, 'Bagus', 4),
(40, 8, 'Sangat Bagus', 5),
(41, 9, 'Sangat Kurang', 1),
(42, 9, 'Kurang', 2),
(43, 9, 'Cukup', 3),
(44, 9, 'Bagus', 4),
(45, 9, 'Sangat Bagus', 5),
(46, 10, 'Sangat Kurang', 1),
(47, 10, 'Kurang', 2),
(48, 10, 'Cukup', 3),
(49, 10, 'Bagus', 4),
(50, 10, 'Sangat Bagus', 5),
(51, 11, 'Sangat Kurang', 1),
(52, 11, 'Kurang', 2),
(53, 11, 'Cukup', 3),
(54, 11, 'Bagus', 4),
(55, 11, 'Sangat Bagus', 5),
(56, 12, 'Sangat Kurang', 1),
(57, 12, 'Kurang', 2),
(58, 12, 'Cukup', 3),
(59, 12, 'Bagus', 4),
(60, 12, 'Sangat Bagus', 5),
(61, 13, 'Sangat Kurang', 1),
(62, 13, 'Kurang', 2),
(63, 13, 'Cukup', 3),
(64, 13, 'Bagus', 4),
(65, 13, 'Sangat Bagus', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pm_sample`
--

CREATE TABLE `pm_sample` (
  `id_sample` int NOT NULL,
  `id_alternatif` int NOT NULL,
  `id_faktor_nilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pm_sample`
--

INSERT INTO `pm_sample` (`id_sample`, `id_alternatif`, `id_faktor_nilai`) VALUES
(16, 3, 2),
(17, 3, 6),
(18, 3, 14),
(19, 3, 19),
(20, 3, 24),
(21, 3, 27),
(22, 3, 35),
(23, 4, 2),
(24, 4, 7),
(25, 4, 13),
(26, 4, 18),
(27, 4, 22),
(28, 4, 28),
(29, 4, 33),
(30, 5, 3),
(31, 5, 9),
(32, 5, 15),
(33, 5, 17),
(34, 5, 23),
(35, 5, 26),
(36, 5, 31),
(37, 6, 3),
(38, 6, 8),
(39, 6, 13),
(40, 6, 17),
(41, 6, 24),
(42, 6, 27),
(43, 6, 32),
(44, 7, 4),
(45, 7, 8),
(46, 7, 12),
(47, 7, 19),
(48, 7, 25),
(49, 7, 29),
(50, 7, 34),
(51, 3, 39),
(52, 3, 43),
(53, 3, 49),
(54, 4, 38),
(55, 4, 42),
(56, 4, 47),
(57, 5, 39),
(58, 5, 41),
(59, 5, 48),
(60, 6, 39),
(61, 6, 41),
(62, 6, 47),
(63, 7, 40),
(64, 7, 43),
(65, 7, 49),
(66, 3, 53),
(67, 3, 59),
(68, 3, 62),
(69, 4, 52),
(70, 4, 59),
(71, 4, 65),
(72, 5, 54),
(73, 5, 58),
(74, 5, 61),
(75, 6, 53),
(76, 6, 57),
(77, 6, 62),
(78, 7, 55),
(79, 7, 60),
(80, 7, 64);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_alternatif`
--
ALTER TABLE `master_alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `FKmaster_alt801309` (`created_by`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pm_aspek`
--
ALTER TABLE `pm_aspek`
  ADD PRIMARY KEY (`id_aspek`),
  ADD KEY `id_aspek` (`id_aspek`);

--
-- Indexes for table `pm_bobot`
--
ALTER TABLE `pm_bobot`
  ADD PRIMARY KEY (`selisih`);

--
-- Indexes for table `pm_faktor`
--
ALTER TABLE `pm_faktor`
  ADD PRIMARY KEY (`id_faktor`),
  ADD KEY `id_faktor` (`id_faktor`),
  ADD KEY `FKpm_faktor439336` (`id_aspek`);

--
-- Indexes for table `pm_faktor_nilai`
--
ALTER TABLE `pm_faktor_nilai`
  ADD PRIMARY KEY (`id_faktor_nilai`),
  ADD KEY `id_faktor_nilai` (`id_faktor_nilai`),
  ADD KEY `FKpm_faktor_541608` (`id_faktor`);

--
-- Indexes for table `pm_sample`
--
ALTER TABLE `pm_sample`
  ADD PRIMARY KEY (`id_sample`),
  ADD KEY `id_sample` (`id_sample`),
  ADD KEY `FKpm_sample574090` (`id_faktor_nilai`),
  ADD KEY `FKpm_sample680675` (`id_alternatif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_alternatif`
--
ALTER TABLE `master_alternatif`
  MODIFY `id_alternatif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pm_aspek`
--
ALTER TABLE `pm_aspek`
  MODIFY `id_aspek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pm_faktor`
--
ALTER TABLE `pm_faktor`
  MODIFY `id_faktor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pm_faktor_nilai`
--
ALTER TABLE `pm_faktor_nilai`
  MODIFY `id_faktor_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `pm_sample`
--
ALTER TABLE `pm_sample`
  MODIFY `id_sample` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_alternatif`
--
ALTER TABLE `master_alternatif`
  ADD CONSTRAINT `FKmaster_alt801309` FOREIGN KEY (`created_by`) REFERENCES `master_user` (`id_user`);

--
-- Constraints for table `pm_faktor`
--
ALTER TABLE `pm_faktor`
  ADD CONSTRAINT `FKpm_faktor439336` FOREIGN KEY (`id_aspek`) REFERENCES `pm_aspek` (`id_aspek`);

--
-- Constraints for table `pm_faktor_nilai`
--
ALTER TABLE `pm_faktor_nilai`
  ADD CONSTRAINT `FKpm_faktor_541608` FOREIGN KEY (`id_faktor`) REFERENCES `pm_faktor` (`id_faktor`);

--
-- Constraints for table `pm_sample`
--
ALTER TABLE `pm_sample`
  ADD CONSTRAINT `FKpm_sample574090` FOREIGN KEY (`id_faktor_nilai`) REFERENCES `pm_faktor_nilai` (`id_faktor_nilai`),
  ADD CONSTRAINT `FKpm_sample680675` FOREIGN KEY (`id_alternatif`) REFERENCES `master_alternatif` (`id_alternatif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
