<?php

use PHPMailer\PHPMailer\Exception;

class SeguimientoController extends Seguimiento{

    public function seguienteSeguimiento($idA){
        $con = parent::conectar();
        try{
            $query = $con->prepare("SELECT fechaVisita FROM seguimiento WHERE visitado = 0 AND idAnimal = :idA AND fechaVisita >= :fecha ORDER BY fechaVisita ASC LIMIT 1");
            $query->bindParam(':idA', $idA, PDO::PARAM_INT);
            $fecha =  date('Y-m-d');
            $query->bindParam(':fecha', $fecha);
            $query->execute();
            if($query->rowCount() > 0){
                $siguiente = $query->fetch();
                echo " <button class='btn_cafe'>Siguiente visita: {$siguiente['fechaVisita']}</button> ";
            }else{
                echo " <button class='btn_cafe'>Siguiente visita: No programado o finalizado</button> ";
            }
            echo " <button class='btn_naranja'>Ver en calendario</button> ";
        }catch (Exception $e){
            exit("ERROR AL MOSTRAR SEGUIMIENTO: ".$e->getMessage());
        }

    }

    public function mostrarSeguimientoAdmin($idA){
        try{

            require_once 'controlador/funciones.php';
            $seguimiento = parent::dataSeguimiento($idA);

            if($seguimiento->rowCount() > 0){
                
                foreach($seguimiento AS $fecha){
                    echo "
                    <tr>
                        <th>{$fecha['fechaVisita']}</th>
                        <th>".esterilizado($fecha['visitado'])."</th>
                    </tr>
                    ";
                }
            }else{
                echo " <tr>
                    <th colspan='2'>No se registra un seguimiento</th>
                </tr> ";
            }
        }catch (Exception $e){
            exit("ERROR AL MOSTRAR SEGUIMIENTO: ".$e->getMessage());
        }
    }

    public function seguimientoDiarioAdmin(){
        try{
            $seguimiento = parent::seguimientoDiario();

            if($seguimiento->rowCount() > 0){
                foreach($seguimiento->fetchAll(PDO::FETCH_ASSOC) AS $fecha){
                    $data = json_encode($fecha);
                    echo "<button onclick='modalSeguiD($data)' class='btn_cafe btn_largo'>{$fecha['visita']}</button>";
                }
            }else{
                echo "<h3>No hay visitas programadas para hoy</h3>";
            }
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR SEGUIMIENTO: ".$e->getMessage());
        }
    }

    public function seguimientoAtrasadoAdmin(){
        try{
            $seguimiento = parent::seguimientoAtrasado();

            if($seguimiento->rowCount() > 0){
                foreach($seguimiento->fetchAll(PDO::FETCH_ASSOC) AS $fecha){
                    echo "
                    <tr>
                        <th>{$fecha['visita']}</th>
                        <th>{$fecha['fechaVisita']}</th>
                    </tr>";
                }

            }else{

                echo " <tr><th colspan='2'>No hay visitas por aplazar</th></tr> ";

            }
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR SEGUIMIENTO: ".$e->getMessage());
        }
    }
    
}

?>