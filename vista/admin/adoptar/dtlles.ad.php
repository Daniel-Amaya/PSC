<?php 

require_once 'modelo/connect.php';
require_once 'modelo/adopciones.php';
require_once 'controlador/adopcionesController.php';
require_once 'modelo/solicitudes.php';
require_once 'controlador/solicitudesController.php';

?>

<div class="padding-menu margin-menu">
    <h2 class="titulo">Detalles de las adopciones</h2>

    <div class="row">
        <div class="col-ms-6">
            <div class='divTableDatos'>
                <h3 class="center">Adopciones recientes</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Animalito</th>
                            <th>Adoptante</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    

                        AdopcionesController::adopcionesRecientes();
                        
                        ?>
                    </tbody>
                </table>
            </div>

            <br>

            <div class='divTableDatos'>
                <h3 class="center">Adopciones con compromiso</h3>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Animalito</th>
                            <th>Adoptante</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        AdopcionesController::adopcionesConCompromiso();
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-ms-6">
            <div class="divTableDatos">
                <h3 class='center'>Solicitudes de adopción</h3>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Solicitud de</th>
                            <th>Para adoptar a</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        SolicitudesController::mostrarSolicitudesAlAdmin();
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>

    <div class="divTableDatos">
        <div class="navTable">
            <div class="nombreIndicador" style="width: 90% !important">
                Todas las adopciones
            </div>
            <div class="buscarTable">
                <i class='fas fa-search'></i>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Adoptado</th>
                    <th>Adoptante</th>
                    <th>fecha de adopción</th>
                    <th>Documento legal</th>
                    <th>Compromiso</th>
                </tr>
            </thead>
            <tbody>
                <?php

                AdopcionesController::todasLasAdopciones();
                
                ?>
                
            </tbody>
        </table>
    </div>

    <br>
    <br>
</div>