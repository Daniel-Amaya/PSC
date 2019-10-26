function fotosAjax(send, action){
    
    ht = new XMLHttpRequest;

    ht.addEventListener('progress', (e) =>{
        let porcentaje = Math.round((e.loaded / e.total) * 100);
        id('loadAjax').style.display = 'flex';
        id('porcentajeCarga').textContent = porcentaje + '%';
        console.log(porcentaje);
    }); 

    ht.addEventListener('load', () => {
        
        id('loadAjax').style.display = 'none';
    });

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
    id('NF').textContent = " "+e[2];
    id('fotoPerfil').innerHTML = e[3];
    id('galeriaCRUD').innerHTML = e[4];

    let inputFile = id('nFoto');
    inputFile.setAttribute('onchange', 'fotoNueva("'+e[1]+'",'+e[0]+')');
}

function fotoNueva(folder, idF){

    let fileInput = id('nFoto');
    
    if(fileInput.files.length > 0){
        var datosEnviar = new FormData;
        datosEnviar.append('fotos', idF);
        datosEnviar.append('carpetaN', folder);
        datosEnviar.append('fotoN', fileInput.files[0]);
        
        ht = new XMLHttpRequest;

        ht.addEventListener('progress', (e) =>{
            let porcentaje = Math.round((e.loaded / e.total) * 100);
            id('loadAjax').style.display = 'flex';
            id('porcentajeCarga').textContent = porcentaje + '%';
            console.log(porcentaje);
        }); 
        ht.addEventListener('load', () => {
            
            id('loadAjax').style.display = 'none';
        });

        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                mostrarFotos(this);
            }
        });
    
        ht.open('POST','controlador/ajax/fotosAjax.php');
        ht.send(datosEnviar);
    }

}

document.addEventListener('DOMContentLoaded', () =>{

    if(id('aggF')){

        id('aggF').addEventListener('change', function(){
            file = id('aggF').files;

            if(file.length > 0){
                datosEnviar = new FormData;
                datosEnviar.append('carpetaNU', id('folder').value);
                datosEnviar.append('idA', id('idA').value);
                datosEnviar.append('fotoNU', file[0]);

                ht = new XMLHttpRequest;
                ht.addEventListener('readystatechange', function(){
                    if(this.readyState == 4 && this.status == 200){

                        if(this.responseText == 1){
                            let img = document.createElement('img');
                            img.src = window.URL.createObjectURL(file[0]);
                            id('fotos').appendChild(img);
                            alertAction('Se ha agregado la foto', color_principal);
                        }else{
                            console.log(ht.responseText);
                            alertAction('No se a agregado la foto', 'red');
                        }
                    }
                });
            
                ht.open('POST','controlador/ajax/fotosAjax.php');
                ht.send(datosEnviar);

            }else{
                return false;
            }
        });
    }

});
