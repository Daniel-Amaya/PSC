<?php

class VacunasController extends Vacuna{

    public function mostrarVacunasCrud($especie){
        try {
            $vacunas = parent::dataVacunas($especie);

            if($vacunas->rowCount() > 0){
                foreach ($vacunas as $datos) {
                    echo "<div class='vacuna'>
                    <div class='nameAndButtons'>
                        <span class='editar pointer'><i class='fas fa-pencil-alt'></i></span>
                        <h4 class='nombreVacuna'>$datos[2]</h4>
                        <span class='eliminar pointer' onclick='vacunasAjax(\"especie=$datos[1]&eliminar=$datos[0]\", vacunas$datos[1])'><i class='fas fa-trash'></i></span>
                    </div>

                    <div class='informacionVacuna'>
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
}

?>