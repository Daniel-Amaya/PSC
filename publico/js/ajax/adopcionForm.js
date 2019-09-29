(function(){

    id('formAdopcion').addEventListener('submit', (e) =>{

        e.preventDefault();

        // id('acepto').checked

        if(
            id('idU').value != "" &&
            id('idA').value != "" &&
            id('codSoli').value != "" &&
            id('estadoCivil').value != "" &&
            id('nombreReferencia').value != "" &&
            id('telefonoReferencia').value != "" &&
            id('direccionApto').value != "" &&
            id('correo').value != ""
            
        ){

            var datos = new FormData;
            datos.append('idA', id('idA').value);
            datos.append('idU', id('idU').value);
            datos.append('codSoli', id('codSoli').value);
            datos.append('estadoCivil', id('estadoCivil').value);
            datos.append('nombreReferencia', id('nombreReferencia').value);
            datos.append('telefonoReferencia', id('telefonoReferencia').value);
            datos.append('direccionApto', id('direccionApto').value);
            datos.append('correo', id('correo').value);
            
            for(let i = 1; i < 27; i++){

                var preguntas = document.getElementsByName(i);

                if(preguntas.length == 1){

                    if(preguntas[0].value != ""){

                        datos.append(i, preguntas[0].value);

                            
                        if(id('db'+i) && id('db'+i).value != ""){

                            datos.append('db'+i, id('db'+i).value);

                        }

                    }
                }else{

                    if(i == 22){

                        var seleccionados = [];

                        for(let r = 0; r < preguntas.length; r++){
                
                                seleccionados.push(preguntas[r].checked); 

                        }

                        datos.append(i, seleccionados);

                    }else{
                    
                        if(preguntas[0].checked){

                            datos.append(i, preguntas[0].value);

                        }else if(preguntas[1].checked){

                            datos.append(i, preguntas[1].value);

                        } 

                        if(id('db'+i) && id('db'+i).value != ""){

                            datos.append('db'+i, id('db'+i).value);

                        }
                    }
                }

            }

            if(id('firma').files.length > 0){

                datos.append('firma', id('firma').files[0]);
                
            }


            if(verificarNoVacio(datos) == true){

                ht = new XMLHttpRequest;

                ht.addEventListener('readystatechange', function(){
                    
                    if(this.readyState == 4 && this.status == 200){

                        alert(this.responseText);
                        if(this.responseText == '1111111111111111111111111111'){

                            id('modal').style.display = 'block';
                            classNames('mensajeForm')[0].textContent = 'Se han enviado las respuestas exitosamente, cuando la fundación agregue su firma, podrás ir por la mascota a la fundación';

                            classNames('flex-modal').addEventListener('click', () =>{
                                window.location = 'index.php';
                            });

                        }else{

                            alert("alv mi papá");

                        }

                    }
                    
                });

                ht.open('POST', 'controlador/ajax/respuestasAdopcionAjax.php');
                ht.send(datos);
            }

        }
    });

    verificarNoVacio = (formData) =>{

        for(let i = 1; i <= 24; i++){

            if(!formData.get(i) || formData.get(i) == ""){
                return false;
            }

        }

        return true;

    }

})();