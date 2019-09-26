<?php



class SolicitudesController extends Solicitud{
    
    public function mostrarSolicitudesAlAdmin(){
        try{
            $solicitudes = parent::dataSolicitud('', 'espera');

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

    public function mostrarSolicitudesAdminIndex($estado){
        try{
            $solicitudes = parent::dataSolicitud('', $estado);

            if($solicitudes->rowCount() > 0){


                foreach($solicitudes AS $datos){

                    $fotoPerfil = Foto::fotoPerfil($datos[0]);
                    $fotoPerfil = $fotoPerfil->fetch();

                    $datosJ = json_encode($datos);

                    if($estado == "espera"){
    
                        echo " <tr onclick='verSolicitud($datosJ, \"$fotoPerfil[1]\")'>
                            <th><i class='fas fa-eye'></i></th>
                            <th>$datos[12] $datos[13]</th>
                            <th>$datos[1]</th>
                            <th>".$datos['fechaSolicitud']."</th>
                            <th>".$datos['telefono']."</th>
                        </tr> ";
                    }else{

                        echo " <tr onclick='verSolicitud($datosJ, \"$fotoPerfil[1]\")'>
                            <th><i class='fas fa-eye'></i></th>
                            <th>$datos[12] $datos[13]</th>
                            <th>$datos[1]</th>
                            <th>".$datos['fechaSolicitud']."</th>
                        </tr> ";
                    }

                }
            }else{
                echo "<tr><th colspan='5'>No se registran solicitudes de adopción</th></tr>";
            }
        }catch(Exception $e){
            exit("ERROR: ".$e->getMessage());
        }
    }

    public function notificaciones($idU){
        $con = parent::conectar();
        try{
            
            $notificacion = $con->prepare("SELECT cod, notificado, notificacion, nombre FROM solicitudesadopcion, animales WHERE idUsuario = :idU AND (estado='a un paso' OR estado='rechazada') AND notificacion != '' AND animales.id = idAnimal ORDER BY notificado ASC, cod DESC");
            $notificacion->bindParam(':idU', $idU);
            $notificacion->execute();

            if($notificacion->rowCount() > 0){

                foreach($notificacion AS $notificaciones){
                    $notificaciones['tipoNotificacion'] = 'solicitudAdopcion';
                    $notiJeison = json_encode($notificaciones);
                    echo $notiJeison . "&&";
                }
            }
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR NOTIFICACIONES DE SOLICITUDES: ".$e->getMessage());
        }
    }

}

?>