<?php
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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Gestión de constancias</title>
  <?php require_once "php/gestionScripts.php";  ?>
</head>
<body>
  <div class="container pt-1">
    <img src="img/logo.jpg" alt="CUSur" class="mb-5">
    <a href="adminIndex.php" class="btn btn btn-link">
      <span class="fa fa-arrow-circle-left" style="margin-right: 5px;"></span>
      Volver al Panel del Administrador
    </a>
    <div class="row">
      <div class="col-sm-12">
        <div class="card text-left" style="box-shadow: 0px 0px 10px rgba(0,0,0,1);">
          <div class="card-header">
            Gestión de constancias
          </div>
          <div class="card-body">
            <a href="formulario.php" class="btn btn-primary">
              Agregar nueva constancia <span class="fa fa-plus-circle"></span>
            </a>
            <hr>
            <div id="tablaDatatable"></div>
          </div>
          <div class="card-footer text-muted">
            Gestión de constancias
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar constancia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="frmnuevoU">
            <input type="text" hidden="" id="folio" name="folio">


<!--Updates!-->


            <!-- Inicio nombre de la Capacitación -->
              <div id="nombreCapacitacion">
                <!-- Al cargar el modal para editar, se mostraran los cursos que ya estan almacenados, y si el usuario selecciona que el curso de la constancia no esta en la lista,
                se cargara el div donde se encuentra el input, y este div con el select se ocultara! -->
                <div id="loadCapacitacionByDefault">
                  <!-- Select que carga las capacitaciones que ya estan en el sistema -->
                  <label for="capacitacion">Nombre de la Capacitación</label>
                  <select class="form-control input-sm mb-3" name="capacitacion">
                    <?php
                    require("php/conexion.php");
                    $obj = new conectar();
                    $conn = $obj -> conexion();
                    $result = $conn->query("SELECT evento_id,nombre FROM evento ORDER BY nombre ASC");
                    while($row=mysqli_fetch_array($result)) {
                      echo '<option value="'.htmlspecialchars($row[1]).
                      '">'.htmlspecialchars($row[1]).'</option>';
                    }
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
                <!-- Si la capacitacion no esta en la lista -->
                <div id="loadIfNewCapacitacion" style="display:none;">
                  <label for="agregarCapacitacion">Agregar capacitacion</label>
                  <button type="button" class=" form-control btn btn-secondary" style="margin-bottom:5px;" onclick="window.location='gestionEventos.php'">Agregar capacitación</button>

                </div>
              </div>

              <!-- Preguntar al usuario si el curso esta en la lista! -->
              <div class="input-group">
                <span class="input-group-addon">
                  <input id="radioButtonCapacitacionInList" type="checkbox"checked>
                  <label> ¿La capacitación esta en la lista? </label>
                </span>
              </div>
            <!-- Cierre nombre de la Capacitación -->


            <!-- Inicio Cursante -->
              <div id="nombreCursante">
                <!-- Al cargar el modal para editar, se mostraran los cursos que ya estan almacenados, y si el usuario selecciona que el curso de la constancia no esta en la lista,
                se cargara el div donde se encuentra el input, y este div con el select se ocultara! -->
                <div id="loadCursanteByDefault">
                  <!-- Select que carga las capacitaciones que ya estan en el sistema -->
                  <label for="cursante">Nombre del Cursante</label>
                  <select class="form-control input-sm mb-3" name="cursante">
                    <?php
                    $obj = new conectar();
                    $conn = $obj -> conexion();
                    $result = $conn->query("SELECT codigo,nombre FROM cursante ORDER BY nombre ASC");
                    while($row=mysqli_fetch_array($result)) {
                      echo '<option value="'.htmlspecialchars($row[1]).
                      '">'.htmlspecialchars($row[1]).'</option>';
                    }
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
                <!-- Si la capacitacion no esta en la lista -->
                <div id="loadIfNewCursante" style="display:none;">
                  <label for="agregarCursante">Agregar cursante</label>
                  <button id="agregarCursante" name= "agregarCursante" type="button" class=" form-control btn btn-secondary" style="margin-bottom:5px;" onclick="window.location='gestionCursantes.php'">Agregar cursante</button>
                </div>
              </div>

              <!-- Preguntar al usuario si el curso esta en la lista! -->
              <div class="input-group">
                <span class="input-group-addon">
                  <input id="radioButtonCursanteInList" type="checkbox"checked>
                  <label> ¿El cursante esta en la lista? </label>
                </span>
              </div>
            <!-- Cierre Cursante -->

