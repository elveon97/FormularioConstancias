
<?php

if($_GET){
  require_once "php/conexion.php";

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
  <link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/bootstrap.css">

  <script src="librerias/jquery.min.js"></script>
  <script src="librerias/bootstrap/popper.min.js"></script>
  <script src="librerias/bootstrap/bootstrap.min.js"></script>
  <script src="librerias/alertify/alertify.js"></script>

  <title>Validar curso</title>

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

    <div class="container">
      <?php

          echo $nombreCurso ."<br>";
          echo $id[0];
       ?>
    </div>



</body>

</html>
