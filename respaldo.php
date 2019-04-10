
<!DOCTYPE html>
<html>

<head>
  <meta name="author" content="PracticantesServicioSocial">
  <meta charset="utf-8">

  <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">


  <script src="librerias/jquery.min.js"></script>
  <script src="librerias/bootstrap/popper.min.js"></script>
  <script src="librerias/bootstrap/bootstrap.min.js"></script>

  <title>Creación de Respaldos</title>

</head>

<body>

  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-4">
        <img src="img/logo.jpg" alt="CUSur">
      </div>
    </div>
  </div>

  <div class="container">

    <div class="row justify-content-center">
      <div class="col-4">
        <h3><span class="badge">Generar respaldo de la base de datos</span></h3>
      </div>
    </div>

    <div class="form-group form-row justify-content-center">
      <form name="fileNameForm" id="fileNameForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="visibility:none;">
        <div class="col-1">
          <button type="submit" class="btn btn-primary" id="btnCrearRespaldo">Crear respaldo</button>
        </div>
      </form>
    </div>

  </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  require_once "php/conexion.php";
  $obj = new conectar();
  $connection = $obj -> conexion();
  //Obtener las tablas de la base de datos. Ojo: Sin Datos aún!
  $tables = array();
  $result = mysqli_query($connection,"SHOW TABLES");
  while($row = mysqli_fetch_row($result)){
    $tables[] = $row[0];
  }

  //En la variable $return se guardarán las sentencias a ejecutar para realizar el respaldo
  //Se incluyen los procedimientos!
  //Después de la línea donde se crea el usuario admin, esas líneas de código actualizan la estructura de la base de datos de acuerdo a una solicitud por los usuarios
  //si no quedase muy claro el código, se puede comprender mejor en el archivo Instrucciones.sql que se encuentra en la carpeta BD
  $return = '';

  $return .=
'/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */:
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */:
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */:
/*!40101 SET NAMES utf8 */:
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */:
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */:
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */:
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */:
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */:
';
  foreach($tables as $table){
    //Obtiene los datos de X tabla!
    $result = mysqli_query($connection,"SELECT * FROM ".$table);
    $num_fields = mysqli_num_fields($result);

    //Sentencia para eliminar la tabla X
    $return .= 'DROP TABLE IF EXISTS '.$table.':';
    $return .= '
/*!40101 SET @saved_cs_client     = @@character_set_client */:
/*!40101 SET character_set_client = utf8 */:';
    $row2 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE ".$table));
    $return .= "\n\n".$row2[1].":\n\n";
    $return .= '
/*!40101 SET character_set_client = @saved_cs_client */:
LOCK TABLES `'.$table.'` WRITE:
/*!40000 ALTER TABLE `'.$table.'` DISABLE KEYS */:
    ';

    for($i=0;$i<$num_fields;$i++){
      while($row = mysqli_fetch_row($result)){
        $return .= "INSERT INTO ".$table." VALUES(";
        for($j=0;$j<$num_fields;$j++){
          $row[$j] = addslashes($row[$j]);
          if(isset($row[$j])){ $return .= '"'.$row[$j].'"';}
          else{ $return .= '""';}
          if($j<$num_fields-1){ $return .= ',';}
        }
        $return .= "):\n";
      }
    }
    $return .= '
    /*!40000 ALTER TABLE `'.$table.'` ENABLE KEYS */:
    UNLOCK TABLES:
';
    $return .= "\n\n\n";
  }

$return .= "

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

DROP PROCEDURE crear_cursante:

CREATE PROCEDURE crear_cursante(
  IN _codigo varchar(20),
     _nombre varchar(60),
  OUT _salida varchar(20)
)
BEGIN
  DECLARE contador INT DEFAULT 0;

  IF TRIM(_codigo) = '0' THEN
    INSERT INTO cursante(codigo, nombre) VALUES ('Externo', _nombre);
    SET _salida = LAST_INSERT_ID();
  ELSE
    SELECT COUNT(*) INTO contador FROM cursante WHERE UPPER(codigo) = UPPER(_codigo);
    IF contador > 0 THEN
      SELECT cursante_id INTO _salida FROM cursante WHERE UPPER(codigo) = UPPER(_codigo);
    ELSE
      INSERT INTO cursante(codigo, nombre) VALUES (_codigo, _nombre);
      SET _salida = LAST_INSERT_ID();
    END IF;
  END IF;
END :


ALTER TABLE constancia DROP FOREIGN KEY constancia_ibfk_2;

ALTER TABLE cursante DROP PRIMARY KEY;

ALTER TABLE cursante ADD cursante_id int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;

ALTER TABLE constancia ADD COLUMN cursante_id int(8) NOT NULL AFTER evento;

ALTER TABLE constancia DROP COLUMN cursante;

ALTER TABLE constancia CHANGE `cursante_id` `cursante` int(8);

ALTER TABLE constancia ADD FOREIGN KEY (cursante) REFERENCES cursante(cursante_id);

DROP PROCEDURE IF EXISTS ROWPERROW;
";


$return .= '
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

';

  //Crear el nombre del respaldo auxiliandose de la información de getdate()
  $hoy = getdate();
  $auxNameBackUp =  "Respaldos/respaldoFormularioConstancias"."_".$hoy['mday']."_".$hoy['month']."_".$hoy['year']."_".
                    $hoy['hours']."_".$hoy['minutes']."_".$hoy['seconds'].".sql";

  //guardar el archivo...
  //Se guardarán en la carpeta Respaldos/ y tendrán el nombre creado en la variable $auxNameBackUp
  $handle = fopen($auxNameBackUp,"w+");
  fwrite($handle,$return);
  fclose($handle);

  //Crear un "formulario" para insertar un input la ruta y poder enviarla por post al archivo downloadBackUp.php para que se pueda descargar el archivo en la maquina donde se esta generando dicho respaldo!
  echo("<div class='form-group form-row justify-content-center'>
          <form method='post' action='downloadBackUp.php'>
          <input type='hidden' id='hidden' name='pathBackUp' value='$auxNameBackUp'>
          <button type='submit' class='btn btn-primary'>Descargar Respaldo</button>
          </form>
        </div>
        ");

}
?>
