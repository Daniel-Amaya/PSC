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

    </div>

</section>

<script src="publico/js/shadowMenuNaranja.js"></script>