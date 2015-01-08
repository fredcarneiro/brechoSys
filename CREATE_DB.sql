CREATE DATABASE  IF NOT EXISTS `sysbrejo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sysbrejo`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: sysbrejo
-- ------------------------------------------------------
-- Server version	5.6.15

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
-- Table structure for table `endereco_usuario`
--

DROP TABLE IF EXISTS `endereco_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco_usuario` (
  `id_endereco_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id_usuario` int(11) NOT NULL,
  `logradouro` varchar(250) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `dt_cadastro` varchar(15) DEFAULT NULL,
  `tipo_endereco` varchar(45) DEFAULT NULL COMMENT '1-RESIDENCIAL\n2-TRABALHO',
  PRIMARY KEY (`id_endereco_usuario`),
  KEY `fk_endereco_usuario_usuario1_idx` (`usuario_id_usuario`),
  CONSTRAINT `fk_endereco_usuario_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco_usuario`
--

LOCK TABLES `endereco_usuario` WRITE;
/*!40000 ALTER TABLE `endereco_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_venda`
--

DROP TABLE IF EXISTS `item_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_venda` (
  `produto_id_produto` int(11) NOT NULL,
  `venda_id_venda` int(11) NOT NULL,
  KEY `fk_item_venda_produto1_idx` (`produto_id_produto`),
  KEY `fk_item_venda_venda1_idx` (`venda_id_venda`),
  CONSTRAINT `fk_item_venda_produto1` FOREIGN KEY (`produto_id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_venda_venda1` FOREIGN KEY (`venda_id_venda`) REFERENCES `venda` (`id_venda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_venda`
--

LOCK TABLES `item_venda` WRITE;
/*!40000 ALTER TABLE `item_venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `parcela` int(11) DEFAULT NULL,
  `dt_baixa` varchar(15) DEFAULT NULL,
  `dt_vencimento` varchar(15) DEFAULT NULL,
  `venda_id_venda` int(11) NOT NULL,
  `valor_parcela` float(12,2) DEFAULT NULL,
  PRIMARY KEY (`id_pagamento`),
  KEY `fk_pagamento_venda1_idx` (`venda_id_venda`),
  CONSTRAINT `fk_pagamento_venda1` FOREIGN KEY (`venda_id_venda`) REFERENCES `venda` (`id_venda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamento`
--

LOCK TABLES `pagamento` WRITE;
/*!40000 ALTER TABLE `pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(350) DEFAULT NULL,
  `preco_loja` float(12,2) DEFAULT NULL,
  `preco_repasse` float(12,2) DEFAULT NULL,
  `dt_baixa` varchar(15) DEFAULT NULL,
  `dt_cadastro` varchar(15) DEFAULT NULL,
  `dt_repasse` varchar(15) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `idade` varchar(3) DEFAULT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_produto_usuario1_idx` (`usuario_id_usuario`),
  CONSTRAINT `fk_produto_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefone_usuario`
--

DROP TABLE IF EXISTS `telefone_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone_usuario` (
  `id_telefone_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id_usuario` int(11) NOT NULL,
  `ddd` varchar(45) DEFAULT NULL,
  `nu_telefone` varchar(45) DEFAULT NULL,
  `tipo_telefone` varchar(45) DEFAULT NULL COMMENT '1-RESIDENCIAL\n2-CELULAR\n3-TRABALHO',
  `dt_cadastro` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_telefone_usuario`),
  KEY `fk_telefone_usuario_usuario_idx` (`usuario_id_usuario`),
  CONSTRAINT `fk_telefone_usuario_usuario` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone_usuario`
--

LOCK TABLES `telefone_usuario` WRITE;
/*!40000 ALTER TABLE `telefone_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefone_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(45) DEFAULT NULL,
  `dt_cadastro` varchar(15) DEFAULT NULL,
  `dt_nascimento` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float(12,2) DEFAULT NULL,
  `desconto` float(12,2) DEFAULT NULL,
  `valor_total` float(12,2) DEFAULT NULL,
  `dt_venda` varchar(15) DEFAULT NULL,
  `tp_pagamento` varchar(1) DEFAULT NULL,
  `parcelas` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_venda`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

LOCK TABLES `venda` WRITE;
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-23 15:23:39
