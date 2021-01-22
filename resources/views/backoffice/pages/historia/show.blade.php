@extends('backoffice.layouts.admin')

@section('title','Historia de usuario')

@section('head')
@endsection

@section('name-page','Historia clínica')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios del sistema</a></li>
    <li class="breadcrumb-item"><a> {{$user->name}} {{$user->apellido}} </a></li>
    <li class="breadcrumb-item"><a>Historia clínica </a></li>
@endsection


@section('content')

    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    @foreach($consulta->grupos_detalles_tiposExamenes as $tipo)
                        <div class="form-group col-md-6">
                            <label>{{$tipo->name}}:</label>
                            @foreach($resultados as $resultado)
                                @if($tipo->slug === $resultado->slug)
                                    <input name="resultado[]" type="text" class="form-control"
                                           value="{{$resultado->resultado}}" disabled>
                                @endif
                            @endforeach
                            <input type="hidden" name="slug[]" value="{{$tipo->slug}}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection

@section('foot')
@endsection
