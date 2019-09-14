<?php

class Vacuna extends Conexion{

    public $especie;
    public $vacuna;
    public $descripcion;

    public function __construct($especie, $vacuna, $descripcion){

        $this->especie = $especie;
        $this->vacuna = $vacuna;
        $this->descripcion = $descripcion;

        $con = parent::conectar();

        $query = $con->prepare("INSERT INTO vacunas SET especie=:especie, vacuna=:vacuna ,descripcion = :descripcion");
        $query->bindParam(':especie', $this->especie);
        $query->bindParam(':vacuna', $this->especie);
        $query->bindParam(':descripcion', $this->descripcion);
        $query->execute();

        if($query->errorCode() != "00000"){
            echo "0%%";
        }else{
            echo "1%%";
        }
    }

    public function deleteVacuna($cod){
        $con = parent::conectar();
        try {
            $query = $con->prepare("DELETE FROM vacunas WHERE cod=:cod");
            $query->bindParam(':cod', $cod);
            $query->execute();
            if($query->errorCode() != "00000"){
                echo "0%%";
            }else{
                echo "1%%";
            }
            
        } catch (Exception $e) {
            exit("ERROR AL BORRAR LA VACUNA: ".$e->getMessage());
        }
    }
    public function dataVacunas($especie){
        $con = parent::conectar();
        try {
            
            $query = $con->prepare("SELECT * FROM vacunas WHERE especie=:especie");
            $query->bindParam(':especie', $especie);
            $query->execute();
            return $query;
            
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR VACUNAS" . $e->getMessage());
        }
    }
}


?>