<div class="modal" id='modalAni'>
    <div class="flex-modal">
        <div class="contenido-modal" style='width: 80%;'>
              <div class='perfil' style='width: 100%;'>

                    <div class='header'>
                        <div class='btn_tabs'>
                            <i class='fas fa-info-circle'></i>
                        </div>
                        
                        <div class='fotoPerfil'>
                            <img id='fotoPerfilModal' src=''>
                        </div>
                        
                        <h2 class='nombreAnimal'></h2>

                        <!-- <div class='adoptadoORadoptar'>
                        <span>información legal de la adopción</span>
                        <strong>Fecha de adopción: 2016/05/20</strong>
                        </div> -->

                    </div>

                    <div class="row">

                        <div class='descripcion'>
                            <h4>Descripción</h4>
                            <p id='desM'></p>
                        </div>

                        <div class='informacion'>
                            <table>
                                <tr>
                                    <td>Especie:</td>
                                    <td id='esM'></td>
                                </tr>
                                <tr>
                                    <td>Raza:</td>
                                    <td id='raM'></td>
                                </tr>
                                <tr>
                                    <td>Color:</td>
                                    <td id='coM'></td>
                                </tr>
                                <tr>
                                    <td>Sexo:</td>
                                    <td id='seM'></td>
                                </tr>
                                <tr>
                                    <td>Edad:</td>
                                    <td id='edM'></td>
                                </tr>
                                <tr>
                                    <td>Esterilizado:</td>
                                    <td id='esteM'></td>
                                </tr>
                                <tr>
                                    <td>Procedencia:</td>
                                    <td id='proM'></td>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div>
                                        
        </div>
    </div>
</div>

<script>

modalAnimalitos = (data, fotoPerfil) =>{
    
    id('modalAni').style.display = 'block';

    id('fotoPerfilModal').src = 'publico/images/'+fotoPerfil;
    classNames('nombreAnimal')[0].textContent = data[1];
    id('desM').textContent = data['descripcion'];
    id('esM').textContent = data['especie'];
    id('raM').textContent = data['raza'];
    id('coM').textContent = data['color'];

    id('seM').textContent = data['color'];

    id('edM').textContent = data['edad'];

    id('esteM').textContent = data['color'];
    
    id('proM').textContent = data['procedencia'];

    document.addEventListener('click', (e) =>{
        if(e.target == id('modalAni').getElementsByClassName('flex-modal')[0]){
            id('modalAni').style.display = 'none';
        }
    }
    );
}

</script>