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
	<title>Gestión de cursos</title>
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
						Gestión de cursos
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo curso <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						Gestión de curso
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
					<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo curso</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<!-- Nombre del Curso-->
						<label for="nombreCurso">Nombre</label>
						<input id="nombreCurso" class="form-control input-sm mb-3" type="text" placeholder="Ingresa el nombre del Curso" name="nombre" required>
						<!-- Tipo evento-->
            <label for="tipoEvento">Tipo de evento</label>
						<select name="tipoEvento" class="form-control mb-3">
              <?php
                require_once "php/procesosCursos/conexion.php";

                $obj= new conectar();
          			$conexion=$obj->conexion();

                $result = $conexion->query("SELECT * FROM tipo_evento ORDER BY tipo_evento_id ASC");

                while($row=mysqli_fetch_array($result)) {
                  echo '<option value="'.htmlspecialchars($row[0]).
                    '">'.htmlspecialchars($row[1]).'</option>';
                }

                mysqli_free_result($result);
                mysqli_close($conn);
              ?>
						</select>
            <!-- Tipo evento-->
            <label for="instancia">Instancia</label>
						<select name="instancia" class="form-control mb-3">
              <?php
                require_once "php/procesosCursos/conexion.php";

                $obj= new conectar();
          			$conexion=$obj->conexion();

                $result = $conexion->query("SELECT * FROM instancia ORDER BY instancia_id ASC");

                while($row=mysqli_fetch_array($result)) {
                  echo '<option value="'.htmlspecialchars($row[0]).
                    '">'.htmlspecialchars($row[1]).'</option>';
                }

                mysqli_free_result($result);
                mysqli_close($conn);
              ?>
						</select>
            <!-- Duración -->
						<label for="duracionCurso">Duración</label>
						<input id="duracionCurso" class="form-control input-sm mb-3" type="number" placeholder="Ingresa la duración del Curso" name="duracion" required>
            <!-- Duración -->
						<label for="fechaInicialCurso">Fecha inicial</label>
						<input id="fechaInicialCurso" class="form-control input-sm mb-3" type="date" name="fechaInicial" required>
            <!-- Duración -->
						<label for="fechaFinalCurso">Fecha final</label>
						<input id="fechaFinalCurso" class="form-control input-sm mb-3" type="date" name="fechaFinal" required>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar curso</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
            <input type="text" hidden="" id="idEventoEditar" name="idEventoEditar">
						<!-- Nombre del Curso-->
						<label for="nombreCurso">Nombre</label>
						<input id="nombreCursoEditar" class="form-control input-sm mb-3" type="text" placeholder="Ingresa el nombre del Curso" name="nombreEditar" required>
						<!-- Tipo evento-->
            <label for="tipoEventoEditar">Tipos de evento</label>
						<select name="tipoEventoEditar" class="form-control mb-3">
              <?php
                require_once "php/procesosCursos/conexion.php";

                $obj= new conectar();
          			$conexion=$obj->conexion();

                $result = $conexion->query("SELECT * FROM tipo_evento ORDER BY tipo_evento_id ASC");

                while($row=mysqli_fetch_array($result)) {
                  echo '<option value="'.htmlspecialchars($row[0]).
                    '">'.htmlspecialchars($row[1]).'</option>';
                }

                mysqli_free_result($result);
                mysqli_close($conn);
              ?>
						</select>
            <!-- Tipo evento-->
            <label for="instancia">Instancia</label>
						<select name="instanciaEditar" class="form-control mb-3">
              <?php
                require_once "php/procesosCursos/conexion.php";

                $obj= new conectar();
          			$conexion=$obj->conexion();

                $result = $conexion->query("SELECT * FROM instancia ORDER BY instancia_id ASC");

                while($row=mysqli_fetch_array($result)) {
                  echo '<option value="'.htmlspecialchars($row[0]).
                    '">'.htmlspecialchars($row[1]).'</option>';
                }

                mysqli_free_result($result);
                mysqli_close($conn);
              ?>
						</select>
            <!-- Duración -->
						<label for="duracionCurso">Duración</label>
						<input id="duracionCursoEditar" class="form-control input-sm mb-3" type="number" placeholder="Ingresa la duración del Curso" name="duracionEditar" required>
            <!-- Duración -->
						<label for="fechaInicialCurso">Fecha inicial</label>
						<input id="fechaInicialCursoEditar" class="form-control input-sm mb-3" type="date" name="fechaInicialEditar" required>
            <!-- Duración -->
						<label for="fechaFinalCurso">Fecha final</label>
						<input id="fechaFinalCursoEditar" class="form-control input-sm mb-3" type="date" name="fechaFinalEditar" required>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
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

			$.ajax({
				type:"POST",
				data:datos,
				url:"php/procesosCursos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('php/procesosCursos/tabla_cursos.php');
						alertify.success("Curso agregado");
					}else{
						alertify.error("Error el agregar curso");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();
      console.log(datos);

			$.ajax({
				type:"POST",
				data:datos,
				url:"php/procesosCursos/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosCursos/tabla_cursos.php');
						alertify.success("Curso actualizado");
					}else{
						alertify.error("Error al actualizar el curso");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('php/procesosCursos/tabla_cursos.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(codigo){
		$.ajax({
			type:"POST",
			data:"idevento=" + codigo,
			url:"php/procesosCursos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
        $('#idEventoEditar').val(datos['evento_id']);
				$('#nombreCursoEditar').val(datos['nombre']);
				$('#tipoEventoEditar option[value='+datos['tipo_evento']+']').prop('selected', true);
				$('#instanciaEditar option[value='+datos['instancia']+']').prop('selected', true);
				$('#duracionCursoEditar').val(datos['duracion']);
				$('#fechaInicialCursoEditar').val(datos['fecha_inicio']);
				$('#fechaFinalCursoEditar').val(datos['fecha_fin']);
			}
		});
	}

		function eliminarDatos(codigo){
		alertify.confirm('Eliminar curso', '¿Seguro que desea eliminar el curso?', function(){

			$.ajax({
				type:"POST",
				data:"idevento=" + codigo,
				url:"php/procesosCursos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosCursos/tabla_cursos.php');
						alertify.success("Curso eliminado");
					}else{
						alertify.error("Error al eliminar el curso");
					}
				}
			});

		}
		, function(){

		});
	}

</script>
