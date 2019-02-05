<?php

    include 'plantillaReporteFechas.php';
    require_once('../../PHP/reportes.php');


    $fechainicial = "";
    $fechafinal = "";
    //Capturar por POST los intervalos de fecha en los que se generará el reporte
    //if ($_POST) {
    //    $fechainicial = validate_input($_POST["fechainicial"]);
    //    $fechafinal = validate_input($_POST["fechafinal"]);
  
        //Invocar el metodo encargado de realizar la consulta en la base de datos
        //$result = reporteFechas($fechainicial,$fechafinal);
        
$result = reporteFechas("2019-03-10","2019-05-10");

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
        $pdf -> SetX(10);

        $pdf -> Cell(12,8,'Folio',1,0,'C',1);
        $pdf -> Cell(45,8,'Nombre Evento',1,0,'C',1);
        $pdf -> Cell(30,8,utf8_decode('Tipo Evento'),1,0,'C',1);
        $pdf -> Cell(40,8,'Cursante',1,0,'C',1);
        $pdf -> Cell(60,8,'Dependencia que Expide',1,0,'C',1);
        $pdf -> Cell(35,8,'Fecha Inicio',1,0,'C',1);
        $pdf -> Cell(35,8,'Fecha Fin',1,1,'C',1);


        //Agregar a la constancia los datos de SQL

        $pdf -> SetFont('Times','',10);
        $current_y = $pdf->GetY(); 
        while($row=mysqli_fetch_array($result)){
            //Posicionar mas esteticamente la tabla
            $pdf -> SetX(10);
            //Variables para colocar correctamente las celdas
             
            
            $current_x = $pdf->GetX(); 
            $pdf -> SetXY($current_x,$current_y);
            $pdf -> Cell(12,8,$row[0],1,0,'C');
            //Despues de colocar el primer header, actualizar la variable X con el ancho de la celda anterior y setear la posicion XY para la siguiente celda
            $current_x+=12;
            $pdf -> SetXY($current_x,$current_y);
            $pdf -> Cell(45,8,utf8_decode($row[1]),1,0,'C');
            
            //Repetir la actualizacion de variables de posicion con cada celda
            $current_x+=45;
            $pdf -> SetXY($current_x,$current_y);
            $pdf -> Cell(30,8,utf8_decode($row[2]),1,0,'C');
            
            $current_x+=30;
            $pdf -> SetXY($current_x,$current_y);
            $pdf -> Cell(40,8,utf8_decode($row[3]),1,0,'C');
            
            $current_x+=40;
            $pdf -> SetXY($current_x,$current_y);
            $pdf -> MultiCell(60,8,utf8_decode($row[4]),1,'C',0);
            
            $current_x+=60;
            $pdf -> SetXY($current_x,$current_y);
            $pdf -> Cell(35,8,$row[5],1,0,'C');
            
            $current_x+=35;
            $pdf -> SetXY($current_x,$current_y);
            $pdf -> Cell(35,8,$row[6],1,1,'C');
            
            $current_y += 20;
        }

        //Para hacer descargable el pdf, agregar en como parametro de la función Output('D');
        $pdf -> Output();
    //}

    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    


?>