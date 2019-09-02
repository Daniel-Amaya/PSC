// menú hamburgesa
function menu(){
    var menu = id('menu');
    menu.classList.toggle('menu-res');
   
    window.addEventListener('click', function(e){

        // cerrar menú si se hace click fuera
        if(
            e.target != menu && 
            e.target != menu.children[1].children[0] &&
            e.target != menu.children[1].children[1] &&
            e.target != menu.children[1].children[2] &&
            e.target != menu.children[1].children[3]

        ){
            menu.classList.remove('menu-res');
        }
        
    }, true);
    
}



