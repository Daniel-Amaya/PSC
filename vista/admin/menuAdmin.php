<?php 

require 'modelo/connect.php';
require 'modelo/usuarios.php';
require 'controlador/usuariosController.php';
$datosDelUsuario = UsuariosController::mostrarDatosDelUsuario($_SESSION['sesion_usuario']['id']);

?>

<?php include 'vista/loader.php'; ?>
<script src='publico/js/loader.js'></script>

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
    
    <h3 class='indicador'><?php echo $datosDelUsuario[1] ?> - Administrador</h3>

    <hr>

    <ul id='navegador'>
        <li><a href="vacunas.php">Vacunas</a></li>
        <li><a href="animalitos.php">Mascotas</a></li>
        <li><a href="adoptar.php">Adopciones</a></li>
        <li><a href="seguimiento.php">Seguimiento</a></li>
        <li><a href="">Apadrinamientos</a></li>
        <li><a href="">Donaciones</a></li>

    </ul>

</header>

<nav>
    <div class="nav-items">
        <ul class="row">
            <li><span onclick='menuL()' class='pointer'><i class="fa fa-bars"></i></span></li>
            <li><a class="rayita-naranja" href="index.php">Inicio</a></li>
            <li><a class="rayita-naranja"  href="usuarios.php">Usuarios</a></li>
            <li><a class="rayita-naranja" href="calendario.php">Calendario</a></li>
            <li><a class="rayita-naranja" href="donar.php">Ingresos</a></li>

        </ul>
    </div>
    <div class="nav-logo row">
        <ul class="row">
            <li style="padding:20px; position: relative"><span onclick='' class='pointer'><i class="far fa-calendar-times"></i></span></li>
            <li style="padding:20px; position: relative">
            <span onclick='abrirConfig()' class='pointer'><i class="fas fa-cog"></i></span>
                <ul id='config' style='display: none'>
                    <i class="fas fa-caret-up"></i>
                    <li><a href="">Ayuda</a></li>
                    <li><a id='cerrarSesion' href="controlador/validar/logout.php">Salir</a></li>
                </ul>
            </i></span></li>
        </ul>
        <img src="publico/images/logo.jpeg">
    </div>
</nav>

<div id="loadAjax">
    <div>
        Cargando <span id='porcentajeCarga'></span>
    </div>
</div>
<!-- <script src="publico/js/ajax/cerrarSesion.js"></script> -->
<script src="publico/js/shadowMenuBlanco.js"></script>
<script src='publico/js/desactivarMenuL.js'></script>