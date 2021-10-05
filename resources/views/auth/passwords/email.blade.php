@extends('layouts.appLogin')

@section('content')
<title>Redefinir Senha</title>

<p class="title has-text-centered" style="color: #363636">Redefinir a senha</p>
<!-- REDEFINIR SENHA -->
@if (session('status'))
<div class="notification is-success">
    {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- E-MAIL -->
    <div class="field">
        <input type="email" id="email" name="email" class="input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <p class="help">
            Enviaremos um link de ativação para o seu e-mail registrado para que você possa voltar!
        </p>
        <br>
        @error('email')
        <div class="notification is-danger">
            <button class="delete"></button>
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <!-- BUTTON -->
    <div class="field">
        <button class="button is-medium is-primary is-fullwidth" type="submit">Enviar link de redefinição de senha</button>
    </div>

    <div class="field has-text-centered">
        <a href="{{ route('login') }}" class="button is-text">Voltar para a página de login</a>
    </div>
</form>

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
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