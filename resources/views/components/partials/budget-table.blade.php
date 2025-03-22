@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/partials/budgetTable.css') }}">
@endpush

<div class="budget-table">
    <div class="budget-header">
        <div class="budget-th">Nome</div>
        <div class="budget-th">Tipo</div>
        <div class="budget-th">Valor</div>
        <div class="budget-th">Data de Cobrança</div>
        <div class="budget-th">Status</div>
        <div class="budget-th">Ações</div>
    </div>
    <div class="budget-body">
        @foreach ($budgets as $budget)
            <div class="budget-row">
                <div class="budget-td budget-td-text" data-label="Nome">{{ $budget->name }}</div>
                <div class="budget-td" data-label="Tipo">
                    <span class="budget-type {{ strtolower($budget->type) }}">
                    @php
                        switch ($budget->type) {
                            case 'income':
                                echo 'Receita';
                                break;
                            case 'expense':
                                echo 'Despesa';
                                break;
                            default:
                                echo 'Desconhecido';
                                break;
                        }
                    @endphp
                    </span>
                </div>
                <div class="budget-td" data-label="Valor">R$ {{ number_format($budget->amount, 2, ',', '.') }}</div>
                <div class="budget-td" data-label="Data de Cobrança">{{ date('d/m/Y', strtotime($budget->billing_date)) }}</div>
                <div class="budget-td" data-label="Status">
                    <span class="budget-status {{ strtolower($budget->status) }}">
                        @php
                            switch ($budget->status) {
                                case 'paid':
                                    echo 'Pago';
                                    break;
                                case 'pending':
                                    echo 'Pendente';
                                    break;
                                case 'canceled':
                                    echo 'Cancelado';
                                    break;
                                default:
                                    echo 'Desconhecido';
                                    break;
                            }    

                        @endphp
                    </span>
                </div>
                <div class=" budget-td budget-td-actions">
                    <a class="budget-td-action" href="" data-tooltip="Visualizar"><i class="fi fi-rs-eye"></i></a>
                    <a class="budget-td-action" href="" data-tooltip="Editar"><i class="fi fi-rs-edit"></i></a>
                    <a class="budget-td-action" href="" data-tooltip="Deletar"><i class="fi fi-rs-trash"></i></a>    
                </div>
            </div>
        @endforeach
</div>
