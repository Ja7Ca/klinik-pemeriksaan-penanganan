-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: klinik-ida
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `diagnosa`
--

DROP TABLE IF EXISTS `diagnosa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnosa` (
  `kode_diagnosa` int(5) NOT NULL,
  `nama_diagnosa` varchar(255) NOT NULL,
  PRIMARY KEY (`kode_diagnosa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagnosa`
--

LOCK TABLES `diagnosa` WRITE;
/*!40000 ALTER TABLE `diagnosa` DISABLE KEYS */;
INSERT INTO `diagnosa` VALUES (10001,'Flu Ringan'),(10002,'Flu Berat'),(10003,'Flu Sedang Mid');
/*!40000 ALTER TABLE `diagnosa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokter`
--

DROP TABLE IF EXISTS `dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dokter` (
  `kode_dok` int(5) NOT NULL,
  `nama_dok` varchar(35) NOT NULL,
  `nip` bigint(25) NOT NULL,
  `telepon` bigint(15) NOT NULL,
  PRIMARY KEY (`kode_dok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokter`
--

LOCK TABLES `dokter` WRITE;
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
INSERT INTO `dokter` VALUES (13874,'Dr. Suherman',1987041819900814301,62881234759),(57473,'Dr. Pajo Sudarjo',192233720368547,6286473488888),(65391,'Dr. Tri Harti',199604252003040111,6285637294);
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kamar`
--

DROP TABLE IF EXISTS `kamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kamar` (
  `kode_kamar` int(5) NOT NULL,
  `nama_kamar` varchar(10) NOT NULL,
  `fasilitas_kamar` varchar(255) NOT NULL,
  `tarif_kamar` varchar(15) NOT NULL,
  `no_rm` int(6) DEFAULT NULL,
  PRIMARY KEY (`kode_kamar`),
  KEY `rm_to_kamar` (`no_rm`),
  CONSTRAINT `rm_to_kamar` FOREIGN KEY (`no_rm`) REFERENCES `pasien` (`no_rm`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kamar`
--

LOCK TABLES `kamar` WRITE;
/*!40000 ALTER TABLE `kamar` DISABLE KEYS */;
INSERT INTO `kamar` VALUES (51001,'Anggrek 1','TV, Ac, Kulkas','700000',123234),(51002,'Anggrek 2','TV, Ac, Kulkas','700000',524523),(51003,'Anggrek 3','Tv,  Ac, Kulkas','70000',NULL);
/*!40000 ALTER TABLE `kamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasien` (
  `no_rm` int(6) NOT NULL,
  `nama_pasien` varchar(36) NOT NULL,
  `jkel` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` enum('Islam','Hindu','Katolik','Kristen','Budha') NOT NULL,
  `status_perkawinan` enum('Belum Menikah','Menikah') NOT NULL,
  `alamat` varchar(55) NOT NULL,
  `telepon` bigint(15) NOT NULL,
  PRIMARY KEY (`no_rm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien`
--

LOCK TABLES `pasien` WRITE;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` VALUES (123123,'Steve Jobs','L','1994-04-21','Islam','Menikah','Surakarta',6283291829392),(123234,'Asdasd','L','2022-05-01','Katolik','Menikah','Klaten',62832123123),(524523,'Tuti Pujiastuti','L','1986-05-08','Kristen','Belum Menikah','Dekat',628888);
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemeriksaan`
--

DROP TABLE IF EXISTS `pemeriksaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pemeriksaan` (
  `no_periksa` int(6) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `noreg` int(6) NOT NULL,
  `no_rm` int(6) NOT NULL,
  `kode_dok` int(6) NOT NULL,
  `anamnesa` varchar(255) NOT NULL,
  `tb` int(11) NOT NULL,
  `bb` int(11) NOT NULL,
  `td` int(11) NOT NULL,
  `sh` int(11) NOT NULL,
  `nd` int(11) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  PRIMARY KEY (`no_periksa`),
  KEY `dokter_to_pemeriksaan` (`kode_dok`),
  KEY `reg_to_pemeriksaan` (`noreg`),
  KEY `rm_to_pemeriksaan` (`no_rm`),
  CONSTRAINT `dokter_to_pemeriksaan` FOREIGN KEY (`kode_dok`) REFERENCES `dokter` (`kode_dok`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reg_to_pemeriksaan` FOREIGN KEY (`noreg`) REFERENCES `pendaftaran` (`noreg`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rm_to_pemeriksaan` FOREIGN KEY (`no_rm`) REFERENCES `pasien` (`no_rm`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemeriksaan`
--

LOCK TABLES `pemeriksaan` WRITE;
/*!40000 ALTER TABLE `pemeriksaan` DISABLE KEYS */;
INSERT INTO `pemeriksaan` VALUES (563572,'2022-05-11',7357383,524523,65391,'Anamnesaa',170,60,110,37,110,'10002','Rawat Inap'),(47357327,'2022-05-11',734256,524523,65391,'Anamnesa1',165,65,70,38,110,'10002','UGD');
/*!40000 ALTER TABLE `pemeriksaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendaftaran` (
  `noreg` int(6) NOT NULL,
  `tglreg` date NOT NULL,
  `no_rm` int(6) NOT NULL,
  `nama_pasien` varchar(36) NOT NULL,
  `jenis_pasien` enum('Pasien Lama','Pasien Baru') NOT NULL,
  `status_pasien` enum('Rawat Jalan','Rawat Inap','UGD') DEFAULT NULL,
  PRIMARY KEY (`noreg`),
  KEY `rm_to_pendaftaran` (`no_rm`),
  CONSTRAINT `rm_to_pendaftaran` FOREIGN KEY (`no_rm`) REFERENCES `pasien` (`no_rm`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran`
--

LOCK TABLES `pendaftaran` WRITE;
/*!40000 ALTER TABLE `pendaftaran` DISABLE KEYS */;
INSERT INTO `pendaftaran` VALUES (345346,'2022-05-06',123123,'Tono Sudarjo','Pasien Baru','Rawat Jalan'),(734256,'2022-05-08',524523,'Tuti Pujiastuti','Pasien Baru','UGD'),(764565,'2022-05-07',123234,'asdasda','Pasien Baru','Rawat Inap'),(7357383,'2022-05-11',524523,'Tuti Pujiastuti','Pasien Lama','Rawat Inap'),(7766855,'2022-05-10',123123,'Steve Jobs','Pasien Lama','Rawat Jalan'),(37356356,'2022-05-11',123123,'Steve Jobs','Pasien Lama','UGD');
/*!40000 ALTER TABLE `pendaftaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poliklinik`
--

DROP TABLE IF EXISTS `poliklinik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poliklinik` (
  `kode_poli` int(5) NOT NULL,
  `nama_poli` varchar(15) NOT NULL,
  PRIMARY KEY (`kode_poli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poliklinik`
--

LOCK TABLES `poliklinik` WRITE;
/*!40000 ALTER TABLE `poliklinik` DISABLE KEYS */;
INSERT INTO `poliklinik` VALUES (43511,'Poli Gigi'),(43512,'Poli Tulanga'),(43513,'Poli THTH');
/*!40000 ALTER TABLE `poliklinik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_inap`
--

DROP TABLE IF EXISTS `rawat_inap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_inap` (
  `no_ranap` int(5) NOT NULL,
  `noreg` int(6) NOT NULL,
  `cara_masuk` enum('Datang Sendiri','Dirujuk') NOT NULL,
  `kode_dok` int(5) NOT NULL,
  `kode_kamar` int(5) NOT NULL,
  PRIMARY KEY (`no_ranap`),
  KEY `reg_to_inap` (`noreg`),
  KEY `dokter_to_inap` (`kode_dok`),
  KEY `kamar_to_inap` (`kode_kamar`),
  CONSTRAINT `dokter_to_inap` FOREIGN KEY (`kode_dok`) REFERENCES `dokter` (`kode_dok`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kamar_to_inap` FOREIGN KEY (`kode_kamar`) REFERENCES `kamar` (`kode_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reg_to_inap` FOREIGN KEY (`noreg`) REFERENCES `pendaftaran` (`noreg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_inap`
--

LOCK TABLES `rawat_inap` WRITE;
/*!40000 ALTER TABLE `rawat_inap` DISABLE KEYS */;
INSERT INTO `rawat_inap` VALUES (61341,764565,'Datang Sendiri',65391,51001),(625255,7357383,'Dirujuk',13874,51002);
/*!40000 ALTER TABLE `rawat_inap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_jalan`
--

DROP TABLE IF EXISTS `rawat_jalan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rawat_jalan` (
  `no_rajal` int(5) NOT NULL,
  `noreg` int(6) NOT NULL,
  `kode_dok` int(5) NOT NULL,
  `kode_poli` int(5) NOT NULL,
  PRIMARY KEY (`no_rajal`),
  KEY `reg_to_jalan` (`noreg`),
  KEY `dokter_to_jalan` (`kode_dok`),
  KEY `poli_to_jalan` (`kode_poli`),
  CONSTRAINT `dokter_to_jalan` FOREIGN KEY (`kode_dok`) REFERENCES `dokter` (`kode_dok`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `poli_to_jalan` FOREIGN KEY (`kode_poli`) REFERENCES `poliklinik` (`kode_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reg_to_jalan` FOREIGN KEY (`noreg`) REFERENCES `pendaftaran` (`noreg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_jalan`
--

LOCK TABLES `rawat_jalan` WRITE;
/*!40000 ALTER TABLE `rawat_jalan` DISABLE KEYS */;
INSERT INTO `rawat_jalan` VALUES (53222,345346,13874,43511),(5474886,7766855,65391,43511);
/*!40000 ALTER TABLE `rawat_jalan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tindakan`
--

DROP TABLE IF EXISTS `tindakan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tindakan` (
  `kode_tindakan` int(5) NOT NULL,
  `nama_tindakan` varchar(255) NOT NULL,
  PRIMARY KEY (`kode_tindakan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tindakan`
--

LOCK TABLES `tindakan` WRITE;
/*!40000 ALTER TABLE `tindakan` DISABLE KEYS */;
INSERT INTO `tindakan` VALUES (24546,'Rujuk Rumah Sakit'),(41354,'Operasi'),(73733,'Sehat Wal Afiat bgt');
/*!40000 ALTER TABLE `tindakan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ugd`
--

DROP TABLE IF EXISTS `ugd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ugd` (
  `no_ugd` int(5) NOT NULL,
  `noreg` int(6) NOT NULL,
  `cara_masuk` enum('Datang Sendiri','Dirujuk') NOT NULL,
  `kode_dok` int(5) NOT NULL,
  PRIMARY KEY (`no_ugd`),
  KEY `dokter_to_ugd` (`kode_dok`),
  KEY `reg_to_ugd` (`noreg`),
  CONSTRAINT `dokter_to_ugd` FOREIGN KEY (`kode_dok`) REFERENCES `dokter` (`kode_dok`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reg_to_ugd` FOREIGN KEY (`noreg`) REFERENCES `pendaftaran` (`noreg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ugd`
--

LOCK TABLES `ugd` WRITE;
/*!40000 ALTER TABLE `ugd` DISABLE KEYS */;
INSERT INTO `ugd` VALUES (72325,734256,'Datang Sendiri',13874),(562886,37356356,'Datang Sendiri',57473);
/*!40000 ALTER TABLE `ugd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(12) NOT NULL,
  `type_user` varchar(5) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','admin','admin','admin','admin'),('US001','Dr. Suherman','suhermantap','suherman123','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-22 11:02:24
