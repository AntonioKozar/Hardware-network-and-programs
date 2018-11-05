-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2018 at 12:50 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hnpefos`
--

-- --------------------------------------------------------

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
CREATE TABLE IF NOT EXISTS `local` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `global` varchar(16) COLLATE utf8_bin NOT NULL,
  `local` varchar(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `local`
--

INSERT INTO `local` (`id`, `global`, `local`) VALUES
(1, 'S0', 'S0-1'),
(2, 'S0', 'S0-2'),
(3, 'S0', 'S0-3'),
(4, 'S0', 'S0-4'),
(5, 'S0', 'S0-5'),
(6, 'S0', 'S0-6'),
(7, 'S0', 'S0-7'),
(8, 'S0', 'S0-8'),
(9, 'S0', 'S0-9'),
(10, 'S0', 'S0-10'),
(11, 'S0', 'S0-11'),
(12, 'S0', 'S0-12'),
(13, 'S0', 'S0-13'),
(14, 'S0', 'S0-14'),
(15, 'S0', 'S0-15'),
(16, 'S0', 'S0-16'),
(17, 'S0', 'S0-17'),
(18, 'S1', 'S1-1'),
(19, 'S1', 'S1-2'),
(20, 'S1', 'S1-3'),
(21, 'S1', 'S1-4'),
(22, 'S1', 'S1-5'),
(23, 'S1', 'S1-6'),
(24, 'S1', 'S1-7'),
(25, 'S1', 'S1-8'),
(26, 'S1', 'S1-9'),
(27, 'S1', 'S1-10'),
(28, 'S1', 'D5'),
(29, 'S1', 'D4'),
(30, 'S2', 'S2-1'),
(31, 'S2', 'S2-2'),
(32, 'S2', 'S2-3'),
(33, 'S2', 'S2-4'),
(34, 'S2', 'S2-5'),
(35, 'S2', 'S2-6'),
(36, 'S2', 'S2-7'),
(37, 'S2', 'S2-8'),
(38, 'S2', 'S2-9'),
(39, 'S2', 'S2-10'),
(40, 'S2', 'S2-11'),
(41, 'S2', 'S2-12'),
(42, 'S2', 'S2-13'),
(43, 'S2', 'S2-14'),
(44, 'S2', 'S2-15'),
(45, 'S2', 'S2-16'),
(46, 'S2', 'S2-17'),
(47, 'S2', 'S2-18'),
(48, 'S2', 'S2-19'),
(49, 'S2', 'S2-20'),
(50, 'S2', 'S2-21'),
(51, 'S2', 'S2-22'),
(52, 'S2', 'S2-23'),
(53, 'S2', 'D6a'),
(54, 'S2', 'D6b'),
(55, 'S2', 'S2-6A-1'),
(56, 'S2', 'S2-6A-2'),
(57, 'N0', 'N0-1'),
(58, 'N0', 'N0-2'),
(59, 'N0', 'N0-3'),
(60, 'N0', 'N0-4'),
(61, 'N0', 'N0-5'),
(62, 'N0', 'N0-6'),
(63, 'N0', 'N0-7'),
(64, 'N0', 'D1'),
(65, 'N0', 'D2'),
(66, 'N0', 'D3'),
(67, 'N1', 'N1-1'),
(68, 'N1', 'N1-2'),
(69, 'N1', 'N1-3'),
(70, 'N1', 'N1-4'),
(71, 'N1', 'N1-5'),
(72, 'N1', 'N1-6'),
(73, 'N1', 'N1-7'),
(74, 'N2', 'N2-1'),
(75, 'N2', 'N2-2'),
(76, 'N2', 'N2-3'),
(77, 'N2', 'N2-4'),
(78, 'N2', 'N2-5'),
(79, 'N2', 'N2-6'),
(80, 'N2', 'N2-7'),
(81, 'N2', 'D14'),
(82, 'N2', 'D13'),
(83, 'N2', 'D12'),
(84, 'N2', 'D11'),
(85, 'N2', 'D10'),
(86, 'N2', 'D9'),
(87, 'N2', 'D8'),
(88, 'N2', 'D7');

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

DROP TABLE IF EXISTS `network`;
CREATE TABLE IF NOT EXISTS `network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fd` tinyint(4) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `ip` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `subnet` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `gateway` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `dns1` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `dns2` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `mac` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `pcname` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `barcode` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `processor` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `ram` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `motherboard` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `hddnumber` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `hddsize` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `gpu` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `os` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `added` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `edited` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mac_UNIQUE` (`mac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

DROP TABLE IF EXISTS `processor`;
CREATE TABLE IF NOT EXISTS `processor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) COLLATE utf8_bin NOT NULL,
  `URL` varchar(1024) COLLATE utf8_bin NOT NULL,
  `ReleseDate` varchar(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `processor`
--

INSERT INTO `processor` (`id`, `Name`, `URL`, `ReleseDate`) VALUES
(1, 'Intel(R) Core(TM) i5-6400 CPU @ 2.70GHz', 'http://ark.intel.com/products/88185/Intel-Core-i5-6400-Processor-6M-Cache-up-to-3_30-GHz', 'Q3\'15'),
(2, 'Pentium(R) Dual-Core CPU E5300 @ 2.60GHz', 'http://ark.intel.com/products/35300/Intel-Pentium-Processor-E5300-2M-Cache-2_60-GHz-800-MHz-FSB', 'Q1\'08'),
(3, 'Intel(R) Core(TM) i5-4460S CPU @ 2.90GHz', 'http://ark.intel.com/products/80818/Intel-Core-i5-4460S-Processor-6M-Cache-up-to-3_40-GHz', 'Q2\'14'),
(4, 'Intel(R) Core(TM) i5-2400 CPU @ 3.10GHz', 'http://ark.intel.com/products/52207/Intel-Core-i5-2400-Processor-6M-Cache-up-to-3_40-GHz', 'Q1\'11'),
(5, 'Intel(R) Core(TM) i5-3470 CPU @ 3.20GHz', 'http://ark.intel.com/products/68316/Intel-Core-i5-3470-Processor-6M-Cache-up-to-3_60-GHz', 'Q2\'12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
