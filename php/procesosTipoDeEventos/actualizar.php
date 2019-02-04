<?php
	require_once "conexion.php";
	require_once "crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['idtipoevento'],
		$_POST['nombreEditar'],		
				);

	echo $obj->actualizar($datos);

 ?>
