<?php


if(isset($_GET['perfil']) && !empty($_GET['perfil'])){

    function genero($data){
        if($data == "F"){
            return "Femenino";
        }elseif($data == "M"){
            return "Masculino";
        }else{
            return 0;
        }
    }

    $animales = Animal::dataAnimal($_GET['perfil']);

    if($animales->rowCount() > 0){

        $datos = $animales->fetch();
        $fotos = Foto::dataFotos($datos[0]);

        $urlFotoPerfil = $fotos->fetch();



    echo "
        <div class='perfil'>
            <div class='general'>
                <div class='foto-perfil'>
                    <img src='publico/images/$urlFotoPerfil[1]'>
                </div>
                <div class='name'>
                    $datos[1] <hr>
                    <div id='control-tabs'>
                        <button>Información</button>
                        <button>Galeria</button>
                    </div>
                </div>
            </div>

            <div id='tabs'>

                <div class='tab-item'>
                    <div class='info'>
                        <div class='col'>
                            <ul>
                                <li>Especie:</li>
                                <li>Raza:</li>
                                <li>Color:</li>
                                <li>Sexo:</li>
                                <li>Esterilizado:</li>
                            </ul>
                            <ul>
                                <li>$datos[2]</li>
                                <li>$datos[3]</li>
                                <li>$datos[4]</li>
                                <li>".genero($datos[5])."</li>
                                <li>$datos[6]</li>
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
                                    $datos[7]
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class='tab-item'>
                    <div class='galeria'>

                    ";

                    foreach($fotos as $urlsTodas){
                        echo "<div class='imageItem'><img src='publico/images/$urlsTodas[1]'></div>";
                    }

            echo " </div>
                </div>
            </div>";
    }else{
        echo "<div class='errNoData'>No se ha encontrado ningúna mascota con esta identificación</div>";
    }

}else{

    echo "
    <div class='indic'>
        <p>Aquí podrás encontrar nuestros animalitos disponibles para adoptar</p> <hr>
        <strong>Adoptar</strong>
    </div>";

    $animales = Animal::dataAnimal('');

    if($animales->rowCount() > 0){

        foreach($animales as $datos) {

            $fotos = Foto::dataFotos($datos[0]);
            $urlFotoPerfil = $fotos->fetch();

            echo "<div class='card-adopta'>
                <div><img src='publico/images/$urlFotoPerfil[1]'></div>
                <div class='nombre'>$datos[1]</div>
                <div class='info'>Especie: $datos[2]</div>
                <div>
                    <a href='' class='btn_naranja'>Adoptar</a>
                    <a href='' class='btn_naranja'>Apadrinar</a>
                    <a href='?perfil=$datos[0]' class='btn_naranja'>Conocer</a>

                </div>
            </div>";
        }
    }else{
        echo "<div class='errNoData'>No hay animalitos disponibles  :(</div>";
    }

}


?>