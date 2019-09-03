<div class="row margin-menu">

    <div class="col-ms-6">
        <fieldset class="crear-cuenta">
            <form action="" method="post" id='crearUsuario'>
                <h2>Crear una cuenta</h2>
                <div class="boxInput"><input placeholder="Nombre" type="text" name='nombre'></div>
                <div class="boxInput"><input placeholder="Apellidos" type="text" name='apellidos'></div>
                <div class="boxInput"><input placeholder="Correo" type="text" name='correo'></div>
                <div class="boxInput"><input placeholder="Teléfono" type="number" name='telefono'></div>
                <div class="boxInput"><input placeholder="Cédula" type="text" name='cedula'></div>
                <div class="boxInput"><input placeholder="Contraseña" type="password" name='password'></div>
                <div>
                    <label for="agregarFotoUsuario">Has clic para agregar una foto <br><i class="fas fa-image"></i></label>
                    <input type="file" name="agregarFoto" id="agregarFotoUsuario" style="display: none">
                </div>

                <div class="boxInput">
                    <input type="submit" value="Crear cuenta">
                </div>
            </form>
        </fieldset>
    </div>

    <script src="publico/js/ajax/crearCuenta.js"></script>

    <div class="col-ms-6">
        
    </div>


</div>