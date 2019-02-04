<?php

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="call crear_cursante('$datos[0]', '$datos[1]', @out)";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($codigo){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="select codigo,nombre from cursante where codigo = '$codigo'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'codigo' => $ver[0],
				'nombre' => $ver[1]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE cursante set 	nombre='$datos[1]'
						where codigo='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($codigo){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from cursante where codigo = '$codigo'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>
