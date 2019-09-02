<?php

session_start();

$_SESSION['login'] = "admin";
include 'modelo/connect.php';
include 'modelo/animales.php';
include 'modelo/fotos.php';

?>

<script>

cambiarEstructura('Animalitos', [['#', 'btn_cafe newAn', 'Agregar animalito']]);

classNames('newAn')[0].addEventListener('click', function(){
    classNames('animalitosInfo')[0].style.display = 'none';
    classNames('fielNewAnimalito')[0].style.display = 'block';
    classNames('titleAnimalitos')[0].style.display = 'none';
});

</script>

<div class="animalitos margin-menu padding-menu">

    <section class=''>

   
        <aside id="filtro" style='display: none'>
            <button class="btn_cafe" onclick="">Agregar un nuevo animalito</button><br><br>
            <h4>Buscar por:</h4>
            <form action="" id='buscarAnimalitos'>
                <div class="boxInput">
                    <input type="text" class="nombreAn" placeholder="Nombre">
                </div>
                <div class="boxInput">

                    <select class="especie">
                        <option value="">Especie</option>
                        <option value="perro">Perro</option>
                        <option value="gato">Gato</option>
                    </select>
                    
                </div>
                <div class="boxInput">
                    <input type="text" class='raza' placeholder="Raza">
                </div>
                <div class="boxInput">
                    <input type="text" class='color' placeholder="Color">
                </div>
                <div class="boxInput">
                    <select class="sexo">
                        <option value="">Sexo</option>
                        <option value="perro">Masculino</option>
                        <option value="gato">Femenino</option>
                    </select>
                </div>

                <input type="submit" value="Buscar" class="btn_cafe btn_largo">
            </form> 
        </aside>

        <h3 class='titleAnimalitos'>
        Aquí vas a encontrar todos los animalitos registrados, puedes usar el filtro para buscar mejor los animalitos:
        </h3>

        <table class='animalitosInfo'>
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Fotos</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody id='mostrarAnimalitos'>

            </tbody>
                        
        </table>

    </section>
