/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : school

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-04-22 23:00:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `accountings`
-- ----------------------------
DROP TABLE IF EXISTS `accountings`;
CREATE TABLE `accountings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) DEFAULT NULL,
  `debit_credit` tinyint(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of accountings
-- ----------------------------
INSERT INTO `accountings` VALUES ('1', '1000', '0', 'Bappy', '1', '2016-02-15', '2016-02-15 22:04:46', '2016-02-16 08:21:12');
INSERT INTO `accountings` VALUES ('2', '200', '0', 'Bappy', '4', '2016-02-15', '2016-02-15 22:08:10', '2016-02-16 08:23:40');
INSERT INTO `accountings` VALUES ('3', '400', '1', 'Bappy', '3', '2016-02-15', '2016-02-15 22:19:38', '2016-02-16 08:25:28');
INSERT INTO `accountings` VALUES ('4', '123', '1', 'ASDF', '5', '2016-02-16', '2016-02-15 23:11:27', '2016-02-16 08:26:00');

-- ----------------------------
-- Table structure for `calendar_entries`
-- ----------------------------
DROP TABLE IF EXISTS `calendar_entries`;
CREATE TABLE `calendar_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `entry` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of calendar_entries
-- ----------------------------
INSERT INTO `calendar_entries` VALUES ('1', '2016-02-21', 'International Mother Language Day', 'International Mother Language Day', '2016-02-12 22:32:07', '2016-02-12 22:38:29');
INSERT INTO `calendar_entries` VALUES ('2', '2016-02-25', 'Test', 'This is for test purpose', '2016-02-12 22:32:07', '2016-02-12 22:32:07');

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debit_credit` tinyint(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '0', 'Electricity', '2016-02-16 07:54:46', '2016-02-16 07:54:46');
INSERT INTO `categories` VALUES ('2', '0', 'Teacher\'s Salary', '2016-02-16 07:56:38', '2016-02-16 07:56:38');
INSERT INTO `categories` VALUES ('3', '1', 'Student\'s Monthly Fee', '2016-02-16 07:57:11', '2016-02-16 07:57:11');
INSERT INTO `categories` VALUES ('4', '0', 'T.A.D.A.', '2016-02-16 07:58:50', '2016-02-16 07:58:50');
INSERT INTO `categories` VALUES ('5', '1', 'Admission Fees', '2016-02-16 08:05:55', '2016-02-16 08:06:06');

-- ----------------------------
-- Table structure for `class_names`
-- ----------------------------
DROP TABLE IF EXISTS `class_names`;
CREATE TABLE `class_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `book_list` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class_names
-- ----------------------------
INSERT INTO `class_names` VALUES ('1', 'à¦ªà§à¦°à¦¥à¦®', '1', '1461250926564.pdf', '2016-02-14 07:36:38', '2016-04-21 17:02:06');
INSERT INTO `class_names` VALUES ('2', 'à¦¦à§à¦¬à¦¿à¦¤à§€à§Ÿ', '1', null, '2016-02-13 19:15:18', '2016-02-14 17:47:30');
INSERT INTO `class_names` VALUES ('3', 'à¦¤à§ƒà¦¤à§€à§Ÿ', '1', null, '2016-02-13 19:15:53', '2016-02-14 17:47:39');

