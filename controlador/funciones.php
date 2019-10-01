<?php

function genero($data){
    if($data == "F"){
        return "Femenino";
    }elseif($data == "M"){
        return "Masculino";
    }else{
        return 0;
    }
}

function edad($fecha){
    $separarFecha = explode('-', $fecha);

    $añoActual = date('Y');
    $años = ($añoActual-$separarFecha[0]);
    $mesActual = date('m');
    $meses = ($mesActual - $separarFecha[1]);

    if($años == 0 && $meses != 0){
        $edad = "{$meses} meses";
    }elseif($años != 0 && $meses != 0){
        $edad = "{$años} años y {$meses} meses";
    }elseif($años == 0 && $meses == 0){
        $edad = "Recien nacido";
    }

    return $edad;
}

function esterilizado($data){
    if($data == 1){
        return "Sí";
    }else{
        return "No";
    }
}

?>