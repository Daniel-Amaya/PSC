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
        $query->bindParam(':vacuna', $this->vacuna);
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

    public function updateVacunas($especie, $vacuna, $descripcion, $cod){
        $con = parent::conectar();
        try {
            $query = $con->prepare("UPDATE vacunas SET especie=:especie, vacuna=:vacuna, descripcion=:descr WHERE cod=:cod");
            $query->bindParam(':especie', $especie);
            $query->bindParam(':vacuna', $vacuna);
            $query->bindParam(':descr', $descripcion);
            $query->bindParam(':cod', $cod);
            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0%%";
            }else{
                echo "1%%";
            }

        } catch (Exception $e) {
            exit("ERROR AL EDITAR VACUNAS".$e->getMessage());
        }
    }

    public function searchVacunas($especie, $nombre, $descripcion){
        $con = parent::conectar();
        try {
            $query = $con->prepare("SELECT * FROM vacunas WHERE vacuna LIKE :nombre AND descripcion LIKE :des AND especie=:especie");
            $query->bindValue(':nombre', '%'.$nombre.'%');
            $query->bindValue(':des', '%'.$descripcion.'%');

            $query->bindParam(':especie', $especie);
            $query->execute();

            return $query;
        } catch (PDOException $e) {
            exit("ERROR AL BUSCAR VACUNAS: ".$e->getMessage());
        }
    }
}


?>