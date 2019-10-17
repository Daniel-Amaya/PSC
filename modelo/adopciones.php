<?php

class Adopcion extends Conexion{

    protected $usuario;
    protected $animal;
    protected $fecha;
    protected $codEsterilizacion;

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
                    echo "1&&";
                    $id = $query->fetchColumn();
                    echo $id;
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

    public function retornarIds($numAdopcion){
        $con = parent::conectar();
        try{
            
            $query = $con->prepare("SELECT * FROM adopciones WHERE numAdopcion = :numAdopcion");
            $query->bindParam(':numAdopcion', $numAdopcion);
            $query->execute();
            $adopcion = $query->fetch();

            return $adopcion;

        }catch(Exception $e){
            exit("ERROR AL RETORNAR IDS: ".$e->getMessage());
        }
    }
}

?>