<?php

include 'modelo/animales.php';
include 'modelo/fotos.php';
require_once 'controlador/funciones.php';


?>

<!-- <script src="publico/js/modal.js"></script> -->

<div class="animalitos margin-menu padding-menu">

    <section class=''>
   
        <h3 class='textoDeTitulo'>
        Aquí vas a encontrar todos los animalitos registrados, puedes usar el buscador para encontrar  los animalitos, para ver el perfil, has clic en la foto:
        </h3>

        <div class="divTableDatos">
            <div class="navTable">
                <div class="buttonsTable">
                    <button class='btn_naranja btn_largo' onclick="agregarAnimalitos()">Agregar mascota</button>
                </div>
                <div class="nombreIndicador">
                    Mascotas
                </div>
                <div class="buscarTable" onclick="buscador()">
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
