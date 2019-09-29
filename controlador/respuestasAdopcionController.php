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


            }else{
                echo "idA = $idA & idU = $idU";
            }



            
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR RESPUESTAS: " .$e->getMessage());
        }

    }
}

?>