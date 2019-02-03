<?php
  require("connection.php");

  $control = $_POST["control"];
  $busqueda = $_POST["busqueda"];

  $query = "";

  if ($control == 0) {
    $query = "SELECT * FROM evento WHERE UPPER(TRIM(nombre)) = UPPER(TRIM('".$busqueda."'))";
  } else {
    $query = "SELECT * FROM cursante WHERE UPPER(TRIM(codigo)) = UPPER(TRIM('".$busqueda."'))";
  }

  $conn = getConnection();
  $conn -> query("SET NAMES utf8");

  $response = $conn->query($query);
  $row = mysqli_fetch_array($response);
  $salida = "";

  for ($i = 0; $i<count($row)/2; $i++) {
    $salida = $salida . $row[$i] . ";";
  }

  echo $salida;
?>
