@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/partials/dashboardFilter.css') }}">
@endpush

<div class="dashboard-filter">
    <form action="{{ route('dashboard') }}" method="GET">
        <!-- Filtro por Intervalo de Datas -->
        <div class="form-group">
            <label for="starting_date">Data inicial</label>
            <input type="date" id="starting_date" name="starting_date" class="form-control" value="{{ $selectedStartDate }}">
        </div>
        <div class="form-group">
            <label for="ending_date">Data final</label>
            <input type="date" id="ending_date" name="ending_date" class="form-control" value="{{ $selectedEndDate }}">
        </div>

        <!-- Botão para Aplicar Filtro -->
        <button type="submit" class="btn submitBtn">Aplicar Filtro</button>
    </form>
</div>