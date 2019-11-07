(function(){

    document.addEventListener('DOMContentLoaded', () =>{

        ////////////////////////// Pregunta 2 //////////////////////////

        let p2 = document.getElementsByName('2');
        p2[1].addEventListener('change', function(){
            if(this.checked){
                id('db2').value = 'No aplica';
                id('db2').setAttribute('disabled', true);
                id('no3').setAttribute('checked', true);
                id('db3').value = 'No aplica';
                id('db3').setAttribute('disabled', true);

            }
        });

        p2[0].addEventListener('change', function(){
            if(this.checked){
                id('db2').value = '';
                id('db2').removeAttribute('disabled');
                id('no3').removeAttribute('checked');
                id('db3').value = '';
                id('db3').removeAttribute('disabled');

            }
        });

        ////////////////////////// Pregunta 4 //////////////////////////

        let p4 = document.getElementsByName('4');
        p4[1].addEventListener('change', function(){
            if(this.checked){
                id('db4').value = 'No aplica';
                id('db4').setAttribute('disabled', true);
                id('5').value = 'No aplica';
                id('5').setAttribute('disabled', true);
            }
        });

        p4[0].addEventListener('change', function(){
            if(this.checked){
                id('db4').value = '';
                id('db4').removeAttribute('disabled');
                id('5').value = '';
                id('5').removeAttribute('disabled');
            }
        });

        ////////////////////////// Pregunta 9 //////////////////////////

        let p9 = document.getElementsByName('9');
        p9[1].addEventListener('change', function(){
            if(this.checked){
                id('db9').value = 'No aplica';
                id('db9').setAttribute('disabled', true);
            }
        });

        p9[0].addEventListener('change', function(){
            if(this.checked){
                id('db9').value = '';
                id('db9').removeAttribute('disabled');
            }
        });

        ////////////////////////// Pregunta 24 //////////////////////////

        let p24 = document.getElementsByName('23');
        p24[1].addEventListener('change', function(){
            if(this.checked){
                id('24').value = 'No aplica';
                id('24').setAttribute('disabled', true);
                id('db24').setAttribute('disabled', true);
            }
        });

        p24[0].addEventListener('change', function(){
            if(this.checked){
                id('24').value = '';
                id('24').removeAttribute('disabled');
                id('db24').removeAttribute('disabled');
            }
        });

        
    });
})();