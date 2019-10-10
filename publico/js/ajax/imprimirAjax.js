descargar = () =>{

    var e = id('imp').innerHTML;

    imprimirAjax('tables='+e, (ht) =>{
        console.log(ht.responseText);
    });

}

imprimirAjax = (send, action) =>{
     
    ht = new XMLHttpRequest;

    ht.addEventListener('readystatechange', function(){
        if(this.readyState == 4 && this.status == 200){
            action(this);
        }
    });

    ht.open('POST','controlador/ajax/imprimirAjax.php');
    ht.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); 
    ht.send(send);
}