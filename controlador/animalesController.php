<?php

use PHPMailer\PHPMailer\Exception;

/**
 * 
 */
trait mostrarAnimalitos{
    static function animalitosAdmin($animales, $con){
        if($animales->rowCount() > 0){
        
            foreach($animales as $datos){

                $datosj = json_encode($datos);
                $fotos = Foto::fotoPerfil($datos[0]);
                $urlFotoPerfil = $fotos->fetch();

                $verfifcarAdopcion = $con->prepare("SELECT * FROM adopciones WHERE idAnimalAdoptado = :idAnimal");
                $verfifcarAdopcion->bindParam(':idAnimal', $datos[0]);
                $verfifcarAdopcion->execute();

                if($verfifcarAdopcion->rowCount() > 0){

                    $idsAdopcion = $verfifcarAdopcion->fetch();
                    echo " 
                <tr>
                    <td onclick='modalAnimalitos($datosj, \"$urlFotoPerfil[1]\", \"".edad($datos[6])."\")'><img src='publico/images/$urlFotoPerfil[1]'></td>
                    <td>$datos[1]</td>
                    <td>$datos[2]</td>
                    <td><a href='adoptar.php?adopcion=$idsAdopcion[0]'>Ver adopción</a></td>
                    <td><a href='?vacunas=$datos[0]' class='btn_cafe'>Vacunas</a></td>
                    <td><a href='?fotos=$datos[0]' class='btn_cafe'>fotos</a></td>
                    <td><a href='?editar=$datos[0]' class='btn_cafe'>Editar</a></td>
                    <td><a class='btn_rojo' onclick='alert(\"No es permitida esta acción ya que el animalito ha sido adoptado\")'>Eliminar</a></td>
                    
                </tr> ";
                }else{

                    echo " 
                    <tr>
                        <td onclick='modalAnimalitos($datosj, \"$urlFotoPerfil[1]\", \"".edad($datos[6])."\")'><img src='publico/images/$urlFotoPerfil[1]'></td>
                        <td>$datos[1]</td>
                        <td>$datos[2]</td>
                        <td>No</td>
                        <td><a href='?vacunas=$datos[0]' class='btn_cafe'>Vacunas </a></td>
                        <td><a href='?fotos=$datos[0]' class='btn_cafe'>fotos</a></td>
                        <td><a href='?editar=$datos[0]' class='btn_cafe'>Editar</a></td>
                        <td><a class='btn_rojo' onclick='eliminarComfirm([$datos[0], \"$datos[10]\"])'>Eliminar</a></td>
                        
                    </tr> ";
                }
                
            }
            
        }else{
            echo "<div class='errNoData'> No hay animalitos agregados <a class='btn_naranja' onclick='agregarAnimalitos()'>Agregar una mascota</a></div>";
            echo "<tr>
            <td rowspan='7' colspan='8'>";
            include '../../vista/vacio.php';
            echo 
            "</td>
            </tr>";
        }
    }

