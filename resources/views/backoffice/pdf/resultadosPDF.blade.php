<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    {{--    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}
    <title>Documuento PDF</title>

    <link href="">
    <style>
        h3 {
            text-align: center;
            text-transform: uppercase;
        }

        div.header {
            position: relative;

        }

        div.informacion_margen {
            border-style: groove;
            border: 2px solid;
            border-radius: 8px;
            padding-bottom: 0px;
            padding-top: 0px;
            padding-left: 20px;

        }

        div.resultados {
            padding: 10px;
            font-size: 17px;
        }

        div.footer {

        }

        td {
            height: 40px;
        }

        table {
            padding-bottom: 60px;
            font-size: 15px;
        }

        hr.firma {
            width: 30%;
            background-color: black;
        }

        p.firma {
            text-align: center;
        }


        .logo {
            position: static;
            height: 110px;
            width: 50%;
        }

        .firma_imagen {
            position: static;
            height: 90px;
            width: 40%;
            opacity: 0.6;

        }

        .nombrePropietaria {
            float: right;
            top: 0px;
            right: 0px;
            width: 300px;
            padding-top: 0px;
            text-align: right;
            font-size: 10px;

        }

        .contenido {
            font-size: 15px;
        }


    </style>
</head>
<body>

<div class="header">

    <img class="logo" src="{{public_path('assets/frontend/img/logo_largo.png')}}"/>

    <p class="nombrePropietaria">Lic. María Meza<br>Abraham Herrera 08-20 y Quiroga <br> El Ángel - Carchi<br>
        Teléfonos: 06 2977707 <br> 0994225139 - 09981441889<br>
        E-mail: labclinicoelangel@outlook.com
    </p>
</div>


<div class="contenido">

    <div class="informacion_margen">
        <div>
            <p><strong>Solicitado por:</strong> {{ $medico->name }} {{ $medico->apellido }} <br>
                <strong>Paciente:</strong> {{ $consulta->user->name }} {{ $consulta->user->apellido }} <br>
                <strong>Cédula:</strong> {{ $consulta->user->cedula }} <br>
                <strong>Edad:</strong> {{ $consulta->user->age }} <br>
                <strong>Fecha:</strong> {{ date("d/m/Y", strtotime($consulta->created_at)) }} </p>
        </div>
    </div>
    <hr>
    <div class="resultados">
        <table width="100%">
            <thead style="background-color: #558bd3;">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Resultado</th>
                <th>Rango normal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($consulta->grupos_detalles_tiposExamenes as $tipo)
                <tr>
                    <th scope="row">{{$tipo->id}}</th>
                    <td>{{$tipo->name}}</td>
                    @foreach($consulta->resultadoConsultas as $res)
                        @if($tipo->slug == $res->slug)
                            <td align="center">{{Crypt::decryptString($res->resultado)}}</td>
                            <td align="center">{{$res->rango}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>


    <div class="footer" align="center">
        <img class="firma_imagen" src="{{public_path('assets/frontend/img/logo_largo.png')}}"/>
        <hr class="firma">
        <p class="firma">Lic. María Meza<br><strong>Representante Legal</strong><br>1704995438</p>

    </div>


</div>
</body>
</html>


