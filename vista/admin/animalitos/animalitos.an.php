<?php

include 'modelo/animales.php';
include 'modelo/fotos.php';

?>

<!-- <script src="publico/js/modal.js"></script> -->

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

        <h3 class='textoDeTitulo'>
        Aquí vas a encontrar todos los animalitos registrados, puedes usar el buscador para encontrar  los animalitos, para ver el perfil, has clic en la foto:
        </h3>

        <div class="divTableDatos">
            <div class="navTable">
                <div class="buttonsTable">
                    <button class='btn_naranja btn_largo' onclick="agregarAnimalitos()">Agregar animalito</button>
                </div>
                <div class="nombreIndicador">
                    Animalitos
                </div>
                <div class="buscarTable">
                    <i class='fas fa-search'></i>
                </div>
            </div>
            <table class='animalitosInfo'>
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Adoptado</th>
                        <th>Vacunas</th>
                        <th>Fotos</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>

                <tbody id='mostrarAnimalitos'>

                </tbody>
                            
            </table>
        </div>
       
    </section>

    <script>

    function agregarAnimalitos(){
        classNames('divTableDatos')[0].style.display = 'none';
        classNames('fielNewAnimalito')[0].style.display = 'block';
        classNames('textoDeTitulo')[0].style.display = 'none';
    }
    </script>
