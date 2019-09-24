<section class='margin-menu padding-menu boxPerroAzul'>
    <ul class='navegador-tabs'>
        <li class='tabsItemUser'><strong>Mis mascotas</strong></li>
        <li class='tabsItemUser'><strong>Mis apadrinamientos</strong></li>
        <li class='tabsItemUser'><strong>Mis donaciones</strong></li>
        <li class='tabsItemUser'><strong>Mi información</strong></li>
    </ul> 

    <div class="tabBox">
        <h2 class="titulo">Mis mascotas</h2>

       <?php
       require_once 'modelo/adopciones.php';
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
                <?php if($datosDelUsuario[8] == ""){
                    echo " <img src='publico/images/fotoPerfilVacia.png'>";
                }else{
                    echo " <img src='publico/images/$datosDelUsuario[8]'>";
                }
                 ?>
                    <img src="publico/images/$datosDelUsuario[8]">
                </div>
                <div class="btn_editar">
                    <i class="fas fa-user-edit"></i>
                </div>
                <div class="nombreUsuario">
                    <?php 
                    echo $datosDelUsuario[1] . ' ' . $datosDelUsuario[2];
                    ?>
                </div>
            </div>

            <div class="informacion">
                <table>
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
            </div>
        </div>
    </div>
</section>

<script>
tabsUser();
function tabsUser(){
    var tabButtons = classNames('tabsItemUser');
    var tabs = classNames('tabBox');

    var indic = 0;

    for(let i = 0; i < tabButtons.length; i++){

        tabs[i].style.display = 'none';

        tabButtons[i].addEventListener('click', function(){
        for(let e = 0; e < tabButtons.length; e++){
            tabs[e].style.display = 'none';
            tabButtons[e].classList.remove('tabSelection');
        }

            indic = i;
            tabs[indic].style.display = 'block';
            tabButtons[indic].classList.add('tabSelection');

        });

    }

    tabs[indic].style.display = "block";
    tabButtons[indic].classList.add('tabSelection');



}

</script>