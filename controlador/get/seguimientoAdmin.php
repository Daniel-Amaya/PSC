<?php 

if(isset($_GET['seg']) && !empty($_GET['seg'])){

    $seguimiento = Seguimiento::dataSeguimiento($_GET['seg']); 
    $seguimiento = $seguimiento->fetch();
    $usuario = Usuario::dataUsuarios($seguimiento['idUsuario']);
    $usuario = $usuario->fetch();
    $animalito = Animal::dataAnimal($_GET['seg']);
    $animalito = $animalito->fetch();

    echo "
        <h3 class='textoDeTitulo'>Seguimiento de la adopción, donde el adoptante es {$usuario['nombre']} {$usuario['apellidos']} y el adoptado es {$animalito['nombre']}</h3>

        <div class='row seguimientoInfo'>
            <div class='col-500-6'>";
                SeguimientoController::seguienteSeguimiento($_GET['seg']);
            echo "
                <div class='divTableDatos'>
                <h3 class='center'>Fechas de seguimiento</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Visitado</th>
                            </tr>
                        </thead>
                        <tbody>";
                            SeguimientoController::mostrarSeguimientoAdmin($_GET['seg']);
                    echo "    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class='col-500-6'>
                <table class='tableIzDe'>
                    <thead>
                        <tr><th colspan='2'>Contactar usuario</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Teléfono:</td>
                            <td>{$usuario['telefono']}</td>
                        </tr>
                        <tr>
                            <td>Correo:</td>
                            <td>{$usuario['correo']}</td>
                        </tr>
                        <tr>
                            <td>Dirección:</td>
                            <td>{$usuario['direccionApto']}</td>
                        </tr>
                        <tr>
                            <td>Teléfono referencia:</td>
                            <td>{$usuario['telefonoRef']}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', () =>{
            id('todosLosSeg').remove();
        });
        </script>
    ";
}
?>