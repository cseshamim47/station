-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2018 at 12:27 AM
-- Server version: 5.6.40
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dotbdsol_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ablstatement`
--

CREATE TABLE `ablstatement` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `stno` int(11) NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distcashnbankpay`
--

CREATE TABLE `distcashnbankpay` (
  `xpaynum` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(6) NOT NULL,
  `stno` int(5) NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xnote` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtype` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xamount` double NOT NULL,
  `xbank` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcost` double NOT NULL DEFAULT '0',
  `xdoctype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xotn` int(11) NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distdelscope`
--

CREATE TABLE `distdelscope` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(6) NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `stno` int(10) NOT NULL DEFAULT '0',
  `xreqdelnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xorg` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xadd1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeladd` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xphone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeltype` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeldocnum` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdelorg` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xremarks` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeltime` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distpaynreq`
--

CREATE TABLE `distpaynreq` (
  `xpaynreqnum` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(6) NOT NULL,
  `stno` int(5) NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xnote` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtype` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xamount` double NOT NULL,
  `xbank` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcost` double NOT NULL DEFAULT '0',
  `xdoctype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xotn` int(11) NOT NULL,
  `xbnkbr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_movement`
--

CREATE TABLE `emp_movement` (
  `xsl` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `bizid` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xdate` datetime NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xln` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xlt` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_movement`
--

INSERT INTO `emp_movement` (`xsl`, `bizid`, `ztime`, `xdate`, `username`, `xterminal`, `xln`, `xlt`) VALUES
(56256, 100, '2018-09-21 09:39:01', '2018-09-21 15:38:54', 'Tajimul', 'T004', '90.420324', '23.7643876');

-- --------------------------------------------------------

--
-- Table structure for table `emp_movement_temp`
--

CREATE TABLE `emp_movement_temp` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `bizid` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xdate` datetime NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xln` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xlt` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_movement_temp`
--

INSERT INTO `emp_movement_temp` (`xsl`, `bizid`, `ztime`, `xdate`, `username`, `xterminal`, `xln`, `xlt`) VALUES
(56255, 100, '2018-08-29 12:29:08', '2018-08-29 18:29:06', 'kamrul', 'T002', '90.3935118', '23.7843263'),
(56256, 100, '2018-09-21 09:39:01', '2018-09-21 15:38:54', 'Tajimul', 'T004', '90.420324', '23.7643876'),
(56040, 100, '2018-08-16 09:38:28', '2018-08-16 15:38:23', 'Rajib', 'T008', '90.394997', '23.7466041');

-- --------------------------------------------------------

--
-- Table structure for table `emp_touch_customer`
--

CREATE TABLE `emp_touch_customer` (
  `xsl` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `bizid` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xdate` datetime NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xcus` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_touch_customer`
--

INSERT INTO `emp_touch_customer` (`xsl`, `bizid`, `ztime`, `xdate`, `username`, `xterminal`, `xcus`, `xstatus`) VALUES
(0, 100, '2018-07-29 04:05:47', '2018-07-29 10:05:45', 'Demo', 'T005', '100000015', 'true'),
(0, 100, '2018-07-29 15:41:52', '2018-07-29 21:41:49', 'Demo', 'T005', '100000016', 'true'),
(0, 100, '2018-07-29 15:41:55', '2018-07-29 21:41:51', 'Demo', 'T005', '100000016', 'true'),
(0, 100, '2018-07-29 15:43:35', '2018-07-29 21:43:29', 'Demo', 'T005', '100000017', 'true'),
(0, 100, '2018-07-29 15:43:36', '2018-07-29 21:43:31', 'Demo', 'T005', '100000017', 'true'),
(0, 100, '2018-07-30 10:04:16', '2018-07-30 16:04:13', 'Demo', 'T005', '100000015', 'true'),
(0, 100, '2018-08-05 07:29:14', '2018-08-05 13:29:11', 'Rajib', 'T008', '100000021', 'true'),
(0, 100, '2018-08-05 07:45:18', '2018-08-05 13:45:15', 'Rajib', 'T008', '100000022', 'true'),
(0, 100, '2018-08-07 10:00:13', '2018-08-07 16:00:08', 'Rajib', 'T008', '100000023', 'true'),
(0, 100, '2018-08-07 11:14:38', '2018-08-07 17:14:37', 'Rajib', 'T008', '100000023', 'true'),
(0, 100, '2018-08-14 04:34:45', '2018-08-14 10:34:39', 'Rajib', 'T008', '100000022', 'true'),
(0, 100, '2018-08-16 09:08:31', '2018-08-16 15:08:25', 'Rajib', 'T008', '100000024', 'true'),
(0, 100, '2018-08-16 09:23:04', '2018-08-16 15:22:59', 'Rajib', 'T008', '100000025', 'true'),
(0, 100, '2018-08-27 10:39:26', '2018-08-27 16:39:24', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-27 10:49:20', '2018-08-27 16:49:18', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-27 11:23:26', '2018-08-27 17:23:22', 'kamrul', 'T002', '100000027', 'true'),
(0, 100, '2018-08-27 11:23:29', '2018-08-27 17:23:22', 'kamrul', 'T002', '100000027', 'true'),
(0, 100, '2018-08-27 11:23:30', '2018-08-27 17:23:24', 'kamrul', 'T002', '100000027', 'true'),
(0, 100, '2018-08-27 11:23:46', '2018-08-27 17:23:42', 'kamrul', 'T002', '100000027', 'true'),
(0, 100, '2018-08-27 11:35:40', '2018-08-27 17:35:37', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-27 11:36:02', '2018-08-27 17:35:59', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-27 11:36:17', '2018-08-27 17:36:14', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-27 11:36:36', '2018-08-27 17:36:34', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-27 11:36:57', '2018-08-27 17:36:54', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-27 11:37:22', '2018-08-27 17:37:20', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-27 11:37:49', '2018-08-27 17:37:47', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-27 11:38:12', '2018-08-27 17:38:10', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-27 11:38:27', '2018-08-27 17:38:25', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-08-28 03:26:33', '2018-08-28 09:26:29', 'kamrul', 'T002', '100000027', 'true'),
(0, 100, '2018-08-28 03:26:46', '2018-08-28 09:26:43', 'kamrul', 'T002', '100000027', 'true'),
(0, 100, '2018-09-11 04:53:33', '2018-09-11 10:53:32', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-09-11 04:53:34', '2018-09-11 10:53:33', 'Tajimul', 'T004', '100000026', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `emp_touch_customer_temp`
--

CREATE TABLE `emp_touch_customer_temp` (
  `xsl` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `bizid` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xdate` datetime NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xcus` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_touch_customer_temp`
--

INSERT INTO `emp_touch_customer_temp` (`xsl`, `bizid`, `ztime`, `xdate`, `username`, `xterminal`, `xcus`, `xstatus`) VALUES
(0, 100, '2018-08-28 03:26:46', '2018-08-28 09:26:43', 'kamrul', 'T002', '100000027', 'true'),
(0, 100, '2018-07-30 10:04:16', '2018-07-30 16:04:13', 'Demo', 'T005', '100000015', 'true'),
(0, 100, '2018-09-11 04:53:34', '2018-09-11 10:53:33', 'Tajimul', 'T004', '100000026', 'true'),
(0, 100, '2018-06-11 18:21:01', '2018-06-12 00:21:00', 'user1', 'T001', '100000013', 'true'),
(0, 100, '2018-08-16 09:23:04', '2018-08-16 15:22:59', 'Rajib', 'T008', '100000025', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `glchart`
--

CREATE TABLE `glchart` (
  `glsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xacc` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacctype` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccusage` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccsource` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacclevel1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacclevel2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacclevel3` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacclevel4` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacclevel5` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxcode` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxcodealt` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `zemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `glchart`
--

INSERT INTO `glchart` (`glsl`, `ztime`, `zutime`, `bizid`, `xacc`, `xdesc`, `xacctype`, `xaccusage`, `xaccsource`, `xacclevel1`, `xacclevel2`, `xacclevel3`, `xacclevel4`, `xacclevel5`, `xtaxcode`, `xtaxcodealt`, `xemail`, `xrecflag`, `zemail`) VALUES
(14, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001', 'Property', 'Asset', 'Ledger', 'Subaccount', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(15, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001.1', 'Office Equipment', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(16, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001.11', 'Office Equipment - Accumulated Depreciation', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(17, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001.2', 'Furniture & Fittings', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(18, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001.21', 'Furniture & Fittings - Accumulated Depreciation', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(19, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001.3', 'Computer', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(20, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001.31', 'Computer - Accumulated Depreciation', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(21, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001.4', 'Motor Vehicle', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(22, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001.41', 'Motor Vehicle - Accumulated Depreciation', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(23, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001.5', 'Software', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(24, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1001.51', 'Software - Accumulated Depreciation', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(27, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1002', 'Renovation', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(1, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1005', 'Inventories', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(2, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1010', 'Trade receivables', 'Asset', 'AR', 'Customer', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(3, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1015', 'Other receivables deposit and prepayment', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(106, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1017', 'HSBC Bank', 'Asset', 'Bank', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(107, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1018', 'CITI Bank', 'Asset', 'Bank', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(4, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1020', 'Fixed deposits with a licensed bank', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(58, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1029', 'Cash', 'Asset', 'Cash', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(5, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '1030', 'Petty cash balances', 'Asset', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(101, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '20001', 'Miscliunous expence', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(104, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '20002', 'Office rent', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(105, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '20003', 'News Paper', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(6, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2001', 'Trade Payables', 'Liability', 'AP', 'Supplier', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(7, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2005', 'Other payable', 'Liability', 'Ledger', 'Subaccount', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(8, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2010', 'Accruals', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(97, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2011', 'Accrud Purchase', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(53, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2012', 'Accrual - PF Contributions', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(9, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2014', 'Accrual - Staff Salaries', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(10, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2015', 'Amount due (from)/ to Director', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(54, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2016', 'Accrual - Others', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(25, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2020', 'Hire purchase creditor', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(11, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2025', 'Taxation payable', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(12, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2026', 'Input Tax', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(13, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2027', 'Output Tax', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(56, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2030', 'Share Capital', 'Liability', 'Ledger', 'Subaccount', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(98, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2035', 'Profit and Loss Appropriation Account', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(26, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '2040', 'Deferred taxation', 'Liability', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(96, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '3001', 'Sales', 'Income', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(89, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '3002', 'Other Income', 'Income', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(90, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '3003', 'Sales Returns', 'Income', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(91, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '3004', 'Sales Incentive', 'Income', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(109, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '3006', 'Sourcing Cost', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(110, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '3007', 'Freight Cost', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(79, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5001', 'Opening inventories', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(80, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5005', 'Purchases', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(238, '2018-03-24 10:25:13', NULL, 100, '5006', 'Purchase Return', 'Expenditure', 'Ledger', 'None', '', '', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dotbdsolutions.com'),
(94, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5009', 'Delivery, Installation & Training Charges', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(81, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5010', 'Transportation', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(82, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5015', 'Rebate', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(92, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5120', 'Commission received', 'Income', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(93, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5121', 'Discount Received', 'Income', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(83, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5130', 'Closing inventories', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(84, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5512', 'PURCHASES-SR', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(85, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5515', 'Purchases Rebates', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(86, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5516', 'Promotion expenses', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(87, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '5517', 'Discount', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(28, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6001', 'Accounting Fee', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(29, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6005', 'Audit Fee', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(111, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6006', 'Custom Duty', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(112, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6007', 'Transport', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(113, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6008', 'CnF Cost', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(114, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6009', 'Bank Charge', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(30, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6010', 'Advertisement and promotion', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(31, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6015', 'Allowance', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(32, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6020', 'Bank Charge', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(33, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6022', 'Cleaning Charges', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(34, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6025', 'Director Remuneration', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(55, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6030', 'Depreciation of property, plant and equipment', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(35, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6035', 'Donation', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(36, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6040', 'Electricity', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(37, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6041', 'Entertainment', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(99, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6042', 'Labor Payment', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(100, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6043', 'Trac Fair', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(38, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6045', 'PF Contribution', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(39, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6046', 'Gift', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(40, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6047', 'Internet Expenses', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(41, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6048', 'Inspection', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(42, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6049', 'Hotel and accomodation', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(43, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6050', 'Legal fees', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(44, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6055', 'License fee', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(45, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6056', 'Subscription fee - Golf', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(46, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6057', 'Medical Expenses', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(47, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6060', 'Roadtax and insurance', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(48, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6065', 'Office maintenance', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(49, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6070', 'Postage and courier', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(50, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6075', 'Printing and stationery', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(51, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6080', 'Professional fee', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(77, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6082', 'Reference Commision Payment', 'Expenditure', 'Ledger', 'Subaccount', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(52, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6085', 'Processing fee', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(95, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6090', 'Petrol, toll and parking', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(57, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6095', 'Quit rent', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(59, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6100', 'Registration fee', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(60, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6105', 'Rental of premises', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(61, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6110', 'Rental of warehouse', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(62, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6115', 'Service tax', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(63, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6120', 'Sales commissions', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(64, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6125', 'Stamp duty', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(65, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6135', 'Sundry expenses', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(66, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6140', 'Secretarial fees', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(67, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6145', 'Staff salaries', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(68, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6146', 'Staff Bonus', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(69, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6150', 'SOCSO contributions', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(70, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6155', 'Staff refreshment', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(103, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6160', 'Telephone and fax charges', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(71, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6161', 'Travelling Expenses', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(72, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6165', 'Tender fee', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(73, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6170', 'Uniform', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(74, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6175', 'Upkeep of motor vehicles', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(75, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6176', 'Upkeep of office', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(76, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6180', 'Water', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(78, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '6181', 'Website Maintenance', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib'),
(88, '2016-11-07 15:49:46', '2016-11-07 10:49:46', 100, '7001', 'Hire purchase interest', 'Expenditure', 'Ledger', 'None', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Live', 'rajib');

-- --------------------------------------------------------

--
-- Table structure for table `glchartsub`
--

CREATE TABLE `glchartsub` (
  `sl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xacc` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xaccsub` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(100) NOT NULL,
  `xrecflag` varchar(20) NOT NULL DEFAULT 'Live',
  `zemail` varchar(100) NOT NULL,
  `xemail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `glchequereg`
--

CREATE TABLE `glchequereg` (
  `xsl` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `bizid` int(5) NOT NULL,
  `xnarration` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xacccr` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xacccrdesc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xacccrtype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xacccrusage` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xacccrsource` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsubcr` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsubdesccr` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xoptype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xchequeno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xchequedate` date DEFAULT NULL,
  `xcleardate` date DEFAULT NULL,
  `xrefno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xacc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccdesc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xacctype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccusage` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsource` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsub` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsubdesc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xprime` double NOT NULL,
  `xsite` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xcur` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `glchequereg`
--

INSERT INTO `glchequereg` (`xsl`, `ztime`, `zutime`, `zemail`, `xdate`, `bizid`, `xnarration`, `xacccr`, `xacccrdesc`, `xacccrtype`, `xacccrusage`, `xacccrsource`, `xaccsubcr`, `xaccsubdesccr`, `xoptype`, `xchequeno`, `xchequedate`, `xcleardate`, `xrefno`, `xstatus`, `xacc`, `xaccdesc`, `xacctype`, `xaccusage`, `xaccsource`, `xaccsub`, `xaccsubdesc`, `xprime`, `xsite`, `xbranch`, `xcur`, `xvoucher`) VALUES
(19, '2018-04-07 12:19:18', NULL, 'rajib@dotbdsolutions.com', '2018-04-07', 100, 'TEst', '1018', 'CITI Bank', 'Asset', 'Bank', 'None', '', '', 'Payment', '3242', '2018-04-07', NULL, NULL, 'Cleared', '20002', 'Office rent', 'Expenditure', 'Ledger', 'None', '', '', 20000, '', 'Head Office', 'BDT', 'CLPA000001'),
(20, '2018-08-26 12:00:51', NULL, 'admin@demo.com', '2018-08-26', 100, '', '1010', 'Trade receivables', 'Asset', 'AR', 'Customer', 'CUS0000009', 'Md Rajibul Islam', 'Receive', '525615156156', '2018-08-26', NULL, NULL, 'Cleared', '1018', 'CITI Bank', 'Asset', 'Bank', 'None', '', '', 50000, '', 'Head Office', 'BDT', 'CLRC000001');

-- --------------------------------------------------------

--
-- Table structure for table `gldetail`
--

CREATE TABLE `gldetail` (
  `sl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xvoucher` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(3) NOT NULL,
  `xacc` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xacctype` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccusage` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccsource` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccsub` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdiv` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsec` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xproj` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcur` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbase` double DEFAULT '0',
  `xexch` double NOT NULL DEFAULT '0',
  `xprime` double NOT NULL DEFAULT '0',
  `xcheque` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xchequedate` date DEFAULT NULL,
  `xinvnum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsalesparson` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xflag` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gldetail`
--

INSERT INTO `gldetail` (`sl`, `ztime`, `zutime`, `bizid`, `xvoucher`, `xrow`, `xacc`, `xacctype`, `xaccusage`, `xaccsource`, `xaccsub`, `xdiv`, `xsec`, `xproj`, `xcur`, `xbase`, `xexch`, `xprime`, `xcheque`, `xchequedate`, `xinvnum`, `xsalesparson`, `xflag`) VALUES
(5824, '2018-04-07 12:19:36', NULL, 100, 'CLPA000001', 1, '20002', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 20000, 1, 20000, NULL, NULL, NULL, NULL, 'Debit'),
(5825, '2018-04-07 12:19:36', NULL, 100, 'CLPA000001', 2, '1018', 'Asset', 'Bank', 'None', '', NULL, NULL, NULL, 'BDT', -20000, 1, -20000, NULL, NULL, NULL, NULL, 'Credit'),
(5868, '2018-08-26 12:01:34', NULL, 100, 'CLRC000001', 1, '1018', 'Asset', 'Bank', 'None', '', NULL, NULL, NULL, 'BDT', 50000, 1, 50000, NULL, NULL, NULL, NULL, 'Debit'),
(5869, '2018-08-26 12:01:34', NULL, 100, 'CLRC000001', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000009', NULL, NULL, NULL, 'BDT', -50000, 1, -50000, NULL, NULL, NULL, NULL, 'Credit'),
(5753, '2018-03-24 10:29:06', NULL, 100, 'DORN-000001', 1, '1010', 'Asset', 'AR', 'Customer', 'DIN0000001', NULL, NULL, NULL, 'BDT', -30900, 1, -30900, NULL, NULL, NULL, NULL, 'Credit'),
(5754, '2018-03-24 10:29:06', NULL, 100, 'DORN-000001', 2, '3003', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 30900, 1, 30900, NULL, NULL, NULL, NULL, 'Debit'),
(5793, '2018-04-02 10:26:21', NULL, 100, 'DORN-000002', 1, '1010', 'Asset', 'AR', 'Customer', '100000002', NULL, NULL, NULL, 'BDT', -28400, 1, -28400, NULL, NULL, NULL, NULL, 'Credit'),
(5794, '2018-04-02 10:26:21', NULL, 100, 'DORN-000002', 2, '3003', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 28400, 1, 28400, NULL, NULL, NULL, NULL, 'Debit'),
(5747, '2018-03-24 09:11:46', NULL, 100, 'DOVU639-000001', 1, '1010', 'Asset', 'AR', 'Customer', 'DIN0000001', NULL, NULL, NULL, 'BDT', 61800, 1, 61800, NULL, NULL, NULL, NULL, 'Debit'),
(5748, '2018-03-24 09:11:46', NULL, 100, 'DOVU639-000001', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -61800, 1, -61800, NULL, NULL, NULL, NULL, 'Credit'),
(5799, '2018-04-05 06:06:16', NULL, 100, 'DOVU639-000001', 3, '6046', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -700, 1, -700, NULL, NULL, NULL, NULL, 'Credit'),
(5759, '2018-03-25 05:38:24', NULL, 100, 'DOVU639-000002', 1, '1010', 'Asset', 'AR', 'Customer', 'DIN0000001', NULL, NULL, NULL, 'BDT', 525000, 1, 525000, NULL, NULL, NULL, NULL, 'Debit'),
(5760, '2018-03-25 05:38:24', NULL, 100, 'DOVU639-000002', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -525000, 1, -525000, NULL, NULL, NULL, NULL, 'Credit'),
(5785, '2018-04-01 09:37:29', NULL, 100, 'DOVU639-000003', 1, '1010', 'Asset', 'AR', 'Customer', 'DIN0000001', NULL, NULL, NULL, 'BDT', 284000, 1, 284000, NULL, NULL, NULL, NULL, 'Debit'),
(5786, '2018-04-01 09:37:29', NULL, 100, 'DOVU639-000003', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -284000, 1, -284000, NULL, NULL, NULL, NULL, 'Credit'),
(5787, '2018-04-01 13:42:39', NULL, 100, 'DOVU639-000004', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000001', NULL, NULL, NULL, 'BDT', 294600, 1, 294600, NULL, NULL, NULL, NULL, 'Debit'),
(5788, '2018-04-01 13:42:39', NULL, 100, 'DOVU639-000004', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -294600, 1, -294600, NULL, NULL, NULL, NULL, 'Credit'),
(5791, '2018-04-02 09:10:33', NULL, 100, 'DOVU639-000006', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000001', NULL, NULL, NULL, 'BDT', 294600, 1, 294600, NULL, NULL, NULL, NULL, 'Debit'),
(5792, '2018-04-02 09:10:33', NULL, 100, 'DOVU639-000006', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -294600, 1, -294600, NULL, NULL, NULL, NULL, 'Credit'),
(5802, '2018-04-05 06:34:59', NULL, 100, 'DOVU639-000008', 1, '1010', 'Asset', 'AR', 'Customer', 'DIN0000001', NULL, NULL, NULL, 'BDT', 254500, 1, 254500, NULL, NULL, NULL, NULL, 'Debit'),
(5803, '2018-04-05 06:34:59', NULL, 100, 'DOVU639-000008', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -254500, 1, -254500, NULL, NULL, NULL, NULL, 'Credit'),
(5832, '2018-04-12 07:05:04', NULL, 100, 'DOVU639-000009', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000002', NULL, NULL, NULL, 'BDT', 118000, 1, 118000, NULL, NULL, NULL, NULL, 'Debit'),
(5833, '2018-04-12 07:05:04', NULL, 100, 'DOVU639-000009', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -118000, 1, -118000, NULL, NULL, NULL, NULL, 'Credit'),
(5892, '2018-09-22 07:38:02', NULL, 100, 'DOVU639-000010', 1, '1010', 'Asset', 'AR', 'Customer', 'DIN0000001', NULL, NULL, NULL, 'BDT', 988, 1, 988, NULL, NULL, NULL, NULL, 'Debit'),
(5893, '2018-09-22 07:38:02', NULL, 100, 'DOVU639-000010', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -988, 1, -988, NULL, NULL, NULL, NULL, 'Credit'),
(5816, '2018-04-05 11:51:38', NULL, 100, 'DOVU640-000001', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000003', NULL, NULL, NULL, 'BDT', 1988000, 1, 1988000, NULL, NULL, NULL, NULL, 'Debit'),
(5817, '2018-04-05 11:51:38', NULL, 100, 'DOVU640-000001', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -1988000, 1, -1988000, NULL, NULL, NULL, NULL, 'Credit'),
(5818, '2018-04-05 12:14:06', NULL, 100, 'DOVU640-000002', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000002', NULL, NULL, NULL, 'BDT', 118000, 1, 118000, NULL, NULL, NULL, NULL, 'Debit'),
(5819, '2018-04-05 12:14:06', NULL, 100, 'DOVU640-000002', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -118000, 1, -118000, NULL, NULL, NULL, NULL, 'Credit'),
(5864, '2018-08-26 11:49:43', NULL, 100, 'DOVU640-000003', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000009', NULL, NULL, NULL, 'BDT', 8800, 1, 8800, NULL, NULL, NULL, NULL, 'Debit'),
(5865, '2018-08-26 11:49:43', NULL, 100, 'DOVU640-000003', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -8800, 1, -8800, NULL, NULL, NULL, NULL, 'Credit'),
(5870, '2018-08-26 12:16:20', NULL, 100, 'DOVU640-000004', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000006', NULL, NULL, NULL, 'BDT', 101800, 1, 101800, NULL, NULL, NULL, NULL, 'Debit'),
(5871, '2018-08-26 12:16:20', NULL, 100, 'DOVU640-000004', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -101800, 1, -101800, NULL, NULL, NULL, NULL, 'Credit'),
(5882, '2018-09-19 12:49:19', NULL, 100, 'DOVU642-000001', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000008', NULL, NULL, NULL, 'SGD', 105000, 1, 105000, NULL, NULL, NULL, NULL, 'Debit'),
(5883, '2018-09-19 12:49:19', NULL, 100, 'DOVU642-000001', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'SGD', -105000, 1, -105000, NULL, NULL, NULL, NULL, 'Credit'),
(5884, '2018-09-20 10:21:40', NULL, 100, 'DOVU642-000002', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000009', NULL, NULL, NULL, 'BDT', -8800, 1, -8800, NULL, NULL, NULL, NULL, 'Debit'),
(5885, '2018-09-20 10:21:40', NULL, 100, 'DOVU642-000002', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 8800, 1, 8800, NULL, NULL, NULL, NULL, 'Credit'),
(5886, '2018-09-20 10:35:52', NULL, 100, 'DOVU642-000003', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000001', NULL, NULL, NULL, 'BDT', 52500, 1, 52500, NULL, NULL, NULL, NULL, 'Debit'),
(5887, '2018-09-20 10:35:52', NULL, 100, 'DOVU642-000003', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -52500, 1, -52500, NULL, NULL, NULL, NULL, 'Credit'),
(5888, '2018-09-20 10:35:56', NULL, 100, 'DOVU642-000004', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000001', NULL, NULL, NULL, 'BDT', -52500, 1, -52500, NULL, NULL, NULL, NULL, 'Debit'),
(5889, '2018-09-20 10:35:56', NULL, 100, 'DOVU642-000004', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 52500, 1, 52500, NULL, NULL, NULL, NULL, 'Credit'),
(5751, '2018-03-24 09:31:40', NULL, 100, 'GRNV-000001', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000047', NULL, NULL, NULL, 'BDT', -568000, 1, -568000, NULL, NULL, NULL, NULL, 'Credit'),
(5752, '2018-03-24 09:31:40', NULL, 100, 'GRNV-000001', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 568000, 1, 568000, NULL, NULL, NULL, NULL, 'Debit'),
(5755, '2018-03-25 04:44:14', NULL, 100, 'GRNV-000002', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000047', NULL, NULL, NULL, 'BDT', -729816, 1, -729816, NULL, NULL, NULL, NULL, 'Credit'),
(5756, '2018-03-25 04:44:14', NULL, 100, 'GRNV-000002', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 729816, 1, 729816, NULL, NULL, NULL, NULL, 'Debit'),
(5757, '2018-03-25 05:34:45', NULL, 100, 'GRNV-000003', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -212790, 1, -212790, NULL, NULL, NULL, NULL, 'Credit'),
(5758, '2018-03-25 05:34:45', NULL, 100, 'GRNV-000003', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 212790, 1, 212790, NULL, NULL, NULL, NULL, 'Debit'),
(5763, '2018-03-25 13:06:36', NULL, 100, 'GRNV-000004', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -454296, 1, -454296, NULL, NULL, NULL, NULL, 'Credit'),
(5764, '2018-03-25 13:06:36', NULL, 100, 'GRNV-000004', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 454296, 1, 454296, NULL, NULL, NULL, NULL, 'Debit'),
(5765, '2018-03-25 13:10:38', NULL, 100, 'GRNV-000005', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -194586, 1, -194586, NULL, NULL, NULL, NULL, 'Credit'),
(5766, '2018-03-25 13:10:38', NULL, 100, 'GRNV-000005', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 194586, 1, 194586, NULL, NULL, NULL, NULL, 'Debit'),
(5767, '2018-03-29 10:03:52', NULL, 100, 'GRNV-000006', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -18532, 1, -18532, NULL, NULL, NULL, NULL, 'Credit'),
(5768, '2018-03-29 10:03:52', NULL, 100, 'GRNV-000006', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 18532, 1, 18532, NULL, NULL, NULL, NULL, 'Debit'),
(5769, '2018-03-31 09:44:50', NULL, 100, 'GRNV-000007', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000049', NULL, NULL, NULL, 'BDT', -294624, 1, -294624, NULL, NULL, NULL, NULL, 'Credit'),
(5770, '2018-03-31 09:44:50', NULL, 100, 'GRNV-000007', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 294624, 1, 294624, NULL, NULL, NULL, NULL, 'Debit'),
(5771, '2018-03-31 09:45:28', NULL, 100, 'GRNV-000008', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -212790, 1, -212790, NULL, NULL, NULL, NULL, 'Credit'),
(5772, '2018-03-31 09:45:28', NULL, 100, 'GRNV-000008', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 212790, 1, 212790, NULL, NULL, NULL, NULL, 'Debit'),
(5773, '2018-03-31 09:45:43', NULL, 100, 'GRNV-000009', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -179580, 1, -179580, NULL, NULL, NULL, NULL, 'Credit'),
(5774, '2018-03-31 09:45:43', NULL, 100, 'GRNV-000009', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 179580, 1, 179580, NULL, NULL, NULL, NULL, 'Debit'),
(5775, '2018-03-31 09:46:03', NULL, 100, 'GRNV-000010', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000049', NULL, NULL, NULL, 'BDT', -110351.2, 1, -110351.2, NULL, NULL, NULL, NULL, 'Credit'),
(5776, '2018-03-31 09:46:03', NULL, 100, 'GRNV-000010', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 110351.2, 1, 110351.2, NULL, NULL, NULL, NULL, 'Debit'),
(5777, '2018-04-01 07:06:42', NULL, 100, 'GRNV-000011', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -240000, 1, -240000, NULL, NULL, NULL, NULL, 'Credit'),
(5778, '2018-04-01 07:06:42', NULL, 100, 'GRNV-000011', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 240000, 1, 240000, NULL, NULL, NULL, NULL, 'Debit'),
(5779, '2018-04-01 07:08:21', NULL, 100, 'GRNV-000012', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000049', NULL, NULL, NULL, 'BDT', -294624, 1, -294624, NULL, NULL, NULL, NULL, 'Credit'),
(5780, '2018-04-01 07:08:21', NULL, 100, 'GRNV-000012', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 294624, 1, 294624, NULL, NULL, NULL, NULL, 'Debit'),
(5781, '2018-04-01 07:10:51', NULL, 100, 'GRNV-000013', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -179580, 1, -179580, NULL, NULL, NULL, NULL, 'Credit'),
(5782, '2018-04-01 07:10:51', NULL, 100, 'GRNV-000013', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 179580, 1, 179580, NULL, NULL, NULL, NULL, 'Debit'),
(5783, '2018-04-01 07:20:31', NULL, 100, 'GRNV-000014', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000047', NULL, NULL, NULL, 'BDT', -194832, 1, -194832, NULL, NULL, NULL, NULL, 'Credit'),
(5784, '2018-04-01 07:20:31', NULL, 100, 'GRNV-000014', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 194832, 1, 194832, NULL, NULL, NULL, NULL, 'Debit'),
(5789, '2018-04-02 06:02:38', NULL, 100, 'GRNV-000015', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -109560, 1, -109560, NULL, NULL, NULL, NULL, 'Credit'),
(5790, '2018-04-02 06:02:38', NULL, 100, 'GRNV-000015', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 109560, 1, 109560, NULL, NULL, NULL, NULL, 'Debit'),
(5797, '2018-04-05 05:40:09', NULL, 100, 'GRNV-000016', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000050', NULL, NULL, NULL, 'BDT', -863820, 1, -863820, NULL, NULL, NULL, NULL, 'Credit'),
(5798, '2018-04-05 05:40:09', NULL, 100, 'GRNV-000016', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 863820, 1, 863820, NULL, NULL, NULL, NULL, 'Debit'),
(5804, '2018-04-05 06:46:10', NULL, 100, 'GRNV-000017', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000053', NULL, NULL, NULL, 'BDT', -268800, 1, -268800, NULL, NULL, NULL, NULL, 'Credit'),
(5805, '2018-04-05 06:46:10', NULL, 100, 'GRNV-000017', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 268800, 1, 268800, NULL, NULL, NULL, NULL, 'Debit'),
(5806, '2018-04-05 06:50:24', NULL, 100, 'GRNV-000018', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000052', NULL, NULL, NULL, 'BDT', -21000, 1, -21000, NULL, NULL, NULL, NULL, 'Credit'),
(5807, '2018-04-05 06:50:24', NULL, 100, 'GRNV-000018', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 21000, 1, 21000, NULL, NULL, NULL, NULL, 'Debit'),
(5808, '2018-04-05 06:56:41', NULL, 100, 'GRNV-000019', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000047', NULL, NULL, NULL, 'BDT', -729816, 1, -729816, NULL, NULL, NULL, NULL, 'Credit'),
(5809, '2018-04-05 06:56:41', NULL, 100, 'GRNV-000019', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 729816, 1, 729816, NULL, NULL, NULL, NULL, 'Debit'),
(5810, '2018-04-05 07:04:21', NULL, 100, 'GRNV-000020', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000049', NULL, NULL, NULL, 'BDT', -105599.6, 1, -105599.6, NULL, NULL, NULL, NULL, 'Credit'),
(5811, '2018-04-05 07:04:21', NULL, 100, 'GRNV-000020', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 105599.6, 1, 105599.6, NULL, NULL, NULL, NULL, 'Debit'),
(5812, '2018-04-05 07:07:54', NULL, 100, 'GRNV-000021', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -454296, 1, -454296, NULL, NULL, NULL, NULL, 'Credit'),
(5813, '2018-04-05 07:07:54', NULL, 100, 'GRNV-000021', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 454296, 1, 454296, NULL, NULL, NULL, NULL, 'Debit'),
(5814, '2018-04-05 07:17:49', NULL, 100, 'GRNV-000022', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000046', NULL, NULL, NULL, 'BDT', -440668, 1, -440668, NULL, NULL, NULL, NULL, 'Credit'),
(5815, '2018-04-05 07:17:49', NULL, 100, 'GRNV-000022', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 440668, 1, 440668, NULL, NULL, NULL, NULL, 'Debit'),
(5822, '2018-04-05 12:37:06', NULL, 100, 'GRNV-000023', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000035', NULL, NULL, NULL, 'BDT', -22500, 1, -22500, NULL, NULL, NULL, NULL, 'Credit'),
(5823, '2018-04-05 12:37:06', NULL, 100, 'GRNV-000023', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 22500, 1, 22500, NULL, NULL, NULL, NULL, 'Debit'),
(5826, '2018-04-11 10:26:01', NULL, 100, 'GRNV-000024', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000053', NULL, NULL, NULL, 'BDT', -1176, 1, -1176, NULL, NULL, NULL, NULL, 'Credit'),
(5827, '2018-04-11 10:26:01', NULL, 100, 'GRNV-000024', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 1176, 1, 1176, NULL, NULL, NULL, NULL, 'Debit'),
(5828, '2018-04-11 10:31:23', NULL, 100, 'GRNV-000025', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000053', NULL, NULL, NULL, 'BDT', -99960, 1, -99960, NULL, NULL, NULL, NULL, 'Credit'),
(5829, '2018-04-11 10:31:23', NULL, 100, 'GRNV-000025', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 99960, 1, 99960, NULL, NULL, NULL, NULL, 'Debit'),
(5836, '2018-05-16 10:26:56', NULL, 100, 'GRNV-000026', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000051', NULL, NULL, NULL, 'BDT', -8375, 1, -8375, NULL, NULL, NULL, NULL, 'Credit'),
(5837, '2018-05-16 10:26:56', NULL, 100, 'GRNV-000026', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 8375, 1, 8375, NULL, NULL, NULL, NULL, 'Debit'),
(5838, '2018-05-19 04:24:20', NULL, 100, 'GRNV-000027', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000032', NULL, NULL, NULL, 'BDT', -1100, 1, -1100, NULL, NULL, NULL, NULL, 'Credit'),
(5839, '2018-05-19 04:24:20', NULL, 100, 'GRNV-000027', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 1100, 1, 1100, NULL, NULL, NULL, NULL, 'Debit'),
(5846, '2018-06-03 05:17:15', NULL, 100, 'GRNV-000028', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000049', NULL, NULL, NULL, 'BDT', -766920, 1, -766920, NULL, NULL, NULL, NULL, 'Credit'),
(5847, '2018-06-03 05:17:15', NULL, 100, 'GRNV-000028', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 766920, 1, 766920, NULL, NULL, NULL, NULL, 'Debit'),
(5848, '2018-06-03 05:38:05', NULL, 100, 'GRNV-000029', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000049', NULL, NULL, NULL, 'BDT', -2300760, 1, -2300760, NULL, NULL, NULL, NULL, 'Credit'),
(5849, '2018-06-03 05:38:05', NULL, 100, 'GRNV-000029', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 2300760, 1, 2300760, NULL, NULL, NULL, NULL, 'Debit'),
(5850, '2018-07-03 04:33:12', NULL, 100, 'GRNV-000030', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000015', NULL, NULL, NULL, 'BDT', -3850, 1, -3850, NULL, NULL, NULL, NULL, 'Credit'),
(5851, '2018-07-03 04:33:12', NULL, 100, 'GRNV-000030', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 3850, 1, 3850, NULL, NULL, NULL, NULL, 'Debit'),
(5852, '2018-07-07 07:44:52', NULL, 100, 'GRNV-000031', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000049', NULL, NULL, NULL, 'BDT', -20800, 1, -20800, NULL, NULL, NULL, NULL, 'Credit'),
(5853, '2018-07-07 07:44:52', NULL, 100, 'GRNV-000031', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 20800, 1, 20800, NULL, NULL, NULL, NULL, 'Debit'),
(5856, '2018-08-07 06:23:10', NULL, 100, 'GRNV-000032', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000054', NULL, NULL, NULL, 'BDT', -32000, 1, -32000, NULL, NULL, NULL, NULL, 'Credit'),
(5857, '2018-08-07 06:23:10', NULL, 100, 'GRNV-000032', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 32000, 1, 32000, NULL, NULL, NULL, NULL, 'Debit'),
(5860, '2018-08-26 11:36:25', NULL, 100, 'GRNV-000033', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000054', NULL, NULL, NULL, 'BDT', -219120, 1, -219120, NULL, NULL, NULL, NULL, 'Credit'),
(5861, '2018-08-26 11:36:25', NULL, 100, 'GRNV-000033', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 219120, 1, 219120, NULL, NULL, NULL, NULL, 'Debit'),
(5872, '2018-08-29 08:19:07', NULL, 100, 'GRNV-000034', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000054', NULL, NULL, NULL, 'BDT', -1095600, 1, -1095600, NULL, NULL, NULL, NULL, 'Credit'),
(5873, '2018-08-29 08:19:07', NULL, 100, 'GRNV-000034', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 1095600, 1, 1095600, NULL, NULL, NULL, NULL, 'Debit'),
(5878, '2018-09-19 08:17:05', NULL, 100, 'GRNV-000035', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000053', NULL, NULL, NULL, 'SGD', -1312500, 1, -1312500, NULL, NULL, NULL, NULL, 'Credit'),
(5879, '2018-09-19 08:17:05', NULL, 100, 'GRNV-000035', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'SGD', 1312500, 1, 1312500, NULL, NULL, NULL, NULL, 'Debit'),
(5894, '2018-09-22 10:52:42', NULL, 100, 'GRNV-000036', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000048', NULL, NULL, NULL, 'BDT', -294937.5, 1, -294937.5, NULL, NULL, NULL, NULL, 'Credit'),
(5895, '2018-09-22 10:52:42', NULL, 100, 'GRNV-000036', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 294937.5, 1, 294937.5, NULL, NULL, NULL, NULL, 'Debit'),
(5896, '2018-09-22 11:17:32', NULL, 100, 'GRNV-000037', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000042', NULL, NULL, NULL, 'BDT', -4187.5, 1, -4187.5, NULL, NULL, NULL, NULL, 'Credit'),
(5897, '2018-09-22 11:17:32', NULL, 100, 'GRNV-000037', 2, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 4187.5, 1, 4187.5, NULL, NULL, NULL, NULL, 'Debit'),
(5795, '2018-04-04 05:14:58', NULL, 100, 'JV--639000001', 1, '20002', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 2000, 1, 2000, NULL, NULL, NULL, NULL, 'Debit'),
(5796, '2018-04-04 05:14:58', NULL, 100, 'JV--639000001', 2, '1029', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, 'BDT', -2000, 1, -2000, NULL, NULL, NULL, NULL, 'Credit'),
(5834, '2018-04-23 10:50:16', NULL, 100, 'JV--639000002', 1, '20003', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 200, 1, 200, NULL, NULL, NULL, NULL, 'Debit'),
(5835, '2018-04-23 10:50:16', NULL, 100, 'JV--639000002', 2, '1029', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, 'BDT', -200, 1, -200, NULL, NULL, NULL, NULL, 'Credit'),
(5840, '2018-05-24 14:20:30', NULL, 100, 'JV--639000003', 1, '20002', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 20000, 1, 20000, NULL, NULL, NULL, NULL, 'Debit'),
(5841, '2018-05-24 14:20:30', NULL, 100, 'JV--639000003', 2, '1029', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, 'BDT', -20000, 1, -20000, NULL, NULL, NULL, NULL, 'Credit'),
(5854, '2018-07-28 14:23:25', NULL, 100, 'JV--639000004', 1, '20003', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 3000, 1, 3000, NULL, NULL, NULL, NULL, 'Debit'),
(5855, '2018-07-28 14:23:25', NULL, 100, 'JV--639000004', 2, '1029', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, 'BDT', -3000, 1, -3000, NULL, NULL, NULL, NULL, 'Credit'),
(5876, '2018-09-13 13:42:24', NULL, 100, 'JV--639000005', 1, '1029', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(5877, '2018-09-13 13:42:24', NULL, 100, 'JV--639000005', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(5800, '2018-04-05 06:09:09', NULL, 100, 'OB--639000001', 1, '6065', 'Expenditure', 'Ledger', 'None', 'None', NULL, NULL, NULL, 'BDT', 500, 1, 500, NULL, NULL, NULL, NULL, 'Debit'),
(5801, '2018-04-05 06:09:09', NULL, 100, 'OB--639000001', 2, '2035', 'Liability', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -500, 1, -500, NULL, NULL, NULL, NULL, 'Credit'),
(5842, '2018-05-24 14:44:59', NULL, 100, 'OB--639000002', 1, '5005', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 1200, 1, 1200, NULL, NULL, NULL, NULL, 'Debit'),
(5843, '2018-05-24 14:46:04', NULL, 100, 'OB--639000002', 2, '1029', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, 'BDT', -1200, 1, -1200, NULL, NULL, NULL, NULL, 'Credit'),
(5858, '2018-08-07 06:29:58', NULL, 100, 'OB--639000003', 1, '1029', 'Asset', 'Cash', 'None', 'None', NULL, NULL, NULL, 'BDT', 55000, 1, 55000, NULL, NULL, NULL, NULL, 'Debit'),
(5859, '2018-08-07 06:29:58', NULL, 100, 'OB--639000003', 2, '2035', 'Liability', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -55000, 1, -55000, NULL, NULL, NULL, NULL, 'Credit'),
(5749, '2018-03-24 09:13:32', NULL, 100, 'PAY-639000001', 1, '20002', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', 20000, 1, 20000, NULL, NULL, NULL, NULL, 'Debit'),
(5750, '2018-03-24 09:13:32', NULL, 100, 'PAY-639000001', 2, '1029', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, 'BDT', -20000, 1, -20000, NULL, NULL, NULL, NULL, 'Credit'),
(5820, '2018-04-05 12:17:11', NULL, 100, 'PRTN-000001', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000053', NULL, NULL, NULL, 'BDT', 28400, 1, 28400, NULL, NULL, NULL, NULL, 'Debit'),
(5821, '2018-04-05 12:17:11', NULL, 100, 'PRTN-000001', 2, '5006', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -28400, 1, -28400, NULL, NULL, NULL, NULL, 'Credit'),
(5830, '2018-04-12 06:17:08', NULL, 100, 'PRTN-000002', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000053', NULL, NULL, NULL, 'BDT', 3998.4, 1, 3998.4, NULL, NULL, NULL, NULL, 'Debit'),
(5831, '2018-04-12 06:17:08', NULL, 100, 'PRTN-000002', 2, '5006', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -3998.4, 1, -3998.4, NULL, NULL, NULL, NULL, 'Credit'),
(5880, '2018-09-19 08:51:55', NULL, 100, 'PRTN-000004', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000053', NULL, NULL, NULL, 'SGD', 105000, 1, 105000, NULL, NULL, NULL, NULL, 'Debit'),
(5881, '2018-09-19 08:51:55', NULL, 100, 'PRTN-000004', 2, '5006', 'Expenditure', 'Ledger', 'None', '', NULL, NULL, NULL, 'SGD', -105000, 1, -105000, NULL, NULL, NULL, NULL, 'Credit'),
(5844, '2018-05-24 14:59:21', NULL, 100, 'RCPT639000001', 1, '1029', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, 'BDT', 20000, 1, 20000, NULL, NULL, NULL, NULL, 'Debit'),
(5845, '2018-05-24 14:59:21', NULL, 100, 'RCPT639000001', 2, '3001', 'Income', 'Ledger', 'None', '', NULL, NULL, NULL, 'BDT', -20000, 1, -20000, NULL, NULL, NULL, NULL, 'Credit'),
(5890, '2018-09-22 07:35:08', NULL, 100, 'SINV639-000001', 1, '1029', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, 'BDT', 1000, 1, 1000, NULL, NULL, NULL, NULL, 'Debit'),
(5891, '2018-09-22 07:35:08', NULL, 100, 'SINV639-000001', 2, '1010', 'Asset', 'AR', 'Customer', 'DIN0000001', NULL, NULL, NULL, 'BDT', -1000, 1, -1000, NULL, NULL, NULL, NULL, 'Credit'),
(5862, '2018-08-26 11:40:28', NULL, 100, 'TPAY640000001', 1, '2001', 'Liability', 'AP', 'Supplier', 'SUP0000054', NULL, NULL, NULL, 'BDT', 5000, 1, 5000, NULL, NULL, NULL, NULL, 'Debit'),
(5863, '2018-08-26 11:40:28', NULL, 100, 'TPAY640000001', 2, '1018', 'Asset', 'Bank', 'None', '', NULL, NULL, NULL, 'BDT', -5000, 1, -5000, NULL, NULL, NULL, NULL, 'Credit'),
(5761, '2018-03-25 05:40:26', NULL, 100, 'TRCV639000001', 1, '1010', 'Asset', 'AR', 'Customer', 'DIN0000001', NULL, NULL, NULL, 'BDT', -20000, 1, -20000, NULL, NULL, NULL, NULL, 'Credit'),
(5762, '2018-03-25 05:40:26', NULL, 100, 'TRCV639000001', 2, '1029', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, 'BDT', 20000, 1, 20000, NULL, NULL, NULL, NULL, 'Debit'),
(5874, '2018-08-29 10:36:40', NULL, 100, 'TRCV639000002', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000005', NULL, NULL, NULL, 'BDT', -5000000, 1, -5000000, NULL, NULL, NULL, NULL, 'Credit'),
(5875, '2018-08-29 10:36:40', NULL, 100, 'TRCV639000002', 2, '1017', 'Asset', 'Bank', 'None', '', NULL, NULL, NULL, 'BDT', 5000000, 1, 5000000, NULL, NULL, NULL, NULL, 'Debit'),
(5866, '2018-08-26 11:58:27', NULL, 100, 'TRCV640000001', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000009', NULL, NULL, NULL, 'BDT', -5000, 1, -5000, NULL, NULL, NULL, NULL, 'Credit'),
(5867, '2018-08-26 11:58:27', NULL, 100, 'TRCV640000001', 2, '1018', 'Asset', 'Bank', 'None', '', NULL, NULL, NULL, 'BDT', 5000, 1, 5000, NULL, NULL, NULL, NULL, 'Debit');

-- --------------------------------------------------------

--
-- Stand-in structure for view `gldetailview`
-- (See below for the actual view)
--
CREATE TABLE `gldetailview` (
`ztime` timestamp
,`bizid` int(6)
,`xvoucher` varchar(20)
,`xrow` int(3)
,`xdate` date
,`xnarration` varchar(250)
,`xref` varchar(100)
,`xchequeno` varchar(50)
,`xyear` int(4)
,`xper` int(2)
,`zemail` varchar(100)
,`xemail` varchar(100)
,`xbranch` varchar(50)
,`xdoctype` varchar(20)
,`xdocnum` varchar(20)
,`xapprovedby` varchar(100)
,`xmanager` varchar(100)
,`xacc` varchar(20)
,`xaccdesc` varchar(100)
,`xacctype` varchar(100)
,`xaccusage` varchar(30)
,`xaccsource` varchar(30)
,`xaccsub` varchar(20)
,`xaccsubdesc` varchar(100)
,`xproj` varchar(100)
,`xsec` varchar(100)
,`xdiv` varchar(100)
,`xcur` varchar(20)
,`xbase` double
,`xprime` double
,`xcheque` varchar(50)
,`xchequedate` date
,`xflag` varchar(20)
,`xinvnum` varchar(20)
,`xsalesparson` varchar(100)
,`xrecflag` varchar(15)
,`xacclevel1` varchar(100)
,`xacclevel2` varchar(100)
,`xacclevel3` varchar(100)
,`xsite` varchar(50)
,`xstatus` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `glheader`
--

CREATE TABLE `glheader` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xvoucher` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xnarration` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xref` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlong` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xchequeno` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xstatusjv` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsite` varchar(50) DEFAULT NULL,
  `xdoctype` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdocnum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xapprovedby` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `glheader`
--

INSERT INTO `glheader` (`xsl`, `ztime`, `zutime`, `bizid`, `xvoucher`, `xdate`, `xnarration`, `xref`, `xlong`, `xchequeno`, `xyear`, `xper`, `xstatusjv`, `zemail`, `xemail`, `xbranch`, `xsite`, `xdoctype`, `xdocnum`, `xapprovedby`, `xmanager`, `xrecflag`) VALUES
(2886, '2018-04-07 12:19:36', NULL, 100, 'CLPA000001', '2018-04-07', 'TEst', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', '', 'Clearing Cheque', '19', NULL, NULL, 'Live'),
(2909, '2018-08-26 12:01:34', NULL, 100, 'CLRC000001', '2018-08-26', '', NULL, NULL, NULL, 2018, 2, 'Created', 'admin@demo.com', NULL, 'Head Office', '', 'Clearing Cheque', '20', NULL, NULL, 'Live'),
(2849, '2018-03-24 10:29:06', '2018-08-07 06:32:02', 100, 'DORN-000001', '2018-03-24', 'Created by system! Delivery Return:SRTN-000001 Customer: DIN0000001-MS MAA STORE', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Delivery Return', 'SRTN-000001', NULL, NULL, 'Deleted'),
(2871, '2018-04-02 10:26:20', NULL, 100, 'DORN-000002', '2018-04-02', 'Created by system! Delivery Return:SRTN-000002 Customer: 100000002-Tajmul', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Delivery Return', 'SRTN-000002', NULL, NULL, 'Live'),
(2846, '2018-03-24 09:11:46', '2018-08-07 06:32:05', 100, 'DOVU639-000001', '2018-03-24', 'Created by system! Delivery Order:RQDO639-000001 Customer: DIN0000001-MS MAA STORE', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Delivery Order', 'RQDO639-000001', NULL, NULL, 'Deleted'),
(2852, '2018-03-25 05:38:24', '2018-08-07 06:31:36', 100, 'DOVU639-000002', '2018-03-25', 'Created by system! Delivery Order:RQDO639-000002 Customer: DIN0000001-MS MAA STORE', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Delivery Order', 'RQDO639-000002', NULL, NULL, 'Deleted'),
(2865, '2018-04-01 09:37:29', NULL, 100, 'DOVU639-000003', '2018-04-01', 'Created by system! Delivery Order:SODO000010 Customer: DIN0000001-MS MAA STORE', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Delivery Order', 'SODO000010', NULL, NULL, 'Live'),
(2866, '2018-04-01 13:42:39', NULL, 100, 'DOVU639-000004', '2018-04-01', 'Created by system! Delivery Order:SODO000001 Customer: CUS0000001-Test Customer', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Delivery Order', 'SODO000001', NULL, NULL, 'Live'),
(2867, '2018-04-02 03:59:42', NULL, 100, 'DOVU639-000005', '2018-04-02', 'Created by system! Delivery Order:SODO000004 Customer: DIN0000001-MS MAA STORE', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Delivery Order', 'SODO000004', NULL, NULL, 'Live'),
(2869, '2018-04-02 09:10:33', NULL, 100, 'DOVU639-000006', '2018-04-02', 'Created by system! Delivery Order:SODO000002 Customer: CUS0000001-Test Customer', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Delivery Order', 'SODO000002', NULL, NULL, 'Live'),
(2870, '2018-04-02 09:11:11', NULL, 100, 'DOVU639-000007', '2018-04-02', 'Created by system! Delivery Order:SODO000003 Customer: DIN0000001-MS MAA STORE', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Delivery Order', 'SODO000003', NULL, NULL, 'Live'),
(2875, '2018-04-05 06:34:59', NULL, 100, 'DOVU639-000008', '2018-04-05', 'Created by system! Delivery Order:RQDO639-000003 Customer: DIN0000001-MS MAA STORE', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Delivery Order', 'RQDO639-000003', NULL, NULL, 'Live'),
(2890, '2018-04-12 07:05:03', NULL, 100, 'DOVU639-000009', '2018-04-12', 'Created by system! Delivery Order:SODO000028 Customer: CUS0000002-kind of juss', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Delivery Order', 'SODO000028', NULL, NULL, 'Live'),
(2922, '2018-09-22 07:38:02', NULL, 100, 'DOVU639-000010', '2018-09-22', 'Created by system! Delivery Order:SODO000031 Customer: DIN0000001-MS MAA STORE', NULL, NULL, NULL, 2018, 3, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Delivery Order', 'SODO000031', NULL, NULL, 'Live'),
(2882, '2018-04-05 11:51:38', NULL, 100, 'DOVU640-000001', '2018-04-05', 'Created by system! Delivery Order:DO-784368 Customer: CUS0000003-Foods Matarials', NULL, NULL, NULL, 2017, 10, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Delivery Order', 'DO-784368', NULL, NULL, 'Live'),
(2883, '2018-04-05 12:14:06', NULL, 100, 'DOVU640-000002', '2018-04-05', 'Created by system! Delivery Order:DO-873625 Customer: CUS0000002-kind of juss', NULL, NULL, NULL, 2017, 10, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Delivery Order', 'DO-873625', NULL, NULL, 'Live'),
(2907, '2018-08-26 11:49:42', NULL, 100, 'DOVU640-000003', '2018-08-26', 'Created by system! Delivery Order:SODO000029 Customer: CUS0000009-Md Rajibul Islam', NULL, NULL, NULL, 2018, 2, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Delivery Order', 'SODO000029', NULL, NULL, 'Live'),
(2910, '2018-08-26 12:16:20', NULL, 100, 'DOVU640-000004', '2018-08-26', 'Created by system! Delivery Order:SODO000030 Customer: CUS0000006-Taj Fashion Ltd.', NULL, NULL, NULL, 2018, 2, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Delivery Order', 'SODO000030', NULL, NULL, 'Live'),
(2916, '2018-09-19 12:49:19', NULL, 100, 'DOVU642-000001', '2018-09-19', 'Created by system! Delivery Order:RQDO642-000001 Customer: CUS0000008-Md Rajibul Islam', NULL, NULL, NULL, 2018, 3, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Delivery Order', 'RQDO642-000001', NULL, NULL, 'Live'),
(2917, '2018-09-20 10:21:40', NULL, 100, 'DOVU642-000002', '2018-09-20', 'Created by system! Delivery Order:SODO000029 Customer: CUS0000009-Md Rajibul Islam', NULL, NULL, NULL, 2018, 3, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Delivery Order', 'SODO000029', NULL, NULL, 'Live'),
(2918, '2018-09-20 10:35:52', NULL, 100, 'DOVU642-000003', '2018-09-20', 'Created by system! Delivery Order:RQDO642-000003 Customer: CUS0000001-Test Customer', NULL, NULL, NULL, 2018, 3, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Delivery Order', 'RQDO642-000003', NULL, NULL, 'Live'),
(2919, '2018-09-20 10:35:56', NULL, 100, 'DOVU642-000004', '2018-09-20', 'Created by system! Delivery Order:RQDO642-000003 Customer: CUS0000001-Test Customer', NULL, NULL, NULL, 2018, 3, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Delivery Order', 'RQDO642-000003', NULL, NULL, 'Live'),
(2848, '2018-03-24 09:31:40', '2018-08-07 06:32:08', 100, 'GRNV-000001', '2018-03-24', 'Created by system! Goods Receipt Note:GRN-000002 Supplier: SUP0000047-Bhuyan Enterprise', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000002', NULL, NULL, 'Deleted'),
(2850, '2018-03-25 04:44:14', '2018-08-07 06:31:39', 100, 'GRNV-000002', '2018-03-25', 'Created by system! Goods Receipt Note:GRN-000003 Supplier: SUP0000047-Bhuyan Enterprise', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000003', NULL, NULL, 'Deleted'),
(2851, '2018-03-25 05:34:45', '2018-08-07 06:31:41', 100, 'GRNV-000003', '2018-03-25', 'Created by system! Goods Receipt Note:GRN-000004 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000004', NULL, NULL, 'Deleted'),
(2854, '2018-03-25 13:06:36', '2018-08-07 06:31:45', 100, 'GRNV-000004', '2018-03-25', 'Created by system! Goods Receipt Note:GRN-000005 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000005', NULL, NULL, 'Deleted'),
(2855, '2018-03-25 13:10:38', '2018-08-07 06:31:48', 100, 'GRNV-000005', '2018-03-25', 'Created by system! Goods Receipt Note:GRN-000007 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000007', NULL, NULL, 'Deleted'),
(2856, '2018-03-29 10:03:52', '2018-08-07 06:31:30', 100, 'GRNV-000006', '2018-03-29', 'Created by system! Goods Receipt Note:GRN-000006 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000006', NULL, NULL, 'Deleted'),
(2857, '2018-03-31 09:44:50', '2018-08-07 06:31:19', 100, 'GRNV-000007', '2018-03-31', 'Created by system! Goods Receipt Note:GRN-000008 Supplier: SUP0000049-akij group', NULL, NULL, NULL, 2017, 9, 'Created', 'admin@demo.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000008', NULL, NULL, 'Deleted'),
(2858, '2018-03-31 09:45:28', '2018-08-07 06:31:22', 100, 'GRNV-000008', '2018-03-31', 'Created by system! Goods Receipt Note:GRN-000009 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 9, 'Created', 'admin@demo.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000009', NULL, NULL, 'Deleted'),
(2859, '2018-03-31 09:45:43', '2018-08-07 06:31:25', 100, 'GRNV-000009', '2018-03-31', 'Created by system! Goods Receipt Note:GRN-000010 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 9, 'Created', 'admin@demo.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000010', NULL, NULL, 'Deleted'),
(2860, '2018-03-31 09:46:03', '2018-08-07 06:31:27', 100, 'GRNV-000010', '2018-03-31', 'Created by system! Goods Receipt Note:GRN-000011 Supplier: SUP0000049-akij group', NULL, NULL, NULL, 2017, 9, 'Created', 'admin@demo.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000011', NULL, NULL, 'Deleted'),
(2861, '2018-04-01 07:06:42', NULL, 100, 'GRNV-000011', '2018-04-01', 'Created by system! Goods Receipt Note:GRN-000012 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000012', NULL, NULL, 'Live'),
(2862, '2018-04-01 07:08:21', '2018-08-07 06:32:36', 100, 'GRNV-000012', '2018-04-01', 'Created by system! Goods Receipt Note:GRN0000001 Supplier: SUP0000049-akij group', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000001', NULL, NULL, 'Deleted'),
(2863, '2018-04-01 07:10:50', '2018-08-07 06:32:32', 100, 'GRNV-000013', '2018-04-01', 'Created by system! Goods Receipt Note:GRN0000003 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000003', NULL, NULL, 'Deleted'),
(2864, '2018-04-01 07:20:31', '2018-08-07 06:32:29', 100, 'GRNV-000014', '2018-04-01', 'Created by system! Goods Receipt Note:GRN0000004 Supplier: SUP0000047-Bhuyan Enterprise', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000004', NULL, NULL, 'Deleted'),
(2868, '2018-04-02 06:02:38', NULL, 100, 'GRNV-000015', '2018-04-02', 'Created by system! Goods Receipt Note:GRN-000013 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000013', NULL, NULL, 'Live'),
(2873, '2018-04-05 05:40:09', NULL, 100, 'GRNV-000016', '2018-04-05', 'Created by system! Goods Receipt Note:GRN0000005 Supplier: SUP0000050-hasan group of company', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000005', NULL, NULL, 'Live'),
(2876, '2018-04-05 06:46:10', NULL, 100, 'GRNV-000017', '2018-04-05', 'Created by system! Goods Receipt Note:32565 Supplier: SUP0000053-sampony mobile company', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', '32565', NULL, NULL, 'Live'),
(2877, '2018-04-05 06:50:24', NULL, 100, 'GRNV-000018', '2018-04-05', 'Created by system! Goods Receipt Note:GRN0000006 Supplier: SUP0000052-Food Materials', NULL, NULL, NULL, 2017, 10, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000006', NULL, NULL, 'Live'),
(2878, '2018-04-05 06:56:41', NULL, 100, 'GRNV-000019', '2018-04-05', 'Created by system! Goods Receipt Note:GRN0000007 Supplier: SUP0000047-Bhuyan Enterprise', NULL, NULL, NULL, 2017, 10, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000007', NULL, NULL, 'Live'),
(2879, '2018-04-05 07:04:21', NULL, 100, 'GRNV-000020', '2018-04-05', 'Created by system! Goods Receipt Note:GRN0000002 Supplier: SUP0000049-akij group', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000002', NULL, NULL, 'Live'),
(2880, '2018-04-05 07:07:54', NULL, 100, 'GRNV-000021', '2018-04-05', 'Created by system! Goods Receipt Note:GRN0000008 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000008', NULL, NULL, 'Live'),
(2881, '2018-04-05 07:17:49', NULL, 100, 'GRNV-000022', '2018-04-05', 'Created by system! Goods Receipt Note:GRN-000014 Supplier: SUP0000046-Dream Water Purifier', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000014', NULL, NULL, 'Live'),
(2885, '2018-04-05 12:37:06', NULL, 100, 'GRNV-000023', '2018-04-05', 'Created by system! Goods Receipt Note:GRN-000016 Supplier: SUP0000035-A.R Enterprise', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000016', NULL, NULL, 'Live'),
(2887, '2018-04-11 10:26:01', NULL, 100, 'GRNV-000024', '2018-04-11', 'Created by system! Goods Receipt Note:GRN0000009 Supplier: SUP0000053-sampony mobile company', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000009', NULL, NULL, 'Live'),
(2888, '2018-04-11 10:31:23', NULL, 100, 'GRNV-000025', '2018-04-11', 'Created by system! Goods Receipt Note:GRN0000001 Supplier: SUP0000053-sampony mobile company', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000001', NULL, NULL, 'Live'),
(2892, '2018-05-16 10:26:56', NULL, 100, 'GRNV-000026', '2018-05-16', 'Created by system! Goods Receipt Note:GRN-000001 Supplier: SUP0000051-TEst Supplier', NULL, NULL, NULL, 2017, 11, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000001', NULL, NULL, 'Live'),
(2893, '2018-05-19 04:24:20', NULL, 100, 'GRNV-000027', '2018-05-19', 'Created by system! Goods Receipt Note:GRN0000002 Supplier: SUP0000032-T.K. Group Of Industries', NULL, NULL, NULL, 2017, 11, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000002', NULL, NULL, 'Live'),
(2898, '2018-06-03 05:17:15', NULL, 100, 'GRNV-000028', '2018-06-03', 'Created by system! Goods Receipt Note:GRN0000003 Supplier: SUP0000049-akij group', NULL, NULL, NULL, 2017, 12, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000003', NULL, NULL, 'Live'),
(2899, '2018-06-03 05:38:05', NULL, 100, 'GRNV-000029', '2018-06-03', 'Created by system! Goods Receipt Note:GRN0000004 Supplier: SUP0000049-akij group', NULL, NULL, NULL, 2017, 12, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000004', NULL, NULL, 'Live'),
(2900, '2018-07-03 04:33:12', NULL, 100, 'GRNV-000030', '2018-07-03', 'Created by system! Goods Receipt Note:GRN-000002 Supplier: SUP0000015-Amarbazar Ltd', NULL, NULL, NULL, 2018, 1, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000002', NULL, NULL, 'Live'),
(2901, '2018-07-07 07:44:52', NULL, 100, 'GRNV-000031', '2018-07-07', 'Created by system! Goods Receipt Note:GRN-000003 Supplier: SUP0000049-akij group', NULL, NULL, NULL, 2018, 1, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000003', NULL, NULL, 'Live'),
(2903, '2018-08-07 06:23:10', NULL, 100, 'GRNV-000032', '2018-08-07', 'Created by system! Goods Receipt Note:GRN0000005 Supplier: SUP0000054-Anik Mobile Company Ltd.', NULL, NULL, NULL, 2018, 2, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000005', NULL, NULL, 'Live'),
(2905, '2018-08-26 11:36:25', NULL, 100, 'GRNV-000033', '2018-08-26', 'Created by system! Goods Receipt Note:GRN0000006 Supplier: SUP0000054-Anik Mobile Company Ltd.', NULL, NULL, NULL, 2018, 2, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN0000006', NULL, NULL, 'Live'),
(2911, '2018-08-29 08:19:07', NULL, 100, 'GRNV-000034', '2018-08-29', 'Created by system! Goods Receipt Note:GRN-000004 Supplier: SUP0000054-Anik Mobile Company Ltd.', NULL, NULL, NULL, 2018, 2, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000004', NULL, NULL, 'Live'),
(2914, '2018-09-19 08:17:05', NULL, 100, 'GRNV-000035', '2018-09-19', 'Created by system! Goods Receipt Note:GRN-000005 Supplier: SUP0000053-sampony mobile company', NULL, NULL, NULL, 2018, 3, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000005', NULL, NULL, 'Live'),
(2923, '2018-09-22 10:52:42', NULL, 100, 'GRNV-000036', '2018-09-22', 'Created by system! Goods Receipt Note:GRN-000006 Supplier: SUP0000048-ZYZ Transport', NULL, NULL, NULL, 2018, 3, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000006', NULL, NULL, 'Live'),
(2924, '2018-09-22 11:17:32', NULL, 100, 'GRNV-000037', '2018-09-22', 'Created by system! Goods Receipt Note:GRN-000007 Supplier: SUP0000042-Meghna Group (Fresh)', NULL, NULL, NULL, 2018, 3, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Goods Receipt Note', 'GRN-000007', NULL, NULL, 'Live'),
(2872, '2018-04-04 05:14:58', NULL, 100, 'JV--639000001', '2018-04-04', 'paid to mr x', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--639000001', NULL, NULL, 'Live'),
(2891, '2018-04-23 10:50:16', '2018-08-07 06:32:20', 100, 'JV--639000002', '2018-04-23', 'asdfghj', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', '', 'GL Single Entry', 'JV--639000002', NULL, NULL, 'Deleted'),
(2895, '2018-05-24 14:20:30', '2018-08-07 06:31:54', 100, 'JV--639000003', '2018-05-24', 'House bill', NULL, NULL, NULL, 2017, 11, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', '', 'GL Single Entry', 'JV--639000003', NULL, NULL, 'Deleted'),
(2902, '2018-07-28 14:23:25', '2018-08-07 06:31:33', 100, 'JV--639000004', '2018-07-28', 'paper bill', NULL, NULL, NULL, 2018, 1, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', '', 'GL Single Entry', 'JV--639000004', NULL, NULL, 'Deleted'),
(2913, '2018-09-13 13:42:24', NULL, 100, 'JV--639000005', '2018-09-13', '', NULL, NULL, NULL, 2018, 3, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--639000005', NULL, NULL, 'Live'),
(2874, '2018-04-05 06:09:09', NULL, 100, 'OB--639000001', '2018-04-05', 'Opening Balance for : 6065-Office maintenance', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--639000001', NULL, NULL, 'Live'),
(2896, '2018-05-24 14:44:59', '2018-08-07 06:31:57', 100, 'OB--639000002', '2018-05-24', 'asdfg', NULL, NULL, NULL, 2017, 11, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', '', 'GL Voucher', 'OB--639000002', NULL, NULL, 'Deleted'),
(2904, '2018-08-07 06:29:58', NULL, 100, 'OB--639000003', '2018-08-07', 'Opening Balance for : 1029-Cash', NULL, NULL, NULL, 2018, 2, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--639000003', NULL, NULL, 'Live'),
(2847, '2018-03-24 09:13:32', '2018-08-07 06:32:11', 100, 'PAY-639000001', '2018-03-24', 'Office rent For the month of October ,2017', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', '', 'Payment Voucher', 'PAY-639000001', NULL, NULL, 'Deleted'),
(2884, '2018-04-05 12:17:11', NULL, 100, 'PRTN-000001', '2018-04-05', 'Created by system! Purchase Return:PRTN639-000001 Supplier: SUP0000053-sampony mobile company', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Purchase Return', 'PRTN639-000001', NULL, NULL, 'Live'),
(2889, '2018-04-12 06:17:08', NULL, 100, 'PRTN-000002', '2018-04-12', 'Created by system! Purchase Return:PRTN639-000003 Supplier: SUP0000053-sampony mobile company', NULL, NULL, NULL, 2017, 10, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Purchase Return', 'PRTN639-000003', NULL, NULL, 'Live'),
(2894, '2018-05-19 04:29:59', NULL, 100, 'PRTN-000003', '2018-05-19', 'Created by system! Purchase Return:PRTN639-000004 Supplier: SUP0000032-T.K. Group Of Industries', NULL, NULL, NULL, 2017, 11, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Purchase Return', 'PRTN639-000004', NULL, NULL, 'Live'),
(2915, '2018-09-19 08:51:53', NULL, 100, 'PRTN-000004', '2018-09-19', 'Created by system! Purchase Return:PRTN642-000001 Supplier: SUP0000053-sampony mobile company', NULL, NULL, NULL, 2018, 3, 'Created', 'admin@demo.com', NULL, 'Head Office', NULL, 'Purchase Return', 'PRTN642-000001', NULL, NULL, 'Live'),
(2897, '2018-05-24 14:59:21', '2018-08-07 06:32:00', 100, 'RCPT639000001', '2018-05-24', 'fvsjfdj', NULL, NULL, NULL, 2017, 11, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', 'Abedin Bazar ', 'Receipt Voucher', 'RCPT639000001', NULL, NULL, 'Deleted'),
(2921, '2018-09-22 07:35:07', NULL, 100, 'SINV639-000001', '2018-09-22', 'Created by system! Sales Order:SORD-000028 Customer: DIN0000001-MS MAA STORE', NULL, NULL, NULL, 2018, 3, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', NULL, 'Sales Voucher', 'SORD-000028', NULL, NULL, 'Live'),
(2906, '2018-08-26 11:40:28', NULL, 100, 'TPAY640000001', '2018-08-26', 'Paid to Supplier: SUP0000054-Anik Mobile Company Ltd. ', NULL, NULL, NULL, 2018, 2, 'Created', 'admin@demo.com', NULL, 'Head Office', '', 'Trade Payment', 'TPAY640000001', NULL, NULL, 'Live'),
(2853, '2018-03-25 05:40:26', '2018-08-07 06:31:51', 100, 'TRCV639000001', '2018-03-25', 'Received from customer: DIN0000001-MS MAA STORE ', NULL, NULL, NULL, 2017, 9, 'Created', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Head Office', '', 'Trade Receipt', 'TRCV639000001', NULL, NULL, 'Deleted'),
(2912, '2018-08-29 10:36:40', NULL, 100, 'TRCV639000002', '2018-08-29', 'Received from customer: CUS0000005-Prime Group  ', NULL, NULL, NULL, 2018, 2, 'Created', 'rajib@dotbdsolutions.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV639000002', NULL, NULL, 'Live'),
(2908, '2018-08-26 11:58:27', NULL, 100, 'TRCV640000001', '2018-08-26', 'Received from customer: CUS0000009-Md Rajibul Islam ', NULL, NULL, NULL, 2018, 2, 'Created', 'admin@demo.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV640000001', NULL, NULL, 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `glinterface`
--

CREATE TABLE `glinterface` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(11) NOT NULL,
  `xtypeinterface` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xacc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xformula` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xaction` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `glinterface`
--

INSERT INTO `glinterface` (`xsl`, `ztime`, `bizid`, `xtypeinterface`, `xacc`, `xformula`, `xaction`, `zactive`) VALUES
(24, '2018-03-24 08:12:28', 100, 'GL GRN Interface', '2001', 'ta+tt', 'Credit', 1),
(25, '2018-03-24 08:12:56', 100, 'GL GRN Interface', '5005', 'ta', 'Debit', 1),
(26, '2018-03-24 08:13:24', 100, 'GL GRN Interface', '2027', 'tt', 'Debit', 1),
(27, '2018-03-24 08:14:11', 100, 'GL DO Interface', '1010', 'ta+tt', 'Debit', 1),
(28, '2018-03-24 08:14:25', 100, 'GL DO Interface', '3001', 'ta', 'Credit', 1),
(29, '2018-03-24 08:14:47', 100, 'GL DO Interface', '2026', 'tt', 'Credit', 1),
(30, '2018-03-24 10:23:18', 100, 'DO Return Interface', '1010', 'ta+tt', 'Credit', 1),
(31, '2018-03-24 10:23:46', 100, 'DO Return Interface', '3003', 'ta', 'Debit', 1),
(32, '2018-03-24 10:24:13', 100, 'DO Return Interface', '2026', 'tt', 'Debit', 1),
(33, '2018-03-24 10:26:15', 100, 'PO Return Interface', '2001', 'ta+tt', 'Debit', 1),
(34, '2018-03-24 10:26:46', 100, 'PO Return Interface', '5006', 'ta', 'Credit', 1),
(35, '2018-03-24 10:27:02', 100, 'PO Return Interface', '2027', 'tt', 'Credit', 1),
(36, '2018-09-22 06:50:59', 100, 'GL Sales Interface', '1029', 'tr', 'Debit', 1),
(37, '2018-09-22 06:51:16', 100, 'GL Sales Interface', '1010', 'tr', 'Credit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gltype`
--

CREATE TABLE `gltype` (
  `xtype` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gltype`
--

INSERT INTO `gltype` (`xtype`) VALUES
('Debit'),
('Credit');

-- --------------------------------------------------------

--
-- Table structure for table `imchkq`
--

CREATE TABLE `imchkq` (
  `imchkqsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `zemail` varchar(100) NOT NULL,
  `xemail` varchar(100) DEFAULT NULL,
  `ximchkqnum` varchar(20) NOT NULL,
  `ximchksenum` varchar(20) DEFAULT NULL,
  `xdate` date NOT NULL,
  `xsup` varchar(20) DEFAULT NULL,
  `xnote` varchar(500) DEFAULT NULL,
  `xdocnum` varchar(100) DEFAULT NULL,
  `xstr` varchar(100) DEFAULT NULL,
  `xflagimchkq` varchar(10) NOT NULL DEFAULT 'Created',
  `xrecflag` varchar(10) NOT NULL DEFAULT 'Live',
  `xbranch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imchkq`
--

INSERT INTO `imchkq` (`imchkqsl`, `ztime`, `zutime`, `bizid`, `zemail`, `xemail`, `ximchkqnum`, `ximchksenum`, `xdate`, `xsup`, `xnote`, `xdocnum`, `xstr`, `xflagimchkq`, `xrecflag`, `xbranch`) VALUES
(1, '2016-11-07 04:49:46', NULL, 100, 'rajib@pureapp.com', NULL, 'QCHK000001', NULL, '2016-11-07', 'SUP0000005', '', '35253', NULL, 'Created', 'Live', NULL),
(2, '2016-11-07 04:53:54', NULL, 100, 'rajib@pureapp.com', NULL, 'QCHK000002', NULL, '2016-11-07', 'SUP0000004', '', '11111', NULL, 'Created', 'Live', NULL),
(3, '2016-11-07 05:03:10', NULL, 100, 'rajib@pureapp.com', NULL, 'QCHK000003', NULL, '2016-11-07', 'SUP0000002', '', '99999', NULL, 'Created', 'Live', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imchkqdt`
--

CREATE TABLE `imchkqdt` (
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `zemail` varchar(100) NOT NULL,
  `xemail` varchar(100) DEFAULT NULL,
  `ximchkqnum` varchar(20) NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) NOT NULL,
  `xqtychecked` double(18,6) NOT NULL,
  `xqtypassed` double(18,6) NOT NULL,
  `xunit` varchar(50) DEFAULT NULL,
  `xnote` varchar(160) DEFAULT NULL,
  `xstr1` int(11) DEFAULT NULL,
  `xstr2` int(11) DEFAULT NULL,
  `xstr3` int(11) DEFAULT NULL,
  `xnum1` int(11) DEFAULT NULL,
  `xnum2` int(11) DEFAULT NULL,
  `xnum3` int(11) DEFAULT NULL,
  `xdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imchkqdt`
--

INSERT INTO `imchkqdt` (`ztime`, `zutime`, `bizid`, `zemail`, `xemail`, `ximchkqnum`, `xrow`, `xitemcode`, `xqtychecked`, `xqtypassed`, `xunit`, `xnote`, `xstr1`, `xstr2`, `xstr3`, `xnum1`, `xnum2`, `xnum3`, `xdate`) VALUES
('2016-11-07 05:02:27', NULL, 100, '', NULL, 'QCHK000001', 1, '1006', 11.000000, 11.000000, 'KG', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2016-11-07 05:03:29', NULL, 100, '', NULL, 'QCHK000003', 1, '1007', 70.000000, 70.000000, 'DOZEN', 'passed', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imchkse`
--

CREATE TABLE `imchkse` (
  `imchksl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `zemail` varchar(100) NOT NULL,
  `xemail` varchar(100) DEFAULT NULL,
  `ximchksenum` varchar(20) NOT NULL,
  `xdate` date NOT NULL,
  `xsup` varchar(20) DEFAULT NULL,
  `xnote` varchar(500) DEFAULT NULL,
  `xdocnum` varchar(100) DEFAULT NULL,
  `xstr` varchar(100) DEFAULT NULL,
  `xflagimchk` varchar(10) NOT NULL DEFAULT 'Created',
  `xrecflag` varchar(10) NOT NULL DEFAULT 'Live',
  `xbranch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imchksedt`
--

CREATE TABLE `imchksedt` (
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `zemail` varchar(100) NOT NULL,
  `xemail` varchar(100) DEFAULT NULL,
  `ximchksenum` varchar(20) NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) NOT NULL,
  `xqtychecked` double(18,6) NOT NULL,
  `xqtypassed` double(18,6) NOT NULL,
  `xunit` varchar(50) DEFAULT NULL,
  `xnote` varchar(160) DEFAULT NULL,
  `xstr1` int(11) DEFAULT NULL,
  `xstr2` int(11) DEFAULT NULL,
  `xstr3` int(11) DEFAULT NULL,
  `xnum1` int(11) DEFAULT NULL,
  `xnum2` int(11) DEFAULT NULL,
  `xnum3` int(11) DEFAULT NULL,
  `xdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imdoreturn`
--

CREATE TABLE `imdoreturn` (
  `xreturnsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xreqdelnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdoreturnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xdodate` date NOT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imdoreturndet`
--

CREATE TABLE `imdoreturndet` (
  `xreturndetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xreqdelnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdoreturnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `xrowtrn` int(11) NOT NULL DEFAULT '0',
  `xrow` int(5) NOT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL DEFAULT '0',
  `xrate` double NOT NULL DEFAULT '0',
  `xratepur` double NOT NULL DEFAULT '0',
  `xstdcost` double NOT NULL DEFAULT '0',
  `xtaxrate` double NOT NULL DEFAULT '0',
  `xunit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xexch` double NOT NULL DEFAULT '1',
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xdisc` double NOT NULL DEFAULT '0',
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imreq`
--

CREATE TABLE `imreq` (
  `imreqsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `ximreqnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xnote` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imreqdeldet`
--

CREATE TABLE `imreqdeldet` (
  `xreqdeldetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xreqdelnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsonum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrowtrn` int(11) NOT NULL DEFAULT '0',
  `xrow` int(5) NOT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL DEFAULT '0',
  `xrate` double NOT NULL DEFAULT '0',
  `xratepur` double NOT NULL DEFAULT '0',
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xstdcost` double NOT NULL DEFAULT '0',
  `xtaxrate` double NOT NULL DEFAULT '0',
  `xunit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xexch` double NOT NULL DEFAULT '1',
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xdisc` double NOT NULL DEFAULT '0',
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imreqdeldet`
--

INSERT INTO `imreqdeldet` (`xreqdeldetsl`, `ztime`, `zemail`, `bizid`, `xdate`, `xreqdelnum`, `xsonum`, `xrowtrn`, `xrow`, `xcus`, `xitemcode`, `xitembatch`, `xwh`, `xbranch`, `xproj`, `xqty`, `xrate`, `xratepur`, `xtypestk`, `xstdcost`, `xtaxrate`, `xunit`, `xexch`, `xcur`, `xdisc`, `xtaxcode`, `xtaxscope`, `xvoucher`) VALUES
(62, '2018-04-05 11:51:24', 'admin@demo.com', 100, '2018-04-05', 'DO-784368', '353463', 40, 1, 'CUS0000003', 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Naya Palton', 'Naya Palton', 70, 28400, 21912, 'Stocking', 9542.453820506242, 0, '', 1, 'BDT', 0, NULL, NULL, NULL),
(63, '2018-04-05 12:11:51', 'admin@demo.com', 100, '2018-04-05', 'DO-873625', 'SORD640-000001', 41, 1, 'CUS0000002', 'WI-2212', 'WI-2212', 'Naya Palton', 'Naya Palton', 'Naya Palton', 10, 11800, 9266, 'Stocking', 9266, 0, '', 1, 'BDT', 0, NULL, NULL, NULL),
(23, '2018-03-24 09:11:39', 'rajib@dotbdsolutions.com', 100, '2018-03-24', 'RQDO639-000001', '', 0, 1, 'DIN0000001', 'WI-80DK', 'WI-80DK', 'Naya Palton', 'Naya Palton', 'Naya Palton', 2, 30900, 24552, 'Stocking', 30900, 0, '', 1, 'BDT', 0, NULL, NULL, NULL),
(24, '2018-03-25 05:38:15', 'rajib@dotbdsolutions.com', 100, '2018-03-25', 'RQDO639-000002', 'SORD-000001', 1, 1, 'DIN0000001', 'WI-5069S', 'WI-5069S', 'Naya Palton', 'Naya Palton', 'Naya Palton', 10, 52500, 42558, 'Stocking', 1265.1010701551727, 0, '', 1, 'BDT', 0, NULL, NULL, NULL),
(60, '2018-04-05 06:34:19', 'rajib@dotbdsolutions.com', 100, '2018-04-05', 'RQDO639-000003', 'SORD639-000010', 22, 1, 'DIN0000001', 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Naya Palton', 'Naya Palton', 5, 28400, 21912, 'Stocking', 9542.453820505185, 0, '', 1, 'BDT', 0, NULL, NULL, NULL),
(61, '2018-04-05 06:34:50', 'rajib@dotbdsolutions.com', 100, '2018-04-05', 'RQDO639-000003', 'SORD639-000010', 23, 2, 'DIN0000001', 'WI-60DK', 'WI-60DK', 'Naya Palton', 'Naya Palton', 'Naya Palton', 5, 22500, 16808, 'Stocking', 0, 0, '', 1, 'BDT', 0, NULL, NULL, NULL),
(69, '2018-09-19 11:47:40', 'admin@demo.com', 100, '2018-09-19', 'RQDO642-000001', '', 0, 1, 'CUS0000008', 'WI-5069S', 'WI-5069S', 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 2, 52500, 42558, 'Stocking', 68746.0260341697, 0, '', 1, 'BDT', 0, NULL, NULL, NULL),
(70, '2018-09-19 12:48:40', 'admin@demo.com', 100, '2018-09-19', 'RQDO642-000002', '', 0, 1, 'CUS0000008', 'WI-5069S', 'WI-5069S', 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 2, 52500, 42558, 'Stocking', 68746.0260341697, 0, '', 1, 'BDT', 0, NULL, NULL, NULL),
(71, '2018-09-20 10:35:41', 'admin@demo.com', 100, '2018-09-20', 'RQDO642-000003', '', 0, 1, 'CUS0000001', 'WI-5069S', 'WI-5069S', 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 1, 52500, 42558, 'Stocking', 68746.0260341697, 0, '', 1, 'BDT', 0, NULL, NULL, NULL),
(72, '2018-09-20 10:37:10', 'admin@demo.com', 100, '2018-09-20', 'RQDO642-000004', '', 0, 1, 'CUS0000008', 'WI-5069S', 'WI-5069S', 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 1, 52500, 42558, 'Stocking', 68746.0260341697, 0, '', 1, 'BDT', 0, NULL, NULL, NULL),
(28, '2018-04-01 08:59:55', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000001', 'SORD639-000004', 1, 1, 'CUS0000001', 'WI-3269A', 'WI-3269A', 'Head Office', 'Head Office', 'Head Office', 3, 22400, 0, 'Stocking', 0, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(29, '2018-04-01 08:59:55', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000001', 'SORD639-000004', 2, 2, 'CUS0000001', 'WI-16NZ', 'WI-16NZ', 'Head Office', 'Head Office', 'Head Office', 6, 37900, 0, 'Stocking', 0, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(30, '2018-04-01 09:02:20', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000002', 'SORD639-000004', 1, 1, 'CUS0000001', 'WI-3269A', 'WI-3269A', 'Head Office', 'Head Office', 'Head Office', 3, 22400, 0, 'Stocking', 0, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(31, '2018-04-01 09:02:20', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000002', 'SORD639-000004', 2, 2, 'CUS0000001', 'WI-16NZ', 'WI-16NZ', 'Head Office', 'Head Office', 'Head Office', 6, 37900, 0, 'Stocking', 0, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(32, '2018-04-01 09:05:34', 'admin@demo.com', 100, '2018-04-01', 'SODO000003', 'SORD-000006', 1, 1, 'DIN0000001', 'WI-80DK', 'WI-80DK', 'Mohanagar Project', 'Head Office', 'Head Office', 20, 0, 0, '', 14420, 0, '', 1, 'BDT', 0, 'BDT', 'None', NULL),
(33, '2018-04-01 09:06:02', 'admin@demo.com', 100, '2018-04-01', 'SODO000004', 'SORD-000006', 1, 1, 'DIN0000001', 'WI-80DK', 'WI-80DK', 'Mohanagar Project', 'Head Office', 'Head Office', 20, 0, 0, '', 14420, 0, '', 1, 'BDT', 0, 'BDT', 'None', NULL),
(34, '2018-04-01 09:18:31', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000005', 'SORD639-000002', 1, 1, 'DIN0000001', 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 3, 28400, 0, 'Stocking', 9466.666666666666, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(35, '2018-04-01 09:18:31', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000005', 'SORD639-000002', 2, 2, 'DIN0000001', 'WI-60DK', 'WI-60DK', 'Head Office', 'Head Office', 'Head Office', 5, 22500, 0, 'Stocking', 0, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(36, '2018-04-01 09:19:47', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000006', 'SORD639-000002', 1, 1, 'DIN0000001', 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 3, 28400, 0, 'Stocking', 9466.666666666666, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(37, '2018-04-01 09:19:47', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000006', 'SORD639-000002', 2, 2, 'DIN0000001', 'WI-60DK', 'WI-60DK', 'Head Office', 'Head Office', 'Head Office', 5, 22500, 0, 'Stocking', 0, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(38, '2018-04-01 09:23:47', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000007', 'SORD639-000003', 1, 1, 'DIN0000001', 'ULB-VL-500ml', 'ULB-VL-500ml', 'Head Office', 'Head Office', 'Head Office', 50, 78, 0, 'Stocking', 0, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(39, '2018-04-01 09:27:54', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000008', 'SORD639-000005', 1, 1, 'CUS0000001', 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 12, 28400, 0, 'Stocking', 9466.666666666666, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(40, '2018-04-01 09:29:21', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000009', 'SORD639-000006', 1, 1, 'CUS0000001', 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 12, 28400, 0, 'Stocking', 9466.666666666666, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(41, '2018-04-01 09:37:04', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000010', 'SORD639-000007', 1, 1, 'DIN0000001', 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 10, 28400, 0, 'Stocking', 9466.666666666666, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(42, '2018-04-01 09:39:36', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000011', 'SORD639-000008', 1, 1, 'CUS0000001', 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 1, 28400, 0, 'Stocking', 9466.666666666668, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(43, '2018-04-01 09:42:06', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000012', 'SORD639-000009', 1, 1, 'CUS0000001', 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 1, 28400, 0, 'Stocking', 9466.666666666668, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(44, '2018-04-01 09:52:48', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000013', 'SORD-000007', 1, 1, 'DIN0000001', 'WI-3269A', 'WI-3269A', 'Naya Palton', 'Head Office', 'Head Office', 2, 22400, 0, 'Stocking', 0, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(45, '2018-04-01 11:10:56', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000014', 'SORD-000009', 1, 1, 'CUS0000001', 'WI-3269S', 'WI-3269S', 'Naya Palton', 'Head Office', 'Head Office', 2, 24500, 0, 'Stocking', 0, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(46, '2018-04-01 13:42:12', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SODO000015', 'SORD-000008', 1, 1, 'CUS0000001', 'WI-3269A', 'WI-3269A', 'Naya Palton', 'Head Office', 'Head Office', 2, 22400, 0, 'Stocking', 0, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(47, '2018-04-02 09:14:28', 'admin@demo.com', 100, '2018-04-02', 'SODO000016', 'SORD-000004', 1, 1, 'DIN0000001', 'WI-80DK', 'WI-80DK', 'Mohanagar Project', 'Head Office', 'Head Office', 10, 0, 0, '', 14420, 0, '', 1, 'BDT', 0, 'BDT', 'None', NULL),
(48, '2018-04-02 09:18:54', 'admin@demo.com', 100, '2018-04-02', 'SODO000017', 'SORD-000005', 1, 1, '100000002', 'WI-80DK', 'WI-80DK', 'Mohanagar Project', 'Head Office', 'Head Office', 10, 0, 0, '', 14420, 0, '', 1, 'BDT', 0, 'BDT', 'None', NULL),
(49, '2018-04-02 09:20:18', '639', 100, '2018-04-02', 'SODO000018', 'SORD639-000001', 1, 1, 'DIN0000001', 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 12, 28400, 0, '', 9569.520661160606, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(50, '2018-04-02 09:20:18', '639', 100, '2018-04-02', 'SODO000018', 'SORD639-000001', 2, 2, 'DIN0000001', 'WI-1914', 'WI-1914', 'Head Office', 'Head Office', 'Head Office', 13, 8750, 0, '', 0, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(51, '2018-04-02 09:21:35', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SODO000019', 'SORD-000010', 1, 1, 'CUS0000001', 'WI-3269A', 'WI-3269A', 'Naya Palton', 'Head Office', 'Head Office', 1, 22400, 0, 'Stocking', 0, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(52, '2018-04-02 09:23:24', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SODO000020', 'SORD-000011', 1, 1, '100000002', 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 28400, 0, 'Stocking', 9569.520661160606, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(53, '2018-04-02 09:24:38', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SODO000021', 'SORD-000012', 1, 1, 'DIN0000001', 'WI-60DK', 'WI-60DK', 'Naya Palton', 'Head Office', 'Head Office', 2, 22500, 0, 'Stocking', 0, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(54, '2018-04-02 09:27:31', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SODO000022', 'SORD-000013', 1, 1, 'CUS0000001', 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 28400, 0, 'Stocking', 9569.520661160606, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(55, '2018-04-03 04:15:19', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'SODO000023', 'SORD-000019', 1, 1, '100000002', 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 28400, 0, 'Stocking', 9569.520661160606, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(56, '2018-04-03 04:15:53', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'SODO000024', 'SORD-000018', 1, 1, '100000002', 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 28400, 0, 'Stocking', 9569.520661160606, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(57, '2018-04-03 04:16:49', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'SODO000025', 'SORD-000021', 1, 1, 'DIN0000001', 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 28400, 0, 'Stocking', 9569.520661160606, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(58, '2018-04-03 04:27:52', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'SODO000026', 'SORD-000020', 1, 1, 'DIN0000001', 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 28400, 0, 'Stocking', 9569.520661160606, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(59, '2018-04-03 12:28:14', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'SODO000027', 'SORD639-000012', 1, 1, 'CUS0000001', 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 2, 28400, 0, 'Stocking', 9569.520661160606, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(64, '2018-04-12 06:50:02', 'admin@demo.com', 100, '2018-04-12', 'SODO000028', 'SORD640-000001', 1, 1, 'CUS0000002', 'WI-2212', 'WI-2212', 'Head Office', 'Head Office', 'Head Office', 10, 11800, 0, 'Stocking', 9266, 0, 'None', 1, 'BDT', 590, 'None', 'None', NULL),
(65, '2018-08-26 11:48:51', 'admin@demo.com', 100, '2018-08-26', 'SODO000029', 'SORD-000023', 1, 1, 'CUS0000009', 'ULB-WLB-130', 'ULB-WLB-130', 'Naya Palton', 'Naya Palton', 'Naya Palton', 50, 176, 16.75, 'Stocking', 17.5, 0, 'PCS', 1, 'BDT', 0, 'BDT', 'None', NULL),
(67, '2018-08-26 12:16:17', 'rajib@dotbdsolutions.com', 100, '2018-08-26', 'SODO000030', 'SORD639-000014', 1, 1, 'CUS0000006', 'WI-60DK', 'WI-60DK', 'Head Office', 'Head Office', 'Head Office', 2, 22500, 0, 'Stocking', 0, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(68, '2018-08-26 12:16:17', 'rajib@dotbdsolutions.com', 100, '2018-08-26', 'SODO000030', 'SORD639-000014', 2, 2, 'CUS0000006', 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 2, 28400, 0, 'Stocking', 38099.21995069801, 0, 'None', 1, 'BDT', 0, 'None', 'None', NULL),
(73, '2018-09-22 07:37:55', 'rajib@dotbdsolutions.com', 100, '2018-09-22', 'SODO000031', 'SORD-000028', 1, 1, 'DIN0000001', '7000-1', '7000-1', 'Naya Palton', 'Head Office', 'Head Office', 38, 26, 0, 'Stocking', 28.94736842105263, 0, 'PCS', 1, 'BDT', 0, 'None', 'None', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imreqdelmst`
--

CREATE TABLE `imreqdelmst` (
  `ximdelsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xreqdelnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsonum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xsalesdate` date NOT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgrossdisc` double NOT NULL DEFAULT '0',
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imreqdelmst`
--

INSERT INTO `imreqdelmst` (`ximdelsl`, `ztime`, `zutime`, `zemail`, `xemail`, `bizid`, `xreqdelnum`, `xsonum`, `xdate`, `xsalesdate`, `xcus`, `xgrossdisc`, `xmanager`, `xbranch`, `xwh`, `xproj`, `xstatus`, `xrecflag`, `xvoucher`, `xfinyear`, `xfinper`) VALUES
(53, '2018-04-05 11:51:24', NULL, 'admin@demo.com', NULL, 100, 'DO-784368', '353463', '2018-04-05', '2018-04-05', 'CUS0000003', 200, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2017, 10),
(54, '2018-04-05 12:11:51', NULL, 'admin@demo.com', NULL, 100, 'DO-873625', 'SORD640-000001', '2018-04-05', '2018-04-05', 'CUS0000002', 300, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2017, 10),
(20, '2018-03-24 09:11:39', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'RQDO639-000001', '', '2018-03-24', '2018-03-24', 'DIN0000001', 0, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2017, 9),
(21, '2018-03-25 05:38:15', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'RQDO639-000002', 'SORD-000001', '2018-03-25', '2018-03-25', 'DIN0000001', 0, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2017, 9),
(52, '2018-04-05 06:34:19', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'RQDO639-000003', 'SORD639-000010', '2018-04-05', '2018-04-05', 'DIN0000001', 0, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2017, 10),
(58, '2018-09-19 11:47:40', NULL, 'admin@demo.com', NULL, 100, 'RQDO642-000001', '', '2018-09-19', '2018-09-19', 'CUS0000008', 0, NULL, 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 'Confirmed', 'Live', NULL, 2018, 3),
(59, '2018-09-19 12:48:40', NULL, 'admin@demo.com', NULL, 100, 'RQDO642-000002', '', '2018-09-19', '2018-09-19', 'CUS0000008', 0, NULL, 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 'Created', 'Live', NULL, 2018, 3),
(60, '2018-09-20 10:35:41', NULL, 'admin@demo.com', NULL, 100, 'RQDO642-000003', '', '2018-09-20', '2018-09-20', 'CUS0000001', 0, NULL, 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 'Canceled', 'Live', NULL, 2018, 3),
(61, '2018-09-20 10:37:10', NULL, 'admin@demo.com', NULL, 100, 'RQDO642-000004', '', '2018-09-20', '2018-09-20', 'CUS0000008', 1000, NULL, 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 'Created', 'Live', NULL, 2018, 3),
(25, '2018-04-01 08:59:55', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000001', 'SORD639-000004', '2018-04-01', '2018-04-01', 'CUS0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', NULL, 2017, 10),
(26, '2018-04-01 09:02:20', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000002', 'SORD639-000004', '2018-04-01', '2018-04-01', 'CUS0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', NULL, 2017, 10),
(27, '2018-04-01 09:05:34', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000003', 'SORD-000006', '2018-04-01', '2018-01-02', 'DIN0000001', 0, NULL, 'Head Office', 'Mohanagar Project', 'Head Office', 'Confirmed', 'Live', NULL, 2017, 10),
(28, '2018-04-01 09:06:02', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000004', 'SORD-000006', '2018-04-01', '2018-01-02', 'DIN0000001', 0, NULL, 'Head Office', 'Mohanagar Project', 'Head Office', 'Confirmed', 'Live', NULL, 2017, 10),
(29, '2018-04-01 09:18:31', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000005', 'SORD639-000002', '2018-04-01', '2018-03-29', 'DIN0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(30, '2018-04-01 09:19:47', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000006', 'SORD639-000002', '2018-04-01', '2018-03-29', 'DIN0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(31, '2018-04-01 09:23:47', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000007', 'SORD639-000003', '2018-04-01', '2018-03-30', 'DIN0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(32, '2018-04-01 09:27:54', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000008', 'SORD639-000005', '2018-04-01', '2018-04-01', 'CUS0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(33, '2018-04-01 09:29:21', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000009', 'SORD639-000006', '2018-04-01', '2018-04-01', 'CUS0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(34, '2018-04-01 09:37:04', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000010', 'SORD639-000007', '2018-04-01', '2018-04-01', 'DIN0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', NULL, 2017, 10),
(35, '2018-04-01 09:39:36', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000011', 'SORD639-000008', '2018-04-01', '2018-04-01', 'CUS0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(36, '2018-04-01 09:42:06', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000012', 'SORD639-000009', '2018-04-01', '2018-04-01', 'CUS0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(37, '2018-04-01 09:52:48', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000013', 'SORD-000007', '2018-04-01', '2018-03-31', 'DIN0000001', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(38, '2018-04-01 11:10:56', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000014', 'SORD-000009', '2018-04-01', '2018-04-01', 'CUS0000001', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(39, '2018-04-01 13:42:12', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000015', 'SORD-000008', '2018-04-01', '2018-03-31', 'CUS0000001', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(40, '2018-04-02 09:14:28', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000016', 'SORD-000004', '2018-04-02', '2018-03-31', 'DIN0000001', 0, NULL, 'Head Office', 'Mohanagar Project', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(41, '2018-04-02 09:18:54', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000017', 'SORD-000005', '2018-04-02', '2018-03-31', '100000002', 0, NULL, 'Head Office', 'Mohanagar Project', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(42, '2018-04-02 09:20:18', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000018', 'SORD639-000001', '2018-04-02', '2018-03-25', 'DIN0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(43, '2018-04-02 09:21:35', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000019', 'SORD-000010', '2018-04-02', '2018-04-01', 'CUS0000001', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(44, '2018-04-02 09:23:24', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000020', 'SORD-000011', '2018-04-02', '2018-04-02', '100000002', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(45, '2018-04-02 09:24:38', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000021', 'SORD-000012', '2018-04-02', '2018-04-02', 'DIN0000001', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(46, '2018-04-02 09:27:31', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000022', 'SORD-000013', '2018-04-02', '2018-04-02', 'CUS0000001', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(47, '2018-04-03 04:15:19', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000023', 'SORD-000019', '2018-04-03', '2018-04-03', '100000002', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(48, '2018-04-03 04:15:52', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000024', 'SORD-000018', '2018-04-03', '2018-04-03', '100000002', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(49, '2018-04-03 04:16:49', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000025', 'SORD-000021', '2018-04-03', '2018-04-03', 'DIN0000001', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(50, '2018-04-03 04:27:52', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000026', 'SORD-000020', '2018-04-03', '2018-04-03', 'DIN0000001', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(51, '2018-04-03 12:28:14', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000027', 'SORD639-000012', '2018-04-03', '2018-04-03', 'CUS0000001', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Created', 'Live', NULL, 2017, 10),
(55, '2018-04-12 06:50:02', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000028', 'SORD640-000001', '2018-04-12', '2018-04-05', 'CUS0000002', 300, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', NULL, 2017, 10),
(56, '2018-08-26 11:48:51', '2018-08-26 11:49:40', 'admin@demo.com', 'admin@demo.com', 100, 'SODO000029', 'SORD-000023', '2018-08-26', '2018-08-26', 'CUS0000009', 0, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Canceled', 'Live', NULL, 2018, 2),
(57, '2018-08-26 12:16:17', NULL, 'admin@demo.com', NULL, 100, 'SODO000030', 'SORD639-000014', '2018-08-26', '2018-05-16', 'CUS0000006', 0, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', NULL, 2018, 2),
(62, '2018-09-22 07:37:55', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SODO000031', 'SORD-000028', '2018-09-22', '2018-09-22', 'DIN0000001', 0, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', NULL, 2018, 3);

-- --------------------------------------------------------

--
-- Table structure for table `imreqdet`
--

CREATE TABLE `imreqdet` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(6) NOT NULL,
  `ximreqnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xqty` double NOT NULL,
  `xrate` double NOT NULL DEFAULT '0',
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xdate` date NOT NULL,
  `stno` int(8) NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imsetxn`
--

CREATE TABLE `imsetxn` (
  `xprefix` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ximsesl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `txnnumber` varchar(20) NOT NULL,
  `ximsenum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(11) NOT NULL,
  `xdocnum` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrdin` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xitemcode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcat` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbrand` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcolor` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsize` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbarcode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsl` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsup` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsupdt` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcus` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcusdt` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xtorwh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xtorbranch` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xterminal` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstdcost` double NOT NULL DEFAULT '0',
  `xstdprice` double NOT NULL DEFAULT '0',
  `xqty` double NOT NULL DEFAULT '0',
  `xupdcost` double NOT NULL DEFAULT '0',
  `xupdprice` double NOT NULL DEFAULT '0',
  `xupdqty` double NOT NULL DEFAULT '0',
  `xupdsalesprice` double NOT NULL DEFAULT '0',
  `xupdstdcost` double NOT NULL DEFAULT '0',
  `xupdstdprice` double NOT NULL DEFAULT '0',
  `xsalesprice` double NOT NULL DEFAULT '0',
  `xuom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdisc` double NOT NULL DEFAULT '0',
  `xvatpct` double NOT NULL DEFAULT '0',
  `xvatamt` double NOT NULL DEFAULT '0',
  `xtxntype` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdocument` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdocumentrow` int(5) NOT NULL DEFAULT '0',
  `xcashamt` double NOT NULL DEFAULT '0',
  `xcardamt` double NOT NULL DEFAULT '0',
  `xbank` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xreturnamt` double NOT NULL DEFAULT '0',
  `xreturnimsenum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xstatus` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xsign` int(2) NOT NULL,
  `xdate` date NOT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xspotcom` double NOT NULL DEFAULT '0',
  `xpoint` double NOT NULL DEFAULT '0',
  `xsrctaxpct` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imtransfer`
--

CREATE TABLE `imtransfer` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `ximptnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xtxnwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xstatusrcv` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Open',
  `xnote` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imtransferdet`
--

CREATE TABLE `imtransferdet` (
  `xtransl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(6) NOT NULL,
  `ximptnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xqty` double NOT NULL,
  `xunit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstdcost` double NOT NULL,
  `xdate` date NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xtxnwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xdoctype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xsign` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mlminfo`
--

CREATE TABLE `mlminfo` (
  `distrisl` bigint(20) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `xpassword` varchar(264) COLLATE utf8_unicode_ci NOT NULL,
  `xshort` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xorg` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdob` date DEFAULT NULL,
  `xadd1` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xadd2` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbillingadd` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeliveryadd` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xprovince` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpostal` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcountry` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcontact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtitle` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcusemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xweburl` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xnid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xtaxno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xgcus` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpricegroup` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcustype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xindustryseg` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdiscountpct` double(18,6) DEFAULT NULL,
  `xagent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcommisionpct` double(18,6) DEFAULT NULL,
  `xcreditlimit` double(18,6) DEFAULT NULL,
  `xcreditterms` int(3) DEFAULT NULL,
  `zactive` int(1) DEFAULT NULL,
  `xrecflag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zrole` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsquestion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `membertype` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Member Customer',
  `cbin` int(11) NOT NULL,
  `xbank` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xacc` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mlmtotrep`
--

CREATE TABLE `mlmtotrep` (
  `xcomsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(6) NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `xdate` date NOT NULL,
  `stno` int(4) NOT NULL,
  `distrisl` int(11) DEFAULT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bin` int(11) NOT NULL,
  `mlevel` int(2) DEFAULT NULL,
  `leftcurpoint` int(10) DEFAULT NULL,
  `rightcurpoint` int(10) DEFAULT NULL,
  `leftcstpoint` int(10) DEFAULT NULL,
  `rightcstpoint` int(10) DEFAULT NULL,
  `lefttotalpoint` int(10) DEFAULT NULL,
  `righttotalpoint` int(10) DEFAULT NULL,
  `executivetype` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `leftcount` int(5) DEFAULT NULL,
  `rightcount` int(5) DEFAULT NULL,
  `fullmatch` int(1) DEFAULT NULL,
  `xcom` double DEFAULT NULL,
  `xsrctaxpct` double DEFAULT NULL,
  `xcomtype` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xrintype` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mlmtree`
--

CREATE TABLE `mlmtree` (
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xdate` date DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `bin` int(11) NOT NULL,
  `distrisl` bigint(20) NOT NULL,
  `upbin` int(11) NOT NULL DEFAULT '0',
  `updistrisl` bigint(20) NOT NULL DEFAULT '0',
  `upbc` int(4) NOT NULL DEFAULT '0',
  `leftbin` int(11) NOT NULL DEFAULT '0',
  `leftdistrisl` bigint(20) NOT NULL DEFAULT '0',
  `rightbin` int(11) NOT NULL DEFAULT '0',
  `rightdistrisl` bigint(20) NOT NULL DEFAULT '0',
  `refbin` int(11) NOT NULL DEFAULT '0',
  `refdistrisl` bigint(20) NOT NULL DEFAULT '0',
  `side` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `bc` int(4) NOT NULL,
  `treeposition` int(11) NOT NULL DEFAULT '0',
  `binpoint` int(6) NOT NULL DEFAULT '0',
  `centerpoint` int(6) NOT NULL DEFAULT '0',
  `leftcurpoint` bigint(20) NOT NULL DEFAULT '0',
  `rightcurpoint` bigint(20) NOT NULL DEFAULT '0',
  `lefthitpoint` bigint(20) NOT NULL DEFAULT '0',
  `righthitpoint` bigint(20) NOT NULL DEFAULT '0',
  `lefttotalpoint` bigint(20) NOT NULL DEFAULT '0',
  `righttotalpoint` bigint(20) NOT NULL DEFAULT '0',
  `leftflushpoint` bigint(20) NOT NULL DEFAULT '0',
  `rightflushpoint` bigint(20) NOT NULL DEFAULT '0',
  `leftcstpoint` bigint(20) DEFAULT '0',
  `rightcstpoint` bigint(20) NOT NULL DEFAULT '0',
  `basiccom` int(11) NOT NULL DEFAULT '0',
  `mlevel` int(2) NOT NULL DEFAULT '0',
  `fm` int(8) NOT NULL DEFAULT '0',
  `refcom` int(6) NOT NULL DEFAULT '0',
  `stno` int(8) NOT NULL DEFAULT '1',
  `xyear` int(4) NOT NULL DEFAULT '2017',
  `xper` int(2) NOT NULL DEFAULT '2',
  `bpointval` double NOT NULL DEFAULT '0',
  `sppointval` double NOT NULL DEFAULT '0',
  `executivetype` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Primary Distributor',
  `xuser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `binstatus` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Regular',
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xpoint` int(6) NOT NULL,
  `newentry` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `mlmtree`
--
DELIMITER $$
CREATE TRIGGER `treegen` AFTER INSERT ON `mlmtree` FOR EACH ROW BEGIN

   DECLARE done INT DEFAULT 0;	
   DECLARE vBin int(11);
   DECLARE cur_treegen cursor for select upbin from mlmtreegen where bin=NEW.upbin;
   DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
   
   insert into mlmtreegen (bizid, bin, upbin) values(NEW.bizid, NEW.bin, NEW.upbin);
   OPEN cur_treegen;
   
   cursor_loop: LOOP
   
	fetch cur_treegen into vBin;
	
		IF done = 1 THEN
            LEAVE cursor_loop;
        END IF;
	
	insert into mlmtreegen (bizid, bin, upbin) values(NEW.bizid, NEW.bin, vBin);
   
   END LOOP;
   
   CLOSE cur_treegen;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mlmtreeref`
--

CREATE TABLE `mlmtreeref` (
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(11) NOT NULL,
  `refsl` bigint(20) UNSIGNED NOT NULL,
  `bin` int(11) NOT NULL,
  `refbin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction`
--

CREATE TABLE `order_transaction` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoiceno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invoicesl` int(11) DEFAULT NULL,
  `zid` int(6) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopadd` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prdid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prdname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `xstatusord` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xordernum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xroword` int(5) DEFAULT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date DEFAULT NULL,
  `salestype` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbillrun` int(5) DEFAULT NULL,
  `xsign` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_transaction`
--

INSERT INTO `order_transaction` (`xsl`, `ztime`, `invoiceno`, `invoicesl`, `zid`, `username`, `shopid`, `shopname`, `shopadd`, `prdid`, `prdname`, `qty`, `price`, `xstatusord`, `xordernum`, `xroword`, `xterminal`, `xdate`, `salestype`, `xbillrun`, `xsign`) VALUES
(5, '2018-05-10 07:26:19', 'T0015', 5, 100, 'user1', '100000002', 'Tajmul', 'Mohakhali road ', 'ABL-KGP-24', '  Kokomo Gel Ballpen 24pcs', 2, 110, 'New', '', 0, 'T001', '2018-05-10', 'Retailer', NULL, NULL),
(7, '2018-05-10 07:26:19', 'T0015', 5, 100, 'user1', '100000002', 'Tajmul', 'Mohakhali road ', 'ABL-PD-2000', 'ABL Powder Drinks- 2kg', 2, 565, 'New', '', 0, 'T001', '2018-05-10', 'Retailer', NULL, NULL),
(6, '2018-05-10 07:26:19', 'T0015', 5, 100, 'user1', '100000002', 'Tajmul', 'Mohakhali road ', 'ABL-LVN-09', 'Laccha Semai 200gm X 3, Vermichelli Semai 200gm X3, Cocala Egg Noodles 150gm X 3,  Kokomo Gel Ballpen 12pcs', 1, 290, 'New', '', 0, 'T001', '2018-05-10', 'Retailer', NULL, NULL),
(8, '2018-05-10 07:26:19', 'T0015', 5, 100, 'user1', '100000002', 'Tajmul', 'Mohakhali road ', 'ABL-STC-005', 'Amarbazar Startup Training Course', 1, 1200, 'New', '', 0, 'T001', '2018-05-10', 'Retailer', NULL, NULL),
(11, '2018-05-10 07:28:09', 'T0016', 6, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', 'ABL-KGP-24', '  Kokomo Gel Ballpen 24pcs', 2, 120, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(9, '2018-05-10 07:28:09', 'T0016', 6, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', '7685899', 'RFL Plastic Door', 2, 900, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(10, '2018-05-10 07:28:09', 'T0016', 6, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', '8433278432', 'mi mobile', 6, 54000, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(12, '2018-05-10 08:33:32', 'T0017', 7, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', ' BEL-IRN-CON-1051', 'BESW-3188', 2, 1248, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(13, '2018-05-10 08:33:32', 'T0017', 7, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', 'ABL-AVG-1000', 'Aseel Vegetable Ghee-1kg', 2, 550, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(14, '2018-05-10 08:33:32', 'T0017', 7, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', 'SML-BWS-01', 'Bennet Whitening Soap', 2, 495, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(15, '2018-05-10 08:34:30', 'T0018', 8, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', ' BEL-IRN-CON-1051', 'BESW-3188', 2, 1248, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(17, '2018-05-10 08:34:30', 'T0018', 8, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', '11111111', 'test', 2, 0, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(16, '2018-05-10 08:34:30', 'T0018', 8, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', '11111', 'test', 3, 0, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(20, '2018-05-10 08:37:24', 'T0019', 9, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', '7685899', 'RFL Plastic Door', 5, 900, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(19, '2018-05-10 08:37:24', 'T0019', 9, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', '11111', 'test', 2, 0, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(18, '2018-05-10 08:37:24', 'T0019', 9, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', ' BEL-IRN-CON-1051', 'BESW-3188', 2, 1248, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(23, '2018-05-10 08:39:45', 'T00110', 10, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', 'ABL-MFP-BBT', 'Tazza Tea 400gm witth free Tea Jar', 2, 0, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(21, '2018-05-10 08:39:45', 'T00110', 10, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', ' BEL-IRN-CON-1051', 'BESW-3188', 2, 1248, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(22, '2018-05-10 08:39:45', 'T00110', 10, 100, 'user1', 'DIN0000001', 'MS MAA STORE', '', 'ABL-LVN-09', 'Laccha Semai 200gm X 3, Vermichelli Semai 200gm X3, Cocala Egg Noodles 150gm X 3,  Kokomo Gel Ballpen 12pcs', 2, 320, 'New', '', 0, 'T001', '2018-05-10', 'MRP', NULL, NULL),
(24, '2018-05-11 07:40:06', 'T 000000', 11, 100, 'user1', '100000002', 'Tajmul', 'Mohakhali road ', ' BEL-IRN-CON-1051', 'BESW-3188', 2, 1248, 'New', '', 0, 'T001', '2018-05-11', 'Return', NULL, NULL),
(25, '2018-05-11 07:40:06', 'T 000000', 11, 100, 'user1', '100000002', 'Tajmul', 'Mohakhali road ', '11111', 'test', 2, 0, 'New', '', 0, 'T001', '2018-05-11', 'Return', NULL, NULL),
(26, '2018-05-11 07:40:06', 'T 000000', 11, 100, 'user1', '100000002', 'Tajmul', 'Mohakhali road ', '1122', 'Chair', 2, 0, 'New', '', 0, 'T001', '2018-05-11', 'Return', NULL, NULL),
(27, '2018-05-11 07:40:06', 'T 000000', 11, 100, 'user1', '100000002', 'Tajmul', 'Mohakhali road ', '12121', 'teeee', 2, 0, 'New', '', 0, 'T001', '2018-05-11', 'Return', NULL, NULL),
(28, '2018-05-12 14:25:59', 'T00112', 12, 100, 'user1', '100000002', 'Tajmul', 'Mohakhali road ', '11111111', 'test', 2, 0, 'New', '', 0, 'T001', '2018-05-12', 'Retailer', NULL, NULL),
(31, '2018-05-12 05:47:12', 'T00113', 13, 100, 'user1', '100000008', 'xyz shop', 'Dhaka ', 'ABL-LVN-09', 'Laccha Semai 200gm X 3, Vermichelli Semai 200gm X3, Cocala Egg Noodles 150gm X 3,  Kokomo Gel Ballpen 12pcs', 1, 290, 'New', '', 0, 'T001', '2018-05-12', 'Retailer', NULL, NULL),
(30, '2018-05-12 05:47:12', 'T00113', 13, 100, 'user1', '100000008', 'xyz shop', 'Dhaka ', 'ABL-KGP-24', '  Kokomo Gel Ballpen 24pcs', 2, 110, 'New', '', 0, 'T001', '2018-05-12', 'Retailer', NULL, NULL),
(29, '2018-05-12 05:47:12', 'T00113', 13, 100, 'user1', '100000008', 'xyz shop', 'Dhaka ', 'ABL-AVG-1000', 'Aseel Vegetable Ghee-1kg', 2, 500, 'New', '', 0, 'T001', '2018-05-12', 'Retailer', NULL, NULL),
(32, '2018-06-01 12:42:59', 'T0021', 1, 100, 'rajib', 'DIN0000001', 'MS MAA STORE', '', '11111', 'test', 2, 0, 'New', '', 0, 'T002', '2018-06-01', 'MRP', NULL, NULL),
(33, '2018-06-05 12:20:44', 'T0022', 2, 100, 'rajib', 'DIN0000001', 'MS MAA STORE', '', '11111', 'test', 2, 0, 'New', '', 0, 'T002', '2018-06-05', 'MRP', NULL, NULL),
(34, '2018-06-05 12:37:32', 'T0023', 3, 100, 'rajib', 'DIN0000001', 'MS MAA STORE', '', '11111', 'test', 3, 0, 'New', '', 0, 'T002', '2018-06-05', 'MRP', NULL, NULL),
(36, '2018-06-07 08:57:33', 'T0024', 4, 100, 'rajib', 'DIN0000001', 'MS MAA STORE', '', 'ABL-STC-005', 'Amarbazar Startup Training Course', 5, 1200, 'New', '', 0, 'T002', '2018-06-07', 'MRP', NULL, NULL),
(35, '2018-06-07 08:57:33', 'T0024', 4, 100, 'rajib', 'DIN0000001', 'MS MAA STORE', '', 'ABL-STC-004', 'Amarbazar Startup Training Course', 2, 1200, 'New', '', 0, 'T002', '2018-06-07', 'MRP', NULL, NULL),
(38, '2018-09-11 08:51:25', 'T0041', 1, 100, 'Tajimul', '100000009', 'blala', 'dhaka', 'ACI-HWAC-250', 'Savlon Hand Wash(Active) 250ml', 2, 88, 'New', '', 0, 'T004', '2018-09-11', 'Retailer', NULL, NULL),
(37, '2018-09-11 08:51:25', 'T0041', 1, 100, 'Tajimul', '100000009', 'blala', 'dhaka', 'ABL-MAC-04', 'Mobile Anti Radiation Chip-04pcs', 3, 1340, 'New', '', 0, 'T004', '2018-09-11', 'Retailer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction_temp`
--

CREATE TABLE `order_transaction_temp` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoiceno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invoicesl` int(11) DEFAULT NULL,
  `zid` int(6) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopadd` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prdid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prdname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `xstatusord` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xordernum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xroword` int(5) DEFAULT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date DEFAULT NULL,
  `salestype` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbillrun` int(5) DEFAULT NULL,
  `xsign` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_transaction_temp`
--

INSERT INTO `order_transaction_temp` (`xsl`, `ztime`, `invoiceno`, `invoicesl`, `zid`, `username`, `shopid`, `shopname`, `shopadd`, `prdid`, `prdname`, `qty`, `price`, `xstatusord`, `xordernum`, `xroword`, `xterminal`, `xdate`, `salestype`, `xbillrun`, `xsign`) VALUES
(38, '2018-09-11 08:51:25', 'T0041', 1, 100, 'Tajimul', '100000009', 'blala', 'dhaka', 'ACI-HWAC-250', 'Savlon Hand Wash(Active) 250ml', 2, 88, 'New', '', 0, 'T004', '2018-09-11', 'Retailer', NULL, NULL),
(36, '2018-06-07 08:57:33', 'T0024', 4, 100, 'rajib', 'DIN0000001', 'MS MAA STORE', '', 'ABL-STC-005', 'Amarbazar Startup Training Course', 5, 1200, 'New', '', 0, 'T002', '2018-06-07', 'MRP', NULL, NULL),
(37, '2018-09-11 08:51:25', 'T0041', 1, 100, 'Tajimul', '100000009', 'blala', 'dhaka', 'ABL-MAC-04', 'Mobile Anti Radiation Chip-04pcs', 3, 1340, 'New', '', 0, 'T004', '2018-09-11', 'Retailer', NULL, NULL),
(35, '2018-06-07 08:57:33', 'T0024', 4, 100, 'rajib', 'DIN0000001', 'MS MAA STORE', '', 'ABL-STC-004', 'Amarbazar Startup Training Course', 2, 1200, 'New', '', 0, 'T002', '2018-06-07', 'MRP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `osptxn`
--

CREATE TABLE `osptxn` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `stno` int(8) NOT NULL,
  `xdate` date NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xamount` double NOT NULL,
  `xtxntype` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xsign` int(2) NOT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xdocno` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdoctype` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pabuziness`
--

CREATE TABLE `pabuziness` (
  `bizid` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `xdate` date NOT NULL,
  `bizshort` varchar(6) NOT NULL,
  `bizlong` varchar(150) NOT NULL,
  `bizadd1` varchar(250) NOT NULL,
  `bizadd2` varchar(250) DEFAULT NULL,
  `bizdistrict` varchar(30) DEFAULT NULL,
  `bizthana` varchar(50) DEFAULT NULL,
  `bizemail` varchar(50) DEFAULT NULL,
  `bizfax` varchar(20) DEFAULT NULL,
  `bizphone1` varchar(20) DEFAULT NULL,
  `bizphone2` varchar(20) DEFAULT NULL,
  `bizmobile` varchar(14) DEFAULT NULL,
  `bizcur` varchar(3) NOT NULL DEFAULT 'BDT',
  `bizvatpct` double(8,6) NOT NULL DEFAULT '0.000000',
  `bizchkinv` varchar(3) NOT NULL DEFAULT 'No',
  `bizdecimals` int(1) NOT NULL DEFAULT '2',
  `bizitemauto` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `bizcusauto` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `bizsupauto` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `bizdateformat` varchar(11) NOT NULL DEFAULT 'dd-MM-yyyy',
  `bizyearoffset` int(2) NOT NULL DEFAULT '6',
  `zactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pabuziness`
--

INSERT INTO `pabuziness` (`bizid`, `ztime`, `zutime`, `xdate`, `bizshort`, `bizlong`, `bizadd1`, `bizadd2`, `bizdistrict`, `bizthana`, `bizemail`, `bizfax`, `bizphone1`, `bizphone2`, `bizmobile`, `bizcur`, `bizvatpct`, `bizchkinv`, `bizdecimals`, `bizitemauto`, `bizcusauto`, `bizsupauto`, `bizdateformat`, `bizyearoffset`, `zactive`) VALUES
(100, '2016-09-18 05:34:10', NULL, '2016-09-18', 'AHL', 'AMAR HOSPITAL LTD.', 'House  # 333, Road # 22, New DOHS, Mohakhali, Dhaka-1206, Bangladesh', '', '', '', '', '', '', '', '', 'BDT', 0.000000, 'YES', 2, 'YES', 'YES', 'YES', 'dd-MM-yyyy', 6, 1),
(101, '2016-09-19 06:43:02', '0000-00-00 00:00:00', '2016-09-19', '3i', '3i Systems Ltd.', 'Dhanmondi, Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BDT', 0.000000, 'Yes', 2, 'NO', 'YES', 'YES', 'dd-MM-yyyy', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pamenus`
--

CREATE TABLE `pamenus` (
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(11) NOT NULL,
  `zrole` varchar(100) NOT NULL,
  `xmenuindex` int(5) NOT NULL DEFAULT '0',
  `xmenu` varchar(250) NOT NULL,
  `xsubmenu` varchar(250) NOT NULL,
  `xsubmenuindex` int(5) NOT NULL DEFAULT '0',
  `xurl` varchar(500) NOT NULL,
  `xmenuserial` bigint(20) UNSIGNED NOT NULL,
  `xmenutype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pamenus`
--

INSERT INTO `pamenus` (`ztime`, `bizid`, `zrole`, `xmenuindex`, `xmenu`, `xsubmenu`, `xsubmenuindex`, `xurl`, `xmenuserial`, `xmenutype`) VALUES
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'GL Settings', 'Acc Level1', 0, 'code/index/Acc Level1', 1988, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'GL Settings', 'Acc Level2', 0, 'code/index/Acc Level2', 1989, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'GL Settings', 'Acc Level3', 0, 'code/index/Acc Level3', 1990, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'GL Settings', 'Chart Of Acc', 0, 'glchart', 1986, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'GL Settings', 'Sub Account', 0, 'glchartsub', 1987, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'Gneneral Ledger', 'Balance Receive', 0, 'distbal', 1991, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'Gneneral Ledger', 'Cash Payment', 0, 'distcashnbankpay', 1992, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'Gneneral Ledger', 'GL Reports', 0, 'glrpt', 1997, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'Gneneral Ledger', 'Journal Voucher', 0, 'gljvvou', 1993, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'Gneneral Ledger', 'Payment Voucher', 0, 'glpayvou', 1994, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'Gneneral Ledger', 'Receipt Voucher', 0, 'glrcptvou', 1996, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ACCOUNTS', 0, 'Gneneral Ledger', 'Trade Receipt', 0, 'glrcptvoutrade', 1995, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ADMIN_ROLE', 0, 'Inventory', 'Transfer Receive List', 0, 'torrcvlist', 652, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ADMIN_ROLE', 0, 'User Roles', 'Role Management', 0, 'role', 654, 'Main Menu'),
('2017-07-14 23:09:25', 100, 'ADMIN_ROLE', 0, 'User Roles', 'User Management', 0, 'user', 653, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 9, 'Sales', 'Corporate POS', 4, 'posentrycorp', 4272, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 9, 'Sales', 'OSP POS', 2, 'posentry', 4271, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 5, 'Team Operation', '1 Product List', 6, 'itempicklist', 4267, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 5, 'Team Operation', '2 Customer From RIN', 7, 'customertemp', 4268, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 5, 'Team Operation', '3 Customer', 5, 'customers', 4266, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 5, 'Team Operation', '4 Retailer Registration', 1, 'distreg', 4262, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 5, 'Team Operation', '5 Retailer Tree', 4, 'disttree', 4265, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 5, 'Team Operation', '6 Placement', 3, 'distjoin', 4264, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 5, 'Team Operation', '7 Wallet', 2, 'distwallet', 4263, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 5, 'Team Operation', '8 Withdrawal Request', 8, 'distwithdraw', 4269, 'Main Menu'),
('2018-09-09 10:16:52', 100, 'DEFAULT', 5, 'Team Operation', '9 Balance Transfer', 9, 'distbaltransfer', 4270, 'Main Menu'),
('2017-11-04 23:34:20', 100, 'Delivery Confirmation-1', 0, 'Inventory', 'Delivery Confirmation', 0, 'distdelscope', 2709, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'Branch', 0, 'code/index/Branch', 2635, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'Color', 0, 'code/index/Color', 2626, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'IM Receive Prefix', 0, 'code/index/IM Receive Prefix', 2630, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'IM Transfer Prefix', 0, 'code/index/IM Transfer Prefix', 2631, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'Item Brand', 0, 'code/index/Item Brand', 2628, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'Item Category', 0, 'code/index/Item Category', 2625, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'Item Size', 0, 'code/index/Item Size', 2627, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'Sales Prefix', 0, 'code/index/Sales Prefix', 2632, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'Supplier', 0, 'code/index/Supplier', 2634, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'UOM', 0, 'code/index/UOM', 2629, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Code Settings', 'Warehouse', 0, 'code/index/Warehouse', 2633, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Core Settings', 'Item Master', 0, 'Items', 2612, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Core Settings', 'Outlet Setup', 0, 'supoutlet', 2611, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Core Settings', 'Supplier Master', 0, 'suppliers', 2610, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Inventory', 'Delivery Order', 0, 'imreqdo', 2607, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Inventory', 'Inventory Receive', 0, 'imsercv', 2605, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Inventory', 'Inventory Transfer', 0, 'imsetor', 2606, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Inventory', 'Requisition', 0, 'distreq', 2604, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Inventory', 'Stock', 0, 'imstock', 2608, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Inventory', 'Transfer Receive List', 0, 'torrcvlist', 2609, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Purchase', 'Confirm Delivery', 0, 'supundel/confirmdel', 2613, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Purchase', 'Goods Receive Note', 0, 'purchasegrn', 2616, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Purchase', 'PO From Requisition', 0, 'purchasefreq', 2615, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Purchase', 'PO Reports', 0, 'porpt', 2617, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Purchase', 'Purchase Order', 0, 'purchase', 2614, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Reports', 'Sales Detail Report', 0, 'salesdetail', 2622, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Reports', 'Sales Report', 0, 'salesreport', 2623, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Reports', 'Sales Return Report', 0, 'salesreturnreport', 2624, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Reports', 'Sales Summary Report', 0, 'salessumaryreport', 2621, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Sales', 'CIN Search', 0, 'distsearch', 2619, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Sales', 'POS Return', 0, 'posreturn', 2620, 'Main Menu'),
('2017-10-27 00:27:23', 100, 'DGM PRODUCT & INVENTORY', 0, 'Sales', 'Sales Order', 0, 'sales', 2618, 'Main Menu'),
('2017-08-29 01:21:20', 100, 'DIRECTOR ADMIN', 0, 'Core Settings', 'BC Transfer', 0, 'distbcchange', 2224, 'Main Menu'),
('2017-08-29 01:21:20', 100, 'DIRECTOR ADMIN', 0, 'Core Settings', 'RIN Update', 0, 'distregupdate', 2226, 'Main Menu'),
('2017-08-29 01:21:20', 100, 'DIRECTOR ADMIN', 0, 'Core Settings', 'Send Commission SMS', 0, 'distcomsms', 2225, 'Main Menu'),
('2017-08-29 01:21:20', 100, 'DIRECTOR ADMIN', 0, 'Prelaunch', 'Pre Retailer Registration', 0, 'distregtemp', 2222, 'Main Menu'),
('2017-08-29 01:21:20', 100, 'DIRECTOR ADMIN', 0, 'Prelaunch', 'Prelaunch Placement', 0, 'distjointemp', 2223, 'Main Menu'),
('2017-08-29 01:21:20', 100, 'DIRECTOR ADMIN', 0, 'Purchase', 'PO Reports', 0, 'porpt', 2227, 'Main Menu'),
('2017-09-12 01:03:02', 100, 'Director Finance', 0, 'GL Settings', 'Chart Of Acc', 0, 'glchart', 2364, 'Main Menu'),
('2017-09-12 01:03:02', 100, 'Director Finance', 0, 'GL Settings', 'Sub Account', 0, 'glchartsub', 2365, 'Main Menu'),
('2017-09-12 01:03:02', 100, 'Director Finance', 0, 'Gneneral Ledger', 'Balance Receive', 0, 'distbal', 2366, 'Main Menu'),
('2017-09-12 01:03:02', 100, 'Director Finance', 0, 'Gneneral Ledger', 'GL Reports', 0, 'glrpt', 2369, 'Main Menu'),
('2017-09-12 01:03:02', 100, 'Director Finance', 0, 'Gneneral Ledger', 'Journal Voucher', 0, 'gljvvou', 2367, 'Main Menu'),
('2017-09-12 01:03:02', 100, 'Director Finance', 0, 'Gneneral Ledger', 'Trade Receipt', 0, 'glrcptvoutrade', 2368, 'Main Menu'),
('2017-09-12 01:03:02', 100, 'Director Finance', 0, 'Prelaunch', 'Pre Retailer Registration', 0, 'distregtemp', 2361, 'Main Menu'),
('2017-09-12 01:03:02', 100, 'Director Finance', 0, 'Prelaunch', 'Prelaunch Placement', 0, 'distjointemp', 2362, 'Main Menu'),
('2017-09-12 01:03:02', 100, 'Director Finance', 0, 'Purchase', 'PO Reports', 0, 'porpt', 2363, 'Main Menu'),
('2017-08-29 02:26:10', 100, 'DIrector Training', 0, 'Prelaunch', 'Pre Retailer Registration', 0, 'distregtemp', 2228, 'Main Menu'),
('2017-08-29 02:26:10', 100, 'DIrector Training', 0, 'Prelaunch', 'Prelaunch Placement', 0, 'distjointemp', 2229, 'Main Menu'),
('2017-08-21 03:54:00', 100, 'HR_ADMIN', 0, 'Core Settings', 'BC Transfer', 0, 'distbcchange', 2152, 'Main Menu'),
('2017-08-21 03:54:00', 100, 'HR_ADMIN', 0, 'Core Settings', 'RIN Update', 0, 'distregupdate', 2153, 'Main Menu'),
('2017-08-22 00:12:27', 100, 'Inventory Management', 0, 'Inventory', 'Inventory Receive', 0, 'imsercv', 2155, 'Main Menu'),
('2017-08-22 00:12:27', 100, 'Inventory Management', 0, 'Inventory', 'Inventory Transfer', 0, 'imsetor', 2156, 'Main Menu'),
('2017-08-22 00:12:27', 100, 'Inventory Management', 0, 'Inventory', 'Requisition', 0, 'distreq', 2154, 'Main Menu'),
('2017-08-22 00:12:27', 100, 'Inventory Management', 0, 'Inventory', 'Stock', 0, 'imstock', 2157, 'Main Menu'),
('2017-08-22 00:12:27', 100, 'Inventory Management', 0, 'Inventory', 'Transfer Receive List', 0, 'torrcvlist', 2158, 'Main Menu'),
('2017-08-22 00:12:27', 100, 'Inventory Management', 0, 'Purchase', 'PO Reports', 0, 'porpt', 2159, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Code Settings', 'Branch', 0, 'code/index/Branch', 2534, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Code Settings', 'Color', 0, 'code/index/Color', 2528, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Code Settings', 'Item Brand', 0, 'code/index/Item Brand', 2530, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Code Settings', 'Item Category', 0, 'code/index/Item Category', 2527, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Code Settings', 'Item Size', 0, 'code/index/Item Size', 2529, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Code Settings', 'Supplier', 0, 'code/index/Supplier', 2533, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Code Settings', 'UOM', 0, 'code/index/UOM', 2531, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Code Settings', 'Warehouse', 0, 'code/index/Warehouse', 2532, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Core Settings', 'Item Master', 0, 'Items', 2521, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Core Settings', 'Outlet Setup', 0, 'supoutlet', 2520, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Inventory', 'Delivery Order', 0, 'imreqdo', 2518, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Inventory', 'Inventory Receive', 0, 'imsercv', 2516, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Inventory', 'Inventory Transfer', 0, 'imsetor', 2517, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Inventory', 'Stock', 0, 'imstock', 2519, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Operation', 'Delivered List', 0, 'supundel/undel', 2536, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Operation', 'Ordered List', 0, 'supundel', 2535, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Purchase', 'Goods Receive Note', 0, 'purchasegrn', 2522, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Reports', 'Sales Detail Report', 0, 'salesdetail', 2524, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Reports', 'Sales Report', 0, 'salesreport', 2525, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Reports', 'Sales Return Report', 0, 'salesreturnreport', 2526, 'Main Menu'),
('2017-10-16 22:58:08', 100, 'Inventory Receive & Product Delevery', 0, 'Reports', 'Sales Summary Report', 0, 'salessumaryreport', 2523, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'GL Settings', 'Acc Level1', 0, 'code/index/Acc Level1', 2233, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'GL Settings', 'Acc Level2', 0, 'code/index/Acc Level2', 2234, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'GL Settings', 'Acc Level3', 0, 'code/index/Acc Level3', 2235, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'GL Settings', 'Chart Of Acc', 0, 'glchart', 2231, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'GL Settings', 'Sub Account', 0, 'glchartsub', 2232, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'Gneneral Ledger', 'Balance Receive', 0, 'distbal', 2236, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'Gneneral Ledger', 'Cash Payment', 0, 'distcashnbankpay', 2237, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'Gneneral Ledger', 'GL Reports', 0, 'glrpt', 2242, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'Gneneral Ledger', 'Journal Voucher', 0, 'gljvvou', 2238, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'Gneneral Ledger', 'Payment Voucher', 0, 'glpayvou', 2239, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'Gneneral Ledger', 'Receipt Voucher', 0, 'glrcptvou', 2241, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'Gneneral Ledger', 'Trade Receipt', 0, 'glrcptvoutrade', 2240, 'Main Menu'),
('2017-08-29 02:53:57', 100, 'Manager Accounts', 0, 'Purchase', 'PO Reports', 0, 'porpt', 2230, 'Main Menu'),
('2017-04-29 05:08:16', 100, 'OPERATION', 0, 'User Roles', 'User Management', 0, 'user', 1581, 'Main Menu'),
('2017-07-26 23:16:09', 100, 'PAYNRCV', 0, 'Gneneral Ledger', 'Cash Payment', 0, 'distcashnbankpay', 2041, 'Main Menu'),
('2017-06-24 23:25:00', 100, 'PRELAUNCH', 0, 'Prelaunch', 'Pre Retailer Registration', 0, 'distregtemp', 1939, 'Main Menu'),
('2017-06-24 23:25:00', 100, 'PRELAUNCH', 0, 'Prelaunch', 'Prelaunch Placement', 0, 'distjointemp', 1940, 'Main Menu'),
('2017-06-24 23:25:00', 100, 'PRELAUNCH', 0, 'Team Operation', 'Customer From RIN', 0, 'customertemp', 1942, 'Main Menu'),
('2017-06-24 23:25:00', 100, 'PRELAUNCH', 0, 'Team Operation', 'Retailer Tree', 0, 'disttree', 1941, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Code Settings', 'Branch', 0, 'code/index/Branch', 2513, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Code Settings', 'Color', 0, 'code/index/Color', 2507, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Code Settings', 'Item Brand', 0, 'code/index/Item Brand', 2509, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Code Settings', 'Item Category', 0, 'code/index/Item Category', 2506, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Code Settings', 'Item Size', 0, 'code/index/Item Size', 2508, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Code Settings', 'Supplier', 0, 'code/index/Supplier', 2512, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Code Settings', 'UOM', 0, 'code/index/UOM', 2510, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Code Settings', 'Warehouse', 0, 'code/index/Warehouse', 2511, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Core Settings', 'Item Master', 0, 'Items', 2501, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Core Settings', 'Outlet Setup', 0, 'supoutlet', 2500, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Core Settings', 'Supplier Master', 0, 'suppliers', 2499, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Inventory', 'Delivery Order', 0, 'imreqdo', 2496, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Inventory', 'Inventory Receive', 0, 'imsercv', 2494, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Inventory', 'Inventory Transfer', 0, 'imsetor', 2495, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Inventory', 'Requisition', 0, 'distreq', 2493, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Inventory', 'Stock', 0, 'imstock', 2497, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Inventory', 'Transfer Receive List', 0, 'torrcvlist', 2498, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Operation', 'Delivered List', 0, 'supundel/undel', 2515, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Operation', 'Ordered List', 0, 'supundel', 2514, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Purchase', 'Confirm Delivery', 0, 'supundel/confirmdel', 2502, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Purchase', 'Goods Receive Note', 0, 'purchasegrn', 2505, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Purchase', 'PO From Requisition', 0, 'purchasefreq', 2504, 'Main Menu'),
('2017-10-15 06:38:59', 100, 'Product & inventory Control', 0, 'Purchase', 'Purchase Order', 0, 'purchase', 2503, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'Branch', 0, 'code/index/Branch', 2556, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'Color', 0, 'code/index/Color', 2546, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'Currency', 0, 'code/index/Currency', 2547, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'IM Receive Prefix', 0, 'code/index/IM Receive Prefix', 2551, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'IM Transfer Prefix', 0, 'code/index/IM Transfer Prefix', 2552, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'Item Brand', 0, 'code/index/Item Brand', 2549, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'Item Category', 0, 'code/index/Item Category', 2545, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'Item Size', 0, 'code/index/Item Size', 2548, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'Sales Prefix', 0, 'code/index/Sales Prefix', 2553, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'Supplier', 0, 'code/index/Supplier', 2555, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'UOM', 0, 'code/index/UOM', 2550, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Code Settings', 'Warehouse', 0, 'code/index/Warehouse', 2554, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Core Settings', 'Item Master', 0, 'Items', 2543, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Core Settings', 'Outlet Setup', 0, 'supoutlet', 2542, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Inventory', 'Delivery Order', 0, 'imreqdo', 2539, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Inventory', 'Inventory Receive', 0, 'imsercv', 2537, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Inventory', 'Inventory Transfer', 0, 'imsetor', 2538, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Inventory', 'Stock', 0, 'imstock', 2540, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Inventory', 'Transfer Receive List', 0, 'torrcvlist', 2541, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Operation', 'Delivered List', 0, 'supundel/undel', 2558, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Operation', 'Ordered List', 0, 'supundel', 2557, 'Main Menu'),
('2017-10-16 23:11:04', 100, 'Product Receive & Delevery  Management', 0, 'Purchase', 'Goods Receive Note', 0, 'purchasegrn', 2544, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Code Settings', 'Bank', 0, 'code/index/Bank', 2587, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Code Settings', 'Color', 0, 'code/index/Color', 2583, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Code Settings', 'Currency', 0, 'code/index/Currency', 2584, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Code Settings', 'IM Transfer Prefix', 0, 'code/index/IM Transfer Prefix', 2589, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Code Settings', 'Item Brand', 0, 'code/index/Item Brand', 2586, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Code Settings', 'Item Category', 0, 'code/index/Item Category', 2582, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Code Settings', 'Item Size', 0, 'code/index/Item Size', 2585, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Code Settings', 'Sales Prefix', 0, 'code/index/Sales Prefix', 2590, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Code Settings', 'Supplier', 0, 'code/index/Supplier', 2591, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Code Settings', 'UOM', 0, 'code/index/UOM', 2588, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Core Settings', 'Item Master', 0, 'Items', 2576, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Core Settings', 'Supplier Master', 0, 'suppliers', 2575, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Purchase', 'Confirm Delivery', 0, 'supundel/confirmdel', 2577, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Purchase', 'Goods Receive Note', 0, 'purchasegrn', 2580, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Purchase', 'PO From Requisition', 0, 'purchasefreq', 2579, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Purchase', 'PO Reports', 0, 'porpt', 2581, 'Main Menu'),
('2017-10-27 00:20:40', 100, 'PURCHASE', 0, 'Purchase', 'Purchase Order', 0, 'purchase', 2578, 'Main Menu'),
('2017-09-04 23:06:06', 100, 'RIN UPDATE', 0, 'Core Settings', 'RIN Update', 0, 'distregupdate', 2352, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 2, 'Core Settings', 'Business Page', 5, 'bizdef', 4558, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 2, 'Core Settings', 'Customer Database', 2, 'customers', 4555, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 2, 'Core Settings', 'Item Database', 1, 'items', 4554, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 2, 'Core Settings', 'Supplier Database', 3, 'suppliers', 4556, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 2, 'Core Settings', 'Tax Setup', 4, 'taxcode', 4557, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Bank', 13, 'code/index/Bank', 4546, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'BOM Cost Head', 5, 'code/index/BOM Cost Head', 4538, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Branch', 20, 'code/index/Branch', 4553, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Color', 4, 'code/index/Color', 4537, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Currency', 6, 'code/index/Currency', 4539, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Customer Prefix', 11, 'code/index/Customer Prefix', 4544, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'GL Prefix', 3, 'code/index/GL Prefix', 4536, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'IM Receive Prefix', 15, 'code/index/IM Receive Prefix', 4548, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'IM Transfer Prefix', 16, 'code/index/IM Transfer Prefix', 4549, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Item Brand', 12, 'code/index/Item Brand', 4545, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Item Category', 1, 'code/index/Item Category', 4534, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Item Prefix', 9, 'code/index/Item Prefix', 4542, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Item Size', 8, 'code/index/Item Size', 4541, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'PO Cost Head', 7, 'code/index/PO Cost Head', 4540, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Project', 2, 'code/index/Project', 4535, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Purchase Prefix', 17, 'code/index/Purchase Prefix', 4550, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Sales Prefix', 18, 'code/index/Sales Prefix', 4551, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Supplier Prefix', 10, 'code/index/Supplier Prefix', 4543, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'UOM', 14, 'code/index/UOM', 4547, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 1, 'General Settings', 'Warehouse', 19, 'code/index/Warehouse', 4552, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 7, 'GL Interface', 'DO Return Interface', 4, 'glinterface/index/DO Return Interface', 4583, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 7, 'GL Interface', 'GL DO Interface', 3, 'glinterface/index/GL DO Interface', 4582, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 7, 'GL Interface', 'GL GRN Interface', 2, 'glinterface/index/GL GRN Interface', 4581, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 7, 'GL Interface', 'GL Sales Interface', 1, 'glinterface/index/GL Sales Interface', 4580, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 7, 'GL Interface', 'PO Return Interface', 5, 'glinterface/index/PO Return Interface', 4584, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 6, 'GL Settings', 'Acc Level1', 1, 'code/index/Acc Level1', 4575, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 6, 'GL Settings', 'Acc Level2', 2, 'code/index/Acc Level2', 4576, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 6, 'GL Settings', 'Acc Level3', 3, 'code/index/Acc Level3', 4577, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 6, 'GL Settings', 'Chart Of Accounts', 4, 'glchart', 4578, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 6, 'GL Settings', 'Sub Account', 5, 'glchartsub', 4579, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 8, 'Gneneral Ledger', 'Cheque Register', 8, 'glchequeregister', 4592, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 8, 'Gneneral Ledger', 'GL Reports', 9, 'glrpt', 4593, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 8, 'Gneneral Ledger', 'Journal Voucher', 2, 'gljvvou', 4586, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 8, 'Gneneral Ledger', 'JV Single Entry', 3, 'gljvsingle', 4587, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 8, 'Gneneral Ledger', 'Opening Balance', 1, 'glopening', 4585, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 8, 'Gneneral Ledger', 'Payment Voucher', 3, 'glpayvou', 4588, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 8, 'Gneneral Ledger', 'Receipt Voucher', 4, 'glrcptvou', 4589, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 8, 'Gneneral Ledger', 'Trade Payment', 6, 'glrpayvoutrade', 4590, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 8, 'Gneneral Ledger', 'Trade Receipt', 7, 'glrcptvoutrade', 4591, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 5, 'Inventory', 'Inventory Reports', 5, 'imrpt', 4574, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 5, 'Inventory', 'Stock Status', 4, 'imstock', 4573, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 5, 'Inventory', 'Stock Transfer', 3, 'diststocktransfer', 4572, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 9, 'Manufacturing', 'Bill Of Material', 1, 'pmbom', 4594, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 9, 'Manufacturing', 'BOM Additional Cost', 2, 'pmbomcost', 4595, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 9, 'Manufacturing', 'Finished Goods Receive', 3, 'pmfgr', 4596, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 3, 'Purchase', 'Additional Purchase Cost', 4, 'purchasecost', 4562, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 3, 'Purchase', 'Goods Receipt Note', 5, 'purchasegrn', 4563, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 3, 'Purchase', 'International Purchase', 3, 'purchaseint', 4561, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 3, 'Purchase', 'Local Purchase', 2, 'purchase', 4560, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 3, 'Purchase', 'Purchase Reports', 7, 'porpt', 4565, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 3, 'Purchase', 'Purchase Requisition', 1, 'distreq', 4559, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 3, 'Purchase', 'Purchase Return', 6, 'purchasereturn', 4564, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 4, 'Sales', 'Delivery Order', 3, 'imreqdo', 4568, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 4, 'Sales', 'Delivery Return', 4, 'imreturn', 4569, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 4, 'Sales', 'Employee Movement Map', 5, 'movementmap', 4570, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 4, 'Sales', 'Sales Order', 2, 'sales', 4567, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 4, 'Sales', 'Sales Quotation', 1, 'salesquot', 4566, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 4, 'Sales', 'Sales Reports', 6, 'sorpt', 4571, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 10, 'User Roles', 'Role Management', 2, 'role', 4598, 'Main Menu'),
('2018-09-16 09:53:12', 100, 'ROLE_ADMIN', 10, 'User Roles', 'User Management', 1, 'user', 4597, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Code Settings', 'Color', 0, 'code/index/Color', 2599, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Code Settings', 'Currency', 0, 'code/index/Currency', 2600, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Code Settings', 'Item Brand', 0, 'code/index/Item Brand', 2602, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Code Settings', 'Item Category', 0, 'code/index/Item Category', 2598, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Code Settings', 'Item Size', 0, 'code/index/Item Size', 2601, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Code Settings', 'UOM', 0, 'code/index/UOM', 2603, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Core Settings', 'Item Master', 0, 'Items', 2596, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Core Settings', 'Outlet Setup', 0, 'supoutlet', 2595, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Core Settings', 'Reference Update', 0, 'distrefupdate', 2593, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Core Settings', 'RIN Update', 0, 'distregupdate', 2597, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Core Settings', 'Send Commission SMS', 0, 'distcomsms', 2594, 'Main Menu'),
('2017-10-27 00:23:55', 100, 'ROLE_OP', 0, 'Core Settings', 'Supplier Master', 0, 'suppliers', 2592, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'GL Settings', 'Acc Level1', 0, 'code/index/Acc Level1', 2639, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'GL Settings', 'Acc Level2', 0, 'code/index/Acc Level2', 2640, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'GL Settings', 'Acc Level3', 0, 'code/index/Acc Level3', 2641, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'GL Settings', 'Chart Of Acc', 0, 'glchart', 2637, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'GL Settings', 'Sub Account', 0, 'glchartsub', 2638, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'Gneneral Ledger', 'Cash Payment', 0, 'distcashnbankpay', 2642, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'Gneneral Ledger', 'GL Reports', 0, 'glrpt', 2646, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'Gneneral Ledger', 'Journal Voucher', 0, 'gljvvou', 2643, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'Gneneral Ledger', 'Payment Voucher', 0, 'glpayvou', 2644, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'Gneneral Ledger', 'Receipt Voucher', 0, 'glrcptvou', 2645, 'Main Menu'),
('2017-10-30 06:38:28', 100, 'Test Accounts', 0, 'Purchase', 'PO Reports', 0, 'porpt', 2636, 'Main Menu'),
('2017-10-17 00:47:36', 100, 'TOPUP', 0, 'Gneneral Ledger', 'Balance Receive', 0, 'distbal', 2560, 'Main Menu'),
('2017-10-17 00:47:36', 100, 'TOPUP', 0, 'Gneneral Ledger', 'GL Reports', 0, 'glrpt', 2561, 'Main Menu'),
('2017-10-17 00:47:36', 100, 'TOPUP', 0, 'Team Operation', '8 Withdrawal Request', 0, 'distwithdraw', 2559, 'Main Menu'),
('2017-09-22 04:06:37', 100, 'Training management', 0, 'Purchase', 'Confirm Delivery', 0, 'supundel/confirmdel', 2370, 'Main Menu'),
('2017-08-29 22:36:15', 100, 'VENDOR', 0, 'Operation', 'Delivered List', 0, 'supundel/undel', 2291, 'Main Menu'),
('2017-08-29 22:36:15', 100, 'VENDOR', 0, 'Operation', 'Ordered List', 0, 'supundel', 2290, 'Main Menu');

-- --------------------------------------------------------

--
-- Table structure for table `paroles`
--

CREATE TABLE `paroles` (
  `xroleid` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` timestamp NULL DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `zrole` varchar(100) CHARACTER SET latin1 NOT NULL,
  `xkeymenu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsubmenu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paroles`
--

INSERT INTO `paroles` (`xroleid`, `ztime`, `zutime`, `zemail`, `xemail`, `bizid`, `zrole`, `xkeymenu`, `xsubmenu`, `xrecflag`) VALUES
(36, '2017-06-09 08:34:08', NULL, NULL, NULL, 100, 'ACCOUNTS', NULL, NULL, 'Live'),
(32, '2016-11-15 14:11:41', NULL, '', NULL, 100, 'ADMIN_ROLE', NULL, NULL, 'Live'),
(33, '2017-04-18 13:21:17', NULL, NULL, NULL, 100, 'DEFAULT', NULL, NULL, 'Live'),
(55, '2017-11-05 05:34:20', NULL, NULL, NULL, 100, 'Delivery Confirmation-1', NULL, NULL, 'Live'),
(54, '2017-10-27 06:27:23', NULL, NULL, NULL, 100, 'DGM PRODUCT & INVENTORY', NULL, NULL, 'Live'),
(44, '2017-08-29 07:21:20', NULL, NULL, NULL, 100, 'DIRECTOR ADMIN', NULL, NULL, 'Live'),
(43, '2017-08-29 06:56:06', NULL, NULL, NULL, 100, 'Director Finance', NULL, NULL, 'Live'),
(45, '2017-08-29 08:26:10', NULL, NULL, NULL, 100, 'DIrector Training', NULL, NULL, 'Live'),
(41, '2017-08-21 09:54:00', NULL, NULL, NULL, 100, 'HR_ADMIN', NULL, NULL, 'Live'),
(42, '2017-08-22 06:12:27', NULL, NULL, NULL, 100, 'Inventory Management', NULL, NULL, 'Live'),
(52, '2017-10-17 04:58:08', NULL, NULL, NULL, 100, 'Inventory Receive & Product Delevery', NULL, NULL, 'Live'),
(46, '2017-08-29 08:53:57', NULL, NULL, NULL, 100, 'Manager Accounts', NULL, NULL, 'Live'),
(34, '2017-04-29 11:08:16', NULL, NULL, NULL, 100, 'OPERATION', NULL, NULL, 'Live'),
(40, '2017-07-27 05:16:09', NULL, NULL, NULL, 100, 'PAYNRCV', NULL, NULL, 'Live'),
(39, '2017-06-25 02:55:33', NULL, NULL, NULL, 100, 'PRELAUNCH', NULL, NULL, 'Live'),
(51, '2017-10-15 12:38:58', NULL, NULL, NULL, 100, 'Product & inventory Control', NULL, NULL, 'Live'),
(53, '2017-10-17 05:11:04', NULL, NULL, NULL, 100, 'Product Receive & Delevery  Management', NULL, NULL, 'Live'),
(37, '2017-06-13 06:49:45', NULL, NULL, NULL, 100, 'PURCHASE', NULL, NULL, 'Live'),
(48, '2017-09-05 05:06:06', NULL, NULL, NULL, 100, 'RIN UPDATE', NULL, NULL, 'Live'),
(1, '2016-10-10 06:27:10', NULL, '', 'abc@abc.com', 100, 'ROLE_ADMIN', '', '', 'Live'),
(35, '2017-06-03 06:55:19', NULL, NULL, NULL, 100, 'ROLE_OP', NULL, NULL, 'Live'),
(50, '2017-10-02 09:28:06', NULL, NULL, NULL, 100, 'Test Accounts ', NULL, NULL, 'Live'),
(38, '2017-06-15 13:52:53', NULL, NULL, NULL, 100, 'TOPUP', NULL, NULL, 'Live'),
(49, '2017-09-22 10:06:37', NULL, NULL, NULL, 100, 'Training management', NULL, NULL, 'Live'),
(47, '2017-08-30 04:36:15', NULL, NULL, NULL, 100, 'VENDOR', NULL, NULL, 'Live'),
(4, '2016-10-10 06:27:10', NULL, '', 'rajib@pureapp.com', 101, 'ROLE_ADMIN', 'User Roles', 'Role Management', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `pausers`
--

CREATE TABLE `pausers` (
  `xusersl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` timestamp NULL DEFAULT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `xuserrow` int(5) NOT NULL,
  `zemail` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zpassword` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zrole` varchar(100) NOT NULL DEFAULT '',
  `xbranch` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` int(1) NOT NULL DEFAULT '1',
  `zuserfullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zusermobile` varchar(17) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zuseradd` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zaltemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zcomments` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Live',
  `bin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pausers`
--

INSERT INTO `pausers` (`xusersl`, `ztime`, `zutime`, `xemail`, `bizid`, `xuserrow`, `zemail`, `zpassword`, `zrole`, `xbranch`, `zactive`, `zuserfullname`, `zusermobile`, `zuseradd`, `zaltemail`, `zcomments`, `xrecflag`, `bin`) VALUES
(14, '2017-04-20 05:48:10', NULL, NULL, 100, 11, 'ABL-777-0005@abl.com', '45c9238e744a304f7b97afb905b32034c1fb10891819941315ea4dfb1465ad7c', 'Director Finance', 'Dhaka', 1, 'Sheikh Md Jahangir Miah', '01716002929', 'vill: sakuchail, p/o- chhatiain, p/s - madhabpur, dist : Habiganj.', 'ABL-777-0005@abl.com', '', 'Live', '792'),
(15, '2017-04-20 05:52:11', NULL, NULL, 100, 12, 'ABL-777-0007@abl.com', 'ad18e3c7817232465492a0a79e424c1fe6e4ac8375791fa02010df35110796a9', 'ROLE_ADMIN', 'ABL-777-0007', 1, 'Md Ashraful Amin', '+8801621177777', '', 'ABL-777-0007@abl.com', '', 'Live', '789'),
(18, '2017-04-21 03:52:23', NULL, NULL, 100, 15, 'ABL-777-0010@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'DIRECTOR ADMIN', 'Dhaka', 1, 'Golam Rabbani', '0', '', 'ABL-777-0010@abl.com', '', 'Live', '788'),
(73, '2017-04-30 07:36:10', NULL, NULL, 100, 68, 'ABL-789-0008@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'DIrector Training', 'Dhaka', 1, 'Tazul Islam', '0', '', 'ABL-789-0008@abl.com', '', 'Live', '2808'),
(74, '2017-04-30 07:38:18', NULL, NULL, 100, 69, 'ABL-789-0009@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'RIN UPDATE', 'Dhaka', 1, 'Mohammad Jamil uddin', '0', '', 'ABL-789-0009@abl.com', '', 'Live', '2809'),
(640, '2017-07-24 05:34:42', NULL, NULL, 100, 598, 'abldppahmed@gmail.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'PURCHASE', 'Head Office', 1, 'Sultan Ahmed', '01711979505', 'Banasree, Rampura ,Dhaka- 1219', 'abldppahmed@gmail.com', '', 'Live', '0'),
(685, '2018-09-10 09:26:21', NULL, NULL, 100, 642, 'admin@demo.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'ROLE_ADMIN', 'Head Office', 1, 'admin', '0', '', 'admin@demo.com', '', 'Live', ''),
(635, '2017-07-18 05:53:01', NULL, NULL, 100, 593, 'alam@amarbazarltd.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'PURCHASE', 'Head Office', 1, 'Md Shamsul Alam', '0', '', 'alam@amarbazaltd.com', '', 'Live', '786'),
(577, '2017-06-13 00:52:17', NULL, NULL, 100, 544, 'alom.purchase@abl.com', '3742a32e500066af49daa1b26f5de1768158b53faf7930f2d69e7fd5c21b8dd7', 'PURCHASE', 'Head Office', 1, 'Shamsul Alom', '0', '', 'alom.purchase@abl.com', '', 'Live', '0'),
(8, '2017-02-17 13:38:42', NULL, NULL, 100, 5, 'amin@xyzcompany.com', '3742a32e500066af49daa1b26f5de1768158b53faf7930f2d69e7fd5c21b8dd7', 'ROLE_ADMIN', 'Head Office', 1, 'Md. Rafiqul Amin', '0', 'Dhaka', 'amin@xyzcompany.com', '', 'Live', '0'),
(683, '2018-03-10 09:52:57', NULL, NULL, 100, 640, 'apiuser', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'ROLE_ADMIN', 'Head Office', 1, 'H M Sahadat', '01711036168', '', 'admin@demo.com', '', 'Live', ''),
(661, '2017-10-02 03:29:46', NULL, NULL, 100, 618, 'bakuldatta@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Test Accounts ', 'Dhaka', 1, 'Bakul Datta', '0', '', 'bakuldatta@abl.com', '', 'Live', '0'),
(675, '2017-11-04 23:36:38', NULL, NULL, 100, 632, 'Delivery@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Delivery Confirmation-1', 'Head Office', 1, 'Aminul Islam', '0', '', 'Delivery@abl.com', '', 'Live', '0'),
(655, '2017-09-10 03:53:40', NULL, NULL, 100, 613, 'df@abl.com', 'de4b5f95002991e3d8914b39ecc0626cc11ec3fd48628e59be1f201367d11b0a', 'Director Finance', 'Head Office', 1, 'Sheikh md jahangir miah', '01716002929', 'Vill: Sakuchail, P/O- Chhatiain, P/S- Madhabpur, Dist- Habiganj - 3300.', 'abldfjahangir@gmail.com', '', 'Live', '792'),
(664, '2017-10-15 06:36:09', NULL, NULL, 100, 621, 'dgmproduct@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'DGM PRODUCT & INVENTORY', 'Head Office', 1, 'Aminul Islam', '01711069830', '', 'dgmproduct@abl.com', '', 'Live', '0'),
(666, '2017-10-16 23:14:15', NULL, NULL, 100, 623, 'directorproduct@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Product & inventory Control', 'Head Office', 1, 'Abdul Hannan', '0', '', 'directorproduct@abl.com', '', 'Live', '0'),
(669, '2017-10-25 00:43:51', NULL, NULL, 100, 626, 'dp@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'PURCHASE', 'Head Office', 1, 'Sultan Ahmed ', '0', '', 'dp@abl.com', '', 'Live', '0'),
(677, '2017-11-05 00:54:21', NULL, NULL, 100, 634, 'Iarat@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Delivery Confirmation-1', 'Head Office', 1, 'Israt', '0', '', 'Iarat@abl.com', '', 'Live', '0'),
(578, '2017-06-15 08:03:08', NULL, NULL, 100, 545, 'kamal.acc@amarbazarltd.com', '600888d1a00ea6da39be5e7c47027488c8f36117ecf1f07df8e95bc79236b6ba', 'TOPUP', 'Head Office', 1, 'Shekh Kamal Ahmed', '01722477873', '', 'kamal.acc@amarbazarltd.com', '', 'Live', '0'),
(644, '2017-08-29 02:56:41', NULL, NULL, 100, 602, 'Manageraccounts@abl.com', '519b766aacf64fbc492ba7dd94290139c3ecf4fbe4babd869847ab3cf9ae174b', 'Manager Accounts', 'Dhaka', 1, 'Md Yeakub Ali Chowdhury', '0', '', 'Manageraccounts@abl.com', '', 'Live', '0'),
(676, '2017-11-05 00:52:49', NULL, NULL, 100, 633, 'Maria@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Delivery Confirmation-1', 'Head Office', 1, 'Maria', '0', '', 'Maria@abl.com', '', 'Live', '0'),
(52, '2017-04-29 05:11:23', NULL, NULL, 100, 47, 'mosaddek7@gmail.com', '4b4394535d43005fdaf93405d602d0293a7c85230feb0d32d891b5112d2ba4ea', 'PAYNRCV', 'Dhaka', 1, 'Mosaddek Hossain', '01715881448', '', 'mosaddek7@gmail.com', '', 'Live', '0'),
(665, '2017-10-16 23:01:48', NULL, NULL, 100, 622, 'pdir@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Product Receive & Delevery  Management', 'Head Office', 1, 'Delwar Hossain', '0', '', 'pdir@abl.com', '', 'Live', '0'),
(680, '2017-11-07 03:07:15', NULL, NULL, 100, 637, 'Productdelivery1@abl.com', '1622538278756438ef8c875cf3cb3dd2e7a41d0e241c4508420641a5fd4a6414', 'Delivery Confirmation-1', 'Head Office', 1, 'Morsheduzzaman Monju', '01701803856', 'poltan.dhaka', 'Productdelivery1@abl.com', '', 'Live', '0'),
(643, '2017-08-22 00:07:42', NULL, NULL, 100, 601, 'Purchases@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'PURCHASE', 'Head Office', 1, 'SUltan Ahmed', '0', '', 'Purchases@abl.com', '', 'Live', '0'),
(642, '2017-08-21 03:52:28', NULL, NULL, 100, 600, 'rabbani@amarbazarltd.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'HR_ADMIN', 'Head Office', 1, 'G M Golam Rabbani', '0', '', 'rabbani@amarbazarltd.com', '', 'Live', '0'),
(686, '2018-09-18 16:55:22', NULL, NULL, 100, 643, 'rafiqul', '8bbd9e630cc86f813ad8789b338047160672d591dd2b9e648e38a68cabef2ff9', 'HR_ADMIN', '', 1, 'rafiqul', '', '', 'futureitlimited@gmail.com', '', 'Live', ''),
(682, '2017-12-12 03:58:23', NULL, NULL, 100, 639, 'rajib@dotbdsolutions.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'ROLE_ADMIN', 'Head Office', 1, 'Md. Rajibul Islam', '01712923270', 'Bizoynagor, Dhaka', 'rajib@dotbdsolutions.com', '', 'Live', '150'),
(7, '2016-11-15 08:15:42', NULL, NULL, 100, 4, 'rajib@gmail.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'ADMIN_ROLE', 'Gulshan', 1, 'Self', '01712923270', '', '', '', 'Live', '0'),
(576, '2017-06-09 02:36:10', NULL, NULL, 100, 543, 'resulbaki@gmail.com', '596d3ad4cdb2f00e7d045ad2c9a744a7f709ac7f23f4c1f51c883bfb97b1a28d', 'ACCOUNTS', 'Head Office', 1, 'Md Abdulla Hel Baki', '0', '', 'resulbaki@gmail.com', '', 'Live', '0'),
(678, '2017-11-05 00:55:43', NULL, NULL, 100, 635, 'Rubel@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Delivery Confirmation-1', 'Head Office', 1, 'Rubel', '0', '', 'Rubel@abl.com', '', 'Live', '0'),
(684, '2018-03-22 12:11:07', NULL, NULL, 100, 641, 'sadat@dbs.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'ROLE_ADMIN', 'Head Office', 1, 'Sadat', '0', '', 'sadat@dbs.com', '', 'Live', ''),
(679, '2017-11-05 00:57:07', NULL, NULL, 100, 636, 'Saddam@abl.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Delivery Confirmation-1', 'Head Office', 1, 'Saddam', '0', '', 'Saddam@abl.com', '', 'Live', '0'),
(641, '2017-08-16 01:48:21', NULL, NULL, 100, 599, 'sahinodesk@gmail.com', 'ea5ee871fc50d0d5974ad0f891bf44ed84cd9106af028706fdddebe984a4d4aa', 'ROLE_OP', 'Head Office', 1, 'Shahin', '0', '', 'sahinodesk@gmail.com', '', 'Live', '0'),
(9, '2017-02-18 15:48:41', NULL, NULL, 100, 6, 'srpanna@gmail.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'ROLE_ADMIN', 'Rajshahi', 1, 'Md Sajjadur Rahman', '01714085313', '', '', '', 'Live', '0'),
(659, '2017-09-22 04:11:30', NULL, NULL, 100, 617, 'td@abl.com', '89af6d07f1737c47cedf4cba6a16fc6b0fe822e8fb07040b9d36246dd481359e', 'Training management', 'Head Office', 1, 'Training Department', '0', '', 'td@abl.com', '', 'Live', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pmbomdet`
--

CREATE TABLE `pmbomdet` (
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(11) NOT NULL,
  `xbomdetsl` bigint(20) UNSIGNED NOT NULL,
  `xbomcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrawitem` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrow` int(3) NOT NULL,
  `xqty` double NOT NULL,
  `xstdcost` double NOT NULL DEFAULT '0',
  `xconversion` double NOT NULL,
  `xunit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` bit(1) NOT NULL DEFAULT b'1',
  `xitemtype` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pmbomdet`
--

INSERT INTO `pmbomdet` (`ztime`, `bizid`, `xbomdetsl`, `xbomcode`, `xrawitem`, `xitembatch`, `xrow`, `xqty`, `xstdcost`, `xconversion`, `xunit`, `zactive`, `xitemtype`) VALUES
('2018-04-05 11:34:07', 100, 20, '76865', 'Electricity And Utility Bill', '', 2, 1, 500, 1, 'PCS', b'1', 'Production Cost'),
('2018-04-05 11:30:11', 100, 19, '76865', 'ULB-LSBT-100', '', 1, 8, 0, 1, '', b'1', 'Raw Material'),
('2018-03-03 07:08:51', 100, 16, 'BOM-000001', 'Electricity And Utility Bill', '', 4, 1, 1.34, 1, 'Container', b'1', 'Production Cost'),
('2018-03-03 07:07:32', 100, 15, 'BOM-000001', 'SCL-RCRP-100', '', 3, 2.5, 0, 1, '', b'1', 'Raw Material'),
('2018-03-03 07:07:19', 100, 14, 'BOM-000001', 'ULB-LSBT-100', '', 2, 2, 0, 1, '', b'1', 'Raw Material'),
('2018-03-03 07:07:11', 100, 13, 'BOM-000001', 'ULB-WLB-130', '', 1, 3, 0, 1, '', b'1', 'Raw Material'),
('2018-04-02 10:55:10', 100, 17, 'BOM-000002', 'ULB-WLB-130', '', 1, 3, 0, 1, '', b'1', 'Raw Material'),
('2018-04-02 10:58:23', 100, 18, 'BOM-000003', 'STL-CBS-130', '', 1, 1, 0, 1, '', b'1', 'Raw Material');

-- --------------------------------------------------------

--
-- Table structure for table `pmbommst`
--

CREATE TABLE `pmbommst` (
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(11) NOT NULL,
  `xbomsl` bigint(20) UNSIGNED NOT NULL,
  `xbomcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmodel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` bit(1) NOT NULL DEFAULT b'1',
  `xstatus` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `zemail` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pmbommst`
--

INSERT INTO `pmbommst` (`ztime`, `bizid`, `xbomsl`, `xbomcode`, `xitemcode`, `xmodel`, `zactive`, `xstatus`, `zemail`) VALUES
('2018-04-05 11:30:11', 100, 13, '76865', 'WI-60DK', NULL, b'1', 'Created', 'admin@demo.com'),
('2018-03-03 07:07:11', 100, 10, 'BOM-000001', 'WI-80DK', NULL, b'1', 'Created', 'rajib@pureapp.com'),
('2018-04-02 10:55:09', 100, 11, 'BOM-000002', 'WI-70DK', NULL, b'1', 'Created', 'rajib@dotbdsolutions.com'),
('2018-04-02 10:58:23', 100, 12, 'BOM-000003', 'WI-60DK', NULL, b'1', 'Created', 'rajib@dotbdsolutions.com');

-- --------------------------------------------------------

--
-- Table structure for table `pmfgrdet`
--

CREATE TABLE `pmfgrdet` (
  `xfgrdetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xfgrnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xrawitem` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL DEFAULT '0',
  `xstdcost` double NOT NULL DEFAULT '0',
  `xunit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xexch` double NOT NULL DEFAULT '1',
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xitemtype` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmfgrmst`
--

CREATE TABLE `pmfgrmst` (
  `xfgrsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xfgrnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xbatchno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xexpdate` date NOT NULL,
  `xqty` double NOT NULL,
  `xstdcost` double NOT NULL,
  `xstdprice` double NOT NULL DEFAULT '0',
  `xdate` date NOT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xrawwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pocost`
--

CREATE TABLE `pocost` (
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(7) NOT NULL,
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `xponum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xcosthead` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xamount` double NOT NULL,
  `xstr` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pocost`
--

INSERT INTO `pocost` (`ztime`, `zutime`, `zemail`, `xemail`, `bizid`, `xsl`, `xponum`, `xcosthead`, `xamount`, `xstr`, `xstatus`) VALUES
('2018-04-11 10:19:05', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 3, 'INPO000001', 'Bank Charge', 1400, NULL, 'Created'),
('2018-04-11 10:15:28', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 2, 'INPO000001', 'CNF Cost', 3000, NULL, 'Created'),
('2018-04-11 10:21:37', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 5, 'INPO000001', 'Custom Duty', 123, NULL, 'Created'),
('2018-04-11 10:19:55', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 4, 'INPO000001', 'LC Payment', 20000, NULL, 'Created'),
('2018-04-11 10:24:10', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 6, 'INPO000001', 'Miscellaneous', 200, NULL, 'Created'),
('2018-04-11 10:10:22', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 1, 'INPO000001', 'Transport', 2000, NULL, 'Created'),
('2018-09-22 10:46:59', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 12, 'INPO000003', 'Bank Charge', 19, NULL, 'Created'),
('2018-09-22 10:44:17', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 10, 'INPO000003', 'Custom Duty', 7, NULL, 'Created'),
('2018-09-22 10:44:36', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 11, 'INPO000003', 'Transport', 5, NULL, 'Created'),
('2018-09-22 11:14:57', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 13, 'INPO000004', 'CNF Cost', 1200, NULL, 'Created'),
('2018-09-22 11:16:33', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 15, 'INPO000004', 'Custom Duty', 500, NULL, 'Created'),
('2018-09-22 11:15:19', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 14, 'INPO000004', 'Transport', 2000, NULL, 'Created'),
('2018-08-07 06:16:47', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 7, 'PORD-000005', 'Transport', 700, NULL, 'Created'),
('2018-09-19 08:14:56', NULL, 'admin@demo.com', NULL, 100, 8, 'PORD-000006', 'CNF Cost', 25000, NULL, 'Created'),
('2018-09-19 10:23:01', NULL, 'admin@demo.com', NULL, 100, 9, 'PORD-000006', 'Miscellaneous', 12000, NULL, 'Created');

-- --------------------------------------------------------

--
-- Table structure for table `podet`
--

CREATE TABLE `podet` (
  `xpodetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xponum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xreqqty` double NOT NULL DEFAULT '0',
  `xqty` double NOT NULL,
  `xratepur` double NOT NULL,
  `xstdcost` double NOT NULL DEFAULT '0',
  `xtaxrate` double NOT NULL,
  `xunitpur` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xconversion` double NOT NULL DEFAULT '1',
  `xunitstk` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xexch` double NOT NULL,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xdisc` double NOT NULL,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `podet`
--

INSERT INTO `podet` (`xpodetsl`, `ztime`, `zemail`, `bizid`, `xdate`, `xponum`, `xrow`, `xitemcode`, `xitembatch`, `xwh`, `xbranch`, `xproj`, `xreqqty`, `xqty`, `xratepur`, `xstdcost`, `xtaxrate`, `xunitpur`, `xconversion`, `xunitstk`, `xtypestk`, `xexch`, `xcur`, `xdisc`, `xtaxcode`, `xtaxscope`) VALUES
(21, '2018-04-15 11:08:27', 'rajib@dotbdsolutions.com', 100, '2018-04-15', '1232', 1, 'ULB-WLB-130X05', 'ULB-WLB-130X05', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 100, 83.75, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(20, '2018-04-11 10:05:16', 'rajib@dotbdsolutions.com', 100, '2018-04-11', 'INPO000001', 1, 'STL-CBS-130', 'STL-CBS-130', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 100, 11.76, 0, 0, 'PCS', 1, '', 'Stocking', 85, 'USD', 0, 'None', 'None'),
(31, '2018-09-19 08:14:18', 'admin@demo.com', 100, '2018-09-19', 'INPO000002', 1, 'WI-4336S', 'WI-4336S', 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 0, 25, 31898, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(32, '2018-09-22 10:42:42', 'rajib@dotbdsolutions.com', 100, '2018-09-22', 'INPO000003', 1, 'ULB-VL-500ml', 'ULB-VL-500ml', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 50, 71.5, 0, 0, 'PCS', 1, '', 'Stocking', 82.5, 'USD', 0, 'None', 'None'),
(33, '2018-09-22 11:10:47', 'rajib@dotbdsolutions.com', 100, '2018-09-22', 'INPO000004', 1, 'ULB-WLB-130X05', 'ULB-WLB-130X05', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 50, 83.75, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(22, '2018-05-19 04:15:05', 'rajib@dotbdsolutions.com', 100, '2018-05-19', 'PORD-000001', 1, '7000-1', '7000-1', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 50, 22, 0, 0, 'PCS', 1, 'PCS', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(23, '2018-06-03 05:10:19', 'rajib@dotbdsolutions.com', 100, '2018-06-03', 'PORD-000002', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 35, 21912, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(24, '2018-06-03 05:36:50', 'rajib@dotbdsolutions.com', 100, '2018-06-03', 'PORD-000003', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 105, 21912, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(25, '2018-07-03 04:38:35', 'rajib@dotbdsolutions.com', 100, '2018-07-03', 'PORD-000004', 1, 'ULB-VL-500ml', 'ULB-VL-500ml', 'CW', 'CW', 'CW', 0, 56, 86, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(26, '2018-08-07 06:13:57', 'rajib@dotbdsolutions.com', 100, '2018-08-07', 'PORD-000005', 1, '7001', '7001', 'CW', 'CW', 'CW', 0, 10, 3200, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(27, '2018-08-26 11:35:09', 'admin@demo.com', 100, '2018-08-26', 'PORD-000006', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 10, 21912, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(28, '2018-08-29 08:17:23', 'admin@demo.com', 100, '2018-08-29', 'PORD-000007', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 100, 21912, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(29, '2018-09-19 05:53:23', 'admin@demo.com', 100, '2018-09-19', 'PORD-000008', 1, 'WI-70DK', 'WI-70DK', 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 0, 5, 21912, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None'),
(30, '2018-09-19 08:11:37', 'admin@demo.com', 100, '2018-09-19', 'PORD-000009', 1, 'WI-5069S', 'WI-5069S', 'CW', 'CW', 'CW', 0, 25, 42558, 0, 0, 'PCS', 1, '', 'Stocking', 1, 'BDT', 0, 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `pogrndet`
--

CREATE TABLE `pogrndet` (
  `xgrndetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xponum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xgrnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrowtrn` int(5) NOT NULL DEFAULT '0',
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqtypur` double NOT NULL DEFAULT '0',
  `xextqty` double NOT NULL DEFAULT '0',
  `xratepur` double NOT NULL DEFAULT '0',
  `xstdcost` double NOT NULL DEFAULT '0',
  `xtaxrate` double NOT NULL DEFAULT '0',
  `xunitpur` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xunitstk` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xconversion` double NOT NULL DEFAULT '1',
  `xqty` double NOT NULL DEFAULT '0',
  `xexch` double NOT NULL DEFAULT '1',
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xdisc` double NOT NULL DEFAULT '0',
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pogrndet`
--

INSERT INTO `pogrndet` (`xgrndetsl`, `ztime`, `zemail`, `bizid`, `xdate`, `xponum`, `xgrnnum`, `xrowtrn`, `xrow`, `xitemcode`, `xitembatch`, `xwh`, `xbranch`, `xproj`, `xqtypur`, `xextqty`, `xratepur`, `xstdcost`, `xtaxrate`, `xunitpur`, `xtypestk`, `xunitstk`, `xconversion`, `xqty`, `xexch`, `xcur`, `xdisc`, `xtaxcode`, `xtaxscope`) VALUES
(398, '2018-05-16 10:26:19', 'rajib@dotbdsolutions.com', 100, '2018-04-15', '1232', 'GRN-000001', 0, 1, 'ULB-WLB-130X05', 'ULB-WLB-130X05', 'CW', 'CW', 'CW', 100, 10, 83.75, 83.75, 0, 'None', 'Stocking', '', 1, 0, 1, 'BDT', 0, 'None', 'PCS'),
(402, '2018-07-03 04:31:53', 'rajib@dotbdsolutions.com', 100, '2018-07-03', '', 'GRN-000002', 0, 1, 'ULB-WLB-130', 'ULB-WLB-130', 'Naya Palton', 'Naya Palton', 'Naya Palton', 220, 0, 17.5, 17.5, 0, 'None', 'Stocking', '', 1, 0, 1, 'BDT', 0, 'None', 'PCS'),
(403, '2018-07-07 07:44:43', 'rajib@dotbdsolutions.com', 100, '2018-07-07', '5665', 'GRN-000003', 0, 1, 'ULB-TSKS-190', 'ULB-TSKS-190', 'Naya Palton', 'Naya Palton', 'Naya Palton', 80, 0, 260, 260, 0, 'None', 'Stocking', '', 1, 0, 1, 'BDT', 0, 'None', 'PCS'),
(406, '2018-08-29 08:19:03', 'admin@demo.com', 100, '2018-08-29', 'PORD-000007', 'GRN-000004', 0, 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Naya Palton', 'Naya Palton', 50, 0, 21912, 21912, 0, 'None', 'Stocking', '', 1, 0, 1, 'BDT', 0, 'None', 'PCS'),
(407, '2018-09-19 08:16:11', 'admin@demo.com', 100, '2018-09-19', '', 'GRN-000005', 0, 1, 'WI-5069S', 'WI-5069S', 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 25, 25, 52500, 52500, 0, 'None', 'Stocking', '', 1, 0, 1, 'BDT', 0, 'None', 'PCS'),
(408, '2018-09-22 10:52:39', 'rajib@dotbdsolutions.com', 100, '2018-09-22', 'INPO000003', 'GRN-000006', 0, 1, 'ULB-VL-500ml', 'ULB-VL-500ml', 'Naya Palton', 'Naya Palton', 'Naya Palton', 50, 0, 5898.75, 5899.37, 0, 'None', 'Stocking', '', 1, 0, 1, 'BDT', 0, 'None', 'PCS'),
(409, '2018-09-22 11:17:26', 'rajib@dotbdsolutions.com', 100, '2018-09-22', 'INPO000004', 'GRN-000007', 0, 1, 'ULB-WLB-130X05', 'ULB-WLB-130X05', 'Naya Palton', 'Naya Palton', 'Naya Palton', 50, 0, 83.75, 157.75, 0, 'None', 'Stocking', '', 1, 0, 1, 'BDT', 0, 'None', 'PCS'),
(397, '2018-04-11 10:31:21', 'rajib@dotbdsolutions.com', 100, '2018-04-11', 'INPO000001', 'GRN0000001', 1, 1, 'STL-CBS-130', 'STL-CBS-130', 'Naya Palton', 'Head Office', 'Head Office', 100, 0, 999.6, 1266.83, 0, 'PCS', 'Stocking', '', 1, 100, 1, 'BDT', 0, NULL, NULL),
(399, '2018-05-19 04:23:21', 'rajib@dotbdsolutions.com', 100, '2018-05-19', 'PORD-000001', 'GRN0000002', 1, 1, '7000-1', '7000-1', 'Naya Palton', 'Head Office', 'Head Office', 50, 0, 22, 22, 0, 'PCS', 'Stocking', 'PCS', 1, 50, 1, 'BDT', 0, NULL, NULL),
(400, '2018-06-03 05:13:17', 'rajib@dotbdsolutions.com', 100, '2018-06-03', 'PORD-000002', 'GRN0000003', 1, 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 35, 0, 21912, 21912, 0, 'PCS', 'Stocking', '', 1, 35, 1, 'BDT', 0, NULL, NULL),
(401, '2018-06-03 05:37:30', 'rajib@dotbdsolutions.com', 100, '2018-06-03', 'PORD-000003', 'GRN0000004', 1, 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 105, 0, 21912, 21912, 0, 'PCS', 'Stocking', '', 1, 105, 1, 'BDT', 0, NULL, NULL),
(404, '2018-08-07 06:20:13', 'rajib@dotbdsolutions.com', 100, '2018-08-07', 'PORD-000005', 'GRN0000005', 1, 1, '7001', '7001', 'CW', 'Head Office', 'Head Office', 10, 0, 3200, 3270.0000000000005, 0, 'PCS', 'Stocking', '', 1, 10, 1, 'BDT', 0, NULL, NULL),
(405, '2018-08-26 11:36:22', 'admin@demo.com', 100, '2018-08-26', 'PORD-000006', 'GRN0000006', 1, 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 10, 0, 21912, 21912, 0, 'PCS', 'Stocking', '', 1, 10, 1, 'BDT', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pogrnmst`
--

CREATE TABLE `pogrnmst` (
  `xgrnsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xgrnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xponum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsupdoc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlcno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pogrnmst`
--

INSERT INTO `pogrnmst` (`xgrnsl`, `ztime`, `zutime`, `zemail`, `xemail`, `bizid`, `xgrnnum`, `xponum`, `xsupdoc`, `xlcno`, `xdate`, `xsup`, `xmanager`, `xbranch`, `xwh`, `xproj`, `xstatus`, `xrecflag`, `xvoucher`, `xfinyear`, `xfinper`) VALUES
(122, '2018-05-16 10:26:19', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN-000001', '1232', NULL, NULL, '2018-04-15', 'SUP0000051', NULL, 'CW', 'CW', 'CW', 'Confirmed', 'Live', NULL, 2017, 10),
(126, '2018-07-03 04:31:53', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN-000002', '', NULL, NULL, '2018-07-03', 'SUP0000015', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2018, 1),
(127, '2018-07-07 07:44:43', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN-000003', '5665', NULL, NULL, '2018-07-07', 'SUP0000049', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2018, 1),
(130, '2018-08-29 08:19:03', NULL, 'admin@demo.com', NULL, 100, 'GRN-000004', 'PORD-000007', NULL, NULL, '2018-08-29', 'SUP0000054', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2018, 2),
(131, '2018-09-19 08:16:11', NULL, 'admin@demo.com', NULL, 100, 'GRN-000005', '', NULL, NULL, '2018-09-19', 'SUP0000053', NULL, 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 'Confirmed', 'Live', NULL, 2018, 3),
(132, '2018-09-22 10:52:39', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN-000006', 'INPO000003', NULL, NULL, '2018-09-22', 'SUP0000048', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2018, 3),
(133, '2018-09-22 11:17:26', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN-000007', 'INPO000004', NULL, NULL, '2018-09-22', 'SUP0000042', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2018, 3),
(121, '2018-04-11 10:31:21', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN0000001', 'INPO000001', NULL, NULL, '2018-04-11', 'SUP0000053', NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', NULL, 2017, 10),
(123, '2018-05-19 04:23:21', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN0000002', 'PORD-000001', NULL, NULL, '2018-05-19', 'SUP0000032', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2017, 11),
(124, '2018-06-03 05:13:16', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN0000003', 'PORD-000002', NULL, NULL, '2018-06-03', 'SUP0000049', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2017, 12),
(125, '2018-06-03 05:37:30', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN0000004', 'PORD-000003', NULL, NULL, '2018-06-03', 'SUP0000049', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2017, 12),
(128, '2018-08-07 06:20:13', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN0000005', 'PORD-000005', NULL, NULL, '2018-08-07', 'SUP0000054', NULL, 'CW', 'CW', 'CW', 'Confirmed', 'Live', NULL, 2018, 2),
(129, '2018-08-26 11:36:22', NULL, 'admin@demo.com', NULL, 100, 'GRN0000006', 'PORD-000006', NULL, NULL, '2018-08-26', 'SUP0000054', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2018, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pomst`
--

CREATE TABLE `pomst` (
  `xposl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xponum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xnote` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsupdoc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlcno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlcdate` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xghodate` date DEFAULT NULL,
  `xdeldate` date DEFAULT NULL,
  `xetd` date DEFAULT NULL,
  `xeta` date DEFAULT NULL,
  `xpino` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpidate` date DEFAULT NULL,
  `xshipterm` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xshipvia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xcorto` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcoradd` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcorphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcorfax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcoremail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcur` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xexch` double DEFAULT '1',
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL,
  `xpotype` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Local Purchase'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pomst`
--

INSERT INTO `pomst` (`xposl`, `ztime`, `zutime`, `zemail`, `xemail`, `bizid`, `xponum`, `xnote`, `xsupdoc`, `xlcno`, `xlcdate`, `xdate`, `xghodate`, `xdeldate`, `xetd`, `xeta`, `xpino`, `xpidate`, `xshipterm`, `xshipvia`, `xsup`, `xcorto`, `xcoradd`, `xcorphone`, `xcorfax`, `xcoremail`, `xmanager`, `xbranch`, `xwh`, `xproj`, `xcur`, `xexch`, `xstatus`, `xrecflag`, `xfinyear`, `xfinper`, `xpotype`) VALUES
(2, '2018-04-15 11:08:27', NULL, 'rajib@dotbdsolutions.com', NULL, 100, '1232', '', '', NULL, NULL, '2018-04-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUP0000051', NULL, NULL, NULL, NULL, NULL, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', NULL, 1, 'Confirmed', 'Live', 2017, 10, 'Local Purchase'),
(1, '2018-04-11 10:05:16', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'INPO000001', '', '', '', NULL, '2018-04-11', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 'SUP0000053', '', '', '', NULL, '', NULL, 'Head Office', 'Naya Palton', 'Head Office', 'USD', 85, 'Confirmed', 'Live', 2017, 10, 'International Purchase'),
(12, '2018-09-19 08:14:18', NULL, 'admin@demo.com', NULL, 100, 'INPO000002', '', 'BW--123', 'LC--Test', '2018-09-26', '2018-09-19', '2018-10-02', '2018-10-04', NULL, NULL, '147', '2018-09-30', NULL, NULL, 'SUP0000052', '', '', '', NULL, '', NULL, 'Head Office', 'Mohanagar Project', 'Head Office', 'BDT', 1, 'Confirmed', 'Live', 2018, 3, 'International Purchase'),
(13, '2018-09-22 10:42:42', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'INPO000003', '', '543221', '123', '2018-09-19', '2018-09-22', '2018-09-30', '2018-09-28', '2018-09-27', '2018-09-29', '4321', '2018-09-17', NULL, NULL, 'SUP0000048', 'Zahangir', 'wefg', '123456789', NULL, 'z@gmail.com', NULL, 'Head Office', 'Naya Palton', 'Head Office', 'USD', 82.5, 'Confirmed', 'Live', 2018, 3, 'International Purchase'),
(14, '2018-09-22 11:10:47', '2018-09-22 11:14:15', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 100, 'INPO000004', '', '976543', '5678', '2018-09-20', '2018-09-22', '2018-09-30', '2018-09-29', '2018-09-25', '2018-09-26', '9876', '2018-09-07', '', '', 'SUP0000042', 'Fahim', 'Mirpur-1', '0987654321', NULL, 'fahim@gmail.com', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'BDT', 1, 'Confirmed', 'Live', 2018, 3, 'International Purchase'),
(3, '2018-05-19 04:15:04', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'PORD-000001', '', '', NULL, NULL, '2018-05-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUP0000032', NULL, NULL, NULL, NULL, NULL, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', NULL, 1, 'Confirmed', 'Live', 2017, 11, 'Local Purchase'),
(4, '2018-06-03 05:10:19', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'PORD-000002', '', '103', NULL, NULL, '2018-06-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUP0000049', NULL, NULL, NULL, NULL, NULL, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', NULL, 1, 'Confirmed', 'Live', 2017, 12, 'Local Purchase'),
(5, '2018-06-03 05:36:50', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'PORD-000003', '', '104', NULL, NULL, '2018-06-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUP0000049', NULL, NULL, NULL, NULL, NULL, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', NULL, 1, 'Confirmed', 'Live', 2017, 12, 'Local Purchase'),
(6, '2018-07-03 04:38:35', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'PORD-000004', '', 'ulb/2018/july 03', NULL, NULL, '2018-07-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUP0000052', NULL, NULL, NULL, NULL, NULL, NULL, 'CW', 'CW', 'CW', NULL, 1, 'Canceled', 'Live', 2018, 1, 'Local Purchase'),
(7, '2018-08-07 06:13:57', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'PORD-000005', '', '', NULL, NULL, '2018-08-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUP0000054', NULL, NULL, NULL, NULL, NULL, NULL, 'CW', 'CW', 'CW', NULL, 1, 'Confirmed', 'Live', 2018, 2, 'Local Purchase'),
(8, '2018-08-26 11:35:09', NULL, 'admin@demo.com', NULL, 100, 'PORD-000006', '', '', NULL, NULL, '2018-08-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUP0000054', NULL, NULL, NULL, NULL, NULL, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', NULL, 1, 'Confirmed', 'Live', 2018, 2, 'Local Purchase'),
(9, '2018-08-29 08:17:23', NULL, 'admin@demo.com', NULL, 100, 'PORD-000007', '', '54645645', NULL, NULL, '2018-08-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUP0000054', NULL, NULL, NULL, NULL, NULL, NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', NULL, 1, 'Confirmed', 'Live', 2018, 2, 'Local Purchase'),
(10, '2018-09-19 05:53:23', NULL, 'admin@demo.com', NULL, 100, 'PORD-000008', '', '123', NULL, NULL, '2018-09-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUP0000054', NULL, NULL, NULL, NULL, NULL, NULL, 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', NULL, 1, 'Confirmed', 'Live', 2018, 3, 'Local Purchase'),
(11, '2018-09-19 08:11:37', NULL, 'admin@demo.com', NULL, 100, 'PORD-000009', '', '123456789', NULL, NULL, '2018-09-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUP0000053', NULL, NULL, NULL, NULL, NULL, NULL, 'CW', 'CW', 'CW', NULL, 1, 'Confirmed', 'Live', 2018, 3, 'Local Purchase');

-- --------------------------------------------------------

--
-- Table structure for table `poreturn`
--

CREATE TABLE `poreturn` (
  `xporeturnsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xgrnnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xporeturnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsupdoc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlcno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poreturn`
--

INSERT INTO `poreturn` (`xporeturnsl`, `ztime`, `zutime`, `zemail`, `xemail`, `bizid`, `xgrnnum`, `xporeturnnum`, `xsupdoc`, `xlcno`, `xdate`, `xsup`, `xmanager`, `xbranch`, `xwh`, `xproj`, `xstatus`, `xrecflag`, `xvoucher`, `xfinyear`, `xfinper`) VALUES
(10, '2018-04-12 05:18:41', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN0000001', 'PRTN639-000001', NULL, NULL, '2018-04-11', 'SUP0000053', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Created', 'Live', NULL, 2017, 10),
(11, '2018-04-12 05:23:32', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN0000001', 'PRTN639-000002', NULL, NULL, '2018-04-11', 'SUP0000053', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Created', 'Live', NULL, 2017, 10),
(12, '2018-04-12 06:11:39', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'GRN0000001', 'PRTN639-000003', NULL, NULL, '2018-04-11', 'SUP0000053', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2017, 10),
(13, '2018-05-19 04:29:45', NULL, 'rajib@dotbdsolutions.com', NULL, 100, '', 'PRTN639-000004', NULL, NULL, '2018-05-19', 'SUP0000032', NULL, 'Naya Palton', 'Naya Palton', 'Naya Palton', 'Confirmed', 'Live', NULL, 2017, 11),
(14, '2018-09-19 08:51:32', NULL, 'admin@demo.com', NULL, 100, '', 'PRTN642-000001', NULL, NULL, '2018-09-19', 'SUP0000053', NULL, 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 'Confirmed', 'Live', NULL, 2018, 3);

-- --------------------------------------------------------

--
-- Table structure for table `poreturndet`
--

CREATE TABLE `poreturndet` (
  `xporeturndetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xporeturnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xgrnnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrow` int(5) NOT NULL,
  `xrowtrn` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xextqty` double NOT NULL DEFAULT '0',
  `xratepur` double NOT NULL DEFAULT '0',
  `xstdcost` double NOT NULL DEFAULT '0',
  `xtaxrate` double NOT NULL DEFAULT '0',
  `xunitpur` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xunitstk` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xconversion` double NOT NULL DEFAULT '1',
  `xqty` double NOT NULL DEFAULT '0',
  `xexch` double NOT NULL DEFAULT '1',
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xdisc` double NOT NULL DEFAULT '0',
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poreturndet`
--

INSERT INTO `poreturndet` (`xporeturndetsl`, `ztime`, `zemail`, `bizid`, `xdate`, `xporeturnnum`, `xgrnnum`, `xrow`, `xrowtrn`, `xitemcode`, `xitembatch`, `xwh`, `xbranch`, `xproj`, `xextqty`, `xratepur`, `xstdcost`, `xtaxrate`, `xunitpur`, `xtypestk`, `xunitstk`, `xconversion`, `xqty`, `xexch`, `xcur`, `xdisc`, `xtaxcode`, `xtaxscope`) VALUES
(14, '2018-04-12 05:23:32', 'rajib@dotbdsolutions.com', 100, '2018-04-11', 'PRTN639-000002', 'GRN0000001', 1, 397, 'STL-CBS-130', 'STL-CBS-130', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 999.6, 0, 0, 'None', 'Stocking', '', 1, 2, 1, 'BDT', 0, 'None', 'PCS'),
(15, '2018-04-12 06:11:39', 'rajib@dotbdsolutions.com', 100, '2018-04-11', 'PRTN639-000003', 'GRN0000001', 1, 397, 'STL-CBS-130', 'STL-CBS-130', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 999.6, 999.6, 0, 'None', 'Stocking', '', 1, 4, 1, 'BDT', 0, 'None', 'PCS'),
(16, '2018-05-19 04:29:45', 'rajib@dotbdsolutions.com', 100, '2018-05-19', 'PRTN639-000004', '', 1, 0, '7000-1', '7000-1', 'Naya Palton', 'Naya Palton', 'Naya Palton', 0, 0, 0, 0, 'None', 'Stocking', 'PCS', 1, 12, 1, 'BDT', 0, 'None', 'PCS'),
(17, '2018-09-19 08:51:32', 'admin@demo.com', 100, '2018-09-19', 'PRTN642-000001', '', 1, 0, 'WI-5069S', 'WI-5069S', 'Mohanagar Project', 'Mohanagar Project', 'Mohanagar Project', 1, 52500, 52500, 0, 'None', 'Stocking', '', 1, 2, 1, 'BDT', 0, 'None', 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `secodes`
--

CREATE TABLE `secodes` (
  `codeid` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `xcodetype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `xcoderem` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` int(1) NOT NULL DEFAULT '1',
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `secodes`
--

INSERT INTO `secodes` (`codeid`, `ztime`, `zutime`, `bizid`, `xcodetype`, `xcode`, `xdesc`, `xcoderem`, `zactive`, `zemail`, `xemail`, `xrecflag`) VALUES
(194, '2017-02-18 23:20:18', NULL, 100, 'Acc Level1', 'Asset', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(222, '2017-06-10 07:31:23', NULL, 100, 'Acc Level1', 'Expenditure', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(221, '2017-06-10 07:30:35', NULL, 100, 'Acc Level1', 'Income', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(200, '2017-02-18 23:22:28', NULL, 100, 'Acc Level1', 'Liability', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(199, '2017-02-18 23:21:57', NULL, 100, 'Acc Level2', 'Administrative Expense', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(195, '2017-02-18 23:20:44', NULL, 100, 'Acc Level2', 'Current Asset', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(197, '2017-02-18 23:21:19', NULL, 100, 'Acc Level2', 'Current Liability', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(229, '2017-06-13 06:22:19', NULL, 100, 'Acc Level2', 'Direct Expenses', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(232, '2017-06-13 06:25:20', NULL, 100, 'Acc Level2', 'Non Operating Expenses', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(196, '2017-02-18 23:21:02', NULL, 100, 'Acc Level2', 'Non-Current Asset', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(198, '2017-02-18 23:21:30', NULL, 100, 'Acc Level2', 'Non-Current Liability', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(234, '2017-06-13 06:26:04', NULL, 100, 'Acc Level2', 'Non-Operating Income', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(233, '2017-06-13 06:25:52', NULL, 100, 'Acc Level2', 'Operating Income', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(230, '2017-06-13 06:22:56', NULL, 100, 'Acc Level2', 'Operational Expenses', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(231, '2017-06-13 06:24:39', NULL, 100, 'Acc Level2', 'Selling & Distribution Expenses', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(224, '2017-06-11 07:49:38', NULL, 100, 'Acc Level3', 'Inter Current Accounts', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(223, '2017-06-11 07:48:29', NULL, 100, 'Acc Level3', 'long Term Liabilities', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(227, '2017-06-11 09:12:32', NULL, 100, 'Acc Level3', 'Member Subscription', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(228, '2017-06-11 09:37:11', NULL, 100, 'Acc Level3', 'Profit & Loss Accounts', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(226, '2017-06-11 08:29:14', NULL, 100, 'Acc Level3', 'Reserve & Surplus', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(225, '2017-06-11 07:50:54', NULL, 100, 'Acc Level3', 'Shareholders Equity', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(203, '2017-03-07 11:26:17', NULL, 100, 'Bank', 'BBL', 'Brac Bank Ltd.', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(219, '2017-06-05 09:05:05', NULL, 100, 'Bank', 'Bkash', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(148, '2016-11-28 13:13:21', '2017-02-25 21:29:48', 100, 'Bank', 'BRAC', '', NULL, 1, 'rajib@pureapp.com', 'rajib@pureapp.com', 'Deleted'),
(147, '2016-11-28 13:13:00', NULL, 100, 'Bank', 'CBL', 'City Bank Limited', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(146, '2016-11-28 13:12:41', NULL, 100, 'Bank', 'DBBL', 'Dutch Bangla Bank Limited ', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(352, '2018-08-03 14:49:47', NULL, 100, 'Bank', 'DHAKA BANK', '', NULL, 1, 'rajib@dotbdsolutions.com', NULL, 'Live'),
(357, '2018-09-19 05:17:28', NULL, 100, 'Bank', 'HSBC', 'Hongkong and Shanghai Banking Corporation', NULL, 1, 'admin@demo.com', NULL, 'Live'),
(220, '2017-06-05 09:05:11', NULL, 100, 'Bank', 'Rocket', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(150, '2016-12-13 15:47:10', NULL, 100, 'Bank', 'SBL', 'Social Islami Bank Ltd', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(149, '2016-12-11 17:25:56', '2017-02-25 21:31:13', 100, 'Bank', 'SCBL', '', NULL, 1, 'rajib@pureapp.com', 'rajib@pureapp.com', 'Deleted'),
(338, '2018-02-28 13:08:17', NULL, 100, 'BOM Cost Head', 'Electricity And Utility Bill', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(339, '2018-02-28 13:08:40', NULL, 100, 'BOM Cost Head', 'Worker Salary', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(169, '2017-02-18 01:16:01', NULL, 100, 'Branch', 'Barisal', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(239, '2017-07-27 05:29:57', NULL, 100, 'Branch', 'Capai Nwabgong', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(140, '2016-11-11 12:51:23', NULL, 100, 'Branch', 'Chittagong', '', '', 1, '', NULL, 'Live'),
(167, '2017-02-18 01:15:39', NULL, 100, 'Branch', 'Comilla', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(166, '2017-02-18 01:15:31', NULL, 100, 'Branch', 'Dhaka', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(168, '2017-02-18 01:15:53', NULL, 100, 'Branch', 'Faridpur', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(238, '2017-07-27 05:28:54', NULL, 100, 'Branch', 'Gazipour', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(139, '2016-11-11 12:51:08', NULL, 100, 'Branch', 'Head Office', '', '', 1, '', NULL, 'Live'),
(241, '2017-07-27 05:30:48', NULL, 100, 'Branch', 'Hobigonj', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(236, '2017-07-27 05:28:26', NULL, 100, 'Branch', 'Jamalpur', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(141, '2016-11-11 12:52:10', NULL, 100, 'Branch', 'Jessore', '', '', 1, '', NULL, 'Live'),
(164, '2017-02-18 01:15:01', NULL, 100, 'Branch', 'Khulna', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(237, '2017-07-27 05:28:39', NULL, 100, 'Branch', 'Nawgoan', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(240, '2017-07-27 05:30:18', NULL, 100, 'Branch', 'Pabna', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(163, '2017-02-18 01:14:55', NULL, 100, 'Branch', 'Rajshahi', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(165, '2017-02-18 01:15:16', NULL, 100, 'Branch', 'Rangpur', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(170, '2017-02-18 01:16:37', NULL, 100, 'Branch', 'Sylhet', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(134, '2016-11-11 12:46:21', NULL, 100, 'Color', 'Black', '', '', 1, '', NULL, 'Live'),
(133, '2016-11-11 12:46:13', NULL, 100, 'Color', 'Green', '', '', 1, '', NULL, 'Live'),
(132, '2016-11-11 12:46:08', NULL, 100, 'Color', 'Red', '', '', 1, '', NULL, 'Live'),
(201, '2017-02-20 18:15:47', NULL, 100, 'Color', 'White', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(101, '2016-09-28 10:14:33', NULL, 100, 'Country', 'Bangladesh', '', '', 1, '', NULL, 'Live'),
(102, '2016-09-28 10:14:39', NULL, 100, 'Country', 'China', '', '', 1, '', NULL, 'Live'),
(106, '2016-09-28 10:15:03', NULL, 100, 'Country', 'Germany', '', '', 1, '', NULL, 'Live'),
(103, '2016-09-28 10:14:43', NULL, 100, 'Country', 'India', '', '', 1, '', NULL, 'Live'),
(105, '2016-09-28 10:14:55', NULL, 100, 'Country', 'Malaysia', '', '', 1, '', NULL, 'Live'),
(104, '2016-09-28 10:14:48', NULL, 100, 'Country', 'Taiwan', '', '', 1, '', NULL, 'Live'),
(204, '2017-03-12 07:00:41', NULL, 100, 'Currency', 'BDT', '1', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(209, '2017-03-21 09:57:15', NULL, 100, 'Currency', 'GBP', 'Great Britain Pound', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(208, '2017-03-21 09:56:47', NULL, 100, 'Currency', 'INR', 'Indian Rupee', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(205, '2017-03-21 09:55:27', NULL, 100, 'Currency', 'RM', 'Ringit Malaysia', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(207, '2017-03-21 09:56:36', NULL, 100, 'Currency', 'SGD', 'Singapore Doller', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(206, '2017-03-21 09:56:15', NULL, 100, 'Currency', 'USD', 'United State Doller', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(127, '2016-10-19 13:24:01', NULL, 100, 'Customer Prefix', 'CUS0', '', '', 1, '', NULL, 'Live'),
(355, '2018-09-19 05:15:44', NULL, 100, 'Customer Prefix', 'CUS1', 'Customer', NULL, 1, 'admin@demo.com', NULL, 'Live'),
(119, '2016-09-28 10:17:33', NULL, 100, 'District', 'BARISAL', '', '', 1, '', NULL, 'Live'),
(115, '2016-09-28 10:17:13', NULL, 100, 'District', 'CHITTAGONG', '', '', 1, '', NULL, 'Live'),
(114, '2016-09-28 10:17:07', NULL, 100, 'District', 'DHAKA', '', '', 1, '', NULL, 'Live'),
(118, '2016-09-28 10:17:27', NULL, 100, 'District', 'KHULNA', '', '', 1, '', NULL, 'Live'),
(117, '2016-09-28 10:17:23', NULL, 100, 'District', 'RAJSHAHI', '', '', 1, '', NULL, 'Live'),
(120, '2016-09-28 10:17:39', NULL, 100, 'District', 'RANGPUR', '', '', 1, '', NULL, 'Live'),
(116, '2016-09-28 10:17:18', NULL, 100, 'District', 'SYLHET', '', '', 1, '', NULL, 'Live'),
(331, '2017-11-21 07:09:53', NULL, 100, 'GL Prefix', 'JV--', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(335, '2017-11-23 09:16:14', NULL, 100, 'GL Prefix', 'OB--', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(332, '2017-11-21 07:10:01', NULL, 100, 'GL Prefix', 'PAY-', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(333, '2017-11-21 07:10:13', NULL, 100, 'GL Prefix', 'RCPT', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(334, '2017-11-21 07:10:19', NULL, 100, 'GL Prefix', 'TRCV', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(135, '2016-11-11 12:46:32', NULL, 100, 'IM Receive Prefix', 'IRCV', '', '', 1, '', NULL, 'Live'),
(136, '2016-11-11 12:47:15', NULL, 100, 'IM Receive Prefix', 'SEM', '', '', 1, '', NULL, 'Live'),
(145, '2016-11-12 12:54:28', NULL, 100, 'IM Transfer Prefix', 'ITOR', '', '', 1, '', NULL, 'Live'),
(248, '2017-10-09 07:51:09', NULL, 100, 'Item Brand', 'ACI', 'ACI', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(318, '2017-10-14 09:40:21', NULL, 100, 'Item Brand', 'Arometic', 'Arometic', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(280, '2017-10-14 09:34:57', NULL, 100, 'Item Brand', 'Axe', 'Axe', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(244, '2017-10-09 07:50:22', '2017-10-14 10:35:38', 100, 'Item Brand', 'Best Electronics', 'Electronics Iteam', NULL, 1, 'sahinodesk@gmail.com', 'ABL-777-0007@abl.com', 'Deleted'),
(294, '2017-10-14 09:37:06', NULL, 100, 'Item Brand', 'Chaka', 'Chaka', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(303, '2017-10-14 09:38:27', NULL, 100, 'Item Brand', 'Chamak', 'Chamak', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(315, '2017-10-14 09:40:02', NULL, 100, 'Item Brand', 'Chashi', 'Chashi', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(314, '2017-10-14 09:39:56', NULL, 100, 'Item Brand', 'Chopstick', 'Chopstick', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(290, '2017-10-14 09:36:38', NULL, 100, 'Item Brand', 'Closeup', 'Closeup', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(278, '2017-10-14 09:34:46', NULL, 100, 'Item Brand', 'Dove', 'Dove', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(211, '2017-06-03 07:28:19', NULL, 100, 'Item Brand', 'EVERCO', 'RO Machine', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(317, '2017-10-14 09:40:14', NULL, 100, 'Item Brand', 'Fun', 'Fun', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(277, '2017-10-14 09:34:37', NULL, 100, 'Item Brand', 'General', 'General', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(266, '2017-10-14 09:32:10', NULL, 100, 'Item Brand', 'Hitachi', 'Hitachi', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(249, '2017-10-09 07:51:17', NULL, 100, 'Item Brand', 'IFAD', 'IFAD', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(293, '2017-10-14 09:37:00', NULL, 100, 'Item Brand', 'Jui', 'Jui', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(279, '2017-10-14 09:34:51', NULL, 100, 'Item Brand', 'Knorr', 'Knorr', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(212, '2017-06-03 07:28:59', '2017-10-14 10:39:19', 100, 'Item Brand', 'KOKOMO', 'Biscuit', NULL, 1, 'ABL-777-0007@abl.com', 'ABL-777-0007@abl.com', 'Deleted'),
(304, '2017-10-14 09:38:46', NULL, 100, 'Item Brand', 'Kool', 'Kool', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(273, '2017-10-14 09:34:12', NULL, 100, 'Item Brand', 'Lenovo', 'Lenovo', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(356, '2018-09-19 05:16:23', NULL, 100, 'Item Brand', 'Leptop', 'Asus', NULL, 1, 'admin@demo.com', NULL, 'Live'),
(282, '2017-10-14 09:35:30', NULL, 100, 'Item Brand', 'Lifebuoy', 'Lifebuoy', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(283, '2017-10-14 09:35:37', NULL, 100, 'Item Brand', 'Lipton', 'Lipton', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(306, '2017-10-14 09:39:00', NULL, 100, 'Item Brand', 'magic', 'magic', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(286, '2017-10-14 09:36:01', NULL, 100, 'Item Brand', 'Magnum', 'Magnum', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(311, '2017-10-14 09:39:34', NULL, 100, 'Item Brand', 'Max Clean', 'Max Clean', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(302, '2017-10-14 09:38:21', NULL, 100, 'Item Brand', 'Meril Baby', 'Meril Baby', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(309, '2017-10-14 09:39:21', NULL, 100, 'Item Brand', 'Meril Milk Soap Bar', 'Meril Milk Soap Bar', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(298, '2017-10-14 09:37:56', NULL, 100, 'Item Brand', 'Meril Protective', 'Meril Protective', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(272, '2017-10-14 09:34:07', NULL, 100, 'Item Brand', 'Micromax', 'Micromax', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(274, '2017-10-14 09:34:19', NULL, 100, 'Item Brand', 'Midea', 'Midea', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(214, '2017-06-03 07:30:16', '2017-10-14 10:35:55', 100, 'Item Brand', 'PACIFAC LEATHER', 'Leather Item', NULL, 1, 'ABL-777-0007@abl.com', 'ABL-777-0007@abl.com', 'Deleted'),
(269, '2017-10-14 09:33:49', NULL, 100, 'Item Brand', 'Panasonic', 'Panasonic', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(289, '2017-10-14 09:36:18', NULL, 100, 'Item Brand', 'Pepsudent', 'Pepsudent', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(288, '2017-10-14 09:36:11', NULL, 100, 'Item Brand', 'Persil', 'Persil', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(270, '2017-10-14 09:33:53', NULL, 100, 'Item Brand', 'Philips', 'Philips', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(100, '2016-09-28 06:19:39', '2017-05-30 12:06:27', 100, 'Item Brand', 'PMDL', 'Peoples Marketing & Distribution Ltd.', '', 1, '', 'ABL-777-0007@abl.com', 'Deleted'),
(316, '2017-10-14 09:40:10', NULL, 100, 'Item Brand', 'Pure', 'Pure', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(312, '2017-10-14 09:39:42', NULL, 100, 'Item Brand', 'Radhuni', 'Radhuni', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(296, '2017-10-14 09:37:46', NULL, 100, 'Item Brand', 'Revive', 'Revive', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(281, '2017-10-14 09:35:10', NULL, 100, 'Item Brand', 'Rexona', 'Rexona', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(183, '2017-02-18 01:26:36', '2017-05-30 12:06:33', 100, 'Item Brand', 'RMDL', 'Revolution Marketing and Distribution Ltd.', NULL, 1, 'rajib@pureapp.com', 'ABL-777-0007@abl.com', 'Deleted'),
(313, '2017-10-14 09:39:51', NULL, 100, 'Item Brand', 'Ruchi', 'Ruchi', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(271, '2017-10-14 09:34:00', NULL, 100, 'Item Brand', 'Samsung', 'Samsung', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(301, '2017-10-14 09:38:15', NULL, 100, 'Item Brand', 'Select Plus', 'Select Plus', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(295, '2017-10-14 09:37:33', NULL, 100, 'Item Brand', 'Senora', 'Senora', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(297, '2017-10-14 09:37:50', NULL, 100, 'Item Brand', 'Sepnil', 'Sepnil', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(308, '2017-10-14 09:39:16', NULL, 100, 'Item Brand', 'Shakti', 'Shakti', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(267, '2017-10-14 09:32:20', NULL, 100, 'Item Brand', 'Sharp', 'Sharp', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(213, '2017-06-03 07:29:30', NULL, 100, 'Item Brand', 'SKIN FOOD', 'Skin care', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(265, '2017-10-14 08:40:10', NULL, 100, 'Item Brand', 'Sony', 'Electronics', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(299, '2017-10-14 09:38:03', NULL, 100, 'Item Brand', 'Spring', 'Spring', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(247, '2017-10-09 07:51:01', NULL, 100, 'Item Brand', 'Square Food & Beverage', 'Square Food & Beverage', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(246, '2017-10-09 07:50:53', '2017-10-14 10:36:59', 100, 'Item Brand', 'Squire Tolatories', 'Squire Tolatories', NULL, 1, 'sahinodesk@gmail.com', 'ABL-777-0007@abl.com', 'Deleted'),
(284, '2017-10-14 09:35:45', NULL, 100, 'Item Brand', 'Sunsilk', 'Sunsilk', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(300, '2017-10-14 09:38:09', NULL, 100, 'Item Brand', 'Supermom', 'Supermom', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(285, '2017-10-14 09:35:51', NULL, 100, 'Item Brand', 'Surf-excel', 'Surf-excel', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(292, '2017-10-14 09:36:51', NULL, 100, 'Item Brand', 'Taja', 'Taja', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(245, '2017-10-09 07:50:43', '2017-10-14 10:36:49', 100, 'Item Brand', 'Uniliver Bangladesh', 'Uniliver Bangladesh', NULL, 1, 'sahinodesk@gmail.com', 'ABL-777-0007@abl.com', 'Deleted'),
(275, '2017-10-14 09:34:24', NULL, 100, 'Item Brand', 'V-Guard', 'V-Guard', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(287, '2017-10-14 09:36:05', NULL, 100, 'Item Brand', 'Vaseline', 'Vaseline', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(291, '2017-10-14 09:36:46', NULL, 100, 'Item Brand', 'Vim', 'Vim', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(243, '2017-10-09 07:49:33', NULL, 100, 'Item Brand', 'Western', 'Western Electronics', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(268, '2017-10-14 09:33:42', NULL, 100, 'Item Brand', 'Whirlpool', 'Whirlpool', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(310, '2017-10-14 09:39:29', NULL, 100, 'Item Brand', 'White Plus', 'White Plus', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(307, '2017-10-14 09:39:07', NULL, 100, 'Item Brand', 'Xpel', 'Xpel', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(305, '2017-10-14 09:38:54', NULL, 100, 'Item Brand', 'Zerocal', 'Zerocal', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(325, '2017-11-06 05:55:41', NULL, 100, 'Item Category', 'Bakery', 'Bakery Item', NULL, 1, 'pdir@abl.com', NULL, 'Live'),
(217, '2017-06-03 14:03:15', NULL, 100, 'Item Category', 'Beauty Care', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(98, '2016-09-23 15:03:18', NULL, 100, 'Item Category', 'Beverage', 'Juice', '', 1, '', NULL, 'Live'),
(256, '2017-10-09 08:04:03', NULL, 100, 'Item Category', 'Books', 'Books', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(97, '2016-09-23 15:03:02', '2017-10-14 10:32:07', 100, 'Item Category', 'Clothing', 'Test All types of clothing items', '', 1, '', 'ABL-777-0007@abl.com', 'Deleted'),
(126, '2016-10-16 06:10:48', NULL, 100, 'Item Category', 'Computer', 'Computer Items', '', 1, '', NULL, 'Live'),
(253, '2017-10-09 08:02:02', NULL, 100, 'Item Category', 'Consumer', 'Consumer', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(255, '2017-10-09 08:03:53', NULL, 100, 'Item Category', 'Crockeries', 'Crockeries', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(257, '2017-10-09 08:04:22', NULL, 100, 'Item Category', 'Decoration', 'Decoration', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(258, '2017-10-09 08:04:40', NULL, 100, 'Item Category', 'Education & Training', 'Education & Training', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(96, '2016-09-23 15:02:46', NULL, 100, 'Item Category', 'Electronics', 'Electronics Items', '', 1, '', NULL, 'Live'),
(160, '2017-02-18 01:09:21', NULL, 100, 'Item Category', 'Food', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(99, '2016-09-23 15:16:59', '2017-10-14 10:32:37', 100, 'Item Category', 'Fresh', 'Fish', '', 1, '', 'ABL-777-0007@abl.com', 'Deleted'),
(264, '2017-10-09 08:09:27', NULL, 100, 'Item Category', 'Gifts Iteam', 'Gifts Iteam', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(161, '2017-02-18 01:11:12', NULL, 100, 'Item Category', 'Grocery', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(252, '2017-10-09 08:01:34', NULL, 100, 'Item Category', 'Health & Beauty', 'Health & Beauty', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(261, '2017-10-09 08:05:28', NULL, 100, 'Item Category', 'Health & Wealth', 'Health & Wealth', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(251, '2017-10-09 08:01:18', NULL, 100, 'Item Category', 'Home & Cleaning', 'Home & Cleaning', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(250, '2017-10-09 08:00:43', NULL, 100, 'Item Category', 'Home Appliances', 'Home Appliances', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(259, '2017-10-09 08:04:54', NULL, 100, 'Item Category', 'Kitchen Appliances', 'Kitchen Appliances', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(162, '2017-02-18 01:11:44', NULL, 100, 'Item Category', 'Life Style', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(124, '2016-10-11 17:22:26', NULL, 100, 'item Category', 'Mobile', 'mobile items', '', 1, '', NULL, 'Live'),
(260, '2017-10-09 08:05:13', NULL, 100, 'Item Category', 'Office Appliances', 'Office Appliances', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(353, '2018-09-19 05:13:46', NULL, 100, 'Item Category', 'Shaomi ', 'Redmi 4x+', NULL, 1, 'admin@demo.com', NULL, 'Live'),
(262, '2017-10-09 08:06:01', NULL, 100, 'Item Category', 'Sports', 'Sports', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(254, '2017-10-09 08:03:33', NULL, 100, 'Item Category', 'Toiletries', 'Toiletries', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(263, '2017-10-09 08:06:15', NULL, 100, 'Item Category', 'Toys', 'Toys', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(123, '2016-09-29 09:54:58', NULL, 100, 'Item Class', 'Local', '', '', 1, '', NULL, 'Live'),
(337, '2018-02-27 06:09:52', NULL, 100, 'Item Group', 'Finished Goods', '', NULL, 1, '', 'rajib', 'Live'),
(122, '2016-09-29 09:54:40', NULL, 100, 'Item Group', 'Raw Material', '', '', 1, '', NULL, 'Live'),
(336, '2018-02-27 06:09:52', NULL, 100, 'Item Group', 'Stationary', '', NULL, 1, '', 'rajib', 'Live'),
(125, '2016-10-14 15:50:26', NULL, 100, 'Item Prefix', 'ITM0', '', '', 1, '', NULL, 'Live'),
(358, '2018-09-19 05:20:26', NULL, 100, 'Item Prefix', 'ITM1', 'Item Category', NULL, 1, 'admin@demo.com', NULL, 'Live'),
(157, '2017-02-18 01:08:47', NULL, 100, 'Item Size', '01', '250ml', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(158, '2017-02-18 01:08:51', NULL, 100, 'Item Size', '02', '500ml', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(159, '2017-02-18 01:08:55', NULL, 100, 'Item Size', '03', '1ltr', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(320, '2017-11-01 11:17:57', NULL, 100, 'Item Size', '04', '1KG', NULL, 1, 'amarbazarltd@gmail.com', NULL, 'Live'),
(202, '2017-02-20 18:16:04', '2017-06-03 07:09:39', 100, 'Item Size', '05', '', NULL, 1, 'rajib@pureapp.com', 'ABL-777-0007@abl.com', 'Deleted'),
(327, '2017-11-06 06:01:08', NULL, 100, 'Item Size', '06', '100gm', NULL, 1, 'pdir@abl.com', NULL, 'Live'),
(328, '2017-11-06 06:01:18', NULL, 100, 'Item Size', '07', '130gm', NULL, 1, 'pdir@abl.com', NULL, 'Live'),
(329, '2017-11-06 06:01:37', NULL, 100, 'Item Size', '08', '150gm', NULL, 1, 'pdir@abl.com', NULL, 'Live'),
(330, '2017-11-06 06:02:02', NULL, 100, 'Item Size', '09', '160gm', NULL, 1, 'pdir@abl.com', NULL, 'Live'),
(137, '2016-11-11 12:47:24', '2017-06-03 07:09:47', 100, 'Item Size', '12', '5KG', '', 1, '', 'ABL-777-0007@abl.com', 'Deleted'),
(138, '2016-11-11 12:47:28', '2017-06-03 07:09:55', 100, 'Item Size', '14', '10KG', '', 1, '', 'ABL-777-0007@abl.com', 'Deleted'),
(324, '2017-11-02 08:07:43', '2017-11-02 09:09:44', 100, 'Item Size', '18', '500gm', NULL, 1, 'dgmproduct@abl.com', 'dgmproduct@abl.com', 'Deleted'),
(319, '2017-11-01 11:17:37', '2017-11-01 12:18:13', 100, 'Item Size', '1KG', '', NULL, 1, 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(341, '2018-04-05 05:43:22', NULL, 100, 'Item Size', '50x50 fit', '', NULL, 1, 'admin@demo.com', NULL, 'Live'),
(342, '2018-04-05 05:44:44', NULL, 100, 'Item Size', '5kg', '10', NULL, 1, 'admin@demo.com', NULL, 'Live'),
(344, '2018-04-11 09:58:22', NULL, 100, 'PO Cost Head', 'Bank Charge', '', NULL, 1, 'rajib', NULL, 'Live'),
(345, '2018-04-11 09:58:22', NULL, 100, 'PO Cost Head', 'CNF Cost', '', NULL, 1, 'rajib', NULL, 'Live'),
(346, '2018-04-11 09:59:03', NULL, 100, 'PO Cost Head', 'Custom Duty', '', NULL, 1, 'rajib', NULL, 'Live'),
(343, '2018-04-11 09:56:41', NULL, 100, 'PO Cost Head', 'LC Payment', '', NULL, 1, 'rajib', NULL, 'Live'),
(350, '2018-04-11 10:00:22', NULL, 100, 'PO Cost Head', 'Miscellaneous', '', NULL, 1, 'rajib', NULL, 'Live'),
(349, '2018-04-11 10:00:04', NULL, 100, 'PO Cost Head', 'Port Charge', '', NULL, 1, 'rajib', NULL, 'Live'),
(348, '2018-04-11 10:00:04', NULL, 100, 'PO Cost Head', 'Transport', '', NULL, 1, 'rajib', NULL, 'Live'),
(347, '2018-04-11 09:59:03', NULL, 100, 'Port Charge', 'CNF Cost', '', NULL, 1, 'rajib', NULL, 'Live'),
(180, '2017-02-18 01:23:19', NULL, 100, 'Product Source', 'ABL', 'ABL Prodicts', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(182, '2017-02-18 01:26:14', NULL, 100, 'Product Source', 'Corporate', 'Corporate Products', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(181, '2017-02-18 01:25:45', NULL, 100, 'Product Source', 'OSP', 'OSP Products', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(351, '2018-05-24 14:57:15', NULL, 100, 'Project', 'Abedin Bazar ', '', NULL, 1, 'rajib@dotbdsolutions.com', NULL, 'Live'),
(340, '2018-03-25 05:49:39', NULL, 100, 'Purchase Prefix', 'PORD', '', NULL, 1, 'rajib@dotbdsolutions.com', NULL, 'Live'),
(131, '2016-11-07 04:49:23', NULL, 100, 'Quality Check Prefix', 'QCHK', '', '', 1, '', NULL, 'Live'),
(130, '2016-10-22 12:32:47', NULL, 100, 'Security Check Prefix', 'ICHK', '', '', 1, '', NULL, 'Live'),
(215, '2017-06-03 07:52:50', '2017-10-14 10:34:03', 100, 'Supplier', 'GREEN TOUCH ECOMMERS SYSTEM', 'Freelancing Course,', NULL, 1, 'ABL-777-0007@abl.com', 'ABL-777-0007@abl.com', 'Deleted'),
(210, '2017-06-03 05:13:06', NULL, 100, 'Supplier', 'Nexus Trade Home', 'RO Machine Supplier', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(216, '2017-06-03 07:53:46', NULL, 100, 'Supplier', 'PACIFAC LEATHER', 'Leather Item', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(129, '2016-10-20 02:33:39', NULL, 100, 'Supplier Prefix', 'SUP0', '', '', 1, '', NULL, 'Live'),
(354, '2018-09-19 05:15:21', NULL, 100, 'Supplier Prefix', 'SUP1', 'Supplier', NULL, 1, 'admin@demo.com', NULL, 'Live'),
(112, '2016-09-28 10:16:50', NULL, 100, 'Tax Code Purchase', 'TAX', '', '', 1, '', NULL, 'Live'),
(113, '2016-09-28 10:16:54', NULL, 100, 'Tax Code Purchase', 'VAT', '', '', 1, '', NULL, 'Live'),
(121, '2016-09-28 11:46:55', NULL, 100, 'Tax Code Sales', 'VAT', '', '', 1, '', NULL, 'Live'),
(128, '2016-10-19 13:38:02', NULL, 100, 'Tax Scope', 'None', '', '', 1, '', NULL, 'Live'),
(192, '2017-02-18 21:07:50', NULL, 100, 'UOM', 'Barrel', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(193, '2017-02-18 21:08:09', NULL, 100, 'UOM', 'Container', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(109, '2016-09-28 10:16:09', NULL, 100, 'UOM', 'DOZEN', '', '', 1, '', NULL, 'Live'),
(187, '2017-02-18 21:03:25', NULL, 100, 'UOM', 'ft', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(188, '2017-02-18 21:03:42', NULL, 100, 'UOM', 'inch', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(110, '2016-09-28 10:16:28', NULL, 100, 'UOM', 'KG', '', '', 1, '', NULL, 'Live'),
(111, '2016-09-28 10:16:32', NULL, 100, 'UOM', 'LITRE', '', '', 1, '', NULL, 'Live'),
(185, '2017-02-18 21:03:06', NULL, 100, 'UOM', 'ml', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(186, '2017-02-18 21:03:19', NULL, 100, 'UOM', 'mm', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(218, '2017-06-03 14:03:32', NULL, 100, 'UOM', 'Package', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(107, '2016-09-28 10:15:36', NULL, 100, 'UOM', 'PCS', '', '', 1, '', NULL, 'Live'),
(108, '2016-09-28 10:15:43', NULL, 100, 'UOM', 'SET', '', '', 1, '', NULL, 'Live'),
(189, '2017-02-18 21:04:21', NULL, 100, 'UOM', 'yards', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(151, '2017-02-17 23:27:16', NULL, 100, 'Warehouse', 'CW', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(242, '2017-07-27 05:32:09', '2017-10-14 10:40:59', 100, 'Warehouse', 'Mohanagar Project', '', NULL, 1, 'ABL-777-0007@abl.com', 'ABL-777-0007@abl.com', 'Deleted'),
(235, '2017-07-27 05:26:57', NULL, 100, 'Warehouse', 'Naya Palton', 'Dhaka Warehouse', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `secus`
--

CREATE TABLE `secus` (
  `xcussl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcus` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xshort` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xorg` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xadd1` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xadd2` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbillingadd` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeliveryadd` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcity` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xprovince` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpostal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcountry` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcontact` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtitle` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcusemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfax` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xweburl` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xnid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgcus` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpricegroup` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcustype` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xindustryseg` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdiscountpct` double DEFAULT NULL,
  `xagent` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcommisionpct` double DEFAULT NULL,
  `xcreditlimit` double DEFAULT NULL,
  `xcreditterms` int(3) DEFAULT NULL,
  `zactive` int(1) DEFAULT NULL,
  `xrecflag` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `zemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xlt` varchar(100) DEFAULT NULL,
  `xln` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secus`
--

INSERT INTO `secus` (`xcussl`, `ztime`, `zutime`, `bizid`, `xemail`, `xcus`, `xshort`, `xorg`, `xadd1`, `xadd2`, `xbillingadd`, `xdeliveryadd`, `xcity`, `xprovince`, `xpostal`, `xcountry`, `xcontact`, `xtitle`, `xphone`, `xcusemail`, `xmobile`, `xfax`, `xweburl`, `xnid`, `xtaxno`, `xtaxscope`, `xgcus`, `xpricegroup`, `xcustype`, `xindustryseg`, `xdiscountpct`, `xagent`, `xcommisionpct`, `xcreditlimit`, `xcreditterms`, `zactive`, `xrecflag`, `zemail`, `xlt`, `xln`) VALUES
(2, '2018-03-27 04:37:28', NULL, 100, NULL, '100000002', NULL, 'Tajmul', 'Mohakhali road ', 'Dhaka', 'Mohakahali', NULL, NULL, NULL, 'Dhaka', NULL, 'user1', 'abc', '01796962667', NULL, '01796o62667', NULL, 'Rajib', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', NULL, NULL),
(9, '2018-05-12 10:14:26', NULL, 100, NULL, '100000007', NULL, '', '', '', '', NULL, NULL, NULL, '', NULL, 'user1', '', '', NULL, '', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', NULL, NULL),
(10, '2018-05-12 13:44:14', NULL, 100, NULL, '100000008', NULL, 'xyz shop', 'Dhaka ', 'xyz', 'abc', NULL, NULL, NULL, 'asdf', NULL, 'user1', 'abcdef', '017969626674', NULL, '017979736637', NULL, '017969626674', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', NULL, NULL),
(11, '2018-06-10 17:26:52', NULL, 100, NULL, '100000009', NULL, 'blala', 'dhaka', 'dhaka', 'dhaka', NULL, NULL, NULL, 'dhaka', NULL, 'Tajimul', 'bababa', '028377', NULL, '03877474', NULL, 'babau', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.725249', '90.4245562'),
(12, '2018-06-10 17:39:16', NULL, 100, NULL, '100000010', NULL, 'chhfdhd', 'fufufg', 'hfufug', 'gcfhgj', NULL, NULL, NULL, 'hfjf', NULL, 'Demo', 'ruut', '4744474', NULL, '464464y4', NULL, '57757', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7252389', '90.4245547'),
(13, '2018-06-10 17:49:18', NULL, 100, NULL, '100000011', NULL, 'fufgugg', 'fuffugjg', 'fugncjgg', 'chhffhcj', NULL, NULL, NULL, 'fyffig', NULL, 'Demo1', 'fufugugg', '575855', NULL, '85585858', NULL, 'stdfug', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7252253', '90.4245582'),
(14, '2018-06-10 18:02:01', NULL, 100, NULL, '100000012', NULL, 'karim', 'tufufg', 'fhfjgjg', 'fhfcjkg', NULL, NULL, NULL, 'fuuf', NULL, 'Demo2', 'fuuffugg', '75755558', NULL, '75586', NULL, 'hfycg', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7252276', '90.4245588'),
(15, '2018-06-11 13:17:12', NULL, 100, NULL, '100000013', NULL, 'salahuddin', 'Dhaka ', 'dhaka ', 'dhaka', NULL, NULL, NULL, 'Dhaka ', NULL, 'user1', 'Dhaka ', '018388383', NULL, '2828828282', NULL, '282828', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7252629', '90.4245389'),
(16, '2018-06-11 18:50:04', NULL, 100, NULL, '100000014', NULL, 'salauddib', 'Dhaka ', 'Dhaka ', 'dhaka', NULL, NULL, NULL, 'Dhaka ', NULL, 'rajib', 'Dhaka ', '66667', NULL, '666777', NULL, '66677', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7252234', '90.4245594'),
(17, '2018-07-29 04:04:26', NULL, 100, NULL, '100000015', NULL, 'Test Customer', '', '', 'Dhaka', NULL, NULL, NULL, '', NULL, 'Demo', '', '0', NULL, '0', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7842318', '90.3934822'),
(18, '2018-07-29 15:41:12', NULL, 100, NULL, '100000016', NULL, 'Abc enterp', '', '', '', NULL, NULL, NULL, '', NULL, 'Demo', '', '0', NULL, '0', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7631173', '90.4223813'),
(19, '2018-07-29 15:43:07', NULL, 100, NULL, '100000017', NULL, 'Test abv', '', '', '', NULL, NULL, NULL, '', NULL, 'Demo', '', '0', NULL, '0', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7631784', '90.4224227'),
(20, '2018-07-29 15:55:08', NULL, 100, NULL, '100000018', NULL, 'Aman Ent', '', '', '', NULL, NULL, NULL, '', NULL, 'Demo', '', '0', NULL, '0', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7629698', '90.4224958'),
(21, '2018-07-29 15:58:16', NULL, 100, NULL, '100000019', NULL, 'Wether store', '', '', '', NULL, NULL, NULL, '', NULL, 'Demo', '', '0', NULL, '0', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7634581', '90.4221831'),
(22, '2018-07-30 10:04:03', NULL, 100, NULL, '100000020', NULL, 'On test', '', '', '', NULL, NULL, NULL, '', NULL, 'Demo', '', '0', NULL, '0', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7843821', '90.3936632'),
(26, '2018-08-05 07:28:37', NULL, 100, NULL, '100000021', NULL, 'Ajmed & Sons', '', '', '', NULL, NULL, NULL, '', NULL, 'Rajib', '', '0', NULL, '', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7843092', '90.3934568'),
(27, '2018-08-05 07:44:56', NULL, 100, NULL, '100000022', NULL, 'Abul pharma', '', '', '', NULL, NULL, NULL, '', NULL, 'Rajib', '', 'O', NULL, 'O', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7843236', '90.3935207'),
(28, '2018-08-07 09:56:35', NULL, 100, NULL, '100000023', NULL, 'Start position mohakhali', '', '', '', NULL, NULL, NULL, '', NULL, 'Rajib', '', '', NULL, '', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7842421', '90.3935335'),
(29, '2018-08-16 09:08:11', NULL, 100, NULL, '100000024', NULL, 'ABC INT', '', '', '', NULL, NULL, NULL, '', NULL, 'Rajib', '', '', NULL, '', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7457254', '90.3943233'),
(30, '2018-08-16 09:21:58', NULL, 100, NULL, '100000025', NULL, 'XYZ Int', '', '', '', NULL, NULL, NULL, '', NULL, 'Rajib', '', '', NULL, '', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7457245', '90.3945931'),
(31, '2018-08-27 10:39:07', NULL, 100, NULL, '100000026', NULL, 'my office', '', '', '', NULL, NULL, NULL, '', NULL, 'Tajimul', '', '', NULL, '', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7843263', '90.3934745'),
(32, '2018-08-27 11:21:59', NULL, 100, NULL, '100000027', NULL, 'New Customer', '19', '', '', NULL, NULL, NULL, '', NULL, 'kamrul', '', '01847855677', NULL, '01668735788', NULL, '', NULL, NULL, NULL, 'Retailer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Live', '', '23.7843274', '90.3934767'),
(3, '2018-03-29 09:35:14', NULL, 100, NULL, 'CUS0000001', '', 'Test Customer', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'None', '', '', '', 0, '', 0, 0, 0, 1, 'Live', 'rajib@dotbdsolutions.com', NULL, NULL),
(4, '2018-04-05 05:22:36', NULL, 100, NULL, 'CUS0000002', 'juss', 'kind of juss', 'mohakhali', '', 'mohakhali', '', '', '', '', 'Bangladesh', '', 'CEO', '', '', '', '', '', '', '', 'None', 'None', '', '', '', 0, '', 0, 0, 0, 1, 'Live', 'rajib@dotbdsolutions.com', NULL, NULL),
(5, '2018-04-05 05:24:01', NULL, 100, NULL, 'CUS0000003', 'Main Uddin', 'Foods Matarials', 'Uttara Dhaka', 'sector 4', 'House 303', 'House 265, Road 19', '', '', '3900', 'Germany', '0179765363', 'jkfhiuiu', '0177387998', 'main@gmail.com', '07896538769', 'oiojuodh', 'khhcdj.com', '09876534567', '1234', 'None', 'None', '', '', '', 5, '543', 5, 3, 2, 1, 'Live', 'admin@demo.com', NULL, NULL),
(6, '2018-05-06 03:49:15', NULL, 100, NULL, 'CUS0000004', 'BD Trade', 'BD TRADE INTERNATIONAL', 'Mohakhali DOHS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'None', '', '', '', 0, '', 0, 0, 0, 1, 'Live', 'rajib@dotbdsolutions.com', NULL, NULL),
(7, '2018-05-06 03:51:53', NULL, 100, NULL, 'CUS0000005', 'Prime', 'Prime Group ', 'Banani', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'None', '', '', '', 0, '', 0, 0, 0, 1, 'Live', 'rajib@dotbdsolutions.com', NULL, NULL),
(8, '2018-05-06 03:53:22', NULL, 100, NULL, 'CUS0000006', 'Taj Fashion', 'Taj Fashion Ltd.', 'Saver', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'None', '', '', '', 0, '', 0, 23456, 20, 1, 'Live', 'rajib@dotbdsolutions.com', NULL, NULL),
(23, '2018-08-02 09:43:48', NULL, 100, NULL, 'CUS0000007', '', 'Md Rajibul Islam', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'None', '', '', '', 0, '', 0, 0, 0, 1, 'Live', 'rajib@dotbdsolutions.com', NULL, NULL),
(24, '2018-08-02 09:46:23', NULL, 100, NULL, 'CUS0000008', '', 'Md Rajibul Islam', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'None', '', '', '', 0, '', 0, 0, 0, 1, 'Live', 'rajib@dotbdsolutions.com', NULL, NULL),
(25, '2018-08-03 14:53:01', NULL, 100, NULL, 'CUS0000009', '', 'Md Rajibul Islam', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'None', '', '', '', 0, '', 0, 0, 0, 1, 'Live', 'rajib@dotbdsolutions.com', NULL, NULL),
(33, '2018-09-11 08:39:45', '2018-09-11 08:40:11', 100, 'rajib@dotbdsolutions.com', 'CUS0000010', 'sakib', 'Demo Sakib', 'dhaka', 'dhaka', 'dhaka', 'dhaka', '', '', '1216', 'Bangladesh', '122345566', 'fgarga', '2345', 'fgda@email.com', '22345', '345', 'rer.com', '6543', '34', '', 'None', '', '', '', 0, '', 0, 0, 0, 1, 'Deleted', 'rajib@dotbdsolutions.com', NULL, NULL),
(1, '2018-03-24 09:11:09', NULL, 100, NULL, 'DIN0000001', '', 'MS MAA STORE', '', '', '', '', '', '', '', '', 'user1', '', '', '', '', '', '', '', '', '', 'MRP', '', '', '', 0, '', 0, 0, 0, 1, 'Live', 'rajib@dotbdsolutions.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seitem`
--

CREATE TABLE `seitem` (
  `xitemid` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` timestamp NULL DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `xitemcode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xitemcodealt` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xsource` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xlongdesc` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xcat` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xbrand` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xgitem` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcitem` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxcodepo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxcodesales` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcountryoforig` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsup` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xunitpur` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xunitsale` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xunitstk` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xconversion` double NOT NULL,
  `xmandatorybatch` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `xserialconf` enum('None','Mandatory') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `xtypestk` enum('Stocking','Non Stoking') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Stocking',
  `xreorder` double DEFAULT NULL,
  `xpricepur` double DEFAULT NULL,
  `xstdcost` double DEFAULT NULL,
  `xmrp` double DEFAULT NULL,
  `xcp` double DEFAULT NULL,
  `xdp` double DEFAULT NULL,
  `xstdprice` double NOT NULL,
  `xvatpct` double NOT NULL DEFAULT '0',
  `zactive` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `xcolor` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsize` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seitem`
--

INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xvatpct`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(1038, '2017-08-25 11:20:59', NULL, 100, ' BEL-IRN-CON-1051', 'BEL-IRN-CON-1051', 'Corporate', 'BESW-3188', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1080, 1248, 1248, 1248, 10, 1248, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1495, '2018-03-29 09:30:59', NULL, 100, '11111', '11111', '', 'test', '', '', '', 'Stationary', 'ostock', '', '', '', '', '', '', '', 1, 'No', 'None', 'Stocking', 0, 0, 0, 0, 0, 0, 0, 0, '1', '', '', 'rajib@dotbdsolutions.com', NULL, 'Live'),
(1498, '2018-03-29 10:48:04', NULL, 100, '11111111', '11111', '', 'test', '', '', '', 'Stationary', '', '', '', '', '', '', '', '', 1, 'No', 'None', 'Stocking', 0, 0, 0, 0, 0, 0, 0, 0, '1', '', '', 'rajib@dotbdsolutions.com', NULL, 'Live'),
(1501, '2018-04-05 12:28:08', NULL, 100, '1122', '', '', 'Chair', '', 'Office Appliances', 'IFAD', 'Finished Goods', 'Local', '', '', 'Bangladesh', 'SUP0000035', 'PCS', 'PCS', 'PCS', 1, 'No', 'None', 'Stocking', 0, 4500, 0, 6200, 0, 0, 0, 0, '1', 'Black', '', 'rajib@dotbdsolutions.com', NULL, 'Live'),
(1502, '2018-05-07 04:32:54', NULL, 100, '12121', '122212', 'OSP', 'teeee', '', 'Crockeries', '', 'Raw Material', '', '', '', '', 'SUP0000052', 'KG', 'KG', 'KG', 1, 'No', 'None', 'Stocking', 0, 0, 0, 0, 0, 0, 0, 0, '1', '', '', 'rajib@dotbdsolutions.com', NULL, 'Live'),
(1496, '2018-03-29 09:53:34', NULL, 100, '12345', '12345', '', 'test', '', '', '', 'Raw Material', '', '', '', 'China', 'SUP0000049', 'PCS', 'PCS', 'PCS', 1, 'No', 'None', 'Stocking', 0, 0, 0, 0, 0, 0, 0, 0, '1', '', '', 'rajib@dotbdsolutions.com', NULL, 'Live'),
(1503, '2018-05-19 04:02:34', '2018-09-19 09:25:39', 100, '7000-1', '7000-1', 'Corporate', 'Card Holder', 'Visiting card Holder', 'Electronics', '', 'Stationary', 'Local', '', '', 'Bangladesh', 'SUP0000032', 'PCS', 'PCS', 'PCS', 1, 'No', 'None', 'Stocking', 0, 22, 0, 32, 0, 0, 26, 0, '1', 'White', '', 'rajib@dotbdsolutions.com', 'admin@demo.com', 'Live'),
(1504, '2018-08-07 06:01:54', NULL, 100, '7001', '', '', 'Nokia Phone', '', 'Electronics', '', 'Finished Goods', '', '', '', '', 'SUP0000054', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3200, 0, 4500, 0, 0, 0, 0, '1', '', '', 'rajib@dotbdsolutions.com', NULL, 'Live'),
(1499, '2018-04-05 06:04:48', NULL, 100, '7685899', '87654334', 'ABL', 'RFL Plastic Door', 'kjh iuhiueeg iuufheh', 'Office Appliances', 'Knorr', 'Raw Material', 'Local', 'VAT', 'VAT', 'Bangladesh', 'SUP0000052', 'PCS', 'PCS', 'PCS', 1, 'No', 'None', 'Stocking', 0, 700, 800, 900, 1000, 10, 1100, 0, '1', 'White', '', 'admin@demo.com', NULL, 'Live'),
(1500, '2018-04-05 06:23:09', NULL, 100, '8433278432', '', 'Corporate', 'mi mobile', '', 'Mobile', 'Sony', 'Stationary', 'Local', 'TAX', 'VAT', '', 'SUP0000053', 'DOZEN', 'PCS', 'PCS', 1, 'No', 'Mandatory', 'Stocking', 0, 52000, 52500, 54000, 56789, 0, 54900, 0, '1', 'Red', '', 'rajib@dotbdsolutions.com', NULL, 'Live'),
(71, '2017-07-13 09:31:04', '2017-10-24 08:38:13', 100, 'ABL-AVG-1000', 'AVG-1000', 'OSP', 'Aseel Vegetable Ghee-1kg', '', '', '', '', '', '', '', '', 'SUP0000015', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 390, 500, 550, 500, 5, 500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'rajib@pureapp.com', 'Live'),
(73, '2017-07-13 12:44:31', '2017-07-17 08:26:33', 100, 'ABL-KGP-24', 'ABL-KGP-24', 'OSP', '  Kokomo Gel Ballpen 24pcs', '', '', '', '', 'ostock', '', '', '', 'SUP0000015', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 60, 110, 120, 110, 5, 110, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(72, '2017-07-13 12:42:37', '2017-07-17 08:01:09', 100, 'ABL-LVN-09', 'ABL-LVN-09', 'OSP', 'Laccha Semai 200gm X 3, Vermichelli Semai 200gm X3, Cocala Egg Noodles 150gm X 3,  Kokomo Gel Ballpen 12pcs', '', '', '', '', '', '', '', '', 'SUP0000015', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 204, 290, 320, 290, 5, 290, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(151, '2017-08-10 10:31:12', NULL, 100, 'ABL-MAC-01', 'ABL-MAC-01', 'OSP', 'Mobile Anti Radiation Chip-01pcs', '', '', '', '', '', '', '', '', 'SUP0000019', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 58, 350, 400, 350, 25, 350, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(152, '2017-08-10 10:32:58', NULL, 100, 'ABL-MAC-04', 'ABL-MAC-04', 'OSP', 'Mobile Anti Radiation Chip-04pcs', '', '', '', '', '', '', '', '', 'SUP0000019', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 232, 1340, 1500, 1340, 100, 1340, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1438, '2017-10-08 07:43:12', NULL, 100, 'ABL-MFP-33', 'ABL-MFP-33', 'OSP', 'Amarbazar Family Package', '', 'Grocery', '', '', '', '', '', '', 'SUP0000015', 'Package', 'Package', '', 1, 'Yes', 'None', 'Stocking', 0, 3209.99, 3900, 3979, 3900, 50, 3900, 0, '1', '', '', 'ABL-777-0007@abl.com', NULL, 'Live'),
(1465, '2017-10-29 14:17:34', '2017-10-30 02:54:59', 100, 'ABL-MFP-BBT', 'ABL-MFP-BBT', 'OSP', 'Tazza Tea 400gm witth free Tea Jar', '', '', 'Taja', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 148.25, 0, 0, 0, 0, 0, 0, '0', '', '', 'ABL-777-0007@abl.com', 'ABL-777-0007@abl.com', 'Live'),
(74, '2017-07-13 12:46:32', '2017-07-16 07:17:13', 100, 'ABL-PD-2000', 'ABL-PD-2000', 'OSP', 'ABL Powder Drinks- 2kg', '', '', '', '', 'ostock', '', '', '', 'SUP0000015', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 486, 565, 600, 565, 5, 565, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(1392, '2017-09-28 05:28:11', '2017-10-24 11:32:30', 100, 'ABL-STC-003', 'ABL-STC-003', 'Corporate', 'Amarbazar Startup Training Course', '', '', '', '', '', '', '', '', 'SUP0000038', 'Package', 'Package', 'Package', 1, 'No', 'None', 'Stocking', 0, 1, 1200, 1200, 1200, 100, 1200, 0, '0', '', '', 'ABL-777-0007@abl.com', 'sahinodesk@gmail.com', 'Live'),
(1441, '2017-10-09 10:28:01', '2017-10-24 11:29:45', 100, 'ABL-STC-004', 'ABL-STC-004', 'Corporate', 'Amarbazar Startup Training Course', '', '', '', '', '', '', '', '', 'SUP0000038', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1, 1200, 1200, 1200, 100, 1200, 0, '0', '', '', 'ABL-777-0007@abl.com', 'sahinodesk@gmail.com', 'Live'),
(1461, '2017-10-21 09:25:14', '2017-11-08 16:17:15', 100, 'ABL-STC-005', 'ABL-STC-005', 'Corporate', 'Amarbazar Startup Training Course', '', 'Education & Training', '', '', '', '', '', '', 'SUP0000038', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1, 1200, 1200, 1200, 100, 1200, 0, '0', '', '', 'ABL-777-0007@abl.com', 'ABL-777-0007@abl.com', 'Live'),
(1493, '2017-11-08 08:11:43', NULL, 100, 'ABL-STC-006', 'ABL-STC-005', 'Corporate', 'Amarbazar Startup Training Course', '', 'Education & Training', '', '', '', '', '', '', 'SUP0000038', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1, 1200, 1200, 1200, 100, 1200, 0, '1', '', '', 'ABL-777-0007@abl.com', NULL, 'Live'),
(1462, '2017-10-24 12:38:56', NULL, 100, 'ABL-STC-CTG-001', 'ABL-STC-CTG-001', 'Corporate', 'Amarbazar Start-Up Training Course (CTG Campus)', '', 'Education & Training', '', '', '', '', '', '', 'SUP0000038', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1, 1200, 1200, 1200, 100, 1200, 0, '1', '', '', 'ABL-777-0007@abl.com', NULL, 'Live'),
(153, '2017-08-22 10:41:37', '2017-10-22 07:48:40', 100, 'ACI-ASL-475', 'ACI-ASL-475', 'OSP', 'ACI Aerosol 475ml ', '', '', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 268.5, 287, 290, 287, 0.25, 287, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(154, '2017-08-22 10:43:47', '2017-10-22 07:50:17', 100, 'ACI-ASL-800', 'ACI-ASL-800', 'OSP', 'ACI Aerosol 800ml ', '', '', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 383, 410, 415, 410, 0.4, 410, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(157, '2017-08-22 10:50:02', '2017-10-25 05:01:21', 100, 'ACI-HWA-250', 'ACI-HWA-250', 'OSP', 'Savlon Hand Wash(Aloe Vera) 250ml', '', '', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79.41, 88, 90, 88, 0.04, 88, 0, '1', '', '', 'amarbazarltd@gmail.com', 'ABL-777-0007@abl.com', 'Live'),
(1463, '2017-10-25 06:25:10', NULL, 100, 'ACI-HWAC-250', 'ACI-HWAC-250', 'OSP', 'Savlon Hand Wash(Active) 250ml', '', 'Toiletries', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79.41, 88, 90, 88, 0.04, 88, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1464, '2017-10-25 06:30:59', NULL, 100, 'ACI-HWOB-250', 'ACI-HWOB-250', 'OSP', 'Savlon Hand Wash(Ocean Blue) 250ml', '', 'Toiletries', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79.41, 88, 90, 88, 0.04, 88, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(155, '2017-08-22 10:46:55', '2017-11-05 10:10:41', 100, 'ACI-NODA-75', 'ACI-NODA-75', 'OSP', 'Neem Orginal (Olive & Aloevera) Soap -75gm', '', 'Toiletries', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26.67, 29, 30, 29, 0.05, 29, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(156, '2017-08-22 10:48:45', '2017-11-05 10:11:40', 100, 'ACI-NOPN-75', 'ACI-NOPN-75', 'OSP', 'Neem Orginal (Pure Neem) Soap - 75gm', '', 'Toiletries', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26.67, 29, 30, 29, 0.05, 29, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(158, '2017-08-22 10:51:07', '2017-10-22 07:58:42', 100, 'ACI-SAB-100', 'ACI-SAB-100', 'OSP', 'Savlon Active Bar Soap 100gm', '', '', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33.46, 37, 38, 37, 0.1, 37, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(159, '2017-08-22 10:52:16', '2017-10-22 08:21:10', 100, 'ACI-SAC-100', 'ACI-SAC-100', 'OSP', 'Savlon Antiseptic Cream 100gm', '', '', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45.31, 49, 50, 49, 0.1, 49, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(165, '2017-08-22 11:03:44', '2017-10-22 08:04:35', 100, 'ACI-SAC-60X4', 'ACI-SAC-60X4', 'OSP', 'Savlon Antiseptic Cream 60gmX4', '', '', '', '', '', '', '', '', 'SUP0000020', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 100, 99, 100, 99, 0.05, 99, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(160, '2017-08-22 10:55:16', '2017-09-10 04:57:14', 100, 'ACI-SASF-100', 'ACI-SASF-100', 'OSP', 'Savlon Antiseptic Soap Fresh-100gm', '', '', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36.78, 42, 46, 42, 0.3, 42, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(186, '2017-08-23 10:16:16', '2017-10-22 08:06:39', 100, 'ACI-SASF-125', 'ACI-SASF-125', 'OSP', 'Savlon Antiseptic Soap Fresh-125gm', '', '', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42.06, 45, 46, 45, 0.04, 45, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(161, '2017-08-22 10:56:58', '2017-10-22 08:11:36', 100, 'ACI-SL-1L', 'ACI-SL-1L', 'OSP', 'Savlon Lequid-1L', '', 'Home & Cleaning', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 197, 215, 220, 215, 0.05, 215, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(162, '2017-08-22 10:58:13', '2017-10-22 08:12:45', 100, 'ACI-SMB-75', 'ACI-SMB-75', 'OSP', 'Savlon Mild Bar Soap-75gm New', '', '', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26.24, 30, 32, 30, 0.25, 30, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(163, '2017-08-22 10:59:51', '2017-10-22 08:15:49', 100, 'ACI-SSWP-1K', 'ACI-SSWP-1K', 'OSP', 'Smart Supreme Washing Powder-1kg', '', '', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 87.04, 93, 95, 93, 0.05, 93, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(164, '2017-08-22 11:01:22', '2017-10-22 08:16:29', 100, 'ACI-SWP-1K', 'ACI-SWP-1K', 'OSP', 'Smart Washing Powder- 1kg', '', '', '', '', '', '', '', '', 'SUP0000020', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 60, 70, 72, 70, 0.5, 70, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1308, '2017-08-30 06:50:43', NULL, 100, 'AFL-AIG-50X02', 'AFL-AIG-50X02', 'OSP', 'ACI Isubgul-50gmX02', '', '', '', '', '', '', '', '', 'SUP0000036', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 90, 110, 120, 110, 1.5, 110, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1309, '2017-08-30 06:52:39', NULL, 100, 'AFL-GHE-450', 'AFL-GHE-450', 'OSP', 'ACI Ghee-400gm', '', '', '', '', '', '', '', '', 'SUP0000036', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 391.04, 420, 430, 420, 2.5, 420, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1416, '2017-10-04 08:25:22', '2017-11-03 08:31:11', 100, 'ALL-AnBioplex-450ml', 'ALL-AnBioplex-450ml', 'OSP', 'An Bioplex-450ml', '', '', '', '', '', '', '', '', 'SUP0000040', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 120, 180, 200, 180, 5, 180, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1413, '2017-10-04 08:20:05', '2017-11-03 08:31:24', 100, 'ALL-Ancoli-450ml', 'ALL-Ancoli-450ml', 'OSP', 'Ancoli-450ml', '', '', '', '', '', '', '', '', 'SUP0000040', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 102, 155, 170, 155, 5, 155, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1414, '2017-10-04 08:22:32', '2017-11-03 08:31:37', 100, 'ALL-Ancovas-200ml', 'ALL-Ancovas-200ml', 'OSP', 'Ancovas-200ml', '', '', '', '', '', '', '', '', 'SUP0000040', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 66, 100, 110, 100, 3, 100, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1415, '2017-10-04 08:24:07', '2017-11-03 08:31:51', 100, 'ALL-Ancovas-450ml', 'ALL-Ancovas-450ml', 'OSP', 'Ancovas-450ml', '', '', '', '', '', '', '', '', 'SUP0000040', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 120, 180, 200, 180, 5, 180, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1417, '2017-10-04 08:26:28', '2017-11-03 08:32:07', 100, 'ALL-Anjyne-450ml', 'ALL-Anjyne-450ml', 'OSP', 'Anjyne-450ml', '', '', '', '', '', '', '', '', 'SUP0000040', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 117, 175, 195, 175, 5, 175, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1421, '2017-10-04 08:32:18', '2017-11-03 08:32:17', 100, 'ALL-Anmegha-450ml', 'ALL-Anmegha-450ml', 'OSP', 'Anmegha-450ml', '', '', '', '', '', '', '', '', 'SUP0000040', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 102, 155, 170, 155, 5, 155, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1418, '2017-10-04 08:27:36', '2017-11-03 08:32:29', 100, 'ALL-Dinex-450ml', 'ALL-Dinex-450ml', 'OSP', 'Dinex-450ml', '', '', '', '', '', '', '', '', 'SUP0000040', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 102, 155, 170, 155, 5, 155, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1422, '2017-10-04 08:34:26', '2017-11-03 08:32:39', 100, 'ALL-Gasto-N-Plus-450', 'ALL-Gasto-N-Plus-450', 'OSP', 'Gasto-N Plus-450ml', '', '', '', '', '', '', '', '', 'SUP0000040', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 120, 180, 200, 180, 5, 180, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1419, '2017-10-04 08:28:34', '2017-11-03 08:32:50', 100, 'ALL-Lecola-450ml', 'ALL-Lecola-450ml', 'OSP', 'Lecola-450ml', '', '', '', '', '', '', '', '', 'SUP0000040', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 102, 155, 170, 155, 5, 155, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1437, '2017-10-06 09:23:43', '2017-11-03 08:33:01', 100, 'ALL-SAAG-13', 'ALL-SAAG-13', 'OSP', '1.Stimulex-(450mlX4)  2.Ancovas-(450mlX3)  2.An Bioplex-(450mlX3)  3.Gasto-N Plus-(450mlX3)', '', '', '', '', '', '', '', '', 'SUP0000040', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1764, 2770, 2940, 2770, 100, 2770, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1420, '2017-10-04 08:29:55', '2017-11-03 08:33:11', 100, 'ALL-Stimulex-450ml', 'ALL-Stimulex-450ml', 'OSP', 'Stimulex-450ml', '', '', '', '', '', '', '', '', 'SUP0000040', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 171, 275, 285, 275, 10, 275, 0, '1', '', '', 'amarbazarltd@gmail.com', 'sahinodesk@gmail.com', 'Live'),
(1302, '2017-08-29 12:30:05', '2017-09-27 07:40:40', 100, 'ARE-DC-B04', 'ARE-DC-B04', 'OSP', 'AR-Diabetic B-04', '', '', '', '', '', '', '', '', 'SUP0000035', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1900, 2975, 3400, 2975, 100, 2975, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1305, '2017-08-29 12:35:32', NULL, 100, 'ARE-GP-B07', 'ARE-GP-B07', 'OSP', 'AR-Green Paste-100gm', '', '', '', '', '', '', '', '', 'SUP0000035', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 195, 305, 325, 305, 10, 305, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1299, '2017-08-29 12:25:33', NULL, 100, 'ARE-GSC-A02', 'ARE-GSC-A02', 'OSP', 'AR-Garlic Oil Soft Capsule', '', '', '', '', '', '', '', '', 'SUP0000035', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1500, 2500, 2975, 2500, 100, 2500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1300, '2017-08-29 12:27:29', NULL, 100, 'ARE-MPC-C17', 'ARE-MPC-C17', 'OSP', 'AR-Mashroom Powder Capsule', '', '', '', '', '', '', '', '', 'SUP0000035', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1200, 1950, 2210, 1950, 75, 1950, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1303, '2017-08-29 12:31:05', NULL, 100, 'ARE-PC-C06', 'ARE-PC-C06', 'OSP', 'AR-Peijing C-06', '', '', '', '', '', '', '', '', 'SUP0000035', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2000, 3100, 3600, 3100, 100, 3100, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1304, '2017-08-29 12:34:35', NULL, 100, 'ARE-SC-B17', 'ARE-SC-B17', 'OSP', 'AR-Stomach B-17', '', '', '', '', '', '', '', '', 'SUP0000035', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1400, 2400, 2720, 2400, 100, 2400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1301, '2017-08-29 12:28:45', NULL, 100, 'ARE-SP-C20', 'ARE-SP-C20', 'OSP', 'AR-Spriluna', '', '', '', '', '', '', '', '', 'SUP0000035', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1200, 1950, 2210, 1950, 75, 1950, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1306, '2017-08-29 12:36:35', NULL, 100, 'ARE-SS-E03', 'ARE-SS-E03', 'OSP', 'AR-Sulfer Soap', '', '', '', '', '', '', '', '', 'SUP0000035', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 255, 375, 425, 375, 10, 375, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(46, '2017-06-15 10:22:26', '2017-07-04 04:46:17', 100, 'ATH-MDP-01', 'ATH-MDP-01', 'OSP', 'Mens Denin Pant-01pcs', '', '', '', '', '', '', '', '', 'SUP0000010', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 380, 700, 750, 700, 25, 700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(47, '2017-06-15 10:24:40', '2017-07-04 04:46:35', 100, 'ATH-MSS-01', 'ATH-MSS-01', 'OSP', 'Mens Slim Fit Shirt -01pcs', '', '', '', '', '', '', '', '', 'SUP0000010', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 350, 650, 700, 0, 25, 650, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(34, '2017-06-09 12:23:09', '2017-07-04 04:47:06', 100, 'ATH-PA-01', 'ATH-PA-01', 'OSP', 'Gents Panjabi with Embroidery- 01pcs', '', '', '', '', '', '', '', '', 'SUP0000010', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 700, 1400, 1400, 0, 50, 1300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(33, '2017-06-09 10:53:08', '2017-07-25 04:17:14', 100, 'ATH-PJ-01', 'ATH-PJ-01', 'OSP', 'Gents Panjabi- 01pcs', '', '', '', '', '', '', '', '', 'SUP0000010', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 580, 1200, 1200, 0, 50, 1100, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(45, '2017-06-15 10:19:42', '2017-07-04 04:47:36', 100, 'ATH-PJP-02', 'ATH-PJP-02', 'OSP', 'Panjabi- 01pcs, Pajama- 01pcs', '', '', '', '', '', '', '', '', 'SUP0000010', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 810, 1400, 1500, 0, 50, 1400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(44, '2017-06-15 10:17:35', '2017-07-05 08:38:54', 100, 'ATH-PPS-03', 'ATH-PPS-03', 'OSP', 'Panjabi-01pcs, Pajama- 01pcs, Casual Shirt- 01pcs', '', '', '', '', '', '', '', '', 'SUP0000010', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1160, 2300, 2450, 0, 100, 2300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(49, '2017-06-18 05:23:59', '2017-07-03 06:22:14', 100, 'ATI-ESP-05', 'ATI-ESP-05', 'OSP', 'Laccha Semai- 200gm X 10, Vermichelli Semai- 200gm X10, Sunkist Powder Drinks-1000gm, Cocala, Egg Noodles- 150gm X10, Mia Tea- 250gm X1', '', '', '', '', '', '', '', '', 'SUP0000013', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 903, 903, 1270, 0, 25, 1220, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(1458, '2017-10-21 09:16:35', NULL, 100, 'BE-ARC-01', 'BE-ARC-01', 'OSP', ' Anti Radiation Chip-01pcs', '', 'Electronics', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 70, 350, 400, 350, 25, 350, 0, '1', '', '', 'ABL-777-0007@abl.com', NULL, 'Live'),
(1460, '2017-10-21 09:19:14', NULL, 100, 'BE-ARC-04', 'BE-ARC-04', 'OSP', ' Anti Radiation Chip-04pcs', '', 'Electronics', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 280, 1340, 1500, 1340, 100, 1340, 0, '1', '', '', 'ABL-777-0007@abl.com', NULL, 'Live'),
(234, '2017-08-24 12:30:20', '2017-09-17 10:39:40', 100, 'BEL-AVR-VGD-1052', 'BEL-AVR-VGD-1052', 'Corporate', 'V-Guard Voltage Stabilizer VXD 50', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2260, 2500, 2500, 2500, 25, 2500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(238, '2017-08-24 12:31:26', '2017-09-17 10:39:22', 100, 'BEL-AVR-VGD-2004', 'BEL-AVR-VGD-2004', 'Corporate', 'V-Guard Voltage Stabilizer VGSJW 100', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3345, 3700, 3700, 3700, 30, 3700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(240, '2017-08-24 12:32:24', '2017-09-17 10:38:41', 100, 'BEL-AVR-VGD-3001', 'BEL-AVR-VGD-3001', 'Corporate', 'V-Guard Mini Crystal Voltage Stabilizer', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1808, 2000, 2000, 2000, 20, 2000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(241, '2017-08-24 12:33:19', '2017-09-17 10:38:19', 100, 'BEL-AVR-VGD-3002', 'BEL-AVR-VGD-3002', 'Corporate', 'V-Guard Crystal Plus Voltage Stabilizer', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2892, 3200, 3200, 3200, 30, 3200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(255, '2017-08-24 12:45:56', '2017-09-17 10:39:04', 100, 'BEL-AVR-VGD-4003', 'BEL-AVR-VGD-4003', 'Corporate', 'V-Guard Voltage Stabilizer VEW 400 PLUS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10395, 11500, 11500, 11500, 100, 11500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(256, '2017-08-24 12:46:59', NULL, 100, 'BEL-AVR-VGD-4004', 'BEL-AVR-VGD-4004', 'Corporate', 'VEW-500 PLUS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 11750, 13000, 13000, 13000, 125, 13000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1085, '2017-08-25 11:48:37', '2017-09-19 04:37:48', 100, 'BEL-BLN-CON-1002', 'BEL-BLN-CON-1002', 'Corporate', 'Conion Blender BE 905', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1472, 1700, 1700, 1700, 25, 1700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1092, '2017-08-25 11:51:13', '2017-09-19 04:38:11', 100, 'BEL-BLN-CON-1003', 'BEL-BLN-CON-1003', 'Corporate', 'Conion Blender BE 909', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1255, 1450, 1450, 1450, 20, 1450, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1100, '2017-08-25 11:53:52', '2017-09-19 04:37:13', 100, 'BEL-BLN-CON-2001', 'BEL-BLN-CON-2001', 'Corporate', 'Conion Blender BE 8324G', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1904, 2200, 2200, 2200, 25, 2200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1106, '2017-08-25 11:55:05', '2017-09-19 04:35:57', 100, 'BEL-BLN-CON-2002', 'BEL-BLN-CON-2002', 'Corporate', 'Conion Blender BE 8313', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1731, 2000, 2000, 2000, 25, 2000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1112, '2017-08-25 11:56:43', '2017-09-19 04:35:27', 100, 'BEL-BLN-CON-2003', 'BEL-BLN-CON-2003', 'Corporate', 'Conion Blender BE 8302', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1384, 1600, 1600, 1600, 20, 1600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1131, '2017-08-25 12:03:08', '2017-09-19 10:17:37', 100, 'BEL-BLN-PAN-1001', 'BEL-BLN-PAN-1001', 'Corporate', 'Panasonic Juicer Blender MJ M176P', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 7230, 8000, 8000, 8000, 75, 8000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1134, '2017-08-25 12:04:01', '2017-09-19 09:03:19', 100, 'BEL-BLN-PAN-1002', 'BEL-BLN-PAN-1002', 'Corporate', 'Panasonic Blender MX 151SG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3615, 4000, 4000, 4000, 25, 4000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1138, '2017-08-25 12:05:01', '2017-09-19 09:04:51', 100, 'BEL-BLN-PAN-1003', 'BEL-BLN-PAN-1003', 'Corporate', 'Panasonic Blender MX GM1011', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2712, 3000, 3000, 3000, 25, 3000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1146, '2017-08-25 12:07:40', '2017-09-19 09:03:50', 100, 'BEL-BLN-PAN-1004', 'BEL-BLN-PAN-1004', 'Corporate', 'Panasonic Blender MX 900M', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3705, 4100, 4100, 4100, 25, 4100, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1149, '2017-08-25 12:08:56', '2017-09-19 10:16:37', 100, 'BEL-BLN-PAN-1005', 'BEL-BLN-PAN-1005', 'Corporate', 'Panasonic Blender MX GX1511', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3525, 3900, 3900, 3900, 25, 3900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1154, '2017-08-25 12:10:33', '2017-09-19 10:16:56', 100, 'BEL-BLN-PAN-1006', 'BEL-BLN-PAN-1006', 'Corporate', 'Panasonic Blender MX SM1031', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3615, 4000, 4000, 4000, 25, 4000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1159, '2017-08-25 12:12:08', '2017-09-19 07:50:52', 100, 'BEL-BLN-PHL-1001', 'BEL-BLN-PHL-1001', 'Corporate', 'Philips Juicer & Blender HR 1847', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6635, 7500, 7500, 7500, 75, 7500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(239, '2017-08-24 12:31:41', '2017-09-19 07:53:04', 100, 'BEL-BLN-PHL-1011', 'BEL-BLN-PHL-1011', 'Corporate', 'Philips Mixer Grinder HL 1606 (3 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3530, 3990, 3990, 3990, 25, 3990, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1161, '2017-08-25 12:13:15', '2017-09-19 07:35:18', 100, 'BEL-BLN-PHL-1015', 'BEL-BLN-PHL-1015', 'Corporate', 'Philips Blender HR 2001', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3007, 3400, 3400, 3400, 25, 3400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1164, '2017-08-25 12:16:20', '2017-09-19 07:36:25', 100, 'BEL-BLN-PHL-1016', 'BEL-BLN-PHL-1016', 'Corporate', 'Philips Blender HR 2011', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3273, 3700, 3700, 3700, 25, 3700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1167, '2017-08-25 12:17:56', '2017-09-19 07:51:09', 100, 'BEL-BLN-PHL-1017', 'BEL-BLN-PHL-1017', 'Corporate', 'Philips Juicer HR 1851', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6457, 7300, 7300, 7300, 75, 7300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1169, '2017-08-25 12:18:53', '2017-09-19 07:36:35', 100, 'BEL-BLN-PHL-1021', 'BEL-BLN-PHL-1021', 'Corporate', 'Philips Blender HR 2100', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2300, 2600, 2600, 2600, 25, 2600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1173, '2017-08-25 12:19:48', '2017-09-19 07:37:13', 100, 'BEL-BLN-PHL-1022', 'BEL-BLN-PHL-1022', 'Corporate', 'Philips Blender HR 2118', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 4865, 5500, 5500, 5500, 50, 5500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1176, '2017-08-25 12:20:56', '2017-09-19 07:37:24', 100, 'BEL-BLN-PHL-1023', 'BEL-BLN-PHL-1023', 'Corporate', 'Philips Blender HR 2116', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3789, 4284, 4284, 4284, 50, 4284, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1180, '2017-08-25 12:21:55', '2017-09-19 07:38:06', 100, 'BEL-BLN-PHL-1031', 'BEL-BLN-PHL-1031', 'Corporate', 'Philips Blender HR2114 03', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 4069, 4600, 4600, 4600, 50, 4600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1185, '2017-08-25 12:22:47', '2017-09-19 07:37:43', 100, 'BEL-BLN-PHL-1032', 'BEL-BLN-PHL-1032', 'Corporate', 'Philips Blender HR2102 03', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3007, 3400, 3400, 3400, 25, 3400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1223, '2017-08-26 05:19:40', '2017-09-19 07:42:39', 100, 'BEL-BLN-PHL-1040', 'BEL-BLN-PHL-1040', 'Corporate', 'Philips Hand Mixers HR1560 40', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3981, 4500, 4500, 4500, 50, 4500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(243, '2017-08-24 12:33:38', '2017-09-19 07:45:02', 100, 'BEL-BLN-PHL-1041', 'BEL-BLN-PHL-1041', 'Corporate', 'Philips Hand Blender HR1600 00', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3096, 0, 3500, 3500, 25, 3500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(245, '2017-08-24 12:35:33', '2017-09-19 07:41:40', 100, 'BEL-BLN-PHL-1050', 'BEL-BLN-PHL-1050', 'Corporate', 'Philips Food Processor HR7628 00', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 5573, 6300, 6300, 6300, 50, 6300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(246, '2017-08-24 12:36:53', '2017-09-19 07:31:06', 100, 'BEL-BLN-PHL-1051', 'BEL-BLN-PHL-1051', 'Corporate', 'Philips Avance Collection Food Processor HR7776 90', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10615, 12000, 12000, 12000, 100, 12000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(248, '2017-08-24 12:37:57', '2017-09-19 07:29:56', 100, 'BEL-BLN-PHL-1052', 'BEL-BLN-PHL-1052', 'Corporate', 'Philips Avance Collection Food Processor HR7778 01', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 19373, 21900, 21900, 21900, 250, 21900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1188, '2017-08-25 12:23:31', '2017-09-19 04:38:38', 100, 'BEL-BLN-SRP-1005', 'BEL-BLN-SRP-1005', 'Corporate', 'Sharp Blender EM 125L W', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2789, 2990, 2990, 2990, 15, 2990, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(249, '2017-08-24 12:39:10', '2017-09-19 07:38:22', 100, 'BEL-CHP-PHL-1001', 'BEL-CHP-PHL-1001', 'Corporate', 'Philips Chopper HR 1396', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3715, 4200, 4200, 4200, 50, 4200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1011, '2017-08-25 11:09:11', NULL, 100, 'BEL-CSR-CON-1020', 'BEL-CSR-CON-1020', 'Corporate', 'Casserole-20 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 904, 1000, 1000, 1000, 10, 1000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1014, '2017-08-25 11:10:14', NULL, 100, 'BEL-CSR-CON-1022', 'BEL-CSR-CON-1022', 'Corporate', 'Casserole-22cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 949, 1050, 1050, 1050, 10, 1050, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1016, '2017-08-25 11:10:56', NULL, 100, 'BEL-CSR-CON-1024', 'BEL-CSR-CON-1024', 'Corporate', 'Casserole-24cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1130, 1250, 1250, 1250, 10, 1250, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1021, '2017-08-25 11:15:38', NULL, 100, 'BEL-CSR-CON-1026', 'BEL-CSR-CON-1026', 'Corporate', 'Casserole-26cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1220, 1350, 1350, 1350, 10, 1350, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1022, '2017-08-25 11:16:08', NULL, 100, 'BEL-CSR-CON-1028', 'BEL-CSR-CON-1028', 'Corporate', 'Casserole-28cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1446, 1600, 1600, 1600, 10, 1600, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1024, '2017-08-25 11:16:36', NULL, 100, 'BEL-CSR-CON-1030', 'BEL-CSR-CON-1030', 'Corporate', 'Casserole-30cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1537, 1700, 1700, 1700, 10, 1700, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1026, '2017-08-25 11:17:07', NULL, 100, 'BEL-CSR-CON-1032', 'BEL-CSR-CON-1032', 'Corporate', 'Casserole-32 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2124, 2350, 2350, 2350, 15, 2350, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1027, '2017-08-25 11:17:43', NULL, 100, 'BEL-CSR-CON-1034', 'BEL-CSR-CON-1034', 'Corporate', 'Casserole-34cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2305, 2550, 2550, 2550, 20, 2550, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1029, '2017-08-25 11:18:15', NULL, 100, 'BEL-CSR-CON-1036', 'BEL-CSR-CON-1036', 'Corporate', 'Casserole-36cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2621, 2900, 2900, 2900, 20, 2900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(593, '2017-08-25 06:43:00', NULL, 100, 'BEL-CTV-CON-1501', 'BEL-CTV-CON-1501', 'Corporate', 'LCD B2LCD2-1GC (15\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6237, 6900, 6900, 6900, 50, 6900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(598, '2017-08-25 06:44:00', NULL, 100, 'BEL-CTV-CON-1701', 'BEL-CTV-CON-1701', 'Corporate', 'LCD B3LCD3-1GC (17\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8045, 8900, 8900, 8900, 75, 8900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(601, '2017-08-25 06:44:54', NULL, 100, 'BEL-CTV-CON-1901', 'BEL-CTV-CON-1901', 'Corporate', 'LED B4LED4-1GMW (19\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10754, 11898, 11898, 11898, 100, 11898, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(610, '2017-08-25 06:47:58', NULL, 100, 'BEL-CTV-CON-1902', 'BEL-CTV-CON-1902', 'Corporate', 'LED A-19M3L (19\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10395, 11500, 11500, 11500, 100, 11500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(614, '2017-08-25 06:48:52', NULL, 100, 'BEL-CTV-CON-2201', 'BEL-CTV-CON-2201', 'Corporate', 'LED B1LED1-GMW (22\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 12558, 13894, 13894, 13894, 100, 13894, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(618, '2017-08-25 06:49:50', NULL, 100, 'BEL-CTV-CON-2401', 'BEL-CTV-CON-2401', 'Corporate', 'LED B2LED2-GMW (24\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 15266, 16890, 16890, 16890, 150, 16890, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(623, '2017-08-25 06:51:28', '2017-09-17 09:02:34', 100, 'BEL-CTV-CON-2402', 'BEL-CTV-CON-2402', 'Corporate', 'Conion A24M3F 24â€ Legend Series LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 12635, 13980, 13980, 13980, 100, 13980, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(749, '2017-08-25 08:27:29', '2017-09-17 09:04:17', 100, 'BEL-CTV-CON-3201', 'BEL-CTV-CON-3201', 'Corporate', 'Conion JP E32E0A30 32â€ Legend Series LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23048, 25500, 25500, 25500, 250, 25500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(753, '2017-08-25 08:28:57', '2017-09-17 09:03:22', 100, 'BEL-CTV-CON-3202', 'BEL-CTV-CON-3202', 'Corporate', 'Conion EH704U 32â€ Legend Series LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 17987, 19900, 19900, 19900, 200, 19900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(755, '2017-08-25 08:29:51', '2017-09-17 09:03:02', 100, 'BEL-CTV-CON-3203', 'BEL-CTV-CON-3203', 'Corporate', 'Conion A32ES3B 32â€ Legend Series LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 18890, 20900, 20900, 20900, 200, 20900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(758, '2017-08-25 08:31:33', '2017-09-17 09:03:52', 100, 'BEL-CTV-CON-3204', 'BEL-CTV-CON-3204', 'Corporate', 'Conion JP E32DF2100 32â€ Legend Series LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21581, 23876, 23876, 23876, 200, 23876, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(761, '2017-08-25 08:32:35', NULL, 100, 'BEL-CTV-CON-3205', 'BEL-CTV-CON-3205', 'Corporate', 'LED A-32ES3B (Smart)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24313, 26900, 26900, 26900, 250, 26900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(764, '2017-08-25 08:33:57', '2017-09-17 09:00:40', 100, 'BEL-CTV-CON-3210', 'BEL-CTV-CON-3210', 'Corporate', 'Conion 32EH804U 32â€ Smart Android LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23410, 25900, 25900, 25900, 250, 25900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(769, '2017-08-25 08:37:19', NULL, 100, 'BEL-CTV-CON-3901', 'BEL-CTV-CON-3901', 'Corporate', 'LED E39E9200', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 43305, 47912, 47912, 47912, 500, 47912, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(807, '2017-08-25 09:09:56', '2017-09-17 09:01:05', 100, 'BEL-CTV-CON-3902', 'BEL-CTV-CON-3902', 'Corporate', 'Conion 39ES3B 39â€ Smart Android LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 27929, 30900, 30900, 30900, 300, 30900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(808, '2017-08-25 09:11:05', NULL, 100, 'BEL-CTV-CON-4001', 'BEL-CTV-CON-4001', 'Corporate', 'LED E40E8700', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 49624, 54904, 54904, 54904, 500, 54904, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(810, '2017-08-25 09:11:59', NULL, 100, 'BEL-CTV-CON-4201', 'BEL-CTV-CON-4201', 'Corporate', 'LED E42E9300', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 56856, 62904, 62904, 62904, 600, 62904, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(812, '2017-08-25 09:12:47', '2017-09-17 09:01:44', 100, 'BEL-CTV-CON-4301', 'BEL-CTV-CON-4301', 'Corporate', 'Conion 43EH36FU 43â€³ Smart Android LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36967, 40900, 40900, 40900, 400, 40900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(814, '2017-08-25 09:13:54', '2017-09-17 09:02:05', 100, 'BEL-CTV-CON-4801', 'BEL-CTV-CON-4801', 'Corporate', 'Conion 48EH704U 48â€³ Smart Android Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45102, 49900, 49900, 49900, 500, 49900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(816, '2017-08-25 09:14:52', '2017-09-17 10:19:21', 100, 'BEL-CTV-LGE-1901', 'BEL-CTV-LGE-1901', 'Corporate', 'LG 19MN43D 19â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 14615, 15200, 15200, 15200, 50, 15200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(819, '2017-08-25 09:16:01', NULL, 100, 'BEL-CTV-LGE-2020', 'BEL-CTV-LGE-2020', 'Corporate', 'LED 20MT45', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 14327, 14900, 14900, 14900, 50, 14900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(824, '2017-08-25 09:18:13', '2017-09-17 10:19:39', 100, 'BEL-CTV-LGE-2405', 'BEL-CTV-LGE-2405', 'Corporate', 'LG 24MN42A 24â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21058, 21900, 21900, 21900, 50, 21900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(830, '2017-08-25 09:22:43', NULL, 100, 'BEL-CTV-LGE-2805', 'BEL-CTV-LGE-2805', 'Corporate', 'LED 28LN4110', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25188, 26196, 26196, 26196, 100, 26196, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(832, '2017-08-25 09:23:38', '2017-09-17 10:21:25', 100, 'BEL-CTV-LGE-3201', 'BEL-CTV-LGE-3201', 'Corporate', 'LG 32LS3110 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28750, 29900, 29900, 29900, 100, 29900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(833, '2017-08-25 09:24:27', NULL, 100, 'BEL-CTV-LGE-3202', 'BEL-CTV-LGE-3202', 'Corporate', 'LED 32LS3400', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 27885, 29000, 29000, 29000, 100, 29000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(835, '2017-08-25 09:25:28', '2017-09-17 08:36:27', 100, 'BEL-CTV-LGE-3203', 'BEL-CTV-LGE-3203', 'Corporate', 'LG LM3400 32â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 47115, 49000, 49000, 49000, 200, 49000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(837, '2017-08-25 09:26:24', NULL, 100, 'BEL-CTV-LGE-3204', 'BEL-CTV-LGE-3204', 'Corporate', '3D 32LA6200', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 51635, 53700, 53700, 53700, 200, 53700, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(840, '2017-08-25 09:28:19', '2017-09-17 10:20:56', 100, 'BEL-CTV-LGE-3205', 'BEL-CTV-LGE-3205', 'Corporate', 'LG 32LN5120 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29808, 31000, 31000, 31000, 100, 31000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(842, '2017-08-25 09:29:16', '2017-09-17 10:20:41', 100, 'BEL-CTV-LGE-3206', 'BEL-CTV-LGE-3206', 'Corporate', 'LG 32LH500D 32â€³ Full HD Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26923, 28000, 28000, 28000, 100, 28000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(845, '2017-08-25 09:30:35', '2017-09-17 08:35:01', 100, 'BEL-CTV-LGE-3207', 'BEL-CTV-LGE-3207', 'Corporate', 'LG LB620D 32â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33558, 34900, 34900, 34900, 100, 34900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(846, '2017-08-25 09:31:35', '2017-09-17 10:21:10', 100, 'BEL-CTV-LGE-3208', 'BEL-CTV-LGE-3208', 'Corporate', 'LG 32LN571B 32â€³ LED Smart Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31635, 32900, 32900, 32900, 100, 32900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(847, '2017-08-25 09:32:43', '2017-09-17 10:20:12', 100, 'BEL-CTV-LGE-3209', 'BEL-CTV-LGE-3209', 'Corporate', 'LG 32LB550A 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 30673, 31900, 31900, 31900, 100, 31900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(850, '2017-08-25 09:34:48', NULL, 100, 'BEL-CTV-LGE-3221', 'BEL-CTV-LGE-3221', 'Corporate', 'LCD 32CS460', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28829, 29982, 29982, 29982, 100, 29982, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(859, '2017-08-25 09:42:31', NULL, 100, 'BEL-CTV-LGE-3231', 'BEL-CTV-LGE-3231', 'Corporate', 'LED 32 LF510D', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28750, 29900, 29900, 29900, 100, 29900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(864, '2017-08-25 09:46:08', '2017-09-17 10:21:45', 100, 'BEL-CTV-LGE-4220', 'BEL-CTV-LGE-4220', 'Corporate', 'LG 42LB551T 42â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 61538, 64000, 64000, 64000, 250, 64000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(866, '2017-08-25 09:47:30', NULL, 100, 'BEL-CTV-LGE-4221', 'BEL-CTV-LGE-4221', 'Corporate', 'LED 42LS3110', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 50000, 52000, 52000, 52000, 200, 52000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(867, '2017-08-25 09:51:49', NULL, 100, 'BEL-CTV-LGE-4222', 'BEL-CTV-LGE-4222', 'Corporate', 'LED 42LN5120', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 54808, 57000, 57000, 57000, 200, 57000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(868, '2017-08-25 09:52:42', '2017-09-17 08:35:45', 100, 'BEL-CTV-LGE-4225', 'BEL-CTV-LGE-4225', 'Corporate', 'LG LB620T 42â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 70096, 72900, 72900, 72900, 250, 72900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(869, '2017-08-25 09:55:41', NULL, 100, 'BEL-CTV-LGE-4226', 'BEL-CTV-LGE-4226', 'Corporate', 'Smart 43 LH570T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 62404, 64900, 64900, 64900, 250, 64900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live');
INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xvatpct`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(873, '2017-08-25 10:00:19', '2017-09-17 08:37:03', 100, 'BEL-CTV-LGE-4227', 'BEL-CTV-LGE-4227', 'Corporate', 'LG LM6200 42â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 100385, 104400, 104400, 104400, 400, 104400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(876, '2017-08-25 10:01:17', '2017-09-17 10:22:28', 100, 'BEL-CTV-LGE-4303', 'BEL-CTV-LGE-4303', 'Corporate', 'LG 43LF630T 43â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 67212, 69900, 69900, 69900, 250, 69900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(896, '2017-08-25 10:17:47', NULL, 100, 'BEL-CTV-LGE-4305', 'BEL-CTV-LGE-4305', 'Corporate', 'Smart LED 43LF/LH590T/ 540T', '', '', '', '', '', '', '', '', '', 'PCS', '', '', 1, 'No', 'None', 'Stocking', 0, 52788, 54900, 54900, 54900, 200, 54900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(900, '2017-08-25 10:24:19', '2017-09-17 10:22:16', 100, 'BEL-CTV-LGE-4307', 'BEL-CTV-LGE-4307', 'Corporate', 'LG 43LH511T 43â€³ Full HD Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 47981, 49900, 49900, 49900, 200, 49900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(902, '2017-08-25 10:25:16', NULL, 100, 'BEL-CTV-LGE-4701', 'BEL-CTV-LGE-4701', 'Corporate', '3D 47LA6910', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 144754, 150544, 150544, 150544, 500, 150544, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(907, '2017-08-25 10:27:06', NULL, 100, 'BEL-CTV-LGE-5501', 'BEL-CTV-LGE-5501', 'Corporate', 'LED 55LM9610', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 230769, 240000, 240000, 240000, 1000, 240000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(909, '2017-08-25 10:28:08', '2017-08-25 09:32:03', 100, 'BEL-CTV-LGE-5502', 'BEL-CTV-LGE-5502', 'Corporate', 'LED 55LM6710', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 231769, 241040, 241040, 241040, 1000, 241040, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(916, '2017-08-25 10:33:33', '2017-09-17 07:55:22', 100, 'BEL-CTV-LGE-5503', 'BEL-CTV-LGE-5503', 'Corporate', 'LG LA7400 55â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 206731, 215000, 215000, 215000, 700, 215000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(924, '2017-08-25 10:37:06', '2017-09-17 09:05:23', 100, 'BEL-CTV-PAN-2405', 'BEL-CTV-PAN-2405', 'Corporate', 'Panasonic L 24XM65 24â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 16346, 17000, 17000, 17000, 50, 17000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(930, '2017-08-25 10:40:51', NULL, 100, 'BEL-CTV-PAN-3201', 'BEL-CTV-PAN-3201', 'Corporate', 'LCD THL32C5X', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 19231, 20000, 20000, 20000, 50, 20000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(933, '2017-08-25 10:41:57', '2017-09-17 09:06:39', 100, 'BEL-CTV-PAN-3205', 'BEL-CTV-PAN-3205', 'Corporate', 'Panasonic TH AS610 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24038, 25000, 25000, 25000, 100, 25000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(939, '2017-08-25 10:43:37', '2017-09-17 09:06:11', 100, 'BEL-CTV-PAN-3211', 'BEL-CTV-PAN-3211', 'Corporate', 'Panasonic L 32B6X 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24038, 25000, 25000, 25000, 100, 25000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(944, '2017-08-25 10:45:03', NULL, 100, 'BEL-CTV-PAN-4220', 'BEL-CTV-PAN-4220', 'Corporate', 'LCD 42U5M', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 54423, 56600, 56600, 56600, 200, 56600, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(948, '2017-08-25 10:46:28', '2017-09-17 10:15:50', 100, 'BEL-CTV-SAM-2201', 'BEL-CTV-SAM-2201', 'Corporate', 'Samsung S22B300b 22â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 20519, 22000, 22000, 22000, 100, 22000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(951, '2017-08-25 10:48:13', NULL, 100, 'BEL-CTV-SAM-2202', 'BEL-CTV-SAM-2202', 'Corporate', 'LED 22ED5000', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24881, 26676, 26676, 26676, 150, 26676, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(966, '2017-08-25 10:55:03', '2017-09-17 09:26:28', 100, 'BEL-CTV-SAM-2301', 'BEL-CTV-SAM-2301', 'Corporate', 'Samsung 23F4003 23â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21441, 22988, 22988, 22988, 100, 22988, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(972, '2017-08-25 10:56:50', '2017-09-17 10:16:39', 100, 'BEL-CTV-SAM-2401', 'BEL-CTV-SAM-2401', 'Corporate', 'Samsung UA24H4003 24â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 18561, 19900, 19900, 19900, 100, 19900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(979, '2017-08-25 10:58:40', '2017-09-17 09:27:10', 100, 'BEL-CTV-SAM-2601', 'BEL-CTV-SAM-2601', 'Corporate', 'Samsung 26EH4000 26â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24235, 25984, 25984, 25984, 150, 25984, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(991, '2017-08-25 11:01:58', '2017-09-17 09:30:49', 100, 'BEL-CTV-SAM-3201', 'BEL-CTV-SAM-3201', 'Corporate', 'Samsung 32FH4003 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26489, 28400, 28400, 28400, 175, 28400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(897, '2017-08-25 10:19:01', '2017-09-17 09:27:54', 100, 'BEL-CTV-SAM-3202', 'BEL-CTV-SAM-3202', 'Corporate', 'Samsung 32EH4500 32â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 40572, 43500, 43500, 43500, 250, 43500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(898, '2017-08-25 10:20:07', '2017-09-17 08:38:28', 100, 'BEL-CTV-SAM-3203', 'BEL-CTV-SAM-3203', 'Corporate', 'Samsung EH6030 32â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 51858, 55600, 55600, 55600, 300, 55600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(899, '2017-08-25 10:22:30', '2017-09-17 09:30:07', 100, 'BEL-CTV-SAM-3204', 'BEL-CTV-SAM-3204', 'Corporate', 'Samsung 32F5300 32â€ LED Smart Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 37308, 40000, 40000, 40000, 250, 40000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(901, '2017-08-25 10:24:41', '2017-09-17 09:28:58', 100, 'BEL-CTV-SAM-3205', 'BEL-CTV-SAM-3205', 'Corporate', 'Samsung 32F4500 32â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 41971, 45000, 45000, 45000, 250, 45000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(903, '2017-08-25 10:25:18', '2017-09-17 10:16:17', 100, 'BEL-CTV-SAM-3206', 'BEL-CTV-SAM-3206', 'Corporate', 'Samsung UA 32J4003 32â€³ HD Flat Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 27421, 29400, 29400, 29400, 200, 29400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(904, '2017-08-25 10:25:53', '2017-09-17 09:35:24', 100, 'BEL-CTV-SAM-4001', 'BEL-CTV-SAM-4001', 'Corporate', 'Samsung 40H5003 40â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 47474, 50900, 50900, 50900, 300, 50900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(905, '2017-08-25 10:26:30', '2017-09-17 10:17:02', 100, 'BEL-CTV-SAM-4002', 'BEL-CTV-SAM-4002', 'Corporate', 'Samsung UA40EH5300R 40â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 49433, 53000, 53000, 53000, 300, 53000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(906, '2017-08-25 10:27:03', '2017-09-17 09:32:37', 100, 'BEL-CTV-SAM-4003', 'BEL-CTV-SAM-4003', 'Corporate', 'Samsung 40EH5203 40â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 55029, 59000, 59000, 59000, 400, 59000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(908, '2017-08-25 10:27:37', '2017-09-17 10:17:22', 100, 'BEL-CTV-SAM-4004', 'BEL-CTV-SAM-4004', 'Corporate', 'Samsung UA40F5000 40â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 51298, 55000, 55000, 55000, 300, 55000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(910, '2017-08-25 10:28:12', NULL, 100, 'BEL-CTV-SAM-4005', 'BEL-CTV-SAM-4005', 'Corporate', 'LED UA-40J5505AK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 63329, 67900, 67900, 67900, 500, 67900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(911, '2017-08-25 10:28:48', NULL, 100, 'BEL-CTV-SAM-4008', 'BEL-CTV-SAM-4008', 'Corporate', '3D 40EH6030', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79279, 85000, 85000, 85000, 500, 85000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(912, '2017-08-25 10:29:18', '2017-09-17 09:35:53', 100, 'BEL-CTV-SAM-4009', 'BEL-CTV-SAM-4009', 'Corporate', 'Samsung 40J50008 AK 40â€³ Full HD Flat Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45608, 48900, 48900, 48900, 300, 48900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(913, '2017-08-25 10:31:14', '2017-09-17 10:15:26', 100, 'BEL-CTV-SAM-4601', 'BEL-CTV-SAM-4601', 'Corporate', 'Samsung LED 46F550 46â€ Smart Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 87673, 94000, 94000, 94000, 700, 94000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(914, '2017-08-25 10:32:45', '2017-09-17 09:36:11', 100, 'BEL-CTV-SAM-4801', 'BEL-CTV-SAM-4801', 'Corporate', 'Samsung 48H6400 48â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 125914, 135000, 135000, 135000, 1000, 135000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(915, '2017-08-25 10:33:17', NULL, 100, 'BEL-CTV-SAM-4802', 'BEL-CTV-SAM-4802', 'Corporate', 'LED 48J5000 AK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 58760, 63000, 63000, 63000, 400, 63000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(917, '2017-08-25 10:33:47', NULL, 100, 'BEL-CTV-SAM-4850', 'BEL-CTV-SAM-4850', 'Corporate', 'LED 48J5200 (Smart)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 74522, 79900, 79900, 79900, 500, 79900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(918, '2017-08-25 10:34:20', '2017-09-17 09:35:34', 100, 'BEL-CTV-SAM-5501', 'BEL-CTV-SAM-5501', 'Corporate', 'Samsung 32J4304 32â€³ HD Smart Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 220768, 236700, 236700, 236700, 1500, 236700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(919, '2017-08-25 10:34:56', NULL, 100, 'BEL-CTV-SAM-5502', 'BEL-CTV-SAM-5502', 'Corporate', 'LED 55J5500', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 140836, 151000, 151000, 151000, 1000, 151000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(920, '2017-08-25 10:35:39', '2017-09-17 10:17:41', 100, 'BEL-CTV-SAM-6505', 'BEL-CTV-SAM-6505', 'Corporate', 'Samsung UA65HU8700 65â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 642625, 689000, 689000, 689000, 3500, 689000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(936, '2017-08-25 10:42:53', NULL, 100, 'BEL-CTV-SON-2201', 'BEL-CTV-SON-2201', 'Corporate', 'LCD 22BX350', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29027, 31122, 31122, 31122, 200, 31122, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(938, '2017-08-25 10:43:31', '2017-09-17 09:15:40', 100, 'BEL-CTV-SON-2401', 'BEL-CTV-SON-2401', 'Corporate', 'Sony EX430 24â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23224, 24900, 24900, 24900, 150, 24900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(941, '2017-08-25 10:44:13', NULL, 100, 'BEL-CTV-SON-3201', 'BEL-CTV-SON-3201', 'Corporate', 'LCD 32BX35A', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 40115, 43010, 43010, 43010, 250, 43010, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(943, '2017-08-25 10:44:59', '2017-09-17 09:17:19', 100, 'BEL-CTV-SON-3202', 'BEL-CTV-SON-3202', 'Corporate', 'Sony R300C 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26954, 28900, 28900, 28900, 200, 28900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(946, '2017-08-25 10:45:52', '2017-09-17 09:18:20', 100, 'BEL-CTV-SON-3203', 'BEL-CTV-SON-3203', 'Corporate', 'Sony W670 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31711, 34000, 34000, 34000, 200, 34000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(947, '2017-08-25 10:46:25', '2017-09-17 09:16:11', 100, 'BEL-CTV-SON-3204', 'BEL-CTV-SON-3204', 'Corporate', 'Sony KDL 32R500 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 35442, 38000, 38000, 38000, 200, 38000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(949, '2017-08-25 10:47:03', '2017-09-17 09:11:52', 100, 'BEL-CTV-SON-3221', 'BEL-CTV-SON-3221', 'Corporate', 'Sony 32R306 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26115, 28000, 28000, 28000, 150, 28000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(950, '2017-08-25 10:47:35', NULL, 100, 'BEL-CTV-SON-4001', 'BEL-CTV-SON-4001', 'Corporate', 'LED 40R552C/40BX450', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 49300, 52858, 52858, 52858, 300, 52858, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(952, '2017-08-25 10:48:32', NULL, 100, 'BEL-CTV-SON-4002', 'BEL-CTV-SON-4002', 'Corporate', 'LED 40EX520', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46607, 49970, 49970, 49970, 300, 49970, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(954, '2017-08-25 10:49:07', NULL, 100, 'BEL-CTV-SON-4003', 'BEL-CTV-SON-4003', 'Corporate', 'LED 40EX720', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 119599, 128230, 128230, 128230, 700, 128230, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(956, '2017-08-25 10:49:44', NULL, 100, 'BEL-CTV-SON-4004', 'BEL-CTV-SON-4004', 'Corporate', 'LED 40EX650', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 55928, 59964, 59964, 59964, 400, 59964, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(957, '2017-08-25 10:50:18', '2017-09-17 09:12:59', 100, 'BEL-CTV-SON-4005', 'BEL-CTV-SON-4005', 'Corporate', 'Sony 40R352 40â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38240, 41000, 41000, 41000, 250, 41000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(958, '2017-08-25 10:50:57', '2017-09-17 09:17:58', 100, 'BEL-CTV-SON-4006', 'BEL-CTV-SON-4006', 'Corporate', 'Sony R350C 40â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 37308, 40000, 40000, 40000, 250, 40000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(959, '2017-08-25 10:51:27', '2017-09-17 09:23:42', 100, 'BEL-CTV-SON-4007', 'BEL-CTV-SON-4007', 'Corporate', 'Sony W700C 40â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46635, 50000, 50000, 50000, 300, 50000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(960, '2017-08-25 10:52:07', '2017-09-17 09:13:23', 100, 'BEL-CTV-SON-4201', 'BEL-CTV-SON-4201', 'Corporate', 'Sony 42W674 42â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 81517, 87400, 87400, 87400, 500, 87400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(961, '2017-08-25 10:52:44', '2017-09-17 08:43:14', 100, 'BEL-CTV-SON-4202', 'BEL-CTV-SON-4202', 'Corporate', 'Sony R500A 42â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 81144, 87000, 87000, 87000, 500, 87000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(962, '2017-08-25 10:53:17', NULL, 100, 'BEL-CTV-SON-4301', 'BEL-CTV-SON-4301', 'Corporate', '3D 43W800C', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 67154, 72000, 72000, 72000, 500, 72000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(963, '2017-08-25 10:53:50', '2017-09-17 09:16:32', 100, 'BEL-CTV-SON-4302', 'BEL-CTV-SON-4302', 'Corporate', 'Sony KDL 43W750D LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 53164, 57000, 57000, 57000, 400, 57000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(964, '2017-08-25 10:54:24', '2017-09-17 09:13:52', 100, 'BEL-CTV-SON-4601', 'BEL-CTV-SON-4601', 'Corporate', 'Sony 46EX430 46â€ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 60401, 64760, 64760, 64760, 400, 64760, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(967, '2017-08-25 10:55:12', '2017-09-17 09:14:27', 100, 'BEL-CTV-SON-4602', 'BEL-CTV-SON-4602', 'Corporate', 'Sony 46W704A 46â€ Smart LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 118452, 127000, 127000, 127000, 700, 127000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(969, '2017-08-25 10:56:13', '2017-09-17 08:49:48', 100, 'BEL-CTV-SON-4603', 'BEL-CTV-SON-4603', 'Corporate', 'Sony W904A 46â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 223846, 240000, 240000, 240000, 1500, 240000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(973, '2017-08-25 10:56:55', NULL, 100, 'BEL-CTV-SON-4604', 'BEL-CTV-SON-4604', 'Corporate', 'LED KDL-46R450', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 81611, 87500, 87500, 87500, 500, 87500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(974, '2017-08-25 10:57:33', '2017-09-17 09:17:10', 100, 'BEL-CTV-SON-4605', 'BEL-CTV-SON-4605', 'Corporate', 'Sony KDL 46W954 46â€ Smart LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 183740, 197000, 197000, 197000, 1200, 197000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(976, '2017-08-25 10:58:10', '2017-09-17 08:44:34', 100, 'BEL-CTV-SON-4701', 'BEL-CTV-SON-4701', 'Corporate', 'Sony R500A 47â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 92336, 99000, 99000, 99000, 700, 99000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(980, '2017-08-25 10:58:45', '2017-09-17 08:42:23', 100, 'BEL-CTV-SON-4702', 'BEL-CTV-SON-4702', 'Corporate', 'Sony KDL W804A 47â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 154827, 166000, 166000, 166000, 1000, 166000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(982, '2017-08-25 10:59:20', '2017-09-17 09:14:51', 100, 'BEL-CTV-SON-4801', 'BEL-CTV-SON-4801', 'Corporate', 'Sony 48R550C 48â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 80118, 85900, 85900, 85900, 500, 85900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(984, '2017-08-25 10:59:55', '2017-09-17 09:15:17', 100, 'BEL-CTV-SON-4805', 'BEL-CTV-SON-4805', 'Corporate', 'Sony 48W700C 48â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 116586, 125000, 125000, 125000, 700, 125000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(986, '2017-08-25 11:00:27', '2017-09-17 09:19:07', 100, 'BEL-CTV-SON-5001', 'BEL-CTV-SON-5001', 'Corporate', 'Sony W704 50â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 138039, 148000, 148000, 148000, 1000, 148000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(988, '2017-08-25 11:01:00', NULL, 100, 'BEL-CTV-SON-5501', 'BEL-CTV-SON-5501', 'Corporate', '3D 55W800C', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 135240, 145000, 145000, 145000, 1000, 145000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(989, '2017-08-25 11:01:32', NULL, 100, 'BEL-CTV-SON-5502', 'BEL-CTV-SON-5502', 'Corporate', '3D KDL-55W904 Smart', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 191202, 205000, 205000, 205000, 1500, 205000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(992, '2017-08-25 11:02:05', '2017-09-17 08:50:42', 100, 'BEL-CTV-SON-6505', 'BEL-CTV-SON-6505', 'Corporate', 'Sony W850C 65â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 214519, 230000, 230000, 230000, 1500, 230000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(994, '2017-08-25 11:02:48', '2017-09-17 08:46:01', 100, 'BEL-CTV-SON-7070', 'BEL-CTV-SON-7070', 'Corporate', 'Sony R550 70â€³ 3D Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 355356, 381000, 381000, 381000, 2500, 381000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(921, '2017-08-25 10:36:08', '2017-09-17 08:54:16', 100, 'BEL-CTV-SRP-1901', 'BEL-CTV-SRP-1901', 'Corporate', 'Sharp 19LE150 19â€ LED TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13462, 14000, 14000, 14000, 25, 14000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(923, '2017-08-25 10:36:38', '2017-09-17 08:56:05', 100, 'BEL-CTV-SRP-2401', 'BEL-CTV-SRP-2401', 'Corporate', 'Sharp LC 24LE440M 24â€ LED TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21154, 22000, 22000, 22000, 50, 22000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(925, '2017-08-25 10:37:13', '2017-09-17 08:56:35', 100, 'BEL-CTV-SRP-3201', 'BEL-CTV-SRP-3201', 'Corporate', 'Sharp LC LE265M 32â€³ LED TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22981, 23900, 23900, 23900, 75, 23900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(927, '2017-08-25 10:37:54', '2017-09-17 08:57:52', 100, 'BEL-CTV-SRP-3202', 'BEL-CTV-SRP-3202', 'Corporate', 'Sharp LE460X 32â€ LED TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 27923, 29040, 29040, 29040, 100, 29040, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(928, '2017-08-25 10:39:59', '2017-09-17 08:55:08', 100, 'BEL-CTV-SRP-3901', 'BEL-CTV-SRP-3901', 'Corporate', 'Sharp 39LE443M 39â€ LED TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46127, 47972, 47972, 47972, 150, 47972, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(929, '2017-08-25 10:40:30', '2017-09-17 08:57:26', 100, 'BEL-CTV-SRP-4001', 'BEL-CTV-SRP-4001', 'Corporate', 'Sharp LE265M 40â€ LED TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 39904, 41500, 41500, 41500, 150, 41500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(931, '2017-08-25 10:40:59', '2017-09-17 08:58:18', 100, 'BEL-CTV-SRP-4002', 'BEL-CTV-SRP-4002', 'Corporate', 'Sharp LE460X 40â€ LED TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 43750, 45500, 45500, 45500, 150, 45500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(934, '2017-08-25 10:42:20', '2017-09-17 08:57:00', 100, 'BEL-CTV-SRP-7070', 'BEL-CTV-SRP-7070', 'Corporate', 'Sharp LC LE735X 70â€³ LED TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 258288, 268620, 268620, 268620, 1000, 268620, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(996, '2017-08-25 11:03:25', NULL, 100, 'BEL-CTV-TOS-1901', 'BEL-CTV-TOS-1901', 'Corporate', 'LED 19HV15NI', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 15856, 17000, 17000, 17000, 100, 17000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(997, '2017-08-25 11:03:56', NULL, 100, 'BEL-CTV-TOS-2201', 'BEL-CTV-TOS-2201', 'Corporate', 'LED 22S1600VE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13897, 14900, 14900, 14900, 100, 14900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(999, '2017-08-25 11:04:52', '2017-09-17 10:25:16', 100, 'BEL-CTV-TOS-2401', 'BEL-CTV-TOS-2401', 'Corporate', 'Toshiba P2305 24â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 17721, 19000, 19000, 19000, 100, 19000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1001, '2017-08-25 11:05:31', '2017-09-17 10:26:01', 100, 'BEL-CTV-TOS-3201', 'BEL-CTV-TOS-3201', 'Corporate', 'Toshiba PS200 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26954, 28900, 28900, 28900, 150, 28900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1002, '2017-08-25 11:06:24', '2017-09-17 10:25:46', 100, 'BEL-CTV-TOS-3202', 'BEL-CTV-TOS-3202', 'Corporate', 'Toshiba P2305 32â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29379, 31500, 31500, 31500, 200, 31500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1004, '2017-08-25 11:06:56', NULL, 100, 'BEL-CTV-TOS-3210', 'BEL-CTV-TOS-3210', 'Corporate', 'LED 32L2600VE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23224, 24900, 24900, 24900, 150, 24900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1006, '2017-08-25 11:07:33', '2017-09-17 10:24:44', 100, 'BEL-CTV-TOS-4001', 'BEL-CTV-TOS-4001', 'Corporate', 'Toshiba L2400D 40â€³ LED Television', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45702, 49000, 49000, 49000, 300, 49000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1008, '2017-08-25 11:08:04', NULL, 100, 'BEL-CTV-TOS-4002', 'BEL-CTV-TOS-4002', 'Corporate', 'LED 40L2550VE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34417, 36900, 36900, 36900, 200, 36900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1010, '2017-08-25 11:08:36', NULL, 100, 'BEL-CTV-TOS-4301', 'BEL-CTV-TOS-4301', 'Corporate', 'LED 43L3650VE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 37214, 39900, 39900, 39900, 200, 39900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(443, '2017-08-25 05:46:16', NULL, 100, 'BEL-EKE-CON-1001', 'BEL-EKE-CON-1001', 'Corporate', 'BE-083-1801 P / G / B', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 779, 900, 900, 900, 5, 900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(444, '2017-08-25 05:46:54', '2017-09-19 04:53:12', 100, 'BEL-EKE-CON-1002', 'BEL-EKE-CON-1002', 'Corporate', 'Conion Electric Kettle BE 083 18TP', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1557, 1799, 1799, 1799, 15, 1799, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(445, '2017-08-25 05:47:33', NULL, 100, 'BEL-EKE-CON-1003', 'BEL-EKE-CON-1003', 'Corporate', 'BE-083-188B', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1383, 1598, 1598, 1598, 15, 1598, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(447, '2017-08-25 05:48:31', NULL, 100, 'BEL-EKE-CON-1004', 'BEL-EKE-CON-1004', 'Corporate', 'BE-083-18MB/MG/MR/MO', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 862, 996, 996, 996, 10, 996, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(449, '2017-08-25 05:49:12', NULL, 100, 'BEL-EKE-CON-1005', 'BEL-EKE-CON-1005', 'Corporate', 'BE-083-2012G', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1643, 1899, 1899, 1899, 20, 1899, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(451, '2017-08-25 05:49:46', '2017-09-19 04:53:30', 100, 'BEL-EKE-CON-1006', 'BEL-EKE-CON-1006', 'Corporate', 'Conion Electric Kettle BE 083 18CR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1816, 2099, 2099, 2099, 20, 2099, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(453, '2017-08-25 05:50:25', '2017-09-19 05:03:58', 100, 'BEL-EKE-CON-1007', 'BEL-EKE-CON-1007', 'Corporate', 'Conion Electric Kettle BE-L18TSS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1383, 1598, 1598, 1598, 15, 1598, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(454, '2017-08-25 05:51:06', NULL, 100, 'BEL-EKE-CON-1008', 'BEL-EKE-CON-1008', 'Corporate', 'BE-083-18GS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1036, 1197, 1197, 1197, 10, 1197, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(457, '2017-08-25 05:51:46', NULL, 100, 'BEL-EKE-CON-1009', 'BEL-EKE-CON-1009', 'Corporate', 'BE-083-18HR/HB/HG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1211, 1399, 1399, 1399, 10, 1399, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(459, '2017-08-25 05:52:23', '2017-09-19 05:03:38', 100, 'BEL-EKE-CON-1010', 'BEL-EKE-CON-1010', 'Corporate', 'Conion Electric Kettle BE-L18TQR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1556, 1798, 1798, 1798, 15, 1798, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(460, '2017-08-25 05:53:05', '2017-09-19 04:52:05', 100, 'BEL-EKE-CON-1011', 'BEL-EKE-CON-1011', 'Corporate', 'Conion Electric Kettle BE-L18QBP', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1643, 1898, 1898, 1898, 15, 1898, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(462, '2017-08-25 05:53:43', '2017-09-19 04:54:44', 100, 'BEL-EKE-CON-1012', 'BEL-EKE-CON-1012', 'Corporate', 'Conion Electric Kettle BE 083 15SN', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1254, 1449, 1449, 1449, 15, 1449, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(463, '2017-08-25 05:54:30', '2017-09-19 04:52:27', 100, 'BEL-EKE-CON-1013', 'BEL-EKE-CON-1013', 'Corporate', 'Conion Electric Kettle BE-L185RP', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1211, 1399, 1399, 1399, 15, 1399, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(465, '2017-08-25 05:55:07', NULL, 100, 'BEL-EKE-CON-1014', 'BEL-EKE-CON-1014', 'Corporate', 'BE-083-1811S', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1383, 1598, 1598, 1598, 15, 1598, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(466, '2017-08-25 05:55:41', NULL, 100, 'BEL-EKE-CON-1015', 'BEL-EKE-CON-1015', 'Corporate', 'BE-083-1811R', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1513, 1748, 1748, 1748, 15, 1748, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(468, '2017-08-25 05:56:33', NULL, 100, 'BEL-EKE-CON-1016', 'BEL-EKE-CON-1016', 'Corporate', 'BE-083-182R/B', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1643, 1898, 1898, 1898, 15, 1898, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(473, '2017-08-25 05:59:17', '2017-09-19 07:39:38', 100, 'BEL-EKE-PHL-1001', 'BEL-EKE-PHL-1001', 'Corporate', 'Philips Electric Kettle HD 9316', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3531, 3992, 3992, 3992, 50, 3992, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(476, '2017-08-25 05:59:56', '2017-09-19 07:41:13', 100, 'BEL-EKE-PHL-1002', 'BEL-EKE-PHL-1002', 'Corporate', 'Philips Electric Kettle HD9320 26', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3709, 4192, 4192, 4192, 50, 4192, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(477, '2017-08-25 06:00:28', NULL, 100, 'BEL-EKE-PHL-1003', 'BEL-EKE-PHL-1003', 'Corporate', 'HD4677/20', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 5031, 5688, 5688, 5688, 50, 5688, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(479, '2017-08-25 06:01:07', NULL, 100, 'BEL-EKE-PHL-1004', 'BEL-EKE-PHL-1004', 'Corporate', 'HD9316', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3970, 4488, 4488, 4488, 50, 4488, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(404, '2017-08-25 05:24:54', NULL, 100, 'BEL-FAN-ORT-4801', 'BEL-FAN-ORT-4801', 'Corporate', 'COUPLET (48\" 2 Blades)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2990, 3240, 3240, 3240, 25, 3240, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(406, '2017-08-25 05:25:31', NULL, 100, 'BEL-FAN-ORT-4802', 'BEL-FAN-ORT-4802', 'Corporate', 'ADENA (48\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2806, 3040, 3040, 3040, 15, 3040, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(408, '2017-08-25 05:26:07', NULL, 100, 'BEL-FAN-ORT-4803', 'BEL-FAN-ORT-4803', 'Corporate', 'ADONIS (48\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2714, 2940, 2940, 2940, 15, 2940, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(411, '2017-08-25 05:26:43', NULL, 100, 'BEL-FAN-ORT-4804', 'BEL-FAN-ORT-4804', 'Corporate', 'FANTOOSH (48\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2898, 3140, 3140, 3140, 15, 3140, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(413, '2017-08-25 05:27:16', NULL, 100, 'BEL-FAN-ORT-4805', 'BEL-FAN-ORT-4805', 'Corporate', 'ORINA (48\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3268, 3540, 3540, 3540, 15, 3540, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(415, '2017-08-25 05:27:51', NULL, 100, 'BEL-FAN-ORT-4806', 'BEL-FAN-ORT-4806', 'Corporate', 'WENDY (48\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3084, 3340, 3340, 3340, 15, 3340, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(417, '2017-08-25 05:28:27', NULL, 100, 'BEL-FAN-ORT-4807', 'BEL-FAN-ORT-4807', 'Corporate', 'QUADRO (48\" 4-Blade)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3084, 3340, 3340, 3340, 15, 3340, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(418, '2017-08-25 05:29:09', NULL, 100, 'BEL-FAN-ORT-4808', 'BEL-FAN-ORT-4808', 'Corporate', 'SPECTRA (48\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 7606, 8240, 8240, 8240, 50, 8240, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(419, '2017-08-25 05:29:47', NULL, 100, 'BEL-FAN-ORT-5201', 'BEL-FAN-ORT-5201', 'Corporate', 'SUBARIS (52\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8076, 8748, 8748, 8748, 50, 8748, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(421, '2017-08-25 05:30:42', NULL, 100, 'BEL-FAN-ORT-5601', 'BEL-FAN-ORT-5601', 'Corporate', 'GRATIA (56\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2898, 3140, 3140, 3140, 15, 3140, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(422, '2017-08-25 05:31:42', NULL, 100, 'BEL-FAN-ORT-5602', 'BEL-FAN-ORT-5602', 'Corporate', 'QUASAR (56\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3038, 3292, 3292, 3292, 15, 3292, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(425, '2017-08-25 05:37:51', NULL, 100, 'BEL-FAN-ORT-5603', 'BEL-FAN-ORT-5603', 'Corporate', 'SUMMER DELITE (56\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2622, 2840, 2840, 2840, 15, 2840, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(426, '2017-08-25 05:38:42', NULL, 100, 'BEL-FAN-ORT-5604', 'BEL-FAN-ORT-5604', 'Corporate', 'SUMMER PRIDE (56\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2806, 3040, 3040, 3040, 15, 3040, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(428, '2017-08-25 05:39:22', NULL, 100, 'BEL-FAN-ORT-5605', 'BEL-FAN-ORT-5605', 'Corporate', 'NEW AIR (56\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2344, 2540, 2540, 2540, 15, 2540, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(429, '2017-08-25 05:39:54', NULL, 100, 'BEL-FAN-ORT-5606', 'BEL-FAN-ORT-5606', 'Corporate', 'SUMMER COOL (56\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2436, 2640, 2640, 2640, 15, 2640, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(431, '2017-08-25 05:40:29', NULL, 100, 'BEL-FAN-ORT-5607', 'BEL-FAN-ORT-5607', 'Corporate', 'NEW BREEZE (56\")', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2530, 2740, 2740, 2740, 15, 2740, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(433, '2017-08-25 05:41:40', '2017-09-17 10:29:28', 100, 'BEL-FAN-VIC-1001', 'BEL-FAN-VIC-1001', 'Corporate', 'Victor Stand Fan SF 2169', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2879, 2994, 2994, 2994, 5, 2994, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(434, '2017-08-25 05:42:19', '2017-09-17 10:30:05', 100, 'BEL-FAN-VIC-1005', 'BEL-FAN-VIC-1005', 'Corporate', 'Victor Stand Fan SL 169', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2490, 2590, 2590, 2590, 5, 2590, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(436, '2017-08-25 05:43:13', '2017-09-17 10:30:27', 100, 'BEL-FAN-VIC-1011', 'BEL-FAN-VIC-1011', 'Corporate', 'Victor Stand Fan SL 264', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2587, 2690, 2690, 2690, 5, 2690, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(438, '2017-08-25 05:44:07', '2017-09-17 10:30:46', 100, 'BEL-FAN-VIC-2005', 'BEL-FAN-VIC-2005', 'Corporate', 'Victor Table Fan TF 116', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1962, 2040, 2040, 2040, 5, 2040, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(439, '2017-08-25 05:44:46', '2017-09-17 10:29:01', 100, 'BEL-FAN-VIC-2006', 'BEL-FAN-VIC-2006', 'Corporate', 'Victor Stand Fan IF 1881', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 5266, 5588, 5588, 5588, 25, 5588, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(441, '2017-08-25 05:45:29', '2017-09-17 10:31:06', 100, 'BEL-FAN-VIC-2010', 'BEL-FAN-VIC-2010', 'Corporate', 'Victor Table Fan TF 1610', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2298, 2390, 2390, 2390, 5, 2390, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1031, '2017-08-25 11:18:50', NULL, 100, 'BEL-FPN-CON-1020', 'BEL-FPN-CON-1020', 'Corporate', 'Frypan - 20 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 714, 790, 790, 790, 5, 790, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1033, '2017-08-25 11:19:20', NULL, 100, 'BEL-FPN-CON-1022', 'BEL-FPN-CON-1022', 'Corporate', 'Frypan - 22 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 768, 850, 850, 850, 5, 850, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1035, '2017-08-25 11:19:54', NULL, 100, 'BEL-FPN-CON-1024', 'BEL-FPN-CON-1024', 'Corporate', 'Frypan - 24 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 813, 900, 900, 900, 5, 900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1037, '2017-08-25 11:20:29', NULL, 100, 'BEL-FPN-CON-1026', 'BEL-FPN-CON-1026', 'Corporate', 'Frypan -26 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 904, 1000, 1000, 1000, 5, 1000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1039, '2017-08-25 11:21:00', NULL, 100, 'BEL-FPN-CON-1028', 'BEL-FPN-CON-1028', 'Corporate', 'Frypan -28 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 995, 1100, 1100, 1100, 5, 1100, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(534, '2017-08-25 06:26:45', '2017-09-19 05:11:28', 100, 'BEL-FZR-CON-1001', 'BEL-FZR-CON-1001', 'Corporate', 'Conion Glass Door Deep Freezer BE 99', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 17535, 19400, 19400, 19400, 200, 19400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(536, '2017-08-25 06:27:21', '2017-09-19 04:47:16', 100, 'BEL-FZR-CON-1006', 'BEL-FZR-CON-1006', 'Corporate', 'Conion Deep Freezer BEW 131G', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 16179, 17900, 17900, 17900, 150, 17900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(539, '2017-08-25 06:27:58', NULL, 100, 'BEL-FZR-CON-1011', 'BEL-FZR-CON-1011', 'Corporate', 'BE-179FNB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 15275, 16900, 16900, 16900, 150, 16900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(541, '2017-08-25 06:28:48', '2017-09-19 04:40:25', 100, 'BEL-FZR-CON-1020', 'BEL-FZR-CON-1020', 'Corporate', 'Conion Chest Freezer BE 142GCM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 22505, 24900, 24900, 24900, 250, 24900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(544, '2017-08-25 06:29:32', '2017-09-19 04:47:41', 100, 'BEL-FZR-CON-1021', 'BEL-FZR-CON-1021', 'Corporate', 'Conion Deep Freezer BEW 157B', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 18077, 20000, 20000, 20000, 200, 20000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(546, '2017-08-25 06:30:21', '2017-09-19 04:48:21', 100, 'BEL-FZR-CON-1022', 'BEL-FZR-CON-1022', 'Corporate', 'Conion Deep Freezer BEW 157S', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 18077, 20000, 20000, 20000, 200, 20000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(549, '2017-08-25 06:31:07', '2017-09-19 05:12:32', 100, 'BEL-FZR-CON-1050', 'BEL-FZR-CON-1050', 'Corporate', 'Conion Glass Door Deep Freezer BE 200 GT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 24855, 27500, 27500, 27500, 250, 27500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(552, '2017-08-25 06:31:47', NULL, 100, 'BEL-FZR-CON-1094', 'BEL-FZR-CON-1094', 'Corporate', 'BE-252FNB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 18980, 21000, 21000, 21000, 200, 21000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(554, '2017-08-25 06:32:38', NULL, 100, 'BEL-FZR-CON-2001', 'BEL-FZR-CON-2001', 'Corporate', 'BEK-165JMB (Black)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 24313, 26900, 26900, 26900, 250, 26900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(556, '2017-08-25 06:33:11', NULL, 100, 'BEL-FZR-CON-2002', 'BEL-FZR-CON-2002', 'Corporate', 'BEK-165JMM (Maroon)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 24313, 26900, 26900, 26900, 250, 26900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(558, '2017-08-25 06:33:50', '2017-09-19 04:49:16', 100, 'BEL-FZR-CON-2031', 'BEL-FZR-CON-2031', 'Corporate', 'Conion Deep Freezer BEW 227B', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 22596, 25000, 25000, 25000, 250, 25000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(560, '2017-08-25 06:34:33', '2017-09-19 04:58:09', 100, 'BEL-FZR-CON-2032', 'BEL-FZR-CON-2032', 'Corporate', 'Conion Deep Freezer BEW 227S', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 22596, 25000, 25000, 25000, 250, 25000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(561, '2017-08-25 06:35:06', '2017-09-19 04:40:49', 100, 'BEL-FZR-CON-2040', 'BEL-FZR-CON-2040', 'Corporate', 'Conion Chest Freezer BE 198GCM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 27025, 29900, 29900, 29900, 250, 29900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(564, '2017-08-25 06:35:40', NULL, 100, 'BEL-FZR-CON-2041', 'BEL-FZR-CON-2041', 'Corporate', 'BE-207FS (Red Wine / Silver)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 17987, 19900, 19900, 19900, 200, 19900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live');
INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xvatpct`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(567, '2017-08-25 06:36:18', '2017-09-19 04:57:28', 100, 'BEL-FZR-CON-2051', 'BEL-FZR-CON-2051', 'Corporate', 'Conion Deep Freezer BEW 271G', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 23500, 26000, 26000, 26000, 250, 26000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(569, '2017-08-25 06:36:54', '2017-09-19 05:03:05', 100, 'BEL-FZR-CON-2052', 'BEL-FZR-CON-2052', 'Corporate', 'Conion Deep Freezer BEW 271S', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 24404, 27000, 27000, 27000, 250, 27000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(572, '2017-08-25 06:37:30', NULL, 100, 'BEL-FZR-CON-2058', 'BEL-FZR-CON-2058', 'Corporate', 'BEK-190JMB (Black)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 27025, 29900, 29900, 29900, 250, 29900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(574, '2017-08-25 06:37:56', NULL, 100, 'BEL-FZR-CON-2059', 'BEL-FZR-CON-2059', 'Corporate', 'BEK-190JMM (Maroon)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 27025, 29900, 29900, 29900, 250, 29900, 0, '0', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(577, '2017-08-25 06:38:45', NULL, 100, 'BEL-FZR-CON-2094', 'BEL-FZR-CON-2094', 'Corporate', 'BE-254SCR Showcase', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 42390, 46900, 46900, 46900, 500, 46900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(579, '2017-08-25 06:39:23', '2017-09-19 04:42:20', 100, 'BEL-FZR-CON-2100', 'BEL-FZR-CON-2100', 'Corporate', 'Conion Chest Freezer BE 200CFGZ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 24404, 27000, 27000, 27000, 250, 27000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(582, '2017-08-25 06:40:08', '2017-09-19 04:43:24', 100, 'BEL-FZR-CON-2110', 'BEL-FZR-CON-2110', 'Corporate', 'Conion Chest Freezer BE 210CFGW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 34346, 38000, 38000, 38000, 300, 38000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(587, '2017-08-25 06:41:20', '2017-09-19 04:56:20', 100, 'BEL-FZR-CON-3015', 'BEL-FZR-CON-3015', 'Corporate', 'Conion Deep Freezer BEW 327G', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 31545, 34900, 34900, 34900, 300, 34900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(590, '2017-08-25 06:42:02', '2017-09-19 04:55:52', 100, 'BEL-FZR-CON-3016', 'BEL-FZR-CON-3016', 'Corporate', 'Conion Deep Freezer BEW 327S', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 28923, 32000, 32000, 32000, 300, 32000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(592, '2017-08-25 06:42:35', NULL, 100, 'BEL-FZR-CON-3017', 'BEL-FZR-CON-3017', 'Corporate', 'BEW-327B', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 28923, 32000, 32000, 32000, 300, 32000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(594, '2017-08-25 06:43:14', NULL, 100, 'BEL-FZR-CON-3020', 'BEL-FZR-CON-3020', 'Corporate', 'BE-363S/B (Double Door)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 36063, 39900, 39900, 39900, 300, 39900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(597, '2017-08-25 06:43:56', '2017-09-19 04:55:38', 100, 'BEL-FZR-CON-3031', 'BEL-FZR-CON-3031', 'Corporate', 'Conion Deep Freezer BEW 361 CF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 25308, 28000, 28000, 28000, 250, 28000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(599, '2017-08-25 06:44:41', '2017-09-19 04:44:02', 100, 'BEL-FZR-CON-3060', 'BEL-FZR-CON-3060', 'Corporate', 'Conion Chest Freezer BE 360CEZ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 39770, 44000, 44000, 44000, 400, 44000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(602, '2017-08-25 06:45:13', NULL, 100, 'BEL-FZR-CON-3070', 'BEL-FZR-CON-3070', 'Corporate', 'BE-423S (Double Door)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 40583, 44900, 44900, 44900, 400, 44900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(604, '2017-08-25 06:45:48', '2017-09-19 04:44:26', 100, 'BEL-FZR-CON-5050', 'BEL-FZR-CON-5050', 'Corporate', 'Conion Chest Freezer BE 550CFZ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 57846, 64000, 64000, 64000, 500, 64000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(608, '2017-08-25 06:47:19', '2017-09-19 08:56:27', 100, 'BEL-FZR-LGE-1015', 'BEL-FZR-LGE-1015', 'Corporate', 'LG Deep Freezer GC S115GV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 25035, 26300, 26300, 26300, 100, 26300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(609, '2017-08-25 06:47:52', '2017-09-19 08:56:15', 100, 'BEL-FZR-LGE-1042', 'BEL-FZR-LGE-1042', 'Corporate', 'LG Deep Freezer GC S175GV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 26178, 27500, 27500, 27500, 100, 27500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(612, '2017-08-25 06:48:27', '2017-09-19 08:57:34', 100, 'BEL-FZR-LGE-1098', 'BEL-FZR-LGE-1098', 'Corporate', 'LG Deep Freezer GC S235GV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 34365, 36100, 36100, 36100, 100, 36100, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(615, '2017-08-25 06:49:02', NULL, 100, 'BEL-FZR-LGE-2001', 'BEL-FZR-LGE-2001', 'Corporate', 'GC-245GV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 29985, 31500, 31500, 31500, 100, 31500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(617, '2017-08-25 06:49:47', '2017-09-19 08:59:35', 100, 'BEL-FZR-LGE-2035', 'BEL-FZR-LGE-2035', 'Corporate', 'LG Deep Freezer GR K310DSLB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 57020, 59900, 59900, 59900, 300, 59900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(620, '2017-08-25 06:50:23', '2017-09-19 08:57:29', 100, 'BEL-FZR-LGE-2095', 'BEL-FZR-LGE-2095', 'Corporate', 'LG Deep Freezer GC S325GV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 39885, 41900, 41900, 41900, 200, 41900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(971, '2017-08-25 10:56:42', '2017-09-19 08:58:33', 100, 'BEL-FZR-SAM-1034', 'BEL-FZR-SAM-1034', 'Corporate', 'Samsung Deep Freezer RG1740', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38462, 40000, 40000, 40000, 100, 40000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(977, '2017-08-25 10:58:20', NULL, 100, 'BEL-FZR-SAM-2205', 'BEL-FZR-SAM-2205', 'Corporate', 'ZR-20FAR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 35577, 37000, 37000, 37000, 150, 37000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(981, '2017-08-25 10:59:08', '2017-09-19 08:59:20', 100, 'BEL-FZR-SAM-2265', 'BEL-FZR-SAM-2265', 'Corporate', 'Samsung Deep Freezer ZR 26FAR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 40288, 41900, 41900, 41900, 100, 41900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(985, '2017-08-25 11:00:00', '2017-09-19 08:59:43', 100, 'BEL-FZR-SAM-2304', 'BEL-FZR-SAM-2304', 'Corporate', 'Samsung Deep Freezer ZR 31FAR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45096, 46900, 46900, 46900, 200, 46900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(987, '2017-08-25 11:00:47', NULL, 100, 'BEL-FZR-SRP-1099', 'BEL-FZR-SRP-1099', 'Corporate', 'HS-G99CF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21582, 23380, 23380, 23380, 100, 23380, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(990, '2017-08-25 11:01:37', NULL, 100, 'BEL-FZR-SRP-1142', 'BEL-FZR-SRP-1142', 'Corporate', 'HS-G142CF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24254, 26276, 26276, 26276, 200, 26276, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(993, '2017-08-25 11:02:19', '2017-09-19 04:39:01', 100, 'BEL-FZR-SRP-1145', 'BEL-FZR-SRP-1145', 'Corporate', 'Sharp Deep Freezer SJC 155WH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25846, 28000, 28000, 28000, 200, 28000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(995, '2017-08-25 11:03:21', '2017-09-19 04:39:21', 100, 'BEL-FZR-SRP-2010', 'BEL-FZR-SRP-2010', 'Corporate', 'Sharp Deep Freezer SJC 205WH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32308, 35000, 35000, 35000, 200, 35000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(998, '2017-08-25 11:04:14', NULL, 100, 'BEL-FZR-SRP-2011', 'BEL-FZR-SRP-2011', 'Corporate', 'HS-G260CF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 27990, 30322, 30322, 30322, 200, 30322, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1000, '2017-08-25 11:05:09', '2017-09-19 04:39:35', 100, 'BEL-FZR-SRP-3100', 'BEL-FZR-SRP-3100', 'Corporate', 'Sharp Deep Freezer SJC 315WH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 44308, 48000, 48000, 48000, 300, 48000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1003, '2017-08-25 11:06:24', '2017-09-19 04:40:58', 100, 'BEL-FZR-SRP-4015', 'BEL-FZR-SRP-4015', 'Corporate', 'Sharp Deep Freezer SJC 415WH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 54462, 59000, 59000, 59000, 500, 59000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1005, '2017-08-25 11:07:06', '2017-09-19 05:16:24', 100, 'BEL-FZR-WHL-1080', 'BEL-FZR-WHL-1080', 'Corporate', 'Whirlpool CF 19T Deep Freezer', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33317, 35000, 35000, 35000, 100, 35000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1007, '2017-08-25 11:07:49', '2017-09-19 05:18:11', 100, 'BEL-FZR-WHL-2045', 'BEL-FZR-WHL-2045', 'Corporate', 'Whirlpool CF 27T Deep Freezer', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 41885, 44000, 44000, 44000, 200, 44000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1009, '2017-08-25 11:08:30', '2017-09-17 10:37:09', 100, 'BEL-GEN-CON-1012', 'BEL-GEN-CON-1012', 'Corporate', 'Conion Generator BE 1250', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 16154, 17500, 17500, 17500, 100, 17500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1012, '2017-08-25 11:09:18', '2017-09-17 10:36:37', 100, 'BEL-GEN-CON-1025', 'BEL-GEN-CON-1025', 'Corporate', 'Conion Generator BE 2500', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21230, 23000, 23000, 23000, 100, 23000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1013, '2017-08-25 11:09:54', '2017-09-17 10:35:02', 100, 'BEL-GEN-CON-1035', 'BEL-GEN-CON-1035', 'Corporate', 'Conion Generator BE 3500', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25754, 27900, 27900, 27900, 200, 27900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1015, '2017-08-25 11:10:50', '2017-09-17 10:35:23', 100, 'BEL-GEN-CON-1060', 'BEL-GEN-CON-1060', 'Corporate', 'Conion Generator BE 6000', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36924, 40000, 40000, 40000, 300, 40000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1017, '2017-08-25 11:11:41', '2017-09-17 10:35:42', 100, 'BEL-GEN-CON-1085', 'BEL-GEN-CON-1085', 'Corporate', 'Conion Generator BE 8500', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 55384, 60000, 60000, 60000, 500, 60000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1040, '2017-08-25 11:21:33', '2017-09-19 05:12:19', 100, 'BEL-ICO-CON-1015', 'BEL-ICO-CON-1015', 'Corporate', 'Conion Induction Cooker BE MIC27EQ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2712, 3000, 3000, 3000, 25, 3000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1046, '2017-08-25 11:23:36', '2017-09-19 05:13:57', 100, 'BEL-ICO-CON-1020', 'BEL-ICO-CON-1020', 'Corporate', 'Conion Induction Cooker BE MIP23ER', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2530, 2800, 2800, 2800, 25, 2800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(335, '2017-08-25 04:51:17', '2017-09-19 07:46:41', 100, 'BEL-ICO-PHL-1020', 'BEL-ICO-PHL-1020', 'Corporate', 'Philips Induction Cooker HD 4932', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4600, 5200, 5200, 5200, 50, 5200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(344, '2017-08-25 04:57:00', '2017-09-19 07:47:28', 100, 'BEL-ICO-PHL-1030', 'BEL-ICO-PHL-1030', 'Corporate', 'Philips Induction Cooker HD 4938', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 5927, 6700, 6700, 6700, 75, 6700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(346, '2017-08-25 04:57:41', '2017-09-19 07:46:16', 100, 'BEL-ICO-PHL-1040', 'BEL-ICO-PHL-1040', 'Corporate', 'Philips Induction Cooker HD 4929', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4865, 5500, 5500, 5500, 50, 5500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1018, '2017-08-25 11:13:03', NULL, 100, 'BEL-IRN-CON-1002', 'BEL-IRN-CON-1002', 'Corporate', 'BEDSW-2', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 648, 749, 749, 749, 5, 749, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1019, '2017-08-25 11:13:45', NULL, 100, 'BEL-IRN-CON-1005', 'BEL-IRN-CON-1005', 'Corporate', 'BEDSW-5', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 561, 648, 648, 648, 5, 648, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1020, '2017-08-25 11:14:30', NULL, 100, 'BEL-IRN-CON-1020', 'BEL-IRN-CON-1020', 'Corporate', 'YPF-6505', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1039, 1200, 1200, 1200, 10, 1200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1023, '2017-08-25 11:16:12', NULL, 100, 'BEL-IRN-CON-1021', 'BEL-IRN-CON-1021', 'Corporate', 'BEDSW-201E', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 821, 948, 948, 948, 5, 948, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1025, '2017-08-25 11:17:04', NULL, 100, 'BEL-IRN-CON-1022', 'BEL-IRN-CON-1022', 'Corporate', 'BEDSW-2188', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 994, 1148, 1148, 1148, 5, 1148, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1028, '2017-08-25 11:17:47', NULL, 100, 'BEL-IRN-CON-1025', 'BEL-IRN-CON-1025', 'Corporate', 'YPF-6132', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1039, 1200, 1200, 1200, 5, 1200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1030, '2017-08-25 11:18:26', NULL, 100, 'BEL-IRN-CON-1030', 'BEL-IRN-CON-1030', 'Corporate', 'YPF-637', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 952, 1100, 1100, 1100, 5, 1100, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1032, '2017-08-25 11:19:07', NULL, 100, 'BEL-IRN-CON-1031', 'BEL-IRN-CON-1031', 'Corporate', 'BESW-1688', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 734, 849, 849, 849, 5, 849, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1034, '2017-08-25 11:19:48', NULL, 100, 'BEL-IRN-CON-1041', 'BEL-IRN-CON-1041', 'Corporate', 'BESW-2688', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 907, 1048, 1048, 1048, 5, 1048, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1036, '2017-08-25 11:20:26', NULL, 100, 'BEL-IRN-CON-1045', 'BEL-IRN-CON-1045', 'Corporate', 'BESW-2788B', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1210, 1398, 1398, 1398, 10, 1398, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1041, '2017-08-25 11:21:33', '2017-09-19 10:21:36', 100, 'BEL-IRN-PAN-1021', 'BEL-IRN-PAN-1021', 'Corporate', 'Panasonic Iron NI 27AWT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2035, 2300, 2300, 2300, 15, 2300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1042, '2017-08-25 11:22:04', '2017-09-19 10:21:33', 100, 'BEL-IRN-PAN-1022', 'BEL-IRN-PAN-1022', 'Corporate', 'Panasonic Iron NI 22AWT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1946, 2200, 2200, 2200, 15, 2200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1043, '2017-08-25 11:22:47', '2017-09-19 10:23:06', 100, 'BEL-IRN-PAN-1023', 'BEL-IRN-PAN-1023', 'Corporate', 'Panasonic Iron NI P250T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1769, 2000, 2000, 2000, 15, 2000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1044, '2017-08-25 11:23:18', '2017-09-19 10:23:28', 100, 'BEL-IRN-PAN-1025', 'BEL-IRN-PAN-1025', 'Corporate', 'Panasonic Iron NI P300T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1946, 2200, 2200, 2200, 15, 2200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1047, '2017-08-25 11:23:53', NULL, 100, 'BEL-IRN-PAN-1031', 'BEL-IRN-PAN-1031', 'Corporate', 'NI-317TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1238, 1400, 1400, 1400, 10, 1400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1050, '2017-08-25 11:24:47', NULL, 100, 'BEL-IRN-PAN-1041', 'BEL-IRN-PAN-1041', 'Corporate', 'NI-E 100TGSG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1769, 2000, 2000, 2000, 15, 2000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1055, '2017-08-25 11:26:05', NULL, 100, 'BEL-IRN-PAN-1042', 'BEL-IRN-PAN-1042', 'Corporate', 'NI - E410T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2300, 2600, 2600, 2600, 20, 2600, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1058, '2017-08-25 11:26:52', '2017-09-19 10:22:47', 100, 'BEL-IRN-PAN-1043', 'BEL-IRN-PAN-1043', 'Corporate', 'Panasonic Iron NI 317TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2477, 2800, 2800, 2800, 20, 2800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1060, '2017-08-25 11:27:29', NULL, 100, 'BEL-IRN-PAN-1045', 'BEL-IRN-PAN-1045', 'Corporate', 'NI-V 100NASG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1769, 2000, 2000, 2000, 15, 2000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1061, '2017-08-25 11:28:07', NULL, 100, 'BEL-IRN-PAN-1046', 'BEL-IRN-PAN-1046', 'Corporate', 'NI-100DX', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3096, 3500, 3500, 3500, 25, 3500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1063, '2017-08-25 11:29:00', NULL, 100, 'BEL-IRN-PAN-1051', 'BEL-IRN-PAN-1051', 'Corporate', 'NI-E 200TASG/TRSG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1566, 1770, 1770, 1770, 15, 1770, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1067, '2017-08-25 11:30:28', '2017-09-19 07:49:18', 100, 'BEL-IRN-PHL-1018', 'BEL-IRN-PHL-1018', 'Corporate', 'Philips Iron GC122 76', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1548, 1750, 1750, 1750, 10, 1750, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1068, '2017-08-25 11:31:17', '2017-09-19 07:50:17', 100, 'BEL-IRN-PHL-1019', 'BEL-IRN-PHL-1019', 'Corporate', 'Philips Iron GC160 07', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1681, 1900, 1900, 1900, 15, 1900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1069, '2017-08-25 11:31:56', '2017-09-19 07:48:00', 100, 'BEL-IRN-PHL-1020', 'BEL-IRN-PHL-1020', 'Corporate', 'Philips Iron GC 160', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1769, 2000, 2000, 2000, 15, 2000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1070, '2017-08-25 11:32:50', '2017-09-19 07:48:52', 100, 'BEL-IRN-PHL-1021', 'BEL-IRN-PHL-1021', 'Corporate', 'Philips Iron GC1028 20', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2919, 3300, 3300, 3300, 25, 3300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1071, '2017-08-25 11:33:34', '2017-09-19 07:50:36', 100, 'BEL-IRN-PHL-1022', 'BEL-IRN-PHL-1022', 'Corporate', 'Philips Iron GC185 86', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2477, 2800, 2800, 2800, 25, 2800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1072, '2017-08-25 11:34:20', '2017-09-19 07:49:40', 100, 'BEL-IRN-PHL-1023', 'BEL-IRN-PHL-1023', 'Corporate', 'Philips Iron GC1418 36', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1946, 2200, 2200, 2200, 15, 2200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1073, '2017-08-25 11:35:04', '2017-09-19 04:42:54', 100, 'BEL-IRN-SRP-1006', 'BEL-IRN-SRP-1006', 'Corporate', 'Sharp Iron AM P455T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1946, 2200, 2200, 2200, 15, 2200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1074, '2017-08-25 11:35:51', '2017-09-19 04:41:38', 100, 'BEL-IRN-SRP-1009', 'BEL-IRN-SRP-1009', 'Corporate', 'Sharp Iron AM 475', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2123, 2400, 2400, 2400, 20, 2400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1075, '2017-08-25 11:36:33', '2017-09-19 04:43:13', 100, 'BEL-IRN-SRP-1010', 'BEL-IRN-SRP-1010', 'Corporate', 'Sharp Iron AM P465T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2079, 2350, 2350, 2350, 20, 2350, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1076, '2017-08-25 11:37:21', '2017-09-19 04:41:59', 100, 'BEL-IRN-SRP-1011', 'BEL-IRN-SRP-1011', 'Corporate', 'Sharp Iron AM 475T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2388, 2700, 2700, 2700, 25, 2700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1077, '2017-08-25 11:39:51', '2017-09-19 04:42:33', 100, 'BEL-IRN-SRP-1012', 'BEL-IRN-SRP-1012', 'Corporate', 'Sharp Iron AM 575T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2565, 2900, 2900, 2900, 25, 2900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1078, '2017-08-25 11:40:27', '2017-09-19 04:42:17', 100, 'BEL-IRN-SRP-1013', 'BEL-IRN-SRP-1013', 'Corporate', 'Sharp Iron AM 575', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2212, 2500, 2500, 2500, 25, 2500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1079, '2017-08-25 11:41:36', '2017-09-19 09:06:03', 100, 'BEL-IRN-TOS-1006', 'BEL-IRN-TOS-1006', 'Corporate', 'Toshiba Iron TA A21C', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1238, 1400, 1400, 1400, 10, 1400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1080, '2017-08-25 11:45:09', '2017-09-19 09:06:39', 100, 'BEL-IRN-TOS-1010', 'BEL-IRN-TOS-1010', 'Corporate', 'Toshiba Iron TA W17C', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1504, 1700, 1700, 1700, 10, 1700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1081, '2017-08-25 11:45:43', '2017-09-19 09:07:10', 100, 'BEL-IRN-TOS-1015', 'BEL-IRN-TOS-1015', 'Corporate', 'Toshiba Iron TA W20B', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1857, 2100, 2100, 2100, 15, 2100, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1048, '2017-08-25 11:24:14', NULL, 100, 'BEL-KGL-CON-1022', 'BEL-KGL-CON-1022', 'Corporate', 'Karai Glass Lid -22 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 813, 900, 900, 900, 5, 900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1051, '2017-08-25 11:24:56', NULL, 100, 'BEL-KGL-CON-1024', 'BEL-KGL-CON-1024', 'Corporate', 'Karai Glass Lid -24 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 904, 1000, 1000, 1000, 5, 1000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1053, '2017-08-25 11:25:26', NULL, 100, 'BEL-KGL-CON-1026', 'BEL-KGL-CON-1026', 'Corporate', 'Karai Glass Lid -26 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 995, 1100, 1100, 1100, 5, 1100, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1054, '2017-08-25 11:25:59', NULL, 100, 'BEL-KGL-CON-1028', 'BEL-KGL-CON-1028', 'Corporate', 'Karai Glass Lid -28 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1130, 1250, 1250, 1250, 5, 1250, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1057, '2017-08-25 11:26:33', NULL, 100, 'BEL-KGL-CON-1030', 'BEL-KGL-CON-1030', 'Corporate', 'Karai Glass Lid -30 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1220, 1350, 1350, 1350, 10, 1350, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(214, '2017-08-24 12:09:02', '2017-09-19 05:18:05', 100, 'BEL-MIX-CON-1015', 'BEL-MIX-CON-1015', 'Corporate', 'Conion Mixer BE 305', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 519, 600, 600, 600, 5, 600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(215, '2017-08-24 12:10:23', '2017-09-19 05:18:16', 100, 'BEL-MIX-CON-1020', 'BEL-MIX-CON-1020', 'Corporate', 'Conion Mixer BE 504E', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1168, 1350, 1350, 1350, 10, 1350, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(216, '2017-08-24 12:11:36', '2017-09-19 05:18:48', 100, 'BEL-MIX-CON-1022', 'BEL-MIX-CON-1022', 'Corporate', 'Conion Mixer BE 506', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 606, 700, 700, 700, 5, 700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(217, '2017-08-24 12:14:35', '2017-09-19 05:19:37', 100, 'BEL-MIX-CON-1029', 'BEL-MIX-CON-1029', 'Corporate', 'Conion Mixer BE 513', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 952, 1100, 1100, 1100, 5, 1100, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1220, '2017-08-26 05:10:50', '2017-09-19 05:20:03', 100, 'BEL-MIX-CON-1051', 'BEL-MIX-CON-1051', 'Corporate', 'Conion Mixer BE 713', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 390, 450, 450, 450, 5, 450, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(220, '2017-08-24 12:17:59', '2017-09-19 10:17:14', 100, 'BEL-MIX-PAN-1001', 'BEL-MIX-PAN-1001', 'Corporate', 'Panasonic Hand Held Immersion Blender MX GS1WSP', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2565, 2900, 2900, 2900, 15, 2900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(221, '2017-08-24 12:19:59', '2017-09-19 10:19:19', 100, 'BEL-MIX-PAN-1052', 'BEL-MIX-PAN-1052', 'Corporate', 'Panasonic Mixer Grinder MX AC210 (Blue)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6988, 7900, 7900, 7900, 100, 7900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(222, '2017-08-24 12:21:29', '2017-09-19 10:18:00', 100, 'BEL-MIX-PAN-1061', 'BEL-MIX-PAN-1061', 'Corporate', 'Panasonic Juicer MJ68M', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 4688, 5300, 5300, 5300, 50, 5300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(223, '2017-08-24 12:22:54', '2017-09-19 09:25:52', 100, 'BEL-MIX-PAN-1105', 'BEL-MIX-PAN-1105', 'Corporate', 'Panasonic Coffee Maker NC GF1WSH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2300, 2600, 2600, 2600, 25, 2600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(225, '2017-08-24 12:24:02', '2017-09-19 09:08:41', 100, 'BEL-MIX-PAN-1205', 'BEL-MIX-PAN-1205', 'Corporate', 'Panasonic Thermopot NC EH30P', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 4989, 5640, 5640, 5640, 50, 5640, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(227, '2017-08-24 12:25:23', '2017-09-19 10:19:55', 100, 'BEL-MIX-PAN-2101', 'BEL-MIX-PAN-2101', 'Corporate', 'Panasonic Mixer Grinder MX AC210 (White)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 5750, 6500, 6500, 6500, 50, 6500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1222, '2017-08-26 05:15:35', NULL, 100, 'BEL-MIX-PAN-2102', 'BEL-MIX-PAN-2102', 'Corporate', 'MX-AC210 (Blue)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6193, 7000, 7000, 7000, 50, 7000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(231, '2017-08-24 12:27:52', '2017-09-19 10:20:35', 100, 'BEL-MIX-PAN-4001', 'BEL-MIX-PAN-4001', 'Corporate', 'Panasonic Mixer Grinder MX AC400SWUA (Silver)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8315, 9400, 9400, 9400, 100, 9400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(233, '2017-08-24 12:29:10', '2017-09-19 10:20:16', 100, 'BEL-MIX-PAN-4002', 'BEL-MIX-PAN-4002', 'Corporate', 'Panasonic Mixer Grinder MX AC400SWUA (Blue)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8757, 9900, 9900, 9900, 100, 9900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(236, '2017-08-24 12:30:39', '2017-09-19 10:20:58', 100, 'BEL-MIX-PAN-5550', 'BEL-MIX-PAN-5550', 'Corporate', 'Panasonic Mixer Grinder MX AC555 (5 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10615, 12000, 12000, 12000, 100, 12000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(250, '2017-08-24 12:41:28', '2017-09-19 07:52:35', 100, 'BEL-MIX-PHL-1020', 'BEL-MIX-PHL-1020', 'Corporate', 'Philips Meat Mincer HR 2726', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 7873, 8900, 8900, 8900, 100, 8900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(251, '2017-08-24 12:42:49', '2017-09-19 09:26:15', 100, 'BEL-MIX-PHL-1030', 'BEL-MIX-PHL-1030', 'Corporate', 'Philips Coffee Maker HD 7447', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3538, 4000, 4000, 4000, 50, 4000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(261, '2017-08-24 12:53:08', '2017-09-19 07:39:02', 100, 'BEL-MIX-PHL-1031', 'BEL-MIX-PHL-1031', 'Corporate', 'Philips Coffee Maker HD7457 20', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3804, 0, 4300, 4300, 50, 4300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(262, '2017-08-24 12:55:19', '2017-09-19 07:53:54', 100, 'BEL-MIX-PHL-1071', 'BEL-MIX-PHL-1071', 'Corporate', 'Philips Mixer Grinder HL 1643 04 (3 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6635, 7500, 7500, 7500, 50, 7500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(265, '2017-08-24 13:00:06', '2017-09-19 07:54:52', 100, 'BEL-MIX-PHL-1072', 'BEL-MIX-PHL-1072', 'Corporate', 'Philips Mixer Grinder HL1643 06 (4 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8138, 9200, 9200, 9200, 100, 9200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(266, '2017-08-24 13:02:10', '2017-09-19 07:55:09', 100, 'BEL-MIX-PHL-1073', 'BEL-MIX-PHL-1073', 'Corporate', 'Philips Mixer Grinder HL7750 (3 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6900, 7800, 7800, 7800, 100, 7800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(267, '2017-08-24 13:03:36', NULL, 100, 'BEL-MIX-PHL-1083', 'BEL-MIX-PHL-1083', 'Corporate', 'HL-7720 (3 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6546, 7400, 7400, 7400, 50, 7400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(292, '2017-08-25 04:28:20', '2017-09-19 07:39:20', 100, 'BEL-MIX-PHL-1101', 'BEL-MIX-PHL-1101', 'Corporate', 'Philips Egg Beater HR 1459', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3089, 3492, 3492, 3492, 25, 3492, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(294, '2017-08-25 04:29:37', '2017-09-19 05:08:01', 100, 'BEL-MIX-SRP-1205', 'BEL-MIX-SRP-1205', 'Corporate', 'Sharp Thermopot KP A28S MN', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2789, 2990, 2990, 2990, 25, 2990, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1059, '2017-08-25 11:27:04', '2017-08-25 10:27:21', 100, 'BEL-MPL-CON-1026', 'BEL-MPL-CON-1026', 'Corporate', 'Multi-pan - 26 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 904, 1000, 1000, 1000, 5, 1000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1062, '2017-08-25 11:28:27', NULL, 100, 'BEL-MPL-CON-1030', 'BEL-MPL-CON-1030', 'Corporate', 'Multi-pan - 30 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1265, 1400, 1400, 1400, 10, 1400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1064, '2017-08-25 11:29:06', NULL, 100, 'BEL-MPL-CON-1032', 'BEL-MPL-CON-1032', 'Corporate', 'Multi-pan - 32 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1355, 1500, 1500, 1500, 10, 1500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1065, '2017-08-25 11:29:39', NULL, 100, 'BEL-MPL-CON-1034', 'BEL-MPL-CON-1034', 'Corporate', 'Multi-pan - 34 cm', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1446, 1600, 1600, 1600, 10, 1600, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1082, '2017-08-25 11:47:04', '2017-09-19 05:16:58', 100, 'BEL-MWO-CON-2001', 'BEL-MWO-CON-2001', 'Corporate', 'Conion Microwave Oven BG 20CTB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6193, 7000, 7000, 7000, 50, 7000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1083, '2017-08-25 11:47:47', '2017-09-19 04:34:55', 100, 'BEL-MWO-CON-2301', 'BEL-MWO-CON-2301', 'Corporate', 'Conion BG 23A3Q Microwave Oven', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6193, 7000, 7000, 7000, 50, 7000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1089, '2017-08-25 11:50:04', NULL, 100, 'BEL-MWO-CON-2305', 'BEL-MWO-CON-2305', 'Corporate', 'BC-23EBV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 7962, 9000, 9000, 9000, 100, 9000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1091, '2017-08-25 11:50:45', '2017-09-19 05:16:06', 100, 'BEL-MWO-CON-2504', 'BEL-MWO-CON-2504', 'Corporate', 'Conion Microwave Oven BC 25EBL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10173, 11500, 11500, 11500, 100, 11500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1094, '2017-08-25 11:51:19', '2017-09-19 04:32:27', 100, 'BEL-MWO-CON-2505', 'BEL-MWO-CON-2505', 'Corporate', 'Conion BCR 25EBL Microwave Oven', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10837, 12250, 12250, 12250, 100, 12250, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1096, '2017-08-25 11:52:30', '2017-09-19 04:31:51', 100, 'BEL-MWO-CON-2805', 'BEL-MWO-CON-2805', 'Corporate', 'Conion BC 28AHH Microwave Oven', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 11500, 13000, 13000, 13000, 150, 13000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1098, '2017-08-25 11:53:12', '2017-09-19 05:16:28', 100, 'BEL-MWO-CON-3005', 'BEL-MWO-CON-3005', 'Corporate', 'Conion Microwave Oven BCR 30AHM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 12827, 14500, 14500, 14500, 150, 14500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1101, '2017-08-25 11:53:55', '2017-09-19 08:41:29', 100, 'BEL-MWO-LGE-2001', 'BEL-MWO-LGE-2001', 'Corporate', 'LG Microwave Oven MS2041C', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8091, 8500, 8500, 8500, 25, 8500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1104, '2017-08-25 11:54:53', '2017-09-19 08:40:28', 100, 'BEL-MWO-LGE-2301', 'BEL-MWO-LGE-2301', 'Corporate', 'LG Microwave Oven MH6342BSM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 11804, 12400, 12400, 12400, 25, 12400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1107, '2017-08-25 11:55:30', '2017-09-19 08:42:07', 100, 'BEL-MWO-LGE-2302', 'BEL-MWO-LGE-2302', 'Corporate', 'LG Microwave Oven MS2342DSM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9995, 10500, 10500, 10500, 25, 10500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1109, '2017-08-25 11:56:00', '2017-09-19 08:41:49', 100, 'BEL-MWO-LGE-2303', 'BEL-MWO-LGE-2303', 'Corporate', 'LG Microwave Oven MS2342D', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9234, 9700, 9700, 9700, 25, 9700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1111, '2017-08-25 11:56:35', '2017-09-19 08:42:26', 100, 'BEL-MWO-LGE-2304', 'BEL-MWO-LGE-2304', 'Corporate', 'LG Microwave Oven MS2343DAR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9044, 9500, 9500, 9500, 25, 9500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1114, '2017-08-25 11:57:03', NULL, 100, 'BEL-MWO-LGE-2305', 'BEL-MWO-LGE-2305', 'Corporate', 'MH6323DAR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9995, 10500, 10500, 10500, 25, 10500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1116, '2017-08-25 11:57:54', '2017-09-19 08:40:00', 100, 'BEL-MWO-LGE-2815', 'BEL-MWO-LGE-2815', 'Corporate', 'LG Microwave Oven MC7889DR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 19020, 19980, 19980, 19980, 100, 19980, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1118, '2017-08-25 11:58:49', '2017-09-19 08:41:08', 100, 'BEL-MWO-LGE-3001', 'BEL-MWO-LGE-3001', 'Corporate', 'LG Microwave Oven MH7044SMS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 12375, 13000, 13000, 13000, 50, 13000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1120, '2017-08-25 11:59:33', NULL, 100, 'BEL-MWO-LGE-3201', 'BEL-MWO-LGE-3201', 'Corporate', 'MJ-3284CB (Solar)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25035, 26300, 26300, 26300, 100, 26300, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1123, '2017-08-25 12:00:51', '2017-09-19 07:22:22', 100, 'BEL-MWO-MID-2001', 'BEL-MWO-MID-2001', 'Corporate', 'Midea Microwave Oven MM720 CXM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 5152, 5700, 5700, 5700, 50, 5700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1125, '2017-08-25 12:01:47', '2017-09-19 07:21:51', 100, 'BEL-MWO-MID-2305', 'BEL-MWO-MID-2305', 'Corporate', 'Midea Microwave Oven AS 823EK7', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8948, 9900, 9900, 9900, 100, 9900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1128, '2017-08-25 12:02:33', '2017-09-19 07:22:07', 100, 'BEL-MWO-MID-2505', 'BEL-MWO-MID-2505', 'Corporate', 'Midea Microwave Oven AW 925E4F', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10755, 11900, 11900, 11900, 100, 11900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1130, '2017-08-25 12:03:06', '2017-09-19 07:21:34', 100, 'BEL-MWO-MID-2805', 'BEL-MWO-MID-2805', 'Corporate', 'Midea Microwave Oven AC 928AHH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 12021, 13300, 13300, 13300, 100, 13300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1133, '2017-08-25 12:03:58', '2017-09-19 07:22:44', 100, 'BEL-MWO-MID-3605', 'BEL-MWO-MID-3605', 'Corporate', 'Midea Microwave Oven TC 936T4S', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25308, 28000, 28000, 28000, 250, 28000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1137, '2017-08-25 12:04:59', '2017-09-19 10:30:04', 100, 'BEL-MWO-PAN-2020', 'BEL-MWO-PAN-2020', 'Corporate', 'Panasonic Microwave Oven NN ST253', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 7615, 8000, 8000, 8000, 25, 8000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1140, '2017-08-25 12:05:39', '2017-09-19 10:25:26', 100, 'BEL-MWO-PAN-2305', 'BEL-MWO-PAN-2305', 'Corporate', 'Panasonic Microwave Oven NN GD371', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13708, 14400, 14400, 14400, 50, 13708, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1144, '2017-08-25 12:06:59', '2017-09-19 10:25:02', 100, 'BEL-MWO-PAN-2306', 'BEL-MWO-PAN-2306', 'Corporate', 'Panasonic Microwave Oven NN DF383 BYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21894, 23000, 23000, 23000, 100, 23000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1147, '2017-08-25 12:07:43', '2017-09-19 10:29:06', 100, 'BEL-MWO-PAN-2501', 'BEL-MWO-PAN-2501', 'Corporate', 'Panasonic Microwave Oven NN SM332 MYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8091, 8500, 8500, 8500, 25, 8500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1148, '2017-08-25 12:08:31', '2017-09-19 10:26:56', 100, 'BEL-MWO-PAN-2502', 'BEL-MWO-PAN-2502', 'Corporate', 'Panasonic Microwave Oven NN GT353', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13517, 14200, 14200, 14200, 50, 14200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1150, '2017-08-25 12:09:11', '2017-09-19 10:30:40', 100, 'BEL-MWO-PAN-2505', 'BEL-MWO-PAN-2505', 'Corporate', 'Panasonic Microwave Oven NN ST342 MYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9900, 10400, 10400, 10400, 25, 10400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1151, '2017-08-25 12:09:52', '2017-09-19 10:27:52', 100, 'BEL-MWO-PAN-2506', 'BEL-MWO-PAN-2506', 'Corporate', 'Panasonic Microwave Oven NN GT353 MYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13517, 14200, 14200, 14200, 50, 14200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1153, '2017-08-25 12:10:32', '2017-09-19 10:28:39', 100, 'BEL-MWO-PAN-2704', 'BEL-MWO-PAN-2704', 'Corporate', 'Panasonic Microwave Oven NN SF564WYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 16659, 17500, 17500, 17500, 75, 17500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1156, '2017-08-25 12:11:12', '2017-09-19 10:26:10', 100, 'BEL-MWO-PAN-2705', 'BEL-MWO-PAN-2705', 'Corporate', 'Panasonic Microwave Oven NN GF560MYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 17268, 18140, 18140, 18140, 75, 18140, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1158, '2017-08-25 12:11:48', '2017-09-19 10:28:18', 100, 'BEL-MWO-PAN-2706', 'BEL-MWO-PAN-2706', 'Corporate', 'Panasonic Microwave Oven NN SF559', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 15231, 16000, 16000, 16000, 75, 16000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1160, '2017-08-25 12:12:31', '2017-09-19 10:24:36', 100, 'BEL-MWO-PAN-2707', 'BEL-MWO-PAN-2707', 'Corporate', 'Panasonic Microwave Oven NN CF770', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29415, 30900, 30900, 30900, 100, 30900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1162, '2017-08-25 12:14:59', '2017-09-19 10:26:33', 100, 'BEL-MWO-PAN-2708', 'BEL-MWO-PAN-2708', 'Corporate', 'Panasonic Microwave Oven NN GF574MYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 18563, 19500, 19500, 19500, 100, 19500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1163, '2017-08-25 12:15:33', '2017-09-19 10:25:49', 100, 'BEL-MWO-PAN-3110', 'BEL-MWO-PAN-3110', 'Corporate', 'Panasonic Microwave Oven NN GD692SYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 20942, 22000, 22000, 22000, 100, 22000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live');
INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xvatpct`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(1165, '2017-08-25 12:16:28', '2017-09-19 10:37:50', 100, 'BEL-MWO-PAN-3205', 'BEL-MWO-PAN-3205', 'Corporate', 'Panasonic Microwave Oven NN ST651', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 16183, 17000, 17000, 17000, 50, 17000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1166, '2017-08-25 12:17:13', '2017-09-19 08:43:50', 100, 'BEL-MWO-SAM-2005', 'BEL-MWO-SAM-2005', 'Corporate', 'Samsung Microwave Oven ME731KD', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 7854, 8250, 8250, 8250, 25, 8250, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1168, '2017-08-25 12:18:00', '2017-09-19 08:44:14', 100, 'BEL-MWO-SAM-2010', 'BEL-MWO-SAM-2010', 'Corporate', 'Samsung Microwave Oven ME73MD XST', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8815, 9260, 9260, 9260, 25, 9260, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1170, '2017-08-25 12:19:04', '2017-09-19 08:43:30', 100, 'BEL-MWO-SAM-2305', 'BEL-MWO-SAM-2305', 'Corporate', 'Samsung Microwave Oven GE82V BBH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10419, 10945, 10945, 10945, 30, 10945, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1171, '2017-08-25 12:19:40', NULL, 100, 'BEL-MWO-SAM-2810', 'BEL-MWO-SAM-2810', 'Corporate', 'GS109FD-SH/XST', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 14798, 15545, 15545, 15545, 50, 15545, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1174, '2017-08-25 12:20:26', '2017-09-19 04:41:18', 100, 'BEL-MWO-SRP-1010', 'BEL-MWO-SRP-1010', 'Corporate', 'Sharp Electric Oven L 19', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6283, 6600, 6600, 6600, 25, 6600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1177, '2017-08-25 12:21:01', '2017-09-19 04:45:10', 100, 'BEL-MWO-SRP-2020', 'BEL-MWO-SRP-2020', 'Corporate', 'Sharp Microwave Oven R 22AO SM V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8939, 9390, 9390, 9390, 25, 9390, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1182, '2017-08-25 12:22:19', NULL, 100, 'BEL-MWO-SRP-2023', 'BEL-MWO-SRP-2023', 'Corporate', 'R-22AD(SM)V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10138, 10650, 10650, 10650, 30, 10650, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1183, '2017-08-25 12:22:45', NULL, 100, 'BEL-MWO-SRP-2501', 'BEL-MWO-SRP-2501', 'Corporate', '72A1(SM)V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13327, 14000, 14000, 14000, 30, 14000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1187, '2017-08-25 12:23:29', NULL, 100, 'BEL-MWO-SRP-2502', 'BEL-MWO-SRP-2502', 'Corporate', 'R-84A0(ST)V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 17040, 17900, 17900, 17900, 50, 17900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1189, '2017-08-25 12:24:03', '2017-09-19 04:46:56', 100, 'BEL-MWO-SRP-2801', 'BEL-MWO-SRP-2801', 'Corporate', 'Sharp Microwave Oven R 92AO ST V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 19990, 21000, 21000, 21000, 100, 21000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1192, '2017-08-25 12:24:38', '2017-09-19 04:45:53', 100, 'BEL-MWO-SRP-3305', 'BEL-MWO-SRP-3305', 'Corporate', 'Sharp Microwave Oven R 360J', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 14244, 14964, 14964, 14964, 50, 14964, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1194, '2017-08-25 12:25:23', '2017-09-19 04:46:18', 100, 'BEL-MWO-SRP-3401', 'BEL-MWO-SRP-3401', 'Corporate', 'Sharp Microwave Oven R 75MTS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13327, 14000, 14000, 14000, 50, 14000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1195, '2017-08-25 12:25:55', '2017-09-19 04:46:51', 100, 'BEL-MWO-SRP-3402', 'BEL-MWO-SRP-3402', 'Corporate', 'Sharp Microwave Oven R 77ARST', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 17135, 18000, 18000, 18000, 50, 18000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1197, '2017-08-25 12:26:33', '2017-09-19 04:47:19', 100, 'BEL-MWO-SRP-4200', 'BEL-MWO-SRP-4200', 'Corporate', 'Sharp Microwave Oven R 94AO ST V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28081, 29500, 29500, 29500, 100, 29500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1200, '2017-08-25 12:27:31', NULL, 100, 'BEL-MWO-TOS-2301', 'BEL-MWO-TOS-2301', 'Corporate', 'ER-G23SC(S)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10566, 11100, 11100, 11100, 25, 11100, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1221, '2017-08-26 05:13:47', '2017-09-19 05:21:27', 100, 'BEL-MWO-WHL-2001', 'BEL-MWO-WHL-2001', 'Corporate', 'Whirlpool Magic Cook MW20 Classic (Solo) Microwave Oven', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 7140, 7900, 7900, 7900, 50, 7900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(196, '2017-08-24 11:55:11', '2017-09-19 05:21:45', 100, 'BEL-MWO-WHL-2002', 'BEL-MWO-WHL-2002', 'Corporate', 'Whirlpool Magic Cook MW20 Deluxe (Grill) Microwave Oven', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8135, 9000, 9000, 9000, 50, 9000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(200, '2017-08-24 11:57:46', '2017-09-19 05:22:24', 100, 'BEL-MWO-WHL-2501', 'BEL-MWO-WHL-2501', 'Corporate', 'Whirlpool Microwave Oven MW25BG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9942, 11000, 11000, 11000, 100, 11000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(205, '2017-08-24 12:00:41', '2017-09-19 05:22:05', 100, 'BEL-MWO-WHL-2502', 'BEL-MWO-WHL-2502', 'Corporate', 'Whirlpool Microwave Oven MW25BC', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13196, 14600, 14600, 14600, 100, 14600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(208, '2017-08-24 12:03:07', '2017-09-19 05:19:23', 100, 'BEL-MWO-WHL-2503', 'BEL-MWO-WHL-2503', 'Corporate', 'Whirlpool Jet Crisp GT 288BL Convection Microwave Oven', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 17173, 19000, 19000, 19000, 200, 19000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(210, '2017-08-24 12:04:58', '2017-09-19 05:23:04', 100, 'BEL-MWO-WHL-3000', 'BEL-MWO-WHL-3000', 'Corporate', 'Whirlpool Microwave Oven MWO611SL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 11298, 12500, 12500, 12500, 200, 12500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(211, '2017-08-24 12:06:20', '2017-09-19 05:22:44', 100, 'BEL-MWO-WHL-3001', 'BEL-MWO-WHL-3001', 'Corporate', 'Whirlpool Microwave Oven MW30BC', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 14371, 15900, 15900, 15900, 100, 15900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(213, '2017-08-24 12:07:40', '2017-09-19 05:21:08', 100, 'BEL-MWO-WHL-3002', 'BEL-MWO-WHL-3002', 'Corporate', 'Whirlpool Jet Crisp JQ 280SL Convection Microwave Oven', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24404, 27000, 27000, 27000, 250, 27000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(259, '2017-08-24 12:50:48', NULL, 100, 'BEL-RAC-CON-1001', 'BEL-RAC-CON-1001', 'Corporate', 'FJ - 12GW / 1214ASL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 27404, 30000, 30000, 30000, 250, 30000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(260, '2017-08-24 12:52:33', NULL, 100, 'BEL-RAC-CON-1011', 'BEL-RAC-CON-1011', 'Corporate', 'BE-12CR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32884, 36000, 36000, 36000, 325, 36000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(269, '2017-08-25 04:13:05', '2017-09-18 08:42:02', 100, 'BEL-RAC-CON-1013', 'BEL-RAC-CON-1013', 'Corporate', 'Conion 1 Ton Air Conditioner BE 12CPBG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38274, 41900, 41900, 41900, 400, 41900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(270, '2017-08-25 04:16:17', '2017-09-18 08:42:48', 100, 'BEL-RAC-CON-1014', 'BEL-RAC-CON-1014', 'Corporate', 'Conion 1 Ton Hot & Cold Air Conditioner BE 12CHCW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 39736, 43500, 43500, 43500, 400, 43500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(273, '2017-08-25 04:17:40', NULL, 100, 'BEL-RAC-CON-1501', 'BEL-RAC-CON-1501', 'Corporate', 'FJ - 18GW / 1814ASL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 41106, 45000, 45000, 45000, 400, 45000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(274, '2017-08-25 04:18:33', NULL, 100, 'BEL-RAC-CON-1511', 'BEL-RAC-CON-1511', 'Corporate', 'BE-18CR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 43846, 48000, 48000, 48000, 450, 48000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(278, '2017-08-25 04:21:18', '2017-09-18 08:44:39', 100, 'BEL-RAC-CON-1512', 'BEL-RAC-CON-1512', 'Corporate', 'Conion 1.5 Ton Air Conditioner BE 18CBFR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 49236, 53900, 53900, 53900, 500, 53900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(280, '2017-08-25 04:22:26', NULL, 100, 'BEL-RAC-CON-1513', 'BEL-RAC-CON-1513', 'Corporate', 'BE-18CPBG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 51063, 55900, 55900, 55900, 500, 55900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(282, '2017-08-25 04:23:18', '2017-09-18 08:45:19', 100, 'BEL-RAC-CON-1514', 'BEL-RAC-CON-1514', 'Corporate', 'Conion 1.5 Ton Hot & Cold Air Conditioner BE 18CHCW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 52524, 57500, 57500, 57500, 500, 57500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(284, '2017-08-25 04:24:16', NULL, 100, 'BEL-RAC-CON-2001', 'BEL-RAC-CON-2001', 'Corporate', 'FJ - 24GW / 2414ASL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45673, 50000, 50000, 50000, 450, 50000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(287, '2017-08-25 04:25:29', NULL, 100, 'BEL-RAC-CON-2011', 'BEL-RAC-CON-2011', 'Corporate', 'BE-24CR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 56634, 62000, 62000, 62000, 500, 62000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(290, '2017-08-25 04:26:56', '2017-09-18 08:46:37', 100, 'BEL-RAC-CON-2012', 'BEL-RAC-CON-2012', 'Corporate', 'Conion 2 Ton Air Conditioner BE 24CBFR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 61111, 66900, 66900, 66900, 600, 66900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(291, '2017-08-25 04:28:18', '2017-09-18 08:47:12', 100, 'BEL-RAC-CON-2013', 'BEL-RAC-CON-2013', 'Corporate', 'Conion 2 Ton Air Conditioner BE 24CPBGConion 2 Ton Air Conditioner BE 24CPBG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 62938, 68900, 68900, 68900, 600, 68900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(293, '2017-08-25 04:29:04', '2017-09-18 08:49:27', 100, 'BEL-RAC-CON-2014', 'BEL-RAC-CON-2014', 'Corporate', 'Conion 2 Ton Hot & Cold Air Conditioner BE 24CHCW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 64399, 70500, 70500, 70500, 600, 70500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(295, '2017-08-25 04:30:01', '2017-09-19 04:39:12', 100, 'BEL-RAC-CON-5001', 'BEL-RAC-CON-5001', 'Corporate', 'Conion Cassette Air Conditioner MCD 60CR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 141586, 155000, 155000, 155000, 1400, 155000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(296, '2017-08-25 04:31:01', '2017-09-19 04:40:00', 100, 'BEL-RAC-CON-5002', 'BEL-RAC-CON-5002', 'Corporate', 'Conion Ceiling Air Conditioner MUE 60CR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 140673, 154000, 154000, 154000, 1400, 154000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(307, '2017-08-25 04:35:54', NULL, 100, 'BEL-RAC-GEN-1006', 'BEL-RAC-GEN-1006', 'Corporate', 'AXGT18A Window', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 55209, 60440, 60440, 60440, 500, 60440, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(310, '2017-08-25 04:37:07', '2017-09-19 08:08:14', 100, 'BEL-RAC-GEN-2001', 'BEL-RAC-GEN-2001', 'Corporate', 'General 1 Ton Split Air Conditioner ASG 12 AGC', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 53803, 58900, 58900, 58900, 500, 58900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(314, '2017-08-25 04:39:58', NULL, 100, 'BEL-RAC-GEN-2002', 'BEL-RAC-GEN-2002', 'Corporate', 'AUG - 25AB - CASSETTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 105048, 115000, 115000, 115000, 1000, 115000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(316, '2017-08-25 04:41:02', '2017-09-19 08:08:34', 100, 'BEL-RAC-GEN-2011', 'BEL-RAC-GEN-2011', 'Corporate', 'General 1.5 Ton Split Air Conditioner ASG 18 AET', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 77553, 84900, 84900, 84900, 800, 84900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(318, '2017-08-25 04:42:23', NULL, 100, 'BEL-RAC-GEN-2015', 'BEL-RAC-GEN-2015', 'Corporate', 'AXGT-24A Window', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 63869, 69920, 69920, 69920, 600, 69920, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(321, '2017-08-25 04:43:25', '2017-09-19 08:08:51', 100, 'BEL-RAC-GEN-2021', 'BEL-RAC-GEN-2021', 'Corporate', 'General 2 Ton Split Air Conditioner ASG 24 AET', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 83034, 90900, 90900, 90900, 800, 90900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(325, '2017-08-25 04:46:35', NULL, 100, 'BEL-RAC-GEN-2501', 'BEL-RAC-GEN-2501', 'Corporate', 'ASG-30AB WALL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 118750, 130000, 130000, 130000, 1000, 130000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(328, '2017-08-25 04:48:32', NULL, 100, 'BEL-RAC-GEN-2502', 'BEL-RAC-GEN-2502', 'Corporate', 'AUG - 30AB - CASSETTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 134279, 147000, 147000, 147000, 1000, 147000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(334, '2017-08-25 04:51:12', NULL, 100, 'BEL-RAC-GEN-3001', 'BEL-RAC-GEN-3001', 'Corporate', 'ABG - 36AB - CEILING', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 168899, 184900, 184900, 184900, 1500, 184900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(338, '2017-08-25 04:53:00', NULL, 100, 'BEL-RAC-GEN-3002', 'BEL-RAC-GEN-3002', 'Corporate', 'AUG - 36AB - CASSETTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 164332, 179900, 179900, 179900, 1500, 179900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(341, '2017-08-25 04:54:48', NULL, 100, 'BEL-RAC-GEN-4001', 'BEL-RAC-GEN-4001', 'Corporate', 'AUG - 45AB - CASSETTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 177668, 194500, 194500, 194500, 1500, 194500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(343, '2017-08-25 04:55:49', NULL, 100, 'BEL-RAC-GEN-4002', 'BEL-RAC-GEN-4002', 'Corporate', 'ABG - 45AB - CEILING', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 184519, 202000, 202000, 202000, 1500, 202000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(347, '2017-08-25 04:57:52', NULL, 100, 'BEL-RAC-GEN-5001', 'BEL-RAC-GEN-5001', 'Corporate', 'ABG - 54AB - CEILING', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 219231, 240000, 240000, 240000, 2000, 240000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(350, '2017-08-25 04:58:59', NULL, 100, 'BEL-RAC-GEN-5002', 'BEL-RAC-GEN-5002', 'Corporate', 'AUG - 54AB - CASSETTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 220144, 241000, 241000, 241000, 2000, 241000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(364, '2017-08-25 05:04:30', '2017-09-19 04:05:14', 100, 'BEL-RAC-HIT-1301', 'BEL-RAC-HIT-1301', 'Corporate', 'Hitachi 1 Ton Split Air Conditioner RAS F13CF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 50241, 55000, 55000, 55000, 500, 55000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(368, '2017-08-25 05:05:42', '2017-09-17 08:02:46', 100, 'BEL-RAC-HIT-1501', 'BEL-RAC-HIT-1501', 'Corporate', 'Hitachi 1.5 Ton Split Air Conditioner RAS F18CF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 73077, 80000, 80000, 80000, 700, 80000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(373, '2017-08-25 05:07:15', '2017-09-19 04:05:54', 100, 'BEL-RAC-HIT-2001', 'BEL-RAC-HIT-2001', 'Corporate', 'Hitachi 2 Ton Split Air Conditioner RAS F24CF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79471, 87000, 87000, 87000, 700, 87000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(377, '2017-08-25 05:09:01', NULL, 100, 'BEL-RAC-LGE-1010', 'BEL-RAC-LGE-1010', 'Corporate', 'HSC-096QDA6', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 39279, 43000, 43000, 43000, 300, 43000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(379, '2017-08-25 05:09:50', '2017-09-17 07:49:43', 100, 'BEL-RAC-LGE-1101', 'BEL-RAC-LGE-1101', 'Corporate', 'LG 1 Ton Split Air Conditioner HSC 1264SA4', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 47500, 52000, 52000, 52000, 500, 52000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(381, '2017-08-25 05:11:38', '2017-09-19 08:05:15', 100, 'BEL-RAC-LGE-1501', 'BEL-RAC-LGE-1501', 'Corporate', 'LG 1.5 Ton Split Air Conditioner HSC 1865SA4', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 62116, 68000, 68000, 68000, 500, 68000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(383, '2017-08-25 05:13:08', NULL, 100, 'BEL-RAC-LGE-1502', 'BEL-RAC-LGE-1502', 'Corporate', 'P186SQ (Inverter)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 68418, 74900, 74900, 74900, 500, 74900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(385, '2017-08-25 05:14:04', '2017-09-19 08:05:48', 100, 'BEL-RAC-LGE-2001', 'BEL-RAC-LGE-2001', 'Corporate', 'LG 2 Ton Split Air Conditioner HSC 2465SAA1', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 72620, 79500, 79500, 79500, 700, 79500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(388, '2017-08-25 05:16:28', '2017-09-19 07:24:32', 100, 'BEL-RAC-MID-1001', 'BEL-RAC-MID-1001', 'Corporate', 'Midea MWF12 Portable 1 Ton Air Conditioner', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36447, 39900, 39900, 39900, 300, 39900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(390, '2017-08-25 05:17:53', NULL, 100, 'BEL-RAC-MID-1011', 'BEL-RAC-MID-1011', 'Corporate', 'MWS-24CM - Window', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 47464, 51960, 51960, 51960, 400, 51960, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(393, '2017-08-25 05:19:01', NULL, 100, 'BEL-RAC-MID-1501', 'BEL-RAC-MID-1501', 'Corporate', 'MWS-18CM - Window', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38329, 41960, 41960, 41960, 300, 41960, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(396, '2017-08-25 05:20:29', '2017-09-19 07:23:09', 100, 'BEL-RAC-MID-2001', 'BEL-RAC-MID-2001', 'Corporate', 'Midea MSM12 1 Ton Air Conditioner', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 35534, 38900, 38900, 38900, 300, 38900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(401, '2017-08-25 05:23:46', '2017-09-19 07:24:01', 100, 'BEL-RAC-MID-2011', 'BEL-RAC-MID-2011', 'Corporate', 'Midea MSM18 1.5 Ton Air Conditioner', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45582, 49900, 49900, 49900, 400, 49900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(403, '2017-08-25 05:24:39', '2017-09-19 07:24:15', 100, 'BEL-RAC-MID-2021', 'BEL-RAC-MID-2021', 'Corporate', 'Midea MSM24 2 Ton Air Conditioner', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 57548, 63000, 63000, 63000, 500, 63000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(407, '2017-08-25 05:25:36', NULL, 100, 'BEL-RAC-MID-3001', 'BEL-RAC-MID-3001', 'Corporate', 'MUB-36CR - CASSETTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 119664, 131000, 131000, 131000, 1000, 131000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(410, '2017-08-25 05:26:27', NULL, 100, 'BEL-RAC-MID-3002', 'BEL-RAC-MID-3002', 'Corporate', 'MSR-36CR - CEILLING', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 117836, 129000, 129000, 129000, 1000, 129000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(414, '2017-08-25 05:27:30', NULL, 100, 'BEL-RAC-MID-4001', 'BEL-RAC-MID-4001', 'Corporate', 'MUB-48CR - CASSETTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 146428, 160300, 160300, 160300, 1000, 160300, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(423, '2017-08-25 05:34:14', NULL, 100, 'BEL-RAC-MID-4002', 'BEL-RAC-MID-4002', 'Corporate', 'MSR-48CR - CEILLING', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 144601, 158300, 158300, 158300, 1000, 158300, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(432, '2017-08-25 05:40:55', NULL, 100, 'BEL-RAC-MID-5001', 'BEL-RAC-MID-5001', 'Corporate', 'MUB-60CR - CASSETTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 151086, 165400, 165400, 165400, 1500, 165400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(455, '2017-08-25 05:51:23', NULL, 100, 'BEL-RAC-MID-5002', 'BEL-RAC-MID-5002', 'Corporate', 'MSR-60CR/ CUA-60HRI  - CEILLING', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 149168, 163300, 163300, 163300, 1500, 163300, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(458, '2017-08-25 05:52:17', NULL, 100, 'BEL-RAC-MID-5003', 'BEL-RAC-MID-5003', 'Corporate', 'MTB-60HW (Duct Type)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 166250, 182000, 182000, 182000, 1500, 182000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(461, '2017-08-25 05:53:41', '2017-09-19 08:59:55', 100, 'BEL-RAC-PAN-1001', 'BEL-RAC-PAN-1001', 'Corporate', 'Panasonic 1 Ton Split Air Conditioner CS PS12QKH Inverter', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 75082, 80500, 80500, 80500, 500, 80500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(464, '2017-08-25 05:54:36', NULL, 100, 'BEL-RAC-PAN-1015', 'BEL-RAC-PAN-1015', 'Corporate', 'CS-PC09QKH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 44769, 48000, 48000, 48000, 300, 48000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(467, '2017-08-25 05:56:00', '2017-09-19 09:00:23', 100, 'BEL-RAC-PAN-1501', 'BEL-RAC-PAN-1501', 'Corporate', 'Panasonic 1.5 Ton Split Air Conditioner CS C18PKH DX', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 76201, 81700, 81700, 81700, 500, 81700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(469, '2017-08-25 05:57:00', '2017-09-19 09:01:30', 100, 'BEL-RAC-PAN-1502', 'BEL-RAC-PAN-1502', 'Corporate', 'Panasonic 1.5 Ton Split Air Conditioner CS S18PKH Inverter', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 94668, 101500, 101500, 101500, 700, 101500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(471, '2017-08-25 05:58:05', '2017-09-19 09:02:12', 100, 'BEL-RAC-PAN-2001', 'BEL-RAC-PAN-2001', 'Corporate', 'Panasonic 2 Ton Split Air Conditioner CS C24PKH DX', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 85808, 92000, 92000, 92000, 500, 92000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(474, '2017-08-25 05:59:24', '2017-09-19 09:02:37', 100, 'BEL-RAC-PAN-2002', 'BEL-RAC-PAN-2002', 'Corporate', 'Panasonic 2 Ton Split Air Conditioner CS S24PKH Inverter', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 105394, 113000, 113000, 113000, 700, 113000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(480, '2017-08-25 06:01:40', NULL, 100, 'BEL-RAC-SRP-1010', 'BEL-RAC-SRP-1010', 'Corporate', 'AU-A9PEV (0.75 Ton)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38240, 41000, 41000, 41000, 250, 41000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(482, '2017-08-25 06:02:28', '2017-09-19 04:35:38', 100, 'BEL-RAC-SRP-1101', 'BEL-RAC-SRP-1101', 'Corporate', 'Sharp 1 Ton Split Air Conditioner AH A12PEV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 44676, 47900, 47900, 47900, 300, 47900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(484, '2017-08-25 06:03:21', '2017-09-19 04:36:01', 100, 'BEL-RAC-SRP-1110', 'BEL-RAC-SRP-1110', 'Corporate', 'Sharp 1.1 Ton J Tech Inverter Air Conditioner AH XP13SHV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 59599, 63900, 63900, 63900, 400, 63900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(486, '2017-08-25 06:04:13', '2017-09-19 04:37:19', 100, 'BEL-RAC-SRP-1501', 'BEL-RAC-SRP-1501', 'Corporate', 'Sharp 1.5 Ton Split Air Conditioner AH A18SEV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 58667, 62900, 62900, 62900, 400, 62900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(490, '2017-08-25 06:05:06', '2017-09-19 04:37:00', 100, 'BEL-RAC-SRP-1502', 'BEL-RAC-SRP-1502', 'Corporate', 'Sharp 1.5 Ton J Tech Inverter Air Conditioner AH XP18SHV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 81144, 87000, 87000, 87000, 500, 87000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(493, '2017-08-25 06:05:59', '2017-09-19 04:38:24', 100, 'BEL-RAC-SRP-2001', 'BEL-RAC-SRP-2001', 'Corporate', 'Sharp 2 Ton Split Air Conditioner AH A24SEV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 71724, 76900, 76900, 76900, 500, 76900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(496, '2017-08-25 06:06:59', '2017-09-19 04:38:00', 100, 'BEL-RAC-SRP-2002', 'BEL-RAC-SRP-2002', 'Corporate', 'Sharp 2 Ton J Tech Inverter Air Conditioner AH XP24SHV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 93176, 99900, 99900, 99900, 700, 99900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(510, '2017-08-25 06:13:48', '2017-09-19 05:14:09', 100, 'BEL-RAC-WHL-1101', 'BEL-RAC-WHL-1101', 'Corporate', 'Whirlpool 1 Ton Split Air Conditioner SPOW 212', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 40852, 43800, 43800, 43800, 300, 43800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(562, '2017-08-25 06:35:19', '2017-09-19 05:13:38', 100, 'BEL-RAC-WHL-1102', 'BEL-RAC-WHL-1102', 'Corporate', 'Whirlpool 1 Ton Hot & Cold Inverter Air Conditioner SPIW 412L', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 49339, 52900, 52900, 52900, 300, 52900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(566, '2017-08-25 06:36:12', '2017-09-19 05:18:26', 100, 'BEL-RAC-WHL-1103', 'BEL-RAC-WHL-1103', 'Corporate', 'Whirlpool Fantasia 1 Ton Air Conditioner SPOW212W', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 43743, 46900, 46900, 46900, 300, 46900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(570, '2017-08-25 06:37:07', '2017-09-19 05:15:06', 100, 'BEL-RAC-WHL-1501', 'BEL-RAC-WHL-1501', 'Corporate', 'Whirlpool 1.5 Ton Split Air Conditioner SPOW 218 3', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 53071, 56900, 56900, 56900, 400, 56900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(575, '2017-08-25 06:38:23', '2017-09-19 05:14:30', 100, 'BEL-RAC-WHL-1502', 'BEL-RAC-WHL-1502', 'Corporate', 'Whirlpool 1.5 Ton Hot & Cold Inverter Air Conditioner SPIW 418', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 67993, 72900, 72900, 72900, 500, 72900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(580, '2017-08-25 06:39:24', '2017-09-19 05:18:44', 100, 'BEL-RAC-WHL-1503', 'BEL-RAC-WHL-1503', 'Corporate', 'Whirlpool Fantasia 1.5 Ton Air Conditioner SPOW 218 Red', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 59599, 63900, 63900, 63900, 400, 63900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(583, '2017-08-25 06:40:13', '2017-09-19 05:15:34', 100, 'BEL-RAC-WHL-2001', 'BEL-RAC-WHL-2001', 'Corporate', 'Whirlpool 2 Ton Split Air Conditioner SPOW 224 3', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 61464, 65900, 65900, 65900, 400, 65900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(586, '2017-08-25 06:41:04', '2017-09-19 05:15:06', 100, 'BEL-RAC-WHL-2002', 'BEL-RAC-WHL-2002', 'Corporate', 'Whirlpool 2 Ton Hot & Cold Inverter Air Conditioner SPIW 422', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 80118, 85900, 85900, 85900, 500, 85900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(589, '2017-08-25 06:41:44', '2017-09-19 05:19:03', 100, 'BEL-RAC-WHL-2003', 'BEL-RAC-WHL-2003', 'Corporate', 'Whirlpool Fantasia 2 Ton Air Conditioner SPOW224W', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 69858, 74900, 74900, 74900, 500, 74900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1066, '2017-08-25 11:30:13', '2017-09-19 04:44:59', 100, 'BEL-RCO-CON-1011', 'BEL-RCO-CON-1011', 'Corporate', 'Conion Curry Cooker BE 1580RB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 642, 710, 710, 710, 5, 710, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(189, '2017-08-24 11:38:06', '2017-09-19 04:45:53', 100, 'BEL-RCO-CON-1012', 'BEL-RCO-CON-1012', 'Corporate', 'Conion Curry Cooker BE 1590SB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 685, 758, 758, 758, 5, 758, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(190, '2017-08-24 11:40:08', '2017-09-19 07:33:47', 100, 'BEL-RCO-CON-1013', 'BEL-RCO-CON-1013', 'Corporate', 'Conion Rice Cooker BE 18403ATMS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 698, 806, 806, 806, 5, 806, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(191, '2017-08-24 11:42:19', '2017-09-19 07:35:55', 100, 'BEL-RCO-CON-1014', 'BEL-RCO-CON-1014', 'Corporate', 'Conion Rice Cooker BE 223AGP', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 827, 956, 956, 956, 5, 956, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(192, '2017-08-24 11:44:23', '2017-09-19 07:33:14', 100, 'BEL-RCO-CON-1015', 'BEL-RCO-CON-1015', 'Corporate', 'Conion Rice Cooker BE 183A2BS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 825, 954, 954, 954, 5, 954, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(193, '2017-08-24 11:45:46', '2017-09-19 04:46:30', 100, 'BEL-RCO-CON-1016', 'BEL-RCO-CON-1016', 'Corporate', 'Conion Curry Cooker BE 2090SB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 815, 902, 902, 902, 5, 902, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(194, '2017-08-24 11:47:07', '2017-09-19 07:39:22', 100, 'BEL-RCO-CON-1017', 'BEL-RCO-CON-1017', 'Corporate', 'Conion Rice Cooker BE 283ABS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 824, 952, 952, 952, 5, 952, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(197, '2017-08-24 11:56:14', '2017-09-19 07:34:46', 100, 'BEL-RCO-CON-1018', 'BEL-RCO-CON-1018', 'Corporate', 'Conion Rice Cooker BE 223A2BS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 909, 1050, 1050, 1050, 10, 1050, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(252, '2017-08-24 12:43:38', '2017-09-19 07:35:13', 100, 'BEL-RCO-CON-1019', 'BEL-RCO-CON-1019', 'Corporate', 'Conion Rice Cooker BE 223A6WGP', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 866, 1000, 1000, 1000, 10, 1000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(253, '2017-08-24 12:44:24', '2017-09-19 07:39:22', 100, 'BEL-RCO-CON-1020', 'BEL-RCO-CON-1020', 'Corporate', 'Conion Rice Cooker BE 283ATMS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 909, 1050, 1050, 1050, 10, 1050, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(218, '2017-08-24 12:14:55', NULL, 100, 'BEL-RCO-CON-1021', 'BEL-RCO-CON-1021', 'Corporate', 'BE-323APP (Rice Cooker)', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1033, 1194, 1194, 1194, 10, 1194, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(219, '2017-08-24 12:15:59', '2017-09-19 07:37:51', 100, 'BEL-RCO-CON-1022', 'BEL-RCO-CON-1022', 'Corporate', 'Conion Rice Cooker BE 283A6WGP', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 950, 1098, 1098, 1098, 10, 1098, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(228, '2017-08-24 12:25:45', '2017-09-19 07:37:03', 100, 'BEL-RCO-CON-1023', 'BEL-RCO-CON-1023', 'Corporate', 'Conion Rice Cooker BE 283A2BS', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 950, 1098, 1098, 1098, 10, 1098, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(230, '2017-08-24 12:26:37', '2017-09-19 07:51:02', 100, 'BEL-RCO-CON-1024', 'BEL-RCO-CON-1024', 'Corporate', 'Conion Rice Cooker BE 32703ATMS', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1116, 1290, 1290, 1290, 10, 1290, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(235, '2017-08-24 12:30:31', NULL, 100, 'BEL-RCO-CON-1025', 'BEL-RCO-CON-1025', 'Corporate', 'BE-323A2BS (Rice Cooker)', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1075, 1242, 1242, 1242, 10, 1242, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(237, '2017-08-24 12:31:21', NULL, 100, 'BEL-RCO-CON-1026', 'BEL-RCO-CON-1026', 'Corporate', 'Classic - 2.5 Ltr. (Pressure Cooker)', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 995, 1100, 1100, 1100, 5, 1100, 0, '0', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(242, '2017-08-24 12:33:34', NULL, 100, 'BEL-RCO-CON-1035', 'BEL-RCO-CON-1035', 'Corporate', 'Classic - 3.5 Ltr. (Pressure Cooker)', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1085, 1200, 1200, 1200, 5, 1200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(244, '2017-08-24 12:34:37', '2017-09-19 05:20:37', 100, 'BEL-RCO-CON-1041', 'BEL-RCO-CON-1041', 'Corporate', 'Conion Pressure Cooker BE FMT50ASB', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1770, 1958, 1958, 1958, 5, 1958, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(247, '2017-08-24 12:37:48', '2017-09-19 05:21:01', 100, 'BEL-RCO-CON-1042', 'BEL-RCO-CON-1042', 'Corporate', 'Conion Pressure Cooker BE FMT60ARB', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1986, 2198, 2198, 2198, 10, 2198, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(263, '2017-08-24 12:57:35', NULL, 100, 'BEL-RCO-CON-1045', 'BEL-RCO-CON-1045', 'Corporate', 'Classic - 4.5 Ltr. (Pressure Cooker)', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1310, 1450, 1450, 1450, 10, 1450, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(264, '2017-08-24 13:00:06', NULL, 100, 'BEL-RCO-CON-1050', 'BEL-RCO-CON-1050', 'Corporate', 'Classic - 5.5 Ltr. (Pressure Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1265, 1400, 1400, 1400, 10, 1400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(268, '2017-08-24 13:05:37', NULL, 100, 'BEL-RCO-CON-1065', 'BEL-RCO-CON-1065', 'Corporate', 'Classic - 6.5 Ltr. (Pressure Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1355, 1500, 1500, 1500, 10, 1500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(271, '2017-08-25 04:16:19', NULL, 100, 'BEL-RCO-CON-1080', 'BEL-RCO-CON-1080', 'Corporate', 'BE-MRC185RS (Rice Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1988, 2200, 2200, 2200, 15, 2200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(272, '2017-08-25 04:17:40', NULL, 100, 'BEL-RCO-CON-1081', 'BEL-RCO-CON-1081', 'Corporate', 'BE-MRC180WS (Rice Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2079, 2300, 2300, 2300, 15, 2300, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(275, '2017-08-25 04:18:48', NULL, 100, 'BEL-RCO-CON-1085', 'BEL-RCO-CON-1085', 'Corporate', 'Big Boss - 8.5 Ltr. (Pressure Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1898, 2100, 2100, 2100, 15, 2100, 0, '0', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(276, '2017-08-25 04:19:38', NULL, 100, 'BEL-RCO-CON-2010', 'BEL-RCO-CON-2010', 'Corporate', 'Big Boss - 10.5 Ltr. (Pressure Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2260, 2500, 2500, 2500, 20, 2500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(277, '2017-08-25 04:20:46', NULL, 100, 'BEL-RCO-CON-2012', 'BEL-RCO-CON-2012', 'Corporate', 'Big Boss - 12.5 Ltr. (Pressure Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2621, 2900, 2900, 2900, 25, 2900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(279, '2017-08-25 04:22:07', '2017-09-19 07:36:28', 100, 'BEL-RCO-CON-2020', 'BEL-RCO-CON-2020', 'Corporate', 'Conion Rice Cooker BE 22B50', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1991, 2300, 2300, 2300, 25, 2300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(281, '2017-08-25 04:22:57', NULL, 100, 'BEL-RCO-CON-3001', 'BEL-RCO-CON-3001', 'Corporate', 'BE-28D40 (Rice Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2250, 2600, 2600, 2600, 25, 2600, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(283, '2017-08-25 04:23:48', '2017-09-19 07:39:51', 100, 'BEL-RCO-CON-3002', 'BEL-RCO-CON-3002', 'Corporate', 'Conion Rice Cooker BE 28B60', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2164, 2500, 2500, 2500, 25, 2500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(285, '2017-08-25 04:24:28', '2017-09-19 07:51:22', 100, 'BEL-RCO-CON-3020', 'BEL-RCO-CON-3020', 'Corporate', 'Conion Rice Cooker BE 32B70', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2509, 2900, 2900, 2900, 25, 2900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(297, '2017-08-25 04:31:16', '2017-09-19 09:38:19', 100, 'BEL-RCO-PAN-1025', 'BEL-RCO-PAN-1025', 'Corporate', 'Panasonic Rice Cooker SR TEJ18', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3362, 3800, 3800, 3800, 25, 3800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(299, '2017-08-25 04:32:11', '2017-09-19 09:38:37', 100, 'BEL-RCO-PAN-1026', 'BEL-RCO-PAN-1026', 'Corporate', 'Panasonic Rice Cooker SR TEM18', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3707, 4190, 4190, 4190, 50, 4190, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(300, '2017-08-25 04:32:51', '2017-09-19 09:39:20', 100, 'BEL-RCO-PAN-1027', 'BEL-RCO-PAN-1027', 'Corporate', 'Panasonic Rice Cooker SR TR184', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3627, 4100, 4100, 4100, 50, 4100, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(303, '2017-08-25 04:33:34', '2017-09-19 09:39:00', 100, 'BEL-RCO-PAN-1028', 'BEL-RCO-PAN-1028', 'Corporate', 'Panasonic Rice Cooker SR TQ184', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3981, 4500, 4500, 4500, 50, 4500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(304, '2017-08-25 04:34:21', '2017-09-19 09:37:40', 100, 'BEL-RCO-PAN-1029', 'BEL-RCO-PAN-1029', 'Corporate', 'Panasonic Rice Cooker SR JN185', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3450, 3900, 3900, 3900, 50, 3900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(306, '2017-08-25 04:35:41', '2017-09-19 09:37:54', 100, 'BEL-RCO-PAN-1030', 'BEL-RCO-PAN-1030', 'Corporate', 'Panasonic Rice Cooker SR JQ185', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3893, 4400, 4400, 4400, 50, 4400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(309, '2017-08-25 04:36:39', '2017-09-19 09:39:34', 100, 'BEL-RCO-PAN-1080', 'BEL-RCO-PAN-1080', 'Corporate', 'Panasonic Rice Cooker SR W18G', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2212, 2500, 2500, 2500, 25, 2500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(319, '2017-08-25 04:42:35', '2017-09-19 09:39:50', 100, 'BEL-RCO-PAN-2020', 'BEL-RCO-PAN-2020', 'Corporate', 'Panasonic Rice Cooker SR W22GS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3715, 4200, 4200, 4200, 50, 4200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(329, '2017-08-25 04:48:37', '2017-09-19 09:40:07', 100, 'BEL-RCO-PAN-2035', 'BEL-RCO-PAN-2035', 'Corporate', 'Panasonic Rice Cooker SR WN36', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 5175, 5850, 5850, 5850, 50, 5850, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(330, '2017-08-25 04:49:27', '2017-09-19 09:37:03', 100, 'BEL-RCO-PAN-4001', 'BEL-RCO-PAN-4001', 'Corporate', 'Panasonic Rice Cooker SR GA421', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 7077, 8000, 8000, 8000, 100, 8000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(332, '2017-08-25 04:50:05', '2017-09-19 09:37:26', 100, 'BEL-RCO-PAN-7020', 'BEL-RCO-PAN-7020', 'Corporate', 'Panasonic Rice Cooker SR GA721', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8846, 10000, 10000, 10000, 100, 10000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(349, '2017-08-25 04:58:19', NULL, 100, 'BEL-RCO-PHL-1005', 'BEL-RCO-PHL-1005', 'Corporate', 'HD-9104 (Food Steamer)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3733, 4220, 4220, 4220, 50, 4220, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(351, '2017-08-25 04:59:04', '2017-09-19 07:55:58', 100, 'BEL-RCO-PHL-1006', 'BEL-RCO-PHL-1006', 'Corporate', 'Philips Pressure Cooker HD 2139', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 7121, 8050, 8050, 8050, 100, 8050, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(353, '2017-08-25 05:00:03', '2017-09-19 07:27:41', 100, 'BEL-RCO-PHL-1030', 'BEL-RCO-PHL-1030', 'Corporate', 'Philips Air Fryer HD 9240', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 21143, 23900, 23900, 23900, 300, 23900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(355, '2017-08-25 05:00:50', '2017-09-19 07:56:46', 100, 'BEL-RCO-PHL-1050', 'BEL-RCO-PHL-1050', 'Corporate', 'Philips Rice Cooker HD 3017', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3362, 3800, 3800, 3800, 25, 3800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(357, '2017-08-25 05:01:48', '2017-09-19 07:57:03', 100, 'BEL-RCO-PHL-1051', 'BEL-RCO-PHL-1051', 'Corporate', 'Philips Rice Cooker HD 3038', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 6086, 6880, 6880, 6880, 50, 6880, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live');
INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xvatpct`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(359, '2017-08-25 05:02:40', '2017-09-19 05:02:59', 100, 'BEL-RCO-SRP-1025', 'BEL-RCO-SRP-1025', 'Corporate', 'Sharp Rice Cooker KS M18L', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2827, 3000, 3000, 3000, 10, 3000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(361, '2017-08-25 05:03:21', NULL, 100, 'BEL-RCO-SRP-2001', 'BEL-RCO-SRP-2001', 'Corporate', 'KSH-206FL / JM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1413, 1500, 1500, 1500, 5, 1500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(362, '2017-08-25 05:04:04', '2017-09-19 05:05:51', 100, 'BEL-RCO-SRP-2002', 'BEL-RCO-SRP-2002', 'Corporate', 'Sharp Rice Cooker KSH 211JM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1413, 1500, 1500, 1500, 5, 1500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(365, '2017-08-25 05:04:46', '2017-09-19 05:06:12', 100, 'BEL-RCO-SRP-2003', 'BEL-RCO-SRP-2003', 'Corporate', 'Sharp Rice Cooker KSH 222 FL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1696, 1800, 1800, 1800, 5, 1800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(367, '2017-08-25 05:05:35', '2017-09-19 05:06:26', 100, 'BEL-RCO-SRP-2004', 'BEL-RCO-SRP-2004', 'Corporate', 'Sharp Rice Cooker KSH 228 FL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1790, 1900, 1900, 1900, 5, 1900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(370, '2017-08-25 05:06:19', NULL, 100, 'BEL-RCO-SRP-2005', 'BEL-RCO-SRP-2005', 'Corporate', 'KSH-740FL/PC/RB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2168, 2300, 2300, 2300, 5, 2300, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(371, '2017-08-25 05:07:00', '2017-09-19 05:06:45', 100, 'BEL-RCO-SRP-2006', 'BEL-RCO-SRP-2006', 'Corporate', 'Sharp Rice Cooker KSH 555W', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3298, 3500, 3500, 3500, 10, 3500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(374, '2017-08-25 05:07:50', '2017-09-19 05:07:25', 100, 'BEL-RCO-SRP-2007', 'BEL-RCO-SRP-2007', 'Corporate', 'Sharp Rice Cooker KSH 777W', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3769, 4000, 4000, 4000, 15, 4000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(376, '2017-08-25 05:08:43', '2017-09-19 05:03:54', 100, 'BEL-RCO-SRP-2008', 'BEL-RCO-SRP-2008', 'Corporate', 'Sharp Rice Cooker KSH 1010W', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4712, 5000, 5000, 5000, 25, 5000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(392, '2017-08-25 05:18:59', '2017-09-19 09:35:44', 100, 'BEL-RCO-TOS-1011', 'BEL-RCO-TOS-1011', 'Corporate', 'Toshiba Rice Cooker RC T18AFS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4523, 4800, 4800, 4800, 25, 4800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(395, '2017-08-25 05:20:11', '2017-09-19 09:31:59', 100, 'BEL-RCO-TOS-2011', 'BEL-RCO-TOS-2011', 'Corporate', 'Toshiba Curry Cooker HGN 6D', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8010, 8500, 8500, 8500, 50, 8500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(398, '2017-08-25 05:21:16', '2017-09-19 09:31:42', 100, 'BEL-RCO-TOS-2012', 'BEL-RCO-TOS-2012', 'Corporate', 'Toshiba Curry Cooker HGN 5D', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 6125, 6500, 6500, 6500, 25, 6500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(298, '2017-08-25 04:31:30', NULL, 100, 'BEL-REF-CON-1011', 'BEL-REF-CON-1011', 'Corporate', 'BE-60CZ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10969, 12400, 12400, 12400, 100, 12400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(301, '2017-08-25 04:32:52', '2017-08-25 03:34:17', 100, 'BEL-REF-CON-1041', 'BEL-REF-CON-1041', 'Corporate', 'BE-113/172(FUD)-BLUE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 19462, 22000, 22000, 22000, 250, 22000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(305, '2017-08-25 04:35:16', NULL, 100, 'BEL-REF-CON-1051', 'BEL-REF-CON-1051', 'Corporate', 'BE-176(FG)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26538, 30000, 30000, 30000, 300, 30000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(308, '2017-08-25 04:36:29', NULL, 100, 'BEL-REF-CON-1060', 'BEL-REF-CON-1060', 'Corporate', 'BE-191(FG)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28307, 32000, 32000, 32000, 300, 32000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(311, '2017-08-25 04:37:32', NULL, 100, 'BEL-REF-CON-1067', 'BEL-REF-CON-1067', 'Corporate', 'BE-87', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13181, 14900, 14900, 14900, 100, 14900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(312, '2017-08-25 04:38:35', NULL, 100, 'BEL-REF-CON-1071', 'BEL-REF-CON-1071', 'Corporate', 'BE-146FUDLB/229(FUD)-BLUE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 17604, 19900, 19900, 19900, 200, 19900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(313, '2017-08-25 04:39:40', NULL, 100, 'BEL-REF-CON-1072', 'BEL-REF-CON-1072', 'Corporate', 'BE-146FUDR/229(FUD)-RED', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 17604, 19900, 19900, 19900, 200, 19900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(315, '2017-08-25 04:40:41', NULL, 100, 'BEL-REF-CON-1093', 'BEL-REF-CON-1093', 'Corporate', 'BE-121', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 15835, 17900, 17900, 17900, 200, 17900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(317, '2017-08-25 04:41:42', '2017-09-19 04:17:11', 100, 'BEL-REF-CON-2001', 'BEL-REF-CON-2001', 'Corporate', 'Conion 50-50 Refrigerator BG 21FDCG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32023, 36200, 36200, 36200, 300, 36200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(320, '2017-08-25 04:43:04', NULL, 100, 'BEL-REF-CON-2002', 'BEL-REF-CON-2002', 'Corporate', 'BE-201HTMNF (Red)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22027, 24900, 24900, 24900, 300, 24900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(322, '2017-08-25 04:43:54', '2017-09-19 05:21:26', 100, 'BEL-REF-CON-2003', 'BEL-REF-CON-2003', 'Corporate', 'Conion Refrigerator BE 201HTMNF Blue', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21850, 24700, 24700, 24700, 300, 24700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(323, '2017-08-25 04:44:51', '2017-09-19 04:17:52', 100, 'BEL-REF-CON-2010', 'BEL-REF-CON-2010', 'Corporate', 'Conion 50-50 Refrigerator BG 22FDCG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32731, 37000, 37000, 37000, 300, 37000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(324, '2017-08-25 04:45:46', NULL, 100, 'BEL-REF-CON-2011', 'BEL-REF-CON-2011', 'Corporate', 'BE-281SC', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32643, 36900, 36900, 36900, 300, 36900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(326, '2017-08-25 04:46:56', NULL, 100, 'BEL-REF-CON-2012', 'BEL-REF-CON-2012', 'Corporate', 'BG-24 FDCG', '', '', '', '', '', '', '', '', 'SUP0000022 ', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32731, 37000, 37000, 37000, 300, 37000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(327, '2017-08-25 04:47:59', '2017-09-19 05:24:18', 100, 'BEL-REF-CON-2021', 'BEL-REF-CON-2021', 'Corporate', 'Conion Refrigerator BE 234FD Blue', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24327, 27500, 27500, 27500, 300, 27500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(331, '2017-08-25 04:49:28', '2017-09-19 05:24:47', 100, 'BEL-REF-CON-2022', 'BEL-REF-CON-2022', 'Corporate', 'Conion Refrigerator BE 234FD Silver', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24769, 28000, 28000, 28000, 300, 28000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(333, '2017-08-25 04:50:21', NULL, 100, 'BEL-REF-CON-2023', 'BEL-REF-CON-2023', 'Corporate', 'BE - 214FDR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25388, 28700, 28700, 28700, 300, 28700, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(336, '2017-08-25 04:51:34', '2017-09-19 07:27:21', 100, 'BEL-REF-CON-2027', 'BEL-REF-CON-2027', 'Corporate', 'Conion Refrigerator BEM 227BG (Black)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28219, 31900, 31900, 31900, 300, 31900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(337, '2017-08-25 04:52:35', '2017-09-19 07:27:19', 100, 'BEL-REF-CON-2028', 'BEL-REF-CON-2028', 'Corporate', 'Conion Refrigerator BEM 227GG (Golden)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28219, 31900, 31900, 31900, 300, 31900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(339, '2017-08-25 04:53:28', '2017-09-19 05:29:26', 100, 'BEL-REF-CON-2031', 'BEL-REF-CON-2031', 'Corporate', 'Conion Refrigerator BE 247NF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22115, 25000, 25000, 25000, 300, 25000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(340, '2017-08-25 04:54:26', NULL, 100, 'BEL-REF-CON-2035', 'BEL-REF-CON-2035', 'Corporate', 'BE 238 TGB (Black)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32643, 36900, 36900, 36900, 300, 36900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(342, '2017-08-25 04:55:34', '2017-09-19 05:26:36', 100, 'BEL-REF-CON-2036', 'BEL-REF-CON-2036', 'Corporate', 'Conion Refrigerator BE 238 TGR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31757, 35900, 35900, 35900, 300, 35900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(345, '2017-08-25 04:57:25', '2017-09-19 05:25:32', 100, 'BEL-REF-CON-2037', 'BEL-REF-CON-2037', 'Corporate', 'Conion Refrigerator BE 238 TGP', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31404, 35500, 35500, 35500, 300, 35500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(348, '2017-08-25 04:58:11', '2017-09-19 05:29:56', 100, 'BEL-REF-CON-2038', 'BEL-REF-CON-2038', 'Corporate', 'Conion Refrigerator BE 254 FG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23885, 27000, 27000, 27000, 300, 27000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(352, '2017-08-25 04:59:10', '2017-08-26 04:43:42', 100, 'BEL-REF-CON-2039', 'BEL-REF-CON-2039', 'Corporate', 'BE-234FDLB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23885, 27000, 27000, 27000, 300, 27000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(354, '2017-08-25 05:00:05', '2017-08-26 04:49:11', 100, 'BEL-REF-CON-2040', 'BEL-REF-CON-2040', 'Corporate', 'BE-234FDSS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23885, 27000, 27000, 27000, 300, 27000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(356, '2017-08-25 05:01:00', '2017-08-26 04:49:55', 100, 'BEL-REF-CON-2041', 'BEL-REF-CON-2041', 'Corporate', 'BG-205FDRG (Red)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26096, 29500, 29500, 29500, 300, 29500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(358, '2017-08-25 05:02:16', NULL, 100, 'BEL-REF-CON-2042', 'BEL-REF-CON-2042', 'Corporate', 'BG-205FDPG (Purple)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26450, 0, 29900, 29900, 300, 29900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(360, '2017-08-25 05:03:15', '2017-09-19 05:30:26', 100, 'BEL-REF-CON-2051', 'BEL-REF-CON-2051', 'Corporate', 'Conion Refrigerator BE 267 FG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25654, 29000, 29000, 29000, 300, 29000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(363, '2017-08-25 05:04:07', '2017-09-19 05:29:03', 100, 'BEL-REF-CON-2052', 'BEL-REF-CON-2052', 'Corporate', 'Conion Refrigerator BE 247FDGB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26538, 30000, 30000, 30000, 300, 30000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(366, '2017-08-25 05:05:12', '2017-09-19 05:23:40', 100, 'BEL-REF-CON-2053', 'BEL-REF-CON-2053', 'Corporate', 'Conion Refrigerator BE 215 Sparkling Orange', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 19462, 22000, 22000, 22000, 200, 22000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(369, '2017-08-25 05:06:07', '2017-09-19 05:23:11', 100, 'BEL-REF-CON-2054', 'BEL-REF-CON-2054', 'Corporate', 'Conion Refrigerator BE 215 Mineral Blue', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 20346, 23000, 23000, 23000, 200, 23000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(372, '2017-08-25 05:07:07', NULL, 100, 'BEL-REF-CON-2055', 'BEL-REF-CON-2055', 'Corporate', 'BE-203FUD-SS/LB/274(FUD)-Silver/Blue', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 20257, 22900, 22900, 22900, 300, 22900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(375, '2017-08-25 05:08:16', NULL, 100, 'BEL-REF-CON-2056', 'BEL-REF-CON-2056', 'Corporate', 'BE-203FUDR/274(FUD)-RED', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 20257, 22900, 22900, 22900, 200, 22900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(380, '2017-08-25 05:11:36', NULL, 100, 'BEL-REF-CON-2057', 'BEL-REF-CON-2057', 'Corporate', 'BE-215 (MAROON)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22115, 25000, 25000, 25000, 300, 25000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(378, '2017-08-25 05:09:46', '2017-09-19 04:19:09', 100, 'BEL-REF-CON-2058', 'BEL-REF-CON-2058', 'Corporate', 'Conion 50-50 Refrigerator BG 27FDBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 30962, 35000, 35000, 35000, 300, 35000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(382, '2017-08-25 05:12:42', '2017-09-19 04:21:53', 100, 'BEL-REF-CON-2059', 'BEL-REF-CON-2059', 'Corporate', 'Conion 50-50 Refrigerator BG 27FDRD', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 30962, 35000, 35000, 35000, 300, 35000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(384, '2017-08-25 05:13:32', NULL, 100, 'BEL-REF-CON-2060', 'BEL-REF-CON-2060', 'Corporate', 'BG-27FDBL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 30962, 35000, 35000, 35000, 300, 35000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(386, '2017-08-25 05:14:58', '2017-09-19 07:23:53', 100, 'BEL-REF-CON-2061', 'BEL-REF-CON-2061', 'Corporate', 'Conion Refrigerator BE 29FD', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25654, 29000, 29000, 29000, 300, 29000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(387, '2017-08-25 05:15:44', NULL, 100, 'BEL-REF-CON-2062', 'BEL-REF-CON-2062', 'Corporate', 'BE-215 (Pink)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22115, 25000, 25000, 25000, 300, 25000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(389, '2017-08-25 05:17:24', NULL, 100, 'BEL-REF-CON-2063', 'BEL-REF-CON-2063', 'Corporate', 'BE-149KGS (Red) K-Series', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31846, 36000, 36000, 36000, 300, 36000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(391, '2017-08-25 05:18:28', NULL, 100, 'BEL-REF-CON-2064', 'BEL-REF-CON-2064', 'Corporate', 'BE-149KGS (Golden) K-Series', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32112, 36300, 36300, 36300, 300, 36300, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(394, '2017-08-25 05:19:57', '2017-09-19 07:25:57', 100, 'BEL-REF-CON-2065', 'BEL-REF-CON-2065', 'Corporate', 'Conion Refrigerator BE 33FD', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26538, 30000, 30000, 30000, 300, 30000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(397, '2017-08-25 05:21:00', NULL, 100, 'BEL-REF-CON-2066', 'BEL-REF-CON-2066', 'Corporate', 'BE-169KGS (Red) K-Series', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34500, 39000, 39000, 39000, 500, 39000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(399, '2017-08-25 05:22:09', NULL, 100, 'BEL-REF-CON-2067', 'BEL-REF-CON-2067', 'Corporate', 'BE-169KGS (Golden) K-Series', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34765, 39300, 39300, 39300, 500, 39300, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(400, '2017-08-25 05:23:22', '2017-09-19 07:24:15', 100, 'BEL-REF-CON-2071', 'BEL-REF-CON-2071', 'Corporate', 'Conion Refrigerator BE 326NF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28307, 32000, 32000, 32000, 300, 32000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(402, '2017-08-25 05:24:19', '2017-09-19 07:24:51', 100, 'BEL-REF-CON-2075', 'BEL-REF-CON-2075', 'Corporate', 'Conion Refrigerator BE 330FD Blue', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22027, 24900, 24900, 24900, 300, 24900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(405, '2017-08-25 05:25:12', '2017-09-19 07:25:28', 100, 'BEL-REF-CON-2076', 'BEL-REF-CON-2076', 'Corporate', 'Conion Refrigerator BE 330FD Silver', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22115, 25000, 25000, 25000, 300, 25000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(409, '2017-08-25 05:26:21', NULL, 100, 'BEL-REF-CON-2077', 'BEL-REF-CON-2077', 'Corporate', 'BE - 310FDR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25300, 28600, 28600, 28600, 300, 28600, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(412, '2017-08-25 05:27:16', '2017-09-19 04:22:50', 100, 'BEL-REF-CON-2078', 'BEL-REF-CON-2078', 'Corporate', 'Conion 50-50 Refrigerator BG 30FDBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 35296, 39900, 39900, 39900, 500, 39900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(416, '2017-08-25 05:28:25', '2017-09-19 04:24:41', 100, 'BEL-REF-CON-2079', 'BEL-REF-CON-2079', 'Corporate', 'Conion 50-50 Refrigerator BG 30FDRD', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 35296, 39900, 39900, 39900, 500, 39900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(420, '2017-08-25 05:29:48', '2017-09-19 04:24:12', 100, 'BEL-REF-CON-2080', 'BEL-REF-CON-2080', 'Corporate', 'Conion 50-50 Refrigerator BG 30FDBL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 35296, 39900, 39900, 39900, 500, 39900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(424, '2017-08-25 05:36:57', '2017-09-19 07:32:45', 100, 'BEL-REF-CON-2081', 'BEL-REF-CON-2081', 'Corporate', 'Conion Refrigerator BG 30FDRG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 41488, 46900, 46900, 46900, 500, 46900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(427, '2017-08-25 05:38:49', '2017-09-19 07:27:48', 100, 'BEL-REF-CON-2082', 'BEL-REF-CON-2082', 'Corporate', 'Conion Refrigerator BG 30FDGG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 41577, 47000, 47000, 47000, 500, 47000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(430, '2017-08-25 05:39:56', '2017-09-19 07:22:53', 100, 'BEL-REF-CON-2088', 'BEL-REF-CON-2088', 'Corporate', 'Conion Refrigerator BE 288 BGR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38835, 43900, 43900, 43900, 500, 43900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1056, '2017-08-25 11:26:21', NULL, 100, 'BEL-REF-CON-2089', 'BEL-REF-CON-2089', 'Corporate', 'BE-288 BGB (Blue)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 37950, 42900, 42900, 42900, 500, 42900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(435, '2017-08-25 05:42:45', NULL, 100, 'BEL-REF-CON-3021', 'BEL-REF-CON-3021', 'Corporate', 'BE-321SCR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 39719, 44900, 44900, 44900, 500, 44900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(437, '2017-08-25 05:43:43', '2017-08-25 10:29:01', 100, 'BEL-REF-CON-3030', 'BEL-REF-CON-3030', 'Corporate', 'BE-310SC', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 41577, 47000, 47000, 47000, 500, 47000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(440, '2017-08-25 05:44:53', '2017-08-25 10:29:41', 100, 'BEL-REF-CON-4030', 'BEL-REF-CON-4030', 'Corporate', 'BE-498', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45115, 51000, 51000, 51000, 500, 51000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(442, '2017-08-25 05:45:53', '2017-09-19 07:29:31', 100, 'BEL-REF-CON-5601', 'BEL-REF-CON-5601', 'Corporate', 'Conion Refrigerator BE 560H4GBG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 70681, 79900, 79900, 79900, 1000, 79900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(446, '2017-08-25 05:47:43', '2017-09-19 08:16:20', 100, 'BEL-REF-HAR-2015', 'BEL-REF-HAR-2015', 'Corporate', 'Haier Refrigerator HRF 210FA Green', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28558, 30000, 30000, 30000, 100, 30000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(448, '2017-08-25 05:48:36', '2017-09-19 08:16:39', 100, 'BEL-REF-HAR-2016', 'BEL-REF-HAR-2016', 'Corporate', 'Haier Refrigerator HRF 210FA Pink', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28558, 30000, 30000, 30000, 100, 30000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(450, '2017-08-25 05:49:32', '2017-09-19 08:17:08', 100, 'BEL-REF-HAR-2020', 'BEL-REF-HAR-2020', 'Corporate', 'Haier Refrigerator HRF 230FA GREEN', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31414, 33000, 33000, 33000, 100, 33000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(452, '2017-08-25 05:50:21', '2017-09-19 08:17:28', 100, 'BEL-REF-HAR-2021', 'BEL-REF-HAR-2021', 'Corporate', 'Haier Refrigerator HRF 230FA PINK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28558, 30000, 30000, 30000, 100, 30000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(470, '2017-08-25 05:57:35', '2017-09-19 08:18:06', 100, 'BEL-REF-HAR-2025', 'BEL-REF-HAR-2025', 'Corporate', 'Haier Refrigerator HRF 250FA SILVER', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33317, 35000, 35000, 35000, 100, 35000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(472, '2017-08-25 05:58:48', '2017-09-19 08:17:45', 100, 'BEL-REF-HAR-2026', 'BEL-REF-HAR-2026', 'Corporate', 'Haier Refrigerator HRF 250FA PINK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33317, 35000, 35000, 35000, 100, 35000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(475, '2017-08-25 05:59:38', '2017-09-19 08:18:22', 100, 'BEL-REF-HAR-2035', 'BEL-REF-HAR-2035', 'Corporate', 'Haier Refrigerator HRF 270FA SILVER', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36173, 38000, 38000, 38000, 150, 38000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(478, '2017-08-25 06:00:51', '2017-09-19 08:18:40', 100, 'BEL-REF-HAR-2041', 'BEL-REF-HAR-2041', 'Corporate', 'Haier Refrigerator HRF 310FA SILVER', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38077, 40000, 40000, 40000, 150, 40000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(481, '2017-08-25 06:02:00', '2017-09-19 04:07:26', 100, 'BEL-REF-HIT-2001', 'BEL-REF-HIT-2001', 'Corporate', 'Hitachi Refrigerator R H210PG6 SLS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36063, 39900, 39900, 39900, 250, 39900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(483, '2017-08-25 06:02:52', '2017-09-19 04:09:35', 100, 'BEL-REF-HIT-2003', 'BEL-REF-HIT-2003', 'Corporate', 'Hitachi Refrigerator R-H240P4BK/290PUN4K SLS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42480, 47000, 47000, 47000, 500, 47000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(485, '2017-08-25 06:03:52', '2017-09-19 04:10:38', 100, 'BEL-REF-HIT-2004', 'BEL-REF-HIT-2004', 'Corporate', 'Hitachi Refrigerator R-H240P4BK / 290PUN4K PBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45102, 49900, 49900, 49900, 500, 49900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(488, '2017-08-25 06:04:52', '2017-09-19 04:10:01', 100, 'BEL-REF-HIT-2030', 'BEL-REF-HIT-2030', 'Corporate', 'Hitachi Refrigerator R-H270P4BK / 330PUN4K', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46910, 51900, 51900, 51900, 500, 51900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(491, '2017-08-25 06:05:38', '2017-09-19 04:10:36', 100, 'BEL-REF-HIT-2031', 'BEL-REF-HIT-2031', 'Corporate', 'Hitachi Refrigerator R-H270P4BK / 330PUN4K SLS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46005, 50900, 50900, 50900, 500, 50900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(495, '2017-08-25 06:06:34', '2017-09-19 04:10:56', 100, 'BEL-REF-HIT-2061', 'BEL-REF-HIT-2061', 'Corporate', 'Hitachi Refrigerator R-H310P4BK / 360PUN4K INX', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 53237, 58900, 58900, 58900, 500, 58900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(498, '2017-08-25 06:07:18', '2017-09-19 04:11:17', 100, 'BEL-REF-HIT-2062', 'BEL-REF-HIT-2062', 'Corporate', 'Hitachi Refrigerator R-H310P4BK / 360PUN4K PBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 53237, 58900, 58900, 58900, 500, 58900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(500, '2017-08-25 06:07:59', '2017-09-19 04:12:44', 100, 'BEL-REF-HIT-2092', 'BEL-REF-HIT-2092', 'Corporate', 'Hitachi Refrigerator R-H350P4BK / 380PUN4K INX', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 58660, 64900, 64900, 64900, 500, 64900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(503, '2017-08-25 06:09:14', '2017-09-19 04:13:16', 100, 'BEL-REF-HIT-2093', 'BEL-REF-HIT-2093', 'Corporate', 'Hitachi Refrigerator R-H350P4BK / 380PUN4K PBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 57755, 63900, 63900, 63900, 500, 63900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(506, '2017-08-25 06:10:32', '2017-09-19 04:16:05', 100, 'BEL-REF-HIT-3051', 'BEL-REF-HIT-3051', 'Corporate', 'Hitachi Refrigerator R-VG420P3PB / 400PG3 / 400PUN3 GBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 70410, 77900, 77900, 77900, 700, 77900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1052, '2017-08-25 11:25:25', '2017-09-19 04:15:35', 100, 'BEL-REF-HIT-3052', 'BEL-REF-HIT-3052', 'Corporate', 'Hitachi Refrigerator R-VG420P3PB / 400PG3 / PUN3 GBW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 71313, 78900, 78900, 78900, 700, 78900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1049, '2017-08-25 11:24:25', '2017-09-19 04:14:52', 100, 'BEL-REF-HIT-3065', 'BEL-REF-HIT-3065', 'Corporate', 'Hitachi Refrigerator R-V460P3PB (SLS)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 63179, 69900, 69900, 69900, 700, 69900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(511, '2017-08-25 06:14:18', '2017-09-19 04:16:27', 100, 'BEL-REF-HIT-3095', 'BEL-REF-HIT-3095', 'Corporate', 'Hitachi Refrigerator R-VG490P3PB / 470PUN3 GBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 83063, 91900, 91900, 91900, 700, 91900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(513, '2017-08-25 06:15:21', '2017-09-19 04:17:24', 100, 'BEL-REF-HIT-3096', 'BEL-REF-HIT-3096', 'Corporate', 'Hitachi Refrigerator R-VG490P3PB / 470PUN3 GBW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 84058, 93000, 93000, 93000, 700, 93000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(515, '2017-08-25 06:16:31', '2017-08-25 05:18:40', 100, 'BEL-REF-HIT-4407', 'BEL-REF-HIT-4407', 'Corporate', 'R-V400PZ(SLS)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 58750, 65000, 65000, 65000, 500, 65000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(522, '2017-08-25 06:20:04', NULL, 100, 'BEL-REF-HIT-4408', 'BEL-REF-HIT-4408', 'Corporate', 'R-ZG400W', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 86607, 95820, 95820, 95820, 1000, 95820, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(525, '2017-08-25 06:21:13', NULL, 100, 'BEL-REF-HIT-4409', 'BEL-REF-HIT-4409', 'Corporate', 'R-VG400PZ(GBK)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 58750, 65000, 65000, 65000, 500, 65000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(527, '2017-08-25 06:22:54', NULL, 100, 'BEL-REF-HIT-5084', 'BEL-REF-HIT-5084', 'Corporate', 'RM-700GMS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 195140, 215900, 215900, 215900, 2100, 215900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(529, '2017-08-25 06:24:04', '2017-09-19 04:24:35', 100, 'BEL-REF-HIT-5090', 'BEL-REF-HIT-5090', 'Corporate', 'Hitachi Refrigerator R-WB780P5PB / 730PUN5 XGR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 180679, 199900, 199900, 199900, 2100, 199900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(531, '2017-08-25 06:25:07', NULL, 100, 'BEL-REF-HIT-5091', 'BEL-REF-HIT-5091', 'Corporate', 'R-WB780P6PBX (XGR) Water Dispenser', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 207795, 229900, 229900, 229900, 2100, 229900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(533, '2017-08-25 06:26:08', '2017-09-19 04:17:47', 100, 'BEL-REF-HIT-5450', 'BEL-REF-HIT-5450', 'Corporate', 'Hitachi Refrigerator R-VG560P3PBX / 540PUN3 / PG3 GBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 102137, 113002, 113002, 113002, 1000, 113002, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(538, '2017-08-25 06:27:42', '2017-09-19 04:23:33', 100, 'BEL-REF-HIT-5455', 'BEL-REF-HIT-5455', 'Corporate', 'Hitachi Refrigerator R-WB560P3PBX / 550PUN2 / PG2 GBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 129160, 142900, 142900, 142900, 1500, 142900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(542, '2017-08-25 06:29:01', '2017-09-19 04:24:10', 100, 'BEL-REF-HIT-5456', 'BEL-REF-HIT-5456', 'Corporate', 'Hitachi Refrigerator R-WB560P3PBX / 550PUN2 / PG2 GGR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 130967, 144900, 144900, 144900, 1500, 144900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(547, '2017-08-25 06:30:21', '2017-09-19 04:09:02', 100, 'BEL-REF-HIT-5509', 'BEL-REF-HIT-5509', 'Corporate', 'Hitachi Refrigerator R W630P4PB/610PG4 GBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 126538, 140000, 140000, 140000, 1200, 140000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(550, '2017-08-25 06:31:38', NULL, 100, 'BEL-REF-HIT-5540', 'BEL-REF-HIT-5540', 'Corporate', 'R-W690P3PB/660PG3 (GBW) Water Dispenser', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 144615, 160000, 160000, 160000, 1500, 160000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(735, '2017-08-25 08:15:32', '2017-09-19 04:18:36', 100, 'BEL-REF-HIT-5550', 'BEL-REF-HIT-5550', 'Corporate', 'Hitachi Refrigerator R-VG690P3PBX / 660PUN3 / PG3 GBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 118404, 131000, 131000, 131000, 1200, 131000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(736, '2017-08-25 08:16:53', '2017-09-19 04:13:27', 100, 'BEL-REF-HIT-5584', 'BEL-REF-HIT-5584', 'Corporate', 'Hitachi Refrigerator R-M800GP2PB / 700GPG2 GBK Water Dispenser', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 235000, 260000, 260000, 260000, 2500, 260000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(737, '2017-08-25 08:17:52', '2017-09-19 04:13:52', 100, 'BEL-REF-HIT-6000', 'BEL-REF-HIT-6000', 'Corporate', 'Hitachi Refrigerator R-M800P2PB / 700PUN2 GBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 203365, 225000, 225000, 225000, 2100, 225000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(738, '2017-08-25 08:18:57', NULL, 100, 'BEL-REF-HIT-6001', 'BEL-REF-HIT-6001', 'Corporate', 'R-V600PWX', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 165205, 182780, 182780, 182780, 1500, 182780, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(739, '2017-08-25 08:19:51', '2017-09-19 04:14:15', 100, 'BEL-REF-HIT-6005', 'BEL-REF-HIT-6005', 'Corporate', 'Hitachi Refrigerator R-S800P2PB / 700PG2 GBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 176250, 195000, 195000, 195000, 1500, 195000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(740, '2017-08-25 08:20:38', NULL, 100, 'BEL-REF-HIT-6623', 'BEL-REF-HIT-6623', 'Corporate', 'R-S600P2TH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 179775, 198900, 198900, 198900, 2100, 198900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(741, '2017-08-25 08:21:28', '2017-09-19 08:21:16', 100, 'BEL-REF-LGE-2008', 'BEL-REF-LGE-2008', 'Corporate', 'LG Refrigerator GC 269VP Red', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 40143, 42600, 42600, 42600, 250, 42600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(742, '2017-08-25 08:22:15', '2017-09-19 08:21:00', 100, 'BEL-REF-LGE-2009', 'BEL-REF-LGE-2009', 'Corporate', 'LG Refrigerator GC 269VL SILVER', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38540, 40900, 40900, 40900, 250, 40900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(743, '2017-08-25 08:23:24', '2017-09-19 08:27:40', 100, 'BEL-REF-LGE-2010', 'BEL-REF-LGE-2010', 'Corporate', 'LG Refrigerator GN V222SLCL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38932, 41316, 41316, 41316, 250, 41316, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(744, '2017-08-25 08:24:16', '2017-09-19 08:22:00', 100, 'BEL-REF-LGE-2060', 'BEL-REF-LGE-2060', 'Corporate', 'LG Refrigerator GN B272SLCG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 47021, 49900, 49900, 49900, 300, 49900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(745, '2017-08-25 08:24:54', '2017-09-19 08:22:37', 100, 'BEL-REF-LGE-3012', 'BEL-REF-LGE-3012', 'Corporate', 'LG Refrigerator GN B372SLCG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 56444, 59900, 59900, 59900, 300, 59900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(746, '2017-08-25 08:25:32', '2017-09-19 08:23:01', 100, 'BEL-REF-LGE-3051', 'BEL-REF-LGE-3051', 'Corporate', 'LG Refrigerator GN M352CLN', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 58046, 61600, 61600, 61600, 300, 61600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(747, '2017-08-25 08:26:12', '2017-09-19 08:23:18', 100, 'BEL-REF-LGE-3052', 'BEL-REF-LGE-3052', 'Corporate', 'LG Refrigerator GN M352GPH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 55690, 59100, 59100, 59100, 300, 59100, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(748, '2017-08-25 08:26:47', '2017-09-19 08:25:03', 100, 'BEL-REF-LGE-4061', 'BEL-REF-LGE-4061', 'Corporate', 'LG Refrigerator GN M492GPH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 65962, 70000, 70000, 70000, 300, 70000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(750, '2017-08-25 08:27:32', '2017-09-19 08:26:48', 100, 'BEL-REF-LGE-5024', 'BEL-REF-LGE-5024', 'Corporate', 'LG Refrigerator GN M702GSHH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 102146, 108400, 108400, 108400, 500, 108400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(751, '2017-08-25 08:28:08', '2017-09-19 08:20:39', 100, 'BEL-REF-LGE-5025', 'BEL-REF-LGE-5025', 'Corporate', 'LG Refrigerator BC B207GLQV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 138519, 147000, 147000, 147000, 700, 147000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(752, '2017-08-25 08:28:47', '2017-09-19 08:21:34', 100, 'BEL-REF-LGE-5084', 'BEL-REF-LGE-5084', 'Corporate', 'LG Refrigerator GC L237JLYN', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 174327, 185000, 185000, 185000, 1000, 185000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(754, '2017-08-25 08:29:30', NULL, 100, 'BEL-REF-MID-2001', 'BEL-REF-MID-2001', 'Corporate', 'MRD-196VTM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29139, 31900, 31900, 31900, 250, 31900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(756, '2017-08-25 08:30:14', '2017-09-19 07:25:14', 100, 'BEL-REF-MID-2010', 'BEL-REF-MID-2010', 'Corporate', 'Midea Refrigerator MRD 226VTM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32793, 35900, 35900, 35900, 300, 35900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(757, '2017-08-25 08:31:10', '2017-09-19 10:41:25', 100, 'BEL-REF-PAN-1095', 'BEL-REF-PAN-1095', 'Corporate', 'Panasonic Refrigerator NR BN 221', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28558, 30000, 30000, 30000, 100, 30000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(759, '2017-08-25 08:31:42', '2017-09-19 10:38:15', 100, 'BEL-REF-PAN-2016', 'BEL-REF-PAN-2016', 'Corporate', 'Panasonic Refrigerator NR BK 265', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33317, 35000, 35000, 35000, 100, 35000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(760, '2017-08-25 08:32:17', NULL, 100, 'BEL-REF-PAN-2018', 'BEL-REF-PAN-2018', 'Corporate', 'NR-BL267PS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36173, 38000, 38000, 38000, 150, 38000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(762, '2017-08-25 08:32:54', '2017-09-19 10:38:49', 100, 'BEL-REF-PAN-2051', 'BEL-REF-PAN-2051', 'Corporate', 'Panasonic Refrigerator NR BK 305', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38077, 40000, 40000, 40000, 150, 40000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(763, '2017-08-25 08:33:37', '2017-09-19 10:36:42', 100, 'BEL-REF-PAN-2085', 'BEL-REF-PAN-2085', 'Corporate', 'Panasonic Refrigerator NR BK 345', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42836, 45000, 45000, 45000, 200, 45000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(765, '2017-08-25 08:34:42', '2017-09-19 08:33:53', 100, 'BEL-REF-SAM-2011', 'BEL-REF-SAM-2011', 'Corporate', 'Samsung Refrigerator RT 20FGRVDSA', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42360, 44500, 44500, 44500, 150, 44500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(766, '2017-08-25 08:35:23', '2017-09-19 08:34:28', 100, 'BEL-REF-SAM-2021', 'BEL-REF-SAM-2021', 'Corporate', 'Samsung Refrigerator RT 22FGRCDSL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45502, 47800, 47800, 47800, 200, 47800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(767, '2017-08-25 08:36:01', '2017-09-19 08:34:27', 100, 'BEL-REF-SAM-2025', 'BEL-REF-SAM-2025', 'Corporate', 'Samsung Refrigerator RT 22FGJADSA', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 43313, 45500, 45500, 45500, 200, 45500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(768, '2017-08-25 08:36:47', '2017-09-19 08:34:47', 100, 'BEL-REF-SAM-2051', 'BEL-REF-SAM-2051', 'Corporate', 'Samsung Refrigerator RT 25FGJADSA', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 49500, 52000, 52000, 52000, 200, 52000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(770, '2017-08-25 08:37:26', '2017-09-19 08:36:02', 100, 'BEL-REF-SAM-2052', 'BEL-REF-SAM-2052', 'Corporate', 'Samsung Refrigerator RT 32K5534UT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 51880, 54500, 54500, 54500, 200, 54500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(771, '2017-08-25 08:38:01', '2017-09-19 08:35:46', 100, 'BEL-REF-SAM-3063', 'BEL-REF-SAM-3063', 'Corporate', 'Samsung Refrigerator RT 35FGUDDGL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 70442, 74000, 74000, 74000, 300, 74000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(772, '2017-08-25 08:39:15', '2017-09-19 08:36:27', 100, 'BEL-REF-SAM-3090', 'BEL-REF-SAM-3090', 'Corporate', 'Samsung Refrigerator RT 38FGUDDGL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79961, 84000, 84000, 84000, 300, 84000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(773, '2017-08-25 08:40:47', NULL, 100, 'BEL-REF-SAM-5007', 'BEL-REF-SAM-5007', 'Corporate', 'RT50H6100SA', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 99381, 104400, 104400, 104400, 500, 104400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(774, '2017-08-25 08:41:20', '2017-09-19 08:33:25', 100, 'BEL-REF-SAM-5015', 'BEL-REF-SAM-5015', 'Corporate', 'Samsung Refrigerator RSH 7ZNPN1', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 185625, 195000, 195000, 195000, 100, 195000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(775, '2017-08-25 08:41:58', '2017-09-19 08:33:12', 100, 'BEL-REF-SAM-5064', 'BEL-REF-SAM-5064', 'Corporate', 'Samsung Refrigerator RSA 1NTSL1', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 125654, 132000, 132000, 132000, 500, 132000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(776, '2017-08-25 08:43:06', '2017-09-19 08:36:58', 100, 'BEL-REF-SAM-5074', 'BEL-REF-SAM-5074', 'Corporate', 'Samsung Refrigerator SRS584 NLS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 128510, 135000, 135000, 135000, 500, 135000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(777, '2017-08-25 08:44:02', '2017-09-19 08:32:24', 100, 'BEL-REF-SAM-5083', 'BEL-REF-SAM-5083', 'Corporate', 'Samsung Refrigerator RS 552NRUAWW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 152308, 160000, 160000, 160000, 700, 160000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(778, '2017-08-25 08:45:05', '2017-09-19 08:32:49', 100, 'BEL-REF-SAM-5086', 'BEL-REF-SAM-5086', 'Corporate', 'Samsung Refrigerator RS 554NRUA1J', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 223702, 235000, 235000, 235000, 1000, 235000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(779, '2017-08-25 08:45:38', NULL, 100, 'BEL-REF-SRP-1060', 'BEL-REF-SRP-1060', 'Corporate', 'HS-65BF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 14945, 15700, 15700, 15700, 50, 15700, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live');
INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xvatpct`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(780, '2017-08-25 08:46:08', '2017-09-19 04:49:29', 100, 'BEL-REF-SRP-1065', 'BEL-REF-SRP-1065', 'Corporate', 'Sharp Refrigerator SJ C19SS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28463, 29900, 29900, 29900, 100, 29900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(781, '2017-08-25 08:46:48', NULL, 100, 'BEL-REF-SRP-1070', 'BEL-REF-SRP-1070q', 'Corporate', 'SJ-K22TSL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 30938, 32500, 32500, 32500, 100, 32500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(782, '2017-08-25 08:47:41', '2017-09-19 04:50:27', 100, 'BEL-REF-SRP-1075', 'BEL-REF-SRP-1075', 'Corporate', 'Sharp Refrigerator SJ K220TASL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 30824, 32380, 32380, 32380, 100, 32380, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(784, '2017-08-25 08:50:13', '2017-09-19 04:51:11', 100, 'BEL-REF-SRP-2003', 'BEL-REF-SRP-2003', 'Corporate', 'Sharp Refrigerator SJ K260TASL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 30824, 32380, 32380, 32380, 100, 32380, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(785, '2017-08-25 08:51:30', '2017-09-19 05:00:48', 100, 'BEL-REF-SRP-2004', 'BEL-REF-SRP-2004', 'Corporate', 'Sharp Refrigerator SJ SK26E SS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 37030, 38900, 38900, 38900, 150, 38900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(786, '2017-08-25 08:52:23', '2017-09-19 04:50:50', 100, 'BEL-REF-SRP-2005', 'BEL-REF-SRP-2005', 'Corporate', 'Sharp Refrigerator SJ K25SSL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 35126, 36900, 36900, 36900, 150, 36900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(787, '2017-08-25 08:53:02', '2017-09-19 04:47:35', 100, 'BEL-REF-SRP-2012', 'BEL-REF-SRP-2012', 'Corporate', 'Sharp Refrigerator SJ A24SS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36074, 37896, 37896, 37896, 150, 37896, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(788, '2017-08-25 08:53:33', '2017-09-19 04:51:29', 100, 'BEL-REF-SRP-2020', 'BEL-REF-SRP-2020', 'Corporate', 'Sharp Refrigerator SJ K30SSSL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 43424, 45618, 45618, 45618, 200, 45618, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(789, '2017-08-25 08:54:22', NULL, 100, 'BEL-REF-SRP-2021', 'BEL-REF-SRP-2021', 'Corporate', 'SJ-K29SSL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45043, 47318, 47318, 47318, 200, 47318, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(790, '2017-08-25 08:55:31', '2017-09-19 05:01:05', 100, 'BEL-REF-SRP-2022', 'BEL-REF-SRP-2022', 'Corporate', 'Sharp Refrigerator SJ SK30E SS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 47318, 47500, 47500, 47500, 200, 47500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(791, '2017-08-25 08:56:08', '2017-09-19 04:49:09', 100, 'BEL-REF-SRP-2027', 'BEL-REF-SRP-2027', 'Corporate', 'Sharp Refrigerator SJ A29S', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42741, 44900, 44900, 44900, 200, 44900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(792, '2017-08-25 08:56:49', '2017-09-19 04:51:48', 100, 'BEL-REF-SRP-2031', 'BEL-REF-SRP-2031', 'Corporate', 'Sharp Refrigerator SJ K33SSSL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 41291, 43376, 43376, 43376, 200, 43376, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(793, '2017-08-25 08:57:27', '2017-09-19 05:01:40', 100, 'BEL-REF-SRP-2041', 'BEL-REF-SRP-2041', 'Corporate', 'Sharp Refrigerator SJ SK34E SS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 47501, 49900, 49900, 49900, 200, 49900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(794, '2017-08-25 08:58:18', '2017-09-19 04:52:11', 100, 'BEL-REF-SRP-2042', 'BEL-REF-SRP-2042', 'Corporate', 'Sharp Refrigerator SJ K34SBE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42696, 44852, 44852, 44852, 200, 44852, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(795, '2017-08-25 08:58:51', '2017-09-19 05:01:53', 100, 'BEL-REF-SRP-2051', 'BEL-REF-SRP-2051', 'Corporate', 'Sharp Refrigerator SJ SK38E SS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 53689, 56400, 56400, 56400, 250, 56400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(796, '2017-08-25 08:59:24', '2017-09-19 04:44:26', 100, 'BEL-REF-SRP-2052', 'BEL-REF-SRP-2052', 'Corporate', 'Sharp J-Tech Inverter Refrigerator SJ D29ESL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 62827, 66000, 66000, 66000, 300, 66000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(797, '2017-08-25 09:00:04', '2017-09-19 04:52:39', 100, 'BEL-REF-SRP-3011', 'BEL-REF-SRP-3011', 'Corporate', 'Sharp Refrigerator SJ K41SSL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 107091, 112500, 112500, 112500, 500, 112500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(798, '2017-08-25 09:00:49', '2017-09-19 04:52:56', 100, 'BEL-REF-SRP-3012', 'BEL-REF-SRP-3012', 'Corporate', 'Sharp Refrigerator SJ K42E SS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 59971, 63000, 63000, 63000, 300, 63000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(799, '2017-08-25 09:01:35', '2017-09-19 04:44:21', 100, 'BEL-REF-SRP-3013', 'BEL-REF-SRP-3013', 'Corporate', 'Sharp J-Tech Inverter Refrigerator SJ D32ESL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 68539, 72000, 72000, 72000, 300, 72000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(800, '2017-08-25 09:02:53', '2017-09-19 04:57:50', 100, 'BEL-REF-SRP-3051', 'BEL-REF-SRP-3051', 'Corporate', 'Sharp Refrigerator SJ P43MK3BK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 61875, 65000, 65000, 65000, 300, 65000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(801, '2017-08-25 09:05:44', NULL, 100, 'BEL-REF-SRP-3052', 'BEL-REF-SRP-3052', 'Corporate', 'SJ-PD35PBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 88434, 92900, 92900, 92900, 300, 92900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(802, '2017-08-25 09:06:21', '2017-09-19 04:58:32', 100, 'BEL-REF-SRP-3081', 'BEL-REF-SRP-3081', 'Corporate', 'Sharp Refrigerator SJ P47MK3BK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 66635, 70000, 70000, 70000, 300, 70000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(803, '2017-08-25 09:07:00', NULL, 100, 'BEL-REF-SRP-3082', 'BEL-REF-SRP-3082', 'Corporate', 'SJ-PD39PBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 92241, 96900, 96900, 96900, 500, 96900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(804, '2017-08-25 09:07:41', '2017-09-19 05:02:19', 100, 'BEL-REF-SRP-4059', 'BEL-REF-SRP-4059', 'Corporate', 'Sharp Refrigerator SJ T48RS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79109, 83104, 83104, 83104, 300, 83104, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(805, '2017-08-25 09:08:49', '2017-09-19 04:57:14', 100, 'BEL-REF-SRP-5008', 'BEL-REF-SRP-5008', 'Corporate', 'Sharp Refrigerator SJ K60MK2', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79010, 83000, 83000, 83000, 300, 83000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(806, '2017-08-25 09:09:33', '2017-09-19 05:00:27', 100, 'BEL-REF-SRP-5021', 'BEL-REF-SRP-5021', 'Corporate', 'Sharp Refrigerator SJ P58MK3AB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 115183, 115183, 115183, 115183, 500, 115183, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(809, '2017-08-25 09:11:22', NULL, 100, 'BEL-REF-SRP-5022', 'BEL-REF-SRP-5022', 'Corporate', 'SJ-PC58P2-BK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 124592, 130884, 130884, 130884, 500, 130884, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(811, '2017-08-25 09:12:12', NULL, 100, 'BEL-REF-SRP-5030', 'BEL-REF-SRP-5030', 'Corporate', 'SJ-S53VSL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 85673, 90000, 90000, 90000, 300, 90000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(813, '2017-08-25 09:13:30', NULL, 100, 'BEL-REF-SRP-5040', 'BEL-REF-SRP-5040', 'Corporate', 'SJ-MC54MK3BK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 103284, 108500, 108500, 108500, 500, 108500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(815, '2017-08-25 09:14:08', NULL, 100, 'BEL-REF-SRP-5056', 'BEL-REF-SRP-5056', 'Corporate', 'SJ-X62WBSLE/ SJ-F70PCSL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 209423, 220000, 220000, 220000, 1000, 220000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(817, '2017-08-25 09:14:54', NULL, 100, 'BEL-REF-SRP-5057', 'BEL-REF-SRP-5057', 'Corporate', 'SJ-FB74VASL/FP-74V-BK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 215135, 226000, 226000, 226000, 1000, 226000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(818, '2017-08-25 09:15:40', '2017-09-19 05:02:31', 100, 'BEL-REF-SRP-5077', 'BEL-REF-SRP-5077', 'Corporate', 'Sharp Refrigerator SJ X66TS SL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 142694, 149900, 149900, 149900, 700, 149900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(820, '2017-08-25 09:16:15', '2017-09-19 04:49:47', 100, 'BEL-REF-SRP-6005', 'BEL-REF-SRP-6005', 'Corporate', 'Sharp Refrigerator SJ FP79V BK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 217990, 229000, 229000, 229000, 1000, 229000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(821, '2017-08-25 09:17:03', '2017-09-19 08:10:26', 100, 'BEL-REF-TOS-1021', 'BEL-REF-TOS-1021', 'Corporate', 'Toshiba Refrigerator GR K21KPB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34745, 36500, 36500, 36500, 150, 36500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(822, '2017-08-25 09:17:37', '2017-09-19 08:13:36', 100, 'BEL-REF-TOS-1022', 'BEL-REF-TOS-1022', 'Corporate', 'Toshiba Refrigerator GR T21KT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 39505, 41500, 41500, 41500, 150, 41500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(823, '2017-08-25 09:18:11', '2017-09-19 08:10:07', 100, 'BEL-REF-TOS-1186', 'BEL-REF-TOS-1186', 'Corporate', 'Toshiba Refrigerator GR K20SPB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34745, 36500, 36500, 36500, 150, 36500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(825, '2017-08-25 09:18:49', '2017-09-19 08:14:16', 100, 'BEL-REF-TOS-2015', 'BEL-REF-TOS-2015', 'Corporate', 'Toshiba Refrigerator GR T26KT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46644, 49000, 49000, 49000, 200, 49000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(826, '2017-08-25 09:20:27', '2017-09-19 08:11:04', 100, 'BEL-REF-TOS-2021', 'BEL-REF-TOS-2021', 'Corporate', 'Toshiba Refrigerator GR K26KPB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 49024, 51500, 51500, 51500, 200, 51500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(827, '2017-08-25 09:21:13', '2017-09-19 08:10:43', 100, 'BEL-REF-TOS-2025', 'BEL-REF-TOS-2025', 'Corporate', 'Toshiba Refrigerator GR K24SPB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 41885, 44000, 44000, 44000, 200, 44000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(828, '2017-08-25 09:21:52', '2017-09-19 08:11:24', 100, 'BEL-REF-TOS-2075', 'BEL-REF-TOS-2075', 'Corporate', 'Toshiba Refrigerator GR R34SED', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 52356, 55000, 55000, 55000, 200, 55000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(829, '2017-08-25 09:22:30', '2017-09-19 08:14:33', 100, 'BEL-REF-TOS-3005', 'BEL-REF-TOS-3005', 'Corporate', 'Toshiba Refrigerator GR T32SEBZ DS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 57020, 57020, 57020, 57020, 250, 57020, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(831, '2017-08-25 09:23:24', NULL, 100, 'BEL-REF-TOS-3006', 'BEL-REF-TOS-3006', 'Corporate', 'GR-T32SEBZ(N) Gold', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 57972, 60900, 60900, 60900, 300, 60900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(834, '2017-08-25 09:25:15', '2017-09-19 08:12:22', 100, 'BEL-REF-TOS-3011', 'BEL-REF-TOS-3011', 'Corporate', 'Toshiba Refrigerator GR RG41SEDZ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 72346, 76000, 76000, 76000, 300, 76000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(836, '2017-08-25 09:25:51', '2017-09-19 08:11:47', 100, 'BEL-REF-TOS-3015', 'BEL-REF-TOS-3015', 'Corporate', 'Toshiba Refrigerator GR R39SED', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 56164, 59000, 59000, 59000, 300, 59000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(838, '2017-08-25 09:26:24', '2017-09-19 08:14:52', 100, 'BEL-REF-TOS-3030', 'BEL-REF-TOS-3030', 'Corporate', 'Toshiba Refrigerator GR T37SEBZ DS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 57020, 59900, 59900, 59900, 300, 59900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(839, '2017-08-25 09:27:22', NULL, 100, 'BEL-REF-TOS-3031', 'BEL-REF-TOS-3031', 'Corporate', 'GR-T37SEBZ(N) Gold', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 57972, 60900, 60900, 60900, 300, 60900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(841, '2017-08-25 09:28:41', '2017-09-19 08:12:42', 100, 'BEL-REF-TOS-4011', 'BEL-REF-TOS-4011', 'Corporate', 'Toshiba Refrigerator GR RG46SEDZ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 76059, 79900, 79900, 79900, 300, 79900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(843, '2017-08-25 09:29:18', '2017-09-19 08:12:03', 100, 'BEL-REF-TOS-4401', 'BEL-REF-TOS-4401', 'Corporate', 'Toshiba Refrigerator GR R48SED', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 69871, 73400, 73400, 73400, 300, 73400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(844, '2017-08-25 09:29:59', '2017-09-19 08:15:12', 100, 'BEL-REF-TOS-5010', 'BEL-REF-TOS-5010', 'Corporate', 'Toshiba Refrigerator GR WG58SEDZ DG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 112327, 118000, 118000, 118000, 500, 118000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(848, '2017-08-25 09:32:50', '2017-09-19 08:13:00', 100, 'BEL-REF-TOS-5011', 'BEL-REF-TOS-5011', 'Corporate', 'Toshiba Refrigerator GR RG66KDA GS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 119942, 126000, 126000, 126000, 500, 126000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(849, '2017-08-25 09:34:47', '2017-09-19 08:13:16', 100, 'BEL-REF-TOS-5012', 'BEL-REF-TOS-5012', 'Corporate', 'Toshiba Refrigerator GR RG66KDA GU', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 125654, 132000, 132000, 132000, 500, 132000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(851, '2017-08-25 09:35:52', NULL, 100, 'BEL-REF-VAN-3005', 'BEL-REF-VAN-3005', 'Corporate', 'MRD-33FFDS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46062, 49900, 49900, 49900, 300, 49900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(852, '2017-08-25 09:37:22', NULL, 100, 'BEL-REF-VAN-3010', 'BEL-REF-VAN-3010', 'Corporate', 'MRD-530VSBS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 78370, 84900, 84900, 84900, 700, 84900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(853, '2017-08-25 09:38:10', '2017-09-19 05:41:22', 100, 'BEL-REF-WHL-2010', 'BEL-REF-WHL-2010', 'Corporate', 'Whirlpool Refrigerator BCD 203LW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33352, 36900, 36900, 36900, 300, 36900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(854, '2017-08-25 09:39:01', '2017-09-19 05:23:59', 100, 'BEL-REF-WHL-2025', 'BEL-REF-WHL-2025', 'Corporate', 'Whirlpool Refrigerator 250RC (W/O)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34346, 38000, 38000, 38000, 300, 38000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(855, '2017-08-25 09:39:44', '2017-09-19 05:23:44', 100, 'BEL-REF-WHL-2026', 'BEL-REF-WHL-2026', 'Corporate', 'Whirlpool Refrigerator 250RC (T/T)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34346, 38000, 38000, 38000, 300, 38000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(856, '2017-08-25 09:40:20', '2017-09-19 05:23:27', 100, 'BEL-REF-WHL-2027', 'BEL-REF-WHL-2027', 'Corporate', 'Whirlpool Refrigerator 250RC (R/S)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34346, 38000, 38000, 38000, 300, 38000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(857, '2017-08-25 09:41:13', '2017-09-19 05:42:10', 100, 'BEL-REF-WHL-2070', 'BEL-REF-WHL-2070', 'Corporate', 'Whirlpool Refrigerator BCD 271LW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 41487, 45900, 45900, 45900, 300, 45900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(858, '2017-08-25 09:41:57', '2017-09-19 05:25:52', 100, 'BEL-REF-WHL-2075', 'BEL-REF-WHL-2075', 'Corporate', 'Whirlpool Refrigerator 290RC (W/O)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 37962, 42000, 42000, 42000, 300, 42000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(860, '2017-08-25 09:42:42', '2017-09-19 05:24:38', 100, 'BEL-REF-WHL-2076', 'BEL-REF-WHL-2076', 'Corporate', 'Whirlpool Refrigerator 290RC (T/T)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 37962, 42000, 42000, 42000, 300, 42000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(861, '2017-08-25 09:43:39', '2017-09-19 05:24:17', 100, 'BEL-REF-WHL-2077', 'BEL-REF-WHL-2077', 'Corporate', 'Whirlpool Refrigerator 290RC (R/S)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 37962, 42000, 42000, 42000, 300, 42000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(862, '2017-08-25 09:44:44', '2017-09-19 05:29:23', 100, 'BEL-REF-WHL-3015', 'BEL-REF-WHL-3015', 'Corporate', 'Whirlpool Refrigerator 330RC (W/O)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 40673, 45000, 45000, 45000, 300, 45000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(863, '2017-08-25 09:45:53', '2017-09-19 05:26:29', 100, 'BEL-REF-WHL-3016', 'BEL-REF-WHL-3016', 'Corporate', 'Whirlpool Refrigerator 330RC (T/T)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 40673, 45000, 45000, 45000, 300, 45000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(865, '2017-08-25 09:46:35', '2017-09-19 05:26:11', 100, 'BEL-REF-WHL-3017', 'BEL-REF-WHL-3017', 'Corporate', 'Whirlpool Refrigerator 330RC (R/S)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 40673, 45000, 45000, 45000, 300, 45000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(870, '2017-08-25 09:56:05', '2017-09-19 05:39:22', 100, 'BEL-REF-WHL-6001', 'BEL-REF-WHL-6001', 'Corporate', 'Whirlpool Refrigerator 5WRS22FDBF (Water Dispenser)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 203365, 225000, 225000, 225000, 2100, 225000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(871, '2017-08-25 09:58:26', '2017-09-19 05:40:12', 100, 'BEL-REF-WHL-6002', 'BEL-REF-WHL-6002', 'Corporate', 'Whirlpool Refrigerator 5WRS25KNBF', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 199900, 230000, 230000, 230000, 3000, 230000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(487, '2017-08-25 06:04:19', NULL, 100, 'BEL-RFA-CON-1011', 'BEL-RFA-CON-1011', 'Corporate', 'BE-2314', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3406, 3690, 3690, 3690, 20, 3690, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(489, '2017-08-25 06:05:05', NULL, 100, 'BEL-RFA-CON-1012', 'BEL-RFA-CON-1012', 'Corporate', 'BE-2316R', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4006, 4340, 4340, 4340, 20, 4340, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(492, '2017-08-25 06:05:50', NULL, 100, 'BEL-RFA-CON-1013', 'BEL-RFA-CON-1013', 'Corporate', 'BE-2318R', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4236, 4590, 4590, 4590, 25, 4590, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(494, '2017-08-25 06:06:26', NULL, 100, 'BEL-RFA-CON-1014', 'BEL-RFA-CON-1014', 'Corporate', 'BE-1412', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3220, 3488, 3488, 3488, 20, 3488, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(497, '2017-08-25 06:07:01', NULL, 100, 'BEL-RFA-CON-1016', 'BEL-RFA-CON-1016', 'Corporate', 'BE-1612 R (Remote)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3920, 4246, 4246, 4246, 25, 4246, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(499, '2017-08-25 06:07:34', NULL, 100, 'BEL-RFA-CON-1017', 'BEL-RFA-CON-1017', 'Corporate', 'BE-1612', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3494, 3786, 3786, 3786, 25, 3786, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(501, '2017-08-25 06:08:06', NULL, 100, 'BEL-RFA-CON-1018', 'BEL-RFA-CON-1018', 'Corporate', 'BE-1812 R (Remote)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4616, 5000, 5000, 5000, 25, 5000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(504, '2017-08-25 06:09:47', NULL, 100, 'BEL-RFA-CON-1020', 'BEL-RFA-CON-1020', 'Corporate', 'BE-2389', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2484, 2690, 2690, 2690, 15, 2690, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(505, '2017-08-25 06:10:29', NULL, 100, 'BEL-RFA-CON-1022', 'BEL-RFA-CON-1022', 'Corporate', 'BE-2391', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3084, 3340, 3340, 3340, 15, 3340, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(507, '2017-08-25 06:11:53', NULL, 100, 'BEL-RFA-CON-1023', 'BEL-RFA-CON-1023', 'Corporate', 'BE-K2926RD', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3508, 3800, 3800, 3800, 25, 3800, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(508, '2017-08-25 06:12:52', NULL, 100, 'BEL-RFA-CON-1027', 'BEL-RFA-CON-1027', 'Corporate', 'BE-2396', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3452, 3740, 3740, 3740, 25, 3740, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(509, '2017-08-25 06:13:41', NULL, 100, 'BEL-RFA-CON-1030', 'BEL-RFA-CON-1030', 'Corporate', 'BE-2399', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2714, 2940, 2940, 2940, 20, 2940, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(512, '2017-08-25 06:15:02', NULL, 100, 'BEL-RFA-CON-1041', 'BEL-RFA-CON-1041', 'Corporate', 'BE-2416', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3914, 4240, 4240, 4240, 25, 4240, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(514, '2017-08-25 06:15:51', NULL, 100, 'BEL-RFA-CON-1043', 'BEL-RFA-CON-1043', 'Corporate', 'BE-1812S/2418', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4144, 4490, 4490, 4490, 25, 4490, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(518, '2017-08-25 06:17:22', '2017-09-17 10:32:54', 100, 'BEL-RFA-CON-1051', 'BEL-RFA-CON-1051', 'Corporate', 'Conion Rechargeable Fan BE HS 5968 WBK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 5076, 5500, 5500, 5500, 25, 5500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(519, '2017-08-25 06:18:22', NULL, 100, 'BEL-RFA-CON-1061', 'BEL-RFA-CON-1061', 'Corporate', 'BE-2712', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3043, 3297, 3297, 3297, 20, 3297, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(520, '2017-08-25 06:18:59', NULL, 100, 'BEL-RFA-CON-1071', 'BEL-RFA-CON-1071', 'Corporate', 'BE-2812', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2622, 2840, 2840, 2840, 15, 2840, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(521, '2017-08-25 06:19:38', '2017-09-17 10:32:09', 100, 'BEL-RFA-CON-1081', 'BEL-RFA-CON-1081', 'Corporate', 'Conion Rechargeable Fan BE HS 5966 WBL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4524, 4900, 4900, 4900, 25, 4900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(523, '2017-08-25 06:20:25', '2017-09-17 10:31:50', 100, 'BEL-RFA-CON-1083', 'BEL-RFA-CON-1083', 'Corporate', 'Conion Rechargeable Fan BE HS 5602 LG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4154, 4500, 4500, 4500, 25, 4500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(286, '2017-08-25 04:25:12', '2017-09-19 09:24:55', 100, 'BEL-ROT-CON-1010', 'BEL-ROT-CON-1010', 'Corporate', 'Conion Ruti Maker SW 292', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1717, 1900, 1900, 1900, 15, 1900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(288, '2017-08-25 04:25:54', NULL, 100, 'BEL-ROT-CON-1020', 'BEL-ROT-CON-1020', 'Corporate', 'SW-2093 (Roti Maker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2170, 2400, 2400, 2400, 15, 2400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(872, '2017-08-25 09:59:47', '2017-09-19 07:53:41', 100, 'BEL-SMR-CON-1010', 'BEL-SMR-CON-1010', 'Corporate', 'Conion Sandwich Maker CS 600', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1002, 1158, 1158, 1158, 10, 1158, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(874, '2017-08-25 10:00:32', '2017-09-19 07:55:42', 100, 'BEL-SMR-CON-1015', 'BEL-SMR-CON-1015', 'Corporate', 'Conion Sandwich Maker CS 625', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 862, 996, 996, 996, 10, 996, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(875, '2017-08-25 10:01:10', '2017-09-19 07:56:41', 100, 'BEL-SMR-CON-1016', 'BEL-SMR-CON-1016', 'Corporate', 'Conion Sandwich Maker CS 626', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 864, 998, 998, 998, 10, 998, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(885, '2017-08-25 10:06:40', '2017-09-19 07:57:21', 100, 'BEL-SMR-PAN-1005', 'BEL-SMR-PAN-1005', 'Corporate', 'Philips Sandwich Maker HD 2394', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2725, 2892, 2892, 2892, 10, 2892, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(888, '2017-08-25 10:10:06', NULL, 100, 'BEL-SND-PHL-1001', 'BEL-SND-PHL-1001', 'Corporate', 'SANDWICH MAKER HD2393/01', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2647, 2992, 2992, 2992, 25, 2992, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(889, '2017-08-25 10:11:04', NULL, 100, 'BEL-SND-PHL-1002', 'BEL-SND-PHL-1002', 'Corporate', 'SANDWICH MAKER HD 2394', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3174, 3588, 3588, 3588, 25, 3588, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(289, '2017-08-25 04:26:37', '2017-09-19 07:57:23', 100, 'BEL-SNK-CON-1015', 'BEL-SNK-CON-1015', 'Corporate', 'Conion Snack Maker SW 237', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1717, 1900, 1900, 1900, 15, 1900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(877, '2017-08-25 10:01:45', '2017-09-19 07:59:02', 100, 'BEL-TSR-CON-1005', 'BEL-TSR-CON-1005', 'Corporate', 'Conion Toaster CT 801', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1036, 1036, 1036, 1036, 10, 1036, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(878, '2017-08-25 10:02:39', '2017-09-19 09:28:34', 100, 'BEL-TSR-CON-1012', 'BEL-TSR-CON-1012', 'Corporate', 'Conion Toaster CT 808', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 686, 792, 792, 792, 10, 792, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(879, '2017-08-25 10:03:13', '2017-09-19 08:01:18', 100, 'BEL-TSR-CON-1015', 'BEL-TSR-CON-1015', 'Corporate', 'Conion Toaster CT 811', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1166, 1347, 1347, 1347, 10, 1347, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(880, '2017-08-25 10:03:45', '2017-09-19 08:01:42', 100, 'BEL-TSR-CON-1016', 'BEL-TSR-CON-1016', 'Corporate', 'Conion Toaster CT 812', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1122, 1122, 1122, 1122, 10, 1122, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(881, '2017-08-25 10:04:20', '2017-09-19 08:03:00', 100, 'BEL-TSR-CON-1021', 'BEL-TSR-CON-1021', 'Corporate', 'Conion Toaster CT 817', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1033, 1194, 1194, 1194, 10, 1194, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(882, '2017-08-25 10:04:51', '2017-09-19 08:04:45', 100, 'BEL-TSR-CON-1023', 'BEL-TSR-CON-1023', 'Corporate', 'Conion Toaster CT 819', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 819, 946, 946, 946, 10, 946, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(883, '2017-08-25 10:05:20', '2017-09-19 08:06:37', 100, 'BEL-TSR-CON-1033', 'BEL-TSR-CON-1033', 'Corporate', 'Conion Toaster CT 829', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1294, 1294, 1294, 1294, 10, 1294, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(884, '2017-08-25 10:05:50', '2017-09-19 08:08:01', 100, 'BEL-TSR-CON-1081', 'BEL-TSR-CON-1081', 'Corporate', 'Conion Toaster CT 912', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1382, 1596, 1596, 1596, 10, 1596, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(886, '2017-08-25 10:07:17', '2017-09-19 10:46:45', 100, 'BEL-TSR-PAN-1005', 'BEL-TSR-PAN-1005', 'Corporate', 'Panasonic Toaster NT GP1', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3148, 3340, 3340, 3340, 10, 3340, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(887, '2017-08-25 10:08:53', '2017-09-19 10:48:40', 100, 'BEL-TSR-PAN-1006', 'BEL-TSR-PAN-1006', 'Corporate', 'Panasonic Toaster NT GT1', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2865, 3040, 3040, 3040, 10, 3040, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(890, '2017-08-25 10:11:41', '2017-09-19 07:58:08', 100, 'BEL-TSR-PHL-1005', 'BEL-TSR-PHL-1005', 'Corporate', 'Philips Toaster HD 2595', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2204, 2492, 2492, 2492, 25, 2492, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(891, '2017-08-25 10:12:19', '2017-09-19 07:58:29', 100, 'BEL-TSR-PHL-1006', 'BEL-TSR-PHL-1006', 'Corporate', 'Philips Toaster HD 2630', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2777, 3140, 3140, 3140, 25, 3140, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(258, '2017-08-24 12:49:14', NULL, 100, 'BEL-UPS-VGD-1001', 'BEL-UPS-VGD-1001', 'Corporate', 'DU 1000 Smart', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9030, 9990, 9990, 9990, 100, 9990, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(892, '2017-08-25 10:13:08', '2017-09-19 04:25:13', 100, 'BEL-VCL-HIT-1010', 'BEL-VCL-HIT-1010', 'Corporate', 'Hitachi Vacuum Cleaner CV BA18', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 11099, 11900, 11900, 11900, 50, 11900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(893, '2017-08-25 10:13:58', '2017-09-19 04:26:30', 100, 'BEL-VCL-HIT-1011', 'BEL-VCL-HIT-1011', 'Corporate', 'Hitachi Vacuum Cleaner CV BA20V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13011, 13950, 13950, 13950, 50, 13950, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(894, '2017-08-25 10:14:58', NULL, 100, 'BEL-VCL-HIT-1012', 'BEL-VCL-HIT-1012', 'Corporate', 'CV-BA22V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 15763, 16900, 16900, 16900, 100, 16900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(895, '2017-08-25 10:16:42', '2017-09-19 09:03:02', 100, 'BEL-VCL-LGE-1010', 'BEL-VCL-LGE-1010', 'Corporate', 'LG Vacuum Cleaner VC2316NND', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9700, 10400, 10400, 10400, 50, 10400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(922, '2017-08-25 10:36:33', '2017-09-19 09:02:29', 100, 'BEL-VCL-LGE-1011', 'BEL-VCL-LGE-1011', 'Corporate', 'LG Vacuum Cleaner VB2716NND', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8674, 9300, 9300, 9300, 50, 9300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(926, '2017-08-25 10:37:24', '2017-09-19 09:03:40', 100, 'BEL-VCL-LGE-1012', 'BEL-VCL-LGE-1012', 'Corporate', 'LG Vacuum Cleaner VC4220NHT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 12964, 13900, 13900, 13900, 75, 13900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(932, '2017-08-25 10:41:28', '2017-09-19 09:03:17', 100, 'BEL-VCL-LGE-1013', 'BEL-VCL-LGE-1013', 'Corporate', 'LG Vacuum Cleaner VC3318NNT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10167, 10900, 10900, 10900, 50, 10900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(935, '2017-08-25 10:42:36', '2017-09-19 10:49:00', 100, 'BEL-VCL-PAN-1002', 'BEL-VCL-PAN-1002', 'Corporate', 'Panasonic Vacuum Cleaner MC CG240', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6436, 6900, 6900, 6900, 25, 6900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(937, '2017-08-25 10:43:30', '2017-09-19 10:50:10', 100, 'BEL-VCL-PAN-1003', 'BEL-VCL-PAN-1003', 'Corporate', 'Panasonic Vacuum Cleaner MC CG300', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6996, 7500, 7500, 7500, 25, 7500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(940, '2017-08-25 10:44:05', '2017-09-19 10:49:57', 100, 'BEL-VCL-PAN-1004', 'BEL-VCL-PAN-1004', 'Corporate', 'Panasonic Vacuum Cleaner MC CG301', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 6902, 7400, 7400, 7400, 25, 7400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(942, '2017-08-25 10:44:49', '2017-09-19 10:50:34', 100, 'BEL-VCL-PAN-1005', 'BEL-VCL-PAN-1005', 'Corporate', 'Panasonic Vacuum Cleaner MC CG331', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 7928, 8500, 8500, 8500, 25, 8500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(953, '2017-08-25 10:48:41', '2017-09-19 07:55:39', 100, 'BEL-VCL-PHL-1011', 'BEL-VCL-PHL-1011', 'Corporate', 'Philips Power Life Vacuum Cleaner FC8452 61', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10167, 10900, 10900, 10900, 50, 10900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(955, '2017-08-25 10:49:40', '2017-09-19 07:31:39', 100, 'BEL-VCL-PHL-1020', 'BEL-VCL-PHL-1020', 'Corporate', 'Philips Aqua Trio Pro Vacuum Cleaner FC7088 61', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 37308, 40000, 40000, 40000, 200, 40000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(965, '2017-08-25 10:54:27', '2017-09-19 07:58:47', 100, 'BEL-VCL-PHL-1041', 'BEL-VCL-PHL-1041', 'Corporate', 'Philips Vacuum Cleaner FC 8082', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 7368, 7900, 7900, 7900, 25, 7900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(968, '2017-08-25 10:55:21', '2017-09-19 07:57:40', 100, 'BEL-VCL-PHL-1090', 'BEL-VCL-PHL-1090', 'Corporate', 'Philips Sweap and Steam Cleaner FC7020 61', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 13990, 15000, 15000, 15000, 75, 15000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(975, '2017-08-25 10:57:43', '2017-09-19 09:04:28', 100, 'BEL-VCL-SAM-1012', 'BEL-VCL-SAM-1012', 'Corporate', 'Samsung Vacuum Cleaner VCC4570S3K', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9140, 9800, 9800, 9800, 50, 9800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(978, '2017-08-25 10:58:29', '2017-09-19 09:05:42', 100, 'BEL-VCL-SAM-1015', 'BEL-VCL-SAM-1015', 'Corporate', 'Samsung Vacuum Cleaner VCC5451V31', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10260, 11000, 11000, 11000, 50, 11000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(983, '2017-08-25 10:59:20', '2017-09-19 05:08:19', 100, 'BEL-VCL-SRP-1011', 'BEL-VCL-SRP-1011', 'Corporate', 'Sharp Vacuum Cleaner EC CB18', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8301, 8900, 8900, 8900, 50, 8900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1045, '2017-08-25 11:23:27', '2017-09-19 05:08:39', 100, 'BEL-VCL-SRP-1013', 'BEL-VCL-SRP-1013', 'Corporate', 'Sharp Vacuum Cleaner EC CB20', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 7368, 7900, 7900, 7900, 50, 7900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1084, '2017-08-25 11:48:08', '2017-09-19 05:09:27', 100, 'BEL-VCL-SRP-1015', 'BEL-VCL-SRP-1015', 'Corporate', 'Sharp Vacuum Cleaner EC NS16', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 8394, 9000, 9000, 9000, 50, 9000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1086, '2017-08-25 11:48:45', '2017-09-19 05:08:52', 100, 'BEL-VCL-SRP-1016', 'BEL-VCL-SRP-1016', 'Corporate', 'Sharp Vacuum Cleaner EC LS18', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9467, 10150, 10150, 10150, 50, 10150, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1087, '2017-08-25 11:49:12', '2017-09-19 05:09:11', 100, 'BEL-VCL-SRP-1017', 'BEL-VCL-SRP-1017', 'Corporate', 'Sharp Vacuum Cleaner EC LS20', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10073, 10800, 10800, 10800, 50, 10800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1088, '2017-08-25 11:49:51', NULL, 100, 'BEL-WMC-CON-1006', 'BEL-WMC-CON-1006', 'Corporate', 'BE-TA6P132PS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 10743, 11400, 11400, 11400, 50, 11400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1090, '2017-08-25 11:50:41', '2017-09-19 08:10:00', 100, 'BEL-WMC-CON-1008', 'BEL-WMC-CON-1008', 'Corporate', 'Conion Washing Machine BE TM8P51PQ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 12438, 13200, 13200, 13200, 50, 13200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1093, '2017-08-25 11:51:17', '2017-09-19 08:09:28', 100, 'BEL-WMC-CON-1012', 'BEL-WMC-CON-1012', 'Corporate', 'Conion Washing Machine BE TE12P121PQ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 14323, 15200, 15200, 15200, 50, 15200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1095, '2017-08-25 11:52:14', '2017-09-19 08:09:02', 100, 'BEL-WMC-CON-1021', 'BEL-WMC-CON-1021', 'Corporate', 'Conion Washing Machine BE AM7S142G', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 19977, 21200, 21200, 21200, 100, 21200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1097, '2017-08-25 11:52:54', NULL, 100, 'BEL-WMC-CON-1022', 'BEL-WMC-CON-1022', 'Corporate', 'BE-AM8S173G', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22050, 23400, 23400, 23400, 100, 23400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1099, '2017-08-25 11:53:26', '2017-09-19 08:08:31', 100, 'BEL-WMC-CON-1027', 'BEL-WMC-CON-1027', 'Corporate', 'Conion Washing Machine BE AE12S202G', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23840, 25300, 25300, 25300, 100, 25300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1102, '2017-08-25 11:53:56', '2017-09-19 08:11:09', 100, 'BEL-WMC-CON-2011', 'BEL-WMC-CON-2011', 'Corporate', 'Conion Washing Machine BEG10 5201BEW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23275, 24700, 24700, 24700, 100, 24700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1103, '2017-08-25 11:54:27', '2017-09-19 08:10:19', 100, 'BEL-WMC-CON-2012', 'BEL-WMC-CON-2012', 'Corporate', 'Conion Washing Machine BED10 5203BTW', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 27798, 29500, 29500, 29500, 150, 29500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1105, '2017-08-25 11:55:02', '2017-09-19 04:29:29', 100, 'BEL-WMC-HIT-1007', 'BEL-WMC-HIT-1007', 'Corporate', 'Hitachi Washing Machine NW 75WYS3CS WH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29712, 30900, 30900, 30900, 100, 30900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1108, '2017-08-25 11:55:35', '2017-09-19 04:33:04', 100, 'BEL-WMC-HIT-1008', 'BEL-WMC-HIT-1008', 'Corporate', 'Hitachi Washing Machine SF 80P', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 30673, 31900, 31900, 31900, 100, 31900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1110, '2017-08-25 11:56:12', '2017-09-19 04:33:25', 100, 'BEL-WMC-HIT-1009', 'BEL-WMC-HIT-1009', 'Corporate', 'Hitachi Washing Machine SF 90P', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32596, 33900, 33900, 33900, 100, 33900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1113, '2017-08-25 11:56:54', '2017-09-19 04:29:48', 100, 'BEL-WMC-HIT-1011', 'BEL-WMC-HIT-1011', 'Corporate', 'Hitachi Washing Machine SF 110LJ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34519, 35900, 35900, 35900, 100, 35900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1115, '2017-08-25 11:57:38', '2017-09-19 04:30:05', 100, 'BEL-WMC-HIT-1101', 'BEL-WMC-HIT-1101', 'Corporate', 'Hitachi Washing Machine SF 110SS3C WH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46154, 48000, 48000, 48000, 150, 48000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1117, '2017-08-25 11:58:13', '2017-09-19 04:31:59', 100, 'BEL-WMC-HIT-1301', 'BEL-WMC-HIT-1301', 'Corporate', 'Hitachi Washing Machine SF 130XWV3C SL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 57596, 59900, 59900, 59900, 200, 59900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1119, '2017-08-25 11:58:59', '2017-09-19 04:32:24', 100, 'BEL-WMC-HIT-1401', 'BEL-WMC-HIT-1401', 'Corporate', 'Hitachi Washing Machine SF 140XAV 3C SL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 62500, 65000, 65000, 65000, 200, 65000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1121, '2017-08-25 11:59:51', '2017-09-19 04:32:45', 100, 'BEL-WMC-HIT-1601', 'BEL-WMC-HIT-1601', 'Corporate', 'Hitachi Washing Machine SF 160XWV3C CH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 69231, 72000, 72000, 72000, 250, 72000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live');
INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xvatpct`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(1122, '2017-08-25 12:00:37', '2017-09-19 04:28:32', 100, 'BEL-WMC-HIT-2008', 'BEL-WMC-HIT-2008', 'Corporate', 'Hitachi Washing Machine BD 80XAV 3C BK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 91346, 95000, 95000, 95000, 300, 95000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1124, '2017-08-25 12:01:11', '2017-09-19 04:28:55', 100, 'BEL-WMC-HIT-2019', 'BEL-WMC-HIT-2019', 'Corporate', 'Hitachi Washing Machine BD 90XAV 3C BK', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 105673, 109900, 109900, 109900, 300, 109900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1126, '2017-08-25 12:01:48', '2017-09-19 08:48:20', 100, 'BEL-WMC-LGE-1007', 'BEL-WMC-LGE-1007', 'Corporate', 'LG Washing Machine T6511TDFV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25962, 27000, 27000, 27000, 100, 27000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1127, '2017-08-25 12:02:25', '2017-09-19 08:48:39', 100, 'BEL-WMC-LGE-1008', 'BEL-WMC-LGE-1008', 'Corporate', 'LG Washing Machine WF T 8055TD', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28846, 30000, 30000, 30000, 100, 30000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1129, '2017-08-25 12:02:59', '2017-09-19 08:47:48', 100, 'BEL-WMC-LGE-1009', 'BEL-WMC-LGE-1009', 'Corporate', 'LG Washing Machine T 8507 TEFTO', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31731, 33000, 33000, 33000, 100, 33000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1132, '2017-08-25 12:03:33', '2017-09-19 08:49:01', 100, 'BEL-WMC-LGE-1015', 'BEL-WMC-LGE-1015', 'Corporate', 'LG Washing Machine WF T1176TD', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34615, 36000, 36000, 36000, 100, 36000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1135, '2017-08-25 12:04:04', '2017-09-19 08:49:48', 100, 'BEL-WMC-LGE-1018', 'BEL-WMC-LGE-1018', 'Corporate', 'LG Washing Machine WF T1277TD', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36538, 38000, 38000, 38000, 100, 38000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1136, '2017-08-25 12:04:40', NULL, 100, 'BEL-WMC-LGE-1019', 'BEL-WMC-LGE-1019', 'Corporate', 'WF-T1365TD', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 40288, 41900, 41900, 41900, 100, 41900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1139, '2017-08-25 12:05:15', '2017-09-19 08:47:00', 100, 'BEL-WMC-LGE-1021', 'BEL-WMC-LGE-1021', 'Corporate', 'LG Washing Machine F12B8NDP25', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 50865, 52900, 52900, 52900, 200, 52900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1141, '2017-08-25 12:05:45', '2017-09-19 08:48:02', 100, 'BEL-WMC-LGE-1022', 'BEL-WMC-LGE-1022', 'Corporate', 'LG Washing Machine F1496ADP24', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 65385, 68000, 68000, 68000, 200, 68000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1143, '2017-08-25 12:06:51', '2017-09-19 08:49:45', 100, 'BEL-WMC-LGE-1051', 'BEL-WMC-LGE-1051', 'Corporate', 'LG Washing Machine WP 1400ROT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22115, 23000, 23000, 23000, 50, 23000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1152, '2017-08-25 12:10:01', '2017-09-19 08:50:47', 100, 'BEL-WMC-LGE-1071', 'BEL-WMC-LGE-1071', 'Corporate', 'LG Washing Machine WP 1650WST', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26538, 27600, 27600, 27600, 100, 27600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1155, '2017-08-25 12:10:56', NULL, 100, 'BEL-WMC-MID-1001', 'BEL-WMC-MID-1001', 'Corporate', 'MTE100-P1101Q', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 16250, 16900, 16900, 16900, 50, 16900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1157, '2017-08-25 12:11:33', NULL, 100, 'BEL-WMC-MID-8001', 'BEL-WMC-MID-8001', 'Corporate', 'MAM70-512/01FM-ID', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26827, 27900, 27900, 27900, 100, 27900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1172, '2017-08-25 12:19:42', '2017-09-19 10:53:04', 100, 'BEL-WMC-PAN-1010', 'BEL-WMC-PAN-1010', 'Corporate', 'Panasonic Washing Machine NA 140VG4', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 64038, 66600, 66600, 66600, 250, 66600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1175, '2017-08-25 12:20:28', '2017-09-19 10:54:06', 100, 'BEL-WMC-PAN-1070', 'BEL-WMC-PAN-1070', 'Corporate', 'Panasonic Washing Machine NA F70B3', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25712, 26740, 26740, 26740, 100, 26740, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1178, '2017-08-25 12:21:09', '2017-09-19 10:50:55', 100, 'BEL-WMC-PAN-1071', 'BEL-WMC-PAN-1071', 'Corporate', 'Panasonic Washing Machine NA 107VC4', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46731, 48600, 48600, 48600, 150, 48600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1179, '2017-08-25 12:21:37', '2017-09-19 10:52:25', 100, 'BEL-WMC-PAN-1072', 'BEL-WMC-PAN-1072', 'Corporate', 'Panasonic Washing Machine NA 127VB3', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 47692, 49600, 49600, 49600, 150, 49600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1181, '2017-08-25 12:22:10', '2017-09-19 10:54:40', 100, 'BEL-WMC-PAN-1075', 'BEL-WMC-PAN-1075', 'Corporate', 'Panasonic Washing Machine NA F75B3', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23558, 24500, 24500, 24500, 75, 24500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1184, '2017-08-25 12:22:46', '2017-09-19 10:54:52', 100, 'BEL-WMC-PAN-1080', 'BEL-WMC-PAN-1080', 'Corporate', 'Panasonic Washing Machine NA F80S3', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28173, 29300, 29300, 29300, 100, 29300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1186, '2017-08-25 12:23:22', '2017-09-19 10:53:25', 100, 'BEL-WMC-PAN-1100', 'BEL-WMC-PAN-1100', 'Corporate', 'Panasonic Washing Machine NA F100B4', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32212, 33500, 33500, 33500, 100, 33500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1190, '2017-08-25 12:24:26', '2017-09-19 10:53:44', 100, 'BEL-WMC-PAN-1101', 'BEL-WMC-PAN-1101', 'Corporate', 'Panasonic Washing Machine NA F110H2', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38462, 40000, 40000, 40000, 100, 40000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1193, '2017-08-25 12:25:03', '2017-09-19 10:51:43', 100, 'BEL-WMC-PAN-6001', 'BEL-WMC-PAN-6001', 'Corporate', 'Panasonic Washing Machine NA 126MB02', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38365, 39900, 39900, 39900, 100, 39900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1196, '2017-08-25 12:26:17', '2017-09-19 10:52:05', 100, 'BEL-WMC-PAN-7001', 'BEL-WMC-PAN-7001', 'Corporate', 'Panasonic Washing Machine NA 127MB02', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42212, 43900, 43900, 43900, 150, 43900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1198, '2017-08-25 12:26:51', '2017-09-19 08:51:27', 100, 'BEL-WMC-SAM-1006', 'BEL-WMC-SAM-1006', 'Corporate', 'Samsung Washing Machine WF 0600NCS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 39423, 41000, 41000, 41000, 150, 41000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1199, '2017-08-25 12:27:29', '2017-09-19 08:52:10', 100, 'BEL-WMC-SAM-1008', 'BEL-WMC-SAM-1008', 'Corporate', 'Samsung Washing Machine WF 1802WPU', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45192, 47000, 47000, 47000, 150, 47000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1201, '2017-08-25 12:28:03', '2017-09-19 08:51:46', 100, 'BEL-WMC-SAM-1021', 'BEL-WMC-SAM-1021', 'Corporate', 'Samsung Washing Machine WA 13P5PEC', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29808, 31000, 31000, 31000, 100, 31000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1202, '2017-08-25 12:30:01', '2017-09-19 08:52:38', 100, 'BEL-WMC-SAM-1026', 'BEL-WMC-SAM-1026', 'Corporate', 'Samsung Washing Machine WT 15J7PEC', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25962, 27000, 27000, 27000, 100, 27000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1213, '2017-08-25 12:42:12', '2017-09-19 05:11:17', 100, 'BEL-WMC-SRP-1008', 'BEL-WMC-SRP-1008', 'Corporate', 'Sharp Washing Machine ES S585EWP', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28750, 29900, 29900, 29900, 100, 29900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1214, '2017-08-25 12:43:03', '2017-09-19 05:11:36', 100, 'BEL-WMC-SRP-1010', 'BEL-WMC-SRP-1010', 'Corporate', 'Sharp Washing Machine ES S105DSS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 41250, 42900, 42900, 42900, 150, 42900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1215, '2017-08-25 12:43:54', NULL, 100, 'BEL-WMC-TOS-1007', 'BEL-WMC-TOS-1007', 'Corporate', 'AW-A750ST', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22115, 23000, 23000, 23000, 50, 23000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1216, '2017-08-25 12:44:45', '2017-09-19 08:45:57', 100, 'BEL-WMC-TOS-1008', 'BEL-WMC-TOS-1008', 'Corporate', 'Toshiba Washing Machine AW E900LSE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24038, 25000, 25000, 25000, 75, 25000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1217, '2017-08-25 12:45:33', '2017-09-19 08:45:23', 100, 'BEL-WMC-TOS-1009', 'BEL-WMC-TOS-1009', 'Corporate', 'Toshiba Washing Machine AW B1000GSE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28846, 30000, 30000, 30000, 100, 30000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1218, '2017-08-25 12:46:32', NULL, 100, 'BEL-WMC-TOS-1010', 'BEL-WMC-TOS-1010', 'Corporate', 'AW-B1100GSE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33654, 35000, 35000, 35000, 100, 35000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1219, '2017-08-25 12:47:17', '2017-09-19 08:45:42', 100, 'BEL-WMC-TOS-1012', 'BEL-WMC-TOS-1012', 'Corporate', 'Toshiba Washing Machine AW DC1300WS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 43269, 45000, 45000, 45000, 150, 45000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1212, '2017-08-25 12:40:38', '2017-09-19 05:44:06', 100, 'BEL-WMC-WHL-1062', 'BEL-WMC-WHL-1062', 'Corporate', 'Whirlpool Washing Machine 6.2 Kg Stainwash Deep Clean', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 0, 27000, 27000, 27000, 200, 27000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1211, '2017-08-25 12:38:44', '2017-09-19 05:45:42', 100, 'BEL-WMC-WHL-1070', 'BEL-WMC-WHL-1070', 'Corporate', 'Whirlpool Washing Machine WWT 70X (Twin Tub)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 11908, 12900, 12900, 12900, 100, 12900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1210, '2017-08-25 12:38:00', '2017-09-19 05:44:25', 100, 'BEL-WMC-WHL-1071', 'BEL-WMC-WHL-1071', 'Corporate', 'Whirlpool Washing Machine 7 Kg Supreme Care 7014', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46062, 49900, 49900, 49900, 300, 49900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1209, '2017-08-25 12:37:03', '2017-09-19 05:44:46', 100, 'BEL-WMC-WHL-1080', 'BEL-WMC-WHL-1080', 'Corporate', 'Whirlpool Washing Machine 8 Kg Bloom Wash World Series', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33138, 35900, 35900, 35900, 300, 35900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1208, '2017-08-25 12:36:04', '2017-09-19 05:45:07', 100, 'BEL-WMC-WHL-1081', 'BEL-WMC-WHL-1081', 'Corporate', 'Whirlpool Washing Machine 8 Kg Supreme Care 8014', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 50676, 54900, 54900, 54900, 300, 54900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1207, '2017-08-25 12:34:37', '2017-09-19 05:45:24', 100, 'BEL-WMC-WHL-1090', 'BEL-WMC-WHL-1090', 'Corporate', 'Whirlpool Washing Machine 9 Kg Supreme Care 9014', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 55292, 59900, 59900, 59900, 500, 59900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1206, '2017-08-25 12:33:32', '2017-09-19 05:43:05', 100, 'BEL-WMC-WHL-1101', 'BEL-WMC-WHL-1101', 'Corporate', 'Whirlpool Washing Machine 11 Kg 31123 (Bloom Wash)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36000, 39000, 39000, 39000, 300, 39000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1205, '2017-08-25 12:32:41', '2017-09-19 05:42:44', 100, 'BEL-WMC-WHL-1102', 'BEL-WMC-WHL-1102', 'Corporate', 'Whirlpool Washing Machine 11 Kg 110X (Twin Tub)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 18370, 19900, 19900, 19900, 100, 19900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1204, '2017-08-25 12:31:24', '2017-09-19 05:42:28', 100, 'BEL-WMC-WHL-1103', 'BEL-WMC-WHL-1103', 'Corporate', 'Whirlpool Washing Machine 10.5 Kg 3LWTW4800YQ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 64524, 69900, 69900, 69900, 500, 69900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1203, '2017-08-25 12:30:35', '2017-09-19 05:43:22', 100, 'BEL-WMC-WHL-1301', 'BEL-WMC-WHL-1301', 'Corporate', 'Whirlpool Washing Machine 13 Kg 130X (Twin Tub)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 20216, 21900, 21900, 21900, 100, 21900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(188, '2017-08-24 10:40:31', '2017-09-19 07:18:07', 100, 'BEL-WPF-KNT-1001', 'BEL-WPF-KNT-1001', 'Corporate', 'KENT Gold Plus Water Purifier', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3462, 3600, 3600, 3600, 15, 3600, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(198, '2017-08-24 11:57:22', '2017-09-19 07:18:39', 100, 'BEL-WPF-KNT-2001', 'BEL-WPF-KNT-2001', 'Corporate', 'KENT Super Star Water Purifier', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22115, 23000, 23000, 23000, 90, 23000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(202, '2017-08-24 11:58:47', NULL, 100, 'BEL-WPF-KNT-2002', 'BEL-WPF-KNT-2002', 'Corporate', 'KENT SUPER STAR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21635, 22500, 22500, 22500, 90, 22500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(204, '2017-08-24 11:59:45', NULL, 100, 'BEL-WPF-KNT-2003', 'BEL-WPF-KNT-2003', 'Corporate', 'KENT SUPERB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26923, 28000, 28000, 28000, 100, 28000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(206, '2017-08-24 12:00:55', NULL, 100, 'BEL-WPF-KNT-2004', 'BEL-WPF-KNT-2004', 'Corporate', 'KENT PRIME', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23077, 24000, 24000, 24000, 100, 24000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(195, '2017-08-24 11:50:05', NULL, 100, 'BEL-WPF-KNT-2005', 'BEL-WPF-KNT-2005', 'Corporate', 'KENT PRISTINE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22981, 23900, 23900, 23900, 100, 23900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(212, '2017-08-24 12:07:20', NULL, 100, 'BEL-WPF-KNT-3002', 'BEL-WPF-KNT-3002', 'Corporate', 'Activated Carbon', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 337, 350, 350, 350, 1, 350, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(224, '2017-08-24 12:23:09', NULL, 100, 'BEL-WPF-UNI-1001', 'BEL-WPF-UNI-1001', 'Corporate', 'Pureit-GKK (1500L)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 673, 700, 700, 700, 3, 700, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(226, '2017-08-24 12:24:16', NULL, 100, 'BEL-WPF-UNI-1002', 'BEL-WPF-UNI-1002', 'Corporate', 'Pureit', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2875, 2990, 2990, 2990, 10, 2990, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(229, '2017-08-24 12:26:30', NULL, 100, 'BEL-WPF-UNI-1003', 'BEL-WPF-UNI-1003', 'Corporate', 'Pureit-GKK (3000L)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1154, 1200, 1200, 1200, 5, 1200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(232, '2017-08-24 12:28:59', NULL, 100, 'BEL-WPF-UNI-1004', 'BEL-WPF-UNI-1004', 'Corporate', 'Pedestal Stand', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 221, 230, 230, 230, 1, 230, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(693, '2017-08-25 07:39:27', '2017-08-26 04:32:52', 100, 'BLN-PHL-1011', 'BLN-PHL-1011', 'Corporate', 'HL1606 (3 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3530, 3990, 3990, 3990, 25, 3990, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(694, '2017-08-25 07:40:11', '2017-08-26 04:32:47', 100, 'BLN-PHL-1040', 'BLN-PHL-1040', 'Corporate', 'HR1560/40 Egg Beater', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3981, 4500, 4500, 4500, 50, 4500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(696, '2017-08-25 07:41:48', '2017-08-26 04:32:42', 100, 'BLN-PHL-1041', 'BLN-PHL-1041', 'Corporate', 'HR1600/00 (Hand Blender)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3096, 3500, 3500, 3500, 25, 3500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(697, '2017-08-25 07:42:37', '2017-08-26 04:32:36', 100, 'BLN-PHL-1050', 'BLN-PHL-1050', 'Corporate', 'HR7628/00 Food Processor', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 5573, 6300, 6300, 6300, 50, 6300, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(698, '2017-08-25 07:43:22', '2017-08-26 04:32:29', 100, 'BLN-PHL-1051', 'BLN-PHL-1051', 'Corporate', 'HR7776/90 Food Processor', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 10615, 12000, 12000, 12000, 100, 12000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(699, '2017-08-25 07:44:03', '2017-08-26 04:32:21', 100, 'BLN-PHL-1052', 'BLN-PHL-1052', 'Corporate', 'HR7778/01 Food Processor', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 19373, 21900, 21900, 21900, 250, 21900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1395, '2017-09-28 10:33:11', NULL, 100, 'BSFIC-NS-1K', 'BSFIC-NS-1K', 'OSP', 'Natural Sugar-1KG', '', '', '', '', '', '', '', '', 'SUP0000045', 'KG', 'KG', '', 1, 'No', 'None', 'Stocking', 0, 65, 69, 70, 69, 0.01, 69, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(700, '2017-08-25 07:44:41', '2017-08-26 04:33:53', 100, 'CHP-PHL-1001', 'CHP-PHL-1001', 'Corporate', 'HR-1396 (Chopper)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3715, 4200, 4200, 4200, 50, 4200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1423, '2017-10-05 11:14:45', NULL, 100, 'DWP-RO-75', 'DWP-RO-75', 'Corporate', 'RO Machine-75 GPD', '', 'Electronics', '', '', '', '', '', '', 'SUP0000046', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 7400, 1300, 13300, 1300, 500, 12800, 0, '1', '', '', 'ABL-777-0007@abl.com', NULL, 'Live'),
(31, '2017-06-09 10:44:20', '2017-08-17 07:23:24', 100, 'FIP-BS-02', 'FIP-BS-02', 'OSP', 'Hand Made Cotton Bed Sheet- 02pcs', '', '', '', '', '', '', '', '', 'SUP0000006', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1200, 2450, 2450, 0, 100, 2300, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(32, '2017-06-09 10:48:28', '2017-06-09 11:13:13', 100, 'FIP-LP-01', 'FIP-LP-01', 'OSP', 'Cotton Ladies Three Pieces', '', '', '', '', '', '', '', '', 'SUP0000006', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 560, 1150, 1150, 0, 50, 1050, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1379, '2017-09-20 11:45:21', '2017-09-27 08:32:17', 100, 'FMI-IAFFS-16', 'FMI-IAFFS-16', 'OSP', 'Indian Arvind Formal Full Shirt(Size-16)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 950, 1525, 1650, 1525, 50, 1525, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1380, '2017-09-20 11:46:40', '2017-09-27 08:33:09', 100, 'FMI-IAFFS-17', 'FMI-IAFFS-17', 'OSP', 'Indian Arvind Formal Full Shirt(Size-17)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 950, 1525, 1650, 1525, 50, 1525, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1381, '2017-09-20 11:48:44', '2017-09-27 08:33:52', 100, 'FMI-IAFFS-18', 'FMI-IAFFS-18', 'OSP', 'Indian Arvind Formal Full Shirt(Size-18)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 950, 1525, 1650, 1525, 50, 1525, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1382, '2017-09-20 11:49:50', '2017-09-27 07:44:02', 100, 'FMI-ICFS-15', 'FMI-ICFS-15', 'OSP', 'Indian Casual Full Shirt(Size-15)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1000, 1550, 1675, 1550, 50, 1550, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1383, '2017-09-20 11:51:04', '2017-09-27 07:44:12', 100, 'FMI-ICFS-16', 'FMI-ICFS-16', 'OSP', 'Indian Casual Full Shirt(Size-16)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1000, 1550, 1675, 1550, 50, 1550, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1384, '2017-09-20 11:52:06', '2017-09-27 07:44:24', 100, 'FMI-ICFS-17', 'FMI-ICFS-17', 'OSP', 'Indian Casual Full Shirt(Size-17)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1000, 1550, 1675, 1550, 50, 1550, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1385, '2017-09-20 11:53:12', '2017-09-27 07:46:29', 100, 'FMI-ICFS-18', 'FMI-ICFS-18', 'OSP', 'Indian Casual Full Shirt(Size-18)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1000, 1550, 1675, 1550, 50, 1550, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1375, '2017-09-20 11:13:30', '2017-09-27 08:29:17', 100, 'FMI-ISFFS-15', 'FMI-ISFFS-15', 'OSP', 'Indian Stripe Formal Full Shirt(Size-15)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 850, 1425, 1500, 1425, 50, 1425, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1376, '2017-09-20 11:40:50', '2017-09-27 08:29:09', 100, 'FMI-ISFFS-16', 'FMI-ISFFS-16', 'OSP', 'Indian Stripe Formal Full Shirt(Size-16)', '', '', '', '', '', '', '', '', 'SUP0000031', '', '', '', 1, 'No', 'None', 'Stocking', 0, 850, 1425, 1500, 1425, 50, 1425, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1377, '2017-09-20 11:42:05', '2017-09-27 08:29:01', 100, 'FMI-ISFFS-17', 'FMI-ISFFS-17', 'OSP', 'Indian Stripe Formal Full Shirt(Size-17)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 850, 1425, 1500, 1425, 50, 1425, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1378, '2017-09-20 11:44:21', '2017-09-27 08:28:53', 100, 'FMI-ISFFS-18', 'FMI-ISFFS-18', 'OSP', 'Indian Stripe Formal Full Shirt(Size-18)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 850, 1425, 1500, 1425, 50, 1425, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1386, '2017-09-20 11:54:18', '2017-09-27 07:43:56', 100, 'FMI-TBCP-30', 'FMI-TBCP-30', 'OSP', 'Thai Bullbat Casual Pant(Size-30)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1000, 1550, 1650, 1550, 50, 1550, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1387, '2017-09-20 11:55:22', '2017-09-27 07:38:10', 100, 'FMI-TBCP-32', 'FMI-TBCP-32', 'OSP', 'Thai Bullbat Casual Pant(Size-32)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1000, 1550, 1650, 1550, 50, 1550, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1390, '2017-09-20 11:57:57', '2017-09-27 07:38:40', 100, 'FMI-TBCP-34', 'FMI-TBCP-34', 'OSP', 'Thai Bullbat Casual Pant(Size-34)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1000, 1550, 1650, 1550, 50, 1550, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1391, '2017-09-20 11:59:35', '2017-09-27 07:37:49', 100, 'FMI-TBCP-36', 'FMI-TBCP-36', 'OSP', 'Thai Bullbat Casual Pant(Size-36)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1000, 1550, 1650, 1550, 50, 1550, 0, '1', '', '', 'sahinodesk@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1370, '2017-09-20 10:33:47', NULL, 100, 'FMI-TCFFS-15', 'FMI-TCFFS-15', 'OSP', 'Thai Cheek Formal Full Shirt(Size-15)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 650, 1200, 1250, 1200, 50, 1200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1372, '2017-09-20 11:03:44', NULL, 100, 'FMI-TCFFS-16', 'FMI-TCFFS-16', 'OSP', 'Thai Cheek Formal Full Shirt(Size-16)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 650, 1200, 1250, 1200, 50, 1200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1373, '2017-09-20 11:08:27', NULL, 100, 'FMI-TCFFS-17', 'FMI-TCFFS-17', 'OSP', 'Thai Cheek Formal Full Shirt(Size-17)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 650, 1200, 1250, 1200, 50, 1200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1374, '2017-09-20 11:11:47', NULL, 100, 'FMI-TCFFS-18', 'FMI-TCFFS-18', 'OSP', 'Thai Cheek Formal Full Shirt(Size-18)', '', '', '', '', '', '', '', '', 'SUP0000031', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 650, 1200, 1250, 1200, 50, 1200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(57, '2017-07-02 11:09:56', '2017-07-03 08:13:14', 100, 'GRA-HP-150', 'GRA-HP-150', 'OSP', 'Honey Pack-150gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 120, 230, 275, 230, 10, 230, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(56, '2017-07-02 11:08:04', '2017-07-03 08:13:33', 100, 'GRA-LP-150', 'GRA-LP-150', 'OSP', 'Lemon Pack-150gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 120, 230, 275, 230, 10, 230, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(58, '2017-07-02 11:12:42', '2017-07-26 05:56:52', 100, 'GRA-NW-150', 'GRA-NW-150', 'OSP', 'Neck Whitener-150gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 120, 375, 400, 375, 20, 375, 0, '1', '', '', 'amarbazarltd@gmail.com', 'ABL-777-0007@abl.com', 'Live'),
(55, '2017-07-02 11:06:22', '2017-07-03 08:13:47', 100, 'GRA-OP-150', 'GRA-OP-150', 'OSP', 'Orange Pack-150gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 120, 230, 275, 230, 10, 230, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(60, '2017-07-02 11:15:58', '2017-07-03 08:06:20', 100, 'GRA-SB-150', 'GRA-SB-150', 'OSP', 'Sweat B-Lock Body Pack-150gm ', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 150, 320, 350, 320, 15, 320, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(59, '2017-07-02 11:14:39', '2017-07-03 08:21:25', 100, 'GRA-UE-150', 'GRA-UE-150', 'OSP', 'Unique Edition Body Pack-150gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 150, 320, 350, 320, 15, 320, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(43, '2017-06-13 09:08:57', '2017-10-03 08:40:30', 100, 'GTT-OF-01', 'GTT-OF-01', 'Corporate', 'Outsourcing/ Freelancing Course (Professional Graphics Design, Youtube, Facebook Marketing, SEO), Duration-06 Months', '', '', '', '', '', '', '', '', 'SUP0000008', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 10500, 17500, 17500, 17500, 500, 17500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1363, '2017-09-19 10:56:44', '2017-10-24 06:42:57', 100, 'IMF-ATTA-62', 'IMF-ATTA-62', 'OSP', 'Ifad Atta-2kg', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 55.24, 60, 61, 60, 0.15, 60, 0, '1', '', '', 'amarbazarltd@gmail.com', 'ABL-777-0007@abl.com', 'Deleted'),
(1439, '2017-10-09 05:20:11', NULL, 100, 'IMF-CBF-01', 'IMF-CBF-01', 'OSP', 'Ifad Cheesy Bites-300gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 51, 58, 60, 58, 0.4, 58, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(111, '2017-07-25 13:25:07', '2017-10-09 04:11:26', 100, 'IMF-CBF-12', 'IMF-CBF-12', 'OSP', 'Ifad Cheesy Bites ( Family Pack)-300gmX12', '', '', '', '', 'ostock', '', '', '', 'SUP0000016', 'DOZEN', 'DOZEN', '', 1, 'No', 'None', 'Stocking', 0, 612, 700, 720, 700, 5, 700, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(125, '2017-07-26 05:12:13', '2017-10-06 04:38:26', 100, 'IMF-ENS-180', 'IMF-ENS-180', 'OSP', 'Egg Noodles (Stick)-180gmX24', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 367.2, 410, 432, 410, 2, 410, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1436, '2017-10-06 05:49:08', NULL, 100, 'IMF-ENS-180X3', 'IMF-ENS-180X3', 'OSP', 'Egg Noodles (Stick)-180gmX3', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 45.9, 52, 54, 52, 0.25, 52, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(126, '2017-07-26 05:15:32', '2017-10-06 04:02:10', 100, 'IMF-ENS-300', 'IMF-ENS-300', 'OSP', 'Noodles  Box  (Stick)-300gmX12', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 357, 400, 420, 400, 2, 400, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1424, '2017-10-05 12:58:43', '2017-11-06 04:04:38', 100, 'IMF-IBD-01', 'IMF-IBD-01', 'OSP', 'Ifad Butter Delight Biscuit - 260gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46.75, 53, 55, 53, 0.35, 53, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(113, '2017-07-25 13:32:06', '2017-10-05 11:28:54', 100, 'IMF-IBD-06', 'IMF-IBD-06', 'OSP', 'Ifad Butter Delight Biscuits-260gmX6', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 280.5, 320, 330, 320, 2.5, 320, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(1432, '2017-10-06 05:43:54', NULL, 100, 'IMF-ICB-01', 'IMF-ICB-01', 'OSP', 'Ifad Choco Chips (Bakery Biscuits)-250gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 85, 95, 100, 95, 0.5, 95, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(116, '2017-07-25 13:51:12', '2017-10-06 04:21:57', 100, 'IMF-ICB-12', 'IMF-ICB-12', 'OSP', 'Ifad Choco Chips (Bakery Biscuits)-250gmX12', '', '', '', '', '', '', '', '', 'SUP0000016', 'DOZEN', 'DOZEN', '', 1, 'No', 'None', 'Stocking', 0, 1020, 1140, 1200, 1140, 6, 1140, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(1425, '2017-10-05 13:00:32', '2017-11-02 08:36:29', 100, 'IMF-ICD-01', 'IMF-ICD-01', 'OSP', 'Ifad Choco Delight Biscuit -260gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 51, 58, 60, 58, 0.4, 58, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(114, '2017-07-25 13:34:46', '2017-11-02 08:37:27', 100, 'IMF-ICD-06', 'IMF-ICD-06', 'OSP', 'Ifad Choco Delight Biscuit -260gmX6', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 306, 350, 360, 350, 2.5, 350, 0, '1', '', '', 'ABL-777-0007@abl.com', 'dgmproduct@abl.com', 'Live'),
(1435, '2017-10-06 05:48:09', NULL, 100, 'IMF-IDC-01', 'IMF-IDC-01', 'OSP', 'Ifad Dry Cake Biscuit-300gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 102, 116, 120, 116, 0.75, 116, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(130, '2017-07-26 05:29:57', '2017-10-06 04:30:34', 100, 'IMF-IDC-06', 'IMF-IDC-06', 'OSP', 'Ifad Dry Cake Biscuit-300gmx6', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 612, 700, 720, 700, 5, 700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1440, '2017-10-09 05:21:09', NULL, 100, 'IMF-IJB-01', 'IMF-IJB-01', 'OSP', 'Ifad Jeera Biscuit-260gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46.75, 53, 55, 53, 0.25, 53, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(117, '2017-07-26 04:45:31', '2017-10-09 04:16:11', 100, 'IMF-IJB-06', 'IMF-IJB-06', 'OSP', 'Ifad Jeera Biscuit  (Biscuit Package)- 260gmX6', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 280.5, 315, 330, 315, 1.5, 315, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1426, '2017-10-05 13:02:14', NULL, 100, 'IMF-IKD-01', 'IMF-IKD-01', 'OSP', 'kaju Delight-260gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 63.75, 72, 75, 72, 0.4, 72, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(121, '2017-07-26 05:00:22', '2017-10-05 11:34:52', 100, 'IMF-IKD-06', 'IMF-IKD-06', 'OSP', 'kaju Delight-260gmX6', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 382.5, 430, 450, 430, 2.5, 430, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1427, '2017-10-05 13:03:25', '2017-11-02 02:41:59', 100, 'IMF-IMP-01', 'IMF-IMP-01', 'OSP', 'Ifad Milk Premium Biscuit -150gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25.5, 29, 30, 29, 0.2, 29, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(123, '2017-07-26 05:06:25', '2017-11-02 02:39:53', 100, 'IMF-IMP-24', 'IMF-IMP-24', 'OSP', 'Ifad Milk Premium Biscuit -150gmX24', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 612, 700, 720, 700, 5, 700, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1364, '2017-09-19 10:58:10', NULL, 100, 'IMF-IMT-350', 'IMF-IMT-350', 'OSP', 'Ifad Muri Toast-350gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 51, 58, 60, 48, 0.3, 58, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1430, '2017-10-06 05:41:42', NULL, 100, 'IMF-INC-01', 'IMF-INC-01', 'OSP', 'Egg Instant Noodles Family Pack- Chicken-390gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 76.5, 87, 90, 87, 0.5, 87, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(127, '2017-07-26 05:19:17', '2017-10-06 04:12:36', 100, 'IMF-INC-06', 'IMF-INC-06', 'OSP', 'Egg Instant Noodles  Family Pack- Chicken-390gmX6', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 459, 525, 540, 525, 4, 525, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1431, '2017-10-06 05:42:45', NULL, 100, 'IMF-INM-01', 'IMF-INM-01', 'OSP', 'Egg Instant Noodles Family Pack- Masala-390gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 76.5, 87, 90, 87, 0.5, 87, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(128, '2017-07-26 05:24:16', '2017-10-06 04:12:56', 100, 'IMF-INM-06', 'IMF-INM-06', 'OSP', 'Egg Instant Noodles Family Pack- Masala-390gmX6', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 459, 525, 540, 525, 4, 525, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(112, '2017-07-25 13:28:44', NULL, 100, 'IMF-IOB-06', 'IMF-IOB-06', 'OSP', 'Ifad Orange Biscuits', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 178.5, 204, 210, 204, 1, 204, 0, '1', '', '', 'ABL-777-0007@abl.com', NULL, 'Live'),
(1434, '2017-10-06 05:46:11', NULL, 100, 'IMF-IPT-01', 'IMF-IPT-01', 'OSP', 'Ifad Plain Toast-350gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42.5, 48, 50, 48, 0.3, 48, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(124, '2017-07-26 05:09:46', '2017-10-06 04:27:20', 100, 'IMF-IPT-06', 'IMF-IPT-06', 'OSP', 'Ifad Plain Toast-350gmx6', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 255, 290, 300, 290, 2, 290, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(122, '2017-07-26 05:03:52', NULL, 100, 'IMF-ITB-12', 'IMF-ITB-12', 'OSP', 'Ifad Tea Time Biscuit 1x12', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 306, 345, 360, 345, 2, 345, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1433, '2017-10-06 05:45:08', NULL, 100, 'IMF-NKB-01', 'IMF-NKB-01', 'OSP', 'Nan Khatai (Bakery Biscuits)-250gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 85, 95, 100, 95, 0.5, 95, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(115, '2017-07-25 13:38:59', '2017-10-06 04:26:30', 100, 'IMF-NKB-12', 'IMF-NKB-12', 'OSP', 'Nankhatai (Bakery Biscuits)-250gmX12', '', '', '', '', '', '', '', '', 'SUP0000016', 'DOZEN', 'DOZEN', '', 1, 'No', 'None', 'Stocking', 0, 1020, 1140, 1200, 1140, 6, 1140, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(1429, '2017-10-06 05:40:10', NULL, 100, 'IMF-NSB-300', 'IMF-NSB-300', 'OSP', 'Noodles Box (Stick)-300gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29.75, 33, 35, 33, 0.15, 33, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1476, '2017-11-06 06:01:08', NULL, 100, 'IMF-PAB-130', 'IMF-PAB-130', 'OSP', 'Ifad Pineapple Biscuit - 130gm', '', 'Bakery', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34, 39, 40, 39, 0.2, 39, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(109, '2017-07-25 13:18:32', '2017-07-26 03:33:58', 100, 'IMF-RBO-05', 'IMF-RBO-05', 'OSP', 'Ifad Rice Bran Oil 5ltr', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 510, 570, 600, 570, 2.5, 570, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(110, '2017-07-25 13:21:45', '2017-11-01 04:54:18', 100, 'IMF-SLT-05', 'IMF-SLT-05', 'OSP', 'Ifad Salt-5kg', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 152, 185, 190, 185, 2.5, 185, 0, '0', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(129, '2017-07-26 05:28:12', '2017-10-05 11:51:33', 100, 'IMF-SNM-180', 'IMF-SNM-180', 'OSP', 'Eggy Egg Stick Noodles With Masala 1X24', '', '', '', '', '', '', '', '', 'SUP0000016', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 408, 465, 480, 465, 3, 465, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1428, '2017-10-05 13:04:28', NULL, 100, 'IMF-SNM-180X3', 'IMF-SNM-180X3', 'OSP', 'Eggy Egg Stick Noodles With Masala-180gmX3', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 51, 57, 60, 57, 0.3, 57, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1475, '2017-11-06 05:54:46', NULL, 100, 'IMF-WMB-160', 'IMF-WM-160', 'OSP', 'Ifad Wholemeal Nutrients Biscuit - 160gm', '', '', '', '', '', '', '', '', 'SUP0000016', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42.5, 48, 50, 48, 0.3, 48, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(62, '2017-07-03 05:32:32', NULL, 100, 'INS-CR-01', 'INS-CR-01', 'OSP', 'Chemical Remover', '', '', '', '', '', '', '', '', 'SUP0000014', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1650, 2800, 3000, 2800, 100, 2800, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1322, '2017-09-13 12:02:18', NULL, 100, 'INS-OWFP-01', 'INS-OWFP-01', 'OSP', 'Ozon 03 Water & Food Purifier (Digital)', '', '', '', '', '', '', '', '', 'SUP0000014', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 2550, 5500, 5850, 5500, 300, 5500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(63, '2017-07-03 05:35:16', '2017-07-03 09:11:41', 100, 'INS-TC-10P', 'INS-TC-10P', 'OSP', 'Toxin Cleanser', '', '', '', '', '', '', '', '', 'SUP0000014', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 250, 950, 1050, 950, 50, 950, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(524, '2017-08-25 06:21:12', '2017-08-26 05:06:40', 100, 'IRN-CON-1002', 'IRN-CON-1002', 'Corporate', 'BEDSW-2', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 648, 749, 749, 749, 5, 749, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(526, '2017-08-25 06:22:47', '2017-08-26 05:06:33', 100, 'IRN-CON-1005', 'IRN-CON-1005', 'Corporate', 'BEDSW-5', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 561, 648, 648, 648, 5, 648, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(528, '2017-08-25 06:24:00', '2017-08-26 05:06:25', 100, 'IRN-CON-1020', 'IRN-CON-1020', 'Corporate', 'YPF-6505', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1039, 1200, 1200, 1200, 10, 1200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(530, '2017-08-25 06:25:02', '2017-08-26 05:05:57', 100, 'IRN-CON-1021', 'IRN-CON-1021', 'Corporate', 'BEDSW-201E', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 821, 948, 948, 948, 5, 948, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(532, '2017-08-25 06:25:50', '2017-08-26 04:57:22', 100, 'IRN-CON-1022', 'IRN-CON-1022', 'Corporate', 'BEDSW-2188', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 994, 1148, 1148, 1148, 5, 1148, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(535, '2017-08-25 06:26:58', '2017-08-26 04:57:10', 100, 'IRN-CON-1025', 'IRN-CON-1025', 'Corporate', 'YPF-6132', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1039, 1200, 1200, 1200, 5, 1200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(537, '2017-08-25 06:27:33', '2017-08-26 04:55:52', 100, 'IRN-CON-1030', 'IRN-CON-1030', 'Corporate', 'YPF-637', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 952, 1100, 1100, 1100, 5, 1100, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(540, '2017-08-25 06:28:09', '2017-08-26 04:54:15', 100, 'IRN-CON-1031', 'IRN-CON-1031', 'Corporate', 'BESW-1688 ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 734, 849, 849, 849, 5, 849, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(543, '2017-08-25 06:29:10', '2017-08-26 04:53:22', 100, 'IRN-CON-1041', 'IRN-CON-1041', 'Corporate', 'BESW-2688', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 907, 1048, 1048, 1048, 5, 1048, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(545, '2017-08-25 06:30:08', '2017-08-26 04:53:08', 100, 'IRN-CON-1045', 'IRN-CON-1045', 'Corporate', 'BESW-2788B ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1210, 1398, 1398, 1398, 10, 1398, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(548, '2017-08-25 06:30:50', '2017-08-26 04:52:49', 100, 'IRN-CON-1051', 'IRN-CON-1051', 'Corporate', 'BESW-3188', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1080, 1248, 1248, 1248, 10, 1248, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(551, '2017-08-25 06:31:42', '2017-08-26 05:09:17', 100, 'IRN-PAN-1021', 'IRN-PAN-1021', 'Corporate', 'NI-27AWT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2035, 2300, 2300, 2300, 15, 2300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(553, '2017-08-25 06:32:15', '2017-08-26 05:09:03', 100, 'IRN-PAN-1022', 'IRN-PAN-1022', 'Corporate', 'NI-22AWT', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1946, 2200, 2200, 2200, 15, 2200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(555, '2017-08-25 06:32:53', '2017-08-26 05:08:56', 100, 'IRN-PAN-1023', 'IRN-PAN-1023', 'Corporate', 'NI-P250T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1769, 2000, 2000, 2000, 15, 2000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(557, '2017-08-25 06:33:36', '2017-08-26 05:08:47', 100, 'IRN-PAN-1025', 'IRN-PAN-1025', 'Corporate', 'NI-P300T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1946, 2200, 2200, 2200, 15, 2200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted');
INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xvatpct`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(559, '2017-08-25 06:34:26', '2017-08-26 05:08:37', 100, 'IRN-PAN-1031', 'IRN-PAN-1031', 'Corporate', 'NI-317TV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1238, 1400, 1400, 1400, 10, 1400, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(563, '2017-08-25 06:35:20', '2017-08-26 05:08:06', 100, 'IRN-PAN-1041', 'IRN-PAN-1041', 'Corporate', 'NI-E 100TGSG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1769, 2000, 2000, 2000, 15, 2000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(565, '2017-08-25 06:36:01', '2017-08-26 05:08:23', 100, 'IRN-PAN-1042', 'IRN-PAN-1042', 'Corporate', 'NI - E410T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2300, 2600, 2600, 2600, 20, 2600, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(568, '2017-08-25 06:36:40', '2017-08-26 05:08:13', 100, 'IRN-PAN-1043', 'IRN-PAN-1043', 'Corporate', 'NI - E510T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2477, 2800, 2800, 2800, 20, 2800, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(571, '2017-08-25 06:37:16', '2017-08-26 05:07:58', 100, 'IRN-PAN-1045', 'IRN-PAN-1045', 'Corporate', 'NI-V 100NASG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1769, 2000, 2000, 2000, 15, 2000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(573, '2017-08-25 06:37:49', '2017-08-26 05:07:43', 100, 'IRN-PAN-1046', 'IRN-PAN-1046', 'Corporate', 'NI-100DX', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3096, 3500, 3500, 3500, 25, 3500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(576, '2017-08-25 06:38:23', '2017-08-26 05:07:33', 100, 'IRN-PAN-1051', 'IRN-PAN-1051', 'Corporate', 'NI-E 200TASG/TRSG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1566, 1770, 1770, 1770, 15, 1770, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(578, '2017-08-25 06:39:04', '2017-08-26 05:10:46', 100, 'IRN-PHL-1018', 'IRN-PHL-1018', 'Corporate', 'GC122/76', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1548, 1750, 1750, 1750, 10, 1750, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(581, '2017-08-25 06:39:46', '2017-08-26 05:10:37', 100, 'IRN-PHL-1019', 'IRN-PHL-1019', 'Corporate', 'GC150/41', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1681, 1900, 1900, 1900, 15, 1900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(584, '2017-08-25 06:40:25', '2017-08-26 05:10:29', 100, 'IRN-PHL-1020', 'IRN-PHL-1020', 'Corporate', 'GC-160', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1769, 2000, 2000, 2000, 15, 2000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(585, '2017-08-25 06:40:58', '2017-08-26 05:10:22', 100, 'IRN-PHL-1021', 'IRN-PHL-1021', 'Corporate', 'GC1028/20', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2919, 3300, 3300, 3300, 25, 3300, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(588, '2017-08-25 06:41:28', '2017-08-26 05:10:07', 100, 'IRN-PHL-1022', 'IRN-PHL-1022', 'Corporate', 'GC185-86/87', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2477, 2800, 2800, 2800, 25, 2800, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(591, '2017-08-25 06:42:06', '2017-08-26 05:09:53', 100, 'IRN-PHL-1023', 'IRN-PHL-1023', 'Corporate', 'GC1418/36', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1946, 2200, 2200, 2200, 15, 2200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(595, '2017-08-25 06:43:18', '2017-08-26 05:12:29', 100, 'IRN-SRP-1006', 'IRN-SRP-1006', 'Corporate', 'AM-P455T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1946, 2200, 2200, 2200, 15, 2200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(596, '2017-08-25 06:43:53', '2017-08-26 05:12:21', 100, 'IRN-SRP-1009', 'IRN-SRP-1009', 'Corporate', 'AM-475', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2123, 2400, 2400, 2400, 20, 2400, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(600, '2017-08-25 06:44:44', '2017-08-26 05:12:13', 100, 'IRN-SRP-1010', 'IRN-SRP-1010', 'Corporate', 'AM-465T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2079, 2350, 2350, 2350, 20, 2350, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(603, '2017-08-25 06:45:29', '2017-08-26 05:11:56', 100, 'IRN-SRP-1011', 'IRN-SRP-1011', 'Corporate', 'AM-475T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2388, 2700, 2700, 2700, 25, 2700, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(605, '2017-08-25 06:46:06', '2017-08-26 05:11:37', 100, 'IRN-SRP-1012', 'IRN-SRP-1012', 'Corporate', 'AM-575T', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2565, 2900, 2900, 2900, 25, 2900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(606, '2017-08-25 06:46:38', '2017-08-26 05:11:19', 100, 'IRN-SRP-1013', 'IRN-SRP-1013', 'Corporate', 'AM-575', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2212, 2500, 2500, 2500, 25, 2500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(607, '2017-08-25 06:47:17', '2017-08-26 05:13:25', 100, 'IRN-TOS-1006', 'IRN-TOS-1006', 'Corporate', 'TA-A21C (Pink/White)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1238, 1400, 1400, 1400, 10, 1400, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(611, '2017-08-25 06:48:00', '2017-08-26 05:13:08', 100, 'IRN-TOS-1010', 'IRN-TOS-1010', 'Corporate', 'TA-W17C (Black)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1504, 1700, 1700, 1700, 10, 1700, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(613, '2017-08-25 06:48:34', '2017-08-26 05:12:59', 100, 'IRN-TOS-1015', 'IRN-TOS-1015', 'Corporate', 'TA-W20B (white)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1857, 2100, 2100, 2100, 15, 2100, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(106, '2017-07-24 09:58:46', NULL, 100, 'KF-35', 'KF-35', 'Corporate', 'Western Air Conditioner-1.0Ton (12000BTU),Copper Condenser, 1pcs Extra Remote, Free Accessories ', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28864, 33800, 39500, 33800, 300, 33800, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(107, '2017-07-24 10:00:58', NULL, 100, 'KF-50', 'KF-50', 'Corporate', 'Western Air Conditioner-1.5Ton (18000BTU),Copper Condenser, 1pcs Extra Remote, Free Accessories ', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 35024, 41500, 47800, 41500, 400, 41500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(108, '2017-07-24 10:02:50', NULL, 100, 'KF-70', 'KF-70', 'Corporate', 'Western Air Conditioner-2.0Ton (24000BTU),Copper Condenser, 1pcs Extra Remote, Free Accessories ', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42944, 50500, 58600, 50500, 500, 50500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1486, '2017-11-08 05:27:35', '2017-11-08 03:31:01', 100, 'MGI-FA-2K', 'MGI-FA-2K', 'OSP', 'Fresh Atta- 2Kg', '', 'Food', '', '', '', '', '', '', 'SUP0000042', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 58.88, 65, 66, 65, 0.01, 65, 0, '1', '', '', 'dgmproduct@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(1482, '2017-11-08 05:08:01', '2017-11-08 03:10:57', 100, 'MGI-FM-2K', 'MGI-FM-2K', 'OSP', 'Fresh Maida -2Kg', '', 'Food', '', '', '', '', '', '', 'SUP0000042', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79.12, 85, 86, 85, 0.01, 85, 0, '1', '', '', 'dgmproduct@abl.com', 'dgmproduct@abl.com', 'Live'),
(1485, '2017-11-08 05:24:49', NULL, 100, 'MGI-FS-500', 'MGI-FS-500', 'OSP', 'Fresh Suzi - 500gm', '', 'Food', '', '', '', '', '', '', 'SUP0000042', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26.68, 28, 29, 28, 0.01, 28, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1487, '2017-11-08 05:32:25', NULL, 100, 'MGI-FSGR-1K', 'MGI-FSGR-1K', 'OSP', 'Fresh Suger - 1Kg', '', 'Food', '', '', '', '', '', '', 'SUP0000042', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 62, 64, 65, 64, 0.01, 64, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1484, '2017-11-08 05:20:07', NULL, 100, 'MGI-FSO-2L', 'MGI-FSO-2L', 'OSP', 'Fresh Soyabean Oil - 2 Litre', '', 'Food', '', '', '', '', '', '', 'SUP0000042', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 206, 215, 216, 215, 0.01, 215, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1483, '2017-11-08 05:17:30', NULL, 100, 'MGI-FSO-5L', 'MGI-FSO-5L', 'OSP', 'Fresh Soyabean Oil - 5 Litre', '', 'Toiletries', '', '', '', '', '', '', 'SUP0000042', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 515, 530, 540, 530, 0.01, 530, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(39, '2017-06-12 08:17:06', NULL, 100, 'MGP-AGT-160', 'MGP-AGT-160', 'OSP', 'Amla Tea, Green Tea &  Tulshi Drinks', '', '', '', '', '', '', '', '', 'SUP0000011', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 675, 1040, 1040, 0, 20, 990, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(38, '2017-06-12 08:14:06', NULL, 100, 'MGP-ST-120', 'MGP-ST-120', 'OSP', 'Slim Tea & Tulshi Tea', '', '', '', '', '', '', '', '', 'SUP0000011', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 513, 890, 890, 0, 25, 850, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(678, '2017-08-25 07:30:40', '2017-08-26 04:30:21', 100, 'MIX-CON-1015', 'MIX-CON-1015', 'Corporate', 'BE-305', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 519, 600, 600, 600, 5, 600, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(679, '2017-08-25 07:31:14', '2017-08-26 04:30:14', 100, 'MIX-CON-1020', 'MIX-CON-1020', 'Corporate', 'BE-504E', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 1168, 1350, 1350, 1350, 10, 1350, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(680, '2017-08-25 07:31:48', '2017-08-26 04:30:07', 100, 'MIX-CON-1022', 'MIX-CON-1022', 'Corporate', 'BE-506', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 606, 700, 700, 700, 5, 700, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(681, '2017-08-25 07:32:19', '2017-08-26 04:29:46', 100, 'MIX-CON-1029', 'MIX-CON-1029', 'Corporate', 'BE-513', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 952, 1100, 1100, 1100, 5, 1100, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(682, '2017-08-25 07:32:48', '2017-08-26 04:29:40', 100, 'MIX-CON-1051', 'MIX-CON-1051', 'Corporate', 'BE-713', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 390, 450, 450, 450, 5, 450, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(683, '2017-08-25 07:33:24', '2017-08-26 04:31:49', 100, 'MIX-PAN-1001', 'MIX-PAN-1001', 'Corporate', 'MX-GS1WSP (Hand Blender)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2565, 2900, 2900, 2900, 15, 2900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(684, '2017-08-25 07:34:11', '2017-08-26 04:31:39', 100, 'MIX-PAN-1052', 'MIX-PAN-1052', 'Corporate', 'MX-AC-300', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 6988, 7900, 7900, 7900, 100, 7900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(685, '2017-08-25 07:34:43', '2017-08-26 04:31:33', 100, 'MIX-PAN-1061', 'MIX-PAN-1061', 'Corporate', 'MJ-68MWSP (Juicer)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4688, 5300, 5300, 5300, 50, 5300, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(686, '2017-08-25 07:35:18', '2017-08-26 04:31:27', 100, 'MIX-PAN-1105', 'MIX-PAN-1105', 'Corporate', 'NC-GF1WSH (Coffee Maker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2300, 2600, 2600, 2600, 25, 2600, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(687, '2017-08-25 07:35:55', '2017-08-26 04:31:20', 100, 'MIX-PAN-1205', 'MIX-PAN-1205', 'Corporate', 'NC-EH30P (Thermopot)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 4989, 5640, 5640, 5640, 50, 5640, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(688, '2017-08-25 07:36:29', '2017-08-26 04:31:15', 100, 'MIX-PAN-2101', 'MIX-PAN-2101', 'Corporate', 'MX-AC210 (White)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 5750, 6500, 6500, 6500, 50, 6500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(689, '2017-08-25 07:36:59', '2017-08-26 04:31:09', 100, 'MIX-PAN-2102', 'MIX-PAN-2102', 'Corporate', 'MX-AC210 (Blue)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 6193, 7000, 7000, 7000, 50, 7000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(690, '2017-08-25 07:37:33', '2017-08-26 04:31:03', 100, 'MIX-PAN-4001', 'MIX-PAN-4001', 'Corporate', 'MX-AC400SWUA (Silver)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8315, 9400, 9400, 9400, 100, 9400, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(691, '2017-08-25 07:38:15', '2017-08-26 04:30:57', 100, 'MIX-PAN-4002', 'MIX-PAN-4002', 'Corporate', 'MX-AC400SWUA (Blue)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8757, 9900, 9900, 9900, 100, 9900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(692, '2017-08-25 07:38:50', '2017-08-26 04:30:50', 100, 'MIX-PAN-5550', 'MIX-PAN-5550', 'Corporate', 'MX-AC555 (5 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 10615, 12000, 12000, 12000, 100, 12000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(701, '2017-08-25 07:45:42', '2017-08-26 04:35:02', 100, 'MIX-PHL-1020', 'MIX-PHL-1020', 'Corporate', 'HR-2726 (Meat Mincer)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 7873, 8900, 8900, 8900, 100, 8900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(702, '2017-08-25 07:46:17', '2017-08-26 04:34:54', 100, 'MIX-PHL-1030', 'MIX-PHL-1030', 'Corporate', 'HD-7447 (Coffee Maker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3538, 4000, 4000, 4000, 50, 4000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(703, '2017-08-25 07:46:49', '2017-08-26 04:34:47', 100, 'MIX-PHL-1031', 'MIX-PHL-1031', 'Corporate', 'HD7457/20 (Coffee Maker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3804, 4300, 4300, 4300, 50, 4300, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(704, '2017-08-25 07:47:15', '2017-08-26 04:34:38', 100, 'MIX-PHL-1071', 'MIX-PHL-1071', 'Corporate', 'HL-1643/04 (3 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 6635, 7500, 7500, 7500, 50, 7500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(705, '2017-08-25 07:47:52', '2017-08-26 04:34:28', 100, 'MIX-PHL-1072', 'MIX-PHL-1072', 'Corporate', 'HL-1643/06 (4 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8138, 9200, 9200, 9200, 100, 9200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(706, '2017-08-25 07:48:57', '2017-08-26 04:34:22', 100, 'MIX-PHL-1073', 'MIX-PHL-1073', 'Corporate', 'HL-7750 (3 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 6900, 7800, 7800, 7800, 100, 7800, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(707, '2017-08-25 07:50:02', '2017-08-26 04:34:17', 100, 'MIX-PHL-1083', 'MIX-PHL-1083', 'Corporate', 'HL-7720 (3 Jars)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 6546, 7400, 7400, 7400, 50, 7400, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(708, '2017-08-25 07:50:43', '2017-08-26 04:34:10', 100, 'MIX-PHL-1101', 'MIX-PHL-1101', 'Corporate', 'HR1459 (Egg Beater)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 3089, 3492, 3492, 3492, 25, 3492, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(709, '2017-08-25 07:51:24', '2017-08-26 04:35:29', 100, 'MIX-SRP-1205', 'MIX-SRP-1205', 'Corporate', 'KP-A28S-MN (Thermopot)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 2789, 2990, 2990, 2990, 15, 2990, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(616, '2017-08-25 06:49:38', '2017-08-26 05:13:54', 100, 'MWO-CON-2001', 'MWO-CON-2001', 'Corporate', 'BG-20CTB / CBU', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 6193, 7000, 7000, 7000, 50, 7000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(619, '2017-08-25 06:50:17', '2017-08-26 05:14:35', 100, 'MWO-CON-2301', 'MWO-CON-2301', 'Corporate', 'BG-23A3Q', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 6193, 7000, 7000, 7000, 50, 7000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(621, '2017-08-25 06:50:53', '2017-08-26 05:14:59', 100, 'MWO-CON-2305', 'MWO-CON-2305', 'Corporate', 'BC-23EBV', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 7962, 9000, 9000, 9000, 100, 9000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(622, '2017-08-25 06:51:25', '2017-08-26 05:14:00', 100, 'MWO-CON-2504', 'MWO-CON-2504', 'Corporate', 'BC-25EBL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 10173, 11500, 11500, 11500, 100, 11500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(624, '2017-08-25 06:52:00', '2017-08-26 05:14:42', 100, 'MWO-CON-2505', 'MWO-CON-2505', 'Corporate', 'BCR-25EBL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 10837, 12250, 12250, 12250, 100, 12250, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(625, '2017-08-25 06:52:43', '2017-08-26 05:14:47', 100, 'MWO-CON-2805', 'MWO-CON-2805', 'Corporate', 'BC-28AHH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 11500, 13000, 13000, 13000, 150, 13000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(626, '2017-08-25 06:55:35', '2017-08-26 05:14:05', 100, 'MWO-CON-3005', 'MWO-CON-3005', 'Corporate', 'BCR-30AHM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 12827, 14500, 14500, 14500, 150, 14500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(627, '2017-08-25 06:56:08', '2017-08-26 05:15:55', 100, 'MWO-LGE-2001', 'MWO-LGE-2001', 'Corporate', 'MS2041C', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8091, 8500, 8500, 8500, 25, 8500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(628, '2017-08-25 06:57:03', '2017-08-26 05:15:28', 100, 'MWO-LGE-2301', 'MWO-LGE-2301', 'Corporate', 'MH-6342DSM/6349B', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 11804, 12400, 12400, 12400, 50, 12400, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(629, '2017-08-25 06:57:34', '2017-08-26 05:16:51', 100, 'MWO-LGE-2302', 'MWO-LGE-2302', 'Corporate', 'MS2342DS/DSM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 9995, 10500, 10500, 10500, 25, 10500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(630, '2017-08-25 06:58:05', '2017-08-26 05:16:00', 100, 'MWO-LGE-2303', 'MWO-LGE-2303', 'Corporate', 'MS2342D', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 9234, 9700, 9700, 9700, 25, 9700, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(631, '2017-08-25 06:58:51', '2017-08-26 05:16:33', 100, 'MWO-LGE-2304', 'MWO-LGE-2304', 'Corporate', 'MS2343DAR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 9044, 9500, 9500, 9500, 25, 9500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(632, '2017-08-25 06:59:25', '2017-08-26 05:16:28', 100, 'MWO-LGE-2305', 'MWO-LGE-2305', 'Corporate', 'MH6323DAR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 9995, 10500, 10500, 10500, 25, 10500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(633, '2017-08-25 07:00:00', '2017-08-26 05:15:23', 100, 'MWO-LGE-2815', 'MWO-LGE-2815', 'Corporate', 'MC7889DR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 19020, 19980, 19980, 19980, 100, 19980, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(634, '2017-08-25 07:00:37', '2017-08-26 05:15:34', 100, 'MWO-LGE-3001', 'MWO-LGE-3001', 'Corporate', 'MH-7044SMS', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 12375, 13000, 13000, 13000, 50, 13000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(635, '2017-08-25 07:01:45', '2017-08-26 05:16:36', 100, 'MWO-LGE-3201', 'MWO-LGE-3201', 'Corporate', 'MJ-3284CB (Solar)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 25035, 26300, 26300, 26300, 100, 26300, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(636, '2017-08-25 07:02:22', '2017-08-26 05:17:29', 100, 'MWO-MID-2001', 'MWO-MID-2001', 'Corporate', 'MM720CXM-PM', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 5152, 5700, 5700, 5700, 50, 5700, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(637, '2017-08-25 07:03:41', '2017-08-26 05:17:47', 100, 'MWO-MID-2305', 'MWO-MID-2305', 'Corporate', 'AS823EK7', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8948, 9900, 9900, 9900, 100, 9900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(638, '2017-08-25 07:04:10', '2017-08-26 05:17:21', 100, 'MWO-MID-2505', 'MWO-MID-2505', 'Corporate', 'AW925E4F', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 10755, 11900, 11900, 11900, 100, 11900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(639, '2017-08-25 07:04:41', '2017-08-26 05:17:15', 100, 'MWO-MID-2805', 'MWO-MID-2805', 'Corporate', 'AC928AHH', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 12021, 13300, 13300, 13300, 100, 13300, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(640, '2017-08-25 07:05:20', '2017-08-26 05:17:09', 100, 'MWO-MID-3605', 'MWO-MID-3605', 'Corporate', 'TC936T4S', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 25308, 28000, 28000, 28000, 250, 28000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(641, '2017-08-25 07:05:57', '2017-08-26 05:19:13', 100, 'MWO-PAN-2020', 'MWO-PAN-2020', 'Corporate', 'NN-ST253BYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 7615, 8000, 8000, 8000, 25, 8000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(642, '2017-08-25 07:06:40', '2017-08-26 05:19:51', 100, 'MWO-PAN-2305', 'MWO-PAN-2305', 'Corporate', 'NN-GD371', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 13708, 14400, 14400, 14400, 50, 14400, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(643, '2017-08-25 07:07:17', '2017-08-26 05:20:06', 100, 'MWO-PAN-2306', 'MWO-PAN-2306', 'Corporate', 'NN-DF-383BYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 21894, 23000, 23000, 23000, 100, 23000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(644, '2017-08-25 07:07:49', '2017-08-26 05:18:21', 100, 'MWO-PAN-2501', 'MWO-PAN-2501', 'Corporate', 'NN-SM332MYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8091, 8500, 8500, 8500, 25, 8500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(645, '2017-08-25 07:08:24', '2017-08-26 05:19:59', 100, 'MWO-PAN-2502', 'MWO-PAN-2502', 'Corporate', 'NN  -GT353', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 13517, 14200, 14200, 14200, 50, 14200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(646, '2017-08-25 07:08:58', '2017-08-26 05:19:43', 100, 'MWO-PAN-2505', 'MWO-PAN-2505', 'Corporate', 'NN-ST342MYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 9900, 10400, 10400, 10400, 25, 10400, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(647, '2017-08-25 07:09:32', '2017-08-26 05:19:01', 100, 'MWO-PAN-2506', 'MWO-PAN-2506', 'Corporate', 'NN-GT353MYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 13517, 14200, 14200, 14200, 50, 14200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(648, '2017-08-25 07:10:03', '2017-08-26 05:19:24', 100, 'MWO-PAN-2704', 'MWO-PAN-2704', 'Corporate', 'NN-SF564WYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 16659, 17500, 17500, 17500, 75, 17500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(649, '2017-08-25 07:11:42', '2017-08-26 05:19:18', 100, 'MWO-PAN-2705', 'MWO-PAN-2705', 'Corporate', 'NN-GF560MYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 17268, 18140, 18140, 18140, 75, 18140, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(650, '2017-08-25 07:12:14', '2017-08-26 05:18:33', 100, 'MWO-PAN-2706', 'MWO-PAN-2706', 'Corporate', 'NN-SF559', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 15231, 16000, 16000, 16000, 75, 16000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(651, '2017-08-25 07:13:14', '2017-08-26 05:18:54', 100, 'MWO-PAN-2707', 'MWO-PAN-2707', 'Corporate', 'NN-CF770', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 29415, 29415, 29415, 29415, 100, 29415, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(652, '2017-08-25 07:13:52', '2017-08-26 05:18:48', 100, 'MWO-PAN-2708', 'MWO-PAN-2708', 'Corporate', 'NN-GF574MYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 18563, 19500, 19500, 19500, 100, 19500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(653, '2017-08-25 07:14:39', '2017-08-26 05:18:40', 100, 'MWO-PAN-3110', 'MWO-PAN-3110', 'Corporate', 'NN-GD692SYTE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 20942, 22000, 22000, 22000, 100, 22000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(654, '2017-08-25 07:15:15', '2017-08-26 05:18:16', 100, 'MWO-PAN-3205', 'MWO-PAN-3205', 'Corporate', 'NN-ST651', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 16183, 17000, 17000, 17000, 50, 17000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(655, '2017-08-25 07:17:27', '2017-08-26 05:20:40', 100, 'MWO-SAM-2005', 'MWO-SAM-2005', 'Corporate', 'ME731KD/XST', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 7854, 8250, 8250, 8250, 25, 8250, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(656, '2017-08-25 07:18:02', '2017-08-26 05:20:54', 100, 'MWO-SAM-2010', 'MWO-SAM-2010', 'Corporate', 'ME73MD/XST', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8815, 9260, 9260, 9260, 25, 9260, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(657, '2017-08-25 07:18:36', '2017-08-26 05:20:46', 100, 'MWO-SAM-2305', 'MWO-SAM-2305', 'Corporate', 'GE82V-BBH/XST', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 10419, 10945, 10945, 10945, 30, 10945, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(658, '2017-08-25 07:19:09', '2017-08-26 05:20:32', 100, 'MWO-SAM-2810', 'MWO-SAM-2810', 'Corporate', 'GS109FD-SH/XST', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 14798, 15545, 15545, 15545, 50, 15545, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(659, '2017-08-25 07:19:47', '2017-08-26 05:21:56', 100, 'MWO-SRP-1010', 'MWO-SRP-1010', 'Corporate', 'EO-19L(W) E/Oven', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 6283, 6600, 6600, 6600, 25, 6600, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(660, '2017-08-25 07:20:25', '2017-08-26 05:21:40', 100, 'MWO-SRP-2020', 'MWO-SRP-2020', 'Corporate', 'R-22AO(SM)V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8939, 9390, 9390, 9390, 25, 9390, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(661, '2017-08-25 07:20:56', '2017-08-26 05:23:43', 100, 'MWO-SRP-2023', 'MWO-SRP-2023', 'Corporate', 'R-22AD(SM)V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 10138, 10650, 10650, 10650, 3, 10650, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(662, '2017-08-25 07:21:29', '2017-08-26 05:22:03', 100, 'MWO-SRP-2501', 'MWO-SRP-2501', 'Corporate', '72A1(SM)V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 13327, 14000, 14000, 14000, 30, 14000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(663, '2017-08-25 07:22:05', '2017-08-26 05:24:01', 100, 'MWO-SRP-2502', 'MWO-SRP-2502', 'Corporate', 'R-84A0(ST)V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 17040, 17900, 17900, 17900, 50, 17900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(664, '2017-08-25 07:22:36', '2017-08-26 05:21:24', 100, 'MWO-SRP-2801', 'MWO-SRP-2801', 'Corporate', 'R-92AO(ST)V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 19990, 21000, 21000, 21000, 100, 21000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(665, '2017-08-25 07:23:08', '2017-08-26 05:23:51', 100, 'MWO-SRP-3305', 'MWO-SRP-3305', 'Corporate', 'R-340R(S)/R-360J', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 14244, 14964, 14964, 14964, 50, 14964, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(666, '2017-08-25 07:23:39', '2017-08-26 05:21:48', 100, 'MWO-SRP-3401', 'MWO-SRP-3401', 'Corporate', 'R-75MT(S)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 13327, 14000, 14000, 14000, 50, 14000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(667, '2017-08-25 07:24:10', '2017-08-26 05:21:29', 100, 'MWO-SRP-3402', 'MWO-SRP-3402', 'Corporate', 'R-77AR(ST)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 17135, 18000, 18000, 18000, 50, 18000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(668, '2017-08-25 07:24:47', '2017-08-26 05:21:18', 100, 'MWO-SRP-4200', 'MWO-SRP-4200', 'Corporate', 'R-94AO(ST)V', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 17135, 29500, 29500, 29500, 100, 29500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(669, '2017-08-25 07:25:23', '2017-08-26 05:24:18', 100, 'MWO-TOS-2301', 'MWO-TOS-2301', 'Corporate', 'ER-G23SC(S)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 10566, 11100, 11100, 11100, 25, 11100, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(670, '2017-08-25 07:25:59', '2017-08-26 04:29:11', 100, 'MWO-WHL-2001', 'MWO-WHL-2001', 'Corporate', 'MG20BS/ MW20 Classic (Solo)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 7140, 7900, 7900, 7900, 50, 7900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(671, '2017-08-25 07:26:32', '2017-08-26 04:29:04', 100, 'MWO-WHL-2002', 'MWO-WHL-2002', 'Corporate', 'MW20BGL/ MW20 Deluxe (Grill)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 8135, 9000, 9000, 9000, 50, 9000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(672, '2017-08-25 07:27:11', '2017-08-26 04:28:57', 100, 'MWO-WHL-2501', 'MWO-WHL-2501', 'Corporate', 'MW25BG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 9942, 11000, 11000, 11000, 100, 11000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(673, '2017-08-25 07:27:41', '2017-08-26 04:28:50', 100, 'MWO-WHL-2502', 'MWO-WHL-2502', 'Corporate', 'MW25BC', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 13196, 14600, 14600, 14600, 100, 14600, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(674, '2017-08-25 07:28:12', '2017-08-25 10:44:40', 100, 'MWO-WHL-2503', 'MWO-WHL-2503', 'Corporate', 'Jet Crisp GT 288/BL (Convection)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 17173, 19000, 19000, 19000, 200, 19000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(675, '2017-08-25 07:29:04', '2017-08-26 04:28:43', 100, 'MWO-WHL-3000', 'MWO-WHL-3000', 'Corporate', 'MWO 611 / SL', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 11298, 12500, 12500, 12500, 100, 12500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(676, '2017-08-25 07:29:33', '2017-08-26 04:28:36', 100, 'MWO-WHL-3001', 'MWO-WHL-3001', 'Corporate', 'MW30BC', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 14371, 15900, 15900, 15900, 100, 15900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(677, '2017-08-25 07:30:03', '2017-08-26 04:28:28', 100, 'MWO-WHL-3002', 'MWO-WHL-3002', 'Corporate', 'Jet Crisp JQ 280/SL (Convection)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 24404, 27000, 27000, 27000, 250, 27000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(30, '2017-06-09 10:40:58', '2017-07-04 08:08:18', 100, 'NFN-PJ-01', 'NFN-PJ-01', 'OSP', 'Gent\'s Panjabi- 01pcs', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 700, 1350, 1350, 0, 50, 1250, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(29, '2017-06-09 10:37:28', '2017-07-04 08:08:33', 100, 'NFN-PS-02', 'NFN-PS-02', 'OSP', 'Panjabi- 01pcs & Formal Shirt- 01pcs', '', '', '', '', '', '', '', '', 'SUP0000004', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1370, 2570, 2570, 0, 100, 2430, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(13, '2017-06-09 05:52:43', '2017-11-09 03:52:05', 100, 'NTH-CROM-100', 'NTH-CROM-100', 'Corporate', 'Classic RO Machine- 100gpd', '', '', '', '', '', '', '', '', 'SUP0000001', 'SET', 'SET', '', 1, 'No', 'Mandatory', 'Stocking', 0, 14500, 19800, 19800, 19800, 500, 19800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'ABL-777-0007@abl.com', 'Live'),
(12, '2017-06-09 05:28:43', '2017-07-04 04:50:37', 100, 'NTH-CROM-75', 'NTH-CROM-75', 'Corporate', 'Classic RO Machine- 75gpd', '', '', '', '', '', '', '', '', 'SUP0000001', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 8000, 0, 13300, 0, 500, 13300, 0, '1', '', '', 'rajib@pureapp.com', 'amarbazarltd@gmail.com', 'Live'),
(17, '2017-06-09 06:01:15', '2017-07-04 04:50:46', 100, 'NTH-LROM-100', 'NTH-LROM-100', 'Corporate', 'Luxury RO Machine- 100gpd', '', '', '', '', '', '', '', '', 'SUP0000001', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 14400, 20800, 20800, 20800, 500, 20800, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(16, '2017-06-09 05:59:09', '2017-07-04 04:51:18', 100, 'NTH-LROM-75', 'NTH-LROM-75', 'Corporate', 'Luxury RO Machine- 75gpd', '', '', '', '', '', '', '', '', 'SUP0000001', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 13400, 19500, 19500, 19500, 500, 19500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(15, '2017-06-09 05:56:36', '2017-07-04 04:51:07', 100, 'NTH-SROM-100', 'NTH-SROM-100', 'Corporate', 'Super  Classic RO Machine- 100gpd', '', '', '', '', '', '', '', '', 'SUP0000001', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 13300, 23300, 23300, 23300, 1000, 23300, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(18, '2017-06-09 06:02:46', '2017-07-04 04:51:30', 100, 'NTH-SROM-200', 'NTH-SROM-200', 'Corporate', 'Super Classic RO Machine- 200gpd', '', '', '', '', '', '', '', '', 'SUP0000001', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 26900, 42500, 42500, 42500, 1500, 42500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(19, '2017-06-09 06:04:21', '2017-07-04 04:51:40', 100, 'NTH-SROM-400', 'NTH-SROM-400', 'Corporate', 'Super  Classic RO Machine- 400gpd', '', '', '', '', '', '', '', '', 'SUP0000001', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 38300, 72500, 72500, 72500, 3500, 72500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(14, '2017-06-09 05:54:57', '2017-07-04 04:51:52', 100, 'NTH-SROM-75', 'NTH-SROM-75', 'Corporate', 'Super  Classic RO Machine-75gpd', '', '', '', '', '', '', '', '', 'SUP0000001', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 11800, 17500, 17500, 17500, 500, 17500, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(35, '2017-06-09 12:46:53', '2017-07-04 08:07:34', 100, 'NTH-TDS-EL-01', 'NTH-TDS-EL-01', 'OSP', 'TDS & Electrolizer- 01set', '', '', '', '', '', '', '', '', 'SUP0000001', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 1600, 2000, 2000, 0, 25, 1925, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1442, '2017-10-09 12:25:25', NULL, 100, 'NTH-TDS-EL-02', 'NTH-TDS-EL-02', 'OSP', 'TDS & Electrolizer- 01set', '', '', '', '', '', '', '', '', 'SUP0000001', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1025, 1900, 2000, 1900, 75, 1900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1474, '2017-11-01 11:20:04', NULL, 100, 'NZD-DIMP-500', 'NZD-DIMP-500', 'OSP', 'Diploma Instant Milk Powder - 500gm', '', 'Food', '', '', '', '', '', '', 'SUP0000044', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 264.58, 282, 290, 282, 0.5, 282, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(27, '2017-06-09 10:25:38', '2017-07-04 04:53:17', 100, 'PLT-LP-04', 'PLT-LP-04', 'OSP', '100% Genuine Leather, Belt- 01pcs, Money Bag- 01pcs,, Gents parts- 01pcs and Key Ring Bag- 01pcs', '', '', '', '', '', '', '', '', 'SUP0000005', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 970, 1650, 1650, 0, 50, 1580, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1473, '2017-11-01 09:59:34', NULL, 100, 'PRN-MD-500', 'PRN-MD-500', 'OSP', 'Pran Mosur Dal - 500gm', '', 'Grocery', '', '', '', '', '', '', 'SUP0000027', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 54, 61, 65, 61, 0.25, 61, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1321, '2017-09-13 08:08:53', '2017-09-26 06:42:38', 100, 'PTI-ABL-STC', 'PTI-ABL-STC', 'Corporate', 'ABL START-UP TRAINING COURSE', '', '', '', '', '', '', '', '', 'SUP0000038', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1, 1200, 1200, 1200, 100, 1200, 0, '0', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(1362, '2017-09-18 11:49:18', '2017-09-26 06:43:34', 100, 'PTI-ABL-STC-02', 'PTI-ABL-STC-02', 'Corporate', 'Amarbazar Startup Training Course', '', '', '', '', '', '', '', '', 'SUP0000038', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1, 1200, 1200, 1200, 100, 1200, 0, '0', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(1269, '2017-08-29 05:37:27', NULL, 100, 'PTI-AEH-01', 'PTI-AEH-01', 'Corporate', 'Academic English (HSC)', '', '', '', '', '', '', '', '', 'SUP0000033', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 8500, 12000, 12000, 12000, 300, 12000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1268, '2017-08-29 05:35:48', '2017-08-29 04:38:08', 100, 'PTI-AES-01', 'PTI-AES-01', 'Corporate', 'Academic English (SSC)', '', '', '', '', '', '', '', '', 'SUP0000033', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 6500, 10000, 10000, 10000, 300, 10000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1267, '2017-08-29 05:34:39', NULL, 100, 'PTI-BAE-01', 'PTI-BAE-01', 'Corporate', 'Basic English', '', '', '', '', '', '', '', '', 'SUP0000033', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 6500, 10000, 10000, 10000, 300, 10000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1266, '2017-08-29 05:33:37', NULL, 100, 'PTI-BUE-01', 'PTI-BUE-01', 'Corporate', 'Business English', '', '', '', '', '', '', '', '', 'SUP0000033', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 10000, 14000, 14000, 14000, 300, 14000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1265, '2017-08-29 05:32:11', NULL, 100, 'PTI-IELTS-01', 'PTI-IELTS-01', 'Corporate', 'IELTS', '', '', '', '', '', '', '', '', 'SUP0000033', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 9700, 15000, 15000, 15000, 500, 15000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1271, '2017-08-29 05:40:43', NULL, 100, 'PTI-PHS-01', 'PTI-PHS-01', 'Corporate', 'Phonetics', '', '', '', '', '', '', '', '', 'SUP0000033', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 3700, 6000, 6000, 6000, 200, 6000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1270, '2017-08-29 05:39:39', NULL, 100, 'PTI-SPE-01', 'PTI-SPE-01', 'Corporate', 'Spoken English', '', '', '', '', '', '', '', '', 'SUP0000033', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 6500, 10000, 10000, 10000, 300, 10000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1272, '2017-08-29 05:44:29', NULL, 100, 'PTI-TOT-01', 'PTI-TOT-01', 'Corporate', 'PTI TOT', '', '', '', '', '', '', '', '', 'SUP0000033', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 5500, 7000, 7000, 7000, 100, 7000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(199, '2017-08-24 11:57:25', '2017-09-12 09:27:40', 100, 'RCO-CON-1019', 'RCO-CON-1019', 'Corporate', 'BE-223A6WGP (Rice Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 866, 1000, 1000, 1000, 10, 1000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(201, '2017-08-24 11:58:37', '2017-09-12 09:28:38', 100, 'RCO-CON-1020', 'RCO-CON-1020', 'Corporate', 'BE-283ATMS (Rice Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 909, 1050, 1050, 1050, 10, 1050, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(203, '2017-08-24 11:59:37', '2017-09-12 09:30:11', 100, 'RCO-CON-1021', 'RCO-CON-1021', 'Corporate', 'BE-323APP (Rice Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1033, 1194, 1194, 1194, 10, 1194, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(207, '2017-08-24 12:01:03', '2017-09-12 09:30:30', 100, 'RCO-CON-1022', 'RCO-CON-1022', 'Corporate', 'BE-283A6WGP (Rice Cooker)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 950, 1098, 1098, 1098, 10, 1098, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(710, '2017-08-25 07:51:59', '2017-08-26 04:51:30', 100, 'REF-CON-1011', 'REF-CON-1011', 'Corporate', 'BE-60CZ', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 10969, 12400, 12400, 12400, 100, 12400, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(711, '2017-08-25 07:52:31', '2017-08-26 04:51:14', 100, 'REF-CON-1041', 'REF-CON-1041', 'Corporate', 'BE-113/172(FUD)-BLUE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 19462, 22000, 22000, 22000, 250, 22000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(712, '2017-08-25 07:53:04', '2017-08-26 04:50:56', 100, 'REF-CON-1051', 'REF-CON-1051', 'Corporate', 'BE-176(FG)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 26538, 30000, 30000, 30000, 300, 30000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(713, '2017-08-25 07:53:38', '2017-08-26 04:50:45', 100, 'REF-CON-1060', 'REF-CON-1060', 'Corporate', 'BE-191(FG)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 28307, 32000, 32000, 32000, 300, 32000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(714, '2017-08-25 07:54:20', '2017-08-26 04:50:26', 100, 'REF-CON-1067', 'REF-CON-1067', 'Corporate', 'BE-87', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 13181, 14900, 14900, 14900, 100, 14900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted');
INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xvatpct`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(715, '2017-08-25 07:54:54', '2017-08-26 04:49:36', 100, 'REF-CON-1071', 'REF-CON-1071', 'Corporate', 'BE-146FUDLB/229(FUD)-BLUE', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 17604, 19900, 19900, 19900, 200, 19900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(716, '2017-08-25 07:55:19', '2017-08-26 04:48:54', 100, 'REF-CON-1072', 'REF-CON-1072', 'Corporate', 'BE-146FUDR/229(FUD)-RED', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 17604, 19900, 19900, 19900, 200, 19900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(717, '2017-08-25 07:55:54', '2017-08-26 04:48:41', 100, 'REF-CON-1093', 'REF-CON-1093', 'Corporate', 'BE-121', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 15835, 17900, 17900, 17900, 200, 17900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(718, '2017-08-25 07:56:30', '2017-08-26 04:48:31', 100, 'REF-CON-2001', 'REF-CON-2001', 'Corporate', 'BG-21FDCG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 32023, 36200, 36200, 36200, 300, 36200, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(719, '2017-08-25 07:57:03', '2017-08-26 04:48:13', 100, 'REF-CON-2002', 'REF-CON-2002', 'Corporate', 'BE-201HTMNF (Red)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 22027, 24900, 24900, 24900, 300, 24900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(720, '2017-08-25 07:57:32', '2017-08-26 04:47:56', 100, 'REF-CON-2003', 'REF-CON-2003', 'Corporate', 'BE-201HTMNF (Blue)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 21850, 24700, 24700, 24700, 300, 24700, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(721, '2017-08-25 07:58:09', '2017-08-26 04:47:38', 100, 'REF-CON-2010', 'REF-CON-2010', 'Corporate', 'BG-22FDCG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 32731, 37000, 37000, 37000, 300, 37000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(722, '2017-08-25 07:59:22', '2017-08-26 04:47:22', 100, 'REF-CON-2011', 'REF-CON-2011', 'Corporate', 'BE-281SC', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 32643, 36900, 36900, 36900, 300, 36900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(723, '2017-08-25 07:59:59', '2017-08-26 04:47:04', 100, 'REF-CON-2012', 'REF-CON-2012', 'Corporate', 'BG-24 FDCG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 32731, 37000, 37000, 37000, 300, 37000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(724, '2017-08-25 08:00:34', '2017-08-26 04:46:24', 100, 'REF-CON-2021', 'REF-CON-2021', 'Corporate', 'BE-234(FD) BLUE / 214FDB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 24327, 27500, 27500, 27500, 300, 27500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(725, '2017-08-25 08:01:15', '2017-08-26 04:46:14', 100, 'REF-CON-2022', 'REF-CON-2022', 'Corporate', 'BE-234(FD) SILVER', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 24769, 28000, 28000, 28000, 300, 28000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(726, '2017-08-25 08:01:44', '2017-08-26 04:45:54', 100, 'REF-CON-2023', 'REF-CON-2023', 'Corporate', 'BE - 214FDR', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 25388, 28700, 28700, 28700, 300, 28700, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(727, '2017-08-25 08:02:15', '2017-08-26 04:45:28', 100, 'REF-CON-2027', 'REF-CON-2027', 'Corporate', 'BEM-227BG (Black)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 28219, 31900, 31900, 31900, 300, 31900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(728, '2017-08-25 08:04:51', '2017-08-26 04:45:09', 100, 'REF-CON-2028', 'REF-CON-2028', 'Corporate', 'BEM-227GG (Golden)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 28219, 31900, 31900, 31900, 300, 31900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(729, '2017-08-25 08:05:26', '2017-08-26 04:44:55', 100, 'REF-CON-2031', 'REF-CON-2031', 'Corporate', 'BE-247(NF)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22115, 25000, 25000, 25000, 300, 25000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(730, '2017-08-25 08:05:54', '2017-08-26 04:44:18', 100, 'REF-CON-2035', 'REF-CON-2035', 'Corporate', 'BE 238 TGB (Black)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32643, 36900, 36900, 36900, 300, 36900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(731, '2017-08-25 08:06:28', '2017-08-26 04:43:20', 100, 'REF-CON-2036', 'REF-CON-2036', 'Corporate', 'BE 238 TGR (Red)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31757, 35900, 35900, 35900, 300, 35900, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(732, '2017-08-25 08:06:57', '2017-08-26 04:38:37', 100, 'REF-CON-2037', 'REF-CON-2037', 'Corporate', 'BE 238 TGP (Purple)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31404, 35500, 35500, 35500, 300, 35500, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(733, '2017-08-25 08:07:24', '2017-08-26 04:38:15', 100, 'REF-CON-2038', 'REF-CON-2038', 'Corporate', 'BE-254 (FG) / 234FDG', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23885, 27000, 27000, 27000, 300, 27000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(734, '2017-08-25 08:07:49', '2017-08-26 04:37:45', 100, 'REF-CON-2039', 'REF-CON-2039', 'Corporate', 'BE-234FDLB', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23885, 27000, 27000, 27000, 300, 27000, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(456, '2017-08-25 05:51:25', '2017-09-12 09:33:30', 100, 'REF-HAR-2025', 'REF-HAR-2025', 'Corporate', 'HRF-250FA (SILVER)', '', '', '', '', '', '', '', '', 'SUP0000022', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33317, 35000, 35000, 35000, 100, 35000, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(54, '2017-07-02 11:04:41', '2017-07-03 08:22:55', 100, 'SAM-FE-200', 'SAM-FE-200', 'OSP', 'Fullerâ€™s Earth-200gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 215, 330, 360, 330, 10, 330, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(3, '2017-06-03 14:08:37', '2017-07-04 07:50:32', 100, 'SAM-FMP-001', 'SAM-FMP-001', 'OSP', '1. Underarms Whitener-200gm,   2. Pink Care-200gm,  3. Facial Associates-200gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1455, 2535, 2640, 0, 100, 2535, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(4, '2017-06-03 14:11:02', '2017-07-04 07:50:51', 100, 'SAM-FMP-002', 'SAM-FMP-002', 'OSP', '1. Underarms Whitener-200gm,  2. Pink Care-200gm,  3. Facial Associates-200gm, 4. Facial Sweet-200gm ', '', '', '', '', '', '', '', '', 'SUP0000002', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1761, 3005, 3150, 0, 100, 3005, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(5, '2017-06-03 14:15:10', '2017-07-04 07:52:26', 100, 'SAM-FMP-003', 'SAM-FMP-003', 'OSP', '1.  Pink Care-200gm,  2. Facial Associates-200gm,  3. Neck Whitener-150gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1315, 2455, 2560, 0, 100, 2455, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(41, '2017-06-12 12:42:07', '2017-07-03 07:54:32', 100, 'SAM-FMP-004', 'SAM-FMP-004', 'OSP', '1. Fullerâ€™s Earth-200gm,  2. Orange Pack-150gm,  3. Lemon Pack-150gm,  4. Honey Pack-150gm,  4. Facial Sweet-200gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 881, 1645, 1695, 0, 50, 1645, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(42, '2017-06-12 12:45:51', '2017-07-03 07:54:48', 100, 'SAM-FMP-005', 'SAM-FMP-005', 'OSP', '1. Neck Whitener-150gm,  2. Unique Edition Body pack-150gm,  3. Sweat block Pack-150gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 450, 10150, 1100, 0, 50, 1015, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(147, '2017-08-10 09:11:41', NULL, 100, 'SCL-CACR-1000', 'SCL-CACR-1000', 'OSP', 'Chashi Aromatic Rice Chinigura-1kg', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 96.26, 105, 110, 105, 0.45, 105, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(150, '2017-08-10 09:20:01', '2017-11-08 05:33:05', 100, 'SCL-CIN-496', 'SCL-CIN-496', 'OSP', 'Chopstick Instant Noodles(Tom Yum)-496gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 104, 120, 130, 120, 1, 120, 0, '0', '', '', 'amarbazarltd@gmail.com', 'pdir@abl.com', 'Live'),
(148, '2017-08-10 09:14:02', NULL, 100, 'SCL-HRC-350', 'SCL-HRC-350', 'OSP', 'Ruchi Hot Chanachur-350gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 52.35, 57, 60, 57, 0.15, 57, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(142, '2017-08-10 07:08:23', NULL, 100, 'SCL-RBM-40', 'SCL-RBM-40', 'OSP', 'Radhuni Biryani Masala-40gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38.17, 43, 45, 43, 0.25, 43, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1325, '2017-09-14 10:40:09', NULL, 100, 'SCL-RBQC-150', 'SCL-RBQC-150', 'OSP', 'Ruchi Bar-B-Q Chanachur-150gmX2', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 59, 65, 70, 65, 0.25, 65, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(149, '2017-08-10 09:17:10', NULL, 100, 'SCL-RBQC-350', 'SCL-RBQC-350', 'OSP', 'Ruchi Bar-B-Q Chanachur-350gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 54.15, 59, 62, 59, 0.15, 59, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1298, '2017-08-29 11:44:39', NULL, 100, 'SCL-RCCM-100', 'SCL-RCCM-100', 'OSP', 'Radhuni Chicken Curry Masala-100gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46, 52, 55, 52, 0.25, 52, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(138, '2017-08-10 06:49:48', NULL, 100, 'SCL-RCNP-100', 'SCL-RCNP-100', 'OSP', 'Radhuni Powdered Spice- Cumin-100gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 66.88, 75, 80, 75, 0.45, 75, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(137, '2017-08-10 06:11:30', '2017-08-10 05:12:25', 100, 'SCL-RCNP-50', 'SCL-RCNP-50', 'OSP', 'Radhuni Powdered Spice- Cumin-50gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 36.23, 41, 43, 41, 0.3, 41, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(133, '2017-08-10 06:01:44', NULL, 100, 'SCL-RCP-100', 'SCL-RCP-100', 'OSP', 'Radhuni Powdered Spice- Chilli-100gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38.96, 43, 46, 43, 0.2, 43, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(134, '2017-08-10 06:04:22', NULL, 100, 'SCL-RCP-200', 'SCL-RCP-200', 'OSP', 'Radhuni Powdered Spice- Chilli-200gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 75.32, 83, 88, 83, 0.35, 83, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1296, '2017-08-29 11:42:07', NULL, 100, 'SCL-RCP-500', 'SCL-RCP-500', 'OSP', 'Radhuni Chilli Powder-500gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 179.06, 200, 208, 200, 1, 200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(135, '2017-08-10 06:07:55', '2018-02-28 11:02:43', 100, 'SCL-RCRP-100', 'SCL-RCRP-100', 'OSP', 'Radhuni Powdered Spice- Coriander-100gm', '', '', '', 'Raw Material', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25.05, 28, 30, 28, 0.15, 28, 0, '1', '', '', 'amarbazarltd@gmail.com', 'rajib@pureapp.com', 'Live'),
(136, '2017-08-10 06:09:18', NULL, 100, 'SCL-RCRP-200', 'SCL-RCRP-200', 'OSP', 'Radhuni Powdered Spice- Coriander-200gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46.2, 50, 55, 50, 0.1, 50, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(146, '2017-08-10 07:20:17', NULL, 100, 'SCL-RFM-150', 'SCL-RFM-150', 'OSP', 'Radhuni Firni Mix-150gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33.95, 38, 40, 38, 0.2, 38, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1310, '2017-08-31 07:29:29', NULL, 100, 'SCL-RFM-250gmX2', 'SCL-RFM-250gmX2', 'OSP', 'Radhuni Falooda Mix-250gm X2', '', '', '', '', '', '', '', '', 'SUP0000017', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 109.2, 122, 130, 122, 1, 122, 0, '1', '', '', 'ABL-777-0007@abl.com', NULL, 'Live'),
(140, '2017-08-10 07:01:41', NULL, 100, 'SCL-RGMP-40', 'SCL-RGMP-40', 'OSP', 'Radhuni Powdered Spice- Garam Masala-40gm', '	', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 46.36, 52, 55, 52, 0.3, 52, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(145, '2017-08-10 07:16:43', NULL, 100, 'SCL-RHM-200', 'SCL-RHM-200', 'OSP', 'Radhuni Haleem Mix-200gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 37.8, 43, 45, 43, 0.3, 43, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(141, '2017-08-10 07:06:11', NULL, 100, 'SCL-RKM-50', 'SCL-RKM-50', 'OSP', 'Radhuni Kabab Masala-50gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 70.02, 80, 85, 80, 0.6, 80, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1297, '2017-08-29 11:43:35', NULL, 100, 'SCL-RMCM-100', 'SCL-RMCM-100', 'OSP', 'Radhuni Meat Curry Masala-100gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 49.97, 57, 60, 57, 0.25, 57, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(144, '2017-08-10 07:14:10', NULL, 100, 'SCL-RMM-68', 'SCL-RMM-68', 'OSP', 'Radhuni Mejbani Masala-68gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 48, 57, 60, 57, 0.65, 57, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1323, '2017-09-14 10:36:59', NULL, 100, 'SCL-RMO-250', 'SCL-RMO-250', 'OSP', 'Radhuni Mustard Oil-250ml', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 53.15, 62, 65, 62, 0.5, 62, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1324, '2017-09-14 10:38:20', NULL, 100, 'SCL-RMO-500', 'SCL-RMO-500', 'OSP', 'Radhuni Mustard Oil-500ml', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 102.63, 112, 115, 112, 1, 112, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(143, '2017-08-10 07:11:45', NULL, 100, 'SCL-RTM-50', 'SCL-RTM-50', 'OSP', 'Radhuni Tandoori Masala-50gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 60, 72, 75, 72, 0.9, 72, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(131, '2017-08-10 05:56:46', NULL, 100, 'SCL-RTP-100', 'SCL-RTP-100', 'OSP', 'Radhuni Powdered Spice- Turmeric-100gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 35.18, 40, 42, 40, 0.3, 40, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(132, '2017-08-10 05:58:19', NULL, 100, 'SCL-RTP-200', 'SCL-RTP-200', 'OSP', 'Radhuni Powdered Spice- Turmeric-200gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 67, 75, 80, 75, 0.4, 75, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1295, '2017-08-29 11:40:48', '2017-09-27 08:49:06', 100, 'SCL-RTP-500', 'SCL-RTP-500', 'OSP', 'Radhuni Turmeric Powder-500gm', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 160.03, 180, 185, 180, 1, 180, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(67, '2017-07-13 09:08:27', NULL, 100, 'SCP-CLP-3000', 'SCP-CLP-3000', 'OSP', 'Chilli Powder-500 gm X 6', '', '', '', '', '', '', '', '', 'SUP0000003', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 960, 1200, 1200, 1200, 15, 1155, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(69, '2017-07-13 09:14:23', '2017-07-13 08:17:04', 100, 'SCP-CNP-2000', 'SCP-CNP-2000', 'OSP', 'Cumin Powder-200 gm X 10', '', '', '', '', '', '', '', '', 'SUP0000003', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 1209, 1550, 1550, 1550, 25, 1509, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(70, '2017-07-13 09:16:16', NULL, 100, 'SCP-CRP-2000', 'SCP-CRP-2000', 'OSP', 'Coriander Powder-200 gm X 10', '', '', '', '', '', '', '', '', 'SUP0000003', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 429, 550, 550, 550, 5, 520, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(40, '2017-06-12 08:18:49', '2017-07-14 16:39:54', 100, 'SCP-SFP-11', 'SCP-SFP-11', 'OSP', '1. Turmeric Powder- 500 gm X 2,  2. Chilli Powder-500 gmX 3,  3. Coriander Powder-500 gm, 4. Cumin Powder-200 gm X 3,  5. Ready Testy Bashion-1000 gm, 6. Vegetable Masala-200 gm X 3,  7. Ginger Powder-200 gm X 3,  8. Garam Masala-40 gm X 5,  9. Meat Masala-200 gm X 2, 10. Chicken Masala-20 gm X 5, 11.Fish Masala-200 gm X 3', '', '', '', '', '', '', '', '', 'SUP0000003', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 2621, 3360, 3360, 0, 50, 3230, 0, '1', '', '', 'amarbazarltd@gmail.com', 'ABL-777-0007@abl.com', 'Live'),
(66, '2017-07-13 09:04:58', NULL, 100, 'SCP-SSP-10', 'SCP-SSP-10', 'OSP', '1.Chilli Powder-500 gm X 2,  2.Turmeric Powder- 500 gm X 1,  3.Cumin Powder-200 gm X 1,  4.Coriander Powder-200 gm X 1,  5.Garam Masala-40 gm X 1,  6.Meat Masala-200 gm X 1', '', '', '', '', '', '', '', '', 'SUP0000003', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 768.3, 970, 970, 970, 10, 920, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(68, '2017-07-13 09:10:18', NULL, 100, 'SCP-TCP-3000', 'SCP-TCP-3000', 'OSP', 'Turmeric Powder- 500 gm X 6', '', '', '', '', '', '', '', '', 'SUP0000003', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 845, 1080, 1080, 1080, 15, 1035, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(51, '2017-07-02 10:59:23', '2017-07-03 08:10:16', 100, 'SFT-FA-200', 'SFT-FA-200', 'OSP', 'Facial Associates-200gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 555, 920, 950, 920, 30, 920, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(52, '2017-07-02 11:01:27', '2017-07-03 08:08:59', 100, 'SFT-FS-200', 'SFT-FS-200', 'OSP', 'Facial Sweet-200gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 306, 480, 510, 480, 15, 480, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(53, '2017-07-02 11:03:06', '2017-07-04 07:50:13', 100, 'SFT-PC-200', 'SFT-PC-200', 'OSP', 'Pink Care-200gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 610, 1160, 1210, 1160, 50, 1160, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(50, '2017-07-02 10:56:11', '2017-07-03 08:10:50', 100, 'SFT-UW-200', 'SFT-UW-200', 'OSP', 'Underarms Whitener-200gm', '', '', '', '', '', '', '', '', 'SUP0000002', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 290, 455, 480, 455, 15, 455, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(167, '2017-08-22 12:20:16', NULL, 100, 'SHH-SBD-L', 'SHH-SBD-L', 'OSP', 'Supermom Baby Diaper-Large(9-14kg)-22\'s', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 600, 695, 750, 695, 6.5, 695, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(168, '2017-08-22 12:21:20', NULL, 100, 'SHH-SBD-M', 'SHH-SBD-M', 'OSP', 'Supermom Baby Diaper-Medium(6-11kg)-26\'s', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 600, 695, 750, 695, 6.5, 695, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(166, '2017-08-22 12:18:31', NULL, 100, 'SHH-SBD-XL', 'SHH-SBD-XL', 'OSP', 'Supermom Baby Diaper-Xtra Large(12-17kg)-20\'s', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 600, 695, 750, 695, 6.5, 695, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1282, '2017-08-29 09:56:25', NULL, 100, 'SML-BOC-30', 'SML-BOC-30', 'OSP', 'Bio-Rezipe Oryzanol Capsule-30Cap', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 971.25, 1240, 1295, 1240, 20, 1240, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1289, '2017-08-29 10:05:27', NULL, 100, 'SML-BWS-01', 'SML-BWS-01', 'OSP', 'Bennet Whitening Soap', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 371.25, 450, 495, 450, 5, 450, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1273, '2017-08-29 09:33:54', '2017-08-29 08:36:50', 100, 'SML-CG-10', 'SML-CG-10', 'OSP', 'Cornex Gel-10gm', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 596.25, 750, 795, 750, 10, 750, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1279, '2017-08-29 09:51:22', NULL, 100, 'SML-FBC-30', 'SML-FBC-30', 'OSP', 'Finale Bust Cream-30gm', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 746.25, 950, 995, 950, 15, 950, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1277, '2017-08-29 09:48:53', NULL, 100, 'SML-FFC-30', 'SML-FFC-30', 'OSP', 'Finale Foot Soft Cream-30gm', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 337.5, 425, 450, 425, 5, 425, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1284, '2017-08-29 09:59:13', NULL, 100, 'SML-FHT-60', 'SML-FHT-60', 'OSP', 'Follione Hair Tonic-60ml', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 596.25, 750, 795, 750, 10, 750, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1278, '2017-08-29 09:50:17', NULL, 100, 'SML-FIS-01', 'SML-FIS-01', 'OSP', 'Finale Intensify Serum', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1046.25, 1330, 1395, 1330, 20, 1330, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1280, '2017-08-29 09:52:50', NULL, 100, 'SML-FNC-30', 'SML-FNC-30', 'OSP', 'Finale Pink Nipple Cream-30gm', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 521.25, 650, 695, 650, 10, 650, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1288, '2017-08-29 10:04:19', NULL, 100, 'SML-FP-M/W', 'SML-FP-M/W', 'OSP', 'Feromore Perfume (Men/Women)', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 3746.25, 4500, 4995, 4500, 50, 4500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1274, '2017-08-29 09:41:49', NULL, 100, 'SML-FRC-50', 'SML-FRC-50', 'OSP', 'Finale Stertch Mark Removal Cream-50gm', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 900, 1125, 1200, 1125, 15, 1125, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1283, '2017-08-29 09:57:29', NULL, 100, 'SML-FS-60', 'SML-FS-60', 'OSP', 'Follione Shampoo-60ml', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 596.25, 750, 795, 750, 10, 750, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1281, '2017-08-29 09:55:16', NULL, 100, 'SML-FSC-20', 'SML-FSC-20', 'OSP', 'Finale Smart Me Cream-20gm', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 746.25, 945, 995, 945, 15, 945, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1275, '2017-08-29 09:45:59', NULL, 100, 'SML-FWC-30', 'SML-FWC-30', 'OSP', 'Finale Whiteneing Cream-30gm', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 671.25, 860, 895, 860, 15, 860, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1286, '2017-08-29 10:02:15', NULL, 100, 'SML-KCM-60', 'SML-KCM-60', 'OSP', 'Ka-Cream (Vitamin-E) Moisturizer-60gm', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 596.25, 750, 795, 750, 10, 750, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1285, '2017-08-29 10:00:29', '2017-09-07 05:32:50', 100, 'SML-KUL-30', 'SML-KUL-30', 'OSP', 'Ka-UV Lotion(SPF 50++)-30gm', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 746.25, 950, 995, 950, 15, 950, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1287, '2017-08-29 10:03:15', NULL, 100, 'SML-MOM-01', 'SML-MOM-01', 'OSP', 'Magic O2 Mask', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1871.25, 2250, 2495, 2250, 25, 2250, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1291, '2017-08-29 10:07:36', NULL, 100, 'SML-MS-01', 'SML-MS-01', 'OSP', 'Dr.  Montri Soap(Anti-Acne)', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 371.25, 450, 495, 450, 5, 450, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1290, '2017-08-29 10:06:35', NULL, 100, 'SML-PS-01', 'SML-PS-01', 'OSP', 'Poompuksa Soap(Anti-melasma)', '', '', '', '', '', '', '', '', 'SUP0000034', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 446.25, 545, 595, 545, 5, 545, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1507, '2018-09-11 07:18:47', '2018-09-11 11:46:09', 100, 'sp-02', '', '', 'sakib product demo 02', 'this is a testing product.', 'Mobile', 'Samsung', 'Finished Goods', 'Local', 'TAX', 'VAT', 'China', 'SUP0000054', 'PCS', 'PCS', 'PCS', 1, 'No', 'None', 'Stocking', 0, 10000, 12000, 14000, 12000, 1, 11500, 0, '1', 'Black', '', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Deleted'),
(183, '2017-08-22 12:49:27', NULL, 100, 'STL-CAWP-1K', 'STL-CAWP-1K', 'OSP', 'Chaka Advaced Washing Powder-1000gm', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 54.6, 61, 65, 61, 0.3, 61, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1455, '2017-10-17 11:41:22', '2018-02-28 10:07:18', 100, 'STL-CBS-130', 'STL-CBS-130', 'OSP', 'Chaka Ball Soap-130gm', '', '', '', 'Raw Material', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 11.76, 13, 14, 13, 0, 13, 0, '1', '', '', 'amarbazarltd@gmail.com', 'rajib@pureapp.com', 'Live'),
(1307, '2017-08-30 04:41:42', NULL, 100, 'STL-CBS-130X5', 'STL-CBS-130X5', 'OSP', 'Chaka Ball Soap-130gmX05', '', '', '', '', '', '', '', '', 'SUP0000018', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 58.8, 65, 70, 65, 0.25, 65, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(182, '2017-08-22 12:48:23', NULL, 100, 'STL-CSW-1K', 'STL-CSW-1K', 'OSP', 'Chaka Super White-1000gm', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79.8, 90, 95, 90, 0.5, 90, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(185, '2017-08-22 12:51:18', NULL, 100, 'STL-JCOP-100', 'STL-JCOP-100', 'OSP', 'Jui Pure Coconut Oil(Plastic)-100ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 50.4, 57, 60, 57, 0.3, 57, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(184, '2017-08-22 12:50:26', NULL, 100, 'STL-JCOT-350', 'STL-JCOT-350', 'OSP', 'Jui Pure Coconut Oil(Tin)-350ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 159.6, 183, 190, 183, 1.5, 183, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(180, '2017-08-22 12:42:14', NULL, 100, 'STL-JHCO-200', 'STL-JHCO-200', 'OSP', 'Jui Hair Care Oil-200ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 130.2, 148, 155, 148, 1, 148, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(176, '2017-08-22 12:37:57', NULL, 100, 'STL-KAF-400', 'STL-KAF-400', 'OSP', 'Kool Shaving Foam-400ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 201.6, 230, 240, 230, 1.5, 230, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(178, '2017-08-22 12:39:57', NULL, 100, 'STL-KAL-100', 'STL-KAL-100', 'OSP', 'Kool After Shave Lotion-100ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 134.4, 152, 160, 152, 1, 152, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(179, '2017-08-22 12:41:05', NULL, 100, 'STL-KAL-50', 'STL-KAL-50', 'OSP', 'Kool After Shave Lotion-50ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 88.2, 100, 105, 100, 0.7, 100, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1396, '2017-09-28 10:35:39', NULL, 100, 'STL-KDBS-BLUE', 'STL-KDBS-BLUE', 'OSP', 'Kool Deodorant Body Spray(Blue)-150ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 184.8, 215, 220, 215, 2, 215, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1397, '2017-09-28 10:37:46', NULL, 100, 'STL-KDBS-SAINT', 'STL-KDBS-SAINT', 'OSP', 'Kool Deodorant Body Spray(Saint)-150ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 184.8, 215, 220, 215, 2, 215, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(177, '2017-08-22 12:39:01', NULL, 100, 'STL-KSF-200', 'STL-KSF-200', 'OSP', 'Kool Shaving Foam-200ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 159.6, 180, 190, 180, 1, 180, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1399, '2017-09-28 10:54:53', '2017-10-15 05:38:49', 100, 'STL-MBL-200', 'STL-MBL-200', 'OSP', 'Meril Baby Lotion-200', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 189, 215, 225, 215, 1.5, 215, 0, '1', '', '', 'amarbazarltd@gmail.com', 'ABL-777-0007@abl.com', 'Live'),
(1408, '2017-09-28 11:11:15', NULL, 100, 'STL-MBS-110ML', 'STL-MBS-110ML', 'OSP', 'Meril Baby Shampoo-110ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 75.6, 85, 90, 85, 0.5, 85, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1409, '2017-09-28 11:12:19', NULL, 100, 'STL-MBS-75GM', 'STL-MBS-75GM', 'OSP', 'Meril Baby Soap-75gm', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33.6, 38, 40, 38, 0.25, 38, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1398, '2017-09-28 10:39:14', NULL, 100, 'STL-MEFTP-100', 'STL-MEFTP-100', 'OSP', 'Magic Extra Fresh Tooth Powder-100gm', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29.4, 33, 35, 33, 0.2, 33, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1400, '2017-09-28 10:56:15', NULL, 100, 'STL-MG-60', 'STL-MG-60', 'OSP', 'Meril Glycerine-60gm', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42, 47, 50, 47, 0.25, 47, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1393, '2017-09-28 10:29:23', NULL, 100, 'STL-MMS-100', 'STL-MMS-100', 'OSP', 'Meril Milk Soap(W)-100gm', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 25.25, 29, 30, 29, 0.25, 29, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1394, '2017-09-28 10:31:34', NULL, 100, 'STL-MMS-150', 'STL-MMS-150', 'OSP', 'Meril Milk Soap(W)-150gm', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 35.28, 40, 42, 40, 0.25, 40, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1401, '2017-09-28 10:57:55', NULL, 100, 'STL-MOO-150', 'STL-MOO-150', 'OSP', 'Meril Olive Oil-150ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 210, 240, 250, 240, 1.5, 240, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1402, '2017-09-28 10:59:27', NULL, 100, 'STL-MPJ-100', 'STL-MPJ-100', 'OSP', 'Meril Petroleum Jelly-100ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 71.4, 80, 85, 80, 0.4, 80, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1403, '2017-09-28 11:01:26', NULL, 100, 'STL-MRWG-120', 'STL-MRWG-120', 'OSP', 'Meril Rose Water Glycerine-120gm', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 105, 120, 125, 120, 0.75, 120, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1404, '2017-09-28 11:03:09', NULL, 100, 'STL-RML-200', 'STL-RML-200', 'OSP', 'Revive Moisturizing Lotion-200ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 126, 140, 150, 140, 0.5, 140, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(174, '2017-08-22 12:33:12', NULL, 100, 'STL-SAF(AT)-300', 'STL-SAF(AT)-300', 'OSP', 'Spring Air Freshner(Anti Tabacco)-300ml', '', '', '', '', '', '', '', '', '', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 176.4, 200, 210, 200, 1.25, 200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(175, '2017-08-22 12:34:33', NULL, 100, 'STL-SAF(L)-300', 'STL-SAF(L)-300', 'OSP', 'Spring Air Freshner(Lemon Frest)-300ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 168, 190, 200, 190, 1.25, 190, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(181, '2017-08-22 12:45:49', NULL, 100, 'STL-SAFO-300', 'STL-SAFO-300', 'OSP', 'Spring Air Freshner(Orange Frest)-300ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 168, 190, 200, 190, 1.25, 190, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1405, '2017-09-28 11:07:31', NULL, 100, 'STL-SHW-MARI-200', 'STL-SHW-MARI-200', 'OSP', 'Sepnil Extra Mild Hand Wash Marigold-200ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 75.6, 85, 90, 85, 0.5, 85, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1406, '2017-09-28 11:08:48', NULL, 100, 'STL-SHW-SANI-200', 'STL-SHW-SANI-200', 'OSP', 'Sepnil Instant Hand Sanitizer-200ml ', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 168, 190, 200, 190, 1.25, 190, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(173, '2017-08-22 12:31:09', NULL, 100, 'STL-SPS-75', 'STL-SPS-75', 'OSP', 'Select Plus Ketoconazole Shampo-75ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 147, 168, 175, 168, 1.25, 168, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1410, '2017-09-28 11:13:37', NULL, 100, 'STL-SSNB-10', 'STL-SSNB-10', 'OSP', 'Senora Sanitary Napkin Belt-10\'P', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 75.6, 85, 90, 85, 0.5, 85, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1411, '2017-09-28 11:16:54', NULL, 100, 'STL-SSNB-15', 'STL-SSNB-15', 'OSP', 'Senora Sanitary Napkin Eco Belt-15\'P', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 100.8, 115, 120, 115, 0.75, 115, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(172, '2017-08-22 12:29:49', NULL, 100, 'STL-WPT-100', 'STL-WPT-100', 'OSP', 'White Plus toothpaste-100ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 54.6, 61, 65, 61, 0.25, 61, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(171, '2017-08-22 12:28:50', NULL, 100, 'STL-WPT-200', 'STL-WPT-200', 'OSP', 'White Plus toothpaste-200ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 88.2, 98, 105, 98, 0.5, 98, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(170, '2017-08-22 12:25:39', NULL, 100, 'STL-XAS-250', 'STL-XAS-250', 'OSP', 'Xpel AEROSOL(Levender)-250ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 147, 168, 175, 168, 1.25, 168, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(169, '2017-08-22 12:24:14', NULL, 100, 'STL-XAS-475', 'STL-XAS-475', 'OSP', 'Xpel AEROSOL-475ml', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 243.6, 275, 290, 275, 1.75, 275, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1407, '2017-09-28 11:09:57', NULL, 100, 'STL-ZS-75S', 'STL-ZS-75S', 'OSP', 'Zerocal Sachet(75+5 Sachet Free)', '', '', '', '', '', '', '', '', 'SUP0000018', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 155.4, 175, 185, 175, 1, 175, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1224, '2017-08-26 10:56:14', '2017-10-18 06:53:42', 100, 'TKG-PSO-2L', 'TKG-PSO-2L', 'OSP', 'Pusti Soyabean Oil-2L', '', '', '', '', '', '', '', '', 'SUP0000032', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 192, 192, 212, 205, 0.5, 205, 0, '1', '', '', 'ABL-777-0007@abl.com', 'dgmproduct@abl.com', 'Live'),
(1292, '2017-08-29 10:52:31', '2017-10-18 06:54:12', 100, 'TKG-PSO-5L', 'TKG-PSO-5L', 'OSP', 'Pusti Soyabean Oil-5L', '', '', '', '', '', '', '', '', 'SUP0000032', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 480, 525, 530, 525, 1.5, 525, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1293, '2017-08-29 10:54:08', '2017-10-18 06:56:17', 100, 'TKG-RBO-2L', 'TKG-RBO-2L', 'OSP', 'Pusti Better Life Rice Bran Oil-2L', '', '', '', '', '', '', '', '', 'SUP0000032', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 202, 240, 250, 240, 2.5, 240, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1294, '2017-08-29 10:55:28', '2017-10-18 07:04:31', 100, 'TKG-RBO-5L', 'TKG-RBO-5L', 'OSP', 'Pusti Better Life Rice Bran Oil-5L', '', '', '', '', '', '', '', '', 'SUP0000032', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 487, 575, 605, 575, 5, 575, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1326, '2017-09-14 12:48:33', '2017-09-17 04:13:06', 100, 'UBL-CSM-180', 'UBL-CSM-180', 'OSP', 'Clear Shampoo ManCSM CZEST-180ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 169, 185, 195, 185, 1.25, 185, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1327, '2017-09-14 12:50:17', '2017-09-17 04:18:17', 100, 'UBL-CTEYG-145', 'UBL-CTEYG-145', 'OSP', 'Closeup TP Eucalyptus Gaga-145gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 84.25, 90, 95, 90, 0.5, 90, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1328, '2017-09-14 12:51:33', '2017-09-17 04:17:29', 100, 'UBL-CTMB-145', 'UBL-CTMB-145', 'OSP', 'Closeup THPST Mint Byonc-145gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 93.25, 100, 105, 100, 0.5, 100, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1329, '2017-09-14 12:52:52', '2017-09-17 04:18:53', 100, 'UBL-CTRB-145', 'UBL-CTRB-145', 'OSP', 'Closeup THPST REdhot-145gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 93.25, 100, 105, 100, 0.5, 100, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1315, '2017-09-13 06:42:03', '2017-09-17 04:30:48', 100, 'UBL-DHRCP-01', 'UBL-DHRCP-01', 'OSP', 'Dove Hairfall Rescue Combo Pack', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 342, 365, 375, 365, 0.25, 365, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1316, '2017-09-13 06:43:43', '2017-09-17 04:35:39', 100, 'UBL-DIRCP-01', 'UBL-DIRCP-01', 'OSP', 'Dove Intense Repair Combo pack ', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 342, 365, 375, 365, 0.25, 365, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1317, '2017-09-13 06:45:14', '2017-09-17 04:40:23', 100, 'UBL-DOMCP-01', 'UBL-DOMCP-01', 'OSP', 'Dove Oxygen Moisture Combo Pack ', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 385.5, 415, 425, 415, 0.5, 415, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1330, '2017-09-14 12:54:13', '2017-09-17 04:38:01', 100, 'UBL-DSOM-350', 'UBL-DSOM-350', 'OSP', 'Dove Shampoo Oxygen Moisture-350ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 302, 330, 350, 330, 2.5, 330, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1331, '2017-09-14 12:55:26', '2017-09-17 04:19:10', 100, 'UBL-FOBC-40', 'UBL-FOBC-40', 'OSP', 'Fair & Lovely Blemish Blam Cream-40gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 148.58, 170, 180, 170, 1.5, 170, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1334, '2017-09-14 13:10:31', '2017-09-17 04:24:41', 100, 'UBL-FOFMF-25', 'UBL-FOFMF-25', 'OSP', 'Fair & Lovely FC MULVIT Fizza Cream-25gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 48.42, 52, 55, 52, 0.25, 52, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1333, '2017-09-14 13:03:39', '2017-09-17 04:38:20', 100, 'UBL-FOFMF-50', 'UBL-FOFMF-50', 'OSP', 'Fair & Lovely FC MULVIT Fizza Cream-50gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 87.17, 93, 98, 93, 0.5, 93, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1332, '2017-09-14 12:56:50', '2017-09-17 04:38:34', 100, 'UBL-FOMC-80', 'UBL-FOMC-80', 'OSP', 'Fair & Lovely MVIT Cream-80gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 173.42, 200, 210, 200, 2.25, 200, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1335, '2017-09-14 13:12:18', '2017-09-17 04:38:14', 100, 'UBL-LHW-180', 'UBL-LHW-180', 'OSP', 'Lifebuoy IQ HW Care-180mlX2', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 96.66, 105, 110, 105, 0.5, 105, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1340, '2017-09-14 13:20:08', '2017-09-17 04:30:22', 100, 'UBL-LUXCLN-375', 'UBL-LUXCLN-375', 'OSP', 'LUX SKN CLN Bar(Rose-125gm,Iris-125gm,Mgnola-125gm)', '', '', '', '', '', '', '', '', 'SUP0000021', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 118.5, 130, 135, 130, 1, 130, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1336, '2017-09-14 13:14:31', '2017-09-17 04:35:47', 100, 'UBL-PTAG-140', 'UBL-PTAG-140', 'OSP', 'Pepsodent THPST Advnced Gumcare-140gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 80, 92, 95, 92, 1, 92, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1314, '2017-09-13 06:39:41', '2017-09-17 04:40:49', 100, 'UBL-PWBCP-01', 'UBL-PWBCP-01', 'OSP', 'Pond\'sÂ  White Beauty Combo Pack ', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 245, 335, 360, 335, 5, 335, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1320, '2017-09-13 06:50:10', '2017-09-17 04:39:50', 100, 'UBL-TBNRB-01', 'UBL-TBNRB-01', 'OSP', 'TRESemmÃ© Botanique Nourish & Replenish Bundle ', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 440, 480, 490, 480, 1, 480, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1318, '2017-09-13 06:46:30', '2017-09-17 04:30:00', 100, 'UBL-TKSBB-01', 'UBL-TKSBB-01', 'OSP', 'TRESemmÃ© Keratin Smooth Botanique Bundle', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 440, 480, 490, 480, 1, 480, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1319, '2017-09-13 06:48:32', '2017-09-17 04:40:01', 100, 'UBL-TKSIB-01', 'UBL-TKSIB-01', 'OSP', 'TRESemmÃ© Keratin Smooth Ionic Bundle ', '', '', '', '', '', '', '', '', 'SUP0000017', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 440, 480, 490, 480, 1, 480, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1338, '2017-09-14 13:17:36', '2017-09-17 04:31:03', 100, 'UBL-VB-325', 'UBL-VB-325', 'OSP', 'Vim Bar-325gmX2', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 54, 58, 60, 58, 0.25, 58, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1339, '2017-09-14 13:19:08', '2017-09-17 04:25:05', 100, 'UBL-WPCF-1K', 'UBL-WPCF-1K', 'OSP', 'Wheel PWDR Clean & Fresh Nile-1KGX2', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 118.46, 125, 130, 125, 0.5, 125, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(61, '2017-07-03 05:28:49', '2017-07-04 04:53:29', 100, 'UC-LOG-01', 'UC-LOG-01', 'OSP', 'Longi- 01pcs', '', '', '', '', '', '', '', '', 'SUP0000012', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 230, 525, 575, 525, 25, 525, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(48, '2017-06-15 10:31:07', '2017-07-04 04:53:37', 100, 'UC-LOG-04', 'UC-LOG-04', 'OSP', 'Longi- 04pcs', '', '', '', '', '', '', '', '', 'SUP0000012', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 920, 2050, 2200, 0, 100, 2050, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(187, '2017-08-23 11:44:53', NULL, 100, 'UC-MT-01', 'UC-MT-01', 'OSP', 'Mia Tea- 250gm', '', '', '', '', '', '', '', '', 'SUP0000012', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 82, 96, 100, 96, 1, 96, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1467, '2017-10-31 11:30:04', NULL, 100, 'UC-PS-01', 'UC-PS-01', 'OSP', 'Polo shirt(Size-S,M,L,XL)', '', '', '', '', '', '', '', '', 'SUP0000012', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 170, 310, 350, 310, 10, 310, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(64, '2017-07-04 09:07:10', NULL, 100, 'UC-TDS-EL-01', 'UC-TDS-EL-01', 'OSP', 'TDS & Electrolizer- 01set', '', '', '', '', '', '', '', '', 'SUP0000001', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 1600, 1925, 2000, 1925, 25, 1925, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1466, '2017-10-31 11:28:38', NULL, 100, 'UC-TS-02', 'UC-TS-02', 'OSP', 'T-Shirt(Size-S,M,L,XL)', '', '', '', '', '', '', '', '', 'SUP0000012', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 220, 370, 400, 370, 10, 370, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1311, '2017-09-12 11:30:43', NULL, 100, 'UKML-KMC-1', 'UKML-KMC-1', 'OSP', 'Ordery Mosquito Net-6\'X7\'', '', '', '', '', '', '', '', '', 'SUP0000037', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 380, 550, 600, 550, 15, 550, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1312, '2017-09-12 11:32:20', NULL, 100, 'UKML-KMC-3', 'UKML-KMC-3', 'OSP', 'Ordery Mosquito Net-6\'X7\'(Print Fab)', '', '', '', '', '', '', '', '', 'SUP0000037', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 437, 600, 650, 600, 15, 600, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live');
INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xvatpct`, `zactive`, `xcolor`, `xsize`, `zemail`, `xemail`, `xrecflag`) VALUES
(1313, '2017-09-12 11:33:53', NULL, 100, 'UKML-TC-01', 'UKML-TC-01', 'OSP', 'Ordery Mosquito Net-6\'X7\'(TC)', '', '', '', '', '', '', '', '', 'SUP0000037', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 570, 890, 990, 890, 25, 890, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1225, '2017-08-27 09:06:12', NULL, 100, 'ULB-ABP-01', 'ULB-ABP-01', 'OSP', 'AXE Body Perfume Intense', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 305, 365, 380, 365, 5, 365, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1361, '2017-09-18 09:40:26', NULL, 100, 'ULB-CSM-180', 'ULB-CSM-180', 'OSP', 'Clear Shampoo ManCSM CZEST-180ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 169, 185, 195, 185, 1.25, 185, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1360, '2017-09-17 06:52:59', NULL, 100, 'ULB-CTEYG-145', 'ULB-CTEYG-145', 'OSP', 'Closeup TP Eucalyptus Gaga-145gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 84.25, 90, 95, 90, 0.5, 90, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1359, '2017-09-17 06:50:49', NULL, 100, 'ULB-CTMB-145', 'ULB-CTMB-145', 'OSP', 'Closeup THPST Mint Byonc-145gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 93.25, 100, 105, 100, 0.5, 100, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1358, '2017-09-17 06:49:03', NULL, 100, 'ULB-CTRB-145', 'ULB-CTRB-145', 'OSP', 'Closeup THPST REdhot-145gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 93.25, 100, 105, 100, 0.5, 100, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1228, '2017-08-27 09:11:04', NULL, 100, 'ULB-DC-HAR-180', 'ULB-DC-HAR-180', 'OSP', 'Dove Conditner Hairfal Rescue 180ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 217, 240, 250, 240, 2, 240, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1229, '2017-08-27 09:15:11', NULL, 100, 'ULB-DC-RDT-180', 'ULB-DC-RDT-180', 'OSP', 'Dove Condintioner Repair Damp Thaarpy180ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 217, 240, 250, 240, 2, 240, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1342, '2017-09-17 05:57:21', '2017-10-18 04:31:17', 100, 'ULB-DHRCP-01', 'ULB-DHRCP-01', 'OSP', 'Combo Contains: Dove Hairfall Rescue Conditioner 180ml X1 + Dove Hairfall Rescue Shampoo 180ml X 1', '', '', '', '', '', '', '', '', 'SUP0000021', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 342, 365, 375, 365, 0.25, 365, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1343, '2017-09-17 05:59:57', '2017-10-18 04:31:27', 100, 'ULB-DIRCP-01', 'ULB-DIRCP-01', 'OSP', 'Combo Contains: Dove Intense Repair Shampoo 180ml X 1 + Dove Intense Repair Conditioner  170ml X 1  ', '', '', '', '', '', '', '', '', 'SUP0000021', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 342, 365, 375, 365, 0.25, 365, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1344, '2017-09-17 06:01:22', '2017-10-18 04:31:36', 100, 'ULB-DOMCP-01', 'ULB-DOMCP-01', 'OSP', 'Combo Contains: Dove Oxygen Moisture Shampoo 180 ml X1 + Dove Oxygen Moisture Conditioner 180ml X 1', '', '', '', '', '', '', '', '', 'SUP0000021', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 385.5, 415, 425, 415, 0.5, 415, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1230, '2017-08-27 09:17:31', '2017-08-27 08:30:01', 100, 'ULB-DS-HRT-650', 'ULB-DS-HRT-650', 'OSP', 'Dove Shampoo Hairfall Rescue Tharapey 650ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 591, 660, 680, 660, 5, 660, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1227, '2017-08-27 09:09:54', NULL, 100, 'ULB-DS-IRP-180', 'ULB-DS-IRP-180', 'OSP', 'Dove Shampoo IPR Delux 180ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 155, 175, 180, 175, 2, 175, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1231, '2017-08-27 09:28:55', '2017-08-29 03:18:15', 100, 'ULB-DS-IRT-650', 'ULB-DS-IRT-650', 'OSP', 'Dove Shampoo Intns Repair Tharapy650ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 591, 660, 680, 660, 5, 660, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1357, '2017-09-17 06:46:27', NULL, 100, 'ULB-DSOM-350', 'ULB-DSOM-350', 'OSP', 'Dove Shampoo Oxygen Moisture-350ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 302, 330, 350, 330, 2.5, 330, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1356, '2017-09-17 06:44:49', '2017-09-18 06:28:54', 100, 'ULB-FOBC-40', 'ULB-FOBC-40', 'OSP', 'Fair & Lovely Blemish Blam Cream-40gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 148.58, 160, 170, 160, 1.5, 160, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1353, '2017-09-17 06:26:37', NULL, 100, 'ULB-FOFMF-25', 'ULB-FOFMF-25', 'OSP', 'Fair & Lovely FC MULVIT Fizza Cream-25gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 48.42, 52, 55, 52, 0.25, 52, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1354, '2017-09-17 06:39:28', NULL, 100, 'ULB-FOFMF-50', 'ULB-FOFMF-50', 'OSP', 'Fair & Lovely FC MULVIT Fizza Cream-50gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 87.17, 93, 98, 93, 0.5, 93, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1355, '2017-09-17 06:41:54', NULL, 100, 'ULB-FOMC-80', 'ULB-FOMC-80', 'OSP', 'Fair & Lovely MVIT Cream-80gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 173.42, 200, 210, 200, 2.25, 200, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1232, '2017-08-27 09:31:38', '2017-08-28 04:42:02', 100, 'ULB-KSC-24X04', 'ULB-KSC-24X04', 'OSP', 'Knorr Soup Chckn crn clas 24GX04', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 144, 156, 160, 156, 1, 156, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1447, '2017-10-17 07:06:23', NULL, 100, 'ULB-LBLF-100', 'ULB-LBLF-100', 'OSP', 'Lifeuboy Bar Lemon-Fresh-100gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24.83, 26, 27, 26, 0, 26, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1252, '2017-08-27 09:51:47', '2017-08-28 04:43:40', 100, 'ULB-LBLF-100X05', 'ULB-LBLF-100X05', 'OSP', 'Lifeuboy Bar Lemon-Fresh 100gmx05', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 124.15, 130, 135, 130, 0.5, 130, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1352, '2017-09-17 06:24:34', NULL, 100, 'ULB-LHW-180', 'ULB-LHW-180', 'OSP', 'Lifebuoy IQ HW Care-180mlX2', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 96.66, 105, 110, 105, 0.5, 105, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1443, '2017-10-17 07:02:27', '2017-11-08 05:26:17', 100, 'ULB-LHW-200', 'ULB-LHW-200', 'OSP', 'Lifebuoy IQ Hand Wash (total) - 200ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 79.33, 88, 90, 85, 0.1, 85, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1235, '2017-08-27 09:39:03', '2017-10-16 03:41:38', 100, 'ULB-LHW-200X02', 'ULB-LHW-200X02', 'OSP', 'Lifebuoy IQ hw total 200mlX02', '', '', 'Lifebuoy', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 158.66, 170, 180, 170, 1, 170, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1492, '2017-11-08 07:23:59', NULL, 100, 'ULB-LHWR-180', 'ULB-LHWR-180', 'OSP', 'Lifebuoy IQ Hand Wash Refill (Care) -180ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 47.33, 53, 55, 53, 0.1, 53, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1446, '2017-10-17 07:05:14', NULL, 100, 'ULB-LSBC-100', 'ULB-LSBC-100', 'OSP', 'Lifebuoy Skin Bar Care-100gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24.83, 26, 27, 26, 0, 26, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1250, '2017-08-27 09:50:46', '2017-08-28 04:45:45', 100, 'ULB-LSBC-100X05', 'ULB-LSBC-100X05', 'OSP', 'Lifebuoy Skin Bar Care 100gmx5', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 124.15, 130, 135, 130, 0.5, 130, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1444, '2017-10-17 07:03:22', NULL, 100, 'ULB-LSBC-150', 'ULB-LSBC-150', 'OSP', 'Lifebuoy Skin Bar Care- 150gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34.92, 37, 38, 37, 0, 37, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1245, '2017-08-27 09:48:16', '2017-08-28 04:46:52', 100, 'ULB-LSBC-150X5', 'ULB-LSBC-150X5', 'OSP', 'Lifebuoy Skin Bar Care 150gmX05', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 174.6, 185, 190, 185, 1, 185, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1448, '2017-10-17 07:07:18', '2018-02-28 11:02:27', 100, 'ULB-LSBT-100', 'ULB-LSBT-100', 'OSP', 'Lifebuoy Skin Bar Total-100gm', '', '', '', 'Raw Material', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24.83, 26, 27, 26, 0, 26, 0, '1', '', '', 'amarbazarltd@gmail.com', 'rajib@pureapp.com', 'Live'),
(1254, '2017-08-27 09:53:45', '2017-08-28 04:48:29', 100, 'ULB-LSBT-100X05', 'ULB-LSBT-100X05', 'OSP', 'Lifebuoy Skin Bar Total 100gmx05', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 124.15, 130, 135, 130, 0.5, 130, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1445, '2017-10-17 07:04:22', NULL, 100, 'ULB-LSBT-150', 'ULB-LSBT-150', 'OSP', 'Lifebuoy Skin Bar Total-150gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 34.92, 37, 38, 37, 0, 37, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1247, '2017-08-27 09:49:16', '2017-08-28 04:49:59', 100, 'ULB-LSBT-150X5', 'ULB-LSBT-150X5', 'OSP', 'Lifebuoy Skin Bar Total 150gmx05', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 174.6, 185, 190, 185, 1, 185, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1451, '2017-10-17 07:10:27', NULL, 100, 'ULB-LUX-SBS-100', 'ULB-LUX-SBS-100', 'OSP', 'LUX Skin SFT TCH FLW BM- 100gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 27.5, 29, 30, 29, 0, 29, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1263, '2017-08-27 09:58:37', '2017-08-28 04:54:01', 100, 'ULB-LUX-SBS-100X05', 'ULB-LUX-SBS-100X05', 'OSP', 'LUX Skin SFT TCH FLW BM 100gmx05', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 137.5, 145, 150, 145, 0.5, 145, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1450, '2017-10-17 07:09:32', NULL, 100, 'ULB-LUX-SBS-150', 'ULB-LUX-SBS-150', 'OSP', 'LUX Skin SFT TCH FLW BM-150gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38.63, 41, 42, 41, 0, 41, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1259, '2017-08-27 09:56:01', '2017-08-28 04:54:46', 100, 'ULB-LUX-SBS-150x05', 'ULB-LUX-SBS-150x05', 'OSP', 'LUX Skin SFT TCH FLW BM 150gmx05', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 193.15, 205, 210, 205, 1, 205, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1452, '2017-10-17 07:11:17', NULL, 100, 'ULB-LUX-SBV-100', 'ULB-LUX-SBV-100', 'OSP', 'LUX Skin Bar VLVT TCH FLW BM- 100', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 27.5, 29, 30, 29, 0, 29, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1262, '2017-08-27 09:57:57', '2017-08-28 04:58:11', 100, 'ULB-LUX-SBV-100X05', 'ULB-LUX-SBV-100X05', 'OSP', 'LUX Skin Bar VLVT TCH FLW BM 100x05', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 137.5, 145, 150, 145, 0.5, 145, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1449, '2017-10-17 07:08:34', NULL, 100, 'ULB-LUX-SBV-150', 'ULB-LUX-SBV-150', 'OSP', 'LUX Skin Bar VLVT TCH FLW BM-150gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 38.63, 41, 42, 41, 0, 41, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1256, '2017-08-27 09:54:38', '2017-08-28 04:58:45', 100, 'ULB-LUX-SBV-150X05', 'ULB-LUX-SBV-150X05', 'OSP', 'LUX Skin Bar VLVT TCH FLW BM 150gmx05', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 193.15, 205, 210, 205, 1, 205, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1261, '2017-08-27 09:57:30', NULL, 100, 'ULB-LUX-SCM-220', 'ULB-LUX-SCM-220', 'OSP', 'LUX Shower Cream Magic Spell 220ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 161.24, 190, 200, 190, 2.5, 190, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1346, '2017-09-17 06:14:59', NULL, 100, 'ULB-LUXCLN-375', 'ULB-LUXCLN-375', 'OSP', 'LUX SKN CLN Bar(Rose-125gm,Iris-125gm,Mgnola-125gm)', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 118.5, 130, 135, 130, 1, 130, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1480, '2017-11-08 04:22:35', NULL, 100, 'ULB-LUXCLNI-125', 'ULB-LUXCLNI-125', 'OSP', 'LUX SKN CLN Bar(Iris) Soap -125gm', '', 'Toiletries', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 39.5, 44, 45, 44, 0.25, 44, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1481, '2017-11-08 04:25:45', NULL, 100, 'ULB-LUXCLNM-125', 'ULB-LUXCLNM-125', 'OSP', 'LUX SKN CLN Bar(Magnolia) Soap -125gm', '', 'Toiletries', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 39.5, 44, 45, 44, 0.25, 44, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1478, '2017-11-08 04:20:10', NULL, 100, 'ULB-LUXCLNR-125', 'ULB-LUXCLNR-125', 'OSP', 'LUX SKN CLN Bar(Rose) Soap -125gm', '', 'Toiletries', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 39.5, 44, 45, 44, 0.25, 44, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1477, '2017-11-08 04:13:55', '2017-11-08 02:29:48', 100, 'ULB-LUXCLNR-128', 'ULB-LUXCLNR-125', 'OSP', 'LUX SKN CLN Bar(Rose) Soap -125gm', '', 'Toiletries', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 39.5, 44, 45, 44, 0.25, 44, 0, '1', '', '', 'dgmproduct@abl.com', 'dgmproduct@abl.com', 'Deleted'),
(1255, '2017-08-27 09:53:47', '2017-11-08 04:11:54', 100, 'ULB-PFCD-100', 'ULB-PFCD-100', 'OSP', 'PONDS Daily Face Wash - 100gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 104.17, 120, 125, 120, 1, 120, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1257, '2017-08-27 09:54:51', '2017-11-08 04:07:24', 100, 'ULB-PFWM-100', 'ULB-PFWM-100', 'OSP', 'PONDS face wash age miracle 100g', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 304, 340, 350, 340, 3.5, 340, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1260, '2017-08-27 09:56:45', NULL, 100, 'ULB-PPS-140', 'ULB-PPS-140', 'OSP', 'Pepsodent Exp-Prtctn Pro-Senstive 140gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 114, 130, 135, 130, 1, 130, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1351, '2017-09-17 06:23:06', NULL, 100, 'ULB-PTAG-140', 'ULB-PTAG-140', 'OSP', 'Pepsodent THPST Advnced Gumcare-140gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 80, 92, 95, 92, 1, 92, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1258, '2017-08-27 09:56:00', NULL, 100, 'ULB-PTP-200', 'ULB-PTP-200', 'OSP', 'Pepsodent Thpast GC Toothbrash 200gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 96.5, 106, 110, 106, 1, 106, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1341, '2017-09-17 05:47:42', '2017-10-18 04:31:46', 100, 'ULB-PWBCP-01', 'ULB-PWBCP-01', 'OSP', 'Combo Contains: Pond\'s White Beauty Day Cream 35g X 1 + Pond\'s White Beauty Face Wash 100g X 1', '', '', '', '', '', '', '', '', 'SUP0000021', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 245, 335, 360, 335, 5, 335, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1253, '2017-08-27 09:52:30', '2017-10-17 10:14:55', 100, 'ULB-REX-ROLL-50', 'ULB-REX-ROLL-50', 'OSP', 'REXONA wmn AP Roll-on Free Sprit 50ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 124, 135, 140, 135, 1, 135, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1488, '2017-11-08 06:51:59', NULL, 100, 'ULB-RPWD-1K', 'ULB-RPWD-1K', 'OSP', 'RIN STD PWD PWR BRT SRS ND 1k', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 90.75, 98, 99, 98, 0.1, 98, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1249, '2017-08-27 09:50:37', '2017-08-28 04:59:58', 100, 'ULB-RPWD-1KX02', 'ULB-RPWD-1KX02', 'OSP', 'RIN STD PWD PWR BRT SRS ND 1kX02', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 181.5, 194, 198, 194, 1, 194, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1453, '2017-10-17 07:12:30', NULL, 100, 'ULB-RPWD-500', 'ULB-RPWD-500', 'OSP', 'RIN STD PWD PWR BRT SIRUS -500gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 47.67, 51, 52, 51, 0, 51, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1251, '2017-08-27 09:51:27', '2017-08-28 05:01:02', 100, 'ULB-RPWD-500X04', 'ULB-RPWD-500X04', 'OSP', 'RIN STD PWD PWR BRT SIRUS 500gmX04', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 190.68, 204, 208, 204, 1, 204, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1243, '2017-08-27 09:46:41', '2017-09-27 10:07:58', 100, 'ULB-SEX-PWD-1k', 'ULB-SEX-PWD-1k', 'OSP', 'Surf Excel STD Powdwer Sky-1k', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 148.5, 160, 165, 160, 1, 160, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1242, '2017-08-27 09:45:46', '2017-09-27 10:07:11', 100, 'ULB-SEX-PWD-500x02', 'ULB-TCKS-200', 'OSP', 'Surf Excel STD Powdwer Sky-500gm x02', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 153, 164, 170, 164, 1, 164, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1244, '2017-08-27 09:47:31', NULL, 100, 'ULB-SS-BLK-375', 'ULB-SEX-PWD-1k', 'OSP', 'SUNSILK SHMP BLK SEFNDPTY 375ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 237.58, 265, 270, 265, 2.5, 265, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1248, '2017-08-27 09:49:33', NULL, 100, 'ULB-SS-HFS-375', 'ULB-SS-HFS-375', 'OSP', 'SUNSILK SHMP HFS SEFNDPTY 375ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 237.58, 265, 270, 265, 2.5, 265, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1246, '2017-08-27 09:48:27', NULL, 100, 'ULB-SS-PR-375', 'ULB-SS-PR-375', 'OSP', 'SUNSILK SHMP PR-STRT SDPTY 375ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 256.5, 285, 295, 285, 2.5, 285, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1491, '2017-11-08 07:17:48', NULL, 100, 'ULB-TBT-200', 'ULB-TBT-200', 'OSP', 'BB Taaza Black Tea- 200 gm', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 76.92, 83, 85, 83, 0.1, 83, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1226, '2017-08-27 09:08:46', '2017-09-26 05:39:04', 100, 'ULB-TBT-200X04', 'ULB-TBT-200X04', 'OSP', 'BB Taaza Black Tea- 200 gmX04', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 307.68, 320, 340, 320, 1, 320, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1237, '2017-08-27 09:40:59', NULL, 100, 'ULB-TCIS-190', 'ULB-TCIS-190', 'OSP', 'TRESEMME COND INOIC STRNGTH', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 235, 260, 270, 260, 2, 260, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1241, '2017-08-27 09:44:54', '2017-10-18 04:27:51', 100, 'ULB-TCKS-200', 'ULB-TCKS-200', 'OSP', 'TRESEMME COND KERNTIN SMOOT-200ML', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 235, 255, 270, 255, 2, 255, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1456, '2017-10-18 05:21:00', '2017-10-18 04:28:27', 100, 'ULB-TISCP-01', 'ULB-TISCP-01', 'OSP', 'Combo Contains: Tresemme Ionic Strength Shampoo-190ml X 1 + Tresemme Ionic Strength Conditioner-190ml X 1', '', '', '', '', '', '', '', '', 'SUP0000021', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 440, 480, 490, 480, 1, 480, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1345, '2017-09-17 06:03:26', '2017-10-18 04:30:59', 100, 'ULB-TKSBB-01', 'ULB-TKSBB-01', 'OSP', 'Combo Contains: Tresemme Keratin Smooth Shampoo 190ml X 1 + Tresemme Keratin Smooth Conditioner- 190ml X 1', '', '', '', '', '', '', '', '', 'SUP0000021', 'Package', 'Package', '', 1, 'No', 'None', 'Stocking', 0, 440, 480, 490, 480, 1, 480, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1240, '2017-08-27 09:43:54', '2017-10-16 05:21:35', 100, 'ULB-TSK-580', 'ULB-TSK-580', 'OSP', 'TRESEMME SHAMP KERATIN 580ML', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 587, 650, 675, 650, 5, 650, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1236, '2017-08-27 09:40:00', '2017-10-16 06:28:56', 100, 'ULB-TSKS-190', 'ULB-TSKS-190', 'OSP', 'TRESEMME SHAMPOO KRTN STRNGTH', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 235, 260, 270, 260, 2, 260, 0, '1', '', '', 'amarbazarltd@gmail.com', 'dgmproduct@abl.com', 'Live'),
(1239, '2017-08-27 09:43:00', NULL, 100, 'ULB-TSS-190', 'ULB-TSS-190', 'OSP', 'TRESEMME SHAMPOO INOIC STRNGTH ', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 235, 265, 270, 265, 2.5, 265, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1238, '2017-08-27 09:41:58', NULL, 100, 'ULB-TSS-580', 'ULB-TSS-580', 'OSP', 'TRESEMME SHAMPOO INOIC STRNGTH', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 587, 650, 675, 650, 5, 650, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1348, '2017-09-17 06:17:59', NULL, 100, 'ULB-VB-325', 'ULB-VB-325', 'OSP', 'Vim Bar-325gmX2', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 54, 58, 60, 58, 0.25, 58, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1490, '2017-11-08 07:07:37', NULL, 100, 'ULB-VL-250', 'ULB-VL-250', 'OSP', 'Vim Liquid 250 ml ', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'Mandatory', 'Stocking', 0, 31, 34, 35, 34, 0.1, 34, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1234, '2017-08-27 09:39:02', '2017-08-28 05:04:55', 100, 'ULB-VL-250X04', 'ULB-VL-250X04', 'OSP', 'Vim Liquid 250 ml X04', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 124, 136, 140, 136, 1, 136, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1337, '2017-09-14 13:16:17', '2017-09-17 04:38:09', 100, 'ULB-VL-500', 'ULB-VL-500', 'OSP', 'Vim Liquid-500ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 71.5, 78, 80, 78, 0.5, 78, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1369, '2017-09-20 10:18:53', NULL, 100, 'ULB-VL-500ml', 'ULB-VL-500ml', 'OSP', 'Vim Liquid-500ml', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 71.5, 78, 80, 78, 0.5, 78, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1454, '2017-10-17 07:13:27', '2018-02-28 10:34:40', 100, 'ULB-WLB-130', 'ULB-WLB-130', 'OSP', 'Wheel Laundry Soap-130gm', '', '', '', 'Raw Material', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 16.75, 17.5, 18, 17.5, 0, 17.5, 0, '1', '', '', 'amarbazarltd@gmail.com', 'rajib@pureapp.com', 'Live'),
(1233, '2017-08-27 09:37:17', '2017-08-27 10:20:31', 100, 'ULB-WLB-130X04', 'ULB-WLB-130X04', 'OSP', 'Wheel Laundary Soap 130gmx05', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 83.75, 87.5, 90, 87.5, 0.05, 87.5, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(1264, '2017-08-27 11:19:33', '2017-09-27 09:56:50', 100, 'ULB-WLB-130X05', 'ULB-WLB-130X05', 'OSP', 'Wheel Laundry Soap-130gmx05', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 83.75, 87.5, 90, 87.5, 0.25, 87.5, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(1489, '2017-11-08 07:00:24', NULL, 100, 'ULB-WPCF-01', 'ULB-WPCF-01', 'OSP', 'Wheel PWDR Clean & Fresh Nile-1KG', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 59.23, 63, 65, 63, 0.1, 63, 0, '1', '', '', 'dgmproduct@abl.com', NULL, 'Live'),
(1347, '2017-09-17 06:16:26', NULL, 100, 'ULB-WPCF-1K', 'ULB-WPCF-1K', 'OSP', 'Wheel PWDR Clean & Fresh Nile-1KGX2', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 118.46, 125, 130, 125, 0.5, 125, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(1350, '2017-09-17 06:21:26', '2017-09-20 09:15:01', 100, 'Vim Liquid-500ml', 'Vim Liquid-500ml', 'OSP', 'ULB-VL-500', '', '', '', '', '', '', '', '', 'SUP0000021', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 71.5, 78, 80, 78, 0.5, 78, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(65, '2017-07-04 09:12:17', '2017-09-25 10:35:33', 100, 'WEF-SF-56', 'WEF-SF-56', 'OSP', 'Ceiling Fan 56', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 1400, 1950, 2000, 1950, 50, 1950, 0, '0', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(24, '2017-06-09 08:26:44', '2017-07-04 08:12:36', 100, 'WEF-SF-56(01)', 'WEF-SF-56(01)', 'OSP', 'Ceiling Fan 56\" - 01pcs', '', '', '', '', '', '', '', '', 'SUP0000007', 'SET', 'SET', '', 1, 'No', 'None', 'Stocking', 0, 1400, 2000, 2000, 0, 50, 1950, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(96, '2017-07-24 08:58:30', NULL, 100, 'WI-09ZH', 'WI-09ZH', 'Corporate', 'Deep Fridge (318)-18cft', '', '', '', '', 'ostock', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29832, 36500, 40700, 36500, 500, 36500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(75, '2017-07-16 09:15:24', '2017-07-24 05:21:59', 100, 'WI-10DG', 'WI-10DG', 'Corporate', 'Refrigerator Double Glass Door, Upper Deep, 10cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22792, 28900, 31000, 28900, 500, 28900, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(76, '2017-07-16 09:18:02', '2017-07-24 05:21:48', 100, 'WI-10DK', 'WI-10DK', 'Corporate', 'Refrigerator VCM Door, Upper Deep,50/50, 10.5 cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21472, 27500, 28000, 27500, 500, 27500, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(79, '2017-07-16 09:29:44', '2017-07-24 05:21:34', 100, 'WI-10NG', 'WI-10NG', 'Corporate', 'Refrigerator Glass Door Uper Deep ,50/50 ,10.5 cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23232, 29700, 31500, 29700, 500, 29700, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(78, '2017-07-16 09:26:27', '2017-07-24 05:21:22', 100, 'WI-10V', 'WI-10V', 'Corporate', 'Refrigerator VCM Door, Upper Deep,50/50, 10.5 cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 22352, 28700, 30500, 28700, 500, 28700, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(84, '2017-07-24 06:40:36', '2017-07-24 05:41:28', 100, 'WI-12DGK', 'WI-12DGK', 'Corporate', 'Refrigerator Double Glass Door, Drawer, 12.5cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25432, 31900, 36000, 31900, 500, 31900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Live'),
(86, '2017-07-24 06:46:31', NULL, 100, 'WI-12NZ', 'WI-12NZ', 'Corporate', 'Refrigerator Double Glass Door, 4 Drawer(225ltr), 14cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 27192, 33900, 37000, 33900, 500, 33900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(85, '2017-07-24 06:43:38', NULL, 100, 'WI-14DGK', 'WI-14DGK', 'Corporate', 'Refrigerator Double Glass Door, Drawer, 14.5cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 26312, 32900, 38300, 32900, 500, 32900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(87, '2017-07-24 06:48:59', NULL, 100, 'WI-14NZ', 'WI-14NZ', 'Corporate', 'Refrigerator Double Glass Door, 4 Drawer (249ltr), 16cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 29832, 36900, 40500, 36900, 500, 36900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(92, '2017-07-24 08:45:56', NULL, 100, 'WI-15DN', 'WI-15DN', 'Corporate', 'Refrigerator Double Door, Uper Deep ,16cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 30712, 37900, 41900, 37900, 500, 37900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(91, '2017-07-24 08:35:11', NULL, 100, 'WI-16NG', 'WI-16NG', 'Corporate', 'Refrigerator Double Glass Door, 5 Drawer, Black Color,17cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 33352, 40900, 45500, 40900, 500, 40900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(88, '2017-07-24 08:26:08', NULL, 100, 'WI-16NZ', 'WI-16NZ', 'Corporate', 'Refrigerator Double Glass Door, Upper Deep (310ltr), 18.5cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 30712, 37900, 42500, 37900, 500, 37900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(90, '2017-07-24 08:31:42', NULL, 100, 'WI-17DGK', 'WI-17DGK', 'Corporate', 'Refrigerator Double Glass Door, 5 Drawer, 16.5cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31592, 38900, 43500, 38900, 500, 38900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(89, '2017-07-24 08:29:14', NULL, 100, 'WI-17NZ', 'WI-17NZ', 'Corporate', 'Refrigerator Double Glass Door, 4 Drawer (320ltr), 18.5cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 32472, 39900, 44500, 39900, 500, 39900, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(97, '2017-07-24 09:27:07', NULL, 100, 'WI-1914', 'WI-1914', 'Corporate', 'Western 19â€ LED TV', '', '', '', '', 'ostock', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 7134, 8750, 9500, 8750, 100, 8750, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(98, '2017-07-24 09:29:22', NULL, 100, 'WI-2212', 'WI-2212', 'Corporate', 'Western 22â€ LED TV', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 9266, 11800, 12500, 11800, 200, 11800, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(83, '2017-07-16 09:49:47', '2017-07-24 05:23:38', 100, 'WI-24DGK', 'WI-24DGK', 'Corporate', 'Refrigerator Glass Double Door Drawer ,12.5 cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24464, 30800, 32800, 30800, 500, 30800, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(80, '2017-07-16 09:32:57', '2017-07-24 05:20:36', 100, 'WI-24DK', 'WI-24DK', 'Corporate', 'Refrigerator VCM Door, Upper Deep,50/50, 11.5 cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 23496, 30000, 32000, 30000, 500, 30000, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(82, '2017-07-16 09:38:04', '2017-07-24 05:24:09', 100, 'WI-24NG', 'WI-24NG', 'Corporate', 'Refrigerator Glass Door Uper Deep ,50/50 ,12.5 cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 25432, 31900, 35000, 31900, 500, 31900, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(81, '2017-07-16 09:35:55', '2017-07-24 05:25:35', 100, 'WI-24V', 'WI-24V', 'Corporate', 'Refrigerator VCM Door, Upper Deep,50/50, 12.5 cft', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24552, 30900, 33500, 30900, 500, 30900, 0, '1', '', '', 'ABL-777-0007@abl.com', 'amarbazarltd@gmail.com', 'Live'),
(101, '2017-07-24 09:36:52', NULL, 100, 'WI-3219A', 'WI-3219A', 'Corporate', 'Western 32â€ LED TV ', '', '', '', '', 'ostock', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 16236, 20300, 22000, 20300, 300, 20300, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(99, '2017-07-24 09:30:55', NULL, 100, 'WI-3263X', 'WI-3263X', 'Corporate', 'Western 32â€ LED TV', '', '', '', '', 'ostock', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 15826, 19800, 21300, 19800, 300, 19800, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(102, '2017-07-24 09:38:13', NULL, 100, 'WI-3269A', 'WI-3269A', 'Corporate', 'Western 32â€ LED TV', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 17958, 22400, 24100, 22400, 300, 22400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(103, '2017-07-24 09:41:12', NULL, 100, 'WI-3269S', 'WI-3269S', 'Corporate', 'Western 32â€ LED TV (Smart)', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 19598, 24500, 26300, 24500, 400, 24500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(100, '2017-07-24 09:34:42', NULL, 100, 'WI-3298', 'WI-3298', 'Corporate', 'Western 32â€ LED TV (Curved)', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 15990, 20000, 21500, 20000, 300, 20000, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(104, '2017-07-24 09:43:05', NULL, 100, 'WI-4336S', 'WI-4336S', 'Corporate', 'Western 43â€ LED TV (Smart)', '', '', '', '', 'ostock', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 31898, 39500, 42800, 39500, 500, 39500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(105, '2017-07-24 09:44:42', NULL, 100, 'WI-5069S', 'WI-5069S', 'Corporate', 'Western 50â€ LED TV (Smart)', '', '', '', '', '', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 42558, 52500, 57100, 52500, 700, 52500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(93, '2017-07-24 08:49:23', NULL, 100, 'WI-60DK', 'WI-60DK', 'Corporate', 'Deep Fridge(160ltr)-9cft', '', '', '', '', 'ostock', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 16808, 22500, 23000, 22500, 500, 22500, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(94, '2017-07-24 08:52:27', NULL, 100, 'WI-70DK', 'WI-70DK', 'Corporate', 'Deep Fridge (210ltr)-12cft', '', '', '', '', 'ostock', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 21912, 28400, 30000, 28400, 500, 28400, 0, '1', '', '', 'amarbazarltd@gmail.com', NULL, 'Live'),
(95, '2017-07-24 08:54:41', '2018-03-29 13:31:20', 100, 'WI-80DK', 'WI-80DK', 'Corporate', 'Deep Fridge (256ltr)-15cft 	', '', '', '', '', 'ostock', '', '', '', 'SUP0000007', 'PCS', 'PCS', '', 1, 'No', 'None', 'Stocking', 0, 24552, 30900, 34700, 30900, 500, 30900, 0, '1', '', '', 'amarbazarltd@gmail.com', 'rajib@dotbdsolutions.com', 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `sesup`
--

CREATE TABLE `sesup` (
  `xsupsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime NOT NULL,
  `bizid` int(11) NOT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xsup` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `xshort` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xorg` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xadd1` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xadd2` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcity` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xprovince` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpostal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcountry` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcontact` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtitle` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsupemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfax` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xweburl` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xnid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgsup` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xpricegroup` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xsuptype` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdiscountpct` double DEFAULT NULL,
  `xcreditlimit` double DEFAULT NULL,
  `xcreditterms` int(3) DEFAULT NULL,
  `zactive` int(1) DEFAULT NULL,
  `xrecflag` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sesup`
--

INSERT INTO `sesup` (`xsupsl`, `ztime`, `zutime`, `bizid`, `xemail`, `xsup`, `xshort`, `xorg`, `xadd1`, `xadd2`, `xcity`, `xprovince`, `xpostal`, `xcountry`, `xcontact`, `xtitle`, `xphone`, `xsupemail`, `xmobile`, `xfax`, `xweburl`, `xnid`, `xtaxno`, `xtaxscope`, `xgsup`, `xpricegroup`, `xsuptype`, `xdiscountpct`, `xcreditlimit`, `xcreditterms`, `zactive`, `xrecflag`) VALUES
(60, '2017-09-27 10:29:39', '2017-09-29 08:29:57', 100, 'amarbazarltd@gmail.com', '000045', '', 'Bangladesh Sugar & Food Industries Corporation ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Deleted'),
(16, '2017-06-03 05:23:46', '0000-00-00 00:00:00', 100, '', 'SUP0000001', '', 'Nexus Trade Home', '', '', '', '', '', '', 'Mohammad Masudur Rahman', '', '01711479212', '', '01711479212', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(17, '2017-06-03 08:09:47', '0000-00-00 00:00:00', 100, '', 'SUP0000002', '', 'SAM Innovative Ltd', '43 Collage Street. (519/A 2nd Floor)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(18, '2017-06-03 08:13:56', '0000-00-00 00:00:00', 100, '', 'SUP0000003', '', 'Samagri Consumer Producs', '372/A Rajapur Lane , Anderkilla .Chittagong', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(19, '2017-06-03 13:37:28', '0000-00-00 00:00:00', 100, '', 'SUP0000004', '', 'Neluwa Fashion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(20, '2017-06-03 13:37:58', '0000-00-00 00:00:00', 100, '', 'SUP0000005', '', 'Pacific Leather Works', '', '', '', '', '', '', 'Md. Salim Khan', 'Proprietor', '', '', '01711192004', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(21, '2017-06-03 13:38:28', '0000-00-00 00:00:00', 100, '', 'SUP0000006', '', 'F I Products', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(22, '2017-06-03 13:38:57', '0000-00-00 00:00:00', 100, '', 'SUP0000007', '', 'Western Electronics Industries', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(23, '2017-06-03 13:39:37', '0000-00-00 00:00:00', 100, '', 'SUP0000008', '', 'Greentouch Ecommers System', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(24, '2017-06-03 13:40:57', '0000-00-00 00:00:00', 100, '', 'SUP0000009', '', 'Quantum Corporetion Ltd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(25, '2017-06-03 13:42:00', '0000-00-00 00:00:00', 100, '', 'SUP0000010', '', 'AUTHENTIC TRADE HOUSE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(26, '2017-06-12 08:10:45', '0000-00-00 00:00:00', 100, '', 'SUP0000011', '', 'Maqaam Group Product', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(27, '2017-06-15 10:29:04', '0000-00-00 00:00:00', 100, '', 'SUP0000012', '', 'UNIQUE CONSURTIAM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(28, '2017-06-18 05:11:54', '0000-00-00 00:00:00', 100, '', 'SUP0000013', '', 'AB Trade Int', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(29, '2017-07-03 05:31:23', '0000-00-00 00:00:00', 100, '', 'SUP0000014', 'Ismail & Sons', 'Ismail & Sons', '', '', '', '', '', '', 'Abdul Math Mukto', 'CEO', '', 'mukto.math@gmail.com', '01818486807', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(30, '2017-07-13 09:23:11', '0000-00-00 00:00:00', 100, '', 'SUP0000015', 'Amarbazar Ltd', 'Amarbazar Ltd', '', '', '', '', '', '', 'Khairul Hossain', 'General Manager', '', 'info@amarbazarltd.com', '01771123456', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(31, '2017-07-25 13:09:31', '0000-00-00 00:00:00', 100, '', 'SUP0000016', '', 'IFAD MULTI PRODUCT LTD', '', '', '', '', '', '', 'Saidur Rahman (Saeed)', '', '', 'sr.saeed74@gmail.com', '01714047230', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(32, '2017-08-10 05:49:58', '0000-00-00 00:00:00', 100, '', 'SUP0000017', '', 'Square Consumer Products Ltd', '', '', '', '', '', '', 'Sayed Bin Abedin', 'Executive (Instituti', '', 'sayed-sfbl@squaregroup.com', '01708124286', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(33, '2017-08-10 05:51:18', '0000-00-00 00:00:00', 100, '', 'SUP0000018', '', 'Square Toiletries Ltd', '', '', '', '', '', '', 'Kh. Luthful Mannan', 'Sr.Executive (Instit', '', 'luthful@squaregroup.com', '01730326870', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(34, '2017-08-10 10:29:10', '0000-00-00 00:00:00', 100, '', 'SUP0000019', '', 'M/S Genies Traders', '', '', '', '', '', '', 'Ritu Deb', 'Director', '', '', '01711700140', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(35, '2017-08-22 10:40:00', '0000-00-00 00:00:00', 100, '', 'SUP0000020', '', 'ACI Ltd', 'Ninakabbo, Level# 11, 227/A, Gulshan Tejgaon Link Road, Dhaka-1208', '', '', '', '', '', 'Rahul Saadat', '', '01730378126', 'saadat@aci-bd.com', '01730378126', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(36, '2017-08-23 06:29:15', '0000-00-00 00:00:00', 100, '', 'SUP0000021', '', 'Unilever Bangladesh Ltd', '', '', '', '', '', '', 'Rifaqat Rasheed', 'eCommerce Business D', '', 'rifaqat.rasheed@unilever.com', '01708459017', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(37, '2017-08-23 06:29:59', '0000-00-00 00:00:00', 100, '', 'SUP0000022', '', 'Best Electronics Ltd', 'City Centre(Level-11), 90/1 motijheel C/A, Dhaka-1000', '', '', '', '', '', 'Md Marjuman Rahman', 'Sales Manager', '', 'marjuman@bestelectronicsltd.com', '01777794565', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(38, '2017-08-23 06:31:38', '0000-00-00 00:00:00', 100, '', 'SUP0000023', '', 'Desh Bangla Agro Foods', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(39, '2017-08-23 06:34:12', '0000-00-00 00:00:00', 100, '', 'SUP0000024', '', 'KIAM Metal Ind. Ltd', '', '', '', '', '', '', 'Md Abul Kalam Azad', 'Ass. Manager(Corpura', '', 'azadkalam@gmail.com', '01713047848', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(40, '2017-08-23 06:35:38', '0000-00-00 00:00:00', 100, '', 'SUP0000025', '', 'Parasol Language Center', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(41, '2017-08-23 06:36:17', '0000-00-00 00:00:00', 100, '', 'SUP0000026', '', 'RFL Group', '', '', '', '', '', '', 'Tijul Islam', 'Deputy General Manag', '', 'rfl44@rflgroupbd.com', '01912257414', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(42, '2017-08-23 06:36:38', '0000-00-00 00:00:00', 100, '', 'SUP0000027', '', 'PRAN Group', '', '', '', '', 'Sanjib Chakraborty', '', '', 'Ass. Manager', '', 'sp340@prangroup.com', '01924601662', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(43, '2017-08-23 06:37:59', '0000-00-00 00:00:00', 100, '', 'SUP0000028', '', 'Regal Furnisher (RFL) ', '', '', '', '', '', '', 'Ariful Islam Mony', 'Sales Executive (Cor', '', 'rfl1122@rflgroupbd.com', '01924605102', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(44, '2017-08-23 06:38:39', '0000-00-00 00:00:00', 100, '', 'SUP0000029', '', 'Dream Water Purifier', '', '', '', '', '', '', 'Md Moniruzzaman Monir', '', '', '', '01711273164', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(45, '2017-08-23 06:39:33', '0000-00-00 00:00:00', 100, '', 'SUP0000030', '', 'Aritra Computers (HP)', '', '', '', '', '', '', 'T.H Mostafa Dipu', 'CEO', '', 'sales@aritra.com.bd', '01819273166', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(46, '2017-08-23 06:55:19', '0000-00-00 00:00:00', 100, '', 'SUP0000031', '', 'Fashion Mart International', 'Shop# 1F/2, Polwel Super Market, Naya Paltan, Dhaka-1000', '', '', '', '', '', 'Nazrul Islam', 'Proprietor', '', 'islammdnazrul07.mi@gmail.com', '01715110945', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(47, '2017-08-24 07:24:26', '0000-00-00 00:00:00', 100, '', 'SUP0000032', '', 'T.K. Group Of Industries', 'T. K. Bhaban (2nd Floor), 13, Karwan Bazar, Dhaka-1215', '', '', '', '', '', 'MD Zakaria', 'Sr ASM (Modren Trade', '01760560049', 'mr.zakaria@tkgroupbd.com', '01708143688', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(48, '2017-08-29 05:16:20', '0000-00-00 00:00:00', 100, '', 'SUP0000033', '', 'Parachute Training Institute', 'Dhaka', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(49, '2017-08-29 09:27:40', '0000-00-00 00:00:00', 100, '', 'SUP0000034', '', 'ScienceMed Ltd', 'New Market City Complex(2nd Floor),New Market, Dhaka-1205', '', '', '', '', '', '', '', '01716135014', '', '01712731310', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(50, '2017-08-29 11:55:19', '0000-00-00 00:00:00', 100, '', 'SUP0000035', '', 'A.R Enterprise', 'Malopara, Ghoramara, Boalia, Rajshahi', '', '', '', '', '', '', '', '01912048103', '', '01912048103', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(51, '2017-08-30 06:26:00', '0000-00-00 00:00:00', 100, '', 'SUP0000036', '', 'ACI Food Ltd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(52, '2017-09-12 11:29:18', '0000-00-00 00:00:00', 100, '', 'SUP0000037', '', 'UDOY KNITTNG MILLS LTD', 'Room#58,3rd Floor, Sunderban Square Supper Market,Fullbaria,Gulistan,Dhaka', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(53, '2017-09-13 07:53:37', '0000-00-00 00:00:00', 100, '', 'SUP0000038', '', 'PARASOL TRAINING INSTITUTE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(54, '2017-09-21 11:50:45', '0000-00-00 00:00:00', 100, '', 'SUP0000039', '', 'Millennium Distribution Company', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(55, '2017-09-22 09:50:13', '0000-00-00 00:00:00', 100, '', 'SUP0000040', '', 'Anco Laboratories Ltd', '', '', '', '', '', '', '', '', '01966003500', '', '017819877727', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(56, '2017-09-22 10:02:36', '0000-00-00 00:00:00', 100, '', 'SUP0000041', '', 'BD Garden\'s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(57, '2017-09-22 10:03:05', '0000-00-00 00:00:00', 100, '', 'SUP0000042', '', 'Meghna Group (Fresh)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(58, '2017-09-22 10:03:42', '0000-00-00 00:00:00', 100, '', 'SUP0000043', '', 'Energypac', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(59, '2017-09-22 10:04:04', '0000-00-00 00:00:00', 100, '', 'SUP0000044', '', 'New Zealand Dairy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(61, '2017-09-28 05:32:32', '0000-00-00 00:00:00', 100, '', 'SUP0000045', '', 'Bangladesh Sugar & Food Industries Corporation ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(62, '2017-10-05 11:09:30', '0000-00-00 00:00:00', 100, '', 'SUP0000046', '', 'Dream Water Purifier', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(63, '2017-10-21 09:13:35', '0000-00-00 00:00:00', 100, '', 'SUP0000047', '', 'Bhuyan Enterprise', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(64, '2018-03-29 05:50:22', '0000-00-00 00:00:00', 100, '', 'SUP0000048', '', 'ZYZ Transport', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(65, '2018-03-29 06:51:14', '0000-00-00 00:00:00', 100, '', 'SUP0000049', '', 'akij group', 'mohakhali', '', '', '', '', 'Bangladesh', '', 'CEO', '', 'milonkumar21293@gmail.com', '01931437005', '', '', '', '', 'None', '', '', '', 0, 500, 15, 1, 'Live'),
(66, '2018-03-29 07:16:38', '0000-00-00 00:00:00', 100, '', 'SUP0000050', 'hasan', 'hasan group of company', '', '', '', '', '', 'Bangladesh', '01764237708', '', '', 'hasanuzzaman2895@gmail.com', '', '', '', '', '', 'None', '', '', '', 0, 1000, 20, 1, 'Live'),
(67, '2018-03-29 09:34:58', '0000-00-00 00:00:00', 100, '', 'SUP0000051', '', 'TEst Supplier', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live'),
(68, '2018-04-05 05:35:41', '0000-00-00 00:00:00', 100, '', 'SUP0000052', 'Rahim', 'Food Materials', 'Mohakhali DOHS', 'Mohakhali DOHS Road-19', '', '', '3920', 'Bangladesh', '0187937987', 'tiuygjh', '097564564', 'jkhkjgk@jhgk', '098765663', 'kjujdg', 'hjhvjhfb.com', '7654334567', '2863547', 'None', '', '', '', 3, 10000, 500, 1, 'Live'),
(69, '2018-04-05 06:11:14', '0000-00-00 00:00:00', 100, '', 'SUP0000053', 'mobile', 'sampony mobile company', 'mohakhali', '', '', '', '1000', 'Bangladesh', '0987654321', 'office', '78695430', '', '', '', '', '', '', 'None', '', '', '', 25, 50000, 15, 1, 'Live'),
(70, '2018-08-07 05:59:46', '0000-00-00 00:00:00', 100, '', 'SUP0000054', 'Anik Mobile', 'Anik Mobile Company Ltd.', 'Motijhel,1000, Dhaka', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `sesupoutlet`
--

CREATE TABLE `sesupoutlet` (
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bizid` int(6) NOT NULL,
  `xoutletsl` bigint(20) UNSIGNED NOT NULL,
  `xoutlet` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xadd1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdistrict` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xthana` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xsuffix` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sesupoutlet`
--

INSERT INTO `sesupoutlet` (`ztime`, `bizid`, `xoutletsl`, `xoutlet`, `xdesc`, `xsup`, `xadd1`, `xdistrict`, `xthana`, `xmobile`, `xemail`, `zemail`, `xsuffix`, `xphone`) VALUES
('2017-08-30 04:45:13', 100, 100, 'BBA', 'Mr. Dibashid Kumar B', 'SUP0000022', '342/38 T A Road, B.Baria', 'DHAKA', '', '01777-794916', NULL, 'amarbazarltd@gmail.com', 'BBA', '029127857'),
('2017-08-29 12:09:57', 100, 74, 'BBG', 'Mr. Sayduzzaman Apu', 'SUP0000022', 'Rabu Tower (G Floor), 739/A, Borogola,  Bogra', 'RAJSHAHI', '', '01777-794868', NULL, 'amarbazarltd@gmail.com', 'BBG', '051-63325'),
('2017-08-29 12:04:21', 100, 61, 'BBR', 'Mr. Serajul Islam (A', 'SUP0000022', 'Durjoy More, Bazar Road, BangabandhuSharani, Bhairab', 'DHAKA', '', '01777-794848', NULL, 'amarbazarltd@gmail.com', 'BBR', '029471606'),
('2017-08-29 11:58:53', 100, 49, 'BGR', 'MR. K. M. MAHBUB', 'SUP0000022', 'INSHAN CENTER, DATTA BARI, BOGRA.', '', '', '01777794650', NULL, 'ABL-777-0007@abl.com', 'BGR', '05167134'),
('2017-08-29 11:37:10', 100, 18, 'BHL', 'Mr. Md. Masum ', 'SUP0000022', 'Zaman Center, Ukil Para, Sader, Bhola', 'BARISAL', '', '01777794774', NULL, 'amarbazarltd@gmail.com', 'BHL', ''),
('2017-08-29 12:12:57', 100, 79, 'BRL', 'Mr.ABM Shaiful Islam', 'SUP0000022', 'AK High School 2nd floor, opposite of Madennova', 'BARISAL', '', '01709666285', NULL, 'amarbazarltd@gmail.com', 'BRL', ''),
('2017-08-29 11:55:18', 100, 42, 'BRP', 'Mr. Md. Hasan Ali', 'SUP0000022', 'BirampurTower,Birampur, Dinajpur', 'RANGPUR', '', '01777-794843', NULL, 'amarbazarltd@gmail.com', 'BRP', '05322-56616'),
('2017-08-29 12:26:35', 100, 91, 'BSM', 'MR.MOSTAFIZUR RAHMAN', 'SUP0000022', 'YAKUBIA MORE, SHERPUR ROAD, BOGRA.', '', '', '01777794656', NULL, 'ABL-777-0007@abl.com', 'BSM', '051628222'),
('2017-08-29 11:30:34', 100, 13, 'CDG', 'MR. ZAHIDUL ISLAM', 'SUP0000022', 'SHAHID ABDUL KASHEM ROAD, CHUADANGA', '', '', '01777794601', NULL, 'ABL-777-0007@abl.com', 'CDG', '076181051'),
('2017-08-29 12:05:46', 100, 64, 'CHR', 'Mr.Mizanur Rahman', 'SUP0000022', 'Bilock-K,Lane-1,Halishohor,Housing State.', 'CHITTAGONG', '', '01709666295', NULL, 'amarbazarltd@gmail.com', 'CHR', ''),
('2017-08-29 12:22:05', 100, 89, 'CHY', 'MR. BIPLOB KUMAR ', 'SUP0000022', 'MUKTIJODDHA SUPER MARKET, KARIM PUR ROAD, CHOWMUHONI, NOAKHALI.', '', '', '01777794752', NULL, 'ABL-777-0007@abl.com', 'CHY', '032151249'),
('2017-08-29 11:54:02', 100, 39, 'CMA', 'Mr. Khandoker Arif H', 'SUP0000022', '218/196 Jhautola, Sadar, Comilla', 'CHITTAGONG', '', '01777-794808', NULL, 'amarbazarltd@gmail.com', 'CMA', ''),
('2017-08-29 11:53:49', 100, 38, 'CPN', 'Mr. Taimul Haq', 'SUP0000022', 'Mango Tower, 42/2, Batan Kha Mour, Chapainawabganj.', 'RAJSHAHI', '', '01777794966', NULL, 'amarbazarltd@gmail.com', 'CPN', ''),
('2017-08-29 12:05:51', 100, 65, 'CPR', 'Mr. Faruq Hossain Kh', 'SUP0000022', 'ShahidMuktijoddha Road, Sadar, Chandpur', 'CHITTAGONG', '', '01777-794797', NULL, 'amarbazarltd@gmail.com', 'CPR', ''),
('2017-08-29 11:34:39', 100, 16, 'CPT', 'MR. SHAHIDUL ISLAM ', 'SUP0000022', 'S.S TOWER 1ST FLOOR, 423/440 PATHANTOLY, CHOWMOHONY, CHITTAGONG. ', '', '', '017777794762', NULL, 'ABL-777-0007@abl.com', 'CPT', '031712973'),
('2017-08-29 12:00:46', 100, 51, 'CRJ', 'Mr. Shah Md. Shoeb', 'SUP0000022', 'Holding No-193/194, Chatipotte, Sadar Comilla.', 'CHITTAGONG', '', '01709666265', NULL, 'amarbazarltd@gmail.com', 'CRJ', ''),
('2017-10-24 12:35:32', 100, 107, 'CTG', '', 'SUP0000038', 'Agrabadh', '', '', '', NULL, 'ABL-777-0007@abl.com', 'CTG', ''),
('2017-08-29 11:43:45', 100, 24, 'CXB', 'Mr. Shariful Alam Ch', 'SUP0000022', 'Jhautola Main Road, Hotel Al-Hera (2nd Floor),Cox,s Bazar', 'CHITTAGONG', '', '01777794788', NULL, 'amarbazarltd@gmail.com', 'CXB', ''),
('2017-08-29 11:40:38', 100, 21, 'DAB', 'Mr. Nur Hossain', 'SUP0000022', '48, Middle Basabo, (Near of Play Ground), Sobujbag, Dhaka', 'DHAKA', '', '01777794783', NULL, 'amarbazarltd@gmail.com', 'DAB', ''),
('2017-08-29 12:03:10', 100, 58, 'DAM', 'Md. Anawarul Parvez', 'SUP0000022', '19,Darussalam road,mirpur-1,chineese bustand.', 'DHAKA', '', '01709666280', NULL, 'amarbazarltd@gmail.com', 'DAM', ''),
('2017-08-30 04:42:42', 100, 97, 'DAS', 'Mr. Rakib Hassan Apu', 'SUP0000022', 'House No-90, Sofia Mansion, Bogabari, Asulia, Savar Dhaka', 'DHAKA', '', '01777-794901', NULL, 'amarbazarltd@gmail.com', 'DAS', ''),
('2017-08-28 10:20:30', 100, 9, 'DCP', 'Md. Aminul Islam ', 'SUP0000022', '70/B MalibaghChowdhury Para, Dhaka', 'DHAKA', '', '01777794730', NULL, 'amarbazarltd@gmail.com', 'DCP', '02-9337404'),
('2017-08-29 11:43:57', 100, 25, 'DDK', 'Mr. Shafiqul Islam', 'SUP0000022', 'Mr. Shafiqul Islam Haji Abu TaherZameMosjid, ShohidLatif Road (PremBagan),MollarTek, Asskona, Dokkhinkhan, Dhaka.', 'DHAKA', '', '01777794941 ', NULL, 'amarbazarltd@gmail.com', 'DDK', ''),
('2017-08-29 11:47:06', 100, 29, 'DDP', 'Mr. Didar Uddin', 'SUP0000022', 'S A Tower, 101- Dholaipar Bus Stand, Shempur, Dhaka', 'DHAKA', '', '01777-794813', NULL, 'amarbazarltd@gmail.com', 'DDP', '02-7444004'),
('2017-08-28 10:14:30', 100, 7, 'DEK', 'Mr. Mostafa Sarker', 'SUP0000022', '400, New Eskaton(1st Floor),dHAKA', 'DHAKA', '', '01777794724', NULL, 'amarbazarltd@gmail.com', 'DEK', '029334445'),
('2017-10-07 05:03:21', 100, 105, 'DHK', '', 'SUP0000046', 'Dhaka', '', '', '', NULL, 'ABL-777-0007@abl.com', 'DHK', ''),
('2017-08-29 11:45:57', 100, 28, 'DJA', 'Mr. Abdur Rouf (In- ', 'SUP0000022', 'Kadamtoli More, sara Community Center (1st Floor), Jinjira', 'DHAKA', '', '01777-794798', NULL, 'amarbazarltd@gmail.com', 'DJA', '027761803'),
('2017-08-29 11:52:59', 100, 37, 'DLG', 'Mr. Shahidul Islam S', 'SUP0000022', '91, Haranath Gosh Road, Lalbag, Dhaka', 'DHAKA', '', '01777-794828', NULL, 'amarbazarltd@gmail.com', 'DLG', ''),
('2017-08-29 12:07:02', 100, 67, 'DMB', 'Mr. Faruq (Asst. Bra', 'SUP0000022', 'Ga-132, Middle Badda, ProgotiSharani, Dhaka.', 'CHITTAGONG', '', '01777-794863', NULL, 'amarbazarltd@gmail.com', 'DMB', '02-9857803'),
('2017-08-28 10:21:55', 100, 10, 'DMJ', 'Mr. Mizanur Rahman', 'SUP0000022', '71. Motijheel, C/A, Dhaka-1000', 'DHAKA', '', '01777794736', NULL, 'amarbazarltd@gmail.com', 'DMJ', '02-9554170'),
('2017-08-29 11:57:18', 100, 46, 'DNP', 'MR. BHOBODISH RAY ', 'SUP0000022', 'SOUTH MUNSHI PARA, DINAJPUR.', '', '', '01777794679', NULL, 'ABL-777-0007@abl.com', 'DNP', '053166228'),
('2017-08-29 11:09:25', 100, 11, 'DPB', 'MD MASUD MAHMUD', 'SUP0000022', 'HOUSE NO 14, ROAD NO;3 SECTOR 7  PALLABI DHAKA', 'DHAKA', '', '01777794712', NULL, 'ABL-777-0007@abl.com', 'DPB', '029026222'),
('2017-08-29 11:34:31', 100, 15, 'DRN', 'Mr. Md. Sabbir Mahmu', 'SUP0000022', 'Plot No: 02, Road No - 27/ka, Rupnagar R/A, Mirpur, Dhaka', 'DHAKA', '', '01777-794926', NULL, 'amarbazarltd@gmail.com', 'DRN', ''),
('2017-08-29 11:57:01', 100, 45, 'DRP', 'Mr. Juneyet Ahmed', 'SUP0000022', '64,Hajipara DIT Road, Rampura, Dhaka.', 'DHAKA', '', '01777794976', NULL, 'amarbazarltd@gmail.com', 'DRP', ''),
('2017-08-30 04:44:18', 100, 99, 'DRR', 'Mr. NomanChowdhery', 'SUP0000022', 'House-28/29, AdarshaChayaNir, Ring Road, Adabor Dhaka', 'DHAKA', '', '01777-794911', NULL, 'amarbazarltd@gmail.com', 'DRR', '029127857'),
('2017-08-29 12:08:25', 100, 71, 'DRS', 'Mr.Tanjim Hasan', 'SUP0000022', '1285,East Monipur,Begum Rokeya Shoroni,Mirpur,Dhaka.', 'DHAKA', '', '01709666305', NULL, 'amarbazarltd@gmail.com', 'DRS', ''),
('2017-08-28 10:17:27', 100, 8, 'DSP', 'Mr. Md. Abdul Mannan', 'SUP0000022', '683 RokeyaSarani,WestShewrapara(BusStand),Dhaka', 'DHAKA', '', '01777794718', NULL, 'amarbazarltd@gmail.com', 'DSP', '02-8090470'),
('2017-08-29 11:58:32', 100, 48, 'DTR', 'Mr. Zakir Hossain', 'SUP0000022', '36, Tipu Sultan Road, Wari, Dhaka', 'DHAKA', '', '01777794741', NULL, 'amarbazarltd@gmail.com', 'DTR', ''),
('2017-08-29 11:38:22', 100, 19, 'DUN', 'Mr. H. M. Sumon', 'SUP0000022', 'Plot#08, Garib- E-Newaz, Sector#11, Uttara, Dhaka ', 'DHAKA', '', '01777794778', NULL, 'amarbazarltd@gmail.com', 'DUN', ''),
('2017-08-30 04:43:30', 100, 98, 'DZT', 'Mr. Khalipha Mehedi ', 'SUP0000022', 'SiddiqueMenson (1st Floor), 15/G Zigatola, Dhaka ', 'DHAKA', '', '01777-794906', NULL, 'amarbazarltd@gmail.com', 'DZT', '02-9672474'),
('2017-08-29 11:51:04', 100, 34, 'FAP', 'Mr. Shariful Islam (', 'SUP0000022', '4 No. Alipur Moar, Faridpur', 'DHAKA', '', '01777794956', NULL, 'amarbazarltd@gmail.com', 'FAP', ''),
('2017-08-29 11:56:19', 100, 44, 'FNY', 'Mr. Omar Faruqe', 'SUP0000022', 'S.S.K Road, Sadar, Feny. ', 'CHITTAGONG', '', '01777794971', NULL, 'amarbazarltd@gmail.com', 'FNY', ''),
('2017-08-29 12:29:08', 100, 92, 'FPR', 'MR. ROBIUL ISLAM', 'SUP0000022', 'R P TOWER, HAJARTOLA MUJIB ROAD, GOALCHAMOT, FARIDPUR.', '', '', '01777794628', NULL, 'ABL-777-0007@abl.com', 'FPR', '063165278'),
('2017-08-29 12:33:09', 100, 93, 'GDG', 'MR. ANWAR HOSSAIN', 'SUP0000022', 'JOBAIDA PLAZA, CHOTURANGO MORE, GOBINDAGANJ , GAIBANDHA.', '', '', '01777794662', NULL, 'ABL-777-0007@abl.com', 'GDG', '0542375439'),
('2017-08-29 11:57:44', 100, 47, 'GOP', 'Mr. Humayan Kabir', 'SUP0000022', 'Solaiman Mention (Ist Floor),  108 D.C. Road, Gopalgonj', 'DHAKA', '', '01777794986', NULL, 'amarbazarltd@gmail.com', 'GOP', ''),
('2017-08-29 12:01:13', 100, 52, 'HGJ', 'MR. SHIBA NANDA', 'SUP0000022', 'PATWARY BHABAN, 1ST FLOOR, EAST BAZAR, HAJIGANJ, CHANDPUR.', '', '', '01777794747', NULL, 'ABL-777-0007@abl.com', 'HGJ', ''),
('2017-09-11 11:42:56', 100, 102, 'HO', 'Nexus Trade Home', 'SUP0000001', 'Dhaka', '', '', '', NULL, 'amarbazarltd@gmail.com', 'HO', ''),
('2017-09-11 11:41:03', 100, 101, 'HO', 'Head Office', 'SUP0000007', 'Dhaka', '', '', '', NULL, 'amarbazarltd@gmail.com', 'HO', ''),
('2017-09-11 11:44:18', 100, 103, 'HO', 'Fashion Mart', 'SUP0000031', 'Dhaka', '', '', '', NULL, 'amarbazarltd@gmail.com', 'HO', ''),
('2017-10-09 11:45:07', 100, 106, 'HO-DHA', '', 'SUP0000040', 'A157/1 Shanar par', '', '', '', NULL, 'ABL-777-0007@abl.com', 'HO-DHA', ''),
('2017-08-29 12:11:11', 100, 76, 'ISD', 'MR. SHAFIQUR RAHMAN', 'SUP0000022', 'THANA PARA, ISWARDI PABNA', '', '', '01777794634', NULL, 'ABL-777-0007@abl.com', 'ISD', '0732664256'),
('2017-08-29 12:07:50', 100, 70, 'JCR', 'Mr.Kamruzzaman', 'SUP0000022', '48/B-Chondona Plaza, Chondona  Chourasta,Gazipur .', 'DHAKA', '', '01709666300', NULL, 'amarbazarltd@gmail.com', 'JCR', ''),
('2017-08-29 12:02:02', 100, 55, 'JDP', 'Mr. Omar Faroq', 'SUP0000022', 'Joydebpur Bus Stand, Joydebpur, Gazipur. ', 'DHAKA', '', '01709666255', NULL, 'amarbazarltd@gmail.com', 'JDP', ''),
('2017-08-29 11:48:20', 100, 30, 'JHT', 'Mr. Zakir Hossain Ka', 'SUP0000022', 'Amtoi, Sadar Road, Joypurhat', 'RANGPUR', '', '01777-794818 ', NULL, 'amarbazarltd@gmail.com', 'JHT', '0571-51347'),
('2017-08-29 11:49:12', 100, 31, 'JLK', 'Mr. ABM Shafiqul Isl', 'SUP0000022', 'Post office, sadar Road, jhalokathi', 'RANGPUR', '', '01777-794823', NULL, 'amarbazarltd@gmail.com', 'JLK', ''),
('2017-08-29 12:13:37', 100, 80, 'JND', 'Mr. Nazrul Islam', 'SUP0000022', '138, HSS Road, Jhinaidaha', 'KHULNA', '', '01777-794858', NULL, 'amarbazarltd@gmail.com', 'JND', '0451-62928'),
('2017-08-29 12:14:55', 100, 84, 'JPB', '', 'SUP0000022', '1799,Shahid Moshiur Rahman Road,Palbari,Jessore.', '', '', '01709-666330', NULL, 'amarbazarltd@gmail.com', 'JPB', ''),
('2017-08-29 12:24:23', 100, 90, 'JSK', 'MR. NAJIM SHIKDER', 'SUP0000022', '17 RAIL ROAD, ( NEAR OF KOTOALI POLICE STATION. JESSORE.', '', '', '01777794622', NULL, 'ABL-777-0007@abl.com', 'JSK', '042171587'),
('2017-08-29 11:44:48', 100, 26, 'JSR', 'Mr. Humayun Kobir', 'SUP0000022', '27, R N Road, Sadar Jessore', 'KHULNA', '', '01777-794803', NULL, 'amarbazarltd@gmail.com', 'JSR', '0421-71720'),
('2017-08-29 12:14:27', 100, 83, 'JTR', '', 'SUP0000022', '', '', '', '01709-666315', NULL, 'amarbazarltd@gmail.com', 'JTR', ''),
('2017-08-29 12:06:39', 100, 66, 'KDB', 'Mr. Moynul Haque Mam', 'SUP0000022', '113 Lower jessore road,Duk Bangla,Opposite of Janata Bank,Khulna', 'KHULNA', '', '01709666290', NULL, 'amarbazarltd@gmail.com', 'KDB', ''),
('2017-08-30 04:41:41', 100, 96, 'KDR', 'Mr. KaziMizanur Rahm', 'SUP0000022', '823/3,Uppur Jessore Road, Doulatpur, Khulna.', 'KHULNA', '', '01777-794896', NULL, 'amarbazarltd@gmail.com', 'KDR', '041-760146'),
('2017-08-29 11:55:37', 100, 43, 'KLN', 'MR. GOKUL ROY', 'SUP0000022', '10,K.D.A AVENUE KHULNA', '', '', '01777794611', NULL, 'ABL-777-0007@abl.com', 'KLN', '041720864'),
('2017-08-29 12:04:13', 100, 60, 'KTA', 'Md. Akteruzzaman Has', 'SUP0000022', '64,NS road,infront of rodkhola mor,kustia.', 'KHULNA', '', '01709666275', NULL, 'amarbazarltd@gmail.com', 'KTA', ''),
('2017-08-29 12:02:48', 100, 57, 'KUS', 'Mr. Shahinul Islam S', 'SUP0000022', 'Tomij Uddin Market (1st Floor), ShaplaChattar More Kustia', 'KHULNA', '', '01777-794833', NULL, 'amarbazarltd@gmail.com', 'KUS', '07161586'),
('2017-08-29 12:14:10', 100, 82, 'LXR', 'MR PRODIP KUMAR SAHA', 'SUP0000022', 'BAGBARI MAIN ROAD, LAXMI PUR.', '', '', '01777794757', NULL, 'ABL-777-0007@abl.com', 'LXR', ''),
('2017-08-29 12:12:33', 100, 78, 'MCR', 'MR. OMAR FAURQ', 'SUP0000022', 'MAWNA BAZAR, MAWNA CHOWRASTA, SREEPUR GAZIPUR.', '', '', '01777794757', NULL, 'ABL-777-0007@abl.com', 'MCR', ''),
('2017-08-29 12:01:19', 100, 53, 'MGR', 'Mr. Aynul Hossain', 'SUP0000022', 'Day Market, Sayed Ator Ali Road, Sadar, Magura', 'DHAKA', '', '01777-794838', NULL, 'amarbazarltd@gmail.com', 'MGR', '05322-56616'),
('2017-08-29 11:49:34', 100, 32, 'MHP', 'MD. MOMINUL HAQUE', 'SUP0000022', 'MOHID PLAZA, HOTEL BAZAR, COURT ROAD, MEHERPUR.', '', '', '01777794606', NULL, 'ABL-777-0007@abl.com', 'MHP', '079162757'),
('2017-08-29 11:49:48', 100, 33, 'MRD', ' Mr. Md. Rafiqul Ala', 'SUP0000022', 'G. Paul Center, 38 Ram Babu Road, Sadar, Mymensingh.', 'DHAKA', '', '01777794951', NULL, 'amarbazarltd@gmail.com', 'MRD', ''),
('2017-08-29 11:54:04', 100, 40, 'MYS', 'MR. IFTEKHAR UDDIN', 'SUP0000022', '27, C. K GHOSH ROAD, (OPPOSITE OF CHAYABANI CINEMA HALL), MYMENSING', '', '', '01777794706', NULL, 'ABL-777-0007@abl.com', 'MYS', '09161555'),
('2017-08-29 12:19:49', 100, 88, 'NKA', 'MR. SAYEEDUL HAQUE ', 'SUP0000022', 'MASJID QUARTER, OLD COURT ROAD, NETROKONA.', '', '', '01777794701', NULL, 'ABL-777-0007@abl.com', 'NKA', '095162300'),
('2017-08-29 11:40:38', 100, 22, 'NOG', 'Mohammmod Sayem Hoss', 'SUP0000022', 'Joly Plaza, Puraton Bus Stand, Main Road,Sadar,Naogaon.', 'RAJSHAHI', '', '01777794936', NULL, 'amarbazarltd@gmail.com', 'NOG', ''),
('2017-08-29 12:09:21', 100, 73, 'NOP', 'MR. SANJOY KUMAR SAH', 'SUP0000022', 'L B TOWER, NOAPARA, ABHAYNAGAR, JESSORE.', '', '', '01777794634', NULL, 'ABL-777-0007@abl.com', 'NOP', '0732664256'),
('2017-08-29 11:38:49', 100, 20, 'NRL', 'Mr. Sazzadur Rahman', 'SUP0000022', 'Jomaddar Tower, Rupgonj, Sadar,  Narail', 'DHAKA', '', '01777794931', NULL, 'amarbazarltd@gmail.com', 'NRL', ''),
('2017-08-29 11:32:14', 100, 14, 'NSD', 'Mr. EnayetUllah Titu', 'SUP0000022', '16/1 West Kandapara,Sadar Road, Narasingdi', 'DHAKA', '', '01777-794921', NULL, 'amarbazarltd@gmail.com', 'NSD', ''),
('2017-08-29 12:03:11', 100, 59, 'NTR', 'MR. K MIZANUR ISLAM ', 'SUP0000022', 'KUSHUM PLAZA, (GF N 1ST FLOOR), KANAIKHALI NATORE.', '', '', '01777794639', NULL, 'ABL-777-0007@abl.com', 'NTR', '077162695'),
('2017-08-29 12:07:14', 100, 69, 'NVN', 'Mr.Emamul  Hossain', 'SUP0000022', 'Jelkhana mor, Khadija Mansion, Velanogor,Norshingdi.', 'DHAKA', '', '01777794922', NULL, 'amarbazarltd@gmail.com', 'NVN', ''),
('2017-08-29 11:55:02', 100, 41, 'PBN', 'Mr. Saiful  Islam Sa', 'SUP0000022', 'Abdul Hamid Road (In Front of Bina-Bani Cinema Hall), Sadar, Pabna .', 'RAJSHAHI', '', '01777794981', NULL, 'amarbazarltd@gmail.com', 'PBN', ''),
('2017-08-29 12:15:17', 100, 85, 'PCR', 'Mr. Faruk Ahamed', 'SUP0000022', 'Islambag, Tetulia Road, Panchagar', 'RANGPUR', '', '01777-794883', NULL, 'amarbazarltd@gmail.com', 'PCR', '0568-62284'),
('2017-09-13 08:15:44', 100, 104, 'PTI-HO', 'Head Office', 'SUP0000038', '35/c Naya Poltan Dhaka', 'DHAKA', '', '', NULL, 'ABL-777-0007@abl.com', 'PTI-HO', ''),
('2017-08-29 11:42:26', 100, 23, 'PTL', 'Md. Zakir Hossain', 'SUP0000022', 'AsrabNurBhaban, SadarRoad,Nuton Bazar, Sadar, Patuakhali.', 'BARISAL', '', '01777794946', NULL, 'amarbazarltd@gmail.com', 'PTL', ''),
('2017-08-29 11:51:45', 100, 35, 'RDP', 'MR. TANIK AHSAN ', 'SUP0000022', 'JAIL ROAD, DHAP, RANGPUR', '', '', '01777794669', NULL, 'ABL-777-0007@abl.com', 'RDP', '052156025'),
('2017-08-29 12:02:37', 100, 56, 'RPR', 'Mr. Hossain Ahmed Ba', 'SUP0000022', 'Jahaj Company Mour,  Sadar, Rangpur.', 'RANGPUR', '', '01709666270', NULL, 'amarbazarltd@gmail.com', 'RPR', ''),
('2017-08-29 12:10:52', 100, 75, 'RSB', 'Mr. Akhtarul Islam L', 'SUP0000022', 'Saheb bazaar, Boalia, Rajshahi', 'RAJSHAHI', '', '01777-794853', NULL, 'amarbazarltd@gmail.com', 'RSB', '0721-771754'),
('2017-08-29 12:18:07', 100, 87, 'SDP', 'MR HABIBUR RAHMAN', 'SUP0000022', 'TULSHIRAM ROAD, MARWARY PATTY, SAIDPUR , NILPHAMARI.', '', '', '01777794674', NULL, 'ABL-777-0007@abl.com', 'SDP', '0552673218'),
('2017-08-29 11:35:27', 100, 17, 'SGJ', 'Md. Ashraful  Islam ', 'SUP0000022', 'S. S. Road, SirajgonjSadar, Sirajgonj', 'RAJSHAHI', '', '01777-794644', NULL, 'amarbazarltd@gmail.com', 'SGJ', ''),
('2017-08-29 12:04:56', 100, 62, 'SHP', 'Mr. Debasis', 'SUP0000022', 'Madani super market,Hemayetpur,Savar, Dhaka', 'DHAKA', '', '01777794696', NULL, 'amarbazarltd@gmail.com', 'SHP', ''),
('2017-08-29 12:08:41', 100, 72, 'SKR', 'Mr. Mafizur Rahman', 'SUP0000022', '374, Kajolsharani, Palaspol, Satkhira', 'KHULNA', '', '01777-794878', NULL, 'amarbazarltd@gmail.com', 'SKR', ''),
('2017-08-29 11:52:36', 100, 36, 'SSR', 'Mr. Towfique E Elahi', 'SUP0000022', '452, Station Road, Sadar, Sirajgonj.', 'RAJSHAHI', '', '01777794961', NULL, 'amarbazarltd@gmail.com', 'SSR', ''),
('2017-08-29 11:24:47', 100, 12, 'SVR', 'MR. FARUK HOSSAIN', 'SUP0000022', 'A-120,UTTAR PARA, BAZAR ROAD, SAVAR, DHAKA.', 'DHAKA', '', '01777794690', NULL, 'ABL-777-0007@abl.com', 'SVR', '027741627'),
('2017-08-29 12:07:13', 100, 68, 'SYT', 'MR. M A RAHIM LASKAR', 'SUP0000022', 'DAULATPUR SQUARE, NILOY 16, CHOWHATA, SYLHET.', '', '', '01777794769', NULL, 'ABL-777-0007@abl.com', 'SYT', ''),
('2017-08-29 12:12:17', 100, 77, 'TKN', 'Mr. Ranju Aktar', 'SUP0000022', 'College Road, Art Galary, Thakurgaon', 'RANGPUR', '', '01777-794873', NULL, 'amarbazarltd@gmail.com', 'TKN', '056153730'),
('2017-08-29 11:59:24', 100, 50, 'TNG', 'Mr. Omar Faruq', 'SUP0000022', '175, Kazi Market, Shahid Ahsan Ullah Master Stadium er Biporite, Tongi.', 'DHAKA', '', '01709666250  ', NULL, 'amarbazarltd@gmail.com', 'TNG', ''),
('2017-08-29 12:05:20', 100, 63, 'TNL', 'MR SHEKHAR SHARKAR', 'SUP0000022', 'HABIBUR RAHMAN PLAZA, 1ST FLOOR OLD BUS STAND TANGAIL.', '', '', '01777794684', NULL, 'ABL-777-0007@abl.com', 'TNL', '092161370'),
('2017-08-29 12:01:31', 100, 54, 'TVR', 'Mr. Ripon Kumar Sark', 'SUP0000022', 'F.R. Khan Prince Plaza (Ist Floor), Victoria Road, Sadar, Tangail.', 'DHAKA', '', '01709666260', NULL, 'amarbazarltd@gmail.com', 'TVR', '');

-- --------------------------------------------------------

--
-- Table structure for table `setax`
--

CREATE TABLE `setax` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `xtaxcode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xtaxcodealt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxpct` double NOT NULL,
  `bizid` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setax`
--

INSERT INTO `setax` (`xsl`, `xtaxcode`, `xtaxcodealt`, `xtaxpct`, `bizid`, `ztime`, `zutime`, `xemail`, `zemail`, `xrecflag`) VALUES
(3, 'TAX', '', 10, 100, '2018-03-16 09:47:58', NULL, NULL, 'rajib@dotbdsolutions.com', 'Live'),
(2, 'VAT', 'VATA', 4.5, 100, '2018-03-16 09:17:37', '2018-03-16 11:17:37', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `seuserlic`
--

CREATE TABLE `seuserlic` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `bizid` int(11) NOT NULL,
  `xlicnum` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xterminal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xterminaluser` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xemino` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` int(1) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seuserlic`
--

INSERT INTO `seuserlic` (`xsl`, `bizid`, `xlicnum`, `xterminal`, `xterminaluser`, `xemino`, `zactive`, `ztime`) VALUES
(1, 100, 'ABC123', 'T001', 'user1', '358856080405700', 1, '2018-03-24 17:26:14'),
(2, 100, 'ABC124', 'T002', 'kamrul', '358856080405700', 0, '2018-05-12 10:14:22'),
(3, 100, 'ABC125', 'T003', 'naem', '358856080405700', 1, '2018-05-12 10:14:22'),
(4, 100, 'ABC126', 'T004', 'Tajimul', '358856080405700', 0, '2018-06-03 09:45:51'),
(5, 100, 'ABC127', 'T005', 'Demo', '860153033737020', 1, '2018-06-03 09:45:51'),
(6, 100, 'ABC128', 'T006', 'Demo1', '358856080405700', 1, '2018-06-03 09:46:32'),
(7, 100, 'ABC129', 'T008', 'Rajib', '358856080405700', 0, '2018-06-03 09:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `sodet`
--

CREATE TABLE `sodet` (
  `sodetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xsonum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xquotnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrowquot` int(5) NOT NULL DEFAULT '0',
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL,
  `xcost` double NOT NULL,
  `xrate` double NOT NULL,
  `xtaxrate` double NOT NULL,
  `xunitsale` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xexch` double NOT NULL,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xdisc` double NOT NULL,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sodet`
--

INSERT INTO `sodet` (`sodetsl`, `ztime`, `zemail`, `bizid`, `xdate`, `xsonum`, `xquotnum`, `xrowquot`, `xcus`, `xrow`, `xitemcode`, `xitembatch`, `xwh`, `xbranch`, `xproj`, `xqty`, `xcost`, `xrate`, `xtaxrate`, `xunitsale`, `xtypestk`, `xexch`, `xcur`, `xdisc`, `xtaxcode`, `xtaxscope`, `xyear`, `xper`) VALUES
(40, '2018-04-05 11:45:50', 'admin@demo.com', 100, '2018-04-05', '353463', NULL, 0, 'CUS0000003', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 70, 9542.453820506242, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 1420, 'BDT', 'None', 2017, 10),
(1, '2018-03-25 05:37:21', 'rajib@dotbdsolutions.com', 100, '2018-03-25', 'SORD-000001', NULL, 0, 'DIN0000001', 1, 'WI-5069S', 'WI-5069S', 'Naya Palton', 'Head Office', 'Head Office', 29, 1265.1010701551727, 52500, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 9),
(7, '2018-03-31 09:51:35', 'admin@demo.com', 100, '2018-02-14', 'SORD-000002', NULL, 0, '100000002', 1, 'ULB-SS-HFS-375', 'ULB-SS-HFS-375', 'Naya Palton', 'Head Office', 'Head Office', 50, 0, 265, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 8),
(8, '2018-03-31 09:52:22', 'admin@demo.com', 100, '2018-01-03', 'SORD-000003', NULL, 0, '100000002', 1, 'ULB-SS-HFS-375', 'ULB-SS-HFS-375', 'Naya Palton', 'Head Office', 'Head Office', 20, 0, 265, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 7),
(9, '2018-03-31 10:03:12', 'admin@demo.com', 100, '2018-03-31', 'SORD-000004', NULL, 0, 'DIN0000001', 1, 'WI-80DK', 'WI-80DK', 'Mohanagar Project', 'Head Office', 'Head Office', 10, 14420, 0, 0, '', '', 1, 'BDT', 0, 'BDT', 'None', 2017, 9),
(10, '2018-03-31 10:04:23', 'admin@demo.com', 100, '2018-03-31', 'SORD-000005', NULL, 0, '100000002', 1, 'WI-80DK', 'WI-80DK', 'Mohanagar Project', 'Head Office', 'Head Office', 10, 14420, 0, 0, '', '', 1, 'BDT', 0, 'BDT', 'None', 2017, 9),
(11, '2018-03-31 10:07:43', 'admin@demo.com', 100, '2018-01-02', 'SORD-000006', NULL, 0, 'DIN0000001', 1, 'WI-80DK', 'WI-80DK', 'Mohanagar Project', 'Head Office', 'Head Office', 20, 14420, 0, 0, '', '', 1, 'BDT', 0, 'BDT', 'None', 2017, 7),
(19, '2018-04-01 09:51:44', 'rajib@dotbdsolutions.com', 100, '2018-03-31', 'SORD-000007', NULL, 0, 'DIN0000001', 1, 'WI-3269A', 'WI-3269A', 'Naya Palton', 'Head Office', 'Head Office', 2, 0, 22400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 9),
(20, '2018-04-01 10:07:09', 'rajib@dotbdsolutions.com', 100, '2018-03-31', 'SORD-000008', NULL, 0, 'CUS0000001', 1, 'WI-3269A', 'WI-3269A', 'Naya Palton', 'Head Office', 'Head Office', 2, 0, 22400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 9),
(21, '2018-04-01 10:38:46', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SORD-000009', NULL, 0, 'CUS0000001', 1, 'WI-3269S', 'WI-3269S', 'Naya Palton', 'Head Office', 'Head Office', 2, 0, 24500, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(24, '2018-04-02 09:21:29', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SORD-000010', NULL, 0, 'CUS0000001', 1, 'WI-3269A', 'WI-3269A', 'Naya Palton', 'Head Office', 'Head Office', 1, 0, 22400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(25, '2018-04-02 09:23:19', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD-000011', NULL, 0, '100000002', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 9569.520661160606, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(26, '2018-04-02 09:24:33', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD-000012', NULL, 0, 'DIN0000001', 1, 'WI-60DK', 'WI-60DK', 'Naya Palton', 'Head Office', 'Head Office', 2, 0, 22500, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(27, '2018-04-02 09:27:25', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD-000013', NULL, 0, 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 9569.520661160606, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(28, '2018-04-02 09:29:02', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD-000014', NULL, 0, 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 9569.520661160606, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(29, '2018-04-02 09:30:01', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD-000015', NULL, 0, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 9569.520661160606, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(30, '2018-04-02 09:31:39', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD-000016', NULL, 0, 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 9569.520661160606, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(31, '2018-04-02 09:32:25', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD-000017', NULL, 0, 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 9569.520661160606, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(34, '2018-04-03 04:06:12', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'SORD-000018', NULL, 0, '100000002', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 9569.520661160606, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(35, '2018-04-03 04:08:56', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'SORD-000019', NULL, 0, '100000002', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 9569.520661160606, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(36, '2018-04-03 04:10:05', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'SORD-000020', NULL, 0, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 9569.520661160606, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(37, '2018-04-03 04:12:32', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'SORD-000021', NULL, 0, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 9569.520661160606, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2017, 10),
(45, '2018-08-26 11:44:02', 'admin@demo.com', 100, '2018-08-26', 'SORD-000022', NULL, 0, 'CUS0000009', 1, 'ULB-WLB-130', 'ULB-WLB-130', 'Naya Palton', 'Head Office', 'Head Office', 0, 17.5, 1557.5, 0, 'PCS', 'Stocking', 1, 'BDT', 50, 'BDT', 'None', 2018, 2),
(46, '2018-08-26 11:48:06', 'admin@demo.com', 100, '2018-08-26', 'SORD-000023', NULL, 0, 'CUS0000009', 1, 'ULB-WLB-130', 'ULB-WLB-130', 'Naya Palton', 'Head Office', 'Head Office', 50, 17.5, 175.5, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2018, 2),
(47, '2018-08-29 10:34:38', 'rajib@dotbdsolutions.com', 100, '2018-08-29', 'SORD-000024', NULL, 0, 'CUS0000005', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 50, 30936.73324684933, 284000, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'BDT', 'None', 2018, 2),
(48, '2018-09-19 11:46:39', 'admin@demo.com', 100, '2018-09-19', 'SORD-000025', NULL, 0, 'CUS0000009', 1, 'WI-5069S', 'WI-5069S', 'Mohanagar Project', 'Head Office', 'Head Office', 2, 68746.0260341697, 52500, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'SGD', 'None', 2018, 3),
(49, '2018-09-22 06:06:51', 'rajib@dotbdsolutions.com', 100, '2018-09-22', 'SORD-000026', NULL, 0, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 30936.73324684933, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(50, '2018-09-22 06:11:41', 'rajib@dotbdsolutions.com', 100, '2018-09-22', 'SORD-000027', NULL, 0, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Naya Palton', 'Head Office', 'Head Office', 1, 30936.73324684933, 28400, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(51, '2018-09-22 06:57:53', 'rajib@dotbdsolutions.com', 100, '2018-09-22', 'SORD-000028', NULL, 0, 'DIN0000001', 1, '7000-1', '7000-1', 'Naya Palton', 'Head Office', 'Head Office', 38, 28.94736842105263, 26, 0, 'PCS', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(2, '2018-03-25 13:30:22', 'rajib@dotbdsolutions.com', 100, '2018-03-25', 'SORD639-000001', 'QUOT639-000001', 1, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 12, 0, 28400, 0, 'None', '', 1, 'BDT', 0, 'None', 'None', 2017, 9),
(3, '2018-03-25 13:30:22', 'rajib@dotbdsolutions.com', 100, '2018-03-25', 'SORD639-000001', 'QUOT639-000001', 2, 'DIN0000001', 2, 'WI-1914', 'WI-1914', 'Head Office', 'Head Office', 'Head Office', 13, 0, 8750, 0, 'None', '', 1, 'BDT', 0, 'None', 'None', 2017, 9),
(4, '2018-03-29 12:22:17', 'rajib@dotbdsolutions.com', 100, '2018-03-29', 'SORD639-000002', 'QUOT000001-1', 1, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 3, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 9),
(5, '2018-03-29 12:22:17', 'rajib@dotbdsolutions.com', 100, '2018-03-29', 'SORD639-000002', 'QUOT000001-1', 2, 'DIN0000001', 2, 'WI-60DK', 'WI-60DK', 'Head Office', 'Head Office', 'Head Office', 5, 0, 22500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 9),
(6, '2018-03-30 03:32:34', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'SORD639-000003', 'QUOT000003-3', 1, 'DIN0000001', 1, 'ULB-VL-500ml', 'ULB-VL-500ml', 'Head Office', 'Head Office', 'Head Office', 50, 0, 78, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 9),
(12, '2018-04-01 08:47:48', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SORD639-000004', 'QUOT000004-1', 1, 'CUS0000001', 1, 'WI-3269A', 'WI-3269A', 'Head Office', 'Head Office', 'Head Office', 3, 0, 22400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(13, '2018-04-01 08:47:48', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SORD639-000004', 'QUOT000004-1', 2, 'CUS0000001', 2, 'WI-16NZ', 'WI-16NZ', 'Head Office', 'Head Office', 'Head Office', 6, 0, 37900, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(14, '2018-04-01 09:27:34', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SORD639-000005', 'QUOT000005', 1, 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 12, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(15, '2018-04-01 09:29:09', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SORD639-000006', 'QUOT000006', 1, 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 12, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(16, '2018-04-01 09:36:58', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SORD639-000007', 'QUOT000007', 1, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 10, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(17, '2018-04-01 09:39:27', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SORD639-000008', 'QUOT000008', 1, 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 1, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(18, '2018-04-01 09:40:13', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'SORD639-000009', 'QUOT000009', 1, 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 1, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(22, '2018-04-02 06:05:46', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD639-000010', 'QUOT000010-1', 1, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 5, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(23, '2018-04-02 06:05:46', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD639-000010', 'QUOT000010-1', 2, 'DIN0000001', 2, 'WI-60DK', 'WI-60DK', 'Head Office', 'Head Office', 'Head Office', 5, 0, 22500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(32, '2018-04-02 10:05:54', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD639-000011', 'QUOT000011-2', 1, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 2, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(33, '2018-04-02 10:05:54', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'SORD639-000011', 'QUOT000011-2', 2, 'DIN0000001', 2, 'WI-5069S', 'WI-5069S', 'Head Office', 'Head Office', 'Head Office', 3, 0, 52500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(38, '2018-04-03 12:27:48', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'SORD639-000012', 'QUOT000012', 1, 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 2, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(39, '2018-04-04 05:29:59', 'rajib@dotbdsolutions.com', 100, '2018-04-04', 'SORD639-000013', 'QUOT000014-1', 1, 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 3, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 10),
(42, '2018-05-16 07:44:43', 'rajib@dotbdsolutions.com', 100, '2018-05-16', 'SORD639-000014', 'QUOT000016-1', 1, 'CUS0000006', 1, 'WI-60DK', 'WI-60DK', 'Head Office', 'Head Office', 'Head Office', 2, 0, 22500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 11),
(43, '2018-05-16 07:44:43', 'rajib@dotbdsolutions.com', 100, '2018-05-16', 'SORD639-000014', 'QUOT000016-1', 2, 'CUS0000006', 2, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 2, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 11),
(44, '2018-05-16 10:35:17', 'rajib@dotbdsolutions.com', 100, '2018-05-16', 'SORD639-000015', 'QUOT000017-1', 1, 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 4, 0, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2017, 11),
(41, '2018-04-05 12:01:26', 'admin@demo.com', 100, '2018-04-05', 'SORD640-000001', 'QN-8475932', 1, 'CUS0000002', 1, 'WI-2212', 'WI-2212', 'Head Office', 'Head Office', 'Head Office', 10, 0, 11800, 0, 'None', 'Stocking', 1, 'BDT', 590, 'None', 'None', 2017, 10);

-- --------------------------------------------------------

--
-- Table structure for table `somst`
--

CREATE TABLE `somst` (
  `sosl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xsonum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xquotnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xcus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xgrossdisc` double NOT NULL DEFAULT '0',
  `xnotes` text COLLATE utf8_unicode_ci,
  `xcusbal` double NOT NULL DEFAULT '0',
  `xrcvamt` double NOT NULL DEFAULT '0',
  `xcusdoc` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsalesaccdr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsalesacccr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ximaccdr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ximacccr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xvataccdr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xvatacccr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdiscaccdr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdiscacccr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `somst`
--

INSERT INTO `somst` (`sosl`, `ztime`, `zutime`, `zemail`, `xemail`, `bizid`, `xsonum`, `xquotnum`, `xdate`, `xcus`, `xgrossdisc`, `xnotes`, `xcusbal`, `xrcvamt`, `xcusdoc`, `xmanager`, `xbranch`, `xwh`, `xproj`, `xstatus`, `xrecflag`, `xyear`, `xper`, `xvoucher`, `xsalesaccdr`, `xsalesacccr`, `ximaccdr`, `ximacccr`, `xvataccdr`, `xvatacccr`, `xdiscaccdr`, `xdiscacccr`) VALUES
(35, '2018-04-05 11:45:50', NULL, 'admin@demo.com', NULL, 100, '353463', '35', '2018-04-05', 'CUS0000003', 200, 'sdgdf fgn', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, '2018-03-25 05:37:21', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000001', '', '2018-03-25', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 9, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2018-03-31 09:51:35', NULL, 'admin@demo.com', NULL, 100, 'SORD-000002', '', '2018-02-14', '100000002', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 8, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2018-03-31 09:52:22', NULL, 'admin@demo.com', NULL, 100, 'SORD-000003', '', '2018-01-03', '100000002', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 7, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2018-03-31 10:03:12', NULL, 'admin@demo.com', NULL, 100, 'SORD-000004', '', '2018-03-31', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Mohanagar Project', 'Head Office', 'Confirmed', 'Live', 2017, 9, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2018-03-31 10:04:23', NULL, 'admin@demo.com', NULL, 100, 'SORD-000005', '', '2018-03-31', '100000002', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Mohanagar Project', 'Head Office', 'Confirmed', 'Live', 2017, 9, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2018-03-31 10:07:43', NULL, 'admin@demo.com', NULL, 100, 'SORD-000006', '', '2018-01-02', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Mohanagar Project', 'Head Office', 'Confirmed', 'Live', 2017, 7, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '2018-04-01 09:51:44', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000007', '', '2018-03-31', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 9, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2018-04-01 10:07:09', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000008', '', '2018-03-31', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 9, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2018-04-01 10:38:46', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000009', '', '2018-04-01', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '2018-04-02 09:21:29', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000010', '', '2018-04-01', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '2018-04-02 09:23:19', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000011', '', '2018-04-02', '100000002', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2018-04-02 09:24:33', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000012', '', '2018-04-02', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2018-04-02 09:27:25', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000013', '', '2018-04-02', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2018-04-02 09:29:02', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000014', '', '2018-04-02', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2018-04-02 09:30:01', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000015', '', '2018-04-02', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2018-04-02 09:31:39', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000016', '', '2018-04-02', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2018-04-02 09:32:25', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000017', '', '2018-04-02', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2018-04-03 04:06:12', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000018', '', '2018-04-03', '100000002', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2018-04-03 04:08:56', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000019', '', '2018-04-03', '100000002', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2018-04-03 04:10:05', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000020', '', '2018-04-03', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2018-04-03 04:12:32', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000021', '', '2018-04-03', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2018-08-26 11:44:02', NULL, 'admin@demo.com', NULL, 100, 'SORD-000022', '15151', '2018-08-26', 'CUS0000009', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Canceled', 'Live', 2018, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '2018-08-26 11:48:06', NULL, 'admin@demo.com', NULL, 100, 'SORD-000023', '', '2018-08-26', 'CUS0000009', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2018, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2018-08-29 10:34:38', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000024', '12354', '2018-08-29', 'CUS0000005', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2018, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2018-09-19 11:46:39', NULL, 'admin@demo.com', NULL, 100, 'SORD-000025', '', '2018-09-19', 'CUS0000009', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Mohanagar Project', 'Head Office', 'Created', 'Live', 2018, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2018-09-22 06:06:51', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000026', '', '2018-09-22', 'DIN0000001', 0, '', 1012600, 10000, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Canceled', 'Live', 2018, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2018-09-22 06:11:41', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000027', '', '2018-09-22', 'DIN0000001', 0, '', 1012600, 10000, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2018, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '2018-09-22 06:57:53', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD-000028', '', '2018-09-22', 'DIN0000001', 0, '', 1012600, 1000, NULL, NULL, 'Head Office', 'Naya Palton', 'Head Office', 'Confirmed', 'Live', 2018, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2018-03-25 13:30:22', NULL, '639', NULL, 100, 'SORD639-000001', 'QUOT639-000001', '2018-03-25', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 9, 'SINV639-000001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2018-03-29 12:22:17', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000002', 'QUOT000001-1', '2018-03-29', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 9, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2018-03-30 03:32:34', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000003', 'QUOT000003-3', '2018-03-30', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 9, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2018-04-01 08:47:48', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000004', 'QUOT000004-1', '2018-04-01', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2018-04-01 09:27:34', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000005', 'QUOT000005', '2018-04-01', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2018-04-01 09:29:09', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000006', 'QUOT000006', '2018-04-01', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2018-04-01 09:36:58', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000007', 'QUOT000007', '2018-04-01', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2018-04-01 09:39:27', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000008', 'QUOT000008', '2018-04-01', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2018-04-01 09:40:13', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000009', 'QUOT000009', '2018-04-01', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '2018-04-02 06:05:46', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000010', 'QUOT000010-1', '2018-04-02', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2018-04-02 10:05:54', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000011', 'QUOT000011-2', '2018-04-02', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2018-04-03 12:27:48', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000012', 'QUOT000012', '2018-04-03', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2018-04-04 05:29:59', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000013', 'QUOT000014-1', '2018-04-04', 'CUS0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2018-05-16 07:44:43', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000014', 'QUOT000016-1', '2018-05-16', 'CUS0000006', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 11, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2018-05-16 10:35:17', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'SORD639-000015', 'QUOT000017-1', '2018-05-16', 'DIN0000001', 0, '', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Created', 'Live', 2017, 11, 'SINV639-000003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2018-04-05 12:01:26', NULL, 'admin@demo.com', NULL, 100, 'SORD640-000001', 'QN-8475932', '2018-04-05', 'CUS0000002', 300, 'jdfh iuhrh kjhkh', 0, 0, NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live', 2017, 10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soquot`
--

CREATE TABLE `soquot` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xquotnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xlastquot` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrefquot` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xcus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xgrossdisc` double NOT NULL DEFAULT '0',
  `xnotes` text COLLATE utf8_unicode_ci,
  `xcusdoc` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `soquot`
--

INSERT INTO `soquot` (`xsl`, `ztime`, `zutime`, `zemail`, `xemail`, `bizid`, `xquotnum`, `xlastquot`, `xrefquot`, `xdate`, `xcus`, `xgrossdisc`, `xnotes`, `xcusdoc`, `xmanager`, `xbranch`, `xwh`, `xproj`, `xstatus`, `xrecflag`) VALUES
(46, '2018-04-05 11:59:43', NULL, 'admin@demo.com', NULL, 100, 'QN-8475932', NULL, 'QN-8475932', '2018-04-05', 'CUS0000002', 300, 'jdfh iuhrh kjhkh', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(22, '2018-03-29 12:19:48', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000001', NULL, 'QUOT000001', '2018-03-29', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(23, '2018-03-29 12:21:23', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000001-1', 'QUOT000001', 'QUOT000001', '2018-03-29', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(24, '2018-03-30 03:13:51', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000002', NULL, 'QUOT000002', '2018-03-30', '100000002', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(41, '2018-04-02 10:12:43', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000002-1', 'QUOT000002', 'QUOT000002', '2018-03-30', '100000002', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Approved', 'Live'),
(25, '2018-03-30 03:28:34', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000003', NULL, 'QUOT000003', '2018-03-30', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(26, '2018-03-30 03:28:50', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000003-1', 'QUOT000003', 'QUOT000003', '2018-03-30', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(27, '2018-03-30 03:30:59', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000003-2', 'QUOT000003-1', 'QUOT000003', '2018-03-30', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(28, '2018-03-30 03:31:59', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000003-3', 'QUOT000003-2', 'QUOT000003', '2018-03-30', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(29, '2018-04-01 08:46:26', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000004', NULL, 'QUOT000004', '2018-04-01', 'CUS0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(30, '2018-04-01 08:47:13', '2018-04-01 08:47:31', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 100, 'QUOT000004-1', 'QUOT000004', 'QUOT000004', '2018-04-01', 'CUS0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(31, '2018-04-01 09:27:09', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000005', NULL, 'QUOT000005', '2018-04-01', 'CUS0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(32, '2018-04-01 09:28:56', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000006', NULL, 'QUOT000006', '2018-04-01', 'CUS0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(33, '2018-04-01 09:35:32', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000007', NULL, 'QUOT000007', '2018-04-01', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(34, '2018-04-01 09:39:20', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000008', NULL, 'QUOT000008', '2018-04-01', 'CUS0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(35, '2018-04-01 09:40:06', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000009', NULL, 'QUOT000009', '2018-04-01', 'CUS0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(36, '2018-04-02 06:04:19', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000010', NULL, 'QUOT000010', '2018-04-02', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(37, '2018-04-02 06:04:57', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000010-1', 'QUOT000010', 'QUOT000010', '2018-04-02', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(38, '2018-04-02 10:03:38', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000011', NULL, 'QUOT000011', '2018-04-02', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(39, '2018-04-02 10:04:14', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000011-1', 'QUOT000011', 'QUOT000011', '2018-04-02', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(40, '2018-04-02 10:04:52', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000011-2', 'QUOT000011-1', 'QUOT000011', '2018-04-02', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(42, '2018-04-03 12:27:11', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000012', NULL, 'QUOT000012', '2018-04-03', 'CUS0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(43, '2018-04-04 05:26:53', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000013', NULL, 'QUOT000013', '2018-04-04', 'CUS0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Approved', 'Live'),
(44, '2018-04-04 05:26:55', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000014', NULL, 'QUOT000014', '2018-04-04', 'CUS0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(45, '2018-04-04 05:27:36', '2018-04-04 05:27:54', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 100, 'QUOT000014-1', 'QUOT000014', 'QUOT000014', '2018-04-04', 'CUS0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(47, '2018-05-10 05:18:42', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000015', NULL, 'QUOT000015', '2018-05-10', 'CUS0000003', 3, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(48, '2018-05-16 07:43:53', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000016', NULL, 'QUOT000016', '2018-05-16', 'CUS0000006', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(49, '2018-05-16 07:44:10', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000016-1', 'QUOT000016', 'QUOT000016', '2018-05-16', 'CUS0000006', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(50, '2018-05-16 10:33:25', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000017', NULL, 'QUOT000017', '2018-05-16', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Not Picked', 'Live'),
(51, '2018-05-16 10:33:58', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000017-1', 'QUOT000017', 'QUOT000017', '2018-05-16', 'DIN0000001', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(52, '2018-06-03 05:21:18', NULL, 'rajib@dotbdsolutions.com', NULL, 100, 'QUOT000018', NULL, 'QUOT000018', '2018-06-03', 'CUS0000005', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Confirmed', 'Live'),
(53, '2018-09-19 11:35:43', NULL, 'admin@demo.com', NULL, 100, 'QUOT000019', NULL, 'QUOT000019', '2018-09-19', 'CUS0000009', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Canceled', 'Live'),
(54, '2018-09-19 11:37:35', NULL, 'admin@demo.com', NULL, 100, 'QUOT000020', NULL, 'QUOT000020', '2018-09-19', 'CUS0000008', 0, '', NULL, NULL, 'Head Office', 'Head Office', 'Head Office', 'Approved', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `soquotdet`
--

CREATE TABLE `soquotdet` (
  `quotdetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xquotnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL,
  `xrate` double NOT NULL,
  `xtaxrate` double NOT NULL,
  `xunitsale` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xexch` double NOT NULL,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xdisc` double NOT NULL,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `soquotdet`
--

INSERT INTO `soquotdet` (`quotdetsl`, `ztime`, `zemail`, `bizid`, `xdate`, `xquotnum`, `xcus`, `xrow`, `xitemcode`, `xitembatch`, `xwh`, `xbranch`, `xproj`, `xqty`, `xrate`, `xtaxrate`, `xunitsale`, `xtypestk`, `xexch`, `xcur`, `xdisc`, `xtaxcode`, `xtaxscope`, `xyear`, `xper`) VALUES
(65, '2018-04-05 11:59:43', 'admin@demo.com', 100, '2018-04-05', 'QN-8475932', 'CUS0000002', 1, 'WI-2212', 'WI-2212', 'Head Office', 'Head Office', 'Head Office', 10, 11800, 0, 'None', 'Stocking', 1, 'BDT', 590, 'None', 'None', 2018, 4),
(31, '2018-03-29 12:19:49', 'rajib@dotbdsolutions.com', 100, '2018-03-29', 'QUOT000001', 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 3, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(32, '2018-03-29 12:21:23', 'rajib@dotbdsolutions.com', 100, '2018-03-29', 'QUOT000001-1', 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 3, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(33, '2018-03-29 12:21:45', 'rajib@dotbdsolutions.com', 100, '2018-03-29', 'QUOT000001-1', 'DIN0000001', 2, 'WI-60DK', 'WI-60DK', 'Head Office', 'Head Office', 'Head Office', 5, 22500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(34, '2018-03-30 03:13:52', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'QUOT000002', '100000002', 1, 'WI-5069S', 'WI-5069S', 'Head Office', 'Head Office', 'Head Office', 5, 52500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(35, '2018-03-30 03:14:36', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'QUOT000002', 'CUS0000001', 2, 'WI-24V', 'WI-24V', 'Head Office', 'Head Office', 'Head Office', 7, 30900, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(36, '2018-03-30 03:20:00', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'QUOT000002', 'CUS0000001', 3, 'WI-17NZ', 'WI-17NZ', 'Head Office', 'Head Office', 'Head Office', 10, 39900, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(58, '2018-04-02 10:12:43', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'QUOT000002-1', '100000002', 1, 'WI-5069S', 'WI-5069S', 'Head Office', 'Head Office', 'Head Office', 5, 52500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(59, '2018-04-02 10:12:43', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'QUOT000002-1', 'CUS0000001', 2, 'WI-24V', 'WI-24V', 'Head Office', 'Head Office', 'Head Office', 7, 30900, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(60, '2018-04-02 10:12:43', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'QUOT000002-1', 'CUS0000001', 3, 'WI-17NZ', 'WI-17NZ', 'Head Office', 'Head Office', 'Head Office', 10, 39900, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(37, '2018-03-30 03:28:34', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'QUOT000003', 'DIN0000001', 1, 'ULB-VL-500ml', 'ULB-VL-500ml', 'Head Office', 'Head Office', 'Head Office', 50, 78, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(38, '2018-03-30 03:28:50', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'QUOT000003-1', 'DIN0000001', 1, 'ULB-VL-500ml', 'ULB-VL-500ml', 'Head Office', 'Head Office', 'Head Office', 50, 78, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(39, '2018-03-30 03:30:59', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'QUOT000003-2', 'DIN0000001', 1, 'ULB-VL-500ml', 'ULB-VL-500ml', 'Head Office', 'Head Office', 'Head Office', 50, 78, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(40, '2018-03-30 03:31:59', 'rajib@dotbdsolutions.com', 100, '2018-03-30', 'QUOT000003-3', 'DIN0000001', 1, 'ULB-VL-500ml', 'ULB-VL-500ml', 'Head Office', 'Head Office', 'Head Office', 50, 78, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 3),
(41, '2018-04-01 08:46:26', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'QUOT000004', 'CUS0000001', 1, 'WI-3269A', 'WI-3269A', 'Head Office', 'Head Office', 'Head Office', 3, 22400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(42, '2018-04-01 08:46:51', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'QUOT000004', 'CUS0000001', 2, 'WI-16NZ', 'WI-16NZ', 'Head Office', 'Head Office', 'Head Office', 12, 37900, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(43, '2018-04-01 08:47:13', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'QUOT000004-1', 'CUS0000001', 1, 'WI-3269A', 'WI-3269A', 'Head Office', 'Head Office', 'Head Office', 3, 22400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(44, '2018-04-01 08:47:13', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'QUOT000004-1', 'CUS0000001', 2, 'WI-16NZ', 'WI-16NZ', 'Head Office', 'Head Office', 'Head Office', 6, 37900, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(46, '2018-04-01 09:27:09', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'QUOT000005', 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 12, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(47, '2018-04-01 09:28:56', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'QUOT000006', 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 12, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(48, '2018-04-01 09:35:32', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'QUOT000007', 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 10, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(49, '2018-04-01 09:39:20', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'QUOT000008', 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 1, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(50, '2018-04-01 09:40:06', 'rajib@dotbdsolutions.com', 100, '2018-04-01', 'QUOT000009', 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 1, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(51, '2018-04-02 06:04:19', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'QUOT000010', 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 5, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(52, '2018-04-02 06:04:57', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'QUOT000010-1', 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 5, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(53, '2018-04-02 06:05:17', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'QUOT000010-1', 'DIN0000001', 2, 'WI-60DK', 'WI-60DK', 'Head Office', 'Head Office', 'Head Office', 5, 22500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(54, '2018-04-02 10:03:38', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'QUOT000011', 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 2, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(55, '2018-04-02 10:04:14', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'QUOT000011-1', 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 2, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(56, '2018-04-02 10:04:53', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'QUOT000011-2', 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 2, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(57, '2018-04-02 10:05:06', 'rajib@dotbdsolutions.com', 100, '2018-04-02', 'QUOT000011-2', 'DIN0000001', 2, 'WI-5069S', 'WI-5069S', 'Head Office', 'Head Office', 'Head Office', 3, 52500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(61, '2018-04-03 12:27:11', 'rajib@dotbdsolutions.com', 100, '2018-04-03', 'QUOT000012', 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 2, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(62, '2018-04-04 05:26:53', 'rajib@dotbdsolutions.com', 100, '2018-04-04', 'QUOT000013', 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 5, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(63, '2018-04-04 05:26:55', 'rajib@dotbdsolutions.com', 100, '2018-04-04', 'QUOT000014', 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 5, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(64, '2018-04-04 05:27:36', 'rajib@dotbdsolutions.com', 100, '2018-04-04', 'QUOT000014-1', 'CUS0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 3, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 4),
(66, '2018-05-10 05:18:42', 'rajib@dotbdsolutions.com', 100, '2018-05-10', 'QUOT000015', 'CUS0000003', 1, 'ULB-VB-325', 'ULB-VB-325', 'Head Office', 'Head Office', 'Head Office', 24, 58, 0, 'None', 'Stocking', 1, 'BDT', 1.16, 'None', 'None', 2018, 5),
(67, '2018-05-10 05:19:51', 'rajib@dotbdsolutions.com', 100, '2018-05-10', 'QUOT000015', 'CUS0000003', 2, 'ULB-VL-250', 'ULB-VL-250', 'Head Office', 'Head Office', 'Head Office', 6, 34, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 5),
(68, '2018-05-10 05:21:02', 'rajib@dotbdsolutions.com', 100, '2018-05-10', 'QUOT000015', 'CUS0000003', 3, 'ULB-TBT-200X04', 'ULB-TBT-200X04', 'Head Office', 'Head Office', 'Head Office', 6, 320, 0, 'None', 'Stocking', 1, 'BDT', 32, 'None', 'None', 2018, 5),
(69, '2018-05-16 07:43:53', 'rajib@dotbdsolutions.com', 100, '2018-05-16', 'QUOT000016', 'CUS0000006', 1, 'WI-60DK', 'WI-60DK', 'Head Office', 'Head Office', 'Head Office', 2, 22500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 5),
(70, '2018-05-16 07:44:10', 'rajib@dotbdsolutions.com', 100, '2018-05-16', 'QUOT000016-1', 'CUS0000006', 1, 'WI-60DK', 'WI-60DK', 'Head Office', 'Head Office', 'Head Office', 2, 22500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 5),
(71, '2018-05-16 07:44:20', 'rajib@dotbdsolutions.com', 100, '2018-05-16', 'QUOT000016-1', 'CUS0000006', 2, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 2, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 5),
(72, '2018-05-16 10:33:25', 'rajib@dotbdsolutions.com', 100, '2018-05-16', 'QUOT000017', 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 4, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 5),
(73, '2018-05-16 10:33:58', 'rajib@dotbdsolutions.com', 100, '2018-05-16', 'QUOT000017-1', 'DIN0000001', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 4, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 5),
(74, '2018-06-03 05:21:18', 'rajib@dotbdsolutions.com', 100, '2018-06-03', 'QUOT000018', 'CUS0000005', 1, 'WI-70DK', 'WI-70DK', 'Head Office', 'Head Office', 'Head Office', 5, 28400, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 6),
(75, '2018-09-19 11:35:43', 'admin@demo.com', 100, '2018-09-19', 'QUOT000019', 'CUS0000009', 1, 'WI-5069S', 'WI-5069S', 'Head Office', 'Head Office', 'Head Office', 2, 52500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 9),
(76, '2018-09-19 11:37:35', 'admin@demo.com', 100, '2018-09-19', 'QUOT000020', 'CUS0000008', 1, 'WI-5069S', 'WI-5069S', 'Head Office', 'Head Office', 'Head Office', 5, 52500, 0, 'None', 'Stocking', 1, 'BDT', 0, 'None', 'None', 2018, 9);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vcustomerbal`
-- (See below for the actual view)
--
CREATE TABLE `vcustomerbal` (
`bizid` int(6)
,`xaccsub` varchar(20)
,`xbal` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vdoreturndt`
-- (See below for the actual view)
--
CREATE TABLE `vdoreturndt` (
`bizid` int(6)
,`ztime` timestamp
,`xreqdelnum` varchar(20)
,`xsonum` varchar(20)
,`xcus` varchar(20)
,`xsup` varchar(20)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xreqdeldetsl` bigint(20) unsigned
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xreturnqty` double
,`xrate` double
,`xratepur` double
,`xunit` varchar(20)
,`xtypestk` varchar(20)
,`xdisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vgldetailinterface`
-- (See below for the actual view)
--
CREATE TABLE `vgldetailinterface` (
`ztime` timestamp
,`bizid` int(6)
,`xvoucher` varchar(20)
,`xrow` int(3)
,`xdate` date
,`xnarration` varchar(250)
,`xref` varchar(100)
,`xchequeno` varchar(50)
,`xyear` int(4)
,`xper` int(2)
,`zemail` varchar(100)
,`xemail` varchar(100)
,`xbranch` varchar(50)
,`xdoctype` varchar(20)
,`xstatus` varchar(11)
,`xdocnum` varchar(20)
,`xapprovedby` varchar(100)
,`xmanager` varchar(100)
,`xacc` varchar(20)
,`xaccdesc` varchar(100)
,`xacctype` varchar(100)
,`xaccusage` varchar(30)
,`xaccsource` varchar(30)
,`xaccsub` varchar(20)
,`xproj` varchar(100)
,`xsec` varchar(100)
,`xdiv` varchar(100)
,`xcur` varchar(20)
,`xbase` double
,`xprime` double
,`xcheque` varchar(50)
,`xchequedate` date
,`xflag` varchar(20)
,`xinvnum` varchar(20)
,`xsalesparson` varchar(100)
,`xrecflag` varchar(15)
,`xacclevel1` varchar(100)
,`xacclevel2` varchar(100)
,`xacclevel3` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vglheader`
-- (See below for the actual view)
--
CREATE TABLE `vglheader` (
`xsl` bigint(20) unsigned
,`ztime` timestamp
,`zutime` datetime
,`bizid` int(6)
,`xvoucher` varchar(20)
,`xdate` date
,`xnarration` varchar(250)
,`xref` varchar(100)
,`xlong` varchar(250)
,`xchequeno` varchar(50)
,`xyear` int(4)
,`xper` int(2)
,`xstatusjv` varchar(20)
,`zemail` varchar(100)
,`xemail` varchar(100)
,`xbranch` varchar(50)
,`xsite` varchar(50)
,`xdoctype` varchar(20)
,`xdocnum` varchar(20)
,`xapprovedby` varchar(100)
,`xmanager` varchar(100)
,`xrecflag` varchar(15)
,`xstatus` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vglsales`
-- (See below for the actual view)
--
CREATE TABLE `vglsales` (
`bizid` int(6)
,`xvoucher` varchar(20)
,`xsonum` varchar(20)
,`ztime` timestamp
,`xcus` varchar(50)
,`xdate` date
,`xyear` int(4)
,`xper` int(2)
,`xmanager` varchar(50)
,`xproj` varchar(50)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xsalesaccdr` varchar(20)
,`xsalesacccr` varchar(20)
,`ximaccdr` varchar(20)
,`ximacccr` varchar(20)
,`xvataccdr` varchar(20)
,`xvatacccr` varchar(20)
,`xdiscaccdr` varchar(20)
,`xdiscacccr` varchar(20)
,`xcosttotal` double
,`xsubtotal` double
,`xtaxtotal` double
,`xdisctotal` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vglsalesdetail`
-- (See below for the actual view)
--
CREATE TABLE `vglsalesdetail` (
`bizid` int(11)
,`ztime` timestamp
,`xvoucher` varchar(20)
,`xdocnum` varchar(20)
,`xinvnum` varchar(20)
,`xrecflag` varchar(4)
,`xsalesparson` varchar(50)
,`xproj` varchar(50)
,`xdoctype` varchar(11)
,`xaccsub` varchar(50)
,`xdate` date
,`xyear` int(11)
,`xper` int(11)
,`xrow` bigint(20)
,`xacc` varchar(20)
,`xprime` double
,`xflag` varchar(6)
,`xstatus` varchar(8)
,`xnarration` varchar(58)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vglsalesinterface`
-- (See below for the actual view)
--
CREATE TABLE `vglsalesinterface` (
`ztime` timestamp
,`bizid` int(11)
,`xvoucher` varchar(20)
,`xrow` bigint(20)
,`xdate` date
,`xnarration` varchar(58)
,`xref` char(0)
,`xchequeno` char(0)
,`xyear` int(11)
,`xper` int(11)
,`zemail` char(0)
,`xemail` char(0)
,`xbranch` varchar(50)
,`xdoctype` varchar(11)
,`xstatus` varchar(8)
,`xdocnum` varchar(20)
,`xapprovedby` char(0)
,`xmanager` char(0)
,`xacc` varchar(20)
,`xaccdesc` varchar(100)
,`xacctype` varchar(50)
,`xaccusage` varchar(50)
,`xaccsource` varchar(100)
,`xaccsub` varchar(50)
,`xproj` varchar(50)
,`xsec` char(0)
,`xdiv` char(0)
,`xcur` varchar(3)
,`xbase` int(1)
,`xprime` double
,`xcheque` char(0)
,`xchequedate` char(0)
,`xflag` varchar(6)
,`xinvnum` varchar(20)
,`xsalesparson` varchar(50)
,`xrecflag` varchar(4)
,`xacclevel1` varchar(100)
,`xacclevel2` varchar(100)
,`xacclevel3` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vgrndet`
-- (See below for the actual view)
--
CREATE TABLE `vgrndet` (
`bizid` int(6)
,`xgrnsl` bigint(20) unsigned
,`ztime` timestamp
,`xgrnnum` varchar(20)
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqtypur` double
,`xextqty` double
,`xratepur` double
,`xstdcost` double
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xconversion` double
,`xunitstk` varchar(20)
,`xtypestk` varchar(20)
,`xdisc` double
,`xtotal` double
,`xtotaltax` double
,`xtotaldisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vgrnreturndet`
-- (See below for the actual view)
--
CREATE TABLE `vgrnreturndet` (
`bizid` int(6)
,`xgrnsl` bigint(20) unsigned
,`ztime` timestamp
,`xgrnnum` varchar(20)
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xwh` varchar(50)
,`xgrndetsl` bigint(20) unsigned
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqtypur` double
,`xextqty` double
,`xreturnqty` double
,`xratepur` double
,`xstdcost` double
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xconversion` double
,`xunitstk` varchar(20)
,`xdisc` double
,`xtotal` double
,`xtotaltax` double
,`xtotaldisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimreqdeldet`
-- (See below for the actual view)
--
CREATE TABLE `vimreqdeldet` (
`bizid` int(6)
,`ztime` timestamp
,`xreqdelnum` varchar(20)
,`xsonum` varchar(20)
,`xcus` varchar(20)
,`xgrossdisc` double
,`xsup` varchar(20)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xrate` double
,`xstdcost` double
,`xratepur` double
,`xunit` varchar(20)
,`xtypestk` varchar(20)
,`xtaxrate` double
,`xtaxamt` double
,`xdisc` double
,`xdiscamt` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimreqdet`
-- (See below for the actual view)
--
CREATE TABLE `vimreqdet` (
`ztime` timestamp
,`bizid` int(6)
,`zemail` varchar(100)
,`ximreqnum` varchar(20)
,`xdate` date
,`xrdin` varchar(20)
,`xreqby` varchar(50)
,`xmobile` varchar(14)
,`xsup` varchar(20)
,`xitemdesc` varchar(500)
,`xstdcost` double
,`xunitstk` varchar(10)
,`xdeladd` varchar(250)
,`xstatus` varchar(20)
,`xbranch` varchar(100)
,`xrow` int(5)
,`stno` int(8)
,`xitemcode` varchar(20)
,`xqty` double
,`xrate` double
,`xyear` int(4)
,`xper` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimreturndet`
-- (See below for the actual view)
--
CREATE TABLE `vimreturndet` (
`bizid` int(6)
,`ztime` timestamp
,`xreqdelnum` varchar(20)
,`xdoreturnnum` varchar(20)
,`xcus` varchar(20)
,`xreturndetsl` bigint(20) unsigned
,`xsup` varchar(20)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xrate` double
,`xratepur` double
,`xunit` varchar(20)
,`xtypestk` varchar(20)
,`xtaxrate` double
,`xdisc` double
,`xstdcost` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimstock`
-- (See below for the actual view)
--
CREATE TABLE `vimstock` (
`bizid` int(11)
,`xwh` varchar(50)
,`xitemcode` varchar(50)
,`xqtypo` double
,`xqty` double
,`xqtyso` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimtransferdet`
-- (See below for the actual view)
--
CREATE TABLE `vimtransferdet` (
`ztime` timestamp
,`bizid` int(6)
,`zemail` varchar(100)
,`xdate` date
,`ximptnum` varchar(20)
,`xdoctype` varchar(50)
,`xstatus` varchar(20)
,`xyear` int(4)
,`xper` int(2)
,`xsup` varchar(20)
,`xrow` int(5)
,`xwh` varchar(50)
,`xtxnwh` varchar(50)
,`xbranch` varchar(100)
,`xproj` varchar(50)
,`xitemcode` varchar(20)
,`xitembatch` varchar(30)
,`xitemdesc` varchar(500)
,`xqty` double
,`xunit` varchar(20)
,`xstdcost` double
,`xsign` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimtrn`
-- (See below for the actual view)
--
CREATE TABLE `vimtrn` (
`ztime` timestamp
,`bizid` int(11)
,`xdate` date
,`xtxnnum` varchar(20)
,`xsup` varchar(20)
,`xrow` bigint(20)
,`xwh` varchar(50)
,`xbranch` varchar(100)
,`xproj` varchar(50)
,`xitemcode` varchar(50)
,`xitembatch` varchar(30)
,`xitemdesc` varchar(500)
,`xqtypo` double
,`xunitpur` varchar(20)
,`xqty` double
,`xextqty` double
,`xunitstk` varchar(20)
,`xqtyso` double
,`xratepur` double
,`xconversion` double
,`xstdcost` varchar(22)
,`xstdprice` double
,`xdisc` double
,`xdoctype` varchar(50)
,`zemail` varchar(100)
,`xsignpo` bigint(20)
,`xsign` bigint(20)
,`xsignso` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vitemcost`
-- (See below for the actual view)
--
CREATE TABLE `vitemcost` (
`bizid` int(11)
,`xitemcode` varchar(50)
,`totalqty` double
,`avgcost` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vitemcostdt`
-- (See below for the actual view)
--
CREATE TABLE `vitemcostdt` (
`bizid` int(11)
,`xitemcode` varchar(50)
,`totalqty` double
,`totalpurchasecost` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpmfgrdet`
-- (See below for the actual view)
--
CREATE TABLE `vpmfgrdet` (
`xfgrsl` bigint(20) unsigned
,`zemail` varchar(100)
,`ztime` timestamp
,`bizid` int(6)
,`xfgrnum` varchar(20)
,`xitemcode` varchar(20)
,`xbatchno` varchar(20)
,`xexpdate` date
,`xdate` date
,`xqty` double
,`xstdcost` double
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xfgrdetsl` bigint(20) unsigned
,`xrow` int(5)
,`xrawitem` varchar(50)
,`xrawwh` varchar(50)
,`xrawqty` double
,`xrawcost` double
,`xunit` varchar(20)
,`xitemtype` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpoavgcost`
-- (See below for the actual view)
--
CREATE TABLE `vpoavgcost` (
`bizid` int(6)
,`xitemcode` varchar(20)
,`xavgcost` varchar(67)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpocostdt`
-- (See below for the actual view)
--
CREATE TABLE `vpocostdt` (
`zemail` varchar(100)
,`bizid` int(6)
,`xposl` bigint(20) unsigned
,`ztime` timestamp
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xexch` double
,`xunitstk` varchar(20)
,`xtypestk` varchar(20)
,`xwh` varchar(50)
,`xconversion` double
,`xcur` varchar(10)
,`xpotype` varchar(30)
,`xitembatch` varchar(20)
,`xqty` double
,`xratepur` double
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xdisc` double
,`xtotalpoamt` double
,`xtotalcost` double
,`xpocost` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpodet`
-- (See below for the actual view)
--
CREATE TABLE `vpodet` (
`bizid` int(6)
,`xposl` bigint(20) unsigned
,`ztime` timestamp
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xshipterm` varchar(20)
,`xshipvia` varchar(50)
,`xlcno` varchar(100)
,`xlcdate` varchar(30)
,`xghodate` date
,`xdeldate` date
,`xetd` date
,`xeta` date
,`xcorto` varchar(50)
,`xcoradd` varchar(250)
,`xcorphone` varchar(20)
,`xcoremail` varchar(100)
,`xpino` varchar(30)
,`xpidate` date
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xwh` varchar(50)
,`xnote` varchar(1000)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xyear` int(4)
,`xper` int(2)
,`xcur` varchar(10)
,`xexch` double
,`xpotype` varchar(30)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xratepur` double
,`xtypestk` varchar(20)
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xconversion` double
,`xunitstk` varchar(20)
,`xdisc` double
,`xtotal` double
,`xtotaltax` double
,`xtotaldisc` double
,`xbasetotal` double
,`xbasetotaldisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpogrndet`
-- (See below for the actual view)
--
CREATE TABLE `vpogrndet` (
`bizid` int(6)
,`xposl` bigint(20) unsigned
,`ztime` timestamp
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xgrnqty` double
,`xexch` double
,`xratepur` double
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xtypestk` varchar(20)
,`xconversion` double
,`xunitstk` varchar(20)
,`xdisc` double
,`xtotal` double
,`xtotaltax` double
,`xtotaldisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpoheader`
-- (See below for the actual view)
--
CREATE TABLE `vpoheader` (
`bizid` int(6)
,`xpotype` varchar(30)
,`xposl` bigint(20) unsigned
,`ztime` timestamp
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xshipterm` varchar(20)
,`xshipvia` varchar(50)
,`xlcno` varchar(100)
,`xlcdate` varchar(30)
,`xghodate` date
,`xdeldate` date
,`xetd` date
,`xeta` date
,`xcorto` varchar(50)
,`xcoradd` varchar(250)
,`xcorphone` varchar(20)
,`xcoremail` varchar(100)
,`xpino` varchar(30)
,`xpidate` date
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xnote` varchar(1000)
,`xstatus` varchar(20)
,`xyear` int(4)
,`xper` int(2)
,`xcur` varchar(10)
,`xexch` double
,`xtotalpoamt` double
,`xtotalcost` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpomilestone`
-- (See below for the actual view)
--
CREATE TABLE `vpomilestone` (
`bizid` int(6)
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xorg` varchar(50)
,`xmilestone` varchar(23)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vporeturndet`
-- (See below for the actual view)
--
CREATE TABLE `vporeturndet` (
`bizid` int(6)
,`xporeturnsl` bigint(20) unsigned
,`ztime` timestamp
,`xporeturnnum` varchar(20)
,`xgrnnum` varchar(20)
,`xsup` varchar(20)
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xporeturndetsl` bigint(20) unsigned
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xextqty` double
,`xratepur` double
,`xstdcost` double
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xtypestk` varchar(20)
,`xconversion` double
,`xunitstk` varchar(20)
,`xdisc` double
,`xtotal` double
,`xtotaltax` double
,`xtotaldisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vquotmilestone`
-- (See below for the actual view)
--
CREATE TABLE `vquotmilestone` (
`xsl` bigint(20) unsigned
,`ztime` timestamp
,`zutime` datetime
,`zemail` varchar(100)
,`xemail` varchar(100)
,`bizid` int(6)
,`xquotnum` varchar(20)
,`xdate` date
,`xcus` varchar(50)
,`xgrossdisc` double
,`xnotes` text
,`xcusdoc` varchar(30)
,`xmanager` varchar(50)
,`xbranch` varchar(50)
,`xwh` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xrecflag` varchar(20)
,`xsonum` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vrecnpay`
-- (See below for the actual view)
--
CREATE TABLE `vrecnpay` (
`bizid` int(6)
,`xdate` date
,`xvoucher` varchar(20)
,`xacc` varchar(20)
,`xaccdesc` varchar(100)
,`xaccusage` varchar(30)
,`xaccsub` varchar(20)
,`xacctype` varchar(100)
,`xaccsource` varchar(30)
,`xcur` varchar(20)
,`xbase` double
,`xprime` double
,`xsite` varchar(50)
,`xtype` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vrecnpaycb`
-- (See below for the actual view)
--
CREATE TABLE `vrecnpaycb` (
`bizid` int(6)
,`xdate` date
,`xvoucher` varchar(20)
,`xacc` varchar(20)
,`xaccdesc` varchar(100)
,`xaccsub` varchar(20)
,`xacctype` varchar(100)
,`xaccusage` varchar(30)
,`xaccsource` varchar(30)
,`xcur` varchar(20)
,`xbase` double
,`xprime` double
,`xsite` varchar(50)
,`xtype` varchar(11)
,`xflag` varchar(20)
,`xdoctype` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsalesdodt`
-- (See below for the actual view)
--
CREATE TABLE `vsalesdodt` (
`bizid` int(6)
,`sosl` bigint(20) unsigned
,`ztime` timestamp
,`zemail` varchar(100)
,`xsonum` varchar(20)
,`xquotnum` varchar(20)
,`xdate` date
,`xcus` varchar(50)
,`xgrossdisc` double
,`xnotes` text
,`xcusdoc` varchar(30)
,`xstatus` varchar(20)
,`xrecflag` varchar(20)
,`xyear` int(4)
,`xper` int(2)
,`xvoucher` varchar(20)
,`xmanager` varchar(50)
,`xsalesaccdr` varchar(20)
,`xsalesacccr` varchar(20)
,`ximaccdr` varchar(20)
,`ximacccr` varchar(20)
,`xvataccdr` varchar(20)
,`xvatacccr` varchar(20)
,`xdiscaccdr` varchar(20)
,`xdiscacccr` varchar(20)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xrow` int(5)
,`xrowquot` int(5)
,`xitemcode` varchar(20)
,`xitembatch` varchar(20)
,`xqty` double
,`xdoqty` double
,`xcost` double
,`xrate` double
,`xcosttotal` double
,`xsubtotal` double
,`xtaxrate` double
,`xtaxtotal` double
,`xunitsale` varchar(20)
,`xtypestk` varchar(20)
,`xexch` double
,`xcur` varchar(10)
,`xdisc` double
,`xdisctotal` double
,`xtaxcode` varchar(20)
,`xtaxscope` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsalesdt`
-- (See below for the actual view)
--
CREATE TABLE `vsalesdt` (
`bizid` int(6)
,`sosl` bigint(20) unsigned
,`ztime` timestamp
,`zemail` varchar(100)
,`xsonum` varchar(20)
,`xquotnum` varchar(20)
,`xdate` date
,`xcus` varchar(50)
,`xcusbal` double
,`xgrossdisc` double
,`xrcvamt` double
,`xnotes` text
,`xcusdoc` varchar(30)
,`xstatus` varchar(20)
,`xrecflag` varchar(20)
,`xyear` int(4)
,`xper` int(2)
,`xvoucher` varchar(20)
,`xmanager` varchar(50)
,`xsalesaccdr` varchar(20)
,`xsalesacccr` varchar(20)
,`ximaccdr` varchar(20)
,`ximacccr` varchar(20)
,`xvataccdr` varchar(20)
,`xvatacccr` varchar(20)
,`xdiscaccdr` varchar(20)
,`xdiscacccr` varchar(20)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xrow` int(5)
,`xrowquot` int(5)
,`xitemcode` varchar(20)
,`xitembatch` varchar(20)
,`xcat` varchar(50)
,`xqty` double
,`xcost` double
,`xrate` double
,`xcosttotal` double
,`xsubtotal` double
,`xtaxrate` double
,`xtaxtotal` double
,`xunitsale` varchar(20)
,`xtypestk` varchar(20)
,`xexch` double
,`xcur` varchar(10)
,`xdisc` double
,`xdisctotal` double
,`xtaxcode` varchar(20)
,`xtaxscope` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsecodes`
-- (See below for the actual view)
--
CREATE TABLE `vsecodes` (
`bizid` int(11)
,`xcodetype` varchar(50)
,`xcode` varchar(100)
,`xdesc` varchar(150)
,`xcoderem` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsomilestone`
-- (See below for the actual view)
--
CREATE TABLE `vsomilestone` (
`bizid` int(6)
,`ztime` timestamp
,`zemail` varchar(100)
,`xsonum` varchar(20)
,`xquotnum` varchar(20)
,`xdate` date
,`xcus` varchar(50)
,`xdelcount` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsupplierbal`
-- (See below for the actual view)
--
CREATE TABLE `vsupplierbal` (
`xaccsub` varchar(20)
,`xbal` double
);

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

--
-- Indexes for table `ablstatement`
--
ALTER TABLE `ablstatement`
  ADD PRIMARY KEY (`bizid`,`stno`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `distcashnbankpay`
--
ALTER TABLE `distcashnbankpay`
  ADD PRIMARY KEY (`xpaynum`),
  ADD UNIQUE KEY `xpaynum` (`xpaynum`),
  ADD KEY `stno` (`stno`,`xrdin`),
  ADD KEY `zemail` (`zemail`,`xtype`,`xamount`,`xbank`);

--
-- Indexes for table `distdelscope`
--
ALTER TABLE `distdelscope`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD UNIQUE KEY `xreqdelnum` (`xreqdelnum`),
  ADD KEY `xrdin` (`xrdin`,`xphone`,`xdeltype`,`xdeldocnum`),
  ADD KEY `bizid` (`bizid`),
  ADD KEY `fk_reqdelnum_delscope` (`bizid`,`xreqdelnum`);

--
-- Indexes for table `distpaynreq`
--
ALTER TABLE `distpaynreq`
  ADD PRIMARY KEY (`xpaynreqnum`,`xrdin`,`xotn`),
  ADD UNIQUE KEY `xpaynreqnum` (`xpaynreqnum`),
  ADD UNIQUE KEY `xpaynreqnum_2` (`xpaynreqnum`),
  ADD UNIQUE KEY `xpaynreqnum_3` (`xpaynreqnum`),
  ADD KEY `xrdin` (`xrdin`),
  ADD KEY `bizid` (`bizid`),
  ADD KEY `xotn` (`xotn`),
  ADD KEY `xdoctype` (`xdoctype`),
  ADD KEY `xrdin_2` (`xrdin`,`xotn`);

--
-- Indexes for table `emp_movement`
--
ALTER TABLE `emp_movement`
  ADD PRIMARY KEY (`xsl`),
  ADD KEY `xsl` (`xsl`,`ztime`,`xdate`,`username`,`xterminal`,`xln`,`xlt`);

--
-- Indexes for table `emp_movement_temp`
--
ALTER TABLE `emp_movement_temp`
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `glchart`
--
ALTER TABLE `glchart`
  ADD PRIMARY KEY (`bizid`,`xacc`),
  ADD UNIQUE KEY `glsl` (`glsl`);

--
-- Indexes for table `glchartsub`
--
ALTER TABLE `glchartsub`
  ADD PRIMARY KEY (`bizid`,`xacc`,`xaccsub`),
  ADD UNIQUE KEY `sl` (`sl`);

--
-- Indexes for table `glchequereg`
--
ALTER TABLE `glchequereg`
  ADD PRIMARY KEY (`xsl`),
  ADD KEY `xacc` (`xchequeno`,`xchequedate`),
  ADD KEY `bizid` (`bizid`,`xacccr`,`xacc`),
  ADD KEY `fk_acc_chqreg` (`bizid`,`xacc`);

--
-- Indexes for table `gldetail`
--
ALTER TABLE `gldetail`
  ADD PRIMARY KEY (`bizid`,`xvoucher`,`xrow`),
  ADD UNIQUE KEY `sl` (`sl`),
  ADD KEY `xacc` (`xacc`),
  ADD KEY `fk_zid_xacc` (`bizid`,`xacc`);

--
-- Indexes for table `glheader`
--
ALTER TABLE `glheader`
  ADD PRIMARY KEY (`bizid`,`xvoucher`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `xyear` (`xyear`),
  ADD KEY `xper` (`xper`);

--
-- Indexes for table `glinterface`
--
ALTER TABLE `glinterface`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `xacc` (`xacc`),
  ADD KEY `bizid` (`bizid`),
  ADD KEY `fk_glinterface_acc` (`bizid`,`xacc`);

--
-- Indexes for table `imchkq`
--
ALTER TABLE `imchkq`
  ADD PRIMARY KEY (`bizid`,`ximchkqnum`),
  ADD UNIQUE KEY `imchkqsl` (`imchkqsl`);

--
-- Indexes for table `imchkqdt`
--
ALTER TABLE `imchkqdt`
  ADD PRIMARY KEY (`bizid`,`ximchkqnum`,`xrow`),
  ADD KEY `index_imchkqdt_xitemcode` (`xitemcode`),
  ADD KEY `FK_imchkq_xitemcode` (`bizid`,`xitemcode`);

--
-- Indexes for table `imchkse`
--
ALTER TABLE `imchkse`
  ADD PRIMARY KEY (`bizid`,`ximchksenum`),
  ADD UNIQUE KEY `imchksl` (`imchksl`);

--
-- Indexes for table `imchksedt`
--
ALTER TABLE `imchksedt`
  ADD PRIMARY KEY (`bizid`,`ximchksenum`,`xrow`),
  ADD KEY `index_imchksedt_xitemcode` (`xitemcode`),
  ADD KEY `FK_imchkse_xitemcode` (`bizid`,`xitemcode`);

--
-- Indexes for table `imdoreturn`
--
ALTER TABLE `imdoreturn`
  ADD PRIMARY KEY (`bizid`,`xdoreturnnum`),
  ADD UNIQUE KEY `xreturnsl` (`xreturnsl`);

--
-- Indexes for table `imdoreturndet`
--
ALTER TABLE `imdoreturndet`
  ADD PRIMARY KEY (`bizid`,`xdoreturnnum`,`xrow`),
  ADD UNIQUE KEY `xreturndetsl` (`xreturndetsl`),
  ADD KEY `fk_doreturn_itemcode` (`bizid`,`xitemcode`);

--
-- Indexes for table `imreq`
--
ALTER TABLE `imreq`
  ADD PRIMARY KEY (`bizid`,`ximreqnum`),
  ADD UNIQUE KEY `imreqsl` (`imreqsl`),
  ADD KEY `xrdin` (`xrdin`);

--
-- Indexes for table `imreqdeldet`
--
ALTER TABLE `imreqdeldet`
  ADD PRIMARY KEY (`bizid`,`xreqdelnum`,`xsonum`,`xrow`),
  ADD UNIQUE KEY `xreqdeldetsl` (`xreqdeldetsl`),
  ADD KEY `xitemcode` (`xitemcode`,`xwh`),
  ADD KEY `fk_reqdeldet_item` (`bizid`,`xitemcode`);

--
-- Indexes for table `imreqdelmst`
--
ALTER TABLE `imreqdelmst`
  ADD PRIMARY KEY (`bizid`,`xreqdelnum`),
  ADD UNIQUE KEY `ximdelsl` (`ximdelsl`),
  ADD KEY `xcus` (`xcus`,`xwh`);

--
-- Indexes for table `imreqdet`
--
ALTER TABLE `imreqdet`
  ADD PRIMARY KEY (`bizid`,`ximreqnum`,`xrow`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `fk_item_itemreqdt` (`bizid`,`xitemcode`);

--
-- Indexes for table `imsetxn`
--
ALTER TABLE `imsetxn`
  ADD PRIMARY KEY (`txnnumber`),
  ADD UNIQUE KEY `ximsesl` (`ximsesl`),
  ADD KEY `bizid` (`bizid`,`xitemcode`),
  ADD KEY `bizid_2` (`bizid`,`xcat`),
  ADD KEY `bizid_3` (`bizid`,`xsl`),
  ADD KEY `bizid_4` (`bizid`,`xsup`),
  ADD KEY `bizid_5` (`bizid`,`xwh`),
  ADD KEY `bizid_6` (`bizid`,`xbranch`),
  ADD KEY `bizid_7` (`bizid`,`xdate`),
  ADD KEY `bizid_8` (`bizid`,`xtxntype`),
  ADD KEY `bizid_9` (`bizid`,`ximsenum`),
  ADD KEY `bizid_10` (`bizid`,`xcolor`,`xsize`),
  ADD KEY `bizid_11` (`bizid`,`xstatus`),
  ADD KEY `bizid_12` (`bizid`,`xyear`,`xper`),
  ADD KEY `bizid_13` (`bizid`,`xitemcode`,`xdesc`,`xsl`,`xsup`,`xwh`,`xbranch`,`xstdcost`,`xqty`),
  ADD KEY `fk_cus_imsetxn` (`bizid`,`xcus`);

--
-- Indexes for table `imtransfer`
--
ALTER TABLE `imtransfer`
  ADD PRIMARY KEY (`bizid`,`ximptnum`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `imtransferdet`
--
ALTER TABLE `imtransferdet`
  ADD PRIMARY KEY (`bizid`,`ximptnum`,`xrow`),
  ADD UNIQUE KEY `xtransl` (`xtransl`);

--
-- Indexes for table `mlminfo`
--
ALTER TABLE `mlminfo`
  ADD PRIMARY KEY (`distrisl`),
  ADD UNIQUE KEY `xrdin` (`xrdin`),
  ADD KEY `xrdin_2` (`xrdin`);

--
-- Indexes for table `mlmtotrep`
--
ALTER TABLE `mlmtotrep`
  ADD PRIMARY KEY (`stno`,`bin`,`xcomtype`),
  ADD UNIQUE KEY `xcomsl` (`xcomsl`),
  ADD KEY `bin` (`bin`);

--
-- Indexes for table `mlmtree`
--
ALTER TABLE `mlmtree`
  ADD PRIMARY KEY (`bin`),
  ADD KEY `distrisl` (`distrisl`),
  ADD KEY `upbin` (`upbin`,`updistrisl`),
  ADD KEY `xuser` (`xuser`),
  ADD KEY `xyear` (`xyear`,`xper`),
  ADD KEY `stno` (`stno`),
  ADD KEY `mlevel` (`mlevel`,`fm`),
  ADD KEY `bin` (`bin`,`bc`),
  ADD KEY `updistrisl` (`updistrisl`,`upbc`),
  ADD KEY `distrisl_2` (`distrisl`,`bc`),
  ADD KEY `refbin` (`refbin`),
  ADD KEY `xcus` (`xcus`),
  ADD KEY `binpoint` (`binpoint`);

--
-- Indexes for table `mlmtreeref`
--
ALTER TABLE `mlmtreeref`
  ADD PRIMARY KEY (`refsl`),
  ADD UNIQUE KEY `refsl` (`refsl`),
  ADD KEY `refbin` (`refbin`),
  ADD KEY `bin` (`bin`);

--
-- Indexes for table `order_transaction`
--
ALTER TABLE `order_transaction`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `order_transaction_temp`
--
ALTER TABLE `order_transaction_temp`
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `osptxn`
--
ALTER TABLE `osptxn`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD UNIQUE KEY `xsl_2` (`xsl`),
  ADD KEY `xrdin` (`xrdin`),
  ADD KEY `xyear` (`xyear`,`xper`),
  ADD KEY `xtxntype` (`xtxntype`),
  ADD KEY `bizid` (`bizid`,`xrdin`,`xtxntype`),
  ADD KEY `bizid_2` (`bizid`,`xrdin`,`xdoctype`);

--
-- Indexes for table `pabuziness`
--
ALTER TABLE `pabuziness`
  ADD PRIMARY KEY (`bizid`);

--
-- Indexes for table `pamenus`
--
ALTER TABLE `pamenus`
  ADD PRIMARY KEY (`bizid`,`zrole`,`xmenu`,`xsubmenu`),
  ADD UNIQUE KEY `xmenuserial` (`xmenuserial`),
  ADD KEY `zrole` (`zrole`);

--
-- Indexes for table `paroles`
--
ALTER TABLE `paroles`
  ADD PRIMARY KEY (`bizid`,`zrole`),
  ADD UNIQUE KEY `xroleid` (`xroleid`),
  ADD KEY `index_paroles_zrole` (`zrole`);

--
-- Indexes for table `pausers`
--
ALTER TABLE `pausers`
  ADD PRIMARY KEY (`bizid`,`zemail`),
  ADD UNIQUE KEY `zemail` (`zemail`),
  ADD UNIQUE KEY `xusersl` (`xusersl`),
  ADD KEY `index_pausers_zrole` (`zrole`);

--
-- Indexes for table `pmbomdet`
--
ALTER TABLE `pmbomdet`
  ADD PRIMARY KEY (`xbomcode`,`xrawitem`),
  ADD UNIQUE KEY `xbomdetsl` (`xbomdetsl`);

--
-- Indexes for table `pmbommst`
--
ALTER TABLE `pmbommst`
  ADD PRIMARY KEY (`xbomcode`),
  ADD UNIQUE KEY `xbomsl` (`xbomsl`),
  ADD UNIQUE KEY `xbomcode` (`xbomcode`,`xitemcode`);

--
-- Indexes for table `pmfgrdet`
--
ALTER TABLE `pmfgrdet`
  ADD PRIMARY KEY (`bizid`,`xfgrnum`,`xrow`,`xrawitem`),
  ADD UNIQUE KEY `xfgrdetsl` (`xfgrdetsl`);

--
-- Indexes for table `pmfgrmst`
--
ALTER TABLE `pmfgrmst`
  ADD PRIMARY KEY (`bizid`,`xfgrnum`),
  ADD UNIQUE KEY `xfgrsl` (`xfgrsl`);

--
-- Indexes for table `pocost`
--
ALTER TABLE `pocost`
  ADD PRIMARY KEY (`bizid`,`xponum`,`xcosthead`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `podet`
--
ALTER TABLE `podet`
  ADD PRIMARY KEY (`bizid`,`xponum`,`xrow`),
  ADD UNIQUE KEY `xpodetsl` (`xpodetsl`),
  ADD UNIQUE KEY `bizid` (`bizid`,`xponum`,`xitemcode`),
  ADD KEY `xitemcode` (`xitemcode`),
  ADD KEY `xwh` (`xwh`),
  ADD KEY `xbranch` (`xbranch`),
  ADD KEY `fk_item_podet` (`bizid`,`xitemcode`);

--
-- Indexes for table `pogrndet`
--
ALTER TABLE `pogrndet`
  ADD PRIMARY KEY (`bizid`,`xgrnnum`,`xrow`),
  ADD UNIQUE KEY `xgrndetsl` (`xgrndetsl`),
  ADD KEY `xponum` (`xponum`,`xitemcode`,`xwh`),
  ADD KEY `fk_grndt_xitemcode` (`bizid`,`xitemcode`);

--
-- Indexes for table `pogrnmst`
--
ALTER TABLE `pogrnmst`
  ADD PRIMARY KEY (`bizid`,`xgrnnum`),
  ADD UNIQUE KEY `xgrnsl` (`xgrnsl`),
  ADD KEY `xponum` (`xponum`),
  ADD KEY `xsup` (`xsup`),
  ADD KEY `fk_grnmst_sup` (`bizid`,`xsup`);

--
-- Indexes for table `pomst`
--
ALTER TABLE `pomst`
  ADD PRIMARY KEY (`bizid`,`xponum`),
  ADD UNIQUE KEY `xposl` (`xposl`),
  ADD KEY `fk_sup_pomst` (`bizid`,`xsup`),
  ADD KEY `xwh` (`xwh`),
  ADD KEY `xrecflag` (`xrecflag`);

--
-- Indexes for table `poreturn`
--
ALTER TABLE `poreturn`
  ADD PRIMARY KEY (`bizid`,`xporeturnnum`),
  ADD UNIQUE KEY `xporeturnsl` (`xporeturnsl`);

--
-- Indexes for table `poreturndet`
--
ALTER TABLE `poreturndet`
  ADD PRIMARY KEY (`bizid`,`xporeturnnum`,`xrow`),
  ADD UNIQUE KEY `xporeturndetsl` (`xporeturndetsl`),
  ADD KEY `xitemcode` (`xitemcode`),
  ADD KEY `fk_poreturn_itemcode` (`bizid`,`xitemcode`);

--
-- Indexes for table `secodes`
--
ALTER TABLE `secodes`
  ADD PRIMARY KEY (`bizid`,`xcodetype`,`xcode`),
  ADD UNIQUE KEY `unique_secodes` (`bizid`,`xcodetype`,`xcode`),
  ADD UNIQUE KEY `codeid` (`codeid`),
  ADD KEY `bizid` (`bizid`);

--
-- Indexes for table `secus`
--
ALTER TABLE `secus`
  ADD PRIMARY KEY (`bizid`,`xcus`),
  ADD UNIQUE KEY `xcussl` (`xcussl`),
  ADD KEY `xagent` (`xagent`);

--
-- Indexes for table `seitem`
--
ALTER TABLE `seitem`
  ADD PRIMARY KEY (`bizid`,`xitemcode`),
  ADD UNIQUE KEY `xitemid` (`xitemid`),
  ADD KEY `bizid` (`bizid`);

--
-- Indexes for table `sesup`
--
ALTER TABLE `sesup`
  ADD PRIMARY KEY (`bizid`,`xsup`),
  ADD UNIQUE KEY `xsupsl` (`xsupsl`);

--
-- Indexes for table `sesupoutlet`
--
ALTER TABLE `sesupoutlet`
  ADD PRIMARY KEY (`bizid`,`xoutlet`,`xsup`),
  ADD UNIQUE KEY `xoutletsl` (`xoutletsl`),
  ADD KEY `fk_xsup_outlet` (`bizid`,`xsup`);

--
-- Indexes for table `setax`
--
ALTER TABLE `setax`
  ADD PRIMARY KEY (`xtaxcode`,`bizid`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `seuserlic`
--
ALTER TABLE `seuserlic`
  ADD PRIMARY KEY (`xterminal`,`xterminaluser`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `xterminaluser` (`xterminaluser`);

--
-- Indexes for table `sodet`
--
ALTER TABLE `sodet`
  ADD PRIMARY KEY (`bizid`,`xsonum`,`xrow`),
  ADD UNIQUE KEY `sodetsl` (`sodetsl`),
  ADD KEY `xitemcode` (`xitemcode`),
  ADD KEY `xitembatch` (`xitembatch`),
  ADD KEY `xwh` (`xwh`),
  ADD KEY `xbranch` (`xbranch`),
  ADD KEY `fk_item_sodet` (`bizid`,`xitemcode`);

--
-- Indexes for table `somst`
--
ALTER TABLE `somst`
  ADD PRIMARY KEY (`bizid`,`xsonum`),
  ADD UNIQUE KEY `sosl` (`sosl`),
  ADD KEY `xcus` (`xcus`),
  ADD KEY `xwh` (`xwh`),
  ADD KEY `xsalesaccdr` (`xsalesaccdr`,`xsalesacccr`,`ximaccdr`,`ximacccr`,`xvataccdr`,`xvatacccr`,`xdiscaccdr`,`xdiscacccr`),
  ADD KEY `xyear` (`xyear`),
  ADD KEY `xper` (`xper`),
  ADD KEY `xdate` (`xdate`);

--
-- Indexes for table `soquot`
--
ALTER TABLE `soquot`
  ADD PRIMARY KEY (`bizid`,`xquotnum`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `xrefquot` (`xrefquot`);

--
-- Indexes for table `soquotdet`
--
ALTER TABLE `soquotdet`
  ADD PRIMARY KEY (`bizid`,`xquotnum`,`xrow`),
  ADD UNIQUE KEY `quotdetsl` (`quotdetsl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ablstatement`
--
ALTER TABLE `ablstatement`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distcashnbankpay`
--
ALTER TABLE `distcashnbankpay`
  MODIFY `xpaynum` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `distdelscope`
--
ALTER TABLE `distdelscope`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distpaynreq`
--
ALTER TABLE `distpaynreq`
  MODIFY `xpaynreqnum` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_movement_temp`
--
ALTER TABLE `emp_movement_temp`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56257;

--
-- AUTO_INCREMENT for table `glchart`
--
ALTER TABLE `glchart`
  MODIFY `glsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `glchartsub`
--
ALTER TABLE `glchartsub`
  MODIFY `sl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `glchequereg`
--
ALTER TABLE `glchequereg`
  MODIFY `xsl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gldetail`
--
ALTER TABLE `gldetail`
  MODIFY `sl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5898;

--
-- AUTO_INCREMENT for table `glheader`
--
ALTER TABLE `glheader`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2925;

--
-- AUTO_INCREMENT for table `glinterface`
--
ALTER TABLE `glinterface`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `imchkq`
--
ALTER TABLE `imchkq`
  MODIFY `imchkqsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `imchkse`
--
ALTER TABLE `imchkse`
  MODIFY `imchksl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imdoreturn`
--
ALTER TABLE `imdoreturn`
  MODIFY `xreturnsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imdoreturndet`
--
ALTER TABLE `imdoreturndet`
  MODIFY `xreturndetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imreq`
--
ALTER TABLE `imreq`
  MODIFY `imreqsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imreqdeldet`
--
ALTER TABLE `imreqdeldet`
  MODIFY `xreqdeldetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `imreqdelmst`
--
ALTER TABLE `imreqdelmst`
  MODIFY `ximdelsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `imreqdet`
--
ALTER TABLE `imreqdet`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imsetxn`
--
ALTER TABLE `imsetxn`
  MODIFY `ximsesl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imtransfer`
--
ALTER TABLE `imtransfer`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imtransferdet`
--
ALTER TABLE `imtransferdet`
  MODIFY `xtransl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mlminfo`
--
ALTER TABLE `mlminfo`
  MODIFY `distrisl` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mlmtotrep`
--
ALTER TABLE `mlmtotrep`
  MODIFY `xcomsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mlmtree`
--
ALTER TABLE `mlmtree`
  MODIFY `bin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mlmtreeref`
--
ALTER TABLE `mlmtreeref`
  MODIFY `refsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_transaction`
--
ALTER TABLE `order_transaction`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_transaction_temp`
--
ALTER TABLE `order_transaction_temp`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `osptxn`
--
ALTER TABLE `osptxn`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pabuziness`
--
ALTER TABLE `pabuziness`
  MODIFY `bizid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `pamenus`
--
ALTER TABLE `pamenus`
  MODIFY `xmenuserial` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4599;

--
-- AUTO_INCREMENT for table `paroles`
--
ALTER TABLE `paroles`
  MODIFY `xroleid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pausers`
--
ALTER TABLE `pausers`
  MODIFY `xusersl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=687;

--
-- AUTO_INCREMENT for table `pmbomdet`
--
ALTER TABLE `pmbomdet`
  MODIFY `xbomdetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pmbommst`
--
ALTER TABLE `pmbommst`
  MODIFY `xbomsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pmfgrdet`
--
ALTER TABLE `pmfgrdet`
  MODIFY `xfgrdetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmfgrmst`
--
ALTER TABLE `pmfgrmst`
  MODIFY `xfgrsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pocost`
--
ALTER TABLE `pocost`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `podet`
--
ALTER TABLE `podet`
  MODIFY `xpodetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pogrndet`
--
ALTER TABLE `pogrndet`
  MODIFY `xgrndetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `pogrnmst`
--
ALTER TABLE `pogrnmst`
  MODIFY `xgrnsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `pomst`
--
ALTER TABLE `pomst`
  MODIFY `xposl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `poreturn`
--
ALTER TABLE `poreturn`
  MODIFY `xporeturnsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `poreturndet`
--
ALTER TABLE `poreturndet`
  MODIFY `xporeturndetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `secodes`
--
ALTER TABLE `secodes`
  MODIFY `codeid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT for table `secus`
--
ALTER TABLE `secus`
  MODIFY `xcussl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `seitem`
--
ALTER TABLE `seitem`
  MODIFY `xitemid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1508;

--
-- AUTO_INCREMENT for table `sesup`
--
ALTER TABLE `sesup`
  MODIFY `xsupsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `sesupoutlet`
--
ALTER TABLE `sesupoutlet`
  MODIFY `xoutletsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `setax`
--
ALTER TABLE `setax`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seuserlic`
--
ALTER TABLE `seuserlic`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sodet`
--
ALTER TABLE `sodet`
  MODIFY `sodetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `somst`
--
ALTER TABLE `somst`
  MODIFY `sosl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `soquot`
--
ALTER TABLE `soquot`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `soquotdet`
--
ALTER TABLE `soquotdet`
  MODIFY `quotdetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distdelscope`
--
ALTER TABLE `distdelscope`
  ADD CONSTRAINT `fk_reqdelnum_delscope` FOREIGN KEY (`bizid`,`xreqdelnum`) REFERENCES `imreqdelmst` (`bizid`, `xreqdelnum`);

--
-- Constraints for table `glchart`
--
ALTER TABLE `glchart`
  ADD CONSTRAINT `fk_biz_glchart` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`),
  ADD CONSTRAINT `fk_bizid_glchart` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `glchartsub`
--
ALTER TABLE `glchartsub`
  ADD CONSTRAINT `fk_zid_xaccsub` FOREIGN KEY (`bizid`,`xacc`) REFERENCES `glchart` (`bizid`, `xacc`);

--
-- Constraints for table `glchequereg`
--
ALTER TABLE `glchequereg`
  ADD CONSTRAINT `fk_acc_chqreg` FOREIGN KEY (`bizid`,`xacc`) REFERENCES `glchart` (`bizid`, `xacc`),
  ADD CONSTRAINT `fk_acccr_chqreg` FOREIGN KEY (`bizid`,`xacccr`) REFERENCES `glchart` (`bizid`, `xacc`);

--
-- Constraints for table `gldetail`
--
ALTER TABLE `gldetail`
  ADD CONSTRAINT `fk_xacc_gldetail` FOREIGN KEY (`bizid`,`xacc`) REFERENCES `glchart` (`bizid`, `xacc`),
  ADD CONSTRAINT `fk_zid_xacc` FOREIGN KEY (`bizid`,`xacc`) REFERENCES `glchart` (`bizid`, `xacc`);

--
-- Constraints for table `glheader`
--
ALTER TABLE `glheader`
  ADD CONSTRAINT `fk_bizid_glheader` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `glinterface`
--
ALTER TABLE `glinterface`
  ADD CONSTRAINT `fk_glinterface_acc` FOREIGN KEY (`bizid`,`xacc`) REFERENCES `glchart` (`bizid`, `xacc`);

--
-- Constraints for table `imchkq`
--
ALTER TABLE `imchkq`
  ADD CONSTRAINT `fk_imchq_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `imchkqdt`
--
ALTER TABLE `imchkqdt`
  ADD CONSTRAINT `FK_imchkq_dt` FOREIGN KEY (`bizid`,`ximchkqnum`) REFERENCES `imchkq` (`bizid`, `ximchkqnum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imchkse`
--
ALTER TABLE `imchkse`
  ADD CONSTRAINT `fk_imchkse_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `imchksedt`
--
ALTER TABLE `imchksedt`
  ADD CONSTRAINT `FK_imchkse_dt` FOREIGN KEY (`bizid`,`ximchksenum`) REFERENCES `imchkse` (`bizid`, `ximchksenum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imdoreturndet`
--
ALTER TABLE `imdoreturndet`
  ADD CONSTRAINT `fk_doreturn` FOREIGN KEY (`bizid`,`xdoreturnnum`) REFERENCES `imdoreturn` (`bizid`, `xdoreturnnum`),
  ADD CONSTRAINT `fk_doreturn_itemcode` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `imreq`
--
ALTER TABLE `imreq`
  ADD CONSTRAINT `fk_imreq_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`),
  ADD CONSTRAINT `fk_imreq_xrdin` FOREIGN KEY (`xrdin`) REFERENCES `mlminfo` (`xrdin`);

--
-- Constraints for table `imreqdeldet`
--
ALTER TABLE `imreqdeldet`
  ADD CONSTRAINT `fk_reqdeldet_item` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`),
  ADD CONSTRAINT `fk_reqdeldet_pk` FOREIGN KEY (`bizid`,`xreqdelnum`) REFERENCES `imreqdelmst` (`bizid`, `xreqdelnum`);

--
-- Constraints for table `imreqdelmst`
--
ALTER TABLE `imreqdelmst`
  ADD CONSTRAINT `fk_reqdelmst_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `imreqdet`
--
ALTER TABLE `imreqdet`
  ADD CONSTRAINT `fk_imreq` FOREIGN KEY (`bizid`,`ximreqnum`) REFERENCES `imreq` (`bizid`, `ximreqnum`),
  ADD CONSTRAINT `fk_item_itemreqdt` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `imsetxn`
--
ALTER TABLE `imsetxn`
  ADD CONSTRAINT `fk_cus_imsetxn` FOREIGN KEY (`bizid`,`xcus`) REFERENCES `secus` (`bizid`, `xcus`),
  ADD CONSTRAINT `fk_item_imsetxn` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `imtransferdet`
--
ALTER TABLE `imtransferdet`
  ADD CONSTRAINT `fk_imtransfer` FOREIGN KEY (`bizid`,`ximptnum`) REFERENCES `imtransfer` (`bizid`, `ximptnum`);

--
-- Constraints for table `mlmtree`
--
ALTER TABLE `mlmtree`
  ADD CONSTRAINT `fk_mlmtee` FOREIGN KEY (`distrisl`) REFERENCES `mlminfo` (`distrisl`);

--
-- Constraints for table `pamenus`
--
ALTER TABLE `pamenus`
  ADD CONSTRAINT `fk_pamenus_zrole` FOREIGN KEY (`zrole`) REFERENCES `paroles` (`zrole`),
  ADD CONSTRAINT `fp_pamenus_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `paroles`
--
ALTER TABLE `paroles`
  ADD CONSTRAINT `fk_paroles_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `pausers`
--
ALTER TABLE `pausers`
  ADD CONSTRAINT `fk_pausers` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`),
  ADD CONSTRAINT `fkey_pazrole_zrole` FOREIGN KEY (`zrole`) REFERENCES `paroles` (`zrole`);

--
-- Constraints for table `pmbomdet`
--
ALTER TABLE `pmbomdet`
  ADD CONSTRAINT `fk_bom` FOREIGN KEY (`xbomcode`) REFERENCES `pmbommst` (`xbomcode`);

--
-- Constraints for table `pmfgrdet`
--
ALTER TABLE `pmfgrdet`
  ADD CONSTRAINT `fk_fgr` FOREIGN KEY (`bizid`,`xfgrnum`) REFERENCES `pmfgrmst` (`bizid`, `xfgrnum`);

--
-- Constraints for table `pocost`
--
ALTER TABLE `pocost`
  ADD CONSTRAINT `fk_pomst_pocost` FOREIGN KEY (`bizid`,`xponum`) REFERENCES `pomst` (`bizid`, `xponum`);

--
-- Constraints for table `podet`
--
ALTER TABLE `podet`
  ADD CONSTRAINT `fk_item_podet` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`),
  ADD CONSTRAINT `fk_pomst_podet` FOREIGN KEY (`bizid`,`xponum`) REFERENCES `pomst` (`bizid`, `xponum`);

--
-- Constraints for table `pogrndet`
--
ALTER TABLE `pogrndet`
  ADD CONSTRAINT `fk_grndt_grnmst` FOREIGN KEY (`bizid`,`xgrnnum`) REFERENCES `pogrnmst` (`bizid`, `xgrnnum`),
  ADD CONSTRAINT `fk_grndt_xitemcode` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `pogrnmst`
--
ALTER TABLE `pogrnmst`
  ADD CONSTRAINT `fk_grnmst_sup` FOREIGN KEY (`bizid`,`xsup`) REFERENCES `sesup` (`bizid`, `xsup`),
  ADD CONSTRAINT `fk_pogrnmst_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `pomst`
--
ALTER TABLE `pomst`
  ADD CONSTRAINT `fk_biz_pomst` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`),
  ADD CONSTRAINT `fk_sup_pomst` FOREIGN KEY (`bizid`,`xsup`) REFERENCES `sesup` (`bizid`, `xsup`);

--
-- Constraints for table `poreturndet`
--
ALTER TABLE `poreturndet`
  ADD CONSTRAINT `fk_poreturn_itemcode` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `secodes`
--
ALTER TABLE `secodes`
  ADD CONSTRAINT `fk_secodes_pabuziness` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `secus`
--
ALTER TABLE `secus`
  ADD CONSTRAINT `pk_secus_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `seitem`
--
ALTER TABLE `seitem`
  ADD CONSTRAINT `fk_seitem_biz` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `sesup`
--
ALTER TABLE `sesup`
  ADD CONSTRAINT `pk_xsup_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `sesupoutlet`
--
ALTER TABLE `sesupoutlet`
  ADD CONSTRAINT `fk_xsup_outlet` FOREIGN KEY (`bizid`,`xsup`) REFERENCES `sesup` (`bizid`, `xsup`);

--
-- Constraints for table `sodet`
--
ALTER TABLE `sodet`
  ADD CONSTRAINT `fk_sodet` FOREIGN KEY (`bizid`,`xsonum`) REFERENCES `somst` (`bizid`, `xsonum`),
  ADD CONSTRAINT `fk_sodet_item` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `soquotdet`
--
ALTER TABLE `soquotdet`
  ADD CONSTRAINT `fk_soquot_det` FOREIGN KEY (`bizid`,`xquotnum`) REFERENCES `soquot` (`bizid`, `xquotnum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
