<?php 

class RespuestasAdopcionController extends Respuesta{

    public function mostrarRespuestasAdmin($idU, $idA){

        try{

            require_once 'modelo/preguntasadopcion.php';
            
            $respuestas = parent::mostrarRespuestas('', $idU, $idA);
            if($respuestas->rowCount() > 0){

                $preguntas = PreguntasAdopcion::dataPreguntas();

                foreach($preguntas AS $pregunta){

                    $respuestas =  parent::mostrarRespuestas($pregunta[0], $idU, $idA);
                    $respuesta = $respuestas->fetch();

                    
                    
                    if($pregunta[0] == 22){
                        $respuesta22 = explode(',', $respuesta[1]);
                        for($i = 0; $i < count($respuesta22); $i++){
                            if($respuesta22[$i] == true){
                                $respuesta22[$i] = "<i class='fas fa-'></i>";
                            }else{
                                $respuesta22[$i] = "<i class='fas fa-close'></i>";
                            }
                        }

                        echo " 
                        <tr>
                            <th>$pregunta[0]</th>
                            <th>$pregunta[1]</th>
                            
                            <td colspan='3'>
                                <ul>
                                    <li>$respuesta22[0] Visitas periódicas al veterinario</li>
                                    <li>$respuesta22[1] Vacunación y vitaminas</li>
                                    <li>$respuesta22[2] Paseos con correa para perro</li>
                                    <li>$respuesta22[3] Uso de collar con placa de identificación</li>
                                    <li>$respuesta22[4] Plato con agua limpia todos los días</li>
                                    <li>$respuesta22[5] Desparasitación</li>
                                    <li>$respuesta22[6] Cepillado de pelo</li>
                                    <li>$respuesta22[7] Limpieza diaria de arenero de gatito</li>
                                    <li>$respuesta22[8] Alimentación solo con croquetas</li>
                                </ul>
                            </td>
                        
                        </tr>";
                    }else{

                        echo " 

                        <tr>
                            <th>$pregunta[0]</th>
                            <th>$pregunta[1]</th>";

                            if($respuesta['dbPreguntaRespuesta'] != null){
                                echo "
                                <th>$respuesta[1]</th>
                                <th>$pregunta[4]</th>
                                <th>$respuesta[2]</th>
                                ";

                            }else{
                                echo "
                                <th colspan='3'>$respuesta[1]</th>
                                ";
                            }
                            
                        echo "
                        </tr>";
                    }


                }


            }else{
                echo "idA = $idA & idU = $idU";
            }



            
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR RESPUESTAS: " .$e->getMessage());
        }

    }

    public function mostrarRespuestasAdoptado($idU, $idA){
        try{

            require_once 'modelo/preguntasadopcion.php';

            $respuestas = parent::mostrarRespuestas('', $idU, $idA);

            if($respuestas->rowCount() > 0){

                echo "
                <table class='respuestasAdopcion'>

                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Preguntas</th>
                            <th colspan='3'>Respuestas</th>
                        </tr>
                    </thead>
        
                    <tbody>
                ";

                $preguntas = PreguntasAdopcion::dataPreguntas();

                foreach($preguntas AS $pregunta){

                    $respuestas =  parent::mostrarRespuestas($pregunta[0], $idU, $idA);
                    $respuesta = $respuestas->fetch();

                    if($pregunta[0] == 22){
                        $respuesta22 = explode(',', $respuesta[1]);
                        for($i = 0; $i < count($respuesta22); $i++){
                            if($respuesta22[$i] == true){
                                $respuesta22[$i] = "<i class='fas fa-'></i>";
                            }else{
                                $respuesta22[$i] = "<i class='fas fa-close'></i>";
                            }
                        }

                        echo " 
                        <tr>
                            <th>$pregunta[0]</th>
                            <th>$pregunta[1]</th>
                            
                            <td colspan='3'>
                                <ul>
                                    <li>$respuesta22[0] Visitas periódicas al veterinario</li>
                                    <li>$respuesta22[1] Vacunación y vitaminas</li>
                                    <li>$respuesta22[2] Paseos con correa para perro</li>
                                    <li>$respuesta22[3] Uso de collar con placa de identificación</li>
                                    <li>$respuesta22[4] Plato con agua limpia todos los días</li>
                                    <li>$respuesta22[5] Desparasitación</li>
                                    <li>$respuesta22[6] Cepillado de pelo</li>
                                    <li>$respuesta22[7] Limpieza diaria de arenero de gatito</li>
                                    <li>$respuesta22[8] Alimentación solo con croquetas</li>
                                </ul>
                            </td>
                        
                        </tr>";
                    }else{

                        echo " 

                        <tr>
                            <th>$pregunta[0]</th>
                            <th>$pregunta[1]</th>";

                            if($respuesta['dbPreguntaRespuesta'] != null){
                                echo "
                                <th>$respuesta[1]</th>
                                <th>$pregunta[4]</th>
                                <th>$respuesta[2]</th>
                                ";

                            }else{
                                echo "
                                <th colspan='3'>$respuesta[1]</th>
                                ";
                            }
                            
                        echo "
                        </tr>";
                    }


                }

                echo "</tbody>
                </table>";


            }else{

                echo "algo ha salido mal, regresa";

            }



            
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR RESPUESTAS: " .$e->getMessage());
        }

    }
}

?>