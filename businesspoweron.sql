-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.10-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para businesspoweron
CREATE DATABASE IF NOT EXISTS `businesspoweron` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `businesspoweron`;


-- Volcando estructura para tabla businesspoweron.business
CREATE TABLE IF NOT EXISTS `business` (
  `cif` varchar(9) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `ip` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`cif`),
  KEY `user` (`user`),
  CONSTRAINT `business_user_users` FOREIGN KEY (`user`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla businesspoweron.business: ~2 rows (aproximadamente)
DELETE FROM `business`;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` (`cif`, `user`, `ip`, `name`) VALUES
	('055444', NULL, '19521..5356', 'text2'),
	('0555504', 'asdqwed123adasd1', '192.168.1.201', 'test1');
/*!40000 ALTER TABLE `business` ENABLE KEYS */;


-- Volcando estructura para tabla businesspoweron.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla businesspoweron.ci_sessions: ~2 rows (aproximadamente)
DELETE FROM `ci_sessions`;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('mt8a2s66g97hisetbnnmdvlcd5no8kpp', '192.168.1.201', 1486806869, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313438363830363832303B),
	('aduusjr6n5pp84q7kevkcnmesv12ro1i', '192.168.1.201', 1486807760, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313438363830373735323B);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Volcando estructura para tabla businesspoweron.devices
CREATE TABLE IF NOT EXISTS `devices` (
  `mac` varchar(255) NOT NULL,
  `cif` varchar(9) NOT NULL,
  `last_power_on` bigint(20) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0-Apagado,1-Encendido,2-WOL Enviado',
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`mac`),
  KEY `cif` (`cif`),
  CONSTRAINT `devices_cif_business` FOREIGN KEY (`cif`) REFERENCES `business` (`cif`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla businesspoweron.devices: ~0 rows (aproximadamente)
DELETE FROM `devices`;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;


-- Volcando estructura para tabla businesspoweron.users
CREATE TABLE IF NOT EXISTS `users` (
  `uid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT '0' COMMENT '0 sera usuario de la empresa y 1 usuario masterweb',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla businesspoweron.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`uid`, `password`, `name`, `email`, `type`) VALUES
	('asdqwed123adasd1', 'aaa', 'aaa', 'aaa', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
