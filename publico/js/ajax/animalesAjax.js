document.addEventListener('DOMLoadedContent', animalesAjax('', mostrarEliminarAnimalito));

function animalesAjax(send, action){
    
    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            action(this);
        }
    });

    ht.open('POST','controlador/ajax/animalitosAjax.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); 
    ht.send(send);

    ht.addEventListener('progress', (e) =>{
        let porcentaje = Math.round((e.loaded / e.total) * 100);
        id('loadAjax').style.display = 'flex';
        id('porcentajeCarga').textContent = porcentaje + '%';
        id('mostrarAnimalitos').innerHTML = 'espera';
        console.log(porcentaje);
    }); 

    ht.addEventListener('load', () => {
        id('loadAjax').style.display = 'none';
    });


}

// Función para eliminar y mostrar los datos de los perritos

function mostrarEliminarAnimalito(ht){
    id('mostrarAnimalitos').innerHTML = ht.responseText;
}

// Funcion para enviar datos del registro

function formRegistrarAnimalito(ht){
    var e = JSON.parse(ht.responseText);
    if(e[1] == true){

        id('idAnimalitoVacunas').value = e[0];
        
        // Llevar al formulario siguiente
        classNames('fielNewAnimalito')[0].style.display = "none";
        classNames('form_2')[0].style.display = "block";
        
        let formFotos = id('formImages');
        formFotos.addEventListener('submit', function(e){
            e.preventDefault();
            classNames('form_2')[0].style.display = "none";
            classNames('form_3')[0].style.display = "block";

        });

        // Enviar foto seleccionada
        let inputFile = id('nuevaFoto');
        inputFile.addEventListener('change', function(){
            if(this.files.length > 0){
                var numberImages = id('imagesBox').getElementsByClassName('divImageS');
                if(numberImages.length == 1){
                    fotosAjaxN(e[2], 1);
                }else{
                    fotosAjaxN(e[2], 0);
                }
            }
        });
        
    }
}

// Función enviar vacunas seleccionadas 

id('agregarVacunas').addEventListener('submit', function(e){
    e.preventDefault();

    let codsVacunas = [];
    var idAnimalito = id('idAnimalitoVacunas').value;
    var vacunasSeleccionadas = this.getElementsByTagName('input');
    for(let i = 1; i < vacunasSeleccionadas.length; i++){
        if(vacunasSeleccionadas[i].checked){
            codsVacunas.push(vacunasSeleccionadas[i].value);
        }
    }

    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            e = this.responseText;
            if(e[0] != ""){
                window.location = 'animalitos.php';
            }else if(e[0] == ""){
                window.location = 'animalitos.php';
            }
        }
    });

    console.log(codsVacunas);

    ht.open('POST','controlador/ajax/VacunasAnimalesAjax.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send('codsVacunas='+codsVacunas+"&idAnimal="+idAnimalito);
    
    ht.addEventListener('progress', (e) =>{
        let porcentaje = Math.round((e.loaded / e.total) * 100);
        id('loadAjax').style.display = 'flex';
        id('porcentajeCarga').textContent = porcentaje + '%';
        console.log(porcentaje);
    }); 

    ht.addEventListener('load', () => {
        id('loadAjax').style.display = 'none';
    });
    
    
});


// Función para enviar foto seleccionada 

function fotosAjaxN(folder, perfil){
    let inputFile = id('nuevaFoto');
    
    fData = new FormData;
    fData.append('perfil', perfil);
    fData.append('carpeta', folder);
    fData.append('foto', inputFile.files[0]);

    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            var e = this.responseText;
        }
    });

    ht.open('POST','controlador/ajax/fotosAjax.php');
    ht.send(fData);

    ht.addEventListener('progress', (e) =>{
        let porcentaje = Math.round((e.loaded / e.total) * 100);
        id('loadAjax').style.display = 'flex';
        id('porcentajeCarga').textContent = porcentaje + '%';
        console.log(porcentaje);
    }); 

    ht.addEventListener('load', () => {
        id('loadAjax').style.display = 'none';
    });
}

// Buscar según el fitro 

id('buscarAnimalitos').addEventListener('submit', function(e){

    e.preventDefault();

    var nombreB = this.getElementsByTagName('input')[0].value,
    especieB = this.getElementsByTagName('select')[0].value,
    razaB = this.getElementsByTagName('input')[1].value,
    colorB = this.getElementsByTagName('input')[2].value,
    sexoB  = this.getElementsByTagName('select')[1].value;

    animalesAjax("buscar=true&nombreB="+nombreB+"&especieB="+especieB+"&razaB="+razaB+"&colorB="+colorB+"&sexoB="+sexoB, mostrarEliminarAnimalito);
});

