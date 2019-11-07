<div class="message grid">
    <div class="media">
        <div class="panda">
            <div class="carita">
                <div class="oreja-d"></div>
                <div class="oreja-i"></div>
                <div class="ojo-d">
                    <div class="pupila"></div>
                </div>
                <div class="ojo-i">
                    <div class="pupila"></div>
                </div>
                <div class="nariz"></div>
            </div>
            <div class="mano-d"></div>
            <div class="mano-i"></div>

            <div class="pie-d"></div>
            <div class="pie-i"></div>

            <div class="sombra"></div>


        </div>
    </div>
    <div class="info-message">
        <h2> ¡Vamos a salvar el planeta!</h2>
        Ayudar a los animales también implica cuidar el medio ambiente
    </div>
</div>


<div class="calendarIndex">

    <div class="center">
        <h1>Calendario de eventos</h1>
        <p class="lead">¡Mira aquí los proximos eventos de la fundación!</p>
    </div>
    <br>

    <div id="calendar">
    </div>

</div>

<!-- Modal ver--> 
<div class="modal" id="modalEvent">
    <div class="flex-modal" role="document">
        <div class="contenido-modal">
            <div class="modal-header">
                <h4 class="center">Información del evento</h4>
            </div>
            <div class="modal-body">
                <h3 class="tituloModal" id='nombreEvento'></h3>
                <h4 class="descripModal" id='descripEvento'></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn_rojo" id='cerrarEs'>Cerrar</button>

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
<script src='publico/js/modal.js'></script>

<script>
    const calendar = new FullCalendar.Calendar(id('calendar'), {

        locale: 'es',
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list', 'moment'],
        header: {
            center: 'title',
            right: ' today prev,next',
            left: 'dayGridMonth,listWeek,listDay'

        },
        views: {
            listWeek: {
                buttonText: 'Semana'
            },
            listDay: {
                buttonText: 'Dia'
            }
        },
        eventClick: (info) => {
            id('nombreEvento').textContent = info.event.title;
            id('descripEvento').textContent = info.event.extendedProps.descripcion;
            id('modalEvent').style.display = 'block';
            id('cerrarEs').modal.style.display = 'none';
        },

        editable: false,

        events: 'controlador/ajax/eventosAjax.php'

    });

    calendar.render();
</script>