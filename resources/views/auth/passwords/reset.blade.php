@extends('layouts.appLogin')

@section('content')
<title>Atualizar Senha</title>

<p class="title has-text-centered" style="color: #363636">Atualizar senha</p>

<!--ATUALIZAR SENHA-->
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <!-- EMAIL -->
    <div class="field">
        <label for="" class="label">E-mail</label>
        <div class="control has-icons-left">
            <input type="email" id="email" name="email" placeholder="Insira o seu E-mail" class="input @error('email') is-invalid @enderror" required value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
        <small class="is-small">Uma mensagem será enviada ao seu e-mail.</small>
    </div>

    <!-- PASSWORD -->
    <div class="field">
        <label for="" class="label">Senha</label>
        <div class="control has-icons-left">
            <input type="password" id="password" name="password" placeholder="*******" class="input @error('password') is-invalid @enderror" required autocomplete="new-password">
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

    <!-- CONFIRM PASSWORD -->
    <div class="field">
        <label for="" class="label">Confirmar senha</label>
        <div class="control has-icons-left">
            <input type="password" id="password-confirm" name="password_confirmation" class="input" required autocomplete="new-password">
            <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
            </span>
        </div>
    </div>

    <!-- BUTTON -->
    <div class="field">
        <button class="button is-primary">
            Redefinir senha
        </button>
    </div>

</form>



<!--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                    {{ __('Reset Password') }}
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