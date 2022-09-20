/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `sdp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sdp`;

CREATE TABLE IF NOT EXISTS `acc` (
  `no` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `akun` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` varchar(50) NOT NULL,
  `nama_jabatan` varchar(70) NOT NULL,
  `singkatan_jabatan` varchar(6) NOT NULL,
  PRIMARY KEY (`id_jabatan`),
  KEY `singkatan_jabatan` (`singkatan_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `main_surat` (
  `id_main_surat` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat_keluar` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  PRIMARY KEY (`id_main_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_surat_keluar` date NOT NULL,
  `jenis_surat_keluar` varchar(50) NOT NULL,
  `jabatan_surat_keluar` varchar(50) NOT NULL,
  `perihal_surat_keluar` varchar(50) NOT NULL,
  `tujuan_surat_keluar` varchar(50) NOT NULL,
  `approve_surat_keluar` varchar(10) NOT NULL,
  `tanggal_update_surat_keluar` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `upload_surat_keluar` varchar(500) NOT NULL,
  `nomor_surat_keluar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_surat_keluar`),
  KEY `nomor_surat_keluar` (`nomor_surat_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat_masuk` varchar(50) NOT NULL,
  `jenis_surat_masuk` varchar(50) NOT NULL,
  `perihal_surat_masuk` varchar(50) NOT NULL,
  `tanggal_surat_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sifat_surat_masuk` varchar(50) NOT NULL,
  `asal_surat_masuk` varchar(100) NOT NULL,
  `upload_surat_masuk` varchar(500) NOT NULL,
  `status_surat_masuk` varchar(50) NOT NULL,
  PRIMARY KEY (`id_surat_masuk`),
  KEY `no_surat_masuk` (`no_surat_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `surat_respon` (
  `id_surat_respon` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat_keluar` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  PRIMARY KEY (`id_surat_respon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
