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

        $dir = $folder . basename($fileName);

        move_uploaded_file($dir, $fileTMP);

    }

}


?>