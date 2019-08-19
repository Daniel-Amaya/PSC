<?php 

if(isset($_GET['fotos']) && !empty($_GET['fotos'])){
    require_once 'modelo/animales.php';
    require_once 'modelo/fotos.php';
    
    $datos = $animales->fetch();
    $fotos = Foto::dataFotos($datos[0]);

    $fotos->fetch();

    foreach($fotos as $todas){
        echo "<div class='divImage'>
            <span onclick='' class='deleteImg'><i class='fas fa-times'></i></span>
            <img class='imgCRUD' src='publico/images/$todas[1]'>
        </div> ";
    }
}
?>