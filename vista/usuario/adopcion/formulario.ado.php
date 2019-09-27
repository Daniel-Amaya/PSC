

<div class="margin-menu padding-menu">

    <?php
    
    require 'controlador/get/formAdopcion.php';
    
    ?>

    <!-- <form action="" method="post" id='formAdopcion'>

        <h2 class='titulo'>Información Previa</h2>

        <div class="row">

            <div class="boxInput">
                <label for="">Estado civil</label>
                <input type="text">

            </div>

            <div class="boxInput">
                <label for="">Referencia personal</label>
                <input type="text" placeholder="Nombre">
                <input type="text" placeholder="Teléfono">
            </div>

            <div class="boxInput">
                <label for="">Dirección de su apartamento</label>
                <input type="text">
            </div>

        </div>
        


        <h2 class="titulo">Formulario de adopción</h2> -->

        <?php
        
        // PreguntasAdopcionController::mostrarFormularioPreguntas('1', '2');
        ?>







        <!-- <div class="row">

            <div class="col-ms-6">

                <div class="boxInput">
                    <label for="1">1. ¿Por qué desea adoptar una mascota?</label>
                    <input type="text" placeholder="" id='1'>
                </div>


            </div>

            <div class="col-ms-6"></div>
            
        </div> -->

        <!-- <div class="boxInput">
            <p>¿Actualmente tiene otros animalitos?<select name="especie"></p>
                <option value="Perro">Sí</option>
                <option value="Gato">No</option>
            </select>
            <!-- <input type="text" placeholder="especie" name='especie'> -->
        <!-- </div>

        <div class="boxInput">
            <p>¿Cuáles?</p>
            <input type="text" placeholder="" name='raza'>
        </div>

        <div class="boxInput">
            <p>Si los tiene, ¿Están esterilizados?
            <input type="text" placeholder="" name='color'>
        </div>

        <div class="boxInput">
            <p>Sí o no, ¿Por qué?
            <input type="text" placeholder="" name='color'>
        </div>

        <div class="boxInput">
            <p>¿Anteriormente a tenido otros animalitos? Sí o no, ¿Cuáles?
            <input type="text" placeholder="" name='color'>
        </div>

        <div class="boxInput">
            <p>¿Qué fue lo que paso con él/ellos?
            <input type="text" placeholder="" name='color'>
        </div>

        <div class="boxInput">
            <p>¿Está de acuerdo que se haga una visita periódica a su domicilio para ver cómo se encuentra su animalito adoptado?<select name="especie"></p>
                <option value="Perro">Sí</option>
                <option value="Gato">No</option>
            </select>
        </div>

            <div class="boxInput">
            <p>¿Cuántas personas viven en su casa?
            <input type="text" placeholder="" name='color'>
            </div>

            <div class="boxInput">
            <p>¿Están todos de acuerdo con adoptar?<select name="especie"></p>
                <option value="Perro">Sí</option>
                <option value="Gato">No</option>
            </select>
        </div>

        <div class="boxInput">
            <p>¿Hay niños en casa? Sí o no, ¿Cuáles son sus edades?</p>
            <input type="text" placeholder="" name='color'>
            </div>

            <div class="boxInput">
            <p>Alguien que viva con ustedes es alérgico a los animales o sufre de asma?</p>
            <input type="text" placeholder="" name='color'>
            </div>

        <div class="boxInput">
            <p>En caso de alquiler, ¿Sus dueños permiten animalitos en la casa?</p>
            <select name="alquiler">
                <option value="">Responda</option>
                <option value="M">Sí</option>
                <option value="F">No</option>
                <option value="F">No se</option>
                <option value="F">La casa es propia</option>
            </select>
        </div>

        <div class="boxInput">
            <p>Si por alguna razón tuviera que cambiar de domicilio, ¿Qué pasaría con el animalito?</p>
            <input type="text" placeholder="" name='color'>
            </div>

            <div class="boxInput">
            <p>En caso de un ruptura en la familia (divorcio, fallecimiento) o la llegada de un nuevo integrante humano, ¿Cuáles serían los cambios en el trato hacía el animalito adoptado?</p>
            <input type="text" placeholder="" name='color'>
            </div>

            <div class="boxInput">
            <p>¿Cuántos cree que vive en promedio un animalito?</p>
            <input type="text" placeholder="" name='color'>
            </div>

            <div class="boxInput">
            <p>¿Cómo se ve con su animalito adoptado dentro de 5 años?</p>
            <input type="text" placeholder="" name='color'>
            </div>

            <div class="boxInput">
            <p>¿Tiene espacio suficiente para que el animalito se sienta cómodo?<select name="especie"></p>
                <option value="Perro">Sí</option>
                <option value="Gato">No</option>
            </select>
        </div>

        <div class="boxInput">
            <p>¿Dónde dormira en animalito?</p>
            <input type="text" placeholder="" name='color'>
            </div>

            <div class="boxInput">
            <p>¿Cuánto tiempo pasará solo el animalito?</p>
            <input type="text" placeholder="" name='color'>
            </div>

            <div class="boxInput">
            <p>¿Si el comportamiento del animalito no es el que usted desea (jugueton, inquieto, mimado, rebelde), qué medidas tomaría?</p>
            <input type="text" placeholder="" name='color'>
            </div>

            
        <div class="boxInput">
            <p>Señale la cantidad que cree que se gastara con el animalito al mes?</p>
            <select name="alquiler">
                <option value="">Responda</option>
                <option value="M">20-30</option>
                <option value="F">40-50</option>
                <option value="F">60-70</option>
                <option value="F">Más</option>
            </select>
        </div>

        <div class="boxInput">
            <p>¿Quién será el encargado de cubrir los gastos de las mascotas?</p>
            <input type="text" placeholder="" name='color'>
            </div>

            <div class="boxInput">
            <p>¿Tiene un medico veterinario de cabecera?<select name="especie"></p>
                <option value="Perro">Sí</option>
                <option value="Gato">No</option>
            </select>
        </div>

        <div class="boxInput">
            <p>Nombre y telefono del veterinario</p>
            <input type="text" placeholder="" name='color'>
            </div>

        <div class="boxInput">
            <p>¿Asume el compromiso de esterilizar al adoptado una vez tenga la edad suficiente?<select name="especie"></p>
                <option value="Perro">Sí</option>
                <option value="Gato">No</option>
            </select>
        </div> -->
<!-- 
        <br><br> --> 
    <!-- <div class="boxInput">
            <input type="submit" value="Enviar">
        </div> -->












        <!-- <div class="row recomendaciones">
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

        <div class="boxRadio acepto">
            <label for="acepto">Acepto haber leído las recomendaciones y condiciones de adopción</label>
            <input type="checkbox" id="acepto">
        </div>

        <div class="row firmas">
            <div class="col-ms-6">
                <strong>ACEPTO CONDICIONES</strong>

                <div class="firmaAdoptante">
                    <label for="firma">Has clic para subir una foto con tu firma</label>
                    <input type="file" id="firma" style="display: none">
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

        <h3 class="titulo">Adoptado</h3>

        <div class="informacionAdoptado">
            <div class="fotoPerfil">
                <img src="publico/images/p1.jpg">
            </div>
            
            <div>
                <div class="nombreAdoptado">
                    Nombre: Anuel
                </div>
                <div class="edadAdoptado">
                    Edad: 3 meses
                </div>

                <div class="sexoAdoptado">
                    Sexo: Femenino
                </div>
            </div>

        </div>
        
    </form> -->
        

</div>
