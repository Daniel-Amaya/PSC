<section class='margin-menu padding-menu'>


<div class="col-ms-6">
        <fieldset class="crear-cuenta">
            <form action="modelo/enviar.php" method="post" id=''>
                <h2>Enviar mensaje</h2>

                <div class="boxInput">
                    <input placeholder="Nombre" type="text" name='nombre'>
                </div>

                <div class="boxInput">
                    <input placeholder="Apellidos" type="text" name='apellidos'>
                
                </div>
                <div class="boxInput">
                    <input placeholder="Correo" type="text" name='correo'>
                    <div class="error"></div>
                </div>

                <div class="boxInput">
                    <input placeholder="Teléfono" type="number" name='telefono'>
                </div>
                <div class="boxInput">
                <textarea

                    name="mensaje"
                    placeholder="Escriba aqui su mensaje"
                    required
                ></textarea>
                </div>
                <div class="boxInput">
                <input type="submit" value="ENVIAR" id="boton" >
                </div>
            </form>
        </fieldset>
    </div>

    </section>