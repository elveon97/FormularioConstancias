<?php
	require_once "conexion.php";
	require_once "crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['codigo'],
		$_POST['nombre'],
				);

	echo $obj->agregar($datos);


 ?>
