@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/partials/graphsFilters.css') }}">
@endpush

<div class="graphs-filters">
    <form method="GET" action="">
        <div class="form-group">
            <label for="month">Filtrar por mês</label>
            <select id="month" class="form-control" name="month">
                <option value="1"  @if($month == 1) selected @endif>Janeiro</option>
                <option value="2"  @if($month == 2) selected @endif>Fevereiro</option>
                <option value="3"  @if($month == 3) selected @endif>Março</option>
                <option value="4"  @if($month == 4) selected @endif>Abril</option>
                <option value="5"  @if($month == 5) selected @endif>Maio</option>
                <option value="6"  @if($month == 6) selected @endif>Junho</option>
                <option value="7"  @if($month == 7) selected @endif>Julho</option>
                <option value="8"  @if($month == 8) selected @endif>Agosto</option>
                <option value="9"  @if($month == 9) selected @endif>Setembro</option>
                <option value="10" @if($month == 10) selected @endif>Outubro</option>
                <option value="11" @if($month == 11) selected @endif>Novembro</option>
                <option value="12" @if($month == 12) selected @endif>Dezembro</option>
            </select>
        </div>
        <button class="btn-small secondaryBtn">
            <i class="fi fi-rs-filter"></i>
        </button>
    </form>
</div>
