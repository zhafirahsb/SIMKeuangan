-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Agu 2020 pada 03.59
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
-- Struktur dari tabel `bos_realisasi_detail_komponen`
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
-- Dumping data untuk tabel `bos_realisasi_detail_komponen`
--

INSERT INTO `bos_realisasi_detail_komponen` (`id_bos_realisasi_detail_komponen`, `relasi_id`, `no_kode`, `no_bukti`, `uraian`, `jumlah`, `tanggal`, `status`, `form`, `foto`) VALUES
(5, 1, '', '', '', 0, '0000-00-00', NULL, '', ''),
(6, 1, '', '', '', 0, '0000-00-00', NULL, '', '1598281147.jpg'),
(7, 1, '001', '001', 'Uraian', 120000, '2020-08-24', NULL, '', '1598281339.png'),
(8, 1, '001', '002', 'Uraian', 12300000, '2020-08-18', NULL, '', '1598281426.jpg'),
(9, 1, '009', '008', 'Uraian 1', 130000, '2020-08-12', NULL, '', '1598281426.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos_realisasi_komponen`
--

CREATE TABLE `bos_realisasi_komponen` (
  `id_bos_realisasi_komponen` int(11) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bos_realisasi_komponen`
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
-- Struktur dari tabel `bos_realisasi_pendapatan`
--

CREATE TABLE `bos_realisasi_pendapatan` (
  `id_bos_realisasi_pendapatan` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bos_realisasi_pendapatan`
--

INSERT INTO `bos_realisasi_pendapatan` (`id_bos_realisasi_pendapatan`, `tahun`, `nominal`, `id_user`, `dibuat_tanggal`) VALUES
(1, '2017', 24000000, 3, '2020-08-24 00:34:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos_realisasi_rekapitulasi`
--

CREATE TABLE `bos_realisasi_rekapitulasi` (
  `id_bos_realisasi_rekapitulasi` int(11) NOT NULL,
  `idsnp` int(11) DEFAULT NULL,
  `sub_program_id` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bos_realisasi_rekapitulasi`
--

INSERT INTO `bos_realisasi_rekapitulasi` (`id_bos_realisasi_rekapitulasi`, `idsnp`, `sub_program_id`, `saldo`, `tahun_ajaran`, `id_user`, `dibuat_tanggal`) VALUES
(1, 1, 1, NULL, '2017', 3, '2020-08-24 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos_rkas`
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
-- Dumping data untuk tabel `bos_rkas`
--

INSERT INTO `bos_rkas` (`id_bos_rkas`, `npsn`, `sub_program`, `tahun_ajaran`, `id_user`, `no_kode`, `tipe`, `dibuat_tanggal`) VALUES
(10, 1, 'Test', '2017', 3, '0101', 'belanja', '2020-08-24 00:25:16'),
(11, 1, 'Test', '2017', 3, '0102', 'belanja', '2020-08-24 00:25:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos_rkas_detail`
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
-- Dumping data untuk tabel `bos_rkas_detail`
--

INSERT INTO `bos_rkas_detail` (`id_bos_rkas_detail`, `bos_rkas`, `no_kode`, `uraian`, `jumlah`, `tanggal`, `form`) VALUES
(18, 10, '010102', 'Uraian', 560000, '0000-00-00', ''),
(19, 11, '010205', 'Uraian', 6000, '0000-00-00', ''),
(20, 11, '010206', 'Uraian', 50000, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos_rkas_rencana`
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
-- Dumping data untuk tabel `bos_rkas_rencana`
--

INSERT INTO `bos_rkas_rencana` (`id_bos_rkas_rencana`, `tahun`, `jumlah_siswa`, `dana_siswa`, `saldo_tahun_lalu`, `total`, `tanggal_dibuat`, `id_user`) VALUES
(22, '2017', 200, 120000, 0, 24000000, '2020-08-23 23:37:58', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_jabatan`
--

CREATE TABLE `tbl_detail_jabatan` (
  `id_detail_jabatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`, `id_user`) VALUES
(1, 'Guru Tetap', NULL),
(2, 'Guru Tidak Tetap', NULL),
(3, 'Guru DPK', NULL),
(4, 'pegawai', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `jabatan_id` int(5) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tahun_masuk` varchar(10) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
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
-- Struktur dari tabel `tbl_persentase_standar_nasional`
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
-- Dumping data untuk tabel `tbl_persentase_standar_nasional`
--

INSERT INTO `tbl_persentase_standar_nasional` (`id_persentase_standar_nasional`, `tahun_ajaran`, `npsn`, `persentase`, `id_user`, `dibuat_tanggal`) VALUES
(130, '2017', 1, 9, 3, '2020-08-23 23:37:58'),
(131, '2017', 2, 0, 3, '2020-08-23 23:37:58'),
(132, '2017', 3, 0, 3, '2020-08-23 23:37:58'),
(133, '2017', 4, 0, 3, '2020-08-23 23:37:58'),
(134, '2017', 5, 0, 3, '2020-08-23 23:37:58'),
(135, '2017', 6, 0, 3, '2020-08-23 23:37:58'),
(136, '2017', 7, 0, 3, '2020-08-23 23:37:58'),
(137, '2017', 8, 0, 3, '2020-08-23 23:37:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_standar_nasional`
--

CREATE TABLE `tbl_standar_nasional` (
  `idsnp` int(11) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_standar_nasional`
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
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','Bendahara Yayasan','Tata Usaha','Yayasan','Kepala Sekolah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin'),
(2, 'bendahara', '8cf55b8ae912bbfec560427ce8a2f296bf3ac972', 'Bendahara Yayasan'),
(3, 'tu', 'a3da4c6307d230e1f1c8ad62e00d05ff1f1f5b52', 'Tata Usaha'),
(4, 'yayasan', '23349438310fbf6efb8579094440db66533a9dfc', 'Yayasan'),
(5, 'kepala', '5b1458bb40dd7a0cf314c387c5ed50dd299475e1', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan_detail_rencana_pengeluaran`
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
-- Dumping data untuk tabel `yayasan_detail_rencana_pengeluaran`
--

INSERT INTO `yayasan_detail_rencana_pengeluaran` (`id_yayasan_detail_rencana_pengeluaran`, `id_rencana_pengeluaran`, `tahun`, `uraian`, `masa_kerja`, `jumlah`, `satuan`, `nilai_satuan`, `volume`, `nilai_volume`, `total`, `dibuat_tanggal`, `id_user`) VALUES
(16, 6, 2017, 'Bantuan Sosial Siswa', '', 20000, 'siswa', 12, 'bulan', 12, 2880000, '0000-00-00', NULL),
(37, 6, 2017, 'Bantuan Sosial Siswa', '', 0, 'siswa', 0, 'bulan', 0, 0, '0000-00-00', NULL),
(38, 1, 2017, 'Rahmawati', 'Masa Kerja 5 - 9 Tahun', 50000, 'siswa', 0, 'bulan', 0, 50000, '0000-00-00', NULL),
(39, 6, 2017, 'Bantuan Sosial Siswa', '', 50000, 'siswa', 0, 'bulan', 0, 50000, '0000-00-00', NULL),
(40, 7, 2017, 'Test Lainnya', '', 50000, 'siswa', 0, 'bulan', 0, 50000, '0000-00-00', NULL),
(41, 7, 2017, 'Test', '', 40000, 'siswa', 0, 'bulan', 0, 40000, '0000-00-00', NULL),
(42, 1, 2017, 'Siti Arfa Nasution', 'Masa Kerja 1 - 5 Tahun', 30000, 'jam', 24, 'bulan', 12, 8640000, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan_penerimaan_spp`
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
-- Dumping data untuk tabel `yayasan_penerimaan_spp`
--

INSERT INTO `yayasan_penerimaan_spp` (`id_yayasan_penerimaan_spp`, `uraian`, `total`, `tanggal`, `id_user`, `dibuat_tanggal`) VALUES
(2, 'SPP', 3000000, '2020-07-08', NULL, '2020-07-23 22:55:17'),
(10, 'SPP 1', 200000, '2020-07-17', NULL, '0000-00-00 00:00:00'),
(11, 'SPP', 120000, '2020-07-07', 2, '2020-07-15 00:00:00'),
(14, 'Uraian', 300000, '2020-07-26', 2, '2020-07-26 14:16:38'),
(15, 'SPP', 100000, '2020-08-14', 2, '2020-08-08 21:35:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan_realisasi_pengeluaran`
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
-- Dumping data untuk tabel `yayasan_realisasi_pengeluaran`
--

INSERT INTO `yayasan_realisasi_pengeluaran` (`id_yayasan_realisasi_pengeluaran`, `uraian`, `jenis_biaya`, `tanggal`, `jumlah`, `id_user`, `dibuat_tanggal`) VALUES
(1, 'Gaji', 'Biaya Gaji / Honor\r\n', '2020-07-13', 10000, 2, '2020-08-15 12:01:01'),
(2, 'Bantuan Ini', 'Biaya Bantuan', '2017-07-14', 200000, 2, '2020-08-15 16:45:01'),
(3, 'Tets', 'Biaya Lainnya', '2017-06-15', 200000, 2, '2020-08-15 16:47:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan_rencana_pendapatan`
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
-- Dumping data untuk tabel `yayasan_rencana_pendapatan`
--

INSERT INTO `yayasan_rencana_pendapatan` (`id_yayasan_rencana_pendapatan`, `tahun`, `keterangan`, `jumlah_siswa`, `jumlah_iuran`, `dibuat_tanggal`, `id_user`) VALUES
(11, '2017', 'Test', 100, 10000, '2020-08-09 21:12:20', 2),
(14, '2017', 'Test', 20, 120000, '2020-08-09 22:04:14', 2),
(15, '2017', 'Tes ini', 120, 1200, '2020-08-09 22:04:32', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan_rencana_pengeluaran`
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
-- Dumping data untuk tabel `yayasan_rencana_pengeluaran`
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
  MODIFY `id_bos_realisasi_detail_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bos_realisasi_komponen`
--
ALTER TABLE `bos_realisasi_komponen`
  MODIFY `id_bos_realisasi_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bos_realisasi_pendapatan`
--
ALTER TABLE `bos_realisasi_pendapatan`
  MODIFY `id_bos_realisasi_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bos_realisasi_rekapitulasi`
--
ALTER TABLE `bos_realisasi_rekapitulasi`
  MODIFY `id_bos_realisasi_rekapitulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bos_rkas`
--
ALTER TABLE `bos_rkas`
  MODIFY `id_bos_rkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bos_rkas_detail`
--
ALTER TABLE `bos_rkas_detail`
  MODIFY `id_bos_rkas_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bos_rkas_rencana`
--
ALTER TABLE `bos_rkas_rencana`
  MODIFY `id_bos_rkas_rencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id_persentase_standar_nasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

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
  MODIFY `id_yayasan_detail_rencana_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bos_realisasi_detail_komponen`
--
ALTER TABLE `bos_realisasi_detail_komponen`
  ADD CONSTRAINT `bos_realisasi_detail_komponen_ibfk_1` FOREIGN KEY (`relasi_id`) REFERENCES `bos_realisasi_rekapitulasi` (`id_bos_realisasi_rekapitulasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bos_realisasi_pendapatan`
--
ALTER TABLE `bos_realisasi_pendapatan`
  ADD CONSTRAINT `bos_realisasi_pendapatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bos_realisasi_rekapitulasi`
--
ALTER TABLE `bos_realisasi_rekapitulasi`
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_3` FOREIGN KEY (`saldo`) REFERENCES `bos_realisasi_pendapatan` (`id_bos_realisasi_pendapatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_5` FOREIGN KEY (`idsnp`) REFERENCES `tbl_standar_nasional` (`idsnp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_6` FOREIGN KEY (`sub_program_id`) REFERENCES `bos_realisasi_komponen` (`id_bos_realisasi_komponen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bos_rkas`
--
ALTER TABLE `bos_rkas`
  ADD CONSTRAINT `bos_rkas_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_rkas_ibfk_5` FOREIGN KEY (`npsn`) REFERENCES `tbl_standar_nasional` (`idsnp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bos_rkas_detail`
--
ALTER TABLE `bos_rkas_detail`
  ADD CONSTRAINT `bos_rkas_detail_ibfk_1` FOREIGN KEY (`bos_rkas`) REFERENCES `bos_rkas` (`id_bos_rkas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bos_rkas_rencana`
--
ALTER TABLE `bos_rkas_rencana`
  ADD CONSTRAINT `bos_rkas_rencana_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_detail_jabatan`
--
ALTER TABLE `tbl_detail_jabatan`
  ADD CONSTRAINT `tbl_detail_jabatan_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_jabatan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD CONSTRAINT `tbl_jabatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `tbl_detail_jabatan` (`id_detail_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_persentase_standar_nasional`
--
ALTER TABLE `tbl_persentase_standar_nasional`
  ADD CONSTRAINT `tbl_persentase_standar_nasional_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_persentase_standar_nasional_ibfk_3` FOREIGN KEY (`npsn`) REFERENCES `tbl_standar_nasional` (`idsnp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yayasan_detail_rencana_pengeluaran`
--
ALTER TABLE `yayasan_detail_rencana_pengeluaran`
  ADD CONSTRAINT `yayasan_detail_rencana_pengeluaran_ibfk_1` FOREIGN KEY (`id_rencana_pengeluaran`) REFERENCES `yayasan_rencana_pengeluaran` (`id_yayasan_rencana_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yayasan_penerimaan_spp`
--
ALTER TABLE `yayasan_penerimaan_spp`
  ADD CONSTRAINT `yayasan_penerimaan_spp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yayasan_realisasi_pengeluaran`
--
ALTER TABLE `yayasan_realisasi_pengeluaran`
  ADD CONSTRAINT `yayasan_realisasi_pengeluaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yayasan_rencana_pendapatan`
--
ALTER TABLE `yayasan_rencana_pendapatan`
  ADD CONSTRAINT `yayasan_rencana_pendapatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yayasan_rencana_pengeluaran`
--
ALTER TABLE `yayasan_rencana_pengeluaran`
  ADD CONSTRAINT `yayasan_rencana_pengeluaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
