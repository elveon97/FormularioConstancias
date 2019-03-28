<?php
require("php/conexion.php");

//Codigo para validar que esta pagina pueda ser visualizada solamente si existe una sesión previamente iniciada!
session_start();
error_reporting(0);
$varSesion = $_SESSION['usuario'];

//Habilitar la siguiente linea cuando se de por concluido el desarrollo de esta pagina, esto con el fin de que no se muestren errores de php

if($varSesion == null || $varSesion = ''){
  header("Location: errorInicioSesion.php");
  die();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Agregar constancia</title>

  <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/bootstrap.css">

  <script src="librerias/jquery.min.js"></script>
  <script src="librerias/bootstrap/popper.min.js"></script>
  <script src="librerias/bootstrap/bootstrap.min.js"></script>
  <script src="librerias/alertify/alertify.js"></script>

  <script>
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });

  function autoCompletado(control, busqueda) {
    var parametros = {
      "control" : control,
      "busqueda" : busqueda
    };
    $.ajax({
      data: parametros,
      url: "php/autocompletado.php",
      type: "post",
      beforeSend: function() {
        console.log("realizando búsqueda...");
      },
      success: function(response) {
        if (response == "") return;
        resultado = response.split(";");
        console.log(response);
        if (control == 0) { // Autocompletar Evento
          $('select[name=tipo_capacitacion] option').eq(resultado[1]-1).prop('selected', true);
          $('select[name=instancia] option').eq(resultado[2]-1).prop('selected', true);
          $('input[name=duracion]').val(resultado[4]);
          $('input[name=fecha_inicio]').val(resultado[5]);
          $('input[name=fecha_fin]').val(resultado[6]);
        } else { // Autocompletar Cursante
          $('input[name=nombre_cursante]').val(resultado[2]);
        }
      }
    });
  }
  $(document).ready(function() {
    $("#lblNoEncontro").hide();

    $("#nombreCapacitacion").on("input",function(e){
      autoCompletado(0, $("#nombreCapacitacion").val());
    });
    $("#codigoCursante").on("input",function(e){
      autoCompletado(1, $("#codigoCursante").val());
    });

    $('#btnConsultarConstancias').click(function(){
      datos=$('#formConsultarConstancia').serialize();
      console.log(datos);
      $.ajax({
        type:"POST",
        data:datos,
        url:"php/consultarConstancia.php",
        success:function(r){
          if (r == 0) {
            $("#lblNoEncontro").show();
          } else {
            location.href="interfazConsultaConstancias.php?"+datos;
          }
        }
      });
    });

  });
  </script>
