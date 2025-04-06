@extends('layouts.app')

@section('title', 'Receitas X Despesas')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/graph/graph.css') }}">
@endpush

@section('content')
    <div class="graphsContainer">
        <div class="graphs-title">
            <h1>Receitas X Despesas</h1>
        </div>

        @if($graph)
            <img src="data:image/png;base64,{{ $graph }}" alt="Gráfico gerado" width="500"/>
        @else
            <div class="no-graph">
                <h3>Não foi possível gerar o gráfico!</h3>
            </div>
        @endif
    </div>

@endsection