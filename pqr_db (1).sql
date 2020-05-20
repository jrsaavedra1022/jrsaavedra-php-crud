-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for pqr_db
CREATE DATABASE IF NOT EXISTS `pqr_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pqr_db`;

-- Dumping structure for table pqr_db.apartments
CREATE TABLE IF NOT EXISTS `apartments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apartment` varchar(45) DEFAULT NULL,
  `towers_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_apartments_towers1_idx` (`towers_id`),
  CONSTRAINT `fk_apartments_towers1` FOREIGN KEY (`towers_id`) REFERENCES `towers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table pqr_db.apartments: ~0 rows (approximately)
/*!40000 ALTER TABLE `apartments` DISABLE KEYS */;
INSERT INTO `apartments` (`id`, `apartment`, `towers_id`) VALUES
	(1, '210', 1);
/*!40000 ALTER TABLE `apartments` ENABLE KEYS */;

-- Dumping structure for table pqr_db.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `sincronizacion_id` int(10) unsigned NOT NULL,
  `ip` varchar(50) NOT NULL,
  `change_field` varchar(50) NOT NULL DEFAULT '-',
  `description_change` varchar(200) NOT NULL DEFAULT '-',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `sincronizacion_id` (`sincronizacion_id`),
  CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`sincronizacion_id`) REFERENCES `sincronizaciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table pqr_db.logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` (`id`, `user_id`, `sincronizacion_id`, `ip`, `change_field`, `description_change`, `created_at`) VALUES
	(1, 2, 2, '::1', '6', '-', '2020-05-19 21:42:00'),
	(2, 2, 3, '::1', '26', 'name: GND, sur_name: rodriguez, document: 99999, email: sdsd@jdksjd.com, phone: 5545, roles_id: 2, apartment: 210, tower: A', '2020-05-19 21:42:07'),
	(3, 2, 1, '::1', '29', '-', '2020-05-19 21:42:42'),
	(4, 28, 2, '::1', '6', '-', '2020-05-19 21:57:02'),
	(5, 28, 3, '::1', '29', 'name: create, sur_name: logfs, document: 2329494, email: hsdjhd@jdsjd.com, phone: 959595, roles_id: 2, apartment: 210, tower: A', '2020-05-19 21:57:19'),
	(6, 28, 1, '::1', '30', '-', '2020-05-19 21:58:05');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Dumping structure for table pqr_db.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `request_types_id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requests_request_types1_idx` (`request_types_id`),
  KEY `fk_requests_users1_idx` (`users_id`),
  CONSTRAINT `fk_requests_request_types1` FOREIGN KEY (`request_types_id`) REFERENCES `request_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requests_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table pqr_db.requests: ~3 rows (approximately)
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`id`, `title`, `content`, `request_types_id`, `users_id`) VALUES
	(3, 'la segurida es mala', 'me robaron ', 1, 2),
	(4, 'esta es nueva', 'como sasi qbsdsjdn', 2, 13),
	(5, 'lola', 'palusa', 2, 13);
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Dumping structure for table pqr_db.request_types
CREATE TABLE IF NOT EXISTS `request_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pqr_db.request_types: ~2 rows (approximately)
/*!40000 ALTER TABLE `request_types` DISABLE KEYS */;
INSERT INTO `request_types` (`id`, `name`) VALUES
	(1, 'queja'),
	(2, 'reclamo');
/*!40000 ALTER TABLE `request_types` ENABLE KEYS */;

-- Dumping structure for table pqr_db.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table pqr_db.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`) VALUES
	(1, 'Administrador'),
	(2, 'Gestor'),
	(3, 'Residente');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table pqr_db.sincronizaciones
CREATE TABLE IF NOT EXISTS `sincronizaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_sync` varchar(50) NOT NULL,
  `tipo_cambio` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table pqr_db.sincronizaciones: ~8 rows (approximately)
/*!40000 ALTER TABLE `sincronizaciones` DISABLE KEYS */;
INSERT INTO `sincronizaciones` (`id`, `table_sync`, `tipo_cambio`) VALUES
	(1, 'users', 'Registrar'),
	(2, 'users', 'Actualizar'),
	(3, 'users', 'Eliminar'),
	(4, 'apartments', 'Registrar'),
	(5, 'requests', 'Registrar'),
	(6, 'request_types', 'Registrar'),
	(7, 'roles', 'Registrar'),
	(8, 'towers', 'Registrar');
/*!40000 ALTER TABLE `sincronizaciones` ENABLE KEYS */;

-- Dumping structure for table pqr_db.towers
CREATE TABLE IF NOT EXISTS `towers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tower` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tower_UNIQUE` (`tower`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table pqr_db.towers: ~0 rows (approximately)
/*!40000 ALTER TABLE `towers` DISABLE KEYS */;
INSERT INTO `towers` (`id`, `tower`) VALUES
	(1, 'A');
/*!40000 ALTER TABLE `towers` ENABLE KEYS */;

-- Dumping structure for table pqr_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `sur_name` varchar(30) DEFAULT NULL,
  `document` varchar(15) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `roles_id` int(10) unsigned NOT NULL,
  `apartments_id` int(10) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userscol_UNIQUE` (`phone`),
  KEY `fk_users_roles_idx` (`roles_id`),
  KEY `fk_users_apartments1_idx` (`apartments_id`),
  CONSTRAINT `fk_users_apartments1` FOREIGN KEY (`apartments_id`) REFERENCES `apartments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Dumping data for table pqr_db.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `sur_name`, `document`, `password`, `email`, `phone`, `roles_id`, `apartments_id`) VALUES
	(2, 'Diego', 'Devia 2 mese', '1111', 'qwerty', 'diego@mail.dev', '789789', 1, 1),
	(4, 'nuevo names', 'rodriguez', '487878', 'a31851770dae6ee96fc886f261c211e7', 'sebastianbaquero2803@gmail.com', '46565', 2, 1),
	(6, 'silence', 'sometimesd', '876', '81dc9bdb52d04dc20036dbd8313ed055', 'cxc@km.comds', '65', 2, 1),
	(7, 'vamous', 'behind', '98765', 'bbf91520e3e7212ac8f9281afbd291bf', 'fdfdf@dms.comfdf', '64647', 2, 1),
	(13, 'Jose', 'Roberto other nama', '1023980167', '1023980167+', 'jrsaavedra@rbsas.co', '54541545', 3, 1),
	(18, 'dsfdf', 'fdsfdsfds', '549291', '123', 'fdsfd@dsjd.com', '545411', 2, 1),
	(22, 'Ejecutar-excepciones-recarga', 'rodriguez', '8545454', '123', 'jrsaavedra@rbsas.cos', '3194732562', 2, 1),
	(28, 'GND', 'sdsds', '999999', '123456', '4545dsnqjn@j.com', '184515', 2, 1),
	(30, 'pencil', 'notebook', '47419491', '369', 'student@miosen.edu.co', '9591741', 3, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
