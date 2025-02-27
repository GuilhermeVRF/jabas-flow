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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
    @stack('scripts')
</head>
<body>
    <x-header />
    <main>
        @yield('content')
    </main>
    <footer>
        <p>Feito por <span>Jabas</span> com <span>♥</span></p>
        <div>
            <a href="https://www.flaticon.com/uicons">Uicons by Flaticon</a>
            <a href="https://storyset.com/online">Online illustrations by Storyset</a>
        </div>
    </footer>
</body>
</html>