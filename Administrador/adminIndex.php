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
        <meta name="author" content="PracticantesServicioSocial">
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="../Login/css/styles.css">
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">

        
        <title>Panel del Administrador</title>

    </head>

    
    <body>
        
        <div class="m-center">
            <div class="logo-container w-100">
                <img src="../Login/img/logo.jpg" alt="CUSur">
            </div>
            <div class="colorFondo">
                
                <h1>Panel del Administrador</h1>
                
                <h1>Bienvenido: <?php echo $_SESSION['usuario'] ?></h1>
                
                <!-- Cerrar la Sesión -->
                <a href="../Login/CerrarSesion.php">Cerrar Sesión</a>
                
            </div>
        </div>
        
    </body>
    
</html>
