<?php

if(isset($_GET['editar']) && !empty($_GET['editar'])){

    require_once 'modelo/animales.php';
    require_once 'controlador/animalesController.php';

    AnimalesController::formularioEditarAnimalito($_GET['editar']);

}elseif(isset($_GET['fotos']) && !empty($_GET['fotos'])){

    require_once 'modelo/animales.php';
    require_once 'modelo/fotos.php';
    require_once 'controlador/animalesController.php';

    AnimalesController::mostrarYeliminarFotos($_GET['fotos']);

}


?>