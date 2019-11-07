
	<section class='margin-menu padding-menu'>
		<!-- Page Content -->
		<div class="container" style="width: 80%;">

			<div class="">
				<div class="center">
					<h1>Calendario de eventos</h1>
					<p class="lead">¡Programa aquí los proximos eventos de la fundación!</p>
				</div>
				<br>
				<div id="calendar">
				</div>
			</div>
			<!-- /.row -->




		</div>

	</section>


	<script src='publico/js/fullcalendar-4.3.1/packages/core/main.js'></script>
	<script src='publico/js/fullcalendar-4.3.1/packages/interaction/main.js'></script>
	<script src='publico/js/fullcalendar-4.3.1/packages/daygrid/main.js'></script>
	<script src='publico/js/fullcalendar-4.3.1/packages/timegrid/main.js'></script>
	<script src='publico/js/fullcalendar-4.3.1/packages/list/main.js'></script>
	<script src='publico/js/fullcalendar-4.3.1/packages/core/locales/es.js'></script>

	<script src="publico/js/ajax/eventosAjax.js"></script>


<!-- 
	<script>
		$(document).ready(function() {

			var date = new Date();
			var yyyy = date.getFullYear().toString();
			var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString();
			var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate()).toString();

			$('#calendar').fullCalendar({
				header: {
					language: 'es',
					left: 'prev,next today',
					center: 'title',
					right: 'month,basicWeek,basicDay',

				},
				defaultDate: yyyy + "-" + mm + "-" + dd,
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				selectable: true,
				selectHelper: true,
				select: function(start, end) {

					$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalAdd').modal('show');
				},
				eventRender: function(event, element) {
					element.bind('click', function() {
						$('#ModalEdit #id').val(event.id);
						$('#ModalEdit #title').val(event.title);
						$('#ModalEdit #color').val(event.color);
						$('#ModalEdit').modal('show');
					});
				},
				eventDrop: function(event, delta, revertFunc) { // si changement de position

					edit(event);

				},
				eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

					edit(event);

				},
				events: [
					<?php foreach ($events as $event) :

						$start = explode(" ", $event['start']);
						$end = explode(" ", $event['end']);
						if ($start[1] == '00:00:00') {
							$start = $start[0];
						} else {
							$start = $event['start'];
						}
						if ($end[1] == '00:00:00') {
							$end = $end[0];
						} else {
							$end = $event['end'];
						}
						?> {
							id: '<?php echo $event['id']; ?>',
							title: '<?php echo $event['title']; ?>',
							start: '<?php echo $start; ?>',
							end: '<?php echo $end; ?>',
							color: '<?php echo $event['color']; ?>',
						},
					<?php endforeach; ?>
				]
			});

			function edit(event) {
				start = event.start.format('YYYY-MM-DD HH:mm:ss');
				if (event.end) {
					end = event.end.format('YYYY-MM-DD HH:mm:ss');
				} else {
					end = start;
				}

				id = event.id;

				Event = [];
				Event[0] = id;
				Event[1] = start;
				Event[2] = end;

				$.ajax({
					url: 'modelo/calendar/editEventDate.php',
					type: "POST",
					data: {
						Event: Event
					},
					success: function(rep) {
						if (rep == 'OK') {
							alert('Evento se ha guardado correctamente');
						} else {
							alert('No se pudo guardar. Inténtalo de nuevo.');
						}
					}
				});
			}

		});
	</script> -->
