-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 07:15 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `posc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tec_categories`
--

CREATE TABLE IF NOT EXISTS `tec_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(55) NOT NULL,
  `image` varchar(100) DEFAULT 'no_image.png',
  'printer_id' int(1) NOT NULL
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_combo_items`
--

CREATE TABLE IF NOT EXISTS `tec_combo_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `quantity` decimal(12,4) NOT NULL,
  `price` decimal(25,2) DEFAULT NULL,
  `cost` decimal(25,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_customers`
--

CREATE TABLE IF NOT EXISTS `tec_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `cf1` varchar(255) NOT NULL,
  `cf2` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tec_customers`
--

INSERT INTO `tec_customers` (`id`, `name`, `cf1`, `cf2`, `phone`, `email`, `store_id`) VALUES
(1, 'Walk-in Client', '', '', '012345678', 'customer@abc.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tec_expenses`
--

CREATE TABLE IF NOT EXISTS `tec_expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reference` varchar(50) NOT NULL,
  `amount` decimal(25,2) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `created_by` varchar(55) NOT NULL,
  `attachment` varchar(55) DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tec_expenses`
--

INSERT INTO `tec_expenses` (`id`, `date`, `reference`, `amount`, `note`, `created_by`, `attachment`, `store_id`) VALUES
(1, '2017-02-25 03:36:00', 'ကေလးေၾကာင့္ဖန္ခြက္ကြဲ', '3500.00', 'ၿပန္ေရာ္ေပး', '1', NULL, 1),
(2, '2017-02-25 03:37:00', 'ေရခဲမုန္.ခြက္ကုန္လုိ.ၿပန္ၿဖည့့္', '3000.00', '', '1', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tec_gift_cards`
--

CREATE TABLE IF NOT EXISTS `tec_gift_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `card_no` varchar(20) NOT NULL,
  `value` decimal(25,2) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `balance` decimal(25,2) NOT NULL,
  `expiry` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `card_no` (`card_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_groups`
--

CREATE TABLE IF NOT EXISTS `tec_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tec_groups`
--

INSERT INTO `tec_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'manager', 'Manager'),
(3, 'staff', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tec_login_attempts`
--

CREATE TABLE IF NOT EXISTS `tec_login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_payments`
--

CREATE TABLE IF NOT EXISTS `tec_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sale_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `paid_by` varchar(20) NOT NULL,
  `cheque_no` varchar(20) DEFAULT NULL,
  `cc_no` varchar(20) DEFAULT NULL,
  `cc_holder` varchar(25) DEFAULT NULL,
  `cc_month` varchar(2) DEFAULT NULL,
  `cc_year` varchar(4) DEFAULT NULL,
  `cc_type` varchar(20) DEFAULT NULL,
  `amount` decimal(25,2) NOT NULL,
  `currency` varchar(3) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `attachment` varchar(55) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `pos_paid` decimal(25,2) DEFAULT '0.00',
  `pos_balance` decimal(25,2) DEFAULT '0.00',
  `gc_no` varchar(20) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_printers`
--

CREATE TABLE IF NOT EXISTS `tec_printers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `type` varchar(25) NOT NULL,
  `profile` varchar(25) NOT NULL,
  `char_per_line` tinyint(3) unsigned DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `ip_address` varbinary(45) DEFAULT NULL,
  `port` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_products`
--

CREATE TABLE IF NOT EXISTS `tec_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` char(255) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `price` decimal(25,2) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.png',
  `tax` varchar(20) DEFAULT NULL,
  `cost` decimal(25,2) DEFAULT NULL,
  `tax_method` tinyint(1) DEFAULT '1',
  `quantity` decimal(15,2) DEFAULT '0.00',
  `barcode_symbology` varchar(20) NOT NULL DEFAULT 'code39',
  `type` varchar(20) NOT NULL DEFAULT 'standard',
  `details` text,
  `alert_quantity` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_product_store_qty`
--

CREATE TABLE IF NOT EXISTS `tec_product_store_qty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `quantity` decimal(12,2) NOT NULL DEFAULT '0.00',
  `price` decimal(25,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `store_id` (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_purchases`
--

CREATE TABLE IF NOT EXISTS `tec_purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(55) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(1000) NOT NULL,
  `total` decimal(25,2) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `received` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `store_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_purchase_items`
--

CREATE TABLE IF NOT EXISTS `tec_purchase_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `cost` decimal(25,2) NOT NULL,
  `subtotal` decimal(25,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_registers`
--

CREATE TABLE IF NOT EXISTS `tec_registers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `cash_in_hand` decimal(25,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `total_cash` decimal(25,2) DEFAULT NULL,
  `total_cheques` int(11) DEFAULT NULL,
  `total_cc_slips` int(11) DEFAULT NULL,
  `total_cash_submitted` decimal(25,2) NOT NULL,
  `total_cheques_submitted` int(11) NOT NULL,
  `total_cc_slips_submitted` int(11) NOT NULL,
  `note` text,
  `closed_at` timestamp NULL DEFAULT NULL,
  `transfer_opened_bills` varchar(50) DEFAULT NULL,
  `closed_by` int(11) DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tec_registers`
--

INSERT INTO `tec_registers` (`id`, `date`, `user_id`, `cash_in_hand`, `status`, `total_cash`, `total_cheques`, `total_cc_slips`, `total_cash_submitted`, `total_cheques_submitted`, `total_cc_slips_submitted`, `note`, `closed_at`, `transfer_opened_bills`, `closed_by`, `store_id`) VALUES
(1, '2017-04-21 08:36:18', 1, '0.00', 'close', '0.00', 0, 0, '0.00', 0, 0, '', '2017-04-21 08:36:42', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tec_sales`
--

CREATE TABLE IF NOT EXISTS `tec_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `total` decimal(25,2) NOT NULL,
  `product_discount` decimal(25,2) DEFAULT NULL,
  `order_discount_id` varchar(20) DEFAULT NULL,
  `order_discount` decimal(25,2) DEFAULT NULL,
  `total_discount` decimal(25,2) DEFAULT NULL,
  `product_tax` decimal(25,2) DEFAULT NULL,
  `order_tax_id` varchar(20) DEFAULT NULL,
  `order_tax` decimal(25,2) DEFAULT NULL,
  `total_tax` decimal(25,2) DEFAULT NULL,
  `grand_total` decimal(25,2) NOT NULL,
  `total_items` int(11) DEFAULT NULL,
  `total_quantity` decimal(15,2) DEFAULT NULL,
  `paid` decimal(25,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `rounding` decimal(8,2) DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT '1',
  `hold_ref` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_sale_items`
--

CREATE TABLE IF NOT EXISTS `tec_sale_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `net_unit_price` decimal(25,2) NOT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `item_discount` decimal(25,2) DEFAULT NULL,
  `tax` int(20) DEFAULT NULL,
  `item_tax` decimal(25,2) DEFAULT NULL,
  `subtotal` decimal(25,2) NOT NULL,
  `real_unit_price` decimal(25,2) DEFAULT NULL,
  `cost` decimal(25,2) DEFAULT '0.00',
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_sessions`
--

CREATE TABLE IF NOT EXISTS `tec_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tec_sessions`
--

INSERT INTO `tec_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('083s6kjts4paknlfmeos8e8o69klhda4', '::1', 1492496584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439323439363534343b6964656e746974797c733a31353a2261646d696e4069776176652e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4069776176652e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32343a22546875203235204a756e20323031352031303a323920414d223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343931353535393636223b6c6173745f69707c733a333a223a3a31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c693a313b6861735f73746f72655f69647c4e3b6572726f727c733a36323a225265676973746572206973206e6f74206f70656e65642c20706c65617365206f70656e2072656769737465722077697468206361736820696e2068616e64223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('2gu9cg8kl5vapjppjf9b398lnp4gtbts', '::1', 1493277033, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333237363939363b6964656e746974797c733a31353a2261646d696e4069776176652e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4069776176652e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32343a22546875203235204a756e20323031352031303a323920414d223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343932373633373732223b6c6173745f69707c733a333a223a3a31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c693a313b6861735f73746f72655f69647c4e3b6d6573736167657c733a32393a2253657474696e6773207375636365737366756c6c792075706461746564223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('3ccllj52feet8rrs6d3v9q6n3p0bkvsr', '::1', 1502079845, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323037393834353b),
('6v3iget2iio8glm8cbqt23g4fhg5gpfe', '::1', 1499444892, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439393434343837383b6964656e746974797c733a31353a2261646d696e4069776176652e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4069776176652e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32343a22546875203235204a756e20323031352031303a323920414d223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933323737303139223b6c6173745f69707c733a333a223a3a31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c693a313b6861735f73746f72655f69647c4e3b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d6572726f727c733a36323a225265676973746572206973206e6f74206f70656e65642c20706c65617365206f70656e2072656769737465722077697468206361736820696e2068616e64223b),
('8pfbq98qcgcbdp46i5a56soq6i0hrf3k', '::1', 1491550766, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439313535303735303b6964656e746974797c733a31353a2261646d696e4069776176652e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4069776176652e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32343a22546875203235204a756e20323031352031303a323920414d223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343931353339313430223b6c6173745f69707c733a333a223a3a31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c693a313b6861735f73746f72655f69647c4e3b),
('ajv9un4go664rc708soq4r12nf1b81qk', '::1', 1492763802, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439323736333532373b6964656e746974797c733a31353a2261646d696e4069776176652e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4069776176652e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32343a22546875203235204a756e20323031352031303a323920414d223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343932373633353336223b6c6173745f69707c733a333a223a3a31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c693a313b6861735f73746f72655f69647c4e3b6d6573736167657c733a32383a225265676973746572207375636365737366756c6c7920636c6f736564223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('d5vvsd3s94p67o7dduolbjnv7p0j95qp', '::1', 1492576625, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439323537363632343b),
('dfjdf9i3eb0p9qpaecgqg58lq7e8btv2', '::1', 1491539817, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439313533393831373b6964656e746974797c733a31353a2261646d696e4069776176652e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4069776176652e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32343a22546875203235204a756e20323031352031303a323920414d223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343931353337313330223b6c6173745f69707c733a333a223a3a31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c693a313b6861735f73746f72655f69647c4e3b6572726f727c733a36323a225265676973746572206973206e6f74206f70656e65642c20706c65617365206f70656e2072656769737465722077697468206361736820696e2068616e64223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('flmt5hi4249adkrv6ec496flcgdpqv0k', '::1', 1502081048, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530323038313034383b),
('fnfk1b8ifcgss72kndpgbrmc08vot2pb', '::1', 1491537132, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439313533373132303b6964656e746974797c733a31353a2261646d696e4069776176652e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4069776176652e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32343a22546875203235204a756e20323031352031303a323920414d223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343930363837303932223b6c6173745f69707c733a333a223a3a31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c693a313b6861735f73746f72655f69647c4e3b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d6572726f727c733a36323a225265676973746572206973206e6f74206f70656e65642c20706c65617365206f70656e2072656769737465722077697468206361736820696e2068616e64223b),
('me21ts9940pdgtjef33f178l3891va3m', '::1', 1491555978, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439313535353935353b6964656e746974797c733a31353a2261646d696e4069776176652e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4069776176652e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32343a22546875203235204a756e20323031352031303a323920414d223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343931353530373539223b6c6173745f69707c733a333a223a3a31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c693a313b6861735f73746f72655f69647c4e3b),
('uc0p7e48j4pce0kvml6b2loh6k5pnlej', '::1', 1491539181, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439313533393132383b6964656e746974797c733a31353a2261646d696e4069776176652e636f6d223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4069776176652e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32343a22546875203235204a756e20323031352031303a323920414d223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343931353337313330223b6c6173745f69707c733a333a223a3a31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c693a313b6861735f73746f72655f69647c4e3b6d6573736761657c733a32383a224461746162617365207375636365737366756c6c792073617665642e223b5f5f63695f766172737c613a313a7b733a373a226d657373676165223b733a333a226f6c64223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `tec_settings`
--

CREATE TABLE IF NOT EXISTS `tec_settings` (
  `setting_id` int(1) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `site_name` varchar(55) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `dateformat` varchar(20) DEFAULT NULL,
  `timeformat` varchar(20) DEFAULT NULL,
  `default_email` varchar(100) NOT NULL,
  `language` varchar(20) NOT NULL,
  `version` varchar(5) NOT NULL DEFAULT '1.0',
  `theme` varchar(20) NOT NULL,
  `timezone` varchar(255) NOT NULL DEFAULT '0',
  `protocol` varchar(20) NOT NULL DEFAULT 'mail',
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_user` varchar(100) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(10) DEFAULT '25',
  `smtp_crypto` varchar(5) DEFAULT NULL,
  `mmode` tinyint(1) NOT NULL,
  `captcha` tinyint(1) NOT NULL DEFAULT '1',
  `mailpath` varchar(55) DEFAULT NULL,
  `currency_prefix` varchar(3) NOT NULL,
  `default_customer` int(11) NOT NULL,
  `default_tax_rate` varchar(20) NOT NULL,
  `rows_per_page` int(2) NOT NULL,
  `total_rows` int(2) NOT NULL,
  `header` varchar(1000) NOT NULL,
  `footer` varchar(1000) NOT NULL,
  `bsty` tinyint(4) NOT NULL,
  `display_kb` tinyint(4) NOT NULL,
  `default_category` int(11) NOT NULL,
  `default_discount` varchar(20) NOT NULL,
  `item_addition` tinyint(1) NOT NULL,
  `barcode_symbology` varchar(55) NOT NULL,
  `pro_limit` tinyint(4) NOT NULL,
  `decimals` tinyint(1) NOT NULL DEFAULT '2',
  `thousands_sep` varchar(2) NOT NULL DEFAULT ',',
  `decimals_sep` varchar(2) NOT NULL DEFAULT '.',
  `focus_add_item` varchar(55) DEFAULT NULL,
  `add_customer` varchar(55) DEFAULT NULL,
  `toggle_category_slider` varchar(55) DEFAULT NULL,
  `cancel_sale` varchar(55) DEFAULT NULL,
  `suspend_sale` varchar(55) DEFAULT NULL,
  `print_order` varchar(55) DEFAULT NULL,
  `print_bill` varchar(55) DEFAULT NULL,
  `finalize_sale` varchar(55) DEFAULT NULL,
  `today_sale` varchar(55) DEFAULT NULL,
  `open_hold_bills` varchar(55) DEFAULT NULL,
  `close_register` varchar(55) DEFAULT NULL,
  `java_applet` tinyint(1) NOT NULL,
  `receipt_printer` varchar(55) DEFAULT NULL,
  `pos_printers` varchar(255) DEFAULT NULL,
  `cash_drawer_codes` varchar(55) DEFAULT NULL,
  `char_per_line` tinyint(4) DEFAULT '42',
  `rounding` tinyint(1) DEFAULT '0',
  `pin_code` varchar(20) DEFAULT NULL,
  `stripe` tinyint(1) DEFAULT NULL,
  `stripe_secret_key` varchar(100) DEFAULT NULL,
  `stripe_publishable_key` varchar(100) DEFAULT NULL,
  `purchase_code` varchar(100) DEFAULT NULL,
  `envato_username` varchar(50) DEFAULT NULL,
  `theme_style` varchar(25) DEFAULT 'green',
  `after_sale_page` tinyint(1) DEFAULT NULL,
  `overselling` tinyint(1) DEFAULT '1',
  `multi_store` tinyint(1) DEFAULT NULL,
  `qty_decimals` tinyint(1) DEFAULT '2',
  `symbol` varchar(55) DEFAULT NULL,
  `sac` tinyint(1) DEFAULT '0',
  `display_symbol` tinyint(1) DEFAULT NULL,
  `remote_printing` tinyint(1) DEFAULT '1',
  `printer` int(11) DEFAULT NULL,
  `order_printers` varchar(55) DEFAULT NULL,
  `auto_print` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tec_settings`
--

INSERT INTO `tec_settings` (`setting_id`, `logo`, `site_name`, `tel`, `dateformat`, `timeformat`, `default_email`, `language`, `version`, `theme`, `timezone`, `protocol`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `smtp_crypto`, `mmode`, `captcha`, `mailpath`, `currency_prefix`, `default_customer`, `default_tax_rate`, `rows_per_page`, `total_rows`, `header`, `footer`, `bsty`, `display_kb`, `default_category`, `default_discount`, `item_addition`, `barcode_symbology`, `pro_limit`, `decimals`, `thousands_sep`, `decimals_sep`, `focus_add_item`, `add_customer`, `toggle_category_slider`, `cancel_sale`, `suspend_sale`, `print_order`, `print_bill`, `finalize_sale`, `today_sale`, `open_hold_bills`, `close_register`, `java_applet`, `receipt_printer`, `pos_printers`, `cash_drawer_codes`, `char_per_line`, `rounding`, `pin_code`, `stripe`, `stripe_secret_key`, `stripe_publishable_key`, `purchase_code`, `envato_username`, `theme_style`, `after_sale_page`, `overselling`, `multi_store`, `qty_decimals`, `symbol`, `sac`, `display_symbol`, `remote_printing`, `printer`, `order_printers`, `auto_print`) VALUES
(1, 'logo1.png', 'iWavePOS', '0105292122', 'D j M Y', 'h:i A', 'noreply@spos.abc.my', 'english', '4.0.7', 'default', 'Asia/Rangoon', 'mail', 'pop.gmail.com', 'noreply@spos.abc.my', '', '25', '', 0, 0, NULL, 'MMK', 1, '5%', 10, 30, '', '', 1, 0, 0, '0', 1, '', 25, 0, ',', '.', 'ALT+F1', 'ALT+F2', 'ALT+F10', 'ALT+F5', 'ALT+F6', 'ALT+F11', 'ALT+F12', 'ALT+F8', 'Ctrl+F1', 'Ctrl+F2', 'ALT+F7', 0, '', '', '', 42, 0, '2122', 1, 'sk_test_jHf4cEzAYtgcXvgWPCsQAn50', 'pk_test_beat8SWPORb0OVdF2H77A7uG', '5423452435245', 'lol', 'blue', 0, 1, 0, 0, '', 0, 0, 1, NULL, 'null', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tec_stores`
--

CREATE TABLE IF NOT EXISTS `tec_stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `receipt_footer` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tec_stores`
--

INSERT INTO `tec_stores` (`id`, `name`, `code`, `logo`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `postal_code`, `country`, `currency_code`, `receipt_header`, `receipt_footer`) VALUES
(1, 'ရာျပည့္စာအုပ္တုိက္', 'YS', '488e348c490cc47c8ce48583bb349568.jpg', 'store@abc.com', '012345678', 'Address Line 1', '', 'အထက္ပန္းဆိုးတန္းလမ္း', '', '46000', 'Myanmar', 'MYR', '', 'ေက်းဇူးတင္ပါသည္။');

-- --------------------------------------------------------

--
-- Table structure for table `tec_suppliers`
--

CREATE TABLE IF NOT EXISTS `tec_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `cf1` varchar(255) NOT NULL,
  `cf2` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_suspended_items`
--

CREATE TABLE IF NOT EXISTS `tec_suspended_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suspend_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `net_unit_price` decimal(25,2) NOT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `item_discount` decimal(25,2) DEFAULT NULL,
  `tax` int(20) DEFAULT NULL,
  `item_tax` decimal(25,2) DEFAULT NULL,
  `subtotal` decimal(25,2) NOT NULL,
  `real_unit_price` decimal(25,2) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_suspended_sales`
--

CREATE TABLE IF NOT EXISTS `tec_suspended_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `total` decimal(25,2) NOT NULL,
  `product_discount` decimal(25,2) DEFAULT NULL,
  `order_discount_id` varchar(20) DEFAULT NULL,
  `order_discount` decimal(25,2) DEFAULT NULL,
  `total_discount` decimal(25,2) DEFAULT NULL,
  `product_tax` decimal(25,2) DEFAULT NULL,
  `order_tax_id` varchar(20) DEFAULT NULL,
  `order_tax` decimal(25,2) DEFAULT NULL,
  `total_tax` decimal(25,2) DEFAULT NULL,
  `grand_total` decimal(25,2) NOT NULL,
  `total_items` int(11) DEFAULT NULL,
  `total_quantity` decimal(15,2) DEFAULT NULL,
  `paid` decimal(25,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `hold_ref` varchar(255) DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tec_users`
--

CREATE TABLE IF NOT EXISTS `tec_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `last_ip_address` varbinary(45) DEFAULT NULL,
  `ip_address` varbinary(45) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(55) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `group_id` int(11) unsigned NOT NULL DEFAULT '2',
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tec_users`
--

INSERT INTO `tec_users` (`id`, `last_ip_address`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `avatar`, `gender`, `group_id`, `store_id`) VALUES
(1, '::1', '127.0.0.1', 'admin', 'fe941d48eb1fbce34b4588ae500861570fb0e398', NULL, 'admin@iwave.com', NULL, NULL, NULL, 'b2d2c8fd5d9a5f19901279ac74cec92dc15ac970', 1435204774, 1502080968, 1, 'Admin', 'Admin', 'Tecdiary', '012345678', NULL, 'male', 1, 1),
(2, '::1', '::1', 'staff@innowave.com', '2654fd92cac4cfa79962a395a20c0f05ae4ef238', NULL, 'staff@innowave.com', NULL, NULL, NULL, NULL, 1488354879, 1488354893, 1, 'mg', 'Staff', NULL, '453453', NULL, 'male', 3, 1),
(3, NULL, '::1', '', 'ec92f2a70928b8c0d666fdfbcaba73ccbd978d6a', NULL, 'manager@iwave.com', NULL, NULL, NULL, NULL, 1502081038, 1502081038, 1, 'Super ', 'Manager', NULL, '9', NULL, 'male', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tec_user_logins`
--

CREATE TABLE IF NOT EXISTS `tec_user_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `tec_user_logins`
--

INSERT INTO `tec_user_logins` (`id`, `user_id`, `company_id`, `ip_address`, `login`, `time`) VALUES
(1, 1, NULL, '::1', 'admin@tecdiary.com', '2017-01-28 10:39:55'),
(2, 1, NULL, '::1', 'admin@tecdiary.com', '2017-01-31 06:26:14'),
(3, 1, NULL, '::1', 'admin@tecdiary.com', '2017-01-31 09:51:16'),
(4, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-01 10:32:31'),
(5, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-01 11:22:00'),
(6, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-02 06:14:38'),
(7, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-02 07:16:13'),
(8, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-02 08:50:55'),
(9, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-02 08:55:47'),
(10, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-07 11:02:53'),
(11, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-08 07:51:51'),
(12, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-09 09:53:52'),
(13, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-10 06:22:02'),
(14, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-18 06:12:11'),
(15, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-18 09:00:23'),
(16, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-18 09:05:46'),
(17, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-21 10:14:42'),
(18, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-22 06:54:05'),
(19, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-22 08:39:15'),
(20, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-23 07:26:57'),
(21, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-24 11:01:09'),
(22, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-24 18:55:27'),
(23, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-25 03:02:52'),
(24, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-25 03:12:15'),
(25, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-25 03:39:55'),
(26, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-27 09:05:26'),
(27, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-27 09:32:33'),
(28, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-28 04:13:06'),
(29, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-28 04:53:48'),
(30, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-28 05:48:42'),
(31, 1, NULL, '::1', 'admin@tecdiary.com', '2017-02-28 14:33:25'),
(32, 1, NULL, '::1', 'admin@tecdiary.com', '2017-03-01 03:49:27'),
(33, 1, NULL, '::1', 'admin@tecdiary.com', '2017-03-01 06:57:43'),
(34, 2, NULL, '::1', 'staff@innowave.com', '2017-03-01 07:54:53'),
(35, 1, NULL, '::1', 'admin@tecdiary.com', '2017-03-01 08:06:05'),
(36, 1, NULL, '::1', 'admin@tecdiary.com', '2017-03-03 04:31:08'),
(37, 1, NULL, '::1', 'admin@tecdiary.com', '2017-03-03 08:05:14'),
(38, 1, NULL, '::1', 'admin@tecdiary.com', '2017-03-03 09:08:34'),
(39, 1, NULL, '::1', 'admin@iwave.com', '2017-03-08 05:35:54'),
(40, 1, NULL, '::1', 'admin@iwave.com', '2017-03-08 06:29:06'),
(41, 1, NULL, '::1', 'admin@iwave.com', '2017-03-09 05:25:31'),
(42, 1, NULL, '::1', 'admin@iwave.com', '2017-03-10 03:42:24'),
(43, 1, NULL, '::1', 'admin@iwave.com', '2017-03-10 08:58:16'),
(44, 1, NULL, '::1', 'admin@iwave.com', '2017-03-23 03:28:59'),
(45, 1, NULL, '::1', 'admin@iwave.com', '2017-03-28 03:24:23'),
(46, 1, NULL, '::1', 'admin@iwave.com', '2017-03-28 03:26:15'),
(47, 1, NULL, '::1', 'admin@iwave.com', '2017-03-28 07:44:52'),
(48, 1, NULL, '::1', 'admin@iwave.com', '2017-04-07 03:52:10'),
(49, 1, NULL, '::1', 'admin@iwave.com', '2017-04-07 04:25:40'),
(50, 1, NULL, '::1', 'admin@iwave.com', '2017-04-07 07:39:19'),
(51, 1, NULL, '::1', 'admin@iwave.com', '2017-04-07 09:06:06'),
(52, 1, NULL, '::1', 'admin@iwave.com', '2017-04-18 06:22:37'),
(53, 1, NULL, '::1', 'admin@iwave.com', '2017-04-21 08:32:16'),
(54, 1, NULL, '::1', 'admin@iwave.com', '2017-04-21 08:36:12'),
(55, 1, NULL, '::1', 'admin@iwave.com', '2017-04-27 07:10:19'),
(56, 1, NULL, '::1', 'admin@iwave.com', '2017-07-07 16:28:11'),
(57, 1, NULL, '::1', 'admin@iwave.com', '2017-08-07 04:23:49'),
(58, 1, NULL, '::1', 'admin@iwave.com', '2017-08-07 04:42:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
