
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



