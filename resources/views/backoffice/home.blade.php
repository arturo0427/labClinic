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
                            <a href="{{ route('users.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="{{ route('reservations.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>

@endsection

@section('foot')
@endsection
