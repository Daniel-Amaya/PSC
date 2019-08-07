<?php 

class Carpetas{

    public $nombre;

    public function carpetaDePerrito($nombre){
        
        $this->nombre = $nombre;

        $carpeta = $nombre . rand(0, 123456789);

        $base = mkdir("../publico/images/".$carpeta, 0777);

        if($base == false){
            $carpeta = $nombre . rand(0, 123456789);
        }

        return $carpeta;

    }

    public function agregarFotos($folder, $fileName, $fileTMP){
        try{

            $dir = $folder . basename($fileName);
            $extension = strtolower(pathinfo($dir, PATHINFO_EXTENSION));

            if($extension != "png" && $extension != "jpg" && $extension != "jpeg"){
                throw new Exception("La extensión del achivo no es de imagen");
            }

            if(move_uploaded_file($fileTMP, '../publico/images/'.$dir)){
                return $dir;
            }
        }catch(Exception $e){
            exit("ERROR AL AGREGAR LA IMAGEN: ".$e->getMessage());
        }

    }

}


?>