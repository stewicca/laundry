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


-- Dumping database structure for laundrydb
CREATE DATABASE IF NOT EXISTS `laundrydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laundrydb`;

-- Dumping structure for table laundrydb.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `unit` varchar(255) NOT NULL DEFAULT 'kg',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laundrydb.services: ~3 rows (approximately)
INSERT INTO `services` (`id`, `name`, `price`, `unit`, `created_at`, `updated_at`) VALUES
	(1, 'Wet Washing', 2000, 'kg', '2024-07-22 09:34:22', '2024-07-22 09:34:22'),
	(3, 'Dry Washing', 4000, 'kg', '2024-07-22 10:22:27', '2024-07-22 10:22:27'),
	(4, 'Ironing Washing', 5000, 'kg', '2024-07-22 13:53:39', '2024-07-22 13:53:39'),
	(5, 'Ironing', 1000, 'pcs', '2024-07-22 13:53:56', '2024-07-22 13:53:56');

-- Dumping structure for table laundrydb.servicestransactions
CREATE TABLE IF NOT EXISTS `servicestransactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serviceId` int NOT NULL,
  `transactionId` int NOT NULL,
  `amount` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laundrydb.servicestransactions: ~0 rows (approximately)
INSERT INTO `servicestransactions` (`id`, `serviceId`, `transactionId`, `amount`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 5, '2024-07-23 15:05:11', '2024-07-23 15:05:11'),
	(2, 3, 2, 5, '2024-07-23 15:32:59', '2024-07-23 15:32:59'),
	(3, 5, 2, 5, '2024-07-23 15:32:59', '2024-07-23 15:32:59'),
	(4, 4, 3, 7, '2024-07-23 15:57:58', '2024-07-23 15:57:58'),
	(5, 4, 4, 10, '2024-07-23 18:59:16', '2024-07-23 18:59:16'),
	(6, 4, 5, 10, '2024-07-23 19:01:21', '2024-07-23 19:01:21');

-- Dumping structure for table laundrydb.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total` int NOT NULL,
  `status` enum('new','process','done') NOT NULL DEFAULT 'new',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laundrydb.transactions: ~0 rows (approximately)
INSERT INTO `transactions` (`id`, `name`, `phone`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Jean', '08123414276', 10000, 'done', '2024-07-23 15:05:11', '2024-07-23 17:11:04'),
	(2, 'Urofi', '0812345678', 25000, 'done', '2024-07-23 15:32:59', '2024-07-23 18:50:03'),
	(3, 'Kiko', '089529074866', 35000, 'done', '2024-07-23 15:57:58', '2024-07-23 18:49:35'),
	(4, 'Toni', '08888888', 50000, 'process', '2024-07-23 18:59:16', '2024-07-23 19:00:59'),
	(5, 'Aldo', '082334543910', 50000, 'new', '2024-07-23 19:01:21', '2024-07-23 19:01:21');

-- Dumping structure for table laundrydb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','superadmin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'admin',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laundrydb.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Budi', 'budi', 'ed2b1f468c5f915f3f1cf75d7068baae', 'superadmin', '2024-07-16 13:44:37', '2024-07-19 09:30:54'),
	(3, 'Eko', 'eko', 'ed2b1f468c5f915f3f1cf75d7068baae', 'admin', '2024-07-19 11:27:52', '2024-07-23 21:08:44'),
	(4, 'Gunawan', 'gunawan', 'ed2b1f468c5f915f3f1cf75d7068baae', 'superadmin', '2024-07-19 11:29:30', '2024-07-19 11:29:30');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
