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
    <div class='galeriaCRUD margin-menu padding-menu'>
        <div class='buttonsAction'>
            <p>Agregar y eliminar fotos del animalito <span id='NF'></span></p>
            <form action='' enctype='multipart/form-data' id='NFF' method='POST'>
                <button class='btn_cafe'><label for='nFoto'>Nueva imagen</label></button>
            <input type='file' id='nFoto' style='display:none'>
            </form>
            <button class='btn_cafe'>Terminar</button>
        </div>
        
            <div class='galeria' id='galeriaCRUD'>
                
            </div>
        </div>


        <script src='publico/js/fotosAjax.js'></script> 
        <script>
            document.addEventListener('DOMLoadedContent', fotosAjax('fotos=".$_GET['fotos']."', mostrarFotos));
    </script>
        ";
                

}


?>