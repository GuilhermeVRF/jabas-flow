@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/partials/dashboardSummary.css') }}">
@endpush

<div class="budget-amount-information">
    <div class="budget-amount-information__balance">
        <h3>Saldo em conta</h3>
        <div>R$ {{ $totalAmount }}</div>
    </div>

    <div class="budget-amount-information__income">
        <h3>Receitas</h3>
        <div>R$ {{ $totalIncomeAmount }}</div>
        <span class="budget-amount-information__percent @if($incomeVariation > 0) positive @else negative @endif">
            @if($incomeVariation > 0)
                <i class="fi fi-rs-arrow-trend-up"></i>
            @else
                <i class="fi fi-rs-arrow-trend-down"></i>
            @endif
            {{ $incomeVariation }}               
        </span>
    </div>

    <div class="budget-amount-information__expense">
        <h3>Despesas</h3>
        <div>R$ {{ $totalExpenseAmount }}</div>
        <span class="budget-amount-information__percent @if($expenseVariation > 0) negative @else positive @endif">
            @if($expenseVariation > 0)
                <i class="fi fi-rs-arrow-trend-up"></i>
            @else
                <i class="fi fi-rs-arrow-trend-down"></i>
            @endif
            {{ $expenseVariation }}
        </span>
    </div>
</div>