<?php 

class Foto extends Conexion{
    private $id;
    private $url;

    public function __construct($id, $url){
        $this->id = $id;
        $this->url = $url;
        
        $con = parent::conectar();
        try{
            
            $query = $con->prepare("INSERT INTO fotos SET direccion=:urll, idAnimal=:id");
            $query->bindParam(':urll', $this->url);
            $query->bindParam(':id', $this->id);
            $query->execute(); 
            if($query->errorCode() != "00000"){
                throw new Exception("Error al insertar la dirección de la imagen en la base de datos");
            }
        }catch(Exception $e){
            exit("ERROR ". $e->getMessage());
        }
    }

    public function seleccionarId($carpeta){
        $con = parent::conectar();
        try{
            $query = $con->prepare("SELECT id FROM animales WHERE carpeta=:carpeta");
            $query->bindParam(':carpeta', $carpeta);
            $query->execute();
            $result = $query->fetch();
            return $result[0];

        }catch(Exception $e){
            exit("ERROR: ".$e->getMessage());
        }
    }

    public function dataFotos($id){
        $con = parent::conectar();
        try{
            $query = $con->prepare("SELECT * FROM fotos WHERE idAnimal=:id");
            $query->bindParam(':id', $id);
            $query->execute();
            return $query;

        }catch(Exception $e){
            exit("ERROR: ".$e->getMessage());
        }
    }

    public function deleteFoto($cod, $dir){
        $con = parent::conectar();
        try{

            $url = "../../publico/images/".$dir;

            $eliminarFoto = unlink($url);

            if($eliminarFoto == true){

                $query = $con->prepare("DELETE FROM fotos WHERE cod=:cod");
                $query->bindParam(":cod", $cod);
                $query->execute();
                if($query->errorCode() != "00000"){
                    throw new Exception("No ha sido posible eliminar la foto de la base de datos");
                }

            }else{
                echo "0%%";
            }
        }catch(Exception $e){
            exit("ERROR AL ELIMINAR FOTO: ".$e->getMessage());
        }
    }


}


?>