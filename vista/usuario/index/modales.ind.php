<div class="modal" id='miModal'>
    <div class="flex-modal">
        <div class="contenido-modal modalPadding">
            <h2 class='center'>Editar mi información</h2>
            <form action="" method="POST" id='editarUser'>

                <div class="boxInput">
                    <label for="nomE">Nombre</label>
                    <input type="text" id="nomE" placeholder="Nuevo nombre" value="<?php echo $datosDelUsuario[1]?>">
                </div>

                <div class="boxInput">
                    <label for="apeE">Apellidos</label>
                    <input type="text" id="apeE" placeholder="Nuevos apellidos" value="<?php echo $datosDelUsuario[2]?>">
                </div>

                <div class="boxInput">
                    <label for="corrE">Correo</label>
                    <input type="text" id='corrE' value='<?php echo $datosDelUsuario[3] ?>' placeholder="Nuevo correo">
                </div>

                <div class="boxInput">
                    <label for="telE">Teléfono</label>
                    <input type="text" id="telE" placeholder="Nuevo teléfono" value="<?php echo $datosDelUsuario[4]?>">
                </div>

                <div class="boxInput">
                    <label for="cedE">Cédula</label>
                    <input type="text" id="cedE" placeholder="Nueva cédula" value="<?php echo $datosDelUsuario[5]?>">
                </div>

                <?php 
                if($datosDelUsuario['estadoCivil'] != null && $datosDelUsuario['direccionApto'] != null && $datosDelUsuario['referencia'] != null){
                ?>
                
                <div class="boxInput">
                    <label for="estE">Estado civil</label>
                    <input type="text" id='estE' placeholder="Nuevo estado civil" value="<?php echo $datosDelUsuario['estadoCivil'] ?>">
                </div>

                <div class="boxInput">
                    <label for="dirE">Dirección</label>
                    <input type="text" id='dirE' placeholder="Nueva dirección" value="<?php echo $datosDelUsuario['direccionApto'] ?>">
                </div>

                <div class="boxInput">
                    <label for="refE">Referencia</label>
                    <input type="text" id='refE' placeholder="Nuevo referencia" value="<?php echo $datosDelUsuario['referencia'] ?>">
                </div>

                <div class="boxInput">
                    <label for="telRefE">Teléfono de referencia</label>
                    <input type="text" id='telRefE' placeholder="Nuevo teléfono de referencia" value="<?php echo $datosDelUsuario['telefonoRef'] ?>">
                </div>

                <?php
                }
                ?>

                <div class="boxInput">
                    <input type="submit" value="Editar mi información">
                </div>

            </form>
        </div>
    </div>
</div>

<script src='publico/js/modal.js'></script>

<script>

(function(){

    function usuariosAjax(send, action){
        
        ht = new XMLHttpRequest;

        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                action(this);
            }
        });

        ht.open('POST','controlador/ajax/usuariosAjax.php');
        ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
        ht.send(send);
    }

    id('editarUser').addEventListener('submit', (e) =>{
        
        e.preventDefault();

        let nomE = id('nomE').value;
        let apeE = id('apeE').value;
        let corrE = id('corrE').value;
        let telE = id('telE').value;
        let cedE = id('cedE').value;

        if(nomE != "" && apeE != "" && telE != "" && cedE != ""){
            usuariosAjax('idUE='+idUsuario+'&nomE='+nomE+"&apeE="+apeE+'&corrE='+corrE+"&telE="+telE+'&cedE='+cedE, (ht) =>{
                if(ht.responseText == 1){
                    id('miModal').style.display = 'none';
                    alertAction("Se han modificado los datos", 'sienna');
                }else{
                    console.log(ht.responseText);
                    alertAction('No ha sido posible editar los datos', 'red');
                }
            });
        }

    });

})();


</script>