-- ----------------------------
-- Table structure for `general`
-- ----------------------------
DROP TABLE IF EXISTS `general`;
CREATE TABLE `general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `chairman` longtext,
  `chairman_photo` varchar(255) DEFAULT NULL,
  `headmaster` longtext,
  `headmaster_photo` varchar(255) DEFAULT NULL,
  `governing` longtext,
  `about` longtext,
  `purpose` longtext,
  `online_admission_on` tinyint(1) DEFAULT NULL,
  `admission_msg` text,
  `phone` varchar(11) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of general
-- ----------------------------
INSERT INTO `general` VALUES ('1', 'à§§à§¨à§§ à¦²à§‹à§Ÿà¦¾à¦° à¦¯à¦¶à§‹à¦° à¦°à§‹à¦¡', 'à¦¦à§Œà¦²à¦¤à¦ªà§à¦°, à¦–à§à¦²à¦¨à¦¾', '<div><img src=\"http://localhost/red_rose/img/logo.jpg\" alt=\"\" align=\"none\"><br></div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', null, '<div><img src=\"http://localhost/red_rose/files/upload_photos/1461248406476.jpeg\" alt=\"\" align=\"none\"><br></div><div><br></div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', null, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1', '<font size=\"4\">à¦¸à§à¦ªà§à¦°à¦¿à§Ÿ à¦…à¦­à¦¿à¦­à¦¾à¦¬à¦•à¦¬à§ƒà¦¨à§à¦¦, à¦°à§‡à¦¡ à¦°à§‹à¦œ à¦¸à§à¦•à§à¦²à§‡à¦° à¦…à¦¨à¦²à¦¾à¦‡à¦¨ à¦­à¦°à§à¦¤à¦¿ à¦ªà§à¦°à¦•à§à¦°à¦¿à§Ÿà¦¾ à¦œà¦¾à¦¨à§à§Ÿà¦¾à¦°à¦¿ <b style=\"background-color: rgb(102, 255, 0);\">à§¦à§§/à§¦à§§/à§¨à§¦à§§à§¬</b> à¦–à§à¦°à¦¿à¦¸à§à¦Ÿà¦¾à¦¬à§à¦¦ à¦¥à§‡à¦•à§‡ à¦¶à§à¦°à§ à¦¹à¦šà§à¦›à§‡!\r\n\r\nà¦¨à¦¤à§à¦¨ à¦¤à¦¥à§à¦¯à§‡à¦° à¦œà¦¨à§à¦¯ à¦¸à¦™à§à¦—à§‡ à¦¥à¦¾à¦•à§à¦¨</font>', '01711-10101', 'redrose-test@gmail.com', '2016-02-13 03:24:06', '2016-04-21 16:21:09');

-- ----------------------------
-- Table structure for `links`
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of links
-- ----------------------------
INSERT INTO `links` VALUES ('1', 'Bangladesh Portal', 'http://www.bangladesh.gov.bd/', '', null, 'Important', '1', '2016-02-12 20:40:03', '2016-02-12 20:40:03');
INSERT INTO `links` VALUES ('2', 'Ministry of Education', 'http://www.moedu.gov.bd/', '', null, 'Important', '1', '2016-02-12 20:40:31', '2016-02-12 20:40:31');
INSERT INTO `links` VALUES ('3', 'NCTB', 'http://www.nctb.gov.bd/', '', null, 'Important', '1', '2016-02-12 20:41:01', '2016-02-12 20:41:01');
INSERT INTO `links` VALUES ('4', 'Public Library', 'http://www.centralpubliclibrarydhaka.org/', '', null, 'Important', '1', '2016-02-12 20:41:32', '2016-02-12 20:41:32');
INSERT INTO `links` VALUES ('5', 'E-Books', 'http://www.ebook.gov.bd/', '', null, 'Important', '1', '2016-02-12 20:42:05', '2016-02-12 20:42:05');
INSERT INTO `links` VALUES ('6', 'à¦œà¦¾à¦¤à§€à§Ÿ à¦‡-à¦¤à¦¥à§à¦¯à¦•à§‹à¦·', 'http://www.infokosh.bangladesh.gov.bd/', '', null, 'Important', '1', '2016-02-12 20:43:16', '2016-02-12 20:43:16');
INSERT INTO `links` VALUES ('7', 'Tom', 'https://www.youtube.com/embed/aGhOGpdAb_I', 'Tom - YouTube', null, 'Videos', '1', '2016-02-12 20:48:33', '2016-02-12 20:48:33');
INSERT INTO `links` VALUES ('8', 'Tom & jerry', 'https://www.youtube.com/embed/irvHqzO3TRE', 'Tom and Jerry - YouTube', null, 'Videos', '1', '2016-02-12 20:48:33', '2016-02-12 20:48:33');
INSERT INTO `links` VALUES ('9', 'Papai', 'https://www.youtube.com/embed/8SXD8kr5g3M', 'Papai - Youtube', null, 'Videos', '1', '2016-02-12 20:48:33', '2016-02-12 20:48:33');
INSERT INTO `links` VALUES ('10', 'Game', 'https://www.google.com', 'No Game Found', '1455309425465.jpg', 'Games', '1', '2016-02-12 20:48:33', '2016-02-12 20:48:33');

-- ----------------------------
-- Table structure for `marks`
-- ----------------------------
DROP TABLE IF EXISTS `marks`;
CREATE TABLE `marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `monthly` int(3) DEFAULT NULL,
  `terminal` int(3) DEFAULT NULL,
  `mark` int(3) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of marks
