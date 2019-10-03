<?php 

require 'fpdf.php';
require_once '../modelo/connect.php';
require_once '../modelo/preguntasadopcion.php';
require_once '../modelo/respuestasAdopcion.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B', 10);

$preguntas = PreguntasAdopcion::dataPreguntas();

foreach($preguntas AS $pregunta){

    if($preguntas->rowCount() > 0){
    
        foreach($preguntas AS $pregunta){

            $respuestas = Respuesta::mostrarRespuestas($pregunta[0], 3, 43);
            $respuesta = $respuestas->fetch();

            if($respuesta['dbPreguntaRespuesta'] != null){

                $pdf->Cell(10, 20, utf8_decode($pregunta[0]), 1, 0, 'C');
                $pdf->Cell(85, 20, utf8_decode($pregunta[1]), 1,0, 'C');
                $pdf->Cell(30, 20, utf8_decode($respuesta[1]), 1, 0, 'C');
                $pdf->Cell(30, 20, utf8_decode($pregunta['dbPregunta']), 1, 0, 'C');
                $pdf->Cell(35, 20, utf8_decode($respuesta[2]), 1, 0, 'C');
                $pdf->Ln();
            }else{

                $pdf->Cell(10, 20, utf8_decode($pregunta[0]), 1, 0, 'C');
                $pdf->Cell(85, 20, utf8_decode($pregunta[1]), 1, 0, 'C');
                $pdf->Cell(95, 20, utf8_decode($respuesta[1]), 1, 0, 'C');
                
                $pdf->Ln();

            }
        }
    }
}

if($respuestas->rowCount() > 0){
    
    foreach($respuestas AS $respuesta){
        if($respuesta['dbPreguntaRespuesta'] != null){
            $pdf->Cell(10, 10, $respuesta[0], 1, 0, 'C');
            $pdf->Ln();
        }
    }
}

$pdf->Output();

?>