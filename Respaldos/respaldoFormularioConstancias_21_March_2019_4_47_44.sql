/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */:
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */:
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */:
/*!40101 SET NAMES utf8 */:
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */:
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */:
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */:
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */:
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */:
DROP TABLE IF EXISTS constancia:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `constancia` (
  `folio` int(8) NOT NULL AUTO_INCREMENT,
  `evento` int(8) NOT NULL,
  `cursante` int(8) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`folio`),
  KEY `evento` (`evento`),
  KEY `cursante` (`cursante`),
  CONSTRAINT `constancia_ibfk_1` FOREIGN KEY (`evento`) REFERENCES `evento` (`evento_id`),
  CONSTRAINT `constancia_ibfk_2` FOREIGN KEY (`cursante`) REFERENCES `cursante` (`cursante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `constancia` WRITE:
/*!40000 ALTER TABLE `constancia` DISABLE KEYS */:
    INSERT INTO constancia VALUES("1","1","4","2019-02-15",""):
INSERT INTO constancia VALUES("2","3","1","2019-02-20","Oraaaa"):
INSERT INTO constancia VALUES("3","3","3","2019-02-20",""):
INSERT INTO constancia VALUES("5","4","1","2019-03-03","nelson"):
INSERT INTO constancia VALUES("10","3","2","2019-03-30","asdasd"):
INSERT INTO constancia VALUES("11","3","6","2019-03-14","Nein"):
INSERT INTO constancia VALUES("12","2","6","2019-03-14",""):
INSERT INTO constancia VALUES("13","3","12","2019-03-21","lola"):
INSERT INTO constancia VALUES("14","3","13","2019-03-21",""):
INSERT INTO constancia VALUES("17","4","13","2019-03-21",""):
INSERT INTO constancia VALUES("18","4","14","2019-03-21",""):
INSERT INTO constancia VALUES("19","4","15","2019-03-21","asd"):
INSERT INTO constancia VALUES("20","3","13","2019-03-21",""):
INSERT INTO constancia VALUES("21","3","16","2019-03-21",""):
INSERT INTO constancia VALUES("22","5","13","",""):
INSERT INTO constancia VALUES("23","3","17","2019-03-21",""):
INSERT INTO constancia VALUES("24","6","13","2019-03-21",""):

    /*!40000 ALTER TABLE `constancia` ENABLE KEYS */:
    UNLOCK TABLES:



DROP TABLE IF EXISTS cursante:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `cursante` (
  `cursante_id` int(8) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`cursante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `cursante` WRITE:
/*!40000 ALTER TABLE `cursante` DISABLE KEYS */:
    INSERT INTO cursante VALUES("1","14598","Elver Galargaa"):
INSERT INTO cursante VALUES("2","1523","Milton"):
INSERT INTO cursante VALUES("3","15290932","Dario Vazquez"):
INSERT INTO cursante VALUES("4","15645","asdad"):
INSERT INTO cursante VALUES("5","444444asdad","lsosls"):
INSERT INTO cursante VALUES("6","456465","Peton"):
INSERT INTO cursante VALUES("7","A12345","REne morritas"):
INSERT INTO cursante VALUES("8","AAAAA","MR. popo"):
INSERT INTO cursante VALUES("9","AAAssssAAAA23","penen"):
INSERT INTO cursante VALUES("10","asdadsadasdasd","Elver Galarga"):
INSERT INTO cursante VALUES("11","11111","Penon"):
INSERT INTO cursante VALUES("12","Externo","Pene Fatimo"):
INSERT INTO cursante VALUES("13","987654","Don Dimadon"):
INSERT INTO cursante VALUES("14","Externo","Batillo Externo"):
INSERT INTO cursante VALUES("15","Externo","Tom Bombadil"):
INSERT INTO cursante VALUES("16","10101011","Marico"):
INSERT INTO cursante VALUES("17","Externo","Marco Solis"):

    /*!40000 ALTER TABLE `cursante` ENABLE KEYS */:
    UNLOCK TABLES:



DROP TABLE IF EXISTS evento:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `evento` WRITE:
/*!40000 ALTER TABLE `evento` DISABLE KEYS */:
    INSERT INTO evento VALUES("1","1","1","asdsad","45","2019-02-01","2019-02-09"):
INSERT INTO evento VALUES("2","1","1","Lolazos","60","2019-02-01","2019-02-23"):
INSERT INTO evento VALUES("3","1","1","Heartstone","30","2019-02-05","2019-02-23"):
INSERT INTO evento VALUES("4","1","1","Maincraft","10","2019-03-01","2019-03-16"):
INSERT INTO evento VALUES("5","1","1","Mi Casa","0","",""):
INSERT INTO evento VALUES("6","1","1","Lalala","0","",""):

    /*!40000 ALTER TABLE `evento` ENABLE KEYS */:
    UNLOCK TABLES:



DROP TABLE IF EXISTS instancia:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `instancia` (
  `instancia_id` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`instancia_id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `instancia` WRITE:
/*!40000 ALTER TABLE `instancia` DISABLE KEYS */:
    INSERT INTO instancia VALUES("28","Centro de Investigación en Biología Molecular de las Enfermedades Crónicas"):
INSERT INTO instancia VALUES("26","Centro de Investigación en Comportamiento Alimentario y Nutrición"):
INSERT INTO instancia VALUES("29","Centro de Investigación en Emprendurismo, Incubación, Consultoría, Asesoría e Innovación"):
INSERT INTO instancia VALUES("31","Centro de Investigación en Riesgos y Calidad de Vida"):
INSERT INTO instancia VALUES("32","Centro de Investigación en Territorio y Ruralidad"):
INSERT INTO instancia VALUES("30","Centro de Investigación Lago de Zapotlán y Cuencas"):
INSERT INTO instancia VALUES("27","Centro de Investigaciones en Abejas"):
INSERT INTO instancia VALUES("7","Coordinación de Carreras"):
INSERT INTO instancia VALUES("12","Coordinación de Control Escolar"):
INSERT INTO instancia VALUES("6","Coordinación de Extensión"):
INSERT INTO instancia VALUES("11","Coordinación de Finanzas"):
INSERT INTO instancia VALUES("9","Coordinación de Investigación y Posgrado"):
INSERT INTO instancia VALUES("13","Coordinación de Personal"):
INSERT INTO instancia VALUES("8","Coordinación de Planeación"):
INSERT INTO instancia VALUES("5","Coordinación de Servicios Académicos"):
INSERT INTO instancia VALUES("10","Coordinación de Servicios Generales"):
INSERT INTO instancia VALUES("4","Coordinación de Tecnologías para el Aprendizaje (CTA)"):
INSERT INTO instancia VALUES("19","Departamento de Artes y Humanidades"):
INSERT INTO instancia VALUES("24","Departamento de Ciencias Básicas para la Salud"):
INSERT INTO instancia VALUES("25","Departamento de Ciencias Clínicas"):
INSERT INTO instancia VALUES("17","Departamento de Ciencias Computacionales e Innovación Tecnológica"):
INSERT INTO instancia VALUES("16","Departamento de Ciencias de la Naturaleza"):
INSERT INTO instancia VALUES("20","Departamento de Ciencias Económicas y Administrativas"):
INSERT INTO instancia VALUES("15","Departamento de Ciencias Exactas y Metodologías"):
INSERT INTO instancia VALUES("21","Departamento de Ciencias Sociales"):
INSERT INTO instancia VALUES("23","Departamento de Promoción, Preservación y Desarrollo de la Salud"):
INSERT INTO instancia VALUES("22","División de Ciencias de la Salud"):
INSERT INTO instancia VALUES("14","División de Ciencias Exactas, Naturales y Tecnológicas"):
INSERT INTO instancia VALUES("18","División de Ciencias Sociales y Humanidades"):
INSERT INTO instancia VALUES("1","Rectoría"):
INSERT INTO instancia VALUES("3","Secretaría Académica"):
INSERT INTO instancia VALUES("2","Secretaría Administrativa"):

    /*!40000 ALTER TABLE `instancia` ENABLE KEYS */:
    UNLOCK TABLES:



DROP TABLE IF EXISTS tipo_evento:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `tipo_evento` (
  `tipo_evento_id` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`tipo_evento_id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `tipo_evento` WRITE:
/*!40000 ALTER TABLE `tipo_evento` DISABLE KEYS */:
    INSERT INTO tipo_evento VALUES("1","Curso"):
INSERT INTO tipo_evento VALUES("3","Diplomado"):
INSERT INTO tipo_evento VALUES("4","Otro"):
INSERT INTO tipo_evento VALUES("2","Taller"):

    /*!40000 ALTER TABLE `tipo_evento` ENABLE KEYS */:
    UNLOCK TABLES:



DROP TABLE IF EXISTS usuario:
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:

CREATE TABLE `usuario` (
  `usuario_id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `tipo_usuario` int(1) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8:


/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `usuario` WRITE:
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */:
    INSERT INTO usuario VALUES("1","admin","123","email@gmail.com","0"):
INSERT INTO usuario VALUES("2","admin","123","email@gmail.com","0"):
INSERT INTO usuario VALUES("3","admin","123","email@gmail.com","0"):

    /*!40000 ALTER TABLE `usuario` ENABLE KEYS */:
    UNLOCK TABLES:





CREATE PROCEDURE crear_usuario(
  IN _username varchar(40),
     _password varchar(40),
     _email varchar(254),
     _tipo_usuario int(1),
  OUT _salida int
)
BEGIN
  INSERT INTO usuario (username, password, email, tipo_usuario)
    VALUES (_username, _password, _email, _tipo_usuario);
  SET _salida = LAST_INSERT_ID();
END :

CREATE PROCEDURE crear_cursante(
  IN _codigo varchar(20),
     _nombre varchar(60),
  OUT _salida varchar(20)
)
BEGIN
  DECLARE contador INT DEFAULT 0;

  IF TRIM(_codigo) = '0' THEN
    INSERT INTO cursante VALUES (default, 'Externo', _nombre);
    SET _salida = LAST_INSERT_ID();
  ELSE
    SELECT COUNT(*) INTO contador FROM cursante WHERE UPPER(codigo) = UPPER(_codigo);
    IF contador > 0 THEN
      SELECT cursante_id INTO _salida FROM cursante WHERE UPPER(codigo) = UPPER(_codigo);
    ELSE
      INSERT INTO cursante VALUES (default, _codigo, _nombre);
      SET _salida = LAST_INSERT_ID();
    END IF;
  END IF;
END :

CREATE PROCEDURE crear_tipo_evento(
  IN _nombre varchar(40),
  OUT _salida int(8)
)
BEGIN
  INSERT INTO tipo_evento (nombre) VALUES (_nombre);
  SET _salida = LAST_INSERT_ID();
END :

CREATE PROCEDURE crear_evento(
  IN _tipo_evento int(8),
     _instancia int(8),
     _nombre varchar(40),
     _duracion int(5),
     _fecha_inicio date,
     _fecha_fin date,
  OUT _salida int(8)
)
BEGIN
  DECLARE cantidad_columnas int;

  SELECT COUNT(*) INTO cantidad_columnas FROM evento
    WHERE UPPER(TRIM(_nombre)) = UPPER(TRIM(nombre));

  IF cantidad_columnas = 0 THEN
      INSERT INTO evento (tipo_evento, nombre, duracion, fecha_inicio, fecha_fin,
        instancia) VALUES (_tipo_evento, _nombre, _duracion, _fecha_inicio,
        _fecha_fin, _instancia);
  END IF;

  SELECT evento_id INTO _salida FROM evento
    WHERE UPPER(TRIM(_nombre)) = UPPER(TRIM(nombre));
END :

CREATE PROCEDURE crear_constancia(
  IN _evento int(8),
     _cursante varchar(20),
     _fecha_emision date,
     _comentario varchar(255),
  OUT _salida int
)
BEGIN
  INSERT INTO constancia (evento, cursante, fecha_emision, comentario)
    VALUES (_evento, _cursante, _fecha_emision, _comentario);
  SET _salida = LAST_INSERT_ID();
END :

CREATE PROCEDURE borrar_usuario(
  IN _usuario_id int(8)
)
BEGIN
  DELETE FROM usuario WHERE usuario_id = _usuario_id;
END :

CREATE PROCEDURE borrar_cursante(
  IN _codigo varchar(20)
)
BEGIN
  DELETE FROM cursante WHERE codigo = _codigo;
END :

CREATE PROCEDURE borrar_tipo_evento(
  IN _tipo_evento_id int(8)
)
BEGIN
  DELETE FROM tipo_evento WHERE tipo_evento_id = _tipo_evento_id;
END :

CREATE PROCEDURE borrar_evento(
  IN _evento_id int(8)
)
BEGIN
  DELETE FROM evento WHERE evento_id = _evento_id;
END :

CREATE PROCEDURE borrar_constancias(
  IN _folio int(8)
)
BEGIN
  DELETE FROM constancia WHERE folio = _folio;
END :

CREATE PROCEDURE actualizar_usuario(
  IN _usuario_id int(8),
     _username varchar(40),
     _password varchar(40),
     _email varchar(254),
     _tipo_usuario int(1)
)
BEGIN
  UPDATE usuario SET username =  _username, password = _password,
   email = _email, tipo_usuario = _tipo_usuario WHERE usuario_id = _usuario_id;
END :

CREATE PROCEDURE actualizar_cursante(
  IN _codigo varchar(20),
     _nombre varchar(40)
)
BEGIN
  UPDATE cursante SET nombre =  _nombre WHERE codigo = _codigo;
END :

CREATE PROCEDURE actualizar_tipo_evento(
  IN _tipo_evento_id int(8),
     _nombre varchar(40)
)
BEGIN
  UPDATE tipo_evento SET nombre =  _nombre WHERE tipo_evento_id = _tipo_evento_id;
END :

CREATE PROCEDURE actualizar_evento(
  IN _evento_id int(8),
     _tipo_evento int(8),
     _instancia int(8),
     _nombre varchar(40),
     _duracion int(5),
     _fecha_inicio date,
     _fecha_fin date
)
BEGIN
  UPDATE evento SET tipo_evento = _tipo_evento_id, nombre = _nombre,
    duracion = _duracion, fecha_inicio = _fecha_inicio, fecha_fin = _fecha_fin,
    instancia = _instancia WHERE evento_id = _evento_id;
END :

CREATE PROCEDURE actualizar_constancia(
  IN _folio int(8),
     _evento int(8),
     _cursante varchar(20),
     _fecha_emision date,
     _comentario varchar(255)
)
BEGIN
  UPDATE evento SET evento = _evento, cursante = _cursante,
    fecha_emision = _fecha_emision, comentario = _comentario WHERE folio = _folio;
END :

CREATE PROCEDURE leer_usuario(
  IN _usuario_id int(8),
  OUT _username varchar(40),
      _password varchar(40),
      _email varchar(254),
      _tipo_usuario int(1)
)
BEGIN
  SELECT username, password, email, tipo_usuario INTO _username, _password, _email,
    _tipo_usuario FROM usuario WHERE usuario_id = _usuario_id;
END :

CREATE PROCEDURE leer_cursante(
  IN _codigo varchar(20),
  OUT _nombre varchar(60)
)
BEGIN
  SELECT nombre INTO _nombre FROM cursante WHERE codigo = _codigo;
END :


CREATE PROCEDURE leer_tipo_evento(
  IN _tipo_evento_id int(8),
  OUT _nombre varchar(60)
)
BEGIN
  SELECT nombre INTO _nombre FROM tipo_evento WHERE tipo_evento_id = _tipo_evento_id;
END :

CREATE PROCEDURE leer_evento(
  IN _evento_id int(8),
  OUT _tipo_evento int(8),
      _instancia int(8),
      _nombre varchar(40),
      _duracion int(5),
      _fecha_inicio date,
      _fecha_fin date
)
BEGIN
  SELECT tipo_evento, instancia, nombre, duracion, fecha_inicio, fecha_fin
    INTO _tipo_evento, _instancia, _nombre, _duracion, _fecha_inicio, _fecha_fin
    FROM evento WHERE evento_id = _evento_id;
END :

CREATE PROCEDURE leer_constancia(
  IN _folio int(8),
  OUT _evento int(8),
      _cursante varchar(20),
      _fecha_emision date,
      _comentario varchar(255)
)
BEGIN
  SELECT evento, cursante, fecha_emision, comentario INTO _evento, _cursante,
    _fecha_emision, _comentario FROM evento WHERE folio = _folio;
END :


CREATE PROCEDURE formulario(
  IN _codigo varchar(20),
     _nombre_cursante varchar(60),
     _nombre_evento varchar(40),
     _tipo_evento_id int(8),
     _instancia_id int(8),
     _duracion int(5),
     _fecha_inicio date,
     _fecha_fin date,
     _fecha_emision date,
     _comentario varchar(255),
  OUT _salida int
)
BEGIN
  DECLARE _salida_cursante int;
  DECLARE _salida_evento int;

  CALL crear_cursante(_codigo, _nombre_cursante, _salida_cursante);
  CALL crear_evento(_tipo_evento_id, _instancia_id, _nombre_evento, _duracion,
    _fecha_inicio, _fecha_fin, _salida_evento);
  CALL crear_constancia(_salida_evento, _salida_cursante, _fecha_emision,
    _comentario, _salida);
END :

CALL crear_usuario('admin', '123', 'email@gmail.com', 0, @out):

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

