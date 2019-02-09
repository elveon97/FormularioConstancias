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
	<title>Gestión de cursantes</title>
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
						Gestión de cursantes
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo cursante <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						Gestión de cursantes
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
						<!-- Nombre del Cursante-->
						<label for="codigoCursante">Codigo</label>
						<input id="codigoCursante" class="form-control input-sm mb-3" type="text" placeholder="Ingresa el codigo del Cursante" name="codigo" required>
						<!-- Contraseña-->
						<label for="nombreCursante">Nombre</label>
						<input id="nombreCursante" class="form-control input-sm mb-3" type="text" placeholder="Ingresa el nombre del Cursante" name="nombre" required>
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
					<h5 class="modal-title" id="exampleModalLabel">Editar cursante</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<!-- ID DEL USUARIO, SE MANTENDRA ESCONDIDO, PERO SU VALOR PUEDE SEGUIR SIENDO ACCESADO-->
						<input type="text" hidden="" id="codigoCursanteEditar" name="codigoCursanteEditar">
						<!-- Nombre del Cursante-->
						<label>Nombre cursante</label>
						<input id="nombreEditar" class="form-control input-sm mb-3" type="text" name="nombreEditar" required>
						<!-- Contraseña-->
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
				url:"php/procesosCursantes/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('php/procesosCursantes/tabla_cursantes.php');
						alertify.success("Cursante Agregado");
					}else{
						alertify.error("Error el Agregar Cursante");
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
				url:"php/procesosCursantes/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosCursantes/tabla_cursantes.php');
						alertify.success("Cursante Actualizado");
					}else{
						alertify.error("Error al actualizar el Cursante");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('php/procesosCursantes/tabla_cursantes.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(codigo){
		$.ajax({
			type:"POST",
			data:"codigo=" + codigo,
			url:"php/procesosCursantes/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#codigoCursanteEditar').val(datos['codigo']);
				$('#nombreEditar').val(datos['nombre']);
			}
		});
	}

		function eliminarDatos(codigo){
		alertify.confirm('Eliminar Cursante', '¿Seguro que deseas eliminar al cursante?', function(){

			$.ajax({
				type:"POST",
				data:"codigo=" + codigo,
				url:"php/procesosCursantes/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosCursantes/tabla_cursantes.php');
						alertify.success("Cursante Eliminado");
					}else{
						alertify.error("Error al eliminar el Cursante");
					}
				}
			});

		}
		, function(){

		});
	}

</script>
