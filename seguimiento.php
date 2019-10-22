<?php

session_start();

// require 'controlador/validar/validarEntrada.php';
// require 'controlador/validar/validarAdmin.php';
require 'vista/admin/seguimiento/links.seg.php';
require 'vista/header.php';

if($_SESSION['sesion_rol'] == 'a'){

    require 'vista/admin/menuAdmin.php';
    require 'vista/admin/seguimiento/fechas.seg.php';
    require 'vista/admin/seguimiento/seguimientoModales.seg.php';

}else if($_SESSION['sesion_rol'] == "u"){

    require 'vista/usuario/menuUser.php';
    require 'vista/usuario/seguimiento/fechas.seg.php';
    
}

require 'vista/footer.php';

?>