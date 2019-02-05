<?php
	require_once "../../PHP/conexion.php";
	require_once "../crud_reportes.php";
	$obj= new consultasReportes();

    $datos=array(
            $_POST['fechaInicial'],
            $_POST['fechaFinal'],
                );

	echo json_encode($obj->reporteFechas($datos));

 ?>