-- ----------------------------
INSERT INTO `marks` VALUES ('1', '1', '1', '10', '100', null, null, '2016-02-20 09:56:03', '2016-02-20 09:56:03');
INSERT INTO `marks` VALUES ('2', '1', '2', '10', '100', null, null, '2016-02-20 09:56:04', '2016-02-20 09:56:04');
INSERT INTO `marks` VALUES ('3', '1', '3', '10', '100', null, null, '2016-02-20 09:56:04', '2016-02-20 09:56:04');
INSERT INTO `marks` VALUES ('7', '2', '1', '11', '111', null, null, '2016-02-20 09:56:44', '2016-02-20 09:56:44');
INSERT INTO `marks` VALUES ('8', '2', '2', '11', '111', null, null, '2016-02-20 09:56:44', '2016-02-20 09:56:44');
INSERT INTO `marks` VALUES ('9', '2', '3', '11', '111', null, null, '2016-02-20 09:56:44', '2016-02-20 09:56:44');

-- ----------------------------
-- Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_out` tinyint(1) DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_mail` varchar(255) DEFAULT NULL,
  `sender_phone` varchar(15) DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `receiver_phone` varchar(15) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `text` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES ('1', '0', null, null, null, 'Shafiq', '88017318581', 'Test', 'This is a test flight for messaging....', '1', null, '2016-04-09 15:55:21', '2016-04-09 15:55:21');
INSERT INTO `messages` VALUES ('2', '0', null, null, null, 'Bappy', '8801939307710', 'Test', 'This is a test flight message.......', '1', null, '2016-04-09 15:57:50', '2016-04-09 15:57:50');
INSERT INTO `messages` VALUES ('3', '0', null, null, null, 'Shafiq, Bappy', '8801731858108', 'Test', 'This is test flight....', '1', null, '2016-04-09 16:00:54', '2016-04-09 16:00:54');
INSERT INTO `messages` VALUES ('4', '0', null, null, null, 'Shafiq, Bappy', '8801940029819', 'Test', 'This is test flight....', '1', null, '2016-04-09 16:00:55', '2016-04-09 16:00:55');
INSERT INTO `messages` VALUES ('5', '0', null, null, null, 'Tajnur Rahman Bappy', '8801731858108', '', 'WTH', '1', null, '2016-04-09 20:32:00', '2016-04-09 20:32:00');
INSERT INTO `messages` VALUES ('6', '0', null, null, null, 'All Teachers', '8801731858108', '', 'Test', '1', null, '2016-04-09 20:34:31', '2016-04-09 20:34:31');
INSERT INTO `messages` VALUES ('7', '0', null, null, null, 'All Teachers', '8801731858108', '', 'Test', '1', null, '2016-04-09 20:34:37', '2016-04-09 20:34:37');
INSERT INTO `messages` VALUES ('8', null, null, null, null, null, null, null, null, '1', 'SMS Sent!', '2016-04-10 06:57:27', '2016-04-10 06:57:27');
INSERT INTO `messages` VALUES ('9', '0', null, null, null, '', '8801731858108', '', 'asdf', '1', 'SMS Sent!', '2016-04-19 06:46:02', '2016-04-19 06:46:02');
INSERT INTO `messages` VALUES ('10', '0', null, null, null, '', '8801731858108', '', 'test', '1', 'SMS Sent!', '2016-04-19 06:54:06', '2016-04-19 06:54:06');
INSERT INTO `messages` VALUES ('11', null, null, null, null, null, null, null, null, '0', 'Error: SMPP Server Result:  - Unknown Error! Please contact to Admin.', '2016-04-22 17:34:34', '2016-04-22 17:34:34');
INSERT INTO `messages` VALUES ('12', null, null, null, null, null, null, null, null, '1', 'SMS Sent!', '2016-04-22 17:39:23', '2016-04-22 17:39:23');
INSERT INTO `messages` VALUES ('13', null, null, null, null, null, null, null, null, '1', 'SMS Sent!', '2016-04-22 17:50:16', '2016-04-22 17:50:16');
INSERT INTO `messages` VALUES ('14', null, null, null, null, null, null, null, null, '1', 'SMS Sent!', '2016-04-22 21:56:24', '2016-04-22 21:56:24');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `news` longtext,
  `featured_img` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'Result', 'Red Rose School is a good school.', '1455318412424.jpg', '2016-02-12 23:06:52', '2016-02-12 23:06:52');
