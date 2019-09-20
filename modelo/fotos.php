<?php 

class Foto extends Conexion{
    private $id;
    private $url;
    private $perfil;

    public function __construct($id, $url, $perfil){
        $this->id = $id;
        $this->url = $url;
        $this->perfil = $perfil;
        
        $con = parent::conectar();
        try{
            
            $query = $con->prepare("INSERT INTO fotos SET direccion=:urll, idAnimal=:id, perfil=:perfil");
            $query->bindParam(':urll', $this->url);
            $query->bindParam(':id', $this->id);
            $query->bindParam(':perfil', $this->perfil);
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

    public function fotoPerfil($id){
        $con = parent::conectar();
        try{
            $query = $con->prepare("SELECT * FROM fotos WHERE idAnimal=:id AND perfil=1");
            $query->bindParam(':id', $id);
            $query->execute();
            return $query;

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

            if(is_file($url)){

                $eliminarFoto = unlink($url);

                if($eliminarFoto == true){

                    $query = $con->prepare("DELETE FROM fotos WHERE cod=:cod");
                    $query->bindParam(":cod", $cod);
                    $query->execute();
                    if($query->errorCode() != "00000"){
                        throw new Exception("No ha sido posible eliminar la foto de la base de datos");
                    }
    
                }else{
                    throw new Exception("No se eliminado la foto");
                }
            }else{

                $query = $con->prepare("DELETE FROM fotos WHERE cod=:cod");
                $query->bindParam(":cod", $cod);
                $query->execute();
                if($query->errorCode() != "00000"){
                    throw new Exception("No ha sido posible eliminar la foto de la base de datos");
                }

            }
           
        }catch(Exception $e){
            exit("ERROR AL ELIMINAR FOTO: ".$e->getMessage());
        }
    }

}


?>