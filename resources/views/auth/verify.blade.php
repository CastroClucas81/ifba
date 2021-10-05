@extends('layouts.appLogin')

@section('content')
<p class="title has-text-centered">Verifique seu endereço de e-mail</p>

@if (session('resent'))
<div class="notification is-success">
    {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
</div>
@endif
<div class="content">
    {{ __('Antes de continuar, verifique seu e-mail para obter um link de verificação.') }}
    {{ __('Se você não recebeu o e-mail.') }},
</div>
<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <div class="field">
        <button class="button is-medium is-primary is-fullwidth" type="submit">Clique aqui para solicitar outro</button>
    </div>
</form>


<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
-->
@endsection