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

            $carpeta = Carpetas::crearCarpeta($_POST['correo']);

            if(isset($_FILES['foto'])){

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

}elseif(isset($_POST['nomE']) && isset($_POST['apeE']) && isset($_POST['corrE']) && isset($_POST['telE']) && isset($_POST['cedE']) && isset($_POST['idUE'])){

    require '../../modelo/connect.php';
    require '../../modelo/usuarios.php';

    if(isset($_POST['estE']) && isset($_POST['dirrE'])){

        Usuario::updateUsuario($_POST['idUE'], $_POST['nomE'], $_POST['apeE'], $_POST['corrE'], $_POST['telE'], $_POST['cedE'], $_POST['estE'], $_POST['dirrE'], $_POST['refE'], $_POST['telRefE']);

    }else{

        Usuario::updateUsuario($_POST['idUE'], $_POST['nomE'], $_POST['apeE'], $_POST['corrE'], $_POST['telE'], $_POST['cedE'], null, null, null, null);
    }
}elseif(isset($_POST['adminU'])){

    require '../../modelo/connect.php';
    require '../../modelo/usuarios.php';
    require '../usuariosController.php';

    if(isset($_POST['idURol']) && !empty($_POST['idUrol'])){
        Usuario::updateRol($_POST['idURol']);
    }
    
    if(isset($_POST['nombreB']) && isset($_POST['apellidosB']) && isset($_POST['correoB']) && isset($_POST['telefonoB']) && isset($_POST['cedulaB'])){

        UsuariosController::buscarUsuarios($_POST['nombreB'], $_POST['apellidosB'], $_POST['correoB'], $_POST['telefonoB'] ,$_POST['cedulaB']);

    }else{   
        UsuariosController::mostrarTodosLosUsuarios();
    }

}

?>