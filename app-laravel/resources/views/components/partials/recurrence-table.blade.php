@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/partials/table.css') }}">
@endpush

<div class="table-container">
    <div class="table-header">
        <div class="header-cell">Nome</div>
        <div class="header-cell">Data</div>
        <div class="header-cell">Frequência</div>
        <div class="header-cell">Última execução</div>
        <div class="header-cell">Total de execuções</div>
        <div class="header-cell">Ações</div>
    </div>
    <div class="table-body">
        @foreach ($recurrences as $recurrence)
            <div class="table-row">
                <div data-label="Nome" class="cell">{{ $recurrence->budget->name }}</div>
                <div data-label="Data" class="cell">{{ date('d/m/Y', strtotime($recurrence->date)) }}</div>
                <div data-label="Frequência" class="cell">{{ App\Utils\RecurrenceUtils::formatFrequency($recurrence->frequency) }}</div>
                <div data-label="Última execução" class="cell">{{ $recurrence->counter }}</div>
                <div data-label="Total de execuções"class="cell">{{ $recurrence->times }}</div>
                <div class="cell cell-actions">
                    <a class="cell-action" href="{{ route('recurrence.edit', $recurrence->id) }}" data-tooltip="Editar"><i class="fi fi-rs-edit"></i></a>
                </div>
            </div>
        @endforeach
</div>
{{ $recurrences->withQueryString()->links('components.pagination') }}
