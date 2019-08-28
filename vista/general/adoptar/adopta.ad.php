<?php

include 'modelo/connect.php';
include 'modelo/animales.php';
include 'modelo/fotos.php';

?>

<section class='margin-menu adopta-grid'>

    <aside class="filtro">
        <p>Para poder adoptar, debes contar con una cuenta en nuestra página oficial.</p>
        <a href="">iniciar sesión</a> <a href="">crear cuenta</a>
    </aside>

    <div class='grid adopta-ad'>
        <?php 
        require 'controlador/get/adoptarData.php';
        ?>

        <script>
            tabs();
        function tabs(){
            var div_tabs = id('tabs');
            var tabs = div_tabs.getElementsByClassName('tab-item');
            for(let i = 0; i < tabs.length; i++){
                tabs[i].style.display = 'none';
            }

            var controls_tabs = id('control-tabs');
            var controls = controls_tabs.getElementsByTagName('button');
            for(let i = 0; i < controls.length; i++){
                controls[i].addEventListener('click', function(){

                    tabs[i].style.display = 'block';
                    if(tabs[i-1]){
                        tabs[i-1].style.display = "none";
                    }

                    if(tabs[i+1]){
                        tabs[i+1].style.display = "none";
                    }
                });
            }

            tabs[0].style.display = "block";

        }
        
        </script>

    </div>

</section>

<script src="publico/js/shadowMenuNaranja.js"></script>