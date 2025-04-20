<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/components/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    @if ($errors->any())
        <x-popup status="error" message="{{ $errors->first() }}" />
    @endif
    @if (session('success'))
        <x-popup status="success" message="{{ session('success') }}" />
    @endif
    <x-header />
    <main>
        <x-sidebar />
        <div class="content">
            
            @yield('content')
        </div>
    </main>
    @stack('scripts')
</body>
</html>