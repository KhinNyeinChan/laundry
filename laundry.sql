-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 06:28 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`) VALUES
(1, 'Wash', 'wa'),
(2, 'Dry', 'dr'),
(3, 'Iron', 'ir'),
(4, 'Softener', 'st'),
(5, 'Other', 'oth'),
(6, 'Clothes', 'clo');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `status`) VALUES
(1, 'Afghanistan', 1),
(2, 'Albania', 1),
(3, 'Algeria', 1),
(4, 'Andorra', 1),
(5, 'Angola', 1),
(6, 'Antigua and Barbuda', 1),
(7, 'Argentina', 1),
(8, 'Armenia', 1),
(9, 'Australia', 1),
(10, 'Austria', 1),
(11, 'Azerbaijan', 1),
(12, 'Bahamas', 1),
(13, 'Bahrain', 1),
(14, 'Bangladesh', 1),
(15, 'Barbados', 1),
(16, 'Belarus', 1),
(17, 'Belgium', 1),
(18, 'Belize', 1),
(19, 'Benin', 1),
(20, 'Bhutan', 1),
(21, 'Bolivia', 1),
(22, 'Bosnia and Herzegovina', 1),
(23, 'Botswana', 1),
(24, 'Brazil', 1),
(25, 'Brunei', 1),
(26, 'Bulgaria', 1),
(27, 'Burkina Faso', 1),
(28, 'Burundi', 1),
(29, 'Cabo Verde', 1),
(30, 'Cambodia', 1),
(31, 'Cameroon', 1),
(32, 'Canada', 1),
(33, 'Central African Republic', 1),
(34, 'Chad', 1),
(35, 'Chile', 1),
(36, 'China', 1),
(37, 'Colombia', 1),
(38, 'Comoros', 1),
(39, 'Congo, Republic of the', 1),
(40, 'Congo, Democratic Republic of the', 1),
(41, 'Costa Rica', 1),
(42, 'Cote d Ivoire', 1),
(43, 'Croatia', 1),
(44, 'Cuba', 1),
(45, 'Cyprus', 1),
(46, 'Czech Republic', 1),
(47, 'Denmark', 1),
(48, 'Djibouti', 1),
(49, 'Dominica', 1),
(50, 'Dominican Republic', 1),
(51, 'Ecuador', 1),
(52, 'Egypt', 1),
(53, 'El Salvador', 1),
(54, 'Equatorial Guinea', 1),
(55, 'Eritrea', 1),
(56, 'Estonia', 1),
(57, 'Ethiopia', 1),
(58, 'Fiji', 1),
(59, 'Finland', 1),
(60, 'France', 1),
(61, 'Gabon', 1),
(62, 'Gambia', 1),
(63, 'Georgia', 1),
(64, 'Germany', 1),
(65, 'Ghana', 1),
(66, 'Greece', 1),
(67, 'Grenada', 1),
(68, 'Guatemala', 1),
(69, 'Guinea', 1),
(70, 'Guinea-Bissau', 1),
(71, 'Guyana', 1),
(72, 'Haiti', 1),
(73, 'Honduras', 1),
(74, 'Hungary', 1),
(75, 'Iceland', 1),
(76, 'India', 1),
(77, 'Indonesia', 1),
(78, 'Iran', 1),
(79, 'Iraq', 1),
(80, 'Ireland', 1),
(81, 'Italy', 1),
(82, 'Jamaica', 1),
(83, 'Japan', 1),
(84, 'Jordan', 1),
(85, 'Kazakhstan', 1),
(86, 'Kenya', 1),
(87, 'Kiribati', 1),
(88, 'Kosovo', 1),
(89, 'Kuwait', 1),
(90, 'Kyrgyzstan', 1),
(91, 'Laos', 1),
(92, 'Latvia', 1),
(93, 'Lebanon', 1),
(94, 'Lesotho', 1),
(95, 'Liberia', 1),
(96, 'Libya', 1),
(97, 'Liechtenstein', 1),
(98, 'Lithuania', 1),
(99, 'Luxembourg', 1),
(100, 'Macedonia', 1),
(101, 'Madagascar', 1),
(102, 'Malawi', 1),
(103, 'Malaysia', 1),
(104, 'Maldives', 1),
(105, 'Mali', 1),
(106, 'Malta', 1),
(107, 'Marshall Islands', 1),
(108, 'Mauritania', 1),
(109, 'Mauritius', 1),
(110, 'Mexico', 1),
(111, 'Micronesia', 1),
(112, 'Moldova', 1),
(113, 'Monaco', 1),
(114, 'Mongolia', 1),
(115, 'Montenegro', 1),
(116, 'Morocco', 1),
(117, 'Mozambique', 1),
(118, 'Myanmar (Burma)', 1),
(119, 'Namibia', 1),
(120, 'Nauru', 1),
(121, 'Nepal', 1),
(122, 'Netherlands', 1),
(123, 'New Zealand', 1),
(124, 'Nicaragua', 1),
(125, 'Niger', 1),
(126, 'Nigeria', 1),
(127, 'North Korea', 1),
(128, 'Norway', 1),
(129, 'Oman', 1),
(130, 'Pakistan', 1),
(131, 'Palau', 1),
(132, 'Palestine', 1),
(133, 'Panama', 1),
(134, 'Papua New Guinea', 1),
(135, 'Paraguay', 1),
(136, 'Peru', 1),
(137, 'Philippines', 1),
(138, 'Poland', 1),
(139, 'Portugal', 1),
(140, 'Qatar', 1),
(141, 'Romania', 1),
(142, 'Russia', 1),
(143, 'Rwanda', 1),
(144, 'St. Kitts and Nevis', 1),
(145, 'St. Lucia', 1),
(146, 'St. Vincent and The Grenadines', 1),
(147, 'Samoa', 1),
(148, 'San Marino', 1),
(149, 'Sao Tome and Principe', 1),
(150, 'Saudi Arabia', 1),
(151, 'Senegal', 1),
(152, 'Serbia', 1),
(153, 'Seychelles', 1),
(154, 'Sierra Leone', 1),
(155, 'Singapore', 1),
(156, 'Slovakia', 1),
(157, 'Slovenia', 1),
(158, 'Solomon Islands', 1),
(159, 'Somalia', 1),
(160, 'South Africa', 1),
(161, 'South Korea', 1),
(162, 'South Sudan', 1),
(163, 'Spain', 1),
(164, 'Sri Lanka', 1),
(165, 'Sudan', 1),
(166, 'Suriname', 1),
(167, 'Swaziland', 1),
(168, 'Sweden', 1),
(169, 'Switzerland', 1),
(170, 'Syria', 1),
(171, 'Taiwan', 1),
(172, 'Tajikistan', 1),
(173, 'Tanzania', 1),
(174, 'Thailand', 1),
(175, 'Timor-Leste', 1),
(176, 'Togo', 1),
(177, 'Tonga', 1),
(178, 'Trinidad and Tobago', 1),
(179, 'Tunisia', 1),
(180, 'Turkey', 1),
(181, 'Turkmenistan', 1),
(182, 'Tuvalu', 1),
(183, 'Uganda', 1),
(184, 'Ukraine', 1),
(185, 'United Arab Emirates', 1),
(186, 'United Kingdom (UK)', 1),
(187, 'United States of America (USA)', 1),
(188, 'Uruguay', 1),
(189, 'Uzbekistan', 1),
(190, 'Vanuatu', 1),
(191, 'Vatican City (Holy See)', 1),
(192, 'Venezuela', 1),
(193, 'Vietnam', 1),
(194, 'Yemen', 1),
(195, 'Zambia', 1),
(196, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `customfield` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `address`, `customfield`) VALUES
(1, 'zzz', '09786775676', 'jgjfjj', 'uiio'),
(2, 'nnvn', '0986564646', 'hgjhk', 'jh'),
(3, 'khin nyein chan', '09253267774', 'banmaw', ''),
(5, 'xfv', 'sfd', 'sf', 'sdf'),
(7, 'knc', '09256129483', 'gshdh', ''),
(8, 'ggg', '09256129483', 'rrty', 'gsf'),
(9, 'Ay Sea', '09999993443', 'Kone Law', 'banana tree');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `discount`) VALUES
(1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `reference` varchar(255) NOT NULL,
  `amount` int(100) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `expense_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `date`, `reference`, `amount`, `note`, `created_by`, `attachment`, `expense_category`) VALUES
