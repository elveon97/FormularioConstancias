<?php

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="insert into instancia (nombre) values('$datos[0]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idinstancia){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="select * from instancia where instancia_id = '$idinstancia'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'instancia_id' => $ver[0],
				'nombre' => $ver[1]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE instancia set 	nombre='$datos[1]'
						where instancia_id='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($idinstancia){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from instancia where instancia_id = '$idinstancia'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>
