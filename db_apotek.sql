-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping structure for table db_apotek.tbl_d_buy_drug
CREATE TABLE IF NOT EXISTS `tbl_d_buy_drug` (
  `id_tdbd` int NOT NULL AUTO_INCREMENT,
  `id_ttbd` int NOT NULL,
  `amount_tdbd` int NOT NULL,
  `unit_price_tdbd` double NOT NULL,
  `subtotal_tdbd` double NOT NULL,
  `discount_tdbd` decimal(20,6) NOT NULL,
  `total_tdbd` double NOT NULL,
  `buy_date_tdbd` date NOT NULL,
  `created_at_tdbd` date NOT NULL,
  `updated_at_tdbd` date NOT NULL,
  PRIMARY KEY (`id_tdbd`) USING BTREE,
  KEY `FK_tbl_d_buy_drug_tbl_t_buy_drug` (`id_ttbd`),
  CONSTRAINT `FK_tbl_d_buy_drug_tbl_t_buy_drug` FOREIGN KEY (`id_ttbd`) REFERENCES `tbl_t_buy_drug` (`id_ttbd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_d_buy_drug: ~0 rows (approximately)

-- Dumping structure for table db_apotek.tbl_d_sell_drug
CREATE TABLE IF NOT EXISTS `tbl_d_sell_drug` (
  `id_tdsd` int NOT NULL AUTO_INCREMENT,
  `id_ttsd` int NOT NULL,
  `amount_tdsd` int NOT NULL,
  `unit_price_tdsd` double NOT NULL DEFAULT '0',
  `subtotal_tdsd` double NOT NULL DEFAULT '0',
  `discount_tdsd` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `total_tdsd` double NOT NULL DEFAULT '0',
  `sell_date_tdsd` date NOT NULL,
  `created_by_tdsd` int NOT NULL DEFAULT '0',
  `created_date_tdsd` timestamp NOT NULL,
  `updated_by_tdsd` int NOT NULL DEFAULT '0',
  `updated_date_tdsd` timestamp NOT NULL,
  PRIMARY KEY (`id_tdsd`) USING BTREE,
  KEY `id_penjualan` (`id_ttsd`) USING BTREE,
  CONSTRAINT `FK_detail_penjualan_tbl_t_sell_drug` FOREIGN KEY (`id_ttsd`) REFERENCES `tbl_t_sell_drug` (`id_ttsd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_d_sell_drug: ~0 rows (approximately)

-- Dumping structure for table db_apotek.tbl_history_stock
CREATE TABLE IF NOT EXISTS `tbl_history_stock` (
  `id_ths` int NOT NULL AUTO_INCREMENT,
  `id_ttbd` int NOT NULL,
  `id_ttsd` int NOT NULL,
  `in_tmus` int DEFAULT NULL,
  `out_tmus` int DEFAULT NULL,
  `created_by_tmus` int NOT NULL,
  `created_date_tmus` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ths`) USING BTREE,
  KEY `kode_obat` (`id_ttbd`) USING BTREE,
  KEY `id_obat` (`id_ttbd`) USING BTREE,
  KEY `FK_tbl_history_stock_tbl_t_sell_drug` (`id_ttsd`),
  CONSTRAINT `FK_tbl_history_stock_tbl_t_buy_drug` FOREIGN KEY (`id_ttbd`) REFERENCES `tbl_t_buy_drug` (`id_ttbd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_history_stock_tbl_t_sell_drug` FOREIGN KEY (`id_ttsd`) REFERENCES `tbl_t_sell_drug` (`id_ttsd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_history_stock: ~0 rows (approximately)

-- Dumping structure for table db_apotek.tbl_m_category
CREATE TABLE IF NOT EXISTS `tbl_m_category` (
  `id_tmc` int NOT NULL AUTO_INCREMENT,
  `name_tmc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_deactivated_tmc` tinyint NOT NULL DEFAULT '0',
  `status_deleted_tmc` int NOT NULL DEFAULT '0',
  `created_by_tmc` int DEFAULT NULL,
  `created_date_tmc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_tmc` int DEFAULT NULL,
  `updated_date_tmc` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tmc`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_m_category: ~8 rows (approximately)
REPLACE INTO `tbl_m_category` (`id_tmc`, `name_tmc`, `status_deactivated_tmc`, `status_deleted_tmc`, `created_by_tmc`, `created_date_tmc`, `updated_by_tmc`, `updated_date_tmc`) VALUES
	(13, 'Bebas', 0, 0, NULL, '2023-12-19 02:01:20', 150, '2023-12-22 02:07:18'),
	(14, 'Bebas Terbatas', 0, 0, NULL, '2023-12-19 02:01:39', NULL, NULL),
	(15, 'Keras', 0, 0, NULL, '2023-12-19 02:06:03', NULL, NULL),
	(16, 'Wajib Apotek', 0, 0, NULL, '2023-12-19 02:06:14', NULL, NULL),
	(17, 'Narkotika', 0, 0, NULL, '2023-12-19 02:06:23', NULL, NULL),
	(18, 'Psikotropika', 0, 0, NULL, '2023-12-19 02:06:32', NULL, NULL),
	(19, 'Herbal Jamu', 0, 0, NULL, '2023-12-19 02:06:45', NULL, NULL),
	(20, 'Fitofarmaka', 0, 0, NULL, '2023-12-19 02:06:55', NULL, NULL),
	(21, 'Herbal Terstandar', 0, 0, NULL, '2023-12-19 02:07:02', NULL, NULL);

-- Dumping structure for table db_apotek.tbl_m_drug
CREATE TABLE IF NOT EXISTS `tbl_m_drug` (
  `id_tmd` int NOT NULL AUTO_INCREMENT,
  `id_tmc` int NOT NULL,
  `id_tmdu` int NOT NULL,
  `brand_tmd` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `name_tmd` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `buy_tmd` double DEFAULT NULL,
  `sale_tmd` double DEFAULT NULL,
  `expired_date_tmd` date DEFAULT NULL,
  `stock_drug_tmd` int DEFAULT NULL,
  `status_tmd` enum('Aktif','Tidak Aktif') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status_deactivated_tmd` tinyint NOT NULL DEFAULT '0',
  `status_deleted_tmd` tinyint NOT NULL DEFAULT '0',
  `created_by_tmd` int DEFAULT NULL,
  `created_date_tmd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_tmd` int DEFAULT NULL,
  `updated_date_tmd` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tmd`),
  KEY `FK_tbl_m_drug_tbl_m_d_unit` (`id_tmdu`),
  KEY `FK_tbl_m_drug_tbl_m_category` (`id_tmc`),
  CONSTRAINT `FK_tbl_m_drug_tbl_m_category` FOREIGN KEY (`id_tmc`) REFERENCES `tbl_m_category` (`id_tmc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_m_drug_tbl_m_d_unit` FOREIGN KEY (`id_tmdu`) REFERENCES `tbl_m_d_unit` (`id_tmdu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_m_drug: ~1 rows (approximately)
REPLACE INTO `tbl_m_drug` (`id_tmd`, `id_tmc`, `id_tmdu`, `brand_tmd`, `name_tmd`, `buy_tmd`, `sale_tmd`, `expired_date_tmd`, `stock_drug_tmd`, `status_tmd`, `status_deactivated_tmd`, `status_deleted_tmd`, `created_by_tmd`, `created_date_tmd`, `updated_by_tmd`, `updated_date_tmd`) VALUES
	(24, 13, 3, 'OBH', 'Combi', 8000, 12000, '2024-01-06', 40, 'Aktif', 0, 0, NULL, '2023-12-19 12:11:21', NULL, '2023-12-27 09:48:43');

-- Dumping structure for table db_apotek.tbl_m_d_unit
CREATE TABLE IF NOT EXISTS `tbl_m_d_unit` (
  `id_tmdu` int NOT NULL AUTO_INCREMENT,
  `name_tmdu` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status_deactivated_tmdu` tinyint NOT NULL DEFAULT '0',
  `status_deleted_tmdu` tinyint NOT NULL DEFAULT '0',
  `created_by_tmdu` int DEFAULT NULL,
  `created_date_tmdu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_tmdu` int DEFAULT NULL,
  `updated_date_tmdu` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tmdu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_m_d_unit: ~4 rows (approximately)
REPLACE INTO `tbl_m_d_unit` (`id_tmdu`, `name_tmdu`, `status_deactivated_tmdu`, `status_deleted_tmdu`, `created_by_tmdu`, `created_date_tmdu`, `updated_by_tmdu`, `updated_date_tmdu`) VALUES
	(1, 'Tablet', 0, 0, NULL, '2023-12-19 02:18:48', NULL, NULL),
	(3, 'Cair', 0, 0, NULL, '2023-12-19 02:19:44', NULL, NULL),
	(4, 'Bubuk', 0, 0, NULL, '2023-12-19 02:19:53', NULL, NULL),
	(5, 'Capsule', 1, 1, NULL, '2023-12-19 02:21:58', 150, '2023-12-22 02:12:31'),
	(6, 'Kapsul', 0, 0, 150, '2023-12-22 02:12:38', 150, '2023-12-22 02:13:01');

-- Dumping structure for table db_apotek.tbl_m_expire
CREATE TABLE IF NOT EXISTS `tbl_m_expire` (
  `id_tme` int NOT NULL AUTO_INCREMENT,
  `id_tmd` int NOT NULL,
  `expire_date_tme` date DEFAULT NULL,
  `status_deactivated_tme` tinyint NOT NULL DEFAULT '0',
  `status_deleted_tme` tinyint NOT NULL DEFAULT '0',
  `created_by_tme` int NOT NULL,
  `created_date_tme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_tme` int DEFAULT NULL,
  `updated_date_tme` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tme`) USING BTREE,
  KEY `id_tmd` (`id_tmd`),
  CONSTRAINT `FK_tbl_m_expire_date_tbl_m_drug` FOREIGN KEY (`id_tmd`) REFERENCES `tbl_m_drug` (`id_tmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_m_expire: ~0 rows (approximately)

-- Dumping structure for table db_apotek.tbl_m_supplier
CREATE TABLE IF NOT EXISTS `tbl_m_supplier` (
  `id_tms` int NOT NULL AUTO_INCREMENT,
  `name_tms` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `city_tms` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contact_tms` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email_tms` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address_tms` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status_deactivated_tms` tinyint NOT NULL DEFAULT '0',
  `status_deleted_tms` tinyint NOT NULL DEFAULT '0',
  `created_by_tms` int NOT NULL,
  `created_date_tms` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_tms` int DEFAULT NULL,
  `updated_date_tms` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tms`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_m_supplier: ~1 rows (approximately)
REPLACE INTO `tbl_m_supplier` (`id_tms`, `name_tms`, `city_tms`, `contact_tms`, `email_tms`, `address_tms`, `status_deactivated_tms`, `status_deleted_tms`, `created_by_tms`, `created_date_tms`, `updated_by_tms`, `updated_date_tms`) VALUES
	(2, 'PT.Test', 'Bekasi', '09097138570187', 'test@gmail.com', 'Cengkong', 0, 0, 150, '2023-12-22 01:50:32', 150, '2023-12-22 02:38:31');

-- Dumping structure for table db_apotek.tbl_m_user
CREATE TABLE IF NOT EXISTS `tbl_m_user` (
  `id_tmu` int NOT NULL AUTO_INCREMENT,
  `nik_tmu` int DEFAULT NULL,
  `name_tmu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address_tmu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender_tmu` enum('Laki-Laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username_tmu` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email_tmu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password_tmu` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role_tmu` enum('Admin','Owner') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `birth_place_tmu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `birth_date_tmu` date DEFAULT NULL,
  `contact_tmu` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_deactivated_tmu` tinyint NOT NULL DEFAULT '0',
  `status_deleted_tmu` tinyint NOT NULL DEFAULT '0',
  `created_by_tmu` int DEFAULT '0',
  `created_date_tmu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_tmu` int DEFAULT NULL,
  `updated_date_tmu` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tmu`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_m_user: ~7 rows (approximately)
REPLACE INTO `tbl_m_user` (`id_tmu`, `nik_tmu`, `name_tmu`, `address_tmu`, `gender_tmu`, `username_tmu`, `email_tmu`, `password_tmu`, `role_tmu`, `birth_place_tmu`, `birth_date_tmu`, `contact_tmu`, `status_deactivated_tmu`, `status_deleted_tmu`, `created_by_tmu`, `created_date_tmu`, `updated_by_tmu`, `updated_date_tmu`) VALUES
	(150, NULL, 'Fajri Yanuar', 'Perumahan Karaba Indah', 'Laki-Laki', 'fajri01', 'fajriyanuar1@gmail.com', '$2y$10$NjiYK095oRwPMIMvl3rEc.jLEF0Jfv00w9A741SUKEIEc2q7.lq56', 'Owner', NULL, NULL, '+6285217861296', 1, 1, NULL, '2023-12-19 00:06:15', NULL, '2023-12-29 09:15:28'),
	(153, NULL, 'fauzan', 'Cengkong', 'Laki-Laki', 'fauzan1', 'fauzans01@gmail.com', '$2y$10$s2wm.getRyprW4yc8DubbuuP6h2g14AFICTRBlUSsmoxF3POrV1km', 'Admin', NULL, NULL, '+628462728926', 1, 1, NULL, '2023-12-21 07:08:06', NULL, NULL),
	(154, NULL, 'Haejoon', 'Perumahan Karaba Indah', 'Laki-Laki', 'haejoon01', 'leehaejoon100@gmail.com', '$2y$10$TmU7MOjAM4C.fPzFYgpR6OMAHlbpKAwz1sxNpmuI.DuG6bpz8qpxy', 'Admin', NULL, NULL, '+6282260019103', 1, 1, NULL, '2023-12-21 08:59:09', 150, '2023-12-29 09:15:41'),
	(155, NULL, 'fadel', 'Terangsari', 'Laki-Laki', 'fadel01', 'fadelraihanas@gmail.com', '$2y$10$lh6a4O8YkIsHJrMwjFd/NeVfCWZlQ9T3wlcW.1y//Bnt0pen.FaYi', 'Owner', NULL, NULL, '+6284627289262', 1, 1, 150, '2023-12-22 11:40:33', 150, '2023-12-29 10:03:42'),
	(156, NULL, 'Fajri Yanuar', 'Perumahan Karaba Indah', 'Laki-Laki', 'fajri01', 'fajriyanuar1@gmail.com', '$2y$10$aEy/.3h6yIh0OEgDz5BYVOXSuhJt75dAgq283KELVOqPOMPI4F3gW', 'Owner', NULL, NULL, '+6285217861296', 0, 0, 150, '2023-12-29 09:16:33', NULL, '2023-12-29 09:16:33'),
	(157, NULL, 'Fauzan', 'Cengkong', 'Laki-Laki', 'fauzan01', 'fauzan@gmail.com', '$2y$10$RVKTsz0c0cDmLaBNpJdfKuQoTujKa0QI3iqcXnzd7BwUd.t3pIqsm', 'Admin', NULL, NULL, '+6285217861295', 1, 1, 150, '2023-12-29 09:17:10', NULL, '2023-12-29 09:18:26'),
	(158, NULL, 'Fauzan', 'Cengkong', 'Laki-Laki', 'fauzan01', 'fauzan@gmail.com', '$2y$10$/WK/aCA3oi88IoEFT0GgLez4pmKYoJNPX1fCE5oTGu.OFjtdtRcVO', 'Admin', NULL, NULL, '+6285217861295', 1, 1, 150, '2023-12-29 09:20:18', NULL, '2023-12-29 09:33:57');

-- Dumping structure for table db_apotek.tbl_notifications
CREATE TABLE IF NOT EXISTS `tbl_notifications` (
  `id_tn` int NOT NULL AUTO_INCREMENT,
  `message_tn` varchar(255) NOT NULL DEFAULT '',
  `expiry_date_tn` datetime NOT NULL,
  `created_at_tn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_apotek.tbl_notifications: ~0 rows (approximately)

-- Dumping structure for table db_apotek.tbl_profile
CREATE TABLE IF NOT EXISTS `tbl_profile` (
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contact` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `so` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `info` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_profile: ~0 rows (approximately)

-- Dumping structure for table db_apotek.tbl_s_opname
CREATE TABLE IF NOT EXISTS `tbl_s_opname` (
  `id_tso` int NOT NULL AUTO_INCREMENT,
  `id_tmd` int NOT NULL,
  `stock_tso` int DEFAULT NULL,
  `real_tso` int DEFAULT NULL,
  `difference_tso` int DEFAULT NULL,
  `description_tso` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `time_tso` date DEFAULT NULL,
  `created_by_tso` int NOT NULL,
  `created_date_tso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by_tso` int DEFAULT NULL,
  `updated_date_tso` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tso`) USING BTREE,
  KEY `id_obat` (`id_tmd`) USING BTREE,
  CONSTRAINT `FK_opname_tbl_m_drug` FOREIGN KEY (`id_tmd`) REFERENCES `tbl_m_drug` (`id_tmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_s_opname: ~1 rows (approximately)
REPLACE INTO `tbl_s_opname` (`id_tso`, `id_tmd`, `stock_tso`, `real_tso`, `difference_tso`, `description_tso`, `time_tso`, `created_by_tso`, `created_date_tso`, `updated_by_tso`, `updated_date_tso`) VALUES
	(7, 24, 50, 47, 3, 'Terjual', '2023-12-23', 150, '2023-12-23 15:14:05', 150, '2023-12-23 15:14:05'),
	(8, 24, 47, 40, 7, 'Terjual', '2023-12-27', 150, '2023-12-27 09:48:43', NULL, '2023-12-27 09:48:43');

-- Dumping structure for table db_apotek.tbl_t_buy_drug
CREATE TABLE IF NOT EXISTS `tbl_t_buy_drug` (
  `id_ttbd` int NOT NULL AUTO_INCREMENT,
  `id_tmd` int NOT NULL,
  `id_tms` int NOT NULL,
  `total_ttbd` double NOT NULL,
  `discount_ttbd` double NOT NULL DEFAULT '0',
  `quantity_ttbd` int NOT NULL,
  `subtotal_ttbd` double NOT NULL,
  `date_buy_ttbd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ttbd`),
  KEY `id_obat` (`id_tmd`),
  KEY `id_tmd` (`id_tmd`),
  KEY `id_supplier` (`id_tms`) USING BTREE,
  CONSTRAINT `FK_tbl_t_buy_drug_tbl_m_supplier` FOREIGN KEY (`id_tms`) REFERENCES `tbl_m_supplier` (`id_tms`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_t_buy_drug_ibfk_1` FOREIGN KEY (`id_tmd`) REFERENCES `tbl_m_drug` (`id_tmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_t_buy_drug: ~0 rows (approximately)

-- Dumping structure for table db_apotek.tbl_t_debt
CREATE TABLE IF NOT EXISTS `tbl_t_debt` (
  `id_ttd` int NOT NULL AUTO_INCREMENT,
  `id_ttbd` int NOT NULL,
  `total_debt_ttd` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ttd`) USING BTREE,
  KEY `FK_tbl_t_hutang_tbl_t_buy_drug` (`id_ttbd`),
  CONSTRAINT `FK_tbl_t_hutang_tbl_t_buy_drug` FOREIGN KEY (`id_ttbd`) REFERENCES `tbl_t_buy_drug` (`id_ttbd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_t_debt: ~0 rows (approximately)

-- Dumping structure for table db_apotek.tbl_t_payment
CREATE TABLE IF NOT EXISTS `tbl_t_payment` (
  `id_ttp` int NOT NULL AUTO_INCREMENT,
  `id_ttd` int NOT NULL,
  `id_ttbd` int NOT NULL,
  `payment_method_ttp` enum('Cash','Debit') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_total_ttp` double NOT NULL DEFAULT '0',
  `payment_date_ttp` date NOT NULL,
  `created_at_ttp` date NOT NULL,
  `updated_at_ttp` date NOT NULL,
  PRIMARY KEY (`id_ttp`) USING BTREE,
  KEY `FK_pembayaran_tbl_t_buy_drug` (`id_ttbd`),
  KEY `id_hutang` (`id_ttd`,`id_ttbd`) USING BTREE,
  CONSTRAINT `FK_pembayaran_tbl_t_buy_drug` FOREIGN KEY (`id_ttbd`) REFERENCES `tbl_t_buy_drug` (`id_ttbd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_pembayaran_tbl_t_hutang` FOREIGN KEY (`id_ttd`) REFERENCES `tbl_t_debt` (`id_ttd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_t_payment: ~0 rows (approximately)

-- Dumping structure for table db_apotek.tbl_t_sell_drug
CREATE TABLE IF NOT EXISTS `tbl_t_sell_drug` (
  `id_ttsd` int NOT NULL AUTO_INCREMENT,
  `id_tmd` int NOT NULL,
  `discount_ttsd` double NOT NULL,
  `total_ttsd` double NOT NULL,
  `sell_date_ttsd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ttsd`),
  KEY `id_tmd` (`id_tmd`),
  CONSTRAINT `FK_tbl_t_sell_drug_tbl_m_drug` FOREIGN KEY (`id_tmd`) REFERENCES `tbl_m_drug` (`id_tmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_apotek.tbl_t_sell_drug: ~0 rows (approximately)

-- Dumping structure for trigger db_apotek.after_insert_buy_drug
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `after_insert_buy_drug` AFTER INSERT ON `tbl_t_buy_drug` FOR EACH ROW BEGIN
    -- Update stock_drug_tmd pada tbl_m_drug
    UPDATE tbl_m_drug SET stock_drug_tmd = stock_drug_tmd + NEW.quantity_ttbd WHERE id_tmd = NEW.id_tmd;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.after_insert_real_tso
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `after_insert_real_tso` AFTER INSERT ON `tbl_s_opname` FOR EACH ROW BEGIN
  UPDATE tbl_m_drug
  SET stock_drug_tmd = NEW.real_tso
  WHERE id_tmd = NEW.id_tmd;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.after_update_update_stock_drug_tmd
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `after_update_update_stock_drug_tmd` AFTER UPDATE ON `tbl_s_opname` FOR EACH ROW BEGIN
  UPDATE tbl_m_drug
  SET stock_drug_tmd = NEW.real_tso
  WHERE id_tmd = NEW.id_tmd;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_insert_category
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_insert_category` BEFORE INSERT ON `tbl_m_category` FOR EACH ROW SET
  NEW.created_date_tmc = NOW(),
  NEW.status_deactivated_tmc = 0,
  NEW.status_deleted_tmc = 0//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_insert_drug
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_insert_drug` BEFORE INSERT ON `tbl_m_drug` FOR EACH ROW SET
  NEW.created_date_tmd = NOW(),
  NEW.status_deactivated_tmd = 0,
  NEW.status_deleted_tmd = 0//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_insert_expire
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_insert_expire` BEFORE INSERT ON `tbl_m_expire` FOR EACH ROW SET
  NEW.created_date_tme = NOW(),
  NEW.status_deactivated_tme = 0,
  NEW.status_deleted_tme = 0//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_insert_stok_awal_and_stock_gudang
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_insert_stok_awal_and_stock_gudang` BEFORE INSERT ON `tbl_s_opname` FOR EACH ROW BEGIN
  SET NEW.stock_tso = (SELECT stock_drug_tmd FROM tbl_m_drug WHERE id_tmd = NEW.id_tmd),
      NEW.difference_tso = NEW.stock_tso - NEW.real_tso;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_insert_supplier
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_insert_supplier` BEFORE INSERT ON `tbl_m_supplier` FOR EACH ROW SET
  NEW.created_date_tms = NOW(),
  NEW.status_deactivated_tms = 0,
  NEW.status_deleted_tms = 0//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_insert_unit
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_insert_unit` BEFORE INSERT ON `tbl_m_d_unit` FOR EACH ROW SET
  NEW.created_date_tmdu = NOW(),
  NEW.status_deactivated_tmdu = 0,
  NEW.status_deleted_tmdu = 0//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_insert_user
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_insert_user` BEFORE INSERT ON `tbl_m_user` FOR EACH ROW SET
  NEW.created_date_tmu = NOW(),
  NEW.status_deactivated_tmu = 0,
  NEW.status_deleted_tmu = 0//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_update_category
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_update_category` BEFORE UPDATE ON `tbl_m_category` FOR EACH ROW SET
  NEW.updated_date_tmc = NOW()//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_update_drug
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_update_drug` BEFORE UPDATE ON `tbl_m_drug` FOR EACH ROW SET
  NEW.updated_date_tmd = NOW()//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_update_expire
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_update_expire` BEFORE UPDATE ON `tbl_m_expire` FOR EACH ROW SET
  NEW.updated_date_tme = NOW()//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_update_stok_awal_and_stock_gudang
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_update_stok_awal_and_stock_gudang` BEFORE UPDATE ON `tbl_s_opname` FOR EACH ROW BEGIN
  SET NEW.difference_tso = OLD.stock_tso - NEW.real_tso;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_update_supplier
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_update_supplier` BEFORE UPDATE ON `tbl_m_supplier` FOR EACH ROW SET
  NEW.updated_date_tms = NOW()//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_update_unit
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_update_unit` BEFORE UPDATE ON `tbl_m_d_unit` FOR EACH ROW SET
  NEW.updated_date_tmdu = NOW()//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.before_update_user
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `before_update_user` BEFORE UPDATE ON `tbl_m_user` FOR EACH ROW SET
  NEW.updated_date_tmu = NOW()//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.expiry_notification
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `expiry_notification` BEFORE INSERT ON `tbl_m_expire` FOR EACH ROW BEGIN
  SET @expiration_date = NEW.expire_date_tme;
  SET @current_time = NOW();
  SET @drug_name = (
    SELECT name_tmd
    FROM tbl_m_drug
    WHERE id_tmd = NEW.id_tmd
  );

  IF DATEDIFF(@expiration_date, @current_time) <= 30 THEN
    INSERT INTO tbl_notifications (message_tn, expiry_date_tn)
    VALUES (
      CONCAT('Drug ', @drug_name, ' with ID ', NEW.id_tmd, ' will expire in 30 days.'),
      @expiration_date
    );
  END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.update_expired_date_tmed
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `update_expired_date_tmed` AFTER INSERT ON `tbl_m_drug` FOR EACH ROW BEGIN
  INSERT INTO tbl_m_expire (id_tmd, expire_date_tme)
  VALUES (NEW.id_tmd, NEW.expired_date_tmd)
  ON DUPLICATE KEY UPDATE expire_date_tme = NEW.expired_date_tmd;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_apotek.update_expiry_status
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `update_expiry_status` BEFORE INSERT ON `tbl_m_expire` FOR EACH ROW BEGIN
  SET @expiration_date = NEW.expire_date_tme;
  SET @current_time = NOW();

  IF @current_time >= @expiration_date THEN
    -- Update tbl_m_expire
    UPDATE tbl_m_expire
    SET status_deactivated_tme = 1,
        status_deleted_tme = 1
    WHERE id_tme = NEW.id_tme;

    -- Update tbl_m_drug
    UPDATE tbl_m_drug
    SET status_tmd = "Tidak Aktif"
    WHERE id_tmd = NEW.id_tmd;
  END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
