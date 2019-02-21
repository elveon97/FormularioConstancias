<?php
require("php/conexion.php");

//Codigo para validar que esta pagina pueda ser visualizada solamente si existe una sesión previamente iniciada!
session_start();
error_reporting(0);
$varSesion = $_SESSION['usuario'];

//Habilitar la siguiente linea cuando se de por concluido el desarrollo de esta pagina, esto con el fin de que no se muestren errores de php

if($varSesion == null || $varSesion = ''){
  header("Location: errorInicioSesion.php");
  die();
}

if($_GET){
  //Se reciben los parametros por _$GET
  $nombreCurso = $_GET['curso_A_Validar'];

  //Obtener el id del curso
  $obj = new conectar();
  $conn = $obj -> conexion();
  $result = $conn->query("SELECT evento_id FROM evento where nombre = '$nombreCurso'");
  //Con este id se creará el nombre de la carpeta para guardar el archivo que validará el curso!
  $id = mysqli_fetch_row($result);

  //Codigo para almacenar el archivo...

}

?>
<!DOCTYPE html>

<html>

<head>
  <meta name="author" content="PracticantesServicioSocial">
  <meta charset="utf-8">

  <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/font-awesome.css">

  <script src="librerias/jquery.min.js"></script>


  <title>Validar curso</title>

</head>

<body>
  <div class="container">
    <div class="row">
      <!-- Imagen -->
      <div class="logo-container w-100">
        <img src="img/logo.jpg" alt="CUSur">
        <a href="adminIndex.php" class="btn btn btn-link">
          <span class="fa fa-arrow-circle-left" style="margin-right: 5px;"></span>
          Volver al Panel de Administración
        </a>
      </div>
    </div>


    <div class="container">
      <div class="card mt-4 mb-2">

        <div class="card-header">
          <h5><span class="fa fa-plus-circle text-primary mr-1"></span>Validar curso</h5>
        </div>

        <div class="card-body">

          <form method="post" action="guardarArchivo.php" enctype="multipart/form-data">

            <div class="form-group form-row">
              <div class="col-7">
                <?php echo "<input id='idCurso' type='text' class='form-control' name='idCurso' value='$id[0]'>"; ?>
              </div>
            </div>

            <div class="form-group form-row">
              <label class="col-4 col-form-label"><span class="fa fa-asterisk text-success mr-1" style="font-size:0.7rem;"></span>Nombre del Curso</label>
              <div class="col-7">
                <?php echo "<input id='nombreCurso' type='text' class='form-control' name='nombreCurso' value='$nombreCurso'>"; ?>
              </div>
            </div>

            <div class="form-group form-row">
              <label class="col-4 col-form-label"><span class="fa fa-asterisk text-success mr-1" style="font-size:0.7rem;"></span>Seleccione archivo</label>
              <div class="col-7">
                <input id="archivo" type="file" class="form-control" name="archivo" accept = "application/pdf">
              </div>
            </div>

            <div class="form-group form-row mt-4">
              <div class="col-10"></div>
              <div class="col-2">
                <button type="submit" class="btn btn-primary">Guardar Archivo</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>

</html>
