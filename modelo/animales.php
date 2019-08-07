<?php 

// include_once 'connect.php';

class Animal extends Conexion{

    public $nombre;
    public $especie;
    public $raza;
    public $color;
    public $sexo;
    public $esterilizado;
    public $descripcion;
    public $procedencia;    

    public function __construct($nombre, $especie, $raza, $color, $sexo, $esterilizado, $descripcion, $procedencia){

        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->raza = $raza;
        $this->color = $color;
        $this->sexo = $sexo;
        $this->esterilizado = $esterilizado;
        $this->descripcion = $descripcion;
        $this->procedencia = $procedencia;

        $con = parent::conectar();

        try{ 

            require 'carpetasController.php';
            $dir = new Carpetas;
            $carpeta = $dir->carpetaDePerrito($nombre);
            
            $query = $con->prepare("INSERT INTO animales (nombre, especie, raza, color, sexo, esterilizado, descripcion, procedencia, carpeta) VALUES (:nombre, :especie, :raza, :color, :sexo, :esterilizado, :descripcion, :procedencia, :carpeta)");

            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':especie', $especie);
            $query->bindParam(':raza', $raza);
            $query->bindParam(':color', $color);
            $query->bindParam(':sexo', $sexo);
            $query->bindParam(':esterilizado', $esterilizado);
            $query->bindParam(':descripcion', $descripcion);
            $query->bindParam(':procedencia', $procedencia);
            $query->bindParam(':carpeta', $carpeta);

            $query->execute();
            
            if($query->errorCode() != "00000"){
                rmdir("../publico/images/".$carpeta);
                throw new Exception("No ha sido posible agregar un nuevo animalito");

            }else{

                $json = [1, true, $carpeta];

                $json = json_encode($json);

                echo $json;
            }
            
        }catch(PDOException $e){
            exit("ERROR INSERT ANIMAL: ".$e->getMessage());
        }
    }

    public function dataAnimal($id){
        $con = parent::conectar();
        try {
            if(empty($id)){
                $query = $con->query("SELECT * FROM animales");
            }else{
                $query = $con->prepare("SELECT * FROM animales WHERE id=:id");
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
            }
            return $query;
        } catch (PDOException $e) {
            exit("ERROR MOSTRAR ANIMALES: ".$e->getMessage());
        }
    }

    public function deleteAnimal($id){
        $con = parent::conectar();
        try{

            $query = $con->prepare("DELETE FROM animales WHERE id=:id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

        }catch(Exception $e){
            exit("ERROR AL ELIMINAR ANIMALITO: ".$e->getMessage());
        }
    }
}


?>
