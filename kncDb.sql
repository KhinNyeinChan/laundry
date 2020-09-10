-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 01:10 PM
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
(6, 'sadf', 'sa', 'sdf', 'dsf'),
(7, 'knc', '09256129483', 'gshdh', ''),
(8, 'ggg', '09256129483', 'rrty', 'gsf');

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
  `amount` int(100) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `ecategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ref_note` varchar(255) NOT NULL,
  `assign_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `start_date`, `end_date`, `total_qty`, `total_item`, `payment_status`, `created_by`, `customer_name`, `order_status`, `ref_note`, `assign_to`) VALUES
(6, 3, '2020-09-02 16:28:52', '2020-09-05 00:00:00', 4, 2, 'Hold', '1', 'khin nyein chan', '', '', ''),
(7, 3, '2020-09-04 15:03:49', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'ghfdj', ''),
(8, 3, '2020-09-04 15:05:02', '2020-09-05 00:00:00', 2, 1, 'paid', '1', 'khin nyein chan', 'received', 'fhgfgh', ''),
(9, 3, '2020-09-04 15:06:31', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'hytyu', ''),
(10, 3, '2020-09-04 15:07:50', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'yrtdty', ''),
(11, 2, '2020-09-04 15:12:55', '2020-09-17 00:00:00', 2, 1, 'paid', '1', 'nnvn', 'received', 'tyhtur', ''),
(12, 1, '2020-09-04 15:13:50', '2020-09-07 00:00:00', 2, 2, 'paid', '1', 'zzz', 'received', 'mmmm', ''),
(13, 3, '2020-09-04 15:20:07', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'aasddas', ''),
(14, 3, '2020-09-04 15:21:48', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', '', ''),
(15, 3, '2020-09-04 15:26:52', '0000-00-00 00:00:00', 4, 3, 'paid', '1', 'khin nyein chan', 'received', 'lkj;klj', ''),
(16, 3, '2020-09-04 15:29:09', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'asfd', ''),
(17, 3, '2020-09-04 15:30:47', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'fghj', ''),
(18, 3, '2020-09-04 15:32:59', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'gsdf', ''),
(19, 3, '2020-09-04 15:34:04', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'asdf', ''),
(20, 3, '2020-09-04 15:35:14', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'asdf', ''),
(21, 3, '2020-09-04 15:55:39', '2020-09-08 00:00:00', 3, 1, 'paid', '1', 'khin nyein chan', 'received', 'jjj', ''),
(22, 2, '2020-09-04 16:11:40', '2020-09-08 00:00:00', 4, 2, 'paid', '1', 'nnvn', 'received', 'jk.kljlj', ''),
(23, 3, '2020-09-04 16:14:32', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', '', ''),
(24, 3, '2020-09-04 16:15:42', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'dfgh', ''),
(25, 3, '2020-09-04 16:16:47', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', '', ''),
(26, 3, '2020-09-04 16:17:28', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', '', ''),
(27, 3, '2020-09-04 16:20:16', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'sdafasdf', ''),
(28, 3, '2020-09-04 16:21:45', '2020-09-05 00:00:00', 4, 2, 'paid', '1', 'khin nyein chan', 'received', 'asdf', ''),
(29, 8, '2020-09-06 11:20:14', '2020-09-10 00:00:00', 2, 2, 'partial', '1', 'ggg', 'received', 'rrrr', ''),
(30, 3, '2020-09-08 22:58:23', '2020-09-10 00:00:00', 2, 2, 'paid', '1', 'khin nyein chan', 'received', '', ''),
(31, 5, '2020-09-08 23:03:11', '2020-09-09 00:00:00', 3, 3, 'paid', '1', 'xfv', 'received', '', ''),
(32, 2, '2020-09-08 23:06:32', '2020-09-10 00:00:00', 2, 1, 'paid', '1', 'nnvn', 'received', '', ''),
(33, 6, '2020-09-09 21:41:30', '2020-09-11 00:00:00', 5, 4, 'paid', '1', 'sadf', 'received', 'iiiii', ''),
(34, 6, '2020-09-09 21:44:32', '2020-09-12 00:00:00', 1, 1, 'partial', '1', 'sadf', 'received', '', ''),
(35, 6, '2020-09-09 21:49:20', '2020-09-10 00:00:00', 2, 2, 'partial', '1', 'sadf', 'received', '', ''),
(36, 6, '2020-09-09 21:57:39', '2020-09-10 00:00:00', 2, 2, 'paid', '1', 'sadf', 'received', '', '');

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
  `status` varchar(50) NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) NOT NULL,
  `assign_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `product_code`, `product_name`, `status`, `modified_time`, `modified_by`, `assign_to`) VALUES
