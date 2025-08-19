-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2025 at 03:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `category_code` varchar(50) DEFAULT NULL,
  `category_dsc` varchar(255) DEFAULT NULL,
  `category_image` varchar(50) DEFAULT NULL,
  `category_status` tinyint(1) DEFAULT NULL,
  `category_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_code`, `category_dsc`, `category_image`, `category_status`, `category_created_date`) VALUES
(53, 'សម្ភារៈកសិកម្ម', 'C-00001', '', 'img-2516632.png', 1, '2024-02-28 15:57:17'),
(54, 'សម្ភារៈអគា៍', 'C-00054', '', 'img-repair-tools.png', 1, '2024-02-28 15:57:56'),
(55, 'សម្ភារៈផ្ទះបាយ', 'C-00055', '', 'img-4490482.png', 1, '2024-02-28 15:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` int(5) NOT NULL,
  `item_categoryid` int(5) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `item_retailprice` decimal(10,0) NOT NULL,
  `item_wholesaleprice` decimal(10,0) NOT NULL,
  `item_dsc` varchar(255) DEFAULT NULL,
  `item_image` varchar(50) NOT NULL,
  `item_status` tinyint(1) DEFAULT NULL,
  `item_created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `item_categoryid`, `item_name`, `item_code`, `item_retailprice`, `item_wholesaleprice`, `item_dsc`, `item_image`, `item_status`, `item_created_date`) VALUES
(101, 55, 'ចានបាយ', 'I-00001', 1000, 10000, '', 'img-ចានបាយ.jpg', 1, '2024-02-28'),
(102, 54, 'អំពូលភ្លើង', 'I-00102', 1000, 10000, '', 'img-img-11.jpg', 1, '2024-02-28'),
(103, 54, 'ដៃទ្វា', 'I-00103', 1000, 10000, '', 'img-ដៃទ្វា.jpg', 1, '2024-02-28'),
(104, 54, 'កាំមេរា', 'I-00104', 300, 3000, '', 'img-img-2.jpg', 1, '2024-02-28'),
(105, 54, 'ខ្សែភ្លើង', 'I-00105', 1200, 12000, '', 'img-11.jpg', 1, '2024-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `location_id` int(5) NOT NULL,
  `location_name` varchar(50) DEFAULT NULL,
  `location_dsc` varchar(255) NOT NULL,
  `location_type` tinyint(1) DEFAULT NULL,
  `location_status` tinyint(1) NOT NULL,
  `location_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`location_id`, `location_name`, `location_dsc`, `location_type`, `location_status`, `location_date`) VALUES
