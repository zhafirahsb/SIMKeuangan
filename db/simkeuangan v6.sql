-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 01:41 AM
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
  `form` varchar(5) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_realisasi_detail_komponen`
--

INSERT INTO `bos_realisasi_detail_komponen` (`id_bos_realisasi_detail_komponen`, `relasi_id`, `no_kode`, `no_bukti`, `uraian`, `jumlah`, `tanggal`, `status`, `form`, `foto`) VALUES
(10, 2, '0516157', 'K-001/BOS', 'Pembayaran Biaya Pembelian Bahan Pembuatan Lemari Gantung Laboratorium Komputer', 979000, '2017-03-14', NULL, '', ''),
(11, 2, '0516157', 'H-001/BOS', 'Pembayaran Biaya Upah Tukang Pembuatan Lemari Gantung Laboratorium Komputer', 1500000, '2017-03-18', NULL, '', ''),
(12, 2, '0516155', 'K-002/BOS', 'Pembayaran Biaya Pembelian Bahan Pengecatan Ruang Kelas', 956000, '2017-03-18', NULL, '', ''),
(13, 2, '0516155', 'H-002/BOS', 'Pembayaran Biaya Upah Tukang Pengecatan Ruang Kelas', 750000, '2017-03-21', NULL, '', ''),
(14, 2, '0516157', 'K-003/BOS', 'Pembayaran Biaya Pembelian Bahan Pemasangan Jendela Kaca Lab.Komputer', 990000, '2017-03-22', NULL, '', ''),
(15, 2, '0516157', 'H-003/BOS', 'Pembayaran Biaya Upah Tukang Pemasangan Jendela Kaca Lab.Komputer', 1125000, '2017-03-24', NULL, '', ''),
(16, 2, '0516157', 'H-004/BOS', 'Pembayaran Biaya Upah Perbaikan Daun Pintu dan Pemasangan Pintu Besi Lab.Komputer ', 200000, '2017-03-25', NULL, '', ''),
(17, 2, '0516157', 'K-004/BOS', 'Pembayaran Biaya Penempahan Pintu Besi Lab.Komputer ', 1500000, '2017-03-25', NULL, '', ''),
(18, 3, '010213', 'H-001', 'Pembayaran Honor Pembimbing Les Tambahan Sore Hari Pembelajaran Pengayaan\r\n', 9600000, '2017-04-07', NULL, '', ''),
(22, 5, '030662', 'H-002', 'Pembayaran Honor Pelatih Kegiatan Ekstrakurikuler Kesenian Januari s.d Maret 2017', 2400000, '2017-04-07', NULL, '', ''),
(23, 5, '030661', 'H-003', 'Pembayaran Honor Pelatih Kegiatan Ekstrakurikuler Hizbul Wathan Januari s.d Maret 2017', 1400000, '2017-04-07', NULL, '', ''),
(24, 5, '030678', 'H-004', 'Pembayaran Honor Pelatih Kegiatan Ekstrakurikuler Lingkungan Hidup  Januari s.d Maret 2017', 2100000, '2017-04-07', NULL, '', ''),
(25, 6, '020423', 'H-005', 'Pembayaran Honor Koordinator Penyusunan Program Semua  Kegiatan Ekstrakurikuler ', 750000, '2017-04-07', NULL, '', ''),
(26, 6, '020423', 'H-006', 'Pembayaran Honor Penanggungjawab Program Semua Kegiatan  Ekstrakurikuler', 750000, '2017-04-07', NULL, '', ''),
(27, 5, '030663', 'H-007', 'Pembayaran Honor Pelatih Kegiatan Ekstrakurikuler Pencak Silat  Januari s.d Maret 2017', 1500000, '2017-04-07', NULL, '', ''),
(28, 7, '0724239', 'H-008', 'Pembayaran Honor Tenaga Kebersihan Bulan Januari s.d Maret 2017', 1200000, '2017-04-07', NULL, '', ''),
(29, 8, '0723235', 'H-009', 'Pembayaran Insentif Bendahara BOS', 1800000, '2017-04-07', NULL, '', ''),
(30, 7, '0723237', 'H-010', 'Pembayaran Honor Tenaga Administrasi', 1350000, '2017-04-07', NULL, '', ''),
(31, 9, '0617179', 'K-001', 'Pembayaran Biaya Makan Minum Dalam Rangka Penyusunan RKJM,RKT,RKAS dan RAPBS Berdasarkan Evaluasi Diri Sekolah', 240000, '2017-04-07', NULL, '', ''),
(32, 10, '0825262', 'K-002', 'Pembayaran Biaya Penggandaan LJK Ujian Sekolah dan Ulangan Akhir Semester Genap  ', 940000, '2017-04-07', NULL, '', ''),
(33, 11, '0723213', 'K-003', 'Pembayaran Biaya Makan Minum Guru dan Pegawai Bulan Januari 2017', 986000, '2017-04-07', NULL, '', ''),
(34, 11, '0723213', 'K-004', 'Pembayaran Biaya Makan Minum Guru dan Pegawai Bulan Februari 2017', 1133000, '2017-04-07', NULL, '', ''),
(35, 11, '0723213', 'K-005', 'Pembayaran Biaya Makan Minum Guru dan Pegawai Bulan Maret 2017', 1602500, '2017-04-07', NULL, '', ''),
(36, 11, '0724240', 'K-006', 'Pembayaran Pembelian 1 Set Mic Wireless Bendo Pewiy', 850000, '2017-04-07', NULL, '', ''),
(37, 12, '0515121', 'K-007', 'Pembayaran Biaya Pembelian Hard Disk Eksternal 750 Giga Byte WD', 875000, '2017-04-07', NULL, '', ''),
(38, 13, '030680', 'K-008', 'Pembayaran Biaya Pembelian Obat-obatan Ringan ', 235000, '2017-04-07', NULL, '', ''),
(39, 13, '030788', 'K-009', 'Pembayaran Biaya Pas Photo Kelas IX ', 2400000, '2017-04-07', NULL, '', ''),
(40, 13, '030681', 'K-010', 'Pembayaran Patroli Sekolah ', 300000, '2017-04-07', NULL, '', ''),
(41, 11, '0723216', 'K-011', 'Pembayaran Biaya Makan Minum Rapat Rutin Bulan Februari', 144000, '2017-04-07', NULL, '', ''),
(42, 11, '0723216', 'K-012', 'Pembayaran Biaya Makan Minum Rapat Rutin Bulan Maret\r\n', 144000, '2017-04-07', NULL, '', ''),
(43, 5, '030651', 'K-013', 'Pembayaran Pembelian 1 Lusin Kostum Futsal', 600000, '2017-04-07', NULL, '', ''),
(44, 5, '030651', 'K-014', 'Pembayaran Biaya Pendaftaran Lomba O2SN', 250000, '2017-04-07', NULL, '', ''),
(45, 14, '0723229', 'K-015', 'Pembayaran Tagihan Internet Bulan Januari \r\n', 264000, '2017-04-07', NULL, '', ''),
(46, 14, '0723227', 'K-016', 'Pembayaran Tagihan Listrik Bulan Maret', 256500, '2017-04-07', NULL, '', ''),
(47, 14, '0723229', 'K-017', 'Pembayaran Tagihan Internet Bulan Februari', 246000, '2017-04-07', NULL, '', ''),
(48, 14, '0723229', 'K-018', 'Pembayaran Tagihan Internet Bulan Maret', 267000, '2017-04-07', NULL, '', ''),
(49, 15, '030787', 'K-019', 'Pembayaran Tagihan Majalah Suara Muhammadiyah  Januari s.d Maret 2017', 144000, '2017-04-07', NULL, '', ''),
(50, 15, '030787', 'K-020', 'Pembayaran Tagihan Koran Media Nasional  Januari s.d Maret 2017', 60000, '2017-04-07', NULL, '', ''),
(51, 16, '0414107', 'K-021', 'Pembayaran MK2S', 600000, '2017-04-07', NULL, '', ''),
(52, 8, '0723233', 'K-022', 'Pembayaran Biaya Penggandaan dan Penjilitan Laporan Dana BOS', 100000, '2017-04-07', NULL, '', ''),
(53, 3, '010104', 'K-023', 'Pembayaran Biaya Simulasi Ujian Nasional', 5566000, '2017-04-07', NULL, '', ''),
(54, 3, '010104', 'K-024', 'Pembayaran Pembelian Makan Minum Kegiatan Try Out 1', 200000, '2017-04-07', NULL, '', ''),
(55, 3, '010104', 'K-025', 'Pembayaran Pembelian Makan Minum Kegiatan Try Out 2\r\n', 200000, '2017-04-07', NULL, '', ''),
(56, 17, '0515136', 'K-026', 'Pembayaran Biaya Instalasi dan Tambah Daya Listrik\r\n', 4500000, '2017-04-07', NULL, '', ''),
(57, 3, '010107', 'K-027', 'Pembayaran Biaya Penggandaan Soal Ulangan Akhir Semester Genap  \r\n', 1285000, '2017-04-07', NULL, '', ''),
(58, 18, '0723232', 'K-028', 'Pembayaran Biaya Pembelian ATK Bulan Januari 2017', 895000, '2017-04-07', NULL, '', ''),
(59, 18, '0723232', 'K-029', 'Pembayaran Biaya Pembelian ATK Bulan Februari 2017\r\n', 235000, '2017-04-07', NULL, '', ''),
(60, 18, '0723232', 'K-030', 'Pembayaran Biaya Pembelian ATK Bulan Maret  2017', 957000, '2017-04-07', NULL, '', ''),
(61, 18, '0723304', 'T-001', 'Pembayaran Transport Pertemuan Dalam Rangka Penyusunan RKJM,RKT,RKAS dan RAPBS Berdasarkan Evaluasi Diri Sekolah\r\n', 800000, '2017-04-07', NULL, '', ''),
(62, 3, '010213', 'T-002', 'Pembayaran Transport Pembimbing Les Tambahan Sore Hari Pembelajaran Pengayaan', 15360000, '2017-04-07', NULL, '', ''),
(63, 5, '030651', 'T-003', 'Pembayaran Transport Pembimbing dan Peserta Lomba O2SN', 475000, '2017-04-07', NULL, '', ''),
(64, 19, '0724245', 'T-004', 'Pembayaran Transport Menghadiri Sosialisasi Terkait Pendidikan\r\n', 300000, '2017-04-07', NULL, '', ''),
(65, 19, '0723302', 'T-005', 'Pembayaran Transport Ke BANK\r\n', 300000, '2017-04-07', NULL, '', ''),
(66, 19, '0723303', 'T-006', 'Pembayaran Transport Koordinasi dan Pelaporan Dana BOS Ke Dinas Pendidikan\r\n', 200000, '2017-04-07', NULL, '', ''),
(67, 19, '0723304', 'T-007', 'Pembayaran Transport Dalam Rangka Penyusunan Revisi RKAS', 200000, '2017-04-07', NULL, '', ''),
(68, 5, '030663', 'T-008', 'Pembayaran Transport Pembimbing dan Peserta Pencak Silat\r\n', 200000, '2017-04-07', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bos_realisasi_komponen`
--

