<?php

require_once '../../modelo/connect.php';
require_once '../../modelo/animales.php';
require_once '../animalesController.php';
require_once '../../modelo/vacunas.php';
require_once '../vacunasController.php';
require_once '../../modelo/fotos.php';

if(isset($_POST['idU'])){

    if(isset($_POST['nombreB']) && isset($_POST['especieB']) && isset($_POST['razaB']) && isset($_POST['colorB']) && isset($_POST['sexoB'])){

        AnimalesController::buscarAnimalitosUser($_POST['idU'], $_POST['nombreB'], $_POST['especieB'], $_POST['razaB'], $_POST['colorB'], $_POST['sexoB']);

    }else{

        AnimalesController::mostrarDatosDeTodosUsuario($_POST['idU']);

    }

}




?>