    static function animalitosUser($animales, $con, $idUsuario){
        if($animales->rowCount() > 0){

            $cont = 0;

            foreach($animales as $datos) {

                $verificarAdopcion = $con->query("SELECT * FROM adopciones WHERE idAnimalAdoptado=$datos[0]");
                if($verificarAdopcion->rowCount() == 0){

                    $solicitado = $con->prepare("SELECT solicitudesadopcion.* FROM animales, usuarios, solicitudesadopcion WHERE animales.id = idAnimal AND solicitudesadopcion.idUsuario = usuarios.id AND idUsuario = :idUsuario AND idAnimal=:idAnimal");
                    $solicitado->bindParam(':idUsuario', $idUsuario);
                    $solicitado->bindParam(':idAnimal', $datos[0]);
                    $solicitado->execute();

                    $cont++;

                    // Perrito 
                    if($cont == 3){

                        echo '
                        <div class="boxPerrito"><i class="far fa-copyright txt" style="float:right"></i><div class="tooltip">
                        Animacion por Pavel Kozelskiy (CodePen) 
                       </div><div class="dog">
                        <div class="heart heart--1"></div>
                        <div class="heart heart--2"></div>
                        <div class="heart heart--3"></div>
                        <div class="heart heart--4"></div>
                        <div class="head">
                                <div class="year year--left"></div>
                                <div class="year year--right"></div>
                                <div class="nose"></div>	
                            <div class="face">
                                <div class="eye eye--left"></div>
                                <div class="eye eye--right"></div>
                                <div class="mouth"></div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="cheast"></div>
                            <div class="back"></div>
                            <div class="legs">
                                <div class="legs__front legs__front--left"></div>
                                <div class="legs__front legs__front--right"></div>
                                <div class="legs__back legs__back--left"></div>
                                <div class="legs__back legs__back--right"></div>
                            </div>
                            <div class="tail"></div>
                        </div>
                    </div></div>';
                    }

                    // Otro perrito
                    if($cont == 6){
                        echo '	
                        <div class="corgi">
                        <i class="far fa-copyright txt" style="float:left"></i><div class="tooltip">
                        Animacion por Mok Jee Jin (CodePen) 
                       </div>
                            <div class="head">
                                <div class="ear ear--r"></div>
                                <div class="ear ear--l"></div>
            
                                <div class="eye eye--left"></div>
                                <div class="eye eye--right"></div>
            
                                <div class="face">
                                    <div class="face__white">
                                        <div class=" face__orange face__orange--l"></div>
                                        <div class=" face__orange face__orange--r"></div>
                                    </div>
                                </div>
            
                                <div class="face__curve"></div>
            
                                <div class="mouth">
            
                                    <div class="nose"></div>
                                    <div class="mouth__left">
                                        <div class="mouth__left--round"></div>
                                        <div class="mouth__left--sharp"></div>
                                    </div>
                                    
                                    <div class="lowerjaw">
                                        <div class="lips"></div>
                                        <div class="tongue test"></div>
                                    </div>
            
                                    <div class="snout"></div>
                                </div>
                            </div>
                            
                            <div class="neck__back"></div>
                            <div class="neck__front"></div>
            
                            <div class="body">
                                <div class="body__chest"></div>
                            </div>
            
                            <div class="foot foot__left foot__front foot__1"></div>
                            <div class="foot foot__right foot__front foot__2"></div>
                            <div class="foot foot__left foot__back foot__3"></div>
                            <div class="foot foot__right foot__back foot__4"></div>
            
                            <div class="tail test"></div>
                        </div>';
                    }

        
                    $fotos = Foto::fotoPerfil($datos[0]);
                    $urlFotoPerfil = $fotos->fetch();

                    $solicitud = $solicitado->fetch();
                
                    if($solicitado->rowCount() > 0 && $solicitud['estado'] != "rechazada"){

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
                                <a class='btn_rojo btn_largo' onclick='cancelarSolicitud($solicitud[0])'>Cancelar solicitud</a>
                                <!-- <a href='?perfil=$datos[0]' class='btn_naranja'>Conocer</a> -->
                            </div>
                        </div>";
                   

                    }else{
                        
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
                                <a class='btn_naranja buttonCorazones' onclick='solicitarAdopcion(\"$datos[1]\", \"publico/images/$urlFotoPerfil[1]\", $datos[0], $idUsuario)'>Adoptar
                                    <div class='AnimacionCorazones cor1'></div>
                                    <div class='AnimacionCorazones cor2'></div>
                                    <div class='AnimacionCorazones cor3'></div>
                                    <div class='AnimacionCorazones cor4'></div>
                                </a>
                                <a href='?perfil=$datos[0]' class='btn_naranja'>Conocer</a>
                            </div>
                        </div>";

                    }
                }
            }

        }else{
            echo " <div class='errNoData'>No se han encontrado animalitos disponibles para adoptar</div> ";
            include 'vista/vacio.php';
        }
    }

