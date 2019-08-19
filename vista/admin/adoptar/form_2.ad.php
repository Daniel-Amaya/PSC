    <fieldset class="form_2" id='formImages'>
        
        <form action="" method="post" class="newAnimalito row" enctype="multipart/form-data">

            <div class="col-6">
                <div class="dataAnimalito">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2" id='nom'>Perry el perrito</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Especie:</td>
                                <td id='esp'>Perro</td>
                            </tr>
                            <tr>
                                <td>Raza:</td>
                                <td id='raz'>Pitbull</td>
                            </tr>
                            <tr>
                                <td>Color:</td>
                                <td id='col'>Blanco</td>
                            </tr>
                            <tr>
                                <td>Genero:</td>
                                <td id='gen'>Masculino</td>
                            </tr>
                            <tr>
                                <td>Procedencia:</td>
                                <td id='pro'>Medellín Belén Altavista</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>

            <div class="col-6">

                <div class='fotos'>
                    <h2>Ahora agrega algunas fotos del animalito</h2><br>
                    <div class="boxInput">
                        <label for="nuevaFoto" class="btn_naranja">Agregar foto:</label>
                        <input type="file" name="nuevaFoto" id="nuevaFoto" class="none" accept="image/*">
                    </div>

                    <div id="imagesBox">
                        <h3>Imagenes agregadas:</h3>
                        <div id="messageError"></div>
                    </div>
                    <input type="submit" value="Continuar" class="btn_naranja">
                </div>


            </div>
            
            
        </form>

        <script src="publico/js/mostrarImagenes.js"></script>


    </fieldset>