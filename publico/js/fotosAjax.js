
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
    alert(e);
    e = e.split('%%', 4);
    id('NF').textContent = e[2];
    id('galeriaCRUD').innerHTML = e[3];

    let inputFile = id('nFoto');
    inputFile.setAttribute('onchange', 'fotoNueva("'+e[1]+'",'+e[0]+')');
}

function eliminarFoto(ruta){
     
}

id('NFF').addEventListener('submit', function(e){
    e.preventDefault();
});


function fotoNueva(folder, idF){

    let inputFile = id('nFoto');
    
    // if(inputFile.files.length > 0){
        fotos = new FormData;
        fotos.append('carpetaN', folder);
        fotos.append('fotos', idF);
        fotos.append('fotoN', inputFile.files[0]);
        alert(fotos.fotos);
       return fotos;

    // }

    

}