document.body.style.overflowX = "hidden";

function animalesAjax(send){
    
    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            var e = JSON.parse(this.responseText);
            if(e[1] == true){

                // Llevar al formulario siguiente
                classNames('fielNewAnimalito')[0].style.display = "none";
                classNames('form_2')[0].style.display = "block";
                
                let formFotos = id('formImages');
                formFotos.addEventListener('submit', function(e){
                    e.preventDefault();
                    classNames('form_2')[0].style.display = "none";
                    classNames('form_3')[0].style.display = "block";

                });

                // Enviar foto seleccionada
                let inputFile = id('nuevaFoto');
                inputFile.addEventListener('change', function(){
                    if(this.files.length > 0){
                        fotosAjax(e[2]);
                    }
                });
                
            }
        }
    });

    ht.open('POST','controlador/animalesController.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send(send);
}

// Función para enviar foto seleccionada 

function fotosAjax(folder){
    let inputFile = id('nuevaFoto');
    
    fData = new FormData;
    fData.append('carpeta', folder);
    fData.append('foto', inputFile.files[0]);

    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            var e = this.responseText;
            console.log(e);
        }
    });

    ht.open('POST','controlador/fotosController.php');
    ht.send(fData);
}



var form = classNames('newAnimalito')[0];

form.addEventListener('submit', function(e){
    e.preventDefault();

    var nombreAn = this.getElementsByTagName('input')[0].value,
    especieAn = this.getElementsByTagName('select')[0].value,
    razaAn = this.getElementsByTagName('input')[1].value,
    colorAn = this.getElementsByTagName('input')[2].value,
    sexoAn = this.getElementsByTagName('select')[1].value,
    descripAn = this.getElementsByTagName('textarea')[0].value,
    procedAn = this.getElementsByTagName('input')[5].value,
    esterAn = document.getElementsByName('esterilizado');

    

    if(nombreAn != "" && especieAn != "" && razaAn != "" && colorAn != "" && sexoAn != "" && descripAn != "" && procedAn != ""){

        if(esterAn[0].checked){

            animalesAjax('nombreAn='+nombreAn+"&especie="+especieAn+"&raza="+razaAn+"&color="+colorAn+"&esterilizado=1"+"&sexo="+sexoAn+"&descripcion="+descripAn+"&procedencia="+procedAn);

        }else{

            animalesAjax('nombreAn='+nombreAn+"&especie="+especieAn+"&raza="+razaAn+"&color="+colorAn+"&esterilizado=0"+"&sexo="+sexoAn+"&descripcion="+descripAn+"&procedencia="+procedAn);

        }

        id('nom').textContent = nombreAn;
        id('esp').textContent = especieAn;
        id('raz').textContent = razaAn;
        id('col').textContent = colorAn;
        if(sexoAn == "F"){
            id('gen').textContent = "Femenino";
        }else{
            id('gen').textContent = "Masculino";
        }
        id('pro').textContent = procedAn;
    }
    
});