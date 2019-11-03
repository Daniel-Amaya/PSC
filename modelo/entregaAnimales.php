<?php

class EntregaAnimal extends Conexion{

    protected $fechaEntrega;
    protected $lugarEntrega;
    protected $idU;
    protected $idA;

    public function __construct($fechaEntrega, $lugarEntrega, $idU, $idA){
        
        $this->fechaEntrega = $fechaEntrega;
        $this->lugarEntrega = $lugarEntrega;
        $this->idU = $idU;
        $this->idA = $idA;

        $con = parent::conectar();

        try{
            $query = $con->prepare("INSERT INTO entregaanimal SET fechaEntrega=:fecha, lugarEntrega=:lugar, idUsuario=:idU, idAnimal = :idA");
            $query->bindParam(':fecha', $this->fechaEntrega);
            $query->bindParam(':lugar', $this->lugarEntrega);
            $query->bindParam(':idU', $this->idU);
            $query->bindParam(':idA', $this->idA);
            $query->execute();

        }catch(PDOException $e){
            exit("ERROR AL AGREGAR ENTREGA DE LA MASCOTA: ".$e->getMessage());
        }
    }

    public function dataEntrega($idU){
        
        $con = parent::conectar();
        try{
            $query = $con->query("SELECT * FROM entregaanimal");
        }catch(PDOException $e){
            exit("ERROR AL MOSTRAR FECHAS DE ENTREGA: ".$e->getMessage());
        }
    }

}

?>