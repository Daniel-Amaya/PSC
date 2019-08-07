<?php 

require '../modelo/connect.php';
require '../modelo/animales.php';

if(isset($_POST['nombreAn']) && isset($_POST['especie']) && isset($_POST['raza']) && isset($_POST['color']) &&isset($_POST['sexo']) && isset($_POST['esterilizado']) && isset($_POST['descripcion']) && isset($_POST['procedencia'])){

    $animal = new Animal($_POST['nombreAn'], $_POST['especie'], $_POST['raza'], $_POST['color'], $_POST['sexo'], $_POST['esterilizado'], $_POST['descripcion'], $_POST['procedencia']);

}



?>