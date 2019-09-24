<?php

require '../../modelo/connect.php';
require '../../modelo/solicitudes.php';
require '../solicitudesController.php';

if(isset($_POST['idU']) && !empty($_POST['idU'])){

    SolicitudesController::notificaciones($_POST['idU']);
    
}


?>