@extends('backoffice.layouts.admin')

@section('title','Página Demo')

@section('head')
@endsection

@section('name-page','Demo')

@section('breadcrums')
    {{-- <li class="breadcrumb-item"><a href="#"> </a></li> --}}

@endsection


@section('content')

    <section class="content">
        <div class="card">
            <div class="card-body">
                {{--                <a href="{{route('roles.create')}}" class="btn btn-primary iframe" data-toggle="modal"--}}
                {{--                   data-target="#createRoleModal">Crear Rol</a>--}}

                <a class="btn btn-primary" href="javascript:void(0)" id="createNewRol"> Crear Rol</a>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body">
                {{--CONTENIDO--}}

            </div>
        </div>
    </section>

@endsection

@section('foot')
@endsection
