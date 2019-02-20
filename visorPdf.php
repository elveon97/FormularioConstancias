<!DOCTYPE html>

<html>

    <head>
        <meta name="author" content="PracticantesServicioSocial">
        <meta charset="utf-8">

        <link rel="stylesheet" href="styles/common_styles.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">

        <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">

        <title>No autorizado</title>

    </head>


    <body style="height: 100vh; width: 100vw;">
      <embed src="<?php echo $_GET["nombrePdf"]; ?>" width="100%;" height="100%;"  type="application/pdf">
    </body>
</html>
