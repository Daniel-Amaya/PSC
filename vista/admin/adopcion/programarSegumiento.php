<div class="padding-menu margin-menu" id="seguimiento">
    <h2 class="textoDeTitulo">Ahora <span id='nomA'></span> es la mascota de <span id='nomU'></span>, debes avisarle que día puede venir a la fundación por su nueva mascota, además programar las visitas de seguimiento que se realizan a los adoptados y adoptantes. </h2>

    <div id="calendar">

    </div>
</div>

<script src='publico/js/fullcalendar-4.3.1/packages/core/main.js'></script>
<script src='publico/js/fullcalendar-4.3.1/packages/interaction/main.js'></script>
<script src='publico/js/fullcalendar-4.3.1/packages/daygrid/main.js'></script>
<script src='publico/js/fullcalendar-4.3.1/packages/timegrid/main.js'></script>
<script src='publico/js/fullcalendar-4.3.1/packages/list/main.js'></script>
<script src='publico/js/fullcalendar-4.3.1/packages/core/locales/es.js'></script>

<script>

seguimientoAjax = (send, action) => {
    
    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            action(this);
        }
    });

    ht.open('POST','controlador/ajax/seguimientoAjax.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); 
    ht.send(send);
}


document.addEventListener('DOMContentLoaded', function(){

    const calendar = new FullCalendar.Calendar(id('calendar'), {

        locale: 'es',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listWeek',
            },
            
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
        selectHelper: true, 
        events: 'controlador/ajax/seguimientoAjax.php',
        dateClick: (info) =>{
            id('start').value = info.dateStr;
            id('ModalAdd').style.display = 'block';
        },
        eventClick: (info) =>{
            id('titleSeg').textContent = info.event.title;
            id('fechaHora').textContent = info.event.start; 
            // id('adoptanteSeg').textContent = info.event.nombre + info.event.apellidos;
            id('adoptadoSeg').textContent = info.event.adoptado;
            id('direccSeg').textContent = info.event.direccionApto;
            id('numAdo').textContent = info.event.numAdo;
            id('fechaAdo').textContent = info.event.fechaAdopcion;

            id('modalInfo').style.display = 'block';
        }

    });

    calendar.render();

    id('newE').addEventListener('submit', function(e){
    
        e.preventDefault();

        visita = id('title').value;
        idU = 15;
        idA = 62;
        start = id('start').value;

        seguimientoAjax('fechaVisita='+start+'&visita='+visita+'&idU='+idU+'&idA='+idA, (ht) => {
            e = ht.responseText.split('&&');
            if(e[0] == 1){
                calendar.refetchEvents();
            }else{
                alert("No se pudo agregar");
            }
        });

        this.parentNode.parentNode.parentNode.style.display = 'none';
    });

    // id('')


});



</script>


