document.body.style.overflowX = "hidden";

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
}

// Función para eliminar y mostrar los datos de los perritos

function mostrarEliminarAnimalito(ht){
    id('mostrarAnimalitos').innerHTML = ht.responseText;
}

// Funcion para enviar datos del registro

function formRegistrarAnimalito(ht){
    var e = JSON.parse(ht.responseText);
    if(e[1] == true){

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
                fotosAjaxN(e[2]);
            }
        });
        
    }
}

// Función para enviar foto seleccionada 

function fotosAjaxN(folder){
    let inputFile = id('nuevaFoto');
    
    fData = new FormData;
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
}

// Buscar según el fitro 

var formB = id('buscarAnimalitos');

formB.addEventListener('submit', function(e){
    e.preventDefault();

    var nombreB = this.getElementsByClassName('nombreAn')[0].value,
    especieB = this.getElementsByClassName('especie')[0].value,
    razaB = this.getElementsByClassName('raza')[0].value,
    colorB = this.getElementsByClassName('color')[0].value,
    sexoB  = this.getElementsByClassName('sexo')[0].value;

    animalesAjax("buscar=true&nombreB="+nombreB+"&especieB"+especieB+"&razaB="+razaB+"&colorB="+colorB+"&sexoB="+sexoB, mostrarEliminarAnimalito);
});

// Agregar nuevo animalito

var form = id('newAnimalito');

form.addEventListener('submit', function(e){
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
        if(sexoAn == "F"){
            id('gen').textContent = "Femenino";
        }else{
            id('gen').textContent = "Masculino";
        }
        id('pro').textContent = procedAn;
    }
    
});

// Confirmar la eliminación de un animalito

function eliminarComfirm(data){

    // Creando ventana modal
    let modal = document.createElement('div'); modal.className = "modal"; modal.style.display = "block";
    let contentModal = document.createElement('div'); contentModal.className = "contenido-modal";

    // Creando parte flex de la ventana modal
    let flexModal = document.createElement('div'); flexModal.className = "flex-modal"; 
    window.addEventListener('click',function(e){
        if(e.target == flexModal){
            modal.remove();
        }
    });

    // Creando header de la ventana modal

    let headerModal = document.createElement('div'); headerModal.className = "modal-header";
    headerModal.textContent = "Confirmar eliminación de un perrito";

    // Creando body y botones de la ventana modal
    let bodyModal = document.createElement('div'); bodyModal.className = "modal-body";
    bodyModal.textContent = "¿Está seguro de que desea eliminar el animalito? No es posible revertir esta acción";
    let btnAceptar = document.createElement('button'); btnAceptar.className = "btn_naranja"; btnAceptar.textContent = "Eliminar";
    let btnCancelar = document.createElement('button'); btnCancelar.className = "btn_naranja"; btnCancelar.textContent = "Cancelar";

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

        alert(edadE);

        

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
