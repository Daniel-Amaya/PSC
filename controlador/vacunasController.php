<?php

use PHPMailer\PHPMailer\Exception;

/**
 * Usar trait para mostrar las vacunas 
 */
trait mostrarVacunas{

    static function mostrarVacunas($query, $especie){

        if($query->rowCount() > 0){
            foreach ($query as $datos) {
                echo "<div class='vacuna'>
                <div class='nameAndButtons'>
                    <span class='editar pointer' onclick='llenarVacunas(\"$datos[0]\",\"$datos[2]\", \"$datos[3]\", \"$datos[1]\")'><i class='fas fa-pencil-alt'></i></span>
                    <h4 class='nombreVacuna'>$datos[2]</h4>
                    <span class='eliminar pointer' onclick='vacunasAjax(\"especie=$datos[1]&eliminar=$datos[0]\", vacunas$datos[1], [\"Se ha eliminado la vacuna (especie $datos[1])\", \"No ha sido posible eliminar la vacuna\"])'><i class='fas fa-trash'></i></span>
                </div>

                <div class='informacionVacuna'>
                    Sirve para: <br>
                    $datos[3]
                </div>
            </div>";
            }

        }else{
            echo "<div class='noVacunas'>No se han encontrado vacunas para la especie $especie</div>";
        }
    }

}

class VacunasController extends Vacuna{

    use mostrarVacunas;

    public function mostrarVacunasCrud($especie){
        try {

            $vacunas = parent::dataVacunas($especie);

            self::mostrarVacunas($vacunas, $especie);

        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR LAS VACUNAS: ".$e->getMessage());
        }
    }

    public function buscadorVacunas($especie, $nombre, $descripcion){
        try {

            $buscar = parent::searchVacunas($especie, $nombre, $descripcion);

            self::mostrarVacunas($buscar, $especie);

        } catch (Exception $e) {
            exit("ERROR AL BUSCAR VACUNAS: ".$e->getMessage());
        }
    }

    public function añadirVacunasAnimalitos($especie){
        try {
            $vacunas = parent::dataVacunas($especie);

            if($vacunas->rowCount() > 0){
                foreach ($vacunas as $datos) {
                    echo "<div class='boxRadio'>
                        <input type='checkbox' id='vacuna$datos[2]' value='$datos[0]' data-informacion='$datos[3]'>
                        <label for='vacuna$datos[2]'>$datos[2]</label>
                    </div>";
                }
            }
            
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR VACUNAS: ".$e->getMessage());
        }
    }

    public function aplicarVacunas($codVacuna, $idAnimal){
        $con = parent::conectar();
        try {
            $query = $con->prepare("INSERT INTO animalesvacunados (codVacuna, idAnimal) values (:cod, :id)");
            $query->bindParam(':cod', $codVacuna);
            $query->bindParam(':id', $idAnimal);
            $query->execute();

        } catch (Exception $e) {
            exit("ERROR AL AÑADIR VACUNA: ".$e->getMessage());
        }
    }

    public function quitarVacuna($codVacuna, $idAnimal){
        $con = parent::conectar();
        try{
            
            $verficarVacuna = $con->prepare("SELECT * FROM animalesvacunados WHERE codVacuna=:cod AND idAnimal=:id");
            $verficarVacuna->bindParam(':cod', $codVacuna);
            $verficarVacuna->bindParam(':id', $idAnimal);

            $verficarVacuna->execute();

            if($verficarVacuna->rowCount() > 0){
                $query = $con->prepare("DELETE FROM animalesvacunados WHERE codVacuna=:cod AND idAnimal=:id");
                $query->bindParam(':cod', $codVacuna);
                $query->bindParam(':id', $idAnimal);
            
                $query->execute();

                if($query->errorCode() != "00000"){
                    echo "0%%";
                }else{
                    echo "1%%";
                }
            }else{
                echo "1%%";
            }
            
        }catch(Exception $e){
            exit("ERROR AL QUITAR VACUNA: ".$e->getMessage());
        }
    }

    public function mostrarVacunasAplicadas($idAnimal){
        $con = parent::conectar();
        try {

            $query = $con->prepare("SELECT * FROM animalesvacunados INNER JOIN vacunas ON codVacuna = cod WHERE idAnimal=:idAnimal");
            $query->bindParam(':idAnimal', $idAnimal);
            $query->execute();

            return $query;

        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR VACUNAS APLICADAS: ".$e->getMessage());
        }
    }

}

?>