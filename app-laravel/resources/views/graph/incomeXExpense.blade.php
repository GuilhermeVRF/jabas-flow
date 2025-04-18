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

        <x-partials.graphs-filters :month="$month" />

        @if($graph)
            {!! $graph !!}
        @else
            <div class="no-graph">
                <h3>Não foi possível gerar o gráfico!</h3>
            </div>
        @endif
        <div class="button-group">
            <a href="{{ route('graph.index') }}" class="btn secondaryBtn">Voltar</a>
        </div>
    </div>

@endsection