<?php

include '../../modelo/connect.php';
include '../../modelo/animales.php';
include '../../modelo/fotos.php';

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

    $animales = Animal::dataAnimal('');

    if($animales->rowCount() > 0){

        foreach($animales as $datos){

            $fotos = Foto::dataFotos($datos[0]);
            $urlFotoPerfil = $fotos->fetch();

            echo "<div class='card-adopta'>
                <div><img src='publico/images/$urlFotoPerfil[1]'></div>
                <div class='nombre'>$datos[1]</div>
                <div class='info'>Especie: $datos[2]</div>
                <div>
                    <a class='btn_rojo' onclick='eliminarComfirm([$datos[0], \"$datos[9]\"])'>Eliminar</a>
                    <a href='?editar=$datos[0]' class='btn_naranja'>Edit/Ver</a>
                    <a href='?fotos=$datos[0]' class='btn_naranja'>Agg/Bor foto</a>

                </div>
            </div>";

        }
    }else{
        echo "<div class='errNoData'> No hay animalitos agregados <a class='btn_naranja'>Agregar una mascota</a></div>";
    }

}





?>