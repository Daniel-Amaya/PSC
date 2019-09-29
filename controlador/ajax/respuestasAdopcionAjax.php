<?php

require '../../modelo/connect.php';
require '../../modelo/usuarios.php';
require '../../modelo/respuestasAdopcion.php';
require '../../modelo/solicitudes.php';
require '../carpetasController.php';

if(isset($_POST['idU']) && !empty($_POST['idU'])&& isset($_POST['estadoCivil']) && !empty($_POST['estadoCivil']) && isset($_POST['nombreReferencia']) && !empty($_POST['nombreReferencia']) && isset($_POST['telefonoReferencia']) && !empty($_POST['telefonoReferencia']) && isset($_POST['direccionApto']) && !empty($_POST['direccionApto']) && isset($_POST['idA']) && !empty($_POST['idA']) && isset($_POST['codSoli']) && !empty($_POST['codSoli']) && isset($_POST['correo']) && !empty($_POST['correo'])){

    Usuario::updateAsNull($_POST['estadoCivil'], $_POST['direccionApto'], $_POST['nombreReferencia'], $_POST['telefonoReferencia'], $_POST['idU']);    

        Solicitud::updateEstado($_POST['codSoli'], 'procesando adopción', 'El administrador está mirando tus respuestas y agregando la firma de la fundación para que puedas adoptar');

        Solicitud::updateNotificado($_POST['codSoli'], 0);

        Carpetas::subirFirma($_POST['correo'], $_FILES['firma']['name'], $_FILES['firma']['tmp_name']);

    for($i = 1; $i < 27; $i++){
    
        if(isset($_POST[$i]) && isset($_POST['db'.$i])){
            
            new Respuesta($_POST[$i], $_POST['db'.$i], $i, $_POST['idU'], $_POST['idA']);

        }else if(isset($_POST[$i])){

            new Respuesta($_POST[$i], null, $i, $_POST['idU'], $_POST['idA']);

        }

    }
    
}

?>