(27, 'ឃ្លាំងទី​១', 'នៅអាគ៍ាខាងប្រុស', 0, 1, '2024-02-29'),
(28, 'ឃ្លាំងទី​២', 'នៅអាគ៍ាខាងប្រុស', 0, 1, '2024-02-29'),
(29, 'អាគ៍ាទី១', 'នៅអាគ៍ាខាងប្រុស', 1, 1, '2024-02-29'),
(30, 'អាគ៍ាទី២', 'នៅអាគ៍ាខាងប្រុស', 1, 1, '2024-02-29'),
(31, 'អាគ៍ាទី៣', 'នៅអាគ៍ាខាងប្រុស', 1, 1, '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `or_id` int(5) NOT NULL,
  `or_code` varchar(50) DEFAULT NULL,
  `or_supplier_id` int(5) DEFAULT NULL,
  `or_buyer_id` int(5) DEFAULT NULL,
  `or_receive` tinyint(1) DEFAULT NULL,
  `or_status` tinyint(1) DEFAULT NULL,
  `or_draft` tinyint(1) DEFAULT NULL,
  `or_created_date` date DEFAULT NULL,
  `or_expected_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`or_id`, `or_code`, `or_supplier_id`, `or_buyer_id`, `or_receive`, `or_status`, `or_draft`, `or_created_date`, `or_expected_date`) VALUES
(259, 'PO-0010', 20, 202, 2, 1, 1, '2024-03-01', '2024-03-01'),
(260, 'PO-0011', 20, 200, 1, 1, 1, '2024-03-02', '2024-03-02'),
(261, 'PO-0012', 20, 200, 1, 1, 1, '2024-03-03', '2024-03-03'),
(262, 'PO-0013', 20, 200, 2, 1, 1, '2024-03-04', '2024-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `ord_id` int(5) NOT NULL,
  `ord_orid` int(5) NOT NULL,
  `ord_orcode` varchar(50) DEFAULT NULL,
  `ord_item_id` int(5) DEFAULT NULL,
  `ord_locationid` int(5) DEFAULT NULL,
  `ord_price` decimal(10,2) DEFAULT NULL,
  `ord_quantity` int(5) DEFAULT NULL,
  `ord_unit` varchar(50) NOT NULL,
  `ord_amount` decimal(10,2) DEFAULT NULL,
  `ord_gets` int(5) DEFAULT NULL,
  `ord_remarks` varchar(50) DEFAULT NULL,
  `ord_created_date` date DEFAULT NULL,
  `ord_expected_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`ord_id`, `ord_orid`, `ord_orcode`, `ord_item_id`, `ord_locationid`, `ord_price`, `ord_quantity`, `ord_unit`, `ord_amount`, `ord_gets`, `ord_remarks`, `ord_created_date`, `ord_expected_date`) VALUES
