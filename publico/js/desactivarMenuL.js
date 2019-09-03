
const menu= id('menuL');

document.addEventListener('DOMContentLoaded', function(){
    document.getElementsByTagName('footer')[0].classList.add('padding-menu');

});
    
function menuL(){
        
    if(menu.style.left != "-100%"){
        menu.style.left='-100%';
        
        document.getElementsByTagName('footer')[0].classList.remove('padding-menu');
        for(let i = 0; i < classNames('padding-menu').length; i++){
            classNames('padding-menu')[i].style.paddingLeft = "0";
        }
    }else{
        menu.style.left = '0';
        for(let i = 0; i < classNames('padding-menu').length; i++){
            classNames('padding-menu')[i].style.paddingLeft = "280px";
        }
        document.getElementsByTagName('footer')[0].classList.add('padding-menu');

    }
    
}

 
function cambiarEstructura(nombre, botones){

    menu.getElementsByClassName('indicador')[0].textContent = nombre;
    let i = document.createElement('i');
    i.className = 'fas fa-angle-down';
    menu.getElementsByClassName('indicador')[0].appendChild(i);
    let navegador = id('navegador');
    navegador.classList.add('recojer-menu');

    menu.getElementsByClassName('indicador')[0].addEventListener('click', function(){

        let nuevosbtn = id('nuevosBotones');
        if(navegador.classList == 'recojer-menu'){
            nuevosbtn.classList.add('recojer-menu');
            navegador.classList.remove('recojer-menu');
        }else{
            nuevosbtn.classList.remove('recojer-menu');
            navegador.classList.add('recojer-menu');
        }

    });
    for(let i = 0; i < botones.length; i++){
        let li = document.createElement('li');
        let ahref = document.createElement('a');
        ahref.href = botones[i][0];
        ahref.className = botones[i][1];
        ahref.innerHTML = botones[i][2];
        li.appendChild(ahref);

        id('nuevosBotones').appendChild(li);
    }


}



