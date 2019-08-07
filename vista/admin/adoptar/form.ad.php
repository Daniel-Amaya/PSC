<fieldset class="margin-menu fielNewAnimalito">

    <h2 class="center">Agregar una nueva mascota</h2>
    
    <form action="" method="post" class='newAnimalito'>
        <div class="boxInput">
            <input type="text" placeholder="nombre del perrito" name='nombreAn'>
        </div>

        <div class="boxInput">
            <select name="especie">
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
            </select>
            <!-- <input type="text" placeholder="especie" name='especie'> -->
        </div>

        <div class="boxInput">
            <input type="text" placeholder="raza" name='raza'>
        </div>

        <div class="boxInput">
            <input type="text" placeholder="color" name='color'>
        </div>

        <div class="boxInput">
            <select name="sexo">
                <option value="">Sexo</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>

        <div class="boxInput">
            <h3>¿Esterilizado?</h3>
            <label for="si">Sí</label>
            <input type="radio" name="esterilizado" id="si" value='si'>
            <label for="no">No</label>
            <input type="radio" name='esterilizado' id='no' value='no'>
        </div>

        <div class="boxInput">
            <textarea name="descripcion" placeholder="descripcion del animalito" rows="4"></textarea>
        </div>

        <div class="boxInput">
            <input type="text" name='procedencia' placeholder="procedencia">
        </div>

        <div class="boxInput">
            <input type="submit" value="agregar">
        </div>

    </form>
        
</fieldset>

<fieldset class="form_2 margin-menu" id='formImages' style='display: block !important;'>
    
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
                    <h3>Imagenes por agregar:</h3>
                    <div id="messageError"></div>
                </div>
                <input type="submit" value="subir fotos" class="btn_naranja">
            </div>


        </div>
        
        
    </form>

    <script src="publico/js/mostrarImagenes.js"></script>


</fieldset>

<fieldset class="form_3">
    <form action="" method="post">
        
        <p>Por último, vamos a agregar las vacunas correspondientes a la mascota:</p>
        <h3>Seleccione solamente las vacunas ya aplicadas a la mascota</h3>
        
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

    </form>
</fieldset>

<script src="publico/js/animalesAjax.js"></script>
