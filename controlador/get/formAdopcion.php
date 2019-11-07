<?php 

if(isset($_GET['solicitud']) && !empty($_GET['solicitud'])){

    require_once 'modelo/connect.php';
    require_once 'modelo/preguntasAdopcion.php';
    require_once 'controlador/preguntasAdopcionController.php';   
    require_once 'modelo/solicitudes.php';

    $Solicitud = Solicitud::dataSolicitudCod($_GET['solicitud'], $datosDelUsuario['id']);

    if($Solicitud->rowCount() > 0){

        $datosSolicitud = $Solicitud->fetch();
        require_once 'modelo/fotos.php';
        require_once 'controlador/funciones.php';

        $foto = Foto::fotoPerfil($datosSolicitud['id']);
        $fotoPerfil = $foto->fetch();

?>

    <form action="" method="post" id='formAdopcion' enctype='multipart/form-data'>

    <input type="hidden" id='idU' value='<?php echo $datosDelUsuario[0] ?>'>
    <input type="hidden" id="idA" value='<?php echo $datosSolicitud['id'] ?>'>
    <input type="hidden" id="codSoli" value="<?php echo $datosSolicitud['cod'] ?>">
    <input type="hidden" id="correo" value='<?php echo $datosDelUsuario['correo'] ?>'>

        <h2 class='titulo'>Información Previa</h2>

        <div class="row">

            <div class="boxInput">
                <label for="estadoCivil">Estado civil</label>
                <input type="text" id='estadoCivil' name='estadoCivil'>

            </div>

            <div class="boxInput">
                <label for="">Referencia personal</label>
                <input type="text" placeholder="Nombre" name='nombreReferencia' id='nombreReferencia'>
                <input type="tel" placeholder="Teléfono" name='telefonoReferencia' id='telefonoReferencia'>
            </div>

            <div class="boxInput">
                <label for="direccionApto">Dirección de su apartamento</label>
                <input type="text" id='direccionApto' name='direccionApto'>
            </div>

        </div>
        

        <h2 class="titulo">Formulario de adopción</h2>

        <div id="preguntasAdopcion">

            <?php
            
            PreguntasAdopcionController::mostrarFormularioPreguntas();

            ?>

        </div>

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

        <div class="boxRadio acepto">
            <label for="acepto">Acepto haber leído las recomendaciones y condiciones de adopción</label>
            <input type="checkbox" id="acepto">
        </div>

        <div class="row firmas">
            <div class="col-ms-6">
                <strong>ACEPTO CONDICIONES</strong>

                <div class="firmaAdoptante">
                    <label for="firma" id='lugarFirma'>Has clic para subir una foto con tu firma</label>
                    <input type="file" id="firma" style="display: none" accept='image/*'>
                </div>

                <strong>FIRMA</strong>

                <div class='nombreCompleto'>NOMBRE COMPLETO: <?php echo $datosDelUsuario['nombre'] . " " . $datosDelUsuario['apellidos'] ?></div>

                <div>CI: <?php echo $datosDelUsuario['cedula'] ?></div>
            </div>

            <div class="col-ms-6">
                <strong>ENTREGO EN ADOPCIÓN</strong>

                <div class="firmaFundacion">
                    La firma aparecerá cuando termine el proceso de adopción
                </div>
                <strong>FIRMA</strong>

                <div class='nombreCompleto'>NOMBRE COMPLETO: </div>

                <div>CI: </div>
            </div>
        </div>

        <div class='cedulaPDF'>
            <p>Por último, debes agregar un pdf con la copia de tu cédula escaneada</p>
            <label for="cedula" id='lCed'>Has clic para agregar pdf de tu cédula</label>
            <input type="file" id="cedula" accept="application/pdf">
        </div>

        <script src="publico/js/añadirFirma.js"></script>

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

        <input type="submit" value="Enviar respuestas" class="btn_naranja btn_largo">
        
    </form>

    <script src="publico/js/validar/validarAdopcionForm.js"></script>
    <script src="publico/js/ajax/adopcionForm.js"></script>

<?php

    }else{
        echo "No puedes acceder a este formulario xd";
    }
}

?>