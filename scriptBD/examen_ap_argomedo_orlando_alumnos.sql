-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: examen
-- ------------------------------------------------------
-- Server version	8.0.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ap_argomedo_orlando_alumnos`
--

DROP TABLE IF EXISTS `ap_argomedo_orlando_alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ap_argomedo_orlando_alumnos` (
  `AL_ID` int NOT NULL AUTO_INCREMENT,
  `AL_NOMBRES` varchar(50) NOT NULL,
  `AL_APELLIDOS` varchar(60) NOT NULL,
  `AL_FECHA_NAC` date NOT NULL,
  `AL_SEXO` char(1) NOT NULL,
  `AL_ESTADO` tinyint NOT NULL,
  PRIMARY KEY (`AL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ap_argomedo_orlando_alumnos`
--

LOCK TABLES `ap_argomedo_orlando_alumnos` WRITE;
/*!40000 ALTER TABLE `ap_argomedo_orlando_alumnos` DISABLE KEYS */;
INSERT INTO `ap_argomedo_orlando_alumnos` VALUES (1,'Kir','Argomedo','1998-05-23','M',0),(2,'Roberto','Gonzales','1994-05-22','M',1),(3,'Francisca','Casti','1997-06-10','F',1),(4,'Alessandro','Torre','1995-02-15','M',1),(5,'Catalina','Madrid','2000-12-12','F',1),(6,'Nicole','Maestre','1993-08-12','F',1),(7,'Ionut','Ribas','1999-08-17','F',1),(8,'Haizea','Aguilera','1995-07-25','M',1),(9,'Joel','Carvajal','1990-08-11','M',1),(10,'Lara','Nogales','2001-08-26','F',1);
/*!40000 ALTER TABLE `ap_argomedo_orlando_alumnos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-18  7:27:06
