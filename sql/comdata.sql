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
  `cpf_adm` varchar(14) NOT NULL,
  `senha_adm` varchar(60) NOT NULL,
  `hidden` varchar(10) NOT NULL DEFAULT 'FALSE',
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm`
--

LOCK TABLES `adm` WRITE;
/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` VALUES (15,'Administrador','Administrador','adm@gmail.com','111.111.111-11','$2y$10$yFg5O.XVUOh9604XPlLWzuGxY7iTFoe26ip4nYpN9xEpR3pOsLGDC','FALSE');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (8080,'Abdon Batista','SC'),(8081,'Abelardo Luz','SC'),(8082,'Agrolandia','SC'),(8083,'Agronomica','SC'),(8084,'Agua Doce','SC'),(8085,'Aguas Brancas','SC'),(8086,'Aguas Claras','SC'),(8087,'Aguas de Chapeco','SC'),(8088,'Aguas Frias','SC'),(8089,'Aguas Mornas','SC'),(8090,'Aguti','SC'),(8091,'Aiure','SC'),(8092,'Alfredo Wagner','SC'),(8093,'Alto Alegre','SC'),(8094,'Alto Bela Vista','SC'),(8095,'Alto da Serra','SC'),(8096,'Anchieta','SC'),(8097,'Angelina','SC'),(8098,'Anita Garibaldi','SC'),(8099,'Anitapolis','SC'),(8100,'Anta Gorda','SC'),(8101,'Antonio Carlos','SC'),(8102,'Apiuna','SC'),(8103,'Arabuta','SC'),(8104,'Araquari','SC'),(8105,'Ararangua','SC'),(8106,'Armazem','SC'),(8107,'Arnopolis','SC'),(8108,'Arroio Trinta','SC'),(8109,'Arvoredo','SC'),(8110,'Ascurra','SC'),(8111,'Atalanta','SC'),(8112,'Aterrado Torto','SC'),(8113,'Aurora','SC'),(8114,'Azambuja','SC'),(8115,'Baia Alta','SC'),(8116,'Balneario Arroio do Silva','SC'),(8117,'Balneario Barra do Sul','SC'),(8118,'Balneario Camboriu','SC'),(8119,'Balneario Gaivota','SC'),(8120,'Balneario Morro dos Conventos','SC'),(8121,'Bandeirante','SC'),(8122,'Barra Bonita','SC'),(8123,'Barra Clara','SC'),(8124,'Barra da Lagoa','SC'),(8125,'Barra da Prata','SC'),(8126,'Barra Fria','SC'),(8127,'Barra Grande','SC'),(8128,'Barra Velha','SC'),(8129,'Barreiros','SC'),(8130,'Barro Branco','SC'),(8131,'Bateias de Baixo','SC'),(8132,'Bela Vista','SC'),(8133,'Bela Vista do Sul','SC'),(8134,'Bela Vista do Toldo','SC'),(8135,'Belmonte','SC'),(8136,'Benedito Novo','SC'),(8137,'Biguacu','SC'),(8138,'Blumenau','SC'),(8139,'Bocaina do Sul','SC'),(8140,'Boiteuxburgo','SC'),(8141,'Bom Jardim da Serra','SC'),(8142,'Bom Jesus','SC'),(8143,'Bom Jesus do Oeste','SC'),(8144,'Bom Retiro','SC'),(8145,'Bom Sucesso','SC'),(8146,'Bombinhas','SC'),(8147,'Botuvera','SC'),(8148,'Braco do Norte','SC'),(8149,'Braco do Trombudo','SC'),(8150,'Brunopolis','SC'),(8151,'Brusque','SC'),(8152,'Cacador','SC'),(8153,'Cachoeira de Fatima','SC'),(8154,'Cachoeira do Bom Jesus','SC'),(8155,'Caibi','SC'),(8156,'Calmon','SC'),(8157,'Camboriu','SC'),(8158,'Cambuinzal','SC'),(8159,'Campeche','SC'),(8160,'Campinas','SC'),(8161,'Campo Alegre','SC'),(8162,'Campo Belo do Sul','SC'),(8163,'Campo Ere','SC'),(8164,'Campos Novos','SC'),(8165,'Canasvieiras','SC'),(8166,'Canelinha','SC'),(8167,'Canoas','SC'),(8168,'Canoinhas','SC'),(8169,'Capao Alto','SC'),(8170,'Capinzal','SC'),(8171,'Capivari de Baixo','SC'),(8172,'Caraiba','SC'),(8173,'Catanduvas','SC'),(8174,'Catuira','SC'),(8175,'Caxambu do Sul','SC'),(8176,'Cedro Alto','SC'),(8177,'Celso Ramos','SC'),(8178,'Cerro Negro','SC'),(8179,'Chapadao do Lageado','SC'),(8180,'Chapeco','SC'),(8181,'Claraiba','SC'),(8182,'Cocal do Sul','SC'),(8183,'Colonia Santa Tereza','SC'),(8184,'Colonia Santana','SC'),(8185,'Concordia','SC'),(8186,'Cordilheira Alta','SC'),(8187,'Coronel Freitas','SC'),(8188,'Coronel Martins','SC'),(8189,'Correia Pinto','SC'),(8190,'Corupa','SC'),(8191,'Criciuma','SC'),(8192,'Cunha Pora','SC'),(8193,'Cunhatai','SC'),(8194,'Curitibanos','SC'),(8195,'Dal Pai','SC'),(8196,'Dalbergia','SC'),(8197,'Descanso','SC'),(8198,'Dionisio Cerqueira','SC'),(8199,'Dona Emma','SC'),(8200,'Doutor Pedrinho','SC'),(8201,'Engenho Velho','SC'),(8202,'Enseada de Brito','SC'),(8203,'Entre Rios','SC'),(8204,'Ermo','SC'),(8205,'Erval Velho','SC'),(8206,'Espinilho','SC'),(8207,'Estacao Cocal','SC'),(8208,'Faxinal dos Guedes','SC'),(8209,'Fazenda Zandavalli','SC'),(8210,'Felipe Schmidt','SC'),(8211,'Figueira','SC'),(8212,'Flor do Sertao','SC'),(8213,'Florianopolis','SC'),(8214,'Formosa do Sul','SC'),(8215,'Forquilhinha','SC'),(8216,'Fragosos','SC'),(8217,'Fraiburgo','SC'),(8218,'Frederico Wastner','SC'),(8219,'Frei Rogerio','SC'),(8220,'Galvao','SC'),(8221,'Garcia','SC'),(8222,'Garopaba','SC'),(8223,'Garuva','SC'),(8224,'Gaspar','SC'),(8225,'Goio-en','SC'),(8226,'Governador Celso Ramos','SC'),(8227,'Grao Para','SC'),(8228,'Grapia','SC'),(8229,'Gravatal','SC'),(8230,'Guabiruba','SC'),(8231,'Guaporanga','SC'),(8232,'Guaraciaba','SC'),(8233,'Guaramirim','SC'),(8234,'Guaruja do Sul','SC'),(8235,'Guata','SC'),(8236,'Guatambu','SC'),(8237,'Hercilio Luz','SC'),(8238,'Herciliopolis','SC'),(8240,'Ibiam','SC'),(8241,'Ibicare','SC'),(8242,'Ibicui','SC'),(8243,'Ibirama','SC'),(8244,'Icara','SC'),(8245,'Ilhota','SC'),(8246,'Imarui','SC'),(8247,'Imbituba','SC'),(8248,'Imbuia','SC'),(8249,'Indaial','SC'),(8250,'Indios','SC'),(8251,'Ingleses do Rio Vermelho','SC'),(8252,'Invernada','SC'),(8253,'Iomere','SC'),(8254,'Ipira','SC'),(8255,'Ipomeia','SC'),(8256,'Ipora do Oeste','SC'),(8257,'Ipuacu','SC'),(8258,'Ipumirim','SC'),(8259,'Iraceminha','SC'),(8260,'Irakitan','SC'),(8261,'Irani','SC'),(8262,'Iraputa','SC'),(8263,'Irati','SC'),(8264,'Irineopolis','SC'),(8265,'Ita','SC'),(8266,'Itaio','SC'),(8267,'Itaiopolis','SC'),(8268,'Itajai','SC'),(8269,'Itajuba','SC'),(8270,'Itapema','SC'),(8271,'Itapiranga','SC'),(8272,'Itapoa','SC'),(8273,'Itapocu','SC'),(8274,'Itoupava','SC'),(8275,'Ituporanga','SC'),(8276,'Jabora','SC'),(8277,'Jacinto Machado','SC'),(8278,'Jaguaruna','SC'),(8279,'Jaragua do Sul','SC'),(8280,'Jardinopolis','SC'),(8281,'Joacaba','SC'),(8282,'Joinville','SC'),(8283,'Jose Boiteux','SC'),(8284,'Jupia','SC'),(8285,'Lacerdopolis','SC'),(8286,'Lages','SC'),(8287,'Lagoa','SC'),(8288,'Lagoa da Estiva','SC'),(8289,'Laguna','SC'),(8290,'Lajeado Grande','SC'),(8291,'Laurentino','SC'),(8292,'Lauro Muller','SC'),(8293,'Leao','SC'),(8294,'Lebon Regis','SC'),(8295,'Leoberto Leal','SC'),(8296,'Lindoia do Sul','SC'),(8297,'Linha das Palmeiras','SC'),(8298,'Lontras','SC'),(8299,'Lourdes','SC'),(8300,'Luiz Alves','SC'),(8301,'Luzerna','SC'),(8302,'Machados','SC'),(8303,'Macieira','SC'),(8304,'Mafra','SC'),(8305,'Major Gercino','SC'),(8306,'Major Vieira','SC'),(8307,'Maracaja','SC'),(8308,'Marari','SC'),(8309,'Marata','SC'),(8310,'Maravilha','SC'),(8311,'Marcilio Dias','SC'),(8312,'Marechal Bormann','SC'),(8313,'Marema','SC'),(8314,'Mariflor','SC'),(8315,'Marombas','SC'),(8316,'Marombas Bossardi','SC'),(8317,'Massaranduba','SC'),(8318,'Matos Costa','SC'),(8319,'Meleiro','SC'),(8320,'Mirador','SC'),(8321,'Mirim','SC'),(8322,'Mirim Doce','SC'),(8323,'Modelo','SC'),(8324,'Mondai','SC'),(8325,'Monte Alegre','SC'),(8326,'Monte Carlo','SC'),(8327,'Monte Castelo','SC'),(8328,'Morro Chato','SC'),(8329,'Morro da Fumaca','SC'),(8330,'Morro do Meio','SC'),(8331,'Morro Grande','SC'),(8332,'Navegantes','SC'),(8333,'Nossa Senhora de Caravaggio','SC'),(8334,'Nova Cultura','SC'),(8335,'Nova Erechim','SC'),(8336,'Nova Guarita','SC'),(8337,'Nova Itaberaba','SC'),(8338,'Nova Petropolis','SC'),(8339,'Nova Teutonia','SC'),(8340,'Nova Trento','SC'),(8341,'Nova Veneza','SC'),(8342,'Novo Horizonte','SC'),(8343,'Orleans','SC'),(8344,'Otacilio Costa','SC'),(8345,'Ouro','SC'),(8346,'Ouro Verde','SC'),(8347,'Paial','SC'),(8348,'Painel','SC'),(8349,'Palhoca','SC'),(8350,'Palma Sola','SC'),(8351,'Palmeira','SC'),(8352,'Palmitos','SC'),(8353,'Pantano do Sul','SC'),(8354,'Papanduva','SC'),(8355,'Paraiso','SC'),(8356,'Passo de Torres','SC'),(8357,'Passo Manso','SC'),(8358,'Passos Maia','SC'),(8359,'Paula Pereira','SC'),(8360,'Paulo Lopes','SC'),(8361,'Pedras Grandes','SC'),(8362,'Penha','SC'),(8363,'Perico','SC'),(8364,'Peritiba','SC'),(8365,'Pescaria Brava','SC'),(8366,'Petrolandia','SC'),(8367,'Picarras','SC'),(8368,'Pindotiba','SC'),(8369,'Pinhalzinho','SC'),(8370,'Pinheiral','SC'),(8371,'Pinheiro Preto','SC'),(8372,'Pinheiros','SC'),(8373,'Pirabeiraba','SC'),(8374,'Piratuba','SC'),(8375,'Planalto','SC'),(8376,'Planalto Alegre','SC'),(8377,'Poco Preto','SC'),(8378,'Pomerode','SC'),(8379,'Ponte Alta','SC'),(8380,'Ponte Alta do Norte','SC'),(8381,'Ponte Serrada','SC'),(8382,'Porto Belo','SC'),(8383,'Porto Uniao','SC'),(8384,'Pouso Redondo','SC'),(8385,'Praia Grande','SC'),(8386,'Prata','SC'),(8387,'Presidente Castelo Branco','SC'),(8388,'Presidente Getulio','SC'),(8389,'Presidente Juscelino','SC'),(8390,'Presidente Kennedy','SC'),(8391,'Presidente Nereu','SC'),(8392,'Princesa','SC'),(8393,'Quarta Linha','SC'),(8394,'Quilombo','SC'),(8395,'Quilometro Doze','SC'),(8396,'Rancho Queimado','SC'),(8397,'Ratones','SC'),(8398,'Residencia Fuck','SC'),(8399,'Ribeirao da Ilha','SC'),(8400,'Ribeirao Pequeno','SC'),(8401,'Rio Antinha','SC'),(8402,'Rio Bonito','SC'),(8404,'Rio da Anta','SC'),(8405,'Rio da Luz','SC'),(8406,'Rio das Antas','SC'),(8407,'Rio das Furnas','SC'),(8408,'Rio do Campo','SC'),(8409,'Rio do Oeste','SC'),(8410,'Rio do Sul','SC'),(8411,'Rio dos Bugres','SC'),(8412,'Rio dos Cedros','SC'),(8413,'Rio Fortuna','SC'),(8414,'Rio Maina','SC'),(8415,'Rio Negrinho','SC'),(8416,'Rio Preto do Sul','SC'),(8417,'Rio Rufino','SC'),(8418,'Riqueza','SC'),(8419,'Rodeio','SC'),(8420,'Romelandia','SC'),(8421,'Sai','SC'),(8422,'Salete','SC'),(8423,'Saltinho','SC'),(8424,'Salto Veloso','SC'),(8425,'Sanga da Toca','SC'),(8426,'Sangao','SC'),(8427,'Santa Cecilia','SC'),(8428,'Santa Cruz do Timbo','SC'),(8429,'Santa Helena','SC'),(8430,'Santa Izabel','SC'),(8431,'Santa Lucia','SC'),(8432,'Santa Maria','SC'),(8433,'Santa Rosa de Lima','SC'),(8434,'Santa Rosa do Sul','SC'),(8435,'Santa Terezinha','SC'),(8436,'Santa Terezinha do Progresso','SC'),(8437,'Santa Terezinha do Salto','SC'),(8438,'Santiago do Sul','SC'),(8439,'Santo Amaro da Imperatriz','SC'),(8440,'Santo Antonio de Lisboa','SC'),(8441,'Sao Bento Baixo','SC'),(8442,'Sao Bento do Sul','SC'),(8443,'Sao Bernardino','SC'),(8444,'Sao Bonifacio','SC'),(8445,'Sao Carlos','SC'),(8446,'Sao Cristovao','SC'),(8447,'Sao Cristovao do Sul','SC'),(8448,'Sao Defende','SC'),(8449,'Sao Domingos','SC'),(8450,'Sao Francisco do Sul','SC'),(8451,'Sao Gabriel','SC'),(8452,'Sao Joao Batista','SC'),(8453,'Sao Joao do Itaperiu','SC'),(8454,'Sao Joao do Oeste','SC'),(8455,'Sao Joao do Rio Vermelho','SC'),(8456,'Sao Joao do Sul','SC'),(8457,'Sao Joaquim','SC'),(8458,'Sao Jose','SC'),(8459,'Sao Jose do Cedro','SC'),(8460,'Sao Jose do Cerrito','SC'),(8461,'Sao Jose do Laranjal','SC'),(8462,'Sao Leonardo','SC'),(8463,'Sao Lourenco do Oeste','SC'),(8464,'Sao Ludgero','SC'),(8465,'Sao Martinho','SC'),(8467,'Sao Miguel da Boa Vista','SC'),(8468,'Sao Miguel da Serra','SC'),(8469,'Sao Pedro de Alcantara','SC'),(8470,'Sao Pedro Tobias','SC'),(8471,'Sao Roque','SC'),(8472,'Sao Sebastiao do Arvoredo','SC'),(8473,'Sao Sebastiao do Sul','SC'),(8474,'Sapiranga','SC'),(8475,'Saudades','SC'),(8476,'Schroeder','SC'),(8477,'Seara','SC'),(8478,'Sede Oldemburg','SC'),(8479,'Serra Alta','SC'),(8480,'Sertao do Maruim','SC'),(8481,'Sideropolis','SC'),(8482,'Sombrio','SC'),(8483,'Sorocaba do Sul','SC'),(8484,'Sul Brasil','SC'),(8485,'Taio','SC'),(8486,'Tangara','SC'),(8487,'Taquara Verde','SC'),(8488,'Taquaras','SC'),(8489,'Tigipio','SC'),(8490,'Tigrinhos','SC'),(8491,'Tijucas','SC'),(8492,'Timbe do Sul','SC'),(8493,'Timbo','SC'),(8494,'Timbo Grande','SC'),(8495,'Tres Barras','SC'),(8496,'Treviso','SC'),(8497,'Treze de Maio','SC'),(8498,'Treze Tilias','SC'),(8499,'Trombudo Central','SC'),(8500,'Tubarao','SC'),(8501,'Tunapolis','SC'),(8502,'Tupitinga','SC'),(8503,'Turvo','SC'),(8504,'Uniao do Oeste','SC'),(8505,'Urubici','SC'),(8506,'Uruguai','SC'),(8507,'Urupema','SC'),(8508,'Urussanga','SC'),(8509,'Vargeao','SC'),(8510,'Vargem','SC'),(8511,'Vargem Bonita','SC'),(8512,'Vargem do Cedro','SC'),(8513,'Vidal Ramos','SC'),(8514,'Videira','SC'),(8515,'Vila Conceicao','SC'),(8516,'Vila de Volta Grande','SC'),(8517,'Vila Milani','SC'),(8518,'Vila Nova','SC'),(8519,'Vitor Meireles','SC'),(8520,'Witmarsum','SC'),(8521,'Xanxere','SC'),(8522,'Xavantina','SC'),(8523,'Xaxim','SC'),(8524,'Zortea','SC');
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estabelecimento`
--

LOCK TABLES `estabelecimento` WRITE;
/*!40000 ALTER TABLE `estabelecimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `estabelecimento` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (24,'Santa Catarina','SC','Brasil');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loja`
--

LOCK TABLES `loja` WRITE;
/*!40000 ALTER TABLE `loja` DISABLE KEYS */;
/*!40000 ALTER TABLE `loja` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `lojascategorias`
--

LOCK TABLES `lojascategorias` WRITE;
/*!40000 ALTER TABLE `lojascategorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `lojascategorias` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_box`
--

LOCK TABLES `shopping_box` WRITE;
/*!40000 ALTER TABLE `shopping_box` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_box` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-19 23:29:16
