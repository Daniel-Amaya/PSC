<?php


require_once 'modelo/connect.php';
require_once 'modelo/animales.php';
require_once 'controlador/animalesController.php';

if(isset($_GET['perfil']) && !empty($_GET['perfil'])){

    animalesController::mostrarPerfilGeneral($_GET['perfil']);

}else{

    animalesController::mostrarDatosDeTodosGeneral();

}


?>