<!--Updates!-->


            <!-- Fecha de emisión -->
            <label for="fechaEmision">Fecha de emisión</label>
            <input id="fechaEmision" class="form-control input-sm mb-3" type="date" placeholder="Ingresa el nombre del Constancia" name="fechaEmision" required>
            <!-- Comentarios -->
            <label for="comentarios">Comentarios</label>
            <textarea id="comentarios" class="form-control input-sm mb-3" type="date" placeholder="Ingresa el nombre del Constancia" name="comentarios" required></textarea>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
        </div>
      </div>
    </div>
  </div>


</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  $('#btnAgregarnuevo').click(function(){
    datos=$('#frmnuevo').serialize();
    console.log(datos);

    $.ajax({
      type:"POST",
      data:datos,
      url:"php/procesosConstancias/agregar.php",
      success:function(r){
        if(r==1){
          $('#frmnuevo')[0].reset();
          $('#tablaDatatable').load('php/procesosConstancias/tabla_constancias.php');
          alertify.success("Constancia agregada");
        }else{
          alertify.error("Error al agregar constancia");
        }
      }
    });
  });

  $('#btnActualizar').click(function(){
    datos=$('#frmnuevoU').serialize();
    console.log(datos);

    $.ajax({
      type:"POST",
      data:datos,
      url:"php/procesosConstancias/actualizar.php",
      success:function(r){
        if(r==1){
          $('#tablaDatatable').load('php/procesosConstancias/tabla_constancias.php');
          alertify.success("Constancia actualizada");
        }else{
          alertify.error("Error al actualizar la constancia");
        }
      }
    });
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('#tablaDatatable').load('php/procesosConstancias/tabla_constancias.php');
});
</script>

<script type="text/javascript">
function agregaFrmActualizar(folio){
  $.ajax({
    type:"POST",
    data:"folio=" + folio,
    url:"php/procesosConstancias/obtenDatos.php",
    success:function(r){
      datos=jQuery.parseJSON(r);
      $('#folio').val(datos['folio']);
      $('#fechaEmision').val(datos['fecha_emision']);
      $('#comentarios').val(datos['comentario']);
    }
  });
}

function eliminarDatos(folio){
  alertify.confirm('Eliminar constancia', '¿Seguro que desea eliminar la constancia?', function(){

    $.ajax({
      type:"POST",
      data:"folio=" + folio,
      url:"php/procesosConstancias/eliminar.php",
      success:function(r){
        if(r==1){
          $('#tablaDatatable').load('php/procesosConstancias/tabla_constancias.php');
          alertify.success("Constancia eliminada");
        }else{
          alertify.error("Error al eliminar la constancia");
        }
      }
    });

  }
  , function(){

  });
}
//Codigo para mostrar la opcion de input para el curso dependiendo si el rb es deseleccionado o seleccionado!
$("#radioButtonCapacitacionInList").click(function() {
  if($("#radioButtonCapacitacionInList").is(':checked')) {
    //Si si esta en la lista
    $("#loadCapacitacionByDefault").css("display", "block");
    $("#loadIfNewCapacitacion").css("display", "none");
  } else {
    //Si no esta en la lista
    alert("Crea una nueva capacitaion desde gestionar cursos y vuelve a esta sección para editar la constancia");
    $("#loadCapacitacionByDefault").css("display", "none");
    $("#loadIfNewCapacitacion").css("display", "block");
  }
});

$("#radioButtonCursanteInList").click(function() {
  if($("#radioButtonCursanteInList").is(':checked')) {
    //Si si esta en la lista
    $("#loadCursanteByDefault").css("display", "block");
    $("#loadIfNewCursante").css("display", "none");
  } else {
    //Si no esta en la lista
    alert("Crea un nuevo cursante desde gestionar cursantes y vuelve a esta sección para editar la constancia");
    $("#loadCursanteByDefault").css("display", "none");
    $("#loadIfNewCursante").css("display", "block");
  }
});


</script>
