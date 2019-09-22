<?php 

if($_SESSION['sesion_rol'] != "a"){
    header('location:index.php');
}

?>