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
}

?>