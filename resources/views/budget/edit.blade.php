@extends('layouts.app')

@section('title', 'Editar Orçamento')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/budget/upsert.css') }}">
@endpush

@section('content')
    <div class="upsertBudgetContainer">
        <form action="{{ route('budget.update', $budget->id) }}" method="POST" class="upsertBudgetForm">
            <h1>Editar Orçamento</h1>
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ $budget->name }}">
            </div>

            <div class="form-group">
                <label for="type">Tipo</label>
                <select name="type" id="type" class="form-control">
                    <option @if($budget->type === 'expense') selected @endif value="expense">Despesa</option>
                    <option @if($budget->type === 'income') selected @endif value="income">Receita</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Valor</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="R$13,00" value="{{ $budget->amount }}">
            </div>
            <div class="form-group">
                <label for="category">Categoria</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option @if(!empty($budget->category->id) && $budget->category->id === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="billingDate">Data</label>
                <input type="date" class="form-control" id="billingDate" name="billingDate" value="{{ $budget->billing_date }}">
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" class="form-control" placeholder="Descrição" value={{ $budget->description }}></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option @if($budget->status === 'peding') selected @endif value="pending">Pendente</option>
                    <option @if($budget->status === 'paid') selected @endif value="paid">Pago</option>
                </select>
            </div>

            <div>
                <label for="isRecurrence">Pagamento recorrente</label>
                <input type="hidden" name="isRecurrence" value="{{ !empty($budget->recurrence) ? true : false }}">
                <input type="checkbox" id="isRecurrence" {{ !empty($budget->recurrence) ? 'checked' : '' }}>
            </div>

            <input type="hidden" name="recurrenceId" value="{{ $budget->recurrence->id ?? '' }}">

            <div id="recurrenceContainer" class="recurrenceContainer" style="display: none;">
                <h2>Recorrência</h2>

                <div class="form-group">
                    <label for="recurrenceDate">Data</label>
                    <input type="date" class="form-control" id="recurrenceDate" name="recurrenceDate" value="{{ $budget->recurrence->date ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="recurrenceType">Tipo de recorrência</label>
                    <select name="recurrenceType" id="recurrenceType" class="form-control">
                        <option @if(!empty($budget->recurrence->frequency) && $budget->recurrence->frequency === 'daily') selected @endif value="daily">Diária</option>
                        <option @if(!empty($budget->recurrence->frequency) && $budget->recurrence->frequency === 'weekly') selected @endif value="weekly">Semanal</option>
                        <option @if(!empty($budget->recurrence->frequency) && $budget->recurrence->frequency === 'monthly') selected @endif value="monthly">Mensal</option>
                        <option @if(!empty($budget->recurrence->frequency) && $budget->recurrence->frequency === 'yearly') selected @endif value="yearly">Anual</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="recurrenceAmount">Quantidade de recorrências</label>
                    <input type="number" class="form-control" id="recurrenceAmount" name="recurrenceAmount" placeholder="Quantidade de recorrências" value={{ $budget->recurrence->times ?? '' }}>
                </div>

                <div class="form-group">
                    <label for="recurrenceCounter">Contador de recorrência</label>
                    <input type="number" class="form-control" id="recurrenceCounter" name="recurrenceCounter" placeholder="Recorrência atual" value={{ $budget->recurrence->counter ?? '' }}>
                </div>
            </div>

            <div class="button-group">
                <a href="{{ route('dashboard') }}" class="btn secondaryBtn">Listar Orçamentos</a>
                <button type="submit" class="btn submitBtn">Salvar</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/views/budget/upsert.js') }}"></script>
@endpush
