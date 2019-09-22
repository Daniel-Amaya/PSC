document.addEventListener('DOMContentLoaded', function(){
    
    var idAnimal = id('idAnimalitoVacunas').value;
    var checkboxs = id('agregarQuitarV').getElementsByTagName('input');

    for(let i = 0; i < checkboxs.length; i++){

        checkboxs[i].addEventListener('change', () => {
            
            if(checkboxs[i].checked == true){
                
                vacunasAnimales2Ajax('idAnimal='+idAnimal+"&codsVacunas="+checkboxs[i].value, mostrarCambios);
            }else{

                vacunasAnimales2Ajax('idAnimal='+idAnimal+"&elimVacuna="+checkboxs[i].value, mostrarCambios);
            }
            
        }); 
    }
});

function mostrarCambios(ht){

    e = ht.responseText;
    console.log(e);
}

function vacunasAnimales2Ajax(send, action){

    var ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            action(this);
        }
    });

    ht.open('POST', 'controlador/ajax/vacunasAnimalesAjax.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send(send);
}