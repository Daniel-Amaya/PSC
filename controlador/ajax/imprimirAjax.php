<?php

require '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

if(isset($_POST['tables'])){
    
    $css = "
    
        <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .respuestasAdopcion, .datosAdoptante {
            width: 800px;
            // background: url('http://localhost/PSC/publico/images/logo.png');

            // background: red;
        }
        td li,td ol,td ul{
            list-style-type: none;
        }

        .respuestasAdopcion td, .respuestasAdopcion th, .datosAdoptante td, .datosAdoptante th {
            padding: 15px 20px;
            border: solid 0.5px gray;
            display: flex; 
            justify-content: center;
            align-items: center;
            text-align: center;
            align-items: center;
            font-weight: 500 !important;

        }

        .respuestasAdopcion th, .respuestasAdopcion td{
            width: 78px;
        }

        td{
            width: 100px;        
        }

        .respuestasAdopcion td{
            text-align: left;
        }

        .num{
            width: 5px;
        }

        .header{
            text-align: center;
            margin: 30px auto;
        }

        .titulo{
            text-align: center;
            margin: 20px 0;
        }

        
        .recomendaciones {
            text-align: left;
            padding: 10px;
        }

        .recomendaciones .col-ms-6 {
            padding: 0 50px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-ms-6 {
            width: 500px;
            display: inline-block;
        }

        .firmas strong{
            display: block;
            width: 100% !important;
        }

        .informacionAdoptado {
            margin: 0 0 100px 0;
            display: flex;
            padding: 0 200px;
            justify-content: center;
            align-items: center;
        }

        .informacionAdoptado .fotoPerfil {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;
        }

        .informacionAdoptado .fotoPerfil img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .informacionAdoptado .nombreAdoptado, .informacionAdoptado .edadAdoptado, .informacionAdoptado .sexoAdoptado {
            padding: 13px 30px;
        }

        </style>";

    $tables = $css ."<h3 class='header'>FORMULARIO DE ADOPCIÓN PELUDITOS SAN CRISTÓBAL</h3>". $_POST['tables'];

    $pdfImprimir = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8');
    $pdfImprimir->writeHTML($tables);
    $pdfImprimir->output("documento_adopcion_num_{$_GET['ad']}.pdf", 'D');

}

?>

