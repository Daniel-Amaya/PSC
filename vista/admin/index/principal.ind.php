<section class="padding-menu margin-menu">
    <h3 class='titulo'>Inicio administrador</h3>

    <ul class="navegador-tabs">
        <li class="tabsItemUser tabSelection"><strong>Solicitudes</strong></li>
        <li class="tabsItemUser"><strong>Formularios diligenciados</strong></li>
        <li class="tabsItemUser"><strong>Visitas de seguimiento</strong></li>
        <li class="tabsItemUser"><strong>Información</strong></li>
    </ul>

    <div class="tabBox">
        <!-- Solicitudes en espera -->

        <div class="divTableDatos">

            <div class="navTable">
                <h2 class='center' style="margin: auto">Solicitudes de adopción</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Solicitud de</th>
                        <th>Para adoptar a </th>
                        <th>Fecha solicitud</th>
                        <th>Comunicarse a</th>
                    </tr>
                </thead>
                <tbody id='soliEspera'>

                </tbody>
            </table>

        </div>

        <!-- Solicitudes en comunicado -->

        <div class="divTableDatos" style='margin: 20px auto'>
            <div class="navTable">
                <h2 class='center' style="margin: auto">Solicitudes de contactados</h2>
            </div>

            <table class='soliComunicadas'>
                <thead>
                    <tr>
                        <th></th>
                        <th>Solicitud de</th>
                        <th>Para adoptar a </th>
                        <th>Fecha solicitud</th>
                    </tr>
                </thead>
                <tbody id='soliComunicadas'>

                </tbody>
            </table>
        </div>

        <!-- Solicitudes a un paso -->

        <div class="divTableDatos">
            <div class="navTable">
                <h2 class='center' style="margin: auto">Solicitudes a un paso</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Solicitud de</th>
                        <th>Para adoptar a </th>
                        <th>Fecha solicitud</th>
                    </tr>
                </thead>
                <tbody id='soliA1Paso'>

                </tbody>
            </table>
        </div>
    </div>

    <div class="tabBox">

          <!-- Solicitudes en procesando adopción -->

        <div class="divTableDatos">

            <div class="navTable">
                <h2 class='center' style="margin: auto">Ver respuestas al formulario</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Solicitud de</th>
                        <th>Para adoptar a </th>
                        <th>Fecha de solicitud</th>
                    </tr>
                </thead>
                <tbody id='soliProcesando'>

                </tbody>
            </table>

        </div>
    </div>

    <div class="tabBox">
    <?php 
        require 'modelo/seguimiento.php';
        require 'controlador/seguimientoController.php';
        // SeguimientoController::dataDiasSeg('');
    ?>
        <!-- Visitas de seguimiento -->
        <div class="row">
            <div class="col-500-6 center">
                <h3 class="titulo" style='margin-top: 10px'>Visitas programadas para el dia de hoy</h3>
                <?php SeguimientoController::seguimientoDiarioAdmin(); ?>
            </div>
        </div>
    

    </div>

    <div class="tabBox">

    </div>

    
</section>

<script src='publico/js/modal.js'></script>
<script src="publico/js/ajax/adopcion/verSolicitud.js"></script>
<script src="publico/js/tabs.js"></script>