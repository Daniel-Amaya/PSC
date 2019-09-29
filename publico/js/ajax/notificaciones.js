abrirNotificaciones = () =>{

    noti = id('notificaciones');

    if(noti.style.display == 'none'){
        noti.style.display = 'block';
        leerNotificaciones();

    }else{
        noti.style.display = 'none';
    }

    // if(noti.style.display == 'block'){
    //     document.addEventListener('click', (e) =>{
    //         if(e.target != noti){
    //             noti.style.display = 'none';
    //         }
    //     }, true);
    // }



}

mostrarNotificaciones = (idU) => {

    var ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            
            if(classNames('sinNotificaciones')[0]) classNames('sinNotificaciones')[0].remove();

            // var notificacionVieja = id('notificaciones').getElementsByClassName('notificacion');
            // for(let i = 0; i < notificacionVieja.length; i++){
            //     notificacionVieja[i].remove();
            // }

            e = this.responseText.split('&&');

            if(e.length > 0){

                var numNotiSinVer = 0;

                for(let i = 0; i < e.length; i++){

                    if(i == e.length-1) break;

                    notificacion = JSON.parse(e[i]);

                    let notif = document.createElement('div'); notif.className = 'notificacion';
                    let notifTitulo = document.createElement('h4'); 

                    if(notificacion['notificado'] == 0){

                        numNotiSinVer++;
                        notif.setAttribute('data-cod', notificacion['cod']);

                    }else{

                        notif.setAttribute('data-codigo', notificacion['cod']);

                    }

                    if(notificacion['tipoNotificacion'] == 'solicitudAdopcion'){
                        notifTitulo.textContent = 'Solicitud de adopción, adoptar a '+notificacion['nombre'];
                    }

                    if(notificacion['estado'] == 'a un paso'){

                        console.log(notificacion);

                        notif.addEventListener('click', () =>{
                            if(notif.dataset.codigo){
                                window.location = 'adopcion.php?solicitud='+ notif.dataset.codigo;
                            }else{
                                window.location = 'adopcion.php?solicitud='+ notif.dataset.cod;
                            }
                        });
                    }
                    let notiCuerpo = document.createElement('p'); notiCuerpo.textContent = notificacion['notificacion'];
                    notif.appendChild(notifTitulo);
                    notif.appendChild(notiCuerpo);
                    id('notificaciones').appendChild(notif);

                }

                let numNoti = document.createElement('span'); numNoti.className = 'numNoti';
                numNoti.textContent = numNotiSinVer;

                if(numNotiSinVer > 0) id('numNoti').appendChild(numNoti);
                

                if(e[0] == ''){

                    let notif = document.createElement('div'); notif.className = 'sinNotificaciones'; 
                    notif.textContent = 'No hay ninguna notificación';
                    id('notificaciones').appendChild(notif);

                }
            }
        }
    });

    ht.open('POST', 'controlador/ajax/notificacionesUser.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send('idU='+idU);
}

leerNotificaciones = () =>{

    var notificacion = id('notificaciones').getElementsByClassName('notificacion');
    var cods = [];
    for(let i = 0; i < notificacion.length; i++){

        if(notificacion[i].dataset.cod) cods.push(notificacion[i].dataset.cod);

    }

    var ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            if(classNames('numNoti')[0]){
                classNames('numNoti')[0].remove();
            }
        }
    });

    ht.open('POST', 'controlador/ajax/notificacionesUser.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send('codsNotificaciones='+cods);

}