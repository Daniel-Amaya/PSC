<?php

class Solicitud extends Conexion{
    
    public function dataSolicitud($idUsuario){
        $con = parent::conectar();
        try {
            if(!empty($idUsuario)){
                $query = $con->prepare("");
            }else{
                
                $query = $con->query("SELECT animales.*, usuarios.* FROM animales, usuarios, solicitudesadopcion WHERE animales.id = idAnimal AND usuarios.id = idUsuario");
            }

            return $query;
        } catch (Exception $e) {
            exit("ERRROR AL AV" .$e->getMessage());
        }
    }
}

?>