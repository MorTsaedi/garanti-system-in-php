-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 10:21 AM
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
-- Database: `test`
--

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
(12, 'Ù…Ø±ØªØ¶ÛŒ Ø³Ø§Ø¹Ø¯ÛŒ', 'admin', '21232f297a57a5a743894a0e4a801fc3', '09016101340', '05832222682', '0670566659', 'Ø¨Ù„ÙˆØ§Ø± Ø´Ù‡Ø¯Ø§ Ú©ÙˆÚ†Ù‡ ÛŒ Ø´Ù‡Ø¯Ø§ 32 â€â€â€Ø¨Ù„Ø§Ú© 404'),
(15, 'Ù†Ø§Ø¯Ø± Ø³Ø§Ø¹Ø¯ÛŒ', 'mortex', 'a01610228fe998f515a72dd730294d87', '09016101340', '', '', 'Ø¨Ù„ÙˆØ§Ø± Ø´Ù‡Ø¯Ø§ Ú©ÙˆÚ†Ù‡ ÛŒ Ø´Ù‡Ø¯Ø§ 32 â€â€â€Ø¨Ù„Ø§Ú© 404Ø®Ø±Ø§Ø³Ø§Ù† Ø´Ù…Ø§Ù„ÛŒ - Ø¨Ø¬Ù†ÙˆØ±Ø¯ -'),
(17, 'Ù‚Ø§Ø³Ù… ÛŒØ²Ø¯Ø§Ù†ÛŒ', 'ghasem', '827ccb0eea8a706c4c34a16891f84e7b', '09155852778', '05832222682', '0670566659', 'Ø®ÙˆÙ†Ù…ÙˆÙ†');

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
  `pay` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_janebi`
--

INSERT INTO `tbl_janebi` (`id`, `admin`, `cusname`, `description`, `cusphone`, `cusid`, `model`, `imei`, `date`, `time`, `status`, `desc1`, `desc2`, `desc3`, `desc4`, `desc5`, `desc6`, `date1`, `date2`, `date3`, `date4`, `date5`, `date6`, `note`, `image1_name`, `pay`) VALUES
(204020014, 'admin', 'Ø³ØªØ§Ø± Ø³Ø§Ø¹Ø¯ÛŒ', 'Ú¯ÙˆØ´ Ø³Ù…Øª Ø±Ø§Ø³Øª Ù‚Ø·Ø¹ Ùˆ ÙˆØµÙ„ Ù…ÛŒØ´ÙˆØ¯', '09155852778', '0670566659', 'mi buds 5 pro', '123456789123456', '12:30-1403/3/7', '', 6, 'Ø¨Ù„ÙˆØªÙˆØ« Ú¯ÙˆØ´ÛŒ Ø³Ù…Øª Ø±Ø§Ø³Øª Ù‚Ø·Ø¹ Ù…ÛŒØ´ÙˆØ¯', 'Ø³ÙˆÚ©Øª Ø¨Ù„ÙˆØªÙˆØ« Ø¯Ø³ØªÚ¯Ø§Ù‡ Ù†ÛŒØ§Ø² Ø¨Ù‡ ØªØ¹Ù…ÛŒØ± Ø¯Ø§Ø±Ø¯', 'Ù†ÛŒØ§Ø²ÛŒ Ø¨Ù‡ Ù‚Ø·Ø¹Ù‡ Ù†Ø¯Ø§Ø±Ø¯', 'Ø§ØªØµØ§Ù„ÛŒ Ù‡Ø§ÛŒ Ø³ÙˆÚ©Øª ØªØ¹Ù…ÛŒØ± Ø´Ø¯Ù†Ø¯', 'Ú¯ÙˆØ´ Ø³Ù…Øª Ø±Ø§Ø³Øª Ø¨Ù‡ Ø®ÙˆØ¨ÛŒ Ú©Ø§Ø± Ù…ÛŒÚ©Ù†Ø¯', 'Ø¨Ø§ Ù¾Ø³Øª Ø§Ø±Ø³Ø§Ù„ Ø´Ø¯ Ú©Ø¯ Ø±Ù‡Ú¯ÛŒØ±ÛŒ:\r\n32135415154651313', '12:30-1403/3/7', '12:31-1403/3/7', '12:31-1403/3/7', '12:32-1403/3/7', '12:33-1403/3/7', '13:45-1403/4/17', 'Ú†ÛŒØ²ÛŒ Ø¨Ù‡ Ø°Ù‡Ù†Ù… Ù†Ø±Ø³ÛŒØ¯', '2040200148705.jpg', 1),
(204020015, 'ghasem', 'Ù‚Ø§Ø³Ù… ÛŒØ²Ø¯Ø§Ù†ÛŒ', 'Ø´Ø§Ø±Ú˜ Ù†Ù…ÛŒ Ø´ÙˆØ¯', '09155852778', '0670566659', 'iphone 13', '123456789123456', '13:48-1403/4/17', '', 4, '', '', '', '', '', '', '', '', '', '13:49-1403/4/17', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Sadeko Momo', 6.00, 3, 18.00, '2020-11-30 03:49:48', 'Cancelled', 'Bradley Farrell', '+1 (576) 504-4657', 'zuhafiq@mailinator.com', 'Duis aliqua Qui lor'),
(2, 'Best Burger', 4.00, 4, 16.00, '2020-11-30 03:52:43', 'On Delivery', 'Kelly Dillard', '+1 (908) 914-3106', 'fexekihor@mailinator.com', 'Incidunt ipsum ad d'),
(3, 'Mixed Pizza', 10.00, 2, 20.00, '2020-11-30 04:07:17', 'Delivered', 'Jana Bush', '+1 (562) 101-2028', 'tydujy@mailinator.com', 'Minima iure ducimus');

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
  `pay` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_phone`
