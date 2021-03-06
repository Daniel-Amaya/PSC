    <fieldset class="fielNewAnimalito" style="display: none">
        
        <h3 class="titulo">Agregar una mascota</h3>
        <form action="" method="post" class='newAnimalito' id='newAnimalito'>

            <div class="row">
                <div class="col-ms-6">
                    <div class="boxInput">
                        <input type="text" placeholder="nombre del animalito" name='nombreAn'>
                    </div>

                    <div class="boxInput">
                        <select name="especie">
                            <option value="">Especie</option>
                            <option value="canina">Canina</option>
                            <option value="felina">Felina</option>
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
                        <input type="date" name="edad" placeholder="edad" min="2005-01-01" max="<?php echo date('Y-m-d')?>">
                    </div>
                </div>

                <div class="col-ms-6">
                    <div class="boxRadio">
                        <h3 class="pregunta">¿Esterilizado?</h3>
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
                </div>

            </div>

        </form>
            
    </fieldset>

    <script src="publico/js/validar/validarAgregarAnimalito.js"></script>




