<?php

session_start();

$_SESSION['login'] = "admin";
include 'modelo/connect.php';
include 'modelo/animales.php';
include 'modelo/fotos.php';

?>

<section class='margin-menu adopta-grid'>

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
        </form> 
    </aside>

    <div class='grid adopta-ad'>
        
        <script>

            document.addEventListener('DOMLoadedContent', animalesAjax(''));

            function animalesAjax(send){

                var ht = new XMLHttpRequest;
                ht.addEventListener('readystatechange', function(){
                    if(this.readyState == 4 && this.status == 200){
                        classNames('adopta-ad')[0].innerHTML = this.responseText;
                    }
                });
                ht.open('POST', 'controlador/ajax/animalitosAjax.php');
                ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
                ht.send(send);
            }
        
        </script>
        
        
    <div>

</section>

<script src="publico/js/shadowMenuBlanco.js"></script>
