<?php
    //Codigo para validar que esta pagina pueda ser visualizada solamente si existe una sesión previamente iniciada!

    session_start();
    $varSesion = $_SESSION['usuario'];

    //Habilitar la siguiente linea cuando se de por concluido el desarrollo de esta pagina, esto con el fin de que no se muestren errores de php
    //error_reporting(0);

    if($varSesion == null || $varSesion = ''){
        echo 'Para acceder a esta sección debes iniciar sesión';
        die();
    }
?>



<!DOCTYPE html>

<html>

    <head>
        <meta name="author" content="PracticantesServicioSocial">
        <meta charset="utf-8">

        <link rel="stylesheet" href="styles/common_styles.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">

        <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/font-awesome.css">
        <?php require_once "php/gestionScripts.php";  ?>
        <title>Reportes</title>

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

          <div class="row mt-4">
            <h3 class="col-xl">Seleccione tipo de Reporte:</h3>
          </div>

          <div class="row mt-4">

            <div class="col-sm">
              <div class="card">
                <div class="card-header w-100 bg-dark text-white">
                  <h4>Reporte por fecha</h4>
                </div>
                <div class="card-body">
                  <div class="card-title">
                      <span class="fa fa-calendar text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                  </div>
                  <span class="btn btn-primary" data-toggle="modal" data-target="#reportefechasmodal">
                    <span class="fa fa-file" style="margin-right: 5px;"></span>
                    Generar reporte
                  </span>
                </div>
              </div>
            </div>

            <div class="col-sm">
              <div class="card">
                <div class="card-header w-100 bg-dark text-white">
                  <h4>Reporte por cursante</h4>
                </div>
                <div class="card-body">
                  <div class="card-title">
                      <span class="fa fa-graduation-cap text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                  </div>
                  <span class="btn btn-primary" data-toggle="modal" data-target="#reportecursantemodal">
                    <span class="fa fa-file" style="margin-right: 5px;"></span>
                    Generar reporte
                  </span>
                </div>
              </div>
            </div>

            <div class="col-sm">
              <div class="card">
                <div class="card-header w-100 bg-dark text-white">
                  <h4>Reporte por curso</h4>
                </div>
                <div class="card-body">
                  <div class="card-title">
                      <span class="fa fa-wrench text-secondary w-100 mb-2" style="font-size: 6em; text-align: center;"></span>
                  </div>
                  <span class="btn btn-primary" data-toggle="modal" data-target="#reportecursomodal">
                    <span class="fa fa-file" style="margin-right: 5px;"></span>
                    Generar reporte
                  </span>
                </div>
              </div>
            </div>

          </div>

          <!-- Modal -->
        	<div class="modal fade" id="reportefechasmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        		<div class="modal-dialog" role="document">
        			<div class="modal-content w-100">
        				<div class="modal-header">
        					<h5 class="modal-title" id="exampleModalLabel">Reporte por fechas</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        						<span aria-hidden="true">&times;</span>
        					</button>
        				</div>
        				<div class="modal-body w-100">

                            <!-- FORM DEL REPORTE POR FECHAS -->
        					<form id="formReporteFechas" class="w-100">
        						<!-- Fecha Inicial -->
        						<label for="fechaInicial">Fecha inicial</label>
        						<input id="fechaInicial" class="form-control input-sm mb-3" type="date" name="fechaInicial" required>
        						<!-- Fecha Inicial -->
        						<label for="fechaFinal">Fecha final</label>
        						<input id="fechaFinal" class="form-control input-sm mb-3" type="date" name="fechaFinal" required>
        					</form>

        				</div>
        				<div class="modal-footer">
        					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                            <!-- Boton para generar el reporte de las fechas -->
        					<button type="button" id="btnGenerarReporteFechas"  class="btn btn-primary">Generar reporte</button>

        				</div>
        			</div>
        		</div>
        	</div>

          <!-- Modal -->
        	<div class="modal fade" id="reportecursantemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        		<div class="modal-dialog" role="document">
        			<div class="modal-content w-100">
        				<div class="modal-header">
        					<h5 class="modal-title" id="exampleModalLabel">Reporte por cursante</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        						<span aria-hidden="true">&times;</span>
        					</button>
        				</div>
        				<div class="modal-body w-100">
        					<form id="frmCursante" class="w-100">
        						<label for="codigo">Código del cursante</label>
        						<select id="codigo" name="codigo">
                      <?php
                        require_once "php/conexion.php";
                        $obj = new conectar();
                        $conexion = $obj -> conexion();

                        $result = mysqli_query($conexion, "SELECT codigo, nombre FROM cursante");

                        while($row = mysqli_fetch_row($result)) {
                          echo "<option value='$row[0]'>$row[1] ($row[0])</option> ";
                        }

                        mysqli_free_result($result);
                        mysqli_close($conexion);
                      ?>
                    </select>
        					</form>
        				</div>
        				<div class="modal-footer">
        					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        					<button type="button" id="btnCursante" class="btn btn-primary">Generar reporte</button>
        				</div>
        			</div>
        		</div>
        	</div>

          <!-- Modal -->
        	<div class="modal fade" id="reportecursomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        		<div class="modal-dialog" role="document">
        			<div class="modal-content w-100">
        				<div class="modal-header">
        					<h5 class="modal-title" id="exampleModalLabel">Reporte por curso</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        						<span aria-hidden="true">&times;</span>
        					</button>
        				</div>
        				<div class="modal-body w-100">
        					<form id="frmCurso" class="w-100">
        						<!-- Fecha Inicial -->
        						<label for="nombreCurso">Nombre del curso</label>
                    <select id="nombreCurso" name="nombreCurso">
                      <?php
                        require_once "php/conexion.php";
                        $obj = new conectar();
                        $conexion = $obj -> conexion();

                        $result = mysqli_query($conexion, "SELECT evento_id, nombre FROM evento");

                        while($row = mysqli_fetch_row($result)) {
                          echo "<option value='$row[0]'>$row[1]</option> ";
                        }

                        mysqli_free_result($result);
                        mysqli_close($conexion);
                      ?>
                    </select>
        						<!-- Fecha Inicial -->
        					</form>
        				</div>
        				<div class="modal-footer">
        					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>


        					<button type="button" id="btnCurso"  class="btn btn-primary">Generar reporte</button>


        				</div>
        			</div>
        		</div>
        	</div>

        </div>



    </body>

</html>

<!-- Función JS para enviar los parametros al php que generará el reporte por fechas -> interfazReportesFechas.php -->
<script type="text/javascript">
    $(document).ready(function(){
		  $('#btnGenerarReporteFechas').click(function(){
  			datos=$('#formReporteFechas').serialize();
        //Envio de parametro por _$GET
        location.href="interfazReporteFechas.php?"+datos;
		  });

      $('#btnCursante').click(function(){
  			datos=$('#frmCursante').serialize();
        location.href="interfazReporteCursante.php?"+datos;
		  });

      $('#btnCurso').click(function(){
  			datos=$('#frmCurso').serialize();
        location.href="interfazReporteCurso.php?"+datos;
		  });
    });
</script>
