<?php

class Seguimiento extends Conexion{

    protected $fechaVisita;
    protected $visita;
    protected $idUsuario;
    protected $idAnimal;

    public function __construct($fechaVisita, $visita, $idUsuario, $idAnimal){

        $this->fechaVisita = $fechaVisita;
        $this->visita = $visita;
        $this->idUsuario =$idUsuario;
        $this->idAnimal =$idAnimal;

        $con = parent::conectar();

        try{
            $query = $con->prepare("INSERT INTO seguimiento SET fechaVisita = :fecha, visita = :visita, idUsuario = :idU, idAnimal = :idA");

            $query->bindParam(':fecha', $this->fechaVisita);
            $query->bindParam(':visita', $this->visita);
            $query->bindParam(':idU', $this->idUsuario);
            $query->bindParam(':idA', $this->idAnimal);
            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0&&";
            }else{
                echo "1&&";
            }

        }catch(PDOException $e){
            exit("ERROR AL AGREGAR VISITA DE SEGUIMIENTO: ".$e->getMessage());
        }
    }

    public function dataDiasSeg(){
        $con = parent::conectar();
        try{

            $query = $con->query("SELECT cod AS id,visita AS title, fechaVisita AS start FROM seguimiento");
            return $query;

        }catch(PDOException $e){
            exit("ERROR AL MOSTRAR FECHAS DE SEGUIMIENTO: ".$e->getMessage());
        }
    }
}


?>