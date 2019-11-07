(function(){

    mostrarUsuariosData = (data) =>{

        id('modalUsu').style.display = 'block';

        classNames('nombreUsuario')[0].textContent = data['nombre'] + " " +data['apellidos'];

        id('nom').textContent = data['nombre'];
        id('ape').textContent = data['apellidos'];
        id('corr').textContent = data['correo'];
        id('tel').textContent = data['telefono'];
        id('ced').textContent = data['cedula'];
        
        if(data['foto'] != ""){
            id('fotoPerfilModal').src = 'publico/images/'+data['foto'];
        }else{
            id('fotoPerfilModal').src = 'publico/images/fotoPerfilVacia.png';
        }

        if(data['estadoCivl'] != "" && data['referencia'] != "" && data['direccionApto'] != ""){
            id('est').textContent = data['estadoCivil'];
            id('dir').textContent = data['direccionApto'];
            id('ref').textContent = data['referencia'];
            id('telRef').textContent = data['telefonoRef'];
        }
        if(data['estadoCivil'] == null){
            id('est').textContent = 'No aplica';
            id('dir').textContent = 'No aplica';
            id('ref').textContent = 'No aplica';
            id('telRef').textContent = 'No aplica';
        }

        document.addEventListener('click', (e) =>{
            if(e.target == id('modalUsu').getElementsByClassName('flex-modal')[0]){
                id('modalUsu').style.display = 'none';
            }
        });

    }

    id('aggU').addEventListener('click', () => {
        id('tabUsuarios').style.display = 'none';
        id('registrarUser').style.display = 'block';
    });

})();