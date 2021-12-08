/*
 Navicat Premium Data Transfer

 Source Server         : bank_mega_interview
 Source Server Type    : MySQL
 Source Server Version : 100330
 Source Host           : 153.92.8.145:3306
 Source Schema         : u6061289_bank_mega

 Target Server Type    : MySQL
 Target Server Version : 100330
 File Encoding         : 65001

 Date: 08/12/2021 13:26:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for crud_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `crud_pegawai`;
CREATE TABLE `crud_pegawai`  (
  `nip` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `divisi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `user_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of crud_pegawai
-- ----------------------------
INSERT INTO `crud_pegawai` VALUES ('232189312', 'Rian', 'ITs', '2021-12-08 06:03:57', '2021-12-08 05:59:23', NULL);

SET FOREIGN_KEY_CHECKS = 1;
