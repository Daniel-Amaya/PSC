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

mostrarNotificaciones = (idU) =>{

    var ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            e = JSON.parse(this.responseText);
        }
    });

    ht.open('POST', 'controlador/ajax/notificacionesUser.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send('idU='+idU);
}