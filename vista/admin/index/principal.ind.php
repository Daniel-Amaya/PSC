<section class="padding-menu margin-menu">
    <h2 class='titulo'>Inicio administrador</h2>
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
    
</section>

<script src='publico/js/modal.js'></script>
<script src="publico/js/ajax/adopcion/verSolicitud.js"></script>