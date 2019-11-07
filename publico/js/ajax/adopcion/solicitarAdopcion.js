(function(){

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

                    alertAction('Se ha enviado la solicitud de adopción', color_principal);
                    animalitosUserAjax('idU='+idUsuario, mostrarAnimalitos);
                    id('solicitudModal').style.display = 'none';
                    
                }else{
                    alertAction('No es posible solicitar la adopción, intenta de nuevo', 'red');
                }
            }
        });
    
        ht.open('POST','controlador/ajax/solicitudesAjax.php');
        ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
        ht.send('solicitudU='+idUsuario+'&solicitudA='+idAnimal);

        loadAjax(ht);
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

cancelarSolicitud = (codSolicitud) => {
    confirmar = confirm("¿Seguro que desea cancelar la solicitud de adopción?", 'Cancelar solicitud', 'Volver');

    if(confirmar == true){

        ht = new XMLHttpRequest;

        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText == '1'){

                    alertAction('Se ha cancelado la solicitud de adopción', 'sienna');
                    animalitosUserAjax('idU='+idUsuario, mostrarAnimalitos);
                }else{

                    alertAction('No es posible cancelar la solicitud de adopción', 'red');
                }
            }
        });
    
        ht.open('POST','controlador/ajax/solicitudesAjax.php');
        ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
        ht.send('cancelarSoli='+codSolicitud);
        loadAjax(ht);
    }else{
        return true;
    }

}


})();