(463, 259, 'PO-0010', 104, 27, 300.00, 10, '10 ឯកតា', 13000.00, 10, '', '2024-03-01', '2024-03-01'),
(464, 259, 'PO-0010', 103, 27, 1000.00, 10, '10 ឯកតា', 13000.00, 10, '', '2024-03-01', '2024-03-01'),
(465, 260, 'PO-0011', 104, 27, 300.00, 4, '4 ដើម', 13200.00, 4, '', '2024-03-02', '2024-03-03'),
(466, 260, 'PO-0011', 101, 27, 1000.00, 12, '12', 13200.00, 7, '', '2024-03-02', '2024-03-03'),
(467, 261, 'PO-0012', 103, 27, 1000.00, 12, '12', 24000.00, 5, '', '2024-03-03', '2024-03-03'),
(468, 261, 'PO-0012', 102, 27, 1000.00, 12, '12', 24000.00, 5, '', '2024-03-03', '2024-03-03'),
(469, 262, 'PO-0013', 104, 27, 300.00, 12, '12 ឯកតា', 3600.00, 12, '', '2024-03-04', '2025-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `pms_id` int(5) NOT NULL,
  `pms_userid` int(5) DEFAULT NULL,
  `pms_purchases` tinyint(1) DEFAULT 0,
  `pms_request` tinyint(1) DEFAULT 0,
  `pms_stocks` tinyint(1) DEFAULT 0,
  `pms_assign` tinyint(1) DEFAULT 0,
  `pms_reprts` tinyint(1) DEFAULT 0,
  `pms_category` tinyint(1) DEFAULT 0,
  `pms_item` tinyint(1) DEFAULT 0,
  `pms_approver` tinyint(1) DEFAULT 0,
  `pms_user` tinyint(1) DEFAULT 0,
  `pms_supplies` tinyint(1) DEFAULT 0,
  `souto_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`pms_id`, `pms_userid`, `pms_purchases`, `pms_request`, `pms_stocks`, `pms_assign`, `pms_reprts`, `pms_category`, `pms_item`, `pms_approver`, `pms_user`, `pms_supplies`, `souto_created_date`) VALUES
(4, 199, 1, 1, 1, 0, 1, 1, 1, 0, 0, 1, '2024-01-30 15:17:23'),
(5, 200, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2024-01-30 20:03:22'),
(6, 201, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2024-01-30 20:18:41'),
(7, 202, 1, 0, 1, 0, 0, 1, 1, 1, 0, 1, '2024-01-31 22:10:47'),
(8, 203, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, '2024-02-01 08:34:51'),
(9, 204, 1, 0, 1, 0, 0, 1, 1, 1, 0, 1, '2024-02-01 08:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produce`
--

CREATE TABLE `tbl_produce` (
  `pro_id` int(5) NOT NULL,
  `pro_spid` int(5) DEFAULT NULL,
  `pro_itemid` int(5) DEFAULT NULL,
  `pro_status` tinyint(1) NOT NULL,
  `pro_created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_produce`
--

INSERT INTO `tbl_produce` (`pro_id`, `pro_spid`, `pro_itemid`, `pro_status`, `pro_created_date`) VALUES
(117, 20, 104, 0, '2024-02-29'),
(118, 20, 101, 0, '2024-02-29'),
(119, 20, 103, 0, '2024-02-29'),
(120, 20, 102, 0, '2024-02-29'),
(121, 21, 102, 0, '2024-03-01'),
(122, 21, 103, 0, '2024-03-01'),
(123, 21, 101, 0, '2024-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receiving`
--

CREATE TABLE `tbl_receiving` (
  `rv_id` int(5) NOT NULL,
  `rv_rqdcode_detail` varchar(50) DEFAULT NULL,
  `rv_code` varchar(50) DEFAULT NULL,
  `rv_items` int(5) DEFAULT NULL,
  `rv_status` tinyint(1) DEFAULT NULL,
  `rv_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receiving_detail`
--

CREATE TABLE `tbl_receiving_detail` (
  `rvd_id` int(5) NOT NULL,
  `rvd_rvcode_detail` varchar(50) DEFAULT NULL,
  `rvd_gets` int(5) DEFAULT NULL,
  `rvd_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `rq_id` int(5) NOT NULL,
  `rq_code` varchar(50) DEFAULT NULL,
  `rq_categoryid` int(5) DEFAULT NULL,
  `rq_from` varchar(50) DEFAULT NULL,
  `rq_items` int(5) DEFAULT NULL,
  `rq_status` tinyint(1) DEFAULT NULL,
  `rq_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_detail`
--

CREATE TABLE `tbl_request_detail` (
  `rqd_id` int(5) NOT NULL,
  `rqd_itemid` int(5) DEFAULT NULL,
  `rqd_code_detail` varchar(50) DEFAULT NULL,
  `rqd_unit_price` decimal(10,2) DEFAULT NULL,
  `rqd_quantity` int(5) DEFAULT NULL,
  `rqd_gets` int(5) DEFAULT NULL,
  `rqd_amount` decimal(10,2) DEFAULT NULL,
  `rqd_remarks` varchar(255) DEFAULT NULL,
  `rqd_userid` int(5) DEFAULT NULL,
  `rqd_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stocks`
--

CREATE TABLE `tbl_stocks` (
  `stock_id` int(5) NOT NULL,
  `stock_itemid` int(5) NOT NULL,
  `stock_locationid` int(5) DEFAULT NULL,
  `stock_itemavailable` int(5) DEFAULT NULL,
  `stock_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stocks`
--

INSERT INTO `tbl_stocks` (`stock_id`, `stock_itemid`, `stock_locationid`, `stock_itemavailable`, `stock_date`) VALUES
(75, 101, 27, 45, '2024-02-29'),
(76, 101, 28, 17, '2024-02-29'),
(77, 102, 27, 17, '2024-02-29'),
(78, 102, 28, 0, '2024-02-29'),
(79, 103, 27, 33, '2024-02-29'),
(80, 103, 28, 3, '2024-02-29'),
(81, 104, 27, 76, '2024-02-29'),
(82, 104, 28, 11, '2024-02-29'),
(83, 105, 27, 0, '2024-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_in`
--

CREATE TABLE `tbl_stock_in` (
  `sin_id` int(5) NOT NULL,
  `sin_codepo` varchar(50) DEFAULT NULL,
  `sin_buyerid` int(5) NOT NULL,
  `sin_itemid` int(5) NOT NULL,
  `sin_locationid` int(5) NOT NULL,
  `sin_quantity` int(5) DEFAULT NULL,
  `sin_amount` int(5) DEFAULT NULL,
  `sin_remarks` varchar(255) DEFAULT NULL,
  `sin_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock_in`
--

INSERT INTO `tbl_stock_in` (`sin_id`, `sin_codepo`, `sin_buyerid`, `sin_itemid`, `sin_locationid`, `sin_quantity`, `sin_amount`, `sin_remarks`, `sin_date`) VALUES
(76, 'PO-0011', 200, 104, 27, 2, 300, '', '2024-03-02'),
(77, 'PO-0011', 200, 101, 27, 5, 1000, '', '2024-03-02'),
(78, 'PO-0011', 200, 104, 27, 1, 300, '', '2024-03-02'),
(79, 'PO-0011', 200, 101, 27, 1, 1000, '', '2024-03-02'),
(80, 'PO-0012', 200, 103, 27, 5, 1000, '', '2024-03-03'),
(81, 'PO-0012', 200, 102, 27, 5, 1000, '', '2024-03-03'),
(82, 'PO-0011', 200, 104, 27, 1, 300, '', '2024-03-03'),
(83, 'PO-0011', 200, 101, 27, 1, 1000, '', '2024-03-03'),
(84, 'PO-0013', 199, 104, 27, 12, 300, '', '2025-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_out`
--

CREATE TABLE `tbl_stock_out` (
  `sou_id` int(5) NOT NULL,
  `sou_code` varchar(50) DEFAULT NULL,
  `sou_cutbyid` int(5) DEFAULT NULL,
  `sou_user` varchar(50) DEFAULT NULL,
  `sou_drafs` tinyint(1) DEFAULT NULL,
  `sou_status` tinyint(1) DEFAULT NULL,
  `sou_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock_out`
--

INSERT INTO `tbl_stock_out` (`sou_id`, `sou_code`, `sou_cutbyid`, `sou_user`, `sou_drafs`, `sou_status`, `sou_created_date`) VALUES
(4, 'PO-001', 200, 'KOL SOKEA', 0, 1, '2024-03-03 00:00:00'),
(5, 'PO-002', 200, 'KOL SOKEA', 0, 1, '2024-03-03 00:00:00'),
(6, 'PO-003', 200, 'Kol Sokea', 0, 1, '2024-03-03 00:00:00'),
(7, 'PO-004', 200, 'Kol Sokea', 0, 1, '2024-03-03 00:00:00'),
(8, 'PO-005', 200, 'Kol Sokea', 0, 1, '2024-03-03 00:00:00'),
(9, 'PO-006', 200, 'Kol Sokea', 1, 1, '2024-03-03 00:00:00'),
(10, 'PO-007', 200, 'អាគ៍ាទី១', 0, 1, '2024-03-03 00:00:00'),
(11, 'PO-008', 200, 'អាគ៍ាទី១', 0, 1, '2024-03-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_out_detail`
--

CREATE TABLE `tbl_stock_out_detail` (
  `soud_id` int(5) NOT NULL,
  `soud_souid` int(5) DEFAULT NULL,
  `soud_code` varchar(50) DEFAULT NULL,
  `soud_fromlocation` int(5) DEFAULT NULL,
  `soud_uselocation` varchar(50) DEFAULT NULL,
  `soud_itemid` int(5) DEFAULT NULL,
  `soud_quantity` int(5) DEFAULT NULL,
  `soud_price` decimal(10,2) DEFAULT NULL,
  `soud_amount` decimal(10,2) DEFAULT NULL,
  `soud_remarks` varchar(255) DEFAULT NULL,
  `soud_created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock_out_detail`
--

INSERT INTO `tbl_stock_out_detail` (`soud_id`, `soud_souid`, `soud_code`, `soud_fromlocation`, `soud_uselocation`, `soud_itemid`, `soud_quantity`, `soud_price`, `soud_amount`, `soud_remarks`, `soud_created_date`) VALUES
(8, 4, 'PO-004', 27, 'Kol Sokea', 102, 12, 1000.00, 12000.00, '', '2024-03-03'),
(9, 5, 'PO-005', 27, 'Kol Sokea', 102, 12, 1000.00, 24000.00, '', '2024-03-03'),
(10, 5, 'PO-006', 27, 'Kol Sokea', 101, 12, 1000.00, 24000.00, '', '2024-03-03'),
(11, 6, 'PO-006', 27, 'Kol Sokea', 101, 12, 1000.00, 24000.00, 'fffffff', '2024-03-03'),
(12, 6, 'PO-007', 27, 'Kol Sokea', 102, 12, 1000.00, 24000.00, 'fffffff', '2024-03-03'),
(13, 7, 'PO-007', 28, 'អាគ៍ាទី១', 101, 12, 1000.00, 33000.00, 'eeee', '2024-03-03'),
(14, 7, 'PO-008', 28, 'អាគ៍ាទី១', 102, 21, 1000.00, 33000.00, 'eeee', '2024-03-03'),
(15, 8, 'PO-008', 27, 'អាគ៍ាទី១', 101, 12, 1000.00, 24000.00, 'wwww', '2024-03-03'),
(16, 8, 'PO-009', 27, 'អាគ៍ាទី១', 102, 12, 1000.00, 24000.00, 'wwww', '2024-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `student_id` int(5) NOT NULL,
  `student_name` varchar(50) DEFAULT NULL,
  `student_gender` varchar(50) DEFAULT NULL,
  `student_skills` varchar(50) DEFAULT NULL,
  `student_year` int(5) DEFAULT NULL,
  `student_room` varchar(50) DEFAULT NULL,
  `student_date_term` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `sp_id` int(5) NOT NULL,
  `sp_name` varchar(50) DEFAULT NULL,
  `sp_company` varchar(50) DEFAULT NULL,
  `sp_email` varchar(50) DEFAULT NULL,
  `sp_phone` varchar(50) DEFAULT NULL,
  `sp_address` varchar(255) DEFAULT NULL,
  `sp_image` varchar(50) NOT NULL,
  `sp_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`sp_id`, `sp_name`, `sp_company`, `sp_email`, `sp_phone`, `sp_address`, `sp_image`, `sp_created_date`) VALUES
(20, 'គុល សុខគា', 'ក្រុមហ៊ុនលក់សម្ភារៈផ្ទះបាយ', 'keacoding13@gmail.com', '0886230496', 'សាខាខែត្តតាកែវ', 'img-1.jpg', '2024-02-03 23:33:40'),
(21, 'ឆោម នីការ', 'ក្រុមហ៊ុនលក់គ្រឿងអគិ្គសនី', 'keacoding122@gmail.com', '0886230496', 'សាខាខេត្តតាកែវ ស្រុកត្រាំកក់', 'img-6.jpg', '2024-02-03 23:36:37'),
(22, 'យ៉ុង ហ្វាត់', 'ផ្សារខ្មែរ', 'keacoding122@gmail.com', '0972232444', '', 'img-3.jpg', '2024-02-06 08:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `unit_id` int(5) NOT NULL,
  `unit_code` tinyint(1) DEFAULT 0,
  `unit_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`unit_id`, `unit_code`, `unit_name`) VALUES
(1, 0, 'ឯកតា'),
(2, 0, 'កំប៉ុង'),
(3, 0, 'ដើម'),
(4, 0, 'ដប'),
(5, 0, ' មែត្រ'),
(6, 0, 'គីឡូក្រាម'),
(7, 0, 'លីត្រ'),
(8, 0, 'កប្ចប់'),
(9, 0, 'គ្រឿង'),
(10, 1, 'ដុំ'),
(11, 1, 'យួ'),
(12, 1, 'កេះ'),
(13, 1, 'ឡូ'),
(14, 1, 'បាវ'),
(15, 1, 'ធុង'),
(16, 1, 'បាច់'),
(17, 1, 'ប្រអប់');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userprofiles`
--

CREATE TABLE `tbl_userprofiles` (
  `usf_id` int(5) NOT NULL,
  `usf_us_id` int(5) NOT NULL,
  `usf_firstname` varchar(50) DEFAULT NULL,
  `usf_lastname` varchar(50) DEFAULT NULL,
  `usf_gender` int(5) DEFAULT NULL,
  `usf_dob` date DEFAULT NULL,
  `usf_phone` varchar(50) DEFAULT NULL,
  `usf_image` varchar(50) DEFAULT NULL,
  `usf_address` varchar(50) DEFAULT NULL,
  `usf_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userprofiles`
--

INSERT INTO `tbl_userprofiles` (`usf_id`, `usf_us_id`, `usf_firstname`, `usf_lastname`, `usf_gender`, `usf_dob`, `usf_phone`, `usf_image`, `usf_address`, `usf_created_date`) VALUES
(160, 199, '        KOL        ', '        SOKEA        ', 1, '2002-12-07', '        0886230496', 'img-img-1.jpg', 'SDF', '2024-01-30 15:17:23'),
(161, 200, '     Kol     ', '     Sokea     ', 1, '2222-12-12', '     0886230496', 'img-img-1.jpg', 'ddd', '2024-01-30 20:03:22'),
(162, 201, '     Chhom     ', '     Nika     ', 0, '2002-12-07', '     0886230496', 'img-defaultimage.png', 'tk', '2024-01-30 20:18:41'),
(163, 202, 'KolSoea', '', 0, '0000-00-00', '   0972232444១២', 'img-defaultimage.png', 'tk', '2024-01-31 22:10:47'),
(164, 203, ' Moon ', ' Maye ', 1, '0000-00-00', ' 0972232444', 'img-defaultimage.png', 'tk', '2024-02-01 08:34:51'),
(165, 204, 'Moon', 'Maye', 1, '0000-00-00', '0972232444', 'img-defaultimage.png', '55', '2024-02-01 08:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `us_id` int(5) NOT NULL,
  `us_username` varchar(50) DEFAULT NULL,
  `us_email` varchar(50) DEFAULT NULL,
  `us_password` varchar(50) DEFAULT NULL,
  `us_type` tinyint(1) DEFAULT NULL,
  `us_status` tinyint(1) DEFAULT NULL,
  `us_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`us_id`, `us_username`, `us_email`, `us_password`, `us_type`, `us_status`, `us_created_date`) VALUES
(199, 'KOL SOKEA', 'keacoding16@gmail.com', '2222', 2, 1, '2024-01-30 15:17:23'),
(200, 'Kol Sokea', 'keacoding@gmail.com', 'admin', 0, 1, '2024-01-30 20:03:22'),
(201, 'Chhom Nika', 'chhomnika@gmaill.com', '12345', 1, 1, '2024-01-30 20:18:41'),
(202, 'KolSoea ', 'keacoding122@gmail.com', '', 0, 1, '2024-01-31 22:10:47'),
(203, 'Moon Maye', 'keacoding12123@gmail.com', '3333', 2, 1, '2024-02-01 08:34:51'),
(204, 'Moon Maye', 'keacoding12412@gmail.com', '44445', 2, 1, '2024-02-01 08:42:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_categoryid` (`item_categoryid`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `or_supplier_id` (`or_supplier_id`),
  ADD KEY `or_buyer_id` (`or_buyer_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `ord_item_id` (`ord_item_id`),
  ADD KEY `ord_orid` (`ord_orid`),
  ADD KEY `ord_locationid` (`ord_locationid`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`pms_id`),
  ADD KEY `pk` (`pms_id`),
  ADD KEY `unique` (`pms_userid`);

--
-- Indexes for table `tbl_produce`
--
ALTER TABLE `tbl_produce`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `index` (`pro_spid`),
  ADD KEY `unique` (`pro_itemid`);

--
-- Indexes for table `tbl_receiving`
--
ALTER TABLE `tbl_receiving`
  ADD PRIMARY KEY (`rv_id`),
  ADD UNIQUE KEY `rv_code` (`rv_code`),
  ADD KEY `idx_rv_rqdcode_detail` (`rv_rqdcode_detail`);

--
-- Indexes for table `tbl_receiving_detail`
--
ALTER TABLE `tbl_receiving_detail`
  ADD PRIMARY KEY (`rvd_id`),
  ADD KEY `idx_rvd_rvcode_detail` (`rvd_rvcode_detail`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`rq_id`),
  ADD UNIQUE KEY `rq_code` (`rq_code`),
  ADD KEY `rq_categoryid` (`rq_categoryid`);

--
-- Indexes for table `tbl_request_detail`
--
ALTER TABLE `tbl_request_detail`
  ADD PRIMARY KEY (`rqd_id`),
  ADD KEY `idx_request_detail` (`rqd_itemid`,`rqd_code_detail`,`rqd_userid`),
  ADD KEY `rqd_code_detail` (`rqd_code_detail`),
  ADD KEY `rqd_userid` (`rqd_userid`);

--
-- Indexes for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `index` (`stock_locationid`),
  ADD KEY `ilocation_itemid` (`stock_itemid`);

--
-- Indexes for table `tbl_stock_in`
--
ALTER TABLE `tbl_stock_in`
  ADD PRIMARY KEY (`sin_id`),
  ADD KEY `sin_buyer` (`sin_buyerid`,`sin_itemid`),
  ADD KEY `sin_locationid` (`sin_locationid`),
  ADD KEY `sin_itemid` (`sin_itemid`);

--
-- Indexes for table `tbl_stock_out`
--
ALTER TABLE `tbl_stock_out`
  ADD PRIMARY KEY (`sou_id`),
  ADD KEY `sou_cutbyid` (`sou_cutbyid`);

--
-- Indexes for table `tbl_stock_out_detail`
--
ALTER TABLE `tbl_stock_out_detail`
  ADD PRIMARY KEY (`soud_id`),
  ADD KEY `soud_souid` (`soud_souid`),
  ADD KEY `soud_itemid` (`soud_itemid`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `tbl_userprofiles`
--
ALTER TABLE `tbl_userprofiles`
  ADD PRIMARY KEY (`usf_id`),
  ADD UNIQUE KEY `us_id_2` (`usf_us_id`),
  ADD KEY `us_id` (`usf_us_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`us_id`),
  ADD UNIQUE KEY `us_email` (`us_email`,`us_password`),
  ADD UNIQUE KEY `us_password` (`us_password`),
  ADD UNIQUE KEY `us_email_2` (`us_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `location_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `or_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `ord_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `pms_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_produce`
--
ALTER TABLE `tbl_produce`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_receiving`
--
ALTER TABLE `tbl_receiving`
  MODIFY `rv_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_receiving_detail`
--
ALTER TABLE `tbl_receiving_detail`
  MODIFY `rvd_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `rq_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_request_detail`
--
ALTER TABLE `tbl_request_detail`
  MODIFY `rqd_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  MODIFY `stock_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_stock_in`
--
ALTER TABLE `tbl_stock_in`
  MODIFY `sin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_stock_out`
--
ALTER TABLE `tbl_stock_out`
  MODIFY `sou_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_stock_out_detail`
--
ALTER TABLE `tbl_stock_out_detail`
  MODIFY `soud_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  MODIFY `sp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `unit_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_userprofiles`
--
ALTER TABLE `tbl_userprofiles`
  MODIFY `usf_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `us_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD CONSTRAINT `tbl_item_ibfk_1` FOREIGN KEY (`item_categoryid`) REFERENCES `tbl_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`or_supplier_id`) REFERENCES `tbl_suppliers` (`sp_id`),
  ADD CONSTRAINT `tbl_order_ibfk_4` FOREIGN KEY (`or_buyer_id`) REFERENCES `tbl_users` (`us_id`);

--
-- Constraints for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_ibfk_1` FOREIGN KEY (`ord_item_id`) REFERENCES `tbl_item` (`item_id`),
  ADD CONSTRAINT `tbl_order_detail_ibfk_2` FOREIGN KEY (`ord_orid`) REFERENCES `tbl_order` (`or_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_detail_ibfk_3` FOREIGN KEY (`ord_locationid`) REFERENCES `tbl_location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD CONSTRAINT `tbl_permission_ibfk_1` FOREIGN KEY (`pms_userid`) REFERENCES `tbl_users` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_produce`
--
ALTER TABLE `tbl_produce`
  ADD CONSTRAINT `tbl_produce_ibfk_3` FOREIGN KEY (`pro_spid`) REFERENCES `tbl_suppliers` (`sp_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_produce_ibfk_4` FOREIGN KEY (`pro_itemid`) REFERENCES `tbl_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_receiving`
--
ALTER TABLE `tbl_receiving`
  ADD CONSTRAINT `tbl_receiving_ibfk_1` FOREIGN KEY (`rv_rqdcode_detail`) REFERENCES `tbl_request_detail` (`rqd_code_detail`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_receiving_detail`
--
ALTER TABLE `tbl_receiving_detail`
  ADD CONSTRAINT `tbl_receiving_detail_ibfk_1` FOREIGN KEY (`rvd_rvcode_detail`) REFERENCES `tbl_receiving` (`rv_code`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD CONSTRAINT `tbl_request_ibfk_1` FOREIGN KEY (`rq_categoryid`) REFERENCES `tbl_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_request_detail`
--
ALTER TABLE `tbl_request_detail`
  ADD CONSTRAINT `tbl_request_detail_ibfk_1` FOREIGN KEY (`rqd_code_detail`) REFERENCES `tbl_request` (`rq_code`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_request_detail_ibfk_2` FOREIGN KEY (`rqd_itemid`) REFERENCES `tbl_item` (`item_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_request_detail_ibfk_3` FOREIGN KEY (`rqd_userid`) REFERENCES `tbl_users` (`us_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  ADD CONSTRAINT `tbl_stocks_ibfk_2` FOREIGN KEY (`stock_locationid`) REFERENCES `tbl_location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_stocks_ibfk_3` FOREIGN KEY (`stock_itemid`) REFERENCES `tbl_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stock_in`
--
ALTER TABLE `tbl_stock_in`
  ADD CONSTRAINT `tbl_stock_in_ibfk_1` FOREIGN KEY (`sin_locationid`) REFERENCES `tbl_location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_stock_in_ibfk_2` FOREIGN KEY (`sin_buyerid`) REFERENCES `tbl_users` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_stock_in_ibfk_3` FOREIGN KEY (`sin_itemid`) REFERENCES `tbl_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stock_out`
--
ALTER TABLE `tbl_stock_out`
  ADD CONSTRAINT `tbl_stock_out_ibfk_1` FOREIGN KEY (`sou_cutbyid`) REFERENCES `tbl_users` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stock_out_detail`
--
ALTER TABLE `tbl_stock_out_detail`
  ADD CONSTRAINT `tbl_stock_out_detail_ibfk_1` FOREIGN KEY (`soud_souid`) REFERENCES `tbl_stock_out` (`sou_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_userprofiles`
--
ALTER TABLE `tbl_userprofiles`
  ADD CONSTRAINT `tbl_userprofiles_ibfk_1` FOREIGN KEY (`usf_us_id`) REFERENCES `tbl_users` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
