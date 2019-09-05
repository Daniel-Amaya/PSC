
document.addEventListener('DOMContentLoaded', function(e){
    var menuC = document.getElementsByTagName('nav')[0];
    var inicio = document.getElementsByClassName('inicio')[0];
    var logo = menuC.getElementsByTagName('img')[0];
    var links = menuC.getElementsByTagName('a');
        
        logo.style.height = "60px";
        menuC.style.background = "white";
        menuC.style.boxShadow = "0px 0px 10px black";

});
