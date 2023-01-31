-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 11:45 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_riswan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monitoring_hutan`
--

CREATE TABLE `tbl_monitoring_hutan` (
  `id_data` int(255) NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `suhu` varchar(255) NOT NULL,
  `kualitas_udara` varchar(255) NOT NULL,
  `kelembaman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_monitoring_hutan`
--

INSERT INTO `tbl_monitoring_hutan` (`id_data`, `tgl`, `jam`, `suhu`, `kualitas_udara`, `kelembaman`) VALUES
(1, '31-12-2021', '17:00:00', '33', '57', '57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_monitoring_hutan`
--
ALTER TABLE `tbl_monitoring_hutan`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_monitoring_hutan`
--
ALTER TABLE `tbl_monitoring_hutan`
  MODIFY `id_data` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
