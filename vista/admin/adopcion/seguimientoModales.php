<div class="modal" id="ModalAdd">
    <div class="flex-modal" role="document">
        <div class="contenido-modal">
            <form style='padding: 50px' method="POST" id="newE">
    
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <h2 class="center" id="myModalLabel">Agregar Evento</h2>
        
                <div class="boxInput">
                    <label for="title">Indicador de seguimiento</label>
                    <input type="text" name="title"  id="title" placeholder="Titulo">
                </div>

                <div class="boxInput">
                    <label for="color" >Color</label>
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
                    <button type="button" class="btn_naranja">Cerrar</button>
                    <button type="submit" class="btn_cafe">Guardar visita</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal" id="modalInfo">
    <div class="flex-modal">
        <div class="contenido-modal">
            <h2 class="center" id='titleSeg'></h2>
            <div>Fecha y hora: <span id='fechaHora'></span></div>
            <div>Adoptante: <span id='adoptanteSeg'></span></div>
            <div>Adoptado: <span id='adoptadoSeg'></span></div>
            <div>Dirección de vivienda: <span id='direccSeg'></span></div>
            <div>Num. adopción: <span id='numAdo'></span></div>
            <div>Fecha adopción: <span id='fechaAdo'></span></div>
        </div>
    </div>
</div>