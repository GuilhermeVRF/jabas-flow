<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo</title>
    <style>
        html, body{
            height: 100%
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #4F6F52;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-content {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .email-content p {
            margin: 0 0 20px;
        }
        .email-button {
            display: inline-block;
            background-color: #118B50;
            color: #ffffff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .email-footer {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #777777;
        }
        .email-footer a {
            color: #118B50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Cabeçalho -->
        <div class="email-header">
            <h1>Bem-vindo ao Jabas Flow!</h1>
        </div>

        <!-- Conteúdo -->
        <div class="email-content">
            <p>Olá, {{ $user->name }},</p>
            <p>Obrigado por se registrar em nossa aplicação. Estamos muito felizes em tê-lo conosco!</p>
            <p>Seu código de verificação:</p>
            <p class="email-button">{{ $user->verification_code }}</p>
            <p>Se você não se registrou, por favor, ignore este e-mail.</p>
        </div>

        <!-- Rodapé -->
        <div class="email-footer">
            <p>Este é um e-mail automático, por favor não responda.</p>
            <p>Dúvidas? <a href="{{ url('/contato') }}">Entre em contato conosco</a>.</p>
        </div>
    </div>
</body>
</html>