<?php

require '../../modelo/connect.php';
require '../../modelo/solicitudes.php';
require '../solicitudesController.php';
require_once '../../modelo/fotos.php';

SolicitudesController::mostrarSolicitudesAdminIndex('espera');
echo "%%";
SolicitudesController::mostrarSolicitudesAdminIndex('comunicado');
echo "%%";
SolicitudesController::mostrarSolicitudesAdminIndex('a un paso');

?>