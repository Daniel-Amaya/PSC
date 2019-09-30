(function(){

    darEnAdopcion = (adoptado, adoptante, solicitud, nomAdo) => {
        id('entregarModal').style.display = 'block';

        id('continuar').addEventListener('click', () =>{
            
            solicitudAjax('adoptado='+adoptado+'&adoptante='+adoptante+'&solicitud='+solicitud+'&nomAdo='+nomAdo, (ht) => {
                if(ht.responseText == '11'){
                    alert('Se ha llevado a cabo la adopción');
                    window.location = 'index.php';
                }else{
                    alert(ht.responseText);
                }
            }, 'controlador/ajax/adopcionesAjax.php');
        });
    }

    cancelarAdopcion = (cod) => {

        id('cancelar').style.display = 'block';

        id('rechazarRial').addEventListener('click', () =>{
            rechazarMsg = id('rechazarMsg').value;

            if(rechazarMsg != ""){
                solicitudAjax('rechazarCod='+cod+'&mensaje='+rechazarMsg, (ht) =>{

                    if(ht.responseText == '1'){
                        alert("Se ha cancelado la solicitud de adopción");
                        window.location = 'index.php';
                    }

                }, 'controlador/ajax/solicitudesAjax.php');
            }

        });
    }


    function solicitudAjax(send, action, open){

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

})()