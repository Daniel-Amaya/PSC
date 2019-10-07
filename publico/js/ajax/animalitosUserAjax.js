(function(){

    animalitosUserAjax = (send, action) => {

        ht = new XMLHttpRequest;

        ht.addEventListener('progress', (e) =>{
            let porcentaje = Math.round((e.loaded / e.total) * 100);
            id('loadAjax').style.display = 'flex';
            id('porcentajeCarga').textContent = porcentaje + '%';
            id('animalesUsuario').innerHTML = 'espera';
            console.log(porcentaje);
        }); 

        ht.addEventListener('load', () => {
            id('loadAjax').style.display = 'none';
        });

        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                action(this);
            }
        });
    
        ht.open('POST','controlador/ajax/animalesUserAjax.php');
        ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); 
        ht.send(send);
    }

    mostrarAnimalitos = (ht) => {
        e = ht.responseText;
        id('animalesUsuario').innerHTML = e;

    }


    document.addEventListener('DOMContentLoaded', () =>{
        
        animalitosUserAjax('idU='+idUsuario, mostrarAnimalitos);

            // Buscar

        id('buscarAnimalitos').addEventListener('submit', function(e){

            e.preventDefault();
        
            var nombreB = this.getElementsByTagName('input')[0].value,
            especieB = this.getElementsByTagName('select')[0].value,
            razaB = this.getElementsByTagName('input')[1].value,
            colorB = this.getElementsByTagName('input')[2].value,
            sexoB  = this.getElementsByTagName('select')[1].value;
        
            animalitosUserAjax("idU="+idUsuario+"&nombreB="+nombreB+"&especieB="+especieB+"&razaB="+razaB+"&colorB="+colorB+"&sexoB="+sexoB, mostrarAnimalitos);
        });

    });

})()