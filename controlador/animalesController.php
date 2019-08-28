<?php 

// require '../modelo/connect.php';
// require '../modelo/animales.php';


class AnimalesController extends Animal{

    public function mostrarDatosDeTodosGeneral(){
        try{
            echo "
            <div class='indic'>
                <p>Aquí podrás encontrar nuestros animalitos disponibles para adoptar</p> <hr>
                <strong>Adoptar</strong>
            </div>";
        
            $animales = parent::dataAnimal('');
        
            if($animales->rowCount() > 0){
        
                foreach($animales as $datos) {
        
                    $fotos = Foto::dataFotos($datos[0]);
                    $urlFotoPerfil = $fotos->fetch();
        
                    echo "<div class='card-adopta'>
                        <div><img src='publico/images/$urlFotoPerfil[1]'></div>
                        <div class='nombre'>$datos[1]</div>
                        <div class='info'>Especie: $datos[2]</div>
                        <div>
                            <a href='' class='btn_naranja'>Adoptar</a>
                            <a href='' class='btn_naranja'>Apadrinar</a>
                            <a href='?perfil=$datos[0]' class='btn_naranja'>Conocer</a>
        
                        </div>
                    </div>";
                }
            }else{
                echo "<div class='errNoData'>No hay animalitos disponibles  :(</div>";
            }
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR LOS DATOS DE LOS ANIMALITOS: ".$e->getMessage());
        }

    }

    public function mostrarPerfilGeneral($id){
        
        try{

            require_once 'funciones.php';
            $animales = parent::dataAnimal($id);

            if($animales->rowCount() > 0){

                $datos = $animales->fetch();
                $fotos = Foto::dataFotos($datos[0]);

                $urlFotoPerfil = $fotos->fetch();

            echo "
                <div class='perfil'>
                    <div class='general'>
                        <div class='foto-perfil'>
                            <img src='publico/images/$urlFotoPerfil[1]'>
                        </div>
                        <div class='name'>
                            $datos[1] <hr>
                            <div id='control-tabs'>
                                <button>Información</button>
                                <button>Galeria</button>
                            </div>
                        </div>
                    </div>

                    <div id='tabs'>

                        <div class='tab-item'>
                            <div class='info'>
                                <div class='col'>
                                    <ul>
                                        <li>Especie:</li>
                                        <li>Raza:</li>
                                        <li>Color:</li>
                                        <li>Sexo:</li>
                                        <li>Esterilizado:</li>
                                    </ul>
                                    <ul>
                                        <li>$datos[2]</li>
                                        <li>$datos[3]</li>
                                        <li>$datos[4]</li>
                                        <li>".genero($datos[5])."</li>
                                        <li>$datos[6]</li>
                                    </ul>
                                </div>
                                <div class='col'>
                                    <div>
                                        <h3>Lugar de Procedencia</h3>
                                        <p>Medellin, Robledo</p>
                                    </div>
                                    <div>
                                        <h3>Descripción:</h3>
                                        <p>
                                            $datos[7]
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class='tab-item'>
                            <div class='galeria'>

                            ";

                            foreach($fotos as $urlsTodas){
                                echo "<div class='imageItem'><img src='publico/images/$urlsTodas[1]'></div>";
                            }

                    echo " </div>
                        </div>
                    </div>
                    <script src='publico/js/perfilTabs.js'></script>
                    <script>
                    tabs();
                    </script>
                    ";
            }else{
                echo "<div class='errNoData'>No se ha encontrado ningúna mascota con esta identificación</div>";
            }
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR LA INFORMACIÓN DEL ANIMALITO: ".$e->getMessage());
        }
    }

    // Animalitos Admin

    public function mostrarAnimalitosAdmin(){
        try {
            $animales = parent::dataAnimal('');

            if($animales->rowCount() > 0){
        
                foreach($animales as $datos){
        
                    $fotos = Foto::dataFotos($datos[0]);
                    $urlFotoPerfil = $fotos->fetch();
        
                    echo "<div class='card-adopta'>
                        <div><img src='publico/images/$urlFotoPerfil[1]'></div>
                        <div class='nombre'>$datos[1]</div>
                        <div class='info'>Especie: $datos[2]</div>
                        <div>
                            <a class='btn_rojo' onclick='eliminarComfirm([$datos[0], \"$datos[9]\"])'>Eliminar</a>
                            <a href='?editar=$datos[0]' class='btn_naranja'>Edit/Ver</a>
                            <a href='?fotos=$datos[0]' class='btn_naranja'>Agg/Bor foto</a>
        
                        </div>
                    </div>";
        
                }
            }else{
                echo "<div class='errNoData'> No hay animalitos agregados <a class='btn_naranja'>Agregar una mascota</a></div>";
            }
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR LOS ANIMALITOS: ".$e->getMessage());
        }
    }

    public function formularioEditarAnimalito($id){
        try{
            $datos = parent::dataAnimal($id);

            if($datos->rowCount() > 0){
                $datos = $datos->fetch();

                echo "<fieldset class='fielNewAnimalito margin-menu'>

                <h2 class='center'>Editar datos de la mascota</h2>
                
                <form method='post' class='newAnimalito' id='editAnimalito'>
                    <div class='boxInput'>
                        <label for='nombreAnE'>Nombre del animalito</label>
                        <input type='text' placeholder='nombre del perrito' name='nombreAnE' value='$datos[1]'>
                    </div>

                    <div class='boxInput'>
                        <label for='especieE'>Especie</label>
                        <select name='especieE' value='$datos[2]'>
                            <option value='Perro'>Perro</option>
                            <option value='Gato'>Gato</option>
                        </select>
                    </div>

                    <div class='boxInput'>
                        <label for='razaE'>Raza</label>
                        <input type='text' placeholder='raza' name='razaE' value='$datos[3]'>
                    </div>

                    <div class='boxInput'>
                        <label for='colorE'>Color</label>
                        <input type='text' placeholder='color' name='colorE' value='$datos[4]'>
                    </div>

                    <div class='boxInput'>
                    <label for='sexoE'>Sexo</label>

                        <select name='sexoE' value='$datos[5]'>
                            <option value='>Sexo</option>
                            <option value='M'>Masculino</option>
                            <option value='F'>Femenino</option>
                        </select>
                    </div>

                    <div class='boxInput'>
                        <h3>¿Esterilizado?</h3>
                        <label for='si'>Sí</label>
                        <input type='radio' name='esterilizadoE' id='si' value='si'>
                        <label for='no'>No</label>
                        <input type='radio' name='esterilizadoE' id='no' value='no'>
                    </div>

                    <div class='boxInput'>
                        <label for='descripcionE'>Descripción</label>
                        <textarea name='descripcionE' placeholder='descripcion del animalito' rows='4'>$datos[7]</textarea>
                    </div>

                    <div class='boxInput'>
                        <label for='procedenciaE'>Procedencia</label>
                        <input type='text' name='procedenciaE' placeholder='procedencia' value='$datos[8]'>
                    </div>

                    <input type='hidden' id='idE' value='$datos[0]'>


                    <div class='boxInput'>
                        <input type='submit' value='Enviar cambios'>
                        <button class='btn_naranja'>Cancelar</button>
                    </div>

                </form>
                    
            </fieldset>";

            echo "<script>
            classNames('animalitos')[0].style.display = 'none';
            editarAnimalito();
            </script>";
            
            }else{
                echo "File No Found";
            }
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR EL FORMULARIO DE EDICIÓN: " .$e->getMessage());
        }
    }


}


?>