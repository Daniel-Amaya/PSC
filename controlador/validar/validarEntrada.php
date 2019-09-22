<?php

session_start();

if(isset($_SESSION['sesion_rol']) && !empty($_SESSION['sesion_rol']) && isset($_SESSION['sesion_usuario'])){
    if(empty($_SESSION['sesion_usuario'])){

        $_SESSION['sesion_rol'] = '';
        $_SESSION['sesion_usuario'] = null;
        session_destroy();
        echo "<script>alert('Se ha producido un error, vuelve a iniciar sesión'); window.location = 'iniciar-sesion.php';</script> <a href='iniciar-sesion.php'>Volver a iniciar sesión</a> ";

        exit();
    }else{
        return true;
    }
}else{

    $_SESSION['sesion_rol'] = '';
    $_SESSION['sesion_usuario'] = null;
    session_destroy();
    echo "<script>window.location = 'iniciar-sesion.php';</script> <a href='iniciar-sesion.php'>Volver a iniciar sesión</a> "; 
    exit();
    header('location:iniciar-sesion.php');
}
?>