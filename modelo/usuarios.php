<?php

class Usuario extends Conexion{

    public function iniciarSesion($correo, $pass){
        $con = parent::conectar();
        try {
            $query = $con->prepare("SELECT * FROM usuarios WHERE correo=:correo");
            $query->bindParam(':correo', $correo);
            $query->execute();
            if($query->rowCount() > 0){
                $query = $query->fetch();

                $pasword = password_verify($pass, $query[6]);
                if($pasword == true){
                    $_SESSION['sesion_rol'] = $query[7];
                    $_SESSION['sesion_usuario'] = [$query[0], $query[3]];
                    echo "1";

                }else{
                    echo "La contraseña es incorrecta";
                }
            }else{
                echo "No existe un usuario registrado con ese correo";
            }
        } catch (Exception $e) {
            exit("ERROR AL INICIAR SESIÓN: ".$e->getMessage());
        }
    }
}

?>