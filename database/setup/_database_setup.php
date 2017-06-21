<?
/*
# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.21-MariaDB)
# Base de datos: bill_investor
# Tiempo de Generación: 2017-06-21 18:20:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla companies
# ------------------------------------------------------------*/

$sql = "CREATE DATABASE IF NOT EXISTS bill_investor";
$query = $db->query($sql);

$sql ="USE bill_investor";

$query = $db->query($sql);


/**** ADD and delete tables ****/

$sql = "DROP TABLE IF EXISTS `companies`";
$query = $db->query($sql);

$sql ="CREATE TABLE `companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  `address` varchar(200) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";


$query = $db->query($sql);


$sql = "INSERT INTO `companies` (`id`, `name`, `state`, `address`, `description`)
VALUES
	(1,'Kiveo AG',1,NULL,NULL),
	(2,'Matadeo AG',1,NULL,NULL)";

$query = $db->query($sql);


$sql ="DROP TABLE IF EXISTS `exchange`";

$query = $db->query($sql);

$sql ="CREATE TABLE `exchange` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$query = $db->query($sql);



$sql ="INSERT INTO `exchange` (`id`, `name`, `state`)
VALUES
	(1,'New York Stock Exchange',1),
	(2,'London Stock Exchange',1),
	(3,'Hong Kong Stock Exchange',1),
	(4,'Shanghai Stock Exchange',1),
	(5,'Deutsche Börse Frankfurt',1)";

$query = $db->query($sql);



# Volcado de tabla stock_types
# ------------------------------------------------------------

$sql ="DROP TABLE IF EXISTS `stock_types`";

$query = $db->query($sql);

$sql ="CREATE TABLE `stock_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$query = $db->query($sql);



$sql ="INSERT INTO `stock_types` (`id`, `name`)
VALUES
	(1,'Preferred Stock'),
	(2,'Common Stock')";

$query = $db->query($sql);


# Volcado de tabla stocks
# ------------------------------------------------------------

$sql ="DROP TABLE IF EXISTS `stocks`";

$sql ="CREATE TABLE `stocks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` tinyint(11) DEFAULT NULL,
  `exchange_id` tinyint(11) DEFAULT NULL,
  `stock_type_id` tinyint(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$query = $db->query($sql);

$sql ="INSERT INTO `stocks` (`id`, `company_id`, `exchange_id`, `stock_type_id`, `price`, `date_created`)
VALUES
	(1,1,1,1,150,'2017-06-21 19:30:25'),
	(2,1,1,2,100,'2017-06-21 19:30:25'),
	(3,2,3,2,200,'2017-06-21 19:30:25'),
	(4,1,2,1,210,'2017-06-21 19:30:25'),
	(5,2,1,2,150,'2017-06-21 19:30:38'),
	(6,3,5,2,0,'2017-06-21 20:04:53')";

$query = $db->query($sql);

echo "<pre>";
print_r($db);
echo "</pre>";
