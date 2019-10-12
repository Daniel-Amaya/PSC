<?php

session_start();
// require 'controlador/validar/validarEntrada.php';
require 'vista/usuario/solicitudes/links.so.php';
require 'vista/header.php';

if($_SESSION['sesion_rol'] == 'a'){

    require 'vista/admin/menuAdmin.php';

}else if($_SESSION['sesion_rol'] == "u"){

    require 'vista/usuario/menuUser.php';
    require 'vista/usuario/solicitudes/mostrarSolici.so.php';

}

require 'vista/footer.php';


?>