CREATE TABLE `bos_realisasi_komponen` (
  `id_bos_realisasi_komponen` int(11) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_realisasi_komponen`
--

INSERT INTO `bos_realisasi_komponen` (`id_bos_realisasi_komponen`, `nama_program`) VALUES
(1, 'Pengembangan Perpustakaan'),
(2, 'Kegiatan Penerimaan Siswa Baru'),
(3, 'Kegiatan Pembelajaran dan Eskul Siswa'),
(4, 'Pembelian Bahan Habis Pakai'),
(5, 'Langganan Daya dan Jasa'),
(7, 'Perawatan Sekolah'),
(8, 'Pembayaran Honorium Bulanan Guru Honorer dan Tenaga Pendidikan Honorer'),
(9, 'Pengembangan Profesi Guru'),
(10, 'Membantu Siswa Miskin'),
(11, 'Pembiayaan Pengeloaan BOS'),
(12, 'Pembelian Perangkat Komputer'),
(13, 'Biaya Lainnya Jika Komponen 1 s.d. 12 telah terpenuhi'),
(15, 'test 1');

-- --------------------------------------------------------

--
-- Table structure for table `bos_realisasi_pendapatan`
--

CREATE TABLE `bos_realisasi_pendapatan` (
  `id_bos_realisasi_pendapatan` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_realisasi_pendapatan`
--

INSERT INTO `bos_realisasi_pendapatan` (`id_bos_realisasi_pendapatan`, `tahun`, `nominal`, `id_user`, `dibuat_tanggal`) VALUES
(1, '2017', 337000000, 3, '2020-08-24 00:34:57'),
(2, '2018', 461000000, 3, '2020-08-31 21:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `bos_realisasi_rekapitulasi`
--

CREATE TABLE `bos_realisasi_rekapitulasi` (
  `id_bos_realisasi_rekapitulasi` int(11) NOT NULL,
  `idsnp` int(11) DEFAULT NULL,
  `sub_program_id` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_realisasi_rekapitulasi`
--

INSERT INTO `bos_realisasi_rekapitulasi` (`id_bos_realisasi_rekapitulasi`, `idsnp`, `sub_program_id`, `saldo`, `tahun_ajaran`, `id_user`, `dibuat_tanggal`) VALUES
(2, 5, 7, NULL, '2017', 3, '2020-08-31 00:00:00'),
(3, 1, 3, NULL, '2017', 3, '2020-09-01 00:00:00'),
(5, 3, 3, NULL, '2017', 3, '2020-09-01 00:00:00'),
(6, 2, 3, NULL, '2017', 3, '2020-09-01 00:00:00'),
(7, 7, 8, NULL, '2017', 3, '2020-09-01 00:00:00'),
(8, 7, 11, NULL, '2017', 3, '2020-09-01 00:00:00'),
(9, 6, 11, NULL, '2017', 3, '2020-09-01 00:00:00'),
(10, 8, 3, NULL, '2017', 3, '2020-09-01 00:00:00'),
(11, 7, 13, NULL, '2017', 3, '2020-09-01 00:00:00'),
(12, 5, 12, NULL, '2017', 3, '2020-09-01 00:00:00'),
(13, 3, 4, NULL, '2017', 3, '2020-09-01 00:00:00'),
(14, 7, 5, NULL, '2017', 3, '2020-09-01 00:00:00'),
(15, 3, 5, NULL, '2017', 3, '2020-09-01 00:00:00'),
(16, 4, 9, NULL, '2017', 3, '2020-09-01 00:00:00'),
(17, 5, 5, NULL, '2017', 3, '2020-09-01 00:00:00'),
(18, 7, 4, NULL, '2017', 3, '2020-09-01 00:00:00'),
(19, 7, 9, NULL, '2017', 3, '2020-09-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bos_rkas`
--

CREATE TABLE `bos_rkas` (
  `id_bos_rkas` int(11) NOT NULL,
  `npsn` int(11) DEFAULT NULL,
  `sub_program` varchar(200) DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_kode` varchar(10) NOT NULL,
  `tipe` enum('pendapatan','belanja','','') NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_rkas`
--

INSERT INTO `bos_rkas` (`id_bos_rkas`, `npsn`, `sub_program`, `tahun_ajaran`, `id_user`, `no_kode`, `tipe`, `dibuat_tanggal`) VALUES
(12, 1, 'Pencapaian Akademis Peserta didik', '2017', 3, '0101', 'belanja', '2020-08-30 21:09:00'),
(13, 1, 'Pengembangan Potensi Peserta Didik', '2017', 3, '0102', 'belanja', '2020-08-30 21:09:00'),
(14, 3, 'Berencana Pelaksanaan Pembelajaran Efektif ', '2017', 3, '0303', 'belanja', '2020-08-30 21:31:06'),
(15, 3, 'Penyediaan Sumber Belajar', '2017', 3, '0304', 'belanja', '2020-08-30 21:33:12'),
(17, 4, 'Kecukupan Pendidik dan Tenaga Pendidik', '2017', 3, '0405', 'belanja', '2020-08-30 21:39:53'),
(18, 4, 'Program Peningkatan Kompetensi Pendidik dan Tenaga Kependidikan', '2017', 3, '0406', 'belanja', '2020-08-30 21:42:37'),
(19, 5, 'Program Kecukupan Sarana Sekolah', '2017', 3, '0507', 'belanja', '2020-08-30 21:50:39'),
(20, 5, 'Pemeliharaan Sekolah', '2017', 3, '0508', 'belanja', '2020-08-30 21:56:47'),
(21, 6, 'Penilaian Dampak Rencana Perbaikan Mutu Sekolah', '2017', 3, '0609', 'belanja', '2020-08-30 22:02:59'),
(22, 6, 'Pengumpulan dan Penggunaan Data Sekolah', '2017', 3, '0610', 'belanja', '2020-08-30 22:07:01'),
(23, 6, 'Peran Serta Masyarakat', '2017', 3, '0611', 'belanja', '2020-08-30 22:09:02'),
(24, 7, 'Pengelolaan Keuangan', '2017', 3, '0712', 'belanja', '2020-08-30 22:10:59'),
(25, 8, 'Ketersediaan Penilaian Bidang Akademik dan Non-Akademik', '2017', 3, '0813', 'belanja', '2020-08-30 22:13:29'),
(27, 2, 'Penyediaan Kebutuhan Pengembangan Peserta Didik', '2017', 3, '0201', 'belanja', '2020-08-30 22:23:47'),
(28, 3, 'Rencana Pelaksaan Pembelajaran Efektif', '2017', 3, '0302', 'belanja', '2020-08-30 22:28:58'),
(29, 3, 'Penyediaan Sumber Belajar', '2017', 3, '0303', 'belanja', '2020-08-30 22:30:37'),
(30, 4, 'Kecukupan Pendidik dan Tenaga Kependidikan', '2017', 3, '0404', 'belanja', '2020-08-30 22:32:48'),
(31, 4, 'Peningkatan Kompetensi Pendidik dan Tenaga Kependidikan', '2017', 3, '0405', 'belanja', '2020-08-30 22:35:50'),
(32, 5, 'Kecukupan Sarana Sekolah', '2017', 3, '0506', 'belanja', '2020-08-30 22:38:18'),
(33, 6, 'Pengelolaan Berbasis Kerja Tim dan Kemitraan', '2017', 3, '0607', 'belanja', '2020-08-30 22:41:33'),
(34, 6, 'Penilaian Dampak Rencana Perbaikan Mutu Sekolah', '2017', 3, '0608', 'belanja', '2020-08-30 22:45:26'),
(35, 6, 'Pengumpulan dan Penggunaan Data Sekolah', '2017', 3, '0609', 'belanja', '2020-08-30 22:49:43'),
(36, 7, 'Pengelolaan Keuangan', '2017', 3, '0710', 'belanja', '2020-08-30 22:52:44'),
(37, 8, 'Ketersediaan Penilaian Bidang Akademik dan Non Akademik', '2017', 3, '0811', 'belanja', '2020-08-30 22:54:08'),
(38, 1, 'Pencapaian Akademis Peserta Didik', '2018', 3, '0101', 'belanja', '2020-08-30 22:59:19'),
(39, 1, 'Pengembangan Potensi Peserta Didik', '2018', 3, '0102', 'belanja', '2020-08-30 23:00:43'),
(41, 3, 'Rencana Pelaksanaan Pembelajaran Efektif', '2018', 3, '0303', 'belanja', '2020-08-30 23:08:43'),
(42, 3, 'Penggunaan Sumber Belajar Secara Tepat', '2018', 3, '0304', 'belanja', '2020-08-30 23:09:58'),
(43, 4, 'Peningkatan Kompetensi Pendidik dan Tenaga Kependidikan', '2018', 3, '0405', 'belanja', '2020-08-30 23:11:05'),
(44, 5, 'Kecukupan Sarana Sekolah', '2018', 3, '0506', 'belanja', '2020-08-30 23:16:57'),
(45, 5, 'Pemeliharaan Sekolah', '2018', 3, '0507', 'belanja', '2020-08-30 23:18:37'),
(46, 6, 'Pengumpulan dan Penggunaan Data Sekolah', '2018', 3, '0608', 'belanja', '2020-08-30 23:19:59'),
(47, 6, 'Pengembangan Profesi Pendidik dan Tenaga Kependidikan', '2018', 3, '0609', 'belanja', '2020-08-30 23:20:57'),
(48, 6, 'Peran Serta Masyarakat', '2018', 3, '0610', 'belanja', '2020-08-30 23:21:45'),
(49, 7, 'Pengelolaan Keuangan', '2018', 3, '0711', 'belanja', '2020-08-30 23:31:24'),
(50, 1, 'Pengembangan Potensi Peserta Didik', '2018', 3, '0112', 'belanja', '2020-08-30 23:34:12'),
(51, 2, 'Relevansi dan Kesesuaian Kurikulum', '2018', 3, '0213', 'belanja', '2020-08-30 23:34:51'),
(52, 3, 'Rencana Pelaksanaan Pembelajaran Efektif', '2018', 3, '0314', 'belanja', '2020-08-30 23:41:01'),
(53, 3, 'Penggunaan Sumber Belajar Secara Tepat', '2018', 3, '0315', 'belanja', '2020-08-30 23:41:38'),
(54, 4, 'Peningkatan Kompetensi Pendidik dan Tenaga Kependidikan', '2018', 3, '0416', 'belanja', '2020-08-30 23:45:46'),
(55, 5, 'Pemeliharaan Sekolah', '2018', 3, '0517', 'belanja', '2020-08-30 23:46:31'),
(56, 6, 'Penilaian Dampak Rencana Perbaikan Mutu Sekolah', '2018', 3, '0618', 'belanja', '2020-08-30 23:47:40'),
(57, 6, 'Pengumpulan dan Penggunaan Data Sekolah', '2018', 3, '0619', 'belanja', '2020-08-30 23:48:16'),
(58, 6, 'Pengembangan Profesi Pendidik dan Tenaga Kependidikan', '2018', 3, '0620', 'belanja', '2020-08-30 23:48:57'),
(59, 7, 'Pengelolaan Keuangan ', '2018', 3, '0721', 'belanja', '2020-08-30 23:55:55'),
(60, 8, 'Program Ketersediaan Penilaian Bidang Akademik dan Non Akademik', '2018', 3, '0822', 'belanja', '2020-08-30 23:57:13');

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
(21, 12, '010101', 'Pelaksanaan Uji Coba UASBN/UN Tk.kota', 14292000, '0000-00-00', ''),
(22, 13, '010209', 'Pengayaan Mata Pelajaran Ujian Nasional', 24960000, '0000-00-00', ''),
(23, 14, '030307', 'Penanggungjawab  Program Ekstrakurikuler', 1500000, '0000-00-00', ''),
(24, 14, '030308', 'Penyusunan Program Ekstrakurikuler', 1500000, '0000-00-00', ''),
(25, 14, '030310', 'Pelaksanaan Ekstrakurikuler Kepramukaan/Hizbul Wathan', 3500000, '0000-00-00', ''),
(26, 14, '030313', 'Pelaksanaan Ekstrakurikuler Kesenian', 6540000, '0000-00-00', ''),
(27, 14, '030317', 'Pelaksanaan Ekstrakurikuler Olahraga (Pencak Silat)', 3750000, '0000-00-00', ''),
(28, 14, '030322', 'Pelaksanaan Pendidikan Lingkungan Hidup', 2200000, '0000-00-00', ''),
(29, 14, '030328', 'Pelaksanaan Ekstrakurikuler Drum Band', 4300000, '0000-00-00', ''),
(30, 15, '030437', 'Usaha Kesehatan Sekolah (UKS, Termasuk Peralatan dan Obat-Obatan', 500000, '0000-00-00', ''),
(32, 17, '040551', 'Honor Tenaga Administrasi Sekolah', 3300000, '0000-00-00', ''),
(33, 17, '040552', 'Honor Tenaga Pustakawan', 1200000, '0000-00-00', ''),
(34, 17, '040554', 'Honor Petugas Satpam ', 6000000, '0000-00-00', ''),
(35, 17, '040557', 'Honor Petugas Kebersihan ', 2400000, '0000-00-00', ''),
(36, 18, '040685', 'Menghadiri Seminar Yang Terkait Langsung Dengan Peningkatan Mutu Guru dan Tenaga', 1200000, '0000-00-00', ''),
(37, 18, '040686', 'Transport Kegiatan KKG/MGMP atau KKKS/MKKS', 1200000, '0000-00-00', ''),
(38, 19, '0507113', 'Pengadaan Proyektor', 7000000, '0000-00-00', ''),
(39, 19, '0507114', 'Pengadaan Buku Bacaan,Pengayaan dan Buku Referensi Untuk Memenuhi SPM', 3960000, '0000-00-00', ''),
(40, 19, '0507116', 'Pengadaan Buku Teks Pegangan Guru', 200466, '0000-00-00', ''),
(41, 19, '0507119', 'Pengadaan Buku Teks Pelajaran Peserta Didik', 9045934, '0000-00-00', ''),
(42, 19, '0507123', 'Pengadaan Buku Teks Pelajaran Peserta Didik Untuk Mencukupi Kekurangan', 9900000, '0000-00-00', ''),
(43, 19, '0507128', 'Langganan Koran,Majalah/Publikasi Berkala Yang Terkait Dengan Pendidikan ', 288000, '0000-00-00', ''),
(44, 20, '0508177', 'Pemeliharaan Perabot Perpustakaan', 2400000, '0000-00-00', ''),
(45, 20, '0508178', 'Pengecatan,Perbaikan Atap Bocor,Perbaikan Pintu dan Jendela', 7000000, '0000-00-00', ''),
(46, 20, '0508180', 'Perbaikan Lantai Ubin/Keramik dan Perawatan Fasilitas Sekolah Lainnya', 15500000, '0000-00-00', ''),
(47, 20, '0508183', 'Perbaikan Meubeler,Termasuk Pembelian Meja dan Kursi Peserta Didik/Guru', 16925000, '0000-00-00', ''),
(48, 21, '0609235', 'Pembiayaan Lomba Yang Tidak Dibiayai Dari Dana Pemerintah/Pemda', 650000, '0000-00-00', ''),
(49, 21, '0609236', 'Honor Jam Mengajar Tambahan Di Luar Jam Pelajaran dan Diluar Kewajiban Jam Mengajar', 1500000, '0000-00-00', ''),
(50, 21, '0609238', 'Pengadaan ATK Pembelajaran', 4184100, '0000-00-00', ''),
(51, 21, '0609241', 'Pengadaan ATK Kantor', 3589500, '0000-00-00', ''),
(52, 21, '0609245', 'Pembelian Minuman dan Makanan Ringan Kebutuhan Sehari-hari di Sekolah', 7773800, '0000-00-00', ''),
(53, 21, '0609250', 'Pembelian Alat Kebersihan dan Listrik', 907000, '0000-00-00', ''),
(54, 21, '0609256', 'Pembelian Peralatan/Perlengkapan Yang Menunjang Operasional Rutin di Sekolah', 12000000, '0000-00-00', ''),
(55, 22, '0610331', 'Penggandaan Laporan dan Surat Menyurat Untuk Keperluan Sekolah', 200000, '0000-00-00', ''),
(56, 22, '0610332', 'Insentif Bagi Bendahara Penyusunan Laporan BOS', 3600000, '0000-00-00', ''),
(57, 22, '0610334', 'Transport Ke Bank', 600000, '0000-00-00', ''),
(58, 22, '0610337', 'Transportasi Dalam Rangka Koordinasi dan Pelaporan Ke Dinas Pendidikan Kota', 400000, '0000-00-00', ''),
(59, 22, '0610341', 'Biaya Pertemuan Dalam Rangka Penyusunan RPS/RKT/RKAS', 1520000, '0000-00-00', ''),
(60, 23, '0611419', 'Pembuatan Spanduk Sekolah Bebas Pungutan', 1950000, '0000-00-00', ''),
(61, 24, '0712469', 'Pembayaran Langganan Internet (Fixed Modem)', 1476000, '0000-00-00', ''),
(62, 24, '0712470', 'Kegiatan Supervisi/Monitoring,Evaluasi dan Pengembangan Manajemen Sekolah', 900000, '0000-00-00', ''),
(63, 25, '0813534', 'Ulangan Akhir Semester Genap Kelas IX', 2220400, '0000-00-00', ''),
(64, 25, '0813535', 'Ulangan Akhir Semester Genap Kelas VII dan VIII', 3913000, '0000-00-00', ''),
(65, 25, '0813537', 'Ujian Sekolah', 2854800, '0000-00-00', ''),
(66, 25, '0813540', 'Ujian Nasional', 1400000, '0000-00-00', ''),
(68, 27, '020146', 'Pengadaan Peralatan Pembelajaran Semua Mata Pelajaran', 3000000, '0000-00-00', ''),
(69, 28, '030293', 'Penanggungjawab Program Ekstrakurikuler', 1500000, '0000-00-00', ''),
(70, 28, '030294', 'Penyusunan Program Ekstrakurikuler', 1500000, '0000-00-00', ''),
(71, 28, '030296', 'Pelaksanaan Ekstrakurikuler Kepramukaan/Hizbul Wathan', 3500000, '0000-00-00', ''),
(72, 28, '030299', 'Pelaksanaan Ekstrakurikuler Kesenian', 6540000, '0000-00-00', ''),
(73, 28, '0302103', 'Pelaksanaan Ekstrakurikuler Olahraga (Pencak Silat)', 3750000, '0000-00-00', ''),
(74, 28, '0302108', 'Pelaksanaan Pendidikan Lingkungan Hidup', 2200000, '0000-00-00', ''),
(75, 28, '0302114', 'Pelaksanaan Pengembangan Pendidikan Karakter/Penumbuhan Budi Pekerti', 3000000, '0000-00-00', ''),
(76, 28, '0302121', 'Pelaksanaan Ekstrakurikuler Drum Band', 4300000, '0000-00-00', ''),
(77, 29, '0303163', 'Usaha Kesehatan Sekolah (UKS, Termasuk Peralatan dan Obat-Obatan', 500000, '0000-00-00', ''),
(78, 29, '0303164', 'Pengadaan Peralatan Yang Mendukung Pembelajaran Kontekstual', 1000000, '0000-00-00', ''),
(79, 30, '0404225', 'Honor Tenaga Administrasi Sekolah', 3300000, '0000-00-00', ''),
(80, 30, '0404226', 'Honor Tenaga Pustakawan', 1200000, '0000-00-00', ''),
(81, 30, '0404228', 'Honor Petugas Satpam', 6000000, '0000-00-00', ''),
(82, 30, '0404231', 'Honor Petugas Kebersihan ', 2400000, '0000-00-00', ''),
(83, 31, '0405301', 'Menghadiri Seminar Yang Terkait Langsung Dengan Peningkatan Mutu Guru dan Tenaga Pendidik', 1200000, '0000-00-00', ''),
(84, 31, '0405302', 'Transport Kegiatan KKG/MGMP atau KKKS/MKKS', 1200000, '0000-00-00', ''),
(85, 31, '0405304', 'Workshop/Lokakarya Untuk Peninkatan Mutu Guru dan Tenaga Pendidikan', 750000, '0000-00-00', ''),
(86, 32, '0506379', 'Pengadaan Laptop', 7200000, '0000-00-00', ''),
(87, 32, '0506380', 'Pengadaan Proyektor ', 7000000, '0000-00-00', ''),
(88, 32, '0506382', 'Pengadaan Printer atau Printer Plus Scanner', 3000000, '0000-00-00', ''),
(89, 32, '0506385', 'Pengadaan Komputer Desktop/Work Station Berupa PC/All In One Computer', 25000000, '0000-00-00', ''),
(90, 32, '0506389', 'Langganan Koran,Majalah/Publikasi Berkala Yang Terkait Dengan Pendidikan ', 288000, '0000-00-00', ''),
(91, 33, '0607477', 'Semua Jenis Pengeluaran Dalam Rangka Penerimaan Siswa Baru', 7200000, '0000-00-00', ''),
(92, 34, '0608553', 'Pembiayaan Lomba Yang Tidak Dibiayai Dari Dana Pemerintah/Pemda', 650000, '0000-00-00', ''),
(93, 34, '0608554', 'Honor Jam Mengajar Tambahan Di Luar Jam Pelajaran dan Diluar Kewajiban Jam Mengajar', 1500000, '0000-00-00', ''),
(94, 34, '0608556', 'Pengadaan ATK Pembelajaran', 5950900, '0000-00-00', ''),
(95, 34, '0608559', 'Pengadaan ATK Kantor', 3589500, '0000-00-00', ''),
(96, 34, '0608563', 'Pembelian Minuman dan Makanan Ringan Kebutuhan Sehari-hari di Sekolah', 7026200, '0000-00-00', ''),
(97, 34, '0608568', 'Pembelian Alat Kebersihan dan Listrik', 2721000, '0000-00-00', ''),
(98, 35, '0609676', 'Penggandaan Laporan dan Surat Menyurat Untuk Keperluan Sekolah', 200000, '0000-00-00', ''),
(99, 35, '0609677', 'Insentif Bagi Bendahara Penyusunan Laporan BOS', 3600000, '0000-00-00', ''),
(100, 35, '0609679', 'Transport Ke Bank', 600000, '0000-00-00', ''),
(101, 35, '0609682', 'Transport Dalam Rangka Koordinasi dan Pelaporan Ke Dinas Pendidikan Kota', 400000, '0000-00-00', ''),
(102, 35, '0609686', 'Biaya Pertemuan Dalam Rangka Penyusunan RPS/RKT/RKAS', 1990000, '0000-00-00', ''),
(103, 35, '0609691', 'Semua Jenis Pengeluaran Dalam Rangka Pendataan Dapokdikdasmen', 658800, '0000-00-00', ''),
(104, 36, '0710811', 'Pembayaran Langganan Internet (Fixed Modem)', 1476000, '0000-00-00', ''),
(105, 36, '0710812', 'Kegiatan Supervisi/Monitoring,Evaluasi dan Pengembangan Manajemen Sekolah', 900000, '0000-00-00', ''),
(106, 37, '0811914', 'Ulangan Semester Ganjil', 7009600, '0000-00-00', ''),
(107, 38, '010185', 'Pelaksanaan Uji Coba UASBN/UN Tingkat Kabupaten/Kota', 9248000, '0000-00-00', ''),
(108, 38, '010186', 'Pelaksanaan Ujian Akhir Semester', 6006500, '0000-00-00', ''),
(109, 38, '010188', 'Pelaksanaan Ujian Sekolah', 8570000, '0000-00-00', ''),
(110, 38, '010191', 'Pelaksanaan Ujian Nasional', 5868000, '0000-00-00', ''),
(111, 39, '0102177', 'Pelaksanaan Remedial/Pengayaan Mata Pelajaran', 20160000, '0000-00-00', ''),
(112, 39, '0102178', 'Penyusunan Program Ekstrakurikuler', 1500000, '0000-00-00', ''),
(115, 41, '0303271', 'Pelaksanaan Lomba OSN', 400000, '0000-00-00', ''),
(116, 41, '0303272', 'Pelaksanaan Lomba O2SN', 400000, '0000-00-00', ''),
(117, 41, '0303274', 'Pelaksanaan Ekstrakurikuler Kepramukaan', 2500000, '0000-00-00', ''),
(118, 41, '0303277', 'Pelaksanaan Ekstrakurikuler Kesenian', 4650000, '0000-00-00', ''),
(119, 41, '0303281', 'Pelaksanaan Ekstrakurikuler Olahraga', 3000000, '0000-00-00', ''),
(120, 41, '0303286', 'Pelaksanaan Ekstrakurikuler Lingkungan Hidup', 2000000, '0000-00-00', ''),
(121, 41, '0303292', 'Pelaksanaan Ekstrakurikuler UKS/KKR', 400000, '0000-00-00', ''),
(122, 41, '0303299', 'Pembayaran Langganan Koran dan Majalah', 708000, '0000-00-00', ''),
(123, 41, '0303307', 'Pengadaan Sarana Penunjang Kegiatan Belajar Mengajar (ATK KBM)', 3912250, '0000-00-00', ''),
(124, 42, '0304397', 'Peningkatan Kompetensi Kepala Sekolah (MKKS/K3S)', 600000, '0000-00-00', ''),
(125, 43, '0405501', 'Pengadaan Buku Pegangan Guru', 441000, '0000-00-00', ''),
(126, 44, '0506607', 'Penggandaan Buku Teks Pegangan Peserta Didik', 11136000, '0000-00-00', ''),
(127, 44, '0506608', 'Penambahan Daya Listrik', 3000000, '0000-00-00', ''),
(128, 44, '0506610', 'Penambahan Meja Kursi Murid', 6700000, '0000-00-00', ''),
(129, 44, '0506613', 'Pemeliharaan Ruang Kelas / Belajar', 11500000, '0000-00-00', ''),
(130, 44, '0506617', 'Pengadaan Buku Teks Pelajaran Pegangan Peserta Didik', 34068000, '0000-00-00', ''),
(131, 45, '0507743', 'Revitalisasi Lantai Ruang/Kelas/Belajar/Lab', 9557000, '0000-00-00', ''),
(132, 45, '0507744', 'Penyusunan Program Supervisi,Monitoring dan Evaluasi', 300000, '0000-00-00', ''),
(133, 46, '0608865', 'Konsumsi Harian Guru/Pegawai', 7400000, '0000-00-00', ''),
(134, 47, '0609982', 'Pengadaan Bahan dan Alat Kebersihan', 953000, '0000-00-00', ''),
(135, 48, '06101101', 'Pembayaran Rekening Listrik', 1500000, '0000-00-00', ''),
(136, 49, '07111222', 'Pembayaran Langganan Internet', 3000000, '0000-00-00', ''),
(137, 49, '07111223', 'Belanja ATK Sekolah', 2037250, '0000-00-00', ''),
(138, 49, '07111225', 'Penyusunan Laporan BOS', 200000, '0000-00-00', ''),
(139, 49, '07111228', 'Insentif untuk Tim Penyusunan Laporan BOS', 3600000, '0000-00-00', ''),
(140, 49, '07111232', 'Pembayaran Honor Tenaga Administrasi', 3600000, '0000-00-00', ''),
(141, 49, '07111237', 'Pembayaran Honor Pegawai Pegawai Perpustakaan', 1200000, '0000-00-00', ''),
(142, 49, '07111243', 'Pembayaran Honor Penjaga Sekolah/Satpam/Pegawai Kebersihan', 12000000, '0000-00-00', ''),
(143, 49, '07111250', 'Pembelian Peralatan/Perlengkapan Yang Menunjang Operasional Rutin di Sekolah', 12000000, '0000-00-00', ''),
(144, 49, '07111258', 'Transport Guru / TU Urusan Dinas Non BOS', 650000, '0000-00-00', ''),
(145, 49, '07111267', 'Biaya Transportasi Dalam Rangka Mengambil BOS di BANK/Kantor POS', 600000, '0000-00-00', ''),
(146, 49, '07111277', 'Transport Dalam Rangka Koordinasi dan Pelaporan BOS ke Dinas Pendidikan', 800000, '0000-00-00', ''),
(147, 49, '07111288', 'Biaya Pertemuan Dalam Rangka Penyusunan RKJM dan RKT', 1235000, '0000-00-00', ''),
(148, 50, '01121477', 'Pengambangan Diri Siswa', 3000000, '0000-00-00', ''),
(149, 50, '01121478', 'Penyusunan Program Ekstrakurikuler', 3000000, '0000-00-00', ''),
(150, 51, '02131626', 'Pengembangan Pembelajaran Kontekstual', 1000000, '0000-00-00', ''),
(151, 52, '03141765', 'Pelaksanaan Pendaftaran Peserta Didik Baru (PPDB)', 5600000, '0000-00-00', ''),
(152, 52, '03141766', 'Pelaksanaan Lomba OSN', 1500000, '0000-00-00', ''),
(153, 52, '03141768', 'Pelaksanaan Lomba O2SN', 650000, '0000-00-00', ''),
(154, 52, '03141771', 'Pelaksanaan Ekstrakurikuler Kepramukaan ', 3500000, '0000-00-00', ''),
(155, 52, '03141775', 'Pelaksanaan Ekstrakurikuler Kesenian', 6540000, '0000-00-00', ''),
(156, 52, '03141780', 'Pelaksanaan Ekstrakurikuler Olahraga', 3750000, '0000-00-00', ''),
(157, 52, '03141786', 'Pelaksanaan Ekstrakurikuler Lingkungan Hidup', 2200000, '0000-00-00', ''),
(158, 52, '03141793', 'Pelaksanaan Ekstrakurikuler UKS/KKR', 500000, '0000-00-00', ''),
(159, 52, '03141801', 'Pelaksanaan Ekstrakurikuler Drum Band', 4300000, '0000-00-00', ''),
(160, 52, '03141810', 'Pembayaran Langganan Koran dan Majalah', 288000, '0000-00-00', ''),
(161, 52, '03141820', 'Pengadaan Sarana Penunjang Kegiatan Belajar Mengajar (ATK KBM)', 5750900, '0000-00-00', ''),
(162, 52, '03141831', 'Pengadaan Alat Pembelajaran (Seluruh mata pelajaran termasuk OR)', 3000000, '0000-00-00', ''),
(163, 52, '03141843', 'Workshop/Lokakarya Untuk Peninkatan Mutu Guru dan Tenaga Pendidikan', 750000, '0000-00-00', ''),
(164, 53, '03152086', 'Peningkatan Kompetensi Kepala Sekolah (MKKS/K3S)', 1200000, '0000-00-00', ''),
(165, 54, '04162241', 'Pengadaan LCD dan Screen Proyektor', 7000000, '0000-00-00', ''),
(166, 54, '04162242', 'Pengadaan Komputer', 32200000, '0000-00-00', ''),
(167, 54, '04162244', 'Pengadaan Printer', 3000000, '0000-00-00', ''),
(168, 55, '05172432', 'Penyusunan Program Supervisi,Monitoring dan Evaluasi', 900000, '0000-00-00', ''),
(169, 56, '06182593', 'Pengelolaan Data Sekolah : DAPODIK dan lainnya', 658800, '0000-00-00', ''),
(170, 57, '06192756', 'Konsumsi Harian Guru/Pegawai', 7026200, '0000-00-00', ''),
(171, 58, '06202921', 'Pengadaan Bahan dan Alat Kebersihan', 2721000, '0000-00-00', ''),
(172, 59, '07213088', 'Pembayaraan Langganan Internet', 1476000, '0000-00-00', ''),
(173, 59, '07213089', 'Belanja ATK Sekolah', 3589500, '0000-00-00', ''),
(174, 59, '07213091', 'Penyusunan Laporan BOS', 200000, '0000-00-00', ''),
(175, 59, '07213094', 'Insentif Untuk Tim Penyusunan Laporan BOS', 3600000, '0000-00-00', ''),
(176, 59, '07213098', 'Pembayaran Honor Tenaga Administratif', 3300000, '0000-00-00', ''),
(177, 59, '07213103', 'Pembayaran Honor Pegawai Perpustakaan', 1200000, '0000-00-00', ''),
(178, 59, '07213109', 'Pembayaran Honor Penjaga Sekolah/Satpam/Pegawai Kebersihan', 8400000, '0000-00-00', ''),
(179, 59, '07213116', 'Transport Guru / TU Urusan Dinas Non BOS', 1200000, '0000-00-00', ''),
(180, 59, '07213124', 'Biaya Transportasi Dalam Rangka Mengambil BOS di Bank / Kantor POS', 600000, '0000-00-00', ''),
(181, 59, '07213133', 'Transportasi Dalam Rangka Koordinasi dan Pelaporan BOS ke Dinas Pendidikan', 400000, '0000-00-00', ''),
(182, 59, '07213143', 'Biaya Pertemuan Dalam Rangka Penyusunan RKJM dan RKT', 1990000, '0000-00-00', ''),
(183, 60, '08223477', 'Penyusunan Soal Ulangan Akhir Semester', 5609600, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `bos_rkas_rencana`
--

CREATE TABLE `bos_rkas_rencana` (
  `id_bos_rkas_rencana` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `dana_siswa` int(11) NOT NULL,
  `saldo_tahun_lalu` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos_rkas_rencana`
--

INSERT INTO `bos_rkas_rencana` (`id_bos_rkas_rencana`, `tahun`, `jumlah_siswa`, `dana_siswa`, `saldo_tahun_lalu`, `total`, `tanggal_dibuat`, `id_user`) VALUES
(23, '2017', 337, 1000000, 0, 337000000, '2020-08-30 20:58:22', 3),
(24, '2018', 461, 1000000, 0, 461000000, '2020-08-30 20:58:45', 3),
(25, '2019', 300, 1000000, 0, 300000000, '2020-08-31 21:24:47', 3);

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
  `tahun_masuk` varchar(10) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `jabatan_id`, `nama`, `tahun_masuk`, `status`) VALUES
(1, 1, 'Siti Arfa Nasution', '2014', '1'),
(2, 1, 'Nurhasanah Lubis', '2014', '1'),
(3, 1, 'Winda Riati', '2013', '1'),
(4, 1, 'Rahmawati', '2009', '1'),
(5, 1, 'Irnawati', '2009', '1'),
(6, 1, 'Derita Meiniarty', '2009', '1'),
(7, 1, 'Halimah', '2010', '1'),
(8, 1, 'Maznun Hafni', '2006', '1'),
(9, 1, 'Agus Purwanto', '2005', '1'),
(10, 1, 'Zikri', '2003', '1'),
(11, 2, 'Kirno Wahyudi', '2015', '1'),
(12, 2, 'Septiadi Siallagan', '2015', '1'),
(13, 2, 'M. Syafii', '2016', '1'),
(14, 2, 'Maya Sari Sinaga', '2016', '1'),
(15, 2, 'Muhammad Nasrul', '2009', '1'),
(16, 2, 'Zulkarnain', '2009', '1'),
(17, 2, 'Enok Pudjiarti', '2010', '1'),
(18, 3, 'Hasanal Fauzi', '2011', '1'),
(19, 3, 'Juni Animah', '2013', '1'),
(20, 3, 'Marintan Lubis', '2013', '1'),
(21, 4, 'Yogo Soedarmono', '2008', '1'),
(22, 4, 'Aslian', '2007', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_persentase_standar_nasional`
--

CREATE TABLE `tbl_persentase_standar_nasional` (
  `id_persentase_standar_nasional` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `npsn` int(11) DEFAULT NULL,
  `persentase` float NOT NULL,
  `id_user` int(11) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_persentase_standar_nasional`
--

INSERT INTO `tbl_persentase_standar_nasional` (`id_persentase_standar_nasional`, `tahun_ajaran`, `npsn`, `persentase`, `id_user`, `dibuat_tanggal`) VALUES
(138, '2017', 1, 0, 3, '2020-08-30 20:58:22'),
(139, '2017', 2, 0, 3, '2020-08-30 20:58:22'),
(140, '2017', 3, 0, 3, '2020-08-30 20:58:22'),
(141, '2017', 4, 0, 3, '2020-08-30 20:58:22'),
(142, '2017', 5, 0, 3, '2020-08-30 20:58:22'),
(143, '2017', 6, 0, 3, '2020-08-30 20:58:22'),
(144, '2017', 7, 0, 3, '2020-08-30 20:58:22'),
(145, '2017', 8, 0, 3, '2020-08-30 20:58:22'),
(146, '2018', 1, 0, 3, '2020-08-30 20:58:45'),
(147, '2018', 2, 0, 3, '2020-08-30 20:58:45'),
(148, '2018', 3, 0, 3, '2020-08-30 20:58:45'),
(149, '2018', 4, 0, 3, '2020-08-30 20:58:45'),
(150, '2018', 5, 0, 3, '2020-08-30 20:58:45'),
(151, '2018', 6, 0, 3, '2020-08-30 20:58:45'),
(152, '2018', 7, 0, 3, '2020-08-30 20:58:45'),
(153, '2018', 8, 0, 3, '2020-08-30 20:58:45'),
(154, '2019', 1, 5.82374, 3, '2020-08-31 21:24:47'),
(155, '2019', 2, 0.445104, 3, '2020-08-31 21:24:47'),
(156, '2019', 3, 7.65282, 3, '2020-08-31 21:24:47'),
(157, '2019', 4, 4.65134, 3, '2020-08-31 21:24:47'),
(158, '2019', 5, 17.0189, 3, '2020-08-31 21:24:47'),
(159, '2019', 6, 11.1218, 3, '2020-08-31 21:24:47'),
(160, '2019', 7, 0.705045, 3, '2020-08-31 21:24:47'),
(161, '2019', 8, 2.58128, 3, '2020-08-31 21:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_standar_nasional`
--

CREATE TABLE `tbl_standar_nasional` (
  `idsnp` int(11) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_standar_nasional`
--

INSERT INTO `tbl_standar_nasional` (`idsnp`, `nama_program`) VALUES
(1, 'Pengembangan Kompetensi Lulusan'),
(2, 'Pengembangan Standar Isi'),
(3, 'Pengembangan Standar Proses'),
(4, 'Pengembangan Pendidikan dan Tenaga Kependidikan'),
(5, 'Pengembangan Sarana dan Prasaran Sekolah'),
(6, 'Pengembangan Standar Pengelolaan'),
(7, 'Pengembangan Standar Pembiayaan'),
(8, 'Pengembangan dan Implementasi Sistem Penilaian');

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
(5, 'kepala', '5b1458bb40dd7a0cf314c387c5ed50dd299475e1', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `yayasan_detail_rencana_pengeluaran`
--

CREATE TABLE `yayasan_detail_rencana_pengeluaran` (
  `id_yayasan_detail_rencana_pengeluaran` int(11) NOT NULL,
  `id_rencana_pengeluaran` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `masa_kerja` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `nilai_satuan` int(11) NOT NULL,
  `volume` varchar(50) NOT NULL,
  `nilai_volume` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dibuat_tanggal` date NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yayasan_detail_rencana_pengeluaran`
--

INSERT INTO `yayasan_detail_rencana_pengeluaran` (`id_yayasan_detail_rencana_pengeluaran`, `id_rencana_pengeluaran`, `tahun`, `uraian`, `masa_kerja`, `jumlah`, `satuan`, `nilai_satuan`, `volume`, `nilai_volume`, `total`, `dibuat_tanggal`, `id_user`) VALUES
(16, 6, 2017, 'Bantuan Sosial Siswa', '', 20000, 'siswa', 12, 'bulan', 12, 2880000, '0000-00-00', NULL),
(37, 6, 2017, 'Bantuan Sosial Siswa', '', 0, 'siswa', 0, 'bulan', 0, 0, '0000-00-00', NULL),
(38, 1, 2017, 'Rahmawati', 'Masa Kerja 5 - 9 Tahun', 32500, 'siswa', 32, 'bulan', 12, 12480000, '0000-00-00', NULL),
(39, 6, 2017, 'Bantuan Sosial Siswa', '', 50000, 'siswa', 0, 'bulan', 0, 50000, '0000-00-00', NULL),
(42, 1, 2017, 'Siti Arfa Nasution', 'Masa Kerja 1 - 5 Tahun', 30000, 'jam', 24, 'bulan', 12, 8640000, '0000-00-00', NULL),
(43, 1, 2017, 'Nurhasanah Lubis', 'Masa Kerja 1 - 5 Tahun', 30000, 'jam', 28, 'bulan', 12, 10080000, '2020-08-31', 2),
(44, 1, 2017, 'Winda Riati', 'Masa Kerja 1 - 5 Tahun', 30000, 'jam', 26, 'bulan', 13, 10140000, '2020-08-31', 2),
(45, 1, 2017, 'Irnawati', 'Masa Kerja 5 - 9 Tahun', 32500, 'jam', 28, 'bulan', 12, 10920000, '2020-08-31', 2),
(46, 1, 2017, 'Derita Meiniarty', 'Masa Kerja 5 - 9 Tahun', 32500, 'jam', 32, 'bulan', 12, 12480000, '2020-08-31', 2),
(47, 1, 2017, 'Halimah', 'Masa Kerja 5 - 9 Tahun', 30000, 'jam', 27, 'bulan', 12, 9720000, '2020-08-31', 2),
(48, 1, 2017, 'Maznun Hafni', 'Masa Kerja 9 - 13 Tahun', 35000, 'jam', 29, 'bulan', 12, 12180000, '2020-08-31', 2),
(49, 1, 2017, 'Agus Purwanto', 'Masa Kerja 9 - 13 Tahun', 35000, 'jam', 25, 'bulan', 12, 10500000, '2020-08-31', 2),
(50, 1, 2017, 'Zikri', 'Masa Kerja 13 Tahun - Dst', 37500, 'jam', 26, 'bulan', 12, 11700000, '2020-08-31', 2),
(51, 2, 2017, 'Kirno Wahyudi', 'Masa Kerja 1 - 5 Tahun', 25000, 'jam', 30, 'bulan', 12, 9000000, '2020-08-31', 2),
(52, 2, 2017, 'Septiadi Siallagan', 'Masa Kerja 1 - 5 Tahun', 25000, 'jam', 22, 'bulan', 12, 6600000, '2020-08-31', 2),
(53, 2, 2017, 'M. Syafii', 'Masa Kerja 1 - 5 Tahun', 25000, 'jam', 30, 'bulan', 12, 9000000, '2020-08-31', 2),
(54, 2, 2017, 'Maya Sari Sinaga', 'Masa Kerja 1 - 5 Tahun', 25000, 'jam', 26, 'bulan', 12, 7800000, '2020-08-31', 2),
(55, 2, 2017, 'Muhammad Nasrul', 'Masa Kerja 5 - 9 Tahun', 30000, 'jam', 15, 'bulan', 12, 5400000, '2020-08-31', 2),
(56, 2, 2017, 'Zulkarnain', 'Masa Kerja 5 - 9 Tahun', 30000, 'jam', 12, 'bulan', 12, 4320000, '2020-08-31', 2),
(57, 2, 2017, 'Enok Pudjiarti', 'Masa Kerja 5 - 9 Tahun', 30000, 'jam', 12, 'bulan', 12, 4320000, '2020-08-31', 2),
(58, 3, 2017, 'Hasanal Fauzi', '', 11000, 'jam', 24, 'bulan', 12, 3168000, '2020-08-31', 2),
(59, 3, 2017, 'Juni Animah', '', 10000, 'jam', 24, 'bulan', 12, 2880000, '2020-08-31', 2),
(60, 3, 2017, 'Marintan Lubis', '', 9000, 'jam', 24, 'bulan', 12, 2592000, '2020-08-31', 2),
(61, 4, 2017, 'Tunjangan Kasek', '', 1041000, 'orang', 1, 'bulan', 12, 12492000, '2020-08-31', 2),
(62, 4, 2017, 'Tunjangan Wakasek', '', 362000, 'orang', 2, 'bulan', 12, 8688000, '2020-08-31', 2),
(63, 4, 2017, 'Tunjangan Wali Kelas', '', 80000, 'orang', 11, 'bulan', 12, 10560000, '2020-08-31', 2),
(64, 5, 2017, 'Yogo Soedarmono', '', 1100000, 'orang', 1, 'bulan', 12, 13200000, '2020-08-31', 2),
(65, 5, 2017, 'Aslian', '', 900000, 'orang', 1, 'bulan', 12, 10800000, '2020-08-31', 2),
(66, 6, 2017, 'Bantuan Sosial Siswa', '', 1500000, 'siswa', 1, 'bulan', 1, 1500000, '2020-08-31', 2),
(67, 6, 2017, 'Bantuan Hadiah', '', 2000000, 'siswa', 1, 'bulan', 1, 2000000, '2020-08-31', 2),
(68, 6, 2017, 'BPJS Kesehatan Kasek', '', 72000, 'orang', 1, 'bulan', 12, 864000, '2020-08-31', 2),
(69, 6, 2017, 'BPJS Kesehatan Guru', '', 70000, 'orang', 10, 'bulan', 12, 8400000, '2020-08-31', 2),
(70, 6, 2017, 'BPJS Ketenagakerjaan', '', 58000, 'orang', 9, 'bulan', 12, 6264000, '2020-08-31', 2),
(71, 6, 2017, 'Seragam', '', 150000, 'orang', 23, 'tahun', 1, 3450000, '2020-08-31', 2),
(72, 6, 2017, 'THR', '', 567435, 'orang', 23, 'tahun', 1, 13051005, '2020-08-31', 2),
(73, 6, 2018, 'THR', '', 567435, 'orang', 23, 'bulan', 12, 156612060, '2020-08-31', 2);

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
(2, 'SPP', 3000000, '2020-07-08', NULL, '2020-07-23 22:55:17'),
(10, 'SPP 1', 200000, '2020-07-17', NULL, '0000-00-00 00:00:00'),
(11, 'SPP', 120000, '2020-07-07', 2, '2020-07-15 00:00:00'),
(14, 'Uraian', 300000, '2020-07-26', 2, '2020-07-26 14:16:38'),
(15, 'SPP', 100000, '2020-08-14', 2, '2020-08-08 21:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `yayasan_realisasi_pengeluaran`
--

CREATE TABLE `yayasan_realisasi_pengeluaran` (
  `id_yayasan_realisasi_pengeluaran` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `jenis_biaya` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yayasan_realisasi_pengeluaran`
--

INSERT INTO `yayasan_realisasi_pengeluaran` (`id_yayasan_realisasi_pengeluaran`, `uraian`, `jenis_biaya`, `tanggal`, `jumlah`, `id_user`, `dibuat_tanggal`) VALUES
(1, 'Gaji', 'Biaya Gaji / Honor\r\n', '2020-07-13', 10000, 2, '2020-08-15 12:01:01'),
(2, 'Bantuan Ini', 'Biaya Bantuan', '2017-07-14', 200000, 2, '2020-08-15 16:45:01'),
(3, 'Tets', 'Biaya Lainnya', '2017-06-15', 200000, 2, '2020-08-15 16:47:03');

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
(11, '2017', 'Test', 100, 10000, '2020-08-09 21:12:20', 2),
(14, '2017', 'Test', 20, 120000, '2020-08-09 22:04:14', 2),
(15, '2017', 'Tes ini', 120, 1200, '2020-08-09 22:04:32', 2);

-- --------------------------------------------------------

--
-- Table structure for table `yayasan_rencana_pengeluaran`
--

CREATE TABLE `yayasan_rencana_pengeluaran` (
  `id_yayasan_rencana_pengeluaran` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL,
  `no_kode` varchar(10) NOT NULL,
  `jenis_biaya` varchar(100) NOT NULL,
  `sub_jenis_biaya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yayasan_rencana_pengeluaran`
--

INSERT INTO `yayasan_rencana_pengeluaran` (`id_yayasan_rencana_pengeluaran`, `tahun`, `id_user`, `dibuat_tanggal`, `no_kode`, `jenis_biaya`, `sub_jenis_biaya`) VALUES
(1, '', NULL, '0000-00-00 00:00:00', '1.1', 'Biaya Gaji / Honor\r\n', 'Honor Guru Tetap\r\n'),
(2, '', NULL, '0000-00-00 00:00:00', '1.2', 'Biaya Gaji / Honor\r\n', 'Honor Guru Tidak Tetap\r\n'),
(3, '', NULL, '0000-00-00 00:00:00', '1.3', 'Biaya Gaji / Honor\r\n', 'Honor Guru DPK\r\n'),
(4, '', NULL, '0000-00-00 00:00:00', '1.6', 'Biaya Gaji / Honor\r\n', 'Tunjangan'),
(5, '', NULL, '0000-00-00 00:00:00', '1.7', 'Biaya Gaji / Honor\r\n', 'Honor Pegawai\r\n'),
(6, '', NULL, '0000-00-00 00:00:00', '', 'Biaya Bantuan', ''),
(7, '', NULL, '0000-00-00 00:00:00', '', 'Biaya Lainnya', '');

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
  ADD PRIMARY KEY (`id_bos_realisasi_pendapatan`),
  ADD KEY `id_user` (`id_user`);

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
  ADD PRIMARY KEY (`id_bos_rkas_rencana`),
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
-- Indexes for table `tbl_persentase_standar_nasional`
--
ALTER TABLE `tbl_persentase_standar_nasional`
  ADD PRIMARY KEY (`id_persentase_standar_nasional`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `npsn` (`npsn`);

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
  ADD KEY `id_rencana_pengeluaran` (`id_rencana_pengeluaran`);

--
-- Indexes for table `yayasan_penerimaan_spp`
--
ALTER TABLE `yayasan_penerimaan_spp`
  ADD PRIMARY KEY (`id_yayasan_penerimaan_spp`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `yayasan_realisasi_pengeluaran`
--
ALTER TABLE `yayasan_realisasi_pengeluaran`
  ADD PRIMARY KEY (`id_yayasan_realisasi_pengeluaran`),
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
  ADD PRIMARY KEY (`id_yayasan_rencana_pengeluaran`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bos_realisasi_detail_komponen`
--
ALTER TABLE `bos_realisasi_detail_komponen`
  MODIFY `id_bos_realisasi_detail_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `bos_realisasi_komponen`
--
ALTER TABLE `bos_realisasi_komponen`
  MODIFY `id_bos_realisasi_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bos_realisasi_pendapatan`
--
ALTER TABLE `bos_realisasi_pendapatan`
  MODIFY `id_bos_realisasi_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bos_realisasi_rekapitulasi`
--
ALTER TABLE `bos_realisasi_rekapitulasi`
  MODIFY `id_bos_realisasi_rekapitulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bos_rkas`
--
ALTER TABLE `bos_rkas`
  MODIFY `id_bos_rkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `bos_rkas_detail`
--
ALTER TABLE `bos_rkas_detail`
  MODIFY `id_bos_rkas_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `bos_rkas_rencana`
--
ALTER TABLE `bos_rkas_rencana`
  MODIFY `id_bos_rkas_rencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT for table `tbl_persentase_standar_nasional`
--
ALTER TABLE `tbl_persentase_standar_nasional`
  MODIFY `id_persentase_standar_nasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tbl_standar_nasional`
--
ALTER TABLE `tbl_standar_nasional`
  MODIFY `idsnp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yayasan_detail_rencana_pengeluaran`
--
ALTER TABLE `yayasan_detail_rencana_pengeluaran`
  MODIFY `id_yayasan_detail_rencana_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `yayasan_penerimaan_spp`
--
ALTER TABLE `yayasan_penerimaan_spp`
  MODIFY `id_yayasan_penerimaan_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `yayasan_realisasi_pengeluaran`
--
ALTER TABLE `yayasan_realisasi_pengeluaran`
  MODIFY `id_yayasan_realisasi_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `yayasan_rencana_pendapatan`
--
ALTER TABLE `yayasan_rencana_pendapatan`
  MODIFY `id_yayasan_rencana_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `yayasan_rencana_pengeluaran`
--
ALTER TABLE `yayasan_rencana_pengeluaran`
  MODIFY `id_yayasan_rencana_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bos_realisasi_detail_komponen`
--
ALTER TABLE `bos_realisasi_detail_komponen`
  ADD CONSTRAINT `bos_realisasi_detail_komponen_ibfk_1` FOREIGN KEY (`relasi_id`) REFERENCES `bos_realisasi_rekapitulasi` (`id_bos_realisasi_rekapitulasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bos_realisasi_pendapatan`
--
ALTER TABLE `bos_realisasi_pendapatan`
  ADD CONSTRAINT `bos_realisasi_pendapatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bos_realisasi_rekapitulasi`
--
ALTER TABLE `bos_realisasi_rekapitulasi`
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_3` FOREIGN KEY (`saldo`) REFERENCES `bos_realisasi_pendapatan` (`id_bos_realisasi_pendapatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_5` FOREIGN KEY (`idsnp`) REFERENCES `tbl_standar_nasional` (`idsnp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_6` FOREIGN KEY (`sub_program_id`) REFERENCES `bos_realisasi_komponen` (`id_bos_realisasi_komponen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bos_rkas`
--
ALTER TABLE `bos_rkas`
  ADD CONSTRAINT `bos_rkas_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_rkas_ibfk_5` FOREIGN KEY (`npsn`) REFERENCES `tbl_standar_nasional` (`idsnp`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `tbl_detail_jabatan` (`id_detail_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_persentase_standar_nasional`
--
ALTER TABLE `tbl_persentase_standar_nasional`
  ADD CONSTRAINT `tbl_persentase_standar_nasional_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_persentase_standar_nasional_ibfk_3` FOREIGN KEY (`npsn`) REFERENCES `tbl_standar_nasional` (`idsnp`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `yayasan_realisasi_pengeluaran`
--
ALTER TABLE `yayasan_realisasi_pengeluaran`
  ADD CONSTRAINT `yayasan_realisasi_pengeluaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yayasan_rencana_pendapatan`
--
ALTER TABLE `yayasan_rencana_pendapatan`
  ADD CONSTRAINT `yayasan_rencana_pendapatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yayasan_rencana_pengeluaran`
--
ALTER TABLE `yayasan_rencana_pengeluaran`
  ADD CONSTRAINT `yayasan_rencana_pengeluaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
