<?php

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="call crear_tipo_evento('$datos[0]', @out)";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idtipoevento){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="select * from tipo_evento where tipo_evento_id = '$idtipoevento'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'tipo_evento_id' => $ver[0],
				'nombre' => $ver[1]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE tipo_evento set 	nombre='$datos[1]'
						where tipo_evento_id='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($idtipoevento){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from tipo_evento where tipo_evento_id = '$idtipoevento'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>
