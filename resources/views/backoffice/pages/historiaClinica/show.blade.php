@extends('backoffice.layouts.admin')

@section('title','Resultados consulta')

@section('head')
@endsection

@section('name-page','Resultados consulta')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a href="{{ route('historiaClinica.index') }}">Historias Clínicas</a></li>
    <li class="breadcrumb-item"><a>Resultados</a></li>
@endsection


@section('content')

    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5><strong>Médico solicitante: </strong>{{ $medico->name }} {{ $medico->apellido }}</h5>
                <h5><strong>Paciente: </strong> {{ $consulta->user->name }} {{ $consulta->user->apellido }}</h5>
                <hr>
                <div class="row">
                    @foreach($consulta->grupos_detalles_tiposExamenes as $tipo)
                        <div class="form-group col-md-6">
                            <label>{{$tipo->name}}:</label>
                            @foreach($consulta->resultadoConsultas as $res)
                                @if($tipo->slug == $res->slug)
                                    <p>{{$res->resultado}}</p>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Precio:</label>
                        <p>{{$consulta->precio}} $</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('foot')
@endsection
