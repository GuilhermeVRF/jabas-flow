@extends('layouts.app')

@section('title', 'Login')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css//views/auth/account.css') }}">
    <link rel="stylesheet" href="{{ asset('css//views/auth/login.css') }}">
@endpush

@section('content')
    <div class="loginContainer">
        <div class="imageContainer">
            <img src="{{ asset('images/login.svg') }}" alt="Login">
        </div>
        <form class="loginForm">
            <h1>Bem vindo de volta!</h1>
            <div class="form-group">
                <label class ="label" for="email"><i class="fi fi-rs-envelope"></i>E-mail</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="Digite seu e-mail">
            </div>

            <div class="form-group">
                <label class ="label" for="password"><i class="fi fi-rs-lock"></i>Senha</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="Digite sua senha">
            </div>

            <div class="form-group">
                <input type="submit" value="Entrar" class="btn submitBtn">
            </div>
            <a href="{{ route('register') }}" class="accountLink">Não tem uma conta? Cadastre-se</a>
        </form>
        
    </div>
@endsection

