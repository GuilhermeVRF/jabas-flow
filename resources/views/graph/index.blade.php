@extends('layouts.app')

@section('title', 'Gráficos')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/graph/graph.css') }}">
@endpush

@section('content')
    <div class="graphsContainer">
        <div class="graphs-title">
            <h1>Gráficos</h1>
        </div>

        <div class="graphs-options">
            <a class="graph-option" href="{{ route('graph.income-x-expense') }}">
                <h3 class="graph-option-title">
                    <i class="fi fi-rs-stats"></i>
                    Receita X Despesa
                </h3>
                <span class="graph-option-description">Veja o comparativo</span>
            </a>

            <a class="graph-option" href="{{ route('graph.income-evolution') }}">
                <h3 class="graph-option-title income">
                    <i class="fi fi-rs-chart-line-up"></i>
                    Receita ao longo dos meses
                </h3>
                <span class="graph-option-description">Evolução mês a mês</span>
            </a>

            <a class="graph-option" href="{{ route('graph.expense-evolution') }}">
                <h3 class="graph-option-title expense">
                    <i class="fi fi-rs-chart-line-up"></i>
                    Despesa ao longo dos meses
                </h3>
                <span class="graph-option-description">Evolução mês a mês</span>
            </a>
            <!-- <div class="graph-option">
                <h3>Evolução da Receita</h3>
            </div>
            <div class="graph-option">
                <h3>Evolução da Despesa</h3>
                
            </div> -->
        </div>
    </div>

@endsection