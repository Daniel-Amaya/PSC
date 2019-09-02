
    var menuC = document.getElementsByTagName('nav')[0];
    var inicio = document.getElementsByClassName('inicio')[0];
    var logo = menuC.getElementsByTagName('img')[0];
    var links = menuC.getElementsByTagName('a');

    menuC.style.color = "white";
    for(let i = 0; i < links.length; i++){
        links[i].style.color = "white";
        links[i].classList = "rayita-blanca";
    }
    logo.style.height = "60px";
    menuC.style.background = color_principal;
    menuC.style.boxShadow = "0px 0px 10px black";

