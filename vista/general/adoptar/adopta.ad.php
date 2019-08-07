<?php

include 'modelo/connect.php';
include 'modelo/animales.php';

?>

<section class='margin-menu adopta-grid'>

    <aside class="filtro">
        <p>Para poder adoptar, debes contar con una cuenta en nuestra página oficial.</p>
        <a href="">iniciar sesión</a> <a href="">crear cuenta</a>
    </aside>

    <div class='grid adopta-ad'>
        <?php 
        if(isset($_GET['perfil'])){

        ?>
        <div class="perfil">
            <div class="general">
                <div class="foto-perfil">
                    <img src="publico/images/p1.jpg">
                </div>
                <div class="name">
                    Perry el perrito <hr>
                    <div id="control-tabs">
                        <button>Información</button>
                        <button>Galeria</button>
                    </div>
                </div>
            </div>

            

            <div id="tabs">

                <div class="tab-item">
                    <div class="info">
                        <div class='col'>
                            <ul>
                                <li>Especie:</li>
                                <li>Raza:</li>
                                <li>Color:</li>
                                <li>Sexo:</li>
                                <li>Esterilizado:</li>
                            </ul>
                            <ul>
                                <li>Perrito</li>
                                <li>Ni idea</li>
                                <li>blanco</li>
                                <li>Masculino</li>
                                <li>Yes</li>
                            </ul>
                        </div>
                        <div class='col'>
                            <div>
                                <h3>Lugar de Procedencia</h3>
                                <p>Medellin, Robledo</p>
                            </div>
                            <div>
                                <h3>Descripción:</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, repellendus.
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="tab-item">
                    <div class="galeria">

                    </div>
                </div>
            </div>
        </div>

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
        <?php
        }else{

        ?>

        <div class="indic">
            <p>Aquí podrás encontrar nuestros animalitos disponibles para adoptar</p> <hr>
            <strong>Adoptar</strong>
        </div>

        <?php 
        $animales = Animal::dataAnimal('');

        foreach($animales as $datos) {
            echo "<div class='card-adopta'>
                <div><img src='publico/images/p1.jpg'></div>
                <div class='nombre'>$datos[1]</div>
                <div class='info'>Especie: $datos[2]</div>
                <div>
                    <a href='' class='btn_naranja'>Adoptar</a>
                    <a href='' class='btn_naranja'>Apadrinar</a>
                    <a href='' class='btn_naranja'>Conocer</a>

                </div>
            </div>";
        }
        
        ?>
<!-- 
        <div class="card-adopta">
            <div><img src="publico/images/p1.jpg"></div>
            <div class="nombre">Toby</div>
            <div class="info"></div>
            <div>
                <a href="" class='btn_naranja'>Adoptar</a>
                <a href="" class='btn_naranja'>Apadrinar</a>
                <a href="" class='btn_naranja'>Conocer</a>

            </div>
        </div>



        <div class="card-adopta">
            <div><img src="publico/images/p2.jpg"></div>
            <div class="nombre">Toby</div>
            <div class="info">
                Especie: perro
            </div>
            <div>
                <a href="" class='btn_naranja'>Conocer</a>

            </div>
        </div> -->
        <?php

        }
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