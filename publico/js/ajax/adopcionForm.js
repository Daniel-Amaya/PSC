(function(){

    id('formAdopcion').addEventListener('submit', (e) =>{

        e.preventDefault();

        // id('acepto').checked

        /////////////////// Validar que se llene la info de la persona /////////////////////////

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
            
            /////////////////// Todas las preguntas /////////////////////////

            for(let i = 1; i < 27; i++){

                var preguntas = document.getElementsByName(i);

                /////////////////// Pregunta de un solo campo /////////////////////////

                if(preguntas.length == 1){

                    if(preguntas[0].value != ""){

                        datos.append(i, preguntas[0].value);

                        if(id('db'+i) && id('db'+i).value != ""){

                            datos.append('db'+i, id('db'+i).value);
                            preguntas[0].style.borderColor = 'black';

                        }
                    }else{
                        preguntas[0].style.borderColor = 'red';
                        window.scrollTo(0, preguntas[0].parentNode.offsetTop-200);
                        console.log(preguntas[0]);
                    }
                }else{

                    /////////////////// Pregunta de seleccionar varios /////////////////////////
                    if(i == 22){

                        var seleccionados = [];

                        for(let r = 0; r < preguntas.length; r++){
                            seleccionados.push(preguntas[r].checked); 
                        }

                        datos.append(i, seleccionados);

                    }else{
                    
                        /////////////////// Pregunta de si o no /////////////////////////

                        if(preguntas[0].checked){

                            datos.append(i, preguntas[0].value);
                            id('pregSN'+i).style.borderColor = 'red';

                        }else if(preguntas[1].checked){

                            datos.append(i, preguntas[1].value);
                            id('pregSN'+i).style.borderColor = 'red';

                        }else{
                            id('pregSN'+i).style.borderColor = 'red';
                            window.scrollTo(0, id('pregSN'+i).parentNode.offsetTop-400);
                        }

                        if(id('db'+i) && id('db'+i).value != ""){

                            datos.append('db'+i, id('db'+i).value);

                        }
                    }
                }
            }

            /////////////////// Verificar firma /////////////////////////
            
            if(id('firma').files.length > 0){

                datos.append('firma', id('firma').files[0]);
                
            }

            /////////////////// Verificar PDF cédula /////////////////////////

            if(id('cedula').files.length > 0){
                datos.append('cedula', id('cedula').files[0]);
            }

            if(verificarNoVacio(datos) == true){

                ht = new XMLHttpRequest;

                ht.addEventListener('readystatechange', function(){
                    
                    if(this.readyState == 4 && this.status == 200){
                        console.log(this.responseText + " " + this.responseText.length);
                        if(this.responseText.length == 27){

                            id('modal').style.display = 'block';
                            classNames('mensajeForm')[0].textContent = 'Se han enviado las respuestas exitosamente, cuando la fundación agregue su firma, podrás ir por la mascota a la fundación';

                            classNames('flex-modal')[0].addEventListener('click', () =>{
                                window.location = 'index.php';
                            });

                        }else{

                            alertAction("No ha sido posible enviar las respuestas", 'red');

                        }

                    }
                    
                });

                ht.open('POST', 'controlador/ajax/respuestasAdopcionAjax.php');
                ht.send(datos);

                ht.addEventListener('progress', (e) =>{
                    let porcentaje = Math.round((e.loaded / e.total) * 100);
                    id('loadAjax').style.display = 'flex';
                    id('porcentajeCarga').textContent = porcentaje + '%';
                    console.log(porcentaje);
                }); 
                
                ht.addEventListener('load', () => {
                    id('loadAjax').style.display = 'none';
                });

            }else{
                alertAction('Hay preguntas vacías, verifica que campos no llenaste', 'red');
            }

        }else{
            alertAction('No has llenado algún campo de información personal', 'red');
            window.scrollTo(0, 0);

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