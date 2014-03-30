/*
Navicat MySQL Data Transfer

Source Server         : 172.16.30.210
Source Server Version : 50610
Source Host           : 172.16.30.210:3306
Source Database       : shopiz

Target Server Type    : MYSQL
Target Server Version : 50610
File Encoding         : 65001

Date: 2014-03-31 07:24:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` char(20) NOT NULL COMMENT '管理员用户名',
  `realname` char(20) NOT NULL COMMENT '管理员真实姓名',
  `email` varchar(50) NOT NULL COMMENT '管理员邮箱',
  `password` char(32) NOT NULL,
  `salt` char(6) NOT NULL COMMENT '随机加密附加码',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户角色ID',
  `purviews` text NOT NULL COMMENT '用户权限列表，JSON存储',
  `logintimes` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `lastip` int(10) unsigned NOT NULL COMMENT '最后登录IP',
  `lastvisit` int(10) unsigned NOT NULL COMMENT '最后登录时间',
  `user_rank` smallint(4) unsigned NOT NULL DEFAULT '999' COMMENT '用户排序',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否系统内置',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态：0、删除 1、锁定  4、正常',
  `lasttime` int(10) unsigned NOT NULL COMMENT '最后修改时间',
  `dateline` int(10) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'nbaiwan', '超级管理员', 'myself.fervor@gmail.com', 'da14b024528812998a2aa0e37121855b', '27e7f8', '1', '[]', '465', '3232240870', '1300913640', '1', '1', '4', '1335077712', '1300913640');

-- ----------------------------
-- Table structure for `privilege_menu`
-- ----------------------------
DROP TABLE IF EXISTS `privilege_menu`;
CREATE TABLE `privilege_menu` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL DEFAULT '',
  `identify` varchar(50) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级编号',
  `level` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `lasttime` int(10) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `privilege_purview`
-- ----------------------------
DROP TABLE IF EXISTS `privilege_purview`;
CREATE TABLE `privilege_purview` (
  `purview_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL COMMENT '上级分类',
  `purview_name` char(20) NOT NULL COMMENT '权限名称，用于后台显示',
  `identify` char(30) NOT NULL COMMENT '权限的英文标识，用于权限判定',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态：1、正常 0、删除',
  `purview_rank` smallint(6) unsigned NOT NULL,
  `lasttime` int(10) unsigned NOT NULL COMMENT '最后修改时间',
  `dateline` int(10) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`purview_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `privilege_role`
-- ----------------------------
DROP TABLE IF EXISTS `privilege_role`;
CREATE TABLE `privilege_role` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` char(20) NOT NULL,
  `parent_id` int(10) unsigned NOT NULL COMMENT '上级角色编号',
  `purviews` text NOT NULL COMMENT '角色权限列表，JSON存储',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否系统角色，1、系统角色，不能更改 0、普通角色',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示：1、显示 0、隐藏',
  `group_rank` smallint(5) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：1、正常 0、删除 -1、锁定',
  `lasttime` int(10) unsigned NOT NULL COMMENT '角色最后修改时间',
  `dateline` int(10) unsigned NOT NULL COMMENT '角色添加时间',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of privilege_role
-- ----------------------------
INSERT INTO `privilege_role` VALUES ('1', '超级管理员', '0', 'all', '1', '1', '1', '4', '1319446870', '1319446870');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品ID',
  `channel_id` int(11) unsigned NOT NULL COMMENT '支付渠道编号',
  `class_id` int(11) unsigned NOT NULL COMMENT '产品分类ID',
  `channel_product_id` varchar(20) NOT NULL COMMENT '产品渠道编号',
  `product_name` char(30) NOT NULL COMMENT '产品名称',
  `product_price` float(6,2) NOT NULL COMMENT '产品价格',
  `product_discount_rate` tinyint(2) NOT NULL DEFAULT '1' COMMENT '折扣',
  `product_discount` float(6,2) NOT NULL DEFAULT '0.00' COMMENT '可惠优价格',
  `product_description` text NOT NULL COMMENT '产品描述',
  `product_tips` varchar(255) NOT NULL COMMENT '提示信息',
  `is_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是默认产品',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示(1、显示；0、隐藏)',
  `product_rank` int(3) NOT NULL DEFAULT '255' COMMENT '产品排序',
  `product_attribute` varchar(200) NOT NULL COMMENT '产品属性',
  `product_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '产品状态(0、删除；4、开通；1、暂停)',
  `is_other` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否在其它中显示(1、是；0、否；)',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=utf8 COMMENT='产品';

-- ----------------------------
-- Table structure for `product_class`
-- ----------------------------
DROP TABLE IF EXISTS `product_class`;
CREATE TABLE `product_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '产品分类编号',
  `channel_id` int(11) NOT NULL COMMENT '支付渠道编号',
  `class_name` char(30) NOT NULL COMMENT '分类名称',
  `is_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是默认分类(1、是；0、否)',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示(1、显示；0、隐藏)',
  `class_rank` int(3) NOT NULL DEFAULT '255' COMMENT '序排',
  `class_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '型类状态(0、删除；4、开通；1、暂停；)',
  `class_remark` text COMMENT '备注',
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='产品分类';

-- ----------------------------
-- Table structure for `setting`
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `setting_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `setting_name` char(100) NOT NULL COMMENT '配置名称',
  `setting_group` enum('base','cache','pay','other') NOT NULL DEFAULT 'base' COMMENT '设置组',
  `setting_identify` varchar(50) NOT NULL COMMENT '配置标识',
  `setting_type` enum('text','radio','select','textarea') NOT NULL DEFAULT 'text' COMMENT '类型',
  `setting_message` varchar(255) NOT NULL COMMENT '说明',
  `setting_options` varchar(255) NOT NULL COMMENT '设置选项',
  `setting_value` text NOT NULL COMMENT '配置的值',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否系统配置',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示，1、显示 0、不显示',
  `rank` smallint(6) NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', '网站名称', 'base', 'SITE_NAME', 'text', '', '', '快播支付中心', '1', '1', '1');
INSERT INTO `setting` VALUES ('2', '网站URL', 'base', 'SITE_URL', 'text', '', '', 'http://pay.kuaibo.com/', '1', '1', '2');
INSERT INTO `setting` VALUES ('3', '管理员邮箱', 'base', 'SITE_WEBMASTER_EMAIL', 'text', '', '', 'webmaster@vsenho.com', '1', '1', '3');
INSERT INTO `setting` VALUES ('4', '网站备案信息代码', 'base', 'SITE_ICP_CODE', 'text', '', '', '', '1', '1', '4');
INSERT INTO `setting` VALUES ('5', '统计代码', 'base', 'SITE_STAT_CODE', 'textarea', '', '', '', '1', '1', '5');
INSERT INTO `setting` VALUES ('6', '客服QQ', 'base', 'HELP_SERVICE_QQ', 'text', '客服QQ', '', '', '1', '1', '6');
INSERT INTO `setting` VALUES ('7', '静态资源地址', 'other', 'STATIC_RESOURCE_URL', 'text', '静态资源地址', '', '', '1', '1', '3');
INSERT INTO `setting` VALUES ('8', '动态资源地址', 'other', 'DYNAMIC_RESOURCE_URL', 'text', '动态资源地址', '', '', '1', '1', '4');

-- ----------------------------
-- Table structure for `user_logs`
-- ----------------------------
DROP TABLE IF EXISTS `user_logs`;
CREATE TABLE `user_logs` (
  `log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '操作人',
  `log_type` varchar(30) NOT NULL COMMENT '类型',
  `log_item_id` int(11) unsigned NOT NULL COMMENT '操作ID',
  `log_action` varchar(30) NOT NULL COMMENT '动作',
  `log_result` enum('success','failure') NOT NULL COMMENT '操作结果',
  `log_message` varchar(255) NOT NULL COMMENT '备注',
  `log_data` text NOT NULL COMMENT '附加数据',
  `user_ip` int(11) unsigned NOT NULL COMMENT '操作人IP',
  `lasttime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=557 DEFAULT CHARSET=utf8;
