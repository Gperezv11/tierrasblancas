<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mundo Animal</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/favimundo.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/images/favimundo.png') }}">

    {{-- {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> --}}
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" type="text/css" href="lib/sweet-alert.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/"> --}}

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}"  rel="stylesheet">
    <style>
        /* p {
            font-size: 14px;
        } */

        BODY {
            background-image: url(/images/fondov.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
    @yield('css')
</head>
</head>

<Body class="text-center" background="../mto-master/public/images/fondov.jpg">
    <div>
        {{-- 3.Contenido --}}
        <div>
            <section class="content">
                @yield('content')
            </section>
        </div>
    </div>
</body>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"
        integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@yield('scripts')

</html>
