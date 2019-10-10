<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    <link rel="icon" href="publico/images/logo.png">
    <link rel="stylesheet" href="publico/css/estilo.css">
    <?php
    if(isset($linksStyles) && !empty($linksStyles)){
        for($i = 0; $i < count($linksStyles); $i++){
            echo "<link rel='stylesheet' href='publico/css/$linksStyles[$i]'>";
        }
    }
    ?>

    <script src="publico/js/main.js"></script>
    <title><?php if(isset($nombrePagina)) echo $nombrePagina ?> PSC</title>

</head>
<body>

    
