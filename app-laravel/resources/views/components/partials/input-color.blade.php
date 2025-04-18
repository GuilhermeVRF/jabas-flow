@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/components/partials/inputColor.css') }}">    
@endpush

<div class="customColorContainer">
    <div class="color-picker"></div>
    <div class="color-picker-btn form-control">Selecionar cor</div>
    <div class="color-options">
        @foreach($previewUserColors as $colorName => $colorRgb)
            <div class="color-option" data-color="{{ $colorRgb }}" style="background-color: {{ $colorRgb }};"></div>
        @endforeach
        
        <div class="customColorOptionContainer">
            <div class="color-option custom-color" id="customColorOption">+</div>
            <span>{{ __('Cor personalizada') }}</span>
        </div>
        <input type="hidden" name="color" value="{{ $color }}">
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
    <script src="{{ asset('js/components/partials/inputColor.js') }}"></script>
@endpush