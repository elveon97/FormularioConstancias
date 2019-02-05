<?php
  require_once "procesosUsuarios/conexion.php";

  public function reporteFechas($fechainicial, $fechafinal) {
    $obj = new conectar();
    $conexion = $obj -> conexion();

    $sql = "SELECT constancia.folio, evento.nombre, tipo_evento.nombre, cursante.nombre, instancia.nombre, fecha_inicio, fecha_fin FROM ((((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN instancia ON evento.instancia = instancia.instancia_id) INNER JOIN tipo_evento ON evento.tipo_evento = tipo_evento.tipo_evento_id) INNER JOIN cursante ON constancia.cursante = cursante.codigo)";

    return mysqli_query($conexion,$sql);
  }

  public function reporteCursante($codigo) {
    $obj = new conectar();
    $conexion = $obj -> conexion();

    $sql = "SELECT constancia.folio, evento.nombre, tipo_evento.nombre, cursante.nombre, instancia.nombre, fecha_inicio, fecha_fin FROM ((((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN instancia ON evento.instancia = instancia.instancia_id) INNER JOIN tipo_evento ON evento.tipo_evento = tipo_evento.tipo_evento_id) INNER JOIN cursante ON constancia.cursante = cursante.codigo) WHERE cursante.codigo = '".$codigo."'";

    return mysqli_query($conexion,$sql);
  }

?>
