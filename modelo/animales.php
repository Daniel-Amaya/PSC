<?php 

class Animal extends Conexion{

    protected $nombre;
    protected $especie;
    protected $raza;
    protected $color;
    protected $sexo;
    protected $edad;
    protected $esterilizado;
    protected $descripcion;
    protected $procedencia;    

    public function __construct($nombre, $especie, $raza, $color, $sexo, $edad, $esterilizado, $descripcion, $procedencia){

        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->raza = $raza;
        $this->color = $color;
        $this->sexo = $sexo;
        $this->edad = $edad;
        $this->esterilizado = $esterilizado;
        $this->descripcion = $descripcion;
        $this->procedencia = $procedencia;

        $con = parent::conectar();

        try{ 

            require '../carpetasController.php';
            $dir = new Carpetas;
            $carpeta = $dir->carpetaDePerrito($nombre);
            
            $query = $con->prepare("INSERT INTO animales (nombre, especie, raza, color, sexo, edad, esterilizado, descripcion, procedencia, carpeta) VALUES (:nombre, :especie, :raza, :color, :sexo, :edad, :esterilizado, :descripcion, :procedencia, :carpeta)");

            $query->bindParam(':nombre', $this->nombre);
            $query->bindParam(':especie', $this->especie);
            $query->bindParam(':raza', $this->raza);
            $query->bindParam(':color', $this->color);
            $query->bindParam(':sexo', $this->sexo);
            $query->bindParam(':edad', $this->edad);
            $query->bindParam(':esterilizado', $this->esterilizado);
            $query->bindParam(':descripcion', $this->descripcion);
            $query->bindParam(':procedencia', $this->procedencia);
            $query->bindParam(':carpeta', $carpeta);

            $query->execute();
            
            if($query->errorCode() != "00000"){
                rmdir("../publico/images/".$carpeta);
                throw new Exception("No ha sido posible agregar un nuevo animalito");

            }else{

                $id = $con->prepare("SELECT id FROM animales WHERE carpeta=:carpeta");
                $id->bindParam(':carpeta', $carpeta);
                $id->execute();
                $id = $id->fetch(); 
                
                $json = [$id[0], true, $carpeta];

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

    public function editAnimal($nombre, $especie, $raza, $color, $sexo, $edad, $esterilizado, $descripcion, $procedencia, $id){
        $con = parent::conectar();
        try{

            $query = $con->prepare("UPDATE animales SET nombre=:nombre, especie=:especie, raza=:raza, color=:color, sexo=:sexo, edad=:edad, esterilizado=:esterilizado, descripcion=:descripcion, procedencia=:procedencia WHERE id=:id");

            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':especie', $especie);
            $query->bindParam(':raza', $raza);
            $query->bindParam(':color', $color);
            $query->bindParam(':sexo', $sexo);
            $query->bindParam(':edad', $edad);
            $query->bindParam(':esterilizado', $esterilizado);
            $query->bindParam(':descripcion', $descripcion);
            $query->bindParam(':procedencia', $procedencia);
            $query->bindParam(':id', $id);
            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0%%"+$query->errorInfo();
            }else{
                echo "1%%";
            }

        }catch(Exception $e){
            exit('ERROR EDITAR ANIMAL: '.$e->getMessage());
        }
    }

    public function searchAnimal($nombre, $especie, $raza, $color, $sexo){
        $con = parent::conectar();
        try {
            $query = $con->prepare("SELECT * FROM animales WHERE nombre LIKE :nombre  AND especie LIKE :especie AND raza LIKE :raza AND color LIKE :color AND sexo LIKE :sexo");
            
            $query->bindValue(':nombre', '%'.$nombre.'%');
            // $query->bindValue(':nombre', '%'.$nombre.'%');
            $query->bindValue(':especie', '%'.$especie.'%');
            $query->bindValue(':raza', '%'.$raza.'%');
            $query->bindValue(':color', '%'.$color.'%');
            $query->bindValue(':sexo', '%'.$sexo.'%');
            $query->execute();

            return $query;

        } catch (Exception $e) {
            exit("ERROR AL BUSCAR UN ANIMALITO: ".$e->getMessage());
        }
    }

}


?>
