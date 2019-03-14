<?php
	require_once "../conexion.php";
	require_once "crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['folio'],
		$_POST['capacitacion'],
		$_POST['fecha_inicio'],
		$_POST['fecha_final'],
		$_POST['horas'],
		$_POST['cursante'],
		$_POST['comentarios']
				);

	echo $obj->actualizar($datos);

 ?>
