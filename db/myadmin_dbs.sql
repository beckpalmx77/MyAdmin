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

 Date: 11/09/2021 14:35:26
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
-- Table structure for ims_category
-- ----------------------------
DROP TABLE IF EXISTS `ims_category`;
CREATE TABLE `ims_category`  (
  `categoryid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`categoryid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_category
-- ----------------------------
INSERT INTO `ims_category` VALUES (1, 'Mobile', 'active');
INSERT INTO `ims_category` VALUES (2, 'Laptop', 'active');

-- ----------------------------
-- Table structure for ims_customer
-- ----------------------------
DROP TABLE IF EXISTS `ims_customer`;
CREATE TABLE `ims_customer`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` int NOT NULL,
  `balance` double(10, 2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_customer
-- ----------------------------
INSERT INTO `ims_customer` VALUES (1, 'Smith', 'London,UK', 123456789, 120000.00);
INSERT INTO `ims_customer` VALUES (2, 'Adam', 'Newyork, USA', 987654321, 200000.00);
INSERT INTO `ims_customer` VALUES (4, 'Garry', 'Paris, France', 2147483647, 560000.00);

-- ----------------------------
-- Table structure for ims_order
-- ----------------------------
DROP TABLE IF EXISTS `ims_order`;
CREATE TABLE `ims_order`  (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_shipped` int NOT NULL,
  `customer_id` int NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_order
-- ----------------------------
INSERT INTO `ims_order` VALUES (2, '2', 50, 4, '2019-04-15 19:16:33');
INSERT INTO `ims_order` VALUES (3, '1', 20, 2, '2019-04-16 17:48:29');

-- ----------------------------
-- Table structure for ims_product
-- ----------------------------
DROP TABLE IF EXISTS `ims_product`;
CREATE TABLE `ims_product`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
INSERT INTO `ims_product` VALUES (1, 'EL-MB001', 'Apple iPhone 8 ', 'iphone 6s mobile', 15.00, 'U-0001', 'Inactive', '2021-09-11 14:23:55', 'product-001.png');
INSERT INTO `ims_product` VALUES (2, 'EL-MB002', 'samsung galaxy', 'ddsgds', 15.00, 'U-0001', 'Active', '2021-09-11 11:48:35', 'product-001.png');
INSERT INTO `ims_product` VALUES (3, 'EL-MB003', 'iphone 7', 'iphone 7 mobile', 13.00, 'U-0001', 'Active', '2021-09-11 11:48:41', 'product-001.png');
INSERT INTO `ims_product` VALUES (4, 'EL-MB004', 'Apple Iphone 12 ', '-', 20.00, 'U-0001', 'Active', '2021-09-11 11:48:47', 'product-001.png');
INSERT INTO `ims_product` VALUES (5, 'OF-PN001', 'ปากกาสีน้ำเงิน', '-', 50.00, 'U-0003', 'Active', '2021-09-11 11:48:56', 'product-001.png');

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
  `supplier_id` int NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`supplier_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ims_supplier
-- ----------------------------
INSERT INTO `ims_supplier` VALUES (1, 'Grant', '574575373734', 'Africa', 'active');
INSERT INTO `ims_supplier` VALUES (3, 'David d', '11111111111', 'New Delhi', 'active');
INSERT INTO `ims_supplier` VALUES (4, 'Warner', '55555555555', 'Australia', 'active');

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
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
INSERT INTO `ims_user` VALUES (1, 1, 'admin@myadmin.com', 'admin@myadmin.com', 'ADMIN', 'PHP', '$2y$10$C0z1CwgBGUcCqIqlhcz65O1Zdi1H1YIiuqw/oGlzlj5IDdX/jHluC', 'admin', 'Active', 'img/icon/admin-001.png', 'th');
INSERT INTO `ims_user` VALUES (2, 2, 'user@myadmin.com', 'user@myadmin.com', 'USER', 'PHP', '$2y$10$HPBYteBtDxT1a0O/zV2G4uuihCQle6ax0e81iJok8/a/hadP2ujQe', 'member', 'Active', 'img/icon/user-001.png', 'th');
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
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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

-- ----------------------------
-- View structure for vims_product
-- ----------------------------
DROP VIEW IF EXISTS `vims_product`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vims_product` AS SELECT ims_product.*,ims_unit.unit_name as unit_name FROM ims_product
             left join ims_unit 
             on ims_unit.unit_id = ims_product.unit_id ;

SET FOREIGN_KEY_CHECKS = 1;
