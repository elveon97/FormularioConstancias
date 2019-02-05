<?php

    include 'plantillaReporteUsuarios.php';
    require_once('../../PHP/conexion.php');
    
    $obj= new conectar();
    $conexion=$obj->conexion();
    
    
    $sql="select * from Usuario";
    $result=mysqli_query($conexion,$sql);

    //Configurar la página para que sea horizontal...
    $pdf = new PDF('L','mm','letter');
    
    $pdf -> AliasNbPages();
    $pdf -> AddPage();
    
    //Fecha en la que se expidio el reporte
    $mes = "";
    $hoy = getdate();
    //Traducir el mes a español
    switch($hoy['month']){
        case 'January':$mes = "Enero";break;
        case 'February':$mes = "Febrero";break;
        case 'March':$mes = "Marzo";break;
        case 'April':$mes = "Abril";break;
        case 'May':$mes = "Mayo";break;
        case 'June':$mes = "Junio";break;
        case 'July':$mes = "Julio";break;
        case 'August':$mes = "Agosto";break;
        case 'September':$mes = "Septiembre";break;
        case 'October':$mes = "Octubre";break;
        case 'November':$mes = "Noviembre";break;
        case 'December':$mes = "Diciembre";break;
    }
   
    $pdf -> SetFont('Arial','B',14);
    $pdf -> Cell (100,8,utf8_decode('Fecha de Expedición: ' . $hoy['mday'] . ' de ' . $mes . ' del ' . $hoy['year']),0,1,'C');
    $pdf -> Ln(10);

    //Encabezados
    $pdf -> SetFillColor(194,214,214);
    $pdf -> SetFont('Times','B',12);
    //Posicionar mas esteticamente la tabla
    $pdf -> SetX(30);

    $pdf -> Cell(25,8,'ID Usuario',1,0,'C',1);
    $pdf -> Cell(50,8,'Nombre Usuario',1,0,'C',1);
    $pdf -> Cell(50,8,utf8_decode('Contraseña'),1,0,'C',1);
    $pdf -> Cell(75,8,'Correo Electronico',1,0,'C',1);
    $pdf -> Cell(30,8,'Tipo Usuario',1,1,'C',1);

    //Datos de SQL
    $pdf -> SetFont('Times','',10);
    while($row=mysqli_fetch_array($result)){
        //Posicionar mas esteticamente la tabla
        $pdf -> SetX(30);
        $pdf -> Cell(25,8,$row[0],1,0,'C');
        $pdf -> Cell(50,8,utf8_decode($row[1]),1,0,'C');
        $pdf -> Cell(50,8,utf8_decode($row[2]),1,0,'C');
        $pdf -> Cell(75,8,$row[3],1,0,'C');
        $pdf -> Cell(30,8,$row[4],1,1,'C');
    }

    //Para hacer descargable el pdf, agregar en como parametro de la función Output('D');
    $pdf -> Output();
    


?>