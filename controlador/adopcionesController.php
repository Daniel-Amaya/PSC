<?php

class AdopcionesController extends Adopcion{
    

    // Administrador

    public function adopcionesRecientes(){
        $con = parent::conectar();
        try {
            $query = $con->query("SELECT usuarios.id, usuarios.nombre, animales.* FROM usuarios, adopciones, animales WHERE animales.id = idAnimalAdoptado AND idUsuario = usuarios.id ORDER BY numAdopcion DESC LIMIT 5");
            
            if($query->rowCount() > 0){
                foreach($query AS $datos){
                    echo " 
                    <tr>
                        <th>$datos[3]</th>
                        <th>$datos[1]</th>
                    </tr>";
                    
                }
            }else{
                echo "<tr><th colspan='2'>No se ha realizado ninguna adopción</th></tr>";
            }
            
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR ADOPCIONES RECIENTES: ".$e->getMessage());
        }
    }

    public function adopcionesConCompromiso(){
        $con = parent::conectar();
        try {
            $query = $con->query("SELECT usuarios.id, usuarios.nombre, animales.* FROM usuarios, adopciones, animales WHERE animales.id = idAnimalAdoptado AND idUsuario = usuarios.id and codEsterilizacion != null ORDER BY numAdopcion DESC LIMIT 5");
            
            if($query->rowCount() > 0){
                foreach($query AS $datos){
                    echo " 
                    <tr>
                        <th><i class='fas fa-eye'></i></th>
                        <th>$datos[3]</th>
                        <th>$datos[1]</th>
                    </tr>";
                    
                }
            }else{
                echo "<tr><th colspan='3' >No se encuentra ninguna adopción con compromiso de esterilización</th></tr>";
            }
            
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR ADOPCIONES RECIENTES: ".$e->getMessage());
        }   
    }

    public function todasLasAdopciones(){
        try{
            $adopciones = parent::dataAdopciones('');

            if($adopciones->rowCount() > 0){

                foreach($adopciones AS $datos){
                    echo "<tr>
                        <th>$datos[1]</th>
                        <th>$datos[12] $datos[13]</th>
                        <th>$datos[23]</th>
                        <th><a href='$datos[20]'><i class='fas fa-eye'></i></a></th>";

                        if($datos[24] != null){
                            echo "<th><a href='$datos[24]'><i class='fas fa-eye'></i></a></th>";
                        }else{
                            echo "<th>No aplica</th>";
                        }
                    echo 
                    "</tr>";
                }
            }
        }catch(Exception $e){
            exit("ERROR: ".$e->getMessage());
        }
    }

    // Usuario

    public function mostrarMiAnimalAdoptado($idUsuario){
        try {
            $adopciones = parent::dataAdopciones($idUsuario);
           
            if($adopciones->rowCount() > 0){

                require_once 'modelo/fotos.php';

                require_once 'controlador/funciones.php';

                require_once 'modelo/vacunas.php';
                require_once 'controlador/vacunasController.php';

                foreach ($adopciones as $datos) {

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
                        <span>información legal de la adopción</span>
                        <strong>Fecha de adopción: $datos[13]</strong>
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
                                <h3>Vacunas aplicadas:</h3>

                                ";

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
                }
            }else{
                echo " <div class='noAdopcion'>

                <div class='mensajeAdopta'>Aún no has adoptado una mascota ¿Deseas adoptar? <br><br><a href='' class='btn_naranja'>Adoptar</a></div>
                <div class='mensajeApadrina'>¿No puedes adoptar? Apadrina una mascota<br><br> <a href='' class='btn_naranja'>Apadrina</a></div>

                <div class='husky'>
                <div class='mane'>
                    <div class='coat'></div>
                </div>
                <div class='body'>
                    <div class='head'>
                    <div class='ear'></div>
                    <div class='ear'></div>
                    <div class='face'>
                        <div class='eye'></div>
                        <div class='eye'></div>
                        <div class='nose'></div>
                        <div class='mouth'>
                        <div class='lips'></div>
                        <div class='tongue'></div>
                        </div>
                    </div>
                    </div>
                    <div class='torso'></div>
                </div>
                <div class='legs'>
                    <div class='front-legs'>
                    <div class='leg'></div>
                    <div class='leg'></div>
                    </div>
                    <div class='hind-leg'>
                    </div>
                </div>
                <div class='tail'>
                    <div class='tail'>
                    <div class='tail'>
                        <div class='tail'>
                        <div class='tail'>
                            <div class='tail'>
                            <div class='tail'></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                
                </div> ";
            }
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR ANIMALITO ADOPTADO: ".$e->getMessage());
        }
    }
}

?>