<?php

include 'modelo/connect.php';
include 'modelo/animales.php';
include 'modelo/fotos.php';

?>

<section class='margin-menu adoptargeneral'>

    <aside>
        <div class='adopta-message'>
            <h3 class='titulo'>Adopta</h3>
            Podrás ver algunos animalitos disponibles para adoptar, pero recuerda que primero debes inciar sesión, si no tienes una cuenta, no esperes más para crear una
</div>

        <div class="main">
            <span class="stand"></span>
            <div class="cat">
            <div class="body"></div>
            <div class="head">
            <div class="ear"></div>
            <div class="ear"></div>
            </div>
            <div class="face">
            <div class="nose"></div>
            <div class="whisker-container">
            <div class="whisker"></div>
            <div class="whisker"></div>
            </div>
            <div class="whisker-container">
            <div class="whisker"></div>
            <div class="whisker"></div>
            </div>
            </div>
            <div class="tail-container">
            <div class="tail">
                <div class="tail">
                <div class="tail">
                    <div class="tail">
                    <div class="tail">
                        <div class="tail">
                        <div class="tail"></div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

    </aside>

    <div class='row animalitosAdoptar'>

        <?php 
        require 'controlador/get/adoptarData.php';
        ?>

    </div>

</section>

<script src="publico/js/shadowMenuBlanco.js"></script>