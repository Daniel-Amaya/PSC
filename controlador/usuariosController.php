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
}

?>