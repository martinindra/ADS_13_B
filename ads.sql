-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 07:59 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ads`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_nama`
--

CREATE TABLE `anggota_nama` (
  `id_kom` int(3) NOT NULL,
  `id_prof` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_nama`
--

INSERT INTO `anggota_nama` (`id_kom`, `id_prof`, `nama`, `status`) VALUES
(2, 8, 'Martin', 'wakil ketua'),
(1, 9, 'Deni', 'anggota');

--
-- Triggers `anggota_nama`
--
DELIMITER $$
CREATE TRIGGER `delang` BEFORE INSERT ON `anggota_nama` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"DELETE","ANGGOTA_NAMA");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insang` AFTER INSERT ON `anggota_nama` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"INSERT","ANGGOTA_NAMA");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upang` AFTER UPDATE ON `anggota_nama` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"UPDATE","ANGGOTA_NAMA");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(3) NOT NULL,
  `nama_event` varchar(25) NOT NULL,
  `tanggal` datetime NOT NULL,
  `penyedia` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `tanggal`, `penyedia`, `tempat`, `deskripsi`) VALUES
(1, 'Bersih-Bersih Desa', '2018-04-30 10:00:00', 'komunitas sehat bersama', 'Batu', 'MARI BERSIH BERSIH SEHAT BERSAMA DI DESA DI BATU GUYS'),
(8, 'TANAM SERIBU POHON', '2018-04-18 08:00:00', 'KOMUNITAS PEDULI LINGKUNGAN', 'MALANG (UM)', 'MARI TANAM SERIBU POHON'),
(10, 'REBOISASI', '2018-04-29 10:00:00', 'Komunitas Peduli Lingkungan', 'NGANTANG', 'MARI REBOISASI');

--
-- Triggers `event`
--
DELIMITER $$
CREATE TRIGGER `delev` AFTER DELETE ON `event` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"DELETE","EVENT");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insev` AFTER INSERT ON `event` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"INSERT","EVENT");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upev` AFTER UPDATE ON `event` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"UPDATE","EVENT");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
  `id_kom` int(3) NOT NULL,
  `nama_kom` varchar(50) NOT NULL,
  `nama_ket` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah_anggota` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`id_kom`, `nama_kom`, `nama_ket`, `deskripsi`, `jumlah_anggota`) VALUES
(1, 'komunitas asek', 'didi', 'INI KOMUNITAS ASEK CERIA DINAMIS', 12),
(2, 'komunitas sehat bersama', 'kiki', 'ini komunitas sehat bersama dengan alam', 500),
(3, 'Komunitas Peduli Lingkungan', 'Fikri', 'KOMUNITAS INI BERTUJUAN UNTUK MEMBUAT MASYARAKAT SADAR AKAN LINGKUNGAN HIDUP. BAIK MEERAWAT LINGKUNGAN HINGGA MNEJAGA LINGKUNGAN AGAR TETAP ASRI SAMPAI HARI TUA', 123),
(4, 'komunitas ceria', 'jono', 'Mari bangung komunitas yang ceria guys', 12),
(5, 'Komunitas MOGE(Mobil Gede)', 'Dino', 'Mari tunjukkan mobil-mobil berkelas dan berkualitas', 300);

--
-- Triggers `komunitas`
--
DELIMITER $$
CREATE TRIGGER `delkom` AFTER DELETE ON `komunitas` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"DELETE","KOMUNITAS");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inskom` AFTER INSERT ON `komunitas` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"INSERT","KOMUNITAS");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upkom` AFTER UPDATE ON `komunitas` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"UPDATE","KOMUNITAS");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` bigint(12) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` varchar(25) NOT NULL,
  `tabel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `time`, `keterangan`, `tabel`) VALUES
(1, '2018-04-29 16:20:19', 'INSERT', 'KOMUNITAS'),
(2, '2018-04-29 16:22:10', 'INSERT', 'KOMUNITAS'),
(3, '2018-04-29 16:23:49', 'UPDATE', 'KOMUNITAS'),
(4, '2018-04-29 16:29:13', 'INSERT', 'EVENT'),
(5, '2018-04-29 16:30:22', 'INSERT', 'PROFILE'),
(6, '2018-04-29 16:31:12', 'DELETE', 'ANGGOTA_NAMA'),
(7, '2018-04-29 16:31:12', 'INSERT', 'ANGGOTA_NAMA'),
(8, '2018-04-29 16:31:12', 'DELETE', 'ANGGOTA_NAMA'),
(9, '2018-04-29 16:31:12', 'INSERT', 'ANGGOTA_NAMA'),
(10, '2018-04-29 16:32:06', 'UPDATE', 'PROFILE'),
(11, '2018-04-29 16:32:19', 'UPDATE', 'PROFILE'),
(12, '2018-04-29 16:33:48', 'INSERT', 'PROFILE'),
(13, '2018-04-29 16:33:48', 'INSERT', 'PROFILE'),
(14, '2018-04-29 16:33:59', 'DELETE', 'PROFILE'),
(15, '2018-04-29 16:34:31', 'INSERT', 'PROFILE'),
(16, '2018-04-29 16:35:34', 'UPDATE', 'PROFILE'),
(17, '2018-04-30 03:51:01', 'INSERT', 'KOMUNITAS'),
(18, '2018-04-30 03:59:02', 'INSERT', 'EVENT'),
(19, '2018-04-30 04:01:49', 'INSERT', 'EVENT'),
(20, '2018-04-30 05:10:18', 'INSERT', 'PROFILE'),
(21, '2018-04-30 05:17:35', 'INSERT', 'KOMUNITAS'),
(22, '2018-04-30 05:17:35', 'INSERT', 'KOMUNITAS');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_prof` int(3) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `registration` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_prof`, `Name`, `FirstName`, `LastName`, `username`, `password`, `status`, `registration`) VALUES
(8, 'Martin', 'martin', 'Indra', 'martin', 'martin', 'admin', '2018-04-29 23:32:19'),
(9, 'Deni', 'Deni', 'Dono', 'deni', 'deni', 'admin_kom', '2018-04-08 00:00:00'),
(10, 'Didi', 'didi', 'kiko', 'diko', 'diko', 'admin_kom', '2018-04-09 00:00:00'),
(12, 'Kiki', 'kiki', 'dido', 'kidi', 'kidi', 'admin_kom', '2018-04-29 23:35:34'),
(13, 'doni doni', 'doni', 'doni', 'doni', 'doni', NULL, '2018-04-17 00:00:00');

--
-- Triggers `profile`
--
DELIMITER $$
CREATE TRIGGER `delprof` AFTER DELETE ON `profile` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"DELETE","PROFILE");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insprof` AFTER INSERT ON `profile` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"INSERT","PROFILE");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upprof` BEFORE UPDATE ON `profile` FOR EACH ROW BEGIN
	INSERT INTO log(time, keterangan, tabel)
    VALUES(now(),"UPDATE","PROFILE");
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_nama`
--
ALTER TABLE `anggota_nama`
  ADD UNIQUE KEY `id_prof` (`id_prof`),
  ADD UNIQUE KEY `id_kom` (`id_kom`) USING BTREE;

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`id_kom`),
  ADD UNIQUE KEY `nama_kom` (`nama_kom`),
  ADD UNIQUE KEY `nama_ket` (`nama_ket`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_prof`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `id_kom` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_prof` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_nama`
--
ALTER TABLE `anggota_nama`
  ADD CONSTRAINT `anggota_nama_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `profile` (`id_prof`),
  ADD CONSTRAINT `anggota_nama_ibfk_2` FOREIGN KEY (`id_kom`) REFERENCES `komunitas` (`id_kom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
