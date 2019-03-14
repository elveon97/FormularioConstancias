<?php

  require_once "../conexion.php";

  $obj = new conectar();
  $conexion = $obj->conexion();

  $aux1 = $_GET['capacitacion'];
  $sql="SELECT fecha_inicio, fecha_fin, duracion FROM evento WHERE evento_id = '$aux1'";
  $result = mysqli_query($conexion,$sql);
  $ver = mysqli_fetch_row($result);

  $datos=array(
    'fecha_inicio' => $ver[0],
    'fecha_fin' => $ver[1],
    'duracion' => $ver[2]
    );
  echo json_encode($datos);
?>
