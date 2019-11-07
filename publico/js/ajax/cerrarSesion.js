id('cerrarSesion').addEventListener('click', function(){
    
    var ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            let e = this.responseText;
            if(e == "cerrar"){
                window.location = "index.php";
            }
        }
    });

    ht.open('POST', 'controlador/validar/logout.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');    
    ht.send();

    loadAjax(ht);

});