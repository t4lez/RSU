-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 08:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsud_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `bannerId` int(11) NOT NULL,
  `image` varchar(192) DEFAULT NULL,
  `createAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`bannerId`, `image`, `createAt`) VALUES
(1, 'def082c0280de6c11c4d97fc2b2e7fd1.jpg', '2024-05-08 14:52:19'),
(2, '050d67c1b80110c7d716817c822b07b4.jpg', '2024-05-08 14:52:19'),
(3, '8f50a449f0dfc7d725c036f3365488e8.jpg', '2024-05-08 14:52:19'),
(4, 'dc5449cfe13d2810e3a66b430983b16b.jpg', '2024-05-08 14:52:19'),
(5, '86e1a7b465122959a881b0f1a072205c.jpg', '2024-05-08 14:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `bookingId` bigint(20) NOT NULL,
  `pasienId` bigint(20) DEFAULT NULL,
  `ruanganId` int(11) DEFAULT NULL,
  `kelasId` int(11) DEFAULT NULL,
  `namaPasien` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `namaRuangan` varchar(100) DEFAULT NULL,
  `namaKelas` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `createAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`bookingId`, `pasienId`, `ruanganId`, `kelasId`, `namaPasien`, `alamat`, `namaRuangan`, `namaKelas`, `status`, `createAt`) VALUES