</head>
<body>
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-4">
        <img src="img/logo.jpg" alt="CUSur">
      </div>
      <div class="col-6">
        <a href="adminIndex.php" class="btn btn-outline-primary">
          <span class="fa fa-arrow-left mr-1"></span>
          Panel de administración
        </a>
        <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#buscadorConstancias"><span class="fa fa-search mr-1"></span>Buscar constancia</button>
      </div>
      <a href="php/CerrarSesion.php" class="btn btn-outline-danger">
        <span class="fa fa-times-circle mr-1"></span>
        Cerrar sesión
      </a>
    </div>
  </div>

  <div class="container">
    <div class="card mt-4 mb-2">

      <div class="card-header">
        <h5><span class="fa fa-plus-circle text-primary mr-1"></span>Agregar nueva constancia <small>Logueado como: <?php echo $_SESSION['usuario'] ?></small></h5>
      </div>

      <div class="card-body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="form-group form-row">
            <label class="col-4 col-form-label text-success font-weight-bold"><span class="fa fa-asterisk mr-1" style="font-size:0.7rem;"></span>Campos obligatorios</label>
          </div>

          <hr>

          <div class="form-group form-row">
            <label class="col-4 col-form-label"><span class="fa fa-asterisk text-success mr-1" style="font-size:0.7rem;"></span>Descripción</label>
            <div class="col-7">
              <input id="nombreCapacitacion" type="text" class="form-control" placeholder="Ingrese el nombre de la capacitación" name="nombre_capacitacion" value="<?php echo $_POST["nombre_capacitacion"]; ?>" required>
            </div>
            <div class="col-1">
              <span class="btn btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Nombre del curso, taller o descripción de la actividad">?</span>
            </div>
          </div>

          <div class="form-group form-row">
            <label class="col-4 col-form-label"><span class="fa fa-asterisk text-success mr-1" style="font-size:0.7rem;"></span>Tipo de documento</label>
            <div class="col-7">
              <select class="form-control" name="tipo_capacitacion" value="<?php echo $_POST["tipo_capacitacion"];?>">
                <?php
                $obj = new conectar();
                $conn = $obj -> conexion();
                $result = $conn->query("SELECT * FROM tipo_evento ORDER BY tipo_evento_id ASC");
                while($row=mysqli_fetch_array($result)) {
                  echo '<option value="'.htmlspecialchars($row[0]).
                  '">'.htmlspecialchars($row[1]).'</option>';
                }
                mysqli_free_result($result);
                mysqli_close($conn);
                ?>
              </select>
            </div>
            <div class="col-1">
              <span class="btn btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Tipo de documento que se esta expidiendo">?</span>
            </div>
          </div>

          <div class="form-group form-row">
            <label class="col-4 col-form-label"><span class="fa fa-asterisk text-success mr-1" style="font-size:0.7rem;"></span>Instancia que expide</label>
            <div class="col-7">
              <select class="form-control" name="instancia" value="<?php echo $_POST["instancia"];?>">
                <?php
                $obj = new conectar();
                $conn = $obj -> conexion();
                $result = $conn->query("SELECT * FROM instancia ORDER BY instancia_id ASC");
                while($row=mysqli_fetch_array($result)) {
                  echo '<option value="'.htmlspecialchars($row[0]).
                  '">'.htmlspecialchars($row[1]).'</option>';
                }
                mysqli_free_result($result);
                mysqli_close($conn);
                ?>
              </select>
            </div>
            <div class="col-1">
              <span class="btn btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Área o departamento donde se genero el reconocimiento">?</span>
            </div>
          </div>

          <div class="form-group form-row">
            <label class="col-4 col-form-label">Duración en horas</label>
            <div class="col-7">
              <input type="number" class="form-control" placeholder="Ingrese la duración de la capacitación" name="duracion" value="<?php echo $_POST["duracion"];?>">
            </div>
            <div class="col-1">
              <span class="btn btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Duración en horas del curso (En caso de ser necesario)">?</span>
            </div>
          </div>

          <div class="form-group form-row">
            <label class="col-4 col-form-label"></span>Fecha de inicio</label>
            <div class="col-7">
              <input type="date" class="form-control" placeholder="Ingrese la duración de la capacitación" name="fecha_inicio" value="<?php echo $_POST["fecha_inicio"];?>">
            </div>
            <div class="col-1">
              <span class="btn btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Fecha de inicio del curso o taller (En caso de ser necesario)">?</span>
            </div>
          </div>

          <div class="form-group form-row">
            <label class="col-4 col-form-label">Fecha de terminación</label>
            <div class="col-7">
              <input type="date" class="form-control" placeholder="Ingrese la duración de la capacitación" name="fecha_fin" value="<?php echo $_POST["fecha_fin"];?>">
            </div>
            <div class="col-1">
              <span class="btn btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Fecha de terminación del curso o taller (En caso de ser necesario)">?</span>
            </div>
          </div>

          <div class="form-group form-row">
            <label class="col-4 col-form-label">Fecha de emisión</label>
            <div class="col-7">
              <input type="date" class="form-control" placeholder="Ingrese la fecha de emisión" name="fecha_emision" required>
            </div>
            <div class="col-1">
              <span class="btn btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Fecha de emisión de la constancia">?</span>
            </div>
          </div>

          <div class="form-group form-row">
            <label class="col-4 col-form-label">Comentarios referentes a la constancia</label>
            <div class="col-7">
              <textarea name="comentarios" class="form-control" placeholder="Comentarios"></textarea>
            </div>
            <div class="col-1">
              <span class="btn btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Comentarios (Solamente si se requieren)">?</span>
            </div>
          </div>

          <hr>
