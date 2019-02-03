<?php

  $server = "127.0.0.1" ;
  $user = "root" ;
  $password = "" ;
  $bd = "constancias" ;

  function getConnection() {
    global $server, $user, $password, $bd;
    $connection = mysqli_connect($server, $user, $password, $bd);

    if ($connection) {
      return $connection;
    } else {
      return null;
    }
  }

 ?>
