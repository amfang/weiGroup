/*
 Navicat Premium Data Transfer

 Source Server         : us-cdbr-iron-east-04.cleardb.net
 Source Server Type    : MySQL
 Source Server Version : 50546
 Source Host           : us-cdbr-iron-east-04.cleardb.net
 Source Database       : ad_8ea8143412cb026

 Target Server Type    : MySQL
 Target Server Version : 50546
 File Encoding         : utf-8

 Date: 12/11/2016 10:32:24 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `groupId` int(2) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `confirmBy` char(20) NOT NULL,
  PRIMARY KEY (`groupId`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `groups`
-- ----------------------------
BEGIN;
INSERT INTO `groups` VALUES ('1', 'GDC SZ', 'mail address'), ('2', '入组', 'mail'), ('3', '还未q加入组', 'mail'), ('4', '有时候', 'mail'), ('5', '在家', 'mail'), ('6', 'yew', 'mail'), ('7', 'test', 'mail');
COMMIT;

-- ----------------------------
--  Table structure for `test_mysql`
-- ----------------------------
DROP TABLE IF EXISTS `test_mysql`;
CREATE TABLE `test_mysql` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(40) DEFAULT NULL,
  `nickname` varchar(40) DEFAULT NULL,
  `sex` int(2) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `province` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `language` varchar(40) DEFAULT NULL,
  `headimgurl` varchar(400) DEFAULT NULL,
  `unionid` varchar(40) DEFAULT NULL,
  `subscribe` int(2) DEFAULT NULL,
  `subscribe_time` datetime DEFAULT NULL,
  `remark` varchar(40) DEFAULT NULL,
  `groupid` int(2) DEFAULT NULL,
  `agent` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `test_mysql`
-- ----------------------------
BEGIN;
INSERT INTO `test_mysql` VALUES ('1', 'oqIzyw83Jc5oyKhQqIrK45L8WmpM', '无聊的老方', '1', '中国', '广东', '深圳', 'zh_CN', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM6rem3VoCSFvb2giacGT8NVs48PzNEUBJLKUaZlrLicicExGadGtb3j3pxj9vZXdTWGERJoW3yCAxzDAsc72tHoG1p8Po8SrWT6TA/0', '', '1', '0000-00-00 00:00:00', '', '1', '');
COMMIT;

-- ----------------------------
--  Table structure for `vote_item`
-- ----------------------------
DROP TABLE IF EXISTS `vote_item`;
CREATE TABLE `vote_item` (
  `id` int(11) NOT NULL,
  `vote_item` varchar(200) DEFAULT NULL,
  `vote_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `vote_item`
-- ----------------------------
BEGIN;
INSERT INTO `vote_item` VALUES ('2', '不知道后悔怎么写', '7'), ('12', '后悔也没用', '1'), ('22', '有点小后悔', '2'), ('32', '我很庆幸选择了IT行业', '3'), ('42', '下辈子还做程序猿', '24'), ('52', '我已经转行了', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
