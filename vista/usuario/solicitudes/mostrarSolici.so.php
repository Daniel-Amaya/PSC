<div class="margin-menu padding-menu">
    
    <h2 class="titulo">Todas mis solicitudes</h2>

    <?php

    require 'modelo/solicitudes.php';
    require 'controlador/solicitudesController.php';

    SolicitudesController::mostrarSolicitudesUsuario($datosDelUsuario['id']);

    ?>

</div>