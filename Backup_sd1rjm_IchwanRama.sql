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
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`) values 
(1,'admin','123'),
(2,'admin','202cb962ac59075b964b07152d234b70');

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `guru` */

insert  into `guru`(`id`,`username`,`password`,`nama`,`email`,`jk`,`kontak`,`alamat`) values 
(1,'darno','202cb962ac59075b964b07152d234b70','Sudarno, S.Pd','darno@gmail.com','Pria','085766689697','Hajimena'),
(2,'harno','202cb962ac59075b964b07152d234b70','Suharno, A.Ma.Pd','harno@gmail.com','Pria','085687980765','Bandar Lampung');

/*Table structure for table `hasil` */

DROP TABLE IF EXISTS `hasil`;

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `hasil` */

insert  into `hasil`(`id`,`id_siswa`,`nilai`,`mapel`) values 
(1,19223132,90,'IPA'),
(2,19223132,88,'IPS'),
(3,19223132,60,'Matematika'),
(4,19223132,80,'Bahasa Indonesia'),
(5,19223132,90,'Agama'),
(6,19223132,75,'SBDP'),
(7,19223132,88,'PAK'),
(8,19223132,80,'Penjaskes'),
(9,19224141,88,'IPS'),
(10,19224141,78,'IPA'),
(11,19224141,70,'Matematika'),
(12,19224141,88,'Bahasa Indonesia'),
(13,19224141,95,'Agama'),
(14,19224141,77,'SBDP'),
(15,19224141,78,'PAK'),
(16,19224141,80,'Penjaskes');

/*Table structure for table `info_siswa` */

DROP TABLE IF EXISTS `info_siswa`;

CREATE TABLE `info_siswa` (
  `id_siswa` int(11) NOT NULL,
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

insert  into `info_siswa`(`id_siswa`,`nama`,`password`,`email`,`tgl_lahir`,`jk`,`kontak`,`alamat`) values 
(19223132,'Naquib Alattas','202cb962ac59075b964b07152d234b70','syed@gmail.com','2000-02-01','Male','08993484859','Metro'),
(19224141,'Abdullah Azzam','63a9f0ea7bb98050796b649e85481845','azzam@gmail.com','2001-09-09','Male','087738495960','Teluk Betung'),
(19312131,'Ichwan Sholihin','caf1a3dfb505ffed0d024130f58c5cfa','ichwan@gmail.com','2001-03-04','Laki','087493848445','Natar'),
(19323030,'Lia Karimatunnisa','8d84dd7c18bdcb39fbb17ceeea1218cd','lia@gmail.com','1999-02-04','Female','085687980765','Teluk Betung'),
(19902345,'Ujang Abdullah','c959810f01adc10791f46e1b3ecab45a','ujang@gmail.com','2000-07-23','Male','082837485678','Tanjungpura'),
(19992001,'Ahmad','202cb962ac59075b964b07152d234b70','ahmad@gmail.com','2001-07-10','Male','082837485678','Natar');

/*Table structure for table `presensi` */

DROP TABLE IF EXISTS `presensi`;

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `presensi` varchar(50) NOT NULL,
  `tgl_presensi` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `presensi` */

insert  into `presensi`(`id`,`id_siswa`,`presensi`,`tgl_presensi`) values 
(0,19223132,'absent','2022-01-17');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
