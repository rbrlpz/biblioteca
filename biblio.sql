-- MySQL dump 10.13  Distrib 5.6.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: biblio
-- ------------------------------------------------------
-- Server version	5.6.24-0ubuntu2

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
DROP DATABASE IF EXISTS biblio;
CREATE DATABASE biblio;
USE biblio;
--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autor` (
  `aut_id` int(11) NOT NULL AUTO_INCREMENT,
  `aut_nombre` varchar(45) DEFAULT NULL,
  `aut_email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`aut_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editorial`
--

DROP TABLE IF EXISTS `editorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editorial` (
  `edi_id` int(11) NOT NULL DEFAULT '0',
  `edi_nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `edi_email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`edi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editorial`
--

LOCK TABLES `editorial` WRITE;
/*!40000 ALTER TABLE `editorial` DISABLE KEYS */;
/*!40000 ALTER TABLE `editorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `lib_id` int(11) NOT NULL AUTO_INCREMENT,
  `lib_titulo` varchar(100) DEFAULT NULL,
  `lib_isbn` varchar(20) DEFAULT NULL,
  `lib_num_pags` varchar(4) DEFAULT NULL,
  `lib_formato` varchar(20) DEFAULT NULL,
  `lib_disponible` binary(1) DEFAULT NULL,
  `lib_portada` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`lib_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros_autor`
--

DROP TABLE IF EXISTS `libros_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libros_autor` (
  `lia_lib_id` int(11) NOT NULL,
  `lia_aut_id` int(11) NOT NULL,
  KEY `fk_libros_autor_libros` (`lia_lib_id`),
  KEY `fk_libros_autor_autor` (`lia_aut_id`),
  CONSTRAINT `fk_libros_autor_autor` FOREIGN KEY (`lia_aut_id`) REFERENCES `autor` (`aut_id`),
  CONSTRAINT `fk_libros_autor_libros` FOREIGN KEY (`lia_lib_id`) REFERENCES `libro` (`lib_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros_autor`
--

LOCK TABLES `libros_autor` WRITE;
/*!40000 ALTER TABLE `libros_autor` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros_autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros_categoria`
--

DROP TABLE IF EXISTS `libros_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libros_categoria` (
  `lic_lib_id` int(11) NOT NULL,
  `lic_cat_id` int(11) NOT NULL,
  KEY `fk_libros_categoria_libros` (`lic_lib_id`),
  KEY `fk_libros_categoria_categoria` (`lic_cat_id`),
  CONSTRAINT `fk_libros_categoria_categoria` FOREIGN KEY (`lic_cat_id`) REFERENCES `categoria` (`cat_id`),
  CONSTRAINT `fk_libros_categoria_libros` FOREIGN KEY (`lic_lib_id`) REFERENCES `libro` (`lib_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros_categoria`
--

LOCK TABLES `libros_categoria` WRITE;
/*!40000 ALTER TABLE `libros_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros_editorial`
--

DROP TABLE IF EXISTS `libros_editorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libros_editorial` (
  `lie_lib_id` int(11) NOT NULL,
  `lie_edi_id` int(11) NOT NULL,
  KEY `fk_libros_editorial_libros` (`lie_lib_id`),
  KEY `fk_libros_editorial_editorial` (`lie_edi_id`),
  CONSTRAINT `fk_libros_editorial_editorial` FOREIGN KEY (`lie_edi_id`) REFERENCES `editorial` (`edi_id`),
  CONSTRAINT `fk_libros_editorial_libros` FOREIGN KEY (`lie_lib_id`) REFERENCES `libro` (`lib_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros_editorial`
--

LOCK TABLES `libros_editorial` WRITE;
/*!40000 ALTER TABLE `libros_editorial` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros_editorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestamo` (
  `pre_id` int(11) NOT NULL AUTO_INCREMENT,
  `pre_usu_id` int(11) DEFAULT NULL,
  `pre_lib_id` int(11) DEFAULT NULL,
  `pre_f_salida` date DEFAULT NULL,
  `pre_f_entrega` date DEFAULT NULL,
  `pre_cantidad` int(2) DEFAULT NULL,
  `pre_estatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`pre_id`),
  KEY `fk_prestamo_usuario` (`pre_usu_id`),
  KEY `fk_prestamo_libro` (`pre_lib_id`),
  CONSTRAINT `fk_prestamo_libro` FOREIGN KEY (`pre_lib_id`) REFERENCES `libro` (`lib_id`),
  CONSTRAINT `fk_prestamo_usuario` FOREIGN KEY (`pre_usu_id`) REFERENCES `usuario` (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamo`
--

LOCK TABLES `prestamo` WRITE;
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL DEFAULT '0',
  `usu_nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `usu_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `usu_clave` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `usu_telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-28 18:17:31
