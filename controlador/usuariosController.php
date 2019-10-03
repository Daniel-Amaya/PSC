<?php 

class UsuariosController extends Usuario{

    public function mostrarDatosDelUsuario($id){
        try {
            $datos = parent::dataUsuarios($id);
            $datos = $datos->fetch();
            return $datos;
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR DATOS DEL USUARIO: ".$e->getMessage());
        }
    }

    public function validarCrearCuenta($cedula, $email){
        $con = parent::conectar();
        try{
            
            $query = $con->prepare("SELECT * FROM usuarios WHERE cedula=:cedula");
            $query->bindParam(':cedula', $cedula);
            $query->execute();

            if($query->rowCount() > 0){
                
                return "0%%cedula";
            }else{

                $query2 = $con->prepare("SELECT * FROM usuarios WHERE correo=:email");
                $query2->bindParam(':email', $email);
                $query2->execute();

                if($query2->rowCount() > 0){
                    return "0%%correo";
                }else{

                    return 'bien';

                }

            }

        }catch(Exception $e){
            exit("ERROR AL VALIDAR CREAR CUENTA: ".$e->getMessage());
        }
    }

    public function mostrarTodosLosUsuarios(){
        try{

            $usuarios = parent::dataUsuarios('');

            if($usuarios->rowCount() > 0){
                foreach($usuarios AS $usuario){
                    $usuarioj = json_encode($usuario);
                    echo "
                    <tr>
                        ";
                        if($usuario['foto'] != ""){

                        echo "<th><img src='publico/images/{$usuario['foto']}'</th>";
                        }else{
                            echo "<th><img src='publico/images/fotoPerfilVacia.png'</th>";
                        }
                        echo "
                        <th>$usuario[1]</th>
                        <th>$usuario[2]</th>
                        <th>$usuario[3]</th>
                        <th>$usuario[5]</th>
                        <th><button class='btn_cafe' onclick='mostrarUsuariosData($usuarioj)'>Ver perfil</button></th>";

                        if($usuario['rol'] == 'u'){

                            echo "
                            <th><button class='btn_rojo'>Usuario</button></th>";
                            
                        }else{

                            echo "
                            <th><button class='btnB_cafe'>Admin</button></th>";
                        }
                        echo "
                    </tr>
                    ";
                }
            }
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR LOS USUARIOS");
        }
    }
}

?>