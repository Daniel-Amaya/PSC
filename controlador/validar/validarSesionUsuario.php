<?php

session_start();

if(!isset($_SESSION['sesion_usuario']) OR empty($_SESSION['sesion_usuario'])){

    session_destroy();

    $_SESSION['sesion_rol'] = '';
    $_SESSION['sesion_usuario'] = null;
    
}

?>