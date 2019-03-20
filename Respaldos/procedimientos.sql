--  PROCEDIMIENTO CREAR USUARIO
--  Este procedimiento se utiliza para crear el usuario
DELIMITER //
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
END //
DELIMITER ;

--  PROCEDIMIENTO CREAR USUARIO
--  Este procedimiento se utiliza para crear el cursante, para esto, revisando
--  que éste no se haya registrado antes
DELIMITER //
CREATE PROCEDURE crear_cursante(
  IN _codigo varchar(20),
     _nombre varchar(60),
  OUT _salida varchar(20)
)
BEGIN
  INSERT IGNORE INTO cursante (codigo, nombre) VALUES (_codigo, _nombre);
  SET _salida = _codigo;
END //
DELIMITER ;

--  PROCEDIMIENTO CREAR USUARIO
--  Este procedimiento se utiliza para tipos de evento
DELIMITER //
CREATE PROCEDURE crear_tipo_evento(
  IN _nombre varchar(40),
  OUT _salida int(8)
)
BEGIN
  INSERT INTO tipo_evento (nombre) VALUES (_nombre);
  SET _salida = LAST_INSERT_ID();
END //
DELIMITER ;

--  PROCEDIMIENTO CREAR EVENTO
DELIMITER //
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
END //
DELIMITER ;

--  PROCEDIMIENTO CREAR CONSTANCIA
DELIMITER //
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


--  PROCEDIMIENTO FORMULARIO
DELIMITER //
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
END //
DELIMITER ;

CALL crear_usuario('admin', '123', 'email@gmail.com', 0, @out);