    static function animalitosGeneral($animales, $con, $ifi){
        if($ifi == true){
            $conrtador = 0;
        }
        if($animales->rowCount() > 0){
        
            foreach($animales as $datos) {

                $verificarAdopcion = $con->query("SELECT * FROM adopciones WHERE idAnimalAdoptado=$datos[0]");
                if($verificarAdopcion->rowCount() == 0){

                    if($ifi == true){
                        $conrtador++;
                        if($conrtador > 4){
                            break;
                        }
                    }

                    $fotos = Foto::fotoPerfil($datos[0]);
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
                            <a href='iniciar-sesion.php' class='btn_naranja buttonCorazones'>Adoptar
                                <div class='AnimacionCorazones cor1'></div>
                                <div class='AnimacionCorazones cor2'></div>
                                <div class='AnimacionCorazones cor3'></div>
                                <div class='AnimacionCorazones cor4'></div>
                            </a>
                            <a href='adoptar.php?perfil=$datos[0]' class='btn_naranja'>Conocer</a>
                        </div>
                    </div>";
                }
            }

        }else{
            echo " <div class='errNoData'>No se han encontrado animalitos disponibles para adoptar</div> ";
            include 'vista/vacio.php';
        }
    }
}

class AnimalesController extends Animal{

    use mostrarAnimalitos;

