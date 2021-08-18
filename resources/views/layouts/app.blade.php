<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Administración | Dashboard</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/favitierras.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/images/favitierras.png') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css">


    <style>
        p {
            font-size: 14px;
        }

    </style>
    @yield('css')
</head>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        {{-- 1. Top Menu --}}
        @include('layouts.topMenu')

        {{-- 2. Left Menu --}}
        @include('layouts.leftMenu')

        {{-- 3.Contenido --}}
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
    </div>
</body>

<script src="{{ asset('js/app.js') }}" defer></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"
integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales-all.min.js"></script>

<script src="js/calendar.js" defer></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script type="text/javascript">
    var baseURL = {!! json_encode(url('/')) !!}
</script>
@yield('scripts')

</html>
