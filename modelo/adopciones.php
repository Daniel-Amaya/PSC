<?php

class Adopcion extends Conexion{

    public function dataAdopciones($idUsuario){
        $con = parent::conectar();
        try {
            if($idUsuario != ""){

                $query = $con->prepare("SELECT animales.*, usuarios.id AS idUsuario, adopciones.numAdopcion, adopciones.fechaAdopcion  FROM adopciones, usuarios, animales WHERE animales.id = idAnimalAdoptado AND adopciones.idUsuario = usuarios.id AND usuarios.id = :idUsuario");

                $query->bindParam(':idUsuario', $idUsuario);
                $query->execute();

            }else{

                $query = $con->query("SELECT * FROM usuarios, adopciones, animales WHERE animales.id = idAnimalAdoptado AND idUsuario = usuarios.id");
            }

            return $query;
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR LOS ADOPTADOS" . $e->getMessage());
        }
    }
}

?>