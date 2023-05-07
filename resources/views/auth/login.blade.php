@extends('layouts.auth')

@section('content')
    <img class="wave" src="{{ url('/storage/images/wave.png') }}">
    <div class="container">
        <div class="img">
            <img src="{{ url('/storage/images/SaiCloud.svg') }}">
        </div>
        <div class="login-content">
            <form id="formLogin" name="formLogin" method="POST" action="{{ route('login') }}">
                @csrf
                <img src="{{ url('/storage/images/imgCloud.svg') }}">
                <h2 class="title">SaiCloud</h2>
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <p>El numero de identificación o la contraseña son incorrectos</p>
                    </div>
                @endif
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">

                        <h5 for="identification">{{ __('Identificación') }}</h5>

                        <input id="identification" name="identification" type="number" class="input"
                            name="identification" required>


                    </div>
                </div>
                <div class="alert alert-danger" id="identificationAlert" name="identificationAlert" role="alert"
                    style="display:none">
                    <p>Su numero de identificación es incorrecto</p>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5 for="password">{{ __('Contraseña') }}</h5>

                        <input id="password" name="password" type="password" class="input" name="password"
                            maxlength="4" required autocomplete="current-password">


                    </div>
                </div>
                <div class="alert alert-danger" id="passwordAlert" name="passwordAlert" role="alert" style="display:none">
                    <p>Su contraseña debe tener 4 digitos y ser de tipo numerica</p>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" id="btnLogin" name="btnLogin" class="btn btn-primary" disabled>
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
