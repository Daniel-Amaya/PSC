(function(){

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
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
        selectHelper: true, 
        events: 'controlador/ajax/eventosAjax.php',

        eventClick: (info) => {
            id('titleE').value = info.event.title;
            id('colorE').value = info.event.color;
            id('idE').value = info.event.id;
            // id('descripEvento').textContent = info.event.extendedProps.descripcion;
            id('ModalEdit').style.display = 'block';
            // id('cerrarEs').modal.style.display = 'none';
        },

        eventDrop: (info) => {
            id = info.event.id;
            start = info.event.start;

            fecha = start.getFullYear() +'-'+ (start.getMonth()+1) +'-'+ start.getDate()+' '+start.getHours() +':'+start.getMinutes() +':'+start.getSeconds();

            eventosAjax('dropId='+id+'&start='+fecha, (ht) =>{
                let e = ht.responseText.split('%%');

                if(e == 1){
                    alertAction('Se ha cambiado la fecha del evento', color_principal);
                }else{
                    alertAction('No es posible cambiar la fecha del evento', 'red');
                }
            });
        
        },
        dateClick: (info) =>{

            id('start').value = info.dateStr;
            id('end').value = info.dateStr;
            id('ModalAdd').style.display = 'block';
        }

    });

    calendar.render();


    eventosAjax = (send, action) =>{

        ht = new XMLHttpRequest;

        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                action(this);
            }
        });
    
        ht.open('POST','controlador/ajax/eventosAjax.php');
        ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); 
        ht.send(send);
    }

    document.addEventListener('DOMContentLoaded', () =>{

        id('addEvent').addEventListener('submit', (e) =>{

            e.preventDefault();
            let titulo = id('title').value;
            let color = id('color').value;
            let start = id('start').value;
            let end = id('end').value;
            let descripcion = id('descripcion').value;

            if(titulo != "" && color != "" && start != "" && end != "" && descripcion != ""){
                eventosAjax('title='+titulo+"&color="+color+"&fechaI="+start+"&fechaF="+end+"&descripcion="+descripcion, (ht) =>{
                    e = ht.responseText.split('%%');

                    if(e[0] == 1){
                        calendar.refetchEvents();
                        alertAction("Se ha agregado el evento", color_principal);
                    }else{
                        console.log(e[0]);
                        alertAction("No es posible agregar el evento", 'red');
                    }

                    id('ModalAdd').style.display = 'none';
                });
            }
        }); 

    });

})();