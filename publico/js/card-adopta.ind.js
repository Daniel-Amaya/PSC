    
var contenedor = document.getElementsByClassName('card-perrito');

function slider(){
    var images = contenedor[q].getElementsByTagName('img');

    for(let i = 0; i < images.length; i++){
        images[i].style.display = "none";
    }

    if(e >= images.length){
        e = 0;
    }

    images[e].style.display = "block";

    e++;

    setTimeout(slider, 5000);
}


function controlsS(i){
    var images = contenedor[i].getElementsByTagName('img');
    var controls = contenedor[i].getElementsByClassName('controls')[0];

    for(let i = 0; i < images.length; i++){
        let control = document.createElement('div');
        control.addEventListener('click', function(){
            images[i].style.display = "block";
            if(images[i-1]){
                images[i-1].style.display = "none";
            }
            if(images[i+1]){
                images[i+1].style.display = "none";
            }
        });
        
        controls.appendChild(control);
    }
    
}

for(let i = 0; i < contenedor.length; i++){
    var e = 0;
    controlsS(i);
    var q = i;
    slider();

}






