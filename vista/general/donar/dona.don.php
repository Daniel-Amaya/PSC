<section class='margin-menu'>

    <h1 class="titulo">¿Que desea donar?</h1>

  
    <div class="row">

        <div class="col-500-6 row">
            <div class="containerCat">
                
                <strong  class='msg-don'>Has clic en lo que deseas donar para ver los pasos de como hacerlo</strong>
                <div class="plane">
                    
                    <div class="p-body">
                        <div class="p-parts">
                            <div class="part-one">
                                <span class="po-up"></span>
                                <span class="po-middle"></span>
                                <span class="po-down"></span>
                            </div>
                            <div class="part-two">
                                <span class="pt-wing"></span>
                            </div>
                            <div class="part-three">
                                <span class="roll"></span>
                            </div>
                            <div class="helix">
                                <span class="h-base"></span>
                                <span class="h-rotor"></span>
                            </div>
                        </div>
                    
                        <div class="cat">
                            <span class="eyes left"></span>
                            <span class="eyes right"></span>
                            <span class="mouth"></span>
                        </div>
                    </div>
                    
                    <div class="p-message">
                    <div class="rope"></div>
                    <ul>
                        <li class='tabsItemUser pointer'> <strong>Alimento</strong></li>
                        <li class="middle tabsItemUser pointer"> <strong>Medicamentos</strong></li>
                        <li class='tabsItemUser pointer'> <strong> Dinero</strong></li>
                    </ul>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="col-500-6">
            <div class="box-don">
                
                <h2 class='center t-don' id='t-don'>Alimento</h2>
                <div class='row'>

                    <div class="col-ms-6">

                        <h3 class="center">Formulario de donación</h3>
                        
                        <form method="POST" id='insertar-donacion' enctype="multipart/form-data" >
                        
                            <div class="boxInput">
                                <select name="donacion" id='donacion' required> 
                                    <!-- <option disabled selected>Opciones</option> -->
                                    <option>¿De qué es su donación?</option>
                                    <option value="alimentos">Alimentos</option>
                                    <option value="medicamentos">Medicamentos</option>
                                    <option value="dinero">Dinero</option>
                                </select>
                            </div>

                            <div class="boxInput">
                                <input type="number" placeholder="¿De cuanto es su donación?" name='cantidad' required min='1' id='cantidad'>
                            </div>

                            <div class="boxInput">
                                <select name="valor" required id='unidades'>
                                    <!-- <option disabled selected>Medición</option> -->
                                    <option>Unidades Ejm: Pesos, libras, gramos etc.</option>
                                    <option value="libras">Lb/Libras</option>
                                    <option value="unidades">Unidades</option>
                                    <option value="pesos">$/Pesos</option>
                                </select>
                            </div>

                            <div class="boxInput">
                                <label for="fotoComprobante" class="btn_cafe btn_largo" style='display: block'>Agregar foto de comprobante:</label>
                                <input style='display: none' type="file" name="fotoComprobante" id="fotoComprobante">
                            </div>

                            <!-- <div id="imagesBox">
                                    <h3 style="margin-left:15px;">Imagenes agregadas:</h3>
                                    <div id="messageError"></div>
                            </div> -->
                    
                            <!-- <div class="boxInput">
                                <textarea name="mensajeDonacion" placeholder="Si tienes algo que decirnos escribelo aquí" rows="4"></textarea>
                            </div> -->

                            <div class="boxInput">
                                <input type="submit" value="Registrar donación">
                            </div>

                        </form>

                        <script src="publico/js/ajax/donacionesAjax.js"></script>
                    </div>

                    <div class="col-ms-6">

                        <!-- ALIMENTOS -->
                        <div class="tabBox">

                            <strong>¿Por qué donar alimento?</strong>

                            <p>La fundación resguarda animalitos en estado de calle, y mientras estos no sean adoptados, la fundación se esmera por mejorar su estadía trantando de brindar la mejor aimientación, cualquier aporte de tu parte ayudaría a la mejor alimentación de las mascotas resguardadas en la fundación.</p>
                            <br><br>
                            <p>Puedes envíar el cuido a la dirección: 
                            cll 43 # 90 A 47 que se ubica en el barrio Robledo </p>
                            
                        </div>

                        <!-- MEDICAMENTOS -->

                        <div class="tabBox">
                            
                        </div>

                        <!-- DINERO -->

                        <div class="tabBox">

                            <strong>¿Por qué donar dinero?</strong>

                            <p>muchas de las mascotas resguardadas en la fundación están enfermas, lesionadas o provienen con problemas de alimentación, con el dinero recaudado la fundación puede comprar medicamentos, contratar veterinarios, comprar cuido y dar la mejor atención a los animalitos.</p>
                            <br>
                            <strong>¿Cuánto podrías donar?</strong>

                            <div class="row">
                                <a target='_blank' class='btn_cafe btn_don' href="https://biz.payulatam.com/L0ca57a1E3AD611">10.000$</a> 
                                <a target='_blank' class='btn_cafe btn_don' href="https://biz.payulatam.com/L0ca57a705D54D9">20.000$</a> 
                                <a target='_blank' class='btn_cafe btn_don' href="https://biz.payulatam.com/L0ca57a7B4A2A1B">50.000$</a> 
                                <a target='_blank' class='btn_cafe btn_don' href="https://biz.payulatam.com/L0ca57aC8D6380B">100.000$</a>
                            </div>
                            
                        </div>
                    </div>
                </div>

               
            </div>
        </div>

    </div>
    

      
    

</section> 

<script>
tabsUser();
function tabsUser(){
    var tabButtons = classNames('tabsItemUser');
    var tabs = classNames('tabBox');

    var indic = 0;

    for(let i = 0; i < tabButtons.length; i++){

        tabs[i].style.display = 'none';

        tabButtons[i].addEventListener('click', function(){
        for(let e = 0; e < tabButtons.length; e++){
            tabs[e].style.display = 'none';
            tabButtons[e].classList.remove('tabSelection');
        }

            indic = i;
            tabs[indic].style.display = 'block';
            tabButtons[indic].classList.add('tabSelection');

            if(indic == 0){
                id('t-don').textContent = 'Alimento';
            }else if(indic == 1){
                id('t-don').textContent = 'Medicamentos';
            }else{
                id('t-don').textContent = 'Dinero';
            }

        });


    }

    tabs[indic].style.display = "block";
    tabButtons[indic].classList.add('tabSelection');


}

</script>

<script src="publico/js/shadowMenuBlanco.js"></script>