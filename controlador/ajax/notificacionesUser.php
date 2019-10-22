<?php

require '../../modelo/connect.php';
require '../../modelo/solicitudes.php';
require '../solicitudesController.php';
require '../../modelo/seguimiento.php';
require '../seguimientoController.php';


if(isset($_POST['idU']) && !empty($_POST['idU'])){

    SeguimientoController::notificaciones($_POST['idU']);
    SolicitudesController::notificaciones($_POST['idU']);
    
}elseif(isset($_POST['codsNotificaciones']) && !empty($_POST['codsNotificaciones'])){

    $cod = explode(',', $_POST['codsNotificaciones']);

    for($i = 0; $i < count($cod); $i++){

        Solicitud::updateNotificado($cod[$i], 1);

    }
}


?>