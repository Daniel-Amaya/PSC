<?php

require '../../modelo/connect.php';
require '../../modelo/eventos.php';

$eventos = Evento::dataEventos();

$eventosA = [];
foreach($eventos->fetchAll(PDO::FETCH_ASSOC) AS $evento){
    $eventosA[] = $evento;
}

echo json_encode($eventosA);

?>