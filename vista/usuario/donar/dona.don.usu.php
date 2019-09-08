<section class='margin-menu padding-menu'>

<h1 class="titulo">Hacer una donación</h1>

<fieldset class=" fielNewAnimalito" style="">

<h2 class="center">Agregar una nueva mascota</h2>

<form action="" method="post" class='newAnimalito' id='newAnimalito'>
    <div class="boxInput">
        <input type="text" placeholder="nombre del animalito" name='nombreAn'>
    </div>

    <div class="boxInput">
        <select name="especie">
            <option value="">Especie</option>
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
        <input type="number" name="edad" placeholder='Año de nacimiento'>
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


</section>