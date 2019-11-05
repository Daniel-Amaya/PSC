<?php 

class Evento extends Conexion{

    public function dataEventos(){
        $con = parent::conectar();
        try{

            $query = $con->query("SELECT * FROM events");
            return $query;
        }catch(PDOException $e){
            exit("ERROR AL MOSTRAR EVENTOS: ".$e->getMessage());
        }
    }
}
?>