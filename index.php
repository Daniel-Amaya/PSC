<?php

session_start();

require 'vista/header.php';

if(!isset($_SESSION['sesion_rol']) OR empty($_SESSION['sesion_rol'])){

    require 'vista/menu.php';
    require 'vista/general/index/ent.ind.php';
    require 'vista/general/index/adopta.ind.php';
    require 'vista/general/index/message.ind.php';
    require 'vista/general/index/dona.ind.php';

}else if($_SESSION['sesion_rol'] == 'a'){

    require 'vista/admin/menuAdmin.php';
    require 'vista/admin/index/principal.ind.php';
    
}else if($_SESSION['sesion_rol'] == "u"){
   
}

require 'vista/footer.php';

?>