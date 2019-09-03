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
                if(e == "1"){
                    window.location = "index.php";
                }else{
                    alert('No se creo el usuario');
                }
            }
        });

    ht.open('POST', 'controlador/ajax/usuariosAjax.php');
    ht.send(formData);
    
    }
});