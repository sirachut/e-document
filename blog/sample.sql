-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2019 at 08:47 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `BARCODE_ID` int(11) NOT NULL,
  `NUM_FROM` int(11) DEFAULT NULL,
  `NUM_TO` int(11) DEFAULT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N' COMMENT 'สถานะ ของข้อมูล (N=ปกติ, D=ลบ)',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด',
  `PRINT_STATUS` char(1) DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`BARCODE_ID`, `NUM_FROM`, `NUM_TO`, `RECORD_STATUS`, `CREATE_DATE`, `CREATE_USER`, `LAST_DATE`, `LAST_USER`, `PRINT_STATUS`) VALUES
(1, 100, 159, 'D', '2019-01-16 16:06:20', NULL, '2019-01-16 16:06:20', NULL, 'T'),
(2, 160, 219, 'D', '2019-01-22 11:28:33', NULL, '2019-01-22 11:28:33', NULL, 'T'),
(3, 220, 279, 'N', '2019-01-22 11:29:54', NULL, '2019-01-22 11:29:54', NULL, 'F'),
(4, 280, 339, 'D', '2019-01-22 11:31:41', NULL, '2019-01-22 11:31:41', NULL, 'F'),
(5, 280, 339, 'N', '2019-01-22 11:37:25', NULL, '2019-01-22 11:37:25', NULL, 'F'),
(6, 340, 399, 'N', '2019-01-22 13:06:43', NULL, '2019-01-22 13:06:43', NULL, 'T'),
(7, 400, 459, 'N', '2019-01-23 11:03:36', NULL, '2019-01-23 11:03:36', NULL, 'T'),
(8, 460, 519, 'N', '2019-01-23 11:14:57', NULL, '2019-01-23 11:14:57', NULL, 'F'),
(9, 520, 579, 'N', '2019-01-23 11:14:58', NULL, '2019-01-23 11:14:58', NULL, 'F'),
(10, 580, 639, 'N', '2019-01-23 11:15:01', NULL, '2019-01-23 11:15:01', NULL, 'F'),
(11, 640, 699, 'N', '2019-01-23 11:15:03', NULL, '2019-01-23 11:15:03', NULL, 'F'),
(12, 700, 759, 'N', '2019-01-23 11:15:04', NULL, '2019-01-23 11:15:04', NULL, 'F'),
(13, 760, 819, 'N', '2019-01-23 11:15:07', NULL, '2019-01-23 11:15:07', NULL, 'F'),
(14, 820, 879, 'N', '2019-01-23 11:15:09', NULL, '2019-01-23 11:15:09', NULL, 'T'),
(15, 880, 939, 'N', '2019-01-23 11:15:10', NULL, '2019-01-23 11:15:10', NULL, 'T'),
(16, 940, 999, 'D', '2019-01-23 11:15:12', NULL, '2019-01-23 11:15:12', NULL, 'F'),
(17, 940, 999, 'N', '2019-01-29 12:03:28', NULL, '2019-01-29 12:03:28', NULL, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `DOCUMENT_ID` int(11) NOT NULL,
  `DOCUMENT_PRIORITY` varchar(255) DEFAULT NULL,
  `DOCUMENT_ST_NUMBER` varchar(255) DEFAULT NULL,
  `DOCUMENT_NAME` varchar(255) DEFAULT NULL,
  `FACULTY_ID` int(11) DEFAULT NULL,
  `FACULTY_DEPRATMENT` varchar(255) NOT NULL,
  `FACULTY_TEL` varchar(255) NOT NULL,
  `DOCUMENT_NUMBER` varchar(255) DEFAULT NULL,
  `DATE_IN` datetime DEFAULT CURRENT_TIMESTAMP,
  `DOCUMENT_TO` varchar(255) DEFAULT NULL,
  `DOCUMENT_NOTATION` varchar(255) DEFAULT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N' COMMENT 'สถานะ ของข้อมูล (N=ปกติ, D=ลบ)',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`DOCUMENT_ID`, `DOCUMENT_PRIORITY`, `DOCUMENT_ST_NUMBER`, `DOCUMENT_NAME`, `FACULTY_ID`, `FACULTY_DEPRATMENT`, `FACULTY_TEL`, `DOCUMENT_NUMBER`, `DATE_IN`, `DOCUMENT_TO`, `DOCUMENT_NOTATION`, `RECORD_STATUS`, `CREATE_DATE`, `CREATE_USER`, `LAST_DATE`, `LAST_USER`) VALUES
(2, 'ด่วนที่ซู๊ดดดด', 'ศธ ๐๕๘๐.๑๕/๐๒๓๙', 'ขอส่งคำสั่งคณะเทคโนโลยีสารสนเทศและการสื่อสาร ที่  ๐๕๐/๒๕๖๐ เรื่องแต่งตั้งอาจารย์ที่ปรึกษานิสิต ประจำปี ๒๕๖๐ เพื่อบันทึกฐานข้อมูลทะเบียนออนไลน์', 2, 'asd', 'asdasd', '5124', '2018-10-03 00:00:00', 'ผู้อำนวยการกองบริการศึก', '-asd', NULL, NULL, NULL, NULL, NULL),
(4, 'ธรรมดา', 'ศธ ๐๕๙๐.๑๕(๕)/๐๖๔', 'ขออนุมัติลาพักการศึกษาในภาคการศึกษาต้นปีการศึกษา 2560 เป็นกรณีพิเศษ', 2, 'asd', 'asdasd', '1547', '2018-10-24 00:00:00', 'อธิการบดี', '-', 'D', '0000-00-00 00:00:00', NULL, NULL, NULL),
(25, 'asdasd', 'asdasd', 'asdasd', 1, 'asdasd', 'asd', 'asdsad', '2019-02-05 14:23:31', 'asdas', 'asdasd', 'N', '2019-02-05 14:23:31', NULL, '2019-02-05 14:23:31', NULL),
(26, 'asdasd', 'asdasd', 'asdasd', 11, 'asdasd', 'asd', 'asda', '2019-02-05 14:23:52', 'asd', 'asdasd', 'N', '2019-02-05 14:23:52', NULL, '2019-02-05 14:23:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_item`
--

CREATE TABLE `document_item` (
  `DOCUMENT_ITEM_ID` int(6) NOT NULL,
  `STATUS_ID` int(4) NOT NULL,
  `DATE_IN` datetime NOT NULL,
  `DEPARTMENT_ID` int(4) NOT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N' COMMENT 'สถานะ ของข้อมูล (N=ปกติ, D=ลบ)',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด',
  `DATE_OUT` datetime DEFAULT NULL,
  `ROUTE_NO` int(4) DEFAULT NULL COMMENT 'ลำดับเส้นทางเอกสาร',
  `DETAIL` varchar(255) DEFAULT NULL,
  `DOCUMENT_ID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document_item`
--

INSERT INTO `document_item` (`DOCUMENT_ITEM_ID`, `STATUS_ID`, `DATE_IN`, `DEPARTMENT_ID`, `RECORD_STATUS`, `CREATE_DATE`, `CREATE_USER`, `LAST_DATE`, `LAST_USER`, `DATE_OUT`, `ROUTE_NO`, `DETAIL`, `DOCUMENT_ID`) VALUES
(1, 2, '2019-01-18 16:33:45', 3, 'N', '2019-01-21 14:28:53', NULL, '2019-01-21 14:28:53', NULL, NULL, 1, NULL, NULL),
(2, 2, '2019-01-18 16:33:45', 3, 'N', '2019-01-21 14:40:02', NULL, '2019-01-21 14:40:02', NULL, NULL, 1, NULL, NULL),
(3, 2, '2019-01-18 16:33:45', 3, 'N', '2019-01-21 14:54:03', NULL, '2019-01-21 14:54:03', NULL, NULL, 1, NULL, 18);

-- --------------------------------------------------------

--
-- Table structure for table `hrd_mas_faculty`
--

CREATE TABLE `hrd_mas_faculty` (
  `FACULTY_ID` int(11) DEFAULT NULL COMMENT 'รหัสคณะ',
  `FACULTY_CODE` varchar(50) DEFAULT NULL COMMENT 'รหัสคณะ',
  `FACULTY_NAME_TH` varchar(100) DEFAULT NULL COMMENT 'ชื่อคณะ ภาษาไทย',
  `FACULTY_NAME_EN` varchar(100) DEFAULT NULL COMMENT 'ชื่อคณะ ภาษาอังกฤษ',
  `CAMPUS_ID` int(11) DEFAULT NULL COMMENT 'รหัสศูนย์',
  `WORK_TYPE` varchar(1) DEFAULT NULL,
  `FACULTY_TYPE` varchar(1) DEFAULT NULL,
  `RECORD_STATUS` char(1) DEFAULT NULL,
  `LAST_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hrd_mas_faculty`
--

INSERT INTO `hrd_mas_faculty` (`FACULTY_ID`, `FACULTY_CODE`, `FACULTY_NAME_TH`, `FACULTY_NAME_EN`, `CAMPUS_ID`, `WORK_TYPE`, `FACULTY_TYPE`, `RECORD_STATUS`, `LAST_DATE`) VALUES
(1, '01', 'คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ', 'School of Agriculture and Natural Resources', 1, '1', '1', 'N', '2012-09-20 11:35:33'),
(2, '02', 'คณะเทคโนโลยีสารสนเทศและการสื่อสาร', 'School of Information and Communication Technology', 1, '1', '1', 'N', '2012-05-03 16:42:45'),
(3, '03', 'คณะนิติศาสตร์', 'School of Law', 1, '1', '1', 'N', '2012-05-03 16:43:32'),
(4, '04', 'คณะพยาบาลศาสตร์', 'School of Nursing', 1, '1', '1', 'N', '2012-05-03 16:44:56'),
(5, '05', 'คณะแพทยศาสตร์', 'School of Medicine', 1, '1', '1', 'N', '2012-05-03 16:46:31'),
(6, '06', 'คณะเภสัชศาสตร์', 'School of Pharmacy', 1, '1', '1', 'N', '2012-05-03 16:49:17'),
(7, '07', 'คณะวิทยาการจัดการและสารสนเทศศาสตร์', 'School of Management and Information Sciences', 1, '1', '1', 'N', '2012-05-04 13:23:15'),
(8, '08', 'คณะวิทยาศาสตร์', 'School of Science', 1, '1', '1', 'N', '2012-05-03 16:53:30'),
(9, '09', 'คณะวิทยาศาสตร์การแพทย์', 'School of Science', 1, '1', '1', 'N', '2012-05-04 13:22:22'),
(10, '10', 'คณะวิศวกรรมศาสตร์', 'School of Engineering', 1, '1', '1', 'N', '2012-05-03 17:04:40'),
(11, '11', 'คณะศิลปศาสตร์', 'School of Liberal Arts', 1, '1', '1', 'N', '2012-05-03 17:06:47'),
(12, '12', 'คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์', 'School of Architecture and Fine Arts', 1, '1', '1', 'N', '2012-05-03 17:12:30'),
(13, '13', 'คณะสหเวชศาสตร์', 'School of Allied Health Science', 1, '1', '1', 'N', '2012-05-03 17:14:34'),
(14, '14', 'วิทยาลัยพลังงานและสิ่งแวดล้อม', 'School of Energy and Environment', 1, '1', '2', 'N', '2012-05-03 17:16:37'),
(15, '15', 'วิทยาลัยการศึกษาต่อเนื่อง', 'College of Continuing Education', 1, '1', '2', 'N', '2014-10-16 15:21:09'),
(16, '16', 'วิทยาลัยการจัดการ', 'College of Management Bangkok', 3, '1', '2', 'N', '2013-07-24 11:33:41'),
(17, '17', 'วิทยาเขตเชียงราย', 'Chiangrai Campus', 2, '1', '2', 'N', '2014-03-28 10:53:39'),
(19, '19', 'กองกลาง', 'Division Affairs of General', 1, '2', '3', 'N', '2012-05-04 13:33:44'),
(20, '20', 'กองการเจ้าหน้าที่', 'Division of Personnel', 1, '2', '3', 'N', '2012-05-04 13:35:25'),
(21, '21', 'กองกิจการนิสิต', 'Division of Student Affairs', 1, '2', '3', 'N', '2012-05-04 13:36:34'),
(22, '22', 'กองคลัง', 'Division of Finance and Inventory', 1, '2', '3', 'N', '2012-05-04 13:37:44'),
(23, '23', 'กองแผนงาน', 'Division of Planning', 1, '2', '3', 'N', '2012-05-04 13:45:05'),
(24, '24', 'กองอาคารสถานที่', 'กองอาคารสถานที่', 1, '2', '3', 'N', '2012-05-04 13:40:51'),
(25, '25', 'กองบริหารงานวิจัยและประกันคุณภาพการศึกษา', 'Division of Research Administration and Education Quality', 1, '2', '3', 'N', '2012-05-04 14:53:27'),
(26, '26', 'กองบริการการศึกษา', 'Division of Educational Service', 1, '2', '3', 'N', '2012-05-04 13:44:24'),
(27, '27', 'ศูนย์บรรณสารและสื่อการศึกษา', 'The Center for Library Resources and Education Medias', 1, '2', '3', 'N', '2012-05-04 14:43:12'),
(28, '28', 'ศูนย์บริการเทคโนโลยีสารสนเทศและการสื่อสาร', 'Center for Information Technology and Communication Services', 1, '2', '3', 'N', '2012-05-04 14:46:45'),
(29, '29', 'ศูนย์ให้บริการและสนับสนุนนิสิตพิการ', 'ศูนย์ให้บริการและสนับสนุนนิสิตพิการ', 1, '2', '3', 'N', '2012-05-04 14:53:07'),
(30, '30', 'โครงการจัดตั้งศูนย์ศิลปวัฒนธรรมล้านนา (ไต)', 'โครงการจัดตั้งศูนย์ศิลปวัฒนธรรมล้านนา (ไต)', 1, '2', '3', 'N', '2012-12-20 10:54:07'),
(31, '31', 'โครงการจัดตั้งศูนย์ภาษา', 'โครงการจัดตั้งศูนย์ภาษา', 1, '2', '3', 'N', '2012-05-04 14:52:01'),
(32, '32', 'โครงการจัดตั้งศูนย์บ่มเพาะวิสาหกิจมหาวิทยาลัยพะเยา', 'โครงการจัดตั้งศูนย์บ่มเพาะวิสาหกิจมหาวิทยาลัยพะเยา', 1, '2', '3', 'N', '2012-05-04 14:54:37'),
(33, '33', 'โครงการจัดตั้งศูนย์ภูมิภาคเทคโนโลยีอวกาศและภูมิสารสนเทศภาคเหนือ', 'โครงการจัดตั้งศูนย์ภูมิภาคเทคโนโลยีอวกาศและภูมิสารสนเทศภาคเหนือ', 1, '2', '3', 'N', '2012-05-04 14:54:54'),
(34, '34', 'หน่วยตรวจสอบภายใน', 'Internal Audit Section', 1, ' ', ' ', 'N', '2012-05-04 14:55:19'),
(35, '35', 'สำนักงานสภามหาวิทยาลัยพะเยา', 'Office of University of Phayao Council', 1, ' ', ' ', 'N', '2012-05-04 14:07:37'),
(36, '99', 'สำนักบริหาร', NULL, 1, '2', '3', 'N', '2017-10-09 11:03:57'),
(44, '37', 'โครงการจัดตั้งศูนย์การเรียนรู้ทางอิเล็กทรอนิกส์', 'E-Learning Center', NULL, NULL, NULL, 'N', '2012-05-04 14:36:52'),
(45, '36', 'โรงเรียนสาธิตมหาวิทยาลัยพะเยา', 'Demonstration School University Phayao', NULL, '1', '1', 'N', '2012-05-04 14:09:13'),
(46, '38', 'คณะทันตแพทยศาสตร์', 'คณะทันตแพทยศาสตร์', 1, '1', '1', 'N', '2012-10-16 10:08:57'),
(47, '39', 'หน่วยธาลัสซีเมีย', 'หน่วยธาลัสซีเมีย', 1, '2', '3', 'N', '2014-10-14 15:29:02'),
(49, '40', 'หน่วยเทคโนโลยีชีวภาพ', 'หน่วยเทคโนโลยีชีวภาพ', 1, '2', '3', 'N', '2012-10-16 10:08:32'),
(50, '41', 'หน่วยปฏิบัติการวิชาชีพการโรงแรมและการท่องเที่ยว', 'หน่วยปฏิบัติการวิชาชีพการโรงแรมและการท่องเที่ยว', 1, '2', '3', 'N', '2013-08-27 11:01:22'),
(51, '42', 'วิทยาลัยการศึกษา', 'วิทยาลัยการศึกษา', 1, '1', '2', 'N', '2013-11-11 11:58:31'),
(52, '43', 'ศูนย์วิจัยสัตว์ทดลอง', NULL, 1, '2', '3', 'N', '2014-10-20 15:08:53'),
(53, '44', 'อุทยานวิทยาศาสตร์ มหาวิทยาลัยพะเยา', NULL, 1, '2', '3', 'N', '2014-03-28 10:26:49'),
(54, '45', 'ศูนย์เครื่องมือกลาง', NULL, 1, '2', '3', 'N', '2014-03-28 10:51:59'),
(55, '46', 'ศูนย์บ่มเพาะวิสาหกิจ มหาวิทยาลัยพะเยา', NULL, 1, '2', '3', 'N', '2014-03-28 10:48:22'),
(56, '47', 'ศูนย์เครือข่ายความร่วมมือ เพื่อพัฒนาเชิงพื้นที่แบบสร้างสรรค์', NULL, 1, '2', '3', 'N', '2014-03-28 10:51:32'),
(18, '18', 'ศูนย์บริการและสนับสนุนนิสิตพิการ', 'ศูนย์บริการและสนับสนุนนิสิตพิการ', 1, '1', '1', 'D', '2012-08-30 16:53:10'),
(39, NULL, 'ผู้บริหาร', NULL, NULL, NULL, NULL, 'D', '2013-01-03 08:24:09'),
(40, NULL, 'ส่วนงานปฏิบัติการ', NULL, NULL, NULL, NULL, 'D', '2013-01-03 08:24:24'),
(41, NULL, 'รองอธิการบดีฝ่ายกิจการพิเศษ', NULL, NULL, NULL, NULL, 'D', '2013-01-03 08:24:30'),
(42, NULL, 'มหาวิทยาลัยพะเยา', NULL, NULL, NULL, NULL, 'D', '2013-01-03 08:24:36'),
(43, NULL, 'รองอธิการบดี', NULL, NULL, NULL, NULL, 'D', '2013-01-03 08:24:42'),
(48, '100', 'ทดสอบ', 'test', NULL, NULL, NULL, 'D', '2012-10-15 13:17:20'),
(57, '48', 'คณะรัฐศาสตร์และสังคมศาสตร์', 'คณะรัฐศาสตร์และสังคมศาสตร์', 1, '1', '1', 'N', '2014-10-30 09:39:05'),
(58, '49', 'หน่วยบริหารความเสี่ยง', NULL, 1, '2', '3', 'N', '2014-10-13 10:41:23'),
(59, '50', 'ศูนย์การแพทย์และโรงพยาบาลมหาวิทยาลัยพะเยา', NULL, 1, '1', '1', 'N', '2016-11-03 09:57:40'),
(60, '51', 'ศูนย์พัฒนาทรัพยากรมนุษย์ด้านเทคโนโลยีสารสนเทศและการสื่อสาร', NULL, 1, '2', '3', 'N', '2017-05-16 15:08:38'),
(61, '52', 'สำนักงานอธิการบดีมหาวิทยาลัยพะเยา', NULL, 1, '2', '1', 'N', '2018-07-10 15:44:04'),
(62, '53', 'ศูนย์ศึกษาเศรษฐกิจพอเพียงการเกษตรและความอยู่รอดของมนุษยชาติ มหาวิทยาลัยพะเยา', 'ศูนย์ศึกษาเศรษฐกิจพอเพียงการเกษตรและความอยู่รอดของมนุษยชาติ มหาวิทยาลัยพะเยา', 1, '2', '3', 'N', '2018-08-10 15:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `mas_status`
--

CREATE TABLE `mas_status` (
  `STATUS_ID` int(11) NOT NULL,
  `STATUS_NAME` varchar(255) NOT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N' COMMENT 'สถานะ ของข้อมูล (N=ปกติ, D=ลบ)',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_status`
--

INSERT INTO `mas_status` (`STATUS_ID`, `STATUS_NAME`, `RECORD_STATUS`, `CREATE_DATE`, `CREATE_USER`, `LAST_DATE`, `LAST_USER`) VALUES
(1, 'เสร็จสิ้น', NULL, NULL, NULL, NULL, NULL),
(2, 'รับ', NULL, NULL, NULL, NULL, NULL),
(3, 'คืน', NULL, NULL, NULL, NULL, NULL),
(4, 'แก้ไข', NULL, NULL, NULL, NULL, NULL),
(5, 'รอดำเนินการ', NULL, NULL, NULL, NULL, NULL),
(6, 'เป็นมายังไงไม่รู้เลย', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_department`
--

CREATE TABLE `sys_department` (
  `DEPARTMENT_ID` int(11) NOT NULL,
  `DEPARTMENT_NAME` varchar(255) DEFAULT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_department`
--

INSERT INTO `sys_department` (`DEPARTMENT_ID`, `DEPARTMENT_NAME`, `RECORD_STATUS`, `CREATE_DATE`, `CREATE_USER`, `LAST_DATE`, `LAST_USER`) VALUES
(1, 'งานทะเบียน', 'N', NULL, NULL, NULL, NULL),
(2, 'งานรับเข้าศึกษา', 'N', NULL, NULL, NULL, NULL),
(3, 'งานธุรการ', 'N', NULL, NULL, NULL, NULL),
(4, 'งานพัฒนาหลักสูตร', 'N', NULL, NULL, NULL, NULL),
(5, 'งานวิเทศสัมพันธ์', 'N', NULL, NULL, NULL, NULL),
(6, 'งานสนับสนุน', 'N', NULL, NULL, NULL, NULL),
(7, 'งานนวัตกรรม', 'N', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_module`
--

CREATE TABLE `sys_module` (
  `MOD_ID` int(11) NOT NULL,
  `MOD_PARENT_ID` int(11) DEFAULT NULL,
  `MOD_NAME` varchar(100) DEFAULT NULL,
  `MOD_PAGE` varchar(255) DEFAULT NULL,
  `MOD_LEVEL` int(11) DEFAULT NULL,
  `MOD_ORDER` int(11) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  `IS_ACTIVE` char(1) DEFAULT 'T',
  `RECORD_STATUS` char(1) DEFAULT 'N' COMMENT 'สถานะ ของข้อมูล (N=ปกติ, D=ลบ)',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP,
  `CREATE_USER` varchar(50) DEFAULT NULL,
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP,
  `LAST_USER` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_module`
--

INSERT INTO `sys_module` (`MOD_ID`, `MOD_PARENT_ID`, `MOD_NAME`, `MOD_PAGE`, `MOD_LEVEL`, `MOD_ORDER`, `DESCRIPTION`, `IS_ACTIVE`, `RECORD_STATUS`, `CREATE_DATE`, `CREATE_USER`, `LAST_DATE`, `LAST_USER`) VALUES
(1, NULL, 'เอกสาร', '', 0, 1, NULL, 'T', 'N', NULL, NULL, NULL, NULL),
(2, NULL, 'Barcode', '/barcode', 0, 3, NULL, 'T', 'N', NULL, NULL, NULL, NULL),
(3, 1, 'รายการเอกสาร', '/document', 1, 2, NULL, 'T', 'N', NULL, NULL, NULL, NULL),
(4, 1, 'bb2', '/barcode', 1, 1, NULL, 'T', 'N', '2019-01-30 15:15:25', NULL, '2019-01-30 15:15:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_security_permis`
--

CREATE TABLE `sys_security_permis` (
  `PERMIS_ID` int(11) NOT NULL,
  `DEPARTMENT_ID` int(11) NOT NULL,
  `MOD_ID` int(11) NOT NULL,
  `ACTION_ADD` char(1) DEFAULT NULL,
  `ACTION_EDIT` char(1) DEFAULT NULL,
  `ACTION_DEL` char(1) DEFAULT NULL,
  `ACTION_VIEW` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_security_permis`
--

INSERT INTO `sys_security_permis` (`PERMIS_ID`, `DEPARTMENT_ID`, `MOD_ID`, `ACTION_ADD`, `ACTION_EDIT`, `ACTION_DEL`, `ACTION_VIEW`) VALUES
(2472, 8, 60, 'F', 'F', 'F', 'T'),
(2473, 8, 10, 'F', 'F', 'F', 'T'),
(2474, 8, 16, 'F', 'F', 'F', 'T'),
(2475, 8, 18, 'F', 'F', 'F', 'T'),
(2476, 8, 20, 'T', 'T', 'T', 'T'),
(2477, 8, 64, 'T', 'T', 'T', 'T'),
(3707, 9, 81, 'T', 'T', 'T', 'T'),
(3708, 9, 86, 'T', 'T', 'T', 'T'),
(3709, 9, 87, 'T', 'T', 'T', 'T'),
(3710, 9, 88, 'T', 'T', 'T', 'T'),
(4112, 7, 10, 'F', 'F', 'F', 'T'),
(4113, 7, 16, 'F', 'F', 'F', 'T'),
(4114, 7, 18, 'F', 'F', 'F', 'T'),
(4115, 7, 62, 'F', 'F', 'F', 'T'),
(4116, 7, 61, 'F', 'F', 'F', 'T'),
(4117, 7, 11, 'F', 'F', 'F', 'T'),
(4118, 7, 71, 'T', 'T', 'T', 'T'),
(4119, 7, 72, 'T', 'T', 'T', 'T'),
(4120, 7, 12, 'F', 'F', 'F', 'T'),
(4121, 7, 73, 'T', 'T', 'T', 'T'),
(4122, 7, 74, 'T', 'T', 'T', 'T'),
(4123, 7, 13, 'F', 'F', 'F', 'T'),
(4124, 7, 75, 'F', 'F', 'F', 'T'),
(4125, 7, 76, 'F', 'F', 'F', 'T'),
(4126, 7, 14, 'F', 'F', 'F', 'T'),
(4127, 7, 77, 'F', 'F', 'F', 'T'),
(4128, 7, 78, 'F', 'F', 'F', 'T'),
(4129, 7, 19, 'F', 'F', 'F', 'T'),
(4130, 7, 40, 'F', 'F', 'F', 'T'),
(4131, 7, 41, 'F', 'F', 'F', 'T'),
(4132, 7, 47, 'F', 'F', 'F', 'T'),
(4133, 7, 48, 'F', 'F', 'F', 'T'),
(4134, 7, 79, 'F', 'F', 'F', 'T'),
(4135, 7, 80, 'F', 'F', 'F', 'T'),
(4136, 3, 60, 'T', 'T', 'T', 'T'),
(4137, 3, 10, 'T', 'T', 'T', 'T'),
(4138, 3, 16, 'T', 'T', 'T', 'T'),
(4139, 3, 18, 'T', 'T', 'T', 'T'),
(4140, 3, 62, 'F', 'F', 'F', 'T'),
(4141, 3, 61, 'F', 'F', 'F', 'T'),
(4142, 3, 11, 'T', 'T', 'T', 'T'),
(4143, 3, 71, 'T', 'T', 'T', 'T'),
(4144, 3, 72, 'T', 'T', 'T', 'T'),
(4145, 3, 12, 'T', 'T', 'T', 'T'),
(4146, 3, 73, 'T', 'T', 'T', 'T'),
(4147, 3, 74, 'T', 'T', 'T', 'T'),
(4148, 3, 13, 'T', 'T', 'T', 'T'),
(4149, 3, 75, 'T', 'T', 'T', 'T'),
(4150, 3, 76, 'T', 'T', 'T', 'T'),
(4151, 3, 14, 'T', 'T', 'T', 'T'),
(4152, 3, 77, 'T', 'T', 'T', 'T'),
(4153, 3, 78, 'T', 'T', 'T', 'T'),
(4154, 3, 15, 'T', 'T', 'T', 'T'),
(4155, 3, 81, 'T', 'T', 'T', 'T'),
(4156, 3, 82, 'T', 'T', 'T', 'T'),
(4157, 3, 83, 'T', 'T', 'T', 'T'),
(4158, 3, 84, 'T', 'T', 'T', 'T'),
(4159, 3, 85, 'T', 'T', 'T', 'T'),
(4160, 3, 86, 'T', 'T', 'T', 'T'),
(4161, 3, 87, 'T', 'T', 'T', 'T'),
(4162, 3, 88, 'T', 'T', 'T', 'T'),
(4163, 3, 44, 'T', 'T', 'T', 'T'),
(4164, 3, 46, 'T', 'T', 'T', 'T'),
(4165, 3, 58, 'T', 'T', 'T', 'T'),
(4166, 3, 53, 'T', 'T', 'T', 'T'),
(4167, 3, 54, 'T', 'T', 'T', 'T'),
(4168, 3, 55, 'T', 'T', 'T', 'T'),
(4169, 1, 1, 'T', 'T', 'T', 'F'),
(4170, 1, 30, 'T', 'T', 'T', 'F'),
(4171, 1, 36, 'T', 'T', 'T', 'T'),
(4172, 1, 57, 'T', 'T', 'T', 'T'),
(4173, 1, 70, 'T', 'T', 'T', 'T'),
(4174, 1, 35, 'T', 'T', 'T', 'T'),
(4175, 1, 42, 'T', 'T', 'T', 'T'),
(4176, 1, 2, 'T', 'T', 'T', 'F'),
(4177, 1, 25, 'T', 'T', 'T', 'F'),
(4178, 1, 5, 'T', 'T', 'T', 'F'),
(4179, 1, 6, 'T', 'T', 'T', 'F'),
(4180, 1, 26, 'T', 'T', 'T', 'F'),
(4181, 1, 32, 'T', 'T', 'T', 'F'),
(4182, 1, 24, 'T', 'T', 'T', 'F'),
(4183, 1, 7, 'T', 'T', 'T', 'F'),
(4184, 1, 8, 'T', 'T', 'T', 'F'),
(4185, 1, 9, 'T', 'T', 'T', 'F'),
(4186, 1, 4, 'T', 'T', 'T', 'F'),
(4187, 1, 60, 'T', 'T', 'T', 'T'),
(4188, 1, 10, 'T', 'T', 'T', 'T'),
(4189, 1, 16, 'T', 'T', 'T', 'T'),
(4190, 1, 18, 'T', 'T', 'T', 'T'),
(4191, 1, 62, 'T', 'T', 'T', 'T'),
(4192, 1, 61, 'T', 'T', 'T', 'T'),
(4193, 1, 63, 'T', 'T', 'T', 'T'),
(4194, 1, 11, 'T', 'T', 'T', 'T'),
(4195, 1, 71, 'T', 'T', 'T', 'T'),
(4196, 1, 72, 'T', 'T', 'T', 'T'),
(4197, 1, 12, 'T', 'T', 'T', 'T'),
(4198, 1, 73, 'T', 'T', 'T', 'T'),
(4199, 1, 74, 'T', 'T', 'T', 'T'),
(4200, 1, 13, 'T', 'T', 'T', 'T'),
(4201, 1, 75, 'T', 'T', 'T', 'T'),
(4202, 1, 76, 'T', 'T', 'T', 'T'),
(4203, 1, 14, 'T', 'T', 'T', 'T'),
(4204, 1, 77, 'T', 'T', 'T', 'T'),
(4205, 1, 78, 'T', 'T', 'T', 'T'),
(4206, 1, 15, 'T', 'T', 'T', 'T'),
(4207, 1, 81, 'T', 'T', 'T', 'T'),
(4208, 1, 82, 'T', 'T', 'T', 'T'),
(4209, 1, 83, 'T', 'T', 'T', 'T'),
(4210, 1, 84, 'T', 'T', 'T', 'T'),
(4211, 1, 85, 'T', 'T', 'T', 'T'),
(4212, 1, 19, 'T', 'T', 'T', 'T'),
(4213, 1, 31, 'T', 'T', 'T', 'F'),
(4214, 1, 38, 'T', 'T', 'T', 'F'),
(4215, 1, 39, 'T', 'T', 'T', 'F'),
(4216, 1, 43, 'T', 'T', 'T', 'T'),
(4217, 1, 45, 'T', 'T', 'T', 'T'),
(4218, 1, 59, 'T', 'T', 'T', 'T'),
(4219, 1, 89, 'T', 'T', 'T', 'T'),
(4220, 1, 90, 'T', 'T', 'T', 'T'),
(4221, 1, 40, 'T', 'T', 'T', 'F'),
(4222, 1, 41, 'T', 'T', 'T', 'F'),
(4223, 1, 47, 'T', 'T', 'T', 'T'),
(4224, 1, 48, 'T', 'T', 'T', 'T'),
(4225, 1, 79, 'T', 'T', 'T', 'T'),
(4226, 1, 80, 'T', 'T', 'T', 'T'),
(4227, 1, 20, 'T', 'T', 'T', 'T'),
(4228, 1, 64, 'T', 'T', 'T', 'T'),
(4229, 1, 68, 'T', 'T', 'T', 'T'),
(4230, 1, 65, 'T', 'T', 'T', 'T'),
(4231, 1, 66, 'T', 'T', 'T', 'T'),
(4232, 1, 67, 'T', 'T', 'T', 'T'),
(4233, 1, 86, 'T', 'T', 'T', 'T'),
(4234, 1, 87, 'T', 'T', 'T', 'T'),
(4235, 1, 88, 'T', 'T', 'T', 'T'),
(4236, 1, 3, 'T', 'T', 'T', 'F'),
(4237, 1, 29, 'T', 'T', 'T', 'F'),
(4238, 1, 22, 'T', 'T', 'T', 'F'),
(4239, 1, 33, 'T', 'T', 'T', 'F'),
(4240, 2, 1, 'T', 'T', 'T', 'T'),
(4241, 2, 36, 'T', 'T', 'T', 'T'),
(4242, 2, 57, 'T', 'T', 'T', 'T'),
(4243, 2, 70, 'T', 'T', 'T', 'T'),
(4244, 2, 35, 'T', 'T', 'T', 'T'),
(4245, 2, 42, 'T', 'T', 'T', 'T'),
(4246, 2, 4, 'T', 'T', 'T', 'T'),
(4247, 2, 60, 'T', 'T', 'T', 'T'),
(4248, 2, 10, 'T', 'T', 'T', 'T'),
(4249, 2, 16, 'T', 'T', 'T', 'T'),
(4250, 2, 18, 'T', 'T', 'T', 'T'),
(4251, 2, 62, 'T', 'T', 'T', 'T'),
(4252, 2, 61, 'T', 'T', 'T', 'T'),
(4253, 2, 63, 'T', 'T', 'T', 'T'),
(4254, 2, 11, 'T', 'T', 'T', 'T'),
(4255, 2, 71, 'T', 'T', 'T', 'T'),
(4256, 2, 72, 'T', 'T', 'T', 'T'),
(4257, 2, 12, 'T', 'T', 'T', 'T'),
(4258, 2, 73, 'T', 'T', 'T', 'T'),
(4259, 2, 74, 'T', 'T', 'T', 'T'),
(4260, 2, 13, 'T', 'T', 'T', 'T'),
(4261, 2, 75, 'T', 'T', 'T', 'T'),
(4262, 2, 76, 'T', 'T', 'T', 'T'),
(4263, 2, 14, 'T', 'T', 'T', 'T'),
(4264, 2, 77, 'T', 'T', 'T', 'T'),
(4265, 2, 78, 'T', 'T', 'T', 'T'),
(4266, 2, 15, 'T', 'T', 'T', 'T'),
(4267, 2, 81, 'T', 'T', 'T', 'T'),
(4268, 2, 82, 'T', 'T', 'T', 'T'),
(4269, 2, 83, 'T', 'T', 'T', 'T'),
(4270, 2, 84, 'T', 'T', 'T', 'T'),
(4271, 2, 85, 'T', 'T', 'T', 'T'),
(4272, 2, 19, 'T', 'T', 'T', 'T'),
(4273, 2, 31, 'T', 'T', 'T', 'F'),
(4274, 2, 38, 'T', 'T', 'T', 'F'),
(4275, 2, 39, 'T', 'T', 'T', 'F'),
(4276, 2, 43, 'T', 'T', 'T', 'T'),
(4277, 2, 45, 'T', 'T', 'T', 'T'),
(4278, 2, 59, 'T', 'T', 'T', 'T'),
(4279, 2, 89, 'T', 'T', 'T', 'T'),
(4280, 2, 90, 'T', 'T', 'T', 'T'),
(4281, 2, 40, 'T', 'T', 'T', 'F'),
(4282, 2, 41, 'T', 'T', 'T', 'F'),
(4283, 2, 47, 'T', 'T', 'T', 'T'),
(4284, 2, 48, 'T', 'T', 'T', 'T'),
(4285, 2, 79, 'T', 'T', 'T', 'T'),
(4286, 2, 80, 'T', 'T', 'T', 'T'),
(4287, 2, 20, 'T', 'T', 'T', 'T'),
(4288, 2, 64, 'T', 'T', 'T', 'T'),
(4289, 2, 65, 'T', 'T', 'T', 'T'),
(4290, 2, 66, 'T', 'T', 'T', 'T'),
(4291, 2, 67, 'T', 'T', 'T', 'T'),
(4292, 2, 86, 'T', 'T', 'T', 'T'),
(4293, 2, 87, 'T', 'T', 'T', 'T'),
(4294, 2, 88, 'T', 'T', 'T', 'T'),
(4295, 5, 10, 'T', 'T', 'T', 'T'),
(4296, 5, 16, 'T', 'T', 'T', 'T'),
(4297, 5, 18, 'T', 'T', 'T', 'T'),
(4298, 5, 11, 'F', 'F', 'F', 'T'),
(4299, 5, 71, 'T', 'T', 'T', 'T'),
(4300, 5, 72, 'T', 'T', 'T', 'T'),
(4301, 5, 12, 'F', 'F', 'F', 'T'),
(4302, 5, 73, 'T', 'T', 'T', 'T'),
(4303, 5, 74, 'T', 'T', 'T', 'T'),
(4304, 5, 13, 'F', 'F', 'F', 'T'),
(4305, 5, 75, 'F', 'F', 'F', 'T'),
(4306, 5, 76, 'F', 'F', 'F', 'T'),
(4307, 5, 14, 'F', 'F', 'F', 'T'),
(4308, 5, 77, 'F', 'F', 'F', 'T'),
(4309, 5, 78, 'F', 'F', 'F', 'T'),
(4310, 5, 15, 'F', 'F', 'F', 'T'),
(4311, 5, 81, 'F', 'F', 'F', 'T'),
(4312, 5, 82, 'F', 'F', 'F', 'T'),
(4313, 5, 83, 'F', 'F', 'F', 'T'),
(4314, 5, 84, 'F', 'F', 'F', 'T'),
(4315, 5, 85, 'F', 'F', 'F', 'T'),
(4316, 5, 19, 'F', 'F', 'F', 'T'),
(4317, 5, 31, 'T', 'T', 'T', 'T'),
(4318, 5, 86, 'T', 'T', 'T', 'T'),
(4319, 5, 87, 'T', 'T', 'T', 'T'),
(4320, 5, 88, 'T', 'T', 'T', 'T'),
(4321, 6, 10, 'F', 'F', 'F', 'T'),
(4322, 6, 16, 'F', 'F', 'F', 'T'),
(4323, 6, 18, 'F', 'F', 'F', 'T'),
(4324, 6, 11, 'F', 'F', 'F', 'T'),
(4325, 6, 71, 'T', 'T', 'T', 'T'),
(4326, 6, 72, 'T', 'T', 'T', 'T'),
(4327, 6, 12, 'F', 'F', 'F', 'T'),
(4328, 6, 73, 'T', 'T', 'T', 'T'),
(4329, 6, 74, 'T', 'T', 'T', 'T'),
(4330, 6, 13, 'F', 'F', 'F', 'T'),
(4331, 6, 75, 'F', 'F', 'F', 'T'),
(4332, 6, 76, 'F', 'F', 'F', 'T'),
(4333, 6, 14, 'F', 'F', 'F', 'T'),
(4334, 6, 77, 'F', 'F', 'F', 'T'),
(4335, 6, 78, 'F', 'F', 'F', 'T'),
(4336, 6, 15, 'F', 'F', 'F', 'T'),
(4337, 6, 81, 'T', 'T', 'T', 'T'),
(4338, 6, 82, 'T', 'T', 'T', 'T'),
(4339, 6, 83, 'T', 'T', 'T', 'T'),
(4340, 6, 84, 'T', 'T', 'T', 'T'),
(4341, 6, 85, 'T', 'T', 'T', 'T'),
(4342, 6, 86, 'T', 'T', 'T', 'T'),
(4343, 6, 87, 'T', 'T', 'T', 'T'),
(4344, 6, 88, 'T', 'T', 'T', 'T'),
(4345, 6, 34, 'T', 'T', 'T', 'T'),
(4346, 6, 58, 'T', 'T', 'T', 'T'),
(4347, 6, 55, 'T', 'T', 'T', 'T'),
(4348, 6, 56, 'T', 'T', 'T', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE `sys_user` (
  `USER_ID` int(4) NOT NULL,
  `USER_CODE` varchar(50) DEFAULT NULL,
  `DISPLAY_NAME` varchar(250) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `FACULTY_ID` varchar(50) DEFAULT NULL,
  `DEPARTMENT_ID` varchar(50) DEFAULT NULL,
  `TELEPHONE` varchar(25) DEFAULT NULL,
  `MOBILE` varchar(11) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `IS_ACTIVE` char(1) NOT NULL DEFAULT 'T',
  `USER_TYPE` char(1) DEFAULT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N' COMMENT 'สถานะ ของข้อมูล (N=ปกติ, D=ลบ)',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`USER_ID`, `USER_CODE`, `DISPLAY_NAME`, `USERNAME`, `FACULTY_ID`, `DEPARTMENT_ID`, `TELEPHONE`, `MOBILE`, `EMAIL`, `IS_ACTIVE`, `USER_TYPE`, `RECORD_STATUS`, `CREATE_DATE`, `CREATE_USER`, `LAST_DATE`, `LAST_USER`) VALUES
(1, '1560100164866', 'นายปฐมพงศ์ บุญมา', 'pathompong.bo', '2', '1,2,3', '-', '0855986156', NULL, 'T', NULL, 'N', '2019-01-25 10:25:32', NULL, '2019-01-25 10:25:32', NULL),
(2, '1234567897854', 'Edoc', 'edoctest', '2', '1,2,3', '-', '121212', NULL, 'T', NULL, 'N', '2019-01-25 11:15:29', NULL, '2019-01-25 11:15:29', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sys_security_permis`
-- (See below for the actual view)
--
CREATE TABLE `vw_sys_security_permis` (
`DEPARTMENT_ID` int(11)
,`PERMIS_ID` int(11)
,`ACTION_ADD` char(1)
,`ACTION_EDIT` char(1)
,`ACTION_DEL` char(1)
,`ACTION_VIEW` char(1)
,`MOD_ID` int(11)
,`MOD_NAME` varchar(100)
,`MOD_PARENT_ID` int(11)
,`MOD_ORDER` int(11)
,`MOD_LEVEL` int(11)
,`MOD_PAGE` varchar(255)
,`IS_ACTIVE` char(1)
,`CREATE_DATE` datetime
,`CREATE_USER` varchar(50)
,`LAST_DATE` datetime
,`LAST_USER` varchar(50)
,`DEPARTMENT_NAME` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_sys_security_permis`
--
DROP TABLE IF EXISTS `vw_sys_security_permis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_sys_security_permis`  AS  select `sys_security_permis`.`DEPARTMENT_ID` AS `DEPARTMENT_ID`,`sys_security_permis`.`PERMIS_ID` AS `PERMIS_ID`,`sys_security_permis`.`ACTION_ADD` AS `ACTION_ADD`,`sys_security_permis`.`ACTION_EDIT` AS `ACTION_EDIT`,`sys_security_permis`.`ACTION_DEL` AS `ACTION_DEL`,`sys_security_permis`.`ACTION_VIEW` AS `ACTION_VIEW`,`sys_module`.`MOD_ID` AS `MOD_ID`,`sys_module`.`MOD_NAME` AS `MOD_NAME`,`sys_module`.`MOD_PARENT_ID` AS `MOD_PARENT_ID`,`sys_module`.`MOD_ORDER` AS `MOD_ORDER`,`sys_module`.`MOD_LEVEL` AS `MOD_LEVEL`,`sys_module`.`MOD_PAGE` AS `MOD_PAGE`,`sys_module`.`IS_ACTIVE` AS `IS_ACTIVE`,`sys_module`.`CREATE_DATE` AS `CREATE_DATE`,`sys_module`.`CREATE_USER` AS `CREATE_USER`,`sys_module`.`LAST_DATE` AS `LAST_DATE`,`sys_module`.`LAST_USER` AS `LAST_USER`,`sys_department`.`DEPARTMENT_NAME` AS `DEPARTMENT_NAME` from ((`sys_module` join `sys_security_permis` on(((`sys_security_permis`.`MOD_ID` = `sys_module`.`MOD_ID`) and (`sys_module`.`RECORD_STATUS` = 'N')))) join `sys_department` on((`sys_department`.`DEPARTMENT_ID` = `sys_security_permis`.`DEPARTMENT_ID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`BARCODE_ID`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`DOCUMENT_ID`),
  ADD KEY `faculty_fk` (`FACULTY_ID`);

--
-- Indexes for table `document_item`
--
ALTER TABLE `document_item`
  ADD PRIMARY KEY (`DOCUMENT_ITEM_ID`);

--
-- Indexes for table `mas_status`
--
ALTER TABLE `mas_status`
  ADD PRIMARY KEY (`STATUS_ID`);

--
-- Indexes for table `sys_department`
--
ALTER TABLE `sys_department`
  ADD PRIMARY KEY (`DEPARTMENT_ID`);

--
-- Indexes for table `sys_module`
--
ALTER TABLE `sys_module`
  ADD PRIMARY KEY (`MOD_ID`);

--
-- Indexes for table `sys_security_permis`
--
ALTER TABLE `sys_security_permis`
  ADD PRIMARY KEY (`PERMIS_ID`);

--
-- Indexes for table `sys_user`
--
ALTER TABLE `sys_user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `fk_m_user_mc_faculty` (`FACULTY_ID`),
  ADD KEY `fk_md_user_md_security_group1` (`DEPARTMENT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `BARCODE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `DOCUMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `document_item`
--
ALTER TABLE `document_item`
  MODIFY `DOCUMENT_ITEM_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mas_status`
--
ALTER TABLE `mas_status`
  MODIFY `STATUS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sys_department`
--
ALTER TABLE `sys_department`
  MODIFY `DEPARTMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sys_module`
--
ALTER TABLE `sys_module`
  MODIFY `MOD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sys_security_permis`
--
ALTER TABLE `sys_security_permis`
  MODIFY `PERMIS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4349;

--
-- AUTO_INCREMENT for table `sys_user`
--
ALTER TABLE `sys_user`
  MODIFY `USER_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
