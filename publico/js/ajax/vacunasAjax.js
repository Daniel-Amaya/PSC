document.addEventListener('DOMContentLoaded', function(){

    vacunasAjax('especie=canina', vacunascanina);
    vacunasAjax('especie=felina', vacunasfelina);

});

function vacunasAjax(send, action){

    var ht = new XMLHttpRequest;

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
