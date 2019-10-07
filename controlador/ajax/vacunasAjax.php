<?php 

require '../../modelo/connect.php';
require '../../modelo/vacunas.php';
require '../vacunasController.php';

if(isset($_POST['especie']) && !empty($_POST['especie'])){

    if(isset($_POST['eliminar']) && !empty($_POST['eliminar'])){
        Vacuna::deleteVacuna($_POST['eliminar']);
    }

    if(isset($_POST['nomVacuna']) && !empty($_POST['nomVacuna']) && isset($_POST['desVacuna']) && !empty($_POST['desVacuna']) && isset($_POST['especieV']) && !empty($_POST['especieV'])){
        new Vacuna($_POST['especieV'], $_POST['nomVacuna'], $_POST['desVacuna']);
    }

    if(isset($_POST['ENV']) && !empty($_POST['ENV']) && isset($_POST['EDV']) && !empty($_POST['EDV']) && isset($_POST['codE']) && !empty($_POST['codE'])){
        Vacuna::updateVacunas($_POST['especie'], $_POST['ENV'], $_POST['EDV'], $_POST['codE']);
    }

    if(isset($_POST['nomBus']) && isset($_POST['desBus'])){

        VacunasController::buscadorVacunas($_POST['especie'], $_POST['nomBus'], $_POST['desBus']);
        
    }else{

        VacunasController::mostrarVacunasCrud($_POST['especie']);

    }
}

?>