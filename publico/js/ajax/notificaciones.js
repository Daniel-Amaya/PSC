abrirNotificaciones = () =>{
    noti = id('notificaciones');
    if(noti.style.display == 'none'){
        noti.style.display = 'block';
    }else{
        noti.style.display = 'none';
    }

    if(noti.style.display == 'block'){
        document.addEventListener('click', (e) =>{
            if(e.target != noti){
                noti.style.display = 'none';
            }
        }, true);
    }



}

mostrarNotificaciones = (idU) => {

    var ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            e = this.responseText.split('&&');

            if(e.length > 0){

                var numNotiSinVer = 0;

                for(let i = 0; i < e.length; i++){

                    if(i == e.length-1) break;

                    notificacion = JSON.parse(e[i]);
                    if(notificacion['notificado'] == 0){

                        numNotiSinVer++;

                    }
                    let notif = document.createElement('div'); notif.className = 'notificacion';
                    let notifTitulo = document.createElement('h4'); 
                    if(notificacion['tipoNotificacion'] == 'solicitudAdopcion'){
                        notifTitulo.textContent = 'Solicitud de adopción, adoptar a '+notificacion['nombre'];
                    }
                    let notiCuerpo = document.createElement('p'); notiCuerpo.textContent = notificacion['notificacion'];
                    notif.appendChild(notifTitulo);
                    notif.appendChild(notiCuerpo);
                    id('notificaciones').appendChild(notif);

                }

                let numNoti = document.createElement('span'); numNoti.className = 'numNoti';
                numNoti.textContent = numNotiSinVer;
                if(numNotiSinVer > 0){
                    id('numNoti').appendChild(numNoti);
                }

            }else{
                
            }
        }
    });

    ht.open('POST', 'controlador/ajax/notificacionesUser.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send('idU='+idU);
}