(1, 4, 3, 3, 'Pasien A', 'Jl. Belum Jadi No.1', 'R. RPDC', '3', 0, '2024-05-08 11:56:58'),
(2, 4, 3, 3, 'Pasien A', 'Jl. Belum Jadi No.1', 'R. RPDC', '3', 1, '2024-05-08 11:57:38'),
(3, 4, 3, 3, 'Pasien A', 'Jl. Belum Jadi No.1', 'R. RPDC', '3', 1, '2024-05-08 11:57:50'),
(4, 1, 3, 3, 'Budi', 'Jl. Budi Utomo No.10', 'R. RPDC', '3', 1, '2024-05-08 12:05:52'),
(5, 5, 3, 3, 'Bambang', 'akjsdnakd', 'R. RPDC', '3', 1, '2024-05-08 12:37:16'),
(6, 4, 3, 3, 'Pasien A', 'Jl. Belum Jadi No.1', 'R. RPDC', '3', 1, '2024-05-08 12:44:29'),
(7, 4, 2, 2, 'Pasien A', 'Jl. Belum Jadi No.1', 'R. RPBD', '2', 1, '2024-05-08 15:50:29'),
(8, 4, 13, 2, 'Pasien A', 'Jl. Belum Jadi No.1', 'R. RPDC', '2', 1, '2024-05-10 13:41:27'),
(9, 7, 14, 1, 'Siska Nanda', 'Jl. Pura Pura Sayang No. 99', 'R. RPDC', '1', 1, '2024-05-11 12:22:45'),
(10, 9, 40, 3, 'Ronggo', 'Metro', 'RPDA', '3', 1, '2024-07-28 23:22:41'),
(11, 10, 25, 1, 'Rangga', '16c', 'R. PARU PARU', '1', 1, '2024-07-28 23:58:48'),
(12, 11, 26, 1, 'Mariska', '16c', 'R. SARAF', '1', 1, '2024-07-29 00:32:03'),
(13, 12, 25, 1, 'Novia', '16c', 'R. PARU PARU', '1', 1, '2024-07-29 00:37:29'),
(14, 13, 26, 1, 'Mariska', '16c', 'R. SARAF', '1', 1, '2024-07-29 09:21:18'),
(15, 9, 22, 1, 'Ronggo', 'Metro', 'RPDA', '1', 0, '2024-08-03 14:35:05'),
(16, 9, 47, 3, 'Ronggo', 'Metro', 'R. NUWO 3', '3', 1, '2024-08-03 15:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE `tbl_config` (
  `keyKode` varchar(100) NOT NULL,
  `keyValue` text DEFAULT NULL,
  `keyStatus` tinyint(1) DEFAULT 0,
  `keyDeskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`keyKode`, `keyValue`, `keyStatus`, `keyDeskripsi`) VALUES
('jmlRuang', '11', 0, NULL),
('webAddress', 'Jl. Ir. Soekarno No.201, Mojorejo, \r\nKec. Junrejo, Kota Batu, \r\nJawa Timur 65322', 1, NULL),
('webDescription', '<div>\r\n<div><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat at veniam a nesciunt, accusantium amet illo rerum culpa deleniti! Neque nobis molestias voluptatem rem maiores tempora natus consectetur voluptas non saepe nostrum dolorem odio quis alias, id nemo illum quidem nulla quos labore voluptate accusamus recusandae eum. Amet odio at vitae eum ab incidunt natus fuga atque aut quam dolorum odit eius molestiae, maxime nulla nostrum omnis. Omnis maiores libero, voluptates nemo minima numquam illo quidem, deserunt reiciendis excepturi est esse consectetur nulla optio repellat consequuntur ipsum dolores corrupti eius tempora repudiandae eligendi suscipit cumque! Delectus maxime dicta expedita temporibus.</span></div>\r\n</div>', 1, NULL),
('webFavicon', 'f2f4844a00a2a9e18695100473ac049f.ico', 1, NULL),
('webLogo', '005b002e531e34c8652aa480979b3906.png', 1, NULL),
('webLogoSecondary', '7506d0db896aaf2a4c3e1aa63a65c0dc.png', 1, NULL),
('webName', 'RUMAH SAKIT UMUM JENDRAL AHMAD  YANI KOTA METRO', 1, NULL),
('webWhatsapp', '+6212381763816', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_manager`
--

CREATE TABLE `tbl_file_manager` (
  `fileManagerId` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `storage` varchar(128) DEFAULT 'local',
  `createAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createBy` int(11) DEFAULT NULL,
  `updateBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_file_manager`
--

INSERT INTO `tbl_file_manager` (`fileManagerId`, `nama`, `storage`, `createAt`, `updateAt`, `createBy`, `updateBy`) VALUES
(1, 'e2c68e9f43f9e174b63a6968d7b5e11b.jpg', 'local', '2024-05-09 17:43:07', '2024-05-09 17:43:07', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Admisi', 'Admisi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_attempts`
--

CREATE TABLE `tbl_login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `pasienId` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `noHp` varchar(15) NOT NULL,
  `createAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`pasienId`, `nama`, `alamat`, `noHp`, `createAt`) VALUES
(1, 'Budi', 'Jl. Budi Utomo No.10', '08587123683', '2024-05-07 08:00:30'),
(4, 'Pasien A', 'Jl. Belum Jadi No.1', '0812312313123', '2024-05-07 15:54:07'),
(5, 'Bambangs', 'akjsdnakds', '083715375171', '2024-05-08 12:37:16'),
(6, 'Edi Supratman', 'Jl. Jalan No. 2', '0811293048476', '2024-05-11 09:30:36'),
(7, 'Siska Nanda', 'Jl. Pura Pura Sayang No. 99', '0899123456790', '2024-05-11 09:31:13'),
(8, 'Meylani Dwi Puspita', 'Jl. Kenangan No. 09', '0877623514283', '2024-05-11 09:31:44'),
(9, 'Ronggo', 'Metro', '08756347281', '2024-07-28 23:22:41'),
(10, 'Rangga', '16c', '087784928138', '2024-07-28 23:58:48'),
(11, 'Mariska', '16c', '0986847281', '2024-07-29 00:32:03'),
(12, 'Novia', '16c', '087784021035', '2024-07-29 00:37:29'),
(13, 'Mariska', '16c', '08758849321', '2024-07-29 09:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `ruanganId` int(11) NOT NULL,
  `urutan` int(3) NOT NULL,
  `kelasId` int(11) NOT NULL,
  `namaRuangan` varchar(100) NOT NULL,
  `jumlahKamar` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `backgroundColor` varchar(100) DEFAULT '#E1F5F1',
  `foregroundColor` varchar(100) DEFAULT '#33866C',
  `createAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`ruanganId`, `urutan`, `kelasId`, `namaRuangan`, `jumlahKamar`, `backgroundColor`, `foregroundColor`, `createAt`) VALUES
(22, 1, 1, 'RPDA', 3, '#e1cccc', '#ff0000', '2024-07-23 22:01:59'),
(23, 2, 1, 'RPDB', 3, '#e1cccc', '#ff0000', '2024-07-23 22:02:22'),
(24, 3, 1, 'RPDC', 1, '#ffcccc', '#ff0000', '2024-07-23 22:02:44'),
(25, 4, 1, 'R. PARU PARU', 3, '#ffcccc', '#ff0000', '2024-07-23 22:03:22'),
(26, 5, 1, 'R. SARAF', 3, '#ffcccc', '#ff0000', '2024-07-23 22:03:42'),
(27, 6, 1, 'R. BERSALIN', 3, '#ffcccc', '#ff0000', '2024-07-23 22:04:19'),
(28, 7, 1, 'R. NUWO 2', 3, '#ffcccc', '#ff0000', '2024-07-23 22:04:54'),
(30, 8, 1, 'R. JANTUNG', 3, '#ffcccc', '#ff0000', '2024-07-23 22:05:52'),
(31, 1, 2, 'RPDA', 6, '#e1f5f1', '#33866c', '2024-07-23 22:07:04'),
(32, 2, 2, 'RPDB', 6, '#e1f5f1', '#33866c', '2024-07-23 22:07:14'),
(33, 3, 2, 'RPDC', 6, '#e1f5f1', '#33866c', '2024-07-23 22:07:30'),
(34, 4, 2, 'R. PARU PARU', 6, '#e1f5f1', '#33866c', '2024-07-23 22:07:55'),
(35, 5, 2, 'R. SARAF', 6, '#e1f5f1', '#33866c', '2024-07-23 22:08:15'),
(36, 6, 2, 'R. BERSALIN', 6, '#e1f5f1', '#33866c', '2024-07-23 22:08:38'),
(37, 7, 2, 'R. NUWO 2', 6, '#e1f5f1', '#33866c', '2024-07-23 22:09:05'),
(38, 8, 2, 'R. NUWO 3', 6, '#e1f5f1', '#33866c', '2024-07-23 22:09:18'),
(39, 9, 2, 'R. JANTUNG', 6, '#e1f5f1', '#33866c', '2024-07-23 22:09:26'),
(40, 1, 3, 'RPDA', 6, '#b3ccff', '#003cb3', '2024-07-23 22:10:24'),
(41, 2, 3, 'RPDB', 6, '#b3ccff', '#003cb3', '2024-07-23 22:11:00'),
(42, 3, 3, 'RPDC', 6, '#b3ccff', '#003cb3', '2024-07-23 22:11:31'),
(43, 4, 3, 'R. PARU PARU', 6, '#b3ccff', '#003cb3', '2024-07-23 22:12:06'),
(44, 5, 3, 'R. SARAF', 6, '#b3ccff', '#003cb3', '2024-07-23 22:12:34'),
(45, 6, 3, 'R. BERSALIN', 6, '#b3ccff', '#003cb3', '2024-07-23 22:13:01'),
(46, 7, 3, 'R. NUWO 2', 0, '#b3ccff', '#003cb3', '2024-07-23 22:13:47'),
(47, 8, 3, 'R. NUWO 3', 6, '#b3ccff', '#003cb3', '2024-07-23 22:14:17'),
(48, 9, 3, 'R. JANTUNG', 6, '#b3ccff', '#003cb3', '2024-07-23 22:14:54'),
(51, 9, 1, 'R. NUWO 3', 3, '#ffcccc', '#ff0000', '2024-07-31 22:18:37'),
(52, 10, 2, 'R. ICU', 6, '#e1f5f1', '#33866c', '2024-07-31 22:19:11'),
(53, 10, 1, 'R. ICU', 3, '#ffcccc', '#ff0000', '2024-07-31 22:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan_kelas`
--

CREATE TABLE `tbl_ruangan_kelas` (
  `kelasId` int(11) NOT NULL,
  `namaKelas` varchar(100) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ruangan_kelas`
--

INSERT INTO `tbl_ruangan_kelas` (`kelasId`, `namaKelas`, `createAt`) VALUES
(1, '1', '2024-05-07 16:22:24'),
(2, '2', '2024-05-07 16:22:24'),
(3, '3', '2024-05-07 16:22:24'),
(4, '4', '2024-05-10 13:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(10) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(3) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$A3X4MHDu5cBM.dOlQQevX.RXRhcJJAUq3XUIBlwKa81fEwGd79coq', NULL, 'ronggosurya49@gmail.com', NULL, NULL, NULL, NULL, 1268889823, 1723442008, 1, 'Ronggo', 'Surya', '', '0819341782383'),
(4, '127.0.0.1', 'admisi', '$2y$08$/wWhg5fteP2A.vB5UDBt2e4aFqGKcH0WlD4cokTRgWj4n7pJXaWVm', NULL, 'admisi@rsud.com', NULL, NULL, NULL, NULL, 1715067959, 1722219527, 1, 'Ronggo', 'Surya', '', '098764281321');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_groups`
--

CREATE TABLE `tbl_users_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users_groups`
--

INSERT INTO `tbl_users_groups` (`id`, `user_id`, `group_id`) VALUES
(6, 1, 1),
(3, 2, 2),
(7, 4, 2),
(4, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertracking`
--

CREATE TABLE `usertracking` (
  `id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `user_identifier` varchar(255) NOT NULL,
  `request_uri` text NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `client_ip` varchar(50) NOT NULL,
  `client_user_agent` text NOT NULL,
  `referer_page` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertracking`
--

INSERT INTO `usertracking` (`id`, `session_id`, `user_identifier`, `request_uri`, `timestamp`, `client_ip`, `client_user_agent`, `referer_page`) VALUES
(0, '1715166414', '', '/', '1715166414', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166414', '', '/', '1715166414', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166468', '', '/', '1715166468', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166472', '', '/login', '1715166472', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166520', '', '/login', '1715166520', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166626', '', '/login', '1715166626', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166627', '', '/login', '1715166627', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166725', '', '/', '1715166725', '192.168.11.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', ''),
(0, '1715166831', '', '/', '1715166831', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166901', '', '/login', '1715166901', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166901', '', '/login', '1715166924', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166901', '', '/login', '1715166935', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715166901', '', '/dashboard', '1715166943', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715166901', '', '/pasien/get_json', '1715166946', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715166901', '', '/pasien', '1715166953', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715166901', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715166953', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715166901', '', '/ruangan', '1715166954', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715166901', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -', '1715166954', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715166901', '', '/booking', '1715166955', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715166901', '', '//booking/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -&filterRuangan=- Pilih Ruangan -', '1715166955', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/booking'),
(0, '1715166901', '', '/setting', '1715166956', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/booking'),
(0, '1715166901', '', '/profile', '1715166959', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715166960', '', '/', '1715166960', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/profile'),
(0, '1715167148', '', '/', '1715167148', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715167148', '', '/login', '1715167164', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715167148', '', '/dashboard', '1715167170', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715167148', '', '/pasien/get_json', '1715167171', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715167190', '', '/', '1715167190', '192.168.11.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', ''),
(0, '1715166960', '', '/', '1715167192', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/profile'),
(0, '1715166960', '', '/', '1715167205', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715167148', '', '/dashboard', '1715167270', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715167148', '', '/pasien/get_json', '1715167272', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715167285', '', '/login', '1715167285', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715167285', '', '/dashboard', '1715167290', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715167285', '', '/pasien/get_json', '1715167290', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715167285', '', '/pasien', '1715167309', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715167285', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715167310', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715167285', '', '/dashboard', '1715167317', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715167285', '', '/pasien/get_json', '1715167317', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715167285', '', '/pasien', '1715167328', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715167285', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715167328', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715167285', '', '/dashboard', '1715167332', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715167285', '', '/pasien/get_json', '1715167332', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715167388', '', '/', '1715167388', '192.168.11.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', ''),
(0, '1715167652', '', '/', '1715167652', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715168367', '', '/', '1715168367', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715168368', '', '/', '1715168368', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715168373', '', '/', '1715168373', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715168374', '', '/', '1715168374', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715168609', '', '/pasien', '1715168609', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715168609', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715168612', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715168609', '', '/booking', '1715168724', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715168609', '', '//booking/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -&filterRuangan=- Pilih Ruangan -', '1715168725', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/booking'),
(0, '1715168609', '', '/user', '1715168726', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/booking'),
(0, '1715168609', '', '//user/get_json/?search=&offset=0&limit=5&filterGroup=', '1715168727', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715168972', '', '/', '1715168972', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715171563', '', '/', '1715171563', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', ''),
(0, '1715171563', '', '/', '1715171563', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', ''),
(0, '1715171626', '', '/', '1715171626', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', ''),
(0, '1715171629', '', '/', '1715171629', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', ''),
(0, '1715171633', '', '/', '1715171633', '192.168.11.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', ''),
(0, '1715171851', '', '/', '1715171851', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:83.0) Gecko/20100101 Firefox/83.0', ''),
(0, '1715171854', '', '/', '1715171854', '192.168.11.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:125.0) Gecko/20100101 Firefox/125.0', ''),
(0, '1715171865', '', '/', '1715171865', '192.168.11.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36', ''),
(0, '1715173229', '', '/', '1715173229', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', ''),
(0, '1715173229', '', '/', '1715173229', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', ''),
(0, '1715173234', '', '/', '1715173234', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', ''),
(0, '1715174904', '', '/', '1715174904', '192.168.11.1', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', ''),
(0, '1715179600', '', '/', '1715179600', '192.168.11.1', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', ''),
(0, '1715179602', '', '/', '1715179602', '192.168.11.1', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', ''),
(0, '1715184396', '', '/', '1715184396', '192.168.11.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', ''),
(0, '1715184405', '', '/', '1715184405', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', ''),
(0, '1715192581', '', '/', '1715192581', '192.168.11.1', 'Mozilla/5.0 zgrab/0.x', ''),
(0, '1715196239', '', '/', '1715196239', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:83.0) Gecko/20100101 Firefox/83.0', ''),
(0, '1715196242', '', '/', '1715196242', '192.168.11.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:125.0) Gecko/20100101 Firefox/125.0', ''),
(0, '1715196250', '', '/', '1715196250', '192.168.11.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36', ''),
(0, '1715206944', '', '/', '1715206944', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', ''),
(0, '1715206944', '', '/', '1715206944', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', ''),
(0, '1715207215', '', '/', '1715207215', '192.168.11.1', 'Mozilla/5.0 (Linux; Android 11; M2004J15SC) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Mobile Safari/537.36', ''),
(0, '1715208955', '', '/', '1715208955', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', ''),
(0, '1715208956', '', '/', '1715208956', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', ''),
(0, '1715208959', '', '/', '1715208959', '192.168.11.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', ''),
(0, '1715209200', '', '/', '1715209200', '192.168.11.1', 'Mozilla/5.0 (Linux; Android 11; M2004J15SC) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Mobile Safari/537.36', ''),
(0, '1715212829', '', '/', '1715212829', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715214624', '', '/', '1715214624', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715216425', '', '/', '1715216425', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715218221', '', '/', '1715218221', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715219703', '', '/', '1715219703', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:83.0) Gecko/20100101 Firefox/83.0', ''),
(0, '1715219705', '', '/', '1715219705', '192.168.11.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:125.0) Gecko/20100101 Firefox/125.0', ''),
(0, '1715219725', '', '/', '1715219726', '192.168.11.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36', ''),
(0, '1715220025', '', '/', '1715220025', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715221389', '', '/', '1715221389', '192.168.11.1', 'Mozilla/5.0 zgrab/0.x', ''),
(0, '1715221823', '', '/', '1715221823', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715223630', '', '/', '1715223630', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715225422', '', '/', '1715225422', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715227228', '', '/', '1715227228', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715229023', '', '/', '1715229023', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715230832', '', '/', '1715230832', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715232625', '', '/', '1715232625', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715234434', '', '/', '1715234434', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715236225', '', '/', '1715236225', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715238031', '', '/', '1715238031', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715239822', '', '/', '1715239822', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715241632', '', '/', '1715241632', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715243425', '', '/', '1715243425', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715245229', '', '/', '1715245229', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715247024', '', '/', '1715247024', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715248832', '', '/', '1715248832', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715250624', '', '/', '1715250624', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715252435', '', '/', '1715252435', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715253730', '', '/', '1715253730', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715253730', '', '/', '1715253735', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/'),
(0, '1715253730', '', '/login', '1715253741', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715253730', '', '/', '1715253750', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/login'),
(0, '1715253730', '', '/login', '1715253759', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715254224', '', '/', '1715254225', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715254369', '', '/', '1715254370', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/login'),
(0, '1715254369', '', '/login', '1715254405', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715254369', '', '/', '1715254414', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/login'),
(0, '1715254369', '', '/login', '1715254461', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715254369', '', '/dashboard', '1715254485', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715254369', '', '/pasien/get_json', '1715254486', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715254491', '', '/', '1715254491', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715256032', '', '/', '1715256032', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715257609', '', '/login', '1715257609', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715257609', '', '/dashboard', '1715257615', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715257609', '', '/pasien/get_json', '1715257616', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '/ruangan', '1715257620', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -', '1715257620', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715257609', '', '/dashboard', '1715257622', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715257609', '', '/pasien/get_json', '1715257623', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '/ruangan', '1715257625', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -', '1715257626', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715257609', '', '/dashboard', '1715257627', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '/pasien/get_json', '1715257628', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '/ruangan', '1715257629', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -', '1715257629', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715257609', '', '/dashboard', '1715257632', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '/pasien/get_json', '1715257633', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '/ruangan', '1715257643', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -', '1715257644', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715257609', '', '/dashboard', '1715257647', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257609', '', '/pasien/get_json', '1715257647', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715257824', '', '/', '1715257824', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715259633', '', '/', '1715259633', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715259772', '', '/', '1715259772', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715259772', '', '/login', '1715259775', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715259772', '', '/login', '1715259778', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/login'),
(0, '1715259772', '', '/dashboard', '1715259785', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715259772', '', '/pasien/get_json', '1715259786', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715259772', '', '/dashboard', '1715259999', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715259772', '', '/pasien/get_json', '1715260006', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715259772', '', '/profile', '1715260014', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715259772', '', '/profile/update', '1715260033', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/profile'),
(0, '1715259772', '', '/profile', '1715260034', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/profile'),
(0, '1715259772', '', '/profile/update', '1715260044', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/profile'),
(0, '1715259772', '', '/profile', '1715260045', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/profile'),
(0, '1715259772', '', '/pasien', '1715260058', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/profile'),
(0, '1715259772', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715260061', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715259772', '', '/pasien', '1715260067', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/profile'),
(0, '1715259772', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715260070', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715259772', '', '/pasien/update', '1715260099', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715259772', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715260100', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715261424', '', '/', '1715261424', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715261679', '', '/', '1715261679', '192.168.11.1', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', ''),
(0, '1715263234', '', '/', '1715263234', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715263545', '', '/dashboard', '1715263545', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715263545', '', '/pasien/get_json', '1715263549', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715263545', '', '/ruangan', '1715263560', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715263545', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -', '1715263562', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715263545', '', '/pasien', '1715263571', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715263545', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715263574', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715265023', '', '/', '1715265023', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715266826', '', '/', '1715266826', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715268625', '', '/', '1715268625', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715270429', '', '/', '1715270429', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715272224', '', '/', '1715272224', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715274025', '', '/', '1715274025', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715275823', '', '/', '1715275823', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715276201', '', '/', '1715276201', '192.168.11.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:83.0) Gecko/20100101 Firefox/83.0', ''),
(0, '1715276204', '', '/', '1715276204', '192.168.11.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:125.0) Gecko/20100101 Firefox/125.0', ''),
(0, '1715276213', '', '/', '1715276213', '192.168.11.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36', ''),
(0, '1715276401', '', '/', '1715276401', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715276423', '', '/', '1715276423', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715276423', '', '/login', '1715276427', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715276423', '', '/dashboard', '1715276430', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715276423', '', '/pasien/get_json', '1715276433', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715276423', '', '/pasien', '1715276434', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715276423', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715276435', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715276423', '', '/ruangan', '1715276436', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715276423', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -', '1715276437', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715276423', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=', '1715276440', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715276423', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=', '1715276442', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715276423', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=2', '1715276445', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715276423', '', '/kelas', '1715276447', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715276423', '', '//kelas/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -', '1715276448', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/kelas'),
(0, '1715276423', '', '/booking', '1715276454', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/kelas'),
(0, '1715276423', '', '//booking/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -&filterRuangan=- Pilih Ruangan -', '1715276455', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/booking'),
(0, '1715276423', '', '//booking/get_json/?search=&offset=0&limit=5&filterKelas=3&filterRuangan=- Pilih Ruangan -', '1715276460', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/booking'),
(0, '1715276423', '', '//booking/get_json/?search=&offset=0&limit=10&filterKelas=3&filterRuangan=- Pilih Ruangan -', '1715276464', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/booking'),
(0, '1715276423', '', '/user', '1715276468', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/booking'),
(0, '1715276423', '', '//user/get_json/?search=&offset=0&limit=5&filterGroup=', '1715276469', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715276423', '', '/setting', '1715276470', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715276423', '', '/setting/update', '1715276482', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715276423', '', '/setting', '1715276483', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715276423', '', '/', '1715276486', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715276423', '', '/', '1715276487', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715276423', '', '/setting/update_multiple', '1715276502', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715276423', '', '/setting', '1715276504', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715276423', '', '/', '1715276506', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715276423', '', '/setting/update_multiple', '1715276558', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715276423', '', '/setting', '1715276560', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715276423', '', '/', '1715276575', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715276423', '', '/media/file/get_file_manager_images', '1715276582', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715276423', '', '/media/file/upload_file_manager_image', '1715276587', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715276423', '', '/media/file/get_file_manager_images', '1715276588', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715276423', '', '/media/file/get_file_manager_images', '1715276621', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715279249', '', '/', '1715279249', '192.168.11.1', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', ''),
(0, '1715279264', '', '/?fbclid=IwZXh0bgNhZW0CMTEAAR3VDdoCYPklFS1l4nxm0PXf8TIhiWBNWN-926IJWldmhOJKp_zzYPRTBXY_aem_AdRqMfGbWHytQJaz_c70TtOCIhGnBQRvPx4L6GaSnNPC3VRN_uNyo_Pa4UFoB7dm86gkkH8SWObAJEFtZ7_SMxa_', '1715279264', '192.168.11.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36', ''),
(0, '1715279297', '', '/', '1715279297', '192.168.11.1', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', ''),
(0, '1715279423', '', '/', '1715279423', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715283023', '', '/', '1715283023', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715284826', '', '/', '1715284826', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715286623', '', '/', '1715286623', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715288429', '', '/', '1715288429', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715290224', '', '/', '1715290224', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715292029', '', '/', '1715292029', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715293823', '', '/', '1715293823', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715295623', '', '/', '1715295623', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715297044', '', '/', '1715297044', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715297044', '', '/', '1715297065', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715297044', '', '/', '1715297242', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715297044', '', '/', '1715297262', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715297422', '', '/', '1715297422', '192.168.11.1', 'Go-http-client/1.1', ''),
(0, '1715297838', '', '/', '1715297838', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/setting'),
(0, '1715297838', '', '/login', '1715297842', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', ''),
(0, '1715297838', '', '/dashboard', '1715297845', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/acl/login'),
(0, '1715297838', '', '/pasien/get_json', '1715297846', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715297838', '', '/pasien', '1715297848', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715297838', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715297849', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715297838', '', '/dashboard', '1715297852', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715297838', '', '/pasien/get_json', '1715297853', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715297838', '', '/pasien', '1715297854', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715297838', '', '//pasien/get_json/?search=&offset=0&limit=5&filterStatus=- Pilih Status -', '1715297855', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715297838', '', '/dashboard', '1715297856', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/pasien'),
(0, '1715297838', '', '/pasien/get_json', '1715297857', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715297838', '', '/ruangan', '1715297859', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715297838', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -', '1715297859', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715297838', '', '//ruangan/get_json/?search=&offset=0&limit=5&filterKelas=- Pilih Kelas -', '1715297862', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715297838', '', '/dashboard', '1715297868', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715297838', '', '/pasien/get_json', '1715297869', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715297838', '', '/dashboard', '1715297904', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715297838', '', '/pasien/get_json', '1715297905', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard'),
(0, '1715297838', '', '/', '1715297909', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715297838', '', '/', '1715298013', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/user'),
(0, '1715297838', '', '/dashboard', '1715298024', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/ruangan'),
(0, '1715297838', '', '/pasien/get_json', '1715298026', '192.168.11.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'https://rsu.alphatechin.id/dashboard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`bannerId`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `ruanganId` (`ruanganId`),
  ADD KEY `kelasId` (`kelasId`),
  ADD KEY `pasienId` (`pasienId`);

--
-- Indexes for table `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`keyKode`);

--
-- Indexes for table `tbl_file_manager`
--
ALTER TABLE `tbl_file_manager`
  ADD PRIMARY KEY (`fileManagerId`),
  ADD KEY `createBy` (`createBy`);

--
-- Indexes for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login_attempts`
--
ALTER TABLE `tbl_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`pasienId`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`ruanganId`);

--
-- Indexes for table `tbl_ruangan_kelas`
--
ALTER TABLE `tbl_ruangan_kelas`
  ADD PRIMARY KEY (`kelasId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_groups`
--
ALTER TABLE `tbl_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `bannerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `bookingId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_file_manager`
--
ALTER TABLE `tbl_file_manager`
  MODIFY `fileManagerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_login_attempts`
--
ALTER TABLE `tbl_login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `pasienId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `ruanganId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_ruangan_kelas`
--
ALTER TABLE `tbl_ruangan_kelas`
  MODIFY `kelasId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users_groups`
--
ALTER TABLE `tbl_users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
