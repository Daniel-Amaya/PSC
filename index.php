<?php

    require 'vista/header.php';

if(1 == 2){

    require 'vista/menu.php';
    require 'vista/general/index/ent.ind.php';
    require 'vista/general/index/adopta.ind.php';
    require 'vista/general/index/message.ind.php';
    require 'vista/general/index/dona.ind.php';
    
}else{
    require 'vista/admin/menuAdmin.php';
    require 'vista/admin/index/principal.ind.php';
}
    require 'vista/footer.php';

?>