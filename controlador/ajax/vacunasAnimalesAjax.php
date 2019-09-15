<?php

require_once '../../modelo/connect.php';
require_once '../../modelo/vacunas.php';
require_once '../vacunasController.php';

if(isset($_POST['especie']) && !empty($_POST['especie'])){

    VacunasController::añadirVacunasAnimalitos($_POST['especie']);

}elseif(isset($_POST['codsVacunas']) && !empty($_POST['codsVacunas']) && isset($_POST['idAnimal']) && !empty($_POST['idAnimal'])){

    $codsVacunas = explode(',', $_POST['codsVacunas']);

    for($i = 0; $i < count($codsVacunas); $i++){

        VacunasController::aplicarVacunas($codsVacunas[$i], $_POST['idAnimal']);

    }
}

?>