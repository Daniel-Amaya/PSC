id('crearUsuario').addEventListener('submit', function(e){
    e.preventDefault();

   var nombreV = this.getElementsByTagName('input')[0], 
   apellidosV = this.getElementsByTagName('input')[1],
   correoV = this.getElementsByTagName('input')[2],
   telefonoV = this.getElementsByTagName('input')[3],
   cedulaV = this.getElementsByTagName('input')[4],
   passwordV = this.getElementsByTagName('input')[5],
   fotoV = this.getElementsByTagName('input')[6];

   if(nombreV.value == ""){
        nombreV.style.borderColor = 'red';
    }else{
        nombreV.style.borderColor = 'grey';
    }

    if(apellidosV.value == ""){
        apellidosV.style.borderColor = 'red';
    }else{
        apellidosV.style.borderColor = 'grey';
    }

    if(correoV.value == ""){
        correoV.style.borderColor = 'red';
    }else{
        correoV.style.borderColor = 'grey';
    }

    if(telefonoV.value == ""){
        telefonoV.style.borderColor = 'red';
    }else{
        telefonoV.style.borderColor = 'grey';
    }

    if(cedulaV.value == ""){
        cedulaV.style.borderColor = 'red';
    }else{
        cedulaV.style.borderColor = 'grey';
    }

    if(passwordV.value == ""){
        passwordV.style.borderColor = 'red';
    }else{
        passwordV.style.borderColor = 'grey';
    }

});