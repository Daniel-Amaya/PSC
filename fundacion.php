<?php
require 'controlador/validar/validarSesionUsuario.php';

require 'vista/general/fundacion/links.fund.php';
require 'vista/header.php';

if(!isset($_SESSION['sesion_rol']) OR empty($_SESSION['sesion_rol'])){

    require 'vista/menu.php';

}else if($_SESSION['sesion_rol'] == 'a'){

    require 'vista/admin/menuAdmin.php';    

}else if($_SESSION['sesion_rol'] == "u"){

    require 'vista/usuario/menuUser.php';

}

require 'vista/general/fundacion/quienes.fund.php';

require 'vista/footer.php';

?>