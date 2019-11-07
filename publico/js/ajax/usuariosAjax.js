(function(){

    document.addEventListener('DOMContentLoaded', () =>{
        usuariosAjax('', mostrarUsuarios);

        id('buscarUsuario').addEventListener('submit', function(e){

            e.preventDefault();
    
            var nombreB = this.getElementsByTagName('input')[0].value,
            apellidosB = this.getElementsByTagName('input')[1].value,
            correoB = this.getElementsByTagName('input')[2].value,
            telefonoB = this.getElementsByTagName('input')[3].value, 
            cedulaB = this.getElementsByTagName('input')[4].value;
    
            usuariosAjax('nombreB='+nombreB+'&apellidosB='+apellidosB+'&correoB='+correoB+'&telefonoB='+telefonoB+'&cedulaB='+cedulaB, mostrarUsuarios);
    
        });

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
        ht.send('adminU=true&'+send);
    }

    mostrarUsuarios = (ht) => {
        id('tableUsuarios').innerHTML = ht.responseText;
    }

    hacerAdministrador = (id) => {
    
        usuariosAjax('idNewAdmin='+id, mostrarUsuarios);

    }

})();