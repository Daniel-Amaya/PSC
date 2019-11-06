(function(){
    donacionesAjax = (send, action) =>{
        ht = new XMLHttpRequest;

        ht.addEventListener('progress', (e) =>{
            let porcentaje = Math.round((e.loaded / e.total) * 100);
            id('loadAjax').style.display = 'flex';
            id('porcentajeCarga').textContent = porcentaje + '%';
            console.log(porcentaje);
        }); 
    
        ht.addEventListener('load', () => {
            
            id('loadAjax').style.display = 'none';
        });
    
        ht.addEventListener('readystatechange', function(){
            if(this.readyState == 4 && this.status == 200){
                action(this);
            }
        });
    
        ht.open('POST','controlador/ajax/donacionesAjax.php');
        ht.send(send);
    }

    id('insertar-donacion').addEventListener('submit', (e) =>{

        e.preventDefault();

        let donacion = id('donacion').value;
        let cantidad = id('cantidad').value;
        let unidades = id('unidades').value;
        let comprobante = id('fotoComprobante').files;

        if(donacion != "" && cantidad != "" && unidades != "" && comprobante.length > 0){
            donaciones = new FormData;
            if(idUsuario){
                donaciones.append('idU', idUsuario);
            }
            donaciones.append('donacion', donacion);
            donaciones.append('cantidad', cantidad);
            donaciones.append('unidades', unidades);
            donaciones.append('compr', comprobante[0]);
            
            donacionesAjax(donaciones, (ht) =>{
                e = ht.responseText;
                if(e == 1){

                   id('mensajeDonar').textContent ="Se ha regristado la donación :3, gracias por aportar a la fundación en este gran labor, ya que cada que donas, estás mejorando la calidad de vida de los animalitos en estado de calle";

                   id('modal').style.display = 'block';

                }else{
                    alertAction('no ha sido posible registrar su donación :(, por favor intente de nuevo', 'red');
                }
            });
        }
    });
})();