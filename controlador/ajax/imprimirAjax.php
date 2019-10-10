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

        .firmas {
            text-align: center;
        }

        .firmas .nombreCompleto {
            margin: 30px 0 0 0;
        }


        .col-ms-6 {
            width: 500px;
            display: inline-block;
        }

        .firmas .firmaAdoptante, .firmas .firmaFundacion {
            height: 130px;
            width: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            // padding: 0 10px;
            color: rgba(0, 0, 0, 0.5);
            font-weight: 400;
        }


        </style>";

    $tables = $css ."<h3 class='header'>FORMULARIO DE ADOPCIÓN PELUDITOS SAN CRISTÓBAL</h3>". $_POST['tables'];

    $pdfImprimir = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8');
    $pdfImprimir->writeHTML($tables);
    $pdfImprimir->output('documento_de_adopcion.pdf', 'D');;

}

?>

