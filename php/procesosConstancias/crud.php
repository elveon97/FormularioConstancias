<?php

	class crud{
		public function obtenDatos($folio){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="select folio, constancia.evento, evento.fecha_inicio, evento.fecha_fin, constancia.fecha_emision, evento.duracion, cursante, comentario from constancia inner join evento on constancia.evento = evento.evento_id where folio = '$folio'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'folio' => $ver[0],
				'evento' => $ver[1],
				'fecha_inicio' => $ver[2],
				'fecha_fin' => $ver[3],
				'fecha_emision' => $ver[4],
				'duracion' => $ver[5],
				'cursante' => $ver[6],
				'comentario' => $ver[7]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE constancia set evento = '$datos[1]',
								cursante = '$datos[6]',
										comentario='$datos[7]',
										fecha_emision='$datos[4]'
						where folio=$datos[0]";
			mysqli_query($conexion,$sql);

			$sql = "UPDATE evento set fecha_inicio = '$datos[2]',
				fecha_fin = '$datos[3]', duracion = '$datos[5]'
				where evento_id = '$datos[1]'";
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
