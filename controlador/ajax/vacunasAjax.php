<?php 

require '../../modelo/connect.php';
require '../../modelo/vacunas.php';
require '../vacunasController.php';

if(isset($_POST['especie']) && !empty($_POST['especie'])){

    if(isset($_POST['eliminar']) && !empty($_POST['eliminar'])){
        Vacuna::deleteVacuna($_POST['eliminar']);
    }

    VacunasController::mostrarVacunasCrud($_POST['especie']);
}


?>