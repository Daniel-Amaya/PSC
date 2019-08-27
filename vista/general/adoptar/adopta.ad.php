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

<script>
// window.addEventListener('scroll', function(){

    var menuC = document.getElementsByTagName('nav')[0];
    var inicio = document.getElementsByClassName('inicio')[0];
    var logo = menuC.getElementsByTagName('img')[0];
    var links = menuC.getElementsByTagName('a');

    menuC.style.color = "white";
    for(let i = 0; i < links.length; i++){
        links[i].style.color = "white";
        links[i].classList = "rayita-blanca";
    }
    logo.style.height = "60px";
    menuC.style.background = color_principal;
    menuC.style.boxShadow = "0px 0px 10px black";

// });
</script>