/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : ldc

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2012-03-22 20:04:00
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `ldc_image`
-- ----------------------------
DROP TABLE IF EXISTS `ldc_image`;
CREATE TABLE `ldc_image` (
  `id` int(10) NOT NULL auto_increment,
  `uid` int(10) default NULL,
  `title` varchar(255) default '',
  `create_time` bigint(20) default NULL,
  `url` varchar(255) default '',
  `thumb_url` varchar(255) default '',
  `filesize` float(10,0) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ldc_image
-- ----------------------------
INSERT INTO `ldc_image` VALUES ('1', '1', 'big.jpg', '1294566329', '/LDC/images/4f5d6dfa83467.jpeg', '/LDC/images/thumb_4f5d6dfa83467.jpeg', '125714');
INSERT INTO `ldc_image` VALUES ('2', '1', 'smail.jpg', '1294566330', '/LDC/images/4f5d6dfa83467.jpeg', '/LDC/images/thumb_4f5d6dfa83467.jpeg', '125714');
INSERT INTO `ldc_image` VALUES ('3', '3', '屏幕快照 2012-03-12 下午3.08.29.png', '1332386444', '/LDC/images/4f6a9a8bd7bf4.png', '/LDC/images/thumb_4f6a9a8bd7bf4.png', '81901');
INSERT INTO `ldc_image` VALUES ('4', '3', '屏幕快照 2012-03-12 下午3.08.29.png', '1332399535', '/LDC/images/4f6acdaf25e79.png', '/LDC/images/thumb_4f6acdaf25e79.png', '81901');
INSERT INTO `ldc_image` VALUES ('5', '3', '屏幕快照 2012-03-12 下午3.08.29.png', '1332400659', '/LDC/images/4f6ad2133ab4d.png', '/LDC/images/thumb_4f6ad2133ab4d.png', '81901');
INSERT INTO `ldc_image` VALUES ('6', '3', 'Default.png', '1332414575', '/LDC/images/4f6b086f5d3ca.png', '/LDC/images/thumb_4f6b086f5d3ca.png', '56536');
INSERT INTO `ldc_image` VALUES ('7', '3', 'Default@2x.png', '1332414584', '/LDC/images/4f6b08774acae.png', '/LDC/images/thumb_4f6b08774acae.png', '220374');
INSERT INTO `ldc_image` VALUES ('8', '3', '屏幕快照 2012-03-12 下午3.08.29.png', '1332414745', '/LDC/images/4f6b09186f731.png', '/LDC/images/thumb_4f6b09186f731.png', '81901');
INSERT INTO `ldc_image` VALUES ('9', '3', 'Default.png', '1332416340', '/LDC/images/4f6b0f547304b.png', '/LDC/images/thumb_4f6b0f547304b.png', '21627');
INSERT INTO `ldc_image` VALUES ('10', '3', '屏幕快照 2012-03-12 下午3.08.29.png', '1332416810', '/LDC/images/4f6b1129d77dc.png', '/LDC/images/thumb_4f6b1129d77dc.png', '81901');
INSERT INTO `ldc_image` VALUES ('11', '3', '屏幕快照 2012-03-22 下午7.55.25.png', '1332417330', '/LDC/images/4f6b132fb7304.png', '/LDC/images/thumb_4f6b132fb7304.png', '790574');

-- ----------------------------
-- Table structure for `ldc_user`
-- ----------------------------
DROP TABLE IF EXISTS `ldc_user`;
CREATE TABLE `ldc_user` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) default '',
  `password` varchar(255) default '',
  `nickname` varchar(255) default NULL,
  `create_time` bigint(20) default NULL,
  `create_ip` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ldc_user
-- ----------------------------
INSERT INTO `ldc_user` VALUES ('1', 'leyteris', '8019634edea7b585700e5d086ab9f44c', 'leyteris', '1331875164', '127.0.0.1');
INSERT INTO `ldc_user` VALUES ('3', '18602195219', 'decc8686654b465e5313259325149a86', 'King', '1332386175', '10.16.194.131');
