<div class="modal" id="buscador">
    <div class="flex-modal">
        <div class="contenido-modal">
            <form action="" method="post" id='buscarUsuario' class='formBuscador'>
                
                <h2>Buscar usuario</h2>
                <div class="boxInput">
                    <input type="text" placeholder="Nombre">
                </div>

                <div class="boxInput">
                    <input type="text" placeholder="Apellidos">
                </div>

                <div class="boxInput">
                    <input type="text" placeholder="Correo">
                </div>

                <div class="boxInput">
                    <input type="text" placeholder="Teléfono">
                </div>

                <div class="boxInput">
                    <input type="text" placeholder="Cedula">
                </div>

                <div class="boxInput">
                    <input type="submit" value="Buscar usuario">
                </div>
            </form>
        </div>
    </div>
</div>

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

<script src='publico/js/usuariosModal.js'></script>

<script src="publico/js/modal.js"></script>

<?php require 'controlador/get/usuariosPerfil.php'; ?>