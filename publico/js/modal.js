let modal = document.getElementById('miModal');
let flex = document.getElementById('flex-modal');
let abrir = document.getElementById('abrir-modal');
let cerrar = document.getElementById('close-modal');

window.addEventListener('click', function(e){

    var flex = classNames('flex-modal');

    for(let i = 0; i < flex.length; i++){
        if(e.target == flex[i]){
            flex[i].parentNode.style.display = 'none';
        }
    }
});

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

buscador = () => {

    id('buscador').style.display = 'block';
    let flex = id('buscador').getElementsByClassName('flex-modal')[0];

    window.addEventListener('click', function(e){
        if(e.target == flex){
            id('buscador').style.display = 'none';
        }
    });

    id('buscador').getElementsByTagName('form')[0].addEventListener('submit', (e) =>{
        e.preventDefault();

        id('buscador').style.display = 'none';
    });

}