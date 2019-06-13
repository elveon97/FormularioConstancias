<?php
    //Codigo para validar que esta pagina pueda ser visualizada solamente si existe una sesión previamente iniciada!

    session_start();
    error_reporting(0);
    $varSesion = $_SESSION['usuario'];

/*  
    //Habilitar la siguiente linea cuando se de por concluido el desarrollo de esta pagina, esto con el fin de que no se muestren errores de php
    if($varSesion == null || $varSesion = ''){
        header("Location: errorInicioSesion.php");
        die();
    }

    if ($_SESSION['tipoUsuario'] != '2') {
      header("Location: errorAcceso.php");
      die();
    }
*/
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="author" content="PracticantesServicioSocial">
  <meta charset="utf-8">

  <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/font-awesome.css">

  <script src="librerias/jquery.min.js"></script>
  <script src="librerias/bootstrap/popper.min.js"></script>
  <script src="librerias/bootstrap/bootstrap.min.js"></script>

  <title>Restaurar base de datos</title>

</head>

<body>

  <div class="container">
    <div class="row">
      <!-- Imagen -->
      <div class="logo-container w-100">
          <img src="img/logo.jpg" alt="CUSur">
          <a href="adminIndex.php" class="btn btn btn-link">
            <span class="fa fa-arrow-circle-left" style="margin-right: 5px;"></span>
            Volver al Panel del Administrador
          </a>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="row justify-content-center">
      <div class="col-4">
        <h3><span class="badge">Restaurar la base de datos</span></h3>
      </div>
    </div>
<!--
    <div class="row justify-content-center">

      <div class="w-75 col-6">
        <span class="text-justify"> <h5>Recuerde que debe de existir la base de datos con el mismo nombre que tenía cuando fue creada.</h5>
                                    Seleccione el archivo del respaldo para restaurar la base de datos
                                    y después seleccione el boton "Restaurar base de datos"</span>
      </div>

    </div>-->

    <div class="fo9rm-group form-row justify-content-center">
      <div class="col-4" style = "margin-top:1em";>
        <!--
        <input type="file" class="btn btn-primary" id="fileRestaurarBase" onchange="obtenerRutaArchivoRestauracion();">
      -->

        <form name="fileNameForm" id="fileNameForm" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
          <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
          <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
          <input name="filename" id="filename" type="file" class="btn btn-primary"/>
          <button type="submit" class="btn btn-info" style = "margin-top:1em"; id="btnCrearRespaldo">Restaurar base de datos</button>
        </form>

      </div>


    </div>
  </div>

</body>
<!--
<script type="text/javascript">
  function obtenerRutaArchivoRestauracion(){
    const input = document.getElementById('fileRestaurarBase');
    if(input.files && input.files[0]) document.fileNameForm.filename.value = "Respaldos/"+input.files[0].name;  //Aquí es donde se asigna la ruta donde esta el archivo!
  }
</script>
-->
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


  //Se recibira por POST el nombre del archivo par hacer la restauración,

  //Explicación de la lógica para crear la restauración...
  //En el servidor se creo el archivo original del respaldo, y al descargarse a la maquina local se hizo una copia del mismo!.
  //Es decir, en el servidor en la carpeta de Respaldos se encuentra el respaldo original
  //Cuando se seleccione el respaldo en la maquina local, se obtendra el nombre del respaldo sin considerar las primeras letras (Respaldos_), las cuales seran substituidas por: Respaldos/
  //De esta manera se deja preparada la ruta para que el metodo fopen() pueda hacer el respaldo con el archivo original que se encuentra en el servidor!
  $filename = "Respaldos/";
  $auxFileName = $_FILES['filename']['name'];
  $auxFileName = substr($auxFileName, 10);    // Eliminar de la cadena "Respaldos_"

  $filename .= $auxFileName;

  $handle = fopen($filename,"r+");
  $contents = fread($handle,filesize($filename));
  //echo $contents;
  $sql = explode(':',$contents);
  foreach($sql as $query){
    $result = mysqli_query($connection,$query);
  }
  fclose($handle);

  echo "<script>alert('Restauracion exitosa');</script>";
}
?>
