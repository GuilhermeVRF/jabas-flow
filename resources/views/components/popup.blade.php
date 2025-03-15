@props(['status', 'message'])

@php
    $imgSrc = match($status) {
        'success' => asset('images/success.png'),
        'error' => asset('images/error.png'),
        default => asset('images/info.png'),
    };
@endphp

<div class="popup">
    <img class="popup-icon" src="{{ $imgSrc }}" alt="{{ $status }}">
    <span>{{ $message }}</span>
</div>