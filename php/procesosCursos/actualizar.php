<?php
	require_once "../conexion.php";
	require_once "crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['idEventoEditar'],
		$_POST['nombreEditar'],
		$_POST['tipoEventoEditar'],
		$_POST['instanciaEditar'],
		$_POST['duracionEditar'],
		$_POST['fechaInicialEditar'],
		$_POST['fechaFinalEditar']
				);

	echo $obj->actualizar($datos);

 ?>
