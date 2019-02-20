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

  <title>Curso Guardado</title>

</head>

<body>

  <div class="container">
    <div class="row">
      <!-- Imagen -->
      <div class="logo-container w-100">
        <img src="img/logo.jpg" alt="CUSur">
        <a href="formulario.php" class="btn btn btn-link">
          <span class="fa fa-arrow-circle-left" style="margin-right: 5px;"></span>
          Volver al Formulario
        </a>
      </div>
    </div>


    <div class = "container col-4">

      <?php

      $idCurso = $_POST['idCurso'];
      $nombreCurso = $_POST['nombreCurso'];
      //Codigo para recibir, validar y guardar el archivo...
      if($_FILES["archivo"]["error"] > 0){  echo "<h5><span class='fa fa-plus-circle text-primary mr-1'></span>Ocurrio un error al cargar el archivo</h5>"; }
      else{
        //echo 'Archivo recibido en php con exito <br>';
        $permitidos = array("image/png","image/jpg","application/pdf"); //Solamente aceptara jpg, png o pdf
        $limite_kb = 800;
        //Validar el tipo de archivo...
        if(in_array($_FILES["archivo"]["type"] , $permitidos)){
          //Validar que el peso del archivo sea menor al definido... el archivo se recibe en bites, hacer la conversion a kb
          if($_FILES["archivo"]["size"] <= $limite_kb * 1024 ){
            //En la variable $ruta se encuentra el nombre de la carpeta donde se almacenaran los archivos y el nombre de la carpeta especifica
            //para cada curso
            $ruta = 'archivosValidarCurso/'. $idCurso . '/';
            //Guardar la extension del archivo...
            $auxSaveExt = $_FILES["archivo"]["name"];
            $auxSaveExt = substr($auxSaveExt, -4);

            //Crear el path con nombre del archivo a almacenar
            $nombreArchivo = $ruta.'validarCurso'.$idCurso.$auxSaveExt;
            //echo $nombreArchivo.'<br>';
            //Verificar si ya se existe una carpeta (Por si ya se había guardado un documento para dicho curso)
            if(!file_exists($ruta)){
              //Si no existe, crear la carpeta
              mkdir($ruta);
            }

            //Una vez que la carpeta ya se ha creado o ya se habia creado, procedemos a hacer el guardado del archivo...
            //Parametros de la funcion @move_uploaded_file(archivo_a_Guardar, rutaDestino);
            $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"] , $nombreArchivo);
            //Imprimir mensaje de exito o error al guardar el archivo
            if($resultado){
              echo "<h5><span class='fa fa-check-square text-success mr-1'>Archivo guardado exitosamente</span></h5>";
            }else{  echo "<h5><span class='fa fa-times text-warning mr-1'>Ocurrio un error al guardar el archivo, intentelo de nuevo</span></h5>";  }

            //Posibles mensajes de error al recibir el archivo en php
          }else{  echo "<h5><span class='fa fa-times text-warning mr-1'>El archivo es demasiado grande para el sistema, maximo: ' .$limite_kb. 'kb'</span></h5>"; }
        }else{  echo "<h5><span class='fa fa-times text-warning mr-1'>El tipo de archivo no es valido <br> Solo archivos .png .jpg o .pdf</span></h5>"; }
      }
      ?>
    </div>

  </div>

</body>

</html>
