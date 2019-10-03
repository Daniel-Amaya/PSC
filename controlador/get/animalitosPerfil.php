<?php 

if(isset($_GET['perfil']) && !empty($_GET['perfil'])){

    $animalPerfil = Animal::dataAnimal($_GET['perfil']);
    $animalPerfil = $animalPerfil->fetch();
    $fotoPerfil = Foto::fotoPerfil($_GET['perfil']);
    $fotoPerfil = $fotoPerfil->fetch();
    $datosj = json_encode($animalPerfil);

    echo "
    <script>

    modalAnimalitos($datosj, \"$fotoPerfil[0]\", \"".edad($animalPerfil['edad'])."\");

    </script>
    ";

}

?>