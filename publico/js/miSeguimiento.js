document.addEventListener('DOMContentLoaded', () =>{

    seguimientoAjax = (send, action, open) => {
    
        ht = new XMLHttpRequest;
        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                action(this);
            }
        });
        ht.open('POST', open);
        ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); 
        ht.send(send);
    }

    const calendar = new FullCalendar.Calendar(id('calendar'), {

        locale: 'es',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'moment' ],
        header: {
                center: 'title',
                right: ' today prev,next dayGridMonth,timeGridDay',
                left: 'listYear,listMonth,listWeek,listDay'

                // right: 'listYear,listMonth,listDay'
            },
        views: {
            listYear: { buttonText: 'Anual'},
            listMonth: { buttonText: 'Mensual'},
            listWeek: { buttonText: 'Semanal'},
            listDay: { buttonText: 'Diaria'}
            
        },
    
        defaultView: 'listMonth',
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
        selectHelper: true, 
        events: 'controlador/ajax/seguimientoAjax.php?idU='+idUsuario,

        /////////////////////////// cuando se hace clic en el evento ///////////////////////////////
        eventClick: (info) => {

            start = info.event.start;
            id('titleSeg').textContent = info.event.title;
            id('fechaHora').textContent = start.getFullYear() +'-'+ (start.getMonth()+1) +'-'+ start.getDate()+' Hora: '+start.getHours() +':'+start.getMinutes() +':'+start.getSeconds(); 
            if(info.event.color == 'red'){
                alert("ESTA VISITA DEBE CAMBIAR DE FECHA O SER MARCADA COMO LLEVADA A A CABO (visitado)");
            }
            id('adoptanteSeg').textContent = info.event.extendedProps.nombre + ' '+info.event.extendedProps.apellidos;
            id('adoptadoSeg').textContent = info.event.extendedProps.adoptado;
            id('direccSeg').textContent = info.event.extendedProps.direccionApto;
            id('numAdo').textContent = info.event.extendedProps.numAdo;
            id('fechaAdo').textContent = info.event.extendedProps.fechaAdopcion;

            id('modalInfo').style.display = 'block';
        }


    });

    calendar.render();

    ////////////////////////// Cosas del seguimiento distintas al calendario /////////////////////
    // actualizarSeguimiento = () => {

    //     seguimientoAjax('', 
    //     (ht) => {
    //         let e = ht.responseText.split('&&');
    //         if(e.length == 2){
    //             id('visitas').innerHTML = e[0];
    //             id('visAtrasado').innerHTML = e[1];
    //         }
    //     }
    //     ,'controlador/ajax/seguimientoMosAjax.php');
    // }

    // actualizarSeguimiento();

    modalSeguiD = (data) => {

        console.log(data);
        id('ttD').textContent = data['visita'];
        id('fhD').textContent = data['fechaVisita'];

        id('ateD').innerHTML = "<a target='_blank' href='usuarios.php?perfil="+data['idU']+"'>"+data['nameUser'] +" "+ data['apellidos'] + "</a>";

        id('atoD').innerHTML = "<a target='_blank' href='animalitos.php?perfil="+data['idA']+"'>"+data['nombre']+"</a>";

        id('telD').textContent = data['telefono'];
        id('diD').textContent = data['direccionApto'];
        id('nadD').innerHTML = "<a target='_blank' href='adoptar.php?adopcion="+data['numAdopcion']+"'>"+data['numAdopcion']+"</a>";
        id('faD').textContent = data['fechaAdopcion'];

        id('seguiD').style.display = 'block';

        id('marVisit').addEventListener('click', () =>{
            seguimientoAjax('codVis='+data['cod'], (ht) =>{
                let e = ht.responseText;
                if(e == 1){
                    actualizarSeguimiento();
                    calendar.refetchEvents();
                    alert("Se ha marcado como visitado esta fecha del seguimiento");
                }else{
                    alert("No es posible actualizar el estado de la visita, actualiza la pagina y vuelve a intentar");
                }

                id('seguiD').style.display = 'none';

            }, 'controlador/ajax/seguimientoMosAjax.php');
        });
    }

    /////////////////////////// Cerrar cualquier modal //////////////////////////////////////////
    // window.addEventListener('click', function(e){

    //     var flex = classNames('flex-modal');

    //     for(let i = 0; i < flex.length; i++){
    //         if(e.target == flex[i]){
    //             flex[i].parentNode.style.display = 'none';
    //         }
    //     }
    // });

    // id('cerrarEs').addEventListener('click', () =>{
    //     id('ModalAdd').style.display = 'none';
    // });
    
});