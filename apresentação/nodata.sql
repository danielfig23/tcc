CREATE DATABASE  IF NOT EXISTS `mapstrack` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mapstrack`;
-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: mapstrack
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `adm`
--

DROP TABLE IF EXISTS `adm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm` (
  `idadm` int(11) NOT NULL AUTO_INCREMENT,
  `nome_adm` varchar(16) NOT NULL,
  `sobrenome_adm` varchar(32) NOT NULL,
  `email_adm` varchar(30) NOT NULL,
  `cpf_adm` varchar(11) NOT NULL,
  `senha_adm` varchar(60) NOT NULL,
  `hidden` varchar(10) NOT NULL DEFAULT 'FALSE',
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `idcategorias` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `descricao_categoria` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idcategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `idcidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cidade` varchar(99) NOT NULL,
  `uf_cidade` varchar(2) NOT NULL,
  PRIMARY KEY (`idcidade`)
) ENGINE=InnoDB AUTO_INCREMENT=8525 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estabelecimento`
--

DROP TABLE IF EXISTS `estabelecimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estabelecimento` (
  `idestabelecimento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_estabelecimento` varchar(100) NOT NULL,
  `idcidade` int(11) NOT NULL,
  `horarioabeds` time DEFAULT NULL,
  `horariofecds` time DEFAULT NULL,
  `horarioabedom` time DEFAULT NULL,
  `horariofecdom` time DEFAULT NULL,
  `endereco` varchar(200) NOT NULL,
  `mapa` longblob,
  `descricao` varchar(1000) NOT NULL DEFAULT 'Esta é uma descrição padrão.',
  `caminhoimagem` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idestabelecimento`),
  KEY `idcidade_idx` (`idcidade`),
  CONSTRAINT `fk1` FOREIGN KEY (`idcidade`) REFERENCES `cidade` (`idcidade`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL,
  `uf` varchar(5) NOT NULL,
  `pais` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Estado_pais` (`pais`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `loja`
--

DROP TABLE IF EXISTS `loja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loja` (
  `idloja` int(11) NOT NULL AUTO_INCREMENT,
  `localizacao_loja` varchar(80) DEFAULT NULL,
  `nome_loja` varchar(80) NOT NULL,
  `idestabelecimento` int(11) NOT NULL,
  `descricao` varchar(999) NOT NULL,
  `logoloja` longblob,
  `fotofachada` longblob,
  `idbox` int(11) NOT NULL,
  `caminhoimagem` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idloja`),
  KEY `fk_loja_1_idx` (`idestabelecimento`),
  KEY `fk_loja_2_idx` (`idbox`),
  CONSTRAINT `fk_loja_1` FOREIGN KEY (`idestabelecimento`) REFERENCES `estabelecimento` (`idestabelecimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_loja_2` FOREIGN KEY (`idbox`) REFERENCES `shopping_box` (`idbox`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lojascategorias`
--

DROP TABLE IF EXISTS `lojascategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lojascategorias` (
  `idcategorias` int(11) NOT NULL,
  `idloja` int(11) NOT NULL,
  KEY `fkestiloloja` (`idloja`),
  KEY `idcategorias_idx` (`idcategorias`),
  CONSTRAINT `fk_LC_1` FOREIGN KEY (`idcategorias`) REFERENCES `categorias` (`idcategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_LC_2` FOREIGN KEY (`idloja`) REFERENCES `loja` (`idloja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `shopping_box`
--

DROP TABLE IF EXISTS `shopping_box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_box` (
  `idbox` int(11) NOT NULL AUTO_INCREMENT,
  `tamanho` varchar(45) NOT NULL,
  `idestabelecimento` int(11) NOT NULL,
  `nome_box` varchar(45) NOT NULL,
  PRIMARY KEY (`idbox`),
  KEY `fk_box_2_idx` (`idestabelecimento`),
  CONSTRAINT `fk_box_2` FOREIGN KEY (`idestabelecimento`) REFERENCES `estabelecimento` (`idestabelecimento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-07  4:06:25
