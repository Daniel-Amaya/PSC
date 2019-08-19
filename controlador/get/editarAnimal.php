<?php

if(isset($_GET['editar']) && !empty($_GET['editar'])){

    require_once 'modelo/animales.php';

    $datos = Animal::dataAnimal($_GET['editar']);

    if($datos->rowCount() > 0){
        $datos = $datos->fetch();

        echo "<fieldset class='fielNewAnimalito margin-menu'>

        <h2 class='center'>Editar datos de la mascota</h2>
        
        <form method='post' class='newAnimalito' id='editAnimalito'>
            <div class='boxInput'>
                <label for='nombreAnE'>Nombre del animalito</label>
                <input type='text' placeholder='nombre del perrito' name='nombreAnE' value='$datos[1]'>
            </div>

            <div class='boxInput'>
                <label for='especieE'>Especie</label>
                <select name='especieE' value='$datos[2]'>
                    <option value='Perro'>Perro</option>
                    <option value='Gato'>Gato</option>
                </select>
            </div>

            <div class='boxInput'>
                <label for='razaE'>Raza</label>
                <input type='text' placeholder='raza' name='razaE' value='$datos[3]'>
            </div>

            <div class='boxInput'>
                <label for='colorE'>Color</label>
                <input type='text' placeholder='color' name='colorE' value='$datos[4]'>
            </div>

            <div class='boxInput'>
            <label for='sexoE'>Sexo</label>

                <select name='sexoE' value='$datos[5]'>
                    <option value='>Sexo</option>
                    <option value='M'>Masculino</option>
                    <option value='F'>Femenino</option>
                </select>
            </div>

            <div class='boxInput'>
                <h3>¿Esterilizado?</h3>
                <label for='si'>Sí</label>
                <input type='radio' name='esterilizadoE' id='si' value='si'>
                <label for='no'>No</label>
                <input type='radio' name='esterilizadoE' id='no' value='no'>
            </div>

            <div class='boxInput'>
                <label for='descripcionE'>Descripción</label>
                <textarea name='descripcionE' placeholder='descripcion del animalito' rows='4'>$datos[7]</textarea>
            </div>

            <div class='boxInput'>
                <label for='procedenciaE'>Procedencia</label>
                <input type='text' name='procedenciaE' placeholder='procedencia' value='$datos[8]'>
            </div>

            <div class='boxInput'>
                <input type='submit' value='Enviar cambios'>
                <button class='btn_naranja'>Cancelar</button>
            </div>

        </form>
            
    </fieldset>";

    echo "<script>
    classNames('animalitos')[0].style.display = 'none';
    </script>";
    
    }else{
        echo "File No Found";
    }
}elseif(isset($_GET['fotos']) && !empty($_GET['fotos'])){
    require_once 'modelo/animales.php';
    require_once 'modelo/fotos.php';
    $animales = Animal::dataAnimal($_GET['fotos']);

    if($animales->rowCount() > 0){

        $datos = $animales->fetch();
        $fotos = Foto::dataFotos($datos[0]);

        $fotos->fetch();

        echo "
        <div class='galeriaCRUD margin-menu'>
            <div class='buttonsAction'>
                <p>Agregar y eliminar fotos del animalito $datos[1]</p>
                <button class='btn_cafe'>Nueva imagen</button>
                <button class='btn_cafe'>Terminar</button>
            </div>

            <div class='galeria' id='galeriaCRUD'>";

        foreach($fotos as $todas){
            echo "<div class='divImage'>
                <span onclick='' class='deleteImg'><i class='fas fa-times'></i></span>
                <img class='imgCRUD' src='publico/images/$todas[1]'>
            </div> ";
        }

        echo " 
            </div>
        </div>";
    }

    
    echo "<script>
    classNames('animalitos')[0].style.display = 'none';
    </script>";

}


?>