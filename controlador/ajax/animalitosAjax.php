<?php

include '../../modelo/connect.php';
include '../../modelo/animales.php';
include '../../modelo/fotos.php';
require '../animalesController.php';

// Agregar animalito

if(isset($_POST['nombreAn']) && isset($_POST['especie']) && isset($_POST['raza']) && isset($_POST['color']) &&isset($_POST['sexo']) && isset($_POST['esterilizado']) && isset($_POST['descripcion']) && isset($_POST['procedencia'])){

    $animal = new Animal($_POST['nombreAn'], $_POST['especie'], $_POST['raza'], $_POST['color'], $_POST['sexo'], $_POST['esterilizado'], $_POST['descripcion'], $_POST['procedencia']);

}else{

    // Eliminar animalitos

    if(isset($_POST['eliminar']) && !empty($_POST['eliminar']) && isset($_POST['folder'])){
        $delete = Animal::deleteAnimal($_POST['eliminar']);
        require "../carpetasController.php";

        $eliminarCarpetaDeImagenes = Carpetas::eliminarCarpeta($_POST['folder']);
    }

    // Editar animalitos

    if(isset($_POST['nombreE']) && isset($_POST['especieE']) && isset($_POST['razaE']) && isset($_POST['colorE']) &&isset($_POST['sexoE']) && isset($_POST['esterilizadoE']) && isset($_POST['descripcionE']) && isset($_POST['procedenciaE']) && $_POST['idE']){
        Animal::editAnimal($_POST['nombreE'], $_POST['especieE'], $_POST['razaE'], $_POST['colorE'], $_POST['sexoE'], $_POST['esterilizadoE'], $_POST['descripcionE'], $_POST['procedenciaE'], $_POST['idE']);
    }
    // Mostrar animalitos

    if(isset($_POST['buscar']) && !empty($_POST['buscar'])){
        if(isset($_POST['nombreB'])  && isset($_POST['especieB']) && isset($_POST['razaB']) && isset($_POST['colorB']) && isset($_POST['sexoB'])){

            AnimalesController::mostrarCoincidenciasAdmin($_POST['nombreB'], $_POST['especieB'], $_POST['razaB'], $_POST['colorB'], $_POST['sexoB']);
        }else{
            
            AnimalesController::mostrarAnimalitosAdmin();
        }
    }else{
        AnimalesController::mostrarAnimalitosAdmin();
    }
    

}





?>