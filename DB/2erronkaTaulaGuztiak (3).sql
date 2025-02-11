-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: 2erronka
-- ------------------------------------------------------
-- Server version	8.0.41

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
-- Table structure for table `balorazioa`
--

DROP TABLE IF EXISTS `balorazioa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `balorazioa` (
  `idBalorazioa` int NOT NULL AUTO_INCREMENT,
  `Bezeroa_idBezeroa` int NOT NULL,
  `Produktua_idProduktua` int NOT NULL,
  `balorazioa` double DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idBalorazioa`),
  KEY `fk_Bezeroa_has_Produktua_Produktua1_idx` (`Produktua_idProduktua`),
  KEY `fk_Bezeroa_has_Produktua_Bezeroa1_idx` (`Bezeroa_idBezeroa`),
  CONSTRAINT `fk_Bezeroa_has_Produktua_Bezeroa1` FOREIGN KEY (`Bezeroa_idBezeroa`) REFERENCES `bezeroa` (`idBezeroa`),
  CONSTRAINT `fk_Bezeroa_has_Produktua_Produktua1` FOREIGN KEY (`Produktua_idProduktua`) REFERENCES `produktua` (`idProduktua`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balorazioa`
--

LOCK TABLES `balorazioa` WRITE;
/*!40000 ALTER TABLE `balorazioa` DISABLE KEYS */;
/*!40000 ALTER TABLE `balorazioa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bezeroa`
--

DROP TABLE IF EXISTS `bezeroa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bezeroa` (
  `idBezeroa` int NOT NULL AUTO_INCREMENT,
  `nanEdoNif` varchar(9) NOT NULL,
  `izena` varchar(45) DEFAULT NULL,
  `abizena` varchar(45) DEFAULT NULL,
  `telefonoZenbakia` varchar(45) DEFAULT NULL,
  `postaElektronikoa` varchar(45) DEFAULT NULL,
  `helbidea` varchar(45) DEFAULT NULL,
  `herria` varchar(45) DEFAULT NULL,
  `postaKodea` varchar(45) DEFAULT NULL,
  `pasahitza` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idBezeroa`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bezeroa`
--

LOCK TABLES `bezeroa` WRITE;
/*!40000 ALTER TABLE `bezeroa` DISABLE KEYS */;
INSERT INTO `bezeroa` VALUES (1,'12345678A','Mikel','Etxebarria','600123456','mikel.etxebarria@gmail.com','Kale Nagusia 10','Bilbo','48001','Mik12345'),(2,'23456789B','Ane','Uribe','610234567','ane.uribe@yahoo.com','Iturribide Kalea 15','Donostia','20003','Ane23456'),(3,'34567890C','Jon','Aguirre','620345678','jon.aguirre@outlook.com','Easo Plaza 2','Gasteiz','01001','Jon34567'),(4,'45678901D','Leire','Otxoa','630456789','leire.otxoa@protonmail.com','Errege Katolikoak Kalea 6','Iruña','31004','Lei45678'),(5,'56789012E','Iker','Zubizarreta','640567890','iker.zubizarreta@hotmail.com','Areatza Pasealekua 20','Barakaldo','48901','Ike56789'),(6,'67890123F','Maite','Gorostidi','650678901','maite.gorostidi@icloud.com','Erribera Kalea 3','Hernani','20100','Mai67890'),(7,'78901234G','Xabier','Aranburu','660789012','xabier.aranburu@gmail.com','San Frantzisko Kalea 17','Tolosa','20400','Xab78901'),(8,'89012345H','Edurne','Zabaleta','670890123','edurne.zabaleta@yahoo.com','Amara Berri 12','Gernika','48300','Edu89012'),(9,'90123456I','Aitor','Bengoetxea','680901234','aitor.bengoetxea@live.com','Zabaleta Kalea 9','Azpeitia','20730','Ait90123'),(10,'01234567J','Nerea','Artexte','690012345','nerea.artexte@msn.com','Urkijo Kalea 11','Arrasate','20500','Ner01234'),(11,'11112223K','Ainhoa','Mendizabal','600112233','ainhoa.mendizabal@outlook.es','Autonomia Kalea 23','Eibar','20600','Ain11122'),(12,'22223334L','Iñaki','Salazar','610223344','inaki.salazar@icloud.com','Garibai Kalea 10','Zarautz','20800','Ina22233'),(13,'33334445M','Asier','Olabarria','620334455','asier.olabarria@gmail.com','Nafarroa Etorbidea 4','Oñati','20560','Asi33334'),(14,'44445556N','Maialen','Urkijo','630445566','maialen.urkijo@hotmail.com','San Nikolas Kalea 7','Durango','48200','Mai44445'),(15,'55556667O','Ekain','Elizalde','640556677','ekain.elizalde@yahoo.com','Berastegi Kalea 16','Leioa','48940','Eka55556'),(16,'66667778P','Amaia','Larrañaga','650667778','amaia.larranaga@gmail.com','Santa Marina Kalea 22','Orio','20810','Ama66667'),(17,'77778889Q','Unai','Arrieta','660778889','unai.arrieta@outlook.com','Jesusen Bihotza Plaza 8','Lekeitio','48280','Una77778'),(18,'88889990R','Garazi','Lekue','670889990','garazi.lekue@protonmail.com','Askatasuna Etorbidea 11','Elorrio','48230','Gar88889'),(19,'99990001S','Ander','Larrea','680990011','ander.larrea@icloud.com','Zabalgun Kalea 5','Amurrio','01470','And99990'),(20,'01010110T','Olaia','Landa','690101010','olaia.landa@live.com','Loiloa Kalea 19','Usurbil','20170','Ola01010'),(21,'20202021U','Eider','Arrizabalaga','600202021','eider.arrizabalaga@yahoo.com','Amara Kalea 4','Legazpi','20230','Eid20202'),(22,'30303032V','Gaizka','Ibarrola','610303032','gaizka.ibarrola@gmail.com','Santa Klara Kalea 18','Mungia','48100','Gai30303'),(23,'40404043W','Izaro','Ugarte','620404043','izaro.ugarte@protonmail.com','Itxduku Kalea 13','Mutriku','20830','Iza40404'),(24,'50505054X','Beñat','Garmendia','630505054','benat.garmendia@outlook.es','Alde Zaharra 1','Markina-Xemein','48270','Beñ50505'),(25,'60606065Y','Edur','Jauregi','640606065','edur.jauregi@hotmail.com','Erribera Kalea 25','Getaria','20808','Edu60606'),(26,'70707076Z','Ibai','Sagastizabal','650707076','ibai.sagastizabal@icloud.com','Nafarroa Plaza 20','Bergara','20570','Iba70707'),(27,'80808087A','Miren','Sorozabal','660808087','miren.sorozabal@gmail.com','Plaza Etxebarria 12','Lazkao','20210','Mir80808'),(28,'90909098B','Lorea','Etxebarria','670909098','lorea.etxebarria@yahoo.es','Konstituzio Plaza 6','Deba','20820','Lor90909'),(29,'01010110C','Markel','Lekunberri','680101010','markel.lekunberri@hotmail.com','Areeta Kalea 17','Ordizia','20400','Mar01010'),(30,'12121213D','Nahia','Sagarzazu','690121013','nahia.sagarzazu@live.com','Iparragirre Kalea 9','Ondarroa','48700','Nah12121'),(36,'72607162A','Ane','Soto','630960766','anesotoazpili@gmail.com','Jose Arana Kalea 9, 3B','Ordizia','20240','Ane12345'),(38,'72440078Z','Ana','Azpilicueta','616725037','sotoazpili@gmail.com','Arana 9, 3B','Ordizia','20240','Ana12345'),(39,'73030336T','Beñat','Martin','637553126','b.martin.ulanga@gmail.com','Ergoien Bailara, 4B','Anoeta','20270','12345678'),(40,'34987512S','Ander','Madinabeitia','654852145','a.madinabeitia@gmail.com','Nonbait, Legorretan','Legorreta','20250','147'),(41,'73461112D','Aratz','Huegun','684121829','aratzhuegun@gmail.com','calle mayor 18','Ordizia','20240','patateitor');
/*!40000 ALTER TABLE `bezeroa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eskaera`
--

DROP TABLE IF EXISTS `eskaera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eskaera` (
  `idEskaera` int NOT NULL AUTO_INCREMENT,
  `fraZkia` varchar(10) DEFAULT NULL,
  `Bezeroa_idBezeroa` int NOT NULL,
  `totala` double DEFAULT NULL,
  `egoera` varchar(45) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `faktura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEskaera`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eskaera`
--

LOCK TABLES `eskaera` WRITE;
/*!40000 ALTER TABLE `eskaera` DISABLE KEYS */;
INSERT INTO `eskaera` VALUES (1,'1/2025',36,4234.97,'erosita','2025-02-10 09:08:54',NULL),(2,'2/2025',36,1637,'erosita','2025-02-10 09:18:14',NULL),(3,'3/2025',36,239,'erosita','2025-02-10 09:18:40',NULL),(4,'4/2025',41,528.99,'erosita','2025-02-10 12:19:08',NULL);
/*!40000 ALTER TABLE `eskaera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eskaerahistorikoa`
--

DROP TABLE IF EXISTS `eskaerahistorikoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eskaerahistorikoa` (
  `idEskaeraH` int NOT NULL AUTO_INCREMENT,
  `fraZkia` varchar(8) DEFAULT NULL,
  `Bezeroa_idBezeroa` int NOT NULL,
  `totala` double DEFAULT NULL,
  `egoera` varchar(45) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `faktura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEskaeraH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eskaerahistorikoa`
--

LOCK TABLES `eskaerahistorikoa` WRITE;
/*!40000 ALTER TABLE `eskaerahistorikoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `eskaerahistorikoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eskaeraproduktua`
--

DROP TABLE IF EXISTS `eskaeraproduktua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eskaeraproduktua` (
  `idEskaeraproduktua` int NOT NULL AUTO_INCREMENT,
  `fraZkia` varchar(10) DEFAULT NULL,
  `idProduktua` int DEFAULT NULL,
  `kopurua` int DEFAULT NULL,
  `prezioa` double(6,2) DEFAULT NULL,
  `data` date NOT NULL DEFAULT (curdate()),
  `totala` double DEFAULT ((`kopurua` * `prezioa`)),
  `idBezeroa` int DEFAULT NULL,
  PRIMARY KEY (`idEskaeraproduktua`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eskaeraproduktua`
--

LOCK TABLES `eskaeraproduktua` WRITE;
/*!40000 ALTER TABLE `eskaeraproduktua` DISABLE KEYS */;
INSERT INTO `eskaeraproduktua` VALUES (1,'1/2025',1,1,498.00,'2025-02-10',498,36),(2,'1/2025',2,2,999.99,'2025-02-10',1999.98,36),(3,'1/2025',3,1,239.00,'2025-02-10',239,36),(4,'1/2025',1,1,498.00,'2025-02-10',498,36),(5,'1/2025',2,1,999.99,'2025-02-10',999.99,36),(6,'2/2025',3,1,239.00,'2025-02-10',239,36),(7,'2/2025',4,2,699.00,'2025-02-10',1398,36),(8,'3/2025',3,1,239.00,'2025-02-10',239,36),(9,'4/2025',14,1,528.99,'2025-02-10',528.99,41);
/*!40000 ALTER TABLE `eskaeraproduktua` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `eskaeraproduktua_AFTER_INSERT` AFTER INSERT ON `eskaeraproduktua` FOR EACH ROW BEGIN
    DECLARE order_total DECIMAL(10,2);
    DECLARE order_count INT;

    -- Calcular el precio total del pedido
    SELECT SUM(totala) INTO order_total
    FROM eskaeraproduktua
    WHERE fraZkia = NEW.fraZkia GROUP BY fraZkia;

    -- Verificar si el pedido ya existe en eskaera
    SELECT COUNT(*) INTO order_count
    FROM eskaera
    WHERE fraZkia = NEW.fraZkia;

    IF order_count = 0 THEN
        -- Insertar nuevo pedido si no existe
        INSERT INTO eskaera (fraZkia, Bezeroa_idBezeroa, totala, egoera, data)
        VALUES (NEW.fraZkia, NEW.idBezeroa, order_total, 'erosita', CURRENT_TIMESTAMP);
    ELSE
        -- Actualizar el monto total si el pedido existe
        UPDATE eskaera
        SET totala = order_total
        WHERE fraZkia = NEW.fraZkia;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `eskaeraproduktuahistorikoa`
--

DROP TABLE IF EXISTS `eskaeraproduktuahistorikoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eskaeraproduktuahistorikoa` (
  `idEskaeraproduktuaH` int NOT NULL AUTO_INCREMENT,
  `fraZkia` varchar(8) DEFAULT NULL,
  `idProduktua` int DEFAULT NULL,
  `kopurua` int DEFAULT NULL,
  `prezioa` double(6,2) DEFAULT NULL,
  `data` date NOT NULL DEFAULT (curdate()),
  PRIMARY KEY (`idEskaeraproduktuaH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eskaeraproduktuahistorikoa`
--

LOCK TABLES `eskaeraproduktuahistorikoa` WRITE;
/*!40000 ALTER TABLE `eskaeraproduktuahistorikoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `eskaeraproduktuahistorikoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frabezero`
--

DROP TABLE IF EXISTS `frabezero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `frabezero` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idBezero` int DEFAULT NULL,
  `fraZkia` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frabezero`
--

LOCK TABLES `frabezero` WRITE;
/*!40000 ALTER TABLE `frabezero` DISABLE KEYS */;
INSERT INTO `frabezero` VALUES (1,36,NULL);
/*!40000 ALTER TABLE `frabezero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frazenbakia`
--

DROP TABLE IF EXISTS `frazenbakia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `frazenbakia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fraZenbakia` varchar(10) DEFAULT NULL,
  `urtea` year DEFAULT (year(curdate())),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frazenbakia`
--

LOCK TABLES `frazenbakia` WRITE;
/*!40000 ALTER TABLE `frazenbakia` DISABLE KEYS */;
INSERT INTO `frazenbakia` VALUES (1,'5',2025);
/*!40000 ALTER TABLE `frazenbakia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hornitzailea`
--

DROP TABLE IF EXISTS `hornitzailea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hornitzailea` (
  `idHornitzailea` int NOT NULL AUTO_INCREMENT,
  `nif` varchar(9) DEFAULT NULL,
  `izena` varchar(45) DEFAULT NULL,
  `telefonoZenbakia` varchar(45) DEFAULT NULL,
  `postaElektronikoa` varchar(45) DEFAULT NULL,
  `helbidea` varchar(45) DEFAULT NULL,
  `herria` varchar(45) DEFAULT NULL,
  `postaKodea` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idHornitzailea`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hornitzailea`
--

LOCK TABLES `hornitzailea` WRITE;
/*!40000 ALTER TABLE `hornitzailea` DISABLE KEYS */;
INSERT INTO `hornitzailea` VALUES (1,'A12345678','Teknor Corp','943123456','contacto@teknorcorp.com','Paseo Teknologia 5','Bilbo','48001'),(2,'B23456789','EuskalTech','943234567','info@euskaltech.es','Avenida Euskadi 21','Donostia','20003'),(3,'C34567890','Infotech Solutions','943345678','soporte@infotech.com','Calle Innovación 12','Gasteiz','1001'),(4,'D45678901','Nortek Digital','944456789','ventas@nortekdigital.eu','Boulevard Digitala 8','Iruña','31004'),(5,'E56789012','MicroGlobal','945567890','admin@microglobal.com','Avenida Zientzia 15','Barakaldo','48901'),(6,'F67890123','Gipuzkoa Web','943678901','contact@gipuzkoaweb.com','Plaza Berrikuntza 2','Hernani','20120'),(7,'G78901234','SysBasque','943789012','info@sysbasque.net','Parque Teknologia 6','Tolosa','20400'),(8,'H89012345','iBasque Networks','945890123','servicios@ibasquenet.es','Calle Conexión 18','Gernika','48300'),(9,'I90123456','TaldeTech','944901234','contacto@taldetech.com','Carretera Ziber 1','Azpeitia','20730'),(10,'J01234567','Innovatek','943012345','info@innovatek.io','Edificio Ideia 7','Arrasate','20500'),(11,'K11112223','CyberEuskal','945112233','atencion@cybereuskal.net','Callea Teknologia 3','Eibar','20600'),(12,'L22223334','Ziber Solutions','944223344','ventas@zibersolutions.biz','Parque Berrikuntza 10','Zarautz','20800'),(13,'M33334445','CloudNet Basque','943334455','support@cloudnetbasque.com','Plaza Digitalean 14','Oñati','20560'),(14,'N44445556','DataBizkaia','944445566','soporte@databizkaia.com','Centro Cloud 20','Durango','48200'),(15,'O55556667','Euskaria Cloud','943556677','contact@euskariacloud.eu','Polígono Zientzia 22','Leioa','48940'),(16,'P66667778','Virtual Labs','945667788','soporte@virtuallabs.io','Callea Zientzia 15','Orio','20810'),(17,'Q77778889','Connectia','944778899','info@connectia.co','Parque Teknologia 11','Lekeitio','48280'),(18,'R88889990','GoizTek','943889900','contacto@goiztek.com','Boulevard Egin 3','Elorrio','48230'),(19,'S99990011','BitEusk','944990011','admin@biteusk.org','Paseo Digitala 12','Amurrio','1470'),(20,'T10101012','DatuLab','945101012','info@datu-lab.com','Carretera Teknologia 9','Usurbil','20170'),(21,'U20202021','NetSolutions','943202021','contacto@netsolutions.com','Avenida Konektatu 10','Legazpi','20230'),(22,'V30303032','ZientziaPro','945303032','ventas@zientziapro.net','Paseo Prozesua 7','Mungia','48100'),(23,'W40404043','DigitalaPlus','944404043','soporte@digitalaplus.com','Calle Teknologia 8','Mutriku','20830'),(24,'X50505054','Red Vasca','943505054','contacto@redvasca.es','Plaza Berrikuntza 22','Markina-Xemein','48270'),(25,'Y60606065','EkinLab','945606065','soporte@ekinlab.com','Edificio Lanbide 14','Getaria','20808'),(26,'Z70707076','ProBasque','944707076','info@probasque.io','Parque Lan Egina 9','Bergara','20570'),(27,'A80808087','InfoBasque','943808087','ventas@infobasque.net','Avenida Ziber 16','Lazkao','20210'),(28,'B90909098','IT Nor','945909098','soporte@itnor.com','Carretera Teknologia 5','Deba','20820'),(29,'C01010101','Euskaia IT','943010101','info@euskaiait.eu','Paseo Konektatua 19','Ordizia','20240'),(30,'D12121213','Datatech','944121213','atencion@datatech.com','Parque Innovación 4','Ondarroa','48700'),(31,'A12547869','Autorrecambios Goierri','658741258','goierri@goierri.com','Antzizar 1','Beasain','20200'),(32,'aaaaaa','aaaaaa','aaaaaaa','aaaaaaa','aaaaaaa','aaaaaa','aaaaaaaa');
/*!40000 ALTER TABLE `hornitzailea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `langilea`
--

DROP TABLE IF EXISTS `langilea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `langilea` (
  `idlangilea` int NOT NULL AUTO_INCREMENT,
  `lanpostua_idlanpostua` int NOT NULL,
  `lanpostua` varchar(45) DEFAULT NULL,
  `nan` varchar(9) DEFAULT NULL,
  `izena` varchar(45) DEFAULT NULL,
  `abizena` varchar(45) DEFAULT NULL,
  `telefonoZenbakia` varchar(45) DEFAULT NULL,
  `postaElektronikoa` varchar(45) DEFAULT NULL,
  `erabiltzaileIzena` varchar(45) DEFAULT NULL,
  `pasahitza` varchar(45) DEFAULT NULL,
  `helbidea` varchar(90) DEFAULT NULL,
  `postaKodea` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idlangilea`,`lanpostua_idlanpostua`),
  KEY `lanpostua_idlanpostua_idx` (`lanpostua_idlanpostua`),
  CONSTRAINT `lanpostua_idlanpostua` FOREIGN KEY (`lanpostua_idlanpostua`) REFERENCES `lanpostua` (`idlanpostua`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `langilea`
--

LOCK TABLES `langilea` WRITE;
/*!40000 ALTER TABLE `langilea` DISABLE KEYS */;
INSERT INTO `langilea` VALUES (39,1,'Zuzendari nagusia','71290122P','Joxean','Ormazabal','654122309','joxeanormazabal@gmail.com','jormazabal','jorm123','Urretxu, Oria kalea 1-2b','20700'),(40,2,'Erosketak eta logisitika','74590222P','Amaia','Mendizabal','612093467','amaiurmendizabal@gmail.com','amendizabal','amen123','Andoain, Kale nagusia 25-b','20140'),(41,2,'Salmenta arduraduna','24103248A','Ixiar','Gaztañaga','612234967','ixiargaztanaga@gmail.com','igaztañaga','igaz123','Lasarte, Pablo mutiozabal kalea 15-4c','20160'),(42,3,'On-line salmenta taldea','59383733X','Isidoro','Solaegi','678855538','isidorosolaegi@gmail.com','isolaegi','isol123','Getxo, El Pinar kalea 6','48930'),(43,3,'On-line salmenta taldea','47429308W','Esparatz','Haranbarri','687917376','esparatzharanbarri@gmail.com','eharanbarri','ehar123','Donostia, Urbieta kalea 2','20001'),(44,2,'Konponketa arduraduna','24351256Y','David','Etxezarreta','736759858','davidetxezarreta@gmail.com','detxezarreta','detx123','Elgoibar, Kalamua kalea 12-3','20870'),(45,2,'Administrazio eta finantzetako arduraduna','80199092R','Aimar','Goikoetxandia','716932128','aimargoikoetxandia@gmail.com','agoikoetxandia','agio123','Eibar, Errekatxu kalea 5','20600'),(46,3,'Kontablea','55234462P','Izaro','Igarategi','701932299','izaroigarategi@gmail.com','iigarategi','iiga123','Bergara, Bidekvrvtzeta kalea 12-4d','20570'),(47,1,'Giza baliabideak','59958544M','Oier','Zubeldia','687842552','oierzubeldia@gmail.com','ozubeldia','ozub123','Azpeitia, Nuarbe auzoa 21','20730'),(48,3,'Marketing taldea','09667683R','Irati','Gorostidi','707512288','iratigorostidi@gmail.com','igorostidi','igor123','Hernani, Floria auzoa 165','20210'),(49,3,'Marketing taldea','74937014R','Hodei','Soraluze','737344584','hodeisoraluze@gmail.com','hsoraluze','hsor123','Azkoitia, Ignacio Irizarte Margolaria kalea 28','20720'),(50,3,'Dendaria','68604184C','Unax','Miguel','626491284','unaxmiguel@gmail.com','umiguel','umig123','Beasain, Oriamendi kalea 28','20210'),(51,3,'Teknikaria','16323966S','Aitor','Gonzalez','612255491','aitorgonzalez@gmail.com','agonzalez','agon123','Ataun, Elbarrena auzoa 49','20211'),(52,3,'Teknikaria','47913211W','Imanol','Gurrutxaga','626121449','imanolgurrutxaga@gmail.com','igurrutxaga','igur123','Tolosa, Belarmuga','20400'),(53,3,'Biltegizaina','37029316Y','Markel','Lodosa','746721800','markellodosa@gmail.com','llodosa','llod123','Ordizia, Euskal Pilota kalea 1','20240'),(54,3,'Biltegizaina','11110861K','Aitor','Alonso','672448109','aitoralonso@gmail.com','aalonso','aalo123','Mondragon, Dr.Ibañez kalea','20500'),(55,3,'Teknikaria','52496086W','Ane','Murua','681234890','anemurua@gmail.com','amurua','amur123','Idiazabal, Barreiaatua 82','20230'),(56,4,'Garraiolaria','73840409J','Ekhi','Agirrezabala','644106522','ekhiiagirrezabala@gmail.com','eagirrezabala','eagi123','Urretxu, Secundino Esnaola kalea 65','20700'),(57,4,'Garraiolaria','45780284A','Naroa','Esnaola','673960140','naroaesnaola@gmail.com','nesnaola','nesn123','Aduna, Herriko plaza 11','20150'),(58,1,'Bazkidea','72607162A','Ane','Soto','630960766','ane@utech.com','asoto','asoto123',NULL,NULL),(59,2,'Gerente orokorra','12345678B','Beñat','Martin','637553126','beñat@utech.com','bmartin','bmarti123',NULL,NULL);
/*!40000 ALTER TABLE `langilea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lanpostua`
--

DROP TABLE IF EXISTS `lanpostua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lanpostua` (
  `idlanpostua` int NOT NULL AUTO_INCREMENT,
  `kategoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idlanpostua`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lanpostua`
--

LOCK TABLES `lanpostua` WRITE;
/*!40000 ALTER TABLE `lanpostua` DISABLE KEYS */;
INSERT INTO `lanpostua` VALUES (1,'Admin'),(2,'Gerente'),(3,'Langile'),(4,'Garraiolari');
/*!40000 ALTER TABLE `lanpostua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pieza`
--

DROP TABLE IF EXISTS `pieza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pieza` (
  `idPieza` int NOT NULL,
  `kategoria` int DEFAULT NULL,
  `marka` varchar(45) DEFAULT NULL,
  `modeloa` varchar(45) DEFAULT NULL,
  `ezaugarriak` varchar(45) DEFAULT NULL,
  `erosketaPrezioa` varchar(45) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  PRIMARY KEY (`idPieza`),
  KEY `kategoria_idx` (`kategoria`),
  CONSTRAINT `kategoria` FOREIGN KEY (`kategoria`) REFERENCES `produktumota` (`idProduktuMota`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pieza`
--

LOCK TABLES `pieza` WRITE;
/*!40000 ALTER TABLE `pieza` DISABLE KEYS */;
INSERT INTO `pieza` VALUES (1,1,'Intel','i5-12400','Procesador 6 núcleos, 4.4GHz','189.99',25),(2,1,'Kingston','FURY Beast 16GB','RAM DDR4, 3200MHz','67.99',50),(3,2,'Samsung','Galaxy S21 Batería','Batería original 4000mAh','45.50',30),(4,3,'LG','UltraFine 27UL850','Panel IPS 4K UHD, HDR10','299.00',10),(5,4,'Sony','WH-1000XM4 Almohadillas','Almohadillas de repuesto','18.99',100),(6,1,'Seagate','Barracuda 2TB','Disco duro interno, 7200RPM','54.90',40),(7,2,'Apple','iPhone 13 Pantalla','Pantalla OLED original','199.99',15),(8,3,'Dell','U2723QE Base','Base ajustable para monitor','35.00',20),(9,4,'JBL','Tune 750BTNC Cable','Cable de carga USB-C','12.00',70),(10,1,'Corsair','RM850x','Fuente de alimentación 850W, modular','139.00',12),(11,2,'Xiaomi','Redmi Note 11 Cámara','Módulo de cámara trasera','25.50',25),(12,3,'Asus','ProArt PA32UCX','Panel IPS 4K HDR','599.99',8),(13,4,'Bose','QC45 Micrófono','Micrófono interno de repuesto','30.00',20),(14,1,'MSI','RTX 4060 Ti','Tarjeta gráfica, 8GB GDDR6','499.99',5),(15,2,'OnePlus','Nord 2T Batería','Batería original 4500mAh','40.00',35),(16,3,'Acer','Predator X34 Soporte','Soporte curvo para monitor','50.00',15),(17,4,'HyperX','Cloud II Cable','Cable de conexión 3.5mm','14.50',60),(18,1,'Gigabyte','Z790 AORUS Elite','Placa base Intel LGA1700','279.99',10),(19,2,'Huawei','P30 Lite Pantalla','Pantalla LCD original','110.99',18),(20,3,'BenQ','PD3220U LED','Repuesto de LED para pantalla','45.00',25),(21,4,'Razer','Kraken X Almohadillas','Almohadillas negras de espuma','16.99',40),(22,1,'WD','Blue 1TB','SSD SATA 2.5 pulgadas','89.99',30),(23,2,'Motorola','Moto G Stylus Cámara','Módulo cámara delantera','35.00',22),(24,3,'HP','Z24n G3 Cable','Cable de alimentación monitor','25.00',50),(25,4,'SteelSeries','Arctis 7 Micrófono','Micrófono flexible de repuesto','24.99',45),(26,1,'ASRock','B650 PRO RS','Placa base AMD AM5','175.99',20),(27,2,'Google','Pixel 6 Pantalla','Pantalla AMOLED original','215.50',12),(28,3,'Philips','246E9QJAB Soporte','Soporte de monitor ajustable','29.99',18),(29,4,'Logitech','G PRO X Cable','Cable USB extraíble','20.00',60),(30,1,'Noctua','NH-D15 Ventilador','Ventilador de recambio 140mm','29.90',25);
/*!40000 ALTER TABLE `pieza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `piezaeskaera`
--

DROP TABLE IF EXISTS `piezaeskaera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `piezaeskaera` (
  `idPiezaEskaera` int NOT NULL AUTO_INCREMENT,
  `Hornitzailea_idHornitzailea` int NOT NULL,
  `Pieza_idPieza` int NOT NULL,
  `kopurua` int DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPiezaEskaera`),
  KEY `fk_Pieza_has_Hornitzailea_Hornitzailea1_idx` (`Hornitzailea_idHornitzailea`),
  KEY `fk_Pieza_has_Hornitzailea_Pieza1_idx` (`Pieza_idPieza`),
  CONSTRAINT `fk_Pieza_has_Hornitzailea_Hornitzailea1` FOREIGN KEY (`Hornitzailea_idHornitzailea`) REFERENCES `hornitzailea` (`idHornitzailea`),
  CONSTRAINT `fk_Pieza_has_Hornitzailea_Pieza1` FOREIGN KEY (`Pieza_idPieza`) REFERENCES `pieza` (`idPieza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piezaeskaera`
--

LOCK TABLES `piezaeskaera` WRITE;
/*!40000 ALTER TABLE `piezaeskaera` DISABLE KEYS */;
/*!40000 ALTER TABLE `piezaeskaera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodprest`
--

DROP TABLE IF EXISTS `prodprest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodprest` (
  `idProdPrest` int NOT NULL AUTO_INCREMENT,
  `ProduktuMota_idProduktuMota` int NOT NULL,
  `Bezeroa_idBezeroa` int NOT NULL,
  `marka` varchar(45) DEFAULT NULL,
  `modeloa` varchar(45) DEFAULT NULL,
  `ezaugarriak` mediumtext,
  `egoera` tinyint DEFAULT NULL,
  PRIMARY KEY (`idProdPrest`,`ProduktuMota_idProduktuMota`,`Bezeroa_idBezeroa`),
  KEY `fk_2EskukoProduktua_ProduktuMota_idx` (`ProduktuMota_idProduktuMota`),
  KEY `fk_2EskukoProduktua_Bezeroa1_idx` (`Bezeroa_idBezeroa`),
  CONSTRAINT `fk_2EskukoProduktua_Bezeroa1` FOREIGN KEY (`Bezeroa_idBezeroa`) REFERENCES `bezeroa` (`idBezeroa`),
  CONSTRAINT `fk_2EskukoProduktua_ProduktuMota` FOREIGN KEY (`ProduktuMota_idProduktuMota`) REFERENCES `produktumota` (`idProduktuMota`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodprest`
--

LOCK TABLES `prodprest` WRITE;
/*!40000 ALTER TABLE `prodprest` DISABLE KEYS */;
INSERT INTO `prodprest` VALUES (1,1,40,'asgasg','asfgadfga','adfhadhad',1),(2,3,36,'asdgegac','an,uoyñuio','uiyluyi,hj,klhji',1);
/*!40000 ALTER TABLE `prodprest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produktua`
--

DROP TABLE IF EXISTS `produktua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produktua` (
  `idProduktua` int NOT NULL AUTO_INCREMENT,
  `ProduktuMota_idProduktuMota` int NOT NULL,
  `irudia1` varchar(45) DEFAULT NULL,
  `irudia2` varchar(45) DEFAULT NULL,
  `marka` varchar(45) DEFAULT NULL,
  `modeloa` varchar(45) DEFAULT NULL,
  `memoria` varchar(45) DEFAULT NULL,
  `ram` varchar(45) DEFAULT NULL,
  `prozesagailua` varchar(45) DEFAULT NULL,
  `tamaina` varchar(45) DEFAULT NULL,
  `sistemaEragilea` varchar(45) DEFAULT NULL,
  `kamara` varchar(45) DEFAULT NULL,
  `erresoluzioa` varchar(45) DEFAULT NULL,
  `frekuentzia` varchar(45) DEFAULT NULL,
  `kolorea` varchar(45) DEFAULT NULL,
  `salmentaPrezioa` double DEFAULT NULL,
  `stock` int DEFAULT NULL,
  PRIMARY KEY (`idProduktua`,`ProduktuMota_idProduktuMota`),
  KEY `fk_Produktua_ProduktuMota1_idx` (`ProduktuMota_idProduktuMota`),
  CONSTRAINT `fk_Produktua_ProduktuMota1` FOREIGN KEY (`ProduktuMota_idProduktuMota`) REFERENCES `produktumota` (`idProduktuMota`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produktua`
--

LOCK TABLES `produktua` WRITE;
/*!40000 ALTER TABLE `produktua` DISABLE KEYS */;
INSERT INTO `produktua` VALUES (1,1,'/ORDENAGAILUAK/1.1.Produktua.png','/ORDENAGAILUAK/1.2.Produktua.png','HP','15-FD0079NS','1TB','16GB','Intel Core i5','15,6','Windows 10-11',NULL,NULL,NULL,NULL,498,8),(2,1,'/ORDENAGAILUAK/2.1.Produktua.png','/ORDENAGAILUAK/2.2.Produktua.png','Apple','MacBook Air Apple M3','256GB','8GB','M3 Apple GPU','15,6','macOS',NULL,NULL,NULL,NULL,999.99,7),(3,1,'/ORDENAGAILUAK/3.1.Produktua.png','/ORDENAGAILUAK/3.2.Produktua.png','Alurin','Go Start N24','256GB','8GB','Intel Celeron','15,6','Windows 10-11',NULL,NULL,NULL,NULL,239,7),(4,1,'/ORDENAGAILUAK/4.1.Produktua.png','/ORDENAGAILUAK/4.2.Produktua.png','Lenovo','IdeaPad Gaming 3 15IAH7','512GB','16GB','Intel Core i5','15,6','Windows 10-11',NULL,NULL,NULL,NULL,699,8),(5,1,'/ORDENAGAILUAK/5.1.Produktua.png','/ORDENAGAILUAK/5.2.Produktua.png','Medion','Erazer Crawler E30e','512GB','8GB','Intel Core i5','15,6','Windows 10-11',NULL,NULL,NULL,NULL,649,10),(6,1,'/ORDENAGAILUAK/6.1.Produktua.png','/ORDENAGAILUAK/6.2.Produktua.png','Asus','TUF Gaming F15 FX506LH-HN042','512GB','16GB','Intel Core i5','15,6','Windows 10-11',NULL,NULL,NULL,NULL,627,10),(7,1,'/ORDENAGAILUAK/7.1.Produktua.png','/ORDENAGAILUAK/7.2.Produktua.png','MSI','Modern 15 B7M-243XES','512GB','16GB','Intel Core i5','15,6','Windows 10-11',NULL,NULL,NULL,NULL,509,10),(8,1,'/ORDENAGAILUAK/8.1.Produktua.png','/ORDENAGAILUAK/8.2.Produktua.png','Acer','Gaming Nitro V 15 ANV15-51','512GB','16GB','Intel Core i7','15,6','Windows 10-11',NULL,NULL,NULL,NULL,859,10),(9,1,'/ORDENAGAILUAK/9.1.Produktua.png','/ORDENAGAILUAK/9.2.Produktua.png','PcCom','Revolt 3050','500GB','16GB','Intel Core i7','15,6','Windows 10-11',NULL,NULL,NULL,NULL,999,10),(10,1,'/ORDENAGAILUAK/10.1.Produktua.png','/ORDENAGAILUAK/10.2.Produktua.png','Dell','Vostro 3520','512GB','16GB','Intel Core i5','15,6','Windows 10-11',NULL,NULL,NULL,NULL,538,10),(11,2,'/MUGIKORRAK/1.1.Produktua.png','/MUGIKORRAK/1.2.Produktua.png','Xiaomi','Redmi Note 13','256GB','8GB','Snapdragon 685 ','6.67','MIUI14','108MP+8MP+2MP ',NULL,NULL,'Urdina',164.94,10),(12,2,'/MUGIKORRAK/2.1.Produktua.png','/MUGIKORRAK/2.2.Produktua.png','Apple','Iphone 13','128GB','4GB','Chip A15 Bionic','6.1','IOS 15','12MP Gran angular eta Ultra gran angular',NULL,NULL,'Txuria',472.52,10),(13,2,'/MUGIKORRAK/3.1.Produktua.png','/MUGIKORRAK/3.2.Produktua.png','Samsung','Galaxy Z FLip6','256GB','12GB','Snapdragon 8 Gen 3','6.7','Android 14','50MP+12MP+10MP',NULL,NULL,'Horia',999.99,10),(14,2,'/MUGIKORRAK/4.1.Produktua.png','/MUGIKORRAK/4.2.Produktua.png','Xiaomi','Redmi Note 13 Pro','256GB','12GB','Snapdragon 7s Gen 2 ','6.67','MIUI14','200MP+8MP+2MP',NULL,NULL,'Beltza',528.99,9),(15,2,'/MUGIKORRAK/5.1.Produktua.png','/MUGIKORRAK/5.2.Produktua.png','Realme','Realme 12 Pro+ 5G','256GB','12GB','Snapdragon 7s Gen 2','6.7','Android 14','50MP+64MP+8MP+32MP',NULL,NULL,'Beige',399,10),(16,2,'/MUGIKORRAK/6.1.Produktua.png','/MUGIKORRAK/6.2.Produktua.png','OnePlus','Nord 4','512GB','16GB','Qualcomm Adreno 732','6.74','OxygenOs 14.1','50MP+8MP+16MP',NULL,NULL,'Oasis Green',519.48,10),(17,2,'/MUGIKORRAK/7.1.Produktua.png','/MUGIKORRAK/7.2.Produktua.png','Samsung','Galaxy Z Fold6','256GB','12GB','Snapdragon 8 Gen 3','7.6','Android 14','50MP+12MP+10MP+4MP+10MP',NULL,NULL,'Arrosa',999.99,10),(18,2,'/MUGIKORRAK/8.1.Produktua.png','/MUGIKORRAK/8.2.Produktua.png','Apple','iPhone 12','256GB','4GB','Chip A14 Bionic','6.1','IOS 14','12MP Gran angular eta Ultra gran angular',NULL,NULL,'Gorria',426,10),(19,2,'/MUGIKORRAK/9.1.Produktua.png','/MUGIKORRAK/9.2.Produktua.png','POCO','X6 Pro 5G','512GB','12GB','Dimensity 8300-Ultra','6.67','MIUI 14','64MP+8MP+2MP+16MP',NULL,NULL,'Horia',323.95,10),(20,2,'/MUGIKORRAK/10.1.Produktua.png','/MUGIKORRAK/10.2.Produktua.png','Realme','12 Pro+ 5G','512GB','12GB','Snapdragon 7s Gen 2','6.7','Android 14','50MP+64MP+8MP+32MP',NULL,NULL,'Urdina',462.72,10),(21,3,'/MONITOREAK/1.1.Produktua.png','/MONITOREAK/1.2.Produktua.png','Alurin','CoreVision 100',NULL,NULL,NULL,'23.8',NULL,'','FHD-IPS','100Hz',NULL,85,10),(22,3,'/MONITOREAK/2.1.Produktua.png','/MONITOREAK/2.2.Produktua.png','MSI','G24C4 E2',NULL,NULL,NULL,'23.6',NULL,'','FullHD-LED','180Hz',NULL,119,10),(23,3,'/MONITOREAK/3.1.Produktua.png','/MONITOREAK/3.2.Produktua.png','LG','32UR550-B',NULL,NULL,NULL,'32',NULL,'','UltraHD 4K-LEV VA','60Hz',NULL,279,10),(24,3,'/MONITOREAK/4.1.Produktua.png','/MONITOREAK/4.2.Produktua.png','Asus','VA24EHF',NULL,NULL,NULL,'23.8',NULL,'','FullHD-LED IPS','100Hz',NULL,89,10),(25,3,'/MONITOREAK/5.1.Produktua.png','/MONITOREAK/5.2.Produktua.png','AOC','CQ32G2SE',NULL,NULL,NULL,'31.5',NULL,'','QuadHD-LED','165Hz',NULL,199,10),(26,4,'/AURIKULARRAK/1.1.Produktua.png','/AURIKULARRAK/1.2.Produktua.png','Apple','Airpods 4',NULL,NULL,'Chip H2','3,02x1,83x1,81cm',NULL,NULL,NULL,NULL,'Txuria',149,10),(27,4,'/AURIKULARRAK/2.1.Produktua.png','/AURIKULARRAK/2.2.Produktua.png','Apple','AirPods 2ª generación',NULL,NULL,'Chip H2','4,43x2,13x5,35 cm',NULL,NULL,NULL,NULL,'Txuria',94,10),(28,4,'/AURIKULARRAK/3.1.Produktua.png','/AURIKULARRAK/3.2.Produktua.png','Apple','AirPods 3ª generación',NULL,NULL,'Chip H2','5,44 x 2,13 x 4,64 cm',NULL,NULL,NULL,NULL,'Txuria',125.4,10),(29,4,'/AURIKULARRAK/4.1.Produktua.png','/AURIKULARRAK/4.2.Produktua.png','Apple','Airpods Max',NULL,NULL,'Chip H1','3,02x1,83x1,81cm',NULL,NULL,NULL,NULL,'Txuria',403.99,10),(30,4,'/AURIKULARRAK/5.1.Produktua.png','/AURIKULARRAK/5.2.Produktua.png','Apple','AirPods Pro 2ª generación',NULL,NULL,'Chip H2','3,09x2,18x2,4cm',NULL,NULL,NULL,NULL,'Txuria',223.99,10);
/*!40000 ALTER TABLE `produktua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produktumota`
--

DROP TABLE IF EXISTS `produktumota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produktumota` (
  `idProduktuMota` int NOT NULL AUTO_INCREMENT,
  `kategoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProduktuMota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produktumota`
--

LOCK TABLES `produktumota` WRITE;
/*!40000 ALTER TABLE `produktumota` DISABLE KEYS */;
INSERT INTO `produktumota` VALUES (1,'Ordenagailua'),(2,'Mugikorra'),(3,'Monitorea'),(4,'Aurikularra');
/*!40000 ALTER TABLE `produktumota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saskia`
--

DROP TABLE IF EXISTS `saskia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saskia` (
  `idSaskia` int NOT NULL AUTO_INCREMENT,
  `Bezeroa_idBezeroa` int NOT NULL,
  `Produktua_idProduktua` int NOT NULL,
  `kopurua` int DEFAULT NULL,
  `prezioa` double DEFAULT NULL,
  `egoera` varchar(45) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `totala` double GENERATED ALWAYS AS ((`kopurua` * `prezioa`)) STORED,
  PRIMARY KEY (`idSaskia`),
  KEY `fk_Bezeroa_has_Produktua_Produktua2_idx` (`Produktua_idProduktua`),
  KEY `fk_Bezeroa_has_Produktua_Bezeroa2_idx` (`Bezeroa_idBezeroa`),
  CONSTRAINT `fk_Bezeroa_has_Produktua_Bezeroa2` FOREIGN KEY (`Bezeroa_idBezeroa`) REFERENCES `bezeroa` (`idBezeroa`) ON UPDATE CASCADE,
  CONSTRAINT `fk_Bezeroa_has_Produktua_Produktua2` FOREIGN KEY (`Produktua_idProduktua`) REFERENCES `produktua` (`idProduktua`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saskia`
--

LOCK TABLES `saskia` WRITE;
/*!40000 ALTER TABLE `saskia` DISABLE KEYS */;
/*!40000 ALTER TABLE `saskia` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `saskia_AFTER_UPDATE` AFTER UPDATE ON `saskia` FOR EACH ROW BEGIN
DECLARE frazenbakia_val VARCHAR(4);
DECLARE urtea_val VARCHAR(4);
DECLARE fraZkia_val VARCHAR(8);
DECLARE next_frazenbakia INT;
     
SELECT 
    fraZenbakia, urtea
INTO frazenbakia_val , urtea_val FROM
    frazenbakia
ORDER BY id DESC
LIMIT 1;
    
SET next_frazenbakia = LPAD(CAST(frazenbakia_val AS UNSIGNED), 4, '0');
SET frazenbakia_val = next_frazenbakia;
SET fraZkia_val = CONCAT(frazenbakia_val, '/', urtea_val);

IF NEW.egoera <> OLD.egoera THEN
INSERT INTO `2erronka`.`eskaeraproduktua`
(`fraZkia`, `idProduktua`, `kopurua`, `prezioa`, `idBezeroa`) VALUES
(fraZkia_val, NEW.Produktua_idProduktua, NEW.kopurua, NEW.prezioa, NEW.Bezeroa_idBezeroa);


END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-11 11:45:11
