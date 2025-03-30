@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/partials/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/partials/budgetTable.css') }}">
@endpush

<div class="table-container">
    <div class="table-header">
        <div class="header-cell">Nome</div>
        <div class="header-cell">Tipo</div>
        <div class="header-cell">Valor</div>
        <div class="header-cell">Data de Cobrança</div>
        <div class="header-cell">Status</div>
        <div class="header-cell">Ações</div>
    </div>
    <div class="table-body">
        @foreach ($budgets as $budget)
            <div class="table-row">
                <div class="cell cell-text" data-label="Nome">{{ $budget->name }}</div>
                <div class="cell" data-label="Tipo">
                    <span class="budget-type {{ strtolower($budget->type) }}">
                    @php
                        echo App\Utils\BudgetUtils::formatType($budget->type);
                    @endphp
                    </span>
                </div>
                <div class="cell" data-label="Valor">R$ {{ number_format($budget->amount, 2, ',', '.') }}</div>
                <div class="cell" data-label="Data">{{ date('d/m/Y', strtotime($budget->billing_date)) }}</div>
                <div class="cell" data-label="Status">
                    <span class="budget-status {{ strtolower($budget->status) }}">
                        @php
                            echo App\Utils\BudgetUtils::formatStatus($budget->status);
                        @endphp
                    </span>
                </div>
                <div class="cell cell-actions">
                    <a class="cell-action show-budget" href="#" data-tooltip="Visualizar" data-id="{{ $budget->id }}"><i class="fi fi-rs-eye"></i></a>
                    <a class="cell-action" href="{{ route('budget.edit', $budget->id) }}" data-tooltip="Editar"><i class="fi fi-rs-edit"></i></a>
                    <a class="cell-action" href="" data-tooltip="Deletar"><i class="fi fi-rs-trash"></i></a>    
                </div>
            </div>
        @endforeach
</div>
