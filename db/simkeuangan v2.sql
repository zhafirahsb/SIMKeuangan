-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jul 2020 pada 02.23
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
  `id` int(11) NOT NULL,
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
-- Dumping data untuk tabel `bos_realisasi_detail_komponen`
--

INSERT INTO `bos_realisasi_detail_komponen` (`id`, `relasi_id`, `no_kode`, `no_bukti`, `uraian`, `jumlah`, `tanggal`, `status`, `form`) VALUES
(1, 1, '0', '3', 'uraian', 300000, '2020-07-19', NULL, ''),
(2, 2, '', '', '', 0, '2020-07-09', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos_realisasi_komponen`
--

CREATE TABLE `bos_realisasi_komponen` (
  `id` varchar(8) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bos_realisasi_komponen`
--

INSERT INTO `bos_realisasi_komponen` (`id`, `nama_program`) VALUES
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
-- Struktur dari tabel `bos_realisasi_pendapatan`
--

CREATE TABLE `bos_realisasi_pendapatan` (
  `id` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `nominal` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos_realisasi_rekapitulasi`
--

CREATE TABLE `bos_realisasi_rekapitulasi` (
  `id` int(11) NOT NULL,
  `idsnp` varchar(8) DEFAULT NULL,
  `sub_program_id` varchar(8) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `tahun_ajaran` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bos_realisasi_rekapitulasi`
--

INSERT INTO `bos_realisasi_rekapitulasi` (`id`, `idsnp`, `sub_program_id`, `saldo`, `tahun_ajaran`, `id_user`, `dibuat_tanggal`) VALUES
(1, '2', '11', NULL, NULL, NULL, '2020-07-20 07:17:22'),
(2, '1', '1', NULL, NULL, NULL, '2020-07-20 07:17:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos_rkas`
--

CREATE TABLE `bos_rkas` (
  `id` int(11) NOT NULL,
  `npsn` varchar(8) DEFAULT NULL,
  `sub_program` varchar(200) DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tipe` enum('pendapatan','belanja','','') NOT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bos_rkas`
--

INSERT INTO `bos_rkas` (`id`, `npsn`, `sub_program`, `tahun_ajaran`, `id_user`, `tipe`, `dibuat_tanggal`) VALUES
(20, '1', 'Pencapaian Akademis Peserta Didik', '2017', NULL, 'belanja', '0000-00-00 00:00:00'),
(21, '1', 'Pengembangan Potensi Peserta Didik', '2017', NULL, 'belanja', '2020-07-18 22:42:49'),
(22, NULL, NULL, '', NULL, 'pendapatan', '2020-07-18 22:44:57'),
(23, '3', 'Rencana Relevansi dan Kesesuaian Silabus', '2017', NULL, 'belanja', '2020-07-19 05:36:09'),
(24, '3', 'Rencana Pelaksanaan Pembelajaran Efektif', '2017', NULL, 'belanja', '2020-07-19 05:42:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos_rkas_detail`
--

CREATE TABLE `bos_rkas_detail` (
  `id` int(11) NOT NULL,
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

INSERT INTO `bos_rkas_detail` (`id`, `bos_rkas`, `no_kode`, `uraian`, `jumlah`, `tanggal`, `form`) VALUES
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
(19, 24, '030681', 'Pelaksananaan Ekstrakurikuler Drum Band', 4300000, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bos_rkas_rencana`
--

CREATE TABLE `bos_rkas_rencana` (
  `id` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `dana_siswa` int(11) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bos_rkas_rencana`
--

INSERT INTO `bos_rkas_rencana` (`id`, `tahun`, `jumlah_siswa`, `dana_siswa`, `tanggal_dibuat`, `id_user`) VALUES
(13, '2017', 34, 100000, '2020-07-18 21:10:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_jabatan`
--

CREATE TABLE `tbl_detail_jabatan` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `gaji_guru` int(11) NOT NULL,
  `tahun_masuk` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nip` varchar(25) NOT NULL,
  `jabatan_id` int(5) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerimaan_rkas`
--

CREATE TABLE `tbl_penerimaan_rkas` (
  `no_kode` varchar(8) NOT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `tahun_ajaran` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengeluaran_rkas`
--

CREATE TABLE `tbl_pengeluaran_rkas` (
  `id` varchar(8) NOT NULL,
  `idsnp` varchar(8) DEFAULT NULL,
  `tahun_ajaran` date DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_standar_nasional`
--

CREATE TABLE `tbl_standar_nasional` (
  `idsnp` varchar(8) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL,
  `persentase` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_standar_nasional`
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
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan_detail_rencana_pengeluaran`
--

CREATE TABLE `yayasan_detail_rencana_pengeluaran` (
  `id` int(11) NOT NULL,
  `id_rencana_pengeluaran` int(11) NOT NULL,
  `uraian_detail` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `nilai_satuan` int(11) NOT NULL,
  `volume` varchar(50) NOT NULL,
  `nilai_volume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan_penerimaan_spp`
--

CREATE TABLE `yayasan_penerimaan_spp` (
  `id` int(11) NOT NULL,
  `uraian` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yayasan_penerimaan_spp`
--

INSERT INTO `yayasan_penerimaan_spp` (`id`, `uraian`, `total`, `tanggal`, `id_user`, `dibuat_tanggal`) VALUES
(1, 'SPP', 1000000, '2020-07-10', NULL, '2020-07-20 06:43:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan_realisasi_pemasukan_pengeluaran`
--

CREATE TABLE `yayasan_realisasi_pemasukan_pengeluaran` (
  `id` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan_rencana_pendapatan`
--

CREATE TABLE `yayasan_rencana_pendapatan` (
  `id` int(11) NOT NULL,
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

INSERT INTO `yayasan_rencana_pendapatan` (`id`, `tahun`, `keterangan`, `jumlah_siswa`, `jumlah_iuran`, `dibuat_tanggal`, `id_user`) VALUES
(4, '2017', 'Uang Iuran Sekolah Kelas VII - IX', 0, 423000000, '2020-07-19 08:34:05', NULL),
(5, '2017', 'Bayar Penuh', 330, 100000, '2020-07-19 08:37:09', NULL),
(6, '2017', 'Anak Yatim', 25, 90000, '2020-07-19 08:39:47', NULL),
(7, '2017', 'Anak Guru', 7, 0, '2020-07-19 08:40:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `yayasan_rencana_pengeluaran`
--

CREATE TABLE `yayasan_rencana_pengeluaran` (
  `id` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `uraian` varchar(200) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `nilai_satuan` int(11) NOT NULL,
  `volume` varchar(50) NOT NULL,
  `nilai_volume` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` bigint(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibuat_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yayasan_rencana_pengeluaran`
--

INSERT INTO `yayasan_rencana_pengeluaran` (`id`, `tahun`, `uraian`, `satuan`, `nilai_satuan`, `volume`, `nilai_volume`, `jumlah`, `total`, `id_user`, `dibuat_tanggal`) VALUES
(1, '2017', 'SMP MUHAMMADIYAH 19', '', 0, '', 0, 0, 259956750, NULL, '2020-07-19 12:19:02'),
(2, '2017', 'Biaya Gaji / Honor', '', 0, '', 0, 0, 206424000, NULL, '2020-07-19 12:31:54'),
(3, '2017', 'Honor Guru Tetap', '', 0, '', 0, 0, 95892000, NULL, '2020-07-19 12:32:24'),
(4, '2017', 'Masa Kerja 1 - 5 Tahun', '', 0, '', 0, 0, 21504000, NULL, '2020-07-19 12:35:25'),
(5, '2017', '1. Siti Arfa Nasution', 'jam', 28, 'bln', 12, 32000, 0, NULL, '2020-07-19 12:38:49'),
(7, '2017', '2. Nurhasanah Lubis', 'jam', 28, 'bln', 12, 32000, 10752000, NULL, '2020-07-19 12:44:38'),
(8, '2017', 'Winda Riati', 'jam', 26, 'bln', 13, 32000, 10816000, NULL, '2020-07-19 17:47:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bos_realisasi_detail_komponen`
--
ALTER TABLE `bos_realisasi_detail_komponen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relasi_id` (`relasi_id`);

--
-- Indexes for table `bos_realisasi_komponen`
--
ALTER TABLE `bos_realisasi_komponen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bos_realisasi_pendapatan`
--
ALTER TABLE `bos_realisasi_pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bos_realisasi_rekapitulasi`
--
ALTER TABLE `bos_realisasi_rekapitulasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsnp` (`idsnp`),
  ADD KEY `sub_program_id` (`sub_program_id`),
  ADD KEY `saldo` (`saldo`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `bos_rkas`
--
ALTER TABLE `bos_rkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengeluaran_rkas_id` (`npsn`),
  ADD KEY `sub_program_id` (`sub_program`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `bos_rkas_detail`
--
ALTER TABLE `bos_rkas_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bos_rkas` (`bos_rkas`);

--
-- Indexes for table `bos_rkas_rencana`
--
ALTER TABLE `bos_rkas_rencana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_detail_jabatan`
--
ALTER TABLE `tbl_detail_jabatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `jabatan_id` (`jabatan_id`),
  ADD KEY `gaji_guru` (`gaji_guru`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indexes for table `tbl_penerimaan_rkas`
--
ALTER TABLE `tbl_penerimaan_rkas`
  ADD PRIMARY KEY (`no_kode`);

--
-- Indexes for table `tbl_pengeluaran_rkas`
--
ALTER TABLE `tbl_pengeluaran_rkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsnp` (`idsnp`);

--
-- Indexes for table `tbl_standar_nasional`
--
ALTER TABLE `tbl_standar_nasional`
  ADD PRIMARY KEY (`idsnp`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yayasan_detail_rencana_pengeluaran`
--
ALTER TABLE `yayasan_detail_rencana_pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rencana_pengeluaran` (`id_rencana_pengeluaran`);

--
-- Indexes for table `yayasan_penerimaan_spp`
--
ALTER TABLE `yayasan_penerimaan_spp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `yayasan_realisasi_pemasukan_pengeluaran`
--
ALTER TABLE `yayasan_realisasi_pemasukan_pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `yayasan_rencana_pendapatan`
--
ALTER TABLE `yayasan_rencana_pendapatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `yayasan_rencana_pengeluaran`
--
ALTER TABLE `yayasan_rencana_pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bos_realisasi_detail_komponen`
--
ALTER TABLE `bos_realisasi_detail_komponen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bos_realisasi_pendapatan`
--
ALTER TABLE `bos_realisasi_pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bos_realisasi_rekapitulasi`
--
ALTER TABLE `bos_realisasi_rekapitulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bos_rkas`
--
ALTER TABLE `bos_rkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bos_rkas_detail`
--
ALTER TABLE `bos_rkas_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bos_rkas_rencana`
--
ALTER TABLE `bos_rkas_rencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_detail_jabatan`
--
ALTER TABLE `tbl_detail_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yayasan_penerimaan_spp`
--
ALTER TABLE `yayasan_penerimaan_spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yayasan_realisasi_pemasukan_pengeluaran`
--
ALTER TABLE `yayasan_realisasi_pemasukan_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yayasan_rencana_pendapatan`
--
ALTER TABLE `yayasan_rencana_pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `yayasan_rencana_pengeluaran`
--
ALTER TABLE `yayasan_rencana_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bos_realisasi_detail_komponen`
--
ALTER TABLE `bos_realisasi_detail_komponen`
  ADD CONSTRAINT `bos_realisasi_detail_komponen_ibfk_1` FOREIGN KEY (`relasi_id`) REFERENCES `bos_realisasi_rekapitulasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bos_realisasi_rekapitulasi`
--
ALTER TABLE `bos_realisasi_rekapitulasi`
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_1` FOREIGN KEY (`idsnp`) REFERENCES `tbl_standar_nasional` (`idsnp`),
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_2` FOREIGN KEY (`sub_program_id`) REFERENCES `bos_realisasi_komponen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_3` FOREIGN KEY (`saldo`) REFERENCES `bos_realisasi_pendapatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_realisasi_rekapitulasi_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bos_rkas`
--
ALTER TABLE `bos_rkas`
  ADD CONSTRAINT `bos_rkas_ibfk_3` FOREIGN KEY (`npsn`) REFERENCES `tbl_standar_nasional` (`idsnp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bos_rkas_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bos_rkas_detail`
--
ALTER TABLE `bos_rkas_detail`
  ADD CONSTRAINT `bos_rkas_detail_ibfk_1` FOREIGN KEY (`bos_rkas`) REFERENCES `bos_rkas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bos_rkas_rencana`
--
ALTER TABLE `bos_rkas_rencana`
  ADD CONSTRAINT `bos_rkas_rencana_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_detail_jabatan`
--
ALTER TABLE `tbl_detail_jabatan`
  ADD CONSTRAINT `tbl_detail_jabatan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_jabatan_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD CONSTRAINT `tbl_guru_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `tbl_detail_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_guru_ibfk_2` FOREIGN KEY (`gaji_guru`) REFERENCES `gaji_guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `tbl_detail_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pengeluaran_rkas`
--
ALTER TABLE `tbl_pengeluaran_rkas`
  ADD CONSTRAINT `tbl_pengeluaran_rkas_ibfk_1` FOREIGN KEY (`idsnp`) REFERENCES `tbl_standar_nasional` (`idsnp`);

--
-- Ketidakleluasaan untuk tabel `yayasan_detail_rencana_pengeluaran`
--
ALTER TABLE `yayasan_detail_rencana_pengeluaran`
  ADD CONSTRAINT `yayasan_detail_rencana_pengeluaran_ibfk_1` FOREIGN KEY (`id_rencana_pengeluaran`) REFERENCES `yayasan_rencana_pengeluaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yayasan_penerimaan_spp`
--
ALTER TABLE `yayasan_penerimaan_spp`
  ADD CONSTRAINT `yayasan_penerimaan_spp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yayasan_realisasi_pemasukan_pengeluaran`
--
ALTER TABLE `yayasan_realisasi_pemasukan_pengeluaran`
  ADD CONSTRAINT `yayasan_realisasi_pemasukan_pengeluaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yayasan_rencana_pendapatan`
--
ALTER TABLE `yayasan_rencana_pendapatan`
  ADD CONSTRAINT `yayasan_rencana_pendapatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yayasan_rencana_pengeluaran`
--
ALTER TABLE `yayasan_rencana_pengeluaran`
  ADD CONSTRAINT `yayasan_rencana_pengeluaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
