<?php 

interface Carpeta{

    public function crearCarpeta($nombre);
    public function agregarFoto($folder, $fileName, $fileTMP);

}

class Carpetas implements Carpeta{

    public $nombre;

    public function carpetaDePerrito($nombre){
        
        $this->nombre = $nombre;

        $carpeta = $nombre . rand(0, 123456789);

        $base = mkdir("../../publico/images/".$carpeta, 0777);

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

            if(move_uploaded_file($fileTMP, '../../publico/images/'.$dir)){
                
                $numberName = rand(0, 987654321);
                $newName = '../../publico/images/'.$folder.'/'.$numberName.".png";
                rename('../../publico/images/'.$dir, $newName);
                
                return $folder."/".$numberName.".png";

            }else{
                throw new Exception("No es posible mover la foto");
            }
        }catch(Exception $e){
            exit("ERROR AL AGREGAR LA IMAGEN: ".$e->getMessage());
        }

    }

    public function crearCarpeta($nombre){
    
        $carpeta = $nombre;

        $base = mkdir("../../publico/images/usuarios/".$carpeta, 0777);

        if($base == false){

            exit("QUE LE PASA A ESTA CHIMBADA HPTAAA");

        }

        return $carpeta;

    }

    public function agregarFoto($folder, $fileName, $fileTMP){
        
        try{

            $dir = $folder."/" . basename($fileName);
            $extension = strtolower(pathinfo($dir, PATHINFO_EXTENSION));

            if($extension != "png" && $extension != "jpg" && $extension != "jpeg"){
                throw new Exception("La extensión del achivo no es de imagen");
            }

            if(move_uploaded_file($fileTMP, '../../publico/images/usuarios/'.$dir)){
                
                $newName = '../../publico/images/usuarios/'.$folder.'/fotoPerfil.png';
                rename('../../publico/images/usuarios/'.$dir, $newName);
                
                return "usuarios/".$folder."/fotoPerfil.png";

            }else{

                throw new Exception("k mierda malditasea triplehpta");
                }

            }catch(Exception $e){
                exit("ERROR AL AGREGAR LA IMAGEN: ".$e->getMessage());
            }

    }

    public function subirFirma($folder, $firmaName, $firmaTMP){
        try{

            $dir = $folder."/" . basename($firmaName);
            $extension = strtolower(pathinfo($dir, PATHINFO_EXTENSION));

            if($extension != "png" && $extension != "jpg" && $extension != "jpeg"){
                throw new Exception("La extensión del achivo no es de imagen");
            }

            if(move_uploaded_file($firmaTMP, '../../publico/images/usuarios/'.$dir)){
                
                $newName = '../../publico/images/usuarios/'.$folder.'/firma.png';
                rename('../../publico/images/usuarios/'.$dir, $newName);
                
                return "usuarios/".$folder."/firma.png";

            }else{

                throw new Exception("No agrega esa malparida firma de mierda piroba carechimba");
                
            }

        }catch(Exception $e){
            exit("ERROR AL SUBIR LA FIRMA: ".$e->getMessage());
        }
    }
}


?>