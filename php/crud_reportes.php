<?php
    class consultasReportes{
        public function reporteFechas($fechainicial, $fechafinal) {
            $obj = new conectar();
            $conexion = $obj -> conexion();

            $sql = "SELECT constancia.folio, evento.nombre, instancia.nombre, evento.duracion, cursante.nombre, fecha_inicio, fecha_fin FROM ((((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN instancia ON evento.instancia = instancia.instancia_id) INNER JOIN tipo_evento ON evento.tipo_evento = tipo_evento.tipo_evento_id) INNER JOIN cursante ON constancia.cursante = cursante.cursante_id) WHERE constancia.fecha_emision BETWEEN '$fechainicial' AND '$fechafinal'";

            return mysqli_query($conexion,$sql);

        }

        public function reporteCursante($codigo) {
            $obj = new conectar();
            $conexion = $obj -> conexion();

            $sql = "SELECT constancia.folio, evento.nombre, instancia.nombre, evento.duracion, cursante.nombre, fecha_inicio, fecha_fin FROM ((((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN instancia ON evento.instancia = instancia.instancia_id) INNER JOIN tipo_evento ON evento.tipo_evento = tipo_evento.tipo_evento_id) INNER JOIN cursante ON constancia.cursante = cursante.cursante_id) WHERE cursante.codigo = '".$codigo."'";

            return mysqli_query($conexion,$sql);
        }

        function reporteCurso($nombreCurso) {
            $obj = new conectar();
            $conexion = $obj -> conexion();

            $sql = "SELECT constancia.folio, evento.nombre, instancia.nombre, evento.duracion, cursante.nombre, fecha_inicio, fecha_fin FROM ((((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN instancia ON evento.instancia = instancia.instancia_id) INNER JOIN tipo_evento ON evento.tipo_evento = tipo_evento.tipo_evento_id) INNER JOIN cursante ON constancia.cursante = cursante.cursante_id) WHERE evento_id = $nombreCurso";

            return mysqli_query($conexion,$sql);
        }

    }//Cierre clase consultasReportes

?>
