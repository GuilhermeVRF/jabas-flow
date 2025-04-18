@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/partials/dashboardFilterPopup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/partials/popup.css') }}">
@endpush

<div id="showDashboardFilterPopup" class="overlay">
    <div class="modal">
        <button id="closeDashboardFilterPopup" class="close-btn">✖</button>
        <form class="dashboardFilter-popup__content" method="GET" action="">
            <h2>Aplicar filtros</h2>
            <div class="form-group">
                <label class="label" for="month">Filtrar por mês</label>
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

            <div class="button-group">
                <button class="btn submitBtn">Filtrar</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    
@endpush