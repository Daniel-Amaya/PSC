<?php

include '../../modelo/connect.php';
include '../../modelo/animales.php';
include '../../modelo/fotos.php';


if(isset($_POST['eliminar']) && !empty($_POST['eliminar']) && isset($_POST['folder'])){
    $delete = Animal::deleteAnimal($_POST['eliminar']);
    require "../carpetasController.php";

    $eliminarCarpetaDeImagenes = Carpetas::eliminarCarpeta($_POST['folder']);
}


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
                <a class='btn_rojo' onclick='animalesAjax(\"eliminar=$datos[0]&folder=$datos[9]\")'>Eliminar</a>
                <a href='' class='btn_naranja'>Edit/Ver</a>
                <a href='' class='btn_naranja'>Agregar foto</a>

            </div>
        </div>";
    }
}else{
    echo "<div class='errNoData'> No hay animalitos agregados <a class='btn_naranja'>Agregar una mascota</a></div>";
}




?>