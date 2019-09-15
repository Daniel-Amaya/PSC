<?php 


if(isset($_POST['carpeta'])){

    require '../carpetasController.php';
    require '../../modelo/connect.php';

    $agregarFoto = Carpetas::agregarFotos($_POST['carpeta'], $_FILES['foto']['name'], $_FILES['foto']['tmp_name']);

    require_once '../../modelo/fotos.php';

    $id = Foto::seleccionarId($_POST['carpeta']);

    echo $id;
    $foto = new Foto($id, $agregarFoto, $_POST['perfil']);


}elseif(isset($_POST['fotos']) && !empty($_POST['fotos'])){

    require '../../modelo/connect.php';
    require_once '../../modelo/animales.php';
    require_once '../../modelo/fotos.php';
    require_once '../fotosController.php';

    if(isset($_POST['carpetaN']) && isset($_FILES['fotoN'])){
        require '../carpetasController.php';
        $agregarFoto = Carpetas::agregarFotos($_POST['carpetaN'], $_FILES['fotoN']['name'], $_FILES['fotoN']['tmp_name']);

        $foto = new Foto($_POST['fotos'], $agregarFoto, 0);

    }

    if(isset($_POST['dir']) && !empty($_POST['dir']) && isset($_POST['eliminar'])){
        Foto::deleteFoto($_POST['eliminar'], $_POST['dir']);
    }

    FotosController::mostrarYeliminarFotos($_POST['fotos']);

}else{
        echo "cama mierda cosa hp dejame coronoar esto";
        echo $_POST['fotos'];
        echo $_POST['carpetaN'];
}


?>