<?php

if(isset($_GET['perfil']) && !empty($_GET['perfil'])){

    require_once 'modelo/animales.php';
    require_once 'controlador/animalesController.php';
    require_once 'modelo/vacunas.php';
    require_once 'controlador/vacunasController.php';
    require_once 'modelo/fotos.php';

    animalesController::mostrarPerfilUsuario($_GET['perfil'], $_SESSION['sesion_usuario']['id']);

}else{

    echo "<div id='animalesUsuario' class='adoptaAnimalitoUser'></div>
    <script src='publico/js/ajax/animalitosUserAjax.js'></script>
";

}


?>