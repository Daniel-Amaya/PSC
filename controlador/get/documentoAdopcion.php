<?php

if(isset($_GET['adopcion']) && !empty($_GET['adopcion'])){

    require_once 'modelo/connect.php';
    require_once 'modelo/respuestasAdopcion.php';
    require_once 'controlador/respuestasAdopcionController.php';
    require 'modelo/adopciones.php';
    require 'modelo/documentosLegales.php';
    require 'controlador/funciones.php';
    require 'modelo/animales.php';
    require 'modelo/fotos.php';

    $e = Adopcion::retornarIds($_GET['adopcion']);
    $usuario = Usuario::dataUsuarios($e['idUsuario']);
    $usuario = $usuario->fetch();

   $animalito = Animal::dataAnimal($e['idAnimalAdoptado']);
   $animalito = $animalito->fetch(); 
   $foto = Foto::fotoPerfil($e['idAnimalAdoptado']);
   $fotoPerfil = $foto->fetch();

    $documentos = DocumentosLegales::dataDocumentos($e['idUsuario']);

    ?>

        <h2 class='titulo'>Formulario de adopción diligenciado</h2>
        <div id="imp">

            <table class='datosAdoptante'>
                <tr>
                    <td>Apellidos y nombres: <br><?php  echo $usuario[2] ." ". $usuario[1] ?></td>
                    <td>Teléfono: <br><?php   echo $usuario['telefono'] ?></td>
                    <td>Fecha: <br><?php   echo $e['fechaAdopcion']?></td>
                    <td>Ciudad: <br> Medellín</td>
                </tr>

                <tr>
                    <td colspan='2'>C.I:  <?php  echo $usuario['cedula'] ?></td>
                    <td colspan='2'>Estado civil:  <?php echo $usuario['estadoCivil'] ?></td>
                </tr>
    
                <tr>
                    <td colspan='2'>Dirección:  <?php  echo $usuario['direccionApto'] ?></td>
                    <td colspan='2'>Referencia personal:  <?php echo $usuario['referencia'] ?></td>
                </tr>
    
                <tr>
                    <td colspan='2'>Email:  <?php  echo $usuario['correo']?></td>
                    <td colspan='2'>Teléfono Referencia:  <?php echo $usuario['telefonoRef'] ?></td>
                </tr>
    
            </table>

            <?php
            
            RespuestasAdopcionController::mostrarRespuestasAdoptado($e['idUsuario'], $e['idAnimalAdoptado']);
            
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
                        Se enviarán fotos regularmente a: sesión mis animalitos, con el fin de realizar el seguimiento del estado, trato y medio en el que se desenvuelve el animalito adoptado; también así se podrá mantener actualizada nuestra base de datos.
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
                    <label class='firmaBox'><img src="http://localhost/PSC/publico/images/<?php echo $documentos[1] ?>"></label>

                </div>

                <strong>FIRMA</strong>

                <div class='nombreCompleto'>NOMBRE COMPLETO: <?php echo $usuario['nombre'] . " " . $usuario['apellidos']  ?></div>

                <div>CI: <?php echo $usuario['cedula'] ?></div>
            </div>

            <div class="col-ms-6">
                <strong>ENTREGO EN ADOPCIÓN</strong>

                <div class="firmaFundacion">
                <label for="firma" id='lugarFirma' class='firmaBox'><strong>Peluditos San Cristóbal</strong></label>
                </div>
                <strong>FIRMA</strong>

                <div class='nombreCompleto'>NOMBRE COMPLETO: <?php echo $datosDelUsuario['nombre'] . " " . $datosDelUsuario['apellidos']  ?></div>

                <div>CI: <?php echo $datosDelUsuario['cedula'] ?></div>
            </div>
        </div>

        <h3 class="titulo">Adoptado</h3>

        <div class="informacionAdoptado">
            <div class="fotoPerfil">
                <img src="http://localhost/PSC/publico/images/<?php echo $fotoPerfil[1] ?>">
            </div>
            
            <div>
                <div class="nombreAdoptado">
                    Nombre: <?php echo $animalito['nombre'] ?>
                </div>
                <div class="edadAdoptado">
                    Edad: <?php echo edad($animalito['edad']) ?>
                </div>

                <div class="sexoAdoptado">
                    Sexo: <?php echo genero($animalito['sexo']) ?>
                </div>
            </div>

        </div>
        </div>

        <a href="publico/images/<?php echo $documentos[2] ?>" class='btn_cafe verCed' target="_blank">Ver copia de cédula</a>

        <div class="btns2">
            <form action="controlador/ajax/imprimirAjax.php?ad=<?php echo $_GET['adopcion'] ?>" method="post">
                <input type="hidden" value='' id='iner' name='tables'>
                <button class='btn_naranja'>Descargar</button>
                <button class='btn_cafe'>Imprimir</button>
            </form>
        </div>

        <!-- <script src="publico/js/ajax/imprimirAjax.js"></script> -->
        <script>
            id('iner').value = id('imp').innerHTML;
        </script>
        <?php
}


?>