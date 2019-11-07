<?php

require '../../modelo/connect.php';
require '../../modelo/eventos.php';

if(isset($_POST['title']) && isset($_POST['color']) && isset($_POST['fechaI']) && isset($_POST['fechaF']) && isset($_POST['descripcion'])){
    new Evento($_POST['title'], $_POST['descripcion'], $_POST['color'], $_POST['fechaI'], $_POST['fechaF']);
}

$eventos = Evento::dataEventos();

$eventosA = [];
foreach($eventos->fetchAll(PDO::FETCH_ASSOC) AS $evento){
    $eventosA[] = $evento;
}

echo json_encode($eventosA);

?>