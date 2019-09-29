<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="publico/js/jquery.min.js"></script>
<script src="publico/js/moment.min.js"></script>
<script src="publico/js/fullcalendar.min.js"></script>
<script src="publico/js/es.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<section class='margin-menu padding-menu'>
        <div class="container">
                <div class="row">
                        <div class="col"></div>
                        <div class="col-7"> <div id='calendar'></div></div>
                        <div class="col"></div>
                </div>
        </div>


</section>

<script>
        $(document).ready(function() {

                $('#calendar').fullCalendar({
                        header:{
                             left:'today,prev,next',
                             center:'title',
                             right:'month, basicWeek, basicDay, agendaWeek, agendaDay '  
                        },
                        dayClick:function(date,jsEvent,view){
                                $('#txtFecha').val(date.format());
                                $("#modalEventos").modal();
                        },
                    
                   

                        events:'modelo/eventos.php',

                        eventClick:function(calEvent,jsEvent,view){
                                $('#tituloEvento').html(calEvent.title);

                                $('#txtDescripcion').val(calEvent.descripcion);
                                $('#txtId').val(calEvent.id);
                                $('#txtTitulo').val(calEvent.title);
                                $('#txtColor').val(calEvent.color);

                                FechaHora= calEvent.start._i.split(" ");
                                $('#txtFecha').val(FechaHora[0]);
                                $('#txtHora').val(FechaHora[1]);

                                $('#modalEventos').modal();
                        }
                      

                });

                
        });


</script>



 <!-- Modal alternativo (agregar,modificar,eliminar) -->
<div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="descripcionEvento"></div>
        Id: <input type="text" id="txtId" name="txtId"/><br/>
        Fecha: <input type="text" id="txtFecha" name="txtFecha"/><br/>
        Hora: <input type="text" id="txtHora" name="txtHora" value="10:30"/><br/>
        Título: <input type="text" id="txtTitulo" name="txtTitulo"/><br/>  
        Descripción: <textarea id="txtDescripcion" name="txtDescripcion" rows="3"></textarea>
        Color: <input type="color" id="txtColor" name="txtColor" value="#ff0000"/><br/>

      </div>
      <div class="modal-footer">
        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-success">Modificar</button>
        <button type="button" class="btn btn-danger">Borrar</button>
        <button type="button" class="btn btn-default"data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script>

var nuevoEvento;

$('#btnAgregar').click(function(){
        RecolectarDatosGUI();
        EnviarInformacion('agregar',nuevoEvento);

});

function RecolectarDatosGUI(){
        var nuevoEvento= {
                id:$('#txtId').val(),
                title:$('#txtTitulo').val(),
                start:$('#txtFecha').val()+" "+$('#txtHora').val(),
                color:$('#txtColor').val(),
                descripcion:$('#txtDescripcion').val(),
                textColor:"#FFFFFF",
                end:$('#txtFecha').val()+" "+$('#txtHora').val()
        };
}

function EnviarInformacion(accion,objEvento){
        $.ajax({
                type:'POST',
                url:'modelo/eventos.php?accion='+accion,
                data:objEvento,
                succes:function(msg){
                        if(msg){
                                $('#calendar').fullCalendar('refetchEvents');
                                $("#modalEventos").modal('toggle');
                        }
                },
                error:function(){
                        alert("hay un error...");
                }
        });
}

</script>