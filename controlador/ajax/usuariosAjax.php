<?php
session_start();

if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['cedula']) && isset($_POST['password'])){

    require '../../modelo/connect.php';
    require '../../modelo/usuarios.php';
    require '../usuariosController.php';

    if(isset($_POST['rol']) && $_POST['rol'] == "a"){

       $validar = UsuariosController::validarCrearCuenta($_POST['cedula'], $_POST['correo']);

        if($validar == 'bien'){

            new Usuario($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['password'], 'a', '');
        }else{
            
            echo $validar;
        } 

    }else{

        $validar = UsuariosController::validarCrearCuenta($_POST['cedula'], $_POST['correo']);

        if($validar == 'bien'){

            new Usuario($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['password'], 'u', '');

        }else{
            echo $validar;
        }
    }

}

?>