<?php

class AdopcionesController extends Adopcion{
    
    use mostrarSolicitudes;
    
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
                        <th>{$datos['fechaAdopcion']}</th>
                        <th><a href='documentacion.php?adopcion={$datos['numAdopcion']}'><i class='fas fa-eye'></i></a></th>";

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

    public function mostrarAdopcion($num){
        $con = parent::conectar();
        try{
            $query = $con->prepare("SELECT animales.*, usuarios.*, usuarios.nombre AS userName, numAdopcion, adopciones.* FROM animales, usuarios, adopciones WHERE usuarios.id = idUsuario AND animales.id = idAnimalAdoptado AND numAdopcion = :Num");
            $query->bindParam(":Num", $num);

            $query->execute();

            if($query->rowCount() > 0){
                require 'modelo/fotos.php';
                require 'controlador/funciones.php';
                foreach($query AS $adopcion){

                    $fotoPerfil = Foto::fotoPerfil($adopcion[0]);
                    $fotoPerfil = $fotoPerfil->fetch();
                    echo " 
                    <h2 class='titulo'>Adopción numero {$adopcion['numAdopcion']}</h2>
                    <div class='adopcion-concreta'>
                        <div class='row'>

                            <div class='cardAdopcion'>
                                <h4 class='tituloCard t1'>Adoptado</h4>
                                <img src='publico/images/$fotoPerfil[1]'>
                                <table>
                                    <tr>
                                        <td>Nombre:</td>
                                        <td>$adopcion[1]</td>
                                    </tr>
                                    <tr>
                                        <td>Especie:</td>
                                        <td>$adopcion[2]</td>
                                    </tr>
                                    <tr>
                                        <td>Raza:</td>
                                        <td>$adopcion[3]</td>
                                    </tr>
                                    <tr>
                                        <td>Color:</td>
                                        <td>$adopcion[4]</td>
                                    </tr>
                                    <tr>
                                        <td>Edad:</td>
                                        <td>".edad($adopcion[6])."</td>
                                    </tr>
                                    <tr>
                                        <td>Esterilizado:</td>
                                        <td>".esterilizado($adopcion[7])."</td>
                                    </tr>
                                </table>
                            </div>

                            <div class='cardAdopcion'>
                                <h4 class='tituloCard t2'>Adoptante</h4>";

                                if($adopcion['foto'] != ''){
                                    echo "
                                    <img src='publico/images/{$adopcion['foto']}'>";
                                }else{
                                    echo "
                                    <img src='publico/images/fotoPerfilVacia.png'>";
                                }
                                
                            echo "    

                                <table>
                                    <tr>
                                        <td>nombre:</td>
                                        <td>{$adopcion['userName']}</td>
                                    </tr>
                                    <tr>
                                        <td>Apellidos:</td>
                                        <td>{$adopcion['apellidos']}</td>
                                    </tr>
                                    <tr>
                                        <td>Cédula:</td>
                                        <td>{$adopcion['cedula']}</td>
                                    </tr>
                                    <tr>
                                        <td>Teléfono:</td>
                                        <td>{$adopcion['telefono']}</td>
                                    </tr>
                                    <tr>
                                        <td>Correo:</td>
                                        <td>{$adopcion['correo']}</td>
                                    </tr>
                                    <tr>
                                        <td>Dirección:</td>
                                        <td>{$adopcion['direccionApto']}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class='cardAdopcion'>
                                <h4 class='tituloCard t3'>Adopción</h4>
                                <table>
                                    <tr>
                                        <td>Fecha de adopción:</td>
                                        <td>{$adopcion['fechaAdopcion']}</td>
                                    </tr>
                                    <tr>
                                        <td>Entregado por: </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Doc. adopción:</td>
                                        <td><a href='documentacion.php?adopcion={$adopcion['numAdopcion']}'>Ver doc.</a></td>
                                    </tr>
                                    <tr>
                                        <td>Doc. esterilización:</td>
                                        <td><a href=''>Ver doc.</a></td>
                                    </tr>
                                    <tr>
                                        <td>Copia de cédula:</td>
                                        <td><a href=''>Ver copia</a></td>
                                    </tr>
                                    <tr>
                                        <td>Último seguimiento:</td>
                                        <td>2019-04-23</td>
                                    </tr>
                                    <tr>
                                        <td>Siguiente:</td>
                                        <td>Finalizado</td>
                                    </tr>
                                </table>
                            </div>

                            <a href='documentacion.php?adopcion={$adopcion['numAdopcion']}' style='width: 100%;margin: 10px 0' class='center'> Ver documento legal de la adopción</a>                    

                        </div>
                    </div> 
                    
                    ";
                }
            }

        }catch(Exception $e){
            exit("ERROR AL MOSTRAR LA ADOPCIÓN: ".$e->getMessage());
        }
    }

