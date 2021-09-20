/*
 Navicat Premium Data Transfer

 Source Server         : MySQL-LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : myadmin_dbs

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 20/09/2021 15:13:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ims_brand
-- ----------------------------
DROP TABLE IF EXISTS `ims_brand`;
CREATE TABLE `ims_brand`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoryid` int NOT NULL,
  `bname` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_brand
-- ----------------------------
INSERT INTO `ims_brand` VALUES (2, 1, 'Apple', 'active');
INSERT INTO `ims_brand` VALUES (4, 2, 'Samsung', 'active');

-- ----------------------------
-- Table structure for ims_customer
-- ----------------------------
DROP TABLE IF EXISTS `ims_customer`;
CREATE TABLE `ims_customer`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `balance` double(10, 2) NULL DEFAULT 0.00,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_customer
-- ----------------------------
INSERT INTO `ims_customer` VALUES (1, 'C-0001', 'โรนัลโด', 'London,UK', '123456789', 0.00, 'Active');
INSERT INTO `ims_customer` VALUES (2, 'C-0002', 'เบคแฮม', 'Newyork, USA', '987654321', 0.00, 'Active');
INSERT INTO `ims_customer` VALUES (3, 'C-0003', 'แกรี่ มัวร์', 'Paris, France', '2147483647', 0.00, 'Active');
INSERT INTO `ims_customer` VALUES (9, 'C-0004', 'ไมเคิล', 'หนองบุญมาก ', '0900105656', 0.00, 'Active');

-- ----------------------------
-- Table structure for ims_order_detail
-- ----------------------------
DROP TABLE IF EXISTS `ims_order_detail`;
CREATE TABLE `ims_order_detail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `doc_no` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `doc_date` date NULL DEFAULT NULL,
  `line_no` int NOT NULL,
  `product_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ims_order_detail
-- ----------------------------
INSERT INTO `ims_order_detail` VALUES (5, '2021-ORD-000006', '2021-09-14', 1, 'EL-MB001', 'U-0001', '2', '2021-09-15 08:26:33');
INSERT INTO `ims_order_detail` VALUES (6, '2021-ORD-000006', '2021-09-14', 2, 'EL-MB002', 'U-0001', '5', '2021-09-15 08:26:33');
INSERT INTO `ims_order_detail` VALUES (7, '2021-ORD-000006', '2021-09-14', 3, 'EL-MB003', 'U-0001', '4', '2021-09-15 08:26:33');
INSERT INTO `ims_order_detail` VALUES (8, '2021-ORD-000006', '2021-09-14', 4, 'EL-MB001', 'U-0001', '2', '2021-09-16 11:49:18');
INSERT INTO `ims_order_detail` VALUES (9, '2021-ORD-000006', '2021-09-14', 5, 'EL-MB002', 'U-0001', '5', '2021-09-16 11:49:19');
INSERT INTO `ims_order_detail` VALUES (38, '2021-ORD-000025', '2021-09-17', 1, 'EL-MB003', 'U-0001', '8', '2021-09-17 17:09:55');
INSERT INTO `ims_order_detail` VALUES (39, '2021-ORD-000025', '2021-09-17', 2, 'OF-PN001', 'U-0003', '65', '2021-09-17 23:52:24');
INSERT INTO `ims_order_detail` VALUES (40, '2021-ORD-000025', '2021-09-17', 3, 'EL-MB001', 'U-0001', '4', '2021-09-18 11:04:47');
INSERT INTO `ims_order_detail` VALUES (41, '2021-ORD-000025', '2021-09-17', 4, 'EL-MB002', 'U-0001', '6', '2021-09-18 11:54:17');
INSERT INTO `ims_order_detail` VALUES (42, '2021-ORD-000026', '2021-09-18', 1, 'EL-MB003', 'U-0001', '5', '2021-09-18 14:52:22');
INSERT INTO `ims_order_detail` VALUES (47, '2021-ORD-000027', '2021-09-18', 1, 'EL-MB001', 'U-0001', '8', '2021-09-18 15:19:09');
INSERT INTO `ims_order_detail` VALUES (48, '2021-ORD-000001', '2021-09-14', 1, 'EL-MB001', 'U-0001', '3', '2021-09-20 11:58:26');
INSERT INTO `ims_order_detail` VALUES (49, '2021-ORD-000027', '2021-09-18', 2, 'EL-MB003', 'U-0001', 'ุ6', '2021-09-20 14:34:23');

-- ----------------------------
-- Table structure for ims_order_detail_temp
-- ----------------------------
DROP TABLE IF EXISTS `ims_order_detail_temp`;
CREATE TABLE `ims_order_detail_temp`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `doc_no` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `doc_date` date NULL DEFAULT NULL,
  `line_no` int NOT NULL,
  `product_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ims_order_detail_temp
-- ----------------------------
INSERT INTO `ims_order_detail_temp` VALUES (78, 'npVorYwWbm@KABG:1631953082868', '2021-09-18', 1, 'EL-MB001', 'U-0001', '8', '2021-09-18 15:18:18');

-- ----------------------------
-- Table structure for ims_order_master
-- ----------------------------
DROP TABLE IF EXISTS `ims_order_master`;
CREATE TABLE `ims_order_master`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `doc_no` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `doc_year` int NULL DEFAULT NULL,
  `doc_runno` int NULL DEFAULT NULL,
  `customer_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `doc_date` date NULL DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Active',
  `KeyAddData` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_order_master
-- ----------------------------
INSERT INTO `ims_order_master` VALUES (16, '2021-ORD-000001', 2021, 1, 'C-0002', '2021-09-14', '2021-09-14 11:14:56', 'Active', NULL);
INSERT INTO `ims_order_master` VALUES (17, '2021-ORD-000002', 2021, 2, 'C-0002', '2021-09-14', '2021-09-14 11:17:16', 'Active', NULL);
INSERT INTO `ims_order_master` VALUES (18, '2021-ORD-000003', 2021, 3, 'C-0001', '2021-09-14', '2021-09-14 11:18:01', 'Active', NULL);
INSERT INTO `ims_order_master` VALUES (19, '2021-ORD-000004', 2021, 4, 'C-0001', '2021-09-13', '2021-09-14 11:40:49', 'Active', NULL);
INSERT INTO `ims_order_master` VALUES (20, '2021-ORD-000005', 2021, 5, 'C-0001', '2021-09-14', '2021-09-14 13:49:48', 'Active', NULL);
INSERT INTO `ims_order_master` VALUES (21, '2021-ORD-000006', 2021, 6, 'C-0001', '2021-09-15', '2021-09-15 10:14:01', 'Active', NULL);
INSERT INTO `ims_order_master` VALUES (22, '2021-ORD-000007', 2021, 7, 'C-0001', '2021-09-17', '2021-09-17 15:48:02', 'Active', NULL);
INSERT INTO `ims_order_master` VALUES (23, '2021-ORD-000008', 2021, 8, 'C-0003', '2021-09-17', '2021-09-17 15:56:13', 'Active', NULL);
INSERT INTO `ims_order_master` VALUES (24, '2021-ORD-000009', 2021, 9, 'C-0002', '2021-09-16', '2021-09-17 15:58:10', 'Active', NULL);
INSERT INTO `ims_order_master` VALUES (40, '2021-ORD-000025', 2021, 25, 'C-0001', '2021-09-17', '2021-09-17 17:09:55', 'Active', 'L!RMQE-6Lc+Btrf:1631873381706');
INSERT INTO `ims_order_master` VALUES (41, '2021-ORD-000026', 2021, 26, 'C-0003', '2021-09-18', '2021-09-18 14:52:22', 'Active', 'nXJM8@XWjz!OTF1:1631951474158');
INSERT INTO `ims_order_master` VALUES (42, '2021-ORD-000027', 2021, 27, 'C-0001', '2021-09-18', '2021-09-18 15:19:09', 'Active', 'npVorYwWbm@KABG:1631953082868');

-- ----------------------------
-- Table structure for ims_pgroup
-- ----------------------------
DROP TABLE IF EXISTS `ims_pgroup`;
CREATE TABLE `ims_pgroup`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pgroup_id` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pgroup_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ims_pgroup
-- ----------------------------
INSERT INTO `ims_pgroup` VALUES (3, 'EL', 'เครื่องใช้ไฟฟ้า-ZX', 'Active');
INSERT INTO `ims_pgroup` VALUES (4, 'MB', 'โทรศัพท์', 'Active');
INSERT INTO `ims_pgroup` VALUES (5, 'GN', 'ของใช้ทั่วไป', 'Active');
INSERT INTO `ims_pgroup` VALUES (6, 'CA', 'เครื่องยนต์ อะไหล่ยนต์', 'Active');

-- ----------------------------
-- Table structure for ims_product
-- ----------------------------
DROP TABLE IF EXISTS `ims_product`;
CREATE TABLE `ims_product`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pgroup_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name_t` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '-',
  `name_e` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '-',
  `quantity` double(11, 2) NOT NULL DEFAULT 0.00,
  `unit_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '-',
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'img/icon/product-001.png',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_product
-- ----------------------------
INSERT INTO `ims_product` VALUES (1, 'EL-MB001', 'MB', 'หัวเหว่ย 7 SE', 'iphone 6s mobile', 15.00, 'U-0001', 'Active', '2021-09-13 14:55:34', 'product-001.png');
INSERT INTO `ims_product` VALUES (2, 'EL-MB002', 'MB', 'samsung galaxy', 'ddsgds', 15.00, 'U-0001', 'Active', '2021-09-15 10:26:11', 'product-001.png');
INSERT INTO `ims_product` VALUES (3, 'EL-MB003', 'MB', 'iphone 7', 'iphone 7 mobile', 13.00, 'U-0001', 'Active', '2021-09-15 10:26:12', 'product-001.png');
INSERT INTO `ims_product` VALUES (4, 'EL-MB004', 'MB', 'Apple Iphone 12 ไอโฟน ', '-', 20.00, 'U-0001', 'Active', '2021-09-20 09:01:25', 'product-001.png');
INSERT INTO `ims_product` VALUES (5, 'OF-PN001', 'MB', 'ปากกาสีน้ำเงิน', '-', 50.00, 'U-0003', 'Active', '2021-09-15 10:26:17', 'product-001.png');

-- ----------------------------
-- Table structure for ims_purchase
-- ----------------------------
DROP TABLE IF EXISTS `ims_purchase`;
CREATE TABLE `ims_purchase`  (
  `purchase_id` int NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`purchase_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_purchase
-- ----------------------------
INSERT INTO `ims_purchase` VALUES (5, '1', '3', '45', '2019-04-15 18:46:36');
INSERT INTO `ims_purchase` VALUES (6, '3', '2', '13', '2019-04-15 18:55:51');
INSERT INTO `ims_purchase` VALUES (7, '4', '1', '5', '2019-04-15 18:56:02');

-- ----------------------------
-- Table structure for ims_supplier
-- ----------------------------
DROP TABLE IF EXISTS `ims_supplier`;
CREATE TABLE `ims_supplier`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supplier_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_supplier
-- ----------------------------
INSERT INTO `ims_supplier` VALUES (1, 'S-0001', 'Grant', 'Africa', '574575373734', 'Active');
INSERT INTO `ims_supplier` VALUES (3, 'S-0002', 'David d', 'New Delhi', '11111111111', 'Active');
INSERT INTO `ims_supplier` VALUES (5, 'S-0005', 'ดูโฮม', '112', '0440656565', 'Active');

-- ----------------------------
-- Table structure for ims_unit
-- ----------------------------
DROP TABLE IF EXISTS `ims_unit`;
CREATE TABLE `ims_unit`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ims_unit
-- ----------------------------
INSERT INTO `ims_unit` VALUES (1, 'U-0001', 'เครื่อง', 'Active');
INSERT INTO `ims_unit` VALUES (2, 'U-0002', 'แพ๊ค', 'Active');
INSERT INTO `ims_unit` VALUES (3, 'U-0003', 'กล่อง', 'Active');
INSERT INTO `ims_unit` VALUES (4, 'U-0004', 'เครื่อง - 4', 'Inactive');
INSERT INTO `ims_unit` VALUES (5, 'U-0005', 'เครื่อง - 5', 'Active');
INSERT INTO `ims_unit` VALUES (6, 'U-0006', 'เครื่อง - 6', 'Active');
INSERT INTO `ims_unit` VALUES (7, 'U-0007', 'เครื่อง - 7', 'Active');
INSERT INTO `ims_unit` VALUES (8, 'U-0008', 'เครื่อง - 8', 'Active');
INSERT INTO `ims_unit` VALUES (9, 'U-0009', 'เครื่อง - 9', 'Active');
INSERT INTO `ims_unit` VALUES (10, 'U-0010', 'เครื่อง - 10', 'Active');
INSERT INTO `ims_unit` VALUES (11, 'U-0011', 'เครื่อง - 11', 'Active');
INSERT INTO `ims_unit` VALUES (12, 'U-0012', 'เครื่อง - 12', 'Active');
INSERT INTO `ims_unit` VALUES (13, 'U-0013', 'เครื่อง - 13', 'Active');
INSERT INTO `ims_unit` VALUES (14, 'U-0014', 'เครื่อง - 14', 'Active');
INSERT INTO `ims_unit` VALUES (15, 'U-0015', 'เครื่อง - 15', 'Active');
INSERT INTO `ims_unit` VALUES (16, 'U-0016', 'เครื่อง - 16', 'Active');
INSERT INTO `ims_unit` VALUES (17, 'U-0017', 'เครื่อง - 17', 'Active');
INSERT INTO `ims_unit` VALUES (18, 'U-0018', 'เครื่อง - 18', 'Active');
INSERT INTO `ims_unit` VALUES (19, 'U-0019', 'เครื่อง - 19', 'Active');
INSERT INTO `ims_unit` VALUES (20, 'U-0020', 'เครื่อง - 20', 'Active');
INSERT INTO `ims_unit` VALUES (21, 'U-0021', 'นิ้ว', 'Active');
INSERT INTO `ims_unit` VALUES (22, 'U-0022', 'ลิตร', 'Active');
INSERT INTO `ims_unit` VALUES (23, 'U-0023', 'หลา', 'Active');
INSERT INTO `ims_unit` VALUES (24, 'U-0024', 'โหล', 'Active');
INSERT INTO `ims_unit` VALUES (25, 'U-0025', 'ขวด', 'Active');
INSERT INTO `ims_unit` VALUES (26, 'U-0026', 'อัน', 'Active');
INSERT INTO `ims_unit` VALUES (27, 'U-0027', 'หุน', 'Active');

-- ----------------------------
-- Table structure for ims_user
-- ----------------------------
DROP TABLE IF EXISTS `ims_user`;
CREATE TABLE `ims_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `line_no` int NULL DEFAULT NULL,
  `user_id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `account_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_user
-- ----------------------------
INSERT INTO `ims_user` VALUES (1, 1, 'admin@myadmin.com', 'admin@myadmin.com', 'ADMIN', 'STOCK', '$2y$10$C0z1CwgBGUcCqIqlhcz65O1Zdi1H1YIiuqw/oGlzlj5IDdX/jHluC', 'admin', 'Active', 'img/icon/admin-001.png', 'th');
INSERT INTO `ims_user` VALUES (2, 2, 'user@myadmin.com', 'user@myadmin.com', 'USER', 'STOCK', '$2y$10$HPBYteBtDxT1a0O/zV2G4uuihCQle6ax0e81iJok8/a/hadP2ujQe', 'member', 'Active', 'img/icon/user-001.png', 'th');
INSERT INTO `ims_user` VALUES (5, 3, 'User001@gmail.com', 'User001@gmail.com', 'User001', 'APPDATA1', '$2y$10$HPBYteBtDxT1a0O/zV2G4uuihCQle6ax0e81iJok8/a/hadP2ujQe', 'member', 'Active', 'img/icon/user-001.png', NULL);
INSERT INTO `ims_user` VALUES (6, 4, 'user003@rmail.com', 'user003@rmail.com', 'USER003', 'ASD', '$2y$10$HPBYteBtDxT1a0O/zV2G4uuihCQle6ax0e81iJok8/a/hadP2ujQe', 'member', 'Active', 'img/icon/user-001.png', NULL);
INSERT INTO `ims_user` VALUES (7, 5, 'admin001@myadmin.com', 'admin001@myadmin.com', 'Admin', 'Thai', '$2y$10$8VqAMP15iQYies0xqrA9r.otqBnbtiKtXGNxJpu2JlFPYEwYIABkq', 'member', 'Active', 'img/icon/user-001.png', NULL);

-- ----------------------------
-- Table structure for menu_main
-- ----------------------------
DROP TABLE IF EXISTS `menu_main`;
CREATE TABLE `menu_main`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `main_menu_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `label_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `target` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sort` int NULL DEFAULT 0,
  `privilege` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `data_target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `aria_controls` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_main
-- ----------------------------
INSERT INTO `menu_main` VALUES (1, 'M001', 'กำหนดระบบ', 'Initial System', '#', '', 'fa fa-cogs', 1, '2', '#InitSystem', 'InitSystem');
INSERT INTO `menu_main` VALUES (2, 'M002', 'ทะเบียนหลัก', 'Master', '#', '', 'fa fa-list', 2, '2', '#Master', 'Master');
INSERT INTO `menu_main` VALUES (3, 'M003', 'บันทึกข้อมูลหลัก', 'Main Data', '#', '', 'fa fa-table', 3, '2', '#MainData', 'MainData');
INSERT INTO `menu_main` VALUES (4, 'M004', 'บันทึกเอกสาร', 'Document', '#', '', 'fa fa-tasks', 4, '2', '#Document', 'Document');
INSERT INTO `menu_main` VALUES (6, 'M005', 'ค้นหาข้อมูล', 'Search Data', '#', NULL, 'fa fa-search', 5, '1', '#SearchData', 'SearchData');

-- ----------------------------
-- Table structure for menu_sub
-- ----------------------------
DROP TABLE IF EXISTS `menu_sub`;
CREATE TABLE `menu_sub`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `sub_menu_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `main_menu_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `label_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `target` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sort` int NULL DEFAULT 0,
  `privilege` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_sub
-- ----------------------------
INSERT INTO `menu_sub` VALUES (1, 'S101', 'M001', 'สร้างบัญชีผู้ใช้', 'Create User Account', 'create-account.php', '', 'fa fa-user-plus', 1, '1');
INSERT INTO `menu_sub` VALUES (2, 'S102', 'M001', 'จัดการผู้ใช้งานระบบ', 'User Management', 'manage-account.php', '', 'fa fa-user', 2, '1');
INSERT INTO `menu_sub` VALUES (3, 'S103', 'M001', 'เปลี่ยนรหัสผ่าน', 'Change Password', 'change-password.php', '', 'fa fa-key', 3, '2');
INSERT INTO `menu_sub` VALUES (10, 'S104', 'M001', 'จัดการเมนูหลักของระบบ', 'Main Menu ', 'manage-menu-main.php', '', 'fa fa-window-maximize', 4, '1');
INSERT INTO `menu_sub` VALUES (11, 'S105', 'M001', 'จัดการเมนูหน้าจอของระบบ', 'Sub Menu And Screen', 'manage-menu-sub.php', '', 'fa fa-window-restore', 5, '1');
INSERT INTO `menu_sub` VALUES (19, 'S106', 'M001', 'เปลี่ยนภาษา ', 'Change Language', 'change-language.php', NULL, 'fa fa-language', 8, '1');
INSERT INTO `menu_sub` VALUES (24, 'S201', 'M002', 'ทะเบียนสินค้า-อะไหล่', 'Product-Part', 'manage-product.php', NULL, 'fa fa-th', 1, '1');
INSERT INTO `menu_sub` VALUES (25, 'S202', 'M002', 'ทะเบียนหน่วยนับ', 'Unit Code', 'manage-unit.php', NULL, 'fa fa-th', 2, '1');
INSERT INTO `menu_sub` VALUES (26, 'S203', 'M002', 'ทะเบียนกลุ่มสินค้า', 'Product Group', 'manage-product-group.php', NULL, 'fa fa-th', 3, '1');
INSERT INTO `menu_sub` VALUES (27, 'S101', 'M004', 'เอกสารรายการขาย ', 'Order Document', 'manage-order.php', NULL, 'fa fa-list-alt', 1, '1');
INSERT INTO `menu_sub` VALUES (28, 'S301', 'M003', 'ทะเบียนลูกค้า', 'Customer Master', 'manage_customer.php', NULL, 'fa fa-th', 1, '1');
INSERT INTO `menu_sub` VALUES (30, 'S302', 'M003', 'ทะเบียนผู้ขาย', 'Supplier Master', 'manage_supplier.php', NULL, 'fa fa-th', 2, '1');

-- ----------------------------
-- View structure for vims_product
-- ----------------------------
DROP VIEW IF EXISTS `vims_product`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vims_product` AS SELECT ims_product.*,ims_unit.unit_name as unit_name,ims_pgroup.pgroup_name  as pgroup_name FROM ims_product
             left join ims_unit 
             on ims_unit.unit_id = ims_product.unit_id 
             left join ims_pgroup													 
             on ims_pgroup.pgroup_id = ims_product.pgroup_id ;

-- ----------------------------
-- View structure for v_order_detail
-- ----------------------------
DROP VIEW IF EXISTS `v_order_detail`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_order_detail` AS select ord.*,vpd.name_t as product_name,unit.unit_name as unit_name from ims_order_detail ord 
left join vims_product vpd 
on vpd.product_id = ord.product_id
left join ims_unit unit 
on unit.unit_id = ord.unit_id ;

-- ----------------------------
-- View structure for v_order_detail_temp
-- ----------------------------
DROP VIEW IF EXISTS `v_order_detail_temp`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_order_detail_temp` AS select ord.*,vpd.name_t as product_name,unit.unit_name as unit_name from ims_order_detail_temp ord 
left join vims_product vpd 
on vpd.product_id = ord.product_id
left join ims_unit unit 
on unit.unit_id = ord.unit_id ;

-- ----------------------------
-- View structure for v_order_master
-- ----------------------------
DROP VIEW IF EXISTS `v_order_master`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_order_master` AS select ims_order_master.*,ims_customer.customer_name as customer_name 
from ims_order_master 
left join ims_customer 
on ims_customer.customer_id = ims_order_master.customer_id ;

SET FOREIGN_KEY_CHECKS = 1;
