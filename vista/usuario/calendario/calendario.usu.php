<?php
require_once('modelo/calendar/bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<head>
    <link rel='stylesheet' href='publico/js/fullcalendar/fullcalendar.css'>
</head>

<body>
    <section class='margin-menu padding-menu'>
        <!-- Page Content -->
        <div class="container" style="width: 70%; margin:auto;">

            <div class="">
                <div class="center">
                    <h1>Calendario de eventos</h1>
                    <p class="lead">¡Mira aquí los proximos eventos de la fundación!</p>
                </div>
                <br>
                <div id="calendar" class="col-centered">
                </div>
            </div>
            <!-- /.row -->




        </div>

    </section>


    <!-- Modal editar-->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="flex-modal" role="document">
            <div class="contenido-modal">
                <form class="form-horizontal" method="POST" action="modelo/calendar/editEventTitle.php">
                    <div class="modal-header">
                        <h4 class="center" id="myModalLabel">Información del evento</h4>
                    </div>
                    <div class="modal-body">

                        <div class="boxInput">
                            <label for="title" class="col-sm-2 control-label">Titulo</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Titulo" disabled>
                            </div>
                        </div>
                        <div class="boxInput">
                            <label for="title" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-10">
                                <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción" disabled>
                            </div>
                        </div>



                        <input type="hidden" name="id" class="form-control" id="id">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn_rojo" data-dismiss="modal">Cerrar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


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
                    foreach ($events as $event) :

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

        });
    </script>

</body>

</html>
