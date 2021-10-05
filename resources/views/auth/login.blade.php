@extends('layouts.appLogin')

@section('content')
<title>Log in</title>
<p class="title has-text-centered" style="color: #363636">Login</p>

<!--LOGIN-->
<form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- E-MAIL -->
    <div class="field">
        <label for="" class="label">E-mail</label>
        <div class="control has-icons-left">
            <input type="email" id="email" name="email" placeholder="Ex.: bobsmith@gmail.com" class="input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <span class="icon is-small is-left">
                <i class="fa fa-envelope"></i>
            </span>
        </div>
        <br>
        @error('email')
        <div class="notification is-danger">
            <button class="delete"></button>
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <!-- PASSWORD -->
    <div class="field">
        <label for="" class="label">Senha</label>
        <div class="control has-icons-left">
            <input type="password" id="password" name="password" placeholder="*******" class="input @error('password') is-invalid @enderror" required autocomplete="current-password">
            <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
            </span>
        </div>
        <br>
        @error('password')
        <div class="notification is-danger">
            <button class="delete"></button>
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <!-- LEMBRAR-ME -->
    <div class="field">
        <label for="" class="checkbox">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            Lembrar-me
        </label>
    </div>

    <!-- BUTTONS -->
    <div class="field">
        <button class="button is-medium is-primary is-fullwidth telaCarregamento" type="submit">Entrar</button>
        <br>
        @if (Route::has('password.request'))
        <a class="button is-ghost is-fullwidth" href="{{ route('password.request') }}">
            Você esqueceu a senha?
        </a>
        @endif
    </div>

    <div class="field has-text-centered">
        <a href="{{ route('inicio') }}" class="button is-text">Voltar para a página inicial</a>
    </div>
</form>
@endsection('content')

<!--
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"><i class="material-icons">mail</i></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><i class="material-icons">login</i></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Lembrar-me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Você esqueceu a senha?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="text-center" style="font-size: 0.7rem">
                        Suporte Técnico:&nbsp;&nbsp;<span class="oi oi-phone"></span> (73) 9 9801-6605 &nbsp;&nbsp;<span class="oi oi-envelope-closed"></span> suporte@resolveconsultoria.com
                    </p>
                </div>
            </div>
        </div>
    </div>
    -->