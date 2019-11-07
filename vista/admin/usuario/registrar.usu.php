<div class="padding-menu margin-menu" id='registrarUser' style='display: none'>

    <fieldset class="crear-cuenta">
        <h2 class='titulo'>Agregar una cuenta</h2>

        <form action="" method="post" class="row" id='crearUsuario'>

            <div class="col-500-6">

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
                    <input placeholder="Cédula" type="text" name='cedula'>
                    <div class="error"></div>
                </div>

            </div>

            <div class="col-500-6">

                <div class="boxRadio">
                    <label for="admin">¿Administrador?</label>
                    <input type="checkbox" name="admin" id="admin">
                </div>

                <div class="boxInput">
                    <input placeholder="Contraseña" type="password" name='password' >
                </div>

                <div>
                    <label for="agregarFotoUsuario" id='FCR'>Has clic para agregar una foto <br><i class="fas fa-image"></i></label>
                    <input type="file" name="agregarFoto" id="agregarFotoUsuario" style="display: none">
                </div>

                <div class="boxInput">
                    <input type="submit" value="Crear cuenta">
                </div>
            </div>

        </form>
    </fieldset>

</div>
