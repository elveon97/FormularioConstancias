<?php
    class consultasReportes{
        public function reporteFechas($datos) {
            $obj = new conectar();
            $conexion = $obj -> conexion();

            $sql = "SELECT constancia.folio, evento.nombre, tipo_evento.nombre, cursante.nombre, instancia.nombre, fecha_inicio, fecha_fin FROM ((((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN instancia ON evento.instancia = instancia.instancia_id) INNER JOIN tipo_evento ON evento.tipo_evento = tipo_evento.tipo_evento_id) INNER JOIN cursante ON constancia.cursante = cursante.codigo) WHERE constancia.fecha_emision BETWEEN '$datos[0]' AND '$datos[1]'";
            
            $result = mysqli_query($conexion,$sql);

            $datos = "";
            while($row =  mysqli_fetch_array($result){
                $datos[0] = $row[0];
            }
            
			return $datos;
        }
        
        public function reporteCursante($codigo) {
            $obj = new conectar();
            $conexion = $obj -> conexion();

            $sql = "SELECT constancia.folio, evento.nombre, tipo_evento.nombre, cursante.nombre, instancia.nombre, fecha_inicio, fecha_fin FROM ((((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN instancia ON evento.instancia = instancia.instancia_id) INNER JOIN tipo_evento ON evento.tipo_evento = tipo_evento.tipo_evento_id) INNER JOIN cursante ON constancia.cursante = cursante.codigo) WHERE cursante.codigo = '".$codigo."'";

            return mysqli_query($conexion,$sql);
        }

        function reporteCurso($nombreCurso) {
            $obj = new conectar();
            $conexion = $obj -> conexion();

            $sql = "SELECT constancia.folio, evento.nombre, tipo_evento.nombre, cursante.nombre, instancia.nombre, fecha_inicio, fecha_fin FROM ((((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN instancia ON evento.instancia = instancia.instancia_id) INNER JOIN tipo_evento ON evento.tipo_evento = tipo_evento.tipo_evento_id) INNER JOIN cursante ON constancia.cursante = cursante.codigo) WHERE UPPER(TRIM(evento.nombre)) = UPPER(TRIM('".$nombreCurso."'))";

            return mysqli_query($conexion,$sql);
        }
        
    }//Cierre clase consultasReportes

?>
