<div class="padding-menu margin-menu" id="seguimiento" style="display:none">
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

    const objFecha = new Date();
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
        validRange: {
            start: objFecha.getFullYear()+'-'+(objFecha.getMonth()+1)+'-'+objFecha.getDate()
        },
        dateClick: (info) => {
            id('start').value = info.dateStr;
            id('ModalAdd').style.display = 'block';
        },
        eventClick: (info) => {

            start = info.event.start;
            id('titleSeg').textContent = info.event.title;
            id('fechaHora').textContent = start.getFullYear() +'-'+ (start.getMonth()+1) +'-'+ start.getDate()+' Hora: '+start.getHours() +':'+start.getMinutes() +':'+start.getSeconds(); 
            if(info.event.backgroundColor == 'red'){
                alert("ESTA VISITA DEBE CAMBIAR DE FECHA O SER MARCADA COMO LLEVADA A A CABO (visitado)");
            }
            id('adoptanteSeg').textContent = info.event.extendedProps.nombre + ' '+info.event.extendedProps.apellidos;
            id('adoptadoSeg').textContent = info.event.extendedProps.adoptado;
            id('direccSeg').textContent = info.event.extendedProps.direccionApto;
            id('numAdo').textContent = info.event.extendedProps.numAdopcion;
            id('fechaAdo').textContent = info.event.extendedProps.fechaAdopcion;

            id('elimSeg').setAttribute('data-cod', info.event.id);

            id('modalInfo').style.display = 'block';

        },
        eventDrop: (info) => {
            cod = info.event.id;
            start = info.event.start;

            fecha = start.getFullYear() +'-'+ (start.getMonth()+1) +'-'+ start.getDate()+' '+start.getHours() +':'+start.getMinutes() +':'+start.getSeconds();

            seguimientoAjax('fechaUp='+fecha+"&codUp="+cod, () =>{
                e = ht.responseText.split('&&');
                if(e[0] != 1){                    
                    info.revert();
                }else{
                    alertAction('Se ha modificado la fecha', color_principal);
                    
                }
            });
        }

    });

    calendar.render();

    id('newE').addEventListener('submit', function(e){
    
        e.preventDefault();

        visita = id('title').value;
        idU = id('idU').value;
        idA = id('idA').value;
        start = id('start').value;

        seguimientoAjax('fechaVisita='+start+'&visita='+visita+'&idU='+idU+'&idA='+idA, (ht) => {
            e = ht.responseText.split('&&');
            if(e[0] == 1){
                alertAction('Se ha agregado el seguimiento', color_principal);
                calendar.refetchEvents();
            }else{
                alert("No se pudo agregar");
            }
        });

        this.parentNode.parentNode.parentNode.style.display = 'none';
    });

    id('elimSeg').addEventListener('click', () =>{
        if(id('elimSeg').dataset.cod = 'dislabed'){
            alert("No se puede eliminar el seguimiento porque ya ha sido marcado como visitado");

        }else{

            var confiElim = confirm("¿Seguro que deseas eliminar la visita de seguimiento?");
            if(confiElim == true){
                let cod = id('elimSeg').dataset.cod;
                seguimientoAjax('codEl='+cod, (ht) =>{
                    let e = ht.responseText.split('&&');
                    alert(e);
                    if(e.length == 2){
                        
                        if(e[0] == '1'){

                            alertAction('Se ha eliminado el seguimiento', color_principal);
                            calendar.refetchEvents();

                        }else{

                            alertAction('No ha sido posible eliminar el seguimiento', 'red');
                            

                        }
                    }

                    id('modalInfo').style.display = 'none';
                }, 'controlador/ajax/seguimientoAjax.php');
            }
            
        }

    });

    window.addEventListener('click',function(e){

        var flex = classNames('flex-modal');

        for(let i = 0; i < flex.length; i++){
            if(e.target == flex[i]){
                flex[i].parentNode.style.display = 'none';
            }
        }
    });

    id('cerrarEs').addEventListener('click', () =>{
        id('ModalAdd').style.display = 'none';
    });

});


</script>