INSERT INTO `news` VALUES ('2', 'Result 2', 'Red Rose School is a good school.', '1455318412424.jpg', '2016-02-12 23:06:52', '2016-02-12 23:06:52');

-- ----------------------------
-- Table structure for `notices`
-- ----------------------------
DROP TABLE IF EXISTS `notices`;
CREATE TABLE `notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `notice` longtext,
  `featured_img` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notices
-- ----------------------------
INSERT INTO `notices` VALUES ('1', 'Holiday', 'A holiday has been called on Monday, 15th February,  2016, due to electrical disturbance in the classrooms.', null, '2016-02-12 22:57:49', '2016-02-12 22:57:49');
INSERT INTO `notices` VALUES ('2', 'Test', 'dsafsdfsd', null, '2016-02-12 22:58:35', '2016-02-12 22:58:35');

-- ----------------------------
-- Table structure for `online_applications`
-- ----------------------------
DROP TABLE IF EXISTS `online_applications`;
CREATE TABLE `online_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_bn` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `class_name_id` int(11) DEFAULT NULL,
  `father_name_bn` varchar(255) DEFAULT NULL,
  `father_name_en` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(500) DEFAULT NULL,
  `father_income` int(11) DEFAULT NULL,
  `father_mobile` varchar(11) DEFAULT NULL,
  `father_office_mobile` varchar(11) DEFAULT NULL,
  `mother_name_bn` varchar(255) DEFAULT NULL,
  `mother_name_en` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(500) DEFAULT NULL,
  `mother_income` int(11) DEFAULT NULL,
  `mother_mobile` varchar(11) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `guardian_occupation` varchar(255) DEFAULT NULL,
  `guardian_relation` varchar(255) DEFAULT NULL,
  `weekness` text,
  `speciallity` varchar(255) DEFAULT NULL,
  `previous_school` varchar(255) DEFAULT NULL,
  `present_address` varchar(500) DEFAULT NULL,
  `permanent_address` varchar(500) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `pdf_link` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of online_applications
-- ----------------------------
INSERT INTO `online_applications` VALUES ('1', 'asdf asdsa asd  as', 'dsafasd', null, '1', 'sdaff', 'sdafasd', 'asdas', '123', '12312', '213', 'dsafasdf', 'sdfasdfsad', 'sdfsdaf', '21312', '', 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§€', 'adsas', 'asdasd', '', '', '', 'sadas', 'asdfasdf', 'sdafsad', 'asdasd', 'asdas', '0000-00-00', 'AB+', '', '', 'Admitted', '1456087322', '', '2016-02-21 20:42:02', '2016-02-21 22:38:05');
INSERT INTO `online_applications` VALUES ('2', 'test', 'test', null, '1', 'sadsa', 'sadasd', 'asdasd', '12312', '12312312', '213123', 'afdasdfas', 'dasdasd', 'sadasda', '12312', null, 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§€', 'asdasd', 'asdasdasasd', null, null, null, 'asdasdasd', 'dsadas', 'asdasd', 'sadasdas', 'dasdas', '2016-02-17', 'AB+', null, null, 'Admitted', '1456095405', '', '2016-02-21 22:56:45', '2016-02-21 22:57:44');
INSERT INTO `online_applications` VALUES ('3', 'test2', 'test2', null, '1', 'sadas', 'sadas', 'sadas', '136416', '54654', '5464', 'asdsa', 'sadas', 'asdas', '654', null, 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§€', '', 'sadasd', null, null, null, 'asdasd', 'sadas', 'sadasd', 'sadsa', 'sadas', '2016-02-10', 'O+', null, null, 'Admitted', '1456095857', '', '2016-02-21 23:04:17', '2016-02-21 23:04:39');
INSERT INTO `online_applications` VALUES ('4', 'à¦¶à¦«à¦¿à¦•', 'SHAFIQ', null, '2', 'à¦¶à§‡à¦–', 'SHEIKH', 'holder', '10000', '212123132', '3213212', 'à¦¬à§‡à¦—à¦®', 'BEGUM', 'house', '0', null, 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§€', 'Islam', 'n/a', null, null, null, '', 'n/a', '', 'doulatpur', 'bagerhat', '2016-04-20', 'à¦°à¦•à§à', '01731858108', null, 'Granted', '1460264246', '146134058054.pdf', '2016-04-10 06:57:26', '2016-04-10 06:57:26');

-- ----------------------------
-- Table structure for `photos`
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `description` text,
  `active` tinyint(1) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of photos
-- ----------------------------
INSERT INTO `photos` VALUES ('1', '14552648076.jpg', 'test', 'This is the first image upload test.', null, '1', '2016-02-12 08:13:27', '2016-02-12 08:13:27');
INSERT INTO `photos` VALUES ('2', '1455270923750.png', 'Second', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', null, '0', '2016-02-12 08:13:27', '2016-02-12 09:55:23');
INSERT INTO `photos` VALUES ('3', '1455270933606.jpg', '3rd', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', null, '0', '2016-02-12 08:13:27', '2016-02-12 09:55:33');
INSERT INTO `photos` VALUES ('4', '1455270943710.jpg', 'e=mc^2', 'einstein', null, '2', '2016-02-12 08:13:27', '2016-02-12 09:56:50');
INSERT INTO `photos` VALUES ('5', '1455270995374.jpg', 'wrong', 'evoulution', null, '3', '2016-02-12 08:13:27', '2016-02-12 09:56:36');
INSERT INTO `photos` VALUES ('6', '1456127683545.jpg', 'SQL', '', null, '1', '2016-02-22 08:54:45', '2016-02-22 08:54:45');
INSERT INTO `photos` VALUES ('7', '1456129673586.png', 'sprt', '', null, '2', '2016-02-22 09:27:54', '2016-02-22 09:27:54');
INSERT INTO `photos` VALUES ('8', '1456129734933.jpg', 'eat', '', null, '1', '2016-02-22 09:28:55', '2016-02-22 09:28:55');
INSERT INTO `photos` VALUES ('9', '1461248406476.jpeg', 'Headmaster', '', null, '4', '2016-04-21 16:20:06', '2016-04-21 16:20:06');

-- ----------------------------
-- Table structure for `results`
-- ----------------------------
DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `term` int(1) DEFAULT NULL,
  `comment` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of results
-- ----------------------------
INSERT INTO `results` VALUES ('1', '1', '1', null, '2016-02-20 09:55:26', '2016-02-20 09:55:26');
INSERT INTO `results` VALUES ('2', '1', '2', null, '2016-02-20 09:55:26', '2016-02-20 09:55:26');
INSERT INTO `results` VALUES ('3', '1', '3', null, '2016-02-20 09:55:26', '2016-02-20 09:55:26');
INSERT INTO `results` VALUES ('4', '2', '1', null, '2016-02-20 09:55:26', '2016-02-20 09:55:26');
INSERT INTO `results` VALUES ('5', '2', '2', null, '2016-02-20 09:55:26', '2016-02-20 09:55:26');
INSERT INTO `results` VALUES ('6', '2', '3', null, '2016-02-20 09:55:26', '2016-02-20 09:55:26');
INSERT INTO `results` VALUES ('7', '3', '1', null, '2016-02-21 22:44:37', '2016-02-21 22:44:37');
INSERT INTO `results` VALUES ('8', '3', '2', null, '2016-02-21 22:44:37', '2016-02-21 22:44:37');
INSERT INTO `results` VALUES ('9', '3', '3', null, '2016-02-21 22:44:37', '2016-02-21 22:44:37');
INSERT INTO `results` VALUES ('10', '4', '1', null, '2016-02-21 22:58:19', '2016-02-21 22:58:19');
INSERT INTO `results` VALUES ('11', '4', '2', null, '2016-02-21 22:58:19', '2016-02-21 22:58:19');
INSERT INTO `results` VALUES ('12', '4', '3', null, '2016-02-21 22:58:19', '2016-02-21 22:58:19');
INSERT INTO `results` VALUES ('13', '5', '1', null, '2016-02-21 23:04:49', '2016-02-21 23:04:49');
INSERT INTO `results` VALUES ('14', '5', '2', null, '2016-02-21 23:04:50', '2016-02-21 23:04:50');
INSERT INTO `results` VALUES ('15', '5', '3', null, '2016-02-21 23:04:50', '2016-02-21 23:04:50');

-- ----------------------------
-- Table structure for `routines`
-- ----------------------------
DROP TABLE IF EXISTS `routines`;
CREATE TABLE `routines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `period` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `weekday` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of routines
-- ----------------------------
INSERT INTO `routines` VALUES ('2', '1', '2', '1', '2', null, '0', '0', '2016-02-15 02:05:38', '2016-02-15 02:05:38');
INSERT INTO `routines` VALUES ('3', '1', '2', '1', '1', null, '1', '0', '2016-02-15 02:05:38', '2016-02-22 20:16:50');
INSERT INTO `routines` VALUES ('4', '1', '1', '1', '2', null, '1', '0', '2016-02-15 02:05:38', '2016-02-15 02:05:38');
INSERT INTO `routines` VALUES ('5', '1', '3', '1', '1', null, '2', '0', '2016-02-15 02:05:38', '2016-02-15 02:05:38');
INSERT INTO `routines` VALUES ('6', '1', '2', '1', '2', null, '2', '0', '2016-02-15 02:05:38', '2016-02-15 02:05:38');
INSERT INTO `routines` VALUES ('7', '1', '1', '1', '3', null, '2', '2', '2016-02-15 02:05:38', '2016-02-16 10:47:08');
INSERT INTO `routines` VALUES ('8', '1', '1', '1', '1', null, '3', '0', '2016-02-15 02:05:38', '2016-02-15 02:05:38');
INSERT INTO `routines` VALUES ('9', '1', '3', '1', '2', null, '3', '0', '2016-02-15 02:05:38', '2016-02-15 02:05:38');
INSERT INTO `routines` VALUES ('10', '1', '2', '1', '1', null, '4', '0', '2016-02-15 02:05:38', '2016-02-15 02:05:38');
INSERT INTO `routines` VALUES ('11', '1', '1', '1', '2', null, '4', '0', '2016-02-15 02:05:38', '2016-02-15 02:05:38');
INSERT INTO `routines` VALUES ('12', '1', '3', '1', '3', null, '4', '0', '2016-02-15 02:05:38', '2016-02-15 02:05:38');
INSERT INTO `routines` VALUES ('15', '1', '1', '1', '1', null, '0', '0', '2016-02-16 11:10:03', '2016-02-16 11:10:03');
INSERT INTO `routines` VALUES ('16', '1', '3', '1', '3', null, '0', '0', '2016-02-16 11:12:24', '2016-02-16 11:12:24');

