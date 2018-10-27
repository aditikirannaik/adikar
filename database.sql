-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 20, 2018 at 06:30 AM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_hr`
--

DROP TABLE IF EXISTS `admin_hr`;
CREATE TABLE IF NOT EXISTS `admin_hr` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
DROP TABLE IF EXISTS `demo`;
CREATE TABLE IF NOT EXISTS `demo` (
  `month` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `total_s` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `wo_leave` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `cl_leave` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `ml_leave` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `total_p` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `brvl_leave` varchar(10) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`month`, `total_s`, `wo_leave`, `cl_leave`, `ml_leave`, `total_p`, `brvl_leave`) VALUES
('march', '87', '1294', '99', '0', '142', '6'),
('april', '60', '1409', '110', '0', '67', '3'),
('june', '94', '1558', '95', '0', '292', '13'),
('february', '79', '1645', '93', '0', '0', '0'),
('january', '85', '1720', '90', '0', '270', '0'),
('may', '82', '2020', '90', '0', '354', '4');
COMMIT;

DROP TABLE IF EXISTS `final`;
CREATE TABLE IF NOT EXISTS `final` (
  `leave_type` varchar(20) COLLATE utf8_croatian_ci DEFAULT NULL,
  `count` int(20) DEFAULT NULL,
  `link` varchar(40) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`leave_type`, `count`, `link`) VALUES
('privilege leave', 1125, 'http://localhost/demo/column5.php'),
('sick leave', 487, 'column.php'),
('casual leave', 577, 'column3.php'),
('breavement leave', 26, 'column5.php'),
('maternity leave', 0, 'column4.php'),
('work off', 9646, 'column2.php');
COMMIT;

DROP TABLE IF EXISTS `row_data`;
CREATE TABLE IF NOT EXISTS `row_data` (
  `leave_type` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `january` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `february` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `march` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `april` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `may` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `june` varchar(20) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `row_data`
--

INSERT INTO `row_data` (`leave_type`, `january`, `february`, `march`, `april`, `may`, `june`) VALUES
('brvl_leave', '0', '0', '6', '3', '4', '13'),
('cl_leave', '90', '93', '99', '110', '90', '95'),
('ml_leave', '0', '0', '0', '0', '0', '0'),
('total_p', '270', '0', '142', '67', '354', '292'),
('total_s', '85', '79', '87', '60', '82', '94'),
('wo_leave', '1720', '1645', '1294', '1409', '2020', '1558');
COMMIT;
