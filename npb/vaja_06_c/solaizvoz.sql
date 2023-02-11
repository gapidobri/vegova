-- MariaDB dump 10.19  Distrib 10.9.3-MariaDB, for debian-linux-gnu (aarch64)
--
-- Host: localhost    Database: primer2sola
-- ------------------------------------------------------
-- Server version       10.9.3-MariaDB-1:10.9.3+maria~ubu2204
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;

/*!40103 SET TIME_ZONE='+00:00' */
;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

--
-- Table structure for table `sola`
--
DROP TABLE IF EXISTS `sola`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `sola` (
  `SolaID` int(11) NOT NULL,
  `ImeSole` char(50) COLLATE utf8mb3_slovenian_ci NOT NULL,
  `Naslov` char(50) COLLATE utf8mb3_slovenian_ci NOT NULL,
  `Telefon` char(10) COLLATE utf8mb3_slovenian_ci NOT NULL,
  `Email` char(20) COLLATE utf8mb3_slovenian_ci NOT NULL,
  PRIMARY KEY (`SolaID`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8mb3 COLLATE = utf8mb3_slovenian_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `sola`
--
LOCK TABLES `sola` WRITE;

/*!40000 ALTER TABLE `sola` DISABLE KEYS */
;

INSERT INTO
  `sola`
VALUES
  (
    1,
    'Vegova',
    'Vegova 4 Ljubljana',
    '+386112312',
    'uprava@vegova.si'
  ),
  (
    2,
    'TSC',
    'Kidriceva2 Kranj',
    '+386444412',
    'uprava@tsckr.si'
  ),
  (
    3,
    'Sentvid',
    'Celovska 199 Ljubljana',
    '+386154545',
    'uprava@sentvid.si'
  ),
  (
    7,
    'Vrtec Kekec',
    'Slovenska 1 Ljubljana',
    '+386111111',
    'kekec@vrtec.si'
  ),
  (
    4,
    'Gim Poljane',
    'Poljanska 2 Ljubljana',
    '+386332312',
    'uprava@poljane.si'
  ),
  (
    5,
    'Gim. Jesenice',
    'Titova 44 Jesenice',
    '+386444424',
    'gimanzija@jesenice.s'
  );

/*!40000 ALTER TABLE `sola` ENABLE KEYS */
;

UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;

-- Dump completed on 2023-02-11 11:41:01
root @a71618e3a4b3: / # mysqldump primer2sola --tables sola
-- MariaDB dump 10.19  Distrib 10.9.3-MariaDB, for debian-linux-gnu (aarch64)
--
-- Host: localhost    Database: primer2sola
-- ------------------------------------------------------
-- Server version       10.9.3-MariaDB-1:10.9.3+maria~ubu2204
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;

/*!40103 SET TIME_ZONE='+00:00' */
;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

--
-- Table structure for table `sola`
--
DROP TABLE IF EXISTS `sola`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `sola` (
  `SolaID` int(11) NOT NULL,
  `ImeSole` char(50) COLLATE utf8mb3_slovenian_ci NOT NULL,
  `Naslov` char(50) COLLATE utf8mb3_slovenian_ci NOT NULL,
  `Telefon` char(10) COLLATE utf8mb3_slovenian_ci NOT NULL,
  `Email` char(20) COLLATE utf8mb3_slovenian_ci NOT NULL,
  PRIMARY KEY (`SolaID`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8mb3 COLLATE = utf8mb3_slovenian_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `sola`
--
LOCK TABLES `sola` WRITE;

/*!40000 ALTER TABLE `sola` DISABLE KEYS */
;

INSERT INTO
  `sola`
VALUES
  (
    1,
    'Vegova',
    'Vegova 4 Ljubljana',
    '+386112312',
    'uprava@vegova.si'
  ),
  (
    2,
    'TSC',
    'Kidriceva2 Kranj',
    '+386444412',
    'uprava@tsckr.si'
  ),
  (
    3,
    'Sentvid',
    'Celovska 199 Ljubljana',
    '+386154545',
    'uprava@sentvid.si'
  ),
  (
    7,
    'Vrtec Kekec',
    'Slovenska 1 Ljubljana',
    '+386111111',
    'kekec@vrtec.si'
  ),
  (
    4,
    'Gim Poljane',
    'Poljanska 2 Ljubljana',
    '+386332312',
    'uprava@poljane.si'
  ),
  (
    5,
    'Gim. Jesenice',
    'Titova 44 Jesenice',
    '+386444424',
    'gimanzija@jesenice.s'
  );

/*!40000 ALTER TABLE `sola` ENABLE KEYS */
;

UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;

-- Dump completed on 2023-02-11 11:41:26