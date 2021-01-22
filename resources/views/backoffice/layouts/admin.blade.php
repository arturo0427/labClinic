<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('backoffice.layouts.includes.head')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('backoffice.layouts.includes.header')

<!-- Main Sidebar Container -->
    @include('backoffice.layouts.includes.left-sidebar')


    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('name-page')</h1>
                    </div>
                    @include('backoffice.layouts.includes.breadcrums')
                </div>
            </div>
        </section>


        @yield('content')

    </div>



    @include('backoffice.layouts.includes.footer')
</div>

@include('backoffice.layouts.includes.foot')

@include('sweetalert::alert')
</body>
</html>
