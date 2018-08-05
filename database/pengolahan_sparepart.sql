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

 Date: 01/08/2018 19:47:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `nik` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
BEGIN;
INSERT INTO `karyawan` VALUES (123456789, 'Bella', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'mekanik', 'admin');
INSERT INTO `karyawan` VALUES (199267245, 'Jajang Rihandi', 'jajang', '21232f297a57a5a743894a0e4a801fc3', 'mekanik', 'mekanik');
INSERT INTO `karyawan` VALUES (201502445, 'Owi', 'mekanik', '21232f297a57a5a743894a0e4a801fc3', 'mekanik', 'mekanik');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mesins
-- ----------------------------
BEGIN;
INSERT INTO `mesins` VALUES (1, 'Mesin Bubut', NULL, '2018-07-25 06:05:12', '2018-07-25 06:05:16');
INSERT INTO `mesins` VALUES (2, 'Mesin Bor', NULL, '2018-07-25 06:05:32', '2018-07-25 06:05:37');
INSERT INTO `mesins` VALUES (3, 'Mesin LAS', 'tes', '2018-07-24 23:26:33', '2018-07-24 23:26:33');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of received_parts
-- ----------------------------
BEGIN;
INSERT INTO `received_parts` VALUES (5, 'INV-001', '151890-001', 1, 1, '2018-07-24 22:13:14', '2018-07-24 22:13:14');
INSERT INTO `received_parts` VALUES (6, 'INV-002', '153141-001', 4, 4, '2018-07-24 22:13:23', '2018-07-24 22:13:23');
INSERT INTO `received_parts` VALUES (7, 'INV-003', '8877', 1, 5, '2018-07-24 22:13:32', '2018-07-24 22:13:32');
COMMIT;

-- ----------------------------
-- Table structure for request_spareparts
-- ----------------------------
DROP TABLE IF EXISTS `request_spareparts`;
CREATE TABLE `request_spareparts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(191) NOT NULL,
  `kode_part` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of request_spareparts
-- ----------------------------
BEGIN;
INSERT INTO `request_spareparts` VALUES (1, '887766', '152923-001', 2, 'Canceled', '2016-07-18', NULL, '2018-07-28 09:48:11');
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
INSERT INTO `spareparts` VALUES (1, '151890-001', 'Stopper Rubber', 10, 50000, NULL, NULL);
INSERT INTO `spareparts` VALUES (2, '151951-001', 'Spring', 11, 50000, NULL, NULL);
INSERT INTO `spareparts` VALUES (3, '152923-001', 'Thread Timmer Roller', 10, 50000, NULL, NULL);
INSERT INTO `spareparts` VALUES (4, '153141-001', 'Roller Holder Cover', 10, 10000, NULL, NULL);
INSERT INTO `spareparts` VALUES (5, '8877', 'baut', 10, 900, '2018-07-22 02:19:23', '2018-07-22 02:19:23');
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
INSERT INTO `suppliers` VALUES (1, 'CV.  SEMPURNA TECH', 'Tangerang', '081212121212', NULL, NULL);
INSERT INTO `suppliers` VALUES (2, 'PT STARINDO GEMILANG', 'Jakarta', '085656565656', NULL, NULL);
INSERT INTO `suppliers` VALUES (3, 'CV. PELANGI', 'Tangerang', '083838383838', NULL, NULL);
INSERT INTO `suppliers` VALUES (4, 'Sinar Jaya', 'serpong', '0899881122', '2018-07-22 02:46:27', '2018-07-22 02:46:27');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, '990099', 'owai', 'owai@mail.com', '$2y$10$LlRiRXhk6LKf1LIlODYBfe1SoHEy1GP2KEtA.sKYY/P7VtnlVCq92', 'mekanik', 'admin', 'V0lMHqXN7zlKSnVMf88I6k27Xr86rsAd8iqWhEboFLg4D0kt2QUrocy2tw4t', '2018-07-21 16:24:52', '2018-07-21 16:24:52');
INSERT INTO `users` VALUES (2, '887766', 'Joko', 'joko@mail.com', '$2y$10$MI1q39ePfbXb57OxgzURduyGkmSHS71FIBbIZZroMLDjmEeBpSYyW', 'mekanik', 'mekanik', '15i0FDBcsJuZ4HJGsZ5pkA3ceASsxss8fqW2OXysT3PX07I29DQe3rCOmy7w', '2018-07-21 18:13:41', '2018-07-21 18:13:41');
INSERT INTO `users` VALUES (3, '121299', 'iwang', 'iwang@mail.com', '$2y$10$J.qmlVz2lUkFj9VGEG.QAu5fPBc2XLqHtJkuHX1G9/FMgUiTt/gXy', 'mekanik', 'mekanik', NULL, '2018-07-22 02:32:24', '2018-07-22 02:32:24');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
