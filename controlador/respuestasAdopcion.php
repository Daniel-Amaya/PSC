<?php

if($_POST['idU'])

    for($i = 1; $i <= 24; $i++){
    
        if(isset($_POST[$i]) && isset($_POST['db'.$i])){
            
            new RespuestasAdopcion($_POST[$i], $_POST['db'.$i], $i, $_POST['idU']);

        }else if(isset($_POST[$i])){

            new RespuestasAdopcion($_POST[$i], null, $i, $_POST['idU']);

        }

    }

?>