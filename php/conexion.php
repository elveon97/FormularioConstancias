

<?php
	// 148.202.119.45
	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('localhost',
										'root',
										'',
										'constancias');

			//Para que acepte caracteres especiales
			$conexion -> set_charset('utf8');
			return $conexion;
		}
	}


 ?>
