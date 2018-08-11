/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MariaDB
 Source Server Version : 100132
 Source Host           : localhost:3306
 Source Schema         : pengolahan_sparepart

 Target Server Type    : MariaDB
 Target Server Version : 100132
 File Encoding         : 65001

 Date: 11/08/2018 14:41:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mesins
-- ----------------------------
DROP TABLE IF EXISTS `mesins`;
CREATE TABLE `mesins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mesins
-- ----------------------------
BEGIN;
INSERT INTO `mesins` VALUES (1, 'B1', 'Line 1', '2018-08-09 23:43:08', '2018-08-09 23:43:08');
INSERT INTO `mesins` VALUES (2, 'B2', 'Line 1', '2018-08-09 23:43:19', '2018-08-09 23:43:19');
INSERT INTO `mesins` VALUES (3, 'B3', 'Line 2', '2018-08-09 23:43:35', '2018-08-09 23:43:35');
INSERT INTO `mesins` VALUES (4, 'B4', 'Line 2', '2018-08-09 23:43:45', '2018-08-09 23:43:45');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for received_parts
-- ----------------------------
DROP TABLE IF EXISTS `received_parts`;
CREATE TABLE `received_parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(15) NOT NULL,
  `kode_part` varchar(15) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of received_parts
-- ----------------------------
BEGIN;
INSERT INTO `received_parts` VALUES (1, 'INV-001', 'PRT-001', 1, 3, '2018-08-11 07:16:01', '2018-08-11 07:16:01');
INSERT INTO `received_parts` VALUES (2, 'INV-001', 'PRT-002', 1, 6, '2018-08-11 07:16:01', '2018-08-11 07:16:01');
INSERT INTO `received_parts` VALUES (3, 'INV-001', 'PRT-003', 1, 5, '2018-08-11 07:16:01', '2018-08-11 07:16:01');
COMMIT;

-- ----------------------------
-- Table structure for request_spareparts
-- ----------------------------
DROP TABLE IF EXISTS `request_spareparts`;
CREATE TABLE `request_spareparts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_request` varchar(20) NOT NULL,
  `nik` varchar(191) NOT NULL,
  `kode_part` varchar(15) NOT NULL,
  `mesin_id` int(11) NOT NULL,
  `status_request` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of request_spareparts
-- ----------------------------
BEGIN;
INSERT INTO `request_spareparts` VALUES (1, 'REQ-00001', '50051665', 'PRT-001', 1, 'Kerusakan', 1, 'Canceled', '2018-08-09', '2018-08-09 23:47:55', '2018-08-11 06:54:36');
INSERT INTO `request_spareparts` VALUES (2, 'REQ-00001', '50051665', 'PRT-002', 1, 'Kerusakan', 2, 'Canceled', '2018-08-09', '2018-08-09 23:47:55', '2018-08-09 23:47:55');
INSERT INTO `request_spareparts` VALUES (3, 'REQ-00002', '50051667', 'PRT-002', 4, 'Kerusakan', 2, 'Awaiting', '2018-08-11', '2018-08-11 03:44:06', '2018-08-11 03:44:06');
COMMIT;

-- ----------------------------
-- Table structure for spareparts
-- ----------------------------
DROP TABLE IF EXISTS `spareparts`;
CREATE TABLE `spareparts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_part` varchar(15) NOT NULL,
  `nama_part` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spareparts
-- ----------------------------
BEGIN;
INSERT INTO `spareparts` VALUES (1, 'PRT-001', 'Bearing 6006', 20, 50000, '2018-08-09 23:34:01', '2018-08-11 07:16:01');
INSERT INTO `spareparts` VALUES (2, 'PRT-002', 'V Belt B 117', 20, 70000, '2018-08-09 23:34:37', '2018-08-11 07:16:01');
INSERT INTO `spareparts` VALUES (3, 'PRT-003', 'Load Wheel', 25, 400000, '2018-08-09 23:34:57', '2018-08-11 07:16:01');
COMMIT;

-- ----------------------------
-- Table structure for suppliers
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
BEGIN;
INSERT INTO `suppliers` VALUES (1, 'PT Anugrah Jaya Bearing', 'Jakartaa', '087866776677', '2018-08-09 23:39:38', '2018-08-11 06:03:49');
INSERT INTO `suppliers` VALUES (2, 'PT Supreme Belting Perkasa', 'Jakarta', '081277669988', '2018-08-09 23:40:11', '2018-08-09 23:40:11');
INSERT INTO `suppliers` VALUES (3, 'PT Topindo Atlas Asia', 'Jakarta', '085644553366', '2018-08-09 23:40:33', '2018-08-09 23:40:33');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (5, '50051665', 'Nuhrion', 'nuhriono@gmail.com', '$2y$10$gbIEzqlVcO6aHUzYb7HHCuzGFwsKPAw2QFVIaYKE9ksM9iwSWIwZ2', 'mekanik', 'mekanik', 'nnpABIoWUTTWmuOabIYCMhvvlKRn3lP3P7S0SsHVBgh87084yb12Y6o3L3BF', '2018-08-09 14:00:08', '2018-08-11 05:38:37');
INSERT INTO `users` VALUES (6, '50051667', 'Endang Rohiman', 'endang@gmail.com', '$2y$10$7YwQwlcQOr6s1rQd4/yjy.hbwkKXyD489eXJVlB7l1TR9nCyhduu.', 'mekanik', 'mekanik', NULL, '2018-08-09 14:01:17', '2018-08-09 14:01:17');
INSERT INTO `users` VALUES (7, '50051661', 'Darma', 'darma@gmail.com', '$2y$10$YTkUX/5njVreMHbC6qXMuOwVJFHsoMBH7/yM2.zs4hkL.Dlv0MgMm', 'mekanik', 'admin', 'GZJPzIjGpkZ67aXRd49H6HNxtcGNbMvdGa8SM3hDbxN6helpMUIlSYxNMFfF', '2018-08-09 14:10:42', '2018-08-09 14:10:42');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