-- ----------------------------
-- Table structure for `slider_images`
-- ----------------------------
DROP TABLE IF EXISTS `slider_images`;
CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slider_images
-- ----------------------------
INSERT INTO `slider_images` VALUES ('7', '1', '1', '2016-02-22 15:06:46', '2016-02-22 19:12:22');
INSERT INTO `slider_images` VALUES ('8', '6', '2', '2016-02-22 19:12:10', '2016-02-22 19:12:22');

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_bn` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `roll_no` int(3) DEFAULT NULL,
  `class_name_id` int(11) DEFAULT NULL,
  `father_name_bn` varchar(255) DEFAULT NULL,
  `father_name_en` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `father_income` int(11) DEFAULT NULL,
  `father_mobile` varchar(11) DEFAULT NULL,
  `father_office_mobile` varchar(11) DEFAULT NULL,
  `mother_name_bn` varchar(255) DEFAULT NULL,
  `mother_name_en` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `mother_income` int(11) DEFAULT NULL,
  `mother_mobile` varchar(11) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `guardian_occupation` varchar(255) DEFAULT NULL,
  `guardian_relation` varchar(255) DEFAULT NULL,
  `weekness` text,
  `speciallity` varchar(255) DEFAULT NULL,
  `previous_school` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `session` int(4) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `simple_pwd` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', 'à¦†à¦¬à§à¦² à¦•à¦¾à¦¶à§‡à¦® à¦œà§à¦¨à¦¿à§Ÿà¦°', 'ABUL KASHEM JR.', '1455905946376.jpg', '1', '1', 'à¦†à¦¬à§à¦² à¦•à¦¾à¦¶à§‡à¦® ', 'ABUL KASHEM', 'Holder', '123456', '01789654123', '04145213', 'à¦¬à§‡à¦—à¦® à¦•à¦¾à¦¶à§‡à¦®', 'BEGUM KASHEM', 'Wife', '0', '0123654789', 'Bangladeshi', 'Islam', '', '', '', '', '', '', '', '', '', '0000-00-00', null, '01731858108', 'shafiq.xor@gmail.com', '2016', '160101', 'a8c03ec3e3f4230c6313d748163d83877aed68ba', '661102', '2016-02-19 18:19:06', '2016-02-19 18:19:06');
INSERT INTO `students` VALUES ('2', 'à¦†à¦¬à§à¦² à¦•à¦¾à¦¶à§‡à¦® à¦œà§à¦¨à¦¿à§Ÿà¦° à¦œà§à¦¨à¦¿à§Ÿà¦°', 'ABUL KASHEM JR. JR.', '1455906091376.jpg', '2', '1', 'à¦†à¦¬à§à¦² à¦•à¦¾à¦¶à§‡à¦® à¦œà§à¦¨à¦¿à§Ÿà¦°', 'ABUL KASHEM JR.', 'Holder', '25000', '01789654123', '04145213', 'à¦¬à§‡à¦—à¦® à¦•à¦¾à¦¶à§‡à¦®', 'BEGUM KASHEM', 'Wife', '0', '0123654789', 'Indian', 'Islam', '', '', '', '', '', '', '', '', '', '0000-00-00', null, '01731858108', 'shafiq.xor@gmail.com', '2016', '160102', 'cacc9fd1965304e9b4342b9623b99926790d34af', '123456', '2016-02-19 18:21:31', '2016-02-19 23:23:05');
INSERT INTO `students` VALUES ('3', 'asdf asdsa asd  as', 'dsafasd', null, '3', '1', 'sdaff', 'sdafasd', 'asdas', '123', '12312', '213', 'dsafasdf', 'sdfasdfsad', 'sdfsdaf', '21312', '', 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§€', 'adsas', 'asdasd', '', '', '', 'sadas', 'asdfasdf', 'sdafsad', 'asdasd', 'asdas', '0000-00-00', 'AB+', '', '', '2016', '160103', '7b0cc5375c4e185c70b2901a1b33758c48621ba9', '034861', '2016-02-21 22:38:05', '2016-02-21 22:38:05');
INSERT INTO `students` VALUES ('4', 'test', 'test', null, '4', '1', 'sadsa', 'sadasd', 'asdasd', '12312', '12312312', '213123', 'afdasdfas', 'dasdasd', 'sadasda', '12312', null, 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§€', 'asdasd', 'asdasdasasd', null, null, null, 'asdasdasd', 'dsadas', 'asdasd', 'sadasdas', 'dasdas', '2016-02-17', 'AB+', null, null, '2016', '160104', 'b5679eefc7882586b94a9ac6e78ebc8e9cc0ecc0', '025427', '2016-02-21 22:57:44', '2016-02-21 22:57:44');
INSERT INTO `students` VALUES ('5', 'test2', 'test2', null, '5', '1', 'sadas', 'sadas', 'sadas', '136416', '54654', '5464', 'asdsa', 'sadas', 'asdas', '654', null, 'à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§€', '', 'sadasd', null, null, null, 'asdasd', 'sadas', 'sadasd', 'sadsa', 'sadas', '2016-02-10', 'O+', null, null, '2016', '160105', 'eb683e2bd1a108b279700193abe1e1b175187157', '658564', '2016-02-21 23:04:39', '2016-02-21 23:04:39');

-- ----------------------------
-- Table structure for `subjects`
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `class_name_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subjects
-- ----------------------------
INSERT INTO `subjects` VALUES ('1', 'à¦¬à¦¾à¦‚à¦²à¦¾', '1', '1', '2016-02-16 16:32:03', '2016-02-16 16:32:03');
INSERT INTO `subjects` VALUES ('2', 'English', '1', '3', '2016-02-16 16:32:03', '2016-02-16 16:32:03');
INSERT INTO `subjects` VALUES ('3', 'à¦—à¦£à¦¿à¦¤', '1', '2', '2016-02-16 16:32:03', '2016-02-16 16:32:03');
INSERT INTO `subjects` VALUES ('4', 'English', '2', '1', '2016-02-16 16:32:03', '2016-02-16 16:32:03');

