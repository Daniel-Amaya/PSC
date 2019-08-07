<?php 

require 'carpetasController.php';

if($_SERVER['REQUEST_METHOD']){
    $numImages = $_POST['numInputs'];

    for($i = 0; $i < $numImages; $i++){
        Carpetas::agregarFotos($_POST['carpeta'], $_FILES['foto'.$i], $_FILES['foto'.$i]['tmp_name']);
    }
}

?>