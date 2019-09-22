<?php

class PreguntasAdopcionController extends PreguntasAdopcion{

    public function mostrarFormularioPreguntas($idAnimal){
        
        try {
            
            $preguntas = parent::dataPreguntas();

            if($preguntas->rowCount() > 0){

               
                foreach($preguntas AS $pregunta){

                    if($pregunta[0] % 2 == 0){

                        if($pregunta[3] == 1){
                            echo "
                            <div class='boxInput preguntaDerecha'>
                                <div class='pregunta'>$pregunta[0]. $pregunta[1]</div>
                                <label for='si$pregunta[0]'>Sí</label> 
                                <input type='$pregunta[2]' value='si' id='si$pregunta[0]' name='$pregunta[0]'>

                                <label for='no$pregunta[0]'>No</label> 
                                <input type='$pregunta[2]' value='no' id='no$pregunta[0]' name='$pregunta[0]'>";

                            if($pregunta[4] != null){
                                echo "<label for='db$pregunta[0]'>$pregunta[4]</label>
                                <input type='text' id='db$pregunta[0]'>";
                            }

                            echo 
                            "</div>";

                        }else{

                            if($pregunta[0] == 22){
                                echo "
                                    <div class='boxRadio preguntaDerecha'>
                                        <div class='pregunta'>$pregunta[0]. $pregunta[1]</div>
                                        <label for=''></label>
                                    </div>
                                ";
                            }elseif($pregunta[0] == 24){
                                
                                echo " 
                                <div class='boxInput preguntaDerecha'>
                                    <label for='$pregunta[0]'>$pregunta[0]. $pregunta[1]</label>
                                    <input type='$pregunta[2]' id='$pregunta[0]'>
                                    
                                    <label for='db$pregunta[0]'> $pregunta[4]</label>
                                    <input type='number' id='db$pregunta[0]'>
                                </div> ";
                            }else{
                                
                                echo " 
                                <div class='boxInput preguntaDerecha'>
                                    <label for='$pregunta[0]'>$pregunta[0]. $pregunta[1]</label>
                                    <input type='$pregunta[2]' id='$pregunta[0]'>
                                </div> ";
                            }
                        }
                    }
                    else{
                        if($pregunta[3] == 1){
                            echo "
                            <div class='boxInput preguntaIzquierda'>
                                <div class='pregunta'>$pregunta[0]. $pregunta[1]</div>
                                <label for='si$pregunta[0]'>Sí</label> 
                                <input type='$pregunta[2]' value='si' id='si$pregunta[0]' name='$pregunta[0]'>

                                <label for='no$pregunta[0]'>No</label> 
                                <input type='$pregunta[2]' value='no' id='no$pregunta[0]' name='$pregunta[0]'>";

                            if($pregunta[4] != null){
                                echo "<label for='db$pregunta[0]'>$pregunta[4]</label>
                                <input type='text' id='db$pregunta[0]'>";
                            }

                            echo 
                            "</div>";

                        }else{

                            if($pregunta[0] == 22){
                                echo "
                                    <div class='boxRadio preguntaIzquierda'>
                                        <div class='pregunta'>$pregunta[0]. $pregunta[1]</div>
                                        <label for=''></label>
                                    </div>
                                ";
                            }else{
                                
                                echo " 
                                <div class='boxInput preguntaIzquierda'>
                                <label for='$pregunta[0]'>$pregunta[0]. $pregunta[1]</label>
                                <input type='$pregunta[2]' id='$pregunta[0]'>
                                </div> ";
                            }
                        }
                    }

                    
                }
            
            }
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR LAS PREGUNTAS: ".$e->getMessage());
        }
    }
}

?>