<?php 

class AnimalesController extends Animal{

    public function mostrarDatosDeTodosGeneral(){
        try{
            
            $animales = parent::dataAnimal('');
        
            if($animales->rowCount() > 0){
        
                foreach($animales as $datos) {
        
                    $fotos = Foto::dataFotos($datos[0]);
                    $urlFotoPerfil = $fotos->fetch();
        
                    echo "<div class='card-adopta'>
                        <div class='image_card'><img src='publico/images/$urlFotoPerfil[1]'></div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Especie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <th>$datos[1]</th>
                                <th>$datos[2]</th>
                            </tbody>
                        </table>
                        <div class='btns_card'>
                            <a href='' class='btn_naranja'>Adoptar</a>
                            <a href='?perfil=$datos[0]' class='btn_naranja'>Conocer</a>
                        </div>
                    </div>";
                }
            }else{
                echo " <div class='errNoData'>No se han encontrado animalitos disponibles para adoptar</div> ";
                include 'vista/vacio.php';
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

                    <div class='header'>
                        <div class='btn_tabs'>
                            <i class='fas fa-info-circle'></i>
                            <i class='fas fa-image'></i>
                            <i class='fas fa-syringe'></i>
                        </div>
                        
                        <div class='fotoPerfil'>
                            <img src='publico/images/$urlFotoPerfil[1]'>
                        </div>
                        
                        <h2 class='nombreAnimal'>$datos[1]</h2>

                    <!-- <div class='adoptadoORadoptar'>
                    <span>información legal de la adopción</span>
                    <strong>Fecha de adopción: 2016/05/20</strong>
                    </div> -->

                    </div>


                    <div class='perfilTabsItems'>
                        <div class='descripcion'>
                            <h4>Descripción</h4>
                            <p>$datos[8]</p>
                        </div>

                        <div class='informacion'>
                            <table>
                                <tr>
                                    <td>Especie:</td>
                                    <td>$datos[2]</td>
                                </tr>
                                <tr>
                                    <td>Raza:</td>
                                    <td>$datos[3]</td>
                                </tr>
                                <tr>
                                    <td>Color:</td>
                                    <td>$datos[4]</td>
                                </tr>
                                <tr>
                                    <td>Sexo:</td>
                                    <td>".genero($datos[5])."</td>
                                </tr>
                                <tr>
                                    <td>Edad:</td>
                                    <td>".edad($datos[6])."</td>
                                </tr>
                                <tr>
                                    <td>Esterilizado:</td>
                                    <td>".esterilizado($datos[7])."</td>
                                </tr>
                                <tr>
                                    <td>Procedencia:</td>
                                    <td>$datos[9]</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class='perfilTabsItems'>
                        <div class='fotos'>
                            "; 
                            foreach($fotos as $urlsTodas){
                                echo "<img src='publico/images/$urlsTodas[1]'>";
                            }
                            echo "
                        </div>
                    </div>

                    <div class='perfilTabsItems'>
                        <div class='vacunas'>
                            <h3>Vacunas aplicadas:</h3>
                            <div class='vacuna'>
                            rataviru 
                                <div class='descripcionVacuna'><i class='fas fa-caret-up'></i> Quien sabe pa que sirve esa joda</div>
                            </div>
                        </div>
                    </div>
                </div>
                    ";
                    echo " 
                    <script src='publico/js/perfilTabs.js'></script>
                    <script>
                    perfilTabs();
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
        $con = parent::conectar();
        try {

            require_once '../funciones.php';
            $animales = parent::dataAnimal('');

            if($animales->rowCount() > 0){
        
                foreach($animales as $datos){

                    $fotos = Foto::fotoPerfil($datos[0]);
                    $urlFotoPerfil = $fotos->fetch();

                    $verfifcarAdopcion = $con->prepare("SELECT * FROM adopciones WHERE idAnimalAdoptado = :idAnimal");
                    $verfifcarAdopcion->bindParam(':idAnimal', $datos[0]);
                    $verfifcarAdopcion->execute();

                    if($verfifcarAdopcion->rowCount() > 0){

                        $idsAdopcion = $verfifcarAdopcion->fetch();
                        echo " 
                    <tr>
                        <td onclick=''><img src='publico/images/$urlFotoPerfil[1]'></td>
                        <td>$datos[1]</td>
                        <td>$datos[2]</td>
                        <td><a href='adoptar.php?adopcion=$idsAdopcion[0]'>Ver adopción</a></td>
                        <td><a href='?vacunas=$datos[0]' class='btn_cafe'>ver</a></td>
                        <td><a href='?fotos=$datos[0]' class='btn_cafe'>fotos</a></td>
                        <td><a href='?editar=$datos[0]' class='btn_cafe'>Editar</a></td>
                        <td><a class='btn_rojo' onclick='eliminarComfirm([$datos[0], \"$datos[10]\"])'>Eliminar</a></td>
                        
                    </tr> ";
                    }else{

                        echo " 
                        <tr>
                            <td onclick=''><img src='publico/images/$urlFotoPerfil[1]'></td>
                            <td>$datos[1]</td>
                            <td>$datos[2]</td>
                            <td>No</td>
                            <td><a href='?vacunas=$datos[0]' class='btn_cafe'>Ver </a></td>
                            <td><a href='?fotos=$datos[0]' class='btn_cafe'>fotos</a></td>
                            <td><a href='?editar=$datos[0]' class='btn_cafe'>Editar</a></td>
                            <td><a class='btn_rojo' onclick='eliminarComfirm([$datos[0], \"$datos[10]\"])'>Eliminar</a></td>
                            
                        </tr> ";
                    }
                    
                }
            }else{
                echo "<div class='errNoData'> No hay animalitos agregados <a class='btn_naranja' onclick='agregarAnimalitos()'>Agregar una mascota</a></div>";
                echo "<tr>
                <td rowspan='7' colspan='7'>";
                include '../../vista/vacio.php';
                echo 
                "</td>
                </tr>";
            }
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR LOS ANIMALITOS: ".$e->getMessage());
        }
    }

    public function mostrarCoincidenciasAdmin($nombre, $especie, $raza, $color, $sexo){
        try{
            $animales = parent::searchAnimal($nombre, $especie, $raza, $color, $sexo);

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
                echo "<div class='errNoData'>No se han encontrado animalitos<a class='btn_naranja'>Agregar una mascota</a></div>";
            }
        }catch(Exception $e){

        }
    }

    public function formularioEditarAnimalito($id){
        try{
            $datos = parent::dataAnimal($id);

            if($datos->rowCount() > 0){
                $datos = $datos->fetch();

                $foto = Foto::dataFotos($datos[0]);
                $fotoDePerfil = $foto->fetch();

                echo "<fieldset class='editarAnimalito padding-menu'>

                <h2 class='titulo'>Editar mascota</h2>

                <div class='row'>
                
                <form method='post' id='editAnimalito'>
                    <div class='boxInput'>
                        <input type='text' placeholder='nombre del perrito' name='nombreAnE' value='$datos[1]'>
                    </div>
                        
                    <div class='boxInput'>
                        <select name='especieE'>
                            <option value='Perro'>Perro</option>
                            <option value='Gato'>Gato</option>
                        </select>
                    </div>

                    <div class='boxInput'>
                        <input type='text' placeholder='raza' name='razaE' value='$datos[3]'>
                    </div>

                    <div class='boxInput'>
                        <input type='text' placeholder='color' name='colorE' value='$datos[4]'>
                    </div>

                    <div class='boxInput'>
                    
                        <select name='sexoE'>
                            // <option value='>Sexo</option>
                            <option value='M'>Masculino</option>
                            <option value='F'>Femenino</option>
                        </select>
                    </div>
                    
                        <div class='boxInput'>
                            <input type='number' name='edad' value='$datos[6]'>
                        </div>

                    <div class='boxRadio'>
                        <h3 class='pregunta'>¿Esterilizado?</h3>
                        <label for='si'>Sí</label>
                        <input type='radio' name='esterilizadoE' id='si' value='si'>
                        <label for='no'>No</label>
                        <input type='radio' name='esterilizadoE' id='no' value='no'>
                    </div>
                        
                    <div class='boxInput'>
                        <textarea name='descripcionE' placeholder='descripcion del animalito' rows='4'>$datos[8]</textarea>
                    </div>
                        
                    <div class='boxInput'>
                        <input type='text' name='procedenciaE' placeholder='procedencia' value='$datos[9]'>
                    </div>

                    <input type='hidden' id='idE' value='$datos[0]'>
                    
                    
                    <div class='boxInput'>
                        <input type='submit' value='Enviar cambios'>
                    </div>
                    
                </form>
                
                <div class='informacionPrevia'>
                    <div class='fotoPerfil'><img src='publico/images/$fotoDePerfil[1]'></div>
                    <h4>Información previa</h4>
            
                    <table>
                        <tr>
                            <td>Nombre:</td>
                            <td>$datos[1]</td>
                        </tr>
                        <tr>
                            <td>Especie</td>
                            <td>$datos[2]</td>
                        </tr>
                        <tr>
                            <td>Raza</td>
                            <td>$datos[3]</td>
                        </tr>
                        <tr>
                            <td>Color:</td>
                            <td>$datos[4]</td>
                        </tr>
                        <tr>
                            <td>Edad:</td>
                            <td>$datos[5]</td>
                        </tr>
                        <tr>
                            <td>Sexo:</td>
                            <td>$datos[6]</td>
                        </tr>
                        <tr>
                            <td>Esterilizado:</td>
                            <td>$datos[7]</td>
                        </tr>
                        <tr>
                            <td>Procedencia:</td>
                            <td>$datos[9]</td>
                        </tr>
                    </table>
                </div>
            </div>
                        
                        <div class='boxInput' style='margin: auto; width: 53%'>
                        <button class='btn_naranja btn_largo' onclick='window.location = \"animalitos.php\"' >Cancelar</button>
                </div>
                    
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

    // Animalitos usuario
    
    // public function mostrarAnimalesAdoptados($idUsuario){
    //         $con = parent::conectar();
    //     try {
    //         $query = $con->prepare("SELECT animales.*, usuarios.id AS idUsuario, adopciones.numAdopcion, adopciones.fechaAdopcion  FROM adopciones, usuarios, animales WHERE animales.id = idAnimalAdoptado AND adopciones.idUsuario = usuarios.id AND usuarios.id = :idUsuario");
    //         $query->bindParam(':idUsuario', $idUsuario);
    //         $query->execute();

    //         if($query->rowCount() > 0){

    //             require_once 'modelo/fotos.php';

    //             require_once 'controlador/funciones.php';

    //             foreach ($query as $datos) {

    //                 $fotos = Foto::dataFotos($datos[0]);
    
    //                 $urlFotoPerfil = $fotos->fetch();

    //                 echo "
    //                 <div class='perfil'>
    
    //                     <div class='header'>
    //                         <div class='btn_tabs'>
    //                             <i class='fas fa-info-circle'></i>
    //                             <i class='fas fa-image'></i>
    //                             <i class='fas fa-syringe'></i>
    //                         </div>
                            
    //                         <div class='fotoPerfil'>
    //                             <img src='publico/images/$urlFotoPerfil[1]'>
    //                         </div>
                            
    //                         <h2 class='nombreAnimal'>$datos[1]</h2>
    
    //                     <div class='adoptadoORadoptar'>
    //                     <span>información legal de la adopción</span>
    //                     <strong>Fecha de adopción: $datos[13]</strong>
    //                     </div>
    
    //                     </div>
    
    //                     <div class='perfilTabsItems'>
    //                         <div class='descripcion'>
    //                             <h4>Descripción</h4>
    //                             <p>$datos[8]</p>
    //                         </div>
    
    //                         <div class='informacion'>
    //                             <table>
    //                                 <tr>
    //                                     <td>Especie:</td>
    //                                     <td>$datos[2]</td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td>Raza:</td>
    //                                     <td>$datos[3]</td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td>Color:</td>
    //                                     <td>$datos[4]</td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td>Sexo:</td>
    //                                     <td>".genero($datos[5])."</td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td>Edad:</td>
    //                                     <td>".edad($datos[6])."</td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td>Esterilizado:</td>
    //                                     <td>".esterilizado($datos[7])."</td>
    //                                 </tr>
    //                                 <tr>
    //                                     <td>Procedencia:</td>
    //                                     <td>$datos[9]</td>
    //                                 </tr>
    //                             </table>
    //                         </div>
    //                     </div>
    
    //                     <div class='perfilTabsItems'>
    //                         <div class='fotos'>
    //                             "; 
    //                             foreach($fotos as $urlsTodas){
    //                                 echo "<img src='publico/images/$urlsTodas[1]'>";
    //                             }
    //                             echo "
    //                         </div>
    //                     </div>
    
    //                     <div class='perfilTabsItems'>
    //                         <div class='vacunas'>
    //                             <h3>Vacunas aplicadas:</h3>
    //                             <div class='vacuna'>
    //                             rataviru 
    //                                 <div class='descripcionVacuna'><i class='fas fa-caret-up'></i> Quien sabe pa que sirve esa joda</div>
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                     ";
    //                     echo " 
    //                     <script src='publico/js/perfilTabs.js'></script>
    //                     <script>
    //                     perfilTabs();
    //                     </script>
    //                     ";
    //             }
    //         }else{
    //             echo " <div class='noAdopcion'>

    //             <div class='mensajeAdopta'>Aún no has adoptado una mascota ¿Deseas adoptar? <br><br><a href='' class='btn_naranja'>Adoptar</a></div>
    //             <div class='mensajeApadrina'>¿No puedes adoptar? Apadrina una mascota<br><br> <a href='' class='btn_naranja'>Adoptar</a></div>

    //             <div class='husky'>
    //             <div class='mane'>
    //                 <div class='coat'></div>
    //             </div>
    //             <div class='body'>
    //                 <div class='head'>
    //                 <div class='ear'></div>
    //                 <div class='ear'></div>
    //                 <div class='face'>
    //                     <div class='eye'></div>
    //                     <div class='eye'></div>
    //                     <div class='nose'></div>
    //                     <div class='mouth'>
    //                     <div class='lips'></div>
    //                     <div class='tongue'></div>
    //                     </div>
    //                 </div>
    //                 </div>
    //                 <div class='torso'></div>
    //             </div>
    //             <div class='legs'>
    //                 <div class='front-legs'>
    //                 <div class='leg'></div>
    //                 <div class='leg'></div>
    //                 </div>
    //                 <div class='hind-leg'>
    //                 </div>
    //             </div>
    //             <div class='tail'>
    //                 <div class='tail'>
    //                 <div class='tail'>
    //                     <div class='tail'>
    //                     <div class='tail'>
    //                         <div class='tail'>
    //                         <div class='tail'></div>
    //                         </div>
    //                     </div>
    //                     </div>
    //                 </div>
    //                 </div>
    //             </div>
    //             </div>

                
    //             </div> ";
    //         }
    //     } catch (Exception $e) {
    //         exit("ERROR AL MOSTRAR ANIMALITO]: ".$e->getMessage());
    //     }
    // }
    
}

?>