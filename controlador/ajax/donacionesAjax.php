<?php

require '../../modelo/connect.php';
require '../../modelo/donaciones.php';
require '../carpetasController.php';

if(isset($_POST['donacion']) && isset($_POST['cantidad']) && isset($_POST['unidades']) && isset($_FILES['compr'])){

    $rutaFoto = Carpetas::agregarFotos('comprobanteDonaciones', $_FILES['compr']['name'], $_FILES['compr']['tmp_name']);
    new Donacion($_POST['donacion'], $_POST['cantidad'], $_POST['unidades'], $rutaFoto, null, null);
}

?>