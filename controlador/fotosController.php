<?php 

class FotosController extends Foto{

    public function mostrarYeliminarFotos($id){
        try {
            $animales = Animal::dataAnimal($id);

            if($animales->rowCount() > 0){
        
                $datos = $animales->fetch();
                $fotos = parent::dataFotos($datos[0]);

                echo $datos[0] . "%%";

                echo $datos[10] . "%%";

                echo $datos[1] . "%%";
                    
                    if($fotos->rowCount() > 0){
                    foreach($fotos as $todas){
                        echo "<div class='divImage'>
                        <span onclick='fotosAjax(\"fotos=$datos[0]&eliminar=$todas[0]&dir=$todas[1]\", mostrarFotos)' class='deleteImg'><i class='fas fa-times'></i></span>
                        <img class='imgCRUD' src='publico/images/$todas[1]'>
                        </div>";
                    }
                }else{
                    echo "<div class='errorNoData'> No se han encontrado fotos para este animal </div>";
                }
        
            }else{
                echo "No hay ningún animal registrado";
            }
        
            echo "<script>
            classNames('animalitos')[0].remove();
            </script>";

        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR FOTOS: ".$e->getMessage());
        }
    }

}

?>