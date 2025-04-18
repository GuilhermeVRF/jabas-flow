@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
@endpush

<header>
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    @php 
        $user = auth()->user() ?? null;
    @endphp

    @if($user && !Route::is('login', 'register', 'welcome'))
    <span>{{ $user->name }}</span>
    @endif
</header>