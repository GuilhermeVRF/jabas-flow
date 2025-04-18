<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/views/welcome/welcome.css') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <title>Bem vindo</title>
</head>
<body>
    <x-header />   
    <main>
        <div class="welcomeContainer">
            <div class="welcomeTitle">
                <h1>Bem-vindo ao seu novo jeito de cuidar do seu dinheiro!</h1>
            </div>

            <div class="welcomeFeature">
                <div class="cardFeature">
                    <i class="fi fi-rs-category"></i>
                    Organize suas finanças criando categorias personalizadas
                </div>
        
                <div class="cardFeature">
                    <i class="fi fi-rs-dashboard-panel"></i>
                    Defina orçamentos e acompanhe seus gastos
                </div>
            
                <div class="cardFeature">
                    <i class="fi fi-rs-loop-square"></i>
                    Cadastre receitas e despesas com recorrência automática
                </div>
            
                <div class="cardFeature">
                    <i class="fi fi-rs-chart-pie-simple-circle-dollar"></i>
                    Visualize seu desempenho financeiro com gráficos intuitivos
                </div>
            </div>

            <p class="welcomeCallToAction">
                Se interessou pelo que viu? Comece agora a organizar sua vida financeira!
            </p>
            
            <a href="{{ route('register') }}" class="btn submitBtn">Cadastre-se</a>
        </div>
    </main>
    <x-footer />
</body>
</html>