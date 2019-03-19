/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE="+00:00" */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS constancia;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `constancia` (
  `folio` int(8) NOT NULL AUTO_INCREMENT,
  `evento` int(8) NOT NULL,
  `cursante` varchar(20) NOT NULL,
  `fecha_emision` date DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`folio`),
  KEY `evento` (`evento`),
  KEY `cursante` (`cursante`),
  CONSTRAINT `constancia_ibfk_1` FOREIGN KEY (`evento`) REFERENCES `evento` (`evento_id`),
  CONSTRAINT `constancia_ibfk_2` FOREIGN KEY (`cursante`) REFERENCES `cursante` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `constancia` WRITE;
/*!40000 ALTER TABLE `constancia` DISABLE KEYS */;
    
    /*!40000 ALTER TABLE `constancia` ENABLE KEYS */;
    UNLOCK TABLES;



DROP TABLE IF EXISTS cursante;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `cursante` (
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `cursante` WRITE;
/*!40000 ALTER TABLE `cursante` DISABLE KEYS */;
    
    /*!40000 ALTER TABLE `cursante` ENABLE KEYS */;
    UNLOCK TABLES;



DROP TABLE IF EXISTS evento;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `evento` (
  `evento_id` int(8) NOT NULL AUTO_INCREMENT,
  `tipo_evento` int(8) NOT NULL,
  `instancia` int(8) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `duracion` int(5) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`evento_id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `tipo_evento` (`tipo_evento`),
  KEY `instancia` (`instancia`),
  CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`tipo_evento`) REFERENCES `tipo_evento` (`tipo_evento_id`),
  CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`instancia`) REFERENCES `instancia` (`instancia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
    INSERT INTO evento VALUES("1","1","1","test","1","2019-03-03","2019-03-17");

    /*!40000 ALTER TABLE `evento` ENABLE KEYS */;
    UNLOCK TABLES;



DROP TABLE IF EXISTS instancia;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `instancia` (
  `instancia_id` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`instancia_id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;


/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `instancia` WRITE;
/*!40000 ALTER TABLE `instancia` DISABLE KEYS */;
    INSERT INTO instancia VALUES("28","Centro de Investigación en Biología Molecular de las Enfermedades Crónicas");
INSERT INTO instancia VALUES("26","Centro de Investigación en Comportamiento Alimentario y Nutrición");
INSERT INTO instancia VALUES("29","Centro de Investigación en Emprendurismo, Incubación, Consultoría, Asesoría e Innovación");
INSERT INTO instancia VALUES("31","Centro de Investigación en Riesgos y Calidad de Vida");
INSERT INTO instancia VALUES("32","Centro de Investigación en Territorio y Ruralidad");
INSERT INTO instancia VALUES("30","Centro de Investigación Lago de Zapotlán y Cuencas");
INSERT INTO instancia VALUES("27","Centro de Investigaciones en Abejas");
INSERT INTO instancia VALUES("7","Coordinación de Carreras");
INSERT INTO instancia VALUES("12","Coordinación de Control Escolar");
INSERT INTO instancia VALUES("6","Coordinación de Extensión");
INSERT INTO instancia VALUES("11","Coordinación de Finanzas");
INSERT INTO instancia VALUES("9","Coordinación de Investigación y Posgrado");
INSERT INTO instancia VALUES("13","Coordinación de Personal");
INSERT INTO instancia VALUES("8","Coordinación de Planeación");
INSERT INTO instancia VALUES("5","Coordinación de Servicios Académicos");
INSERT INTO instancia VALUES("10","Coordinación de Servicios Generales");
INSERT INTO instancia VALUES("4","Coordinación de Tecnologías para el Aprendizaje (CTA)");
INSERT INTO instancia VALUES("19","Departamento de Artes y Humanidades");
INSERT INTO instancia VALUES("24","Departamento de Ciencias Básicas para la Salud");
INSERT INTO instancia VALUES("25","Departamento de Ciencias Clínicas");
INSERT INTO instancia VALUES("17","Departamento de Ciencias Computacionales e Innovación Tecnológica");
INSERT INTO instancia VALUES("16","Departamento de Ciencias de la Naturaleza");
INSERT INTO instancia VALUES("20","Departamento de Ciencias Económicas y Administrativas");
INSERT INTO instancia VALUES("15","Departamento de Ciencias Exactas y Metodologías");
INSERT INTO instancia VALUES("21","Departamento de Ciencias Sociales");
INSERT INTO instancia VALUES("23","Departamento de Promoción, Preservación y Desarrollo de la Salud");
INSERT INTO instancia VALUES("22","División de Ciencias de la Salud");
INSERT INTO instancia VALUES("14","División de Ciencias Exactas, Naturales y Tecnológicas");
INSERT INTO instancia VALUES("18","División de Ciencias Sociales y Humanidades");
INSERT INTO instancia VALUES("1","Rectoría");
INSERT INTO instancia VALUES("3","Secretaría Académica");
INSERT INTO instancia VALUES("2","Secretaría Administrativa");

    /*!40000 ALTER TABLE `instancia` ENABLE KEYS */;
    UNLOCK TABLES;



DROP TABLE IF EXISTS tipo_evento;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `tipo_evento` (
  `tipo_evento_id` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`tipo_evento_id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;


/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `tipo_evento` WRITE;
/*!40000 ALTER TABLE `tipo_evento` DISABLE KEYS */;
    INSERT INTO tipo_evento VALUES("1","Curso");
INSERT INTO tipo_evento VALUES("3","Diplomado");
INSERT INTO tipo_evento VALUES("4","Otro");
INSERT INTO tipo_evento VALUES("2","Taller");

    /*!40000 ALTER TABLE `tipo_evento` ENABLE KEYS */;
    UNLOCK TABLES;



DROP TABLE IF EXISTS usuario;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `usuario` (
  `usuario_id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `tipo_usuario` int(1) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
    INSERT INTO usuario VALUES("1","admin","123","email@gmail.com","0");
INSERT INTO usuario VALUES("2","test","xd","","1");
INSERT INTO usuario VALUES("8","testAfterFump","123","","1");

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

