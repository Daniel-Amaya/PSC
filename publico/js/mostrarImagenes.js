function mostrarImagenesSeleccionadas(){
    
    var inputFile = id('nuevaFoto');
    var messageError = id('messageError');
    var newSpan = document.createElement('span');
    var imagesBox = id('imagesBox');

    inputFile.addEventListener('change', function(){

        var file = this.files;

        if(file.length == 0){
            newSpan.textContent = "No se ha seleccionado ninguna imagen";
        }else{

            for(let i = 0; i < file.length; i++){
                
                inputFile.fileList += file[i];
                if(validarTipoDeImagen(file[i])){
                    let divImage = document.createElement('div');
                    divImage.className = 'divImage';

                    var newImage = document.createElement('img');
                    newImage.src =  window.URL.createObjectURL(file[i]);

                    divImage.appendChild(newImage);
                    imagesBox.appendChild(divImage);

                }else{
                    newSpan.textContent = "El archivo seleccionado no corresponde a una imagen";
                }
            }
        }

        messageError.appendChild(newSpan);
    });
}



var fileTypes = [
    'image/jpeg',
    'image/pjpeg',
    'image/png'
]

function validarTipoDeImagen(file) {
    for(var i = 0; i < fileTypes.length; i++) {
    if(file.type === fileTypes[i]) {
        return true;
    }
    }

    return false;
}

mostrarImagenesSeleccionadas();