<!-- Sección del Cursante -->
          <div class="form-group form-row">
            <label class="col-4 col-form-label">Código</label>
            <div class="col-7">
              <input id="codigoCursante" type="text" class="form-control" placeholder="Ingrese el código del cursante" name="codigo">
            </div>
            <div class="col-1">
              <span class="btn btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Código de la persona reconocida en caso de contar con uno. (Si no se cuenta con un código, favor de dejarlo en blanco)">?</span>
            </div>
          </div>

          <div class="form-group form-row">
            <label class="col-4 col-form-label"><span class="fa fa-asterisk text-success mr-1" style="font-size:0.7rem;"></span>Nombre</label>
            <div class="col-7">
              <input type="text" class="form-control" placeholder="Ingrese el nombre del cursante" name="nombre_cursante" required>
            </div>
            <div class="col-1">
              <span class="btn btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Nombre de la persona reconocida">?</span>
            </div>
          </div>

          <div class="form-group form-row mt-4">
            <div class="col-10"></div>
            <div class="col-2">
              <button type="submit" class="btn btn-primary">Subir constancia</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  <!-- Modal para buscar las constancias -->
  <div class="modal fade" id="buscadorConstancias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content w-100">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buscador de Constancias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body w-100">
          <form id="formConsultarConstancia" class="w-100">
            <label for="folio" class="mr-1">Folio de la Constancia</label>
            <input type="text" name="folio" placeholder="Ingrese folio a buscar" required>
            <label id="lblNoEncontro" class="text-danger">No se encontró la constancia solicitada</label>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnConsultarConstancias" class="btn btn-primary">Buscar Constancia</button>
        </div>
      </div>
    </div>
  </div>

</body>

<?php
$nombre_capacitacion = "";
$tipo_capacitacion = "";
$instancia = "";
$duracion = "";
$fecha_inicio = "";
$fecha_fin = "";
$comentarios = "";
$codigo = "";
$nombre_cursante = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre_capacitacion = validate_input($_POST["nombre_capacitacion"]) ;
  $tipo_capacitacion = validate_input($_POST["tipo_capacitacion"]) ;
  $instancia = validate_input($_POST["instancia"]) ;
  $duracion = validate_input($_POST["duracion"]) ;
  $fecha_inicio = validate_input($_POST["fecha_inicio"]) ;
  $fecha_fin = validate_input($_POST["fecha_fin"]) ;
  $fecha_emision = validate_input($_POST["fecha_emision"]) ;
  $comentarios = validate_input($_POST["comentarios"]) ;
  $codigo = validate_input($_POST["codigo"]) ;
  $nombre_cursante = validate_input($_POST["nombre_cursante"]) ;
  $obj = new conectar();
  $conn = $obj -> conexion();

  if (trim($codigo)=="") $codigo="0";
  $result1 = mysqli_query($conn, "SELECT COUNT(*) FROM ((constancia INNER JOIN cursante ON constancia.cursante = cursante.cursante_id) INNER JOIN evento ON constancia.evento = evento.evento_id) WHERE UPPER(TRIM(evento.nombre)) = UPPER(TRIM('$nombre_capacitacion')) AND cursante.codigo = '$codigo'");
  $row1 = mysqli_fetch_array($result1);
  $fol1 = $row1[0];
  if ($fol1 >= 1) {
    echo "<script>alertify.alert('Agregar constancia', 'Ya existe una constancia que registra a este cursante con el mismo evento', function(){ }); </script>";
  } else {
    $conn -> query("CALL formulario("
    . "'" . $codigo . "', "
    . "'" . $nombre_cursante ."', "
    . "'" . $nombre_capacitacion . "', "
    . $tipo_capacitacion . ", "
    . $instancia . ", "
    . (trim($duracion) == ""? "0, ":($duracion . ", "))
    . (trim($fecha_inicio) == ""? "NULL, ":("'" . $fecha_inicio . "', "))
    . (trim($fecha_fin) == ""? "NULL, ":("'" . $fecha_fin . "', "))
    . (trim($fecha_emision) == ""? "NULL, ":("'" . $fecha_emision . "', "))
    . "'" . $comentarios . "', @out)"
  );

  $result2 = mysqli_query($conn, "SELECT @out");
  $row = mysqli_fetch_array($result2);
  $fol = $row[0];

  if (trim($fol)=="") {
    echo "<script> alertify.alert('Agregar constancia', 'Hubo un error al agregar la constancia', function(){ }); </script>";
  } else {
    echo "<script> alertify.alert('Agregar constancia', 'Constancia con folio $fol agregada correctamente', function(){ }); </script>";
  }

}

mysqli_close($conn);
}
function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</html>
