<?php

if($_POST){
  require_once "conexion.php";

  //Se reciben los parametros por _$POST
  $folio = $_POST['folio'];

  $obj = new conectar();
  $conexion = $obj -> conexion();

  $result = mysqli_query($conexion, "SELECT constancia.folio, evento.nombre, cursante.nombre, instancia.nombre, fecha_emision, comentario FROM (((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN cursante ON constancia.cursante = cursante.codigo) INNER JOIN instancia ON evento.instancia = instancia.instancia_id) WHERE folio = $folio");

  //El resultado de la consulta SQL se convertira a un array llamado $mostrar, en cada posicion del array se encuentra el valor de un campo...
  $mostrar=mysqli_fetch_row($result);


	echo json_encode(array("folio"=>$folio, "nombreEvento"=>$mostrar[1], "nombreCursante" =>$mostrar[2], "nombreInstancia" =>$mostrar[3], "fechaEmision" =>$mostrar[4], "comentarios" =>$mostrar[5]));
}

 ?>
