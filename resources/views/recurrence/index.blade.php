@extends('layouts.app')

@section('title', 'Recorrências')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/recurrence/recurrence.css') }}">
@endpush

@section('content')
    <div class="recurrencesContainer">
        <div class="recurrences-title">
            <h1>Recorrências</h1>
        </div>

        <x-partials.recurrence-filter
            :search="$search"
        />

        <x-partials.recurrence-table 
            :recurrences="$recurrences" 
        />
    </div>
@endsection