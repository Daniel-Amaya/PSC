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

function edad($añoNacimiento){
    $añoActual = date('Y');
    $edad = ($añoActual-$añoNacimiento);
    if($edad == 0){
        $edad = "Menos de un año";
    }else{
        $edad = $edad. " años";
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