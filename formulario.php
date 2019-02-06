<?php
    //Codigo para validar que esta pagina pueda ser visualizada solamente si existe una sesión previamente iniciada!

    session_start();
    $varSesion = $_SESSION['usuario'];

    //Habilitar la siguiente linea cuando se de por concluido el desarrollo de esta pagina, esto con el fin de que no se muestren errores de php
    //error_reporting(0);

    if($varSesion == null || $varSesion = ''){
        echo 'Para acceder a esta sección debes iniciar sesión';
        die();
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/formulario_styles.css">
        <link rel="stylesheet" href="styles/common_styles.css">
        <link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/bootstrap.css">
        <script src="librerias/bootstrap/popper.min.js"></script>
        <script src="librerias/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="librerias/jquery.min.js"></script>
        <script src="librerias/alertify/alertify.js"></script>
        <script type="text/javascript">
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
                  $('input[name=nombre_cursante]').val(resultado[1]);
                }
              }
            });
          }

          $(document).ready(function() {
            $("#nombreCapacitacion").on("input",function(e){
              autoCompletado(0, $("#nombreCapacitacion").val());
            });
            $("#codigoCursante").on("input",function(e){
              autoCompletado(1, $("#codigoCursante").val());
            });
          });
        </script>
        <title>Sistema de Constancias</title>
    </head>

    <body>
        <div class="m-center">
            <!-- Imagen -->
            <div class="logo-container w-100">
                <img src="img/logo.jpg" alt="CUSur" style="margin-right: 25rem;">
                <a href="php/CerrarSesion.php">
                  <span class="fa fa-times-circle" style="margin-right: 5px;"></span>
                  Cerrar sesión
                </a>
            </div>

            <!-- Contenedor del formulario -->
            <div class="main-container w-100">
                <!-- Form que tendra los campos de la constancia -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h1>Logueado como: <?php echo $_SESSION['usuario'] ?></h1>

                    <!-- Nombre de la Capacitacion-->
                    <label class="labelInline" for="nombreCapacitacion">Nombre capacitación</label>
                    <input class="inputInline" id="nombreCapacitacion" type="text" placeholder="Ingresa el nombre de la capacitación" name="nombre_capacitacion" required>

                    <!-- Tipo de  Capacitacion, debe ser una lista que se carge con los datos que tiene la base de datos!-->
                    <label class="labelInline"  for="tipoCapacitacion">Tipo capacitación</label>
                    <!-- El valor definido en value será el que se envie cuando el formulario sea enviado! -->
                    <select class="inputInline" name="tipo_capacitacion">
                        <?php
                        require("php/connection.php");
                          $conn = getConnection();
                          $conn -> query("SET NAMES utf8");

                          $result = $conn->query("SELECT * FROM tipo_evento ORDER BY tipo_evento_id ASC");

                          while($row=mysqli_fetch_array($result)) {
                            echo '<option value="'.htmlspecialchars($row[0]).
                              '">'.htmlspecialchars($row[1]).'</option>';
                          }

                          mysqli_free_result($result);
                          mysqli_close($conn);
                        ?>
                    </select>

                    <!-- Instancia que expide, debe ser una lista que se carge con los datos que tiene la base de datos!-->
                    <label class="labelInline"  for="instancia">Instancia que expide</label>
                    <!-- El valor definido en value será el que se envie cuando el formulario sea enviado! -->
                    <select class="inputInline" name="instancia" name="instancia">
                        <?php
                          $conn = getConnection();
                          $conn -> query("SET NAMES utf8");

                          $result = $conn->query("SELECT * FROM instancia ORDER BY instancia_id ASC");

                          while($row=mysqli_fetch_array($result)) {
                            echo '<option value="'.htmlspecialchars($row[0]).
                              '">'.htmlspecialchars($row[1]).'</option>';
                          }

                          mysqli_free_result($result);
                          mysqli_close($conn);
                        ?>
                    </select>

                    <!-- Duracion de la Capacitacion-->
                    <label class="labelInline"  for="duracionCapacitacion">Duración en horas</label>
                    <input class="inputInline" id="duracionCapacitacion" type="number" placeholder="Número de horas que dura la capacitación" name="duracion" required>

                    <!-- Fecha Inicio de la Capacitacion-->
                    <label class="labelInline"  for="fechaInicio">Fecha inicio</label>
                    <input class="inputInline" id="fechaInicio" type="date" name="fecha_inicio" required>

                    <!-- Fecha Fin de la Capacitacion-->
                    <label class="labelInline"  for="fechaFin">Fecha fin</label>
                    <input class="inputInline" id="fechaFin" type="date" name="fecha_fin" required>

                    <!-- Comentarios-->
                    <label class="labelInline"  for="comentarios">Comentarios</label>
                    <textarea class="inputInline" id="comentarios" placeholder="Comentarios" name="comentarios"></textarea>

                    <!-- Datos del Cursante -->
                    <!-- Codigo del Cursante -->
                    <label class="labelInline" for="codigoCursante">Código cursante</label>
                    <input class="inputInline" id="codigoCursante" type="text" placeholder="Ingresa el código del cursante" name="codigo" required>

                    <!-- Nombre del Cursante -->
                    <label class="labelInline" for="nombreCursante">Nombre cursante</label>
                    <input class="inputInline" id="nombreCursante" type="text" placeholder="Ingresa el nombre del cursante" name="nombre_cursante" required>

                    <!-- Button Submit para enviar los datos de los formulario -->
                    <button class="botonesFormulario" type="submit">Subir constancia</button>
                </form>

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
                    $comentarios = validate_input($_POST["comentarios"]) ;
                    $codigo = validate_input($_POST["codigo"]) ;
                    $nombre_cursante = validate_input($_POST["nombre_cursante"]) ;

                    $con = getConnection();

                    $con -> query("SET NAMES utf8");

                    $date = getDate();

                    $con -> query("CALL formulario("
                        . "'" . $codigo . "', "
                        . "'" . $nombre_cursante ."', "
                        . "'" . $nombre_capacitacion . "', "
                        . $tipo_capacitacion . ", "
                        . $instancia . ", "
                        . $duracion . ", "
                        . "'" . $fecha_inicio . "', "
                        . "'" . $fecha_fin . "', "
                        . "'" . $date['year'] . "-" . $date['mon'] . "-" . $date['mday'] ."', "
                        . "'" . $comentarios . "', @out)"
                      );

                    mysqli_close($con);
                    echo "<script> alertify.success('Constancia Agregada')</script>";
                  }

                  function validate_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                  }
                ?>

            </div>
        </div>

    </body>

</html>