// Agregar nuevo animalito

id('newAnimalito').addEventListener('submit', function(e){
    e.preventDefault();

    var nombreAn = this.getElementsByTagName('input')[0].value,
    especieAn = this.getElementsByTagName('select')[0].value,
    razaAn = this.getElementsByTagName('input')[1].value,
    colorAn = this.getElementsByTagName('input')[2].value,
    sexoAn = this.getElementsByTagName('select')[1].value,
    edadAn = this.getElementsByTagName('input')[3].value,
    descripAn = this.getElementsByTagName('textarea')[0].value,
    procedAn = this.getElementsByTagName('input')[6].value,
    esterAn = document.getElementsByName('esterilizado');


    if(nombreAn != "" && especieAn != "" && razaAn != "" && colorAn != "" && sexoAn != "" && edadAn != "" && descripAn != "" && procedAn != ""){

        if(esterAn[0].checked){

            animalesAjax('nombreAn='+nombreAn+"&especie="+especieAn+"&raza="+razaAn+"&color="+colorAn+"&esterilizado=1"+"&sexo="+sexoAn+"&edad="+edadAn+"&descripcion="+descripAn+"&procedencia="+procedAn, formRegistrarAnimalito);

        }else{

            animalesAjax('nombreAn='+nombreAn+"&especie="+especieAn+"&raza="+razaAn+"&color="+colorAn+"&esterilizado=0"+"&sexo="+sexoAn+"&edad="+edadAn+"&descripcion="+descripAn+"&procedencia="+procedAn, formRegistrarAnimalito);

        }

        id('nom').textContent = nombreAn;
        id('esp').textContent = especieAn;
        id('raz').textContent = razaAn;
        id('col').textContent = colorAn;
        id('pro').textContent = procedAn;

        id('nom2').textContent = nombreAn;
        id('esp2').textContent = especieAn;
        id('raz2').textContent = razaAn;
        id('col2').textContent = colorAn;
        id('pro2').textContent = procedAn;
        id('espVacu').textContent = especieAn;
        if(sexoAn == "F"){
            id('gen2').textContent = "Femenino";
            id('gen').textContent = "Femenino";
        }else{
            id('gen2').textContent = "Masculino";
            id('gen').textContent = "Masculino";
        }

        for(let r = 0; r < classNames('nombreMascota').length; r++){
            classNames('nombreMascota')[r].textContent = nombreAn;
        }

    }

});

// Confirmar la eliminación de un animalito

function eliminarComfirm(data){

    // Creando ventana modal
    let modal = document.createElement('div'); modal.className = "modal"; modal.style.display = "block";
    let contentModal = document.createElement('div'); contentModal.className = "contenido-modal";
    contentModal.setAttribute('style', 'width: 40%; padding: 40px');

    // Creando parte flex de la ventana modal
    let flexModal = document.createElement('div'); flexModal.className = "flex-modal"; 
    window.addEventListener('click',function(e){
        if(e.target == flexModal){
            modal.remove();
        }
    });

    // Creando header de la ventana modal

    let headerModal = document.createElement('h2'); headerModal.className = "center";
    headerModal.textContent = "Confirmar eliminación de un perrito";

    // Creando body y botones de la ventana modal
    let bodyModal = document.createElement('div'); bodyModal.className = "modal-body";
    bodyModal.textContent = "¿Está seguro de que desea eliminar el animalito? No es posible revertir esta acción";
    let btnAceptar = document.createElement('button'); btnAceptar.className = "btn_rojo btn_largo"; btnAceptar.textContent = "Eliminar";
    let btnCancelar = document.createElement('button'); btnCancelar.className = "btn_naranja btn_largo"; btnCancelar.textContent = "Cancelar";
    btnAceptar.setAttribute('style', 'margin: 10px');
    btnCancelar.setAttribute('style', 'margin: 10px');

    // añadiendo eventos a los botones de la ventana modal
    btnAceptar.addEventListener('click', function(){
        animalesAjax("eliminar="+data[0]+"&folder="+data[1], mostrarEliminarAnimalito);
        modal.remove();

    });

    btnCancelar.addEventListener('click', function(){
        modal.remove();
    });

    bodyModal.appendChild(btnAceptar);
    bodyModal.appendChild(btnCancelar);

    contentModal.appendChild(headerModal);
    contentModal.appendChild(bodyModal);

    flexModal.appendChild(contentModal);
    modal.appendChild(flexModal);

    document.body.appendChild(modal);

}

// Editar datos del animalito

