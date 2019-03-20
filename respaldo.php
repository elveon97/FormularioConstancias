
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
  $return = '';

  $return .=
'/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE="+00:00" */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
';
  foreach($tables as $table){
    //Obtiene los datos de X tabla!
    $result = mysqli_query($connection,"SELECT * FROM ".$table);
    $num_fields = mysqli_num_fields($result);

    //Sentencia para eliminar la tabla X
    $return .= 'DROP TABLE IF EXISTS '.$table.';';
    $return .= '
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;';
    $row2 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE ".$table));
    $return .= "\n\n".$row2[1].";\n\n";
    $return .= '
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `'.$table.'` WRITE;
/*!40000 ALTER TABLE `'.$table.'` DISABLE KEYS */;
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
        $return .= ");\n";
      }
    }
    $return .= '
    /*!40000 ALTER TABLE `'.$table.'` ENABLE KEYS */;
    UNLOCK TABLES;
';
    $return .= "\n\n\n";
  }
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

  echo "<script>alert('Respaldo exitoso');</script>";
}
?>
