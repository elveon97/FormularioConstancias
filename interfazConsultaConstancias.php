<?php
    //Codigo para validar que esta pagina pueda ser visualizada solamente si existe una sesión previamente iniciada!

    //Codigo para validar que esta pagina pueda ser visualizada solamente si existe una sesión previamente iniciada!

    session_start();
    error_reporting(0);
    $varSesion = $_SESSION['usuario'];

    //Habilitar la siguiente linea cuando se de por concluido el desarrollo de esta pagina, esto con el fin de que no se muestren errores de php

    if($varSesion == null || $varSesion = ''){
        header("Location: errorInicioSesion.php");
        die();
    }
    require_once "php/conexion.php";

    //Se reciben los parametros por _$GET
    $folio = $_GET['folio'];

    $obj = new conectar();
    $conexion = $obj -> conexion();

    $result = mysqli_query($conexion, "SELECT constancia.folio, evento.nombre, cursante.nombre, fecha_emision, comentario FROM ((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN cursante ON constancia.cursante = cursante.codigo) WHERE folio = $folio");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Resultado busqueda constancias</title>
  <meta charset="utf-8">

  <!-- Descargar las librerias necesarias para que se realicen los reportes y no se requiera estar conectado a internet! -->


  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/font-awesome.css">

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
        $('#tabla').DataTable( {
            "language": {
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "",
                  "sLast":     "",
                  "sNext":     "",
                  "sPrevious": ""
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
            },
            "searching": false,
            "bPaginate": false,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        } );
    } );
  </script>

</head>
<body>
<div class="container">
  <div class="row">
    <img src="img/logo.jpg" alt="CUSur" class="mb-5">
  </div>
  <a href="formulario.php" class="btn btn btn-link">
    <span class="fa fa-arrow-circle-left" style="margin-right: 5px;"></span>
    Volver al formulario
  </a>
  <div class="row">

    <div class="col-lg">
      <div class="card">
        <div class="card-header">

          <div class="card-body">
            <table id="tabla" class="display nowrap">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Nombre capacitación</th>
                            <th>Nombre cursante</th>
                            <th>Fecha emisión constancia</th>
                            <th>Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>

                    	<?php
                			while ($mostrar=mysqli_fetch_row($result)) {
                			?>
                        <tr>
                          <td><?php
                            while(strlen($mostrar[0]) < 8) $mostrar[0] = "0" . $mostrar[0];
                            echo $mostrar[0]
                          ?></td>
                          <td><?php echo $mostrar[1]; ?></td>
                          <td><?php echo $mostrar[2]; ?></td>
                          <td><?php echo $mostrar[3]; ?></td>
                          <td><?php echo $mostrar[4]; ?></td>

                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

</div>

</body>
</html>
