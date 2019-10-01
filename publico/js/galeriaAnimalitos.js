
    galeriaAnimalitos = () => {

        var images = id('fotos').getElementsByTagName('img');

        var galeria = document.createElement('div');
        galeria.className = 'galeriaModal';
        
        for(let i = 0; i < images.length; i++){
            
            var galeriaItem = document.createElement('img');
            galeriaItem.src = images[i].src;
            galeriaItem.style.display = 'none';
            galeria.appendChild(galeriaItem);

            images[i].addEventListener('click', () => {
                galeria.getElementsByTagName('img')[i].style.display = "block";
                galeria.style.display = "block";

            });
        }

        // var controlRight = document.createElement('i'); controlRight.className = 'fas fa-arrow-right';
        // var controlleft = document.createElement('i'); controlleft.className = 'fas fa-arrow-left';

        document.addEventListener('click', (e) =>{
            if(e.target == galeria){
                galeria.style.display = "none";
                let imgs = galeria.getElementsByTagName('img');
                for(let e = 0; e < imgs.length; e++){
                    imgs[e].style.display = 'none';
                }
            }
        });

        document.body.appendChild(galeria);

    }

    galeriaAnimalitos();