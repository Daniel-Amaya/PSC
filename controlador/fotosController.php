<?php 

require 'carpetasController.php';
require '../modelo/connect.php';

if($_SERVER['REQUEST_METHOD']){

    $agregarFoto = Carpetas::agregarFotos($_POST['carpeta'], $_FILES['foto']['name'], $_FILES['foto']['tmp_name']);

    require_once '../modelo/fotos.php';

    $id = Foto::seleccionarId($_POST['carpeta']);

    echo $id;
    $foto = new Foto($id, $agregarFoto);

}

?>