<?php

require '../../modelo/connect.php';
require '../../modelo/seguimiento.php';

if(isset($_POST['fechaVisita']) && isset($_POST['visita'])){

    new Seguimiento($_POST['fechaVisita'], $_POST['visita'], $_POST['idU'], $_POST['idA']);
}

if(isset($_POST['fechaUp']) && isset($_POST['codUp'])){
    Seguimiento::updateSeguimiento($_POST['codUp'], $_POST['fechaUp']);
}

if(isset($_GET['idU']) && !empty($_GET['idU'])){
    $Seguimiento = Seguimiento::dataDiasSeg($_GET['idU']);
}else{
    $Seguimiento = Seguimiento::dataDiasSeg('');
}

$events = [];
foreach($Seguimiento->fetchAll(PDO::FETCH_ASSOC) AS $fechas){
    if($fechas['start'] < date('Y-m-d') && $fechas['visitado'] != 1){
        $fechas['color'] = "red";
    }elseif($fechas['visitado'] == 1){
        $fechas['backgroundColor'] = 'rgba(100, 100, 100, 0.1)';
        $fechas['textColor'] = 'orange';
        $fechas['borderColor'] = 'orange';
        $fechas['editable'] = false;
    }else{
        $fechas['color'] = "orange";
    }


    $events[] = $fechas;
}

echo json_encode($events);

?>