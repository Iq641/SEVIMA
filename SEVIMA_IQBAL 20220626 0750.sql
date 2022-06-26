-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.37-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema db_apel
--

CREATE DATABASE IF NOT EXISTS db_apel;
USE db_apel;

--
-- Definition of table `data_autonum`
--

DROP TABLE IF EXISTS `data_autonum`;
CREATE TABLE `data_autonum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(45) NOT NULL,
  `jdigit` int(11) DEFAULT '0',
  `urut` int(11) DEFAULT '0',
  `awal_kode` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_autonum`
--

/*!40000 ALTER TABLE `data_autonum` DISABLE KEYS */;
INSERT INTO `data_autonum` (`id`,`kode`,`jdigit`,`urut`,`awal_kode`) VALUES 
 (1,'KATEGORI',8,3,'KAT'),
 (2,'USER',10,2,'APEL'),
 (3,'JAWABAN',10,15,'22062');
/*!40000 ALTER TABLE `data_autonum` ENABLE KEYS */;


--
-- Definition of table `data_jawaban`
--

DROP TABLE IF EXISTS `data_jawaban`;
CREATE TABLE `data_jawaban` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idjawab` varchar(10) NOT NULL,
  `iduser` varchar(25) NOT NULL,
  `idkategori` varchar(8) NOT NULL,
  `jml_soal` int(11) DEFAULT '0',
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `benar` int(11) DEFAULT '0',
  `salah` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDXKEY` (`idjawab`),
  KEY `IDXUSER` (`iduser`,`idkategori`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jawaban`
--

/*!40000 ALTER TABLE `data_jawaban` DISABLE KEYS */;
INSERT INTO `data_jawaban` (`id`,`idjawab`,`iduser`,`idkategori`,`jml_soal`,`tgl_mulai`,`tgl_selesai`,`benar`,`salah`) VALUES 
 (1,'2206200013','APEL000002','KAT00001',0,'1970-01-01 07:00:00','2022-06-26 07:30:38',0,1);
/*!40000 ALTER TABLE `data_jawaban` ENABLE KEYS */;


--
-- Definition of table `mst_kategori`
--

DROP TABLE IF EXISTS `mst_kategori`;
CREATE TABLE `mst_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idkategori` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jml_soal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDXKATEGORI` (`idkategori`) USING BTREE,
  UNIQUE KEY `IDXNAMA` (`nama`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kategori`
--

/*!40000 ALTER TABLE `mst_kategori` DISABLE KEYS */;
INSERT INTO `mst_kategori` (`id`,`idkategori`,`nama`,`jml_soal`) VALUES 
 (1,'KAT00001','Bahasa Indonesia SMP Kelas 1',2),
 (2,'KAT00003','SEJARAH SMA KLS X',0);
/*!40000 ALTER TABLE `mst_kategori` ENABLE KEYS */;


--
-- Definition of table `mst_soal`
--

DROP TABLE IF EXISTS `mst_soal`;
CREATE TABLE `mst_soal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idkategori` varchar(8) NOT NULL,
  `no_soal` int(11) DEFAULT '0',
  `ket_soal` text,
  `jwb_a` varchar(45) DEFAULT NULL,
  `jwb_b` varchar(45) DEFAULT NULL,
  `jwb_c` varchar(45) DEFAULT NULL,
  `jwb_kunci` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDXKEY` (`idkategori`,`no_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_soal`
--

/*!40000 ALTER TABLE `mst_soal` DISABLE KEYS */;
INSERT INTO `mst_soal` (`id`,`idkategori`,`no_soal`,`ket_soal`,`jwb_a`,`jwb_b`,`jwb_c`,`jwb_kunci`) VALUES 
 (1,'KAT00001',1,'Binatang Melata','jangkrik','kucing','cacing','a'),
 (2,'KAT00001',2,'makhluk mamalia','paus','jangkrik','kecoa','a');
/*!40000 ALTER TABLE `mst_soal` ENABLE KEYS */;


--
-- Definition of table `mst_user`
--

DROP TABLE IF EXISTS `mst_user`;
CREATE TABLE `mst_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` varchar(25) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `sandi` varchar(25) DEFAULT NULL,
  `aktif` int(1) DEFAULT '1',
  `idkategori` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDXUSER` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

/*!40000 ALTER TABLE `mst_user` DISABLE KEYS */;
INSERT INTO `mst_user` (`id`,`iduser`,`nama`,`sandi`,`aktif`,`idkategori`) VALUES 
 (1,'APEL000000','IQBAL HADI NUGRAHA','apnK4rIpkaoHo',1,NULL),
 (2,'APEL000002','semesta','apnK4rIpkaoHo',0,'KAT00001');
/*!40000 ALTER TABLE `mst_user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
