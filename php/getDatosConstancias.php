<?php

if($_POST){
  require_once "conexion.php";

  //Se reciben los parametros por _$POST
  $folio = $_POST['folio'];

  $obj = new conectar();
  $conexion = $obj -> conexion();

  $result = mysqli_query($conexion, "SELECT constancia.folio, evento.nombre, cursante.nombre, instancia.nombre, evento.fecha_inicio, evento.fecha_fin, evento.duracion, comentario , evento.evento_id FROM (((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN cursante ON constancia.cursante = cursante.codigo) INNER JOIN instancia ON evento.instancia = instancia.instancia_id) WHERE folio = $folio");

  //El resultado de la consulta SQL se convertira a un array llamado $mostrar, en cada posicion del array se encuentra el valor de un campo...
  $auxMostrar=mysqli_fetch_row($result);

  $mostrar = $auxMostrar;
  //Obtener el ID del evento!
  $result2 = mysqli_query($conexion,"SELECT evento_id from evento where nombre = '$mostrar[1]'");
  $mostrar2 = mysqli_fetch_row($result2);

  //Se usara la siguiente variable para enviar "True" o "False" si el directorio existe o no y poder mostrar un mensaje al usuario!
  $varExisteDir;
  //El ID del evento relacionado con la constancia se encuentrea en
  if (is_dir("../archivosValidarCurso/" . $mostrar[8])) $varExisteDir = "True";
  else $varExisteDir = "False";

	echo json_encode(array("folio"=>$folio, "nombreEvento"=>$mostrar[1], "nombreCursante" =>$mostrar[2], "nombreInstancia" =>$mostrar[3], "fechaInicio" =>$mostrar[4], "fechaFin" =>$mostrar[5], "duracion" =>$mostrar[6], "comentarios" =>$mostrar[7],"idEvento"=>$mostrar2[0], "existeDir"=>$varExisteDir));
}

 ?>
