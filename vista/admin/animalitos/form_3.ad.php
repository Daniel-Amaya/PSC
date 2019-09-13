    <fieldset class="form_3">
        <h2 class='titulo'>Agregar vacunas a <span class='nombreMascota'></span></h2>
        <form action="" method="post" class='row'>
            
            <div class="col-ms-6">

                <div class='agregarVacunasAnimalitos'>
                    <p>Ahora hay que agregar las fotos de <span class='nombreMascota'></span>, la primera foto que escojas será la foto de perfil, luego puedes cambiarla</p><br>
                    
                    <div class="row">

                        <div class="vacunasBox">

                            <h4 class='center'>Vacunas para caninos:</h4><br>
                            <div class="boxRadio">
                                <input type="checkbox" name="vacuna" id='vacuna1'>
                                <label for="vacuna1">Rataviru</label>
                            </div>

                            <div class="boxRadio">
                                <input type="checkbox" name="vacuna" id='vacuna1'>
                                <label for="vacuna1">Rataviru</label>
                            </div>

                            <div class="boxRadio">
                                <input type="checkbox" name="vacuna" id='vacuna1'>
                                <label for="vacuna1">Rataviru</label>
                            </div>

                        </div>

                        <div class="infoVacunasSelect">
                            Aquí aparecerá la información de la última vacuna seleccionada
                        </div>

                    </div>

                    <input type="submit" value="Terminar" class="btn_naranja btn_largo">
                </div>
            </div>

            <div class="col-ms-6">
                <div class="informacionPrevia">
                    <div class="fotoPerfil"><img src="publico/images/fotoPerfilVacia.png" alt=""></div>
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

<!--             
            <div class="boxCheck">
                <label for="vacuna1">Vacuna 1</label>
                <input type="checkbox" name="vacuna1" id="vacuna1">
            </div>

            <div class="boxCheck">
                <label for="vacuna2">Vacuna 1</label>
                <input type="checkbox" name="vacuna2" id="vacuna2">
            </div>

            <div class="boxCheck">
                <label for="vacuna3">Vacuna 1</label>
                <input type="checkbox" name="vacuna3" id="vacuna3">
            </div>

            <input type="submit" value="Terminar" class='btn_naranja derecha'> -->

        </form>
    </fieldset>

    <script src="publico/js/ajax/animalesAjax.js"></script>

</div>
