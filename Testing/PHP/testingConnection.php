<?php
    
    $usser = "root";
    $password = "";
    $server = "localhost";
    $database = "constancias";

    //crear la variable $conexion, la cual se usará para conectar al servidor
	$conexion = mysqli_connect($server,$usser,$password) or die("No se pudo conectar al servidor");

	//una vez conectado al servidor, hacer la conexión a la base de datos
	$db = mysqli_select_db($conexion,$database) or die("No se pudo conectar a la base de datos");

 
	//Crear una variable con la consulta que se realizará
	$consultaUsuarios = "SELECT * FROM usuario";

	//Ejecutar la consulta
	$resultado = mysqli_query($conexion,$consultaUsuarios) or die ("Error al ejecutar la consulta");

	//Mostrar los datos de la consulta
	while($columna = mysqli_fetch_array($resultado)){
		echo "ID Usuario: ".$columna[0]."<br>"; 
		echo "Usuario: ".$columna[1]."<br>"; 
		echo "Contraseña: ".$columna[2]."<br>"; 
		echo "Email: ".$columna[3]."<br>"; 
		echo "Tipo Usuario: ".$columna[4]."<br>"; 
		echo "<br>"."<br>";
	}

	/*	
		Para mostrar los datos de una consulta:
		Se deben de recorrer los campos de cada registro obtenido.

		Para que funcione correctamente, se debe de imprimir cada campo de los registros obtenidos
		La manera de realizarlo es así:
		
			while($columna = mysqli_fetch_array($resultado)){
				echo "Campo1: ".$columna[0]."<br>"; 
			}


		Dado que la variable $columna se convierte en un array, recordar que el primer valor se encuentra en la posición 0
		

	*/



?>
     