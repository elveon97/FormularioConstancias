<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "php/gestionScripts.php";  ?>
</head>
<body>
	<div class="container pt-1">
		<img src="img/logo.jpg" alt="CUSur" class="mb-5">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left" style="box-shadow: 0px 0px 10px rgba(0,0,0,1);">
					<div class="card-header">
						Gestión de Tipo de Eventos
					</div>
          <div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar Nuevo Tipo de Evento <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						Gestión de Tipo de Evento
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
					<h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Tipo de Evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<!-- Nombre del Tipo de Evento-->
						<label for="nombreTipoDeEvento">Nombre Tipo de Evento</label>
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
					<h5 class="modal-title" id="exampleModalLabel">Editar Tipo de Evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<!-- ID DEL USUARIO, SE MANTENDRA ESCONDIDO, PERO SU VALOR PUEDE SEGUIR SIENDO ACCESADO-->
						<input type="text" hidden="" id="idtipoevento" name="idtipoevento">
						<!-- Nombre del Tipo de Evento-->
						<label>Nombre Tipo de Evento</label>
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
						alertify.success("Tipo de Evento Agregado");
					}else{
						alertify.error("Error el Agregar Tipo de Evento");
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
						alertify.success("Tipo de Evento Actualizado");
					}else{
						alertify.error("Error al actualizar el Tipo de Evento");
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
		alertify.confirm('Eliminar Tipo de Evento', '¿Seguro que deseas eliminar el Tipo de Evento?', function(){

			$.ajax({
				type:"POST",
				data:"idtipoevento=" + idtipoevento,
				url:"php/procesosTipoDeEventos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosTipoDeEventos/tabla_tipo_evento.php');
						alertify.success("Tipo de Evento Eliminado");
					}else{
						alertify.error("Error al eliminar el Tipo de Evento");
					}
				}
			});

		}
		, function(){

		});
	}

</script>
