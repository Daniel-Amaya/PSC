<?php

if(isset($_GET['adopcion']) && !empty($_GET['adopcion'])){

    AdopcionesController::mostrarAdopcion($_GET['adopcion']);

}

?>