<section class='margin-menu padding-menu boxPerroAzul'>
    <ul class='navegador-tabs'>
        <li class='tabsItemUser'><strong>Mis mascotas</strong></li>
        <li class='tabsItemUser'><strong>Mis apadrinajes</strong></li>
        <li class='tabsItemUser'><strong>Mis donaciones</strong></li>
        <li class='tabsItemUser'><strong>Mi información</strong></li>
    </ul> 

    <div class="tabBox">
        <h2 class="title">Mis mascotas</h2>

       <?php
       require_once 'modelo/animales.php';
       require_once 'controlador/animalesController.php';

       AnimalesController::mostrarAnimalesAdoptados($_SESSION['sesion_usuario']['id']);
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
        <h2 class="title">Mis apadrinajes</h2>
        <?php
        require 'vista/vacio.php';
        ?>
    </div>
    <div class="tabBox">
3
    </div>
    <div class="tabBox">
4
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