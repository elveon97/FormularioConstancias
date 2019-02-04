<?php

	require_once "conexion.php";
	require_once "crud.php";

	$obj= new crud();

	echo $obj->eliminar($_POST['codigo']);

 ?>
