<?php
	require_once "../conexion.php";
	require_once "crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['folio'],
		$_POST['capacitacion'],
		$_POST['cursante'],
		$_POST['fechaEmision'],
		$_POST['comentarios']
				);

	echo $obj->actualizar($datos);

 ?>
