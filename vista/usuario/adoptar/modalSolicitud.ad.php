<div id="solicitudModal" class="modal">
    <div class="flex-modal" id="flex-modalSoli">
        <div class="contenido-modal solicitarAdopcion">
            <h2 class="titulo">Solicitar adopción</h2>
            <br>
            <div>
                La solicitud de adopción será inmediatamente rechazada si: <br><br>
                <ol style="text-align: left; padding: 0 100px">
                    <li>El solicitante no es mayor de edad</li>
                    <li>Si recide en un barrio de alto índice de abandono</li>
                    <li>Si recide en finca o demás espacios rurales</li>
                </ol>
            </div>
            <div class="row mensajeSolicitud">
                <img src="publico/images/p1.jpg" id='fotoSoli'>
                <p>
                    Estás a punto de solicitar la adopción de <span id='nombreSoli'></span>, si lo haces, la fundación se pondrá en contacto contigo al número <?php echo $datosDelUsuario['telefono'] ?> el cual proporcionaste, si lo que deseas apadrinar, sigue el siguiente link: <a href="">apadrinar</a> 
                </p>
            </div>

            <h4>¿Deseas solicitar la adopción?</h4>

            <div class="buttons">

                <button class='btn_naranja' id='solicitar'>Solicitar</button> 
                <button class='btn_naranja' id='apadrinar'>Apadrinar</button>
                <button class='btn_naranja' id='cancelar'>Cancelar</button>

            </div>

        </div>
    </div>
</div>