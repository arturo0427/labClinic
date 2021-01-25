@extends('backoffice.layouts.admin')

@section('title','Inicio')

@section('head')
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

                    </div>
                </div>
                <div class="card-footer">
                    Footer
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
@endsection
