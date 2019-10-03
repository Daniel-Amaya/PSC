<?php

class Respuesta extends Conexion{

    public $respuesta;
    public $dbRespuesta;
    public $numPregunta;
    public $usuario;
    public $animal;

    public function __construct($respuesta, $dbRespuesta, $numPregunta, $usuario, $animal){
        $this->respuesta = $respuesta;
        $this->dbRespuesta = $dbRespuesta;
        $this->numPregunta = $numPregunta;
        $this->usuario = $usuario;
        $this->animal = $animal;

        $con = parent::conectar();

        try{
            
            $query = $con->prepare("INSERT INTO respuestasadopcion SET respuesta=:respuesta, dbPreguntaRespuesta=:dbR, numPregunta =:numP, idUsuario=:idU, idAnimal=:idA");
            $query->bindParam(':respuesta', $this->respuesta);
            $query->bindParam(':dbR', $this->dbRespuesta);
            $query->bindParam(':numP', $this->numPregunta);
            $query->bindParam(':idU', $this->usuario);
            $query->bindParam(':idA', $this->animal);
            $query->execute();

            if($query->errorCode() != "00000"){
                echo '0';
            }else{
                echo "1";
            }

        }catch(Exception $e){
            exit("ERROR AL INSERTAR PREGUNTA: ".$e->getMessage());
        }
    }

    public function mostrarRespuestas($num, $usuario, $animal){
        $con = parent::conectar();
        try{

            if(!empty($num)){

                $query = $con->prepare("SELECT * FROM respuestasadopcion WHERE idUsuario=:idUsuario AND idAnimal=:idAnimal AND numPregunta=:numero");
                $query->bindParam(':idUsuario', $usuario);
                $query->bindParam(':idAnimal', $animal);
                $query->bindParam(':numero', $num);
                $query->execute();

            }else{   

                $query = $con->prepare("SELECT * FROM respuestasadopcion WHERE idUsuario=:idUsuario AND idAnimal=:idAnimal");
                $query->bindParam(':idUsuario', $usuario);
                $query->bindParam(':idAnimal', $animal);
                $query->execute();
            }

            return $query;

        }catch(Exception $e){
            exit("ERROR AL MOSTRAR RESPUESTAS: ".$e->getMessage());
        }
    }

}


?>