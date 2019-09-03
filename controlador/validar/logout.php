<?php

session_start();

$_SESSION['sesion_rol'] = '';
$_SESSION['sesion_usuario'] = null;

session_destroy();

header('location:../../index.php');

?>