<div class="padding-menu margin-menu" id="seguimiento">
    <h2 class="textoDeTitulo">Ahora <span id='nomA'></span> es la mascota de <span id='nomU'></span>, debes avisarle que día puede venir a la fundación por su nueva mascota, además programar las visitas de seguimiento que se realizan a los adoptados y adoptantes. </h2>

    <div id="calendar">

    </div>
</div>


<script src="publico/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="publico/js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src='publico/js/moment.min.js'></script>
<script src='publico/js/fullcalendar/fullcalendar.min.js'></script>
<script src='publico/js/fullcalendar/fullcalendar.js'></script>
<script src='publico/js/fullcalendar/locale/es.js'></script>

<script>

añadirSeg =() =>{

    visita = id('title').value;
    // idU = id('idU').value;
    // idA = id('idA').value;
    // start = id('start').value;
    // color = id('color').value;

    idU = 15;
    idA = 62;
    start = id('start').value;
    color = id('color').value;

    $.ajax({
        url: 'controlador/ajax/seguimientoAjax.php',
        type: 'POST',
        data: {'fechaVisita':start, 'visita':visita, 'idU':idU, 'idA': idA, 'color':color},

        success: function(rep){
            console.log(rep);

            e = rep.split('&&');
            if(e[0] == 1){
                calendarAjaxR();
            }else{
                alert("No se pudo agregar");
            }
        }
    });
}

// $(document).ready(function() {

    id('newE').addEventListener('submit', function(e){
    
        e.preventDefault();
        añadirSeg();
    });



function calendarAjaxR(){

    $.ajax({
        url: 'controlador/ajax/seguimientoAjax.php',
        type: "POST",
        data: '',
        success: function(rep) {

            var date = new Date();
            var yyyy = date.getFullYear().toString();
            var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
            var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
                
            $('#calendar').fullCalendar({
                
                header: {
                    language: 'es',
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay',

                },
                defaultDate: yyyy+"-"+mm+"-"+dd,
                editable: true,
                // eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                events: JSON.parse(rep),
                select: function(start, end) {
                    
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');

                },
                eventRender: function(event, element) {
                    element.bind('click', function() {
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #title').val(event.title);
                        $('#ModalEdit #color').val(event.color);
                        $('#ModalEdit').modal('show');
                    });
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position

                    edit(event);

                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                    edit(event);

                }
            
            });
            
            function edit(event){

                start = event.start.format('YYYY-MM-DD HH:mm:ss');
                
                id =  event.id;
                
                Event = [];
                Event[0] = id;
                Event[1] = start;
                
                $.ajax({
                url: 'controlador/ajax/seguimientoAjax.php',
                type: "POST",
                data: {Event:Event},
                success: function(rep) {
                        e = rep.split('&&');
                        if(rep[0] == '1'){
                            alert('Evento se ha guardado correctamente');
                        }else{
                            alert('No se pudo guardar. Inténtalo de nuevo.'); 
                        }
                    }
                });
            }

        }
    });
}

calendarAjaxR();

// });

</script>


