var validar;

id('crearUsuario').addEventListener('submit', function(e){
    e.preventDefault();

    var inputs = this.getElementsByTagName('input');
    var telefonoV = this.getElementsByTagName('input')[3],
    cedulaV = this.getElementsByTagName('input')[4],
    passwordV = this.getElementsByTagName('input')[5];

    for(let i = 0; i < inputs.length-1; i++){
        if(inputs[i].value == ""){
            inputs[i].style.borderColor = 'red';
        }else{
            inputs[i].style.borderColor = 'grey';
        }
    }

    if(cedulaV.value.length < 10){
        cedulaV.style.borderColor = 'red';
        classNames('error')[2].textContent = 'La cédula no tiene la cantidad de dígitos requerida';
        validar = false;
    }else{
        cedulaV.style.borderColor = 'grey';
        classNames('error')[2].textContent = '';
        validar = true;

    }

    if(telefonoV.value.length < 6){
        telefonoV.style.borderColor = 'red';
        classNames('error')[1].textContent = 'La teléfono no tiene la cantidad de dígitos requerida';
        validar = false;

    }else{
        telefonoV.style.borderColor = 'grey';
        classNames('error')[1].textContent = '';
        validar = true;

    }



// if(nombreV.value == ""){
//         nombreV.style.borderColor = 'red';
//     }else{
//         nombreV.style.borderColor = 'grey';
//     }

//     if(apellidosV.value == ""){
//         apellidosV.style.borderColor = 'red';
//     }else{
//         apellidosV.style.borderColor = 'grey';
//     }

//     if(correoV.value == ""){
//         correoV.style.borderColor = 'red';
//     }else{
//         correoV.style.borderColor = 'grey';
//     }

//     if(telefonoV.value == ""){
//         telefonoV.style.borderColor = 'red';
//     }else{
//         telefonoV.style.borderColor = 'grey';
//     }

//     if(cedulaV.value == ""){
//         cedulaV.style.borderColor = 'red';
//     }else{
//         cedulaV.style.borderColor = 'grey';
//     }

//     if(passwordV.value == ""){
//         passwordV.style.borderColor = 'red';
//     }else{
//         passwordV.style.borderColor = 'grey';
//     }

});