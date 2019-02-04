<!DOCTYPE html>

<html>
 
    <head>
        <meta name="author" content="PracticantesServicioSocial">
        <meta charset="utf-8">

        <link rel="stylesheet" href="styles/common_styles.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">

        <title>Iniciar Sesión</title>
        
        
                 
    </head>


    <body>

        <div class="m-center">
            <div class="logo-container w-100">
                <img src="img/logo.jpg" alt="CUSur">
            </div>
            <div class="colorFondo">

                <!-- form Login -->
                <form id ="loginForm" method="POST" action="">
                    <!-- Usuario -->
                    <label class="labelBlock" for="usuario">Usuario</label>
                    <input class="inputBlockDesign" id="usuario" type="text" placeholder="Ingresa tu Código de Usuario" name="usser">
                    <!-- Contraseña -->
                    <label class="labelBlock" for="contraseña">Contraseña</label>
                    <input class="inputBlockDesign" id="contraseña" type="password" placeholder="Ingresa tu Contraseña" name="password">
                    <!-- Submit Button -->
                    <button class ="botonesFormulario" type="submit">Entrar</button>
                </form>
                
                <span id = "msg"> Por favor introduce los datos solicitados </span>
                
                <!--    Este script modifica el texto del span con id = "msg".
                        Por lo tanto debe de ir despues de que el span haya sido declarado y antes de la condición donde será invocado! -->
                <script type = "text/javascript">

                    function mensajesLogueo(opcion){
                        if(opcion == 1){
                            document.getElementById("msg").innerHTML = "La contraseña introducida es incorrecta <br>";
                        }else if(opcion == 2){
                            document.getElementById("msg").innerHTML = "El usuario introducido no se encontro en la base de datos <br>";
                        }
                    }
                    
                </script>
                
                
                <!-- Codigo php para validar el login al sistema -->
                <?php
                    //Código para realizar las consultas a la BD
                    require("php/connection.php");
                    $conn = getConnection();
                    $conn -> query("SET NAMES utf8");

                    if ($_POST) {
                        //Recibir las variables enviadas por el metodo POST
                        $usser = validate_input($_POST["usser"]);
                        $password = validate_input($_POST["password"]);


                        //Validar que los datos proporcionados coincidan con un registro en la base de datos
                        $result = $conn->query("SELECT username, password FROM usuario WHERE username = '".$usser."'");

                        $resultadoConsultaUsuario = "";
                        $resultadoConsultaPassword = "";

                        //Guardar en la variable $row el resultado de la consulta sql ---> Se almacena como tipo array, cada columna obtenida es una posicion del array!
                        $row=mysqli_fetch_array($result);
                        $resultadoConsultaUsuario = $row[0];
                        $resultadoConsultaPassword = $row[1];

                        if($resultadoConsultaUsuario == $usser && $resultadoConsultaPassword == $password){
                            //Realizar la consulta para obtener el tipo de usuario del usuario introducido
                            $result = $conn->query("SELECT tipo_usuario FROM usuario where username = '".$usser."'");
                            $tipoUsuario = "";

                            while($row=mysqli_fetch_array($result)) {
                                //Asignar el tipo de usuario a la variable correspondiente para realizar el direccionamiento
                                $tipoUsuario = $row[0];
                            }

                            mysqli_free_result($result);

                            //En este punto, ya se valido que las credenciales de acceso proporcionadas existen en la base de datos, es aquí donde se debe de iniciar la variable de sesion!
                            //Metodo para iniciar la sesión
                            session_start();
                            //Iniciar la variable de sesion con el usuario que se proporciono
                            $_SESSION['usuario'] = $usser;


                            //Realizar el direccionamiento dependiendo el tipo de usuario
                            if($tipoUsuario == 0){
                                //Redireccionar al Panel del Administrador
                                header("Location: adminIndex.php");
                            }else if($tipoUsuario == 1){
                                //Redireccionar al formulario
                                header("Location: formulario.php");
                            }
                        }else if($resultadoConsultaUsuario == $usser && $resultadoConsultaPassword != $password){
                            echo '<script> mensajesLogueo(1) </script>';
                        }else{
                            echo '<script> mensajesLogueo(2) </script>';
                        }

                        mysqli_free_result($result);
                        mysqli_close($conn);
                    }else{
   
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

