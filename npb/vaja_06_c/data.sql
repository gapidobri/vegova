-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: primer2sola
-- ------------------------------------------------------
-- Server version	5.5.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `primer2sola`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `primer2sola` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `primer2sola`;

--
-- Table structure for table `izvaja`
--

DROP TABLE IF EXISTS `izvaja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `izvaja` (
  `SolaID` int(11) NOT NULL,
  `ProgramID` int(11) NOT NULL,
  PRIMARY KEY (`SolaID`,`ProgramID`),
  KEY `ProgramID` (`ProgramID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `izvaja`
--

LOCK TABLES `izvaja` WRITE;
/*!40000 ALTER TABLE `izvaja` DISABLE KEYS */;
INSERT INTO `izvaja` VALUES (1,1),(1,3),(2,2),(2,3),(3,2),(3,3);
/*!40000 ALTER TABLE `izvaja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program` (
  `ProgramID` int(11) NOT NULL,
  `ImePrograma` char(20) COLLATE utf8_slovenian_ci NOT NULL,
  `Opis` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`ProgramID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program`
--

LOCK TABLES `program` WRITE;
/*!40000 ALTER TABLE `program` DISABLE KEYS */;
INSERT INTO `program` VALUES (1,'splosna gimnazija','nic pametnega'),(2,'tehnicna gimnazija','no comment'),(3,'racunalniski tehnik','zakon'),(4,'gostinski tehnik','ok'),(5,'komercialist','lopov');
/*!40000 ALTER TABLE `program` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sola`
--

DROP TABLE IF EXISTS `sola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sola` (
  `SolaID` int(11) NOT NULL,
  `ImeSole` char(50) COLLATE utf8_slovenian_ci NOT NULL,
  `Naslov` char(50) COLLATE utf8_slovenian_ci NOT NULL,
  `Telefon` char(10) COLLATE utf8_slovenian_ci NOT NULL,
  `Email` char(20) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`SolaID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sola`
--

LOCK TABLES `sola` WRITE;
/*!40000 ALTER TABLE `sola` DISABLE KEYS */;
INSERT INTO `sola` VALUES (1,'Vegova','Vegova 4 Ljubljana','+386112312','uprava@vegova.si'),(2,'TSC','Kidriceva2 Kranj','+386444412','uprava@tsckr.si'),(3,'Sentvid','Celovska 199 Ljubljana','+386154545','uprava@sentvid.si'),(7,'Vrtec Kekec','Slovenska 1 Ljubljana','+386111111','kekec@vrtec.si');
/*!40000 ALTER TABLE `sola` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-21  0:09:22