(3, 6, 1, 2, 'w8', 'Wash 8 kg', 'Hold', '2020-09-02 16:28:52', '', ''),
(4, 6, 2, 2, 'w15', 'Wash 15 kg', 'Hold', '2020-09-02 16:28:52', '', ''),
(5, 8, 10, 2, 'w100', 'Wash 100 kg', 'received', '2020-09-04 15:05:02', '', ''),
(6, 9, 7, 2, 'oth', 'Other', 'received', '2020-09-04 15:06:31', '', ''),
(7, 9, 6, 2, 'std', 'Softener', 'received', '2020-09-04 15:06:32', '', ''),
(8, 10, 10, 2, 'w100', 'Wash 100 kg', 'received', '2020-09-04 15:07:50', '', ''),
(9, 10, 8, 2, 'w30', 'Wash 30 kg', 'received', '2020-09-04 15:07:50', '', ''),
(10, 11, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 15:12:55', '', ''),
(11, 12, 3, 1, 'd8', 'Dry 8 kg', 'received', '2020-09-04 15:13:50', '', ''),
(12, 12, 4, 1, 'd15', 'Dry 15 kg', 'received', '2020-09-04 15:13:50', '', ''),
(13, 13, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 15:20:07', '', ''),
(14, 13, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 15:20:07', '', ''),
(15, 14, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 15:21:48', '', ''),
(16, 14, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 15:21:48', '', ''),
(17, 15, 1, 1, 'w8', 'Wash 8 kg', 'received', '2020-09-04 15:26:52', '', ''),
(18, 15, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 15:26:52', '', ''),
(19, 15, 8, 1, 'w30', 'Wash 30 kg', 'received', '2020-09-04 15:26:52', '', ''),
(20, 16, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 15:29:09', '', ''),
(21, 16, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 15:29:09', '', ''),
(22, 17, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 15:30:47', '', ''),
(23, 17, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 15:30:47', '', ''),
(24, 18, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 15:32:59', '', ''),
(25, 18, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 15:32:59', '', ''),
(26, 19, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 15:34:04', '', ''),
(27, 19, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 15:34:04', '', ''),
(28, 20, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 15:35:15', '', ''),
(29, 20, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 15:35:15', '', ''),
(30, 21, 1, 3, 'w8', 'Wash 8 kg', 'received', '2020-09-04 15:55:40', '', ''),
(31, 22, 4, 2, 'd15', 'Dry 15 kg', 'received', '2020-09-04 16:11:40', '', ''),
(32, 22, 3, 2, 'd8', 'Dry 8 kg', 'received', '2020-09-04 16:11:40', '', ''),
(33, 23, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 16:14:32', '', ''),
(34, 23, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 16:14:32', '', ''),
(35, 24, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 16:15:42', '', ''),
(36, 24, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 16:15:42', '', ''),
(37, 25, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 16:16:47', '', ''),
(38, 25, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 16:16:47', '', ''),
(39, 26, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 16:17:28', '', ''),
(40, 26, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 16:17:28', '', ''),
(41, 27, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 16:20:16', '', ''),
(42, 27, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 16:20:16', '', ''),
(43, 28, 1, 2, 'w8', 'Wash 8 kg', 'received', '2020-09-04 16:21:45', '', ''),
(44, 28, 2, 2, 'w15', 'Wash 15 kg', 'received', '2020-09-04 16:21:45', '', ''),
(45, 29, 2, 1, 'w15', 'Wash 15 kg', 'received', '2020-09-06 11:20:14', '', ''),
(46, 29, 8, 1, 'w30', 'Wash 30 kg', 'received', '2020-09-06 11:20:14', '', ''),
(47, 30, 3, 1, 'd8', 'Dry 8 kg', 'received', '2020-09-08 22:58:23', '', ''),
(48, 30, 4, 1, 'd15', 'Dry 15 kg', 'received', '2020-09-08 22:58:23', '', ''),
(49, 31, 6, 1, 'std', 'Softener', 'received', '2020-09-08 23:03:11', '', ''),
(50, 31, 1, 1, 'w8', 'Wash 8 kg', 'received', '2020-09-08 23:03:11', '', ''),
(51, 31, 2, 1, 'w15', 'Wash 15 kg', 'received', '2020-09-08 23:03:11', '', ''),
(52, 32, 8, 2, 'w30', 'Wash 30 kg', 'received', '2020-09-08 23:06:33', '', ''),
(53, 33, 1, 1, 'w8', 'Wash 8 kg', 'received', '2020-09-09 21:41:30', '', ''),
(54, 33, 3, 1, 'd8', 'Dry 8 kg', 'received', '2020-09-09 21:41:30', '', ''),
(55, 33, 5, 2, 'ir', 'Iron', 'received', '2020-09-09 21:41:31', '', ''),
(56, 33, 6, 1, 'std', 'Softener', 'received', '2020-09-09 21:41:31', '', ''),
(57, 34, 9, 1, 'w50', 'Wash 50 kg', 'received', '2020-09-09 21:44:32', '', ''),
(58, 35, 1, 1, 'w8', 'Wash 8 kg', 'received', '2020-09-09 21:49:20', '', ''),
(59, 35, 2, 1, 'w15', 'Wash 15 kg', 'received', '2020-09-09 21:49:20', '', ''),
(60, 36, 3, 1, 'd8', 'Dry 8 kg', 'received', '2020-09-09 21:57:39', '', ''),
(61, 36, 4, 1, 'd15', 'Dry 15 kg', 'received', '2020-09-09 21:57:39', '', '');

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
(11, 6, 2500, 'paid', '1', '', 'Cash', '2020-09-09 21:57:39', '17', 3000, 500, 1);

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
(1, 'w8', 'Wash 8 kg', 1, '1000.00', 1),
(2, 'w15', 'Wash 15 kg', 1, '1500.00', 1),
(3, 'd8', 'Dry 8 kg', 2, '1000.00', 1),
(4, 'd15', 'Dry 15 kg', 2, '1500.00', 1),
(5, 'ir', 'Iron', 3, '50.00', 0),
(6, 'std', 'Softener', 4, '50.00', 0),
(7, 'oth', 'Other', 5, '50.00', 0),
(8, 'w30', 'Wash 30 kg', 1, '2000.00', 1),
(9, 'w50', 'Wash 50 kg', 1, '2500.00', 1),
(10, 'w100', 'Wash 100 kg', 1, '5000.00', 1);

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
  `total` int(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `paid` int(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `store_id` varchar(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `order_id`, `date`, `customer_id`, `customer_name`, `total`, `discount`, `grand_total`, `total_item`, `total_quantity`, `paid`, `created_by`, `status`, `store_id`, `note`) VALUES
(1, 20, '2020-09-04 15:35:15', 3, 'khin nyein chan', 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', ''),
(2, 21, '2020-09-04 15:55:40', 3, 'khin nyein chan', 3000, 0, 3000, 1, 3, 5000, '1', 'paid', '1', ''),
(3, 22, '2020-09-04 16:11:40', 2, 'nnvn', 5000, 0, 5000, 2, 4, 10000, '1', 'paid', '1', ''),
(4, 23, '2020-09-04 16:14:32', 3, 'khin nyein chan', 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', ''),
(5, 24, '2020-09-04 16:15:43', 3, 'khin nyein chan', 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', ''),
(6, 25, '2020-09-04 16:16:47', 3, 'khin nyein chan', 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', ''),
(7, 26, '2020-09-04 16:17:28', 3, 'khin nyein chan', 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', ''),
(8, 27, '2020-09-04 16:20:16', 3, 'khin nyein chan', 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', ''),
(9, 28, '2020-09-04 16:21:45', 3, 'khin nyein chan', 5000, 0, 5000, 2, 4, 5000, '1', 'paid', '1', ''),
(10, 29, '2020-09-06 11:20:15', 8, 'ggg', 3500, 0, 3500, 2, 2, 1000, '1', 'partial', '1', ''),
(11, 30, '2020-09-08 22:58:23', 3, 'khin nyein chan', 2500, 0, 2500, 2, 2, 3000, '1', 'paid', '1', ''),
(12, 31, '2020-09-08 23:03:11', 5, 'xfv', 2550, 0, 2550, 3, 3, 5000, '1', 'paid', '1', ''),
(13, 32, '2020-09-08 23:06:33', 2, 'nnvn', 4000, 0, 4000, 1, 2, 5000, '1', 'paid', '1', ''),
(14, 33, '2020-09-09 21:41:31', 6, 'sadf', 2150, 0, 2150, 4, 5, 5000, '1', 'paid', '1', ''),
(15, 34, '2020-09-09 21:44:32', 6, 'sadf', 2500, 0, 2500, 1, 1, 1000, '1', 'partial', '1', ''),
(16, 35, '2020-09-09 21:49:20', 6, 'sadf', 2500, 0, 2500, 2, 2, 2000, '1', 'partial', '1', ''),
(17, 36, '2020-09-09 21:57:39', 6, 'sadf', 2500, 0, 2500, 2, 2, 3000, '1', 'paid', '1', '');

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
(1, 'MANNA', 'MN', 'logo1.png', 'store@abc.com', '09765000454 [Facebook :Manna Food Castle]', 'အမွတ္(၁၀၁)၊ ရန္ကုန္ အင္းစိန္လမ္းမ', 'ခ၀ဲျခံမွတ္တိုင္၊', 'မရမ္းကုန္း', 'Yangon', '46000', 'Myanmar', 'MYR', '', 'ေက်းဇူးတင္ပါသည္။'),
(0, 'FC Laundry', 'fcl', NULL, 'poe2161999@gmail.com', '09256129483', 'ggggg', 'ttttt', 'Banmaw', 'Kachin', '', 'Myanmar', '', '', 'Thank you!');

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
(12, '', 'poephayound18@gmail.com', '', '016e197bcaeda50aebccbabca38f02d3', 0, '2020-09-09 17:53:10', 0, 'admin');

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
(3, 'delete', 3),
(4, 'view', 4);

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
(2, 11, 3);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `store_product_items`
--
ALTER TABLE `store_product_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_power`
--
ALTER TABLE `user_power`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
