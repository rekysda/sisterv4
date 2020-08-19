-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 09:00 AM
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
-- Table structure for table `ppdb_rapor`
--

CREATE TABLE `ppdb_rapor` (
  `id` int(5) NOT NULL,
  `siswa` text NOT NULL,
  `mapel1` text NOT NULL,
  `mapel2` text NOT NULL,
  `mapel3` text NOT NULL,
  `mapel4` text NOT NULL,
  `mapel5` text NOT NULL,
  `mapel6` text NOT NULL,
  `mapel7` text NOT NULL,
  `mapel8` text NOT NULL,
  `mapel9` text NOT NULL,
  `mapel10` text NOT NULL,
  `mapel11` text NOT NULL,
  `mapel12` text NOT NULL,
  `mapel13` text NOT NULL,
  `mapel14` text NOT NULL,
  `mapel15` text NOT NULL,
  `mapel16` text NOT NULL,
  `mapel17` text NOT NULL,
  `mapel18` text NOT NULL,
  `mapel19` text NOT NULL,
  `mapel20` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ppdb_rapor`
--
ALTER TABLE `ppdb_rapor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ppdb_rapor`
--
ALTER TABLE `ppdb_rapor`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
