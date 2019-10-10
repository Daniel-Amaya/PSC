<?php 

require '../../modelo/connect.php';
require '../../modelo/solicitudes.php';

// Agregar nueva solicitud ---------------------------------------------------------------------
if(isset($_POST['solicitudU']) && isset($_POST['solicitudA']) && !empty($_POST['solicitudU']) && !empty($_POST['solicitudA'])){

    new Solicitud($_POST['solicitudU'], $_POST['solicitudA'], date('Y/m/d'), 'espera', 0);
// Agregar nueva solicitud ---------------------------------------------------------------------

// Solicitud en estado contactado --------------------------------------------------------------
}elseif(isset($_POST['contactadoCod']) && !empty($_POST['contactadoCod'])){

    Solicitud::updateEstado($_POST['contactadoCod'], 'comunicado', '');
// Solicitud en estado contactado --------------------------------------------------------------

// Solicitud en estado rechazada  --------------------------------------------------------------    
}elseif(isset($_POST['rechazarCod']) && !empty($_POST['rechazarCod'])){

    # Verificar si el administrador envío un mensaje en particular
    if(isset($_POST['mensaje']) && !empty($_POST['mensaje'])){
        require '../../modelo/respuestasAdopcion.php';

        $codRes = explode(',', $_POST['codRespuestas']);

        for($i = 0; $i < count($codRes); $i++){
            Respuesta::deleteRespuesta($codRes[$i]);
        }
        
        Solicitud::updateEstado($_POST['rechazarCod'], 'rechazada', $_POST['mensaje']);
        Solicitud::updateNotificado($_POST['rechazarCod'], 0);
    # Verificar si el administrador envío un mensaje en particular

    }else{

        Solicitud::updateEstado($_POST['rechazarCod'], 'rechazada', 'Lo sentimos, la solicitud de adoptar ha sido rechazada');
// Solicitud en estado contactado --------------------------------------------------------------

    }

// Solicitud en estado a un paso  --------------------------------------------------------------
}elseif(isset($_POST['aunpasoCod']) && !empty($_POST['aunpasoCod'])){

    Solicitud::updateEstado($_POST['aunpasoCod'], 'a un paso', 'Estás a un paso de adoptar, debes llenar el formulario de adopción para completar la adopción');
// Solicitud en estado a un paso  --------------------------------------------------------------

// Cancelar solicitud --------------------------------------------------------------------------
}elseif(isset($_POST['cancelarSoli']) && !empty($_POST['cancelarSoli'])){
    
    Solicitud::deleteSolicitud($_POST['cancelarSoli']);
// Cancelar solicitud --------------------------------------------------------------------------

}

?>