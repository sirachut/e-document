/*
Navicat MySQL Data Transfer

Source Server         : mysqltest
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : edocument

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-02-08 16:17:42
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
  `PRINT_STATUS` char(1) DEFAULT 'F',
  PRIMARY KEY (`BARCODE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of barcode
-- ----------------------------
INSERT INTO `barcode` VALUES ('1', '100', '159', 'D', '2019-01-16 16:06:20', null, '2019-01-16 16:06:20', null, 'T');
INSERT INTO `barcode` VALUES ('2', '160', '219', 'D', '2019-01-22 11:28:33', null, '2019-01-22 11:28:33', null, 'T');
INSERT INTO `barcode` VALUES ('3', '220', '279', 'N', '2019-01-22 11:29:54', null, '2019-01-22 11:29:54', null, 'F');
INSERT INTO `barcode` VALUES ('4', '280', '339', 'D', '2019-01-22 11:31:41', null, '2019-01-22 11:31:41', null, 'F');
INSERT INTO `barcode` VALUES ('5', '280', '339', 'N', '2019-01-22 11:37:25', null, '2019-01-22 11:37:25', null, 'F');
INSERT INTO `barcode` VALUES ('6', '340', '399', 'N', '2019-01-22 13:06:43', null, '2019-01-22 13:06:43', null, 'T');
INSERT INTO `barcode` VALUES ('7', '400', '459', 'N', '2019-01-23 11:03:36', null, '2019-01-23 11:03:36', null, 'T');
INSERT INTO `barcode` VALUES ('8', '460', '519', 'N', '2019-01-23 11:14:57', null, '2019-01-23 11:14:57', null, 'F');
INSERT INTO `barcode` VALUES ('9', '520', '579', 'N', '2019-01-23 11:14:58', null, '2019-01-23 11:14:58', null, 'F');
INSERT INTO `barcode` VALUES ('10', '580', '639', 'N', '2019-01-23 11:15:01', null, '2019-01-23 11:15:01', null, 'F');
INSERT INTO `barcode` VALUES ('11', '640', '699', 'N', '2019-01-23 11:15:03', null, '2019-01-23 11:15:03', null, 'F');
INSERT INTO `barcode` VALUES ('12', '700', '759', 'N', '2019-01-23 11:15:04', null, '2019-01-23 11:15:04', null, 'F');
INSERT INTO `barcode` VALUES ('13', '760', '819', 'N', '2019-01-23 11:15:07', null, '2019-01-23 11:15:07', null, 'F');
INSERT INTO `barcode` VALUES ('14', '820', '879', 'N', '2019-01-23 11:15:09', null, '2019-01-23 11:15:09', null, 'F');
INSERT INTO `barcode` VALUES ('15', '880', '939', 'N', '2019-01-23 11:15:10', null, '2019-01-23 11:15:10', null, 'T');
INSERT INTO `barcode` VALUES ('16', '940', '999', 'D', '2019-01-23 11:15:12', null, '2019-01-23 11:15:12', null, 'F');
INSERT INTO `barcode` VALUES ('17', '940', '999', 'N', '2019-01-29 12:03:28', null, '2019-01-29 12:03:28', null, 'T');

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
  `FACULTY_DEPRATMENT` varchar(255) DEFAULT NULL,
  `FACULTY_TEL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`DOCUMENT_ID`),
  KEY `faculty_fk` (`FACULTY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of document
-- ----------------------------
INSERT INTO `document` VALUES ('4', 'ธรรมดา', 'ศธ ๐๕๙๐.๑๕(๕)/๐๖๔', 'ขออนุมัติลาพักการศึกษาในภาคการศึกษาต้นปีการศึกษา 2560 เป็นกรณีพิเศษ', '2', '1547', '2018-10-24 00:00:00', 'อธิการบดี', '-', 'D', null, null, null, null, null, null);
INSERT INTO `document` VALUES ('5', 'ธรรมดา', '4458', 'กหฟ', '2', 'กฟห', '2019-01-15 00:00:00', 'กดห', 'ดกห', 'D', '2019-01-15 13:37:17', null, '2019-01-15 13:37:17', null, null, null);
INSERT INTO `document` VALUES ('6', 'ด่วน', '0500212/21254', null, null, '000000101', '2019-01-18 16:33:45', null, null, 'D', '2019-01-18 16:33:45', null, '2019-01-18 16:33:45', null, null, null);
INSERT INTO `document` VALUES ('7', 'ด่วนจ๊ะ', '456/45', null, null, '000000153', '2019-01-18 16:35:48', null, null, 'D', '2019-01-18 16:35:48', null, '2019-01-18 16:35:48', null, null, null);
INSERT INTO `document` VALUES ('8', 'ytrtr', 'tr645', null, null, '000000101', '2019-01-21 12:48:44', null, null, 'D', '2019-01-21 12:48:44', null, '2019-01-21 12:48:44', null, null, null);
INSERT INTO `document` VALUES ('9', 'ด่วน', '0505825/1245', null, null, '000000101', '2019-01-21 14:27:45', null, null, 'D', '2019-01-21 14:27:45', null, '2019-01-21 14:27:45', null, null, null);
INSERT INTO `document` VALUES ('10', 'ด่วน', '0505825/1245', null, null, '000000101', '2019-01-21 14:28:53', null, null, 'D', '2019-01-21 14:28:53', null, '2019-01-21 14:28:53', null, null, null);
INSERT INTO `document` VALUES ('11', 'ด่วน', '456/45', null, null, '000000153', '2019-01-21 14:36:27', null, null, 'D', '2019-01-21 14:36:27', null, '2019-01-21 14:36:27', null, null, null);
INSERT INTO `document` VALUES ('12', 'ด่วน', '456/45', null, null, '000000153', '2019-01-21 14:40:02', null, null, 'D', '2019-01-21 14:40:02', null, '2019-01-21 14:40:02', null, null, null);
INSERT INTO `document` VALUES ('13', 'ด่วน', '45', null, null, '000000101', '2019-01-21 14:43:34', null, null, 'D', '2019-01-21 14:43:34', null, '2019-01-21 14:43:34', null, null, null);
INSERT INTO `document` VALUES ('14', 'ด่วน', '45', null, null, '000000101', '2019-01-21 14:43:56', null, null, 'D', '2019-01-21 14:43:56', null, '2019-01-21 14:43:56', null, null, null);
INSERT INTO `document` VALUES ('15', 'dsa', 'das', null, null, '000000153', '2019-01-21 14:44:08', null, null, 'D', '2019-01-21 14:44:08', null, '2019-01-21 14:44:08', null, null, null);
INSERT INTO `document` VALUES ('16', 'dsa', 'das', null, null, '000000153', '2019-01-21 14:48:48', null, null, 'D', '2019-01-21 14:48:48', null, '2019-01-21 14:48:48', null, null, null);
INSERT INTO `document` VALUES ('17', 'dsa', 'das', null, null, '000000153', '2019-01-21 14:53:07', null, null, 'D', '2019-01-21 14:53:07', null, '2019-01-21 14:53:07', null, null, null);
INSERT INTO `document` VALUES ('21', 'on', '0500212/21254', 'เปิดรายวิชา', '2', null, '2019-02-08 15:51:43', null, null, 'N', '2019-02-08 15:51:43', null, '2019-02-08 15:51:43', null, null, '2287');

-- ----------------------------
-- Table structure for document_item
-- ----------------------------
DROP TABLE IF EXISTS `document_item`;
CREATE TABLE `document_item` (
  `DOCUMENT_ITEM_ID` int(6) NOT NULL AUTO_INCREMENT,
  `STATUS_ID` int(4) DEFAULT NULL,
  `DATE_IN` datetime DEFAULT NULL,
  `DEPARTMENT_ID` int(4) NOT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N' COMMENT 'สถานะ ของข้อมูล (N=ปกติ, D=ลบ)',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด',
  `DATE_OUT` datetime DEFAULT NULL,
  `ROUTE_NO` int(4) DEFAULT NULL COMMENT 'ลำดับเส้นทางเอกสาร',
  `DETAIL` varchar(255) DEFAULT NULL,
  `DOCUMENT_ID` int(5) DEFAULT NULL,
  PRIMARY KEY (`DOCUMENT_ITEM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of document_item
-- ----------------------------
INSERT INTO `document_item` VALUES ('43', '2', '2019-02-08 15:53:10', '8', 'N', '2019-02-08 15:53:50', null, '2019-02-08 15:53:50', null, null, '1', '', '21');

-- ----------------------------
-- Table structure for hrd_mas_faculty
-- ----------------------------
DROP TABLE IF EXISTS `hrd_mas_faculty`;
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

-- ----------------------------
-- Records of hrd_mas_faculty
-- ----------------------------
INSERT INTO `hrd_mas_faculty` VALUES ('1', '01', 'คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ', 'School of Agriculture and Natural Resources', '1', '1', '1', 'N', '2012-09-20 11:35:33');
INSERT INTO `hrd_mas_faculty` VALUES ('2', '02', 'คณะเทคโนโลยีสารสนเทศและการสื่อสาร', 'School of Information and Communication Technology', '1', '1', '1', 'N', '2012-05-03 16:42:45');
INSERT INTO `hrd_mas_faculty` VALUES ('3', '03', 'คณะนิติศาสตร์', 'School of Law', '1', '1', '1', 'N', '2012-05-03 16:43:32');
INSERT INTO `hrd_mas_faculty` VALUES ('4', '04', 'คณะพยาบาลศาสตร์', 'School of Nursing', '1', '1', '1', 'N', '2012-05-03 16:44:56');
INSERT INTO `hrd_mas_faculty` VALUES ('5', '05', 'คณะแพทยศาสตร์', 'School of Medicine', '1', '1', '1', 'N', '2012-05-03 16:46:31');
INSERT INTO `hrd_mas_faculty` VALUES ('6', '06', 'คณะเภสัชศาสตร์', 'School of Pharmacy', '1', '1', '1', 'N', '2012-05-03 16:49:17');
INSERT INTO `hrd_mas_faculty` VALUES ('7', '07', 'คณะวิทยาการจัดการและสารสนเทศศาสตร์', 'School of Management and Information Sciences', '1', '1', '1', 'N', '2012-05-04 13:23:15');
INSERT INTO `hrd_mas_faculty` VALUES ('8', '08', 'คณะวิทยาศาสตร์', 'School of Science', '1', '1', '1', 'N', '2012-05-03 16:53:30');
INSERT INTO `hrd_mas_faculty` VALUES ('9', '09', 'คณะวิทยาศาสตร์การแพทย์', 'School of Science', '1', '1', '1', 'N', '2012-05-04 13:22:22');
INSERT INTO `hrd_mas_faculty` VALUES ('10', '10', 'คณะวิศวกรรมศาสตร์', 'School of Engineering', '1', '1', '1', 'N', '2012-05-03 17:04:40');
INSERT INTO `hrd_mas_faculty` VALUES ('11', '11', 'คณะศิลปศาสตร์', 'School of Liberal Arts', '1', '1', '1', 'N', '2012-05-03 17:06:47');
INSERT INTO `hrd_mas_faculty` VALUES ('12', '12', 'คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์', 'School of Architecture and Fine Arts', '1', '1', '1', 'N', '2012-05-03 17:12:30');
INSERT INTO `hrd_mas_faculty` VALUES ('13', '13', 'คณะสหเวชศาสตร์', 'School of Allied Health Science', '1', '1', '1', 'N', '2012-05-03 17:14:34');
INSERT INTO `hrd_mas_faculty` VALUES ('14', '14', 'วิทยาลัยพลังงานและสิ่งแวดล้อม', 'School of Energy and Environment', '1', '1', '2', 'N', '2012-05-03 17:16:37');
INSERT INTO `hrd_mas_faculty` VALUES ('15', '15', 'วิทยาลัยการศึกษาต่อเนื่อง', 'College of Continuing Education', '1', '1', '2', 'N', '2014-10-16 15:21:09');
INSERT INTO `hrd_mas_faculty` VALUES ('16', '16', 'วิทยาลัยการจัดการ', 'College of Management Bangkok', '3', '1', '2', 'N', '2013-07-24 11:33:41');
INSERT INTO `hrd_mas_faculty` VALUES ('17', '17', 'วิทยาเขตเชียงราย', 'Chiangrai Campus', '2', '1', '2', 'N', '2014-03-28 10:53:39');
INSERT INTO `hrd_mas_faculty` VALUES ('19', '19', 'กองกลาง', 'Division Affairs of General', '1', '2', '3', 'N', '2012-05-04 13:33:44');
INSERT INTO `hrd_mas_faculty` VALUES ('20', '20', 'กองการเจ้าหน้าที่', 'Division of Personnel', '1', '2', '3', 'N', '2012-05-04 13:35:25');
INSERT INTO `hrd_mas_faculty` VALUES ('21', '21', 'กองกิจการนิสิต', 'Division of Student Affairs', '1', '2', '3', 'N', '2012-05-04 13:36:34');
INSERT INTO `hrd_mas_faculty` VALUES ('22', '22', 'กองคลัง', 'Division of Finance and Inventory', '1', '2', '3', 'N', '2012-05-04 13:37:44');
INSERT INTO `hrd_mas_faculty` VALUES ('23', '23', 'กองแผนงาน', 'Division of Planning', '1', '2', '3', 'N', '2012-05-04 13:45:05');
INSERT INTO `hrd_mas_faculty` VALUES ('24', '24', 'กองอาคารสถานที่', 'กองอาคารสถานที่', '1', '2', '3', 'N', '2012-05-04 13:40:51');
INSERT INTO `hrd_mas_faculty` VALUES ('25', '25', 'กองบริหารงานวิจัยและประกันคุณภาพการศึกษา', 'Division of Research Administration and Education Quality', '1', '2', '3', 'N', '2012-05-04 14:53:27');
INSERT INTO `hrd_mas_faculty` VALUES ('26', '26', 'กองบริการการศึกษา', 'Division of Educational Service', '1', '2', '3', 'N', '2012-05-04 13:44:24');
INSERT INTO `hrd_mas_faculty` VALUES ('27', '27', 'ศูนย์บรรณสารและสื่อการศึกษา', 'The Center for Library Resources and Education Medias', '1', '2', '3', 'N', '2012-05-04 14:43:12');
INSERT INTO `hrd_mas_faculty` VALUES ('28', '28', 'ศูนย์บริการเทคโนโลยีสารสนเทศและการสื่อสาร', 'Center for Information Technology and Communication Services', '1', '2', '3', 'N', '2012-05-04 14:46:45');
INSERT INTO `hrd_mas_faculty` VALUES ('29', '29', 'ศูนย์ให้บริการและสนับสนุนนิสิตพิการ', 'ศูนย์ให้บริการและสนับสนุนนิสิตพิการ', '1', '2', '3', 'N', '2012-05-04 14:53:07');
INSERT INTO `hrd_mas_faculty` VALUES ('30', '30', 'โครงการจัดตั้งศูนย์ศิลปวัฒนธรรมล้านนา (ไต)', 'โครงการจัดตั้งศูนย์ศิลปวัฒนธรรมล้านนา (ไต)', '1', '2', '3', 'N', '2012-12-20 10:54:07');
INSERT INTO `hrd_mas_faculty` VALUES ('31', '31', 'โครงการจัดตั้งศูนย์ภาษา', 'โครงการจัดตั้งศูนย์ภาษา', '1', '2', '3', 'N', '2012-05-04 14:52:01');
INSERT INTO `hrd_mas_faculty` VALUES ('32', '32', 'โครงการจัดตั้งศูนย์บ่มเพาะวิสาหกิจมหาวิทยาลัยพะเยา', 'โครงการจัดตั้งศูนย์บ่มเพาะวิสาหกิจมหาวิทยาลัยพะเยา', '1', '2', '3', 'N', '2012-05-04 14:54:37');
INSERT INTO `hrd_mas_faculty` VALUES ('33', '33', 'โครงการจัดตั้งศูนย์ภูมิภาคเทคโนโลยีอวกาศและภูมิสารสนเทศภาคเหนือ', 'โครงการจัดตั้งศูนย์ภูมิภาคเทคโนโลยีอวกาศและภูมิสารสนเทศภาคเหนือ', '1', '2', '3', 'N', '2012-05-04 14:54:54');
INSERT INTO `hrd_mas_faculty` VALUES ('34', '34', 'หน่วยตรวจสอบภายใน', 'Internal Audit Section', '1', ' ', ' ', 'N', '2012-05-04 14:55:19');
INSERT INTO `hrd_mas_faculty` VALUES ('35', '35', 'สำนักงานสภามหาวิทยาลัยพะเยา', 'Office of University of Phayao Council', '1', ' ', ' ', 'N', '2012-05-04 14:07:37');
INSERT INTO `hrd_mas_faculty` VALUES ('36', '99', 'สำนักบริหาร', null, '1', '2', '3', 'N', '2017-10-09 11:03:57');
INSERT INTO `hrd_mas_faculty` VALUES ('44', '37', 'โครงการจัดตั้งศูนย์การเรียนรู้ทางอิเล็กทรอนิกส์', 'E-Learning Center', null, null, null, 'N', '2012-05-04 14:36:52');
INSERT INTO `hrd_mas_faculty` VALUES ('45', '36', 'โรงเรียนสาธิตมหาวิทยาลัยพะเยา', 'Demonstration School University Phayao', null, '1', '1', 'N', '2012-05-04 14:09:13');
INSERT INTO `hrd_mas_faculty` VALUES ('46', '38', 'คณะทันตแพทยศาสตร์', 'คณะทันตแพทยศาสตร์', '1', '1', '1', 'N', '2012-10-16 10:08:57');
INSERT INTO `hrd_mas_faculty` VALUES ('47', '39', 'หน่วยธาลัสซีเมีย', 'หน่วยธาลัสซีเมีย', '1', '2', '3', 'N', '2014-10-14 15:29:02');
INSERT INTO `hrd_mas_faculty` VALUES ('49', '40', 'หน่วยเทคโนโลยีชีวภาพ', 'หน่วยเทคโนโลยีชีวภาพ', '1', '2', '3', 'N', '2012-10-16 10:08:32');
INSERT INTO `hrd_mas_faculty` VALUES ('50', '41', 'หน่วยปฏิบัติการวิชาชีพการโรงแรมและการท่องเที่ยว', 'หน่วยปฏิบัติการวิชาชีพการโรงแรมและการท่องเที่ยว', '1', '2', '3', 'N', '2013-08-27 11:01:22');
INSERT INTO `hrd_mas_faculty` VALUES ('51', '42', 'วิทยาลัยการศึกษา', 'วิทยาลัยการศึกษา', '1', '1', '2', 'N', '2013-11-11 11:58:31');
INSERT INTO `hrd_mas_faculty` VALUES ('52', '43', 'ศูนย์วิจัยสัตว์ทดลอง', null, '1', '2', '3', 'N', '2014-10-20 15:08:53');
INSERT INTO `hrd_mas_faculty` VALUES ('53', '44', 'อุทยานวิทยาศาสตร์ มหาวิทยาลัยพะเยา', null, '1', '2', '3', 'N', '2014-03-28 10:26:49');
INSERT INTO `hrd_mas_faculty` VALUES ('54', '45', 'ศูนย์เครื่องมือกลาง', null, '1', '2', '3', 'N', '2014-03-28 10:51:59');
INSERT INTO `hrd_mas_faculty` VALUES ('55', '46', 'ศูนย์บ่มเพาะวิสาหกิจ มหาวิทยาลัยพะเยา', null, '1', '2', '3', 'N', '2014-03-28 10:48:22');
INSERT INTO `hrd_mas_faculty` VALUES ('56', '47', 'ศูนย์เครือข่ายความร่วมมือ เพื่อพัฒนาเชิงพื้นที่แบบสร้างสรรค์', null, '1', '2', '3', 'N', '2014-03-28 10:51:32');
INSERT INTO `hrd_mas_faculty` VALUES ('18', '18', 'ศูนย์บริการและสนับสนุนนิสิตพิการ', 'ศูนย์บริการและสนับสนุนนิสิตพิการ', '1', '1', '1', 'D', '2012-08-30 16:53:10');
INSERT INTO `hrd_mas_faculty` VALUES ('39', null, 'ผู้บริหาร', null, null, null, null, 'D', '2013-01-03 08:24:09');
INSERT INTO `hrd_mas_faculty` VALUES ('40', null, 'ส่วนงานปฏิบัติการ', null, null, null, null, 'D', '2013-01-03 08:24:24');
INSERT INTO `hrd_mas_faculty` VALUES ('41', null, 'รองอธิการบดีฝ่ายกิจการพิเศษ', null, null, null, null, 'D', '2013-01-03 08:24:30');
INSERT INTO `hrd_mas_faculty` VALUES ('42', null, 'มหาวิทยาลัยพะเยา', null, null, null, null, 'D', '2013-01-03 08:24:36');
INSERT INTO `hrd_mas_faculty` VALUES ('43', null, 'รองอธิการบดี', null, null, null, null, 'D', '2013-01-03 08:24:42');
INSERT INTO `hrd_mas_faculty` VALUES ('48', '100', 'ทดสอบ', 'test', null, null, null, 'D', '2012-10-15 13:17:20');
INSERT INTO `hrd_mas_faculty` VALUES ('57', '48', 'คณะรัฐศาสตร์และสังคมศาสตร์', 'คณะรัฐศาสตร์และสังคมศาสตร์', '1', '1', '1', 'N', '2014-10-30 09:39:05');
INSERT INTO `hrd_mas_faculty` VALUES ('58', '49', 'หน่วยบริหารความเสี่ยง', null, '1', '2', '3', 'N', '2014-10-13 10:41:23');
INSERT INTO `hrd_mas_faculty` VALUES ('59', '50', 'ศูนย์การแพทย์และโรงพยาบาลมหาวิทยาลัยพะเยา', null, '1', '1', '1', 'N', '2016-11-03 09:57:40');
INSERT INTO `hrd_mas_faculty` VALUES ('60', '51', 'ศูนย์พัฒนาทรัพยากรมนุษย์ด้านเทคโนโลยีสารสนเทศและการสื่อสาร', null, '1', '2', '3', 'N', '2017-05-16 15:08:38');
INSERT INTO `hrd_mas_faculty` VALUES ('61', '52', 'สำนักงานอธิการบดีมหาวิทยาลัยพะเยา', null, '1', '2', '1', 'N', '2018-07-10 15:44:04');
INSERT INTO `hrd_mas_faculty` VALUES ('62', '53', 'ศูนย์ศึกษาเศรษฐกิจพอเพียงการเกษตรและความอยู่รอดของมนุษยชาติ มหาวิทยาลัยพะเยา', 'ศูนย์ศึกษาเศรษฐกิจพอเพียงการเกษตรและความอยู่รอดของมนุษยชาติ มหาวิทยาลัยพะเยา', '1', '2', '3', 'N', '2018-08-10 15:48:55');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mas_status
-- ----------------------------
INSERT INTO `mas_status` VALUES ('1', 'ส่ง', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('2', 'รับ', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('3', 'คืน', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('4', 'แก้ไข', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('5', 'รอดำเนินการ', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('6', 'เสร็จสิ้น', null, null, null, null, null);
INSERT INTO `mas_status` VALUES ('7', 'กำลังดำเนินการ', 'N', '2019-02-04 15:35:03', null, '2019-02-04 15:35:03', null);

-- ----------------------------
-- Table structure for sys_department
-- ----------------------------
DROP TABLE IF EXISTS `sys_department`;
CREATE TABLE `sys_department` (
  `DEPARTMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTMENT_NAME` varchar(255) DEFAULT NULL,
  `RECORD_STATUS` char(1) DEFAULT 'N',
  `CREATE_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่สร้างข้อมูล',
  `CREATE_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่สร้างข้อมูล',
  `LAST_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไขล่าสุด',
  `LAST_USER` varchar(50) DEFAULT NULL COMMENT 'ผู้ใช้ที่แก้ไขล่าสุด',
  PRIMARY KEY (`DEPARTMENT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_department
-- ----------------------------
INSERT INTO `sys_department` VALUES ('8', 'งานธุรการ', 'N', '2019-02-06 16:09:30', null, '2019-02-06 16:09:30', null);
INSERT INTO `sys_department` VALUES ('9', 'งานทะเบียน', 'N', '2019-02-06 16:09:43', null, '2019-02-06 16:09:43', null);
INSERT INTO `sys_department` VALUES ('10', 'ผู้อำนวยการกองบริการการศึกษา', 'N', '2019-02-06 16:10:38', null, '2019-02-06 16:10:38', null);

-- ----------------------------
-- Table structure for sys_module
-- ----------------------------
DROP TABLE IF EXISTS `sys_module`;
CREATE TABLE `sys_module` (
  `MOD_ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `LAST_USER` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MOD_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_module
-- ----------------------------
INSERT INTO `sys_module` VALUES ('1', null, 'เอกสาร', '', '0', '1', null, 'T', 'N', null, null, null, null);
INSERT INTO `sys_module` VALUES ('2', null, 'Barcode', '/barcode', '0', '2', null, 'T', 'N', null, null, null, null);
INSERT INTO `sys_module` VALUES ('3', '1', 'รายการเอกสาร', '/documents', '1', '1', null, 'T', 'N', null, null, null, null);
INSERT INTO `sys_module` VALUES ('4', '1', 'รับเอกสาร', '/receive', '1', '2', null, 'T', 'N', '2019-02-06 16:12:09', null, '2019-02-06 16:12:09', null);
INSERT INTO `sys_module` VALUES ('5', '1', 'ส่งเอกสาร', '/sent', '1', '3', null, 'T', 'N', '2019-02-06 16:12:30', null, '2019-02-06 16:12:30', null);
INSERT INTO `sys_module` VALUES ('6', '1', 'ผอ.ลงนามแล้ว', '/sent', '1', '4', null, 'T', 'N', '2019-02-07 10:56:42', null, '2019-02-07 10:56:42', null);
INSERT INTO `sys_module` VALUES ('7', '1', 'ผอ.ลงนามแล้ว(แทน)', '/sent/10', '1', '5', null, 'T', 'N', '2019-02-07 13:15:12', null, '2019-02-07 13:15:12', null);
INSERT INTO `sys_module` VALUES ('8', '1', 'ดำเนินการเสร็จสิ้น', '/done', '1', '6', null, 'T', 'N', '2019-02-07 14:41:38', null, '2019-02-07 14:41:38', null);

-- ----------------------------
-- Table structure for sys_security_permis
-- ----------------------------
DROP TABLE IF EXISTS `sys_security_permis`;
CREATE TABLE `sys_security_permis` (
  `PERMIS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTMENT_ID` int(11) NOT NULL,
  `MOD_ID` int(11) NOT NULL,
  `ACTION_ADD` char(1) DEFAULT NULL,
  `ACTION_EDIT` char(1) DEFAULT NULL,
  `ACTION_DEL` char(1) DEFAULT NULL,
  `ACTION_VIEW` char(1) DEFAULT NULL,
  PRIMARY KEY (`PERMIS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4365 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_security_permis
-- ----------------------------
INSERT INTO `sys_security_permis` VALUES ('4349', '8', '1', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4350', '8', '2', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4351', '8', '3', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4352', '8', '4', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4353', '8', '5', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4354', '9', '1', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4355', '9', '2', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4356', '9', '3', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4357', '9', '4', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4358', '9', '5', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4360', '10', '4', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4361', '10', '1', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4362', '10', '6', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4363', '8', '7', 'T', 'T', 'T', 'T');
INSERT INTO `sys_security_permis` VALUES ('4364', '8', '8', null, null, null, null);

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `USER_ID` int(4) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES ('1', '1560100164866', 'นายปฐมพงศ์ บุญมา', 'pathompong.bo', '2', '8,9,10', '-', '0855986156', null, 'T', null, 'N', '2019-01-25 10:25:32', null, '2019-01-25 10:25:32', null);
INSERT INTO `sys_user` VALUES ('2', '1234567897854', 'Edoc', 'edoctest', '2', '8,9,10', '-', '121212', null, 'T', null, 'N', '2019-01-25 11:15:29', null, '2019-01-25 11:15:29', null);

-- ----------------------------
-- View structure for vw_document
-- ----------------------------
DROP VIEW IF EXISTS `vw_document`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `vw_document` AS SELECT
document.DOCUMENT_ID,
document.DOCUMENT_PRIORITY,
document.DOCUMENT_ST_NUMBER,
document.DOCUMENT_NAME,
document.FACULTY_ID,
document.DOCUMENT_NUMBER,
document.DATE_IN,
document.DOCUMENT_TO,
document.DOCUMENT_NOTATION,
document.RECORD_STATUS,
document.CREATE_DATE,
document.CREATE_USER,
document.LAST_DATE,
document.LAST_USER,
hrd_mas_faculty.FACULTY_NAME_TH,
hrd_mas_faculty.FACULTY_NAME_EN
FROM
document
LEFT JOIN hrd_mas_faculty ON hrd_mas_faculty.FACULTY_ID = document.FACULTY_ID
WHERE
document.RECORD_STATUS = 'N' ;

-- ----------------------------
-- View structure for vw_document_item
-- ----------------------------
DROP VIEW IF EXISTS `vw_document_item`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vw_document_item` AS SELECT
document.DOCUMENT_ID,
document.DOCUMENT_PRIORITY,
document.DOCUMENT_ST_NUMBER,
document.DOCUMENT_NAME,
document.FACULTY_ID,
document.DOCUMENT_NUMBER,
document.DATE_IN,
document.DOCUMENT_TO,
document.DOCUMENT_NOTATION,
document.RECORD_STATUS,
document.CREATE_DATE,
document.CREATE_USER,
document.LAST_DATE,
document.LAST_USER,
document_item.DOCUMENT_ITEM_ID,
mas_status.STATUS_NAME,
mas_status.STATUS_ID,
document_item.DATE_IN AS ITEM_DATE_IN,
document_item.DEPARTMENT_ID,
document_item.DATE_OUT AS ITEM_DATE_OUT,
document_item.ROUTE_NO,
document_item.DETAIL,
document_item.CREATE_DATE AS ITEM_CREATE_DATE,
document_item.CREATE_USER AS ITEM_CREATE_USER,
document_item.LAST_DATE AS ITEM_LAST_DATE,
document_item.LAST_USER AS ITEM_LAST_USER,
CASE  WHEN document_item.DATE_IN is not null  and document_item.DATE_OUT is not null  THEN 'T' 
			WHEN document_item.DATE_IN is null  and document_item.DATE_OUT is  null  THEN 'S' 
			WHEN document_item.DATE_IN is NOT null  and document_item.DATE_OUT is  null  THEN 'R'
      ELSE 'F'END as CKT,
sys_department.DEPARTMENT_NAME
FROM
document
INNER JOIN document_item ON document.DOCUMENT_ID = document_item.DOCUMENT_ID and document.RECORD_STATUS = 'N' AND document_item.RECORD_STATUS = 'N' 
LEFT JOIN mas_status ON mas_status.STATUS_ID = document_item.STATUS_ID 
LEFT JOIN sys_department ON sys_department.DEPARTMENT_ID= document_item.DEPARTMENT_ID ;

-- ----------------------------
-- View structure for vw_sys_security_permis
-- ----------------------------
DROP VIEW IF EXISTS `vw_sys_security_permis`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vw_sys_security_permis` AS SELECT
sys_security_permis.DEPARTMENT_ID,
sys_security_permis.PERMIS_ID,
sys_security_permis.ACTION_ADD,
sys_security_permis.ACTION_EDIT,
sys_security_permis.ACTION_DEL,
sys_security_permis.ACTION_VIEW,
sys_module.MOD_ID,
sys_module.MOD_NAME,
sys_module.MOD_PARENT_ID,
sys_module.MOD_ORDER,
sys_module.MOD_LEVEL,
sys_module.MOD_PAGE,
sys_module.IS_ACTIVE,
sys_module.CREATE_DATE,
sys_module.CREATE_USER,
sys_module.LAST_DATE,
sys_module.LAST_USER,
sys_department.DEPARTMENT_NAME
FROM
sys_module
INNER JOIN sys_security_permis ON sys_security_permis.MOD_ID = sys_module.MOD_ID AND sys_module.RECORD_STATUS = 'N'
INNER JOIN sys_department ON sys_department.DEPARTMENT_ID = sys_security_permis.DEPARTMENT_ID ;
