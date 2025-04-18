@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/auth/userSettings.css') }}">
@endpush

@section('title', 'Configurações')

@section('content')
    <div class="userSettingsContainer">
        <form class="userSettingsForm" method="POST" action="{{ route('user.settings.update') }}">
            @csrf
            <h1>Configurações</h1>

            <div class="form-group-row">
                <label for="email_notifications">Enviar e-mail quando uma cobrança recorrente for realizada</label>
                <label class="form-switch">
                    <input type="hidden" name="email_notifications" value="{{ ($userSettings->email_notifications === true) ? 1 : 0 }}">
                    <input type="checkbox" id="email_notifications" @if($userSettings->email_notifications === true) checked @endif">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="button-group">
                <button type="submit" class="btn submitBtn">Salvar</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('js/views/auth/upsert.js') }}"></script>
@endpush