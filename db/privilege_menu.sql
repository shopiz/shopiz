/*
Navicat MySQL Data Transfer

Source Server         : 172.16.30.210
Source Server Version : 50610
Source Host           : 172.16.30.210:3306
Source Database       : shopiz

Target Server Type    : MYSQL
Target Server Version : 50610
File Encoding         : 65001

Date: 2014-04-13 23:06:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `privilege_menu`
-- ----------------------------
DROP TABLE IF EXISTS `privilege_menu`;
CREATE TABLE `privilege_menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL DEFAULT '',
  `menu_url` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级编号',
  `level` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `lasttime` int(10) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of privilege_menu
-- ----------------------------
INSERT INTO `privilege_menu` VALUES ('1', '测试栏目', 'test', '0', '1', '1', '1', '0', '1384156826', '1384156826');
INSERT INTO `privilege_menu` VALUES ('2', '测试2', 'test2', '1', '2', '1', '1', '0', '1384162299', '1384162299');
INSERT INTO `privilege_menu` VALUES ('3', '测试3', 'test3', '0', '1', '2', '1', '0', '1384162299', '1384162299');
INSERT INTO `privilege_menu` VALUES ('4', '测试4', 'test4', '2', '3', '1', '1', '0', '1384175420', '1384162396');
INSERT INTO `privilege_menu` VALUES ('5', '测试6', 'test6', '3', '2', '1', '1', '0', '1384175420', '1384162396');
INSERT INTO `privilege_menu` VALUES ('6', '测试5', 'test5', '3', '2', '2', '1', '0', '1384175420', '1384162396');
INSERT INTO `privilege_menu` VALUES ('7', '测试7', 'test7', '0', '1', '3', '1', '0', '1384175420', '1384175420');
INSERT INTO `privilege_menu` VALUES ('8', 'FFFF', '', '0', '1', '255', '1', '0', '1394014348', '1394014348');
INSERT INTO `privilege_menu` VALUES ('9', 'JJJJ', 'UU', '8', '2', '255', '1', '0', '1394014369', '1394014369');
