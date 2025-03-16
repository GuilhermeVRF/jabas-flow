@extends('layouts.account')

@section('title', 'Registrar')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css//views/auth/account.css') }}">
    <link rel="stylesheet" href="{{ asset('css//views/auth/register.css') }}">
@endpush

@section('content')
    <div class="registerContainer">
        <form action="{{ route('user.store') }}" class="registerForm" method="POST">
            @csrf
            <h1>Crie sua conta</h1>
            <div class="form-group">
                <label class="label" for="name"><i class="fi fi-rs-user"></i>Nome</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="Digite seu nome">
            </div>

            <div class="form-group">
                <label class="label" for="cpfcnpj"><i class="fi fi-rs-1"></i>CPF/CNPJ</label>
                <input type="text" id="cpfcnpj" name="cpfcnpj" class="form-control" required placeholder="Digite seu CPF/CNPJ">   
            </div>

            <div class="form-group">
                <label class="label" for="phone"><i class="fi fi-rs-phone-flip"></i>Telefone</label>
                <input type="text" id="phone" name="phone" class="form-control" required placeholder="Digite seu telefone">
            </div>

            <div class="form-group">
                <label class="label" for="email"><i class="fi fi-rs-envelope"></i>E-mail</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="Digite seu e-mail">
            </div>

            <div class="form-group">
                <label class="label" for="password"><i class="fi fi-rs-lock"></i>Senha</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="Digite sua senha">
            </div>

            <div class="form-group">
                <label class="label" for="password_confirmation"><i class="fi fi-rs-lock"></i>Repita a senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required placeholder="Digite sua senha">
            </div>

            <div class="form-group">
                <input type="submit" value="Cadastrar" class="btn submitBtn">
            </div>

            <a href="{{ route('login') }}" class="accountLink">Já tem uma conta? Faça login</a>
        </form>
        <div class="imageContainer">
            <img src="{{ asset('images/register.svg') }}" alt="Register">
        </div>
    </div>
@endsection
