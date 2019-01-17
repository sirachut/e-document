/*
Navicat MySQL Data Transfer

Source Server         : mysqltest
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : edocument

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-01-17 11:42:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for barcode
-- ----------------------------
DROP TABLE IF EXISTS `barcode`;
CREATE TABLE `barcode` (
  `BARCODE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NUM_FROM` int(11) DEFAULT NULL,
  `NUM_TO` int(11) DEFAULT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N' COMMENT 'สถานะ ของข้อมูล (N=ปกติ, D=ลบ)',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด',
  PRIMARY KEY (`BARCODE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of barcode
-- ----------------------------
INSERT INTO `barcode` VALUES ('1', '100', '159', 'N', '2019-01-16 16:06:20', null, '2019-01-16 16:06:20', null);

-- ----------------------------
-- Table structure for document
-- ----------------------------
DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `DOCUMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOCUMENT_PRIORITY` varchar(255) DEFAULT NULL,
  `DOCUMENT_ST_NUMBER` varchar(255) DEFAULT NULL,
  `DOCUMENT_NAME` varchar(255) DEFAULT NULL,
  `FACULTY_ID` int(11) DEFAULT NULL,
  `DOCUMENT_NUMBER` varchar(255) DEFAULT NULL,
  `DATE_IN` datetime DEFAULT CURRENT_TIMESTAMP,
  `DOCUMENT_TO` varchar(255) DEFAULT NULL,
  `DOCUMENT_NOTATION` varchar(255) DEFAULT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N' COMMENT 'สถานะ ของข้อมูล (N=ปกติ, D=ลบ)',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด',
  PRIMARY KEY (`DOCUMENT_ID`),
  KEY `faculty_fk` (`FACULTY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of document
-- ----------------------------
INSERT INTO `document` VALUES ('2', 'ด่วนที่สุด', 'ศธ ๐๕๘๐.๑๕/๐๒๓๙', 'ขอส่งคำสั่งคณะเทคโนโลยีสารสนเทศและการสื่อสาร ที่  ๐๕๐/๒๕๖๐ เรื่องแต่งตั้งอาจารย์ที่ปรึกษานิสิต ประจำปี ๒๕๖๐ เพื่อบันทึกฐานข้อมูลทะเบียนออนไลน์', '2', '5124', '2018-10-03 00:00:00', 'ผู้อำนวยการกองบริการศึก', '-', null, null, null, null, null);
INSERT INTO `document` VALUES ('3', 'ธรรมดา', 'ศธ ๐๕๙๐.๑๓๑๑', 'ขอส่งคำสั่งแต่งตั้งอาจารย์ที่ปรึกษานิสิตคณะเภสัชศาสตร์ ประจำปีการศึกษา ๒๕๖๐ และขอบันทึกรายชื่ออาจารย์ที่ปรึกษาลงระบบบริการการศึกษา (REG)', '4', '1122', '2018-08-15 00:00:00', 'ผู้อำนวยการกองบริการการศึกษา', '-', null, null, null, null, null);
INSERT INTO `document` VALUES ('4', 'ธรรมดา', 'ศธ ๐๕๙๐.๑๕(๕)/๐๖๔', 'ขออนุมัติลาพักการศึกษาในภาคการศึกษาต้นปีการศึกษา 2560 เป็นกรณีพิเศษ', '2', '1547', '2018-10-24 00:00:00', 'อธิการบดี', '-', null, null, null, null, null);
INSERT INTO `document` VALUES ('5', 'ธรรมดา', '4458', 'กหฟ', '2', 'กฟห', '2019-01-15 00:00:00', 'กดห', 'ดกห', 'N', '2019-01-15 13:37:17', null, '2019-01-15 13:37:17', null);

-- ----------------------------
-- Table structure for document_item
-- ----------------------------
DROP TABLE IF EXISTS `document_item`;
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
  PRIMARY KEY (`DOCUMENT_ITEM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of document_item
-- ----------------------------

-- ----------------------------
-- Table structure for mas_department
-- ----------------------------
DROP TABLE IF EXISTS `mas_department`;
CREATE TABLE `mas_department` (
  `DEPARTMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTMENT_NAME` varchar(255) DEFAULT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด',
  PRIMARY KEY (`DEPARTMENT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mas_department
-- ----------------------------
INSERT INTO `mas_department` VALUES ('1', 'งานทะเบียน', null, null, null, null, null);
INSERT INTO `mas_department` VALUES ('2', 'งานรับเข้าศึกษา', null, null, null, null, null);
INSERT INTO `mas_department` VALUES ('3', 'งานธุรการ', null, null, null, null, null);
INSERT INTO `mas_department` VALUES ('4', 'งานพัฒนาหลักสูตร', null, null, null, null, null);
INSERT INTO `mas_department` VALUES ('5', 'งานวิเทศสัมพันธ์', null, null, null, null, null);
INSERT INTO `mas_department` VALUES ('6', 'งานสนับสนุน', null, null, null, null, null);
INSERT INTO `mas_department` VALUES ('7', 'งานนวัตกรรม', null, null, null, null, null);

-- ----------------------------
-- Table structure for mas_faculty
-- ----------------------------
DROP TABLE IF EXISTS `mas_faculty`;
CREATE TABLE `mas_faculty` (
  `FACULTY_ID` smallint(6) DEFAULT NULL COMMENT 'รหัสคณะ',
  `FACULTY_CODE` varchar(5) DEFAULT NULL COMMENT 'รหัสคณะ',
  `REF_FAC_ID` varchar(5) DEFAULT NULL COMMENT 'เลขอ้างอิง รหัสคณะ',
  `HR_FAC_ID` smallint(6) DEFAULT NULL COMMENT 'รหัสคณะตามระบบ กจ.',
  `FACULTY_NAME_TH` varchar(100) DEFAULT NULL COMMENT 'ชื่อคณะ ภาษาไทย',
  `FACULTY_NAME_EN` varchar(100) DEFAULT NULL COMMENT 'ชื่อคณะ ภาษาอังกฤษ',
  `FACULTY_SHORT_NAME_TH` varchar(50) DEFAULT NULL COMMENT 'ชื่อย่อคณะ ภาษาไทย',
  `FACULTY_SHORT_NAME_EN` varchar(50) DEFAULT NULL COMMENT 'ชื่อย่อคณะ ภาษาอังกฤษ',
  `RECORD_STATUS` char(1) DEFAULT 'N',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mas_faculty
-- ----------------------------
INSERT INTO `mas_faculty` VALUES ('1', '01', '00250', '1', 'คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ', 'School of Agriculture and Natural Resources', '', 'AGI', 'N', '2017-12-13 10:00:22');
INSERT INTO `mas_faculty` VALUES ('2', '02', '00196', '2', 'คณะเทคโนโลยีสารสนเทศและการสื่อสาร', 'School of Information and Communication Technology', '', '', 'N', '2018-08-17 13:18:16');
INSERT INTO `mas_faculty` VALUES ('3', '03', '00037', '3', 'คณะนิติศาสตร์', 'School of Law', '', 'LAW', 'N', '2018-08-23 14:58:09');
INSERT INTO `mas_faculty` VALUES ('4', '04', '00048', '4', 'คณะพยาบาลศาสตร์', 'School of Nursing', '', 'NURSE', 'N', '2017-12-13 10:00:02');
INSERT INTO `mas_faculty` VALUES ('5', '14', '00247', '14', 'วิทยาลัยพลังงานและสิ่งแวดล้อม', 'School of Energy and Environment', '', '', 'N', '2018-05-09 15:21:46');
INSERT INTO `mas_faculty` VALUES ('6', '06', '00059', '6', 'คณะเภสัชศาสตร์', 'School of Pharmaceutical Sciences', '', 'PHA', 'N', '2013-11-27 08:50:41');
INSERT INTO `mas_faculty` VALUES ('7', '07', '00251', '7', 'คณะวิทยาการจัดการและสารสนเทศศาสตร์', 'School of Management and  Information Sciences', '', 'MIS', 'N', '2018-05-26 12:31:48');
INSERT INTO `mas_faculty` VALUES ('8', '09', '00248', '9', 'คณะวิทยาศาสตร์การแพทย์', 'School of Medical Sciences', '', 'MEDSCI', 'N', '2017-12-07 15:41:12');
INSERT INTO `mas_faculty` VALUES ('9', '08', '00081', '8', 'คณะวิทยาศาสตร์', 'School of Science', '', 'SCI', 'N', '2018-08-22 10:55:05');
INSERT INTO `mas_faculty` VALUES ('10', '10', '00088', '10', 'คณะวิศวกรรมศาสตร์', 'School of Engineering', '', 'ENG', 'N', '2017-12-04 15:38:45');
INSERT INTO `mas_faculty` VALUES ('11', '13', '00104', '13', 'คณะสหเวชศาสตร์', 'School of Allied Health Sciences', '', 'AHS', 'N', '2017-12-04 15:38:18');
INSERT INTO `mas_faculty` VALUES ('12', '11', '00096', '11', 'คณะศิลปศาสตร์', 'School of Liberal Arts', '', '', 'N', '2013-11-27 08:54:00');
INSERT INTO `mas_faculty` VALUES ('13', '05', '00056', '5', 'คณะแพทยศาสตร์', 'School of Medicine', '', 'MED', 'N', '2018-08-29 15:55:03');
INSERT INTO `mas_faculty` VALUES ('14', '12', '00180', '12', 'คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์', 'School of Architecture and Fine Arts', '', 'ARCH', 'N', '2018-06-15 11:23:52');
INSERT INTO `mas_faculty` VALUES ('15', '15', '00043', '15', 'วิทยาลัยการศึกษาต่อเนื่อง', 'College of Continuing Education,  University of Phayao', '', '', 'N', '2013-11-27 15:29:51');
INSERT INTO `mas_faculty` VALUES ('16', '99', '00454', null, 'สำนักบริหาร', null, '', '', 'D', null);
INSERT INTO `mas_faculty` VALUES ('17', '16', '00131', '16', 'วิทยาลัยการจัดการ', 'College of Management', '', '', 'N', '2018-08-15 11:12:35');
INSERT INTO `mas_faculty` VALUES ('18', '17', '00249', '17', 'วิทยาเขตเชียงราย', 'Chiang Rai Campus', '', '', 'N', '2016-11-16 10:11:38');
INSERT INTO `mas_faculty` VALUES ('19', '18', '', null, 'ศูนย์บริการและสนับสนุนนิสิตพิการ', 'ศูนย์บริการและสนับสนุนนิสิตพิการ', '', 'DSS', 'D', '2011-06-22 16:11:33');
INSERT INTO `mas_faculty` VALUES ('20', '19', '00023', '46', 'คณะทันตแพทยศาสตร์', 'School of Dentistry', '', '', 'N', '2018-08-27 14:59:07');
INSERT INTO `mas_faculty` VALUES ('21', '20', '01090', '51', 'วิทยาลัยการศึกษา', 'School of Education', '', '', 'N', '2018-02-19 10:50:17');
INSERT INTO `mas_faculty` VALUES ('22', '21', '00068', '57', 'คณะรัฐศาสตร์และสังคมศาสตร์', 'School of Political and Social Science', '', '', 'N', '2017-12-08 13:48:23');
INSERT INTO `mas_faculty` VALUES ('23', '22', '00113', null, 'โครงการจัดตั้งคณะสาธารณสุขศาสตร์', 'โครงการจัดตั้งคณะสาธารณสุขศาสตร์', '', '', 'N', '2014-11-06 11:49:14');

-- ----------------------------
-- Table structure for mas_status
-- ----------------------------
DROP TABLE IF EXISTS `mas_status`;
CREATE TABLE `mas_status` (
  `STATUS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_NAME` varchar(255) NOT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N' COMMENT 'สถานะ ของข้อมูล (N=ปกติ, D=ลบ)',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด',
  PRIMARY KEY (`STATUS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mas_status
-- ----------------------------
INSERT INTO `mas_status` VALUES ('1', 'เสร็จสิ้น', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('2', 'รับ', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('3', 'คืน', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('4', 'แก้ไข', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('5', 'รอดำเนินการ', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('6', 'เป็นมายังไงไม่รู้เลย', null, null, null, null, null);

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `USER_ID` varchar(13) NOT NULL,
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
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด',
  PRIMARY KEY (`USER_ID`),
  KEY `fk_m_user_mc_faculty` (`FACULTY_ID`),
  KEY `fk_md_user_md_security_group1` (`DEPARTMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES ('1234567897894', null, 'ddddddddaaa', 'namngern.chd', null, null, null, null, null, 'T', null, 'N', '2019-01-15 16:02:44', null, '2019-01-15 16:02:44', null);
INSERT INTO `sys_user` VALUES ('1515151515151', null, 'ds2', 'tqf-demo2', null, null, null, null, null, 'T', null, 'N', '2019-01-15 15:27:47', null, '2019-01-15 15:27:47', null);
INSERT INTO `sys_user` VALUES ('1560100164866', '1234', 'pathompong.bo', 'pathompong.bo', null, '1', '00525145245', '02154155', null, '', null, 'N', '2019-01-15 14:47:11', null, '2019-01-15 14:47:11', null);
