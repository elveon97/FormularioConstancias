<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php";  ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Gestion de Usuarios
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar Nuevo Usario <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						Gestion de Usuario
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
					<h5 class="modal-title" id="exampleModalLabel">Agrega Nuevo Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<!-- Nombre del Usuario-->
						<label for="nombreUsuario">Nombre Usuario</label>
						<input id="nombreUsuario" class="form-control input-sm" type="text" placeholder="Ingresa el nombre del Usuario" name="usuario" required>
						<!-- Contraseña-->
						<label for="contrasenaUsuario">Contraseña</label>
						<input id="contrasenaUsuario" class="form-control input-sm" type="password" placeholder="Ingresa la contraseña del Usuario" name="password" required>
						<!-- email del Usuario-->
						<label for="emailUsuario">Email Usuario</label>
						<input id="emailUsuario" class="form-control input-sm" type="email" placeholder="Ingresa el email del Usuario" name="email" required>
						<!-- Tipo Usuario-->
						<label for="tipoUsuario">Tipo Usuario</label>
						<input id="tipoUsuario" class="form-control input-sm" type="text" placeholder="Ingresa el Tipo de Usuario" name="tipoUsuario" required> 
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
					<h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<!-- ID DEL USUARIO, SE MANTENDRA ESCONDIDO, PERO SU VALOR PUEDE SEGUIR SIENDO ACCESADO-->
						<input type="text" hidden="" id="idusuario" name="idusuario">
						<!-- Nombre del Usuario-->
						<label>Nombre Usuario</label>
						<input id="usuarioEditar" class="form-control input-sm" type="text" name="usuarioEditar" required>
						<!-- Contraseña-->
						<label>Contraseña</label>
						<input id="passwordEditar" class="form-control input-sm" type="password" name="passwordEditar" required>
						<!-- email del Usuario-->
						<label>Email Usuario</label>
						<input id="emailEditar" class="form-control input-sm" type="email" name="emailEditar" required>
						<!-- Tipo Usuario-->
						<label>Tipo Usuario</label>
						<input id="tipoUsuarioEditar" class="form-control input-sm" type="text" name="tipoUsuarioEditar" required> 
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
				url:"procesos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Usuario Agregado");
					}else{
						alertify.error("Error el Agregar Usuario");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Usuario Actualizado");
					}else{
						alertify.error("Error al actualizar el Usuario");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idusuario){
		$.ajax({
			type:"POST",
			data:"idusuario=" + idusuario,
			url:"procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idusuario').val(datos['usuario_id']);
				$('#usuarioEditar').val(datos['username']);
				$('#passwordEditar').val(datos['password']);
				$('#emailEditar').val(datos['email']);
				$('#tipoUsuarioEditar').val(datos['tipo_usuario']);
			}
		});
	}
	
		function eliminarDatos(idusuario){
		alertify.confirm('¿Seguro que deseas eliminar el usuario?', function(){ 

			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"procesos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Usuario Eliminado");
					}else{
						alertify.error("Error al eliminar el Usuario");
					}
				}
			});

		}
		, function(){

		});
	}

</script>