-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 07:49 AM
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
-- Table structure for table `ppdb_preregistrasi`
--

DROP TABLE IF EXISTS `ppdb_preregistrasi`;
CREATE TABLE `ppdb_preregistrasi` (
  `id` int(6) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `asalsekolah` text NOT NULL,
  `email` text NOT NULL,
  `noformulir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ppdb_preregistrasi`
--
ALTER TABLE `ppdb_preregistrasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ppdb_preregistrasi`
--
ALTER TABLE `ppdb_preregistrasi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
