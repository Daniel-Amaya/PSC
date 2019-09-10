<?php

session_start();

require 'vista/general/adoptar/links.ad.php';
require 'vista/header.php';

if(!isset($_SESSION['sesion_rol']) OR empty($_SESSION['sesion_rol'])){

    require 'vista/menu.php';
    require 'vista/general/adoptar/adopta.ad.php';

}else if($_SESSION['sesion_rol'] == 'a'){
    
    require 'vista/admin/menuAdmin.php';
    require 'vista/admin/adoptar/animalitos.ad.php';
    require 'vista/admin/adoptar/form_1.ad.php';
    require 'vista/admin/adoptar/form_2.ad.php';
    require 'vista/admin/adoptar/form_3.ad.php';
    require 'vista/admin/adoptar/formEditAn.ad.php';

}else if($_SESSION['sesion_rol'] == "u"){

    require 'vista/usuario/menuUser.php';    
}

require 'vista/footer.php';

?>