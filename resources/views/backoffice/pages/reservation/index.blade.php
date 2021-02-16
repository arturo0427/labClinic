@extends('backoffice.layouts.admin')

@section('title','Reservación de análisis')

@section('head')

    <link href='{{asset('assets/adminLTE/fullcalendar/lib/main.css')}}' rel='stylesheet'/>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet'/>
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"
          xmlns="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('name-page','Reservación de análisis')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a>Reservación de análisis</a></li>
@endsection


@section('content')

    <section class="content">
        <div class="row">
            @can('reservations.create')
                <div class="col-md-3">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Reservación</h3>
                        </div>
                        <form method="POST" action="{{ route('reservations.store') }}">
                            {{ csrf_field() }}

                            <div class="form-row">
                                <div class="col-md-12">

                                    <div class="card-body">
                                        <div class="form-grup">
                                            <p><strong>Horarios de atención:</strong></p>
                                            <p>Lunes a viernes<br>07:30 am. a 06:00 pm</p>
                                            <p>Sábado<br>08:00 am. a 02:00 pm</p>

                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label>Fecha de cita</label>
                                            <input type="date"
                                                   class="form-control @error('fecha_cita') is-invalid @enderror"
                                                   name="fecha_cita" value="{{ old('fecha_cita') }}"
                                                   placeholder="Ingresar la fecha">
                                            @error('fecha_cita')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Hora de cita</label>
                                            <input type="time"
                                                   class="form-control @error('hora_cita') is-invalid @enderror"
                                                   name="hora_cita" max="18:00:00"
                                                   min="07:30:00" value="{{ old('hora_cita') }}">
                                            @error('hora_cita')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Fecha de consulta</label>
                                            <select id="consulta" name="consulta"
                                                    class="form-control @error('consulta') is-invalid @enderror">
                                                <option value="" selected disabled>Seleccionar consulta...</option>
                                                @foreach($consultas as $consulta)
                                                    <option value="{{$consulta->id}}">{{$consulta->id}}.- {{date('d/m/Y', strtotime($consulta->created_at))}}</option>
                                                @endforeach
                                            </select>
                                            @error('consulta')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btnAgendarCita">Agendar cita</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endcan

            <div class="col-md-9">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Reservaciones</h3>
                    </div>
                    <div class="card-body">
                        <div id="calendar" class="fc fc-ltr fc-bootstrap">

                        </div>
                    </div>

                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
        @can('reservations.reservationTable')
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Historial de citas</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="reservationTable">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        @endcan
    </section>

    {{--    Modal --}}
    <div class="modal" tabindex="-1" role="dialog" id="modalReservation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cita médica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="">Id: </label>
                        <input class="form-control" id="txtId" disabled>
                    </div>
                    <div class="form-group">
                        <label class="">Nombre: </label>
                        <input class="form-control" id="txtTitle" disabled>
                    </div>
                    <div class="form-group">
                        <label class="">Fecha: </label>
                        <input class="form-control" id="txtStart" disabled>
                    </div>
                    <div class="form-group">
                        <label class="">Hora: </label>
                        <input class="form-control" id="txtTime" disabled>
                    </div>
                    <div class="form-group">
                        <label class="">Estado: </label>
                        <input class="form-control" id="txtStatus" disabled>
                    </div>
                    <div class="form-group">
                        <label class="">N° de consulta: </label>
                        <input class="form-control"  id="txtNDeConsulta" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    @can('reservations.destroy')
                        <button type="button" class="btn btn-danger" id="btnEliminarCita">Eliminar</button>
                    @endcan
                    @can('reservations.atenderCita')
                        <button type="button" class="btn btn-primary" id="btnAtenderCita">Atender</button>
                    @endcan
                </div>
            </div>
        </div>
    </div>

@endsection

@section('foot')
    <!-- fullCalendar 2.2.5 -->
    <script src='{{asset('assets/adminLTE/fullcalendar/lib/main.js')}}'></script>
    <script src='{{asset('assets/adminLTE/fullcalendar/lib/locales/es.js')}}'></script>
    <script src="{{asset('assets/adminLTE/plugins/fullcalendar-bootstrap/main.min.js')}}"></script>

    {{--    yajra--}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            //tabla
            var table = $('#reservationTable').DataTable({
                serverSide: true,
                processing: true,
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se ha encontrado",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "processing": "Procesando"
                },
                ajax: {
                    url: "{{ route('reservations.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'start', name: 'start'},
                    {data: 'status', name: 'status'},
                ],
            });


            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap',
                locale: 'es',
                timeZone: 'local',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'dayGridMonth',
                slotMinTime: '08:00',
                slotMaxTime: '19:30',
                slotDuration: '00:15',
                navLinks: true, // can click day/week names to navigate views
                selectable: false,
                selectMirror: true,
                eventClick: function (arg) {

                    dia = (arg.event.start.getDate());
                    mes = (arg.event.start.getMonth() + 1);
                    anio = (arg.event.start.getFullYear());

                    hora = (arg.event.start.getHours());
                    minutos = (arg.event.start.getMinutes());

                    // Interponer 0 si es menor a 10
                    mes = (mes < 10) ? "0" + mes : mes;
                    dia = (dia < 10) ? "0" + dia : dia;

                    hora = (hora < 10) ? "0" + hora : hora;
                    minutos = (minutos < 10) ? "0" + minutos : minutos;

                    estado = '';
                    if (arg.event.extendedProps.status == 0) {
                        estado = 'En espera';
                    } else {
                        estado = 'Atendido';
                    }

                    $('#txtId').val(arg.event.id);
                    $('#txtTitle').val(arg.event.title);
                    $('#txtStart').val(dia + "-" + mes + "-" + anio);
                    $('#txtTime').val(hora + ":" + minutos);
                    $('#txtStatus').val(estado);
                    $('#txtNDeConsulta').val(arg.event.extendedProps.consulta_id);
                    $('#modalReservation').modal('show');
                },
                events: "{{ url('/reservations/datosCalendario') }}",
                editable: false,
                dayMaxEvents: true, // allow "more" link when too many events
            });
            calendar.render();


            function enviarInformacion(accion, type) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: type,
                    url: "{{ url('/reservations') }}" + accion,
                    data: {_token: CSRF_TOKEN},
                    success: function (data) {
                        if (data.type == 'success') {
                            $('#modalReservation').modal('toggle');
                            $('#reservationTable').DataTable().ajax.reload();
                            calendar.refetchEvents();
                            Swal.fire({
                                icon: 'success',
                                title: 'Correcto',
                                text: data.message
                            })
                        } else if (data.type == 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                text: data.message
                            });
                        }
                    },
                    error: function (data) {
                        console.log(data);
                        // alert('Error' + data)
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No eliminado '
                        })
                    }
                });
            }

            $('#btnEliminarCita').click(function () {
                calendar.refetchEvents();
                idEvento = $('#txtId').val();
                enviarInformacion('/' + idEvento, "DELETE");
            });

            $('#btnAtenderCita').click(function () {
                calendar.refetchEvents();
                idEvento = $('#txtId').val();
                enviarInformacion('/' + idEvento + '/atenderCita', "GET");
            });


        });
    </script>



@endsection