    // Usuario

    public function mostrarMiAnimalAdoptado($idUsuario){
        
        $con = parent::conectar();
        try {
            $adopciones = parent::dataAdopciones($idUsuario);
           
            if($adopciones->rowCount() > 0){

                require_once 'modelo/fotos.php';
                require_once 'controlador/funciones.php';
                require_once 'modelo/vacunas.php';
                require_once 'controlador/vacunasController.php';

                echo " <h2 class='titulo'>Mis mascotas</h2> ";

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
    
                            <div class='adoptadoORadoptar quitar-500'>
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
                            <div class='fotos'>
                            <div id='fotos'>
                                "; 
                                foreach($fotos as $urlsTodas){
                                    echo "<img src='publico/images/$urlsTodas[1]'>";
                                }
                                echo "
                            </div>

                                <label for='aggF' id='agregarFoto'>
                                    <div>Agregar</div><br>
                                    <i class='fas fa-plus'></i>
                                </label>
                                <input type='file' id='aggF' style='display: none' class='subirFotos'>
                                <input type='hidden' value='$datos[0]' id='idA'>
                                <input type='hidden' value='{$datos['carpeta']}' id='folder' accept='image/*'>
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

                $solicitudes = $con->prepare("SELECT animales.*, usuarios.*, solicitudesadopcion.* FROM animales, usuarios, solicitudesadopcion WHERE animales.id = idAnimal AND solicitudesadopcion.idUsuario = usuarios.id AND idUsuario = :idUsuario AND estado != 'rechazada' AND estado != 'procesando adopción' AND estado != 'adoptado' ORDER BY cod DESC");
                $solicitudes->bindParam(':idUsuario', $idUsuario);
                $solicitudes->execute();

                if($solicitudes->rowCount() > 0){
                    echo "<h2 class='titulo'> Mis solicitudes de adopción: </h2>";
                }

                self::mostrarSolicitudes($solicitudes);

                echo " <script src='publico/js/ajax/fotosAjax.js'></script> ";

            }else{

                require_once 'modelo/fotos.php';

                $solicitudes = $con->prepare("SELECT animales.*, usuarios.*, solicitudesadopcion.* FROM animales, usuarios, solicitudesadopcion WHERE animales.id = idAnimal AND solicitudesadopcion.idUsuario = usuarios.id AND idUsuario = :idUsuario AND estado != 'rechazada' AND estado != 'procesando adopción' ORDER BY cod DESC");
                $solicitudes->bindParam(':idUsuario', $idUsuario);
                $solicitudes->execute();

                if($solicitudes->rowCount() > 0){
                    echo "<h2 class='titulo'> Mis solicitudes de adopción: </h2>";
                }

                self::mostrarSolicitudes($solicitudes);

                if($solicitudes->rowCount() == 0){

                    echo " <h2 class='titulo'>Mis mascotas</h2> ";

                    echo "
                    <div class='noAdopcion'>

                        <div class='mensajeAdopta'>Aún no has adoptado una mascota ¿Deseas adoptar? <br><br><a href='adoptar.php' class='btn_naranja'>Adoptar</a></div>
                        <div class='mensajeApadrina'>¿No puedes adoptar? Colaboranos con una donación<br><br> <a href='' class='btn_naranja'>Dona</a></div>
        
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
        
                    </div>";

                }
                
            }
        } catch (Exception $e) {
            exit("ERROR AL MOSTRAR ANIMALITO ADOPTADO: ".$e->getMessage());
        }
    }
    
}

?>