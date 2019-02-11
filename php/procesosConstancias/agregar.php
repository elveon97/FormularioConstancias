<?php
	require_once "../conexion.php";
	require_once "crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombre'],
		$_POST['tipoEvento'],
		$_POST['instancia'],
		$_POST['duracion'],
		$_POST['fechaInicial'],
		$_POST['fechaFinal']
				);

	echo $obj->agregar($datos);


 ?>
