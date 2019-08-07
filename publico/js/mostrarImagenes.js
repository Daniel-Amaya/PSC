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

                    let deleteImg = document.createElement('span');
                    deleteImg.className = "deleteImg fas fa-times";
                    deleteImg.addEventListener('click', function(){
                        imagesBox.removeChild(this.parentNode);
                        nombrarInputsDeFotos();

                    });

                    let inputFile = document.createElement('input');
                    inputFile.type = 'file';
                    inputFile.fileList = window.URL.createObjectURL(file[i]);
                    inputFile.style.display = "none";

                    var newImage = document.createElement('img');
                    newImage.src = inputFile.fileList; /* window.URL.createObjectURL(file[i]) */

                    divImage.appendChild(inputFile);
                    divImage.appendChild(newImage);
                    divImage.appendChild(deleteImg);
                    imagesBox.appendChild(divImage);

                    nombrarInputsDeFotos();

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

function nombrarInputsDeFotos(){
    let imgBox = id('imagesBox');
    inputsFiles = imgBox.getElementsByTagName('input');
    for(let i = 0; i < inputsFiles.length; i++){
        inputsFiles[i].name = "inputFile"+i;
    }
}