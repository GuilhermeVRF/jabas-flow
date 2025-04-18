@extends('layouts.app')

@section('title', 'Editar Recorrência - ' . $recurrence->id)
<link rel="stylesheet" href="{{ asset('css/views/recurrence/edit.css') }}">
@push('styles')
    
@endpush

@section('content')
    <div class="editRecurrenceContainer">
        <form action="{{ route('recurrence.update', $recurrence->id) }}" method="POST" class="editRecurrenceForm">
            <h1>Editar Recorrência</h1>
            @method('PUT')
            @csrf
            
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $recurrence->budget->name }}" required>
            </div>

            <div class="form-group">
                <label for="amount">Valor</label>
                <input type="text" name="amount" id="amount" class="form-control" value="{{ $recurrence->budget->amount }}" required>
            </div>

            <div class="form-group">
                <label for="date">Data</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $recurrence->date }}" required>
            </div>

            <div class="form-group">
                <label for="frequency">Frequência</label>
                <select name="frequency" id="frequency" class="form-control" required>
                    <option value="daily" @if($recurrence->frequency == 'daily') selected @endif>Diário</option>
                    <option value="weekly" @if($recurrence->frequency == 'weekly') selected @endif>Semanal</option>
                    <option value="monthly" @if($recurrence->frequency == 'monthly') selected @endif>Mensal</option>
                </select>
            </div>

            <div class="form-group">
                <label for="times">Quantidade de Recorrências</label>
                <input type="number" name="times" id="times" class="form-control"value="{{ $recurrence->times }}" required>
            </div>

            <div class="form-group">
                <label for="counter">Contador de Recorrências</label>
                <input type="number" name="counter" id="counter" value="{{ $recurrence->counter }}" class="form-control" required>
            </div>

            <div class="button-group">
                <a href="{{ route('recurrence.index') }}" class="btn secondaryBtn">Listar Recorrências</a>
                <button type="submit" class="btn submitBtn">Salvar</button>
            </div>
        </form>
    </div>
@endsection
