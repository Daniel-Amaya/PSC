<?php

if(isset($_GET['adopcion']) && !empty($_GET['adopcion'])){

    require_once 'modelo/connect.php';
    require_once 'modelo/respuestasAdopcion.php';
    require_once 'controlador/respuestasAdopcionController.php';

    $e = RespuestasAdopcionController::mostrarRespuestasAdoptado($_GET['adopcion']);

    if($e != "algo ha salido mal, regresa"){
        
        require 'modelo/documentosLegales.php';
        ?>


    <div class="row recomendaciones">
            <div class="col-ms-6">

                <h3 class='titulo'>RECOMENDACIONES:</h3>

                <p>
                    <ol>
                        <li>
                        Visitas mensuales al veterinario, se sugiere que el médico sea una persona consiente, protectora y amante de los animalitos, deberá ser siempre el mismo profesional de manera que conozca desde el inicio al paciente que estará tratando
                        </li>

                        <li>
                        El animalito deberá estar al día con sus vacunas, vitaminas y desparacitantes.
                        </li>

                        <li>
                        Si el animalito adoptado es un gatito deberá por lo menos permancer dentro de casa hasta que conozca el sitio y se adapte a sus nuevos dueños 20 días, para que juntamente con la compañía de sus amos conozca y comparte sitios como el patio de su casa, entre otros.
                        </li>

                        <li>
                        Se enviarán fotos regularmente a: sancristobalpeluditos@gmail.com, con el fin de realizar el seguimiento del estado, trato y medio en el que se desenvuelve el animalito adoptado; también así se podrá mantener actualizada nuestra base de datos.
                        </li>
                    </ol>
                </p>
            </div>

            <div class="col-ms-6">
                <h3 class="titulo"> AL FIRMAR ESTE DOCUMENTO, EL ADOPTANTE ACEPTA QUE:</h3>

                <ol>
                    <li>El adoptado será un miembro más de su familia.</li>
                    <li>El adoptado tendrá en todo momento agua limpia con libre acceso.</li>
                    <li>El adoptado tendrá una alimentación balanceada a base de croqueta seca.</li>
                    <li>El adoptado usará SIEMPRE UN COLLAR CON SU PLACA DE IDENTIFICACIÓN (con nombre y teléfono del responsable)</li>
                    <li>El adoptado no será en ningún caso golpeado, maltratado, humillado, abandonado, ni regalado.</li>
                    <li>El adoptado debe contar con un área para dormir y comer.</li>
                    <li>El adoptado recibirá los cuidados médicos necesarios para su bienestar (desparasitación cada 6 meses y vacunación anual).</li>
                    <li>El adoptado será esterilizado.</li>
                    <li>SI NO SE CUMPLIERA CON LO INDICADO, EL ADOPTADO SERÁ RETIRADO INMEDIATAMENTE (SE LE OFRECE UN HOGAR DE AMOR Y PROTECCIÓN)</li>
                </ol>
            </div>
        </div>

        <div class="row firmas">
            <div class="col-ms-6">
                <strong>ACEPTO CONDICIONES</strong>

                <div class="firmaAdoptante">
                    <label><img src="publico/images/"></label>

                </div>

                <strong>FIRMA</strong>

                <div class='nombreCompleto'>NOMBRE COMPLETO: <?php echo $usuario['nombre'] . " " . $usuario['apellidos']  ?></div>

                <div>CI: <?php echo $usuario['cedula'] ?></div>
            </div>

            <div class="col-ms-6">
                <strong>ENTREGO EN ADOPCIÓN</strong>

                <div class="firmaFundacion">
                <label for="firma" id='lugarFirma'><strong>Peluditos San Cristóbal</strong></label>
                </div>
                <strong>FIRMA</strong>

                <div class='nombreCompleto'>NOMBRE COMPLETO: <?php echo $datosDelUsuario['nombre'] . " " . $datosDelUsuario['apellidos']  ?></div>

                <div>CI: <?php echo $datosDelUsuario['cedula'] ?></div>
            </div>
        </div>

        <h3 class="titulo">Adoptado</h3>

        <div class="informacionAdoptado">
            <div class="fotoPerfil">
                <img src="publico/images/<?php echo $fotoPerfil[1] ?>">
            </div>
            
            <div>
                <div class="nombreAdoptado">
                    Nombre: <?php echo $datosSolicitud['nombre'] ?>
                </div>
                <div class="edadAdoptado">
                    Edad: <?php echo edad($datosSolicitud['edad']) ?>
                </div>

                <div class="sexoAdoptado">
                    Sexo: <?php echo genero($datosSolicitud['sexo']) ?>
                </div>
            </div>

        </div>
        <?php
    }
}


?>