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
						Gestión de Usuarios
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar Nuevo Usuario <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						Gestión de Usuario
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
					<h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<!-- Nombre del Usuario-->
						<label for="nombreUsuario">Nombre Usuario</label>
						<input id="nombreUsuario" class="form-control input-sm mb-3" type="text" placeholder="Ingresa el nombre del Usuario" name="usuario" required>
						<!-- Contraseña-->
						<label for="contrasenaUsuario">Contraseña</label>
						<input id="contrasenaUsuario" class="form-control input-sm mb-3" type="password" placeholder="Ingresa la contraseña del Usuario" name="password" required>
						<!-- email del Usuario-->
						<label for="emailUsuario">Email Usuario</label>
						<input id="emailUsuario" class="form-control input-sm mb-3" type="email" placeholder="Ingresa el email del Usuario" name="email" required>
						<!-- Tipo Usuario-->
						<label for="tipoUsuario">Tipo Usuario</label>
						<select name="tipoUsuario" class="form-control mb-2">
							<option value="1">Usuario Normal</option>
							<option value="0">Administrador</option>
						</select>
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
						<select id="tipoUEditar" name="tipoUsuarioEditar" class="form-control mb-2">
							<option value="1">Usuario Normal</option>
							<option value="0">Administrador</option>
						</select>
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
				url:"php/procesosUsuarios/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('php/procesosUsuarios/tabla_usuarios.php');
						alertify.success("Usuario Agregado");
					}else{
						alertify.error("Error el Agregar Usuario");
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
				url:"php/procesosUsuarios/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosUsuarios/tabla_usuarios.php');
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
		$('#tablaDatatable').load('php/procesosUsuarios/tabla_usuarios.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idusuario){
		$.ajax({
			type:"POST",
			data:"idusuario=" + idusuario,
			url:"php/procesosUsuarios/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idusuario').val(datos['usuario_id']);
				$('#usuarioEditar').val(datos['username']);
				$('#passwordEditar').val(datos['password']);
				$('#emailEditar').val(datos['email']);
				if (datos['tipo_usuario'] == 0) {
					$('#tipoUEditar option[value=0]').prop('selected', true);
				} else {
					$('#tipoUEditar option[value=1]').prop('selected', true);
				}
			}
		});
	}

		function eliminarDatos(idusuario){
		alertify.confirm('¿Seguro que deseas eliminar el usuario?', function(){

			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"php/procesosUsuarios/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('php/procesosUsuarios/tabla_usuarios.php');
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
