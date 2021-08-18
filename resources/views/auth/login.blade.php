@extends('layouts.layoutloginveterinaria')

@section('content')

    <div class="card" style="width:20rem;">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf

            <img class="mb-4" src="{{ asset('/images/logov.png') }}" alt="Error" width="170" height="170">
            <h1 class="h3 mb-3 font-weight-normal">Bienvenido</h1>
            <label for="mail" class="sr-only">Correo</label>
            <input name="email" type="email" id="mail" class="form-control" placeholder="Correo Electronico" required autofocus>
            <br>
            <label for="password" class="sr-only">Contraseña</label>
            <input name="password" type="password" id="password" class="form-control" placeholder="Contraseña" required>
            <div class="checkbox mb-3">

                <label>
                    <input type="checkbox" value="remember-me"> Recuerdame
                </label>

            </div>
            <button type="submit" class="btn btn-lg btn-primary btn-block">
                {{ __('Entrar') }}
            </button>
            <br>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('¿Recuperar Contraseña?') }}
                </a>
            @endif
            {{-- <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button> --}}
            {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> --}}

        </form>
    </div>
@endsection
