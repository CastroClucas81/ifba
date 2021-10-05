@extends('layouts.appLogin')

@section('content')
<title>Confirmar senha</title>


<p class="title has-text-centered">Confirmar senha</p>

<div class="content">
    <p>Por favor, confirme sua senha antes de continuar.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

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

        <!-- BUTTONS -->
        <div class="field">
            <button class="button is-primary">
                Confirmar senha
            </button>

            @if (Route::has('password.request'))
            <a class="button is-ghost" href="{{ route('password.request') }}">
                Você esqueceu a senha?
            </a>
            @endif
        </div>
    </form>
</div>

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection