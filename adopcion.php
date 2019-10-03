<?php

session_start();
// require 'controlador/validar/validarEntrada.php';
require 'vista/admin/adopcion/links.ado.php';
require 'vista/header.php';

if($_SESSION['sesion_rol'] == 'a'){

    require 'vista/admin/menuAdmin.php';
    require 'vista/admin/adopcion/respuestas.ado.php';
    require 'vista/admin/adopcion/cancelarAdopcionModal.php';
    require 'vista/admin/adopcion/entregarEnAdopcionModal.php';

}else if($_SESSION['sesion_rol'] == "u"){

    require 'vista/usuario/menuUser.php';
    require 'vista/usuario/adopcion/formulario.ado.php';
    require 'vista/usuario/adopcion/modal.ado.php';

}

require 'vista/footer.php';


?>