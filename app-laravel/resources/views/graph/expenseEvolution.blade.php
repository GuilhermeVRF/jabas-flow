@extends('layouts.app')

@section('title', 'Despesa ao longo dos meses')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/views/graph/graph.css') }}">
@endpush

@section('content')
    <div class="graphsContainer">
        <div class="graphs-title">
            <h1>Despesa ao longo dos meses</h1>
        </div>

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