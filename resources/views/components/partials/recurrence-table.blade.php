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
                <div class="cell">{{ $recurrence->budget->name }}</div>
                <div class="cell">{{ date('d/m/Y', strtotime($recurrence->date)) }}</div>
                <div class="cell">{{ App\Utils\RecurrenceUtils::formatFrequency($recurrence->frequency) }}</div>
                <div class="cell">{{ $recurrence->counter }}</div>
                <div class="cell">{{ $recurrence->times }}</div>
                <div class="cell cell-actions">
                    <a class="cell-action" href="{{ route('recurrence.edit', $recurrence->id) }}" data-tooltip="Editar"><i class="fi fi-rs-edit"></i></a>
                </div>
            </div>
        @endforeach
</div>
