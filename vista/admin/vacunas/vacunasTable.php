<div class="margin-menu padding-menu">

        <h3 class='textoDeTitulo'>
            Aquí podrás ver las vacunas agregadas de cada especie, para asignar una vacuna a un animalito, ve a la sesión de animalitos y has clic en vacunas:
        </h3>

        <div class="divTableDatos">

            <div class="navTable">
                <div class="buttonsTable">
                    <button class='btn_naranja btn_largo' onclick="nuevaModal()">Agregar vacuna</button>
                </div>

                <div class="nombreIndicador">
                    Vacunas
                </div>
                
                <div class="buscarTable" onclick="buscador()">
                    <i class='fas fa-search pointer'></i>
                </div>
            </div>

            <table class='mostrarVacunas'>
                <thead>
                    <tr>
                        <th>Vacunas para caninos</th>
                        <th>Vacunas para felinos</th>
                    </tr>
                </thead>

                <tfoot>
                    <td id="vacunasCanino">
                    
                    </td>

                    <td id="vacunasFelino">
                        

                    </td>
                </tfoot>
                            
            </table>
        </div>
</div>

<script src="publico/js/ajax/vacunasAjax.js"></script>