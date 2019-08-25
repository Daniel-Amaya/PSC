<?php

session_start();

$_SESSION['login'] = "admin";
include 'modelo/connect.php';
include 'modelo/animales.php';
include 'modelo/fotos.php';

?>


<div class="animalitos margin-menu">

<div class='dob-menu'>
            <p>
                Estos son los animalitos registrados, puedes usar los filtros para encontrar una mascota más rapido
                <button class="btn_naranja" onclick="classNames('adopta-grid')[0].style.display = 'none'; classNames('fielNewAnimalito')[0].style.display = 'block';">Agregar un nuevo perrito</button>
            </p> 
        </div>
    <section class='adopta-grid'>

   

        <aside class="filtro">
            <h4>Buscar por:</h4>
            <form action="">
                <div class="boxInput">
                    <input type="text" name="nombreAn" placeholder="Nombre">
                </div>
                <div class="boxInput">

                    <select name="especie">
                        <option value="">Especie</option>
                        <option value="perro">Perro</option>
                        <option value="gato">Gato</option>
                    </select>
                </div>
                <div class="boxInput">
                    <input type="text" name='raza' placeholder="Raza">
                </div>
                <div class="boxInput">
                    <input type="text" name='color' placeholder="Color">
                </div>
                <div class="boxInput">
                    <select name="especie">
                        <option value="">Sexo</option>
                        <option value="perro">Masculino</option>
                        <option value="gato">Femenino</option>
                    </select>
                </div>

                <input type="submit" value="Buscar" class="btn_cafe">
            </form> 
        </aside>

        <div class='grid adopta-ad'>


                        
        <div>

  

    </section>

   

    <script src="publico/js/shadowMenuBlanco.js"></script>
