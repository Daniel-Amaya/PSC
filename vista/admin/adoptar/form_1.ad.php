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




