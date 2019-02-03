<?php 

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="call crear_usuario('$datos[0]', '$datos[1]', '$datos[2]', $datos[3], @out)";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idusuario){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="select usuario_id,username,password,email,tipo_usuario from usuario where usuario_id = '$idusuario'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'usuario_id' => $ver[0],
				'username' => $ver[1],
				'password' => $ver[2],
				'email' => $ver[3],
				'tipo_usuario' => $ver[4]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE usuario set 	username='$datos[1]',
										password='$datos[2]',
										email='$datos[3]',
										tipo_usuario='$datos[4]'
						where usuario_id='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($idusuario){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from usuario where usuario_id = '$idusuario'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>