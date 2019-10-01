    <fieldset class="form_2" id='formImages'>
        
        <h2 class='titulo'>Agregar fotos de <span class='nombreMascota'></span></h2>
        <form action="" method="post" class="row" enctype="multipart/form-data">

            <div class="col-ms-6">

                <div class='agregarFotosAnimalitos'>
                    <p>Ahora hay que agregar las fotos de <span class='nombreMascota'></span>, la primera foto que escojas será la foto de perfil, luego puedes cambiarla</p><br>
                    
                    <label for="nuevaFoto" class="btn_naranja btn_largo">Agregar foto:</label>
                    <input type="file" name="nuevaFoto" id="nuevaFoto" class="none" accept="image/*">

                    <div id="imagesBox">
                        <h3>Aquí apareceran las imagenes agregadas</h3>
                        <div id="messageError"></div>
                    </div>
                    <input type="submit" value="Continuar" class="btn_naranja btn_largo">
                </div>
            </div>

            <div class="col-ms-6">
                <div class="informacionPrevia">
                    <div class="fotoPerfil"><img src="publico/images/fotoPerfilVacia.png" alt=""></div>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2" id='nom'></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Especie:</td>
                                <td id='esp'></td>
                            </tr>
                            <tr>
                                <td>Raza:</td>
                                <td id='raz'></td>
                            </tr>
                            <tr>
                                <td>Color:</td>
                                <td id='col'></td>
                            </tr>
                            <tr>
                                <td>Genero:</td>
                                <td id='gen'></td>
                            </tr>
                            <tr>
                                <td>Procedencia:</td>
                                <td id='pro'></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>            
            
        </form>

        <script src="publico/js/mostrarImagenes.js"></script>


    </fieldset>