function editarAnimalito(){

    let editarForm = id('editAnimalito');
    editarForm.addEventListener('submit', function(e){
        e.preventDefault();
        var nombreE = this.getElementsByTagName('input')[0].value,
        especieE = this.getElementsByTagName('select')[0].value,
        razaE = this.getElementsByTagName('input')[1].value,
        colorE = this.getElementsByTagName('input')[2].value,
        sexoE = this.getElementsByTagName('select')[1].value,
        edadE = this.getElementsByTagName('input')[3].value,
        descripE = this.getElementsByTagName('textarea')[0].value,
        procedE = this.getElementsByTagName('input')[6].value,
        idE = id('idE').value;
        esterE = document.getElementsByName('esterilizadoE');
        
        if(nombreE != "" && especieE != "" && razaE != "" && colorE != "" && sexoE != "" && edadE != "" && descripE != "" && procedE != "" && idE != ""){

            if(esterE[0].checked){

                animalesAjax('nombreE='+nombreE+"&especieE="+especieE+"&razaE="+razaE+"&colorE="+colorE+"&esterilizadoE=1"+"&sexoE="+sexoE+"&edadE="+edadE+"&descripcionE="+descripE+"&procedenciaE="+procedE+"&idE="+idE, function(ht){
                    let e = ht.responseText;
                    e = e.split('%%', 2);
                    
                    if(e[0] == "1"){
                        // Creando ventana modal
                        let modal = document.createElement('div'); modal.className = "modal"; modal.style.display = "block";
                        let contentModal = document.createElement('div'); contentModal.className = "contenido-modal";

                        // Creando parte flex de la ventana modal
                        let flexModal = document.createElement('div'); flexModal.className = "flex-modal"; 
                        window.addEventListener('click',function(e){
                            if(e.target == flexModal){
                                window.location = "adoptar.php";
                            }
                        });

                        // Creando header de la ventana modal

                        let headerModal = document.createElement('div'); headerModal.className = "modal-header";
                        headerModal.textContent = "Confirmar eliminación de un perrito";

                        // Creando body y botones de la ventana modal
                        let bodyModal = document.createElement('div'); bodyModal.className = "modal-body";
                        bodyModal.textContent = "Los datos del animalito han sido actualizados";
                        let btnAceptar = document.createElement('button'); btnAceptar.className = "btn_naranja"; btnAceptar.textContent = "Aceptar";

                        // añadiendo eventos a los botones de la ventana modal
                        btnAceptar.addEventListener('click', function(){
                            window.location = "adoptar.php";                            
                        });

                        bodyModal.appendChild(btnAceptar);

                        contentModal.appendChild(headerModal);
                        contentModal.appendChild(bodyModal);

                        flexModal.appendChild(contentModal);
                        modal.appendChild(flexModal);

                        document.body.appendChild(modal);
                    }else{
                        alert("No es posible actualizar los datos del animalito");
                    }
                });

            }else{

                animalesAjax('nombreE='+nombreE+"&especieE="+especieE+"&razaE="+razaE+"&colorE="+colorE+"&esterilizadoE=0"+"&sexoE="+sexoE+"&edadE="+edadE+"&descripcionE="+descripE+"&procedenciaE="+procedE+"&idE="+idE, function(ht){
                    let e = ht.responseText;
                    e = e.split('%%', 2);
                    
                    if(e[0] == "1"){
                        // Creando ventana modal
                        let modal = document.createElement('div'); modal.className = "modal"; modal.style.display = "block";
                        let contentModal = document.createElement('div'); contentModal.className = "contenido-modal";

                        // Creando parte flex de la ventana modal
                        let flexModal = document.createElement('div'); flexModal.className = "flex-modal"; 
                        window.addEventListener('click',function(e){
                            if(e.target == flexModal){
                                window.location = "adoptar.php";
                            }
                        });

                        // Creando header de la ventana modal

                        let headerModal = document.createElement('div'); headerModal.className = "modal-header";
                        headerModal.textContent = "Confirmar eliminación de un perrito";

                        // Creando body y botones de la ventana modal
                        let bodyModal = document.createElement('div'); bodyModal.className = "modal-body";
                        bodyModal.textContent = "Los datos del animalito han sido actualizados";
                        let btnAceptar = document.createElement('button'); btnAceptar.className = "btn_naranja"; btnAceptar.textContent = "Aceptar";

                        // añadiendo eventos a los botones de la ventana modal
                        btnAceptar.addEventListener('click', function(){
                            window.location = "adoptar.php";                            
                        });

                        bodyModal.appendChild(btnAceptar);

                        contentModal.appendChild(headerModal);
                        contentModal.appendChild(bodyModal);

                        flexModal.appendChild(contentModal);
                        modal.appendChild(flexModal);

                        document.body.appendChild(modal);
                    }else{
                        alert("No es posible actualizar los datos del animalito");
                    }
                });

            }
        }
    });
}
