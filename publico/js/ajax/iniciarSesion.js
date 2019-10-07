id('iniciarSesion').addEventListener('submit', function(e){
    e.preventDefault();

    var correo = this.getElementsByTagName('input')[0].value,
    contrasena = this.getElementsByTagName('input')[1].value;

    var ht = new XMLHttpRequest;

    if(correo != "" && contrasena != ""){
        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
    
                let e = this.responseText;
    
                if(e == "1"){
                    window.location = 'index.php';
                }else{
                  
                    id('error').textContent = e;
                    
                }
            }
        });
    
        ht.open('POST', 'controlador/validar/iniciarSesion.php');
        ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
        ht.send("correo="+correo+"&contrasena="+contrasena);

        ht.addEventListener('progress', (e) =>{
            let porcentaje = Math.round((e.loaded / e.total) * 100);
            id('loadAjax').style.display = 'flex';
            id('porcentajeCarga').textContent = porcentaje + '%';
            console.log(porcentaje);
        }); 
    
        ht.addEventListener('load', () => {
            id('loadAjax').style.display = 'none';
        });
    }
    

});