<section class='margin-menu padding-menu boxPerroAzul'>
    <ul class='navegador-tabs'>

        <li class='tabsItemUser'>
            <strong>Mis mascotas</strong>
            <div class="tabRes"><i class="fas fa-dog"></i></div>
        </li>
        <li class='tabsItemUser'>
            <strong>Mis apadrinamientos</strong>
            <div class="tabRes"><i class="fas fa-bone"></i></div>
        </li>
        <li class='tabsItemUser'>
            <strong>Mis donaciones</strong>
            <div class="tabRes"><i class="fas fa-money-bill-alt"></i></div>
        </li>
        <li class='tabsItemUser'>
            <strong>Mi información</strong>
            <div class="tabRes"><i class="fas fa-user"></i></div>
        </li>

    </ul> 

    <div class="tabBox">
       <?php
       require_once 'modelo/solicitudes.php';
       require_once 'controlador/solicitudesController.php';

       require_once 'controlador/adopcionesController.php';

       AdopcionesController::mostrarMiAnimalAdoptado($_SESSION['sesion_usuario']['id']);
        ?>

        <!-- <svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display:flex">
            <defs>
                
                <filter id="squiggly-0">
                <feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="0"/>
                <feDisplacementMap id="displacement" in="SourceGraphic" in2="noise" scale="2" />
                </filter>
                <filter id="squiggly-1">
                <feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="1"/>
            <feDisplacementMap in="SourceGraphic" in2="noise" scale="3" />
                </filter>
                
                <filter id="squiggly-2">
                <feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="2"/>
            <feDisplacementMap in="SourceGraphic" in2="noise" scale="2" />
                </filter>
                <filter id="squiggly-3">
                <feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="3"/>
            <feDisplacementMap in="SourceGraphic" in2="noise" scale="3" />
                </filter>
                
                <filter id="squiggly-4">
                <feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="4"/>
            <feDisplacementMap in="SourceGraphic" in2="noise" scale="1" />
                </filter>
            </defs> 
        </svg> -->
    </div>

    <div class="tabBox">
        <h2 class="titulo">Mis apadrinamientos</h2>
        <?php
        require 'vista/vacio.php';
        ?>
    </div>

    <div class="tabBox">
        <h2 class="titulo">Mis donaciones</h2>

    </div>

    <div class="tabBox">
        <h2 class="titulo">Mi información</h2>
        <div class="perfilUsuario">

            <div class="header">
                <div class="fotoPerfil">
                <?php 
                if($datosDelUsuario[8] == ""){
                    echo " <img src='publico/images/fotoPerfilVacia.png'>";
                }else{
                    echo "<img src='publico/images/$datosDelUsuario[8]'>";
                }
                 ?>
                </div>
                <div class="btn_editar" id='abrir-modal'>
                    <i class="fas fa-user-edit"></i>
                </div>
                <div class="nombreUsuario">
                    <?php 
                    echo $datosDelUsuario[1] . ' ' . $datosDelUsuario[2];
                    ?>
                </div>
            </div>

            <div class="informacion row">
                <table>
                    <tr>
                        <td>Nombre:</td>
                        <td><?php echo $datosDelUsuario[1] ?></td>
                    </tr>
                    <tr>
                        <td>Apellidos:</td>
                        <td><?php echo $datosDelUsuario[2] ?></td>
                    </tr>
                    <tr>
                        <td>Correo:</td>
                        <td><?php echo $datosDelUsuario[3] ?></td>
                    </tr>
                    <tr>
                        <td>Teléfono:</td>
                        <td><?php echo $datosDelUsuario[4] ?></td>
                    </tr>
                    <tr>
                        <td>Cedula:</td>
                        <td><?php echo $datosDelUsuario[5] ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td>Estado civil:</td>
                        <td>
                            <?php 
                                if($datosDelUsuario['estadoCivil'] == null){
                                    echo "No aplica";
                                }else{
                                    echo $datosDelUsuario['estadoCivil'];
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Dirección de apartamento:</td>
                        <td>
                            <?php 
                                if($datosDelUsuario['direccionApto'] == null){
                                    echo "No aplica";
                                }else{
                                    echo $datosDelUsuario['direccionApto'];
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Referencia:</td>
                        <td>
                            <?php 
                                if($datosDelUsuario['referencia'] == null){
                                    echo "No aplica";
                                }else{
                                    echo $datosDelUsuario['referencia'];
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Teléfono de referencia:</td>
                        <td>
                            <?php 
                                if($datosDelUsuario['telefonoRef'] == null){
                                    echo "No aplica";
                                }else{
                                    echo $datosDelUsuario['telefonoRef'];
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

<script src='publico/js/tabs.js'></script>