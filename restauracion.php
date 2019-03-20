
<!DOCTYPE html>
<html>

<head>
  <meta name="author" content="PracticantesServicioSocial">
  <meta charset="utf-8">

  <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">


  <script src="librerias/jquery.min.js"></script>
  <script src="librerias/bootstrap/popper.min.js"></script>
  <script src="librerias/bootstrap/bootstrap.min.js"></script>

  <title>Restaurar base de datos</title>

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
        <h3><span class="badge">Restaurar la base de datos</span></h3>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="w-75 col-6">
        <span class="text-justify"> <h5>Recuerde que debe de existir la base de datos con el mismo nombre que tenía cuando fue creada.</h5>
                                    Seleccione el archivo del respaldo para restaurar la base de datos
                                    y después seleccione el boton "Restaurar base de datos"</span>
      </div>
    </div>

    <div class="form-group form-row justify-content-center">
      <div class="col-4" style = "margin-top:1em";>
        <input type="file" class="btn btn-primary" id="fileRestaurarBase" onchange="obtenerRutaArchivoRestauracion();">

        <form name="fileNameForm" id="fileNameForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <input type="text" name="filename" id="filename" style="display:none;">
          <button type="submit" class="btn btn-info" style = "margin-top:1em"; id="btnCrearRespaldo">Restaurar base de datos</button>
        </form>

      </div>


    </div>
  </div>

</body>

<script type="text/javascript">
  function obtenerRutaArchivoRestauracion(){
    const input = document.getElementById('fileRestaurarBase');
    if(input.files && input.files[0]) document.fileNameForm.filename.value = "Respaldos/"+input.files[0].name;
  }
</script>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  //Crear la base de datos antes de hacer la conexión para que se ejecute la restauración
  $enlace = mysqli_connect("localhost", "root", "");
  $sql = "create database if not exists constancias;";
  $test = mysqli_query( $enlace,$sql) or trigger_error(mysqli_error($enlace));

  //Crear la conexion para hacer la restauracion
  require_once "php/conexion.php";
  $obj = new conectar();
  $connection = $obj -> conexion();


  //Se recibira por POST la ruta del archivo para hacer la restauración
  $filename = $_POST["filename"];

  $handle = fopen($filename,"r+");
  $contents = fread($handle,filesize($filename));
  $sql = explode(':',$contents);
  foreach($sql as $query){
    $result = mysqli_query($connection,$query);
  }
  fclose($handle);

  echo "<script>alert('Restauracion exitosa');</script>";
}
?>
