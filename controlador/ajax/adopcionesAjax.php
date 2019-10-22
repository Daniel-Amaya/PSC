<?php

require '../../modelo/connect.php';
require '../../modelo/solicitudes.php';
require '../../modelo/adopciones.php';
if(isset($_POST['adoptado']) && !empty($_POST['adoptado']) && isset($_POST['solicitud']) && !empty($_POST['solicitud']) && isset($_POST['adoptante']) && !empty($_POST['adoptante']) && isset($_POST['nomAdo']) && !empty($_POST['nomAdo'])){

    $nombreAnimal = $_POST['nomAdo'];
    
    Solicitud::updateEstado($_POST['solicitud'], 'adoptado', "Has completado el proceso de adopción, ahora $nombreAnimal es tu mascota, debes venir a la fundación durante los proximos días para llevar a tu mascota y llenarla de amor ♥, además ya puedes ver los dias en los cuales se te fue asignado el seguimiento en la sección de eventos.");
    Solicitud::updateNotificado($_POST['solicitud'], 0);
    
    Solicitud::updateAdoptadoPorOtro($_POST['adoptante'], $_POST['adoptado']);

    new Adopcion($_POST['adoptante'], $_POST['adoptado'], date('Y-m-d'), null);

}


?>