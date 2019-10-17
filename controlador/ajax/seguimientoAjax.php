<?php

require '../../modelo/connect.php';
require '../../modelo/seguimiento.php';

if(isset($_POST['fechaVisita']) && isset($_POST['visita'])){

    new Seguimiento($_POST['fechaVisita'], $_POST['visita'], $_POST['idU'], $_POST['idA']);
}

$Seguimiento = Seguimiento::dataDiasSeg();

$events = [];
foreach($Seguimiento->fetchAll(PDO::FETCH_ASSOC) AS $fechas){
    // $fechas['color'] = "black";
    $events[] = $fechas;
}

echo json_encode($events);

?>