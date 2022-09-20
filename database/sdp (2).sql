-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2022 pada 04.48
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acc`
--

CREATE TABLE `acc` (
  `id` int(4) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `acc`
--

INSERT INTO `acc` (`id`, `role`) VALUES
(2, 'administartor'),
(3, 'member ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `jabatan`) VALUES
(7, 'naufal faishal', 'naupalf06@gmail.com', 'default.jpg', '$2y$10$mVy.b.GAOmT8KeK8At9h8uij/2Eh/SHfs8k7vhy.gPQCMbDvzup/K', '2', 1, 'mentri'),
(8, 'raihan', 'raihan@gmail.com', 'default.jpg', '$2y$10$mjHKKjMAaIMmKDuAAAzCrOmWCBIOyciKfNkRWh/EB5QsxS.CVdBQq', '3', 1, ''),
(9, 'as', 'jeje@gmail.com', 'default.jpg', '$2y$10$swu/QYH521E3/j4rwHgGBepO9ZMUHjtQ0ov3uJ6DuLfMUVvZ6y/PC', '2', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(70) NOT NULL,
  `singkatan_jabatan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `singkatan_jabatan`) VALUES
(1, 'kaprodi', 'kp'),
(2, 'konan', 'kn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_surat`
--

CREATE TABLE `main_surat` (
  `id_main_surat` int(11) NOT NULL,
  `id_surat_keluar` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perihal`
--

CREATE TABLE `perihal` (
  `id_perihal` int(11) NOT NULL,
  `perihal_surat` varchar(50) DEFAULT NULL,
  `singkatan_perihal` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perihal`
--

INSERT INTO `perihal` (`id_perihal`, `perihal_surat`, `singkatan_perihal`) VALUES
(1, 'Surat Keputusan', 'SKEP'),
(2, 'Surat Keluar', 'MHC'),
(3, 'Surat Keterangan', 'SKET'),
(4, 'Surat Kuasa', 'SKU'),
(5, 'Surat Memo', 'M'),
(6, 'Surat Tugas', 'STU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `tanggal_surat_keluar` date DEFAULT NULL,
  `jenis_surat_keluar` varchar(50) DEFAULT NULL,
  `jabatan_surat_keluar` varchar(50) DEFAULT NULL,
  `perihal_surat_keluar` varchar(50) DEFAULT NULL,
  `tujuan_surat_keluar` varchar(50) DEFAULT NULL,
  `approve` varchar(10) DEFAULT 'menunggu',
  `tanggal_update_surat_keluar` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file` varchar(255) DEFAULT NULL,
  `nomor_surat_keluar` varchar(50) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `tanggal_surat_keluar`, `jenis_surat_keluar`, `jabatan_surat_keluar`, `perihal_surat_keluar`, `tujuan_surat_keluar`, `approve`, `tanggal_update_surat_keluar`, `file`, `nomor_surat_keluar`, `status`) VALUES
(1, '2022-08-22', 'kp', NULL, NULL, 'cscs', NULL, '2022-08-22 09:51:40', NULL, '001-LRS-PHL-kp-VIII-2022', 'N'),
(2, '2022-08-22', 'kp', NULL, 'SKEP', 'scsc', 'N', '2022-08-31 14:09:47', NULL, '002-LRS-SKEP-kp-VIII-2022', 'Y'),
(3, '2022-08-22', 'kp', NULL, NULL, 'csscsc', NULL, '2022-08-22 09:51:56', NULL, '003-LRS-PHL-kp-VIII-2022', 'N'),
(4, '2022-08-22', 'kp', NULL, NULL, 'cscsc', NULL, '2022-08-22 09:52:18', NULL, '004-LRS-PHL-kp-VIII-2022', 'N'),
(5, '2022-08-22', 'kp', NULL, NULL, 'test', NULL, '2022-08-22 10:08:25', NULL, '005-LRS-PHL-kp-VIII-2022', 'N'),
(6, '2022-08-22', 'kp', NULL, NULL, 'test', NULL, '2022-08-22 10:08:32', NULL, '006-LRS-PHL-kp-VIII-2022', 'N'),
(7, '2022-08-22', 'kp', NULL, NULL, 'vdv', NULL, '2022-08-22 10:11:29', NULL, '007-LRS-PHL-kp-VIII-2022', 'N'),
(8, '2022-08-22', 'kp', NULL, NULL, 'vdv', NULL, '2022-08-22 10:41:07', NULL, '008-LRS-PHL-kp-VIII-2022', 'N'),
(9, '2022-08-22', 'kp', NULL, NULL, 'cscs', NULL, '2022-08-22 10:41:34', NULL, '009-LRS-PHL-kp-VIII-2022', 'N'),
(10, '2022-08-22', 'kp', NULL, NULL, 'csc', NULL, '2022-08-22 10:41:40', NULL, '010-LRS-PHL-kp-VIII-2022', 'N'),
(11, '2022-08-22', 'kp', NULL, NULL, 'csc', NULL, '2022-08-22 10:42:23', NULL, '011-LRS-PHL-kp-VIII-2022', 'N'),
(12, '2022-08-22', 'kp', NULL, NULL, 'csc', NULL, '2022-08-22 10:42:34', NULL, '012-LRS-PHL-kp-VIII-2022', 'N'),
(13, '2022-08-22', 'kp', NULL, NULL, 'xcxc', NULL, '2022-08-22 10:45:00', NULL, '013-LRS-PHL-kp-VIII-2022', 'N'),
(14, '2022-08-22', 'kp', NULL, NULL, 'cccc', NULL, '2022-08-22 10:45:11', NULL, '014-LRS-PHL-kp-VIII-2022', 'N'),
(15, '2022-08-22', 'kp', NULL, NULL, 'cscs', NULL, '2022-08-22 12:58:07', NULL, '015-LRS-PHL-kp-VIII-2022', 'N'),
(16, '2022-08-27', 'scsc', NULL, NULL, NULL, 'approve', '2022-08-31 14:18:03', '', NULL, 'Y'),
(17, '2022-08-31', 'kp', NULL, 'SKEP', 'fefef', NULL, '2022-08-31 14:19:02', NULL, '017-LRS-SKEP-kp-VIII-2022', 'Y'),
(18, '2022-08-31', 'kp', NULL, 'SKEP', 'kosong', 'kosong', '2022-08-31 14:20:04', NULL, '018-LRS-SKEP-kp-VIII-2022', 'Y'),
(19, '2022-08-31', 'kp', NULL, 'SKEP', 'okeoeko', 'menunggu', '2022-08-31 14:52:57', NULL, '019-LRS-SKEP-kp-VIII-2022', 'Y'),
(20, '2022-08-31', 'kn', NULL, 'MHC', 'ok', 'menunggu', '2022-08-31 14:53:08', NULL, '020-LRS-MHC-kn-VIII-2022', 'Y'),
(21, '2022-09-02', 'kp', NULL, 'SKEP', 'tgl2', 'menunggu', '2022-08-31 15:35:50', NULL, '001-LRS-SKEP-kp-IX-2022', 'Y'),
(22, '2022-08-31', 'kp', NULL, NULL, 'hehe', 'menunggu', '2022-08-31 16:10:03', NULL, '021-LRS-PHL-kp-VIII-2022', 'N'),
(23, '2022-08-31', 'kp', NULL, NULL, 'test', 'menunggu', '2022-08-31 16:12:13', NULL, '022-LRS-PHL-kp-VIII-2022', 'N'),
(24, '2022-08-31', 'kp', NULL, NULL, 'we', 'menunggu', '2022-08-31 16:12:55', NULL, '023-LRS-PHL-kp-VIII-2022', 'N'),
(25, '2022-08-31', 'kp', NULL, NULL, 'wewe', 'menunggu', '2022-08-31 16:14:14', NULL, '024-LRS-PHL-kp-VIII-2022', 'N'),
(26, '2022-08-31', 'kp', NULL, NULL, 'ww', 'menunggu', '2022-08-31 16:20:07', NULL, '025-LRS-PHL-kp-VIII-2022', 'N'),
(27, '2022-08-31', 'kp', NULL, NULL, 'www', 'menunggu', '2022-08-31 16:21:00', NULL, '026-LRS-PHL-kp-VIII-2022', 'N'),
(28, '2022-08-31', 'kp', NULL, NULL, 'www', 'menunggu', '2022-08-31 16:22:46', NULL, '027-LRS-PHL-kp-VIII-2022', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_surat_masuk` varchar(50) NOT NULL,
  `jenis_surat_masuk` varchar(50) DEFAULT NULL,
  `perihal_surat_masuk` varchar(50) DEFAULT NULL,
  `tanggal_surat_masuk` date DEFAULT NULL,
  `sifat_surat_masuk` varchar(50) DEFAULT NULL,
  `asal_surat_masuk` varchar(100) DEFAULT NULL,
  `file` varchar(500) DEFAULT NULL,
  `status_surat_masuk` varchar(50) DEFAULT NULL,
  `is_respon` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_surat_masuk`, `jenis_surat_masuk`, `perihal_surat_masuk`, `tanggal_surat_masuk`, `sifat_surat_masuk`, `asal_surat_masuk`, `file`, `status_surat_masuk`, `is_respon`) VALUES
(6, 'ascas', 'ascascas', '', '2022-07-23', '', '', '', '', 1),
(7, 'asvas', 'penting', '223', '2022-07-25', '23', '232', '232', '', 1),
(8, '', NULL, '', '0000-00-00', '', '', '', NULL, 0),
(9, 'as', NULL, 'as', '0000-00-00', 'asas', 'asa', '', NULL, 1),
(10, 'csa', NULL, 'asc', '0000-00-00', 'ascasc', 'ascasc', '', NULL, 1),
(11, 'testing', NULL, 'acda', '0000-00-00', 'ac', 'acac', '', NULL, 1),
(12, 'qw', NULL, 'wd', '0000-00-00', 'wqdqwd', 'dwqdqw', '', NULL, 0),
(13, 'testing123', NULL, 'testing', '0000-00-00', 'ii', 'ii', '', NULL, 0),
(14, 'restu', NULL, '12', '0000-00-00', '12', '12', '', NULL, 1),
(15, 'xa', '2', 'xsa', '0000-00-00', 'xsa', 'xsa', '', NULL, 0),
(16, 'xa', '2', 'xsa', '0000-00-00', 'xsa', 'xsa', '', NULL, 0),
(17, 'csa', '1', 'asc', '0000-00-00', 'ascasc', 'ascasc', 'TEST_KARTU_PJU1.pdf', NULL, 0),
(18, 'csa', '1', 'asc', '0000-00-00', 'ascasc', 'ascasc', 'TEST_KARTU_PJU11.pdf', NULL, 0),
(19, 'real', 'test', 're', '0000-00-00', 're', 're', 'HMIF.pdf', NULL, 0),
(20, 'testing tanggal', 'test', 'testing tanggal', '0000-00-00', 'testing tanggal', 'testing tanggal', '212-220623-fti-1420_Hasil_kuisioner_pembelajaran_genap_21-22_FTI.pdf', NULL, 0),
(21, 'test tanggal', 'test', 'test tanggal', '0000-00-00', 'test tanggal', 'test tanggal', 'abok_ganteng_(1).docx', NULL, 0),
(22, 'tgl', 'test', 'tgl', '2022-08-10', 'tgl', 'tgl', 'LPJ_BP_2020-2021.pdf', NULL, 0),
(23, 'scacacac', 'test', 'cacc`c`c`', '2022-08-06', 'c', 'c', '3364-Pengumuman_KTM_2020.pdf', NULL, 1),
(24, '123', 'res', '2', '2022-08-25', 'wqdqwd', 'rektor', 'RD_Tarik_Tambang1.pdf', NULL, 1),
(25, 'csacs', 'kaprodi', 'csac', '2022-08-15', 'sc', 'cs', '152019010_NaufalFaishalFalah_A.pdf', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_respon`
--

CREATE TABLE `surat_respon` (
  `id_surat_respon` int(11) NOT NULL,
  `tanggal_surat_respon` date DEFAULT NULL,
  `jenis_surat_respon` varchar(50) DEFAULT NULL,
  `jabatan_surat_respon` varchar(50) DEFAULT NULL,
  `perihal_surat_respon` varchar(50) DEFAULT NULL,
  `tujuan_surat_respon` varchar(50) DEFAULT NULL,
  `approve` varchar(10) DEFAULT 'menunggu',
  `tanggal_update_surat_respon` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file` varchar(500) DEFAULT NULL,
  `nomor_surat_respon` varchar(50) DEFAULT NULL,
  `nomor_surat_masuk` varchar(50) DEFAULT NULL,
  `no_surat_masuk` varchar(50) NOT NULL,
  `id_surat_keluar_respon` int(11) NOT NULL,
  `is_respon` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_respon`
--

INSERT INTO `surat_respon` (`id_surat_respon`, `tanggal_surat_respon`, `jenis_surat_respon`, `jabatan_surat_respon`, `perihal_surat_respon`, `tujuan_surat_respon`, `approve`, `tanggal_update_surat_respon`, `file`, `nomor_surat_respon`, `nomor_surat_masuk`, `no_surat_masuk`, `id_surat_keluar_respon`, `is_respon`) VALUES
(1, '2022-08-22', 'kp', NULL, NULL, 'cscs', 'menunggu', '2022-08-31 15:54:24', NULL, '001-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(2, '2022-08-22', 'kp', NULL, NULL, 'csscsc', 'menunggu', '2022-08-31 15:54:25', NULL, '003-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(3, '2022-08-22', 'kp', NULL, NULL, 'cscsc', 'menunggu', '2022-08-31 15:54:26', NULL, '004-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(4, '2022-08-22', 'kp', NULL, NULL, 'test', 'menunggu', '2022-08-31 15:54:27', NULL, '005-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(5, '2022-08-22', 'kp', NULL, NULL, 'test', 'menunggu', '2022-08-31 15:54:28', NULL, '006-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(6, '2022-08-22', 'kp', NULL, NULL, 'vdv', 'menunggu', '2022-08-31 15:54:30', NULL, '007-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(7, '2022-08-22', 'kp', NULL, NULL, 'vdv', 'menunggu', '2022-08-31 15:54:31', NULL, '008-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(8, '2022-08-22', 'kp', NULL, NULL, 'cscs', NULL, '2022-08-22 10:41:34', NULL, '009-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(9, '2022-08-22', 'kp', NULL, NULL, 'csc', NULL, '2022-08-22 10:41:40', NULL, '010-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(10, '2022-08-22', 'kp', NULL, NULL, 'csc', NULL, '2022-08-22 10:42:23', NULL, '011-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(11, '2022-08-22', 'kp', NULL, NULL, 'csc', NULL, '2022-08-22 10:42:34', NULL, '012-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(12, '2022-08-22', 'kp', NULL, NULL, 'xcxc', NULL, '2022-08-22 10:45:00', NULL, '013-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(13, '2022-08-22', 'kp', NULL, NULL, 'cccc', NULL, '2022-08-22 10:45:11', NULL, '014-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(14, '2022-08-22', 'kp', NULL, NULL, 'cscs', NULL, '2022-08-22 12:58:07', NULL, '015-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(15, '2022-08-31', 'kp', NULL, NULL, 'hehe', 'menunggu', '2022-08-31 16:10:03', NULL, '021-LRS-PHL-kp-VIII-2022', '24', '', 0, NULL),
(16, '2022-08-31', 'kp', NULL, NULL, 'test', 'menunggu', '2022-08-31 16:12:13', NULL, '022-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(17, '2022-08-31', 'kp', NULL, NULL, 'we', 'menunggu', '2022-08-31 16:12:55', NULL, '023-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL),
(18, '2022-08-31', 'kp', NULL, NULL, 'wewe', 'menunggu', '2022-08-31 16:14:14', NULL, '024-LRS-PHL-kp-VIII-2022', NULL, '25', 0, NULL),
(19, '2022-08-31', 'kp', NULL, NULL, 'ww', 'menunggu', '2022-08-31 16:20:07', NULL, '025-LRS-PHL-kp-VIII-2022', NULL, '12', 0, NULL),
(20, '2022-08-31', 'kp', NULL, NULL, 'www', 'menunggu', '2022-08-31 16:21:00', NULL, '026-LRS-PHL-kp-VIII-2022', NULL, '12', 0, NULL),
(21, '2022-08-31', 'kp', NULL, NULL, 'www', 'menunggu', '2022-08-31 16:22:46', NULL, '027-LRS-PHL-kp-VIII-2022', NULL, '', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamplate`
--

CREATE TABLE `tamplate` (
  `No` int(3) NOT NULL,
  `Contoh` varchar(258) DEFAULT NULL,
  `file` varchar(258) DEFAULT NULL,
  `keterangan` varchar(258) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acc`
--
ALTER TABLE `acc`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `main_surat`
--
ALTER TABLE `main_surat`
  ADD PRIMARY KEY (`id_main_surat`);

--
-- Indeks untuk tabel `perihal`
--
ALTER TABLE `perihal`
  ADD PRIMARY KEY (`id_perihal`) USING BTREE;

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `nomor_surat_keluar` (`nomor_surat_keluar`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `no_surat_masuk` (`no_surat_masuk`);

--
-- Indeks untuk tabel `surat_respon`
--
ALTER TABLE `surat_respon`
  ADD PRIMARY KEY (`id_surat_respon`);

--
-- Indeks untuk tabel `tamplate`
--
ALTER TABLE `tamplate`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acc`
--
ALTER TABLE `acc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `main_surat`
--
ALTER TABLE `main_surat`
  MODIFY `id_main_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perihal`
--
ALTER TABLE `perihal`
  MODIFY `id_perihal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `surat_respon`
--
ALTER TABLE `surat_respon`
  MODIFY `id_surat_respon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tamplate`
--
ALTER TABLE `tamplate`
  MODIFY `No` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
