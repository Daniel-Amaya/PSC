<?php

$conexion = mysqli_connect("localhost", "root", "", "peluditos_san_cristobal");
mysqli_set_charset($conexion, "utf8");

$donacion = $_POST["donacion"];
$cantidad = $_POST["cantidad"];
$valor = $_POST["valor"];
$foto = $_FILES["fotoComprovante"];
$mensaje = $_POST["mensajeDonacion"];

    if($foto["type"] == "image/jpg" OR $foto["type"] == "image/jpeg") {

        $ruta = "../../publico/images/donaciones/".$foto["name"].rand(0,10101001).".jpg";
        $sql = "INSERT INTO donaciones() values(null, '$donacion', $cantidad,'$valor','$ruta','$mensaje')";
        if(mysqli_query($conexion,$sql)) {

            move_uploaded_file($foto["tmp_name"], $ruta);
            echo"Donación realizada con exito";

        }else{
            echo"ocurrio un eror";
        }
    }
        
?>