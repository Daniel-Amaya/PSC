<?php

session_start();

require 'vista/general/donar/links.don.php';
require 'vista/header.php';

if(!isset($_SESSION['sesion_rol']) OR empty($_SESSION['sesion_rol'])){

    require 'vista/header.php';
    require 'vista/menu.php';
    require 'vista/general/donar/dona.don.php';

}else if($_SESSION['sesion_rol'] == 'a'){
    require 'vista/admin/donar/dona.don.ad.php';
    require 'vista/admin/menuAdmin.php';
}else if($_SESSION['sesion_rol'] == "u"){
    require 'vista/usuario/menuUser.php';
    require 'vista/usuario/donar/dona.don.usu.php';
}

require 'vista/footer.php';

?>