<?php 

require '../../modelo/connect.php';
require '../../modelo/solicitudes.php';

if(isset($_POST['solicitudU']) && isset($_POST['solicitudA']) && !empty($_POST['solicitudU']) && !empty($_POST['solicitudA'])){

    new Solicitud($_POST['solicitudU'], $_POST['solicitudA'], date('Y/m/d'), 'espera', 'no');
    
}elseif(isset($_POST['contactadoCod']) && !empty($_POST['contactadoCod'])){

    Solicitud::updateEstado($_POST['contactadoCod'], 'comunicado', '');
    
}elseif(isset($_POST['rechazarCod']) && !empty($_POST['rechazarCod'])){

    Solicitud::updateEstado($_POST['rechazarCod'], 'rechazada', 'Lo sentimos, la solicitud de adoptar ha sido rechazada');

}elseif(isset($_POST['aunpasoCod']) && !empty($_POST['aunpasoCod'])){

    Solicitud::updateEstado($_POST['aunpasoCod'], 'a un paso', 'Estás a un paso de adoptar, debes llenar el formulario de adopción para completar la adopción');
    
}elseif(isset($_POST['cancelarSoli']) && !empty($_POST['cancelarSoli'])){
    
    Solicitud::deleteSolicitud($_POST['cancelarSoli']);
}

?>