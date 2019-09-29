<?php 

class PreguntasAdopcion extends Conexion{

    public function dataPreguntas(){
        
        $con = parent::conectar();
        try{
            
            $query = $con->query("SELECT * FROM preguntasadopcion");
            return $query;
            
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR LAS PREGUNTAS: ".$e->getMessage());
        }
    }
}

?>