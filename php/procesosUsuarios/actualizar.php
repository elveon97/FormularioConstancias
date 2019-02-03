<?php
	require_once "conexion.php";
	require_once "crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['idusuario'],
		$_POST['usuarioEditar'],
		$_POST['passwordEditar'],
		$_POST['emailEditar'],
		$_POST['tipoUsuarioEditar']
				);

	echo $obj->actualizar($datos);

 ?>
