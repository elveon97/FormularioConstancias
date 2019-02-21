<!--
Buscar iconos para la version 4.0 de fontaweso [Version que se maneja en este sistema]
https://fontawesome.com/v4.7.0/icons/
-->

<?php
require_once "php/conexion.php";
$obj = new conectar();
$conexion = $obj -> conexion();

if($_POST){
  //Se reciben los parametros por _$GET
  $folio = $_POST['folio'];
  $result = mysqli_query($conexion, "SELECT constancia.folio, evento.nombre, cursante.nombre, fecha_emision, comentario FROM ((constancia INNER JOIN evento ON constancia.evento = evento.evento_id) INNER JOIN cursante ON constancia.cursante = cursante.codigo) WHERE folio = $folio");
}
?>
<!DOCTYPE html>

<html>

<head>
  <meta name="author" content="PracticantesServicioSocial">
  <meta charset="utf-8">

  <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/bootstrap.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

  <script src="librerias/jquery.min.js"></script>
  <script src="librerias/bootstrap/popper.min.js"></script>
  <script src="librerias/bootstrap/bootstrap.min.js"></script>
  <script src="librerias/alertify/alertify.js"></script>

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>



  <script type="text/javascript">
  function visualizar(id){

    location.href="visorPdf.php?nombrePdf=archivosValidarCurso/"+id+"/validarCurso"+id+".pdf";
  }

  $(document).ready(function(){
    //Cuando se clicke el boton para buscar la constancia...
    $("#btnBuscarConstancia").click(function(){
      //Obtener el folio de la constancia
      var folioJS = $("#folioConstancia").val();
      if(folioJS == '') {
        alertify.error("Ingresa el folio de la constancia");
        $("#resultadoBusquedaConstancia").css("display", "none");
      }
      else{
        //Si el campo de la constancia no esta vacio hacer la busqueda de la constancia
        //Enviar al archivo consultarConstancia.php el folio para validar que existe la constancia...
        $.post("php/consultarConstancia.php", {"folio":folioJS}, function(data){
          //En el valor data se encuentra el resultado del json despues de haber sido procesado por el archivo consultarConstancia.
          if(data == 0){
            alertify.error("El folio de la constancia ingresado no se encuentra en la base de datos");
            $("#folioConstancia").val("");
            $("#resultadoBusquedaConstancia").css("display", "none");
          }
          else{
            $.post("php/getDatosConstancias.php", {"folio":data}, function(data){

              //Cargarle los datos a la tabla!
              //En el ultimo <td> es donde debería hacerse la validacion de si el directorio existe! :v
              
              while (data.folio.length < 8) data.folio = "0" + data.folio;
              $("#cuerpoTabla").html("");
              var tr = `<tr>
                <td>`+data.folio+`</td>
                <td>`+data.nombreEvento+`</td>
                <td>`+data.nombreCursante+`</td>
                <td>`+data.nombreInstancia+`</td>
                <td>`+data.fechaEmision+`</td>
                <td>`+data.comentarios+`</td>
                <td>

                    <span class="btn btn-primary btn-sm" onclick="visualizar('`+data.idEvento+`')">
                        <span class="fa fa-file"></span>
                    </span>

                </td>
              </tr>`;
              $("#cuerpoTabla").append(tr)

            },"json");
            //Mostrar el container de la tabla si el folio ingresado si se encuentra en la base de datos...
            $("#resultadoBusquedaConstancia").css("display", "block");
          }
        },"json");
      }//Cierre else

    });

    $('#tabla').DataTable({
      "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "",
        "sInfoEmpty":      "",
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
    });

  });



  </script>

  <title>Página de Inicio</title>

</head>

<body>

  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-4">
        <img src="img/logo.jpg" alt="CUSur">
      </div>
      <div class="col-2">
        <!-- Substituir la referencia de index.php por el nombre final que tendra el archivo del login -->
        <a href="loguin.php" class="btn btn-info">
          <span class="fa fa-sign-in mr-1"></span>
          Iniciar Sesión
        </a>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="row justify-content-center">
      <div class="col-4">
        <h3><span class="badge">Libro digital de constancias CUSUR</span></h3>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="w-75 col-8">
        <span class="text-justify">En el presente sistema encontraras registrados el total de reconocimientos,diplomas y Constancias
          emitidos en las diferentes dependencias del Centro Universitario del Sur, con el fin de consulta
          y validación de las mismas.
        </span>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-0" style="margin-top:4em;">
        <h4><span>Buscador</span></h4>
      </div>
    </div>

    <div class="form-group form-row justify-content-center">
      <label class="col-form-label" style="margin-rigth:0px;"><span class="fa fa-asterisk text-success" style="font-size:0.7rem;"></span>Número de Folio</label>
      <div class="col-4">
        <input id="folioConstancia" type="text" class="form-control" placeholder="Ingresa el número de folio de la constancia" name="folioConstancia" required>
      </div>
      <div class="col-1">
        <button type="submit" class="btn btn-primary" id="btnBuscarConstancia">Buscar constancia</button>
      </div>
    </div>
  </div>

  <div class="container float-left" id="resultadoBusquedaConstancia" style="display: none;">
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
                  <th>Instancia Emisora</th>
                  <th>Fecha emisión constancia</th>
                  <th>Comentarios</th>
                  <th>Ver validacion</th>
                </tr>
              </thead>
              <tbody id="cuerpoTabla">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>


</body>

</html>
