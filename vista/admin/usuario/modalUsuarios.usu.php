<div class="modal" id='modalUsu'>
    <div class="flex-modal">
        <div class="contenido-modal" style='width: 70%;'>
              <div class='perfilUsuario' style='width: 100%;'>

                    <div class='header'>
                        
                        <div class='fotoPerfil'>
                            <img id='fotoPerfilModal' src='publico/images/'>
                        </div>
                        
                        <h2 class='nombreUsuario'></h2>

                        <!-- <div class='adoptadoORadoptar'>
                        <span>información legal de la adopción</span>
                        <strong>Fecha de adopción: 2016/05/20</strong>
                        </div> -->

                    </div>

                    <div class="informacion row">

                        <table style='padding: 10px'>
                            <tbody>
                                <tr>
                                    <td>Nombre:</td>
                                    <td id='nom'></td>
                                </tr>
                                <tr>
                                    <td>Apellidos:</td>
                                    <td id='ape'></td>
                                </tr>
                                <tr>
                                    <td>Correo:</td>
                                    <td id='corr'></td>
                                </tr>
                                <tr>
                                    <td>Teléfono:</td>
                                    <td id='tel'></td>
                                </tr>
                                <tr>
                                    <td>Cedula:</td>
                                    <td id='ced'></td>
                                </tr>
                            </tbody>
                        </table>

                        <table style='padding: 10px'>
                            <tr>
                                <td>Estado Civil: </td>
                                <td id='est'>No aplica</td>
                            </tr>
                            <tr>
                                <td>Dirección de apartamento:</td>
                                <td id='dir'>No aplica</td>
                            </tr>
                            <tr>
                                <td>Referencia: </td>
                                <td id='ref'>No aplica</td>
                            </tr>
                            <tr>
                                <td>Teléfono de referencia:</td>
                                <td id='telRef'>No aplica</td>
                            </tr>

                        </table>
                      
                    </div>

                </div>                         
        </div>
    </div>
</div>

<script>

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
        id('est').textContent == data['estadoCivil'];
        id('dir').textContent == data['direccionApto'];
        id('ref').textContent == data['referencia'];
        id('telRef').textContent == data['telefonoRef'];
    }

    document.addEventListener('click', (e) =>{
        if(e.target == id('modalUsu').getElementsByClassName('flex-modal')[0]){
            id('modalUsu').style.display = 'none';
        }
    });

}

})()

</script>

<?php require 'controlador/get/usuariosPerfil.php'; ?>