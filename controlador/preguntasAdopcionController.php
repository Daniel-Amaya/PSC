<?php

class PreguntasAdopcionController extends PreguntasAdopcion{

    public function mostrarFormularioPreguntas(){
        
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
                                    <div class='boxInput preguntaDerecha pregunta22'>
                                        <div class='pregunta'>$pregunta[0]. $pregunta[1]</div>

                                        <div class='boxRadio'>
                                            <input type='checkbox' name='$pregunta[0]' id='cuidado1'>
                                            <label for='cuidado1'>visitas periódicas al veterinario </label>
                                        </div>

                                        <div class='boxRadio'>
                                            <input type='checkbox' name='$pregunta[0]' id='cuidado2'>
                                            <label for='cuidado2'> vacunación y vitaminas  </label>
                                        </div>

                                        <div class='boxRadio'>
                                            <input type='checkbox' name='$pregunta[0]' id='cuidado3'>
                                            <label for='cuidado3'> paseos con correa para perro </label>
                                        </div>

                                        <div class='boxRadio'>
                                            <input type='checkbox' name='$pregunta[0]' id='cuidado4'>
                                            <label for='cuidado4'> uso de collar con placa de identificación</label>
                                        </div>

                                        <div class='boxRadio'>
                                            <input type='checkbox' name='$pregunta[0]' id='cuidado5'>
                                            <label for='cuidado5'> plato con agua limpia todos los días </label>
                                        </div>

                                        <div class='boxRadio'>
                                            <input type='checkbox' name='$pregunta[0]' id='cuidado6'>
                                            <label for='cuidado6'> Desparasitación </label>
                                        </div>

                                        <div class='boxRadio'>
                                            <input type='checkbox' name='$pregunta[0]' id='cuidado7'>
                                            <label for='cuidado7'> cepillado de pelo  </label>
                                        </div>

                                        <div class='boxRadio'>
                                            <input type='checkbox' name='$pregunta[0]' id='cuidado8'>
                                            <label for='cuidado8'> limpieza diaria de arenero de gatito  </label>
                                        </div>

                                        <div class='boxRadio'>
                                            <input type='checkbox' name='$pregunta[0]' id='cuidado9'>
                                            <label for='cuidado9'> Alimentación solo con croquetas </label>
                                        </div>

                                    </div>
                                ";
                            }elseif($pregunta[0] == 24){
                                
                                echo " 
                                <div class='boxInput preguntaDerecha'>
                                    <label for='$pregunta[0]'>$pregunta[0]. $pregunta[1]</label>
                                    <input type='$pregunta[2]' id='$pregunta[0]' name='$pregunta[0]'>
                                    
                                    <label for='db$pregunta[0]'> $pregunta[4]</label>
                                    <input type='number' id='db$pregunta[0]' name='db$pregunta[0]'>
                                </div> ";
                            }else{
                                
                                echo " 
                                <div class='boxInput preguntaDerecha'>
                                    <label for='$pregunta[0]'>$pregunta[0]. $pregunta[1]</label>
                                    <input type='$pregunta[2]' id='$pregunta[0]' name='$pregunta[1]'>
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