<?php
require 'modelo/donaciones.php';
require 'controlador/donacionesController.php';
?>
    <div class="margin-menu padding-menu">

    <h3 class='textoDeTitulo'>
        Aquí vas a encontrar todas las donaciones realizadas por los usuarios:
        </h3>
    <div class="divTableDatos">

        <div class="navtable">
            <h2 class="center">Donaciones</h2>
        </div>

        <table>

            <thead>
                <tr>
                    <th>Donación</th>
                    <th>Cantidad</th>
                    <th>valor</th>
                    <th>Mensaje</th>
                    <th>Comprobante</th>
                </tr>
            </thead>

            <tbody>
                <?php
                
                DonacionesController::mostrarDonacionesAdmin();
                
                ?>
            </tbody>
        </table>
    </div>
</div>
