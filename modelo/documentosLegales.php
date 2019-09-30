<?php

class DocumentosLegales extends Conexion{

    public $usuario;
    public $firma;

    public function __construct($usuario, $firma, $adopcion){

        $this->usuario = $usuario;
        $this->firma = $firma;
        $this->adopcion = $adopcion;

        $con = parent::conectar();
        try{

            $query = $con->prepare("INSERT INTO documentoslegales SET idUsuario=:idU, firma=:firma");
            $query->bindParam(':idU', $this->usuario);
            $query->bindParam(':firma', $this->firma);
            $query->execute();
            
        }catch(Exception $e){
            exit("ERROR AL AGREGAR DOCUMENTOS LEGALES");
        }
    }

    public function dataFirma($id){
        $con = parent::conectar();
        try{

            $query = $con->prepare("SELECT firma FROM documentoslegales WHERE idUsuario=:idU");
            $query->bindParam(':idU', $id);
            $query->execute();
            return $query->fetch();

        }catch(Exception $e){
            exit("ERROR AL MOSTRAR FIRMA: ".$e->getMessage());
        }
    }
}

?>