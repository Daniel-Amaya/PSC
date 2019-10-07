<div class="modal" id='modal'>
    <div class="flex-modal" id='flex-modal'>
        <div class="contenido-modal">
            <form action="" method="post" class="formsVacunas" id='agregarVacuna'>
                <h2>Agregar vacuna</h2>
                <div class="boxInput">
                    <input type="text" name="nomVacuna" placeholder="Vacuna">
                </div>
                <div class="boxInput">
                    <textarea name="" id="" rows="7" placeholder="Sirve para:"></textarea>
                </div>

                <div class="boxInput">
                    <select name="especieVacuna" >
                        <option value="">Para la especie:</option>
                        <option value="canina">Canina</option>
                        <option value="felina">Felina</option>
                    </select>
                </div>

                <div class="boxInput">
                    <input type="submit" value="Agregar vacuna" class="btn_naranja btn_largo">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id='editarVacuna'>
    <div class="flex-modal">
        <div class="contenido-modal">
            <form action="" method="post" class="formsVacunas" id='editarVacunas'>
                <h2>Editar vacuna</h2>

                <input type="hidden" name="id">
                
                <div class="boxInput">
                    <input type="text" name="nomVacuna" placeholder="Vacuna">
                </div>
                <div class="boxInput">
                    <textarea name="" rows="7" placeholder="Sirve para:"></textarea>
                </div>

                <div class="row">
                    <div class='center col-ms-6'>Para la especie:</div><div id='ple' class='center col-ms-6'>Canina</div>
                </div>

                <div class="boxInput">
                    <input type="submit" value="Editar vacuna" class="btn_naranja btn_largo">
                </div>

            </form>
        </div>
    </div>
</div>


<div class="modal" id="buscador">
    <div class="flex-modal">
        <div class="contenido-modal">
            <form action="" id="buscarVacunas" class='formsVacunas'>

                <h2>Buscar vacuna</h2>

                <div class="boxInput">
                    <input type="text" name="nomVacuna" placeholder="Por nombre:">
                </div>

                
                <div class="boxInput">
                    <textarea name="" rows="7" placeholder="O para que sirve:"></textarea>
                </div>

                <div class="boxInput">
                    <input type="submit" value="Buscar vacuna" class="btn_naranja btn_largo">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="publico/js/modal.js"></script>