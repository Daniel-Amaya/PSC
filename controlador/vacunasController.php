<?php

class VacunasController extends Vacuna{

    public function mostrarVacunasCrud($especie){
        try {
            $vacunas = parent::dataVacunas($especie);

            if($vacunas->rowCount() > 0){
                foreach ($vacunas as $datos) {
                    echo "<div class='vacuna'>
                    <div class='nameAndButtons'>
                        <span class='editar pointer' onclick='llenarVacunas(\"$datos[0]\",\"$datos[2]\", \"$datos[3]\", \"$datos[1]\")'><i class='fas fa-pencil-alt'></i></span>
                        <h4 class='nombreVacuna'>$datos[2]</h4>
                        <span class='eliminar pointer' onclick='vacunasAjax(\"especie=$datos[1]&eliminar=$datos[0]\", vacunas$datos[1])'><i class='fas fa-trash'></i></span>
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
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR LAS VACUNAS: ".$e->getMessage());
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