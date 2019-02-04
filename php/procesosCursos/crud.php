<?php

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="call crear_evento($datos[1], $datos[2], '$datos[0]', $datos[3], '$datos[4]', '$datos[5]', @out)";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idevento){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="select evento_id,nombre,tipo_evento,instancia,duracion,fecha_inicio,fecha_fin from evento where evento_id = '$idevento'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'evento_id' => $ver[0],
				'nombre' => $ver[1],
				'tipo_evento' => $ver[2],
				'instancia' => $ver[3],
				'duracion' => $ver[4],
				'fecha_inicio' => $ver[5],
				'fecha_fin' => $ver[6]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE evento set nombre='$datos[1]',
										tipo_evento=$datos[2],
										instancia=$datos[3],
										duracion=$datos[4],
										fecha_inicio ='$datos[5]',
										fecha_fin ='$datos[6]'
						where evento_id=$datos[0]";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($idevento){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from evento where evento_id = '$idevento'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>