    public function mostrarDatosDeTodosGeneral(){
        $con = parent::conectar();
        try{
            
            $animales = parent::dataAnimal('');

            self::animalitosGeneral($animales, $con, false);
        
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

                $urlFotoPerfil = Foto::fotoPerfil($datos[0]);
                $urlFotoPerfil = $urlFotoPerfil->fetch();

                $vacunas = VacunasController::mostrarVacunasAplicadas($datos[0]);


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
                        <div class='fotos' id='fotos'>
                            "; 
                            foreach($fotos as $urlsTodas){
                                echo "<img src='publico/images/$urlsTodas[1]'>";
                            }
                            echo "
                        </div>
                    </div>

                    <div class='perfilTabsItems'>
                        <div class='vacunas'>
                            <h3>Vacunas aplicadas:</h3> "; 

                            foreach($vacunas AS $vacuna){
                                echo "<div class='vacuna'>
                                $vacuna[4]
                                    <div class='descripcionVacuna'><i class='fas fa-caret-up'></i> $vacuna[5]</div>
                                </div>";
                            }
                            
                            echo " 
                        </div>
                    </div>
                </div>
                    ";
                    echo " 
                    
                    <script src='publico/js/perfilTabs.js'></script>
                    <script>
                    perfilTabs();
                    </script>
                    <script src='publico/js/galeriaAnimalitos.js'></script>
                    ";
            }else{
                echo "<div class='errNoData'>No se ha encontrado ningúna mascota con esta identificación</div>";
            }
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR LA INFORMACIÓN DEL ANIMALITO: ".$e->getMessage());
        }
    }

    public function mostrarAnimalitosIndex(){
        $con = parent::conectar();
        try{
            
            $animales = parent::dataAnimal('');
        
            self::animalitosGeneral($animales, $con, true);
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR LOS DATOS DE LOS ANIMALITOS: ".$e->getMessage());
        }

    }

    // Animalitos Admin

    public function mostrarAnimalitosAdmin(){
        $con = parent::conectar();
        try {

            require_once '../funciones.php';
            $animales = parent::dataAnimal('');

            self::animalitosAdmin($animales, $con);
            
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR LOS ANIMALITOS: ".$e->getMessage());
        }
    }

    public function mostrarCoincidenciasAdmin($nombre, $especie, $raza, $color, $sexo){
        $con = parent::conectar();
        try{

            require_once '../funciones.php';            
            $animales = parent::searchAnimal($nombre, $especie, $raza, $color, $sexo);

            self::animalitosAdmin($animales, $con);
            
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR ALGO: ".$e->getMessage());
        }
    }

    public function formularioEditarAnimalito($id){
        try{

            $datos = parent::dataAnimal($id);

            if($datos->rowCount() > 0){
                $datos = $datos->fetch();

                $foto = Foto::fotoPerfil($datos[0]);
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
                            <option value='canina'>Canina</option>
                            <option value='felina'>Felina</option>
                        </select>
                    </div>

                    <div class='boxInput'>
                        <input type='text' placeholder='raza' name='razaE' value='$datos[3]'>
                    </div>

                    <div class='boxInput'>
                        <input type='text' placeholder='color' name='colorE' value='$datos[4]'>
                    </div>

                    <div class='boxInput'>
                    
                        <select name='sexoE' id='sexoE'>
                            <option value='M'>Masculino</option>
                            <option value='F'>Femenino</option>
                        </select>
                    </div>

                    <script>
                    if('$datos[5]' == 'F'){
                        id('sexoE').getElementsByTagName('option')[1].selected = true;
                    }else{
                        id('sexoE').getElementsByTagName('option')[0].selected = true;
                    }
                    </script>
                    
                        <div class='boxInput'>
                            <input type='date' name='edad' value='$datos[6]'>
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

    public function editarVacunas($id){
        $con = parent::conectar();
        try {

            $datos = parent::dataAnimal($id);

            $datos = $datos->fetch();
            $fotos = Foto::fotoPerfil($datos[0]);
            $foto = $fotos->fetch();
            $vacunas = Vacuna::dataVacunas($datos[2]);

            echo "
            <fieldset class='padding-menu form_3 margin-menu' style='display:block'>
                <h2 class='titulo'>Vacunas de <span class='nombreMascota'>$datos[1]</span></h2>
                
                <form action='' method='post' class='row' id='agregarQuitarV'>
                    <input type='hidden' id='idAnimalitoVacunas' value='$datos[0]'>
                    
                    <div class='col-ms-6'>
                    <div class='agregarVacunasAnimalitos'>
                        <p> Agrega o elimina las vacunas de $datos[1], las vacunas con punto rojo son las ya aplicadas, si quitas la selección se eliminará la aplicación de la vacuna al animalito</p><br>

                        <div class='row'>

                        <div class='vacunasBox'>
                            <h3>Vacunas para la especie $datos[2]:</h3>
                            <br>

                        ";

                        if($vacunas->rowCount() > 0){

                            foreach($vacunas as $vacuna){

                                $verificarVacunas = $con->query("SELECT * FROM animalesvacunados WHERE idAnimal='$datos[0]' AND codVacuna='$vacuna[0]'");

                                $codVacuna = $verificarVacunas->fetch();
                                
                                if($vacuna[0] == $codVacuna[0]){
                                    
                                    echo "
                                    <div class='radioBox'>
                                        <input type='checkbox' id='vacuna$vacuna[2]' value='$vacuna[0]' checked><label for='vacuna$vacuna[2]'> $vacuna[2]</label> <div style='background: red; width: 10px; height: 10px; border-radius: 50%; display: inline-block; margin: 5px 0px 0px 0px '></div>
                                    </div>";
                                }else{
                                    echo "
                                    <div class='radioBox'>
                                        <input type='checkbox' id='vacuna$vacuna[2]' value='$vacuna[0]'><label for='vacuna$vacuna[2]'> $vacuna[2]</label> 
                                    </div>";
                                }
                            }

                        }else{
                            echo "<div class='errorVacio'>No hay vacunas disponibles para esta especie</div>";
                        }
                        
                        echo "
                            </div>

                            <div class='infoVacunasSelect'>
                            Aquí aparecerá la información de la última vacuna seleccionada
                        </div>
                            </div>
                    <input type='submit' value='Terminar' class='btn_naranja btn_largo'>

                        </div>
                    </div>

                    <div class='col-ms-6'>
                        
                        <div class='informacionPrevia'>
                            <div class='fotoPerfil'><img src='publico/images/$foto[1]'></div>
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan='2' id='nom2'>$datos[1]</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                        <td>Genero:</td>
                                        <td>".genero($datos[5])."</td>
                                    </tr>
                                    <tr>
                                        <td>Procedencia:</td>
                                        <td>$datos[8]</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>
                
                </form>
            </fieldset>
            <script src='publico/js/ajax/vacunasAnimalesAjax.js'></script> ";
        } catch (Exception $e) {
            exit("ERROR A: ".$e->getMessage());
        }
    }

    // Animalitos usuario
    
    public function mostrarDatosDeTodosUsuario($idUsuario){
        $con = parent::conectar();
        try{
            
            $animales = $con->query("SELECT * FROM animales");

            self::animalitosUser($animales, $con, $idUsuario);

        }catch(Exception $e){
            exit("ERROR AL MOSTRAR LOS DATOS DE LOS ANIMALITOS: ".$e->getMessage());
        }

    }

    public function mostrarPerfilUsuario($id, $idUsuario){
        
        try{

            require_once 'funciones.php';
            $animales = parent::dataAnimal($id);

            if($animales->rowCount() > 0){

                $datos = $animales->fetch();
                $fotos = Foto::dataFotos($datos[0]);

                $urlFotoPerfil = Foto::fotoPerfil($datos[0]);
                $urlFotoPerfil = $urlFotoPerfil->fetch();

                $vacunas = VacunasController::mostrarVacunasAplicadas($datos[0]);

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

                        <div class='adoptadoORadoptar'>
                            <button class='btn_naranja buttonCorazones' onclick='solicitarAdopcion(\"$datos[1]\", \"publico/images/$urlFotoPerfil[1]\", $datos[0], $idUsuario)'>
                                Adoptar
                                <div class='AnimacionCorazones cor1'></div>
                                <div class='AnimacionCorazones cor2'></div>
                                <div class='AnimacionCorazones cor3'></div>
                                <div class='AnimacionCorazones cor4'></div>
                            </button>
                            <button class='btn_naranja'>Apadrinar</button>
                        </div> 

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
                        <div class='fotos' id='fotos'>
                            "; 
                            foreach($fotos as $urlsTodas){
                                echo "<img src='publico/images/$urlsTodas[1]'>";
                            }
                            echo "
                        </div>
                    </div>

                    <div class='perfilTabsItems'>
                        <div class='vacunas'>
                            <h3>Vacunas aplicadas:</h3> "; 

                            foreach($vacunas AS $vacuna){
                                echo "<div class='vacuna'>
                                $vacuna[4]
                                    <div class='descripcionVacuna'><i class='fas fa-caret-up'></i> $vacuna[5]</div>
                                </div>";
                            }
                            
                            echo " 
                        </div>
                    </div>
                </div>
                    ";
                    echo " 
                    <script src='publico/js/perfilTabs.js'></script>
                    <script>
                    perfilTabs();
                    </script>
                    <script src='publico/js/galeriaAnimalitos.js'></script>

                    ";
            }else{
                echo "<div class='errNoData'>No se ha encontrado ningúna mascota con esta identificación</div>";
            }
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR LA INFORMACIÓN DEL ANIMALITO: ".$e->getMessage());
        }
    }

    public function buscarAnimalitosUser($idUsuario, $nombre, $especie, $raza, $color, $sexo){
        $con = parent::conectar();
        try {

            $animales = parent::searchAnimal($nombre, $especie, $raza, $color, $sexo);

            self::animalitosUser($animales, $con, $idUsuario);

        } catch (Exception $e) {
            exit("ERROR AL BUSCAR ANIMALITOS: ".$e->getMessage());
        }
    }
}

?>