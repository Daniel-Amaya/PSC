

    id('newAnimalito').addEventListener('submit', function(e) {
        e.preventDefault();

        var nombreV = this.getElementsByTagName('input')[0],
        especieV = this.getElementsByTagName('select')[0],
        razaV = this.getElementsByTagName('input')[1],
        colorV = this.getElementsByTagName('input')[2],
        sexoV = this.getElementsByTagName('select')[1],
        edadV = this.getElementsByTagName('input')[3],
        descripV = this.getElementsByTagName('textarea')[0],
        procedV = this.getElementsByTagName('input')[6],
        esterV = document.getElementsByName('esterilizado');


        if(nombreV.value == ""){
            nombreV.style.borderColor = 'red';
        }else{
            nombreV.style.borderColor = 'grey';
        }


        if(especieV.value == ""){
            especieV.style.borderColor = 'red';
        }else{
            especieV.style.borderColor = 'grey';
        }


        if(razaV.value == ""){
            razaV.style.borderColor = 'red';
        }else{
            razaV.style.borderColor = 'grey';
        }


        if(colorV.value == ""){
            colorV.style.borderColor = 'red';
        }else{
            colorV.style.borderColor = 'grey';
        }


        if(sexoV.value == ""){
            sexoV.style.borderColor = 'red';
        }else{
            sexoV.style.borderColor = 'grey';
        }


        if(edadV.value == ""){
            edadV.style.borderColor = 'red';
        }else{
            edadV.style.borderColor = 'grey';
        }

        
        if(descripV.value == ""){
            descripV.style.borderColor = 'red';
        }else{
            descripV.style.borderColor = 'grey';
        }


        if(procedV.value == ""){
            procedV.style.borderColor = 'red';
        }else{
            procedV.style.borderColor = 'grey';
        }
        

        if(!esterV[0].checked && !esterV[1].checked){
            this.getElementsByClassName('pregunta')[0].style.color = 'red';
        }else{
            this.getElementsByClassName('pregunta')[0].style.color = 'black';
        }

        
    });
