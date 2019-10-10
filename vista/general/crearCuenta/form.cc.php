<div class="row margin-menu">

    <div class="col-500-6">
        <fieldset class="crear-cuenta">
            <form action="" method="post" id='crearUsuario'>
                <h2>Crear una cuenta</h2>

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
            </form>
        </fieldset>
    </div>

    <div class="col-500-6 cc-cat">
        <div class="cat">
            <div class="paw"></div>
            <div class="paw"></div>
            <div class="shake">
                <div class="tail"></div>
                <div class="main">
                    <div class="head"></div>
                    <div class="body">
                        <div class="leg"></div>
                    </div>
                    <div class="face">
                        <div class="mustache_cont">
                            <div class="mustache"></div>
                            <div class="mustache"></div>
                        </div>
                        <div class="mustache_cont">
                            <div class="mustache"></div>
                            <div class="mustache"></div>
                        </div>
                        <div class="nose"></div>
                        <div class="eye"></div>
                        <div class="eye"></div>
                        <div class="brow_cont">
                            <div class="brow"></div>
                            <div class="brow"></div>
                        </div>
                        <div class="ear_l">
                            <div class="inner"></div>
                        </div>
                        <div class="ear_r">
                            <div class="outer"></div>
                            <div class="inner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="publico/js/ajax/crearCuenta.js"></script>
<script src="publico/js/validar/validarCrearCuenta.js"></script>
<script src="publico/js/shadowMenuBlanco.js"></script>
<script src='publico/js/mostrarFotoPerfil.js'></script>