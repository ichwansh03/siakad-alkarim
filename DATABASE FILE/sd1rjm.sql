/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.21-MariaDB : Database - sd1rjm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sd1rjm` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `sd1rjm`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `guru` */

/*Table structure for table `hasil` */

DROP TABLE IF EXISTS `hasil`;

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `hasil` */

/*Table structure for table `info_siswa` */

DROP TABLE IF EXISTS `info_siswa`;

CREATE TABLE `info_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `info_siswa` */

/*Table structure for table `presensi` */

DROP TABLE IF EXISTS `presensi`;

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `presensi` varchar(50) NOT NULL,
  `tgl_presensi` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `presensi` */

/*Table structure for table `presensi_siswa` */

DROP TABLE IF EXISTS `presensi_siswa`;

CREATE TABLE `presensi_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `presensi_siswa` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
