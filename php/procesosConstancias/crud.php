<?php

	class crud{
		public function obtenDatos($folio){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="select * from constancia where folio = '$folio'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'folio' => $ver[0],
				'evento' => $ver[1],
				'cursante' => $ver[2],
				'fecha_emision' => $ver[3],
				'comentario' => $ver[4]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE constancia set evento = '$datos[1]',
								cursante = '$datos[2]',
			 					fecha_emision='$datos[3]',
										comentario='$datos[4]'
						where folio=$datos[0]";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($folio){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from constancia where folio = '$folio'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>
