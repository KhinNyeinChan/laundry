-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 03:59 PM
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
(1, 2);

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
  `discount` int(11) DEFAULT NULL,
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
(104, 9, '2020-09-18 21:42:20', '2020-09-22 09:00:00', 15, 4, 'paid', 'Super', 'Ay Sea', 'received', '', NULL, 2650, 0, 2650),
(105, 3, '2020-09-18 22:12:52', '2020-09-19 22:12:00', 3, 3, 'paid', 'Super', 'khin nyein chan', 'received', '', NULL, 9500, 1000, 8500),
(106, 1, '2020-09-30 17:12:43', '2020-10-01 17:11:00', 5, 5, 'paid', 'Super', 'zzz', 'received', '', NULL, 8500, 500, 8000),
(107, 7, '2020-09-30 17:22:08', '2020-10-02 17:21:00', 4, 3, 'paid', 'Super', 'knc', 'received', '', NULL, 3600, 0, 3600),
(108, 1, '2020-09-30 17:25:48', '2020-10-03 17:25:00', 3, 3, 'paid', 'Super', 'zzz', 'received', '', NULL, 8500, 0, 8500),
(109, 8, '2020-09-30 17:29:03', '2020-10-04 17:28:00', 2, 2, 'paid', 'Super', 'ggg', 'received', '', NULL, 2500, 0, 2500),
(110, 9, '2020-09-30 20:41:17', '2020-10-01 20:41:00', 4, 4, 'paid', 'Super', 'Ay Sea', 'received', '', NULL, 11000, 0, 11000),
(111, 2, '2020-10-01 16:11:50', '2020-10-03 16:11:00', 2, 2, '0', 'Super', 'nnvn', 'received', '', NULL, 3500, 0, 3500),
(112, 7, '2020-10-01 18:25:38', '2020-10-03 18:25:00', 7, 3, 'paid', 'Super', 'knc', 'received', '', NULL, 3750, 1000, 2750),
(113, 8, '2020-10-01 18:40:37', '2020-10-04 18:40:00', 5, 1, 'paid', 'Super', 'ggg', 'received', '', NULL, 5000, 2, 4900),
(114, 7, '2020-10-01 19:43:27', '2020-10-09 19:43:00', 5, 5, 'paid', 'Super', 'knc', 'received', '', NULL, 10500, 0, 10500),
(115, 3, '2020-10-01 19:52:23', '2020-10-05 19:52:00', 9, 4, 'paid', 'Super', 'khin nyein chan', 'received', '', NULL, 3350, 0, 3350),
(116, 3, '2020-10-01 19:54:11', '2020-10-06 19:54:00', 3, 1, 'paid', 'Super', 'khin nyein chan', 'received', '', NULL, 150, 0, 150),
(117, 3, '2020-10-01 22:33:22', '0000-00-00 00:00:00', 1, 1, 'paid', 'Super', 'khin nyein chan', 'received', '', NULL, 5000, 0, 5000),
(118, 8, '2020-10-01 22:38:34', '2020-10-03 22:38:00', 1, 1, 'paid', 'Super', 'ggg', 'received', '', NULL, 1500, 0, 1500),
(119, 7, '2020-10-01 22:38:59', '2020-10-05 22:38:00', 10, 1, 'paid', 'Super', 'knc', 'received', '', NULL, 500, 0, 500),
(120, 1, '2020-10-01 22:43:52', '2020-10-02 22:43:00', 1, 1, 'paid', 'Super', 'zzz', 'received', '', NULL, 3000, 0, 3000),
(121, 3, '2020-10-01 22:44:11', '2020-10-08 22:44:00', 2, 2, 'paid', 'Super', 'khin nyein chan', 'received', '', NULL, 6500, 0, 6500),
(122, 5, '2020-10-01 22:44:45', '2020-10-03 22:44:00', 2, 1, 'paid', 'Super', 'xfv', 'received', '', NULL, 4000, 0, 4000),
(123, 1, '2020-10-02 10:26:36', '2020-10-03 10:26:00', 2, 2, 'paid', 'Super', 'zzz', 'received', '', NULL, 3050, 0, 3050),
(124, 8, '2020-10-02 10:27:05', '2020-10-04 10:27:00', 5, 3, 'paid', 'Super', 'ggg', 'received', '', NULL, 7650, 0, 7650),
(125, 2, '2020-10-02 10:27:22', '2020-10-06 10:27:00', 1, 1, 'paid', 'Super', 'nnvn', 'received', '', NULL, 1000, 0, 1000),
(126, 9, '2020-10-02 17:06:58', '2020-10-03 17:06:00', 11, 1, 'paid', 'Super', 'Ay Sea', 'received', '', NULL, 550, 0, 550),
(127, 2, '2020-10-02 18:16:30', '2020-10-05 18:15:00', 2, 2, 'paid', 'Super', 'nnvn', 'received', '', NULL, 5000, 0, 5000),
(128, 3, '2020-10-02 18:41:45', '2020-10-07 18:41:00', 4, 3, 'paid', 'Super', 'khin nyein chan', 'received', '', NULL, 3600, 0, 3600),
(129, 1, '2020-10-02 18:51:54', '2020-10-03 18:51:00', 4, 3, 'paid', 'Super', 'zzz', 'received', '', NULL, 3600, 0, 3600),
(130, 2, '2020-10-02 18:52:28', '2020-10-03 18:52:00', 5, 2, 'paid', 'Super', 'nnvn', 'received', '', NULL, 3150, 0, 3150),
(131, 3, '2020-10-02 18:52:51', '2020-10-04 18:52:00', 2, 2, 'paid', 'Super', 'khin nyein chan', 'received', '', NULL, 4000, 0, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `subtotal` int(11) NOT NULL,
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

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `subtotal`, `product_code`, `product_name`, `product_price`, `status`, `modified_time`, `modified_by`, `assign_to`) VALUES
(3, 6, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'Hold', '2020-09-02 16:28:52', '', ''),
(4, 6, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'Hold', '2020-09-02 16:28:52', '', 'Daw mya'),
(5, 8, 10, 2, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-04 15:05:02', '', ''),
(6, 9, 7, 2, 0, 'oth', 'Other', 0, 'received', '2020-09-04 15:06:31', '', ''),
(7, 9, 6, 2, 0, 'std', 'Softener', 0, 'received', '2020-09-04 15:06:32', '', ''),
(8, 10, 10, 2, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-04 15:07:50', '', ''),
(9, 10, 8, 2, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-04 15:07:50', '', ''),
(10, 11, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:12:55', '', ''),
(11, 12, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-04 15:13:50', '', ''),
(12, 12, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-04 15:13:50', '', ''),
(13, 13, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:20:07', '', ''),
(14, 13, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:20:07', '', ''),
(15, 14, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:21:48', '', ''),
(16, 14, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:21:48', '', ''),
(17, 15, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:26:52', '', ''),
(18, 15, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:26:52', '', ''),
(19, 15, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-04 15:26:52', '', ''),
(20, 16, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:29:09', '', ''),
(21, 16, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:29:09', '', ''),
(22, 17, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:30:47', '', ''),
(23, 17, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:30:47', '', ''),
(24, 18, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:32:59', '', ''),
(25, 18, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:32:59', '', ''),
(26, 19, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:34:04', '', ''),
(27, 19, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:34:04', '', ''),
(28, 20, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:35:15', '', ''),
(29, 20, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 15:35:15', '', ''),
(30, 21, 1, 3, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 15:55:40', '', ''),
(31, 22, 4, 2, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-04 16:11:40', '', ''),
(32, 22, 3, 2, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-04 16:11:40', '', ''),
(33, 23, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:14:32', '', ''),
(34, 23, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:14:32', '', ''),
(35, 24, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:15:42', '', ''),
(36, 24, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:15:42', '', ''),
(37, 25, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:16:47', '', ''),
(38, 25, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:16:47', '', ''),
(39, 26, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:17:28', '', ''),
(40, 26, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:17:28', '', ''),
(41, 27, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:20:16', '', ''),
(42, 27, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:20:16', '', ''),
(43, 28, 1, 2, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-04 16:21:45', '', ''),
(44, 28, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-04 16:21:45', '', ''),
(45, 29, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-06 11:20:14', '', ''),
(46, 29, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-06 11:20:14', '', ''),
(47, 30, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-08 22:58:23', '', ''),
(48, 30, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-08 22:58:23', '', ''),
(49, 31, 6, 1, 0, 'std', 'Softener', 0, 'received', '2020-09-08 23:03:11', '', ''),
(50, 31, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-08 23:03:11', '', ''),
(51, 31, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-08 23:03:11', '', ''),
(52, 32, 8, 2, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-08 23:06:33', '', ''),
(53, 33, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-09 21:41:30', '', ''),
(54, 33, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-09 21:41:30', '', ''),
(55, 33, 5, 2, 0, 'ir', 'Iron', 0, 'received', '2020-09-09 21:41:31', '', ''),
(56, 33, 6, 1, 0, 'std', 'Softener', 0, 'received', '2020-09-09 21:41:31', '', ''),
(57, 34, 9, 1, 0, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-09 21:44:32', '', ''),
(58, 35, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-09 21:49:20', '', ''),
(59, 35, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-09 21:49:20', '', ''),
(60, 36, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-09 21:57:39', '', ''),
(61, 36, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-09 21:57:39', '', ''),
(62, 37, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 22:55:53', '', ''),
(63, 37, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-10 22:55:53', '', ''),
(64, 37, 6, 1, 0, 'std', 'Softener', 0, 'received', '2020-09-10 22:55:53', '', ''),
(65, 38, 2, 2, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-10 22:57:09', '', ''),
(66, 39, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 23:08:03', '', ''),
(67, 39, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-10 23:08:03', '', ''),
(68, 39, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-10 23:08:03', '', ''),
(69, 40, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 23:09:15', '', ''),
(70, 41, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-10 23:15:08', '', ''),
(71, 41, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-10 23:15:08', '', ''),
(72, 42, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-10 23:18:57', '', ''),
(73, 42, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-10 23:18:57', '', ''),
(74, 43, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 23:22:14', '', ''),
(75, 43, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-10 23:22:14', '', ''),
(76, 43, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-10 23:22:14', '', ''),
(77, 44, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 23:42:12', NULL, NULL),
(78, 44, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-10 23:42:13', NULL, NULL),
(79, 45, 3, 2, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-10 23:43:34', NULL, NULL),
(80, 46, 1, 3, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-10 23:48:57', NULL, NULL),
(81, 46, 10, 1, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-10 23:48:57', NULL, NULL),
(82, 47, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 10:51:40', NULL, NULL),
(83, 47, 10, 1, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-11 10:51:40', NULL, NULL),
(84, 48, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-11 11:08:06', NULL, NULL),
(85, 49, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 11:11:06', NULL, NULL),
(86, 50, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-11 22:11:13', NULL, NULL),
(87, 50, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-11 22:11:13', NULL, NULL),
(88, 51, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 22:18:57', NULL, NULL),
(89, 51, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-11 22:18:57', NULL, NULL),
(90, 52, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 22:53:29', NULL, NULL),
(91, 53, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 22:54:25', NULL, NULL),
(92, 53, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-11 22:54:25', NULL, NULL),
(93, 54, 5, 1, 0, 'ir', 'Iron', 0, 'received', '2020-09-11 22:57:02', NULL, NULL),
(94, 54, 6, 1, 0, 'std', 'Softener', 0, 'received', '2020-09-11 22:57:02', NULL, NULL),
(95, 55, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 23:03:26', NULL, NULL),
(96, 55, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-11 23:03:26', NULL, NULL),
(97, 56, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-11 23:04:25', NULL, NULL),
(98, 56, 4, 3, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-11 23:04:25', NULL, NULL),
(99, 57, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 23:06:03', NULL, NULL),
(100, 57, 2, 3, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-11 23:06:03', NULL, NULL),
(101, 58, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 23:07:16', NULL, NULL),
(102, 58, 6, 1, 0, 'std', 'Softener', 0, 'received', '2020-09-11 23:07:16', NULL, NULL),
(103, 59, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-11 23:08:19', NULL, NULL),
(104, 59, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-11 23:08:19', NULL, NULL),
(105, 60, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-11 23:18:17', NULL, NULL),
(106, 60, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-11 23:18:17', NULL, NULL),
(107, 61, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-11 23:22:17', NULL, NULL),
(108, 61, 9, 1, 0, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-11 23:22:18', NULL, NULL),
(109, 61, 6, 1, 0, 'std', 'Softener', 0, 'received', '2020-09-11 23:22:18', NULL, NULL),
(110, 62, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-11 23:26:45', NULL, NULL),
(111, 62, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-11 23:26:45', NULL, NULL),
(112, 63, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-12 23:52:45', NULL, NULL),
(113, 64, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-13 23:36:12', NULL, NULL),
(114, 64, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-13 23:36:12', NULL, NULL),
(115, 64, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-13 23:36:12', NULL, NULL),
(116, 64, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-13 23:36:12', NULL, NULL),
(117, 65, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-13 23:38:35', NULL, NULL),
(118, 65, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-13 23:38:35', NULL, NULL),
(119, 66, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-13 23:40:38', NULL, NULL),
(120, 66, 4, 2, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-13 23:40:38', NULL, NULL),
(121, 67, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-13 23:43:54', NULL, NULL),
(122, 68, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-13 23:46:04', NULL, NULL),
(123, 69, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-13 23:49:36', NULL, NULL),
(124, 70, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-13 23:53:39', NULL, NULL),
(125, 70, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-13 23:53:40', NULL, NULL),
(126, 71, 9, 1, 0, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-13 23:56:49', NULL, NULL),
(127, 72, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-14 21:01:21', NULL, NULL),
(128, 72, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-14 21:01:21', NULL, NULL),
(129, 73, 9, 1, 0, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-14 21:33:18', NULL, NULL),
(130, 73, 10, 1, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 21:33:18', NULL, NULL),
(131, 74, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-14 21:38:44', NULL, NULL),
(132, 74, 11, 1, 0, 'd30', 'Dry 30 Kg', 0, 'received', '2020-09-14 21:38:44', NULL, NULL),
(133, 75, 10, 1, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 21:40:59', NULL, NULL),
(134, 76, 10, 1, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 21:41:54', NULL, NULL),
(135, 77, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-14 21:49:01', NULL, NULL),
(136, 78, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-14 22:06:45', NULL, NULL),
(137, 79, 10, 1, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 22:09:18', NULL, NULL),
(138, 80, 11, 1, 0, 'd30', 'Dry 30 Kg', 0, 'received', '2020-09-14 22:12:37', NULL, NULL),
(139, 81, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-14 22:17:56', NULL, NULL),
(140, 82, 7, 3, 0, 'oth', 'Other', 0, 'received', '2020-09-14 22:41:10', NULL, NULL),
(141, 83, 10, 1, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 22:46:51', NULL, NULL),
(142, 83, 9, 1, 0, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-14 22:46:51', NULL, NULL),
(143, 84, 10, 1, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-14 22:47:37', NULL, NULL),
(144, 84, 9, 1, 0, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-14 22:47:37', NULL, NULL),
(145, 85, 5, 5, 0, 'ir', 'Iron', 0, 'received', '2020-09-14 22:56:23', NULL, NULL),
(146, 86, 1, 3, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-14 22:58:13', NULL, NULL),
(147, 87, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-14 23:04:36', NULL, NULL),
(148, 87, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-14 23:04:36', NULL, NULL),
(149, 88, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-14 23:10:28', NULL, NULL),
(150, 88, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-14 23:10:28', NULL, NULL),
(151, 89, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-14 23:31:41', NULL, NULL),
(152, 89, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-14 23:31:41', NULL, NULL),
(153, 90, 9, 3, 0, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-14 23:47:11', NULL, NULL),
(154, 91, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-15 11:12:55', NULL, NULL),
(155, 91, 9, 1, 0, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-15 11:12:55', NULL, NULL),
(156, 92, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-15 21:06:51', NULL, NULL),
(157, 92, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-15 21:06:51', NULL, NULL),
(158, 93, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-16 18:48:01', NULL, NULL),
(159, 93, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-16 18:48:01', NULL, NULL),
(160, 93, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-16 18:48:01', NULL, NULL),
(161, 93, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-16 18:48:01', NULL, NULL),
(162, 94, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-16 20:28:18', NULL, NULL),
(163, 94, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-16 20:28:18', NULL, NULL),
(164, 94, 5, 6, 0, 'ir', 'Iron', 0, 'received', '2020-09-16 20:28:18', NULL, NULL),
(165, 94, 6, 1, 0, 'std', 'Softener', 0, 'received', '2020-09-16 20:28:18', NULL, NULL),
(166, 95, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-16 20:40:34', NULL, NULL),
(167, 95, 11, 1, 0, 'd30', 'Dry 30 Kg', 0, 'received', '2020-09-16 20:40:35', NULL, NULL),
(168, 95, 5, 5, 0, 'ir', 'Iron', 0, 'received', '2020-09-16 20:40:35', NULL, NULL),
(169, 96, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-16 22:45:20', NULL, NULL),
(170, 96, 9, 1, 0, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-16 22:45:20', NULL, NULL),
(171, 97, 9, 1, 0, 'w50', 'Wash 50 kg', 0, 'received', '2020-09-16 22:46:18', NULL, NULL),
(172, 97, 10, 1, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-16 22:46:18', NULL, NULL),
(173, 98, 5, 3, 0, 'ir', 'Iron', 0, 'received', '2020-09-16 22:47:44', NULL, NULL),
(174, 99, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(175, 99, 2, 1, 0, 'w15', 'Wash 15 kg', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(176, 99, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(177, 99, 4, 1, 0, 'd15', 'Dry 15 kg', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(178, 99, 5, 7, 0, 'ir', 'Iron', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(179, 99, 6, 2, 0, 'std', 'Softener', 0, 'received', '2020-09-16 22:56:45', NULL, NULL),
(180, 100, 8, 1, 0, 'w30', 'Wash 30 kg', 0, 'received', '2020-09-18 11:06:37', NULL, NULL),
(181, 100, 11, 1, 0, 'd30', 'Dry 30 Kg', 0, 'received', '2020-09-18 11:06:37', NULL, NULL),
(182, 100, 5, 10, 0, 'ir', 'Iron', 0, 'received', '2020-09-18 11:06:37', NULL, NULL),
(183, 100, 6, 2, 0, 'std', 'Softener', 0, 'received', '2020-09-18 11:06:37', NULL, NULL),
(184, 101, 10, 1, 0, 'w100', 'Wash 100 kg', 0, 'received', '2020-09-18 11:40:06', NULL, NULL),
(185, 101, 11, 2, 0, 'd30', 'Dry 30 Kg', 0, 'received', '2020-09-18 11:40:06', NULL, NULL),
(186, 102, 1, 1, 0, 'w8', 'Wash 8 kg', 0, 'received', '2020-09-18 11:52:47', NULL, NULL),
(187, 102, 3, 1, 0, 'd8', 'Dry 8 kg', 0, 'received', '2020-09-18 11:52:48', NULL, NULL),
(188, 102, 5, 5, 0, 'ir', 'Iron', 0, 'received', '2020-09-18 11:52:48', NULL, NULL),
(189, 102, 6, 1, 0, 'std', 'Softener', 0, 'received', '2020-09-18 11:52:48', NULL, NULL),
(190, 103, 2, 2, 0, 'w15', 'Wash 15 kg', 1500, 'received', '2020-09-18 21:40:55', NULL, NULL),
(191, 104, 1, 1, 0, 'w8', 'Wash 8 kg', 1000, 'received', '2020-09-18 21:42:20', NULL, NULL),
(192, 104, 3, 1, 0, 'd8', 'Dry 8 kg', 1000, 'received', '2020-09-18 21:42:20', NULL, NULL),
(193, 104, 5, 12, 0, 'ir', 'Iron', 50, 'received', '2020-09-18 21:42:20', NULL, NULL),
(194, 104, 6, 1, 0, 'std', 'Softener', 50, 'received', '2020-09-18 21:42:20', NULL, NULL),
(195, 105, 9, 1, 0, 'w50', 'Wash 50 kg', 2500, 'received', '2020-09-18 22:12:52', NULL, NULL),
(196, 105, 10, 1, 0, 'w100', 'Wash 100 kg', 5000, 'received', '2020-09-18 22:12:52', NULL, NULL),
(197, 105, 8, 1, 0, 'w30', 'Wash 30 kg', 2000, 'received', '2020-09-18 22:12:52', NULL, NULL),
(198, 106, 2, 1, 0, 'w15', 'Wash 15 kg', 1500, 'received', '2020-09-30 17:12:43', NULL, NULL),
(199, 106, 8, 1, 0, 'w30', 'Wash 30 kg', 2000, 'received', '2020-09-30 17:12:43', NULL, NULL),
(200, 106, 9, 1, 0, 'w50', 'Wash 50 kg', 2500, 'received', '2020-09-30 17:12:43', NULL, NULL),
(201, 106, 3, 1, 0, 'd8', 'Dry 8 kg', 1000, 'received', '2020-09-30 17:12:43', NULL, NULL),
(202, 106, 4, 1, 0, 'd15', 'Dry 15 kg', 1500, 'received', '2020-09-30 17:12:43', NULL, NULL),
(203, 107, 8, 1, 0, 'w30', 'Wash 30 kg', 2000, 'received', '2020-09-30 17:22:08', NULL, NULL),
(204, 107, 2, 1, 0, 'w15', 'Wash 15 kg', 1500, 'received', '2020-09-30 17:22:08', NULL, NULL),
(205, 107, 5, 2, 0, 'ir', 'Iron', 50, 'received', '2020-09-30 17:22:08', NULL, NULL),
(206, 108, 2, 1, 0, 'w15', 'Wash 15 kg', 1500, 'received', '2020-09-30 17:25:48', NULL, NULL),
(207, 108, 8, 1, 0, 'w30', 'Wash 30 kg', 2000, 'received', '2020-09-30 17:25:48', NULL, NULL),
(208, 108, 10, 1, 0, 'w100', 'Wash 100 kg', 5000, 'received', '2020-09-30 17:25:48', NULL, NULL),
(209, 109, 3, 1, 0, 'd8', 'Dry 8 kg', 1000, 'received', '2020-09-30 17:29:03', NULL, NULL),
(210, 109, 4, 1, 0, 'd15', 'Dry 15 kg', 1500, 'received', '2020-09-30 17:29:03', NULL, NULL),
(211, 110, 2, 1, 0, 'w15', 'Wash 15 kg', 1500, 'received', '2020-09-30 20:41:17', NULL, NULL),
(212, 110, 8, 1, 0, 'w30', 'Wash 30 kg', 2000, 'received', '2020-09-30 20:41:18', NULL, NULL),
(213, 110, 9, 1, 0, 'w50', 'Wash 50 kg', 2500, 'received', '2020-09-30 20:41:18', NULL, NULL),
(214, 110, 10, 1, 0, 'w100', 'Wash 100 kg', 5000, 'received', '2020-09-30 20:41:18', NULL, NULL),
(215, 111, 2, 1, 1500, 'w15', 'Wash 15 kg', 1500, 'received', '2020-10-01 16:11:50', NULL, NULL),
(216, 111, 8, 1, 2000, 'w30', 'Wash 30 kg', 2000, 'received', '2020-10-01 16:11:50', NULL, NULL),
(217, 112, 2, 1, 1500, 'w15', 'Wash 15 kg', 1500, 'received', '2020-10-01 18:25:38', NULL, NULL),
(218, 112, 8, 1, 2000, 'w30', 'Wash 30 kg', 2000, 'received', '2020-10-01 18:25:38', NULL, NULL),
(219, 112, 5, 5, 250, 'ir', 'Iron', 50, 'received', '2020-10-01 18:25:38', NULL, NULL),
(220, 113, 3, 5, 5000, 'd8', 'Dry 8 kg', 1000, 'received', '2020-10-01 18:40:37', NULL, NULL),
(221, 114, 2, 1, 1500, 'w15', 'Wash 15 kg', 1500, 'received', '2020-10-01 19:43:27', NULL, NULL),
(222, 114, 8, 1, 2000, 'w30', 'Wash 30 kg', 2000, 'received', '2020-10-01 19:43:27', NULL, NULL),
(223, 114, 9, 1, 2500, 'w50', 'Wash 50 kg', 2500, 'received', '2020-10-01 19:43:27', NULL, NULL),
(224, 114, 11, 1, 3000, 'd30', 'Dry 30 Kg', 3000, 'received', '2020-10-01 19:43:27', NULL, NULL),
(225, 114, 4, 1, 1500, 'd15', 'Dry 15 kg', 1500, 'received', '2020-10-01 19:43:27', NULL, NULL),
(226, 115, 2, 1, 1500, 'w15', 'Wash 15 kg', 1500, 'received', '2020-10-01 19:52:23', NULL, NULL),
(227, 115, 4, 1, 1500, 'd15', 'Dry 15 kg', 1500, 'received', '2020-10-01 19:52:23', NULL, NULL),
(228, 115, 5, 4, 200, 'ir', 'Iron', 50, 'received', '2020-10-01 19:52:23', NULL, NULL),
(229, 115, 6, 3, 150, 'std', 'Softener', 50, 'received', '2020-10-01 19:52:23', NULL, NULL),
(230, 116, 5, 3, 150, 'ir', 'Iron', 50, 'received', '2020-10-01 19:54:11', NULL, NULL),
(231, 117, 10, 1, 5000, 'w100', 'Wash 100 kg', 5000, 'received', '2020-10-01 22:33:22', NULL, NULL),
(232, 118, 4, 1, 1500, 'd15', 'Dry 15 kg', 1500, 'received', '2020-10-01 22:38:34', NULL, NULL),
(233, 119, 5, 10, 500, 'ir', 'Iron', 50, 'received', '2020-10-01 22:38:59', NULL, NULL),
(234, 120, 11, 1, 3000, 'd30', 'Dry 30 Kg', 3000, 'received', '2020-10-01 22:43:52', NULL, NULL),
(235, 121, 10, 1, 5000, 'w100', 'Wash 100 kg', 5000, 'received', '2020-10-01 22:44:11', NULL, NULL),
(236, 121, 2, 1, 1500, 'w15', 'Wash 15 kg', 1500, 'received', '2020-10-01 22:44:11', NULL, NULL),
(237, 122, 8, 2, 4000, 'w30', 'Wash 30 kg', 2000, 'received', '2020-10-01 22:44:45', NULL, NULL),
(238, 123, 11, 1, 3000, 'd30', 'Dry 30 Kg', 3000, 'received', '2020-10-02 10:26:37', NULL, NULL),
(239, 123, 6, 1, 50, 'std', 'Softener', 50, 'received', '2020-10-02 10:26:37', NULL, NULL),
(240, 124, 10, 1, 5000, 'w100', 'Wash 100 kg', 5000, 'received', '2020-10-02 10:27:05', NULL, NULL),
(241, 124, 9, 1, 2500, 'w50', 'Wash 50 kg', 2500, 'received', '2020-10-02 10:27:05', NULL, NULL),
(242, 124, 5, 3, 150, 'ir', 'Iron', 50, 'received', '2020-10-02 10:27:05', NULL, NULL),
(243, 125, 3, 1, 1000, 'd8', 'Dry 8 kg', 1000, 'received', '2020-10-02 10:27:22', NULL, NULL),
(244, 126, 5, 11, 550, 'ir', 'Iron', 50, 'received', '2020-10-02 17:06:58', NULL, NULL),
(245, 127, 8, 1, 2000, 'w30', 'Wash 30 kg', 2000, 'received', '2020-10-02 18:16:30', NULL, NULL),
(246, 127, 11, 1, 3000, 'd30', 'Dry 30 Kg', 3000, 'received', '2020-10-02 18:16:30', NULL, NULL),
(247, 128, 2, 1, 1500, 'w15', 'Wash 15 kg', 1500, 'received', '2020-10-02 18:41:45', NULL, NULL),
(248, 128, 8, 1, 2000, 'w30', 'Wash 30 kg', 2000, 'received', '2020-10-02 18:41:45', NULL, NULL),
(249, 128, 5, 2, 100, 'ir', 'Iron', 50, 'received', '2020-10-02 18:41:45', NULL, NULL),
(250, 129, 2, 1, 1500, 'w15', 'Wash 15 kg', 1500, 'received', '2020-10-02 18:51:54', NULL, NULL),
(251, 129, 8, 1, 2000, 'w30', 'Wash 30 kg', 2000, 'received', '2020-10-02 18:51:54', NULL, NULL),
(252, 129, 6, 2, 100, 'std', 'Softener', 50, 'received', '2020-10-02 18:51:54', NULL, NULL),
(253, 130, 5, 3, 150, 'ir', 'Iron', 50, 'received', '2020-10-02 18:52:28', NULL, NULL),
(254, 130, 4, 2, 3000, 'd15', 'Dry 15 kg', 1500, 'received', '2020-10-02 18:52:28', NULL, NULL),
(255, 131, 3, 1, 1000, 'd8', 'Dry 8 kg', 1000, 'received', '2020-10-02 18:52:51', NULL, NULL),
(256, 131, 11, 1, 3000, 'd30', 'Dry 30 Kg', 3000, 'received', '2020-10-02 18:52:51', NULL, NULL);

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
(71, 5, 5320, 'paid', 'Super', '', 'Cash', '2020-09-18 11:06:37', '79', 5500, 180, 1),
(72, 1, 8000, 'partial', 'Super', 'partial', 'Cash', '2020-09-30 17:12:43', '80', 5000, -3000, 1),
(73, 7, 3600, 'partial', 'Super', 'payment note', 'Cash', '2020-09-30 17:22:08', '81', 1600, -2000, 1),
(74, 1, 8500, 'partial', 'Super', 'pay note', 'Cash', '2020-09-30 17:25:48', '82', 6000, -2500, 1),
(75, 8, 2500, 'partial', 'Super', 'paynote', 'Cash', '2020-09-30 17:29:03', '83', 1000, -1500, 1),
(76, 2, 3500, 'paid', 'Super', 'payment note', 'KBZ pay', '2020-10-01 17:59:21', '84', 3500, 0, 1),
(77, 2, 3500, 'paid', 'Super', 'payment note', 'Cash', '2020-10-01 18:01:19', '85', 3500, 0, 1),
(78, 2, 3500, 'paid', 'Super', '', 'Cash', '2020-10-01 18:06:55', '89', 3500, 0, 1),
(79, 2, 3500, 'paid', 'Super', '', 'Cash', '2020-10-01 18:08:14', '90', 3500, 0, 1),
(80, 9, 11000, 'paid', 'Super', 'payment note', 'Cash', '2020-10-01 18:10:39', '91', 11000, 0, 1),
(81, 9, 11000, 'paid', 'Super', 'ppp', 'Cash', '2020-10-01 18:16:34', '92', 15000, 4000, 1),
(82, 7, 2750, 'paid', 'Super', 'yesss', 'Cash', '2020-10-01 18:33:21', '93', 5000, 2250, 1),
(83, 8, 4900, 'paid', 'Super', '', 'Cash', '2020-10-01 18:41:31', '94', 5000, 100, 1),
(84, 7, 10500, 'paid', 'Super', '', 'Cash', '2020-10-01 19:47:05', '105', 10500, 0, 1),
(85, 3, 3350, 'paid', 'Super', '', 'Cash', '2020-10-01 19:53:00', '106', 5000, 1650, 1),
(86, 3, 150, 'paid', 'Super', '', 'Cash', '2020-10-01 19:54:45', '107', 150, 0, 1),
(87, 3, 5000, 'paid', 'Super', '', 'Cash', '2020-10-01 22:34:22', '108', 5000, 0, 1),
(88, 7, 500, 'paid', 'Super', '', 'Cash', '2020-10-01 22:39:30', '109', 1500, 0, 1),
(89, 8, 1500, 'paid', 'Super', '', 'Cash', '2020-10-01 22:41:40', '110', 1500, 0, 1),
(90, 5, 4000, 'paid', 'Super', '', 'Cash', '2020-10-01 22:45:45', '111', 5000, 1000, 1),
(91, 3, 6500, 'paid', 'Super', '', 'Cash', '2020-10-01 22:50:38', '112', 10000, 3500, 1),
(92, 1, 3000, 'paid', 'Super', '', 'Cash', '2020-10-01 23:28:32', '113', 3000, 0, 1),
(93, 2, 1000, 'paid', 'Super', '', 'Cash', '2020-10-02 10:31:22', '116', 1000, 0, 1),
(94, 2, 1000, 'paid', 'Super', '', 'Cash', '2020-10-02 10:32:02', '117', 1000, 0, 1),
(95, 8, 7650, 'paid', 'Super', '', 'Cash', '2020-10-02 10:36:25', '118', 10000, 2350, 1),
(96, 1, 3050, 'paid', 'Super', 'payment ok', 'Cash', '2020-10-02 10:37:34', '119', 3100, 50, 1),
(97, 9, 550, 'paid', 'Super', 'paynote', 'Cash', '2020-10-02 17:34:48', '120', 2500, 0, 1),
(98, 2, 5000, 'partial', 'Super', 'par', 'Cash', '2020-10-02 18:16:31', '121', 3000, -2000, 1),
(99, 3, 3600, 'partial', 'Super', 'par', 'Cash', '2020-10-02 18:41:45', '122', 2000, -1600, 1),
(100, 3, 8500, 'paid', 'Super', '', 'Cash', '2020-10-02 18:51:00', '123', 7000, 2000, 1),
(101, 1, 3600, 'paid', 'Super', '', 'Cash', '2020-10-02 18:51:54', '124', 4000, 400, 1),
(102, 2, 3150, 'paid', 'Super', '', 'Cash', '2020-10-02 18:52:28', '125', 6000, 2850, 1),
(103, 3, 4000, 'partial', 'Super', '', 'Cash', '2020-10-02 18:52:52', '126', 1000, -3000, 1),
(104, 9, 2650, 'paid', 'Super', '', 'Cash', '2020-10-03 14:01:37', '127', 5000, 2350, 1);

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
  `note` varchar(255) DEFAULT NULL,
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
(79, 100, '2020-09-18 11:06:37', 5, 'xfv', 0, 5600, 5, 5320, 4, 14, 5500, 'Super', 'paid', '1', '', 0),
(80, 106, '2020-09-30 17:12:43', 1, 'zzz', 2147483647, 8500, 500, 8000, 5, 5, 8000, 'Super', 'paid', '1', '', 0),
(81, 107, '2020-09-30 17:22:08', 7, 'knc', 2147483647, 3600, 0, 3600, 3, 4, 3600, 'Super', 'paid', '1', '', 0),
(82, 108, '2020-09-30 17:25:48', 1, 'zzz', 2147483647, 8500, 0, 8500, 3, 3, 8500, 'Super', 'paid', '1', '', 0),
(83, 109, '2020-09-30 17:29:03', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 6000, 'Super', 'paid', '1', 'sale note', 0),
(84, 111, '2020-10-01 17:59:21', 2, 'nnvn', 986564646, 3500, 0, 3500, 2, 2, 3500, 'Super', 'paid', '1', 'sale note', 0),
(85, 111, '2020-10-01 18:01:19', 2, 'nnvn', 986564646, 3500, 0, 3500, 2, 2, 3500, 'Super', 'paid', '1', 'sale nn', 0),
(86, 111, '2020-10-01 18:04:28', 2, 'nnvn', 986564646, 3500, 0, 3500, 2, 2, 3500, 'Super', 'paid', '1', '', 0),
(87, 111, '2020-10-01 18:05:31', 2, 'nnvn', 986564646, 3500, 0, 3500, 2, 2, 3500, 'Super', 'paid', '1', '', 0),
(88, 111, '2020-10-01 18:06:02', 2, 'nnvn', 986564646, 3500, 0, 3500, 2, 2, 11000, 'Super', 'paid', '1', '', 0),
(89, 111, '2020-10-01 18:06:55', 2, 'nnvn', 986564646, 3500, 0, 3500, 2, 2, 3500, 'Super', 'paid', '1', '', 0),
(90, 111, '2020-10-01 18:08:14', 2, 'nnvn', 986564646, 3500, 0, 3500, 2, 2, 3500, 'Super', 'paid', '1', '', 0),
(91, 110, '2020-10-01 18:10:38', 9, 'Ay Sea', 2147483647, 11000, 0, 11000, 4, 4, 11000, 'Super', 'paid', '1', 'sale note', 0),
(92, 110, '2020-10-01 18:16:34', 9, 'Ay Sea', 2147483647, 11000, 0, 11000, 4, 4, 15000, 'Super', 'paid', '1', 'sss', 4000),
(93, 112, '2020-10-01 18:33:21', 7, 'knc', 2147483647, 3750, 1000, 2750, 3, 7, 5000, 'Super', 'paid', '1', 'yes', 2250),
(94, 113, '2020-10-01 18:41:31', 8, 'ggg', 2147483647, 5000, 2, 4900, 1, 5, 5000, 'Super', 'paid', '1', '', 100),
(95, 109, '2020-10-01 18:48:38', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 8500, 'Super', 'paid', '1', '', 0),
(96, 109, '2020-10-01 18:53:44', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 8500, 'Super', 'paid', '1', '', 0),
(97, 109, '2020-10-01 18:54:48', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 10000, 'Super', 'paid', '1', '', 1500),
(98, 109, '2020-10-01 18:56:07', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 10000, 'Super', 'paid', '1', '', 1500),
(99, 109, '2020-10-01 19:00:52', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 8500, 'Super', 'paid', '1', '', 0),
(100, 109, '2020-10-01 19:03:52', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 8000, 'Super', 'paid', '1', '', 0),
(101, 109, '2020-10-01 19:04:05', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 8500, 'Super', 'paid', '1', '', 0),
(102, 109, '2020-10-01 19:04:56', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 8500, 'Super', 'paid', '1', '', 0),
(103, 109, '2020-10-01 19:15:52', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 10000, 'Super', 'paid', '1', '', 1500),
(104, 109, '2020-10-01 19:28:00', 8, 'ggg', 2147483647, 2500, 0, 2500, 2, 2, 8500, 'Super', 'paid', '1', '', 0),
(105, 114, '2020-10-01 19:47:04', 7, 'knc', 2147483647, 10500, 0, 10500, 5, 5, 10500, 'Super', 'paid', '1', '', 0),
(106, 115, '2020-10-01 19:53:00', 3, 'khin nyein chan', 2147483647, 3350, 0, 3350, 4, 9, 5000, 'Super', 'paid', '1', '', 1650),
(107, 116, '2020-10-01 19:54:45', 3, 'khin nyein chan', 2147483647, 150, 0, 150, 1, 3, 150, 'Super', 'paid', '1', '', 0),
(108, 117, '2020-10-01 22:34:22', 3, 'khin nyein chan', 2147483647, 5000, 0, 5000, 1, 1, 5000, 'Super', 'paid', '1', '', 0),
(109, 119, '2020-10-01 22:39:30', 7, 'knc', 2147483647, 500, 0, 500, 1, 10, 1500, 'Super', 'paid', '1', '', 0),
(110, 118, '2020-10-01 22:41:40', 8, 'ggg', 2147483647, 1500, 0, 1500, 1, 1, 1500, 'Super', 'paid', '1', '', 0),
(111, 122, '2020-10-01 22:45:45', 5, 'xfv', 0, 4000, 0, 4000, 1, 2, 5000, 'Super', 'paid', '1', '', 1000),
(112, 121, '2020-10-01 22:50:37', 3, 'khin nyein chan', 2147483647, 6500, 0, 6500, 2, 2, 10000, 'Super', 'paid', '1', '', 3500),
(113, 120, '2020-10-01 23:28:32', 1, 'zzz', 2147483647, 3000, 0, 3000, 1, 1, 3000, 'Super', 'paid', '1', '', 0),
(114, 125, '2020-10-02 10:29:59', 2, 'nnvn', 986564646, 1000, 0, 1000, 1, 1, 1000, 'Super', 'paid', '1', '', 0),
(115, 125, '2020-10-02 10:30:37', 2, 'nnvn', 986564646, 1000, 0, 1000, 1, 1, 1000, 'Super', 'paid', '1', '', 0),
(116, 125, '2020-10-02 10:31:22', 2, 'nnvn', 986564646, 1000, 0, 1000, 1, 1, 1000, 'Super', 'paid', '1', '', 0),
(117, 125, '2020-10-02 10:32:02', 2, 'nnvn', 986564646, 1000, 0, 1000, 1, 1, 1000, 'Super', 'paid', '1', '', 0),
(118, 124, '2020-10-02 10:36:24', 8, 'ggg', 2147483647, 7650, 0, 7650, 3, 5, 10000, 'Super', 'paid', '1', '', 2350),
(119, 123, '2020-10-02 10:37:34', 1, 'zzz', 2147483647, 3050, 0, 3050, 2, 2, 3100, 'Super', 'paid', '1', 'sale ok', 50),
(120, 126, '2020-10-02 17:34:48', 9, 'Ay Sea', 2147483647, 550, 0, 550, 1, 11, 2500, 'Super', 'paid', '1', 'sale note', 0),
(121, 127, '2020-10-02 18:16:30', 2, 'nnvn', 986564646, 5000, 0, 5000, 2, 2, 5000, 'Super', 'paid', '1', 'partial testing', -2000),
(122, 128, '2020-10-02 18:41:45', 3, 'khin nyein chan', 2147483647, 3600, 0, 3600, 3, 4, 4000, 'Super', 'paid', '1', 'partial testing', 400),
(123, 105, '2020-10-02 18:51:00', 3, 'khin nyein chan', 2147483647, 9500, 1000, 8500, 3, 3, 7000, 'Super', 'paid', '1', '', 2000),
(124, 129, '2020-10-02 18:51:54', 1, 'zzz', 2147483647, 3600, 0, 3600, 3, 4, 4000, 'Super', 'paid', '1', '', 400),
(125, 130, '2020-10-02 18:52:28', 2, 'nnvn', 986564646, 3150, 0, 3150, 2, 5, 6000, 'Super', 'paid', '1', '', 2850),
(126, 131, '2020-10-02 18:52:52', 3, 'khin nyein chan', 2147483647, 4000, 0, 4000, 2, 2, 6000, 'Super', 'paid', '1', '', 2000),
(127, 104, '2020-10-03 14:01:37', 9, 'Ay Sea', 2147483647, 2650, 0, 2650, 4, 15, 5000, 'Super', 'paid', '1', '', 2350);

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `date`, `sale_id`, `product_id`, `total`, `quantity`, `subtotal`, `product_code`, `product_name`, `customer_id`, `customer_name`, `payment_status`, `note`) VALUES
(1, '2020-09-13 23:49:36', 48, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 8, 'ggg', 'paid', ''),
(2, '2020-09-13 23:53:40', 49, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 6, 'sadf', 'paid', ''),
(3, '2020-09-13 23:53:40', 49, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 6, 'sadf', 'paid', ''),
(4, '2020-09-13 23:56:49', 50, 9, 2500, 1, 2500, 'w50', 'Wash 50 kg', 1, 'zzz', 'partial', ''),
(5, '2020-09-14 21:01:21', 51, 1, 1000, 1, 1000, 'w8', 'Wash 8 kg', 1, 'zzz', 'partial', ''),
(6, '2020-09-14 21:01:21', 51, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 1, 'zzz', 'partial', ''),
(7, '2020-09-14 21:33:18', 52, 9, 2500, 1, 2500, 'w50', 'Wash 50 kg', 1, 'zzz', 'paid', ''),
(8, '2020-09-14 21:33:18', 52, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 1, 'zzz', 'paid', ''),
(9, '2020-09-14 21:38:44', 53, 4, 1500, 1, 1500, 'd15', 'Dry 15 kg', 3, 'khin nyein chan', 'paid', ''),
(10, '2020-09-14 21:38:44', 53, 11, 3000, 1, 3000, 'd30', 'Dry 30 Kg', 3, 'khin nyein chan', 'paid', ''),
(11, '2020-09-14 21:40:59', 54, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 8, 'ggg', 'paid', ''),
(12, '2020-09-14 21:41:54', 55, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 9, 'Ay Sea', 'partial', ''),
(13, '2020-09-14 21:49:01', 56, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 9, 'Ay Sea', 'partial', ''),
(14, '2020-09-14 22:06:45', 57, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 2, 'nnvn', 'paid', ''),
(15, '2020-09-14 22:09:18', 58, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 5, 'xfv', 'paid', ''),
(16, '2020-09-14 22:12:37', 59, 11, 3000, 1, 3000, 'd30', 'Dry 30 Kg', 1, 'zzz', 'paid', ''),
(17, '2020-09-14 22:17:56', 60, 4, 1500, 1, 1500, 'd15', 'Dry 15 kg', 8, 'ggg', 'paid', ''),
(18, '2020-09-14 22:41:10', 61, 7, 50, 3, 150, 'oth', 'Other', 7, 'knc', 'paid', ''),
(19, '2020-09-14 22:46:51', 62, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 1, 'zzz', 'paid', ''),
(20, '2020-09-14 22:46:51', 62, 9, 2500, 1, 2500, 'w50', 'Wash 50 kg', 1, 'zzz', 'paid', ''),
(21, '2020-09-14 22:47:37', 63, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 8, 'ggg', 'paid', ''),
(22, '2020-09-14 22:47:37', 63, 9, 2500, 1, 2500, 'w50', 'Wash 50 kg', 8, 'ggg', 'paid', ''),
(23, '2020-09-14 22:56:23', 64, 5, 50, 5, 250, 'ir', 'Iron', 6, 'sadf', 'paid', ''),
(24, '2020-09-14 22:58:13', 65, 1, 1000, 3, 3000, 'w8', 'Wash 8 kg', 3, 'khin nyein chan', 'paid', ''),
(25, '2020-09-14 23:04:36', 66, 1, 1000, 1, 1000, 'w8', 'Wash 8 kg', 5, 'xfv', 'paid', ''),
(26, '2020-09-14 23:04:36', 66, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 5, 'xfv', 'paid', ''),
(27, '2020-09-14 23:10:28', 67, 1, 1000, 1, 1000, 'w8', 'Wash 8 kg', 9, 'Ay Sea', 'paid', ''),
(28, '2020-09-14 23:10:28', 67, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 9, 'Ay Sea', 'paid', ''),
(29, '2020-09-14 23:31:41', 68, 1, 1000, 1, 1000, 'w8', 'Wash 8 kg', 5, 'xfv', 'paid', ''),
(30, '2020-09-14 23:31:41', 68, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 5, 'xfv', 'paid', ''),
(31, '2020-09-14 23:47:11', 69, 9, 2500, 3, 7500, 'w50', 'Wash 50 kg', 1, 'zzz', 'paid', ''),
(32, '2020-09-15 11:12:55', 70, 1, 1000, 1, 1000, 'w8', 'Wash 8 kg', 2, 'nnvn', 'paid', ''),
(33, '2020-09-15 11:12:55', 70, 9, 2500, 1, 2500, 'w50', 'Wash 50 kg', 2, 'nnvn', 'paid', ''),
(34, '2020-09-15 21:06:51', 71, 1, 1000, 1, 1000, 'w8', 'Wash 8 kg', 9, 'Ay Sea', 'paid', ''),
(35, '2020-09-15 21:06:51', 71, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 9, 'Ay Sea', 'paid', ''),
(36, '2020-09-16 18:48:01', 72, 1, 1000, 1, 1000, 'w8', 'Wash 8 kg', 9, 'Ay Sea', 'paid', ''),
(37, '2020-09-16 18:48:01', 72, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 9, 'Ay Sea', 'paid', ''),
(38, '2020-09-16 18:48:01', 72, 4, 1500, 1, 1500, 'd15', 'Dry 15 kg', 9, 'Ay Sea', 'paid', ''),
(39, '2020-09-16 18:48:01', 72, 3, 1000, 1, 1000, 'd8', 'Dry 8 kg', 9, 'Ay Sea', 'paid', ''),
(40, '2020-09-16 20:28:18', 73, 1, 1000, 1, 1000, 'w8', 'Wash 8 kg', 5, 'xfv', 'paid', ''),
(41, '2020-09-16 20:28:18', 73, 3, 1000, 1, 1000, 'd8', 'Dry 8 kg', 5, 'xfv', 'paid', ''),
(42, '2020-09-16 20:28:18', 73, 5, 50, 6, 300, 'ir', 'Iron', 5, 'xfv', 'paid', ''),
(43, '2020-09-16 20:28:19', 73, 6, 50, 1, 50, 'std', 'Softener', 5, 'xfv', 'paid', ''),
(44, '2020-09-16 20:40:35', 74, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 9, 'Ay Sea', 'paid', ''),
(45, '2020-09-16 20:40:35', 74, 11, 3000, 1, 3000, 'd30', 'Dry 30 Kg', 9, 'Ay Sea', 'paid', ''),
(46, '2020-09-16 20:40:35', 74, 5, 50, 5, 250, 'ir', 'Iron', 9, 'Ay Sea', 'paid', ''),
(47, '2020-09-16 22:45:21', 75, 1, 1000, 1, 1000, 'w8', 'Wash 8 kg', 8, 'ggg', 'paid', ''),
(48, '2020-09-16 22:45:21', 75, 9, 2500, 1, 2500, 'w50', 'Wash 50 kg', 8, 'ggg', 'paid', ''),
(49, '2020-09-16 22:46:18', 76, 9, 2500, 1, 2500, 'w50', 'Wash 50 kg', 2, 'nnvn', 'paid', ''),
(50, '2020-09-16 22:46:18', 76, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 2, 'nnvn', 'paid', ''),
(51, '2020-09-16 22:47:44', 77, 5, 50, 3, 150, 'ir', 'Iron', 3, 'khin nyein chan', 'paid', ''),
(52, '2020-09-16 22:56:45', 78, 1, 1000, 1, 1000, 'w8', 'Wash 8 kg', 9, 'Ay Sea', 'paid', ''),
(53, '2020-09-16 22:56:45', 78, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 9, 'Ay Sea', 'paid', ''),
(54, '2020-09-16 22:56:45', 78, 3, 1000, 1, 1000, 'd8', 'Dry 8 kg', 9, 'Ay Sea', 'paid', ''),
(55, '2020-09-16 22:56:45', 78, 4, 1500, 1, 1500, 'd15', 'Dry 15 kg', 9, 'Ay Sea', 'paid', ''),
(56, '2020-09-16 22:56:45', 78, 5, 50, 7, 350, 'ir', 'Iron', 9, 'Ay Sea', 'paid', ''),
(57, '2020-09-16 22:56:46', 78, 6, 50, 2, 100, 'std', 'Softener', 9, 'Ay Sea', 'paid', ''),
(58, '2020-09-18 11:06:37', 79, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 5, 'xfv', 'paid', ''),
(59, '2020-09-18 11:06:37', 79, 11, 3000, 1, 3000, 'd30', 'Dry 30 Kg', 5, 'xfv', 'paid', ''),
(60, '2020-09-18 11:06:37', 79, 5, 50, 10, 500, 'ir', 'Iron', 5, 'xfv', 'paid', ''),
(61, '2020-09-18 11:06:37', 79, 6, 50, 2, 100, 'std', 'Softener', 5, 'xfv', 'paid', ''),
(62, '2020-09-30 17:12:43', 80, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 1, 'zzz', 'partial', ''),
(63, '2020-09-30 17:12:43', 80, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 1, 'zzz', 'partial', ''),
(64, '2020-09-30 17:12:43', 80, 9, 2500, 1, 2500, 'w50', 'Wash 50 kg', 1, 'zzz', 'partial', ''),
(65, '2020-09-30 17:12:43', 80, 3, 1000, 1, 1000, 'd8', 'Dry 8 kg', 1, 'zzz', 'partial', ''),
(66, '2020-09-30 17:12:43', 80, 4, 1500, 1, 1500, 'd15', 'Dry 15 kg', 1, 'zzz', 'partial', ''),
(67, '2020-09-30 17:22:08', 81, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 7, 'knc', 'partial', ''),
(68, '2020-09-30 17:22:08', 81, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 7, 'knc', 'partial', ''),
(69, '2020-09-30 17:22:08', 81, 5, 50, 2, 100, 'ir', 'Iron', 7, 'knc', 'partial', ''),
(70, '2020-09-30 17:25:48', 82, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 1, 'zzz', 'partial', ''),
(71, '2020-09-30 17:25:48', 82, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 1, 'zzz', 'partial', ''),
(72, '2020-09-30 17:25:48', 82, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 1, 'zzz', 'partial', ''),
(73, '2020-09-30 17:29:03', 83, 3, 1000, 1, 1000, 'd8', 'Dry 8 kg', 8, 'ggg', 'partial', ''),
(74, '2020-09-30 17:29:03', 83, 4, 1500, 1, 1500, 'd15', 'Dry 15 kg', 8, 'ggg', 'partial', ''),
(75, '2020-10-01 17:59:21', 84, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 2, 'nnvn', 'paid', ''),
(76, '2020-10-01 17:59:21', 84, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 2, 'nnvn', 'paid', ''),
(77, '2020-10-01 18:01:19', 85, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 2, 'nnvn', 'paid', ''),
(78, '2020-10-01 18:01:19', 85, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 2, 'nnvn', 'paid', ''),
(79, '2020-10-01 18:05:31', 87, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 2, 'nnvn', 'paid', ''),
(80, '2020-10-01 18:05:31', 87, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 2, 'nnvn', 'paid', ''),
(81, '2020-10-01 18:06:02', 88, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 2, 'nnvn', 'paid', ''),
(82, '2020-10-01 18:06:02', 88, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 2, 'nnvn', 'paid', ''),
(83, '2020-10-01 18:06:55', 89, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 2, 'nnvn', 'paid', ''),
(84, '2020-10-01 18:06:55', 89, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 2, 'nnvn', 'paid', ''),
(85, '2020-10-01 18:08:14', 90, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 2, 'nnvn', 'paid', ''),
(86, '2020-10-01 18:08:14', 90, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 2, 'nnvn', 'paid', ''),
(87, '2020-10-01 18:10:39', 91, 2, 1500, 1, 0, 'w15', 'Wash 15 kg', 9, 'Ay Sea', 'paid', ''),
(88, '2020-10-01 18:10:39', 91, 8, 2000, 1, 0, 'w30', 'Wash 30 kg', 9, 'Ay Sea', 'paid', ''),
(89, '2020-10-01 18:10:39', 91, 9, 2500, 1, 0, 'w50', 'Wash 50 kg', 9, 'Ay Sea', 'paid', ''),
(90, '2020-10-01 18:10:39', 91, 10, 5000, 1, 0, 'w100', 'Wash 100 kg', 9, 'Ay Sea', 'paid', ''),
(91, '2020-10-01 18:16:34', 92, 2, 1500, 1, 0, 'w15', 'Wash 15 kg', 9, 'Ay Sea', 'paid', ''),
(92, '2020-10-01 18:16:34', 92, 8, 2000, 1, 0, 'w30', 'Wash 30 kg', 9, 'Ay Sea', 'paid', ''),
(93, '2020-10-01 18:16:34', 92, 9, 2500, 1, 0, 'w50', 'Wash 50 kg', 9, 'Ay Sea', 'paid', ''),
(94, '2020-10-01 18:16:34', 92, 10, 5000, 1, 0, 'w100', 'Wash 100 kg', 9, 'Ay Sea', 'paid', ''),
(95, '2020-10-01 18:33:21', 93, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 7, 'knc', 'paid', ''),
(96, '2020-10-01 18:33:21', 93, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 7, 'knc', 'paid', ''),
(97, '2020-10-01 18:33:21', 93, 5, 50, 5, 250, 'ir', 'Iron', 7, 'knc', 'paid', ''),
(98, '2020-10-01 18:41:31', 94, 3, 1000, 5, 5000, 'd8', 'Dry 8 kg', 8, 'ggg', 'paid', ''),
(99, '2020-10-01 18:53:44', 96, 3, 1000, 1, 0, 'd8', 'Dry 8 kg', 8, 'ggg', 'paid', ''),
(100, '2020-10-01 18:53:44', 96, 4, 1500, 1, 0, 'd15', 'Dry 15 kg', 8, 'ggg', 'paid', ''),
(101, '2020-10-01 19:47:05', 105, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 7, 'knc', 'paid', ''),
(102, '2020-10-01 19:47:05', 105, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 7, 'knc', 'paid', ''),
(103, '2020-10-01 19:47:05', 105, 9, 2500, 1, 2500, 'w50', 'Wash 50 kg', 7, 'knc', 'paid', ''),
(104, '2020-10-01 19:47:05', 105, 11, 3000, 1, 3000, 'd30', 'Dry 30 Kg', 7, 'knc', 'paid', ''),
(105, '2020-10-01 19:47:05', 105, 4, 1500, 1, 1500, 'd15', 'Dry 15 kg', 7, 'knc', 'paid', ''),
(106, '2020-10-01 19:53:00', 106, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 3, 'khin nyein chan', 'paid', ''),
(107, '2020-10-01 19:53:00', 106, 4, 1500, 1, 1500, 'd15', 'Dry 15 kg', 3, 'khin nyein chan', 'paid', ''),
(108, '2020-10-01 19:53:00', 106, 5, 50, 4, 200, 'ir', 'Iron', 3, 'khin nyein chan', 'paid', ''),
(109, '2020-10-01 19:53:00', 106, 6, 50, 3, 150, 'std', 'Softener', 3, 'khin nyein chan', 'paid', ''),
(110, '2020-10-01 19:54:45', 107, 5, 50, 3, 150, 'ir', 'Iron', 3, 'khin nyein chan', 'paid', ''),
(111, '2020-10-01 22:34:22', 108, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 3, 'khin nyein chan', 'paid', ''),
(112, '2020-10-01 22:39:30', 109, 5, 50, 10, 500, 'ir', 'Iron', 7, 'knc', 'paid', ''),
(113, '2020-10-01 22:41:40', 110, 4, 1500, 1, 1500, 'd15', 'Dry 15 kg', 8, 'ggg', 'paid', ''),
(114, '2020-10-01 22:45:45', 111, 8, 2000, 2, 4000, 'w30', 'Wash 30 kg', 5, 'xfv', 'paid', ''),
(115, '2020-10-01 22:50:37', 112, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 3, 'khin nyein chan', 'paid', ''),
(116, '2020-10-01 22:50:38', 112, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 3, 'khin nyein chan', 'paid', ''),
(117, '2020-10-01 23:28:32', 113, 11, 3000, 1, 3000, 'd30', 'Dry 30 Kg', 1, 'zzz', 'paid', ''),
(118, '2020-10-02 10:30:37', 115, 3, 1000, 1, 1000, 'd8', 'Dry 8 kg', 2, 'nnvn', 'paid', ''),
(119, '2020-10-02 10:31:22', 116, 3, 1000, 1, 1000, 'd8', 'Dry 8 kg', 2, 'nnvn', 'paid', ''),
(120, '2020-10-02 10:32:02', 117, 3, 1000, 1, 1000, 'd8', 'Dry 8 kg', 2, 'nnvn', 'paid', ''),
(121, '2020-10-02 10:36:25', 118, 10, 5000, 1, 5000, 'w100', 'Wash 100 kg', 8, 'ggg', 'paid', ''),
(122, '2020-10-02 10:36:25', 118, 9, 2500, 1, 2500, 'w50', 'Wash 50 kg', 8, 'ggg', 'paid', ''),
(123, '2020-10-02 10:36:25', 118, 5, 50, 3, 150, 'ir', 'Iron', 8, 'ggg', 'paid', ''),
(124, '2020-10-02 10:37:34', 119, 11, 3000, 1, 3000, 'd30', 'Dry 30 Kg', 1, 'zzz', 'paid', ''),
(125, '2020-10-02 10:37:34', 119, 6, 50, 1, 50, 'std', 'Softener', 1, 'zzz', 'paid', ''),
(126, '2020-10-02 17:34:48', 120, 5, 50, 11, 550, 'ir', 'Iron', 9, 'Ay Sea', 'paid', ''),
(127, '2020-10-02 18:16:31', 121, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 2, 'nnvn', 'partial', ''),
(128, '2020-10-02 18:16:31', 121, 11, 3000, 1, 3000, 'd30', 'Dry 30 Kg', 2, 'nnvn', 'partial', ''),
(129, '2020-10-02 18:41:45', 122, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 3, 'khin nyein chan', 'partial', ''),
(130, '2020-10-02 18:41:45', 122, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 3, 'khin nyein chan', 'partial', ''),
(131, '2020-10-02 18:41:45', 122, 5, 50, 2, 100, 'ir', 'Iron', 3, 'khin nyein chan', 'partial', ''),
(132, '2020-10-02 18:51:00', 123, 9, 2500, 1, 0, 'w50', 'Wash 50 kg', 3, 'khin nyein chan', 'paid', ''),
(133, '2020-10-02 18:51:00', 123, 10, 5000, 1, 0, 'w100', 'Wash 100 kg', 3, 'khin nyein chan', 'paid', ''),
(134, '2020-10-02 18:51:00', 123, 8, 2000, 1, 0, 'w30', 'Wash 30 kg', 3, 'khin nyein chan', 'paid', ''),
(135, '2020-10-02 18:51:54', 124, 2, 1500, 1, 1500, 'w15', 'Wash 15 kg', 1, 'zzz', 'paid', ''),
(136, '2020-10-02 18:51:54', 124, 8, 2000, 1, 2000, 'w30', 'Wash 30 kg', 1, 'zzz', 'paid', ''),
(137, '2020-10-02 18:51:54', 124, 6, 50, 2, 100, 'std', 'Softener', 1, 'zzz', 'paid', ''),
(138, '2020-10-02 18:52:28', 125, 5, 50, 3, 150, 'ir', 'Iron', 2, 'nnvn', 'paid', ''),
(139, '2020-10-02 18:52:28', 125, 4, 1500, 2, 3000, 'd15', 'Dry 15 kg', 2, 'nnvn', 'paid', ''),
(140, '2020-10-02 18:52:52', 126, 3, 1000, 1, 1000, 'd8', 'Dry 8 kg', 3, 'khin nyein chan', 'partial', ''),
(141, '2020-10-02 18:52:52', 126, 11, 3000, 1, 3000, 'd30', 'Dry 30 Kg', 3, 'khin nyein chan', 'partial', ''),
(142, '2020-10-03 14:01:37', 127, 1, 1000, 1, 0, 'w8', 'Wash 8 kg', 9, 'Ay Sea', 'paid', ''),
(143, '2020-10-03 14:01:37', 127, 3, 1000, 1, 0, 'd8', 'Dry 8 kg', 9, 'Ay Sea', 'paid', ''),
(144, '2020-10-03 14:01:37', 127, 5, 50, 12, 0, 'ir', 'Iron', 9, 'Ay Sea', 'paid', ''),
(145, '2020-10-03 14:01:37', 127, 6, 50, 1, 0, 'std', 'Softener', 9, 'Ay Sea', 'paid', '');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `site_name` varchar(55) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `dateformat` varchar(20) NOT NULL,
  `timeformat` varchar(20) NOT NULL,
  `default_email` varchar(100) NOT NULL,
  `protocol` varchar(20) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_user` varchar(100) NOT NULL,
  `smtp_pass` varchar(255) NOT NULL,
  `smtp_port` varchar(10) NOT NULL,
  `smtp_crypto` varchar(5) NOT NULL,
  `mailpath` varchar(55) NOT NULL,
  `currency_prefix` varchar(3) NOT NULL,
  `default_tax_rate` varchar(20) NOT NULL,
  `display_product` varchar(20) NOT NULL,
  `default_category` varchar(50) NOT NULL,
  `default_discount` varchar(20) NOT NULL,
  `auto_print` varchar(10) NOT NULL,
  `after_sale_page` varchar(10) NOT NULL,
  `service_charges` varchar(20) NOT NULL,
  `rows_per_page` varchar(20) NOT NULL,
  `rounding` varchar(20) NOT NULL,
  `pro_limit` varchar(10) NOT NULL,
  `default_customer` varchar(20) NOT NULL,
  `decimals` varchar(10) NOT NULL,
  `qty_decimals` varchar(10) NOT NULL,
  `sac` varchar(10) NOT NULL,
  `decimals_sep` varchar(2) NOT NULL,
  `thousands_sep` varchar(2) NOT NULL,
  `display_symbol` varchar(10) NOT NULL,
  `symbol` varchar(55) NOT NULL,
  `focus_add_item` varchar(55) NOT NULL,
  `add_customer` varchar(55) NOT NULL,
  `toggle_category_slider` varchar(55) NOT NULL,
  `cancel_sale` varchar(55) NOT NULL,
  `suspend_sale` varchar(55) NOT NULL,
  `print_order` varchar(55) NOT NULL,
  `print_bill` varchar(55) NOT NULL,
  `finalize_sale` varchar(55) NOT NULL,
  `today_sale` varchar(55) NOT NULL,
  `open_hold_bills` varchar(55) NOT NULL,
  `close_register` varchar(55) NOT NULL,
  `printer` varchar(50) NOT NULL,
  `receipt_printer` varchar(55) NOT NULL,
  `order_printers` varchar(55) NOT NULL,
  `cash_drawer_codes` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `logo`, `site_name`, `phone`, `dateformat`, `timeformat`, `default_email`, `protocol`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `smtp_crypto`, `mailpath`, `currency_prefix`, `default_tax_rate`, `display_product`, `default_category`, `default_discount`, `auto_print`, `after_sale_page`, `service_charges`, `rows_per_page`, `rounding`, `pro_limit`, `default_customer`, `decimals`, `qty_decimals`, `sac`, `decimals_sep`, `thousands_sep`, `display_symbol`, `symbol`, `focus_add_item`, `add_customer`, `toggle_category_slider`, `cancel_sale`, `suspend_sale`, `print_order`, `print_bill`, `finalize_sale`, `today_sale`, `open_hold_bills`, `close_register`, `printer`, `receipt_printer`, `order_printers`, `cash_drawer_codes`) VALUES
(8, '', 'Laundry', 99999999, 'dd-mm-yyyy', 'H:I:S', 'Thae@mail.com', '', '', '', '', '', '', '', 'MMK', '5%', '0', '4', '15%', '', 'pos', '5%', '25', '', '', '11', '2', '1', '', '1', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '');

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
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

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
