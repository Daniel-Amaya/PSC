<?php
session_start();

if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['cedula']) && isset($_POST['password'])){

    require '../../modelo/connect.php';
    require '../../modelo/usuarios.php';
    require '../usuariosController.php';
    require '../carpetasController.php';

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

            if($_FILES['foto']){

                $carpeta = Carpetas::crearCarpeta($_POST['correo']);
                $foto = Carpetas::agregarFoto($carpeta, $_FILES['foto']['name'], $_FILES['foto']['tmp_name']);

                $fotoPerfil = $foto;
                
            }else{

                $fotoPerfil = '';
            }

            new Usuario($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['password'], 'u', $fotoPerfil);


        }else{

            echo $validar;
        }
    }

}else{

    require '../../modelo/connect.php';
    require '../../modelo/usuarios.php';
    require '../usuariosController.php';

    if(isset($_POST['nombreB']) && isset($_POST['apellidosB']) && isset($_POST['correoB']) && isset($_POST['telefonoB']) && isset($_POST['cedulaB'])){

        UsuariosController::buscarUsuarios($_POST['nombreB'], $_POST['apellidosB'], $_POST['correoB'], $_POST['telefonoB'] ,$_POST['cedulaB']);

    }else{   
        UsuariosController::mostrarTodosLosUsuarios();
    }

}

?>