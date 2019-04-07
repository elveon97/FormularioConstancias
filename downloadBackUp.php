<?php
//La ruta la recibe por post
$auxNameBackUp = $_POST["pathBackUp"];

header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"".$auxNameBackUp."\"");

//Ruta del respaldo que se va a descargar
readfile($auxNameBackUp);

exit;

?>
