<?php


require_once 'modelo/connect.php';
require_once 'modelo/animales.php';
require_once 'controlador/animalesController.php';
require_once 'modelo/vacunas.php';
require_once 'controlador/vacunasController.php';
require_once 'modelo/fotos.php';

if(isset($_GET['perfil']) && !empty($_GET['perfil'])){

    animalesController::mostrarPerfilUsuario($_GET['perfil'], $_SESSION['sesion_usuario']['id']);

}else{

    animalesController::mostrarDatosDeTodosUsuario($_SESSION['sesion_usuario']['id']);

}


?>