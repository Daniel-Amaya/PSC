let modal = document.getElementById('miModal');
let flex = document.getElementById('flex-modal');
let abrir = document.getElementById('abrir-modal');
let cerrar = document.getElementById('close-modal');


if(abrir){

    abrir.addEventListener('click',function(){
        modal.style.display = 'block';
    });
}

if(cerrar){
    cerrar.addEventListener('click',function(){
        modal.style.display = 'none';
    });
}

// window.addEventListener('click',function(e){
//     if(e.target == flex){
//         modal.style.display = 'none';
//     }
// });


function nuevaModal(){
    
    let modal = id('modal');
    let flex = id('flex-modal');
    if(modal.style.display = 'none'){
        modal.style.display = 'block';
    }else{
        modal.style.display = 'none';
    }

    window.addEventListener('click', function(e){
        if(e.target == flex){
            modal.style.display = 'none';
        }
    });

}
