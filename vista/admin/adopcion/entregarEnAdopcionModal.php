<div class="modal" id='entregarModal'>
    <div class="flex-modal">
        <div class="contenido-modal">
            <section>

                <h3>Entregar en adopción</h3>

                <div class="row">
                    <p>Al hacer clic en continuar adopción, estás entregando la mascota <?php echo $datosSolicitud['nombre'] ?> al adoptante <?php echo $usuario['nombre']. " " . $usuario['apellidos'] ?> aceptando que cumple con todos los requisitos para adoptar la mascota ¿Deseas continuar?</p>
                </div>

                <div class="btns2">
                    <button class='btn_naranja' id='continuar'>Continuar adopción</button>
                    <button class="btn_cafe" id='cerrarDar'>Volver</button>
                </div>

            </section>
        </div>
    </div>
</div>