@extends('backoffice.layouts.admin')

@section('title','Inicio')

@section('head')

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrums')
    {{-- <li><a href=""></a></li> --}}

@endsection

@section('name-page','Inicio')


@section('content')

    <!-- Main content -->
    @can('inicio.admin')
        <section class="content">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($consultas) }}</h3>
                                    <p>Nuevas consultas</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-clipboard"></i>

                                </div>
                                <a href="{{ route('consultas.index') }}" class="small-box-footer">Más información <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ count($users) }}</h3>

                                    <p>Usuarios registrados</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ route('users.index') }}" class="small-box-footer">Más información <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ count($reservation) }}</h3>

                                    <p>Citas médicas</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-calendar"></i>
                                </div>
                                <a href="{{ route('reservations.index') }}" class="small-box-footer">Más información <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @can('inventario.index')
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ count($insumos_por_caducar) }}</h3>
                                        <p>Insumos caducados</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-erlenmeyer-flask-bubbles"></i>
                                    </div>

                                    <a href="{{ route('inventario.index') }}" class="small-box-footer">Más información
                                        <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            {{--                            <canvas id="myChart" width="400" height="400"></canvas>--}}
                            <div class="card">
                                <div class="card-header">
                                    Insumos por terminarse
                                </div>
                                <div class="card-body">
                                    <canvas id="grafica_insumos_restantes" width="1000" height="700"></canvas>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    Total costos
                                </div>
                                <div class="card-body">
                                    <form id="formTotalCostos">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Inicio</label>
                                                    <input type="date" class="form-control"
                                                           id="fecha_inicio_total_costo_consulta"
                                                           name="fecha_inicio_total_costo_consulta"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fin</label>
                                                    <input type="date" class="form-control"
                                                           id="fecha_fin_total_costo_consulta"
                                                           name="fecha_fin_total_costo_consulta"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary mb-2" id="btnCalcular">
                                                        Calcular
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="form-rowrow">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Consultas realizadas</label>
                                                <input class="form-control" id="consultasRealizadas" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Total</label>
                                                <div class="input-group mb-3">
                                                    <input id="totalCostosRealizos" step="0.01" name="precio"
                                                           class="form-control"
                                                           disabled>
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                {{--                                                <input class="form-control" id="totalCostosRealizos" disabled>--}}
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </section>
    @endcan

    @can('inicio.users')
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('assets/adminLTE/dist/img/Imagen_inicio.jpg') }}" class="img-fluid rounded "
                         alt="...">
                </div>
                <div class="col-md-6">
                    <h1 align="center"><strong>Laboratorio Clínico</strong></h1>
                    <h2 align="center">"El Ángel"</h2>
                    <hr>
                    <div class="row">
                        <h3><strong>Propietaria</strong></h3>
                    </div>
                    <div class="row">
                        <h4>Lic. María Meza.</h4>
                    </div>
                    <br>
                    <div class="row">
                        <h3><strong>Horarios de atención</strong></h3>
                    </div>
                    <div class="row">
                        <h3><p>Lunes a viernes<br>07:30 am. a 06:00 pm</p></h3>
                    </div>
                    <div class="row">
                        <h3><p>Sábado<br>08:00 am. a 02:00 pm</p></h3>
                    </div>
                </div>
            </div>

        </section>
    @endcan
@endsection

@section('foot')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //Tomar datos para gráfica
            $.ajax({
                url: "{{url('grafica')}}" + '/insumos',
                method: 'get',
                dataType: 'json',
                success: function (data) {
                    var usos_restantes = [];
                    var nombre_insumo = [];
                    $.each(data.insumos, function (index, value) {
                        usos_restantes.push(value.usos);
                        nombre_insumo.push(value.name);
                    });

                    grafico_insumos_restantes(nombre_insumo, usos_restantes);
                },
                error: function (errorsHtml) {
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        html: "No se ha podido obtener la información"
                    });
                }
            });

            //calcular costos
            $('#btnCalcular').click(function (e) {
                e.preventDefault();

                var ruta = "{{ url('totalCostos') }}";
                var type = "POST";

                $.ajax({
                    data: $('#formTotalCostos').serialize(),
                    url: ruta,
                    type: type,
                    dataType: 'json',
                    success: function (data) {
                        var total = 0;

                        if (data.type === 'success') {
                            $('#consultasRealizadas').val(data.consultas.length);
                            $.each(data.consultas, function (index, value) {
                                total += value.precio;
                            });

                            $('#totalCostosRealizos').val(total);


                        } else if (data.type === 'error') {
                            var errorsHtml = '';
                            if (data.errors) {
                                $.each(data.errors, function (key, val) {
                                    $('#error_' + key).html(val);
                                    errorsHtml += '<ul class="list-group"><li class="list-group-item alert alert-danger">' + val + '</li></ul>';
                                });
                            }
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                html: errorsHtml
                            });
                        }
                    }

                });
            });


        });

        function grafico_insumos_restantes(nombre_insumo, usos_restantes) {
            var ctx = document.getElementById('grafica_insumos_restantes').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    labels: nombre_insumo,
                    datasets: [{
                        label: 'Insumos de inventario',
                        backgroundColor: 'rgb(71,102,255)',
                        borderColor: 'rgb(71,102,255)',
                        data: usos_restantes
                    }]
                },

                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Usos del insumo'
                            }
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Nombre del insumo'
                            }
                        }]
                    }
                }
            });
            chart.update();
        }
    </script>


@endsection