-- ----------------------------
-- Table structure for `suggestions`
-- ----------------------------
DROP TABLE IF EXISTS `suggestions`;
CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `class_name_id` int(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of suggestions
-- ----------------------------
INSERT INTO `suggestions` VALUES ('1', 'Test 21', '1456079406569.pdf', '2', '2016-02-22 20:24:55', '2016-02-22 20:24:55');
INSERT INTO `suggestions` VALUES ('2', 'Test 22', '1456079406569.pdf', '1', '2016-02-22 20:24:55', '2016-02-15 20:25:21');
INSERT INTO `suggestions` VALUES ('3', 'Test 23', '1456079406569.pdf', '1', '2016-02-22 20:24:55', '2016-02-22 20:25:21');

-- ----------------------------
-- Table structure for `syllabuses`
-- ----------------------------
DROP TABLE IF EXISTS `syllabuses`;
CREATE TABLE `syllabuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `class_name_id` int(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syllabuses
-- ----------------------------
INSERT INTO `syllabuses` VALUES ('1', 'Test 1', '1456078347940.pdf', '1', '2016-02-22 20:02:31', '2016-02-08 20:02:34');
INSERT INTO `syllabuses` VALUES ('2', 'Test 2', '1456078347940.pdf', '1', '2016-02-22 20:02:31', '2016-02-22 20:19:22');
INSERT INTO `syllabuses` VALUES ('3', 'Test 3', '1456078347940.pdf', '2', '2016-02-22 20:02:31', '2016-02-22 20:02:31');

-- ----------------------------
-- Table structure for `teachers`
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `email_1` varchar(255) DEFAULT NULL,
  `email_2` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES ('1', 'Tajnur Rahman Bappy', 'Event Manager', 'Pabla', null, null, '01731858108', 'bappy.xor@gmail.com', null, 'English', '1455431220773.jpg', '2016-02-14 07:27:01', '2016-04-09 20:31:49');
INSERT INTO `teachers` VALUES ('2', 'SHafiq', '', '', null, null, '01731858108', '', null, '', null, '2016-04-09 20:34:13', '2016-04-09 20:34:13');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `simple_pwd` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@gmail.com', '28a1cdb190c7dfc23ddf9b67c718040f14d7f25e', 'a', null, 'admin', '2016-02-08 16:21:29', '2016-02-08 16:21:29');
INSERT INTO `users` VALUES ('3', 'manager', 'manager@gmail.com', 'a8d72ed9966ef309575076adc6e4fde4a1e44283', 'm', null, 'admin', '2016-02-12 07:35:28', '2016-02-12 07:35:28');
