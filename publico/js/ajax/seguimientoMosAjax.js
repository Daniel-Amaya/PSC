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

    const objFecha = new Date();
    const calendar = new FullCalendar.Calendar(id('calendar'), {

        locale: 'es',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'moment' ],
        header: {
                left: 'title',
                right: ' today dayGridMonth,timeGridDay'
                // right: 'listYear,listMonth,listDay'
            },
        views: {
            listYear: { buttonText: 'Anual'},
            listMonth: { buttonText: 'Mensual'},
            listWeek: { buttonText: 'Semanal'},
            listDay: { buttonText: 'Diaria'}
            
        },
        navLinks: true,
        footer: {
            left: 'prev,next',
            right: 'listYear,listMonth,listWeek,listDay'
        },
        defaultView: 'listMonth',
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
        selectHelper: true, 
        // validRange: {
        //     start: objFecha.getFullYear()+'-'+(objFecha.getMonth()+1)+'-'+objFecha.getDate()
        //     // end: '2020-01-01'
        // },
        events: 'controlador/ajax/seguimientoAjax.php',

        ////////////////////////// cuando se hace clic en el evento /////////////////////////////
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
            id('numAdo').textContent = info.event.extendedProps.numAdopcion;
            id('fechaAdo').textContent = info.event.extendedProps.fechaAdopcion;

            if(info.event.extendedProps.visitado == 0){
                id('elimSeg').setAttribute('data-cod', info.event.id);
            }else{
                id('elimSeg').setAttribute('data-cod', 'dislabed');
            }


            id('modalInfo').style.display = 'block';
        },

        /////////////////////////// Cuando hace clic en el día ///////////////////////////////////

        dateClick: (info) =>{
            id('start').value = info.dateStr;
            id('ModalAdd').style.display = 'block';
        },

        /////////////////////////// cuando se suelte el evento ///////////////////////////////////
        eventDrop: (info) => {

            cod = info.event.id;
            start = info.event.start;

            fecha = start.getFullYear() +'-'+ (start.getMonth()+1) +'-'+ start.getDate()+' '+start.getHours() +':'+start.getMinutes() +':'+start.getSeconds();

            seguimientoAjax(
                'fechaUp='+fecha+"&codUp="+cod,

                () => {
                    e = ht.responseText.split('&&');
                    if(e[0] != 1){                    
                        info.revert();
                    }else{
                        actualizarSeguimiento();
                        alertAction('Se ha modificado la fecha', color_principal);
                    }
                }, 

                'controlador/ajax/seguimientoAjax.php'
            );
        }
    });

    calendar.render();

    //////////////////////////// Eliminar seguimiento ///////////////////////////////////////////
    id('elimSeg').addEventListener('click', () =>{
        if(id('elimSeg').dataset.cod == 'dislabed'){
            alert("No se puede eliminar el seguimiento porque ya ha sido marcado como visitado");

        }else{

            var confiElim = confirm("¿Seguro que deseas eliminar la visita de seguimiento?");
            if(confiElim == true){
                let cod = id('elimSeg').dataset.cod;
                seguimientoAjax('codEl='+cod, (ht) =>{
                    let e = ht.responseText.split('&&');
                    if(e.length == 2){
                        
                        if(e[0] == '1'){

                            actualizarSeguimiento();
                            alertAction('Se ha eliminado el seguimiento', 'red');
                            calendar.refetchEvents();

                        }else{

                            alert("Ha ocurrido un error, vuelve a intentarlo");

                        }
                    }

                    id('modalInfo').style.display = 'none';
                }, 'controlador/ajax/seguimientoAjax.php');
            }
            
        }

    });

    //////////////////////////////// Agregar seguimiento ////////////////////////////////////////
    id('aggSeg').addEventListener('submit', function(e){

        e.preventDefault();

        let ids = id('adopcion').value.split(',');

        visita = id('title').value;
        idU = ids[0];
        idA = ids[1];
        start = id('start').value;

        seguimientoAjax('fechaVisita='+start+'&visita='+visita+'&idU='+idU+'&idA='+idA, (ht) => {
            e = ht.responseText.split('&&');
            if(e[0] == 1){
                
                actualizarSeguimiento();
                alertAction('Se ha agregado el seguimiento', color_principal);

                calendar.refetchEvents();
            }else{
                alertAction('No se pudo agregar el seguimiento', 'red');
                alert("No se pudo agregar");
            }
        }, 'controlador/ajax/seguimientoAjax.php');

        this.parentNode.parentNode.parentNode.style.display = 'none';
    });

    ////////////////////////// Cosas del seguimiento distintas al calendario /////////////////////
    actualizarSeguimiento = () => {

        seguimientoAjax('', 
        (ht) => {
            let e = ht.responseText.split('&&');
            if(e.length == 2){
                id('visitas').innerHTML = e[0];
                id('visAtrasado').innerHTML = e[1];
            }
        }
        ,'controlador/ajax/seguimientoMosAjax.php');
    }

    actualizarSeguimiento();

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
    window.addEventListener('click', function(e){

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