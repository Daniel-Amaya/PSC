(function(){

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

    id('cedula').addEventListener('change', function(){
        if(this.files.length > 0){
            if(this.files[0].type == 'application/pdf'){
                id('lCed').textContent = 'Has agrergado el archivo '+this.files[0].name;
            }else{
                id('lCed').textContent = 'El archivo seleccionado no es válido ';
            }
        }else{
            id('lCed').textContent = 'No has seleccionado un archivo';
        }
    });

})();
