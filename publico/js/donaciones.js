$(document).ready(function(){

    $("#insertar-donacion").submit(insertarDonacion)

    function insertarDonacion(evento){
        evento.preventDefault()
        var datos = new FormData ($("#insertar-donacion")[0])
        $("").html("<img src='publico/images/donaciones/nada.gif'>")
        $.ajax({
            url: 'modelo/donaciones/insertar-donacion.php',
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            success: function(datos){
                $("#respuesta").html(datos)
            }
        })
    }

})