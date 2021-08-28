-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2020 at 11:46 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbchangerequest`
--

-- --------------------------------------------------------

--
-- Table structure for table `loggerp`
--

CREATE TABLE IF NOT EXISTS `loggerp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(50) NOT NULL,
  `browser` varchar(300) NOT NULL,
  `port` varchar(50) NOT NULL,
  `perkara` varchar(300) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `loggerp`
--

INSERT INTO `loggerp` (`id`, `username`, `date`, `ip`, `browser`, `port`, `perkara`, `status`) VALUES
(1, '001025011350', '2020-09-20 14:58:27', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50833', 'Log Masuk', 1),
(2, '', '0000-00-00 00:00:00', '', '', '', '', 1),
(3, '', '0000-00-00 00:00:00', '', '', '', '', 1),
(4, '001025011350', '2020-09-20 15:51:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '51094', 'Log Masuk', 1),
(5, '001025011350', '2020-09-20 20:12:23', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '51715', 'Log Masuk', 1),
(6, '001025011350', '2020-09-20 20:44:56', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '51960', 'Log Masuk', 1),
(7, '001025011350', '2020-09-20 21:46:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '52463', 'Log Masuk', 1),
(8, '001025011350', '2020-09-21 07:28:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53050', 'Log Masuk', 1),
(9, '001025011350', '2020-09-21 12:49:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '55267', 'Log Masuk', 1),
(10, '001025011350', '2020-09-21 16:10:09', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '57043', 'Log Masuk', 1),
(11, '001025011350', '2020-09-21 19:55:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53232', 'Log Masuk', 1),
(12, '001025011350', '2020-09-22 07:30:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '54486', 'Log Masuk', 1),
(13, '001025011350', '2020-09-22 08:49:39', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56191', 'Log Masuk', 1),
(14, '999999999999', '2020-09-22 08:50:33', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56250', 'Log Masuk', 1),
(15, '001025011350', '2020-09-22 08:50:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56249', 'Log Masuk', 1),
(16, '961101017891', '2020-09-22 13:39:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62628', 'Log Masuk', 1),
(17, '001025011350', '2020-09-22 14:14:19', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63699', 'Log Masuk', 1),
(18, '961101017891', '2020-09-22 14:18:14', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64731', 'Log Masuk', 1),
(19, '001025011350', '2020-09-22 14:36:06', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '52964', 'Log Masuk', 1),
(20, '961101017891', '2020-09-22 14:36:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53029', 'Log Masuk', 1),
(21, '001025011350', '2020-09-22 14:39:26', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53840', 'Log Masuk', 1),
(22, '961101017891', '2020-09-22 14:39:45', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53906', 'Log Masuk', 1),
(23, '001025011350', '2020-09-22 14:41:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '54348', 'Log Masuk', 1),
(24, '961101017891', '2020-09-22 14:42:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '54677', 'Log Masuk', 1),
(25, '001025011350', '2020-09-22 14:44:26', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '55166', 'Log Masuk', 1),
(26, '961101017891', '2020-09-22 14:44:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '55264', 'Log Masuk', 1),
(27, '001025011350', '2020-09-22 14:51:14', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '55850', 'Log Masuk', 1),
(28, '961101017891', '2020-09-22 14:51:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '55869', 'Log Masuk', 1),
(29, '001025011350', '2020-09-22 14:52:26', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '55887', 'Log Masuk', 1),
(30, '961101017891', '2020-09-22 14:52:39', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '55894', 'Log Masuk', 1),
(31, '001025011350', '2020-09-22 14:56:24', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '55953', 'Log Masuk', 1),
(32, '961101017891', '2020-09-22 15:00:54', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56022', 'Log Masuk', 1),
(33, '961101017891', '2020-09-22 15:02:30', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56069', 'Log Masuk', 1),
(34, '001025011350', '2020-09-22 15:05:39', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56122', 'Log Masuk', 1),
(35, '961101017891', '2020-09-22 15:06:11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56142', 'Log Masuk', 1),
(36, '001025011350', '2020-09-22 15:10:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56211', 'Log Masuk', 1),
(37, '961101017891', '2020-09-22 15:11:16', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56232', 'Log Masuk', 1),
(38, '001025011350', '2020-09-22 15:11:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56242', 'Log Masuk', 1),
(39, '961101017891', '2020-09-22 15:12:04', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56261', 'Log Masuk', 1),
(40, '001025011350', '2020-09-22 15:12:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56283', 'Log Masuk', 1),
(41, '961101017891', '2020-09-22 15:13:36', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56300', 'Log Masuk', 1),
(42, '001025011350', '2020-09-22 15:23:14', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56403', 'Log Masuk', 1),
(43, '961101017891', '2020-09-22 15:23:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56423', 'Log Masuk', 1),
(44, '001025011350', '2020-09-22 15:23:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56433', 'Log Masuk', 1),
(45, '001025011350', '2020-09-22 15:24:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56449', 'Log Masuk', 1),
(46, '961101017891', '2020-09-22 15:25:04', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56460', 'Log Masuk', 1),
(47, '001025011350', '2020-09-22 15:27:17', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56497', 'Log Masuk', 1),
(48, '001025011350', '2020-09-22 15:29:18', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56562', 'Log Masuk', 1),
(49, '001025011350', '2020-09-22 15:31:14', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56584', 'Log Masuk', 1),
(50, '961101017891', '2020-09-22 15:31:36', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56603', 'Log Masuk', 1),
(51, '961101017891', '2020-09-22 15:32:23', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56619', 'Log Masuk', 1),
(52, '001025011350', '2020-09-22 15:32:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56626', 'Log Masuk', 1),
(53, '961101017891', '2020-09-22 15:33:28', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56653', 'Log Masuk', 1),
(54, '001025011350', '2020-09-22 15:33:43', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56662', 'Log Masuk', 1),
(55, '961101017891', '2020-09-22 15:36:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56702', 'Log Masuk', 1),
(56, '001025011350', '2020-09-22 15:37:19', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56714', 'Log Masuk', 1),
(57, '001025011350', '2020-09-22 15:40:43', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56757', 'Log Masuk', 1),
(58, '961101017891', '2020-09-22 15:46:56', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56839', 'Log Masuk', 1),
(59, '001025011350', '2020-09-22 15:47:45', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '56870', 'Log Masuk', 1),
(60, '961101017891', '2020-09-22 15:49:33', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '57203', 'Log Masuk', 1),
(61, '001025011350', '2020-09-22 15:50:03', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '57340', 'Log Masuk', 1),
(62, '001025011350', '2020-09-22 15:57:11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '59157', 'Log Masuk', 1),
(63, '961101017891', '2020-09-22 15:58:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '59584', 'Log Masuk', 1),
(64, '001025011350', '2020-09-22 16:02:40', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '49549', 'Log Masuk', 1),
(65, '001025011350', '2020-09-22 16:04:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '49587', 'Log Masuk', 1),
(66, '001025011350', '2020-09-22 16:09:19', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '49653', 'Log Masuk', 1),
(67, '001025011350', '2020-09-22 21:01:11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50905', 'Log Masuk', 1),
(68, '961101017891', '2020-09-22 21:03:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50922', 'Log Masuk', 1),
(69, '001025011350', '2020-09-22 21:04:46', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50932', 'Log Masuk', 1),
(70, '961101017891', '2020-09-22 21:05:27', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50943', 'Log Masuk', 1),
(71, '001025011350', '2020-09-22 21:06:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50955', 'Log Masuk', 1),
(72, '001025011350', '2020-09-22 21:29:56', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '51403', 'Log Masuk', 1),
(73, '961101017891', '2020-09-23 07:27:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '52319', 'Log Masuk', 1),
(74, '961101017891', '2020-09-23 07:29:58', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '52370', 'Log Masuk', 1),
(75, '961101017891', '2020-09-23 07:30:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '52386', 'Log Masuk', 1),
(76, '001025011350', '2020-09-23 07:32:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '52404', 'Log Masuk', 1),
(77, '911002015706', '2020-09-23 07:58:37', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53000', 'Log Masuk', 1),
(78, '001025011350', '2020-09-23 07:59:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53018', 'Log Masuk', 1),
(79, '911002015706', '2020-09-23 08:00:20', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53031', 'Log Masuk', 1),
(80, '911002015706', '2020-09-23 08:00:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53040', 'Log Masuk', 1),
(81, '001025011350', '2020-09-23 08:01:20', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53049', 'Log Masuk', 1),
(82, '860905015892', '2020-09-23 08:07:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62222', 'Log Masuk', 1),
(83, '911002015706', '2020-09-23 08:11:02', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62290', 'Log Masuk', 1),
(84, '860905015892', '2020-09-23 08:11:28', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62312', 'Log Masuk', 1),
(85, '001025011350', '2020-09-23 08:12:18', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62334', 'Log Masuk', 1),
(86, '001025011350', '2020-09-23 08:13:02', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62349', 'Log Masuk', 1),
(87, '860905015892', '2020-09-23 08:13:36', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62373', 'Log Masuk', 1),
(88, '911002015706', '2020-09-23 08:13:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62382', 'Log Masuk', 1),
(89, '911002015706', '2020-09-23 08:15:33', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62408', 'Log Masuk', 1),
(90, '001025011350', '2020-09-23 08:15:59', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62427', 'Log Masuk', 1),
(91, '001025011350', '2020-09-23 08:17:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62467', 'Log Masuk', 1),
(92, '001025011350', '2020-09-23 08:18:03', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62470', 'Log Masuk', 1),
(93, '911002015706', '2020-09-23 08:18:17', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62478', 'Log Masuk', 1),
(94, '001025011350', '2020-09-23 08:22:08', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62545', 'Log Masuk', 1),
(95, '911002015706', '2020-09-23 08:25:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62595', 'Log Masuk', 1),
(96, '001025011350', '2020-09-23 08:25:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62621', 'Log Masuk', 1),
(97, '911002015706', '2020-09-23 08:26:59', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62642', 'Log Masuk', 1),
(98, '001025011350', '2020-09-23 08:36:00', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62769', 'Log Masuk', 1),
(99, '911002015706', '2020-09-23 08:36:28', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62779', 'Log Masuk', 1),
(100, '001025011350', '2020-09-23 08:36:38', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62779', 'Log Masuk', 1),
(101, '911002015706', '2020-09-23 08:37:09', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '62808', 'Log Masuk', 1),
(102, '911002015706', '2020-09-23 08:46:53', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63036', 'Log Masuk', 1),
(103, '001025011350', '2020-09-23 08:52:33', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63201', 'Log Masuk', 1),
(104, '001025011350', '2020-09-23 08:57:28', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63298', 'Log Masuk', 1),
(105, '911002015706', '2020-09-23 08:57:38', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63297', 'Log Masuk', 1),
(106, '001025011350', '2020-09-23 08:59:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63330', 'Log Masuk', 1),
(107, '860905015892', '2020-09-23 09:02:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63402', 'Log Masuk', 1),
(108, '911002015706', '2020-09-23 09:03:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63440', 'Log Masuk', 1),
(109, '911002015706', '2020-09-23 09:05:06', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63465', 'Log Masuk', 1),
(110, '001025011350', '2020-09-23 09:05:23', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63464', 'Log Masuk', 1),
(111, '911002015706', '2020-09-23 09:08:08', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63555', 'Log Masuk', 1),
(112, '860905015892', '2020-09-23 09:11:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63606', 'Log Masuk', 1),
(113, '911002015706', '2020-09-23 09:12:09', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63615', 'Log Masuk', 1),
(114, '911002015706', '2020-09-23 09:12:54', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63623', 'Log Masuk', 1),
(115, '911002015706', '2020-09-23 09:14:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63646', 'Log Masuk', 1),
(116, '001025011350', '2020-09-23 09:16:19', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63656', 'Log Masuk', 1),
(117, '860905015892', '2020-09-23 09:17:16', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63669', 'Log Masuk', 1),
(118, '911002015706', '2020-09-23 09:19:03', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63687', 'Log Masuk', 1),
(119, '001025011350', '2020-09-23 09:20:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63696', 'Log Masuk', 1),
(120, '911002015706', '2020-09-23 09:22:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63732', 'Log Masuk', 1),
(121, '860905015892', '2020-09-23 09:25:32', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63742', 'Log Masuk', 1),
(122, '001025011350', '2020-09-23 09:26:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63752', 'Log Masuk', 1),
(123, '911002015706', '2020-09-23 09:28:04', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63767', 'Log Masuk', 1),
(124, '860905015892', '2020-09-23 09:29:17', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63783', 'Log Masuk', 1),
(125, '001025011350', '2020-09-23 09:30:08', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63793', 'Log Masuk', 1),
(126, '911002015706', '2020-09-23 09:30:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63803', 'Log Masuk', 1),
(127, '860905015892', '2020-09-23 09:33:17', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63816', 'Log Masuk', 1),
(128, '001025011350', '2020-09-23 09:34:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63830', 'Log Masuk', 1),
(129, '911002015706', '2020-09-23 09:35:14', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63844', 'Log Masuk', 1),
(130, '860905015892', '2020-09-23 09:42:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63880', 'Log Masuk', 1),
(131, '860905015892', '2020-09-23 09:46:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63904', 'Log Masuk', 1),
(132, '001025011350', '2020-09-23 09:47:19', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63921', 'Log Masuk', 1),
(133, '911002015706', '2020-09-23 09:47:59', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63938', 'Log Masuk', 1),
(134, '001025011350', '2020-09-23 09:48:36', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63946', 'Log Masuk', 1),
(135, '911002015706', '2020-09-23 09:50:30', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63973', 'Log Masuk', 1),
(136, '860905015892', '2020-09-23 09:50:39', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63978', 'Log Masuk', 1),
(137, '860905015892', '2020-09-23 09:50:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63978', 'Log Masuk', 1),
(138, '860905015892', '2020-09-23 09:51:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '63995', 'Log Masuk', 1),
(139, '001025011350', '2020-09-23 09:57:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64010', 'Log Masuk', 1),
(140, '911002015706', '2020-09-23 09:59:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64025', 'Log Masuk', 1),
(141, '001025011350', '2020-09-23 09:59:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64036', 'Log Masuk', 1),
(142, '860905015892', '2020-09-23 10:16:33', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64094', 'Log Masuk', 1),
(143, '001025011350', '2020-09-23 10:18:50', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64104', 'Log Masuk', 1),
(144, '001025011350', '2020-09-23 10:32:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64379', 'Log Masuk', 1),
(145, '001025011350', '2020-09-23 10:41:08', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64491', 'Log Masuk', 1),
(146, '911002015706', '2020-09-23 10:44:03', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64535', 'Log Masuk', 1),
(147, '001025011350', '2020-09-23 10:44:43', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64546', 'Log Masuk', 1),
(148, '860905015892', '2020-09-23 10:45:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64580', 'Log Masuk', 1),
(149, '001025011350', '2020-09-23 10:46:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '64585', 'Log Masuk', 1),
(150, '001025011350', '2020-09-23 11:56:27', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50776', 'Log Masuk', 1),
(151, '001025011350', '2020-09-23 11:58:10', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50813', 'Log Masuk', 1),
(152, '001025011350', '2020-09-23 12:03:51', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50887', 'Log Masuk', 1),
(153, '001025011350', '2020-09-23 12:11:11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '51164', 'Log Masuk', 1),
(154, '001025011350', '2020-09-23 14:52:04', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '53119', 'Log Masuk', 1),
(155, '911002015706', '2020-09-23 15:54:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50410', 'Log Masuk', 1),
(156, '001025011350', '2020-09-23 15:55:16', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50426', 'Log Masuk', 1),
(157, '001025011350', '2020-09-24 21:05:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', '51375', 'Log Masuk', 1),
(158, '911002015706', '2020-09-24 21:06:24', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', '51381', 'Log Masuk', 1),
(159, '001025011350', '2020-09-24 21:07:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', '51387', 'Log Masuk', 1),
(160, '001025011350', '2020-09-25 20:46:04', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', '51807', 'Log Masuk', 1),
(161, '911002015706', '2020-09-25 21:13:31', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', '51928', 'Log Masuk', 1),
(162, '001025011350', '2020-09-25 21:21:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', '51944', 'Log Masuk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loggerp2`
--

CREATE TABLE IF NOT EXISTS `loggerp2` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(50) NOT NULL,
  `browser` varchar(300) NOT NULL,
  `port` varchar(50) NOT NULL,
  `perkara` varchar(300) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loggerp2`
--

INSERT INTO `loggerp2` (`id`, `username`, `date`, `ip`, `browser`, `port`, `perkara`, `status`) VALUES
(0, '001025011350', '2020-09-20 14:50:53', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36', '50751', 'Log Masuk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE IF NOT EXISTS `permohonan` (
  `bil` int(11) NOT NULL AUTO_INCREMENT,
  `perkara` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`bil`, `perkara`, `status`) VALUES
(2, 'Permohonan Dalam Proses', 1),
(3, 'Permohonan Selesai', 1),
(12, 'Permohonan Baru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbljabatan`
--

CREATE TABLE IF NOT EXISTS `tbljabatan` (
  `id` varchar(3) NOT NULL,
  `kodjabatan` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `ptjvalue` int(5) NOT NULL,
  `kod` varchar(20) DEFAULT NULL,
  `ketuajawatan` varchar(255) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`kodjabatan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbljabatan`
--

INSERT INTO `tbljabatan` (`id`, `kodjabatan`, `jabatan`, `ptjvalue`, `kod`, `ketuajawatan`, `alamat`) VALUES
('1', '10000', 'JKNJ - PENGURUSAN', 10000, '99901', 'PENGARAH KESIHATAN NEGERI JOHOR', 'Jabatan Kesihatan Negeri Johor<br>\nTingkat 2,3,4,5, Blok B,<br>\nWisma Persekutuan,<br>\nJalan Ayer Molek,<br>\n80590 Johor Bahru,<br>\nJohor Darul Ta''zim'),
('16', '20101', 'PEJABAT KESIHATAN BATU PAHAT', 10001, '91401', 'PEGAWAI KESIHATAN DAERAH', 'PEJABAT KESIHATAN DAERAH<br>\nJALAN MOHD. KHALID,<br>\n83000 BATU PAHAT,<br>\nJOHOR DARUL TA''ZIM'),
('14', '20201', 'PEJABAT KESIHATAN JOHOR BAHRU', 10001, '91201', 'PEGAWAI KESIHATAN DAERAH', 'PEJABAT KESIHATAN JOHOR BAHRU<br>\nJALAN ABDUL SAMAD<br>\n80100 JOHOR BAHRU<br>\nJOHOR DARUL TA''ZIM'),
('18', '20301', 'PEJABAT KESIHATAN KLUANG', 10001, '91501', 'PEGAWAI KESIHATAN DAERAH', 'PEJABAT KESIHATAN KLUANG<br>\nJALAN SULTANAH<br>\n86000 KLUANG<br>\nJOHOR DARUL TA''ZIM'),
('19', '20401', 'PEJABAT KESIHATAN KOTA TINGGI', 10001, '91801', 'PEGAWAI KESIHATAN DAERAH', 'EJABAT KESIHATAN KOTA TINGGI<br>\nJALAN TUN HABAB<br>\n89100 KOTA TINGGI<br>\nJOHOR DARUL TA''ZIM'),
('23', '20501', 'PEJABAT KESIHATAN KULAI ', 10001, '93301', 'PEGAWAI KESIHATAN DAERAH', 'PEJABAT KESIHATAN DAERAH KULAI,<br>\r\nBATU 19, JALAN AYER HITAM,<br>\r\n81000 KULAI,<br>\r\nJOHOR DARUL TA''ZIM'),
('22', '20601', 'PEJABAT KESIHATAN TANGKAK', 10001, '93201', 'PEGAWAI KESIHATAN DAERAH', 'PEJABAT KESIHATAN LEDANG<br>\nJKR 2831 JALAN HOSPITAL,<br>\n84900 LEDANG,<br>\nJOHOR DARUL TA''ZIM'),
('21', '20701', 'PEJABAT KESIHATAN MERSING', 10001, '91901', 'PEGAWAI KESIHATAN DAERAH', 'PEJABAT KESIHATAN DAERAH MERSING,<br>\nJKR 97, JALAN ISMAIL,<br>\n86800 MERSING,<br>\nJOHOR DARUL TA''ZIM'),
('15', '20801', 'PEJABAT KESIHATAN MUAR', 10001, '91301', 'PEGAWAI KESIHATAN DAERAH', 'PEJABAT KESIHATAN MUAR,<br>\nJALAN OTHMAN,<br>\n84000 MUAR,<br>\nJOHOR DARUL TA''ZIM'),
('20', '20901', 'PEJABAT KESIHATAN PONTIAN', 10001, '91701', 'PEGAWAI KESIHATAN DAERAH', 'PEJABAT KESIHATAN PONTIAN,<br>\nJALAN ALSAGOFF,<br>\n82000 PONTIAN,<br>\nJOHOR DARUL TA''ZIM'),
('17', '21001', 'PEJABAT KESIHATAN SEGAMAT', 10001, '91601', 'PEGAWAI KESIHATAN DAERAH', 'PEJABAT KESIHATAN SEGAMAT,<br>\nPETI SURAT 102,<br>\nJALAN GUDANG UBAT<br>\n85000 SEGAMAT,<br>\nJOHOR DARUL TA''ZIM'),
('4', '30101', 'HOSPITAL SULTANAH NORA ISMAIL', 10003, '90501', 'PENGARAH HOSPITAL', 'HOSPITAL  BATU PAHAT<br>\n83000 BATU PAHAT<br>\nJOHOR DARUL TA''ZIM'),
('2', '30201', 'HOSPITAL SULTANAH AMINAH JOHOR BAHRU', 10003, '90101', 'PENGARAH HOSPITAL', 'HOSPITAL SULTANAH AMINAH JOHOR BAHRU<br>\nJALAN ABU BAKAR,<br>\n80100 JOHOR BAHRU<br>\nJOHOR DARUL TA''ZIM'),
('12', '30202', 'HOSPITAL SULTAN ISMAIL', 10003, '93101', 'PENGARAH HOSPITAL', 'HOSPITAL SULTAN ISMAIL<br>\nALAN PERSIARAN MUTIARA EMAS,<br>\nTAMAN MOUNT AUSTIN,<br>\n81100 JOHOR BAHRU,<br>\nJOHOR DARUL TA''ZIM'),
('13', '30203', 'HOSPITAL PERMAI', 10003, '92101', 'PENGARAH HOSPITAL', 'HOSPITAL PERMAI<br>\n81200 JOHOR BAHRU,<br>\nJOHOR DARUL TA''ZIM'),
('6', '30301', 'HOSPITAL ENCHE'' BESAR HAJJAH KHALSOM', 10003, '90601', 'PENGARAH HOSPITAL', 'HOSPITAL KLUANG<br>\nKM 5, JALAN KOTA TINGGI,<br>\n86000 KLUANG,<br>\nJOHOR DARUL TAKZIM.'),
('7', '30401', 'HOSPITAL KOTA TINGGI', 10003, '90901', 'PENGARAH HOSPITAL', 'HOSPITAL KOTA TINGGI<br>\nJALAN TUN HABAB,<br>\n81900 KOTA TINGGI,<br>\nJOHOR DARUL TAKZIM'),
('11', '30501', 'HOSPITAL TEMENGGONG SERI MAHARAJA TUN IBRAHIM, KULAI', 10003, '92201', 'PENGARAH HOSPITAL', 'HOSPITAL TEMENGGONG SERI MAHARAJA TUN IBRAHIM,<br>\n81000 KULAIJAYA,<br>\nJOHOR DARUL TA''ZIM'),
('10', '30601', 'HOSPITAL TANGKAK', 10003, '91101', 'PENGARAH HOSPITAL', 'HOSPITAL TANGKAK<br>\nJALAN HOSPITAL<br>\n84900 LEDANG<br>\nJOHOR DARUL TA''ZIM'),
('9', '30701', 'HOSPITAL MERSING', 10003, '91001', 'PENGARAH HOSPITAL', 'HOSPITAL MERSING<br>\nJALAN ISMAIL,<br>\n86800 MERSING,<br>\nJOHOR DARUL TA''ZIM'),
('3', '30801', 'HOSPITAL PAKAR SULTANAH FATIMAH, MUAR', 10003, '90401', 'PENGARAH HOSPITAL', 'HOSPITAL PAKAR SULTANAH FATIMAH,<br>\nJALAN SALEH,<br>\n84000 MUAR,<br>\nJOHOR DARUL TA''ZIM'),
('8', '30901', 'HOSPITAL PONTIAN', 10003, '90801', 'PENGARAH HOSPITAL', 'HOSPITAL PONTIAN<br>\nJALAN ALSAGOFF<br>\n82000 PONTIAN,<br>\nJOHOR DARUL TA''ZIM'),
('5', '31001', 'HOSPITAL SEGAMAT', 10003, '90701', 'PENGARAH HOSPITAL', 'HOSPITAL SEGAMAT<br>\nKM. 6, JALAN GENUANG<br>\n86000 SEGAMAT,<br>\nJOHOR DARUL TA''ZIM'),
('26', '40101', 'PEJABAT KESIHATAN PERGIGIAN BATU PAHAT', 10005, '90253', 'PEGAWAI PERGIGIAN DAERAH', 'PEJABAT KESIHATAN PERGIGIAN DAERAH BATU PAHAT,<br>\nJKR 909 JALAN MOHD. KHALID,<br>\n83000 BATU PAHAT,<br>\nJOHOR DARUL TA''ZIM'),
('24', '40201', 'PEJABAT KESIHATAN PERGIGIAN JOHOR BAHRU', 10005, '90251', 'PEGAWAI PERGIGIAN DAERAH', 'PEJABAT KESIHATAN PERGIGIAN DAERAH JOHOR BAHRU,<br>\nJALAN ABDUL SAMAD,<br>\n80100 JOHOR BAHRU,<br>\nJOHOR DARUL TA''ZIM'),
('28', '40301', 'PEJABAT KESIHATAN PERGIGIAN KLUANG', 10005, '90254', 'PEGAWAI PERGIGIAN DAERAH', 'PEJABAT KESIHATAN PERGIGIAN DAERAH KLUANG<br>\nJALAN HOSPITAL KLUANG,<br>\n86000 KLUANG,<br>\nJOHOR DARUL TA''ZIM'),
('30', '40401', 'PEJABAT KESIHATAN PERGIGIAN KOTA TINGGI', 10005, '90257', 'PEGAWAI PERGIGIAN DAERAH', 'PEJABAT KESIHATAN PERGIGIAN DAERAH KOTA TINGGI,<br>\nKLINIK PERGIGIAN KOTA TINGGI,<br>\nJALAN TUN HABAB,<br>\n81900 KOTA TINGGI,<br>\nJOHOR DARUL TA''ZIM'),
('32', '40501', 'PEJABAT KESIHATAN PERGIGIAN KULAI ', 10005, '90260', 'PEGAWAI PERGIGIAN DAERAH', 'PEJABAT KESIHATAN PERGIGIAN DAERAH KULAI,<br>\r\nKLINIK PERGIGIAN KULAI,<br>\r\nKK3 KULAI,<br>\r\n81000 KULAI,<br>\r\nJOHOR DARUL TA''ZIM'),
('33', '40601', 'PEJABAT KESIHATAN PERGIGIAN TANGKAK', 10005, '90259', 'PEGAWAI PERGIGIAN DAERAH', 'PEJABAT KESIHATAN PERGIGIAN DAERAH LEDANG,<br>\nJKR, 2831, JALAN HOSPITAL TANGKAK,<br>\n84900 LEDANG,<br>\nJOHOR DARUL TA''ZIM\n'),
('31', '40701', 'PEJABAT KESIHATAN PERGIGIAN MERSING', 10005, '90258', 'PEGAWAI PERGIGIAN DAERAH', 'PEJABAT KESIHATAN PERGIGIAN DAERAH MERSING,<br>\nJALAN ISMAIL,<br>\n86800 MERSING,<br>\nJOHOR DARUL TA''ZIM'),
('25', '40801', 'PEJABAT KESIHATAN PERGIGIAN MUAR', 10005, '90252', 'PEGAWAI PERGIGIAN DAERAH', 'PEJABAT KESIHATAN PERGIGIAN DAERAH MUAR,<br>\nJALAN HOSPITAL,<br>\n84000 MUAR,<br>\nJOHOR DARUL TA''ZIM\n'),
('29', '40901', 'PEJABAT KESIHATAN PERGIGIAN PONTIAN', 10005, '90256', 'PEGAWAI PERGIGIAN DAERAH', 'PEJABAT KESIHATAN PERGIGIAN DAERAH PONTIAN,<br>\nJKR 1320 JALAN ALSAGOFF,<br>\n82000 PONTIAN,<br>\nJOHOR DARUL TA''ZIM'),
('27', '41001', 'PEJABAT KESIHATAN PERGIGIAN SEGAMAT', 10005, '90255', 'PEGAWAI PERGIGIAN DAERAH', 'PEJABAT KESIHATAN PERGIGIAN DAERAH SEGAMAT,<br>\nKLINIK PERGIGIAN SEGAMAT,<br>\n85000 SEGAMAT,<br>\nJOHOR DARUL TA''ZIM'),
('34', '50201', 'MAKMAL KESIHATAN AWAM', 50201, '93001', 'PENGARAH', NULL),
('35', '10001', 'JKNJ - KESIHATAN AWAM', 10001, NULL, NULL, NULL),
('36', '10003', 'JKNJ - PERUBATAN', 10003, NULL, NULL, NULL),
('37', '10004', 'JKNJ - PERUBATAN TRADISIONAL & KOMPLEMENTARI', 10004, NULL, NULL, NULL),
('38', '10005', 'JKNJ - PERGIGIAN', 10005, NULL, NULL, NULL),
('39', '10006', 'JKNJ - FARMASI', 10006, NULL, NULL, NULL),
('40', '10007', 'JKNJ - KESELAMATAN & KUALITI MAKANAN', 10007, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblkeutamaan`
--

CREATE TABLE IF NOT EXISTS `tblkeutamaan` (
  `bil` int(11) NOT NULL AUTO_INCREMENT,
  `keutamaan` varchar(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblkeutamaan`
--

INSERT INTO `tblkeutamaan` (`bil`, `keutamaan`, `status`) VALUES
(1, 'Rendah', 1),
(2, 'Sederhana', 1),
(3, 'Tinggi', 1),
(4, 'Kritikal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpegawai`
--

CREATE TABLE IF NOT EXISTS `tblpegawai` (
  `bil` int(11) NOT NULL AUTO_INCREMENT,
  `namapegawai` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblpegawai`
--

INSERT INTO `tblpegawai` (`bil`, `namapegawai`, `status`) VALUES
(1, 'AMIRAH NABILAH BINTI MOHD SAPINYE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpermohonan`
--

CREATE TABLE IF NOT EXISTS `tblpermohonan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sistem` varchar(5) NOT NULL,
  `jabatan` int(10) NOT NULL,
  `kk_kd` varchar(250) NOT NULL,
  `modul` varchar(250) NOT NULL,
  `no_tel` varchar(15) NOT NULL,
  `nama_pemohon` varchar(120) NOT NULL,
  `date` date NOT NULL,
  `date_diperlukan` date NOT NULL,
  `keutamaan` varchar(11) NOT NULL,
  `comments` text NOT NULL,
  `justifikasi` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `pegawai` varchar(15) NOT NULL,
  `catatan` text NOT NULL,
  `permohonan` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblpermohonan`
--

INSERT INTO `tblpermohonan` (`id`, `sistem`, `jabatan`, `kk_kd`, `modul`, `no_tel`, `nama_pemohon`, `date`, `date_diperlukan`, `keutamaan`, `comments`, `justifikasi`, `status`, `pegawai`, `catatan`, `permohonan`) VALUES
(1, '4', 20501, '', 'online', '0178297670', 'suzaini jabar', '2020-09-23', '2020-09-30', '', 'Penambahan Slot kuota onlie\r\n\r\n8-9pagi - 1 orang', 'kekurangan staff', 1, '1', ' Sila ambil tindakan ', '3'),
(2, '4', 20901, 'KDASSAMBUBUK', 'ddd', '0123456789', 'Amirah', '2020-09-24', '2020-09-25', 'Rendah', 'ok', 'ok', 1, '3', ' sila buat \r\nnoted', '3'),
(3, '8', 30202, 'KD PERPAT', 'pp', '01127774342', 'awe', '2020-09-23', '2020-09-24', 'Rendah', 'oki', 'kio', 1, '3', ' ', '2'),
(4, '8', 10000, 'KDASSAMBUBUK', 'pp', '0123456789', 'ali', '2020-09-24', '2020-09-25', 'Tinggi', '', '', 1, '1', ' hampir ', '1'),
(5, '8', 20901, 'kd batu putih', 'ddd', '13579', 'ali', '2020-09-23', '2020-09-24', 'Rendah', 'ok', 'ok', 1, '1', ' sila ambil tindakan \r\nsudah ambil tindakan', '3'),
(6, '11', 30101, 'kk simpang renggam', 'www', '01127774342', 'Amirah', '2020-09-26', '2020-09-26', 'Rendah', 'ok', 'ok', 1, '', '', '1'),
(7, '11', 21001, 'kp kluang', 'done', '13579', 'wan', '2020-09-24', '2020-09-25', 'Rendah', 'done', 'done', 1, '1', ' ', '2'),
(8, '5', 40101, 'kk rengit', 'Senarai laporan', '0109213046', 'rahimah', '2020-09-26', '2020-09-30', 'Sederhana', 'done', 'update', 1, '', '', '1'),
(9, '11', 10000, 'pengurusan', 'Daftar baru', '01127774342', 'Azrennawatie', '2020-09-23', '2020-09-24', 'Rendah', 'Penambahan Slot kuota onlie\r\n\r\n8-9pagi - 1 orang', 'kekurangan staff', 1, '1', '  sudah di ambil tindakan', '3'),
(10, '15', 40601, 'kd mersing', 'Senarai laporan', '0123456789', 'Mayra Amira', '2020-09-23', '2020-09-25', 'Rendah', 'on', 'no', 1, '1', '  noted', '3'),
(11, '10', 30202, '-', 'Modul test', '0192837', 'zainab', '2020-09-25', '2020-09-25', 'Rendah', 'ok', 'ok', 1, '1', '  ', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tblsistem`
--

CREATE TABLE IF NOT EXISTS `tblsistem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tblsistem`
--

INSERT INTO `tblsistem` (`id`, `nama`, `status`) VALUES
(1, 'SISTEM ESTUDENT', 1),
(2, 'SISTEM ETEMPAHAN', 1),
(3, 'SISTEM EPRS', 1),
(4, 'SISTEM ESPK', 1),
(5, 'SISTEM MiTB', 1),
(6, 'SISTEM EKOMPAUN', 1),
(7, 'SISTEM EPINJAMAN', 1),
(8, 'SISTEM EFILE', 1),
(9, 'SISTEM EJURNEL', 1),
(10, 'SISTEM EKENDERAAN', 1),
(11, 'SISTEM EFACEPRINT', 1),
(12, 'SISTEM ELAPORAN', 1),
(13, 'SISTEM ESPUB', 1),
(14, 'SISTEM EPROFILE', 1),
(15, 'SISTEM EKPAS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `bil` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `jabatan` int(10) NOT NULL,
  `count` int(2) NOT NULL,
  `block` int(2) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `namapegawai` varchar(250) NOT NULL,
  `jawatan` varchar(250) NOT NULL,
  `gred` varchar(250) NOT NULL,
  `authlevel` int(2) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`bil`, `user`, `password`, `jabatan`, `count`, `block`, `lastlogin`, `namapegawai`, `jawatan`, `gred`, `authlevel`, `status`) VALUES
(1, '911002015706', '911002015706', 10000, 0, 0, '2020-09-25 21:13:31', 'AMIRAH NABILAH BINTI MOHD SAPINYE', 'PEGAWAI', 'F44', 2, 1),
(2, '001025011350', '001025011350', 10000, 0, 0, '2020-09-25 21:21:29', 'NOOR AZRENNAWATIE BINTI RAMDZAN', 'PEGAWAI', 'F45', 1, 1),
(3, '860905015892', '860905015892', 10000, 0, 0, '2020-09-23 10:45:41', 'NORLIZA BINTI ABDUL SALAM', 'PENOLONG PEGAWAI TEKNOLOGI MAKLUMAT', 'FA32(KUP)', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
