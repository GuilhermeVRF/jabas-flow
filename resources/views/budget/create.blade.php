@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/budget/upsert.css') }}">
@endpush

@section('content')
    <div class="upsertBudgetContainer">
        <form action="{{ route('budget.store') }}" method="POST" class="upsertBudgetForm">
            <h1>Adicionar Orçamento</h1>
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="type">Tipo</label>
                <select name="type" id="type" class="form-control">
                    <option value="expense">Despesa</option>
                    <option value="income">Receita</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Valor</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="R$13,00">
            </div>
            <div class="form-group">
                <label for="category">Categoria</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="billingDate">Data</label>
                <input type="date" class="form-control" id="billingDate" name="billingDate" value="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" class="form-control" placeholder="Descrição"></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending">Pendente</option>
                    <option value="paid">Pago</option>
                </select>
            </div>

            <div>
                <label for="isRecurrence">Pagamento recorrente</label>
                <input type="hidden" name="isRecurrence" value="0">
                <input type="checkbox" id="isRecurrence">
            </div>

            <div id="recurrenceContainer" class="recurrenceContainer" style="display: none;">
                <h2>Recorrência</h2>

                <div class="form-group">
                    <label for="recurrenceDate">Data</label>
                    <input type="date" class="form-control" id="recurrenceDate" name="recurrenceDate" value="{{ date('Y-m-d') }}">
                </div>

                <div class="form-group">
                    <label for="recurrenceType">Tipo de recorrência</label>
                    <select name="recurrenceType" id="recurrenceType" class="form-control">
                        <option value="daily">Diária</option>
                        <option value="weekly">Semanal</option>
                        <option value="monthly">Mensal</option>
                        <option value="yearly">Anual</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="recurrenceAmount">Quantidade de recorrências</label>
                    <input type="number" class="form-control" id="recurrenceAmount" name="recurrenceAmount" placeholder="Quantidade de recorrências">
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
