<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link">
        {{--        <img src="{{asset('assets/adminLTE/dist/img/AdminLTELogo.png')}}"--}}
        {{--             alt="AdminLTE Logo"--}}
        {{--             class="brand-image img-circle elevation-3"--}}
        {{--             style="opacity: .8">--}}
        <span class="brand-text font-weight-light">Lab. Clínico "El Ángel"</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/adminLTE/dist/img/foto_perfil.png')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                {{--                    <li class="nav-header">MISCELLANEOUS</li>--}}
                {{--                    <li class="nav-item">--}}
                {{--                        <a href="https://adminlte.io/docs/3.0" class="nav-link">--}}
                {{--                            <i class="nav-icon fas fa-file"></i>--}}
                {{--                            <p>Documentation</p>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                @can('crearConsultas.index')
                    <li class="nav-item">
                        <a href="{{ route('crearConsultas.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-paste"></i>
                            <p>Crear Consulta</p>
                        </a>
                    </li>
                @endcan
                @can('consultas.index')
                    <li class="nav-item">
                        <a href="{{ route('consultas.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-edit  "></i>
                            <p>Consultas</p>
                        </a>
                    </li>
                @endcan
                @Can('users.index')
                    <li class="nav-header">GESTIÓN</li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                @endcan
                @Can('reservations.index')
                    <li class="nav-item">
                        <a href="{{ route('reservations.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Reservaciones</p>
                        </a>
                    </li>
                @endcan
                @Can('inventario.index')
                    <li class="nav-item">
                        <a href="{{ route('inventario.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-dolly-flatbed"></i>
                            <p>Inventario</p>
                        </a>
                    </li>
                @endcan
                @Can('roles.index')
                    <li class="nav-header">SISTEMA</li>
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                @endcan


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
