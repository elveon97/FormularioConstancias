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

    if ($_SESSION['tipoUsuario'] == '1') {
      header("Location: errorAcceso.php");
      die();
    }

    require_once "php/conexion.php";
    require_once "php/crud_reportes.php";
    $objRepo = new consultasReportes();
    $result = $objRepo -> reporteCursante($_GET['codigo']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reporte por cursante</title>
  <meta charset="utf-8">

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
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
            },
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
  <a href="adminIndex.php" class="btn btn btn-link">
    <span class="fa fa-arrow-circle-left" style="margin-right: 5px;"></span>
    Volver al Panel del Administrador
  </a>
  <div class="row">
    <div class="col-lg">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Reporte por cursante <small>(<?php echo $_GET['codigo']; ?>)</small></h2>
          <div class="card-body">
            <table id="tabla" class="display nowrap">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Capacitación</th>
                            <th>Instancia</th>
                            <th>Número de horas</th>
                            <th>Cursante</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha final</th>
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
                          <td><?php echo $mostrar[5]; ?></td>
                          <td><?php echo $mostrar[6]; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Folio</th>
                            <th>Capacitación</th>
                            <th>Instancia</th>
                            <th>Número de horas</th>
                            <th>Cursante</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha final</th>
                        </tr>
                    </tfoot>
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
