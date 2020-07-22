-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 06:51 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisterv4`
--

-- --------------------------------------------------------

--
-- Table structure for table `akad_siswaabsenjournal`
--

DROP TABLE IF EXISTS `akad_siswaabsenjournal`;
CREATE TABLE `akad_siswaabsenjournal` (
  `id` int(5) NOT NULL,
  `tahunakademik_id` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `kelas_id` varchar(10) NOT NULL,
  `siswa_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `journal_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akad_siswaabsenjournal`
--

INSERT INTO `akad_siswaabsenjournal` (`id`, `tahunakademik_id`, `semester`, `bulan`, `tahun`, `tanggal`, `kelas_id`, `siswa_id`, `status`, `journal_id`) VALUES
(46, '1', '1', '7', '2020', '2020-07-21', '5', '5', 'S', '10'),
(47, '1', '1', '7', '2020', '2020-07-21', '5', '6', 'A', '10'),
(48, '1', '1', '7', '2020', '2020-07-21', '5', '7', 'S', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akad_siswaabsenjournal`
--
ALTER TABLE `akad_siswaabsenjournal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akad_siswaabsenjournal`
--
ALTER TABLE `akad_siswaabsenjournal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
