<div class="modal" id="ModalAdd">
    <div class="flex-modal" role="document">
        <div class="contenido-modal">
            <form style='padding: 50px' method="POST" id="newE">
    
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <h2 class="center" id="myModalLabel">Agregar Evento</h2>
        
                <div class="boxInput">
                    <label for="title">Indicador de seguimiento</label>
                    <input type="text" name="title"  id="title" placeholder="Titulo" value="Seguimiento a <?php echo $usuario['nombre']." ".$usuario['apellidos'] ?>">
                </div>

                <div class="boxInput">
                    <label for="color" >Color predeterminado para el seguimiento</label>
                    <select name="color" id="color">

                        <option style="color:#FF8C00;" value="#FF8C00">&#9724; Seguimiento de adopciones</option>

                    </select>
                </div>

                <div class="boxInput">
                    <label for="start" >Fecha Inicial</label>
                    <input type="text" name="start" id="start" placeholder="YYYY-MM-DDT">
                </div>

                <input type="hidden" id='idU'>
                <input type="hidden" id='idA'>

                <div class="btns2">
                    <button type="button" class="btn_naranja" id='cerrarEs'>Cerrar</button>
                    <button type="submit" class="btn_cafe">Guardar visita</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal" id="modalInfo">
    <div class="flex-modal">
        <div class="contenido-modal" style="padding: 50px; width: 40%">
            <h2 class="center" id='titleSeg' style="margin-bottom: 20px"></h2>
            <div style='padding: 5px'>Fecha y hora: <span id='fechaHora'></span></div>
            <div style='padding: 5px'>Adoptante: <span id='adoptanteSeg'></span></div>
            <div style='padding: 5px'>Adoptado: <span id='adoptadoSeg'></span></div>
            <div style='padding: 5px'>Dirección de vivienda: <span id='direccSeg'></span></div>
            <div style='padding: 5px'>Num. adopción: <span id='numAdo'></span></div>
            <div style='padding: 5px'>Fecha adopción: <span id='fechaAdo'></span></div>
        </div>
    </div>
</div>

<div class="modal" id="seguiD">
    <div class="flex-modal">
        <div class="contenido-modal seguiD">
            <h2 class="titulo" id='ttD' style="margin-bottom: 20px"></h2>

            <div style='padding: 5px'>Fecha y hora: <span id='fhD'></span></div>
            <div style='padding: 5px'>Adoptante: <span id='ateD'></span></div>
            <div style='padding: 5px'>Adoptado: <span id='atoD'></span></div>
            <div style='padding: 5px'>Teléfono: <span id='telD'></span> </div>
            <div style='padding: 5px'>Dirección de vivienda: <span id='diD'></span></div>
            <div style='padding: 5px'>Num. adopción: <span id='nadD'></span></div>
            <div style='padding: 5px'>Fecha adopción: <span id='faD'></span></div>
            <div>
                <button class='btn_naranja btn_largo' id='marVisit'>Marcar como visitado</button>
                <button class='btn_rojo btn_largo'>Cerrar</button>
            </div>
        </div>
    </div>
</div>