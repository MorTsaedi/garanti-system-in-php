-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2024 at 09:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guaranti`
--

-- --------------------------------------------------------

--
-- Table structure for table `imeitest`
--

CREATE TABLE `imeitest` (
  `id` int(11) NOT NULL,
  `model` varchar(24) DEFAULT NULL,
  `imei1` bigint(15) DEFAULT NULL,
  `imei2` bigint(15) DEFAULT NULL,
  `gstart` varchar(10) DEFAULT NULL,
  `gend` varchar(10) DEFAULT NULL,
  `act` int(6) DEFAULT NULL,
  `num` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `imeitest`
--

INSERT INTO `imeitest` (`id`, `model`, `imei1`, `imei2`, `gstart`, `gend`, `act`, `num`) VALUES
(1, 'XIAOMI NOTE 12 S 8+256GB', 100200300400500, 860330064252232, '1402/11/10', '1404/05/10', 202020, 1),
(2, 'XIAOMI NOTE 12 S 8+256GB', 860330064117708, 860330064117716, '1402/11/10', '1404/05/10', 202022, 1),
(3, 'XIAOMI NOTE 12 S 8+256GB', 860330064125701, 860330064125719, '1402/11/10', '1404/05/10', 202024, 1),
(4, 'XIAOMI NOTE 12 S 8+256GB', 860330064250525, 860330064250533, '1402/11/10', '1404/05/10', 202026, 1),
(5, 'XIAOMI NOTE 12 S 8+256GB', 860330064096589, 860330064096597, '1402/11/10', '1404/05/10', 202028, 1),
(6, 'XIAOMI NOTE 12 S 8+256GB', 860330064254048, 860330064254055, '1402/11/10', '1404/05/10', 202030, 1),
(7, 'XIAOMI NOTE 12 S 8+256GB', 860330064116643, 860330064116650, '1402/11/10', '1404/05/10', 202032, 0),
(8, 'XIAOMI NOTE 12 S 8+256GB', 860330064253925, 860330064253933, '1402/11/10', '1404/05/10', 202034, 1),
(9, 'XIAOMI NOTE 12 S 8+256GB', 200300400500600, 860330064252778, '1401/11/10', '1403/05/10', 202036, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `phonecte` varchar(12) NOT NULL,
  `adminid` varchar(11) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `phone`, `phonecte`, `adminid`, `address`) VALUES
(12, 'Ù…Ø±ØªØ¶ÛŒ Ø³Ø§Ø¹Ø¯ÛŒ', 'admin', '21232f297a57a5a743894a0e4a801fc3', '09016101340', '05832222682', '0670566659', 'Ø¨Ù„ÙˆØ§Ø± Ø´Ù‡Ø¯Ø§ Ú©ÙˆÚ†Ù‡ ÛŒ Ø´Ù‡Ø¯Ø§ 32 â€â€â€Ø¨Ù„Ø§Ú© 404');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_janebi`
--

CREATE TABLE `tbl_janebi` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` varchar(50) NOT NULL,
  `cusname` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `cusphone` varchar(12) NOT NULL,
  `cusid` varchar(10) NOT NULL,
  `model` varchar(100) NOT NULL,
  `imei` varchar(20) NOT NULL,
  `date` varchar(18) NOT NULL,
  `time` varchar(12) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1,
  `desc1` tinytext NOT NULL,
  `desc2` tinytext NOT NULL,
  `desc3` tinytext NOT NULL,
  `desc4` tinytext NOT NULL,
  `desc5` tinytext NOT NULL,
  `desc6` tinytext NOT NULL,
  `date1` varchar(18) NOT NULL,
  `date2` varchar(18) NOT NULL,
  `date3` varchar(18) NOT NULL,
  `date4` varchar(18) NOT NULL,
  `date5` varchar(18) NOT NULL,
  `date6` varchar(18) NOT NULL,
  `note` tinytext NOT NULL,
  `image1_name` varchar(50) NOT NULL,
  `pay` tinyint(1) NOT NULL DEFAULT 0,
  `payid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phone`
--

CREATE TABLE `tbl_phone` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` varchar(50) NOT NULL,
  `cusname` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `cusphone` varchar(12) NOT NULL,
  `cusid` varchar(10) NOT NULL,
  `model` varchar(100) NOT NULL,
  `imei` varchar(16) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(12) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1,
  `desc1` tinytext NOT NULL,
  `desc2` tinytext NOT NULL,
  `desc3` tinytext NOT NULL,
  `desc4` tinytext NOT NULL,
  `desc5` tinytext NOT NULL,
  `desc6` tinytext NOT NULL,
  `date1` varchar(18) NOT NULL,
  `date2` varchar(18) NOT NULL,
  `date3` varchar(18) NOT NULL,
  `date4` varchar(18) NOT NULL,
  `date5` varchar(18) NOT NULL,
  `date6` varchar(18) NOT NULL,
  `note` tinytext NOT NULL,
  `image1_name` varchar(50) NOT NULL,
  `pay` tinyint(1) NOT NULL DEFAULT 0,
  `payid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imeitest`
--
ALTER TABLE `imeitest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_janebi`
--
ALTER TABLE `tbl_janebi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_phone`
--
ALTER TABLE `tbl_phone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imeitest`
--
ALTER TABLE `imeitest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5939;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_janebi`
--
ALTER TABLE `tbl_janebi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204020017;

--
-- AUTO_INCREMENT for table `tbl_phone`
--
ALTER TABLE `tbl_phone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204010010;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
