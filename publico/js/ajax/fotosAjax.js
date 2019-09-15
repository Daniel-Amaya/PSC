
function fotosAjax(send, action){
    
    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            action(this);
        }
    });

    ht.open('POST','controlador/ajax/fotosAjax.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send(send);
}

function mostrarFotos(ht){
    let e = ht.responseText;
    e = e.split('%%', 5);
    id('NF').textContent = e[2];
    id('fotoPerfil').innerHTML = e[3];
    id('galeriaCRUD').innerHTML = e[4];

    let inputFile = id('nFoto');
    inputFile.setAttribute('onchange', 'fotoNueva("'+e[1]+'",'+e[0]+')');
}

function eliminarFoto(ruta){
     
}


function fotoNueva(folder, idF){

    let fileInput = id('nFoto');
    
    if(fileInput.files.length > 0){
        var datosEnviar = new FormData;
        datosEnviar.append('fotos', idF);
        datosEnviar.append('carpetaN', folder);
        datosEnviar.append('fotoN', fileInput.files[0]);
        
        ht = new XMLHttpRequest;

        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                mostrarFotos(this);
            }
        });
    
        ht.open('POST','controlador/ajax/fotosAjax.php');
        ht.send(datosEnviar);
    }

}
