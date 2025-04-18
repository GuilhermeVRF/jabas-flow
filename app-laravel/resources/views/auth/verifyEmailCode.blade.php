@extends('layouts.account')

@section('title', 'Verifique seu e-mail')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css//views/auth/account.css') }}">
    <link rel="stylesheet" href="{{ asset('css//views/auth/verifyEmailCode.css') }}">
@endpush

@section('content')
    <div class="verifyEmailCodeContainer">
        <div class="imageContainer">
            <img src="{{ asset('images/verifyEmailCode.svg') }}" alt="Login">
        </div>
        <div class="formsContainer">
            <form action="{{ route('user.verifyEmailCode') }}" class="verifyEmailCodeForm" method="POST">
                @csrf
                <h1>Verifique seu e-mail</h1>
                <p>Enviamos um código de verificação para o seu e-mail <strong>{{ session('email') }}</strong>. Por favor, insira o código abaixo:</p>
                <div class="form-group">
                    <label class="label" for="verification_code"><i class="fi fi-rs-lock"></i>Código de verificação</label>
                    <input type="text" id="verification_code" name="verification_code" class="form-control" required placeholder="Digite o código de verificação">
                </div>

                <div class="form-group">
                
                <input type="hidden" name="email" value="{{ session('email') }}">
                <input type="submit" value="Verificar" class="btn submitBtn">
                </div>
            </form>

            <form method="POST" action="{{ route('user.resendEmailCode') }}">
                @csrf
                <input type="hidden" name="email" value="{{ session('email') }}">
                <input type="submit" class="resendCodeBtn" value="Não recebeu o e-mail? Reenviar código">
            </form>
        </div>
    </div>
@endsection