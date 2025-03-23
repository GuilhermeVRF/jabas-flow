@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/dashboard.css') }}">
@endpush

@section('title', 'Dashboard')

@section('content')
    <div class="dashboardContainer">
        <div class="dashboard-title">
            <h1>Dashboard</h1>   
        </div>

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

        <x-partials.dashboard-filter 
            :search="$search"
        />

        <div class="budgets">
            <x-partials.budget-table :budgets="$budgets" />
        </div>
    </div>
@endsection
