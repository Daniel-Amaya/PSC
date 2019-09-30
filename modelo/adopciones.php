<?php

class Adopcion extends Conexion{

    public $usuario;
    public $animal;
    public $fecha;
    public $codEsterilizacion;

    public function __construct($usuario, $animal, $fecha, $codEsterilizacion){
        $this->usuario = $usuario;
        $this->animal = $animal;
        $this->fecha = $fecha;
        $this->codEsterilizacion = $codEsterilizacion;

        $con = parent::conectar();
        try{

            $query = $con->prepare("INSERT INTO adopciones SET idAnimalAdoptado=:idA, idUsuario=:idU, fechaAdopcion=:fecha");
            $query->bindParam(':idA', $this->animal);
            $query->bindParam(':idU', $this->usuario);
            $query->bindParam(':fecha', $this->fecha);
            $query->execute();

            if($query->errorCode() != '00000'){
                echo '0';
                
            }else{

                if($query->rowCount() > 0){
                    echo "1";
                }
            }

        }catch(Exception $e){
            exit("ERROR AL REALIZAR ADOPCIÓN: ".$e->getMessage());
        }
    }

    public function dataAdopciones($idUsuario){
        $con = parent::conectar();
        try {
            if($idUsuario != ""){

                $query = $con->prepare("SELECT animales.*, usuarios.id AS idUsuario, adopciones.numAdopcion, adopciones.fechaAdopcion  FROM adopciones, usuarios, animales WHERE animales.id = idAnimalAdoptado AND adopciones.idUsuario = usuarios.id AND usuarios.id = :idUsuario");

                $query->bindParam(':idUsuario', $idUsuario);
                $query->execute();

            }else{

                $query = $con->query("SELECT animales.*, usuarios.*, adopciones.* FROM usuarios, adopciones, animales WHERE animales.id = idAnimalAdoptado AND idUsuario = usuarios.id");
            }

            return $query;
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR LOS ADOPTADOS" . $e->getMessage());
        }
    }
}

?>