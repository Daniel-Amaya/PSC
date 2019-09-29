id('firma').addEventListener('change', function(){
    
    let imagen = this.files;

    if(imagen.length > 0){
        
        if(validarExtension(imagen[0])){

            let img = document.createElement('img');
            img.src = window.URL.createObjectURL(imagen[0]);
            id('lugarFirma').innerHTML = '';
            id('lugarFirma').appendChild(img);

        }else{

            id('lugarFirma').innerHTML = 'El archivo seleccionado no admitido';

        }
    }else{

        id('lugarFirma').innerHTML = 'No se ha seleccionado ninguna imagen';

    }

});

validarExtension = (file) => {

    extensiones = ['image/jpg', 'image/png', 'image/jpeg'];

    for(let i = 0; i < extensiones.length; i++){

        if(file.type === extensiones[i]){
            return true;
        }
        
    } 

    return false;
}