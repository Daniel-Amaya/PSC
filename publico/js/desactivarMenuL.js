function menuL(){

    const menu= id('menuL');
    
    if(menu.style.left != "-100%"){
        menu.style.left='-100%';
        for(let i = 0; i < classNames('padding-menu').length; i++){
            classNames('padding-menu')[i].style.paddingLeft = "0";
        }
    }else{
        menu.style.left = '0';
        for(let i = 0; i < classNames('padding-menu').length; i++){
            classNames('padding-menu')[i].style.paddingLeft = "270px";
        }
    }
  
}