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
                <h3>Receita X Despesa</h3>
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