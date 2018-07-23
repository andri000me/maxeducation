-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2018 at 03:05 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nirwannd_max`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap_admin` varchar(255) NOT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap_admin`, `jenis_kelamin_id`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Admin Max', 1, '1522818496967.png', '2018-03-24 10:21:14', '2018-06-02 06:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Khatolik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Khonghucu'),
(7, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
--

CREATE TABLE `domisili` (
  `id_domisili` int(11) NOT NULL,
  `domisili` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domisili`
--

INSERT INTO `domisili` (`id_domisili`, `domisili`) VALUES
(1, 'Kota Bekasi'),
(2, 'Kabupaten Bekasi'),
(3, 'Jakarta Barat'),
(4, 'Jakarta Timur'),
(5, 'Jakarta Selatan'),
(6, 'Jakarta Utara'),
(7, 'Jakarta Pusat');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_lengkap_guru` varchar(255) NOT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `agama_id` int(11) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_lengkap_guru`, `jenis_kelamin_id`, `agama_id`, `tempat_lahir`, `tanggal_lahir`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'afssss', 2, 2, 'asdf', '2018-06-20', '1529136956949.png', '2018-06-16 08:15:36', '2018-06-16 08:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mengajar`
--

CREATE TABLE `guru_mengajar` (
  `id_guru_mengajar` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru_mengajar`
--

INSERT INTO `guru_mengajar` (`id_guru_mengajar`, `guru_id`, `program_id`, `mata_pelajaran_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 6, '2018-06-16 08:16:05', '2018-06-16 08:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(11) NOT NULL,
  `jam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `jam`) VALUES
(1, '08.00'),
(2, '09.00'),
(3, '10.00'),
(4, '11.00'),
(5, '12.00'),
(6, '13.00'),
(7, '14.00'),
(8, '15.00'),
(9, '16.00'),
(10, '17.00'),
(11, '18.00'),
(12, '19.00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `program_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `slug`, `program_id`, `mata_pelajaran_id`, `created_at`, `updated_at`) VALUES
(7, 'Matematika SD', 'matematika-sd', 1, 1, '2018-04-05 07:19:47', '2018-04-28 06:44:27'),
(8, 'Bahasa Inggris SD', 'bahasa-inggris-sd', 1, 2, '2018-04-05 07:20:05', '2018-04-05 07:20:05'),
(9, 'Matematika SMP', 'matematika-smp', 2, 3, '2018-04-05 07:20:23', '2018-04-05 07:20:23'),
(11, 'IPA SMP', 'ipa-smp', 2, 4, '2018-04-26 07:47:50', '2018-04-26 07:47:50'),
(12, 'Bahasa Inggris SMP', 'bahasa-inggris-smp', 2, 5, '2018-04-26 07:48:12', '2018-04-26 07:48:12'),
(13, 'Matematika SMA', 'matematika-sma', 3, 6, '2018-04-26 07:48:57', '2018-04-26 07:48:57'),
(14, 'Fisika SMA', 'fisika-sma', 3, 7, '2018-04-26 07:49:17', '2018-04-26 07:49:17'),
(15, 'Kimia SMA', 'kimia-sma', 3, 8, '2018-04-26 07:50:57', '2018-04-26 07:50:57'),
(16, 'Ekonomi SMA', 'ekonomi-sma', 3, 9, '2018-04-26 07:51:56', '2018-04-26 07:51:56'),
(17, 'Geografi SMA', 'geografi-sma', 3, 11, '2018-04-26 07:52:24', '2018-04-26 07:52:24'),
(18, 'Sosiologi SMA', 'sosiologi-sma', 3, 10, '2018-04-26 07:53:02', '2018-04-26 07:53:02'),
(20, 'Bahasa Inggris SMA', 'bahasa-inggris-sma', 3, 12, '2018-06-16 08:20:32', '2018-06-16 08:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_comments`
--

CREATE TABLE `kelas_comments` (
  `id_kelas_comments` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `document` varchar(255) NOT NULL,
  `kelas_posts_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_posts`
--

CREATE TABLE `kelas_posts` (
  `id_kelas_posts` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_posts`
--

INSERT INTO `kelas_posts` (`id_kelas_posts`, `catatan`, `kelas_id`, `user_id`, `document`, `created_at`, `updated_at`) VALUES
(3, 'xxxxxx', 13, 2, '', '2018-06-16 08:50:12', '2018-06-16 08:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `program_id`, `mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 1, 'Matematika', '2018-03-18 17:35:58', '2018-03-27 06:28:25'),
(2, 1, 'Bahasa Inggris', '2018-03-18 17:36:36', '2018-03-27 06:28:25'),
(3, 2, 'Matematika', '2018-03-18 17:39:26', '2018-03-27 06:28:25'),
(4, 2, 'IPA', '2018-03-18 17:37:32', '2018-03-27 06:28:25'),
(5, 2, 'Bahasa Inggris', '2018-03-18 17:37:41', '2018-03-27 06:28:25'),
(6, 3, 'Matematika', '2018-03-18 17:42:20', '2018-06-02 12:49:40'),
(7, 3, 'Fisika', '2018-03-18 17:42:29', '2018-03-27 06:28:25'),
(8, 3, 'Kimia', '2018-03-18 17:42:37', '2018-03-27 06:28:25'),
(9, 3, 'Ekonomi', '2018-03-18 17:42:43', '2018-03-27 06:28:25'),
(10, 3, 'Sosiologi', '2018-03-18 17:42:49', '2018-03-27 06:28:25'),
(11, 3, 'Geografi', '2018-03-18 17:42:53', '2018-06-10 06:13:59'),
(12, 3, 'Bahasa Inggris', '2018-03-18 17:43:03', '2018-03-27 06:28:25'),
(13, 4, 'Matematika', '2018-03-18 17:43:20', '2018-03-27 06:28:25'),
(14, 4, 'Fisika', '2018-03-18 17:43:24', '2018-03-27 06:28:25'),
(15, 4, 'Kimia', '2018-03-18 17:43:28', '2018-03-27 06:28:25'),
(17, 4, 'Ekonomi', '2018-03-18 17:43:40', '2018-03-27 06:28:25'),
(18, 4, 'Sosiologi', '2018-03-18 17:43:46', '2018-03-27 06:28:25'),
(19, 4, 'Geografi', '2018-03-18 17:43:52', '2018-03-27 06:28:25'),
(20, 5, 'Conversation', '2018-03-18 17:44:40', '2018-03-27 06:28:25'),
(21, 5, 'Reading', '2018-03-18 17:44:59', '2018-03-27 06:28:25'),
(22, 5, 'Writing', '2018-03-18 17:45:06', '2018-03-27 06:28:25'),
(23, 6, 'Guitar', '2018-03-18 17:45:31', '2018-03-27 06:28:25'),
(24, 6, 'Piano', '2018-03-18 17:45:36', '2018-03-27 06:28:25'),
(25, 6, 'Keyboard', '2018-03-18 17:45:44', '2018-03-27 06:28:25'),
(26, 6, 'Drumb', '2018-03-18 17:45:50', '2018-03-27 06:28:25'),
(27, 6, 'Violin', '2018-03-18 17:45:58', '2018-03-27 06:28:25'),
(28, 4, 'Bahasa Inggris', '2018-04-04 07:02:36', '2018-04-04 07:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `program`, `created_at`, `updated_at`) VALUES
(1, 'SD', '2018-03-19 00:24:49', '2018-03-28 04:26:28'),
(2, 'SMP', '2018-03-19 00:24:49', '2018-03-24 10:17:20'),
(3, 'SMA', '2018-03-19 00:24:49', '2018-03-24 10:17:20'),
(4, 'SBMPTN', '2018-03-19 00:24:49', '2018-03-24 10:17:20'),
(5, 'English', '2018-03-19 00:24:49', '2018-03-24 10:17:20'),
(6, 'Music', '2018-03-19 00:24:49', '2018-03-24 10:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_lengkap_siswa` varchar(255) NOT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `agama_id` int(11) NOT NULL,
  `nomor_hp_siswa` varchar(25) NOT NULL,
  `nomor_hp_ayah` varchar(25) NOT NULL,
  `nomor_hp_ibu` varchar(25) NOT NULL,
  `nama_orang_tua` varchar(25) NOT NULL,
  `nomor_hp_saudara_serumah` varchar(25) NOT NULL,
  `nomor_telepon_rumah` varchar(25) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `domisili_id` int(11) NOT NULL,
  `tingkat_sekolah_id` int(11) NOT NULL,
  `program_id` int(255) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `tahu_dari` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_lengkap_siswa`, `jenis_kelamin_id`, `agama_id`, `nomor_hp_siswa`, `nomor_hp_ayah`, `nomor_hp_ibu`, `nama_orang_tua`, `nomor_hp_saudara_serumah`, `nomor_telepon_rumah`, `alamat_lengkap`, `domisili_id`, `tingkat_sekolah_id`, `program_id`, `kelas`, `nama_sekolah`, `tahu_dari`, `avatar`, `registered`, `updated_at`) VALUES
(1, 'afa', 2, 2, '21312', '', '', 'asdfasdf', '', '', 'asdfasf', 4, 2, 2, 'asdf', 'afaf', 'Flyer di Sekolah', '', '2018-06-10 06:12:06', '2018-06-10 06:12:06'),
(2, 'adf', 2, 1, '2312', '', '', 'asfa', '', '', 'asfasdf', 3, 4, 2, 'asdfasdf', 'asdfas', 'Flyer di Sekolah', '', '2018-06-16 07:57:17', '2018-06-16 07:57:17'),
(3, 'asfas', 2, 2, '23421', '', '', 'asf', '', '', 'asdfasdf', 3, 4, 4, 'af', 'afsf', 'Flyer di Sekolah', '', '2018-06-16 07:58:46', '2018-06-16 08:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_absensi`
--

CREATE TABLE `siswa_absensi` (
  `id_siswa_absensi` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `hari_id` int(11) NOT NULL,
  `jam_id` int(11) NOT NULL,
  `laporan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_absensi`
--

INSERT INTO `siswa_absensi` (`id_siswa_absensi`, `guru_id`, `siswa_id`, `mata_pelajaran_id`, `hari_id`, `jam_id`, `laporan`, `created_at`) VALUES
(1, 1, 1, 4, 1, 2, 'adsf', '2018-06-10 06:30:55'),
(2, 1, 1, 3, 1, 3, 'asdfasdfasdf adsfasdfsdaf', '2018-06-13 17:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_belajar_gratis`
--

CREATE TABLE `siswa_belajar_gratis` (
  `id_siswa_belajar_gratis` int(11) NOT NULL,
  `nama_lengkap_siswa` varchar(255) NOT NULL,
  `gelombang` varchar(255) NOT NULL,
  `nama_ig` varchar(255) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_belajar_gratis`
--

INSERT INTO `siswa_belajar_gratis` (`id_siswa_belajar_gratis`, `nama_lengkap_siswa`, `gelombang`, `nama_ig`, `registered`) VALUES
(1, 'Andre', 'Gelombang 1', '@andre_', '2018-03-10 18:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_detail_hari`
--

CREATE TABLE `siswa_detail_hari` (
  `id_siswa_detail_hari` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `hari_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_detail_hari`
--

INSERT INTO `siswa_detail_hari` (`id_siswa_detail_hari`, `siswa_id`, `hari_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2018-06-10 06:12:06', '2018-06-10 06:12:06'),
(2, 1, 5, '2018-06-10 06:12:06', '2018-06-10 06:12:06'),
(3, 2, 2, '2018-06-16 07:57:17', '2018-06-16 07:57:17'),
(4, 3, 3, '2018-06-16 07:58:46', '2018-06-16 07:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_detail_jam`
--

CREATE TABLE `siswa_detail_jam` (
  `id_siswa_detail_jam` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `jam_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_detail_jam`
--

INSERT INTO `siswa_detail_jam` (`id_siswa_detail_jam`, `siswa_id`, `jam_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2018-06-10 06:12:06', '2018-06-10 06:12:06'),
(2, 1, 10, '2018-06-10 06:12:06', '2018-06-10 06:12:06'),
(3, 2, 3, '2018-06-16 07:57:17', '2018-06-16 07:57:17'),
(4, 3, 4, '2018-06-16 07:58:46', '2018-06-16 07:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_detail_mata_pelajaran`
--

CREATE TABLE `siswa_detail_mata_pelajaran` (
  `id_siswa_detail_mata_pelajaran` int(11) NOT NULL,
  `siswa_id` int(255) NOT NULL,
  `mata_pelajaran_id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_detail_mata_pelajaran`
--

INSERT INTO `siswa_detail_mata_pelajaran` (`id_siswa_detail_mata_pelajaran`, `siswa_id`, `mata_pelajaran_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2018-06-10 06:12:06', '2018-06-10 06:12:06'),
(2, 1, 4, '2018-06-10 06:12:06', '2018-06-10 06:12:06'),
(3, 2, 4, '2018-06-16 07:57:17', '2018-06-16 07:57:17'),
(4, 3, 14, '2018-06-16 07:58:46', '2018-06-16 07:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_jadwal`
--

CREATE TABLE `siswa_jadwal` (
  `id_siswa_jadwal` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `hari_id` int(11) NOT NULL,
  `jam_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id_slideshow` int(11) NOT NULL,
  `image_slideshow` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id_slideshow`, `image_slideshow`, `keterangan`, `created_at`) VALUES
(1, '1522825095797.jpg', '', '2018-04-04 06:58:15'),
(2, '1522825142468.jpeg', '', '2018-04-04 06:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_sekolah`
--

CREATE TABLE `tingkat_sekolah` (
  `id_tingkat_sekolah` int(11) NOT NULL,
  `tingkat_sekolah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat_sekolah`
--

INSERT INTO `tingkat_sekolah` (`id_tingkat_sekolah`, `tingkat_sekolah`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA IPA'),
(4, 'SMA IPS'),
(5, 'SMK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role_id`, `admin_id`, `guru_id`, `siswa_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '$2y$10$5Wsu6bxtoQEdPGE8BGr7l.XL/x8SVr9iwqELbvzP8IJUtuXuloPvO', 1, 1, 0, 0, '2018-06-10 06:06:16', '2018-06-10 06:06:16'),
(2, 'susi', '$2y$10$5hrviFvp.PCYstAK7Q93eOlPSvlhCk6nKYHFa0FsTUwL8.Hy17CCq', 2, 0, 1, 0, '2018-06-10 06:24:50', '2018-06-10 06:24:50'),
(3, 'siswa', '$2y$10$geuYaAkud8vAP7N0aHaWHe01d2m3tHPAOzq4Xq9i50iKlz2ra56vy', 3, 0, 0, 3, '2018-06-16 08:31:50', '2018-06-16 08:31:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `guru_mengajar`
--
ALTER TABLE `guru_mengajar`
  ADD PRIMARY KEY (`id_guru_mengajar`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_comments`
--
ALTER TABLE `kelas_comments`
  ADD PRIMARY KEY (`id_kelas_comments`);

--
-- Indexes for table `kelas_posts`
--
ALTER TABLE `kelas_posts`
  ADD PRIMARY KEY (`id_kelas_posts`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `siswa_absensi`
--
ALTER TABLE `siswa_absensi`
  ADD PRIMARY KEY (`id_siswa_absensi`);

--
-- Indexes for table `siswa_belajar_gratis`
--
ALTER TABLE `siswa_belajar_gratis`
  ADD PRIMARY KEY (`id_siswa_belajar_gratis`);

--
-- Indexes for table `siswa_detail_hari`
--
ALTER TABLE `siswa_detail_hari`
  ADD PRIMARY KEY (`id_siswa_detail_hari`);

--
-- Indexes for table `siswa_detail_jam`
--
ALTER TABLE `siswa_detail_jam`
  ADD PRIMARY KEY (`id_siswa_detail_jam`);

--
-- Indexes for table `siswa_detail_mata_pelajaran`
--
ALTER TABLE `siswa_detail_mata_pelajaran`
  ADD PRIMARY KEY (`id_siswa_detail_mata_pelajaran`);

--
-- Indexes for table `siswa_jadwal`
--
ALTER TABLE `siswa_jadwal`
  ADD PRIMARY KEY (`id_siswa_jadwal`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id_slideshow`);

--
-- Indexes for table `tingkat_sekolah`
--
ALTER TABLE `tingkat_sekolah`
  ADD PRIMARY KEY (`id_tingkat_sekolah`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru_mengajar`
--
ALTER TABLE `guru_mengajar`
  MODIFY `id_guru_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kelas_comments`
--
ALTER TABLE `kelas_comments`
  MODIFY `id_kelas_comments` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_posts`
--
ALTER TABLE `kelas_posts`
  MODIFY `id_kelas_posts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa_absensi`
--
ALTER TABLE `siswa_absensi`
  MODIFY `id_siswa_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa_belajar_gratis`
--
ALTER TABLE `siswa_belajar_gratis`
  MODIFY `id_siswa_belajar_gratis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa_detail_hari`
--
ALTER TABLE `siswa_detail_hari`
  MODIFY `id_siswa_detail_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa_detail_jam`
--
ALTER TABLE `siswa_detail_jam`
  MODIFY `id_siswa_detail_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa_detail_mata_pelajaran`
--
ALTER TABLE `siswa_detail_mata_pelajaran`
  MODIFY `id_siswa_detail_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa_jadwal`
--
ALTER TABLE `siswa_jadwal`
  MODIFY `id_siswa_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id_slideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tingkat_sekolah`
--
ALTER TABLE `tingkat_sekolah`
  MODIFY `id_tingkat_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
