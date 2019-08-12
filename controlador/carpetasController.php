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

    public function eliminarCarpeta($nombre){

        try{

            if(is_dir("../../publico/images/".$nombre)){

                foreach(glob("../../publico/images/".$nombre . "/*") as $archivos){
                    unlink($archivos);
                }
                $deleteFolder = rmdir("../../publico/images/".$nombre);
                if($deleteFolder == false){
                    throw new Exception("No es posible eliminar la carpeta");
                }
            }
        }catch(Exception $e){
            exit("ERROR Al ELIMINAR LA CARPETA".$e->getMessage());
        }

    }

    public function agregarFotos($folder, $fileName, $fileTMP){
        try{

            $dir = $folder."/" . basename($fileName);
            $extension = strtolower(pathinfo($dir, PATHINFO_EXTENSION));

            if($extension != "png" && $extension != "jpg" && $extension != "jpeg"){
                throw new Exception("La extensión del achivo no es de imagen");
            }

            if(move_uploaded_file($fileTMP, '../publico/images/'.$dir)){
                
                $numberName = rand(0, 987654321);
                $newName = '../publico/images/'.$folder.'/'.$numberName.".png";
                rename('../publico/images/'.$dir, $newName);
                
                return $folder."/".$numberName.".png";

            }else{
                echo "k mierda malditasea triplehpta";
            }
        }catch(Exception $e){
            exit("ERROR AL AGREGAR LA IMAGEN: ".$e->getMessage());
        }

    }

}


?>