<?php

if(isset($_GET['editar']) && !empty($_GET['editar'])){

    require_once 'modelo/animales.php';
    require_once 'controlador/animalesController.php';

    AnimalesController::formularioEditarAnimalito($_GET['editar']);

}elseif(isset($_GET['fotos']) && !empty($_GET['fotos'])){

    // require_once 'modelo/animales.php';
    // require_once 'modelo/fotos.php';
    // require_once 'controlador/fotosController.php';

    echo "
    <script>
    classNames('animalitos')[0].remove();
    </script>
    <div class='margin-menu padding-menu'>
        
        <div class='textoDeTitulo row'>
            <h3 class='naw80'>
                Agregar o eliminar las fotos de  <span id='NF' style='display: contents'> </span>
            </h3>
            <div class='buttonsAction'>
                <button class='btn_naranja btn_largo'><label for='nFoto'>Nueva imagen</label></button>
                <input type='file' id='nFoto' style='display:none'>
                <button class='btn_naranja btn_largo'>Terminar</button>
            </div>
            
        </div>

        <div class='galeriaCRUD'>
            <div class='fotoPerfil'>
                <div id='fotoPerfil'></div>
                <h2>Foto de perfil</h2>
            </div>
            <div class='galeria' id='galeriaCRUD'></div>
        </div>

    </div>


        <script src='publico/js/ajax/fotosAjax.js'></script> 
        <script>
            document.addEventListener('DOMLoadedContent', fotosAjax('fotos=".$_GET['fotos']."', mostrarFotos));
    </script>";
                

}elseif(isset($_GET['vacunas']) && !empty($_GET['vacunas'])){

    require_once 'controlador/funciones.php';
    require_once 'modelo/animales.php';
    require_once 'controlador/animalesController.php';
    require_once 'modelo/vacunas.php';

    echo " <script>
    classNames('animalitos')[0].remove();
    </script>";

    AnimalesController::editarVacunas($_GET['vacunas']);

    
}


?>