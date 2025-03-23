@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/partials/showBudget.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/partials/popup.css') }}">
@endpush

<div id="showBudgetPopup" class="overlay">
    <div class="modal">
        <button id="closeBudgetPopup" class="close-btn">✖</button>
        <div class="budget-popup__content"></div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/components/partials/showBudget.js') }}"></script>
@endpush