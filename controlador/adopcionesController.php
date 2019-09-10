<?php

class AdopcionesController extends Adopcion{
    public function mostrarMiAnimalAdoptado($idUsuario){
        try {
            $adopciones = parent::dataAdopciones($idUsuario);
            // $adopciones = $adopciones->fetch();
        } catch (Exception $e) {
            
        }
    }
}

?>