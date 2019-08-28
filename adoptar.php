<?php

require 'vista/header.php';

if(1 == 2){
    require 'vista/menu.php';
    require 'vista/general/adoptar/adopta.ad.php';
    require 'vista/footer.php';

}else{
    
    require 'vista/admin/menuAdmin.php';
    require 'vista/admin/adoptar/animalitos.ad.php';
    require 'vista/admin/adoptar/form_1.ad.php';
    require 'vista/admin/adoptar/form_2.ad.php';
    require 'vista/admin/adoptar/form_3.ad.php';
    require 'vista/admin/adoptar/formEditAn.ad.php';
    require 'vista/footer.php';
}

?>