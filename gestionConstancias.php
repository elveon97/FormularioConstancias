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
	<title>Gestión de constancias</title>
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
						Gestión de constancias
					</div>
					<div class="card-body">
            <a href="formulario.php" class="btn btn-primary">
							Agregar nueva constancia <span class="fa fa-plus-circle"></span>
						</a>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						Gestión de constancias
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar constancia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
            <input type="text" hidden="" id="folio" name="folio">
						<!-- Fecha de emisión -->
						<label for="fechaEmision">Fecha de emisión</label>
						<input id="fechaEmision" class="form-control input-sm mb-3" type="date" placeholder="Ingresa el nombre del Constancia" name="fechaEmision" required>
            <!-- Comentarios -->
						<label for="comentarios">Comentarios</label>
						<textarea id="comentarios" class="form-control input-sm mb-3" type="date" placeholder="Ingresa el nombre del Constancia" name="comentarios" required></textarea>
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
      console.log(datos);

			$.ajax({
				type:"POST",
				data:datos,
				url:"php/procesosConstancias/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('php/procesosConstancias/tabla_constancias.php');
						alertify.success("Constancia agregada");
					}else{
						alertify.error("Error al agregar constancia");
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
				url:"php/procesosConstancias/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosConstancias/tabla_constancias.php');
						alertify.success("Constancia actualizada");
					}else{
						alertify.error("Error al actualizar la constancia");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('php/procesosConstancias/tabla_constancias.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(folio){
		$.ajax({
			type:"POST",
			data:"folio=" + folio,
			url:"php/procesosConstancias/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
        $('#folio').val(datos['folio']);
        $('#fechaEmision').val(datos['fecha_emision']);
				$('#comentarios').val(datos['comentario']);
			}
		});
	}

		function eliminarDatos(folio){
		alertify.confirm('Eliminar constancia', '¿Seguro que desea eliminar la constancia?', function(){

			$.ajax({
				type:"POST",
				data:"folio=" + folio,
				url:"php/procesosConstancias/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosConstancias/tabla_constancias.php');
						alertify.success("Constancia eliminada");
					}else{
						alertify.error("Error al eliminar la constancia");
					}
				}
			});

		}
		, function(){

		});
	}

</script>