--

INSERT INTO `tbl_phone` (`id`, `admin`, `cusname`, `description`, `cusphone`, `cusid`, `model`, `imei`, `date`, `time`, `status`, `desc1`, `desc2`, `desc3`, `desc4`, `desc5`, `desc6`, `date1`, `date2`, `date3`, `date4`, `date5`, `date6`, `note`, `image1_name`, `pay`) VALUES
(204010005, 'admin', 'Ø³Ø¬Ø§Ø¯ Ø±Ø¶ÙˆØ§Ù†ÛŒ', 'Ú¯ÙˆØ´ÛŒ Ø¯Ø± Ø­ÛŒÙ† Ø´Ø§Ø±Ú˜ Ø®Ø§Ù…ÙˆØ´ Ù…ÛŒØ´ÙˆØ¯', '09017631093', '0670566659', 'xiaomi redmi note 12', '123456789123456', '12:21-1403/3/7', '', 6, 'Ú¯ÙˆØ´ÛŒ Ø¯Ø±Ø­ÛŒÙ† Ø´Ø§Ø±Ú˜ Ù‡Ø± 10 Ø¯Ù‚ÛŒÙ‚Ù‡ Ø¨ØµÙˆØ±Øª Ù…Ø¯Ø§ÙˆÙ… Ø®Ø§Ù…ÙˆØ´ Ùˆ Ø±ÙˆØ´Ù† Ù…ÛŒ Ø´ÙˆØ¯', 'Ø³ÙˆÚ©Øª Ø´Ø§Ø±Ú˜ Ø®Ø±Ø§Ø¨ Ø§Ø³Øª', 'Ø³ÙˆÚ©Øª Ø´Ø§Ø±Ú˜ Ù…Ø¯Ù„ : 12s32', 'Ø³ÙˆÚ©Øª Ø´Ø§Ø±Ú˜ ØªØ¹ÙˆÛŒØ¶ Ø´Ø¯', 'Ú¯ÙˆØ´ÛŒ Ø¨Ø¯ÙˆÙ† Ù…Ø´Ú©Ù„ Ø´Ø§Ø±Ú˜ Ù…ÛŒ Ø´ÙˆØ¯', 'Ú©Ø¯ Ø±Ù‡Ú¯ÛŒØ±ÛŒ ØªÛŒÙ¾Ø§Ú©Ø³ : 132416541123151513', '12:22-1403/3/7', '12:22-1403/3/7', '12:23-1403/3/7', '12:23-1403/3/7', '12:23-1403/3/7', '13:45-1403/4/17', 'Ú¯ÙˆØ´ÛŒ Ø¨Ø§ ØªÛŒÙ¾Ø§Ú©Ø³ Ø§Ø±Ø³Ø§Ù„ Ø´ÙˆØ¯', '2040100056678.jpg', 1),
(204010006, 'ghasem', 'ÙØ§Ø·ÛŒ ÛŒØ²Ø¯Ø§Ù†ÛŒ', 'ØµÙØ­Ù‡ Ù†Ù…Ø§ÛŒØ´ ØªØ§Ø±ÛŒÚ© Ø§Ø³Øª', '09017631093', '0670566659', 'galaxy a 31', '1231616161611', '13:49-1403/4/17', '', 2, '', '', '', '', '', '', '', '13:49-1403/4/17', '', '', '', '', '', '2040100066688.jpg', 0);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
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
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_janebi`
--
ALTER TABLE `tbl_janebi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204020016;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_phone`
--
ALTER TABLE `tbl_phone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204010007;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
