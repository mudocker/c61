/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : hy18899

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-11-23 10:34:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `caipiao_caipiao`
-- ----------------------------
DROP TABLE IF EXISTS `caipiao_caipiao`;
CREATE TABLE `caipiao_caipiao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` char(20) NOT NULL COMMENT '彩票分类（ssc、k3）',
  `title` varchar(80) NOT NULL COMMENT '彩种名称',
  `ftitle` varchar(180) NOT NULL COMMENT '彩种简介',
  `firsttime` char(8) DEFAULT NULL,
  `endtime` char(8) DEFAULT NULL,
  `qishu` smallint(3) NOT NULL,
  `name` char(30) NOT NULL COMMENT '彩种标示（唯一）',
  `ftime` smallint(6) NOT NULL DEFAULT '120' COMMENT '停止投注间隔',
  `isopen` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启',
  `issys` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0第三方彩票 1系统彩票',
  `closetime1` time NOT NULL DEFAULT '00:00:00',
  `closetime2` time NOT NULL DEFAULT '00:00:00',
  `expecttime` smallint(6) NOT NULL DEFAULT '1' COMMENT '多久1期 最少1分钟',
  `iswh` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1维护',
  `allsort` smallint(6) NOT NULL,
  `listorder` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `typeid` (`typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of caipiao_caipiao
-- ----------------------------
INSERT INTO `caipiao_caipiao` VALUES ('16', 'k3', '北京快3', '全天89期', '', '', '89', 'bjk3', '120', '1', '0', '00:00:00', '00:00:00', '0', '0', '3', '5');
INSERT INTO `caipiao_caipiao` VALUES ('17', 'k3', '江苏快3', '全天82期', '', '', '82', 'jsk3', '120', '1', '0', '00:00:00', '00:00:00', '0', '0', '4', '4');
INSERT INTO `caipiao_caipiao` VALUES ('18', 'k3', '湖北快3', '全天78期', '', '', '78', 'hubk3', '120', '1', '0', '00:00:00', '00:00:00', '0', '0', '9', '6');
INSERT INTO `caipiao_caipiao` VALUES ('19', 'k3', '广西快3', '全天78期', '', '', '78', 'gxk3', '120', '1', '0', '00:00:00', '00:00:00', '0', '0', '12', '11');
INSERT INTO `caipiao_caipiao` VALUES ('20', 'k3', '安徽快3', '全天80期', '', '', '80', 'ahk3', '120', '1', '0', '00:00:00', '00:00:00', '0', '0', '14', '12');
INSERT INTO `caipiao_caipiao` VALUES ('21', 'k3', '上海快3', '全天82期', '', '', '82', 'shk3', '120', '1', '0', '00:00:00', '00:00:00', '0', '0', '15', '8');
INSERT INTO `caipiao_caipiao` VALUES ('53', 'k3', '河北快3', '全天81期', '8:30', '22:30', '81', 'hebk3', '120', '1', '0', '00:00:00', '00:00:00', '0', '0', '5', '7');
INSERT INTO `caipiao_caipiao` VALUES ('84', 'k3', '江西快3', '全天84期', '', '', '84', 'jxk3', '120', '1', '0', '00:00:00', '00:00:00', '0', '0', '16', '10');
INSERT INTO `caipiao_caipiao` VALUES ('91', 'k3', '极速快3', '极速2分彩', '', '', '0', 'f1k3', '10', '1', '1', '08:30:00', '23:30:00', '2', '0', '1', '2');
INSERT INTO `caipiao_caipiao` VALUES ('92', 'k3', '幸运快3', '幸运3分彩', '', '', '0', 'f5k3', '10', '1', '1', '08:30:00', '23:30:00', '3', '0', '3', '3');
INSERT INTO `caipiao_caipiao` VALUES ('93', 'k3', '吉林快3', '全天87期', '', '', '87', 'jlk3', '300', '1', '0', '00:00:00', '00:00:00', '0', '0', '18', '9');
INSERT INTO `caipiao_caipiao` VALUES ('97', 'ssc', '好运时时彩', '全天180期', '10:00:00', '23:59:00', '180', 'dfssc', '30', '0', '1', '08:30:00', '23:30:00', '5', '1', '2', '4');
INSERT INTO `caipiao_caipiao` VALUES ('98', 'ssc', '天津时时彩', '全天84期', '09:09:36', '22:59:36', '84', 'tjssc', '120', '1', '0', '00:00:00', '00:00:00', '1', '0', '19', '3');
INSERT INTO `caipiao_caipiao` VALUES ('99', 'ssc', '新疆时时彩', '全天96期', '10:10:34', '02:00:34', '96', 'xjssc', '120', '1', '0', '00:00:00', '00:00:00', '1', '0', '20', '2');
INSERT INTO `caipiao_caipiao` VALUES ('100', 'ssc', '重庆时时彩', '全天120期', '00:05:00', '00:00:00', '120', 'cqssc', '120', '1', '0', '00:00:00', '00:00:00', '1', '0', '6', '1');
INSERT INTO `caipiao_caipiao` VALUES ('102', 'pk10', '北京PK10', '全天179期', '09:06:00', '23:56:00', '179', 'bjpk10', '60', '1', '0', '00:00:00', '00:00:00', '1', '0', '7', '1');
INSERT INTO `caipiao_caipiao` VALUES ('103', 'keno', '北京快乐8', '全天179期', '09:05:05', '23:55:05', '179', 'bjkeno', '60', '1', '0', '00:00:00', '00:00:00', '1', '0', '8', '1');
INSERT INTO `caipiao_caipiao` VALUES ('104', 'x5', '广东11选5', '全天84期', '09:11:00', '23:01:00', '84', 'gd11x5', '120', '1', '0', '00:00:00', '00:00:00', '1', '0', '11', '1');
INSERT INTO `caipiao_caipiao` VALUES ('105', 'x5', '上海11选5', '全天90期', '08:59:00', '23:49:00', '90', 'sh11x5', '120', '1', '0', '00:00:00', '00:00:00', '1', '0', '21', '2');
INSERT INTO `caipiao_caipiao` VALUES ('107', 'x5', '江西11选5', '全天84期', '09:10:00', ' 23:00:0', '84', 'jx11x5', '120', '1', '0', '00:00:00', '00:00:00', '1', '0', '23', '4');
INSERT INTO `caipiao_caipiao` VALUES ('108', 'dpc', '福彩3D', '全天一期', '21:15:00', '21:15:00', '1', 'fc3d', '600', '1', '0', '00:00:00', '00:00:00', '1', '0', '24', '1');
INSERT INTO `caipiao_caipiao` VALUES ('109', 'dpc', '排列三', '全天一期', '20:30:00', '20:30:00', '1', 'pl3', '600', '1', '0', '00:00:00', '00:00:00', '1', '0', '25', '2');
INSERT INTO `caipiao_caipiao` VALUES ('111', 'dpc', '好运3D', '5分钟1期', null, null, '0', 'df3d', '60', '0', '1', '08:50:00', '23:00:00', '5', '1', '26', '110');
INSERT INTO `caipiao_caipiao` VALUES ('112', 'x5', '好运11选5', '5分钟1期', null, null, '0', 'df11x5', '60', '0', '1', '08:50:00', '23:30:00', '5', '1', '10', '112');
INSERT INTO `caipiao_caipiao` VALUES ('113', 'keno', '好运快乐8', '2分钟1期', null, null, '0', 'dfkeno', '30', '0', '1', '08:50:00', '22:30:00', '2', '1', '28', '113');
INSERT INTO `caipiao_caipiao` VALUES ('114', 'pk10', '好运PK10', '2分钟1期', null, null, '0', 'dfpk10', '30', '0', '1', '09:30:00', '23:30:00', '5', '1', '27', '114');
INSERT INTO `caipiao_caipiao` VALUES ('115', 'k3', '甘肃快3', '全天72期', null, null, '72', 'gsk3', '120', '1', '0', '00:00:00', '00:00:00', '1', '0', '13', '13');
INSERT INTO `caipiao_caipiao` VALUES ('116', 'k3', '一分彩', '激情1分钟', null, null, '0', 'ffk3', '10', '1', '1', '08:30:00', '23:30:00', '1', '0', '0', '1');
