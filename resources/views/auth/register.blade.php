@extends('layouts.appLogin')
@section('content')
<title>Novo cadastro</title>

<!-- NOVO CADASTRO -->
<form method="POST" action="{{ route('register') }}">
    @csrf
    <p class="title has-text-centered" style="color: #363636">Novo cadastro</p>

    <!-- NAME -->
    <div class="field">
        <label for="" class="label">Nome</label>
        <div class="control has-icons-left">
            <input id="name" type="text" name="name" placeholder="Insira o seu nome" class="input @error('name') is-invalid @enderror" required value="{{ old('name') }}" autocomplete="name" autofocus>
            <span class="icon is-small is-left">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
            </span>
        </div>
        <br>
        @error('name')
        <div class="notification is-danger">
            <button class="delete"></button>
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <!-- E-MAIL -->
    <div class="field">
        <label for="" class="label">E-mail</label>
        <div class="control has-icons-left">
            <input id="email" type="email" name="email" placeholder="Insira o seu E-mail" class="input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
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
            <input id="password" type="password" name="password" placeholder="Digite uma senha" class="input @error('password') is-invalid @enderror" required autocomplete="new-password">
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


    <!-- REPEAT PASSWORD -->
    <div class="field">
        <label for="" class="label">Repita a senha</label>
        <div class="control has-icons-left">
            <input id="password-confirm" type="password" name="password_confirmation" placeholder="Repita a senha" class="input" required autocomplete="new-password">
            <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
            </span>
        </div>
    </div>

    <div class="field">
        <button class="button is-medium is-primary is-fullwidth" type="submit">Finalizar Cadastro</button>
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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