-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: sgeIFitp
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `tbladministrador`
--

DROP TABLE IF EXISTS `tbladministrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbladministrador` (
  `idAdm` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAdm` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdm`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbladministrador`
--

LOCK TABLES `tbladministrador` WRITE;
/*!40000 ALTER TABLE `tbladministrador` DISABLE KEYS */;
INSERT INTO `tbladministrador` VALUES (19,'Ademir Johnson','ademir@admin','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(20,'Alisson','alisson@inter.roma','ae0454d3c5bc87b46d7d9045aeabdb024c89946c');
/*!40000 ALTER TABLE `tbladministrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcertificados`
--

DROP TABLE IF EXISTS `tblcertificados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcertificados` (
  `codRegistro` int(11) NOT NULL AUTO_INCREMENT,
  `idPart` int(11) DEFAULT NULL,
  `idEvento` int(11) NOT NULL,
  `dataGeracao` datetime DEFAULT NULL,
  `idCurso` int(11) DEFAULT NULL,
  `idMinist` int(11) DEFAULT NULL,
  `dtInicio` date NOT NULL,
  `dtTermino` date DEFAULT NULL,
  `responsEmissao` varchar(100) NOT NULL,
  `conteudoProg` varchar(10000) DEFAULT NULL,
  `organizador` varchar(100) NOT NULL,
  PRIMARY KEY (`codRegistro`),
  KEY `idPart` (`idPart`),
  KEY `idEvento` (`idEvento`),
  KEY `idCurso` (`idCurso`),
  KEY `idMinist` (`idMinist`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcertificados`
--

LOCK TABLES `tblcertificados` WRITE;
/*!40000 ALTER TABLE `tblcertificados` DISABLE KEYS */;
INSERT INTO `tblcertificados` VALUES (106,29,36,'2018-06-16 17:54:50',NULL,NULL,'1999-10-15','1999-10-15','Lah',NULL,'j'),(107,29,36,'2018-06-16 17:55:15',NULL,NULL,'1999-10-15','1999-10-15','Blues',NULL,'j'),(108,29,36,'2018-06-16 17:55:15',26,NULL,'1999-10-15','1999-10-15','Blues','h','j'),(109,NULL,36,'2018-06-16 17:55:15',26,9,'1999-10-15','1999-10-15','Blues',NULL,'j'),(110,30,37,'2018-06-16 18:24:14',NULL,NULL,'6543-04-23','5323-03-31','mi',NULL,'a'),(111,30,37,'2018-06-16 18:24:16',27,NULL,'6543-04-23','5323-03-31','mi','j','a'),(112,NULL,37,'2018-06-16 18:24:18',27,9,'6543-04-23','5323-03-31','mi',NULL,'a');
/*!40000 ALTER TABLE `tblcertificados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcursos`
--

DROP TABLE IF EXISTS `tblcursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcursos` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `nmCurso` varchar(200) NOT NULL,
  `tpCurso` varchar(50) NOT NULL,
  `dtInicioCurso` date NOT NULL,
  `dtTermCurso` date DEFAULT NULL,
  `contProgCurso` varchar(10000) NOT NULL,
  `crgHrCurso` varchar(150) NOT NULL,
  `limitPart` int(11) DEFAULT NULL,
  `idMinist` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `horaInicioCurso` time DEFAULT NULL,
  `horaTermCurso` time DEFAULT NULL,
  `localCurso` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idCurso`),
  KEY `idMinist` (`idMinist`),
  KEY `idEvento` (`idEvento`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcursos`
--

LOCK TABLES `tblcursos` WRITE;
/*!40000 ALTER TABLE `tblcursos` DISABLE KEYS */;
INSERT INTO `tblcursos` VALUES (24,'Hallelujah','wdewqiuh','7394-02-24','8342-03-08','chsda','uiyiuwq',123,9,34,'03:42:00','08:59:00','jhkjhdsa'),(25,'mqn3','23sdf2342','0003-04-22','0798-09-08','7YUDASG','gygw',786,9,35,'06:59:00','09:59:00','ghjdgajsd'),(26,'FÃ³Ã²dÃ¢Ã£h$e','q','2423-08-23',NULL,'h','k',NULL,9,36,NULL,NULL,NULL),(27,'CafÃ© FilosÃ³fico','Mesa-redonda','2020-02-16','2020-02-16','Bate-papo entre estudantes de Filosofiaa','1h',38,10,37,'15:30:00','16:30:00','AuditÃ³rio do Bloco de InformÃ¡tica');
/*!40000 ALTER TABLE `tblcursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbleventos`
--

DROP TABLE IF EXISTS `tbleventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbleventos` (
  `idEvnt` int(11) NOT NULL AUTO_INCREMENT,
  `nmEvnt` varchar(200) NOT NULL,
  `tpEvnt` varchar(100) NOT NULL,
  `dtInicioEvnt` date NOT NULL,
  `dtTermEvnt` date DEFAULT NULL,
  `dtLimitInsc` date DEFAULT NULL,
  `contProgEvnt` varchar(10000) NOT NULL,
  `respEvnt` varchar(150) NOT NULL,
  `crgHrEvnt` varchar(150) NOT NULL,
  `horaInicioEvnt` time DEFAULT NULL,
  `horaTermEvnt` time DEFAULT NULL,
  `localEvnt` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idEvnt`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbleventos`
--

LOCK TABLES `tbleventos` WRITE;
/*!40000 ALTER TABLE `tbleventos` DISABLE KEYS */;
INSERT INTO `tbleventos` VALUES (37,'5Âº Encontro Regional de Estudantes de Filosofia','Mesa-redonda','2020-02-15','2020-02-19','2020-02-13','Conversas sobre o rumo da humanidade','MÃ¡rcia Juliana Couto','36 horas','15:00:00','20:00:00','IFSP Itapetininga');
/*!40000 ALTER TABLE `tbleventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfiguras`
--

DROP TABLE IF EXISTS `tblfiguras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfiguras` (
  `idFigura` int(11) NOT NULL AUTO_INCREMENT,
  `caminho` varchar(1000) DEFAULT NULL,
  `tipoFigura` varchar(70) NOT NULL,
  `idEvento` int(11) DEFAULT NULL,
  `idCert` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFigura`),
  KEY `idEvento` (`idEvento`),
  KEY `idCert` (`idCert`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfiguras`
--

LOCK TABLES `tblfiguras` WRITE;
/*!40000 ALTER TABLE `tblfiguras` DISABLE KEYS */;
INSERT INTO `tblfiguras` VALUES (42,'img/71b13765e6477bd68ed8a818bc2edf96.png','Logo',34,NULL),(43,'img/0d1089c3e3444deda346a2e57734314a.jpg','Logo',36,NULL),(44,'img/0feec2914cff101a1375084ecbb1f5a8.png','Logo',37,NULL),(45,'webPage/img/ecfd8fdcbda87e20075e3fa3725de5c4.jpg','Plano_de_Fundo',37,NULL),(50,'webPage/img/cf3bea637da039c8cdfc31e53e352134.png','Galeria',37,NULL),(47,'img/7db34b151751706cf042ac1645cc06d8.png','Logo',37,NULL),(48,'webPage/img/d5ef6a3fe142517ddbae477d88a8da49.png','Plano_de_Fundo',37,NULL),(49,'webPage/img/8366e5018d7087d57489d2391d226cc5.png','Plano_de_Fundo',37,NULL),(51,'webPage/img/77f2d08626c37ba42954cac97cba1202.jpg','Galeria',37,NULL),(52,'webPage/img/91370b33a9da4c3610c5aae500553dd8.jpg','Galeria',37,NULL),(53,'webPage/img/ec99ffeccabccf293b794cbc602a6199.jpg','Galeria',37,NULL),(54,'webPage/img/15243fa59878ca12a9d7a9f0c18463be.jpg','Galeria',37,NULL),(55,'webPage/img/cd9fc8e32ab76935b9be39dcea494ef5.jpg','Galeria',37,NULL);
/*!40000 ALTER TABLE `tblfiguras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblministrantes`
--

DROP TABLE IF EXISTS `tblministrantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblministrantes` (
  `idMinist` int(11) NOT NULL AUTO_INCREMENT,
  `nmMinist` varchar(150) NOT NULL,
  `cpfMinist` varchar(15) NOT NULL,
  `emailMinist` varchar(100) NOT NULL,
  `phoneMinist` varchar(20) NOT NULL,
  PRIMARY KEY (`idMinist`),
  UNIQUE KEY `cpfMinist` (`cpfMinist`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblministrantes`
--

LOCK TABLES `tblministrantes` WRITE;
/*!40000 ALTER TABLE `tblministrantes` DISABLE KEYS */;
INSERT INTO `tblministrantes` VALUES (9,'JosÃ© Carlos Pereira Neto','134365425687','j@c','15983453754'),(10,'Eduardo Janssen','21319028255','duduj@gmail.com','15988121412');
/*!40000 ALTER TABLE `tblministrantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpartcurso`
--

DROP TABLE IF EXISTS `tblpartcurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblpartcurso` (
  `idPartCurso` int(11) NOT NULL AUTO_INCREMENT,
  `idPart` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  PRIMARY KEY (`idPartCurso`),
  KEY `idPart` (`idPart`),
  KEY `idCurso` (`idCurso`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpartcurso`
--

LOCK TABLES `tblpartcurso` WRITE;
/*!40000 ALTER TABLE `tblpartcurso` DISABLE KEYS */;
INSERT INTO `tblpartcurso` VALUES (22,29,26),(23,30,27);
/*!40000 ALTER TABLE `tblpartcurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblparticipantes`
--

DROP TABLE IF EXISTS `tblparticipantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblparticipantes` (
  `idPart` int(11) NOT NULL AUTO_INCREMENT,
  `nmPart` varchar(150) NOT NULL,
  `cpfPart` varchar(15) NOT NULL,
  `emailPart` varchar(100) NOT NULL,
  `phonePart` varchar(20) NOT NULL,
  `ocupPart` varchar(50) NOT NULL,
  `senhaPart` varchar(100) NOT NULL,
  PRIMARY KEY (`idPart`),
  UNIQUE KEY `cpfPart` (`cpfPart`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblparticipantes`
--

LOCK TABLES `tblparticipantes` WRITE;
/*!40000 ALTER TABLE `tblparticipantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblparticipantes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-19 18:24:16
