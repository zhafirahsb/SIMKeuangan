-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 03:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkeuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bos_realisasi_detail_komponen`
--

CREATE TABLE `bos_realisasi_detail_komponen` (
  `id_bos_realisasi_detail_komponen` int(11) NOT NULL,
  `relasi_id` int(11) NOT NULL,
  `no_kode` varchar(10) NOT NULL,
  `no_bukti` varchar(10) NOT NULL,
  `uraian` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('pengeluaran','pemasukan','','') DEFAULT NULL,
  `form` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_realisasi_detail_komponen`
--

INSERT INTO `bos_realisasi_detail_komponen` (`id_bos_realisasi_detail_komponen`, `relasi_id`, `no_kode`, `no_bukti`, `uraian`, `jumlah`, `tanggal`, `status`, `form`) VALUES
(1, 1, '0', '3', 'uraian', 300000, '2020-07-19', NULL, ''),
(2, 2, '', '', '', 0, '2020-07-09', NULL, ''),
(3, 3, '', '', '', 10000, '2020-07-26', NULL, ''),
(4, 4, '1', '001', 'beli atk', 320000, '2020-07-26', NULL, ''),
(5, 5, '123', '123', 'BUKU', 100000, '2020-07-26', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `bos_realisasi_komponen`
--

CREATE TABLE `bos_realisasi_komponen` (
  `id_bos_realisasi_komponen` varchar(8) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_realisasi_komponen`
--

INSERT INTO `bos_realisasi_komponen` (`id_bos_realisasi_komponen`, `nama_program`) VALUES
('1', 'Pengembangan Perpustakaan'),
('10', 'Membantu Siswa Miskin'),
('11', 'Pembiayaan Pengeloaan BOS'),
('12', 'Pembelian Perangkat Komputer'),
('13', 'Biaya Lainnya Jika Komponen 1 s.d. 12 telah terpenuhi'),
('2', 'Kegiatan Penerimaan Siswa Baru'),
('3', 'Kegiatan Pembelajaran dan Eskul Siswa'),
('4', 'Pembelian Bahan Habis Pakai'),
('5', 'Langganan Daya dan Jasa'),
('7', 'Perawatan Sekolah'),
('8', 'Pembayaran Honorium Bulanan Guru Honorer dan Tenaga Pendidikan Honorer'),
('9', 'Pengembangan Profesi Guru');

-- --------------------------------------------------------

--
-- Table structure for table `bos_realisasi_pendapatan`
--

CREATE TABLE `bos_realisasi_pendapatan` (
  `id_bos_realisasi_pendapatan` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `nominal` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_realisasi_pendapatan`
--

INSERT INTO `bos_realisasi_pendapatan` (`id_bos_realisasi_pendapatan`, `tahun`, `nominal`) VALUES
(1, '2017', 2900005),
(2, '2017', 3500),
(3, '2017', 1000),
(10, '', 256500);

-- --------------------------------------------------------

--
-- Table structure for table `bos_realisasi_rekapitulasi`
--

CREATE TABLE `bos_realisasi_rekapitulasi` (
  `id_bos_realisasi_rekapitulasi` int(11) NOT NULL,
  `idsnp` varchar(8) DEFAULT NULL,
  `sub_program_id` varchar(8) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `tahun_ajaran` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_realisasi_rekapitulasi`
--

INSERT INTO `bos_realisasi_rekapitulasi` (`id_bos_realisasi_rekapitulasi`, `idsnp`, `sub_program_id`, `saldo`, `tahun_ajaran`, `id_user`, `dibuat_tanggal`) VALUES
(1, '2', '11', NULL, NULL, NULL, '2020-07-20 07:17:22'),
(2, '1', '1', NULL, NULL, NULL, '2020-07-20 07:17:22'),
(3, '3', '4', NULL, '0000-00-00', 3, '2020-07-26 00:00:00'),
(4, '2', '12', NULL, '0000-00-00', 3, '2020-07-26 00:00:00'),
(5, '2', '11', NULL, '0000-00-00', 3, '2020-07-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bos_rkas`
--

CREATE TABLE `bos_rkas` (
  `id_bos_rkas` int(11) NOT NULL,
  `npsn` varchar(8) DEFAULT NULL,
  `sub_program` varchar(200) DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tipe` enum('pendapatan','belanja','','') NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_rkas`
--

INSERT INTO `bos_rkas` (`id_bos_rkas`, `npsn`, `sub_program`, `tahun_ajaran`, `id_user`, `tipe`, `dibuat_tanggal`) VALUES
(20, '1', 'Pencapaian Akademis Peserta Didik', '2017', NULL, 'belanja', '0000-00-00 00:00:00'),
(21, '1', 'Pengembangan Potensi Peserta Didik', '2017', NULL, 'belanja', '2020-07-18 22:42:49'),
(22, NULL, NULL, '', NULL, 'pendapatan', '2020-07-18 22:44:57'),
(23, '3', 'Rencana Relevansi dan Kesesuaian Silabus', '2017', NULL, 'belanja', '2020-07-19 05:36:09'),
(24, '3', 'Rencana Pelaksanaan Pembelajaran Efektif', '2017', NULL, 'belanja', '2020-07-19 05:42:37'),
(25, '4', 'test aghni', '2017', NULL, 'belanja', '2020-07-29 14:58:31'),
(26, NULL, NULL, '', NULL, '', '2020-07-29 15:05:56'),
(28, NULL, NULL, '', NULL, '', '2020-07-29 15:06:58'),
(30, NULL, NULL, '', NULL, '', '2020-07-29 15:09:02'),
(32, NULL, NULL, '2017', NULL, 'belanja', '2020-07-29 15:09:26'),
(33, '1', 'test aghni', '2017', NULL, 'belanja', '2020-07-29 15:09:26'),
(34, NULL, NULL, '2017', NULL, 'belanja', '2020-07-29 15:15:20'),
(35, '1', 'test aghni', '2017', NULL, 'belanja', '2020-07-29 15:15:20'),
(36, NULL, NULL, '', NULL, '', '2020-07-29 15:16:03'),
(38, NULL, NULL, '', NULL, '', '2020-07-29 15:16:19'),
(40, NULL, NULL, '2017', NULL, 'belanja', '2020-07-29 15:16:40'),
(41, '1', 'test aghni 2', '2017', NULL, 'belanja', '2020-07-29 15:16:40'),
(42, NULL, NULL, '2017', NULL, 'belanja', '2020-07-29 15:18:08'),
(43, '1', 'test aghni 3', '2017', NULL, 'belanja', '2020-07-29 15:18:08'),
(44, NULL, NULL, '2017', NULL, 'belanja', '2020-07-29 15:19:10'),
(45, '1', 'test aghni 3', '2017', NULL, 'belanja', '2020-07-29 15:19:10'),
(46, '2', 'test aghni 4', '2017', NULL, 'belanja', '2020-07-29 15:20:32'),
(47, NULL, NULL, '', NULL, '', '2020-07-29 15:22:59'),
(49, NULL, NULL, '2017', NULL, 'belanja', '2020-07-29 15:23:35'),
(50, '2', 'test aghni 5', '2017', NULL, 'belanja', '2020-07-29 15:23:35'),
(51, NULL, NULL, '2017', NULL, 'pendapatan', '2020-07-29 15:24:03'),
(53, NULL, NULL, '', NULL, 'pendapatan', '2020-07-29 15:25:23'),
(54, NULL, NULL, '2017', NULL, 'pendapatan', '2020-07-29 15:26:39'),
(55, NULL, NULL, '2017', NULL, 'belanja', '2020-07-29 15:27:05'),
(56, NULL, NULL, '', NULL, '', '2020-07-29 15:31:03'),
(57, NULL, NULL, '', NULL, '', '2020-07-29 15:31:53'),
(58, NULL, NULL, '2017', NULL, 'pendapatan', '2020-07-29 15:32:08'),
(59, NULL, NULL, '2017', NULL, 'pendapatan', '2020-07-29 15:34:21'),
(61, NULL, NULL, '2018', NULL, 'pendapatan', '2020-07-29 15:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `bos_rkas_detail`
--

CREATE TABLE `bos_rkas_detail` (
  `id_bos_rkas_detail` int(11) NOT NULL,
  `bos_rkas` int(11) NOT NULL,
  `no_kode` varchar(10) NOT NULL,
  `uraian` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `form` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_rkas_detail`
--

INSERT INTO `bos_rkas_detail` (`id_bos_rkas_detail`, `bos_rkas`, `no_kode`, `uraian`, `jumlah`, `tanggal`, `form`) VALUES
(9, 20, '0110104', 'Pelaksanaan Uji Coba UASBN/UN Tk. Kota', 14292000, '0000-00-00', ''),
(10, 21, '010209', 'Pengayaan Mata Pelajaran Ujian Nasional', 24960000, '0000-00-00', ''),
(11, 22, '', '', 212262882, '0000-00-00', ''),
(12, 23, '-', '-', 0, '0000-00-00', ''),
(13, 24, '030671', 'Penaggungjawab Program Ekstrakurikuler', 1500000, '0000-00-00', ''),
(14, 24, '030672', 'Penyususan Program Ekstrakurikuler', 1500000, '0000-00-00', ''),
(15, 24, '030673', 'Pelaksananaan Ekstrakurikuler Kepramukaan/Hizbul Wathan', 3500000, '0000-00-00', ''),
(16, 24, '030674', 'Pelaksananaan Ekstrakurikuler Kesenian', 6540000, '0000-00-00', ''),
(17, 24, '030675', 'Pelaksananaan Ekstrakurikuler Olah Raga (Pencak Silat)', 3750000, '0000-00-00', ''),
(18, 24, '030677', 'Pelaksananaan Pendidikan Lingkungan Hidup', 2200000, '0000-00-00', ''),
(19, 24, '030681', 'Pelaksananaan Ekstrakurikuler Drum Band', 4300000, '0000-00-00', ''),
(20, 25, '00001', 'test aghni', 190000, '0000-00-00', ''),
(36, 46, '101', 'test aghni 4', 88888, '0000-00-00', ''),
(41, 53, '', '', 1995, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `bos_rkas_rencana`
--

CREATE TABLE `bos_rkas_rencana` (
  `id_bos_rkas_detail` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `dana_siswa` int(11) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_rkas_rencana`
--

INSERT INTO `bos_rkas_rencana` (`id_bos_rkas_detail`, `tahun`, `jumlah_siswa`, `dana_siswa`, `tanggal_dibuat`, `id_user`) VALUES
(13, '2017', 34, 100000, '2020-07-18 21:10:49', NULL),
(14, '2017', 25, 1100000, '2020-07-26 17:43:49', NULL),
(15, '2018', 24, 1100000, '2020-07-26 17:46:28', NULL),
(16, '2018', 315, 110000, '2020-07-29 11:18:55', NULL),
(17, '2018', 11, 1111, '2020-07-29 12:03:19', NULL),
(18, '2017', 1, 1, '2020-07-29 12:48:54', NULL),
(19, '2017', 1, 1, '2020-07-29 12:49:53', NULL),
(20, '', 0, 0, '2020-07-29 12:50:13', NULL),
(21, '', 0, 0, '2020-07-29 13:04:31', NULL),
(22, '', 0, 0, '2020-07-29 13:05:39', NULL),
(23, '', 0, 0, '2020-07-29 13:05:41', NULL),
(24, '', 0, 0, '2020-07-29 13:18:41', NULL),
(25, '', 0, 0, '2020-07-29 13:21:52', NULL),
(26, '', 0, 0, '2020-07-29 14:55:59', NULL),
(27, '', 0, 0, '2020-07-29 14:56:54', NULL),
(28, '', 0, 0, '2020-07-29 14:56:58', NULL),
(29, '', 0, 0, '2020-07-29 14:57:02', NULL),
(30, '', 0, 0, '2020-07-29 14:57:03', NULL),
(31, '', 0, 0, '2020-07-29 15:05:54', NULL),
(32, '', 0, 0, '2020-07-29 15:16:01', NULL),
(33, '', 0, 0, '2020-07-29 15:16:09', NULL),
(34, '', 0, 0, '2020-07-29 15:19:45', NULL),
(35, '', 0, 0, '2020-07-29 15:19:46', NULL),
(36, '', 0, 0, '2020-07-29 15:22:57', NULL),
(37, '', 0, 0, '2020-07-29 17:58:37', NULL),
(38, '', 0, 0, '2020-07-29 17:58:39', NULL),
(39, '', 0, 0, '2020-07-29 17:58:40', NULL),
(40, '', 0, 0, '2020-07-29 17:58:42', NULL),
(41, '', 0, 0, '2020-07-29 17:58:43', NULL),
(42, '', 0, 0, '2020-07-29 17:58:46', NULL),
(43, '', 0, 0, '2020-07-29 17:58:48', NULL),
(44, '', 0, 0, '2020-07-29 17:58:53', NULL),
(45, '', 0, 0, '2020-07-29 17:59:57', NULL),
(46, '', 0, 0, '2020-07-29 17:59:59', NULL),
(47, '', 0, 0, '2020-07-29 18:00:03', NULL),
(48, '', 0, 0, '2020-07-29 18:00:05', NULL),
(49, '', 0, 0, '2020-07-29 18:00:54', NULL),
(50, '', 0, 0, '2020-07-29 18:04:09', NULL),
(51, '', 0, 0, '2020-07-29 20:59:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jabatan`
--

CREATE TABLE `tbl_detail_jabatan` (
  `id_detail_jabatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`, `id_user`) VALUES
(1, 'Guru Tetap', NULL),
(2, 'Guru Tidak Tetap', NULL),
(3, 'Guru DPK', NULL),
(4, 'pegawai', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `jabatan_id` int(5) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tahun_masuk` int(4) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `jabatan_id`, `nama`, `tahun_masuk`, `status`) VALUES
(1, 1, 'Siti Arfa Nasution', 2014, '1'),
(2, 1, 'Nurhasanah Lubis', 2014, '1'),
(3, 1, 'Winda Riati', 2013, '1'),
(4, 1, 'Rahmawati', 2009, '1'),
(5, 1, 'Irnawati', 2009, '1'),
(6, 1, 'Derita Meiniarty', 2009, '1'),
(7, 1, 'Halimah', 2010, '1'),
(8, 1, 'Maznun Hafni', 2006, '1'),
(9, 1, 'Agus Purwanto', 2005, '1'),
(10, 1, 'Zikri', 2003, '1'),
(11, 2, 'Kirno Wahyudi', 2015, '1'),
(12, 2, 'Septiadi Siallagan', 2015, '1'),
(13, 2, 'M. Syafii', 2016, '1'),
(14, 2, 'Maya Sari Sinaga', 2016, '1'),
(15, 2, 'Muhammad Nasrul', 2009, '1'),
(16, 2, 'Zulkarnain', 2009, '1'),
(17, 2, 'Enok Pudjiarti', 2010, '1'),
(18, 3, 'Hasanal Fauzi', 2011, '1'),
(19, 3, 'Juni Animah', 2013, '1'),
(20, 3, 'Marintan Lubis', 2013, '1'),
(21, 4, 'Yogo Soedarmono', 2008, '1'),
(22, 4, 'Aslian', 2007, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_standar_nasional`
--

CREATE TABLE `tbl_standar_nasional` (
  `idsnp` varchar(8) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL,
  `persentase` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_standar_nasional`
--

INSERT INTO `tbl_standar_nasional` (`idsnp`, `nama_program`, `persentase`) VALUES
('1', 'Pengembangan Kompetensi Lulusan', 0),
('2', 'Pengembangan Standar Isi', 0),
('3', 'Pengembangan Standar Proses', 0),
('4', 'Pengembangan Pendidikan dan Tenaga Kependidikan', 0),
('5', 'Pengembangan Sarana dan Prasaran Sekolah', 0),
('6', 'Pengembangan Standar Pengelolaan', 0),
('7', 'Pengembangan Standar Pembiayaan', 0),
('8', 'Pengembangan dan Implementasi Sistem Penilaian', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','Bendahara Yayasan','Tata Usaha','Yayasan','Kepala Sekolah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin'),
(2, 'bendahara', '8cf55b8ae912bbfec560427ce8a2f296bf3ac972', 'Bendahara Yayasan'),
(3, 'tu', 'a3da4c6307d230e1f1c8ad62e00d05ff1f1f5b52', 'Tata Usaha'),
(4, 'yayasan', '23349438310fbf6efb8579094440db66533a9dfc', 'Yayasan'),
(5, 'kepala', '4efd7c429ad4cdab5c08c3e742445ec0f1ace4bb', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `yayasan_detail_rencana_pengeluaran`
--

CREATE TABLE `yayasan_detail_rencana_pengeluaran` (
  `id_yayasan_detail_rencana_pengeluaran` int(11) NOT NULL,
  `id_rencana_pengeluaran` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `masa_kerja` varchar(100) DEFAULT NULL,
  `nilai_satuan` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `nilai_volume` int(11) NOT NULL,
  `volume` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yayasan_detail_rencana_pengeluaran`
--

INSERT INTO `yayasan_detail_rencana_pengeluaran` (`id_yayasan_detail_rencana_pengeluaran`, `id_rencana_pengeluaran`, `tahun`, `uraian`, `masa_kerja`, `nilai_satuan`, `satuan`, `nilai_volume`, `volume`, `jumlah`, `total`) VALUES
(1, 1, 2017, 'Siti Arfa ', 'Masa Kerja 1 - 5 Tahun', 28, 'jam', 12, 'bulan', 0, 0),
(2, 1, 2017, 'Nurhasanah Lubis', 'Masa Kerja 1 - 5 Tahun', 28, 'jam', 12, 'bulan', 0, 0),
(3, 1, 2017, 'Winda Riati', 'Masa Kerja 1 - 5 Tahun', 26, 'jam', 12, 'bulan', 0, 0),
(4, 1, 2017, 'Rahmawati', 'Masa Kerja 5 - 9 Tahun', 32, 'jam', 12, 'bulan', 0, 0),
(8, 1, 2017, 'Irnawati', 'Masa Kerja 5 - 9 Tahun', 28, 'jam', 12, 'bulan', 0, 0),
(9, 1, 2017, 'Derita Meiniarti', 'Masa Kerja 5 - 9 Tahun', 32, 'jam', 12, 'bulan', 0, 0),
(10, 1, 2017, 'Halimah', 'Masa Kerja 5 - 9 Tahun', 27, 'jam', 12, 'bulan', 0, 0),
(11, 1, 2017, 'Maznun Hafni', 'Masa Kerja 9 - 13 Tahun', 29, 'jam', 12, 'bulan', 0, 0),
(12, 1, 2017, 'Agus Purwanto', 'Masa Kerja 9 - 13 Tahun', 25, 'jam', 12, 'bulan', 0, 0),
(13, 1, 2017, 'Zikri', 'Masa Kerja 13 Tahun - Dst', 26, 'jam', 12, 'bulan', 0, 0),
(14, 2, 2017, 'Kirno Wahyudi', 'Masa Kerja 0 - 1 Tahun', 30, 'jam', 12, 'bulan', 0, 0),
(15, 2, 2017, 'Septiadi Siallagan', 'Masa Kerja 0 - 1 Tahun', 22, 'jam', 12, 'bulan', 0, 0),
(16, 2, 2017, 'M. Safii', 'Masa Kerja 0 - 1 Tahun', 30, 'jam', 12, 'bulan', 0, 0),
(17, 2, 2017, 'Maya Sari Sinaga', 'Masa Kerja 0 - 1 Tahun', 26, 'jam', 12, 'bulan', 0, 0),
(18, 2, 2017, 'Muhammad Nasrul', 'Masa Kerja 5 - 9 Tahun', 15, 'jam', 12, 'bulan', 0, 0),
(19, 2, 2017, 'Zulkarnain', 'Masa Kerja 5 - 9 Tahun', 12, 'jam', 12, 'bulan', 0, 0),
(20, 2, 2017, 'Enok Pudjiarti', 'Masa Kerja 5 - 9 Tahun', 12, 'jam', 12, 'bulan', 0, 0),
(21, 3, 2017, 'Hasanal Fauzi', NULL, 24, 'jam', 12, 'bulan', 0, 0),
(22, 3, 2017, 'Juni Aninah', NULL, 24, 'jam', 12, 'bulan', 0, 0),
(23, 3, 2017, 'Marintan Lubis', NULL, 24, 'jam', 12, 'bulan', 0, 0),
(26, 4, 2017, 'Tunjangan Kasek', NULL, 1, 'orang', 12, 'bulan', 0, 0),
(27, 4, 2017, 'Tunjangan Wakasek', NULL, 2, 'orang', 12, 'bulan', 0, 0),
(28, 4, 2017, 'Tunjangan Wali Kelas', NULL, 11, 'orang', 12, 'bulan', 0, 0),
(29, 5, 2017, 'Yogo Soedarmono', NULL, 1, 'orang', 12, 'bulan', 0, 0),
(30, 5, 2017, 'Aslian', NULL, 1, 'orang', 12, 'bulan', 0, 0),
(31, 6, 2017, 'Bantuan Sosial Siswa', NULL, 0, '', 0, '', 0, 0),
(32, 6, 2017, 'Bantuan Hadiah', NULL, 0, '', 0, '', 0, 0),
(33, 6, 2017, 'BPJS Kesehatan Kasek', NULL, 1, 'orang', 12, 'bulan', 0, 0),
(34, 6, 2017, 'BPJS Kesehatan Guru', NULL, 10, 'orang', 12, 'bulan', 0, 0),
(35, 6, 2017, 'BPJS Ketenagakerjaan', NULL, 9, 'orang', 12, 'bulan', 0, 0),
(36, 6, 2017, 'Seragam', NULL, 23, 'orang', 1, 'tahun', 0, 0),
(37, 6, 2017, 'THR', NULL, 23, 'orang', 1, 'tahun', 0, 0),
(38, 6, 2018, 'Seragam', NULL, 1, 'siswa', 1, 'bulan', 1000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `yayasan_penerimaan_spp`
--

CREATE TABLE `yayasan_penerimaan_spp` (
  `id_yayasan_penerimaan_spp` int(11) NOT NULL,
  `uraian` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yayasan_penerimaan_spp`
--

INSERT INTO `yayasan_penerimaan_spp` (`id_yayasan_penerimaan_spp`, `uraian`, `total`, `tanggal`, `id_user`, `dibuat_tanggal`) VALUES
(17, 'SPP Juli', 1450000, '2020-07-01', 2, '2020-07-01 18:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `yayasan_realisasi_pemasukan_pengeluaran`
--

CREATE TABLE `yayasan_realisasi_pemasukan_pengeluaran` (
  `id_yayasan_realisasi_pemasukan_pengeluaran` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yayasan_realisasi_pemasukan_pengeluaran`
--

INSERT INTO `yayasan_realisasi_pemasukan_pengeluaran` (`id_yayasan_realisasi_pemasukan_pengeluaran`, `uraian`, `tanggal`, `jumlah`, `id_user`, `dibuat_tanggal`) VALUES
(1, 'Ini', '2020-07-10', 3000000, NULL, '2020-07-24 23:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `yayasan_rencana_pendapatan`
--

CREATE TABLE `yayasan_rencana_pendapatan` (
  `id_yayasan_rencana_pendapatan` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `jumlah_iuran` int(11) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yayasan_rencana_pendapatan`
--

INSERT INTO `yayasan_rencana_pendapatan` (`id_yayasan_rencana_pendapatan`, `tahun`, `keterangan`, `jumlah_siswa`, `jumlah_iuran`, `dibuat_tanggal`, `id_user`) VALUES
(4, '2017', 'Uang Iuran Sekolah Kelas VII - IX', 0, 423000000, '2020-07-19 08:34:05', NULL),
(5, '2017', 'Bayar Penuh', 330, 100000, '2020-07-19 08:37:09', NULL),
(6, '2017', 'Anak Yatim', 25, 90000, '2020-07-19 08:39:47', NULL),
(7, '2017', 'Anak Guru', 7, 0, '2020-07-19 08:40:11', NULL),
(8, '2019', 'anak guru', 15, 0, '2020-07-26 17:41:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yayasan_rencana_pengeluaran`
--

CREATE TABLE `yayasan_rencana_pengeluaran` (
  `id_yayasan_rencana_pengeluaran` int(11) NOT NULL,
  `no_kode` varchar(10) DEFAULT NULL,
  `jenis_biaya` varchar(100) NOT NULL,
  `sub_jenis_biaya` varchar(100) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yayasan_rencana_pengeluaran`
--

INSERT INTO `yayasan_rencana_pengeluaran` (`id_yayasan_rencana_pengeluaran`, `no_kode`, `jenis_biaya`, `sub_jenis_biaya`, `dibuat_tanggal`) VALUES
(1, '1.1', 'Biaya Gaji / Honor\r\n', 'Honor Guru Tetap\r\n', '0000-00-00 00:00:00'),
(2, '1.2', 'Biaya Gaji / Honor\r\n', 'Honor Guru Tidak Tetap\r\n', '0000-00-00 00:00:00'),
(3, '1.3', 'Biaya Gaji / Honor\r\n', 'Honor Guru DPK\r\n', '0000-00-00 00:00:00'),
(4, '1.6', 'Biaya Gaji / Honor\r\n', 'Tunjangan', '0000-00-00 00:00:00'),
(5, '1.7', 'Biaya Gaji / Honor\r\n', 'Honor Pegawai\r\n', '0000-00-00 00:00:00'),
(6, NULL, 'Biaya Bantuan', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bos_realisasi_detail_komponen`
--
ALTER TABLE `bos_realisasi_detail_komponen`
  ADD PRIMARY KEY (`id_bos_realisasi_detail_komponen`),
  ADD KEY `relasi_id` (`relasi_id`);

--
-- Indexes for table `bos_realisasi_komponen`
--
ALTER TABLE `bos_realisasi_komponen`
  ADD PRIMARY KEY (`id_bos_realisasi_komponen`);

--
-- Indexes for table `bos_realisasi_pendapatan`
--
ALTER TABLE `bos_realisasi_pendapatan`
  ADD PRIMARY KEY (`id_bos_realisasi_pendapatan`);

--
-- Indexes for table `bos_realisasi_rekapitulasi`
--
ALTER TABLE `bos_realisasi_rekapitulasi`
  ADD PRIMARY KEY (`id_bos_realisasi_rekapitulasi`),
  ADD KEY `idsnp` (`idsnp`),
  ADD KEY `sub_program_id` (`sub_program_id`),
  ADD KEY `saldo` (`saldo`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `bos_rkas`
--
ALTER TABLE `bos_rkas`
  ADD PRIMARY KEY (`id_bos_rkas`),
  ADD KEY `pengeluaran_rkas_id` (`npsn`),
  ADD KEY `sub_program_id` (`sub_program`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `bos_rkas_detail`
--
ALTER TABLE `bos_rkas_detail`
  ADD PRIMARY KEY (`id_bos_rkas_detail`),
  ADD KEY `bos_rkas` (`bos_rkas`);

--
-- Indexes for table `bos_rkas_rencana`
--
ALTER TABLE `bos_rkas_rencana`
  ADD PRIMARY KEY (`id_bos_rkas_detail`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_detail_jabatan`
--
ALTER TABLE `tbl_detail_jabatan`
  ADD PRIMARY KEY (`id_detail_jabatan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indexes for table `tbl_standar_nasional`
--
ALTER TABLE `tbl_standar_nasional`
  ADD PRIMARY KEY (`idsnp`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `yayasan_detail_rencana_pengeluaran`
--
ALTER TABLE `yayasan_detail_rencana_pengeluaran`
  ADD PRIMARY KEY (`id_yayasan_detail_rencana_pengeluaran`),
  ADD KEY `id_rencana_pengeluaran` (`id_rencana_pengeluaran`),
  ADD KEY `nama_guru_pegawai` (`uraian`);

--
-- Indexes for table `yayasan_penerimaan_spp`
--
ALTER TABLE `yayasan_penerimaan_spp`
  ADD PRIMARY KEY (`id_yayasan_penerimaan_spp`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `yayasan_realisasi_pemasukan_pengeluaran`
--
ALTER TABLE `yayasan_realisasi_pemasukan_pengeluaran`
  ADD PRIMARY KEY (`id_yayasan_realisasi_pemasukan_pengeluaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `yayasan_rencana_pendapatan`
--
ALTER TABLE `yayasan_rencana_pendapatan`
  ADD PRIMARY KEY (`id_yayasan_rencana_pendapatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `yayasan_rencana_pengeluaran`
--
ALTER TABLE `yayasan_rencana_pengeluaran`
  ADD PRIMARY KEY (`id_yayasan_rencana_pengeluaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bos_realisasi_detail_komponen`
--
ALTER TABLE `bos_realisasi_detail_komponen`
  MODIFY `id_bos_realisasi_detail_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bos_realisasi_pendapatan`
--
ALTER TABLE `bos_realisasi_pendapatan`
  MODIFY `id_bos_realisasi_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bos_realisasi_rekapitulasi`
--
ALTER TABLE `bos_realisasi_rekapitulasi`
  MODIFY `id_bos_realisasi_rekapitulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bos_rkas`
--
ALTER TABLE `bos_rkas`
  MODIFY `id_bos_rkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `bos_rkas_detail`
--
ALTER TABLE `bos_rkas_detail`
  MODIFY `id_bos_rkas_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `bos_rkas_rencana`
--
ALTER TABLE `bos_rkas_rencana`
  MODIFY `id_bos_rkas_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_detail_jabatan`
--
ALTER TABLE `tbl_detail_jabatan`
  MODIFY `id_detail_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yayasan_detail_rencana_pengeluaran`
--
ALTER TABLE `yayasan_detail_rencana_pengeluaran`
  MODIFY `id_yayasan_detail_rencana_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `yayasan_penerimaan_spp`
--
ALTER TABLE `yayasan_penerimaan_spp`
  MODIFY `id_yayasan_penerimaan_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `yayasan_realisasi_pemasukan_pengeluaran`
--
ALTER TABLE `yayasan_realisasi_pemasukan_pengeluaran`
  MODIFY `id_yayasan_realisasi_pemasukan_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yayasan_rencana_pendapatan`
--
ALTER TABLE `yayasan_rencana_pendapatan`
  MODIFY `id_yayasan_rencana_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `yayasan_rencana_pengeluaran`
--
ALTER TABLE `yayasan_rencana_pengeluaran`
  MODIFY `id_yayasan_rencana_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bos_realisasi_detail_komponen`
--
ALTER TABLE `bos_realisasi_detail_komponen`
  ADD CONSTRAINT `bos_realisasi_detail_komponen_ibfk_1` FOREIGN KEY (`relasi_id`) REFERENCES `bos_realisasi_rekapitulasi` (`id_bos_realisasi_rekapitulasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bos_realisasi_rekapitulasi`
--
ALTER TABLE `bos_realisasi_rekapitulasi`
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_1` FOREIGN KEY (`idsnp`) REFERENCES `tbl_standar_nasional` (`idsnp`),
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_2` FOREIGN KEY (`sub_program_id`) REFERENCES `bos_realisasi_komponen` (`id_bos_realisasi_komponen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_3` FOREIGN KEY (`saldo`) REFERENCES `bos_realisasi_pendapatan` (`id_bos_realisasi_pendapatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bos_rkas`
--
ALTER TABLE `bos_rkas`
  ADD CONSTRAINT `bos_rkas_ibfk_3` FOREIGN KEY (`npsn`) REFERENCES `tbl_standar_nasional` (`idsnp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_rkas_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bos_rkas_detail`
--
ALTER TABLE `bos_rkas_detail`
  ADD CONSTRAINT `bos_rkas_detail_ibfk_1` FOREIGN KEY (`bos_rkas`) REFERENCES `bos_rkas` (`id_bos_rkas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bos_rkas_rencana`
--
ALTER TABLE `bos_rkas_rencana`
  ADD CONSTRAINT `bos_rkas_rencana_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_jabatan`
--
ALTER TABLE `tbl_detail_jabatan`
  ADD CONSTRAINT `tbl_detail_jabatan_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_jabatan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD CONSTRAINT `tbl_jabatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `tbl_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yayasan_detail_rencana_pengeluaran`
--
ALTER TABLE `yayasan_detail_rencana_pengeluaran`
  ADD CONSTRAINT `yayasan_detail_rencana_pengeluaran_ibfk_1` FOREIGN KEY (`id_rencana_pengeluaran`) REFERENCES `yayasan_rencana_pengeluaran` (`id_yayasan_rencana_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yayasan_penerimaan_spp`
--
ALTER TABLE `yayasan_penerimaan_spp`
  ADD CONSTRAINT `yayasan_penerimaan_spp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yayasan_realisasi_pemasukan_pengeluaran`
--
ALTER TABLE `yayasan_realisasi_pemasukan_pengeluaran`
  ADD CONSTRAINT `yayasan_realisasi_pemasukan_pengeluaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yayasan_rencana_pendapatan`
--
ALTER TABLE `yayasan_rencana_pendapatan`
  ADD CONSTRAINT `yayasan_rencana_pendapatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
