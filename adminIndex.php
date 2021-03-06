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
?>



<!DOCTYPE html>

<html>

    <head>
        <meta name="author" content="PracticantesServicioSocial">
        <meta charset="utf-8">

        <link rel="stylesheet" href="styles/common_styles.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">

        <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/font-awesome.css">

        <title>Panel del administrador</title>

    </head>


    <body>

        <div class="m-center">
            <!-- Imagen -->
            <div class="logo-container w-100">
              <img src="img/logo.jpg" alt="CUSur" style="margin-right: 25rem;">
              <a href="php/CerrarSesion.php" class="btn btn-outline-danger">
                <span class="fa fa-times-circle" style="margin-right: 5px;"></span>
                Cerrar sesión
              </a>
            </div>

            <div class="container">

              <div class="row mt-2">
                <h3>¡Bienvenido, <?php echo $_SESSION['usuario'] ?>!</h3>
              </div>

              <div class="row mt-2">
                <!-- La seccion para gestionar los usuarios estara oculta para los usuarios normales -->
                <div class="col-sm" id="gestion-usuarios" style="display:none">
                  <div class="card">
                    <div class="card-header w-100 bg-dark text-white">
                      <h4>Usuarios</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-title">
                          <span class="fa fa-users text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                      </div>
                      <a href="GestionUsuarios.php" class="btn btn-primary">
                        <span class="fa fa-cogs" style="margin-right: 5px;"></span>
                        Gestionar
                      </a>
                    </div>
                  </div>
                </div>

                <?php
                  //Si el tipo de sesion no es un usuario normal, mostrarle la seccion para gestionar los usuarios
                  if($_SESSION['tipoUsuario'] != '1'){
                    echo (" <script> document.getElementById('gestion-usuarios').style.display = 'block';
                            </script>");
                  }
                ?>

                <div class="col-sm">
                  <div class="card">
                    <div class="card-header w-100 bg-dark text-white">
                      <h4>Constancias</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-title">
                          <span class="fa fa-file text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                      </div>
                      <a href="gestionConstancias.php" class="btn btn-primary">
                        <span class="fa fa-cogs" style="margin-right: 5px;"></span>
                        Gestionar
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="card">
                    <div class="card-header w-100 bg-dark text-white">
                      <h4>Cursantes</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-title">
                          <span class="fa fa-graduation-cap text-secondary w-100 mb-2" style="font-size: 6em; text-align: center;"></span>
                      </div>
                      <a href="gestionCursantes.php" class="btn btn-primary">
                        <span class="fa fa-cogs" style="margin-right: 5px;"></span>
                        Gestionar
                      </a>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row mt-4">

                <div class="col-sm">
                  <div class="card">
                    <div class="card-header w-100 bg-dark text-white">
                      <h4>Cursos</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-title">
                          <span class="fa fa-calendar text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                      </div>
                      <a href="gestionEventos.php" class="btn btn-primary">
                        <span class="fa fa-cogs" style="margin-right: 5px;"></span>
                        Gestionar
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="card">
                    <div class="card-header w-100 bg-dark text-white">
                      <h4>Instancias</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-title">
                          <span class="fa fa-sitemap text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                      </div>
                      <a href="gestionInstancias.php" class="btn btn-primary">
                        <span class="fa fa-cogs" style="margin-right: 5px;"></span>
                        Gestionar
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="card">
                    <div class="card-header w-100 bg-dark text-white">
                      <h4>Tipos de evento</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-title">
                          <span class="fa fa-wrench text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                      </div>
                      <a href="gestionTipoEvento.php" class="btn btn-primary">
                        <span class="fa fa-cogs" style="margin-right: 5px;"></span>
                        Gestionar
                      </a>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row mt-4">
                <!-- La seccion para los reportes estara oculta para los usuarios normales -->
                <div class="col-sm" id="seccion-reportes" style="display:none">
                  <div class="card">
                    <div class="card-header w-100 bg-dark text-white">
                      <h4>Reportes</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-title">
                          <span class="fa fa-book text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                      </div>
                      <a href="interfazReportes.php" class="btn btn-primary">
                        <span class="fa fa-cogs" style="margin-right: 5px;"></span>
                        Gestionar
                      </a>
                    </div>
                  </div>
                </div>
                <!-- La seccion para validar los cursos estara oculta para los usuarios normales -->
                <div class="col-sm" id="validar-cursos" style="display:none">
                  <div class="card">
                    <div class="card-header w-100 bg-dark text-white">
                      <h4>Validación de cursos</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-title">
                          <span class="fa fa-check-square text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                      </div>
                      <a href="interfazValidacionCursos.php" class="btn btn-primary">
                        <span class="fa fa-cogs" style="margin-right: 5px;"></span>
                        Gestionar
                      </a>
                    </div>
                  </div>
                </div>

                <?php
                  //Si el tipo de sesion no es un usuario normal, mostrarle la seccion de los reportes
                  if($_SESSION['tipoUsuario'] != '1'){
                    echo (" <script>
                              document.getElementById('seccion-reportes').style.display = 'block';
                              document.getElementById('validar-cursos').style.display = 'block';
                            </script>");
                  }
                ?>
                
              </div>

              <!-- Seccion de respaldo y restauracion -->
              <div class="row mt-4" id="container_Respaldo_Restauracion" style="display:none">
                <!-- Respaldo -->
                <div class="col-sm">
                  <div class="card">
                    <div class="card-header w-100 bg-dark text-white">
                      <h4>Respaldar la base de datos</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-title">
                          <span class="fa fa-hdd-o text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                      </div>
                      <a href="respaldo.php" class="btn btn-primary">
                        <span class="fa fa-cogs" style="margin-right: 5px;"></span>
                        Respaldar
                      </a>
                    </div>
                  </div>
                </div>
                <!-- Restauración -->
                <div class="col-sm">
                  <div class="card">
                    <div class="card-header w-100 bg-dark text-white">
                      <h4>Restaurar la base de datos</h4>
                    </div>
                    <div class="card-body">
                      <div class="card-title">
                          <span class="fa fa-refresh text-secondary w-100 mb-2" style="color: #0069D9; font-size: 6em; text-align: center;"></span>
                      </div>
                      <a href="restauracion.php" class="btn btn-primary">
                        <span class="fa fa-cogs" style="margin-right: 5px;"></span>
                        Restaurar
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- script de php que checa si la sesión fue iniciada por un superAdmin, mostrarle las opciones de respaldar y restaurar! -->
              <?php
                if($_SESSION['tipoUsuario'] == '2'){
                  echo (" <script> document.getElementById('container_Respaldo_Restauracion').style.display = 'block';
                          </script>");
                }
              ?>
            </div>

        </div>



    </body>

</html>
