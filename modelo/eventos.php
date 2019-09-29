
<?php
header('Content-Type: application/json');

$pdo=new PDO("mysql:dbname=peluditos_san_cristobal;host=localhost","root","");


            $accion= (isset($_GET['accion']))?$_GET['accion']:'leer';
            switch($accion){
                case 'agregar':

                $sentenciaSQL = $pdo->prepare("INSERT INTO 
                eventos (title,descripcion,color,textColor,start,end)
                VALUES(:title,:descripcion,:color,:textColor,:start,:end)");

                $respuesta=$sentenciaSQL->execute(array(
                    "title" => $_POST['title'],
                    "descripcion" =>$_POST['descripcion'],
                    "color" =>$_POST['color'],
                    "textColor" =>$_POST['textColor'],
                    "start" =>$_POST['start'],
                    "end" =>$_POST['end']
                ));
                echo json_encode($respuesta);
                break;

                // case 'eliminar':

                // break;


                // case 'modificar':

                // break;

                default:

                     $sentenciaSQL= $pdo->prepare("SELECT * FROM eventos");
                     $sentenciaSQL->execute();

                     $resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                     echo json_encode($resultado);

                break;

            }


            


?>