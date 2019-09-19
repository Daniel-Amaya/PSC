<?php

class SolicitudesController extends Solicitud{
    
    public function mostrarSolicitudesAlAdmin(){
        try{
            $solicitudes = parent::dataSolicitud('');

            if($solicitudes->rowCount() > 0){
                foreach($solicitudes AS $datos){
                    echo " <tr>
                        <th><i class='fas fa-eye'></i></th>
                        <th>$datos[1]</th>
                        <th>$datos[12]</th>
                    </tr> ";
                }
            }else{
                echo "<tr><th colspan='3'>No se registran solicitudes de adopción</th></tr>";
            }
        }catch(Exception $e){
            exit("ERROR: ".$e->getMessage());
        }
    }
}


?>