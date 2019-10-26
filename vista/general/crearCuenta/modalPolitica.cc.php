<div class="modal" id='politicaDatos' style="display:block">
    <div class="flex-modal">
        <div class="contenido-modal">
            <h3 class='titulo'>Política de datos</h3>
            <p>Aquí va la política de datos</p>
            <div class="boxRadio">
                <label for="cond">Acepto haber leído la política de datos</label>
                <input type="checkbox" id="cond">
            </div>
        </div>
    </div>
</div>

<script>
    
    id('cond').addEventListener('change', () =>{

        if(id('cond').checked == true){
            id('politicaDatos').style.display = 'none';
        }

    });


</script>