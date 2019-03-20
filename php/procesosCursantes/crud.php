<?php

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT INTO cursante VALUES(default, '$datos[0]', '$datos[1]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($id){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="select * from cursante where cursante_id = '$id'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id' => $ver[0],
				'codigo' => $ver[1],
				'nombre' => $ver[2]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE cursante set nombre='$datos[1]'
						where cursante_id='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($id){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from cursante where cursante_id = '$id'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>
