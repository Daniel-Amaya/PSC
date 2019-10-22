<?php 

require '../../modelo/connect.php';
require '../../modelo/seguimiento.php';
require '../seguimientoController.php';

if(isset($_POST['codVis']) && !empty($_POST['codVis'])){

    Seguimiento::updateVisitado($_POST['codVis']);

}else{

    SeguimientoController::seguimientoDiarioAdmin();
    echo "&&";
    SeguimientoController::seguimientoAtrasadoAdmin();

}

?>