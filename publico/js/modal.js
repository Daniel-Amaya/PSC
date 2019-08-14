let modal = document.getElementById('miModal');
let flex = document.getElementById('flex-modal');
let abrir = document.getElementById('abrir-modal');
let cerrar = document.getElementById('close-modal');

abrir.addEventListener('click',function(){
    modal.style.display = 'block'
});

cerrar.addEventListener('click',function(){
    modal.style.display = 'none'
});

window.addEventListener('click',function(e){
    if(e.target == flex){
        modal.style.display = 'none'
    }
});