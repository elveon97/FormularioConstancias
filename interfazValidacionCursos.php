<?php
    //Codigo para validar que esta pagina pueda ser visualizada solamente si existe una sesión previamente iniciada!

    session_start();
    error_reporting(0);
    $varSesion = $_SESSION['usuario'];

    //Habilitar la siguiente linea cuando se de por concluido el desarrollo de esta pagina, esto con el fin de que no se muestren errores de php

    if($varSesion == null || $varSesion = ''){
        header("Location: errorInicioSesion.php");
        die();
    }

    if ($_SESSION['tipoUsuario'] == '1') {
      header("Location: errorAcceso.php");
      die();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Validación de cursos</title>
	<?php require_once "php/gestionScripts.php";  ?>
</head>
<body>
	<div class="container pt-1">
		<img src="img/logo.jpg" alt="CUSur" class="mb-5">
    <a href="adminIndex.php" class="btn btn btn-link">
      <span class="fa fa-arrow-circle-left" style="margin-right: 5px;"></span>
      Volver al Panel del Administrador
    </a>
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left" style="box-shadow: 0px 0px 10px rgba(0,0,0,1);">
					<div class="card-header">
						Validacion de cursos
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Validar cursos <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<h3 class="mb-3">Cursos validados</h3>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						Validación de cursos
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo cursante</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label for="codigoCursante">Curso</label>
            <select class="form-control input-sm mb-3" name="curso_A_Validar">
              <?php
                require_once "php/conexion.php";
                $obj = new conectar();
                $conexion = $obj -> conexion();

                $result = mysqli_query($conexion, "SELECT evento_id, nombre FROM evento");

                while($row = mysqli_fetch_row($result)) {
                	if (!is_dir("archivosValidarCurso/" . $row[0])) {
                		echo "<option value='$row[1]'>$row[1]</option> ";
                	}
                }



                mysqli_free_result($result);
                mysqli_close($conexion);
              ?>
            </select>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Validar curso</button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			location.href="interfazGuardarArchivoParaCurso.php?"+datos;
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('php/procesosValidacion/tabla_validacion.php');
	});
</script>

<script type="text/javascript">
	function visualizar(id){
    location.href="visorPdf.php?nombrePdf=archivosValidarCurso/"+id+"/validarCurso"+id+".pdf";
	}

		function eliminar(id){
		  alertify.confirm('Eliminar validación del curso', '¿Seguro que deseas eliminar esta validación?', function(){

			$.ajax({
				type:"POST",
				data:"directory=../../archivosValidarCurso/" + id,
				url:"php/procesosValidacion/eliminar_directorio.php",
				success:function(r){
					$('#tablaDatatable').load('php/procesosValidacion/tabla_validacion.php');
					alertify.success("Validación de curso eliminada");
				}
			});

		}
		, function(){

		});
	}

</script>
