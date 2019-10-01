<?php
require_once('modelo/calendar/bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio</title>

    <!-- Bootstrap Core CSS -->
    <link href="publico/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='publico/css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
 
	#calendar {
		max-width: 70%;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>



</head>

<body>
<section class='margin-menu padding-menu'>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Calendario de eventos</h1>
                <p class="lead">¡Aquí podras ver los proximos eventos de la fundación!</p>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		
			
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="modelo/calendar/editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Titulo" readonly>
					</div>
                  </div>
                  <div class="form-group">
					<label for="" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
					  <input type="text" name="" class="form-control" id="" placeholder="Descripcion" readonly>
					</div>
				  </div>
				  <div class="form-group">
					
				
				 
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>

</section>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="publico/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="publico/js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='publico/js/moment.min.js'></script>
	<script src='publico/js/fullcalendar/fullcalendar.min.js'></script>
	<script src='publico/js/fullcalendar/fullcalendar.js'></script>
	<script src='publico/js/fullcalendar/locale/es.js'></script>
	
	
	<script>

	$(document).ready(function() {

		var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
		
		$('#calendar').fullCalendar({
			header: {
				 language: 'es',
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay',

			},
			defaultDate: yyyy+"-"+mm+"-"+dd,
			editable: false,
			eventLimit: false, // allow "more" link when too many events
			selectable: false,
			selectHelper: false,
		
			eventRender: function(event, element) {
				element.bind('click', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
		
			events: [
            <?php 
            foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
	});

</script>

</body>

</html>
