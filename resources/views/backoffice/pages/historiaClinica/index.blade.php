@extends('backoffice.layouts.admin')

@section('title','Historial de consultas')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"
          xmlns="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@endsection

@section('name-page','Historial de consultas')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a>Historial de consultas</a></li>
@endsection


@section('content')

    <section class="content">

        <div class="card card-primary card-outline">
            <div class="card-body">

                <table class="table table-striped table-bordered" id="historiasClinicasTable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                </table>

            </div>
        </div>
    </section>

@endsection

@section('foot')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {

            var table = $('#historiasClinicasTable').DataTable({
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
                    url: "{{ route('historiaClinica.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'created_at', name: 'fecha'},
                    {data: 'status', name: 'estado'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });


        });
    </script>


@endsection
