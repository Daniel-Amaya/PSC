<?php

require 'controlador/validar/validarSesionUsuario.php';

require 'vista/general/adoptar/links.ad.php';
require 'vista/header.php';

if(!isset($_SESSION['sesion_rol']) OR empty($_SESSION['sesion_rol'])){

    require 'vista/menu.php';
    require 'vista/general/adoptar/adopta.ad.php';

}else if($_SESSION['sesion_rol'] == 'a'){
    
    require 'vista/admin/menuAdmin.php';
    require 'vista/admin/adoptar/dtlles.ad.php';

}else if($_SESSION['sesion_rol'] == "u"){

    require 'vista/usuario/menuUser.php';
    require 'vista/usuario/adoptar/animales.ad.php';
    require 'vista/usuario/adoptar/buscador.ad.php';    
    
}

require 'vista/footer.php';

?>