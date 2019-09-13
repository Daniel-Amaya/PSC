<?php 

require 'modelo/connect.php';
require 'modelo/usuarios.php';
require 'controlador/usuariosController.php';
$datosDelUsuario = UsuariosController::mostrarDatosDelUsuario($_SESSION['sesion_usuario']['id']);

?>

<header id='menuL' class='menuLateral menuLW'>
    <!-- <span class='pointer'><i class="fas fa-times"></i></span> -->
    <div class="nav-logo row">
        <?php
        if($datosDelUsuario[8] == ""){
            echo "<img src='publico/images/logo.png'>";
        }else{
            echo "<img src='publico/images/$datosDelUsuario[8]'>";
        }
        ?>
    </div> 

    <h3 class='indicador'><?php echo $datosDelUsuario[1] ?></h3>
    <hr>

    <ul id='navegador'>
        <li><a href="" clas='rayita-naranja'>Adoptar</a></li>
        <li><a href="" clas='rayita-naranja'>Apadrinar</a></li>
        <li><a href="donar.php" clas='rayita-naranja'>Donar</a></li>
        <li><a href="" clas='rayita-naranja'>Contacto</a></li>
    </ul>

</header>

<nav>
    <div class="nav-items">
        <ul class="row">
            <li><span onclick='menuL()' class='pointer'><i class="fa fa-bars"></i></span></li>
            <li><a class="rayita-naranja" href="index.php">Inicio</a></li>
            <li><a class="rayita-naranja"  href="">Fundación</a></li>
            <li><a class="rayita-naranja" href="">Eventos</a></li>
            <li><a class="rayita-naranja" href="donar.php"></a></li>

        </ul>
    </div>
    <div class="nav-logo row">
        <ul class="row">
            <li style="padding:20px"><span onclick='' class='pointer'><i class="far fa-calendar-times"></i></span></li>
            <li style="padding:20px" class="config-dropdown"><span onclick='' class='pointer'><i class="fas fa-cog">
                <ul>
                    <li><a id='cerrarSesion' href="controlador/validar/logout.php">Salir</a></li>
                </ul>
            </i></span></li>
        </ul>
        <img src="publico/images/logo.jpeg">
    </div>
</nav>
<!-- <script src="publico/js/ajax/cerrarSesion.js"></script> -->
<script src="publico/js/shadowMenuBlanco.js"></script>
<script src='publico/js/desactivarMenuL.js'></script>