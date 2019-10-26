<div class="modal" id='politicaDatos' style="display:block">
    <div class="flex-modal">
        <div class="contenido-modal">
            <p>Aquí va la política de datos</p>
            <div class="boxRadio">
                <label for="cond">Acepto haber leído la política de datos</label>
                <input type="checkbox" id="cond">
            </div>
        </div>
    </div>
</div>

<script>
    
if(id('cond').checked){
    id('politicaDatos').style.display = 'none';
}

</script>

<div class="modal" id="modal">
    <div class="flex-modal">
        <div class="contenido-modal" style='padding: 30px; width: 40%; '>
            <div class="mensajeForm">

            </div>
            <a href="index.php" class='btn_naranja' style='display:block'>Continuar</a>
        </div>
    </div>
</div>