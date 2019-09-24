
solicitarAdopcion = (nombre, foto, idAnimal, idUsuario) => {
    
    id('nombreSoli').textContent = nombre;
    id('fotoSoli').src = foto;
    id('solicitudModal').style.display = 'block';

    id('solicitar').addEventListener('click', llamarSolicitud);

    function llamarSolicitud(){
        
        ht = new XMLHttpRequest;

        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText == '1'){

                    alert('Se ha enviado la solicitud de adopción');
                    window.location = 'index.php';

                }else{
                    alert('No es posible solicitar la adopción, intenta de nuevo');
                }
            }
        });
    
        ht.open('POST','controlador/ajax/solicitudesAjax.php');
        ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
        ht.send('solicitudU='+idUsuario+'&solicitudA='+idAnimal);
    }

    id('cancelar').addEventListener('click', () =>{

        id('solicitudModal').style.display = 'none';
        id('solicitar').removeEventListener('click', llamarSolicitud);
        id('nombreSoli').textContent = '';
        id('fotoSoli').src = '';

    });

    document.addEventListener('click', (e) => {

        if(e.target == id('flex-modalSoli')){

            id('solicitudModal').style.display = 'none';
            id('solicitar').removeEventListener('click', llamarSolicitud);
            id('nombreSoli').textContent = '';
            id('fotoSoli').src = '';

        }

    });
}


