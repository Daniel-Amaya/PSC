<div class="padding-menu margin-menu">
    <?php 
    require 'modelo/seguimiento.php';
    require 'modelo/animales.php';
    require 'controlador/seguimientoController.php';
    require 'controlador/get/seguimientoAdmin.php';
     ?>

    <div id="todosLosSeg">
        <h3 class="textoDeTitulo">Todas las visitas programadas por seguimiento aparecerán aquí, has clic en una visita para ver toda la información, además puedes usar los botones para ver las visitas programadas durante todo el año, el mes, la semana o el dia.</h3>

        <div class='row segHoy'>
            <button class='btn_naranja'>Visitas de hoy:</button> 
            <i class="fas fa-arrow-right"></i>
            <div id="visitas">

            </div>
        </div>

        <div class="row">
            <div class="col-500-7" style='width:58.3%'>
                <div id="calendar"></div>
            </div>
            <div class="col-500-5" style='width:41.7%'>
                <div class="divTableDatos">
                    <h3 class='center'>Visitas que deben ser aplazadas o señaladas como llevadas a cabo:</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Visita</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody id='visAtrasado'>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>

<script src='publico/js/fullcalendar-4.3.1/packages/core/main.js'></script>
<script src='publico/js/fullcalendar-4.3.1/packages/interaction/main.js'></script>
<script src='publico/js/fullcalendar-4.3.1/packages/daygrid/main.js'></script>
<script src='publico/js/fullcalendar-4.3.1/packages/timegrid/main.js'></script>
<script src='publico/js/fullcalendar-4.3.1/packages/list/main.js'></script>
<script src='publico/js/fullcalendar-4.3.1/packages/core/locales/es.js'></script>

<script src="publico/js/ajax/seguimientoMosAjax.js"></script>