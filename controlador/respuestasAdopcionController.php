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

    public function mostrarRespuestasAdoptado($numAdopcion){
        $con = parent::conectar();
        try{

            require_once 'modelo/preguntasadopcion.php';

            $query = $con->prepare("SELECT * FROM adopciones WHERE numAdopcion = :numAdopcion");
            $query->bindParam(':numAdopcion', $numAdopcion);
            $query->execute();
            $adopcion = $query->fetch();
            
            $respuestas = parent::mostrarRespuestas('', $adopcion['idUsuario'], $adopcion['idAnimalAdoptado']);

            if($respuestas->rowCount() > 0){

                $usuario = Usuario::dataUsuarios($adopcion['idUsuario']);
                $usuario = $usuario->fetch();

                echo "
                <h2 class='titulo'>Formulario de adopción diligenciado</h2>
                <table class='datosAdoptante'>
                    <tr>
                        <td>Apellidos y nombres: <br>$usuario[2] $usuario[1]</td>
                        <td>Teléfono: <br> {$usuario['telefono']} </td>
                        <td>Fecha: <br> {$adopcion['fechaAdopcion']}</td>
                        <td>Ciudad: <br> Medellín</td>
                    </tr>
        
                    <tr>
                        <td colspan='2'>C.I:  {$usuario['cedula']}</td>
                        <td colspan='2'>Estado civil  {$usuario['estadoCivil']} </td>
                    </tr>
        
                    <tr>
                        <td colspan='2'>Dirección:  {$usuario['direccionApto']} </td>
                        <td colspan='2'>Referencia personal:  {$usuario['referencia']} </td>
                    </tr>
        
                    <tr>
                        <td colspan='2'>Email:  {$usuario['correo']}</td>
                        <td colspan='2'>Teléfono Referencia:  {$usuario['telefonoRef']} </td>
                    </tr>
        
                </table>";

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

                    $respuestas =  parent::mostrarRespuestas($pregunta[0], $adopcion['idUsuario'], $adopcion['idAnimalAdoptado']);
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

                echo "</tbody>
                </table>";

                echo "";

            }else{

                echo "algo ha salido mal, regresa";

            }



            
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR RESPUESTAS: " .$e->getMessage());
        }

    }
}

?>