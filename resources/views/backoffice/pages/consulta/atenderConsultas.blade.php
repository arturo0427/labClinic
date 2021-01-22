@extends('backoffice.layouts.admin')

@section('title','Registro de resultados')

@section('head')
@endsection

@section('name-page','Registro de resultados')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a href="{{ route('consultas.index') }}">Consultas</a></li>
    <li class="breadcrumb-item"><a>Registro de resultados</a></li>
@endsection


@section('content')

    <section class="content">

        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="">
                    <h5><strong>Médico solicitante: </strong>{{ $medico->name }} {{ $medico->apellido }}</h5>
                    <h5><strong>Paciente: </strong> {{ $consulta->user->name }} {{ $consulta->user->apellido }}</h5>
                </div>
            </div>
        </div>
        <hr>

        <div class="card card-primary card-outline">
            <div class="card-body">


                <form action="{{ route('consultas.store',$consulta->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        @foreach($consulta->grupos_detalles_tiposExamenes as $tipo)
                            <div class="form-group col-md-6">
                                <label>{{$tipo->name}}:</label>
                                <input name="resultado[]" type="text" class="form-control" required>
                                <input type="hidden" name="slug[]" value="{{$tipo->slug}}">
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Precio</label>
                            <div class="input-group mb-3">
                                <input type="number" step="0.01" name="precio" class="form-control"
                                       required>
                                <span class="input-group-text">$</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-info col-md-3">Registrar datos</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('foot')
@endsection
