-- MariaDB dump 10.19  Distrib 10.9.3-MariaDB, for debian-linux-gnu (aarch64)
--
-- Host: localhost    Database: DemoPB
-- ------------------------------------------------------
-- Server version	10.9.3-MariaDB-1:10.9.3+maria~ubu2204

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
-- Table structure for table `Predmet`
--

DROP TABLE IF EXISTS `Predmet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Predmet` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `kratica` varchar(3) NOT NULL,
  `imePredmeta` varchar(20) NOT NULL,
  `kreditneTocke` int(11) NOT NULL,
  `opis` varchar(200) NOT NULL,
  `stUrNaTeden` int(11) NOT NULL,
  `opombe` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  CONSTRAINT `CONSTRAINT_1` CHECK (`stUrNaTeden` >= 2 and `stUrNaTeden` <= 6)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Predmet`
--

LOCK TABLES `Predmet` WRITE;
/*!40000 ALTER TABLE `Predmet` DISABLE KEYS */;
INSERT INTO `Predmet` VALUES
(100,'MAT','Matematika',100,'Opis predmeta matematike',4,'zahtevna uporabna'),
(101,'PPB','Podatkovne baze',80,'Opis predmeta podatkovne baze',4,'zanimive uporabne'),
(102,'FIZ','Fizika',30,'Opis predmeta fizika',3,'zanimiva'),
(103,'SPL','Spletne aplikacije',70,'Opis predmeta spletne aplikacije',5,NULL),
(104,'MUL','Multimedija',60,'Opis predmeta multimedijska tehonologija',4,NULL);
/*!40000 ALTER TABLE `Predmet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-11 11:44:28