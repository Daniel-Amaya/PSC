(function(){
mostrarImagenDePerfil = () =>{

    var inp = id('agregarFotoUsuario');

    inp.addEventListener('change', function(){

        var file = this.files;

        if(file.length == 0){
            id('FCR').textContent = "No se ha seleccionado ninguna imagen";
        }else{

            var newImage = document.createElement('img');
            newImage.src =  window.URL.createObjectURL(file[i]);
            id('FCR').innerHTML = '';
            id('FCR').appendChild(newImage);

        }
    });
}

mostrarImagenDePerfil();

})()