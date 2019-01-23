-- --------------------------------------------------------------- 2019/01/21 --
-- Desarrollado por Darío Alexis Vázquez Magaña
-- theelveon97@gmail.com
-- https://github.com/elveon97/FormularioConstancias
-- -----------------------------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

--  CREACIÓN DE BADE DE DATOS
CREATE DATABASE IF NOT EXISTS `constancias` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `constancias`;

--  CREACIÓN DE TABLA USUARIO
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int(8) AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(254),
  `tipo_usuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  CREACIÓN TABLA CURSANTE
CREATE TABLE IF NOT EXISTS `cursante` (
  `codigo` varchar(20) PRIMARY KEY,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  CREACIÓN TABLA TIPO DE EVENTO
CREATE TABLE IF NOT EXISTS `tipo_evento` (
  `tipo_evento_id` int(8) AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  AGREGAR VALORES PREDETERMINADOS DE TIPO DE EVENTO
INSERT INTO tipo_evento (nombre) VALUES('Curso');
INSERT INTO tipo_evento (nombre) VALUES('Taller');
INSERT INTO tipo_evento (nombre) VALUES('Diplomado');
INSERT INTO tipo_evento (nombre) VALUES('Otro');

--  CREACIÓN TABLA EVENTO
CREATE TABLE IF NOT EXISTS `evento` (
  `evento_id` int(8) AUTO_INCREMENT PRIMARY KEY,
  `tipo_evento` int(8) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `duracion` int(5),
  `fecha_inicio` date,
  `fecha_fin` date,
  `instancia` varchar(40)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  CREACIÓN TABLA CONSTANCIA
CREATE TABLE IF NOT EXISTS `constancia` (
  `folio` int(8) AUTO_INCREMENT PRIMARY KEY,
  `evento` int(8) NOT NULL,
  `cursante` varchar(20) NOT NULL,
  `fecha_emision` date,
  `comentario` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  PROCEDIMIENTO CREAR USUARIO
--  Este procedimiento se utiliza para crear el usuario
DELIMITER //
CREATE PROCEDURE crear_usuario(
  IN _username varchar(40),
     _password varchar(40),
     _email varchar(254),
     _tipo_usuario int(1)
)
BEGIN
  INSERT INTO usuario (username, password, email, tipo_usuario)
    VALUES (_username, _password, _email, _tipo_usuario);
END //
DELIMITER ;

--  PROCEDIMIENTO CREAR USUARIO
--  Este procedimiento se utiliza para crear el cursante, para esto, revisando
--  que éste no se haya registrado antes
DELIMITER //
CREATE PROCEDURE crear_cursante(
  IN _codigo varchar(20),
     _nombre varchar(60)
)
BEGIN
  DECLARE cantidad_columnas int;
  SELECT COUNT(*) INTO cantidad_columnas FROM cursante WHERE codigo = _codigo;

  IF cantidad_columnas = 0 THEN
    INSERT INTO cursante (codigo, nombre) VALUES (_codigo, _nombre);
  END IF;
END //
DELIMITER ;

--  PROCEDIMIENTO CREAR USUARIO
--  Este procedimiento se utiliza para tipos de evento
DELIMITER //
CREATE PROCEDURE crear_tipo_evento(
  IN _nombre varchar(40)
)
BEGIN
  INSERT INTO tipo_evento (nombre) VALUES (_nombre);
END //
DELIMITER ;

--  PROCEDIMIENTO CREAR EVENTO
--  Este procedimiento se utiliza para crear el evento. A pesar de que la tabla
--  posee un id entero autoincrmental, este procedimiento revisa que no se haya
--  creado un evento con el mismo nombre, esto por razones integridad de los datos,
--  puesto que uno de los requerimientos es el autocompletado de los demás datos
--  del evento a partir del nombre. Esto podría generar problemas en un futuro
--  si se reimparte un evento con el mismo nombre.
DELIMITER //
CREATE PROCEDURE crear_evento(
  IN _tipo_evento varchar(40),
     _nombre varchar(40),
     _duracion int(5),
     _fecha_inicio date,
     _fecha_fin date,
     _instancia varchar(40)
)
BEGIN
  DECLARE cantidad_columnas int;
  DECLARE _tipo_evento_id int;

  SELECT COUNT(*) INTO cantidad_columnas FROM evento
    WHERE UPPER(TRIM(_nombre)) = UPPER(TRIM(nombre));

  IF cantidad_columnas = 0 THEN
      SELECT tipo_evento_id INTO _tipo_evento_id FROM tipo_evento
        WHERE _tipo_evento = nombre;

      INSERT INTO evento (tipo_evento, nombre, duracion, fecha_inicio, fecha_fin,
        instancia) VALUES (_tipo_evento_id, _nombre, _duracion, _fecha_inicio,
        _fecha_fin, _instancia);
  END IF;
END //
DELIMITER ;

--  PROCEDIMIENTO CREAR EVENTO
--  Este procedimiento se utiliza para crear la constancia en la forma en que se
--  realiza en el formulario web. Para el correcto funcionamiento de este
--  procedimiento, primero debemos llamar a los procedimientos que crean al cursante
--  y evento.
DELIMITER //
CREATE PROCEDURE crear_constancia(
  IN _evento_nombre varchar(40),
     _cursante varchar(20),
     _fecha_emision date,
     _comentario varchar(255)
)
BEGIN
  DECLARE _evento_id int;

  SELECT evento_id INTO _evento_id FROM evento
    WHERE UPPER(TRIM(_evento_nombre)) = UPPER(TRIM(nombre));

  INSERT INTO constancia (evento, cursante, fecha_emision, comentario)
    VALUES (_evento_id, _cursante, _fecha_emision, _comentario);
END //
DELIMITER ;

--  PROCEDIMIENTO BORRAR USUARIO
DELIMITER //
CREATE PROCEDURE borrar_usuario(
  IN _usuario_id int(8)
)
BEGIN
  DELETE FROM usuario WHERE usuario_id = _usuario_id;
END //
DELIMITER ;

--  PROCEDIMIENTO BORRAR CURSANTE
DELIMITER //
CREATE PROCEDURE borrar_cursante(
  IN _codigo varchar(20)
)
BEGIN
  DELETE FROM cursante WHERE codigo = _codigo;
END //
DELIMITER ;

--  PROCEDIMIENTO BORRAR TIPO DE EVENTO
DELIMITER //
CREATE PROCEDURE borrar_tipo_evento(
  IN _tipo_evento_id int(8)
)
BEGIN
  DELETE FROM tipo_evento WHERE tipo_evento_id = _tipo_evento_id;
END //
DELIMITER ;

--  PROCEDIMIENTO BORRAR EVENTO
DELIMITER //
CREATE PROCEDURE borrar_evento(
  IN _evento_id int(8)
)
BEGIN
  DELETE FROM evento WHERE evento_id = _evento_id;
END //
DELIMITER ;

--  PROCEDIMIENTO BORRAR CONSTANCIA
DELIMITER //
CREATE PROCEDURE borrar_constancias(
  IN _folio int(8)
)
BEGIN
  DELETE FROM constancia WHERE folio = _folio;
END //
DELIMITER ;

--  PROCEDIMIENTO ACTUALIZAR USUARIO
DELIMITER //
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
END //
DELIMITER ;

--  PROCEDIMIENTO ACTUALIZAR CURSANTE
DELIMITER //
CREATE PROCEDURE actualizar_cursante(
  IN _codigo varchar(20),
     _nombre varchar(40)
)
BEGIN
  UPDATE cursante SET nombre =  _nombre WHERE codigo = _codigo;
END //
DELIMITER ;

--  PROCEDIMIENTO ACTUALIZAR TIPO DE EVENTO
DELIMITER //
CREATE PROCEDURE actualizar_tipo_evento(
  IN _tipo_evento_id int(8),
     _nombre varchar(40)
)
BEGIN
  UPDATE tipo_evento SET nombre =  _nombre WHERE tipo_evento_id = _tipo_evento_id;
END //
DELIMITER ;

--  PROCEDIMIENTO ACTUALIZAR EVENTO
DELIMITER //
CREATE PROCEDURE actualizar_evento(
  IN _evento_id int(8),
     _tipo_evento int(8),
     _nombre varchar(40),
     _duracion int(5),
     _fecha_inicio date,
     _fecha_fin date,
     _instancia varchar(40)
)
BEGIN
  UPDATE evento SET tipo_evento = _tipo_evento_id, nombre = _nombre,
    duracion = _duracion, fecha_inicio = _fecha_inicio, fecha_fin = _fecha_fin,
    instancia = _instancia WHERE evento_id = _evento_id;
END //
DELIMITER ;

--  PROCEDIMIENTO ACTUALIZAR CONSTANCIA
DELIMITER //
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
END //
DELIMITER ;

--  PROCEDIMIENTO LEER USUARIO
DELIMITER //
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
END //
DELIMITER ;

--  PROCEDIMIENTO LEER CURSANTE
DELIMITER //
CREATE PROCEDURE leer_cursante(
  IN _codigo varchar(20),
  OUT _nombre varchar(60)
)
BEGIN
  SELECT nombre INTO _nombre FROM cursante WHERE codigo = _codigo;
END //
DELIMITER ;


--  PROCEDIMIENTO LEER TIPO DE EVENTO
DELIMITER //
CREATE PROCEDURE leer_tipo_evento(
  IN _tipo_evento_id int(8),
  OUT _nombre varchar(60)
)
BEGIN
  SELECT nombre INTO _nombre FROM tipo_evento WHERE tipo_evento_id = _tipo_evento_id;
END //
DELIMITER ;

--  PROCEDIMIENTO LEER EVENTO
DELIMITER //
CREATE PROCEDURE leer_evento(
  IN _evento_id int(8),
  OUT _tipo_evento int(8),
      _nombre varchar(40),
      _duracion int(5),
      _fecha_inicio date,
      _fecha_fin date,
      _instancia varchar(40)
)
BEGIN
  SELECT tipo_evento, nombre, duracion, fecha_inicio, fecha_fin, instancia
    INTO _tipo_evento, _nombre, _duracion, _fecha_inicio, _fecha_fin, _instancia
    FROM evento WHERE evento_id = _evento_id;
END //
DELIMITER ;

--  PROCEDIMIENTO LEER CONSTANCIA
DELIMITER //
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
END //
DELIMITER ;
