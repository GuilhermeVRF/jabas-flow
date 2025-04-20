<!DOCTYPE html>
<html>

<head>
    <title>Recorrência</title>
    <style>
        html,
        body {
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
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            height: 100%;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: scroll;
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
            padding: 60px;
            display: flex;
            flex-direction: column;
            gap: 20px;
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

        /* Estilos para a tabela */
        .table-container {
            width: 100%;
            border-collapse: collapse;
        }

        .table-header {
            display: flex;
            flex-direction: row;
            width: 100%;
            background-color: #f4f4f4;
            text-align: center;
            font-weight: bold;
            padding: 10px 0;
            border-bottom: 2px solid #ddd;
        }

        .header-cell {
            flex: 1;
            padding: 0 10px;
        }

        .table-body {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .table-row {
            display: flex;
            flex-direction: row;
            width: 100%;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .table-row:hover {
            background-color: #f9f9f9;
        }

        .cell {
            flex: 1;
            padding: 0 10px;
            text-align: center;
        }

        .budget-type {
            display: inline-block;
            text-align: center;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            min-width: 100px;
        }

        .budget-type.expense {
            background-color: #F95454;
            color: white;
        }

        .budget-type.income {
            background-color: #47c363;
            color: white;
        }

        @media screen and (max-width: 1280px) {
            .table-header {
                display: none;
            }

            .table-row {
                display: flex;
                flex-direction: column;
                padding: 10px 0;
                border-bottom: 1px solid #ddd;
            }

            .cell {
                text-align: left;
                padding: 10px;
            }

            .cell:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                margin-right: 10px;
            }

            .cell-actions {
                justify-content: start;
            }

            .email-content{
                padding: 30px;
            }

            .budget-type{
                padding: 0px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Cabeçalho -->
        <div class="email-header">
            <h1>Recorrências do dia {{ date('d/m/Y') }}</h1>
        </div>

        <!-- Tabela -->
        <div class="email-content">
            <div>
                <p>Olá, {{ $user->name }},</p>
                <p>Estas são as recorrências registradas para o dia de hoje ({{ date('d/m/Y') }}). Fique à vontade para
                    revisar os detalhes abaixo:</p>
            </div>

            <div class="table-container">
                <!-- Cabeçalho da Tabela -->
                <div class="table-header">
                    <div class="header-cell">Nome</div>
                    <div class="header-cell">Tipo</div>
                    <div class="header-cell">Preço</div>
                    <div class="header-cell">Categoria</div>
                </div>

                <!-- Corpo da Tabela -->
                <div class="table-body">
                    @foreach ($recurrences as $userRecurrence)
                        <div class="table-row">
                            <div class="cell" data-label="Nome">{{ $userRecurrence->budget->name }}</div>
                            <div class="cell" data-label="Tipo">
                                <span class="budget-type {{ strtolower($userRecurrence->budget->type) }}">
                                    @php
                                        echo App\Utils\BudgetUtils::formatType($userRecurrence->budget->type);
                                    @endphp
                                </span>
                            </div>
                            <div class="cell" data-label="Preço">R$
                                {{ number_format($userRecurrence->budget->amount, 2, ',', '.') }}</div>
                            <div class="cell" data-label="Categoria">
                                <span
                                    style="color: {{ $userRecurrence->budget->category->color ?? '#000000 ' }}">{{ $userRecurrence->budget->category->name ?? '' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Rodapé -->
        <div class="email-footer">
            <p>Este é um e-mail automático, por favor não responda.</p>
            <p>Dúvidas? <a href="{{ url('/contato') }}">Entre em contato conosco</a>.</p>
        </div>
    </div>
</body>

</html>
