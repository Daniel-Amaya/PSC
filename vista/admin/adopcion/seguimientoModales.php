<div class="modal" id="ModalAdd">
    <div class="flex-modal" role="document">
        <div class="contenido-modal">
            <form style='padding: 50px' class="form-horizontal" method="POST" onsubmit="añadirSeg()" id="newE">
    
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <h2 class="center" id="myModalLabel">Agregar Evento</h2>
        
                <div class="boxInput">
                    <label for="title" class="col-sm-2 control-label">Indicador de seguimiento</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
                </div>

                <div class="boxInput">
                    <label for="color" class="col-sm-2 control-label">Color</label>
                    <select name="color" class="form-control" id="color">

                        <option style="color:#FF8C00;" value="#FF8C00">&#9724; Seguimiento de adopciones</option>

                    </select>
                </div>

                <div class="boxInput">
                    <label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
                    <input type="text" name="start" class="form-control" id="start" readonly>
                </div>

                <input type="hidden" id='idU'>
                <input type="hidden" id='idA'>

                <div class="btns2">
                    <button type="button" class="btn_naranja" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn_cafe">Guardar visita</button>
                </div>

            </form>
        </div>
    </div>
</div>