(8, '2020-08-05 00:00:00', 'yyyyy', 7000, '', '', '', '9'),
(9, '2020-08-12 00:00:00', 'h,klhb', 9000, 'hguioo', '', '', '10'),
(10, '2021-06-27 00:00:00', 'uuu', 50000, 'yuui', '', '', '9');

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `name`) VALUES
(9, 'water tax'),
(10, 'Electric ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime NOT NULL,
  `total_qty` int(100) NOT NULL,
  `total_item` int(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `ref_note` varchar(255) DEFAULT NULL,
  `assign_to` varchar(255) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `start_date`, `end_date`, `total_qty`, `total_item`, `payment_status`, `created_by`, `customer_name`, `order_status`, `ref_note`, `assign_to`, `total`, `discount`, `subtotal`) VALUES
(6, 3, '2020-09-02 16:28:52', '2020-09-05 00:00:00', 4, 2, 'Hold', '1', 'khin nyein chan', 'RFP', '', '', 0, 0, 0),
(7, 3, '2020-09-04 15:03:49', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'WIP', 'ghfdj', '', 0, 0, 0),
(8, 3, '2020-09-04 15:05:02', '2020-09-05 00:00:00', 2, 1, 'paid', '1', 'khin nyein chan', 'received', 'fhgfgh', '', 0, 0, 0),
(9, 3, '2020-09-04 15:06:31', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'hytyu', '', 0, 0, 0),
(10, 3, '2020-09-04 15:07:50', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'yrtdty', '', 0, 0, 0),
(11, 2, '2020-09-04 15:12:55', '2020-09-17 00:00:00', 2, 1, 'paid', '1', 'nnvn', 'received', 'tyhtur', '', 0, 0, 0),
(12, 1, '2020-09-04 15:13:50', '2020-09-07 00:00:00', 2, 2, 'paid', '1', 'zzz', 'received', 'mmmm', '', 0, 0, 0),
(13, 3, '2020-09-04 15:20:07', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'aasddas', '', 0, 0, 0),
(14, 3, '2020-09-04 15:21:48', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', '', '', 0, 0, 0),
(15, 3, '2020-09-04 15:26:52', '0000-00-00 00:00:00', 4, 3, 'paid', '1', 'khin nyein chan', 'received', 'lkj;klj', '', 0, 0, 0),
(16, 3, '2020-09-04 15:29:09', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'asfd', '', 0, 0, 0),
(17, 3, '2020-09-04 15:30:47', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'fghj', '', 0, 0, 0),
(18, 3, '2020-09-04 15:32:59', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'gsdf', '', 0, 0, 0),
(19, 3, '2020-09-04 15:34:04', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'asdf', '', 0, 0, 0),
(20, 3, '2020-09-04 15:35:14', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'asdf', '', 0, 0, 0),
(21, 3, '2020-09-04 15:55:39', '2020-09-08 00:00:00', 3, 1, 'paid', '1', 'khin nyein chan', 'received', 'jjj', '', 0, 0, 0),
(22, 2, '2020-09-04 16:11:40', '2020-09-08 00:00:00', 4, 2, 'paid', '1', 'nnvn', 'received', 'jk.kljlj', '', 0, 0, 0),
(23, 3, '2020-09-04 16:14:32', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', '', '', 0, 0, 0),
(24, 3, '2020-09-04 16:15:42', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'dfgh', '', 0, 0, 0),
(25, 3, '2020-09-04 16:16:47', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', '', '', 0, 0, 0),
(26, 3, '2020-09-04 16:17:28', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', '', '', 0, 0, 0),
(27, 3, '2020-09-04 16:20:16', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'sdafasdf', '', 0, 0, 0),
(28, 3, '2020-09-04 16:21:45', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'asdf', '', 0, 0, 0),
(29, 8, '2020-09-06 11:20:14', '2020-09-10 00:00:00', 2, 2, 'partial', '1', 'ggg', 'received', 'rrrr', '', 0, 0, 0),
(30, 3, '2020-09-08 22:58:23', '2020-09-10 00:00:00', 2, 2, 'paid', '1', 'khin nyein chan', 'received', '', '', 0, 0, 0),
(31, 5, '2020-09-08 23:03:11', '2020-09-09 00:00:00', 3, 3, 'paid', '1', 'xfv', 'received', '', '', 0, 0, 0),
(32, 2, '2020-09-08 23:06:32', '2020-09-10 00:00:00', 2, 1, 'paid', '1', 'nnvn', 'received', '', '', 0, 0, 0),
(33, 6, '2020-09-09 21:41:30', '2020-09-11 00:00:00', 5, 4, 'paid', '1', 'sadf', 'received', 'iiiii', '', 0, 0, 0),
(34, 6, '2020-09-09 21:44:32', '2020-09-12 00:00:00', 1, 1, 'partial', '1', 'sadf', 'received', '', '', 0, 0, 0),
(35, 6, '2020-09-09 21:49:20', '2020-09-10 00:00:00', 2, 2, 'partial', '1', 'sadf', 'received', '', '', 0, 0, 0),
(36, 6, '2020-09-09 21:57:39', '2020-09-10 00:00:00', 2, 2, 'paid', '1', 'sadf', 'received', '', '', 0, 0, 0),
(37, 8, '2020-09-10 22:55:53', '2020-09-12 00:00:00', 3, 3, 'paid', '1', 'ggg', 'received', '', '', 0, 0, 0),
(38, 5, '2020-09-10 22:57:09', '2020-09-12 00:00:00', 2, 1, 'paid', '1', 'xfv', 'received', '', '', 0, 0, 0),
(39, 8, '2020-09-10 23:08:03', '2020-09-12 00:00:00', 3, 3, 'paid', '1', 'ggg', 'received', '', '', 0, 0, 0),
(40, 1, '2020-09-10 23:09:15', '2020-09-11 00:00:00', 1, 1, 'paid', '1', 'zzz', 'received', '', '', 0, 0, 0),
(41, 1, '2020-09-10 23:15:07', '2020-09-11 00:00:00', 2, 2, 'paid', '1', 'zzz', 'received', '', '', 0, 0, 0),
(42, 8, '2020-09-10 23:18:57', '2020-09-12 00:00:00', 2, 2, 'paid', '1', 'ggg', 'received', '', '', 0, 0, 0),
(43, 6, '2020-09-10 23:22:14', '2020-09-12 00:00:00', 3, 3, 'unpaid', '1', 'sadf', 'received', '', '', 0, 0, 0),
(44, 2, '2020-09-10 23:42:12', '2020-09-12 00:00:00', 2, 2, 'unpaid', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(45, 6, '2020-09-10 23:43:34', '2020-09-12 00:00:00', 2, 1, 'paid', '1', 'sadf', 'received', '', NULL, 0, 0, 0),
(46, 6, '2020-09-10 23:48:57', '2020-09-12 00:00:00', 4, 2, 'paid', '1', 'sadf', 'received', '', NULL, 0, 0, 0),
(47, 2, '2020-09-11 10:51:40', '2020-09-12 00:00:00', 2, 2, 'paid', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(48, 5, '2020-09-11 11:08:06', '2020-09-12 00:00:00', 1, 1, 'paid', '1', 'xfv', 'received', '', NULL, 0, 0, 0),
(49, 2, '2020-09-11 11:11:06', '2020-09-12 00:00:00', 1, 1, 'paid', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(50, 2, '2020-09-11 22:11:12', '2020-09-12 00:00:00', 2, 2, 'paid', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(51, 2, '2020-09-11 22:18:57', '2020-09-12 00:00:00', 2, 2, 'paid', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(52, 1, '2020-09-11 22:53:29', '2020-09-12 00:00:00', 1, 1, 'paid', '1', 'zzz', 'received', '', NULL, 0, 0, 0),
(53, 2, '2020-09-11 22:54:25', '2020-09-12 00:00:00', 2, 2, 'paid', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(54, 1, '2020-09-11 22:57:02', '2020-09-12 00:00:00', 2, 2, 'paid', '1', 'zzz', 'received', '', NULL, 0, 0, 0),
(55, 3, '2020-09-11 23:03:26', '2020-09-12 00:00:00', 2, 2, 'paid', '1', 'khin nyein chan', 'received', '', NULL, 0, 0, 0),
(56, 5, '2020-09-11 23:04:25', '2020-09-14 00:00:00', 4, 2, 'paid', '1', 'xfv', 'received', '', NULL, 0, 0, 0),
(57, 6, '2020-09-11 23:06:03', '2020-09-14 00:00:00', 4, 2, 'paid', '1', 'sadf', 'received', '', NULL, 0, 0, 0),
(58, 7, '2020-09-11 23:07:16', '2020-09-13 00:00:00', 2, 2, 'paid', '1', 'knc', 'received', '', NULL, 0, 0, 0),
(59, 8, '2020-09-11 23:08:19', '2020-09-14 00:00:00', 2, 2, 'paid', '1', 'ggg', 'received', '', NULL, 0, 0, 0),
(60, 2, '2020-09-11 23:18:17', '2020-09-12 00:00:00', 2, 2, 'paid', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(61, 8, '2020-09-11 23:22:17', '2020-09-14 00:00:00', 3, 3, 'paid', '1', 'ggg', 'received', '', NULL, 0, 0, 0),
(62, 3, '2020-09-11 23:26:45', '2020-09-12 00:00:00', 2, 2, 'paid', '1', 'khin nyein chan', 'received', '', NULL, 0, 0, 0),
(63, 2, '2020-09-12 23:52:45', '2020-09-14 00:00:00', 1, 1, 'paid', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(64, 3, '2020-09-13 23:36:12', '2020-09-14 00:00:00', 4, 4, 'paid', '1', 'khin nyein chan', 'received', '', NULL, 0, 0, 0),
(65, 2, '2020-09-13 23:38:35', '2020-09-15 00:00:00', 2, 2, 'partial', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(66, 7, '2020-09-13 23:40:38', '2020-09-16 00:00:00', 3, 2, 'partial', '1', 'knc', 'received', '', NULL, 0, 0, 0),
(67, 5, '2020-09-13 23:43:54', '2020-09-14 00:00:00', 1, 1, 'paid', '1', 'xfv', 'received', '', NULL, 0, 0, 0),
(68, 5, '2020-09-13 23:46:04', '2020-09-15 00:00:00', 1, 1, 'paid', '1', 'xfv', 'received', '', NULL, 0, 0, 0),
(69, 8, '2020-09-13 23:49:36', '2020-09-14 00:00:00', 1, 1, 'paid', '1', 'ggg', 'received', '', NULL, 0, 0, 0),
(70, 6, '2020-09-13 23:53:39', '2020-09-15 00:00:00', 2, 2, 'paid', '1', 'sadf', 'received', '', NULL, 0, 0, 0),
(71, 1, '2020-09-13 23:56:49', '2020-09-14 00:00:00', 1, 1, 'partial', '1', 'zzz', 'received', '', NULL, 0, 0, 0),
(72, 1, '2020-09-14 21:01:21', '2020-09-16 00:00:00', 2, 2, 'partial', '1', 'zzz', 'received', '', NULL, 0, 0, 0),
(73, 1, '2020-09-14 21:33:18', '2020-09-16 00:00:00', 2, 2, 'paid', '1', 'zzz', 'received', '', NULL, 0, 0, 0),
(74, 3, '2020-09-14 21:38:44', '2020-09-17 00:00:00', 2, 2, 'paid', '1', 'khin nyein chan', 'received', '', NULL, 0, 0, 0),
(75, 8, '2020-09-14 21:40:59', '2020-09-23 00:00:00', 1, 1, 'paid', '1', 'ggg', 'received', '', NULL, 0, 0, 0),
(76, 9, '2020-09-14 21:41:53', '0000-00-00 00:00:00', 1, 1, 'partial', '1', 'Ay Sea', 'received', '', NULL, 0, 0, 0),
(77, 9, '2020-09-14 21:49:01', '2020-09-18 00:00:00', 1, 1, 'partial', '1', 'Ay Sea', 'received', '', NULL, 0, 0, 0),
(78, 2, '2020-09-14 22:06:45', '2020-09-18 00:00:00', 1, 1, 'paid', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(79, 5, '2020-09-14 22:09:18', '0000-00-00 00:00:00', 1, 1, 'paid', '1', 'xfv', 'received', '', NULL, 0, 0, 0),
(80, 1, '2020-09-14 22:12:37', '2020-09-19 00:00:00', 1, 1, 'paid', '1', 'zzz', 'received', '', NULL, 0, 0, 0),
(81, 8, '2020-09-14 22:17:56', '2020-09-17 00:00:00', 1, 1, 'paid', '1', 'ggg', 'received', '', NULL, 0, 0, 0),
(82, 7, '2020-09-14 22:41:10', '2020-09-17 00:00:00', 3, 1, 'paid', '1', 'knc', 'received', '', NULL, 0, 0, 0),
(83, 1, '2020-09-14 22:46:51', '2020-09-18 00:00:00', 2, 2, 'paid', '1', 'zzz', 'received', '', NULL, 0, 0, 0),
(84, 8, '2020-09-14 22:47:37', '2020-09-19 00:00:00', 2, 2, 'paid', '1', 'ggg', 'received', '', NULL, 0, 0, 0),
(85, 6, '2020-09-14 22:56:23', '2020-09-16 00:00:00', 5, 1, 'paid', '1', 'sadf', 'received', '', NULL, 0, 0, 0),
(86, 3, '2020-09-14 22:58:13', '2020-09-17 00:00:00', 3, 1, 'paid', '1', 'khin nyein chan', 'received', '', NULL, 0, 0, 0),
(87, 5, '2020-09-14 23:04:36', '2020-09-17 00:00:00', 2, 2, 'paid', '1', 'xfv', 'received', '', NULL, 0, 0, 0),
(88, 9, '2020-09-14 23:10:28', '2020-09-16 00:00:00', 2, 2, 'paid', '1', 'Ay Sea', 'received', '', NULL, 0, 0, 0),
(89, 5, '2020-09-14 23:31:41', '2020-09-16 00:00:00', 2, 2, 'paid', '1', 'xfv', 'received', '', NULL, 0, 0, 0),
(90, 1, '2020-09-14 23:47:11', '2020-09-16 00:00:00', 3, 1, 'paid', '1', 'zzz', 'received', '', NULL, 0, 0, 0),
(91, 2, '2020-09-15 11:12:55', '2020-09-17 00:00:00', 2, 2, 'paid', '1', 'nnvn', 'received', '', NULL, 0, 0, 0),
(92, 9, '2020-09-15 21:06:51', '2020-09-18 00:00:00', 2, 2, 'paid', 'Super', 'Ay Sea', 'received', '', NULL, 0, 0, 0),
(93, 9, '2020-09-16 18:48:00', '2020-09-18 00:00:00', 4, 4, 'paid', 'Super', 'Ay Sea', 'received', '', NULL, 0, 0, 0),
(94, 5, '2020-09-16 20:28:18', '2020-09-19 00:00:00', 9, 4, 'paid', 'Super', 'xfv', 'received', '', NULL, 0, 0, 0),
(95, 9, '2020-09-16 20:40:34', '2020-09-19 00:00:00', 7, 3, 'paid', 'Super', 'Ay Sea', 'received', '', NULL, 0, 0, 0),
(96, 8, '2020-09-16 22:45:20', '2020-09-17 00:00:00', 2, 2, 'paid', 'Super', 'ggg', 'received', '', NULL, 0, 0, 0),
(97, 2, '2020-09-16 22:46:18', '2020-09-18 00:00:00', 2, 2, 'paid', 'Super', 'nnvn', 'received', '', NULL, 0, 0, 0),
(98, 3, '2020-09-16 22:47:43', '2020-09-17 00:00:00', 3, 1, 'paid', 'Super', 'khin nyein chan', 'received', '', NULL, 0, 0, 0),
(99, 9, '2020-09-16 22:56:45', '2020-09-18 10:00:00', 13, 6, 'paid', 'Super', 'Ay Sea', 'received', '', NULL, 0, 0, 0),
(100, 5, '2020-09-18 11:06:37', '2020-09-19 11:05:00', 14, 4, 'paid', 'Super', 'xfv', 'received', '', NULL, 0, 0, 0),
(101, 1, '2020-09-18 11:40:06', '2020-09-19 11:39:00', 3, 2, 'unpaid', 'Super', 'zzz', 'received', '', NULL, 0, 0, 0),
(102, 7, '2020-09-18 11:52:47', '2020-09-20 11:52:00', 8, 4, 'unpaid', 'Super', 'knc', 'received', '', NULL, 0, 0, 0),
(103, 2, '2020-09-18 21:40:55', '2020-09-20 09:40:00', 2, 1, 'unpaid', 'Super', 'nnvn', 'received', '', NULL, 3000, 0, 3000),
(104, 9, '2020-09-18 21:42:20', '2020-09-22 09:00:00', 15, 4, 'unpaid', 'Super', 'Ay Sea', 'received', '', NULL, 2650, 0, 2650),
(105, 3, '2020-09-18 22:12:52', '2020-09-19 22:12:00', 3, 3, 'unpaid', 'Super', 'khin nyein chan', 'received', '', NULL, 9500, 1000, 8500);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) DEFAULT NULL,
  `assign_to` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `product_code`, `product_name`, `product_price`, `status`, `modified_time`, `modified_by`, `assign_to`) VALUES
(3, 6, 1, 2, 'w8', 'Wash 8 kg', 0, 'Hold', '2020-09-02 16:28:52', '', ''),
(4, 6, 2, 2, 'w15', 'Wash 15 kg', 0, 'Hold', '2020-09-02 16:28:52', '', 'Daw mya'),
(5, 8, 10, 2, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-04 15:05:02', '', ''),
(6, 9, 7, 2, 'oth', 'Other', 0, 'received', '2020-09-04 15:06:31', '', ''),
(7, 9, 6, 2, 'std', 'Softener', 0, 'received', '2020-09-04 15:06:32', '', ''),
(8, 10, 10, 2, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-04 15:07:50', '', ''),
(9, 10, 8, 2, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-04 15:07:50', '', ''),
(10, 11, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:12:55', '', ''),
(11, 12, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-04 15:13:50', '', ''),
(12, 12, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-04 15:13:50', '', ''),
(13, 13, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:20:07', '', ''),
(14, 13, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:20:07', '', ''),
(15, 14, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:21:48', '', ''),
(16, 14, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:21:48', '', ''),
(17, 15, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:26:52', '', ''),
(18, 15, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:26:52', '', ''),
(19, 15, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-04 15:26:52', '', ''),
(20, 16, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:29:09', '', ''),
(21, 16, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:29:09', '', ''),
(22, 17, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:30:47', '', ''),
(23, 17, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:30:47', '', ''),
(24, 18, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:32:59', '', ''),
(25, 18, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:32:59', '', ''),
(26, 19, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:34:04', '', ''),
(27, 19, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:34:04', '', ''),
(28, 20, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:35:15', '', ''),
(29, 20, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:35:15', '', ''),
(30, 21, 1, 3, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:55:40', '', ''),
(31, 22, 4, 2, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-04 16:11:40', '', ''),
(32, 22, 3, 2, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-04 16:11:40', '', ''),
(33, 23, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:14:32', '', ''),
(34, 23, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:14:32', '', ''),
(35, 24, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:15:42', '', ''),
(36, 24, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:15:42', '', ''),
(37, 25, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:16:47', '', ''),
(38, 25, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:16:47', '', ''),
(39, 26, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:17:28', '', ''),
(40, 26, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:17:28', '', ''),
(41, 27, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:20:16', '', ''),
(42, 27, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:20:16', '', ''),
(43, 28, 1, 2, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:21:45', '', ''),
(44, 28, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:21:45', '', ''),
(45, 29, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-06 11:20:14', '', ''),
(46, 29, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-06 11:20:14', '', ''),
(47, 30, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-08 22:58:23', '', ''),
(48, 30, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-08 22:58:23', '', ''),
(49, 31, 6, 1, 'std', 'Softener', 0, 'received', '2020-09-08 23:03:11', '', ''),
(50, 31, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-08 23:03:11', '', ''),
(51, 31, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-08 23:03:11', '', ''),
(52, 32, 8, 2, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-08 23:06:33', '', ''),
(53, 33, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-09 21:41:30', '', ''),
(54, 33, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-09 21:41:30', '', ''),
(55, 33, 5, 2, 'ir', 'Iron', 0, 'received', '2020-09-09 21:41:31', '', ''),
(56, 33, 6, 1, 'std', 'Softener', 0, 'received', '2020-09-09 21:41:31', '', ''),
(57, 34, 9, 1, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-09 21:44:32', '', ''),
(58, 35, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-09 21:49:20', '', ''),
(59, 35, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-09 21:49:20', '', ''),
(60, 36, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-09 21:57:39', '', ''),
(61, 36, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-09 21:57:39', '', ''),
(62, 37, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 22:55:53', '', ''),
(63, 37, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-10 22:55:53', '', ''),
(64, 37, 6, 1, 'std', 'Softener', 0, 'received', '2020-09-10 22:55:53', '', ''),
(65, 38, 2, 2, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-10 22:57:09', '', ''),
(66, 39, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 23:08:03', '', ''),
(67, 39, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-10 23:08:03', '', ''),
(68, 39, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-10 23:08:03', '', ''),
(69, 40, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 23:09:15', '', ''),
(70, 41, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-10 23:15:08', '', ''),
(71, 41, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-10 23:15:08', '', ''),
(72, 42, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-10 23:18:57', '', ''),
(73, 42, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-10 23:18:57', '', ''),
(74, 43, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 23:22:14', '', ''),
(75, 43, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-10 23:22:14', '', ''),
(76, 43, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-10 23:22:14', '', ''),
(77, 44, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 23:42:12', NULL, NULL),
(78, 44, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-10 23:42:13', NULL, NULL),
(79, 45, 3, 2, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-10 23:43:34', NULL, NULL),
(80, 46, 1, 3, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 23:48:57', NULL, NULL),
(81, 46, 10, 1, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-10 23:48:57', NULL, NULL),
(82, 47, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 10:51:40', NULL, NULL),
(83, 47, 10, 1, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-11 10:51:40', NULL, NULL),
(84, 48, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-11 11:08:06', NULL, NULL),
(85, 49, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 11:11:06', NULL, NULL),
(86, 50, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-11 22:11:13', NULL, NULL),
(87, 50, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-11 22:11:13', NULL, NULL),
(88, 51, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 22:18:57', NULL, NULL),
(89, 51, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-11 22:18:57', NULL, NULL),
(90, 52, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 22:53:29', NULL, NULL),
(91, 53, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 22:54:25', NULL, NULL),
(92, 53, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-11 22:54:25', NULL, NULL),
(93, 54, 5, 1, 'ir', 'Iron', 0, 'received', '2020-09-11 22:57:02', NULL, NULL),
(94, 54, 6, 1, 'std', 'Softener', 0, 'received', '2020-09-11 22:57:02', NULL, NULL),
(95, 55, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 23:03:26', NULL, NULL),
(96, 55, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-11 23:03:26', NULL, NULL),
(97, 56, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-11 23:04:25', NULL, NULL),
(98, 56, 4, 3, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-11 23:04:25', NULL, NULL),
(99, 57, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 23:06:03', NULL, NULL),
(100, 57, 2, 3, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-11 23:06:03', NULL, NULL),
(101, 58, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 23:07:16', NULL, NULL),
(102, 58, 6, 1, 'std', 'Softener', 0, 'received', '2020-09-11 23:07:16', NULL, NULL),
(103, 59, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-11 23:08:19', NULL, NULL),
(104, 59, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-11 23:08:19', NULL, NULL),
(105, 60, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-11 23:18:17', NULL, NULL),
(106, 60, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-11 23:18:17', NULL, NULL),
(107, 61, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 23:22:17', NULL, NULL),
(108, 61, 9, 1, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-11 23:22:18', NULL, NULL),
(109, 61, 6, 1, 'std', 'Softener', 0, 'received', '2020-09-11 23:22:18', NULL, NULL),
(110, 62, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-11 23:26:45', NULL, NULL),
(111, 62, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-11 23:26:45', NULL, NULL),
(112, 63, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-12 23:52:45', NULL, NULL),
(113, 64, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-13 23:36:12', NULL, NULL),
(114, 64, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-13 23:36:12', NULL, NULL),
(115, 64, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-13 23:36:12', NULL, NULL),
(116, 64, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-13 23:36:12', NULL, NULL),
(117, 65, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-13 23:38:35', NULL, NULL),
(118, 65, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-13 23:38:35', NULL, NULL),
(119, 66, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-13 23:40:38', NULL, NULL),
(120, 66, 4, 2, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-13 23:40:38', NULL, NULL),
(121, 67, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-13 23:43:54', NULL, NULL),
(122, 68, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-13 23:46:04', NULL, NULL),
(123, 69, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-13 23:49:36', NULL, NULL),
(124, 70, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-13 23:53:39', NULL, NULL),
(125, 70, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-13 23:53:40', NULL, NULL),
(126, 71, 9, 1, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-13 23:56:49', NULL, NULL),
(127, 72, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-14 21:01:21', NULL, NULL),
(128, 72, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-14 21:01:21', NULL, NULL),
(129, 73, 9, 1, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-14 21:33:18', NULL, NULL),
(130, 73, 10, 1, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 21:33:18', NULL, NULL),
(131, 74, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-14 21:38:44', NULL, NULL),
(132, 74, 11, 1, 'd30', 'Dry 30 Kg', 0, 'received', '2020-09-14 21:38:44', NULL, NULL),
(133, 75, 10, 1, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 21:40:59', NULL, NULL),
(134, 76, 10, 1, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 21:41:54', NULL, NULL),
(135, 77, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-14 21:49:01', NULL, NULL),
(136, 78, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-14 22:06:45', NULL, NULL),
(137, 79, 10, 1, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 22:09:18', NULL, NULL),
(138, 80, 11, 1, 'd30', 'Dry 30 Kg', 0, 'received', '2020-09-14 22:12:37', NULL, NULL),
(139, 81, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-14 22:17:56', NULL, NULL),
(140, 82, 7, 3, 'oth', 'Other', 0, 'received', '2020-09-14 22:41:10', NULL, NULL),
(141, 83, 10, 1, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 22:46:51', NULL, NULL),
(142, 83, 9, 1, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-14 22:46:51', NULL, NULL),
(143, 84, 10, 1, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 22:47:37', NULL, NULL),
(144, 84, 9, 1, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-14 22:47:37', NULL, NULL),
(145, 85, 5, 5, 'ir', 'Iron', 0, 'received', '2020-09-14 22:56:23', NULL, NULL),
(146, 86, 1, 3, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-14 22:58:13', NULL, NULL),
(147, 87, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-14 23:04:36', NULL, NULL),
(148, 87, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-14 23:04:36', NULL, NULL),
(149, 88, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-14 23:10:28', NULL, NULL),
(150, 88, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-14 23:10:28', NULL, NULL),
(151, 89, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-14 23:31:41', NULL, NULL),
(152, 89, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-14 23:31:41', NULL, NULL),
(153, 90, 9, 3, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-14 23:47:11', NULL, NULL),
(154, 91, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-15 11:12:55', NULL, NULL),
(155, 91, 9, 1, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-15 11:12:55', NULL, NULL),
(156, 92, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-15 21:06:51', NULL, NULL),
(157, 92, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-15 21:06:51', NULL, NULL),
(158, 93, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-16 18:48:01', NULL, NULL),
(159, 93, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-16 18:48:01', NULL, NULL),
(160, 93, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-16 18:48:01', NULL, NULL),
(161, 93, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-16 18:48:01', NULL, NULL),
(162, 94, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-16 20:28:18', NULL, NULL),
(163, 94, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-16 20:28:18', NULL, NULL),
(164, 94, 5, 6, 'ir', 'Iron', 0, 'received', '2020-09-16 20:28:18', NULL, NULL),
(165, 94, 6, 1, 'std', 'Softener', 0, 'received', '2020-09-16 20:28:18', NULL, NULL),
(166, 95, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-16 20:40:34', NULL, NULL),
(167, 95, 11, 1, 'd30', 'Dry 30 Kg', 0, 'received', '2020-09-16 20:40:35', NULL, NULL),
(168, 95, 5, 5, 'ir', 'Iron', 0, 'received', '2020-09-16 20:40:35', NULL, NULL),
(169, 96, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-16 22:45:20', NULL, NULL),
(170, 96, 9, 1, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-16 22:45:20', NULL, NULL),
(171, 97, 9, 1, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-16 22:46:18', NULL, NULL),
(172, 97, 10, 1, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-16 22:46:18', NULL, NULL),
(173, 98, 5, 3, 'ir', 'Iron', 0, 'received', '2020-09-16 22:47:44', NULL, NULL),
(174, 99, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(175, 99, 2, 1, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(176, 99, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(177, 99, 4, 1, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(178, 99, 5, 7, 'ir', 'Iron', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(179, 99, 6, 2, 'std', 'Softener', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(180, 100, 8, 1, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-18 11:06:37', NULL, NULL),
(181, 100, 11, 1, 'd30', 'Dry 30 Kg', 0, 'received', '2020-09-18 11:06:37', NULL, NULL),
(182, 100, 5, 10, 'ir', 'Iron', 0, 'received', '2020-09-18 11:06:37', NULL, NULL),
(183, 100, 6, 2, 'std', 'Softener', 0, 'received', '2020-09-18 11:06:37', NULL, NULL),
(184, 101, 10, 1, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-18 11:40:06', NULL, NULL),
(185, 101, 11, 2, 'd30', 'Dry 30 Kg', 0, 'received', '2020-09-18 11:40:06', NULL, NULL),
(186, 102, 1, 1, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-18 11:52:47', NULL, NULL),
(187, 102, 3, 1, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-18 11:52:48', NULL, NULL),
(188, 102, 5, 5, 'ir', 'Iron', 0, 'received', '2020-09-18 11:52:48', NULL, NULL),
(189, 102, 6, 1, 'std', 'Softener', 0, 'received', '2020-09-18 11:52:48', NULL, NULL),
(190, 103, 2, 2, 'w15', 'Wash 15 kg', 1500, 'received', '2020-09-18 21:40:55', NULL, NULL),
(191, 104, 1, 1, 'w8', 'Wash 8 kg', 1000, 'received', '2020-09-18 21:42:20', NULL, NULL),
(192, 104, 3, 1, 'd8', 'Dry 8 kg', 1000, 'received', '2020-09-18 21:42:20', NULL, NULL),
(193, 104, 5, 12, 'ir', 'Iron', 50, 'received', '2020-09-18 21:42:20', NULL, NULL),
(194, 104, 6, 1, 'std', 'Softener', 50, 'received', '2020-09-18 21:42:20', NULL, NULL),
(195, 105, 9, 1, 'w50', 'Wash 50 kg', 2500, 'received', '2020-09-18 22:12:52', NULL, NULL),
(196, 105, 10, 1, 'w100', 'Wash 100 kg', 5000, 'received', '2020-09-18 22:12:52', NULL, NULL),
(197, 105, 8, 1, 'w30', 'Wash 30 kg', 2000, 'received', '2020-09-18 22:12:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `note` varchar(255) NOT NULL,
  `paid_by` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sale_id` varchar(11) NOT NULL,
  `pos_paid` int(100) NOT NULL,
  `pos_balance` int(100) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer_id`, `amount`, `status`, `created_by`, `note`, `paid_by`, `date`, `sale_id`, `pos_paid`, `pos_balance`, `store_id`) VALUES
(1, 3, 3000, 'paid', '1', 'gggg', 'Cash', '2020-09-04 15:55:40', '2', 5000, 2000, 1),
(2, 3, 5000, 'paid', '1', 'asdf', 'Cash', '2020-09-04 16:20:16', '8', 5000, 0, 1),
(3, 3, 5000, 'paid', '1', 'asdf', 'Cash', '2020-09-04 16:21:45', '9', 5000, 0, 1),
(4, 8, 3500, 'partial', '1', 'ppp', 'Cash', '2020-09-06 11:20:15', '10', 1000, -2500, 1),
(5, 3, 2500, 'paid', '1', '', 'Cash', '2020-09-08 22:58:23', '11', 3000, 500, 1),
(6, 5, 2550, 'paid', '1', '', 'Cash', '2020-09-08 23:03:11', '12', 5000, 2450, 1),
(7, 2, 4000, 'paid', '1', '', 'Cash', '2020-09-08 23:06:33', '13', 5000, 2450, 1),
(8, 6, 2150, 'paid', '1', '', 'Cash', '2020-09-09 21:41:31', '14', 5000, 2850, 1),
(9, 6, 2500, 'partial', '1', '', 'Cash', '2020-09-09 21:44:32', '15', 1000, -1500, 1),
(10, 6, 2500, 'partial', '1', '', 'Cash', '2020-09-09 21:49:20', '16', 2000, -500, 1),
(11, 6, 2500, 'paid', '1', '', 'Cash', '2020-09-09 21:57:39', '17', 3000, 500, 1),
(12, 8, 2050, 'paid', '1', '', 'Cash', '2020-09-10 22:55:53', '18', 2050, 0, 1),
(13, 5, 3000, 'paid', '1', '', 'Cash', '2020-09-10 22:57:09', '19', 5000, 2000, 1),
(14, 8, 4500, 'paid', '1', '', 'Cash', '2020-09-10 23:08:03', '20', 5000, 500, 1),
(15, 1, 1000, 'paid', '1', '', 'Cash', '2020-09-10 23:09:15', '21', 1000, 0, 1),
(16, 1, 2500, 'paid', '1', '', 'Cash', '2020-09-10 23:15:08', '22', 3000, 500, 1),
(17, 8, 3500, 'paid', '1', '', 'Cash', '2020-09-10 23:18:57', '23', 5000, 1500, 1),
(18, 6, 2000, 'paid', '1', '', 'Cash', '2020-09-10 23:43:35', '24', 2000, 0, 1),
(19, 6, 8000, 'paid', '1', '', 'Cash', '2020-09-10 23:48:58', '25', 10000, 2000, 1),
(20, 2, 6000, 'paid', '1', '', 'Cash', '2020-09-11 10:51:40', '26', 6000, 0, 1),
(21, 5, 1000, 'paid', '1', '', 'Cash', '2020-09-11 11:08:06', '27', 1000, 0, 1),
(22, 2, 1000, 'paid', '1', '', 'Cash', '2020-09-11 11:11:06', '28', 1000, 0, 1),
(23, 2, 2500, 'paid', '1', '', 'Cash', '2020-09-11 22:11:13', '29', 7000, 4500, 1),
(24, 2, 3000, 'paid', '1', '', 'Cash', '2020-09-11 22:18:58', '30', 5000, 2000, 1),
(25, 1, 1000, 'paid', '1', '', 'Cash', '2020-09-11 22:53:29', '31', 1000, 0, 1),
(26, 2, 2500, 'paid', '1', '', 'Cash', '2020-09-11 22:54:25', '32', 2500, 0, 1),
(27, 1, 100, 'paid', '1', '', 'Cash', '2020-09-11 22:57:02', '33', 100, 0, 1),
(28, 3, 2500, 'paid', '1', '', 'Cash', '2020-09-11 23:03:26', '34', 5000, 2500, 1),
(29, 5, 5500, 'paid', '1', '', 'Cash', '2020-09-11 23:04:26', '35', 5500, 0, 1),
(30, 6, 5500, 'paid', '1', '', 'Cash', '2020-09-11 23:06:04', '36', 5500, 0, 1),
(31, 7, 1050, 'paid', '1', '', 'Cash', '2020-09-11 23:07:16', '37', 1050, 0, 1),
(32, 8, 3500, 'paid', '1', '', 'Cash', '2020-09-11 23:08:19', '38', 5000, 1500, 1),
(33, 2, 2500, 'paid', '1', '', 'Cash', '2020-09-11 23:18:17', '39', 5000, 2500, 1),
(34, 8, 3550, 'paid', '1', '', 'Cash', '2020-09-11 23:22:18', '40', 5000, 1450, 1),
(35, 3, 2500, 'paid', '1', '', 'Cash', '2020-09-11 23:26:45', '41', 2500, 0, 1),
(36, 2, 1000, 'paid', '1', '', 'Cash', '2020-09-12 23:52:46', '42', 1000, 0, 1),
(37, 7, 5000, 'partial', '1', '', 'Cash', '2020-09-13 23:40:38', '45', 2000, -3000, 1),
(38, 5, 1000, 'paid', '1', '', 'Cash', '2020-09-13 23:43:54', '46', 1000, 0, 1),
(39, 5, 1000, 'paid', '1', '', 'Cash', '2020-09-13 23:46:04', '47', 1000, 0, 1),
(40, 8, 2000, 'paid', '1', '', 'Cash', '2020-09-13 23:49:36', '48', 2000, 0, 1),
(41, 6, 3500, 'paid', '1', '', 'Cash', '2020-09-13 23:53:40', '49', 3500, 0, 1),
(42, 1, 2500, 'partial', '1', '', 'Cash', '2020-09-13 23:56:49', '50', 1000, -1500, 1),
(43, 1, 3000, 'partial', '1', '', 'Cash', '2020-09-14 21:01:21', '51', 1000, -2000, 1),
(44, 1, 7500, 'paid', '1', '', 'Cash', '2020-09-14 21:33:18', '52', 7500, 0, 1),
(45, 3, 4500, 'paid', '1', '', 'Cash', '2020-09-14 21:38:44', '53', 5000, 500, 1),
(46, 8, 5000, 'paid', '1', '', 'Cash', '2020-09-14 21:40:59', '54', 5000, 0, 1),
(47, 9, 5000, 'partial', '1', '', 'Cash', '2020-09-14 21:41:54', '55', 2000, -3000, 1),
(48, 9, 1500, 'partial', '1', '', 'Cash', '2020-09-14 21:49:01', '56', 1000, -500, 1),
(49, 2, 2000, 'paid', '1', '', 'Cash', '2020-09-14 22:06:45', '57', 2000, 0, 1),
(50, 5, 5000, 'paid', '1', '', 'Cash', '2020-09-14 22:09:18', '58', 5000, 0, 1),
(51, 1, 3000, 'paid', '1', '', 'Cash', '2020-09-14 22:12:37', '59', 3000, 0, 1),
(52, 8, 1500, 'paid', '1', '', 'Cash', '2020-09-14 22:17:56', '60', 1500, 0, 1),
(53, 7, 150, 'paid', '1', '', 'Cash', '2020-09-14 22:41:10', '61', 150, 0, 1),
(54, 1, 7500, 'paid', '1', '', 'Cash', '2020-09-14 22:46:51', '62', 7500, 0, 1),
(55, 8, 7500, 'paid', '1', '', 'Cash', '2020-09-14 22:47:37', '63', 7500, 0, 1),
(56, 6, 250, 'paid', '1', '', 'Cash', '2020-09-14 22:56:23', '64', 250, 0, 1),
(57, 3, 3000, 'paid', '1', '', 'Cash', '2020-09-14 22:58:13', '65', 3000, 0, 1),
(58, 5, 2500, 'paid', '1', '', 'Cash', '2020-09-14 23:04:36', '66', 2500, 0, 1),
(59, 9, 2500, 'paid', '1', '', 'Cash', '2020-09-14 23:10:28', '67', 2500, 0, 1),
(60, 5, 2500, 'paid', '1', '', 'Cash', '2020-09-14 23:31:41', '68', 2500, 0, 1),
(61, 1, 7500, 'paid', '1', '', 'Cash', '2020-09-14 23:47:11', '69', 7500, 0, 1),
(62, 2, 3500, 'paid', '1', '', 'Cash', '2020-09-15 11:12:55', '70', 3500, 0, 1),
(63, 9, 3000, 'paid', 'Super', '', 'Cash', '2020-09-15 21:06:51', '71', 3000, 0, 1),
(64, 9, 5000, 'paid', 'Super', '', 'Cash', '2020-09-16 18:48:01', '72', 10000, 5000, 1),
(65, 5, 2350, 'paid', 'Super', '', 'Cash', '2020-09-16 20:28:19', '73', 5000, 2650, 1),
(66, 9, 4750, 'paid', 'Super', '', 'Cash', '2020-09-16 20:40:35', '74', 5000, 250, 1),
(67, 8, 3500, 'paid', 'Super', '', 'Cash', '2020-09-16 22:45:21', '75', 3500, 0, 1),
(68, 2, 7500, 'paid', 'Super', '', 'Cash', '2020-09-16 22:46:18', '76', 7500, 0, 1),
(69, 3, 150, 'paid', 'Super', '', 'Cash', '2020-09-16 22:47:44', '77', 150, 0, 1),
(70, 9, 5450, 'paid', 'Super', '', 'Cash', '2020-09-16 22:56:46', '78', 5500, 50, 1),
(71, 5, 5320, 'paid', 'Super', '', 'Cash', '2020-09-18 11:06:37', '79', 5500, 180, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` char(255) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `price` decimal(25,2) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `category_id`, `price`, `quantity`) VALUES
(2, 'w15', 'Wash 15 kg', 1, '1500.00', 1),
(3, 'd8', 'Dry 8 kg', 2, '1000.00', 1),
(4, 'd15', 'Dry 15 kg', 2, '1500.00', 1),
(5, 'ir', 'Iron', 3, '50.00', 0),
(6, 'std', 'Softener', 4, '50.00', 0),
(7, 'oth', 'Other', 5, '50.00', 0),
(8, 'w30', 'Wash 30 kg', 1, '2000.00', 1),
(9, 'w50', 'Wash 50 kg', 1, '2500.00', 1),
(10, 'w100', 'Wash 100 kg', 1, '5000.00', 1),
(11, 'd30', 'Dry 30 Kg', 2, '3000.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `total` int(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `paid` int(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `store_id` varchar(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `order_id`, `date`, `customer_id`, `customer_name`, `customer_phone`, `total`, `discount`, `grand_total`, `total_item`, `total_quantity`, `paid`, `created_by`, `status`, `store_id`, `note`, `balance`) VALUES
(1, 20, '2020-09-04 15:35:15', 3, 'khin nyein chan', 0, 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', '', 0),
(2, 21, '2020-09-04 15:55:40', 3, 'khin nyein chan', 0, 3000, 0, 3000, 1, 3, 5000, '1', 'paid', '1', '', 0),
(3, 22, '2020-09-04 16:11:40', 2, 'nnvn', 0, 5000, 0, 5000, 2, 4, 10000, '1', 'paid', '1', '', 0),
(4, 23, '2020-09-04 16:14:32', 3, 'khin nyein chan', 0, 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', '', 0),
(5, 24, '2020-09-04 16:15:43', 3, 'khin nyein chan', 0, 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', '', 0),
(6, 25, '2020-09-04 16:16:47', 3, 'khin nyein chan', 0, 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', '', 0),
(7, 26, '2020-09-04 16:17:28', 3, 'khin nyein chan', 0, 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', '', 0),
(8, 27, '2020-09-04 16:20:16', 3, 'khin nyein chan', 0, 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', '', 0),
(9, 28, '2020-09-04 16:21:45', 3, 'khin nyein chan', 0, 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', '', 0),
(10, 29, '2020-09-06 11:20:15', 8, 'ggg', 0, 3500, 0, 3500, 2, 2, 1000, '1', 'partial', '1', '', 0),
(11, 30, '2020-09-08 22:58:23', 3, 'khin nyein chan', 0, 2500, 0, 2500, 2, 2, 3000, '1', 'paid', '1', '', 0),
(12, 31, '2020-09-08 23:03:11', 5, 'xfv', 0, 2550, 0, 2550, 3, 3, 5000, '1', 'paid', '1', '', 0),
(13, 32, '2020-09-08 23:06:33', 2, 'nnvn', 0, 4000, 0, 4000, 1, 2, 5000, '1', 'paid', '1', '', 0),
(14, 33, '2020-09-09 21:41:31', 6, 'sadf', 0, 2150, 0, 2150, 4, 5, 5000, '1', 'paid', '1', '', 0),
(15, 34, '2020-09-09 21:44:32', 6, 'sadf', 0, 2500, 0, 2500, 1, 1, 1000, '1', 'partial', '1', '', 0),
(16, 35, '2020-09-09 21:49:20', 6, 'sadf', 0, 2500, 0, 2500, 2, 2, 2000, '1', 'partial', '1', '', 0),
(17, 36, '2020-09-09 21:57:39', 6, 'sadf', 0, 2500, 0, 2500, 2, 2, 3000, '1', 'paid', '1', '', 0),
(18, 37, '2020-09-10 22:55:53', 8, 'ggg', 0, 2050, 0, 2050, 3, 3, 2050, '1', 'paid', '1', '', 0),
(19, 38, '2020-09-10 22:57:09', 5, 'xfv', 0, 3000, 0, 3000, 1, 2, 5000, '1', 'paid', '1', '', 0),
(20, 39, '2020-09-10 23:08:03', 8, 'ggg', 0, 4500, 0, 4500, 3, 3, 5000, '1', 'paid', '1', '', 0),
(21, 40, '2020-09-10 23:09:15', 1, 'zzz', 0, 1000, 0, 1000, 1, 1, 1000, '1', 'paid', '1', '', 0),
(22, 41, '2020-09-10 23:15:08', 1, 'zzz', 0, 2500, 0, 2500, 2, 2, 3000, '1', 'paid', '1', '', 0),
(23, 42, '2020-09-10 23:18:57', 8, 'ggg', 0, 3500, 0, 3500, 2, 2, 5000, '1', 'paid', '1', '', 0),
(24, 45, '2020-09-10 23:43:34', 6, 'sadf', 0, 2000, 0, 2000, 1, 2, 2000, '1', 'paid', '1', '', 0),
(25, 46, '2020-09-10 23:48:57', 6, 'sadf', 0, 8000, 0, 8000, 2, 4, 10000, '1', 'paid', '1', '', 0),
(26, 47, '2020-09-11 10:51:40', 2, 'nnvn', 0, 6000, 0, 6000, 2, 2, 6000, '1', 'paid', '1', '', 0),
(27, 48, '2020-09-11 11:08:06', 5, 'xfv', 0, 1000, 0, 1000, 1, 1, 1000, '1', 'paid', '1', '', 0),
(28, 49, '2020-09-11 11:11:06', 2, 'nnvn', 0, 1000, 0, 1000, 1, 1, 1000, '1', 'paid', '1', '', 0),
(29, 50, '2020-09-11 22:11:13', 2, 'nnvn', 0, 2500, 0, 2500, 2, 2, 7000, '1', 'paid', '1', '', 0),
(30, 51, '2020-09-11 22:18:57', 2, 'nnvn', 0, 3000, 0, 3000, 2, 2, 5000, '1', 'paid', '1', '', 0),
(31, 52, '2020-09-11 22:53:29', 1, 'zzz', 0, 1000, 0, 1000, 1, 1, 1000, '1', 'paid', '1', '', 0),
(32, 53, '2020-09-11 22:54:25', 2, 'nnvn', 0, 2500, 0, 2500, 2, 2, 2500, '1', 'paid', '1', '', 0),
(33, 54, '2020-09-11 22:57:02', 1, 'zzz', 0, 100, 0, 100, 2, 2, 100, '1', 'paid', '1', '', 0),
(34, 55, '2020-09-11 23:03:26', 3, 'khin nyein chan', 0, 2500, 0, 2500, 2, 2, 5000, '1', 'paid', '1', '', 0),
(35, 56, '2020-09-11 23:04:25', 5, 'xfv', 0, 5500, 0, 5500, 2, 4, 5500, '1', 'paid', '1', '', 0),
(36, 57, '2020-09-11 23:06:04', 6, 'sadf', 0, 5500, 0, 5500, 2, 4, 5500, '1', 'paid', '1', '', 0),
(37, 58, '2020-09-11 23:07:16', 7, 'knc', 0, 1050, 0, 1050, 2, 2, 1050, '1', 'paid', '1', '', 0),
(38, 59, '2020-09-11 23:08:19', 8, 'ggg', 0, 3500, 0, 3500, 2, 2, 5000, '1', 'paid', '1', '', 0),
(39, 60, '2020-09-11 23:18:17', 2, 'nnvn', 0, 2500, 0, 2500, 2, 2, 5000, '1', 'paid', '1', '', 0),
(40, 61, '2020-09-11 23:22:18', 8, 'ggg', 0, 3550, 0, 3550, 3, 3, 5000, '1', 'paid', '1', '', 0),
(41, 62, '2020-09-11 23:26:45', 3, 'khin nyein chan', 0, 2500, 0, 2500, 2, 2, 2500, '1', 'paid', '1', '', 0),
(42, 63, '2020-09-12 23:52:46', 2, 'nnvn', 0, 1000, 0, 1000, 1, 1, 1000, '1', 'paid', '1', '', 0),
(43, 64, '2020-09-13 23:36:12', 3, 'khin nyein chan', 0, 5000, 0, 5000, 4, 4, 5000, '1', 'paid', '1', '', 0),
(44, 65, '2020-09-13 23:38:35', 2, 'nnvn', 0, 2500, 0, 2500, 2, 2, 1000, '1', 'partial', '1', '', 0),
(45, 66, '2020-09-13 23:40:38', 7, 'knc', 0, 5000, 0, 5000, 2, 3, 2000, '1', 'partial', '1', '', 0),
(46, 67, '2020-09-13 23:43:54', 5, 'xfv', 0, 1000, 0, 1000, 1, 1, 1000, '1', 'paid', '1', '', 0),
(47, 68, '2020-09-13 23:46:04', 5, 'xfv', 0, 1000, 0, 1000, 1, 1, 1000, '1', 'paid', '1', '', 0),
(48, 69, '2020-09-13 23:49:36', 8, 'ggg', 0, 2000, 0, 2000, 1, 1, 2000, '1', 'paid', '1', '', 0),
(49, 70, '2020-09-13 23:53:40', 6, 'sadf', 0, 3500, 0, 3500, 2, 2, 3500, '1', 'paid', '1', '', 0),
(50, 71, '2020-09-13 23:56:49', 1, 'zzz', 0, 2500, 0, 2500, 1, 1, 1000, '1', 'partial', '1', '', 0),
(51, 72, '2020-09-14 21:01:21', 1, 'zzz', 0, 3000, 0, 3000, 2, 2, 1000, '1', 'partial', '1', '', 0),
(52, 73, '2020-09-14 21:33:18', 1, 'zzz', 0, 7500, 0, 7500, 2, 2, 7500, '1', 'paid', '1', '', 0),
(53, 74, '2020-09-14 21:38:44', 3, 'khin nyein chan', 0, 4500, 0, 4500, 2, 2, 5000, '1', 'paid', '1', '', 0),
(54, 75, '2020-09-14 21:40:59', 8, 'ggg', 0, 5000, 0, 5000, 1, 1, 5000, '1', 'paid', '1', '', 0),
(55, 76, '2020-09-14 21:41:54', 9, 'Ay Sea', 0, 5000, 0, 5000, 1, 1, 2000, '1', 'partial', '1', '', 0),
(56, 77, '2020-09-14 21:49:01', 9, 'Ay Sea', 0, 1500, 0, 1500, 1, 1, 1000, '1', 'partial', '1', '', 0),
(57, 78, '2020-09-14 22:06:45', 2, 'nnvn', 0, 2000, 0, 2000, 1, 1, 2000, '1', 'paid', '1', '', 0),
(58, 79, '2020-09-14 22:09:18', 5, 'xfv', 0, 5000, 0, 5000, 1, 1, 5000, '1', 'paid', '1', '', 0),
(59, 80, '2020-09-14 22:12:37', 1, 'zzz', 0, 3000, 0, 3000, 1, 1, 3000, '1', 'paid', '1', '', 0),
(60, 81, '2020-09-14 22:17:56', 8, 'ggg', 0, 1500, 0, 1500, 1, 1, 1500, '1', 'paid', '1', '', 0),
(61, 82, '2020-09-14 22:41:10', 7, 'knc', 0, 150, 0, 150, 1, 3, 150, '1', 'paid', '1', '', 0),
(62, 83, '2020-09-14 22:46:51', 1, 'zzz', 0, 7500, 0, 7500, 2, 2, 7500, '1', 'paid', '1', '', 0),
(63, 84, '2020-09-14 22:47:37', 8, 'ggg', 0, 7500, 0, 7500, 2, 2, 7500, '1', 'paid', '1', '', 0),
(64, 85, '2020-09-14 22:56:23', 6, 'sadf', 0, 250, 0, 250, 1, 5, 250, '1', 'paid', '1', '', 0),
(65, 86, '2020-09-14 22:58:13', 3, 'khin nyein chan', 0, 3000, 0, 3000, 1, 3, 3000, '1', 'paid', '1', '', 0),
(66, 87, '2020-09-14 23:04:36', 5, 'xfv', 0, 2500, 0, 2500, 2, 2, 2500, '1', 'paid', '1', '', 0),
(67, 88, '2020-09-14 23:10:28', 9, 'Ay Sea', 0, 2500, 0, 2500, 2, 2, 2500, '1', 'paid', '1', '', 0),
(68, 89, '2020-09-14 23:31:41', 5, 'xfv', 0, 2500, 0, 2500, 2, 2, 2500, '1', 'paid', '1', '', 0),
(69, 90, '2020-09-14 23:47:11', 1, 'zzz', 0, 7500, 0, 7500, 1, 3, 7500, '1', 'paid', '1', '', 0),
(70, 91, '2020-09-15 11:12:55', 2, 'nnvn', 986564646, 3500, 0, 3500, 2, 2, 3500, '1', 'paid', '1', '', 0),
(71, 92, '2020-09-15 21:06:51', 9, 'Ay Sea', 2147483647, 3000, 0, 3000, 2, 2, 3000, 'Super', 'paid', '1', '', 0),
(72, 93, '2020-09-16 18:48:01', 9, 'Ay Sea', 2147483647, 5000, 0, 5000, 4, 4, 10000, 'Super', 'paid', '1', '', 0),
(73, 94, '2020-09-16 20:28:18', 5, 'xfv', 0, 2350, 0, 2350, 4, 9, 5000, 'Super', 'paid', '1', '', 0),
(74, 95, '2020-09-16 20:40:35', 9, 'Ay Sea', 2147483647, 5250, 500, 4750, 3, 7, 5000, 'Super', 'paid', '1', '', 0),
(75, 96, '2020-09-16 22:45:21', 8, 'ggg', 2147483647, 3500, 0, 3500, 2, 2, 3500, 'Super', 'paid', '1', '', 0),
(76, 97, '2020-09-16 22:46:18', 2, 'nnvn', 986564646, 7500, 0, 7500, 2, 2, 7500, 'Super', 'paid', '1', '', 0),
(77, 98, '2020-09-16 22:47:44', 3, 'khin nyein chan', 2147483647, 150, 0, 150, 1, 3, 150, 'Super', 'paid', '1', '', 0),
(78, 99, '2020-09-16 22:56:45', 9, 'Ay Sea', 2147483647, 5450, 0, 5450, 6, 13, 5500, 'Super', 'paid', '1', '', 0),
(79, 100, '2020-09-18 11:06:37', 5, 'xfv', 0, 5600, 5, 5320, 4, 14, 5500, 'Super', 'paid', '1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `logo` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `postal_code` varchar(8) DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `currency_code` varchar(3) NOT NULL,
  `receipt_header` text,
  `receipt_footer` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `code`, `logo`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `postal_code`, `country`, `currency_code`, `receipt_header`, `receipt_footer`) VALUES
(1, 'MANNA', 'MN', 'logo1.png', 'store@abc.com', '09765000454 [Facebook :Manna Food Castle]', 'အမွတ္(၁၀၁)၊ ရန္ကုန္ အင္းစိန္လမ္းမ', 'ခ၀ဲျခံမွတ္တိုင္၊', 'မရမ္းကုန္း', 'Yangon', '46000', 'Myanmar', 'MYR', '', 'ေက်းဇူးတင္ပါသည္။');

-- --------------------------------------------------------

--
-- Table structure for table `store_product_items`
--

CREATE TABLE `store_product_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `category_id` varchar(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_product_items`
--

INSERT INTO `store_product_items` (`id`, `order_id`, `item_id`, `code`, `name`, `category_id`, `price`, `quantity`, `total`) VALUES
(3, 1, 2, 'w15', 'Wash 15 kg', '1', '1500.00', 2, 3000),
(4, 1, 1, 'w8', 'Wash 8 kg', '1', '1000.00', 3, 3000),
(5, 1, 9, 'w50', 'Wash 50 kg', '1', '2500.00', 2, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `country`, `created_at`, `status`, `role`) VALUES
(1, 'Super', 'admin@admin.com', '0100 500 600', '21232f297a57a5a743894a0e4a801fc3', 14, '2018-03-02 14:51:38', 1, 'admin'),
(11, 'John ', 'user@mail.com', '', 'ee11cbb19052e40b07aac0ca060c23ee', 44, '2018-03-04 23:31:53', 0, 'user'),
(12, 'Aye Aye', 'aye123@gmail.com', '09770379120', '2412bed1612e569b73c77a62ce5cbf5b', 0, '2020-08-17 12:54:41', 0, 'user'),
(13, 'John Smith', 'Smith@gmail.com', '09763961061', 'e95f770ac4fb91ac2e4873e4b2dfc0e6', 0, '2020-09-11 08:38:15', 0, 'user'),
(14, 'Khin Nyein Chan', 'poe2161999@gmail.com', '09775912431', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2020-09-11 08:40:38', 0, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_power`
--

CREATE TABLE `user_power` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `power_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_power`
--

INSERT INTO `user_power` (`id`, `name`, `power_id`) VALUES
(1, 'add', 1),
(2, 'edit', 2),
(3, 'delete', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `action`) VALUES
(1, 11, 1),
(2, 11, 3),
(3, 0, 1),
(4, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_product_items`
--
ALTER TABLE `store_product_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_power`
--
ALTER TABLE `user_power`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `store_product_items`
--
ALTER TABLE `store_product_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_power`
--
ALTER TABLE `user_power`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
