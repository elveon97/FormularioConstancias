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

    //Codigo para cerrar la sesión
    session_destroy();
    //Redireccionar a la página de Logeo
    header("Location: index.php");
?>
