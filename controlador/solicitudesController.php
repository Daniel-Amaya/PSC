<?php

use PHPMailer\PHPMailer\Exception;

trait mostrarSolicitudes{

    static function mostrarSolicitudes($solicitudes){
        require_once 'modelo/fotos.php';
        if($solicitudes->rowCount() > 0){
                        
            foreach($solicitudes AS $solicitud){

                $fotosSolicitud = Foto::dataFotos($solicitud[0]);
                $urlFotoSolicitud = $fotosSolicitud->fetch();
                echo "
                    
                    <div class='solicitudAdopcion'>
                        <div class='row'>

                            <div class='fotoPerfil'>
                                <img src='publico/images/$urlFotoSolicitud[1]'>
                                ";

                                if($solicitud['estado'] == 'a un paso'){
                                    echo "
                                    <div class='btns2'>
                                    <button class='btn_rojo' onclick='cancelarSolicitud(".$solicitud['cod'].")'>Cancelar solicitud</button>
                                    
                                    <button class='btn_cafe' onclick='window.location = \"adopcion.php?solicitud={$solicitud['cod']}\"'>Llenar formulario</button>
                                    
                                    </div>
                                    ";
                                }elseif($solicitud['estado'] == 'adoptado'){

                                    echo " <button class='btnB_naranja btn_largo'>Adoptado</button> ";

                                }
                                else{
                                    echo "<button class='btn_rojo btn_largo' onclick='cancelarSolicitud(".$solicitud['cod'].")'>Cancelar solicitud</button>";
                                }

                            echo "
                            </div>

                            <div class='infoSolicitud'>
                                <div class='dataAnimal'>
                                    <ul class='row'>
                                        <li>Para adoptar a: $solicitud[1]</li>
                                        <li>De la especie: $solicitud[2]</li>
                                    </ul>
                                    <ul>
                                        <li>De la raza: $solicitud[3]</li>
                                    </ul>
                                </div>
                                <div class='detallesSolicitud'>
                                    <table>
                                        <thead><tr><th colspan='2'>Detalles de la solicitud</th></tr></thead>
                                        <tbody>
                                            <tr><td>Estado</td><td>".$solicitud['estado']."</td></tr>
                                            <tr><td>Fecha de la solicitud</td><td>".$solicitud['fechaSolicitud']."</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>

                        </div>

                    </div>";
                    
            }

        echo " <script src='publico/js/ajax/adopcion/solicitarAdopcion.js'></script> ";

        }
    }
}

class SolicitudesController extends Solicitud{
    
    use mostrarSolicitudes;
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
                    }elseif($estado == 'procesando adopción'){
                        echo "
                        <tr onclick='window.location = \"adopcion.php?solicitud=$datos[24]&idU=$datos[11]\"'>
                            <th><i class='fas fa-eye'></i></th>
                            <th>$datos[12] $datos[13]</th>
                            <th>$datos[1]</th>
                            <th>{$datos['fechaSolicitud']}</th>
                        </tr>";
                    }else{

                        echo " <tr onclick='verSolicitud($datosJ, \"$fotoPerfil[1]\")'>
                            <th><i class='fas fa-eye'></i></th>
                            <th>$datos[12] $datos[13]</th>
                            <th>$datos[1]</th>
                            <th>{$datos['fechaSolicitud']}</th>
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

    // Usuario

    public function mostrarSolicitudesUsuario($idU){
        try{
            $solicitudes = parent::dataSolicitud($idU, '');
            self::mostrarSolicitudes($solicitudes);

            if($solicitudes->rowCount() == 0){
                echo " <div class='center'>Aún no has intentado realizar una adopción ¿Qué esperas? <a href='adoptar.php' class='btn_naranja'>Adopta</a></div> ";
                include 'vista/vacio.php';
            }

            
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR SOLICITUDES: ".$e->getMessage());
        }
    }
    public function notificaciones($idU){
        $con = parent::conectar();
        try{
            
            $notificacion = $con->prepare("SELECT cod, notificado, notificacion, nombre, estado FROM solicitudesadopcion, animales WHERE idUsuario = :idU AND estado !='espera' AND notificacion != '' AND animales.id = idAnimal ORDER BY notificado ASC, cod DESC");
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