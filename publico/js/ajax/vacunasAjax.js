function vacunasAjax(send, action){

    var ht = new XMLHttpRequest;


    ht.addEventListener('progress', (e) =>{
        let porcentaje = Math.round((e.loaded / e.total) * 100);
        id('loadAjax').style.display = 'flex';
        id('porcentajeCarga').textContent = porcentaje + '%';
        id('vacunasCanino').innerHTML = 'espera';
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

    ht.open('POST', 'controlador/ajax/vacunasAjax.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send(send);
}

function vacunascanina(ht){
    e = ht.responseText;

    e = e.split('%%');

    if(e.length == 2){
        console.log(e[0]);
        id('vacunasCanino').innerHTML = e[1];
    }else{
        id('vacunasCanino').innerHTML = e[0];
    }
}

function vacunasfelina(ht){
    e = ht.responseText;

    e = e.split('%%');

    if(e.length == 2){
        console.log(e[0]);
        id('vacunasFelino').innerHTML = e[1];
    }else{
        id('vacunasFelino').innerHTML = e[0];
    }
}

function llenarVacunas(idV,nombre, descripcion, especie){

    let modal = id('editarVacuna');
    let flex = modal.getElementsByClassName('flex-modal')[0];

    if(modal.style.display = 'none'){
        modal.style.display = 'block';
    }else{
        modal.style.display = 'none';
    }

    window.addEventListener('click', function(e){
        if(e.target == flex){
            modal.style.display = 'none';
        }
    });

    let idI = modal.getElementsByTagName('input')[0];
    let nombreI = modal.getElementsByTagName('input')[1];
    let descripcionT = modal.getElementsByTagName('textarea')[0];
    let ple = id('ple');

    idI.value = idV;
    nombreI.value = nombre;
    descripcionT.value = descripcion;
    ple.innerText = especie;

}


document.addEventListener('DOMContentLoaded', function(){

    vacunasAjax('especie=canina', vacunascanina);
    vacunasAjax('especie=felina', vacunasfelina);

    // Agregar 

    id('agregarVacuna').addEventListener('submit', function(e){
        e.preventDefault();

        nombre = this.getElementsByTagName('input')[0].value;
        descripcion = this.getElementsByTagName('textarea')[0].value;
        especie = this.getElementsByTagName('select')[0].value;

        if(nombre != "" && descripcion != "" && especie != ""){
            if(especie == "felina"){
                vacunasAjax('especie=felina&nomVacuna='+nombre+'&desVacuna='+descripcion+"&especieV="+especie, vacunasfelina);
                this.parentNode.parentNode.parentNode.style.display = 'none';
            }else{
                vacunasAjax('especie=canina&nomVacuna='+nombre+'&desVacuna='+descripcion+"&especieV="+especie, vacunascanina);
                this.parentNode.parentNode.parentNode.style.display = 'none';
            }
        }
    });

    // Editar

    id('editarVacunas').addEventListener('submit', function(e){
        e.preventDefault();

        cod = this.getElementsByTagName('input')[0].value;
        nombre = this.getElementsByTagName('input')[1].value;
        descripcion = this.getElementsByTagName('textarea')[0].value;
        especie = id('ple').textContent;

        if(nombre != "" && descripcion != "" && especie != ""){
            if(especie == "felina"){
                vacunasAjax('especie=felina&ENV='+nombre+'&EDV='+descripcion+"&codE="+cod, vacunasfelina);
                this.parentNode.parentNode.parentNode.style.display = 'none';
            }else{
                vacunasAjax('especie=canina&ENV='+nombre+'&EDV='+descripcion+"&codE="+cod, vacunascanina);
                this.parentNode.parentNode.parentNode.style.display = 'none';
            }
        }
    });

    // Buscar

    id('buscarVacunas').addEventListener('submit', function(e){

        e.preventDefault();

        nombre = this.getElementsByTagName('input')[0].value;
        descripcion = this.getElementsByTagName('textarea')[0].value;

        if(nombre != "" || descripcion != ""){

            vacunasAjax('especie=canina&nomBus='+nombre+'&desBus='+descripcion, vacunascanina);
            vacunasAjax('especie=felina&nomBus='+nombre+'&desBus='+descripcion, vacunasfelina);

        }else{

            vacunasAjax('especie=canina', vacunascanina);
            vacunasAjax('especie=felina', vacunasfelina);
            
        }
    });

});




