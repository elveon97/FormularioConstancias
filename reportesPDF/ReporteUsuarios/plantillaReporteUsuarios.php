<?php

    //Ruta del archivo fpdf.php
    require_once('../../librerias/pdf/fpdf/fpdf.php');
    class PDF extends FPDF{
        
        
        function Header(){
            $this -> Image('../../img/headerConstancia.png',0,0,300);
            $this -> Ln(30);
            $this -> SetFont('Arial','B',16);
            $this -> Cell(0,15,'Reporte de los Usuarios en el Sistema',0,0,'C');
            $this -> Ln(20);
            
            
                
        }    
        
        function Footer(){
            
            $this -> SetY(-15);
            $this -> Cell(0,8,utf8_decode('Página: '. $this->PageNo() . '/{nb}'),0,0,'C');
        }
    
    }


?>