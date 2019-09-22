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

                $fotoPerfil = parent::fotoPerfil($datos[0]);
                $fotoPerfil = $fotoPerfil->fetch();

                echo "<img src='publico/images/$fotoPerfil[1]'>%%";

                    if($fotos->rowCount() > 0){
                    foreach($fotos as $todas){
                        if($todas[3] != 1){

                            echo "<div class='divImage'>
                            <img class='imgCRUD' src='publico/images/$todas[1]'>
                            <div class='buttonsImg'>
                                <span onclick='fotosAjax(\"fotos=$datos[0]&eliminar=$todas[0]&dir=$todas[1]\", mostrarFotos)' class=''><i class='fas fa-times'></i></span>
                                <span onclick='fotosAjax(\"fotos=$datos[0]&codAnterior=$fotoPerfil[0]&codNueva=$todas[0]\", mostrarFotos)'><i class='fas fa-user-alt'></i></span>
                            </div>
                            </div>";
                        }
                        
                    }
                }else{
                    echo "<div class='errorNoData'> No se han encontrado fotos para este animal </div>";
                }
        
            }else{
                echo "No hay ningún animal registrado";
                include_once 'vista/vacio.php';
            }
        
            echo "<script>
            classNames('animalitos')[0].remove();
            </script>";

        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR FOTOS: ".$e->getMessage());
        }
    }

    public function nuevaFotoPerfil($codAnterior, $codNuevo){
        $con = parent::conectar();
        try {
            $cambiarActual = $con->prepare("UPDATE fotos SET perfil= 0 WHERE cod=:codAnterior");
            $cambiarActual->bindParam(":codAnterior", $codAnterior);
            $cambiarActual->execute();

            if($cambiarActual->errorCode() == "00000"){
                $actualizar = $con->prepare("UPDATE fotos SET perfil = 1 WHERE cod=:codNuevo");
                $actualizar->bindParam(':codNuevo', $codNuevo);
                $actualizar->execute();

                if($actualizar->errorCode() != "00000"){
                    throw new Exception("ESA VERGA SE PUTIÓ 1");
                }

            }else{
                throw new Exception("ESA VERGA SE PUTIÓ");
            }
            
        } catch (Exception $e) {
            exit("ERROR AL CAMBIAR LA FOTO DE PERFIL: ".$e->getMessage());
        }
    }

}

?>