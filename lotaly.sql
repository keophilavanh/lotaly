-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2019 at 06:24 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lotaly`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

DROP TABLE IF EXISTS `tb_employee`;
CREATE TABLE IF NOT EXISTS `tb_employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_fname` varchar(25) NOT NULL,
  `emp_lname` varchar(25) DEFAULT NULL,
  `emp_phone` varchar(13) DEFAULT NULL,
  `emp_address` varchar(100) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `permission` varchar(25) NOT NULL,
  `Date_login` date DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`emp_id`, `emp_fname`, `emp_lname`, `emp_phone`, `emp_address`, `username`, `password`, `permission`, `Date_login`) VALUES
(1, 'ໂຊກໄຊ', 'ແກ້ວພິລາວັນ', '8552077452952', 'ບ້ານ ດອນກອຍ ເມືອງສີສັດຕະນາກ ນະຄອນຫຼວງວຽງຈັນ', 'Admin', 'QWRtaW4=', 'Admin', '2019-11-17'),
(2, 'ແມັກກີ້', 'ວັງວຽງ', '7777777', 'ວັງວຽງ', 'max', 'MTIzNDU=', 'Employee', '2019-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_periods`
--

DROP TABLE IF EXISTS `tb_periods`;
CREATE TABLE IF NOT EXISTS `tb_periods` (
  `periods_id` int(11) NOT NULL AUTO_INCREMENT,
  `Date_start` datetime NOT NULL,
  `Date_end` datetime DEFAULT NULL,
  `Date_random` date NOT NULL,
  `out_put_random` int(11) DEFAULT NULL,
  `user_start` varchar(30) NOT NULL,
  `user_end` varchar(30) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`periods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_periods`
--

INSERT INTO `tb_periods` (`periods_id`, `Date_start`, `Date_end`, `Date_random`, `out_put_random`, `user_start`, `user_end`, `status`) VALUES
(9, '2019-11-14 15:22:19', '2019-11-14 17:19:29', '2019-11-20', 256, 'Admin', 'Admin', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `tb_remit`
--

DROP TABLE IF EXISTS `tb_remit`;
CREATE TABLE IF NOT EXISTS `tb_remit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number2` int(11) NOT NULL,
  `number3` int(11) NOT NULL,
  `number4` int(11) NOT NULL,
  `number5` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_remit`
--

INSERT INTO `tb_remit` (`id`, `number2`, `number3`, `number4`, `number5`) VALUES
(1, 20000, 10000, 5000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sell`
--

DROP TABLE IF EXISTS `tb_sell`;
CREATE TABLE IF NOT EXISTS `tb_sell` (
  `sel_id` int(11) NOT NULL AUTO_INCREMENT,
  `sel_date` datetime NOT NULL,
  `periods_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `status` varchar(7) NOT NULL,
  `user_update` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sel_id`),
  KEY `periods_id` (`periods_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_sell`
--

INSERT INTO `tb_sell` (`sel_id`, `sel_date`, `periods_id`, `emp_id`, `status`, `user_update`) VALUES
(11, '2019-11-16 16:14:42', 9, 2, 'Normal', 'nueng'),
(12, '2019-11-16 16:32:34', 9, 2, 'Cancel', 'nueng'),
(13, '2019-11-17 06:32:21', 9, 1, 'Normal', NULL),
(14, '2019-11-17 06:35:38', 9, 1, 'Normal', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sell_detail`
--

DROP TABLE IF EXISTS `tb_sell_detail`;
CREATE TABLE IF NOT EXISTS `tb_sell_detail` (
  `sel_id` int(11) NOT NULL,
  `number` varchar(5) NOT NULL,
  `price` int(11) NOT NULL,
  KEY `sel_id` (`sel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_sell_detail`
--

INSERT INTO `tb_sell_detail` (`sel_id`, `number`, `price`) VALUES
(11, '70', 30000),
(12, '90', 10000),
(12, '50', 10000),
(12, '10', 10000),
(13, '528', 5000),
(14, '596', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(25) NOT NULL,
  `user_lname` varchar(25) DEFAULT NULL,
  `user_phone` varchar(13) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `permission` varchar(25) NOT NULL,
  `Date_login` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_fname`, `user_lname`, `user_phone`, `user_address`, `username`, `password`, `permission`, `Date_login`) VALUES
(8, 'nueng', 'keophilavanh', '77452952', 'laos\r\nphonpapao', 'nueng', 'bnVlbmc=', 'Enable', '2019-11-17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
