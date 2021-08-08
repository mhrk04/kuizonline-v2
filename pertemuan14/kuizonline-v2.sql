-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2021 at 10:35 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuizonline`
--
CREATE DATABASE IF NOT EXISTS `kuizonline` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kuizonline`;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `IDGuru` varchar(3) NOT NULL,
  `Nama_Guru` varchar(60) NOT NULL,
  `KataLaluan` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`IDGuru`, `Nama_Guru`, `KataLaluan`) VALUES
('G01', 'Norliza ', '1234'),
('G02', 'Rashid Raup', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `IDKelas` varchar(3) NOT NULL,
  `Nama_Kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`IDKelas`, `Nama_Kelas`) VALUES
('K01', 'Amanah'),
('K02', 'Luhur');

-- --------------------------------------------------------

--
-- Table structure for table `kuiz`
--

CREATE TABLE `kuiz` (
  `IDPelajar` varchar(4) NOT NULL,
  `IDSoalan` varchar(4) NOT NULL,
  `Tarikh` varchar(10) DEFAULT NULL,
  `Pilihan` varchar(2) DEFAULT NULL,
  `Peratus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuiz`
--

INSERT INTO `kuiz` (`IDPelajar`, `IDSoalan`, `Tarikh`, `Pilihan`, `Peratus`) VALUES
('P001', 'S001', '08/08/2021', 'C', 60),
('P001', 'S002', '08/08/2021', 'B', 60),
('P001', 'S003', '08/08/2021', 'C', 60),
('P001', 'S004', '08/08/2021', 'B', 60),
('P001', 'S005', '08/08/2021', 'A', 60),
('P002', 'S001', '27/07/2021', '', 0),
('P002', 'S002', '27/07/2021', '', 0),
('P002', 'S003', '27/07/2021', '', 0),
('P002', 'S004', '27/07/2021', '', 0),
('P002', 'S005', '27/07/2021', '', 0),
('P003', 'S001', '08/08/2021', 'A', 80),
('P003', 'S002', '08/08/2021', 'B', 80),
('P003', 'S003', '08/08/2021', 'C', 80),
('P003', 'S004', '08/08/2021', 'A', 80),
('P003', 'S005', '08/08/2021', 'B', 80);

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `IDPelajar` varchar(4) NOT NULL,
  `Nama_Pelajar` varchar(800) NOT NULL,
  `IDKelas` varchar(3) NOT NULL,
  `KataLaluan` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`IDPelajar`, `Nama_Pelajar`, `IDKelas`, `KataLaluan`) VALUES
('gryu', 'deahanmingung', 'k01', 'pukan\n'),
('kj12', 'khai', 'k02', '852963\n'),
('klTP', 'Inngan seregi', 'K02', '12345'),
('P001', 'Amsyar Rashid', 'K01', '7676'),
('P002', 'Azli', 'K01', '7676'),
('P003', 'Amar', 'K02', '1616'),
('p772', 'torai', 'k01', 'michingae'),
('PJS2', 'deahanmingung', 'k01', 'pukan\n'),
('pp12', 'ketom', 'K01', '7979\n'),
('wp01', 'deahanmingung', 'k01', 'pukan\n'),
('wp02', 'torai', 'k01', 'michingae');

-- --------------------------------------------------------

--
-- Table structure for table `soalan`
--

CREATE TABLE `soalan` (
  `IDSoalan` varchar(4) NOT NULL,
  `Nama_Soalan` text NOT NULL,
  `Pilihan_A` text NOT NULL,
  `Pilihan_B` text NOT NULL,
  `Pilihan_C` text NOT NULL,
  `Jawapan` varchar(1) NOT NULL,
  `IDGuru` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soalan`
--

INSERT INTO `soalan` (`IDSoalan`, `Nama_Soalan`, `Pilihan_A`, `Pilihan_B`, `Pilihan_C`, `Jawapan`, `IDGuru`) VALUES
('S001', 'Apakah tujuan penubuhan negeri-negeri selat?', 'Untuk menyeragamkan pentadbiran & jimatkan perbelanjaan', 'untuk mengisi masa lapang', 'British saje-saje', 'A', 'G01'),
('S002', 'Berikut ialah negeri-negeri Selat kecuali:', 'Pulau Pinang', 'Negeri Sembilan', 'Singapura', 'B', 'G01'),
('S003', 'Apakah barangan dari China yang diperlukan oleh British?', 'Emas', 'Perak', 'Teh', 'C', 'G01'),
('S004', 'Kedudukan Singapura di bahagian selatan Semenanjung Tanah Melayu dapat mengawal kegiatan perdagangan Selat _________ dan Selat Sunda.', 'Melaka', 'Johor', 'Sumatera', 'A', 'G02'),
('S005', 'Siapakah Residen pertama di Singapura?', 'William Farquhar', 'Stamford Raffles', 'Edward Monckton', 'A', 'G02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`IDGuru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`IDKelas`);

--
-- Indexes for table `kuiz`
--
ALTER TABLE `kuiz`
  ADD PRIMARY KEY (`IDPelajar`,`IDSoalan`),
  ADD KEY `kuiz_soalan` (`IDSoalan`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`IDPelajar`),
  ADD KEY `IDKelas` (`IDKelas`);

--
-- Indexes for table `soalan`
--
ALTER TABLE `soalan`
  ADD PRIMARY KEY (`IDSoalan`),
  ADD KEY `IDGuru` (`IDGuru`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kuiz`
--
ALTER TABLE `kuiz`
  ADD CONSTRAINT `kuiz_pelajar` FOREIGN KEY (`IDPelajar`) REFERENCES `pelajar` (`IDPelajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kuiz_soalan` FOREIGN KEY (`IDSoalan`) REFERENCES `soalan` (`IDSoalan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD CONSTRAINT `pelajar_kelas` FOREIGN KEY (`IDKelas`) REFERENCES `kelas` (`IDKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soalan`
--
ALTER TABLE `soalan`
  ADD CONSTRAINT `soalan_guru` FOREIGN KEY (`IDGuru`) REFERENCES `guru` (`IDGuru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
