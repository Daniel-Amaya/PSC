<?php

use PHPMailer\PHPMailer\Exception;

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

            $query = $con->query("SELECT cod AS id,visita AS title, fechaVisita AS start, visitado, adopciones.*, usuarios.nombre, usuarios.apellidos, direccionApto, animales.nombre AS adoptado FROM seguimiento, adopciones, animales, usuarios WHERE adopciones.idAnimalAdoptado = seguimiento.idAnimal AND adopciones.idAnimalAdoptado = animales.id AND usuarios.id = adopciones.idUsuario");
            return $query;

        }catch(PDOException $e){
            exit("ERROR AL MOSTRAR FECHAS DE SEGUIMIENTO: ".$e->getMessage());
        }
    }

    public function dataSeguimiento($idA){
        $con = parent::conectar();
        try{
            $query = $con->prepare("SELECT * FROM seguimiento WHERE idAnimal = :idA");
            $query->bindParam(':idA', $idA, PDO::PARAM_INT);
            $query->execute();

            return $query;
        }catch(PDOException $e){
            exit("ERROR AL MOSTRAR SEGUIMIENTO: ".$e->getMessage());
        }
    }

    public function seguimientoDiario(){
        $con = parent::conectar();
        try{
            $fecha = date('Y-m-d');
            $query = $con->query("SELECT visita, fechaVisita, cod, fechaAdopcion, numAdopcion, direccionApto, usuarios.nombre AS nameUser, apellidos,telefono, usuarios.id AS idU, animales.nombre, animales.id AS idA  FROM seguimiento, usuarios, animales, adopciones WHERE adopciones.idAnimalAdoptado = seguimiento.idAnimal AND adopciones.idAnimalAdoptado = animales.id AND usuarios.id = adopciones.idUsuario AND visitado != 1 AND fechaVisita LIKE '%$fecha%'");
            return $query;
        }catch(PDOException $e){
            exit("ERROR AL MOSTRAR EL SEGUIMIENTO: ".$e->getMessage());
        }
    }

    public function seguimientoAtrasado(){
        $con = parent::conectar();
        try{
            $fecha = date('Y-m-d');
            $query = $con->query("SELECT * FROM seguimiento, usuarios, animales, adopciones WHERE adopciones.idAnimalAdoptado = seguimiento.idAnimal AND adopciones.idAnimalAdoptado = animales.id AND usuarios.id = adopciones.idUsuario AND fechaVisita < '$fecha'");
            return $query;
        }catch(PDOException $e){
            exit("ERROR AL MOSTRAR EL SEGUIMIENTO: ".$e->getMessage());
        }
    }
    
    public function updateSeguimiento($cod, $fecha){
        $con = parent::conectar();
        try{

            $query = $con->prepare("UPDATE seguimiento SET fechaVisita=:fec WHERE cod=:cod");
            $query->bindParam(':fec', $fecha);
            $query->bindParam(':cod', $cod);
            $query->execute();

            if($query->errorCode() == "00000"){
                echo "1&&";
            }else{
                echo "0&&";
            }

        }catch(PDOException $e){
            exit("ERROR AL MODIFICAR EL SEGUIMIENTO: ".$e->getMessage());
        }
    }

    public function updateVisitado($cod){
        $con = parent::conectar();
        try{
            $query = $con->prepare("UPDATE seguimiento SET visitado=1 WHERE cod = :cod");
            $query->bindParam(':cod', $cod);
            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0";
            }else{
                echo "1";
            }
        }catch(PDOException $e){
            exit("ERROR AL MODIFICAR SEGUIMIENTO: ".$e->getMessage());
        }
    }

}


?>