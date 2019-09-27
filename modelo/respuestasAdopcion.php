<?php

class Respuestas extends Conexion{

    public $respuesta;
    public $dbRespuesta;
    public $numPregunta;
    public $usuario;

    public function __construct($respuesta, $dbRespuesta, $numPregunta, $usuario){
        $this->respuesta = $respuesta;
        $this->dbRespuesta = $dbRespuesta;
        $this->numPregunta = $numPregunta;
        $this->usuario = $usuario;

        $con = parent::conectar();

        try{
            
            $query = $con->prepare("INSERT INTO respuestasadopcion SET respuesta=:respuesta, dbPreguntaRespuesta=:dbR, numPregunta =:numP, idUsuario=:idU");
            $query->bindParam(':respuesta', $this->respuesta);
            $query->bindParam(':dbR', $this->dbRespuesta);
            $query->bindParam(':numP', $this->numPregunta);
            $query->bindParam(':idU', $this->usuario);
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

}


?>