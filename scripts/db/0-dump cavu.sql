/*
 Navicat Premium Dump SQL

 Source Server         : targetek_edenpani
 Source Server Type    : MySQL
 Source Server Version : 100620 (10.6.20-MariaDB-cll-lve)
 Source Host           : targetek.ae:3306
 Source Schema         : targetek_CAVU

 Target Server Type    : MySQL
 Target Server Version : 100620 (10.6.20-MariaDB-cll-lve)
 File Encoding         : 65001

 Date: 07/03/2025 12:10:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for RequestPoints
-- ----------------------------
DROP TABLE IF EXISTS `RequestPoints`;
CREATE TABLE `RequestPoints`  (
  `PointID` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `RequestID` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Latitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Longitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`PointID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of RequestPoints
-- ----------------------------
INSERT INTO `RequestPoints` VALUES ('19A81B51-E121-45CB-88E6-B844DA0CFD9E', '418A2704-15D3-41E8-A5E5-2433268EE97C', '28.47231677514683', ' 75.96780691742899');
INSERT INTO `RequestPoints` VALUES ('50DD8916-9B61-4EAF-A216-F12BFB55B4C0', '418A2704-15D3-41E8-A5E5-2433268EE97C', '28.1918786993497', ' 77.93435965180399');
INSERT INTO `RequestPoints` VALUES ('59766B20-7F6E-41EB-A824-0DC032297628', '22C0A9A6-79A3-42CC-A2AB-77B62797880A', '29.74411311357304', ' 76.36880789399149');
INSERT INTO `RequestPoints` VALUES ('C49856ED-0801-487E-A108-394075CB69FB', '22C0A9A6-79A3-42CC-A2AB-77B62797880A', '28.42884906757866', ' 75.60525808930399');
INSERT INTO `RequestPoints` VALUES ('CF5B0F63-6CF9-4A3C-8271-02403B0097BF', '29D5AA62-2517-4C9F-B814-32E9AC104152', '  ', NULL);
INSERT INTO `RequestPoints` VALUES ('DB9E5E89-B13A-40C8-81DB-6BA5AE294401', '418A2704-15D3-41E8-A5E5-2433268EE97C', '29.476669489963157', ' 76.56106863617899');
INSERT INTO `RequestPoints` VALUES ('E16342EC-34FA-4743-8615-115E57C365C5', '22C0A9A6-79A3-42CC-A2AB-77B62797880A', '28.28866505577025', ' 77.50589285492899');
INSERT INTO `RequestPoints` VALUES ('F3690362-915D-4CAB-A93A-1ACC692C7544', '22C0A9A6-79A3-42CC-A2AB-77B62797880A', '29.562710858462694', ' 77.80252371430399');

-- ----------------------------
-- Table structure for UserRequests
-- ----------------------------
DROP TABLE IF EXISTS `UserRequests`;
CREATE TABLE `UserRequests`  (
  `RequestID` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `UserID` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `RequestTitle` varbinary(255) NULL DEFAULT NULL,
  `Date` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `RequestDescription` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`RequestID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of UserRequests
-- ----------------------------
INSERT INTO `UserRequests` VALUES ('22C0A9A6-79A3-42CC-A2AB-77B62797880A', '27399E62-00FE-4C57-82B9-FD4F3A163FBD', 0x7469746C65, '2025-02-12 10:55:05 am', 'description');
INSERT INTO `UserRequests` VALUES ('29D5AA62-2517-4C9F-B814-32E9AC104152', '27399E62-00FE-4C57-82B9-FD4F3A163FBD', 0x7469746C65, '2025-02-14 11:17:05 am', 'description');
INSERT INTO `UserRequests` VALUES ('418A2704-15D3-41E8-A5E5-2433268EE97C', '27399E62-00FE-4C57-82B9-FD4F3A163FBD', 0x7469746C65, '2025-02-14 11:17:13 am', 'description');

-- ----------------------------
-- Table structure for Users
-- ----------------------------
DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users`  (
  `UserID` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Active` int NULL DEFAULT NULL,
  `FirstName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `LastName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`UserID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of Users
-- ----------------------------
INSERT INTO `Users` VALUES ('27399E62-00FE-4C57-82B9-FD4F3A163FBD', 'asdasd', 'asd', 'asdasd', NULL, 'name', 'family');
INSERT INTO `Users` VALUES ('6153403E-D2A2-43EE-B7BC-9D655684B717', 'wenet', 'ea96c09548fca37a398e9bf711346350', 'wenet', NULL, 'name', 'family');

SET FOREIGN_KEY_CHECKS = 1;
