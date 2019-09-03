<?php

session_start();

if(isset($_POST['correo']) && isset($_POST['contrasena'])){
    require '../../modelo/connect.php';
    require '../../modelo/usuarios.php';

    Usuario::iniciarSesion($_POST['correo'], $_POST['contrasena']);
}else{
    echo "Hay campos vacíos";
}

?>