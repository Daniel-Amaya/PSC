<?php 

if(isset($_GET['perfil']) && !empty($_GET['perfil'])){

    $usuarioPerfil = Usuario::dataUsuarios($_GET['perfil']);
    if($usuarioPerfil->rowCount() > 0){

        $usuarioPerfilj = json_encode($usuarioPerfil->fetch());

        echo "
        
        <script>
        mostrarUsuariosData($usuarioPerfilj);
        </script>
        ";

    }

    
}


?>