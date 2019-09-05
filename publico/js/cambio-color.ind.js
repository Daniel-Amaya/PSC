// Cambios de color de menú <<index>>
window.addEventListener('scroll', function(){
    var menuC = document.getElementsByTagName('nav')[0];
    var logo = menuC.getElementsByTagName('img')[0];
    var links = menuC.getElementsByTagName('a');
    var inicio = document.getElementsByClassName('inicio')[0];
    var adoptaind = document.getElementsByClassName('adopta-index')[0];
    var messagepa = document.getElementsByClassName('message')[0];
    var donaind = this.document.getElementsByClassName('dona-ind')[0];
    
    if(window.pageYOffset < menuC.scrollHeight){
        menuC.style.color = "black";
        for(let i = 0; i < links.length; i++){
            links[i].style.color = "black";
            links[i].classList = "rayita-naranja";
        }
        logo.style.height = "70px";
        menuC.style.background = "transparent";
        menuC.style.boxShadow = "0px 0px 0px black";

    }

    if(window.pageYOffset >= menuC.scrollHeight){
        logo.style.height = "60px";
        menuC.style.background = "rgba(255, 255, 255, 0.4)";
        menuC.style.boxShadow = "0px 0px 10px black";
    }

    if(window.pageYOffset >= inicio.scrollHeight-70){
        for(let i = 0; i < links.length; i++){
            links[i].style.color = "white";
            links[i].classList = "rayita-blanca";
        }
        menuC.style.color = "white";
        menuC.style.background = color_principal;
    }

    if(window.pageYOffset >= adoptaind.offsetTop){
        for(let i = 0; i < links.length; i++){
            links[i].style.color = "white";
            links[i].classList = "rayita-blanca";
        }
        menuC.style.color = "white";
        menuC.style.background = color_principal;
    }

    if(window.pageYOffset >= messagepa.offsetTop-200){
        for(let i = 0; i < links.length; i++){
            links[i].style.color = "black";
            links[i].classList = "rayita-naranja";
        }
        menuC.style.color = "black";
        menuC.style.background = 'white';
    }
    if(window.pageYOffset >= donaind.offsetTop-200){
        for(let i = 0; i < links.length; i++){
            links[i].style.color = "white";
            links[i].classList = "rayita-blanca";
        }
        menuC.style.color = "white";
        menuC.style.background = color_principal;
    }
});