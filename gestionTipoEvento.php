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
	<title>Gestión de tipos de evento</title>
	<?php require_once "php/gestionScripts.php";  ?>
</head>
<body>
	<div class="container pt-1">
		<img src="img/logo.jpg" alt="CUSur" class="mb-5">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left" style="box-shadow: 0px 0px 10px rgba(0,0,0,1);">
					<div class="card-header">
						Gestión de Tipos de Evento
					</div>
          <div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo tipo de evento <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						Gestión de tipo de evento
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
					<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo tipo de evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<!-- Nombre del Tipo de Evento-->
						<label for="nombreTipoDeEvento">Nombre tipo de evento</label>
						<input id="nombreTipoDeEvento" class="form-control input-sm mb-3" type="text" placeholder="Ingresa el nombre del Tipo de Evento" name="nombre" required>
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
					<h5 class="modal-title" id="exampleModalLabel">Editar tipo de evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<!-- ID DEL USUARIO, SE MANTENDRA ESCONDIDO, PERO SU VALOR PUEDE SEGUIR SIENDO ACCESADO-->
						<input type="text" hidden="" id="idtipoevento" name="idtipoevento">
						<!-- Nombre del Tipo de Evento-->
						<label>Nombre tipo de evento</label>
						<input id="nombreEditar" class="form-control input-sm mb-3" type="text" name="nombreEditar" required>
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
				url:"php/procesosTipoDeEventos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('php/procesosTipoDeEventos/tabla_tipo_evento.php');
						alertify.success("Tipo de evento agregado");
					}else{
						alertify.error("Error el agregar tipo de evento");
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
				url:"php/procesosTipoDeEventos/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosTipoDeEventos/tabla_tipo_evento.php');
						alertify.success("Tipo de evento actualizado");
					}else{
						alertify.error("Error al actualizar el tipo de evento");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('php/procesosTipoDeEventos/tabla_tipo_evento.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idtipoevento){
		$.ajax({
			type:"POST",
			data:"idtipoevento=" + idtipoevento,
			url:"php/procesosTipoDeEventos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idtipoevento').val(datos['tipo_evento_id']);
				$('#nombreEditar').val(datos['nombre']);
			}
		});
	}

		function eliminarDatos(idtipoevento){
		alertify.confirm('Eliminar tipo de evento', '¿Seguro que desea eliminar el tipo de evento?', function(){

			$.ajax({
				type:"POST",
				data:"idtipoevento=" + idtipoevento,
				url:"php/procesosTipoDeEventos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosTipoDeEventos/tabla_tipo_evento.php');
						alertify.success("Tipo de evento eliminado");
					}else{
						alertify.error("Error al eliminar el tipo de evento");
					}
				}
			});

		}
		, function(){

		});
	}

</script>
