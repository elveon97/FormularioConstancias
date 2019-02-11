<?php
  require_once "conexion.php";

  $folio = $_POST['folio'];

  $ret = "0";
  if ( ! trim($folio) == '' ) {
    $obj = new conectar();
    $conexion = $obj -> conexion();

    $result = mysqli_query($conexion, "SELECT * FROM constancia WHERE folio = $folio");

    if ($result) {
      $row = mysqli_fetch_row($result);
      $ret = trim($row[0]) == "" ? 0 : $row[0] ;
    }
  }
  echo trim($ret);
?>
