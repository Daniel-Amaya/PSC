<?php 

class Evento extends Conexion{

    protected $title;
    protected $descripcion;
    protected $color;
    protected $start;
    protected $end;  

    public function __construct($title,$descripcion,$color,$start,$end){

        $this->title = $title;
        $this->descripcion = $descripcion;
        $this->color = $color;
        $this->start = $start;
        $this->end = $end;    

        $con = parent::conectar();

        try{ 
            
            $query = $con->prepare("INSERT INTO eventos SET title=:title, color=:color, start=:start, end=:end, descripcion=:descripcion");

            $query->bindParam(':title', $this->title);
            $query->bindParam(':color', $this->color);
            $query->bindParam(':start', $this->start);;
            $query->bindParam(':end', $this->end);
            $query->bindParam(':descripcion', $this->descripcion);

            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0%%{$query->errorCode()}&&";
            }else{
                echo "1%%";
            }
            
            
        }catch(PDOException $e){
            exit("ERROR AL AGREGAR EVENTO: ".$e->getMessage());
        }
    }


    public function dataEventos(){
        $con = parent::conectar();
        try{

            $query = $con->query("SELECT * FROM eventos");
            return $query;
        }catch(PDOException $e){
            exit("ERROR AL MOSTRAR EVENTOS: ".$e->getMessage());
        }
    }

    public function deleteEvento($id){
        $con = parent::conectar();
        try {
            $query = $con->prepare("DELETE FROM eventos WHERE id=:id");
            $query->bindParam(':id', $id);
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

    public function updateVacunas($title, $descripcion, $color, $start, $end, $id){
        $con = parent::conectar();
        try {
            $query = $con->prepare("UPDATE eventos SET title=:title, descripcion=:descripcion, color=:color, start=:start, end=:end WHERE id=:id");
            $query->bindParam(':title', $title);
            $query->bindParam(':descripcion', $descripcion);
            $query->bindParam(':color', $color);
            $query->bindParam(':start', $start);
            $query->bindParam(':end', $end);
            $query->bindParam(':id', $id);
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
}
?>