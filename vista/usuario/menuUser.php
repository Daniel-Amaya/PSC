<?php 

require 'modelo/connect.php';
require 'modelo/usuarios.php';
require 'controlador/usuariosController.php';
$datosDelUsuario = UsuariosController::mostrarDatosDelUsuario($_SESSION['sesion_usuario']['id']);

?>

<?php include 'vista/loader.php'; ?>
<script src='publico/js/loader.js'></script>
<script>

const idUsuario = <?php echo $datosDelUsuario[0] ?>

</script>

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

        <li class="response-item"><a href="index.php" >Inicio</a></li>
        <li class="response-item"><a href="fundacion.php">Fundación</a></li>
        <li class="response-item"><a href="calendario.php">Eventos</a></li>
        <li><a href="adoptar.php" clas='rayita-naranja'>Adoptar</a></li>
        <li><a href="" clas='rayita-naranja'>Apadrinar</a></li>
        <li><a href="donar.php" clas='rayita-naranja'>Donar</a></li>
        <li><a href="solicitudes.php">Mis solicitudes</a></li>
        <li><a href="contacto.php" clas='rayita-naranja'>Contacto</a></li>

    </ul>

</header>

<nav>
    <div class="nav-items">
        <ul class="row">
            <li><span onclick='menuL()' class='pointer'><i class="fa fa-bars"></i></span></li>
            <li><a class="rayita-naranja" href="index.php">Inicio</a></li>
            <li><a class="rayita-naranja"  href="">Fundación</a></li>
            <li><a class="rayita-naranja" href="calendario.php">Eventos</a></li>
            <?php
            require_once 'modelo/adopciones.php';
            $verificarAdopcion = Adopcion::dataAdopciones($datosDelUsuario[0]);
            if($verificarAdopcion->rowCount() > 0){
            ?>
            <li><a class="rayita-naranja" href="seguimiento.php">Seguimiento</a></li>
            <?php
            }
            ?>

        </ul>
    </div>
    <div class="nav-logo row">
        <ul class="row">
            <li style="padding:20px; position: relative">
                <span onclick='abrirNotificaciones()' class='pointer' id='numNoti'><i class="far fa-bell"></i></span>
                <ul id="notificaciones" style='display: none'>
                    <i class="fas fa-caret-up"></i>
                    
                </ul>
            </li>
            <li style="padding:20px; position: relative">
                <span onclick='abrirConfig()' class='pointer'><i class="fas fa-cog"></i></span>
                <ul id='config' style='display: none'>
                    <i class="fas fa-caret-up"></i>
                    <li><a href="">Ayuda</a></li>
                    <li><a id='cerrarSesion' href="controlador/validar/logout.php">Salir</a></li>
                </ul>
            </li>

        </ul>
        <img src="publico/images/logo.jpeg">
    </div>
</nav>

<script>

document.addEventListener('DOMContentLoaded', () =>{

    mostrarNotificaciones(idUsuario);

});

</script>
<script src="publico/js/ajax/notificaciones.js"></script>
<script src="publico/js/shadowMenuBlanco.js"></script>
<script src='publico/js/desactivarMenuL.js'></script>

<div id="loadAjax">
    <div>
        Cargando <span id='porcentajeCarga'></span>
    </div>
</div>