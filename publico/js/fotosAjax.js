document.addEventListener('DOMLoadedContent', fotosAjax('', mostrarFotos));

function fotosAjax(send, action){
    
    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            action(this);
        }
    });

    ht.open('POST','controlador/ajax/animalitosAjax.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send(send);
}

function mostrarFotos(ht){
    id('galeriaCRUD').innerHTML = ht.responseText;
}

function eliminarFoto(ruta){
    
}