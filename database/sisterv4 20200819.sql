-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 08:59 AM
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
CREATE DATABASE IF NOT EXISTS `sisterv4` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sisterv4`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `purchase` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `year`, `purchase`, `sale`, `profit`) VALUES
(1, 2013, 2000, 3000, 1000),
(2, 2014, 4500, 5000, 500),
(3, 2015, 3000, 4500, 1500),
(4, 2016, 2000, 3000, 1000),
(5, 2017, 2000, 4000, 2000),
(6, 2018, 2200, 3000, 800),
(7, 2019, 5000, 7000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `akad_journalkbm`
--

DROP TABLE IF EXISTS `akad_journalkbm`;
CREATE TABLE `akad_journalkbm` (
  `id` int(10) NOT NULL,
  `jadwal_id` int(10) NOT NULL,
  `tahunakademik_id` int(10) NOT NULL,
  `mapel_id` int(10) NOT NULL,
  `kelas_id` int(10) NOT NULL,
  `guru_id` int(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jamke` varchar(50) NOT NULL,
  `materi` text NOT NULL,
  `keterangan` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akad_journalkbm`
--

INSERT INTO `akad_journalkbm` (`id`, `jadwal_id`, `tahunakademik_id`, `mapel_id`, `kelas_id`, `guru_id`, `hari`, `tanggal`, `jamke`, `materi`, `keterangan`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 5, 'kamis', '2019-07-25', '4', 'test 444', 'keterangan 444', '2019-07-24 21:06:56'),
(3, 4, 1, 3, 1, 2, 'Rabu', '2019-07-24', '3', 'Jurnal 3', '', '2019-07-24 20:06:42'),
(4, 1, 1, 1, 1, 5, 'Senin', '2019-07-22', '1', 'Pertemuan 1', '', '2019-07-24 20:19:44'),
(6, 1, 1, 1, 1, 5, 'Jumat', '2019-07-26', '6', 'jam ke 6', '', '2019-07-24 21:03:50'),
(7, 1, 1, 1, 1, 5, 'Senin', '2019-06-24', '1', 'Materi 00', '', '2019-07-26 08:51:08'),
(8, 8, 1, 1, 3, 5, 'Rabu', '2019-07-29', '1', 'perkenalan', '', '2019-07-26 09:19:26'),
(10, 9, 1, 1, 5, 3, 'Senin', '2020-08-21', '1', '112', '112', '2020-07-24 08:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `akad_kegiatanakademik`
--

DROP TABLE IF EXISTS `akad_kegiatanakademik`;
CREATE TABLE `akad_kegiatanakademik` (
  `id` int(6) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `tanggal_awal` datetime NOT NULL,
  `tanggal_akhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akad_kegiatanakademik`
--

INSERT INTO `akad_kegiatanakademik` (`id`, `judul`, `tanggal_awal`, `tanggal_akhir`) VALUES
(1, 'Makan Siang', '2019-07-04 06:00:49', '2019-07-05 16:00:58'),
(3, 'Makan Malam', '2019-07-12 12:00:06', '2019-07-13 12:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `akad_siswaabsenharian`
--

DROP TABLE IF EXISTS `akad_siswaabsenharian`;
CREATE TABLE `akad_siswaabsenharian` (
  `id` int(5) NOT NULL,
  `tahunakademik_id` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `kelas_id` varchar(10) NOT NULL,
  `siswa_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akad_siswaabsenharian`
--

INSERT INTO `akad_siswaabsenharian` (`id`, `tahunakademik_id`, `semester`, `bulan`, `tahun`, `tanggal`, `kelas_id`, `siswa_id`, `status`) VALUES
(1, '1', '1', '8', '2020', '2020-08-12', '5', '5', 'A'),
(2, '1', '1', '8', '2020', '2020-08-12', '5', '6', 'H'),
(3, '1', '1', '8', '2020', '2020-08-12', '5', '7', 'H'),
(4, '1', '1', '8', '2020', '2020-08-13', '5', '5', 'H'),
(5, '1', '1', '8', '2020', '2020-08-13', '5', '6', 'I'),
(6, '1', '1', '8', '2020', '2020-08-13', '5', '7', 'H');

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
(85, '1', '1', '8', '2020', '2020-08-21', '5', '5', 'H', '10'),
(86, '1', '1', '8', '2020', '2020-08-21', '5', '6', 'I', '10'),
(87, '1', '1', '8', '2020', '2020-08-21', '5', '7', 'S', '10');

-- --------------------------------------------------------

--
-- Table structure for table `apiemail`
--

DROP TABLE IF EXISTS `apiemail`;
CREATE TABLE `apiemail` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apiemail`
--

INSERT INTO `apiemail` (`id`, `name`, `value`) VALUES
(1, 'email_sekolah', 'rekysda@gmail.com'),
(3, 'sent_notif_paid', '1'),
(4, 'email_kepsek', 'rekysmtp@gmail.com'),
(5, 'send_notif_bukutamu', '1'),
(6, 'send_notif_pelanggaran', '1');

-- --------------------------------------------------------

--
-- Table structure for table `apisms`
--

DROP TABLE IF EXISTS `apisms`;
CREATE TABLE `apisms` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apisms`
--

INSERT INTO `apisms` (`id`, `name`, `value`) VALUES
(1, 'sent_notif_paid', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bk_kategori_pelanggaran`
--

