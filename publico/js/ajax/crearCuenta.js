id('crearUsuario').addEventListener('submit', function(e){
    e.preventDefault();

   var nombre = this.getElementsByTagName('input')[0].value, 
   apellidos = this.getElementsByTagName('input')[1].value,
   correo = this.getElementsByTagName('input')[2].value,
   telefono = this.getElementsByTagName('input')[3].value,
   cedula = this.getElementsByTagName('input')[4].value,
   password = this.getElementsByTagName('input')[5].value,
   foto = this.getElementsByTagName('input')[6];

    if(nombre != "" && apellidos != "" && correo != "" && telefono != "" && cedula != "" && password != ""){

       var formData = new FormData();
       
        formData.append('nombre', nombre);
        formData.append('apellidos', apellidos);
        formData.append('correo', correo);
        formData.append('telefono', telefono);
        formData.append('cedula', cedula);
        formData.append('password', password);
        formData.append('foto', foto.files[0]);
        
        var ht = new XMLHttpRequest;
        
        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                let e = this.responseText;
                console.log(e);
                if(e == "1"){
                    window.location = "index.php";
                }else{

                    let recibido = e.split('%%');

                    if(recibido.length > 1){
                        if(recibido[1] == "correo"){

                            id('crearUsuario').getElementsByClassName('error')[0].textContent = 'El correo ya está en uso, prueba otro';

                        }else{

                            id('crearUsuario').getElementsByClassName('error')[1].textContent = 'La cedula ingresada ya está registrada';

                        }
                    }
                }
            }
        });

        ht.addEventListener('progress', (e) =>{
            let porcentaje = Math.round((e.loaded / e.total) * 100);
            id('loadAjax').style.display = 'flex';
            id('porcentajeCarga').textContent = porcentaje + '%';
            console.log(porcentaje);
        }); 
    
        ht.addEventListener('load', () => {
            id('loadAjax').style.display = 'none';
        });

    ht.open('POST', 'controlador/ajax/usuariosAjax.php');
    ht.send(formData);
    
    }
});