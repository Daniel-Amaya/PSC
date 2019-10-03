(function(){

    document.addEventListener('DOMContentLoaded', () =>{
        usuariosAjax('', mostrarUsuarios);

    });

    function usuariosAjax(send, action){
    
        ht = new XMLHttpRequest;
    
        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                action(this);
            }
        });
    
        ht.open('POST','controlador/ajax/usuariosAjax.php');
        ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
        ht.send(send);
    }

    mostrarUsuarios = (ht) => {

        id('tableUsuarios').innerHTML = ht.responseText;
    }

    hacerAdministrador = (id) =>{
    
        usuariosAjax('idNewAdmin='+id, mostrarUsuarios);

    }


})()