DROP TABLE IF EXISTS `bk_kategori_pelanggaran`;
CREATE TABLE `bk_kategori_pelanggaran` (
  `id` int(5) NOT NULL,
  `kategori` varchar(215) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bk_kategori_pelanggaran`
--

INSERT INTO `bk_kategori_pelanggaran` (`id`, `kategori`) VALUES
(7, 'A. KEDISIPLINAN'),
(8, 'B. KEBERSIHAN'),
(9, 'C. KESEHATAN'),
(10, 'D. TANGGUNG JAWAB'),
(11, 'E. SOPAN SANTUN'),
(12, 'F. HUBUNGAN SOSIAL'),
(13, 'G. KEJUJURAN'),
(14, 'H. PELAKSANAAN IBADAH'),
(16, 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `bk_pelanggaran`
--

DROP TABLE IF EXISTS `bk_pelanggaran`;
CREATE TABLE `bk_pelanggaran` (
  `id` int(5) NOT NULL,
  `kategori_id` int(4) NOT NULL,
  `pelanggaran` varchar(512) NOT NULL,
  `point` int(10) NOT NULL,
  `sanksi` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bk_pelanggaran`
--

INSERT INTO `bk_pelanggaran` (`id`, `kategori_id`, `pelanggaran`, `point`, `sanksi`) VALUES
(25, 7, 'Meninggalkan kelas, pelajaran dan sekolah tanpa izin guru pengajar', 20, ''),
(26, 7, 'Tidak segera masuk kelas setelah bel dibunyikan', 10, ''),
(27, 7, 'Membawa kartu/bermain kartu', 15, ''),
(28, 7, 'Dengan sengaja mengoperasikan HP pada saat pelajaran sedang berlangsung', 15, ''),
(29, 7, 'Tidak/lupa/lalai mematikan HP pada saat pelajaran sedang berlangsung', 10, ''),
(31, 7, 'Mengkonsumsi makanan dan minuman dalam bentuk apapun saat pelajaran sedang berlangsung', 15, ''),
(32, 7, 'Terlambat masuk sekolah', 10, 'Siswa diberi sanksi ketertiban seperti baris berbaris, lari'),
(33, 7, 'Ke kantin saat jam pelajaran sedang berlangsung', 20, ''),
(34, 7, 'Absen tanpa keterangan/alpha', 20, ''),
(35, 7, 'Mengeluarkan baju selama berada di lingkungan sekolah (Seragam Putih Abu Abu)', 10, ''),
(36, 7, 'Mengenakan seragam yang tidak sesuai dengan ketentuan sekolah', 15, ''),
(37, 7, 'Tidak memakai seragam (pada saat pelajaran olah raga)', 10, ''),
(38, 7, 'Tidak memakai baju batik pada Hardiknas dan Harkitnas', 10, ''),
(39, 7, 'Memakai model seragam yang tidak sesuai dengan ketentuan sekolah', 15, ''),
(40, 7, 'Potongan rambut yang tidak sesuai dengan ketentuan sekolah ', 15, ''),
(41, 8, ' Mencorat-coret/merusak fasilitas sekolah', 20, ''),
(42, 8, 'Menyemir rambut kecuali warna hitam', 20, ''),
(43, 8, 'Membuang sampah tidak pada tempatnya', 10, ''),
(44, 8, 'Kuku di cat', 20, ''),
(45, 8, 'Seragam yang dicorat-coret (baju,dasi,rok dan celana)', 20, ''),
(46, 9, ' Merokok dan minum minuman keras', 50, ''),
(47, 9, 'Mengkonsumsi Narkoba', 100, ''),
(48, 9, 'Tidak Mengikuti pelajaran Olah Raga tanpa keterangan', 20, ''),
(49, 9, 'Mentato tubuh permanen maupun tidak permanen', 50, ''),
(50, 9, 'Memakai kosmetik berlebihan', 20, ''),
(51, 10, 'Mengerjakan tugas yang tidak sesuai dengan mata pelajaran yang sedang dikerjakan', 10, ''),
(52, 10, 'Mengabaikan panggilan yang diberikan oleh kepala sekoalah, guru dan pegawai', 20, ''),
(53, 10, 'Tidak Membawa buku pribadi selama proses belajar mengajar berlangsung', 10, ''),
(54, 10, 'Buku pribadi hilang', 20, ''),
(55, 10, 'Tidak mengerjakan PR/tugas dari guru', 20, ''),
(56, 11, 'Berpilaku tidak sopan', 20, ''),
(57, 11, 'Mengeluarkan kata-kata kotor', 20, ''),
(58, 11, 'Tidak Menghargai orang lain', 10, ''),
(59, 12, 'Memakai perhiasan yang dilarang', 10, ''),
(60, 12, 'Putra memakai giwang, putri memakai giwang lebih dari satu pasang', 15, ''),
(61, 12, 'Berkelahi', 50, ''),
(62, 12, 'Mencuri', 100, ''),
(63, 12, 'Hamil dan Menghamili', 100, ''),
(64, 13, ' Mencontek pada saat ujian/ulangan', 20, ''),
(65, 13, 'Memberikan contekan pada saat ujian/ulangan', 20, ''),
(66, 13, 'Mengubah/memalsu rapor', 100, ''),
(67, 13, 'Membuat izin palsu', 50, ''),
(68, 13, 'Memalsu tanda tangan pegawai/guru/orang tua/wali/kepala sekolah/stempel sekolah', 100, ''),
(69, 13, 'Berbohong pada kepala sekolah,guru dan pegawai', 25, ''),
(71, 14, 'Ramai saat mengikuti ibadah', 25, ''),
(72, 14, 'Tidak Mengikuti Ibadah Wajib yang diadakan Sekolah', 25, '');

-- --------------------------------------------------------

--
-- Table structure for table `bk_siswapelanggaran`
--

DROP TABLE IF EXISTS `bk_siswapelanggaran`;
CREATE TABLE `bk_siswapelanggaran` (
  `id` int(5) NOT NULL,
  `tahunakademik_id` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `siswa_id` varchar(10) NOT NULL,
  `kelas_id` varchar(50) NOT NULL,
  `pelanggaran_id` varchar(10) NOT NULL,
  `point` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bk_siswapelanggaran`
--

INSERT INTO `bk_siswapelanggaran` (`id`, `tahunakademik_id`, `semester`, `tanggal`, `siswa_id`, `kelas_id`, `pelanggaran_id`, `point`, `status`) VALUES
(3, '1', '1', '2019-08-26', '1', '1', '64', '20', '1'),
(4, '1', '1', '2019-08-26', '11', '1', '32', '10', '1'),
(5, '1', '1', '2019-08-26', '6', '4', '29', '10', '1'),
(6, '1', '1', '2019-08-27', '3', '1', '69', '25', '1'),
(7, '1', '1', '2019-08-27', '1', '1', '41', '20', '0'),
(8, '1', '1', '2019-08-28', '6', '4', '58', '10', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bk_siswaprestasi`
--

DROP TABLE IF EXISTS `bk_siswaprestasi`;
CREATE TABLE `bk_siswaprestasi` (
  `id` int(5) NOT NULL,
  `tahunakademik_id` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `siswa_id` varchar(10) NOT NULL,
  `kelas_id` varchar(50) NOT NULL,
  `tingkat_id` varchar(10) NOT NULL,
  `lomba` varchar(200) NOT NULL,
  `instansi` varchar(200) NOT NULL,
  `prestasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bk_siswaprestasi`
--

INSERT INTO `bk_siswaprestasi` (`id`, `tahunakademik_id`, `semester`, `tanggal`, `siswa_id`, `kelas_id`, `tingkat_id`, `lomba`, `instansi`, `prestasi`) VALUES
(1, '1', '1', '2020-05-15', '1', '1', '1', 'MEWARNAI', 'SMU PETRA', 'JUARA I'),
(3, '1', '1', '2020-05-15', '5', '1', '2', '11', '11', '11'),
(4, '1', '1', '2020-05-15', '7', '1', '3', '11 22', '11 22', '11 22'),
(6, '1', '1', '2020-05-15', '1', '1', '3', 'BASKET', 'UNAIR', 'JUARA III');

-- --------------------------------------------------------

--
-- Table structure for table `bk_tingkat`
--

DROP TABLE IF EXISTS `bk_tingkat`;
CREATE TABLE `bk_tingkat` (
  `id` int(5) NOT NULL,
  `tingkat` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bk_tingkat`
--

INSERT INTO `bk_tingkat` (`id`, `tingkat`) VALUES
(1, 'KOTA'),
(2, 'PROPINSI'),
(3, 'NASIONAL'),
(4, 'INTERNASIONAL');

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

DROP TABLE IF EXISTS `bukutamu`;
CREATE TABLE `bukutamu` (
  `id` int(6) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `maksud` varchar(500) NOT NULL,
  `diterima` varchar(500) NOT NULL,
  `notifemail` varchar(100) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `tahun`, `nomor`, `tanggal`, `nama`, `jabatan`, `hp`, `maksud`, `diterima`, `notifemail`, `catatan`, `status`) VALUES
(1, '2019', '20190001', '2019-08-22', 'Bobby', 'Marketing', '081335054383', 'Penawaran Sistem', 'Kepala Sekolah', '', 'tdk ada', 1),
(3, '2019', '20190002', '2019-08-23', 'Goldie', 'Guru', '08123271294', 'Tidak Ada', 'Kepsek', '', '-', 1),
(4, '2019', '20190003', '2019-08-23', 'Andre', 'CEO', '081223345', 'Kerjasama', 'Kepala Sekolah', '', 'Pertemuan pertama', 1),
(6, '2019', '20190005', '2019-08-24', '123', '123', '123', '123', '123', '', '', 0),
(7, '2019', '20190006', '2019-10-18', 'Andri', 'Panitia Lomba', '081335054838', 'Bantuan Dana untuk Lomba', 'Kepala Sekolah', '', '-', 0),
(8, '2020', '20200007', '2020-05-13', '123', '123', '123', '123', '3', 'rekysda@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hrd_penggajian`
--

DROP TABLE IF EXISTS `hrd_penggajian`;
CREATE TABLE `hrd_penggajian` (
  `id` int(2) NOT NULL,
  `id_pegawai` int(6) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `tanggalcetak` timestamp NOT NULL DEFAULT current_timestamp(),
  `gajipokok` varchar(50) NOT NULL DEFAULT '0',
  `gelar` varchar(50) NOT NULL,
  `sertifikasi` varchar(50) NOT NULL,
  `masakerja` varchar(50) NOT NULL,
  `gajiperjam` varchar(50) NOT NULL,
  `jamngajar` varchar(50) NOT NULL,
  `gajingajar` varchar(50) NOT NULL,
  `transport` varchar(50) NOT NULL,
  `laboratorium` varchar(50) NOT NULL,
  `walikelas` varchar(50) NOT NULL,
  `sosial` varchar(50) NOT NULL,
  `bpjs` varchar(50) NOT NULL,
  `gajiditerima` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrd_penggajian`
--

INSERT INTO `hrd_penggajian` (`id`, `id_pegawai`, `bulan`, `tahun`, `tanggalcetak`, `gajipokok`, `gelar`, `sertifikasi`, `masakerja`, `gajiperjam`, `jamngajar`, `gajingajar`, `transport`, `laboratorium`, `walikelas`, `sosial`, `bpjs`, `gajiditerima`) VALUES
(4, 1, 1, '2019', '2019-06-14 17:00:00', '800000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '800000'),
(5, 1, 2, '2019', '2019-06-14 17:00:00', '1500000', '70000', '80000', '50000', '10000', '50', '500000', '500000', '80000', '50000', '80000', '120000', '2630000'),
(6, 1, 6, '2019', '2019-06-15 17:00:00', '3500000', '600000', '50000', '700000', '10', '12500', '125000', '25000', '25000', '70000', '60000', '100000', '4935000'),
(7, 8, 6, '2019', '2019-06-15 17:00:00', '2000000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2000000'),
(8, 5, 3, '2020', '2020-03-17 17:00:00', '5000000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5000000');

-- --------------------------------------------------------

--
-- Table structure for table `m_agama`
--

DROP TABLE IF EXISTS `m_agama`;
CREATE TABLE `m_agama` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_agama`
--

INSERT INTO `m_agama` (`id`, `nama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'KongHuChu'),
(7, 'Aliran Kepercayaan');

-- --------------------------------------------------------

--
-- Table structure for table `m_apilist`
--

DROP TABLE IF EXISTS `m_apilist`;
CREATE TABLE `m_apilist` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_apilist`
--

INSERT INTO `m_apilist` (`id`, `nama`, `link`) VALUES
(1, 'Tahun Akademik List', 'tahunakademiklist'),
(2, 'Tahun Akademik Aktif', 'tahunakademikaktif'),
(3, 'Siswa Detail NIS', 'siswadetail?nis=190001'),
(4, 'Siswa Tagihan NIS', 'siswatagihan?nis=190001'),
(5, 'Siswa Presensi NIS', 'siswapresensi?nis=190001'),
(6, 'Siswa Pelanggaran NIS', 'siswapelanggaran?nis=190001'),
(7, 'Siswa Prestasi NIS', 'siswaprestasi?nis=190001'),
(8, 'Siswa Pembayaran NIS', 'siswapembayaran?nis=190001'),
(9, 'Update Push Notif ID', 'updatepushnotif?id=101'),
(10, 'Insert Device ID Siswa', 'insertdeviceidsiswa?nis=190001&deviceid=190001'),
(11, 'Get DeviceID Siswa', 'getsiswadeviceid?nis=190001');

-- --------------------------------------------------------

--
-- Table structure for table `m_biaya`
--

DROP TABLE IF EXISTS `m_biaya`;
CREATE TABLE `m_biaya` (
  `id` int(6) NOT NULL,
  `category_id` int(6) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `is_publish` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_biaya`
--

INSERT INTO `m_biaya` (`id`, `category_id`, `nama`, `is_publish`) VALUES
(1, 1, '2020_UANG GEDUNG I', 1),
(2, 1, '2020_SERAGAM', 1),
(3, 2, '2020_SPP JULI', 1),
(4, 1, '2020_UANG GEDUNG II', 1),
(5, 1, '2020_UANG GEDUNG III', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_biaya_categories`
--

DROP TABLE IF EXISTS `m_biaya_categories`;
CREATE TABLE `m_biaya_categories` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_biaya_categories`
--

INSERT INTO `m_biaya_categories` (`id`, `nama`) VALUES
(1, 'PPDB'),
(2, 'SPP'),
(3, 'DAFTARULANG'),
(4, 'LAIN-LAIN');

-- --------------------------------------------------------

--
-- Table structure for table `m_carabayar`
--

DROP TABLE IF EXISTS `m_carabayar`;
CREATE TABLE `m_carabayar` (
  `id` int(11) NOT NULL,
  `carabayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_carabayar`
--

INSERT INTO `m_carabayar` (`id`, `carabayar`) VALUES
(1, 'TUNAI'),
(2, 'TRANSFER'),
(3, 'DEBIT');

-- --------------------------------------------------------

--
-- Table structure for table `m_ekstrakurikuler`
--

DROP TABLE IF EXISTS `m_ekstrakurikuler`;
CREATE TABLE `m_ekstrakurikuler` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_ekstrakurikuler`
--

INSERT INTO `m_ekstrakurikuler` (`id`, `nama`) VALUES
(1, 'PRAMUKA'),
(3, 'TIK');

-- --------------------------------------------------------

--
-- Table structure for table `m_gelombang`
--

DROP TABLE IF EXISTS `m_gelombang`;
CREATE TABLE `m_gelombang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_gelombang`
--

INSERT INTO `m_gelombang` (`id`, `nama`) VALUES
(1, 'Gelombang 1'),
(2, 'Gelombang 2');

-- --------------------------------------------------------

--
-- Table structure for table `m_gelombang_jalur`
--

DROP TABLE IF EXISTS `m_gelombang_jalur`;
CREATE TABLE `m_gelombang_jalur` (
  `id` int(11) NOT NULL,
  `tahun_id` int(6) NOT NULL,
  `sekolah_id` int(6) NOT NULL,
  `gelombang_id` int(6) NOT NULL,
  `jalur_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_gelombang_jalur`
--

INSERT INTO `m_gelombang_jalur` (`id`, `tahun_id`, `sekolah_id`, `gelombang_id`, `jalur_id`) VALUES
(5, 2019, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `m_golongan`
--

DROP TABLE IF EXISTS `m_golongan`;
CREATE TABLE `m_golongan` (
  `id` int(5) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_golongan`
--

INSERT INTO `m_golongan` (`id`, `nama`, `keterangan`) VALUES
(1, 'IV/a', 'Golongan IV/a'),
(2, 'IV/b', 'Golongan IV/b'),
(3, 'IV/c', 'Golongan IV/c'),
(4, 'IV/d', 'Golongan IV/d'),
(5, 'IV/e', 'Golongan IV/e'),
(6, 'III/a', 'Golongan III/a'),
(7, 'III/b', 'Golongan III/b'),
(8, 'III/c', 'Golongan III/c'),
(9, 'III/d', 'Golongan III/d');

-- --------------------------------------------------------

--
-- Table structure for table `m_jalur`
--

DROP TABLE IF EXISTS `m_jalur`;
CREATE TABLE `m_jalur` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jalur`
--

INSERT INTO `m_jalur` (`id`, `nama`) VALUES
(1, 'SEYAYASAN'),
(2, 'UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `m_jalur_biaya`
--

DROP TABLE IF EXISTS `m_jalur_biaya`;
CREATE TABLE `m_jalur_biaya` (
  `id` int(6) NOT NULL,
  `gelombangjalur_id` int(6) NOT NULL,
  `biaya_id` int(6) NOT NULL,
  `nominal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jalur_biaya`
--

INSERT INTO `m_jalur_biaya` (`id`, `gelombangjalur_id`, `biaya_id`, `nominal`) VALUES
(1, 6, 1, '3000000'),
(4, 6, 4, '1000000'),
(5, 6, 3, '500000'),
(6, 5, 1, '3000000'),
(7, 5, 4, '1000000'),
(8, 5, 5, '1000000'),
(9, 5, 3, '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `m_jenisptk`
--

DROP TABLE IF EXISTS `m_jenisptk`;
CREATE TABLE `m_jenisptk` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jenisptk`
--

INSERT INTO `m_jenisptk` (`id`, `nama`, `keterangan`) VALUES
(1, 'Tenaga Administrasi Sekolah', ''),
(2, 'Guru Mapel', ''),
(3, 'Guru BK', ''),
(4, 'Guru Kelas', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_jurusan`
--

DROP TABLE IF EXISTS `m_jurusan`;
CREATE TABLE `m_jurusan` (
  `id` int(6) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jurusan`
--

INSERT INTO `m_jurusan` (`id`, `nama_jurusan`) VALUES
(1, 'IPA'),
(2, 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `m_kelamin`
--

DROP TABLE IF EXISTS `m_kelamin`;
CREATE TABLE `m_kelamin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kelamin`
--

INSERT INTO `m_kelamin` (`id`, `nama`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `m_kelas`
--

DROP TABLE IF EXISTS `m_kelas`;
CREATE TABLE `m_kelas` (
  `id` int(6) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `wali_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kelas`
--

INSERT INTO `m_kelas` (`id`, `tahun`, `jurusan`, `nama_kelas`, `wali_kelas`) VALUES
(5, '2019', '1', 'XI IPA 1', '5');

-- --------------------------------------------------------

--
-- Table structure for table `m_kelas_siswa`
--

DROP TABLE IF EXISTS `m_kelas_siswa`;
CREATE TABLE `m_kelas_siswa` (
  `id` int(6) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `kelas_id` varchar(50) NOT NULL,
  `siswa_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kelas_siswa`
--

INSERT INTO `m_kelas_siswa` (`id`, `tahun`, `kelas_id`, `siswa_id`) VALUES
(1, '2019', '5', '5'),
(2, '2019', '5', '6'),
(3, '2019', '5', '7');

-- --------------------------------------------------------

--
-- Table structure for table `m_logoslip`
--

DROP TABLE IF EXISTS `m_logoslip`;
CREATE TABLE `m_logoslip` (
  `id` int(6) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_logoslip`
--

INSERT INTO `m_logoslip` (`id`, `image`) VALUES
(1, '1559218599163.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `m_options`
--

DROP TABLE IF EXISTS `m_options`;
CREATE TABLE `m_options` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_options`
--

INSERT INTO `m_options` (`id`, `name`, `value`) VALUES
(1, 'tahun_ppdb_default', '2020'),
(2, 'tahun_akademik_default', '1'),
(3, 'is_ppdb_online', '1'),
(4, 'gelombang_ppdb_default', '1'),
(5, 'tahun_default', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `m_pegawai`
--

DROP TABLE IF EXISTS `m_pegawai`;
CREATE TABLE `m_pegawai` (
  `id` int(6) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_guru` varchar(150) NOT NULL,
  `id_jenis_kelamin` int(5) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(50) NOT NULL,
  `niy_nigk` varchar(50) NOT NULL,
  `nuptk` varchar(50) NOT NULL,
  `id_status_kepegawaian` int(5) NOT NULL,
  `id_jenis_ptk` int(5) NOT NULL,
  `pengawas_bidang_studi` varchar(150) NOT NULL,
  `id_agama` int(5) NOT NULL,
  `alamat_jalan` varchar(255) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `nama_dusun` varchar(100) NOT NULL,
  `desa_kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `tugas_tambahan` varchar(100) NOT NULL,
  `id_status_keaktifan` int(5) NOT NULL,
  `sk_cpns` varchar(150) NOT NULL,
  `tanggal_cpns` date NOT NULL,
  `sk_pengangkatan` varchar(150) NOT NULL,
  `tmt_pengangkatan` date NOT NULL,
  `lembaga_pengangkatan` varchar(150) NOT NULL,
  `id_golongan` int(5) NOT NULL,
  `keahlian_laboratorium` varchar(150) NOT NULL,
  `sumber_gaji` varchar(150) NOT NULL,
  `nama_ibu_kandung` varchar(100) NOT NULL,
  `id_status_pernikahan` int(5) NOT NULL,
  `nama_suami_istri` varchar(100) NOT NULL,
  `nip_suami_istri` varchar(30) NOT NULL,
  `pekerjaan_suami_istri` varchar(100) NOT NULL,
  `tmt_pns` date NOT NULL,
  `lisensi_kepsek` varchar(20) NOT NULL,
  `jumlah_sekolah_binaan` int(5) NOT NULL,
  `diklat_kepengawasan` varchar(20) NOT NULL,
  `mampu_handle_kk` varchar(20) NOT NULL,
  `keahlian_breile` varchar(20) NOT NULL,
  `keahlian_bahasa_isyarat` varchar(20) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pegawai`
--

INSERT INTO `m_pegawai` (`id`, `nip`, `password`, `nama_guru`, `id_jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nik`, `niy_nigk`, `nuptk`, `id_status_kepegawaian`, `id_jenis_ptk`, `pengawas_bidang_studi`, `id_agama`, `alamat_jalan`, `rt`, `rw`, `nama_dusun`, `desa_kelurahan`, `kecamatan`, `kode_pos`, `telepon`, `hp`, `email`, `tugas_tambahan`, `id_status_keaktifan`, `sk_cpns`, `tanggal_cpns`, `sk_pengangkatan`, `tmt_pengangkatan`, `lembaga_pengangkatan`, `id_golongan`, `keahlian_laboratorium`, `sumber_gaji`, `nama_ibu_kandung`, `id_status_pernikahan`, `nama_suami_istri`, `nip_suami_istri`, `pekerjaan_suami_istri`, `tmt_pns`, `lisensi_kepsek`, `jumlah_sekolah_binaan`, `diklat_kepengawasan`, `mampu_handle_kk`, `keahlian_breile`, `keahlian_bahasa_isyarat`, `npwp`, `kewarganegaraan`, `image`) VALUES
(1, '195704111980032004', '195704111980032004', 'April Daniati 2ss', 2, 'Padang Panjang', '1957-04-11', '1374025104571989', '', '1743735636300012', 3, 3, '', 3, 'Jl.Perintis Kemerdekaan No.121 B', '000', '000', '', 'Balai-Balai', 'Kec. Padang Panjang Barat', 27114, '0751461692', '081267771344', 'rekysda@gmail.com', 'Kepala Laboratorium', 3, '56483/C/2/80', '1980-03-01', '56483/C/2/80', '1980-03-01', 'Pemerintah Pusat', 3, '', 'APBD Kabupaten/Kota', 'Hj. Djawana', 3, 'Zainudin, S.PD.I', '', 'Wiraswasta', '1981-05-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', '1560593858547.jpg'),
(2, '13', '13', 'Aisyah', 2, 'Bukittinggi', '1958-06-16', '1374025104571989', '', '3948736639300012', 3, 2, '', 1, 'Birugo Puhun 80.266', '0', '0', '', 'Tarok Dipo', 'Kec. Aur Birugo Tigo Baleh', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '822/1412/III-BKD-2005', '2005-12-23', '822/1412/III-BKD-2005', '1983-03-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Djuniar', 1, 'Mufti SH, S.Pd', '', '3/TNI/Polri', '2006-03-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928198202000', 'INDONESIA', 'default.jpg'),
(3, '12', '12', 'Aina Yonavia', 2, 'Bukittinggi', '1989-02-28', '1374025104571989', '', '', 2, 2, '', 1, 'Jl.bonjo Baru By Pass', '3', '5', '', 'Tarok DIpo', 'Kec. Guguk Panjang', 26122, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '', '2015-07-13', 'Kepala Sekolah', 1, '', 'Sekolah', 'Nuraida', 2, '', '', 'Tidak bekerja', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(4, '21', '21', 'Amri Jaya', 1, 'Jakarta', '1962-09-05', '1374025104571989', '', '1237740641300043', 3, 2, '', 1, 'Jorong Biaro', '0', '0', '', 'Biaro Gadang', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'rekysda@gmail.com', 'Kepala Sekolah', 1, '1402/IV.E/KWPK-1987', '1987-03-01', '821.20/05/III-BKD-2013', '2013-03-05', 'Pemerintah Kab/Kota', 1, '', 'APBN', 'Nurhayati', 1, 'Erni', '', '3/TNI/Polri', '1988-07-01', 'YA', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(5, '11', '11', 'Agus Musanib', 1, 'Bali', '1950-02-02', '1374025104571989', '', '', 1, 1, '', 1, 'Prof.M.Yamin, SH', '4', '4', '', 'Tarok Dipo', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '800.sma.3.bkt', '2004-05-05', 'Kepala Sekolah', 1, '', 'Sekolah', 'Hy', 2, '', '', 'Tidak bekerja', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', '1566997318012.jpg'),
(6, '22', '22', 'Asbaidar', 2, 'Pakan Kamis', '1959-01-24', '1374025104571989', '', '6456737638300012', 3, 2, '', 1, 'Bukareh', '0', '0', '', 'Bukareh', 'Kec. Tilatang Kamang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '873/IV.E/Kwpk-1986', '1986-03-01', '873/IV.E/Kwpk-1986', '1986-03-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Nuraini', 1, 'Mawardi', '195906071987031005', '3/TNI/Polri', '1988-02-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928271202000', 'INDONESIA', 'default.jpg'),
(7, '23', '23', 'Azwaldi', 1, 'Agam', '1967-03-01', '1374025104571989', '', '5633745648200022', 3, 2, '', 1, 'Jorong Aia Kaciak', '0', '0', '', 'Nagari Kubang Putiah', 'Kec. Banuhampu', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '2746/IV/KWPK-1993', '1992-03-01', '2746/IV/KWPK-1993', '1993-07-29', 'Pemerintah Pusat', 1, '', 'APBN', 'Zurada', 1, 'Ermawati', '197003271994122001', '3/TNI/Polri', '1994-01-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '698210374202000', 'INDONESIA', 'default.jpg'),
(8, '196812211997022002', '11376043945', 'Darmawati', 2, 'Bukittinggi', '1968-12-21', '1374025104571989', '', '8553746649300023', 3, 2, '', 1, 'Jl.Syekh Arrasuli No.66E', '4', '1', '', 'Aur Tajungkang Tengah Saw', 'Kec. Guguk Panjang', 26111, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '16872/A2/Kp/1997', '1997-02-01', '16872/A2/Kp/1997', '1997-02-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Asmiar', 1, 'Herman Arif', '', 'Wiraswasta', '1998-05-06', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '150070308202000', 'INDONESIA', 'default.jpg'),
(9, '196312041987031000', '6420046780', 'Dasmir', 1, 'Magek,Agam', '1963-03-04', '1374025104571989', '', '0536741643200023', 3, 2, '', 1, 'Jln. Sawah Dangka No. 58 A III Kampung Gadut', '0', '0', '', 'Koto Tangah', 'Kec. Tilatang Kamang', 26152, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '501/IV.E/Kwpk-1987', '1987-03-01', '501/W.E/Kwpk-1987', '1987-03-01', 'Pemerintah Pusat', 1, '', 'APBN', 'Syamsiar', 1, 'Almiati', '196809081989032004', '3/TNI/Polri', '1988-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '146058979202000', 'INDONESIA', 'default.jpg'),
(10, '198406142009012003', '12241237914', 'Dellya', 2, 'Bukittinggi', '1984-06-14', '1374025104571989', '', '3946762664210112', 3, 3, '', 1, 'Parak Kongsi Jorong Parik Putuih', '0', '0', '', 'Ampang Gadang', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/022-5D/BKD-2009', '2009-01-01', '813/022-5D/BKD-2009', '2009-01-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Yarmini', 1, 'Syawaldi', '', 'Karyawan Swasta', '2010-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(11, '198012112005012005', '9773210321', 'Desi Eriani', 2, 'Payakumbuh', '1980-12-11', '1374025104571989', '', '7543758660300113', 3, 2, '', 1, 'Balai Nan Duo No.57', '3', '1', '', 'Balai Nan Duo', 'Kec. Payakumbuh Barat', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/034/5D-BKD/2005', '2005-01-01', '813/034/5D-BKD/2005', '2005-01-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Warnidawati', 1, 'ROBBY EFENDI', '198107132005011002', '3/TNI/Polri', '2006-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928404202000', 'INDONESIA', 'default.jpg'),
(12, '196305141990032003', '6507770244', 'Desmainil', 2, 'Barulak', '1963-05-14', '1374025104571989', '', '', 3, 1, '', 1, 'Komplek Taman Asri Blok E.1 ', '0', '0', 'Parik Putuih', 'Ampang Gadang', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '167/IV-A/KWPK-1990', '1990-03-01', '167/IV-A/KWPK-1990', '1990-03-01', 'Pemerintah Propinsi', 1, '', 'APBD Kabupaten/Kota', 'Nufiar', 1, 'Zulferis, SE', '', 'Lainnya', '1990-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(13, '198312252009022007', '10853788285', 'Destri Eka Putri', 2, 'Kambing VII', '1983-12-25', '1374025104571989', '', '6557761663300133', 3, 2, '', 1, 'Jl Prof M Yamin SH Gang Langsat No 78', '2', '2', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 26132, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813.3/56/KKD-SWL/2009', '2009-02-01', '824.3/2169/BKD-2014', '2014-08-01', 'Pemerintah Propinsi', 1, '', 'APBD Kabupaten/Kota', 'Yusna', 1, 'Ferdi Rahadian', '198003062005011005', '3/TNI/Polri', '2010-11-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '780971883203000', 'INDONESIA', 'default.jpg'),
(14, '195806161984000002', '9207359605', 'Dian Lestari', 1, 'Bukittinggi', '1989-08-03', '1374025104571989', '', '', 2, 2, '', 1, 'Jalan Ahmad Karim Nomor 96', '2', '4', '', 'Benteng Pasar Atas', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '800.001.SMA.3.BKT.2013', '2013-01-07', 'Kepala Sekolah', 1, '', 'Sekolah', 'Zelniar Zen', 2, '', '', 'Tidak bekerja', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(15, '195912121986021004', '7840865552', 'Edwardi', 1, 'Sungai Landir', '1959-12-12', '1374025104571989', '', '4544737639200063', 3, 2, '', 1, 'Jl.Pakoan Indah II No.83 Jorong Aro Kandikir', '0', '0', '', 'Gaduik', 'Kec. Guguk Panjang', 26122, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '822/979/III-bkd-2005', '2006-02-01', '822/979/III-bkd-2005', '2006-02-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Sareda', 1, 'ny edwardi', '', 'Tidak bekerja', '2006-02-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(16, '197411132000032007', '5947681324', 'Efayanti', 2, 'Balingka', '1974-11-13', '1374025104571989', '', '4445752654300023', 3, 2, '', 1, 'Jl.Pakoan Indah III Gang Arwana No.1 Jorong Aro Kandikir', '0', '0', '', 'Gaduik', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '8527/A2/kp/2000', '2000-03-01', '001/2/II-Bkd/2001', '2002-02-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Ratna', 1, 'Defia', '', 'Wiraswasta', '2002-02-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470810202000', 'INDONESIA', 'default.jpg'),
(17, '197110292005011003', '7215810171', 'Efrizal M', 1, 'Bukittinggi', '1971-10-29', '1374025104571989', '', '1361749652200013', 3, 2, '', 1, 'Jl;.Raya Tigo Baleh No.8', '1', '6', '', 'Pakan Labuah', 'Kec. Aur Birugo Tigo Baleh', 26134, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, 'bkd.049/813.3/Kep/Wako-2005', '2005-01-01', '188.45/159/821.13/kpts/bsl/bkd-2006', '2006-03-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Sariaji', 1, 'Hafnesi', '', 'Karyawan Swasta', '2006-03-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(18, '195806161984000003', '5966871440', 'Ega Nerifalinda', 2, 'Pekan Kamis', '1983-03-20', '1374025104571989', '', '', 2, 2, '', 1, 'Jorong Padang Canting', '0', '0', '', 'Kapau', 'Kec. Tilatang Kamang', 26152, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '800.642.SMA.3.BKT-2015', '2015-07-06', 'Kepala Sekolah', 1, '', 'Sekolah', 'Rifdayati', 1, 'Abdul Halim', '', 'Karyawan Swasta', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(19, '196709021991032006', '9186926890', 'Eli Noverma', 2, 'Ampalu Gurun, Batusa', '1967-09-02', '1374025104571989', '', '6234745648300033', 3, 2, '', 1, 'Jl.Haji Miskin No. 91A Palolok', '0', '0', '', 'Campago Ipuh', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', 'Kepala Laboratorium', 1, '822/005/disdikpora.bkt/skt-200', '2009-03-01', '822/005/disdikpora.bkt/skt-200', '2009-03-01', 'Pemerintah Pusat', 1, '', 'Lainnya', 'Ratna', 1, '', '', 'Tidak bekerja', '2009-03-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(20, '197004031997022001', '9130316866', 'Elianis', 2, 'Pasanehan', '1970-04-03', '1374025104571989', '', '0735748650300032', 3, 2, '', 1, 'Bonjo Alam', '0', '0', '', 'Ampang Gadang', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '16858/A2.KP.1997', '1997-02-01', '2335/IV/Kwpk-1998', '1998-06-01', 'Pemerintah Pusat', 1, '', 'APBN', 'Djarnian', 1, 'Salmetri', '196804271992031004', '3/TNI/Polri', '1998-06-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(21, '196709271989031003', '5821668218', 'Elno', 1, 'Agam', '1967-09-27', '1374025104571989', '', '5259745646200003', 3, 2, '', 1, 'Perumahan Pasia Permai No.7', '0', '0', 'Cibuak Ameh', 'Pasia', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'rekysda@gmail.com', 'Wakil Kepala Sekolah Kesiswaan', 1, '1474/IV.E/KWP-1989', '1989-03-01', '1474/ME/KWP-29', '1989-06-29', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'NURHEMA', 1, 'Maulida Patriana', '196805251995032002', '3/TNI/Polri', '1991-01-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928412202000', 'INDONESIA', 'default.jpg'),
(22, '196109191988031006', '9351958521', 'Elza Refni', 1, 'Padang Lawas', '1961-09-19', '1374025104571989', '', '8251739641200023', 3, 3, '', 1, 'Komplek Veteran Guguk Randah Jl.Ak Gani', '5', '2', '', 'Campago Guguak Bulek', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'rekysda@gmail.com', 'Wakil Kepala Sekolah Humas', 1, '760/IV.E/Kwpk-1988', '1988-03-01', '760/IV.E/Kwpk-1988', '1988-03-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Hj. Nurmelis', 1, 'Retni Akmalia', '196412231987032004', '3/TNI/Polri', '1989-09-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928172202000', 'INDONESIA', 'default.jpg'),
(23, '195806161984000004', '10391084688', 'Erdison', 1, 'Sungai Liku', '1981-01-03', '1374025104571989', '', '', 1, 1, '', 1, 'Birugo Bungo', '2', '1', '', 'Birugo', 'Kec. Aur Birugo Tigo Baleh', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '800.sma.3.bkt-2010', '2010-07-01', 'Kepala Sekolah', 1, '', 'Sekolah', 'Siti', 1, 'Yulisna', '', 'Tidak bekerja', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(24, '196202191990032001', '11630412432', 'Erlis', 2, 'Tampunik, Agam', '1962-02-19', '1374025104571989', '', '8551740641300032', 3, 2, '', 1, 'Tampunik', '0', '0', '', 'Tampunik', 'Kec. Tilatang Kamang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '525/IV.E/Kwpk-1990', '1990-03-01', '525/IV.E/Kwpk-1990', '1990-03-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Rosmaniar', 1, 'Jaya Putra', '-                 ', 'Wiraswasta', '1991-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928438202000', 'INDONESIA', 'default.jpg'),
(25, '196308051983012001', '8075104832', 'Ernawilis', 2, 'Palembayan', '1963-09-05', '1374025104571989', '', '7137741642300043', 3, 1, '', 1, 'Perumnas Blok H7 ', '0', '0', 'Jorong Kudang Duo', 'Bukik Batabuah', 'Kec. Candung', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '1357/c/3/1982', '1983-03-01', '2485/4/Kwpk-1984', '1984-08-01', 'Pemerintah Propinsi', 1, '', 'APBD Provinsi', 'Siti Budiman', 1, 'Suarni, SH', '196212311983031128', '3/TNI/Polri', '1984-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476474077202000', 'INDONESIA', 'default.jpg'),
(26, '197305312014061001', '6484287069', 'Erwin', 1, 'Bandung', '1973-05-31', '1374025104571989', '', '5863751653200002', 5, 1, '', 1, 'Jl.Merapi 2986', '1', '4', '', 'Puhun Tembok', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/043-5D/BKD-2014', '2014-06-01', '82.800.SMA.3-Bkt-2004', '2004-03-01', 'Kepala Sekolah', 1, '', 'APBN', 'Erwani Noer', 1, 'Febriyanti Novita Mara', '', 'Tidak bekerja', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(27, '195712091982022001', '9196121053', 'Faridawaty', 2, 'Tanjung Karang', '1957-12-09', '1374025104571989', '', '2541735636300013', 3, 2, '', 1, 'Perumahan Kubang Duo B.12 Koto Panjang', '0', '0', '', 'Bukik Batabuah', 'Kec. Candung', 0, '0751461692', '081267771344', 'rekysda@gmail.com', 'Kepala Perpustakaan', 1, '40250/C/2/82', '1982-02-01', '3730/III/KWPK-82', '1982-11-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Bawai Yahya', 1, 'Adwar. Bac', '', 'Karyawan Swasta', '1983-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928370202000', 'INDONESIA', 'default.jpg'),
(28, '195806161984000005', '7624040793', 'Fauzana Fitri zalona', 1, 'Bukittinggi', '1988-05-27', '1374025104571989', '', '', 2, 3, '', 1, 'Jl.Soekarno Hatta No.17', '4', '0', '', 'Bukit Surungan', 'Kec. Padang Panjang Barat', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '', '2015-07-13', 'Kepala Sekolah', 1, '', 'Sekolah', 'Floria Napolis', 1, 'Ahmad SYukri', '', 'Karyawan Swasta', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(29, '196307251987112001', '11531841010', 'Firdawati', 2, 'Bukittinggi', '1963-07-25', '1374025104571989', '', '7057741642300003', 3, 2, '', 1, 'Jl.Hamka No.15', '3', '6', '', 'tarok dipo', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '1000/IV.E/Kwpk-1987', '1987-11-01', '1989', '1989-05-01', 'Pemerintah Pusat', 1, '', 'APBN', 'Rosmanidar', 1, 'Syuhrawardi', '', 'Pensiunan', '1989-05-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '152702387202000', 'INDONESIA', 'default.jpg'),
(30, '197908232006042004', '9248811582', 'Fitria Lisa', 2, 'Sungai Tanang', '1979-08-23', '1374025104571989', '', '4155757659302005', 3, 2, '', 1, 'Pandan Gadang', '0', '0', '', 'Sungai Tanang', 'Kec. Banuhampu', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/007-5D/BKD-2006', '2006-04-01', '813/007-5D/BKD-2006', '2007-08-01', 'Pemerintah Kab/Kota', 1, '', 'APBN', 'Yarmiati', 1, 'Asrial', '', 'Wiraswasta', '2007-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476473566202000', 'INDONESIA', 'default.jpg'),
(31, '196005151984032003', '6013967263', 'Floria Napolis', 2, 'Tanjung Pandan', '1960-05-15', '1374025104571989', '', '5847738639300052', 3, 2, '', 1, 'Jl.Soekarno Hatta No.17', '0', '0', '', 'Bukit Surungan', 'Kec. Padang Panjang Barat', 21175, '0751461692', '081267771344', 'rekysda@gmail.com', 'Kepala Laboratorium', 1, '78167/C/K.IV.I/84', '1984-03-01', '812/IV/KWPK-86', '1986-02-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Marni', 2, '', '', 'Tidak bekerja', '1986-02-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928339202000', 'INDONESIA', 'default.jpg'),
(32, '197305292003122001', '9957969597', 'Frimayasti', 2, 'Bukittinggi', '1973-05-29', '1374025104571989', '', '3861751653300012', 3, 2, '', 1, 'Jl.Bahder Johan No.43', '2', '5', '', 'Puhun Tembok', 'Kec. Mandiangin Koto Selayan', 26124, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '800.05/25/WK-PYK/2004', '2003-12-01', '800', '2003-12-01', 'Pemerintah Pusat', 1, '', 'APBN', 'Wanimar', 1, 'A.Chandra', '', 'Wiraswasta', '2005-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '671678688204000', 'INDONESIA', 'default.jpg'),
(33, '196310031988032002', '6209675109', 'Hanifah', 2, 'Bukittinggi', '1963-10-03', '1374025104571989', '', '4335741644300013', 3, 2, '', 1, 'Sanjai Dalam No.32', '0', '0', '', 'Manggis Ganting', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '53766/A.2.IV/c/1998', '1998-03-01', '53766/A.2.IV/c/1998', '1998-03-01', 'Pemerintah Pusat', 1, '', 'APBN', 'Upik', 1, 'Ari Candra', '196401311988031003', '3/TNI/Polri', '1989-07-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(34, '198105182009011003', '8809034779', 'Herman Novia Rozi', 1, 'Kab.Lima Puluh Kota', '1981-05-18', '1374025104571989', '', '8850759660200002', 3, 2, '', 1, 'Jl. Nurul Huda No. 32 S', '2', '5', '', 'Tarok Dipo', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', 'Kepala Laboratorium', 1, '813/081-5D/BKD-2009', '2009-01-01', '813/081-5D/BKD-2009', '2009-01-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Yurnelis', 1, 'Syafria', '197905272006042003', '3/TNI/Polri', '2010-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '149385536202000', 'INDONESIA', 'default.jpg'),
(35, '198512152009012003', '6512445304', 'Indrawati', 2, 'Pasaman', '1985-12-15', '1374025104571989', '', '9547763664210073', 3, 2, '', 1, 'Bukit Ambacang', '6', '1', '', 'Kubu Gulai Bancah', 'Kec. Mandiangin Koto Selayan', 26122, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813.3/128/BKPL-2009', '2009-01-01', '813.3/113/BKPL-2010', '2010-10-01', 'Pemerintah Kab/Kota', 1, '', 'APBN', 'Helma', 1, 'Faishal Yasin', '', 'Lainnya', '2010-10-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '153409362202000', 'INDONESIA', 'default.jpg'),
(36, '196712271991012002', '7135122386', 'Irma Hadi Surya', 2, 'Bukittinggi', '1967-12-27', '1374025104571989', '', '7559745647300033', 3, 2, '', 1, 'Jl. Bantolaweh 4c', '2', '1', '', 'Kayu Kubu', 'Kec. Guguk Panjang', 26115, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '5182/A2IV/IC/1991', '1991-01-01', '5182/A2IV/IC/1991', '1991-01-01', 'Pemerintah Pusat', 1, '', 'APBN', 'Syamsidar', 1, 'Darwin', '', 'Wiraswasta', '1992-07-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '776386260202000', 'INDONESIA', 'default.jpg'),
(37, '198401272005012003', '10503708401', 'Irma Yunita', 2, 'Kab. Agam', '1984-01-27', '1374025104571989', '', '', 3, 1, '', 1, 'Jl.Jendral Sudirman', '2', '2', '', 'Birugo', 'Kec. Aur Birugo Tigo Baleh', 26138, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813-117/5D-BKD/2005', '2005-01-01', '821/106-3D/BKD-2006', '2006-04-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Suryati', 1, 'Muhammad Fauzi Zen', '198408252005011003', '3/TNI/Polri', '2006-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '165216417202000', 'INDONESIA', 'default.jpg'),
(38, '195806161984000006', '12209471584', 'Jusnawita', 2, 'Bukittinggi', '1976-09-22', '1374025104571989', '', '2754754658300002', 4, 2, '', 1, 'Jl.Raya Tigo Baleh No.B', '0', '0', '', 'Pakan Labuah', 'Kec. Aur Birugo Tigo Baleh', 26134, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '', '2015-07-13', 'Ketua Yayasan', 1, '', 'Yayasan', 'Suarni', 1, 'Hendri Satria', '', 'Wiraswasta', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(39, '196207071989032002', '10632529451', 'Khairiati', 2, 'Curup', '1962-07-07', '1374025104571989', '', '8039740641300033', 3, 2, '', 1, 'Jl.Merak No. 185 Perumnas Kubang Putih', '0', '0', 'Kampuang Nan V', 'Kubang Putih', 'Kec. Banuhampu', 26181, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '881/IV.E/Kwpk-1989', '1989-03-01', '881/IV.E/Kwpk-1989', '1989-03-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Kamiar', 1, 'Anwar', '196501041987081001', '3/TNI/Polri', '1990-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928297202000', 'INDONESIA', 'default.jpg'),
(40, '197705032009012002', '10899664884', 'Khairina Hafni', 2, 'Bukittinggi', '1977-05-03', '1374025104571989', '', '8835755657300022', 3, 2, '', 1, 'Jorong Sungai Tanang Ketek', '0', '0', '', 'Sungai Tanang', 'Kec. Banuhampu', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/100-5D/BKD-2009', '2009-01-01', '821/060-3D/BKD-2010', '2010-04-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Suhasma', 1, 'Aruza', '', 'Karyawan Swasta', '2010-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '149385528202000', 'INDONESIA', 'default.jpg'),
(41, '195904211984031004', '10331600624', 'Krisnal Razali', 1, 'Lubuk Basung', '1959-04-21', '1374025104571989', '', '5753737638200022', 3, 2, '', 1, 'Komplek PU 2977 Merapi', '0', '0', '', 'Puhun Tembok', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '822/876/DISDIKBKT/TU-08', '2008-01-16', '822/876/DISDIKBKT/TU-08', '2008-01-16', 'Pemerintah Pusat', 1, '', 'Lainnya', 'Jawaher', 1, 'NIBRAS', '196209071984032001', '3/TNI/Polri', '2008-03-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '473928371202000', 'INDONESIA', 'default.jpg'),
(42, '198011132009012004', '6689873028', 'Kurnia Mira Lestari', 2, 'Payakumbuh', '1980-11-13', '1374025104571989', '', '4445758660300033', 3, 2, '', 1, 'Jl.Ipuh Mandiangin', '6', '2', '', 'Campago Ipuh', 'Kec. Mandiangin Koto Selayan', 26121, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813.3/142/BKPL-2009', '2009-01-01', '813.3/304/BKPL-2010', '2010-10-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Nursyamsianis', 1, 'Husnul Qadry', '', 'Sudah Meninggal', '2010-10-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(43, '197001122007012005', '10089131297', 'Lasmiyenti', 2, 'Bukittinggi', '1970-01-12', '1374025104571989', '', '5444748650300002', 3, 2, '', 1, 'Ladang Cangkiah', '2', '2', '', 'Ladang Cangkiah', 'Kec. Aur Birugo Tigo Baleh', 26135, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/255-5D/BKD-2007', '2007-01-01', '821/171-3D/BKD.2008', '2007-01-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Nurbaiti', 1, 'Firdaus', '', 'Wiraswasta', '2008-11-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '149838688200200', 'INDONESIA', 'default.jpg'),
(44, '196411041994122001', '11472334134', 'Leli Novianti', 2, 'Bukittinggi', '1964-11-04', '1374025104571989', '', '3436742644300033', 3, 2, '', 1, 'Jl.Jambu No.22', '2', '3', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '85052Acc1994', '1994-12-01', '83052/al/1994', '1994-11-12', 'Ketua Yayasan', 1, '', 'APBN', 'Nurjanah Amin', 1, 'Zaifuli Anri Kasiah', '196309171994031003', '3/TNI/Polri', '1996-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(45, '197505102006042004', '8190573513', 'Leni Marlina', 2, 'Lundang', '1975-05-10', '1374025104571989', '', '3842753655300052', 3, 2, '', 1, 'Lundang', '0', '0', '', 'Lundang', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '188.45/276/821.13/KTPS/WSL/BKD-2006', '2006-04-01', '188.45/031/821.13/KPTS/WSL/BKD-2007', '2007-08-01', 'Pemerintah Kab/Kota', 1, '', 'APBN', 'Yurnida', 1, 'Rudi Arpono', '', 'Wiraswasta', '2007-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '480991330201000', 'INDONESIA', 'default.jpg'),
(46, '195806161984000007', '7535865371', 'Lidya Puspita Sari', 2, 'Bukittinggi', '1984-08-05', '1374025104571989', '', '', 1, 1, '', 1, 'Jl.Kehamikam', '4', '2', '', 'Belakang Balok', 'Kec. Aur Birugo Tigo Baleh', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '800.290.SMA.3.Bkt-2010', '2010-07-01', 'Komite Sekolah', 1, '', 'Sekolah', 'Nurlela', 1, 'Abdurrohman Hasyim', '', 'Karyawan Swasta', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(47, '196608201993032006', '7473038696', 'Lili Suyani', 2, 'Agam', '1966-08-20', '1374025104571989', '', '8152744647300033', 3, 4, '', 1, 'simpang empat padang lua', '0', '0', 'padang lua', 'banuhampu', 'Kec. Banuhampu', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '271/IV.E/KWPK-1993', '1993-03-01', '3234/IV/KWPK-1994', '1994-06-01', 'Pemerintah Propinsi', 1, '', 'APBN', 'Erma', 1, 'Yonnofa Hendri', '', 'Petani', '1994-06-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(48, '196002071984031003', '9123029747', 'M.Nasir', 1, 'Bukittinggi', '1960-02-07', '1374025104571989', '', '5539738639200022', 3, 2, '', 1, 'Jl.H.Abdul Manan', '0', '0', '', 'Campago Ipuh', 'Kec. Mandiangin Koto Selayan', 26121, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '41607/c/KIV.I/84', '1984-03-01', '4267/III/KWPK-88', '1988-03-01', 'Pemerintah Propinsi', 1, '', 'APBN', 'Jani', 1, 'Azuhelmi', '', 'Tidak bekerja', '1986-02-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(49, '196412271989032005', '10926897207', 'Maria Magdalena', 2, 'Payakumbuh', '1964-12-27', '1374025104571989', '', '5559742644300043', 3, 2, '', 1, 'Koto Tuo Nagari Panyalaian', '0', '0', '', 'Koto Tuo', 'Kec. Sepuluh Koto', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '431/IV.E/KWPK-1989', '1989-03-01', '431/IV.E/KWPK-1989', '1989-03-01', 'Pemerintah Pusat', 1, '', 'APBN', 'Nazria', 1, 'Dedy Fernando', '', 'Wiraswasta', '1989-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(50, '195903161984031001', '8361693528', 'Masrafli', 1, 'Padang', '1959-03-16', '1374025104571989', '', '1648737639200022', 3, 2, '', 1, 'Jl.Titih Padang Tarok', '0', '0', '', '-', 'Kec. Baso', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '30/01/1986', '1984-03-01', '42254/C/K.IV.1/84', '1984-03-01', 'Pemerintah Pusat', 1, '', 'Lainnya', 'SAIDAH', 1, 'ILHAM AZIZ', '', 'Tidak bekerja', '1986-02-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928164202000', 'INDONESIA', 'default.jpg'),
(51, '195904031982021006', '10027776225', 'Masril Hakim', 1, 'Bukittinggi', '1959-04-03', '1374025104571989', '', '7735737638200022', 3, 2, '', 1, 'Sawah Sianik', '1', '1', '', 'Nan Balimo', 'Kec. Tanjung Harapan', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '39863/C/2/82', '1982-02-01', '1052/III/KWPK/1994', '1994-04-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Upik Aji', 1, 'Deswita', '195412181982112001', '3/TNI/Polri', '1984-01-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470687202000', 'INDONESIA', 'default.jpg'),
(52, '195806161984000008', '6150097274', 'Megawati', 2, 'Bukittinggi', '1985-02-28', '1374025104571989', '', '', 2, 2, '', 1, 'Jl. Prof. M. Yamin, SH', '1', '1', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 26131, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '800.642.SMA.3 Bkt-2015', '2015-07-06', 'Kepala Sekolah', 1, '', 'Sekolah', 'Epi Anis', 1, 'Mondri Efendi', '198401162011011002', '3/TNI/Polri', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(53, '195608041980032002', '8301725723', 'Meiri Hasnetty', 2, 'Bukittinggi', '1956-08-04', '1374025104571989', '', '2136734635300013', 3, 2, '', 1, 'Jl. H. Abdul Manan', '3', '1', '', 'Campago Guguak Bulek', 'Kec. Mandiangin Koto Selayan', 26128, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '23800/C/2/1980', '1980-03-01', '238000/C/2/1980', '1980-03-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Rukayah', 1, 'Drs. Herman Ladri', '195911051979121001', '3/TNI/Polri', '1981-09-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928487202000', 'INDONESIA', 'default.jpg'),
(54, '198710052010012011', '10789201352', 'Meliya Defrina', 2, 'Agam', '1987-10-05', '1374025104571989', '', '', 3, 1, '', 1, 'Jl.Perintis Kemerdekaan No.146', '1', '2', '', 'jati', 'Kec. Padang Timur', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/119-5D/BKD-2010', '2010-01-01', '821/159-3D/BKD-2011', '2011-05-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Ratna Ernita', 1, 'Muhamad Farid', '', 'Karyawan Swasta', '2011-05-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(55, '196403171988032004', '10137126327', 'Metraneliza', 2, 'Patapaian', '1964-03-17', '1374025104571989', '', '3649742643300042', 3, 2, '', 1, 'Komplek SMA Negeri 1 Bukittinggi', '0', '0', '', 'Pakan Kurai', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '975/IV.E/Kwpk-1988', '1988-03-01', '822/878/disdik.bkt/tu-2008', '2008-10-01', 'Pemerintah Pusat', 1, '', 'Lainnya', 'Dahnuir', 1, 'YUSRIZAL', '196205111985121001', '3/TNI/Polri', '1988-03-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470877202000', 'INDONESIA', 'default.jpg'),
(56, '197412162008012001', '6048892135', 'Mira Fujiati', 2, 'Guguk Tinggi', '1974-12-16', '1374025104571989', '', '7548752654300033', 3, 2, '', 1, 'Jl.Anggur No.2', '4', '3', '', 'Puhun Pintu Kabun', 'Kec. Mandiangin Koto Selayan', 26123, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/253/BKD-2008', '2008-01-01', '22 Tahun 2010', '2010-02-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Zulnani Z', 1, 'Tonrino Hendri', '', 'Wiraswasta', '2010-02-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(57, '196307311989032003', '7467649723', 'Misteti', 2, 'Bukittinggi', '1963-07-31', '1374025104571989', '', '7063741642300023', 3, 2, '', 1, 'Koto Katiak No. 20 Tigo Baleh', '1', '2', 'Koto Katiak No. 20 Tigo Baleh', 'Parit Antang', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', 'Wakil Kepala Sekolah Sarpras', 1, '801/IV.E/KWPK-89', '1989-03-01', '2987/IV/Kwpk-1990', '1989-08-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Hj.Lisdar', 1, 'Yuswar', '-                 ', 'Pensiunan', '1990-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470711202000', 'INDONESIA', 'default.jpg'),
(58, '197508102002122002', '6922436770', 'Murnita', 2, 'Padang Kudo', '1975-08-10', '1374025104571989', '', '7142753655300053', 3, 2, '', 1, 'Padang Kudo Kanagarian Batagak, Agam', '0', '0', '', 'Batagak', 'Kec. Sungai Pua', 0, '0751461692', '081267771344', 'rekysda@gmail.com', 'Wakil Kepala Sekolah', 1, '870/045/5d/2002', '2002-12-30', '870/045/5d/2002', '2002-12-30', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Ramunas', 1, 'zul azmi', '', 'Petani', '2004-01-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470828202000', 'INDONESIA', 'default.jpg'),
(59, '196301121987032005', '6574667062', 'Musniar', 2, 'Bukittinggi', '1963-01-12', '1374025104571989', '', '2444741642300032', 3, 2, '', 1, 'pakan kurai', '2', '4', '', 'tarok dipo', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '1108/8.E/KWPK-1987', '1987-03-01', '1108/8.E/KWPK-1987', '1987-03-01', 'Pemerintah Pusat', 1, '', 'APBN', 'ibu', 1, 'Idramayulis', '196104131987031005', '3/TNI/Polri', '1988-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476472980202000', 'INDONESIA', 'default.jpg'),
(60, '195802141982021001', '6471457382', 'Naan', 1, 'Tanah Datar', '1958-02-14', '1374025104571989', '', '6546736638200022', 3, 2, '', 1, 'Jl.Puding Mas No. 20, Bukittinggi', '2', '3', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 26131, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '39868/C/2/82', '1982-02-01', '686/III/Kwpk-93', '1993-04-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Halima', 1, 'Aminah', '', 'Lainnya', '1983-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(61, '195702161981032002', '6998718105', 'Nadra Juami', 2, 'Solok', '1957-02-16', '1374025104571989', '', '1548735637300012', 3, 2, '', 1, 'Mahkota Mas E.7 Garegeh, Bukittinggi', '3', '1', '', 'Garegeh', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '4739/C/K.IV.1/1984', '1984-01-25', '85476/A2.IV.1/C/1986', '1986-11-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Rostiam', 1, 'Joni Anwar, S.Pd.', '196507171993031010', '3/TNI/Polri', '1986-11-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928206202000', 'INDONESIA', 'default.jpg'),
(62, '195709071984122001', '9944650762', 'Nilusmi', 2, 'Agam', '1957-09-07', '1374025104571989', '', '9239735637300013', 3, 2, '', 1, 'Perumahan Bukittinggi Indah No.3B', '0', '0', '', 'Pakan Labuah', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '823.4/1233/bd-2007', '2008-12-01', '823.4/1233/bd-2007', '2008-12-01', 'Pemerintah Pusat', 1, '', 'Lainnya', 'Janiah', 1, '', '', 'Tidak bekerja', '2008-12-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(63, '198411032008032001', '9823396230', 'Nofitatri Purnama', 2, 'Jakarta', '1984-11-03', '1374025104571989', '', '2435762663300063', 3, 4, '', 1, 'Kp Tangah', '0', '0', 'Jorong Tigo Kampuang', 'Salo', 'Kec. Baso', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813.3/49/KKD-SWL/2008', '2008-03-01', '821.3/49/KKD-SWL/2010', '2010-03-01', 'Pemerintah Kab/Kota', 1, '', 'APBN', 'Ibu', 1, 'Ryantoni', '', 'Wiraswasta', '2010-03-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '149350621203000', 'INDONESIA', 'default.jpg'),
(64, '195806161984000009', '7013893422', 'Nova Camelia', 2, 'Bukittinggi', '1991-11-15', '1374025104571989', '', '', 2, 3, '', 1, 'Panji Jorong Tigo SUrau', '0', '0', '', 'Koto Baru III Jorong', 'Kec. Baso', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '', '2015-07-13', 'Kepala Sekolah', 1, '', 'Sekolah', 'Jasnidar', 2, '', '', 'Tidak bekerja', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(65, '196107121984122002', '6599278626', 'Nurlaili', 2, 'Agam', '1961-07-12', '1374025104571989', '', '0044739641300053', 3, 2, '', 1, 'Perum Wisma Ganting Permai No.55F', '3', '0', '', 'Pulai Anak Air', 'Kec. Guguk Panjang', 26125, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '2783/IV.E/KWPK-1985', '1984-12-01', '2783/IV.E/KWPK-1985', '1984-12-01', 'Pemerintah Pusat', 1, '', 'Lainnya', 'Nurma', 1, 'Sukardi', '196105201987021003', '3/TNI/Polri', '1986-05-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470752202000', 'INDONESIA', 'default.jpg'),
(66, '198605012009011001', '6320145245', 'Oki Surya Ananda', 1, 'Kab.Agam', '1986-05-01', '1374025104571989', '', '7833764665110052', 3, 2, '', 1, 'Kampung Pisang Bansa', '0', '0', '', 'Kamang Mudiak', 'Kec. Kamang Magek', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/146-5D/BKD-2009', '2009-01-01', '813/146-5D/BKD-2009', '2009-01-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Nawibar', 1, 'Fuji Rasyid', '198602212011012001', '3/TNI/Polri', '2010-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '149385510202000', 'INDONESIA', 'default.jpg'),
(67, '197910182002122002', '6168322730', 'Oktamira', 2, 'Bukittinggi', '1979-10-18', '1374025104571989', '', '3350757659300023', 3, 2, '', 1, 'Jakmesis', '0', '0', 'jr. Koto Marapak', 'Lambah', 'Kec. Ampek Angkek', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '870/013/5D/2002', '2002-12-01', '870/013/5D/2002', '2002-12-01', 'Pemerintah Kab/Kota', 1, '', 'APBN', 'Nurbeti', 1, 'Aswandi. A', '', 'Lainnya', '2004-12-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(68, '195806161984000010', '6246610293', 'Putra Alfajri Wanto', 1, 'Bukittinggi', '1990-04-17', '1374025104571989', '', '', 2, 2, '', 1, 'Kayu Rantingan', '0', '0', '', 'Bukik Batabuah', 'Kec. Candung', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '800.459.SMA.3.BKT-2013', '2013-07-11', 'Kepala Sekolah', 1, '', 'Sekolah', 'Badri Mutia', 2, '', '', 'Tidak bekerja', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(69, '197709072003122004', '7093515658', 'Rahmawati', 2, 'Payakumbuh', '1977-09-07', '1374025104571989', '', '2239755656300033', 3, 2, '', 1, 'Jl.Dahlia No.86', '2', '2', '', 'Padang Tinggi', 'Kec. Payakumbuh Barat', 26224, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/050/5D-BKD/2003', '2003-12-01', '813/050/5D-BKD/2003', '2003-12-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Kamsinar', 1, 'Moh. Arief Hidayat', '197203062005011004', '3/TNI/Polri', '2005-01-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470885202000', 'INDONESIA', 'default.jpg'),
(70, '198208182009012004', '11093179792', 'Rahmawitri', 2, 'Padang', '1982-08-18', '1374025104571989', '', '7150760661300073', 3, 2, '', 1, 'Jl.Terpadu No.19', '4', '4', '', 'Kalumbuk', 'Kec. Kuranji', 25155, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/152-5D/Bkd-2009', '2009-01-01', '813/152-5D/Bkd-2009', '2009-01-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Mariyetti', 1, 'Jonefri', '198106042005011009', '3/TNI/Polri', '2009-01-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '149385551200200', 'INDONESIA', 'default.jpg'),
(71, '196807021995122002', '8647080900', 'Rahmayenti Bustami', 2, 'Bukittinggi', '1968-07-02', '1374025104571989', '', '6034746649300003', 3, 2, '', 1, 'Jl.Sumur', '2', '1', '', 'Koto Selayan', 'Kec. Mandiangin Koto Selayan', 26126, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '65989/A2/Kp/1995', '1995-12-01', '3182/IV/KWPK-1997', '1997-07-07', 'Pemerintah Pusat', 1, '', 'APBN', 'Rosnizar', 1, 'Heri Warman', '', 'Petani', '1997-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476471727202000', 'INDONESIA', 'default.jpg'),
(72, '196802131994032006', '10955865325', 'Rasti Mirza', 2, 'Agam', '1968-02-13', '1374025104571989', '', '2545746648300032', 3, 4, '', 1, 'Kapau', '0', '0', '', 'Kapau', 'Kec. Tilatang Kamang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '33/IV.E/KWPK/1994', '1994-03-01', '1484/IV/KWPK-1995', '1995-07-01', 'Pemerintah Propinsi', 1, '', 'APBN', 'Saemar', 1, 'Muhammad Syawal', '', 'Wiraswasta', '1995-07-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(73, '195806161984000011', '9934380663', 'Rezki Putra', 1, 'Payakumbuh', '1987-02-15', '1374025104571989', '', '', 1, 1, '', 1, 'Jorong Padang Ambacang', '0', '0', 'Kenag SItujuah Banda Dalam', 'Kenag SItujuah Banda Dalam', 'Kec. Situjuah Limo Nagari', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '800.45.sma.3.bkt-2013', '2013-10-13', 'Kepala Sekolah', 1, '', 'Sekolah', 'Asma', 1, 'Marini', '198703012009012002', '3/TNI/Polri', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(74, '195806161984000012', '11169739723', 'Riadi', 1, 'Simarpinggan', '1974-10-04', '1374025104571989', '', '2336752656200003', 1, 1, '', 1, 'Komplek SMA Negeri 3 Bukittinggi', '4', '4', '', 'Tarok Dipo', 'Kec. Guguk Panjang', 26117, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '800.669.sma.3.bkt-2012', '2012-09-07', '314/108/29.1/smu.02/kp-22', '2002-07-01', 'Kepala Sekolah', 1, '', 'Sekolah', 'Lasmi', 1, 'Overa Sisna', '', 'Tidak bekerja', '2002-01-07', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(75, '197706132006042010', '7141853359', 'Rini', 2, 'Bukittinggi', '1977-06-13', '1374025104571989', '', '2945755656300022', 3, 2, '', 1, 'Jl.Pintu Kabun Gang Kemuning', '2', '4', '', 'Puhun Pintu Kabun', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/091-5D/BKD-2006', '2006-04-01', '821/107-3D/Bkd-2007', '2008-01-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Zubaidar', 1, 'Ramayana', '', 'Karyawan Swasta', '2008-01-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928230202000', 'INDONESIA', 'default.jpg'),
(76, '198302102009011003', '9834615652', 'Riry Mardiyan', 1, 'Bukittinggi', '1983-02-10', '1374025104571989', '', '9542761662200012', 3, 2, '', 1, 'Jl. Prof M Yamin SH Gang Mengkudu No. 32', '2', '2', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 26123, '0751461692', '081267771344', 'rekysda@gmail.com', 'Wakil Kepala Sekolah Sarpras', 1, '822/498/Disdik-Bkt/KGB-2012', '2009-01-01', '813/172-5D/BKD-2009', '2009-01-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Yusnimar', 1, 'Nadia Fadhila', '', 'Lainnya', '2010-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '149385494202000', 'INDONESIA', 'default.jpg'),
(77, '196109291986032004', '8843814922', 'Rismitri', 2, 'Maninjau', '1961-09-29', '1374025104571989', '', '3261739640300043', 3, 2, '', 1, 'Komplek RSAM', '1', '1', '', 'Bukit Apit Puhun', 'Kec. Guguk Panjang', 26114, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '2268/IV.E/Kwpk-1986', '1986-03-01', '2268/IV.E/Kwpk-1986', '1986-03-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Yulinar', 1, 'NAZDI', '195704131988031001', '3/TNI/Polri', '1988-02-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928396202000', 'INDONESIA', 'default.jpg'),
(78, '195806161984000013', '9080660033', 'Rozi Kurniawan', 1, 'Sigiran', '1989-07-05', '1374025104571989', '', '', 2, 2, '', 1, 'Jl. Malalak-Sicincin', '0', '0', 'Jorong Sigiran', 'Malalak Utara', 'Kec. Malalak', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '800.459.SMA.3.Bkt-2013', '2013-07-11', 'Kepala Sekolah', 1, '', 'Sekolah', 'Midiar', 2, '', '', 'Tidak bekerja', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(79, '195608281982032004', '6602719959', 'Salmah', 2, 'Bukittinggi', '1956-08-28', '1374025104571989', '', '', 3, 2, '', 1, 'Jl.H.Miskin No.61 B', '2', '5', '', 'Campago Ipuh', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '01/03/1982', '1982-03-01', '44/199c14/1982', '1983-03-01', 'Pemerintah Pusat', 1, '', 'APBN', 'Yulidar', 1, 'Syaibul Azmi', '', '3/TNI/Polri', '1983-03-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475471768202000', 'INDONESIA', 'default.jpg'),
(80, '196701152014061002', '6771619899', 'Suhardiman', 1, 'Pasaman', '1967-01-15', '1374025104571989', '', '1034743653200003', 5, 1, '', 1, 'Komplek SMA Negeri 3 Bukittinggi', '4', '4', '', 'Tarok Dipo', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/041-5D/BKT-2014', '2014-06-01', '30/II08.09.30.03/C-1984', '1984-07-01', 'Kepala Sekolah', 1, '', 'APBN', 'Kamidah', 1, 'Suningsih', '', 'Lainnya', '1984-01-07', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(81, '196109081984122001', '8415371999', 'Syamsiwarni', 2, 'Agam', '1961-09-08', '1374025104571989', '', '3240739641300043', 3, 2, '', 1, 'Jl.Cendrawasih I No.145 Perumnas KP.Nan Limo', '0', '0', '', 'Kubang Putih', 'Kec. Guguk Panjang', 26181, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '822/408/disdik-bkt/tu-08', '1984-12-01', '822/408/disdik-bkt/tu-08', '2008-12-01', 'Pemerintah Pusat', 1, '', 'Lainnya', 'Upik Ini', 1, '', '', 'Tidak bekerja', '1986-12-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(82, '196412051989032005', '9492864858', 'Telfi Yendra', 2, 'Tanah Datar', '1964-12-05', '1374025104571989', '', '8537742644300033', 3, 2, '', 1, 'Jl.Lubuk Bawah No.07, Tangah Jua', '3', '3', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '1434/IVE/Kwpk-89', '1989-03-01', '1434/IVE/Kwpk-89', '1989-03-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Nurmayanis', 1, 'Zulkarnain Rivai', '0602              ', 'Pensiunan', '1990-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928263202000', 'INDONESIA', 'default.jpg'),
(83, '197301032006042005', '9949072850', 'Tuti Triana', 2, 'Pakan Sinayan', '1973-01-03', '1374025104571989', '', '3435751651300002', 3, 2, '', 1, 'Jl.Gurun Panjang No.36G', '1', '6', '', 'Pakan Kurai', 'Kec. Guguk Panjang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '822/221/Disdik-Bkt/SKT-2011', '2011-01-06', '822/221/Disdik-Bkt/SKT-2011', '2011-01-06', 'Pemerintah Pusat', 1, '', 'Lainnya', 'Chairani', 1, 'Sumarno', '', 'Wiraswasta', '2011-01-06', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928255202000', 'INDONESIA', 'default.jpg'),
(84, '197001091994122001', '8997634237', 'Vera Tri Ningsih', 2, 'Maluku', '1970-01-09', '1374025104571989', '', '2441748649300032', 3, 2, '', 1, 'Jl. Melati 03 Komplek Inkorba', '1', '6', 'Sanjai', 'Campago Guguak Bulek', 'Kec. Mandiangin Koto Selayan', 26128, '0751461692', '081267771344', 'rekysda@gmail.com', 'Wakil Kepala Sekolah', 1, '84347/A2/C/1994', '1994-12-01', '84347/A2/C/1994', '1994-12-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Hj. Erni Suhaimi', 1, 'Ir. Bambang Winarto', '', 'Wiraswasta', '1997-10-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '148612591204000', 'INDONESIA', 'default.jpg'),
(85, '197906062009012002', '9506385015', 'Vivi Sunarti', 2, 'Balai Talang', '1979-06-06', '1374025104571989', '', '3938757659300042', 3, 2, '', 1, 'Balai Talang', '0', '0', '', 'Balai Talang', 'Kec. Guguak', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '448/108.23.2/SMU.01/KP-2003', '2003-07-17', '448/108.23.2/SMU.01/KP-2003', '2003-07-17', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Ermiati', 1, '', '', 'Tidak bekerja', '2010-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(86, '196107051985122003', '8269886920', 'Yelfina', 2, 'Bukittinggi', '1961-07-05', '1374025104571989', '', '0037739641300023', 3, 2, '', 1, 'Jl.Banuhampu Raya No. 306', '0', '0', '', 'Kambung Nan Limo', 'Kec. Banuhampu', 26186, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '12/IV.E/Kwpk-1986', '1985-12-01', '1434/IV/KWPK-1987', '1987-04-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Yulinar', 1, 'Jaman', '195908171987031004', '3/TNI/Polri', '1987-04-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(87, '196306101988032005', '7195711939', 'Yernita', 2, 'Magek', '1963-06-10', '1374025104571989', '', '4942741643300052', 3, 2, '', 1, 'Jl. Bukik Cangang', '1', '2', '', 'Bukik Cangang-Kayu Ramang', 'Kec. Guguk Panjang', 26116, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '279/IV.E/KWPK-88', '1988-03-01', '3839/III/KWPK/KP-1996', '1996-12-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Hj. Ajinar', 1, 'Muhsin Prawira', '', 'Wiraswasta', '1989-07-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470695202000', 'INDONESIA', 'default.jpg'),
(88, '196201081985012001', '12168899139', 'Yetmaliar', 2, 'Lubuk Basung', '1962-01-08', '1374025104571989', '', '9440740641300032', 3, 2, '', 1, 'Parit Rantang Hilir Jorong III Sangkir', '0', '0', '', 'Lubuk Basung', 'Kec. Guguk Panjang', 26415, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '1864/IV.E/Kwpk-1985', '1985-01-01', '3925/IV/Kwpk-1986', '1986-09-01', 'Pemerintah Pusat', 1, '', 'Lainnya', 'Nurema', 1, 'Asrizal. B', '196012292006041006', '3/TNI/Polri', '1986-09-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470778202000', 'INDONESIA', 'default.jpg'),
(89, '195806161984000014', '7084520969', 'Yosnimar', 2, 'Bukittinggi', '1984-03-09', '1374025104571989', '', '4641762663300032', 1, 1, '', 1, 'Jl.Soekarno Hatta Gang Manunggal No.06, Jangkak', '1', '4', '', 'Campago Ipuh', 'Kec. Mandiangin Koto Selayan', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '800.669.sma.3.bkt-2012', '2012-09-07', '800.669.sma.3.bkt-2006', '2006-07-01', 'Kepala Sekolah', 1, '', 'Sekolah', 'Emi', 1, 'Ilyas Santoni', '', 'Lainnya', '2006-07-17', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg');
INSERT INTO `m_pegawai` (`id`, `nip`, `password`, `nama_guru`, `id_jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nik`, `niy_nigk`, `nuptk`, `id_status_kepegawaian`, `id_jenis_ptk`, `pengawas_bidang_studi`, `id_agama`, `alamat_jalan`, `rt`, `rw`, `nama_dusun`, `desa_kelurahan`, `kecamatan`, `kode_pos`, `telepon`, `hp`, `email`, `tugas_tambahan`, `id_status_keaktifan`, `sk_cpns`, `tanggal_cpns`, `sk_pengangkatan`, `tmt_pengangkatan`, `lembaga_pengangkatan`, `id_golongan`, `keahlian_laboratorium`, `sumber_gaji`, `nama_ibu_kandung`, `id_status_pernikahan`, `nama_suami_istri`, `nip_suami_istri`, `pekerjaan_suami_istri`, `tmt_pns`, `lisensi_kepsek`, `jumlah_sekolah_binaan`, `diklat_kepengawasan`, `mampu_handle_kk`, `keahlian_breile`, `keahlian_bahasa_isyarat`, `npwp`, `kewarganegaraan`, `image`) VALUES
(90, '196107101984122001', '6550475455', 'Yulfah Yetti', 2, 'Agam', '1961-07-10', '1374025104571989', '', '1042739640300023', 3, 2, '', 1, 'Jl.Prof.M.Yamin,SH', '0', '0', '', 'Aur Kuning', 'Kec. Guguk Panjang', 26117, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '822/407/disdik.bkt/tu-2008', '2008-12-01', '822/407/disdik.bkt/tu-2008', '2008-12-01', 'Pemerintah Pusat', 1, '', 'Lainnya', 'Saridan', 1, 'Zamtiardi', '', 'Tidak bekerja', '2008-12-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '593529272202000', 'INDONESIA', 'default.jpg'),
(91, '195806161984000015', '5864246749', 'Yulia Sari', 2, 'Bukittingi', '1986-01-27', '1374025104571989', '', '', 1, 1, '', 1, 'Jl.Padang Gamuak No.16 B', '1', '5', '', 'Tarok Dipo', 'Kec. Guguk Panjang', 26117, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '', '0000-00-00', '800.041.sma.3.bkt-2012', '2012-02-06', 'Kepala Sekolah', 1, '', 'Sekolah', 'Lili Sri', 1, 'Julyanton', '', 'Karyawan Swasta', '0000-00-00', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(92, '195811111982022002', '10669807584', 'Yusnel', 2, 'Matur, Agam', '1958-11-11', '1374025104571989', '', '3443736638300043', 3, 2, '', 1, 'Perumahan Bukittinggi Indah No.B9', '1', '7', '', 'Pakan Labuah', 'Kec. Aur Birugo Tigo Baleh', 26134, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '42091/C/2/82', '1982-02-01', '767/II/C1983', '1983-10-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Raisah', 1, 'MARDIAS', '195710161982031007', '3/TNI/Polri', '1983-10-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '475928214202000', 'INDONESIA', 'default.jpg'),
(93, '196208161990112001', '10218026586', 'Zaitun', 2, 'Matur', '1962-08-16', '1374025104571989', '', '7148740641300053', 3, 1, '', 1, 'Jl.Prof.M.Yamin,SH', '0', '0', '', 'Aur Kuning', 'Kec. Aur Birugo Tigo Baleh', 26131, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '822/359/DISDIK-B19/BKT-200', '2009-09-15', '1259IV-AKWPK-1990', '1990-11-01', 'Pemerintah Propinsi', 1, '', 'APBD Kabupaten/Kota', 'Syafiah', 1, 'Austani', '195808211986031007', 'Tidak bekerja', '2009-11-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470950202000', 'INDONESIA', 'default.jpg'),
(94, '195801181985121001', '6811574735', 'Zetri Zainal', 1, 'Batu Taba', '1958-01-18', '1374025104571989', '', '5450736639200002', 3, 2, '', 1, 'Jorong Tanah Nyariang', '0', '0', '', 'Batu Taba', 'Kec. Ampek Angkek', 26191, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '119/IV.E/KWPK-86', '1985-12-01', '3095/III/KWPK-98', '1989-09-01', 'Pemerintah Pusat', 1, '', 'APBD Kabupaten/Kota', 'Rukiah', 1, 'Meriza', '', 'Lainnya', '1987-02-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470786202000', 'INDONESIA', 'default.jpg'),
(95, '196911131994122001', '11038361946', 'Zulfiwadris', 2, 'Bukittinggi', '1969-11-13', '1374025104571989', '', '7445747649300023', 3, 2, '', 1, 'baringin', '0', '0', '', 'Gadut', 'Kec. Tilatang Kamang', 0, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '81903/A2/C/1994', '1994-12-01', '3646/IV/Kwpk-1997', '1997-07-01', 'Pemerintah Propinsi', 1, '', 'APBN', 'Rosni', 1, 'Muhammad Syawal', '', '3/TNI/Polri', '1997-07-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '', 'INDONESIA', 'default.jpg'),
(96, '197712282006042005', '9218814438', 'Zulvanisma', 2, 'Situjuh Batur,50Kota', '1977-12-28', '1374025104571989', '', '3560755657300033', 3, 2, '', 1, 'Jl.Khatib Sulaiman, Situjuh Batur', '0', '0', '', 'Situjuah Batua', 'Kec. Situjuah Limo Nagari', 26263, '0751461692', '081267771344', 'rekysda@gmail.com', '', 1, '813/005-5D/BKD-2006', '2006-04-01', '813/005-5D/BKD-2006', '2006-04-01', 'Pemerintah Kab/Kota', 1, '', 'APBD Kabupaten/Kota', 'Hj. Zulbaidah Ham', 1, 'Satria Irandi', '', 'Peternak', '2007-08-01', 'TIDAK', 0, 'TIDAK', '0', 'TIDAK', 'TIDAK', '476470836202000', 'INDONESIA', 'default.jpg'),
(100, '112', '5555', 'p', 2, 'p', '0000-00-00', 'o', 'o', 'p', 1, 1, 'p', 1, 'p', '', '', 'p', 'p', 'p', 0, 'p', 'p', 'rekysda@gmail.com', 'p', 1, 'o', '0000-00-00', 'o', '0000-00-00', 'o', 1, 'o', 'o', 'o', 1, 'o', 'o', 'o', '0000-00-00', 'o', 0, 'o', 'o', 'o', 'o', 'o', 'o', '1560589752777.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `m_pendidikan`
--

DROP TABLE IF EXISTS `m_pendidikan`;
CREATE TABLE `m_pendidikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pendidikan`
--

INSERT INTO `m_pendidikan` (`id`, `nama`) VALUES
(1, 'SMU/SMK'),
(2, 'D3'),
(3, 'D4'),
(4, 'S1'),
(5, 'S2'),
(6, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `m_pengumuman`
--

DROP TABLE IF EXISTS `m_pengumuman`;
CREATE TABLE `m_pengumuman` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_notif` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pengumuman`
--

INSERT INTO `m_pengumuman` (`id`, `nama`, `updated_at`, `is_notif`) VALUES
(1, 'asd', '2020-07-27 12:25:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_sekolah`
--

DROP TABLE IF EXISTS `m_sekolah`;
CREATE TABLE `m_sekolah` (
  `id` int(5) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `npsn` varchar(50) NOT NULL,
  `nss` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kodepos` int(7) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_sekolah`
--

INSERT INTO `m_sekolah` (`id`, `sekolah`, `npsn`, `nss`, `alamat`, `kodepos`, `telepon`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `website`, `email`) VALUES
(1, 'SMA SISTER', '10301989', '301056009005', 'Jl. KUSUMABANGSA 21 SURABAYA', 60272, '031-5345155', 'Ketabang', 'Genteng', 'SURABAYA', 'Jawa Timur', 'https://sisterv4.com', 'sma@sisterv4.com');

-- --------------------------------------------------------

--
-- Table structure for table `m_statuskeaktifan`
--

DROP TABLE IF EXISTS `m_statuskeaktifan`;
CREATE TABLE `m_statuskeaktifan` (
  `id` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_statuskeaktifan`
--

INSERT INTO `m_statuskeaktifan` (`id`, `nama`, `keterangan`) VALUES
(1, 'Aktif', ''),
(2, 'Tidak Aktif', ''),
(3, 'Pensiun', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_statusnikah`
--

DROP TABLE IF EXISTS `m_statusnikah`;
CREATE TABLE `m_statusnikah` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_statusnikah`
--

INSERT INTO `m_statusnikah` (`id`, `nama`) VALUES
(1, 'Belum Menikah'),
(2, 'Menikah'),
(3, 'Janda/Duda');

-- --------------------------------------------------------

--
-- Table structure for table `m_statuspegawai`
--

DROP TABLE IF EXISTS `m_statuspegawai`;
CREATE TABLE `m_statuspegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_statuspegawai`
--

INSERT INTO `m_statuspegawai` (`id`, `nama`) VALUES
(1, 'PNS'),
(2, 'GTY'),
(3, 'GTT Provinsi'),
(4, 'GTT/PTT Kab/Kota'),
(5, 'Guru Bantu Pusat'),
(6, 'Guru Bantu Sekolah'),
(7, 'Tenaga honorer');

-- --------------------------------------------------------

--
-- Table structure for table `m_tahunakademik`
--

DROP TABLE IF EXISTS `m_tahunakademik`;
CREATE TABLE `m_tahunakademik` (
  `id` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `semester` int(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_tahunakademik`
--

INSERT INTO `m_tahunakademik` (`id`, `nama`, `tahun`, `semester`) VALUES
(1, 'Semester Ganjil 2019/2020', '2019/2020', 1),
(2, 'Semester Genap 2019/2020', '2019/2020', 2);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'site_title', 'Sister ver 4.0'),
(2, 'site_description', 'Sister ver 4.0'),
(3, 'site_keyword', 'sister'),
(4, 'forgot_password', '1'),
(5, 'signup_member', '0'),
(6, 'protocol', 'smtp'),
(7, 'smtp_host', 'ssl://smtp.googlemail.com'),
(8, 'smtp_user', 'sistersmtp@gmail.com'),
(9, 'smtp_pass', '#kirimemail2020'),
(10, 'smtp_port', '465'),
(11, 'mailtype', 'html'),
(12, 'charset', 'utf-8'),
(13, 'newline', '\\r\\n'),
(14, 'forbidden', '0'),
(15, 'email_master', 'rekysda@gmail.com'),
(16, 'login_token', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'halaman 12', '<p>hal 12</p>\r\n', 'halaman-12', '0000-00-00 00:00:00', '2019-05-07 07:32:49'),
(7, 'iii', '<p><strong>Lorem Ipsum</strong>&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n', 'iii', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'asd', '<p>asd dsa asdadads</p>\r\n', 'asd', '2019-05-04 03:03:06', '2019-05-04 03:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_berkas`
--

DROP TABLE IF EXISTS `ppdb_berkas`;
CREATE TABLE `ppdb_berkas` (
  `id` int(5) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `gambar` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `siswa` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_berkas`
--

INSERT INTO `ppdb_berkas` (`id`, `nama`, `gambar`, `siswa`) VALUES
(12, 'kk', '200819035638.jpg', '1831'),
(2, 'KK', '200323053026.jpg', '1'),
(9, 'ijasah', '200818071835.jpg', '1830'),
(5, 'ijasah', '200818055758.jpg', '5'),
(6, 'KK', '200818061333.jpg', '5'),
(10, 'kk', '200818071849.jpg', '1830'),
(13, 'KK', '200819035728.jpg', '1831');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_formulir`
--

DROP TABLE IF EXISTS `ppdb_formulir`;
CREATE TABLE `ppdb_formulir` (
  `id` int(6) NOT NULL,
  `tahun_ppdb` int(5) NOT NULL,
  `noformulir` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_formulir`
--

INSERT INTO `ppdb_formulir` (`id`, `tahun_ppdb`, `noformulir`, `password`, `status`) VALUES
(126, 2020, '20001', '451269', 'terpakai'),
(127, 2020, '20002', '867953', 'terpakai'),
(128, 2020, '20003', '576812', 'tersedia'),
(129, 2020, '20004', '645379', 'tersedia'),
(130, 2020, '20005', '584792', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_formulir_jual`
--

DROP TABLE IF EXISTS `ppdb_formulir_jual`;
CREATE TABLE `ppdb_formulir_jual` (
  `id_nota` int(6) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama` varchar(50) NOT NULL,
  `asalsekolah` varchar(50) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `jumlah_form` varchar(50) NOT NULL,
  `harga_form` varchar(50) NOT NULL,
  `bayar_form` varchar(50) NOT NULL,
  `no_formulir` varchar(512) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_formulir_jual`
--

INSERT INTO `ppdb_formulir_jual` (`id_nota`, `tanggal`, `nama`, `asalsekolah`, `alamat`, `hp`, `jumlah_form`, `harga_form`, `bayar_form`, `no_formulir`, `user_id`) VALUES
(1, '2019-06-19 07:35:11', 'qwe', 'qwe', 'qwe', '11111', '1', '250000', '0', '19094', '3'),
(2, '2019-06-19 09:48:47', '19094,19095', '19094,19095', '19094,19095', '1909419095', '2', '250000', '0', '19094,19095', '3'),
(3, '2019-06-19 11:05:01', '19094,19095', '19094,19095', '19094,19095', '1909419095', '2', '250000', '500000', '19094,19095', '3');

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
  `noformulir` text NOT NULL,
  `buktibayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_preregistrasi`
--

INSERT INTO `ppdb_preregistrasi` (`id`, `tanggal`, `nama`, `hp`, `asalsekolah`, `email`, `noformulir`, `buktibayar`) VALUES
(3, '2020-08-19', 'asd', '111', 'asd', 'rekysda@gmail.com', '20001', '1597803836775.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_rapor`
--

DROP TABLE IF EXISTS `ppdb_rapor`;
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
-- Dumping data for table `ppdb_rapor`
--

INSERT INTO `ppdb_rapor` (`id`, `siswa`, `mapel1`, `mapel2`, `mapel3`, `mapel4`, `mapel5`, `mapel6`, `mapel7`, `mapel8`, `mapel9`, `mapel10`, `mapel11`, `mapel12`, `mapel13`, `mapel14`, `mapel15`, `mapel16`, `mapel17`, `mapel18`, `mapel19`, `mapel20`) VALUES
(8, '1830', '99', '99', '77', '99', '77', '66', '66', '66', '77', '66', '77', '66', '77', '66', '77', '88', '99', '88', '66', '77');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_siswa`
--

DROP TABLE IF EXISTS `ppdb_siswa`;
CREATE TABLE `ppdb_siswa` (
  `id` int(5) NOT NULL,
  `tanggaldaftar` timestamp NULL DEFAULT current_timestamp(),
  `sekolah_id` varchar(20) NOT NULL DEFAULT '',
  `tahun_ppdb` varchar(50) DEFAULT NULL,
  `gelombang_id` varchar(50) DEFAULT NULL,
  `jalur_id` varchar(50) DEFAULT NULL,
  `jalurbiaya_id` varchar(50) DEFAULT NULL,
  `noformulir` varchar(50) DEFAULT NULL,
  `namasiswa` text NOT NULL DEFAULT '',
  `nis` varchar(10) DEFAULT NULL,
  `nrp` varchar(10) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nik` varchar(10) DEFAULT NULL,
  `panggilansiswa` varchar(10) DEFAULT NULL,
  `agamasiswa` varchar(50) DEFAULT NULL,
  `kelaminsiswa` varchar(50) DEFAULT NULL,
  `tempatlahirsiswa` text DEFAULT NULL,
  `tanggallahirsiswa` date DEFAULT NULL,
  `warganegarasiswa` text DEFAULT NULL,
  `beratsiswa` varchar(5) DEFAULT NULL,
  `tinggisiswa` varchar(5) DEFAULT NULL,
  `photosiswa` varchar(10) DEFAULT NULL,
  `alamatsiswa` text DEFAULT NULL,
  `propinsisiswa` text DEFAULT NULL,
  `kotasiswa` text DEFAULT NULL,
  `kodepossiswa` text DEFAULT NULL,
  `teleponsiswa` text DEFAULT NULL,
  `hpsiswa` text DEFAULT NULL,
  `emailsiswa` text DEFAULT NULL,
  `sekolahasal` text DEFAULT NULL,
  `alamatsekolahasal` text DEFAULT NULL,
  `ijazah` text DEFAULT NULL,
  `skhun` text DEFAULT NULL,
  `statusanak` text DEFAULT NULL,
  `anakke` text DEFAULT NULL,
  `jumlahsaudara` text DEFAULT NULL,
  `bahasasiswa` text DEFAULT NULL,
  `statusayah` text DEFAULT NULL,
  `namaayah` text DEFAULT NULL,
  `tempatlahirayah` text DEFAULT NULL,
  `tanggallahirayah` date DEFAULT NULL,
  `agamaayah` text DEFAULT NULL,
  `alamatayah` text DEFAULT NULL,
  `propinsiayah` text DEFAULT NULL,
  `kotaayah` text DEFAULT NULL,
  `teleponayah` text DEFAULT NULL,
  `hpayah` text DEFAULT NULL,
  `pendidikanayah` text DEFAULT NULL,
  `pekerjaanayah` text DEFAULT NULL,
  `statusibu` text DEFAULT NULL,
  `namaibu` text DEFAULT NULL,
  `tempatlahiribu` text DEFAULT NULL,
  `tanggalahiribu` date DEFAULT NULL,
  `agamaibu` text DEFAULT NULL,
  `alamatibu` text DEFAULT NULL,
  `propinsiibu` text DEFAULT NULL,
  `kotaibu` text DEFAULT NULL,
  `teleponibu` text DEFAULT NULL,
  `hpibu` text DEFAULT NULL,
  `pendidikanibu` text DEFAULT NULL,
  `pekerjaanibu` text DEFAULT NULL,
  `statuswali` text DEFAULT NULL,
  `namawali` text DEFAULT NULL,
  `tempatlahirwali` text DEFAULT NULL,
  `tanggallahirwali` date DEFAULT NULL,
  `agamawali` text DEFAULT NULL,
  `alamatwali` text DEFAULT NULL,
  `propinsiwali` text DEFAULT NULL,
  `kotawali` text DEFAULT NULL,
  `teleponwali` text DEFAULT NULL,
  `hpwali` text DEFAULT NULL,
  `pendidikanwali` text DEFAULT NULL,
  `pekerjaanwali` text DEFAULT NULL,
  `ppdb_status` text DEFAULT NULL,
  `noakta` text DEFAULT NULL,
  `jarak` text DEFAULT NULL,
  `transportasi` text DEFAULT NULL,
  `nikayah` text DEFAULT NULL,
  `gajiayah` text DEFAULT NULL,
  `nikibu` text DEFAULT NULL,
  `gajiibu` text DEFAULT NULL,
  `gajiwali` text DEFAULT NULL,
  `jenistinggal` text DEFAULT NULL,
  `kelurahan` text DEFAULT NULL,
  `kecamatan` text DEFAULT NULL,
  `nopesertaun` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `emailortu` text NOT NULL DEFAULT '',
  `tgl_diterima` text DEFAULT NULL,
  `kelas_diterima` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ppdb_siswa`
--

INSERT INTO `ppdb_siswa` (`id`, `tanggaldaftar`, `sekolah_id`, `tahun_ppdb`, `gelombang_id`, `jalur_id`, `jalurbiaya_id`, `noformulir`, `namasiswa`, `nis`, `nrp`, `nisn`, `nik`, `panggilansiswa`, `agamasiswa`, `kelaminsiswa`, `tempatlahirsiswa`, `tanggallahirsiswa`, `warganegarasiswa`, `beratsiswa`, `tinggisiswa`, `photosiswa`, `alamatsiswa`, `propinsisiswa`, `kotasiswa`, `kodepossiswa`, `teleponsiswa`, `hpsiswa`, `emailsiswa`, `sekolahasal`, `alamatsekolahasal`, `ijazah`, `skhun`, `statusanak`, `anakke`, `jumlahsaudara`, `bahasasiswa`, `statusayah`, `namaayah`, `tempatlahirayah`, `tanggallahirayah`, `agamaayah`, `alamatayah`, `propinsiayah`, `kotaayah`, `teleponayah`, `hpayah`, `pendidikanayah`, `pekerjaanayah`, `statusibu`, `namaibu`, `tempatlahiribu`, `tanggalahiribu`, `agamaibu`, `alamatibu`, `propinsiibu`, `kotaibu`, `teleponibu`, `hpibu`, `pendidikanibu`, `pekerjaanibu`, `statuswali`, `namawali`, `tempatlahirwali`, `tanggallahirwali`, `agamawali`, `alamatwali`, `propinsiwali`, `kotawali`, `teleponwali`, `hpwali`, `pendidikanwali`, `pekerjaanwali`, `ppdb_status`, `noakta`, `jarak`, `transportasi`, `nikayah`, `gajiayah`, `nikibu`, `gajiibu`, `gajiwali`, `jenistinggal`, `kelurahan`, `kecamatan`, `nopesertaun`, `image`, `emailortu`, `tgl_diterima`, `kelas_diterima`) VALUES
(1, '2016-12-08 03:00:00', '1', '2019', '1', '2', '5', '190001', 'FAHMI MUHLISIN', '190001', '', '', 'test123', '', 'Islam', 'Laki-Laki', 'Medan', '2005-06-18', 'INDONESIA', '1', '1', '', 'test123', 'test123', 'test123', '', '', '0', 'rekysda@gmail.com', 'SMPN 1 GALIS PAMEKASAN', '', '', '', 'Kandung', '1', '1', 'INDONESIA', 'Hidup', 'JAFAR', '', '0000-00-00', 'Islam', 'test123', 'test123', 'test123', '', '081335054383', 'SMU/SMK', 'test123', 'Hidup', 'ISABEL', '', '0000-00-00', 'Islam', 'test123', 'test123', 'test123', '', 'test123', 'SMU/SMK', 'test123', 'Hidup', '', '', '0000-00-00', 'Islam', '', '', '', '', '', 'SMU/SMK', '', 'calon', '', '', '', '1111', '0', '2222', '', '', '', 'test123', 'test123', '', 'default.jpg', 'rekysda@gmail.com', '', ''),
(3, '2016-07-03 03:00:00', '1', '2019', '1', '2', '6', '190003', 'FIRHAN GHULAM ACHMAD', '190002', '', '', '', '', 'Islam', 'Laki-Laki', '', '2019-08-28', 'INDONESIA', '', '', '', '', '', '', '', '', '0', '', 'SMP', '', '', '', 'kandung', '0003', '0003', 'INDONESIA', 'Hidup', 'JAFAR', '', '0000-00-00', 'Islam', '0003', '0003', '0003', '', '081335054383', 'SMU/SMK', '0003', 'Hidup', 'ISABEL', '0003', '0000-00-00', 'Islam', '0003', '0003', '0003', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'calon', '', '', '', '1111', '0', '2222', '', '0', '', '0003', '0003', '', 'default.jpg', '', '', ''),
(5, '2016-07-03 03:00:00', '1', '2019', '1', '3', '', '190005', 'GEOVANY EDY W', '190003', '', '', '', '', 'Islam', 'Laki-Laki', '', '2010-06-21', 'INDONESIA', '', '', '', '', '', '', '', '', '0', '', 'SMP HANG TUAH 4 SURABAYA', '', '', '', 'kandung', '2', '2', 'INDONESIA', 'Hidup', 'ALEX', '', '0000-00-00', 'Islam', 'GEOVANY ', 'GEOVANY ', 'GEOVANY ', '', '081335054383', 'SMU/SMK', 'GEOVANY ', 'Hidup', 'GEOVANY ', '', '0000-00-00', 'Islam', 'GEOVANY ', 'GEOVANY ', 'GEOVANY ', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'aktif', '', '', '', '3333', '0', '4444', '', '0', '', 'GEOVANY ', 'GEOVANY ', '', 'default.jpg', '', '2019-06-06', 'X IPA 1'),
(6, '2016-07-03 03:00:00', '1', '2019', '1', '3', '', '190006', 'Cynthia Budiyanto', '190004', '', '', '', '', 'Islam', 'Perempuan', '', '0000-00-00', 'INDONESIA', '', '', '', '', '', '', '', '', '0', '', 'SMPN 3 MUNCAR', '', '', '', '1', '', '', 'INDONESIA', '1', 'BENYAMIN', '', '0000-00-00', '3', '', '', '', '', '081249991001', '', '', '1', 'GEOVANY ', '', '0000-00-00', '3', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'aktif', '', '', '', '', '0', '4444', '', '0', '', '', '', '', 'default.jpg', '', '', ''),
(7, '2016-07-03 03:00:00', '1', '2019', '1', '3', '', '190007', 'Clara Graciella Alim', '190005', '', '', '', '', 'Islam', 'Perempuan', '', '0000-00-00', 'INDONESIA', '', '', '', '', '', '', '', '', '0', '', 'SMPN 1 JOMBANG', '', '', '', '1', '', '', 'INDONESIA', '1', 'BURHAN', '', '0000-00-00', '3', '', '', '', '', '081249991001', '', '', '1', 'LISA', '', '0000-00-00', '3', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'aktif', '', '', '', '5555', '0', '', '', '0', '', '', '', '', 'default.jpg', '', '', ''),
(8, '2016-07-03 03:00:00', '1', '2019', '1', '3', '', '190008', 'Agatha Tirtana', '190006', '', '', '', '', 'Islam', 'Perempuan', '', '0000-00-00', 'INDONESIA', '', '', '', '', '', '', '', '', '0', '', 'MTSN 1 MATARAM', '', '', '', '1', '', '', 'INDONESIA', '1', 'BURHAN', '', '0000-00-00', '3', '', '', '', '', '081249991001', '', '', '1', 'JENNY', '', '0000-00-00', '3', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'aktif', '', '', '', '5555', '0', '', '', '0', '', '', '', '', 'default.jpg', '', '', ''),
(9, '2016-07-03 03:00:00', '1', '2020', '1', '3', '', '190009', 'Felicia Stewennie', '190007', '', '', '', '', 'Islam', 'Perempuan', '', '0000-00-00', 'INDONESIA', '', '', '', '', '', '', '', '', '0', '', 'SMP', '', '', '', '1', '', '', 'INDONESIA', '1', 'MUHAMMAD SOLEH', '', '0000-00-00', '3', '', '', '', '', '081249991001', '', '', '1', 'JESSIE', '', '0000-00-00', '3', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'aktif', '', '', '', '', '0', '', '', '0', '', '', '', '', 'default.jpg', '', '', ''),
(10, '2016-07-03 03:00:00', '1', '2020', '1', '3', '', '190010', 'Hillary Kaory', '190008', '', '', '', '', 'Islam', 'Perempuan', '', '0000-00-00', 'INDONESIA', '', '', '', '', '', '', '', '', '0', '', 'SMP', '', '', '', '1', '', '', 'INDONESIA', '1', 'DODY', '', '0000-00-00', '3', '', '', '', '', '081249991001', '', '', '1', 'LALA', '', '0000-00-00', '3', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'aktif', '', '', '', '', '0', '', '', '0', '', '', '', '', 'default.jpg', '', '', ''),
(11, '2016-07-03 03:00:00', '1', '2020', '1', '3', '', '190011', 'Ivana Kristiono', '190009', '', '', '', '', 'Islam', 'Perempuan', '', '0000-00-00', 'INDONESIA', '', '', '', '', '', '', '', '', '0', '', 'SMP', '', '', '', '1', '', '', 'INDONESIA', '1', 'DIDIT MULYANTO', '', '0000-00-00', '3', '', '', '', '', '081249991001', '', '', '1', 'KARMELIA', '', '0000-00-00', '3', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'aktif', '', '', '', '', '0', '', '', '0', '', '', '', '', 'default.jpg', '', '', ''),
(12, '2016-07-03 03:00:00', '1', '2020', '1', '3', '', '190012', 'Janet Ellora Wibowo', '190010', '', '', '', '', 'Islam', 'Perempuan', '', '0000-00-00', 'INDONESIA', '', '', '', '', '', '', '', '', '0', '', 'SMPN 1 PURWOHARJO', '', '', '', '1', '', '', 'INDONESIA', '1', 'TOTO ISKANDAR', '', '0000-00-00', '3', '', '', '', '', '081249991001', '', '', '1', 'RAISO', '', '0000-00-00', '3', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'aktif', '', '', '', '', '0', '', '', '0', '', '', '', '', 'default.jpg', '', '2019-06-06', 'X IPA 1'),
(1830, '2020-08-18 01:44:34', '1', '2020', '1', NULL, NULL, '20001', '11', NULL, NULL, '11', '11', '', 'Islam', 'Laki-Laki', '11', '2021-06-18', '', '11', '11', NULL, '11', '11', '11', '11', '', '11', '11', '11', '', '', '', 'Kandung', '11', '11', '', 'Hidup', '11', '', '0000-00-00', 'Islam', '11', '11', '11', '', '11', 'SMU/SMK', '11', 'Hidup', '11', '', '0000-00-00', 'Islam', '11', '11', '11', '', '11', 'SMU/SMK', '11', 'Hidup', '', '', '0000-00-00', 'Islam', '', '', '', '', '', 'SMU/SMK', '', 'calon', '', '11', '11', '11', '', '11', '', '', '', '11', '11', '', '1597722008256.jpg', '11', NULL, NULL),
(1831, '2020-08-19 01:56:03', '1', '2020', '1', NULL, NULL, '20002', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'calon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_siswa_jalur`
--

DROP TABLE IF EXISTS `ppdb_siswa_jalur`;
CREATE TABLE `ppdb_siswa_jalur` (
  `id` int(5) NOT NULL,
  `tanggaldaftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `tahun_ppdb` varchar(50) NOT NULL,
  `sekolah_id` varchar(50) NOT NULL,
  `gelombang_id` varchar(50) NOT NULL,
  `jalur_id` varchar(50) NOT NULL,
  `jalurbiaya_id` varchar(50) NOT NULL,
  `noformulir` varchar(50) NOT NULL,
  `siswa_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_siswa_jalur`
--

INSERT INTO `ppdb_siswa_jalur` (`id`, `tanggaldaftar`, `tahun_ppdb`, `sekolah_id`, `gelombang_id`, `jalur_id`, `jalurbiaya_id`, `noformulir`, `siswa_id`) VALUES
(18, '2020-01-13 05:01:15', '2019', '1', '1', '2', '5', '1121', '15'),
(19, '2020-01-13 05:01:36', '2019', '1', '1', '2', '5', '1122', '8');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_status`
--

DROP TABLE IF EXISTS `ppdb_status`;
CREATE TABLE `ppdb_status` (
  `id` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_status`
--

INSERT INTO `ppdb_status` (`id`, `nama`) VALUES
(1, 'calon'),
(2, 'aktif'),
(3, 'alumni'),
(4, 'keluar'),
(5, 'ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_status_anak`
--

DROP TABLE IF EXISTS `ppdb_status_anak`;
CREATE TABLE `ppdb_status_anak` (
  `id` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_status_anak`
--

INSERT INTO `ppdb_status_anak` (`id`, `nama`) VALUES
(1, 'Kandung'),
(2, 'Tiri'),
(3, 'Angkat'),
(4, 'Wali');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_status_ortu`
--

DROP TABLE IF EXISTS `ppdb_status_ortu`;
CREATE TABLE `ppdb_status_ortu` (
  `id` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppdb_status_ortu`
--

INSERT INTO `ppdb_status_ortu` (`id`, `nama`) VALUES
(1, 'Hidup'),
(2, 'Alm');

-- --------------------------------------------------------

--
-- Table structure for table `r_catatan_walikelas`
--

DROP TABLE IF EXISTS `r_catatan_walikelas`;
CREATE TABLE `r_catatan_walikelas` (
  `id` int(10) NOT NULL,
  `tahunakademik_id` int(5) NOT NULL,
  `siswa_id` varchar(20) NOT NULL,
  `kelas_id` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_jadwal_pelajaran`
--

DROP TABLE IF EXISTS `r_jadwal_pelajaran`;
CREATE TABLE `r_jadwal_pelajaran` (
  `id` int(6) NOT NULL,
  `tahunakademik_id` varchar(50) NOT NULL,
  `mapel_id` varchar(50) NOT NULL,
  `kelas_id` varchar(50) NOT NULL,
  `guru_id` varchar(50) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam_mulai` varchar(50) NOT NULL,
  `jam_selesai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_jadwal_pelajaran`
--

INSERT INTO `r_jadwal_pelajaran` (`id`, `tahunakademik_id`, `mapel_id`, `kelas_id`, `guru_id`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, '1', '1', '1', '5', 'Senin', '07:02:10', '07:02:10'),
(3, '1', '2', '1', '5', 'Rabu', '09:20:20', '09:20:20'),
(4, '1', '3', '1', '2', 'Selasa', '07:07:01', '07:07:01'),
(5, '2', '1', '1', '5', 'Senin', '07:02:10', '07:02:10'),
(6, '2', '3', '1', '2', 'Selasa', '07:07:01', '07:07:01'),
(7, '2', '2', '1', '5', 'Rabu', '09:20:20', '09:20:20'),
(8, '1', '1', '3', '5', 'Senin', '04:16:07', '04:16:07'),
(9, '1', '1', '5', '3', 'Senin', '06:38:24', '06:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `r_kelompok_mapel`
--

DROP TABLE IF EXISTS `r_kelompok_mapel`;
CREATE TABLE `r_kelompok_mapel` (
  `id` int(6) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_kelompok` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_kelompok_mapel`
--

INSERT INTO `r_kelompok_mapel` (`id`, `jenis`, `nama_kelompok`, `keterangan`) VALUES
(1, 'A', 'Kelompok A', ''),
(2, 'B', 'Kelompok B', ''),
(3, 'C', 'Kelompok C (Peminatan)', '');

-- --------------------------------------------------------

--
-- Table structure for table `r_mapel`
--

DROP TABLE IF EXISTS `r_mapel`;
CREATE TABLE `r_mapel` (
  `id` int(6) NOT NULL,
  `kode_mapel` varchar(50) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `sk_mapel` varchar(50) NOT NULL,
  `jurusan_id` varchar(50) NOT NULL,
  `guru_mgmp` varchar(50) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `urutan` varchar(50) NOT NULL,
  `kelompok_id` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_mapel`
--

INSERT INTO `r_mapel` (`id`, `kode_mapel`, `nama_mapel`, `sk_mapel`, `jurusan_id`, `guru_mgmp`, `tingkat`, `urutan`, `kelompok_id`, `is_active`) VALUES
(1, 'MK01', 'Bahasa Indonesia', 'BIN', '1', '12', '1', '1', '1', 1),
(2, 'MK02', 'Matematika', 'MAT', '1', '3', '1', '2', '1', 1),
(3, 'MK03', 'FISIKA', 'FIS', '1', '16', '1', '1', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `r_nilai_extrakulikuler`
--

DROP TABLE IF EXISTS `r_nilai_extrakulikuler`;
CREATE TABLE `r_nilai_extrakulikuler` (
  `id` int(10) NOT NULL,
  `tahunakademik_id` varchar(10) NOT NULL,
  `siswa_id` varchar(10) NOT NULL,
  `kelas_id` varchar(10) NOT NULL,
  `kegiatan` text NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_nilai_keterampilan`
--

DROP TABLE IF EXISTS `r_nilai_keterampilan`;
CREATE TABLE `r_nilai_keterampilan` (
  `id` int(5) NOT NULL,
  `jadwal_id` varchar(50) NOT NULL,
  `tahunakademik_id` varchar(50) NOT NULL,
  `mapel_id` varchar(50) NOT NULL,
  `kelas_id` varchar(50) NOT NULL,
  `guru_id` varchar(50) NOT NULL,
  `siswa_id` varchar(50) NOT NULL,
  `siswa_urut` varchar(2) NOT NULL,
  `nil1` varchar(500) NOT NULL,
  `nil2` varchar(50) NOT NULL,
  `nil3` varchar(50) NOT NULL,
  `nil4` varchar(50) NOT NULL,
  `nil5` varchar(50) NOT NULL,
  `nil6` varchar(50) NOT NULL,
  `nil7` varchar(50) NOT NULL,
  `nil8` varchar(50) NOT NULL,
  `rata2` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_nilai_pengetahuan`
--

DROP TABLE IF EXISTS `r_nilai_pengetahuan`;
CREATE TABLE `r_nilai_pengetahuan` (
  `id` int(5) NOT NULL,
  `jadwal_id` varchar(50) NOT NULL,
  `tahunakademik_id` varchar(50) NOT NULL,
  `mapel_id` varchar(50) NOT NULL,
  `kelas_id` varchar(50) NOT NULL,
  `guru_id` varchar(50) NOT NULL,
  `siswa_id` varchar(50) NOT NULL,
  `siswa_urut` varchar(2) NOT NULL,
  `ph1` varchar(500) NOT NULL,
  `ph2` varchar(50) NOT NULL,
  `ph3` varchar(50) NOT NULL,
  `ph4` varchar(50) NOT NULL,
  `ph5` varchar(50) NOT NULL,
  `ph6` varchar(50) NOT NULL,
  `pt1` varchar(50) NOT NULL,
  `pt2` varchar(50) NOT NULL,
  `pt3` varchar(50) NOT NULL,
  `pt4` varchar(50) NOT NULL,
  `pt5` varchar(50) NOT NULL,
  `pt6` varchar(50) NOT NULL,
  `rph` varchar(50) NOT NULL,
  `rpt` varchar(50) NOT NULL,
  `uts` varchar(50) NOT NULL,
  `uas` varchar(50) NOT NULL,
  `rata2` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_nilai_pengetahuan`
--

INSERT INTO `r_nilai_pengetahuan` (`id`, `jadwal_id`, `tahunakademik_id`, `mapel_id`, `kelas_id`, `guru_id`, `siswa_id`, `siswa_urut`, `ph1`, `ph2`, `ph3`, `ph4`, `ph5`, `ph6`, `pt1`, `pt2`, `pt3`, `pt4`, `pt5`, `pt6`, `rph`, `rpt`, `uts`, `uas`, `rata2`, `grade`, `deskripsi`) VALUES
(364, '9', '1', '1', '5', '3', '5', '1', '80', '80', '80', '', '', '', '80', '', '', '', '', '', '80', '336', '88', '80', '84', 'B', 'Sudah  memahami semua kompetensi dengan baik'),
(365, '9', '1', '1', '5', '3', '6', '2', '', '80', '80', '', '', '', '', '80', '', '', '', '', '80', '336', '88', '80', '84', 'B', 'Sudah  memahami semua kompetensi dengan baik'),
(366, '9', '1', '1', '5', '3', '7', '3', '', '', '90', '90', '', '', '', '', '80', '', '', '', '86', '334', '80', '88', '84', 'B', 'Sudah  memahami semua kompetensi dengan baik');

-- --------------------------------------------------------

--
-- Table structure for table `r_nilai_prestasi`
--

DROP TABLE IF EXISTS `r_nilai_prestasi`;
CREATE TABLE `r_nilai_prestasi` (
  `id` int(10) NOT NULL,
  `tahunakademik_id` int(5) NOT NULL,
  `siswa_id` varchar(20) NOT NULL,
  `kelas_id` varchar(10) NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_nilai_sikap_semester`
--

DROP TABLE IF EXISTS `r_nilai_sikap_semester`;
CREATE TABLE `r_nilai_sikap_semester` (
  `id` int(10) NOT NULL,
  `tahunakademik_id` int(5) NOT NULL,
  `siswa_id` varchar(20) NOT NULL,
  `kelas_id` varchar(10) NOT NULL,
  `spiritual_predikat` varchar(2) NOT NULL,
  `spiritual_deskripsi` text NOT NULL,
  `sosial_predikat` varchar(2) NOT NULL,
  `sosial_deskripsi` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_siswa_masuk`
--

DROP TABLE IF EXISTS `r_siswa_masuk`;
CREATE TABLE `r_siswa_masuk` (
  `siswa_id` int(6) NOT NULL,
  `masuk_kelas` varchar(50) NOT NULL,
  `masuk_tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_siswa_masuk`
--

INSERT INTO `r_siswa_masuk` (`siswa_id`, `masuk_kelas`, `masuk_tanggal`) VALUES
(1, 'X IPA 1', '2019-07-04'),
(3, '', ''),
(5, '', ''),
(7, '', ''),
(8, '', ''),
(11, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sar_gedung`
--

DROP TABLE IF EXISTS `sar_gedung`;
CREATE TABLE `sar_gedung` (
  `id` int(10) NOT NULL,
  `kode_gedung` varchar(500) NOT NULL,
  `nama_gedung` varchar(500) NOT NULL,
  `lantai` varchar(50) NOT NULL,
  `panjang` varchar(50) NOT NULL,
  `tinggi` varchar(50) NOT NULL,
  `lebar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sar_gedung`
--

INSERT INTO `sar_gedung` (`id`, `kode_gedung`, `nama_gedung`, `lantai`, `panjang`, `tinggi`, `lebar`) VALUES
(1, 'G0001', 'Gedung A', '5', '6', '6', '6'),
(2, 'G0002', 'Gedung B', '6', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sar_inventaris`
--

DROP TABLE IF EXISTS `sar_inventaris`;
CREATE TABLE `sar_inventaris` (
  `id` int(10) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `kode_inv` varchar(50) NOT NULL,
  `barang_id` varchar(50) NOT NULL,
  `kondisi_id` varchar(50) NOT NULL,
  `sumber_id` varchar(50) NOT NULL,
  `supplier_id` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `umur_bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sar_inventaris`
--

INSERT INTO `sar_inventaris` (`id`, `tanggal`, `kode_inv`, `barang_id`, `kondisi_id`, `sumber_id`, `supplier_id`, `jumlah`, `harga`, `umur_bulan`) VALUES
(1, '', 'INV001', '1', '1', '1', '', '100', '150000', '24'),
(2, '', 'INV002', '1', '2', '1', '1', '50', '100000', '48'),
(3, '', 'INV003', '2', '1', '4', '', '150', '150000', '12'),
(5, '', 'INV002', '1', '2', '1', '1', '50', '100000', ''),
(8, '', 'INV001', '1', '1', '1', '', '-10', '150000', '24'),
(9, '', 'INV002', '1', '2', '1', '1', '-5', '100000', '48'),
(10, '', 'INV003', '2', '1', '4', '', '-50', '150000', '12'),
(11, '2019-08-16', 'INV004', '2', '1', '1', '1', '48', '100000', '24');

-- --------------------------------------------------------

--
-- Table structure for table `sar_kondisi`
--

DROP TABLE IF EXISTS `sar_kondisi`;
CREATE TABLE `sar_kondisi` (
  `id` int(10) NOT NULL,
  `kondisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sar_kondisi`
--

INSERT INTO `sar_kondisi` (`id`, `kondisi`) VALUES
(1, 'BARU'),
(2, 'SECOND'),
(3, 'REKONDISI');

-- --------------------------------------------------------

--
-- Table structure for table `sar_mutasi_barang`
--

DROP TABLE IF EXISTS `sar_mutasi_barang`;
CREATE TABLE `sar_mutasi_barang` (
  `id` int(10) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `barang_id` varchar(50) NOT NULL,
  `ruangan_id` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sar_mutasi_barang`
--

INSERT INTO `sar_mutasi_barang` (`id`, `kode`, `tanggal`, `barang_id`, `ruangan_id`, `jumlah`, `created_at`) VALUES
(8, 'MUT001', '2019-08-09', '1', '2', '50', '2019-08-09 20:02:22'),
(9, 'MUT001', '2019-08-09', '2', '2', '50', '2019-08-09 20:02:23'),
(10, 'MUT002', '2019-08-09', '1', '1', '50', '2019-08-09 20:02:40'),
(11, 'MUT002', '2019-08-09', '2', '1', '50', '2019-08-09 20:02:40'),
(12, 'MUT003', '2019-08-09', '1', '3', '50', '2019-08-09 20:02:54'),
(13, 'MUT003', '2019-08-09', '2', '3', '50', '2019-08-09 20:02:54'),
(14, 'MUT004', '2019-08-09', '1', '2', '-50', '2019-08-09 20:03:28'),
(15, 'MUT005', '2019-08-09', '1', '2', '50', '2019-08-09 20:05:15'),
(16, 'MUT006', '2019-08-09', '1', '3', '-50', '2019-08-09 20:06:27'),
(17, 'MUT006', '2019-08-09', '2', '3', '-50', '2019-08-09 20:06:28'),
(18, 'MUT007', '2019-08-09', '2', '1', '-10', '2019-08-09 20:08:38'),
(19, 'MUT008', '2019-08-09', '1', '2', '50', '2019-08-09 20:09:05'),
(20, 'MUT008', '2019-08-09', '2', '2', '60', '2019-08-09 20:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `sar_mutasi_rusak`
--

DROP TABLE IF EXISTS `sar_mutasi_rusak`;
CREATE TABLE `sar_mutasi_rusak` (
  `id` int(10) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `kode_inv` varchar(50) NOT NULL,
  `barang_id` varchar(50) NOT NULL,
  `keterangan` varchar(516) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sar_mutasi_rusak`
--

INSERT INTO `sar_mutasi_rusak` (`id`, `kode`, `tanggal`, `kode_inv`, `barang_id`, `keterangan`, `jumlah`, `created_at`) VALUES
(6, 'RSK006', '2019-08-16', 'INV001', '1', '77', '10', '2019-08-16 13:59:27'),
(7, 'RSK007', '2019-08-16', 'INV002', '1', '2', '5', '2019-08-16 14:01:23'),
(8, 'RSK008', '2019-08-16', 'INV003', '2', '9', '50', '2019-08-16 14:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `sar_namabarang`
--

DROP TABLE IF EXISTS `sar_namabarang`;
CREATE TABLE `sar_namabarang` (
  `id` int(10) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sar_namabarang`
--

INSERT INTO `sar_namabarang` (`id`, `namabarang`, `image`) VALUES
(1, 'KURSI SISWA', '1564848094133.jpg'),
(2, 'MEJA SISWA', '1564848032725.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sar_ruangan`
--

DROP TABLE IF EXISTS `sar_ruangan`;
CREATE TABLE `sar_ruangan` (
  `id` int(10) NOT NULL,
  `gedung_id` varchar(100) NOT NULL,
  `sekolah_id` varchar(50) NOT NULL,
  `kode_ruangan` varchar(100) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sar_ruangan`
--

INSERT INTO `sar_ruangan` (`id`, `gedung_id`, `sekolah_id`, `kode_ruangan`, `nama_ruangan`) VALUES
(1, '1', '1', 'SMA002', 'SMA002'),
(2, '1', '2', 'SMP001', 'SMP001'),
(3, '2', '2', 'SMP003', 'SMP003'),
(4, '1', '1', 'SMA004', 'SMA004');

-- --------------------------------------------------------

--
-- Table structure for table `sar_sumberdana`
--

DROP TABLE IF EXISTS `sar_sumberdana`;
CREATE TABLE `sar_sumberdana` (
  `id` int(10) NOT NULL,
  `sumber_dana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sar_sumberdana`
--

INSERT INTO `sar_sumberdana` (`id`, `sumber_dana`) VALUES
(1, 'Pembelian Sendiri'),
(2, 'Hibah'),
(3, 'Bantuan WaliMurid'),
(4, 'BOS'),
(6, 'Tukar');

-- --------------------------------------------------------

--
-- Table structure for table `sar_supplier`
--

DROP TABLE IF EXISTS `sar_supplier`;
CREATE TABLE `sar_supplier` (
  `id` int(10) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(600) NOT NULL,
  `telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sar_supplier`
--

INSERT INTO `sar_supplier` (`id`, `kode`, `nama`, `alamat`, `telepon`) VALUES
(1, 'S001', 'PT. Perkasa Abadi', 'Jl. Semeru 55 Surabaya', '08133344554');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_bayar_batal`
--

DROP TABLE IF EXISTS `siswa_bayar_batal`;
CREATE TABLE `siswa_bayar_batal` (
  `id_master` int(11) NOT NULL,
  `nomor_nota` varchar(40) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `keterangan_batal` text NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `user_batal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_bayar_batal`
--

INSERT INTO `siswa_bayar_batal` (`id_master`, `nomor_nota`, `tanggal`, `keterangan_batal`, `siswa_id`, `user_batal`) VALUES
(18, '5CEFB47168C51 ', '2019-05-30 13:05:45', ' 555', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_bayar_detail`
--

DROP TABLE IF EXISTS `siswa_bayar_detail`;
CREATE TABLE `siswa_bayar_detail` (
  `id_detail` int(1) UNSIGNED NOT NULL,
  `id_master` int(1) UNSIGNED NOT NULL,
  `biaya_id` int(1) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `biaya` varchar(50) NOT NULL,
  `nominal` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_bayar_detail`
--

INSERT INTO `siswa_bayar_detail` (`id_detail`, `id_master`, `biaya_id`, `jenis`, `biaya`, `nominal`) VALUES
(19, 19, 2, 'PPDB', 'Uang Gedung', '9878909'),
(18, 18, 4, 'PPDB', 'Uang SPP Bulan Juli', '1000000'),
(17, 18, 2, 'PPDB', 'Uang Gedung', '6000000'),
(20, 20, 2, 'ppdb', 'Uang Gedung1', '3000000'),
(21, 21, 5, 'DAFTARULANG', 'Seragam', '1000000'),
(22, 22, 2, 'PPDB', 'Uang Gedung1', '5000000'),
(23, 23, 7, 'LAIN-LAIN', 'Extra Komputer', '300000'),
(24, 24, 1, 'ppdb', '2019_UANG GEDUNG I', '600000'),
(25, 25, 1, 'ppdb', '2019_UANG GEDUNG I', '600000'),
(26, 26, 3, 'ppdb', '2019_SPP JULI', '1000000'),
(27, 27, 4, 'ppdb', '2019_UANG GEDUNG II', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_bayar_master`
--

DROP TABLE IF EXISTS `siswa_bayar_master`;
CREATE TABLE `siswa_bayar_master` (
  `id_master` int(11) UNSIGNED NOT NULL,
  `nomor_nota` varchar(40) NOT NULL,
  `tanggal` datetime NOT NULL,
  `totalcart` int(11) NOT NULL,
  `carabayar` varchar(50) NOT NULL DEFAULT 'TUNAI',
  `bayar` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `siswa_id` mediumint(1) UNSIGNED DEFAULT NULL,
  `user_id` mediumint(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_bayar_master`
--

INSERT INTO `siswa_bayar_master` (`id_master`, `nomor_nota`, `tanggal`, `totalcart`, `carabayar`, `bayar`, `keterangan`, `siswa_id`, `user_id`) VALUES
(18, '5CEFB47168C51', '2019-05-30 12:46:09', 7000000, 'TUNAI', 0, '', 3, 3),
(19, '5CEFBC21DB22A', '2019-05-30 13:18:57', 9878909, 'TUNAI', 10000000, '', 1, 3),
(20, '5D107E8B41916', '2019-06-24 09:40:59', 3000000, 'TUNAI', 3000000, '', 3, 3),
(21, '5D2743757554D', '2019-07-11 16:11:01', 1000000, 'TUNAI', 1000000, '', 1, 3),
(22, '5D5AB1273D23E', '2019-08-19 00:00:00', 5000000, 'TUNAI', 5000000, '', 1, 3),
(23, '5E0218F99ACB4', '2019-12-24 00:00:00', 300000, 'TUNAI', 300000, '', 1, 3),
(24, '5EEA21262FAF7', '2020-06-17 00:00:00', 600000, 'TUNAI', 600000, '', 1, 3),
(25, '5EEA264A89A25', '2020-06-17 00:00:00', 600000, 'TUNAI', 600000, '', 1, 3),
(26, '5EEA2A20E213D', '2020-06-17 00:00:00', 1000000, 'TUNAI', 1200000, '', 1, 3),
(27, '5EEA2D16F1A72', '2020-06-17 00:00:00', 1000000, 'TUNAI', 1000000, '', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_deviceid`
--

DROP TABLE IF EXISTS `siswa_deviceid`;
CREATE TABLE `siswa_deviceid` (
  `nis` int(20) NOT NULL,
  `deviceid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_deviceid`
--

INSERT INTO `siswa_deviceid` (`nis`, `deviceid`) VALUES
(190001, '190001');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_keterangan`
--

DROP TABLE IF EXISTS `siswa_keterangan`;
CREATE TABLE `siswa_keterangan` (
  `siswa_id` int(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_keterangan`
--

INSERT INTO `siswa_keterangan` (`siswa_id`, `keterangan`) VALUES
(1, 'test 01112 rrr'),
(3, ''),
(4, ''),
(8, ''),
(15, '-'),
(402, '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_keuangan`
--

DROP TABLE IF EXISTS `siswa_keuangan`;
CREATE TABLE `siswa_keuangan` (
  `id` int(10) NOT NULL,
  `siswa_id` int(6) NOT NULL,
  `biaya_id` int(6) NOT NULL,
  `nominal` int(50) NOT NULL,
  `is_paid` int(2) NOT NULL DEFAULT 0,
  `jenis` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `push_notif` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_keuangan`
--

INSERT INTO `siswa_keuangan` (`id`, `siswa_id`, `biaya_id`, `nominal`, `is_paid`, `jenis`, `user_id`, `created_at`, `updated_at`, `push_notif`) VALUES
(47, 15, 1, 3000000, 0, 'ppdb', 3, '2020-01-13 12:01:15', '0000-00-00 00:00:00', 0),
(48, 15, 4, 1000000, 0, 'ppdb', 3, '2020-01-13 12:01:15', '0000-00-00 00:00:00', 0),
(49, 15, 5, 1000000, 0, 'ppdb', 3, '2020-01-13 12:01:15', '0000-00-00 00:00:00', 0),
(50, 15, 3, 1000000, 0, 'ppdb', 3, '2020-01-13 12:01:15', '0000-00-00 00:00:00', 0),
(101, 1, 1, 600000, 1, 'ppdb', 3, '2020-01-14 12:40:27', '2020-06-17 23:39:17', 1),
(102, 1, 4, 1000000, 1, 'ppdb', 3, '2020-01-14 12:40:27', '2020-06-17 21:48:03', 0),
(103, 1, 5, 1000000, 0, 'ppdb', 3, '2020-01-14 12:40:27', '0000-00-00 00:00:00', 0),
(104, 1, 3, 1000000, 1, 'ppdb', 3, '2020-01-14 12:40:27', '2020-06-17 21:35:35', 0),
(105, 3, 1, 3000000, 0, 'ppdb', 3, '2020-01-14 12:41:07', '0000-00-00 00:00:00', 0),
(106, 3, 4, 1000000, 0, 'ppdb', 3, '2020-01-14 12:41:07', '0000-00-00 00:00:00', 0),
(107, 3, 3, 500000, 0, 'ppdb', 3, '2020-01-14 12:41:07', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_pemutihan_batal`
--

DROP TABLE IF EXISTS `siswa_pemutihan_batal`;
CREATE TABLE `siswa_pemutihan_batal` (
  `id_master` int(11) NOT NULL,
  `nomor_nota` varchar(40) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `keterangan_batal` text NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `user_batal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_pemutihan_batal`
--

INSERT INTO `siswa_pemutihan_batal` (`id_master`, `nomor_nota`, `tanggal`, `keterangan_batal`, `siswa_id`, `user_batal`) VALUES
(23, '5D6F24496221F ', '2019-09-04 06:50:29', '  batal', 1, 3),
(24, '5D6F447B34D24 ', '2019-09-04 06:58:55', ' 123', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_pemutihan_detail`
--

DROP TABLE IF EXISTS `siswa_pemutihan_detail`;
CREATE TABLE `siswa_pemutihan_detail` (
  `id_detail` int(1) UNSIGNED NOT NULL,
  `id_master` int(1) UNSIGNED NOT NULL,
  `biaya_id` int(1) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `biaya` varchar(50) NOT NULL,
  `nominal` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_pemutihan_detail`
--

INSERT INTO `siswa_pemutihan_detail` (`id_detail`, `id_master`, `biaya_id`, `jenis`, `biaya`, `nominal`) VALUES
(23, 23, 4, 'PPDB', 'Uang SPP Bulan Juli', '1200000'),
(24, 24, 10, 'PPDB', 'Uang Gedung2', '6000000'),
(25, 25, 10, 'PPDB', 'Uang Gedung2', '6000000');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_pemutihan_master`
--

DROP TABLE IF EXISTS `siswa_pemutihan_master`;
CREATE TABLE `siswa_pemutihan_master` (
  `id_master` int(11) UNSIGNED NOT NULL,
  `nomor_nota` varchar(40) NOT NULL,
  `tanggal` datetime NOT NULL,
  `totalcart` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `penanggungjawab` varchar(500) NOT NULL,
  `lampiran` varchar(500) NOT NULL,
  `siswa_id` mediumint(1) UNSIGNED DEFAULT NULL,
  `user_id` mediumint(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_pemutihan_master`
--

INSERT INTO `siswa_pemutihan_master` (`id_master`, `nomor_nota`, `tanggal`, `totalcart`, `keterangan`, `penanggungjawab`, `lampiran`, `siswa_id`, `user_id`) VALUES
(23, '5D6F24496221F', '2019-09-04 00:00:00', 1200000, 'asd', 'asd', 'default.jpg', 1, 3),
(24, '5D6F447B34D24', '2019-09-04 00:00:00', 6000000, 'asd', 'asd', 'default.jpg', 1, 3),
(25, '5D6F44CC20F48', '2019-09-04 00:00:00', 6000000, '-', '-', 'default.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_spp`
--

DROP TABLE IF EXISTS `siswa_spp`;
CREATE TABLE `siswa_spp` (
  `siswa_id` int(6) NOT NULL,
  `nominal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_spp`
--

INSERT INTO `siswa_spp` (`siswa_id`, `nominal`) VALUES
(1, '1000000'),
(3, '750000'),
(4, '1000000'),
(5, '1000000'),
(6, '1000000'),
(7, '1000000'),
(8, '1000000'),
(9, '1000000'),
(10, '1000000'),
(11, '1000000'),
(12, '1000000'),
(13, '900000'),
(14, '1000000'),
(15, '1000000'),
(16, '1000000'),
(17, '1000000'),
(18, '1000000'),
(19, '1000000'),
(20, '1000000'),
(21, '1000000'),
(22, '1000000'),
(23, '1000000'),
(24, '1000000'),
(25, '1000000'),
(26, '1000000'),
(27, '1000000'),
(30, '1000000'),
(31, '1000000'),
(32, '1000000'),
(33, '1000000'),
(34, '1000000'),
(35, '1000000'),
(36, '1000000'),
(37, '1000000'),
(38, '1000000'),
(39, '1000000'),
(40, '1000000'),
(41, '1000000'),
(42, '1000000'),
(43, '1000000'),
(44, '1000000'),
(45, '1000000'),
(46, '1000000'),
(47, '1000000'),
(48, '1000000'),
(49, '1000000'),
(50, '1000000'),
(51, '1000000'),
(52, '1000000'),
(53, '1000000'),
(54, '1000000'),
(55, '1000000'),
(56, '1000000'),
(58, '1000000'),
(60, '1000000'),
(61, '1000000'),
(62, '1000000'),
(63, '1000000'),
(64, '1000000'),
(65, '1000000'),
(66, '1000000'),
(67, '1000000'),
(68, '1000000'),
(71, '1000000'),
(72, '1000000'),
(73, '800000'),
(74, '1000000'),
(75, '1000000'),
(76, '1000000'),
(78, '1000000'),
(79, '1000000'),
(80, '1000000'),
(81, '1000000'),
(82, '1000000'),
(85, '1000000'),
(86, '1000000'),
(87, '1000000'),
(88, '800000'),
(89, '1000000'),
(90, '1000000'),
(91, '1000000'),
(92, '1000000'),
(93, '1000000'),
(94, '1000000'),
(95, '1000000'),
(96, '1000000'),
(97, '1000000'),
(98, '1000000'),
(99, '1000000'),
(100, '1000000'),
(101, ''),
(102, ''),
(103, ''),
(104, ''),
(105, ''),
(106, ''),
(107, ''),
(108, ''),
(109, ''),
(110, ''),
(111, ''),
(112, ''),
(113, ''),
(115, ''),
(116, ''),
(117, ''),
(119, ''),
(120, ''),
(121, ''),
(122, ''),
(123, ''),
(124, ''),
(125, ''),
(126, ''),
(127, ''),
(128, ''),
(129, ''),
(130, ''),
(131, ''),
(132, ''),
(133, ''),
(134, ''),
(135, ''),
(136, ''),
(137, ''),
(138, ''),
(139, ''),
(140, ''),
(141, ''),
(142, ''),
(143, ''),
(144, ''),
(145, ''),
(146, ''),
(147, ''),
(148, ''),
(149, ''),
(150, ''),
(151, ''),
(152, ''),
(153, ''),
(154, ''),
(155, ''),
(156, ''),
(157, ''),
(158, ''),
(159, ''),
(160, ''),
(161, ''),
(162, ''),
(164, ''),
(165, ''),
(167, ''),
(169, ''),
(170, ''),
(171, ''),
(172, ''),
(173, ''),
(174, ''),
(175, ''),
(176, ''),
(177, ''),
(178, ''),
(179, ''),
(180, ''),
(181, ''),
(182, ''),
(183, ''),
(185, ''),
(186, ''),
(187, ''),
(188, ''),
(189, ''),
(190, ''),
(191, ''),
(192, ''),
(193, ''),
(194, ''),
(195, ''),
(196, ''),
(197, ''),
(198, ''),
(199, ''),
(200, ''),
(201, ''),
(202, ''),
(203, ''),
(204, ''),
(205, ''),
(206, ''),
(207, ''),
(208, ''),
(209, ''),
(210, ''),
(211, ''),
(212, ''),
(213, ''),
(214, ''),
(215, ''),
(216, ''),
(217, ''),
(218, ''),
(219, ''),
(220, ''),
(221, ''),
(222, ''),
(223, ''),
(224, ''),
(225, ''),
(226, ''),
(227, ''),
(228, ''),
(229, ''),
(230, ''),
(231, ''),
(232, ''),
(233, ''),
(234, ''),
(235, ''),
(236, ''),
(237, ''),
(238, ''),
(239, ''),
(240, ''),
(241, ''),
(242, ''),
(243, ''),
(244, ''),
(245, ''),
(246, ''),
(247, ''),
(248, ''),
(249, ''),
(250, ''),
(251, ''),
(252, ''),
(253, ''),
(254, ''),
(256, ''),
(257, ''),
(258, ''),
(259, ''),
(261, ''),
(263, ''),
(264, ''),
(267, ''),
(282, ''),
(283, ''),
(285, ''),
(286, ''),
(287, ''),
(288, ''),
(289, ''),
(290, ''),
(291, ''),
(292, ''),
(293, ''),
(294, ''),
(295, ''),
(296, ''),
(297, ''),
(298, ''),
(299, ''),
(300, ''),
(301, ''),
(302, ''),
(303, ''),
(304, ''),
(305, ''),
(306, ''),
(307, ''),
(308, ''),
(309, ''),
(310, ''),
(311, ''),
(312, ''),
(313, ''),
(314, ''),
(315, ''),
(316, ''),
(317, ''),
(318, ''),
(319, ''),
(320, ''),
(321, ''),
(322, ''),
(323, ''),
(324, ''),
(325, ''),
(326, ''),
(327, ''),
(328, ''),
(329, ''),
(330, ''),
(331, ''),
(332, ''),
(333, ''),
(334, ''),
(335, ''),
(336, ''),
(337, ''),
(338, ''),
(339, ''),
(340, ''),
(341, ''),
(342, ''),
(343, ''),
(344, ''),
(345, ''),
(346, ''),
(347, ''),
(348, ''),
(349, ''),
(350, ''),
(351, ''),
(352, ''),
(353, ''),
(354, ''),
(355, ''),
(356, ''),
(357, ''),
(358, ''),
(359, ''),
(360, ''),
(361, ''),
(362, ''),
(363, ''),
(364, ''),
(365, ''),
(366, ''),
(367, ''),
(368, ''),
(369, ''),
(370, ''),
(371, ''),
(372, ''),
(373, ''),
(374, ''),
(375, ''),
(376, ''),
(377, ''),
(378, ''),
(379, ''),
(380, ''),
(381, ''),
(382, ''),
(383, ''),
(384, ''),
(385, ''),
(386, ''),
(388, ''),
(389, ''),
(390, ''),
(391, ''),
(392, ''),
(393, ''),
(394, ''),
(395, ''),
(396, ''),
(397, ''),
(398, ''),
(399, ''),
(400, ''),
(401, ''),
(402, '1000000'),
(403, '800000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

DROP TABLE IF EXISTS `tb_log`;
CREATE TABLE `tb_log` (
  `id` int(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(100) NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id`, `tanggal`, `user`, `aksi`, `item`) VALUES
(15, '2019-10-02 06:17:40', 'admin@admin.com', 'Tambah Role', 'asd'),
(16, '2019-10-02 06:17:56', 'admin@admin.com', 'Edit Role', 'asd dsa'),
(17, '2019-10-02 06:18:06', 'admin@admin.com', 'Hapus Role', 'asd dsa'),
(18, '2019-10-02 06:22:08', 'admin@admin.com', 'Tambah Menu', 'asd'),
(19, '2019-10-02 06:27:41', 'admin@admin.com', 'Tambah Sub Menu', 'asd'),
(20, '2019-10-02 06:28:20', 'admin@admin.com', 'Edit Sub Menu', 'aktifitas'),
(21, '2019-10-02 06:29:04', 'admin@admin.com', 'Edit Sub Menu', 'zzz'),
(22, '2019-10-02 06:29:23', 'admin@admin.com', 'Edit Sub Menu', 'zzz'),
(23, '2019-10-02 06:33:16', 'admin@admin.com', 'Tambah Sub Menu', 'zzz'),
(24, '2019-10-02 06:33:23', 'admin@admin.com', 'Hapus Sub Menu', 'zzz'),
(25, '2019-10-02 06:33:29', 'admin@admin.com', 'Tambah Menu', 'zzz'),
(26, '2019-10-02 06:34:04', 'admin@admin.com', 'Tambah Menu', 'zzzzzzzzzz'),
(27, '2019-10-02 06:34:07', 'admin@admin.com', 'Hapus Menu', 'zzzzzzzzzz'),
(28, '2019-12-24 13:24:09', 'admin@admin.com', 'Edit Websetting', ''),
(29, '2019-12-24 13:43:05', 'admin@admin.com', 'Edit Siswa', 'FAHMI MUHLISIN'),
(30, '2019-12-24 13:48:57', 'admin@admin.com', 'Tambah Sub Menu', 'api-email'),
(31, '2019-12-24 14:31:36', 'admin@admin.com', 'Tambah Pelanggaran Siswa', ''),
(32, '2019-12-24 15:01:57', 'admin@admin.com', 'Edit Profil', 'admin@admin.com'),
(33, '2019-12-25 10:54:22', 'admin@admin.com', 'Hapus Sub Menu', 'Laporan Pelanggaran Tanggal'),
(34, '2019-12-25 10:54:36', 'admin@admin.com', 'Hapus Sub Menu', 'Laporan Pelanggaran Siswa'),
(35, '2019-12-25 10:55:28', 'admin@admin.com', 'Hapus Role', 'Guru'),
(36, '2019-12-25 10:55:36', 'admin@admin.com', 'Hapus Role', 'Member'),
(37, '2020-01-10 01:58:52', 'admin@admin.com', 'Tambah Role', 'StaffSekolah'),
(38, '2020-01-10 02:01:00', 'admin@admin.com', 'Hapus User', 'Hapus User'),
(39, '2020-01-10 02:23:51', 'admin@admin.com', 'Hapus Sekolah', '123'),
(40, '2020-01-10 02:37:57', 'admin@admin.com', 'Tambah Gelombang Jalur', ''),
(41, '2020-01-10 02:40:14', 'admin@admin.com', 'Hapus Gelombang Jalur', '#ID : 10'),
(42, '2020-01-10 02:40:39', 'admin@admin.com', 'Tambah Gelombang Jalur', ''),
(43, '2020-01-10 02:43:42', 'admin@admin.com', 'Edit Gelombang Jalur', ''),
(44, '2020-01-10 02:43:50', 'admin@admin.com', 'Edit Gelombang Jalur', ''),
(45, '2020-01-10 04:03:21', 'admin@admin.com', 'Edit Gelombang Jalur', ''),
(46, '2020-01-11 11:29:05', 'admin@admin.com', 'Tambah Siswa', '112'),
(47, '2020-01-11 12:04:04', 'admin@admin.com', 'Edit Siswa', '1121'),
(48, '2020-01-11 12:04:33', 'admin@admin.com', 'Edit Siswa', '1121'),
(49, '2020-01-11 12:05:26', 'admin@admin.com', 'Edit Siswa', '1121'),
(50, '2020-01-11 13:43:04', 'admin@admin.com', 'Hapus Gelombang Jalur', '#ID : 11'),
(51, '2020-01-11 13:43:09', 'admin@admin.com', 'Hapus Gelombang Jalur', '#ID : 9'),
(52, '2020-01-11 13:43:19', 'admin@admin.com', 'Hapus Gelombang Jalur', '#ID : 7'),
(53, '2020-01-11 13:43:29', 'admin@admin.com', 'Hapus Gelombang Jalur', '#ID : 8'),
(54, '2020-01-11 13:43:38', 'admin@admin.com', 'Edit Gelombang Jalur', ''),
(55, '2020-01-11 13:45:02', 'admin@admin.com', 'Edit Biaya', 'Uang Gedung ANGS 1 2019'),
(56, '2020-01-11 13:45:13', 'admin@admin.com', 'Edit Biaya', 'Uang SPP Bulan Juli 2019'),
(57, '2020-01-11 13:45:27', 'admin@admin.com', 'Edit Biaya', 'SERAGAM 2019'),
(58, '2020-01-11 13:45:33', 'admin@admin.com', 'Hapus Biaya', '#ID : 6'),
(59, '2020-01-11 13:45:40', 'admin@admin.com', 'Hapus Biaya', '#ID : 7'),
(60, '2020-01-11 13:45:45', 'admin@admin.com', 'Hapus Biaya', '#ID : 9'),
(61, '2020-01-11 13:46:29', 'admin@admin.com', 'Tambah Biaya', '2019_UANG GEDUNG'),
(62, '2020-01-11 13:46:51', 'admin@admin.com', 'Tambah Biaya', '2019_SERAGAM'),
(63, '2020-01-11 13:47:04', 'admin@admin.com', 'Tambah Biaya', '2019_SPP JULI'),
(64, '2020-01-11 13:47:21', 'admin@admin.com', 'Edit Biaya', '2019_UANG GEDUNG I'),
(65, '2020-01-11 13:47:32', 'admin@admin.com', 'Tambah Biaya', '2019_UANG GEDUNG II'),
(66, '2020-01-11 13:47:46', 'admin@admin.com', 'Tambah Biaya', '2019_UANG GEDUNG III'),
(67, '2020-01-11 13:53:09', 'admin@admin.com', 'Tambah Jalur Biaya', 'Modul PPDB'),
(68, '2020-01-11 13:53:19', 'admin@admin.com', 'Tambah Jalur Biaya', 'Modul PPDB'),
(69, '2020-01-11 13:53:28', 'admin@admin.com', 'Tambah Jalur Biaya', 'Modul PPDB'),
(70, '2020-01-11 13:53:40', 'admin@admin.com', 'Hapus Jalur Biaya', 'Modul PPDB'),
(71, '2020-01-11 13:53:46', 'admin@admin.com', 'Hapus Jalur Biaya', 'Modul PPDB'),
(72, '2020-01-11 13:54:03', 'admin@admin.com', 'Tambah Jalur Biaya', 'Modul PPDB'),
(73, '2020-01-11 13:54:26', 'admin@admin.com', 'Tambah Jalur Biaya', 'Modul PPDB'),
(74, '2020-01-11 13:54:44', 'admin@admin.com', 'Tambah Jalur Biaya', 'Modul PPDB'),
(75, '2020-01-11 13:54:55', 'admin@admin.com', 'Tambah Jalur Biaya', 'Modul PPDB'),
(76, '2020-01-11 13:55:04', 'admin@admin.com', 'Tambah Jalur Biaya', 'Modul PPDB'),
(77, '2020-01-11 13:55:16', 'admin@admin.com', 'Tambah Jalur Biaya', 'Modul PPDB'),
(78, '2020-01-11 15:22:26', 'admin@admin.com', 'Edit Siswa', '1121'),
(79, '2020-01-14 02:13:11', 'admin@admin.com', 'Edit Siswa', '2010'),
(80, '2020-01-14 02:13:34', 'admin@admin.com', 'Edit Siswa', '2010'),
(81, '2020-01-14 03:13:23', 'admin@admin.com', 'Edit Siswa', '2010'),
(82, '2020-01-14 03:13:46', 'admin@admin.com', 'Hapus Siswa', '2010'),
(83, '2020-01-14 03:13:53', 'admin@admin.com', 'Edit Siswa', 'FAHMI MUHLISIN'),
(84, '2020-01-14 03:15:12', 'admin@admin.com', 'Edit Siswa', 'FIRHAN GHULAM ACHMAD'),
(85, '2020-01-14 05:27:29', 'admin@admin.com', 'Hapus Formulir', ''),
(86, '2020-01-21 02:40:52', 'admin@admin.com', 'Hapus Formulir', ''),
(87, '2020-01-21 02:41:01', 'admin@admin.com', 'Tambah Formulir', ''),
(88, '2020-01-22 03:08:57', 'rekysda@gmail.com', 'Tambah Ruangan', 'SMA001'),
(89, '2020-01-22 03:12:56', 'rekysda@gmail.com', 'Edit Ruangan', 'Ruangan 3'),
(90, '2020-01-22 03:13:23', 'rekysda@gmail.com', 'Edit Ruangan', 'Ruangan 2'),
(91, '2020-01-22 03:13:28', 'rekysda@gmail.com', 'Edit Ruangan', 'Ruangan 1'),
(92, '2020-01-22 03:27:20', 'rekysda@gmail.com', 'Edit Ruangan', 'Ruangan 3'),
(93, '2020-01-22 03:27:28', 'rekysda@gmail.com', 'Edit Ruangan', 'SMP003'),
(94, '2020-01-22 03:27:39', 'rekysda@gmail.com', 'Edit Ruangan', 'SMA004'),
(95, '2020-01-22 03:27:51', 'rekysda@gmail.com', 'Edit Ruangan', 'SMA0002'),
(96, '2020-01-22 03:28:02', 'rekysda@gmail.com', 'Edit Ruangan', 'SMP001'),
(97, '2020-01-22 03:28:09', 'rekysda@gmail.com', 'Edit Ruangan', 'SMA002'),
(98, '2020-02-12 05:22:53', 'rekysda@gmail.com', 'Tambah Sub Menu', 'user-sekolah'),
(99, '2020-02-12 05:23:15', 'rekysda@gmail.com', 'Edit Sub Menu', 'web-setting'),
(100, '2020-03-17 00:55:07', 'rekysda@gmail.com', 'Hapus Sub Menu', 'User Sekolah'),
(101, '2020-03-17 00:55:37', 'rekysda@gmail.com', 'Hapus Sekolah', 'SMP SISTER'),
(102, '2020-03-17 00:55:58', 'rekysda@gmail.com', 'Hapus Gelombang Jalur', '#ID : 6'),
(103, '2020-03-18 04:19:42', 'rekysda@gmail.com', 'Tambah Kategori Pelanggaran', 'qwe'),
(104, '2020-03-18 04:19:45', 'rekysda@gmail.com', 'Hapus Kategori Pelanggaran', 'qwe'),
(105, '2020-03-18 04:19:48', 'rekysda@gmail.com', 'Tambah Kategori Pelanggaran', 'qwe'),
(106, '2020-03-18 04:33:11', 'rekysda@gmail.com', 'Hapus Sub Menu', 'API SMS'),
(107, '2020-03-18 04:34:24', 'rekysda@gmail.com', 'Hapus Menu', 'page'),
(108, '2020-03-18 04:34:29', 'rekysda@gmail.com', 'Hapus Menu', 'post'),
(109, '2020-03-23 01:10:07', 'rekysda@gmail.com', 'Tambah Sub Menu', 'siswa-berkas'),
(110, '2020-03-23 01:15:33', 'rekysda@gmail.com', 'Edit Sub Menu', 'siswa-berkas'),
(111, '2020-03-23 04:13:16', 'rekysda@gmail.com', 'Tambah berkas', 'KK'),
(112, '2020-03-23 04:17:11', 'rekysda@gmail.com', 'Tambah berkas', 'KK'),
(113, '2020-03-23 04:21:05', 'rekysda@gmail.com', 'Tambah berkas', 'KK'),
(114, '2020-03-23 04:22:38', 'rekysda@gmail.com', 'Tambah berkas', 'aaa'),
(115, '2020-03-23 04:22:55', 'rekysda@gmail.com', 'Tambah berkas', 'KK'),
(116, '2020-03-23 04:23:23', 'rekysda@gmail.com', 'Tambah berkas', 'ijasah'),
(117, '2020-03-23 04:24:46', 'rekysda@gmail.com', 'Tambah berkas', '001'),
(118, '2020-03-23 04:25:43', 'rekysda@gmail.com', 'Tambah berkas', 'rewrwr'),
(119, '2020-03-23 04:26:10', 'rekysda@gmail.com', 'Tambah berkas', '001'),
(120, '2020-03-23 04:26:20', 'rekysda@gmail.com', 'Tambah berkas', 'etet'),
(121, '2020-03-23 04:26:48', 'rekysda@gmail.com', 'Tambah berkas', 'gdfgdfg'),
(122, '2020-03-23 04:27:04', 'rekysda@gmail.com', 'Tambah berkas', 'standart'),
(123, '2020-03-23 04:28:08', 'rekysda@gmail.com', 'Tambah berkas', '123'),
(124, '2020-03-23 04:28:19', 'rekysda@gmail.com', 'Tambah berkas', 'standart'),
(125, '2020-03-23 04:28:29', 'rekysda@gmail.com', 'Tambah berkas', 'KK'),
(126, '2020-03-23 04:29:02', 'rekysda@gmail.com', 'Tambah berkas', 'Anggota Luar'),
(127, '2020-03-23 04:29:50', 'rekysda@gmail.com', 'Tambah berkas', 'Anggota Luar'),
(128, '2020-03-23 04:30:26', 'rekysda@gmail.com', 'Tambah berkas', 'KK'),
(129, '2020-05-13 14:44:29', 'rekysda@gmail.com', 'Tambah Sub Menu', 'laporan-pelanggaran'),
(130, '2020-05-15 08:52:03', 'rekysda@gmail.com', 'Tambah Sub Menu', 'prestasi-siswa'),
(131, '2020-05-15 08:53:06', 'rekysda@gmail.com', 'Tambah Sub Menu', 'laporan-prestasi-siswa'),
(132, '2020-05-15 13:42:30', 'rekysda@gmail.com', 'Tambah Pelanggaran Siswa', ''),
(133, '2020-05-15 13:58:45', 'rekysda@gmail.com', 'Tambah Prestasi Siswa', ''),
(134, '2020-05-15 14:02:32', 'rekysda@gmail.com', 'Tambah Prestasi Siswa', ''),
(135, '2020-05-15 14:43:40', 'rekysda@gmail.com', 'Hapus prestasi Siswa', ''),
(136, '2020-05-15 15:51:44', 'rekysda@gmail.com', 'Tambah Prestasi Siswa', ''),
(137, '2020-05-15 15:55:04', 'rekysda@gmail.com', 'Edit Prestasi Siswa', ''),
(138, '2020-05-15 15:56:51', 'rekysda@gmail.com', 'Edit Prestasi Siswa', ''),
(139, '2020-05-15 15:57:04', 'rekysda@gmail.com', 'Hapus prestasi Siswa', ''),
(140, '2020-05-15 16:01:56', 'rekysda@gmail.com', 'Edit Prestasi Siswa', ''),
(141, '2020-05-15 16:11:41', 'rekysda@gmail.com', 'Edit Prestasi Siswa', ''),
(142, '2020-05-15 16:13:17', 'rekysda@gmail.com', 'Tambah Prestasi Siswa', ''),
(143, '2020-07-13 05:14:20', 'rekysda@gmail.com', 'Edit Biaya', '2019_SPP JULI'),
(144, '2020-07-13 05:15:51', 'rekysda@gmail.com', 'Edit Biaya', '2020_SERAGAM'),
(145, '2020-07-13 05:15:55', 'rekysda@gmail.com', 'Edit Biaya', '2020_UANG GEDUNG I'),
(146, '2020-07-13 05:15:59', 'rekysda@gmail.com', 'Edit Biaya', '2020_UANG GEDUNG III'),
(147, '2020-07-13 05:16:07', 'rekysda@gmail.com', 'Edit Biaya', '2020_UANG GEDUNG II'),
(148, '2020-07-13 05:16:12', 'rekysda@gmail.com', 'Edit Biaya', '2020_SPP JULI'),
(149, '2020-07-15 03:36:22', 'rekysda@gmail.com', 'Edit Siswa', 'FAHMI MUHLISIN'),
(150, '2020-07-15 04:35:10', 'rekysda@gmail.com', 'Edit Kelas', 'X IPA 1'),
(151, '2020-07-15 04:35:15', 'rekysda@gmail.com', 'Edit Kelas', 'X IPS 1'),
(152, '2020-07-15 04:35:23', 'rekysda@gmail.com', 'Edit Kelas', 'XI IPA 1'),
(153, '2020-07-15 04:35:41', 'rekysda@gmail.com', 'Hapus Kelas', 'X IPA 1'),
(154, '2020-07-15 04:35:44', 'rekysda@gmail.com', 'Hapus Kelas', 'X IPS 1'),
(155, '2020-07-15 04:35:59', 'rekysda@gmail.com', 'Edit Guru', 'Agus Musanib'),
(156, '2020-07-15 04:37:30', 'rekysda@gmail.com', 'Edit Kelas', 'XI IPA 1'),
(157, '2020-07-15 04:38:33', 'rekysda@gmail.com', 'Tambah Jadwal', ''),
(158, '2020-07-21 01:48:17', 'rekysda@gmail.com', 'Edit Guru', 'Aina Yonavia'),
(159, '2020-07-21 01:49:03', 'rekysda@gmail.com', 'Tambah Jadwal', ''),
(160, '2020-07-27 04:38:25', 'rekysda@gmail.com', 'Tambah Sub Menu', 'masterekstrakurikuler'),
(161, '2020-07-27 04:39:09', 'rekysda@gmail.com', 'Edit Sub Menu', 'ekstrakurikuler'),
(162, '2020-07-27 04:50:33', 'rekysda@gmail.com', 'Tambah ekstrakurikuler', 'PRAMUKA'),
(163, '2020-07-27 04:52:11', 'rekysda@gmail.com', 'Tambah ekstrakurikuler', 'TIK'),
(164, '2020-07-27 04:52:17', 'rekysda@gmail.com', 'Edit ekstrakurikuler', 'TIK 2'),
(165, '2020-07-27 04:52:43', 'rekysda@gmail.com', 'Hapus ekstrakurikuler', 'TIK 2'),
(166, '2020-07-27 04:52:49', 'rekysda@gmail.com', 'Tambah ekstrakurikuler', 'TIK'),
(167, '2020-07-27 05:08:31', 'rekysda@gmail.com', 'Tambah ekstrakurikuler', 'asd'),
(168, '2020-07-27 05:08:34', 'rekysda@gmail.com', 'Hapus ekstrakurikuler', 'asd'),
(169, '2020-07-27 05:11:07', 'rekysda@gmail.com', 'Tambah Menu', 'Marketing'),
(170, '2020-07-27 05:12:04', 'rekysda@gmail.com', 'Tambah Sub Menu', 'pengumuman'),
(171, '2020-07-27 05:25:23', 'rekysda@gmail.com', 'Tambah pengumuman', 'asd'),
(172, '2020-08-18 01:34:00', 'rekysda@gmail.com', 'Tambah Sub Menu', 'preregistrasi'),
(173, '2020-08-18 01:36:01', 'rekysda@gmail.com', 'Hapus Formulir', ''),
(174, '2020-08-18 01:36:13', 'rekysda@gmail.com', 'Tambah Formulir', ''),
(175, '2020-08-18 03:56:46', 'siswa', 'Tambah berkas', 'Ijasah'),
(176, '2020-08-18 03:57:34', 'siswa', 'Tambah berkas', 'ijazah'),
(177, '2020-08-18 03:57:58', 'rekysda@gmail.com', 'Tambah berkas', 'ijasah'),
(178, '2020-08-18 04:13:33', 'rekysda@gmail.com', 'Tambah berkas', 'KK'),
(179, '2020-08-18 05:08:35', 'rekysda@gmail.com', 'Tambah berkas', 'ijasah'),
(180, '2020-08-18 05:08:51', 'rekysda@gmail.com', 'Tambah berkas', 'kk'),
(181, '2020-08-18 05:18:36', 'siswa', 'Tambah berkas', 'ijasah'),
(182, '2020-08-18 05:18:49', 'siswa', 'Tambah berkas', 'kk'),
(183, '2020-08-18 05:18:59', 'rekysda@gmail.com', 'Tambah berkas', 'kk'),
(184, '2020-08-19 01:56:43', 'siswa', 'Tambah berkas', 'kk'),
(185, '2020-08-19 01:57:28', 'siswa', 'Tambah berkas', 'KK'),
(186, '2020-08-19 02:16:42', 'rekysda@gmail.com', 'Hapus Preregistrasi', ''),
(187, '2020-08-19 06:41:05', 'rekysda@gmail.com', 'Tambah Sub Menu', 'rapor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Administrator', 'admin', 'rekysda@gmail.com', '1577199716178.jpg', '$2y$10$1AJLIeMf95DuIcC3xZPGf.MZDBRslbARhg0MTI0CKEiNJWmCAO8oi', 1, 1, 1555463755);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3),
(8, 1, 2),
(17, 1, 7),
(18, 1, 8),
(20, 3, 9),
(21, 4, 9),
(22, 1, 10),
(23, 1, 11),
(25, 5, 13),
(30, 1, 18),
(31, 1, 19),
(32, 1, 6),
(33, 1, 14),
(34, 1, 12),
(35, 1, 17),
(36, 1, 16),
(37, 1, 20),
(38, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_sekolah`
--

DROP TABLE IF EXISTS `user_access_sekolah`;
CREATE TABLE `user_access_sekolah` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sekolah_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_sekolah`
--

INSERT INTO `user_access_sekolah` (`id`, `user_id`, `sekolah_id`) VALUES
(37, 3, 2),
(38, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_submenu`
--

DROP TABLE IF EXISTS `user_access_submenu`;
CREATE TABLE `user_access_submenu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_submenu`
--

INSERT INTO `user_access_submenu` (`id`, `role_id`, `submenu_id`) VALUES
(1, 1, 1),
(2, 1, 7),
(3, 1, 9),
(4, 1, 10),
(5, 1, 2),
(6, 1, 3),
(7, 1, 8),
(8, 1, 4),
(9, 1, 5),
(10, 1, 14),
(11, 1, 15),
(12, 1, 16),
(13, 1, 17),
(14, 1, 19),
(15, 1, 22),
(16, 1, 23),
(17, 1, 29),
(19, 1, 106),
(20, 1, 18),
(21, 1, 20),
(22, 1, 21),
(23, 1, 24),
(24, 1, 35),
(25, 1, 36),
(26, 1, 40),
(27, 1, 41),
(28, 1, 42),
(29, 1, 49),
(30, 1, 71),
(31, 1, 25),
(32, 1, 26),
(33, 1, 27),
(34, 1, 28),
(35, 1, 30),
(36, 1, 31),
(37, 1, 34),
(38, 1, 72),
(39, 1, 43),
(40, 1, 37),
(41, 1, 111),
(42, 1, 108),
(43, 1, 38),
(44, 1, 109),
(45, 1, 110),
(46, 1, 39),
(47, 1, 107),
(48, 1, 78),
(49, 1, 79),
(50, 1, 80),
(51, 1, 81),
(52, 1, 82),
(53, 1, 83),
(54, 1, 84),
(55, 1, 85),
(56, 1, 86),
(57, 1, 87),
(58, 1, 88),
(59, 1, 89),
(60, 1, 90),
(61, 1, 91),
(62, 1, 92),
(63, 3, 32),
(65, 3, 74),
(68, 4, 32),
(70, 4, 74),
(71, 4, 105),
(72, 1, 112),
(73, 1, 44),
(74, 1, 45),
(75, 1, 46),
(76, 1, 47),
(77, 1, 48),
(78, 1, 50),
(79, 1, 104),
(80, 1, 75),
(81, 1, 77),
(82, 1, 99),
(83, 1, 100),
(84, 1, 101),
(85, 1, 97),
(86, 1, 98),
(87, 1, 51),
(88, 1, 52),
(89, 1, 53),
(90, 1, 54),
(91, 1, 113),
(92, 1, 114),
(93, 1, 115),
(94, 5, 62),
(95, 5, 63),
(96, 5, 64),
(97, 5, 65),
(98, 5, 66),
(99, 5, 67),
(100, 5, 68),
(101, 5, 69),
(102, 5, 73),
(103, 5, 76),
(105, 1, 116),
(106, 1, 117),
(107, 1, 118),
(108, 6, 2),
(109, 6, 3),
(110, 6, 8),
(111, 1, 119);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `menu_id` varchar(50) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `icon`, `menu_id`, `menu`) VALUES
(1, 'fa fa-fw fa-wrench', 'admin', 'Admin'),
(2, 'fa fa-fw fa-users', 'user', 'User'),
(3, 'fa fa-fw fa-navicon', 'menu', 'Menu'),
(6, 'fa fa-fw fa-graduation-cap', 'akademik', 'Akademik'),
(7, 'fa fa-fw fa-user-plus', 'ppdb', 'PPDB'),
(8, 'fa fa-fw fa-money', 'keuangan', 'Keuangan'),
(9, 'fa fa-fw fa-users', 'siswa', 'Siswa'),
(10, 'fa fa-fw fa-users', 'kepegawaian', 'Kepegawaian'),
(11, 'fa fa-fw fa-gear', 'api', 'API'),
(12, 'fa fa-fw fa-book', 'rapor', 'Rapor'),
(13, 'fa fa-fw fa-users', 'guru', 'Guru'),
(14, 'fa fa-fw fa-building', 'sarpras', 'Sarpras'),
(15, 'fa fa-fw fa-envelope', 'surat', 'Surat'),
(16, 'fa fa-fw fa-book', 'bukutamu', 'BukuTamu'),
(17, 'fa fa-fw fa-exclamation-circle', 'bk', 'BK'),
(18, 'fa fa-fw fa-address-book', 'pemutihan', 'Pemutihan'),
(19, 'fa fa-fw fa-users', 'log', 'Log'),
(20, 'fa fa-fw fa-exclamation-circle', 'marketing', 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(3, 'CalonSiswa'),
(4, 'SiswaAktif'),
(5, 'Guru'),
(6, 'StaffSekolah');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 1,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `sort`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fa fa-fw fa-dashboard', 1, 0),
(2, 2, 'My Profile', 'user', 'fa fa-fw fa-user', 1, 1),
(3, 2, 'Edit Profile', 'user/edit', 'fa fa-fw fa-user', 1, 1),
(4, 3, 'Menu Management', 'menu', 'fa fa-fw fa-folder', 1, 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fa fa-fw fa-folder-open', 2, 1),
(7, 1, 'Role', 'admin/role', 'fa fa-fw fa-user-secret', 1, 1),
(8, 2, 'Change Password', 'user/changepassword', 'fa fa-fw fa-key', 1, 1),
(9, 1, 'Users', 'admin/userlogin', 'fa fa-fw fa-users', 1, 1),
(10, 1, 'Web Setting', 'admin/websetting', 'fa fa-fw fa-wrench', 3, 1),
(11, 4, 'All Pages', 'page', 'fa fa-fw fa-folder', 1, 1),
(12, 5, 'Categories', 'post/postcategories', 'fa fa-fw fa-folder', 2, 1),
(13, 5, 'All Posts', 'post', 'fa fa-fw fa-folder', 1, 1),
(14, 6, 'Sekolah', 'akademik/sekolah', 'fa fa-fw fa-folder', 1, 1),
(15, 6, 'Tahun Akademik', 'akademik/tahunakademik', 'fa fa-fw fa-folder', 2, 1),
(16, 6, 'Gelombang', 'akademik/gelombang', 'fa fa-fw fa-folder', 3, 1),
(17, 6, 'Jalur', 'akademik/jalur', 'fa fa-fw fa-folder', 4, 1),
(18, 7, 'Jalur Biaya', 'ppdb/jalurbiaya', 'fa fa-fw fa-folder', 1, 1),
(19, 6, 'Biaya', 'akademik/biaya', 'fa fa-fw fa-folder', 5, 1),
(20, 7, 'Siswa', 'ppdb/siswa', '', 4, 1),
(21, 7, 'Formulir', 'ppdb/formulir', '', 2, 1),
(22, 6, 'Setting', 'akademik/setting', '', 6, 1),
(23, 6, 'Gelombang Jalur', 'akademik/gelombangjalur', '', 7, 1),
(24, 7, 'Siswa Jalur', 'ppdb/siswajalur', '', 6, 1),
(25, 8, 'Keuangan Siswa', 'keuangan/siswakeuangan', '', 1, 1),
(26, 8, 'Pembayaran Siswa', 'keuangan/siswabayar', '', 3, 1),
(27, 8, 'Laporan Keuangan', 'keuangan/laporan_keuangan', '', 5, 1),
(28, 8, 'Pembayaran Siswa Batal', 'keuangan/siswabayarvoid', '', 7, 1),
(29, 6, 'Logo Slip', 'akademik/logoslip', '', 8, 1),
(30, 8, 'Cetak Pembayaran Siswa', 'keuangan/siswabayar_list', '', 4, 1),
(31, 8, 'Tagihan Siswa', 'keuangan/siswatagihan', '', 6, 1),
(32, 9, 'My Profile', 'siswa', '', 1, 1),
(33, 9, 'Tagihan', 'siswa/tagihan', '', 2, 1),
(34, 8, 'Keuangan SPP', 'keuangan/siswaspp', '', 2, 1),
(35, 7, 'Siswa CSV', 'ppdb/siswacsv', '', 7, 1),
(36, 7, 'Laporan PPDB', 'ppdb/laporanppdb', '', 10, 1),
(37, 10, 'Pegawai', 'kepegawaian/pegawai', '', 1, 1),
(38, 10, 'Penggajian', 'kepegawaian/penggajian', '', 2, 1),
(39, 10, 'Laporan Penggajian', 'kepegawaian/laporan_penggajian', '', 3, 1),
(40, 7, 'Penjualan Formulir', 'ppdb/formulir_penjualan', '', 3, 1),
(41, 7, 'Laporan Penjualan', 'ppdb/laporan_penjualan', '', 8, 1),
(42, 7, 'Penjualan Formulir Batal', 'ppdb/formulir_penjualan_void', '', 9, 1),
(43, 11, 'API Public', 'api/apipublic', '', 1, 1),
(44, 6, 'Kelas', 'akademik/kelas', '', 10, 1),
(45, 6, 'Kelas Siswa', 'akademik/kelas_addsiswa', '', 12, 1),
(46, 6, 'Presensi Siswa', 'akademik/presensi_siswa', '', 13, 1),
(47, 6, 'Rekap Presensi Siswa', 'akademik/presensi_rekap_siswa', '', 14, 1),
(48, 6, 'Presensi perSiswa', 'akademik/presensi_persiswa', '', 15, 1),
(49, 7, 'Siswa Status', 'ppdb/siswastatus', '', 5, 1),
(50, 6, 'Jurusan', 'akademik/jurusan', '', 9, 1),
(51, 12, 'Kelompok Mapel', 'rapor/kelompok_mapel', '', 1, 1),
(52, 12, 'Mata Pelajaran', 'rapor/mapel', '', 2, 1),
(53, 12, 'Jadwal Pelajaran', 'rapor/jadwal_pelajaran', '', 3, 1),
(55, 12, 'Capaian Belajar', 'rapor/capaian_belajar', '', 5, 1),
(56, 12, 'Extrakulikuler', 'rapor/extrakulikuler', '', 7, 1),
(57, 12, 'Prestasi', 'rapor/prestasi', '', 8, 1),
(58, 12, 'Input Nilai', 'rapor/input_nilai', '', 9, 1),
(59, 12, 'Cetak Raport UTS', 'rapor/cetak_uts', '', 10, 1),
(60, 12, 'Cetak Raport', 'rapor/cetak_rapor', '', 11, 1),
(61, 12, 'Catatan WaliKelas', 'rapor/catatan_walikelas', '', 6, 1),
(62, 13, 'Profile', 'guru', '', 1, 1),
(63, 13, 'Capaian Belajar', 'guru/capaian_belajar', '', 2, 1),
(64, 13, 'Catatan WaliKelas', 'guru/catatan_walikelas', '', 3, 1),
(65, 13, 'Extrakulikuler', 'guru/extrakulikuler', '', 4, 1),
(66, 13, 'Prestasi', 'guru/prestasi', '', 5, 1),
(67, 13, 'Input Nilai', 'guru/input_nilai', '', 6, 1),
(68, 13, 'Cetak Raport UTS', 'guru/cetak_uts', '', 7, 1),
(69, 13, 'Cetak Raport', 'guru/cetak_rapor', '', 8, 1),
(70, 12, 'Cetak DKN', 'rapor/cetak_dkn', '', 12, 1),
(71, 7, 'Analisa PPDB', 'ppdb/analisa_ppdb', '', 11, 1),
(72, 6, 'Kegiatan Akademik', 'akademik/kegiatanakademik', '', 16, 1),
(73, 13, 'Kalender Kegiatan', 'guru/view_fullcalendar', '', 9, 1),
(74, 9, 'Kalender Kegiatan', 'siswa/view_fullcalendar', '', 4, 1),
(75, 6, 'Journal KBM', 'akademik/journalkbm', '', 17, 1),
(76, 13, 'Journal KBM', 'guru/journalkbm', '', 10, 1),
(77, 6, 'Rekap KBM', 'akademik/rekapkbm', '', 18, 1),
(78, 14, 'Gedung', 'sarpras/gedung', '', 1, 1),
(79, 14, 'Ruangan', 'sarpras/ruangan', '', 2, 1),
(80, 14, 'Sumber Dana', 'sarpras/sumberdana', '', 3, 1),
(81, 14, 'Nama Barang', 'sarpras/namabarang', '', 6, 1),
(82, 14, 'Kondisi Barang', 'sarpras/kondisi', '', 4, 1),
(83, 14, 'Inventaris', 'sarpras/inventaris', '', 7, 1),
(84, 14, 'Supplier', 'sarpras/supplier', '', 5, 1),
(85, 14, 'Mutasi Masuk', 'sarpras/mutasi_masuk', '', 8, 1),
(86, 14, 'Mutasi Keluar', 'sarpras/mutasi_keluar', '', 9, 1),
(87, 14, 'Laporan Mutasi', 'sarpras/laporan_mutasi', '', 10, 1),
(88, 14, 'Laporan Barang', 'sarpras/laporan_barang', '', 11, 1),
(89, 14, 'Rekap Barang', 'sarpras/rekap_barang', '', 12, 1),
(90, 14, 'Mutasi Rusak', 'sarpras/mutasi_rusak', '', 13, 1),
(91, 14, 'Laporan Mutasi Rusak', 'sarpras/laporan_mutasi_rusak', '', 14, 1),
(92, 14, 'Cetak Label', 'sarpras/cetak_label', '', 15, 1),
(94, 15, 'Surat Masuk', 'surat/surat_masuk', '', 2, 1),
(95, 15, 'Surat Keluar', 'surat/surat_keluar', '', 3, 1),
(96, 15, 'Surat Kode', 'surat/surat_kode', '', 1, 1),
(97, 16, 'BukuTamu', 'bukutamu', '', 1, 1),
(98, 16, 'Laporan BukuTamu', 'bukutamu/laporan_bukutamu', '', 2, 1),
(99, 17, 'Kategori Pelanggaran', 'bk/kategori_pelanggaran', '', 1, 1),
(100, 17, 'Pelanggaran', 'bk/pelanggaran', '', 2, 1),
(101, 17, 'Pelanggaran Siswa', 'bk/pelanggaran_siswa', '', 3, 1),
(104, 6, 'Siswa', 'akademik/siswa', '', 11, 1),
(105, 9, 'Pelanggaran', 'siswa/pelanggaran', '', 3, 1),
(106, 6, 'Ultah Siswa', 'akademik/ultah_siswa', '', 19, 1),
(107, 10, 'Ultah Pegawai', 'kepegawaian/ultah_pegawai', '', 4, 1),
(108, 18, 'Pemutihan Siswa', 'pemutihan/pemutihansiswa', '', 1, 1),
(109, 18, 'Pemutihan Siswa Batal', 'pemutihan/pemutihanvoid', '', 2, 1),
(110, 19, 'Aktifitas', 'log/aktifitas', '', 2, 1),
(111, 11, 'API Email', 'api/apiemail', '', 3, 1),
(112, 7, 'Siswa Berkas', 'ppdb/siswa_berkas', '', 12, 1),
(113, 17, 'Laporan Pelanggaran', 'bk/laporan_pelanggaran_tanggal', '', 4, 1),
(114, 17, 'Prestasi Siswa', 'bk/prestasi_siswa', '', 5, 1),
(115, 17, 'Laporan Prestasi Siswa', 'bk/laporan_prestasi_tanggal', '', 6, 1),
(116, 6, 'Ekstrakurikuler', 'akademik/ekstrakurikuler', '', 20, 1),
(117, 20, 'Pengumuman', 'marketing/pengumuman', '', 1, 1),
(118, 7, 'Preregistrasi', 'ppdb/preregistrasi', '', 2, 1),
(119, 7, 'Rapor', 'ppdb/rapor', '', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akad_journalkbm`
--
ALTER TABLE `akad_journalkbm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akad_kegiatanakademik`
--
ALTER TABLE `akad_kegiatanakademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akad_siswaabsenharian`
--
ALTER TABLE `akad_siswaabsenharian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akad_siswaabsenjournal`
--
ALTER TABLE `akad_siswaabsenjournal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apiemail`
--
ALTER TABLE `apiemail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apisms`
--
ALTER TABLE `apisms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk_kategori_pelanggaran`
--
ALTER TABLE `bk_kategori_pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk_pelanggaran`
--
ALTER TABLE `bk_pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk_siswapelanggaran`
--
ALTER TABLE `bk_siswapelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk_siswaprestasi`
--
ALTER TABLE `bk_siswaprestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk_tingkat`
--
ALTER TABLE `bk_tingkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_penggajian`
--
ALTER TABLE `hrd_penggajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_agama`
--
ALTER TABLE `m_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_apilist`
--
ALTER TABLE `m_apilist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_biaya`
--
ALTER TABLE `m_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_biaya_categories`
--
ALTER TABLE `m_biaya_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_carabayar`
--
ALTER TABLE `m_carabayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_ekstrakurikuler`
--
ALTER TABLE `m_ekstrakurikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_gelombang`
--
ALTER TABLE `m_gelombang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_gelombang_jalur`
--
ALTER TABLE `m_gelombang_jalur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_golongan`
--
ALTER TABLE `m_golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jalur`
--
ALTER TABLE `m_jalur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jalur_biaya`
--
ALTER TABLE `m_jalur_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jenisptk`
--
ALTER TABLE `m_jenisptk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_jurusan`
--
ALTER TABLE `m_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kelamin`
--
ALTER TABLE `m_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kelas`
--
ALTER TABLE `m_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kelas_siswa`
--
ALTER TABLE `m_kelas_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_logoslip`
--
ALTER TABLE `m_logoslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_options`
--
ALTER TABLE `m_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pendidikan`
--
ALTER TABLE `m_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pengumuman`
--
ALTER TABLE `m_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_sekolah`
--
ALTER TABLE `m_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_statuskeaktifan`
--
ALTER TABLE `m_statuskeaktifan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_statusnikah`
--
ALTER TABLE `m_statusnikah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_statuspegawai`
--
ALTER TABLE `m_statuspegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_tahunakademik`
--
ALTER TABLE `m_tahunakademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_berkas`
--
ALTER TABLE `ppdb_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_formulir`
--
ALTER TABLE `ppdb_formulir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_formulir_jual`
--
ALTER TABLE `ppdb_formulir_jual`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `ppdb_preregistrasi`
--
ALTER TABLE `ppdb_preregistrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_rapor`
--
ALTER TABLE `ppdb_rapor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_siswa`
--
ALTER TABLE `ppdb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_siswa_jalur`
--
ALTER TABLE `ppdb_siswa_jalur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_status`
--
ALTER TABLE `ppdb_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_status_anak`
--
ALTER TABLE `ppdb_status_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_status_ortu`
--
ALTER TABLE `ppdb_status_ortu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_catatan_walikelas`
--
ALTER TABLE `r_catatan_walikelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_jadwal_pelajaran`
--
ALTER TABLE `r_jadwal_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_kelompok_mapel`
--
ALTER TABLE `r_kelompok_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_mapel`
--
ALTER TABLE `r_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_nilai_extrakulikuler`
--
ALTER TABLE `r_nilai_extrakulikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_nilai_keterampilan`
--
ALTER TABLE `r_nilai_keterampilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_nilai_pengetahuan`
--
ALTER TABLE `r_nilai_pengetahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_nilai_prestasi`
--
ALTER TABLE `r_nilai_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_nilai_sikap_semester`
--
ALTER TABLE `r_nilai_sikap_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_siswa_masuk`
--
ALTER TABLE `r_siswa_masuk`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `sar_gedung`
--
ALTER TABLE `sar_gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sar_inventaris`
--
ALTER TABLE `sar_inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sar_kondisi`
--
ALTER TABLE `sar_kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sar_mutasi_barang`
--
ALTER TABLE `sar_mutasi_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sar_mutasi_rusak`
--
ALTER TABLE `sar_mutasi_rusak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sar_namabarang`
--
ALTER TABLE `sar_namabarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sar_ruangan`
--
ALTER TABLE `sar_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sar_sumberdana`
--
ALTER TABLE `sar_sumberdana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sar_supplier`
--
ALTER TABLE `sar_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa_bayar_batal`
--
ALTER TABLE `siswa_bayar_batal`
  ADD PRIMARY KEY (`id_master`);

--
-- Indexes for table `siswa_bayar_detail`
--
ALTER TABLE `siswa_bayar_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `siswa_bayar_master`
--
ALTER TABLE `siswa_bayar_master`
  ADD PRIMARY KEY (`id_master`);

--
-- Indexes for table `siswa_deviceid`
--
ALTER TABLE `siswa_deviceid`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `siswa_keterangan`
--
ALTER TABLE `siswa_keterangan`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `siswa_keuangan`
--
ALTER TABLE `siswa_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_sekolah`
--
ALTER TABLE `user_access_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `akad_journalkbm`
--
ALTER TABLE `akad_journalkbm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `akad_kegiatanakademik`
--
ALTER TABLE `akad_kegiatanakademik`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `akad_siswaabsenharian`
--
ALTER TABLE `akad_siswaabsenharian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `akad_siswaabsenjournal`
--
ALTER TABLE `akad_siswaabsenjournal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `apiemail`
--
ALTER TABLE `apiemail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `apisms`
--
ALTER TABLE `apisms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bk_kategori_pelanggaran`
--
ALTER TABLE `bk_kategori_pelanggaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bk_pelanggaran`
--
ALTER TABLE `bk_pelanggaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `bk_siswapelanggaran`
--
ALTER TABLE `bk_siswapelanggaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bk_siswaprestasi`
--
ALTER TABLE `bk_siswaprestasi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bk_tingkat`
--
ALTER TABLE `bk_tingkat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hrd_penggajian`
--
ALTER TABLE `hrd_penggajian`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_agama`
--
ALTER TABLE `m_agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_apilist`
--
ALTER TABLE `m_apilist`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_biaya`
--
ALTER TABLE `m_biaya`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_biaya_categories`
--
ALTER TABLE `m_biaya_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_carabayar`
--
ALTER TABLE `m_carabayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_ekstrakurikuler`
--
ALTER TABLE `m_ekstrakurikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_gelombang`
--
ALTER TABLE `m_gelombang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_gelombang_jalur`
--
ALTER TABLE `m_gelombang_jalur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_golongan`
--
ALTER TABLE `m_golongan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_jalur`
--
ALTER TABLE `m_jalur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_jalur_biaya`
--
ALTER TABLE `m_jalur_biaya`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_jenisptk`
--
ALTER TABLE `m_jenisptk`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_jurusan`
--
ALTER TABLE `m_jurusan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_kelamin`
--
ALTER TABLE `m_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_kelas`
--
ALTER TABLE `m_kelas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_kelas_siswa`
--
ALTER TABLE `m_kelas_siswa`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_logoslip`
--
ALTER TABLE `m_logoslip`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_options`
--
ALTER TABLE `m_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `m_pendidikan`
--
ALTER TABLE `m_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_pengumuman`
--
ALTER TABLE `m_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_statuskeaktifan`
--
ALTER TABLE `m_statuskeaktifan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_statusnikah`
--
ALTER TABLE `m_statusnikah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_statuspegawai`
--
ALTER TABLE `m_statuspegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_tahunakademik`
--
ALTER TABLE `m_tahunakademik`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ppdb_berkas`
--
ALTER TABLE `ppdb_berkas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ppdb_formulir`
--
ALTER TABLE `ppdb_formulir`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `ppdb_formulir_jual`
--
ALTER TABLE `ppdb_formulir_jual`
  MODIFY `id_nota` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ppdb_preregistrasi`
--
ALTER TABLE `ppdb_preregistrasi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ppdb_rapor`
--
ALTER TABLE `ppdb_rapor`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ppdb_siswa`
--
ALTER TABLE `ppdb_siswa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1832;

--
-- AUTO_INCREMENT for table `ppdb_siswa_jalur`
--
ALTER TABLE `ppdb_siswa_jalur`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ppdb_status`
--
ALTER TABLE `ppdb_status`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ppdb_status_anak`
--
ALTER TABLE `ppdb_status_anak`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ppdb_status_ortu`
--
ALTER TABLE `ppdb_status_ortu`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_catatan_walikelas`
--
ALTER TABLE `r_catatan_walikelas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `r_jadwal_pelajaran`
--
ALTER TABLE `r_jadwal_pelajaran`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `r_kelompok_mapel`
--
ALTER TABLE `r_kelompok_mapel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_mapel`
--
ALTER TABLE `r_mapel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_nilai_extrakulikuler`
--
ALTER TABLE `r_nilai_extrakulikuler`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `r_nilai_keterampilan`
--
ALTER TABLE `r_nilai_keterampilan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_nilai_pengetahuan`
--
ALTER TABLE `r_nilai_pengetahuan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `r_nilai_prestasi`
--
ALTER TABLE `r_nilai_prestasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_nilai_sikap_semester`
--
ALTER TABLE `r_nilai_sikap_semester`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `r_siswa_masuk`
--
ALTER TABLE `r_siswa_masuk`
  MODIFY `siswa_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sar_gedung`
--
ALTER TABLE `sar_gedung`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sar_inventaris`
--
ALTER TABLE `sar_inventaris`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sar_kondisi`
--
ALTER TABLE `sar_kondisi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sar_mutasi_barang`
--
ALTER TABLE `sar_mutasi_barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sar_mutasi_rusak`
--
ALTER TABLE `sar_mutasi_rusak`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sar_namabarang`
--
ALTER TABLE `sar_namabarang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sar_ruangan`
--
ALTER TABLE `sar_ruangan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sar_sumberdana`
--
ALTER TABLE `sar_sumberdana`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sar_supplier`
--
ALTER TABLE `sar_supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa_bayar_batal`
--
ALTER TABLE `siswa_bayar_batal`
  MODIFY `id_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `siswa_bayar_detail`
--
ALTER TABLE `siswa_bayar_detail`
  MODIFY `id_detail` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `siswa_bayar_master`
--
ALTER TABLE `siswa_bayar_master`
  MODIFY `id_master` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `siswa_keterangan`
--
ALTER TABLE `siswa_keterangan`
  MODIFY `siswa_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `siswa_keuangan`
--
ALTER TABLE `siswa_keuangan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_access_sekolah`
--
ALTER TABLE `user_access_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
