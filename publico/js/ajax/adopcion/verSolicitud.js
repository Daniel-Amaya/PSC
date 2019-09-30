verSolicitud = (data, fotoAnimalito) => {
    
    console.log(data);

    if(data['foto'] != ""){

        id('fotoUsuario').src = 'publico/images/'+data['foto']; 
    }else{

        id('fotoUsuario').src = 'publico/images/fotoPerfilVacia.png';
    }

    id('nombreUsuario').textContent = data[12] + " " + data[13];
    id('celfon').textContent = "Contactar en: " + data['telefono'];
    id('DI').textContent = "Cedula: "+ data['cedula'];
    id('perfilUser').href = "usuarios.php?usuario="+data[11];

    id('fotoAnimalito').src = 'publico/images/'+fotoAnimalito;
    id('nombreAnimalito').textContent = data[1];
    id('especieAnimalito').textContent = "Especie: "+ data[2];
    id('numSolicitudes').textContent = 'Solicitudes actuales: 2';
    id('perfilAni').href = "animalitos.php?perfil="+data[0];

    nuevaModal();

    accionSolicitud = (ht) =>{
        e = ht.responseText;
        if(e == '1'){

            id('contactado').removeEventListener('click', contactado);
            id('rechazar').removeEventListener('click', rechazar);
            id('proceder').removeEventListener('click', proceder);
            id('modal').style.display = 'none';

            mostrarSolicitudes();

        }
    }

    if(data['estado'] == 'espera'){

        id('mensajeSoli').textContent = 'Si ya se comunicó con el solicitante, pero aún no se ha concretado la adopción, marquelo como contactado';
        
        // Contactado
        id('contactado').style.display = 'block';
        id('contactado').removeEventListener('click', contactado);
        id('contactado').addEventListener('click', contactado = () => {

            solicitudAjax('contactadoCod='+data[24], accionSolicitud);

        });

        // Rechazar

        id('rechazar').style.display = 'block';
        id('rechazar').removeEventListener('click', rechazar);
        id('rechazar').addEventListener('click', rechazar = () => {
            
            let confirmar = confirm('¿Seguro que deseas RECHAZAR la solicitud de '+data['12']+ " para adoptar al animalito "+data[1]);

            if(confirmar == true){

                solicitudAjax('rechazarCod='+data[24], accionSolicitud);

            }else{
                return true;
            }

        });

        // Proceder
        id('proceder').style.display = 'block';
        id('proceder').removeEventListener('click', proceder);
        id('proceder').addEventListener('click', proceder = () => {
            
            let confirmar2 = confirm('¿Seguro que deseas ACEPTAR la solicitud de '+data['12']+ " para adoptar al animalito "+data[1]);

            if(confirmar2 == true){

                solicitudAjax('aunpasoCod='+data[24], accionSolicitud);

            }else{
                return true;
            }

        });


    }else if(data['estado'] == 'comunicado'){

        // Contactar

        id('contactado').style.display = 'none';
        id('contactado').removeEventListener('click', contactado);
        id('mensajeSoli').textContent = 'Acepta o rechaza la solictud ahora que te comunicaste con el usuario';

        // Rechazar

        id('rechazar').style.display = 'block';
        id('rechazar').removeEventListener('click', rechazar);
        id('rechazar').addEventListener('click', rechazar = () => {
            
            let confirmar = confirm('¿Seguro que deseas RECHAZAR la solicitud de '+data['12']+ " para adoptar al animalito "+data[1]);

            if(confirmar == true){

                solicitudAjax('rechazarCod='+data[24], accionSolicitud);

            }else{
                return true;
            }

        });

        // Proceder

        id('proceder').style.display = 'block';
        id('proceder').removeEventListener('click', proceder);
        id('proceder').addEventListener('click', proceder = () => {
            
            let confirmar2 = confirm('¿Seguro que deseas ACEPTAR la solicitud de '+data['12']+ " para adoptar al animalito "+data[1]);

            if(confirmar2 == true){

                solicitudAjax('aunpasoCod='+data[24], accionSolicitud);

            }else{
                return true;
            }

        });

    }else if(data['estado'] == 'a un paso'){

        id('mensajeSoli').textContent = 'Solo falta llenar el formulario de adopción';

        id('contactado').style.display = 'none';
        id('contactado').removeEventListener('click', contactado);

        id('proceder').style.display = 'none';
        id('proceder').removeEventListener('click', proceder);

        id('rechazar').textContent = 'Cancelar adopción';
        id('rechazar').removeEventListener('click', rechazar);
        id('rechazar').addEventListener('click', rechazar = () => {
            
            let confirmar = confirm('¿Seguro que deseas RECHAZAR la solicitud de '+data['12']+ " para adoptar al animalito "+data[1]);

            if(confirmar == true){

                solicitudAjax('rechazarCod='+data[24], accionSolicitud);

            }else{
                return true;
            }

        });

    }

}

function solicitudAjax(send, action){

    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            action(this);
        }
    });

    ht.open('POST','controlador/ajax/solicitudesAjax.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send(send);
}

document.addEventListener('DOMContentLoaded', () =>{
    mostrarSolicitudes();
});

mostrarSolicitudes = () => {

    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            e = this.responseText;

            e = e.split('%%', 4);

            id('soliEspera').innerHTML = e[0];
            id('soliComunicadas').innerHTML = e[1];
            id('soliA1Paso').innerHTML = e[2];
            id('soliProcesando').innerHTML = e[3];
        }
    });

    ht.open('POST','controlador/ajax/mostrarSolicitudesAjax.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send();

}

